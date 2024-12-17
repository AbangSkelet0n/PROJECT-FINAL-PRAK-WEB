<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "db_websulsel";
//Membuat koneksi
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
    echo "Koneksi gagal: " . mysqli_connect_error();
}
//query membuat tabel
$sql = "CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL
)";
if (mysqli_query($conn, $sql)) {
    echo "Table user berhasil dibuat";
} else {
    echo "Gagal membuat tabel: " . mysqli_error($conn);
}
mysqli_close($conn);
