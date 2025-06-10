<?php

class Product {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "coffee");
        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM menu";
        $stmt = $this->conn->query($sql);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
    $stmt = $this->conn->prepare("SELECT * FROM menu WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

public function update($id, $name, $price) {
    $stmt = $this->conn->prepare("UPDATE menu SET name = ?, price = ? WHERE id = ?");
    $stmt->bind_param("sdi", $name, $price, $id);
    $stmt->execute();
}
}
