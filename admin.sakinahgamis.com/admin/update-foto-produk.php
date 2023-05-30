<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../koneksi.php";

$id  = $_POST['id_produk'];
$ekstensi = array('png','jpg','jpeg');
$filename = $_FILES['gambar']['name'];
$size     = $_FILES['gambar']['size'];
$temp     = $_FILES['gambar']['tmp_name'];
$path     = '/gambar/produk/';
$target   = $path.basename($_FILES['gambar']['name']);
$ext      = pathinfo($filename, PATHINFO_EXTENSION);

if(in_array($ext, $ekstensi) === true) {
    if($size < 1044070) {
        $root = getcwd();
        if(move_uploaded_file($temp,$root.$target)) {
            $query = mysqli_query($con,"UPDATE tb_produk SET gambar='$filename' WHERE id_produk='$id'");
            if($query) {
                echo "<script>alert('Update Foto Produk Berhasil'); </script>";
            }else {
                echo "<script>alert('Update Foto Produk GAGAL'); </script>";
            }
        }else {
            echo "<script>alert('Update Foto Produk GAGAL'); </script>";
        }
    }else {
        echo "<script>alert('Ukuran Tidak Sesuai'); </script>"; 
    }
}else {
    echo "<script>alert('Ekstensi Tidak Sesuai'); </script>";
}

?>