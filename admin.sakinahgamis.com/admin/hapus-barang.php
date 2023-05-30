<?php
include '../koneksi.php';
$id_barang = $_GET['kd'];

$query = mysql_query("DELETE FROM tb_barang WHERE id_barang='$id_barang'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'databarang.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'databarang.php'</script>";	
}
?>