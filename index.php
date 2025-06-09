<?php
require_once 'Controller/CourseController.php';

$controller = new CourseController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentName = $_POST['student_name'];
    $courseId = $_POST['course_id'];
    $controller->registerCourse($studentName, $courseId);
}

$controller->showForm();
