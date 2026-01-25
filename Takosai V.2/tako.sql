-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2026 at 04:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tako`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `kode_transaksi` int(11) NOT NULL,
  `id_menu` varchar(20) NOT NULL,
  `harga` int(15) NOT NULL,
  `qty` int(15) NOT NULL,
  `total_harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`kode_transaksi`, `id_menu`, `harga`, `qty`, `total_harga`) VALUES
(1, '38', 10000, 1, 10000),
(1, '40', 20000, 4, 80000),
(1, '41', 30000, 1, 30000),
(1, '45', 30000, 1, 30000),
(2, '40', 20000, 1, 20000),
(2, '48', 10000, 2, 20000),
(2, '53', 15000, 2, 30000),
(3, '38', 10000, 1, 10000),
(3, '40', 20000, 2, 40000),
(3, '53', 15000, 2, 30000),
(4, '38', 10000, 2, 20000),
(4, '40', 20000, 1, 20000),
(4, '60', 33000, 2, 66000),
(5, '40', 20000, 4, 80000),
(5, '41', 30000, 2, 60000),
(6, '40', 20000, 1, 20000),
(6, '41', 30000, 1, 30000),
(6, '46', 40000, 2, 80000),
(7, '53', 15000, 1, 15000),
(8, '56', 24000, 1, 24000),
(8, '68', 8000, 1, 8000),
(9, '45', 30000, 1, 30000),
(9, '64', 33000, 1, 33000),
(10, '38', 10000, 5, 50000),
(11, '38', 10000, 5, 50000),
(12, '38', 10000, 5, 50000),
(13, '40', 20000, 2, 40000),
(13, '41', 30000, 2, 60000),
(13, '55', 16000, 6, 96000),
(14, '40', 20000, 1, 20000),
(15, '40', 20000, 5, 100000),
(15, '41', 30000, 7, 210000),
(15, '55', 16000, 4, 64000),
(16, '38', 10000, 4, 40000),
(16, '41', 30000, 1, 30000),
(16, '42', 40000, 1, 40000),
(16, '70', 20000, 2, 40000),
(17, '41', 30000, 2, 60000),
(17, '70', 20000, 5, 100000),
(18, '01', 10000, 1, 10000),
(18, '03', 10000, 1, 10000),
(18, '41', 30000, 2, 60000),
(19, '04', 10000, 1, 10000),
(19, '41', 30000, 1, 30000),
(20, '04', 10000, 1, 10000),
(20, '38', 10000, 6, 60000),
(20, '40', 20000, 2, 40000),
(20, '41', 30000, 3, 90000),
(20, '42', 40000, 4, 160000),
(21, '03', 10000, 1, 10000),
(21, '05', 10000, 1, 10000),
(21, '26', 9000, 1, 9000),
(21, '41', 30000, 7, 210000),
(21, '59', 22000, 8, 176000),
(22, '03', 10000, 1, 10000),
(22, '28', 5000, 1, 5000),
(22, '42', 40000, 2, 80000),
(22, '59', 22000, 2, 44000),
(23, '01', 10000, 1, 10000),
(23, '05', 10000, 1, 10000),
(23, '33', 4000, 1, 4000),
(23, '42', 40000, 1, 40000),
(24, '03', 10000, 1, 10000),
(24, '42', 40000, 1, 40000),
(25, '01', 10000, 1, 10000),
(25, '41', 30000, 1, 30000),
(26, '03', 10000, 1, 10000),
(26, '41', 30000, 3, 90000),
(26, '59', 22000, 1, 22000),
(27, '01', 10000, 1, 10000),
(27, '03', 10000, 1, 10000),
(27, '41', 30000, 6, 180000),
(27, '42', 40000, 2, 80000),
(27, '59', 22000, 6, 132000),
(27, '69', 8000, 2, 16000),
(28, '01', 10000, 1, 10000),
(29, '03', 10000, 1, 10000),
(30, '01', 10000, 1, 10000),
(31, '08', 11000, 1, 11000),
(31, '12', 10000, 1, 10000),
(32, '04', 10000, 1, 10000),
(33, '04', 10000, 1, 10000),
(33, '05', 10000, 1, 10000),
(33, '17', 9000, 1, 9000),
(34, '05', 10000, 1, 10000),
(34, '10', 10000, 1, 10000),
(34, '16', 11000, 1, 11000),
(34, '20', 9000, 1, 9000),
(35, '01', 10000, 2, 20000),
(36, '04', 10000, 1, 10000),
(36, '35', 5000, 1, 5000),
(36, '36', 10000, 1, 10000),
(37, '03', 10000, 2, 20000),
(37, '05', 10000, 1, 10000),
(37, '35', 5000, 1, 5000),
(38, '03', 10000, 1, 10000),
(38, '04', 10000, 1, 10000),
(39, '03', 10000, 1, 10000),
(40, '03', 10000, 1, 10000),
(40, '05', 10000, 1, 10000),
(41, '03', 10000, 1, 10000),
(41, '04', 10000, 1, 10000),
(42, '03', 10000, 1, 10000),
(43, '03', 10000, 1, 10000),
(44, '01', 10000, 1, 10000),
(45, '04', 10000, 1, 10000),
(46, '04', 10000, 1, 10000),
(46, '07', 11000, 1, 11000),
(48, '03', 10000, 1, 10000),
(48, '04', 10000, 1, 10000),
(49, '03', 10000, 3, 30000),
(49, '04', 10000, 1, 10000),
(50, '01', 10000, 2, 20000),
(50, '03', 10000, 1, 10000),
(51, '04', 10000, 1, 10000),
(52, '03', 10000, 1, 10000),
(53, '03', 10000, 1, 10000),
(54, '03', 10000, 1, 10000),
(55, '33', 4000, 1, 4000),
(55, '37', 5000, 2, 10000),
(56, '04', 10000, 2, 20000),
(57, '40', 20000, 1, 20000),
(58, '40', 20000, 1, 20000),
(59, '41', 30000, 1, 30000),
(59, '42', 40000, 1, 40000),
(60, '40', 20000, 1, 20000),
(61, '41', 30000, 1, 30000),
(62, '41', 30000, 1, 30000),
(63, '41', 30000, 1, 30000),
(63, '54', 20000, 1, 20000),
(63, '64', 33000, 1, 33000),
(64, '40', 20000, 2, 40000),
(65, '41', 30000, 1, 30000),
(65, '42', 40000, 1, 40000),
(65, '44', 20000, 1, 20000),
(65, '49', 15000, 1, 15000),
(66, '64', 33000, 1, 33000),
(66, '68', 8000, 2, 16000),
(67, '40', 20000, 3, 60000),
(68, '44', 20000, 1, 20000),
(68, '55', 16000, 1, 16000),
(69, '44', 20000, 3, 60000),
(70, '40', 20000, 2, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(20) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga` int(15) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `stok` int(11) DEFAULT 0,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga`, `kategori`, `stok`, `gambar`) VALUES
('38', 'Takoyaki Gurita (5Pcs)', 10000, 'takoyaki', 0, 'gurita.svg'),
('39', 'Dimsum Original (4Pcs)', 8000, 'dimsum', 0, 'ori.svg'),
('40', 'Takoyaki Gurita (10Pcs)', 20000, 'takoyaki', 0, 'gurita.svg'),
('41', 'Takoyaki Gurita (15Pcs)', 30000, 'takoyaki', 15, 'gurita.svg'),
('42', 'Takoyaki Gurita (20Pcs)', 40000, 'takoyaki', 0, 'gurita.svg'),
('43', 'Takoyaki Moza (5Pcs)', 10000, 'takoyaki', 0, 'keju.svg'),
('44', 'Takoyaki Moza (10Pcs)', 20000, 'takoyaki', 0, 'keju.svg'),
('45', 'Takoyaki Moza (15Pcs)', 30000, 'takoyaki', 0, 'keju.svg'),
('46', 'Takoyaki Moza (20Pcs)', 40000, 'takoyaki', 0, 'keju.svg'),
('47', 'Takoyaki Sosis (5Pcs)', 5000, 'takoyaki', 0, 'sosis.svg'),
('48', 'Takoyaki Sosis (10Pcs)', 10000, 'takoyaki', 0, 'sosis.svg'),
('49', 'Takoyaki Sosis (15Pcs)', 15000, 'takoyaki', 0, 'sosis.svg'),
('50', 'Takoyaki Sosis (20Pcs)', 20000, 'takoyaki', 0, 'sosis.svg'),
('51', 'Takoyaki Bakso (5Pcs)', 5000, 'takoyaki', 0, 'bakso.svg'),
('52', 'Takoyaki Bakso (10Pcs)', 10000, 'takoyaki', 0, 'bakso.svg'),
('53', 'Takoyaki Bakso (15Pcs)', 15000, 'takoyaki', 0, 'bakso.svg'),
('55', 'Dimsum Original (8Pcs)', 16000, 'dimsum', 0, 'ori.svg'),
('56', 'Dimsum Original (12Pcs)', 24000, 'dimsum', 0, 'ori.svg'),
('57', 'Dimsum Original (16Pcs)', 32000, 'dimsum', 0, 'ori.svg'),
('58', 'Dimsum Moza (4Pcs)', 11000, 'dimsum', 0, 'dimsum keju.svg'),
('59', 'Dimsum Moza (8Pcs)', 22000, 'dimsum', 3, 'dimsum keju.svg'),
('60', 'Dimsum Moza (12Pcs)', 33000, 'dimsum', 0, 'dimsum keju.svg'),
('61', 'Dimsum Moza (16Pcs)', 44000, 'dimsum', 0, 'dimsum keju.svg'),
('62', 'Dimsum Mentai (4Pcs)', 11000, 'dimsum', 0, 'mentai.svg'),
('63', 'Dimsum Mentai (8Pcs)', 22000, 'dimsum', 0, 'mentai.svg'),
('64', 'Dimsum Mentai (12Pcs)', 33000, 'dimsum', 0, 'mentai.svg'),
('65', 'Dimsum Mentai (16Pcs)', 44000, 'dimsum', 0, 'mentai.svg'),
('66', 'Air Mineral', 5000, 'minuman', 0, 'aer.svg'),
('67', 'Es Teh ', 5000, 'minuman', 0, 'es teh.svg'),
('68', 'Es Milo', 8000, 'minuman', 0, 'milo.svg'),
('69', 'Es Jeruk', 8000, 'minuman', 9, 'es jeruk.svg'),
('70', 'Takoyaki Bakso (20Pcs)', 20000, 'takoyaki', 3, 'bakso.svg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` int(11) NOT NULL,
  `nama_pembeli` varchar(100) DEFAULT NULL,
  `metode_pembayaran` varchar(20) DEFAULT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `status_kitchen` int(1) NOT NULL DEFAULT 1,
  `keterangan` varchar(20) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `nama_pembeli`, `metode_pembayaran`, `tanggal_transaksi`, `status`, `status_kitchen`, `keterangan`, `total`) VALUES
