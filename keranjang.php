<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    include 'koneksi.php';
    session_start();
    $email = $_SESSION['email'];
      
    $queryIDUser = "SELECT * FROM tb_user WHERE email_user='$email'";
    $resultIDUser = mysqli_query($con, $queryIDUser);
    $dataIDUser = mysqli_fetch_assoc($resultIDUser);
    $IDUser = $dataIDUser['id_user'];

    echo $email;

    if(isset($_POST['keranjang'])) {
        $idProduk = $_POST['id'];
        $qtyProduk = $_POST['qty'];

        $queryKeranjang = "INSERT INTO tb_keranjang (id_user,id_barang,qty_barang) VALUES ($IDUser,$idProduk,$qtyProduk)";
        if(mysqli_query($con,$queryKeranjang)) {
            echo '<script>alert("Produk berhasil dimasukkan ke dalam keranjang!"); window.location.href = "produk.php?id='.$idProduk.'";</script>';
            exit;
        }else {
            echo '<script>alert("Produk gagal dimasukkan ke dalam keranjang!"); window.location.href = "produk.php?id='.$idProduk.'";</script>';
        }
    }
?>