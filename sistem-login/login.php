<?php
session_start();
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']); // Hapus pesan error setelah ditampilkan
?>
<!DOCTYPE html>
<html>

<head>
  <title>Login Aplikasi</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style-login.css">
</head>

<body>
  <header class="head-login">
    <nav>
      <table>
        <td>
          <img src="../assets/LOGO ARSANA RUPA.png" alt="Logo Arsna Rupa" width="100px" />
        </td>
        <td class="rkbb">
          <a href="../LandingPage.php" style="text-decoration:none; color: #D1973A;">
            <h1>Arsana <br />Rupa</h1>
          </a>
        </td>
      </table>

    </nav>
  </header>
  <div class="container">
    <section class="login-box">
      <h2>Login Aplikasi</h2>
      <form method="post" action="ceklogin.php">
        <input type="text" placeholder="username" name="username"
          id="username">
        <input type="password" placeholder="password" name="password"
          id="password">
        <label>
          <input type="checkbox" name="remember"> Cookie
        </label>
        <p>Belum punya akun? <a href="signup.php">Daftar</a></p>
        <input type="submit" value="Login">
      </form>
    </section>
  </div>
  <footer class="footer-login">
    Copyright &copy; 2024
  </footer>
</body>

</html>