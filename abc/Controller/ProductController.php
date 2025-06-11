<?php
class ProductController {
    public function index() {
        include_once "views/header.php";
        require_once "Model/ProductModel.php";

        $productModel = new Product();
        $products = $productModel->getAll();

        require_once "views/product.php";
        include_once "views/footer.php";
    }

    public function detail($id) {
        if ($id) {
            require_once "Model/ProductModel.php";
            $productModel = new Product();
            $product = $productModel->getDetail($id);

            include_once "views/header.php";
            
            include_once "views/footer.php";
        } else {
            header("Location: index.php?page=product");
        }
    }
}