<?php
$title = 'Kimper';
$basePath = 'http://' . $_SERVER['SERVER_NAME'] . '/admoprsys-ckmifa/';
include '../includes/header.php';
?>

<!-- Page Heading -->
<div class="card shadow">
    <div class="card-header py-3 bg-primary">
        <h1 class="h6 m-0 font-weight-bold text-white">Monitoring Bahan Pendukung</h1>
    </div>
</div>

<!-- Content Row -->

<!-- OPSI MEMUAT DATA -->
<div class="card mb-2">
    <div class="card-body">
        <div class="p-1 mb-2 card bg-warning text-white">
            <span style="font-size:14px" class="text-danger">Catatan : Ini adalah daftar monitoring bahan pendukung
                pengajuan kimper yang akan expired / berakhir pada <b>1 bulan kedepan</b> bulan berjalan.</span>
        </div>

        <!-- MENU OPSI -->
        <div class="card shadow">
            <!-- <div class="card-header mb-1">
                <i class="fas fa-ellipsis-v"></i>
                Menu
            </div> -->
            <div class="p-1">
                <div class="d-grid gap-2 d-md-block">
                    <?php if ($_SESSION['log_akses'] == "Admin" || $_SESSION['log_akses'] == "Editor") { ?>
                        <a type="button" class="btn btn-sm btn-success btn-icon-split" href="#!">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah</span>
                        </a>
                    <?php } ?>

                    <a type="button" class="btn btn-sm btn-info btn-icon-split" href="<?php $basePath ?>/admoprsys-ckmifa/kimper/kimper_monitoring_other.php">
                        <span class="icon text-white-50">
                            <i class="fas fa-list"></i>
                        </span>
                        <span class="text">Lihat data lainnya</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- TABEL MONITORING -->
    <div class="card mb-4 shadow">
        <div class="card-body">
            <div class="card mb-2">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <?php
                    $thn = date('Y');
                    $num = date('n');
                    $bln = (int) $num + 1;
                    $bln1 = str_pad($bln, 2, "0", STR_PAD_LEFT);
                    $bulanselanjutnya = $bln1 . "-" . $thn;
                    ?>
                    Daftar Monitoring Berkas Pendukung | Periode : <b class="text-danger"><?php echo $bulanselanjutnya; ?></b>
                </div>
                <div class="card-body">
                    <div class="table-responsive small">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <!-- <th>No</th> -->
                                    <!-- <th>Periode</th> -->
                                    <th>Validasi</th>
                                    <th>Expired</th>
                                    <th>SN</th>
                                    <th>Nama</th>
                                    <th>Departemen</th>
                                    <th>Tipe</th>
                                    <?php if ($_SESSION['log_akses'] == "Admin" || $_SESSION['log_akses'] == "Editor") { ?>
                                        <th>Kelola_Data</th>
                                    <?php } else { ?> <th>Detil</th> <?php } ?>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                include '../includes/koneksi.php';

                                $thn = date('Y');
                                $num = date('n');
                                $bln = (int) $num + 1;
                                $bln1 = str_pad($bln, 2, "0", STR_PAD_LEFT);
                                $periode = $thn . "-" . $bln1;

                                $z = 1;
                                $data = mysqli_query($koneksi, "SELECT DATE_FORMAT(Expired,'%Y-%m') AS Periode, DATE_FORMAT(Expired,'%d-%m-%y') AS TglExpired, Expired, SN, Nama, Departemen, Tipe, Kimper_Depan, Kimper_Belakang, SIM, IDCard, Vaksin_1, Vaksin_2, Result, Validasi FROM kimper_support WHERE DATE_FORMAT(Expired,'%Y-%m')='$periode' ORDER BY Expired, SN ASC");

                                while ($dt = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
                                ?>
                                    <tr class="small">
                                        <!-- <td> <?php echo $z++; ?></td> -->
                                        <!-- <td align="center"> <?php echo $dt['Periode']; ?></td> -->

                                        <?php
                                        if ($dt['Validasi'] === 'Y') {
                                        ?>
                                            <td align="center" class="text-success"><i class="fas fa-check-circle fa-2x"></i></td>
                                        <?php
                                        } else {
                                        ?>
                                            <td align="center" class="text-danger"><i class="fas fa-times-circle fa-2x"></i></td>
                                        <?php } ?>

                                        <td align="center"><?php echo $dt['TglExpired']; ?></td>
                                        <td align="center"><?php echo $dt['SN']; ?></td>
                                        <td> <?php echo $dt['Nama']; ?></td>
                                        <td align="center"><?php echo $dt['Departemen']; ?></td>
                                        <td align="center"><?php echo $dt['Tipe']; ?></td>

                                        <?php
                                        $date = date_create($dt['Expired']);
                                        $dateExpired = date_format($date, "d-m-Y");
                                        ?>

                                        <td align="center">
                                            <div class="small">
                                                <a id="detil" class="btn btn-sm btn-primary btn-circle" data-toggle="modal" data-target="#modal-detil" data-backdrop="static" data-keyboard="false" data-expired="<?= $dt['Expired'] ?>" data-sn="<?= $dt['SN'] ?>" data-nama="<?= $dt['Nama'] ?>" data-departemen="<?= $dt['Departemen'] ?>" data-tipe="<?= $dt['Tipe'] ?>" data-kimperdepan="<?= $dt['Kimper_Depan'] ?>" data-kimperbelakang="<?= $dt['Kimper_Belakang'] ?>" data-sim="<?= $dt['SIM'] ?>" data-idcards="<?= $dt['IDCard'] ?>" data-vaksin1="<?= $dt['Vaksin_1'] ?>" data-vaksin2="<?= $dt['Vaksin_2'] ?>" data-result="<?= $dt['Result'] ?>" data-validasi="<?= $dt['Validasi'] ?>" href="kimper_monitoring_files.php">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <?php if ($_SESSION['log_akses'] == "Admin" || $_SESSION['log_akses'] == "Editor") { ?>
                                                    <a type="button" class="btn btn-sm btn-danger btn-circle" data-toggle="tooltip" title="Hapus" href="#!"><i class="fas fa-trash-alt"></i></i></a>
                                                <?php } ?>
                                            </div>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Dialog Detil -->
    <div class="modal fade" id="modal-detil">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header p-2 bg-primary text-white">
                    <h5 class="modal-title">Detil Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered no-margins">
                        <tbody class="small">
                            <tr>
                                <th style="width: 35%;" class="p-1">Expired</th>
                                <td class="p-1"><span id="expired"></span></td>
                            </tr>
                            <tr>
                                <th class="p-1">SN</th>
                                <td class="p-1"><span id="sn"></b></span></td>
                            </tr>
                            <tr>
                                <th class="p-1">Nama</th>
                                <td class="p-1"><span id="nama"></span></td>
                            </tr>
                            <tr>
                                <th class="p-1">Departemen</th>
                                <td class="p-1"><span id="departemen"></span></td>
                            </tr>
                            <tr>
                                <th class="p-1">Tipe</th>
                                <td class="p-1"><span id="tipe"></span></td>
                            </tr>
                            <tr>
                                <th class="p-1">Kimper Depan</th>
                                <td class="p-1"><span id="kimperdepan" class="fas fa-times text-danger"></span></td>
                            </tr>
                            <tr>
                                <th class="p-1">Kimper Belakang</th>
                                <td class="p-1"><span id="kimperbelakang" class="fas fa-times text-danger"></span></td>
                            </tr>
                            <tr>
                                <th class="p-1">SIM</th>
                                <td class="p-1"><span id="sim" class="fas fa-times text-danger"></span></td>
                            </tr>
                            <tr>
                                <th class="p-1">ID Card</th>
                                <td class="p-1"><span id="idcards" class="fas fa-times text-danger"></span></td>
                            </tr>
                            <tr>
                                <th class="p-1">Vaksin-1</th>
                                <td class="p-1"><span id="vaksin1" class="fas fa-times text-danger"></span></td>
                            </tr>
                            <tr>
                                <th class="p-1">Vaksin-2</th>
                                <td class="p-1"><span id="vaksin2" class="fas fa-times text-danger"></span></td>
                            </tr>
                            <tr id="cresult">
                                <th class="p-1">Result</th>
                                <td class="p-1"><span id="result" class="fas fa-times text-danger"></span></td>
                            </tr>
                            <tr>
                                <th class="p-1">Validasi</th>
                                <td class="p-1"><span id="validasi" class="fas fa-times-circle fa-2x text-danger"></span></td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div>
                    <table class="table table-bordered no-margins bg-danger text-white">
                        <tr>
                            <th class="p-1">Sisa masa berlaku</th>
                            <td class="p-1" style="text-align: center;"><span id="remain"></span></td>
                        </tr>
                    </table>
                </div>

                <?php if ($_SESSION['log_akses'] == "Admin" || $_SESSION['log_akses'] == "Editor") { ?>
                    <div class="p-3">
                        <div class="d-grid gap-2 d-md-block">
                            <a type="button" class="btn btn-sm btn-primary btn-icon-split" href="#!">
                                <span class="icon text-white-50">
                                    <i class="fas fa-pen"></i>
                                </span>
                                <span class="text">Edit</span>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="<?php echo $basePath; ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo $basePath; ?>js/helper.js"></script>

    <script language="JavaScript" type="text/javascript">
        $(document).ready(function() {
            $(document).on('click',
                '#detil',
                function() {
                    // data value
                    var expired = $(this).data('expired');
                    var sn = $(this).data('sn');
                    var nama = $(this).data('nama');
                    var departemen = $(this).data('departemen');
                    var tipe = $(this).data('tipe');
                    var kimperdepan = $(this).data('kimperdepan');
                    var kimperbelakang = $(this).data('kimperbelakang');
                    var sim = $(this).data('sim');
                    var idcards = $(this).data('idcards');
                    var vaksin1 = $(this).data('vaksin1');
                    var vaksin2 = $(this).data('vaksin2');
                    var result = $(this).data('result');
                    var validasi = $(this).data('validasi');

                    // remain expired date
                    var date1 = new Date();
                    var date2 = new Date(expired);
                    var diff = differenceOfDays(date1, date2);
                    $('#remain').text(diff + " hari");

                    // store value
                    $('#expired').text(expired);
                    $('#sn').text(sn);
                    $('#nama').text(nama);
                    $('#departemen').text(departemen);
                    $('#tipe').text(tipe);

                    if (kimperdepan == "Y") {
                        $('#kimperdepan').removeClass('text-danger')
                        $('#kimperdepan').addClass('text-success')
                        $('#kimperdepan').removeClass('fa-times')
                        $('#kimperdepan').addClass('fa-check')
                    } else {
                        $('#kimperdepan').removeClass('text-success')
                        $('#kimperdepan').addClass('text-danger')
                        $('#kimperdepan').removeClass('fa-check')
                        $('#kimperdepan').addClass('fa-times')
                    }

                    if (kimperbelakang == "Y") {
                        $('#kimperbelakang').removeClass('text-danger')
                        $('#kimperbelakang').addClass('text-success')
                        $('#kimperbelakang').removeClass('fa-times')
                        $('#kimperbelakang').addClass('fa-check')
                    } else {
                        $('#kimperbelakang').removeClass('text-success')
                        $('#kimperbelakang').addClass('text-danger')
                        $('#kimperbelakang').removeClass('fa-check')
                        $('#kimperbelakang').addClass('fa-times')
                    }

                    if (sim == "Y") {
                        $('#sim').removeClass('text-danger')
                        $('#sim').addClass('text-success')
                        $('#sim').removeClass('fa-times')
                        $('#sim').addClass('fa-check')
                    } else {
                        $('#sim').removeClass('text-success')
                        $('#sim').addClass('text-danger')
                        $('#sim').removeClass('fa-check')
                        $('#sim').addClass('fa-times')
                    }

                    if (idcards == "Y") {
                        $('#idcards').removeClass('text-danger')
                        $('#idcards').addClass('text-success')
                        $('#idcards').removeClass('fa-times')
                        $('#idcards').addClass('fa-check')
                    } else {
                        $('#idcards').removeClass('text-success')
                        $('#idcards').addClass('text-danger')
                        $('#idcards').removeClass('fa-check')
                        $('#idcards').addClass('fa-times')
                    }

                    if (vaksin1 == "Y") {
                        $('#vaksin1').removeClass('text-danger')
                        $('#vaksin1').addClass('text-success')
                        $('#vaksin1').removeClass('fa-times')
                        $('#vaksin1').addClass('fa-check')
                    } else {
                        $('#vaksin1').removeClass('text-success')
                        $('#vaksin1').addClass('text-danger')
                        $('#vaksin1').removeClass('fa-check')
                        $('#vaksin1').addClass('fa-times')
                    }

                    if (vaksin2 == "Y") {
                        $('#vaksin2').removeClass('text-danger')
                        $('#vaksin2').addClass('text-success')
                        $('#vaksin2').removeClass('fa-times')
                        $('#vaksin2').addClass('fa-check')
                    } else {
                        $('#vaksin2').removeClass('text-success')
                        $('#vaksin2').addClass('text-danger')
                        $('#vaksin2').removeClass('fa-check')
                        $('#vaksin2').addClass('fa-times')
                    }

                    if (tipe == "PERPANJANGAN") {
                        var link = document.getElementById('cresult');
                        link.style.display = 'none';
                    } else {
                        var link = document.getElementById('cresult');
                        link.style.display = '';
                        if (result == "Y") {
                            $('#result').removeClass('text-danger')
                            $('#result').addClass('text-success')
                            $('#result').removeClass('fa-times')
                            $('#result').addClass('fa-check')
                        } else {
                            $('#result').removeClass('text-success')
                            $('#result').addClass('text-danger')
                            $('#result').removeClass('fa-check')
                            $('#result').addClass('fa-times')
                        }
                    }

                    if (validasi == "Y") {
                        $('#validasi').removeClass('text-danger')
                        $('#validasi').addClass('text-success')
                        $('#validasi').removeClass('fa-times-circle')
                        $('#validasi').addClass('fa-check-circle')
                    } else {
                        $('#validasi').removeClass('text-success')
                        $('#validasi').addClass('text-danger')
                        $('#validasi').removeClass('fa-check-circle')
                        $('#validasi').addClass('fa-times-circle')
                    }
                })
        })
    </script>

    <?php include '../includes/footer.php'; ?>