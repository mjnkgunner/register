<?php
class CustomerModel {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "sinhvien");
        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }
    }

    // Lấy danh sách khách hàng theo trang
    public function getCustomers($limit, $offset) {
        $stmt = $this->conn->prepare("SELECT * FROM customers LIMIT ? OFFSET ?");
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy tổng số bản ghi
    public function getTotalCustomers() {
        $result = $this->conn->query("SELECT COUNT(*) AS total FROM customers");
        return $result->fetch_assoc()['total'];
    }
}
?>