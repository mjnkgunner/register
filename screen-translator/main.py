import sys
import os
import time
import requests
from PyQt6.QtWidgets import QApplication, QMainWindow, QPushButton, QVBoxLayout, QWidget, QTextEdit, QLineEdit, QLabel, QComboBox
from PyQt6.QtCore import QTimer, Qt, QRect, QPoint
from PyQt6.QtGui import QPainter, QColor, QPixmap
import cv2
import numpy as np
from PIL import ImageGrab
import pytesseract
import google.generativeai as genai
from dotenv import load_dotenv

# Load environment variables
load_dotenv()

# Check if API key is loaded
api_key = os.getenv('GOOGLE_API_KEY')
if not api_key:
    print("Error: GOOGLE_API_KEY environment variable not set.")
else:
    print(f"GOOGLE_API_KEY loaded successfully (first few chars): {api_key[:5]}...")

# Configure Google Gemini API
genai.configure(api_key=os.getenv('GOOGLE_API_KEY'))

# List available models to debug 404 error
print("Available Gemini Models supporting generateContent:")
for m in genai.list_models():
    if 'generateContent' in m.supported_generation_methods:
        print(m.name)

model = genai.GenerativeModel('models/gemini-1.5-pro')

# Set Tesseract executable path
pytesseract.pytesseract.tesseract_cmd = r"C:\\Program Files\\Tesseract-OCR\\tesseract.exe"

class SelectionWindow(QWidget):
    def __init__(self, screenshot: QPixmap, parent=None):
        super().__init__(parent)
        self.setWindowFlags(Qt.WindowType.FramelessWindowHint | Qt.WindowType.WindowStaysOnTopHint)
        self.screenshot = screenshot
        self.setGeometry(self.screenshot.rect())
        self.setCursor(Qt.CursorShape.CrossCursor)

        self.begin = QPoint()
        self.end = QPoint()
        self.parent_window = parent # Store reference to main window

    def paintEvent(self, event):
        painter = QPainter(self)
        # Draw the screenshot background
        painter.drawPixmap(self.rect(), self.screenshot)

        # Draw selection rectangle overlay
        if not self.begin.isNull() and not self.end.isNull():
            painter.setPen(QColor(255, 0, 0, 255)) # Red border
            painter.setBrush(QColor(255, 0, 0, 80)) # Semi-transparent red fill
            rect = QRect(self.begin, self.end).normalized()
            painter.drawRect(rect)

    def mousePressEvent(self, event):
        if event.button() == Qt.MouseButton.LeftButton:
            self.begin = event.pos()
            self.end = event.pos()
            self.update()

    def mouseMoveEvent(self, event):
        self.end = event.pos()
        self.update()

    def mouseReleaseEvent(self, event):
        if event.button() == Qt.MouseButton.LeftButton:
            rect = QRect(self.begin, self.end).normalized()
            if rect.width() > 0 and rect.height() > 0:
                # Pass the selected region back to the main window
                if self.parent_window:
                    self.parent_window.set_capture_region_from_selection(rect.x(), rect.y(), rect.width(), rect.height())
            # Close the selection window
            self.close()

