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
    .banner-hero {
  width: 100%;
  height: 275px;
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

    /* Responsive */
    @media (max-width: 768px) {
      .judul-pesanan h3 {
        font-size: 1.5rem;
        padding: 15px;
      }

      .table {
        font-size: 0.85rem;
      }

      .form-inline {
        flex-direction: column;
        align-items: stretch !important;
      }

      .form-inline .form-group {
        margin-bottom: 10px;
        width: 100%;
      }

      .form-inline .btn {
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
          <li class="nav-item"><a class="nav-link mr-4" href="pesanan.php">RIWAYAT PESANAN</a></li>
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
$tgl_start = $tanggal . " 00:00:00";
    $tgl_end = $tanggal . " 23:59:59";
    $where = "WHERE t.tanggal_transaksi BETWEEN '$tgl_start' AND '$tgl_end'";
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
<table class="table table-bordered table-striped mt-3" id="tabel-penjualan">
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

  <div class="mb-5 mt-4">
  <a href="export_excel.php?filter=<?= $filter ?>&tanggal=<?= $tanggal ?>&bulan=<?= $bulan ?>&tahun_bulan=<?= $tahun_bulan ?>&tahun=<?= $tahun ?>" 
   class="btn btn-success">
   <i class="fas fa-file-excel mr-2"></i>Export ke Excel
</a>
  <button onclick="window.print()" class="btn btn-primary"><i class="fas fa-print mr-2"></i>Print Laporan</button>
</div>
    </div>
  <!-- Akhir Menu -->



  <!-- Footer -->
  <hr class="footer">
  <div class="container">
    <div class="row footer-body">
      <div class="col-md-6">
        <p><strong>Copyright</strong> <i class="far fa-copyright"></i> 2025 - Designed by Kelompok 6 Kelas 4KA21</p>
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