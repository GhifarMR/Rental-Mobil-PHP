<?php
require 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM kendaraantbl WHERE id='$id'");

header("Location: data_kendaraan.php");
?>