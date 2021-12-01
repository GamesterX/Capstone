-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql5.freemysqlhosting.net
-- Generation Time: Nov 15, 2021 at 01:54 AM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql5443086`
--

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `title` varchar(255) NOT NULL COMMENT 'Titles of the movie',
  `release_date` date NOT NULL,
  `length` varchar(255) NOT NULL,
  `id` int(6) NOT NULL COMMENT 'ID number of the movie',
  `popularity` float NOT NULL COMMENT 'Popularity ranking of the movie'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`title`, `release_date`, `length`, `id`, `popularity`) VALUES
('Dune', '2021-10-22', '2h 35m', 438631, 80),
('Clifford the Big Red Dog', '2021-11-10', '1h 37m', 585245, 63),
('Venom: Let There Be Carnage', '2021-10-01', '1h 37m', 580489, 68),
('Eternals', '2021-11-05', '2h 37m', 524434, 71),
('Spencer', '2021-11-05', '1h 57m', 716612, 72),
('Last Night in Soho', '2021-10-29', '1h 57m', 576845, 75),
('My Hero Academia: World Heroes Mission', '2021-10-29', '1h 41m', 768744, 73);

-- --------------------------------------------------------

--
-- Table structure for table `geocode`
--

CREATE TABLE `geocode` (
  `id` int(11) NOT NULL,
  `geocode` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `geocode`
--

INSERT INTO `geocode` (`id`, `geocode`, `address`) VALUES
(6, '39.8193399;-75.0145421', '708 Sycamore Ct, Laurel Springs, NJ 08021, US'),
(7, '39.8556738;-75.0200962', 'Cooper Town Center, 711 Evesham Rd, Somerdale'),
(8, '39.716063;-75.0285313', '121 Tuckahoe Rd, Sewell, NJ 08080, USA'),
(9, '39.8349463;-75.1006256', '1740 Clements Bridge Rd, Deptford, NJ 08096, ');

-- --------------------------------------------------------

--
-- Table structure for table `LocalCins`
--

CREATE TABLE `LocalCins` (
  `idLocalCins` int(11) NOT NULL,
  `cin_id` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `MovieDB`
--

CREATE TABLE `MovieDB` (
  `title` varchar(255) NOT NULL COMMENT 'Titles of the movie',
  `release_date` date NOT NULL,
  `length` varchar(255) NOT NULL,
  `id` int(6) NOT NULL COMMENT 'ID number of the movie',
  `popularity` float NOT NULL COMMENT 'Popularity ranking of the movie'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `MovieDB`
--

INSERT INTO `MovieDB` (`title`, `release_date`, `length`, `id`, `popularity`) VALUES
('Dune', '2021-10-22', '2h 35m', 438631, 80),
('Clifford the Big Red Dog', '2021-11-10', '1h 37m', 585245, 63),
('Venom: Let There Be Carnage', '2021-10-01', '1h 37m', 580489, 68),
('Eternals', '2021-11-05', '2h 37m', 524434, 71),
('Spencer', '2021-11-05', '1h 57m', 716612, 72),
('Last Night in Soho', '2021-10-29', '1h 57m', 576845, 75),
('My Hero Academia: World Heroes Mission', '2021-10-29', '1h 41m', 768744, 73);

-- --------------------------------------------------------

--
-- Table structure for table `OMDB`
--

CREATE TABLE `OMDB` (
  `title` varchar(255) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `imdbID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `OMDB`
--

INSERT INTO `OMDB` (`title`, `year`, `imdbID`) VALUES
('Dune', 2021, 'tt1160419'),
('Clifford the Big Red Dog', 2021, 'tt2397461'),
('Eternals', 2021, 'tt9032400'),
('Venom: Let There Be Carnage', 2021, 'tt7097896'),
('Venom: Let There Be Carnage', 2021, 'tt7097896'),
('Last Night in Soho', 2021, 'tt9639470'),
('Spencer', 2021, 'tt12536294'),
('My hero academia trials of legends', 2021, 'tt15468940');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `geocode`
--
ALTER TABLE `geocode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `LocalCins`
--
ALTER TABLE `LocalCins`
  ADD PRIMARY KEY (`idLocalCins`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `geocode`
--
ALTER TABLE `geocode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
