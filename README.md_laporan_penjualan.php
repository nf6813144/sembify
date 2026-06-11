<?php
require 'koneksi.php';
?>

<h2>Laporan Penjualan</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Total</th>
        <th>Bayar</th>
        <th>Kembalian</th>
    </tr>

<?php
$no = 1;
$query = mysqli_query($conn, "SELECT * FROM penjualan ORDER BY tanggal DESC");

while ($row = mysqli_fetch_array($query)) {
?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['tanggal']; ?></td>
        <td>Rp <?= number_format($row['total']); ?></td>
        <td>Rp <?= number_format($row['bayar']); ?></td>
        <td>Rp <?= number_format($row['kembalian']); ?></td>
    </tr>
<?php } ?>

</table>
<br>
<a href="dashboard_admin.php" style="text-decoration:none;">
    ← Kembali
</a>
<br>
