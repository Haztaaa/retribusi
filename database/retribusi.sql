-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 04:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `retribusi`
--

-- --------------------------------------------------------

--
-- Table structure for table `lunas`
--

CREATE TABLE `lunas` (
  `id_lunas` int(11) NOT NULL,
  `id_pedagang` int(11) NOT NULL,
  `nama_bulan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lunas`
--

INSERT INTO `lunas` (`id_lunas`, `id_pedagang`, `nama_bulan`, `keterangan`) VALUES
(1, 4, 'May', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `pedagang`
--

CREATE TABLE `pedagang` (
  `id_pedagang` int(11) NOT NULL,
  `id_sektor` int(11) NOT NULL,
  `nama_pedagang` varchar(255) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_lapak` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pedagang`
--

INSERT INTO `pedagang` (`id_pedagang`, `id_sektor`, `nama_pedagang`, `nik`, `no_rekening`, `tgl_lahir`, `alamat`, `no_lapak`, `foto`) VALUES
(2, 1, 'Harly Poluan', '2111123333333423', '', '2023-04-05', 'Woloan 3', '2323', 'logo-asus-png-7170.png'),
(3, 2, 'Tes', '123', '', '2023-04-20', 'Woloan1', '2323323232', 'EVOS_Esports_Logo_-_Download_Free_Vector_PNG1.png'),
(4, 1, 'Jack Poluan', '12345', '', '2023-04-12', 'tomohon', '11111', 'PGTA5460098890_jpg.jpg'),
(5, 1, 'krauzer', '1122', '', '2023-05-17', 'Tomohon', '123', 'pngwing_com1.png'),
(6, 1, 'Tes', '111111', '23232321111111', '2023-05-15', 'tomohon', '2222', 'PGTA5460098890_jpg1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pedagang` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pedagang`, `tgl_pembayaran`) VALUES
(1, 4, '2023-05-01'),
(2, 4, '2023-05-02'),
(3, 4, '2023-04-05'),
(4, 4, '2023-05-03'),
(5, 4, '2023-05-05'),
(6, 4, '2023-05-06'),
(7, 4, '2023-04-04'),
(8, 3, '2023-05-05'),
(9, 3, '2023-05-14'),
(10, 5, '2023-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `sektor`
--

CREATE TABLE `sektor` (
  `id_sektor` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_sektor` varchar(255) NOT NULL,
  `tagihan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sektor`
--

INSERT INTO `sektor` (`id_sektor`, `id_user`, `nama_sektor`, `tagihan`) VALUES
(1, 4, 'Barito', '30000'),
(2, 7, 'Campuran', '35000'),
(3, 7, 'Foodcourt 1', '45000');

-- --------------------------------------------------------

--
-- Table structure for table `tunggakan`
--

CREATE TABLE `tunggakan` (
  `id_tunggakan` int(11) NOT NULL,
  `id_pedagang` int(11) NOT NULL,
  `tgl_tunggakan` date NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tunggakan`
--

INSERT INTO `tunggakan` (`id_tunggakan`, `id_pedagang`, `tgl_tunggakan`, `total`) VALUES
(1, 4, '2023-05-14', '30000'),
(2, 4, '2023-05-15', '30000'),
(3, 2, '2023-05-14', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `level` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `no_hp`, `alamat`, `level`) VALUES
(1, 'Admin', 'Admin', '12345', '123', 'Wol', 'Admin'),
(4, 'Hizkiaa', 'kia', '123456', '0882323', 'Woloan1', 'Pegawai'),
(7, 'Jack Pol', 'pol', '12345', '23232', 'Wol', 'Pegawai'),
(8, 'John wick', 'monitor', '12345', '0823231123', 'wwwaaa', 'Monitor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lunas`
--
ALTER TABLE `lunas`
  ADD PRIMARY KEY (`id_lunas`);

--
-- Indexes for table `pedagang`
--
ALTER TABLE `pedagang`
  ADD PRIMARY KEY (`id_pedagang`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `sektor`
--
ALTER TABLE `sektor`
  ADD PRIMARY KEY (`id_sektor`);

--
-- Indexes for table `tunggakan`
--
ALTER TABLE `tunggakan`
  ADD PRIMARY KEY (`id_tunggakan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lunas`
--
ALTER TABLE `lunas`
  MODIFY `id_lunas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pedagang`
--
ALTER TABLE `pedagang`
  MODIFY `id_pedagang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sektor`
--
ALTER TABLE `sektor`
  MODIFY `id_sektor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tunggakan`
--
ALTER TABLE `tunggakan`
  MODIFY `id_tunggakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
