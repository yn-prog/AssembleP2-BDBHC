-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2025 at 03:12 PM
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
-- Database: `assemble-thesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_logs`
--

CREATE TABLE `action_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action_type` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `action_logs`
--

INSERT INTO `action_logs` (`id`, `user_id`, `patient_id`, `action_type`, `details`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 'Edited Record', 'Updated weight and diagnosis', NULL, '2025-07-02 08:01:57', '2025-07-02 08:01:57'),
(2, 4, 2, 'Edited Record', 'Updated weight and diagnosis', NULL, '2025-07-02 08:15:43', '2025-07-02 08:15:43'),
(3, 6, 4, 'Edited Record', 'Updated weight and diagnosis', NULL, '2025-07-02 09:21:52', '2025-07-02 09:21:52'),
(4, 6, 4, 'Edited Record', 'Updated weight and diagnosis', NULL, '2025-07-02 09:36:48', '2025-07-02 09:36:48'),
(5, 1, 1, 'Edited Record', 'Visit purpose changed from \"Dental Check-up\" to \"Medical Consultation\"', NULL, '2025-07-02 09:47:48', '2025-07-02 09:47:48'),
(6, 6, 2, 'Edited Record', 'Given medicine changed from \"Vaccine\" to \"pills\"', NULL, '2025-07-02 09:48:36', '2025-07-02 09:48:36'),
(7, 1, 10, 'Edited Record', 'Date consulted changed from \"2025-07-02\" to \"2025-06-17\"', NULL, '2025-07-02 10:06:10', '2025-07-02 10:06:10'),
(8, 4, 16, 'Edited Record', 'Weight changed from \"54.00\" to \"64.00\", Given medicine changed from \"Random\" to \"Biogesic\"', NULL, '2025-07-02 10:11:14', '2025-07-02 10:11:14'),
(9, 1, 1, 'Edited Record', 'Age changed from \"60 years\" to \"72\"', NULL, '2025-07-02 11:32:38', '2025-07-02 11:32:38'),
(10, 1, 1, 'Edited Record', 'Age changed from \"60 years\" to \"70\", Birth date changed from \"1965-06-16\" to \"1960-07-14\"', NULL, '2025-07-02 11:33:16', '2025-07-02 11:33:16'),
(11, 1, 4, 'Edited Record', 'Age changed from \"4 months\" to \"13\", Birth date changed from \"2025-02-08\" to \"2012-02-08\"', NULL, '2025-07-02 11:35:14', '2025-07-02 11:35:14'),
(12, 1, 9, 'Edited Record', 'Age changed from \"6 days\" to \"432\", Birth date changed from \"2025-06-26\" to \"1999-07-31\"', NULL, '2025-07-02 11:36:03', '2025-07-02 11:36:03'),
(13, 1, 4, 'Edited Record', 'Age changed from \"13 years\" to \"3\", Age unit changed from \"years\" to \"weeks\", Birth date changed from \"2012-02-08\" to \"2025-06-16\"', NULL, '2025-07-02 11:37:53', '2025-07-02 11:37:53'),
(14, 4, 17, 'Edited Record', 'Updated weight and diagnosis', NULL, '2025-07-02 11:56:09', '2025-07-02 11:56:09'),
(15, 1, 18, 'Created Record', 'Added a new record', NULL, '2025-07-02 12:11:00', '2025-07-02 12:11:00'),
(16, 1, 19, 'Created Record', 'Added a new record', NULL, '2025-07-02 12:19:48', '2025-07-02 12:19:48'),
(17, 1, 4, 'Edited Record', 'Age changed from \"2 weeks\" to \"7\"', NULL, '2025-07-02 12:23:31', '2025-07-02 12:23:31'),
(18, 4, 4, 'Edited Record', 'Age changed from \"2 weeks\" to \"3\", Age unit changed from \"weeks\" to \"days\"', NULL, '2025-07-02 12:25:48', '2025-07-02 12:25:48'),
(19, 4, 4, 'Edited Record', 'Age unit changed from \"days\" to \"years\", Birth date changed from \"2025-06-16\" to \"2022-07-13\"', NULL, '2025-07-02 12:26:14', '2025-07-02 12:26:14'),
(20, 4, 20, 'Created Record', 'Added a new record', NULL, '2025-07-02 12:42:25', '2025-07-02 12:42:25'),
(21, 4, 4, 'Edited Record', 'Birth date changed from \"2022-07-13\" to \"2025-07-02\"', NULL, '2025-07-02 12:44:26', '2025-07-02 12:44:26'),
(22, 4, 4, 'Edited Record', 'Birth date changed from \"2025-07-02\" to \"2025-06-30\"', NULL, '2025-07-02 12:45:30', '2025-07-02 12:45:30'),
(23, 1, 4, 'Edited Record', 'Date consulted changed from \"2025-07-02\" to \"2025-07-03\", Street changed from \"P. Martinez St.\" to \"P. Martinez Street\"', NULL, '2025-07-03 10:28:03', '2025-07-03 10:28:03'),
(24, 1, 19, 'Edited Record', 'Visit purpose changed from \"Wound Care\" to \"Child Immunization\", Date consulted changed from \"2025-07-02\" to \"2025-07-03\", Street changed from \"F.Bernardo St.\" to \"V. Fabella Street\"', NULL, '2025-07-03 10:35:25', '2025-07-03 10:35:25'),
(25, 1, 17, 'Edited Record', 'Date consulted changed from \"2025-07-02\" to \"2025-07-03\", Street changed from \"Gomega-I Condominium\" to \"Gomega Condominiums\"', NULL, '2025-07-03 10:36:15', '2025-07-03 10:36:15'),
(26, 1, 9, 'Edited Record', 'Date consulted changed from \"2025-07-02\" to \"2025-07-03\", Street changed from \"Daang Bakal St.\" to \"Sen. Neptali Gonzales Street\"', NULL, '2025-07-03 10:38:08', '2025-07-03 10:38:08'),
(27, 1, 1, 'Edited Record', 'Date consulted changed from \"2025-07-02\" to \"2025-07-03\", Street changed from \"Kalentong St.\" to \"Romualdez Street\"', NULL, '2025-07-03 12:22:51', '2025-07-03 12:22:51'),
(28, 1, 1, 'Edited Record', 'Street changed from \"Romualdez Street\" to \"E. Magalona Street\"', NULL, '2025-07-03 13:16:23', '2025-07-03 13:16:23'),
(29, 1, 21, 'Created Record', 'Added a new record', NULL, '2025-07-03 13:38:53', '2025-07-03 13:38:53'),
(30, 1, 10, 'Edited Record', 'Date consulted changed from \"2025-06-17\" to \"2025-07-03\", Street changed from \"Kalentong St.\" to \"Ochoa Building\"', NULL, '2025-07-03 13:39:22', '2025-07-03 13:39:22'),
(31, 1, 2, 'Edited Record', 'Street changed from \"Gomega-I Condominium\" to \"Gomega Condominiums\"', NULL, '2025-07-03 13:40:14', '2025-07-03 13:40:14'),
(32, 1, 16, 'Edited Record', 'Date consulted changed from \"2025-07-02\" to \"2025-07-03\", Street changed from \"Gomega-I Condominium\" to \"Gomega Condominiums\"', NULL, '2025-07-03 13:40:29', '2025-07-03 13:40:29'),
(33, 1, 3, 'Edited Record', 'Visit purpose changed from \"Wound Care\" to \"Family Planning\", Date consulted changed from \"2025-06-26\" to \"2025-07-03\", Street changed from \"Daang Bakal St.\" to \"Gen.Kalentong Street\"', NULL, '2025-07-03 13:40:49', '2025-07-03 13:40:49'),
(34, 1, 7, 'Edited Record', 'Date consulted changed from \"2025-06-26\" to \"2025-07-03\", Street changed from \"Sen. Neptali Gonzales St.\" to \"P. Martinez Street\"', NULL, '2025-07-03 13:41:05', '2025-07-03 13:41:05'),
(35, 1, 8, 'Edited Record', 'Date consulted changed from \"2025-06-26\" to \"2025-07-03\", Street changed from \"Haig St.\" to \"Gomega Condominiums\"', NULL, '2025-07-03 14:02:06', '2025-07-03 14:02:06'),
(36, 1, 15, 'Edited Record', 'Date consulted changed from \"2025-06-28\" to \"2025-07-03\", Street changed from \"Daang Bakal St.\" to \"Haig Street\"', NULL, '2025-07-03 15:25:29', '2025-07-03 15:25:29'),
(37, 1, 13, 'Edited Record', 'Date consulted changed from \"2025-06-28\" to \"2025-07-03\", Street changed from \"Daang Bakal St.\" to \"Sen. Neptali Gonzales Street\"', NULL, '2025-07-03 15:25:42', '2025-07-03 15:25:42'),
(38, 1, 6, 'Edited Record', 'Date consulted changed from \"2025-07-02\" to \"2025-07-03\", Street changed from \"Daang Bakal St.\" to \"E. Magalona Street\"', NULL, '2025-07-03 15:26:06', '2025-07-03 15:26:06'),
(39, 1, 11, 'Edited Record', 'Date consulted changed from \"2025-07-02\" to \"2025-07-03\", Street changed from \"V. Fabella St.\" to \"P. Martinez Street\"', NULL, '2025-07-03 15:26:23', '2025-07-03 15:26:23'),
(40, 1, 14, 'Edited Record', 'Date consulted changed from \"2025-07-02\" to \"2025-07-03\", Street changed from \"V. Fabella St.\" to \"V. Fabella Street\"', NULL, '2025-07-03 15:26:39', '2025-07-03 15:26:39'),
(41, 1, 14, 'Edited Record', 'Date consulted changed from \"2025-07-03\" to \"2025-07-04\"', NULL, '2025-07-04 08:12:17', '2025-07-04 08:12:17'),
(42, 1, 2, 'Edited Record', 'Date consulted changed from \"2025-07-02\" to \"2025-07-04\"', NULL, '2025-07-04 08:16:39', '2025-07-04 08:16:39'),
(43, 2, 2, 'Edited Record', 'Address changed from \"Gomega\" to \"Block 3\", Street changed from \"Gomega Condominiums\" to \"Romualdez Street\"', NULL, '2025-07-04 08:34:52', '2025-07-04 08:34:52'),
(44, 1, 20, 'Edited Record', 'Visit purpose changed from \"Check-up\" to \"Child Immunization\", Medical diagnosis changed from \"Insomnia\" to \"Acute Gastroenteritis\", Date consulted changed from \"2025-07-02\" to \"2025-07-04\"', NULL, '2025-07-04 09:14:45', '2025-07-04 09:14:45'),
(45, 1, 19, 'Edited Record', 'Date consulted changed from \"2025-07-03\" to \"2025-07-04\", Street changed from \"V. Fabella Street\" to \"F. Bernardo St.\"', NULL, '2025-07-04 09:15:12', '2025-07-04 09:15:12'),
(46, 1, 15, 'Edited Record', 'Date consulted changed from \"2025-07-03\" to \"2025-07-04\", Street changed from \"Haig Street\" to \"P. Martinez Street\"', NULL, '2025-07-04 09:15:34', '2025-07-04 09:15:34'),
(47, 1, 18, 'Edited Record', 'Date consulted changed from \"2025-07-02\" to \"2025-07-04\", Street changed from \"Ochoa Building\" to \"Haig Street\"', NULL, '2025-07-04 09:16:40', '2025-07-04 09:16:40'),
(48, 1, 7, 'Edited Record', 'First name changed from \"Victor\" to \"Victorj\", Date consulted changed from \"2025-07-03\" to \"2025-07-05\"', NULL, '2025-07-05 13:20:43', '2025-07-05 13:20:43'),
(49, 1, NULL, 'Created Record', 'Added a new record', NULL, '2025-07-05 13:38:35', '2025-07-05 13:38:35'),
(50, 1, 23, 'Created Record', 'Added a new record', NULL, '2025-07-08 13:27:16', '2025-07-08 13:27:16'),
(51, 1, 1, 'Edited Record', 'Date consulted changed from \"2025-07-03\" to \"2025-07-08\"', NULL, '2025-07-08 13:31:05', '2025-07-08 13:31:05'),
(52, 3, 17, 'Edited Record', 'Given medicine changed from \"dasda\" to \"Paracetamol\", Date consulted changed from \"2025-07-03\" to \"2025-07-08\"', NULL, '2025-07-08 13:32:55', '2025-07-08 13:32:55'),
(53, 3, 7, 'Edited Record', 'Date consulted changed from \"2025-07-05\" to \"2025-07-08\"', NULL, '2025-07-08 14:22:43', '2025-07-08 14:22:43'),
(54, 1, 24, 'Created Record', 'Added a new record', NULL, '2025-07-09 03:11:39', '2025-07-09 03:11:39'),
(55, 5, 25, 'Created Record', 'Added a new record', NULL, '2025-07-10 15:06:15', '2025-07-10 15:06:15'),
(56, 1, 25, 'Edited Record', 'First name changed from \"qwe\" to \"Gabbi\", Last name changed from \"qwe\" to \"Villafuerte\", Contact number changed from \"42421412412\" to \"092838382\", Birth date changed from \"2025-07-07\" to \"2003-07-31\", Date consulted changed from \"2025-07-10\" to \"2025-07-11\", Street changed from \"P.Martinez Street\" to \"E. Magalona Street\"', NULL, '2025-07-10 17:20:20', '2025-07-10 17:20:20'),
(57, 1, 24, 'Edited Record', 'Visit purpose changed from \"Wound Care\" to \"Dental Check-up\", Medical diagnosis changed from \"Cat bite\" to \"Chickenpox\"', NULL, '2025-07-11 13:39:40', '2025-07-11 13:39:40'),
(58, 1, 17, 'Edited Record', 'Date consulted changed from \"2025-07-08\" to \"2025-07-12\"', NULL, '2025-07-12 09:52:32', '2025-07-12 09:52:32'),
(59, 1, 24, 'Edited Record', 'Date consulted changed from \"2025-07-09\" to \"2025-07-12\"', NULL, '2025-07-12 09:52:55', '2025-07-12 09:52:55'),
(60, 1, 18, 'Edited Record', 'Date consulted changed from \"2025-07-04\" to \"2025-07-12\"', NULL, '2025-07-12 09:57:07', '2025-07-12 09:57:07'),
(61, 1, 24, 'Archived Record', 'Archived this patient record', NULL, '2025-07-13 11:06:16', '2025-07-13 11:06:16'),
(62, 2, 18, 'Archived Record', 'Archived this patient record', NULL, '2025-07-13 11:06:39', '2025-07-13 11:06:39'),
(63, 2, 17, 'Edited Record', 'Visit purpose changed from \"Dental Check-up\" to \"Wound Care\", Medical diagnosis changed from \"Fever\" to \"Cat bite\", Given medicine changed from \"Paracetamol\" to \"ccc\"', NULL, '2025-07-13 11:27:09', '2025-07-13 11:27:09'),
(64, 2, 17, 'Edited Record', 'Date consulted changed from \"2025-07-12\" to \"2025-07-13\"', NULL, '2025-07-13 11:27:19', '2025-07-13 11:27:19'),
(65, 2, 25, 'Edited Record', 'Date consulted changed from \"2025-07-11\" to \"2025-07-13\"', NULL, '2025-07-13 11:28:46', '2025-07-13 11:28:46'),
(66, 2, 14, 'Edited Record', 'Visit purpose changed from \"Child Immunization\" to \"Immunization\", Medical diagnosis changed from \"Acute Bronchitis\" to \"Cough and colds\"', NULL, '2025-07-13 12:08:14', '2025-07-13 12:08:14'),
(67, 2, 19, 'Edited Record', 'Visit purpose changed from \"Child Immunization\" to \"Blood Pressure Monitoring\"', NULL, '2025-07-13 12:08:28', '2025-07-13 12:08:28'),
(68, 2, 4, 'Edited Record', 'Visit purpose changed from \"Child Immunization\" to \"Dental Check-up\"', NULL, '2025-07-13 12:08:46', '2025-07-13 12:08:46'),
(69, 2, 20, 'Edited Record', 'Visit purpose changed from \"Child Immunization\" to \"Check-up\"', NULL, '2025-07-13 12:08:55', '2025-07-13 12:08:55'),
(70, 2, 5, 'Edited Record', 'Visit purpose changed from \"Family Planning\" to \"Check-up\"', NULL, '2025-07-13 12:09:08', '2025-07-13 12:09:08'),
(71, 2, 3, 'Edited Record', 'Visit purpose changed from \"Family Planning\" to \"Check-up\"', NULL, '2025-07-13 12:09:24', '2025-07-13 12:09:24'),
(72, 2, 15, 'Edited Record', 'Visit purpose changed from \"Pre-natal Consultation\" to \"Check-up\"', NULL, '2025-07-13 12:09:39', '2025-07-13 12:09:39'),
(73, 2, 9, 'Edited Record', 'Visit purpose changed from \"Family Planning\" to \"Check-up\"', NULL, '2025-07-13 12:09:49', '2025-07-13 12:09:49'),
(74, 2, 13, 'Edited Record', 'Visit purpose changed from \"Dental Check-up\" to \"Check-up\"', NULL, '2025-07-13 12:10:09', '2025-07-13 12:10:09'),
(75, 2, 8, 'Edited Record', 'Visit purpose changed from \"[\"Dental Check-up\"]\" to \"[\"Check-up\"]\"', NULL, '2025-07-16 06:05:42', '2025-07-16 06:05:42'),
(76, 2, 14, 'Edited Record', 'Visit purpose changed from \"[\"Immunization\"]\" to \"[\"Check-up\"]\"', NULL, '2025-07-16 06:06:08', '2025-07-16 06:06:08'),
(77, 2, 25, 'Edited Record', 'Visit purpose changed from \"[\"Prenatal Check\"]\" to \"[\"Check-up\",\"Wound Care\"]\"', NULL, '2025-07-16 06:06:53', '2025-07-16 06:06:53'),
(78, 2, 1, 'Edited Record', 'Visit purpose changed from \"[\"Medical Consultation\"]\" to \"[\"Check-up\"]\"', NULL, '2025-07-16 06:08:20', '2025-07-16 06:08:20'),
(79, 2, 11, 'Edited Record', 'Visit purpose changed from \"[\"Dental Check-up\"]\" to \"[\"Dental Check-up\",\"Wound Care\"]\"', NULL, '2025-07-16 06:10:14', '2025-07-16 06:10:14'),
(80, 2, 16, 'Edited Record', 'Visit purpose changed from \"[\"Dental Check-up\"]\" to \"[\"Blood Pressure Monitoring\"]\"', NULL, '2025-07-16 06:10:50', '2025-07-16 06:10:50'),
(81, 1, 16, 'Edited Record', 'Date consulted changed from \"2025-07-03\" to \"2025-07-16\"', NULL, '2025-07-16 06:41:24', '2025-07-16 06:41:24'),
(82, 1, 26, 'Created Record', 'Added a new record', NULL, '2025-07-16 07:09:40', '2025-07-16 07:09:40'),
(83, 5, 26, 'Edited Record', 'Given medicine changed from \"\" to \"qwerty\", Street changed from \"P.Martinez Street\" to \"Haig Street\"', NULL, '2025-07-16 11:43:29', '2025-07-16 11:43:29'),
(84, 2, 26, 'Archived Record', 'Archived this patient record', NULL, '2025-07-16 13:07:32', '2025-07-16 13:07:32'),
(85, 1, 27, 'Created Record', 'Added a new record', NULL, '2025-07-19 12:23:07', '2025-07-19 12:23:07'),
(86, 1, 16, 'Edited Record', 'Date consulted changed from \"2025-07-16\" to \"2025-07-19\"', NULL, '2025-07-19 13:58:10', '2025-07-19 13:58:10'),
(87, 1, 16, 'Archived Record', 'Archived this patient record', NULL, '2025-07-19 14:16:12', '2025-07-19 14:16:12'),
(88, 5, 16, 'Edited Record', 'Visit purpose changed from \"[\"Blood Pressure Monitoring\"]\" to \"[\"Prenatal Check\"]\"', NULL, '2025-07-22 13:00:32', '2025-07-22 13:00:32'),
(89, 1, 16, 'Archived Record', 'Archived this patient record', NULL, '2025-07-22 13:34:06', '2025-07-22 13:34:06'),
(90, 5, 33, 'Created Record', 'Added a new record', NULL, '2025-07-22 14:31:26', '2025-07-22 14:31:26'),
(91, 5, 33, 'Edited Record', 'Street changed from \"P.Martinez Street\" to \"P. Martinez Street\"', NULL, '2025-07-22 14:32:01', '2025-07-22 14:32:01'),
(92, 5, 32, 'Edited Record', 'Street changed from \"P.Martinez Street\" to \"Sen. Neptali Gonzales Street\"', NULL, '2025-07-22 14:32:14', '2025-07-22 14:32:14'),
(93, 1, 31, 'Edited Record', 'Visit purpose changed from \"[\"Prenatal Check\"]\" to \"[\"Immunization\"]\", Street changed from \"P.Martinez Street\" to \"J. Tiosejo\"', NULL, '2025-07-22 14:32:47', '2025-07-22 14:32:47'),
(94, 1, 30, 'Edited Record', 'First name changed from \"Kobe\" to \"Januel\", Last name changed from \"Jackson\" to \"Dela Rosa\", Birth date changed from \"1050-09-25\" to \"1950-07-12\", Street changed from \"P.Martinez Street\" to \"Gomega Condominiums\"', NULL, '2025-07-22 14:33:19', '2025-07-22 14:33:19'),
(95, 1, 31, 'Edited Record', 'Birth date changed from \"1050-09-25\" to \"1999-11-25\"', NULL, '2025-07-22 14:33:37', '2025-07-22 14:33:37'),
(96, 1, 32, 'Edited Record', 'First name changed from \"Kobe\" to \"Carlo\", Last name changed from \"Jackson\" to \"Palad\", Visit purpose changed from \"[\"Prenatal Check\"]\" to \"[\"Blood Pressure Monitoring\"]\", Birth date changed from \"1050-09-25\" to \"2001-08-29\"', NULL, '2025-07-22 14:34:07', '2025-07-22 14:34:07'),
(97, 1, 31, 'Edited Record', 'First name changed from \"Kobe\" to \"Carlo\", Last name changed from \"Jackson\" to \"Palad\"', NULL, '2025-07-22 14:34:25', '2025-07-22 14:34:25'),
(98, 1, 32, 'Edited Record', 'First name changed from \"Carlo\" to \"Barlo\"', NULL, '2025-07-22 14:34:37', '2025-07-22 14:34:37'),
(99, 1, 29, 'Edited Record', 'First name changed from \"Kobe\" to \"Crystal\", Last name changed from \"Jackson\" to \"Palad\", Street changed from \"P.Martinez Street\" to \"J. Tiosejo\"', NULL, '2025-07-22 14:35:06', '2025-07-22 14:35:06'),
(100, 1, 33, 'Edited Record', 'First name changed from \"Kobe\" to \"Raf\", Last name changed from \"Jackson\" to \"Polo\"', NULL, '2025-07-22 14:35:34', '2025-07-22 14:35:34'),
(101, 1, 28, 'Edited Record', 'Birth date changed from \"1050-09-25\" to \"1960-07-22\", Street changed from \"P.Martinez Street\" to \"Gen.Kalentong Street\"', NULL, '2025-07-22 14:35:51', '2025-07-22 14:35:51'),
(102, 1, 33, 'Edited Record', 'Birth date changed from \"1050-09-25\" to \"2000-06-30\"', NULL, '2025-07-22 14:38:42', '2025-07-22 14:38:42'),
(103, 1, 29, 'Edited Record', 'Birth date changed from \"1050-09-25\" to \"1988-07-14\"', NULL, '2025-07-22 14:38:59', '2025-07-22 14:38:59'),
(104, 1, 29, 'Edited Record', 'Street changed from \"J. Tiosejo\" to \"P. Martinez Street\"', NULL, '2025-07-22 14:56:17', '2025-07-22 14:56:17'),
(105, 1, 1, 'Edited Record', 'Street changed from \"E. Magalona Street\" to \"Ochoa Building\"', NULL, '2025-07-22 14:56:50', '2025-07-22 14:56:50'),
(106, 1, 34, 'Created Record', 'Added a new record', NULL, '2025-07-29 02:00:29', '2025-07-29 02:00:29'),
(107, 1, 35, 'Created Record', 'Added a new record', NULL, '2025-07-29 02:02:04', '2025-07-29 02:02:04'),
(108, 1, 36, 'Created Record', 'Added a new record', NULL, '2025-07-29 02:03:30', '2025-07-29 02:03:30'),
(109, 1, 35, 'Edited Record', 'Street changed from \"P.Martinez Street\" to \"P. Martinez Street\"', NULL, '2025-07-29 02:27:16', '2025-07-29 02:27:16'),
(110, 1, 34, 'Edited Record', 'Street changed from \"P.Martinez Street\" to \"P. Martinez Street\"', NULL, '2025-07-29 02:27:44', '2025-07-29 02:27:44'),
(111, 1, 4, 'Edited Record', 'Date consulted changed from \"2025-07-03\" to \"2025-07-29\"', NULL, '2025-07-29 02:44:12', '2025-07-29 02:44:12'),
(112, 1, 37, 'Created Record', 'Added a new record', NULL, '2025-07-29 03:05:44', '2025-07-29 03:05:44'),
(113, 2, 16, 'Archived Record', 'Archived this patient record', NULL, '2025-07-29 07:25:24', '2025-07-29 07:25:24'),
(114, 1, 38, 'Created Record', 'Added a new record', NULL, '2025-07-29 15:34:56', '2025-07-29 15:34:56'),
(115, 1, 39, 'Created Record', 'Added a new record', NULL, '2025-07-29 15:44:00', '2025-07-29 15:44:00'),
(116, 1, 4, 'Edited Record', 'Blood type changed from \"\" to \"B-\"', NULL, '2025-07-29 15:48:56', '2025-07-29 15:48:56'),
(117, 1, 40, 'Created Record', 'Added a new record', NULL, '2025-07-29 16:08:56', '2025-07-29 16:08:56'),
(118, 1, 40, 'Edited Record', 'Philhealth number changed from \"12-2323232-32\" to \"13-42424242-41\"', NULL, '2025-07-29 16:13:04', '2025-07-29 16:13:04'),
(119, 1, 41, 'Created Record', 'Added a new record', NULL, '2025-07-29 16:14:48', '2025-07-29 16:14:48'),
(120, 1, 40, 'Edited Record', 'Status changed from \"Cleared\" to \"Under Treatment\"', NULL, '2025-07-29 17:00:21', '2025-07-29 17:00:21'),
(121, 1, 4, 'Edited Record', 'Status changed from \"Under Treatment\" to \"Cleared\"', NULL, '2025-07-29 17:00:33', '2025-07-29 17:00:33'),
(122, 1, 4, 'Edited Record', 'Status changed from \"Cleared\" to \"Under Treatment\"', NULL, '2025-07-29 17:01:04', '2025-07-29 17:01:04'),
(123, 1, 4, 'Edited Record', 'Status changed from \"Under Treatment\" to \"Cleared\"', NULL, '2025-07-29 17:01:25', '2025-07-29 17:01:25'),
(124, 1, 38, 'Edited Record', 'Status changed from \"Under Treatment\" to \"Cleared\"', NULL, '2025-07-29 17:01:47', '2025-07-29 17:01:47'),
(125, 1, 38, 'Edited Record', 'Visit purpose changed from \"[\"Prenatal Check\"]\" to \"[\"Check-up\"]\", Given medicine changed from \"123\" to \"Paracetamol\", Date consulted changed from \"2025-07-29\" to \"2025-08-04\", Status changed from \"Cleared\" to \"Under Treatment\"', NULL, '2025-08-04 06:53:19', '2025-08-04 06:53:19'),
(126, 1, 38, 'Edited Record', 'Blood type changed from \"\" to \"A+\"', NULL, '2025-08-04 07:15:29', '2025-08-04 07:15:29'),
(127, 1, 38, 'Edited Record', 'Philhealth number changed from \"\" to \"12-2323242-42\"', NULL, '2025-08-04 07:35:36', '2025-08-04 07:35:36'),
(128, 4, 34, 'Edited Record', 'Visit purpose changed from \"[\"Immunization\"]\" to \"[\"Dental Check-up\"]\"', NULL, '2025-08-04 10:44:19', '2025-08-04 10:44:19'),
(129, 5, 42, 'Created Record', 'Added a new record', NULL, '2025-08-04 13:14:15', '2025-08-04 13:14:15'),
(130, 1, 4, 'Edited Record', 'Status changed from \"Cleared\" to \"Under Treatment\"', NULL, '2025-08-08 04:47:05', '2025-08-08 04:47:05'),
(131, 1, 41, 'Edited Record', 'Status changed from \"Cleared\" to \"Under Treatment\"', NULL, '2025-08-08 04:51:51', '2025-08-08 04:51:51'),
(132, 1, 41, 'Edited Record', 'Given medicine changed from \"\" to \"333\"', NULL, '2025-08-08 04:59:32', '2025-08-08 04:59:32'),
(133, 1, 1, 'Edited Record', 'Updated patient record', NULL, '2025-08-08 05:09:12', '2025-08-08 05:09:12'),
(134, 1, 1, 'Edited Record', 'Updated patient record', NULL, '2025-08-08 05:12:08', '2025-08-08 05:12:08'),
(135, 1, NULL, 'Created Record', 'Added a new record', NULL, '2025-08-08 05:20:09', '2025-08-08 05:20:09'),
(136, 1, 1, 'Edited Record', 'Updated patient record', NULL, '2025-08-11 12:37:07', '2025-08-11 12:37:07'),
(137, 2, 1, 'Archived Record', 'Archived this patient record', NULL, '2025-08-18 06:52:32', '2025-08-18 06:52:32'),
(138, 3, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 08:01:47', '2025-08-18 08:01:47'),
(139, 3, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 08:02:10', '2025-08-18 08:02:10'),
(140, 3, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 08:08:07', '2025-08-18 08:08:07'),
(141, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 08:12:34', '2025-08-18 08:12:34'),
(142, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 08:22:30', '2025-08-18 08:22:30'),
(143, 4, NULL, 'Edited Record', 'Updated patient record for Joshua Anoos', NULL, '2025-08-18 08:42:13', '2025-08-18 08:42:13'),
(144, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 09:01:43', '2025-08-18 09:01:43'),
(145, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 09:08:11', '2025-08-18 09:08:11'),
(146, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 09:18:27', '2025-08-18 09:18:27'),
(147, 3, NULL, 'Viewed Records List', 'Accessed patient records index with 39 records visible', NULL, '2025-08-18 09:45:25', '2025-08-18 09:45:25'),
(148, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 09:47:23', '2025-08-18 09:47:23'),
(149, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 09:47:42', '2025-08-18 09:47:42'),
(150, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 09:48:49', '2025-08-18 09:48:49'),
(151, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 09:50:18', '2025-08-18 09:50:18'),
(152, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 09:53:10', '2025-08-18 09:53:10'),
(153, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 09:53:27', '2025-08-18 09:53:27'),
(154, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 09:56:22', '2025-08-18 09:56:22'),
(155, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 09:56:32', '2025-08-18 09:56:32'),
(156, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 09:56:40', '2025-08-18 09:56:40'),
(157, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 09:57:14', '2025-08-18 09:57:14'),
(158, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 10:01:34', '2025-08-18 10:01:34'),
(159, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 10:01:41', '2025-08-18 10:01:41'),
(160, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 10:01:44', '2025-08-18 10:01:44'),
(161, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 10:09:08', '2025-08-18 10:09:08'),
(162, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 10:09:32', '2025-08-18 10:09:32'),
(163, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 10:10:46', '2025-08-18 10:10:46'),
(164, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 10:14:03', '2025-08-18 10:14:03'),
(165, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 10:16:28', '2025-08-18 10:16:28'),
(166, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 10:17:09', '2025-08-18 10:17:09'),
(167, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 10:19:44', '2025-08-18 10:19:44'),
(168, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 10:21:41', '2025-08-18 10:21:41'),
(169, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 10:22:07', '2025-08-18 10:22:07'),
(170, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 10:43:52', '2025-08-18 10:43:52'),
(171, 3, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 10:51:02', '2025-08-18 10:51:02'),
(172, 3, NULL, 'Created Record', 'Added a new encrypted patient record', NULL, '2025-08-18 10:52:33', '2025-08-18 10:52:33'),
(173, 3, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-18 10:52:33', '2025-08-18 10:52:33'),
(174, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 01:30:02', '2025-08-19 01:30:02'),
(175, 1, NULL, 'Edited Record', 'Updated patient record', NULL, '2025-08-19 01:30:49', '2025-08-19 01:30:49'),
(176, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 01:30:49', '2025-08-19 01:30:49'),
(177, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 01:30:54', '2025-08-19 01:30:54'),
(178, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 01:30:56', '2025-08-19 01:30:56'),
(179, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 01:31:01', '2025-08-19 01:31:01'),
(180, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 01:31:29', '2025-08-19 01:31:29'),
(181, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 01:32:43', '2025-08-19 01:32:43'),
(182, 1, NULL, 'Edited Record', 'Updated patient record', NULL, '2025-08-19 01:33:13', '2025-08-19 01:33:13'),
(183, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 01:33:13', '2025-08-19 01:33:13'),
(184, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 01:45:05', '2025-08-19 01:45:05'),
(185, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 01:46:37', '2025-08-19 01:46:37'),
(186, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 04:47:29', '2025-08-19 04:47:29'),
(187, 2, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 06:04:28', '2025-08-19 06:04:28'),
(188, 2, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 06:06:04', '2025-08-19 06:06:04'),
(189, 2, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 06:12:25', '2025-08-19 06:12:25'),
(190, 2, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 06:13:02', '2025-08-19 06:13:02'),
(191, 2, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 06:15:35', '2025-08-19 06:15:35'),
(192, 2, 41, 'Archived Record', NULL, NULL, '2025-08-19 06:19:42', '2025-08-19 06:19:42'),
(193, 2, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 06:19:42', '2025-08-19 06:19:42'),
(194, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 06:28:57', '2025-08-19 06:28:57'),
(195, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 06:31:05', '2025-08-19 06:31:05'),
(196, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 07:21:16', '2025-08-19 07:21:16'),
(197, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 07:21:21', '2025-08-19 07:21:21'),
(198, 2, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 07:21:58', '2025-08-19 07:21:58'),
(199, 2, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 07:22:09', '2025-08-19 07:22:09'),
(200, 2, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 07:26:06', '2025-08-19 07:26:06'),
(201, 2, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 07:29:43', '2025-08-19 07:29:43'),
(202, 2, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 07:30:35', '2025-08-19 07:30:35'),
(203, 2, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 07:30:35', '2025-08-19 07:30:35'),
(204, 2, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 07:48:04', '2025-08-19 07:48:04'),
(205, 2, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 07:48:30', '2025-08-19 07:48:30'),
(206, 4, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 07:49:42', '2025-08-19 07:49:42'),
(207, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 15:31:58', '2025-08-19 15:31:58'),
(208, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 15:34:51', '2025-08-19 15:34:51'),
(209, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 15:35:17', '2025-08-19 15:35:17'),
(210, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 15:38:21', '2025-08-19 15:38:21'),
(211, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 15:42:44', '2025-08-19 15:42:44'),
(212, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 15:43:47', '2025-08-19 15:43:47'),
(213, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 15:44:16', '2025-08-19 15:44:16'),
(214, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 15:44:20', '2025-08-19 15:44:20'),
(215, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 15:44:28', '2025-08-19 15:44:28'),
(216, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 15:46:23', '2025-08-19 15:46:23'),
(217, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 15:46:33', '2025-08-19 15:46:33'),
(218, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 16:20:56', '2025-08-19 16:20:56'),
(219, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 16:21:01', '2025-08-19 16:21:01'),
(220, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 16:31:59', '2025-08-19 16:31:59'),
(221, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 16:39:15', '2025-08-19 16:39:15'),
(222, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 16:42:52', '2025-08-19 16:42:52'),
(223, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 16:56:49', '2025-08-19 16:56:49'),
(224, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 16:57:42', '2025-08-19 16:57:42'),
(225, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 17:09:41', '2025-08-19 17:09:41'),
(226, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 17:10:08', '2025-08-19 17:10:08'),
(227, 1, NULL, 'Edited Record', 'Updated patient record', NULL, '2025-08-19 17:10:37', '2025-08-19 17:10:37'),
(228, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 17:10:38', '2025-08-19 17:10:38'),
(229, 1, NULL, 'Created Record', 'Added a new encrypted patient record', NULL, '2025-08-19 17:12:37', '2025-08-19 17:12:37'),
(230, 1, NULL, 'Viewed Records List', 'Accessed patient records index with 10 records visible', NULL, '2025-08-19 17:12:37', '2025-08-19 17:12:37'),
(231, 1, 46, 'Created Record', 'Added a new record', NULL, '2025-08-19 17:16:22', '2025-08-19 17:16:22'),
(232, 1, 42, 'Edited Record', 'Updated patient record', NULL, '2025-08-19 17:20:10', '2025-08-19 17:20:10'),
(233, 1, 42, 'Edited Record', 'Updated patient record', NULL, '2025-08-19 17:46:29', '2025-08-19 17:46:29'),
(234, 1, 42, 'Edited Record', 'Updated patient record', NULL, '2025-08-19 18:52:55', '2025-08-19 18:52:55'),
(235, 1, 47, 'Created Record', 'Added a new record', NULL, '2025-08-23 15:25:45', '2025-08-23 15:25:45'),
(236, 1, 47, 'Edited Record', 'Updated patient record', NULL, '2025-08-27 06:28:11', '2025-08-27 06:28:11'),
(237, 1, 48, 'Created Record', 'Added a new record', NULL, '2025-09-03 08:26:59', '2025-09-03 08:26:59'),
(238, 1, 49, 'Created Record', 'Added a new record', NULL, '2025-09-03 08:27:00', '2025-09-03 08:27:00'),
(239, 1, 50, 'Created Record', 'Added a new record', NULL, '2025-09-03 08:28:11', '2025-09-03 08:28:11'),
(240, 1, 51, 'Created Record', 'Added a new record', NULL, '2025-09-03 08:28:11', '2025-09-03 08:28:11'),
(241, 1, 50, 'Edited Record', 'Updated patient record', NULL, '2025-09-03 08:29:48', '2025-09-03 08:29:48'),
(242, 1, 49, 'Edited Record', 'Updated patient record', NULL, '2025-09-03 08:33:59', '2025-09-03 08:33:59'),
(243, 1, 52, 'Created Record', 'Added a new record', NULL, '2025-09-03 08:42:22', '2025-09-03 08:42:22'),
(244, 1, 53, 'Created Record', 'Added a new record', NULL, '2025-09-06 07:50:23', '2025-09-06 07:50:23'),
(245, 1, 41, 'Edited Record', 'Updated patient record', NULL, '2025-09-07 13:39:33', '2025-09-07 13:39:33'),
(246, 1, 41, 'Edited Record', 'Updated patient record', NULL, '2025-09-07 14:23:54', '2025-09-07 14:23:54'),
(247, 1, 41, 'Archived Record', 'Archived this patient record', NULL, '2025-09-07 14:26:14', '2025-09-07 14:26:14'),
(248, 1, 41, 'Archived Record', 'Archived this patient record', NULL, '2025-09-07 14:30:13', '2025-09-07 14:30:13'),
(249, 1, 41, 'Archived Record', 'Archived this patient record', NULL, '2025-09-07 14:31:02', '2025-09-07 14:31:02'),
(250, 1, 16, 'Archived Record', 'Archived this patient record', NULL, '2025-09-07 14:31:05', '2025-09-07 14:31:05'),
(251, 1, 16, 'Edited Record', 'Updated patient record', NULL, '2025-09-07 14:40:45', '2025-09-07 14:40:45'),
(252, 1, 16, 'Edited Record', 'Updated patient record', NULL, '2025-09-08 12:36:32', '2025-09-08 12:36:32'),
(253, 1, 16, 'Edited Record', 'Updated patient record', NULL, '2025-09-08 12:36:47', '2025-09-08 12:36:47'),
(254, 4, 16, 'Edited Record', 'Updated patient record', NULL, '2025-09-13 08:19:25', '2025-09-13 08:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_area_settings`
--

CREATE TABLE `case_area_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `min_cases` int(11) NOT NULL,
  `max_cases` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_area_settings`
--

INSERT INTO `case_area_settings` (`id`, `type`, `min_cases`, `max_cases`, `created_at`, `updated_at`) VALUES
(1, 'high', 15, 100000, '2025-07-10 08:47:09', '2025-09-07 12:10:47'),
(2, 'medium', 6, 11, '2025-07-10 08:47:09', '2025-09-07 12:12:20'),
(3, 'low', 1, 4, '2025-07-10 08:47:09', '2025-07-10 09:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE `diagnoses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diagnosis_name` varchar(255) NOT NULL,
  `visible_to_roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`visible_to_roles`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnoses`
--

INSERT INTO `diagnoses` (`id`, `diagnosis_name`, `visible_to_roles`, `created_at`, `updated_at`) VALUES
(1, 'Dengue', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:34'),
(2, 'Flu', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:34'),
(3, 'Chickenpox', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:34'),
(4, 'Diarrhea', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:34'),
(5, 'Headache', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:34'),
(6, 'Fever', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:34'),
(7, 'Hypertension', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:34'),
(8, 'Essentially Well', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:34'),
(9, 'Hypertension; CKD', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:34'),
(10, 'URTI', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:34'),
(11, 'Skin Infection', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:34'),
(12, 'Infected Wound', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:34'),
(13, 'Acid Peptic Ulcer Disease', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-09-13 06:08:51'),
(14, 'PTB Suspect', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:34'),
(15, 'UTI', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:34'),
(16, 'Eye Irritation', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:34'),
(17, 'ANP', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:34'),
(18, 'PTB', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(19, 'Carbuncle', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(20, 'Varicella', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(21, 'Gout', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(22, 'Cellulitis', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(23, 'Hypersensitivity', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(24, 'Molluscum Contagiosum', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(25, 'Lactose Intolerance', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(26, 'Allergic Rhinitis', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(27, 'PCAP-A', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(28, 'Insect Bite', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(29, 'Systemic Viral Illness', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(30, 'Allergic Cough', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(31, 'Maxillary Abscess', '[\"dentist\"]', '2025-07-16 05:03:36', '2025-08-04 10:26:12'),
(32, 'URTI Viral', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(33, 'Fungal Infection', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(34, 'Acute Bronchitis', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(35, 'Cough and colds', '[\"physician\",\"nurse\",\"midwife\"]', '2025-07-16 05:03:36', '2025-09-13 06:09:10'),
(36, 'Oral Stomatitis', '[\"dentist\"]', '2025-07-16 05:03:36', '2025-08-04 10:26:12'),
(37, 'Gastritis', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(38, 'Hyperlipidemia', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(39, 'Cat bite', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(40, 'Acute tonsillopharyngitis', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(41, 'Osteoarthritis', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(42, 'Impetigo', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(43, 'Bronchial asthma', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(44, 'Allergy', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(45, 'Stye', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(46, 'Threatened Abortion', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(47, 'Sprain', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(48, 'Dyslipidemia', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(49, 'Underweight', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(50, 'Inguinal Hernia', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(51, 'Otitis Externa', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(52, 'Anemia', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(53, 'Bronchitis', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(54, 'Colds', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(55, 'Tinea Pudis', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(56, 'Musculoskeletal strain', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(57, 'Pneumonia', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(58, 'Vaginitis', '[\"midwife\"]', '2025-07-16 05:03:36', '2025-08-04 10:26:12'),
(59, 'Conjunctivitis', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(60, 'Musculoskeletal pain', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(61, 'COVID-19', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(62, 'Internal Hemorrhoids', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(63, 'Atopic Dermatitis', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(64, 'Lacerated Wound', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(65, 'Diabetes', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(66, 'Milliara Rubra', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(67, 'Overfatigue', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(68, 'Measles', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(69, 'Gastric Ulcer', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(70, 'Boil', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(71, 'Contact Dermatitis', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(72, 'Insomnia', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(73, 'Diabetes Type 2', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(74, 'Tension Headache', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(75, 'Acute Gastritis', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(76, 'Peripheral Neuropathy', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(77, 'Acute Upper Respiratory Infection', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(78, 'COVID-19 Suspect', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(79, 'Breast Mass', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(80, 'Multiple Abrasion', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(81, 'Arthritis', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(82, 'Tendon Cyst', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(83, 'AURI', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(84, 'Acute Gastroenteritis', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(85, 'Muscle Pain', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(86, 'Vehicular Accident', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(87, 'External nodules', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(88, 'Loss of consciousness', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(89, 'Chondrodermatitis', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(90, 'Fall', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(91, 'Mild Stroke', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(92, 'Parasitism', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(93, 'Mastalgia', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(94, 'HFMD', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(95, 'Roseola Infantum', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(96, 'Goiter', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(97, 'Intestinal Parasites', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(98, 'Lower back pain', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(99, 'Oral thrush', '[\"physician\",\"nurse\"]', '2025-07-16 05:03:36', '2025-08-04 10:39:35'),
(102, 'Tooth Extraction', '[\"dentist\"]', '2025-07-16 05:03:36', '2025-07-16 05:03:36'),
(103, 'Maxillary Abscess', '[\"dentist\"]', '2025-07-16 05:03:36', '2025-07-16 05:03:36'),
(105, 'Abortion', '[\"physician\",\"nurse\",\"midwife\"]', '2025-07-16 05:03:36', '2025-09-13 04:55:07'),
(106, 'Vaginitis', '[\"midwife\"]', '2025-07-16 05:03:36', '2025-07-16 05:03:36'),
(107, 'Tulo', '[\"physician\"]', '2025-07-16 06:13:54', '2025-07-16 06:13:54'),
(324, 'Injury', '[\"physician\",\"nurse\"]', '2025-08-04 08:35:02', '2025-08-04 10:44:51'),
(329, 'ACL', '[\"physician\"]', '2025-08-04 10:21:53', '2025-09-07 14:08:30'),
(330, 'qwe', '[\"physician\"]', '2025-09-07 12:15:39', '2025-09-07 12:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `health_records`
--

CREATE TABLE `health_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `age_unit` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `height` decimal(5,2) DEFAULT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `philhealth_number` varchar(255) DEFAULT NULL,
  `visit_purpose` varchar(255) DEFAULT NULL,
  `other_diagnosis` varchar(255) DEFAULT NULL,
  `given_medicine` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `blood_type` varchar(3) DEFAULT NULL,
  `other_purpose` varchar(255) DEFAULT NULL,
  `date_consulted` date DEFAULT NULL,
  `street` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `archived_at` timestamp NULL DEFAULT NULL,
  `status` enum('Cleared','Under Treatment') NOT NULL DEFAULT 'Under Treatment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `health_records`
--

INSERT INTO `health_records` (`id`, `first_name`, `last_name`, `age`, `age_unit`, `gender`, `height`, `weight`, `address`, `contact_number`, `philhealth_number`, `visit_purpose`, `other_diagnosis`, `given_medicine`, `created_at`, `updated_at`, `birth_date`, `blood_type`, `other_purpose`, `date_consulted`, `street`, `deleted_at`, `archived_at`, `status`) VALUES
(1, 'Dominic', 'Almazan', 70, 'years', 'Male', 175.00, 80.00, 'Alley 4', '09271297729', NULL, '[\"Check-up\"]', 'wqewq', 'Vaccine', '2025-06-26 08:51:59', '2025-09-07 12:11:37', '1960-07-14', 'B-', NULL, '2025-08-08', 'Ochoa Building', NULL, NULL, 'Under Treatment'),
(2, 'Angela', 'Taylan', 21, 'years', 'Female', 160.00, 50.00, 'Block 3', '09283293292', NULL, '[\"Dental Check-up\"]', NULL, 'pills', '2025-06-26 08:53:41', '2025-07-04 08:34:52', '2003-09-25', NULL, NULL, '2025-07-04', 'Romualdez Street', NULL, NULL, 'Under Treatment'),
(3, 'Samantha', 'Pajanustan', 8, 'years', 'Female', 120.00, 40.00, 'Alley 4,Daang Bakal St. Mandaluyong City', '09271297729', NULL, '[\"Check-up\"]', NULL, 'None', '2025-06-26 08:54:41', '2025-07-13 12:09:24', '2018-04-18', NULL, NULL, '2025-07-03', 'Gen.Kalentong Street', NULL, NULL, 'Under Treatment'),
(4, 'Matthew', 'Almazan', 3, 'years', 'Male', 160.00, 75.00, 'Block 5', '09271297729', NULL, '[\"Dental Check-up\"]', NULL, 'Paracetamol,Vaccine', '2025-06-26 08:55:57', '2025-08-08 04:47:05', '2025-06-30', 'B-', NULL, '2025-07-29', 'P. Martinez Street', NULL, NULL, 'Under Treatment'),
(5, 'Victor', 'Chipe', 18, 'years', 'Male', 175.00, 65.00, 'Block 4', '09271297729', NULL, '[\"Check-up\"]', NULL, 'sds', '2025-06-26 08:57:04', '2025-07-13 12:09:08', '2007-08-16', NULL, NULL, '2025-07-01', 'Ochoa Building', NULL, NULL, 'Under Treatment'),
(6, 'Laurence', 'Baste', 15, 'years', 'Male', 169.00, 54.00, 'Block 4', '09271297729', NULL, '[\"Dental Check-up\"]', NULL, 'none', '2025-06-26 08:58:05', '2025-07-03 15:26:06', '2010-06-23', NULL, NULL, '2025-07-03', 'E. Magalona Street', NULL, NULL, 'Under Treatment'),
(7, 'Victorj', 'Magtanggol', 90, 'years', 'Male', 210.00, 110.00, 'Alley 1', '09283293292', NULL, '[\"Blood Pressure Monitoring\"]', NULL, 'Water', '2025-06-26 08:59:29', '2025-07-08 14:22:43', '1940-06-29', NULL, NULL, '2025-07-08', 'P. Martinez Street', NULL, NULL, 'Under Treatment'),
(8, 'Shaniel', 'Dagohoy', 21, 'years', 'Female', 159.00, 42.00, 'Block 10', '09283293292', NULL, '[\"Check-up\"]', NULL, 'Lambing ni baste', '2025-06-26 09:00:23', '2025-07-16 06:05:42', '2003-10-24', NULL, NULL, '2025-07-03', 'Gomega Condominiums', NULL, NULL, 'Under Treatment'),
(9, 'Calo', 'Arive', 432, 'years', 'Male', 170.00, 80.00, 'Alley 4,Daang Bakal St. Mandaluyong City', '09271297729', NULL, '[\"Check-up\"]', NULL, 'yosi', '2025-06-26 09:01:56', '2025-07-13 12:09:49', '1999-07-31', NULL, NULL, '2025-07-03', 'Sen. Neptali Gonzales Street', NULL, NULL, 'Under Treatment'),
(10, 'Alex', 'Laniosa', 22, 'years', 'Male', 170.00, 77.00, 'Block 2', '09271297729', NULL, '[\"Dental Check-up\"]', NULL, 'Tite', '2025-06-26 09:02:53', '2025-07-03 13:39:22', '2003-01-10', NULL, NULL, '2025-07-03', 'Ochoa Building', NULL, NULL, 'Under Treatment'),
(11, 'Charles', 'Sarmiento', 17, 'years', 'Male', 180.00, 66.00, 'Block 2', '09271297729', NULL, '[\"Dental Check-up\",\"Wound Care\"]', 'Payness Surgery', 'None', '2025-06-26 09:04:54', '2025-07-16 06:10:14', '2016-06-24', NULL, 'Surgery', '2025-07-03', 'P. Martinez Street', NULL, NULL, 'Under Treatment'),
(13, 'Zayn', 'Malik', 21, 'years', 'Male', 176.00, 53.00, 'Alley 4,Daang Bakal St. Mandaluyong City', '09271297729', NULL, '[\"Check-up\"]', NULL, '535353', '2025-06-27 07:39:43', '2025-07-13 12:10:09', '2003-06-12', NULL, NULL, '2025-07-03', 'Sen. Neptali Gonzales Street', NULL, NULL, 'Under Treatment'),
(14, 'John', 'Cena', 23, 'years', 'Male', 155.00, 55.00, 'Alley 4', '09271297729', NULL, '[\"Check-up\"]', NULL, 'cxzcz', '2025-06-27 07:53:20', '2025-07-16 06:06:08', '2001-06-28', NULL, NULL, '2025-07-04', 'V. Fabella Street', NULL, NULL, 'Under Treatment'),
(15, 'Gabbi', 'Garcia', 25, 'years', 'Female', 167.00, 66.00, 'Block 5', '09223232', NULL, '[\"Check-up\"]', NULL, 'Injection', '2025-06-28 09:40:27', '2025-07-13 12:09:39', '2000-06-30', NULL, NULL, '2025-07-04', 'P. Martinez Street', NULL, NULL, 'Under Treatment'),
(16, 'Ilyvem', 'Sanches', 17, 'years', 'Female', 180.00, 64.00, 'Gomega', '09069538092', '12-2323242-42', '[\"Dental Check-up\"]', NULL, 'Biogesic', '2025-06-30 08:54:46', '2025-09-13 08:19:24', '2007-06-28', 'B+', NULL, '2025-09-13', 'Gomega Condominiums', NULL, NULL, 'Under Treatment'),
(17, 'Bianca', 'Nimo', 35, 'years', 'Female', 166.00, 66.00, 'Gomega', '09271297729', NULL, '[\"Wound Care\"]', NULL, 'ccc', '2025-07-02 11:56:09', '2025-07-13 11:27:19', '1977-05-24', NULL, NULL, '2025-07-13', 'Gomega Condominiums', NULL, NULL, 'Under Treatment'),
(18, 'Nadyn', 'Pajanustan', 70, 'weeks', 'Female', 175.00, 80.00, 'Ochoa', '+639271297729', NULL, '[\"Dental Check-up\"]', NULL, 'Vaccine', '2025-07-02 12:11:00', '2025-07-13 12:11:31', '2002-03-27', NULL, NULL, '2025-07-12', 'Haig Street', NULL, NULL, 'Under Treatment'),
(19, 'Alexia', 'Caparaz', 75, 'years', 'Female', 175.00, 80.00, 'Alley 4', '09271297729', NULL, '[\"Blood Pressure Monitoring\"]', NULL, 'Pills', '2025-07-02 12:19:48', '2025-07-13 12:08:28', '1950-02-22', NULL, NULL, '2025-07-04', 'F. Bernardo St.', NULL, NULL, 'Under Treatment'),
(20, 'Jude', 'Pascua', NULL, NULL, 'Male', 155.00, 65.00, 'Block 5', '09271297729', NULL, '[\"Check-up\"]', NULL, 'Pills', '2025-07-02 12:42:25', '2025-07-13 12:08:55', '2021-06-04', NULL, NULL, '2025-07-04', 'J. Tiosejo', NULL, NULL, 'Under Treatment'),
(21, 'Sin', 'Addun', NULL, NULL, 'Male', 175.00, 80.00, 'Alley 4', '09271297729', NULL, '[\"Dental Check-up\"]', NULL, 'dasdsa', '2025-07-03 13:38:53', '2025-07-03 13:38:53', '2003-02-05', NULL, NULL, '2025-07-03', 'Sen. Neptali Gonzales Street', NULL, NULL, 'Under Treatment'),
(23, 'Shekinah', 'Tejada', NULL, NULL, 'Female', 175.00, 70.00, 'Alley 4', '09271297729', NULL, '[\"Dental Check-up\"]', NULL, 'Qwerty', '2025-07-08 13:27:16', '2025-07-08 13:27:16', '2003-07-30', NULL, NULL, '2025-07-08', 'Haig Street', NULL, NULL, 'Under Treatment'),
(24, 'Abby', 'Pascua', NULL, NULL, 'Female', 180.00, 75.00, 'Ochoa', '09283823232', NULL, '[\"Dental Check-up\"]', NULL, 'VACCINE', '2025-07-09 03:11:39', '2025-07-13 12:11:38', '1997-07-30', NULL, NULL, '2025-07-12', 'Ochoa Building', NULL, NULL, 'Under Treatment'),
(25, 'Gabbi', 'Villafuerte', NULL, NULL, 'Male', 215.00, 24.00, '412421', '092838382', NULL, '[\"Check-up\",\"Wound Care\"]', NULL, 'c', '2025-07-10 15:06:15', '2025-07-16 06:06:53', '2003-07-31', NULL, NULL, '2025-07-13', 'E. Magalona Street', NULL, NULL, 'Under Treatment'),
(26, 'Kyle', 'Cornejo', NULL, NULL, 'Male', 180.00, 75.00, 'block 5', '09283823232', NULL, '[\"Prenatal Check\"]', NULL, 'qwerty', '2025-07-16 07:09:40', '2025-07-19 14:17:03', '1999-07-31', NULL, NULL, '2025-07-16', 'Haig Street', NULL, NULL, 'Under Treatment'),
(27, 'Rafael', 'Pagtalunan', NULL, NULL, 'Male', 180.00, 75.00, 'Ochoa', '09283823232', NULL, '[\"Dental Check-up\"]', NULL, 'dd', '2025-07-19 12:23:07', '2025-07-19 12:23:07', '2018-09-29', NULL, NULL, '2025-07-19', 'Ochoa Building', NULL, NULL, 'Under Treatment'),
(28, 'Kobe', 'Jackson', NULL, NULL, 'Male', 176.00, 66.00, 'Block 5', '0932131231', NULL, '[\"Prenatal Check\"]', NULL, 'asdas', '2025-07-22 14:18:22', '2025-07-22 14:35:51', '1960-07-22', NULL, NULL, '2025-07-22', 'Gen.Kalentong Street', NULL, NULL, 'Under Treatment'),
(29, 'Crystal', 'Palad', NULL, NULL, 'Male', 176.00, 66.00, 'Block 5', '0932131231', NULL, '[\"Prenatal Check\"]', NULL, 'asdas', '2025-07-22 14:20:23', '2025-07-22 14:56:17', '1988-07-14', NULL, NULL, '2025-07-22', 'P. Martinez Street', NULL, NULL, 'Under Treatment'),
(30, 'Januel', 'Dela Rosa', NULL, NULL, 'Male', 176.00, 66.00, 'Block 5', '0932131231', NULL, '[\"Prenatal Check\"]', NULL, 'asdas', '2025-07-22 14:21:01', '2025-07-22 14:33:18', '1950-07-12', NULL, NULL, '2025-07-22', 'Gomega Condominiums', NULL, NULL, 'Under Treatment'),
(31, 'Carlo', 'Palad', NULL, NULL, 'Male', 176.00, 66.00, 'Block 5', '0932131231', NULL, '[\"Immunization\"]', NULL, 'asdas', '2025-07-22 14:22:11', '2025-07-22 14:34:25', '1999-11-25', NULL, NULL, '2025-07-22', 'J. Tiosejo', NULL, NULL, 'Under Treatment'),
(32, 'Barlo', 'Palad', NULL, NULL, 'Male', 176.00, 66.00, 'Block 5', '0932131231', NULL, '[\"Blood Pressure Monitoring\"]', NULL, 'asdas', '2025-07-22 14:24:30', '2025-07-22 14:34:37', '2001-08-29', NULL, NULL, '2025-07-22', 'Sen. Neptali Gonzales Street', NULL, NULL, 'Under Treatment'),
(33, 'Raf', 'Polo', NULL, NULL, 'Male', 176.00, 66.00, 'Block 5', '0932131231', NULL, '[\"Prenatal Check\"]', NULL, 'asdas', '2025-07-22 14:31:26', '2025-07-22 14:38:42', '2000-06-30', NULL, NULL, '2025-07-22', 'P. Martinez Street', NULL, NULL, 'Under Treatment'),
(34, 'Rence', 'Crisostomo', NULL, NULL, 'Male', 195.00, 85.00, 'Block 5', '0929323232', NULL, '[\"Dental Check-up\"]', NULL, NULL, '2025-07-29 02:00:29', '2025-08-04 10:44:19', '2003-09-22', NULL, NULL, '2025-07-29', 'P. Martinez Street', NULL, NULL, 'Under Treatment'),
(35, 'James', 'Ong', NULL, NULL, 'Male', 195.00, 85.00, 'Block 5', '0929323232', NULL, '[\"Immunization\"]', NULL, 'Vaccine', '2025-07-29 02:02:04', '2025-07-29 02:27:16', '1994-11-24', NULL, NULL, '2025-07-29', 'P. Martinez Street', NULL, NULL, 'Under Treatment'),
(36, 'Jomi', 'Barreto', NULL, NULL, 'Female', 155.00, 45.00, 'Block 5', '0929323232', NULL, '[\"Wound Care\"]', NULL, 'Vaccine', '2025-07-29 02:03:30', '2025-07-29 02:03:30', '1986-07-24', NULL, NULL, '2025-07-29', 'Gomega Condominiums', NULL, NULL, 'Under Treatment'),
(37, 'Jinn', 'Macarey', NULL, NULL, 'Female', 155.00, 45.00, 'Block 5', '0929323232', NULL, '[\"Dental Check-up\"]', NULL, 'Vaccine', '2025-07-29 03:05:44', '2025-07-29 15:31:22', '1945-11-24', NULL, NULL, '2025-07-29', 'P. Martinez Street', NULL, NULL, 'Under Treatment'),
(38, 'Niko', 'Dela Rosa', NULL, NULL, 'Male', 155.00, 45.00, 'Block 5', '0929323232', NULL, '[\"Check-up\"]', NULL, 'Paracetamol', '2025-07-29 15:34:56', '2025-08-04 07:35:36', '2001-08-17', 'A+', NULL, '2025-08-04', 'E. Magalona Street', NULL, NULL, 'Under Treatment'),
(39, 'Armel', 'Tabios', NULL, NULL, 'Male', 155.00, 45.00, 'Block 5', '0929323232', NULL, '[\"Blood Pressure Monitoring\"]', NULL, '333', '2025-07-29 15:44:00', '2025-07-29 15:44:00', '1960-07-22', 'O+', NULL, '2025-07-29', 'V. Fabella Street', NULL, NULL, 'Under Treatment'),
(40, 'Tims', 'Bato', NULL, NULL, 'Male', 100.00, 35.00, 'Block 5', '0929323232', NULL, '[\"Check-up\"]', NULL, 'cc', '2025-07-29 16:08:56', '2025-07-29 17:00:21', '2020-06-18', 'A-', NULL, '2025-07-29', 'V. Fabella Street', NULL, NULL, 'Under Treatment'),
(41, 'Vince', 'Cabigting', NULL, NULL, 'Male', 100.00, 35.00, 'Block 5', '0929323232', NULL, '[\"Prenatal Check\"]', NULL, '333', '2025-07-29 16:14:48', '2025-09-07 14:31:02', '1988-07-14', 'B-', NULL, '2025-08-28', 'J. Tiosejo', '2025-09-07 14:31:02', NULL, 'Cleared'),
(42, 'Dj', 'Tablan', NULL, NULL, 'Male', 140.00, 40.00, 'Block 5', '09999999977', NULL, '[\"Blood Pressure Monitoring\"]', 'Fever', '123', '2025-08-04 13:14:15', '2025-08-19 18:52:55', '2019-12-25', 'O+', NULL, '2025-08-04', 'E. Magalona Street', NULL, NULL, 'Cleared'),
(46, 'Aiah', 'Almazan', NULL, NULL, 'Male', 175.00, 55.00, 'Block 5', '+6392323232', '19-232323232-32', '[\"Check-up\"]', NULL, NULL, '2025-08-19 17:16:22', '2025-08-19 17:16:22', '2003-11-13', 'AB-', NULL, '2025-08-20', 'E. Magalona Street', NULL, NULL, 'Under Treatment'),
(47, 'Rain', 'Zer', NULL, NULL, 'Female', 165.00, 75.00, '12312312', '09223232', '19-232323232-32', '[\"Check-up\"]', NULL, 'sdasdas', '2025-08-23 15:25:45', '2025-08-27 06:28:11', '2020-07-31', 'B-', NULL, '2025-08-23', 'Ochoa Building', NULL, NULL, 'Cleared'),
(48, 'Ice', 'Aquino', NULL, NULL, 'Male', 175.00, 55.00, '12321', '09282828282', '19-232323232-32', '[\"Check-up\"]', NULL, '12312312', '2025-09-03 08:26:59', '2025-09-03 08:26:59', '1994-11-24', 'O+', NULL, '2025-09-03', 'Gomega Condominiums', NULL, NULL, 'Under Treatment'),
(49, 'Robert', 'Aquino', NULL, NULL, 'Male', 175.00, 55.00, '12321', '09282828282', '19-232323232-32', '[\"Check-up\"]', NULL, '12312312', '2025-09-03 08:27:00', '2025-09-03 08:33:59', '1994-11-24', 'O+', NULL, '2025-09-03', 'Gomega Condominiums', NULL, NULL, 'Under Treatment'),
(50, 'Kim', 'QwertY', NULL, NULL, 'Female', 175.00, 55.00, '12321', '09282828282', '19-232323232-32', '[\"Dental Check-up\"]', NULL, '12312312', '2025-09-03 08:28:11', '2025-09-03 08:29:48', '1960-07-22', 'O+', NULL, '2025-09-03', 'P. Martinez Street', NULL, NULL, 'Under Treatment'),
(51, 'Kim', 'Qwert', NULL, NULL, 'Female', 175.00, 55.00, '12321', '09282828282', '19-232323232-32', '[\"Dental Check-up\"]', NULL, '12312312', '2025-09-03 08:28:11', '2025-09-03 08:28:11', '1960-07-22', 'O+', NULL, '2025-09-03', 'P. Martinez Street', NULL, NULL, 'Under Treatment'),
(52, 'Maria', 'Gallardo', NULL, NULL, 'Male', 175.00, 55.00, '12321', '09282828282', '19-232323232-32', '[\"Dental Check-up\"]', NULL, '333', '2025-09-03 08:42:22', '2025-09-03 08:42:22', '2001-08-17', 'B+', NULL, '2025-09-03', 'Haig Street', NULL, NULL, 'Under Treatment'),
(53, 'Psy', 'Yo', NULL, NULL, 'Male', 140.00, 40.00, 'Block 5', '+6392323232', '19-232323232-32', '[\"Check-up\"]', NULL, '123', '2025-09-06 07:50:23', '2025-09-06 07:50:23', '2003-09-24', 'B+', NULL, '2025-09-06', 'Ochoa Building', NULL, NULL, 'Under Treatment');

-- --------------------------------------------------------

--
-- Table structure for table `health_records_medical_diagnoses`
--

CREATE TABLE `health_records_medical_diagnoses` (
  `health_record_id` bigint(20) UNSIGNED NOT NULL,
  `diagnosis_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `health_records_medical_diagnoses`
--

INSERT INTO `health_records_medical_diagnoses` (`health_record_id`, `diagnosis_id`) VALUES
(24, 4),
(18, 78),
(13, 39),
(9, 26),
(15, 7),
(3, 11),
(5, 44),
(20, 72),
(19, 1),
(19, 6),
(8, 28),
(14, 6),
(25, 57),
(17, 52),
(23, 6),
(2, 44),
(11, 1),
(11, 28),
(6, 28),
(10, 90),
(21, 105),
(27, 7),
(26, 105),
(26, 2),
(30, 8),
(31, 88),
(32, 6),
(28, 8),
(33, 4),
(33, 6),
(33, 7),
(36, 28),
(35, 4),
(7, 5),
(29, 2),
(37, 3),
(39, 54),
(40, 4),
(38, 6),
(34, 329),
(4, 3),
(24, 4),
(18, 78),
(13, 39),
(9, 26),
(15, 7),
(3, 11),
(5, 44),
(20, 72),
(4, 2),
(19, 1),
(19, 6),
(8, 28),
(14, 6),
(25, 57),
(17, 52),
(7, 80),
(1, 47),
(23, 6),
(2, 44),
(11, 1),
(11, 28),
(6, 28),
(10, 90),
(21, 105),
(26, 2),
(27, 7),
(46, 54),
(42, 329),
(47, 47),
(16, 102),
(50, 40),
(51, 40),
(49, 6),
(52, 84),
(53, 4),
(41, 2);

-- --------------------------------------------------------

--
-- Table structure for table `history_records`
--

CREATE TABLE `history_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `health_record_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `consultation_date` date NOT NULL,
  `visit_purpose` varchar(255) NOT NULL,
  `medical_diagnosis` varchar(255) NOT NULL,
  `given_medicine` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_records`
--

INSERT INTO `history_records` (`id`, `health_record_id`, `user_id`, `consultation_date`, `visit_purpose`, `medical_diagnosis`, `given_medicine`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, NULL, '2025-06-27', '[\"Dental Check-up\"]', '[\"Acute Bronchitis\"]', NULL, NULL, '2025-06-27 07:22:59', '2025-06-27 07:22:59'),
(2, 10, NULL, '2025-06-27', '[\"Dental Check-up\"]', '[\"Overfatigue\"]', NULL, NULL, '2025-06-27 07:23:28', '2025-06-27 07:23:28'),
(3, 2, NULL, '2025-06-27', '[\"Dental Check-up\"]', '[\"Cat bite\"]', NULL, NULL, '2025-06-27 07:28:56', '2025-06-27 07:28:56'),
(4, 2, NULL, '2025-06-26', '[\"Dental Check-up\"]', '[\"Cat bite\"]', NULL, NULL, '2025-06-27 07:30:20', '2025-06-27 07:30:20'),
(5, 11, NULL, '2025-06-27', '[\"Dental Check-up\"]', '[\"Acute Bronchitis\",\"Allergy\"]', NULL, NULL, '2025-06-27 07:38:28', '2025-06-27 07:38:28'),
(6, 14, NULL, '2025-06-27', '[\"Check-up\"]', '[\"Acute Bronchitis\"]', NULL, NULL, '2025-06-27 07:53:20', '2025-06-27 07:53:20'),
(7, 14, NULL, '2025-06-25', '[\"Child Immunization\"]', '[\"Acute Bronchitis\"]', NULL, NULL, '2025-06-27 07:58:52', '2025-06-27 07:58:52'),
(8, 14, NULL, '2025-06-21', '[\"Child Immunization\"]', '[\"Acute Bronchitis\"]', 'cxzcz', NULL, '2025-06-27 08:02:50', '2025-06-27 08:02:50'),
(9, 8, 1, '2025-06-27', '[\"Dental Check-up\"]', '[\"Flu\"]', 'Paracetamol', NULL, '2025-06-27 08:06:58', '2025-06-27 08:06:58'),
(10, 8, 1, '2025-06-26', '[\"Dental Check-up\"]', '[\"Flu\"]', 'Lambing ni baste', NULL, '2025-06-27 08:09:15', '2025-06-27 08:09:15'),
(11, 15, 2, '2025-06-28', '[\"Wound Care\"]', '[\"Cat bite\"]', 'Injection', NULL, '2025-06-28 09:40:27', '2025-06-28 09:40:27'),
(12, 13, 2, '2025-06-28', '[\"Dental Check-up\"]', '[\"Acute Bronchitis\"]', '535353', NULL, '2025-06-28 10:26:30', '2025-06-28 10:26:30'),
(13, 15, 3, '2025-06-28', '[\"Pre-natal Consultation\"]', '[\"Cat bite\"]', 'Injection', NULL, '2025-06-28 10:30:36', '2025-06-28 10:30:36'),
(14, 16, 1, '2025-06-30', '[\"Dental Check-up\"]', '[\"Tension Headache\"]', 'Random', NULL, '2025-06-30 08:54:46', '2025-06-30 08:54:46'),
(15, 5, 4, '2025-07-01', '[\"Family Planning\"]', '[\"Acute Bronchitis\"]', 'sds', NULL, '2025-07-01 07:50:04', '2025-07-01 07:50:04'),
(16, 9, 1, '2025-07-02', '[\"Family Planning\"]', '[\"Insect Bite\"]', 'yosi', NULL, '2025-07-02 07:24:12', '2025-07-02 07:24:12'),
(17, 6, 1, '2025-07-02', '[\"Dental Check-up\"]', '[\"Eye Irritation\"]', 'none', NULL, '2025-07-02 07:33:32', '2025-07-02 07:33:32'),
(18, 10, 1, '2025-07-02', '[\"Dental Check-up\"]', '[\"Overfatigue\"]', 'Tite', NULL, '2025-07-02 07:51:04', '2025-07-02 07:51:04'),
(19, 6, 1, '2025-07-02', '[\"Dental Check-up\"]', '[\"Eye Irritation\"]', 'none', NULL, '2025-07-02 07:53:24', '2025-07-02 07:53:24'),
(20, 16, 1, '2025-07-02', '[\"Dental Check-up\"]', '[\"Tension Headache\"]', 'Random', NULL, '2025-07-02 07:57:11', '2025-07-02 07:57:11'),
(21, 11, 1, '2025-07-02', '[\"Dental Check-up\"]', '[\"Acute Bronchitis\",\"Allergy\"]', 'None', NULL, '2025-07-02 07:59:42', '2025-07-02 07:59:42'),
(22, 11, 1, '2025-07-02', '[\"Dental Check-up\"]', '[\"Acute Bronchitis\",\"Allergy\"]', 'None', NULL, '2025-07-02 08:01:57', '2025-07-02 08:01:57'),
(23, 2, 4, '2025-07-02', '[\"Dental Check-up\"]', '[\"Cat bite\"]', 'Vaccine', NULL, '2025-07-02 08:15:43', '2025-07-02 08:15:43'),
(24, 4, 6, '2025-07-02', '[\"Child Immunization\"]', '[\"Colds\"]', 'Paracetamol,Vaccine', NULL, '2025-07-02 09:21:52', '2025-07-02 09:21:52'),
(25, 1, 1, '2025-07-02', '[\"Dental Check-up\"]', '[\"COVID-19\"]', 'Vaccine', NULL, '2025-07-02 09:30:38', '2025-07-02 09:30:38'),
(26, 4, 6, '2025-07-02', '[\"Child Immunization\"]', '[\"Colds\"]', 'Paracetamol,Vaccine', NULL, '2025-07-02 09:36:15', '2025-07-02 09:36:15'),
(27, 4, 6, '2025-07-02', '[\"Child Immunization\"]', '[\"Colds\"]', 'Paracetamol,Vaccine', NULL, '2025-07-02 09:36:48', '2025-07-02 09:36:48'),
(28, 14, 1, '2025-07-02', '[\"Child Immunization\"]', '[\"Acute Bronchitis\"]', 'cxzcz', NULL, '2025-07-02 09:38:18', '2025-07-02 09:38:18'),
(29, 1, 1, '2025-07-02', '[\"Dental Check-up\"]', '[\"COVID-19\"]', 'Vaccine', NULL, '2025-07-02 09:40:31', '2025-07-02 09:40:31'),
(30, 1, 1, '2025-07-02', 'Medical Consultation', 'COVID-19', 'Vaccine', NULL, '2025-07-02 09:47:48', '2025-07-02 09:47:48'),
(31, 2, 6, '2025-07-02', 'Dental Check-up', 'Cat bite', 'pills', NULL, '2025-07-02 09:48:36', '2025-07-02 09:48:36'),
(32, 10, 1, '2025-06-17', 'Dental Check-up', 'Overfatigue', 'Tite', NULL, '2025-07-02 10:06:10', '2025-07-02 10:06:10'),
(33, 16, 4, '2025-07-02', 'Dental Check-up', 'Tension Headache', 'Biogesic', NULL, '2025-07-02 10:11:14', '2025-07-02 10:11:14'),
(34, 1, 1, '2025-07-02', 'Medical Consultation', 'COVID-19', 'Vaccine', NULL, '2025-07-02 11:32:38', '2025-07-02 11:32:38'),
(35, 1, 1, '2025-07-02', 'Medical Consultation', 'COVID-19', 'Vaccine', NULL, '2025-07-02 11:33:16', '2025-07-02 11:33:16'),
(36, 4, 1, '2025-07-02', 'Child Immunization', 'Colds', 'Paracetamol,Vaccine', NULL, '2025-07-02 11:35:14', '2025-07-02 11:35:14'),
(37, 9, 1, '2025-07-02', 'Family Planning', 'Insect Bite', 'yosi', NULL, '2025-07-02 11:36:03', '2025-07-02 11:36:03'),
(38, 4, 1, '2025-07-02', 'Child Immunization', 'Colds', 'Paracetamol,Vaccine', NULL, '2025-07-02 11:37:53', '2025-07-02 11:37:53'),
(39, 17, 4, '2025-07-02', 'Dental Check-up', 'Fever', 'dasda', NULL, '2025-07-02 11:56:09', '2025-07-02 11:56:09'),
(40, 18, 1, '2025-07-02', 'Dental Check-up', 'Conjunctivitis', 'Vaccine', NULL, '2025-07-02 12:11:00', '2025-07-02 12:11:00'),
(41, 19, 1, '2025-07-02', 'Wound Care', 'Insomnia', 'Pills', NULL, '2025-07-02 12:19:48', '2025-07-02 12:19:48'),
(42, 4, 1, '2025-07-02', 'Child Immunization', 'Colds', 'Paracetamol,Vaccine', NULL, '2025-07-02 12:23:31', '2025-07-02 12:23:31'),
(43, 4, 4, '2025-07-02', 'Child Immunization', 'Colds', 'Paracetamol,Vaccine', NULL, '2025-07-02 12:25:48', '2025-07-02 12:25:48'),
(44, 4, 4, '2025-07-02', 'Child Immunization', 'Colds', 'Paracetamol,Vaccine', NULL, '2025-07-02 12:26:14', '2025-07-02 12:26:14'),
(45, 4, 4, '2025-07-02', 'Child Immunization', 'Colds', 'Paracetamol,Vaccine', NULL, '2025-07-02 12:38:08', '2025-07-02 12:38:08'),
(46, 20, 4, '2025-07-02', 'Check-up', 'Insomnia', 'Pills', NULL, '2025-07-02 12:42:25', '2025-07-02 12:42:25'),
(47, 4, 4, '2025-07-02', 'Child Immunization', 'Colds', 'Paracetamol,Vaccine', NULL, '2025-07-02 12:44:26', '2025-07-02 12:44:26'),
(48, 4, 4, '2025-07-02', 'Child Immunization', 'Colds', 'Paracetamol,Vaccine', NULL, '2025-07-02 12:45:30', '2025-07-02 12:45:30'),
(49, 4, 1, '2025-07-03', 'Child Immunization', 'Colds', 'Paracetamol,Vaccine', NULL, '2025-07-03 10:28:03', '2025-07-03 10:28:03'),
(50, 19, 1, '2025-07-03', 'Child Immunization', 'Insomnia', 'Pills', NULL, '2025-07-03 10:35:24', '2025-07-03 10:35:24'),
(51, 17, 1, '2025-07-03', 'Dental Check-up', 'Fever', 'dasda', NULL, '2025-07-03 10:36:15', '2025-07-03 10:36:15'),
(52, 9, 1, '2025-07-03', 'Family Planning', 'Insect Bite', 'yosi', NULL, '2025-07-03 10:38:08', '2025-07-03 10:38:08'),
(53, 1, 1, '2025-07-03', 'Medical Consultation', 'COVID-19', 'Vaccine', NULL, '2025-07-03 12:22:51', '2025-07-03 12:22:51'),
(54, 1, 1, '2025-07-03', 'Medical Consultation', 'COVID-19', 'Vaccine', NULL, '2025-07-03 13:16:23', '2025-07-03 13:16:23'),
(55, 21, 1, '2025-07-03', 'Dental Check-up', 'Conjunctivitis', 'dasdsa', NULL, '2025-07-03 13:38:53', '2025-07-03 13:38:53'),
(56, 10, 1, '2025-07-03', 'Dental Check-up', 'Overfatigue', 'Tite', NULL, '2025-07-03 13:39:22', '2025-07-03 13:39:22'),
(57, 2, 1, '2025-07-02', 'Dental Check-up', 'Cat bite', 'pills', NULL, '2025-07-03 13:40:14', '2025-07-03 13:40:14'),
(58, 16, 1, '2025-07-03', 'Dental Check-up', 'Tension Headache', 'Biogesic', NULL, '2025-07-03 13:40:29', '2025-07-03 13:40:29'),
(59, 3, 1, '2025-07-03', 'Family Planning', 'Allergy', 'None', NULL, '2025-07-03 13:40:49', '2025-07-03 13:40:49'),
(60, 7, 1, '2025-07-03', 'Blood Pressure Monitoring', 'Loss of consciousness', 'Water', NULL, '2025-07-03 13:41:05', '2025-07-03 13:41:05'),
(61, 8, 1, '2025-07-03', 'Dental Check-up', 'Flu', 'Lambing ni baste', NULL, '2025-07-03 14:02:06', '2025-07-03 14:02:06'),
(62, 15, 1, '2025-07-03', 'Pre-natal Consultation', 'Cat bite', 'Injection', NULL, '2025-07-03 15:25:29', '2025-07-03 15:25:29'),
(63, 13, 1, '2025-07-03', 'Dental Check-up', 'Acute Bronchitis', '535353', NULL, '2025-07-03 15:25:42', '2025-07-03 15:25:42'),
(64, 6, 1, '2025-07-03', 'Dental Check-up', 'Eye Irritation', 'none', NULL, '2025-07-03 15:26:06', '2025-07-03 15:26:06'),
(65, 11, 1, '2025-07-03', 'Dental Check-up', 'Acute Bronchitis, Allergy', 'None', NULL, '2025-07-03 15:26:23', '2025-07-03 15:26:23'),
(66, 14, 1, '2025-07-03', 'Child Immunization', 'Acute Bronchitis', 'cxzcz', NULL, '2025-07-03 15:26:39', '2025-07-03 15:26:39'),
(67, 14, 1, '2025-07-04', 'Child Immunization', 'Acute Bronchitis', 'cxzcz', NULL, '2025-07-04 08:12:17', '2025-07-04 08:12:17'),
(68, 2, 1, '2025-07-04', 'Dental Check-up', 'Cat bite', 'pills', NULL, '2025-07-04 08:16:39', '2025-07-04 08:16:39'),
(69, 2, 2, '2025-07-04', 'Dental Check-up', 'Cat bite', 'pills', NULL, '2025-07-04 08:34:52', '2025-07-04 08:34:52'),
(70, 20, 1, '2025-07-04', 'Child Immunization', 'Acute Gastroenteritis', 'Pills', NULL, '2025-07-04 09:14:45', '2025-07-04 09:14:45'),
(71, 19, 1, '2025-07-04', 'Child Immunization', 'Insomnia', 'Pills', NULL, '2025-07-04 09:15:12', '2025-07-04 09:15:12'),
(72, 15, 1, '2025-07-04', 'Pre-natal Consultation', 'Cat bite', 'Injection', NULL, '2025-07-04 09:15:34', '2025-07-04 09:15:34'),
(73, 18, 1, '2025-07-04', 'Dental Check-up', 'Conjunctivitis', 'Vaccine', NULL, '2025-07-04 09:16:40', '2025-07-04 09:16:40'),
(74, 7, 1, '2025-07-05', 'Blood Pressure Monitoring', 'Loss of consciousness', 'Water', NULL, '2025-07-05 13:20:43', '2025-07-05 13:20:43'),
(76, 23, 1, '2025-07-08', 'Dental Check-up', 'Goiter', 'Qwerty', NULL, '2025-07-08 13:27:16', '2025-07-08 13:27:16'),
(77, 1, 1, '2025-07-08', 'Medical Consultation', 'COVID-19', 'Vaccine', NULL, '2025-07-08 13:31:05', '2025-07-08 13:31:05'),
(78, 17, 3, '2025-07-08', 'Dental Check-up', 'Fever', 'Paracetamol', NULL, '2025-07-08 13:32:55', '2025-07-08 13:32:55'),
(79, 1, 3, '2025-07-08', 'Medical Consultation', 'COVID-19', 'Vaccine', NULL, '2025-07-08 14:22:25', '2025-07-08 14:22:25'),
(80, 7, 3, '2025-07-08', 'Blood Pressure Monitoring', 'Loss of consciousness', 'Water', NULL, '2025-07-08 14:22:43', '2025-07-08 14:22:43'),
(81, 24, 1, '2025-07-09', 'Wound Care', 'Cat bite', 'VACCINE', NULL, '2025-07-09 03:11:39', '2025-07-09 03:11:39'),
(82, 25, 5, '2025-07-10', 'Prenatal Check', 'Vaginitis', 'c', NULL, '2025-07-10 15:06:15', '2025-07-10 15:06:15'),
(83, 25, 1, '2025-07-11', 'Prenatal Check', 'Vaginitis', 'c', NULL, '2025-07-10 17:20:20', '2025-07-10 17:20:20'),
(84, 24, 1, '2025-07-09', 'Dental Check-up', 'Chickenpox', 'VACCINE', NULL, '2025-07-11 13:39:40', '2025-07-11 13:39:40'),
(85, 17, 1, '2025-07-12', 'Dental Check-up', 'Fever', 'Paracetamol', NULL, '2025-07-12 09:52:32', '2025-07-12 09:52:32'),
(86, 24, 1, '2025-07-12', 'Dental Check-up', 'Chickenpox', 'VACCINE', NULL, '2025-07-12 09:52:55', '2025-07-12 09:52:55'),
(87, 18, 1, '2025-07-12', 'Dental Check-up', 'Conjunctivitis', 'Vaccine', NULL, '2025-07-12 09:57:07', '2025-07-12 09:57:07'),
(88, 17, 2, '2025-07-12', 'Wound Care', 'Cat bite', 'ccc', NULL, '2025-07-13 11:27:09', '2025-07-13 11:27:09'),
(89, 17, 2, '2025-07-13', 'Wound Care', 'Cat bite', 'ccc', NULL, '2025-07-13 11:27:19', '2025-07-13 11:27:19'),
(90, 25, 2, '2025-07-13', 'Prenatal Check', 'Vaginitis', 'c', NULL, '2025-07-13 11:28:46', '2025-07-13 11:28:46'),
(91, 14, 2, '2025-07-04', 'Immunization', 'Cough and colds', 'cxzcz', NULL, '2025-07-13 12:08:14', '2025-07-13 12:08:14'),
(92, 19, 2, '2025-07-04', 'Blood Pressure Monitoring', 'Insomnia', 'Pills', NULL, '2025-07-13 12:08:28', '2025-07-13 12:08:28'),
(93, 4, 2, '2025-07-03', 'Dental Check-up', 'Colds', 'Paracetamol,Vaccine', NULL, '2025-07-13 12:08:46', '2025-07-13 12:08:46'),
(94, 20, 2, '2025-07-04', 'Check-up', 'Acute Gastroenteritis', 'Pills', NULL, '2025-07-13 12:08:55', '2025-07-13 12:08:55'),
(95, 5, 2, '2025-07-01', 'Check-up', 'Acute Bronchitis', 'sds', NULL, '2025-07-13 12:09:08', '2025-07-13 12:09:08'),
(96, 3, 2, '2025-07-03', 'Check-up', 'Allergy', 'None', NULL, '2025-07-13 12:09:24', '2025-07-13 12:09:24'),
(97, 15, 2, '2025-07-04', 'Check-up', 'Cat bite', 'Injection', NULL, '2025-07-13 12:09:39', '2025-07-13 12:09:39'),
(98, 9, 2, '2025-07-03', 'Check-up', 'Insect Bite', 'yosi', NULL, '2025-07-13 12:09:49', '2025-07-13 12:09:49'),
(99, 13, 2, '2025-07-03', 'Check-up', 'Acute Bronchitis', '535353', NULL, '2025-07-13 12:10:09', '2025-07-13 12:10:09'),
(100, 24, 1, '2025-07-12', 'Dental Check-up', 'Diarrhea', 'VACCINE', NULL, '2025-07-16 05:08:04', '2025-07-16 05:08:04'),
(101, 18, 1, '2025-07-12', 'Dental Check-up', 'COVID-19 Suspect', 'Vaccine', NULL, '2025-07-16 05:48:41', '2025-07-16 05:48:41'),
(102, 13, 1, '2025-07-03', 'Check-up', 'Cat bite', '535353', NULL, '2025-07-16 06:02:12', '2025-07-16 06:02:12'),
(103, 9, 1, '2025-07-03', 'Check-up', 'Allergic Rhinitis', 'yosi', NULL, '2025-07-16 06:02:49', '2025-07-16 06:02:49'),
(104, 15, 2, '2025-07-04', 'Check-up', 'Hypertension', 'Injection', NULL, '2025-07-16 06:03:22', '2025-07-16 06:03:22'),
(105, 3, 2, '2025-07-03', 'Check-up', 'Skin Infection', 'None', NULL, '2025-07-16 06:03:34', '2025-07-16 06:03:34'),
(106, 5, 2, '2025-07-01', 'Check-up', 'Allergy', 'sds', NULL, '2025-07-16 06:03:46', '2025-07-16 06:03:46'),
(107, 20, 2, '2025-07-04', 'Check-up', 'Insomnia', 'Pills', NULL, '2025-07-16 06:04:04', '2025-07-16 06:04:04'),
(108, 4, 2, '2025-07-03', 'Dental Check-up', 'Flu', 'Paracetamol,Vaccine', NULL, '2025-07-16 06:04:15', '2025-07-16 06:04:15'),
(109, 19, 2, '2025-07-04', 'Blood Pressure Monitoring', 'Dengue, Fever', 'Pills', NULL, '2025-07-16 06:04:29', '2025-07-16 06:04:29'),
(110, 8, 2, '2025-07-03', 'Check-up', 'Insect Bite', 'Lambing ni baste', NULL, '2025-07-16 06:05:42', '2025-07-16 06:05:42'),
(111, 14, 2, '2025-07-04', 'Check-up', 'Fever', 'cxzcz', NULL, '2025-07-16 06:06:08', '2025-07-16 06:06:08'),
(112, 25, 2, '2025-07-13', 'Check-up, Wound Care', 'Pneumonia', 'c', NULL, '2025-07-16 06:06:53', '2025-07-16 06:06:53'),
(113, 17, 2, '2025-07-13', 'Wound Care', 'Anemia', 'ccc', NULL, '2025-07-16 06:07:11', '2025-07-16 06:07:11'),
(114, 7, 2, '2025-07-08', 'Blood Pressure Monitoring', 'Multiple Abrasion', 'Water', NULL, '2025-07-16 06:07:42', '2025-07-16 06:07:42'),
(115, 1, 2, '2025-07-08', 'Check-up', 'Sprain', 'Vaccine', NULL, '2025-07-16 06:08:20', '2025-07-16 06:08:20'),
(116, 23, 2, '2025-07-08', 'Dental Check-up', 'Fever', 'Qwerty', NULL, '2025-07-16 06:09:08', '2025-07-16 06:09:08'),
(117, 2, 2, '2025-07-04', 'Dental Check-up', 'Allergy', 'pills', NULL, '2025-07-16 06:09:46', '2025-07-16 06:09:46'),
(118, 11, 2, '2025-07-03', 'Dental Check-up, Wound Care', 'Dengue, Insect Bite', 'None', NULL, '2025-07-16 06:10:14', '2025-07-16 06:10:14'),
(119, 6, 2, '2025-07-03', 'Dental Check-up', 'Insect Bite', 'none', NULL, '2025-07-16 06:10:29', '2025-07-16 06:10:29'),
(120, 16, 2, '2025-07-03', 'Blood Pressure Monitoring', 'Headache', 'Biogesic', NULL, '2025-07-16 06:10:50', '2025-07-16 06:10:50'),
(121, 10, 2, '2025-07-03', 'Dental Check-up', 'Fall', 'Tite', NULL, '2025-07-16 06:11:05', '2025-07-16 06:11:05'),
(122, 21, 2, '2025-07-03', 'Dental Check-up', 'Abortion', 'dasdsa', NULL, '2025-07-16 06:11:27', '2025-07-16 06:11:27'),
(123, 16, 1, '2025-07-16', 'Blood Pressure Monitoring', 'Hypertension', 'Biogesic', NULL, '2025-07-16 06:41:24', '2025-07-16 06:41:24'),
(124, 26, 1, '2025-07-16', 'Prenatal Check', 'Flu', NULL, NULL, '2025-07-16 07:09:40', '2025-07-16 07:09:40'),
(125, 26, 5, '2025-07-16', 'Prenatal Check', 'Flu', 'qwerty', NULL, '2025-07-16 11:43:29', '2025-07-16 11:43:29'),
(126, 27, 1, '2025-07-19', 'Dental Check-up', 'Hypertension', 'dd', NULL, '2025-07-19 12:23:07', '2025-07-19 12:23:07'),
(127, 16, 1, '2025-07-19', 'Blood Pressure Monitoring', 'Diarrhea', 'Biogesic', NULL, '2025-07-19 13:58:10', '2025-07-19 13:58:10'),
(128, 26, 5, '2025-07-16', 'Prenatal Check', 'Abortion', 'qwerty', NULL, '2025-07-22 13:00:24', '2025-07-22 13:00:24'),
(129, 16, 5, '2025-07-19', 'Prenatal Check', 'Vaginitis', 'Biogesic', NULL, '2025-07-22 13:00:32', '2025-07-22 13:00:32'),
(130, 26, 1, '2025-07-16', 'Prenatal Check', 'Abortion, Flu', 'qwerty', NULL, '2025-07-22 14:22:32', '2025-07-22 14:22:32'),
(131, 33, 5, '2025-07-22', 'Prenatal Check', '', 'asdas', NULL, '2025-07-22 14:31:26', '2025-07-22 14:31:26'),
(132, 33, 5, '2025-07-22', 'Prenatal Check', 'Vaginitis', 'asdas', NULL, '2025-07-22 14:32:01', '2025-07-22 14:32:01'),
(133, 32, 5, '2025-07-22', 'Prenatal Check', 'Abortion', 'asdas', NULL, '2025-07-22 14:32:14', '2025-07-22 14:32:14'),
(134, 31, 1, '2025-07-22', 'Immunization', 'Chickenpox', 'asdas', NULL, '2025-07-22 14:32:47', '2025-07-22 14:32:47'),
(135, 30, 1, '2025-07-22', 'Prenatal Check', 'Essentially Well', 'asdas', NULL, '2025-07-22 14:33:19', '2025-07-22 14:33:19'),
(136, 31, 1, '2025-07-22', 'Immunization', 'Chickenpox', 'asdas', NULL, '2025-07-22 14:33:37', '2025-07-22 14:33:37'),
(137, 32, 1, '2025-07-22', 'Blood Pressure Monitoring', 'Boil', 'asdas', NULL, '2025-07-22 14:34:07', '2025-07-22 14:34:07'),
(138, 31, 1, '2025-07-22', 'Immunization', 'Loss of consciousness', 'asdas', NULL, '2025-07-22 14:34:25', '2025-07-22 14:34:25'),
(139, 32, 1, '2025-07-22', 'Blood Pressure Monitoring', '', 'asdas', NULL, '2025-07-22 14:34:37', '2025-07-22 14:34:37'),
(140, 32, 1, '2025-07-22', 'Blood Pressure Monitoring', 'Fever', 'asdas', NULL, '2025-07-22 14:34:45', '2025-07-22 14:34:45'),
(141, 29, 1, '2025-07-22', 'Prenatal Check', 'Headache', 'asdas', NULL, '2025-07-22 14:35:06', '2025-07-22 14:35:06'),
(142, 33, 1, '2025-07-22', 'Prenatal Check', 'Hypertension', 'asdas', NULL, '2025-07-22 14:35:34', '2025-07-22 14:35:34'),
(143, 28, 1, '2025-07-22', 'Prenatal Check', 'Essentially Well', 'asdas', NULL, '2025-07-22 14:35:51', '2025-07-22 14:35:51'),
(144, 33, 1, '2025-07-22', 'Prenatal Check', 'Essentially Well', 'asdas', NULL, '2025-07-22 14:38:42', '2025-07-22 14:38:42'),
(145, 29, 1, '2025-07-22', 'Prenatal Check', 'Chickenpox', 'asdas', NULL, '2025-07-22 14:38:59', '2025-07-22 14:38:59'),
(146, 33, 1, '2025-07-22', 'Prenatal Check', 'Diarrhea, Fever, Hypertension', 'asdas', NULL, '2025-07-22 14:42:41', '2025-07-22 14:42:41'),
(147, 29, 1, '2025-07-22', 'Prenatal Check', 'Chickenpox, Headache, Hypertension', 'asdas', NULL, '2025-07-22 14:51:15', '2025-07-22 14:51:15'),
(148, 29, 1, '2025-07-22', 'Prenatal Check', 'Chickenpox', 'asdas', NULL, '2025-07-22 14:56:17', '2025-07-22 14:56:17'),
(149, 1, 1, '2025-07-08', 'Check-up', 'Essentially Well', 'Vaccine', NULL, '2025-07-22 14:56:50', '2025-07-22 14:56:50'),
(150, 34, 1, '2025-07-29', 'Immunization', 'Essentially Well', NULL, NULL, '2025-07-29 02:00:29', '2025-07-29 02:00:29'),
(151, 35, 1, '2025-07-29', 'Immunization', 'Essentially Well', 'Vaccine', NULL, '2025-07-29 02:02:04', '2025-07-29 02:02:04'),
(152, 36, 1, '2025-07-29', 'Wound Care', 'Insect Bite', 'Vaccine', NULL, '2025-07-29 02:03:30', '2025-07-29 02:03:30'),
(153, 35, 1, '2025-07-29', 'Immunization', '', 'Vaccine', NULL, '2025-07-29 02:27:16', '2025-07-29 02:27:16'),
(154, 35, 1, '2025-07-29', 'Immunization', 'Diarrhea', 'Vaccine', NULL, '2025-07-29 02:27:29', '2025-07-29 02:27:29'),
(155, 34, 1, '2025-07-29', 'Immunization', 'Fever', NULL, NULL, '2025-07-29 02:27:44', '2025-07-29 02:27:44'),
(156, 4, 1, '2025-07-29', 'Dental Check-up', 'Diarrhea', 'Paracetamol,Vaccine', NULL, '2025-07-29 02:44:12', '2025-07-29 02:44:12'),
(157, 7, 1, '2025-07-08', 'Blood Pressure Monitoring', 'Headache', 'Water', NULL, '2025-07-29 02:44:59', '2025-07-29 02:44:59'),
(158, 34, 1, '2025-07-29', 'Immunization', 'Fever, Diarrhea, Headache', NULL, NULL, '2025-07-29 02:49:20', '2025-07-29 02:49:20'),
(159, 37, 1, '2025-07-29', 'Dental Check-up', 'Chickenpox', 'Vaccine', NULL, '2025-07-29 03:05:44', '2025-07-29 03:05:44'),
(160, 37, 1, '2025-07-29', 'Dental Check-up', '', 'Vaccine', NULL, '2025-07-29 07:54:42', '2025-07-29 07:54:42'),
(161, 29, 1, '2025-07-22', 'Prenatal Check', '', 'asdas', NULL, '2025-07-29 07:57:14', '2025-07-29 07:57:14'),
(162, 29, 1, '2025-07-22', 'Prenatal Check', 'Flu', 'asdas', NULL, '2025-07-29 08:05:13', '2025-07-29 08:05:13'),
(163, 37, 1, '2025-07-29', 'Dental Check-up', 'Chickenpox', 'Vaccine', NULL, '2025-07-29 08:05:32', '2025-07-29 08:05:32'),
(164, 37, 1, '2025-07-29', 'Dental Check-up', '', 'Vaccine', NULL, '2025-07-29 14:29:07', '2025-07-29 14:29:07'),
(165, 37, 1, '2025-07-29', 'Dental Check-up', 'Flu', 'Vaccine', 'Cleared', '2025-07-29 15:01:34', '2025-07-29 15:01:34'),
(166, 37, 1, '2025-07-29', 'Dental Check-up', 'Flu', 'Vaccine', 'Cleared', '2025-07-29 15:05:29', '2025-07-29 15:05:29'),
(167, 37, 1, '2025-07-29', 'Dental Check-up', 'Chickenpox', 'Vaccine', 'Cleared', '2025-07-29 15:31:22', '2025-07-29 15:31:22'),
(168, 38, 1, '2025-07-29', 'Prenatal Check', 'UTI', '123', 'Under Treatment', '2025-07-29 15:34:56', '2025-07-29 15:34:56'),
(169, 38, 1, '2025-07-29', 'Prenatal Check', 'Cat bite', '123', 'Under Treatment', '2025-07-29 15:37:29', '2025-07-29 15:37:29'),
(170, 39, 1, '2025-07-29', 'Blood Pressure Monitoring', 'Colds', '333', 'Under Treatment', '2025-07-29 15:44:00', '2025-07-29 15:44:00'),
(171, 38, 1, '2025-07-29', 'Prenatal Check', 'Osteoarthritis', '123', 'Under Treatment', '2025-07-29 15:46:00', '2025-07-29 15:46:00'),
(172, 4, 1, '2025-07-29', 'Dental Check-up', 'Colds', 'Paracetamol,Vaccine', 'Under Treatment', '2025-07-29 15:48:56', '2025-07-29 15:48:56'),
(173, 40, 1, '2025-07-29', 'Check-up', 'Anemia', 'cc', 'Under Treatment', '2025-07-29 16:08:56', '2025-07-29 16:08:56'),
(174, 40, 1, '2025-07-29', 'Check-up', 'Chickenpox', 'cc', 'Under Treatment', '2025-07-29 16:13:04', '2025-07-29 16:13:04'),
(175, 41, 1, '2025-07-29', 'Prenatal Check', 'Flu', NULL, 'Under Treatment', '2025-07-29 16:14:48', '2025-07-29 16:14:48'),
(176, 41, 1, '2025-07-29', 'Prenatal Check', '', NULL, 'Under Treatment', '2025-07-29 16:52:51', '2025-07-29 16:52:51'),
(177, 41, 1, '2025-07-29', 'Prenatal Check', '', NULL, 'Cleared', '2025-07-29 16:54:12', '2025-07-29 16:54:12'),
(178, 40, 1, '2025-07-29', 'Check-up', '', 'cc', 'Under Treatment', '2025-07-29 16:54:46', '2025-07-29 16:54:46'),
(179, 40, 1, '2025-07-29', 'Check-up', 'Diarrhea', 'cc', 'Under Treatment', '2025-07-29 17:00:21', '2025-07-29 17:00:21'),
(180, 4, 1, '2025-07-29', 'Dental Check-up', 'Colds', 'Paracetamol,Vaccine', 'Cleared', '2025-07-29 17:00:33', '2025-07-29 17:00:33'),
(181, 4, 1, '2025-07-29', 'Dental Check-up', '', 'Paracetamol,Vaccine', 'Under Treatment', '2025-07-29 17:01:04', '2025-07-29 17:01:04'),
(182, 4, 1, '2025-07-29', 'Dental Check-up', '', 'Paracetamol,Vaccine', 'Cleared', '2025-07-29 17:01:25', '2025-07-29 17:01:25'),
(183, 38, 1, '2025-07-29', 'Prenatal Check', '', '123', 'Cleared', '2025-07-29 17:01:47', '2025-07-29 17:01:47'),
(184, 38, 1, '2025-08-04', 'Check-up', 'Fever', 'Paracetamol', 'Under Treatment', '2025-08-04 06:53:19', '2025-08-04 06:53:19'),
(185, 38, 1, '2025-08-04', 'Check-up', 'Fever', 'Paracetamol', 'Under Treatment', '2025-08-04 07:15:29', '2025-08-04 07:15:29'),
(186, 38, 1, '2025-08-04', 'Check-up', 'Fever', 'Paracetamol', 'Under Treatment', '2025-08-04 07:35:36', '2025-08-04 07:35:36'),
(187, 34, 4, '2025-07-29', 'Dental Check-up', 'ACL', NULL, 'Under Treatment', '2025-08-04 10:44:19', '2025-08-04 10:44:19'),
(188, 42, 5, '2025-08-04', 'Check up ( no nurse, no physician)', '', '123', 'Under Treatment', '2025-08-04 13:14:15', '2025-08-04 13:14:15'),
(189, 42, 1, '2025-08-04', 'Check up ( no nurse, no physician)', '', '123', 'Under Treatment', '2025-08-08 04:39:37', '2025-08-08 04:39:37'),
(190, 42, 1, '2025-08-04', 'Check up ( no nurse, no physician)', '', '123', 'Under Treatment', '2025-08-08 04:40:02', '2025-08-08 04:40:02'),
(191, 42, 1, '2025-08-04', 'Check up ( no nurse, no physician)', '', '123', 'Under Treatment', '2025-08-08 04:46:46', '2025-08-08 04:46:46'),
(192, 4, 1, '2025-07-29', 'Dental Check-up', 'Chickenpox', 'Paracetamol,Vaccine', 'Under Treatment', '2025-08-08 04:47:05', '2025-08-08 04:47:05'),
(193, 42, 1, '2025-08-04', 'Check up ( no nurse, no physician)', '', '123', 'Under Treatment', '2025-08-08 04:49:57', '2025-08-08 04:49:57'),
(194, 42, 1, '2025-08-04', 'Check up ( no nurse, no physician)', '', '123', 'Under Treatment', '2025-08-08 04:51:26', '2025-08-08 04:51:26'),
(195, 41, 1, '2025-07-29', 'Prenatal Check', '', NULL, 'Under Treatment', '2025-08-08 04:51:51', '2025-08-08 04:51:51'),
(196, 41, 1, '2025-07-29', 'Prenatal Check', '', '333', 'Under Treatment', '2025-08-08 04:59:32', '2025-08-08 04:59:32'),
(197, 1, 1, '2025-07-08', 'Check-up', '', 'Vaccine', 'Under Treatment', '2025-08-08 05:04:59', '2025-08-08 05:04:59'),
(198, 1, 1, '2025-08-08', 'Check-up', '', 'Vaccine', 'Under Treatment', '2025-08-08 05:09:12', '2025-08-08 05:09:12'),
(199, 1, 1, '2025-08-08', 'Check-up', '', 'Vaccine', 'Under Treatment', '2025-08-08 05:12:08', '2025-08-08 05:12:08'),
(201, 1, 1, '2025-08-08', 'Check-up', 'wqewq', 'Vaccine', 'Under Treatment', '2025-08-11 12:37:07', '2025-08-11 12:37:07'),
(208, 46, 1, '2025-08-20', 'Check-up', 'Colds', NULL, 'Under Treatment', '2025-08-19 17:16:22', '2025-08-19 17:16:22'),
(209, 42, 1, '2025-08-04', 'Blood Pressure Monitoring', 'ACL, Fever', '123', 'Under Treatment', '2025-08-19 17:20:10', '2025-08-19 17:20:10'),
(210, 42, 1, '2025-08-04', 'Blood Pressure Monitoring', 'ACL, Fever', '123', 'Under Treatment', '2025-08-19 17:46:29', '2025-08-19 17:46:29'),
(211, 42, 1, '2025-08-04', 'Blood Pressure Monitoring', 'ACL, Fever', '123', 'Cleared', '2025-08-19 18:52:55', '2025-08-19 18:52:55'),
(212, 47, 1, '2025-08-23', 'Check-up', 'Sprain', 'sdasdas', 'Under Treatment', '2025-08-23 15:25:45', '2025-08-23 15:25:45'),
(213, 47, 1, '2025-08-23', 'Check-up', 'Sprain', 'sdasdas', 'Cleared', '2025-08-27 06:28:11', '2025-08-27 06:28:11'),
(214, 48, 1, '2025-09-03', 'Check-up', 'Insect Bite', '12312312', 'Under Treatment', '2025-09-03 08:26:59', '2025-09-03 08:26:59'),
(215, 49, 1, '2025-09-03', 'Check-up', 'Insect Bite', '12312312', 'Under Treatment', '2025-09-03 08:27:00', '2025-09-03 08:27:00'),
(216, 50, 1, '2025-09-03', 'Dental Check-up', 'Acute tonsillopharyngitis', '12312312', 'Under Treatment', '2025-09-03 08:28:11', '2025-09-03 08:28:11'),
(217, 51, 1, '2025-09-03', 'Dental Check-up', 'Acute tonsillopharyngitis', '12312312', 'Under Treatment', '2025-09-03 08:28:11', '2025-09-03 08:28:11'),
(218, 50, 1, '2025-09-03', 'Dental Check-up', 'Acute tonsillopharyngitis', '12312312', 'Under Treatment', '2025-09-03 08:29:48', '2025-09-03 08:29:48'),
(219, 49, 1, '2025-09-03', 'Check-up', 'Fever', '12312312', 'Under Treatment', '2025-09-03 08:33:59', '2025-09-03 08:33:59'),
(220, 52, 1, '2025-09-03', 'Dental Check-up', 'Acute Gastroenteritis', '333', 'Under Treatment', '2025-09-03 08:42:22', '2025-09-03 08:42:22'),
(221, 53, 1, '2025-09-06', 'Check-up', 'Diarrhea', '123', 'Under Treatment', '2025-09-06 07:50:23', '2025-09-06 07:50:23'),
(222, 41, 1, '2025-07-29', 'Prenatal Check', 'Flu', '333', 'Cleared', '2025-09-07 13:39:33', '2025-09-07 13:39:33'),
(223, 41, 1, '2025-08-28', 'Prenatal Check', 'Flu', '333', 'Cleared', '2025-09-07 14:23:54', '2025-09-07 14:23:54'),
(224, 16, 1, '2025-07-19', 'Prenatal Check', 'Diarrhea', 'Biogesic', 'Cleared', '2025-09-07 14:40:45', '2025-09-07 14:40:45'),
(225, 16, 1, '2025-07-19', 'Prenatal Check', 'Diarrhea', 'Biogesic', 'Cleared', '2025-09-08 12:36:32', '2025-09-08 12:36:32'),
(226, 16, 1, '2025-07-19', 'Prenatal Check', 'Diarrhea', 'Biogesic', 'Cleared', '2025-09-08 12:36:47', '2025-09-08 12:36:47'),
(227, 16, 4, '2025-09-13', 'Dental Check-up', 'Tooth Extraction', 'Biogesic', 'Under Treatment', '2025-09-13 08:19:25', '2025-09-13 08:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_23_121357_create_health_records_table', 1),
(5, '2025_05_23_155212_add_gender_to_health_records_table', 1),
(6, '2025_05_24_021331_add_contact_number_to_health_records_table', 1),
(7, '2025_05_24_214152_add_height_and_weight_to_health_records_table', 1),
(8, '2025_05_26_233621_add_google_id_to_users_table', 1),
(9, '2025_05_28_140413_add_medical_diagnosis_to_health_records_table', 1),
(10, '2025_05_28_150931_make_visit_purpose_nullable_in_health_records_table', 1),
(11, '2025_05_28_151228_make_medical_diagnosis_nullable_in_health_records_table', 1),
(12, '2025_05_28_175452_split_name_into_first_last_in_health_records_table', 1),
(13, '2025_06_03_181614_add_birth_date_to_health_records_table', 1),
(14, '2025_06_11_174301_add_other_purpose_to_health_records_table', 1),
(15, '2025_06_16_165045_create_staff_table', 1),
(16, '2025_06_16_194720_create_action_logs_table', 1),
(17, '2025_06_17_151723_add_role_to_users_table', 1),
(18, '2025_06_17_170556_add_profile_fields_to_users_table', 1),
(19, '2025_06_17_183039_add_date_consulted_to_health_records_table', 1),
(20, '2025_06_21_181401_add_street_to_health_records_table', 1),
(21, '2025_06_27_143339_create_history_records_table', 2),
(22, '2025_06_27_151414_add_user_id_to_history_records', 3),
(23, '2025_06_27_155707_add_given_medicine_to_history_records', 4),
(24, '2025_07_02_155553_add_columns_to_action_logs_table', 5),
(25, '2025_07_02_160100_remove_action_column_from_action_logs_table', 6),
(26, '2025_07_02_182906_add_age_unit_to_health_records_table', 7),
(27, '2025_07_02_204150_make_age_nullable_in_health_records', 8),
(28, '2025_07_05_230648_add_deleted_at_to_health_records_table', 9),
(29, '2025_07_06_001555_add_archived_at_to_health_records_table', 10),
(30, '2025_07_06_002241_drop_archived_at_from_health_records_table', 11),
(31, '2025_07_10_160136_create_case_area_settings_table', 12),
(33, '2025_07_15_165545_add_visible_to_roles_to_diagnoses_table', 13),
(36, '2025_07_15_165703_create_diagnoses_table', 14),
(37, '2025_07_16_102947_add_health_records_medical_diagnoses_', 14),
(38, '2025_07_29_222456_add_status_to_health_records_table', 15),
(39, '2025_07_29_230101_add_status_to_history_records_table', 16),
(40, '2025_07_29_232507_add_blood_type_to_health_records_table', 17),
(43, '2025_07_29_235155_add_philhealth_number_to_health_records_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `hire_date` date NOT NULL DEFAULT '2025-06-27',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `email`, `phone`, `date_of_birth`, `country`, `city`, `postal_code`, `avatar`, `google_id`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Yhin Kael', NULL, NULL, 'kaelyhin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '106184968317671676383', NULL, '$2y$12$vp1y7zehIEzTx/Myy2zQbOcbT3cdd5Gt.uQXqM0C4pi/Kms5qluFe', 'physician', 'ftcMSafPEeJrpJJDpd9suuuBHkNZyEvycjYYyr99hgX8dggXiiIIXmQQesOJ', '2025-06-26 22:39:01', '2025-09-09 06:43:26'),
(2, 'Physician', NULL, NULL, 'physician.barangaydaangbakal@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '114737083544360379400', NULL, '$2y$12$rLzgocd9eHuuh1mLXV0gsOAc/Dmw3KXIsd.GGAlnFM16GfcvjCtKG', 'physician', NULL, '2025-06-28 09:35:34', '2025-08-19 07:24:29'),
(3, 'Nurse', NULL, NULL, 'nurse.barangaydaangbakal@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '115615638332779699662', NULL, '$2y$12$NgcG9Did.xFRoht3mwpEqe8dkZYYDzwhStH0ByjA2yN/aGS7eN9gG', 'nurse', NULL, '2025-06-28 09:36:46', '2025-09-07 14:10:04'),
(4, 'Dentist', NULL, NULL, 'dentist.barangaydaangbakal@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '103681353673137788673', NULL, '$2y$12$icQeJgEb3tieSFvEua00OuA.CEl6OA.QKzOEm1W.nB45/cd563pl6', 'dentist', NULL, '2025-07-01 07:48:24', '2025-09-13 07:20:03'),
(5, 'Midwife', NULL, NULL, 'midwife.barangaydaangbakal@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '106915250787647441188', NULL, '$2y$12$SlWni5FZWwf3UmwW7PSI1.w7ZgLbuz8YZyUh575DJqWHxuVCVSM5a', 'midwife', NULL, '2025-07-01 10:39:14', '2025-08-18 06:39:48'),
(6, 'Admin', NULL, NULL, 'ad.barangaydaangbakal@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '113022010729098621786', NULL, '$2y$12$ubvjHK3jljgnijvUVjvkMelKrDD9sInPWb3sSGPla4OtqLhpimXyO', 'admin', NULL, '2025-07-02 09:20:51', '2025-09-13 07:08:11'),
(7, 'Dominic Almazan', NULL, NULL, 'dmncalmzn@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '100453523825239871390', NULL, '$2y$12$txCPybMx.6D7mR6W7X84g.is2DD6nMpCLHX/mJjmy235qvMvnmRyC', 'user', NULL, '2025-07-08 11:22:22', '2025-08-23 15:39:00'),
(8, 'Dominic Almazan', NULL, NULL, 'dominicalmazan25@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '106189201856789413720', NULL, '$2y$12$rgGzl6eh5OrHiQ4E3h8Whe.TtjN.lwIppqNohkIkAdHiROtgsRYnK', 'user', NULL, '2025-08-14 09:47:48', '2025-08-14 09:47:48'),
(11, 'Ma. Leigh Nadyn Pajanustan', NULL, NULL, 'maleighnadyn.pajanustan@my.jru.edu', NULL, NULL, NULL, NULL, NULL, NULL, '116940650609256810912', NULL, '$2y$12$ApRUnH0nskCfPI0YBl9FweDSo7P9nXVEzIE5OPWhltXSco8IITBC2', 'user', NULL, '2025-09-02 06:53:41', '2025-09-02 08:34:55'),
(12, 'Yhin Khael', NULL, NULL, 'khaelyhin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '102819203233285570587', NULL, '$2y$12$1zpL2Yd6M2siNlQtKmRt/ObWFVifV84yQ9DPwFWkmLeeEt2UE7Say', 'user', NULL, '2025-09-03 08:22:43', '2025-09-03 08:22:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_logs`
--
ALTER TABLE `action_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `action_logs_user_id_foreign` (`user_id`),
  ADD KEY `action_logs_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `case_area_settings`
--
ALTER TABLE `case_area_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `health_records`
--
ALTER TABLE `health_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_records_medical_diagnoses`
--
ALTER TABLE `health_records_medical_diagnoses`
  ADD KEY `health_records_medical_diagnoses_health_record_id_foreign` (`health_record_id`),
  ADD KEY `health_records_medical_diagnoses_diagnosis_id_foreign` (`diagnosis_id`);

--
-- Indexes for table `history_records`
--
ALTER TABLE `history_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_records_health_record_id_foreign` (`health_record_id`),
  ADD KEY `history_records_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `action_logs`
--
ALTER TABLE `action_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `case_area_settings`
--
ALTER TABLE `case_area_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `health_records`
--
ALTER TABLE `health_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `history_records`
--
ALTER TABLE `history_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `action_logs`
--
ALTER TABLE `action_logs`
  ADD CONSTRAINT `action_logs_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `health_records` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `action_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `health_records_medical_diagnoses`
--
ALTER TABLE `health_records_medical_diagnoses`
  ADD CONSTRAINT `health_records_medical_diagnoses_diagnosis_id_foreign` FOREIGN KEY (`diagnosis_id`) REFERENCES `diagnoses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `health_records_medical_diagnoses_health_record_id_foreign` FOREIGN KEY (`health_record_id`) REFERENCES `health_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `history_records`
--
ALTER TABLE `history_records`
  ADD CONSTRAINT `history_records_health_record_id_foreign` FOREIGN KEY (`health_record_id`) REFERENCES `health_records` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `history_records_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
