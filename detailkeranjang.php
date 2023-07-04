<?php
echo "<br><br>";

ini_set('display_errors', 1);
error_reporting(E_ALL);

  include 'koneksi.php';
  session_start();
  $email = $_SESSION['email'];

  $queryIDUser = "SELECT * FROM tb_user WHERE email_user='$email'";
  $resultIDUser = mysqli_query($con, $queryIDUser);
  $dataIDUser = mysqli_fetch_assoc($resultIDUser);
  $IDUser = $dataIDUser['id_user'];

  $queryKeranjang = "SELECT SUM(qty_barang) AS keranjang FROM `tb_keranjang` WHERE id_user=$IDUser;";
  $resultKeranjang = mysqli_query($con, $queryKeranjang);
  $dataKeranjang = mysqli_fetch_assoc($resultKeranjang);
  $keranjang = $dataKeranjang['keranjang'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sakinah Gamis</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Yummy
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <?php
        if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['email'])) {
    ?>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>Sakinah Gamis<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="index.php#menu">Produk</a></li>
                    <li><a href="index.php#about">Tentang Kami</a></li>
                    <li><a href="index.php#contact">Kontak Kami</a></li>
                </ul>
            </nav><!-- .navbar -->

            <div class="dropdown">
                <a class="btn btn-book-a-table dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path
                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                    </svg>&nbsp; Akun
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="detailkeranjang.php"><svg xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" fill="#ec2727" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                            <path
                                d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z" />
                        </svg>&nbsp; Keranjang &nbsp;<span class="cart-count">
                            <?php
                                if($keranjang == 0) {
                                    echo "0";
                                }else {
                                    echo $keranjang;
                                }
                            ?></span></a>
                    <a class="dropdown-item" href="profil.php"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="#ec2727" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                            <path
                                d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                        </svg>&nbsp; Profil Saya</a>
                    <a class="dropdown-item" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="#ec2727" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                            <path fill-rule="evenodd"
                                d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg>&nbsp; Logout</a>
                </div>
            </div>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>
    <!-- End Header -->

    <?php
    }else{
    ?>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>Sakinah Gamis<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="#menu">Produk</a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                    <li><a href="#contact">Kontak Kami</a></li>
                </ul>
            </nav><!-- .navbar -->

            <a class="btn-book-a-table" href="login.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path
                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                </svg>&nbsp; Login/Register</a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>
    <!-- End Header -->
    <?php } ?>

    <?php

  if(isset($_POST['minus'])) {
    $idKeranjang = $_POST['id'];
    $qtyBarang = $_POST['qty'];
    
    if($qtyBarang > 1) {
      $queryMinus = "UPDATE tb_keranjang SET qty_barang=$qtyBarang-1 WHERE id_keranjang=$idKeranjang";
      if(mysqli_query($con, $queryMinus)){
        echo '<script>window.location.href = "detailkeranjang.php";</script>';
        exit;
      }else {
        echo '<script>window.location.href = "detailkeranjang.php";</script>';
        exit;
      }
    }else {
      $queryDelete = "DELETE FROM tb_keranjang WHERE id_keranjang=$idKeranjang";
      if(mysqli_query($con, $queryDelete)){
        echo '<script>window.location.href = "detailkeranjang.php";</script>';
        exit;
      }else {
        echo '<script>window.location.href = "detailkeranjang.php";</script>';
        exit;
      }
    }
  }elseif(isset($_POST['plus'])) {
    $idKeranjang = $_POST['id'];
    $qtyBarang = $_POST['qty'];
    
    $queryPlus = "UPDATE tb_keranjang SET qty_barang=$qtyBarang+1 WHERE id_keranjang=$idKeranjang";
    if(mysqli_query($con, $queryPlus)){
      echo '<script>window.location.href = "detailkeranjang.php";</script>';
      exit;
    }else {
      echo '<script>window.location.href = "detailkeranjang.php";</script>';
      exit;
    }
  }elseif(isset($_POST['checkout'])) {
?>

    <section id="" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <!-- <h2>Tentang Kami</h2> -->
                <p>Check<span>out</span></p>
                <h2>Cek Kembali Pesanan Anda dan Segera Lakukan Pembayaran untuk Mendapatkan Produk Impian Anda</h2>
            </div>

            <div class="row gy-4">
                <div class="col-lg-7">
                    <h5>Data Diri Penerima</h5>
                    <div class="section-header">
                        <?php
                            $queryData = "SELECT * FROM tb_user WHERE email_user='$email'";
                            $resultData = mysqli_query($con, $queryData);
                            while($dataDiri = mysqli_fetch_array($resultData)){
                        ?>
                        <span style="text-align: left; text-transform: initial;">
                            <h2 style="text-transform: initial;"><?= $dataDiri['nama_user']; ?></h2>
                            <h2 style="text-transform: initial;"><?= $dataDiri['email_user']; ?></h2>
                            <h2 style="text-transform: initial;"><?= $dataDiri['telp_user']; ?></h2>
                            <h2 style="text-transform: initial;"><?= $dataDiri['alamat_user']; ?></h2>
                            <?php } ?>
                        </span>
                    </div>
                    <?php
                    $queryQTY = "SELECT SUM(qty_barang) AS total_qty FROM tb_keranjang WHERE id_user=$IDUser";
                    $resultQTY = mysqli_query($con, $queryQTY);
                    $dataQTY = mysqli_fetch_array($resultQTY);
                    $totalQTY = $dataQTY['total_qty'];

                    if($totalQTY >= 0 && $totalQTY <= 3){
                        $ongkir = 20000;
                    }elseif($totalQTY >= 4 && $totalQTY <= 6){
                        $ongkir = 40000;
                    }elseif($totalQTY >= 7 && $totalQTY <= 9){
                        $ongkir = 60000;
                    }elseif($totalQTY >= 10 && $totalQTY <= 12){
                        $ongkir = 80000;
                    }elseif($totalQTY >=13 && $totalQTY <=15){
                        $ongkir = 100000;
                    }else {
                        $ongkir = 120000;
                    }
                    
                ?>
                    <form method="post" action="" enctype="multipart/form-data">
                        <table class="table table-borderless">
                            <thead style="background-color: #000; color: #fff;">
                                <tr>
                                    <td>
                                        <center>
                                            <h6>Nama Produk</h6>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <h6>Jumlah Produk</h6>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <h6>Subtotal</h6>
                                        </center>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $queryFix = "SELECT * FROM tb_keranjang LEFT JOIN tb_user ON tb_keranjang.id_user = tb_user.id_user LEFT JOIN tb_produk ON tb_keranjang.id_barang = tb_produk.id_produk";
                                    $resultFix = mysqli_query($con, $queryFix);
                                    
                                    $totalSemua = 0;
                                    while($dataFix = mysqli_fetch_array($resultFix)){
                                ?>
                                <tr>
                                    <td>
                                        <img src="admin.sakinahgamis.com/admin/gambar/produk/<?= $dataFix['gambar_produk'];?>"
                                            class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300"
                                            style="width: 100px; height: 150px;">&nbsp;
                                        <?php echo $dataFix['nama_produk']; ?>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <h6><?php echo $dataFix['qty_barang']; ?> PCS</h6>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <?php
                                            $qtyBarang = $dataFix['qty_barang'];
                                            $hargaBarang = $dataFix['harga_produk'];
                                            $totalHarga = $qtyBarang*$hargaBarang;
                                            $totalSemua += $totalHarga;
                                            $hargaFix = $totalSemua+$ongkir;
                                        ?>
                                        <h6>Rp
                                            <?= number_format($dataFix['harga_produk'], 0, ',', '.');?>,-</h6>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                ?>
                                <tr>
                                    <td colspan="2">
                                        <h6 style="text-align: right;">Biaya Ongkir</h6>
                                    </td>
                                    <td>
                                        <center>
                                            <h6>Rp
                                                <?= number_format($ongkir,0,',','.'); ?>,-</h6>
                                        </center>
                                    </td>
                                </tr>
                                <tr style="background-color: #000">
                                    <td colspan="2">
                                        <h5 style="text-align: right; color: white;">TOTAL</h5>
                                    </td>
                                    <td>
                                        <center>
                                            <h5 style="color: #ec2727;">Rp
                                                <?= number_format($hargaFix,0,',','.'); ?>,-
                                            </h5>
                                        </center>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-outline mb-4">
                            <div class="form-outline">
                                <label for="formFile" class="form-label">Upload Bukti Transfer <i>(Format .jpg, .jpeg,
                                        .png)</i></label>
                                <input class="form-control" type="file" id="formFile" name="bukti">
                            </div>
                        </div>
                        <button type="submit" name="bayar" class="btn btn-outline-danger btn-block"
                            style="width: 100%;">Kirim</button>
                    </form>
                </div>
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="300">
                    <div class="content ps-0 ps-lg-5">
                        <h6 style="color: #ce1212;">Silahkan transfer sesuai dengan nominal yang tertera pada
                            rekening di bawah ini.</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td>
                                    <img src="assets/img/bca.png" class="img-fluid" alt="" style="width: 80px;">
                                </td>
                                <td style="vertical-align: middle;">
                                    <h6>8365165838 a/n Shaka Rizky Ramadhan</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="assets/img/bni.png" class="img-fluid" alt="" style="width: 80px;">
                                </td>
                                <td style="vertical-align: middle;">
                                    <h6>022967785 a/n Shaka Rizky Ramadhan</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="assets/img/mandiri.png" class="img-fluid" alt="" style="width: 80px;">
                                </td>
                                <td style="vertical-align: middle;">
                                    <h6>0715789237711 a/n Shaka Rizky Ramadhan</h6>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section><?php
    }elseif(isset($_POST['bayar'])){


        $tglSekarang = date("Y-m-d H:i:s");

        $ekstensi = array('png','jpg','jpeg');
        $filename = $_FILES['bukti']['name'];
        $size     = $_FILES['bukti']['size'];
        $temp     = $_FILES['bukti']['tmp_name'];
        $path     = '/admin.sakinahgamis.com/admin/gambar/bukti/';
        $target   = $path.basename($_FILES['bukti']['name']);
        $ext      = pathinfo($filename, PATHINFO_EXTENSION);

        $root = getcwd();
        move_uploaded_file($temp,$root.$target);
        
        $queryProduk = "SELECT tb_keranjang.id_keranjang, tb_keranjang.id_user, tb_produk.id_produk, tb_keranjang.qty_barang, tb_produk.harga_produk, tb_stok.stok_produk
        FROM tb_keranjang
        LEFT JOIN tb_user ON tb_keranjang.id_user = tb_user.id_user
        LEFT JOIN tb_produk ON tb_keranjang.id_barang = tb_produk.id_produk
        LEFT JOIN tb_stok ON tb_produk.id_produk = tb_stok.id_produk
        WHERE tb_stok.id_stok IN (SELECT MAX(id_stok) FROM tb_stok GROUP BY id_produk)";
                        $resultProduk = mysqli_query($con, $queryProduk);
                        
                        $totalSemua = 0;
                        while($dataPenj = mysqli_fetch_array($resultProduk)){
                            
                            $queryQTY = "SELECT SUM(qty_barang) AS total_qty FROM tb_keranjang WHERE id_user=$IDUser";
                            $resultQTY = mysqli_query($con, $queryQTY);
                            $dataQTY = mysqli_fetch_array($resultQTY);
                            $totalQTY = $dataQTY['total_qty'];

                            if($totalQTY >= 0 && $totalQTY <= 3){
                                $ongkir = 20000;
                            }elseif($totalQTY >= 4 && $totalQTY <= 6){
                                $ongkir = 40000;
                            }elseif($totalQTY >= 7 && $totalQTY <= 9){
                                $ongkir = 60000;
                            }elseif($totalQTY >= 10 && $totalQTY <= 12){
                                $ongkir = 80000;
                            }elseif($totalQTY >=13 && $totalQTY <=15){
                                $ongkir = 100000;
                            }else {
                                $ongkir = 120000;
                            }

                            $idUser = $dataPenj['id_user'];
                            $idProduk = $dataPenj['id_produk'];
                            $QYTBarang = $dataPenj['qty_barang'];
                            $HARGABRG = $dataPenj['harga_produk'];
                            $stokBarang = $dataPenj['stok_produk'];
                            $totalHarga = $QYTBarang*$HARGABRG;
                            $totalSemua += $totalHarga;
                            $hargaFix = $totalSemua+$ongkir;

                                        $queryPenjualan = mysqli_query($con,"INSERT INTO tb_penjualan(tgl,id_admin,id_user,id_produk,jumlah,total_pembayaran,bukti_pembayaran,status_pembayaran,status_pesanan,resi_pengiriman) VALUES ('$tglSekarang','1','$idUser','$idProduk','$QYTBarang','$hargaFix','$filename','Dibayar','Diproses','-')");

                                        if($queryPenjualan) {
                                            $stokBaru = $stokBarang - $QYTBarang;
                                            $queryUpdateStok = mysqli_query($con, "UPDATE tb_stok SET stok_produk = $stokBaru WHERE id_produk = $idProduk ORDER BY id_stok DESC LIMIT 1");

                                            if($queryUpdateStok){
                                                $queryHapusKeranjang = mysqli_query($con, "DELETE FROM tb_keranjang WHERE id_user = $idUser AND id_barang = $idProduk");

                                                if($queryHapusKeranjang) {
                                                    echo "<script>alert('Stok berhasil di update dan data dihapus dari keranjang'); </script>";
                                                }else {
                                                    echo "<script>alert('Stok gagal di update dan data gagal dihapus dari keranjang'); </script>";
                                                }
                                            }else{
                                                echo "<script>alert('Gagal update stok barang'); </script>";
                                            }
                                            echo "<script>alert('PEMBAYARAN SUKSES'); window.location.href = 'index.php';</script>";
                                        }else {
                                            echo "<script>alert('PEMBAYARAN GAGAL'); window.location.href = 'detailkeranjang.php';</script>";
                                        }
                        }
    ?>

    <?php
  }elseif(!isset($_POST['checkout'])){ 
    ?>
    <section id="" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <div class="row justify-content-between gy-5">
                <div class="section-header">
                    <p>Keranjang<span> Saya</span></p>
                </div>
                <form action="" method="post">
                    <table class="table table-borderless">
                        <thead style="background-color: #000; color: #fff;">
                            <tr>
                                <td>
                                    <center>
                                        <h5>Nama Produk</h5>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <h5>Jumlah Produk</h5>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <h5>Subtotal</h5>
                                    </center>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $queryProduk = "SELECT * FROM tb_keranjang LEFT JOIN tb_user ON tb_keranjang.id_user = tb_user.id_user LEFT JOIN tb_produk ON tb_keranjang.id_barang = tb_produk.id_produk";
                        $resultProduk = mysqli_query($con, $queryProduk);
                        
                        $totalSemua = 0;
                        while($dataProduk = mysqli_fetch_array($resultProduk)){
                    ?>
                            <tr>
                                <td>
                                    <img src="admin.sakinahgamis.com/admin/gambar/produk/<?= $dataProduk['gambar_produk'];?>"
                                        class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300"
                                        style="width: 150px; height: 250px;">&nbsp;
                                    <?php echo $dataProduk['nama_produk']; ?>
                                </td>
                                <td>
                                    <center>
                                        <div class="quantity">
                                            <button name="minus" class="btn-book-a-table minus" type="submit">-</button>
                                            <input type="text" name="qty" class="quantity-input"
                                                value="<?php echo $dataProduk['qty_barang']; ?>">
                                            <input type="hidden" name="id" class="quantity-input"
                                                value="<?php echo $dataProduk['id_keranjang']; ?>">
                                            <button name="plus" class="btn-book-a-table plus" type="submit">+</button>
                                        </div>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?php
                                $qtyBarang = $dataProduk['qty_barang'];
                                $hargaBarang = $dataProduk['harga_produk'];
                                $totalHarga = $qtyBarang*$hargaBarang;
                                $totalSemua += $totalHarga;
                            ?>
                                        <h5>Rp
                                            <?= number_format($dataProduk['harga_produk'], 0, ',', '.');?>,-</h5>
                                    </center>
                                </td>
                            </tr>
                            <?php 
                        }
                    ?>
                            <tr style="background-color: #000">
                                <td colspan="2">
                                    <h4 style="text-align: right; color: white;">TOTAL</h4>
                                </td>
                                <td>
                                    <center>
                                        <h4 style="color: #ec2727;">Rp <?= number_format($totalSemua,0,',','.'); ?>,-
                                        </h4>
                                    </center>
                                </td>
                            </tr>
                        </tbody>
                        <tr>
                            <td colspan="3">
                                <button type="submit" name="checkout" class="btn btn-outline-danger btn-lg btn-block"
                                    style="width: 100%;">CHECKOUT</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </section>
    <?php } ?>



    <main id="main">



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div>
                        <h4>Alamat</h4>
                        <p>
                            Perumahan Singocandi Blok B-17 RT.01/RW.04, Gedangsewu, Singocandi, Kec. Kota Kudus,
                            Kabupaten Kudus, Jawa Tengah 59314 <br>
                        </p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Nomor Telepon</h4>
                        <p>
                            <strong>Nomor Telepon:</strong>0811-2828-129<br>
                            <strong>Email:</strong> contact@sakinahgamis.com<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Jam Buka</h4>
                        <p>
                            <strong>Setiap Hari: </strong>09.00 WIB - 21.00 WIB<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>

            </div>
        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const minusBtn = document.querySelector('.btn-book-a-table minus');
        const plusBtn = document.querySelector('.btn-book-a-table plus');
        const quantityInput = document.querySelector('.quantity-input');

        minusBtn.addEventListener('click', function() {
            let value = parseInt(quantityInput.value);
            if (value > 1) {
                value--;
                quantityInput.value = value;
            }
        });

        plusBtn.addEventListener('click', function() {
            let value = parseInt(quantityInput.value);
            value++;
            quantityInput.value = value;
        });
    });
    </script>

</body>

</html>