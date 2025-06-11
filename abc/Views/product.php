<div class="row row-cols-1 row-cols-md-3 g-5">

    <?php foreach ($products as $product): ?>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($product['id']) ?></h5>
                    <p class="card-text"><?= htmlspecialchars($product['Ten Do uong']) ?></p>
                    <a href="?page=product_detail&id=<?= htmlspecialchars($product['id']) ?>">Xem chi tiết</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
