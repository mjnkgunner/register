<!-- 
<?php
$sinhvien =$data;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chi tiết sinh viên</title>
</head>
<body>
    <?php
     if ($sinhvien): ?>
        <h2>Chi tiết sinh viên</h2>
        <ul>
            <li><strong>ID:</strong> <?= htmlspecialchars($sinhvien['ID']) ?></li>
            <li><strong>Họ tên:</strong> <?= htmlspecialchars($sinhvien['Name']) ?></li>
            <li><strong>Tuổi:</strong> <?= htmlspecialchars($sinhvien['Age'] ?? 'N/A') ?></li>
            <li><strong>Lớp:</strong> <?= htmlspecialchars($sinhvien['Class'] ?? 'N/A') ?></li>
        </ul>
    <?php else: ?>
        <p>Không tìm thấy sinh viên.</p>
    <?php endif; ?>
</body>
</html> -->