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

  <title>Daftar Menu | Kedai Takosai</title>

   <style>
  /* ---------- Background & Navbar (ubah di sini) ----------
     Hanya mengganti background halaman, jumbotron, dan navbar agar
     serasi dengan warna yang sudah dipakai di konten.
     *Tidak mengubah* aturan warna pada .menu-card, .section-header, dll.
  */
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

  /* Background halaman: netral hangat yang mendukung palet kartu */
  body {
    background: linear-gradient(180deg, #FBF6EE 0%, #F2E6CF 50%, #E9D9BF 100%);
    color: #3B2F2F;
    background-attachment: fixed;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  /* Navbar: gradasi coklat hangat, kontras tetapi harmonis dengan kartu */
  .navbar {
    background: linear-gradient(90deg, #7A5F5F 0%, #8B6F70 50%, #A78A7F 100%);
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

  /* Navbar toggler (mobile) agar icon terlihat pada navbar gelap */
  .navbar .navbar-toggler {
    border-color: rgba(255,255,255,0.14);
  }
  .navbar .navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='%23FFF1D6' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
  }

  /* Footer minor tweak untuk menjaga konsistensi warna teks */
  .footer, .footer-body {
    color: #5A4036;
    border-color: rgba(106,80,60,0.06);
  }

  /* Container tetap transparan (kartu akan menonjol) */
  .container {
    position: relative;
    z-index: 1;
    background: transparent;
  }

  /* ============================
     Berikut bagian CSS asli (tidak diubah) — tetap dipertahankan
     ============================ */

    /* Warna background tiap baris */
    .row-color1 .menu-card { background: linear-gradient(135deg, #A18182 0%, #8B6F70 100%); }
    .row-color2 .menu-card { background: linear-gradient(135deg, #D8C38D 0%, #C4AF7A 100%); }
    .row-color3 .menu-card { background: linear-gradient(135deg, #E5A3A3 0%, #D98F8F 100%); }
    .row-color4 .menu-card { background: linear-gradient(135deg, #BCAAA4 0%, #A89590 100%); }

    .menu-card {
      color: white;
      border: none;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
      border-radius: 15px;
      overflow: hidden;
    }

    .menu-card:hover {
      transform: translateY(-10px) scale(1.02);
      box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    }

    .menu-card .card-img-top {
      transition: transform 0.3s ease;
    }

    .menu-card:hover .card-img-top {
      transform: scale(1.1);
    }

    .menu-card .card-body {
      background: rgba(0,0,0,0.5);
      padding: 20px 15px;
      backdrop-filter: blur(5px);
    }

    /* Section Header Styling */
    .section-header {
  position: relative;
  margin: 60px 0 40px;
  padding: 25px 0;
  background: linear-gradient(135deg, #F2E6CF 0%, #D6C2A3 50%, #BFA98A 100%);
  border-radius: 20px;
  box-shadow: 0 5px 20px rgba(0,0,0,0.15);
  overflow: hidden;
  }


    .section-header::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
      animation: shine 3s infinite;
    }

    @keyframes shine {
      0% { left: -100%; }
      50%, 100% { left: 100%; }
    }

    .section-header h4 {
      position: relative;
      margin: 0;
      padding: 0 30px;
      color: #4A3B2A;
      font-weight: bold;
      font-size: 2rem;
      text-transform: uppercase;
      letter-spacing: 2px;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .section-header::after {
      content: '';
      position: absolute;
      bottom: 10px;
      left: 50%;
      transform: translateX(-50%);
      width: 100px;
      height: 3px;
      background: linear-gradient(90deg, transparent, #fff, transparent);
      border-radius: 2px;
    }

    /* Icon kategori */
    .section-icon {
      display: inline-block;
      width: 50px;
      height: 50px;
      line-height: 50px;
      background: rgba(255,255,255,0.4);
      color: #4A3B2A;
      border-radius: 50%;
      margin-right: 15px;
      font-size: 24px;
      vertical-align: middle;
      backdrop-filter: blur(10px);
      border: 2px solid rgba(200,180,150,0.5);
    }

    /* Button styling */
    .btn-beli {
      background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
      color: #2c3e50;
      border: none;
      font-weight: bold;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
      padding: 10px 20px;
      border-radius: 25px;
    }

    .btn-beli:hover {
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      color: #1a252f;
      transform: scale(1.05);
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    /* Harga styling */
    .harga-badge {
      display: inline-block;
      background: rgba(255,255,255,0.2);
      padding: 8px 20px;
      border-radius: 20px;
      font-size: 1.1rem;
      font-weight: bold;
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255,255,255,0.3);
      margin-bottom: 15px;
    }

    .card-title {
      font-size: 1.2rem;
      margin-bottom: 15px;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    }

    /* Decorative elements */
    .section-divider {
      position: relative;
      height: 2px;
      background: linear-gradient(90deg, transparent, #2c3e50, transparent);
      margin: 50px auto;
      width: 80%;
    }

    .section-divider::before,
    .section-divider::after {
      content: '';
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 10px;
      height: 10px;
      background: #2c3e50;
      border-radius: 50%;
    }

    .section-divider::before {
      left: 0;
    }

    .section-divider::after {
      right: 0;
    }
</style>
</head>

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
          <li class="nav-item"><a class="nav-link mr-4" href="pesanan.php">RIWAYAT PESANAN</a></li>
          <li class="nav-item"><a class="nav-link mr-4" href="logout.php">LOGOUT</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Menu -->
  <div class="container">
    <?php 
    // Icon untuk setiap kategori
   $kategori_icons = [
  'takoyaki' => '🐙', 
  'dimsum'   => '🥟',
  'minuman'  => '🥤',
  'snack'    => '🍙',
];

    $kategori_query = mysqli_query($conn, "SELECT DISTINCT kategori FROM menu");
    $kategori_count = 0;
    
    while ($kategori = mysqli_fetch_assoc($kategori_query)) {
    $nama_kategori = trim($kategori['kategori']); // ⬅️ buang spasi tak terlihat
    $kategori_lower = strtolower($nama_kategori);

    $icon = $kategori_icons[$kategori_lower] ?? '🍢';

      
      // Divider antar kategori (kecuali yang pertama)
      if ($kategori_count > 0) {
        echo "<div class='section-divider'></div>";
      }
      
      echo "<div class='section-header text-center'>";
      echo "<h4><span class='section-icon'>$icon</span>" . strtoupper($nama_kategori) . "</h4>";
      echo "</div>";

      $menu_query = mysqli_query($conn, "SELECT * FROM menu WHERE kategori='$nama_kategori'");
      $items = [];
      while($row = mysqli_fetch_assoc($menu_query)) {
        $items[] = $row;
      }

      // Tampilkan dalam baris 4 kolom
      $total = count($items);
      $rowIndex = 0;
      for ($i = 0; $i < $total; $i += 4) {
        $colorClass = 'row-color' . (($rowIndex % 4) + 1);
        echo "<div class='row $colorClass mb-4'>";

        for ($j = $i; $j < $i + 4 && $j < $total; $j++) {
          $item = $items[$j];
  ?>
          <div class="col-md-3 mt-4">
            <div class="card menu-card">
              <img src="./img/<?php echo $item['gambar'] ?>" class="card-img-top" alt="<?php echo $item['nama_menu'] ?>" style="height:200px; object-fit:cover;">
              <div class="card-body text-center">
                <h5 class="card-title"><?php echo $item['nama_menu'] ?></h5>
                <div class="harga-badge">
                  Rp <?php echo number_format($item['harga']); ?>
                </div>
                <a href="beli.php?id_menu=<?php echo $item['id_menu']; ?>" class="btn btn-beli btn-sm btn-block">
                  <i class="fas fa-shopping-cart mr-2"></i>Beli Sekarang
                </a>
              </div>
            </div>
          </div>
  <?php
        }
        echo "</div>"; // tutup .row
        $rowIndex++;
      }
      $kategori_count++;
    }
    ?>
  </div>

  <!-- Footer -->
  <hr class="footer">
  <div class="container">
    <div class="row footer-body">
      <div class="col-md-6">
        <p><strong>Copyright</strong> <i class="far fa-copyright"></i> 2025 - Designed by Kelompok 6 Kelas 4KA21</p>
      </div>
    </div>
  </div>

  <!-- Script -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>