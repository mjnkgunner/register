<?php
require_once 'config.php';

class Student {
    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function getAll($limit = 4, $offset = 0) {
        $stmt = $this->conn->prepare("SELECT * FROM students LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function search($keyword) {
        $stmt = $this->conn->prepare("SELECT * FROM students WHERE name LIKE ?");
        $stmt->execute(["%$keyword%"]);
        return $stmt->fetchAll();
    }
}
