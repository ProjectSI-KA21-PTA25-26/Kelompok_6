<?php  
include('koneksi.php');
session_start();
if(!isset($_SESSION['username'])) {
  header("location: index.php");
  exit;
}

if(empty($_SESSION["pesanan"]) || !isset($_SESSION["pesanan"])) {
  echo "<script>alert('Pesanan kosong, Silahkan Pesan dahulu');</script>";
  echo "<script>location='menu_pembeli.php'</script>";
  exit;
}

// Handle Konfirmasi Pesanan
if (isset($_POST['konfirm'])) {
    $tgl = date("Y-m-d H:i:s");
    $nama_pembeli = mysqli_real_escape_string($conn, $_POST['nama_pembeli']);
    $metode_pembayaran = mysqli_real_escape_string($conn, $_POST['metode_pembayaran']);
    $username = $_SESSION['username'];

    $cek_max = mysqli_query($conn, "SELECT MAX(kode_transaksi) AS max_id FROM transaksi");
    $max = $cek_max->fetch_assoc();
    $kode_trans = $max['max_id'] + 1;

    $insert = mysqli_query($conn, "
        INSERT INTO transaksi (kode_transaksi, tanggal_transaksi, status, status_kitchen, keterangan, nama_pembeli, metode_pembayaran) 
        VALUES ($kode_trans, '$tgl', 1, 1, 'Dine In', '$nama_pembeli', '$metode_pembayaran')
    ");

    if (!$insert) {
        echo "<div class='alert alert-danger mt-3'>Gagal menyimpan transaksi: " . mysqli_error($conn) . "</div>";
    } else {
        // Simpan data untuk struk
        $struk_data = [
            'kode_transaksi' => $kode_trans,
            'nama_pembeli' => $nama_pembeli,
            'tanggal' => $tgl,
            'metode_pembayaran' => $metode_pembayaran,
            'items' => [],
            'total' => 0
        ];

        foreach ($_SESSION["pesanan"] as $id_menu => $jumlah) {
            $query_menu = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu='$id_menu'");
            $data_menu = $query_menu->fetch_assoc();
            $harga = $data_menu['harga'];
            $subtotal = $harga * $jumlah;
            
            // Simpan ke array struk
            $struk_data['items'][] = [
                'nama' => $data_menu['nama_menu'],
                'harga' => $harga,
                'qty' => $jumlah,
                'subtotal' => $subtotal
            ];
            $struk_data['total'] += $subtotal;
            
            // Insert detail transaksi
            mysqli_query($conn, "
                INSERT INTO detailtransaksi(kode_transaksi, id_menu, harga, qty, total_harga)
                VALUES ($kode_trans, '$id_menu', $harga, $jumlah, $subtotal)
            ");
            
            // Kurangi stok di tabel menu
            mysqli_query($conn, "
                UPDATE menu 
                SET stok = stok - $jumlah 
                WHERE id_menu = '$id_menu'
            ");
        }

        // Save struk data to session
        $_SESSION['struk_data'] = $struk_data;
        
        // Kosongkan keranjang
        unset($_SESSION["pesanan"]);
        
        // Redirect to struk page
        echo "<script>window.location.href='struk_pembelian.php';</script>";
        exit;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Keranjang | Kedai Takosai</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="indexxx.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

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

  /* Navbar toggler (mobile) agar icon terlihat pada navbar gelap */
  .navbar .navbar-toggler {
    border-color: rgba(255,255,255,0.14);
  }
  .navbar .navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='%23FFF1D6' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
  }

  /* ========== Styling Halaman Pesanan ========== */
  
  .container {
    position: relative;
    z-index: 1;
    background: transparent;
  }

  /* Header Title */
  h3.text-center {
    color: #7A5F5F;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    padding: 20px 0;
    background: rgba(255,255,255,0.6);
    border-radius: 15px;
    margin-bottom: 30px;
    backdrop-filter: blur(10px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  }

  /* Form Styling */
  .form-control {
    border: 2px solid #D8C38D;
    border-radius: 10px;
    transition: all 0.3s ease;
  }

  .form-control:focus {
    border-color: #A18182;
    box-shadow: 0 0 10px rgba(161, 129, 130, 0.3);
  }

  label b {
    color: #7A5F5F;
  }

  /* Radio Button Styling */
  .form-check-input:checked {
    background-color: #A18182;
    border-color: #A18182;
  }

  .form-check-label {
    color: #5A4036;
    font-weight: 600;
  }

  /* Table Styling */
  .table {
    background: rgba(255,255,255,0.9);
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
  }

  .table thead {
    background: linear-gradient(135deg, #A18182 0%, #8B6F70 100%);
    color: white;
  }

  .table thead th {
    border: none;
    padding: 15px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .table tbody tr {
    transition: all 0.3s ease;
  }

  .table tbody tr:hover {
    background: rgba(216, 195, 141, 0.2);
    transform: scale(1.01);
  }

  .table tfoot {
    background: linear-gradient(135deg, #D8C38D 0%, #C4AF7A 100%);
    color: white;
    font-weight: bold;
  }

  .table tfoot th {
    padding: 15px;
    font-size: 1.1rem;
  }

  /* Badge Hapus */
  .badge-danger {
    background: linear-gradient(135deg, #E5A3A3 0%, #D98F8F 100%);
    padding: 8px 15px;
    border-radius: 20px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
  }

  .badge-danger:hover {
    background: linear-gradient(135deg, #D98F8F 0%, #C67B7B 100%);
    transform: scale(1.1);
    box-shadow: 0 4px 10px rgba(229, 163, 163, 0.4);
  }

  /* Quantity Control Styling */
  .qty-control {
    gap: 10px;
  }

  .btn-qty {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: linear-gradient(135deg, #A18182 0%, #8B6F70 100%);
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(161, 129, 130, 0.3);
    font-size: 14px;
  }

  .btn-qty:hover {
    background: linear-gradient(135deg, #8B6F70 0%, #7A5F5F 100%);
    transform: scale(1.1);
    box-shadow: 0 4px 12px rgba(161, 129, 130, 0.5);
    color: white;
    text-decoration: none;
  }

  .btn-qty:active {
    transform: scale(0.95);
  }

  .qty-number {
    display: inline-block;
    min-width: 40px;
    text-align: center;
    font-weight: 700;
    font-size: 1.1rem;
    color: #7A5F5F;
  }

  /* Button Styling */
  .btn-primary {
    background: linear-gradient(135deg, #7A5F5F 0%, #8B6F70 100%);
    border: none;
    padding: 10px 25px;
    font-weight: 600;
    border-radius: 25px;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
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
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .btn-success:hover {
    background: linear-gradient(135deg, #8B6F70 0%, #7A5F5F 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(161, 129, 130, 0.4);
  }

  /* Popup QRIS */
  .modal-qris {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    backdrop-filter: blur(5px);
    background-color: rgba(0,0,0,0.5);
  }

  .modal-content-qris {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: linear-gradient(135deg, #FBF6EE 0%, #F2E6CF 100%);
    padding: 30px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 10px 40px rgba(0,0,0,0.3);
    border: 3px solid #D8C38D;
  }

  .modal-content-qris img {
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    border: 3px solid white;
  }

  .close-qris {
    position: absolute;
    right: 15px;
    top: 10px;
    font-size: 30px;
    cursor: pointer;
    color: #A18182;
    font-weight: bold;
    transition: all 0.3s ease;
  }

  .close-qris:hover {
    color: #7A5F5F;
    transform: scale(1.2);
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

  /* Responsive */
  @media (max-width: 768px) {
    .table {
      font-size: 0.9rem;
    }
    
    h3.text-center {
      font-size: 1.5rem;
    }
  }
  </style>
</head>
<body>

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
        <li class="nav-item"><a class="nav-link mr-4" href="pesanan.php">RIWAYAT PESANAN</a></li>
        <li class="nav-item"><a class="nav-link mr-4" href="logout.php">LOGOUT</a></li>
      </ul>
    </div>
  </div> 
</nav>

<div class="container mt-5">
  <h3 class="text-center font-weight-bold mb-4">🛒 PESANAN ANDA</h3>

  <!-- Mulai Form -->
  <form method="POST" action="">

    <!-- Nama Pembeli -->
    <div class="mb-4">
      <label><b><i class="fas fa-user mr-2"></i>Nama Pembeli:</b></label>
      <input type="text" name="nama_pembeli" id="nama_pembeli" class="form-control" placeholder="Masukkan nama pembeli..." required style="max-width:400px;">
    </div>

    <!-- Metode Pembayaran -->
    <div class="mb-4">
      <label><b><i class="fas fa-wallet mr-2"></i>Metode Pembayaran:</b></label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="metode_pembayaran" value="Cash" checked onclick="toggleQRIS(false)">
        <label class="form-check-label">💵 Cash</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="metode_pembayaran" value="QRIS" onclick="toggleQRIS(true)">
        <label class="form-check-label">📱 QRIS</label>
      </div>
    </div>

    <!-- Popup QRIS -->
    <div id="qrisModal" class="modal-qris">
      <div class="modal-content-qris">
        <span class="close-qris" onclick="closeQRIS()">&times;</span>
        <h4 style="color: #7A5F5F; margin-bottom: 20px;"><i class="fas fa-qrcode mr-2"></i>Scan QRIS</h4>
        <img src="qris.jpg" alt="QRIS Code" class="img-fluid" style="max-width:300px;">
        <p class="mt-3 text-muted text-center">Silakan scan kode QRIS dengan aplikasi e-wallet Anda.</p>
      </div>
    </div>

    <!-- Script QRIS -->
    <script>
      function toggleQRIS(show) {
        const modal = document.getElementById('qrisModal');
        if (show) {
          modal.style.display = 'block';
        } else {
          modal.style.display = 'none';
        }
      }

      function closeQRIS() {
        document.getElementById('qrisModal').style.display = 'none';
      }

      window.onclick = function(event) {
        const modal = document.getElementById('qrisModal');
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>

    <!-- Tabel Pesanan -->
    <table class="table table-bordered mt-4">
      <thead class="thead-light">
        <tr>
          <th>No</th>
          <th>Nama Pesanan</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subharga</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $nomor = 1;
        $totalbelanja = 0;
        foreach ($_SESSION["pesanan"] as $id_menu => $jumlah):
          $ambil = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu='$id_menu'");
          $pecah = $ambil->fetch_assoc();
          $subharga = $pecah["harga"] * $jumlah;
        ?>
        <tr>
          <td><?= $nomor++; ?></td>
          <td><?= $pecah["nama_menu"]; ?></td>
          <td>Rp. <?= number_format($pecah["harga"]); ?></td>
          <td>
            <div class="qty-control d-flex align-items-center justify-content-center">
              <a href="update_qty.php?id_menu=<?= $id_menu ?>&action=minus" class="btn-qty btn-minus">
                <i class="fas fa-minus"></i>
              </a>
              <span class="qty-number"><?= $jumlah; ?></span>
              <a href="update_qty.php?id_menu=<?= $id_menu ?>&action=plus" class="btn-qty btn-plus">
                <i class="fas fa-plus"></i>
              </a>
            </div>
          </td>
          <td>Rp. <?= number_format($subharga); ?></td>
          <td><a href="hapus_pesanan.php?id_menu=<?= $id_menu ?>" class="badge badge-danger" ><i class="fas fa-trash mr-1"></i>Hapus</a></td>
        </tr>
        <?php 
          $totalbelanja += $subharga;
        endforeach; 
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="4"><i class="fas fa-calculator mr-2"></i>Total Belanja</th>
          <th colspan="2">Rp. <?= number_format($totalbelanja) ?></th>
        </tr>
      </tfoot>
    </table>

    <div class="mt-4 mb-5">
      <a href="menu_pembeli.php" class="btn btn-primary btn-sm mr-2"><i class="fas fa-arrow-left mr-2"></i>Lihat Menu</a>
      <button class="btn btn-success btn-sm" name="konfirm"><i class="fas fa-check-circle mr-2"></i>Konfirmasi Pesanan</button>
    </div>
  </form>
</div>

<?php 
if (isset($_POST['konfirm'])) {
    $tgl = date("Y-m-d H:i:s");
    $nama_pembeli = mysqli_real_escape_string($conn, $_POST['nama_pembeli']);
    $metode_pembayaran = mysqli_real_escape_string($conn, $_POST['metode_pembayaran']);
    $username = $_SESSION['username'];

    $cek_max = mysqli_query($conn, "SELECT MAX(kode_transaksi) AS max_id FROM transaksi");
    $max = $cek_max->fetch_assoc();
    $kode_trans = $max['max_id'] + 1;

    $insert = mysqli_query($conn, "
        INSERT INTO transaksi (kode_transaksi, tanggal_transaksi, status, status_kitchen, keterangan, nama_pembeli, metode_pembayaran) 
        VALUES ($kode_trans, '$tgl', 1, 1, 'Dine In', '$nama_pembeli', '$metode_pembayaran')
    ");

    if (!$insert) {
        echo "<div class='alert alert-danger mt-3'>Gagal menyimpan transaksi: " . mysqli_error($conn) . "</div>";
    }

    foreach ($_SESSION["pesanan"] as $id_menu => $jumlah) {
        $query_menu = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu='$id_menu'");
        $data_menu = $query_menu->fetch_assoc();
        $harga = $data_menu['harga'];
        mysqli_query($conn, "
            INSERT INTO detailtransaksi(kode_transaksi, id_menu, harga, qty, total_harga)
            VALUES ($kode_trans, '$id_menu', $harga, $jumlah, ($harga*$jumlah))
        ");
    }

    unset($_SESSION["pesanan"]);
    echo "<script>alert('Pemesanan Sukses!');location='menu_pembeli.php'</script>";
}
?>

<hr class="footer">
<div class="container">
  <div class="row footer-body">
    <div class="col-md-6">
      <div class="copyright">
        <strong>Copyright</strong> <i class="far fa-copyright"></i> 2023 - Designed by Kelompok 4 Kelas D
      </div>
    </div>

    <div class="col-md-6 d-flex justify-content-end">
      <div class="icon-contact">
        <label class="font-weight-bold">Follow Us </label>
        <a href="#"><img src="img/icon/fb.png" class="mr-3 ml-4" data-toggle="tooltip" title="Facebook"></a>
        <a href="#"><img src="img/icon/ig.png" class="mr-3" data-toggle="tooltip" title="Instagram"></a>
        <a href="#"><img src="img/icon/twitter.png" data-toggle="tooltip" title="Twitter"></a>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
