-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2023 at 02:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawyerswebiste_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoinments`
--

CREATE TABLE `appoinments` (
  `Id` int(11) NOT NULL,
  `Lawyer_Id` int(11) DEFAULT NULL,
  `Lawyer_name` varchar(100) NOT NULL,
  `Case_type` varchar(50) DEFAULT NULL,
  `Client_Id` int(11) DEFAULT NULL,
  `Client_name` varchar(50) DEFAULT NULL,
  `Client_phone` varchar(50) DEFAULT NULL,
  `Client_email` varchar(50) DEFAULT NULL,
  `Client_cnic` varchar(50) DEFAULT NULL,
  `Date` varchar(20) DEFAULT NULL,
  `Time` varchar(20) DEFAULT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appoinments`
--

INSERT INTO `appoinments` (`Id`, `Lawyer_Id`, `Lawyer_name`, `Case_type`, `Client_Id`, `Client_name`, `Client_phone`, `Client_email`, `Client_cnic`, `Date`, `Time`, `Status`) VALUES
(8, 7, 'Muhammad Ahmed', 'Property Case', 5, 'hammad', '+92-333-02405', 'hammad@gmail.com', '42201-9715405', '2023-02-09', '14:19', 'Case Pending'),
(9, 4, 'Emaad Uddin', 'Criminal Case', 5, 'hammad', '+92-333-02405', 'hammad@gmail.com', '42201-9715405', '2023-02-14', '14:35', 'Case Pending'),
(10, 4, 'Emaad Uddin', 'Property Case', 2, 'Haseeb', '+92-333-0240456', 'haseeb@gmail.com', '42201-9714521', '2023-02-21', '23:28', 'Case Pending');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Phone_no` varchar(15) DEFAULT NULL,
  `Message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `Name`, `Email`, `Phone_no`, `Message`) VALUES
