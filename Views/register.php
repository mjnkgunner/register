<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký khóa học</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Đăng ký khóa học</h2>
    <form method="POST" action="index.php" class="w-50">
        <div class="mb-3">
            <label for="student_name" class="form-label">Tên học viên:</label>
            <input type="text" class="form-control" id="student_name" name="student_name" required>
        </div>
        <div class="mb-3">
            <label for="course_id" class="form-label">Chọn khóa học:</label>
            <select class="form-select" name="course_id" required>
                <?php foreach ($courses as $course): ?>
                    <option value="<?= $course['id'] ?>"><?= htmlspecialchars($course['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Đăng ký</button>
    </form>
</body>
</html>
