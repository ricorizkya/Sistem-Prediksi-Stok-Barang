<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../koneksi.php';
$id_user = $_GET['kd'];

$query = mysqli_query($con,"DELETE FROM tb_admin WHERE id_admin='$id_user'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'data_admin.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'data_admin.php'</script>";	
}
?>