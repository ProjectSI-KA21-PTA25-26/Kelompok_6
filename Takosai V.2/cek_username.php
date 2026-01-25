<?php
include 'koneksi.php';

if (isset($_POST['username'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    
    // Cek di tabel users 
    $query = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    
    if (mysqli_num_rows($query) > 0) {
        echo "ada"; // Username sudah terpakai
    } else {
        echo "aman"; // Username tersedia
    }
}
?>