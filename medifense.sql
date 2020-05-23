-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 11:27 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medifense`
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
  `modifiedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`cId`, `hId`, `cUsername`, `cPassword`, `cName`, `cAddress`, `cNoEmp`, `cMobile`, `cStatus`, `createdAt`, `modifiedAt`) VALUES
(2, 8, 'MEDIC1', '8974563211', 'VITA', 'Karimnagar', 5, '8974563211', 1, '2020-05-15 18:10:14', '2020-05-18 16:38:40'),
(3, 8, 'MEDIC2', '8976541235', 'Coign', 'Tarnaka', 20, '8976541235', 0, '2020-05-16 09:40:32', '2020-05-19 05:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `dailyquetions`
--

CREATE TABLE `dailyquetions` (
  `qId` int(11) NOT NULL,
  `qName` varchar(200) NOT NULL,
  `qAnswer` varchar(100) NOT NULL,
  `qStatus` int(11) NOT NULL DEFAULT '0',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modifiedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyquetions`
--

INSERT INTO `dailyquetions` (`qId`, `qName`, `qAnswer`, `qStatus`, `createdAt`, `modifiedAt`) VALUES
(1, 'How Are you feeling today', 'Healthy@Not Well', 1, '2020-05-19 09:25:12', '2020-05-19 09:25:12'),
(2, 'How you been Eposed to Someone with confirmed covid-19 infection', 'Yes@No', 1, '2020-05-19 09:25:29', '2020-05-19 09:25:29'),
(3, 'Do you hav any Health conditions apply to you', 'Fever@Soar Throat@Mild Cough@Runny Nose@Mild Fatigue@No symptoms', 1, '2020-05-19 09:25:15', '2020-05-19 09:25:15'),
(4, 'Going to Work', 'Yes', 1, '2020-05-19 09:25:34', '2020-05-19 09:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `dailyreport`
--

CREATE TABLE `dailyreport` (
  `rId` int(11) NOT NULL,
  `eId` int(11) NOT NULL,
  `qId` int(11) NOT NULL,
  `qAnswer` varchar(200) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modifiedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyreport`
--

INSERT INTO `dailyreport` (`rId`, `eId`, `qId`, `qAnswer`, `createdAt`, `modifiedAt`) VALUES
(5, 3, 2, 'No', '2020-05-16 12:57:25', '2020-05-16 12:57:25'),
(6, 3, 2, 'No', '2020-05-15 12:58:10', '2020-05-16 14:06:08'),
(7, 3, 2, 'No', '2020-05-14 12:59:49', '2020-05-16 14:06:19'),
(8, 3, 5, 'No', '2020-05-16 13:25:31', '2020-05-16 13:25:31'),
(9, 3, 6, 'No', '2020-05-16 13:26:10', '2020-05-16 13:26:10'),
(10, 3, 7, 'No', '2020-05-16 13:27:56', '2020-05-16 13:27:56'),
(11, 3, 7, 'No', '2020-05-15 13:28:48', '2020-05-16 14:06:59'),
(12, 3, 7, 'No', '2020-05-14 13:30:53', '2020-05-16 14:07:07'),
(13, 3, 5, 'Yes', '2020-05-15 13:30:53', '2020-05-16 14:06:38');

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
  `createdAt` datetime NOT NULL,
  `modifiedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `empinfo`
--

CREATE TABLE `empinfo` (
  `eiId` int(11) NOT NULL,
  `eId` int(11) NOT NULL,
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
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modifiedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empinfo`
--

INSERT INTO `empinfo` (`eiId`, `eId`, `eAddress`, `eAge`, `eGender`, `eCoronaZone`, `eCoronaStatus`, `eDisease`, `eMedicines`, `eHealthCondition`, `eTravel`, `travelMode`, `eSmoking`, `eDrinking`, `ePregnant`, `createdAt`, `modifiedAt`) VALUES
(4, 3, 'Karimnagar', 25, 'Male', 'Karimnagar', '-Ve', 'Yes', 'Yes', 'Good', 'No', 'Own', 'No', 'No', 'No', '2020-05-19 09:00:51', '2020-05-19 09:00:51');

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
  `modifiedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`eId`, `cId`, `empId`, `eName`, `eMobile`, `eDesignation`, `eStatus`, `createdAt`, `modifiedAt`) VALUES
(3, 2, 'vita123', 'swamy', '9490043228', 'engineer', 1, '2020-05-15 19:54:18', '2020-05-19 09:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `empstatus`
--

CREATE TABLE `empstatus` (
  `esId` int(11) NOT NULL,
  `rId` int(11) NOT NULL,
  `hId` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `prescription` varchar(500) NOT NULL,
  `createdAt` datetime NOT NULL,
  `modifiedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `modifiedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hId`, `hUsername`, `hPassword`, `hName`, `hAddress`, `hMobile`, `hStatus`, `createdAt`, `modifiedAt`) VALUES
(7, 'MEDIH1', '9874563215', 'Gandhi', 'HYD', '9874563211', 2, '2020-05-15 17:53:13', '2020-05-15 17:42:45'),
(8, 'MEDIH2', '9876543212', 'Sunrise', 'KNR', '9876543212', 1, '2020-05-15 17:55:37', '2020-05-15 17:43:00'),
(9, 'MEDIH3', '9876543213', 'KIMS', 'SEC', '9876543213', 1, '2020-05-15 17:56:28', '2020-05-15 16:08:46');

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
  MODIFY `qId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dailyreport`
--
ALTER TABLE `dailyreport`
  MODIFY `rId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `empfamily`
--
ALTER TABLE `empfamily`
  MODIFY `efId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empinfo`
--
ALTER TABLE `empinfo`
  MODIFY `eiId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `eId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `empstatus`
--
ALTER TABLE `empstatus`
  MODIFY `esId` int(11) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
