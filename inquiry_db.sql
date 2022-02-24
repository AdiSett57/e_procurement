-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql312.epizy.com
-- Generation Time: Feb 24, 2022 at 01:43 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_30319260_inquiry_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisa_harga`
--

CREATE TABLE `analisa_harga` (
  `id_analisa` int(11) NOT NULL,
  `id_penawaran` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `no_procurement` varchar(70) DEFAULT NULL,
  `pekerjaan` varchar(70) DEFAULT '-',
  `volume` int(11) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `hb_satuan` bigint(20) NOT NULL DEFAULT 0,
  `hb_total` bigint(20) NOT NULL DEFAULT 0,
  `margin` float NOT NULL DEFAULT 0,
  `nilai_margin` bigint(20) NOT NULL DEFAULT 0,
  `hj_satuan` bigint(20) NOT NULL DEFAULT 0,
  `hj_total` bigint(20) NOT NULL DEFAULT 0,
  `jasa` varchar(70) DEFAULT NULL,
  `harga_jasa` bigint(20) NOT NULL DEFAULT 0,
  `cost_of_money_volume` int(11) DEFAULT NULL,
  `jumlah_COM` bigint(20) NOT NULL DEFAULT 0,
  `delivery_cost_volume` int(11) DEFAULT NULL,
  `delivery_cost_satuan` varchar(50) DEFAULT NULL,
  `jumlah_DC` bigint(20) NOT NULL DEFAULT 0,
  `pph_10` bigint(20) NOT NULL DEFAULT 0,
  `pph_10_volume` int(11) DEFAULT NULL,
  `pph_22` bigint(20) NOT NULL DEFAULT 0,
  `pph_22_volume` int(11) DEFAULT NULL,
  `pph_23` bigint(20) NOT NULL DEFAULT 0,
  `pph_23_volume` int(11) DEFAULT NULL,
  `pph_final` bigint(20) NOT NULL DEFAULT 0,
  `pph_final_volume` int(11) DEFAULT NULL,
  `gross_profit` bigint(20) NOT NULL DEFAULT 0,
  `marketing_cost` bigint(20) NOT NULL DEFAULT 0,
  `margin_marketing_cost` int(11) DEFAULT NULL,
  `nett_profit` bigint(20) NOT NULL DEFAULT 0,
  `final_margin` varchar(50) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT 'not valid'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisa_harga`
--

