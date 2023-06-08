<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (empty($_SESSION['username'])){
    session_destroy();
	header('location:../index.php');
}  else {
	include "../koneksi.php";
}

$produk = "";
$bulan = "";
$cekstok = "";
$jumlahpenjualan = "";
$f_stok_minim = "";
$f_stok_sedang = "";
$f_stok_banyak = "";
$f_penjualan_sedikit = "";
$f_penjualan_sedang = "";
$f_penjualan_banyak = "";

if(isset($_POST['cek'])) {
    $produk = $_POST['produk'];
    $bulan = $_POST['bulan'];

  $query_cekstok = mysqli_query($con, "SELECT * FROM `tb_stok` WHERE DATE(tgl)=LAST_DAY('2022-$bulan-01') AND id_produk=$produk AND status=0 ORDER BY id_stok DESC LIMIT 1;");
  $s = mysqli_fetch_array($query_cekstok);
  if($s && $s['stok_produk'] != ""){
    $cekstok = $s['stok_produk'];
  }

  $query_jumlahpesanan = mysqli_query($con, "SELECT SUM(jumlah) AS jumlah_penjualan FROM tb_penjualan WHERE MONTH(tgl)=$bulan AND id_produk=$produk");
  $j = mysqli_fetch_array($query_jumlahpesanan);
  $jumlahpenjualan = $j['jumlah_penjualan'];

  if($jumlahpenjualan==0) {
    $nama = "";
    $bahan = "";
    $query_produk1 = mysqli_query($con,"SELECT * FROM tb_produk WHERE id_produk=$produk");
    $a1 = mysqli_fetch_array($query_produk1);
    if($a1 && $a1['nama_produk'] && $a1['kategori_produk'] != ""){
        $nama = $a1['nama_produk'];
        $bahan = $a1['kategori_produk'];
    }
    echo "<script>alert('Tidak ada penjualan $nama $bahan bulan ini'); </script>";
    }
}




//Fuzzifikasi Varibel Stok
if($cekstok >= 0 && $cekstok <=10) {
  $f_stok_minim   = 1;
  $f_stok_sedang  = 0;
  $f_stok_banyak  = 0;
}else if($cekstok > 10 && $cekstok <=20) {
  $f_stok_minim   = 1;
  $f_stok_sedang  = 0;
  $f_stok_banyak  = 0;
}else if($cekstok > 20 && $cekstok <= 30) {
  $f_stok_minim   = (30-$cekstok)/(30-20);
  $f_stok_sedang  = ($cekstok-20)/(30-20);
  $f_stok_banyak  = 0;
}else if($cekstok > 30 && $cekstok <= 40) {
  $f_stok_minim   = 0;
  $f_stok_sedang  = 1;
  $f_stok_banyak  = 0;
}else if($cekstok > 40 && $cekstok <= 50) {
  $f_stok_minim   = 0;
  $f_stok_sedang  = (50-$cekstok)/(50-40);
  $f_stok_banyak  = ($cekstok-40)/(50-40);
}else if($cekstok > 50) {
  $f_stok_minim   = 0;
  $f_stok_sedang  = 0;
  $f_stok_banyak  = 1;
}

//Fuzzifikasi Varibel Penjualan
if($jumlahpenjualan >= 0 && $jumlahpenjualan <=10) {
    $f_penjualan_sedikit    = 1;
    $f_penjualan_sedang     = 0;
    $f_penjualan_banyak     = 0;
}else if($jumlahpenjualan > 10 && $jumlahpenjualan <=20) {
    $f_penjualan_sedikit    = 1;
    $f_penjualan_sedang     = 0;
    $f_penjualan_banyak     = 0;
}else if($jumlahpenjualan > 20 && $jumlahpenjualan <=30) {
    $f_penjualan_sedikit    = (30-$jumlahpenjualan)/(30-20);
    $f_penjualan_sedang     = ($jumlahpenjualan-20)/(30-20);
    $f_penjualan_banyak     = 0;
}else if($jumlahpenjualan > 30 && $jumlahpenjualan <=40) {
    $f_penjualan_sedikit    = 0;
    $f_penjualan_sedang     = 1;
    $f_penjualan_banyak     = 0;
}else if($jumlahpenjualan > 40 && $jumlahpenjualan <=50) {
    $f_penjualan_sedikit    = 0;
    $f_penjualan_sedang     = (50-$jumlahpenjualan)/(50-40);
    $f_penjualan_banyak     = ($jumlahpenjualan-40)/(50-40);
}else if($jumlahpenjualan > 50) {
    $f_penjualan_sedikit    = 0;
    $f_penjualan_sedang     = 0;
    $f_penjualan_banyak     = 1;
}

