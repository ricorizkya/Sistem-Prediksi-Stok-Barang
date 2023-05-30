<?php
$namafolder="../gambar/"; //tempat menyimpan file

include "../koneksi.php";

if (!empty($_FILES["gambar"]["tmp_name"]))
{
		$gambar 	= $_FILES['gambar']['type'];
		$nama_barang= $_POST['nama_barang'];
		$kategori	= $_POST['kategori'];
        $ukuran	    = $_POST['ukuran'];
        $sablon		= $_POST['sablon'];
		$harga		= $_POST['harga'];
        $stok		= $_POST['stok'];
        $deskripsi	= $_POST['deskripsi'];
		
	if($gambar=="image/jpeg" || $gambar=="image/jpg" || $gambar=="image/gif" || $gambar=="image/png")
	{			
		$gambar = $namafolder . basename($_FILES['gambar']['name']);		
		if (move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar)) {
			$sql="INSERT INTO tb_barang(nama_barang,kategori,ukuran,sablon,harga,stok,deskripsi,gambar) VALUES
            ('$nama_barang','$kategori','$ukuran','$sablon','$harga','$stok','$deskripsi','$gambar')";
			$res=mysql_query($sql) or die (mysql_error());
			echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<h3><a href='tambah_barang.php'> Input Lagi</a></h3>";
            echo "<h3><a href='databarang.php'> Data Barang</a></h3>";	   
		} else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
   } else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	echo "Anda belum memilih gambar";
}

?>