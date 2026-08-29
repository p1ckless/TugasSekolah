<?php 
/** @var mysqli $conn */
require_once 'connection.php'; 
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
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        $query = "SELECT * FROM mahasiswa ORDER BY id ASC";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $tgl = date("d-m-Y", strtotime($row['tgllahir']));
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . htmlspecialchars($row['noinduk']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($row['jk']) . "</td>";
                echo "<td>" . $tgl . "</td>";
                echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                echo "<td>" . htmlspecialchars($row['dosen']) . "</td>";
                echo "<td>" . htmlspecialchars($row['telp'] ?: '-') . "</td>";
                echo "<td>
                        <a href='edit.php?id=" . $row['id'] . "'>Edit</a> |
                        <a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Yakin hapus data ini?')\">Hapus</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Belum ada data.</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href='add.php'>Tambah Data</a>
</body>
</html>