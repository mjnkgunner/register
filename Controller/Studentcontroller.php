<?php
require_once 'Model/Student.php';

class StudentController {
    public function index() {
        $model = new Student();
        $students = $model->getAll();
        include __DIR__ . '/../View/student_list.php'; // THÊM ../
    }

    public function search() {
        $model = new Student();
        $keyword = $_GET['keyword'] ?? '';
        $students = $model->search($keyword);
        include __DIR__ . '/../View/student_list.php'; // THÊM ../
    }
}