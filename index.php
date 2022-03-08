<?php
$basePath = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/admoprsys/';

if (!isset($_SESSION['log_id'])) {

    header('location:'.$basePath.'admoprsys/beranda.php');
    
} else {
    echo "<script>alert('Maaf, sesi anda sudah berakhir. Silahkan lakukan proses masuk kembali.');document.location='" . $basePath . "index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMOPRSYS</title>

    <!-- Custom fonts for this template-->
    <link href="<?= $basePath ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= $basePath ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="m-5" style="background-color: midnightblue;">
    <main>
        <div class="container">
            <div class="row mt-10">
                <div class="col col-lg-10 m-10">
                    <!-- Page Heading -->
                    <h1 class="text-white">ADMOPRSYS CK-MIFA</h1>

                    <!-- Content Row -->
                    <div class="text-white">
                        <p>Admin Operation System site : CK-MIFA</p>
                    </div>
                    <div>
                        <h2> <a class="button btn btn-lg btn-success" href="auth/login.php">Masuk</a>
                    </div>
                    <div>
                        <img width="600px" src="<?= $basePath ?>img/undraw_thought_process_re_om58.svg" alt="sys">
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="sticky-footer bg-primary fixed-bottom">
        <div class="container my-auto">
            <div class="copyright text-white text-center my-auto">
                <span>Develope by diofaprogsoft &copy; 2022</span>
            </div>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= $basePath ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= $basePath ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= $basePath ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= $basePath ?>js/sb-admin-2.min.js"></script>

</body>