(12, 'Shah', 'Shah@gmail.com', '0306022144', '123asdasd'),
(13, 'Shah', 'Shah@gmail.com', '03330240594', 'alskjdlsajdlksadlksdksdkjsadjkl');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_details`
--

CREATE TABLE `lawyer_details` (
  `Id` int(11) NOT NULL,
  `User_Id` int(11) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `lawyer_email` varchar(100) DEFAULT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `image` text NOT NULL,
  `gender` varchar(25) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `cnic` varchar(13) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `lawyer_type` varchar(100) NOT NULL,
  `lawyer_case_done` varchar(100) NOT NULL,
  `short_about` varchar(50) NOT NULL,
  `about_me` varchar(200) NOT NULL,
  `lawyer_personal_statement` varchar(255) NOT NULL,
  `highest_qualification` varchar(100) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `experience_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lawyer_details`
--

INSERT INTO `lawyer_details` (`Id`, `User_Id`, `first_name`, `last_name`, `lawyer_email`, `mobile_number`, `image`, `gender`, `dob`, `cnic`, `country`, `city`, `address`, `lawyer_type`, `lawyer_case_done`, `short_about`, `about_me`, `lawyer_personal_statement`, `highest_qualification`, `specialization`, `experience_level`) VALUES
(1, 1, 'Emmad', 'Uddin', 'emmad@gmail.com', '+92-333-4567894', '1.jpeg', 'Male', '6/May/2000', '42201-9715405', 'Pakistan', 'Karachi', 'Shah faisal', 'Family Laywer', '1', 'I\'m a great lawyer ', 'I\'m Emmad Uddin.', 'I find the idea of studying ', 'Masters', 'Family Laywer', '2 to 5 years'),
(5, 3, 'Afaque', 'Ahmed', 'Afaque@gmail.com', '+92-313-1234567', 'hb (2).jpg', 'Male', '1/January/2002', '42201-1234567', 'Pakistan', 'Lahore', 'model colony', 'Property Laywer', '24', 'Hello new', 'I\'m Afaque Ahmed. ', 'I find the idea of studying ', 'LLB', 'Personal Laywer', '5 to 10 years'),
(6, 4, 'Abdul', 'Haseeb', 'Haseeb01@gmail.com', '+92-333-7894561', 'attorney21.png', 'Male', '5/March/2004', '42202-4567890', 'Pakistan', 'Lahore', 'model colony', 'Property Laywer', '15', 'I\'m a great lawyer ', 'I\'m Abdul Haseeb.', 'I find the idea of studying ', 'LLM', 'Property Laywer', '10 to 15 years'),
(7, 5, 'Qasim', 'Hussain', 'qasim@gmail.com', '+92-311-0240545', 'attorney22.png', 'Male', '8/March/2003', '42201-4567890', 'Pakistan', 'Hydrabad', 'Azimpura', 'Divorce Laywer', '10', 'I\'m a great lawyer ', 'I\'m Qasim Hussain. ', 'I find the idea of studying ', 'LLB', 'Divorce Laywer', '2 to 5 years');

-- --------------------------------------------------------

--
-- Table structure for table `practice_areas`
--

CREATE TABLE `practice_areas` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `practice_areas`
--

INSERT INTO `practice_areas` (`id`, `name`, `icon`, `description`) VALUES
(2, 'Criminal Law', '<i class=\'fas fa-briefcase\'></i>', 'This is my Criminal Law'),
(3, 'Property Law', '<i class=\'fas fa-landmark\'></i>', 'This is property law');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` text NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_role`, `created_date`, `image`, `first_name`, `last_name`, `gender`, `dob`, `cnic`, `country`, `city`, `address`, `mobile_number`, `status`) VALUES
(1, 'Emmad', 'emmad@gmail.com', '1234', 'Lawyer', '2023-02-13 12:06:25', '', '', '', '', '', '', '', '', '', '', 1),
(2, 'Haseeb', 'haseeb@gmail.com', '0123', 'Client', '2023-02-13 12:13:31', 'author-1.jpg', 'Abdul', 'Haseeb', 'Male', '6-April-2000', '42201-9715405-3', 'Pakistan', 'Karachi', 'Shamsi', '+92-311-0240597', 1),
(3, 'Afaque', 'Afaque@gmail.com', '12345', 'Lawyer', '2023-02-13 13:04:49', '', '', '', '', '', '', '', '', '', '', 1),
(4, 'Haseeb01', 'Haseeb01@gmail.com', 'haseeb', 'Lawyer', '2023-02-13 13:16:57', '', '', '', '', '', '', '', '', '', '', 1),
(5, 'Qasim', 'qasim@gmail.com', 'qasim', 'Lawyer', '2023-02-13 13:20:17', '', '', '', '', '', '', '', '', '', '', 1),
(6, 'Asad', 'asad@gmail.com', 'asad', 'Client', '2023-02-13 13:27:11', 'author-3.jpg', 'Asad', 'Khan', 'Male', '2-February-2002', '42201-1234567-1', 'Pakistan', 'Islamabad', 'Shamsi', '+92-344-0240597', 1),
(7, 'Faizan', 'Faizan@gmail.com', 'faizan', 'Client', '2023-02-13 13:30:33', 'OIP.jfif', 'Faizan', 'Khan', 'Male', '6-January-2004', '42201-9715407-4', 'Pakistan', 'Lahore', 'Green Town', '+92-342-4563210', 1),
(8, 'Ibraheem', 'ibraheem@gmail.com', 'ibraheem', 'Admin', '2023-02-13 13:31:27', '', '', '', '', '', '', '', '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoinments`
--
ALTER TABLE `appoinments`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_details`
--
ALTER TABLE `lawyer_details`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `cnic` (`cnic`);

--
-- Indexes for table `practice_areas`
--
ALTER TABLE `practice_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoinments`
--
ALTER TABLE `appoinments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lawyer_details`
--
ALTER TABLE `lawyer_details`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `practice_areas`
--
ALTER TABLE `practice_areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
