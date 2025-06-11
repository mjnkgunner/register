<h2>Danh sách sinh viên</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Tuổi</th>
        <th>Chi tiết</th>
    </tr>
    <?php foreach ($students as $s): ?>
    <tr>
        <td><?= $s['id'] ?></td>
        <td><?= $s['name'] ?></td>
        <td><?= $s['age'] ?></td>
        <td><a href="?action=detail&id=<?= $s['id'] ?>">Xem</a></td>
    </tr>
    <?php endforeach; ?>
</table>
