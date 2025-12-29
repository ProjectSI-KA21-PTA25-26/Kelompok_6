<?php 
include('koneksi.php');
session_start();
if(!isset($_SESSION['username'])) {
  header("location: index.php");
  exit;
}

$id_menu = $_GET['id_menu'];
$ambil = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu='$id_menu'");
$result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <title>Edit Menu | Kedai Takosai</title>

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
      content: '✏️ ';
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

    /* Preview Image */
    .preview-image {
      max-width: 300px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
      border: 3px solid #D8C38D;
      margin-bottom: 20px;
    }

    /* Form Labels */
    label {
      color: #7A5F5F;
      font-weight: 600;
      margin-bottom: 8px;
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

    /* Form Controls */
    .form-control {
      border: 2px solid #D8C38D;
      border-radius: 10px;
      padding: 12px 15px;
      transition: all 0.3s ease;
      background: white;
      color: #3B2F2F;
    }

    .form-control:focus {
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

    /* Info box */
    .info-box {
      background: rgba(216, 195, 141, 0.2);
      border-left: 4px solid #D8C38D;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    .info-box p {
      margin: 0;
      color: #7A5F5F;
      font-weight: 600;
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

      .preview-image {
        max-width: 100%;
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
    <h3 class="text-center mt-3 mb-5">SILAHKAN EDIT MENU</h3>
    <div class="card p-5 mb-5">
      
      <!-- Preview Gambar Saat Ini -->
      <div class="info-box">
        <p><i class="fas fa-info-circle mr-2"></i>Gambar saat ini:</p>
      </div>
      <img src="./img/<?php echo $result[0]['gambar'] ?>" alt="Current Menu" class="preview-image">

      <form method="POST" action="edit.php" enctype="multipart/form-data">
        <input type="hidden" name="id_menu" value="<?php echo $result[0]['id_menu'] ?>">
        
        <div class="form-group">
          <label for="menu1">Nama Menu</label>
          <input type="text" class="form-control" id="menu1" name="nama_menu" value="<?php echo $result[0]['nama_menu'] ?>" required>
        </div>
        
        <div class="form-group">
          <label for="harga1">Harga Menu</label>
          <input type="number" class="form-control" id="harga1" name="harga" value="<?php echo $result[0]['harga'] ?>" required>
        </div>
        
        <div class="form-group">
          <label for="gambar">Foto Menu (Kosongkan jika tidak ingin mengubah)</label>
          <input type="file" class="form-control-file border" id="gambar" name="gambar" accept="image/*">
          <small class="form-text text-muted">Format: JPG, PNG, JPEG (Max 2MB)</small>
        </div>
        
        <div class="mt-4">
          <button type="submit" class="btn btn-primary mr-2" name="tambah">
            <i class="fas fa-save mr-2"></i>Simpan Perubahan
          </button>
          <button type="reset" class="btn btn-danger mr-2" name="reset">
            <i class="fas fa-undo mr-2"></i>Reset
          </button>
          <a href="daftar_menu.php" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
          </a>
        </div>
      </form>
    </div>
  </div>
 
    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>