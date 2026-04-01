<?php
require 'koneksi.php';

if (isset($_POST['simpan'])) {

    $tanggal = $_POST['tanggal'];
    $no_sewa = $_POST['no_sewa'];
    $no_ktp = $_POST['no_ktp'];
    $no_polisi = $_POST['no_polisi'];
    $tgl_sewa = $_POST['tgl_sewa'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $biaya = $_POST['biaya'];
    $catatan = $_POST['catatan'];

    mysqli_query($koneksi, "INSERT INTO sewatbl 
        (tanggal, no_sewa, no_ktp, no_polisi, tgl_sewa, tgl_kembali, biaya, catatan, status)
        VALUES 
        ('$tanggal', '$no_sewa', '$no_ktp', '$no_polisi', '$tgl_sewa', '$tgl_kembali', '$biaya', '$catatan', '$status')");

    header("Location: data_sewa.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Kendaraan</title>

    <style>
        body {
            font-family: Arial;
        }

        .header {
            text-align: center;
            margin-top: 20px;
        }

        .container {
            width: 80%;
            margin: 20px auto;
        }

        table {
            width: 100%;
        }

        td {
            padding: 8px;
        }

        input, select {
            width: 100%;
            padding: 6px;
        }

        button {
            padding: 8px 12px;
            background: green;
            color: white;
            border: none;
            cursor: pointer;
        }

        a {
            text-decoration: none;
            margin-left: 10px;
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

    <h2>Tambah Data Kendaraan</h2>

    <form method="POST" enctype="multipart/form-data">
        <table>

            <tr>
                <td>Tanggal</td>
                <td><input type="date" name="tanggal" required></td>
            </tr>

            <tr>
                <td>No Sewa</td>
                <td><input type="text" name="no_sewa" required></td>
            </tr>

            <tr>
                <td>No KTP</td>
                <td><input type="text" name="no_ktp"></td>
            </tr>

            <tr>
                <td>No Polisi</td>
                <td><input type="text" name="no_polisi"></td>
            </tr>

            <tr>
                <td>Tgl Sewa</td>
                <td><input type="date" name="tgl_sewa"></td>
            </tr>

            <tr>
                <td>Tgl Kembali</td>
                <td><input type="date" name="tgl_kembali"></td>
            </tr>

            <tr>
                <td>Biaya / hari</td>
                <td><input type="number" name="biaya"></td>
            </tr>

            <tr>
                <td>Catatan</td>
                <td><input type="text" name="catatan"></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit" name="simpan">Simpan</button>
                    <a href="data_kendaraan.php">Kembali</a>
                </td>
            </tr>

        </table>
    </form>

</div>

</body>
</html>