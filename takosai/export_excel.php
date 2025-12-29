<?php
include 'koneksi.php';

// Set header agar browser mengunduh file Excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Penjualan.xls");

$where = "";
$judul = "Semua Transaksi";

// Ambil filter dari parameter GET
$filter = $_GET['filter'] ?? '';
$tanggal = $_GET['tanggal'] ?? '';
$bulan = $_GET['bulan'] ?? '';
$tahun_bulan = $_GET['tahun_bulan'] ?? '';
$tahun = $_GET['tahun'] ?? '';

if ($filter == "hari" && !empty($tanggal)) {
    $where = "WHERE DATE(t.tanggal_transaksi) = '$tanggal'";
    $judul = "Transaksi Tanggal " . date('d-m-Y', strtotime($tanggal));
} elseif ($filter == "bulan" && !empty($bulan) && !empty($tahun_bulan)) {
    $where = "WHERE MONTH(t.tanggal_transaksi) = '$bulan' AND YEAR(t.tanggal_transaksi) = '$tahun_bulan'";
    $judul = "Transaksi Bulan " . date('F', mktime(0,0,0,$bulan,1)) . " " . $tahun_bulan;
} elseif ($filter == "tahun" && !empty($tahun)) {
    $where = "WHERE YEAR(t.tanggal_transaksi) = '$tahun'";
    $judul = "Transaksi Tahun " . $tahun;
}

// Query sesuai filter
$sql = "
SELECT 
    t.kode_transaksi,
    t.nama_pembeli,
    t.tanggal_transaksi,
    m.nama_menu,
    t.metode_pembayaran,
    d.harga,
    d.qty,
    (d.harga * d.qty) AS total_harga
FROM transaksi t
JOIN detailtransaksi d ON t.kode_transaksi = d.kode_transaksi
JOIN menu m ON d.id_menu = m.id_menu
$where
ORDER BY t.tanggal_transaksi ASC;
";

$query = mysqli_query($conn, $sql);
?>

<h3 style="text-align:center;">Laporan Penjualan</h3>
<h4 style="text-align:center;"><?= $judul ?></h4>
<br>

<table border="1" cellpadding="5" cellspacing="0">
  <thead>
  <tr style="background-color:#e0e0e0;">
    <th>No</th>
    <th>Kode Transaksi</th>
    <th>Nama Pembeli</th>
    <th>Tanggal Transaksi</th>
    <th>Nama Menu</th>
    <th>Metode Pembayaran</th>
    <th>Harga</th>
    <th>Jumlah</th>
    <th>Total</th>
  </tr>
  </thead>
  <tbody>
    <?php 
    $no = 1;
    $total = 0;
    while ($row = mysqli_fetch_assoc($query)) {
      $total += $row['total_harga'];
      echo "<tr>
              <td>".$no++."</td>
              <td>".$row['kode_transaksi']."</td>
              <td>".$row['nama_pembeli']."</td>
              <td>".date('d-m-Y H:i:s', strtotime($row['tanggal_transaksi']))."</td>
              <td>".$row['nama_menu']."</td>
              <td>".$row['metode_pembayaran']."</td>
              <td>Rp ".number_format($row['harga'],0,',','.')."</td>
              <td>".$row['qty']."</td>
              <td>Rp ".number_format($row['total_harga'],0,',','.')."</td>
            </tr>";
    }
    ?>
    <tr style="font-weight:bold; background-color:#f0f0f0;">
      <td colspan="8" align="center">Total Keseluruhan</td>
      <td>Rp <?= number_format($total,0,',','.') ?></td>
    </tr>
  </tbody>
</table>
