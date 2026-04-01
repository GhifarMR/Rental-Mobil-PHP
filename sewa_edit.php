<?php
require 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM sewatbl WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {

    $tanggal = $_POST['tanggal'];
    $no_sewa = $_POST['no_sewa'];
    $no_ktp = $_POST['no_ktp'];
    $no_polisi = $_POST['no_polisi'];
    $tgl_sewa = $_POST['tgl_sewa'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $biaya = $_POST['biaya'];
    $catatan = $_POST['catatan'];

    mysqli_query($koneksi, "UPDATE sewatbl SET
        tanggal='$tanggal',
        no_sewa='$no_sewa',
        no_ktp='$no_ktp',
        no_polisi='$no_polisi',
        tgl_sewa='$tgl_sewa',
        tgl_kembali='$tgl_kembali',
        biaya='$biaya',
        catatan='$catatan'
        WHERE id='$id'
    ");

    header("Location: data_sewa.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Transaksi Sewa</title>

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

        <h2>Edit Data Sewa</h2>

        <form method="POST" enctype="multipart/form-data">
            <table>

                <tr>
                    <td>Tanggal</td>
                    <td><input type="text" name="tanggal" value="<?= $row['tanggal']; ?>"></td>
                </tr>

                <tr>
                    <td>No Sewa</td>
                    <td><input type="text" name="no_sewa" value="<?= $row['no_sewa']; ?>"></td>
                </tr>

                <tr>
                    <td>No KTP</td>
                    <td><input type="text" name="no_ktp" value="<?= $row['no_ktp']; ?>"></td>
                </tr>

                <tr>
                    <td>No Polisi</td>
                    <td><input type="text" name="no_polisi" value="<?= $row['no_polisi']; ?>"></td>
                </tr>

                <tr>
                    <td>Tgl Sewa</td>
                    <td><input type="text" name="tgl_sewa" value="<?= $row['tgl_sewa']; ?>"></td>
                </tr>

                <tr>
                    <td>Tgl Kembali</td>
                    <td><input type="text" name="tgl_kembali" value="<?= $row['tgl_kembali']; ?>"></td>
                </tr>

                <tr>
                    <td>Biaya / hari</td>
                    <td><input type="number" name="biaya" value="<?= $row['biaya']; ?>"></td>
                </tr>

                <tr>
                    <td>Catatan</td>
                    <td><input type="text" name="catatan" value="<?= $row['catatan']; ?>"></td>
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