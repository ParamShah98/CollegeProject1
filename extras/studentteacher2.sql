-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2016 at 07:55 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentteacher2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `admintype_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `admintype_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2016-11-07 18:56:55', '2016-11-07 18:56:55'),
(44, 5, 2, '2016-12-04 14:32:38', '2016-12-04 14:32:38'),
(46, 6, 11, '2016-12-04 14:36:33', '2016-12-04 14:36:33'),
(52, 3, 2, '2016-12-16 10:49:22', '2016-12-16 10:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `admintypes`
--

CREATE TABLE `admintypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `college_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admintypes`
--

INSERT INTO `admintypes` (`id`, `college_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 'Main Admin', '2016-11-30 08:14:40', '2016-11-30 08:14:40'),
(2, 1, 'SKNCOE', '2016-11-30 08:14:55', '2016-11-30 08:14:55'),
(3, 2, 'SCOE', '2016-11-30 08:17:06', '2016-11-30 08:17:06'),
(4, 3, 'MITCOE', '2016-11-30 03:00:37', '2016-11-30 03:00:37'),
(5, 5, 'COEP', '2016-11-30 03:01:28', '2016-11-30 03:01:28'),
(6, 6, 'AISSMS', '2016-11-30 03:02:05', '2016-11-30 03:02:05'),
(7, 7, 'CUMMINS', '2016-11-30 05:32:18', '2016-11-30 05:32:18'),
(11, 11, 'Wadias', '2016-12-04 04:25:47', '2016-12-04 04:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` int(10) UNSIGNED NOT NULL,
  `college` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `college`, `created_at`, `updated_at`) VALUES
