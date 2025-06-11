<?php
require_once "Model/CustomerModel.php";

class CustomerController {
    private $model;

    public function __construct() {
        $this->model = new CustomerModel();
    }

    public function index($currentPage, $perPage = 5) {
        $offset = ($currentPage - 1) * $perPage;
        $customers = $this->model->getCustomers($perPage, $offset);
        $total = $this->model->getTotalCustomers();
        $totalPages = ceil($total / $perPage);

        include "View/customer_list.php";
    }
}
?>