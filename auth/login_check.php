<?php
$basePath = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/admoprsys/';
include '../includes/koneksi.php';
?>

<?php

$id = mysqli_escape_string($koneksi, $_POST['Id']);
$pass = mysqli_escape_string($koneksi, $_POST['Password']);

// cek username and password
$cek_user = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE IdPengguna='$id' AND KataKunci='$pass'");
$user_valid = mysqli_fetch_array($cek_user, MYSQLI_ASSOC);

if ($user_valid) {

    //create session
    session_set_cookie_params(10); // Set session cookie duration to 1 hour
    session_start();
    $_SESSION['log_id'] = $user_valid['IdPengguna'];
    $_SESSION['log_akses'] = $user_valid['Akses'];

    session_commit();
    header('location:'.$basePath.'beranda.php');
    
} else {
    echo "<script>alert('Maaf, proses masuk gagal, Id Pengguna atau Kata Kunci yang anda masukkan tidak sesuai!.');document.location='".$basePath."index.php'</script>";
}

?>
