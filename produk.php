<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

  include 'koneksi.php';
  $id_produk = $_GET['id'];
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

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>Sakinah Gamis<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#hero">Beranda</a></li>
                    <li><a href="#menu">Produk</a></li>
                    <!-- <li><a href="#events">Events</a></li> -->
                    <!-- <li><a href="#chefs">Chefs</a></li> -->
                    <!-- <li><a href="#gallery">Gallery</a></li> -->
                    <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
                    <li><a href="#about">Tentang Kami</a></li>
                    <li><a href="#contact">Kontak Kami</a></li>
                </ul>
            </nav><!-- .navbar -->

            <a class="btn-book-a-table" href="#book-a-table"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                    height="20" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path
                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                </svg>&nbsp; Login/Register</a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <?php
                $queryProduk = "SELECT * FROM tb_produk WHERE id_produk=$id_produk";
                $resultProduk = mysqli_query($con, $queryProduk);
                $dataProduk = mysqli_fetch_array($resultProduk);
            ?>
            <div class="row justify-content-between gy-5">
                <div
                    class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                    <h2 data-aos="fade-up"><?php echo $dataProduk['nama_produk']; ?></h2>
                    <p data-aos="fade-up" data-aos-delay="100">Kami menyediakan berbagai macam jenis gamis, kebaya dan
                        daster dengan kualitas premium.</p>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="quantity">
                            <button class="btn-book-a-table minus" type="button">-</button>
                            <input type="text" class="quantity-input" value="1">
                            <button class="btn-book-a-table plus" type="button">+</button>
                        </div>
                    </div><br>
                    <a class="btn-book-a-table" href="produk.php?id=<?= $dataGamis['id_produk']; ?>">Masukkan
                        Keranjang</a>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                    <img src="admin.sakinahgamis.com/admin/gambar/produk/<?= $dataProduk['gambar_produk'];?>"
                        class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
                </div>
            </div>
        </div>
    </section><!-- End Hero Section -->

    <main id="main">

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Produk Serupa</h2>
                    <p>Lihat Produk <span>Lainnya</span></p>
                </div>

                <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <?php
                        $kategori = $dataProduk['kategori_produk'];
                        $resultLain = mysqli_query($con, "SELECT * FROM tb_produk WHERE kategori_produk='$kategori'");
                        while($dataLain = mysqli_fetch_array($resultLain)){
                    ?>
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="row gy-4 justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="testimonial-content">
                                            <h3><?= $dataLain['nama_produk']; ?></h3>
                                            <h4>Rp <?= number_format($dataLain['harga_produk'], 0, ',', '.');?>,-</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 text-center">
                                        <img src="admin.sakinahgamis.com/admin/gambar/produk/<?= $dataLain['gambar_produk'];?>"
                                            class="img-fluid testimonial-img" alt="">
                                    </div>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->
                        <?php } ?>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div>
                        <h4>Alamat</h4>
                        <p>
                            Perumahan Singocandi Blok B-17 RT.01/RW.04, Gedangsewu, Singocandi, Kec. Kota Kudus,
                            Kabupaten Kudus, Jawa Tengah 59314 <br>
                        </p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Nomor Telepon</h4>
                        <p>
                            <strong>Nomor Telepon:</strong>0811-2828-129<br>
                            <strong>Email:</strong> contact@sakinahgamis.com<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Jam Buka</h4>
                        <p>
                            <strong>Setiap Hari: </strong>09.00 WIB - 21.00 WIB<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>

            </div>
        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->

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
        const minusBtn = document.querySelector('.btn-book-a-table minus');
        const plusBtn = document.querySelector('.btn-book-a-table plus');
        const quantityInput = document.querySelector('.quantity-input');

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