//Inferensial
//RULE 1
$f1_produksi_sedikit = min($f_penjualan_sedikit, $f_stok_minim);
//RULE 2
$f2_no_produksi  = min($f_penjualan_sedikit, $f_stok_sedang);
//RULE 3
$f3_no_produksi  = min($f_penjualan_sedikit, $f_stok_banyak);
//RULE 4
$f4_produksi_sedang = min($f_penjualan_sedang, $f_stok_minim);
//RULE 5
$f5_produksi_sedikit  = min($f_penjualan_sedang, $f_stok_sedang);
//RULE 6
$f6_no_produksi  = min($f_penjualan_sedang, $f_stok_banyak);
//RULE 7
$f7_produksi_banyak  = min($f_penjualan_banyak, $f_stok_minim);
//RULE 8
$f8_produksi_sedang = min($f_penjualan_banyak, $f_stok_sedang);
//RULE 9
$f9_produksi_sedikit  = min($f_penjualan_banyak, $f_stok_banyak);

//Nilai Fuzzy No Produksi
$fuzzy_no_produksi      = max($f2_no_produksi,$f3_no_produksi,$f6_no_produksi);
//Nilai Fuzzy Produksi Sedikit
$fuzzy_produksi_sedikit = max($f1_produksi_sedikit,$f5_produksi_sedikit,$f9_produksi_sedikit);
//Nilai Fuzzy Produksi Sedang
$fuzzy_produksi_sedang  = max($f4_produksi_sedang,$f8_produksi_sedang);
//Nilai Fuzzy Produksi Banyak
$fuzzy_produksi_banyak  = $f7_produksi_banyak;

//Defuzzyfikasi
if($fuzzy_no_produksi !=0 && $fuzzy_produksi_sedikit == 0 && $fuzzy_produksi_sedang == 0 && $fuzzy_produksi_banyak == 0) {
    $hasil = 0 * $fuzzy_no_produksi;
}elseif($fuzzy_no_produksi ==0 && $fuzzy_produksi_sedikit != 0 && $fuzzy_produksi_sedang == 0 && $fuzzy_produksi_banyak == 0) {
    $hasil = 15 * $fuzzy_produksi_sedikit;
}elseif($fuzzy_no_produksi ==0 && $fuzzy_produksi_sedikit == 0 && $fuzzy_produksi_sedang != 0 && $fuzzy_produksi_banyak == 0) {
    $hasil = 25 * $fuzzy_produksi_sedang;
}elseif($fuzzy_no_produksi ==0 && $fuzzy_produksi_sedikit == 0 && $fuzzy_produksi_sedang == 0 && $fuzzy_produksi_banyak != 0) {
    $hasil = 35 * $fuzzy_produksi_banyak;
}elseif($fuzzy_no_produksi !=0 && $fuzzy_produksi_sedikit != 0 && $fuzzy_produksi_sedang == 0 && $fuzzy_produksi_banyak == 0) {
    $hasil = 15 / (($fuzzy_no_produksi/$fuzzy_produksi_sedikit) + 1);
}elseif($fuzzy_no_produksi ==0 && $fuzzy_produksi_sedikit != 0 && $fuzzy_produksi_sedang != 0 && $fuzzy_produksi_banyak == 0) {
    $hasil = 25 / (($fuzzy_produksi_sedikit/$fuzzy_produksi_sedang) + 1);
}elseif($fuzzy_no_produksi ==0 && $fuzzy_produksi_sedikit == 0 && $fuzzy_produksi_sedang != 0 && $fuzzy_produksi_banyak != 0) {
    $hasil = 35 / (($fuzzy_produksi_sedang/$fuzzy_produksi_banyak) + 1);
}else {
    $hasil = 999;
}


// if($fuzzy_produksi_sedikit!=0 && $fuzzy_produksi_sedang==0 && $fuzzy_produksi_banyak==0){
//     $hasil=10/(($fuzzy_no_produksi/$fuzzy_produksi_sedikit)+1);
// }else if($fuzzy_produksi_sedikit ==0 && $fuzzy_produksi_sedang!=0 && $fuzzy_produksi_banyak==0) {
//     $hasil=20/(($fuzzy_produksi_sedikit/$fuzzy_produksi_sedang)+1);
// }else if($fuzzy_no_produksi==0 && $fuzzy_produksi_sedikit==0 && $fuzzy_produksi_sedang!=0 && $fuzzy_produksi_banyak!=0) {
//     $hasil=30/(($fuzzy_produksi_sedang/$fuzzy_produksi_banyak)+1);
// }else if($fuzzy_no_produksi==0 && $fuzzy_produksi_sedikit==0 && $fuzzy_produksi_sedang==0 && $fuzzy_produksi_banyak!=0) {
//     $hasil=40*$fuzzy_produksi_banyak;
// }else if($fuzzy_no_produksi!=0 && $fuzzy_produksi_sedikit==0 && $fuzzy_produksi_sedang==0 && $fuzzy_produksi_banyak==0) {
//     $hasil=5*$fuzzy_no_produksi;
// }else if($fuzzy_no_produksi==0 && $fuzzy_produksi_sedikit!=0 && $fuzzy_produksi_sedang==0 && $fuzzy_produksi_banyak==0) {
//     $hasil=10*$fuzzy_produksi_sedikit;
// }else if($fuzzy_no_produksi==0 && $fuzzy_produksi_sedikit==0 && $fuzzy_produksi_sedang!=0 && $fuzzy_produksi_banyak==0) {
//     $hasil=20*$fuzzy_produksi_sedang;
// }else {
//     $hasil=NULL;
// }

