<?php
    session_start();
    if (isset($_SESSION['username']) && isset($_POST['logout'])) {
        unset($_SESSION['username']);
        unset($_SESSION['password']);
    }
    session_destroy();
    header("location: login.php");
   
    

?>