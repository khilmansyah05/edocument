-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 04:35 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edocument`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(2) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'HR'),
(2, 'ACCOUNTING'),
(3, 'GE'),
(4, 'ICT'),
(5, 'CS'),
(6, 'OS'),
(7, 'PARKING'),
(8, 'EQUIPMENT'),
(10, 'LOGISTIK');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(1) NOT NULL,
  `nama` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama`) VALUES
(1, 'admin'),
(2, 'spv'),
(3, 'staff administra'),
(4, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `NIK` varchar(18) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `divisi` int(2) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` int(11) NOT NULL,
  `edit_date` date NOT NULL,
  `edit_by` int(11) NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `NIK`, `username`, `password`, `level`, `divisi`, `create_date`, `create_by`, `edit_date`, `edit_by`, `user_status`) VALUES
(1, 'admin', '1926789', 'admin', '0192023a7bbd73250516f069df18b500', 1, 7, '2020-02-26 17:40:15', 0, '2020-03-01', 1, 0),
(2, 'spvparkir', '1935674', 'spvparkir', '21232f297a57a5a743894a0e4a801fc3', 2, 7, '2020-02-26 17:40:15', 0, '0000-00-00', 0, 0),
(3, 'staff', '1945677', 'staff', '21232f297a57a5a743894a0e4a801fc3', 3, 4, '2020-02-26 17:40:15', 0, '0000-00-00', 0, 0),
(4, 'manager', '1945697', 'manager', '21232f297a57a5a743894a0e4a801fc3', 4, 1, '2020-02-26 17:40:15', 0, '0000-00-00', 0, 0),
(5, 'syah', '123', 'syah', '07c412e8da8fbab2eb89d632b898caf3', 1, 7, '2020-03-01 15:10:55', 1, '0000-00-00', 0, 0),
(6, 'khilman', '987890', 'khilman', 'a9ce221f9a14331ecd3acbe1c3bb5c93', 4, 5, '2020-03-01 15:14:41', 1, '0000-00-00', 0, 0),
(9, 'denis', '654789', 'denis', 'c3875d07f44c422f3b3bc019c23e16ae', 1, 4, '2020-03-01 15:22:33', 1, '0000-00-00', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD KEY `level` (`level`),
  ADD KEY `divisi` (`divisi`),
  ADD KEY `divisi_2` (`divisi`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
