<?php
require_once "Controller/SinhVienController.php";

$SinhVienA = new addsvController();

// Kiểm tra có tìm kiếm hay không
if (isset($_GET['search']) && !empty($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    print_r($keyword);
    echo "njvhdjshbvcd";
    $sinhvienp = $SinhVienA->searchStudent($keyword);
    print_r($sinhvienp);
} else {
    $sinhvienp = $SinhVienA->getAll();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <style>
        .tabole {
            border: 1px solid black;
            padding: 10px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <form method="GET">
        <input type="text" name="keyword" placeholder="Nhập ID hoặc tên sinh viên">
        <button type="submit" name="search">Tìm kiếm</button>
    </form>

    <?php if (!empty($sinhvienp)): ?>
        <?php foreach ($sinhvienp as $product): ?>
            <div class="tabole">
                <p>ID: <?= htmlspecialchars($product['ID']); ?></p>
                <h1><?= htmlspecialchars($product['Name']); ?></h1>
                <a href="?page=chitietModel&id=<?= htmlspecialchars($product['ID']) ?>">Xem chi tiết</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Không tìm thấy sinh viên nào.</p>
    <?php endif; ?>
</body>
</html>