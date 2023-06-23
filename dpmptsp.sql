-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 04:44 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dpmptsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama_bidang`) VALUES
(1, 'Bidang 1'),
(2, 'Bidang 2');

-- --------------------------------------------------------

--
-- Table structure for table `dpa`
--

CREATE TABLE `dpa` (
  `id_dpa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `volume` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_satuan` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Jabatan 1'),
(2, 'Jabatan 2');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `kode_rekening` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `kode_rekening`, `nama_kegiatan`) VALUES
(1, 9231, 'Bayar Air'),
(2, 33232, 'Bayar WIFI');

-- --------------------------------------------------------

--
-- Table structure for table `leveluser`
--

CREATE TABLE `leveluser` (
  `id` int(11) NOT NULL,
  `nama_level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leveluser`
--

INSERT INTO `leveluser` (`id`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Kasubag Keuangan'),
(3, 'PPTK'),
(4, 'Bendahara');

-- --------------------------------------------------------

--
-- Table structure for table `npd`
--

CREATE TABLE `npd` (
  `id_npd` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `norek_asal` int(11) NOT NULL,
  `norek_tujuan` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `npd`
--

INSERT INTO `npd` (`id_npd`, `tanggal`, `id_kegiatan`, `norek_asal`, `norek_tujuan`, `id_penerima`, `nominal`, `status`) VALUES
(1, '2021-06-16', 1, 545646, 123123, 1, 10000, 2),
(2, '2021-06-16', 2, 234234, 12323, 2, 200000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `no_rekening` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_pegawai`, `id_bidang`, `id_jabatan`, `no_rekening`) VALUES
(1, 123, 'Budi', 1, 1, 123123),
(2, 123213, 'Jhon Cena', 2, 2, 12323);

-- --------------------------------------------------------

--
-- Table structure for table `spj`
--

CREATE TABLE `spj` (
  `id_spj` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_npd` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `pptk` varchar(50) NOT NULL,
  `disetujui` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spj`
--

INSERT INTO `spj` (`id_spj`, `tanggal`, `id_npd`, `id_pegawai`, `id_kegiatan`, `pptk`, `disetujui`) VALUES
(1, '2021-06-16', 1, 1, 1, 'tes', 'tess');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `namauser` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `namauser`, `username`, `password`, `level`) VALUES
(2, 'Rika, S.kom', 'admin', '$2y$10$.CqjeCxxl54EzaYmHMju.eNv7puzmISNX.IFdx/THNsvUV0S/eyua', 1),
(3, 'boy', 'kasubag', '$2y$10$MjYnHe/0sEbFlDTnZlBbOO04vOM3GziLqGHFZ6MBS8PuU2KwR2BX6', 2),
(4, 'Jhon', 'pptk', '$2y$10$PVAPbUAYbudTl/RBp45r.uBjCKWcCjJVSgi/D95z4AcEfe/GX7EdK', 3),
(5, 'Bend', 'bendahara', '$2y$10$W1rqLH3CDjrmFCgq9nzKZOKCHUzYjYNppmCOZbVTblGIb1P6nxP6K', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `dpa`
--
ALTER TABLE `dpa`
  ADD PRIMARY KEY (`id_dpa`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `leveluser`
--
ALTER TABLE `leveluser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `npd`
--
ALTER TABLE `npd`
  ADD PRIMARY KEY (`id_npd`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `spj`
--
ALTER TABLE `spj`
  ADD PRIMARY KEY (`id_spj`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dpa`
--
ALTER TABLE `dpa`
  MODIFY `id_dpa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leveluser`
--
ALTER TABLE `leveluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `npd`
--
ALTER TABLE `npd`
  MODIFY `id_npd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spj`
--
ALTER TABLE `spj`
  MODIFY `id_spj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
