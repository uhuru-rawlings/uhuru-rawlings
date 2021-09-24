-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 02:07 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prison_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `noticedate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `content` varchar(1000) NOT NULL,
  `postedby` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `noticedate`, `content`, `postedby`) VALUES
(1, '2021-09-23 05:18:53', 'this is a test notice made on 9/23/2021.', ''),
(2, '2021-09-23 05:19:59', 'this is another test notice posted to confirm if this system is workings', ''),
(3, '2021-09-23 05:56:11', 'test2 notice', 'carenK');

-- --------------------------------------------------------

--
-- Table structure for table `prisonners`
--

CREATE TABLE `prisonners` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `sname` text NOT NULL,
  `fullname` text NOT NULL,
  `contact` int(11) NOT NULL,
  `gender` text NOT NULL,
  `dob` datetime NOT NULL,
  `descriptions` text NOT NULL,
  `datereported` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `images` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prisonners`
--

INSERT INTO `prisonners` (`id`, `fname`, `sname`, `fullname`, `contact`, `gender`, `dob`, `descriptions`, `datereported`, `images`) VALUES
(1, 'test', 'test', 'test test', 791074553, 'Male', '1994-01-22 00:00:00', 'stollen a car', '2021-09-22 19:51:51', ''),
(2, 'test2', 'testtest2', 'test2 testtses2', 111111111, 'Female', '1992-03-22 00:00:00', 'killed a neighbour', '2021-09-22 19:51:51', ''),
(3, '.sjsaADK', 'test', 'test names', 2147483647, 'Male', '1995-07-06 00:00:00', 'raped a student', '2021-09-22 19:51:51', ''),
(4, 'test', 'test', 'test test test', 10006546, 'Male', '2000-03-22 00:00:00', 'stollen chicken', '2021-09-22 19:51:51', ''),
(5, 'name1', 'name2', 'name1 name2', 711111111, 'Male', '1994-12-12 00:00:00', 'robbery with viollence', '2021-09-23 11:06:44', 'primg1543109.png');

-- --------------------------------------------------------

--
-- Table structure for table `released`
--

CREATE TABLE `released` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `releasedate` datetime NOT NULL,
  `casedescription` varchar(260) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `released`
--

INSERT INTO `released` (`id`, `fullname`, `releasedate`, `casedescription`) VALUES
(1, 'test test test', '2021-09-23 00:00:00', 'stollen chicken');

-- --------------------------------------------------------

--
-- Table structure for table `userreg`
--

CREATE TABLE `userreg` (
  `id` int(11) NOT NULL,
  `Fname` text NOT NULL,
  `Lname` text NOT NULL,
  `username` text NOT NULL,
  `userid` varchar(50) NOT NULL,
  `pass_word` varchar(266) NOT NULL,
  `usertype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userreg`
--

INSERT INTO `userreg` (`id`, `Fname`, `Lname`, `username`, `userid`, `pass_word`, `usertype`) VALUES
(1, 'john', 'Doe', 'john doe', 'KP_80761', '$2y$10$UnGydTlW1Xpn1CDwE3hYSOYjsKrJLyL3ouT8i2O6lb0leY3zcG7py', 'Wadden'),
(2, 'rawlings', 'uhuru', 'uhururawlings', 'KP_97250', '$2y$10$ANJ5fFe/6tRIDrz0AI1CguKMnm2/DgW4towB6LixVkghx5vS4g1nu', 'It_Support'),
(3, 'caren', 'caren', 'carenK', 'KP_3733', '$2y$10$9H1xgNL5Ugxmku8H5NaJQeLUew5Q6CupzqhH2eSef1vmfRqMNPBaS', 'It_Support');

-- --------------------------------------------------------

--
-- Table structure for table `waddens`
--

CREATE TABLE `waddens` (
  `Fname` text NOT NULL,
  `Sname` text NOT NULL,
  `fullname` text NOT NULL,
  `Contact` int(11) NOT NULL,
  `Usermail` varchar(200) NOT NULL,
  `County` text NOT NULL,
  `badgeno` varchar(100) NOT NULL,
  `previousstation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waddens`
--

INSERT INTO `waddens` (`Fname`, `Sname`, `fullname`, `Contact`, `Usermail`, `County`, `badgeno`, `previousstation`) VALUES
('test', 'test', 'test test test', 700000000, 'test@gmail.com', 'kisumu', 'bg-00023', 'Kiambu'),
('test', 'test', 'test test test', 711111111, 'test@gmail.com', 'kisumu', 'bg-00023', 'Kiambu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prisonners`
--
ALTER TABLE `prisonners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `released`
--
ALTER TABLE `released`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userreg`
--
ALTER TABLE `userreg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prisonners`
--
ALTER TABLE `prisonners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `released`
--
ALTER TABLE `released`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userreg`
--
ALTER TABLE `userreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
