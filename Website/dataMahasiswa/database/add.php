<?php
require_once 'connection.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $noinduk  = trim($_POST['noinduk']);
    $nama     = trim($_POST['nama']);
    $jk       = $_POST['jk'];
    $tgllahir = $_POST['tgllahir'];
    $alamat   = trim($_POST['alamat']);
    $dosen    = trim($_POST['dosen']);
    $telp     = trim($_POST['telp']);

    if ($noinduk === "" || $nama === "" || $tgllahir === "") {
        $error = "No. Induk, Nama, dan Tgl. Lahir wajib diisi.";
    } else {
        $stmt = mysqli_prepare($conn,
            "INSERT INTO mahasiswa (noinduk, nama, jk, tgllahir, alamat, dosen, telp)
             VALUES (?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssssss", $noinduk, $nama, $jk, $tgllahir, $alamat, $dosen, $telp);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php");
            exit;
        } else {
            $error = "Gagal menyimpan data: " . mysqli_error($conn);
        }
    }
}
?>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css" media="all" />
    <script src="proses.js"></script>
</head>
<body>
    <h2>DATA MAHASISWA</h2>
    <?php if ($error): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <table class='frtabel' align='center'>
        <form action='add.php' method='POST'>
            <caption>Tambah data Mahasiswa</caption>
            <tr>
                <td width='140px'>No. Induk</td>
                <td><input type='text' name='noinduk' maxlength='12' onblur='cekisi(this.value)' required></td>
            </tr>
            <tr>
                <td>Nama Mahasiswa</td>
                <td><input type='text' name='nama' maxlength='50' onblur='cekisi(this.value)' required></td>
            </tr>
            <tr>
                <td>JK</td>
                <td>
                    <input type="radio" name="jk" value="L" checked> Laki-laki
                    <input type="radio" name="jk" value="P"> Perempuan
                </td>
            </tr>
            <tr>
                <td>Tgl. Lahir</td>
                <td><input type='date' name='tgllahir' required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" cols="30"></textarea></td>
            </tr>
            <tr>
                <td>Dosen Pembimbing</td>
                <td><input type='text' name='dosen' maxlength='50'></td>
            </tr>
            <tr>
                <td>No. Telepon</td>
                <td><input type='tel' name='telp' maxlength='50' onblur='cekisi(this.value)'></td>
            </tr>
            <tr>
                <td colspan='2'>
                    <input type='submit' value='Proses'>&nbsp;<input type='reset' value='Batal'>
                    &nbsp;<a href='index.php'>Kembali</a>
                </td>
            </tr>
        </form>
    </table>
</body>
</html>