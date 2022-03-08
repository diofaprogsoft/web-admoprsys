<?php
$basePath = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/admoprsys/';

session_start();
if (isset($_SESSION['log_id'])) {
    header('location:' . $basePath . 'beranda.php');
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

    <title>ADMOPRSYS - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= $basePath ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= $basePath ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="m-3">
                                <div class="col-md-4 d-none d-lg-block">
                                    <img width="400px" src="<?= $basePath ?>img/undraw_login_re_4vu2.svg" alt="login">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                    </div>
                                    <form class="user" method="POST" action="../auth/login_check.php">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="id" name="Id" aria-describedby="emailHelp" placeholder="Id Pengguna anda">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="Password" placeholder="Kata kunci">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Ingat saya</label>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-lg btn-primary btn-user btn-block" value="Masuk">
                                        <!-- <button class="btn btn-lg btn-primary btn-user btn-block" type="submit" value="Submit">Masuk</button> -->
                                        <!-- <a type="submit" href="<?= $basePath ?>beranda.php" class="btn btn-primary btn-user btn-block">
                                        Masuk
                                    </a> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= $basePath ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= $basePath ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= $basePath ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= $basePath ?>js/sb-admin-2.min.js"></script>

</body>

</html>