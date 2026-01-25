<?php 
include 'koneksi.php';
session_start();
if(!isset($_SESSION['username'])) {
  header("location: index.php");
  exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <title>Tambah Menu | Kedai Takosai</title>

    <style>
    /* ========== Background & Navbar - Matching dengan menu_pembeli.php ========== */
    
    /* Background halaman */
    body {
      background: linear-gradient(180deg, #FBF6EE 0%, #F2E6CF 50%, #E9D9BF 100%);
      color: #3B2F2F;
      background-attachment: fixed;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      min-height: 100vh;
    }

    /* Navbar */
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
    .navbar .nav-link:hover {
      color: #FFE0B2 !important;
    }

    .navbar .navbar-toggler {
      border-color: rgba(255,255,255,0.14);
    }
    .navbar .navbar-toggler-icon {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='%23FFF1D6' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }

    /* ========== Styling Form ========== */
    
    .container {
      position: relative;
      z-index: 1;
    }

    /* Header Title */
    h3 {
      color: #7A5F5F;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
      padding: 25px;
      background: linear-gradient(135deg, rgba(161, 129, 130, 0.15) 0%, rgba(216, 195, 141, 0.15) 100%);
      border-radius: 20px;
      backdrop-filter: blur(10px);
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
      border: 2px solid rgba(161, 129, 130, 0.2);
    }

    h3::before {
      content: '➕ ';
      font-size: 2rem;
      margin-right: 10px;
    }

    /* Card Form */
    .card {
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(251, 246, 238, 0.95) 100%);
      border: 2px solid #D8C38D;
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.15);
      backdrop-filter: blur(10px);
    }

    /* Form Labels */
    label {
      color: #7A5F5F;
      font-weight: 600;
      margin-bottom: 8px;
      display: block;
    }

    label::before {
      content: '📝 ';
      margin-right: 5px;
    }

    label[for="gambar"]::before {
      content: '📷 ';
    }

    label[for="harga1"]::before {
      content: '💰 ';
    }

    label[for="kategori"]::before {
      content: '🏷️ ';
    }

    label[for="stok1"]::before {
      content: '📦 ';
    }

    /* Style untuk option pertama (placeholder) */
    select.form-control option:first-child {
      color: #A18182;
    }

    select.form-control option:not(:first-child) {
      color: #3B2F2F;
    }

    /* Form Controls */
    .form-control, select.form-control {
      border: 2px solid #D8C38D;
      border-radius: 10px;
      padding: 12px 15px;
      transition: all 0.3s ease;
      background: white;
      color: #3B2F2F;
    }

    .form-control:focus, select.form-control:focus {
      border-color: #A18182;
      box-shadow: 0 0 15px rgba(161, 129, 130, 0.3);
      background: white;
    }

    .form-control-file {
      padding: 10px;
      border: 2px dashed #D8C38D !important;
      border-radius: 10px;
      background: white;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .form-control-file:hover {
      border-color: #A18182 !important;
      background: rgba(216, 195, 141, 0.1);
    }

    /* Buttons */
    .btn-primary {
      background: linear-gradient(135deg, #A18182 0%, #8B6F70 100%);
      border: none;
      padding: 12px 35px;
      font-weight: 700;
      border-radius: 25px;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: 0 4px 15px rgba(161, 129, 130, 0.4);
    }

    .btn-primary:hover {
      background: linear-gradient(135deg, #8B6F70 0%, #7A5F5F 100%);
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(161, 129, 130, 0.6);
    }

    .btn-danger {
      background: linear-gradient(135deg, #E5A3A3 0%, #D98F8F 100%);
      border: none;
      padding: 12px 35px;
      font-weight: 700;
      border-radius: 25px;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: 0 4px 15px rgba(229, 163, 163, 0.4);
    }

    .btn-danger:hover {
      background: linear-gradient(135deg, #D98F8F 0%, #C67B7B 100%);
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(229, 163, 163, 0.6);
    }

    .btn-secondary {
      background: linear-gradient(135deg, #BCAAA4 0%, #A89590 100%);
      border: none;
      padding: 10px 25px;
      font-weight: 600;
      border-radius: 25px;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: white;
      text-decoration: none;
      display: inline-block;
    }

    .btn-secondary:hover {
      background: linear-gradient(135deg, #A89590 0%, #958480 100%);
      transform: translateY(-2px);
      box-shadow: 0 4px 15px rgba(188, 170, 164, 0.4);
      color: white;
      text-decoration: none;
    }

    /* Alert */
    .alert {
      border-radius: 15px;
      border: none;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .alert-danger {
      background: linear-gradient(135deg, #E5A3A3 0%, #D98F8F 100%);
      color: white;
    }

    /* Animation */
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
      animation: fadeInUp 0.6s ease-out;
    }

    /* Responsive */
    @media (max-width: 768px) {
      h3 {
        font-size: 1.5rem;
        padding: 15px;
      }

      .card {
        padding: 20px !important;
      }
    }
    </style>
  </head>
  <body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-dark mb-4">
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
 
  <div class="container">
    <h3 class="text-center mt-3 mb-5">SILAHKAN TAMBAH MENU</h3>
    <div class="card p-5 mb-5 shadow-sm">
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label for="menu1">Nama Menu</label>
          <input type="text" class="form-control" id="menu1" name="nama_menu" placeholder="Contoh: Takoyaki Original" required>
        </div>
        <div class="form-group">
          <label for="harga1">Harga Menu</label>
          <input type="number" class="form-control" id="harga1" name="harga" placeholder="Contoh: 15000" required>
        </div>
        <div class="form-group">
          <label for="kategori">Kategori Menu</label>
          <select class="form-control" id="kategori" name="kategori" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="takoyaki">Takoyaki</option>
            <option value="dimsum">Dimsum</option>
            <option value="minuman">Minuman</option>
            <option value="lainnya">Lainnya</option>
          </select>
        </div>
        <div class="form-group">
          <label for="stok1">Stok Tersedia</label>
          <input type="number" class="form-control" id="stok1" name="stok" placeholder="Contoh: 50" min="0" required>
          <small class="form-text text-muted">Masukkan jumlah stok yang tersedia</small>
        </div>
        <div class="form-group">
          <label for="gambar">Foto Menu</label>
          <input type="file" class="form-control-file border" id="gambar" name="gambar" accept="image/*" required>
          <small class="form-text text-muted">Format: JPG, PNG, JPEG (Max 2MB)</small>
        </div>
        <div class="mt-4">
          <button type="submit" class="btn btn-primary mr-2" name="tambah">
            <i class="fas fa-plus-circle mr-2"></i>Tambah Menu
          </button>
          <button type="reset" class="btn btn-danger mr-2">
            <i class="fas fa-redo mr-2"></i>Reset
          </button>
          <a href="daftar_menu.php" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
          </a>
        </div>
      </form>
      <?php 
      if(isset($_POST['tambah'])){
          $nama = mysqli_real_escape_string($conn, $_POST['nama_menu']);
          $harga = mysqli_real_escape_string($conn, $_POST['harga']);
          $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
          $stok = mysqli_real_escape_string($conn, $_POST['stok']);
          
          $nama_file = $_FILES['gambar']['name'];
          $source = $_FILES['gambar']['tmp_name'];
          $folder = './img/';
          
          // Upload file
          if(move_uploaded_file($source, $folder.$nama_file)){
              // Dapatkan id_menu terakhir lalu tambah 1
              $cek_max = mysqli_query($conn, "SELECT MAX(id_menu) AS max_id FROM menu");
              $row = $cek_max->fetch_assoc();
              $id_menu = $row['max_id'] + 1;
              
              // Simpan ke database
              $insert = mysqli_query($conn, "INSERT INTO menu (id_menu, nama_menu, harga, kategori, stok, gambar) 
                                             VALUES ($id_menu, '$nama', '$harga', '$kategori', '$stok', '$nama_file')");
              if($insert){
                  echo "<script>alert('Menu berhasil ditambahkan!'); window.location='daftar_menu.php';</script>";
              } else {
                  echo "<div class='alert alert-danger mt-3'><i class='fas fa-exclamation-triangle mr-2'></i>Terjadi kesalahan saat menyimpan data.</div>";
              }
          } else {
              echo "<div class='alert alert-danger mt-3'><i class='fas fa-exclamation-triangle mr-2'></i>Gagal mengupload gambar.</div>";
          }
      }
      ?>
    </div>
  </div>
    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>