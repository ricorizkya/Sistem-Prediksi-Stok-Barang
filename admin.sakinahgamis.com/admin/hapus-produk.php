<?php
include '../koneksi.php';
$id_produk = $_GET['kd'];

$query = mysqli_query($con,"DELETE FROM tb_produk WHERE id_produk='$id_produk'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'data_produk.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'data_produk.php'</script>";	
}
?>