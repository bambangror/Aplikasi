-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2015 at 12:56 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbapotik`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `bid` int(6) NOT NULL AUTO_INCREMENT,
  `bcode` varchar(6) NOT NULL DEFAULT '0',
  `bnama` varchar(32) NOT NULL,
  `prid` int(6) DEFAULT '0',
  `kid` int(10) NOT NULL DEFAULT '1',
  `pbsid` int(10) NOT NULL DEFAULT '1',
  `pjsid` int(10) NOT NULL DEFAULT '1',
  `bisi` int(6) NOT NULL DEFAULT '1',
  `bstock` int(6) NOT NULL DEFAULT '0',
  `bbeli` double NOT NULL DEFAULT '0',
  `bjual` double NOT NULL DEFAULT '0',
  `barcode` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`bid`),
  UNIQUE KEY `bcode` (`bcode`),
  UNIQUE KEY `barcode` (`barcode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`bid`, `bcode`, `bnama`, `prid`, `kid`, `pbsid`, `pjsid`, `bisi`, `bstock`, `bbeli`, `bjual`, `barcode`) VALUES
(1, '00001', 'Kontreksin', 1, 1, 6, 4, 30, 137, 1900, 2100, '00001'),
(2, '00002', 'Oskadon', 2, 1, 2, 4, 1, 289, 2000, 2700, '00002'),
(3, '00003', 'Sanaflu', 2, 2, 1, 4, 20, 26, 1000, 2000, '00003'),
(4, '00004', 'Amobiotic', 1, 2, 4, 2, 1, 88, 2000, 2300, '00004'),
(5, '00005', 'Amocomb', 1, 2, 1, 1, 1, 81, 3000, 3500, '00005'),
(6, '00006', 'Amosine', 3, 2, 1, 3, 4, 88, 4000, 4100, '00006'),
(7, '00007', 'Inza', 2, 1, 2, 2, 4, 799, 2350, 2750, '00007'),
(8, '00008', 'Sanmol Syrup', 3, 1, 2, 8, 4, 2000, 2200, 11200, '00008'),
(12, '00009', 'Mikorex', 2, 4, 8, 8, 1, 100, 8000, 15000, '00009'),
(13, '00010', 'Calarex', 3, 4, 8, 8, 1, 30, 18500, 19200, '00010'),
(14, '00011', 'Strepsil', 3, 1, 2, 2, 5, 98, 5850, 6000, '00011'),
(15, '00012', 'Caladine Cair 150ml', 2, 1, 8, 8, 1, 100, 12500, 11800, '00012'),
(17, '00013', 'Madu Murni Nusantara 250ml', 3, 1, 8, 8, 1, 101, 45000, 53500, '00013');

-- --------------------------------------------------------

--
-- Table structure for table `barang_rusak`
--

CREATE TABLE IF NOT EXISTS `barang_rusak` (
  `brid` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `bid` int(6) unsigned NOT NULL DEFAULT '0',
  `brtgl_dicatat` date NOT NULL DEFAULT '0000-00-00',
  `brqty` double NOT NULL DEFAULT '0',
  `brket` text NOT NULL,
  `braktif` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`brid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `barang_rusak`
--

INSERT INTO `barang_rusak` (`brid`, `bid`, `brtgl_dicatat`, `brqty`, `brket`, `braktif`) VALUES
(1, 2, '2015-12-04', 1, 'Hilang entah kemana', 0),
(2, 2, '2015-12-16', 2, 'Kadaluwarsa', 0),
(3, 4, '2015-11-25', 1, 'Kadaluwarsa', 0),
(4, 4, '2015-11-25', 2, '-', 0),
(5, 3, '2015-12-15', 1, '-', 0),
(6, 7, '2015-12-15', 1, 'Kedaluwarsa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cid` int(10) NOT NULL,
  `cnama` varchar(32) NOT NULL DEFAULT '',
  `calamat` varchar(64) NOT NULL DEFAULT '',
  `ctelp` varchar(14) DEFAULT NULL,
  `cket` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `cnama`, `calamat`, `ctelp`, `cket`) VALUES
