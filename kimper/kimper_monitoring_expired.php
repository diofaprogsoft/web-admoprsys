<?php
$title = 'Kimper';
include '../includes/header.php';
?>

<!-- Page Heading -->
<main>
    <Div>
        <div class="card shadow">
            <div class="card-header py-3 bg-primary">
                <h1 class="h6 m-0 font-weight-bold text-white">Monitoring Masa Berlaku</h1>
            </div>

            <!-- Content Row -->
            <div class="card shadow">
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            <span>Data Kimper</span>
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
                                            <input type="text" id="thn" name="tahun" list="daftartahun" class="combobox combobox-list small" style="width:70px">
                                            <datalist id="daftartahun">
                                                <option value=<?php echo $thn - 2; ?>></option>
                                                <option value=<?php echo $thn - 1; ?>></option>
                                                <option value=<?php echo $thn; ?> selected></option>
                                                <option value=<?php echo $thn + 1; ?>></option>
                                            </datalist>

                                            <label for="bln">Bulan</label>
                                            <input type="text" id="bln" name="bulan" list="daftarbulan" class="combobox combobox-list small" style="width:60px">
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

                        <?php
                        $thn = date('Y');
                        $num = date('n');
                        $bln = (int) $num + 1;
                        $bln1 = str_pad($bln, 2, "0", STR_PAD_LEFT);
                        $bulanselanjutnya = $bln1 . "-" . $thn;
                        ?>



                        <?php
                        if (isset($_POST['proses'])) {
                            if (isset($_POST['tahun']) and isset($_POST['bulan'])) {
                        ?>
                                <div class="card ml-3 mr-3" align="center">
                                    <div class="card-body bg-info p-1 pl-3">
                                        <span>
                                            <b class="text-white ml-4">Periode : [
                                            <?php echo $_POST['bulan'] . "-" . $_POST['tahun'] . " ]</b>";
                                        } ?>
                                        </span>
                                    </div>
                                </div>
                            <?php } else { ?>

                                <div class="card ml-3 mr-3" align="center">
                                    <div class="card-body bg-info p-1 pl-3">
                                        <span>
                                            <b class="text-white">Periode : [ <?= $bulanselanjutnya ?> ] </b>
                                        </span>
                                    </div>
                                </div>

                            <?php } ?>

                            <div class="card-body">
                                <table class="table table-bordered table-hover table-responsive" id="dataTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Expired</th>
                                            <th>SN</th>
                                            <th>Nama</th>
                                            <th>Departemen</th>
                                            <th>Nomor Kimper</th>
                                            <th>Jenis</th>
                                            <th>Unit Utama</th>
                                            <th>Tipe</th>
                                            <th>Status Proses</th>
                                            <th>Mulai Proses</th>
                                            <th>Detil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../includes/koneksi.php';

                                        $data = mysqli_query($koneksi, "SELECT * FROM kimper_mont");

                                        while ($dt = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
                                        ?>
                                            <tr class="small">
                                                <td><?= $dt['Expired']; ?></td>
                                                <td><?= $dt['SN']; ?></td>
                                                <td><?= $dt['Nama']; ?></td>
                                                <td><?= $dt['Departemen']; ?></td>
                                                <td style="width: 100px;"><?= $dt['NoKimper']; ?></td>
                                                <td><?= $dt['Jenis']; ?></td>
                                                <td style="width: 100px;"><?= $dt['UnitUtama']; ?></td>
                                                <td><?= $dt['Tipe']; ?></td>
                                                <td><?= $dt['StatusProses']; ?></td>
                                                <td><?php
                                                    $date = date_create($dt['MulaiProses']);
                                                    if (isset($dt['MulaiProses'])) {
                                                        echo date_format($date, "d-m-y");
                                                    } ?>
                                                </td>

                                                <td align="center">
                                                    <div class="small">
                                                        <a id="detil" class="btn btn-sm btn-primary btn-circle" data-toggle="modal" data-target="#modal-detil" data-backdrop="static" data-keyboard="false" data-expired="<?= $dt['Expired'] ?>" data-sn="<?= $dt['SN'] ?>" data-nama="<?= $dt['Nama'] ?>" data-departemen="<?= $dt['Departemen'] ?>" data-tipe="<?= $dt['Tipe'] ?>" data-kimperdepan="<?= $dt['Kimper_Depan'] ?>" data-kimperbelakang="<?= $dt['Kimper_Belakang'] ?>" data-sim="<?= $dt['SIM'] ?>" data-idcards="<?= $dt['IDCard'] ?>" data-vaksin1="<?= $dt['Vaksin_1'] ?>" data-vaksin2="<?= $dt['Vaksin_2'] ?>" data-result="<?= $dt['Result'] ?>" data-validasi="<?= $dt['Validasi'] ?>" href="kimper_monitoring_files.php">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
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
    </Div>
</main>

<?php include '../includes/footer.php'; ?>