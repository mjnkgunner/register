<?php

class HomeController{
    //contructor
    public function __construct(){
    }

    public function home(){
        require_once 'view/home.php';
    }
    public function product(){
        require_once 'view/product.php';
    }
    public function __destruct(){
    }
}

?>