(1011300001, 'Riyanto', 'Pati, Jawa Tengah 59157', '08562900000', 'CP. PT. Garuda Multi Solusi'),
(1512150002, 'Mariya Ulfa', 'Ngalangan No. 56, RT. 01 RW. 41, Sardonoharjo', '081111111111', 'Marketing PT. Garda Techno Indonesia'),
(1512150003, 'Anton Sujarwo', 'Plosokuning, Sinduharjo, Sleman', '08222222222', 'Marketing PT. Kartini Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kid` int(10) NOT NULL AUTO_INCREMENT,
  `knama` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`kid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kid`, `knama`) VALUES
(1, 'Umum'),
(2, 'Nutrisi & Multivitamin'),
(3, 'Kemoterapika'),
(4, 'Obat Kulit & Kelamin'),
(5, 'Saluran Napas'),
(6, 'Saraf & Otot'),
(7, 'Kontrasepsi'),
(8, 'Sistem Metabolisme'),
(9, 'Antibiotika'),
(10, 'THT(Telinga Hidung Tenggorokan)');

-- --------------------------------------------------------

--
-- Table structure for table `modal`
--

CREATE TABLE IF NOT EXISTS `modal` (
  `moid` char(10) NOT NULL DEFAULT '0',
  `modate` date NOT NULL DEFAULT '0000-00-00',
  `momodal` double NOT NULL DEFAULT '0',
  `uid` int(8) NOT NULL,
  `s_id` int(3) NOT NULL,
  PRIMARY KEY (`moid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modal`
--

INSERT INTO `modal` (`moid`, `modate`, `momodal`, `uid`, `s_id`) VALUES
('101201002', '2010-12-06', 20000, 2, 1),
('101265001', '2010-12-05', 50000, 4, 2),
('101266001', '2010-12-05', 200000, 3, 3),
('101201001', '2010-12-05', 100000, 2, 1),
('101201003', '2010-12-27', 1000000, 2, 1),
('101201004', '2010-12-28', 500000, 2, 1),
('150801001', '2015-12-02', 125000, 2, 1),
('150801002', '2015-12-03', 175000, 2, 1),
('150801003', '2015-12-16', 125000, 2, 1),
('150801004', '2015-11-26', 175000, 2, 1),
('151201001', '2015-12-16', 525000, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pbsatuan`
--

CREATE TABLE IF NOT EXISTS `pbsatuan` (
  `pbsid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pbsnama` varchar(20) NOT NULL,
  PRIMARY KEY (`pbsid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `pbsatuan`
--

INSERT INTO `pbsatuan` (`pbsid`, `pbsnama`) VALUES
(1, '-'),
(2, 'Pcs'),
(3, 'Box'),
(4, 'Tablet'),
(5, 'Kapsul'),
(6, 'Biji'),
(7, 'Sirup 60 ml'),
(8, 'Botol'),
(12, 'Lembar');

-- --------------------------------------------------------

--
-- Table structure for table `pbtransaksi`
--

CREATE TABLE IF NOT EXISTS `pbtransaksi` (
  `pbtid` varchar(12) NOT NULL,
  `pbid` int(8) NOT NULL DEFAULT '0',
  `bid` varchar(6) NOT NULL,
  `pbtbeli` double NOT NULL DEFAULT '0',
  `pbtdiskon` varchar(4) NOT NULL DEFAULT '0',
  `pbtrpdiskon` double NOT NULL DEFAULT '0',
  `pbtqty` double NOT NULL DEFAULT '0',
  `pbtno` int(3) NOT NULL DEFAULT '0',
  `pbtaktif` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pbtid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pbtransaksi`
--

INSERT INTO `pbtransaksi` (`pbtid`, `pbid`, `bid`, `pbtbeli`, `pbtdiskon`, `pbtrpdiskon`, `pbtqty`, `pbtno`, `pbtaktif`) VALUES
('101205000101', 1012050001, '1', 2000, '0%', 0, 1, 0, 0),
('101205000102', 1012050001, '2', 2000, '0%', 0, 1, 0, 0),
('101205000103', 1012050001, '4', 2000, '0%', 0, 1, 0, 0),
('101205000201', 1012050002, '2', 2000, '0%', 0, 1, 0, 0),
('101205000202', 1012050002, '5', 3000, '0%', 0, 1, 0, 0),
('101205000203', 1012050002, '6', 4000, '0%', 0, 1, 0, 0),
('101205000204', 1012050002, '2', 2000, '0%', 0, 1, 0, 0),
('101216000301', 1012160003, '2', 2000, '0%', 0, 1, 0, 0),
('101216000302', 1012160003, '1', 4000, '0%', 0, 2, 0, 0),
('101224000401', 1012240004, '2', 2000, '0%', 0, 1, 0, 0),
('101224000402', 1012240004, '1', 2100, '0%', 0, 1, 0, 0),
('151215000403', 1512150004, '8', 1100000, '0%', 0, 500, 0, 0),
('151215000501', 1512150005, '7', 352500, '0%', 0, 150, 0, 0),
('151216000601', 1512160006, '13', 55500, '0%', 0, 3, 0, 0),
('151216000602', 1512160006, '15', 12500, '0%', 0, 1, 0, 0),
('151216000603', 1512160006, '14', 117000, '0%', 0, 20, 0, 0),
('151216000701', 1512160007, '17', 45000, '0%', 0, 1, 0, 0),
('151216000702', 1512160007, '12', 8000, '0%', 0, 1, 0, 0),
('151216000801', 1512160008, '1', 1900, '0%', 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `pbid` varchar(10) NOT NULL,
  `pbnota` varchar(12) NOT NULL DEFAULT '',
  `pbtgl` date NOT NULL DEFAULT '0000-00-00',
  `spid` varchar(8) NOT NULL DEFAULT '',
  `pbdiskon` int(250) NOT NULL DEFAULT '0',
  `pbbayar` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`pbid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`pbid`, `pbnota`, `pbtgl`, `spid`, `pbdiskon`, `pbbayar`) VALUES
('1012050001', 'F05122010', '2010-12-05', '10112901', 0, 6000),
('1012050002', 'F50122102', '2010-12-05', '10113003', 0, 11000),
('1012180003', '1012180001', '2010-12-18', '10113003', 0, 6000),
('1512150004', '123456781', '2015-12-15', '10113003', 0, 1104100),
('1512150005', '123456782', '2015-12-15', '10112901', 0, 352500),
('1512160006', '123456784', '2015-12-16', '15121604', 0, 185000),
('1512160007', '123456785', '2015-12-16', '10113003', 0, 53000),
('1512160008', '123456786', '2015-12-16', '10112901', 0, 1900);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `pjid` char(12) NOT NULL DEFAULT '0',
  `pjtgl` date NOT NULL DEFAULT '0000-00-00',
  `pjdiskon` double NOT NULL DEFAULT '0',
  `cid` int(10) DEFAULT NULL,
  `pjbayar` double NOT NULL DEFAULT '0',
  `uid` int(8) NOT NULL,
  `s_id` int(3) NOT NULL,
  PRIMARY KEY (`pjid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`pjid`, `pjtgl`, `pjdiskon`, `cid`, `pjbayar`, `uid`, `s_id`) VALUES
('150826010001', '2015-11-26', 300, 0, 5700, 2, 1),
('150816010001', '2015-12-16', 1000, 0, 21300, 2, 1),
('150803010007', '2015-12-03', 945, 0, 11655, 2, 1),
('150803010006', '2015-12-03', 880, 0, 30120, 2, 1),
('150803010005', '2015-12-03', 0, 0, 2000, 2, 1),
('150803010004', '2015-12-03', 0, 0, 4100, 2, 1),
('150803010003', '2015-12-03', 0, 0, 2100, 2, 1),
('150803010002', '2015-12-03', 694, 0, 27106, 2, 1),
('150802010001', '2015-12-03', 2235, 0, 52265, 2, 1),
('151216010001', '2015-12-17', 950, 0, 30050, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pjsatuan`
--

CREATE TABLE IF NOT EXISTS `pjsatuan` (
  `pjsid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pjsnama` varchar(20) NOT NULL,
  PRIMARY KEY (`pjsid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pjsatuan`
--

INSERT INTO `pjsatuan` (`pjsid`, `pjsnama`) VALUES
(1, '-'),
(2, 'Pcs'),
(3, 'Box'),
(4, 'Tablet'),
(5, 'Kapsul'),
(6, 'Biji'),
(7, 'Sirup 60 ml'),
(8, 'Botol'),
(10, 'Lembar');

-- --------------------------------------------------------

--
-- Table structure for table `pjtransaksi`
--

CREATE TABLE IF NOT EXISTS `pjtransaksi` (
  `pjtid` char(14) NOT NULL,
  `pjid` char(12) DEFAULT NULL,
  `bid` varchar(6) NOT NULL,
  `pjtdiskon` varchar(4) NOT NULL DEFAULT '0%',
  `pjtrpdisk` double NOT NULL,
  `pjtqty` int(1) NOT NULL DEFAULT '1',
  `pjttotal` double NOT NULL DEFAULT '0',
  `pjtno` int(3) DEFAULT NULL,
  `pjtaktif` int(1) NOT NULL DEFAULT '1',
  `s_id` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pjtid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pjtransaksi`
--

INSERT INTO `pjtransaksi` (`pjtid`, `pjid`, `bid`, `pjtdiskon`, `pjtrpdisk`, `pjtqty`, `pjttotal`, `pjtno`, `pjtaktif`, `s_id`) VALUES
('15080201000101', '150802010001', '1', '0%', 0, 1, 2100, 0, 0, 1),
('15080201000102', '150802010001', '2', '2%', 210, 5, 10290, 0, 0, 1),
('15080201000103', '150802010001', '6', '3%', 738, 6, 23862, 0, 0, 1),
('15080301000201', '150803010002', '3', '2%', 280, 7, 13720, 0, 0, 1),
('15080301000202', '150803010002', '4', '3%', 414, 6, 13386, 0, 0, 1),
('15080301000301', '150803010003', '1', '0%', 0, 1, 2100, 0, 0, 1),
('15080301000401', '150803010004', '6', '0%', 0, 1, 4100, 0, 0, 1),
('15080301000501', '150803010005', '3', '0%', 0, 1, 2000, 0, 0, 1),
('15080301000601', '150803010006', '5', '3%', 630, 6, 20370, 0, 0, 1),
('15080301000602', '150803010006', '3', '2.5%', 250, 5, 9750, 0, 0, 1),
('15080301000701', '150803010007', '2', '2.5%', 262.5, 5, 10237.5, 0, 0, 1),
('15080301000702', '150803010007', '1', '32.5', 682.5, 1, 1417.5, 0, 0, 1),
('15081601000101', '150816010001', '6', '0%', 0, 3, 12300, 0, 0, 1),
('15081601000102', '150816010001', '3', '10%', 1000, 5, 9000, 0, 0, 1),
('15082601000101', '150826010001', '3', '5%', 300, 3, 5700, 0, 0, 1),
('15121601000101', '151216010001', '3', '5%', 200, 2, 3800, 0, 0, 1),
('15121601000102', '151216010001', '12', '5%', 750, 1, 14250, 0, 0, 1),
('15121601000103', '151216010001', '14', '0%', 0, 2, 12000, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produsen`
--

CREATE TABLE IF NOT EXISTS `produsen` (
  `prid` int(6) NOT NULL AUTO_INCREMENT,
  `prnama` varchar(640) DEFAULT NULL,
  `pralamat` varchar(128) DEFAULT NULL,
  `prtelp` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`prid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `produsen`
--

INSERT INTO `produsen` (`prid`, `prnama`, `pralamat`, `prtelp`) VALUES
(1, '-', NULL, NULL),
(2, 'Sanbe Farma', 'Surabaya', '031-1111111'),
(3, 'Bernofarm', 'surabaya', '08975432'),
(4, 'Kalbe Farma', 'Jakarta', '021-1111111');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `rid` int(3) NOT NULL AUTO_INCREMENT,
  `rname` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`rid`),
  UNIQUE KEY `rname` (`rname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`rid`, `rname`) VALUES
(1, 'Admin'),
(2, 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `spid` varchar(8) NOT NULL DEFAULT '',
  `spnama` varchar(20) NOT NULL DEFAULT '',
  `spalamat` varchar(255) NOT NULL DEFAULT '',
  `sptelp` varchar(30) NOT NULL DEFAULT '',
  `spfax` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`spid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`spid`, `spnama`, `spalamat`, `sptelp`, `spfax`) VALUES
('10112901', 'Joko Sumarsono', 'Sleman, Yogyaka', '088881111111', '0274-000111'),
('10113003', 'M. Sudiro', 'Klaten, Jawa Tengah, Indonesia', '0856290000', '0273-000111'),
('15121604', 'PT. Gajah Oling', 'Karangwaru, Jl. Magelang Km. 1, Yogyakarta', '0274-111111', '0274-222111');

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE IF NOT EXISTS `system` (
  `s_id` int(3) NOT NULL AUTO_INCREMENT,
  `sno` int(11) NOT NULL DEFAULT '0',
  `sip` varchar(15) NOT NULL,
  `sapp` varchar(24) DEFAULT 'Offline',
  `snama` varchar(64) DEFAULT NULL,
  `salamat` varchar(128) DEFAULT NULL,
  `sinfo` varchar(128) DEFAULT NULL,
  `sok` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`s_id`, `sno`, `sip`, `sapp`, `snama`, `salamat`, `sinfo`, `sok`) VALUES
(1, 1, '127.0.0.1', 'Kasir', 'SISTEM INFORMASI APOTEK', 'Jl.Kaliurang KM.7,4 Ngabean Kulon, Depok, Seleman, Yogyakarta', '~ login menggunakan username dan passwod ~', 1),
(2, 2, '10.128.0.9', 'Kasir', 'SISTEM INFORMASI APOTEK', 'Jl.Kaliurang KM.7,4 Ngabean Kulon, Depok, Seleman, Yogyakarta', '~ login menggunakan username dan passwod ~', 1),
(3, 3, '10.128.0.8', 'Kasir', 'SISTEM INFORMASI APOTEK', 'Jl.Kaliurang KM.7,4 Ngabean Kulon, Depok, Seleman, Yogyakarta', '~ login menggunakan username dan passwod ~', 1),
(4, 0, '::1', 'Server', 'SISTEM INFORMASI APOTEK', 'Karangmalang A.45, Depok, Sleman, Yogyakarta 55281', '~ login menggunakan username dan passwod ~', 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_barcode`
--

CREATE TABLE IF NOT EXISTS `temp_barcode` (
  `tbid` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `bid` int(6) NOT NULL,
  `tbqty` int(6) NOT NULL,
  PRIMARY KEY (`tbid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(8) NOT NULL AUTO_INCREMENT,
  `rid` int(3) NOT NULL DEFAULT '0',
  `uname` varchar(16) NOT NULL,
  `upasswd` varchar(64) NOT NULL,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `rid`, `uname`, `upasswd`, `name`) VALUES
(1, 1, 'Riyanto', '21232f297a57a5a743894a0e4a801fc3', 'superadmin'),
(2, 2, 'Kasir-1', '21232f297a57a5a743894a0e4a801fc3', 'Joko Witono'),
(3, 2, 'Kasir-2', '21232f297a57a5a743894a0e4a801fc3', 'Rusnandar'),
(4, 2, 'Kasir-3', '21232f297a57a5a743894a0e4a801fc3', 'Sugiharti');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
