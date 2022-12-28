-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 29, 2010 at 06:44 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dblatihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `bkode` int(6) NOT NULL AUTO_INCREMENT,
  `bnama` varchar(32) NOT NULL,
  `bharga` varchar(32) NOT NULL,
  PRIMARY KEY (`bkode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`bkode`, `bnama`, `bharga`) VALUES
(124, 'Korek Api', '400'),
(125, 'Shampo Lifebuoy 200ml', '3500');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
