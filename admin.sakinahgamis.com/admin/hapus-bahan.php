<?php
include '../koneksi.php';
$id_bahan = $_GET['kd'];

$query = mysql_query("DELETE FROM tb_bahan WHERE id_bahan='$id_bahan'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'datastokbahan.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'datastokbahan.php'</script>";	
}
?>