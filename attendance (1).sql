-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2017 at 04:42 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `addinstructor`
--

CREATE TABLE `addinstructor` (
  `Iname` varchar(40) NOT NULL,
  `Iemail` varchar(40) NOT NULL,
  `Imobile` varchar(10) NOT NULL,
  `Idate` date NOT NULL,
  `Igender` varchar(40) NOT NULL,
  `Iid` varchar(40) NOT NULL,
  `Ipassword` varchar(40) NOT NULL,
  `Icourse` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addinstructor`
--

INSERT INTO `addinstructor` (`Iname`, `Iemail`, `Imobile`, `Idate`, `Igender`, `Iid`, `Ipassword`, `Icourse`) VALUES
('rashi sahu', 'rashi.sahu13@gmail.com', '1234567891', '2017-03-14', 'Female', 'rashi', 'q', 'CS111'),
('rashi sahu', 'rashi.sahu13@gmail.com', '1234567891', '2017-03-14', 'Female', 'rashi', 'q', 'CS222'),
('rashmi', 'rashmi@gmail.com', '1234567890', '2017-03-07', 'Male', 'rashmi', 'q', 'CS333');

-- --------------------------------------------------------

--
-- Table structure for table `addstudent`
--

CREATE TABLE `addstudent` (
  `Sname` varchar(40) NOT NULL,
  `Semail` varchar(40) NOT NULL,
  `Smobile` varchar(10) NOT NULL,
  `Sroll_no` varchar(40) NOT NULL,
  `Sguard_name` varchar(40) NOT NULL,
  `Sguard_email` varchar(40) NOT NULL,
  `Sguard_mobile` varchar(10) NOT NULL,
  `Spassword` varchar(40) NOT NULL,
  `Sdate` date NOT NULL,
  `Ssemester` int(40) NOT NULL,
  `Sgender` varchar(40) NOT NULL,
  `Scourses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addstudent`
--

INSERT INTO `addstudent` (`Sname`, `Semail`, `Smobile`, `Sroll_no`, `Sguard_name`, `Sguard_email`, `Sguard_mobile`, `Spassword`, `Sdate`, `Ssemester`, `Sgender`, `Scourses`) VALUES
('abhishek', 'abhishek@gmail.com', '0000000000', 'B15CS001', '', '', '', 'q', '2017-03-16', 3, 'Male', 'CS111'),
('abhishek', 'abhishek@gmail.com', '0000000000', 'B15CS001', '', '', '', 'q', '2017-03-16', 3, 'Male', 'CS222'),
('abhishek', 'abhishek@gmail.com', '0000000000', 'B15CS001', '', '', '', 'q', '2017-03-16', 3, 'Male', 'CS333');

-- --------------------------------------------------------

--
-- Table structure for table `add_admin`
--

CREATE TABLE `add_admin` (
  `aname` varchar(40) NOT NULL,
  `aemail` varchar(40) NOT NULL,
  `amobile` varchar(10) NOT NULL,
  `apassword` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_admin`
--

INSERT INTO `add_admin` (`aname`, `aemail`, `amobile`, `apassword`) VALUES
('rashi', 'rashi@gmail.com', '1234567891', 'q');

-- --------------------------------------------------------

--
-- Table structure for table `add_course`
--

CREATE TABLE `add_course` (
  `Cid` varchar(40) NOT NULL,
  `Ccourse_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_course`
--

INSERT INTO `add_course` (`Cid`, `Ccourse_name`) VALUES
('CS111', 'COA'),
('CS222', 'TOC'),
('CS333', 'Software Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `cs111`
--

CREATE TABLE `cs111` (
  `xdate` varchar(40) DEFAULT NULL,
  `B15CS001` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs111`
--

INSERT INTO `cs111` (`xdate`, `B15CS001`) VALUES
('26-03-2017', '1'),
('26-03-2017', '0'),
('26-03-2017', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cs222`
--

CREATE TABLE `cs222` (
  `xdate` varchar(40) DEFAULT NULL,
  `B15CS001` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cs333`
--

CREATE TABLE `cs333` (
  `xdate` varchar(40) DEFAULT NULL,
  `B15CS001` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
