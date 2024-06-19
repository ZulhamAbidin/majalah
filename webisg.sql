-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2024 at 07:45 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webisg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `nama` varchar(100) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `role` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `password`, `email`, `role`) VALUES
(1, 'jurnalisa', 'jurnalisa', 'jurnalisa@gmail.com', 0),
(2, 'admin', 'admin', 'admin@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int NOT NULL,
  `judul` varchar(200) NOT NULL DEFAULT '0',
  `gambar` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `isi` text NOT NULL,
  `penulis` varchar(100) NOT NULL DEFAULT '0',
  `tanggal_publish` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_kategori` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `gambar`, `isi`, `penulis`, `tanggal_publish`, `id_kategori`) VALUES
(5, 'PENDAFTARAN TELAH DIBUKA KEMBALI!!!', '1718813030SSGrL8yYgd.jpg', '<p><strong>Loremasdasda</strong></p><p>&nbsp;</p><p>&nbsp;</p><p><strong>asdasdasd</strong></p><p><strong>asd</strong></p><figure class=\"table\"><table><tbody><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure>', 'Annisa Septiani Kamal', '2024-06-20 00:02:00', 22),
(6, 'JHKJH', '1718814899YbA7TGnpd6.jpg', '<p>ASDASDASD</p><p>&nbsp;</p><p><strong>ASDASDASD</strong></p><p>&nbsp;</p><p>DASASDASDAS</p><p><strong>ASDASDAS</strong></p>', 'annisa', '2024-06-20 00:34:00', 21);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`) VALUES
(21, 'sdfsdfasdasd'),
(22, 'asdasdasd'),
(23, 'dffsfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `majalah`
--

CREATE TABLE `majalah` (
  `id_majalah` int NOT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `edisi` varchar(50) DEFAULT NULL,
  `desk` text,
  `isi` varchar(50) DEFAULT NULL,
  `cover` varchar(50) DEFAULT NULL,
  `harga_digital` int DEFAULT NULL,
  `harga_cetak` int DEFAULT NULL,
  `harga_keduanya` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `majalah`
--

INSERT INTO `majalah` (`id_majalah`, `judul`, `edisi`, `desk`, `isi`, `cover`, `harga_digital`, `harga_cetak`, `harga_keduanya`) VALUES
(32, 'Sejarah Singkat PINISI CHOIR', '1', 'lorem', '1718803981ItCFaEWqcp.pdf', 'a.jpg', 10000, 100000, 1000000),
(33, 'Pengambangan Sistem E-Document Penempatan Tenaga Kerja Dan Perluasan Kesempatan Kerja Disnaker Kota Makassar Berbasis Website ', '1', 'lorem', '1718803981ItCFaEWqcp.pdf', 'a.jpg', 290000, 2900000, 29000000),
(35, 'edit', '32', '33', '1718803981ItCFaEWqcp.pdf', 'a.jpg', 23423, 23423, 234),
(36, 'PENDAFTARAN TELAH DIBUKA KEMBALI!!!', '1', 'lorem', '1718805070Da8s2xGynN.pdf', '1718805070dAi6eEqhTk.jpg', 10000, 100000, 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_p` int NOT NULL,
  `id_sub` int NOT NULL DEFAULT '0',
  `id_majalah` int NOT NULL DEFAULT '0',
  `harga` int NOT NULL DEFAULT '0',
  `status_pembayaran` int NOT NULL DEFAULT '0',
  `bukti_pembayaran` varchar(50) NOT NULL DEFAULT '0',
  `tgl_penjualan` date NOT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `no_transaksi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_p`, `id_sub`, `id_majalah`, `harga`, `status_pembayaran`, `bukti_pembayaran`, `tgl_penjualan`, `metode_pembayaran`, `no_transaksi`) VALUES
(67, 6, 36, 10000000, 1, '1718826213Ri3kC5tXUF.png', '2024-06-20', 'BNI', 'BNI-67-20062024-IPUDK963'),
(68, 6, 35, 234, 3, '1718826245fUSO9QRY8t.png', '2024-06-20', 'BCA', 'BCA-68-20062024-RCFOW747');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id_schedules` int NOT NULL,
  `CarrierName` varchar(255) DEFAULT NULL,
  `VesselName` varchar(255) DEFAULT NULL,
  `VoyageNumber` varchar(50) DEFAULT NULL,
  `TradeLine` varchar(100) DEFAULT NULL,
  `PortCodeOrigin` varchar(20) DEFAULT NULL,
  `DepartureDate` date DEFAULT NULL,
  `Transhipment` varchar(100) DEFAULT NULL,
  `TranshipmentDeparture` date DEFAULT NULL,
  `PortCodeDestination` varchar(20) DEFAULT NULL,
  `ArrivalDate` date DEFAULT NULL,
  `Duration` int DEFAULT NULL,
  `Forwarder` varchar(255) DEFAULT NULL,
  `BerthingTerminal` varchar(100) DEFAULT NULL,
  `RequestQuote` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id_schedules`, `CarrierName`, `VesselName`, `VoyageNumber`, `TradeLine`, `PortCodeOrigin`, `DepartureDate`, `Transhipment`, `TranshipmentDeparture`, `PortCodeDestination`, `ArrivalDate`, `Duration`, `Forwarder`, `BerthingTerminal`, `RequestQuote`) VALUES
(7, 'andri okitaaa', 'MV Pelayaran Jaya1', 'V123451', 'Asia-Europe1', 'SGSIN1', '2024-06-19', 'Yes3', '2024-06-19', 'Destination Port3', '2024-06-19', 51, 'Forwarder Company3', 'Terminal A3', 'Quote Request3');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `id_sub` int NOT NULL,
  `nama` varchar(200) NOT NULL DEFAULT '0',
  `alamat` varchar(200) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `no_telp` varchar(20) NOT NULL DEFAULT '0',
  `pic` varchar(50) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`id_sub`, `nama`, `alamat`, `email`, `no_telp`, `pic`, `username`, `password`) VALUES
(4, 'ZulhamAbidin', 'BTN NUKI DWIKARYA PERMAI', 'zlhm378@gmail.com', '0895801138822', 'pic zlhm.a', 'ZulhamAbidin', 'ZulhamAbidin'),
(6, 'AstriAyuningsih', 'Kota Watansoppeng, Kabupaten Soppeng, Sulawesi Selatan.  ', 'asdastriayu@gmail.com', '34534534534', '0', 'AstriAyuningsih', 'AstriAyuningsih'),
(10, 'AnnisaSeptianiKamal', 'AnnisaSeptianiKamal', 'AnnisaSeptianiKamal@gmail.com', '0895801138822', '0', 'AnnisaSeptianiKamal', 'AnnisaSeptianiKamal');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int NOT NULL,
  `nama` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `nama`) VALUES
(7, 'ddf'),
(8, 'aa'),
(9, 'tag');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `fk_berita_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `majalah`
--
ALTER TABLE `majalah`
  ADD PRIMARY KEY (`id_majalah`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_p`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id_schedules`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `majalah`
--
ALTER TABLE `majalah`
  MODIFY `id_majalah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_p` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id_schedules` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id_sub` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `fk_berita_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
