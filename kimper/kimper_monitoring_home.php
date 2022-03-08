<?php
$title = 'Kimper';
$basePath = 'http://' . $_SERVER['SERVER_NAME'] . '/admoprsys/';
include '../includes/header.php';
?>

<!-- Content Row -->
<div class="card shadow mb-4">
    <div class="card-header py-3 bg-primary">
        <h6 class="m-0 font-weight-bold text-white">Monitoring Posisi Proses</h6>
    </div>
    <div class="row m-2">

        <!-- PERSIAPAN BERKAS -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Persiapan Berkas</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">5</div>
                            <div class="small text-primary">
                                <i class="fas fa-angle-right"></i>
                                <a href="#!">Lihat data</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-3x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MEDIC -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Medic</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">7</div>
                            <div class="small text-primary">
                                <i class="fas fa-angle-right"></i>
                                <a href="#!">Lihat data</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-medical fa-3x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- OSHE -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">OSHE
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h3 mb-0 mr-3 font-weight-bold text-gray-800">10</div>
                                    <div class="small text-primary">
                                        <i class="fas fa-angle-right"></i>
                                        <a href="#!">Lihat data</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-briefcase-medical fa-3x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MIFA -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                MIFA</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">20</div>
                            <div class="small text-primary">
                                <i class="fas fa-angle-right"></i>
                                <a href="#!">Lihat data</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fab fa-medium-m fa-3x text-gray-500""></i> -->
                            <img style=" -webkit-filter: opacity(50%); -webkit-filter: grayscale(); " src="<?= $basePath; ?>img/mifalogo.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- OFFICE -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                OFFICE</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">6</div>
                            <div class="small text-primary">
                                <i class="fas fa-angle-right"></i>
                                <a href="#!">Lihat data</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-3x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TUNDA -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                TUNDA</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">3</div>
                            <div class="small text-primary">
                                <i class="fas fa-angle-right"></i>
                                <a href="#!">Lihat data</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder fa-3x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include '../includes/footer.php'; ?>