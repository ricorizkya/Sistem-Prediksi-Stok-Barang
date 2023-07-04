<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

  include 'koneksi.php';
  session_start();
  
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

</head>

<body>

    <?php
        if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['email'])) {
  $email = $_SESSION['email'];

  $queryIDUser = "SELECT * FROM tb_user WHERE email_user='$email'";
  $resultIDUser = mysqli_query($con, $queryIDUser);
  $dataIDUser = mysqli_fetch_assoc($resultIDUser);
  $IDUser = $dataIDUser['id_user'];

  $queryKeranjang = "SELECT SUM(qty_barang) AS keranjang FROM `tb_keranjang` WHERE id_user=$IDUser;";
  $resultKeranjang = mysqli_query($con, $queryKeranjang);
  $dataKeranjang = mysqli_fetch_assoc($resultKeranjang);
  $keranjang = $dataKeranjang['keranjang'];
    ?>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
                <h1>Sakinah Gamis<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php#hero">Beranda</a></li>
                    <li><a href="index.php#menu">Produk</a></li>
                    <li><a href="index.php#about">Tentang Kami</a></li>
                    <li><a href="index.php#contact">Kontak Kami</a></li>
                </ul>
            </nav><!-- .navbar -->

            <div class="dropdown">
                <a class="btn btn-book-a-table dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path
                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                    </svg>&nbsp; Akun
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="detailkeranjang.php"><svg xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" fill="#ec2727" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                            <path
                                d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z" />
                        </svg>&nbsp; Keranjang &nbsp;<span class="cart-count">
                            <?php
                                if($keranjang == 0) {
                                    echo "0";
                                }else {
                                    echo $keranjang;
                                }
                            ?>
                        </span></a>
                    <a class="dropdown-item" href="profil.php"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="#ec2727" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                            <path
                                d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                        </svg>&nbsp; Profil Saya</a>
                    <a class="dropdown-item" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="#ec2727" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                            <path fill-rule="evenodd"
                                d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg>&nbsp; Logout</a>
                </div>
            </div>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>
    <!-- End Header -->

    <?php
    }else{
    ?>
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
                    <li><a href="index.php#hero">Beranda</a></li>
                    <li><a href="index.php#menu">Produk</a></li>
                    <li><a href="index.php#about">Tentang Kami</a></li>
                    <li><a href="index.php#contact">Kontak Kami</a></li>
                </ul>
            </nav><!-- .navbar -->

            <a class="btn-book-a-table" href="login.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path
                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                </svg>&nbsp; Login/Register</a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>
    <!-- End Header -->
    <?php } ?>

    <main id="main">

        <!-- ======= About Section ======= -->
        <br>
        <section id="" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Profil Saya</h2>
                    <p>Data <span>Diri</span></p>
                </div>

                <div class="row gy-4">

                    <?php
                    if(!isset($_POST['profil'])){
                ?>

                    <div class="col-lg-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="content ps-0 ps-lg-5">

                            <form action="" method="post">
                                <b>Nama Lengkap</b><br>
                                <?= $dataIDUser['nama_user']; ?><br><br>
                                <b>Jenis Kelamin</b><br>
                                <?= $dataIDUser['gender_user']; ?><br><br>
                                <b>Nomor Telepon</b><br>
                                <?= $dataIDUser['telp_user']; ?><br><br>
                                <b>Alamat E-Mail</b><br>
                                <?= $dataIDUser['email_user']; ?><br><br>
                                <b>Password User</b><br>
                                <?= str_repeat("&#8226;", strlen($dataIDUser['password'])); ?><br><br>
                                <b>Nomor Telepon</b><br>
                                <?= $dataIDUser['telp_user']; ?><br><br>
                                <b>Alamat Lengkap</b><br>
                                <?= $dataIDUser['alamat_user']; ?><br><br>
                                <button type="submit" name="profil" class="btn btn-outline-danger btn-block"
                                    style="width: 100%;">Ubah Data Profil</button>
                            </form>
                        </div>
                    </div>

                    <?php
                        }elseif(isset($_POST['profil'])){
                    ?>

                    <div class="col-lg-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="content ps-0 ps-lg-5">

                            <form action="" method="post">
                                <b>Nama Lengkap</b><br>
                                <?= $dataIDUser['nama_user']; ?><br><br>
                                <b>Jenis Kelamin</b><br>
                                <?= $dataIDUser['gender_user']; ?><br><br>
                                <b>Nomor Telepon</b><br>
                                <?= $dataIDUser['telp_user']; ?><br><br>
                                <b>Alamat E-Mail</b><br>
                                <?= $dataIDUser['email_user']; ?><br><br>
                                <b>Password User</b><br>
                                <?= str_repeat("&#8226;", strlen($dataIDUser['password'])); ?><br><br>
                                <b>Nomor Telepon</b><br>
                                <?= $dataIDUser['telp_user']; ?><br><br>
                                <b>Alamat Lengkap</b><br>
                                <?= $dataIDUser['alamat_user']; ?><br><br>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <form action="" method="post">
                            <p><b>Ubah data diri anda pada form di bawah ini.</b></p>
                            <div class="form-outline mb-4">
                                <div class="form-outline">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" id="form3Example1" class="form-control" name="nama"
                                        placeholder="Nama Lengkap" value="<?= $dataIDUser['nama_user'];?>" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label for="">Alamat E-Mail</label>
                                        <input type="email" id="form3Example1" class="form-control" placeholder="E-Mail"
                                            name="email" value="<?= $dataIDUser['email_user'];?>" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label for="">Password</label>
                                        <input type="text" id="form3Example2" class="form-control"
                                            placeholder="Password" name="password"
                                            value="<?= $dataIDUser['password'];?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="">Jenis Kelamin</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="jenis_kelamin">
                                        <?php
                                            if($dataIDUser['gender_user'] == 'Laki-Laki'){
                                        ?>
                                        <option value="">Jenis Kelamin</option>
                                        <option value="Laki-Laki" selected>Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                        <?php
                                            }elseif($dataIDUser['gender_user'] == 'Perempuan'){
                                        ?>
                                        <option value="">Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan" selected>Perempuan</option>
                                        <?php
                                            }else{
                                        ?>
                                        <option value="" selected>Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label for="">Nomor Telepon</label>
                                        <input type="number" id="form3Example2" class="form-control"
                                            placeholder="Nomor Telepon" name="telepon"
                                            value="<?= $dataIDUser['telp_user'];?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <div class="form-outline">
                                    <label for="">Alamat Lengkap</label>
                                    <textarea class="form-control" placeholder="Alamat Lengkap" id="floatingTextarea"
                                        name="alamat"
                                        style="height: 100px;"><?= $dataIDUser['alamat_user'];?></textarea>
                                </div>
                            </div>
                            <button type="submit" name="ubah" class="btn btn-outline-danger btn-block"
                                style="width: 100%;">Ubah Data Profil</button>
                        </form>
                    </div>

                    <?php
                        }

                        if(isset($_POST['ubah'])) {
                            $nama = $_POST['nama'];
                            $email_user = $_POST['email'];
                            $password = $_POST['password'];
                            $jekel = $_POST['jenis_kelamin'];
                            $telepon = $_POST['telepon'];
                            $alamat = $_POST['alamat'];

                            $queryUpdate = mysqli_query($con, "UPDATE tb_user SET nama_user='$nama', gender_user='$jekel', telp_user='$telepon', email_user='$email_user', password='$password', alamat_user='$alamat' WHERE email_user='$email'");
                            
                            if($queryUpdate) {
                                echo '<script>alert("Ubah data diri berhasil!"); window.location.href = "profil.php";</script>';
                            }else {
                                echo '<script>alert("Ubah data diri gagal!"); window.location.href = "profil.php";</script>';
                            }
                        }
                    ?>

                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Menu Section ======= -->
        <section id="" class="menu">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Riwayat Pesanan</h2>
                    <p>Daftar Pesa<span>nan Saya</span></p>
                </div>

                <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

                    <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
                            <h4>Diproses</h4>
                        </a>
                    </li><!-- End tab nav item -->

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
                            <h4>Selesai</h4>
                        </a>
                    </li><!-- End tab nav item -->

                </ul>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

                    <div class="tab-pane fade active show" id="menu-starters">

                        <div class="tab-header text-center">
                            <p>Pesanan</p>
                            <h3>Diproses</h3>
                        </div>

                        <div class="row gy-5">

                            <table class="table table-hover">
                                <thead style="background-color: #000; color: #fff;">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal Pesanan</th>
                                        <th scope="col">Nama Pesanan</th>
                                        <th scope="col">Total Pembayaran</th>
                                        <th scope="col">Bukti Pembayaran</th>
                                        <th scope="col">Status Pembayaran</th>
                                        <th scope="col">Status Pesanan</th>
                                        <th scope="col">Nomor Resi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $queryProses = "SELECT * FROM tb_penjualan LEFT JOIN tb_produk ON tb_penjualan.id_produk = tb_produk.id_produk WHERE id_user=$IDUser AND status_pesanan='Diproses' ORDER BY tgl DESC, id_user";
                                        $resultProses = mysqli_query($con, $queryProses);

                                        if (mysqli_num_rows($resultProses) > 0) {
                                            $currentDate = null;
                                            $currentUserID = null;
                                            $no = 1;

                                            while ($dataProses = mysqli_fetch_array($resultProses)) {
                                                if ($dataProses['tgl'] != $currentDate || $dataProses['id_user'] != $currentUserID) {
                                                    // Tampilkan baris baru untuk tanggal dan ID user baru
                                                    if ($currentDate != null) {
                                                        echo "<tr>";
                                                        echo "<td>" . $currentDate . "</td>";
                                                        echo "<td>" . $firstProductName . " - " . $firstProductQuantity . " | " . $lastProductName . " - " . $lastProductQuantity . "</td>";
                                                        echo "<td>" . $totalHarga . "</td>";
                                                        echo "<td>" . $buktiPembayaran . "</td>";
                                                        echo "<td>" . $statusPembayaran . "</td>";
                                                        echo "<td>" . $statusPesanan . "</td>";
                                                        echo "</tr>";
                                                    }
                                                
                                                    $currentDate = $dataProses['tgl'];
                                                    $currentUserID = $dataProses['id_user'];
                                                    $totalHarga = $dataProses['total_pembayaran'];
                                                    $buktiPembayaran = $dataProses['bukti_pembayaran'];
                                                    $statusPembayaran = $dataProses['status_pembayaran'];
                                                    $statusPesanan = $dataProses['status_pesanan'];
                                                    $firstIDPenjualan = $dataProses['id_penjualan'];
                                                    $firstProductName = $dataProses['nama_produk'];
                                                    $firstProductQuantity = $dataProses['jumlah'];
                                                    $firstTotalHarga = $dataProses['total_pembayaran'];
                                                    $firstBuktiPembayaran = $dataProses['bukti_pembayaran'];
                                                    $firstStatusPembayaran = $dataProses['status_pembayaran'];
                                                    $firstStatusPesanan = $dataProses['status_pesanan'];
                                                    $firstResiPengiriman = $dataProses['resi_pengiriman'];
                                                
                                                    $lastDate = $dataProses['tgl'];
                                                    $lastIDPenjualan = $dataProses['id_penjualan'];
                                                    $lastProductName = $dataProses['nama_produk'];
                                                    $lastProductQuantity = $dataProses['jumlah'];
                                                    $lastTotalHarga = $dataProses['total_pembayaran'];
                                                    $lastBuktiPembayaran = $dataProses['bukti_pembayaran'];
                                                    $lastStatusPembayaran = $dataProses['status_pembayaran'];
                                                    $lastStatusPesanan = $dataProses['status_pesanan'];
                                                    $lastResiPengiriman = $dataProses['resi_pengiriman'];
                                                } else {
                                                    // Update nama produk dan jumlah produk terakhir dari row ini
                                                    $lastDate = $dataProses['tgl'];
                                                    $lastIDPenjualan = $dataProses['id_penjualan'];
                                                    $lastProductName = $dataProses['nama_produk'];
                                                    $lastProductQuantity = $dataProses['jumlah'];
                                                    $lastTotalHarga = $dataProses['total_pembayaran'];
                                                    $lastBuktiPembayaran = $dataProses['bukti_pembayaran'];
                                                    $lastStatusPembayaran = $dataProses['status_pembayaran'];
                                                    $lastStatusPesanan = $dataProses['status_pesanan'];
                                                    $lastResiPengiriman = $dataProses['resi_pengiriman'];
                                                }
                                            }

                                            if ($currentDate != null) {
                                                echo "<tr data-bs-toggle='modal' data-bs-target='#myModalProses' onclick='openModal(\"" . $firstIDPenjualan . "\", \"" . $lastIDPenjualan . "\", \"" . $currentDate . "\", \"" . $firstProductName . "\", \"" . $firstProductQuantity . "\", \"" . $lastProductName . "\", \"" . $lastProductQuantity . "\", \"" . $lastTotalHarga . "\", \"" . $lastBuktiPembayaran . "\", \"" . $lastStatusPembayaran . "\", \"" . $lastStatusPesanan . "\", \"" . $lastResiPengiriman . "\");'>";
                                                echo "<th scope='row'>" . $no++ . "</th>";
                                                echo "<td>" . $lastDate . "</td>";
                                                echo "<td>" . $firstProductName . " - " . $firstProductQuantity . " pcs | " . $lastProductName . " - " . $lastProductQuantity . " pcs</td>";
                                                echo "<td>Rp " . number_format($lastTotalHarga,0,',','.') . ",-</td>";
                                                echo "<td><img src='admin.sakinahgamis.com/admin/gambar/bukti/". $lastBuktiPembayaran ."'
                                                class='img-fluid' alt='' data-aos='zoom-out' data-aos-delay='300' style='width: 200px; height: 200px;'></td>";
                                                echo "<td>" . $lastStatusPembayaran . "</td>";
                                                echo "<td>" . $lastStatusPesanan . "</td>";
                                                echo "<td>" . $lastResiPengiriman . "</td>";
                                                echo "</tr>";
                                            }

                                            echo "</tr>";
                                        } else {
                                            echo "";
                                        }
                                        ?>
                                </tbody>

                            </table>

                        </div>
                    </div>
                    <!-- End Starter Menu Content -->

                    <div class="tab-pane fade" id="menu-lunch">

                        <div class="tab-header text-center">
                            <p>Pesanan</p>
                            <h3>Selesai</h3>
                        </div>

                        <table class="table table-hover">
                            <thead style="background-color: #000; color: #fff;">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal Pesanan</th>
                                    <th scope="col">Nama Pesanan</th>
                                    <th scope="col">Total Pembayaran</th>
                                    <th scope="col">Bukti Pembayaran</th>
                                    <th scope="col">Status Pembayaran</th>
                                    <th scope="col">Status Pesanan</th>
                                    <th scope="col">Nomor Resi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $queryProses = "SELECT * FROM tb_penjualan LEFT JOIN tb_produk ON tb_penjualan.id_produk = tb_produk.id_produk WHERE id_user=$IDUser AND status_pesanan='Selesai' ORDER BY tgl DESC, id_user";
                                        $resultProses = mysqli_query($con, $queryProses);

                                        if (mysqli_num_rows($resultProses) > 0) {
                                            $currentDate = null;
                                            $currentUserID = null;
                                            $no = 1;

                                            while ($dataProses = mysqli_fetch_array($resultProses)) {
                                                if ($dataProses['tgl'] != $currentDate || $dataProses['id_user'] != $currentUserID) {
                                                    // Tampilkan baris baru untuk tanggal dan ID user baru
                                                    if ($currentDate != null) {
                                                        echo "<tr>";
                                                        echo "<td>" . $currentDate . "</td>";
                                                        echo "<td>" . $firstProductName . " - " . $firstProductQuantity . " | " . $lastProductName . " - " . $lastProductQuantity . "</td>";
                                                        echo "<td>" . $totalHarga . "</td>";
                                                        echo "<td>" . $buktiPembayaran . "</td>";
                                                        echo "<td>" . $statusPembayaran . "</td>";
                                                        echo "<td>" . $statusPesanan . "</td>";
                                                        echo "</tr>";
                                                    }
                                                
                                                    $currentDate = $dataProses['tgl'];
                                                    $currentUserID = $dataProses['id_user'];
                                                    $totalHarga = $dataProses['total_pembayaran'];
                                                    $buktiPembayaran = $dataProses['bukti_pembayaran'];
                                                    $statusPembayaran = $dataProses['status_pembayaran'];
                                                    $statusPesanan = $dataProses['status_pesanan'];
                                                    $firstIDPenjualan = $dataProses['id_penjualan'];
                                                    $firstProductName = $dataProses['nama_produk'];
                                                    $firstProductQuantity = $dataProses['jumlah'];
                                                    $firstTotalHarga = $dataProses['total_pembayaran'];
                                                    $firstBuktiPembayaran = $dataProses['bukti_pembayaran'];
                                                    $firstStatusPembayaran = $dataProses['status_pembayaran'];
                                                    $firstStatusPesanan = $dataProses['status_pesanan'];
                                                    $firstResiPengiriman = $dataProses['resi_pengiriman'];
                                                
                                                    $lastDate = $dataProses['tgl'];
                                                    $lastIDPenjualan = $dataProses['id_penjualan'];
                                                    $lastProductName = $dataProses['nama_produk'];
                                                    $lastProductQuantity = $dataProses['jumlah'];
                                                    $lastTotalHarga = $dataProses['total_pembayaran'];
                                                    $lastBuktiPembayaran = $dataProses['bukti_pembayaran'];
                                                    $lastStatusPembayaran = $dataProses['status_pembayaran'];
                                                    $lastStatusPesanan = $dataProses['status_pesanan'];
                                                    $lastResiPengiriman = $dataProses['resi_pengiriman'];
                                                } else {
                                                    // Update nama produk dan jumlah produk terakhir dari row ini
                                                    $lastDate = $dataProses['tgl'];
                                                    $lastIDPenjualan = $dataProses['id_penjualan'];
                                                    $lastProductName = $dataProses['nama_produk'];
                                                    $lastProductQuantity = $dataProses['jumlah'];
                                                    $lastTotalHarga = $dataProses['total_pembayaran'];
                                                    $lastBuktiPembayaran = $dataProses['bukti_pembayaran'];
                                                    $lastStatusPembayaran = $dataProses['status_pembayaran'];
                                                    $lastStatusPesanan = $dataProses['status_pesanan'];
                                                    $lastResiPengiriman = $dataProses['resi_pengiriman'];
                                                }
                                            }

                                            if ($currentDate != null) {
                                                echo "<tr data-bs-toggle='modal' data-bs-target='#myModalProses' onclick='openModal(\"" . $firstIDPenjualan . "\", \"" . $lastIDPenjualan . "\", \"" . $currentDate . "\", \"" . $firstProductName . "\", \"" . $firstProductQuantity . "\", \"" . $lastProductName . "\", \"" . $lastProductQuantity . "\", \"" . $lastTotalHarga . "\", \"" . $lastBuktiPembayaran . "\", \"" . $lastStatusPembayaran . "\", \"" . $lastStatusPesanan . "\", \"" . $lastResiPengiriman . "\");'>";
                                                echo "<th scope='row'>" . $no++ . "</th>";
                                                echo "<td>" . $lastDate . "</td>";
                                                echo "<td>" . $firstProductName . " - " . $firstProductQuantity . " pcs | " . $lastProductName . " - " . $lastProductQuantity . " pcs</td>";
                                                echo "<td>Rp " . number_format($lastTotalHarga,0,',','.') . ",-</td>";
                                                echo "<td><img src='admin.sakinahgamis.com/admin/gambar/bukti/". $lastBuktiPembayaran ."'
                                                class='img-fluid' alt='' data-aos='zoom-out' data-aos-delay='300' style='width: 200px; height: 200px;'></td>";
                                                echo "<td>" . $lastStatusPembayaran . "</td>";
                                                echo "<td>" . $lastStatusPesanan . "</td>";
                                                echo "<td>" . $lastResiPengiriman . "</td>";
                                                echo "</tr>";
                                            }

                                            echo "</tr>";
                                        } else {
                                            echo "";
                                        }
                                        ?>
                            </tbody>

                        </table>
                    </div><!-- End Lunch Menu Content -->

                </div>

            </div>

        </section><!-- End Menu Section -->

        <!-- Modal Proses-->
        <div class="modal fade" id="myModalProses" tabindex="-1" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="modal-data"></p>
                        <div id="form-container" style="display: none;">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class=" form-outline mb-4">
                                    <div class="form-outline">
                                        <label for="formFile" class="form-label"><b>Nominal yang anda kirimkan tidak
                                                sesuai
                                                dengan jumlah pembayaran yang seharusnya. Kami telah mengembalikan dana
                                                anda
                                                di rekening yang sama. Kirim dana sejumlah total pembayaran anda dan
                                                upload
                                                bukti transfer</b> <i>(Format .jpg,
                                                .jpeg,
                                                .png)</i></label>
                                        <input type="hidden" name="firstID" id="firstID">
                                        <input type="hidden" name="lastID" id="lastID">
                                        <input class="form-control" type="file" id="formFile" name="bukti_pem">
                                    </div>
                                </div>
                                <button type="submit" name="update-bukti" class="btn btn-outline-danger btn-block"
                                    style="width: 100%;">Kirim</button>
                            </form>
                            <?php
                                if(isset($_POST['update-bukti'])) {
                                    $firstIDPen = $_POST['firstID'];
                                    $lastIDPen = $_POST['lastID'];
                                    $ekstensi = array('png','jpg','jpeg');
                                    $filename = $_FILES['bukti_pem']['name'];
                                    $size     = $_FILES['bukti_pem']['size'];
                                    $temp     = $_FILES['bukti_pem']['tmp_name'];
                                    $path     = 'admin.sakinahgamis.com/admin/gambar/bukti/';
                                    $target   = $path.basename($_FILES['bukti_pem']['name']);
                                    $ext      = pathinfo($filename, PATHINFO_EXTENSION);

                                    $root = getcwd();

                                    if(in_array($ext, $ekstensi)) {
                                        // Pindahkan file ke direktori tujuan
                                        if(move_uploaded_file($temp, $target)) {
                                            // Update kolom gambar di tabel database
                                            $queryUpdateBukti = mysqli_query($con, "UPDATE tb_penjualan SET bukti_pembayaran='$filename' WHERE id_penjualan=$firstIDPen OR id_penjualan=$lastIDPen");
                            
                                            if($queryUpdateBukti) {
                                                echo "<script>alert('Bukti Transfer Berhasil Di Update'); window.location.href = 'profil.php';</script>";
                                            } else {
                                                echo "<script>alert('Bukti Transfer Gagal Di Update'); window.location.href = 'profil.php';</script>";
                                            }
                                        } else {
                                            echo "<script>alert('Gagal mengunggah gambar'); window.location.href = 'profil.php';</script>";
                                        }
                                    } else {
                                        echo "<script>alert('Ekstensi file tidak valid'); window.location.href = 'profil.php';</script>";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>



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

    <!-- Modal Proses -->
    <script>
    // Get the modal element
    var modal = document.getElementById("myModalProses");

    // Get the <span> element that closes the modal
    var closeBtn = document.getElementsByClassName("close")[0];

    // Function to open the modal and populate the data
    function openModal(firstIDPenjualan, lastIDPenjualan, currentDate, firstProduct, firstQuantity, lastProduct,
        lastQuantity,
        lastTotalHarga, lastBuktiPembayaran, lastStatusPembayaran, lastStatusPesanan, lastResiPengiriman) {
        var firstID = document.getElementById("firstID");
        var lastID = document.getElementById("lastID");
        var modalData = document.getElementById("modal-data");
        var formattedTotalHarga = "Rp " + formatNumber(lastTotalHarga);
        var buktiPembayaranImage = "<img src='admin.sakinahgamis.com/admin/gambar/bukti/" + lastBuktiPembayaran +
            "' alt='Bukti Pembayaran' style='width: 200px; height: 200px;'>";

        var statusPembayaranInput = document.getElementById("status-pembayaran-input");
        var formContainer = document.getElementById("form-container");


        modalData.innerHTML = "Tanggal<br><b>" + currentDate + "</b><br><br>" +
            "Nama Pesanan<br><b>" + firstProduct + " - " + firstQuantity + " pcs<br>" +
            lastProduct + " - " + lastQuantity + " pcs</b><br><br>" +
            "Total Harga<br><b>" + formattedTotalHarga + ",-</b><br><br>" +
            "Bukti Pembayaran<br>" + buktiPembayaranImage + "<br><br>" +
            "Status Pembayaran<br><b> " + lastStatusPembayaran + "</b><br><br>" +
            "Status Pesanan<br><b>" + lastStatusPesanan + "</b><br><br>" +
            "Resi Pengiriman<br><b>" + lastResiPengiriman + "</b><br><br>";

        firstID.value = firstIDPenjualan;
        lastID.value = lastIDPenjualan;

        if (lastStatusPembayaran === "Nominal Tidak Sesuai") {
            formContainer.style.display =
                "block"; // Tampilkan formulir jika lastStatusPembayaran adalah "Nominal Tidak Sesuai"
        } else {
            formContainer.style.display = "none"; // Sembunyikan formulir untuk kondisi selain "Nominal Tidak Sesuai"
        }

        $('#myModalProses').modal('show');
    }

    // Function to close the modal
    function closeModal() {
        $('#myModalProses').modal('hide');
    }

    function formatNumber(number) {
        return number.toLocaleString('id-ID');
    }

    // Event listener for close button click
    closeBtn.addEventListener("click", closeModal);
    </script>

</body>

</html>