<?php
require 'koneksi.php';

if (isset($_POST['simpan'])) {

    $no_polisi = $_POST['no_polisi'];
    $nama_kendaraan = $_POST['nama_kendaraan'];
    $tipe = $_POST['tipe'];
    $warna = $_POST['warna'];
    $no_mesin = $_POST['no_mesin'];
    $no_rangka = $_POST['no_rangka'];
    $bahan_bakar = $_POST['bahan_bakar'];
    $thn_kendaraan = $_POST['thn_kendaraan'];
    $status = $_POST['status'];

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        $folder = "upload/";
        move_uploaded_file($tmp, $folder . $foto);
    } else {
        $foto = "";
    }

    mysqli_query($koneksi, "INSERT INTO kendaraantbl 
        (no_polisi, nama_kendaraan, tipe, warna, no_mesin, no_rangka, bahan_bakar, thn_kendaraan, foto, status)
        VALUES 
        ('$no_polisi', '$nama_kendaraan', '$tipe', '$warna', '$no_mesin', '$no_rangka', '$bahan_bakar', '$thn_kendaraan', '$foto', '$status')");

    header("Location: data_kendaraan.php");
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
                <td>No Polisi</td>
                <td><input type="text" name="no_polisi" required></td>
            </tr>

            <tr>
                <td>Nama Kendaraan</td>
                <td><input type="text" name="nama_kendaraan" required></td>
            </tr>

            <tr>
                <td>Tipe</td>
                <td><input type="text" name="tipe"></td>
            </tr>

            <tr>
                <td>Warna</td>
                <td><input type="text" name="warna"></td>
            </tr>

            <tr>
                <td>No Mesin</td>
                <td><input type="text" name="no_mesin"></td>
            </tr>

            <tr>
                <td>No Rangka</td>
                <td><input type="text" name="no_rangka"></td>
            </tr>

            <tr>
                <td>Bahan Bakar</td>
                <td><input type="text" name="bahan_bakar"></td>
            </tr>

            <tr>
                <td>Tahun Kendaraan</td>
                <td><input type="number" name="thn_kendaraan"></td>
            </tr>

            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto"></td>
            </tr>

            <tr>
                <td>Status</td>
                <td>
                    <select name="status">
                        <option value="tersedia">Tersedia</option>
                        <option value="disewa">Disewa</option>
                    </select>
                </td>
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