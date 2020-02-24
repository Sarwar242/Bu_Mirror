-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2020 at 02:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `com_author` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `group_id`, `student_id`, `comment`, `com_author`, `date`) VALUES
(12, 14, 12, '0', 'dfsssssssssss', 'wqrt ', '2018-10-29 04:04:43'),
(18, 9, 12, '0', 'good night', 'Sarwar', '2018-10-29 04:26:05'),
(24, 27, 12, '0', 'fukkkic', 'Sarwar', '2018-12-05 08:39:30'),
(26, 34, 1, '0', 'zfssssssssssss', 'wqrt ', '2018-12-11 02:59:51'),
(28, 33, 1, '0', 'gbbbbbbbbbbbbbbbbhghddddddddddd', 'Sarwar', '2018-12-11 03:23:50'),
(29, 37, 1, '0', 'gvbvbvbvbvbvbvbvbvbvb', 'Sarwar', '2018-12-11 03:31:34'),
(30, 37, 1, '0', 'ffffffffffffffffffffffffffffffffffffg', 'lhkkk', '2018-12-11 03:31:45'),
(31, 36, 1, '0', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'Sarwar5', '2018-12-11 03:50:13'),
(32, 36, 1, '0', 'yhhhhhhhhhhhr', 'Sarwar', '2018-12-11 04:25:15'),
(34, 35, 1, '0', 'nice\r\n', 'bucse4', '2018-12-11 04:28:55'),
(35, 34, 1, '0', 'hkkkkkkkkknj jhhhhhhhhiiiiik jjjjjjjjjjjjjjjjjjjkl', 'Sarwar5', '2018-12-18 06:24:05'),
(36, 38, 22, '17cse016', 'sas', '', '2019-01-26 08:35:10'),
(38, 43, 22, '17cse046', 'Sarwar', '', '2019-01-26 15:38:50'),
(39, 47, 22, '17cse046', 'ewe', '', '2019-01-26 15:39:18'),
(40, 0, 0, '17cse046', 'sss', '', '2019-01-26 15:44:26'),
(41, 39, 22, '17cse046', 'aas', '', '2019-01-26 15:55:16'),
(42, 46, 22, '17cse008', 'dsass', 'Arman', '2019-01-26 22:45:22'),
(43, 46, 22, '17cse008', 'hhhhh', 'Amir Hossen', '2019-01-26 22:45:31'),
(44, 46, 22, '17cse008', 'hjgjhkkl', 'Amir Hossen', '2019-01-26 22:45:37'),
(45, 38, 22, '17cse008', 'amir', 'Sarwar Hossain', '2019-01-26 22:49:02'),
(46, 46, 22, '17cse008', 'hi', 'Amir Hossen', '2019-01-27 02:00:40'),
(47, 47, 22, '17cse016', 'ghj', 'Arman', '2019-01-27 02:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_des` text NOT NULL,
  `department` varchar(255) NOT NULL,
  `Batch` varchar(255) NOT NULL,
  `group_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `group_image` text NOT NULL,
  `ver_code` int(100) NOT NULL,
  `admin_id` varchar(100) NOT NULL,
  `admin2_id` varchar(100) NOT NULL,
  `posts` text NOT NULL,
  `approved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `group_des`, `department`, `Batch`, `group_created`, `group_image`, `ver_code`, `admin_id`, `admin2_id`, `posts`, `approved`) VALUES
(22, 'cse4', 'Hello BUians , Welcome to BU mirror.\r\n\r\nWhatever!!!', 'CSE', 'Fourth', '2019-01-26 09:01:30', 'admin-code_oop_php.jpg', 473384578, '17cse016', '', 'yes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `file` text NOT NULL,
  `post_content` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `group_id`, `student_id`, `file`, `post_content`, `post_date`) VALUES
