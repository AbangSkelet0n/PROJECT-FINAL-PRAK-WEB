<?php
session_start();

// Cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username dan password tidak boleh kosong.";
        header("Location: signup.php"); // Arahkan kembali ke halaman signup
        exit();
    }

    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'db_websulsel');

    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Cek apakah username sudah ada
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Username sudah digunakan.";
        header("Location: signup.php"); // Arahkan kembali ke halaman signup
        exit();
    }

    // Enkripsi password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Simpan pengguna baru ke database
    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, 'user')");
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        // Pendaftaran berhasil
        $_SESSION['success'] = "Pendaftaran berhasil. Silakan login.";
        header("Location: login.php"); // Arahkan ke halaman login
    } else {
        $_SESSION['error'] = "Terjadi kesalahan. Silakan coba lagi.";
        header("Location: signup.php"); // Arahkan kembali ke halaman signup
    }

    // Tutup koneksi
    $stmt->close();
    $conn->close();
}
?>
