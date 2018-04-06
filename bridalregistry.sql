-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 06, 2018 at 07:44 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bridalregistry`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerinfo`
--

DROP TABLE IF EXISTS `customerinfo`;
CREATE TABLE IF NOT EXISTS `customerinfo` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `BRIDE` varchar(50) NOT NULL,
  `GROOM` varchar(50) NOT NULL,
  `PHONE` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `WEDDINGDATE` varchar(50) NOT NULL,
  `SHOWERSDATE` varchar(50) NOT NULL,
  `REGISTRYDATE` varchar(50) NOT NULL,
  `STORE` varchar(50) NOT NULL,
  `EMPLOYEENAME` varchar(50) NOT NULL,
  `REGISTRYCODE` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `REGISTRYCODE` (`REGISTRYCODE`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerinfo`
--

INSERT INTO `customerinfo` (`ID`, `BRIDE`, `GROOM`, `PHONE`, `EMAIL`, `WEDDINGDATE`, `SHOWERSDATE`, `REGISTRYDATE`, `STORE`, `EMPLOYEENAME`, `REGISTRYCODE`) VALUES
(1, 'Megha', 'Vishal', '12345678', 'test@testing.com', '2018-03-31', '2018-03-29', '2018-03-12', '123', 'Rosy', '5aa6d1c072b8d'),
(2, 'Ellen', 'Peter', '121424255', 'ellen@gmail.com', '2018-08-22', '2018-08-03', '2018-03-12', '456', 'Sandra', '5aa6d2a449075'),
(3, 'Nancy', 'Steve', '13245765432', 'nancy@gmail.com', '2018-05-17', '2018-05-08', '2018-03-12', '876', 'Brandon', '5aa6e220975d0'),
(4, 'Sia', 'Greg', '573420320', 'sia@gmail.com', '2018-03-17', '2018-03-11', '2018-03-12', '1234', 'Rosy', '5aa6e290a8f0c'),
(7, 'ana', 'mark', '347341983', 'testing@test.com', '2018-03-17', '2018-03-16', '2018-03-13', '432', 'Rosy', '5aa7e3f2dfff8'),
(12, 'abcd', 'efgh', 'ijkl', 'mnop@gmail.com', '2018-03-13', '2018-03-13', '2018-03-13', 'qrst', 'uvwxyz', '5aa7e974dca1b'),
(13, 'demo', 'demo', 'demo', 'demo@test.com', '2018-03-13', '2018-03-13', '2018-03-13', 'demo', 'demo', '5aa7f9a032dfc'),
(32, 'megha', 'megha', 'megha', 'megha@gmail.com', '2018-03-16', '2018-03-16', '2018-03-16', '9999', 'rosy', '5aaacceb89f32'),
(31, 'ana', 'ana', 'ana', 'test@testing.com', '2018-03-13', '2018-03-13', '2018-03-14', '12334', 'rosy', '5aaa92e1c9eac'),
(30, 'ana', 'ana', 'ana', 'test@testing.com', '2018-03-13', '2018-03-13', '2018-03-14', '12334', 'rosy', '5aaa924abb5d3'),
(28, 'maya', 'maya', '4567896-543567665', 'maya@gmail.com', '2018-03-15', '2018-03-16', '2018-03-16', '2342', 'maya', '5aaa76aee4482'),
(22, 'rosy', 'rosy', 'rosy', 'rosys9319@gmail.com', '2018-03-07', '2018-03-31', '2018-03-08', '4566', 'Rosy', '5aa826cb81938'),
(23, 'rosy', 'rosy', 'rosy', 'rosys9319@gmail.com', '2018-03-07', '2018-03-31', '2018-03-08', '4566', 'Rosy', '5aa828ac54950'),
(33, 'MEGHA', 'VISHAL', '3065018449', 'rosys9319@gmail.com', '2018-03-16', '2018-03-16', '2018-03-16', '1234', 'Rosy', '5aabd185d2f7c'),
(36, 'sd', 'sdfsd', 'ddsd', 'test@testing.com', '', '', '2018-03-01', '123', 'rrww', '5aba8d05d28a4');

-- --------------------------------------------------------

--
-- Table structure for table `customerproducts`
--

DROP TABLE IF EXISTS `customerproducts`;
CREATE TABLE IF NOT EXISTS `customerproducts` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `REGISTRYCODE` varchar(20) NOT NULL,
  `SKUNUMBER` int(20) NOT NULL,
  `DESCRIPTION` varchar(50) NOT NULL,
  `QUANTITY` int(20) NOT NULL,
  `NOTES` varchar(50) NOT NULL,
  `GIFTED` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerproducts`
--

INSERT INTO `customerproducts` (`ID`, `REGISTRYCODE`, `SKUNUMBER`, `DESCRIPTION`, `QUANTITY`, `NOTES`, `GIFTED`) VALUES
(104, '5aa6e290a8f0c', 345, 'table', 43, '', 0),
(103, '5aa6e290a8f0c', 123, 'chair', 23, '', 0),
(87, '5aaa76aee4482', 222, '2', 2, '', 0),
(115, '5aa6e290a8f0c', 650289, 'table chair', 2, '', 0),
(49, '5aaa76aee4482', 321, '321', 321, '', 0),
(100, '5aa6e290a8f0c', 222, 'sofa', 3, '', 0),
(116, '5aa6e290a8f0c', 1234, 'bgdf', 1, 'No', 0),
(117, '5aa6e290a8f0c', 5654, 'sdvsdvds', 3, 'No', 0),
(118, '5aa6e290a8f0c', 32444, 'fjdbfdjkbdfkl', 4, 'No', 0),
(119, '5aaa92e1c9eac', 444, 'fbdfg', 4, 'gbdfbdf', 0),
(120, '5aaa92e1c9eac', 333, 'fdfd', 3, 'bdffdgdfgdfhhhh', 0),
(121, '5aaa92e1c9eac', 555, 'hfnfghfdgh', 4, 'fghbdfgafhjhm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `storelogin`
--

DROP TABLE IF EXISTS `storelogin`;
CREATE TABLE IF NOT EXISTS `storelogin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `STOREUNAME` varchar(20) NOT NULL,
  `STOREPASSWORD` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storelogin`
--

INSERT INTO `storelogin` (`ID`, `STOREUNAME`, `STOREPASSWORD`) VALUES
(1, 'admin', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
