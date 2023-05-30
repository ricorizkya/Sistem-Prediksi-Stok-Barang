<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../koneksi.php";

$tanggal    = $_POST['tanggal'];
$format     = date("Y-m-d H:i:s", strtotime($tanggal));
$nama       = $_POST['nama'];
$produk     = $_POST['produk'];
$jumlah     = $_POST['jumlah']; 
$harga      = $_POST['harga'];
$total      = (int)$jumlah*(int)$harga;
$statuskeluar     = 1;
$statussekarang   = 0;

if(isset($_POST['simpan'])) {
    $querystok = mysqli_query($con, "SELECT * FROM tb_stok WHERE id_produk=$produk AND status=0 ORDER BY id_stok DESC LIMIT 1");
    $cekstok = mysqli_fetch_array($querystok);
    $stokawal = $cekstok['stok'];
    
    if($stokawal>$jumlah) {
        $sql = mysqli_query($con, "INSERT INTO tb_penjualan(tgl_order,nama_user,id_produk,jumlah_order,total) VALUES ('$format','$nama','$produk','$jumlah','$total')");
        if($sql) {
            mysqli_query($con, "INSERT INTO tb_stok(id_produk,tgl,stok,status) VALUES ('$produk','$format','$jumlah','$statuskeluar')");
            $stoksekarang = $stokawal-$jumlah;
            mysqli_query($con, "INSERT INTO tb_stok(id_produk,tgl,stok,status) VALUES ('$produk','$format','$stoksekarang','$statussekarang')");
            header("location:datapenjualan.php");
        }else {
            header("location:datapenjualan.php?alert=GAGAL");
        }
    }else {
        echo "<script>alert('Stok barang yang dipilih tidak cukup'); window.location = 'tambahdatapenjualan.php'</script>";	
    }
}

?>