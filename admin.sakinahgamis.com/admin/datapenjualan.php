<?php
session_start();
if (empty($_SESSION['username'])){
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
                            Admin
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
            <h1>Data Penjualan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="datapenjualan.php">Data Penjualan</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <?php
      $query1="select * from tb_penjualan left join tb_produk on tb_penjualan.id_produk = tb_produk.id_produk ORDER BY id_penjualan DESC";
      $tampil=mysqli_query($con,$query1);
  ?>
        <!-- table section -->
        <div class="br-pagebody" style="margin: auto;">
            <div class="br-section-wrapper" style="padding: 20px;">
                <canvas id="myChart"></canvas><br>
                <?php
                    $arrayBulan = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                    
                    $queryBulan = "SELECT DATE_FORMAT(tgl, '%Y-%m') AS bulan, SUM(jumlah) AS total_item_terjual FROM tb_penjualan WHERE YEAR(tgl) = 2023 GROUP BY DATE_FORMAT(tgl, '%Y-%m') ORDER BY DATE_FORMAT(tgl, '%Y-%m')";
                    
                    $result = mysqli_query($con, $queryBulan);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $bulan = $row['bulan'];
                        $total_item_terjual = $row['total_item_terjual'];
                    
                        // Mendapatkan bulan dari format 'YYYY-MM'
                        $index_bulan = (int)substr($bulan, 5, 2) - 1;
                    
                        // Memasukkan nilai total_item_terjual ke dalam array bulan sesuai dengan indeks bulannya
                        $arrayBulan[$index_bulan] = $total_item_terjual;
                    }
                    
                ?>
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
                                                <th scope>Tanggal Order</th>
                                                <th scope>Nama Pelanggan</th>
                                                <th scope>Pesanan</th>
                                                <th scope>Jumlah Pesanan</th>
                                                <th scope>Total</th>
                                                <th scope>Status</th>
                                                <th scope>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                      $no=0;
                      while($data=mysqli_fetch_array($tampil))
                      {
                        $no++;
                        $nama = $data['nama_produk'];
                        $id_user = $data['id_user'];
                        $query_user = mysqli_query($con,"SELECT * FROM tb_user WHERE id_user=$id_user");
                        $data_user = mysqli_fetch_array($query_user);
                  ?>
                                            <tr>
                                                <td scope><?php echo $no;?></td>
                                                <td scope><?php echo $data['tgl']; ?></td>
                                                <td scope><?php echo $data_user['nama_user'];?></td>
                                                <td scope><?php echo $nama;?>
                                                </td>
                                                <td scope><?php echo $data['jumlah'];?> PCS</td>
                                                <td scope>
                                                    Rp<?php echo number_format($data['total_pembayaran'],0,'','.');?>,-
                                                </td>
                                                <td scope><?php echo $data['status_pembayaran'];?></td>
                                                <td scope>
                                                    <?php 
                                                        if($data['status_pembayaran'] == "Dibayar") {
                                                            echo "<a href='detailpesanan.php'
                                                    role='button' class='btn btn-secondary disabled'>Proses</a>";
                                                    }else {
                                                    echo "<a href='detailpesanan.php?hal=detail&kd=".$data['id_penjualan']."' role='button'
                                                        class='btn btn-success'>Proses</a>";
                                                    }
                                                    ?>
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
    var data = <?php echo json_encode($arrayBulan); ?>;
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                'Oktober', 'November', 'Desember'
            ],
            datasets: [{
                label: 'Penjualan Tahun 2023',
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
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

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>