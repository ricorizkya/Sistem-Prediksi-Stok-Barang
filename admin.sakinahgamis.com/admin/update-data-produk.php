<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include "../koneksi.php";
global $con;
	
	$id_produk	= $_POST['id_produk'];
    $nama       = $_POST['nama'];
    $kategori	= $_POST['kategori'];
	$harga		= $_POST['harga'];
	
	$sql =mysqli_query($con,"UPDATE `tb_produk` SET `nama_produk`='$nama',`kategori_produk`='$kategori',`harga_produk`='$harga' WHERE `id_produk`='$id_produk';");
            
	if($sql){
		echo"<script>alert('Data Berhasil'); window.location = 'data_produk.php'</script>";	
	} else {
		echo "<script>alert('Data Gagal'); window.location = 'edit-produk.php'</script>";	
	}


?>