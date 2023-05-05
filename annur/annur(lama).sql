-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2022 at 01:38 PM
-- Server version: 5.6.51
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `annur`
--

-- --------------------------------------------------------

--
-- Table structure for table `hakim`
--

CREATE TABLE `hakim` (
  `login_id` varchar(8) NOT NULL,
  `login_pwd` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hakim`
--

INSERT INTO `hakim` (`login_id`, `login_pwd`, `nama`) VALUES
('hakim1', '827ccb0eea8a706c4c34a16891f84e7b', 'HASIF'),
('hakim2', '827ccb0eea8a706c4c34a16891f84e7b', 'MIRA FILZAH');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kod_kelas` varchar(7) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kod_kelas`, `nama_kelas`) VALUES
('BBB001', 'AMANAH'),
('BBB002', 'BAKTI'),
('BBB003', 'CEKAP'),
('BBB004', 'DAMAI');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `nokp_peserta` varchar(12) NOT NULL,
  `nama_peserta` varchar(255) NOT NULL,
  `no_telefon` varchar(11) NOT NULL,
  `kod_kelas` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`nokp_peserta`, `nama_peserta`, `no_telefon`, `kod_kelas`) VALUES
('070312100364', 'HASHIM SANTOSO ALFONSO DE RAGUTI', '0126110527', 'BBB002'),
('070421030945', 'AWI FOWARD', '01137195508', 'BBB001'),
('070815105432', 'AIMAN TEMBAM', '0114317541', 'BBB003'),
('070910100697', 'YAKOB', '0138000800', 'BBB004'),
('071212105437', 'ADIB BUNCIT', '0145451306', 'BBB001');

-- --------------------------------------------------------

--
-- Table structure for table `skor`
--

CREATE TABLE `skor` (
  `id` int(3) NOT NULL,
  `lancar` int(2) NOT NULL,
  `lagu` int(2) NOT NULL,
  `suara` int(2) NOT NULL,
  `tertib` int(2) NOT NULL,
  `nokp_peserta` varchar(12) NOT NULL,
  `login_id` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skor`
--

INSERT INTO `skor` (`id`, `lancar`, `lagu`, `suara`, `tertib`, `nokp_peserta`, `login_id`) VALUES
(1, 35, 7, 9, 9, '070815105432', 'hakim1'),
(2, 5, 1, 1, 1, '071212105437', 'hakim1'),
(6, 50, 30, 10, 10, '070312100364', 'hakim2'),
(7, 35, 25, 7, 10, '070910100697', 'hakim2'),
(8, 49, 29, 9, 10, '070312100364', 'hakim1'),
(9, 46, 17, 7, 10, '070910100697', 'hakim1'),
(10, 14, 13, 6, 10, '071212105437', 'hakim2'),
(11, 24, 18, 7, 10, '070815105432', 'hakim2'),
(12, 46, 28, 10, 10, '070421030945', 'hakim1'),
(13, 43, 25, 10, 10, '070421030945', 'hakim2');

-- --------------------------------------------------------

--
-- Table structure for table `urusetia`
--

CREATE TABLE `urusetia` (
  `login_id` varchar(8) NOT NULL,
  `login_pwd` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urusetia`
--

INSERT INTO `urusetia` (`login_id`, `login_pwd`, `nama`) VALUES
('admin', 'c93ccd78b2076528346216b3b2f701e6', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hakim`
--
ALTER TABLE `hakim`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kod_kelas`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`nokp_peserta`),
  ADD KEY `kod_kelas` (`kod_kelas`);

--
-- Indexes for table `skor`
--
ALTER TABLE `skor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN KEY` (`login_id`),
  ADD KEY `PRIMARY PESERTA` (`nokp_peserta`),
  ADD KEY `PRIMARY HAKIM` (`login_id`);

--
-- Indexes for table `urusetia`
--
ALTER TABLE `urusetia`
  ADD PRIMARY KEY (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `skor`
--
ALTER TABLE `skor`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`kod_kelas`) REFERENCES `kelas` (`kod_kelas`);

--
-- Constraints for table `skor`
--
ALTER TABLE `skor`
  ADD CONSTRAINT `skor_ibfk_1` FOREIGN KEY (`nokp_peserta`) REFERENCES `peserta` (`nokp_peserta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skor_ibfk_2` FOREIGN KEY (`login_id`) REFERENCES `hakim` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
