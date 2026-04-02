<?php
require 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM pelanggantbl WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if ($row['foto'] != "") {
    unlink("upload/" . $row['foto']);
}

mysqli_query($koneksi, "DELETE FROM pelanggantbl WHERE id='$id'");

header("Location: data_pelanggan.php");
?>