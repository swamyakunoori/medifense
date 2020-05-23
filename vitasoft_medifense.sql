-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2020 at 06:31 PM
-- Server version: 10.3.23-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vitasoft_medifense`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `cId` int(11) NOT NULL,
  `hId` int(11) NOT NULL,
  `cUsername` varchar(20) NOT NULL,
  `cPassword` varchar(20) NOT NULL,
  `cName` varchar(50) NOT NULL,
  `cAddress` varchar(100) NOT NULL,
  `cNoEmp` int(11) NOT NULL,
  `cMobile` varchar(15) NOT NULL,
  `cStatus` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `modifiedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`cId`, `hId`, `cUsername`, `cPassword`, `cName`, `cAddress`, `cNoEmp`, `cMobile`, `cStatus`, `createdAt`, `modifiedAt`) VALUES
(2, 8, 'MEDIC1', '8974563211', 'VITA', 'KNR', 5, '8974563211', 1, '2020-05-15 18:10:14', '2020-05-16 09:52:38'),
(3, 9, 'MEDIC2', '8976541235', 'Coign', 'Tarnaka', 20, '8976541235', 1, '2020-05-16 09:40:32', '2020-05-22 07:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `dailyquetions`
--

CREATE TABLE `dailyquetions` (
  `qId` int(11) NOT NULL,
  `qName` varchar(200) NOT NULL,
  `qAnswer` varchar(100) NOT NULL,
  `qStatus` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modifiedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyquetions`
--

INSERT INTO `dailyquetions` (`qId`, `qName`, `qAnswer`, `qStatus`, `createdAt`, `modifiedAt`) VALUES
(1, 'How Are you feeling today', 'Healthy@Not Well', 1, '2020-05-18 05:32:43', '2020-05-18 05:32:43'),
(2, 'How you been Eposed to Someone with confirmed covid-19 infection', 'Yes@No', 1, '2020-05-18 05:32:56', '2020-05-18 05:32:56'),
(3, 'Do you hav any Health conditions apply to you', 'Fever@Soar Throat@Mild Cough@Runny Nose@Mild Fatigue@No symptoms', 1, '2020-05-18 05:33:50', '2020-05-18 05:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `dailyreport`
--

CREATE TABLE `dailyreport` (
  `rId` int(11) NOT NULL,
  `eId` int(11) NOT NULL,
  `qId` int(11) NOT NULL,
  `qAnswer` varchar(200) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modifiedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyreport`
--

INSERT INTO `dailyreport` (`rId`, `eId`, `qId`, `qAnswer`, `createdAt`, `modifiedAt`) VALUES
(26, 3, 3, 'Yes', '2020-05-22 07:01:51', '2020-05-22 07:01:51'),
(27, 3, 2, 'No', '2020-05-22 07:01:51', '2020-05-22 07:01:51'),
(28, 4, 1, 'Healthy', '2020-05-22 07:53:10', '2020-05-22 07:53:10'),
(29, 4, 2, 'No', '2020-05-22 07:53:10', '2020-05-22 07:53:10'),
(30, 4, 3, 'Fever@Mild Cough@Runny Nose', '2020-05-22 07:53:10', '2020-05-22 07:53:10'),
(31, 4, 1, 'Healthy', '2020-05-23 07:48:55', '2020-05-23 07:48:55'),
(32, 4, 2, 'Yes', '2020-05-23 07:48:55', '2020-05-23 07:48:55'),
(33, 4, 3, 'Soar Throat@Mild Cough', '2020-05-23 07:48:55', '2020-05-23 07:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `empfamily`
--

CREATE TABLE `empfamily` (
  `efId` int(11) NOT NULL,
  `eId` int(11) NOT NULL,
  `efName` varchar(100) NOT NULL,
  `efRelation` varchar(50) NOT NULL,
  `efAge` int(11) NOT NULL,
  `efGender` varchar(20) NOT NULL,
  `efCoronaStatus` varchar(50) NOT NULL,
  `efDisease` varchar(50) NOT NULL,
  `efMedicines` varchar(50) NOT NULL,
  `efHealthCondition` varchar(20) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `modifiedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empfamily`
--

INSERT INTO `empfamily` (`efId`, `eId`, `efName`, `efRelation`, `efAge`, `efGender`, `efCoronaStatus`, `efDisease`, `efMedicines`, `efHealthCondition`, `createdAt`, `modifiedAt`) VALUES
(1, 3, 'joy', 'Relation', 5, 'Male', '-Ve', 'Yes', 'Yes', 'Good', '0000-00-00 00:00:00', '2020-05-20 06:51:45'),
(5, 7, '', '', 0, '', '-ve', 'Other', '', 'No', '2020-05-23 08:55:59', '2020-05-23 08:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `empinfo`
--

CREATE TABLE `empinfo` (
  `eiId` int(11) NOT NULL,
  `eId` int(11) NOT NULL,
  `eImage` varchar(100) NOT NULL,
  `eAddress` varchar(100) NOT NULL,
  `eAge` int(11) NOT NULL,
  `eGender` varchar(10) NOT NULL,
  `eCoronaZone` varchar(50) NOT NULL,
  `eCoronaStatus` varchar(50) NOT NULL,
  `eDisease` varchar(100) NOT NULL,
  `eMedicines` varchar(10) NOT NULL,
  `eHealthCondition` varchar(50) NOT NULL,
  `eTravel` varchar(10) NOT NULL,
  `travelMode` varchar(20) NOT NULL,
  `eSmoking` varchar(10) NOT NULL,
  `eDrinking` varchar(10) NOT NULL,
  `ePregnant` varchar(10) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modifiedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empinfo`
--

INSERT INTO `empinfo` (`eiId`, `eId`, `eImage`, `eAddress`, `eAge`, `eGender`, `eCoronaZone`, `eCoronaStatus`, `eDisease`, `eMedicines`, `eHealthCondition`, `eTravel`, `travelMode`, `eSmoking`, `eDrinking`, `ePregnant`, `createdAt`, `modifiedAt`) VALUES
(25, 3, '21052020_3.jpg', 'Karimnagar', 25, 'Male', 'Karimnagar', '-Ve', 'Yes', 'Yes', 'Good', 'Yes', 'Own', 'No', 'No', 'No', '2020-05-21 16:23:58', '2020-05-21 16:23:58'),
(26, 4, '22052020_4.jpg', 'karimnagar ', 31, 'Female', 'karimnagar', '-ve', 'Diabetes,Heart disease', 'Yes', 'No', 'Yes', 'Self', 'No', 'No', 'No', '2020-05-22 04:28:52', '2020-05-22 04:28:52'),
(27, 7, '23052020_7.jpg', 'karimnagar  505001', 30, 'male', 'karimnagar', '-ve', 'Other', '', 'No', 'No', '', 'No', 'No', '', '2020-05-23 08:55:40', '2020-05-23 08:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `eId` int(11) NOT NULL,
  `cId` int(11) NOT NULL,
  `empId` varchar(10) NOT NULL,
  `eName` varchar(50) NOT NULL,
  `eMobile` varchar(15) NOT NULL,
  `eDesignation` varchar(50) NOT NULL,
  `eStatus` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `modifiedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`eId`, `cId`, `empId`, `eName`, `eMobile`, `eDesignation`, `eStatus`, `createdAt`, `modifiedAt`) VALUES
(3, 2, 'vita123', 'swamy akunoori', '9490043228', 'engineer', 1, '2020-05-15 19:54:18', '2020-05-21 16:23:58'),
(4, 3, 'Coign123', 'Akhila', '9491473055', 'Developer', 1, '2020-05-19 06:17:39', '2020-05-22 04:28:52'),
(7, 2, 'VITA1234', 'Vijay Kumar', '9963879607', 'Engineer', 1, '2020-05-23 05:04:01', '2020-05-23 08:55:40'),
(8, 3, 'COIGN567', 'Vijay Kumar Jakkula', '9030662999', 'Engineer', 0, '2020-05-23 08:06:06', '2020-05-23 08:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `empstatus`
--

CREATE TABLE `empstatus` (
  `esId` int(11) NOT NULL,
  `rId` int(11) NOT NULL,
  `eId` int(11) NOT NULL,
  `cId` int(11) NOT NULL,
  `hId` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `prescription` varchar(500) NOT NULL,
  `uptoTablet` datetime NOT NULL,
  `createdAt` datetime NOT NULL,
  `modifiedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empstatus`
--

INSERT INTO `empstatus` (`esId`, `rId`, `eId`, `cId`, `hId`, `description`, `prescription`, `uptoTablet`, `createdAt`, `modifiedAt`) VALUES
(1, 26, 3, 2, 8, 'take rest', 'paracetamal@saradon', '2020-05-29 10:37:09', '2020-05-22 10:37:09', '2020-05-22 13:59:09'),
(2, 27, 3, 2, 8, 'health good', 'cough tablet', '2020-05-21 10:37:09', '2020-05-21 10:37:09', '2020-05-22 13:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `hId` int(11) NOT NULL,
  `hUsername` varchar(20) NOT NULL,
  `hPassword` varchar(20) NOT NULL,
  `hName` varchar(50) NOT NULL,
  `hAddress` varchar(100) NOT NULL,
  `hMobile` varchar(15) NOT NULL,
  `hStatus` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `modifiedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hId`, `hUsername`, `hPassword`, `hName`, `hAddress`, `hMobile`, `hStatus`, `createdAt`, `modifiedAt`) VALUES
(7, 'MEDIH1', '9874563215', 'Gandhi', 'HYD', '9874563211', 1, '2020-05-15 17:53:13', '2020-05-19 09:36:53'),
(8, 'MEDIH2', '9876543212', 'Sunrise', 'KNR', '9876543212', 1, '2020-05-15 17:55:37', '2020-05-19 09:36:58'),
(9, 'MEDIH3', '9876543213', 'KIMS', 'SEC', '9876543213', 1, '2020-05-15 17:56:28', '2020-05-19 09:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `super`
--

CREATE TABLE `super` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `sId` int(11) NOT NULL,
  `symptom` varchar(100) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`sId`, `symptom`, `createdAt`) VALUES
(2, 'Fever', '2020-05-22 07:06:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`cId`);

--
-- Indexes for table `dailyquetions`
--
ALTER TABLE `dailyquetions`
  ADD PRIMARY KEY (`qId`);

--
-- Indexes for table `dailyreport`
--
ALTER TABLE `dailyreport`
  ADD PRIMARY KEY (`rId`);

--
-- Indexes for table `empfamily`
--
ALTER TABLE `empfamily`
  ADD PRIMARY KEY (`efId`);

--
-- Indexes for table `empinfo`
--
ALTER TABLE `empinfo`
  ADD PRIMARY KEY (`eiId`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`eId`);

--
-- Indexes for table `empstatus`
--
ALTER TABLE `empstatus`
  ADD PRIMARY KEY (`esId`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`hId`);

--
-- Indexes for table `super`
--
ALTER TABLE `super`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`sId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `cId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dailyquetions`
--
ALTER TABLE `dailyquetions`
  MODIFY `qId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dailyreport`
--
ALTER TABLE `dailyreport`
  MODIFY `rId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `empfamily`
--
ALTER TABLE `empfamily`
  MODIFY `efId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `empinfo`
--
ALTER TABLE `empinfo`
  MODIFY `eiId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `eId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `empstatus`
--
ALTER TABLE `empstatus`
  MODIFY `esId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `hId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `super`
--
ALTER TABLE `super`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `sId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
