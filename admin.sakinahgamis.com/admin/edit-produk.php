<?php 
session_start();
if (empty($_SESSION['username'])){
    session_destroy(); 
	header('location:../index.php');
} else {
	include "../koneksi.php";
  global $con;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Icons / Bootstrap - NiceAdmin Bootstrap Template</title>
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->



        <!-- ########## START: MAIN PANEL ########## -->
        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Edit Produk</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="data_produk.php">Data Produk</a></li>
                        <li class="breadcrumb-item"><a href="edit-produk.php">Edit Produk</a></li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <?php
             $query = mysqli_query($con, "SELECT * FROM tb_produk WHERE id_produk='$_GET[kd]'");
             $data  = mysqli_fetch_array($query);
          ?>

            <section class="section">
                <div class="row">
                    <div class="col-lg-6">

                        <div class="card">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">Edit Data Produk</h5>
                                </center>
                                <form role="form" lass="form-horizontal style-form" style="margin-top: 20px;"
                                    action="update-data-produk.php" method="post" enctype="multipart/form-data"
                                    name="form1" id="form1">
                                    <div class="row mb-3">
                                        <div class="col-sm-9">
                                            <input style="display: none;" name="id_produk" type="text" id="id_produk"
                                                class="form-control" placeholder="Id User"
                                                value="<?php echo $data['id_produk']; ?>" required />
                                        </div>
                                    </div><!-- row -->
                                    <!-- Horizontal Form -->
                                    <form>
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Produk</label>
                                            <div class="col-sm-9">
                                                <input name="nama" type="text" id="nama" class="form-control"
                                                    value="<?php echo $data['nama_produk']; ?>" autofocus="on"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label">Kategori</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="kategori">
                                                    <option value="Gamis">Gamis</option>
                                                    <option value="Kebaya">Kebaya</option>
                                                    <option value="Daster">Daster</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputText3" class="col-sm-3 col-form-label">Harga</label>
                                            <div class="col-sm-9">
                                                <input name="harga" class="form-control" id="harga"
                                                    value="<?php echo $data['harga_produk']; ?>" required />
                                            </div>
                                        </div>
                                        <center>
                                            <div class="card-footer mg-t-auto">
                                                <button class="btn btn-info btn-oblong bd-0" type="submit" name="update"
                                                    id="update">Update</button>
                                            </div><!-- card-footer -->
                                        </center>
                                    </form><!-- End Horizontal Form -->
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <center>
                                    <div class="card-title">Update Data Stok</div>
                                </center>
                                <form role="form" lass="form-horizontal style-form" style="margin-top: 20px;"
                                    action="update-stok.php" method="post" name="form1" id="form1">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Ukuran</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="ukuran">
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                                <option value="All Size">All Size</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText3" class="col-sm-3 col-form-label">Stok</label>
                                        <div class="col-sm-9">
                                            <input name="stok" id="stok" type="number" class="form-control">
                                        </div>
                                    </div>

                                    <input style="display: none;" name="id_produk" type="text" id="id_produk"
                                        class="form-control" placeholder="Id Produk"
                                        value="<?php echo $data['id_produk']; ?>" />
                                    <input style="display: none;" name="id_admin" type="text" id="id_admin"
                                        class="form-control" placeholder="Id Produk"
                                        value="<?php echo $_SESSION['id_admin']; ?>" />
                                    <!-- <div class="form-group">
                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' class="form-control" name="tanggal" id="tanggal"
                                                required />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div> <br> -->

                            </div><!-- card-body -->
                            <center>
                                <div class="card-footer mg-t-auto">
                                    <button class="btn btn-info btn-oblong bd-0" type="submit" name="update"
                                        id="update">Update</button>
                                </div><!-- card-footer -->
                            </center>
                            </form>
                        </div>

                    </div>

                    <div class="col-lg-6">

                        <div class="card">
                            <div class="card-body">
                                <center>
                                    <div class="card-title">Foto Produk</div>
                                </center>

                                <center>
                                    <form role="form" lass="form-horizontal style-form" style="margin-top: 20px;"
                                        action="update-foto-produk.php" method="post" enctype="multipart/form-data"
                                        name="form1" id="form1">
                                        <img src="gambar/produk/<?php echo $data['gambar_produk']; ?>" height="300"
                                            width="200" style="border: 3px solid #333333;" /><br><br>
                                        <input style="display: none;" name="id_produk" type="text" id="id_user"
                                            class="form-control" placeholder="Id Produk"
                                            value="<?php echo $data['id_produk']; ?>" autofocus="on" required />
                                        <input style="width: 150px;" name="gambar" id="gambar" type="file"
                                            class="form-control">
                                </center>

                            </div><!-- card-body -->
                            <center>
                                <div class="card-footer mg-t-auto">
                                    <button class="btn btn-info btn-oblong bd-0 ">Submit</button>
                                    <button class="btn btn-secondary btn-oblong bd-0 bg-gray-400 mg-l-5">Cancel</button>
                                </div><!-- card-footer -->
                            </center>
                            </form>
                        </div>

                    </div><!-- col-6 -->


                </div>
    </div>



    </div>
    </div>
    </section>

    </main><!-- End #main -->

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

<?php
  }
?>