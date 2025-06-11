<?php
session_start();

if (!isset($_SESSION['username']) || !$_SESSION['password']) {
    header('Location: login.php');
} else {
    echo 'Chào mừng ' . $_SESSION['username'] . '!';
}
?>
