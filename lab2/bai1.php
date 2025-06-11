<?php
class j97{
    public $name;
    public $age;
    public $address;

    public function setName($name){
        $this->name = $name;
    }

    public function setAge($age){
        $this->age = $age;
    }

    public function setAddress($address){
        $this->address = $address;
    }

    public function getInfo(){
        return "Name: " . $this->name . "<br>" .
        "Age: " . $this->age . "<br>" . 
        "Address: " . $this->address;
    }

    public function canvote(){
        if($this->age >= 18){
            echo "du tuoi di tu";
        }else{
            echo "chua du tuoi";
        }
    }
}

$viruss = new j97();
$viruss-> setName("VanLinhP");
$viruss-> setAge(19);
$viruss-> setAddress("Thanh Hoa");

echo $viruss->getInfo() . "<br>";
$viruss-> canvote();

?>