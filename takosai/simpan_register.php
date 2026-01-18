<?php
// Include file koneksi ke database
include "koneksi.php";

// Cek apakah data dikirim dari form (mencegah akses langsung ke file ini)
if (isset($_POST['username'])) {

    // 1. Ambil data & Amankan dari SQL Injection (Security untuk Testing)
    // Fungsi mysqli_real_escape_string() membersihkan karakter aneh yang bisa merusak database
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $alamat   = mysqli_real_escape_string($conn, $_POST["alamat"]);
    $hp       = mysqli_real_escape_string($conn, $_POST["hp"]);
    $status   = mysqli_real_escape_string($conn, $_POST["status"]);

    // 2. LOGIKA UTAMA: Cek apakah Username sudah ada? (Revisi Dosen)
    $cek_username = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    // Jika username ditemukan (jumlah baris > 0), tolak pendaftaran
    if (mysqli_num_rows($cek_username) > 0) {
        echo "<script>
                alert('GAGAL: Username sudah terdaftar! Silakan gunakan username lain.');
                document.location='register.php';
              </script>";
        exit; // Hentikan script agar tidak lanjut menyimpan
    }

    // 3. Jika Username belum ada, lanjut simpan ke database
    $query_insert = "INSERT INTO users (username, password, status, alamat, no_hp) 
                     VALUES ('$username', '$password', '$status', '$alamat', '$hp')";
    
    $hasil = mysqli_query($conn, $query_insert);

    // 4. Cek hasil penyimpanan
    if ($hasil) {
        echo "<script>
                alert('Registrasi Berhasil! Silakan Login.');
                document.location='index.php';
              </script>";
    } else {
        // Tampilkan error spesifik jika terjadi kesalahan sistem (opsional, untuk debugging)
        // echo mysqli_error($conn); 
        echo "<script>
                alert('Registrasi Gagal! Terjadi kesalahan sistem.');
                document.location='register.php';
              </script>";
    }

} else {
    // Jika user mencoba buka file ini tanpa lewat form register
    header("Location: register.php");
    exit;
}
?>