(2, 12, '1', '0', '						\r\n	hjgjkhi				', '2018-10-22 15:19:19'),
(8, 12, '0', '0', '						\r\n		ghfhjlo			', '2018-10-23 08:14:24'),
(9, 12, '0', '0', 'Hello World , Good Night..					', '2018-10-23 08:28:38'),
(12, 12, '0', '0', 'I am working on web project.', '2018-10-23 10:30:58'),
(13, 12, '0', '0', '						\r\n					erbybybybybybybybybybybyby', '2018-10-23 10:31:03'),
(14, 12, '0', '0', 'Hey whats up?						\r\n					', '2018-10-23 11:17:15'),
(16, 13, '0', '0', '	hjjjjjjjjjjjjjjjjj					\r\n					', '2018-10-29 04:45:09'),
(17, 13, '0', '', 'sfddddddddddddd						\r\n					', '2018-10-29 05:02:50'),
(18, 13, '0', '', 'sfffffffffffff						\r\n					', '2018-10-29 05:02:57'),
(23, 12, '0', '', 'ghhhhhhhhhhhhhhf						\r\n					', '2018-10-29 11:47:32'),
(24, 12, '0', '', 'Hello World, whats up.?', '2018-10-29 11:48:06'),
(25, 12, '0', '', 'hjgkj					\r\n					', '2018-12-05 08:14:19'),
(26, 12, '0', '', '		jkgggggggggggggggggggggggggggggggggggggggggggggggggggggggggfgknsamc,nsalkchasm cmnclsakjcas\r\nsackancmxncljkhsacnmxncjksihdiwaoeuylwiukfhruiwersjcnksdmxnvlkzjf9ewiqhjscnkmnc\r\nscjkbggggsduywuicsjnmxczuiwefojscokjzoikmnxzmkhcvjud ,czmnjklvjdsl\r\nskcnsjkhskdjeijknklxm				\r\n					', '2018-12-05 08:25:54'),
(28, 12, '0', '', '						\r\n		Hello BUians, Welcome to BU mirror. good night.			', '2018-12-05 08:32:58'),
(32, 1, '0', '', 'sfhhhhhhh', '2018-12-10 10:25:37'),
(34, 1, '0', 'google-logo-sign-1920-600x337.jpg', 'fyuuuuuuuuuuuuuuu', '2018-12-10 10:26:35'),
(35, 1, '0', 'Beautiful-Girls-Pictures-With-Nature4.jpg', '', '2018-12-10 13:38:51'),
(36, 1, '0', '', 'ADDDDDDDDDDDSAAAAAAAAACCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC', '2018-12-10 13:40:56'),
(37, 1, '0', 'Flowers.jpg', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdddddddddddddddddddddddddddddddddddddddddddddddddxzzzzzzzzzzzzzzzz', '2018-12-10 13:43:15'),
(38, 22, '17cse016', '', 'post no 1.', '2019-01-26 07:34:38'),
(39, 22, '17cse016', '', 'post no 2.', '2019-01-26 09:31:32'),
(40, 22, '17cse016', '', 'post', '2019-01-26 09:45:13'),
(41, 22, '17cse016', '', 'saa', '2019-01-26 09:55:36'),
(42, 22, '17cse016', '', 'saa', '2019-01-26 09:57:32'),
(43, 22, '17cse016', '', 'saa', '2019-01-26 09:58:58'),
(44, 22, '17cse008', '', 'Amir&quot;s Post\r\n', '2019-01-26 14:09:40'),
(45, 22, '17cse008', '', 'as', '2019-01-26 14:09:48'),
(46, 22, '17cse046', '', 'Armands Post', '2019-01-26 15:03:19'),
(47, 22, '17cse046', '', 'Arman posts sss', '2019-01-26 15:23:11'),
(48, 22, '17cse016', 'hard-drives-diy-open.jpg', '', '2019-05-25 23:07:29'),
(49, 22, '17cse016', '', 'What Happened to You!!', '2019-05-25 23:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `batch` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `approved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_id`, `name`, `email`, `department`, `batch`, `image`, `group_id`, `password`, `approved`) VALUES
(6, '17cse008', 'Amir Hossen', 'amir.cse4.bu@gmail.com', 'CSE', 'Fourth', 'amir2.jpg', 22, '123456', 1),
(7, '17cse046', 'Arman', 'arman.cse4.bu@gmail.com', 'CSE', 'Fourth', 'google-logo-sign-1920-600x337.jpg', 22, '111111', 1),
(9, '17cse016', 'Sarwar Hossain', 'sarwar.cse4.bu@gmail.com', 'CSE', 'Fourth', 'DSC_01021.jpg', 22, '123456', 1);

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
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
