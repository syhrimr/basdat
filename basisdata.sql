-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2017 at 05:39 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `basisdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `_doswal`
--

CREATE TABLE IF NOT EXISTS `_doswal` (
  `NIP` varchar(3) NOT NULL,
  `NamaD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `_doswal`
--

INSERT INTO `_doswal` (`NIP`, `NamaD`) VALUES
('101', 'Dr. I Ketut Eddy Purnama, ST., MT.'),
('102', 'Ahmad Zaini, ST., MT.'),
('103', 'Dr. Surya Sumpeno, ST., M.Sc.'),
('104', 'Muhtadin, ST., M.Sc.'),
('105', 'Christyowidiasmoro, ST., M.Sc.'),
('106', 'Dr. Ir. Yoyon Kusnendar Suprapto M.Sc.'),
('107', 'Dr. Supeno Mardi Susiki Nugroho, ST., MT.'),
('108', 'Arief Kurniawan, ST., MT.'),
('109', 'Diah Puspito Wulandari, ST., M.Sc.');

-- --------------------------------------------------------

--
-- Table structure for table `_frs`
--

CREATE TABLE IF NOT EXISTS `_frs` (
  `Kode` varchar(5) NOT NULL,
  `NRP` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `_frs`
--

INSERT INTO `_frs` (`Kode`, `NRP`) VALUES
('TMJ01', '002'),
('TMJ02', '002'),
('TMJ03', '002'),
('TMJ01', '003'),
('TMJ02', '003'),
('TMJ03', '003'),
('TMJ02', '004');

-- --------------------------------------------------------

--
-- Table structure for table `_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `_mahasiswa` (
  `NRP` varchar(3) NOT NULL,
  `Nama` varchar(40) NOT NULL,
  `Asal` varchar(20) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `Semester` int(11) DEFAULT NULL,
  `NIP` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `_mahasiswa`
--

INSERT INTO `_mahasiswa` (`NRP`, `Nama`, `Asal`, `Tanggal`, `Semester`, `NIP`) VALUES
('001', 'Abdul', 'Jombang', '1996-09-10', 4, '101'),
('002', 'Budi', 'Malang', '1996-02-07', 4, '102'),
('003', 'Charly', 'Surabaya', '1996-07-07', 4, '103'),
('004', 'Dani', 'Surabaya', '1996-12-23', 4, '104'),
('005', 'Enno', 'Jakarta', '1996-11-21', 4, '105'),
('006', 'Fani', 'Bandung', '1996-01-07', 4, '106');

-- --------------------------------------------------------

--
-- Table structure for table `_matakuliah`
--

CREATE TABLE IF NOT EXISTS `_matakuliah` (
  `Kode` varchar(5) NOT NULL,
  `ID` int(11) DEFAULT NULL,
  `NamaM` varchar(40) DEFAULT NULL,
  `SKS` varchar(1) DEFAULT NULL,
  `NIP` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `_matakuliah`
--

INSERT INTO `_matakuliah` (`Kode`, `ID`, `NamaM`, `SKS`, `NIP`) VALUES
('TMJ01', 1, 'Aplikasi Komputasi Bergerak', '3', '105'),
('TMJ02', 2, 'Teknik Komputasi dan Lab', '4', '105'),
('TMJ03', 3, 'Interaksi Komputer Manusia', '3', '103'),
('TMJ04', 4, 'Basis Data', '3', '106'),
('TMJ05', 5, 'Desain dan Pengembangan Permainan', '3', '107'),
('TMJ06', 6, 'Jaringan Komputer & Lab', '4', '108'),
('TMJ07', 7, 'Metode Numerik dan Lab', '3', '109');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `_doswal`
--
ALTER TABLE `_doswal`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `_frs`
--
ALTER TABLE `_frs`
  ADD PRIMARY KEY (`Kode`,`NRP`), ADD KEY `fk__frs__mahasiswa1_idx` (`NRP`);

--
-- Indexes for table `_mahasiswa`
--
ALTER TABLE `_mahasiswa`
  ADD PRIMARY KEY (`NRP`,`NIP`), ADD KEY `fk__mahasiswa__doswal_idx` (`NIP`);

--
-- Indexes for table `_matakuliah`
--
ALTER TABLE `_matakuliah`
  ADD PRIMARY KEY (`Kode`,`NIP`), ADD KEY `fk__matakuliah__doswal1_idx` (`NIP`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `_frs`
--
ALTER TABLE `_frs`
ADD CONSTRAINT `fk__frs__mahasiswa1` FOREIGN KEY (`NRP`) REFERENCES `_mahasiswa` (`NRP`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk__frs__matakuliah1` FOREIGN KEY (`Kode`) REFERENCES `_matakuliah` (`Kode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `_mahasiswa`
--
ALTER TABLE `_mahasiswa`
ADD CONSTRAINT `fk__mahasiswa__doswal` FOREIGN KEY (`NIP`) REFERENCES `_doswal` (`NIP`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `_matakuliah`
--
ALTER TABLE `_matakuliah`
ADD CONSTRAINT `fk__matakuliah__doswal1` FOREIGN KEY (`NIP`) REFERENCES `_doswal` (`NIP`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
