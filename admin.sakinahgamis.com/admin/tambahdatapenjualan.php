<?php 
session_start();
if (empty($_SESSION['username']) || ($_SESSION['level'] != 'Administrator')){
    session_destroy(); 
	header('location:../index.php');
}  else {
	include "../koneksi.php";
}

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

    <style type="text/css">
    td {
        padding: 0 25px;
    }
    </style>
</head>

<body>
    <!-- ======= Header ======= -->

    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">NiceAdmin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="<?php echo $_SESSION['gambar']; ?>" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['username']; ?></span>
                    </a><!-- End Profile Iamge Icon -->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php echo $_SESSION['username']; ?></h6>
                            <span><?php echo $_SESSION['level'];?></span>
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
            <h1>Input Data Penjualan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="datapenjualan.php">Data Penjualan</a></li>
                </ol>
            </nav>
        </div>
        <!-- table section -->
        <div class="br-pagebody" style="margin: auto;">
            <div class="br-section-wrapper" style="padding: 20px;">
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="form-horizontal style-form" action="inputdatapenjualan.php" method="post"
                                name="form1" id="form1">
                                <table style="width:75%">
                                    <tr>
                                        <td colspan="2">
                                            <label for="">Tanggal Order</label>
                                            <div class="form-group">
                                                <div class='input-group date' id='datetimepicker1'>
                                                    <input type='text' class="form-control" name="tanggal" id="tanggal"
                                                        required />
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div class="form-group">
                                                <label for="">Nama Pelanggan</label>
                                                <input name="nama" type="text" id="nama" class="form-control mb-3"
                                                    required />
                                            </div>
                                        </td>&nbsp;
                                        <td width="50%">
                                            <div class="form-group">
                                                <label for="">Nama Produk</label>
                                                <select class="form-control mb-3" name="produk" id="produk">
                                                    <?php
                                        $query1="select * from tb_penjualan right join tb_produk on tb_penjualan.id_produk = tb_produk.id_produk";          
                                        $tampil=mysqli_query($con,$query1) or die(mysqli_error());

                                        while($data=mysqli_fetch_array($tampil))
                                        {
                                            $id   = $data['id_produk'];
                                            $nama = $data['nama_produk'];
                                            $bahan = $data['kategori'];
                                            $ukuran = $data['ukuran'];
                                            $sablon = $data['sablon'];
                                            $harga  = $data['harga'];
                                    ?>
                                                    <option value="<?php echo $data['id_produk']; ?>">
                                                        <?php echo $nama." - ".$bahan." - ".$ukuran." - ".$sablon;?>
                                                    </option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div class="form-group">
                                                <label>Jumlah Order</label>
                                                <input name="jumlah" type="number" id="jumlah" class="form-control mb-3"
                                                    required />
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <?php
                                            // $jumlah = $_POST['jumlah'];
                                            // if(isset($_POST['cek'])) {
                                            //     $total = $harga*$jumlah;
                                            // }
                        ?>
                                            <!-- <h3>TOTAL : Rp,-</h3> -->
                                            <input name="harga" type="text" id="harga" class="form-control mb-3"
                                                value="<?php echo $harga; ?>" />
                                        </td>
                                    </tr>
                                </table>
                                <!-- <button type="submit" class="btn btn-primary" name="cek" id="cek">Cek</button> -->
                                <button type="submit" class="btn btn-success" name="simpan" id="simpan">Simpan</button>
                                <?php 
                
            ?>
                            </form>
                        </div>
                    </div>
                </section>

    </main><!-- end content -->

    <!-- ======= Footer ======= -->
    <footer id=" footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights
            Reserved
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
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <script src="../assets/vendor/chart.js/chart.min.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js">
    </script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

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