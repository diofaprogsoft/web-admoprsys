<?php 

$koneksi = mysqli_connect("localhost","pvpoymwk_admin","Admin@d3v4dm0pr","pvpoymwk_admoprsys");

// Pengecekan koneksi database
if (mysqli_connect_errno()) {
	echo "Koneksi database gagal !!!".mysqli_connect_errno();
}

?>