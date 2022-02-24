-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 26, 2021 at 10:27 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inquiry_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisa_harga`
--

DROP TABLE IF EXISTS `analisa_harga`;
CREATE TABLE IF NOT EXISTS `analisa_harga` (
  `id_analisa` int(11) NOT NULL AUTO_INCREMENT,
  `id_penawaran` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `no_procurement` varchar(70) DEFAULT NULL,
  `pekerjaan` varchar(70) DEFAULT '-',
  `volume` int(11) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `hb_satuan` bigint(20) NOT NULL DEFAULT '0',
  `hb_total` bigint(20) NOT NULL DEFAULT '0',
  `margin` float NOT NULL DEFAULT '0',
  `nilai_margin` bigint(20) NOT NULL DEFAULT '0',
  `hj_satuan` bigint(20) NOT NULL DEFAULT '0',
  `hj_total` bigint(20) NOT NULL DEFAULT '0',
  `jasa` varchar(70) DEFAULT NULL,
  `harga_jasa` bigint(20) NOT NULL DEFAULT '0',
  `cost_of_money_volume` int(11) DEFAULT NULL,
  `jumlah_COM` bigint(20) NOT NULL DEFAULT '0',
  `delivery_cost_volume` int(11) DEFAULT NULL,
  `delivery_cost_satuan` varchar(50) DEFAULT NULL,
  `jumlah_DC` bigint(20) NOT NULL DEFAULT '0',
  `pph_10` bigint(20) NOT NULL DEFAULT '0',
  `pph_10_volume` int(11) DEFAULT NULL,
  `pph_22` bigint(20) NOT NULL DEFAULT '0',
  `pph_22_volume` int(11) DEFAULT NULL,
  `pph_23` bigint(20) NOT NULL DEFAULT '0',
  `pph_23_volume` int(11) DEFAULT NULL,
  `pph_final` bigint(20) NOT NULL DEFAULT '0',
  `pph_final_volume` int(11) DEFAULT NULL,
  `gross_profit` bigint(20) NOT NULL DEFAULT '0',
  `marketing_cost` bigint(20) NOT NULL DEFAULT '0',
  `margin_marketing_cost` int(11) DEFAULT NULL,
  `nett_profit` bigint(20) NOT NULL DEFAULT '0',
  `final_margin` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_analisa`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisa_harga`
--

INSERT INTO `analisa_harga` (`id_analisa`, `id_penawaran`, `id_vendor`, `no_procurement`, `pekerjaan`, `volume`, `satuan`, `hb_satuan`, `hb_total`, `margin`, `nilai_margin`, `hj_satuan`, `hj_total`, `jasa`, `harga_jasa`, `cost_of_money_volume`, `jumlah_COM`, `delivery_cost_volume`, `delivery_cost_satuan`, `jumlah_DC`, `pph_10`, `pph_10_volume`, `pph_22`, `pph_22_volume`, `pph_23`, `pph_23_volume`, `pph_final`, `pph_final_volume`, `gross_profit`, `marketing_cost`, `margin_marketing_cost`, `nett_profit`, `final_margin`) VALUES
(13, 178, 19, 'IO.WI.2112001', 'penggantian apa saja', 100, 'meter', 100000, 10000000, 10, 10000, 110000, 11000000, 'delivery cost', 100000, 10, 7510000, 1, 'lot', 300000, 7510000, 10, 1502000, 2, 751000, 1, 751000, 1, -10000, -150, 2, -9850, '-0.01'),
(12, 179, 19, 'IO.WI.2112001', 'penggantian apa saja', 200, 'meter', 300000, 60000000, 10, 30000, 330000, 66000000, 'delivery cost', 100000, 10, 7510000, 1, 'lot', 300000, 7510000, 10, 1502000, 2, 751000, 1, 751000, 1, -10000, -150, 2, -9850, '-0.01'),
(11, 180, 18, 'IO.WI.2112001', 'penggantian apa saja', 50, 'meter', 100000, 5000000, 10, 10000, 110000, 5500000, 'delivery cost', 100000, 10, 7510000, 1, 'lot', 300000, 7510000, 10, 1502000, 2, 751000, 1, 751000, 1, -10000, -150, 2, -9850, '-0.01');

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

DROP TABLE IF EXISTS `auth_activation_attempts`;
CREATE TABLE IF NOT EXISTS `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

DROP TABLE IF EXISTS `auth_groups`;
CREATE TABLE IF NOT EXISTS `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'superadmin', 'Admin utama'),
(2, 'admin', 'admin'),
(3, 'marketing', 'marketing'),
(4, 'vendor', 'perusahaan');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

DROP TABLE IF EXISTS `auth_groups_permissions`;
CREATE TABLE IF NOT EXISTS `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

