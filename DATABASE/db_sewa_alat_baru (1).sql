-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2020 at 05:36 PM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sewa_alat_baru`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `kontak_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nama_pelanggan`, `kontak_pelanggan`, `alamat_pelanggan`, `level`) VALUES
(4, 'andimukhlisheriyan11@gmail.com', '12345678', 'Andi Mukhlis Heriyan', '081345264027', 'Jl.Tebu Gg.Musyawarah No.57', 'penyewa'),
(5, 'rugaiyah@gmail.com', '12345678', 'rugaiyah', '081345452121', 'Jl.Imam Bonjol Gg.Bansir 1', 'penyewa'),
(6, '1@gmail.com', '1', '1', '1', '1', 'penyewa'),
(7, '999', '909', '090', '0099', '   987     ', 'penyewa');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id_slider` int(11) NOT NULL,
  `foto_slider` varchar(100) NOT NULL,
  `tanggal_slider` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `foto_slider`, `tanggal_slider`) VALUES
(8, 'slide_1.jpg', '2020-07-01'),
(9, 'slide_2.jpg', '2020-07-02'),
(11, '84Tulips.jpg', '2020-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `kode_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `level` enum('superadmin') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=901 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`kode_user`, `username`, `password`, `nama_lengkap`, `level`) VALUES
(900, '123', '123', 'FERRY FAHRIZAL', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE IF NOT EXISTS `tb_barang` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `foto_menu` varchar(100) NOT NULL,
  `deskripsi_menu` text NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_menu`, `nama_menu`, `harga_menu`, `stok`, `foto_menu`, `deskripsi_menu`, `tanggal_masuk`) VALUES
(23, 'Tenda Dome Consina', 50000, 2, 'tendaconsina.jpg', '			Tenda Dome Kapasitas 1-4 Orang 		', '2020-07-01'),
(24, 'Tenda Dome Loreng', 40000, 9, 'tendadome1.jpg', '			Tenda dome dengan kapasitas 1-3 orang 		', '2020-07-01'),
(25, 'Hamock', 10000, 15, 'hamock.jpg', '			Hamock dengan kapasitas 180 kg (harap pakai sesuai kapasitas hamock) 1-2 orang		', '2020-07-01'),
(26, 'Sleping Bag', 15000, 0, 'sleping bag.jpg', '			Selimut dengan bahan tebal hanya untuk 1 orang pribadi (cocok digunakan untuk di outdoor)		', '2020-07-01'),
(27, 'Matras', 10000, 0, 'matras.jpg', '			Matras warna hitam untuk pribadi digunakan untuk alas tidur untuk outdoor		', '2020-07-01'),
(28, 'Kompor Mini Kotak', 10000, 0, 'kompor.jpg', '			kompor mini menggunakan gas portable 		', '2020-07-01'),
(29, 'Senter Led Outdoor', 10000, 0, 'senter.jpg', '			Senter Led Outdoor sangat cocok digunakan untuk perjalanan pendakian dan juga perkemahan/camp di hutan (outdoor).		', '2020-07-01'),
(30, 'Tas Rei 60 Liter', 25000, 0, 'tasrei.jpg', '			Tas Rei 60 Liter digunakan untuk membawa peralatan pribadi		', '2020-07-01'),
(31, 'Tas Rei Elbrus 60 Liter', 25000, 0, 'tasrei1.jpg', '			Tas Rei 60 Liter digunakan untuk membawa peralatan pribadi		', '2020-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bayar`
--

CREATE TABLE IF NOT EXISTS `tb_bayar` (
  `id_bayar` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `no_bayar` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `ket_bayar` varchar(100) NOT NULL,
  `file_bayar` text NOT NULL,
  `file_ktp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sewa`
--

CREATE TABLE IF NOT EXISTS `tb_sewa` (
  `id_sewa` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `jumlah_sewa` int(11) NOT NULL,
  `total_sewa` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_akhir_sewa` date NOT NULL,
  `lokasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `status1` varchar(100) NOT NULL,
  `status2` varchar(100) NOT NULL,
  `lama_denda` int(11) NOT NULL,
  `nilai_denda` int(11) NOT NULL,
  `no_bayar` varchar(100) NOT NULL,
  `nama` text NOT NULL,
  `bank` varchar(100) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `ket_bayar` text NOT NULL,
  `file_bayar` text NOT NULL,
  `file_ktp` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_pelanggan`, `kode_transaksi`, `tgl_transaksi`, `status1`, `status2`, `lama_denda`, `nilai_denda`, `no_bayar`, `nama`, `bank`, `jumlah_bayar`, `tgl_bayar`, `ket_bayar`, `file_bayar`, `file_ktp`) VALUES
(5, 6, 'LEX00001', '2020-09-08', 'dalam keranjang', 'dalam keranjang', 0, 0, '', '', '', 0, '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_uraian_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_uraian_transaksi` (
  `id_uraian` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `jumlah_sewa` int(11) NOT NULL,
  `total_sewa` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_akhir_sewa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`kode_user`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tb_sewa`
--
ALTER TABLE `tb_sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_uraian_transaksi`
--
ALTER TABLE `tb_uraian_transaksi`
  ADD PRIMARY KEY (`id_uraian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=901;
--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_sewa`
--
ALTER TABLE `tb_sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_uraian_transaksi`
--
ALTER TABLE `tb_uraian_transaksi`
  MODIFY `id_uraian` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
