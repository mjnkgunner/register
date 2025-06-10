<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<h3 class="mb-4">Chỉnh sửa sản phẩm</h3>
<form method="post" action="?page=product&action=update" class="p-4 border rounded bg-light">
    <input type="hidden" name="id" value="<?= $editProduct['id'] ?>">

    <div class="mb-3">
        <label for="name" class="form-label">Tên sản phẩm</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($editProduct['name']) ?>">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Giá</label>
        <input type="text" class="form-control" id="price" name="price" value="<?= htmlspecialchars($editProduct['price']) ?>">
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
