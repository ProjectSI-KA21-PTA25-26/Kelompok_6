<?php 
session_start();
if(!isset($_SESSION['username'])) {
  header("location: index.php");
  exit;
}

include('koneksi.php');

// Initialize cart if not exists
if(!isset($_SESSION["pesanan"])) {
    $_SESSION["pesanan"] = array();
}
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
  /* ========== GLOBAL STYLES ========== */
  html {
    scroll-behavior: smooth;
  }

  body {
    background: linear-gradient(180deg, #FBF6EE 0%, #F2E6CF 50%, #E9D9BF 100%);
    color: #3B2F2F;
    background-attachment: fixed;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  /* ---------- Background & Navbar ---------- */
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

  /* Background halaman */
  body {
    background: linear-gradient(180deg, #FBF6EE 0%, #F2E6CF 50%, #E9D9BF 100%);
    color: #3B2F2F;
    background-attachment: fixed;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  /* Navbar */
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

  .navbar .navbar-toggler {
    border-color: rgba(255,255,255,0.14);
  }
  .navbar .navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='%23FFF1D6' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
  }

  .footer, .footer-body {
    color: #5A4036;
    border-color: rgba(106,80,60,0.06);
  }

  .container {
    position: relative;
    z-index: 1;
    background: transparent;
  }

  /* ========== MENU CARD COLORS ========== */
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
      position: relative;
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

    /* Badge Stok */
    .stock-badge {
      position: absolute;
      top: 10px;
      right: 10px;
      padding: 8px 15px;
      border-radius: 20px;
      font-weight: bold;
      font-size: 0.85rem;
      backdrop-filter: blur(10px);
      z-index: 10;
      box-shadow: 0 2px 8px rgba(0,0,0,0.3);
    }

    .stock-available {
      background: rgba(76, 175, 80, 0.9);
      color: white;
    }

    .stock-low {
      background: rgba(255, 152, 0, 0.9);
      color: white;
    }

    .stock-out {
      background: rgba(244, 67, 54, 0.9);
      color: white;
    }

    /* Section Header */
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

    .stock-info {
      font-size: 0.9rem;
      margin-bottom: 10px;
      padding: 5px 10px;
      background: rgba(255,255,255,0.15);
      border-radius: 10px;
      display: inline-block;
    }

    /* ========== QUANTITY CONTROLS - NEW DESIGN ========== */
    .qty-controls {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0;
      margin-top: 10px;
      background: white;
      border-radius: 25px;
      padding: 5px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }

    .qty-btn {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: white;
      border: 2px solid #e0e0e0;
      color: #4A4A4A;
      font-size: 1.3rem;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .qty-btn:hover:not(:disabled) {
      background: #f0f0f0;
      transform: scale(1.1);
      border-color: #bdbdbd;
    }

    .qty-btn:active {
      transform: scale(0.95);
    }

    .qty-btn:disabled {
      opacity: 0.4;
      cursor: not-allowed;
      background: #f5f5f5;
    }

    .qty-display {
      min-width: 60px;
      text-align: center;
      font-size: 1.2rem;
      font-weight: bold;
      color: #2c3e50;
      padding: 0 15px;
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

  /* ========== RESPONSIVE ========== */
  @media (max-width: 768px) {
    .banner-hero {
      height: 100vh !important; 
      border-radius: 0; 
      background-position: center center;
      background-size: cover; 
    }

    .banner-hero h1 {
        font-size: 2rem;
        text-align: center;
        padding: 0 15px;
    }
  }

  /* ========== FLOATING CART ========== */
  .floating-cart {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 9999;
    animation: bounceIn 0.6s ease-out;
  }

  @keyframes bounceIn {
    0% {
      transform: scale(0);
      opacity: 0;
    }
    50% {
      transform: scale(1.1);
    }
    100% {
      transform: scale(1);
      opacity: 1;
    }
  }

  .cart-button {
    display: flex;
    align-items: center;
    gap: 15px;
    background: linear-gradient(135deg, #8B6F70 0%, #6B5555 100%);
    color: white;
    padding: 15px 25px;
    border-radius: 50px;
    text-decoration: none;
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    transition: all 0.3s ease;
    font-weight: 600;
    font-size: 1rem;
    border: 3px solid rgba(255,255,255,0.2);
  }

  .cart-button:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 12px 35px rgba(0,0,0,0.4);
    color: white;
    text-decoration: none;
    background: linear-gradient(135deg, #6B5555 0%, #5A4545 100%);
  }

  .cart-icon {
    position: relative;
    font-size: 1.5rem;
  }

  .cart-badge {
    position: absolute;
    top: -8px;
    right: -8px;
    background: #E5A3A3;
    color: white;
    border-radius: 50%;
    width: 22px;
    height: 22px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    font-weight: bold;
    border: 2px solid white;
    box-shadow: 0 2px 8px rgba(0,0,0,0.3);
  }

  .cart-info {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
  }

  .cart-category {
    font-size: 0.85rem;
    opacity: 0.9;
    font-weight: 500;
  }

  .cart-total {
    font-size: 1.1rem;
    font-weight: 700;
  }

  @keyframes pulse {
    0%, 100% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.05);
    }
  }

  .floating-cart.pulse {
    animation: pulse 2s infinite;
  }

  @media (max-width: 768px) {
    .floating-cart {
      bottom: 20px;
      right: 20px;
      left: 20px;
    }
    
    .cart-button {
      width: 100%;
      justify-content: center;
      padding: 12px 20px;
    }
  }

  .floating-cart.hidden {
    display: none;
  }

  /* ========== TOAST NOTIFICATION ========== */
  .toast-notification {
    position: fixed;
    top: 100px;
    right: 30px;
    background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
    color: white;
    padding: 15px 25px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.3);
    z-index: 10000;
    display: flex;
    align-items: center;
    gap: 10px;
    animation: slideInRight 0.5s ease-out;
    font-weight: 600;
  }

  @keyframes slideInRight {
    from {
      transform: translateX(400px);
      opacity: 0;
    }
    to {
      transform: translateX(0);
      opacity: 1;
    }
  }

  @keyframes slideOutRight {
    from {
      transform: translateX(0);
      opacity: 1;
    }
    to {
      transform: translateX(400px);
      opacity: 0;
    }
  }

  .toast-notification.hide {
    animation: slideOutRight 0.5s ease-out forwards;
  }

  .toast-notification i {
    font-size: 1.5rem;
  }

  @media (max-width: 768px) {
    .toast-notification {
      top: 80px;
      right: 20px;
      left: 20px;
      justify-content: center;
    }
  }

  /* ========== HIGHLIGHT ANIMATION ========== */
  .menu-highlight {
    animation: highlightPulse 1.5s ease-out;
  }

  @keyframes highlightPulse {
    0% {
      box-shadow: 0 0 0 0 rgba(255, 215, 0, 0.7);
      transform: scale(1);
    }
    25% {
      box-shadow: 0 0 20px 10px rgba(255, 215, 0, 0.5);
      transform: scale(1.02);
    }
    50% {
      box-shadow: 0 0 30px 15px rgba(255, 215, 0, 0.3);
      transform: scale(1);
    }
    75% {
      box-shadow: 0 0 20px 10px rgba(255, 215, 0, 0.2);
      transform: scale(1.01);
    }
    100% {
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
      transform: scale(1);
    }
  }
</style>
</head>

<body>

<div class="banner-hero"></div>

<?php 
// Tampilkan notifikasi jika ada
if(isset($_SESSION['cart_notification'])) {
  echo "<div class='toast-notification' id='cartToast'>";
  echo "<i class='fas fa-check-circle'></i>";
  echo "<span>" . $_SESSION['cart_notification'] . "</span>";
  echo "</div>";
  unset($_SESSION['cart_notification']);
}
?>

<script>
// Auto hide toast setelah 3 detik
setTimeout(function() {
  var toast = document.getElementById('cartToast');
  if(toast) {
    toast.classList.add('hide');
    setTimeout(function() {
      toast.remove();
    }, 500);
  }
}, 3000);
</script>

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
    <?php 
    // Icon untuk setiap kategori
    $kategori_icons = [
      'takoyaki' => '🐙', 
      'dimsum'   => '🥟',
      'minuman'  => '🥤',
      'snack'    => '🍿',
    ];

    $kategori_query = mysqli_query($conn, "SELECT DISTINCT kategori FROM menu");
    $kategori_count = 0;
    
    while ($kategori = mysqli_fetch_assoc($kategori_query)) {
      $nama_kategori = trim($kategori['kategori']);
      $kategori_lower = strtolower($nama_kategori);
      $icon = $kategori_icons[$kategori_lower] ?? '🍢';
      
      // Divider antar kategori
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
          $id_menu = $item['id_menu'];
          $stok = isset($item['stok']) ? (int)$item['stok'] : 0;
          
          // Cek qty di keranjang
          $qty_in_cart = isset($_SESSION["pesanan"][$id_menu]) ? $_SESSION["pesanan"][$id_menu] : 0;
          
          // Tentukan badge stok
          $stockBadgeClass = 'stock-available';
          $stockBadgeText = 'Tersedia';
          if ($stok == 0) {
            $stockBadgeClass = 'stock-out';
            $stockBadgeText = 'Habis';
          } elseif ($stok <= 10) {
            $stockBadgeClass = 'stock-low';
            $stockBadgeText = 'Stok Terbatas';
          }
  ?>
          <div class="col-md-3 mt-4" id="menu-<?php echo $id_menu; ?>">
            <div class="card menu-card">
              <!-- Badge Stok -->
              <div class="stock-badge <?php echo $stockBadgeClass; ?>">
                <?php echo $stockBadgeText; ?>
              </div>
              
              <img src="./img/<?php echo $item['gambar'] ?>" class="card-img-top" alt="<?php echo $item['nama_menu'] ?>" style="height:200px; object-fit:cover;">
              <div class="card-body text-center">
                <h5 class="card-title"><?php echo $item['nama_menu'] ?></h5>
                <div class="harga-badge">
                  Rp <?php echo number_format($item['harga']); ?>
                </div>
                <div class="stock-info">
                  <i class="fas fa-box mr-1"></i> Stok: <?php echo $stok; ?>
                </div>
                
                <!-- Quantity Controls - Always Visible -->
                <div class="qty-controls" id="qty-controls-<?php echo $id_menu; ?>">
                  <button class="qty-btn" onclick="updateQuantity('<?php echo $id_menu; ?>', 'minus')" 
                    id="minus-<?php echo $id_menu; ?>"
                    <?php echo ($qty_in_cart <= 0) ? 'disabled' : ''; ?>>
                    <i class="fas fa-minus"></i>
                  </button>
                  <span class="qty-display" id="qty-<?php echo $id_menu; ?>"><?php echo $qty_in_cart; ?></span>
                  <button class="qty-btn" onclick="updateQuantity('<?php echo $id_menu; ?>', 'plus')" 
                    id="plus-<?php echo $id_menu; ?>"
                    <?php echo ($stok <= 0 || $qty_in_cart >= $stok) ? 'disabled' : ''; ?>>
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
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

  <!-- Floating Cart Button -->
  <?php 
  // Hitung total item dan total harga di keranjang
  $total_items = 0;
  $total_harga = 0;
  $kategori_items = [];
  
  if(isset($_SESSION["pesanan"]) && !empty($_SESSION["pesanan"])) {
    foreach ($_SESSION["pesanan"] as $id_menu => $jumlah) {
      $query_cart = mysqli_query($conn, "SELECT nama_menu, harga, kategori FROM menu WHERE id_menu='$id_menu'");
      if($data_cart = mysqli_fetch_assoc($query_cart)) {
        $total_items += $jumlah;
        $total_harga += ($data_cart['harga'] * $jumlah);
        
        // Hitung per kategori
        $kat = $data_cart['kategori'];
        if(!isset($kategori_items[$kat])) {
          $kategori_items[$kat] = 0;
        }
        $kategori_items[$kat] += $jumlah;
      }
    }
  }
  
  // Tampilkan floating cart hanya jika ada item
  if($total_items > 0):
    // Cari kategori dengan item terbanyak
    $main_kategori = '';
    $max_items = 0;
    foreach($kategori_items as $kat => $count) {
      if($count > $max_items) {
        $max_items = $count;
        $main_kategori = ucfirst($kat);
      }
    }
  ?>
  <div class="floating-cart <?php echo ($total_items > 0) ? 'pulse' : 'hidden'; ?>">
    <a href="pesanan_pembeli.php" class="cart-button">
      <div class="cart-icon">
        <i class="fas fa-shopping-bag"></i>
        <span class="cart-badge"><?php echo $total_items; ?></span>
      </div>
      <div class="cart-info">
        <span class="cart-category"><?php echo $main_kategori; ?> - <?php echo $total_items; ?> Items</span>
        <span class="cart-total">Rp <?php echo number_format($total_harga); ?></span>
      </div>
    </a>
  </div>
  <?php endif; ?>

  <!-- Footer -->
  <hr class="footer">
  <div class="container">
    <div class="row footer-body">
      <div class="col-md-6">
        <p><strong>Copyright</strong> <i class="far fa-copyright"></i> 2025 - Designed by Kelompok 6 Kelas 4KA21</p>
      </div>
      <div class="col-md-6 d-flex justify-content-end">
        <div class="icon-contact">
          <label class="font-weight-bold">Follow Us </label>
          <a href="#"><img src="img/icon/fb.png" class="mr-3 ml-4" title="Facebook"></a>
          <a href="#"><img src="img/icon/ig.png" class="mr-3" title="Instagram"></a>
          <a href="#"><img src="img/icon/twitter.png" title="Twitter"></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Script -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <script>
  // Function untuk update quantity dengan maintain scroll position
  function updateQuantity(idMenu, action) {
    // Redirect ke update_qty.php dengan parameter dan anchor
    window.location.href = 'update_qty.php?id_menu=' + idMenu + '&action=' + action + '#menu-' + idMenu;
  }

  // Highlight menu card yang baru di-update
  document.addEventListener('DOMContentLoaded', function() {
    // Check if there's a hash in URL
    if(window.location.hash) {
      var targetId = window.location.hash;
      var targetElement = document.querySelector(targetId);
      
      if(targetElement) {
        // Scroll ke element dengan smooth
        setTimeout(function() {
          targetElement.scrollIntoView({ 
            behavior: 'smooth', 
            block: 'center'
          });
        }, 100);
        
        // Add highlight animation
        var card = targetElement.querySelector('.menu-card');
        if(card) {
          card.classList.add('menu-highlight');
          
          // Remove class after animation
          setTimeout(function() {
            card.classList.remove('menu-highlight');
          }, 1500);
        }
      }
    }
  });
  </script>
</body>
</html>
