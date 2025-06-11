<?php

$page = $_GET['page']?? 'home';
require_once 'View/home.php';
print_r($page);

switch ($page) {

    case 'SinhVien':
        require_once 'View/SinhVien.php';
        // $controller = new addsvController();
        // $controller->getAll();
        break;

    case 'chitietModel':

        require_once 'Controller/chitietModel.php';
        $id = $_GET['id'] ?? null;
        $sinhvien_print = new chitiet;
        $sinhvien_print->get_SinhVien($id);
        break;

    default:
        require_once 'View/home.php';
        // $controller = new HomeController();
        // $controller->home();
        break;
}



?>