INSERT INTO `analisa_harga` (`id_analisa`, `id_penawaran`, `id_vendor`, `no_procurement`, `pekerjaan`, `volume`, `satuan`, `hb_satuan`, `hb_total`, `margin`, `nilai_margin`, `hj_satuan`, `hj_total`, `jasa`, `harga_jasa`, `cost_of_money_volume`, `jumlah_COM`, `delivery_cost_volume`, `delivery_cost_satuan`, `jumlah_DC`, `pph_10`, `pph_10_volume`, `pph_22`, `pph_22_volume`, `pph_23`, `pph_23_volume`, `pph_final`, `pph_final_volume`, `gross_profit`, `marketing_cost`, `margin_marketing_cost`, `nett_profit`, `final_margin`, `status`) VALUES
(16, 181, 20, 'IO.WI.2201001', 'Permintaan barang', 100, 'meter', 100000, 10000000, 20, 20000, 120000, 12000000, 'Delivery Cost', 200000, 1, 247000, 1, 'lot', 50000, 123500, 1, 49400, 0, 0, 0, 172900, 1, 4257200, 85144, 2, 4172056, '14.09', 'valid'),
(15, 182, 20, 'IO.WI.2201001', 'Permintaan barang', 50, 'meter', 150000, 7500000, 20, 30000, 180000, 9000000, 'Delivery Cost', 200000, 1, 247000, 1, 'lot', 50000, 123500, 1, 49400, 0, 0, 0, 172900, 1, 4257200, 85144, 2, 4172056, '14.09', 'valid'),
(14, 183, 20, 'IO.WI.2201001', 'Permintaan barang', 35, 'meter', 200000, 7000000, 20, 40000, 240000, 8400000, 'Delivery Cost', 200000, 1, 247000, 1, 'lot', 50000, 123500, 1, 49400, 0, 0, 0, 172900, 1, 4257200, 85144, 2, 4172056, '14.09', 'valid'),
(17, 184, 20, 'IO.WI.2201002', 'Pengadaan SIRINE, LIMIT SWITCH, RELAY (0499)', 4, 'Pcs', 3221000, 12884000, 30, 966300, 4187300, 16749200, 'Delivery cost (Ongkir ke PT. PJB UBJ O&M Paiton)', 500000, 6, 1099020, 1, 'lot', 200000, 1831700, 10, 274755, 2, 366340, 2, 91585, 1, 1311050, 65553, 5, 1245498, '5.3', 'valid'),
(18, 186, 20, 'IO.WI.2201002', 'Pengadaan SIRINE, LIMIT SWITCH, RELAY (0499)', 40, 'Pcs', 38000, 1520000, 30, 11400, 49400, 1976000, 'Delivery cost (Ongkir ke PT. PJB UBJ O&M Paiton)', 500000, 6, 1099020, 1, 'lot', 200000, 1831700, 10, 274755, 2, 366340, 2, 91585, 1, 1311050, 65553, 5, 1245498, '5.3', 'valid'),
(19, 185, 20, 'IO.WI.2201002', 'Pengadaan SIRINE, LIMIT SWITCH, RELAY (0499)', 10, 'Pcs', 341300, 3413000, 25, 85325, 426625, 4266250, 'Delivery cost (Ongkir ke PT. PJB UBJ O&M Paiton)', 500000, 6, 1099020, 1, 'lot', 200000, 1831700, 10, 274755, 2, 366340, 2, 91585, 1, 1311050, 65553, 5, 1245498, '5.3', 'valid'),
(20, 193, 19, 'IO.WI.2202002', '-', 20, 'Unit', 1500, 30000, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, '0', 'not valid'),
(21, 192, 20, 'IO.WI.2202002', '-', 90, 'Unit', 500000, 45000000, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, '0', 'not valid'),
(22, 191, 18, 'IO.WI.2202003', '-', 90, 'Roll', 75000, 6750000, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, '0', 'not valid'),
(23, 190, 20, 'IO.WI.2202003', '-', 20, 'Meter', 600, 12000, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, '0', 'not valid'),
(24, 189, 20, 'IO.WI.2202003', '-', 10, 'Ls', 40000, 400000, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, '0', 'not valid'),
(25, 188, 18, 'IO.WI.2202001', '-', 2, 'Pack', 38000, 76000, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, '0', 'not valid'),
(26, 187, 20, 'IO.WI.2202001', '-', 10, 'Roll', 1000, 10000, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, '0', 'not valid');

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
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

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
(392, '::1', 'marketing@gmail.com', 17, '2021-12-26 12:22:40', 1),
(393, '::1', 'adisett', NULL, '2021-12-27 17:33:57', 0),
(394, '::1', 'superadmin', NULL, '2021-12-27 17:34:03', 0),
(395, '::1', 'marketing@gmail.com', 17, '2021-12-27 17:34:38', 1),
(396, '::1', 'marketing@gmail.com', 17, '2021-12-28 16:59:12', 1),
(397, '::1', 'adysetyawan57@gmail.com', 16, '2021-12-28 17:24:24', 1),
(398, '::1', 'marketing@gmail.com', 17, '2021-12-28 17:25:06', 1),
(399, '::1', 'marketing@gmail.com', 17, '2022-01-03 20:36:47', 1),
(400, '::1', 'adysetyawan57@gmail.com', 16, '2022-01-03 20:49:19', 1),
(401, '::1', 'sentratek@gmail.com', 31, '2022-01-03 20:49:59', 1),
(402, '::1', 'adysetyawan57@gmail.com', 16, '2022-01-03 20:50:58', 1),
(403, '::1', 'marketing@gmail.com', 17, '2022-01-03 20:51:18', 1),
(404, '::1', 'marketing@gmail.com', 17, '2022-01-05 15:54:29', 1),
(405, '::1', 'adisett57@gmail.com', 1, '2022-01-07 20:45:29', 1),
(406, '112.215.240.83', 'marketing@gmail.com', 17, '2022-01-08 23:16:24', 1),
(407, '112.215.240.83', 'adysetyawan57@gmail.com', 16, '2022-01-08 23:25:28', 1),
(408, '112.215.240.83', 'sentratek@gmail.com', 31, '2022-01-08 23:29:43', 1),
(409, '112.215.240.83', 'adysetyawan57@gmail.com', 16, '2022-01-08 23:31:16', 1),
(410, '112.215.240.83', 'adisett57@gmail.com', 1, '2022-01-08 23:31:39', 1),
(411, '112.215.240.83', 'Hendry@buss.co', 30, '2022-01-08 23:33:06', 1),
(412, '112.215.240.83', 'adysetyawan57@gmail.com', 16, '2022-01-08 23:34:18', 1),
(413, '112.215.240.83', 'marketing@gmail.com', 17, '2022-01-08 23:36:18', 1),
(414, '112.215.240.83', 'marketing@gmail.com', 17, '2022-01-08 23:54:54', 1),
(415, '112.215.240.83', 'adisett57@gmail.com', 1, '2022-01-09 00:08:19', 1),
(416, '112.215.240.83', 'marketing@gmail.com', 17, '2022-01-09 00:36:25', 1),
(417, '112.215.240.83', 'adysetyawan57@gmail.com', 16, '2022-01-09 01:06:24', 1),
(418, '112.215.240.83', 'adisett57@gmail.com', 1, '2022-01-09 01:07:36', 1),
(419, '112.215.240.83', 'adysetyawan57@gmail.com', 16, '2022-01-09 01:23:49', 1),
(420, '112.215.240.83', 'adisett57@gmail.com', 1, '2022-01-09 01:25:02', 1),
(421, '112.215.240.83', 'marketing@gmail.com', 17, '2022-01-09 01:25:15', 1),
(422, '112.215.240.83', 'adysetyawan57@gmail.com', 16, '2022-01-09 01:25:23', 1),
(423, '112.215.240.83', 'marketing@gmail.com', 17, '2022-01-09 01:26:10', 1),
(424, '112.215.240.83', 'adysetyawan57@gmail.com', 16, '2022-01-09 01:26:25', 1),
(425, '168.235.198.31', 'marketing@gmail.com', 17, '2022-01-09 11:56:48', 1),
(426, '103.145.32.18', 'adisett57@gmail.com', 1, '2022-01-10 15:12:15', 1),
(427, '112.215.243.243', 'marketing@gmail.com', 17, '2022-01-11 20:04:59', 1),
(428, '203.78.117.189', 'adisett57@gmail.com', 1, '2022-01-21 18:18:21', 1),
(429, '203.78.117.189', 'adysetyawan57@gmail.com', 16, '2022-01-21 18:22:43', 1),
(430, '112.215.237.22', 'marketing@gmail.com', 17, '2022-01-27 17:16:31', 1),
(431, '112.215.237.22', 'adysetyawan57@gmail.com', 16, '2022-01-27 17:18:37', 1),
(432, '112.215.237.37', 'Admin@gmail.com', NULL, '2022-01-29 10:44:55', 0),
(433, '112.215.237.37', 'Dedy tri', NULL, '2022-01-29 10:45:15', 0),
(434, '140.213.56.39', 'marketing@gmail.com', 17, '2022-01-31 13:14:09', 1),
(435, '140.213.56.39', 'adysetyawan57@gmail.com', 16, '2022-02-01 19:13:22', 1),
(436, '140.213.56.39', 'marketing@gmail.com', 17, '2022-02-01 19:44:26', 1),
(437, '140.213.56.39', 'adysetyawan57@gmail.com', 16, '2022-02-01 20:03:45', 1),
(438, '140.213.56.39', 'marketing@gmail.com', 17, '2022-02-01 20:04:02', 1),
(439, '140.213.56.39', 'adysetyawan57@gmail.com', 16, '2022-02-01 20:05:20', 1),
(440, '140.213.56.39', 'sentratek@gmail.com', 31, '2022-02-01 20:40:26', 1),
(441, '140.213.56.39', 'adysetyawan57@gmail.com', 16, '2022-02-01 20:40:59', 1),
(442, '140.213.56.39', 'adisett57@gmail.com', 1, '2022-02-01 21:08:55', 1),
(443, '140.213.56.39', 'marketing@gmail.com', 17, '2022-02-01 21:09:23', 1),
(444, '140.213.56.39', 'adysetyawan57@gmail.com', 16, '2022-02-01 21:12:50', 1),
(445, '140.213.56.39', 'Sujadmiko@wlselektro.com', 29, '2022-02-01 21:13:31', 1),
(446, '140.213.56.39', 'sentratek@gmail.com', 31, '2022-02-01 21:38:36', 1),
(447, '140.213.56.39', 'Hendry@buss.co', 30, '2022-02-01 21:39:51', 1),
(448, '140.213.56.39', 'adysetyawan57@gmail.com', 16, '2022-02-01 21:40:58', 1),
(449, '140.213.56.39', 'marketing@gmail.com', 17, '2022-02-01 21:43:02', 1),
(450, '203.78.118.213', 'adysetyawan57@gmail.com', 16, '2022-02-02 20:08:35', 1),
(451, '203.78.118.213', 'sentratek@gmail.com', 31, '2022-02-02 21:11:33', 1),
(452, '112.215.243.162', 'adysetyawan57@gmail.com', 16, '2022-02-06 09:12:22', 1),
(453, '112.215.243.162', 'sentratek@gmail.com', 31, '2022-02-06 09:18:46', 1),
(454, '112.215.243.162', 'marketing@gmail.com', 17, '2022-02-06 09:42:48', 1),
(455, '112.215.243.162', 'adysetyawan57@gmail.com', 16, '2022-02-06 09:54:00', 1),
(456, '112.215.243.162', 'marketing@gmail.com', 17, '2022-02-06 10:05:31', 1),
(457, '112.215.243.162', 'adysetyawan57@gmail.com', 16, '2022-02-06 10:07:04', 1),
(458, '112.215.243.162', 'Sujadmiko@wlselektro.com', 29, '2022-02-06 10:08:01', 1),
(459, '112.215.243.162', 'adysetyawan57@gmail.com', 16, '2022-02-06 10:08:45', 1),
(460, '112.215.243.162', 'sentratek@gmail.com', 31, '2022-02-06 10:24:22', 1),
(461, '112.215.243.162', 'Hendry@buss.co', 30, '2022-02-06 10:24:39', 1),
(462, '112.215.243.162', 'marketing@gmail.com', 17, '2022-02-06 10:39:46', 1),
(463, '112.215.243.162', 'adysetyawan57@gmail.com', 16, '2022-02-06 10:43:52', 1),
(464, '112.215.243.162', 'marketing@gmail.com', 17, '2022-02-06 11:23:19', 1),
(465, '118.137.127.14', 'admin', NULL, '2022-02-06 12:21:53', 0),
(466, '118.137.127.14', 'marketing@gmail.com', 17, '2022-02-06 12:21:57', 1),
(467, '118.137.127.14', 'admin', NULL, '2022-02-06 12:22:08', 0),
(468, '180.253.160.66', 'Admin', NULL, '2022-02-07 23:17:31', 0),
(469, '112.215.173.148', 'adysetyawan57@gmail.com', 16, '2022-02-13 09:53:28', 1),
(470, '112.215.173.148', 'marketing@gmail.com', 17, '2022-02-13 09:54:07', 1),
(471, '112.215.154.237', 'adisett57@gmail.com', 1, '2022-02-17 17:50:07', 1),
(472, '112.215.154.237', 'adysetyawan57@gmail.com', 16, '2022-02-17 17:56:36', 1),
(473, '112.215.154.237', 'marketing@gmail.com', 17, '2022-02-17 17:56:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(70) DEFAULT NULL,
  `alamat` varchar(70) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama_perusahaan`, `alamat`, `pic`, `no_telp`, `email`) VALUES
(2, 'PT.Petrokimia Gresik', 'Jl.KIG no 45 Gresik', 'toto', '087789123781', 'toto_adm@petrokimia.io'),
(3, 'PT. Surya Kencana Abadi', 'Jl. Manyar baru no 50 Gresik', 'Nami', '098687494948', 'namisan@gmail.com'),
(4, 'PT. Foreighkey', 'surabaya indonesia', 'bagas', '08167245631', 'bagas.foreight@gmail.com'),
(5, 'PT. PJB Paiton', ' Jl. Surabaya-Situbondo Km. 142, Paiton-Probolinggo', 'Bp. Arman Effendi', '0335771805', 'upptn@ptpjb.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_vendor`
--

CREATE TABLE `feedback_vendor` (
  `id` int(11) NOT NULL,
  `id_vendor` int(11) DEFAULT NULL,
  `id_penawaran` int(11) DEFAULT NULL,
  `harga_satuan` bigint(20) DEFAULT NULL,
  `harga_total` bigint(20) DEFAULT NULL,
  `durasi_pengiriman` int(11) DEFAULT NULL,
  `tanggal_kirim` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(70) DEFAULT 'pengajuan'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_vendor`
--

INSERT INTO `feedback_vendor` (`id`, `id_vendor`, `id_penawaran`, `harga_satuan`, `harga_total`, `durasi_pengiriman`, `tanggal_kirim`, `created_at`, `updated_at`, `status`) VALUES
(93, 20, 181, 100000, 10000000, 2, '03-01-2022', '2022-01-03 20:50:28', '2022-01-03 20:51:09', 'terpilih'),
(95, 20, 183, 200000, 7000000, 2, '03-01-2022', '2022-01-03 20:50:43', '2022-01-03 20:51:05', 'terpilih'),
(94, 20, 182, 150000, 7500000, 2, '03-01-2022', '2022-01-03 20:50:36', '2022-01-03 20:51:07', 'terpilih'),
(96, 20, 184, 3221000, 12884000, 2, '08-01-2022', '2022-01-08 23:30:07', '2022-01-08 23:35:13', 'terpilih'),
(97, 20, 185, 341300, 3413000, 2, '08-01-2022', '2022-01-08 23:30:21', '2022-01-08 23:35:24', 'terpilih'),
(98, 20, 186, 38000, 1520000, 2, '08-01-2022', '2022-01-08 23:30:37', '2022-01-08 23:35:19', 'terpilih'),
(99, 19, 184, 3421000, 13684000, 1, '08-01-2022', '2022-01-08 23:33:36', '2022-01-08 23:35:13', 'arsipkan'),
(100, 19, 185, 351300, 3513000, 1, '08-01-2022', '2022-01-08 23:33:51', '2022-01-08 23:35:24', 'arsipkan'),
(101, 19, 186, 38000, 1520000, 1, '08-01-2022', '2022-01-08 23:34:04', '2022-01-08 23:35:19', 'arsipkan'),
(102, 20, 187, 1000, 10000, 2, '01-02-2022', '2022-02-01 20:40:39', '2022-02-01 21:42:37', 'terpilih'),
(103, 18, 187, 200000, 2000000, 3, '01-02-2022', '2022-02-01 21:37:42', '2022-02-01 21:42:37', 'arsipkan'),
(104, 18, 188, 38000, 76000, 1, '01-02-2022', '2022-02-01 21:37:51', '2022-02-01 21:42:27', 'terpilih'),
(105, 18, 189, 400000, 4000000, 3, '01-02-2022', '2022-02-01 21:38:01', '2022-02-01 21:42:16', 'arsipkan'),
(106, 18, 190, 70000, 1400000, 5, '01-02-2022', '2022-02-01 21:38:07', '2022-02-01 21:42:07', 'arsipkan'),
(107, 18, 191, 75000, 6750000, 9, '01-02-2022', '2022-02-01 21:38:14', '2022-02-01 21:41:54', 'terpilih'),
(108, 18, 192, 200000, 18000000, 4, '01-02-2022', '2022-02-01 21:38:21', '2022-02-01 21:41:41', 'arsipkan'),
(109, 18, 193, 650000, 13000000, 7, '01-02-2022', '2022-02-01 21:38:27', '2022-02-01 21:41:25', 'arsipkan'),
(110, 20, 188, 341300, 682600, 1, '01-02-2022', '2022-02-01 21:39:06', '2022-02-01 21:42:27', 'arsipkan'),
(111, 20, 189, 40000, 400000, 1, '01-02-2022', '2022-02-01 21:39:12', '2022-02-01 21:42:16', 'terpilih'),
(112, 20, 190, 600, 12000, 8, '01-02-2022', '2022-02-01 21:39:19', '2022-02-01 21:42:07', 'terpilih'),
(113, 20, 191, 86866, 7817940, 6, '01-02-2022', '2022-02-01 21:39:25', '2022-02-01 21:41:54', 'arsipkan'),
(114, 20, 192, 500000, 45000000, 1, '01-02-2022', '2022-02-01 21:39:31', '2022-02-01 21:41:41', 'terpilih'),
(115, 20, 193, 750000, 15000000, 2, '01-02-2022', '2022-02-01 21:39:37', '2022-02-01 21:41:25', 'arsipkan'),
(116, 19, 187, 38000, 380000, 3, '01-02-2022', '2022-02-01 21:40:13', '2022-02-01 21:42:37', 'arsipkan'),
(117, 19, 188, 150000, 300000, 2, '01-02-2022', '2022-02-01 21:40:17', '2022-02-01 21:42:27', 'arsipkan'),
(118, 19, 189, 500000, 5000000, 2, '01-02-2022', '2022-02-01 21:40:22', '2022-02-01 21:42:16', 'arsipkan'),
(119, 19, 190, 150000, 3000000, 32, '01-02-2022', '2022-02-01 21:40:28', '2022-02-01 21:42:07', 'arsipkan'),
(120, 19, 191, 3221000, 289890000, 89, '01-02-2022', '2022-02-01 21:40:33', '2022-02-01 21:41:54', 'arsipkan'),
(121, 19, 192, 38000, 3420000, 14, '01-02-2022', '2022-02-01 21:40:42', '2022-02-01 21:41:41', 'arsipkan'),
(122, 19, 193, 1500, 30000, 1, '01-02-2022', '2022-02-01 21:40:48', '2022-02-01 21:41:25', 'terpilih'),
(123, 18, 195, 100000, 1000000, 3, '06-02-2022', '2022-02-06 10:08:23', '2022-02-06 10:08:23', 'pengajuan'),
(124, 18, 196, 200000, 20000000, 7, '06-02-2022', '2022-02-06 10:08:33', '2022-02-06 10:08:33', 'pengajuan');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `last_login` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `perangkat` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `nama_user`, `last_login`, `ip`, `perangkat`) VALUES
(206, 'Rosyidah Maulidiyah', '2022-02-01 20:40:20', '140.213.56.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(205, 'Siti Rahmadhani', '2022-02-01 20:05:15', '140.213.56.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(202, 'Rosyidah Maulidiyah', '2022-02-01 19:44:21', '140.213.56.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(203, 'Siti Rahmadhani', '2022-02-01 20:03:41', '140.213.56.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(204, 'Rosyidah Maulidiyah', '2022-02-01 20:03:56', '140.213.56.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(214, 'petikemas', '2022-02-01 21:40:54', '140.213.56.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(213, 'sentratek', '2022-02-01 21:39:43', '140.213.56.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(212, 'Sujad', '2022-02-01 21:38:30', '140.213.56.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(211, 'Rosyidah Maulidiyah', '2022-02-01 21:13:24', '140.213.56.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(210, 'Siti Rahmadhani', '2022-02-01 21:12:45', '140.213.56.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(209, 'Deddy Tri Ariyanto', '2022-02-01 21:09:16', '140.213.56.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(201, 'Siti Rahmadhani', '2022-01-27 17:18:18', '112.215.237.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(207, 'sentratek', '2022-02-01 20:40:55', '140.213.56.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(208, 'Rosyidah Maulidiyah', '2022-02-01 21:08:43', '140.213.56.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(226, 'petikemas', '2022-02-06 10:39:41', '112.215.243.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(225, 'sentratek', '2022-02-06 10:24:32', '112.215.243.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(224, 'Rosyidah Maulidiyah', '2022-02-06 10:24:17', '112.215.243.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(223, 'Sujad', '2022-02-06 10:08:39', '112.215.243.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(222, 'Rosyidah Maulidiyah', '2022-02-06 10:07:55', '112.215.243.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(221, 'Siti Rahmadhani', '2022-02-06 10:06:54', '112.215.243.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(220, 'Rosyidah Maulidiyah', '2022-02-06 10:05:25', '112.215.243.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(219, 'Siti Rahmadhani', '2022-02-06 09:53:54', '112.215.243.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(218, 'sentratek', '2022-02-06 09:42:41', '112.215.243.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(217, 'Rosyidah Maulidiyah', '2022-02-06 09:18:37', '112.215.243.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(216, 'Rosyidah Maulidiyah', '2022-02-02 21:11:28', '203.78.118.213', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(215, 'Rosyidah Maulidiyah', '2022-02-01 21:42:57', '140.213.56.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(229, 'Siti Rahmadhani', '2022-02-06 12:22:02', '118.137.127.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(234, 'Siti Rahmadhani', '2022-02-17 17:57:17', '112.215.154.237', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:97.0)'),
(233, 'Rosyidah Maulidiyah', '2022-02-17 17:56:48', '112.215.154.237', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:97.0)'),
(232, 'Deddy Tri Ariyanto', '2022-02-17 17:56:25', '112.215.154.237', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:97.0)'),
(231, 'Siti Rahmadhani', '2022-02-13 09:55:08', '112.215.173.148', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:97.0)'),
(230, 'Rosyidah Maulidiyah', '2022-02-13 09:54:01', '112.215.173.148', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:97.0)'),
(227, 'Siti Rahmadhani', '2022-02-06 10:43:47', '112.215.243.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)'),
(228, 'Rosyidah Maulidiyah', '2022-02-06 11:23:11', '112.215.243.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0)');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(70) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_image` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `nama`, `username`, `password`, `user_image`) VALUES
(1, 'Deddy Tri Ariyanto', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(3, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1632801634, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penawaran`
--

CREATE TABLE `penawaran` (
  `id` int(11) NOT NULL,
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
  `status_terpilih` varchar(20) DEFAULT 'pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penawaran`
--

INSERT INTO `penawaran` (`id`, `id_customer`, `no_spph_masuk`, `no_spph_keluar`, `no_procurement`, `no_pbi`, `tanggal`, `nama_barang`, `volume`, `satuan`, `vendor`, `inputed_by`, `approved_by`, `status`, `created_at`, `updated_at`, `note`, `kode_urut`, `confirm_vendor`, `status_terpilih`) VALUES
(183, 2, 'PR.SPPH.2111001', 'SPPH.WI.2201001', 'IO.WI.2201001', NULL, '03-01-2022', 'Cable NYFGBY 3x6mm', 35, 'meter', 'PT. SENTRATEK METALINDO', 'Siti Rahmadhani', 'Rosyidah Maulidiyah', 'confirm vendor', '2022-01-03 20:49:04', '2022-01-03 20:51:05', NULL, '01', '0, 20', 'confirm'),
(181, 2, 'PR.SPPH.2111001', 'SPPH.WI.2201001', 'IO.WI.2201001', NULL, '03-01-2022', 'Cable NYFGBY 3x2.5mm', 100, 'meter', 'PT. SENTRATEK METALINDO', 'Siti Rahmadhani', 'Rosyidah Maulidiyah', 'confirm vendor', '2022-01-03 20:49:04', '2022-01-03 20:51:09', NULL, '01', '0, 20', 'confirm'),
(182, 2, 'PR.SPPH.2111001', 'SPPH.WI.2201001', 'IO.WI.2201001', NULL, '03-01-2022', 'Cable NYFGBY 3x4mm', 50, 'meter', 'PT. SENTRATEK METALINDO', 'Siti Rahmadhani', 'Rosyidah Maulidiyah', 'confirm vendor', '2022-01-03 20:49:04', '2022-01-03 20:51:07', NULL, '01', '0, 20', 'confirm'),
(184, 5, 'WIN.AH.2111012.00', 'SPPH.WI.2201002', 'IO.WI.2201002', NULL, '08-01-2022', 'Sirine Type Harmony P/N: XVS10MMW Schneider', 4, 'Pcs', 'PT. Petikemas Surabaya, PT. SENTRATEK METALINDO', 'Siti Rahmadhani', 'Rosyidah Maulidiyah', 'confirm vendor', '2022-01-08 23:25:17', '2022-01-08 23:35:13', NULL, '01', '0, 20, 19', 'confirm'),
(185, 5, 'WIN.AH.2111012.00', 'SPPH.WI.2201002', 'IO.WI.2201002', NULL, '08-01-2022', 'Limit Switch XCKJ10541H29 SCHNEIDER', 10, 'Pcs', 'PT. Petikemas Surabaya, PT. SENTRATEK METALINDO', 'Siti Rahmadhani', 'Rosyidah Maulidiyah', 'confirm vendor', '2022-01-08 23:25:17', '2022-01-08 23:35:24', NULL, '01', '0, 20, 19', 'confirm'),
(186, 5, 'WIN.AH.2111012.00', 'SPPH.WI.2201002', 'IO.WI.2201002', NULL, '08-01-2022', 'Relay MY2N-GS 220/240VAC Omron', 40, 'Pcs', 'PT. Petikemas Surabaya, PT. SENTRATEK METALINDO', 'Siti Rahmadhani', 'Rosyidah Maulidiyah', 'confirm vendor', '2022-01-08 23:25:17', '2022-01-08 23:35:19', NULL, '01', '0, 20, 19', 'confirm'),
(187, 4, 'FR.SPPH.2202001', 'SPPH.WI.2202001', 'IO.WI.2202001', NULL, '01-02-2022', 'Coba Procurement Proses', 10, 'Roll', 'PT.Wilis Elektronik, PT. Petikemas Surabaya, PT. SENTRATEK METALINDO', 'Siti Rahmadhani', 'Rosyidah Maulidiyah', 'confirm vendor', '2022-02-01 20:05:10', '2022-02-01 21:42:37', NULL, '02', '0, 20, 18, 19', 'confirm'),
(188, 4, 'FR.SPPH.2202001', 'SPPH.WI.2202001', 'IO.WI.2202001', NULL, '01-02-2022', 'Coba Procurement Proses 1.0', 2, 'Pack', 'PT.Wilis Elektronik, PT. Petikemas Surabaya, PT. SENTRATEK METALINDO', 'Siti Rahmadhani', 'Rosyidah Maulidiyah', 'confirm vendor', '2022-02-01 20:05:10', '2022-02-01 21:42:27', NULL, '02', '0, 18, 20, 19', 'confirm'),
(189, 3, 'SK.2202001', 'SPPH.WI.2202003', 'IO.WI.2202003', NULL, '01-02-2022', 'Apa Aja dah', 10, 'Ls', 'PT.Wilis Elektronik, PT. Petikemas Surabaya, PT. SENTRATEK METALINDO', 'Siti Rahmadhani', 'Rosyidah Maulidiyah', 'confirm vendor', '2022-02-01 21:11:50', '2022-02-01 21:42:16', NULL, '02', '0, 18, 20, 19', 'confirm'),
(190, 3, 'SK.2202001', 'SPPH.WI.2202003', 'IO.WI.2202003', NULL, '01-02-2022', 'Sama seperti kemarin', 20, 'Meter', 'PT.Wilis Elektronik, PT. Petikemas Surabaya, PT. SENTRATEK METALINDO', 'Siti Rahmadhani', 'Rosyidah Maulidiyah', 'confirm vendor', '2022-02-01 21:11:50', '2022-02-01 21:42:07', NULL, '02', '0, 18, 20, 19', 'confirm'),
(191, 3, 'SK.2202001', 'SPPH.WI.2202003', 'IO.WI.2202003', NULL, '01-02-2022', 'Barang yang tempo hari', 90, 'Roll', 'PT.Wilis Elektronik, PT. Petikemas Surabaya, PT. SENTRATEK METALINDO', 'Siti Rahmadhani', 'Rosyidah Maulidiyah', 'confirm vendor', '2022-02-01 21:11:50', '2022-02-01 21:41:54', NULL, '02', '0, 18, 20, 19', 'confirm'),
(192, 4, 'FR.SPPH.2202002', 'SPPH.WI.2202002', 'IO.WI.2202002', NULL, '01-02-2022', 'Apa itu lupa', 90, 'Unit', 'PT.Wilis Elektronik, PT. Petikemas Surabaya, PT. SENTRATEK METALINDO', 'Siti Rahmadhani', 'Rosyidah Maulidiyah', 'confirm vendor', '2022-02-01 21:12:41', '2022-02-01 21:41:41', NULL, '02', '0, 18, 20, 19', 'confirm'),
(193, 4, 'FR.SPPH.2202002', 'SPPH.WI.2202002', 'IO.WI.2202002', NULL, '01-02-2022', 'yang bulet', 20, 'Unit', 'PT.Wilis Elektronik, PT. Petikemas Surabaya, PT. SENTRATEK METALINDO', 'Siti Rahmadhani', 'Rosyidah Maulidiyah', 'confirm vendor', '2022-02-01 21:12:41', '2022-02-01 21:41:25', NULL, '02', '0, 18, 20, 19', 'confirm'),
(194, 2, 'PR.SPPH.2211001', 'SPPH.WI.2202005', NULL, NULL, '02-02-2022', 'test', 12, 'Unit', 'PT.Wilis Elektronik, PT. Petikemas Surabaya, PT. SENTRATEK METALINDO', 'Rosyidah Maulidiyah', 'Rosyidah Maulidiyah', 'on process', '2022-02-02 20:51:09', '2022-02-02 20:51:09', NULL, '02', '0', 'pending'),
(195, 4, 'FR.SPPH.2202006', 'SPPH.WI.2202004', NULL, NULL, '06-02-2022', 'Relay MY2N-GS 220/240VAC Omron', 10, 'Pcs', 'PT.Wilis Elektronik, PT. Petikemas Surabaya', 'Siti Rahmadhani', 'Rosyidah Maulidiyah', 'confirm vendor', '2022-02-06 10:06:46', '2022-02-06 10:08:23', NULL, '02', '0, 18', 'pending'),
(196, 4, 'FR.SPPH.2202006', 'SPPH.WI.2202004', NULL, NULL, '06-02-2022', 'Cable NYFGBY 3x2.5mm', 100, 'Meter', 'PT.Wilis Elektronik, PT. Petikemas Surabaya', 'Siti Rahmadhani', 'Rosyidah Maulidiyah', 'confirm vendor', '2022-02-06 10:06:46', '2022-02-06 10:08:33', NULL, '02', '0, 18', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
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
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `phone`, `vendor`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'adisett57@gmail.com', 'Deddy Tri Ariyanto', 'Deddy Tri Ariyanto', '081190871289', 'local user', 'dummy_profile3.jpg', '$2y$10$fJK3hCJHGSV0DRwQkdtUYeubK5SbtoHLWaxmeZ.cDU4qgrwGE3oxy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-28 11:04:08', '2021-12-25 23:59:42', NULL),
(17, 'marketing@gmail.com', 'Siti Rahmadhani', 'Siti Rahmadhani', '099588998', 'local user', 'dummy_profile_1.jpg', '$2y$10$jNY5szfyYI21DjWexPJQOexfQT94aeRGNlK2jxNthRK3SLA7hno1a', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-10-04 17:23:10', '2022-01-09 00:38:34', NULL),
(16, 'adysetyawan57@gmail.com', 'Rosyidah Maulidiyah', 'Rosyidah Maulidiyah', '00383900', 'local user', 'dummy_profile2.jpg', '$2y$10$AhhEzGhUwj8qFx0dl4g4RexLOga6kTVpEX2gSRXigtgM3UTODnS0u', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-10-04 16:54:14', '2021-12-25 23:51:30', NULL),
(29, 'Sujadmiko@wlselektro.com', 'Sujad', 'Sujadmiko', '081190871289', 'PT.Wilis Elektronik', 'default.svg', '$2y$10$f/T1AVeFJG1KK/bb7MQno.IcsDKlLdhoT9fIZnRBQqimk5qcPH8p.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-10-25 18:19:35', '2021-10-25 18:19:35', NULL),
(31, 'sentratek@gmail.com', 'sentratek', 'Mac Santoso', '0881987256710', 'PT. SENTRATEK METALINDO', 'default.svg', '$2y$10$afoqcyJGKdypbTraKFZuyOEGbzmZGoq.0gw9whvZC9Soi3PzkjPaG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-11-02 11:35:51', '2021-11-02 11:35:51', NULL),
(30, 'Hendry@buss.co', 'petikemas', 'Hendry chow', '0859995788', 'PT. Petikemas Surabaya', 'default.svg', '$2y$10$UdxupbZIFRbTJw.ggvsftuWRe3Q2R8PHiAgA7q.GNlubhEWFHM.8K', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-10-25 18:23:55', '2021-10-25 18:23:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `vendor` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `vendor`, `fullname`, `phone`, `jabatan`, `username`, `password`, `created_by`, `created_at`, `updated_at`) VALUES
(18, 'PT.Wilis Elektronik', 'Sujadmiko', '081190871289', 'marketing', 'Sujad', 'puitis123', 'AdiSetiawan', '2021-10-25 18:19:34', '2021-10-25 18:19:34'),
(19, 'PT. Petikemas Surabaya', 'Hendry chow', '0859995788', 'Operasional Manager', 'petikemas', 'puitis123', 'AdiSetiawan', '2021-10-25 18:23:55', '2021-10-25 18:23:55'),
(20, 'PT. SENTRATEK METALINDO', 'Mac Santoso', '0881987256710', 'Purchasing', 'sentratek', 'sentratek123', 'AdiSetiawan', '2021-11-02 11:35:51', '2021-11-02 11:35:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisa_harga`
--
ALTER TABLE `analisa_harga`
  ADD PRIMARY KEY (`id_analisa`);

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_vendor`
--
ALTER TABLE `feedback_vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penawaran`
--
ALTER TABLE `penawaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendor` (`vendor`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisa_harga`
--
ALTER TABLE `analisa_harga`
  MODIFY `id_analisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=474;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback_vendor`
--
ALTER TABLE `feedback_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penawaran`
--
ALTER TABLE `penawaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
