<?php 
session_start();
include '../koneksi.php';
global $con;
if (empty($_SESSION['username'])){
    session_destroy(); 
	header('location:../index.php');
} else {
	include "../koneksi.php";
}
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
                            <span>Administrator</span>
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
            <h1>Detail Produk</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="data_admin.php">Data Produk</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <?php
               $query = mysqli_query($con,"SELECT * FROM tb_produk WHERE id_produk='$_GET[kd]'");
               $data  = mysqli_fetch_array($query);
               ?>
        <section class="section profile">
            <div class="row">

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Data Produk</button>
                                </li>

                            </ul>

                            <div class="panel-body">
                                <table id="example" class="table table-hover table-bordered">

                                    <tr>
                                        <td>Nama Produk</td>
                                        <td><?php echo $data['nama_produk']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Kategori</td>
                                        <td><?php echo $data['kategori_produk']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Harga</td>
                                        <td>Rp<?php echo $data['harga_produk']; ?>,-</td>
                                    </tr>
                                    <tr>
                                        <td>Total Stok</td>
                                        <td>
                                            <?php
                                                    $id = $data['id_produk']; 
                                                    $stokS = mysqli_query($con, "SELECT * FROM tb_stok WHERE id_produk=$id AND status=0 AND ukuran_produk='S' ORDER BY id_stok DESC LIMIT 1");
                                                    $dataS=mysqli_fetch_array($stokS); 
                                                    $stokM = mysqli_query($con, "SELECT * FROM tb_stok WHERE id_produk=$id AND status=0 AND ukuran_produk='M' ORDER BY id_stok DESC LIMIT 1");
                                                    $dataM=mysqli_fetch_array($stokM); 
                                                    $stokL = mysqli_query($con, "SELECT * FROM tb_stok WHERE id_produk=$id AND status=0 AND ukuran_produk='L' ORDER BY id_stok DESC LIMIT 1");
                                                    $dataL=mysqli_fetch_array($stokL); 
                                                    $stokXL = mysqli_query($con, "SELECT * FROM tb_stok WHERE id_produk=$id AND status=0 AND ukuran_produk='XL' ORDER BY id_stok DESC LIMIT 1");
                                                    $dataXL=mysqli_fetch_array($stokXL); 
                                                    $stokXXL = mysqli_query($con, "SELECT * FROM tb_stok WHERE id_produk=$id AND status=0 AND ukuran_produk='XXL' ORDER BY id_stok DESC LIMIT 1");
                                                    $dataXXL=mysqli_fetch_array($stokXXL); 
                                                    $stokAll = mysqli_query($con, "SELECT * FROM tb_stok WHERE id_produk=$id AND status=0 AND ukuran_produk='All Size' ORDER BY id_stok DESC LIMIT 1");
                                                    $dataAll=mysqli_fetch_array($stokAll);
                                                    $totalStok = $dataS['stok_produk'] + $dataM['stok_produk'] + $dataL['stok_produk'] + $dataXL['stok_produk'] + $dataXXL['stok_produk'] + $dataAll['stok_produk'];
                                                    if($totalStok>0){
                                                        echo $totalStok." PCS";
                                                    }else {
                                                        echo "0 PCS";
                                                    }
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Detail Stok</button>
                                </li>

                            </ul>

                            <div class="panel-body">
                                <table id="example" class="table table-hover table-bordered">

                                    <tr>
                                        <td>S</td>
                                        <td><?php 
                                            if($dataS['stok_produk']>0){
                                                echo $dataS['stok_produk']." PCS";
                                            }else {
                                                echo "0 PCS";
                                            } 
                                        ?></td>
                                    </tr>

                                    <tr>
                                        <td>M</td>
                                        <td><?php 
                                            if($dataM['stok_produk']>0){
                                                echo $dataM['stok_produk']." PCS";
                                            }else {
                                                echo "0 PCS";
                                            } 
                                        ?></td>
                                    </tr>
                                    <tr>
                                        <td>L</td>
                                        <td><?php 
                                            if($dataL['stok_produk']>0){
                                                echo $dataL['stok_produk']." PCS";
                                            }else {
                                                echo "0 PCS";
                                            } 
                                        ?></td>
                                    </tr>
                                    <tr>
                                        <td>XL</td>
                                        <td><?php 
                                            if($dataXL['stok_produk']>0){
                                                echo $dataXL['stok_produk']." PCS";
                                            }else {
                                                echo "0 PCS";
                                            } 
                                        ?></td>
                                    </tr>
                                    <tr>
                                        <td>XXL</td>
                                        <td><?php 
                                            if($dataXXL['stok_produk']>0){
                                                echo $dataXXL['stok_produk']." PCS";
                                            }else {
                                                echo "0 PCS";
                                            } 
                                        ?></td>
                                    </tr>
                                    <tr>
                                        <td>All Size</td>
                                        <td><?php 
                                            if($dataAll['stok_produk']>0){
                                                echo $dataAll['stok_produk']." PCS";
                                            }else {
                                                echo "0 PCS";
                                            } 
                                        ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body align-items-center">
                            <center>
                                <h5 class="card-title">Foto Produk</h5>
                                <img src="gambar/produk/<?php echo $data['gambar_produk']; ?> " height="500"
                                    width="300">
                            </center>
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