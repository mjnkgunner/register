<?php

class HomeController {
    public function home() {
        // Load the home view
        include_once "view/header.php";
        include "view/home.php";
        include_once "view/footer.php";
    }
}

?>