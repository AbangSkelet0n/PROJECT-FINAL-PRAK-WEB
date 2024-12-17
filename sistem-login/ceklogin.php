<?php
session_start();

// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'db_websulsel');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']); // Periksa apakah checkbox "Remember Me" dicentang

    // Validasi input kosong
    if (empty($username) || empty($password)) {
        echo "<script>alert('Username dan Password belum diisi');</script>";
        echo "<meta http-equiv='refresh' content='0;url=login.php'>";
        exit;
    }

    // Query untuk mendapatkan data pengguna
    $sql = "SELECT password, role FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verifikasi password
            if (password_verify($password, $row['password'])) {
                // Login berhasil
                $_SESSION['login'] = 1;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $row['role']; // Simpan role ke dalam session

                // Jika "Remember Me" dipilih, set cookie
                if ($remember) {
                    setcookie('username', $username, time() + (7 * 24 * 60 * 60), "/"); // Cookie berlaku 7 hari
                    setcookie('password', $password, time() + (7 * 24 * 60 * 60), "/");
                }

                // Redirect ke halaman berdasarkan role
                if ($_SESSION['role'] === 'admin') {
                    header('Location: ../tabel-makanan.php'); // Halaman untuk admin
                } else {
                    header('Location: ../main.php'); // Halaman untuk user
                }
                exit; // Pastikan exit setelah redirect
            } else {
                // Password salah
                echo "<script>alert('Password yang dimasukkan salah');</script>";
                echo "<meta http-equiv='refresh' content='0;url=login.php'>";
                exit;
            }
        } else {
            // Username tidak ditemukan
            echo "<script>alert('Username tidak terdaftar');</script>";
            echo "<meta http-equiv='refresh' content='0;url=login.php'>";
            exit;
        }

        
    } else {
        // Jika terjadi kesalahan pada prepared statement
        echo "<script>alert('Terjadi kesalahan saat mempersiapkan query');</script>";
        echo "<meta http-equiv='refresh' content='0;url=login.php'>";
        exit;
    }
} else {
    // Jika bukan metode POST, arahkan kembali ke halaman login
    header('Location: login.php');
    exit;
}


?>
