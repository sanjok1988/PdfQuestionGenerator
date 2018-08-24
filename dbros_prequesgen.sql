-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 08, 2018 at 11:06 AM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbros_prequesgen`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `chapter_id` int(10) UNSIGNED NOT NULL,
  `chapter_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`chapter_id`, `chapter_name`, `course_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Testing Chap', 'CC205', '2018-07-16 06:28:59', '2018-07-16 06:28:59', NULL),
(2, 'Hello', 'CC205', '2018-07-16 06:30:52', '2018-07-16 06:30:52', NULL),
(3, 'Nes', 'CC205', '2018-07-16 06:33:29', '2018-07-16 06:33:29', NULL),
(4, 'tesa', 'CC205', '2018-07-16 06:36:18', '2018-07-16 06:36:18', NULL),
(5, 'testing33e43s121', 'CC255', '2018-07-16 06:52:22', '2018-07-29 05:37:47', '2018-07-29 05:37:47'),
(6, 'Hewl', 'CC255', '2018-07-18 00:02:50', '2018-07-18 00:02:50', NULL),
(7, 'Administration', 'CC255', '2018-07-20 01:56:02', '2018-07-20 01:56:02', NULL),
(8, 'Administration', 'CC255', '2018-07-20 01:56:02', '2018-07-20 01:56:02', NULL),
(9, ' The human', 'cc223', '2018-07-30 04:56:42', '2018-07-30 04:56:42', NULL),
(10, 'The computer', 'cc223', '2018-07-30 04:58:29', '2018-07-30 04:58:29', NULL),
(11, 'The interaction', 'cc223', '2018-07-30 04:59:08', '2018-07-30 04:59:08', NULL),
(12, 'Paradigms', 'cc223', '2018-07-30 04:59:19', '2018-07-30 04:59:19', NULL),
(13, 'Advanced Database Managemenst System', 'CC255', '2018-07-31 01:53:42', '2018-07-31 01:53:42', NULL),
(14, 'cryptography', 'CC255', '2018-07-31 01:55:06', '2018-07-31 01:55:06', NULL),
(15, 'Fundamentals of Object-Oriented Programming', 'CC115', '2018-08-06 23:01:11', '2018-08-06 23:01:11', NULL),
(16, 'Java Evolution', 'CC115', '2018-08-06 23:01:27', '2018-08-06 23:01:27', NULL),
(17, 'Overview of Java Language', 'CC115', '2018-08-06 23:01:40', '2018-08-06 23:01:40', NULL),
(18, 'Constants, Variables, and Data Types', 'CC115', '2018-08-06 23:01:56', '2018-08-06 23:01:56', NULL),
(19, 'Operators and Expressions', 'CC115', '2018-08-06 23:02:10', '2018-08-06 23:02:10', NULL),
(20, 'Decision Making and Branching', 'CC115', '2018-08-06 23:02:22', '2018-08-06 23:02:22', NULL),
(21, 'Decision Making and Looping', 'CC115', '2018-08-06 23:02:47', '2018-08-06 23:02:47', NULL),
(22, 'Classes, Objects, and Methods', 'CC115', '2018-08-06 23:03:07', '2018-08-06 23:03:07', NULL),
(23, 'Arrays, Strings, and Vectors', 'CC115', '2018-08-06 23:03:19', '2018-08-06 23:03:19', NULL),
(24, 'Interfaces: Multiple Inheritance', 'CC115', '2018-08-06 23:03:44', '2018-08-06 23:03:44', NULL),
(25, 'Packages: Putting Classes Together', 'CC115', '2018-08-06 23:08:18', '2018-08-06 23:08:18', NULL),
(26, 'Multi-threaded Programming', 'CC115', '2018-08-06 23:08:45', '2018-08-06 23:08:45', NULL),
(27, 'Managing Errors and Exceptions', 'CC115', '2018-08-06 23:09:02', '2018-08-06 23:09:02', NULL),
(28, 'Applet Programming', 'CC115', '2018-08-06 23:09:12', '2018-08-06 23:09:12', NULL),
(29, 'Graphics Programming', 'CC115', '2018-08-06 23:09:27', '2018-08-06 23:09:27', NULL),
(30, 'Managing Input / Output Files in Java', 'CC115', '2018-08-06 23:09:51', '2018-08-06 23:09:51', NULL),
(31, 'Java Collections', 'CC115', '2018-08-06 23:09:58', '2018-08-06 23:09:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_code`, `course_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
('CC115', 'Programming with JAVA', '2018-08-06 23:00:10', '2018-08-06 23:00:10', NULL),
('cc16', 'DBA', '2018-07-20 01:55:27', '2018-07-31 05:23:36', NULL),
('CC205', 'HCI', '2018-07-16 05:58:07', '2018-07-30 02:24:29', '2018-07-30 02:24:29'),
('cc223', 'HCI', '2018-07-30 04:55:58', '2018-07-30 04:55:58', NULL),
('CC255', 'AI1', '2018-07-16 06:52:01', '2018-07-30 05:26:52', NULL),
('da3', '53sw', '2018-07-26 05:23:54', '2018-07-29 05:34:21', '2018-07-29 05:34:21');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(10) UNSIGNED NOT NULL,
  `exam_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `academic_year` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `semester` int(11) NOT NULL,
  `course_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pass_mark` int(3) NOT NULL,
  `full_mark` int(3) NOT NULL,
  `exam_date` date NOT NULL,
  `duration` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_type`, `academic_year`, `semester`, `course_code`, `pass_mark`, `full_mark`, `exam_date`, `duration`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Final', '2017', 7, 'CC205', 35, 100, '2017-05-05', NULL, '2018-07-29 00:22:22', '2018-07-29 00:22:22', NULL),
(2, 'Midterm', '', 7, 'CC205', 35, 100, '2017-05-06', NULL, '2018-07-29 01:04:44', '2018-07-29 01:04:44', NULL),
(3, 'Final', '', 7, 'CC205', 35, 100, '2017-05-05', NULL, '2018-07-29 01:44:48', '2018-07-29 01:44:48', NULL),
(4, 'Mid Term', '', 1, 'CC115', 25, 50, '0000-00-00', NULL, '2018-08-06 23:43:12', '2018-08-06 23:43:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `generated_questions`
--

CREATE TABLE `generated_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `revised_mark` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `generated_questions`
--

