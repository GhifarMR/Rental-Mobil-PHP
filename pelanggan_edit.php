<?php
require 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM pelanggantbl WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {

    $no_ktp = $_POST['no_ktp'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

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

    mysqli_query($koneksi, "UPDATE pelanggantbl SET
        no_ktp='$no_ktp',
        nama_pelanggan='$nama_pelanggan',
        alamat='$alamat',
        telepon='$telepon',
        foto='$foto'
        WHERE id='$id'
    ");

    header("Location: data_pelanggan.php");
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

        <h2>Edit Customer Pelanggan</h2>

        <form method="POST" enctype="multipart/form-data">
            <table>

                <tr>
                    <td>No KTP</td>
                    <td><input type="text" name="no_ktp" value="<?= $row['no_ktp']; ?>"></td>
                </tr>

                <tr>
                    <td>Nama Pelanggan</td>
                    <td><input type="text" name="nama_pelanggan" value="<?= $row['nama_pelanggan']; ?>"></td>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" value="<?= $row['alamat']; ?>"></td>
                </tr>

                <tr>
                    <td>Telepon</td>
                    <td><input type="text" name="telepon" value="<?= $row['telepon']; ?>"></td>
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