echo "<br><br><br><br>";
echo "Stok Minim = ". $f_stok_minim ."<br>";
echo "Stok Sedang = ". $f_stok_sedang ."<br>";
echo "Stok Banyak = ". $f_stok_banyak ."<br><br>";

echo "Penjualan Minim = ". $f_penjualan_sedikit ."<br>";
echo "Penjualan Sedang = ". $f_penjualan_sedang ."<br>";
echo "Penjualan Banyak = ". $f_penjualan_banyak ."<br><br>";

echo "Fuzzy Produksi No = " .$fuzzy_no_produksi. "<br>";
echo "Fuzzy Produksi Minim = " .$fuzzy_produksi_sedikit. "<br>";
echo "Fuzzy Produksi Sedang = " .$fuzzy_produksi_sedang. "<br>";
echo "Fuzzy Produksi Banyak = " .$f7_produksi_banyak. "<br><br>";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tables / Data - NiceAdmin Bootstrap Template</title>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>

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

    <!-- Koneksi Database -->


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Rekomendasi Produksi Barang</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="peramalan.php">Rekomendasi Produksi Barang</a></li>
                </ol>
            </nav>
        </div>
        <!-- table section -->
        <div class="br-pagebody" style="margin: auto;">
            <div class="br-section-wrapper" style="padding: 20px;">
                <form class="form-horizontal style-form" action="" method="post" name="form1" id="form1">
                    <label class="control-label">Pilih Produk</label>
                    <div class="form-group">
                        <div class="col-sm-8">
                            <select class="form-control mb-3" name="produk" id="produk">
                                <?php
                                        $query1="select * from tb_produk";
                                        $tampil=mysqli_query($con,$query1);

                                        while($data=mysqli_fetch_array($tampil))
                                        {
                                            $id   = $data['id_produk'];
                                            $nama = $data['nama_produk'];
                                            $bahan = $data['kategori_produk'];
                                            $harga  = $data['harga'];
                                    ?>
                                <option value="<?php echo $data['id_produk']; ?>">
                                    <?php echo $nama." - ".$bahan;?>
                                </option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <label class="control-label">Pilih Bulan</label>
                    <div class="form-group">
                        <div class="col-sm-8">
                            <select class="form-control mb-3" name="bulan" id="bulan">
                                <option value="01">Januari</option>
                                <option value="02">Febuari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-left" style="margin-top:25px">
                        <button type=" button" class="btn btn-primary" id="cek" name="cek">
                            Cek
                        </button>
                    </div>
                </form>
                <br>
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Datatables</h5>
                                    <!-- Table with stripped rows -->
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope>Nama Produk</th>
                                                <th scope>Jumlah Penjualan</th>
                                                <th scope>Stok Sisa</th>
                                                <th scope>Rekomendasi Produksi</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $nama = "";
                                            $bahan = "";
                                            $ukuran = "";
                                            $sablon = "";
                                            $detailProduk = "SELECT * FROM tb_produk WHERE id_produk='$produk'";
                                            $query_produk = mysqli_query($con,$detailProduk);
                                            $a = mysqli_fetch_array($query_produk);
                                            if($a && $a['nama_produk'] && $a['kategori_produk'] != "") {
                                                $nama = $a['nama_produk'];
                                                $bahan = $a['kategori_produk'];
                                            }
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td scope>
                                                    <?php echo $nama." ".$bahan; ?>
                                                </td>
                                                <td scope>
                                                    <?php echo $jumlahpenjualan; ?> PCS
                                                </td>
                                                <td scope>
                                                    <?php echo $cekstok; ?> PCS
                                                </td>
                                                <td scope>
                                                    <?php echo (int)$hasil; ?> PCS
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

    </main><!-- end content -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

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

    <!-- Datetime Picker -->

    <script type="text/javascript">
    $(function() {
        $('#datetimepicker').datetimepicker
    });
    </script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>