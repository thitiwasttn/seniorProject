-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2019 at 10:21 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE `line` (
  `lineid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `channel_access_token` text NOT NULL,
  `nicknametoken` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `line`
--

INSERT INTO `line` (`lineid`, `email`, `channel_access_token`, `nicknametoken`) VALUES
(4, 'chalo.pure@gmail.com', 'pppopopo', ''),
(6, 'peeghost@hotmail.com', 'e0nUbaS/JvD0KWbELDxG3K899wU26MpwPCYCEGxheahI+yJo1Xa5Gsw5zI5zfJUmxZ61fy/kGcxRRk+w2U5z7lB0/ScB2pCWRYg9Xt28JzM6YiJ3gVZj7qU0Tl0DJ97oG10D3agEYmXDUhuDRkMYtwdB04t89/1O/w1cDnyilFU=', ''),
(7, 'ex@ex.com', 'DPcz6qv89mFcNW+TBKIloJPN6K0FmlCc0Fs0eoHknIQVBOXqonNMI7/ASeGxBa5U/eTINQLm/srOW19jkdXcIZV8nf4VsDW1UqOA5XpGTKjnO34Syv+NjHdEvtzIplEUCZXI7LvjldYJB4TCsVcmPwdB04t89/1O/w1cDnyilFU=', ''),
(8, 'rrr@rr.com', 'adwdwdc', ''),
(9, 'test@tt.com', 'acawcwac', ''),
(10, 'mookmiq@hotmail.com', 'jsnnns', ''),
(11, 'twopee261@gmail.com', 'DPcz6qv89mFcNW+TBKIloJPN6K0FmlCc0Fs0eoHknIQVBOXqonNMI7/ASeGxBa5U/eTINQLm/srOW19jkdXcIZV8nf4VsDW1UqOA5XpGTKjnO34Syv+NjHdEvtzIplEUCZXI7LvjldYJB4TCsVcmPwdB04t89/1O/w1cDnyilFU=', ''),
(12, 'peeghost@hotmail.com', 'DPcz6qv89mFcNW+TBKIloJPN6K0FmlCc0Fs0eoHknIQVBOXqonNMI7/ASeGxBa5U/eTINQLm/srOW19jkdXcIZV8nf4VsDW1UqOA5XpGTKjnO34Syv+NjHdEvtzIplEUCZXI7LvjldYJB4TCsVcmPwdB04t89/1O/w1cDnyilFU=', '');

-- --------------------------------------------------------

--
-- Table structure for table `linelogin`
--

CREATE TABLE `linelogin` (
  `lineloginid` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `channelid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `login` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `detail` text NOT NULL,
  `ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`login`, `userid`, `date`, `detail`, `ip`) VALUES
(15, 4, '2019-06-19 07:37:45', 'login', '192.168.1.35'),
(16, 4, '2019-06-19 07:38:05', 'login', '192.168.1.35'),
(17, 1, '2019-06-19 07:38:51', 'login', '192.168.1.35'),
(18, 4, '2019-06-19 12:47:31', 'login', '192.168.1.35'),
(19, 1, '2019-06-21 08:07:04', 'login', '172.17.143.213'),
(20, 4, '2019-06-21 08:10:33', 'login', '172.17.143.213'),
(21, 0, '2019-06-24 04:17:32', 'login', '172.17.143.213'),
(22, 4, '2019-06-24 04:17:37', 'login', '172.17.143.213'),
(23, 4, '2019-06-24 06:13:55', 'login', '172.17.143.213'),
(24, 4, '2019-06-25 01:45:00', 'login', '172.17.143.213'),
(25, 4, '2019-06-25 04:38:46', 'login', '172.17.143.213'),
(26, 4, '2019-06-25 06:25:28', 'login', '172.17.133.253'),
(27, 1, '2019-06-25 16:26:29', 'login', '::1'),
(28, 1, '2019-06-25 17:01:22', 'login', '192.168.1.50'),
(29, 1, '2019-06-25 17:09:45', 'login', '192.168.1.50'),
(30, 0, '2019-06-26 12:36:46', 'login', '192.168.1.38'),
(31, 4, '2019-06-26 12:36:54', 'login', '192.168.1.38'),
(32, 4, '2019-06-26 17:06:33', 'login', '192.168.1.50'),
(33, 4, '2019-06-26 17:12:11', 'login', '192.168.1.50'),
(34, 1, '2019-06-26 17:12:54', 'login', '192.168.1.50'),
(35, 0, '2019-06-26 17:13:45', 'login', '192.168.1.50'),
(36, 4, '2019-06-26 17:13:50', 'login', '192.168.1.50'),
(37, 4, '2019-06-27 06:32:39', 'login', '192.168.1.50'),
(38, 4, '2019-06-27 06:40:26', 'login', '192.168.1.38'),
(39, 4, '2019-06-27 06:43:15', 'login', '192.168.1.38'),
(40, 4, '2019-06-27 07:23:12', 'login', '192.168.1.50'),
(41, 4, '2019-06-27 09:07:57', 'login', '192.168.1.50'),
(42, 4, '2019-06-27 10:11:25', 'login', '192.168.1.50'),
(43, 4, '2019-06-27 11:16:15', 'login', '192.168.1.38'),
(44, 4, '2019-06-27 12:45:04', 'login', '192.168.1.50'),
(45, 4, '2019-06-27 14:42:47', 'login', '192.168.1.50'),
(46, 4, '2019-06-27 15:36:38', 'login', '192.168.1.50'),
(47, 4, '2019-06-28 04:34:56', 'login', '172.17.143.213'),
(48, 4, '2019-06-28 04:45:39', 'login', '172.17.133.253'),
(49, 4, '2019-06-28 07:58:19', 'login', '172.17.133.253'),
(50, 4, '2019-06-29 08:36:38', 'login', '192.168.1.38'),
(51, 4, '2019-06-29 10:40:23', 'login', '192.168.1.47'),
(52, 4, '2019-06-29 15:21:35', 'login', '192.168.1.38'),
(53, 4, '2019-06-29 15:23:29', 'login', '192.168.1.47'),
(54, 1, '2019-06-29 16:54:52', 'login', '192.168.1.38'),
(55, 4, '2019-06-29 16:55:22', 'login', '192.168.1.38'),
(56, 4, '2019-06-29 17:04:05', 'login', '192.168.1.38'),
(57, 4, '2019-06-29 17:54:04', 'login', '192.168.1.47'),
(58, 4, '2019-06-29 18:33:00', 'login', '192.168.1.47'),
(59, 4, '2019-06-29 19:58:03', 'login', '192.168.1.47'),
(60, 4, '2019-06-30 17:14:13', 'login', '192.168.1.38'),
(61, 0, '2019-06-30 17:14:49', 'login', '192.168.1.39'),
(62, 4, '2019-07-01 03:34:14', 'login', '172.17.134.90'),
(63, 4, '2019-07-01 04:51:36', 'login', '172.17.140.253'),
(64, 4, '2019-07-02 06:19:04', 'login', '172.17.134.90'),
(65, 4, '2019-07-02 07:01:34', 'login', '172.17.134.90'),
(66, 0, '2019-07-02 09:03:34', 'login', '172.17.107.53'),
(67, 0, '2019-07-02 09:03:39', 'login', '172.17.107.53'),
(68, 0, '2019-07-02 09:03:42', 'login', '172.17.107.53'),
(69, 0, '2019-07-02 09:03:45', 'login', '172.17.107.53'),
(70, 0, '2019-07-02 09:03:49', 'login', '172.17.107.53'),
(71, 4, '2019-07-02 09:04:41', 'login', '172.17.140.253'),
(72, 0, '2019-07-02 09:05:00', 'login', '172.17.107.53'),
(73, 0, '2019-07-02 09:05:03', 'login', '172.17.107.53'),
(74, 0, '2019-07-02 09:08:58', 'login', '172.17.136.68'),
(75, 0, '2019-07-02 09:09:07', 'login', '172.17.136.68'),
(76, 9, '2019-07-02 09:10:06', 'login', '172.17.136.68'),
(77, 4, '2019-07-02 09:10:37', 'login', '172.17.134.90'),
(78, 0, '2019-07-02 09:16:30', 'login', '172.17.136.68'),
(79, 9, '2019-07-02 09:16:33', 'login', '172.17.136.68'),
(80, 1, '2019-07-06 09:01:53', 'login', '::1'),
(81, 1, '2019-07-06 09:06:33', 'login', '::1'),
(82, 1, '2019-07-06 17:00:37', 'login', '192.168.1.47'),
(83, 4, '2019-07-07 08:04:05', 'login', '192.168.1.47'),
(84, 4, '2019-07-07 11:18:37', 'login', '192.168.1.35'),
(85, 0, '2019-07-08 16:59:24', 'login', '192.168.1.38'),
(86, 4, '2019-07-08 16:59:28', 'login', '192.168.1.38'),
(87, 10, '2019-07-08 17:02:10', 'login', '192.168.1.38'),
(88, 4, '2019-07-08 17:03:56', 'login', '192.168.1.38'),
(89, 1, '2019-07-08 17:14:13', 'login', '192.168.1.38'),
(90, 1, '2019-07-09 02:20:35', 'login', '::1'),
(91, 0, '2019-07-09 02:32:16', 'login', '172.17.134.90'),
(92, 4, '2019-07-09 02:32:20', 'login', '172.17.134.90'),
(93, 4, '2019-07-09 02:47:17', 'login', '172.17.134.90'),
(94, 1, '2019-07-09 02:57:29', 'login', '::1'),
(95, 4, '2019-07-09 02:59:43', 'login', '172.17.134.90'),
(96, 4, '2019-07-09 03:21:49', 'login', '172.17.134.90'),
(97, 4, '2019-07-09 04:16:13', 'login', '172.17.134.90'),
(98, 4, '2019-07-09 04:29:51', 'login', '172.17.134.90'),
(99, 0, '2019-07-09 04:33:14', 'login', '172.17.134.90'),
(100, 4, '2019-07-09 04:33:20', 'login', '172.17.134.90'),
(101, 4, '2019-07-09 04:44:39', 'login', '172.17.134.90'),
(102, 4, '2019-07-09 04:44:58', 'login', '172.17.134.90'),
(103, 4, '2019-07-09 06:05:20', 'login', '172.17.134.90'),
(104, 4, '2019-07-09 06:08:20', 'login', '172.17.134.90'),
(105, 4, '2019-07-09 06:12:02', 'login', '172.17.134.90'),
(106, 4, '2019-07-09 06:14:12', 'login', '172.17.134.90'),
(107, 0, '2019-07-09 06:20:22', 'login', '172.17.134.90'),
(108, 4, '2019-07-09 06:20:26', 'login', '172.17.134.90'),
(109, 4, '2019-07-09 07:09:23', 'login', '172.17.134.90'),
(110, 4, '2019-07-09 07:56:02', 'login', '172.17.140.253'),
(111, 4, '2019-07-10 16:17:07', 'login', '::1'),
(112, 4, '2019-07-11 03:42:03', 'login', '::1'),
(113, 4, '2019-07-13 09:30:39', 'login', '::1'),
(114, 4, '2019-07-13 10:35:28', 'login', '192.168.1.47'),
(115, 4, '2019-07-13 10:37:02', 'login', '192.168.1.47'),
(116, 4, '2019-07-13 10:54:28', 'login', '192.168.1.47'),
(117, 4, '2019-07-13 12:25:15', 'login', '192.168.1.47'),
(118, 3, '2019-07-13 12:42:00', 'login', '::1'),
(119, 3, '2019-07-13 12:43:59', 'login', '192.168.1.47'),
(120, 4, '2019-07-13 12:46:18', 'login', '::1'),
(121, 3, '2019-07-13 12:46:42', 'login', '::1'),
(122, 4, '2019-07-13 12:48:38', 'login', '::1'),
(123, 4, '2019-07-13 16:00:34', 'login', '192.168.1.47'),
(124, 4, '2019-07-13 16:49:02', 'login', '192.168.1.47'),
(125, 4, '2019-07-13 19:11:25', 'login', '::1'),
(126, 4, '2019-07-13 19:39:06', 'login', '::1'),
(127, 3, '2019-07-13 19:39:41', 'login', '::1'),
(128, 4, '2019-07-13 19:39:58', 'login', '::1'),
(129, 4, '2019-07-13 19:40:11', 'login', '::1'),
(130, 4, '2019-07-15 02:23:20', 'login', '::1'),
(131, 4, '2019-07-16 12:52:26', 'login', '::1'),
(132, 4, '2019-07-17 13:54:53', 'login', '192.168.1.51'),
(133, 4, '2019-07-17 14:08:21', 'login', '192.168.1.51'),
(134, 4, '2019-07-17 14:08:25', 'login', '192.168.1.51'),
(135, 4, '2019-07-17 15:07:27', 'login', '192.168.1.51'),
(136, 4, '2019-07-17 15:11:05', 'login', '192.168.1.51'),
(137, 4, '2019-07-17 15:11:08', 'login', '192.168.1.51'),
(138, 4, '2019-07-17 15:11:09', 'login', '192.168.1.51'),
(139, 4, '2019-07-17 15:18:05', 'login', '192.168.1.51'),
(140, 4, '2019-07-17 15:19:21', 'login', '192.168.1.47'),
(141, 4, '2019-07-17 15:20:52', 'login', '192.168.1.38'),
(142, 4, '2019-07-18 13:55:13', 'login', '192.168.1.51'),
(143, 4, '2019-07-18 13:55:54', 'login', '::1'),
(144, 4, '2019-07-18 14:40:55', 'login', '192.168.1.51'),
(145, 4, '2019-07-18 14:42:36', 'login', '192.168.1.51'),
(146, 4, '2019-07-18 14:44:27', 'login', '192.168.1.51'),
(147, 4, '2019-07-18 14:46:29', 'login', '192.168.1.51'),
(148, 4, '2019-07-18 14:47:01', 'login', '192.168.1.51'),
(149, 4, '2019-07-18 16:52:17', 'login', '192.168.1.51'),
(150, 4, '2019-07-18 17:19:31', 'login', '192.168.1.51'),
(151, 4, '2019-07-18 17:39:43', 'login', '192.168.1.51'),
(152, 4, '2019-07-19 05:55:13', 'login', '172.17.143.70'),
(153, 4, '2019-07-19 05:58:05', 'login', '172.17.143.70'),
(154, 4, '2019-07-19 07:59:39', 'login', '172.17.143.70'),
(155, 4, '2019-07-19 08:53:24', 'login', '::1'),
(156, 4, '2019-07-19 09:12:19', 'login', '172.17.134.90'),
(157, 4, '2019-08-03 07:23:13', 'login', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `massage`
--

CREATE TABLE `massage` (
  `massageid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `massage` text NOT NULL,
  `datein` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `typemassage` enum('text','image','sticker','') NOT NULL,
  `type` enum('timmer','sent','error','') NOT NULL COMMENT 'รอส่ง ส่งแล้ว ผิดพลาด',
  `timeline` tinyint(1) NOT NULL,
  `target` enum('all friends','custom','','') NOT NULL,
  `recipient` text NOT NULL,
  `dateout` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `massage`
--

INSERT INTO `massage` (`massageid`, `email`, `massage`, `datein`, `typemassage`, `type`, `timeline`, `target`, `recipient`, `dateout`) VALUES
(51, 'peeghost@hotmail.com', 'hello world', '2019-06-29 19:01:15', 'text', 'sent', 0, 'all friends', '', '2019-05-27 08:33:00'),
(52, 'peeghost@hotmail.com', '/project/broadcast.php?t=text&t2=1', '2019-06-29 17:05:55', 'text', 'sent', 0, 'all friends', '', '2019-05-22 21:56:00'),
(53, 'peeghost@hotmail.com', '/project/broadcast.php?t=text&t2=1', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-22 21:56:00'),
(54, 'peeghost@hotmail.com', 'test Boradcast', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-23 07:31:00'),
(55, 'peeghost@hotmail.com', 'thitiwas nupan\r\nxxx', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-30 18:11:00'),
(56, 'peeghost@hotmail.com', '5/22', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-23 10:00:00'),
(57, 'ex@ex.com', 'lekfoewkfokesofkselfkoefkoesfkoesfvmeomwkpvmfoqpw,ld,c,oekofkwf\r\n,d,vcoergvoeskfgosefkds;,voepogekwogkldsldvoewpogkw\r\nsfseplfpselfpsefl[espfl[pgotkhb\r\nb,,botlekfoewkfokesofkselfkoefkoesfkoesfvmeomwkpvmfoqpw,ld,c,oekofkwf\r\n,d,vcoergvoeskfgosefkds;,voepogekwogkldsldvoewpogkw\r\nsfseplfpselfpsefl[espfl[pgotkhb\r\nb,,bot', '2019-07-06 09:15:57', 'text', 'timmer', 0, 'all friends', '', '2019-05-30 09:12:00'),
(58, 'peeghost@hotmail.com', 'line1\r\nline2\r\nline3', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-29 09:30:00'),
(59, 'peeghost@hotmail.com', 'ad', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-27 17:34:00'),
(60, 'peeghost@hotmail.com', 'adawdwdadad', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-30 19:14:00'),
(61, 'peeghost@hotmail.com', 'dad', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-29 07:14:00'),
(63, 'peeghost@hotmail.com', 'aaa', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-27 19:14:00'),
(64, 'peeghost@hotmail.com', 'pee', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-26 19:14:00'),
(65, 'peeghost@hotmail.com', 'qeqeeqweqepee', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-27 19:14:00'),
(66, 'peeghost@hotmail.com', 'qqqqq', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-26 19:14:00'),
(67, 'peeghost@hotmail.com', '1kqwjkfjwe', '2019-07-01 03:40:05', 'text', 'timmer', 0, 'all friends', '', '2019-05-26 19:14:00'),
(68, 'peeghost@hotmail.com', '1', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-28 19:14:00'),
(69, 'peeghost@hotmail.com', '2', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-28 19:14:00'),
(70, 'peeghost@hotmail.com', '3', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-28 19:14:00'),
(76, 'peeghost@hotmail.com', 'aaa', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-27 17:34:00'),
(77, 'peeghost@hotmail.com', 'aaa', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-26 17:34:00'),
(78, 'peeghost@hotmail.com', 'aaa', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-25 21:44:00'),
(79, 'peeghost@hotmail.com', '1', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-26 17:13:00'),
(80, 'peeghost@hotmail.com', '2', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-26 17:13:00'),
(81, 'peeghost@hotmail.com', '3', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-26 17:13:00'),
(82, 'peeghost@hotmail.com', '1', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-29 05:41:00'),
(83, 'peeghost@hotmail.com', '2', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-29 05:41:00'),
(84, 'peeghost@hotmail.com', '3', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-05-29 05:41:00'),
(86, 'peeghost@hotmail.com', '2', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-05 17:42:00'),
(87, 'peeghost@hotmail.com', '685118135', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-05 17:42:00'),
(103, 'peeghost@hotmail.com', '15588584642643.jpg', '2019-06-29 17:05:10', 'image', 'timmer', 0, 'all friends', '', '2019-05-29 10:14:00'),
(104, 'peeghost@hotmail.com', '15618386786763.jpg', '2019-06-29 20:04:38', 'image', 'timmer', 0, 'all friends', '', '2019-06-30 07:14:00'),
(105, 'peeghost@hotmail.com', '15588585138263.jpeg', '2019-06-29 17:05:10', 'image', 'timmer', 0, 'all friends', '', '2019-05-29 10:14:00'),
(106, 'peeghost@hotmail.com', '15588609603114.jpg', '2019-06-29 17:05:10', 'image', 'timmer', 0, 'all friends', '', '2019-05-30 11:55:00'),
(107, 'peeghost@hotmail.com', '15588609603123.jpg', '2019-06-29 17:05:10', 'image', 'timmer', 0, 'all friends', '', '2019-05-30 11:55:00'),
(109, 'peeghost@hotmail.com', 'ส่ง 6 โมง', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-05 13:00:00'),
(110, 'peeghost@hotmail.com', '10 pm', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-05 15:00:00'),
(111, 'peeghost@hotmail.com', '1 am', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-05 18:00:00'),
(112, 'peeghost@hotmail.com', '12:48', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-05 17:48:00'),
(113, 'peeghost@hotmail.com', '12.56', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-05 17:56:00'),
(114, 'peeghost@hotmail.com', '12.57', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-05 17:57:00'),
(115, 'peeghost@hotmail.com', 'You are using Python 2 for which the input() function tries to evaluate the expression entered. Because you enter a string, Python treats it as a name and tries to evaluate it. If there is no variable defined with that name you will get a NameError exception.\r\n\r\nTo fix the problem, in Python 2, you can use raw_input(). This returns the string entered by the user and does not attempt to evaluate it.\r\n\r\nNote that if you were using Python 3, input() behaves the same as raw_input() does in Python 2.', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-05 18:02:00'),
(116, 'peeghost@hotmail.com', 'adwadawda\r\nawd\r\nawd\r\naw\r\nd\r\ndw\r\nd', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-05 18:05:00'),
(117, 'peeghost@hotmail.com', '12.09', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-05 17:09:00'),
(118, 'peeghost@hotmail.com', 'awdad', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-05 18:09:00'),
(119, 'peeghost@hotmail.com', 'wdad', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-05 18:00:00'),
(120, 'peeghost@hotmail.com', 'line1\r\nline2\r\nline3', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-06 10:00:00'),
(121, 'peeghost@hotmail.com', '8.22pm', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-06 13:23:00'),
(122, 'peeghost@hotmail.com', 'set form 8.26 pm\r\nmust sent form 8.30pm', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-06 13:30:00'),
(123, 'peeghost@hotmail.com', 'set 8.32 pm\r\nsent 9.00pm\r\nสวัสดีจ้าา\r\nเทสๆ', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-06 14:00:00'),
(124, 'peeghost@hotmail.com', 'login\r\nMarvel Future fight', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-06 15:00:00'),
(125, 'peeghost@hotmail.com', 'Ibekke', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-06 15:59:00'),
(126, 'peeghost@hotmail.com', '(super angry)', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-06 16:00:00'),
(128, 'peeghost@hotmail.com', 'adwa', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-06 18:52:00'),
(129, 'peeghost@hotmail.com', 'adw', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-06 18:00:00'),
(130, 'peeghost@hotmail.com', '12314', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-06 18:00:00'),
(134, 'peeghost@hotmail.com', 'awd', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-06 18:00:00'),
(135, 'peeghost@hotmail.com', 'Hbe', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-06 19:07:00'),
(136, 'peeghost@hotmail.com', '1234141412414144\r\njkghjuh\r\nndfhftdh', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-06 19:00:00'),
(137, 'peeghost@hotmail.com', '1559848719593.jpg', '2019-06-29 17:05:10', 'image', 'timmer', 0, 'all friends', '', '2019-06-06 18:11:00'),
(138, 'peeghost@hotmail.com', '15626561979562.jpg', '2019-07-15 02:30:43', 'image', 'error', 0, 'all friends', '', '2019-06-06 19:14:00'),
(139, 'peeghost@hotmail.com', 'ad', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-06 22:45:00'),
(140, 'peeghost@hotmail.com', 'adawd', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-07 05:14:00'),
(141, 'peeghost@hotmail.com', '124124124', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-09 09:00:00'),
(142, 'peeghost@hotmail.com', '2.52 pm', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-09 07:52:00'),
(143, 'peeghost@hotmail.com', 'set 2.52pm \r\nmust sent 3.00pm', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-09 08:00:00'),
(144, 'peeghost@hotmail.com', 'set 15.10 \r\nmust sent 15.15', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-09 08:15:00'),
(145, 'peeghost@hotmail.com', '15618322549735.jpeg', '2019-06-29 19:56:20', 'image', 'timmer', 0, 'all friends', '', '2019-06-30 07:01:00'),
(147, 'peeghost@hotmail.com', 'ลักษณะสำคัญ\r\nวิกิเน้นการทำงานแบบง่าย ซึ่งผู้เขียนสามารถสร้างเนื้อหาบนเว็บได้โดยไม่จำเป็นต้องมีความรู้ในภาษาเอชทีเอ็มแอล โดยข้อมูลถูกเขียนร่วมกันด้วยภาษามาร์กอัปอย่างง่ายโดยผ่านเว็บเบราว์เซอร์ ในแต่ละหน้าจะถูกเรียกว่า \"หน้าวิกิ\" และเนื้อหาภายในจะเชื่อมต่อกันผ่านทางไฮเปอร์ลิงก์ ซึ่งส่งผลให้ในแต่ละวิกิสามารถทำงานผ่านระบบที่เรียบ ง่ายและสามารถใช้เป็นฐานข้อมูล สำหรับสืบค้น ดูแลรักษาที่ง่าย\r\n\r\nนิยามลักษณะของเทคโนโลยีวิกิคือความง่ายในการสร้างและแก้ไขหน้าเว็บ โดยไม่จำเป็นต้องผ่านการตรวจสอบหรือยืนยันจากเจ้าของเว็บนั้น เว็บวิกิหลายแห่งเปิดให้ผู้ใช้บริการทั่วไปในขณะที่บางกรณี ขึ้นอยู่กับการตั้งค่าวิกิบนเซิร์ฟเวอร์ ผู้ใช้อาจจะต้องล็อกอินเพื่อแก้ไข หรือเพื่ออ่านบางหน้า\r\n\r\nหน้าวิกิและการแก้ไข\r\nรูปแบบรหัสต้นฉบับบางครั้งก็รู้จักกันในชื่อ \"ข้อความวิกิ\" ซึ่งประกอบไปด้วยข้อความธรรมดารวมกับภาษามาร์กอัปอย่างง่ายซึ่งใช้ในการกำหนดโครงสร้างของเอกสารและรูปลักษณ์ในการแสดงผล ตัวอย่างที่มักพบบ่อยได้แก่ การใช้เครื่องหมายดอกจัน (\"*\") ขึ้นต้นบรรทัด เพื่อเป็นสัญลักษณ์บอกว่าบรรทัดนั้นเป็นรายการหนึ่งในรายการแบบจุดนำ รูปแบบและวากยสัมพันธ์สามารถแตกต่างกันออกไปได้หลายแบบขึ้นอยู่กับการนำไปใช้ ในบางระบบอนุญาตให้ใช้แท็ก HTML ได้\r\n\r\nการออกแบบข้อความวิกิมีเหตุผลมากจาก HTML ซึ่งแท็กหลายแท็กมีความคลุมเครือ ทำให้จากรหัสต้นฉบับ HTML ผู้ใช้สร้างจินตนาภาพถึงผลลัพธ์ได้ยาก สำหรับผู้ใช้ส่วนมากการอ่านและการแก้ไขเนื้อหาบนรหัสต้นฉบับ HTML โดยตรงเป็นสิ่งที่ทำได้ยากมาก ดังนั้นการส่งเสริมให้แก้ไขบนข้อความธรรมดากับข้อตกลงอีกนิดหน่อยเพื่อการกำหนดโครงสร้างและรูปแบบจึงเป็นสิ่งที่ดีกว่า\r\n\r\nนอกจากนั้นการที่ผู้ใช้ไม่สามารถใช้ความสามารถบางอย่างของภาษา HTML เช่น จาวาสคริปต์ และ Cascading Style Sheet ได้โดยตรง ทำให้ได้ประโยชน์คือรูปลักษณ์และความรู้สึก (Look and Feel) ในการใช้งานวิกิมีความสอดคล้องกัน เนื่องจากผู้ใช้แก้ไขรูปแบบได้อย่างจำกัด พร้อมทั้งความปลอดภัยที่เพิ่มขึ้น ในการนำวิกิไปใช้หลายระบบแสดงให้เห็นไฮเปอร์ลิงก์ที่ใช้งานได้เสมอ ไม่เหมือนในการใช้ HTML ซึ่งข้อความที่ไม่สามารถมองเห็นจากการแสดงผลว่าเป็นไฮเปอร์ลิงก์ก็อาจจะเป็นไฮเปอร์ลิงก์ได้\r\n\r\nตัวอย่างเปรียบเทียบคำสั่ง', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-09 09:00:00'),
(148, 'peeghost@hotmail.com', 'หน้าวิกิและการแก้ไข \r\nรูปแบบรหัสต้นฉบับบางครั้งก็รู้จักกันในชื่อ \"ข้อความวิกิ\" ซึ่งประกอบไปด้วยข้อความธรรมดารวมกับภาษามาร์กอัปอย่างง่ายซึ่งใช้ในการกำหนดโครงสร้างของเอกสารและรูปลักษณ์ในการแสดงผล ตัวอย่างที่มักพบบ่อยได้แก่ การใช้เครื่องหมายดอกจัน (\"*\") ขึ้นต้นบรรทัด เพื่อเป็นสัญลักษณ์บอกว่าบรรทัดนั้นเป็นรายการหนึ่งในรายการแบบจุดนำ รูปแบบและวากยสัมพันธ์สามารถแตกต่างกันออกไปได้หลายแบบขึ้นอยู่กับการนำไปใช้ ในบางระบบอนุญาตให้ใช้แท็ก HTML ได้', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-09 09:00:00'),
(149, 'peeghost@hotmail.com', 'หน้าวิกิและการแก้ไข \r\nรูปแบบรหัสต้นฉบับบางครั้งก็รู้จักกันในชื่อ \"ข้อความวิกิ\" ซึ่งประกอบไปด้วยข้อความธรรมดารวมกับภาษามาร์กอัปอย่างง่ายซึ่งใช้ในการกำหนดโครงสร้างของเอกสารและรูปลักษณ์ในการแสดงผล ตัวอย่างที่มักพบบ่อยได้แก่ การใช้เครื่องหมายดอกจัน (\"*\") ขึ้นต้นบรรทัด เพื่อเป็นสัญลักษณ์บอกว่าบรรทัดนั้นเป็นรายการหนึ่งในรายการแบบจุดนำ รูปแบบและวากยสัมพันธ์สามารถแตกต่างกันออกไปได้หลายแบบขึ้นอยู่กับการนำไปใช้ ในบางระบบอนุญาตให้ใช้แท็ก HTML ได้', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-09 09:00:00'),
(150, 'peeghost@hotmail.com', 'หน้าวิกิและการแก้ไข \r\nรูปแบบรหัสต้นฉบับบางครั้งก็รู้จักกันในชื่อ \"ข้อความวิกิ\" ซึ่งประกอบไปด้วยข้อความธรรมดารวมกับภาษามาร์กอัปอย่างง่ายซึ่งใช้ในการกำหนดโครงสร้างของเอกสารและรูปลักษณ์ในการแสดงผล ตัวอย่างที่มักพบบ่อยได้แก่ การใช้เครื่องหมายดอกจัน (\"*\") ขึ้นต้นบรรทัด เพื่อเป็นสัญลักษณ์บอกว่าบรรทัดนั้นเป็นรายการหนึ่งในรายการแบบจุดนำ รูปแบบและวากยสัมพันธ์สามารถแตกต่างกันออกไปได้หลายแบบขึ้นอยู่กับการนำไปใช้ ในบางระบบอนุญาตให้ใช้แท็ก HTML ได้', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-09 09:00:00'),
(151, 'peeghost@hotmail.com', 'หน้าวิกิและการแก้ไข \r\nรูปแบบรหัสต้นฉบับบางครั้งก็รู้จักกันในชื่อ \"ข้อความวิกิ\" ซึ่งประกอบไปด้วยข้อความธรรมดารวมกับภาษามาร์กอัปอย่างง่ายซึ่งใช้ในการกำหนดโครงสร้างของเอกสารและรูปลักษณ์ในการแสดงผล ตัวอย่างที่มักพบบ่อยได้แก่ การใช้เครื่องหมายดอกจัน (\"*\") ขึ้นต้นบรรทัด เพื่อเป็นสัญลักษณ์บอกว่าบรรทัดนั้นเป็นรายการหนึ่งในรายการแบบจุดนำ รูปแบบและวากยสัมพันธ์สามารถแตกต่างกันออกไปได้หลายแบบขึ้นอยู่กับการนำไปใช้ ในบางระบบอนุญาตให้ใช้แท็ก HTML ได้', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-09 09:00:00'),
(152, 'peeghost@hotmail.com', 'หน้าวิกิและการแก้ไข \r\nรูปแบบรหัสต้นฉบับบางครั้งก็รู้จักกันในชื่อ \"ข้อความวิกิ\" ซึ่งประกอบไปด้วยข้อความธรรมดารวมกับภาษามาร์กอัปอย่างง่ายซึ่งใช้ในการกำหนดโครงสร้างของเอกสารและรูปลักษณ์ในการแสดงผล ตัวอย่างที่มักพบบ่อยได้แก่ การใช้เครื่องหมายดอกจัน (\"*\") ขึ้นต้นบรรทัด เพื่อเป็นสัญลักษณ์บอกว่าบรรทัดนั้นเป็นรายการหนึ่งในรายการแบบจุดนำ รูปแบบและวากยสัมพันธ์สามารถแตกต่างกันออกไปได้หลายแบบขึ้นอยู่กับการนำไปใช้ ในบางระบบอนุญาตให้ใช้แท็ก HTML ได้', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-09 08:00:00'),
(153, 'peeghost@hotmail.com', '1\r\n2\r\n3\r\n4\r\n5', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-09 09:05:00'),
(154, 'peeghost@hotmail.com', 'https://th.wikipedia.org/wiki/%E0%B8%A7%E0%B8%B4%E0%B8%81%E0%B8%B4', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-09 08:05:00'),
(155, 'peeghost@hotmail.com', 'Jam Monster มีให้เลือก 6 กลิ่นแล้วน้า Peanut Butter ทั้ง 2 ตัวใครยังไม่เคยลองถือว่าพลาด ดูดดีทั้งสายผลไม้และสายขนม \r\n\r\n- Peanut Butter & Strawberry (ไม่เย็น) \r\n- Peanut Butter & Grape (ไม่เย็น) \r\n- Strawberry (ไม่เย็น) \r\n- Blueberry (ไม่เย็น) \r\n- Blackberry (ไม่เย็น) \r\n- Margerine Guava Ice ส้ม+ฝรั่ง (เย็น) \r\n\r\nขนาด 30ml Salt Nic 24 / 48mg \r\nราคา 490 บาท \r\n\r\nสั่งซื้อ-เลือกดูสินค้า : \r\nwww.cloudstudioshop.com', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-09 09:07:00'),
(156, 'peeghost@hotmail.com', 'หน้าวิกิและการแก้ไข\r\nรูปแบบรหัสต้นฉบับบางครั้งก็รู้จักกันในชื่อ \"ข้อความวิกิ\" ซึ่งประกอบไปด้วยข้อความธรรมดารวมกับภาษามาร์กอัปอย่างง่ายซึ่งใช้ในการกำหนดโครงสร้างของเอกสารและรูปลักษณ์ในการแสดงผล ตัวอย่างที่มักพบบ่อยได้แก่ การใช้เครื่องหมายดอกจัน (\"*\") ขึ้นต้นบรรทัด เพื่อเป็นสัญลักษณ์บอกว่าบรรทัดนั้นเป็นรายการหนึ่งในรายการแบบจุดนำ รูปแบบและวากยสัมพันธ์สามารถแตกต่างกันออกไปได้หลายแบบขึ้นอยู่กับการนำไปใช้ ในบางระบบอนุญาตให้ใช้แท็ก HTML ได้', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-09 09:09:00'),
(158, 'peeghost@hotmail.com', 'หน้าวิกิและการแก้ไข\r\nรูปแบบรหัสต้นฉบับบางครั้งก็รู้จักกันในชื่อ \"ข้อความวิกิ\" ซึ่งประกอบไปด้วยข้อความธรรมดารวมกับภาษามาร์กอัปอย่างง่ายซึ่งใช้ในการกำหนดโครงสร้างของเอกสารและรูปลักษณ์ในการแสดงผล ตัวอย่างที่มักพบบ่อยได้แก่ การใช้เครื่องหมายดอกจัน (\"*\") ขึ้นต้นบรรทัด เพื่อเป็นสัญลักษณ์บอกว่าบรรทัดนั้นเป็นรายการหนึ่งในรายการแบบจุดนำ รูปแบบและวากยสัมพันธ์สามารถแตกต่างกันออกไปได้หลายแบบขึ้นอยู่กับการนำไปใช้ ในบางระบบอนุญาตให้ใช้แท็ก HTML ได้', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-09 09:16:00'),
(159, 'peeghost@hotmail.com', 'Jam Monster มีให้เลือก 6 กลิ่นแล้วน้า Peanut Butter ทั้ง 2 ตัวใครยังไม่เคยลองถือว่าพลาด ดูดดีทั้งสายผลไม้และสายขนม \r\n\r\n- Peanut Butter & Strawberry (ไม่เย็น) \r\n- Peanut Butter & Grape (ไม่เย็น) \r\n- Strawberry (ไม่เย็น) \r\n- Blueberry (ไม่เย็น) \r\n- Blackberry (ไม่เย็น) \r\n- Margerine Guava Ice ส้ม+ฝรั่ง (เย็น) \r\n\r\nขนาด 30ml Salt Nic 24 / 48mg \r\nราคา 490 บาท \r\n\r\nสั่งซื้อ-เลือกดูสินค้า : \r\nwww.cloudstudioshop.com', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-09 08:00:00'),
(160, 'peeghost@hotmail.com', 'หน้าวิกิและการแก้ไข \r\nรูปแบบรหัสต้นฉบับบางครั้งก็รู้จักกันในชื่อ \"ข้อความวิกิ\" ซึ่งประกอบไปด้วยข้อความธรรมดารวมกับภาษามาร์กอัปอย่างง่ายซึ่งใช้ในการกำหนดโครงสร้างของเอกสารและรูปลักษณ์ในการแสดงผล ตัวอย่างที่มักพบบ่อยได้แก่ การใช้เครื่องหมายดอกจัน (\"*\") ขึ้นต้นบรรทัด เพื่อเป็นสัญลักษณ์บอกว่าบรรทัดนั้นเป็นรายการหนึ่งในรายการแบบจุดนำ รูปแบบและวากยสัมพันธ์สามารถแตกต่างกันออกไปได้หลายแบบขึ้นอยู่กับการนำไปใช้ ในบางระบบอนุญาตให้ใช้แท็ก HTML ได้', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-08 23:00:00'),
(161, 'peeghost@hotmail.com', 'หน้าวิกิและการแก้ไข \r\nรูปแบบรหัสต้นฉบับบางครั้งก็รู้จักกันในชื่อ \"ข้อความวิกิ\" ซึ่งประกอบไปด้วยข้อความธรรมดารวมกับภาษามาร์กอัปอย่างง่ายซึ่งใช้ในการกำหนดโครงสร้างของเอกสารและรูปลักษณ์ในการแสดงผล ตัวอย่างที่มักพบบ่อยได้แก่ การใช้เครื่องหมายดอกจัน (\"*\") ขึ้นต้นบรรทัด เพื่อเป็นสัญลักษณ์บอกว่าบรรทัดนั้นเป็นรายการหนึ่งในรายการแบบจุดนำ รูปแบบและวากยสัมพันธ์สามารถแตกต่างกันออกไปได้หลายแบบขึ้นอยู่กับการนำไปใช้ ในบางระบบอนุญาตให้ใช้แท็ก HTML ได้', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-08 17:14:00'),
(162, 'peeghost@hotmail.com', 'หน้าวิกิและการแก้ไข \r\nรูปแบบรหัสต้นฉบับบางครั้งก็รู้จักกันในชื่อ \"ข้อความวิกิ\" ซึ่งประกอบไปด้วยข้อความธรรมดารวมกับภาษามาร์กอัปอย่างง่ายซึ่งใช้ในการกำหนดโครงสร้างของเอกสารและรูปลักษณ์ในการแสดงผล ตัวอย่างที่มักพบบ่อยได้แก่ การใช้เครื่องหมายดอกจัน (\"*\") ขึ้นต้นบรรทัด เพื่อเป็นสัญลักษณ์บอกว่าบรรทัดนั้นเป็นรายการหนึ่งในรายการแบบจุดนำ รูปแบบและวากยสัมพันธ์สามารถแตกต่างกันออกไปได้หลายแบบขึ้นอยู่กับการนำไปใช้ ในบางระบบอนุญาตให้ใช้แท็ก HTML ได้', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-08 17:41:00'),
(163, 'peeghost@hotmail.com', 'หน้าวิกิและการแก้ไข \r\nรูปแบบรหัสต้นฉบับบางครั้งก็รู้จักกันในชื่อ \"ข้อความวิกิ\" ซึ่งประกอบไปด้วยข้อความธรรมดารวมกับภาษามาร์กอัปอย่างง่ายซึ่งใช้ในการกำหนดโครงสร้างของเอกสารและรูปลักษณ์ในการแสดงผล ตัวอย่างที่มักพบบ่อยได้แก่ การใช้เครื่องหมายดอกจัน (\"*\") ขึ้นต้นบรรทัด เพื่อเป็นสัญลักษณ์บอกว่าบรรทัดนั้นเป็นรายการหนึ่งในรายการแบบจุดนำ รูปแบบและวากยสัมพันธ์สามารถแตกต่างกันออกไปได้หลายแบบขึ้นอยู่กับการนำไปใช้ ในบางระบบอนุญาตให้ใช้แท็ก HTML ได้', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-08 21:23:00'),
(164, 'peeghost@hotmail.com', 'I\'m interesting. แปลว่า ฉันน่าสนใจ\r\naawadwad\r\nI\'m interested. แปลว่า ฉันรู้สึกสนใจ\r\n\r\nเราก็เลยไปค้นคว้าตำราเพิ่มเติม ก็ได้ความมาว่า\r\nมันเป็นการใช้คำ Adjectives ที่ลงท้ายด้วย -ed และ -ing\r\n\r\n-ed ส่วนใหญ่ใช้อธิบายความรู้สึกของเรา ส่วน\r\n-ing ใช้กับการอธิบายสถานการณ์ที่เกิดขึ้น สิ่งที่เป็นอยู่ ลักษณะของสิ่งๆหนึ่ง\r\nตัวอย่างเช่น\r\n\r\n# Jane is bored because her job is boring.\r\nเจนรู้สึกเบื่อ เพราะงานของเธอน่าเบื่อ\r\n\r\nถ้าคนๆหนึ่งน่าเบื่อ (boring) หมายความว่า เขาทำให้คนอื่น (รู้สึก) เบื่อ (bored)\r\n# George always talks about the same things. He\'s really boring. \r\nจอร์จมักจะพูดเรื่องเดิมเสมอๆ เขาน่าเบื่อจริงๆ\r\n****************\r\n-Cosmopolitan = many people come from different countries\r\n-Separate = split\r\n-Occupation = job\r\nPersonality = inside ( agility, intelligence)\r\nAppearance = outside ( smart,good looking )\r\n*********\r\nCan I ask you some questions?\r\nTest the font\r\nHow did you get there?\r\nDo I know you \r\nHow long have you lived in your house?\r\nHow did you go to New York\r\nHow long do you take the bus\r\n***Verb to be + No verb***\r\n***Verb to do + verb***\r\n++++++++++\r\nCosmopolitan = many people come from    different countries\r\n\r\nOpposite of busy are idle, unbusy and quiet\r\n\r\nContinent = bigger then country\r\n*********', '2019-06-29 19:52:17', 'text', 'timmer', 0, 'all friends', '', '2019-06-08 20:00:00'),
(165, 'peeghost@hotmail.com', 'I\'m interesting. แปลว่า ฉันน่าสนใจ\r\nI\'m interested. แปลว่า ฉันรู้สึกสนใจ\r\n\r\nเราก็เลยไปค้นคว้าตำราเพิ่มเติม ก็ได้ความมาว่า\r\nมันเป็นการใช้คำ Adjectives ที่ลงท้ายด้วย -ed และ -ing\r\n\r\n-ed ส่วนใหญ่ใช้อธิบายความรู้สึกของเรา ส่วน\r\n-ing ใช้กับการอธิบายสถานการณ์ที่เกิดขึ้น สิ่งที่เป็นอยู่ ลักษณะของสิ่งๆหนึ่ง\r\nตัวอย่างเช่น\r\n\r\n# Jane is bored because her job is boring.\r\nเจนรู้สึกเบื่อ เพราะงานของเธอน่าเบื่อ\r\n\r\nถ้าคนๆหนึ่งน่าเบื่อ (boring) หมายความว่า เขาทำให้คนอื่น (รู้สึก) เบื่อ (bored)\r\n# George always talks about the same things. He\'s really boring. \r\nจอร์จมักจะพูดเรื่องเดิมเสมอๆ เขาน่าเบื่อจริงๆ\r\n****************\r\n-Cosmopolitan = many people come from different countries\r\n-Separate = split\r\n-Occupation = job\r\nPersonality = inside ( agility, intelligence)\r\nAppearance = outside ( smart,good looking )\r\n*********\r\nCan I ask you some questions?\r\nTest the font\r\nHow did you get there?\r\nDo I know you \r\nHow long have you lived in your house?\r\nHow did you go to New York\r\nHow long do you take the bus\r\n***Verb to be + No verb***\r\n***Verb to do + verb***\r\n++++++++++\r\nCosmopolitan = many people come from    different countries\r\n\r\nOpposite of busy are idle, unbusy and quiet\r\n\r\nContinent = bigger then country\r\n*********', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-08 17:04:00'),
(166, 'peeghost@hotmail.com', 'I\'m interesting. แปลว่า ฉันน่าสนใจ I\'m interested. แปลว่า ฉันรู้สึกสนใจ เราก็เลยไปค้นคว้าตำราเพิ่มเติม ก็ได้ความมาว่า มันเป็นการใช้คำ Adjectives ที่ลงท้ายด้วย -ed และ -ing -ed ส่วนใหญ่ใช้อธิบายความรู้สึกของเรา ส่วน -ing ใช้กับการอธิบายสถานการณ์ที่เกิดขึ้น สิ่งที่เป็นอยู่ ลักษณะของสิ่งๆหนึ่ง ตัวอย่างเช่น # Jane is bored because her job is boring. เจนรู้สึกเบื่อ เพราะงานของเธอน่าเบื่อ ถ้าคนๆหนึ่งน่าเบื่อ (boring) หมายความว่า เขาทำให้คนอื่น (รู้สึก) เบื่อ (bored) # George always talks about the same things. He\'s really boring. จอร์จมักจะพูดเรื่องเดิมเสมอๆ เขาน่าเบื่อจริงๆ **************** -Cosmopolitan = many people come from different countries -Separate = split -Occupation = job Personality = inside ( agility, intelligence) Appearance = outside ( smart,good looking ) ********* Can I ask you some questions? Test the font How did you get there? Do I know you How long have you lived in your house? How did you go to New York How long do you take the bus ***Verb to be + No verb*** ***Verb to do + verb*** ++++++++++ Cosmopolitan = many people come from different countries Opposite of busy are idle, unbusy and quiet Continent = bigger then country *********', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-08 17:04:00'),
(167, 'peeghost@hotmail.com', 'ลักษณะสำคัญ\r\nวิกิเน้นการทำงานแบบง่าย ซึ่งผู้เขียนสามารถสร้างเนื้อหาบนเว็บได้โดยไม่จำเป็นต้องมีความรู้ในภาษาเอชทีเอ็มแอล โดยข้อมูลถูกเขียนร่วมกันด้วยภาษามาร์กอัปอย่างง่ายโดยผ่านเว็บเบราว์เซอร์ ในแต่ละหน้าจะถูกเรียกว่า \"หน้าวิกิ\" และเนื้อหาภายในจะเชื่อมต่อกันผ่านทางไฮเปอร์ลิงก์ ซึ่งส่งผลให้ในแต่ละวิกิสามารถทำงานผ่านระบบที่เรียบ ง่ายและสามารถใช้เป็นฐานข้อมูล สำหรับสืบค้น ดูแลรักษาที่ง่าย\r\n\r\nนิยามลักษณะของเทคโนโลยีวิกิคือความง่ายในการสร้างและแก้ไขหน้าเว็บ โดยไม่จำเป็นต้องผ่านการตรวจสอบหรือยืนยันจากเจ้าของเว็บนั้น เว็บวิกิหลายแห่งเปิดให้ผู้ใช้บริการทั่วไปในขณะที่บางกรณี ขึ้นอยู่กับการตั้งค่าวิกิบนเซิร์ฟเวอร์ ผู้ใช้อาจจะต้องล็อกอินเพื่อแก้ไข หรือเพื่ออ่านบางหน้า\r\n\r\nหน้าวิกิและการแก้ไข\r\nรูปแบบรหัสต้นฉบับบางครั้งก็รู้จักกันในชื่อ \"ข้อความวิกิ\" ซึ่งประกอบไปด้วยข้อความธรรมดารวมกับภาษามาร์กอัปอย่างง่ายซึ่งใช้ในการกำหนดโครงสร้างของเอกสารและรูปลักษณ์ในการแสดงผล ตัวอย่างที่มักพบบ่อยได้แก่ การใช้เครื่องหมายดอกจัน (\"*\") ขึ้นต้นบรรทัด เพื่อเป็นสัญลักษณ์บอกว่าบรรทัดนั้นเป็นรายการหนึ่งในรายการแบบจุดนำ รูปแบบและวากยสัมพันธ์สามารถแตกต่างกันออกไปได้หลายแบบขึ้นอยู่กับการนำไปใช้ ในบางระบบอนุญาตให้ใช้แท็ก HTML ได้\r\n\r\nการออกแบบข้อความวิกิมีเหตุผลมากจาก HTML ซึ่งแท็กหลายแท็กมีความคลุมเครือ ทำให้จากรหัสต้นฉบับ HTML ผู้ใช้สร้างจินตนาภาพถึงผลลัพธ์ได้ยาก สำหรับผู้ใช้ส่วนมากการอ่านและการแก้ไขเนื้อหาบนรหัสต้นฉบับ HTML โดยตรงเป็นสิ่งที่ทำได้ยากมาก ดังนั้นการส่งเสริมให้แก้ไขบนข้อความธรรมดากับข้อตกลงอีกนิดหน่อยเพื่อการกำหนดโครงสร้างและรูปแบบจึงเป็นสิ่งที่ดีกว่า\r\n\r\nนอกจากนั้นการที่ผู้ใช้ไม่สามารถใช้ความสามารถบางอย่างของภาษา HTML เช่น จาวาสคริปต์ และ Cascading Style Sheet ได้โดยตรง ทำให้ได้ประโยชน์คือรูปลักษณ์และความรู้สึก (Look and Feel) ในการใช้งานวิกิมีความสอดคล้องกัน เนื่องจากผู้ใช้แก้ไขรูปแบบได้อย่างจำกัด พร้อมทั้งความปลอดภัยที่เพิ่มขึ้น ในการนำวิกิไปใช้หลายระบบแสดงให้เห็นไฮเปอร์ลิงก์ที่ใช้งานได้เสมอ ไม่เหมือนในการใช้ HTML ซึ่งข้อความที่ไม่สามารถมองเห็นจากการแสดงผลว่าเป็นไฮเปอร์ลิงก์ก็อาจจะเป็นไฮเปอร์ลิงก์ได้', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-08 19:01:00'),
(168, 'peeghost@hotmail.com', '6 pm', '2019-06-29 17:05:10', 'text', 'timmer', 0, 'all friends', '', '2019-06-09 11:00:00'),
(171, 'peeghost@hotmail.com', 'awhdjhdjkawd\r\n124', '2019-07-01 06:21:12', 'text', 'timmer', 1, 'all friends', '', '2019-07-01 06:21:12'),
(172, 'peeghost@hotmail.com', '1\r\n2\r\n3', '2019-07-01 06:21:58', 'text', 'timmer', 1, 'all friends', '', '2019-07-01 06:21:58'),
(173, 'peeghost@hotmail.com', '15633769907063.png', '2019-07-17 15:23:10', 'image', 'timmer', 1, 'all friends', '', '2019-07-01 06:28:18'),
(184, 'peeghost@hotmail.com', '123', '2019-07-02 07:17:23', 'text', 'timmer', 0, 'all friends', '', '2019-07-02 07:17:23'),
(186, 'peeghost@hotmail.com', 'ชิบกับเดล', '2019-07-02 07:18:12', 'text', 'timmer', 0, 'all friends', '', '2019-07-02 07:18:12'),
(190, 'peeghost@hotmail.com', 'My lover\'s got humor\r\nShe\'s the giggle at a funeral\r\nKnows everybody\'s disapproval\r\nI should\'ve worshiped her sooner\r\nIf the Heavens ever did speak\r\nShe is the last true mouthpiece\r\nEvery Sunday\'s getting more bleak\r\nA fresh poison each week\r\n\"We were born sick\", you heard them say it\r\nMy church offers no absolutes\r\nShe tells me \'worship in the bedroom\'\r\nThe only heaven I\'ll be sent to\r\nIs when I\'m alone with you\r\nI was born sick, but I love it\r\nCommand me to be well\r\nAmen, Amen, Amen\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nIf I\'m a pagan of the good times\r\nMy lover\'s the sunlight\r\nTo keep the Goddess on my side\r\nShe demands a sacrifice\r\nTo drain the whole sea\r\nGet something shiny\r\nSomething meaty for the main course\r\nThat\'s a fine looking high horse\r\nWhat you got in the stable?\r\nWe\'ve a lot of starving faithful\r\nThat looks tasty\r\nThat looks plenty\r\nThis is hungry work\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nNo masters or kings when the ritual begins\r\nThere is no sweeter innocence than our gentle sin\r\nIn the madness and soil of that sad earthly scene\r\nOnly then I am human\r\nOnly then I am clean\r\nAmen, Amen, Amen\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nSource: LyricFind', '2019-07-15 02:46:29', 'text', 'error', 0, 'all friends', '', '2019-07-14 22:01:14'),
(191, 'ex@ex.com', '1\r\n2\r\n3', '2019-07-06 09:07:51', 'text', 'timmer', 0, 'all friends', '', '2019-07-06 09:02:18'),
(192, 'ex@ex.com', '15624334773914.png', '2019-07-06 17:17:57', 'image', 'timmer', 0, 'all friends', '', '2019-07-06 09:05:29'),
(193, 'ex@ex.com', 'dwad', '2019-07-06 10:14:08', 'text', 'timmer', 0, 'all friends', '', '2019-07-06 10:14:08'),
(195, 'ex@ex.com', 'test sendnow', '2019-07-06 10:50:35', 'text', 'timmer', 0, 'all friends', '', '2019-07-06 10:50:35'),
(196, 'ex@ex.com', 'test sendnow2', '2019-07-06 10:50:54', 'text', 'timmer', 0, 'all friends', '', '2019-07-06 10:50:54'),
(199, 'ex@ex.com', 'test timmer', '2019-07-06 11:00:20', 'text', 'timmer', 0, 'all friends', '', '2019-07-31 12:11:00'),
(200, 'ex@ex.com', '1', '2019-07-06 17:22:12', 'text', 'timmer', 0, 'all friends', '', '2019-07-06 17:22:12'),
(201, 'ex@ex.com', '2', '2019-07-06 17:22:23', 'text', 'timmer', 0, 'all friends', '', '0000-00-00 00:00:00'),
(202, 'ex@ex.com', '15624337632391.jpeg', '2019-07-06 17:22:43', 'image', 'timmer', 0, 'all friends', '', '0000-00-00 00:00:00'),
(203, 'ex@ex.com', 'xx', '2019-07-06 17:23:57', 'text', 'timmer', 0, 'all friends', '', '0000-00-00 00:00:00'),
(204, 'ex@ex.com', '19', '2019-07-06 17:24:43', 'text', 'timmer', 0, 'all friends', '', '2019-07-18 21:04:00'),
(205, 'ex@ex.com', 'daw', '2019-07-06 17:27:30', 'text', 'timmer', 0, 'all friends', '', '0000-00-00 00:00:00'),
(207, 'ex@ex.com', 'd', '2019-07-13 19:58:38', 'text', 'sent', 0, 'all friends', '', '2019-07-06 17:47:45'),
(209, 'ex@ex.com', 'a', '2019-07-06 17:52:18', 'text', 'timmer', 0, 'all friends', '', '2019-07-27 21:01:00'),
(210, 'peeghost@hotmail.com', 'yellow', '2019-07-10 16:17:42', 'text', 'timmer', 0, 'all friends', '', '2019-09-26 11:25:00'),
(211, '', 'yellow', '2019-07-13 19:35:00', 'text', 'timmer', 0, 'all friends', '', '2019-09-26 11:25:00'),
(212, '', 'yellow', '2019-07-13 19:35:05', 'text', 'timmer', 0, 'all friends', '', '2019-09-26 11:25:00'),
(213, '', 'yellow', '2019-07-13 19:36:25', 'text', 'timmer', 0, 'all friends', '', '2019-09-26 11:25:00'),
(214, 'peeghost@hotmail.com', 'yellow', '2019-07-15 02:43:48', 'text', 'sent', 0, 'all friends', '', '2019-07-14 22:25:00'),
(215, 'peeghost@hotmail.com', '15630467318441.jpg', '2019-07-15 02:30:43', 'image', 'error', 0, 'all friends', '', '2019-06-06 19:14:00'),
(216, 'peeghost@hotmail.com', '15630467318441.jpg', '2019-07-15 02:30:42', 'image', 'error', 0, 'all friends', '', '2019-06-06 19:14:00'),
(217, 'peeghost@hotmail.com', 'My lover\'s got humor\r\nShe\'s the giggle at a funeral\r\nKnows everybody\'s disapproval\r\nI should\'ve worshiped her sooner\r\nIf the Heavens ever did speak\r\nShe is the last true mouthpiece\r\nEvery Sunday\'s getting more bleak\r\nA fresh poison each week\r\n\"We were born sick\", you heard them say it\r\nMy church offers no absolutes\r\nShe tells me \'worship in the bedroom\'\r\nThe only heaven I\'ll be sent to\r\nIs when I\'m alone with you\r\nI was born sick, but I love it\r\nCommand me to be well\r\nAmen, Amen, Amen\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nIf I\'m a pagan of the good times\r\nMy lover\'s the sunlight\r\nTo keep the Goddess on my side\r\nShe demands a sacrifice\r\nTo drain the whole sea\r\nGet something shiny\r\nSomething meaty for the main course\r\nThat\'s a fine looking high horse\r\nWhat you got in the stable?\r\nWe\'ve a lot of starving faithful\r\nThat looks tasty\r\nThat looks plenty\r\nThis is hungry work\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nNo masters or kings when the ritual begins\r\nThere is no sweeter innocence than our gentle sin\r\nIn the madness and soil of that sad earthly scene\r\nOnly then I am human\r\nOnly then I am clean\r\nAmen, Amen, Amen\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nSource: LyricFind', '2019-07-15 02:50:25', 'text', 'error', 0, 'all friends', '', '2019-07-14 22:30:00'),
(218, 'peeghost@hotmail.com', 'My lover\'s got humor\r\nShe\'s the giggle at a funeral\r\nKnows everybody\'s disapproval\r\nI should\'ve worshiped her sooner\r\nIf the Heavens ever did speak\r\nShe is the last true mouthpiece\r\nEvery Sunday\'s getting more bleak\r\nA fresh poison each week\r\n\"We were born sick\", you heard them say it\r\nMy church offers no absolutes\r\nShe tells me \'worship in the bedroom\'\r\nThe only heaven I\'ll be sent to\r\nIs when I\'m alone with you\r\nI was born sick, but I love it\r\nCommand me to be well\r\nAmen, Amen, Amen\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nIf I\'m a pagan of the good times\r\nMy lover\'s the sunlight\r\nTo keep the Goddess on my side\r\nShe demands a sacrifice\r\nTo drain the whole sea\r\nGet something shiny\r\nSomething meaty for the main course\r\nThat\'s a fine looking high horse\r\nWhat you got in the stable?\r\nWe\'ve a lot of starving faithful\r\nThat looks tasty\r\nThat looks plenty\r\nThis is hungry work\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nNo masters or kings when the ritual begins\r\nThere is no sweeter innocence than our gentle sin\r\nIn the madness and soil of that sad earthly scene\r\nOnly then I am human\r\nOnly then I am clean\r\nAmen, Amen, Amen\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nSource: LyricFind', '2019-07-15 02:52:18', 'text', 'error', 0, 'all friends', '', '2019-07-14 22:51:00'),
(219, 'peeghost@hotmail.com', 'My lover\'s got humor\r\nShe\'s the giggle at a funeral\r\nKnows everybody\'s disapproval\r\nI should\'ve worshiped her sooner\r\nIf the Heavens ever did speak\r\nShe is the last true mouthpiece\r\nEvery Sunday\'s getting more bleak\r\nA fresh poison each week\r\n\"We were born sick\", you heard them say it\r\nMy church offers no absolutes\r\nShe tells me \'worship in the bedroom\'\r\nThe only heaven I\'ll be sent to\r\nIs when I\'m alone with you\r\nI was born sick, but I love it\r\nCommand me to be well\r\nAmen, Amen, Amen\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nIf I\'m a pagan of the good times\r\nMy lover\'s the sunlight\r\nTo keep the Goddess on my side\r\nShe demands a sacrifice\r\nTo drain the whole sea\r\nGet something shiny\r\nSomething meaty for the main course\r\nThat\'s a fine looking high horse\r\nWhat you got in the stable?\r\nWe\'ve a lot of starving faithful\r\nThat looks tasty\r\nThat looks plenty\r\nThis is hungry work\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nNo masters or kings when the ritual begins\r\nThere is no sweeter innocence than our gentle sin\r\nIn the madness and soil of that sad earthly scene\r\nOnly then I am human\r\nOnly then I am clean\r\nAmen, Amen, Amen\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nSource: LyricFind', '2019-07-15 02:52:57', 'text', 'error', 0, 'all friends', '', '2019-07-15 02:52:50'),
(220, 'peeghost@hotmail.com', 'print(data)', '2019-07-15 02:53:50', 'text', 'sent', 0, 'all friends', '', '2019-07-15 02:53:42'),
(221, 'peeghost@hotmail.com', 'I\'m interesting. แปลว่า ฉันน่าสนใจ\r\naawadwad\r\nI\'m interested. แปลว่า ฉันรู้สึกสนใจ\r\n\r\nเราก็เลยไปค้นคว้าตำราเพิ่มเติม ก็ได้ความมาว่า\r\nมันเป็นการใช้คำ Adjectives ที่ลงท้ายด้วย -ed และ -ing\r\n\r\n-ed ส่วนใหญ่ใช้อธิบายความรู้สึกของเรา ส่วน\r\n-ing ใช้กับการอธิบายสถานการณ์ที่เกิดขึ้น สิ่งที่เป็นอยู่ ลักษณะของสิ่งๆหนึ่ง\r\nตัวอย่างเช่น\r\n\r\n# Jane is bored because her job is boring.\r\nเจนรู้สึกเบื่อ เพราะงานของเธอน่าเบื่อ\r\n\r\nถ้าคนๆหนึ่งน่าเบื่อ (boring) หมายความว่า เขาทำให้คนอื่น (รู้สึก) เบื่อ (bored)\r\n# George always talks about the same things. He\'s really boring. \r\nจอร์จมักจะพูดเรื่องเดิมเสมอๆ เขาน่าเบื่อจริงๆ\r\n****************\r\n-Cosmopolitan = many people come from different countries\r\n-Separate = split\r\n-Occupation = job\r\nPersonality = inside ( agility, intelligence)\r\nAppearance = outside ( smart,good looking )\r\n*********\r\nCan I ask you some questions?\r\nTest the font\r\nHow did you get there?\r\nDo I know you \r\nHow long have you lived in your house?\r\nHow did you go to New York\r\nHow long do you take the bus\r\n***Verb to be + No verb***\r\n***Verb to do + verb***\r\n++++++++++\r\nCosmopolitan = many people come from    different countries\r\n\r\nOpposite of busy are idle, unbusy and quiet\r\n\r\nContinent = bigger then country\r\n*********', '2019-07-15 02:55:52', 'text', 'sent', 0, 'all friends', '', '2019-07-15 02:55:46'),
(222, 'peeghost@hotmail.com', 'My lover\'s got humor\r\nShe\'s the giggle at a funeral\r\nKnows everybody\'s disapproval\r\nI should\'ve worshiped her sooner\r\nIf the Heavens ever did speak\r\nShe is the last true mouthpiece\r\nEvery Sunday\'s getting more bleak\r\nA fresh poison each week\r\n\"We were born sick\", you heard them say it\r\nMy church offers no absolutes\r\nShe tells me \'worship in the bedroom\'\r\nThe only heaven I\'ll be sent to\r\nIs when I\'m alone with you\r\nI was born sick, but I love it\r\nCommand me to be well\r\nAmen, Amen, Amen\r\nTake me to church\r\nI\'ll worship like a dog at the shrine of your lies\r\nI\'ll tell you my sins and you can sharpen your knife\r\nOffer me that deathless death\r\nGood God, let me give you my life\r\nTake me to church\r\nGood God, let me give you my life\r\nSource: LyricFind', '2019-07-15 02:56:32', 'text', 'sent', 0, 'all friends', '', '2019-07-15 02:56:27'),
(223, 'peeghost@hotmail.com', 'hi\r\ntest\r\nhello world', '2019-07-15 05:48:29', 'text', 'sent', 0, 'all friends', '', '2019-07-15 05:47:52'),
(224, 'peeghost@hotmail.com', 'Gvyby', '2019-07-17 15:14:28', 'text', 'timmer', 0, 'all friends', '', '2019-07-17 15:14:28'),
(225, 'peeghost@hotmail.com', 'daw', '2019-07-18 14:17:55', 'text', 'timmer', 0, 'all friends', '', '2019-07-18 14:16:00'),
(226, 'peeghost@hotmail.com', 'a', '2019-07-18 14:22:10', 'text', 'timmer', 0, 'all friends', '', '2019-07-18 14:22:10'),
(227, 'peeghost@hotmail.com', 'a', '2019-07-18 14:22:21', 'text', 'timmer', 0, 'all friends', '', '2019-07-18 14:22:00'),
(228, 'peeghost@hotmail.com', '15634600568244.jpg', '2019-07-18 14:27:36', 'image', 'timmer', 0, 'all friends', '', '2019-07-18 14:27:36'),
(231, 'peeghost@hotmail.com', 'awd', '2019-07-18 14:36:23', 'text', 'timmer', 0, 'all friends', '', '2019-07-18 14:36:23'),
(232, 'peeghost@hotmail.com', '1563460624961.jpg', '2019-07-18 14:37:04', 'image', 'timmer', 0, 'all friends', '', '2019-07-18 14:37:04'),
(233, 'peeghost@hotmail.com', '15634606619397.jpeg', '2019-07-18 14:37:41', 'image', 'timmer', 0, 'all friends', '', '2019-07-18 14:37:00'),
(234, 'peeghost@hotmail.com', '15634606802751.jpg', '2019-07-18 14:38:00', 'image', 'timmer', 0, 'all friends', '', '2019-07-18 02:01:00'),
(238, 'peeghost@hotmail.com', '15635232107224.jpeg', '2019-07-19 08:00:10', 'image', 'timmer', 0, 'all friends', '', '2019-07-19 08:00:00'),
(239, 'peeghost@hotmail.com', '1564817018599.jpg', '2019-08-03 07:23:38', 'image', 'timmer', 0, 'all friends', '', '2019-08-03 07:23:38'),
(240, 'peeghost@hotmail.com', '15648170500292.jpg', '2019-08-03 07:24:10', 'image', 'timmer', 0, 'all friends', '', '2019-08-17 07:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `type` enum('user','admin','','') NOT NULL,
  `pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `email`, `password`, `fname`, `lname`, `status`, `type`, `pic`) VALUES
(1, 'ex@ex.com', '1234', 'thitiwas', 'nupan', 1, 'user', 'https://profile.line-scdn.net/0hFVmNQN-UGXlQNzMgfUlmLmxyFxQnGR8xKAIBGHxlRxsvAwt9ZAVTSiFiE0wpVVx6agJRGCZiE05-'),
(2, 'exx@gmail.com', '1234', '1234', 'eee1234', 1, 'user', ''),
(3, 'admin@admin.com', '1234', 'thitiwas', 'nupan', 1, 'admin', ''),
(4, 'peeghost@hotmail.com', '1234', 'thitiwas', 'nupan', 1, 'user', ''),
(5, 'aaa@aaa.com', '1234', 'ฐิติวัสส์', 'หนูปาน', 0, 'user', ''),
(6, 'ad@ad.com', '1234', '12414', '141242414adcadc', 1, 'user', ''),
(7, 'rrr@rr.com', '1234', 'a2eqe2', 'qcq2ecqc2', 1, 'user', ''),
(8, 'test@tt.com', '1234', 'thitiwas', 'nupan', 0, 'user', ''),
(9, 'mookmiq@hotmail.com', '1234', '', '', 1, 'user', ''),
(10, 'twopee261@gmail.com', '1234', 'ฐิติวัสส์', 'หนูปาน', 0, 'user', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`lineid`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `linelogin`
--
ALTER TABLE `linelogin`
  ADD PRIMARY KEY (`lineloginid`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`login`),
  ADD KEY `userid` (`userid`) USING BTREE;

--
-- Indexes for table `massage`
--
ALTER TABLE `massage`
  ADD PRIMARY KEY (`massageid`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `line`
--
ALTER TABLE `line`
  MODIFY `lineid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `linelogin`
--
ALTER TABLE `linelogin`
  MODIFY `lineloginid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `massage`
--
ALTER TABLE `massage`
  MODIFY `massageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
