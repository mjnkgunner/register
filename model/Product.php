<?php
class Product {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "coffee");
        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }
    }
    public function getPaginated($limit, $offset) {
        $stmt = $this->conn->prepare("SELECT * FROM menu LIMIT ? OFFSET ?");
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function countAll() {
        $result = $this->conn->query("SELECT COUNT(*) as total FROM menu");
        $row = $result->fetch_assoc();
        return $row['total'];
    }
}
