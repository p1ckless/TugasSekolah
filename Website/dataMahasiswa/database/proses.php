<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_mahasiswa";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $noinduk  = mysqli_real_escape_string($koneksi, $_POST['noinduk']);
    $nama     = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jk       = mysqli_real_escape_string($koneksi, $_POST['jk']);
    $tgllahir = mysqli_real_escape_string($koneksi, $_POST['tgllahir']);
    $alamat   = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $dosen    = mysqli_real_escape_string($koneksi, $_POST['dosen']);
    $telp     = mysqli_real_escape_string($koneksi, $_POST['telp']);

    $query = "INSERT INTO mahasiswa (noinduk, nama, jk, tgllahir, alamat, dosen, telp)
              VALUES ('$noinduk', '$nama', '$jk', '$tgllahir', '$alamat', '$dosen', '$telp')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: tabel.php");
        exit();
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
} else {
    header("Location: add.html");
    exit();
}
?>