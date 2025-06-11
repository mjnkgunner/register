<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['sanpham'])){
        $_SESSION['sanpham'][]=[];
    }
    $sanpham=[];
    if($_SERVER['REQUEST_METHOD']=='POST'){
           $name = $_POST['name']  ?? '';
           $gia = $_POST['gia'] ?? '0';
   
    }
    $sanpham = [
        "name"=>$name,
        "gia"=>$gia

    ];
    $_SESSION['sanpham'][]=$sanpham;
    ?>
    
    
    
    <form action="" method="POST">
        <label for="name">name</label>
        <input type="text" required name="name" placeholder="name">
        <label for="gia" name="gia">gia san pham</label>
        <input type="number" placeholder="gia san pham">
        <div>
            <button class="btn btn-primary" name="save">them</button>
            <button class="btn btn-danger" name="cancel">huy</button>
        </div>
    </form>
    <div>
        <h3>danh sach</h3>

    </div>
</body>
</html>


