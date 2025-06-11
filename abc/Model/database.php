<?php
class Database {
    private $host = 'localhost';
    private $username = 'root';       // thường mặc định là 'root' trên XAMPP
    private $password = '';           // thường để trống trên XAMPP
    private $dbname = 'coffee';     // tên database
    public $conn;

    public function __construct() {


        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    public function getConnection() {
        return $this->conn;
    }

    public function __destruct() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}

?>
?>