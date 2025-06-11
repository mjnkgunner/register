
<?php

class SinhVien {
    public $ten;
    public $maSv;
    public $tuoi;

    public function __construct($ten="A", $maSv="PA", $tuoi=30){
        $this->ten = $ten;
        $this->maSv = $maSv;
        $this->tuoi = $tuoi;
    }

    public function getTen(){
        return $this->ten;
    }
    public function setTen($ten){
        $this->ten = $ten;
    }
    public function hoc(){
        echo "Toi" . $this->ten . "dang di hoc";
    }

    public function sleep(){
        echo "toi da sleep duoc " . $this->tuoi . " nam";
    }
    public function __destruct()
    {
        echo "Huy Object";
    }
}

$sinhVien1 = new SinhVien("Tuan","PA3333",25);
$sinhVien1->setTen("quang anh");
echo $sinhVien1->getTen();