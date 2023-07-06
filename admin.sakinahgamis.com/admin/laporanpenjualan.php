<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();
if (empty($_SESSION['username'])){
    session_destroy();
	header('location:../index.php');
} else {
	include "../koneksi.php";
}

$bulan = isset($_POST['bulan']);
$tahun = isset($_POST['tahun']);

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
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['username']; ?></span>
                    </a>
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

                    </ul>
                </li>

            </ul>
        </nav>

    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->

    <?php include ("../view/sidebar.php");?>
    <!-- End Sidebar-->

    <!-- Koneksi Database -->


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Laporan Penjualan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="laporanpenjualan.php">Laporan Penjualan</a></li>
                </ol>
            </nav>
        </div>
        <!-- table section -->
        <?php
      $query2="select * from tb_penjualan left join tb_produk on tb_penjualan.id_produk = tb_produk.id_produk WHERE MONTH(tb_penjualan.tgl)='$bulan' AND YEAR(tb_penjualan.tgl)='$tahun'";
      $tampil=mysqli_query($con,$query2);
  ?>
        <!-- table section -->
        <div class="br-pagebody" style="margin: auto;">
            <div class="br-section-wrapper" style="padding: 20px;">
                <form class="form-horizontal style-form" action="" method="post" name="form1" id="form1">
                    <label class="control-label">Pilih Bulan</label>
                    <div class="form-group">
                        <div class="col-sm-8">
                            <select name="bulan" class="form-control">
                                <option selected="selected">Bulan</option>
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
                    <label class="control-label">Pilih Tahun</label>
                    <div class="form-group">
                        <div class="col-sm-8">
                            <select name="tahun" class="form-control">
                                <option selected="selected">Tahun</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-left" style="margin-top:25px">
                        <button type=" button" class="btn btn-primary" id="cari1" name="cari1">
                            Cek Laporan Bulanan
                        </button>
                        <a href="laporanpenjualan.php" class="btn btn-success">
                            <i class="fa fa-refresh"></i> Refresh</a>
                    </div>
                </form>
                <br>

                <?php
                        if(isset($_POST['cari1'])) {
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    
	$query1 = mysqli_query($con,"select * from tb_penjualan left join tb_produk on tb_penjualan.id_produk = tb_produk.id_produk WHERE MONTH(tb_penjualan.tgl)='$bulan' AND YEAR(tb_penjualan.tgl)='$tahun'");
	$d = mysqli_fetch_array($query1);
    if($d && $d['jumlah'] == NULL){
	    echo "<script>alert('Tidak Ada Penjualan'); </script>";
    }
    
        // Query untuk mendapatkan semua id_produk
        $query_produk = mysqli_query($con, "SELECT * FROM tb_produk");
        
        //Array untuk menyimpan nama produk
        $array_nama_produk = array();
    
        // Array untuk menyimpan data $cekstok
        $array_cekstok = array();

        // Array untuk menyimpan data $jumlahPenjualan
        $array_jumlahPenjualan = array();

        // Array untuk menyimpan data $hasil
        $array_hasil = array();
        // Buat array untuk menyimpan hasil dari setiap id_produk
        $hasil_array = array();
    
        // Loop untuk setiap id_produk
        while ($row = mysqli_fetch_assoc($query_produk)) {
            $produk = $row['id_produk'];
    
            $query_cekstok = mysqli_query($con, "SELECT * FROM `tb_stok` WHERE DATE(tgl)=LAST_DAY('$tahun-$bulan-01') AND id_produk=$produk AND status=0 ORDER BY id_stok DESC LIMIT 1;");
            $s = mysqli_fetch_array($query_cekstok);
            if($s && $s['stok_produk'] != ""){
                $cekstok = $s['stok_produk'];
            } else {
                $cekstok = 0;
            }
    
            $query_jumlahpesanan = mysqli_query($con, "SELECT SUM(jumlah) AS jumlah_penjualan FROM tb_penjualan WHERE MONTH(tgl)=$bulan AND id_produk=$produk");
            $j = mysqli_fetch_array($query_jumlahpesanan);
            $jumlahpenjualan = $j['jumlah_penjualan'];
    
            // Fuzzifikasi Stok
            if($cekstok >= 0 && $cekstok <=2) {
              $f_stok_minim   = 1;
              $f_stok_sedang  = 0;
              $f_stok_banyak  = 0;
            }else if($cekstok > 2 && $cekstok <=4) {
              $f_stok_minim   = 1;
              $f_stok_sedang  = 0;
              $f_stok_banyak  = 0;
            }else if($cekstok > 4 && $cekstok <= 6) {
              $f_stok_minim   = (6-$cekstok)/(6-4);
              $f_stok_sedang  = ($cekstok-4)/(6-4);
              $f_stok_banyak  = 0;
            }else if($cekstok > 6 && $cekstok <= 8) {
              $f_stok_minim   = 0;
              $f_stok_sedang  = 1;
              $f_stok_banyak  = 0;
            }else if($cekstok > 8 && $cekstok <= 10) {
              $f_stok_minim   = 0;
              $f_stok_sedang  = (10-$cekstok)/(10-8);
              $f_stok_banyak  = ($cekstok-8)/(10-8);
            }else if($cekstok > 10) {
              $f_stok_minim   = 0;
              $f_stok_sedang  = 0;
              $f_stok_banyak  = 1;
            }
            
            //Fuzzifikasi Varibel Penjualan
            if($jumlahpenjualan >= 0 && $jumlahpenjualan <=2) {
                $f_penjualan_sedikit    = 1;
                $f_penjualan_sedang     = 0;
                $f_penjualan_banyak     = 0;
            }else if($jumlahpenjualan > 2 && $jumlahpenjualan <=4) {
                $f_penjualan_sedikit    = 1;
                $f_penjualan_sedang     = 0;
                $f_penjualan_banyak     = 0;
            }else if($jumlahpenjualan > 4 && $jumlahpenjualan <=6) {
                $f_penjualan_sedikit    = (6-$jumlahpenjualan)/(6-4);
                $f_penjualan_sedang     = ($jumlahpenjualan-4)/(6-4);
                $f_penjualan_banyak     = 0;
            }else if($jumlahpenjualan > 6 && $jumlahpenjualan <=8) {
                $f_penjualan_sedikit    = 0;
                $f_penjualan_sedang     = 1;
                $f_penjualan_banyak     = 0;
            }else if($jumlahpenjualan > 8 && $jumlahpenjualan <=10) {
                $f_penjualan_sedikit    = 0;
                $f_penjualan_sedang     = (10-$jumlahpenjualan)/(10-8);
                $f_penjualan_banyak     = ($jumlahpenjualan-8)/(10-8);
            }else if($jumlahpenjualan > 10) {
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
                $hasil = 2 * $fuzzy_produksi_sedikit;
            }elseif($fuzzy_no_produksi ==0 && $fuzzy_produksi_sedikit == 0 && $fuzzy_produksi_sedang != 0 && $fuzzy_produksi_banyak == 0) {
                $hasil = 4 * $fuzzy_produksi_sedang;
            }elseif($fuzzy_no_produksi ==0 && $fuzzy_produksi_sedikit == 0 && $fuzzy_produksi_sedang == 0 && $fuzzy_produksi_banyak != 0) {
                $hasil = 6 * $fuzzy_produksi_banyak;
            }elseif($fuzzy_no_produksi !=0 && $fuzzy_produksi_sedikit != 0 && $fuzzy_produksi_sedang == 0 && $fuzzy_produksi_banyak == 0) {
                $hasil = 2 / (($fuzzy_no_produksi/$fuzzy_produksi_sedikit) + 1);
            }elseif($fuzzy_no_produksi ==0 && $fuzzy_produksi_sedikit != 0 && $fuzzy_produksi_sedang != 0 && $fuzzy_produksi_banyak == 0) {
                $hasil = 4 / (($fuzzy_produksi_sedikit/$fuzzy_produksi_sedang) + 1);
            }elseif($fuzzy_no_produksi ==0 && $fuzzy_produksi_sedikit == 0 && $fuzzy_produksi_sedang != 0 && $fuzzy_produksi_banyak != 0) {
                $hasil = 6 / (($fuzzy_produksi_sedang/$fuzzy_produksi_banyak) + 1);
            }else {
                $hasil = 3;
            }
            
            // if($fuzzy_produksi_sedikit != 0 && $fuzzy_produksi_sedang == 0 && $fuzzy_produksi_banyak == 0) {
            //     $hasil = 10 / (($fuzzy_produksi_sedang/$fuzzy_produksi_sedikit)+1);
            // }else if($fuzzy_produksi_sedikit == 0 && $fuzzy_produksi_sedang != 0 && $fuzzy_produksi_banyak == 0) {
            //     $hasil = 20 / (($fuzzy_produksi_banyak/$fuzzy_produksi_sedang)+1);
            // }else if($fuzzy_produksi_sedikit == 0 && $fuzzy_produksi_sedang == 0 && $fuzzy_produksi_banyak != 0) {
            //     $hasil = 30 / (($fuzzy_produksi_banyak))
            // }
    
            // Simpan data $cekstok ke dalam array $array_cekstok
            $array_cekstok[$produk] = $cekstok;

            // Simpan data $jumlahpenjualan ke dalam array $array_jumlahPenjualan
            $array_jumlahPenjualan[$produk] = $jumlahpenjualan;

            // Simpan data $hasil ke dalam array $array_hasil
            $array_hasil[$produk] = $hasil;

            // Tambahkan nilai defuzzyfikasi ke array hasil
            $hasil_array[$produk] = $hasil;
        }
    
         // Cetak array $array_cekstok
        // echo "<br><br><br>Data Cek Stok:<br>";
        // foreach ($array_cekstok as $produk => $cekstok) {
        //     echo "ID Produk: " . $produk . ", Cek Stok: " . $cekstok . "<br>";
        // }

        // Cetak array $array_jumlahPenjualan
        // echo "<br>Data Jumlah Penjualan:<br>";
        // foreach ($array_jumlahPenjualan as $produk => $jumlahPenjualan) {
        //     echo "ID Produk: " . $produk . ", Jumlah Penjualan: " . $jumlahPenjualan . "<br>";
        // }

        // Cetak array $array_hasil
        // echo "<br>Data Hasil:<br>";
        // foreach ($array_hasil as $produk => $hasil) {
        //     echo "ID Produk: " . $produk . ", Hasil: " . $hasil . "<br>";
        // }



                    ?>
                <canvas id="myChart"></canvas><br>
                <?php
                        // Array untuk menyimpan jumlah terjual
                        $jumlahTerjual = array();
                        
                        // Inisialisasi array dengan indeks dari 1 hingga 20
                        // for ($i = 1; $i <= 20; $i++) {
                        //     $jumlahTerjual[$i] = 0;
                        // }
                        
                        // Query untuk mengambil data jumlah terjual
                        $query = "SELECT tb_penjualan.id_produk, SUM(tb_penjualan.jumlah) AS total_terjual, tb_produk.nama_produk
                            FROM tb_penjualan left join tb_produk on tb_penjualan.id_produk = tb_produk.id_produk
                            WHERE tb_penjualan.id_produk BETWEEN 1 AND 20
                              AND MONTH(tb_penjualan.tgl) = '$bulan'
                              AND YEAR(tb_penjualan.tgl) = '$tahun'
                            GROUP BY tb_penjualan.id_produk, tb_produk.nama_produk";
                        
                        // Eksekusi query
                        // Misalnya, Anda menggunakan koneksi MySQLi
                        $result = $con->query($query);
                        
                        // Memasukkan data ke dalam array jumlahTerjual
                        while ($row = $result->fetch_assoc()) {
                            $idProduk = $row['nama_produk'];
                            $totalTerjual = $row['total_terjual'];
                            $jumlahTerjual[$idProduk] = $totalTerjual;
                        }
                        asort($jumlahTerjual);
                        
                        $queryModal = "SELECT SUM(tb_penjualan.jumlah * tb_produk.harga_beli) AS total_modal
                            FROM tb_penjualan
                            JOIN tb_produk ON tb_penjualan.id_produk = tb_produk.id_produk
                            WHERE DATE_FORMAT(tb_penjualan.tgl, '%Y-%m') = '$tahun-$bulan'";
                        
                        $resultModal = mysqli_query($con, $queryModal);
                        $dataModal = mysqli_fetch_array($resultModal);
                        $modal = $dataModal['total_modal'];
                        
                        $queryPendapatan = "SELECT SUM(total_pembayaran) AS total_pendapatan
                            FROM tb_penjualan
                            WHERE DATE_FORMAT(tgl, '%Y-%m') = '$tahun-$bulan'";
                        
                        $resultPendapatan = mysqli_query($con, $queryPendapatan);
                        $dataPendapatan = mysqli_fetch_array($resultPendapatan);
                        $pendapatan = $dataPendapatan['total_pendapatan'];
                        
                        $untung = $pendapatan - $modal;

                    ?>
                <section class="section dashboard">
                    <div class="row">

                        <!-- Left side columns -->
                        <div class="col-lg-12">
                            <div class="row">

                                <!-- Sales Card -->
                                <div class="col-xxl-6 col-md-6">
                                    <div class="card info-card sales-card">

                                        <div class="card-body">
                                            <h5 class="card-title">Total Penjualan</h5>

                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-bag-fill"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>Rp<?php echo number_format($pendapatan,0,',','.');?>,-</h6>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div><!-- End Sales Card -->

                                <!-- Revenue Card -->
                                <div class="col-xxl-6 col-md-6">
                                    <div class="card info-card customers-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Total Modal</h5>

                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-currency-dollar"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>Rp<?php echo number_format($modal,0,',','.');?>,-</h6>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div><!-- End Revenue Card -->
                                <div class="col-xxl-6 col-md-12">
                                    <div class="card info-card revenue-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Total Keuntungan</h5>

                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-cash-coin"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>Rp<?php echo number_format($untung,0,',','.');?>,-</h6>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div><!-- End Revenue Card -->

                            </div>
                        </div>
                    </div>
                </section>
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Datatables</h5>
                                    <!--<a href="export-excel.php?bulan=<?php echo $bulan;?>&tahun=<?php echo $tahun ?>"-->
                                    <!--    class="btn btn-info" id="cari2" name="cari2">-->
                                    <!--    <i class="fa fa-download"></i> Download Excel-->
                                    <!--</a>-->
                                    <!-- Table with stripped rows -->
                                    <table class="table dtable">
                                        <thead>
                                            <tr>
                                                <th scope>No</th>
                                                <th scope>Nama Produk</th>
                                                <th scope>Sisa Stok</th>
                                                <th scope>Jumlah Penjualan</th>
                                                <th scope>Prediksi Stok</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                    //   $no=0;
                    //   while($data=mysqli_fetch_array($tampil))
                    //   {
                    //     $no++;
                    //     $nama = $data['nama_produk'];
                    //     $id_user = $data['id_user'];
                    //     $query_user = mysqli_query($con,"SELECT * FROM tb_user WHERE id_user=$id_user");
                    //     $data_user = mysqli_fetch_array($query_user);
                    
                    $nomor = 1;

                    // Looping untuk mencetak setiap produk dan nilai dari ketiga array
                    foreach ($array_cekstok as $id_produk => $cekstok) {
                        $jumlahPenjualan = $array_jumlahPenjualan[$id_produk];
                        $hasil = $array_hasil[$id_produk];
                    
                        // Mengambil nama produk dari database
                        $query_produk = mysqli_query($con, "SELECT nama_produk FROM tb_produk WHERE id_produk = $id_produk");
                        $row_produk = mysqli_fetch_assoc($query_produk);
                        $nama_produk = $row_produk['nama_produk'];

                  ?>
                                            <tr>
                                                <td scope><?php echo $nomor;?></td>
                                                <td scope><?php echo $nama_produk; ?></td>
                                                <td scope><?php echo $cekstok;?> PCS</td>
                                                <td scope><?php echo $jumlahPenjualan;?> PCS</td>
                                                <td scope>
                                                    <?php echo intval($hasil);?> PCS</td>
                                            </tr>
                                            <?php
                                            $nomor++;
                      }
                      ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <?php } ?>


    </main><!-- end content -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <script src="../assets/vendor/chart.js/chart.min.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js">
    </script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Datetime Picker -->

    <script type="text/javascript">
    $(function() {
        $('#datetimepicker').datetimepicker
    });
    </script>

    <!-- Diagram Batang -->
    <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var data = <?php echo json_encode($jumlahTerjual); ?>;
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            datasets: [{
                label: 'Penjualan Bulan <?php echo json_encode($bulan); ?> Tahun <?php echo json_encode($tahun); ?>',
                data: data,
                backgroundColor: [
                    'rgba(255, 0, 0, 0.2)',
                    'rgba(0, 255, 0, 0.2)',
                    'rgba(0, 0, 255, 0.2)',
                    'rgba(255, 255, 0, 0.2)',
                    'rgba(255, 0, 255, 0.2)',
                    'rgba(0, 255, 255, 0.2)',
                    'rgba(0.228, 0, 0, 0.2)',
                    'rgba(0, 128, 0, 0.2)',
                    'rgba(0, 0, 128, 0.2)',
                    'rgba(128, 128, 0, 0.2)',
                    'rgba(128, 0, 128, 0.2)',
                    'rgba(0, 128, 128, 0.2)',
                    'rgba(128, 128, 128, 0.2)',
                    'rgba(255, 165, 0, 0.2)',
                    'rgba(0, 255, 128, 0.2)',
                    'rgba(128, 0, 255, 0.2)',
                    'rgba(192, 192, 192, 0.2)',
                    'rgba(255, 255, 128, 0.2)',
                    'rgba(255, 128, 255, 0.2)',
                    'rgba(128, 255, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 0, 0, 1)',
                    'rgba(0, 255, 0, 1)',
                    'rgba(0, 0, 255, 1)',
                    'rgba(255, 255, 0, 1)',
                    'rgba(255, 0, 255, 1)',
                    'rgba(0, 255, 255, 1)',
                    'rgba(128, 0, 0, 1)',
                    'rgba(0, 128, 0, 1)',
                    'rgba(0, 0, 128, 1)',
                    'rgba(128, 128, 0, 1)',
                    'rgba(128, 0, 128, 1)',
                    'rgba(0, 128, 128, 1)',
                    'rgba(128, 128, 128, 1)',
                    'rgba(255, 165, 0, 1)',
                    'rgba(0, 255, 128, 1)',
                    'rgba(128, 0, 255, 1)',
                    'rgba(192, 192, 192, 1)',
                    'rgba(255, 255, 128, 1)',
                    'rgba(255, 128, 255, 1)',
                    'rgba(128, 255, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>

    <!-- Datetime Picker -->

    <script type="text/javascript">
    $(function() {
        $('#datetimepicker1').datetimepicker();
    });
    </script>
    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>