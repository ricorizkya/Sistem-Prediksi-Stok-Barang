<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include '../koneksi.php';
global $con;
if (empty($_SESSION['username'])){
    session_destroy(); 
	header('location:../index.php');
} else {
	include "../koneksi.php";
}

$idPenjualan = $_GET['kd'];
$idArray = explode(',', $idPenjualan);

$idArray1 = $idArray[0];
$idArray2 = $idArray[1];
// $idArray3 = $idArray[2];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Users / Profile - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->


    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Sakinah Gamis</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['username']; ?></span>
                    </a><!-- End Profile Iamge Icon -->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php echo $_SESSION['username']; ?></h6>
                            <span>Administrato<?php echo $idArray; ?>r</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->

    <?php include ("../view/sidebar.php");?>
    <!-- End Sidebar-->


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Detail Pesanan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="datapenjualan.php">Data Penjualan</a></li>
                    <li class="breadcrumb-item">Detail Pesanan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">

                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Detail Pesanan</button>
                                </li>

                            </ul>

                            <div class="panel-body">

                                <?php

                                    $queryPenjualan = mysqli_query($con, "SELECT id_penjualan, tgl, tb_penjualan.id_user, GROUP_CONCAT(CONCAT(id_penjualan) SEPARATOR ' , ') AS id_penjualan, GROUP_CONCAT(CONCAT(nama_produk, ' - ', jumlah, ' pcs') SEPARATOR ' | ') AS nama_pesanan, MAX(total_pembayaran) AS total_harga, nama_user, telp_user, email_user, alamat_user, bukti_pembayaran, status_pembayaran, status_pesanan, resi_pengiriman FROM tb_penjualan LEFT JOIN tb_produk ON tb_penjualan.id_produk = tb_produk.id_produk LEFT JOIN tb_user ON tb_penjualan.id_user = tb_user.id_user WHERE id_penjualan='$idArray1' OR id_penjualan='$idArray2' GROUP BY tgl, tb_penjualan.id_user ORDER BY tgl DESC, tb_penjualan.id_user");
                                        
                                    $resultPenjualan = mysqli_fetch_array($queryPenjualan);
                                ?>

                                <form action="" method="post">
                                    <table id="example" class="table table-borderless">

                                        <tr>
                                            <td style="width:25%">Tanggal Pesanan</td>
                                            <td><?php 
                                            echo $resultPenjualan['tgl']; 
                                        ?></td>
                                        </tr>

                                        <tr>
                                            <td>Nama Pelanggan</td>
                                            <td><?php 
                                            echo $resultPenjualan['nama_user']; 
                                        ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Telepon Pelanggan</td>
                                            <td><?php 
                                            echo $resultPenjualan['telp_user'];
                                        ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email Pelanggan</td>
                                            <td><?php 
                                            echo $resultPenjualan['email_user'];
                                        ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Pelanggan</td>
                                            <td><?php 
                                            echo $resultPenjualan['alamat_user']; 
                                        ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pesanan</td>
                                            <td><?php 
                                            echo $resultPenjualan['nama_pesanan'];  
                                        ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Pembayaran</td>
                                            <td><?php 
                                            echo "Rp ".number_format($resultPenjualan['total_harga'],2,',','.'); 
                                        ?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Pembayaran</td>
                                            <td><?php 
                                            echo $resultPenjualan['status_pembayaran']; 
                                        ?></td>
                                        </tr>
                                        <tr>
                                            <td>Bukti Pembayaran</td>
                                            <td><img src="gambar/bukti/<?php 
                                                echo $resultPenjualan['bukti_pembayaran'];
                                        ?>" alt="" style="width: 200px; height: 200px;"></td>
                                        </tr>
                                        <tr>
                                            <td>Status Pesanan</td>
                                            <td><?php 
                                                echo $resultPenjualan['status_pesanan'];
                                        ?></td>
                                        </tr>
                                        <tr>
                                            <td>Resi Pengiriman</td>
                                            <td><?php 
                                                echo $resultPenjualan['resi_pengiriman'];
                                        ?></td>
                                        </tr>
                                    </table>
                                    <?php
                                        if($resultPenjualan['status_pesanan'] == 'Selesai') {
                                            echo "";
                                        }else {
                                    ?>
                                    <button type="submit" class="btn btn-success" style="width: 100%;"
                                        name="prosesPesanan">
                                        Proses Pesanan
                                    </button>
                                    <?php } ?>
                                </form>

                                <?php
                                    if(isset($_POST['prosesPesanan'])) {
                                ?>
                                <br><br>
                                <form class="form-horizontal style-form" action="" method="post" name="prosesPes"
                                    id="form1">
                                    <div class="form-group">
                                        <label class="col-sm-8 col-sm-8 control-label">Status Pembayaran</label>
                                        <div class="col-sm-12">
                                            <select class="form-control mb-3" name="statusPem" id="kategori">
                                                <option value="Dibayar">Dibayar</option>
                                                <option value="Nominal Tidak Sesuai">Nominal Tidak Sesuai</option>
                                                <option value="Dana Tidak Masuk">Dana Tidak Masuk</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-8 col-sm-8 control-label">Status Pesanan</label>
                                        <div class="col-sm-12">
                                            <select class="form-control mb-3" name="statusPesan" id="kategori">
                                                <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                                <option value="Diproses">Diproses</option>
                                                <option value="Dalam Perjalanan">Dalam Perjanalan</option>
                                                <option value="Selesai">Selesai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-8 col-sm-8 control-label">Resi Pengiriman</label>
                                        <div class="col-sm-12">
                                            <input name="resi" type="number" id="harga" class="form-control mb-3"
                                                placeholder="Input Nomor Resi J&T" required />

                                            <input type="hidden" name="id_penj1" id="" value="<?= $idArray1; ?>">
                                            <input type="hidden" name="id_penj2" id="" value="<?= $idArray2; ?>">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="updatePenj">Simpan</button>
                                </form>

                                <?php
                                    }else {
                                        echo "";
                                    }
                                ?>

                                <?php
                                    if(isset($_POST['updatePenj'])) {
                                        $idPenj1 = $_POST['id_penj1'];
                                        $idPenj2 = $_POST['id_penj2'];
                                        $statusPem = $_POST['statusPem'];
                                        $statusPes = $_POST['statusPesan'];
                                        $resi = $_POST['resi'];
                                        
                                        $queryUpdate = mysqli_query($con, "UPDATE tb_penjualan SET status_pembayaran='$statusPem', status_pesanan='$statusPes', resi_pengiriman='$resi' WHERE id_penjualan=$idPenj1 OR id_penjualan=$idPenj2");
                                        
                                        if($queryUpdate) {
                                            echo "<script>alert('Pesanan Berhasil Di Update'); window.location.href = 'datapenjualan.php';</script>";
                                        }else {
                                            echo "<script>alert('Pesanan Gagal Di Update');</script>";
                                        }
                                    }
                                ?>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.min.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>