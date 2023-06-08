<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

  include 'koneksi.php';

  if(isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telepon = $_POST['telepon'];
    $kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];

    $queryRegister = "INSERT INTO tb_user (nama_user, gender_user, telp_user, email_user, password, alamat_user) VALUES ('$nama', '$kelamin', '$telepon', '$email', '$password', '$alamat')";
    $queryCekEmail = "SELECT * FROM tb_user WHERE email_user = '$email'";
    
    $resultRegister = mysqli_query($con, $queryRegister);
    $resultCekEmail = mysqli_query($con, $queryCekEmail);

    if(mysqli_num_rows($resultCekEmail) > 1) {
        echo '<script>alert("Email sudah digunakan, Silahkan gunakan email lainnya!");</script>';
    }else {
        if($resultRegister) {
            echo '<script>alert("Registrasi berhasil. Silakan login."); window.location.href = "login.php";</script>';
            exit;
        }else {
            echo '<script>alert("Registrasi gagal. Silakan coba lagi.");</script>';
        }
    }
  }
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
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Yummy
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main id="main">

        <!-- Section: Design Block -->
        <section class="text-center text-lg-start">
            <style>
            .cascading-right {
                margin-right: -50px;
            }

            @media (max-width: 991.98px) {
                .cascading-right {
                    margin-right: 0;
                }
            }
            </style>

            <!-- Jumbotron -->
            <div class="container py-4">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
                            <div class="card-body p-5 shadow-5 text-center">
                                <h1>Sakinah Gamis<span style="color: #ce1212;">.</span></h1>
                                <p>Lengkapi data diri anda dan dapatkan barang pilihan anda</p>
                                <form method="post" action="">
                                    <div class="form-outline mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="form3Example1" class="form-control"
                                                placeholder="Nama Lengkap" name="nama" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="email" id="form3Example1" class="form-control"
                                                    placeholder="E-Mail" name="email" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="password" id="form3Example2" class="form-control"
                                                    placeholder="Password" name="password" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <select class="form-select" aria-label="Default select example"
                                                name="jenis_kelamin">
                                                <option selected>Jenis Kelamin</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="number" id="form3Example2" class="form-control"
                                                    placeholder="Nomor Telepon" name="telepon" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <div class="form-outline">
                                            <textarea class="form-control" placeholder="Alamat Lengkap"
                                                id="floatingTextarea" name="alamat" style="height: 100px;"></textarea>
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-block mb-6" name="register"
                                        style="background-color: #ce1212; color: white;">
                                        Register
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <img src="admin.sakinahgamis.com/admin/gambar/register.jpeg" class="w-100 rounded-4 shadow-4"
                            alt="" />
                    </div>
                </div>
            </div>
            <!-- Jumbotron -->
        </section>
        <!-- Section: Design Block -->

    </main><!-- End #main -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const minusBtn = document.querySelector('.minus-btn');
        const plusBtn = document.querySelector('.plus-btn');
        const quantityInput = document.querySelector('.form-control');

        minusBtn.addEventListener('click', function() {
            let value = parseInt(quantityInput.value);
            if (value > 1) {
                value--;
                quantityInput.value = value;
            }
        });

        plusBtn.addEventListener('click', function() {
            let value = parseInt(quantityInput.value);
            value++;
            quantityInput.value = value;
        });
    });
    </script>

</body>

</html>