(1, 'SKNCOE', '2016-11-30 08:01:33', '2016-11-30 08:01:33'),
(2, 'SCOE', '2016-11-30 08:01:33', '2016-11-30 08:01:33'),
(3, 'MITCOE', '2016-11-30 03:00:28', '2016-11-30 03:00:28'),
(5, 'COEP', '2016-11-30 03:01:28', '2016-11-30 03:01:28'),
(6, 'AISSMS', '2016-11-30 03:02:05', '2016-11-30 03:02:05'),
(7, 'CUMMINS', '2016-11-30 05:32:18', '2016-11-30 05:32:18'),
(11, 'Wadias', '2016-12-04 04:25:46', '2016-12-04 04:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from_id` int(11) NOT NULL,
  `for_designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `for_id` int(11) NOT NULL,
  `parameter_values` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `for_comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `generalfeedbackcomment_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `from_designation`, `from_id`, `for_designation`, `for_id`, `parameter_values`, `for_comment`, `generalfeedbackcomment_id`, `created_at`, `updated_at`) VALUES
(1, 'student', 1, 'teacher', 1, '0,0,0,0,0,0,0,0,0', 'is khan', 1, '2016-12-17 16:16:39', '2016-12-17 16:16:39'),
(2, 'student', 1, 'teacher', 2, '0,0,0,0,0,0,0,0,0', 'my name', 1, '2016-12-17 16:16:39', '2016-12-17 16:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_parameters`
--

CREATE TABLE `feedback_parameters` (
  `id` int(10) UNSIGNED NOT NULL,
  `parameterName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback_parameters`
--

INSERT INTO `feedback_parameters` (`id`, `parameterName`, `created_at`, `updated_at`) VALUES
(1, 'Knowledge', '2016-12-17 10:12:10', '2016-12-17 10:12:10'),
(2, 'English', '2016-12-17 10:12:10', '2016-12-17 10:12:10'),
(3, 'Class Room Interaction', '2016-12-17 10:13:29', '2016-12-17 10:13:29'),
(4, 'Syllabus Covered in time', '2016-12-17 10:13:29', '2016-12-17 10:13:29'),
(5, 'Teaching Speed', '2016-12-17 10:14:31', '2016-12-17 10:14:31'),
(6, 'Doubts Cleared', '2016-12-17 10:14:31', '2016-12-17 10:14:31'),
(7, 'Teaching Quality', '2016-12-17 10:15:04', '2016-12-17 10:15:04'),
(8, 'Notes', '2016-12-17 10:15:04', '2016-12-17 10:15:04'),
(9, 'BlackBoard Writing', '2016-12-17 10:16:43', '2016-12-17 10:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `generalfeedbackcomments`
--

CREATE TABLE `generalfeedbackcomments` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_id` int(11) NOT NULL,
  `Comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `generalfeedbackcomments`
--

INSERT INTO `generalfeedbackcomments` (`id`, `from_id`, `Comment`, `created_at`, `updated_at`) VALUES
(1, 1, 'and i am not a terrorist', '2016-12-17 16:16:39', '2016-12-17 16:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_11_06_180852_create_students_table', 1),
('2016_11_06_180919_create_teachers_table', 1),
('2016_11_07_073520_create_admins_table', 1),
('2016_11_07_073706_create_admintypes_table', 3),
('2016_11_07_185142_create_studentdbs_table', 1),
('2016_11_07_185159_create_teacherdbs_table', 1),
('2016_11_30_075937_create_colleges_table', 2),
('2016_12_17_100541_create_feedback_parameters_table', 4),
('2016_12_17_200929_create_feedbacks_table', 5),
('2016_12_17_213641_create_generalfeedbackcomments_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentdbs`
--

CREATE TABLE `studentdbs` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `college` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studentdbs`
--

INSERT INTO `studentdbs` (`id`, `email`, `student_code`, `department`, `college`, `created_at`, `updated_at`) VALUES
(31, 'shahparam@yahoo.co.in', 'PARAM123', 'computer', 'SKNCOE', '2016-12-04 03:44:29', '2016-12-04 03:44:29'),
(32, 'yash@yashshah.io', 'YASH123', 'computer', 'SKNCOE', '2016-12-04 03:44:29', '2016-12-04 03:44:29'),
(33, 'ahujarishi@gmail.com', 'RISHI123', 'computer', 'SKNCOE', '2016-12-04 03:44:29', '2016-12-04 03:44:29'),
(34, 'mrunmaipatil@gmail.com', 'MMP123', 'computer', 'SKNCOE', '2016-12-04 03:44:29', '2016-12-04 03:44:29'),
(35, 'shahnived@gmail.com', 'NIVED123', 'computer', 'SKNCOE', '2016-12-04 03:44:29', '2016-12-04 03:44:29'),
(36, 'sammitranade@gmail.com', 'SAMMIT123', 'computer', 'SKNCOE', '2016-12-04 03:44:29', '2016-12-04 03:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parentname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parentnumber` bigint(20) NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `college` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SKNCOE',
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `division` int(11) NOT NULL,
  `roll` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `accredited` tinyint(4) NOT NULL DEFAULT '0',
  `feedback` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `firstname`, `lastname`, `parentname`, `parentnumber`, `gender`, `phone`, `email`, `student_code`, `college`, `department`, `year`, `address`, `division`, `roll`, `accredited`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 1, 'Param', 'Shah', 'Roshan Shah', 9765554705, 'male', 9765555690, 'shahparam@yahoo.co.in', 'PARAM123', 'SKNCOE', 'computer', 'SE', 'D501', 2, '16u269', 1, 0, '2016-11-07 13:25:50', '2016-11-30 03:42:58'),
(2, 2, 'Mrunmai ', 'Patil', 'Dad Patil', 1234567890, 'female', 1234567890, 'mrunmaipatil@gmail.com', 'MMP123', 'SKNCOE', 'computer', 'SE', 'Vadgaon', 2, '16U279', 1, 0, '2016-11-07 13:49:57', '2016-11-07 13:49:57'),
(3, 4, 'Nived', 'Shah', 'Roshan Shah', 9765554705, 'male', 4623654352, 'shahnived@yahoo.com', 'NIVED123', 'SKNCOE', 'mechanical', 'FE', 'ghkg', 3, '16u362', 1, 0, '2016-11-29 12:48:52', '2016-11-29 12:56:46'),
(4, 5, 'Yash', 'Shah', 'abcdef', 1212121212, 'male', 6543210987, 'yash@yashshah.io', 'YASH123', 'SKNCOE', 'computer', 'SE', 'aundh', 2, '16u265', 1, 0, '2016-11-29 12:52:01', '2016-11-29 12:52:01'),
(5, 6, 'Rashi', 'Madane', 'Dad', 1111111111, 'female', 1213456789, 'rashimadane@gmail.com', 'RASHI123', 'Wadias', 'computer', 'SE', 'Viman Nagar', 3, '16u311', 0, 0, '2016-12-04 04:27:12', '2016-12-04 04:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `teacherdbs`
--

CREATE TABLE `teacherdbs` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `college` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacherdbs`
--

INSERT INTO `teacherdbs` (`id`, `email`, `teacher_code`, `department`, `college`, `created_at`, `updated_at`) VALUES
(4, 'vjog@gmail.com', 'JOG123', 'computer', 'SKNCOE', '2016-12-04 03:52:13', '2016-12-04 03:52:13'),
(5, 'priyankatakalkar@gmail.com', 'PRIYANKA123', 'computer', 'SKNCOE', '2016-12-04 03:52:13', '2016-12-04 03:52:13'),
(6, 'shitaldabade@yahoo.com', 'SHITAL123', 'computer', 'SKNCOE', '2016-12-04 03:52:13', '2016-12-04 03:52:13'),
(7, 'saudagarbarde@gmail.com', 'BARDE123', 'computer', 'SKNCOE', '2016-12-04 03:55:38', '2016-12-04 03:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `college` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SKNCOE',
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `interests` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year_assigned` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `divisions_assigned` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `accredited` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `firstname`, `lastname`, `gender`, `phone`, `email`, `teacher_code`, `college`, `department`, `address`, `qualification`, `post`, `subject`, `interests`, `year_assigned`, `divisions_assigned`, `accredited`, `created_at`, `updated_at`) VALUES
(1, 3, 'Vivek', 'Jog', 'male', 9999999999, 'vjog@gmail.com', 'JOG123', 'SKNCOE', 'mechanical', 'abcd', 'btech', 'class teacher', 'OOP', 'OOP', 'SE', '2', 1, '2016-11-07 14:09:46', '2016-11-29 12:43:47'),
(2, 8, 'Test', 'Teacher', 'male', 1234567890, 'abcd@gmail.com', 'tescher123', 'SKNCOE', 'computer', 'adsa', 'sad', 'sadf', 'sub', 'sad', 'SE', '2, 3', 1, '2016-12-17 04:58:48', '2016-12-17 04:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile` tinyint(4) NOT NULL DEFAULT '0',
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `accredited` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `password`, `profile`, `designation`, `accredited`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Param', 'shahparam@yahoo.co.in', '1480593071.jpg', '$2y$10$5sMscCYd0l4A6M.R9DnUIuLQNEgKghE0vN7ivwKQpDwGKXvdVgChC', 1, 'student', 1, 'WCQvzypjVEGcwMnWEC5103stNQl9YYtGelKRBHkEZYzR22P2WDRdyuZlhzDP', '2016-11-07 13:25:11', '2016-12-17 04:57:32'),
(2, 'Mrunmai Patil', 'mrunmaipatil@gmail.com', 'default.jpg', '$2y$10$v1lMA4rKQ1if9utXYJFaX.HOn4f5us3t40j5lWizY4H0rtiwPToKu', 1, 'student', 1, 'IFjuShlB6fbov50fPQZhS85xBlgeTkPSVVWzpYXPE7xpTkGlKcSVh1pZWlVL', '2016-11-07 13:46:33', '2016-11-30 01:54:53'),
(3, 'Vivek Jog', 'vjog@gmail.com', '1480443262.jpg', '$2y$10$5vaoS6UYo.GENgzdDuO1meMCpQKYteJ7w8fw0tpnBOjSV/IPbgMkW', 1, 'teacher', 1, '9v3sk5381e0HfMMk7KmPdcRuFKvgadTwJdQZSIcA18DQrwo1HO7SlzpdbAYG', '2016-11-07 14:08:56', '2016-12-04 04:25:22'),
(4, 'Nived', 'shahnived@yahoo.com', '1480443561.PNG', '$2y$10$0fTVcEqNSErST4952K3eHOiH.Hw/axo27D6c7BBxWlC0uTHrG8TMO', 1, 'student', 1, 'DvaTO5Z6WdaCimkmZ8ZFcZ8DrLwnPVWTB9gWUDIcdOGfY85wfCfFgfz2WOF9', '2016-11-29 12:47:18', '2016-11-29 12:56:46'),
(5, 'Yash', 'yash@yashshah.io', '1480443721.PNG', '$2y$10$mFlB4CexhsNiJlo3dkfNguaxPS0Z.j4bBr5TovRvi4yEkNPnZ7fRa', 1, 'student', 1, 'bJWB8StBcqXOurSiwAocUyBxuQ30vhBD8SwQNefuqlEtHaCJzLN9HFXOVqXw', '2016-11-29 12:51:19', '2016-12-04 14:33:12'),
(6, 'Rashi Madane', 'rashimadane@gmail.com', 'default.jpg', '$2y$10$05YZXJKBhlqdYNCNn2dQ5.f/OFJK59zVC5eZgts7HDb.49H8e4pTC', 1, 'student', 0, 'cZNId6bIG4vpXJHLnntKAwo53xj7kTMwezZVliFAWEmK1NveMZvzy9Go9UBz', '2016-12-04 04:26:13', '2016-12-04 04:32:04'),
(7, 'Barde Saudagar', 'saudagarbarde@google.com', 'default.jpg', '$2y$10$tZsBqE2wBW3Vl23a/wWIdOqTzGHGFGhIS2yZufUnrD.Bh2lMFA.AW', 0, 'teacher', 0, 'Ei54UiTS3oGXBapvfIAfV4z5j7ywWKRR9urrZpITKNcrQzMpZXnfRzxgSZJA', '2016-12-04 04:32:29', '2016-12-04 04:32:40'),
(8, 'Test Teacher', 'abcd@gmail.com', 'default.jpg', '$2y$10$33ZJ/SPWKVb8.PSMTbtMGOE.zP76neRJKDUoeO2uZs04UR9tNLg5W', 1, 'teacher', 0, 'xRgdqt502v9B0Lb2YSIXr2cgEK6A3vATPZ7SRAEdmCyJ2WCnh92ThiYUPJ8z', '2016-12-17 04:58:13', '2016-12-17 04:58:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admintypes`
--
ALTER TABLE `admintypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_parameters`
--
ALTER TABLE `feedback_parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalfeedbackcomments`
--
ALTER TABLE `generalfeedbackcomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD UNIQUE KEY `migration` (`migration`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `studentdbs`
--
ALTER TABLE `studentdbs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentdbs_email_unique` (`email`),
  ADD UNIQUE KEY `studentdbs_student_code_unique` (`student_code`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_phone_unique` (`phone`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_student_code_unique` (`student_code`),
  ADD KEY `students_user_id_index` (`user_id`);

--
-- Indexes for table `teacherdbs`
--
ALTER TABLE `teacherdbs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teacherdbs_email_unique` (`email`),
  ADD UNIQUE KEY `teacherdbs_teacher_code_unique` (`teacher_code`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_phone_unique` (`phone`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`),
  ADD UNIQUE KEY `teachers_teacher_code_unique` (`teacher_code`),
  ADD KEY `teachers_user_id_index` (`user_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `admintypes`
--
ALTER TABLE `admintypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feedback_parameters`
--
ALTER TABLE `feedback_parameters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `generalfeedbackcomments`
--
ALTER TABLE `generalfeedbackcomments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `studentdbs`
--
ALTER TABLE `studentdbs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `teacherdbs`
--
ALTER TABLE `teacherdbs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
