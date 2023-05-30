<?php
include '../koneksi.php';
$id_penjualan = $_GET['kd'];

$query = mysql_query("DELETE FROM tb_penjualan WHERE id_penjualan='$id_penjualan'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'datapenjualan.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'datapenjualan.php'</script>";	
}
?>