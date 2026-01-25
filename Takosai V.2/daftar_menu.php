<?php 
session_start();
if(!isset($_SESSION['username'])) {
  header("location: index.php");
  exit;
}

include('koneksi.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap & CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="indexxx.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <title>Daftar Menu | Admin Kedai Takosai</title>

    <style>
    /* ========== Background & Navbar - Matching dengan menu_pembeli.php ========== */
    
    /* Background halaman: netral hangat yang mendukung palet kartu */
    
    /* ===== Banner Background ===== */
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

    /* ========== Styling Halaman Daftar Menu ========== */
    
    .container {
      position: relative;
      z-index: 1;
      background: transparent;
    }

    /* Tombol Tambah Menu */
    .btn-tambah-menu {
      background: linear-gradient(135deg, #A18182 0%, #8B6F70 100%);
      color: white;
      border: none;
      padding: 15px 40px;
      font-weight: 700;
      border-radius: 30px;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      box-shadow: 0 5px 20px rgba(161, 129, 130, 0.4);
      font-size: 1.1rem;
    }

    .btn-tambah-menu:hover {
      background: linear-gradient(135deg, #8B6F70 0%, #7A5F5F 100%);
      transform: translateY(-3px);
      box-shadow: 0 8px 30px rgba(161, 129, 130, 0.6);
      color: white;
    }

    .btn-tambah-menu i {
      margin-right: 10px;
      font-size: 1.2rem;
    }

    /* Header Kategori */
    h3.text-uppercase {
      color: #7A5F5F !important;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
      padding: 15px 20px;
      background: linear-gradient(135deg, rgba(161, 129, 130, 0.2) 0%, rgba(216, 195, 141, 0.2) 100%);
      border-radius: 15px;
      border-left: 5px solid #A18182;
      margin-top: 40px !important;
      margin-bottom: 30px !important;
      backdrop-filter: blur(10px);
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    h3.text-uppercase::before {
      content: '';
      margin-right: 15px;
      font-size: 1.3rem;
    }

    /* Card Menu */
    .card {
      border: none !important;
      border-radius: 15px;
      overflow: hidden;
      transition: all 0.3s ease;
      box-shadow: 0 4px 20px rgba(0,0,0,0.15);
      background: white;
    }

    .card:hover {
      transform: translateY(-10px) scale(1.02);
      box-shadow: 0 8px 30px rgba(0,0,0,0.25);
    }

    .card-img-top {
      transition: transform 0.3s ease;
      border-bottom: 3px solid #D8C38D;
    }

    .card:hover .card-img-top {
      transform: scale(1.1);
    }

    .card-body {
      padding: 20px;
      background: linear-gradient(to bottom, white 0%, #FBF6EE 100%);
    }

    .card-title {
      color: #7A5F5F;
      font-size: 1.1rem;
      margin-bottom: 15px;
      min-height: 50px;
    }

    .card-text {
      color: #A18182 !important;
      font-size: 1.2rem;
      font-weight: 700;
      margin-bottom: 20px;
    }

    /* Button Edit */
    .btn-success {
      background: linear-gradient(135deg, #A18182 0%, #8B6F70 100%) !important;
      border: none !important;
      padding: 10px 20px;
      font-weight: 600;
      border-radius: 25px;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 8px;
    }

    .btn-success:hover {
      background: linear-gradient(135deg, #8B6F70 0%, #7A5F5F 100%) !important;
      transform: scale(1.05);
      box-shadow: 0 4px 15px rgba(161, 129, 130, 0.4);
    }

    /* Button Hapus */
    .btn-danger {
      background: linear-gradient(135deg, #E5A3A3 0%, #D98F8F 100%) !important;
      border: none !important;
      padding: 10px 20px;
      font-weight: 600;
      border-radius: 25px;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .btn-danger:hover {
      background: linear-gradient(135deg, #D98F8F 0%, #C67B7B 100%) !important;
      transform: scale(1.05);
      box-shadow: 0 4px 15px rgba(229, 163, 163, 0.4);
    }

    /* Icon dalam button */
    .btn i {
      margin-right: 5px;
    }

    /* Footer */
    .footer, .footer-body {
      color: #5A4036;
      border-color: rgba(106,80,60,0.2);
      margin-top: 50px;
    }

    .footer-body p {
      color: #5A4036;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .btn-tambah-menu {
        font-size: 0.9rem;
        padding: 12px 30px;
      }

      h3.text-uppercase {
        font-size: 1.3rem;
      }

      .card-title {
        font-size: 1rem;
        min-height: auto;
      }
    }

    /* Loading animation untuk card */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .card {
      animation: fadeInUp 0.5s ease-out;
    }
    </style>
  </head>
  <body>

  <div class="banner-hero">
 
</div>


  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
      <a class="navbar-brand text-white" ><strong>Kedai Takosai</strong></a>
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
  <!-- Akhir Navbar -->

  <!-- Tombol Tambah Menu -->
  <div class="container text-center mt-5 mb-5">
    <a href="tambah_menu.php" class="btn btn-tambah-menu">
      <i class="fas fa-plus-circle"></i>TAMBAH MENU BARU
    </a>
  </div>
  
  <?php
$kategori_icons = [
  'takoyaki' => '🐙', 
  'dimsum'   => '🥟',
  'minuman'  => '🥤',
  'snack'    => '🍙',
];
?>

  <!-- Menu Per Kategori -->
  <div class="container mb-5">
    <?php
    // Ambil daftar kategori unik
    $kategori_query = mysqli_query($conn, "SELECT DISTINCT kategori FROM menu ");
    while ($kategori_row = mysqli_fetch_assoc($kategori_query)) {
      $kategori = $kategori_row['kategori'];

      $kategori_lower = strtolower($kategori);
      $icon = isset($kategori_icons[$kategori_lower]) ? $kategori_icons[$kategori_lower] : '🍽️';
      echo "<h3 class='mt-5 mb-4 text-uppercase font-weight-bold'>{$icon} " . strtoupper($kategori) . "</h3>";
      echo "<div class='row'>";

      // Ambil menu berdasarkan kategori
      $menu_query = mysqli_query($conn, "SELECT * FROM menu WHERE kategori='$kategori'");
      while ($menu = mysqli_fetch_assoc($menu_query)) {
        echo "
        <div class='col-md-3 mt-3'>
          <div class='card'>
            <img src='./img/{$menu['gambar']}' class='card-img-top' alt='{$menu['nama_menu']}' style='height:200px; object-fit:cover;'>
            <div class='card-body'>
              <h5 class='card-title font-weight-bold'>{$menu['nama_menu']}</h5>
              <p class='card-text mb-3'>Rp. " . number_format($menu['harga']) . "</p>
              <a href='edit_menu.php?id_menu={$menu['id_menu']}' class='btn btn-success btn-sm btn-block'>
                <i class='fas fa-edit'></i>EDIT
              </a>
              <a href='hapus_menu.php?id_menu={$menu['id_menu']}' class='btn btn-danger btn-sm btn-block text-light' onclick='return confirm(\"Yakin ingin menghapus menu ini?\")'>
                <i class='fas fa-trash'></i>HAPUS
              </a>
            </div>
          </div>
        </div>";
      }

      echo "</div>"; // end row
    }
    ?>
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

  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  </body>
</html>