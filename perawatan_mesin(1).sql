-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2025 at 08:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perawatan_mesin`
--

-- --------------------------------------------------------

--
-- Table structure for table `mesin`
--

CREATE TABLE `mesin` (
  `id` int(11) NOT NULL,
  `nama_mesin` varchar(100) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mesin`
--

INSERT INTO `mesin` (`id`, `nama_mesin`, `lokasi`, `tanggal_pembelian`, `keterangan`) VALUES
(1, 'mesin jahit', 'jakarta barat', '2025-09-12', 'mesin rusak'),
(2, 'mesin bobor', 'jakarta pusat', NULL, 'ingin di service'),
(3, 'Mesin A', 'Gudang 1', NULL, 'Mesin Produksi A'),
(4, 'Mesin B', 'Gudang 2', NULL, 'Mesin Cadangan');

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

CREATE TABLE `perawatan` (
  `id` int(11) NOT NULL,
  `id_mesin` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perawatan`
--

INSERT INTO `perawatan` (`id`, `id_mesin`, `tanggal`, `deskripsi`, `keterangan`) VALUES
(4, 2, '2025-09-27', NULL, 'lagi rusak'),
(5, 3, '2025-09-26', NULL, 'benar\r\n'),
(6, 4, '2025-10-04', NULL, 'sudah dimperbaikann');

-- --------------------------------------------------------

--
-- Table structure for table `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id` int(11) NOT NULL,
  `id_mesin` int(11) DEFAULT NULL,
  `tanggal_kerusakan` date DEFAULT NULL,
  `deskripsi_kerusakan` text DEFAULT NULL,
  `tindakan_perbaikan` text DEFAULT NULL,
  `tanggal_perbaikan` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perbaikan`
--

INSERT INTO `perbaikan` (`id`, `id_mesin`, `tanggal_kerusakan`, `deskripsi_kerusakan`, `tindakan_perbaikan`, `tanggal_perbaikan`, `keterangan`) VALUES
(5, 4, '2025-09-05', 'tidak bisa', 'service bagian mesin', '2025-10-07', 'harus selesai sebelum tanggal perbaikan'),
(6, 2, '2025-10-11', 'bagian mesin ada kerusakan', 'service dengan berskala tinggi', '2025-10-09', 'belom pasti'),
(7, 2, '2025-09-13', 'bagian dalem mesin dan tombol mesin', 'harus beres dengan berskala tinggi', '2025-10-10', 'sedang perbaikan'),
(8, 3, '2025-09-12', 'rusak parah', 'harus service skala besar', '2025-10-05', 'belom bereeees'),
(9, 4, '2025-09-03', 'rusak di bagian tombol', 'service', '2025-10-11', 'sedang perbaikaan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('Admin','Teknisi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'Admin'),
(2, 'teknisi', 'teknisi', 'Teknisi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','teknisi') DEFAULT 'teknisi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(2, 'admin', '0192023a7bbd73250516f069df18b500', 'admin'),
(3, 'teknisi1', '968804b0281d865a7fc03a3cfb15933f', 'teknisi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mesin` (`id_mesin`);

--
-- Indexes for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mesin` (`id_mesin`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mesin`
--
ALTER TABLE `mesin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD CONSTRAINT `perawatan_ibfk_1` FOREIGN KEY (`id_mesin`) REFERENCES `mesin` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD CONSTRAINT `perbaikan_ibfk_1` FOREIGN KEY (`id_mesin`) REFERENCES `mesin` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
