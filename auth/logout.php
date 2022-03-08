<?php
$basePath = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/admoprsys-ckmifa/';

session_start();

session_destroy();

header('location:'.$basePath.'index.php');

?>