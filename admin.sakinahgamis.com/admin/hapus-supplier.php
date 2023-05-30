<?php
include '../koneksi.php';
$id_supplier = $_GET['kd'];

$query = mysql_query("DELETE FROM tb_supplier WHERE id_supplier='$id_supplier'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'datasupplier.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'datasupplier.php'</script>";	
}
?>