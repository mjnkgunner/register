<h2>Sản phẩm</h2>
<ul>
<?php foreach ($products as $product): ?>
    <li>
        <?= $product['name'] ?> - <?= $product['price'] ?> VND
        | <a href="index.php?controller=product&action=addToCart&id=<?= $product['id'] ?>">Thêm vào giỏ</a>
    </li>
<?php endforeach; ?>
</ul>

<div>
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="index.php?controller=product&page=<?= $i ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>
