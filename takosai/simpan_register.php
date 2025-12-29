<?php
//Include file koneksi ke database
include "koneksi.php";

//menerima nilai dari kiriman form pendaftaran
$username=$_POST["username"];
$password=$_POST["password"]; //untuk password digunakan enskripsi md5
$alamat=$_POST["alamat"];
$hp=$_POST["hp"];
$status=$_POST["status"];



//Menginput data ke tabel
$hasil=mysqli_query($conn, "INSERT INTO users (username, password, status, alamat, no_hp) 
													 VALUES('$username', '$password', '$status', '$alamat', '$hp')");

//Kondisi apakah berhasil atau tidak
if ($hasil) {
echo "<script>
			alert('Anda Berhasil Registrasi !');
			document.location='index.php';
		</script>";
}else {
echo "<script>
			alert('Registrasi Anda Gagal !');
			document.location='register.php';
		</script>";
}

?>