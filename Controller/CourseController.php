<?php
require_once 'Model/CourseModel.php';

class CourseController {
    public function showForm() {
        $model = new CourseModel();
        $courses = $model->getAllCourses();
        include 'Views/register.php';
    }

    public function registerCourse($studentName, $courseId) {
        $model = new CourseModel();

        if ($model->countStudents($courseId) >= 5) {
            echo "<div class='alert alert-danger'>Khóa học đã đủ học viên!</div>";
            return;
        }

        $model->addStudentToCourse($studentName, $courseId);
        echo "<div class='alert alert-success'>Đăng ký thành công!</div>";
    }
}
