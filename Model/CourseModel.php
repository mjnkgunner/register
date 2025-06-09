<?php
class CourseModel {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "online_course_mvc");
        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }
    }

    public function countStudents($courseId) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM registrations WHERE course_id = ?");
        $stmt->bind_param("i", $courseId);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        return $count;
    }

    public function addStudentToCourse($studentName, $courseId) {
        $stmt = $this->conn->prepare("INSERT INTO registrations (student_name, course_id) VALUES (?, ?)");
        $stmt->bind_param("si", $studentName, $courseId);
        $stmt->execute();
    }

    public function getAllCourses() {
        $result = $this->conn->query("SELECT * FROM courses");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
