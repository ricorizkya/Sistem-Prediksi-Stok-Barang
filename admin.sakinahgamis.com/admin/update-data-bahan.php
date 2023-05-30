<?php
 //tempat menyimpan file

include "koneksi.php";
	
	$id_bahan	= $_POST['id_bahan'];
    $kd_bahan   = $_POST['kd_bahan']
    $nama_bahan = $_POST['nama_bahan'];
	$stok_awal	= $_POST['stok_awal'];
    $sisa		= $_POST['sisa'];
	
	$sql =mysql_query("UPDATE tb_bahan set  kd_bahan='$kd_bahan' nama_bahan='$nama_bahan',stok_awal='$stok_awal',sisa='$sisa'='$email' where id_bahan='$id_bahan' ");
            
			if($sql){echo"<script>alert('Data Berhasil'); window.location = 'datastokbahan.php'</script>";	
	} else {
			echo "<script>alert('Data Gagal'); window.location = 'tambah-bahan.php'</script>";	
	}


?>