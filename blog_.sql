-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2016 at 12:29 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogger_info`
--

CREATE TABLE `blogger_info` (
  `blogger_id` int(11) NOT NULL,
  `blogger_username` varchar(255) DEFAULT NULL,
  `blogger_password` varchar(255) DEFAULT NULL,
  `blogger_creation_date` date DEFAULT NULL,
  `blogger_is_active` tinyint(1) DEFAULT NULL,
  `blogger_updated_date` date DEFAULT NULL,
  `blogger_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogger_info`
--

INSERT INTO `blogger_info` (`blogger_id`, `blogger_username`, `blogger_password`, `blogger_creation_date`, `blogger_is_active`, `blogger_updated_date`, `blogger_end_date`) VALUES
(1, 'KAUTILYA', 'gsa', '2016-08-05', 0, '2016-08-05', '2021-08-05'),
(2, 'KANAK', 'jh', '2016-08-06', 0, '2016-08-06', '2021-08-06'),
(3, 'kauti', 'kk', '2016-09-09', 1, '2016-09-09', '2021-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `blog_detail`
--

CREATE TABLE `blog_detail` (
  `blog_detail_id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `blog_detail_image` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_detail`
--

INSERT INTO `blog_detail` (`blog_detail_id`, `blog_id`, `blog_detail_image`) VALUES
(6, 31, 'images/Aldrin_Apollo_11.jpg'),
(9, 2, 'images/ftball.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog_master`
--

CREATE TABLE `blog_master` (
  `blog_id` int(11) NOT NULL,
  `blogger_id` int(11) DEFAULT NULL,
  `blog_title` varchar(255) DEFAULT NULL,
  `blog_desc` varchar(10000) DEFAULT NULL,
  `blog_category` varchar(255) DEFAULT NULL,
  `blog_author` varchar(255) DEFAULT NULL,
  `blog_is_active` tinyint(1) DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  `updated_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_master`
--

INSERT INTO `blog_master` (`blog_id`, `blogger_id`, `blog_title`, `blog_desc`, `blog_category`, `blog_author`, `blog_is_active`, `creation_date`, `updated_date`) VALUES
(2, 2, 'Football', 'Football is a family of team sports that involve, to varying degrees, kicking a ball with the foot to score a goal. Unqualified, the word football is understood to refer to whichever form of football is the most popular in the regional context in which the word appears. Sports commonly called &#039;football&#039; in certain places include: association football (known as soccer in some countries); gridiron football (specifically American football or Canadian football); Australian rules football; rugby football (either rugby league or rugby union); and Gaelic football.[1][2] These different variations of football are known as football codes.', 'sports', 'KANAK', 0, '2016-08-07', '2016-08-21'),
(30, 1, 'india', 'India, officially the Republic of India (IAST: BhÄrat Gaá¹‡arÄjya),[21][22][c] is a country in South Asia. It is the seventh-largest country by area, the second-most populous country (with over 1.2 billion people), and the most populous democracy in the world. Bounded by the Indian Ocean on the south, the Arabian Sea on the south-west, and the Bay of Bengal on the south-east, it shares land borders with Pakistan to the west;[d] China, Nepal, and Bhutan to the north-east; and Myanmar (Burma) and Bangladesh to the east. In the Indian Ocean, India is in the vicinity of Sri Lanka and the Maldives; in addition, India&#039;s Andaman and Nicobar Islands share a maritime border with Thailand and Indonesia.', 'country', 'KAUTILYA', 0, '2016-08-13', '2016-08-15'),
(31, 1, 'Man&#039;s greatest exploration of the universe', 'Human spaceflight (also referred to as manned spaceflight) is space travel with a crew or passengers aboard the spacecraft. Spacecraft carrying people may be operated directly, by human crew, or it may be either remotely operated from ground stations on Earth or be autonomous, able to carry out a specific mission with no human involvement.\r\n\r\nThe first human spaceflight was launched by the Soviet Union on 12 April 1961 as a part of the Vostok program, with cosmonaut Yuri Gagarin aboard. Humans have been continually present in space for 15 years and 291 days on the International Space Station. All early human spaceflight was crewed, where at least some of the passengers acted to carry out tasks of piloting or operating the spacecraft. After 2015, several human-capable spacecraft are being explicitly designed with the ability to operate autonomously.\r\n\r\nSince the retirement of the US Space Shuttle in 2011, only Russia and China have maintained human spaceflight capability with the Soyuz program and Shenzhou program. Currently, all expeditions to the International Space Station use Soyuz vehicles, which remain attached to the station to allow quick return if needed. The United States is developing commercial crew transportation to facilitate domestic access to ISS and low Earth orbit, as well as the Orion vehicle for beyond-low Earth orbit applications.', 'Astrophysics', 'KAUTILYA', 0, '2016-08-20', '2016-08-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogger_info`
--
ALTER TABLE `blogger_info`
  ADD PRIMARY KEY (`blogger_id`);

--
-- Indexes for table `blog_detail`
--
ALTER TABLE `blog_detail`
  ADD PRIMARY KEY (`blog_detail_id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `blog_master`
--
ALTER TABLE `blog_master`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `blogger_id` (`blogger_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogger_info`
--
ALTER TABLE `blogger_info`
  MODIFY `blogger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `blog_detail`
--
ALTER TABLE `blog_detail`
  MODIFY `blog_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `blog_master`
--
ALTER TABLE `blog_master`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_detail`
--
ALTER TABLE `blog_detail`
  ADD CONSTRAINT `blog_detail_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog_master` (`blog_id`);

--
-- Constraints for table `blog_master`
--
ALTER TABLE `blog_master`
  ADD CONSTRAINT `blog_master_ibfk_1` FOREIGN KEY (`blogger_id`) REFERENCES `blogger_info` (`blogger_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