(1, 'rafi', 'QRIS', '2026-01-06 05:52:09', 1, 1, 'Dine In', 0),
(2, 'apip', 'Cash', '2026-01-06 05:55:03', 1, 1, 'Dine In', 0),
(3, 'apip', 'Cash', '2026-01-06 05:55:07', 1, 1, 'Dine In', 0),
(4, 'rafi', 'QRIS', '2026-01-06 05:58:52', 1, 1, 'Dine In', 0),
(5, 'rafii', 'QRIS', '2026-01-06 05:59:01', 1, 1, 'Dine In', 0),
(6, 'asuyy', 'Cash', '2026-01-06 05:59:40', 1, 1, 'Dine In', 0),
(7, 'meow', 'Cash', '2026-01-06 06:00:25', 1, 1, 'Dine In', 0),
(8, 'kuntii', 'QRIS', '2026-01-06 06:00:54', 1, 1, 'Dine In', 0),
(9, 'kiwi', 'QRIS', '2026-01-06 07:49:19', 1, 1, 'Dine In', 0),
(10, 'hanif', 'QRIS', '2026-01-06 14:09:35', 1, 1, 'Dine In', 0),
(11, 'huhu', 'Cash', '2026-01-06 14:23:49', 1, 1, 'Dine In', 0),
(12, 'rafskuy', 'Cash', '2026-01-06 14:24:23', 1, 1, 'Dine In', 0),
(13, 'orkay', 'Cash', '2026-01-06 14:36:57', 1, 1, 'Dine In', 0),
(14, 'hay', 'Cash', '2026-01-06 14:37:37', 1, 1, 'Dine In', 0),
(15, 'hadehhh', 'QRIS', '2026-01-06 14:51:13', 1, 1, 'Dine In', 0),
(16, 'dasdasd', 'QRIS', '2026-01-06 15:38:43', 1, 1, 'Dine In', 0),
(17, 'rafi orkay', 'QRIS', '2026-01-06 16:04:21', 1, 1, 'Dine In', 0),
(18, 'daffa ganteng', 'Cash', '2026-01-06 16:05:29', 1, 1, 'Dine In', 0),
(19, 'asdfas', 'QRIS', '2026-01-06 16:10:06', 1, 1, 'Dine In', 0),
(20, 'mas mas ', 'QRIS', '2026-01-07 14:24:20', 1, 1, 'Dine In', 0),
(21, 'haniffa', 'QRIS', '2026-01-07 14:41:25', 1, 1, 'Dine In', 0),
(22, 'hayyy', 'QRIS', '2026-01-07 14:51:58', 1, 1, 'Dine In', 0),
(23, 'dafffffffffffffff', 'Cash', '2026-01-07 14:54:42', 1, 1, 'Dine In', 0),
(24, 'rafi', 'Cash', '2026-01-07 15:04:18', 1, 1, 'Dine In', 0),
(25, 'asdasdsa', 'Cash', '2026-01-07 15:09:37', 1, 1, 'Dine In', 0),
(26, 'wsfdsa', 'Cash', '2026-01-07 15:28:18', 1, 1, 'Dine In', 0),
(27, 'etgew', 'Cash', '2026-01-07 15:32:53', 1, 1, 'Dine In', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_temporary`
--

CREATE TABLE `transaksi_temporary` (
  `no_meja` varchar(5) NOT NULL,
  `nama_pelanggan` varchar(10) NOT NULL,
  `kode_transaksi` int(11) NOT NULL,
  `id_menu` varchar(20) NOT NULL,
  `harga` int(15) NOT NULL,
  `qty` int(15) NOT NULL,
  `total_harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_temporary`
--

INSERT INTO `transaksi_temporary` (`no_meja`, `nama_pelanggan`, `kode_transaksi`, `id_menu`, `harga`, `qty`, `total_harga`) VALUES
('21', 'rizki', 1, '01', 10000, 1, 10000),
('21', 'rizki', 1, '02', 10000, 1, 10000),
('1', 'qwerty', 2, '01', 10000, 1, 10000),
('1', 'qwerty', 2, '02', 10000, 2, 20000),
('1', 'qwerty', 2, '05', 10000, 2, 20000),
('11', 'asdfg', 3, '01', 10000, 1, 10000),
('10', 'bnm', 6, '18', 9000, 2, 18000),
('56', 'fgh', 7, '23', 9000, 2, 18000),
('34', 'tyui', 8, '01', 10000, 1, 10000),
('34', 'tyui', 8, '02', 10000, 1, 10000),
('78', 'bola', 9, '10', 10000, 2, 20000),
('78', 'bola', 9, '17', 9000, 1, 9000),
('99', 'rty', 10, '01', 10000, 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(8) NOT NULL,
  `status` char(9) NOT NULL DEFAULT 'customer',
  `alamat` text NOT NULL,
  `no_hp` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `status`, `alamat`, `no_hp`) VALUES
(24, 'rafi', 'rafi', '', '', ''),
(25, 'dela', 'dela', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD PRIMARY KEY (`kode_transaksi`,`id_menu`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `transaksi_temporary`
--
ALTER TABLE `transaksi_temporary`
  ADD PRIMARY KEY (`kode_transaksi`,`id_menu`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
