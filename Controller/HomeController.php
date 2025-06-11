<?php
require_once 'Student.php';

class HomeController {
    private $student;

    public function __construct($conn) {
        $this->student = new Student($conn);
    }

    public function index() {
        $students = $this->student->getAll();
        include 'home.php';
    }

    public function detail($id) {
        if (!is_numeric($id)) {
            echo "ID không hợp lệ!";
            return;
        }

        $student = $this->student->getById($id);
        if (!$student) {
            echo "Không tìm thấy sinh viên!";
            return;
        }

        echo "<h2>Chi tiết sinh viên</h2>";
        echo "ID: " . $student['id'] . "<br>";
        echo "Tên: " . $student['name'] . "<br>";
        echo "Tuổi: " . $student['age'] . "<br>";
        echo "<a href='?action=index'>Quay lại</a>";
    }
}
