<?php
/** @var mysqli $conn */
require_once 'connection.php';

$error = "";

// Ambil data berdasarkan id di URL (?id=)
if (!isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id       = $_POST['id'];
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
            "UPDATE mahasiswa SET noinduk=?, nama=?, jk=?, tgllahir=?, alamat=?, dosen=?, telp=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, "sssssssi", $noinduk, $nama, $jk, $tgllahir, $alamat, $dosen, $telp, $id);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php");
            exit;
        } else {
            $error = "Gagal mengubah data: " . mysqli_error($conn);
        }
    }
    $data = $_POST;
} else {
    $id = (int) $_GET['id'];
    $stmt = mysqli_prepare($conn, "SELECT * FROM mahasiswa WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        header("Location: index.php");
        exit;
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
        <form action='edit.php' method='POST'>
            <caption>Edit data Mahasiswa</caption>
            <input type='hidden' name='id' value='<?php echo htmlspecialchars($data['id']); ?>'>
            <tr>
                <td width='140px'>No. Induk</td>
                <td><input type='text' name='noinduk' maxlength='12' onblur='cekisi(this.value)'
                    value='<?php echo htmlspecialchars($data['noinduk']); ?>' required></td>
            </tr>
            <tr>
                <td>Nama Mahasiswa</td>
                <td><input type='text' name='nama' maxlength='50' onblur='cekisi(this.value)'
                    value='<?php echo htmlspecialchars($data['nama']); ?>' required></td>
            </tr>
            <tr>
                <td>JK</td>
                <td>
                    <input type="radio" name="jk" value="L" <?php echo $data['jk'] === 'L' ? 'checked' : ''; ?>> Laki-laki
                    <input type="radio" name="jk" value="P" <?php echo $data['jk'] === 'P' ? 'checked' : ''; ?>> Perempuan
                </td>
            </tr>
            <tr>
                <td>Tgl. Lahir</td>
                <td><input type='date' name='tgllahir' value='<?php echo htmlspecialchars($data['tgllahir']); ?>' required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" cols="30"><?php echo htmlspecialchars($data['alamat']); ?></textarea></td>
            </tr>
            <tr>
                <td>Dosen Pembimbing</td>
                <td><input type='text' name='dosen' maxlength='50' value='<?php echo htmlspecialchars($data['dosen']); ?>'></td>
            </tr>
            <tr>
                <td>No. Telepon</td>
                <td><input type='tel' name='telp' maxlength='50' onblur='cekisi(this.value)'
                    value='<?php echo htmlspecialchars($data['telp']); ?>'></td>
            </tr>
            <tr>
                <td colspan='2'>
                    <input type='submit' value='Update'>&nbsp;<input type='reset' value='Batal'>
                    &nbsp;<a href='index.php'>Kembali</a>
                </td>
            </tr>
        </form>
    </table>
</body>
</html>