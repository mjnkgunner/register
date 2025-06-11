<?php
class addsvController {
    private $db;

    public function __construct() {
        require_once "Model/StudentModel.php"; // sửa đúng tên file model
        $this->db = new addSinhVien(); // đúng tên class
    }

    public function getAll() {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM sinhvien";

        $result = $conn->query($sql);
        if (!$result) {
            die("Query failed: " . $conn->error);
        }

        $sinhviens = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        return $sinhviens;
    }

    // ✅ HÀM TÌM KIẾM SINH VIÊN
    public function searchStudent($keyword) {
        $conn = $this->db->getConnection();

        $stmt = $conn->prepare("SELECT * FROM sinhvien WHERE id = ? OR name LIKE ?");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $likeKeyword = "%" . $keyword . "%";
        $stmt->bind_param("ss", $keyword, $likeKeyword);
        $stmt->execute();

        $result = $stmt->get_result();
        if (!$result) {
            die("Execute failed: " . $stmt->error);
        }

        $sinhviens = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $sinhviens;
    }
}
?>