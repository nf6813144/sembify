<?php
require 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Barang</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f2f2f2;
            text-align:center;
        }

        table{
            margin:auto;
            border-collapse:collapse;
            background:white;
        }

        th, td{
            border:1px solid #ccc;
            padding:8px 15px;
        }

        th{
            background:#ddd;
        }

        a{
            text-decoration:none;
        }
    </style>
</head>

<body>

<h2>LAPORAN BARANG</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Stok</th>
    </tr>

    <?php
    $no = 1;
    $query = mysqli_query($conn, "SELECT * FROM barang ORDER BY nama_barang ASC");

    while($row = mysqli_fetch_array($query)){
    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama_barang']; ?></td>
        <td>Rp <?= number_format($row['harga_jual'],0,',','.'); ?></td>
        <td><?= $row['stok']; ?></td>
    </tr>
    <?php } ?>
</table>

<br>

<div style="text-align:center;">
    <a href="dashboard_admin.php">← Kembali</a>
</div>
</body>
</html>
