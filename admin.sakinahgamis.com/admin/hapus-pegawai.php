<?php
include '../koneksi.php';
$id_pegawai = $_GET['kd'];

$query = mysql_query("DELETE FROM tb_pegawai WHERE id_pegawai='$id_pegawai'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'datapegawai.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'datapegawai.php'</script>";	
}
?>