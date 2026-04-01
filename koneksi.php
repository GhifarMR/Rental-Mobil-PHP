
<?php

$host = "localhost";
$db = "rental_mobil";
$user = "root";
$password = "root";

$koneksi = mysqli_connect($host, $user, $password, $db);

if(!$koneksi) {
    die("koneksi gagal");
}


