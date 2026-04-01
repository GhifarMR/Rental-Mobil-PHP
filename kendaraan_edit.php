<?php
require 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM kendaraantbl WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {

    $no_polisi = $_POST['no_polisi'];
    $nama_kendaraan = $_POST['nama_kendaraan'];
    $tipe = $_POST['tipe'];
    $warna = $_POST['warna'];
    $no_mesin = $_POST['no_mesin'];
    $no_rangka = $_POST['no_rangka'];
    $bahan_bakar = $_POST['bahan_bakar'];
    $thn_kendaraan = $_POST['thn_kendaraan'];
    $status = $_POST['status'];

    if ($_FILES['foto']['name'] != "") {

        if ($row['foto'] != "") {
            unlink("upload/" . $row['foto']);
        }

        $foto = time() . '_' . $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmp, "upload/" . $foto);
    } else {
        $foto = $row['foto'];
    }

    mysqli_query($koneksi, "UPDATE kendaraantbl SET
        no_polisi='$no_polisi',
        nama_kendaraan='$nama_kendaraan',
        tipe='$tipe',
        warna='$warna',
        no_mesin='$no_mesin',
        no_rangka='$no_rangka',
        bahan_bakar='$bahan_bakar',
        thn_kendaraan='$thn_kendaraan',
        foto='$foto',
        status='$status'
        WHERE id='$id'
    ");

    header("Location: data_kendaraan.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Kendaraan</title>

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

        input,
        select {
            width: 100%;
            padding: 6px;
        }

        button {
            padding: 8px 12px;
            background: orange;
            color: white;
            border: none;
        }

        img {
            margin-top: 5px;
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

        <h2>Edit Data Kendaraan</h2>

        <form method="POST" enctype="multipart/form-data">
            <table>

                <tr>
                    <td>No Polisi</td>
                    <td><input type="text" name="no_polisi" value="<?= $row['no_polisi']; ?>"></td>
                </tr>

                <tr>
                    <td>Nama Kendaraan</td>
                    <td><input type="text" name="nama_kendaraan" value="<?= $row['nama_kendaraan']; ?>"></td>
                </tr>

                <tr>
                    <td>Tipe</td>
                    <td><input type="text" name="tipe" value="<?= $row['tipe']; ?>"></td>
                </tr>

                <tr>
                    <td>Warna</td>
                    <td><input type="text" name="warna" value="<?= $row['warna']; ?>"></td>
                </tr>

                <tr>
                    <td>No Mesin</td>
                    <td><input type="text" name="no_mesin" value="<?= $row['no_mesin']; ?>"></td>
                </tr>

                <tr>
                    <td>No Rangka</td>
                    <td><input type="text" name="no_rangka" value="<?= $row['no_rangka']; ?>"></td>
                </tr>

                <tr>
                    <td>Bahan Bakar</td>
                    <td><input type="text" name="bahan_bakar" value="<?= $row['bahan_bakar']; ?>"></td>
                </tr>

                <tr>
                    <td>Tahun Kendaraan</td>
                    <td><input type="number" name="thn_kendaraan" value="<?= $row['thn_kendaraan']; ?>"></td>
                </tr>

                <tr>
                    <td>Foto Lama</td>
                    <td>
                        <?php if ($row['foto'] != "") { ?>
                            <img src="upload/<?= $row['foto']; ?>" width="100">
                        <?php } ?>
                    </td>
                </tr>

                <tr>
                    <td>Ganti Foto</td>
                    <td><input type="file" name="foto"></td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option value="tersedia" <?= ($row['status'] == 'tersedia') ? 'selected' : ''; ?>>Tersedia</option>
                            <option value="disewa" <?= ($row['status'] == 'disewa') ? 'selected' : ''; ?>>Disewa</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="update">Update</button>
                        <a href="data_kendaraan.php">Kembali</a>
                    </td>
                </tr>

            </table>
        </form>

    </div>

</body>

</html>