-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 03, 2025 at 08:44 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulletin`
--

CREATE TABLE `bulletin` (
  `id` int NOT NULL,
  `numsem` int NOT NULL,
  `numel` int NOT NULL,
  `codemat` int NOT NULL,
  `notefinal` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulletin`
--

INSERT INTO `bulletin` (`id`, `numsem`, `numel`, `codemat`, `notefinal`) VALUES
(1, 1, 8, 17, 15.12),
(5, 3, 3, 10, 14.25),
(3, 4, 3, 5, 14.785),
(6, 3, 4, 10, 14.5),
(7, 2, 1, 5, 12.75),
(8, 4, 2, 6, 16.2),
(9, 1, 5, 7, 10.3),
(10, 3, 2, 2, 11.9),
(11, 5, 4, 9, 13),
(12, 2, 3, 1, 15.4),
(13, 6, 1, 2, 12.6),
(14, 4, 5, 8, 14.1),
(15, 1, 2, 6, 13.8),
(16, 3, 3, 5, 15.75),
(17, 2, 4, 7, 16.5),
(18, 5, 2, 4, 10.95),
(19, 6, 4, 3, 12.85),
(20, 4, 3, 9, 14.6),
(21, 1, 4, 2, 11.55),
(22, 3, 1, 8, 13.25),
(23, 2, 5, 6, 15.1),
(24, 5, 1, 7, 14.45),
(25, 6, 2, 5, 12.35),
(26, 4, 1, 4, 16),
(27, 1, 3, 9, 13.9),
(28, 2, 2, 8, 11.7),
(29, 5, 5, 2, 12.8),
(30, 6, 5, 1, 15.6),
(31, 3, 5, 6, 14.4),
(32, 4, 4, 7, 13.7),
(33, 2, 6, 3, 12.95),
(34, 5, 6, 5, 15.25),
(35, 6, 6, 9, 14.85),
(36, 3, 6, 2, 13.5);

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
  `codecl` int NOT NULL,
  `nom` text NOT NULL,
  `numprofcoord` int NOT NULL,
  `promotion` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`codecl`, `nom`, `numprofcoord`, `promotion`) VALUES
(1, 'GI', 2, 2008),
(2, 'TM', 1, 2008),
(3, 'GRH', 3, 2008),
(4, 'GI', 1, 2009),
(5, 'TM', 2, 2009),
(6, 'GRH', 4, 2009),
(16, 'GI', 2, 2010),
(17, 'TM', 3, 2010),
(18, 'GRH', 1, 2010),
(19, 'GI', 4, 2011),
(20, 'TM', 2, 2011),
(21, 'GRH', 3, 2011),
(22, 'GI', 1, 2012),
(23, 'TM', 4, 2012),
(24, 'GRH', 2, 2012),
(25, 'GI', 3, 2013),
(26, 'TM', 1, 2013),
(27, 'GRH', 4, 2013),
(28, 'GI', 2, 2014),
(29, 'TM', 3, 2014),
(30, 'GRH', 1, 2014),
(31, 'GI', 4, 2015),
(32, 'TM', 2, 2015),
(33, 'GRH', 3, 2015),
(34, 'GI', 1, 2016),
(35, 'TM', 4, 2016),
(36, 'GRH', 2, 2016),
(37, 'GI', 3, 2017),
(38, 'TM', 1, 2017),
(39, 'GRH', 4, 2017),
(40, 'GI', 2, 2018),
(41, 'TM', 3, 2018),
(42, 'GRH', 1, 2018),
(43, 'GI', 4, 2019),
(44, 'TM', 2, 2019),
(45, 'GRH', 3, 2019),
(46, 'GI', 1, 2020),
(47, 'TM', 4, 2020),
(48, 'GRH', 2, 2020),
(49, 'GI', 3, 2021),
(50, 'TM', 1, 2021),
(51, 'GRH', 4, 2021),
(52, 'GI', 2, 2022),
(53, 'TM', 3, 2022),
(54, 'GRH', 1, 2022),
(55, 'GI', 4, 2023),
(56, 'TM', 2, 2023),
(57, 'GRH', 3, 2023),
(58, 'GI', 1, 2024),
(59, 'TM', 4, 2024),
(60, 'GRH', 2, 2024),
(61, 'GI', 3, 2025),
(62, 'TM', 1, 2025),
(63, 'GRH', 4, 2025);

-- --------------------------------------------------------

--
-- Table structure for table `conseil`
--

