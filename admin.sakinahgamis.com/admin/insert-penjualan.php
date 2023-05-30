<?php
 //tempat menyimpan file

include 'koneksi.php';


	$nama_brg   = $_POST['nama_brg'];
	$bulan  	= $_POST['bulan'];
	$tahun	    = $_POST['tahun'];
	$banyak		= $_POST['banyak'];
	
	
 		
	$sql =mysql_query("INSERT INTO tb_penjualan(nama_brg,bulan,tahun,banyak) VALUES
         ('$nama_brg','$bulan','$tahun','$banyak')");
			
	if($sql){echo"<script>alert('Data Berhasil'); window.location = 'datapenjualan.php'</script>";	
	} else {
		
			echo "<script>alert('Data Gagal'); window.location = 'tambah-penjualan.php'</script>";	
	}

 

?> 