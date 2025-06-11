<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="view/style.css">
    <script src="view/asm.js"></script>
</head>
<body>
        <form class="login_form" action="" method="post">
        <div>
        <div class="background_filler"></div>
        <h1>Log in Form</h1>
        <div class="email_form">
          <label for="email">email</label>
          <input type="text" name="email" autocomplete="off" />
        </div>
        <div class="password_form">
          <label for="">password</label>
          <input type="text" />
        </div>
        <div>
          <button name="Login_User" class="btn_login">Log In</button>
          <p>Bạn chưa có tài khoản?</p>
          <button class="btn_signup">Sign Up</button>
        </div>
      </div>
    </form>
        <header>

      <div class="gioHang">
        <a href="#">
            <img src="view/img/giohang.png" alt="" />
        </a>


      </div>
      <div class="login_admin">
                <button>
            <img onclick="hienform()" src="view/img/loginP.png" alt="" />
        </button>
      </div>
    </header>
    <section class="menu">
      <nav>
        <ul>
          <li><a href="?page=home">Trang Chủ</a></li>
          <li><a href="?page=controller">Top bán chạy</a></li>
          <li><a href="#">Shop Đồ cũ</a></li>
          <li><a href="#">Ví tiền</a></li>
          <li><a href="#">Xu miễn phí</a></li>
        </ul>
      </nav>
    </section>

</body>
</html>