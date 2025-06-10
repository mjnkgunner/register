<?php
require_once "Model/ProductModel.php";
class ProductController
{
    public function index()
    {
        include_once "Views/header.php";
        $productModel = new Product();
        $products = $productModel->getAll();
        require_once "views/product.php";
        include_once "Views/footer.php";
    }

    public function detail($id)
    {
        if ($id) {
            $productModel = new Product();
            $product = $productModel->getById($id);
            include_once "Views/header.php";
            require_once "Views/product_detail.php";
            include_once "Views/footer.php";
        } else {
            header("Location: index.php?page=product");
        }
    }
    public function edit()
{
    $id = $_GET['id']; // Lấy ID sản phẩm từ URL
    $model = new Product(); // Khởi tạo model
    $editProduct = $model->getById($id); // Lấy sản phẩm theo ID
    require_once 'Views/product_edit.php'; // Nạp view form chỉnh sửa
}


    public function update($data)
    {
        $model = new Product();
        $model->update($data['id'], $data['name'], $data['price']);
        header('Location: index.php?page=product');
    }
}
