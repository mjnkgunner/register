<?php
require_once "Controller/CustomerController.php";

$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

$controller = new CustomerController();
$controller->index($page);
?>