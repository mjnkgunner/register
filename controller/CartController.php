<?php
require_once 'model/Cart.php';
require_once 'model/Product.php';

class CartController {
    public function add() {
        $id = $_GET['id'];
        $cart = new Cart();
        $cart->add($id, 1);
        header('Location: index.php?controller=cart&action=view');
    }

    public function view() {
        $cart = new Cart();
        $items = $cart->getCart();
        require 'views/Cart.php';
    }
    public function remove() {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $cart = new Cart();
        $cart->remove($id);
    }
    header('Location: index.php?controller=cart&action=view');
}

}