CREATE TABLE `conseil` (
  `id` int NOT NULL,
  `numsem` int NOT NULL,
  `codecl` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conseil`
--

INSERT INTO `conseil` (`id`, `numsem`, `codecl`) VALUES
(1, 1, 4),
(6, 3, 1),
(4, 2, 5),
(7, 1, 4),
(8, 3, 1),
(9, 2, 5),
(10, 4, 2),
(11, 5, 3),
(12, 6, 6),
(13, 1, 7),
(14, 2, 8),
(15, 3, 9),
(16, 4, 10),
(17, 5, 11),
(18, 6, 12),
(19, 1, 13),
(20, 2, 14),
(21, 3, 15),
(22, 4, 16),
(23, 5, 17),
(24, 6, 18),
(25, 1, 19),
(26, 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `devoir`
--

CREATE TABLE `devoir` (
  `numdev` int NOT NULL,
  `date_dev` text NOT NULL,
  `coeficient` int NOT NULL,
  `codemat` int NOT NULL,
  `codecl` int NOT NULL,
  `numsem` int NOT NULL,
  `n_devoir` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devoir`
--

INSERT INTO `devoir` (`numdev`, `date_dev`, `coeficient`, `codemat`, `codecl`, `numsem`, `n_devoir`) VALUES
(130, '2014-09-28', 5, 19, 4, 3, 1),
(129, '2012-07-12', 4, 17, 4, 1, 2),
(128, '2010-03-09', 3, 16, 4, 2, 1),
(127, '2015-01-05', 2, 14, 4, 4, 2),
(126, '2013-06-22', 5, 12, 4, 1, 1),
(125, '2011-02-11', 4, 11, 4, 3, 2),
(124, '2014-08-12', 3, 10, 4, 2, 1),
(123, '2012-05-16', 2, 9, 4, 4, 2),
(122, '2010-09-10', 5, 8, 4, 1, 1),
(121, '2013-07-21', 4, 7, 4, 2, 2),
(120, '2011-04-19', 3, 6, 4, 3, 1),
(119, '2010-01-28', 2, 5, 4, 1, 2),
(118, '2012-03-14', 5, 4, 4, 4, 1),
(117, '2011-08-23', 4, 3, 4, 2, 2),
(116, '2010-05-12', 3, 2, 4, 3, 1),
(115, '2014-09-05', 5, 19, 3, 2, 1),
(114, '2012-07-17', 4, 17, 3, 4, 2),
(113, '2010-04-22', 3, 16, 3, 1, 1),
(112, '2015-01-30', 2, 14, 3, 3, 2),
(111, '2013-05-09', 5, 12, 3, 2, 1),
(110, '2011-02-18', 4, 11, 3, 4, 2),
(109, '2014-06-15', 3, 10, 3, 1, 1),
(108, '2012-09-19', 2, 9, 3, 3, 2),
(107, '2010-07-08', 5, 8, 3, 2, 1),
(106, '2013-03-25', 4, 7, 3, 1, 2),
(105, '2011-05-11', 3, 6, 3, 2, 1),
(104, '2010-01-20', 2, 5, 3, 4, 2),
(103, '2012-08-14', 5, 4, 3, 3, 1),
(102, '2011-06-05', 3, 3, 3, 1, 2),
(101, '2010-03-18', 4, 2, 3, 2, 1),
(100, '2014-07-08', 4, 19, 2, 1, 2),
(99, '2012-03-30', 2, 17, 2, 3, 1),
(98, '2010-01-22', 3, 16, 2, 2, 2),
(97, '2015-09-12', 5, 14, 2, 1, 1),
(96, '2013-06-18', 4, 12, 2, 4, 2),
(95, '2011-04-05', 2, 11, 2, 3, 1),
(94, '2014-02-28', 4, 10, 2, 1, 2),
(93, '2012-08-20', 5, 9, 2, 3, 1),
(92, '2010-05-12', 3, 8, 2, 2, 2),
(91, '2014-01-15', 4, 7, 2, 4, 1),
(90, '2011-07-30', 5, 6, 2, 1, 2),
(89, '2010-03-22', 2, 5, 2, 3, 1),
(88, '2013-04-18', 5, 4, 2, 2, 1),
(87, '2011-06-12', 4, 3, 2, 4, 1),
(86, '2010-02-10', 3, 2, 2, 1, 2),
(85, '2014-06-23', 4, 19, 1, 1, 2),
(84, '2012-09-05', 3, 17, 1, 3, 1),
(83, '2010-01-18', 5, 16, 1, 2, 2),
(82, '2015-07-19', 4, 14, 1, 3, 1),
(81, '2013-05-11', 3, 12, 1, 1, 2),
(80, '2011-03-22', 2, 11, 1, 4, 1),
(79, '2014-02-10', 5, 10, 1, 2, 1),
(78, '2012-08-18', 3, 9, 1, 3, 2),
(77, '2010-06-15', 4, 8, 1, 1, 1),
(76, '2013-01-20', 3, 7, 1, 4, 2),
(75, '2011-07-12', 5, 6, 1, 2, 1),
(74, '2010-04-05', 2, 5, 1, 3, 2),
(73, '2012-09-10', 4, 4, 1, 4, 1),
(72, '2011-05-22', 5, 3, 1, 1, 2),
(71, '2010-03-12', 3, 2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `diplome`
--

CREATE TABLE `diplome` (
  `numdip` int NOT NULL,
  `titre_dip` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diplome`
--

INSERT INTO `diplome` (`numdip`, `titre_dip`) VALUES
(1, 'DUT_GI'),
(2, 'DUT_TM'),
(6, 'DUT_GRH');

-- --------------------------------------------------------

--
-- Table structure for table `eleve`
--

CREATE TABLE `eleve` (
  `numel` int NOT NULL,
  `nomel` text NOT NULL,
  `prenomel` text NOT NULL,
  `date_naissance` text NOT NULL,
  `adresse` text NOT NULL,
  `telephone` text NOT NULL,
  `codecl` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eleve`
--

INSERT INTO `eleve` (`numel`, `nomel`, `prenomel`, `date_naissance`, `adresse`, `telephone`, `codecl`) VALUES
(3, 'LAGMAR', 'Ayoub', '02/19/1999', 'Casablanca', '029329452', 1),
(4, 'Nohad', 'Imad', '21/01/1990', 'Casablanca', '029329452', 1),
(5, 'OUBARKA', 'Samir', '19/11/1990', 'barnoussin<br />\r\nCasablanca', '029329452', 2),
(6, 'Kadir', 'Younes', '19/19/1999', 'Ouazzan', '029329452', 3),
(7, 'Zemzami', 'Mehdi', '20/07/1991', 'maarif<br />\r\nCasablanca', '029355552', 5),
(8, 'Achra', 'Achraf', '19/19/1989', 'Casablanca', '029329452', 4),
(9, 'Fadil', 'Hamada', '19/00/1999', 'Casablanca', '029329452', 6),
(10, 'Chaimaa', 'Chaimma', '19/19/1989', 'Casablanca', '029329452', 3),
(11, 'Alamai', 'Karim', '19/19/1988', 'Settat', '029329452', 6),
(13, 'Alami', 'Meriem', '21/03/1990', 'Berrechid', '097217342', 5),
(14, 'Alami', 'Meriem', '21/03/1990', 'Berrechid', '097217342', 5),
(15, 'LAGMAR', 'Ayoub', '1999-02-19', 'Casablanca', '029329452', 1),
(16, 'Nohad', 'Imad', '1990-01-21', 'Casablanca', '029329453', 1),
(17, 'OUBARKA', 'Samir', '1990-11-19', 'Barnoussin', '029329454', 1),
(18, 'Kadir', 'Younes', '1999-12-19', 'Ouazzan', '029329455', 1),
(19, 'Zemzami', 'Mehdi', '1991-07-20', 'Maarif', '029329456', 1),
(20, 'Ali', 'Yassine', '1990-02-14', 'Casablanca', '029329472', 2),
(21, 'Salma', 'Omar', '1991-05-03', 'Casablanca', '029329473', 2),
(22, 'Hicham', 'Sara', '1992-09-19', 'Rabat', '029329474', 2),
(23, 'Lina', 'Karim', '1993-11-12', 'Casablanca', '029329475', 2),
(24, 'Nabil', 'Imane', '1994-01-22', 'Marrakech', '029329476', 2),
(25, 'Rachid', 'Ayoub', '1990-01-11', 'Casablanca', '029329492', 3),
(26, 'Imane', 'Yassine', '1991-02-23', 'Rabat', '029329493', 3),
(27, 'Omar', 'Sofia', '1992-03-15', 'Casablanca', '029329494', 3),
(28, 'Samir', 'Salma', '1993-04-20', 'Marrakech', '029329495', 3),
(29, 'Karim', 'Lina', '1994-05-12', 'Casablanca', '029329496', 3),
(30, 'Ayoub', 'Karim', '1990-03-11', 'Casablanca', '029329512', 4),
(31, 'Sara', 'Imane', '1991-04-22', 'Rabat', '029329513', 4),
(32, 'Adam', 'Samira', '1992-05-15', 'Casablanca', '029329514', 4),
(33, 'Yassine', 'Sofia', '1993-06-20', 'Marrakech', '029329515', 4),
(34, 'Meriem', 'Karim', '1994-07-12', 'Casablanca', '029329516', 4),
(35, 'Mohamed', 'Amine', '1990-05-15', 'Casablanca', '029329532', 5),
(36, 'Fatima', 'Zahra', '1991-06-22', 'Rabat', '029329533', 5),
(37, 'Mehdi', 'Yassin', '1992-07-18', 'Casablanca', '029329534', 5),
(38, 'Sanaa', 'Khalid', '1993-08-25', 'Marrakech', '029329535', 5),
(39, 'Omar', 'Nadia', '1994-09-12', 'Casablanca', '029329536', 5),
(40, 'Amine', 'Fatima', '1990-07-11', 'Casablanca', '029329552', 6),
(41, 'Zahra', 'Mehdi', '1991-08-23', 'Rabat', '029329553', 6),
(42, 'Yassin', 'Sanaa', '1992-09-15', 'Casablanca', '029329554', 6),
(43, 'Khalid', 'Omar', '1993-10-20', 'Marrakech', '029329555', 6),
(44, 'Nadia', 'Noura', '1994-11-12', 'Casablanca', '029329556', 6),
(45, 'Yassin', 'Zahra', '1990-09-15', 'Casablanca', '029329572', 7),
(46, 'Sanaa', 'Yassin', '1991-10-22', 'Rabat', '029329573', 7),
(47, 'Omar', 'Khalid', '1992-11-18', 'Casablanca', '029329574', 7),
(48, 'Noura', 'Nadia', '1993-12-25', 'Marrakech', '029329575', 7),
(49, 'Karim', 'Hicham', '1994-01-12', 'Casablanca', '029329576', 7),
(50, 'Khalid', 'Sanaa', '1990-11-10', 'Casablanca', '029329592', 8),
(51, 'Nadia', 'Omar', '1991-12-15', 'Rabat', '029329593', 8),
(52, 'Hicham', 'Noura', '1992-01-20', 'Casablanca', '029329594', 8),
(53, 'Leila', 'Karim', '1993-02-25', 'Marrakech', '029329595', 8),
(54, 'Rania', 'Hassan', '1994-03-12', 'Casablanca', '029329596', 8),
(55, 'Omar', 'Nadia', '1991-01-15', 'Casablanca', '029329612', 9),
(56, 'Noura', 'Hicham', '1992-02-22', 'Rabat', '029329613', 9),
(57, 'Karim', 'Leila', '1993-03-18', 'Casablanca', '029329614', 9),
(58, 'Hassan', 'Rania', '1994-04-25', 'Marrakech', '029329615', 9),
(59, 'Sofia', 'Mehdi', '1995-05-12', 'Casablanca', '029329616', 9),
(60, 'Hicham', 'Karim', '1991-03-10', 'Casablanca', '029329632', 10),
(61, 'Leila', 'Hassan', '1992-04-15', 'Rabat', '029329633', 10),
(62, 'Rania', 'Sofia', '1993-05-20', 'Casablanca', '029329634', 10),
(63, 'Mehdi', 'Youssef', '1994-06-25', 'Marrakech', '029329635', 10),
(64, 'Nada', 'Amina', '1995-07-12', 'Casablanca', '029329636', 10),
(65, 'Omar', 'Sara', '1991-05-15', 'Casablanca', '029329652', 11),
(66, 'Sara', 'Karim', '1992-06-22', 'Rabat', '029329653', 11),
(67, 'Karim', 'Fatima', '1993-07-18', 'Casablanca', '029329654', 11),
(68, 'Fatima', 'Hassan', '1994-08-25', 'Marrakech', '029329655', 11),
(69, 'Hassan', 'Noura', '1995-09-12', 'Casablanca', '029329656', 11),
(70, 'Noura', 'Sanaa', '1991-07-10', 'Casablanca', '029329672', 12),
(71, 'Sanaa', 'Rania', '1992-08-15', 'Rabat', '029329673', 12),
(72, 'Rania', 'Mehdi', '1993-09-20', 'Casablanca', '029329674', 12),
(73, 'Mehdi', 'Leila', '1994-10-25', 'Marrakech', '029329675', 12),
(74, 'Leila', 'Amine', '1995-11-12', 'Casablanca', '029329676', 12),
(75, 'Amine', 'Zahra', '1991-09-15', 'Casablanca', '029329692', 13),
(76, 'Zahra', 'Yassin', '1992-10-22', 'Rabat', '029329693', 13),
(77, 'Yassin', 'Sanaa', '1993-11-18', 'Casablanca', '029329694', 13),
(78, 'Sanaa', 'Omar', '1994-12-25', 'Marrakech', '029329695', 13),
(79, 'Omar', 'Nadia', '1995-01-12', 'Casablanca', '029329696', 13),
(80, 'Nadia', 'Hicham', '1991-11-10', 'Casablanca', '029329712', 14),
(81, 'Hicham', 'Leila', '1992-12-15', 'Rabat', '029329713', 14),
(82, 'Leila', 'Rania', '1993-01-20', 'Casablanca', '029329714', 14),
(83, 'Rania', 'Mehdi', '1994-02-25', 'Marrakech', '029329715', 14),
(84, 'Mehdi', 'Nada', '1995-03-12', 'Casablanca', '029329716', 14),
(85, 'Nada', 'Omar', '1992-01-15', 'Casablanca', '029329732', 15),
(86, 'Omar', 'Sara', '1993-02-22', 'Rabat', '029329733', 15),
(87, 'Sara', 'Karim', '1994-03-18', 'Casablanca', '029329734', 15),
(88, 'Karim', 'Fatima', '1995-04-25', 'Marrakech', '029329735', 15),
(89, 'Fatima', 'Hassan', '1996-05-12', 'Casablanca', '029329736', 15),
(90, 'Hassan', 'Noura', '1992-03-10', 'Casablanca', '029329752', 16),
(91, 'Noura', 'Sanaa', '1993-04-15', 'Rabat', '029329753', 16),
(92, 'Sanaa', 'Rania', '1994-05-20', 'Casablanca', '029329754', 16),
(93, 'Rania', 'Mehdi', '1995-06-25', 'Marrakech', '029329755', 16),
(94, 'Mehdi', 'Leila', '1996-07-12', 'Casablanca', '029329756', 16),
(95, 'Leila', 'Amine', '1992-05-15', 'Casablanca', '029329772', 17),
(96, 'Amine', 'Zahra', '1993-06-22', 'Rabat', '029329773', 17),
(97, 'Zahra', 'Yassin', '1994-07-18', 'Casablanca', '029329774', 17),
(98, 'Yassin', 'Sanaa', '1995-08-25', 'Marrakech', '029329775', 17),
(99, 'Sanaa', 'Omar', '1996-09-12', 'Casablanca', '029329776', 17),
(100, 'Omar', 'Nadia', '1992-07-10', 'Casablanca', '029329792', 18),
(101, 'Nadia', 'Hicham', '1993-08-15', 'Rabat', '029329793', 18),
(102, 'Hicham', 'Leila', '1994-09-20', 'Casablanca', '029329794', 18),
(103, 'Leila', 'Rania', '1995-10-25', 'Marrakech', '029329795', 18),
(104, 'Rania', 'Mehdi', '1996-11-12', 'Casablanca', '029329796', 18),
(105, 'Mehdi', 'Nada', '1992-09-15', 'Casablanca', '029329812', 19),
(106, 'Nada', 'Omar', '1993-10-22', 'Rabat', '029329813', 19),
(107, 'Omar', 'Sara', '1994-11-18', 'Casablanca', '029329814', 19),
(108, 'Sara', 'Karim', '1995-12-25', 'Marrakech', '029329815', 19),
(109, 'Karim', 'Fatima', '1996-01-12', 'Casablanca', '029329816', 19),
(110, 'Fatima', 'Hassan', '1992-11-10', 'Casablanca', '029329832', 20),
(111, 'Hassan', 'Noura', '1993-12-15', 'Rabat', '029329833', 20),
(112, 'Noura', 'Sanaa', '1994-01-20', 'Casablanca', '029329834', 20),
(113, 'Sanaa', 'Rania', '1995-02-25', 'Marrakech', '029329835', 20),
(114, 'Rania', 'Mehdi', '1996-03-12', 'Casablanca', '029329836', 20),
(115, 'Mehdi', 'Leila', '1993-01-15', 'Casablanca', '029329852', 21),
(116, 'Leila', 'Amine', '1994-02-22', 'Rabat', '029329853', 21),
(117, 'Amine', 'Zahra', '1995-03-18', 'Casablanca', '029329854', 21),
(118, 'Zahra', 'Yassin', '1996-04-25', 'Marrakech', '029329855', 21),
(119, 'Yassin', 'Sanaa', '1997-05-12', 'Casablanca', '029329856', 21),
(120, 'Sanaa', 'Omar', '1993-03-10', 'Casablanca', '029329872', 22),
(121, 'Omar', 'Nadia', '1994-04-15', 'Rabat', '029329873', 22),
(122, 'Nadia', 'Hicham', '1995-05-20', 'Casablanca', '029329874', 22),
(123, 'Hicham', 'Leila', '1996-06-25', 'Marrakech', '029329875', 22),
(124, 'Leila', 'Rania', '1997-07-12', 'Casablanca', '029329876', 22),
(125, 'Rania', 'Mehdi', '1993-05-15', 'Casablanca', '029329892', 23),
(126, 'Mehdi', 'Nada', '1994-06-22', 'Rabat', '029329893', 23),
(127, 'Nada', 'Omar', '1995-07-18', 'Casablanca', '029329894', 23),
(128, 'Omar', 'Sara', '1996-08-25', 'Marrakech', '029329895', 23),
(129, 'Sara', 'Karim', '1997-09-12', 'Casablanca', '029329896', 23),
(130, 'Karim', 'Fatima', '1993-07-10', 'Casablanca', '029329912', 24),
(131, 'Fatima', 'Hassan', '1994-08-15', 'Rabat', '029329913', 24),
(132, 'Hassan', 'Noura', '1995-09-20', 'Casablanca', '029329914', 24),
(133, 'Noura', 'Sanaa', '1996-10-25', 'Marrakech', '029329915', 24),
(134, 'Sanaa', 'Rania', '1997-11-12', 'Casablanca', '029329916', 24),
(135, 'Rania', 'Mehdi', '1993-09-15', 'Casablanca', '029329932', 25),
(136, 'Mehdi', 'Leila', '1994-10-22', 'Rabat', '029329933', 25),
(137, 'Leila', 'Amine', '1995-11-18', 'Casablanca', '029329934', 25),
(138, 'Amine', 'Zahra', '1996-12-25', 'Marrakech', '029329935', 25),
(139, 'Zahra', 'Yassin', '1997-01-12', 'Casablanca', '029329936', 25),
(140, 'Yassin', 'Sanaa', '1993-11-10', 'Casablanca', '029329952', 26),
(141, 'Sanaa', 'Omar', '1994-12-15', 'Rabat', '029329953', 26),
(142, 'Omar', 'Nadia', '1995-01-20', 'Casablanca', '029329954', 26),
(143, 'Nadia', 'Hicham', '1996-02-25', 'Marrakech', '029329955', 26),
(144, 'Hicham', 'Leila', '1997-03-12', 'Casablanca', '029329956', 26),
(145, 'Leila', 'Rania', '1994-01-15', 'Casablanca', '029329972', 27),
(146, 'Rania', 'Mehdi', '1995-02-22', 'Rabat', '029329973', 27),
(147, 'Mehdi', 'Nada', '1996-03-18', 'Casablanca', '029329974', 27),
(148, 'Nada', 'Omar', '1997-04-25', 'Marrakech', '029329975', 27),
(149, 'Omar', 'Sara', '1998-05-12', 'Casablanca', '029329976', 27),
(150, 'Sara', 'Karim', '1994-03-10', 'Casablanca', '029329992', 28),
(151, 'Karim', 'Fatima', '1995-04-15', 'Rabat', '029329993', 28),
(152, 'Fatima', 'Hassan', '1996-05-20', 'Casablanca', '029329994', 28),
(153, 'Hassan', 'Noura', '1997-06-25', 'Marrakech', '029329995', 28),
(154, 'Noura', 'Sanaa', '1998-07-12', 'Casablanca', '029329996', 28),
(155, 'Sanaa', 'Rania', '1994-05-15', 'Casablanca', '029330012', 29),
(156, 'Rania', 'Mehdi', '1995-06-22', 'Rabat', '029330013', 29),
(157, 'Mehdi', 'Leila', '1996-07-18', 'Casablanca', '029330014', 29),
(158, 'Leila', 'Amine', '1997-08-25', 'Marrakech', '029330015', 29),
(159, 'Amine', 'Zahra', '1998-09-12', 'Casablanca', '029330016', 29),
(160, 'Zahra', 'Yassin', '1994-07-10', 'Casablanca', '029330032', 30),
(161, 'Yassin', 'Sanaa', '1995-08-15', 'Rabat', '029330033', 30),
(162, 'Sanaa', 'Omar', '1996-09-20', 'Casablanca', '029330034', 30),
(163, 'Omar', 'Nadia', '1997-10-25', 'Marrakech', '029330035', 30),
(164, 'Nadia', 'Hicham', '1998-11-12', 'Casablanca', '029330036', 30),
(165, 'Hicham', 'Leila', '1994-09-15', 'Casablanca', '029330052', 31),
(166, 'Leila', 'Rania', '1995-10-22', 'Rabat', '029330053', 31),
(167, 'Rania', 'Mehdi', '1996-11-18', 'Casablanca', '029330054', 31),
(168, 'Mehdi', 'Nada', '1997-12-25', 'Marrakech', '029330055', 31),
(169, 'Nada', 'Omar', '1998-01-12', 'Casablanca', '029330056', 31),
(170, 'Omar', 'Sara', '1994-11-10', 'Casablanca', '029330072', 32),
(171, 'Sara', 'Karim', '1995-12-15', 'Rabat', '029330073', 32),
(172, 'Karim', 'Fatima', '1996-01-20', 'Casablanca', '029330074', 32),
(173, 'Fatima', 'Hassan', '1997-02-25', 'Marrakech', '029330075', 32),
(174, 'Hassan', 'Noura', '1998-03-12', 'Casablanca', '029330076', 32),
(175, 'Noura', 'Sanaa', '1995-01-15', 'Casablanca', '029330092', 33),
(176, 'Sanaa', 'Rania', '1996-02-22', 'Rabat', '029330093', 33),
(177, 'Rania', 'Mehdi', '1997-03-18', 'Casablanca', '029330094', 33),
(178, 'Mehdi', 'Leila', '1998-04-25', 'Marrakech', '029330095', 33),
(179, 'Leila', 'Amine', '1999-05-12', 'Casablanca', '029330096', 33),
(180, 'Amine', 'Zahra', '1995-03-10', 'Casablanca', '029330112', 34),
(181, 'Zahra', 'Yassin', '1996-04-15', 'Rabat', '029330113', 34),
(182, 'Yassin', 'Sanaa', '1997-05-20', 'Casablanca', '029330114', 34),
(183, 'Sanaa', 'Omar', '1998-06-25', 'Marrakech', '029330115', 34),
(184, 'Omar', 'Nadia', '1999-07-12', 'Casablanca', '029330116', 34),
(185, 'LAGMAR', 'Ayoub', '1999-02-19', 'Casablanca', '029329452', 1),
(186, 'Nohad', 'Imad', '1990-01-21', 'Casablanca', '029329453', 1),
(187, 'OUBARKA', 'Samir', '1990-11-19', 'Barnoussin', '029329454', 1),
(188, 'Kadir', 'Younes', '1999-12-19', 'Ouazzan', '029329455', 1),
(189, 'Zemzami', 'Mehdi', '1991-07-20', 'Maarif', '029329456', 1),
(190, 'Ali', 'Yassine', '1990-02-14', 'Casablanca', '029329472', 2),
(191, 'Salma', 'Omar', '1991-05-03', 'Casablanca', '029329473', 2),
(192, 'Hicham', 'Sara', '1992-09-19', 'Rabat', '029329474', 2),
(193, 'Lina', 'Karim', '1993-11-12', 'Casablanca', '029329475', 2),
(194, 'Nabil', 'Imane', '1994-01-22', 'Marrakech', '029329476', 2),
(195, 'Rachid', 'Ayoub', '1990-01-11', 'Casablanca', '029329492', 3),
(196, 'Imane', 'Yassine', '1991-02-23', 'Rabat', '029329493', 3),
(197, 'Omar', 'Sofia', '1992-03-15', 'Casablanca', '029329494', 3),
(198, 'Samir', 'Salma', '1993-04-20', 'Marrakech', '029329495', 3),
(199, 'Karim', 'Lina', '1994-05-12', 'Casablanca', '029329496', 3),
(200, 'Ayoub', 'Karim', '1990-03-11', 'Casablanca', '029329512', 4),
(201, 'Sara', 'Imane', '1991-04-22', 'Rabat', '029329513', 4),
(202, 'Adam', 'Samira', '1992-05-15', 'Casablanca', '029329514', 4),
(203, 'Yassine', 'Sofia', '1993-06-20', 'Marrakech', '029329515', 4),
(204, 'Meriem', 'Karim', '1994-07-12', 'Casablanca', '029329516', 4),
(205, 'Mohamed', 'Amine', '1990-05-15', 'Casablanca', '029329532', 5),
(206, 'Fatima', 'Zahra', '1991-06-22', 'Rabat', '029329533', 5),
(207, 'Mehdi', 'Yassin', '1992-07-18', 'Casablanca', '029329534', 5),
(208, 'Sanaa', 'Khalid', '1993-08-25', 'Marrakech', '029329535', 5),
(209, 'Omar', 'Nadia', '1994-09-12', 'Casablanca', '029329536', 5),
(210, 'Amine', 'Fatima', '1990-07-11', 'Casablanca', '029329552', 6),
(211, 'Zahra', 'Mehdi', '1991-08-23', 'Rabat', '029329553', 6),
(212, 'Yassin', 'Sanaa', '1992-09-15', 'Casablanca', '029329554', 6),
(213, 'Khalid', 'Omar', '1993-10-20', 'Marrakech', '029329555', 6),
(214, 'Nadia', 'Noura', '1994-11-12', 'Casablanca', '029329556', 6),
(215, 'Yassin', 'Zahra', '1990-09-15', 'Casablanca', '029329572', 7),
(216, 'Sanaa', 'Yassin', '1991-10-22', 'Rabat', '029329573', 7),
(217, 'Omar', 'Khalid', '1992-11-18', 'Casablanca', '029329574', 7),
(218, 'Noura', 'Nadia', '1993-12-25', 'Marrakech', '029329575', 7),
(219, 'Karim', 'Hicham', '1994-01-12', 'Casablanca', '029329576', 7),
(220, 'Khalid', 'Sanaa', '1990-11-10', 'Casablanca', '029329592', 8),
(221, 'Nadia', 'Omar', '1991-12-15', 'Rabat', '029329593', 8),
(222, 'Hicham', 'Noura', '1992-01-20', 'Casablanca', '029329594', 8),
(223, 'Leila', 'Karim', '1993-02-25', 'Marrakech', '029329595', 8),
(224, 'Rania', 'Hassan', '1994-03-12', 'Casablanca', '029329596', 8),
(225, 'Omar', 'Nadia', '1991-01-15', 'Casablanca', '029329612', 9),
(226, 'Noura', 'Hicham', '1992-02-22', 'Rabat', '029329613', 9),
(227, 'Karim', 'Leila', '1993-03-18', 'Casablanca', '029329614', 9),
(228, 'Hassan', 'Rania', '1994-04-25', 'Marrakech', '029329615', 9),
(229, 'Sofia', 'Mehdi', '1995-05-12', 'Casablanca', '029329616', 9),
(230, 'Hicham', 'Karim', '1991-03-10', 'Casablanca', '029329632', 10),
(231, 'Leila', 'Hassan', '1992-04-15', 'Rabat', '029329633', 10),
(232, 'Rania', 'Sofia', '1993-05-20', 'Casablanca', '029329634', 10),
(233, 'Mehdi', 'Youssef', '1994-06-25', 'Marrakech', '029329635', 10),
(234, 'Nada', 'Amina', '1995-07-12', 'Casablanca', '029329636', 10),
(235, 'Omar', 'Sara', '1991-05-15', 'Casablanca', '029329652', 11),
(236, 'Sara', 'Karim', '1992-06-22', 'Rabat', '029329653', 11),
(237, 'Karim', 'Fatima', '1993-07-18', 'Casablanca', '029329654', 11),
(238, 'Fatima', 'Hassan', '1994-08-25', 'Marrakech', '029329655', 11),
(239, 'Hassan', 'Noura', '1995-09-12', 'Casablanca', '029329656', 11),
(240, 'Noura', 'Sanaa', '1991-07-10', 'Casablanca', '029329672', 12),
(241, 'Sanaa', 'Rania', '1992-08-15', 'Rabat', '029329673', 12),
(242, 'Rania', 'Mehdi', '1993-09-20', 'Casablanca', '029329674', 12),
(243, 'Mehdi', 'Leila', '1994-10-25', 'Marrakech', '029329675', 12),
(244, 'Leila', 'Amine', '1995-11-12', 'Casablanca', '029329676', 12),
(245, 'Amine', 'Zahra', '1991-09-15', 'Casablanca', '029329692', 13),
(246, 'Zahra', 'Yassin', '1992-10-22', 'Rabat', '029329693', 13),
(247, 'Yassin', 'Sanaa', '1993-11-18', 'Casablanca', '029329694', 13),
(248, 'Sanaa', 'Omar', '1994-12-25', 'Marrakech', '029329695', 13),
(249, 'Omar', 'Nadia', '1995-01-12', 'Casablanca', '029329696', 13),
(250, 'Nadia', 'Hicham', '1991-11-10', 'Casablanca', '029329712', 14),
(251, 'Hicham', 'Leila', '1992-12-15', 'Rabat', '029329713', 14),
(252, 'Leila', 'Rania', '1993-01-20', 'Casablanca', '029329714', 14),
(253, 'Rania', 'Mehdi', '1994-02-25', 'Marrakech', '029329715', 14),
(254, 'Mehdi', 'Nada', '1995-03-12', 'Casablanca', '029329716', 14),
(255, 'Nada', 'Omar', '1992-01-15', 'Casablanca', '029329732', 15),
(256, 'Omar', 'Sara', '1993-02-22', 'Rabat', '029329733', 15),
(257, 'Sara', 'Karim', '1994-03-18', 'Casablanca', '029329734', 15),
(258, 'Karim', 'Fatima', '1995-04-25', 'Marrakech', '029329735', 15),
(259, 'Fatima', 'Hassan', '1996-05-12', 'Casablanca', '029329736', 15),
(260, 'Hassan', 'Noura', '1992-03-10', 'Casablanca', '029329752', 16),
(261, 'Noura', 'Sanaa', '1993-04-15', 'Rabat', '029329753', 16),
(262, 'Sanaa', 'Rania', '1994-05-20', 'Casablanca', '029329754', 16),
(263, 'Rania', 'Mehdi', '1995-06-25', 'Marrakech', '029329755', 16),
(264, 'Mehdi', 'Leila', '1996-07-12', 'Casablanca', '029329756', 16),
(265, 'Leila', 'Amine', '1992-05-15', 'Casablanca', '029329772', 17),
(266, 'Amine', 'Zahra', '1993-06-22', 'Rabat', '029329773', 17),
(267, 'Zahra', 'Yassin', '1994-07-18', 'Casablanca', '029329774', 17),
(268, 'Yassin', 'Sanaa', '1995-08-25', 'Marrakech', '029329775', 17),
(269, 'Sanaa', 'Omar', '1996-09-12', 'Casablanca', '029329776', 17),
(270, 'Omar', 'Nadia', '1992-07-10', 'Casablanca', '029329792', 18),
(271, 'Nadia', 'Hicham', '1993-08-15', 'Rabat', '029329793', 18),
(272, 'Hicham', 'Leila', '1994-09-20', 'Casablanca', '029329794', 18),
(273, 'Leila', 'Rania', '1995-10-25', 'Marrakech', '029329795', 18),
(274, 'Rania', 'Mehdi', '1996-11-12', 'Casablanca', '029329796', 18),
(275, 'Mehdi', 'Nada', '1992-09-15', 'Casablanca', '029329812', 19),
(276, 'Nada', 'Omar', '1993-10-22', 'Rabat', '029329813', 19),
(277, 'Omar', 'Sara', '1994-11-18', 'Casablanca', '029329814', 19),
(278, 'Sara', 'Karim', '1995-12-25', 'Marrakech', '029329815', 19),
(279, 'Karim', 'Fatima', '1996-01-12', 'Casablanca', '029329816', 19),
(280, 'Fatima', 'Hassan', '1992-11-10', 'Casablanca', '029329832', 20),
(281, 'Hassan', 'Noura', '1993-12-15', 'Rabat', '029329833', 20),
(282, 'Noura', 'Sanaa', '1994-01-20', 'Casablanca', '029329834', 20),
(283, 'Sanaa', 'Rania', '1995-02-25', 'Marrakech', '029329835', 20),
(284, 'Rania', 'Mehdi', '1996-03-12', 'Casablanca', '029329836', 20),
(285, 'Mehdi', 'Leila', '1993-01-15', 'Casablanca', '029329852', 21),
(286, 'Leila', 'Amine', '1994-02-22', 'Rabat', '029329853', 21),
(287, 'Amine', 'Zahra', '1995-03-18', 'Casablanca', '029329854', 21),
(288, 'Zahra', 'Yassin', '1996-04-25', 'Marrakech', '029329855', 21),
(289, 'Yassin', 'Sanaa', '1997-05-12', 'Casablanca', '029329856', 21),
(290, 'Sanaa', 'Omar', '1993-03-10', 'Casablanca', '029329872', 22),
(291, 'Omar', 'Nadia', '1994-04-15', 'Rabat', '029329873', 22),
(292, 'Nadia', 'Hicham', '1995-05-20', 'Casablanca', '029329874', 22),
(293, 'Hicham', 'Leila', '1996-06-25', 'Marrakech', '029329875', 22),
(294, 'Leila', 'Rania', '1997-07-12', 'Casablanca', '029329876', 22),
(295, 'Rania', 'Mehdi', '1993-05-15', 'Casablanca', '029329892', 23),
(296, 'Mehdi', 'Nada', '1994-06-22', 'Rabat', '029329893', 23),
(297, 'Nada', 'Omar', '1995-07-18', 'Casablanca', '029329894', 23),
(298, 'Omar', 'Sara', '1996-08-25', 'Marrakech', '029329895', 23),
(299, 'Sara', 'Karim', '1997-09-12', 'Casablanca', '029329896', 23),
(300, 'Karim', 'Fatima', '1993-07-10', 'Casablanca', '029329912', 24),
(301, 'Fatima', 'Hassan', '1994-08-15', 'Rabat', '029329913', 24),
(302, 'Hassan', 'Noura', '1995-09-20', 'Casablanca', '029329914', 24),
(303, 'Noura', 'Sanaa', '1996-10-25', 'Marrakech', '029329915', 24),
(304, 'Sanaa', 'Rania', '1997-11-12', 'Casablanca', '029329916', 24),
(305, 'Rania', 'Mehdi', '1993-09-15', 'Casablanca', '029329932', 25),
(306, 'Mehdi', 'Leila', '1994-10-22', 'Rabat', '029329933', 25),
(307, 'Leila', 'Amine', '1995-11-18', 'Casablanca', '029329934', 25),
(308, 'Amine', 'Zahra', '1996-12-25', 'Marrakech', '029329935', 25),
(309, 'Zahra', 'Yassin', '1997-01-12', 'Casablanca', '029329936', 25),
(310, 'Yassin', 'Sanaa', '1993-11-10', 'Casablanca', '029329952', 26),
(311, 'Sanaa', 'Omar', '1994-12-15', 'Rabat', '029329953', 26),
(312, 'Omar', 'Nadia', '1995-01-20', 'Casablanca', '029329954', 26),
(313, 'Nadia', 'Hicham', '1996-02-25', 'Marrakech', '029329955', 26),
(314, 'Hicham', 'Leila', '1997-03-12', 'Casablanca', '029329956', 26),
(315, 'Leila', 'Rania', '1994-01-15', 'Casablanca', '029329972', 27),
(316, 'Rania', 'Mehdi', '1995-02-22', 'Rabat', '029329973', 27),
(317, 'Mehdi', 'Nada', '1996-03-18', 'Casablanca', '029329974', 27),
(318, 'Nada', 'Omar', '1997-04-25', 'Marrakech', '029329975', 27),
(319, 'Omar', 'Sara', '1998-05-12', 'Casablanca', '029329976', 27),
(320, 'Sara', 'Karim', '1994-03-10', 'Casablanca', '029329992', 28),
(321, 'Karim', 'Fatima', '1995-04-15', 'Rabat', '029329993', 28),
(322, 'Fatima', 'Hassan', '1996-05-20', 'Casablanca', '029329994', 28),
(323, 'Hassan', 'Noura', '1997-06-25', 'Marrakech', '029329995', 28),
(324, 'Noura', 'Sanaa', '1998-07-12', 'Casablanca', '029329996', 28),
(325, 'Sanaa', 'Rania', '1994-05-15', 'Casablanca', '029330012', 29),
(326, 'Rania', 'Mehdi', '1995-06-22', 'Rabat', '029330013', 29),
(327, 'Mehdi', 'Leila', '1996-07-18', 'Casablanca', '029330014', 29),
(328, 'Leila', 'Amine', '1997-08-25', 'Marrakech', '029330015', 29),
(329, 'Amine', 'Zahra', '1998-09-12', 'Casablanca', '029330016', 29),
(330, 'Zahra', 'Yassin', '1994-07-10', 'Casablanca', '029330032', 30),
(331, 'Yassin', 'Sanaa', '1995-08-15', 'Rabat', '029330033', 30),
(332, 'Sanaa', 'Omar', '1996-09-20', 'Casablanca', '029330034', 30),
(333, 'Omar', 'Nadia', '1997-10-25', 'Marrakech', '029330035', 30),
(334, 'Nadia', 'Hicham', '1998-11-12', 'Casablanca', '029330036', 30),
(335, 'Hicham', 'Leila', '1994-09-15', 'Casablanca', '029330052', 31),
(336, 'Leila', 'Rania', '1995-10-22', 'Rabat', '029330053', 31),
(337, 'Rania', 'Mehdi', '1996-11-18', 'Casablanca', '029330054', 31),
(338, 'Mehdi', 'Nada', '1997-12-25', 'Marrakech', '029330055', 31),
(339, 'Nada', 'Omar', '1998-01-12', 'Casablanca', '029330056', 31),
(340, 'Omar', 'Sara', '1994-11-10', 'Casablanca', '029330072', 32),
(341, 'Sara', 'Karim', '1995-12-15', 'Rabat', '029330073', 32),
(342, 'Karim', 'Fatima', '1996-01-20', 'Casablanca', '029330074', 32),
(343, 'Fatima', 'Hassan', '1997-02-25', 'Marrakech', '029330075', 32),
(344, 'Hassan', 'Noura', '1998-03-12', 'Casablanca', '029330076', 32),
(345, 'Noura', 'Sanaa', '1995-01-15', 'Casablanca', '029330092', 33),
(346, 'Sanaa', 'Rania', '1996-02-22', 'Rabat', '029330093', 33),
(347, 'Rania', 'Mehdi', '1997-03-18', 'Casablanca', '029330094', 33),
(348, 'Mehdi', 'Leila', '1998-04-25', 'Marrakech', '029330095', 33),
(349, 'Leila', 'Amine', '1999-05-12', 'Casablanca', '029330096', 33),
(350, 'Amine', 'Zahra', '1995-03-10', 'Casablanca', '029330112', 34),
(351, 'Zahra', 'Yassin', '1996-04-15', 'Rabat', '029330113', 34),
(352, 'Yassin', 'Sanaa', '1997-05-20', 'Casablanca', '029330114', 34),
(353, 'Sanaa', 'Omar', '1998-06-25', 'Marrakech', '029330115', 34),
(354, 'Omar', 'Nadia', '1999-07-12', 'Casablanca', '029330116', 34),
(355, 'LAGMAR', 'Ayoub', '1999-02-19', 'Casablanca', '029329452', 1),
(356, 'Nohad', 'Imad', '1990-01-21', 'Casablanca', '029329453', 1),
(357, 'OUBARKA', 'Samir', '1990-11-19', 'Barnoussin', '029329454', 1),
(358, 'Kadir', 'Younes', '1999-12-19', 'Ouazzan', '029329455', 1),
(359, 'Zemzami', 'Mehdi', '1991-07-20', 'Maarif', '029329456', 1),
(360, 'Ali', 'Yassine', '1990-02-14', 'Casablanca', '029329472', 2),
(361, 'Salma', 'Omar', '1991-05-03', 'Casablanca', '029329473', 2),
(362, 'Hicham', 'Sara', '1992-09-19', 'Rabat', '029329474', 2),
(363, 'Lina', 'Karim', '1993-11-12', 'Casablanca', '029329475', 2),
(364, 'Nabil', 'Imane', '1994-01-22', 'Marrakech', '029329476', 2),
(365, 'Rachid', 'Ayoub', '1990-01-11', 'Casablanca', '029329492', 3),
(366, 'Imane', 'Yassine', '1991-02-23', 'Rabat', '029329493', 3),
(367, 'Omar', 'Sofia', '1992-03-15', 'Casablanca', '029329494', 3),
(368, 'Samir', 'Salma', '1993-04-20', 'Marrakech', '029329495', 3),
(369, 'Karim', 'Lina', '1994-05-12', 'Casablanca', '029329496', 3),
(370, 'Ayoub', 'Karim', '1990-03-11', 'Casablanca', '029329512', 4),
(371, 'Sara', 'Imane', '1991-04-22', 'Rabat', '029329513', 4),
(372, 'Adam', 'Samira', '1992-05-15', 'Casablanca', '029329514', 4),
(373, 'Yassine', 'Sofia', '1993-06-20', 'Marrakech', '029329515', 4),
(374, 'Meriem', 'Karim', '1994-07-12', 'Casablanca', '029329516', 4),
(375, 'Mohamed', 'Amine', '1990-05-15', 'Casablanca', '029329532', 5),
(376, 'Fatima', 'Zahra', '1991-06-22', 'Rabat', '029329533', 5),
(377, 'Mehdi', 'Yassin', '1992-07-18', 'Casablanca', '029329534', 5),
(378, 'Sanaa', 'Khalid', '1993-08-25', 'Marrakech', '029329535', 5),
(379, 'Omar', 'Nadia', '1994-09-12', 'Casablanca', '029329536', 5),
(380, 'Amine', 'Fatima', '1990-07-11', 'Casablanca', '029329552', 6),
(381, 'Zahra', 'Mehdi', '1991-08-23', 'Rabat', '029329553', 6),
(382, 'Yassin', 'Sanaa', '1992-09-15', 'Casablanca', '029329554', 6),
(383, 'Khalid', 'Omar', '1993-10-20', 'Marrakech', '029329555', 6),
(384, 'Nadia', 'Noura', '1994-11-12', 'Casablanca', '029329556', 6),
(385, 'Yassin', 'Zahra', '1990-09-15', 'Casablanca', '029329572', 7),
(386, 'Sanaa', 'Yassin', '1991-10-22', 'Rabat', '029329573', 7),
(387, 'Omar', 'Khalid', '1992-11-18', 'Casablanca', '029329574', 7),
(388, 'Noura', 'Nadia', '1993-12-25', 'Marrakech', '029329575', 7),
(389, 'Karim', 'Hicham', '1994-01-12', 'Casablanca', '029329576', 7),
(390, 'Khalid', 'Sanaa', '1990-11-10', 'Casablanca', '029329592', 8),
(391, 'Nadia', 'Omar', '1991-12-15', 'Rabat', '029329593', 8),
(392, 'Hicham', 'Noura', '1992-01-20', 'Casablanca', '029329594', 8),
(393, 'Leila', 'Karim', '1993-02-25', 'Marrakech', '029329595', 8),
(394, 'Rania', 'Hassan', '1994-03-12', 'Casablanca', '029329596', 8),
(395, 'Omar', 'Nadia', '1991-01-15', 'Casablanca', '029329612', 9),
(396, 'Noura', 'Hicham', '1992-02-22', 'Rabat', '029329613', 9),
(397, 'Karim', 'Leila', '1993-03-18', 'Casablanca', '029329614', 9),
(398, 'Hassan', 'Rania', '1994-04-25', 'Marrakech', '029329615', 9),
(399, 'Sofia', 'Mehdi', '1995-05-12', 'Casablanca', '029329616', 9),
(400, 'Hicham', 'Karim', '1991-03-10', 'Casablanca', '029329632', 10),
(401, 'Leila', 'Hassan', '1992-04-15', 'Rabat', '029329633', 10),
(402, 'Rania', 'Sofia', '1993-05-20', 'Casablanca', '029329634', 10),
(403, 'Mehdi', 'Youssef', '1994-06-25', 'Marrakech', '029329635', 10),
(404, 'Nada', 'Amina', '1995-07-12', 'Casablanca', '029329636', 10),
(405, 'Omar', 'Sara', '1991-05-15', 'Casablanca', '029329652', 11),
(406, 'Sara', 'Karim', '1992-06-22', 'Rabat', '029329653', 11),
(407, 'Karim', 'Fatima', '1993-07-18', 'Casablanca', '029329654', 11),
(408, 'Fatima', 'Hassan', '1994-08-25', 'Marrakech', '029329655', 11),
(409, 'Hassan', 'Noura', '1995-09-12', 'Casablanca', '029329656', 11),
(410, 'Noura', 'Sanaa', '1991-07-10', 'Casablanca', '029329672', 12),
(411, 'Sanaa', 'Rania', '1992-08-15', 'Rabat', '029329673', 12),
(412, 'Rania', 'Mehdi', '1993-09-20', 'Casablanca', '029329674', 12),
(413, 'Mehdi', 'Leila', '1994-10-25', 'Marrakech', '029329675', 12),
(414, 'Leila', 'Amine', '1995-11-12', 'Casablanca', '029329676', 12),
(415, 'Amine', 'Zahra', '1991-09-15', 'Casablanca', '029329692', 13),
(416, 'Zahra', 'Yassin', '1992-10-22', 'Rabat', '029329693', 13),
(417, 'Yassin', 'Sanaa', '1993-11-18', 'Casablanca', '029329694', 13),
(418, 'Sanaa', 'Omar', '1994-12-25', 'Marrakech', '029329695', 13),
(419, 'Omar', 'Nadia', '1995-01-12', 'Casablanca', '029329696', 13),
(420, 'Nadia', 'Hicham', '1991-11-10', 'Casablanca', '029329712', 14),
(421, 'Hicham', 'Leila', '1992-12-15', 'Rabat', '029329713', 14),
(422, 'Leila', 'Rania', '1993-01-20', 'Casablanca', '029329714', 14),
(423, 'Rania', 'Mehdi', '1994-02-25', 'Marrakech', '029329715', 14),
(424, 'Mehdi', 'Nada', '1995-03-12', 'Casablanca', '029329716', 14),
(425, 'Nada', 'Omar', '1992-01-15', 'Casablanca', '029329732', 15),
(426, 'Omar', 'Sara', '1993-02-22', 'Rabat', '029329733', 15),
(427, 'Sara', 'Karim', '1994-03-18', 'Casablanca', '029329734', 15),
(428, 'Karim', 'Fatima', '1995-04-25', 'Marrakech', '029329735', 15),
(429, 'Fatima', 'Hassan', '1996-05-12', 'Casablanca', '029329736', 15),
(430, 'Hassan', 'Noura', '1992-03-10', 'Casablanca', '029329752', 16),
(431, 'Noura', 'Sanaa', '1993-04-15', 'Rabat', '029329753', 16),
(432, 'Sanaa', 'Rania', '1994-05-20', 'Casablanca', '029329754', 16),
(433, 'Rania', 'Mehdi', '1995-06-25', 'Marrakech', '029329755', 16),
(434, 'Mehdi', 'Leila', '1996-07-12', 'Casablanca', '029329756', 16),
(435, 'Leila', 'Amine', '1992-05-15', 'Casablanca', '029329772', 17),
(436, 'Amine', 'Zahra', '1993-06-22', 'Rabat', '029329773', 17),
(437, 'Zahra', 'Yassin', '1994-07-18', 'Casablanca', '029329774', 17),
(438, 'Yassin', 'Sanaa', '1995-08-25', 'Marrakech', '029329775', 17),
(439, 'Sanaa', 'Omar', '1996-09-12', 'Casablanca', '029329776', 17),
(440, 'Omar', 'Nadia', '1992-07-10', 'Casablanca', '029329792', 18),
(441, 'Nadia', 'Hicham', '1993-08-15', 'Rabat', '029329793', 18),
(442, 'Hicham', 'Leila', '1994-09-20', 'Casablanca', '029329794', 18),
(443, 'Leila', 'Rania', '1995-10-25', 'Marrakech', '029329795', 18),
(444, 'Rania', 'Mehdi', '1996-11-12', 'Casablanca', '029329796', 18),
(445, 'Mehdi', 'Nada', '1992-09-15', 'Casablanca', '029329812', 19),
(446, 'Nada', 'Omar', '1993-10-22', 'Rabat', '029329813', 19),
(447, 'Omar', 'Sara', '1994-11-18', 'Casablanca', '029329814', 19),
(448, 'Sara', 'Karim', '1995-12-25', 'Marrakech', '029329815', 19),
(449, 'Karim', 'Fatima', '1996-01-12', 'Casablanca', '029329816', 19),
(450, 'Fatima', 'Hassan', '1992-11-10', 'Casablanca', '029329832', 20),
(451, 'Hassan', 'Noura', '1993-12-15', 'Rabat', '029329833', 20),
(452, 'Noura', 'Sanaa', '1994-01-20', 'Casablanca', '029329834', 20),
(453, 'Sanaa', 'Rania', '1995-02-25', 'Marrakech', '029329835', 20),
(454, 'Rania', 'Mehdi', '1996-03-12', 'Casablanca', '029329836', 20),
(455, 'Mehdi', 'Leila', '1993-01-15', 'Casablanca', '029329852', 21),
(456, 'Leila', 'Amine', '1994-02-22', 'Rabat', '029329853', 21),
(457, 'Amine', 'Zahra', '1995-03-18', 'Casablanca', '029329854', 21),
(458, 'Zahra', 'Yassin', '1996-04-25', 'Marrakech', '029329855', 21),
(459, 'Yassin', 'Sanaa', '1997-05-12', 'Casablanca', '029329856', 21),
(460, 'Sanaa', 'Omar', '1993-03-10', 'Casablanca', '029329872', 22),
(461, 'Omar', 'Nadia', '1994-04-15', 'Rabat', '029329873', 22),
(462, 'Nadia', 'Hicham', '1995-05-20', 'Casablanca', '029329874', 22),
(463, 'Hicham', 'Leila', '1996-06-25', 'Marrakech', '029329875', 22),
(464, 'Leila', 'Rania', '1997-07-12', 'Casablanca', '029329876', 22),
(465, 'Rania', 'Mehdi', '1993-05-15', 'Casablanca', '029329892', 23),
(466, 'Mehdi', 'Nada', '1994-06-22', 'Rabat', '029329893', 23),
(467, 'Nada', 'Omar', '1995-07-18', 'Casablanca', '029329894', 23),
(468, 'Omar', 'Sara', '1996-08-25', 'Marrakech', '029329895', 23),
(469, 'Sara', 'Karim', '1997-09-12', 'Casablanca', '029329896', 23),
(470, 'Karim', 'Fatima', '1993-07-10', 'Casablanca', '029329912', 24),
(471, 'Fatima', 'Hassan', '1994-08-15', 'Rabat', '029329913', 24),
(472, 'Hassan', 'Noura', '1995-09-20', 'Casablanca', '029329914', 24),
(473, 'Noura', 'Sanaa', '1996-10-25', 'Marrakech', '029329915', 24),
(474, 'Sanaa', 'Rania', '1997-11-12', 'Casablanca', '029329916', 24),
(475, 'Rania', 'Mehdi', '1993-09-15', 'Casablanca', '029329932', 25),
(476, 'Mehdi', 'Leila', '1994-10-22', 'Rabat', '029329933', 25),
(477, 'Leila', 'Amine', '1995-11-18', 'Casablanca', '029329934', 25),
(478, 'Amine', 'Zahra', '1996-12-25', 'Marrakech', '029329935', 25),
(479, 'Zahra', 'Yassin', '1997-01-12', 'Casablanca', '029329936', 25),
(480, 'Yassin', 'Sanaa', '1993-11-10', 'Casablanca', '029329952', 26),
(481, 'Sanaa', 'Omar', '1994-12-15', 'Rabat', '029329953', 26),
(482, 'Omar', 'Nadia', '1995-01-20', 'Casablanca', '029329954', 26),
(483, 'Nadia', 'Hicham', '1996-02-25', 'Marrakech', '029329955', 26),
(484, 'Hicham', 'Leila', '1997-03-12', 'Casablanca', '029329956', 26),
(485, 'Leila', 'Rania', '1994-01-15', 'Casablanca', '029329972', 27),
(486, 'Rania', 'Mehdi', '1995-02-22', 'Rabat', '029329973', 27),
(487, 'Mehdi', 'Nada', '1996-03-18', 'Casablanca', '029329974', 27),
(488, 'Nada', 'Omar', '1997-04-25', 'Marrakech', '029329975', 27),
(489, 'Omar', 'Sara', '1998-05-12', 'Casablanca', '029329976', 27),
(490, 'Sara', 'Karim', '1994-03-10', 'Casablanca', '029329992', 28),
(491, 'Karim', 'Fatima', '1995-04-15', 'Rabat', '029329993', 28),
(492, 'Fatima', 'Hassan', '1996-05-20', 'Casablanca', '029329994', 28),
(493, 'Hassan', 'Noura', '1997-06-25', 'Marrakech', '029329995', 28),
(494, 'Noura', 'Sanaa', '1998-07-12', 'Casablanca', '029329996', 28),
(495, 'Sanaa', 'Rania', '1994-05-15', 'Casablanca', '029330012', 29),
(496, 'Rania', 'Mehdi', '1995-06-22', 'Rabat', '029330013', 29),
(497, 'Mehdi', 'Leila', '1996-07-18', 'Casablanca', '029330014', 29),
(498, 'Leila', 'Amine', '1997-08-25', 'Marrakech', '029330015', 29),
(499, 'Amine', 'Zahra', '1998-09-12', 'Casablanca', '029330016', 29),
(500, 'Zahra', 'Yassin', '1994-07-10', 'Casablanca', '029330032', 30),
(501, 'Yassin', 'Sanaa', '1995-08-15', 'Rabat', '029330033', 30),
(502, 'Sanaa', 'Omar', '1996-09-20', 'Casablanca', '029330034', 30),
(503, 'Omar', 'Nadia', '1997-10-25', 'Marrakech', '029330035', 30),
(504, 'Nadia', 'Hicham', '1998-11-12', 'Casablanca', '029330036', 30),
(505, 'Hicham', 'Leila', '1994-09-15', 'Casablanca', '029330052', 31),
(506, 'Leila', 'Rania', '1995-10-22', 'Rabat', '029330053', 31),
(507, 'Rania', 'Mehdi', '1996-11-18', 'Casablanca', '029330054', 31),
(508, 'Mehdi', 'Nada', '1997-12-25', 'Marrakech', '029330055', 31),
(509, 'Nada', 'Omar', '1998-01-12', 'Casablanca', '029330056', 31),
(510, 'Omar', 'Sara', '1994-11-10', 'Casablanca', '029330072', 32),
(511, 'Sara', 'Karim', '1995-12-15', 'Rabat', '029330073', 32),
(512, 'Karim', 'Fatima', '1996-01-20', 'Casablanca', '029330074', 32),
(513, 'Fatima', 'Hassan', '1997-02-25', 'Marrakech', '029330075', 32),
(514, 'Hassan', 'Noura', '1998-03-12', 'Casablanca', '029330076', 32),
(515, 'Noura', 'Sanaa', '1995-01-15', 'Casablanca', '029330092', 33),
(516, 'Sanaa', 'Rania', '1996-02-22', 'Rabat', '029330093', 33),
(517, 'Rania', 'Mehdi', '1997-03-18', 'Casablanca', '029330094', 33),
(518, 'Mehdi', 'Leila', '1998-04-25', 'Marrakech', '029330095', 33),
(519, 'Leila', 'Amine', '1999-05-12', 'Casablanca', '029330096', 33),
(520, 'Amine', 'Zahra', '1995-03-10', 'Casablanca', '029330112', 34),
(521, 'Zahra', 'Yassin', '1996-04-15', 'Rabat', '029330113', 34),
(522, 'Yassin', 'Sanaa', '1997-05-20', 'Casablanca', '029330114', 34),
(523, 'Sanaa', 'Omar', '1998-06-25', 'Marrakech', '029330115', 34),
(524, 'Omar', 'Nadia', '1999-07-12', 'Casablanca', '029330116', 34),
(525, 'Omar', 'Sara', '1991-05-15', 'Casablanca', '029329652', 35),
(526, 'Sara', 'Karim', '1992-06-22', 'Rabat', '029329653', 35),
(527, 'Karim', 'Fatima', '1993-07-18', 'Casablanca', '029329654', 35),
(528, 'Fatima', 'Hassan', '1994-08-25', 'Marrakech', '029329655', 35),
(529, 'Hassan', 'Noura', '1995-09-12', 'Casablanca', '029329656', 35),
(530, 'Noura', 'Sanaa', '1991-07-10', 'Casablanca', '029329672', 36),
(531, 'Sanaa', 'Rania', '1992-08-15', 'Rabat', '029329673', 36),
(532, 'Rania', 'Mehdi', '1993-09-20', 'Casablanca', '029329674', 36),
(533, 'Mehdi', 'Leila', '1994-10-25', 'Marrakech', '029329675', 36),
(534, 'Leila', 'Amine', '1995-11-12', 'Casablanca', '029329676', 36),
(535, 'Amine', 'Zahra', '1991-09-15', 'Casablanca', '029329692', 37),
(536, 'Zahra', 'Yassin', '1992-10-22', 'Rabat', '029329693', 37),
(537, 'Yassin', 'Sanaa', '1993-11-18', 'Casablanca', '029329694', 37),
(538, 'Sanaa', 'Omar', '1994-12-25', 'Marrakech', '029329695', 37),
(539, 'Omar', 'Nadia', '1995-01-12', 'Casablanca', '029329696', 37),
(540, 'Nadia', 'Hicham', '1991-11-10', 'Casablanca', '029329712', 38),
(541, 'Hicham', 'Leila', '1992-12-15', 'Rabat', '029329713', 38),
(542, 'Leila', 'Rania', '1993-01-20', 'Casablanca', '029329714', 38),
(543, 'Rania', 'Mehdi', '1994-02-25', 'Marrakech', '029329715', 38),
(544, 'Mehdi', 'Nada', '1995-03-12', 'Casablanca', '029329716', 38),
(545, 'Nada', 'Omar', '1992-01-15', 'Casablanca', '029329732', 39),
(546, 'Omar', 'Sara', '1993-02-22', 'Rabat', '029329733', 39),
(547, 'Sara', 'Karim', '1994-03-18', 'Casablanca', '029329734', 39),
(548, 'Karim', 'Fatima', '1995-04-25', 'Marrakech', '029329735', 39),
(549, 'Fatima', 'Hassan', '1996-05-12', 'Casablanca', '029329736', 39),
(550, 'Hassan', 'Noura', '1992-03-10', 'Casablanca', '029329752', 40),
(551, 'Noura', 'Sanaa', '1993-04-15', 'Rabat', '029329753', 40),
(552, 'Sanaa', 'Rania', '1994-05-20', 'Casablanca', '029329754', 40),
(553, 'Rania', 'Mehdi', '1995-06-25', 'Marrakech', '029329755', 40),
(554, 'Mehdi', 'Leila', '1996-07-12', 'Casablanca', '029329756', 40),
(555, 'Leila', 'Amine', '1992-05-15', 'Casablanca', '029329772', 41),
(556, 'Amine', 'Zahra', '1993-06-22', 'Rabat', '029329773', 41),
(557, 'Zahra', 'Yassin', '1994-07-18', 'Casablanca', '029329774', 41),
(558, 'Yassin', 'Sanaa', '1995-08-25', 'Marrakech', '029329775', 41),
(559, 'Sanaa', 'Omar', '1996-09-12', 'Casablanca', '029329776', 41),
(560, 'Omar', 'Nadia', '1992-07-10', 'Casablanca', '029329792', 42),
(561, 'Nadia', 'Hicham', '1993-08-15', 'Rabat', '029329793', 42),
(562, 'Hicham', 'Leila', '1994-09-20', 'Casablanca', '029329794', 42),
(563, 'Leila', 'Rania', '1995-10-25', 'Marrakech', '029329795', 42),
(564, 'Rania', 'Mehdi', '1996-11-12', 'Casablanca', '029329796', 42),
(565, 'Mehdi', 'Nada', '1992-09-15', 'Casablanca', '029329812', 43),
(566, 'Nada', 'Omar', '1993-10-22', 'Rabat', '029329813', 43),
(567, 'Omar', 'Sara', '1994-11-18', 'Casablanca', '029329814', 43),
(568, 'Sara', 'Karim', '1995-12-25', 'Marrakech', '029329815', 43),
(569, 'Karim', 'Fatima', '1996-01-12', 'Casablanca', '029329816', 43),
(570, 'Fatima', 'Hassan', '1992-11-10', 'Casablanca', '029329832', 44),
(571, 'Hassan', 'Noura', '1993-12-15', 'Rabat', '029329833', 44),
(572, 'Noura', 'Sanaa', '1994-01-20', 'Casablanca', '029329834', 44),
(573, 'Sanaa', 'Rania', '1995-02-25', 'Marrakech', '029329835', 44),
(574, 'Rania', 'Mehdi', '1996-03-12', 'Casablanca', '029329836', 44),
(575, 'LAGMAR', 'Ayoub', '1999-02-19', 'Casablanca', '029329452', 44),
(576, 'Nohad', 'Imad', '1990-01-21', 'Casablanca', '029329453', 44),
(577, 'OUBARKA', 'Samir', '1990-11-19', 'Barnoussin', '029329454', 44),
(578, 'Kadir', 'Younes', '1999-12-19', 'Ouazzan', '029329455', 44),
(579, 'Zemzami', 'Mehdi', '1991-07-20', 'Maarif', '029329456', 44),
(580, 'Ali', 'Yassine', '1990-02-14', 'Casablanca', '029329472', 45),
(581, 'Salma', 'Omar', '1991-05-03', 'Casablanca', '029329473', 45),
(582, 'Hicham', 'Sara', '1992-09-19', 'Rabat', '029329474', 45),
(583, 'Lina', 'Karim', '1993-11-12', 'Casablanca', '029329475', 45),
(584, 'Nabil', 'Imane', '1994-01-22', 'Marrakech', '029329476', 45),
(585, 'Rachid', 'Ayoub', '1990-01-11', 'Casablanca', '029329492', 46),
(586, 'Imane', 'Yassine', '1991-02-23', 'Rabat', '029329493', 46),
(587, 'Omar', 'Sofia', '1992-03-15', 'Casablanca', '029329494', 46),
(588, 'Samir', 'Salma', '1993-04-20', 'Marrakech', '029329495', 46),
(589, 'Karim', 'Lina', '1994-05-12', 'Casablanca', '029329496', 46),
(590, 'Ayoub', 'Karim', '1990-03-11', 'Casablanca', '029329512', 47),
(591, 'Sara', 'Imane', '1991-04-22', 'Rabat', '029329513', 47),
(592, 'Adam', 'Samira', '1992-05-15', 'Casablanca', '029329514', 47),
(593, 'Yassine', 'Sofia', '1993-06-20', 'Marrakech', '029329515', 47),
(594, 'Meriem', 'Karim', '1994-07-12', 'Casablanca', '029329516', 47),
(595, 'Mohamed', 'Amine', '1990-05-15', 'Casablanca', '029329532', 48),
(596, 'Fatima', 'Zahra', '1991-06-22', 'Rabat', '029329533', 48),
(597, 'Mehdi', 'Yassin', '1992-07-18', 'Casablanca', '029329534', 48),
(598, 'Sanaa', 'Khalid', '1993-08-25', 'Marrakech', '029329535', 48),
(599, 'Omar', 'Nadia', '1994-09-12', 'Casablanca', '029329536', 48),
(600, 'Amine', 'Fatima', '1990-07-11', 'Casablanca', '029329552', 49),
(601, 'Zahra', 'Mehdi', '1991-08-23', 'Rabat', '029329553', 49),
(602, 'Yassin', 'Sanaa', '1992-09-15', 'Casablanca', '029329554', 49),
(603, 'Khalid', 'Omar', '1993-10-20', 'Marrakech', '029329555', 49),
(604, 'Nadia', 'Noura', '1994-11-12', 'Casablanca', '029329556', 49),
(605, 'Yassin', 'Zahra', '1990-09-15', 'Casablanca', '029329572', 50),
(606, 'Sanaa', 'Yassin', '1991-10-22', 'Rabat', '029329573', 50),
(607, 'Omar', 'Khalid', '1992-11-18', 'Casablanca', '029329574', 50),
(608, 'Noura', 'Nadia', '1993-12-25', 'Marrakech', '029329575', 50),
(609, 'Karim', 'Hicham', '1994-01-12', 'Casablanca', '029329576', 50),
(610, 'Khalid', 'Sanaa', '1990-11-10', 'Casablanca', '029329592', 51),
(611, 'Nadia', 'Omar', '1991-12-15', 'Rabat', '029329593', 51),
(612, 'Hicham', 'Noura', '1992-01-20', 'Casablanca', '029329594', 51),
(613, 'Leila', 'Karim', '1993-02-25', 'Marrakech', '029329595', 51),
(614, 'Rania', 'Hassan', '1994-03-12', 'Casablanca', '029329596', 51),
(615, 'Omar', 'Nadia', '1991-01-15', 'Casablanca', '029329612', 52),
(616, 'Noura', 'Hicham', '1992-02-22', 'Rabat', '029329613', 52),
(617, 'Karim', 'Leila', '1993-03-18', 'Casablanca', '029329614', 52),
(618, 'Hassan', 'Rania', '1994-04-25', 'Marrakech', '029329615', 52),
(619, 'Sofia', 'Mehdi', '1995-05-12', 'Casablanca', '029329616', 52),
(620, 'Hicham', 'Karim', '1991-03-10', 'Casablanca', '029329632', 53),
(621, 'Leila', 'Hassan', '1992-04-15', 'Rabat', '029329633', 53),
(622, 'Rania', 'Sofia', '1993-05-20', 'Casablanca', '029329634', 53),
(623, 'Mehdi', 'Youssef', '1994-06-25', 'Marrakech', '029329635', 53),
(624, 'Nada', 'Amina', '1995-07-12', 'Casablanca', '029329636', 53),
(625, 'Omar', 'Sara', '1991-05-15', 'Casablanca', '029329652', 54),
(626, 'Sara', 'Karim', '1992-06-22', 'Rabat', '029329653', 54),
(627, 'Karim', 'Fatima', '1993-07-18', 'Casablanca', '029329654', 54),
(628, 'Fatima', 'Hassan', '1994-08-25', 'Marrakech', '029329655', 54),
(629, 'Hassan', 'Noura', '1995-09-12', 'Casablanca', '029329656', 54),
(630, 'Noura', 'Sanaa', '1991-07-10', 'Casablanca', '029329672', 55),
(631, 'Sanaa', 'Rania', '1992-08-15', 'Rabat', '029329673', 55),
(632, 'Rania', 'Mehdi', '1993-09-20', 'Casablanca', '029329674', 55),
(633, 'Mehdi', 'Leila', '1994-10-25', 'Marrakech', '029329675', 55),
(634, 'Leila', 'Amine', '1995-11-12', 'Casablanca', '029329676', 55),
(635, 'Amine', 'Zahra', '1991-09-15', 'Casablanca', '029329692', 56),
(636, 'Zahra', 'Yassin', '1992-10-22', 'Rabat', '029329693', 56),
(637, 'Yassin', 'Sanaa', '1993-11-18', 'Casablanca', '029329694', 56),
(638, 'Sanaa', 'Omar', '1994-12-25', 'Marrakech', '029329695', 56),
(639, 'Omar', 'Nadia', '1995-01-12', 'Casablanca', '029329696', 56),
(640, 'Nadia', 'Hicham', '1991-11-10', 'Casablanca', '029329712', 57),
(641, 'Hicham', 'Leila', '1992-12-15', 'Rabat', '029329713', 57),
(642, 'Leila', 'Rania', '1993-01-20', 'Casablanca', '029329714', 57),
(643, 'Rania', 'Mehdi', '1994-02-25', 'Marrakech', '029329715', 57),
(644, 'Mehdi', 'Nada', '1995-03-12', 'Casablanca', '029329716', 57),
(645, 'Nada', 'Omar', '1992-01-15', 'Casablanca', '029329732', 58),
(646, 'Omar', 'Sara', '1993-02-22', 'Rabat', '029329733', 58),
(647, 'Sara', 'Karim', '1994-03-18', 'Casablanca', '029329734', 58),
(648, 'Karim', 'Fatima', '1995-04-25', 'Marrakech', '029329735', 58),
(649, 'Fatima', 'Hassan', '1996-05-12', 'Casablanca', '029329736', 58),
(650, 'Hassan', 'Noura', '1992-03-10', 'Casablanca', '029329752', 59),
(651, 'Noura', 'Sanaa', '1993-04-15', 'Rabat', '029329753', 59),
(652, 'Sanaa', 'Rania', '1994-05-20', 'Casablanca', '029329754', 59),
(653, 'Rania', 'Mehdi', '1995-06-25', 'Marrakech', '029329755', 59),
(654, 'Mehdi', 'Leila', '1996-07-12', 'Casablanca', '029329756', 59),
(655, 'Leila', 'Amine', '1992-05-15', 'Casablanca', '029329772', 60),
(656, 'Amine', 'Zahra', '1993-06-22', 'Rabat', '029329773', 60),
(657, 'Zahra', 'Yassin', '1994-07-18', 'Casablanca', '029329774', 60),
(658, 'Yassin', 'Sanaa', '1995-08-25', 'Marrakech', '029329775', 60),
(659, 'Sanaa', 'Omar', '1996-09-12', 'Casablanca', '029329776', 60),
(660, 'Omar', 'Nadia', '1992-07-10', 'Casablanca', '029329792', 61),
(661, 'Nadia', 'Hicham', '1993-08-15', 'Rabat', '029329793', 61),
(662, 'Hicham', 'Leila', '1994-09-20', 'Casablanca', '029329794', 61),
(663, 'Leila', 'Rania', '1995-10-25', 'Marrakech', '029329795', 61),
(664, 'Rania', 'Mehdi', '1996-11-12', 'Casablanca', '029329796', 61),
(665, 'Mehdi', 'Nada', '1992-09-15', 'Casablanca', '029329812', 62),
(666, 'Nada', 'Omar', '1993-10-22', 'Rabat', '029329813', 62),
(667, 'Omar', 'Sara', '1994-11-18', 'Casablanca', '029329814', 62),
(668, 'Sara', 'Karim', '1995-12-25', 'Marrakech', '029329815', 62),
(669, 'Karim', 'Fatima', '1996-01-12', 'Casablanca', '029329816', 62),
(670, 'Fatima', 'Hassan', '1992-11-10', 'Casablanca', '029329832', 63),
(671, 'Hassan', 'Noura', '1993-12-15', 'Rabat', '029329833', 63),
(672, 'Noura', 'Sanaa', '1994-01-20', 'Casablanca', '029329834', 63),
(673, 'Sanaa', 'Rania', '1995-02-25', 'Marrakech', '029329835', 63),
(674, 'Rania', 'Mehdi', '1996-03-12', 'Casablanca', '029329836', 63);

-- --------------------------------------------------------

--
-- Table structure for table `eleve_diplome`
--

CREATE TABLE `eleve_diplome` (
  `id` int NOT NULL,
  `numdip` int NOT NULL,
  `numel` int NOT NULL,
  `note` float NOT NULL,
  `commentaire` text NOT NULL,
  `etablissement` text NOT NULL,
  `lieu` text NOT NULL,
  `annee_obtention` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eleve_diplome`
--

INSERT INTO `eleve_diplome` (`id`, `numdip`, `numel`, `note`, `commentaire`, `etablissement`, `lieu`, `annee_obtention`) VALUES
(1, 1, 3, 14.54, 'Bien', 'ESTB', 'ESTB', 2010),
(2, 2, 5, 13, 'Assez bien', 'ESTB', 'ESTB', 2010),
(3, 3, 5, 12, 'SZDQS', 'SDFS', 'SD', 1212),
(5, 1, 1, 14.54, 'Bien', 'ESTB', 'Casablanca', 2010),
(6, 2, 2, 13, 'Assez bien', 'ESTB', 'Casablanca', 2010),
(7, 3, 3, 12, 'SZDQS', 'SDFS', 'SD', 2012),
(8, 4, 4, 15.25, 'Bien', 'ESTB', 'Rabat', 2011),
(9, 5, 5, 11.75, 'Passable', 'ESTB', 'Marrakech', 2010),
(10, 6, 6, 13.5, 'Assez bien', 'ESTB', 'Casablanca', 2011),
(11, 7, 7, 14, 'Bien', 'ESTB', 'Rabat', 2012),
(12, 8, 8, 12.5, 'Passable', 'ESTB', 'Marrakech', 2010),
(13, 9, 9, 13.75, 'Assez bien', 'ESTB', 'Casablanca', 2011),
(14, 10, 10, 15, 'Bien', 'ESTB', 'Rabat', 2012),
(15, 11, 11, 14.25, 'Bien', 'ESTB', 'Casablanca', 2010),
(16, 12, 12, 12.5, 'Passable', 'ESTB', 'Marrakech', 2011),
(17, 13, 13, 13.75, 'Assez bien', 'ESTB', 'Casablanca', 2012),
(18, 14, 14, 14.5, 'Bien', 'ESTB', 'Rabat', 2010),
(19, 15, 15, 12.25, 'Passable', 'ESTB', 'Casablanca', 2011),
(20, 16, 16, 13.5, 'Assez bien', 'ESTB', 'Marrakech', 2012),
(21, 17, 17, 14, 'Bien', 'ESTB', 'Casablanca', 2010),
(22, 18, 18, 11.75, 'Passable', 'ESTB', 'Rabat', 2011),
(23, 19, 19, 12.5, 'Assez bien', 'ESTB', 'Casablanca', 2012),
(24, 20, 20, 13.25, 'Bien', 'ESTB', 'Marrakech', 2010),
(25, 21, 21, 14.75, 'Bien', 'ESTB', 'Casablanca', 2011),
(26, 22, 22, 12, 'Passable', 'ESTB', 'Rabat', 2012),
(27, 23, 23, 13.5, 'Assez bien', 'ESTB', 'Casablanca', 2010),
(28, 24, 24, 14, 'Bien', 'ESTB', 'Marrakech', 2011),
(29, 25, 25, 12.75, 'Passable', 'ESTB', 'Casablanca', 2012),
(30, 26, 26, 13.25, 'Assez bien', 'ESTB', 'Rabat', 2010),
(31, 27, 27, 14.5, 'Bien', 'ESTB', 'Casablanca', 2011),
(32, 28, 28, 12.5, 'Passable', 'ESTB', 'Marrakech', 2012),
(33, 29, 29, 13.75, 'Assez bien', 'ESTB', 'Casablanca', 2010),
(34, 30, 30, 14, 'Bien', 'ESTB', 'Rabat', 2011);

-- --------------------------------------------------------

--
-- Table structure for table `enseignement`
--

CREATE TABLE `enseignement` (
  `id` int NOT NULL,
  `codecl` int NOT NULL,
  `codemat` int NOT NULL,
  `numprof` int NOT NULL,
  `numsem` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enseignement`
--

INSERT INTO `enseignement` (`id`, `codecl`, `codemat`, `numprof`, `numsem`) VALUES
(1, 1, 5, 3, 4),
(2, 2, 9, 6, 4),
(3, 5, 4, 6, 2),
(4, 2, 3, 6, 3),
(5, 1, 10, 4, 3),
(6, 4, 1, 2, 2),
(7, 3, 3, 6, 3),
(8, 6, 11, 6, 2),
(9, 1, 12, 1, 4),
(10, 4, 8, 5, 2),
(13, 3, 7, 6, 3),
(14, 1, 18, 4, 3),
(15, 5, 5, 5, 1),
(16, 5, 17, 5, 1),
(17, 4, 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `numeval` int NOT NULL,
  `numdev` int NOT NULL,
  `numel` int NOT NULL,
  `note` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`numeval`, `numdev`, `numel`, `note`) VALUES
(1, 1, 5, 12.18),
(2, 5, 4, 14),
(3, 6, 7, 15.25),
(4, 7, 8, 17),
(5, 5, 3, 13.57),
(6, 3, 3, 15),
(7, 4, 10, 18),
(8, 14, 8, 15),
(9, 2, 8, 13.75),
(11, 3, 4, 14.75),
(17, 19, 7, 16.25),
(13, 11, 3, 16),
(14, 1, 4, 13),
(15, 9, 3, 13.5),
(16, 9, 4, 14.25),
(18, 1, 1, 14.5),
(19, 1, 2, 15),
(20, 1, 3, 13.8),
(21, 1, 4, 14.2),
(22, 1, 5, 15.1),
(23, 1, 6, 14.9),
(24, 1, 7, 13.7),
(25, 1, 8, 15),
(26, 1, 9, 14.3),
(27, 1, 10, 15.2),
(28, 1, 11, 14),
(29, 1, 12, 13.9),
(30, 1, 13, 14.7),
(31, 1, 14, 15.1),
(32, 1, 15, 14.5),
(33, 1, 16, 14.8),
(34, 1, 17, 15),
(35, 1, 18, 14.2),
(36, 1, 19, 14.9),
(37, 1, 20, 15.3),
(38, 1, 21, 14.6),
(39, 1, 22, 15),
(40, 1, 23, 14.4),
(41, 1, 24, 15.2),
(42, 1, 25, 14.8),
(43, 1, 26, 14.7),
(44, 1, 27, 15.1),
(45, 1, 28, 14.9),
(46, 1, 29, 14.5),
(47, 1, 30, 15),
(48, 1, 31, 14.2),
(49, 1, 32, 15),
(50, 1, 33, 13.8),
(51, 1, 34, 14.7),
(52, 1, 35, 15.1),
(53, 1, 36, 14.5),
(54, 1, 37, 14.9),
(55, 1, 38, 15.3),
(56, 1, 39, 14.6),
(57, 1, 40, 15);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int NOT NULL,
  `Num` int NOT NULL,
  `pseudo` text NOT NULL,
  `passe` text NOT NULL,
  `type` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `Num`, `pseudo`, `passe`, `type`) VALUES
(1, 1, 'mickael', 'mickael', 'prof'),
(3, 100, 'sonia', 'sonia', 'admin'),
(4, 3, 'faylou', 'faylou', 'etudiant');

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

CREATE TABLE `matiere` (
  `codemat` int NOT NULL,
  `nommat` text NOT NULL,
  `codecl` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matiere`
--

INSERT INTO `matiere` (`codemat`, `nommat`, `codecl`) VALUES
(1, 'mathematique', 4),
(2, 'Algorithm', 4),
(3, 'Comptabilite', 2),
(4, 'Marketing', 5),
(5, 'Programmation', 1),
(6, 'psychiatrie', 6),
(7, 'Gestion des ressource', 3),
(8, 'Communication_gi', 4),
(9, 'Qualit', 2),
(10, 'Reseau', 1),
(11, 'Gestion de projet', 6),
(12, 'Multimedia', 1),
(14, 'Anglais', 5),
(16, 'Droit social', 6),
(17, 'Economie generale', 5),
(19, 'culture general', 4),
(20, 'Algorithm', 1),
(21, 'Comptabilite', 1),
(22, 'Marketing', 1),
(23, 'Programmation', 1),
(24, 'Psychiatrie', 1),
(25, 'Gestion des ressource', 1),
(26, 'Communication_gi', 1),
(27, 'Qualit', 1),
(28, 'Reseau', 1),
(29, 'Gestion de projet', 1),
(30, 'Multimedia', 1),
(31, 'Anglais', 1),
(32, 'Droit social', 1),
(33, 'Economie generale', 1),
(34, 'Culture general', 1),
(35, 'Algorithm', 2),
(36, 'Comptabilite', 2),
(37, 'Marketing', 2),
(38, 'Programmation', 2),
(39, 'Psychiatrie', 2),
(40, 'Gestion des ressource', 2),
(41, 'Communication_gi', 2),
(42, 'Qualit', 2),
(43, 'Reseau', 2),
(44, 'Gestion de projet', 2),
(45, 'Multimedia', 2),
(46, 'Anglais', 2),
(47, 'Droit social', 2),
(48, 'Economie generale', 2),
(49, 'Culture general', 2),
(50, 'Algorithm', 3),
(51, 'Comptabilite', 3),
(52, 'Marketing', 3),
(53, 'Programmation', 3),
(54, 'Psychiatrie', 3),
(55, 'Gestion des ressource', 3),
(56, 'Communication_gi', 3),
(57, 'Qualit', 3),
(58, 'Reseau', 3),
(59, 'Gestion de projet', 3),
(60, 'Multimedia', 3),
(61, 'Anglais', 3),
(62, 'Droit social', 3),
(63, 'Culture general', 3),
(64, 'Algorithm', 4),
(65, 'Comptabilite', 4),
(66, 'Marketing', 4),
(67, 'Programmation', 4),
(68, 'Psychiatrie', 4),
(69, 'Gestion des ressource', 4),
(70, 'Communication_gi', 4),
(71, 'Qualit', 4),
(72, 'Reseau', 4),
(73, 'Gestion de projet', 4),
(74, 'Multimedia', 4),
(75, 'Anglais', 4),
(76, 'Droit social', 4),
(77, 'Culture general', 4);

-- --------------------------------------------------------

--
-- Table structure for table `prof`
--

CREATE TABLE `prof` (
  `numprof` int NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `adresse` text NOT NULL,
  `telephone` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prof`
--

INSERT INTO `prof` (`numprof`, `nom`, `prenom`, `adresse`, `telephone`) VALUES
(1, 'SNOUNI', 'Leila', 'Sal', '023294532'),
(2, 'NAFIDI', 'Ahmed', 'casablanca', '0293287425'),
(3, 'Naimi', 'Mohamad', 'Rabat', '34328724'),
(4, 'Nasserdin', 'Bouchaib', 'SETTAT', '02932842342'),
(5, 'Laghrissi', 'Nadia', 'Settat', '0293248235'),
(6, 'CHROKI', 'RAZAN', 'SETTAT', '029328472'),
(8, 'LAKIR', 'Mohamed', 'Casablanca\'', '0900223');

-- --------------------------------------------------------

--
-- Table structure for table `semestre`
--

CREATE TABLE `semestre` (
  `numsem` int NOT NULL,
  `date_debut` text NOT NULL,
  `date_fin` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semestre`
--

INSERT INTO `semestre` (`numsem`, `date_debut`, `date_fin`) VALUES
(1, '10/11/2010', '01/04/2011'),
(2, '10/04/2010', '10/08/2010'),
(3, '02/03/2010', '02/06/2010'),
(4, '20/06/2010', '20/09/2010'),
(5, '2011-01-01', '2011-03-31'),
(6, '2011-04-01', '2011-06-30'),
(7, '2011-07-01', '2011-09-30'),
(8, '2011-10-01', '2011-12-31'),
(9, '2012-01-01', '2012-03-31'),
(10, '2012-04-01', '2012-06-30'),
(11, '2012-07-01', '2012-09-30'),
(12, '2012-10-01', '2012-12-31'),
(13, '2013-01-01', '2013-03-31'),
(14, '2013-04-01', '2013-06-30'),
(15, '2013-07-01', '2013-09-30'),
(16, '2013-10-01', '2013-12-31'),
(17, '2014-01-01', '2014-03-31'),
(18, '2014-04-01', '2014-06-30'),
(19, '2014-07-01', '2014-09-30'),
(20, '2014-10-01', '2014-12-31'),
(21, '2015-01-01', '2015-03-31'),
(22, '2015-04-01', '2015-06-30'),
(23, '2015-07-01', '2015-09-30'),
(24, '2015-10-01', '2015-12-31'),
(25, '2016-01-01', '2016-03-31'),
(26, '2016-04-01', '2016-06-30'),
(27, '2016-07-01', '2016-09-30'),
(28, '2016-10-01', '2016-12-31'),
(29, '2017-01-01', '2017-03-31'),
(30, '2017-04-01', '2017-06-30'),
(31, '2017-07-01', '2017-09-30'),
(32, '2017-10-01', '2017-12-31'),
(33, '2018-01-01', '2018-03-31'),
(34, '2018-04-01', '2018-06-30'),
(35, '2018-07-01', '2018-09-30'),
(36, '2018-10-01', '2018-12-31'),
(37, '2019-01-01', '2019-03-31'),
(38, '2019-04-01', '2019-06-30'),
(39, '2019-07-01', '2019-09-30'),
(40, '2019-10-01', '2019-12-31'),
(41, '2020-01-01', '2020-03-31'),
(42, '2020-04-01', '2020-06-30'),
(43, '2020-07-01', '2020-09-30'),
(44, '2020-10-01', '2020-12-31'),
(45, '2021-01-01', '2021-03-31'),
(46, '2021-04-01', '2021-06-30'),
(47, '2021-07-01', '2021-09-30'),
(48, '2021-10-01', '2021-12-31'),
(49, '2022-01-01', '2022-03-31'),
(50, '2022-04-01', '2022-06-30'),
(51, '2022-07-01', '2022-09-30'),
(52, '2022-10-01', '2022-12-31'),
(53, '2023-01-01', '2023-03-31'),
(54, '2023-04-01', '2023-06-30'),
(55, '2023-07-01', '2023-09-30'),
(56, '2023-10-01', '2023-12-31'),
(57, '2024-01-01', '2024-03-31'),
(58, '2024-04-01', '2024-06-30'),
(59, '2024-07-01', '2024-09-30'),
(60, '2024-10-01', '2024-12-31'),
(61, '2025-01-01', '2025-03-31'),
(62, '2025-04-01', '2025-06-30'),
(63, '2025-07-01', '2025-09-30'),
(64, '2025-10-01', '2025-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE `stage` (
  `numstage` int NOT NULL,
  `lieu_stage` text NOT NULL,
  `date_debut` text NOT NULL,
  `date_fin` text NOT NULL,
  `numel` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`numstage`, `lieu_stage`, `date_debut`, `date_fin`, `numel`) VALUES
(1, 'dell', '04/03/2010', '11/03/2010', 3),
(2, 'COREMI', '01/07/2009', '01/08/2009', 5),
(3, 'OCP', '01/07/2009', '01/08/2009', 4),
(8, 'Microsoft', '01/07/2010', '01/08/2010', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulletin`
--
ALTER TABLE `bulletin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`codecl`);

--
-- Indexes for table `conseil`
--
ALTER TABLE `conseil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devoir`
--
ALTER TABLE `devoir`
  ADD PRIMARY KEY (`numdev`);

--
-- Indexes for table `diplome`
--
ALTER TABLE `diplome`
  ADD PRIMARY KEY (`numdip`);

--
-- Indexes for table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`numel`),
  ADD KEY `codecl2` (`codecl`);

--
-- Indexes for table `eleve_diplome`
--
ALTER TABLE `eleve_diplome`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enseignement`
--
ALTER TABLE `enseignement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`numeval`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`codemat`);

--
-- Indexes for table `prof`
--
ALTER TABLE `prof`
  ADD PRIMARY KEY (`numprof`);

--
-- Indexes for table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`numsem`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`numstage`),
  ADD KEY `numel1` (`numel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulletin`
--
ALTER TABLE `bulletin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `codecl` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `conseil`
--
ALTER TABLE `conseil`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `devoir`
--
ALTER TABLE `devoir`
  MODIFY `numdev` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `diplome`
--
ALTER TABLE `diplome`
  MODIFY `numdip` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `eleve`
--
ALTER TABLE `eleve`
  MODIFY `numel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=675;

--
-- AUTO_INCREMENT for table `eleve_diplome`
--
ALTER TABLE `eleve_diplome`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `enseignement`
--
ALTER TABLE `enseignement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `numeval` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `codemat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `prof`
--
ALTER TABLE `prof`
  MODIFY `numprof` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `semestre`
--
ALTER TABLE `semestre`
  MODIFY `numsem` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
  MODIFY `numstage` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
