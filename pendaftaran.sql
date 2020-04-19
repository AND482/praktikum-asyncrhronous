-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 03:02 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formpendaftaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `namapanggilan` varchar(255) NOT NULL,
  `stanbuk` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `namalengkap`, `namapanggilan`, `stanbuk`, `username`, `email`, `jurusan`, `state`, `prodi`, `gender`, `phonenumber`, `address`, `alasan`, `waktu`, `foto`) VALUES
(1, 'Andi Nurmala Darni', 'AND', 42518031, 'andinurmala', 'andinurmaladarni@gmail.com', 'Teknik Elektro', 'D-IV', 'TEKNIK KOMPUTER DAN JARINGAN', 'perempuan', '081342700173', 'Jl.manuruki', 'saya merasa senang ketika bermain volly', '2020-04-19 19:54:13', 'andinurmala.jpg'),
(2, 'Andika Dwi Putra', 'Dika', 42518032, 'andika', 'andikadwi@gmail.com', 'Teknik Elektro', 'D-IV', 'TEKNIK KOMPUTER DAN JARINGAN', 'laki-laki', '081324734333', 'Jl.poiteknik', 'saya suka bermain volly', '2020-04-19 19:55:57', 'andika.jpg'),
(3, 'Ayudia Annisa', 'ayu', 42518033, 'ayudia', 'ayudianisa12@gmail.com', 'Teknik Elektro', 'D-IV', 'TEKNIK KOMPUTER DAN JARINGAN', 'perempuan', '085276808276', 'Jl.dirgantara', 'volly sudah menjadi hobby saya sejak kecil', '2020-04-19 19:57:39', 'ayudia.jpg'),
(4, 'Adinda Ratna Dewi', 'Ratna', 42518034, 'adindaratna', 'aratnad@gmail.com', 'Teknik Elektro', 'D-IV', 'TEKNIK KOMPUTER DAN JARINGAN', 'perempuan', '087658548076', 'Jl.sulawesi', 'saya ingin mencoba hal yang baru.', '2020-04-19 19:59:57', 'adindaratna.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
