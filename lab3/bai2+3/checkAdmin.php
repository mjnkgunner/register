
<?php

$UserName = "";
$Pass = "";

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['Login'])){

    $UserName = $_GET['userName'];
    $Pass = $_GET['password'];

    require_once "Controller/ControllerAdmin.php";

    $checking = new admin();
    $checking-> admincheck($UserName, $Pass);

}
?>