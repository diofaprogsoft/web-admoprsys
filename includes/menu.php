<?php
$basePath = 'http://' . $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/admoprsys-ckmifa/';
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $basePath ?>beranda.php">
        <div class="sidebar-brand-icon">
            <!-- <i class="fas fa-laugh-wink"></i> -->
            <i class="fab fa-cloudversify"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMOPRSYS<br>CK-MIFA</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?php $basePath ?>/admoprsys-ckmifa/beranda.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Administrasi
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kimper" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-id-card-alt"></i>
            <span>Kimper</span>
        </a>
        <div id="kimper" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Monitoring</h6>
                <a class="collapse-item" href="<?php $basePath ?>/admoprsys-ckmifa/kimper/kimper_monitoring_home.php">Proses</a>
                <a class="collapse-item" href="<?php $basePath ?>/admoprsys-ckmifa/kimper/kimper_monitoring_expired.php">Masa Berlaku</a>
                <a class="collapse-item" href="<?php $basePath ?>/admoprsys-ckmifa/kimper/kimper_monitoring_files.php">Bahan Pendukung</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Berkas</h6>
                <a class="collapse-item" href="#!">Pengajuan</a>
                <a class="collapse-item" href="<?php $basePath ?>/admoprsys-ckmifa/kimper/kimper_archive.php">Arsip Kimper</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#idcard" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-id-card"></i>
            <span>ID Card</span>
        </a>
        <div id="idcard" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Monitoring</h6>
                <a class="collapse-item" href="#!">Masa Berlaku</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Berkas</h6>
                <a class="collapse-item" href="#!">Arsip ID Card</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#apdseragam" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-hard-hat"></i>
            <span>APD & Seragam</span>
        </a>
        <div id="apdseragam" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">APD</h6>
                <a class="collapse-item" href="#!">Masa Berlaku</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Seragam</h6>
                <a class="collapse-item" href="#!">Masa Berlaku</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->