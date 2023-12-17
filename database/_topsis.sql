-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 03:33 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_eks`
--

-- --------------------------------------------------------

--
-- Table structure for table `tab_alternatif`
--

CREATE TABLE `tab_alternatif` (
  `id_alternatif` int(10) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_alternatif`
--

INSERT INTO `tab_alternatif` (`id_alternatif`, `nama_alternatif`) VALUES
(1, 'Dosen1'),
(2, 'Dosen2'),
(3, 'Dosen3'),
(4, 'Dosen4'),
(5, 'Dosen5'),
(6, 'Dosen6'),
(7, 'Dosen7'),
(8, 'Dosen8'),
(9, 'Dosen9'),
(10, 'Dosen10'),
(11, 'Dosen11'),
(12, 'Dosen12'),
(13, 'Dosen13'),
(14, 'Dosen14'),
(15, 'Dosen15'),
(16, 'Dosen16'),
(17, 'Dosen17'),
(18, 'Dosen18'),
(19, 'Dosen19'),
(20, 'Dosen20');

-- --------------------------------------------------------

--
-- Table structure for table `tab_kriteria`
--

CREATE TABLE `tab_kriteria` (
  `id_kriteria` int(10) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot` float NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_kriteria`
--

INSERT INTO `tab_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `status`) VALUES
(1, 'Materi Prestasi', 0.1875, 'Benefit'),
(2, 'Presentasi', 0.1875, 'Benefit'),
(3, 'Wawancara', 0.1875, 'Benefit'),
(4, 'Kepribadian', 0.1875, 'Benefit'),
(5, 'Penelitian Internasional', 0.07, 'Benefit'),
(6, 'Penelitian Nasional', 0.06, 'Benefit'),
(7, 'Ijazah', 0.03, 'Benefit'),
(8, 'Modal Pembuatan Modul', 0.029, 'Cost'),
(9, 'Membimbing Skripsi', 0.029, 'Benefit'),
(10, 'Pengabdian', 0.032, 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `tab_topsis`
--

CREATE TABLE `tab_topsis` (
  `id_alternatif` int(10) NOT NULL,
  `id_kriteria` int(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_topsis`
--

INSERT INTO `tab_topsis` (`id_alternatif`, `id_kriteria`, `nilai`) VALUES
(1, 1, 10),
(1, 2, 5),
(1, 3, 5),
(1, 4, 9),
(1, 5, 4),
(1, 6, 6),
(1, 7, 5),
(1, 8, 1),
(1, 9, 8),
(2, 1, 6),
(2, 2, 8),
(2, 3, 6),
(2, 4, 8),
(2, 5, 6),
(2, 6, 8),
(2, 7, 5),
(2, 8, 3),
(2, 9, 10),
(3, 1, 5),
(3, 2, 5),
(3, 3, 8),
(3, 4, 5),
(3, 5, 4),
(3, 6, 4),
(3, 7, 5),
(3, 8, 2),
(3, 9, 8),
(4, 1, 6),
(4, 2, 5),
(4, 3, 9),
(4, 4, 9),
(4, 5, 0),
(4, 6, 4),
(4, 7, 5),
(4, 8, 2),
(4, 9, 4),
(5, 1, 9),
(5, 2, 6),
(5, 3, 9),
(5, 4, 5),
(5, 5, 4),
(5, 6, 6),
(5, 7, 10),
(5, 8, 3),
(5, 9, 8),
(6, 1, 5),
(6, 2, 6),
(6, 3, 9),
(6, 4, 5),
(6, 5, 4),
(6, 6, 6),
(6, 7, 10),
(6, 8, 1),
(6, 9, 8),
(7, 1, 9),
(7, 2, 5),
(7, 3, 7),
(7, 4, 8),
(7, 5, 6),
(7, 6, 0),
(7, 7, 10),
(7, 8, 1),
(7, 9, 4),
(8, 1, 7),
(8, 2, 5),
(8, 3, 5),
(8, 4, 8),
(8, 5, 8),
(8, 6, 4),
(8, 7, 10),
(8, 8, 2),
(8, 9, 10),
(9, 1, 9),
(9, 2, 8),
(9, 3, 9),
(9, 4, 5),
(9, 5, 0),
(9, 6, 8),
(9, 7, 10),
(9, 8, 3),
(9, 9, 4),
(10, 1, 9),
(10, 2, 6),
(10, 3, 7),
(10, 4, 9),
(10, 5, 10),
(10, 6, 6),
(10, 7, 10),
(10, 8, 3),
(10, 9, 10),
(11, 1, 6),
(11, 2, 5),
(11, 3, 5),
(11, 4, 5),
(11, 5, 4),
(11, 6, 8),
(11, 7, 5),
(11, 8, 2),
(11, 9, 6),
(12, 1, 5),
(12, 2, 5),
(12, 3, 8),
(12, 4, 6),
(12, 5, 6),
(12, 6, 6),
(12, 7, 10),
(12, 8, 1),
(12, 9, 4),
(13, 1, 8),
(13, 2, 7),
(13, 3, 8),
(13, 4, 9),
(13, 5, 0),
(13, 6, 6),
(13, 7, 5),
(13, 8, 2),
(13, 9, 6),
(14, 1, 7),
(14, 2, 8),
(14, 3, 6),
(14, 4, 9),
(14, 5, 6),
(14, 6, 8),
(14, 7, 5),
(14, 8, 2),
(14, 9, 10),
(15, 1, 6),
(15, 2, 7),
(15, 3, 8),
(15, 4, 8),
(15, 5, 4),
(15, 6, 4),
(15, 7, 10),
(15, 8, 2),
(15, 9, 4),
(16, 1, 9),
(16, 2, 6),
(16, 3, 7),
(16, 4, 9),
(16, 5, 0),
(16, 6, 4),
(16, 7, 10),
(16, 8, 1),
(16, 9, 6),
(17, 1, 1),
(17, 2, 8),
(17, 3, 9),
(17, 4, 7),
(17, 5, 8),
(17, 6, 8),
(17, 7, 5),
(17, 8, 3),
(17, 9, 8),
(18, 1, 5),
(18, 2, 6),
(18, 3, 5),
(18, 4, 8),
(18, 5, 4),
(18, 6, 6),
(18, 7, 5),
(18, 8, 3),
(18, 9, 8),
(19, 1, 4),
(19, 2, 6),
(19, 3, 6),
(19, 4, 8),
(19, 5, 6),
(19, 6, 0),
(19, 7, 10),
(19, 8, 2),
(19, 9, 4),
(20, 1, 8),
(20, 2, 8),
(20, 3, 8),
(20, 4, 9),
(20, 5, 0),
(20, 6, 10),
(20, 7, 5),
(20, 8, 3),
(20, 9, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_alternatif`
--
ALTER TABLE `tab_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `tab_kriteria`
--
ALTER TABLE `tab_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tab_topsis`
--
ALTER TABLE `tab_topsis`
  ADD PRIMARY KEY (`id_alternatif`,`id_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tab_topsis`
--
ALTER TABLE `tab_topsis`
  ADD CONSTRAINT `tab_topsis_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `tab_kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
