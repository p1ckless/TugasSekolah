<?php
// connection.php — koneksi ke database MySQL (XAMPP)
$host   = "localhost";
$user   = "root";
$pass   = "";          // default XAMPP: password kosong
$dbname = "db_mahasiswa";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}