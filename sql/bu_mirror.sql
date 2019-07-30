-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2019 at 04:58 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bu_mirror`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `com_author` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `group_id`, `comment`, `com_author`, `date`) VALUES
(12, 14, 12, 'dfsssssssssss', 'wqrt ', '2018-10-29 10:04:43'),
(18, 9, 12, 'good night', 'Sarwar', '2018-10-29 10:26:05'),
(24, 27, 12, 'fukkkic', 'Sarwar', '2018-12-05 14:39:30'),
(26, 34, 1, 'zfssssssssssss', 'wqrt ', '2018-12-11 08:59:51'),
(28, 33, 1, 'gbbbbbbbbbbbbbbbbhghddddddddddd', 'Sarwar', '2018-12-11 09:23:50'),
(29, 37, 1, 'gvbvbvbvbvbvbvbvbvbvb', 'Sarwar', '2018-12-11 09:31:34'),
(30, 37, 1, 'ffffffffffffffffffffffffffffffffffffg', 'lhkkk', '2018-12-11 09:31:45'),
(31, 36, 1, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'Sarwar5', '2018-12-11 09:50:13'),
(32, 36, 1, 'yhhhhhhhhhhhr', 'Sarwar', '2018-12-11 10:25:15'),
(34, 35, 1, 'nice\r\n', 'bucse4', '2018-12-11 10:28:55'),
(35, 34, 1, 'hkkkkkkkkknj jhhhhhhhhiiiiik jjjjjjjjjjjjjjjjjjjkl', 'Sarwar5', '2018-12-18 12:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_username` varchar(255) NOT NULL,
  `group_des` text NOT NULL,
  `group_pass` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `Batch` varchar(255) NOT NULL,
  `group_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `group_image` text NOT NULL,
  `ver_code` int(100) NOT NULL,
  `posts` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `group_username`, `group_des`, `group_pass`, `department`, `Batch`, `group_created`, `group_image`, `ver_code`, `posts`) VALUES
(1, 'bucse4', 'cse4', 'Hello BUians , Welcome to BU mirror. whatever!', '88888888', 'CSE', 'Fourth', '2018-12-10 20:41:18', 'admin-code_oop_php.jpg', 319698979, 'yes'),
(12, 'CSE100', 'bucse', 'Hello BUians, Welcome to BU mirror. good night.', '11223344', '', '', '2018-12-09 19:45:59', '5809055-imagens-hd.jpg', 1956271936, 'yes'),
(13, 'cse', 'cse', 'Hello BUians , Welcome to BU mirror.', '12345678', 'CSE', 'Eighth', '2018-10-29 10:47:03', 'Beautiful-Girls-Pictures-With-Nature4.jpg', 2075425605, 'yes'),
(14, 'cse5', 'cse5', 'Hello BUiansghfkkkkkkkkkkkkkkkkkkkkkkkkv n', '12345678', 'CSE', 'Fifth', '2019-01-20 15:31:13', 'TBimg.jpg', 849825936, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `file` text NOT NULL,
  `post_content` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `group_id`, `file`, `post_content`, `post_date`) VALUES
(2, 12, '0', '						\r\n	hjgjkhi				', '2018-10-22 21:19:19'),
(8, 12, '0', '						\r\n		ghfhjlo			', '2018-10-23 14:14:24'),
(9, 12, '0', 'Hello World , Good Night..					', '2018-10-23 14:28:38'),
(12, 12, '0', 'I am working on web project.', '2018-10-23 16:30:58'),
(13, 12, '0', '						\r\n					erbybybybybybybybybybybyby', '2018-10-23 16:31:03'),
(14, 12, '0', 'Hey whats up?						\r\n					', '2018-10-23 17:17:15'),
(16, 13, '0', '	hjjjjjjjjjjjjjjjjj					\r\n					', '2018-10-29 10:45:09'),
(17, 13, '', 'sfddddddddddddd						\r\n					', '2018-10-29 11:02:50'),
(18, 13, '', 'sfffffffffffff						\r\n					', '2018-10-29 11:02:57'),
(23, 12, '', 'ghhhhhhhhhhhhhhf						\r\n					', '2018-10-29 17:47:32'),
(24, 12, '', 'Hello World, whats up.?', '2018-10-29 17:48:06'),
(25, 12, '', 'hjgkj					\r\n					', '2018-12-05 14:14:19'),
(26, 12, '', '		jkgggggggggggggggggggggggggggggggggggggggggggggggggggggggggfgknsamc,nsalkchasm cmnclsakjcas\r\nsackancmxncljkhsacnmxncjksihdiwaoeuylwiukfhruiwersjcnksdmxnvlkzjf9ewiqhjscnkmnc\r\nscjkbggggsduywuicsjnmxczuiwefojscokjzoikmnxzmkhcvjud ,czmnjklvjdsl\r\nskcnsjkhskdjeijknklxm				\r\n					', '2018-12-05 14:25:54'),
(27, 12, '', '		jkgggggggggggggggggggggggggggggggggggggggggggggggggggggggggfgknsamc,nsalkchasm cmnclsakjcas\r\nsackancmxncljkhsacnmxncjksihdiwaoeuylwiukfhruiwersjcnksdmxnvlkzjf9ewiqhjscnkmnc\r\nscjkbggggsduywuicsjnmxczuiwefojscokjzoikmnxzmkhcvjud ,czmnjklvjdsl\r\nskcnsjkhskdjeijknklxm				\r\n					', '2018-12-05 14:29:27'),
(28, 12, '', '						\r\n		Hello BUians, Welcome to BU mirror. good night.			', '2018-12-05 14:32:58'),
(31, 1, '', 'hbfxzzzzzzzzzz', '2018-12-09 21:29:36'),
(32, 1, '', 'sfhhhhhhh', '2018-12-10 16:25:37'),
(33, 1, '5809055-imagens-hd.jpg', '', '2018-12-10 16:25:55'),
(34, 1, 'google-logo-sign-1920-600x337.jpg', 'fyuuuuuuuuuuuuuuu', '2018-12-10 16:26:35'),
(35, 1, 'Beautiful-Girls-Pictures-With-Nature4.jpg', '', '2018-12-10 19:38:51'),
(36, 1, '', 'ADDDDDDDDDDDSAAAAAAAAACCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC', '2018-12-10 19:40:56'),
(37, 1, 'Flowers.jpg', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdddddddddddddddddddddddddddddddddddddddddddddddddxzzzzzzzzzzzzzzzz', '2018-12-10 19:43:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`),
  ADD UNIQUE KEY `group_username` (`group_username`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