DROP TABLE IF EXISTS `auth_groups_users`;
CREATE TABLE IF NOT EXISTS `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 16),
(2, 22),
(3, 17),
(4, 18),
(4, 23),
(4, 24),
(4, 29),
(4, 30),
(4, 31);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

DROP TABLE IF EXISTS `auth_logins`;
CREATE TABLE IF NOT EXISTS `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=393 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'adisett57@gmail.com', 1, '2021-09-28 11:04:13', 1),
(2, '::1', 'adisett57@gmail.com', 1, '2021-09-28 11:05:48', 1),
(3, '::1', 'adisett57@gmail.com', 1, '2021-09-28 11:07:24', 1),
(4, '::1', 'adisett57@gmail.com', 1, '2021-09-28 11:08:24', 1),
(5, '::1', 'adisett57@gmail.com', 1, '2021-09-28 11:10:27', 1),
(6, '::1', 'adisett57@gmail.com', 1, '2021-09-28 15:30:32', 1),
(7, '::1', 'adisett57@gmail.com', 1, '2021-09-28 18:12:26', 1),
(8, '::1', 'adisett57@gmail.com', 1, '2021-09-29 19:41:11', 1),
(9, '::1', 'adisett57@gmail.com', 1, '2021-09-29 20:15:12', 1),
(10, '::1', 'adisett57@gmail.com', 1, '2021-09-30 19:47:07', 1),
(11, '::1', 'adisett57@gmail.com', 1, '2021-09-30 21:03:42', 1),
(12, '::1', 'adisett57@gmail.com', 1, '2021-09-30 21:15:15', 1),
(13, '::1', 'adisett57@gmail.com', 1, '2021-09-30 21:16:41', 1),
(14, '::1', 'adisett57@gmail.com', 1, '2021-09-30 21:16:55', 1),
(15, '::1', 'adisett57@gmail.com', 1, '2021-09-30 21:18:24', 1),
(16, '::1', 'adisett57@gmail.com', 1, '2021-10-01 11:56:35', 1),
(17, '::1', 'adisett57@gmail.com', 1, '2021-10-02 13:40:37', 1),
(18, '::1', 'adisett57@gmail.com', 1, '2021-10-02 18:08:04', 1),
(19, '::1', 'adisett57@gmail.com', 1, '2021-10-04 10:03:51', 1),
(20, '::1', 'adisett57@gmail.com', 1, '2021-10-04 11:23:40', 1),
(21, '::1', 'adisett57@gmail.com', 1, '2021-10-04 11:23:49', 1),
(22, '::1', 'adisett57@gmail.com', 1, '2021-10-04 11:24:44', 1),
(23, '::1', 'adisett57@gmail.com', 1, '2021-10-04 11:25:54', 1),
(24, '::1', 'adisett57@gmail.com', 1, '2021-10-04 11:26:17', 1),
(25, '::1', 'adisett57@gmail.com', 1, '2021-10-04 11:26:30', 1),
(26, '::1', 'adisett57@gmail.com', 1, '2021-10-04 11:28:42', 1),
(27, '::1', 'adisett57@gmail.com', 1, '2021-10-04 11:35:01', 1),
(28, '::1', 'admin', NULL, '2021-10-04 11:35:36', 0),
(29, '::1', 'adisett57@gmail.com', 1, '2021-10-04 11:35:45', 1),
(30, '::1', 'adisett57@gmail.com', 1, '2021-10-04 11:36:44', 1),
(31, '::1', 'adisett57@gmail.com', 1, '2021-10-04 11:38:13', 1),
(32, '::1', 'adisett57@gmail.com', 1, '2021-10-04 11:41:39', 1),
(33, '::1', 'adisett57@gmail.com', 1, '2021-10-04 16:45:05', 1),
(34, '::1', 'adisett57@gmail.com', 1, '2021-10-04 16:45:44', 1),
(35, '::1', 'adisett57@gmail.com', 1, '2021-10-04 16:50:59', 1),
(36, '::1', 'adisett57@gmail.com', 1, '2021-10-04 16:53:32', 1),
(37, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-04 16:54:28', 1),
(38, '::1', 'adisett57@gmail.com', 1, '2021-10-04 16:57:17', 1),
(39, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-04 17:00:26', 1),
(40, '::1', 'adisett57@gmail.com', 1, '2021-10-04 17:02:17', 1),
(41, '::1', 'adisett', NULL, '2021-10-04 17:19:33', 0),
(42, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-04 17:19:37', 1),
(43, '::1', 'adisett57@gmail.com', 1, '2021-10-04 17:22:45', 1),
(44, '::1', 'marketing@gmail.com', 17, '2021-10-04 17:24:16', 1),
(45, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-04 18:51:51', 1),
(46, '::1', 'adisett57@gmail.com', 1, '2021-10-04 18:56:50', 1),
(47, '::1', 'adisett57@gmail.com', 1, '2021-10-04 22:51:54', 1),
(48, '::1', 'marketing@gmail.com', 17, '2021-10-04 23:01:15', 1),
(49, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-04 23:12:44', 1),
(50, '::1', 'adisett57@gmail.com', 1, '2021-10-04 23:14:18', 1),
(51, '::1', 'han@taipei.cn', 18, '2021-10-04 23:15:53', 1),
(52, '::1', 'adisett57@gmail.com', 1, '2021-10-04 23:16:08', 1),
(53, '::1', 'adisett57@gmail.com', 1, '2021-10-05 13:21:28', 1),
(54, '::1', 'adisett57@gmail.com', 1, '2021-10-05 18:53:07', 1),
(55, '::1', 'adisett57@gmail.com', 1, '2021-10-06 09:44:37', 1),
(56, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-11 21:06:54', 1),
(57, '::1', 'manjieck@io.us', 19, '2021-10-11 21:27:43', 1),
(58, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-11 21:27:58', 1),
(59, '::1', 'adisett', NULL, '2021-10-11 21:28:23', 0),
(60, '::1', 'adisett57@gmail.com', 1, '2021-10-11 21:28:28', 1),
(61, '::1', 'manjieck@io.us', 19, '2021-10-11 21:30:12', 1),
(62, '::1', 'adisett57@gmail.com', 1, '2021-10-11 21:37:25', 1),
(63, '::1', 'manjieck@io.us', 19, '2021-10-11 21:44:41', 1),
(64, '::1', 'adisett57@gmail.com', 1, '2021-10-13 13:31:46', 1),
(65, '::1', 'manjieck@io.us', 19, '2021-10-13 13:34:56', 1),
(66, '::1', 'adisett57@gmail.com', 1, '2021-10-13 15:01:59', 1),
(67, '::1', 'manjieck@io.us', 19, '2021-10-13 15:02:50', 1),
(68, '::1', 'manjieck@io.us', 19, '2021-10-13 18:04:50', 1),
(69, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-13 18:06:05', 1),
(70, '::1', 'manjieck@io.us', 19, '2021-10-13 19:03:36', 1),
(71, '::1', 'adisett', NULL, '2021-10-13 19:03:50', 0),
(72, '::1', 'adisett57@gmail.com', 1, '2021-10-13 19:03:56', 1),
(73, '::1', 'han@taipei.cn', 18, '2021-10-13 19:04:54', 1),
(74, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-13 19:05:25', 1),
(75, '::1', 'manjieck@io.us', 19, '2021-10-13 19:06:23', 1),
(76, '::1', 'manjieck@io.us', 19, '2021-10-13 19:06:37', 1),
(77, '::1', 'han@taipei.cn', 18, '2021-10-13 19:06:48', 1),
(78, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-14 09:04:23', 1),
(79, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-14 12:40:39', 1),
(80, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-14 13:15:12', 1),
(81, '::1', 'manjieck@io.us', 19, '2021-10-14 13:36:14', 1),
(82, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-14 13:36:47', 1),
(83, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-14 18:09:58', 1),
(84, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-15 11:22:16', 1),
(85, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-15 18:43:30', 1),
(86, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-16 13:34:10', 1),
(87, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-16 18:45:12', 1),
(88, '::1', 'super admin', NULL, '2021-10-16 20:11:01', 0),
(89, '::1', 'adisett57@gmail.com', 1, '2021-10-16 20:11:06', 1),
(90, '::1', 'han@taipei.cn', 18, '2021-10-16 20:13:22', 1),
(91, '::1', 'adisett57@gmail.com', 1, '2021-10-16 21:06:57', 1),
(92, '::1', 'adisett57@gmail.com', 1, '2021-10-16 22:04:58', 1),
(93, '::1', 'manjieck@io.us', 19, '2021-10-16 22:29:45', 1),
(94, '::1', 'adisett57@gmail.com', 1, '2021-10-16 23:13:56', 1),
(95, '::1', 'manjieck@io.us', 19, '2021-10-16 23:15:08', 1),
(96, '::1', 'adisett57@gmail.com', 1, '2021-10-16 23:18:06', 1),
(97, '::1', 'han@taipei.cn', 18, '2021-10-16 23:20:30', 1),
(98, '::1', 'adisett57@gmail.com', 1, '2021-10-19 18:04:54', 1),
(99, '::1', 'manjieck@io.us', 19, '2021-10-19 18:16:52', 1),
(100, '::1', 'manjieck@io.us', 19, '2021-10-19 18:16:58', 1),
(101, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-19 18:42:13', 1),
(102, '::1', 'adisett57@gmail.com', 1, '2021-10-20 16:56:10', 1),
(103, '::1', 'han@taipei.cn', 18, '2021-10-20 17:01:23', 1),
(104, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-20 17:01:43', 1),
(105, '::1', 'manjieck@io.us', 19, '2021-10-20 17:03:56', 1),
(106, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-20 17:39:38', 1),
(107, '::1', 'han@taipei.cn', 18, '2021-10-20 18:00:32', 1),
(108, '::1', 'manjieck@io.us', 19, '2021-10-20 18:09:59', 1),
(109, '::1', 'han@taipei.cn', 18, '2021-10-20 19:44:42', 1),
(110, '::1', 'adisett57@gmail.com', 1, '2021-10-20 19:47:24', 1),
(111, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-21 18:24:02', 1),
(112, '::1', 'manjieck@io.us', 19, '2021-10-21 18:25:16', 1),
(113, '::1', 'manjieck@io.us', 19, '2021-10-21 18:26:33', 1),
(114, '::1', 'adisett57@gmail.com', 1, '2021-10-21 21:34:38', 1),
(115, '::1', 'coba@edu.id', 22, '2021-10-21 22:25:24', 1),
(116, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-21 23:09:59', 1),
(117, '::1', 'adisett57@gmail.com', 1, '2021-10-22 14:18:10', 1),
(118, '::1', 'manjieck', NULL, '2021-10-22 15:23:42', 0),
(119, '::1', 'manjieck@io.us', 19, '2021-10-22 15:23:49', 1),
(120, '::1', 'adisett57@gmail.com', 1, '2021-10-23 19:33:48', 1),
(121, '::1', 'manjieck', NULL, '2021-10-24 16:31:03', 0),
(122, '::1', 'manjieck@io.us', 19, '2021-10-24 16:31:10', 1),
(123, '::1', 'manjieck@io.us', 19, '2021-10-24 16:42:29', 1),
(124, '::1', 'adisett57@gmail.com', 1, '2021-10-24 16:47:46', 1),
(125, '::1', 'sudjiwo@tech.co', 23, '2021-10-24 16:50:48', 1),
(126, '::1', 'adisett57@gmail.com', 1, '2021-10-24 18:04:58', 1),
(127, '::1', 'sudjiwo@tech.co', 24, '2021-10-24 18:07:07', 1),
(128, '::1', 'manjieck', NULL, '2021-10-25 15:09:50', 0),
(129, '::1', 'naruto', NULL, '2021-10-25 15:09:59', 0),
(130, '::1', 'han@taipei.cn', 18, '2021-10-25 15:10:07', 1),
(131, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-25 15:15:16', 1),
(132, '::1', 'adysetyawan57@gmail.com', 16, '2021-10-25 15:15:22', 1),
(133, '::1', 'adisett57@gmail.com', 1, '2021-10-25 15:22:21', 1),
(134, '::1', 'cobadong@gmail.com', 27, '2021-10-25 15:27:38', 1),
(135, '::1', 'adisett57@gmail.com', 1, '2021-10-25 15:51:13', 1),
(136, '::1', 'cobadong@gmail.com', 28, '2021-10-25 15:52:08', 1),
(137, '::1', 'adisett57@gmail.com', 1, '2021-10-25 17:02:30', 1),
(138, '::1', 'superadmin', NULL, '2021-10-26 14:18:54', 0),
(139, '::1', 'superadmin', NULL, '2021-10-26 14:19:01', 0),
(140, '::1', 'adisett57@gmail.com', 1, '2021-10-26 14:19:14', 1),
(141, '::1', 'adisett57@gmail.com', 1, '2021-10-26 18:02:28', 1),
(142, '::1', 'superadmin', NULL, '2021-10-27 14:28:46', 0),
(143, '::1', 'adisett57@gmail.com', 1, '2021-10-27 14:28:55', 1),
(144, '::1', 'vendor1', NULL, '2021-10-27 18:46:28', 0),
(145, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-10-27 18:46:36', 1),
(146, '::1', 'adisett57@gmail.com', 1, '2021-10-27 18:47:39', 1),
(147, '::1', 'adisett57@gmail.com', 1, '2021-10-28 12:48:27', 1),
(148, '::1', 'Hendry@buss.co', 30, '2021-10-28 13:21:30', 1),
(149, '::1', 'adisett57@gmail.com', 1, '2021-10-28 13:29:44', 1),
(150, '::1', 'Hendry@buss.co', 30, '2021-10-28 13:30:34', 1),
(151, '::1', 'adisett57@gmail.com', 1, '2021-10-28 13:31:24', 1),
(152, '::1', 'vendor1', NULL, '2021-10-28 15:27:24', 0),
(153, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-10-28 15:27:31', 1),
(154, '::1', 'Hendry@buss.co', 30, '2021-10-28 15:28:26', 1),
(155, '::1', 'adisett57@gmail.com', 1, '2021-10-28 15:28:59', 1),
(156, '::1', 'adisett57@gmail.com', 1, '2021-10-29 17:54:08', 1),
(157, '::1', 'Hendry@buss.co', 30, '2021-10-29 20:46:43', 1),
(158, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-10-29 20:47:30', 1),
(159, '::1', 'adisett57@gmail.com', 1, '2021-10-29 20:48:32', 1),
(160, '::1', 'adisett57@gmail.com', 1, '2021-10-31 17:49:53', 1),
(161, '::1', 'Hendry@buss.co', 30, '2021-10-31 20:29:40', 1),
(162, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-10-31 20:36:56', 1),
(163, '::1', 'adisett57@gmail.com', 1, '2021-10-31 20:38:02', 1),
(164, '::1', 'adisett57@gmail.com', 1, '2021-11-01 09:20:54', 1),
(165, '::1', 'adisett57@gmail.com', 1, '2021-11-02 10:18:09', 1),
(166, '::1', 'adisett57@gmail.com', 1, '2021-11-02 12:58:22', 1),
(167, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-11-02 13:49:19', 1),
(168, '::1', 'adisett57@gmail.com', 1, '2021-11-02 13:50:37', 1),
(169, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-11-02 13:51:59', 1),
(170, '::1', 'superadmin', NULL, '2021-11-02 13:53:10', 0),
(171, '::1', 'adisett57@gmail.com', 1, '2021-11-02 13:53:13', 1),
(172, '::1', 'adisett57@gmail.com', 1, '2021-11-02 17:50:08', 1),
(173, '::1', 'adisett57@gmail.com', 1, '2021-11-03 17:07:42', 1),
(174, '::1', 'Hendry@buss.co', 30, '2021-11-03 17:59:24', 1),
(175, '::1', 'adisett57@gmail.com', 1, '2021-11-03 17:59:33', 1),
(176, '::1', 'adisett57@gmail.com', 1, '2021-11-07 12:47:21', 1),
(177, '::1', 'adisett57@gmail.com', 1, '2021-11-09 14:07:37', 1),
(178, '::1', 'adisett57@gmail.com', 1, '2021-11-13 16:44:14', 1),
(179, '::1', 'adisett57@gmail.com', 1, '2021-11-14 09:00:02', 1),
(180, '::1', 'adysetyawan57@gmail.com', 16, '2021-11-14 10:24:53', 1),
(181, '::1', 'adisett57@gmail.com', 1, '2021-11-15 18:41:15', 1),
(182, '::1', 'adisett57@gmail.com', 1, '2021-11-15 18:58:43', 1),
(183, '::1', 'adysetyawan57@gmail.com', 16, '2021-11-15 19:03:57', 1),
(184, '::1', 'adisett57@gmail.com', 1, '2021-11-15 19:41:49', 1),
(185, '::1', 'adisett57@gmail.com', 1, '2021-11-15 19:53:41', 1),
(186, '::1', 'adisett57@gmail.com', 1, '2021-11-15 19:53:46', 1),
(187, '::1', 'adisett57@gmail.com', 1, '2021-11-15 20:01:11', 1),
(188, '::1', 'adisett57@gmail.com', 1, '2021-11-15 20:03:15', 1),
(189, '::1', 'adisett57@gmail.com', 1, '2021-11-15 20:06:00', 1),
(190, '::1', 'adysetyawan57@gmail.com', 16, '2021-11-15 20:06:11', 1),
(191, '::1', 'Hendry@buss.co', 30, '2021-11-15 20:07:46', 1),
(192, '::1', 'adysetyawan57@gmail.com', 16, '2021-11-15 20:12:03', 1),
(193, '::1', 'adisett57@gmail.com', 1, '2021-11-15 20:14:34', 1),
(194, '::1', 'adysetyawan57@gmail.com', 16, '2021-11-15 20:14:47', 1),
(195, '::1', 'adisett57@gmail.com', 1, '2021-11-15 20:15:19', 1),
(196, '::1', 'Hendry@buss.co', 30, '2021-11-15 20:15:58', 1),
(197, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-11-15 20:16:15', 1),
(198, '::1', 'adisett57@gmail.com', 1, '2021-11-15 20:16:38', 1),
(199, '::1', 'adisett57@gmail.com', 1, '2021-11-15 20:24:34', 1),
(200, '::1', 'adisett57@gmail.com', 1, '2021-11-15 20:25:52', 1),
(201, '::1', 'adisett57@gmail.com', 1, '2021-11-15 20:26:20', 1),
(202, '::1', 'adysetyawan57@gmail.com', 16, '2021-11-15 20:27:40', 1),
(203, '::1', 'adisett57@gmail.com', 1, '2021-11-16 19:31:15', 1),
(204, '::1', 'Hendry@buss.co', 30, '2021-11-16 19:33:42', 1),
(205, '::1', 'adisett57@gmail.com', 1, '2021-11-17 09:59:55', 1),
(206, '::1', 'adisett57@gmail.com', 1, '2021-11-17 10:09:17', 1),
(207, '::1', 'adisett57@gmail.com', 1, '2021-11-17 10:13:04', 1),
(208, '::1', 'Hendry@buss.co', 30, '2021-11-17 10:29:11', 1),
(209, '::1', 'adisett57@gmail.com', 1, '2021-11-17 10:29:56', 1),
(210, '::1', 'adisett57@gmail.com', 1, '2021-11-17 10:31:31', 1),
(211, '::1', 'marketing@gmail.com', 17, '2021-11-17 10:31:57', 1),
(212, '::1', 'adysetyawan57@gmail.com', 16, '2021-11-17 10:32:22', 1),
(213, '::1', 'Hendry@buss.co', 30, '2021-11-17 10:39:57', 1),
(214, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-11-17 10:40:30', 1),
(215, '::1', 'adisett57@gmail.com', 1, '2021-11-17 10:40:56', 1),
(216, '::1', 'adisett57@gmail.com', 1, '2021-11-18 18:29:28', 1),
(217, '::1', 'adisett57@gmail.com', 1, '2021-11-19 08:25:10', 1),
(218, '::1', 'adisett57@gmail.com', 1, '2021-11-19 12:23:49', 1),
(219, '::1', 'adisett57@gmail.com', 1, '2021-11-19 18:05:59', 1),
(220, '::1', 'adisett57@gmail.com', 1, '2021-11-19 19:37:18', 1),
(221, '::1', 'adisett57@gmail.com', 1, '2021-11-22 18:03:04', 1),
(222, '::1', 'adisett57@gmail.com', 1, '2021-11-24 09:33:09', 1),
(223, '::1', 'adisett57@gmail.com', 1, '2021-11-24 17:46:06', 1),
(224, '::1', 'adisett57@gmail.com', 1, '2021-11-26 18:01:21', 1),
(225, '::1', 'adisett57@gmail.com', 1, '2021-11-29 11:56:11', 1),
(226, '::1', 'Hendry@buss.co', 30, '2021-11-29 13:31:58', 1),
(227, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-11-29 13:34:07', 1),
(228, '::1', 'adisett57@gmail.com', 1, '2021-11-29 13:35:00', 1),
(229, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-11-29 13:35:38', 1),
(230, '::1', 'adisett57@gmail.com', 1, '2021-11-29 13:36:02', 1),
(231, '::1', 'adisett57@gmail.com', 1, '2021-12-01 16:46:52', 1),
(232, '::1', 'Hendry@buss.co', 30, '2021-12-01 16:49:06', 1),
(233, '::1', 'adisett57@gmail.com', 1, '2021-12-01 16:52:53', 1),
(234, '::1', 'adisett57@gmail.com', 1, '2021-12-03 09:31:12', 1),
(235, '::1', 'Hendry@buss.co', 30, '2021-12-03 09:37:24', 1),
(236, '::1', 'vendor1', NULL, '2021-12-03 09:38:33', 0),
(237, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-12-03 09:38:45', 1),
(238, '::1', 'adisett57@gmail.com', 1, '2021-12-03 09:39:02', 1),
(239, '::1', 'sentratek@gmail.com', 31, '2021-12-03 09:39:40', 1),
(240, '::1', 'adisett57@gmail.com', 1, '2021-12-03 09:40:40', 1),
(241, '::1', 'adisett57@gmail.com', 1, '2021-12-04 08:56:42', 1),
(242, '::1', 'Hendry@buss.co', 30, '2021-12-04 09:50:01', 1),
(243, '::1', 'sentratek@gmail.com', 31, '2021-12-04 09:51:46', 1),
(244, '::1', 'vendor1', NULL, '2021-12-04 09:52:38', 0),
(245, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-12-04 09:52:43', 1),
(246, '::1', 'adisett57@gmail.com', 1, '2021-12-04 09:53:33', 1),
(247, '::1', 'Hendry@buss.co', 30, '2021-12-04 11:21:00', 1),
(248, '::1', 'sentratek@gmail.com', 31, '2021-12-04 11:21:21', 1),
(249, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-12-04 11:21:44', 1),
(250, '::1', 'adisett57@gmail.com', 1, '2021-12-04 11:22:08', 1),
(251, '::1', 'adisett57@gmail.com', 1, '2021-12-06 11:43:00', 1),
(252, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-12-06 13:24:52', 1),
(253, '::1', 'Hendry@buss.co', 30, '2021-12-06 13:25:12', 1),
(254, '::1', 'adisett57@gmail.com', 1, '2021-12-06 13:25:34', 1),
(255, '::1', 'adisett57@gmail.com', 1, '2021-12-09 17:31:21', 1),
(256, '::1', 'adisett57@gmail.com', 1, '2021-12-09 18:38:18', 1),
(257, '::1', 'adisett57@gmail.com', 1, '2021-12-10 17:19:28', 1),
(258, '::1', 'adisett57@gmail.com', 1, '2021-12-10 17:49:37', 1),
(259, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-10 18:19:27', 1),
(260, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-11 08:20:13', 1),
(261, '::1', 'adisett57@gmail.com', 1, '2021-12-11 08:21:00', 1),
(262, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-11 08:21:15', 1),
(263, '::1', 'adisett57@gmail.com', 1, '2021-12-11 08:45:27', 1),
(264, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-11 09:26:41', 1),
(265, '::1', 'adisett57@gmail.com', 1, '2021-12-11 09:30:07', 1),
(266, '::1', 'vendor1', NULL, '2021-12-11 10:53:45', 0),
(267, '::1', 'superadmin', NULL, '2021-12-11 10:53:55', 0),
(268, '::1', 'adisett57@gmail.com', 1, '2021-12-11 10:53:58', 1),
(269, '::1', 'marketing@gmail.com', 17, '2021-12-11 10:54:19', 1),
(270, '::1', 'adisett57@gmail.com', 1, '2021-12-11 11:10:53', 1),
(271, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-11 11:11:08', 1),
(272, '::1', 'marketing@gmail.com', 17, '2021-12-11 11:11:21', 1),
(273, '::1', 'adisett57@gmail.com', 1, '2021-12-11 11:14:29', 1),
(274, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-11 11:17:53', 1),
(275, '::1', 'adisett57@gmail.com', 1, '2021-12-11 11:35:37', 1),
(276, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-11 11:35:47', 1),
(277, '::1', 'marketing@gmail.com', 17, '2021-12-11 11:36:59', 1),
(278, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-12-11 11:38:22', 1),
(279, '::1', 'adisett57@gmail.com', 1, '2021-12-11 11:38:38', 1),
(280, '::1', 'marketing@gmail.com', 17, '2021-12-11 11:38:47', 1),
(281, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-12-11 11:40:01', 1),
(282, '::1', 'marketing@gmail.com', 17, '2021-12-11 11:40:09', 1),
(283, '::1', 'adisett57@gmail.com', 1, '2021-12-11 11:47:15', 1),
(284, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-11 11:47:25', 1),
(285, '::1', 'marketing@gmail.com', 17, '2021-12-11 11:50:30', 1),
(286, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-11 12:29:48', 1),
(287, '::1', 'adisett57@gmail.com', 1, '2021-12-11 12:41:24', 1),
(288, '::1', 'marketing@gmail.com', 17, '2021-12-11 12:41:42', 1),
(289, '::1', 'marketing@gmail.com', 17, '2021-12-12 08:32:38', 1),
(290, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-12 08:56:30', 1),
(291, '::1', 'adisett57@gmail.com', 1, '2021-12-12 09:01:59', 1),
(292, '::1', 'marketing@gmail.com', 17, '2021-12-12 09:11:32', 1),
(293, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-12 09:31:53', 1),
(294, '::1', 'marketing@gmail.com', 17, '2021-12-12 09:37:54', 1),
(295, '::1', 'adisett57@gmail.com', 1, '2021-12-12 09:38:12', 1),
(296, '::1', 'marketing@gmail.com', 17, '2021-12-12 09:43:16', 1),
(297, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-12 09:49:55', 1),
(298, '::1', 'adisett57@gmail.com', 1, '2021-12-12 09:50:16', 1),
(299, '::1', 'marketing@gmail.com', 17, '2021-12-12 09:50:40', 1),
(300, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-12 10:00:50', 1),
(301, '::1', 'adisett57@gmail.com', 1, '2021-12-12 10:02:39', 1),
(302, '::1', 'marketing@gmail.com', 17, '2021-12-12 10:04:53', 1),
(303, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-12 10:05:51', 1),
(304, '::1', 'adisett57@gmail.com', 1, '2021-12-12 10:10:45', 1),
(305, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-12 10:11:17', 1),
(306, '::1', 'marketing@gmail.com', 17, '2021-12-12 10:11:32', 1),
(307, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-12 10:12:52', 1),
(308, '::1', 'adisett57@gmail.com', 1, '2021-12-12 10:16:29', 1),
(309, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-12 10:16:50', 1),
(310, '::1', 'adisett57@gmail.com', 1, '2021-12-12 10:22:00', 1),
(311, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-12 10:22:28', 1),
(312, '::1', 'adisett57@gmail.com', 1, '2021-12-13 08:54:23', 1),
(313, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-12-13 08:55:40', 1),
(314, '::1', 'adisett57@gmail.com', 1, '2021-12-13 08:56:20', 1),
(315, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-13 09:01:13', 1),
(316, '::1', 'adisett57@gmail.com', 1, '2021-12-13 09:14:51', 1),
(317, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-13 09:15:03', 1),
(318, '::1', 'marketing@gmail.com', 17, '2021-12-13 09:28:05', 1),
(319, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-13 09:28:54', 1),
(320, '::1', 'adisett57@gmail.com', 1, '2021-12-13 09:30:30', 1),
(321, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-13 09:42:04', 1),
(322, '::1', 'marketing@gmail.com', 17, '2021-12-13 09:52:16', 1),
(323, '::1', 'adisett57@gmail.com', 1, '2021-12-13 09:52:24', 1),
(324, '::1', 'Hendry@buss.co', 30, '2021-12-13 09:52:32', 1),
(325, '::1', 'marketing@gmail.com', 17, '2021-12-13 09:52:41', 1),
(326, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-13 17:15:02', 1),
(327, '::1', 'marketing@gmail.com', 17, '2021-12-13 17:15:15', 1),
(328, '::1', 'marketing@gmail.com', 17, '2021-12-13 17:28:05', 1),
(329, '::1', 'marketing@gmail.com', 17, '2021-12-15 17:35:50', 1),
(330, '::1', 'marketing@gmail.com', 17, '2021-12-17 12:55:46', 1),
(331, '::1', 'marketing@gmail.com', 17, '2021-12-20 18:28:04', 1),
(332, '::1', 'adisett57@gmail.com', 1, '2021-12-20 18:28:26', 1),
(333, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-20 18:28:39', 1),
(334, '::1', 'Hendry@buss.co', 30, '2021-12-20 18:43:36', 1),
(335, '::1', 'marketing@gmail.com', 17, '2021-12-20 19:55:47', 1),
(336, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-12-20 19:56:58', 1),
(337, '::1', 'marketing@gmail.com', 17, '2021-12-20 20:00:01', 1),
(338, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-12-20 20:16:31', 1),
(339, '::1', 'marketing@gmail.com', 17, '2021-12-20 20:16:49', 1),
(340, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-12-20 20:39:31', 1),
(341, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-21 08:21:36', 1),
(342, '::1', 'marketing@gmail.com', 17, '2021-12-21 08:22:08', 1),
(343, '::1', 'marketing@gmail.com', 17, '2021-12-21 09:26:39', 1),
(344, '::1', 'adisett57@gmail.com', 1, '2021-12-21 09:26:58', 1),
(345, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-21 09:27:55', 1),
(346, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-21 09:39:45', 1),
(347, '::1', 'Hendry@buss.co', 30, '2021-12-21 09:49:25', 1),
(348, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-12-21 09:51:22', 1),
(349, '::1', 'vendor1', NULL, '2021-12-21 09:51:36', 0),
(350, '::1', 'sentratek@gmail.com', 31, '2021-12-21 09:51:41', 1),
(351, '::1', 'marketing@gmail.com', 17, '2021-12-21 09:52:32', 1),
(352, '::1', 'marketing@gmail.com', 17, '2021-12-21 11:02:59', 1),
(353, '::1', 'marketing@gmail.com', 17, '2021-12-21 15:03:02', 1),
(354, '::1', 'marketing@gmail.com', 17, '2021-12-21 18:28:21', 1),
(355, '::1', 'marketing@gmail.com', 17, '2021-12-21 22:12:55', 1),
(356, '::1', 'marketing@gmail.com', 17, '2021-12-22 18:39:30', 1),
(357, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-22 18:53:40', 1),
(358, '::1', 'Hendry@buss.co', 30, '2021-12-22 18:58:07', 1),
(359, '::1', 'sentratek@gmail.com', 31, '2021-12-22 18:58:44', 1),
(360, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-12-22 18:59:19', 1),
(361, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-22 18:59:48', 1),
(362, '::1', 'Hendry@buss.co', 30, '2021-12-22 19:03:28', 1),
(363, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-22 19:53:53', 1),
(364, '::1', 'marketing@gmail.com', 17, '2021-12-22 19:59:18', 1),
(365, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-22 20:10:06', 1),
(366, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-12-22 20:11:45', 1),
(367, '::1', 'marketing@gmail.com', 17, '2021-12-22 20:13:19', 1),
(368, '::1', 'marketing@gmail.com', 17, '2021-12-23 09:48:20', 1),
(369, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-23 14:56:39', 1),
(370, '::1', 'marketing@gmail.com', 17, '2021-12-23 14:57:08', 1),
(371, '::1', 'marketing@gmail.com', 17, '2021-12-24 17:35:51', 1),
(372, '::1', 'marketing@gmail.com', 17, '2021-12-24 22:08:10', 1),
(373, '::1', 'marketing@gmail.com', 17, '2021-12-25 13:33:59', 1),
(374, '::1', 'marketing@gmail.com', 17, '2021-12-25 14:55:50', 1),
(375, '::1', 'marketing@gmail.com', 17, '2021-12-25 22:28:16', 1),
(376, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-25 23:51:06', 1),
(377, '::1', 'adisett57@gmail.com', 1, '2021-12-25 23:51:42', 1),
(378, '::1', 'marketing', NULL, '2021-12-25 23:53:47', 0),
(379, '::1', 'marketing@gmail.com', 17, '2021-12-25 23:53:52', 1),
(380, '::1', 'marketing@gmail.com', 17, '2021-12-25 23:55:49', 1),
(381, '::1', 'Rosyidah Maulidiyah	', NULL, '2021-12-25 23:56:15', 0),
(382, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-25 23:56:29', 1),
(383, '::1', 'Deddy Tri Ariyanto, S.Si', NULL, '2021-12-25 23:58:35', 0),
(384, '::1', 'Deddy Tri Ariyanto, S.Si', NULL, '2021-12-25 23:58:44', 0),
(385, '::1', 'adisett57@gmail.com', 1, '2021-12-25 23:58:49', 1),
(386, '::1', 'Sujadmiko@wlselektro.com', 29, '2021-12-25 23:59:55', 1),
(387, '::1', 'marketing', NULL, '2021-12-26 00:00:14', 0),
(388, '::1', 'marketing@gmail.com', 17, '2021-12-26 00:00:19', 1),
(389, '::1', 'marketing', NULL, '2021-12-26 08:34:38', 0),
(390, '::1', 'marketing@gmail.com', 17, '2021-12-26 08:37:27', 1),
(391, '::1', 'adisett57@gmail.com', 1, '2021-12-26 08:38:35', 1),
(392, '::1', 'marketing@gmail.com', 17, '2021-12-26 12:22:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

DROP TABLE IF EXISTS `auth_permissions`;
CREATE TABLE IF NOT EXISTS `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

DROP TABLE IF EXISTS `auth_reset_attempts`;
CREATE TABLE IF NOT EXISTS `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

DROP TABLE IF EXISTS `auth_tokens`;
CREATE TABLE IF NOT EXISTS `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

DROP TABLE IF EXISTS `auth_users_permissions`;
CREATE TABLE IF NOT EXISTS `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(70) DEFAULT NULL,
  `alamat` varchar(70) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama_perusahaan`, `alamat`, `pic`, `no_telp`, `email`) VALUES
(2, 'PT.Petrokimia Gresik', 'Jl.KIG no 45 Gresik', 'toto', '087789123781', 'toto_adm@petrokimia.io'),
(3, 'PT. Surya Kencana Abadi', 'Jl. Manyar baru no 50 Gresik', 'Nami', '098687494948', 'namisan@gmail.com'),
(4, 'PT. Foreighkey', 'surabaya indonesia', 'bagas', '08167245631', 'bagas.foreight@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_vendor`
--

DROP TABLE IF EXISTS `feedback_vendor`;
CREATE TABLE IF NOT EXISTS `feedback_vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_vendor` int(11) DEFAULT NULL,
  `id_penawaran` int(11) DEFAULT NULL,
  `harga_satuan` bigint(20) DEFAULT NULL,
  `harga_total` bigint(20) DEFAULT NULL,
  `durasi_pengiriman` int(11) DEFAULT NULL,
  `tanggal_kirim` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(70) DEFAULT 'pengajuan',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_vendor`
--

INSERT INTO `feedback_vendor` (`id`, `id_vendor`, `id_penawaran`, `harga_satuan`, `harga_total`, `durasi_pengiriman`, `tanggal_kirim`, `created_at`, `updated_at`, `status`) VALUES
(92, 18, 180, 100000, 5000000, 5, '22-12-2021', '2021-12-22 20:12:17', '2021-12-22 20:12:33', 'terpilih'),
(91, 18, 179, 200000, 40000000, 4, '22-12-2021', '2021-12-22 20:12:09', '2021-12-22 20:12:43', 'arsipkan'),
(90, 18, 178, 150000, 15000000, 3, '22-12-2021', '2021-12-22 20:12:00', '2021-12-22 20:12:58', 'arsipkan'),
(89, 19, 180, 400000, 20000000, 2, '22-12-2021', '2021-12-22 20:11:06', '2021-12-22 20:12:33', 'arsipkan'),
(87, 19, 178, 100000, 10000000, 2, '22-12-2021', '2021-12-22 20:10:37', '2021-12-22 20:12:58', 'terpilih'),
(88, 19, 179, 300000, 60000000, 2, '22-12-2021', '2021-12-22 20:10:54', '2021-12-22 20:12:43', 'terpilih');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) DEFAULT NULL,
  `last_login` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `perangkat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=MyISAM AUTO_INCREMENT=178 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `nama_user`, `last_login`, `ip`, `perangkat`) VALUES
(177, 'Deddy Tri Ariyanto', '2021-12-26 12:22:35', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(176, 'Siti Rahmadhani', '2021-12-26 08:38:25', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(175, 'Sujad', '2021-12-26 00:00:10', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(174, 'Deddy Tri Ariyanto', '2021-12-25 23:59:50', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(173, 'Rosyidah Maulidiyah', '2021-12-25 23:58:22', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(172, 'Siti Rahmadhani', '2021-12-25 23:55:55', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(171, 'Siti Rahmadhani', '2021-12-25 23:55:44', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(170, 'AdiSetiawan', '2021-12-25 23:53:44', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(169, 'Rosyidah Maulidiyah', '2021-12-25 23:51:35', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(168, 'Siti Rahmadhani', '2021-12-25 23:51:01', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(167, 'Siti Rahmadhani', '2021-12-25 14:55:41', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(166, 'admin', '2021-12-23 14:56:58', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(165, 'marketing', '2021-12-23 14:56:35', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(164, 'admin', '2021-12-22 20:13:15', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(163, 'petikemas', '2021-12-22 20:11:11', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(162, 'marketing', '2021-12-22 20:10:02', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(161, 'admin', '2021-12-22 19:59:15', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(160, 'admin', '2021-12-22 19:51:01', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(159, 'admin', '2021-12-22 19:03:22', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(158, 'Sujad', '2021-12-22 18:59:44', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(157, 'sentratek', '2021-12-22 18:59:15', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(156, 'petikemas', '2021-12-22 18:58:40', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(155, 'marketing', '2021-12-22 18:53:30', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(154, 'admin', '2021-12-21 11:02:49', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(153, 'sentratek', '2021-12-21 09:52:26', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(152, 'Sujad', '2021-12-21 09:51:31', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(151, 'petikemas', '2021-12-21 09:51:18', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(150, 'marketing', '2021-12-21 09:49:18', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(149, 'admin', '2021-12-21 09:39:20', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(148, 'AdiSetiawan', '2021-12-21 09:27:46', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(147, 'admin', '2021-12-21 09:26:52', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)'),
(146, 'marketing', '2021-12-21 09:26:35', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0)');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(3, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1632801634, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penawaran`
--

DROP TABLE IF EXISTS `penawaran`;
CREATE TABLE IF NOT EXISTS `penawaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `no_spph_masuk` varchar(70) DEFAULT NULL,
  `no_spph_keluar` varchar(79) DEFAULT NULL,
  `no_procurement` varchar(70) DEFAULT NULL,
  `no_pbi` varchar(70) DEFAULT NULL,
  `tanggal` varchar(20) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `satuan` varchar(90) DEFAULT NULL,
  `vendor` varchar(255) DEFAULT NULL,
  `inputed_by` varchar(255) DEFAULT NULL,
  `approved_by` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `kode_urut` varchar(20) DEFAULT NULL,
  `confirm_vendor` varchar(255) DEFAULT '0',
  `status_terpilih` varchar(20) DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=181 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penawaran`
--

INSERT INTO `penawaran` (`id`, `id_customer`, `no_spph_masuk`, `no_spph_keluar`, `no_procurement`, `no_pbi`, `tanggal`, `nama_barang`, `volume`, `satuan`, `vendor`, `inputed_by`, `approved_by`, `status`, `created_at`, `updated_at`, `note`, `kode_urut`, `confirm_vendor`, `status_terpilih`) VALUES
(180, 2, 'PR.SPPH.2111001', 'SPPH.WI.2112001', 'IO.WI.2112001', NULL, '22-12-2021', 'Cable NYFGBY 3x6mm', 50, 'meter', 'PT.Wilis Elektronik, PT. Petikemas Surabaya', 'marketing', 'admin', 'confirm vendor', '2021-12-22 20:09:53', '2021-12-22 20:12:33', NULL, '12', '0, 19, 18', 'confirm'),
(178, 2, 'PR.SPPH.2111001', 'SPPH.WI.2112001', 'IO.WI.2112001', NULL, '22-12-2021', 'Cable NYFGBY 3x2.5mm', 100, 'meter', 'PT.Wilis Elektronik, PT. Petikemas Surabaya', 'marketing', 'admin', 'confirm vendor', '2021-12-22 20:09:53', '2021-12-22 20:12:58', NULL, '12', '0, 19, 18', 'confirm'),
(179, 2, 'PR.SPPH.2111001', 'SPPH.WI.2112001', 'IO.WI.2112001', NULL, '22-12-2021', 'Cable NYFGBY 3x4mm', 200, 'meter', 'PT.Wilis Elektronik, PT. Petikemas Surabaya', 'marketing', 'admin', 'confirm vendor', '2021-12-22 20:09:53', '2021-12-22 20:12:43', NULL, '12', '0, 19, 18', 'confirm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `vendor` varchar(100) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT 'default.svg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `phone`, `vendor`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'adisett57@gmail.com', 'Deddy Tri Ariyanto', 'Deddy Tri Ariyanto', '081190871289', 'local user', 'minimalist-lion-wallpaper.jpg', '$2y$10$fJK3hCJHGSV0DRwQkdtUYeubK5SbtoHLWaxmeZ.cDU4qgrwGE3oxy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-28 11:04:08', '2021-12-25 23:59:42', NULL),
(17, 'marketing@gmail.com', 'Siti Rahmadhani', 'Siti Rahmadhani', '099588998', 'local user', 'default.svg', '$2y$10$jNY5szfyYI21DjWexPJQOexfQT94aeRGNlK2jxNthRK3SLA7hno1a', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-10-04 17:23:10', '2021-12-25 14:55:35', NULL),
(16, 'adysetyawan57@gmail.com', 'Rosyidah Maulidiyah', 'Rosyidah Maulidiyah', '00383900', 'local user', 'anthony-tran-OeNaJQuiSqc-unsplash.jpg', '$2y$10$AhhEzGhUwj8qFx0dl4g4RexLOga6kTVpEX2gSRXigtgM3UTODnS0u', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-10-04 16:54:14', '2021-12-25 23:51:30', NULL),
(29, 'Sujadmiko@wlselektro.com', 'Sujad', 'Sujadmiko', '081190871289', 'PT.Wilis Elektronik', 'default.svg', '$2y$10$f/T1AVeFJG1KK/bb7MQno.IcsDKlLdhoT9fIZnRBQqimk5qcPH8p.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-10-25 18:19:35', '2021-10-25 18:19:35', NULL),
(31, 'sentratek@gmail.com', 'sentratek', 'Mac Santoso', '0881987256710', 'PT. SENTRATEK METALINDO', 'default.svg', '$2y$10$afoqcyJGKdypbTraKFZuyOEGbzmZGoq.0gw9whvZC9Soi3PzkjPaG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-11-02 11:35:51', '2021-11-02 11:35:51', NULL),
(30, 'Hendry@buss.co', 'petikemas', 'Hendry chow', '0859995788', 'PT. Petikemas Surabaya', 'default.svg', '$2y$10$UdxupbZIFRbTJw.ggvsftuWRe3Q2R8PHiAgA7q.GNlubhEWFHM.8K', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-10-25 18:23:55', '2021-10-25 18:23:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

DROP TABLE IF EXISTS `vendor`;
CREATE TABLE IF NOT EXISTS `vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vendor` (`vendor`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `vendor`, `fullname`, `phone`, `jabatan`, `username`, `password`, `created_by`, `created_at`, `updated_at`) VALUES
(18, 'PT.Wilis Elektronik', 'Sujadmiko', '081190871289', 'marketing', 'Sujad', 'puitis123', 'AdiSetiawan', '2021-10-25 18:19:34', '2021-10-25 18:19:34'),
(19, 'PT. Petikemas Surabaya', 'Hendry chow', '0859995788', 'Operasional Manager', 'petikemas', 'puitis123', 'AdiSetiawan', '2021-10-25 18:23:55', '2021-10-25 18:23:55'),
(20, 'PT. SENTRATEK METALINDO', 'Mac Santoso', '0881987256710', 'Purchasing', 'sentratek', 'sentratek123', 'AdiSetiawan', '2021-11-02 11:35:51', '2021-11-02 11:35:51');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
