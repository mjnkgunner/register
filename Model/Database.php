<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'coffee';
    private $username = 'root';
    private $password = '';
    private $conn = null;
    private $pdo = null;

    public function __construct() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
            // For backward compatibility with existing code
            $this->conn = $this->pdo;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }

    public function __destruct() {
        $this->closeConnection();
    }

    public function closeConnection() {
        $this->pdo = null;
        $this->conn = null;
    }

    // Helper method for executing queries with prepared statements
    public function query($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
}