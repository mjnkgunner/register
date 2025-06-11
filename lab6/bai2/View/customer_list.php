<h2>Danh sách khách hàng</h2>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
    </tr>
    <?php foreach ($customers as $cus): ?>
        <tr>
            <td><?= htmlspecialchars($cus['id']) ?></td>
            <td><?= htmlspecialchars($cus['name']) ?></td>
            <td><?= htmlspecialchars($cus['email']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<div style="margin-top: 10px;">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>