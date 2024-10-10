-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 05:35 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kurnia-eoq`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisis`
--

CREATE TABLE `analisis` (
  `id_analisis` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `dt_jml_permintaan` int(11) NOT NULL,
  `biaya_pemesanan` int(11) NOT NULL,
  `biaya_penyimpanan` int(11) NOT NULL,
  `hari_aktif` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `eoq` double NOT NULL,
  `rop` double NOT NULL,
  `safety_stok` int(11) NOT NULL,
  `lead_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisis`
--

INSERT INTO `analisis` (`id_analisis`, `id_barang`, `dt_jml_permintaan`, `biaya_pemesanan`, `biaya_penyimpanan`, `hari_aktif`, `periode`, `eoq`, `rop`, `safety_stok`, `lead_time`) VALUES
(2, 1, 99, 100000, 50000, 30, 9, 20, 7, 0, 2),
(3, 2, 216, 100000, 50000, 30, 9, 29, 14, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama_barang` varchar(125) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `id_pengguna`, `nama_barang`, `keterangan`, `harga`, `stok`, `gambar`) VALUES
(1, 2, 3, 'Pakan A', 'kg', '10000', 10, 'images1.jpeg'),
(2, 2, 3, 'Pakan B', 'kg', '10000', 10, 'images1.jpeg'),
(3, 2, 3, 'Pakan C', 'kg', '10000', 10, 'images1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `barang_permintaan`
--

CREATE TABLE `barang_permintaan` (
  `id_bp` int(11) NOT NULL,
  `id_permintaan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_permintaan`
--

INSERT INTO `barang_permintaan` (`id_bp`, `id_permintaan`, `id_barang`, `jumlah`) VALUES
(1, 1, 2, 40),
(2, 2, 2, 50),
(3, 3, 2, 70),
(4, 4, 2, 56),
(5, 5, 1, 40),
(6, 6, 1, 39),
(7, 7, 1, 20),
(8, 8, 2, 30),
(9, 8, 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Vitamin'),
(3, 'Pakan');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `alamat`, `no_hp`, `username`, `password`, `level_user`) VALUES
(1, 'Admin', 'Kuningan, Jawa Barat', '089987654543', 'admin', 'admin', 1),
(2, 'Gudang', 'Kuningan, Jawa Barat', '08512232123', 'gudang', 'gudang', 3),
(3, 'Supplier', 'Kuningan, Jawa Barat', '08991232123', 'supplier', 'supplier', 2),
(4, 'Pemilik', 'Kuningan, Jawa Barat', '089987654323', 'pemilik', 'pemilik', 4);

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `total_bayar` varchar(20) NOT NULL,
  `payment` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id_permintaan`, `tgl`, `total_bayar`, `payment`, `status`) VALUES
(1, '2024-09-01', '400000', '1', 3),
(2, '2024-09-15', '500000', '1', 3),
(3, '2024-09-25', '700000', '1', 3),
(4, '2024-09-30', '560000', '1', 3),
(5, '2024-09-02', '400000', '1', 3),
(6, '2024-09-16', '390000', '1', 3),
(7, '2024-09-26', '200000', '1', 3),
(8, '2024-10-10', '1300000', 'download1.jpeg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisis`
--
ALTER TABLE `analisis`
  ADD PRIMARY KEY (`id_analisis`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_permintaan`
--
ALTER TABLE `barang_permintaan`
  ADD PRIMARY KEY (`id_bp`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisis`
--
ALTER TABLE `analisis`
  MODIFY `id_analisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang_permintaan`
--
ALTER TABLE `barang_permintaan`
  MODIFY `id_bp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
