<?php
session_start();
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']); // Hapus pesan error setelah ditampilkan
?>
<!DOCTYPE html>
<html>

<head>
  <title>Sign Up</title>
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
      <h2>Sign Up Aplikasi</h2>
      <?php if ($error): ?>
        <div class="error-message"><?php echo $error; ?></div>
      <?php endif; ?>
      <form method="post" action="ceksignup.php">
        <input type="text" placeholder="username" name="username" id="username" required>
        <input type="password" placeholder="password" name="password" id="password" required>
        <input type="submit" value="Sign Up">
      </form>
    </section>
  </div>
  <footer class="footer-login">
    Copyright &copy; 2024
  </footer>
</body>

</html>