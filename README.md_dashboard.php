<?php
require 'koneksi.php';

// ambil total barang
$q = mysqli_query($conn, "SELECT COUNT(*) AS total FROM barang");
$data = mysqli_fetch_assoc($q);
$totalBarang = $data['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard admin</title>
</head>

<body style="font-family:Arial; background:#f2f2f2;">

<h2 style="text-align:center;">DASHBOARD ADMIN</h2>

<div style="width:300px; margin:auto; text-align:center;">

    <!-- BARANG -->
    <div style="background:white; padding:10px; margin:10px; border:1px solid #ccc;">
        <h3>Barang</h3>
        <p>Total: <?= $totalBarang; ?> item</p>
        <a href="barang.php">Buka</a>
    </div>

    <!-- LAPORAN BARANG -->
    <div style="background:white; padding:10px; margin:10px; border:1px solid #ccc;">
        <h3>Laporan Barang</h3>
        <p>Data stok barang</p>
        <a href="laporan_barang.php">Buka</a>
    </div>

    <!-- LAPORAN PENJUALAN -->
    <div style="background:white; padding:10px; margin:10px; border:1px solid #ccc;">
        <h3>Laporan Penjualan</h3>
        <p>Data transaksi penjualan</p>
        <a href="laporan_penjualan.php">Buka</a>
    </div>

</div>

<br>

<div style="text-align:center;">
    <a href="logout.php">Logout</a>
</div>

</body>
</html>
