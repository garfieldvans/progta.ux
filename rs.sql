-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2020 at 06:26 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `foto`, `username`, `password`) VALUES
(1, 'ERANDI SITEPU', 'randi.jpg', 'Randi', 'sitepustore');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `komentar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`id_komentar`, `id_pelanggan`, `id_produk`, `komentar`) VALUES
(1, 2, 39, 'Produknya Bagus '),
(2, 364, 39, 'Produknya Sangat Bagus  '),
(7, 2, 3, 'bagus'),
(8, 2, 13, 'bagus'),
(9, 2, 5, 'bagus'),
(11, 2, 19, 'Produknya kurang bagus'),
(13, 2, 22, 'barangnya bagus'),
(14, 2, 3, 'nde ah jilena '),
(15, 2, 39, 'ia betul'),
(16, 2, 3, 'ricky nababan'),
(17, 2, 56, 'Barang nya masih ready gan '),
(18, 364, 56, 'Njirr kok jual orang bang'),
(19, 2, 56, 'mau gan ???'),
(20, 364, 56, 'jumpa mana bang??'),
(21, 2, 56, 'ga jadi ga mau dia sama mu wkwk'),
(22, 2, 46, 'ohh yeahhh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ongkir`
--

CREATE TABLE `tbl_ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ongkir`
--

