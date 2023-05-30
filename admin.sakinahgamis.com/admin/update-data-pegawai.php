<?php
 //tempat menyimpan file

include "koneksi.php";
	
	$id_pegawai	= $_POST['id_pegawai'];
    $nama 		= $_POST['nama'];
	$tgl_lahir	= $_POST['tgl_lahir'];
    $jekel		= $_POST['jekel'];
	$alamat		= $_POST['alamat'];
	$telp		= $_POST['telp'];
	$email		= $_POST['email'];
	
	$sql =mysql_query("UPDATE tb_pegawai set nama='$nama',tgl_lahir='$tgl_lahir',jekel='$jekel',alamat='$alamat',telp='$telp',email='$email' where id_pegawai='$id_pegawai' ");
            
			if($sql){echo"<script>alert('Data Berhasil'); window.location = 'datapegawai.php'</script>";	
	} else {
			echo "<script>alert('Data Gagal'); window.location = 'tambah_pegawai.php'</script>";	
	}


?>