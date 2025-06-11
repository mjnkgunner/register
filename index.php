<?php
session_start();

// Lấy controller và action từ URL, gán mặc định nếu không có
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'product';
$action     = isset($_GET['action']) ? $_GET['action'] : 'index';

// Router đơn giản
switch ($controller) {
    case 'product':
        require_once 'Controller/ProductController.php';
        $productController = new ProductController();

        if ($action === 'addToCart') {
            $productController->addToCart();
        } else {
            $productController->index();
        }
        break;

    case 'cart':
        require_once 'Controller/CartController.php';
        $cartController = new CartController();

        if ($action === 'remove') {
            $cartController->remove();
        } else {
            $cartController->view();
        }
        break;

    default:
        echo "404 Not Found";
}
