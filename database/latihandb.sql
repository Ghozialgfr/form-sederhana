-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 30, 2026 at 09:22 AM
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
-- Database: `latihandb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nidn` char(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `nidn`, `email`, `prodi`, `foto`) VALUES
(28, 'Ghozi ganteng', '12342', 'ghozial@gmail.com', 'farmasi', '6a3a7e0d1f553.jpg'),
(34, 'Ghaida', '24121', 'ghaida@gmail.com', 'farmasi', '6a3a74d8eb575.jpg'),
(35, 'budi', '12123', 'budi@gmail.com', 'Teknik informatika', '6a3c9dff5c2c2.jpg'),
(36, 'Ghozialgfr', '02111', 'ghozial@gmail.com', 'elektro', '6a3a2ef7debe6.jpg'),
(37, 'Ghozi Al GIfari', '02156', 'ghozialgfr@gmail.com', 'Teknik informatika', '6a3a2f4477285.jpg'),
(38, 'ghozi', '24012', 'ghozial@gmail.com', 'agribisnis', '6a3a2f8b39227.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `id` int(10) NOT NULL,
  `nidn` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`id`, `nidn`, `username`, `password`) VALUES
(1, 0, 'ghozialgfr', '$2y$10$mwIdupbbtXBi4S5ITkkWU.9RMNTNu/jQ/xhMc9FLXAjUJGdXOfUFi'),
(4, 0, 'ghozi', '$2y$10$LTIKh9l6raHcOgH3/udo4.1j8vCsT.d2rrOfp47ItBJwokJzB5lN6'),
(5, 0, 'udin', '$2y$10$fcM9OiV2RsvT9cy9bna6DeNaXxbc8xNlBEScV5fnldpStNW6eYvcK'),
(6, 24121, NULL, '$2y$10$ZmO1jr.JZSokdgFilztqrOmEsOw7m1pSneLThwsCRbXLETSbf9mqC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
