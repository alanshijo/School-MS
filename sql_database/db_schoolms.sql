-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 11:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_schoolms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE `tbl_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1701247434),
('m231129_083758_create_user_table', 1701247436),
('m231129_092647_create_student_table', 1701250892),
('m231205_051546_alter_column_to_student_table', 1701753528);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `student_img` varchar(255) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `student_img`, `full_name`, `phone_no`, `email`, `dob`, `address`, `created_by`, `created_at`, `updated_at`) VALUES
(67, 'ivana-cajina-_7LbC5J-jw4-unsplash1701843980.jpg', 'Sobin George', '8078239501', 'sobing@gmail.com', '2001-02-24', 'Vazhakkala', 1, '2023-12-06 11:56:20', '2023-12-06 11:56:20'),
(68, 'ethan-hoover-0YHIlxeCuhg-unsplash1701844026.jpg', 'Alwin Johny', '9654782103', 'alwinjohny@gmail.com', '2000-04-20', 'Poovarany', 1, '2023-12-06 11:57:06', '2023-12-06 11:57:06'),
(69, 'sergio-de-paula-c_GmwfHBDzk-unsplash1701844077.jpg', 'Sanjo Samuel', '7789645764', 'sanjosamuel@gmail.com', '2000-03-06', 'Kooraly', 1, '2023-12-06 11:57:57', '2023-12-06 11:57:57'),
(70, 'mubariz-mehdizadeh-t3zrEm88ehc-unsplash1701844150.jpg', 'Aby Jose', '8412398765', 'abykacha@gmail.com', '1998-09-09', 'Vilakkumadom', 1, '2023-12-06 11:59:10', '2023-12-06 11:59:10'),
(71, NULL, 'Jismol Thomas', '9654780124', 'jismol777@gmail.com', '2000-11-10', 'Paika', 1, '2023-12-06 12:01:02', '2023-12-06 15:37:48'),
(72, NULL, 'Nice Shijo', '9446895431', 'nicemol@gmail.com', '1996-07-13', 'Paika', 1, '2023-12-06 12:01:50', '2023-12-06 12:06:06'),
(73, 'michael-austin-jgSAuqMmJUE-unsplash1701844359.jpg', 'Gracy Joseph', '9446203458', 'gracy@gmail.com', '1989-12-14', 'Pala', 1, '2023-12-06 12:02:39', '2023-12-06 12:02:39'),
(74, '31014-singleman-youngman-man-backpack-hiking.1200w.tn1701855786.jpg', 'Shijo Joseph', '9946351543', 'shijoatkl@gmail.com', '2023-11-29', 'Pala', 1, '2023-12-06 12:43:02', '2023-12-06 15:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `first_name`, `last_name`, `email`, `password`, `auth_key`, `access_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Alan', 'Shijo', 'alanshijo@gmail.com', '$2y$13$HBjQCInR6A2aAcYgl02MZuzVB8FGQ4jaji.mulO6qgDZ/XXMs3WOW', 'AtjoYrO-sqY8iJBytuxBewDRBzBxgYmc', '', 1, '2023-12-06 14:36:35', '2023-12-01 11:36:11'),
(11, 'Sanjo', 'Samuel', 'sanjosamuel@gmail.com', '$2y$13$Cn30jM/oXukFz/7Vm/b.0Ol/7V05XNYU3TtiCTCsYtvqvcuAz3S/C', 'ddDI7LXVo5swPHmVT23JO8lUxuiSo7dA', '', 1, '2023-12-06 14:35:10', '2023-12-06 14:35:10'),
(12, 'Gills', 'Jose', 'gillsjo@gmail.com', '$2y$13$YFNjmGqU33rKGK0SHELu9O7oyoJLJXY.DgSnyg9KpJeJ9.nHPNZLK', '26ttCY7vUaAKwC9ksdUM9mUHCn1I1Z-B', '', 1, '2023-12-06 15:33:09', '2023-12-06 15:33:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_migration`
--
ALTER TABLE `tbl_migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_created_by_user` (`created_by`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `fk_created_by_user` FOREIGN KEY (`created_by`) REFERENCES `tbl_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
