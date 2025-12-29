-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2025 at 01:24 PM
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
-- Database: `fppbw`
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
(18, '01', 10000, 1, 10000),
(18, '03', 10000, 1, 10000),
(19, '04', 10000, 1, 10000),
(20, '04', 10000, 1, 10000),
(21, '03', 10000, 1, 10000),
(21, '05', 10000, 1, 10000),
(21, '26', 9000, 1, 9000),
(22, '03', 10000, 1, 10000),
(22, '28', 5000, 1, 5000),
(23, '01', 10000, 1, 10000),
(23, '05', 10000, 1, 10000),
(23, '33', 4000, 1, 4000),
(24, '03', 10000, 1, 10000),
(25, '01', 10000, 1, 10000),
(26, '03', 10000, 1, 10000),
(27, '01', 10000, 1, 10000),
(27, '03', 10000, 1, 10000),
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
(66, '68', 8000, 2, 16000);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(20) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga` int(15) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga`, `kategori`, `gambar`) VALUES
('38', 'Takoyaki Gurita (5Pcs)', 10000, 'takoyaki', 'gurita.svg'),
('39', 'Dimsum Original (4Pcs)', 8000, 'dimsum', 'ori.svg'),
('40', 'Takoyaki Gurita (10Pcs)', 20000, 'takoyaki', 'gurita.svg'),
('41', 'Takoyaki Gurita (15Pcs)', 30000, 'takoyaki', 'gurita.svg'),
('42', 'Takoyaki Gurita (20Pcs)', 40000, 'takoyaki', 'gurita.svg'),
('43', 'Takoyaki Moza (5Pcs)', 10000, 'takoyaki', 'keju.svg'),
('44', 'Takoyaki Moza (10Pcs)', 20000, 'takoyaki', 'keju.svg'),
('45', 'Takoyaki Moza (15Pcs)', 30000, 'takoyaki', 'keju.svg'),
('46', 'Takoyaki Moza (20Pcs)', 40000, 'takoyaki', 'keju.svg'),
('47', 'Takoyaki Sosis (5Pcs)', 5000, 'takoyaki', 'sosis.svg'),
('48', 'Takoyaki Sosis (10Pcs)', 10000, 'takoyaki', 'sosis.svg'),
('49', 'Takoyaki Sosis (15Pcs)', 15000, 'takoyaki', 'sosis.svg'),
('50', 'Takoyaki Sosis (20Pcs)', 20000, 'takoyaki', 'sosis.svg'),
('51', 'Takoyaki Bakso (5Pcs)', 5000, 'takoyaki', 'bakso.svg'),
('52', 'Takoyaki Bakso (10Pcs)', 10000, 'takoyaki', 'bakso.svg'),
('53', 'Takoyaki Bakso (15Pcs)', 15000, 'takoyaki', 'bakso.svg'),
('54', 'Takoyaki Bakso (20Pcs)', 20000, 'takoyaki', 'bakso.svg'),
('55', 'Dimsum Original (8Pcs)', 16000, 'dimsum', 'ori.svg'),
('56', 'Dimsum Original (12Pcs)', 24000, 'dimsum', 'ori.svg'),
('57', 'Dimsum Original (16Pcs)', 32000, 'dimsum', 'ori.svg'),
('58', 'Dimsum Moza (4Pcs)', 11000, 'dimsum', 'dimsum keju.svg'),
('59', 'Dimsum Moza (8Pcs)', 22000, 'dimsum', 'dimsum keju.svg'),
('60', 'Dimsum Moza (12Pcs)', 33000, 'dimsum', 'dimsum keju.svg'),
('61', 'Dimsum Moza (16Pcs)', 44000, 'dimsum', 'dimsum keju.svg'),
('62', 'Dimsum Mentai (4Pcs)', 11000, 'dimsum', 'mentai.svg'),
('63', 'Dimsum Mentai (8Pcs)', 22000, 'dimsum', 'mentai.svg'),
('64', 'Dimsum Mentai (12Pcs)', 33000, 'dimsum', 'mentai.svg'),
('65', 'Dimsum Mentai (16Pcs)', 44000, 'dimsum', 'mentai.svg'),
('66', 'Air Mineral', 5000, 'minuman', 'aer.svg'),
('67', 'Es Teh ', 5000, 'minuman', 'es teh.svg'),
('68', 'Es Milo', 8000, 'minuman', 'milo.svg'),
('69', 'Es Jeruk', 8000, 'minuman', 'es jeruk.svg');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `pegawai_nama` varchar(10) NOT NULL,
  `pegawai_umur` int(11) NOT NULL,
  `pegawai_alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `pegawai_nama`, `pegawai_umur`, `pegawai_alamat`) VALUES
(1, 'Argono Irn', 29, 'Dk. Astana Anyar No. 792, Surakarta 71336, KalSel'),
(2, 'Cakrawangs', 28, 'Ki. Sukajadi No. 450, Sibolga 98910, JaBar'),
(3, 'Wardaya Pa', 26, 'Ki. Soekarno Hatta No. 774, Cimahi 85529, SulBar'),
(4, 'Asmianto T', 26, 'Jln. Nakula No. 542, Mataram 80011, Riau'),
(5, 'Jasmin Sar', 26, 'Psr. Gedebage Selatan No. 951, Ambon 51142, KalTim'),
(6, 'Banawi Sim', 25, 'Gg. Salatiga No. 497, Jayapura 14109, SumSel'),
(7, 'Amalia Dia', 31, 'Dk. Sugiyopranoto No. 926, Jambi 61860, SumUt'),
(8, 'Abyasa Hut', 38, 'Dk. Teuku Umar No. 824, Lhokseumawe 14676, MalUt'),
(9, 'Tina Nasyi', 33, 'Ds. Bacang No. 28, Gorontalo 73123, DIY'),
(10, 'Dartono Sa', 32, 'Gg. Kartini No. 647, Cimahi 94574, Banten'),
(11, 'Widya Suci', 25, 'Kpg. Bahagia No. 878, Kotamobagu 98264, Lampung'),
(12, 'Akarsana H', 34, 'Jln. Ki Hajar Dewantara No. 423, Bekasi 53736, NTT'),
(13, 'Titi Oktav', 27, 'Jr. HOS. Cjokroaminoto (Pasirkaliki) No. 7, Bogor 39146, DKI'),
(14, 'Samiah Rah', 33, 'Dk. Sumpah Pemuda No. 925, Administrasi Jakarta Selatan 22713, Riau'),
(15, 'Cinta Wula', 34, 'Kpg. Suryo Pranoto No. 595, Administrasi Jakarta Barat 18262, KepR'),
(16, 'Tantri Pad', 29, 'Kpg. Dewi Sartika No. 986, Kendari 88205, KalBar'),
(17, 'Bakda Sito', 35, 'Dk. Basket No. 661, Banjarmasin 61607, BaBel'),
(18, 'Ophelia Nu', 30, 'Jln. Peta No. 488, Semarang 68924, SumUt'),
(19, 'Taufan Pra', 31, 'Jr. Ketandan No. 991, Palembang 26686, SumUt'),
(20, 'Safina Kas', 36, 'Jr. Baranang Siang No. 801, Tidore Kepulauan 36022, KalUt'),
(21, 'Padmi Auro', 36, 'Dk. Bakaru No. 833, Bima 63207, KalSel'),
(22, 'Yani Purna', 40, 'Dk. Taman No. 47, Bogor 96969, PapBar'),
(23, 'Unjani Has', 36, 'Jln. Suharso No. 381, Tanjung Pinang 68019, SumBar'),
(24, 'Yessi Muly', 33, 'Kpg. Bara Tambar No. 849, Gunungsitoli 19942, Bali'),
(25, 'Hasna Kusm', 34, 'Jln. Haji No. 970, Metro 83489, SulTeng'),
(26, 'Rafid Maul', 36, 'Dk. Sutarto No. 761, Banda Aceh 83637, JaTim'),
(27, 'Rina Namag', 37, 'Jr. Veteran No. 549, Sawahlunto 86698, NTB'),
(28, 'Tari Salsa', 35, 'Ki. K.H. Wahid Hasyim (Kopo) No. 806, Subulussalam 67572, SulSel'),
(29, 'Karsa Tari', 34, 'Psr. Bacang No. 897, Banjarmasin 55333, NTT'),
(30, 'Ilyas Zulk', 38, 'Ki. Sumpah Pemuda No. 722, Madiun 84457, PapBar'),
(31, 'Ophelia Su', 28, 'Gg. Monginsidi No. 423, Administrasi Jakarta Selatan 99826, Bali'),
(32, 'Edison Sin', 35, 'Jr. Yap Tjwan Bing No. 280, Bontang 70691, JaTim'),
(33, 'Ghaliyati ', 30, 'Psr. Otista No. 486, Pontianak 13616, Lampung'),
(34, 'Jamalia Pe', 39, 'Jr. Mulyadi No. 793, Administrasi Jakarta Utara 96480, JaTeng'),
(35, 'Pardi Siho', 28, 'Kpg. Baranang No. 155, Padangsidempuan 73382, SulTra'),
(36, 'Ihsan Arsi', 40, 'Dk. Bara No. 905, Palembang 62740, KalSel'),
(37, 'Gada Narpa', 39, 'Ki. Samanhudi No. 365, Pagar Alam 17531, SulBar'),
(38, 'Jaga Utama', 35, 'Gg. Otto No. 10, Tidore Kepulauan 85647, KalTeng'),
(39, 'Prayitna K', 30, 'Ki. Supono No. 618, Yogyakarta 60308, Banten'),
(40, 'Jelita Nam', 29, 'Ds. Batako No. 115, Tanjungbalai 62921, NTT'),
(41, 'Tomi Sitom', 35, 'Gg. Samanhudi No. 231, Balikpapan 35414, SumSel'),
(42, 'Malika Nur', 39, 'Ds. Pacuan Kuda No. 851, Kupang 94061, KalTeng'),
(43, 'Dadi Lazua', 27, 'Jr. Acordion No. 844, Cimahi 37923, KalBar'),
(44, 'Dacin Suwa', 29, 'Jln. Basoka No. 188, Payakumbuh 34164, SulTeng'),
(45, 'Ibrani Sam', 34, 'Ds. Radio No. 344, Semarang 15878, SumBar'),
(46, 'Iriana Sus', 35, 'Jln. Barat No. 686, Batam 92165, Bengkulu'),
(47, 'Laras Hand', 31, 'Ds. Tentara Pelajar No. 395, Pematangsiantar 25208, SulSel'),
(48, 'Halim Dadi', 40, 'Kpg. Setia Budi No. 220, Tanjungbalai 46333, SulTra'),
(49, 'Nadia Novi', 30, 'Psr. Kartini No. 179, Cimahi 52791, KalBar'),
(50, 'Zaenab Han', 40, 'Psr. Gambang No. 784, Gunungsitoli 46085, SumUt'),
(51, 'Ajimat Nap', 35, 'Kpg. Banal No. 84, Medan 72330, KepR'),
(52, 'Anastasia ', 34, 'Psr. Dipenogoro No. 430, Jayapura 47483, KepR'),
(53, 'Olivia Yul', 29, 'Ds. Baabur Royan No. 90, Singkawang 92485, Bali'),
(54, 'Devi Devi ', 36, 'Gg. Lada No. 653, Tebing Tinggi 45925, SulSel'),
(55, 'Kenzie Nab', 37, 'Dk. Bank Dagang Negara No. 948, Yogyakarta 80270, SulTra'),
(56, 'Agnes Zali', 28, 'Dk. Muwardi No. 969, Padangpanjang 48439, JaBar'),
(57, 'Tiara Juli', 33, 'Ds. M.T. Haryono No. 439, Binjai 32732, KalTeng'),
(58, 'Tedi Iswah', 38, 'Jr. Suryo Pranoto No. 736, Tual 65156, SulSel'),
(59, 'Artawan Ca', 35, 'Gg. Lada No. 186, Mojokerto 69259, KepR'),
(60, 'Aurora Kan', 35, 'Gg. Agus Salim No. 652, Payakumbuh 32366, KalTeng'),
(61, 'Oskar Hida', 34, 'Jln. Tubagus Ismail No. 886, Administrasi Jakarta Utara 53067, KalBar'),
(62, 'Maria Fuji', 39, 'Kpg. Yoga No. 314, Pasuruan 43473, MalUt'),
(63, 'Muhammad S', 37, 'Dk. Jaksa No. 423, Palembang 72779, Lampung'),
(64, 'Vicky Ayu ', 40, 'Jln. Bagonwoto  No. 413, Denpasar 71467, KepR'),
(65, 'Hesti Raha', 33, 'Kpg. Kiaracondong No. 813, Ambon 41846, KalUt'),
(66, 'Restu Ajen', 37, 'Psr. Baabur Royan No. 186, Solok 39178, NTT'),
(67, 'Empluk Har', 34, 'Ki. Basuki No. 485, Payakumbuh 80122, SulTeng'),
(68, 'Wulan Laks', 30, 'Kpg. Salam No. 434, Bogor 50284, DIY'),
(69, 'Bahuraksa ', 27, 'Ki. Zamrud No. 189, Binjai 78456, DIY'),
(70, 'Putri Wula', 35, 'Jr. Salak No. 676, Kediri 15270, Bali'),
(71, 'Marsito Ar', 25, 'Ki. K.H. Wahid Hasyim (Kopo) No. 604, Ambon 70950, MalUt'),
(72, 'Luthfi Kaw', 35, 'Jln. Tambak No. 204, Padangsidempuan 90294, Riau'),
(73, 'Ciaobella ', 27, 'Jr. Babadan No. 934, Medan 77373, SumBar'),
(74, 'Suci Yani ', 28, 'Jln. Sukabumi No. 938, Solok 92218, KalTim'),
(75, 'Hamima Eka', 37, 'Gg. Sutarto No. 289, Samarinda 60394, BaBel'),
(76, 'Satya Huta', 40, 'Dk. Bak Air No. 879, Administrasi Jakarta Timur 51646, DIY'),
(77, 'Cinta Kani', 29, 'Ki. Otto No. 221, Palu 72775, Papua'),
(78, 'Ismail Hut', 27, 'Jr. Raden No. 112, Depok 28389, Papua'),
(79, 'Gilang Dar', 27, 'Jln. Dago No. 831, Binjai 48400, PapBar'),
(80, 'Salimah Wu', 38, 'Dk. Bahagia No. 763, Surabaya 60953, SulSel'),
(81, 'Clara Fari', 34, 'Gg. Basuki Rahmat  No. 643, Pontianak 74357, SulTra'),
(82, 'Maimunah Y', 35, 'Dk. Muwardi No. 499, Bandung 19816, KalSel'),
(83, 'Edison Nug', 30, 'Dk. Baranang Siang Indah No. 841, Sibolga 33702, Banten'),
(84, 'Pranawa Ga', 31, 'Kpg. Bakit  No. 71, Malang 38095, SumSel'),
(85, 'Puput Rahi', 38, 'Jr. Jagakarsa No. 589, Malang 56511, DIY'),
(86, 'Bahuraksa ', 30, 'Ds. Babadak No. 113, Tangerang 84089, Jambi'),
(87, 'Lantar Pan', 33, 'Kpg. Basuki No. 296, Sabang 50042, NTT'),
(88, 'Rahmi Rahi', 34, 'Jln. Abdullah No. 670, Dumai 62822, Lampung'),
(89, 'Surya Angg', 38, 'Ki. Setia Budi No. 598, Administrasi Jakarta Selatan 19725, Banten'),
(90, 'Aditya Dar', 37, 'Ki. Cikutra Barat No. 529, Dumai 49536, Riau'),
(91, 'Balangga D', 34, 'Jln. Ekonomi No. 488, Pangkal Pinang 27486, SulSel'),
(92, 'Vera Astut', 25, 'Gg. Pahlawan No. 797, Ambon 69504, KepR'),
(93, 'Banawa Mau', 35, 'Dk. Supono No. 541, Jayapura 24658, SumUt'),
(94, 'Sarah Shak', 32, 'Jln. Kusmanto No. 705, Sukabumi 47392, KalTeng'),
(95, 'Zizi Zalin', 30, 'Dk. Aceh No. 531, Pangkal Pinang 48007, KepR'),
(96, 'Fitria Rah', 32, 'Jln. W.R. Supratman No. 968, Padangpanjang 36910, SulUt'),
(97, 'Hendri Sih', 27, 'Dk. W.R. Supratman No. 8, Banjar 88035, Riau'),
(98, 'Wirda Pert', 28, 'Dk. Katamso No. 736, Banjarbaru 32227, KalTeng'),
(99, 'Mitra Adit', 39, 'Jr. Tambak No. 625, Blitar 24392, KepR'),
(100, 'Karsa Lutf', 40, 'Jln. Orang No. 445, Tanjung Pinang 88858, KalBar');

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
(18, NULL, NULL, '2025-10-07 13:48:38', 1, 1, 'Dine In', 0),
(19, NULL, NULL, '2025-10-07 13:51:35', 1, 1, 'Dine In', 0),
(20, NULL, NULL, '2025-10-07 13:51:58', 1, 1, 'Dine In', 0),
(21, NULL, NULL, '2025-10-07 14:22:34', 1, 1, 'Dine In', 0),
(22, NULL, NULL, '2025-10-07 14:32:12', 1, 1, 'Dine In', 0),
(23, NULL, NULL, '2025-10-07 14:57:09', 1, 1, 'Dine In', 0),
(24, NULL, NULL, '2025-10-10 10:19:25', 1, 1, 'Dine In', 0),
(25, NULL, NULL, '2025-10-13 15:16:23', 1, 1, 'Dine In', 0),
(26, NULL, NULL, '2025-10-13 15:17:13', 1, 1, 'Dine In', 0),
(27, NULL, NULL, '2025-10-13 15:24:32', 1, 1, 'Dine In', 0),
(28, NULL, NULL, '2025-10-14 10:59:06', 1, 1, 'Dine In', 0),
(29, NULL, NULL, '2025-10-14 11:31:23', 1, 1, 'Dine In', 0),
(30, 'nipskuy', NULL, '2025-10-14 12:27:45', 1, 1, 'Dine In', 0),
(31, 'dafa', NULL, '2025-10-14 12:34:29', 1, 1, 'Dine In', 0),
(32, 'rafi', NULL, '2025-10-14 12:38:48', 1, 1, 'Dine In', 0),
(33, '', NULL, '2025-10-14 12:40:14', 1, 1, 'Dine In', 0),
(34, 'saipul', NULL, '2025-10-14 12:41:48', 1, 1, 'Dine In', 0),
(35, 'poni', NULL, '2025-10-15 03:19:16', 1, 1, 'Dine In', 0),
(36, 'voni', NULL, '2025-10-15 03:28:08', 1, 1, 'Dine In', 0),
(37, 'bege poni', NULL, '2025-10-17 14:54:38', 1, 1, 'Dine In', 0),
(38, 'ucp', NULL, '2025-10-20 04:14:24', 1, 1, 'Dine In', 0),
(39, 'saipoull', '', '2025-10-30 07:31:07', 1, 1, 'Dine In', 0),
(40, 'anis', '', '2025-10-30 07:43:34', 1, 1, 'Dine In', 0),
(41, 'sadasdasd', '', '2025-10-30 08:01:57', 1, 1, 'Dine In', 0),
(42, 'ASa', '', '2025-10-30 08:23:45', 1, 1, 'Dine In', 0),
(43, 'siirr', '', '2025-10-30 08:29:19', 1, 1, 'Dine In', 0),
(44, 'asdasdasd', '', '2025-10-30 08:30:53', 1, 1, 'Dine In', 0),
(45, 'asuyy', 'Cash', '2025-10-30 08:33:41', 1, 1, 'Dine In', 0),
(46, 'tenxi', 'QRIS', '2025-10-30 08:41:51', 1, 1, 'Dine In', 0),
(47, 'tenxi', 'QRIS', '2025-10-30 08:41:51', 1, 1, 'Dine In', 0),
(48, 'daffffa', 'QRIS', '2025-10-31 07:41:04', 1, 1, 'Dine In', 0),
(49, 'apip', 'Cash', '2025-10-31 07:59:20', 1, 1, 'Dine In', 0),
(50, 'dafa', 'QRIS', '2025-11-02 07:23:21', 1, 1, 'Dine In', 0),
(51, 'meow', 'Cash', '2025-11-02 13:51:24', 1, 1, 'Dine In', 0),
(52, 'kiw', 'Cash', '2025-11-02 14:00:42', 1, 1, 'Dine In', 0),
(53, 'cihuy', 'Cash', '2025-11-02 14:01:10', 1, 1, 'Dine In', 0),
(54, 'jaya', 'QRIS', '2025-11-03 05:38:48', 1, 1, 'Dine In', 0),
(55, 'ipul', 'QRIS', '2025-11-12 09:32:23', 1, 1, 'Dine In', 0),
(56, 'tenxi', 'QRIS', '2025-11-13 09:03:39', 1, 1, 'Dine In', 0),
(57, 'asuyy', 'Cash', '2025-11-13 10:36:35', 1, 1, 'Dine In', 0),
(58, 'sdas', 'Cash', '2025-11-13 10:37:28', 1, 1, 'Dine In', 0),
(59, 'dsad', 'Cash', '2025-11-13 10:37:42', 1, 1, 'Dine In', 0),
(60, 'sdassd', 'Cash', '2025-11-13 10:37:49', 1, 1, 'Dine In', 0),
(61, 'apip', 'Cash', '2025-11-14 11:32:45', 1, 1, 'Dine In', 0),
(62, 'meow', 'Cash', '2025-11-14 11:36:35', 1, 1, 'Dine In', 0),
(63, 'asepp', 'Cash', '2025-11-14 11:47:53', 1, 1, 'Dine In', 0),
(64, 'dapuy', 'QRIS', '2025-11-14 12:42:10', 1, 1, 'Dine In', 0),
(65, 'nip', 'Cash', '2025-11-16 06:04:28', 1, 1, 'Dine In', 0),
(66, 'voni', 'Cash', '2025-11-17 14:22:38', 1, 1, 'Dine In', 0);

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
(1, 'Kamel', '123456', 'kasir', 'Jl. Kendedes No. 25', '085777333444'),
(2, 'Rizki', '654321', 'kasir', 'Jl. Goa Gong No. 5', '087678435333'),
(3, 'Sani', '3322', 'admin', 'Jl. Tukad Languan No. 5', '098678654345'),
(4, 'Viencent', '4455', 'admin', 'Jl. Balembong No. 3', '089976678666'),
(5, 'putu', 'qwerty', 'customer', 'Jl. Pendidikan no 1', '087658429876'),
(6, 'daffa', 'daffa', 'customer', 'wdraqwfawf', '13214124'),
(7, 'rafi', 'rafi', 'kasir', 'wdraqwfawf', 'awrqr'),
(8, '', '', 'Pilih...', '', ''),
(9, '', '', 'Pilih...', '', ''),
(10, 'voni', 'voni', 'kasir', 'cibubur', '055578');

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
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pegawai_id`);

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
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
