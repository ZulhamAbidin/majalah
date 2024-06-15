-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 14, 2024 at 05:23 PM
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
  `gambar` varchar(100) NOT NULL DEFAULT '0',
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `gambar`, `isi`) VALUES
(1, 'Relaksasi Izin Impor, Pelindo Dukung Percepatan Pengeluaran Petikemas Impor Edit', '1716368239hTNIj6HQNy.jpg', '<p>PT. Pelabuhan Indonesai (Persero) / Pelindo menyambut baik relaksasi aturan impor melalui penerbitan Permendag No 8 tahun 2024, dan peraturan turunannya Keputusan Menteri Keuangan (KMK) No 17 Tahun 2024.<br>Untuk itu, Pelindo siap mendukung sepenuhnya percepatan proses pengeluaran petikemas dengan berkoordinasi bersama instansi/stakeholder kepelabuhanan.<br>“Sesuai dengan arahan Bapak Presiden agar semua bekerja 24 jam mengeluarkan barang hingga selesai agar barang dapat segera dikeluarkan,” kata Airlangga Hartarto, Menteri Koordinator Bidang Perekonomian pada saat melakukan peninjauan langsung pemberlakuan kebijakan relaksasi impor di Pelabuhan Tanjung Priok (18 Mei 2024).<br>Sejalan dengan itu, dalam kegiatan yang sama Menteri Keuangan, Sri Mulyani Indrawati meminta kesiapan dari seluruh ekosistem di pelabuhan ini, tidak hanya Bea Cukai namun juga institusi lainnya termasuk Karantina, Badan Pengawas Obat dan Makanan (BPOM), Pelindo, serta instansi terkait lainnya.<br>Menindaklanjuti hal tersebut, Pelindo siap menjalankan arahan Menko Bidang Perekonomian dan Menteri Keuangan untuk bekerja 24/7 bersama-sama stakeholders di pelabuhan, guna percepatan pengeluaran petikemas.<br>Pelindo menegaskan bahwa penumpukan kontainer-kontainer itu dipastikan tidak mengganggu operasional pelabuhan, baik di Pelabuhan Tanjung Priok maupun Pelabuhan Tanjung Perak. Indikator kepadatan di dalam terminal, yaitu Yard Occupancy Ratio (YOR), di seluruh terminal petikemas yang dikelola Pelindo masih berada di bawah 60%.<br>“Sebagai informasi, dari data April 2024 untuk terminal petikemas di Tanjung Priok, YOR masing-masing yaitu JICT sebesar 51,61%, TPK Koja 43,00%, IPC TPK 51,75%, dan NPCT1 36.00%. Terminal dapat dikatakan padat ketika angkanya di atas 70%. Dengan demikian, operasional di dalam terminal masih aman terkendali,” jelas Arif Suhartono, Direktur Utama Pelindo.<br>Saat ini layanan terminal petikemas Pelindo telah berbasis integrated planning and control yang mampu mempercepat proses bongkar muat maupun identifikasi peti kemas.<br>Selain di Terminal JICT Jakarta, ada beberapa terminal sudah menerapkan Terminal Booking System (TBS) dan single truck identification system (STID) untuk mengatur antrean truck pada saat receiving/delivery sehingga mencegah kemacetan.<br>“Pelindo intensif melakukan koordinasi dengan instansi/stakeholder kepelabuhanan untuk sama-sama memonitor dan atasi penyelesaian keluarnya kontainer-kontainer di Pelabuhan Tanjung Priok dan Tanjung Perak selama 24/7,” pungkas Arif.</p>'),
(2, 'HAIS Tambah Armada Tugboat dan Barge untuk Perkuat Kinerja Operasional', '1716368436wJm69fcPZe.webp', '<p>PT Hasnur Internasional Shipping Tbk (“HAIS”), perusahaan penyedia logistik dan transportasi laut terkemuka di Indonesia, menargetkan volume angkut hingga 11,2 juta metrik ton (MT) di tahun 2024 ini. Guna memperkuat usaha dalam mencapai target tersebut HAIS hari ini meresmikan pengoperasian kapal tunda (tugboat) TB Hasnur 18 dan tongkang (barge) Hasnur 338.</p><p>Seremoni peresmian armada baru tersebut ditandai dengan upacara tradisi “Tampung Tawar” yang dilaksanakan di Sungai Putting, Tabalong, Kalimantan Selatan pada Kamis, 16 Mei 2024. Tampung Tawar merupakan tradisi Muslim Dayak Kalimantan yang bertujuan untuk mengucapkan syukur, mengharap berkah, dan menolak musibah.</p><p><strong>Get Free Latest Magazine by Join Our Weekly Newsletter:</strong><a href=\"https://halaman.email/landing_page/weekly-newsletter-ZSO34FZ7&amp;src=body\">Click here to join free weekly newsletter</a></p><p>Direktur Operasi PT Hasnur Internasional Shipping Tbk Laorentina Devi yang hadir dalam peresmian tersebut dalam sambutannya menyampaikan bahwa peresmian TB Hasnur 18 dan BG Hasnur 338 ini merupakan penambahan set armada untuk menggenapi 1 set armada tugboat dan barge yang telah resmi dioperasikan akhir tahun lalu. Tahun 2024 ini, Perusahaan menargetkan akan menambah 2 set armada lagi. Hal ini untuk mendorong tercapainya target 2024 atas volume angkut hingga 11,2 juta metrik ton (MT).</p><p>“Alhamdulilah hari ini kami bisa meresmikan pengoperasian armada HAIS yang baru yaitu TB Hasnur 18 dan BG Hasnur 338. Semoga penambahan set kapal berikutnya dapat kita lakukan di akhir semester I dan semester II nanti,” ujar Laorentina Devi.</p><p>Investasi pembelian armada kapal baru ini, lanjut Laorentina Devi, merupakan komitmen penuh Perusahaan untuk memacu efektivitas dan bagian dari implementasi shipping excellence yang merupakan program operation excellence. “Hal ini juga sejalan dengan salah satu visi HAIS yaitu memberikan pelayanan terbaik, aman, tepat waktu, dan efisien bagi pelanggan guna mendukung daya saing perusahaan, ” tutup Laorentina Devi.</p><p><strong>Join Telegram Group Shipping &amp; Logistics:</strong></p><p>TB Hasnur 18 ini memiliki kapasitas mesin 2.200 horsepower (HP) yang dapat menarik tongkang ukuran 330 feet dengan kapasitas angkut sebesar 10.500 MT. Hingga Mei 2024, PT Hasnur Internasional Shipping Tbk mengoperasikan 15 kapal tunda (tugboat) dan 16 tongkang (barge).</p>'),
(3, 'Terminal Teluk Lamong Sambut Peluncuran New Service', '1716368623Zov7m8iGRh.webp', '<p>Mengawali bulan Mei 2024 ini, Terminal Teluk Lamong (TTL) anak usaha dari Sub Holding Pelindo Terminal Petikemas (SPTP) menyambut service baru konsorsium pelayaran Wan Hai Lines, KMTC dan Interasia Lines bertajuk SI8 (SoutheastAsia India VIII) service. <i>SI8 service</i> merupakan jaringan layanan rute baru yang dioperasikan 3 (tiga) pelayaran tersebut untuk memperkuat rantai pelayaran Asia Tenggara ke India. Kedatangan perdananya, service SI8 ini dibuka dengan kapal MV Najade yang berbendera Liberia. Kapal berkapasitas 2700 TEUs dengan panjang (LOA) 215 meter akan membawa 1100 petikemas dari Indonesia menuju India dengan sebelumnya singgah di Jakarta.</p><p>Saat berada di 22 mil laut dari dermaga atau buih #3 sekitar Karang Jamuang Jumat 03 Mei 2024 dini hari, MV Najade dijemput langsung oleh manajemen TTL menggunakan kapal pandu didampingi tim pelayanan kapal Sub Holding Pelindo Jasa Maritim (SPJM) hingga berhasil sandar di Dermaga Internasional TTL. Direksi dan manajemen TTL hadir menyambut langsung MV Najade, memberikan cindera mata kepada Captain MV Najade, Sunny W yang disaksikan Ass. Owner’s Representative Wan Hai Lines Surabaya, Kane Chang. “Kami sangat antusias dipercaya untuk melayani service baru SI8 yang diluncurkan oleh Wan Hai Lines, KMTC dan Interasia Lines. Kami mengapresiasi berbagai langkah inovatif perusahaan pelayaran untuk mendorong konektivitas perdagangan dan mempercepat distribusi barang”, Ujar David.</p><p><strong>Get Free Latest Magazine by Join Our Weekly Newsletter:</strong><a href=\"https://halaman.email/landing_page/weekly-newsletter-ZSO34FZ7&amp;src=body\">Click here to join free weekly newsletter</a></p><p>MV Najade juga akan membawa beberapa muatan Transhipment dari wilayah Timur Indonesia berupa <i>seaweed, gum copal, cashewnut, veneer, </i>melalui TTL untuk selanjutnya di ekspor ke India. Transhipment menjadi inisiatif srategis subholding peti kemas sebagai tindak lanjut pengembangan bisnis kepelabuhanan. Inisiatif ini ini mampu mendongkrak daya saing dan mendorong pertumbuhan perekonomian nasional.</p><p>Kecepatan pelayanan bongkar muat petikemas MV Najade ini mencapai BSH 58 dengan waktu operasi 19 jam. Setelah MV Najade, kapal lain berkapasitas 3000 TEUs akan memulai service nya di TTL secara mingguan setiap hari kamis <i>(weekly service)</i>. Kesiapan infrastruktur dan efektifitas bongkar di TTL mampu menarik pengguna jasa dan pelaku ekspor impor untuk mempercayakan kepada TTL.</p><p>Kane Chang, menyampaikan bahwa layanan SI8 memperluas jaringan distribusi internasional yang menghubungkan pasar Indonesia dan India sehingga mampu membuka peluang bagi pelaku bisnis untuk melakukan ekspansi. Hal ini tentu menuntut perusahaan pelayaran untuk menfasilitasi agar proses pengiriman optimal. “Keunggulan layanan dan kehandalan alat di TTL sangat menjanjikan, kami yakin kedepan akan banyak kolaborasi dan kerjasama jangka panjang”, Ujar Kane.</p><p><strong>Join Telegram Group Shipping &amp; Logistics:</strong></p><p>David optimis dengan penambahan service baru tersebut maka tahun ini TTL bisa mencapai target kinerja arus peti kemas. Dalam waktu dekat TTL juga akan menerima beberapa service baru rute internasional yang menjanjikan, hal ini menguatkan posisi TTL sebagai pelabuhan petikemas internasional yang menjadi kepercayaan pelanggan. “Kami ucapkan terima kasih kepada seluruh tim TTL atas koordinasi yang baik dengan perusahaan pelayaran dan tim pelayanan kapal SPJM dalam proses penyandaran kapal. Kami yakin kolaborasi tersebut akan mendukung kinerja operasional kami sehingga mampu memberikan layanan bongkar muat yang efisien,” tutup David.</p>'),
(4, 'Transformasi SPMT dan Upaya Meningkatkan Pangsa Pasar Kargo Curah', '1716368814ijy9vQpTMC.webp', '<p>Tranformasi yang dilakukan PT Pelindo Multi Terminal (SPMT) dalam dua tahun terakhir pasca merger telah menunjukan hasil yang positif. Setidaknya, hal tersebut terlihat pada waktu sandar kapal (port stay) serta waktu menginap barang (cargo stay) yang lebih pendek. Produktivitas pun meningkat, tidak hanya pada sisi terminal tetapi juga pada sisi pengguna <i>(port user)</i>.</p><p>Para pengguna jasa mengakui dampak positif tersebut. Namun berharap Pelindo terus melakukan investasi dan transformasi lanjutan. Investasi dan transformasi juga diharapkan dilakukan melalui pembenahan infrastuktur dan modernisasi fasilitas, terutama fasilitas untuk bongkar muat komoditas unggulan.</p><p><strong>Get Free Latest Magazine by Join Our Weekly Newsletter:</strong><a href=\"https://halaman.email/landing_page/weekly-newsletter-ZSO34FZ7&amp;src=body\">Click here to join free weekly newsletter</a></p><p>Apalagi, potensi pasar kargo curah, khususnya komoditas unggulan seperti batu bara, CPO (<i>crude palm oil</i>), dan gas masih sangat besar. Sebagai operator terminal yang melayani bongkar muat komoditas-komoditas tersebut, SPMT memiliki peluang yang sangat besar untuk memperbesar <i>market share</i> dari komoditas-komoditas tersebut.</p><p><strong>Potensi Pasar Menjanjikan &nbsp;</strong></p><p>Kargo nonpetikemas (curah) Indonesia sangat potensial, baik curah kering (<i>dry bulk) </i>maupun curah cair (<i>liquid bulk</i>). Ini tak terlepas dari tingginya volume beberapa komoditas unggulan seperti batu bara, CPO, dan gas. Ketiganya merupakan komoditas ekspor unggulan, pemberi devisa terbesar.</p><p>Indonesai merupakan negara eksportir batu bara terbesar kedua di dunia setelah Australia. Pada tahun lalu (2023), menurut data Kementerian Energi dan Sumber Daya Mineral (ESDM), total produksi batu bara Indonesia mencapai 775,2 juta mt (<i>metric ton</i>), naik 12% secara <i>year-on-year </i>(YoY), dari 694 juta mt pada tahun 2022.</p><p>Dari jumlah tersebut, sebanyak 508 juta mt diekspor, dengan Tiongkok sebagai importir terbesar, mencapai 215,7 juta mt, dan disusul oleh India (108,40 juta mt). Sedangkan sebanyak 213 juta mt untuk kebutuhan dalam negeri. Hal ini menempatkan batu bara sebagai komoditas unggulan dalam angkutan <i>dry bulk </i>(curah kering).</p><p>Komoditas ekspor andalan Indonesia lainnya yaitu CPO. Pada tahun 2023, produksi CPO Indonesia mencapai lebih dari 50,07 juta ton, naik 7,15% secara YoY, dari 46,73 juta ton pada tahun 2022.</p><p>&nbsp;</p><p>Hal yang sama terjadi pada komoditas gas. Volume produksi gas diperkirakan akan semakin meningkat. Apalagi, pemerintah, melalui SKK Migas menargetkan produksi gas sebesar 12 miliar kaki kubik per hari (12 MMSCFD) pada tahun 2030.</p><p>Yukki Nugrahawan Hanafi, Wakil Ketua Umum Kamar Dagang dan Industri Indonesia (KADIN) dan mantan Ketua Umum Asosiasi Logistik dan Forwarder Indonesia (ALFI) mengakui potensi tersebut. Yukki menggarisbawahi, selain menjadi penyumbang utama pendapatan negara, komoditas-komoditas tersebut juga memberikan kontribusi yang signifikan bagi seluruh pelaku usaha transportasi dan logistik.</p><p>“Bisnis logistik dan transportasi selalu dikonotasikan dengan petikemas. Padahal, yang nonpetikemasjauh lebih potensial. Sebut saja komoditas batu bara dan hasil tambang lainnya, CPO, minyak dan gas. Volumenya jauh lebih besar,” kata Yukki.</p><p>Komoditas-komoditas tersebut, tegas Yukki, tidak hanya memberikan devisa besar bagi negara, tetapi juga untuk keberlangsungan pelaku usaha. “Tidak hanya bagi produsen atau ekportirnya, tetapi juga bagi usaha transportasi dan logistik, termasuk pengelola terminal dan pelabuhan,” kata Yukki dalam sebuah diskusi dengan <i>Indonesia Shipping Gazette.</i></p><p>Hal senada disampaikan Carmelita Hartoto, Ketua Umum asosiasi pengusaha pelayaran nasional – Indonesia National Shipowners’ Association (INSA). Carmelita mengakui potensi komoditas-komoditas tersebut telah memberikan keuntungan besar bagi perusahaan pelayaran nasional, terutama untuk pelayaran <i>break bulk</i> (pengangkut batu bara) dan pelayaran <i>tanker</i> baik yang mengangkut CPO maupun minyak dan gas. Dan tentu juga bagi sektor terkait lainnya, termasuk pelabuhan sebagai tempat bongkar muat.</p>'),
(5, 'SPMT Jamin Layanan 24/7 Selama Musim Lebaran', '1716368892P3wToqyLZ7.jpg', '<p>Kelencaran PT Pelindo Multi Terminal (SPMT) sebagai Sub-Holding dari PT Pelabuhan Indonesia (Persero) menjamin kesiapan pelayanan operasional pada Libur dan cuti bersama Hari Raya Idul Fitri Tahun 1444 H/2023.</p><p>Sebagai bagian dari mata rantai logistik utama nasional, yang berfokus pada pengelolaan operasional terminal non-petikemas, seperti terminal curah cair, curah kering, multipurpose, general cargo, gas,&nbsp; dan terminal kendaraan, SPMT memastikan tetap memberikan operasional pelayanan dermaga, bongkar muat, penumpukan dan jasa lainnya 24 jam 7 hari yang sesuai dengan prosedur kepada para pengguna jasa.</p><p><strong>Get Free Latest Magazine by Join Our Weekly Newsletter:</strong><a href=\"https://halaman.email/landing_page/weekly-newsletter-ZSO34FZ7&amp;src=body\">Click here to join free weekly newsletter</a></p><p>Dalam rangka mendukung kebijakan pemerintah terkait pengaturan lalu lintas dan pengaturan kendaraan angkutan barang pada masa angkutan Lebaran tahun 2023, SVP Sekretariat Perusahaan Pelindo Multi Terminal Fiona Sari Utami menjelaskan, SPMT memberikan keringanan pelayanan jasa penumpukan barang selama periode tanggal 17 April 2023 – 2 Mei 2023.</p><p>“Sebagai bagian dari upaya perusahaan dalam mendukung kebijakan Pemerintah, SPMT juga memberikan keringanan berupa diskon biaya penumpukan bagi pengguna jasa,” terang Fiona.</p><p>Selain itu SPMT juga memastikan implementasi K3 terus dilaksanakan sebagai wujud proses kerja aman, sehat dan selamat untuk menghindari hal-hal yang berisiko mengganggu pelayanan operasional serta risiko terjadinya kecelakaan kerja.</p><p>Pengaturan jam kerja operasional pada periode libur dan cuti bersama Hari Raya Idul Fitri 1444 H/2023, selalu berkoordinasi dengan pihak Otoritas Pelabuhan setempat dengan mengutamakan pelayanan operasional serta meminimalisir terjadinya pemberhentian atau keterlambatan pelayanan yang akan memengaruhi kelancaran arus barang selama periode itu.</p><p>“Untuk memastikan kelancaran arus logistik selama periode Idul Fitri 1444 H/2023, Pelindo Multi Terminal juga terus berkoordinasi dengan Otoritas Pelabuhan/KSOP di seluruh wilayah operasional SPMT untuk tetap memastikan kelancaran logistik,” terang Fiona.</p><p>Koordinasi ini antara lain disebutkan Fiona berkaitan dengan pemantauan kegiatan bongkar muat barang, koordinasi dengan pihak-pihak terkait, kegiatan pusat pengendalian trafik sebagai pusat informasi dan pelaporan.</p><p>“Selama periode libur Idul Fitri ini SPMT juga akan memberikan prioritas sandar kapal penumpang yang membawa pemudik untuk sandar/tambat di area operasional SPMT yang tentunya berkoordinasi dengan regional setempat, pungkas Fiona.</p><p>Pelindo Multi Terminal (SPMT) merupakan Sub-Holding PT Pelindo (Persero) yang fokus pada pengelolaan operasional terminal non-petikemas/multipurpose. SPMT dalam kegiatan operasionalnya mengelola 10 Branch Terminal yang tersebar di wilayah Sumatera yaitu di Belawan dan Dumai, pulau Jawa seperti Jamrud Nilam Mirah, Tanjung Intan, Tanjung Wangi, di Kalimantan yaitu Bagendang, Bumiharjo, Trisakti dan Balikpapan serta di Pulau Sulawesi berada di Makassar.</p><p><strong>Join Telegram Group Shipping &amp; Logistics:</strong></p><p>SPMT saat ini juga mengelola 3 Anak Perusahaan, yaitu PT Pelabuhan Tanjung Priok (PTP), PT Indonesia Kendaraan Terminal, Tbk. (IPCC) yang merupakan terminal kendaraan terbesar di ASEAN, dan PT Terminal Curah Utama (TCU).</p>');

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
(1, 'Kategori 2'),
(3, 'cek tambah kategori');

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
(5, 'Sejarah Singkat HME FT UNM edit', 'Edisi', 'deksripsi', '1718367380ydjLORvF5e.pdf', '1718367380m0TlUVHrWW.jpg', 120000, 1200000, 11200000);

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
(28, 5, 5, 11200000, 2, '17183835103efjx3mYpa.jpg', '2024-06-14', 'BNI', 'BNI-28-14062024-MHDQH853');

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
(5, 'Zulham Abidin, S.Pd., Gr.', 'Universitas Negeri Makassar', 'pengunjungastri@gmail.com', '0895801138822', 'Lorem', 'pengunjungastri', 'pengunjungastri');

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
  ADD PRIMARY KEY (`id_berita`);

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
  MODIFY `id_berita` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `majalah`
--
ALTER TABLE `majalah`
  MODIFY `id_majalah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_p` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id_sub` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
