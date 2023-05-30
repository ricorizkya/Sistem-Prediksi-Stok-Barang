<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../koneksi.php";
global $con;

	$username 	= $_POST['username'];
	$password	= $_POST['password'];
	$fullname	= $_POST['fullname'];
	$telepon	= $_POST['telepon'];
	$email		= $_POST['email'];
	$alamat		= $_POST['alamat'];
	
	
 		
	$sql =mysqli_query($con,"INSERT INTO tb_admin (username,password,nama_admin,telp_admin,email_admin,alamat_admin) VALUES
         ('$username','$password','$fullname','$telepon','$email','$alamat')");
			
	if($sql){echo"<script>alert('Data Berhasil'); window.location = 'data_admin.php'</script>";	
	} else {
		
			echo "<script>alert('Data Gagal'); window.location = 'data_admin.php'</script>";	
	}

?>