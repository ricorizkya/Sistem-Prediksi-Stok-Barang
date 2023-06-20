<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../koneksi.php";

$nama   = $_POST['nama'];
$kategori  = $_POST['kategori'];
$harga  = $_POST['harga'];
$hargaBeli = $_POST['hargaBeli'];
$deskripsi = $_POST['deskripsi'];

$ekstensi = array('png','jpg','jpeg');
$filename = $_FILES['fati']['name'];
$size     = $_FILES['fati']['size'];
$temp     = $_FILES['fati']['tmp_name'];
$path     = '/gambar/produk/';
$target   = $path.basename($_FILES['fati']['name']);
$ext      = pathinfo($filename, PATHINFO_EXTENSION);

if(in_array($ext, $ekstensi) === true) {
    if($size < 1044070) {
        $root = getcwd();
        if(move_uploaded_file($temp,$root.$target)) {
            $query = mysqli_query($con,"INSERT INTO `tb_produk`(`nama_produk`, `kategori_produk`, `deskripsi`, `gambar_produk`, `harga_beli`, `harga_produk`) VALUES ('$nama','$kategori','$deskripsi','$filename','$hargaBeli','$harga')");
            if($query) {
                header("location:data_produk.php");
            }else {
                header("location:data_produk.php?alert=GAGAL");
            }
        }else {
            $message = "MASIH ERROR";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }else {
        header("location:data_produk.php?alert=gagal_ukuran"); 
    }
}else {
    header("location:data_produk.php?alert=gagal_ekstensi");
}

?>