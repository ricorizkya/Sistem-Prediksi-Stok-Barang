<?php 
session_start();
if (empty($_SESSION['username']) || ($_SESSION['level'] != 'Administrator')){
    session_destroy(); 
	header('location:../index.php');
} else {
	include "../koneksi.php";
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
  
  
  <?php include ("../view/header.php");?>
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
      <h1>Edit Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="datapegawai.php">Data Pegawai</a></li>
          <li class="breadcrumb-item"><a href="tambah_pegawai.php">Tambah Pegawai</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <?php
             $query = mysql_query("SELECT * FROM tb_pegawai WHERE id_pegawai='$_GET[kd]'");
             $data  = mysql_fetch_array($query);
          ?>

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit </h5>
              <form role="form" lass="form-horizontal style-form" style="margin-top: 20px;" action="update-data_pegawai.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
              <div class="row mb-3">
                  <div class="col-sm-9">
                  <input style="display: none;" name="id_pegawai" type="text" id="id_pegawai" class="form-control" placeholder="Id Pegawai" value="<?php echo $data['id_pegawai']; ?>" autofocus="on"  required />
                  </div>
                </div><!-- row -->
              <!-- Horizontal Form -->
              <form>
                <div class="row mb-3">
                  <label for="inputText3" class="col-sm-3 col-form-label">Nama</label>
                  <div class="col-sm-9">
                  <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama" value="<?php echo $data['nama']; ?>" autofocus="on"  required />
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputDate3" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-9">
                  <input name="tgl_lahir" type="date" class="form-control" id="tgl_lahir" placeholder="Tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>" required />
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Jekel</label>
                  <div class="col-sm-9">
                  <select class="form-control" name="jekel" value="<?php echo $data['jekel']; ?>" >
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText3" class="col-sm-3 col-form-label">Alamat</label>
                  <div class="col-sm-9">
                  <input name="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat" value="<?php echo $data['alamat']; ?>" required />
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText3" class="col-sm-3 col-form-label">telp</label>
                  <div class="col-sm-9">
                  <input name="telp" type="text" class="form-control" id="telp" placeholder="Telp" value="<?php echo $data['telp']; ?>" required />
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                  <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="<?php echo $data['email']; ?>" required />
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
            <center><div class="card-title">Foto Pegawai</div></center>
                
                <center>  <form role="form" lass="form-horizontal style-form" style="margin-top: 20px;" action="update-foto-pegawai.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <img src="<?php echo $data['gambar']; ?>" /><br><br>
                <input style="display: none;" name="id_pegawai" type="text" id="id_pegawai" class="form-control" placeholder="Id Pegawai" value="<?php echo $data['id_pegawai']; ?>" autofocus="on"  required />
                <input style="width: 150px;" name="gambar" id="gambar" type="file" class="form-control"> </center>
  
                </div><!-- card-body -->
                <center><div class="card-footer mg-t-auto">
                  <button class="btn btn-info btn-oblong bd-0 ">Submit</button>
                  <button class="btn btn-secondary btn-oblong bd-0 bg-gray-400 mg-l-5">Cancel</button>
                </div><!-- card-footer --></center>
                </form>
              </div><!-- card -->
            </div><!-- col-6 -->
  

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
<?php
  }
?>