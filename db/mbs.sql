-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2017 at 01:31 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `mbs_cmt_likes`
--

CREATE TABLE `mbs_cmt_likes` (
  `cmt_like_id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `like_state` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mbs_cmt_likes`
--

INSERT INTO `mbs_cmt_likes` (`cmt_like_id`, `comment_id`, `user_id`, `like_state`) VALUES
(1, 256, 2, 0),
(5, 256, 1, 1),
(15, 269, 1, 1),
(16, 268, 1, 0),
(18, 272, 2, 0),
(19, 272, 1, 1),
(21, 268, 2, 1),
(22, 269, 2, 1),
(23, 276, 2, 1),
(24, 275, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mbs_comments`
--

CREATE TABLE `mbs_comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mbs_comments`
--

INSERT INTO `mbs_comments` (`comment_id`, `comment_content`, `user_id`, `post_id`, `comment_time`) VALUES
(256, 'Hey Hello', 2, 179, '2017-03-02 11:55:43'),
(268, 'Nice Work Shehzad !', 1, 186, '2017-03-05 21:43:59'),
(269, 'Thank You Admin :)', 2, 186, '2017-03-05 21:44:45'),
(272, 'Font Awesome', 2, 179, '2017-03-06 08:36:57'),
(273, 'True !', 2, 188, '2017-03-07 18:25:53'),
(274, 'Agree', 2, 188, '2017-03-07 18:58:40'),
(275, 'Sir', 2, 190, '2017-03-07 19:02:27'),
(276, 'test', 2, 192, '2017-03-29 06:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `mbs_posts`
--

CREATE TABLE `mbs_posts` (
  `post_id` int(11) NOT NULL,
  `post_content` text,
  `user_id` int(11) DEFAULT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mbs_posts`
--

INSERT INTO `mbs_posts` (`post_id`, `post_content`, `user_id`, `post_time`) VALUES
(179, 'Hello <br>World', 2, '2017-03-02 11:54:27'),
(186, 'Hello Sir ', 1, '2017-03-05 10:57:46'),
(188, 'this is a test post!', 2, '2017-03-06 19:10:19'),
(189, 'Java is to Javascript<br>What car is to carpet.<br>- Chris Heilmann', 2, '2017-03-06 19:12:08'),
(190, 'Find yourself!<br>You are a treasure,<br>Lost.<br>- Ibnay Muneeb', 2, '2017-03-06 19:12:20'),
(191, 'Hello<br>World', 2, '2017-03-07 19:02:06'),
(192, 'I Am Talking With You', 2, '2017-03-12 16:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `mbs_pst_likes`
--

CREATE TABLE `mbs_pst_likes` (
  `pst_like_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `like_state` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mbs_pst_likes`
--

INSERT INTO `mbs_pst_likes` (`pst_like_id`, `post_id`, `user_id`, `like_state`) VALUES
(16, 179, 5, 1),
(21, 179, 2, 1),
(25, 186, 2, 1),
(26, 179, 1, 0),
(27, 192, 2, 1),
(28, 191, 2, 1),
(29, 190, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mbs_users`
--

CREATE TABLE `mbs_users` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_name` tinytext NOT NULL,
  `user_email` tinytext NOT NULL,
  `user_pswrd` tinytext NOT NULL,
  `user_dp` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mbs_users`
--

INSERT INTO `mbs_users` (`user_id`, `user_fname`, `user_lname`, `user_name`, `user_email`, `user_pswrd`, `user_dp`) VALUES
(1, 'MBS', 'Admin', 'Admin', 'admin@gmail.com', 'admin', 'img/users/default.png'),
(2, 'Abdul Majeed', 'Shehzad', 'shehzad', 'shehzad@gmail.com', 'shehzad', 'img/users/me.jpg'),
(4, 'Abdul Majeed', 'Shehzad', 'Shazy', 'shehzad3880@gmail.com', '1111', 'img/users/default.jpg'),
(5, 'K', 'Shaikh', 'kshaikh', 'm.khalid.shaikh@fuuast.edu.pk', '12345', 'img/users/default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mbs_cmt_likes`
--
ALTER TABLE `mbs_cmt_likes`
  ADD PRIMARY KEY (`cmt_like_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `mbs_comments`
--
ALTER TABLE `mbs_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mbs_comments_ibfk_2` (`post_id`);

--
-- Indexes for table `mbs_posts`
--
ALTER TABLE `mbs_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `mbs_pst_likes`
--
ALTER TABLE `mbs_pst_likes`
  ADD PRIMARY KEY (`pst_like_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `mbs_users`
--
ALTER TABLE `mbs_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mbs_cmt_likes`
--
ALTER TABLE `mbs_cmt_likes`
  MODIFY `cmt_like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `mbs_comments`
--
ALTER TABLE `mbs_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;
--
-- AUTO_INCREMENT for table `mbs_posts`
--
ALTER TABLE `mbs_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;
--
-- AUTO_INCREMENT for table `mbs_pst_likes`
--
ALTER TABLE `mbs_pst_likes`
  MODIFY `pst_like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `mbs_users`
--
ALTER TABLE `mbs_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mbs_cmt_likes`
--
ALTER TABLE `mbs_cmt_likes`
  ADD CONSTRAINT `mbs_cmt_likes_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `mbs_comments` (`comment_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mbs_cmt_likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `mbs_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `mbs_comments`
--
ALTER TABLE `mbs_comments`
  ADD CONSTRAINT `mbs_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `mbs_users` (`user_id`),
  ADD CONSTRAINT `mbs_comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `mbs_posts` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `mbs_posts`
--
ALTER TABLE `mbs_posts`
  ADD CONSTRAINT `mbs_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `mbs_users` (`user_id`);

--
-- Constraints for table `mbs_pst_likes`
--
ALTER TABLE `mbs_pst_likes`
  ADD CONSTRAINT `mbs_pst_likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `mbs_posts` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mbs_pst_likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `mbs_users` (`user_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
