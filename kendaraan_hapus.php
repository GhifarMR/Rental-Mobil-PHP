<?php
require 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM kendaraantbl WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if ($row['foto'] != "") {
    unlink("upload/" . $row['foto']);
}

mysqli_query($koneksi, "DELETE FROM kendaraantbl WHERE id='$id'");

header("Location: data_kendaraan.php");
?>