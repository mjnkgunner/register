# Screen Translator

Ứng dụng dịch màn hình thời gian thực sử dụng Google Gemini API.

## Tính năng

- Chụp màn hình tự động mỗi giây
- Dịch tất cả text hiển thị trên màn hình sang tiếng Việt
- Hiển thị kết quả dịch trong cửa sổ riêng
- Giao diện đơn giản, dễ sử dụng

## Cài đặt

1. Cài đặt Python 3.8 trở lên
2. Cài đặt các thư viện cần thiết:
```bash
pip install -r requirements.txt
```

3. Tạo file `.env` trong thư mục gốc và thêm API key của Google Gemini:
```
GOOGLE_API_KEY=your_api_key_here
```

## Sử dụng

1. Chạy ứng dụng:
```bash
python main.py
```

2. Nhấn nút "Start Translation" để bắt đầu dịch
3. Nhấn nút "Stop Translation" để dừng dịch

## Lưu ý

- Bạn cần có API key của Google Gemini để sử dụng ứng dụng
- Ứng dụng sẽ chụp toàn bộ màn hình, hãy đảm bảo không có thông tin nhạy cảm
- Tốc độ dịch phụ thuộc vào kết nối internet và API key của bạn 