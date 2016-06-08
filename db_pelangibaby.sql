-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 08 Jun 2016 pada 10.18
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pelangibaby`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_invoices`
--

CREATE TABLE `detail_invoices` (
  `id_detail_invoice` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_invoices`
--

INSERT INTO `detail_invoices` (`id_detail_invoice`, `id_produk`, `jumlah`, `harga`, `id_invoice`) VALUES
(9, 30, 1, 90000, 12),
(10, 30, 1, 90000, 13),
(11, 29, 1, 26000, 13),
(12, 31, 1, 102000, 14),
(13, 31, 1, 102000, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gadget`
--

CREATE TABLE `gadget` (
  `id_gadget` int(11) NOT NULL,
  `judul` varchar(120) NOT NULL,
  `isi` text NOT NULL,
  `letak` enum('l','tp','bp') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gadget`
--

INSERT INTO `gadget` (`id_gadget`, `judul`, `isi`, `letak`) VALUES
(2, 'adada', '<img src="http://localhost/pelangibaby/uploads/banner-top.png" alt="pelangibaby.com">', 'tp'),
(3, 'adada', '<div class="fb-page" data-href="https://www.facebook.com/sofensys.inc/" data-tabs="timline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">\r\n<div class="fb-xfbml-parse-ignore">\r\n<blockquote cite="https://www.facebook.com/sofensys.inc/"><a href="https://www.facebook.com/sofensys.inc/">Sofensys Inc</a></blockquote>\r\n</div>\r\n</div>', 'l'),
(4, 'azacad', '<img src="http://localhost/pelangibaby/uploads/banner-top.png" alt="pelangibaby.com">', 'bp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `id_invoice` int(11) NOT NULL,
  `date` date NOT NULL,
  `due_date` date NOT NULL,
  `feedback` varchar(225) NOT NULL,
  `status_feed` enum('0','1','2') NOT NULL,
  `kode_invoice` varchar(32) NOT NULL,
  `status` enum('tunggu','sukses','batal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoices`
--

INSERT INTO `invoices` (`id_invoice`, `date`, `due_date`, `feedback`, `status_feed`, `kode_invoice`, `status`) VALUES
(13, '2016-04-27', '2016-04-30', 'Terimakasih', '2', 'ki_6f0c10640c7c11e697695ed513dd1', 'tunggu'),
(14, '2016-04-28', '2016-05-01', '', '0', 'ki_c692b5b50d4111e69b106804d9347', 'batal'),
(15, '2016-05-03', '2016-05-06', 'dadadazada', '2', 'ki_443506e3112611e69cc89287ed0f8', 'sukses');

--
-- Trigger `invoices`
--
DELIMITER $$
CREATE TRIGGER `kode_invoices` BEFORE INSERT ON `invoices` FOR EACH ROW BEGIN
	SET NEW.kode_invoice=CONCAT('ki_',REPLACE(uuid(),'-',''));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laman`
--

CREATE TABLE `laman` (
  `id_laman` int(12) NOT NULL,
  `link` varchar(120) NOT NULL,
  `judul` varchar(120) NOT NULL,
  `isi` text NOT NULL,
  `date_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `token` varchar(30) NOT NULL,
  `link` varchar(120) NOT NULL,
  `level` enum('1','2','3') NOT NULL,
  `judul` enum('0','1') NOT NULL,
  `id_level` int(11) NOT NULL,
  `date_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `menu`, `token`, `link`, `level`, `judul`, `id_level`, `date_buat`) VALUES
(4, 'Baju anak-anak', '131318shbsja', '#', '2', '0', 10, '2016-03-24'),
(5, 'Tentang Kami', '3232h3j1', '#', '3', '0', 3, '2016-03-23'),
(6, 'Tentang Kami', '3131jh1gw1', '#', '3', '0', 4, '2016-03-23'),
(7, 'Tentang Kami', '131n1h3j1h31', '#', '3', '0', 4, '2016-03-23'),
(9, 'Tentang kami', 'token_7ef6431cf13d11e5af0234b5', '#', '1', '0', 0, '2016-03-23'),
(10, 'Produk', 'token_8e4b6d31f13d11e5af0234b5', '#', '1', '0', 0, '2016-03-23'),
(13, 'Produk Store', 'token_8fb8845cf14d11e5af0234b5', '#', '2', '1', 10, '2016-03-24');

--
-- Trigger `menu`
--
DELIMITER $$
CREATE TRIGGER `token_menu` BEFORE INSERT ON `menu` FOR EACH ROW BEGIN
	SET NEW.token=CONCAT('token_',REPLACE(uuid(),'-',''));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `fax` text NOT NULL,
  `pesan` text NOT NULL,
  `date_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_invoice`, `nama`, `email`, `alamat`, `telepon`, `hp`, `fax`, `pesan`, `date_buat`) VALUES
(1, 1, 'Sahrul Rizal', 'scodesain@gmail.com', 'sasjaksajbs', '089650239735', '089650239735', 'dada', 'sadada', '2016-03-27'),
(2, 2, 'Sahrul Rizal', 'scodesain@gmail.com', 'sahrulrizal', '0896203897', '019874', '10398019831', 'sasasa', '2016-03-27'),
(3, 3, 'Sahrul Rizal', 'scodesain@gmail.com', 'sahrulrizal', '0896203897', '019874', '10398019831', 'sasasa', '2016-03-27'),
(4, 4, 'Sahrul Rizal', 'scodesain@gmail.com', 'sahrulrizal', '0896203897', '019874', '10398019831', 'sasasa', '2016-03-27'),
(5, 5, 'Sahrul Rizal', 'scodesain@gmail.com', 'sahrulrizal', '0896203897', '019874', '10398019831', 'sasasa', '2016-03-27'),
(6, 6, 'Sahrul Rizal', 'scodesain@gmail.com', 'sahrulrizal', '0896203897', '019874', '10398019831', 'sasasa', '2016-03-27'),
(7, 10, 'Sahrul Rizal', 'sahrulrizal22@gmail.com', 'sahada ', '08962131873131', '8962131873130', '12343253532', 'WARNA UNGU', '2016-04-27'),
(8, 11, 'Sahrul Rizal', 'sahrulrizal22@gmail.com', 'sadada', '08976318', '01838910', '234325322532', 'addasdasdas', '2016-04-27'),
(9, 12, 'Sahrul Rizal', 'sahrulrizal22@gmail.com', 'sadada', '08976318', '01838910', '234325322532', 'addasdasdas', '2016-04-27'),
(10, 13, 'Sahrul Rizal', 'saepulmustopa@yahoo.co.id', 'sadada', '089650239735', '896502313138', '131341', 'sasadada', '2016-04-27'),
(11, 14, 'Sahrul Rizal', 'sahrulrizal22@gmail.com', 'SASDASCSCSADAS', '08962526131', '0896234527', '21421421412', 'asdas', '2016-04-28'),
(12, 15, 'Sahrul Rizal', 'sahrulrizal22@gmail.com', 'sada', '0890898492018', '14719847189798', '147918', 'dasdasdas', '2016-05-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(12) NOT NULL,
  `kode_link` varchar(40) NOT NULL,
  `nama_produk` varchar(120) NOT NULL,
  `img` varchar(120) NOT NULL,
  `harga_satuan` int(12) NOT NULL,
  `id_promo` int(12) NOT NULL,
  `img_thumb` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `id_menu` int(11) NOT NULL,
  `tamp_hd` enum('aktif','tidak') NOT NULL,
  `kategori` varchar(32) NOT NULL,
  `date_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_link`, `nama_produk`, `img`, `harga_satuan`, `id_promo`, `img_thumb`, `keterangan`, `id_menu`, `tamp_hd`, `kategori`, `date_buat`) VALUES
(28, 'baju', 'Baju', 'b8b357bce2370ff1a37e76e1823c5474.png', 106000, 5, '0', '<p>Baju buletin dubuat khusus</p>', 0, 'aktif', 'baju-perempuan', '2016-04-30'),
(29, 'coretan', 'Coretan', 'baju-d.png', 106000, 3, '0', 'Coretan adalah ini 9skadad dadnadada', 0, 'aktif', 'baju', '2016-04-25'),
(30, 'bola', 'Bola', 'baju-bola.png', 100000, 6, '0', 'Baju bola dirancang untuk anda dan untuk kebutuhan anda', 0, 'aktif', 'baju', '2016-04-25'),
(31, 'beautiful-t-shirt', 'Beautiful T-Shirt', 'baju-bola1.png', 102000, 0, '0', '...', 0, 'aktif', 'baju', '2016-04-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `id_promo` int(11) NOT NULL,
  `token` varchar(32) NOT NULL,
  `judul` varchar(120) NOT NULL,
  `img` varchar(120) NOT NULL,
  `isi` text NOT NULL,
  `kode_promo` varchar(10) NOT NULL,
  `potongan` int(11) NOT NULL,
  `link` varchar(120) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `date_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`id_promo`, `token`, `judul`, `img`, `isi`, `kode_promo`, `potongan`, `link`, `kategori`, `date_buat`) VALUES
(3, 'ko22e_e9b68cc1f21f11e58ca9882a39', 'dazaza', 'bg.jpg', '<p>azada</p>', '078913S', 80000, 'dazaza', 'promo', '2016-03-25'),
(4, 'ko22e_60158e49f22711e58ca9882a39', 'PRomo', 'g4947.png', 'sahushaiudhaudhakd', '09sah', 908218, 'promo', 'promo', '2016-03-25'),
(5, 'ko22e_349d0ebaf22c11e58ca9882a39', 'adaj', 'laundry-website.png', '<p>ada</p>', '0198390SA', 9812, 'adaj', 'promo', '2016-03-25'),
(6, 'ko22e_b913714509bf11e6ad639ce9bb', 'Sahrul Rizal analk siapasa dadnajd', 'g49471.png', 'sadadadada', '2s1sasasa', 10000, 'sahrul-rizal-analk-siapasa-dadnajd', 'promo', '2016-04-24');

--
-- Trigger `promo`
--
DELIMITER $$
CREATE TRIGGER `token` BEFORE INSERT ON `promo` FOR EACH ROW BEGIN
	SET NEW.token=CONCAT('ko22e_',REPLACE(uuid(),'-',''));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `img` varchar(120) NOT NULL,
  `judul` varchar(120) NOT NULL,
  `link` varchar(150) NOT NULL,
  `date_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id_slider`, `img`, `judul`, `link`, `date_buat`) VALUES
