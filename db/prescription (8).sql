-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 08:05 AM
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
-- Database: `prescription`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `unique_id` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`id`, `first_name`, `last_name`, `email`, `contact`, `unique_id`, `image`, `status`, `created_date`) VALUES
(1, 'Admindwesd', 'Userd', 'admin@gmail.comd', '8956856986', 'UIDA56223', 'user/admin_image.jpg', 1, '2021-07-14 13:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

CREATE TABLE `city_master` (
  `City_id` int(11) NOT NULL,
  `State_id` int(11) NOT NULL,
  `District_id` int(11) NOT NULL,
  `City_name` varchar(50) NOT NULL,
  `City_status` tinyint(1) NOT NULL,
  `City_created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`City_id`, `State_id`, `District_id`, `City_name`, `City_status`, `City_created_date`) VALUES
(1, 1, 1, 'sdf', 1, '2021-07-14 14:13:21'),
(3, 1, 1, 'weas', 1, '2023-04-09 21:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `company_master`
--

CREATE TABLE `company_master` (
  `Company_id` int(11) NOT NULL,
  `Company_name` varchar(25) NOT NULL,
  `Company_Address` text NOT NULL,
  `Company_Contact` varchar(15) NOT NULL,
  `Company_Status` tinyint(1) NOT NULL,
  `Created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company_master`
--

INSERT INTO `company_master` (`Company_id`, `Company_name`, `Company_Address`, `Company_Contact`, `Company_Status`, `Created_date`) VALUES
(1, 'fgs', 'dsfgs', '8904652353', 1, '2021-07-14 14:09:05'),
(2, 'wesad', 'trfd', '6666666666', 1, '2023-06-09 17:08:27'),
(3, 'as', 'sdfs', '7676767676', 1, '2023-06-09 17:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_master`
--

CREATE TABLE `complaint_master` (
  `complaint_id` int(11) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `complaint_title` varchar(100) NOT NULL,
  `complaint_description` text NOT NULL,
  `complaint_status` tinyint(1) NOT NULL,
  `posted_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `complaint_master`
--

INSERT INTO `complaint_master` (`complaint_id`, `user_id`, `complaint_title`, `complaint_description`, `complaint_status`, `posted_on`) VALUES
(1, 'UID322676', 'dgfsdg', 'gds', 1, '2021-07-14 14:23:20'),
(2, 'UID322676', 'fdg', 'dfg', 1, '2021-07-14 14:45:19'),
(3, 'UID322676', 'we', 'wew', 1, '2023-04-07 16:40:29'),
(4, 'UID322676', 'ewas', 'edas', 1, '2023-06-10 10:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `district_master`
--

CREATE TABLE `district_master` (
  `District_id` int(11) NOT NULL,
  `State_id` int(11) NOT NULL,
  `District_name` varchar(50) NOT NULL,
  `D_status` tinyint(1) NOT NULL,
  `DCreated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `district_master`
--

INSERT INTO `district_master` (`District_id`, `State_id`, `District_name`, `D_status`, `DCreated_date`) VALUES
(1, 1, 'sdgsd', 1, '2021-07-14 14:13:05'),
(2, 1, 'dsfz', 1, '2023-04-09 21:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_master`
--

CREATE TABLE `doctor_master` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `specialization` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `unique_id` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_master`
--

INSERT INTO `doctor_master` (`id`, `first_name`, `last_name`, `specialization`, `email`, `contact`, `unique_id`, `status`, `created_date`, `image`) VALUES
(2, 'yer', 'ery', 'ere', 'suraj@gmail.comd', '8904652353', 'UID309669', 1, '2021-07-14 13:55:43', 'user/doctor_image.jpg'),
(3, 'dsfgsd', 'gsdg', 'sdg', 'suraj@gmail.comd', '8904652353', 'UID720472', 1, '2021-07-14 14:47:33', 'user/doctor_image.jpg'),
(4, 'rgretggg', 'ertw', 'twe', 'suraj@gmail.comd', '8904652353', 'UID875168', 1, '2021-07-14 14:48:39', 'user/doctor_image.jpg'),
(5, 'vvvc', 'vvvc', 'vvv', 'admin@gmail.comdc', '6666666665', 'UID189070', 1, '2021-07-14 14:50:30', 'user/doctor_image.jpg'),
(6, 'guyhj', 'ygihj', 'oyih', 'yguhj@fytguh', '6666666666', 'UID648561', 1, '2023-04-10 10:11:48', 'user/doctor_image.jpg'),
(7, 'guyhj', 'ygihj', 'oyih', 'yguhj@fytguh', '6666666666', 'UID833549', 1, '2023-04-10 10:12:09', 'user/doctor_image.jpg'),
(8, 'guyhj', 'ygihj', 'oyih', 'yguhj@fytguh', '6666666666', 'UID842164', 1, '2023-04-10 10:12:45', 'user/doctor_image.jpg'),
(9, 'guyhj', 'ygihj', 'oyih', 'yguhj@fytguh', '6666666666', 'UID854936', 1, '2023-04-10 10:20:13', 'user/doctor_image.jpg'),
(10, 'guyhj', 'ygihj', 'oyih', 'yguhj@fytguh', '6666666666', 'UID451267', 1, '2023-04-10 10:20:32', 'user/doctor_image.jpg'),
(11, 'guyhj', 'ygihj', 'oyih', 'yguhj@fytguh', '6666666666', 'UID980794', 1, '2023-04-10 10:21:05', 'user/doctor_image.jpg'),
(12, 'guyhj', 'ygihj', 'oyih', 'yguhj@fytguh', '6666666666', 'UID535576', 1, '2023-04-10 10:21:20', 'user/doctor_image.jpg'),
(13, 'ewdvbh', 'ewtwqe', 'oyih', 'manojkpajeer127@gmail.com', '6666666666', 'UID779060', 1, '2023-04-10 10:21:37', 'user/doctor_image.jpg'),
(14, 'ewdvbh', 'ewtwqe', 'oyih', 'manojkpajeer127@gmail.com', '6666666666', 'UID751493', 1, '2023-04-10 10:21:48', 'user/doctor_image.jpg'),
(15, 'manoj', 'ewtwqe', 'oyih', 'manojkpajeer127@gmail.com', '9787878783', 'UID636327', 1, '2023-04-10 10:23:09', 'user/doctor_image.jpg'),
(16, 'Manoj', 'Kumar', 'ewdas', 'manojkpajeer127@gmail.com', '7777777777', 'UID996173', 1, '2023-06-09 17:42:30', 'user/doctor_image.jpg'),
(17, 'Manoj', 'Kumar', 'ewdas', 'manojkpajeer127@gmail.com', '7777777777', 'UID981761', 1, '2023-06-09 17:42:44', 'user/doctor_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login_master`
--

CREATE TABLE `login_master` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(25) NOT NULL,
  `user_type` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_master`
--

INSERT INTO `login_master` (`id`, `unique_id`, `user_type`, `password`, `status`, `created_date`) VALUES
(1, 'UID322676', 'User', 'MAnoj143', 1, '2021-07-14 12:50:44'),
(2, 'UID956223', 'User', 'MAnoj143', 1, '2021-07-14 12:51:59'),
(3, 'UIDA56223', 'Admin', 'MAnoj1433', 1, '2021-07-14 12:51:59'),
(8, 'UID800087', 'Medical', 'PAss813844', 1, '2021-07-14 13:48:03'),
(10, 'UID309669', 'Doctor', 'PAss272975', 1, '2021-07-14 13:55:43'),
(11, 'UID720472', 'Doctor', 'PAss981175', 1, '2021-07-14 14:47:33'),
(12, 'UID875168', 'Doctor', 'PAss458064', 1, '2021-07-14 14:48:39'),
(13, 'UID189070', 'Doctor', 'PAss935255', 1, '2021-07-14 14:50:30'),
(14, 'UID198153', 'Medical', 'PAss892947', 1, '2023-04-10 10:11:01'),
(15, 'UID648561', 'Doctor', 'PAss952504', 1, '2023-04-10 10:11:48'),
(16, 'UID833549', 'Doctor', 'PAss610458', 1, '2023-04-10 10:12:09'),
(17, 'UID842164', 'Doctor', 'PAss115061', 1, '2023-04-10 10:12:45'),
(18, 'UID854936', 'Doctor', 'PAss529908', 1, '2023-04-10 10:20:13'),
(19, 'UID451267', 'Doctor', 'PAss251844', 1, '2023-04-10 10:20:32'),
(20, 'UID980794', 'Doctor', 'PAss270314', 1, '2023-04-10 10:21:05'),
(21, 'UID535576', 'Doctor', 'PAss907225', 1, '2023-04-10 10:21:20'),
(22, 'UID779060', 'Doctor', 'PAss801910', 1, '2023-04-10 10:21:37'),
(23, 'UID751493', 'Doctor', 'PAss878956', 1, '2023-04-10 10:21:48'),
(24, 'UID636327', 'Doctor', 'PAss485679', 1, '2023-04-10 10:23:09'),
(25, 'UID203858', 'User', '', 1, '2023-04-10 11:05:51'),
(26, 'UID564596', 'User', 'MAnoj143@@', 1, '2023-04-10 11:08:12'),
(27, 'UID763689', 'Medical', 'PAss319340', 1, '2023-06-09 17:27:08'),
(28, 'UID529579', 'Medical', 'PAss600747', 1, '2023-06-09 17:27:23'),
(29, 'UID607389', 'Medical', 'PAss866790', 1, '2023-06-09 17:41:17'),
(30, 'UID996173', 'Doctor', 'PAss117845', 1, '2023-06-09 17:42:30'),
(31, 'UID981761', 'Doctor', 'PAss177602', 1, '2023-06-09 17:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `medical_master`
--

CREATE TABLE `medical_master` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `unique_id` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `address` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_master`
--

INSERT INTO `medical_master` (`id`, `first_name`, `last_name`, `email`, `contact`, `unique_id`, `status`, `address`, `created_date`, `image`) VALUES
(5, 'erwdsdas', 'ewtwqe', 'suraj@gmail.comdss', '9787878783', 'UID800087', 1, 'rds', '2021-07-14 13:48:03', 'user/945147.png'),
(6, 'manoj', 'luvhbkj', 'y@ty.ugyh', '6666666666', 'UID198153', 1, 'ytfvgbhj', '2023-04-10 10:11:01', 'user/medical_image.jpg'),
(7, 'Manoj', 'Kumar', 'manojkpajeer127@gmail.com', '7675464564', 'UID763689', 1, 'dsac', '2023-06-09 17:27:08', 'user/medical_image.jpg'),
(8, 'Manoj', 'Kumar', 'manojkpajeer127@gmail.com', '7675464564', 'UID529579', 1, 'dsac', '2023-06-09 17:27:23', 'user/medical_image.jpg'),
(9, 'Jnanima', 'IT Solution', 'jnanimaitsolution@gmail.com', '7676767676', 'UID607389', 1, 'sdaz', '2023-06-09 17:41:17', 'user/medical_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `timings` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL,
  `track_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `medicine_id`, `no_of_days`, `timings`, `date`, `status`, `track_no`) VALUES
(1, 0, 1, '', '2021-07-14 15:42:58', 1, ''),
(2, 1, 1, 'Morning, ', '2021-07-14 16:04:06', 1, '889500'),
(3, 1, 1, 'Morning, Afternoon, ', '2021-07-14 16:04:29', 1, '889500'),
(4, 1, 1, 'Morning, Afternoon, ', '2021-07-14 16:05:22', 1, '889500'),
(5, 1, 1, 'Morning, Afternoon, Night, ', '2021-07-14 16:07:39', 1, '889500'),
(6, 1, 2, 'Morning, ', '2021-07-14 16:12:52', 1, '427441'),
(7, 1, 2, '', '2021-07-14 16:13:09', 1, '468558'),
(8, 1, 2, 'Afternoon, ', '2021-07-14 16:14:40', 1, '468558'),
(9, 1, 2, 'Morning, ', '2021-07-14 16:15:38', 1, '158523'),
(10, 1, 3, 'Afternoon, Night, ', '2021-07-14 16:16:13', 1, '158523'),
(11, 1, 4, 'Afternoon, ', '2021-07-14 16:16:25', 1, '158523'),
(12, 1, 1, 'Morning, ', '2023-02-16 15:37:32', 1, '165276'),
(13, 1, 10, 'Morning, ', '2023-04-09 19:25:25', 1, '886794'),
(14, 1, 2, 'Afternoon, ', '2023-04-09 19:37:48', 1, '450835'),
(15, 1, 1, 'Morning, ', '2023-04-09 20:31:12', 1, '115615'),
(16, 1, 2, 'Afternoon, ', '2023-04-09 20:33:55', 1, '115615'),
(17, 1, 3, 'Morning, ', '2023-04-09 20:35:26', 1, '115615'),
(18, 1, 1, 'Morning, ', '2023-04-09 20:38:04', 1, '270573'),
(19, 1, 1, 'Morning, ', '2023-06-09 23:11:31', 1, '265366'),
(20, 2, 1, 'Afternoon, ', '2023-06-09 23:11:48', 1, '106023'),
(21, 1, 1, 'Morning, ', '2023-06-09 23:15:56', 1, '106023'),
(22, 2, 1, 'Morning, ', '2023-06-09 23:16:20', 1, '266920'),
(23, 2, 1, 'Morning, ', '2023-06-09 23:16:41', 1, '266920'),
(24, 1, 4, 'Morning, ', '2023-06-10 11:19:55', 1, '120463');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_master`
--

CREATE TABLE `medicine_master` (
  `Medicine_id` int(11) NOT NULL,
  `Company_id` int(11) NOT NULL,
  `Medcine_name` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Medicine_status` tinyint(1) NOT NULL,
  `MCreated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `medicine_master`
--

INSERT INTO `medicine_master` (`Medicine_id`, `Company_id`, `Medcine_name`, `Description`, `Medicine_status`, `MCreated_date`) VALUES
(1, 1, 'Dolo', 'sdgsd', 1, '2021-07-14 14:09:22'),
(2, 1, 'Paracitamal', 'qwd', 1, '2023-06-09 17:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `doctor_id` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `track_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `uid`, `doctor_id`, `date`, `status`, `price`, `track_no`) VALUES
(1, 'UID322676', 'UID189070', '2021-07-14 16:01:01', 1, 34, '138561'),
(2, 'UID322676', 'UID189070', '2021-07-14 16:02:09', 1, 435, '889500'),
(3, 'UID322676', 'UID189070', '2021-07-14 16:07:39', 1, 435, '889500'),
(4, 'UID322676', 'UID189070', '2021-07-14 16:12:52', 1, 21, '427441'),
(5, 'UID322676', 'UID189070', '2021-07-14 16:16:26', 1, 5000, '158523'),
(6, 'UID322676', 'UID309669', '2023-04-09 19:25:25', 1, 12, '886794'),
(7, 'UID322676', 'UID309669', '2023-04-09 19:37:48', 0, NULL, '450835'),
(8, 'UID322676', 'UID309669', '2023-04-09 20:31:12', 0, NULL, '115615'),
(9, 'UID322676', 'UID309669', '2023-04-09 20:33:55', 0, NULL, '115615'),
(10, 'UID322676', 'UID309669', '2023-04-09 20:35:26', 0, NULL, '115615'),
(11, 'UID322676', 'UID309669', '2023-04-09 20:38:04', 0, NULL, '270573'),
(12, 'UID322676', 'UID309669', '2023-06-09 23:11:31', 0, NULL, '265366'),
(13, 'UID322676', 'UID309669', '2023-06-09 23:15:56', 0, NULL, '106023'),
(14, 'UID322676', 'UID309669', '2023-06-09 23:16:20', 1, 100, '266920'),
(15, 'UID322676', 'UID309669', '2023-06-09 23:16:41', 1, 100, '266920'),
(16, 'UID322676', 'UID309669', '2023-06-10 11:19:55', 0, NULL, '120463');

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE `state_master` (
  `State_id` int(11) NOT NULL,
  `State_name` varchar(50) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `SCreated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`State_id`, `State_name`, `Status`, `SCreated_date`) VALUES
(1, 'dgs', 1, '2021-07-14 14:12:48'),
(2, 'wesad', 1, '2023-04-09 21:54:54'),
(3, 'qwdas', 1, '2023-06-09 17:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL,
  `unique_id` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL,
  `blood_pressure` varchar(50) DEFAULT NULL,
  `pulse` varchar(50) DEFAULT NULL,
  `blood_group` varchar(50) DEFAULT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `first_name`, `last_name`, `gender`, `email`, `contact`, `date_of_birth`, `created_date`, `status`, `unique_id`, `image`, `blood_pressure`, `pulse`, `blood_group`, `height`, `weight`, `city_id`, `state_id`, `district_id`) VALUES
(1, 'Ajay ', 'Acharf', 'Female', 'suraj@gmail.comdf', '8904652352', '2003-05-07', '2021-07-14 12:50:43', 1, 'UID322676', 'user/photo-1633332755192-727a05c4013d.jfif', '2', '2', 'Choose..', 22, 29, 1, 1, 1),
(2, 'Ajay', 'bt', 'Male', 'ajay@gmail.comd', '8904652353', '2003-05-12', '2021-07-14 12:51:59', 1, 'UID956223', 'user/user_image.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'manoj', 'asd', 'Male', 'manojkpajeer127@gmail.com', '', '2023-04-05', '2023-04-10 11:05:51', 1, 'UID203858', 'user/user_image.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'manoj', 'asd', 'Male', 'manojkpajeer127@gmail.com', '5555555555', '2023-04-05', '2023-04-10 11:08:12', 1, 'UID564596', 'user/user_image.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_master`
--
ALTER TABLE `city_master`
  ADD PRIMARY KEY (`City_id`);

--
-- Indexes for table `company_master`
--
ALTER TABLE `company_master`
  ADD PRIMARY KEY (`Company_id`);

--
-- Indexes for table `complaint_master`
--
ALTER TABLE `complaint_master`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `district_master`
--
ALTER TABLE `district_master`
  ADD PRIMARY KEY (`District_id`);

--
-- Indexes for table `doctor_master`
--
ALTER TABLE `doctor_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_master`
--
ALTER TABLE `login_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_master`
--
ALTER TABLE `medical_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_master`
--
ALTER TABLE `medicine_master`
  ADD PRIMARY KEY (`Medicine_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_master`
--
ALTER TABLE `state_master`
  ADD PRIMARY KEY (`State_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `city_master`
--
ALTER TABLE `city_master`
  MODIFY `City_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_master`
--
ALTER TABLE `company_master`
  MODIFY `Company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complaint_master`
--
ALTER TABLE `complaint_master`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `district_master`
--
ALTER TABLE `district_master`
  MODIFY `District_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor_master`
--
ALTER TABLE `doctor_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `login_master`
--
ALTER TABLE `login_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `medical_master`
--
ALTER TABLE `medical_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `medicine_master`
--
ALTER TABLE `medicine_master`
  MODIFY `Medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `State_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
