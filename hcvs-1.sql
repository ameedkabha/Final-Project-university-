-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 15, 2021 at 02:56 PM
-- Server version: 5.7.17-log
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hcvs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `password` int(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'jenin'),
(2, 'tulkarm'),
(3, 'tubas'),
(4, 'qalqilya'),
(5, 'nablus'),
(6, 'salfit'),
(7, 'jericho'),
(8, 'ramallah'),
(9, 'jerusalem'),
(10, 'bethlehem'),
(11, 'hebron');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `hospitalId` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hospitalId` (`hospitalId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `hospitalId`) VALUES
(1, 'heart', 2);

-- --------------------------------------------------------

--
-- Table structure for table `health_question`
--

DROP TABLE IF EXISTS `health_question`;
CREATE TABLE IF NOT EXISTS `health_question` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `question` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `health_question`
--

INSERT INTO `health_question` (`id`, `question`) VALUES
(1, 'Do you have flu?'),
(2, 'Do you have lung infection?'),
(3, 'Have you been in contact with someone infected with Corona virus?'),
(4, 'Are you older than 65 years old?'),
(5, 'Are you younger than 12 years old?');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

DROP TABLE IF EXISTS `hospital`;
CREATE TABLE IF NOT EXISTS `hospital` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `visitation_start_time` time(4) NOT NULL,
  `visitation_break_start` time(4) NOT NULL,
  `visitation_break_end` time NOT NULL,
  `visitation_end_time` time NOT NULL,
  `cityId` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cityId` (`cityId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `visitation_start_time`, `visitation_break_start`, `visitation_break_end`, `visitation_end_time`, `cityId`) VALUES
(2, 'Palestine Medical Complex', '12:00:00.0000', '15:00:00.0000', '19:30:00', '21:00:00', 8),
(3, 'rafidia', '12:00:00.0000', '16:00:00.0000', '17:00:00', '19:00:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `moh`
--

DROP TABLE IF EXISTS `moh`;
CREATE TABLE IF NOT EXISTS `moh` (
  `ssn` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`ssn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moh`
--

INSERT INTO `moh` (`ssn`, `name`) VALUES
(201611823, 'ameed kabha');

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

DROP TABLE IF EXISTS `parking`;
CREATE TABLE IF NOT EXISTS `parking` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `parking_number` int(5) NOT NULL,
  `parking_row` int(5) NOT NULL,
  `parking_column` int(5) NOT NULL,
  `is_reserved` int(1) NOT NULL,
  `hospitalId` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hospitalId` (`hospitalId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`id`, `parking_number`, `parking_row`, `parking_column`, `is_reserved`, `hospitalId`) VALUES
(2, 1, 1, 1, 0, 2),
(4, 3, 6, 2, 0, 2),
(5, 1, 1, 6, 0, 2),
(6, 1, 5, 9, 0, 2),
(7, 1, 3, 9, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `ssn` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `is_allowed` int(1) NOT NULL,
  `roomId` int(5) NOT NULL,
  PRIMARY KEY (`ssn`),
  KEY `roomId` (`roomId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`ssn`, `name`, `phone_number`, `is_allowed`, `roomId`) VALUES
(404396418, 'bara salameh', '0569663335', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `room_number` int(5) NOT NULL,
  `room_capacity` int(5) NOT NULL,
  `departmentId` int(5) NOT NULL,
  PRIMARY KEY (`room_number`),
  KEY `departmentId` (`departmentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_number`, `room_capacity`, `departmentId`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

DROP TABLE IF EXISTS `visitor`;
CREATE TABLE IF NOT EXISTS `visitor` (
  `ssn` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`ssn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`ssn`, `name`, `email`) VALUES
(853678043, 'mohammad salameh', 'mesalameh92@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_patient`
--

DROP TABLE IF EXISTS `visitor_patient`;
CREATE TABLE IF NOT EXISTS `visitor_patient` (
  `visitor_ssn` int(10) NOT NULL,
  `patient_ssn` int(10) NOT NULL,
  `date_to_visit` date NOT NULL,
  `visit_start` time(4) NOT NULL,
  `visit_end` time(4) NOT NULL,
  `departmentId` int(5) NOT NULL,
  `hospitalId` int(5) NOT NULL,
  PRIMARY KEY (`visitor_ssn`,`patient_ssn`),
  KEY `patient_ssn` (`patient_ssn`),
  KEY `departmentId` (`departmentId`),
  KEY `hospitalId` (`hospitalId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visitor_patient`
--

INSERT INTO `visitor_patient` (`visitor_ssn`, `patient_ssn`, `date_to_visit`, `visit_start`, `visit_end`, `departmentId`, `hospitalId`) VALUES
(853678043, 404396418, '2021-02-15', '12:00:00.0000', '12:30:00.0000', 1, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`hospitalId`) REFERENCES `hospital` (`id`);

--
-- Constraints for table `hospital`
--
ALTER TABLE `hospital`
  ADD CONSTRAINT `hospital_ibfk_1` FOREIGN KEY (`cityId`) REFERENCES `city` (`id`);

--
-- Constraints for table `parking`
--
ALTER TABLE `parking`
  ADD CONSTRAINT `parking_ibfk_1` FOREIGN KEY (`hospitalId`) REFERENCES `hospital` (`id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`roomId`) REFERENCES `room` (`room_number`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`departmentId`) REFERENCES `department` (`id`);

--
-- Constraints for table `visitor_patient`
--
ALTER TABLE `visitor_patient`
  ADD CONSTRAINT `visitor_patient_ibfk_1` FOREIGN KEY (`patient_ssn`) REFERENCES `patient` (`ssn`),
  ADD CONSTRAINT `visitor_patient_ibfk_2` FOREIGN KEY (`visitor_ssn`) REFERENCES `visitor` (`ssn`),
  ADD CONSTRAINT `visitor_patient_ibfk_3` FOREIGN KEY (`departmentId`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `visitor_patient_ibfk_4` FOREIGN KEY (`hospitalId`) REFERENCES `hospital` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
