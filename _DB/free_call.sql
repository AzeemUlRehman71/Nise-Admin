-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2020 at 02:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `free_call`
--

-- --------------------------------------------------------

--
-- Table structure for table `added_users`
--

CREATE TABLE `added_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `added_users`
--

INSERT INTO `added_users` (`id`, `number`, `user_id`, `created_at`, `updated_at`) VALUES
(3, '+92ZF5OxIxvL', 365, NULL, NULL),
(4, '+92grMKgMqiA', 446, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `midname`, `lastname`, `email`, `address`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mubashir', 'hussain', 'mubashir', 'admin@admin.com', NULL, '$2y$10$dIu/4/wAQtvBrJbDfLaHA.wBlhI60EWbdV3xfLtkmjgM257tdbjby', 'T6mNTJBmM0afVrqK7cuDPkqFwZP0UifmuA7iee91XHVFBaSrSWyC9WOmprei', NULL, '2020-05-22 01:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `native_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rewarded_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inersitial_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `company`, `app_id`, `banner_id`, `native_id`, `rewarded_id`, `inersitial_id`, `created_at`, `updated_at`) VALUES
(1, 'new', '2', '13', '4', '35', '24', '2020-05-21 06:32:12', '2020-06-06 05:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `call_rates`
--

CREATE TABLE `call_rates` (
  `id` int(11) NOT NULL,
  `iso` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `dialcode` varchar(10) NOT NULL,
  `cost` varchar(10) NOT NULL,
  `call_rate` varchar(10) NOT NULL,
  `flag_image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `call_rates`
--

INSERT INTO `call_rates` (`id`, `iso`, `name`, `dialcode`, `cost`, `call_rate`, `flag_image`, `created_at`, `updated_at`) VALUES
(1, 'AL', 'Albania', '+355', '1.705', '1.705', 'U+1F1E6 U+1F1F1', NULL, '2020-05-07 07:37:45'),
(2, 'AS', 'AmericanSamoa', '+1 684', '0.409', '0.409', 'U+1F1E6 U+1F1F8', NULL, '2020-05-07 07:37:46'),
(3, 'DZ', 'Algeria', '+213', '1.346', '1.346', 'U+1F1E9 U+1F1FF', NULL, '2020-05-07 07:37:49'),
(4, 'AF', 'Afghanistan', '+93', '0.415', '0.415', 'U+1F1E6 U+1F1EB', NULL, '2020-05-07 07:37:45'),
(5, 'IL', 'Israel', '+972', '0.215', '0.215', 'U+1F1EE U+1F1F1', NULL, '2020-05-07 07:37:50'),
(6, 'AO', 'Angola', '+244', '0.813', '0.813', 'U+1F1E6 U+1F1F4', NULL, '2020-05-07 07:37:46'),
(7, 'AI', 'Anguilla', '+1 264', '0.604', '0.604', 'U+1F1E6 U+1F1EE', NULL, '2020-05-07 07:37:45'),
(8, 'AD', 'Andorra', '+376', '0.28', '0.28', 'U+1F1E6 U+1F1E9', NULL, '2020-05-07 07:37:45'),
(9, 'AG', 'Antigua and Barbuda', '+1268', '0.49', '0.49', 'U+1F1E6 U+1F1EC', NULL, '2020-05-07 07:37:45'),
(10, 'AR', 'Argentina', '+54', '0.32', '0.32', 'U+1F1E6 U+1F1F7', NULL, '2020-05-07 07:37:46'),
(11, 'AW', 'Aruba', '+297', '0.31', '0.31', 'U+1F1E6 U+1F1FC', NULL, '2020-05-07 07:37:46'),
(12, 'AM', 'Armenia', '+374', '0.3', '0.3', 'U+1F1E6 U+1F1F2', NULL, '2020-05-07 07:37:46'),
(13, 'AT', 'Austria', '+43', '0.28', '0.28', 'U+1F1E6 U+1F1F9', NULL, '2020-05-07 07:37:46'),
(14, 'AZ', 'Azerbaijan', '+994', '0.47', '0.47', 'U+1F1E6 U+1F1FF', NULL, '2020-05-07 07:37:46'),
(15, 'BS', 'Bahamas', '+1 242', '0.225', '0.225', 'U+1F1E7 U+1F1F8', NULL, '2020-05-07 07:37:47'),
(16, 'BH', 'Bahrain', '+973', '0.182', '0.182', 'U+1F1E7 U+1F1ED', NULL, '2020-05-07 07:37:47'),
(17, 'BB', 'Barbados', '+1 246', '0.33', '0.33', 'U+1F1E7 U+1F1E7', NULL, '2020-05-07 07:37:46'),
(18, 'BD', 'Bangladesh', '+880', '0.06', '0.06', 'U+1F1E7 U+1F1E9', NULL, '2020-05-07 07:37:46'),
(19, 'BY', 'Belarus', '+375', '0.54', '0.54', 'U+1F1E7 U+1F1FE', NULL, '2020-05-07 07:37:47'),
(20, 'BE', 'Belgium', '+32', '0.493', '0.493', 'U+1F1E7 U+1F1EA', NULL, '2020-05-07 07:37:46'),
(21, 'BZ', 'Belize', '+501', '0.35', '0.35', 'U+1F1E7 U+1F1FF', NULL, '2020-05-07 07:37:48'),
(22, 'BM', 'Bermuda', '+1 441', '0.05', '0.05', 'U+1F1E7 U+1F1F2', NULL, '2020-05-07 07:37:47'),
(23, 'BT', 'Bhutan', '+975', '0.16', '0.16', 'U+1F1E7 U+1F1F9', NULL, '2020-05-07 07:37:47'),
(24, 'BJ', 'Benin', '+229', '0.528', '0.528', 'U+1F1E7 U+1F1EF', NULL, '2020-05-07 07:37:47'),
(25, 'BW', 'Botswana', '+267', '0.319', '0.319', 'U+1F1E7 U+1F1FC', NULL, '2020-05-07 07:37:47'),
(26, 'BR', 'Brazil', '+55', '0.175', '0.175', 'U+1F1E7 U+1F1F7', NULL, '2020-05-07 07:37:47'),
(27, 'BG', 'Bulgaria', '+359', '0.437', '0.437', 'U+1F1E7 U+1F1EC', NULL, '2020-05-07 07:37:46'),
(28, 'BF', 'Burkina Faso', '+226', '0.542', '0.542', 'U+1F1E7 U+1F1EB', NULL, '2020-05-07 07:37:46'),
(29, 'BI', 'Burundi', '+257', '0.885', '0.885', 'U+1F1E7 U+1F1EE', NULL, '2020-05-07 07:37:47'),
(30, 'CM', 'Cameroon', '+237', '0.45', '0.45', 'U+1F1E8 U+1F1F2', NULL, '2020-05-07 07:37:48'),
(31, 'KH', 'Cambodia', '+855', '0.1', '0.1', 'U+1F1F0 U+1F1ED', NULL, '2020-05-07 07:37:51'),
(32, 'US', 'United States', '+1', '0.09', '0.09', 'U+1F1FA U+1F1F8', NULL, '2020-05-07 07:37:56'),
(33, 'CV', 'Cape Verde', '+238', '0.47', '0.47', 'U+1F1E8 U+1F1FB', NULL, '2020-05-07 07:37:49'),
(34, 'KY', 'Cayman Islands', '+ 345', '0.416', '0.416', 'U+1F1F0 U+1F1FE', NULL, '2020-05-07 07:37:51'),
(35, 'TD', 'Chad', '+235', '0.8', '0.8', 'U+1F1F9 U+1F1E9', NULL, '2020-05-07 07:37:56'),
(36, 'CL', 'Chile', '+56', '1.149', '1.149', 'U+1F1E8 U+1F1F1', NULL, '2020-05-07 07:37:48'),
(37, 'CN', 'China', '+86', '0.054', '0.054', 'U+1F1E8 U+1F1F3', NULL, '2020-05-07 07:37:48'),
(38, 'CO', 'Colombia', '+57', '0.07', '0.07', 'U+1F1E8 U+1F1F4', NULL, '2020-05-07 07:37:48'),
(39, 'KM', 'Comoros', '+269', '0.605', '0.605', 'U+1F1F0 U+1F1F2', NULL, '2020-05-07 07:37:51'),
(40, 'CG', 'Congo', '+242', '0.9', '0.9', 'U+1F1E8 U+1F1EC', NULL, '2020-05-07 07:37:48'),
(41, 'CR', 'Costa Rica', '+506', '0.115', '0.115', 'U+1F1E8 U+1F1F7', NULL, '2020-05-07 07:37:49'),
(42, 'CK', 'Cook Islands', '+682', '2.3', '2.3', 'U+1F1E8 U+1F1F0', NULL, '2020-05-07 07:37:48'),
(43, 'HR', 'Croatia', '+385', '0.735', '0.735', 'U+1F1ED U+1F1F7', NULL, '2020-05-07 07:37:50'),
(44, 'CU', 'Cuba', '+53', '1.015', '1.015', 'U+1F1E8 U+1F1FA', NULL, '2020-05-07 07:37:49'),
(45, 'CY', 'Cyprus', '+537', '0.16', '0.16', 'U+1F1E8 U+1F1FE', NULL, '2020-05-07 07:37:49'),
(46, 'CZ', 'Czech Republic', '+420', '0.115', '0.115', 'U+1F1E8 U+1F1FF', NULL, '2020-05-07 07:37:49'),
(47, 'DK', 'Denmark', '+45', '0.0508', '0.0508', 'U+1F1E9 U+1F1F0', NULL, '2020-05-07 07:37:49'),
(48, 'DM', 'Dominica', '+1 767', '0.588', '0.588', 'U+1F1E9 U+1F1F2', NULL, '2020-05-07 07:37:49'),
(49, 'DJ', 'Djibouti', '+253', '0.555', '0.555', 'U+1F1E9 U+1F1EF', NULL, '2020-05-07 07:37:49'),
(50, 'DO', 'Dominican Republic', '+1 849', '0.12', '0.12', 'U+1F1E9 U+1F1F4', NULL, '2020-05-07 07:37:49'),
(51, 'EC', 'Ecuador', '+593', '0.33', '0.33', 'U+1F1EA U+1F1E8', NULL, '2020-05-07 07:37:49'),
(52, 'EG', 'Egypt', '+20', '0.17', '0.17', 'U+1F1EA U+1F1EC', NULL, '2020-05-07 07:37:50'),
(53, 'SV', 'El Salvador', '+503', '0.29', '0.29', 'U+1F1F8 U+1F1FB', NULL, '2020-05-07 07:37:56'),
(54, 'GQ', 'Equatorial Guinea', '+240', '0.747', '0.747', 'U+1F1EC U+1F1F6', NULL, '2020-05-07 07:37:50'),
(55, 'ER', 'Eritrea', '+291', '0.335', '0.335', 'U+1F1EA U+1F1F7', NULL, '2020-05-07 07:37:50'),
(56, 'EE', 'Estonia', '+372', '0.4783', '0.4783', 'U+1F1EA U+1F1EA', NULL, '2020-05-07 07:37:50'),
(57, 'ET', 'Ethiopia', '+251', '0.36', '0.36', 'U+1F1EA U+1F1F9', NULL, '2020-05-07 07:37:50'),
(58, 'FO', 'Faroe Islands', '+298', '0.057', '0.057', 'U+1F1EB U+1F1F4', NULL, '2020-05-07 07:37:50'),
(59, 'FJ', 'Fiji', '+679', '0.406', '0.406', 'U+1F1EB U+1F1EF', NULL, '2020-05-07 07:37:50'),
(60, 'FI', 'Finland', '+358', '0.45', '0.45', 'U+1F1EB U+1F1EE', NULL, '2020-05-07 07:37:50'),
(61, 'GF', 'French Guiana', '+594', '0.155', '0.155', 'U+1F1EC U+1F1EB', NULL, '2020-05-07 07:37:50'),
(62, 'FR', 'France', '+33', '0.5', '0.5', 'U+1F1EB U+1F1F7', NULL, '2020-05-07 07:37:50'),
(63, 'PF', 'French Polynesia', '+689', '0.375', '0.375', 'U+1F1F5 U+1F1EB', NULL, '2020-05-07 07:37:55'),
(64, 'GA', 'Gabon', '+241', '0.775', '0.775', 'U+1F1EC U+1F1E6', NULL, '2020-05-07 07:37:50'),
(65, 'GM', 'Gambia', '+220', '0.825', '0.825', 'U+1F1EC U+1F1F2', NULL, '2020-05-07 07:37:50'),
(66, 'DE', 'Germany', '+49', '0.2', '0.2', 'U+1F1E9 U+1F1EA', NULL, '2020-05-07 07:37:49'),
(67, 'GE', 'Georgia', '+995', '0.3', '0.3', 'U+1F1EC U+1F1EA', NULL, '2020-05-07 07:37:50'),
(68, 'GR', 'Greece', '+30', '0.325', '0.325', 'U+1F1EC U+1F1F7', NULL, '2020-05-07 07:37:50'),
(69, 'GI', 'Gibraltar', '+350', '0.255', '0.255', 'U+1F1EC U+1F1EE', NULL, '2020-05-07 07:37:50'),
(70, 'GH', 'Ghana', '+233', '0.37', '0.37', 'U+1F1EC U+1F1ED', NULL, '2020-05-07 07:37:50'),
(71, 'GD', 'Grenada', '+1 473', '0.524', '0.524', 'U+1F1EC U+1F1E9', NULL, '2020-05-07 07:37:50'),
(72, 'GL', 'Greenland', '+299', '0.705', '0.705', 'U+1F1EC U+1F1F1', NULL, '2020-05-07 07:37:50'),
(73, 'GU', 'Guam', '+1 671', '0.04', '0.04', 'U+1F1EC U+1F1FA', NULL, '2020-05-07 07:37:50'),
(74, 'GT', 'Guatemala', '+502', '0.225', '0.225', 'U+1F1EC U+1F1F9', NULL, '2020-05-07 07:37:50'),
(75, 'GW', 'Guinea-Bissau', '+245', '1.009', '1.009', 'U+1F1EC U+1F1FC', NULL, '2020-05-07 07:37:50'),
(76, 'GN', 'Guinea', '+224', '0.667', '0.667', 'U+1F1EC U+1F1F3', NULL, '2020-05-07 07:37:50'),
(77, 'PY', 'Paraguay', '+595', '0.145', '0.145', 'U+1F1F5 U+1F1FE', NULL, '2020-05-07 07:37:55'),
(78, 'HT', 'Haiti', '+509', '0.42', '0.42', 'U+1F1ED U+1F1F9', NULL, '2020-05-07 07:37:50'),
(79, 'HN', 'Honduras', '+504', '0.225', '0.225', 'U+1F1ED U+1F1F3', NULL, '2020-05-07 07:37:50'),
(80, 'HU', 'Hungary', '+36', '0.105', '0.105', 'U+1F1ED U+1F1FA', NULL, '2020-05-07 07:37:50'),
(81, 'IS', 'Iceland', '+354', '0.05', '0.05', 'U+1F1EE U+1F1F8', NULL, '2020-05-07 07:37:51'),
(82, 'IN', 'India', '+91', '0.045', '0.045', 'U+1F1EE U+1F1F3', NULL, '2020-05-07 07:37:50'),
(83, 'ID', 'Indonesia', '+62', '0.085', '0.085', 'U+1F1EE U+1F1E9', NULL, '2020-05-07 07:37:50'),
(84, 'IQ', 'Iraq', '+964', '0.31', '0.31', 'U+1F1EE U+1F1F6', NULL, '2020-05-07 07:37:51'),
(85, 'IE', 'Ireland', '+353', '0.15', '0.15', 'U+1F1EE U+1F1EA', NULL, '2020-05-07 07:37:50'),
(86, 'IT', 'Italy', '+39', '0.315', '0.315', 'U+1F1EE U+1F1F9', NULL, '2020-05-07 07:37:51'),
(87, 'JM', 'Jamaica', '+1 876', '0.41', '0.41', 'U+1F1EF U+1F1F2', NULL, '2020-05-07 07:37:51'),
(88, 'JO', 'Jordan', '+962', '0.231', '0.231', 'U+1F1EF U+1F1F4', NULL, '2020-05-07 07:37:51'),
(89, 'JP', 'Japan', '+81', '0.185', '0.185', 'U+1F1EF U+1F1F5', NULL, '2020-05-07 07:37:51'),
(90, 'KZ', 'Kazakhstan', '+7 7', '0.251', '0.251', 'U+1F1F0 U+1F1FF', NULL, '2020-05-07 07:37:51'),
(91, 'KE', 'Kenya', '+254', '0.285', '0.285', 'U+1F1F0 U+1F1EA', NULL, '2020-05-07 07:37:51'),
(92, 'KG', 'Kyrgyzstan', '+996', '0.275', '0.275', 'U+1F1F0 U+1F1EC', NULL, '2020-05-07 07:37:51'),
(93, 'KW', 'Kuwait', '+965', '0.13', '0.13', 'U+1F1F0 U+1F1FC', NULL, '2020-05-07 07:37:51'),
(94, 'LV', 'Latvia', '+371', '0.825', '0.825', 'U+1F1F1 U+1F1FB', NULL, '2020-05-07 07:37:52'),
(95, 'LB', 'Lebanon', '+961', '0.28', '0.28', 'U+1F1F1 U+1F1E7', NULL, '2020-05-07 07:37:51'),
(96, 'LS', 'Lesotho', '+266', '0.631', '0.631', 'U+1F1F1 U+1F1F8', NULL, '2020-05-07 07:37:52'),
(97, 'LR', 'Liberia', '+231', '0.614', '0.614', 'U+1F1F1 U+1F1F7', NULL, '2020-05-07 07:37:52'),
(98, 'LI', 'Liechtenstein', '+423', '0.265', '0.265', 'U+1F1F1 U+1F1EE', NULL, '2020-05-07 07:37:52'),
(99, 'LU', 'Luxembourg', '+352', '0.23', '0.23', 'U+1F1F1 U+1F1FA', NULL, '2020-05-07 07:37:52'),
(100, 'LT', 'Lithuania', '+370', '0.443', '0.443', 'U+1F1F1 U+1F1F9', NULL, '2020-05-07 07:37:52'),
(101, 'MG', 'Madagascar', '+261', '0.88', '0.88', 'U+1F1F2 U+1F1EC', NULL, '2020-05-07 07:37:52'),
(102, 'MV', 'Maldives', '+960', '1.17', '1.17', 'U+1F1F2 U+1F1FB', NULL, '2020-05-07 07:37:53'),
(103, 'MW', 'Malawi', '+265', '0.687', '0.687', 'U+1F1F2 U+1F1FC', NULL, '2020-05-07 07:37:53'),
(104, 'MY', 'Malaysia', '+60', '0.08', '0.08', 'U+1F1F2 U+1F1FE', NULL, '2020-05-07 07:37:54'),
(105, 'MT', 'Malta', '+356', '0.426', '0.426', 'U+1F1F2 U+1F1F9', NULL, '2020-05-07 07:37:53'),
(106, 'ML', 'Mali', '+223', '0.589', '0.589', 'U+1F1F2 U+1F1F1', NULL, '2020-05-07 07:37:52'),
(107, 'MH', 'Marshall Islands', '+692', '0.355', '0.355', 'U+1F1F2 U+1F1ED', NULL, '2020-05-07 07:37:52'),
(108, 'MQ', 'Martinique', '+596', '0.254', '0.254', 'U+1F1F2 U+1F1F6', NULL, '2020-05-07 07:37:53'),
(109, 'MR', 'Mauritania', '+222', '0.858', '0.858', 'U+1F1F2 U+1F1F7', NULL, '2020-05-07 07:37:53'),
(110, 'MU', 'Mauritius', '+230', '0.195', '0.195', 'U+1F1F2 U+1F1FA', NULL, '2020-05-07 07:37:53'),
(111, 'RE', 'RÃ©union', '+262', '0.17', '0.17', 'U+1F1F7 U+1F1EA', NULL, '2020-05-07 07:37:55'),
(112, 'MC', 'Monaco', '+377', '0.55', '0.55', 'U+1F1F2 U+1F1E8', NULL, '2020-05-07 07:37:52'),
(113, 'ME', 'Montenegro', '+382', '0.708', '0.708', 'U+1F1F2 U+1F1EA', NULL, '2020-05-07 07:37:52'),
(114, 'MX', 'Mexico', '+52', '0.045', '0.045', 'U+1F1F2 U+1F1FD', NULL, '2020-05-07 07:37:54'),
(115, 'MN', 'Mongolia', '+976', '0.053', '0.053', 'U+1F1F2 U+1F1F3', NULL, '2020-05-07 07:37:53'),
(116, 'MS', 'Montserrat', '+1664', '0.345', '0.345', 'U+1F1F2 U+1F1F8', NULL, '2020-05-07 07:37:53'),
(117, 'MA', 'Morocco', '+212', '0.9543', '0.9543', 'U+1F1F2 U+1F1E6', NULL, '2020-05-07 07:37:52'),
(118, 'NA', 'Namibia', '+264', '0.165', '0.165', 'U+1F1F3 U+1F1E6', NULL, '2020-05-07 07:37:54'),
(119, 'MM', 'Myanmar', '+95', '0.365', '0.365', 'U+1F1F2 U+1F1F2', NULL, '2020-05-07 07:37:53'),
(120, 'NL', 'Netherlands', '+31', '0.75', '0.75', 'U+1F1F3 U+1F1F1', NULL, '2020-05-07 07:37:54'),
(121, 'NP', 'Nepal', '+977', '0.25', '0.25', 'U+1F1F3 U+1F1F5', NULL, '2020-05-07 07:37:54'),
(122, 'AN', 'Netherlands Antilles', '+599', '0.215', '0.215', '', NULL, NULL),
(123, 'NC', 'New Caledonia', '+687', '0.442', '0.442', 'U+1F1F3 U+1F1E8', NULL, '2020-05-07 07:37:54'),
(124, 'NZ', 'New Zealand', '+64', '0.08', '0.08', 'U+1F1F3 U+1F1FF', NULL, '2020-05-07 07:37:54'),
(125, 'NI', 'Nicaragua', '+505', '0.4', '0.4', 'U+1F1F3 U+1F1EE', NULL, '2020-05-07 07:37:54'),
(126, 'NE', 'Niger', '+227', '0.475', '0.475', 'U+1F1F3 U+1F1EA', NULL, '2020-05-07 07:37:54'),
(127, 'NG', 'Nigeria', '+234', '0.153', '0.153', 'U+1F1F3 U+1F1EC', NULL, '2020-05-07 07:37:54'),
(128, 'OM', 'Oman', '+968', '0.41', '0.41', 'U+1F1F4 U+1F1F2', NULL, '2020-05-07 07:37:54'),
(129, 'PK', 'Pakistan', '+92', '0.18', '0.18', 'U+1F1F5 U+1F1F0', NULL, '2020-05-22 04:15:22'),
(130, 'PW', 'Palau', '+680', '0.46', '0.46', 'U+1F1F5 U+1F1FC', NULL, '2020-05-07 07:37:55'),
(131, 'PA', 'Panama', '+507', '0.325', '0.325', 'U+1F1F5 U+1F1E6', NULL, '2020-05-07 07:37:54'),
(132, 'PG', 'Papua New Guinea', '+675', '1.15', '1.15', 'U+1F1F5 U+1F1EC', NULL, '2020-05-07 07:37:55'),
(133, 'PE', 'Peru', '+51', '0.435', '0.435', 'U+1F1F5 U+1F1EA', NULL, '2020-05-07 07:37:54'),
(134, 'PH', 'Philippines', '+63', '0.21', '0.21', 'U+1F1F5 U+1F1ED', NULL, '2020-05-07 07:37:55'),
(135, 'PL', 'Poland', '+48', '0.165', '0.165', 'U+1F1F5 U+1F1F1', NULL, '2020-05-07 07:37:55'),
(136, 'PT', 'Portugal', '+351', '0.495', '0.495', 'U+1F1F5 U+1F1F9', NULL, '2020-05-07 07:37:55'),
(137, 'PR', 'Puerto Rico', '+1 939', '0.02', '0.02', 'U+1F1F5 U+1F1F7', NULL, '2020-05-07 07:37:55'),
(138, 'QA', 'Qatar', '+974', '0.3', '0.3', 'U+1F1F6 U+1F1E6', NULL, '2020-05-07 07:37:55'),
(139, 'RW', 'Rwanda', '+250', '0.405', '0.405', 'U+1F1F7 U+1F1FC', NULL, '2020-05-07 07:37:55'),
(140, 'RO', 'Romania', '+40', '0.032', '0.032', 'U+1F1F7 U+1F1F4', NULL, '2020-05-07 07:37:55'),
(141, 'SM', 'San Marino', '+378', '0.505', '0.505', 'U+1F1F8 U+1F1F2', NULL, '2020-05-07 07:37:55'),
(142, 'WS', 'Samoa', '+685', '1.77', '1.77', 'U+1F1FC U+1F1F8', NULL, '2020-05-07 07:37:56'),
(143, 'SA', 'Saudi Arabia', '+966', '0.225', '0.225', 'U+1F1F8 U+1F1E6', NULL, '2020-05-07 07:37:55'),
(144, 'SN', 'Senegal', '+221', '0.745', '0.745', 'U+1F1F8 U+1F1F3', NULL, '2020-05-07 07:37:56'),
(145, 'RS', 'Serbia', '+381', '0.61', '0.61', 'U+1F1F7 U+1F1F8', NULL, '2020-05-07 07:37:55'),
(146, 'SC', 'Seychelles', '+248', '0.935', '0.935', 'U+1F1F8 U+1F1E8', NULL, '2020-05-07 07:37:55'),
(147, 'SL', 'Sierra Leone', '+232', '0.781', '0.781', 'U+1F1F8 U+1F1F1', NULL, '2020-05-07 07:37:55'),
(148, 'SG', 'Singapore', '+65', '0.055', '0.055', 'U+1F1F8 U+1F1EC', NULL, '2020-05-07 07:37:55'),
(149, 'SI', 'Slovenia', '+386', '0.555', '0.555', 'U+1F1F8 U+1F1EE', NULL, '2020-05-07 07:37:55'),
(150, 'SK', 'Slovakia', '+421', '0.096', '0.096', 'U+1F1F8 U+1F1F0', NULL, '2020-05-07 07:37:55'),
(151, 'SB', 'Solomon Islands', '+677', '1.52', '1.52', 'U+1F1F8 U+1F1E7', NULL, '2020-05-07 07:37:55'),
(152, 'ZA', 'South Africa', '+27', '0.85', '0.85', 'U+1F1FF U+1F1E6', NULL, '2020-05-07 07:37:56'),
(153, 'ES', 'Spain', '+34', '0.654', '0.654', 'U+1F1EA U+1F1F8', NULL, '2020-05-07 07:37:50'),
(154, 'SD', 'Sudan', '+249', '0.26', '0.26', 'U+1F1F8 U+1F1E9', NULL, '2020-05-07 07:37:55'),
(155, 'LK', 'Sri Lanka', '+94', '0.236', '0.236', 'U+1F1F1 U+1F1F0', NULL, '2020-05-07 07:37:52'),
(156, 'SR', 'Suriname', '+597', '1.21', '1.21', 'U+1F1F8 U+1F1F7', NULL, '2020-05-07 07:37:56'),
(157, 'SE', 'Sweden', '+46', '0.035', '0.035', 'U+1F1F8 U+1F1EA', NULL, '2020-05-07 07:37:55'),
(158, 'SZ', 'Swaziland', '+268', '0.348', '0.348', 'U+1F1F8 U+1F1FF', NULL, '2020-05-07 07:37:56'),
(159, 'TJ', 'Tajikistan', '+992', '0.225', '0.225', 'U+1F1F9 U+1F1EF', NULL, '2020-05-07 07:37:56'),
(160, 'TH', 'Thailand', '+66', '0.1', '0.1', 'U+1F1F9 U+1F1ED', NULL, '2020-05-07 07:37:56'),
(161, 'CH', 'Switzerland', '+41', '0.645', '0.645', 'U+1F1E8 U+1F1ED', NULL, '2020-05-07 07:37:48'),
(162, 'TG', 'Togo', '+228', '0.54', '0.54', 'U+1F1F9 U+1F1EC', NULL, '2020-05-07 07:37:56'),
(163, 'TT', 'Trinidad and Tobago', '+1 868', '0.34', '0.34', 'U+1F1F9 U+1F1F9', NULL, '2020-05-07 07:37:56'),
(164, 'TO', 'Tonga', '+676', '1.803', '1.803', 'U+1F1F9 U+1F1F4', NULL, '2020-05-07 07:37:56'),
(165, 'TN', 'Tunisia', '+216', '1.174', '1.174', 'U+1F1F9 U+1F1F3', NULL, '2020-05-07 07:37:56'),
(166, 'TM', 'Turkmenistan', '+993', '0.21', '0.21', 'U+1F1F9 U+1F1F2', NULL, '2020-05-07 07:37:56'),
(167, 'TR', 'Turkey', '+90', '0.2', '0.2', 'U+1F1F9 U+1F1F7', NULL, '2020-05-07 07:37:56'),
(168, 'UG', 'Uganda', '+256', '0.48', '0.48', 'U+1F1FA U+1F1EC', NULL, '2020-05-07 07:37:56'),
(169, 'UA', 'Ukraine', '+380', '0.41', '0.41', 'U+1F1FA U+1F1E6', NULL, '2020-05-07 07:37:56'),
(170, 'UY', 'Uruguay', '+598', '0.31', '0.31', 'U+1F1FA U+1F1FE', NULL, '2020-05-07 07:37:56'),
(171, 'AE', 'United Arab Emirates', '+971', '0.23', '0.23', 'U+1F1E6 U+1F1EA', NULL, '2020-05-07 07:37:45'),
(172, 'UZ', 'Uzbekistan', '+998', '0.17', '0.17', 'U+1F1FA U+1F1FF', NULL, '2020-05-07 07:37:56'),
(173, 'VU', 'Vanuatu', '+678', '0.95', '0.95', 'U+1F1FB U+1F1FA', NULL, '2020-05-07 07:37:56'),
(174, 'WF', 'Wallis and Futuna', '+681', '0.02', '0.02', 'U+1F1FC U+1F1EB', NULL, '2020-05-07 07:37:56'),
(175, 'ZM', 'Zambia', '+260', '0.69', '0.69', 'U+1F1FF U+1F1F2', NULL, '2020-05-07 07:37:56'),
(176, 'YE', 'Yemen', '+967', '0.23', '0.23', 'U+1F1FE U+1F1EA', NULL, '2020-05-07 07:37:56'),
(177, 'ZW', 'Zimbabwe', '+263', '0.71', '0.71', 'U+1F1FF U+1F1FC', NULL, '2020-05-07 07:37:56'),
(178, 'BN', 'Brunei Darussalam', '+673', '0.056', '0.056', 'U+1F1E7 U+1F1F3', NULL, '2020-05-07 07:37:47'),
(179, 'HK', 'Hong Kong', '+852', '0.046', '0.046', 'U+1F1ED U+1F1F0', NULL, '2020-05-07 07:37:50'),
(180, 'KR', 'Korea, Republic of', '+82', '0.035', '0.035', 'U+1F1F0 U+1F1F7', NULL, '2020-05-07 07:37:51'),
(181, 'MO', 'Macao', '+853', '0.12', '0.12', 'U+1F1F2 U+1F1F4', NULL, '2020-05-07 07:37:53'),
(182, 'MZ', 'Mozambique', '+258', '0.4', '0.4', 'U+1F1F2 U+1F1FF', NULL, '2020-05-07 07:37:54'),
(183, 'MD', 'Moldova, Republic of', '+373', '0.442', '0.442', 'U+1F1F2 U+1F1E9', NULL, '2020-05-07 07:37:52'),
(184, 'RU', 'Russia', '+7', '0.368', '0.368', 'U+1F1F7 U+1F1FA', NULL, '2020-05-07 07:37:55'),
(185, 'LC', 'Saint Lucia', '+1 758', '0.483', '0.483', 'U+1F1F1 U+1F1E8', NULL, '2020-05-07 07:37:52'),
(186, 'SO', 'Somalia', '+252', '0.768', '0.768', 'U+1F1F8 U+1F1F4', NULL, '2020-05-07 07:37:56'),
(187, 'SY', 'Syrian Arab Republic', '+963', '0.459', '0.459', 'U+1F1F8 U+1F1FE', NULL, '2020-05-07 07:37:56'),
(188, 'TL', 'Timor-Leste', '+670', '0.8', '0.8', 'U+1F1F9 U+1F1F1', NULL, '2020-05-07 07:37:56'),
(189, 'VN', 'Viet Nam', '+84', '0.12', '0.12', 'U+1F1FB U+1F1F3', NULL, '2020-05-07 07:37:56'),
(190, 'VI', 'Virgin Islands, U.S.', '+1 340', '0.036', '0.036', 'U+1F1FB U+1F1EE', NULL, '2020-05-07 07:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `checkin_credits`
--

CREATE TABLE `checkin_credits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `checkInStart` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `checkInEnd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `checkin_credits`
--

INSERT INTO `checkin_credits` (`id`, `checkInStart`, `checkInEnd`, `created_at`, `updated_at`) VALUES
(1, '100', '150', '2020-03-10 09:50:38', '2020-05-22 04:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE `credits` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` bigint(100) NOT NULL,
  `credits` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `credits`
--

INSERT INTO `credits` (`id`, `phone`, `credits`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1111111111, '50', 1, '2020-05-08 13:16:55', '2020-05-08 13:16:55'),
(2, 222222222, '12', 2, '2020-05-08 13:19:01', '2020-05-08 15:02:38'),
(3, 33333333, '50', 3, '2020-05-08 13:20:49', '2020-05-08 13:20:49'),
(4, 3333333311, '50', 4, '2020-05-08 13:36:35', '2020-05-08 13:36:35'),
(5, 3414810030, '100', 5, '2020-06-08 05:05:47', '2020-06-08 05:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friends_credits`
--

CREATE TABLE `friends_credits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inviteFriendsStart` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `inviteFriendsEnd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `friends_credits`
--

INSERT INTO `friends_credits` (`id`, `inviteFriendsStart`, `inviteFriendsEnd`, `created_at`, `updated_at`) VALUES
(1, '150', '200', '2020-03-10 14:00:00', '2020-05-22 04:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `google_billings`
--

CREATE TABLE `google_billings` (
  `id` int(10) UNSIGNED NOT NULL,
  `license_key` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `merchant_id` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `product_id` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `google_billings`
--

INSERT INTO `google_billings` (`id`, `license_key`, `merchant_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'lic key1', 'mer id2', 'pro id3', '2020-06-30 10:30:13', '2020-06-06 07:11:46');

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_05_01_103119_create_credit_table', 1),
(10, '2020_05_01_120352_create_admins_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('029b03f0e0e8f4e3ced4c9c13f24112677df6756a7ccf654e37ebcd5d81cdf0be5efbf847f27fb63', 27, 1, 'authToken', '[]', 0, '2020-05-05 06:38:15', '2020-05-05 06:38:15', '2021-05-05 11:38:15'),
('1fd8d730100c581ed2353b04eae02b2368e1ee03fd0563405fc8488331a73f89a7646816a78da6f6', 3, 1, 'authToken', '[]', 0, '2020-05-08 13:20:50', '2020-05-08 13:20:50', '2021-05-08 18:20:50'),
('20052858c95dcdd77ef17261e978dbf2c86649f0a91f472c19f1085ff5dc739248a9068681c00153', 37, 1, 'authToken', '[]', 0, '2020-05-08 13:04:56', '2020-05-08 13:04:56', '2021-05-08 18:04:56'),
('214a274b147752c078f3e248ce9fd18103da6be712111ec9cb9130cf372efa0a89737fca4319fc20', 35, 1, 'authToken', '[]', 0, '2020-05-06 12:46:57', '2020-05-06 12:46:57', '2021-05-06 17:46:57'),
('2655a92633de48909f1d373dce03b6d9666fd4b3b92cfaa185a0f7ea5a85aea86eace849cd154aa9', 37, 1, 'authToken', '[]', 0, '2020-05-08 13:03:08', '2020-05-08 13:03:08', '2021-05-08 18:03:08'),
('288dba5cb07b3b6e9a625594195374aa01983cb89864763f1d5690edb3ed32dd7172398139a5a16d', 31, 1, 'authToken', '[]', 0, '2020-05-06 02:08:20', '2020-05-06 02:08:20', '2021-05-06 07:08:20'),
('3bb6e9c89387ea20972d87c84692435de86e6703fe47e759f1e21fb7fe97d10b8a4abc992073516b', 1, 1, 'authToken', '[]', 0, '2020-05-08 13:17:23', '2020-05-08 13:17:23', '2021-05-08 18:17:23'),
('4384db05d9428f12d92b6a1582040e6300e8539b8a6393d03ceb6e9185226e4876e456bf7031252f', 35, 1, 'authToken', '[]', 0, '2020-05-06 12:41:20', '2020-05-06 12:41:20', '2021-05-06 17:41:20'),
('45b362ae4e8f78826af38bb115bac12e5d60bfed88c60a36fa8bbf4f02619788797839103406426c', 2, 1, 'authToken', '[]', 0, '2020-05-08 13:19:01', '2020-05-08 13:19:01', '2021-05-08 18:19:01'),
('4c56868a896a120a73bf80e93bb6c2f2d93791c55289da00dac091f22f2d37ac2be22430ef28c215', 35, 1, 'authToken', '[]', 0, '2020-05-06 02:27:06', '2020-05-06 02:27:06', '2021-05-06 07:27:06'),
('54189da93a4a9705376f6a2fd1dbf2482bd664d73751a11b98d64310491efd3cfba310eece0bcf54', 33, 1, 'authToken', '[]', 0, '2020-05-06 02:18:05', '2020-05-06 02:18:05', '2021-05-06 07:18:05'),
('5d5a124cdd6194351763bea7cc50a8f99ac72e6c3933ecb0a8562c1318d28466ee0666229ab82baf', 35, 1, 'authToken', '[]', 0, '2020-05-06 12:42:31', '2020-05-06 12:42:31', '2021-05-06 17:42:31'),
('6b142db674f019904ec4ce96371c89bc74f2d680bc7cf3dd5f442857300ffbe18f8701e51dd0d858', 26, 1, 'authToken', '[]', 0, '2020-05-05 06:36:41', '2020-05-05 06:36:41', '2021-05-05 11:36:41'),
('6cddf66764a8afc7af983a0996546fb5d56f4bc58c1dd6a15e4b3732f1706f0ed61b3cb25c3a3d96', 32, 1, 'authToken', '[]', 0, '2020-05-06 02:10:48', '2020-05-06 02:10:48', '2021-05-06 07:10:48'),
('7c1c36834189eaa12de78f559af4b1c71e896149a6025bd5606fa748e896e1b54cadb711476d32c2', 41, 1, 'authToken', '[]', 0, '2020-05-08 13:14:46', '2020-05-08 13:14:46', '2021-05-08 18:14:46'),
('80c3c86dafa1f74428aead45a943ef536d068f2dfca7ad1692b06efb164312e2052d0d1d4e9b27a8', 30, 1, 'authToken', '[]', 0, '2020-05-05 07:58:54', '2020-05-05 07:58:54', '2021-05-05 12:58:54'),
('94a572d74aabd00af88c1cece9e474ccda48a9494c452570734449c8bcd13c18f09c55def8bdefba', 38, 1, 'authToken', '[]', 0, '2020-05-08 13:05:22', '2020-05-08 13:05:22', '2021-05-08 18:05:22'),
('a7892f48ca925a9d7ff76fc84a314f4b01811d133e1cff6bbbd4c7bde0ce305530fb8d158b9e5fea', 35, 1, 'authToken', '[]', 0, '2020-05-06 12:45:25', '2020-05-06 12:45:25', '2021-05-06 17:45:25'),
('bc06f8863dfb5446b5210dbedb986e197f9a0786ba196fa84f78986ad3128ea8a304cbc0e3bd9594', 2, 1, 'authToken', '[]', 0, '2020-05-08 13:59:30', '2020-05-08 13:59:30', '2021-05-08 18:59:30'),
('bd66ead2e509b2d2e4484b9a9dd360ca175910071f6e85797738dc9d4c4250de40c9edf3aee994b6', 34, 1, 'authToken', '[]', 0, '2020-05-06 02:19:03', '2020-05-06 02:19:03', '2021-05-06 07:19:03'),
('c4875a170970aa957e090783399404d95d700c42f5ede2b4c907231bb529edaaffae9f302d2ffcef', 4, 1, 'authToken', '[]', 0, '2020-05-08 13:36:35', '2020-05-08 13:36:35', '2021-05-08 18:36:35'),
('d0502ffb21c09925b23d6da1b93a8f7a7a3fcc7d17a71ba3638382be5200641522d92dff61832439', 35, 1, 'authToken', '[]', 0, '2020-05-08 13:00:14', '2020-05-08 13:00:14', '2021-05-08 18:00:14'),
('d13280c62d57e5cad2083f434a96dbcb7cf1113e13fbc2def0a3cd107ddb0254b17cffdad3a0d242', 1, 1, 'authToken', '[]', 0, '2020-05-08 13:16:56', '2020-05-08 13:16:56', '2021-05-08 18:16:56'),
('da3df3f93ecba1f3dd290408e5ac22a1bb90a37eaec58608106daf48656c81e257af423358d63fc3', 25, 1, 'authToken', '[]', 0, '2020-05-05 06:36:07', '2020-05-05 06:36:07', '2021-05-05 11:36:07'),
('e6e4fed55eaef6c7643385ca3a5474bd7adaaa10d28d7ad19bab8106af5f48436dfdfaac04e2f6dd', 37, 1, 'authToken', '[]', 0, '2020-05-08 13:01:48', '2020-05-08 13:01:48', '2021-05-08 18:01:48'),
('e85bd6bc21a2f5912b1bfeca616457d4ec6fd783002780478880b015f19219088108b22bfa1beab8', 5, 1, 'authToken', '[]', 0, '2020-06-08 05:05:48', '2020-06-08 05:05:48', '2021-06-08 10:05:48'),
('f4e49cbf8ad86cbdb05c5ac21bd373dec9946a9cf32d71db229465a8a35b0202df2b1b05c873fd42', 39, 1, 'authToken', '[]', 0, '2020-05-08 13:08:15', '2020-05-08 13:08:15', '2021-05-08 18:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'AdminApp Personal Access Client', 'f0dRqNtenvbOt7jfMTftFwNClIozh4qr2ww1V1ur', 'http://localhost', 1, 0, 0, '2020-05-05 06:28:33', '2020-05-05 06:28:33'),
(2, NULL, 'AdminApp Password Grant Client', 'FCMtCBj7jqjSmUjwFXoWKyfL00TOb5uVa2vSKZva', 'http://localhost', 0, 1, 0, '2020-05-05 06:28:34', '2020-05-05 06:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-05-05 06:28:33', '2020-05-05 06:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(23, 'starter', 10, NULL, NULL),
(24, 'Bronze', 20, NULL, NULL),
(25, 'Silver', 30, NULL, NULL),
(26, 'Golden', 50, NULL, NULL);

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
-- Table structure for table `referal_credits_status`
--

CREATE TABLE `referal_credits_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` bigint(100) NOT NULL,
  `credits` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refer_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refer_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `status` int(12) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referal_credits_status`
--

INSERT INTO `referal_credits_status` (`id`, `phone`, `credits`, `refer_code`, `refer_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(17, 2343242343331122, '50', 'abcd', 30, 1, 0, '2020-05-05 07:58:52', '2020-05-05 07:58:52'),
(18, 23432423433311221, '50', 'abcd', 31, 1, 0, '2020-05-06 02:08:18', '2020-05-06 02:08:18'),
(19, 2343654, '50', 'abcd', 32, 1, 0, '2020-05-06 02:10:47', '2020-05-06 02:10:47'),
(20, 2343654111, '50', 'abcd', 33, 1, 0, '2020-05-06 02:18:05', '2020-05-06 02:18:05'),
(21, 234365411111, '50', 'abcd', 34, 1, 0, '2020-05-06 02:19:03', '2020-05-06 02:19:03'),
(22, 23436541111111, '50', 'abcd', 35, 1, 0, '2020-05-06 02:27:05', '2020-05-06 02:27:05'),
(23, 2323231, '50', 'abcd', 38, 1, 0, '2020-05-08 13:05:06', '2020-05-08 13:05:06'),
(24, 23232311, '50', 'abcd', 39, 1, 0, '2020-05-08 13:05:28', '2020-05-08 13:05:28'),
(25, 222222222, '50', 'Se0HJw', 2, 1, 0, '2020-05-08 13:19:01', '2020-05-08 13:19:01'),
(26, 33333333, '50', 'oz1yOA', 3, 2, 1, '2020-05-08 13:20:49', '2020-05-08 13:53:57'),
(27, 3333333311, '50', 'oz1yOA', 4, 2, 1, '2020-05-08 13:36:35', '2020-05-08 13:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(23, 'BONUS_CREDIT', '0.1, 0.001', NULL, NULL),
(24, 'CHECK_IN_CREDIT', '1, 0.01', NULL, NULL),
(25, 'REFERRAL_CREDIT', '5, 5', NULL, NULL),
(26, 'WATCH_VIDEOS_CREDIT', '2, 0.1', NULL, NULL),
(27, 'STARTING_CREDIT', '2, 2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sinch`
--

CREATE TABLE `sinch` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_key` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `app_secret` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `environment` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `user_id` int(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sinch`
--

INSERT INTO `sinch` (`id`, `app_key`, `app_secret`, `environment`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '12345', '123', '12', 12346, '2020-06-20 10:52:04', '2020-06-06 07:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` bigint(100) NOT NULL,
  `dial_code` int(11) NOT NULL,
  `referral_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `phone`, `dial_code`, `referral_code`, `token`, `phone_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1111111111, 92, 'Se0HJw', NULL, NULL, NULL, '2020-05-08 13:16:55', '2020-05-08 13:16:55'),
(2, 222222222, 92, 'oz1yOA', NULL, NULL, NULL, '2020-05-08 13:19:01', '2020-05-08 13:19:01'),
(5, 3414810030, 12345, '8Akqc3', NULL, NULL, NULL, '2020-06-08 05:05:47', '2020-06-08 05:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `videoad_credits`
--

CREATE TABLE `videoad_credits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `videoAdStart` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `videoAdEnd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `videoad_credits`
--

INSERT INTO `videoad_credits` (`id`, `videoAdStart`, `videoAdEnd`, `created_at`, `updated_at`) VALUES
(1, '100', '150', '2020-03-10 14:00:00', '2020-05-22 04:11:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_billings`
--
ALTER TABLE `google_billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `referal_credits_status`
--
ALTER TABLE `referal_credits_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sinch`
--
ALTER TABLE `sinch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `credits`
--
ALTER TABLE `credits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `google_billings`
--
ALTER TABLE `google_billings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `referal_credits_status`
--
ALTER TABLE `referal_credits_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sinch`
--
ALTER TABLE `sinch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
