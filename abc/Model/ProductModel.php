<?php

class Product {
    public $db;
    public $products;
    public function __construct() {
        require_once 'Model/database.php';
        $this->db = new database(); // Gọi đúng tên class (viết hoa chữ D nếu class tên là Database)
    }

    public function getAll() {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM nhanvien";

        $result = $conn->query($sql);

        if (!$result) {
            die("Query failed: " . $conn->error);
        }
        $this->products = $result->fetch_all(MYSQLI_ASSOC);
        return $this->products;
    }
    public function getDetail($id){
                $conn = $this->db->getConnection();
        $sql = "SELECT * FROM nhanvien ";

        $result = $conn->query($sql);

        if (!$result) {
            die("Query failed: " . $conn->error);
        }
        $this->products = $result->fetch_all(MYSQLI_ASSOC);
        var_dump($this->products);


foreach($this->products as $key => $product){
    var_dump($key);
}

    }
}