<?php
 //tempat menyimpan file

include "koneksi.php";
	
	$id_supplier= $_POST['id_supplier'];
    $nama 		= $_POST['nama'];
	$alamat		= $_POST['alamat'];
    $email		= $_POST['email'];
	$telp		= $_POST['telp'];
	
	
	$sql =mysql_query("UPDATE tb_supplier set nama='$nama',alamat='$alamat',email='$email',telp='$telp' where id_supplier='$id_supplier' ");
            
			if($sql){echo"<script>alert('Data Berhasil'); window.location = 'datasupplier.php'</script>";	
	} else {
			echo "<script>alert('Data Gagal'); window.location = 'tambah_supplier.php'</script>";	
	}


?>