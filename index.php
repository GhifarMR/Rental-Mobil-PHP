
<?php
require 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Rental</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .judul {
            text-align: center;
            margin-top: 30px;
            font-size: 28px;
            font-weight: bold;
        }

        .menu-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 50px;
        }

        .menu {
            width: 200px;
            height: 130px;
            background: white;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: 0.3s;
        }

        .menu:hover {
            background: #007bff;
            color: white;
            transform: scale(1.05);
        }

        .menu h1 {
            font-size: 14px;
            margin: 0;
        }

        .menu .icon {
            font-size: 32px;
            margin: 8px 0;
        }

        .menu h3 {
            font-size: 14px;
            margin: 0;
        }

        a {
            text-decoration: none;
            color: black;
        }
    </style>

</head>
<body>

<div class="judul">
    APLIKASI RENTAL KENDARAAN
</div>

<div class="menu-container">

    <a href="data_kendaraan.php">
        <div class="menu">
            <h1>Master</h1>
            <div class="icon">🚗</div>
            <h3>Kendaraan</h3>
        </div>
    </a>

    <a href="data_sewa.php">
        <div class="menu">
            <h1>Transaksi</h1>
            <div class="icon">📄</div>
            <h3>Sewa</h3>
        </div>
    </a>

    <a href="customer.php">
        <div class="menu">
            <h1>Customer</h1>
            <div class="icon">👤</div>
            <h3>Pelanggan</h3>
        </div>
    </a>

</div>

</body>
</html>