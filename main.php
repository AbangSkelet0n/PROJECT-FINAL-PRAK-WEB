<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsana Rupa - Budaya Nusantara</title>
    <link rel="stylesheet" href="stylemain.css"> <!-- Link ke file CSS eksternal -->
</head>

<body> 
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container-nav">
            <div class="logo">
                <img src="assets/LOGO ARSANA RUPA.png" alt="Logo Arsana Rupa" height="50">
                <h1>Arsana Rupa</h1>
            </div>
            <div class="navbar-links">
                <a href="#articles">Article</a>
                <a href="#searchArticle">Search Article</a>
                <a href="sistem-login/logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <h1>Arsana<br />Rupa</h1>
            <p>
                Temukan cerita, tradisi, dan keindahan seni budaya yang memikat hati. <br>
                Mari kita lestarikan warisan leluhur dan bangga akan jati diri bangsa bersama Arsana Rupa!
            </p>
        </div>
    </section>

    <!-- Halaman Utama -->
    <main class="main-content">
        <div class="container">
            <div class="pembuka-main">
                <h1>Selamat Datang di Arsana Rupa</h1>
                <p>Temukan artikel menarik tentang budaya Nusantara di sini!</p>
            </div>


            <!-- Daftar Artikel -->
            <div class="articles" id="articles">
                <?php
                // Koneksi ke database
                $conn = new mysqli('localhost', 'root', '', 'db_websulsel');

                // Cek koneksi
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                // Query untuk mendapatkan data artikel
                $sql = "SELECT id_makanan, nama_makanan, deskripsi, foto FROM makanan";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data untuk setiap baris
                    while ($row = $result->fetch_assoc()) {
                        $imagePath = !empty($row['foto']) ? "uploads/" . $row['foto'] : "assets/placeholder.jpg";
                        echo "<div class='article-card'>"; // Menggunakan 'article-card' untuk styling
                        echo "<a href='article.php?id=" . $row['id_makanan'] . "' class='card-link'>"; // Membuat link untuk setiap card
                        echo "<img src='" . htmlspecialchars($imagePath) . "' alt='" . htmlspecialchars($row['nama_makanan']) . "' class='article-image'>";
                        echo "<h2 class='article-title'>" . htmlspecialchars($row['nama_makanan']) . "</h2>";
                        echo "<p class='article-description'>" . htmlspecialchars(substr($row['deskripsi'], 0, 150)) . "...</p>";
                        echo "<span class='read-more'>Baca Selengkapnya</span>"; // Mengganti link dengan teks
                        echo "</a>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Tidak ada artikel yang ditemukan.</p>";
                }

                // Tutup koneksi
                $conn->close();
                ?>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Arsana Rupa. Semua hak dilindungi.</p>
        </div>
    </footer>




</body>

</html>