<!DOCTYPE html>
<html>
<head>
    <title>Website Demo</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Trang web của tôi</h1>
        <nav>
            <a href="index.php">Trang chủ</a> |
            <a href="index.php?controller=product">Sản phẩm</a>
        </nav>
    </header>

    <main>
        <?php require $view; ?>
    </main>

    <footer>
        <p>© 2025 - Trang web MVC không dùng class</p>
    </footer>
</body>
</html>