<?php
class sinhVien
{
    private $mssv;
    private $hoTen;
    private $gioiTinh;
    private $ngaySinh;
    private $diemTB;


    public function __construct($mssv = "", $hoTen = "", $gioiTinh = "", $ngaySinh = "", $diemTB = 0)
    {
        $this->mssv = $mssv;
        $this->hoTen = $hoTen;
        $this->gioiTinh = $gioiTinh;
        $this->ngaySinh = $ngaySinh;
        $this->diemTB = $diemTB;
    }


    public function getMSSV(){
        return $this->mssv;
    }
    public function setMSSV($mssv){
        $this->mssv = $mssv;
    }



    public function getHoten(){
        return $this->hoTen;
    }
    public function setHoten($hoTen){
        $this->hoTen = $hoTen;
    }



    public function getGioiTinh(){
        return $this->gioiTinh;
    }
    public function setGioiTinh($gioiTinh){
        $this->gioiTinh = $gioiTinh;
    }



    public function getNgaySinh(){
        return $this->ngaySinh;
    }
    public function setNgaySinh($ngaySinh){
        $this->ngaySinh = $ngaySinh;
    }



    public function getDiemTB(){
        return $this->diemTB;
    }
    public function setDiemTB($diemTB){
        $this->diemTB = $diemTB;
    }


    public function hienThiThongTin(){
        echo "mssv: " . $this -> getMSSV() . "<br>";
        echo "ho Ten: " . $this -> getHoten() . "<br>";
        echo "gioi Tinh: " . $this -> getGioiTinh() . "<br>";
        echo "ngay Sinh: " . $this -> getNgaySinh() . "<br>";
        echo "diem TB: " . $this -> getDiemTB() . "<br>";
        echo "<hr>";
    }
}

$mangSinhVien = [];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $mssv = $_POST["mssv"];
    $hoTen = $_POST["hoTen"];
    $gioiTinh = $_POST["gioiTinh"];
    $ngaySinh = $_POST["ngaySinh"];
    $diemTB = $_POST["diemTB"];

    $sinhVien = new SinhVien($mssv, $hoTen, $gioiTinh, $ngaySinh, $diemTB);
    $mangSinhVien[] = $sinhVien;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Them Sinh Vien</h1>
    <form action="" method="post">
        <label for="">Ma Sinh Vien</label>
        <input type="text" name="mssv" required><br><br>

        <label for="">họ tên: </label>
        <input type="text" id="hoTen" name="hoTen" required><br><br>

        <label for="">giới tính: </label>
        <select name="gioiTinh" id="gioiTinh">
            <option value="">Gioi Tinh</option>
            <option value="nam">nam</option>
            <option value="nu">nu</option>
            <option value="bede">khac</option>
        </select><br><br>

        <label for="">Ngay Sinh</label>
        <input type="date" id="ngaySinh" name="ngaySinh" required><br><br>


        <label for="">điểm TB: </label>
        <input type="number" id="diemTB" name="diemTB" required><br><br>

        <button type="submit">lưu</button>
    </form>

    <hr>

    <?php
    if(!empty($mangSinhVien)){
        echo "<h2>danh sách sinh viên:</h2>";
        foreach($mangSinhVien as $sv){
            $sv->hienThiThongTin();
        }
    }

    ?>
</body>

</html>