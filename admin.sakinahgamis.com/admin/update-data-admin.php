<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include "../koneksi.php";
global $con;
	$id_user	= $_POST['id_user'];
    $username 	= $_POST['username'];
    $password	= $_POST['password'];
	$fullname	= $_POST['fullname'];
	$telepon	= $_POST['telepon'];
	$email		= $_POST['email'];
	$alamat		= $_POST['alamat'];
	
	$sql =mysqli_query($con,"UPDATE tb_admin set username='$username',password='$password',nama_admin='$fullname',telp_admin='$telepon',email_admin='$email',alamat_admin='$alamat' where id_admin='$id_user' ");
            
	if($sql) {
		 echo"<script>alert('Data Berhasil'); window.location = 'data_admin.php'</script>";	
	} else {
			echo "<script>alert('Data Gagal'); window.location = 'edit-admin.php'</script>";	
	}


?>