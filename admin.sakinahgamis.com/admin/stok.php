<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../koneksi.php";

$nama   = $_POST['nama'];
$bahan  = $_POST['bahan'];
$ukuran = $_POST['ukuran'];
$sablon = $_POST['sablon'];
$harga  = $_POST['harga'];

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
            $query = mysqli_query($con,"INSERT INTO tb_produk(nama_produk,kategori,ukuran,sablon,harga,gambar) VALUES ('$nama','$bahan','$ukuran','$sablon','$harga','$filename')");
            if($query) {
                header("location:data_produk.php");
            }else {
                header("location:data_produk.php?alert=GAGAL");
            }
        }else {
            $message = "MASIH ERROR YA NGENTODDDD";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }else {
        header("location:data_produk.php?alert=gagal_ukuran"); 
    }
}else {
    header("location:data_produk.php?alert=gagal_ekstensi");
}

?>