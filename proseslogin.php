<?php
include ("koneksi.php");
// date_default_timezone_set('Asia/Jakarta');

session_start();
global $con;

$username = $_POST['username'];
$password = $_POST['password'];



if (empty($username) && empty($password)) {
	header('location:index.php?error=1');
} else if (empty($username)) {
	header('location:index.php?error=2');
} else if (empty($password)) {
	header('location:index.php?error=3');
}

$q = mysqli_query($con,"select * from tb_admin where username='$username' and password='$password'");
$row = mysqli_fetch_array ($q);

// var_dump($row);
// exit;

if (mysqli_num_rows($q) == 1) {
		$_SESSION['id_admin'] = $row['id_admin'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['nama_admin'] = $row['nama_admin'];
	    $_SESSION['telp_admin'] = $row['telp_admin'];
	    $_SESSION['email_admin'] = $row['email_admin'];
	    $_SESSION['alamat_admin'] = $row['alamat_admin'];	

		// header('location:admin/index.php');
		echo "<script>alert('LOGIN SUKSES'); window.location = 'admin/index.php'</script>";
} else {
	echo "<script>alert(' Maaf Login Gagal, Silahkan Isi Username atau Password Anda Dengan Benar'); window.location = 'index.php'</script>";
}
?>