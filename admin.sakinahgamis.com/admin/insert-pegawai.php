<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../koneksi.php";

$nama   = $_POST['nama'];
$tgl	= $_POST['tgl_lahir'];
$jekel	= $_POST['jekel'];
$alamat	= $_POST['alamat'];
$telp	= $_POST['telp'];
$email	= $_POST['email'];

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
            $query = mysqli_query($con,"INSERT INTO tb_pegawai(nama,tgl_lahir,jekel,alamat,telp,email,gambar) VALUES ('$nama','$tgl','$jekel','$alamat','$telp','$email','$filename')");
            if($query) {
                header("location:datapegawai.php");
            }else {
                header("location:datapegawai.php?alert=GAGAL");
            }
        }else {
            $message = "MASIH ERROR YA NGENTODDDD";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }else {
        header("location:datapegawai.php?alert=gagal_ukuran");
    }
}else {
    header("location:datapegawai.php?alert=gagal_ekstensi");
}

?>