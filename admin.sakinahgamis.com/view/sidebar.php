<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="data_admin.php">
                        <i class="bi bi-circle"></i><span> Data Admin</span>
                    </a>
                </li>
                <li>
                    <a href="data_produk.php">
                        <i class="bi bi-circle"></i><span>Data Produk</span>
                    </a>
                </li>
                <li>
                    <a href="data_pelanggan.php">
                        <i class="bi bi-circle"></i><span>Data Pelanggan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Penjualan</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="datapenjualan.php">
                        <i class="bi bi-circle"></i><span>Data Penjualan</span>
                    </a>
                </li>
                <li>
                    <a href="laporanpenjualan.php">
                        <i class="bi bi-circle"></i><span>Laporan Penjualan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="peramalan.php">
                <i class="bi bi-card-list"></i>
                <span>Prediksi</span>
            </a>
        </li><!-- End charts-chartjs Nav -->

    </ul>

</aside>