(4, 'slider.png', 'Contoh 1', '#', '2016-03-12'),
(5, 'slider1.png', 'Contoh 2', '#', '2016-03-12'),
(6, 'slider2.png', 'Contoh 3', '#', '2016-03-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `token` varchar(32) NOT NULL,
  `nama_lengkap` varchar(70) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `verif` enum('0','1') NOT NULL,
  `tgl_buat` date NOT NULL,
  `utama` enum('1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `token`, `nama_lengkap`, `email`, `password`, `status`, `verif`, `tgl_buat`, `utama`) VALUES
(1, 'token_5741d900ddfe11e59a561d1f44', 'Sahrul Rizal', 'admin@gmail.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', '1', '0', '2016-02-28', '1');

--
-- Trigger `user`
--
DELIMITER $$
CREATE TRIGGER `hashpass` BEFORE UPDATE ON `user` FOR EACH ROW BEGIN
 SET NEW.password = SHA1(md5(NEW.password));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `token_user` BEFORE INSERT ON `user` FOR EACH ROW BEGIN
	SET NEW.token=CONCAT('token_',REPLACE(uuid(),'-',''));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `utama`
--

CREATE TABLE `utama` (
  `id` int(12) NOT NULL,
  `nama_brand` varchar(50) NOT NULL,
  `menu` text NOT NULL,
  `email` varchar(120) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `banner` varchar(100) NOT NULL,
  `pk` text NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `tgl_ubah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `utama`
--

INSERT INTO `utama` (`id`, `nama_brand`, `menu`, `email`, `logo`, `banner`, `pk`, `deskripsi`, `tgl_ubah`) VALUES
(1, 'Pelang baby & fashion kids', '<ul class="nav navbar-nav">\n	<li><a href="http://pelangibaby.com/laman/tentang_kami">Tentang kami</a></li>\n	<li class="dropdown mega-dropdown">\n		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Produk<span class="caret"></span></a>				\n		<ul class="dropdown-menu mega-dropdown-menu">\n			\n			<li class="col-sm-3">\n				<ul>\n					<li class="dropdown-header">PRODUK STORE</li>\n					<li><a href="http://pelangibaby.com/kategori/pakaian_baju_perempuan">Pakaian anak Perempuan</a></li>\n					<li><a href="http://pelangibaby.com/kategori/pakaian_baju_laki_laki">Pakaian anak Laki-laki</a></li>\n					<li><a href="<?= site_url(''ketegori/celana_anak_perempuan'')?>">Celana anak Perempuan </a></li>\n					<li><a href="<?= site_url(''ketegori/celana_anak_laki2'')?>">Celana anak Laki-laki</a></li>\n					<li><a href="<?= site_url(''ketegori/stelan_anak_perempuan'')?>">Stelan anak Perempuan </a></li>\n					<li><a href="<?= site_url(''ketegori/stelan_anak_laki2'')?>">Stelan anak Laki-laki</a></li>\n				</ul>\n			</li>\n			<li class="col-sm-3">\n				<ul>\n					<li class="dropdown-header">AKSESORIS</li>\n					<li><a href="<?= site_url(''ketegori/sepatu'')?>">Sepatu</a></li>\n					<li><a href="<?= site_url(''ketegori/sendal'')?>">Sendal</a></li>\n					<li><a href="<?= site_url(''ketegori/jaket'')?>">Jaket</a></li>                            \n					<li><a href="<?= site_url(''ketegori/jam_tangan'')?>">Jam tangan</a></li>\n					<li><a href="<?= site_url(''ketegori/hijab_anak'')?>">Hijab anak</a></li>								\n				</ul>\n			</li>\n		</ul>				\n	</li>\n	<li><a href="http://pelangibaby.com/kategori/promo">Event & Promo</a></li>\n        <li><a href="http://pelangibaby.com/feedback">Feedback</a></li>\n</ul>', 'support@pelangibaby.com', 'logopelangi.png', 'setelah_search_imusic.png', '-\r\n', 'Pelangibaby and Kids fashion', '2016-04-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_invoices`
--
ALTER TABLE `detail_invoices`
  ADD PRIMARY KEY (`id_detail_invoice`);

--
-- Indexes for table `gadget`
--
ALTER TABLE `gadget`
  ADD PRIMARY KEY (`id_gadget`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `laman`
--
ALTER TABLE `laman`
  ADD PRIMARY KEY (`id_laman`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`token`);

--
-- Indexes for table `utama`
--
ALTER TABLE `utama`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_invoices`
--
ALTER TABLE `detail_invoices`
  MODIFY `id_detail_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `gadget`
--
ALTER TABLE `gadget`
  MODIFY `id_gadget` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `laman`
--
ALTER TABLE `laman`
  MODIFY `id_laman` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `utama`
--
ALTER TABLE `utama`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
