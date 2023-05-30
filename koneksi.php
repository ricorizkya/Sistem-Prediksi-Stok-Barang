<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sakinah";

// Membuat koneksi
$con = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>