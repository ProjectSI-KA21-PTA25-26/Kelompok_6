<?php
session_start();

// Cek apakah user sudah login
if(!isset($_SESSION['username'])) {
    header("location: Login.php");
    exit;
}

// Ambil parameter
$id_menu = $_GET['id_menu'];
$action = $_GET['action'];

// Pastikan pesanan ada
if(isset($_SESSION["pesanan"][$id_menu])) {
    
    if($action == 'plus') {
        // Tambah jumlah
        $_SESSION["pesanan"][$id_menu]++;
    } 
    elseif($action == 'minus') {
        // Kurangi jumlah
        $_SESSION["pesanan"][$id_menu]--;
        
        // Jika jumlah jadi 0 atau kurang, hapus item
        if($_SESSION["pesanan"][$id_menu] <= 0) {
            unset($_SESSION["pesanan"][$id_menu]);
        }
    }
}

// Redirect kembali ke halaman keranjang
header("location: pesanan_pembeli.php");
exit;
?>