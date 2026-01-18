<?php
session_start();
include('koneksi.php');

// Check if user logged in
if(!isset($_SESSION['username'])) {
    header("location: index.php");
    exit;
}

// Get parameters
$id_menu = isset($_GET['id_menu']) ? $_GET['id_menu'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Store anchor for redirect back
$anchor = '#menu-' . $id_menu;

if(empty($id_menu) || empty($action)) {
    $_SESSION['cart_notification'] = 'Parameter tidak lengkap!';
    header("location: menu_pembeli.php");
    exit;
}

// Initialize cart if not exists
if(!isset($_SESSION["pesanan"])) {
    $_SESSION["pesanan"] = array();
}

// Get menu data untuk cek stok
$query = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu='$id_menu'");
if(!$query || mysqli_num_rows($query) == 0) {
    $_SESSION['cart_notification'] = 'Menu tidak ditemukan!';
    header("location: menu_pembeli.php" . $anchor);
    exit;
}

$menu = mysqli_fetch_assoc($query);
$stok_tersedia = isset($menu['stok']) ? (int)$menu['stok'] : 0;
$current_qty = isset($_SESSION["pesanan"][$id_menu]) ? $_SESSION["pesanan"][$id_menu] : 0;

// Process action
if($action == 'plus') {
    // Check stock
    if($current_qty >= $stok_tersedia) {
        $_SESSION['cart_notification'] = 'Stok tidak mencukupi! Stok tersedia: ' . $stok_tersedia;
        header("location: menu_pembeli.php" . $anchor);
        exit;
    }
    
    // Add to cart
    if($current_qty > 0) {
        $_SESSION["pesanan"][$id_menu]++;
    } else {
        $_SESSION["pesanan"][$id_menu] = 1;
    }
    
    $_SESSION['cart_notification'] = $menu['nama_menu'] . ' ditambahkan ke keranjang!';
    
} elseif($action == 'minus') {
    // Decrease quantity
    if($current_qty > 0) {
        $_SESSION["pesanan"][$id_menu]--;
        
        // Remove if quantity becomes 0
        if($_SESSION["pesanan"][$id_menu] <= 0) {
            unset($_SESSION["pesanan"][$id_menu]);
            $_SESSION['cart_notification'] = $menu['nama_menu'] . ' dihapus dari keranjang!';
        } else {
            $_SESSION['cart_notification'] = 'Jumlah ' . $menu['nama_menu'] . ' dikurangi!';
        }
    }
} else {
    $_SESSION['cart_notification'] = 'Action tidak valid!';
}

// Redirect back to menu page with anchor to maintain scroll position
header("location: menu_pembeli.php" . $anchor);
exit;
?>
