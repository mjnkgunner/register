<?php
$products = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = [
        "ten" => $_POST['ten'],
        "gia" => $_POST['gia'],
        "giaGiam" => $_POST['giaGiam'],
        "moTa" => $_POST['moTa'],
    ];
    $products[] = $product;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form method="POST">
        <h3>Thêm Sản Phẩm</h3>
        <label>Tên Sản Phẩm:</label>
        <input type="text" name="ten" required><br>

        <label>Giá:</label>
        <input type="number" name="gia" required><br>

        <label>Giá Giảm:</label>
        <input type="number" name="giaGiam"><br>

        <label>Mô Tả:</label>
        <input type="text" name="moTa"><br>

        <button type="submit">Thêm</button>
    </form>

    <?php if (!empty($products)): ?>
        <h3>Danh sách sản phẩm</h3>
        <table border=1>
            <thead>
                <tr>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá Gốc</th>
                    <th>Giá Giảm</th>
                    <th>Mô Tả</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $p): ?>
                    <tr>
                        <td><?= $p['ten'] ?></td>
                        <td><?= $p['gia'] ?> VND</td>
                        <td><?= $p['giaGiam'] ?> VND</td>
                        <td><?= $p['moTa'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

</body>
</html>