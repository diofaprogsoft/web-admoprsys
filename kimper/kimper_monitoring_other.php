<?php
$title = "Kimper";
include '../includes/header.php';
?>

<!-- script untuk kembali ke history halaman sebelumnya : javascript:history.back() -->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-1">
            <div class="mb-2">
                <a class="button btn btn-warning btn-sm" href="../kimper/kimper_monitoring_files.php"><i class="fas fa-undo"></i> Kembali</a>
            </div>

            <div class="card mb-2">
                <div class="card-body">
                    <div class="card mb-2">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Daftar Monitoring Berkas Pendukung
                            <?php
                            if (isset($_POST['proses'])) {
                                if (isset($_POST['tahun']) and isset($_POST['bulan'])) {
                            ?>
                                    <span class="text-danger"><b>[Periode:
                                    <?php
                                    echo $_POST['bulan'] . "-" . $_POST['tahun'] . "]</b>";
                                }
                            }
                                    ?>
                                    </span>
                        </div>
                        <!-- MENU OPSI -->
                        <div class="card mb-2 shadow">
                            <div class="container">
                                <div class="row p-2">
                                    <div class="col-sm">
                                        <form name="formPilihPeriode" action="" method="POST" onsubmit="validasiMuatDataMonitoringKimperBahanLain()" required>
                                            <label for="thn">Tahun</label>
                                            <?php
                                            $thn = date("Y");
                                            ?>
                                            <input type="text" id="thn" name="tahun" list="daftartahun" class="combobox combobox-list small" style="width:80px">
                                            <datalist id="daftartahun">
                                                <option value=<?php echo $thn - 2; ?>></option>
                                                <option value=<?php echo $thn - 1; ?>></option>
                                                <option value=<?php echo $thn; ?> selected></option>
                                                <option value=<?php echo $thn + 1; ?>></option>
                                            </datalist>

                                            <label for="bln">Bulan</label>
                                            <input type="text" id="bln" name="bulan" list="daftarbulan" class="combobox combobox-list small" style="width:80px">
                                            <datalist id="daftarbulan">
                                                <option value="01"></option>
                                                <option value="02"></option>
                                                <option value="03"></option>
                                                <option value="04"></option>
                                                <option value="05"></option>
                                                <option value="06"></option>
                                                <option value="07"></option>
                                                <option value="08"></option>
                                                <option value="09"></option>
                                                <option value="10"></option>
                                                <option value="11"></option>
                                                <option value="12"></option>
                                            </datalist>
                                            <input type="submit" class="btn btn-sm btn-info" value="Muat Data" name="proses">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr class="small">
                                            <!-- <th>No</th> -->
                                            <!-- <th>Periode</th> -->
                                            <th>Validasi</th>
                                            <th>Expired</th>
                                            <th>SN</th>
                                            <th>Nama</th>
                                            <th>Departemen</th>
                                            <th>Tipe</th>
                                            <th>Depan</th>
                                            <th>Belakang</th>
                                            <th>SIM</th>
                                            <th>ID Card</th>
                                            <th>Vaksin 1</th>
                                            <th>Vaksin 2</th>
                                            <?php if ($_SESSION['log_akses'] == "Admin" || $_SESSION['log_akses'] == "Editor") { ?>
                                                <th width="100">Kelola_Data</th>
                                            <?php } else { ?> <th width="100">Detil</th> <?php } ?>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        include '../includes/koneksi.php';

                                        if (isset($_POST['proses'])) {
                                            if (isset($_POST['tahun']) and isset($_POST['bulan'])) {

                                                $z = 1;
                                                $periode = $_POST['tahun'] . "-" . $_POST['bulan'];

                                                $data = mysqli_query($koneksi, "SELECT *,DATE_FORMAT(Expired,'%d-%m-%y') AS TglExpired FROM kimper_support WHERE DATE_FORMAT(Expired,'%Y-%m')='$periode' ORDER BY Expired, SN ASC");

                                                while ($dt = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
                                        ?>
                                                    <tr class="small">

                                                        <?php
                                                        if ($dt['Validasi'] === 'Y') {
                                                        ?>
                                                            <td align="center" class="text-success"><i class="fas fa-check-circle fa-2x"></i></td>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td align="center" class="text-danger"><i class="fas fa-times-circle fa-2x"></i></td>
                                                        <?php } ?>

                                                        <!-- <td> <?php echo $z++; ?></td> -->
                                                        <td align="center"> <?php echo $dt['TglExpired']; ?></td>
                                                        <td align="center"> <?php echo $dt['SN']; ?></td>
                                                        <td> <?php echo $dt['Nama']; ?></td>
                                                        <td align="center"> <?php echo $dt['Departemen']; ?></td>
                                                        <td align="center"> <?php echo $dt['Tipe']; ?></td>
                                                        <?php
                                                        if ($dt['Kimper_Depan'] === 'Y') {
                                                        ?>
                                                            <td align="center" class="text-success"><i class="fas fa-check"></i></td>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td align="center" class="text-danger"><i class="fas fa-times"></i></td>
                                                        <?php } ?>

                                                        <?php
                                                        if ($dt['Kimper_Belakang'] === 'Y') {
                                                        ?>
                                                            <td align="center" class="text-success"><i class="fas fa-check"></i></td>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td align="center" class="text-danger"><i class="fas fa-times"></i></td>
                                                        <?php } ?>

                                                        <?php
                                                        if ($dt['SIM'] === 'Y') {
                                                        ?>
                                                            <td align="center" class="text-success"><i class="fas fa-check"></i></td>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td align="center" class="text-danger"><i class="fas fa-times"></i></td>
                                                        <?php } ?>

                                                        <?php
                                                        if ($dt['IDCard'] === 'Y') {
                                                        ?>
                                                            <td align="center" class="text-success"><i class="fas fa-check"></i></td>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td align="center" class="text-danger"><i class="fas fa-times"></i></td>
                                                        <?php } ?>

                                                        <?php
                                                        if ($dt['Vaksin_1'] === 'Y') {
                                                        ?>
                                                            <td align="center" class="text-success"><i class="fas fa-check"></i></td>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td align="center" class="text-danger"><i class="fas fa-times"></i></td>
                                                        <?php } ?>

                                                        <?php
                                                        if ($dt['Vaksin_2'] === 'Y') {
                                                        ?>
                                                            <td align="center" class="text-success"><i class="fas fa-check"></i></td>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td align="center" class="text-danger"><i class="fas fa-times"></i></td>
                                                        <?php } ?>

                                                        <div class="small">
                                                            <td width="200" align="center">

                                                                <?php if ($_SESSION['log_akses'] == "Admin" || $_SESSION['log_akses'] == "Editor") { ?>
                                                                    <a type="button" class="btn btn-sm btn-primary btn-circle" data-toggle="tooltip" title="Detil" href="#!"><i class="fas fa-pen"></i></a>
                                                                    <a type="button" class="btn btn-sm btn-danger btn-circle" data-toggle="tooltip" title="Hapus" href="#!"><i class="fas fa-trash-alt"></i></i></a>
                                                                <?php } else { ?>
                                                                    <a type="button" class="btn btn-sm btn-primary btn-circle" data-toggle="tooltip" title="Detil" href="#!"><i class="fas fa-eye"></i></a>

                                                                <?php } ?>

                                                            </td>
                                                        </div>

                                                    </tr>

                                        <?php
                                                }
                                            }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php
    include '../includes/footer.php'; // memanggil file layout/footer.php
    ?>