<?php
 //tempat menyimpan file

include "../koneksi.php";
	
	$id_penjualan	= $_POST['id_penjualan'];
    $nama_brg  = $_POST['nama_brg']
    $bulan = $_POST['bulan'];
	$tahun	= $_POST['tahun'];
    $banyak		= $_POST['banyak'];
	
	$sql =mysql_query("UPDATE tb_penjualan set  nama_brg='$nama_brg' bulan='$bulan',tahun='$tahun',banyak='$banyak'='$email' where id_penjualan='$id_penjualan' ");
            
			if($sql){echo"<script>alert('Data Berhasil'); window.location = 'datapenjualan.php'</script>";	
	} else {
			echo "<script>alert('Data Gagal'); window.location = 'tambah-penjualan.php'</script>";	
	}


?>