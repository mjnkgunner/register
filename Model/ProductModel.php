<?php

class Product {
    public $db;
    public function __construct() {
        require_once 'Model/Database.php';
        $this->db = new Database();
    }
    public function getAll(){
        
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM menu";
        $result = $conn->query($sql);
        $this->db->closeConnection();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

        public function getDetail($id){
        
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM menu WHERE id =$id";
        $result = $conn->query($sql);
        $this->db->closeConnection();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
       
}