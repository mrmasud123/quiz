-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2023 at 01:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `ans_tbl`
--

CREATE TABLE `ans_tbl` (
  `aid` int(11) NOT NULL,
  `optionss` varchar(250) NOT NULL,
  `ans_id` int(250) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ans_tbl`
--

INSERT INTO `ans_tbl` (`aid`, `optionss`, `ans_id`, `course_name`) VALUES
(5, 'LIFO', 5, 'data structure'),
(6, 'FIFO', 5, 'data structure'),
(7, 'SISO', 5, 'data structure'),
(8, 'SIPO', 5, 'data structure'),
(9, 'FIFO', 9, 'data structure'),
(10, 'LIFO', 9, 'data structure'),
(11, 'SISO', 9, 'data structure'),
(12, 'SIPO', 9, 'data structure');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `video` varchar(25) DEFAULT NULL,
  `cover_photo` varchar(20) DEFAULT NULL,
  `pdf` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(255) DEFAULT NULL,
  `total_ques` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dept_name`, `total_ques`) VALUES
(1, 'data structure', '18'),
(2, 'algorithm', '16'),
(3, 'database', '3'),
(10, 'macs', '0'),
(11, 'new', '0'),
(12, 'dept 1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `lstable`
--

CREATE TABLE `lstable` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `speciality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lstable`
--

INSERT INTO `lstable` (`id`, `username`, `email`, `password`, `speciality`) VALUES
(3, 'admin', 'admin@gmail.com', '12345', 'data structure'),
(4, 'admin2', 'admin2@gmail.com', '12345', 'algorithm');

-- --------------------------------------------------------

--
-- Table structure for table `pending_teacher`
--

CREATE TABLE `pending_teacher` (
  `id` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `department` varchar(20) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `name`, `email`, `img_path`) VALUES
(1, 'Ashikun Nabi', 'student1@gmail.com', 'about.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `qnumber`
--

CREATE TABLE `qnumber` (
  `id` int(11) NOT NULL,
  `total_ques` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qnumber`
--

INSERT INTO `qnumber` (`id`, `total_ques`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ques_tbl`
--

CREATE TABLE `ques_tbl` (
  `qid` int(250) NOT NULL,
  `question` varchar(250) NOT NULL,
  `ans_id` int(250) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `author` varchar(20) NOT NULL,
  `department` varchar(30) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ques_tbl`
--

INSERT INTO `ques_tbl` (`qid`, `question`, `ans_id`, `course_name`, `author`, `department`, `date`) VALUES
(2, 'What stack follows?', 5, 'data structure', 'admin@gmail.com', 'data structure', '15-Aug-2023 12-40-49'),
(3, 'What queues follows?', 9, 'data structure', 'teacher@gmail.com', 'data structure', '15-Aug-2023 12-44-01');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_department` varchar(255) NOT NULL,
  `mark` int(20) NOT NULL,
  `out_of` varchar(20) NOT NULL,
  `date_time` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `student_name`, `student_department`, `mark`, `out_of`, `date_time`, `email`) VALUES
(6, 'Ashikun Nabi', 'data structure', 1, '1', '2023/08/12-11:20:22', 'student1@gmail.com'),
(7, 'Ashikun Nabi', 'data structure', 1, '1', '2023/08/12-11:23:05', 'student1@gmail.com'),
(8, 'Ashikun Nabi', 'data structure', 1, '1', '2023/08/12-11:28:48', 'student1@gmail.com'),
(9, 'Masud Rana', 'algorithm', 1, '1', '2023/08/13-17:49:43', 'student@gmail.com'),
(10, 'Masud Rana', 'data structure', 0, '1', '2023/08/14-10:07:41', 'student@gmail.com'),
(11, 'Masud Rana', 'algorithm', 0, '3', '2023/08/14-10:07:56', 'student@gmail.com'),
(12, 'Masud Rana', 'algorithm', 3, '3', '2023/08/14-10:12:19', 'student@gmail.com'),
(13, 'Masud Rana', 'algorithm', 3, '3', '2023/08/14-10:14:37', 'student@gmail.com'),
(14, 'Masud Rana', 'data structure', 0, '1', '2023/08/15-08:12:43', 'student@gmail.com'),
(15, 'Ashikun Nabi', 'data structure', 1, '2', '2023/08/15-12:53:29', 'student1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `speciality` varchar(25) DEFAULT NULL,
  `institution` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `password`, `speciality`, `institution`, `img_path`) VALUES
(1, 'teacher', 'teacher@gmail.com', 'teacher', 'data structure', 'aust', 'about.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `id` int(11) NOT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  `author_img` varchar(255) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `upload_date` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `materials` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `title` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`id`, `author_name`, `author_img`, `email`, `upload_date`, `video_link`, `course_name`, `materials`, `description`, `title`) VALUES
(8, 'teacher', 'about.jpg', 'teacher@gmail.com', '15-Aug-2023 12-45-06pm', 'video2.mp4', 'data structure', 'java-ct.pdf', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias non illo perspiciatis ut eius et.', 'Stack introduction');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `department` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `department`, `institution`, `img_path`) VALUES
(4, 'Masud Rana', 'student@gmail.com', 'masud', 'data structure', 'BUBT', 'about.jpg'),
(11, 'Ashikun Nabi', 'student1@gmail.com', 'ashik', '', 'aust', 'img.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ans_tbl`
--
ALTER TABLE `ans_tbl`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lstable`
--
ALTER TABLE `lstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_teacher`
--
ALTER TABLE `pending_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnumber`
--
ALTER TABLE `qnumber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ques_tbl`
--
ALTER TABLE `ques_tbl`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ans_tbl`
--
ALTER TABLE `ans_tbl`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lstable`
--
ALTER TABLE `lstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pending_teacher`
--
ALTER TABLE `pending_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `qnumber`
--
ALTER TABLE `qnumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ques_tbl`
--
ALTER TABLE `ques_tbl`
  MODIFY `qid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
