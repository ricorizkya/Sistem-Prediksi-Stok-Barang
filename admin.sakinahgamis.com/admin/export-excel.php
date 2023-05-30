<?php

include "../koneksi.php";

    $bulan = $_GET['bulan'];
    $tahun = $_GET['tahun'];
    $query = mysqli_query($con,"select * from tb_penjualan left join tb_produk on tb_penjualan.id_produk = tb_produk.id_produk WHERE MONTH(tb_penjualan.tgl_order)='$bulan' AND YEAR(tb_penjualan.tgl_order)='$tahun'");

    $filename = "Data Penjualan Bulan ".$bulan." Tahun ".$tahun;
    header("Content-Type: application/vnd-ms-excel"); 
    header('Content-Disposition: attachment; filename="' . $filename . '.xls";');
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <td>
                No
            </td>
            <td>
                Tgl Order
            </td>
            <td>
                Nama Customer
            </td>
            <td>
                Nama Pesanan
            </td>
            <td>
                Jumlah Pesanan
            </td>
            <td>
                Total
            </td>
        </tr>
        <?php
    $no=0;
    while($data=mysqli_fetch_array($query))
    {
        $no++;
        $nama = $data['nama_produk'];
        $bahan = $data['kategori'];
        $ukuran = $data['ukuran'];
        $sablon = $data['sablon'];
        $harga  = $data['harga'];
    ?>
        <tr>
            <td>
                <?php echo $no; ?>
            </td>
            <td>
                <?php echo $data['tgl_order']; ?>
            </td>
            <td>
                <?php echo $data['nama_user']; ?>
            </td>
            <td>
                <?php echo $nama." ".$bahan." - ".$ukuran." cm - ".$sablon; ?>
            </td>
            <td>
                <?php echo $data['jumlah_order'];?> PCS
            </td>
            <td>
                Rp<?php echo number_format($data['total'],0,'','.');?>,-
            </td>
        </tr>
        <?php } ?>
    </table>
</body>

</html>