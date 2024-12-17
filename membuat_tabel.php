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
$sql = "CREATE TABLE makanan (
id_makanan INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nama_makanan VARCHAR(30) NOT NULL,
deskripsi text,
foto VARCHAR(50)
)";
if (mysqli_query($conn, $sql)) {
    echo "Table Makanan berhasil dibuat";
} else {
    echo "Gagal membuat tabel: " . mysqli_error($conn);
}
mysqli_close($conn);
