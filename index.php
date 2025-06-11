<?php
require_once 'Controller/StudentController.php';

$action = $_GET['action'] ?? 'index';

// Hello Word, I am Tuan Awh.

$controller = new StudentController();

if ($action == 'search') {
    $controller->search();
} else {
    $controller->index();
}