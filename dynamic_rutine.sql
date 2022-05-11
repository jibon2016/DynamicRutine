-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 07:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dynamic_rutine`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shift_id` tinyint(4) NOT NULL,
  `running_semister` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `department_id`, `name`, `shift_id`, `running_semister`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'E-71', 1, '10th', 1, NULL, NULL),
(2, 1, 'E-72', 1, '9th', 1, NULL, NULL),
(3, 1, 'E-73', 1, '8th', 1, NULL, NULL),
(4, 1, 'E-74', 1, '8th', 1, NULL, NULL),
(5, 2, 'D-51', 1, '12th', 1, NULL, NULL),
(6, 2, 'D-52', 1, '11th', 1, NULL, NULL),
(7, 2, 'D-53', 1, '10th', 1, NULL, NULL),
(8, 2, 'D-54', 1, '9th', 1, NULL, NULL),
(9, 3, 'D-31', 2, '9th', 1, NULL, NULL),
(10, 3, 'D-32', 2, '7th', 1, NULL, NULL),
(11, 3, 'D-33', 2, '8th', 1, NULL, NULL),
(12, 3, 'D-34', 2, '7th', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_rooms`
--

CREATE TABLE `class_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theory_or_lab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_rooms`
--

INSERT INTO `class_rooms` (`id`, `room_no`, `theory_or_lab`, `active_status`, `created_at`, `updated_at`) VALUES
(1, '101', 'lab', 1, NULL, NULL),
(2, '102', 'lab', 1, NULL, NULL),
(3, '103', 'lab', 1, NULL, NULL),
(4, '104', 'lab', 1, NULL, NULL),
(5, '401', 'theory', 1, NULL, NULL),
(6, '402', 'theory', 1, NULL, NULL),
(7, '403', 'theory', 1, NULL, NULL),
(8, '404', 'theory', 1, NULL, NULL),
(9, '501', 'theory', 1, NULL, NULL),
(10, '502', 'theory', 1, NULL, NULL),
(11, '503', 'theory', 1, NULL, NULL),
(12, '504', 'theory', 1, NULL, NULL),
(13, '601', 'theory', 1, NULL, NULL),
(14, '602', 'theory', 1, NULL, NULL),
(15, '603', 'theory', 1, NULL, NULL),
(16, '604', 'theory', 1, NULL, NULL),
(17, '701', 'theory', 1, NULL, NULL),
(18, '702', 'theory', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 'BSC in CSE', 1, NULL, NULL),
(2, 'BSC in EEE', 1, NULL, NULL),
(3, 'BSC in BBA', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(33, '2022_02_21_040809_create_departments_table', 2),
(34, '2022_02_21_045750_create_seeasons_table', 2),
(35, '2022_02_21_045929_create_batches_table', 2),
(36, '2022_02_21_050152_create_teachers_table', 2),
(37, '2022_02_21_051958_create_class_rooms_table', 2),
(40, '2022_03_19_145722_add_semister_id__subject_table', 2),
(41, '2022_03_19_182039_add_batch_column_running_semister', 3),
(43, '2022_02_21_052045_create_subjects_table', 4),
(45, '2022_02_21_063037_create_subject_teachers_table', 5),
(50, '2022_04_30_190754_create_routine', 6),
(51, '2022_05_05_180625_add_role_in_users_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE `routines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_no` bigint(20) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `priod_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semister` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinator` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `shift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theory_or_lab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cradit` int(11) DEFAULT NULL,
  `room_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_aprove` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routines`
--

INSERT INTO `routines` (`id`, `batch_no`, `department_id`, `teacher_id`, `priod_time`, `priod`, `day`, `subject`, `batch`, `semister`, `coordinator`, `year`, `shift`, `session`, `theory_or_lab`, `cradit`, `room_no`, `lab_no`, `admin_aprove`, `created_at`, `updated_at`) VALUES
(34, 1, 3, 24, 'asdfasd', 'asdfasd', 'asdfasdf', 'asdfas', 'fasdfasd', 'asdfasd', 2, 2022, 'sadfas', 'asdfasdf', 'asdfasdf', 3, 'sadfds', 'asdfasfasd', 1, NULL, '2022-05-06 11:41:03'),
(1059, 20220507002, 1, 4, '09:00-10:20', '1st', 'Sunday', 'CSE-403', 'E-71', '10th', 15, 2022, '1', 'fall', 'theory', 3, '702', NULL, 1, '2022-05-07 08:50:31', '2022-05-07 08:52:40'),
(1060, 20220507002, 1, 19, '10:20-11:50', '2nd', 'Sunday', 'CSE-401', 'E-71', '10th', 15, 2022, '1', 'fall', 'theory', 3, '702', NULL, 1, '2022-05-07 08:50:31', '2022-05-07 08:52:40'),
(1061, 20220507002, 1, 19, '12:50-01:20', '4th', 'Sunday', 'CSE-401', 'E-71', '10th', 15, 2022, '1', 'fall', 'theory', 3, '702', NULL, 1, '2022-05-07 08:50:31', '2022-05-07 08:52:40'),
(1062, 20220507002, 1, NULL, '09:00-10:20', '1st', 'Friday', 'CSE-404', 'E-71', '10th', 15, 2022, '1', 'fall', 'lab', 1, '702', '102', 1, '2022-05-07 08:50:32', '2022-05-07 08:52:40'),
(1063, 20220507002, 1, 18, '12:50-01:20', '4th', 'Friday', 'CSE-402', 'E-71', '10th', 15, 2022, '1', 'fall', 'lab', 1, '702', '102', 1, '2022-05-07 08:50:32', '2022-05-07 08:52:40'),
(1064, 20220507002, 1, 4, '09:00-10:20', '1st', 'Monday', 'CSE-403', 'E-71', '10th', 15, 2022, '1', 'fall', 'theory', 3, '702', NULL, 1, '2022-05-07 08:50:32', '2022-05-07 08:52:40'),
(1065, 20220507002, 1, 19, '10:20-11:50', '2nd', 'Monday', 'CSE-401', 'E-71', '10th', 15, 2022, '1', 'fall', 'theory', 3, '702', NULL, 1, '2022-05-07 08:50:32', '2022-05-07 08:52:40'),
(1066, 20220507002, 1, 4, '12:50-01:20', '4th', 'Monday', 'CSE-403', 'E-71', '10th', 15, 2022, '1', 'fall', 'theory', 3, '702', NULL, 1, '2022-05-07 08:50:32', '2022-05-07 08:52:40'),
(1067, 20220507002, 1, 4, '09:00-10:20', '1st', 'Thursday', 'CSE-309', 'E-72', '9th', 3, 2022, '1', 'fall', 'theory', 3, '404', NULL, 1, '2022-05-07 08:50:32', '2022-05-07 08:52:40'),
(1068, 20220507002, 1, 4, '10:20-11:50', '2nd', 'Thursday', 'CSE-311', 'E-72', '9th', 3, 2022, '1', 'fall', 'theory', 3, '404', NULL, 1, '2022-05-07 08:50:32', '2022-05-07 08:52:40'),
(1069, 20220507002, 1, 4, '12:50-01:20', '4th', 'Thursday', 'CSE-311', 'E-72', '9th', 3, 2022, '1', 'fall', 'theory', 3, '404', NULL, 1, '2022-05-07 08:50:32', '2022-05-07 08:52:40'),
(1070, 20220507002, 1, 24, '09:00-10:20', '1st', 'Monday', 'CSE-312', 'E-72', '9th', 3, 2022, '1', 'fall', 'lab', 1, '404', '101', 1, '2022-05-07 08:50:32', '2022-05-07 08:52:40'),
(1071, 20220507002, 1, 4, '12:50-01:20', '4th', 'Monday', 'CSE-310', 'E-72', '9th', 3, 2022, '1', 'fall', 'lab', 1, '404', '102', 1, '2022-05-07 08:50:32', '2022-05-07 08:52:40'),
(1072, 20220507002, 1, 4, '09:00-10:20', '1st', 'Wednesday', 'CSE-311', 'E-72', '9th', 3, 2022, '1', 'fall', 'theory', 3, '404', NULL, 1, '2022-05-07 08:50:32', '2022-05-07 08:52:40'),
(1073, 20220507002, 1, 4, '10:20-11:50', '2nd', 'Wednesday', 'CSE-309', 'E-72', '9th', 3, 2022, '1', 'fall', 'theory', 3, '404', NULL, 1, '2022-05-07 08:50:32', '2022-05-07 08:52:40'),
(1074, 20220507002, 1, 4, '12:50-01:20', '4th', 'Wednesday', 'CSE-309', 'E-72', '9th', 3, 2022, '1', 'fall', 'theory', 3, '404', NULL, 1, '2022-05-07 08:50:32', '2022-05-07 08:52:40'),
(1075, 20220507002, 1, NULL, '09:00-10:20', '1st', 'Thursday', 'CSE-307', 'E-73', '8th', 4, 2022, '1', 'fall', 'theory', 3, '701', NULL, 1, '2022-05-07 08:50:33', '2022-05-07 08:52:40'),
(1076, 20220507002, 1, 2, '10:20-11:50', '2nd', 'Thursday', 'CSE-305', 'E-73', '8th', 4, 2022, '1', 'fall', 'theory', 3, '701', NULL, 1, '2022-05-07 08:50:33', '2022-05-07 08:52:40'),
(1077, 20220507002, 1, 22, '12:50-01:20', '4th', 'Thursday', 'CSE-202', 'E-73', '8th', 4, 2022, '1', 'fall', 'theory', 4, '701', NULL, 1, '2022-05-07 08:50:33', '2022-05-07 08:52:40'),
(1078, 20220507002, 1, 19, '09:00-10:20', '1st', 'Monday', 'CSE-308', 'E-73', '8th', 4, 2022, '1', 'fall', 'lab', 1, '701', '103', 1, '2022-05-07 08:50:33', '2022-05-07 08:52:40'),
(1079, 20220507002, 1, 1, '12:50-01:20', '4th', 'Monday', 'CSE-306', 'E-73', '8th', 4, 2022, '1', 'fall', 'lab', 1, '701', '102', 1, '2022-05-07 08:50:33', '2022-05-07 08:52:40'),
(1080, 20220507002, 1, 22, '09:00-10:20', '1st', 'Saturday', 'CSE-202', 'E-73', '8th', 4, 2022, '1', 'fall', 'theory', 4, '701', NULL, 1, '2022-05-07 08:50:33', '2022-05-07 08:52:40'),
(1081, 20220507002, 1, NULL, '10:20-11:50', '2nd', 'Saturday', 'CSE-307', 'E-73', '8th', 4, 2022, '1', 'fall', 'theory', 3, '701', NULL, 1, '2022-05-07 08:50:33', '2022-05-07 08:52:40'),
(1082, 20220507002, 1, 2, '12:50-01:20', '4th', 'Saturday', 'CSE-305', 'E-73', '8th', 4, 2022, '1', 'fall', 'theory', 3, '701', NULL, 1, '2022-05-07 08:50:33', '2022-05-07 08:52:40'),
(1083, 20220507002, 1, NULL, '09:00-10:20', '1st', 'Wednesday', 'CSE-307', 'E-73', '8th', 4, 2022, '1', 'fall', 'theory', 3, '701', NULL, 1, '2022-05-07 08:50:33', '2022-05-07 08:52:40'),
(1084, 20220507002, 1, 22, '10:20-11:50', '2nd', 'Wednesday', 'CSE-202', 'E-73', '8th', 4, 2022, '1', 'fall', 'theory', 4, '701', NULL, 1, '2022-05-07 08:50:33', '2022-05-07 08:52:40'),
(1085, 20220507002, 1, 2, '12:50-01:20', '4th', 'Wednesday', 'CSE-305', 'E-73', '8th', 4, 2022, '1', 'fall', 'theory', 3, '701', NULL, 1, '2022-05-07 08:50:33', '2022-05-07 08:52:40'),
(1086, 20220507002, 1, NULL, '09:00-10:20', '1st', 'Thursday', 'CSE-307', 'E-74', '8th', 2, 2022, '1', 'fall', 'theory', 3, '602', NULL, 1, '2022-05-07 08:50:33', '2022-05-07 08:52:40'),
(1087, 20220507002, 1, 18, '10:20-11:50', '2nd', 'Thursday', 'CSE-305', 'E-74', '8th', 2, 2022, '1', 'fall', 'theory', 3, '602', NULL, 1, '2022-05-07 08:50:33', '2022-05-07 08:52:40'),
(1088, 20220507002, 1, 19, '12:50-01:20', '4th', 'Thursday', 'CSE-202', 'E-74', '8th', 2, 2022, '1', 'fall', 'theory', 4, '602', NULL, 1, '2022-05-07 08:50:33', '2022-05-07 08:52:40'),
(1089, 20220507002, 1, 22, '09:00-10:20', '1st', 'Monday', 'CSE-308', 'E-74', '8th', 2, 2022, '1', 'fall', 'lab', 1, '602', '102', 1, '2022-05-07 08:50:34', '2022-05-07 08:52:40'),
(1090, 20220507002, 1, 4, '12:50-01:20', '4th', 'Monday', 'CSE-306', 'E-74', '8th', 2, 2022, '1', 'fall', 'lab', 1, '602', '103', 1, '2022-05-07 08:50:34', '2022-05-07 08:52:40'),
(1091, 20220507002, 1, NULL, '09:00-10:20', '1st', 'Saturday', 'CSE-307', 'E-74', '8th', 2, 2022, '1', 'fall', 'theory', 3, '602', NULL, 1, '2022-05-07 08:50:34', '2022-05-07 08:52:40'),
(1092, 20220507002, 1, 18, '10:20-11:50', '2nd', 'Saturday', 'CSE-305', 'E-74', '8th', 2, 2022, '1', 'fall', 'theory', 3, '602', NULL, 1, '2022-05-07 08:50:34', '2022-05-07 08:52:40'),
(1093, 20220507002, 1, NULL, '12:50-01:20', '4th', 'Saturday', 'CSE-307', 'E-74', '8th', 2, 2022, '1', 'fall', 'theory', 3, '602', NULL, 1, '2022-05-07 08:50:34', '2022-05-07 08:52:40'),
(1094, 20220507002, 1, 19, '09:00-10:20', '1st', 'Wednesday', 'CSE-202', 'E-74', '8th', 2, 2022, '1', 'fall', 'theory', 4, '602', NULL, 1, '2022-05-07 08:50:34', '2022-05-07 08:52:40'),
(1095, 20220507002, 1, 19, '10:20-11:50', '2nd', 'Wednesday', 'CSE-202', 'E-74', '8th', 2, 2022, '1', 'fall', 'theory', 4, '602', NULL, 1, '2022-05-07 08:50:34', '2022-05-07 08:52:40'),
(1096, 20220507002, 1, 18, '12:50-01:20', '4th', 'Wednesday', 'CSE-305', 'E-74', '8th', 2, 2022, '1', 'fall', 'theory', 3, '602', NULL, 1, '2022-05-07 08:50:34', '2022-05-07 08:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `seeasons`
--

CREATE TABLE `seeasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_cradit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semister` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theory_or_lab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `department_id`, `course_name`, `course_code`, `course_cradit`, `semister`, `theory_or_lab`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Programing in Java', 'CSE-202', '4', '8th', 'theory', 1, '2022-03-21 10:30:16', '2022-05-04 11:51:04'),
(2, 2, 'Basic Electronics', 'EEE-201', '4', '2nd', 'theory', 1, '2022-03-21 12:05:45', '2022-03-21 12:05:45'),
(3, 1, 'Introduction to Computer System', 'CSE-101', '3', '1st', 'theory', 1, '2022-03-21 12:29:55', '2022-03-21 12:29:55'),
(4, 1, 'Microprocessor, Microcontroller & Assembly Language', 'CSE-305', '3', '8th', 'theory', 1, '2022-03-21 12:31:42', '2022-03-21 12:31:42'),
(5, 1, 'Microprocessor, Microcontroller & Assembly Language Lab', 'CSE-306', '1', '8th', 'lab', 1, '2022-03-21 12:32:22', '2022-03-21 12:32:22'),
(6, 1, 'Database Management Systems', 'CSE-307', '3', '8th', 'theory', 1, '2022-03-21 12:33:24', '2022-03-21 12:33:24'),
(7, 1, 'Database Management Systems Lab', 'CSE-308', '1', '8th', 'lab', 1, '2022-03-21 12:34:28', '2022-03-21 12:34:28'),
(8, 1, 'System Analaysist', 'CSE-313', '3', '7th', 'theory', 1, '2022-03-21 12:36:24', '2022-05-03 11:33:37'),
(9, 1, 'Operating Systems', 'CSE-309', '3', '9th', 'theory', 1, '2022-03-21 12:38:08', '2022-03-21 12:38:08'),
(10, 1, 'System Analaysist Lab', 'CSE-310', '1', '9th', 'lab', 1, '2022-03-21 12:38:50', '2022-03-21 12:38:50'),
(11, 1, 'Computer Networks', 'CSE-311', '3', '9th', 'theory', 1, '2022-03-21 12:39:29', '2022-03-21 12:39:29'),
(12, 1, 'Computer Networks Lab', 'CSE-312', '1', '9th', 'lab', 1, '2022-03-21 12:40:27', '2022-03-21 12:40:27'),
(13, 1, 'Compiler Design', 'CSE-401', '3', '10th', 'theory', 1, '2022-03-22 00:25:15', '2022-03-22 00:25:15'),
(14, 1, 'Compiler Design Lab', 'CSE-402', '1', '10th', 'lab', 1, '2022-03-22 00:25:58', '2022-03-22 00:25:58'),
(15, 1, 'Peripherals & Interfacing', 'CSE-403', '3', '10th', 'theory', 1, '2022-03-22 00:27:12', '2022-03-22 00:27:12'),
(16, 1, 'Peripherals & Interfacing Lab', 'CSE-404', '1', '10th', 'lab', 1, '2022-03-22 00:27:53', '2022-03-22 00:27:53'),
(17, 3, 'Basic', 'BBA-101', '3', '1st', 'lab', 1, '2022-04-24 11:08:25', '2022-04-24 11:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `subject_teacher`
--

CREATE TABLE `subject_teacher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_teacher`
--

INSERT INTO `subject_teacher` (`id`, `subject_id`, `teacher_id`) VALUES
(1, 13, 18),
(2, 14, 4),
(3, 15, 22),
(5, 13, 19),
(6, 3, 1),
(7, 1, 1),
(12, 12, 1),
(13, 3, 2),
(14, 1, 2),
(15, 5, 2),
(16, 7, 2),
(17, 8, 2),
(18, 9, 2),
(19, 10, 2),
(20, 3, 24),
(21, 4, 24),
(22, 5, 24),
(23, 11, 24),
(24, 12, 24);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `department_id`, `name`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Person CSE 1', 0, NULL, NULL),
(2, 1, 'Person CSE 2', 1, NULL, NULL),
(3, 1, 'Person CSE 3', 1, NULL, NULL),
(4, 1, 'Person CSE 4', 1, NULL, NULL),
(5, 2, 'Person EEE 1', 1, NULL, NULL),
(6, 2, 'Person EEE 2', 0, NULL, NULL),
(7, 2, 'Person EEE 3', 1, NULL, NULL),
(8, 2, 'Person EEE 4', 1, NULL, NULL),
(9, 3, 'Person BBA 1', 1, NULL, NULL),
(10, 3, 'Person BBA 2', 1, NULL, NULL),
(11, 3, 'Person BBA 3', 1, NULL, NULL),
(12, 3, 'Person BBA 4', 1, NULL, NULL),
(15, 1, 'shimul Cse', 1, '2022-03-22 07:56:53', '2022-03-22 07:56:53'),
(16, 1, 'shimul Cse', 1, '2022-03-24 08:32:42', '2022-03-24 08:32:42'),
(17, 1, 'shimul Cse', 1, '2022-03-24 08:32:43', '2022-03-24 08:32:43'),
(18, 1, 'shimul Cse', 1, '2022-03-24 11:30:24', '2022-03-24 11:30:24'),
(19, 1, 'Mahabub Cse', 1, '2022-03-24 11:37:22', '2022-03-24 11:37:22'),
(20, 1, 'Mahabub Cse', 1, '2022-03-24 11:38:06', '2022-03-24 11:38:06'),
(21, 1, 'Mahabub Cse', 1, '2022-03-24 12:14:22', '2022-03-24 12:14:22'),
(22, 1, 'MD. MAHBUBUR RAHMAN', 1, '2022-03-24 12:14:39', '2022-03-24 12:14:39'),
(24, 1, 'Dr. A.T.M. Mahbubur Rahman Sarker', 1, '2022-04-30 12:57:09', '2022-04-30 12:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$yuZOBE42Czj79j5DNoD3fuS1//4qQf1hXL4C0XNB6T0H3duQTOt6S', NULL, 'admin', '2022-02-09 12:50:24', '2022-02-09 12:50:24'),
(2, 'MD. MAHBUBUR RAHMAN', 'mahabub@gmail.com', NULL, '$2y$10$yuZOBE42Czj79j5DNoD3fuS1//4qQf1hXL4C0XNB6T0H3duQTOt6S', NULL, 'teacher', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_rooms`
--
ALTER TABLE `class_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `routines`
--
ALTER TABLE `routines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `routines_department_id_foreign` (`department_id`),
  ADD KEY `routines_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `seeasons`
--
ALTER TABLE `seeasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_department_id_foreign` (`department_id`);

--
-- Indexes for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_teacher_subject_id_foreign` (`subject_id`),
  ADD KEY `subject_teacher_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `class_rooms`
--
ALTER TABLE `class_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routines`
--
ALTER TABLE `routines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1097;

--
-- AUTO_INCREMENT for table `seeasons`
--
ALTER TABLE `seeasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `routines`
--
ALTER TABLE `routines`
  ADD CONSTRAINT `routines_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `routines_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD CONSTRAINT `subject_teacher_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `subject_teacher_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
