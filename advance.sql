-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 08:33 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advance`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_classes`
--

CREATE TABLE `academic_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_classes`
--

INSERT INTO `academic_classes` (`id`, `class_name`, `added_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'One', 1, '2019-04-25 20:33:37', '2019-04-30 17:19:03', 1),
(2, 'Two', 1, '2019-04-26 12:56:45', NULL, 1),
(3, 'Three', 1, '2019-04-28 17:09:34', NULL, 1),
(4, 'Four', 1, '2019-04-30 17:19:21', NULL, 1),
(5, 'Five', 1, '2019-04-30 17:19:28', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `academic_groups`
--

CREATE TABLE `academic_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_groups`
--

INSERT INTO `academic_groups` (`id`, `group_name`, `added_by`, `created_at`, `updated_at`) VALUES
(9, 'General', 1, '2019-04-29 07:08:31', NULL),
(12, 'Science', 1, '2019-04-30 17:22:21', NULL),
(13, 'commerce', 1, '2019-04-30 17:22:44', NULL),
(14, 'Arts & Humanities', 1, '2019-04-30 17:25:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `academic_sections`
--

CREATE TABLE `academic_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_sections`
--

INSERT INTO `academic_sections` (`id`, `class_name`, `section_name`, `added_by`, `created_at`, `updated_at`, `status`) VALUES
(3, '1', 'A', 1, '2019-04-29 06:24:52', NULL, 1),
(4, '1', 'B', 1, '2019-04-29 06:25:00', NULL, 1),
(5, '1', 'C', 1, '2019-04-29 06:28:58', '2019-04-30 17:21:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `academic_subjects`
--

CREATE TABLE `academic_subjects` (
  `class_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int(11) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_subjects`
--

INSERT INTO `academic_subjects` (`class_name`, `subject_name`, `added_by`, `id`, `created_at`, `updated_at`) VALUES
('3', 'Bangla', 1, 6, NULL, NULL),
('3', 'English', 1, 7, NULL, NULL),
('3', 'Math', 1, 8, NULL, NULL),
('1', 'Social Science', 1, 11, NULL, NULL),
('1', 'Arts', 1, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_creates`
--

CREATE TABLE `attendance_creates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rfid_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `class_roll` int(11) DEFAULT NULL,
  `present` int(11) DEFAULT '0',
  `late` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_creates`
--

INSERT INTO `attendance_creates` (`id`, `rfid_no`, `date`, `student_id`, `class_id`, `section_id`, `class_roll`, `present`, `late`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '04/01/2019', 1, 1, 1, 1, 1, 0, 0, '2019-04-27 05:33:18', NULL),
(2, NULL, '04/30/2019', 42, 3, 4, 11113, 1, 0, 0, '2019-04-30 04:58:17', NULL),
(3, NULL, '04/01/2019', 43, 1, 3, 101, 1, 0, 0, '2019-05-01 06:09:30', NULL),
(4, NULL, '04/01/2019', 44, 1, 3, 102, 0, 0, 0, '2019-05-01 06:09:30', NULL),
(5, NULL, '04/01/2019', 45, 1, 3, 10103, 0, 0, 0, '2019-05-01 06:09:30', NULL),
(6, NULL, '04/01/2019', 46, 1, 3, 10104, 0, 0, 0, '2019-05-01 06:09:30', NULL),
(7, NULL, '04/01/2019', 47, 1, 3, 10105, 0, 0, 0, '2019-05-01 06:09:31', NULL),
(8, NULL, '04/01/2019', 48, 1, 3, 10106, 0, 0, 0, '2019-05-01 06:09:31', NULL),
(9, NULL, '05/01/2019', 43, 1, 3, 101, 1, 0, 0, '2019-05-01 06:21:02', NULL),
(10, NULL, '05/01/2019', 44, 1, 3, 102, 0, 0, 0, '2019-05-01 06:21:02', NULL),
(11, NULL, '05/01/2019', 45, 1, 3, 10103, 0, 0, 0, '2019-05-01 06:21:02', NULL),
(12, NULL, '05/01/2019', 46, 1, 3, 10104, 0, 0, 0, '2019-05-01 06:21:02', NULL),
(13, NULL, '05/01/2019', 47, 1, 3, 10105, 0, 0, 0, '2019-05-01 06:21:02', NULL),
(14, NULL, '05/01/2019', 48, 1, 3, 10106, 0, 0, 0, '2019-05-01 06:21:02', NULL),
(15, '79687574648658', '06/01/2019', 43, 1, 3, 101, 0, 0, 0, '2019-05-01 06:27:18', NULL),
(16, '9798685875', '06/01/2019', 44, 1, 3, 102, 0, 0, 0, '2019-05-01 06:27:18', NULL),
(17, '8587574576576', '06/01/2019', 45, 1, 3, 10103, 0, 0, 0, '2019-05-01 06:27:18', NULL),
(18, '91y8998561', '06/01/2019', 46, 1, 3, 10104, 0, 0, 0, '2019-05-01 06:27:19', NULL),
(19, '89798685575', '06/01/2019', 47, 1, 3, 10105, 0, 0, 0, '2019-05-01 06:27:19', NULL),
(20, '868787587557', '06/01/2019', 48, 1, 3, 10106, 0, 0, 0, '2019-05-01 06:27:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_shows`
--

CREATE TABLE `attendance_shows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

CREATE TABLE `guardians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `std_id` int(11) DEFAULT NULL,
  `student_father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_nid_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guardians`
--

INSERT INTO `guardians` (`id`, `std_id`, `student_father_name`, `student_mother_name`, `guardian_phone_no`, `guardian_email`, `guardian_nid_no`, `added_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 43, 'Dhanus Chakrobarty', 'Radha Chakrobarty', '01760092033', 'dhanus@gmail.com', '988757467776', 1, '2019-04-30 17:31:45', NULL, NULL),
(20, 44, 'Rana Fakir', 'Noboni Begum', '01303263592', 'rana@yahoo.com', '96988778587', 1, '2019-04-30 17:35:01', NULL, NULL),
(21, 45, 'Mafiul islam', 'Mousumi Jahan', '01684956606', 'kumar15-5427@diu.edu.bd', '9826969286', 1, '2019-04-30 17:37:12', NULL, NULL),
(22, 46, 'Pitash Kumar Pk', 'Moon Rani Pk', '01774620114', 'kumar15-5427@diu.edu.bd', '8964187874877', 1, '2019-04-30 17:40:04', NULL, NULL),
(23, 47, 'Shams Uddin', 'Rubaba Tarannum', '01621604092', 'kumar15-5427@diu.edu.bd', '796868587587', 1, '2019-04-30 17:42:22', NULL, NULL),
(24, 48, 'Sayem Islam', 'Seuli Tanjin', '01760092033', 'kumar15-5427@diu.edu.bd', '89686876786876', 1, '2019-04-30 17:45:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manage_students`
--

CREATE TABLE `manage_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'students_image/IMG_20181003_004125_083.jpg',
  `dob` date NOT NULL,
  `student_gender` int(11) NOT NULL,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admission_date` date NOT NULL,
  `student_phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_roll` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rfid_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` int(11) NOT NULL,
  `student_present_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_parmanent_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_students`
--

INSERT INTO `manage_students` (`id`, `student_name`, `student_image`, `dob`, `student_gender`, `blood_group`, `admission_date`, `student_phone_no`, `class_name`, `group`, `section`, `class_roll`, `rfid_no`, `religion`, `student_present_address`, `student_parmanent_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(43, 'Soumik Chakroborty', 'students_image/IMG_20181003_004125_083.jpg', '2008-01-02', 1, '1', '2019-01-01', '01521473703', '1', '9', '3', '101', '79687574648658', 1, '74/C, Road No: 14,', 'Kallaynpur', '2019-04-30 17:31:45', NULL, NULL),
(44, 'Shaheb Fakir', 'students_image/IMG_20181003_004125_083.jpg', '2007-02-03', 1, '2', '2019-01-01', '01521473703', '1', '9', '3', '102', '9798685875', 1, '74/C, Road No: 14,', 'Kallaynpur', '2019-04-30 17:35:00', NULL, NULL),
(45, 'Shawon Islam', 'students_image/IMG_20181003_004125_083.jpg', '2008-02-03', 1, '3', '2019-01-01', '01521473703', '1', '9', '3', '10103', '8587574576576', 1, '74/C, Road No: 14,', 'Kallaynpur', '2019-04-30 17:37:12', NULL, NULL),
(46, 'Titas Kumar', 'students_image/IMG_20181003_004125_083.jpg', '2007-09-07', 1, '3', '2019-02-01', '01521473703', '1', '9', '3', '10104', '91y8998561', 1, '74/C, Road No: 14,', 'Kallaynpur', '2019-04-30 17:40:03', NULL, NULL),
(47, 'Suhan Uddin', 'students_image/IMG_20181003_004125_083.jpg', '2006-04-02', 1, '4', '2018-04-02', '01521473703', '1', '9', '3', '10105', '89798685575', 1, '74/C, Road No: 14,', 'Kallaynpur', '2019-04-30 17:42:22', NULL, NULL),
(48, 'Sayma Jabin', 'students_image/IMG_20181003_004125_083.jpg', '2007-09-08', 2, '6', '2019-07-01', '01521473703', '1', '9', '3', '10106', '868787587557', 1, '74/C, Road No: 14,', 'Kallaynpur', '2019-04-30 17:45:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(142, '2019_03_30_165739_create_teachers_table', 2),
(143, '2019_03_31_071750_create_guardians_table', 2),
(144, '2019_03_31_084256_create_manage_students_table', 2),
(145, '2019_04_15_113008_create_academic_classes_table', 2),
(146, '2019_04_15_114324_create_academic_groups_table', 2),
(147, '2019_04_15_114626_create_academic_sections_table', 2),
(148, '2019_04_15_115155_create_academic_subjects_table', 2),
(149, '2019_04_25_195628_create_attendance_creates_table', 2),
(150, '2019_04_25_195822_create_attendance_shows_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$AcHcNj.lRd7/8amiMB03HuZSWDnFqSpY9ZwpQpnVSKwrRrR1bN05m', '2019-04-25 18:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `teacher_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'teachers_image/IMG_20181003_004125_083.jpg',
  `teacher_phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_gender` int(11) NOT NULL,
  `teacher_designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joining_date` date NOT NULL,
  `techer_nid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parmanent_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `teacher_image`, `teacher_phone_no`, `teacher_gender`, `teacher_designation`, `joining_date`, `techer_nid`, `parmanent_address`, `present_address`, `added_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 37, 'teacher_image/qgJrTeGlEGCMkqhSXHQMb50Ky5EJeiAQ8foKlVaU.jpeg', '01521473703', 1, 'Junior Teacher', '2019-04-29', '00877998797977', '74/C, Road No: 14,', '74/C, Road No: 14,, Kallaynpur', 1, '2019-04-29 14:33:24', '2019-04-29 14:33:25', NULL),
(15, 38, 'teacher_image/AWtcsaPiSa9K1WA1LZNNFoA72ylZdYBwK1NUv12V.png', '01521473703', 1, 'Seniour Teacher', '2019-04-29', '00877998797977', '74/C, Road No: 14,', '74/C, Road No: 14,, Kallaynpur', 1, '2019-04-29 15:35:00', '2019-04-29 15:35:00', NULL),
(16, 39, 'teacher_image/0Kd9pbhcYqS8N00fvCRMEkrlpegfJHnSAcWxulvX.jpeg', '01684956606', 1, 'Junior Teacher', '2019-01-01', '66875743763r6', '74/C, Road No: 14,', '74/C, Road No: 14,, Kallaynpur', 1, '2019-04-30 16:52:23', '2019-04-30 16:52:23', NULL),
(17, 40, 'teacher_image/sZMSAvX0vkMvkMQpCOwUOvAGO5P9SzrEwBBYnB8F.jpeg', '01760092033', 1, 'Junior Teacher', '2019-01-01', '52154214421', '74/C, Road No: 14,', '74/C, Road No: 14,, Kallaynpur', 1, '2019-04-30 16:53:43', '2019-04-30 16:53:43', NULL),
(18, 45, 'teacher_image/X5IOgMNCDwSBpsSvnlr5Atf6UwsfCapodITyUrm1.jpeg', '01735113905', 1, 'Head', '2019-01-01', '66463554646', '74/C, Road No: 14,', '74/C, Road No: 14,, Kallaynpur', 1, '2019-04-30 17:16:40', '2019-04-30 17:16:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) DEFAULT '2',
  `user_lang` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `user_lang`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$iXOv8N7.0O5BXezxAeHV2uQ8NbiRhD9LQS0bSQ5Ci5zcFuv7lGN8W', 1, 'en', NULL, '2019-03-29 23:11:21', '2019-03-29 23:11:21'),
(37, 'Pitash Kumar', 'kumar@diu.edu.bd', NULL, '$2y$10$9i7q9uqetkmOf5a3gCCAmOUyL/5KzUE8WWZoAKTaBiKu69Gcb91F.', 2, 'en', NULL, '2019-04-29 14:33:24', '2019-04-29 14:33:24'),
(38, 'Pitash Kumar', 'pitash@gmail.com', NULL, '$2y$10$BM78/yFaNzFDbCAvYXPhWeFXh.fQ9MdjSIjYEd7ZjWB5TjNFx00G2', 2, 'en', NULL, '2019-04-29 15:35:00', '2019-04-29 15:35:00'),
(39, 'Sobayer Abedin Amit', 'abedin15-5371@diu.edu.bd', NULL, '$2y$10$CrM9XTi5mkL9m5iNTcrjmeB9qu.DhMc/BE15g1c7POa1wwg5qQbue', 2, 'en', NULL, '2019-04-30 16:52:23', '2019-04-30 16:52:23'),
(40, 'Shams Uddin', 'shams15-5465@diu.edu.bd', NULL, '$2y$10$RryUonooPDtHqfLtyk1rXOnz8N9y2iojIRNmJIdaT8y2CwIks7gVC', 2, 'en', NULL, '2019-04-30 16:53:43', '2019-04-30 16:53:43'),
(45, 'Mahmudullah', 'makku@gmail.com', NULL, '$2y$10$xxTZo0mr/DS5zgkQqYozj.mA5NPLrE0MOgmle4jNyOLYHxcZm4CFO', 2, 'en', NULL, '2019-04-30 17:16:40', '2019-04-30 17:16:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_classes`
--
ALTER TABLE `academic_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_groups`
--
ALTER TABLE `academic_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_sections`
--
ALTER TABLE `academic_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_subjects`
--
ALTER TABLE `academic_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_creates`
--
ALTER TABLE `attendance_creates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_shows`
--
ALTER TABLE `attendance_shows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardians`
--
ALTER TABLE `guardians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_students`
--
ALTER TABLE `manage_students`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `academic_classes`
--
ALTER TABLE `academic_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `academic_groups`
--
ALTER TABLE `academic_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `academic_sections`
--
ALTER TABLE `academic_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `academic_subjects`
--
ALTER TABLE `academic_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `attendance_creates`
--
ALTER TABLE `attendance_creates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `attendance_shows`
--
ALTER TABLE `attendance_shows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guardians`
--
ALTER TABLE `guardians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `manage_students`
--
ALTER TABLE `manage_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
