<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "soal1_b";


$conn = mysqli_connect($servername, $username, $password, $database);

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
