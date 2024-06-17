-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2024 at 06:31 PM
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
  `email` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `password`, `email`) VALUES
(2, 'admin', 'admin', 'admin@gmail.com');

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
(1, 'Sejarah Singkat Kepulauan Selayar', '1718462637UgSnWJSFR7.png', '\n      Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil qui saepe tenetur consequuntur quaerat in, aliquid commodi voluptatem tempore, ratione placeat optio quisquam porro delectus quam cupiditate quasi impedit veniam', 'edit', '2024-06-15 21:43:00', 1),
(2, 'aaaaaaa', '1718462637UgSnWJSFR7.png', '      Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil qui saepe tenetur consequuntur quaerat in, aliquid commodi voluptatem tempore, ratione placeat optio quisquam porro delectus quam cupiditate quasi impedit veniam', 'edit', '2024-06-15 21:43:00', 2);

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
(1, 'kategori 1'),
(2, 'kategori 2');

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
(5, 'Sejarah Singkat HME FT UNM edit', 'Edisi', 'deksripsi', '1718367380ydjLORvF5e.pdf', '1718367380m0TlUVHrWW.jpg', 120000, 1200000, 11200000),
(6, 'Sejarah Singkat PINISI CHOIR', '1', '\n                Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit delectus rerum nisi, assumenda soluta illo facere eligendi quidem voluptas error ipsum sapiente perferendis quis tenetur doloribus, neque quam iusto, adipisci inventore voluptate perspiciatis. Voluptatibus dolorum quo modi unde, quae, ea earum error, nobis iure itaque doloremque. Fugit qui ut dolorum, a consectetur consequatur amet laborum libero in voluptates officia perspiciatis aliquam architecto vel corrupti doloremque incidunt voluptatibus. Nobis quas aut delectus dignissimos. Sunt iusto aspernatur impedit reprehenderit id nemo voluptatibus repudiandae quas similique maxime, eius in explicabo blanditiis minus nam harum obcaecati dolorem facilis! Doloribus nobis id voluptatum eum dolorem amet quidem eligendi doloremque deleniti! Minima tempora est voluptatibus incidunt placeat voluptates atque veniam qui sunt dolor, suscipit rem eligendi ipsum porro, molestiae doloribus reprehenderit corporis deserunt cumque quod obcaecati laudantium quibusdam. Ipsa, praesentium tenetur cum voluptatem tempore rem autem enim debitis amet nihil magni quas, beatae quis perferendis consequuntur.', '17184387043Ni3qxN8Hh.pdf', '1718438704lzOs50vUxr.jpg', 20000, 200000, 2000000),
(7, 'Pengambangan Sistem E-Document Penempatan Tenaga Kerja Dan Perluasan Kesempatan Kerja Disnaker Kota Makassar Berbasis Website ', '1', '12', '1718438727JvRVDf339u.pdf', '1718438727IUsrVPYWMQ.jpg', 1, 2, 1);

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
(53, 6, 6, 2000000, 2, '1718649008bfV2DoIyG3.png', '2024-06-18', 'BNI', 'BNI-53-18062024-VTWJG066');

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
(1, 'andri okitaaz', 'z', 'z', 'z', 'z', '2024-06-15', 'z', '2024-06-15', 'z', '2024-06-15', 0, 'z', 'z', 'zQuote Request'),
(5, 'andri okita3', 'MV Pelayaran Jaya3', 'V123453', 'Asia-Europe3', 'SGSIN3', '2024-06-15', 'Yes3', '2024-06-15', 'Destination Port3', '2024-06-15', 51, 'Forwarder Company3', 'Terminal A3', 'Quote Request3');

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
(3, 'Risa Harahap', 'Jakarta Selatan', 'risa@gmail.com', '12312312', '213123', 'risa', '123'),
(4, 'ZulhamAbidin', 'BTN NUKI DWIKARYA PERMAI', 'zlhm378@gmail.com', '0895801138822', 'pic zlhm.a', 'pengunjung', 'pengunjung'),
(5, 'Zulham Abidin, S.Pd., Gr.', 'Universitas Negeri Makassar', 'pengunjungastri@gmail.com', '0895801138822', 'Lorem', 'pengunjungastri', 'pengunjungastri'),
(6, 'AstriAyuningsih', 'Kota Watansoppeng, Kabupaten Soppeng, Sulawesi Selatan.  ', 'asdastriayu@gmail.com', '34534534534', '0', 'AstriAyuningsih', 'AstriAyuningsih'),
(7, 'AstriAyuningsih2', 'AstriAyuningsih2', 'astriayuningsih2@gmail.com', '345353', '0', 'AstriAyuningsih2', 'astriayuningsih2');

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
(2, 'tambah tag');

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
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `majalah`
--
ALTER TABLE `majalah`
  MODIFY `id_majalah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_p` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id_schedules` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id_sub` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
