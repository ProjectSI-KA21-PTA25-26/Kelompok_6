<?php 
include('koneksi.php');
session_start();
if(!isset($_SESSION['username'])) {
  header("location: index.php");
}else{
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="indexxx.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    <title>Riwayat Pesanan | Kedai Takosai</title>

    <style>
    /* ========== Background & Navbar - Matching dengan menu_pembeli.php ========== */
    
    /* Background halaman: netral hangat yang mendukung palet kartu */
   /* =========================================
     1. DEFAULT (Tampilan Laptop/PC)
     ========================================= */
  .banner-hero {
    width: 100%;
    height: 275px; /* Tinggi standar laptop */
    background-image: url('img/takosai.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border-radius: 0 0 20px 20px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.25);
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .banner-hero h1 {
    color: white;
    font-size: 3rem;
    font-weight: 800;
    text-shadow: 3px 3px 10px rgba(0,0,0,0.6);
  }

  /* =========================================
     2. KHUSUS TABLET (iPad / Tab)
     Rentang: 768px - 1024px
     ========================================= */
  @media (min-width: 768px) and (max-width: 1024px) {
    .banner-hero {
      height: 50vh !important;       /* Setengah layar tablet */
      min-height: 400px !important;  /* Minimal 400px biar gambar gak kepotong */
      background-position: center center !important;
    }
  }

  /* =========================================
     3. KHUSUS HP (Mobile)
     Rentang: Di bawah 768px
     ========================================= */
  @media (max-width: 767.98px) {
    .banner-hero {
      height: 100vh !important; /* Full layar HP */
      border-radius: 0;         /* Hilangkan lengkungan bawah */
    }
    
    .banner-hero h1 {
        font-size: 2rem;        /* Kecilkan font judul di HP */
    }
  }
    body {
      background: linear-gradient(180deg, #FBF6EE 0%, #F2E6CF 50%, #E9D9BF 100%);
      color: #3B2F2F;
      background-attachment: fixed;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      min-height: 100vh;
    }

    /* Navbar: gradasi coklat hangat, kontras tetapi harmonis dengan kartu */
    .navbar {
      background: linear-gradient(90deg, #7A5F5F 0%, #8B6F70 50%, #A78A7F 100%) !important;
      box-shadow: 0 3px 12px rgba(0,0,0,0.12);
    }
    .navbar .navbar-brand {
      color: #FFF7E6 !important;
      font-weight: 700;
      letter-spacing: 0.4px;
    }
    .navbar .nav-link {
      color: rgba(255,245,232,0.95) !important;
      font-weight: 600;
      margin-right: 1rem;
    }
    .navbar .nav-link:hover,
    .navbar .nav-link:focus {
      color: #FFE0B2 !important;
      text-decoration: none;
    }

    /* Navbar toggler (mobile) */
    .navbar .navbar-toggler {
      border-color: rgba(255,255,255,0.14);
    }
    .navbar .navbar-toggler-icon {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='%23FFF1D6' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }

    /* ========== Styling Halaman Riwayat Pesanan ========== */
    
    .container {
      position: relative;
      z-index: 1;
      background: transparent;
    }

    /* Header Title */
    .judul-pesanan h3 {
      color: #7A5F5F;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
      padding: 25px;
      background: linear-gradient(135deg, rgba(161, 129, 130, 0.15) 0%, rgba(216, 195, 141, 0.15) 100%);
      border-radius: 20px;
      margin-bottom: 30px;
      backdrop-filter: blur(10px);
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
      border: 2px solid rgba(161, 129, 130, 0.2);
    }

    .judul-pesanan h3::before {
      content: '📋 ';
      font-size: 2rem;
      margin-right: 10px;
    }

    /* Filter Card */
    .card {
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(251, 246, 238, 0.95) 100%);
      border: 2px solid #D8C38D;
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
      backdrop-filter: blur(10px);
    }

    .card h5 {
      color: #7A5F5F;
      font-weight: 700;
    }

    /* Form Elements */
    .form-control, select.form-control {
      border: 2px solid #D8C38D;
      border-radius: 10px;
      transition: all 0.3s ease;
      background: white;
    }

    .form-control:focus, select.form-control:focus {
      border-color: #A18182;
      box-shadow: 0 0 10px rgba(161, 129, 130, 0.3);
      background: white;
    }

    label {
      color: #5A4036;
      font-weight: 600;
    }

    /* Buttons */
    .btn-primary {
      background: linear-gradient(135deg, #7A5F5F 0%, #8B6F70 100%);
      border: none;
      padding: 10px 25px;
      font-weight: 600;
      border-radius: 25px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(122, 95, 95, 0.3);
    }

    .btn-primary:hover {
      background: linear-gradient(135deg, #8B6F70 0%, #A78A7F 100%);
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(122, 95, 95, 0.4);
    }

    .btn-success {
      background: linear-gradient(135deg, #A18182 0%, #8B6F70 100%);
      border: none;
      padding: 10px 25px;
      font-weight: 600;
      border-radius: 25px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(161, 129, 130, 0.3);
    }

    .btn-success:hover {
      background: linear-gradient(135deg, #8B6F70 0%, #7A5F5F 100%);
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(161, 129, 130, 0.4);
    }

    /* Subtitle */
    h5.mt-4 {
      color: #7A5F5F;
      font-weight: 700;
      padding: 15px 20px;
      background: rgba(216, 195, 141, 0.3);
      border-radius: 10px;
      border-left: 5px solid #A18182;
    }

    /* Table Styling */
    .table {
      background: rgba(255, 255, 255, 0.95);
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 5px 25px rgba(0,0,0,0.15);
    }

    .table thead.thead-dark {
      background: linear-gradient(135deg, #7A5F5F 0%, #8B6F70 100%);
    }

    .table thead th {
      border: none;
      padding: 15px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      color: white;
    }

    .table tbody tr {
      transition: all 0.3s ease;
      border-bottom: 1px solid rgba(216, 195, 141, 0.3);
    }

    .table tbody tr:hover {
      background: rgba(216, 195, 141, 0.2);
      transform: scale(1.01);
    }

    .table tfoot tr {
      background: linear-gradient(135deg, #A18182 0%, #8B6F70 100%);
      color: white;
      font-weight: bold;
      font-size: 1.1rem;
    }

    .table tfoot td {
      padding: 15px;
      border: none;
    }

    /* DataTables Custom Styling */
    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_filter input {
      border: 2px solid #D8C38D;
      border-radius: 8px;
      padding: 5px 10px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
      background: linear-gradient(135deg, #A18182 0%, #8B6F70 100%) !important;
      border-color: #A18182 !important;
      color: white !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background: linear-gradient(135deg, #D8C38D 0%, #C4AF7A 100%) !important;
      border-color: #D8C38D !important;
      color: white !important;
    }

    /* Footer */
    .footer, .footer-body {
      color: #5A4036;
      border-color: rgba(106,80,60,0.2);
      margin-top: 50px;
    }

    .copyright {
      color: #5A4036;
    }

    /* Print Styles */
    @media print {
      body {
        background: white !important;
      }
      .navbar, .card, .btn, .footer {
        display: none !important;
      }
      .table {
        box-shadow: none !important;
      }
    }

    /* ========== BEST SELLER SECTION ========== */
    .bestseller-section {
      margin-top: 60px;
      margin-bottom: 60px;
    }

    .bestseller-header {
      color: #7A5F5F;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
      padding: 25px;
      background: linear-gradient(135deg, rgba(161, 129, 130, 0.15) 0%, rgba(216, 195, 141, 0.15) 100%);
      border-radius: 20px;
      margin-bottom: 30px;
      backdrop-filter: blur(10px);
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
      border: 2px solid rgba(161, 129, 130, 0.2);
    }

    .bestseller-header h3::before {
      content: '🏆 ';
      font-size: 2rem;
      margin-right: 10px;
    }

    .bestseller-card {
      background: white;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 5px 20px rgba(0,0,0,0.15);
      transition: all 0.3s ease;
      margin-bottom: 25px;
      border: 2px solid transparent;
      position: relative;
    }

    .bestseller-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 30px rgba(0,0,0,0.25);
    }

    .bestseller-card.rank-1 {
      border-color: #FFD700;
      background: linear-gradient(135deg, #FFF9E6 0%, white 100%);
    }

    .bestseller-card.rank-2 {
      border-color: #C0C0C0;
      background: linear-gradient(135deg, #F5F5F5 0%, white 100%);
    }

    .bestseller-card.rank-3 {
      border-color: #CD7F32;
      background: linear-gradient(135deg, #FFF4E6 0%, white 100%);
    }

    .rank-badge {
      position: absolute;
      top: 15px;
      left: 15px;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      font-size: 1.3rem;
      z-index: 10;
      box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    }

    .rank-badge.gold {
      background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
      color: white;
    }

    .rank-badge.silver {
      background: linear-gradient(135deg, #E0E0E0 0%, #B0B0B0 100%);
      color: #333;
    }

    .rank-badge.bronze {
      background: linear-gradient(135deg, #CD7F32 0%, #8B4513 100%);
      color: white;
    }

    .rank-badge.regular {
      background: linear-gradient(135deg, #A18182 0%, #8B6F70 100%);
      color: white;
    }

    .bestseller-image {
      height: 200px;
      object-fit: cover;
      width: 100%;
    }

    .bestseller-body {
      padding: 20px;
    }

    .bestseller-title {
      font-size: 1.2rem;
      font-weight: bold;
      color: #4A3B2A;
      margin-bottom: 10px;
      text-align: center;
    }

    .bestseller-kategori {
      display: inline-block;
      background: #D8C38D;
      color: #4A3B2A;
      padding: 5px 15px;
      border-radius: 20px;
      font-size: 0.85rem;
      font-weight: 600;
      margin-bottom: 15px;
    }

    .bestseller-stats {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
      margin-top: 15px;
    }

    .stat-item {
      text-align: center;
      padding: 10px;
      background: rgba(216, 195, 141, 0.2);
      border-radius: 10px;
    }

    .stat-item-icon {
      font-size: 1.3rem;
      margin-bottom: 5px;
    }

    .stat-item-value {
      font-size: 1.1rem;
      font-weight: bold;
      color: #7A5F5F;
    }

    .stat-item-label {
      font-size: 0.75rem;
      color: #5A4036;
      margin-top: 3px;
    }

    /* Responsive */
    /* =========================================
       RESPONSIVE TABLET & MOBILE
       ========================================= */
       
    /* 1. Pengaturan untuk TABLET (dan layar di bawah 992px) */
    @media (max-width: 991.98px) {
      /* Judul sedikit mengecil agar muat */
      .judul-pesanan h3 {
        font-size: 1.75rem;
      }
      
      /* Font tabel ukuran sedang, biar enak dibaca di Tablet */
      .table {
        font-size: 0.85rem; 
      }

      /* Mencegah teks tabel turun baris (wrap), user tablet bisa scroll ke samping */
      .table thead th, .table tbody td {
        white-space: nowrap; 
      }
      
      /* Penyesuaian form filter agar tidak berantakan */
      .form-inline .form-group {
        margin-bottom: 10px;
      }
    }

    /* 2. Pengaturan KHUSUS HP (Layar kecil di bawah 576px) */
    @media (max-width: 575.98px) {
      /* Font tabel lebih kecil lagi khusus HP */
      .table {
        font-size: 0.75rem; 
      }
      
      /* Tombol Export & Print jadi Full Width (atas bawah) di HP */
      .mb-5 .btn {
        width: 100%;
        margin-bottom: 10px;
        display: block;
      }
      
      /* Form filter jadi tumpuk ke bawah */
      .form-inline {
        flex-direction: column;
        align-items: stretch !important;
      }
      .form-inline .form-group, .form-inline .btn {
        width: 100%;
      }
    }

    /* Animation */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .container > * {
      animation: fadeIn 0.5s ease-out;
    }
    </style>
  </head>
<div class="banner-hero">

</div>


  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
      <a class="navbar-brand text-white"><strong>Kedai Takosai</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link mr-4" href="menu_pembeli.php">DAFTAR MENU</a></li>
          <li class="nav-item"><a class="nav-link mr-4" href="pesanan_pembeli.php">KERANJANG</a></li>
          <li class="nav-item"><a class="nav-link mr-4" href="daftar_menu.php">EDIT MENU</a></li>
          <li class="nav-item"><a class="nav-link mr-4" href="pesanan.php">LAPORAN PENJUALAN</a></li>
          <li class="nav-item"><a class="nav-link mr-4" href="logout.php">LOGOUT</a></li>
        </ul>
      </div>
    </div>
  </nav>
  
  <!-- Menu -->
    <div class="container">
      <div class="judul-pesanan mt-5">
        <h3 class="text-center font-weight-bold">DATA PESANAN PELANGGAN</h3>
        
        <?php
include 'koneksi.php';
// SET TIMEZONE INDONESIA ✅ ADDED
date_default_timezone_set('Asia/Jakarta');

// Default query
$where = "";
$judul = "Semua Transaksi";

// Ambil filter dari form (GET)
$filter = $_GET['filter'] ?? '';
$tanggal = $_GET['tanggal'] ?? date('Y-m-d'); // Default ke tanggal hari ini (Y-m-d)
$bulan = $_GET['bulan'] ?? date('m'); // Default ke bulan sekarang
$tahun_bulan = $_GET['tahun_bulan'] ?? date('Y'); // Default ke tahun sekarang (untuk filter bulan)
$tahun = $_GET['tahun'] ?? date('Y'); // Default ke tahun sekarang (untuk filter tahun)

// Tentukan kondisi WHERE dan judul laporan
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

// Query ambil data
$sql = "
SELECT 
    t.kode_transaksi AS kode_transaksi,
    t.nama_pembeli AS nama_pembeli,
    t.tanggal_transaksi AS tanggal_transaksi,
    m.nama_menu AS nama_menu,
    t.metode_pembayaran AS metode_pembayaran,
    d.harga AS harga,
    d.qty AS qty,
    (d.harga * d.qty) AS total_harga
FROM transaksi t
JOIN detailtransaksi d ON t.kode_transaksi = d.kode_transaksi
JOIN menu m ON d.id_menu = m.id_menu
$where
ORDER BY t.tanggal_transaksi DESC;
";

$query = mysqli_query($conn, $sql);
?>

<div class="card mb-4 p-4 shadow-sm">
  <h5>📅 Filter Penjualan</h5>
  <form method="GET" class="form-inline mt-3">
    <div class="form-group mr-3 mb-2">
      <label class="mr-2">Filter:</label>
      <select name="filter" id="filter" class="form-control" onchange="toggleFilter()">
        <option value="">-- Pilih Filter --</option>
        <option value="hari" <?= ($filter=='hari')?'selected':'' ?>>Per Hari</option>
        <option value="bulan" <?= ($filter=='bulan')?'selected':'' ?>>Per Bulan</option>
        <option value="tahun" <?= ($filter=='tahun')?'selected':'' ?>>Per Tahun</option>
      </select>
    </div>

    <!-- Filter Hari -->
    <div id="filter-hari" class="form-group mr-3 mb-2" style="display:<?= ($filter=='hari')?'inline-flex':'none' ?>;">
      <label class="mr-2">Tanggal:</label>
      <input type="date" name="tanggal" value="<?= $tanggal ?>" class="form-control">
    </div>

    <!-- Filter Bulan -->
    <div id="filter-bulan" class="form-group mr-3 mb-2" style="display:<?= ($filter=='bulan')?'inline-flex':'none' ?>;">
    <label class="mr-2">Bulan:</label>
    <select name="bulan" class="form-control mr-2">
        <?php for ($i=1; $i<=12; $i++): ?>
            <option value="<?= $i ?>" <?= ($bulan==$i)?'selected':'' ?>><?= date("F", mktime(0,0,0,$i,1)) ?></option>
        <?php endfor; ?>
    </select>
    <label class="mr-2">Tahun:</label>
    <select name="tahun_bulan" class="form-control" style="width:100px;">
        <?php 
        $current_year = date('Y');
        // Rentang tahun dari 2020 hingga 2030. Anda bisa sesuaikan angkanya.
        for ($y = 2020; $y <= 2030; $y++): ?>
            <option value="<?= $y ?>" <?= ($tahun_bulan==$y)?'selected':'' ?>><?= $y ?></option>
        <?php endfor; ?>
    </select>
</div>

    <!-- Filter Tahun -->
    <div id="filter-tahun" class="form-group mr-3 mb-2" style="display:<?= ($filter=='tahun')?'inline-flex':'none' ?>;">
    <label class="mr-2">Tahun:</label>
    <select name="tahun" class="form-control" style="width:100px;">
        <?php 
        // Rentang tahun dari 2020 hingga 2030. Anda bisa sesuaikan angkanya.
        for ($y = 2020; $y <= 2030; $y++): ?>
            <option value="<?= $y ?>" <?= ($tahun==$y)?'selected':'' ?>><?= $y ?></option>
        <?php endfor; ?>
    </select>
</div>

<button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search mr-2"></i>Tampilkan</button>
</form>
</div>

<script>
function toggleFilter() {
  const f = document.getElementById('filter').value;
  document.getElementById('filter-hari').style.display = (f === 'hari') ? 'inline-flex' : 'none';
  document.getElementById('filter-bulan').style.display = (f === 'bulan') ? 'inline-flex' : 'none';
  document.getElementById('filter-tahun').style.display = (f === 'tahun') ? 'inline-flex' : 'none';
}
</script>

      </div>
     <h5 class="mt-4">📊 <?= $judul ?></h5>

      <div class="table-responsive">
        <table class="table table-bordered table-striped mt-3" id="tabel-penjualan" style="width:100%">
          <thead class="thead-dark">
          <tr>
            <th>No</th>
            <th>Kode Transaksi</th>
            <th>Nama Pembeli</th>
            <th>Tanggal Transaksi</th>
            <th>Nama Menu</th>
            <th>Metode Pembayaran</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total Bayar</th>
          </tr>
        </thead>
          <tbody>
            <?php
        $no = 1;
        $total_semua = 0;
        while ($row = mysqli_fetch_assoc($query)) {
            $kode = $row['kode_transaksi'];
            $nama_pembeli = $row['nama_pembeli'];
            $tgl = date('d-m-Y H:i:s', strtotime($row['tanggal_transaksi'] . ' +6 hours'));
            $nama_menu = $row['nama_menu'];
            $metode = $row['metode_pembayaran'];
            $harga = $row['harga'];
            $qty = $row['qty'];
            $sub = $row['total_harga'];

            $total_semua += $sub;

            echo "<tr>
                    <td align='center'>{$no}</td>
                    <td align='center'>{$kode}</td>
                    <td>{$nama_pembeli}</td>
                    <td>{$tgl}</td>
                    <td>{$nama_menu}</td>
                    <td>{$metode}</td>
                    <td align='right'>Rp ".number_format($harga,0,',','.')."</td>
                    <td align='center'>{$qty}</td>
                    <td align='right'>Rp ".number_format($sub,0,',','.')."</td>
                  </tr>";
            $no++;
        }

        echo "</tbody>
              <tfoot>
                <tr class='font-weight-bold'>
                  <td colspan='8' align='center'>💰 TOTAL KESELURUHAN</td>
                  <td align='right'>Rp ". number_format($total_semua,0,',','.') ."</td>
                </tr>
              </tfoot>
              </table>";
              ?>
      </div> 
  <div class="mb-5 mt-4">
  <a href="export_excel.php?filter=<?= $filter ?>&tanggal=<?= $tanggal ?>&bulan=<?= $bulan ?>&tahun_bulan=<?= $tahun_bulan ?>&tahun=<?= $tahun ?>" 
   class="btn btn-success">
   <i class="fas fa-file-excel mr-2"></i>Export ke Excel
</a>
  <button onclick="window.print()" class="btn btn-primary"><i class="fas fa-print mr-2"></i>Print Laporan</button>
</div>
    </div>
  <!-- Akhir Menu -->

  <!-- ========== BEST SELLER SECTION ========== -->
  <?php
  // Query untuk mendapatkan menu terlaris berdasarkan filter yang sama
  $sql_bestseller = "
  SELECT 
      m.id_menu,
      m.nama_menu,
      m.kategori,
      m.harga,
      m.gambar,
      SUM(d.qty) AS total_terjual,
      COUNT(DISTINCT t.kode_transaksi) AS jumlah_transaksi,
      SUM(d.total_harga) AS total_pendapatan
  FROM detailtransaksi d
  JOIN menu m ON d.id_menu = m.id_menu
  JOIN transaksi t ON d.kode_transaksi = t.kode_transaksi
  $where
  GROUP BY m.id_menu, m.nama_menu, m.kategori, m.harga, m.gambar
  ORDER BY total_terjual DESC
  LIMIT 10
  ";

  $query_bestseller = mysqli_query($conn, $sql_bestseller);
  $data_bestseller = [];
  while($row_bs = mysqli_fetch_assoc($query_bestseller)) {
      $data_bestseller[] = $row_bs;
  }

  if(count($data_bestseller) > 0):
  ?>
  <div class="container bestseller-section">
      <div class="bestseller-header">
          <h3 class="text-center font-weight-bold">MENU BEST SELLER</h3>
          <p class="text-center mb-0" style="color: #7A5F5F; font-size: 1.1rem;">
              <?= $judul ?> - Top <?= count($data_bestseller) ?> Menu Terlaris
          </p>
      </div>

      <div class="row">
          <?php 
          $rank = 1;
          foreach($data_bestseller as $menu_bs): 
              $rank_class = '';
              $badge_class = 'regular';
              
              if($rank == 1) {
                  $rank_class = 'rank-1';
                  $badge_class = 'gold';
              } elseif($rank == 2) {
                  $rank_class = 'rank-2';
                  $badge_class = 'silver';
              } elseif($rank == 3) {
                  $rank_class = 'rank-3';
                  $badge_class = 'bronze';
              }
          ?>
          <div class="col-md-6 col-lg-4 col-xl-3">
              <div class="bestseller-card <?= $rank_class ?>">
                  <div class="rank-badge <?= $badge_class ?>">
                      <?= $rank ?>
                  </div>
                  <img src="./img/<?= $menu_bs['gambar'] ?>" class="bestseller-image" alt="<?= $menu_bs['nama_menu'] ?>">
                  <div class="bestseller-body">
                      <h5 class="bestseller-title"><?= $menu_bs['nama_menu'] ?></h5>
                      <div class="text-center">
                          <span class="bestseller-kategori"><?= ucfirst($menu_bs['kategori']) ?></span>
                      </div>
                      
                      <div class="bestseller-stats">
                          <div class="stat-item">
                              <div class="stat-item-icon">🔥</div>
                              <div class="stat-item-value"><?= $menu_bs['total_terjual'] ?></div>
                              <div class="stat-item-label">Terjual</div>
                          </div>
                          <div class="stat-item">
                              <div class="stat-item-icon">🛒</div>
                              <div class="stat-item-value"><?= $menu_bs['jumlah_transaksi'] ?></div>
                              <div class="stat-item-label">Transaksi</div>
                          </div>
                          <div class="stat-item" style="grid-column: 1 / -1;">
                              <div class="stat-item-icon">💵</div>
                              <div class="stat-item-value">Rp <?= number_format($menu_bs['total_pendapatan']) ?></div>
                              <div class="stat-item-label">Total Pendapatan</div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php 
          $rank++;
          if($rank > 8) break; // Tampilkan maksimal 8 card
          endforeach; 
          ?>
      </div>
  </div>
  <?php endif; ?>
  <!-- ========== END BEST SELLER SECTION ========== -->


  <!-- Awal Footer -->
      <hr class="footer">
      <div class="container">
        <div class="row footer-body">
          <div class="col-md-6">
          <div class="copyright">
            <strong>Copyright</strong> <i class="far fa-copyright"></i> 2025 - Designed by Kelompok 6 Kelas 4KA21
          </div>
          </div>

          <div class="col-md-6 d-flex justify-content-end">
          <div class="icon-contact">
          <label class="font-weight-bold">Follow Us </label>
          <a href="#"><img src="img/icon/fb.png" class="mr-3 ml-4" data-toggle="tooltip" title="Facebook"></a>
          <a href="#"><img src="img/icon/ig.png" class="mr-3" data-toggle="tooltip" title="Instagram"></a>
          <a href="#"><img src="img/icon/twitter.png" class="" data-toggle="tooltip" title="Twitter"></a>
        </div>
          </div>
        </div>
      </div>
  <!-- Akhir Footer -->





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(document).ready(function() {
          $('#tabel-penjualan').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
            }
          });
      } );
    </script>
  </body>
</html>
<?php } ?>