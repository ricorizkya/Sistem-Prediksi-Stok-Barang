<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../koneksi.php";

$id_user  = $_POST['id_user'];
$ekstensi = array('png','jpg','jpeg');
$filename = $_FILES['gambar']['name'];
$size     = $_FILES['gambar']['size'];
$temp     = $_FILES['gambar']['tmp_name'];
$path     = '/gambar/';
$target   = $path.basename($_FILES['gambar']['name']);
$ext      = pathinfo($filename, PATHINFO_EXTENSION);

if(in_array($ext, $ekstensi) === true) {
    if($size < 1044070) {
        $root = getcwd();
        if(move_uploaded_file($temp,$root.$target)) {
            $query = mysqli_query($con,"UPDATE tb_admin SET gambar='$filename' WHERE id_user='$id_user'");
            if($query) {
                echo "<script>alert('Update Foto Admin Berhasil'); </script>";
            }else {
                echo "<script>alert('Update Foto Admin GAGAL'); </script>";
            }
        }else {
            echo "<script>alert('Update Foto Admin GAGAL'); </script>";
        }
    }else {
        echo "<script>alert('Ukuran Tidak Sesuai'); </script>"; 
    }
}else {
    echo "<script>alert('Ekstensi Tidak Sesuai'); </script>";
}

?>