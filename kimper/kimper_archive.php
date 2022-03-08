<?php
$title = 'Kimper';
$basePath = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/admoprsys-ckmifa/';
include '../includes/header.php';
?>

<!-- Page Heading -->
<div class="card shadow">
    <div class="card-header py-3 bg-primary">
        <h1 class="h6 m-0 font-weight-bold text-white">Arsip</h1>
    </div>
</div>

<!-- MENU OPSI -->
<?php if ($_SESSION['log_akses'] == "Admin" || $_SESSION['log_akses'] == "Editor") { ?>
    <div class="card shadow">
        <div class="p-2">
            <div class="d-grid gap-2 d-md-block">
                <a type="button" class="btn btn-sm btn-success btn-icon-split" href="./kimper_archive_add.php">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
                </a>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Content Row -->
<main>
    <div class="card mb-4 shadow">
        <div class="card-body">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Arsip Kimper
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-responsive small" id="dataTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>Expired</th>
                                <th>SN</th>
                                <th>Nama</th>
                                <th>Departemen</th>
                                <th>No Kimper</th>
                                <th>Jenis</th>
                                <th>Unit Utama</th>
                                <?php if ($_SESSION['log_akses'] == "Admin" || $_SESSION['log_akses'] == "Editor") { ?>
                                    <th>Kelola_Data</th>
                                <?php } else { ?> <th>Detil</th> <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../includes/koneksi.php';

                            $data = mysqli_query(
                                $koneksi,
                                "SELECT Indeks, DATE_FORMAT(Expired,'%d-%m-%y') AS TglExpired, SN, Nama, Departemen, NoKimper, Jenis, UnitUtama, Expired FROM kimper_data_list ORDER BY Expired ASC"
                            );

                            while ($dt = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?= $dt['TglExpired'] ?></td>
                                    <td><?= $dt['SN'] ?></td>
                                    <td width="200px"><?= $dt['Nama'] ?></td>
                                    <td width="150px"><?= $dt['Departemen'] ?></td>
                                    <td width="100px"><?= $dt['NoKimper'] ?></td>
                                    <td><?= $dt['Jenis'] ?></td>
                                    <td width="100pc"><?= $dt['UnitUtama'] ?></td>
                                    <td width="100px" align="center">
                                        <button id="detil" class="btn btn-sm btn-primary btn-icon-split" data-toggle="modal" data-target="#modal-detil" data-backdrop="static" data-keyboard="false" data-indeks="<?= $dt['Indeks']; ?>" data-expired="<?= $dt['Expired']; ?>" data-sn="<?= $dt['SN']; ?>" data-nama="<?= $dt['Nama']; ?>" data-departemen="<?= $dt['Departemen']; ?>" data-nokimper="<?= $dt['NoKimper']; ?>" data-jenis="<?= $dt['Jenis']; ?>" data-unitutama="<?= $dt['UnitUtama']; ?>" data-kimperdepan="<?= $dt['KimperDepan']; ?>" data-kimperbelakang="<?= $dt['KimperBelakang']; ?>">
                                            <span class="icon"><i class="fas fa-eye"></i></span>
                                        </button>
                                        <?php if ($_SESSION['log_akses'] == "Admin" || $_SESSION['log_akses'] == "Editor") { ?>
                                            <button class="btn btn-sm btn-danger btn-icon-split">
                                                <span class="icon"><i class="fas fa-trash"></i></span>
                                            </button>
                                        <?php } ?>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Dialog Detil -->
        <div class="modal fade" id="modal-detil">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header p-2 bg-primary text-white">
                        <h5 class="modal-title">
                            <span><i class="fas fa-info"></i></span>
                            Detil Data
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col col-md-4">
                            <div class="modal-body">
                                <table class="table table-bordered no-margins">
                                    <tbody class="small">
                                        <tr>
                                            <th style="width: 35%;" class="p-1 bg-info text-white">Indeks</th>
                                            <td class="p-1"><span id="indeks"></span></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 35%;" class="p-1 bg-info text-white">Expired</th>
                                            <td class="p-1"><span id="expired"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="p-1 bg-info text-white">SN</th>
                                            <td class="p-1"><span id="sn"></b></span></td>
                                        </tr>
                                        <tr>
                                            <th class="p-1 bg-info text-white">Nama</th>
                                            <td class="p-1"><span id="nama"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="p-1 bg-info text-white">Departemen</th>
                                            <td class="p-1"><span id="departemen"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="p-1 bg-info text-white">Nomor Kimper</th>
                                            <td class="p-1"><span id="nokimper"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="p-1 bg-info text-white">Jenis</th>
                                            <td class="p-1"><span id="jenis"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="p-1 bg-info text-white">Unit Utama</th>
                                            <td class="p-1"><span id="unitutama"></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col col-md-8">
                            <div class="modal-body table-responsive">
                                <table class="table table-bordered no-margins">
                                    <tbody>
                                        <tr align="center">
                                            <th class="p-1 bg-info text-white">Kimper Depan</th>
                                            <th class="p-1 bg-info text-white">Kimper Belakang</th>
                                        </tr>
                                        <tr align="center">
                                            <td class="p-1">
                                                <img id="kimperdepan" height="400px" width="300px" src="<?= $basePath; ?>/kimper/img/2021053047518-1.jpeg">
                                            </td>
                                            <td class="p-1">
                                                <img id="kimperbelakang" height="400px" width="300px" src="<?= $basePath; ?>/kimper/img/2021053047518-2.jpeg" alt="kimper belakang">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- <div>
                        <table class="table table-bordered no-margins bg-danger text-white">
                            <tr>
                                <th class="p-1">Sisa masa berlaku</th>
                                <td class="p-1" style="text-align: center;"><span id="remain"></span></td>
                            </tr>
                        </table>
                    </div> -->
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
</main>

<script src="<?php echo $basePath; ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo $basePath; ?>js/helper.js"></script>
<script language="JavaScript" type="text/javascript">
    $(document).ready(function() {
        $(document).on('click',
            '#detil',
            function() {
                // data value
                var indeks = $(this).data('indeks');
                var expired = $(this).data('expired');
                var sn = $(this).data('sn');
                var nama = $(this).data('nama');
                var departemen = $(this).data('departemen');
                var nokimper = $(this).data('nokimper');
                var jenis = $(this).data('jenis');
                var unitutama = $(this).data('unitutama');
                // var kimperdepan = $(this).data('kimperDepan');
                // var kimperbelakang = $(this).data('kimperBelakang');

                // remain expired date
                // var date1 = new Date();
                // var date2 = new Date(expired);
                // var diff = differenceOfDays(date1, date2);
                // $('#remain').text(diff + " hari");

                // store value
                $('#indeks').text(indeks);
                $('#expired').text(expired);
                $('#sn').text(sn);
                $('#nama').text(nama);
                $('#departemen').text(departemen);
                $('#nokimper').text(nokimper);
                $('#jenis').text(jenis);
                $('#unitutama').text(unitutama);
                // $('#kimperDepan').text(kimperdepan);
                // $('#kimperBelakang').text(kimperbelakang);

            })
    })
</script>

<?php include '../includes/footer.php'; ?>