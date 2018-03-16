-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 16, 2018 at 03:31 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerinfo`
--

INSERT INTO `customerinfo` (`ID`, `BRIDE`, `GROOM`, `PHONE`, `EMAIL`, `WEDDINGDATE`, `SHOWERSDATE`, `REGISTRYDATE`, `STORE`, `EMPLOYEENAME`, `REGISTRYCODE`) VALUES
(1, 'Megha', 'Vishal', '12345678', 'test@testing.com', '2018-03-31', '2018-03-29', '2018-03-12', '123', 'Rosy', '5aa6d1c072b8d'),
(2, 'Ellen', 'Peter', '121424255', 'ellen@gmail.com', '2018-08-22', '2018-08-03', '2018-03-12', '456', 'Sandra', '5aa6d2a449075'),
(3, 'Nancy', 'Steve', '13245765432', 'nancy@gmail.com', '2018-05-17', '2018-05-08', '2018-03-12', '876', 'Brandon', '5aa6e220975d0'),
(4, 'Sia', 'Greg', '573420320sdfsd', 'sia@gmail.com', '2018-03-17', '2018-03-11', '2018-03-12', '1234', 'Rosy', '5aa6e290a8f0c'),
(6, 'fdssdgd', 'gsdg', 'sdf134324', 'test@testing.com', '2018-03-03', '2018-03-01', '2018-03-17', '423', 'dfgsdf', '5aa6e406347f8'),
(7, 'ana', 'mark', '347341983', 'testing@test.com', '2018-03-17', '2018-03-16', '2018-03-13', '432', 'Rosy', '5aa7e3f2dfff8'),
(8, 'ana', 'mark', '347341983', 'testing@test.com', '2018-03-17', '2018-03-16', '2018-03-13', '432', 'Rosy', '5aa7e4a824998'),
(9, 'jjsdk', 'dkfkks', '23576543', 'testing@test.com', '2018-03-17', '2018-03-22', '2018-03-13', '2334', 'afgdfgdf', '5aa7e4ed49556'),
(10, 'jjsdk', 'dkfkks', '23576543', 'testing@test.com', '2018-03-17', '2018-03-22', '2018-03-13', '2334', 'afgdfgdf', '5aa7e50451f85'),
(11, 'jjsdk', 'dkfkks', '23576543', 'testing@test.com', '2018-03-17', '2018-03-22', '2018-03-13', '2334', 'afgdfgdf', '5aa7e57e0bc2b'),
(12, 'abcd', 'efgh', 'ijkl', 'mnop@gmail.com', '2018-03-13', '2018-03-13', '2018-03-13', 'qrst', 'uvwxyz', '5aa7e974dca1b'),
(13, 'demo', 'demo', 'demo', 'demo@test.com', '2018-03-13', '2018-03-13', '2018-03-13', 'demo', 'demo', '5aa7f9a032dfc'),
(32, 'megha', 'megha', 'megha', 'megha@gmail.com', '2018-03-16', '2018-03-16', '2018-03-16', '9999', 'rosy', '5aaacceb89f32'),
(31, 'ana', 'ana', 'ana', 'test@testing.com', '2018-03-13', '2018-03-13', '2018-03-14', '12334', 'rosy', '5aaa92e1c9eac'),
(30, 'ana', 'ana', 'ana', 'test@testing.com', '2018-03-13', '2018-03-13', '2018-03-14', '12334', 'rosy', '5aaa924abb5d3'),
(29, 'dsvds', 'svsd', 'svd', 'rrambani@fluidbrands.ca', '2018-03-08', '2018-03-16', '2018-03-15', '322', 'sfdfgfdg', '5aaa8094e3e09'),
(28, 'maya', 'maya', '4567896-543567665', 'maya@gmail.com', '2018-03-15', '2018-03-16', '2018-03-16', '2342', 'maya', '5aaa76aee4482'),
(27, 'ajsdfvj', 'dfjvk', 'dfdkja', 'test@testing.com', '', '', '2018-03-13', 'sfga', 'fdsgdg', '5aa808bbc211c'),
(22, 'rosy', 'rosy', 'rosy', 'rosys9319@gmail.com', '2018-03-07', '2018-03-31', '2018-03-08', '4566', 'Rosy', '5aa826cb81938'),
(23, 'rosy', 'rosy', 'rosy', 'rosys9319@gmail.com', '2018-03-07', '2018-03-31', '2018-03-08', '4566', 'Rosy', '5aa828ac54950'),
(24, 'sdfsad', 'dfasd', 'fgasd', 'test@testing.com', '2018-03-17', '2018-03-17', '2018-03-15', 'dsdfs', 'sdfs', '5aa82abcb1725'),
(25, 'ds', 'fs', 'fvd', 'test@testing.com', '2018-03-01', '2018-03-08', '2018-03-16', 'ds', 'sdf', '5aa82b1c1da5f'),
(26, 'ds', 'fs', 'fvd', 'test@testing.com', '2018-03-01', '2018-03-08', '2018-03-16', 'ds', 'sdf', '5aa83408a62dd'),
(34, 'amit', 'dfbdb', 'dfbdf', 'test@testing.com', '', '', '2018-03-16', 'dfdf', 'dfdf', '5aabd70892dea'),
(33, 'MEGHA', 'VISHAL', '3065018449', 'rosys9319@gmail.com', '2018-03-16', '2018-03-16', '2018-03-16', '1234', 'Rosy', '5aabd185d2f7c');

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
