<?php 

include('koneksi.php');

$id = $_GET['id'];

$hapus= mysqli_query($conn, "DELETE FROM detailtransaksi WHERE kode_transaksi='$id'");
$hapus= mysqli_query($conn, "DELETE FROM transaksi WHERE kode_transaksi='$id'");
// $hapus= mysqli_query($conn, "DELETE FROM transaksi_temporary WHERE id_pemesanan='$id'");

if($hapus)
	header('location: pesanan.php');
else
	echo "Hapus data gagal";

 ?>