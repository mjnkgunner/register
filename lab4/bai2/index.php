<?php
require_once 'Database.php';


$host = 'localhost';
$dbname = 'coffee';
$username = 'root';
$password = '';

$database = new Database($host, $dbname, $username, $password);


$connection = $database->connect();

?> 