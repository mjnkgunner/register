<?php
require_once 'Model/Product.php';

class ProductController {
    public function index() {
        $page = $_GET['page'] ?? 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;

        $productModel = new Product();
        $products = $productModel->getPaginated($limit, $offset);
        $total = $productModel->countAll();
        $totalPages = ceil($total / $limit);

        require 'views/ProductList.php';
    }
    public function addToCart() {
    $id = $_GET['id'] ?? null;
    if ($id) {
        require_once 'Model/Cart.php';
        $cart = new Cart();
        $cart->add($id, 1);
    }
    header('Location: index.php?controller=cart&action=view');
}
    public function removeFromCart() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            require_once 'Model/Cart.php';
            $cart = new Cart();
            $cart->remove($id);
        }
        header('Location: index.php?controller=cart&action=view');
    }
}
