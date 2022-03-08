<?php
$title = 'Kimper | Tambah Data';
$basePath = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/admoprsys/';
include '../includes/header.php';
?>

<div class="container">
    <div class="mb-2">
        <a class="button btn btn-warning btn-sm btn-icon-split" href="../kimper/kimper_archive.php">
            <span class="icon"><i class="fas fa-angle-double-left"></i></span>
            <span class="text">Kembali</span>
        </a>
    </div>
</div>

<div class="container">
    <div class="card mb-4">
        <div class="card-header mb-1 bg-primary text-white">
            <i class="fas fa-plus"></i>
            Tambah Data Kimper
        </div>
        <form action="">
            <div class="card-body">
                <div class="row justify-content-md-center small">
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="index">Indeks</label>
                            <input type="text" name="Index" id="index" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="expired">Expired <span class="text-danger">*</label>
                            <input type="date" name="Expired" id="expired" class="form-control" onchange="getIndexDataKimper();" required>
                        </div>
                        <div class="form-group">
                            <label for="sn">SN <span class="text-danger">*</label>
                            <div class="row">
                                <div class="col pr-0">
                                    <input type="text" name="SN" id="sn" class="form-control" onchange="getIndexDataKimper();" placeholder="isikan SN" required>
                                </div>
                                <div class="col pl-0">
                                    <button type="button" class="btn btn-info" onclick="getIndexDataKimper();"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama <span class="text-danger">*</span></label>
                            <input type="text" name="Nama" id="nama" class="form-control" style="text-transform:uppercase" placeholder="isikan nama" required>
                        </div>
                        <div class="form-group">
                            <label for="departemen">Departemen <span class="text-danger">*</span></label>
                            <input type="text" name="Departemen" id="departemen" class="form-control" style="text-transform:uppercase" placeholder="isikan Departemen / vendor" required>
                        </div>
                    </div>

                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="nomorkimper">Nomor Kimper <span class="text-danger">*</span></label>
                            <input type="text" name="NomorKimper" id="nomorkimper" class="form-control" style="text-transform:uppercase" placeholder="isikan nomor kimper" required>
                        </div>
                        <div class="form-group">
                            <label for="daftarjenis" required>Jenis <span class="text-danger">*</span></label>
                            <select id="daftarjenis" style="text-transform:uppercase" class="form-control" required>
                                <option value="none" selected disabled hidden>- Pilih -</option>
                                <option value="F">F</option>
                                <option value="R">R</option>
                                <option value="I">I</option>
                                <option value="P">P</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="unitutama">Unit<span class="text-danger">*</label>
                            <input type="text" name="UnitUtama" id="unitutama" class="form-control" list="daftarunit" style="text-transform:uppercase" placeholder="isikan unit utama kimper" required>
                            <datalist id="daftarunit">
                                <?php
                                include '../includes/koneksi.php';

                                $data = mysqli_query(
                                    $koneksi,
                                    "SELECT Unit FROM unit_list GROUP BY Unit ORDER BY unit ASC"
                                );

                                while ($dt = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
                                ?>
                                    <option value="<?= $dt['Unit']; ?>"></option>

                                <?php } ?>
                            </datalist>
                        </div>
                    </div>

                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="imginput1">Kimper Depan</label>
                            <div class="row">
                                <div class="col px-0">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row ">
                                                <iframe id="frame1" height="150px" width="100%" src="<?= $basePath ?>kimper/kimper_archive_add_iframe1.php" frameborder="0">
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="imginput2">Kimper Belakang</label>
                            <div class="row">
                                <div class="col px-0">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <iframe id="frame2" height="150px" width="100%" src="<?= $basePath ?>kimper/kimper_archive_add_iframe2.php" frameborder="0">
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col pl-1">
                                <a id="detil" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#modal-preview" href="kimper_monitoring_add.php" onclick="loadImagePreview();">
                                    <span class="icon"><i class="fas fa-eye"></i></span>
                                    <span class="text">Lihat</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <div class="col mb-3">
                <button class="btn btn-success btn-icon-split" onclick="">
                    <span class="icon text-white-50">
                        <i class="fas fa-save"></i>
                    </span>
                    <span class="text">Simpan</span>
                </button>
                <button class="btn btn-secondary btn-icon-split" onclick="location.reload();">
                    <span class="icon text-white-50">
                        <i class="fas fa-undo"></i>
                    </span>
                    <span class="text">Reset</span>
                </button>
            </div>

        </form>
    </div>
</div>

<!-- Modal Dialog Preview -->
<div class="modal fade" id="modal-preview">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header p-2 bg-primary text-white">
                <h5 class="modal-title">Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-md-center" align="center">
                            <div class="col col-md-6">
                                <img id="imgpreview1" src="" alt="Kimper Depan" height="500px" width="400px">
                            </div>
                            <div class="col col-md-6">
                                <img id="imgpreview2" src="" alt="Kimper Belakang" height="500px" width="400px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= $basePath; ?>vendor/jquery/jquery.min.js"></script>
<script>
    function loadImagePreview() {
        var iframe1 = document.getElementById('frame1');
        var idprev1 = iframe1.contentWindow.document.getElementById('preview1');
        var img1 = document.getElementById('imgpreview1');

        var iframe2 = document.getElementById('frame2');
        var idprev2 = iframe2.contentWindow.document.getElementById('preview2');
        var img2 = document.getElementById('imgpreview2');

        img1.src = idprev1.src;
        img2.src = idprev2.src;
    }
</script>

<script>
    function readURLImage1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imgpreview1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imginput1").change(function() {
        readURLImage1(this);
    });

    function readURLImage2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imgpreview2').attr('src', e.target.result);
                $('#preview2').attr('src', e.target.result);

            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imginput2").change(function() {
        readURLImage2(this);
    });

    function getIndexDataKimper() {
        var $date = new Date(document.getElementById("expired").value);
        var $sn = document.getElementById("sn").value;

        const $year = $date.getFullYear() * 1e4;
        const $month = ($date.getMonth() + 1) * 100;
        const $day = $date.getDate();
        const $result = $year + $month + $day + '';

        $("#index").val($result + $sn);
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.addEventListener('paste', function(evt) {
            const clipboardItems = evt.clipboardData.items;
            const items = [].slice.call(clipboardItems).filter(function(item) {
                // Filter the image items only
                return item.type.indexOf('image') !== -1;
            });
            if (items.length === 0) {
                return;
            }

            const item1 = items[0];
            const blob1 = item1.getAsFile();

            const imageEle = document.getElementById('preview1');
            imageEle.src = URL.createObjectURL(blob1);
        });
    });
</script>

<?php include '../includes/footer.php'; ?>