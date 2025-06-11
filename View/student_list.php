<h2>Danh sách sinh viên</h2>
<form method="get" action="index.php?action=search">
    <input type="text" name="keyword" placeholder="Nhập tên sinh viên">
    <button type="submit">Tìm kiếm</button>
</form>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
    </tr>
    <?php foreach ($students as $s): ?>
    <tr>
        <td><?= $s['id'] ?></td>
        <td><?= $s['name'] ?></td>
        <td><?= $s['email'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
