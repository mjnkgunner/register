<h2>Giỏ hàng</h2>
<ul>
    <?php foreach ($items as $id => $qty): ?>
        <li>Sản phẩm <?= $id ?> - Số lượng: <?= $qty ?></li>
    <?php endforeach; ?>
</ul>
