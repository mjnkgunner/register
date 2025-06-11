<?php
class chitiet {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "sinhvien"); // thay "ten_csdldemo" bằng tên thật
        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }
    }

public function get_SinhVien($id) {
    if ($id === null || !is_numeric($id)) {
        throw new Exception("ID không hợp lệ");
    }

    $stmt = $this->conn->prepare("SELECT * FROM sinhvien WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    print_r($data);


// require_once '../View/chitietSV.php'; 

//     require_once 'View/chitietSV.php'; // ⚠️ View này cần dùng biến $data

//     return $data;
}
}