<?php
$basePath = 'http://' . $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/admoprsys-ckmifa/';
?>

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; admoprsys ck-mifa 2022</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin Keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Keluar" jika anda ingin mengakhiri sesi ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= $basePath?>auth/logout.php">Keluar</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo $basePath; ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo $basePath; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo $basePath; ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo $basePath; ?>js/sb-admin-2.js"></script>
<script src="<?php echo $basePath; ?>js/helper.js"></script>

<!-- Page level plugins -->
<script src="<?php echo $basePath; ?>vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo $basePath; ?>js/demo/chart-area-demo.js"></script>
<script src="<?php echo $basePath; ?>js/demo/chart-pie-demo.js"></script>

<!-- Page level plugins -->
<script src="<?php echo $basePath; ?>vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo $basePath; ?>vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo $basePath; ?>js/demo/datatables-demo.js"></script>

</body>

</html>