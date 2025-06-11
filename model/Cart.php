<?php
class Cart {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "coffee");
        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }
    }
    public function add($id, $quantity) {
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] += $quantity;
        } else {
            $_SESSION['cart'][$id] = $quantity;
        }
    }

    public function remove($id) {
        unset($_SESSION['cart'][$id]);
    }

    public function getCart() {
        return $_SESSION['cart'] ?? [];
    }
}
