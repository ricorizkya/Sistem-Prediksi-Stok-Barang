<?php
 //tempat menyimpan file

include 'koneksi.php';


	$kd_bahan 	= $_POST['kd_bahan'];
	$nama_bahan	= $_POST['nama_bahan'];
	$stok_awal	= $_POST['stok_awal'];
	$sisa		= $_POST['sisa'];
	
	
 		
	$sql =mysql_query("INSERT INTO tb_bahan (kd_bahan,nama_bahan,stok_awal,sisa) VALUES
         ('$kd_bahan','$nama_bahan','$stok_awal','$sisa')");
			
	if($sql){echo"<script>alert('Data Berhasil'); window.location = 'datastokbahan.php'</script>";	
	} else {
		
			echo "<script>alert('Data Gagal'); window.location = 'tambah-bahan.php'</script>";	
	}

 

?> 