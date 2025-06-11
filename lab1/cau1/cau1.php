<?php
$sanpham = [
    [
        "anh" => "dongho1.webp",
        "tieuDe" => "đồng hồ thông minh cwas",
        "gia" => "1.200.000",
        "uudai" => "799.000",
    ],
    [
        "anh" => "dongho2.png",
        "tieuDe" => "dong ho thong minh imet",
        "gia" => "900.000",
        "uudai" => "625.000",
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cau1.css">

</head>
<body>
    <h2>Danh Sách Sản Phẩm</h2>
    <?php foreach ($sanpham as $sanpham): ?>
        <div class="product">
            <img src="<?= $sanpham['anh'] ?>" alt="">
            <h3><?= $sanpham['tieuDe'] ?></h3>
            <div style="display: flex"><p>Giá Gốc:</p><p  class="giagoc"> <?= $sanpham['gia'] ?></p><p> VND</p></div>
            <p>chỉ còn: <strong><?= $sanpham['uudai'] ?> VND</strong></p>
            <button class="btn_1">Thêm vào giỏ hàng</button>
            <button class="btn_2">Mua ngay</button>
        </div>
    <?php endforeach; ?>
</body>
</html>
