<?php
session_start();
ob_start();
// Mengecek session
if (empty($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu')</script>";
    echo "<meta http-equiv='refresh' content='0; url=sistem-login/login.php'>";
} else {
  $username = $_SESSION['username'];
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="styleadmin.css">
</head>

<body>
    <header>
    Dashboard Admin
    </header>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <nav>
                <ul>
                    <li><a href="tabel-makanan.php">Tambah Data</a></li>
                    <li><a href="sistem-login/logout.php">Keluar</a></li>
                </ul>
            </nav>
        </aside>
        <!-- Konten Utama -->
        <section class="content">
            <h1>Data Artikel Kebudayaan</h1>
            <!-- Formulir Tambah Makanan -->
            <form id="food-form" action="makanan_insert.php" method="post"
                enctype="multipart/form-data">
                <h2>Tambah Artikel</h2>
                <label for="food-name">Nama Artikel:</label>
                <input type="text" id="nama_makanan" name="nama_makanan" placeholder="Masukkan nama Artikel..."
                    required oninvalid="this.setCustomValidity('Ups! Kolom ini tidak boleh kosong')"
                    oninput="setCustomValidity('')">
                <label for="food-desc">Deskripsi Artikel:</label>
                <input type="text" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi Artikel..."
                    required oninvalid="this.setCustomValidity('Ups! Kolom ini tidak boleh kosong')"
                    oninput="setCustomValidity('')">
                <label for="food-image">Gambar Artikel:</label>
                <input type="file" id="foto" name="foto">
                <div class="add-button">
                    <button type="submit" id="submit-btn">Simpan</button>
                    <button type="reset">Batal</button>
                </div>

            </form>
            <!-- Tabel Data Makanan -->
            <?php
            include "makanan_tampil.php";
            ?>
        </section>
    </div>
</body>

</html>

<?php
    }
?>