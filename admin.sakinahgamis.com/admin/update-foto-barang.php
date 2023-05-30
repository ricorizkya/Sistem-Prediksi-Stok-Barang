<?php
$namafolder="../gambar/"; //tempat menyimpan file

include "koneksi.php";

if (!empty($_FILES["gambar"]["tmp_name"]))
{
        $gambar 	=$_FILES['gambar']['type'];
        $id_barang	= $_POST['id_barang'];

		
	if($gambar=="image/jpeg" || $gambar=="image/jpg" || $gambar=="image/gif" || $gambar=="image/png")
	{			
		$gambar = $namafolder . basename($_FILES['gambar']['name']);		
		if (move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar)) {
			$sql="UPDATE tb_barang SET gambar='$gambar' WHERE id_barang='$id_barang'";
			$res=mysql_query($sql) or die (mysql_error());  
            echo "<script>alert('Update Foto barang Berhasil'); window.location = 'databarang.php'</script>"; 
		} else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
   } else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	echo "<script>alert('Update Foto barang Berhasil'); window.location = 'databarang.php'</script>";
}

?>

