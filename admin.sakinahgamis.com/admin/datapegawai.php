<?php
session_start();
if (empty($_SESSION['username']) || ($_SESSION['level'] != 'Administrator')){
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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
                <span class="d-none d-lg-block">NiceAdmin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="gambar/<?php echo $_SESSION['gambar']; ?>" alt="Profile" class="rounded-circle">
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


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="datapegawai.php">Data Pegawai</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <?php
          $query1="select * from tb_pegawai";
          $tampil=mysqli_query($con,$query1);
      ?>
      <!-- table section -->
      <div class="br-pagebody" style="margin: auto;">
        <div class="br-section-wrapper"  style="padding: 20px;">

          <div class="text-left">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UjiModal1">
                Tambah Pegawai
              </button>
          </div>
          <br>

              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Basic Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Basic Modal-->

            <!-- Modal -->
            <div class="modal fade" id="UjiModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Input Data Pegawai</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form class="form-horizontal style-form" action="insert-pegawai.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

                      <div class="form-group">
                         <label class="col-sm-8 col-sm-8 control-label">Nama</label>
                            <div class="col-sm-12">
                              <input name="nama" type="text" id="nama" class="form-control mb-3" placeholder="Nama" required />
                            </div>
                      </div>

                      <div class="form-group">
                         <label class="col-sm-8 col-sm-8 control-label">Tanggal Lahir</label>
                            <div class="col-sm-12">
                              <input name="tgl_lahir" type="date" id="tgl_lahir" class="form-control mb-3" placeholder="Tanggal" required />
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="col-sm-8 col-sm-8 control-label">Jenis Kelamin</label>
                            <div class="col-sm-8">
                              <select class="form-control mb-3" name="jekel" id="jekel">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                              </select>
                            </div>
                      </div>

                      <div class="form-group">
                         <label class="col-sm-8 col-sm-8 control-label">Alamat</label>
                            <div class="col-sm-12">
                              <input name="alamat" type="text" id="alamat" class="form-control mb-3" placeholder="Alamat" required />
                            </div>
                      </div>

                      <div class="form-group">
                         <label class="col-sm-8 col-sm-8 control-label">Telfon</label>
                            <div class="col-sm-12">
                              <input name="telp" type="text" id="telp" class="form-control mb-3" placeholder="Telfon" required />
                            </div>
                      </div>

                      <div class="form-group">
                         <label class="col-sm-8 col-sm-8 control-label">Email</label>
                            <div class="col-sm-12">
                              <input name="email" type="text" id="email" class="form-control mb-3" placeholder="Email" required />
                            </div>
                      </div>

                      <div class="form-group">
                         <label class="col-sm-8 col-sm-8 control-label">Gambar</label>
                          <div class="col-sm-12">
                             <input name="gambar" id="gambar" type="file" />
                           </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div></form>
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
                  <th scope>Nama</th>
                    <!--<th scope>Tanggal Lahir</th>-->
                  <th scope>Jekel</th>
                  <!--<th scope>>Alamat</th>-->
                  <!--<th scope>Telfon</th>-->
                  <th scope>Email</th>
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
                          <td scope><?php echo $data['nama']; ?></></td>
                            <!--<td scope><?php echo $data['tgl_lahir'];?></td>-->
                          <td scope><?php echo $data['jekel'];?></td>
                          <!--<td scope><?php echo $data['alamat'];?></td>-->
                          <!--<td scope><?php echo $data['telp'];?></td>-->
                          <td scope><?php echo $data['email'];?></td>
                          <!--<td scope><img src="<?php echo $data['gambar']; ?>" height="100" width="120" style="border: 3px solid #333333;" /></center></td>-->
                          <td>
                            <center>
              <!-- End Table with stripped rows -->
                          <div id="thanks">


                                <a class="btn btn-sm btn-success tooltips" data-placement="bottom" data-toggle="tooltip" title="Lihat Pegawai" href="detail-pegawai.php?hal=lihat&kd=<?php echo $data['id_pegawai'];?>"><i class="far fa-address-card"></i></a>
                                <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit pegawai" href="edit-pegawai.php?hal=edit&kd=<?php echo $data['id_pegawai'];?>"><i class="fas fa-bible"></i></a>

                                <a onclick="return confirm ('Yakin hapus <?php echo $data['fullnamee']; ?> ?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Data pegawai" href="hapus-pegawai.php?hal=hapus&kd=<?php echo $data['id_pegawai'];?>"><i class="fas fa-trash-alt"></i></a>
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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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