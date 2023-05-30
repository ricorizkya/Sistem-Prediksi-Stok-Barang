<?php
include "../koneksi.php";
global $con;
session_start();
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
                <span class="d-none d-lg-block">NiceAdmin</span>
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

    <!-- Koneksi Database -->


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Admin</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="data_admin.php">Data Admin</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <?php
          $query1="select * from tb_admin";
          $tampil=mysqli_query($con,$query1);
      ?>
        <!-- table section -->
        <div class="br-pagebody" style="margin: auto;">
            <div class="br-section-wrapper" style="padding: 20px;">

                <div class="text-left">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UjiModal1">
                        Tambah Admin
                    </button>
                </div>
                <br>

                <div class="modal fade" id="basicModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Basic Modal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et
                                reprehenderit. Placeat autem numquam et fuga numquam. Tempora in facere consequatur sit
                                dolor ipsum. Consequatur nemo amet incidunt est facilis. Dolorem neque recusandae quo
                                sit molestias sint dignissimos.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div><!-- End Basic Modal-->

                <!-- Modal -->
                <div class="modal fade" id="UjiModal1" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">Input Data Admin</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form class="form-horizontal style-form" action="insert-admin.php" method="post"
                                    enctype="multipart/form-data" name="form1" id="form1">

                                    <div class="form-group">
                                        <label class="col-sm-8 col-sm-8 control-label">Username</label>
                                        <div class="col-sm-12">
                                            <input name="username" type="text" id="username" class="form-control mb-3"
                                                placeholder="Username" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-8 col-sm-8 control-label">Password</label>
                                        <div class="col-sm-12">
                                            <input name="password" type="password" id="password"
                                                class="form-control mb-3" placeholder="Password" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-8 col-sm-8 control-label">Fullname</label>
                                        <div class="col-sm-12">
                                            <input name="fullname" type="text" id="fullname" class="form-control mb-3"
                                                placeholder="Ex : Agus Pambudi" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-8 col-sm-8 control-label">Nomor Telepon</label>
                                        <div class="col-sm-12">
                                            <input name="telepon" type="number" id="telepon" class="form-control mb-3"
                                                placeholder="Ex : 082144285606" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-8 col-sm-8 control-label">Email</label>
                                        <div class="col-sm-12">
                                            <input name="email" type="mail" id="email" class="form-control mb-3"
                                                placeholder="Ex : email@email.com" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-8 col-sm-8 control-label">Alamat</label>
                                        <div class="col-sm-12">
                                            <input name="alamat" type="text" id="alamat" class="form-control mb-3"
                                                placeholder="Ex : Perum Singocandi No1.8 Kecamatan Kota, Kabupaten Kudus"
                                                required />
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
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
                                                <th scope>No</th>
                                                <th scope>Username</th>
                                                <th scope>Password</th>
                                                <th scope>Fullname</th>
                                                <th scope>Level</th>
                                                <!--<th scope>>Gambar</th>-->
                                                <th scope>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                          $no=0;
                          while($data=mysqli_fetch_array($tampil))
                          { $no++; ?>
                                            <tr>
                                                <td scope><?php echo $no;?></td>
                                                <td scope><?php echo $data['username']; ?></>
                                                </td>
                                                <td scope><?php echo $data['password'];?></td>
                                                <td scope><?php echo $data['nama_admin'];?></td>
                                                <td scope><?php echo $data['telp_admin'];?></td>
                                                <td>
                                                    <center>
                                                        <!-- End Table with stripped rows -->
                                                        <div id="thanks">


                                                            <a class="btn btn-sm btn-success tooltips"
                                                                data-placement="bottom" data-toggle="tooltip"
                                                                title="Lihat Admin"
                                                                href="detail-admin.php?hal=lihat&kd=<?php echo $data['id_admin'];?>"><i
                                                                    class="far fa-address-card"></i></a>
                                                            <a class="btn btn-sm btn-primary" data-placement="bottom"
                                                                data-toggle="tooltip" title="Edit Admin"
                                                                href="edit-admin.php?hal=edit&kd=<?php echo $data['id_admin'];?>"><i
                                                                    class="fas fa-bible"></i></a>

                                                            <a onclick="return confirm ('Yakin hapus <?php echo $data['fullnamee']; ?> ?');"
                                                                class="btn btn-sm btn-danger tooltips"
                                                                data-placement="bottom" data-toggle="tooltip"
                                                                title="Hapus Data Admin"
                                                                href="hapus-admin.php?hal=hapus&kd=<?php echo $data['id_admin'];?>"><i
                                                                    class="fas fa-trash-alt"></i></a>
                                                        </div>
                                                    </center>
                                                </td>
                                            </tr>
                                            <?php
                          }
                          ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

    </main><!-- End #main -->

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