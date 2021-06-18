-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 20, 2020 at 10:01 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proiect`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id_feedback` int(11) NOT NULL AUTO_INCREMENT,
  `nume_expeditor` varchar(250) NOT NULL,
  `email_expeditor` varchar(250) NOT NULL,
  `mesaj_expeditor` varchar(250) NOT NULL,
  PRIMARY KEY (`id_feedback`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `intrebari`
--

DROP TABLE IF EXISTS `intrebari`;
CREATE TABLE IF NOT EXISTS `intrebari` (
  `id_intrebare` int(11) NOT NULL AUTO_INCREMENT,
  `intrebare` varchar(222) NOT NULL,
  PRIMARY KEY (`id_intrebare`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `raspunsuri`
--

DROP TABLE IF EXISTS `raspunsuri`;
CREATE TABLE IF NOT EXISTS `raspunsuri` (
  `id_raspuns` int(11) NOT NULL AUTO_INCREMENT,
  `id_intrebare` int(11) NOT NULL,
  `raspuns` varchar(250) NOT NULL,
  `raspuns_corect` int(11) NOT NULL,
  PRIMARY KEY (`id_raspuns`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utilizatori`
--

DROP TABLE IF EXISTS `utilizatori`;
CREATE TABLE IF NOT EXISTS `utilizatori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
