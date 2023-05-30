<?php
 //tempat menyimpan file

include "koneksi.php";
	
	$id_barang  	= $_POST['id_barang'];
    $nama_barang    = $_POST['nama_barang'];
    $kategori	    = $_POST['kategori'];
	$ukuran	        = $_POST['ukuran'];
    $sablon	        = $_POST['sablon'];
    $harga		    = $_POST['harga'];
	$stok		    = $_POST['stok'];
    $deskripsi		= $_POST['deskripsi'];
	
	$sql =mysql_query("UPDATE tb_barang set nama_barang='$nama_barang',kategori='$kategori',ukuran='$ukuran',sablon='$sablon',harga='$harga',stok='$stok',deskripsi='$deskripsi' where id_barang='$id_barang' ");
            
			if($sql){echo"<script>alert('Data Berhasil'); window.location = 'databarang.php'</script>";	
	} else {
			echo "<script>alert('Data Gagal'); window.location = 'insert-barang.php'</script>";	
	}


?>