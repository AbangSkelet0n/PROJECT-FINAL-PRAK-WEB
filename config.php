<?php
// Membuat koneksi ke basis data db_websulsel
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_websulsel';
$conn = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_errno()) {
    echo "Koneksi gagal: " . mysqli_connect_error();
}
