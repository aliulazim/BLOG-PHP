-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2017 at 04:31 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `name`) VALUES
(1, 'national'),
(2, 'international'),
(3, 'sports'),
(4, 'others'),
(8, 'sex');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `user_id`, `name`, `email`, `comment`, `date`) VALUES
(15, 67, 1, '', '', 'good', '2017-03-24 03:19:18'),
(16, 66, 1, '', '', 'ok', '2017-03-24 03:19:29'),
(18, 65, 2, '', '', 'hmm', '2017-03-24 03:34:19'),
(19, 66, 2, '', '', 'good', '2017-03-24 03:34:43'),
(21, 64, 2, '', '', 'good', '2017-03-24 03:52:28'),
(22, 63, 2, '', '', 'good', '2017-03-24 03:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(100) NOT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `name`, `description`, `date`, `image`, `cat_id`) VALUES
(62, 5, 'sabuj', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2017-03-24 02:40:53', 'ce3d2c44bbf6f5a0659a3a1c94107aee.png', 1),
(63, 5, 'Hacathon', '<p>Hacathon Hasbeen held on 13 feb</p>', '2017-03-24 02:41:59', '73741356268aec2b31e5271cf0195a29.jpg', 2),
(64, 2, 'Cricket', '<p><a href="http://www.banglatribune.com/others/news/191765/%E0%A6%AC%E0%A6%BE%E0%A6%82%E0%A6%B2%E0%A6%BE%E0%A6%A6%E0%A7%87%E0%A6%B6-%E0%A6%AC%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A6%82%E0%A6%95-%E0%A6%AD%E0%A6%AC%E0%A6%A8%E0%A7%87-%E0%A6%86%E0%A6%97%E0%A7%81%E0%A6%A8-%E0%A7%AB-%E0%A6%B8%E0%A6%A6%E0%A6%B8%E0%A7%8D%E0%A6%AF%E0%A7%87%E0%A6%B0-%E0%A6%A4%E0%A6%A6%E0%A6%A8%E0%A7%8D%E0%A6%A4-%E0%A6%95%E0%A6%AE%E0%A6%BF%E0%A6%9F%E0%A6%BF">à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶ à¦¬à§à¦¯à¦¾à¦‚à¦• à¦­à¦¬à¦¨à§‡ à¦…à¦—à§à¦¨à¦¿à¦•à¦¾à¦£à§à¦¡à§‡à¦° à¦˜à¦Ÿà¦¨à¦¾à§Ÿ à¦«à¦¾à§Ÿà¦¾à¦° à¦¸à¦¾à¦°à§à¦­à¦¿à¦¸à§‡à¦° à¦‰à¦ª-à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦•à§‡à¦° (à¦¢à¦¾à¦•à¦¾) à¦¨à§‡à¦¤à§ƒà¦¤à§à¦¬à§‡ à¦ªà¦¾à¦à¦š à¦¸à¦¦à¦¸à§à¦¯à§‡à¦°...</a></p>', '2017-03-24 02:44:26', 'd3d30ea1523646118c898c9c6ef5564b.jpg', 3),
(65, 2, 'Roby', '<p>ghum pai</p>', '2017-03-24 02:45:04', 'fdbe42ad8692737e158f9b7a3eb64eb0.jpg', 4),
(66, 1, 'Entretainment', '<p>17.5 inch</p>', '2017-03-24 02:46:12', 'dc853421f6922e15162e889a7554002c.jpg', 4),
(67, 1, 'Azim', '<p>42 inch</p>', '2017-03-24 02:46:33', '1.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`, `image`) VALUES
(1, 'azim', 'azim@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, ''),
(2, 'Sohel', 'sohel@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, ''),
(3, 'Manik', 'manik@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, ''),
(4, 'Masum', 'masum@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, ''),
(5, 'sabuj', 'sabuj@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, ''),
(6, 'nur', 'nur@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, ''),
(7, 'roby', 'roby@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, ''),
(8, 'coderroby', 'coder.roby@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
