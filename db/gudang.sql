-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2022 at 03:44 AM
-- Server version: 5.7.10-log
-- PHP Version: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `dtl_nota`
--

CREATE TABLE `dtl_nota` (
  `id_dtl` int(11) NOT NULL,
  `id_nota` varchar(25) DEFAULT NULL,
  `nama_brg` varchar(100) DEFAULT NULL,
  `sat1` varchar(45) DEFAULT NULL,
  `sat2` varchar(45) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dtl_nota`
--

INSERT INTO `dtl_nota` (`id_dtl`, `id_nota`, `nama_brg`, `sat1`, `sat2`, `status`) VALUES
(3, 'NT20090002', 'Kain Prima Elar A', '14 Box = 350 Pin', '12.550,- Yds', '0'),
(4, 'NT20090002', 'Kain Prima Elar A C.2', '14 Box = 350 Pin', '12.550,- Yds', '0'),
(5, 'NT20090002', 'Kain Prima Elar P.13', '15 Box = 375 Pin', '13.875,- Yds', '0'),
(6, 'NT20090003', 'Kain Kafan', '10 Bgr', '12.550,- Yds', '0'),
(7, 'NT20090003', 'Kain Kafan Premium', '10 Bgr', '12.550,- Yds', '0'),
(8, 'NT20090003', 'Kain Kafan Premium Polkadot', '10 Bgr', '12.550,- Yds', '0'),
(9, 'NT20090003', 'Kain Kafan Motif Bunga', '10 Bgr', '12.550,- Yds', '0'),
(12, 'NT20100001', 'gdsgdg', 'd', 'd', '0'),
(13, 'NT20110001', 'asdsa', 'sd', 'asd', '0'),
(14, 'NT20110001', 'sads', 'sad', 'asd', '0'),
(15, 'NT20110001', 'sadasd', 'as', 'asd', '0');

-- --------------------------------------------------------

--
-- Table structure for table `nota_barang_keluar`
--

CREATE TABLE `nota_barang_keluar` (
  `id_nota` varchar(10) NOT NULL,
  `nomor` varchar(25) DEFAULT NULL,
  `tujuan` text,
  `order_penj` varchar(100) DEFAULT NULL,
  `tgl_order` date DEFAULT NULL,
  `ket` text,
  `tgl_nota` date DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nota_barang_keluar`
--

INSERT INTO `nota_barang_keluar` (`id_nota`, `nomor`, `tujuan`, `order_penj`, `tgl_order`, `ket`, `tgl_nota`, `status`) VALUES
('NT20090002', '452/CK/GD/VIII/2020', 'Bapak Loetfy Attuwy\r\nManyar Kertoarjo 1/12 RT.001 RW.006\r\nManyarsabrangan Mulyorejo Surabaya', '452/CK/VIII/2020', '2020-09-09', 'Penjualan Barang\r\nDaftar Perincian Terlampir\r\nBarang milik Bapak Loetfy Attuwy\r\nBarang dikirim ke : Bapak Fikri\r\nUD Warna Indah Jl. Panggang No.115 Surabaya', '2020-09-09', '0'),
('NT20090003', '453/CK/GD/VIII/2020', 'Ibu Katemi\r\nBojong Kenyot', '453/CK/VIII/2020', '2020-09-11', 'Barang dikirim ke\r\nIbu Katemi\r\nBojong Kenyot\r\nRincian Terlampir', '2020-09-11', '0'),
('NT20100001', 'fff/23', 'fdghf', 'ewdz', '2020-10-16', 'hdghdf', '2020-10-16', '0'),
('NT20110001', 'asdsfas', 'sdasd', 'sdasds', '2020-11-10', '', '2020-11-10', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `hak_akses` enum('Admin','Adku','Niaga','Direksi','Super Admin','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `hak_akses`) VALUES
(2, 'cak', 'c4ca4238a0b923820dcc509a6f75849b', 'Admin'),
(3, 'cuk', 'c81e728d9d4c2f636f067f89cc14862c', 'Direksi'),
(4, 'coy', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Adku'),
(5, 'can', '2c61ebff5a7f675451467527df66788d', 'Super Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dtl_nota`
--
ALTER TABLE `dtl_nota`
  ADD PRIMARY KEY (`id_dtl`);

--
-- Indexes for table `nota_barang_keluar`
--
ALTER TABLE `nota_barang_keluar`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dtl_nota`
--
ALTER TABLE `dtl_nota`
  MODIFY `id_dtl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
