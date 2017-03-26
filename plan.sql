-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2017 at 05:51 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `your_plan`
--

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `plan_place` varchar(255) NOT NULL,
  `plan_address` varchar(255) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `time_to_prepare` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `done` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `id_user`, `plan_name`, `plan_place`, `plan_address`, `lat`, `lng`, `date`, `time`, `time_to_prepare`, `description`, `done`) VALUES
(1, 1, 'Futsal', 'Hotel NEO Melawai', 'Jl. Panglima Polim Raya No.15, RT.3/RW.1, Melawai, Kebayoran Baru, South Jakarta City, Jakarta 12160', -6.245586, 106.798531, '2017-03-25', '13:00:00', '00:00:00', 'Have fun', 'n'),
(2, 1, 'Voli', 'Hotel NEO Melawai', 'Jl. Panglima Polim Raya No.15, RT.3/RW.1, Melawai, Kebayoran Baru, South Jakarta City, Jakarta 12160', -6.245586, 106.798531, '2017-03-25', '19:00:00', '00:00:00', 'Have fun with Haikyuu!!', 'n'),
(23, 1, 'Kerja PR', 'Sekolah Menengah Kejuruan Kristen Immanuel I', 'Kompleks Immanuel Bilingual Class, Jl. Letnan Jendral Sutoyo No.1, Parit Tokaya, Pontianak Sel., Kota Pontianak, Kalimantan Barat 78113, Indonesia', -0.050125, 109.341019, '2017-03-26', '10:41:00', '10 mins', 'Di Lobby Sekolah', 'n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