INSERT INTO `generated_questions` (`id`, `exam_id`, `question_id`, `revised_mark`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 0, 0, '2018-07-26 07:10:32', '2018-07-26 07:10:32', NULL),
(2, 4, 0, 0, '2018-07-26 07:10:32', '2018-07-26 07:10:32', NULL),
(3, 4, 3, 0, '2018-07-26 07:11:38', '2018-07-26 07:11:38', NULL),
(4, 4, 2, 0, '2018-07-26 07:11:38', '2018-07-26 07:11:38', NULL),
(5, 3, 2, 0, '2018-07-29 01:54:32', '2018-07-29 01:54:32', NULL),
(6, 3, 3, 0, '2018-07-29 01:54:32', '2018-07-29 01:54:32', NULL),
(7, 1, 4, 0, '2018-07-29 03:50:13', '2018-07-29 03:50:13', NULL),
(8, 3, 4, 0, '2018-07-29 03:51:00', '2018-07-29 03:51:00', NULL),
(9, 3, 1, 0, '2018-07-29 04:04:34', '2018-07-29 04:04:34', NULL);

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
('2018_07_15_105157_create_courses_table', 1),
('2018_07_15_111805_create_table_exams', 2);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'Display Role Listing', 'See only Listing Of Role', '2016-09-12 02:32:08', '2016-09-12 02:32:08'),
(2, 'role-create', 'Create Role', 'Create New Role', '2016-09-12 02:32:08', '2016-09-12 02:32:08'),
(3, 'role-edit', 'Edit Role', 'Edit Role', '2016-09-12 02:32:08', '2016-09-12 02:32:08'),
(4, 'role-delete', 'Delete Role', 'Delete Role', '2016-09-12 02:32:08', '2016-09-12 02:32:08'),
(5, 'chapter-list', 'Display chapter Listing', 'See only Listing Of chapters', '2016-09-12 02:32:08', '2016-09-12 02:32:08'),
(6, 'chapter-create', 'Create chapter', 'Create New chapter', '2016-09-12 02:32:08', '2016-09-12 02:32:08'),
(7, 'chapter-edit', 'Edit chapter', 'Edit Item', '2016-09-12 02:32:08', '2016-09-12 02:32:08'),
(8, 'chapter-delete', 'Delete chapter', 'Delete chapter', '2016-09-12 02:32:08', '2016-09-12 02:32:08'),
(9, 'user-list', 'Display Users List', 'Display list of users', NULL, NULL),
(10, 'user-create', 'Create User', 'create new user', NULL, NULL),
(11, 'user-edit', 'Edit User', NULL, NULL, NULL),
(12, 'user-delete', 'Delete User', 'Delete user', NULL, NULL),
(13, 'course-edit', 'Edit Course', 'ability to edit subject', NULL, NULL),
(14, 'course-create', 'Create Course ', 'ability to create new Subject', NULL, NULL),
(15, 'course-delete', 'Delete Course', 'ability to delete course', NULL, NULL),
(16, 'course-list', 'Display course list', 'display list of subjects', NULL, NULL),
(21, 'exam-create', 'Create category', 'Create exam', NULL, NULL),
(22, 'exam-edit', 'Edit Exam', 'edit exam', NULL, NULL),
(23, 'exam-delete', 'Delete Exam', 'delete exam', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(14, 3),
(16, 3),
(21, 4),
(16, 5),
(1, 8),
(2, 8),
(3, 8),
(4, 8),
(5, 8),
(6, 8),
(7, 8),
(8, 8),
(9, 8),
(10, 8),
(11, 8),
(12, 8),
(13, 8),
(14, 8),
(15, 8),
(16, 8),
(17, 8),
(18, 8),
(19, 8),
(20, 8),
(21, 8),
(22, 8),
(23, 8);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `difficulty_level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `assigned_mark` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `course_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `difficulty_level`, `assigned_mark`, `chapter_id`, `course_code`, `question_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '<p>What are the differences between an absolute, a relative,\n  a direct and an indirect input device as defined by Hinckley?\n  Give an example for each.</p>\n', 'normal', 3, 6, 'CC255', 'mcq', '2018-07-18 21:08:07', '2018-07-18 21:08:07', NULL),
(2, '<p>Tohidi et al. claim that \"Testing many is better than testing one\".\n  What concrete evaluation methodology do they argue for - and what\n  advantages do they claim?</p>\n', 'easy', 3, 6, 'CC255', 'saq', '2018-07-18 21:11:32', '2018-07-18 21:11:32', NULL),
(3, '<p>How did Ko et al. define \"end-user software engineering\"?</p>\n', 'easy', 34, 6, 'CC255', 'saq', '2018-07-18 21:33:32', '2018-07-18 21:33:32', NULL),
(4, '<p>What is the difference between nominal, ordinal and quantitative\n  variables?  Give an example of each.?</p>\n', 'difficult', 10, 6, 'CC255', 'laq', '2018-07-18 22:34:32', '2018-07-18 22:34:32', NULL),
(5, '<p>hwelo</p>\r\n', 'difficult', 25, 5, 'CC255', 'mcq', '2018-07-20 01:57:20', '2018-07-20 01:57:20', NULL),
(6, '<pre>\r\nList the core principles of direct manipulation user interfaces.\r\n* Consider two types of mobile UIs: touch-controlled and voice-controlled.\r\n  Which type of interface is more &quot;direct&quot; and why?</pre>\r\n', 'easy', 3, 2, 'CC205', 'saq', '2018-07-29 03:47:59', '2018-07-29 03:47:59', NULL),
(7, '<pre>\r\n Draw the user-system dialog. Where do articulatory and semantic\r\n  distances appear? What is the difference between them? Give a concrete\r\n  example how interfaces may reduce one type of distance.</pre>\r\n', 'normal', 5, 2, 'CC205', 'laq', '2018-07-29 03:48:32', '2018-07-29 03:48:32', NULL),
(8, '<pre>\r\nWhat are computational forms of &quot;wear&quot; and how do they conceptually\r\n  fit into the direct manipulation paradigm?\r\n</pre>\r\n', 'normal', 5, 2, 'CC205', 'laq', '2018-07-29 03:48:56', '2018-07-29 03:48:56', NULL),
(9, '<pre>\r\nDescribe the relationship that should hold in contextual inquiry between\r\nresearcher and subject.</pre>\r\n', 'difficult', 10, 2, 'CC205', 'laq', '2018-07-29 03:49:27', '2018-07-29 03:49:27', NULL),
(10, '<pre>\r\nList the four principles of contextual inquiry (Context, Partnership,\r\nInterpretation, Focus).For each principle, give concrete examples of *how*\r\nit should be applied, and *why* it contributes to understanding of user\r\npractices.</pre>\r\n', 'difficult', 3, 2, 'CC205', 'mcq', '2018-07-29 03:49:50', '2018-07-29 03:49:50', NULL),
(11, '<p>1. The larger the size of key space, the moresecuresa chipher?</p>\r\n\r\n<p>2.Differentiate between virus and trojan horse?</p>\r\n\r\n<p>3. What is weak collision resistance property of hash function?</p>\r\n\r\n<p>4.whatdoes Zn refer to in cryptography?Illustrate wit an example.</p>\r\n\r\n<p>5.What is the additive inverse of 2 in Z10?</p>\r\n\r\n<p>7.john copies mary&#39;s homework. Does it violate confidentiality or integrity or both?justify.</p>\r\n\r\n<p>2.a.what do you mean by &#39;&#39;Fiestel structure for block chiphers&#39;&#39;?Explain.</p>\r\n\r\n<p>3.How can diffie-hellman can be used for hey exchange?Explain .</p>\r\n\r\n<p>4.Encrypt the messege &#39;&#39;machine passedturing test&#39;&#39;to playfair cipher using key.</p>\r\n', 'normal', 10, 14, 'CC255', 'laq', '2018-07-31 02:19:40', '2018-07-31 02:19:40', NULL),
(12, '<p><span style=\"font-size:12px\">What do you think are the major issues facing the software industry today?</span></p>\r\n', 'easy', 2, 15, 'CC115', 'saq', '2018-08-06 23:29:10', '2018-08-06 23:29:10', NULL),
(13, '<p>What do you think are the major issues facing the software industry today?</p>\r\n', 'easy', 2, 15, 'CC115', 'saq', '2018-08-06 23:32:32', '2018-08-06 23:32:32', NULL),
(14, '<p>1. What do you think are the major issues facing the software industry today?</p>\r\n', 'normal', 2, 15, 'CC115', 'saq', '2018-08-06 23:34:33', '2018-08-06 23:34:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'examiner', 'Examiner', 'somebody who has access to all the administration features within a single site. ', NULL, '2018-07-30 01:47:08'),
(3, 'examhead', 'Head Of Department', 'somebody who can publish and manage posts including the posts of other users. ', NULL, '2018-07-30 01:47:25'),
(4, 'supervisor', 'Exam Supervisor', 'somebody who can publish and manage their own posts. ', NULL, '2018-07-30 01:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 3),
(4, 3),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sanjok', 'sanjog.dangol@gmail.com', '$2y$10$RmiC9eXZFnY310lHcUDXXuGUA171.WiNGHwoLHZIfe2DuJZHjvbZ.', 'jQ9sDxNByVp4xN6uMFwDWzvb63XMqmgx7y1pDiv87IWKdmUCP53PAIFLrfr6', NULL, '2017-03-16 02:08:28'),
(4, 'test', 'test@gmail.com', '$2y$10$T2eBJqyAgITo9vk66HcNd.fbuoczzI44WUC.o9.aw1uKKFIDOh21q', 'sryzSMh6MAoCeH8mfCv9mDe7GGU8HtWf2ITTqU8L01Gjm05moduyPbNelXUW', '2017-03-14 02:03:32', '2018-08-07 00:11:15'),
(5, 'Gajendra Kumar Yadav', 'gajendrayadav4118@gmail.com', '$2y$10$kJaVMt.ZsrMz6G86IabVbOXJ8UokZhi4qUrBKF8fMMudn.2f/rrZK', NULL, '2018-07-31 05:22:14', '2018-07-31 05:22:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`chapter_id`),
  ADD KEY `course_code` (`course_code`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `generated_questions`
--
ALTER TABLE `generated_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `chapter_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `generated_questions`
--
ALTER TABLE `generated_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
