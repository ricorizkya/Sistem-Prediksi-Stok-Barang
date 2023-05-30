<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../koneksi.php";

$id_produk  = $_POST['id_produk'];
$id_admin   = $_POST['id_admin'];
$format     = date("Y-m-d H:i:s");
$stok       = $_POST['stok'];
$ukuran     = $_POST['ukuran'];
$status     = 0;
$stoksaatini = 0;
$ukuransaatini = "";

if(isset($_POST['update'])) {
    $cekstok = mysqli_query($con, "SELECT * FROM tb_stok WHERE id_produk=$id_produk AND status=0 ORDER BY id_stok DESC LIMIT 1");
    $d = mysqli_fetch_array($cekstok);
    if($d != null && $d['stok_produk'] != null && $d['ukuran_produk'] != null) {
        $stoksaatini = $d['stok_produk'];
        $ukuransaatini = $d['ukuran_produk'];
        mysqli_query($con, "INSERT INTO tb_stok(id_admin, id_produk, ukuran_produk, stok_produk, tgl, status) VALUES ('$id_admin','$id_produk','$ukuran','$stok','$format','$status')");
            if($ukuran == $ukuransaatini){
                $stoksetelahupdate = $stoksaatini + $stok;
                mysqli_query($con, "INSERT INTO tb_stok(id_admin, id_produk, ukuran_produk, stok_produk, tgl, status) VALUES ('$id_admin','$id_produk','$ukuran','$stoksetelahupdate','$format','$status')");
                echo"<script>alert('Data Berhasil Di Update'); window.location = 'data_produk.php'</script>";
            }else {
                echo"<script>alert('Data Gagal Di Update'); window.location = 'data_produk.php'</script>";
            }
    }else {
        $queryInsert = mysqli_query($con, "INSERT INTO tb_stok(id_admin, id_produk, ukuran_produk, stok_produk, tgl, status) VALUES ('$id_admin','$id_produk','$ukuran','$stok','$format','$status')");
        if($queryInsert) {
            echo"<script>alert('Data Berhasil Di Update'); window.location = 'data_produk.php'</script>";
        }else {
            echo"<script>alert('Data Gagal Di Update'); window.location = 'data_produk.php'</script>";
        }
    }
}

?>