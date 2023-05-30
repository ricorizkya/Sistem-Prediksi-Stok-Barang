<?php
$servername = "localhost";
$username = "saki7979_root";
$password = "SakinahRoot123";
$dbname = "saki7979_db";

// Membuat koneksi
$con = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
