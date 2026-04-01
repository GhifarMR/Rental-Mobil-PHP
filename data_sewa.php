<?php
require 'koneksi.php';

$data = mysqli_query($koneksi, "SELECT * FROM sewatbl");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Kendaraan</title>

    <style>
        body {
            font-family: Arial;
        }

        .header {
            text-align: center;
            margin-top: 20px;
        }

        .container {
            width: 95%;
            margin: 20px auto;
        }

        h2 {
            margin-bottom: 10px;
        }

        .aksi-atas a {
            text-decoration: none;
            padding: 8px 12px;
            margin-right: 5px;
            background: gray;
            color: white;
        }

        .tambah {
            background: green !important;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        th {
            background: #007bff;
            color: white;
        }

        img {
            border-radius: 5px;
        }

        .edit {
            background: orange;
            color: white;
            padding: 5px;
            text-decoration: none;
        }

        .hapus {
            background: red;
            color: white;
            padding: 5px;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="header">
    <h1>NINE RENTAL</h1>
    <h3>RENTAL MOBIL SEGALA MERK</h3>
    <h3>JL. PETERONGANSARI NO 2 SEMARANG</h3>
</div>

<div class="container">

    <h2>DATA KENDARAAN</h2>

    <div class="aksi-atas">
        <a href="index.php">← Kembali</a>
        <a href="sewa_tambah.php" class="tambah">+ Tambah</a>
    </div>

    <br>

    <table>
        <tr>
            <th>No</th>
            <th>No Sewa</th>
            <th>Tgl Sewa</th>
            <th>Tgl Kembali</th>
            <th>No Polisi</th>
            <th>No KTP</th>
            <th>Biaya</th>
            <th>Catatan</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($data)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['no_sewa']; ?></td>
            <td><?= $row['no_ktp']; ?></td>
            <td><?= $row['no_polisi']; ?></td>
            <td><?= $row['tgl_sewa']; ?></td>
            <td><?= $row['tgl_kembali']; ?></td>
            <td><?= $row['biaya']; ?></td>
            <td><?= $row['catatan']; ?></td>

            <td>
                <a href="sewa_edit.php?id=<?= $row['id']; ?>" class="edit">Edit</a>
                <a href="sewa_hapus.php?id=<?= $row['id']; ?>" class="hapus">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</div>

</body>
</html>