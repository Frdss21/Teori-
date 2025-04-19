<?php
$host = "localhost";
$user = "root";
$pass = ""; // Default Laragon tidak menggunakan password
$db = "data_pbw_firdaus";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>