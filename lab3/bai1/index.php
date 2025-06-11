<?php

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';

switch ($controller) {
    case 'product':
        require 'controllers/productController.php';
        break;
    default:
        require 'controllers/homeController.php';
        break;
}
?>