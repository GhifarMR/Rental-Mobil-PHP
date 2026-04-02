<?php
require 'koneksi.php';

if (isset($_POST['simpan'])) {

    $no_ktp = $_POST['no_ktp'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        $folder = "upload/";
        move_uploaded_file($tmp, $folder . $foto);
    } else {
        $foto = "";
    }

    mysqli_query($koneksi, "INSERT INTO pelanggantbl 
        (no_ktp, nama_pelanggan, alamat, telepon, foto)
        VALUES 
        ('$no_ktp', '$nama_pelanggan', '$alamat', '$telepon', '$foto')");

    header("Location: data_pelanggan.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Customer Pelanggan</title>

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

    <h2>Tambah Customer Pelanggan</h2>

    <form method="POST" enctype="multipart/form-data">
        <table>

            <tr>
                <td>No KTP</td>
                <td><input type="text" name="no_ktp" required></td>
            </tr>

            <tr>
                <td>Nama Pelanggan</td>
                <td><input type="text" name="nama_pelanggan" required></td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>

            <tr>
                <td>Telepon</td>
                <td><input type="text" name="telepon"></td>
            </tr>

            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto"></td>
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