-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 03, 2024 at 06:14 AM
-- Server version: 11.3.2-MariaDB
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alms_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_location` int(11) NOT NULL COMMENT '0 = Bangladesh,\r\n1 = India',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `personal_phone` varchar(255) NOT NULL,
  `personal_email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `company_location`, `first_name`, `last_name`, `email`, `password`, `personal_phone`, `personal_email`, `address`, `profile_pic`, `created_at`, `updated_at`) VALUES
(1, 0, 'Sanjay', 'Boss', 'admin@gmail.com', '$2y$12$o7o4diCtcBKv51yAniaVKeztPwJ62VkGx8NZn0/LSstcOW85JwC1G', '12345', 'sss', 'sss', 'sss', '2024-07-14 04:57:43', '2024-07-14 04:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `attendace_date` date NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(255) NOT NULL,
  `company_location` int(11) NOT NULL COMMENT '0 = Bangladesh,\r\n1 = India',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `gender` int(11) NOT NULL COMMENT '0 = Male,\r\n1 = Female',
  `personal_phone` varchar(255) NOT NULL,
  `personal_email` varchar(255) NOT NULL,
  `nid` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 = Deactivated, 1 = Activated',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_employee_id_unique` (`employee_id`),
  UNIQUE KEY `employees_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `company_location`, `first_name`, `last_name`, `email`, `password`, `birthday`, `gender`, `personal_phone`, `personal_email`, `nid`, `address`, `department`, `degree`, `profile_pic`, `status`, `created_at`, `updated_at`) VALUES
(1, '11-001019', 0, 'Gourab', 'Podder', 'aa@gmail.com', '$2y$12$tv3zlqjQVpd1tPGYZzSh4.PtXclHZ9HhJb/c5EDC1uj3uxVVSgGdG', '1996-11-11', 0, '2432423423', 'aa@gmail.com', '5464543456', 'Shantinagar', 'IT', 'Bsc in CSE', 'sss', 1, '2024-02-26 16:08:13', '2024-08-03 10:58:30'),
(2, '11-001012', 0, 'Gourab', 'Podder', 'asa@gmail.com', '$2y$12$UUa5OHRTTHKDRSn.QHWC1OOpDrk31/JC0YPq/JjUj5Vz.MmoG4MUK', '1996-11-11', 0, '2432423423', 'asa@gmail.com', '5464543456', 'Shantinagar', 'IT', 'Bsc in CSE', 'sss', 1, '2024-02-26 16:08:13', '2024-08-03 10:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave`
--

DROP TABLE IF EXISTS `employee_leave`;
CREATE TABLE IF NOT EXISTS `employee_leave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(255) NOT NULL,
  `leave_type` int(11) NOT NULL COMMENT '0 = Sick,\r\n1 = Public,\r\n2 = Casual,\r\n3 = Special,\r\n4 = Earned',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `number_of_days` float NOT NULL,
  `leave_reason` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Pending,\r\n1 = Approved,\r\n2 = Disapproved',
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `e_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

DROP TABLE IF EXISTS `holidays`;
CREATE TABLE IF NOT EXISTS `holidays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `occasion` char(100) DEFAULT NULL,
  `company_location` varchar(10) NOT NULL COMMENT '0 = Bangladesh, 1 = India 	',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `date`, `occasion`, `company_location`) VALUES
(1, '2022-02-21', 'Language Martyrs&#39; Day', '0'),
(2, '2022-02-19', 'Mujib&#39;s Birthday & Children&#39;s Day', '0'),
(3, '2022-04-14', 'Bengali New Year&#39;s Day', '0'),
(4, '2022-05-01', 'May Day', '0'),
(5, '2022-05-02', 'Feast of the Sacrifice (Eid al-Fitr)', '0'),
(6, '2022-05-03', 'Feast of the Sacrifice (Eid al-Fitr)', '0'),
(7, '2022-05-04', 'Feast of the Sacrifice (Eid al-Fitr)', '0'),
(8, '2022-05-15', 'Buddha&#39;s Birthday', '0'),
(9, '2022-07-10', 'Feast of the Sacrifice (Eid al-Adha)', '0'),
(10, '2022-07-11', 'Feast of the Sacrifice (Eid al-Adha)', '0'),
(11, '2022-08-09', 'Day of Ashura', '0'),
(12, '2021-08-15', 'National Mourning Day', '0'),
(13, '2022-08-18', 'Happy Janmashtami', '0'),
(14, '2022-10-05', 'Bijoy Doshomi (Durga Puja)', '0'),
(15, '2022-10-09', 'Birthday of Muhammad (Mawlid)', '0'),
(16, '2022-12-25', 'Christmass Day', '0'),
(44, '1970-01-01', 'Janmasthami', '1'),
(83, '1970-01-01', 'Janmasthami', '1'),
(96, '2022-01-01', 'Newyear', '1'),
(97, '2022-01-26', 'Republic day', '1'),
(98, '2022-05-02', 'Saraswati puja', '1'),
(99, '2022-02-19', 'Chhatrapati Shivaji Jayanti', '1'),
(100, '2022-01-03', 'Maha Shivaratri', '1'),
(101, '2022-03-19', 'Holi', '1'),
(102, '2022-03-18', 'Shab-e-Bharat', '1'),
(103, '2022-02-04', 'Guri Padwa', '1'),
(104, '2022-10-04', 'Ram Navami', '1'),
(105, '2022-04-14', 'Mahavir Jayanti', '1'),
(106, '2022-04-14', 'Dr. Ambedkar Jayanti', '1'),
(107, '2022-04-15', 'Good Friday', '1'),
(108, '2022-04-15', 'Bengali new year', '1'),
(109, '2022-04-29', 'Shab-e- Qadr& Jumat -ul- Wida', '1'),
(110, '2022-01-05', 'May day', '1'),
(111, '2022-01-05', 'Maharashtra day', '1'),
(112, '2022-02-05', 'Feast of the Sacrifice (Eid-al-Fitr)', '1'),
(113, '2022-03-05', 'Feast of the Sacrifice (Eid-al-Fitr)', '1'),
(114, '2022-04-05', 'Feast of the Sacrifice (Eid-al-Fitr)', '1'),
(115, '2022-05-16', 'Buddha Purnima', '1'),
(116, '2022-09-07', 'Id-Ul-Zoha', '1'),
(117, '2022-09-07', 'Bakrid', '1'),
(118, '2022-10-07', 'Feast of the Sacrifice (Eid-al-Adha)', '1'),
(119, '2022-11-07', 'Feast of the sacrifice(Eid-al-Adha)', '1'),
(120, '2022-08-15', 'Independence day', '1'),
(121, '2022-08-16', 'Parshi New Year', '1'),
(123, '2022-08-28', 'Muharram', '1'),
(124, '2022-08-31', 'Ganesh Chaturthi', '1'),
(125, '2022-02-10', 'Gandhi Jayanti', '1'),
(126, '2022-02-10', 'Durga puja Saptami', '1'),
(127, '2022-03-10', 'Durga puja Ashtami', '1'),
(128, '2022-04-10', 'Durga puja Nabami', '1'),
(129, '2022-05-10', 'Durga puja Dashami / Dussehrah', '1'),
(130, '2022-07-10', 'Eid- e- Milad', '1'),
(131, '2022-10-24', 'Diwali', '1'),
(132, '2022-10-24', 'Laxmi puja', '1'),
(133, '2022-08-11', 'Guru Nanak Birth day', '1'),
(134, '2022-12-25', 'Christ mass', '1'),
(135, '2022-08-19', 'Janmasthami', '1'),
(167, '2023-02-21', 'International Mother Language Day', '0'),
(168, '2023-03-08', 'Shab e-Barat', '0'),
(170, '2023-03-26', 'Independence Day', '0'),
(172, '2023-04-19', 'Laylat al-Qadr', '0'),
(175, '2023-04-23', '	Eid ul-Fitr Holiday', '0'),
(176, '2023-05-01', 'May Day', '0'),
(177, '2023-05-04', '	Buddha Purnima', '0'),
(178, '2023-06-28', 'Eid ul-Adha Holiday', '0'),
(179, '2023-06-29', '	Eid ul-Adha', '0'),
(182, '2023-08-15', '	National Mourning Day', '0'),
(183, '2023-09-06', '	Shuba Janmashtami', '0'),
(184, '2023-09-28', '	Eid-e-Milad un-Nabi', '0'),
(185, '2023-10-24', 'Bijoya Dashami', '0'),
(187, '2023-12-25', '	Christmas Day', '0');

-- --------------------------------------------------------

--
-- Stand-in structure for view `holidays_with_day_datediff`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `holidays_with_day_datediff`;
CREATE TABLE IF NOT EXISTS `holidays_with_day_datediff` (
`date` date
,`name_of_day` varchar(9)
,`occasion` char(100)
,`company_location` varchar(10)
,`days_left` int(7)
);

-- --------------------------------------------------------

--
-- Table structure for table `leave_policy`
--

DROP TABLE IF EXISTS `leave_policy`;
CREATE TABLE IF NOT EXISTS `leave_policy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_location` int(11) NOT NULL COMMENT ' 0 = Bangladesh, 1 = India ',
  `sick` int(20) NOT NULL,
  `public` int(20) NOT NULL,
  `casual` int(20) NOT NULL,
  `special` int(20) NOT NULL,
  `earned` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_policy`
--

INSERT INTO `leave_policy` (`id`, `company_location`, `sick`, `public`, `casual`, `special`, `earned`) VALUES
(1, 0, 8, 3, 6, 0, 8),
(2, 1, 8, 6, 8, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

DROP TABLE IF EXISTS `leave_types`;
CREATE TABLE IF NOT EXISTS `leave_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `name`) VALUES
(0, 'Sick'),
(1, 'Halfday'),
(2, 'Public'),
(3, 'Casual'),
(4, 'Special'),
(5, 'Earned');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 3),
(7, '2024_02_26_150714_create_employees_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure for view `holidays_with_day_datediff`
--
DROP TABLE IF EXISTS `holidays_with_day_datediff`;

DROP VIEW IF EXISTS `holidays_with_day_datediff`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `holidays_with_day_datediff`  AS SELECT `holidays`.`date` AS `date`, dayname(`holidays`.`date`) AS `name_of_day`, `holidays`.`occasion` AS `occasion`, `holidays`.`company_location` AS `company_location`, to_days(`holidays`.`date`) - to_days(curdate()) AS `days_left` FROM `holidays` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
