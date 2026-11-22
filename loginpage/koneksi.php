<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_login_page";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
