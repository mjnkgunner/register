<?php

class QuanLySanPham{

    public $ten;
    public $gia;
    public $soluong;

    public function getTen($ten){
        $this->ten = $ten;
    }
    public function getGia($gia){
        $this->gia = $gia;
    }
    public function getSoLuong($Soluong){
        $this->soluong = $Soluong;
    }

    public function giaThanh(){
        if($this->gia > 100000){
        echo "sao gia dat vay ba";
                echo "<br>";
        echo $this->ten;
        echo "<br>";
        }
        else{
            echo "gia ca hop ly day";
        }
    }
    public function tongTien(){
        $gia = $this->gia*$this->soluong;
        echo "gia cua tat ca san pham la". $gia ." vnd";
        echo "<br>";
    }

}

$sinhVien1 = new QuanlySanPham();
$sinhVien1->getTen("Nguyen van Linh");
$sinhVien1->getGia("1000000");
$sinhVien1->getSoLuong("5");
$sinhVien1->giaThanh();
$sinhVien1->tongTien();



?>