INSERT INTO `tbl_ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Medan', 20000),
(2, 'Padang', 20000),
(3, 'Jakarta', 30000),
(4, 'Bandung', 30000),
(5, 'Surabaya', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jenis_kelamin`, `alamat`, `telepon`, `foto`, `username`, `password`) VALUES
(2, 'ERANDI SITEPU ', 'Laki Laki', 'Jl.Pales VII No.83 Medan', '082137062880', 'randi.jpg', 'randi', 'randi'),
(364, 'James Bather Wand Ginting', 'Laki Laki', 'Jl.Bunga Mawar No.67  Medan', '082137062880', '1.jpg', 'james', 'james'),
(365, 'Roi', 'Laki Laki', 'Jl.Bunga Anggrek', '082137062880', '14f8889159ab17a689725ee9bef01703.jpg', 'roy', 'roy'),
(366, 'sdf', 'fdgdf', 'gfdf', 'sdgd', '1.jpg', '12345', '12345'),
(367, 'har', 'Laki Laki', 'medan', '082137062880', '1.jpg', 'mandi', 'mandi'),
(368, '10', 'Laki Laki', 'medan', '082137062880', '1.jpg', '0909', '0909'),
(369, 'ERANDI SITEPU ', '', '', '', '1.jpg', '0808', '0808'),
(370, '11', 'Laki Laki', 'Jl.Pales VII No.83 Medan', '082137062880', '1.jpg', 'kami', 'kami'),
(371, 'Vin', 'Laki Laki', 'Jl.Pales VII No.83 Medan', '', '', '', ''),
(372, 'mm', 'Laki Laki', 'Jl.Pales VII No.83 Medan', '0982746583', 'Alice-in-The-Twilight-Saga-Breaking-Dawn-Part-2.jpg', 'alice', 'alice'),
(373, 'al', 'Laki Laki', 'medan', '082355555555', '', 'alfred@gmail.com', '12345'),
(375, 'Ok', 'Perempuan', 'Medan', '08765555466', 'Desert.jpg', 'oktasimanjuntak', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(18, 39, 'Era', 'Bni', 800000, '2019-02-05', '03012012006.jpg'),
(20, 41, 'ERA ', 'Dengan Poin', 140000, '2019-02-05', 'Dengan Poin'),
(21, 42, 'Nababan', 'Mandiri', 695000, '2019-02-05', '03012012006.jpg'),
(22, 43, 'Jer', 'Mandiri', 275000, '2019-02-06', 'photo0326.jpg'),
(23, 49, 'satria', 'satria', 370000, '2019-02-06', 'photo0326.jpg'),
(24, 50, 'Nababan', 'Mandiri', 450000, '2019-02-06', 'photo0326.jpg'),
(25, 51, 'meiko', 'cina', 270000, '2019-02-06', 'photo0326.jpg'),
(26, 52, 'meiko', 'satria', 380000, '2019-02-06', 'grand-theft-auto-san-andreas.jpg'),
(27, 54, 'ervi', 'Bni', 940000, '2019-02-06', 'photo0326.jpg'),
(28, 55, 'Jer', 'satria', 625000, '2019-02-07', '300px-Lamborghini_Gallardo_LP560-4.jpg'),
(29, 56, 'rik', 'Mandiri', 510000, '2019-02-07', 'photo0326.jpg'),
(30, 57, 'James', 'Bri', 775000, '2019-02-07', 'BD 2.jpg'),
(31, 58, 'Ro', 'Bni', 265000, '2019-02-07', 'BD 2.jpg'),
(32, 59, 'sdf', 'Bni', 520000, '2019-02-07', '121115_MOV_BreakingDawn2.jpg'),
(33, 61, 'ali', 'Bni', 520000, '2019-02-07', 'article-1351525250797-13EFCE2A000005DC-900871_636x401.jpg'),
(34, 62, 'ERA  ', 'Dengan Poin', 370000, '2019-02-07', 'Dengan Poin'),
(35, 63, 'Era', 'Bni', 450000, '2019-02-08', 'DSC02026.JPG'),
(36, 64, 'Era', 'Bni', 1770000, '2019-05-22', '1511790_612823578803297_8037661351767895176_o.jpg'),
(37, 44, '', '', 275000, '2019-06-10', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembeli`
--

CREATE TABLE `tbl_pembeli` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `status_pembelian` varchar(40) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembeli`
--

INSERT INTO `tbl_pembeli` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `status_pembelian`) VALUES
(42, 3, 3, '2019-02-05', 695000, 'Barang Sedang Dikirim'),
(43, 2, 4, '2019-02-06', 275000, 'Sudah Dibayar'),
(44, 2, 3, '2019-02-06', 275000, 'Sudah Dibayar'),
(45, 0, 4, '2019-02-06', 2840000, 'Pending'),
(46, 0, 3, '2019-02-06', 275000, 'Pending'),
(47, 0, 5, '2019-02-06', 450000, 'Pending'),
(48, 358, 3, '2019-02-06', 275000, 'Pending'),
(49, 359, 2, '2019-02-06', 370000, 'Sudah Dibayar'),
(50, 360, 3, '2019-02-06', 450000, 'Barang Sedang Dikirim'),
(51, 361, 2, '2019-02-06', 270000, 'Sudah Dibayar'),
(52, 361, 4, '2019-02-06', 380000, 'Sudah Dibayar'),
(53, 362, 1, '2019-02-06', 265000, 'Pending'),
(54, 2, 1, '2019-02-06', 940000, 'Barang Sedang Dikirim'),
(55, 361, 3, '2019-02-07', 625000, 'Sudah Dibayar'),
(56, 363, 1, '2019-02-07', 510000, 'Sudah Dibayar'),
(57, 364, 3, '2019-02-07', 775000, 'Sudah Dibayar'),
(58, 365, 1, '2019-02-07', 265000, 'Barang Sedang Dikirim'),
(59, 366, 2, '2019-02-07', 520000, 'Sudah Dibayar'),
(60, 367, 2, '2019-02-07', 210000, 'Pending'),
(61, 372, 2, '2019-02-07', 520000, 'Barang Sedang Dikirim'),
(62, 2, 1, '2019-02-07', 370000, 'Sudah Dibayar'),
(63, 2, 3, '2019-02-08', 450000, 'Barang Sedang Dikirim'),
(64, 2, 1, '2019-05-22', 1770000, 'Barang Sedang Dikirim'),
(65, 375, 5, '2019-10-04', 380000, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian_produk`
--

CREATE TABLE `tbl_pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembelian_produk`
--

INSERT INTO `tbl_pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`) VALUES
(10, 39, 3, 1),
(11, 39, 5, 1),
(12, 41, 43, 1),
(13, 42, 3, 1),
(14, 42, 13, 1),
(15, 43, 13, 1),
(16, 44, 13, 1),
(17, 45, 3, 3),
(18, 45, 5, 3),
(19, 45, 16, 1),
(20, 46, 13, 1),
(21, 47, 3, 1),
(22, 48, 13, 1),
(23, 49, 5, 1),
(24, 50, 3, 1),
(25, 51, 19, 1),
(26, 52, 5, 1),
(27, 53, 13, 1),
(28, 54, 3, 1),
(29, 54, 16, 1),
(30, 55, 5, 1),
(31, 55, 13, 1),
(32, 56, 13, 2),
(33, 57, 13, 1),
(34, 57, 16, 1),
(35, 58, 13, 1),
(36, 59, 16, 1),
(37, 60, 40, 1),
(38, 61, 16, 1),
(39, 62, 5, 1),
(40, 63, 3, 1),
(41, 64, 13, 2),
(42, 64, 3, 3),
(43, 65, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poin`
--

CREATE TABLE `tbl_poin` (
  `id_poin` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `jumlah_poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_poin`
--

INSERT INTO `tbl_poin` (`id_poin`, `id_pelanggan`, `jumlah_poin`) VALUES
(1, 2, 525),
(2, 3, 110),
(3, 363, 0),
(4, 364, 10),
(5, 365, 1),
(6, 366, 10),
(7, 367, 1),
(8, 372, 10),
(9, 375, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `kategori`, `stok`, `deskripsi`, `harga_produk`, `foto`) VALUES
(1, 'Nande Biring', 'Kaos', 10, 'Nandingken cining japape  ;)', 2147483647, 'ndbiring.jpg'),
(3, 'New Balance', 'Sepatu', 13, '', 420000, 'newbalance.jpg'),
(5, 'Adidas', 'Sepatu', 16, '', 350000, 'adidas.jpg'),
(13, 'Skechers', 'Sepatu', 12, '', 245000, 'Skechers.jpg'),
(16, 'Jam Tangan', 'Jam Tangan', 20, 'Jam Tangan  yang satu ini merupakan sebuah jam tangan dengan desain macho berkombinasi sporty serta elegan yang akan di ciptakan untuk memudahkan saat melihat dan mengingat waktu saat anda sedang beraktifitas', 500000, 'jam1.jpg'),
(17, 'G-Shock', 'Jam Tangan', 25, 'Jam Tangan G-Shock  yang satu ini merupakan sebuah jam tangan dengan desain macho berkombinasi sporty serta elegan yang akan di ciptakan untuk memudahkan saat melihat dan mengingat waktu saat anda sedang beraktifitas', 375000, 'Jam2.jpg'),
(18, 'G-Shock 12', 'Jam Tangan', 25, 'Jam Tangan G-Shock 12  yang satu ini merupakan sebuah jam tangan dengan desain macho berkombinasi sporty serta elegan yang akan di ciptakan untuk memudahkan saat melihat dan mengingat waktu saat anda sedang beraktifitas', 420000, 'jam3.jpg'),
(19, 'Getck 12', 'Jam Tangan', 24, 'Jam Tangan Getck 12  yang satu ini merupakan sebuah jam tangan dengan desain macho berkombinasi sporty serta elegan yang akan di ciptakan untuk memudahkan saat melihat dan mengingat waktu saat anda sedang beraktifitas', 250000, 'jam4.jpg'),
(20, 'Getck 15', 'Jam Tangan', 25, 'Jam Tangan Getck 15  yang satu ini merupakan sebuah jam tangan dengan desain macho berkombinasi sporty serta elegan yang akan di ciptakan untuk memudahkan saat melihat dan mengingat waktu saat anda sedang beraktifitas', 300000, 'jam5.jpg'),
(21, 'Nibosi ', 'Jam Tangan', 25, 'Jam Tangan Nibosi  yang satu ini merupakan sebuah jam tangan dengan desain macho berkombinasi sporty serta elegan yang akan di ciptakan untuk memudahkan saat melihat dan mengingat waktu saat anda sedang beraktifitas', 299900, 'jam7.jpg'),
(22, 'G-Shock 225', 'Jam Tangan', 25, 'Jam Tangan G-Shock 225 yang satu ini merupakan sebuah jam tangan dengan desain macho berkombinasi sporty serta elegan yang akan di ciptakan untuk memudahkan saat melihat dan mengingat waktu saat anda sedang beraktifitas', 499900, 'jam8.jpg'),
(23, 'Skmei', 'Jam Tangan', 25, 'Jam Tangan Skmei yang satu ini merupakan sebuah jam tangan dengan desain macho berkombinasi sporty serta elegan yang akan di ciptakan untuk memudahkan saat melihat dan mengingat waktu saat anda sedang beraktifitas', 700000, 'jam9.jpg'),
(24, 'Digitec ', 'Jam Tangan', 25, 'Jam Tangan Digitec yang satu ini merupakan sebuah jam tangan dengan desain macho berkombinasi sporty serta elegan yang akan di ciptakan untuk memudahkan saat melihat dan mengingat waktu saat anda sedang beraktifitas', 150000, 'jam10.jpg'),
(25, 'Kardinal', 'Kemeja', 25, 'Kemeja Kadinal Multifungsi tersedia dalam ukuran L dengan warna hitam, merah marun, cokelat, dan abu-abu. Warna yang terlihat pada foto sesuai dengan warna aslinya. Apabila terdapat perbedaan warna, disebabkan oleh pengaturan monitor dan efek cahaya pada layar monitor Anda', 150000, 'kemeja13.jpg'),
(26, 'Levis', 'Kemeja', 25, 'Kemeja Levis Multifungsi tersedia dalam ukuran L dengan warna hitam, merah marun, cokelat, dan abu-abu. Warna yang terlihat pada foto sesuai dengan warna aslinya. Apabila terdapat perbedaan warna, disebabkan oleh pengaturan monitor dan efek cahaya pada layar monitor Anda', 230000, 'kemeja2.jpg'),
(27, 'Crocodile', 'Kemeja', 25, 'Kemeja Crocodile Multifungsi tersedia dalam ukuran L dengan warna hitam, merah marun, cokelat, dan abu-abu. Warna yang terlihat pada foto sesuai dengan warna aslinya. Apabila terdapat perbedaan warna, disebabkan oleh pengaturan monitor dan efek cahaya pada layar monitor Anda', 199900, 'kemeja3.jpg'),
(28, 'Giordano', 'Kemeja', 25, 'Kemeja Giordano Multifungsi tersedia dalam ukuran L dengan warna hitam, merah marun, cokelat, dan abu-abu. Warna yang terlihat pada foto sesuai dengan warna aslinya. Apabila terdapat perbedaan warna, disebabkan oleh pengaturan monitor dan efek cahaya pada layar monitor Anda', 340000, 'kemeja4.jpg'),
(29, 'Boss', 'Kemeja', 25, 'Kemeja Boss Multifungsi tersedia dalam ukuran L dengan warna hitam, merah marun, cokelat, dan abu-abu. Warna yang terlihat pada foto sesuai dengan warna aslinya. Apabila terdapat perbedaan warna, disebabkan oleh pengaturan monitor dan efek cahaya pada layar monitor Anda', 210000, 'kemeja5.jpg'),
(30, 'Uniqlo', 'Kemeja', 25, 'Kemeja Uniqlo Multifungsi tersedia dalam ukuran L dengan warna hitam, merah marun, cokelat, dan abu-abu. Warna yang terlihat pada foto sesuai dengan warna aslinya. Apabila terdapat perbedaan warna, disebabkan oleh pengaturan monitor dan efek cahaya pada layar monitor Anda', 210000, 'kemeja6.jpg'),
(31, 'Zara', 'Kemeja', 25, 'Kemeja Zara Multifungsi tersedia dalam ukuran L dengan warna hitam, merah marun, cokelat, dan abu-abu. Warna yang terlihat pada foto sesuai dengan warna aslinya. Apabila terdapat perbedaan warna, disebabkan oleh pengaturan monitor dan efek cahaya pada layar monitor Anda', 170000, 'kemeja7.jpg'),
(32, 'H&M', 'Kemeja', 25, 'Kemeja H&M Multifungsi tersedia dalam ukuran L dengan warna hitam, merah marun, cokelat, dan abu-abu. Warna yang terlihat pada foto sesuai dengan warna aslinya. Apabila terdapat perbedaan warna, disebabkan oleh pengaturan monitor dan efek cahaya pada layar monitor Anda', 600000, 'kemeja8.jpg'),
(33, 'Calvin Klein', 'Kemeja', 25, 'Kemeja Calvin Klein Multifungsi tersedia dalam ukuran L dengan warna hitam, merah marun, cokelat, dan abu-abu. Warna yang terlihat pada foto sesuai dengan warna aslinya. Apabila terdapat perbedaan warna, disebabkan oleh pengaturan monitor dan efek cahaya pada layar monitor Anda', 390000, 'kemeja9.jpg'),
(34, 'Esprit', 'Kemeja', 25, 'Kemeja Espirit Multifungsi tersedia dalam ukuran L dengan warna hitam, merah marun, cokelat, dan abu-abu. Warna yang terlihat pada foto sesuai dengan warna aslinya. Apabila terdapat perbedaan warna, disebabkan oleh pengaturan monitor dan efek cahaya pada layar monitor Anda', 200000, 'kemeja10.jpg'),
(38, 'Supreme 1', 'Kaos', 25, 'Kaos Supreme 1 tersedia dalam ukuran L dengan warna hitam, merah marun, cokelat, dan abu-abu. Warna yang terlihat pada foto sesuai dengan warna aslinya. Apabila terdapat perbedaan warna, disebabkan oleh pengaturan monitor dan efek cahaya pada layar monitor Anda', 230000, 'kaos5.jpg'),
(39, 'Supreme 2', 'Kaos', 25, 'Kaos Supreme 2 tersedia dalam ukuran L dengan warna hitam, merah marun, cokelat, dan abu-abu. Warna yang terlihat pada foto sesuai dengan warna aslinya. Apabila terdapat perbedaan warna, disebabkan oleh pengaturan monitor dan efek cahaya pada layar monitor Anda', 250000, 'kaos6.jpg'),
(40, 'Falme', 'Kaos', 24, 'Kaos Flame tersedia dalam ukuran L dengan warna hitam, merah marun, cokelat, dan abu-abu. Warna yang terlihat pada foto sesuai dengan warna aslinya. Apabila terdapat perbedaan warna, disebabkan oleh pengaturan monitor dan efek cahaya pada layar monitor Anda', 190000, 'kaos7.jpg'),
(41, 'Evos', 'Kaos', 24, 'Kaos Evos tersedia dalam ukuran L dengan warna hitam, merah marun, cokelat, dan abu-abu. Warna yang terlihat pada foto sesuai dengan warna aslinya. Apabila terdapat perbedaan warna, disebabkan oleh pengaturan monitor dan efek cahaya pada layar monitor Anda', 180000, 'kaos8.jpg'),
(42, 'Totalfat', 'Kaos', 25, 'Kaos Totalfat tersedia dalam ukuran L dengan warna hitam, merah marun, cokelat, dan abu-abu. Warna yang terlihat pada foto sesuai dengan warna aslinya. Apabila terdapat perbedaan warna, disebabkan oleh pengaturan monitor dan efek cahaya pada layar monitor Anda', 165000, 'kaos9.jpg'),
(43, 'Relax', 'Kaos', 24, 'Kaos Relax tersedia dalam ukuran L dengan warna hitam, merah marun, cokelat, dan abu-abu. Warna yang terlihat pada foto sesuai dengan warna aslinya. Apabila terdapat perbedaan warna, disebabkan oleh pengaturan monitor dan efek cahaya pada layar monitor Anda', 120000, 'kaos10.jpg'),
(45, 'Tas Selempang', 'Tas1', 25, '', 320000, 'tas2.jpg'),
(46, 'Tas Ransel ', 'Tas2', 25, '', 210000, 'tas1.jpg'),
(47, 'Tas supreme', 'Tas3', 25, '', 270000, 'tas3.jpg'),
(48, 'Tas blue', 'Tas4', 25, '', 210000, 'tas5.jpg'),
(49, 'Tas Augur', 'Tas5', 25, '', 210000, 'tas6.jpg'),
(52, 'Sepatu 3', 'Sepatu', 14, 'Sepatu dengan bahan kulit tresedia warna hitam putih dan biru dengan size 39-43', 210000, 'newbalance.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tbl_ongkir`
--
ALTER TABLE `tbl_ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tbl_pembeli`
--
ALTER TABLE `tbl_pembeli`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tbl_pembelian_produk`
--
ALTER TABLE `tbl_pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `tbl_poin`
--
ALTER TABLE `tbl_poin`
  ADD PRIMARY KEY (`id_poin`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_ongkir`
--
ALTER TABLE `tbl_ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_pembeli`
--
ALTER TABLE `tbl_pembeli`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_pembelian_produk`
--
ALTER TABLE `tbl_pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_poin`
--
ALTER TABLE `tbl_poin`
  MODIFY `id_poin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
