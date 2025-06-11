<?php
require 'models/productModel.php';

$products = getAllProducts(); // Lấy dữ liệu sản phẩm từ model

$view = 'views/product.php';
require 'views/layouts/main.php';