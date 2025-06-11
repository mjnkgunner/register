<?php
require_once "Controller/Homecontroller.php";
$HomeController = new HomeController();
include "View/header.php";
$page = $_GET['page'] ?? 'home';
if($page){
    $HomeController->$page();
}
?>