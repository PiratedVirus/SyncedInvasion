-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 17, 2018 at 06:56 PM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invasion`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `sr_no` int(11) NOT NULL,
  `question_title` varchar(256) NOT NULL,
  `opt_A` varchar(128) NOT NULL,
  `opt_B` varchar(128) NOT NULL,
  `opt_C` varchar(128) NOT NULL,
  `opt_D` varchar(128) NOT NULL,
  `correct_choice_text` varchar(128) NOT NULL,
  `correct_choice_index` int(4) NOT NULL,
  `ans_description` varchar(256) NOT NULL,
  `q_id` varchar(11) NOT NULL,
  `test_title` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`sr_no`, `question_title`, `opt_A`, `opt_B`, `opt_C`, `opt_D`, `correct_choice_text`, `correct_choice_index`, `ans_description`, `q_id`, `test_title`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, quod?', 'The Next Warrioor', '250KG', 'The Unknown Soul', 'Air in Vaccum', '250KG', 2, 'Cause Its a Math', '1_1', '1TestOne'),
(2, 'All dynamic data goes here Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, quod?', '120', '130', '140', '111', '140', 3, 'Logical Caorrectness', '2_1', '1TestOne'),
(3, 'bla bla la Ambident Musoc Train?', 'Rain', 'Music', 'Forest', 'Lullby', 'Lullby', 4, 'No desciprtion', '2_2', '1TestOne'),
(4, 'Lorm Ipsum is the Best solustion for..', 'Placeholder', 'Dummy Text', 'Both', 'None', 'Both', 3, 'No desciprtion', '1_4', '1TestOne'),
(5, 'Lorem Dolor Moto M...', 'Moto X', 'Moto Z', 'Moto G', 'Moto Play', 'Moto Z', 2, 'Top Model', '1_5', '2TestTwo'),
(6, 'The Unrealesed version of iPhone', 'iPhone 5', 'iPhone SE', 'iPhone 5C', 'iPhone 9', 'iPhone 9', 4, 'No Model', '1_6', '2TestTwo');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `sr_no` int(11) NOT NULL,
  `userMail` varchar(64) NOT NULL,
  `test_title` varchar(64) NOT NULL,
  `submitted_ans` varchar(2048) NOT NULL,
  `final_score` int(11) DEFAULT NULL,
  `test_date` varchar(64) DEFAULT NULL,
  `answer_key` varchar(2048) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`sr_no`, `userMail`, `test_title`, `submitted_ans`, `final_score`, `test_date`, `answer_key`) VALUES
(1, 'john.doe@gmail.com', 'TestOne', '', 45, '2018-01-17', NULL),
(2, 'zx@xz.com', 'TestOne', '1-D;1-D;1-D;1-D;', 72, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) UNSIGNED NOT NULL,
  `test_name` varchar(32) DEFAULT NULL,
  `test_start_date` varchar(64) DEFAULT NULL,
  `test_end_date` varchar(64) DEFAULT NULL,
  `start_time` varchar(32) DEFAULT NULL,
  `end_time` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `test_name`, `test_start_date`, `test_end_date`, `start_time`, `end_time`) VALUES
(1, '1TestOne', '2018-01-17', '2018-01-17', '08:00', '24:00'),
(2, '2TestTwo', '2018-01-26', '2018-01-26', '09:00', '20:00'),
(3, 'TestThree', '2018-01-23', NULL, NULL, NULL),
(4, 'TestFour', '2018-01-11', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userMobile` bigint(12) NOT NULL,
  `userGender` text NOT NULL,
  `userSubscription` varchar(16) NOT NULL,
  `subsType` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `userMobile`, `userGender`, `userSubscription`, `subsType`) VALUES
(5, 'Saurabh Kulkarni', 'saurabhk201@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 8149306224, 'Male', '', 0),
(6, 'New Name', 'new@mail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1234567890, 'Female', '', 0),
(8, 'New Name', 'w@w.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 9021232134, 'Male', '', 0),
(9, 'Qwerty', 'zx@xz.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 90, 'Male', '', 0),
(10, ' John Doe ', 'john.doe@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 8129306234, 'Female', 'Premium', 1),
(11, 'new user', 'user@q.com', '45c4771dcd1cbd65babf3dd8cd70fed56d428fe708183ba1d146f0ad153773d7', 2, 'Female', '', 0),
(12, 'The Dawn', 'dawn@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 12, 'Male', '', 0),
(13, 'NoName', 'as@sa.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 12, 'Female', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
