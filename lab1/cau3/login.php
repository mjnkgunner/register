<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <form action="" method="post">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" required>
        <br>
        <button name="login" type="submit">Đăng nhập</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username == 'admin' && $password == '123456') {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header("location: home.php ");
        } else {
        echo "<p style='color: red;'>Tên đăng nhập hoặc mật khẩu không đúng!</p>";
    } 
    }
    ?>

</body>
</html>