<?php
include 'koneksi.php';

if(isset($_POST['tambah'])){
    $id_menu = $_POST['id_menu'];
    $nama_menu = mysqli_real_escape_string($conn, $_POST['nama_menu']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    $stok = mysqli_real_escape_string($conn, $_POST['stok']);
    
    // Cek apakah ada upload gambar baru
    if($_FILES['gambar']['name'] != ''){
        $nama_file = $_FILES['gambar']['name'];
        $source = $_FILES['gambar']['tmp_name'];
        $folder = './img/';
        
        move_uploaded_file($source, $folder.$nama_file);
        
        // Update dengan gambar baru
        $update = mysqli_query($conn, "UPDATE menu SET 
                                       nama_menu='$nama_menu', 
                                       harga='$harga', 
                                       stok='$stok',
                                       gambar='$nama_file' 
                                       WHERE id_menu='$id_menu'");
    } else {
        // Update tanpa gambar
        $update = mysqli_query($conn, "UPDATE menu SET 
                                       nama_menu='$nama_menu', 
                                       harga='$harga',
                                       stok='$stok'
                                       WHERE id_menu='$id_menu'");
    }
    
    if($update){
        echo "<script>alert('Menu berhasil diupdate!'); window.location='daftar_menu.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate menu!'); window.location='daftar_menu.php';</script>";
    }
}
?>