class ScreenTranslator(QMainWindow):
    def __init__(self):
        super().__init__()
        self.setWindowTitle("Screen Translator")
        self.setGeometry(100, 100, 800, 600)
        
        # Create central widget and layout
        central_widget = QWidget()
        self.setCentralWidget(central_widget)
        layout = QVBoxLayout(central_widget)
        
        # Create buttons
        self.start_button = QPushButton("Start Translation")
        self.stop_button = QPushButton("Stop Translation")
        self.stop_button.setEnabled(False)
        
        # Create input for timer interval
        self.interval_input = QLineEdit()
        self.interval_input.setPlaceholderText("Capture Interval (ms, e.g. 1000)")
        self.interval_label = QLabel("Capture Interval (ms):")
        
        self.select_region_button = QPushButton("Select Capture Region")
        
        # Create translation service selection
        self.service_label = QLabel("Translation Service:")
        self.service_combo = QComboBox()
        self.service_combo.addItem("Gemini (Online)")
        self.service_combo.addItem("Ollama (Offline)")
        
        # Create text display
        self.text_display = QTextEdit()
        self.text_display.setReadOnly(True)
        
        # Add widgets to layout
        layout.addWidget(self.select_region_button)
        layout.addWidget(self.interval_label)
        layout.addWidget(self.interval_input)
        layout.addWidget(self.start_button)
        layout.addWidget(self.stop_button)
        
        # Add translation service selection to layout
        layout.addWidget(self.service_label)
        layout.addWidget(self.service_combo)
        layout.addWidget(self.text_display)
        
        # Connect buttons
        self.start_button.clicked.connect(self.start_translation)
        self.stop_button.clicked.connect(self.stop_translation)
        self.select_region_button.clicked.connect(self.open_selection_window)
        
        # Initialize timer
        self.timer = QTimer()
        self.timer.timeout.connect(self.capture_and_translate)
        
        self.is_running = False
        
        # Initialize capture region variables
        self.region_x = None
        self.region_y = None
        self.region_width = None
        self.region_height = None
        
        # Variable to store previously translated text for optimization
        self.previous_text = ""
        
        # Add variable to store selected service
        self.selected_service = "Gemini (Online)" # Default
        self.service_combo.currentTextChanged.connect(self.on_service_selected)

    def on_service_selected(self, text):
        self.selected_service = text
        print(f"Translation service selected: {self.selected_service}")

    def set_capture_region_from_selection(self, x, y, width, height):
        self.region_x = x
        self.region_y = y
        self.region_width = width
        self.region_height = height
        print(f"Capture region set to: x={self.region_x}, y={self.region_y}, width={self.region_width}, height={self.region_height}")
        # Show the main window again after selection
        self.showNormal()

    def open_selection_window(self):
        # Hide the main window
        self.hide()

        # Capture the entire screen
        screen = QApplication.primaryScreen()
        screenshot = screen.grabWindow(0) # 0 captures the whole desktop

        # Open the selection window
        self.selection_window = SelectionWindow(screenshot, self)
        self.selection_window.showFullScreen()

    def start_translation(self):
        self.is_running = True
        self.start_button.setEnabled(False)
        self.stop_button.setEnabled(True)
        
        # Set timer interval from input
        try:
            interval = int(self.interval_input.text())
            if interval > 0:
                self.timer.start(interval)
                print(f"Capture interval set to {interval} ms")
            else:
                print("Invalid interval. Using default 1000 ms.")
                self.timer.start(1000)
        except ValueError:
            print("Invalid interval input. Please enter an integer. Using default 1000 ms.")
            self.timer.start(1000) # Capture every second

    def stop_translation(self):
        self.is_running = False
        self.start_button.setEnabled(True)
        self.stop_button.setEnabled(False)
        self.timer.stop()

    def capture_and_translate(self):
        if not self.is_running:
            return
            
        # Capture screen
        if all([self.region_x is not None, self.region_y is not None, self.region_width is not None, self.region_height is not None]):
            bbox = (self.region_x, self.region_y, self.region_x + self.region_width, self.region_y + self.region_height)
            screenshot = ImageGrab.grab(bbox=bbox)
            print(f"Capturing region: {bbox}")
        else:
            screenshot = ImageGrab.grab()
            print("Capturing full screen")
            
        screenshot_np = np.array(screenshot)
        
        # Convert to grayscale for better text detection
        gray = cv2.cvtColor(screenshot_np, cv2.COLOR_BGR2GRAY)
        
        # Extract text using pytesseract
        text = pytesseract.image_to_string(gray)
        
        if text.strip() and text.strip() != self.previous_text.strip():
            self.previous_text = text.strip() # Update previous text
            
            translated_text = ""
            
            if self.selected_service == "Gemini (Online)":
                try:
                    # Translate text using Gemini
                    response = model.generate_content(f"Translate this text to Vietnamese: {text}")
                    translated_text = response.text
                    print("Translated using Gemini")
                except Exception as e:
                    translated_text = f"Error during Gemini translation: {str(e)}"
                    print(translated_text)
            elif self.selected_service == "Ollama (Offline)":
                # TODO: Implement Ollama translation logic here
                ollama_api_url = "http://localhost:11434/api/generate"
                model_name = "gemma" # Replace with the model you pulled, e.g., "llama2"
                prompt = f"Translate this text to Vietnamese: {text}"
                
                try:
                    response = requests.post(ollama_api_url, json={'model': model_name, 'prompt': prompt, 'stream': False})
                    response.raise_for_status() # Raise an exception for bad status codes
                    result = response.json()
                    translated_text = result.get('response', 'Error: No translation response from Ollama')
                    print(f"Translated using Ollama model: {model_name}")
                except requests.exceptions.RequestException as e:
                    translated_text = f"Error during Ollama translation: {str(e)}. Make sure Ollama is running and the model '{model_name}' is available."
                    print(translated_text)

            if translated_text:
                # Update display
                self.text_display.append(f"Original: {text}\nTranslated: {translated_text}\n{'='*50}\n")

def main():
    app = QApplication(sys.argv)
    window = ScreenTranslator()
    window.show()
    sys.exit(app.exec())

if __name__ == "__main__":
    main()"""  """ 