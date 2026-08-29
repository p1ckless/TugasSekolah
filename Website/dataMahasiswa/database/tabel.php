<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_mahasiswa";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css" media="all" />
</head>
<body>
    <h2>DATA MAHASISWA</h2>
    <table class='dttabel' width='100%'>
        <tr>
            <th>No.</th>
            <th>No. Induk</th>
            <th>Nama Mahasiswa</th>
            <th>JK</th>
            <th>Tgl. Lahir</th>
            <th>Alamat</th>
            <th>Dosen Pembimbing</th>
            <th>No. Telepon</th>
        </tr>
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id ASC");
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
            $tgl = date("d-m-Y", strtotime($row['tgllahir']));
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . htmlspecialchars($row['noinduk']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
            echo "<td>" . htmlspecialchars($row['jk']) . "</td>";
            echo "<td>" . $tgl . "</td>";
            echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
            echo "<td>" . htmlspecialchars($row['dosen']) . "</td>";
            echo "<td>" . htmlspecialchars($row['telp']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <a href='add.html'>Add Data</a>
</body>
</html>