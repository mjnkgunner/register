<?php
class Database {
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_pass;
    private $connection;

    public function __construct($db_host, $db_name, $db_user, $db_pass) {
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
    }

    public function connect() {
        try {
            $dsn = "mysql:host=$this->db_host;dbname=$this->db_name;charset=utf8";
            $this->connection = new PDO($dsn, $this->db_user, $this->db_pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Kết nối thành công!\n";
            return $this->connection;
        } catch (PDOException $e) {
            echo "Lỗi kết nối: " . $e->getMessage() . "\n";
            die();
        }
    }

    public function disconnect() {
        if ($this->connection !== null) {
            $this->connection = null;
            echo "Ngắt kết nối thành công!\n";
        }
    }
}
?> 