-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 17, 2021 at 09:24 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tussle`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `accountID` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `country` varchar(45) DEFAULT NULL,
  `creationDate` datetime DEFAULT NULL,
  `bOD` date DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `ban` datetime DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `image` longblob DEFAULT NULL,
  `f_name` varchar(45) DEFAULT NULL,
  `l_name` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `about` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`accountID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountID`, `type`, `email`, `password`, `country`, `creationDate`, `bOD`, `gender`, `ban`, `username`, `image`, `f_name`, `l_name`, `city`, `about`) VALUES
(1, 0, 'admin@admin.com', 'admin', 'beirut', '1998-01-01 00:00:00', '1998-01-01', 'male', NULL, 'hosam', 0x6466646466, 'chadi', 'Jad', 'beirut', 'its'),
(2, 1, 'ms@admin.com', 'admin', 'Lebanon', NULL, '1998-01-01', 'male', NULL, 'MSSS', 0x696d616765732f313631333431313031312e6a7067, 'Mohammad', 'Sonji', 'beirut', 'submit'),
(3, 1, 'mohammadsonji360@gmail.com', 'admin123', 'Lebanon', NULL, '1998-01-01', 'male', NULL, 'staff@admin.com', NULL, 'mohammad', 'sonji', 'beirut', 'asdf'),
(15, 0, 'new@new', 'new', 'Lebanon', NULL, '0001-01-01', 'male', NULL, 'neq', NULL, 'new', 'new', 'new', NULL),
(16, 1, 'new2@new', 'new', 'Lebanon', NULL, '0001-01-01', 'male', NULL, 'new', NULL, 'new', 'new', 'new', NULL),
(17, 0, 'new3@new', 'new', 'new', NULL, '0001-01-01', 'male', '0001-01-01 00:00:00', 'new', NULL, 'new', 'new', 'new', 'new'),
(18, 0, 'new4@new', 'new4', 'new4', NULL, '0001-01-01', 'male', '0001-01-01 00:00:00', 'newfour', NULL, 'newfour', 'newfour', 'new4', 'new4');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `accountID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `answerValue` varchar(100) NOT NULL,
  PRIMARY KEY (`accountID`,`questionID`),
  KEY `questionID_idx` (`questionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`accountID`, `questionID`, `answerValue`) VALUES
(1, 1, 'yes'),
(1, 2, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

DROP TABLE IF EXISTS `conversations`;
CREATE TABLE IF NOT EXISTS `conversations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `message`, `user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 'hi', 2, 1, '2021-02-26 09:21:19', '2021-02-26 09:21:19'),
(2, ';nnlk', 1, 1, '2021-02-26 09:21:36', '2021-02-26 09:21:36'),
(3, 'hi', 2, 1, '2021-02-26 09:29:56', '2021-02-26 09:29:56'),
(4, 'xzbjxbb', 2, 1, '2021-02-26 11:42:19', '2021-02-26 11:42:19'),
(5, 'hellows', 3, 2, '2021-02-26 11:54:51', '2021-02-26 11:54:51'),
(6, 'hellllllooooooooooo', 1, 1, '2021-02-26 11:56:45', '2021-02-26 11:56:45'),
(7, 'hi', 3, 2, '2021-02-26 11:57:14', '2021-02-26 11:57:14'),
(8, 'hello all', 1, 2, '2021-02-26 11:58:27', '2021-02-26 11:58:27'),
(9, 'hw r u', 3, 2, '2021-02-26 11:58:36', '2021-02-26 11:58:36'),
(10, '?', 3, 2, '2021-02-26 11:58:37', '2021-02-26 11:58:37'),
(11, 'x', 1, 78, '2021-02-26 12:14:44', '2021-02-26 12:14:44'),
(12, 'y', 3, 78, '2021-02-26 12:14:50', '2021-02-26 12:14:50'),
(13, 'zz', 1, 78, '2021-02-26 12:14:56', '2021-02-26 12:14:56'),
(14, 'hi', 1, 80, '2021-02-26 13:22:44', '2021-02-26 13:22:44'),
(15, 'wanna chat', 3, 80, '2021-02-26 13:23:19', '2021-02-26 13:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  `accountID` int(11) NOT NULL,
  `time` datetime DEFAULT NULL,
  `place` varchar(45) DEFAULT NULL,
  `duration` datetime DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  PRIMARY KEY (`eventID`),
  KEY `accoutID_idx` (`accountID`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `accountID`, `time`, `place`, `duration`, `description`, `location`, `title`) VALUES
(5, 1, '2022-12-12 15:30:00', 'online', NULL, 'dota tournament', NULL, 'dota'),
(6, 1, '2022-12-12 15:30:00', 'online', NULL, 'dota tournament', NULL, 'dota'),
(7, 1, '2022-12-12 15:30:00', 'online', NULL, 'dota tournament', NULL, 'dota'),
(8, 1, '2022-12-12 15:30:00', 'online', NULL, 'dota tournament', NULL, 'dota'),
(9, 1, '2022-12-12 15:30:00', 'online', NULL, 'dota tournament', NULL, 'dota'),
(10, 1, '2022-12-12 15:30:00', 'online', NULL, 'dota tournament', NULL, 'dota'),
(11, 1, '2022-12-12 15:30:00', 'online', NULL, 'dota tournament', NULL, 'dota'),
(12, 1, '2022-12-12 15:30:00', 'online', NULL, 'dota tournament', NULL, 'dota'),
(13, 1, '2022-12-12 15:30:00', 'online', NULL, 'dota tournament', NULL, 'dota'),
(14, 1, '2022-12-12 15:30:00', 'online', NULL, 'dota tournament', NULL, 'dota'),
(15, 1, '2022-12-12 15:30:00', 'online', NULL, 'dota tournament', NULL, 'dota'),
(16, 1, '2021-12-12 13:13:00', 'online', NULL, 'lol event', NULL, 'lol'),
(17, 1, '2021-12-12 14:15:00', 'online', NULL, 'match', NULL, 'pubg'),
(18, 1, '2021-12-12 14:15:00', 'online', NULL, 'match', NULL, 'pubg'),
(19, 1, '2021-12-12 14:15:00', 'online', NULL, 'match', NULL, 'pubg'),
(20, 1, '2021-12-12 14:15:00', 'online', NULL, 'match', NULL, 'pubg'),
(21, 1, '2021-12-13 15:10:00', 'online', NULL, 'c', NULL, 'pubggg'),
(22, 1, '2021-12-13 15:10:00', 'online', NULL, 'c', NULL, 'pubggg'),
(23, 1, '2021-12-13 15:10:00', 'online', NULL, 'c', NULL, 'pubggg'),
(24, 1, '2021-12-13 15:10:00', 'online', NULL, 'c', NULL, 'pubggg'),
(25, 1, '2021-12-13 15:10:00', 'online', NULL, 'c', NULL, 'pubggg'),
(26, 1, '2021-12-13 15:10:00', 'online', NULL, 'c', NULL, 'pubggg'),
(27, 1, '2021-12-13 15:10:00', 'online', NULL, 'c', NULL, 'pubggg'),
(28, 1, '2021-12-13 15:10:00', 'online', NULL, 'c', NULL, 'pubggg'),
(29, 1, '2021-12-13 15:10:00', 'online', NULL, 'c', NULL, 'pubggg'),
(30, 1, '2021-12-13 15:10:00', 'online', NULL, 'c', NULL, 'pubggg'),
(31, 1, '2021-12-13 15:10:00', 'online', NULL, 'c', NULL, 'pubggg'),
(32, 1, '2021-12-13 15:10:00', 'online', NULL, 'c', NULL, 'pubggg'),
(33, 1, '2021-12-13 15:10:00', 'online', NULL, 'c', NULL, 'pubggg'),
(34, 1, '2021-12-13 15:10:00', 'online', NULL, 'c', NULL, 'pubggg'),
(36, 1, '2021-12-13 15:10:00', 'online', NULL, 'c', NULL, 'pubggg'),
(37, 1, '2021-12-13 15:10:00', 'online', NULL, 'c', NULL, 'pubggg'),
(38, 1, '2021-12-13 15:10:00', 'online', NULL, 'c', NULL, 'pubggg'),
(39, 1, '2022-11-11 15:14:00', 'asd', NULL, 'asd', NULL, 'asd'),
(40, 1, '2022-11-11 15:14:00', 'asd', NULL, 'asd', NULL, 'asd'),
(41, 1, '2022-11-11 15:14:00', 'asd', NULL, 'asd', NULL, 'asd'),
(42, 1, '2022-11-11 15:14:00', 'asd', NULL, 'asd', NULL, 'asd'),
(43, 1, '2022-11-11 15:14:00', 'asd', NULL, 'asd', NULL, 'asd'),
(44, 1, '2022-11-11 15:14:00', 'asd', NULL, 'asd', NULL, 'asd'),
(45, 1, '2022-11-11 15:14:00', 'asd', NULL, 'asd', NULL, 'asd'),
(46, 1, '2021-11-11 14:14:00', 'nkjh', NULL, 'jhgjg', NULL, 'ful'),
(47, 1, '2021-11-11 14:14:00', 'nkjh', NULL, 'jhgjg', NULL, 'ful'),
(48, 1, '2021-11-11 14:14:00', 'nkjh', NULL, 'jhgjg', NULL, 'ful'),
(49, 1, '2021-11-11 14:14:00', 'nkjh', NULL, 'jhgjg', NULL, 'ful'),
(50, 1, '2021-11-11 14:14:00', 'nkjh', NULL, 'jhgjg', NULL, 'ful'),
(51, 1, '2021-11-11 14:14:00', 'nkjh', NULL, 'jhgjg', NULL, 'ful'),
(52, 1, '2021-11-11 14:14:00', 'nkjh', NULL, 'jhgjg', NULL, 'ful'),
(53, 1, '2021-11-11 14:14:00', 'nkjh', NULL, 'jhgjg', NULL, 'ful'),
(54, 1, '2021-03-31 15:15:00', 'kgkjh', NULL, 'jgkjgk', NULL, 'jgjhg'),
(57, 2, '2021-04-12 15:15:00', 'online', NULL, '.', NULL, 'mobile legends'),
(58, 1, '2021-12-15 11:11:00', 'online', NULL, 'ps4', NULL, 'dragon ball'),
(59, 1, '2021-12-15 11:11:00', 'online', NULL, 'ps4', NULL, 'dragon ball Z'),
(60, 1, '2021-12-15 11:11:00', 'online', NULL, 'ps4', NULL, 'dragon ball Z'),
(61, 1, '2021-12-12 00:12:00', 'mdb/lck', NULL, 'ldsknlkn', NULL, 'xzxzxzxz'),
(62, 1, '2021-11-11 11:11:00', 'kjslkjsld', NULL, 'dkfhlskhe', NULL, 'dskjfhdkjhskjh'),
(63, 1, '2021-11-11 00:12:00', 'online', NULL, 'chess event', NULL, 'chess'),
(64, 1, '2021-11-11 00:12:00', 'online', NULL, 'chess event', NULL, 'chess'),
(65, 1, '2021-11-11 11:11:00', 'cafe', NULL, 'nmvmn', NULL, 'barc'),
(66, 1, '2021-11-11 11:11:00', 'online', NULL, 'ps4', NULL, 'cod'),
(67, 1, '2020-11-11 11:11:00', 'z', NULL, 'z', NULL, 'zzz'),
(68, 1, '2021-11-11 11:11:00', 'z', NULL, 'z', NULL, 'american football'),
(69, 1, '2021-11-11 04:04:00', 'ldsknl', NULL, 'dsl/knfdslkbfnslkdnekfndsk.breioyvoeinfm,dnldvwh4opde', NULL, 'lkdslk'),
(70, 1, '2022-12-12 11:11:00', 'kdjsbkjds', NULL, '...................................', NULL, 'ncnccn'),
(71, 1, '2021-11-11 11:11:00', ',m', NULL, 'lk', 'jb', 'x'),
(72, 1, '2022-02-02 04:05:00', 'x', NULL, 'x', 'x', 'x'),
(73, 2, '2022-11-11 11:11:00', 'nb', NULL, ',m', ',m ,m ,m', 'pubgggsakjbdkjsabskjbkj'),
(74, 3, '2021-12-12 11:11:00', 'beirut', NULL, 'sdjnlkn', NULL, 'paintball'),
(75, 1, '1998-01-01 00:00:00', 'online', NULL, 'xyz', '-', 'bobg'),
(76, 1, '1998-01-01 00:00:00', 'online', NULL, 'xyz', '-', 'bobg');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

DROP TABLE IF EXISTS `flights`;
CREATE TABLE IF NOT EXISTS `flights` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'tussle', '2021-02-26 09:21:08', '2021-02-26 09:21:08'),
(2, 'team new', '2021-02-26 13:53:16', NULL),
(78, '78', NULL, NULL),
(79, '79', NULL, NULL),
(80, 'chatting', NULL, NULL),
(81, 'teamtitle', NULL, NULL),
(82, 'team', NULL, NULL),
(83, 'f', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

DROP TABLE IF EXISTS `group_user`;
CREATE TABLE IF NOT EXISTS `group_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_user`
--

INSERT INTO `group_user` (`id`, `group_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-02-26 09:21:09', '2021-02-26 09:21:09'),
(2, 1, 2, '2021-02-26 09:21:09', '2021-02-26 09:21:09'),
(3, 2, 3, NULL, NULL),
(4, 2, 1, NULL, NULL),
(5, 78, 3, NULL, NULL),
(6, 78, 1, NULL, NULL),
(7, 79, 3, NULL, NULL),
(8, 80, 3, NULL, NULL),
(9, 80, 1, NULL, NULL),
(10, 81, 1, NULL, NULL),
(11, 82, 1, NULL, NULL),
(12, 80, 1, NULL, NULL),
(13, 80, 1, NULL, NULL),
(14, 83, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE IF NOT EXISTS `level` (
  `accountID` int(11) NOT NULL,
  `tournamentID` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`accountID`,`tournamentID`),
  KEY `tournamentID` (`tournamentID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`accountID`, `tournamentID`, `points`) VALUES
(1, 3, 17),
(2, 3, 1),
(1, 5, 24),
(3, 5, 24);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_05_25_140747_create_conversations_table', 1),
(4, '2017_05_25_155348_create_groups_table', 1),
(5, '2017_05_26_071028_create_jobs_table', 1),
(6, '2017_05_26_071034_create_failed_jobs_table', 1),
(7, '2017_05_26_091003_create_group_user_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(9, '2020_12_13_133208_create_flights_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nonsolotournament`
--

DROP TABLE IF EXISTS `nonsolotournament`;
CREATE TABLE IF NOT EXISTS `nonsolotournament` (
  `tournamentID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  PRIMARY KEY (`tournamentID`,`accountID`),
  KEY `accountID_idx` (`accountID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nonsolotournament`
--

INSERT INTO `nonsolotournament` (`tournamentID`, `accountID`) VALUES
(5, 20),
(5, 79),
(5, 80);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `notificationsID` int(11) NOT NULL AUTO_INCREMENT,
  `accountID` int(11) NOT NULL,
  `message` varchar(45) DEFAULT NULL,
  `href` varchar(45) DEFAULT NULL,
  `activity` varchar(45) DEFAULT NULL,
  `date` datetime NOT NULL,
  `seen` int(5) DEFAULT NULL,
  PRIMARY KEY (`notificationsID`),
  KEY `accountID_idx` (`accountID`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notificationsID`, `accountID`, `message`, `href`, `activity`, `date`, `seen`) VALUES
(1, 1, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-18 16:08:42', 1),
(2, 2, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-18 16:08:42', 1),
(3, 1, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-18 16:20:31', 1),
(4, 2, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-18 16:20:31', 1),
(5, 2, 'team request accepted', 'teamview/id=77', NULL, '2021-02-19 13:13:08', 1),
(6, 1, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-19 14:07:18', 1),
(7, 2, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-19 14:07:18', 1),
(8, 1, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-19 14:08:18', 1),
(9, 2, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-19 14:08:18', 1),
(10, 1, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-19 14:08:35', 1),
(11, 2, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-19 14:08:35', 1),
(12, 1, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-19 14:16:38', 1),
(13, 2, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-19 14:16:38', 1),
(14, 1, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-19 14:34:22', 1),
(15, 2, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-19 14:34:22', 1),
(16, 1, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-19 14:35:08', 1),
(17, 2, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-19 14:35:08', 1),
(18, 1, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-19 14:38:48', 1),
(19, 2, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-19 14:38:48', 1),
(20, 1, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-19 14:41:55', 1),
(21, 2, 'tournament joined', 'tournamentview/id=5', NULL, '2021-02-19 14:41:55', 1),
(22, 3, 'team request accepted', 'teamview/id=71', NULL, '2021-02-26 13:51:41', 1),
(23, 1, 'team request accepted', 'teamview/id=78', NULL, '2021-02-26 14:13:52', 1),
(24, 3, 'tournament joined', 'tournamentview/id=3', NULL, '2021-02-26 14:52:12', 1),
(25, 1, 'team request accepted', 'teamview/id=80', NULL, '2021-02-26 15:21:30', 1),
(26, 1, 'team request accepted', 'teamview/id=80', NULL, '2021-03-11 15:25:14', 1),
(27, 1, 'team request accepted', 'teamview/id=80', NULL, '2021-03-11 15:35:17', 1),
(28, 1, 'tournament joined', 'tournamentview/id=6', NULL, '2021-03-12 08:19:41', 1),
(29, 2, 'tournament joined', 'tournamentview/id=6', NULL, '2021-03-12 08:19:41', 0),
(30, 3, 'tournament joined', 'tournamentview/id=6', NULL, '2021-03-12 08:19:41', 0),
(31, 1, 'tournament joined', 'tournamentview/id=6', NULL, '2021-03-12 08:45:46', 1),
(32, 2, 'tournament joined', 'tournamentview/id=6', NULL, '2021-03-12 08:45:46', 0),
(33, 3, 'tournament joined', 'tournamentview/id=6', NULL, '2021-03-12 08:45:46', 0),
(34, 1, 'tournament joined', 'tournamentview/id=6', NULL, '2021-03-12 08:56:17', 1),
(35, 2, 'tournament joined', 'tournamentview/id=6', NULL, '2021-03-12 08:56:17', 0),
(36, 3, 'tournament joined', 'tournamentview/id=6', NULL, '2021-03-12 08:56:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `participateevent`
--

DROP TABLE IF EXISTS `participateevent`;
CREATE TABLE IF NOT EXISTS `participateevent` (
  `accountID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  PRIMARY KEY (`accountID`,`eventID`),
  KEY `eventID_idx` (`eventID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participateevent`
--

INSERT INTO `participateevent` (`accountID`, `eventID`) VALUES
(1, 57),
(1, 63),
(1, 65),
(1, 66),
(1, 67),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(2, 63),
(2, 65),
(2, 66),
(2, 68),
(2, 73),
(3, 74);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Account', 1, 'test', '85cf199edc3a2f5dff0d4dbd55f9aee0b3f8d324e198e7f16408d228113a8f78', '[\"*\"]', '2021-03-01 06:19:19', '2021-03-01 06:03:26', '2021-03-01 06:19:19'),
(2, 'App\\Models\\Account', 1, 'test', 'f407d0e6d7dfde6e2df999cabf40a8cc05a4b41a247c2f84434d872757e12cf2', '[\"*\"]', NULL, '2021-03-01 11:18:12', '2021-03-01 11:18:12'),
(3, 'App\\Models\\Account', 1, 'test', '2c9a63f43fc8715bc89f8e30fd6b801be5957efa88469dafbbeef686128c3cea', '[\"*\"]', NULL, '2021-03-01 11:27:09', '2021-03-01 11:27:09'),
(4, 'App\\Models\\Account', 1, 'samsung', '330810c4ba891bfce896a392f215a8d9d389b9eb97b98eb388279f0a3e272119', '[\"*\"]', NULL, '2021-03-01 12:02:45', '2021-03-01 12:02:45'),
(5, 'App\\Models\\Account', 1, 'samsung', '90c2f302c240f4c686ba8ae5a2d4c12e86ddf443d2d23ffdbbeccf736e2ab6aa', '[\"*\"]', NULL, '2021-03-01 12:03:23', '2021-03-01 12:03:23'),
(6, 'App\\Models\\Account', 1, 'samsung', '18b07442adf2157516af0209f3bf749da29de4f7e7ca5b3cb65b3be379325470', '[\"*\"]', NULL, '2021-03-01 12:03:24', '2021-03-01 12:03:24'),
(7, 'App\\Models\\Account', 1, 'test', '8a7626f53c6021ef1773e6b8384d798cee52ceb41fa41c2ced5875c887b67a58', '[\"*\"]', NULL, '2021-03-02 04:17:20', '2021-03-02 04:17:20'),
(8, 'App\\Models\\Account', 1, 'iphone', '4b951ded6d192ee1111a945837b82b59aa29d8514bf6c03dd862699d2ec8d728', '[\"*\"]', NULL, '2021-03-02 04:25:32', '2021-03-02 04:25:32'),
(9, 'App\\Models\\Account', 1, 'iphone', '6873f9b5310d8d9927f3a672df6f0adf18f00e1193e219a06ce38d1d7534f50f', '[\"*\"]', NULL, '2021-03-02 04:26:44', '2021-03-02 04:26:44'),
(10, 'App\\Models\\Account', 1, 'iphone', 'd9a214af5e0d1795ab2eb23b8d0a405902714c520325222aa5e0e282a12d371d', '[\"*\"]', NULL, '2021-03-02 04:27:25', '2021-03-02 04:27:25'),
(11, 'App\\Models\\Account', 1, 'iphone', '18fbb9bce30e7d01bbe0eb9162f1499594f1f96c4e4a23d8199ed9bd6cbc8718', '[\"*\"]', NULL, '2021-03-02 04:27:57', '2021-03-02 04:27:57'),
(12, 'App\\Models\\Account', 1, 'iphone', '27546bc533127b496202ac045c5df17f3ba0c5f8d78005386058f0a51ec8f882', '[\"*\"]', NULL, '2021-03-02 04:29:57', '2021-03-02 04:29:57'),
(13, 'App\\Models\\Account', 1, 'iphone', 'de83cabe98c5e00a87c49d0acde3082a42ab4a021fae046121e93a9d5796b544', '[\"*\"]', NULL, '2021-03-02 04:30:26', '2021-03-02 04:30:26'),
(14, 'App\\Models\\Account', 1, 'iphone', '7f00ec4627a159818643da6ac0642f28e2762126b316f972e6a98569c24a5856', '[\"*\"]', NULL, '2021-03-02 04:30:27', '2021-03-02 04:30:27'),
(15, 'App\\Models\\Account', 1, 'iphone', '8661f504681d30a706896a8c570b90d71a904882725ccd32c6f43b87d7cec3d7', '[\"*\"]', NULL, '2021-03-02 04:31:29', '2021-03-02 04:31:29'),
(16, 'App\\Models\\Account', 1, 'iphone', '9adbea06d16ba69ee2a1d08876e2201a7d55dfdf626ec3671fef245d6556ca88', '[\"*\"]', NULL, '2021-03-02 04:34:58', '2021-03-02 04:34:58'),
(17, 'App\\Models\\Account', 1, 'iphone', '3358050b54540e2dedb669ad2950b4236a083929f7da774fd8fdbee4cffe808b', '[\"*\"]', NULL, '2021-03-02 04:36:19', '2021-03-02 04:36:19'),
(18, 'App\\Models\\Account', 1, 'iphone', '1fb8c06672f7bfcb84f147db8f3fb1e6db36aaeea321f862ad854a7b04d0c756', '[\"*\"]', NULL, '2021-03-02 04:36:53', '2021-03-02 04:36:53'),
(19, 'App\\Models\\Account', 1, 'iphone', '4dcf751ec6672edbab9dc67212185f28ec0e68882e2df3beabd52b69fa6a6959', '[\"*\"]', NULL, '2021-03-02 04:36:54', '2021-03-02 04:36:54'),
(20, 'App\\Models\\Account', 1, 'iphone', '479672cecdce44c2ed84e1e0893c8b74563a0d5a2928f44d691d319414c9e6a9', '[\"*\"]', NULL, '2021-03-02 04:38:06', '2021-03-02 04:38:06'),
(21, 'App\\Models\\Account', 1, 'iphone', '504cecdb81d0dce0a7ade1430ab91bfacf4b2404837ed9a4eb6c29a4e86bbf64', '[\"*\"]', NULL, '2021-03-02 04:39:38', '2021-03-02 04:39:38'),
(22, 'App\\Models\\Account', 1, 'iphone', '4fe3b0f0adfa393bc83907487a0fa954f59182a4c89964489bc5677bf00d5998', '[\"*\"]', NULL, '2021-03-02 04:40:52', '2021-03-02 04:40:52'),
(23, 'App\\Models\\Account', 1, 'iphone', '7c88cc9a0e5cab1cca7554ad1ede46275117e1f56a886b7eb56119676a96e1e9', '[\"*\"]', NULL, '2021-03-02 04:44:40', '2021-03-02 04:44:40'),
(24, 'App\\Models\\Account', 1, 'iphone', '821eb88135bb3d8d29b8bce11c50828878ce38c34fa384332ded3e96a1da1589', '[\"*\"]', NULL, '2021-03-02 04:45:14', '2021-03-02 04:45:14'),
(25, 'App\\Models\\Account', 1, 'test', '824dab46f72f0d5a478f59c4e2178e66bcc9af5f49375a549c7e5759484644ec', '[\"*\"]', NULL, '2021-03-02 04:53:23', '2021-03-02 04:53:23'),
(26, 'App\\Models\\Account', 1, 'iphone', 'c5f4b78d1c2aca635407fceaee2973f99844f493de3e7b5af11efe69949e61c5', '[\"*\"]', NULL, '2021-03-02 04:53:58', '2021-03-02 04:53:58'),
(27, 'App\\Models\\Account', 1, 'iphone', '22a560a629c77e0a50a542d68fb7674bf5adc5d0fd5532b94d6a7bafa70211b9', '[\"*\"]', NULL, '2021-03-02 04:55:01', '2021-03-02 04:55:01'),
(28, 'App\\Models\\Account', 1, 'iphone', 'ceecd226ff6efc739e2092276b25298366c8426a89d4938f1b1a776ee60f30c8', '[\"*\"]', NULL, '2021-03-02 04:55:34', '2021-03-02 04:55:34'),
(29, 'App\\Models\\Account', 1, 'iphone', 'f841650c66219c3e62306fa4e8a931fa5f76049f08216e6f7720738f7b415087', '[\"*\"]', NULL, '2021-03-02 04:56:37', '2021-03-02 04:56:37'),
(30, 'App\\Models\\Account', 1, 'iphone', '4d9b060c26b089644c6223bafb241000213dcbe76758650ca3d12060e9da5de7', '[\"*\"]', NULL, '2021-03-02 04:58:08', '2021-03-02 04:58:08'),
(31, 'App\\Models\\Account', 1, 'iphone', '5edcefed069aceaefac0b00a6d3a4b803ae2dcd80d7c126c34730d72aafa3d27', '[\"*\"]', NULL, '2021-03-02 04:58:30', '2021-03-02 04:58:30'),
(32, 'App\\Models\\Account', 1, 'iphone', 'ff3baed86664831b89c2787d40cac537f3b0c74b77c357e80374d55b78272a5a', '[\"*\"]', NULL, '2021-03-02 04:58:47', '2021-03-02 04:58:47'),
(33, 'App\\Models\\Account', 1, 'iphone', 'dbd39ae239a34917ae5481dbaaa04710b5027301bbe0e8278b0dd0528f4c7d69', '[\"*\"]', NULL, '2021-03-02 04:59:37', '2021-03-02 04:59:37'),
(34, 'App\\Models\\Account', 1, 'iphone', '9b4cd0bbe332bc98352563a3852d7c38a6cfa0713a6137446e1c9aa745eaa134', '[\"*\"]', NULL, '2021-03-02 05:00:41', '2021-03-02 05:00:41'),
(35, 'App\\Models\\Account', 1, 'iphone', '7edf8baa50ce31c7a90c763cfc7d0b7050b489ea0e2598d321a486c76f699086', '[\"*\"]', NULL, '2021-03-02 05:01:11', '2021-03-02 05:01:11'),
(36, 'App\\Models\\Account', 1, 'admin_device', 'a1270bfdffffcd6ac999c644cfec6244deaf7d11c33a518c90330276d694dc97', '[\"*\"]', '2021-03-04 06:51:22', '2021-03-04 06:34:45', '2021-03-04 06:51:22'),
(37, 'App\\Models\\Account', 1, 'admin_device', 'ce14dba6176e7ebb50171db77516ce859c4a1b304faa0399f9d8f7facc83c2e1', '[\"*\"]', '2021-03-04 13:17:29', '2021-03-04 12:26:34', '2021-03-04 13:17:29'),
(38, 'App\\Models\\Account', 1, 'xxx', '215a320cf8979fcb5fcc4f3a337948387826c9ba2325b9e8cb2d8702d42482e4', '[\"*\"]', NULL, '2021-03-04 12:54:39', '2021-03-04 12:54:39'),
(39, 'App\\Models\\Account', 1, 'xxx', '0f5e54daad08b0a2a8743c64fbdb1406a85e15846ff5e05acf4a8d05b1acbe7c', '[\"*\"]', NULL, '2021-03-04 12:55:35', '2021-03-04 12:55:35'),
(40, 'App\\Models\\Account', 1, 'xxx', '44c01520e5adcd13ad7c10ad7a3398950c1b98b6c330a08fda9e8403aecf7ef9', '[\"*\"]', NULL, '2021-03-04 12:56:34', '2021-03-04 12:56:34'),
(41, 'App\\Models\\Account', 1, 'xxx', 'eeeb6d3870b163983e7c8ca704e9d64f69f1975f68546f32eaeb2009597a9b58', '[\"*\"]', NULL, '2021-03-04 12:57:09', '2021-03-04 12:57:09'),
(42, 'App\\Models\\Account', 1, 'xxx', '5cda1fd8ed83db830134bb433e1c6207625eddf46d56137005dc5a359703306d', '[\"*\"]', NULL, '2021-03-04 12:59:10', '2021-03-04 12:59:10'),
(43, 'App\\Models\\Account', 1, 'xxx', 'ba622a4de3fd6a75fa70ab534ba6f6e9306906640a440e363d4435302c3a8213', '[\"*\"]', NULL, '2021-03-04 13:00:17', '2021-03-04 13:00:17'),
(44, 'App\\Models\\Account', 1, 'xxx', '8a3b3507cee68bcf2e7047db7ec1072e0b4f3fe8724b9ba399a74b8aa54f1d65', '[\"*\"]', NULL, '2021-03-04 13:00:38', '2021-03-04 13:00:38'),
(45, 'App\\Models\\Account', 1, 'xxx', '5c8c26243717a8fea1dfbfd0b8e437e0bc6b074faa5d40a39c90b23c63f8d678', '[\"*\"]', NULL, '2021-03-04 13:04:03', '2021-03-04 13:04:03'),
(46, 'App\\Models\\Account', 1, 'xxx', 'e30888f1d4282344dba127fbf7c90ba34b97a1a1cab78e0a5e89cae46d750a6e', '[\"*\"]', NULL, '2021-03-04 13:06:08', '2021-03-04 13:06:08'),
(47, 'App\\Models\\Account', 1, 'xxx', '1991b44a779e03b934066bce14c7555b07bcbda82e36ce69290f89493709f863', '[\"*\"]', NULL, '2021-03-04 13:07:35', '2021-03-04 13:07:35'),
(48, 'App\\Models\\Account', 1, 'xxx', '3d0e4498a1f3dae31d78a1426795a9e6345371e0d86a3025bbb7789ff8e6b183', '[\"*\"]', NULL, '2021-03-04 13:09:37', '2021-03-04 13:09:37'),
(49, 'App\\Models\\Account', 1, 'xxx', '2876f664cba58bde33a1313fbd80f39cc623d08fb1183bd7a995a5a3acf2f35a', '[\"*\"]', NULL, '2021-03-04 13:11:07', '2021-03-04 13:11:07'),
(50, 'App\\Models\\Account', 1, 'xxx', '7aa2b7c98f7044047542bd9f34d6251dc24b87555e8176f1e5f45e0b82698f72', '[\"*\"]', NULL, '2021-03-04 13:13:22', '2021-03-04 13:13:22'),
(51, 'App\\Models\\Account', 1, 'xxx', '256bd193200dcaa6a1632281e1031495d8280118fe2519f7d744f4facd473099', '[\"*\"]', NULL, '2021-03-04 13:15:03', '2021-03-04 13:15:03'),
(52, 'App\\Models\\Account', 1, 'xxx', '4aaddda1fc4b67fd1dc201ff0caa07c98e2637a10e562fbb1663b98df0f5907d', '[\"*\"]', NULL, '2021-03-04 13:16:11', '2021-03-04 13:16:11'),
(53, 'App\\Models\\Account', 1, 'xxx', '85894c95d34ef0593df50c07bcedae264d44e74b1628af66d9e60964501c5219', '[\"*\"]', NULL, '2021-03-04 13:16:52', '2021-03-04 13:16:52'),
(54, 'App\\Models\\Account', 1, 'xxx', '30de074f26d012806cb273c04bbee7299971d41de85e9e3b3ada1c5567cc9ddd', '[\"*\"]', NULL, '2021-03-04 13:18:38', '2021-03-04 13:18:38'),
(55, 'App\\Models\\Account', 1, 'xxx', '15cd0c787b2276b5a202c2659fb2e4aa46d5c981b7c95ddfffb6f2e450484079', '[\"*\"]', '2021-03-04 13:19:27', '2021-03-04 13:19:27', '2021-03-04 13:19:27'),
(56, 'App\\Models\\Account', 1, 'xxx', '65db39478fc4eae54e6dbdb5d8189bfd5ea37bee275a8a0b3b84551afa03398b', '[\"*\"]', '2021-03-04 13:19:52', '2021-03-04 13:19:52', '2021-03-04 13:19:52'),
(57, 'App\\Models\\Account', 1, 'xxx', '06b9460a848a58f5daba9819568e97163bd54069da5348dd54030c452c2a3145', '[\"*\"]', NULL, '2021-03-04 13:22:57', '2021-03-04 13:22:57'),
(58, 'App\\Models\\Account', 1, 'xxx', '4d9925507e0399bf25012273abcbefa6da33ed60942e36bfeaabc8ff383ab2e7', '[\"*\"]', '2021-03-04 13:23:28', '2021-03-04 13:23:28', '2021-03-04 13:23:28'),
(59, 'App\\Models\\Account', 1, 'xxx', 'f8152cf39a9109f10d9d7e83851f969b221541c6401fc8c2fede41a4d82a0b91', '[\"*\"]', '2021-03-04 13:32:53', '2021-03-04 13:32:52', '2021-03-04 13:32:53'),
(60, 'App\\Models\\Account', 1, 'xxx', '284e439db26edf59b329b9a0491f721a219413657431f1e5ab18a56e60046097', '[\"*\"]', '2021-03-04 13:37:09', '2021-03-04 13:37:09', '2021-03-04 13:37:09'),
(61, 'App\\Models\\Account', 1, 'xxx', '096b390a80bd9c0627e9ceb3652940a45eb5dfabe06846e371761d36ae27b6ff', '[\"*\"]', '2021-03-04 13:38:48', '2021-03-04 13:38:47', '2021-03-04 13:38:48'),
(62, 'App\\Models\\Account', 1, 'admin_device', 'c2f5c4cce0647c51ec1cadb1482c4bb172562aa63006d5a925d0c223001991bf', '[\"*\"]', NULL, '2021-03-04 14:27:51', '2021-03-04 14:27:51'),
(63, 'App\\Models\\Account', 1, 'admin_device', '66c3bf4261f4afa9a4fb569706c5abbe153810800622d7d3409d29a1bd3a9309', '[\"*\"]', NULL, '2021-03-04 14:29:59', '2021-03-04 14:29:59'),
(66, 'App\\Models\\Account', 1, 'admin_device', '13dfe18dfe8b2c746a93ec5296a138779344d3bcf8af7a77dfe09b966fa2946f', '[\"*\"]', '2021-03-06 07:06:06', '2021-03-06 05:36:06', '2021-03-06 07:06:06'),
(67, 'App\\Models\\Account', 1, 'd', '727181ea3f593d61748ee80a769a143ca291264ee383e50f1ec83552284deeda', '[\"*\"]', NULL, '2021-03-06 06:11:39', '2021-03-06 06:11:39'),
(68, 'App\\Models\\Account', 1, 'd', 'f693ebea7dc7f40eab70af7228af89536eba22eb2bec6eaaa85a7d1992c693d3', '[\"*\"]', NULL, '2021-03-06 06:13:50', '2021-03-06 06:13:50'),
(69, 'App\\Models\\Account', 1, 'd', '16faadb5237c2cf73a90087bcb192357f4be2d5b4e6ed499e60d8040c3b37906', '[\"*\"]', NULL, '2021-03-06 06:15:10', '2021-03-06 06:15:10'),
(70, 'App\\Models\\Account', 1, 'd', '923c167177afe1e4753952a7aa55890b3cdc079008c8d1efaf98e948d53e51d9', '[\"*\"]', NULL, '2021-03-06 06:15:35', '2021-03-06 06:15:35'),
(71, 'App\\Models\\Account', 1, 'd', '0416d1129833a203bc8128c9ea4a35c94fef1cee02b3e7ac15286bfb9ba01798', '[\"*\"]', NULL, '2021-03-06 06:17:17', '2021-03-06 06:17:17'),
(72, 'App\\Models\\Account', 1, 'd', '26760c45ce613dc50028fc8cddd0d21bae9ff0fb33e094af4fe9108c6b6be054', '[\"*\"]', NULL, '2021-03-06 06:19:25', '2021-03-06 06:19:25'),
(73, 'App\\Models\\Account', 1, 'd', '0df52e22949dde10d45e8202b6378d86b9bde92b217df73c26677d5d9132d3f1', '[\"*\"]', NULL, '2021-03-06 06:21:05', '2021-03-06 06:21:05'),
(74, 'App\\Models\\Account', 1, 'd', '5ca0a92dc9e7a8a39864e95300e8228091c267467f23412425929a8c6854ea29', '[\"*\"]', '2021-03-06 06:54:08', '2021-03-06 06:24:10', '2021-03-06 06:54:08'),
(75, 'App\\Models\\Account', 1, 'd', '916eb1fd81e6dcde421e638710b6f4e8557d95afd6f4c5bf2879d653cfac9457', '[\"*\"]', NULL, '2021-03-06 06:30:47', '2021-03-06 06:30:47'),
(76, 'App\\Models\\Account', 1, 'd', '383b5c3822522e59c378887ad88efeea6d0d0f5e8522bc98e77dc1fe4d3ce6e7', '[\"*\"]', NULL, '2021-03-06 06:32:35', '2021-03-06 06:32:35'),
(77, 'App\\Models\\Account', 1, 'd', '86f823b6e9cfe536617dfb0a7d7adf6173bd92b935bae6c4b8975dc7841b686e', '[\"*\"]', NULL, '2021-03-06 06:33:31', '2021-03-06 06:33:31'),
(78, 'App\\Models\\Account', 1, 'd', '73684800e2b0bb699fb5b0d98ebd91dbda89a435a44a6ada001ecefae80d63de', '[\"*\"]', NULL, '2021-03-06 06:35:04', '2021-03-06 06:35:04'),
(79, 'App\\Models\\Account', 1, 'd', '5175760674aed09a89fc11e1bcb19562b304ef1c51628d35604f3353a9639903', '[\"*\"]', NULL, '2021-03-06 06:36:27', '2021-03-06 06:36:27'),
(80, 'App\\Models\\Account', 1, 'd', '5c9020a7508f0caa1b5a7c79371db458691c2c19cda0b809aefb68de88d5136e', '[\"*\"]', NULL, '2021-03-06 06:37:43', '2021-03-06 06:37:43'),
(81, 'App\\Models\\Account', 1, 'd', '852ca609c59e8679bd7a837979afdff4dd31adca11a3d7d1576121235862566f', '[\"*\"]', NULL, '2021-03-06 06:39:08', '2021-03-06 06:39:08'),
(82, 'App\\Models\\Account', 1, 'd', 'bf608d393d27647a8feb2724120ac5fd455d7d36f37ab9ddd8a0b63cf8b200b9', '[\"*\"]', NULL, '2021-03-06 06:40:17', '2021-03-06 06:40:17'),
(83, 'App\\Models\\Account', 1, 'd', '79c4381b1c766b92caa09d92c71c9cab6e892bb2657861746d8c15d17b6f1f6e', '[\"*\"]', NULL, '2021-03-06 06:40:22', '2021-03-06 06:40:22'),
(84, 'App\\Models\\Account', 1, 'd', '77bcd15b71cb06170da8ac4655c7de8d71cbbb6b7418da3ddb1994228766ab53', '[\"*\"]', NULL, '2021-03-06 06:41:09', '2021-03-06 06:41:09'),
(85, 'App\\Models\\Account', 1, 'd', 'fb4d7e0feb46661c5837b918cb77d492be2cd6c138a70e527cb05315d6aaf926', '[\"*\"]', NULL, '2021-03-06 06:43:02', '2021-03-06 06:43:02'),
(86, 'App\\Models\\Account', 1, 'd', '695cef90fc869b4e5d6263da0caaae7b58e8d097c43baca932744bd82472a525', '[\"*\"]', NULL, '2021-03-06 06:43:53', '2021-03-06 06:43:53'),
(87, 'App\\Models\\Account', 1, 'd', '226c186caaa1827cfd2086b1a5365c0a425742e3a2c8f411eb77b10517c5e05b', '[\"*\"]', NULL, '2021-03-06 06:45:34', '2021-03-06 06:45:34'),
(88, 'App\\Models\\Account', 1, 'd', '289c2cd4cec1d3a76c409ff320b34ea03490a434f7ca66399b02b6eca35aab25', '[\"*\"]', '2021-03-06 06:46:59', '2021-03-06 06:46:27', '2021-03-06 06:46:59'),
(89, 'App\\Models\\Account', 1, 'd', '9809073ca1608d102f3fc0e7c5f550fad15bf93e422b445fbb4d49db3c53e08d', '[\"*\"]', NULL, '2021-03-06 06:46:59', '2021-03-06 06:46:59'),
(90, 'App\\Models\\Account', 1, 'd', 'd7124a278cc4a814bbd9733715cfd433f536eaa38dd8d26f16d787e18713332e', '[\"*\"]', NULL, '2021-03-06 06:50:30', '2021-03-06 06:50:30'),
(91, 'App\\Models\\Account', 1, 'd', '271991e6afb2fb030f2f0ad7829e6241c6925e417d31dd4674822ef527921d00', '[\"*\"]', NULL, '2021-03-06 06:53:23', '2021-03-06 06:53:23'),
(92, 'App\\Models\\Account', 1, 'd', 'fc97decfa0d70f5fde0ed78392a4db360e28078cac182a32f1b1942e4e83cbc7', '[\"*\"]', NULL, '2021-03-06 06:54:08', '2021-03-06 06:54:08'),
(93, 'App\\Models\\Account', 1, 'd', 'ae6212ad65683750601eca31ead3f63c21bd1717d263111532fbdf782b53fc45', '[\"*\"]', NULL, '2021-03-06 06:55:19', '2021-03-06 06:55:19'),
(94, 'App\\Models\\Account', 1, 'd', 'f913c3b059e7f59718e03adf6840cb3cad2e4c0bdcaa93079605d2a77d551e3c', '[\"*\"]', NULL, '2021-03-06 06:55:41', '2021-03-06 06:55:41'),
(95, 'App\\Models\\Account', 1, 'd', '4d2c3cd5c2f161e3bf9740541b87cffe91ffe4a573129197d6cef6e22bca12c7', '[\"*\"]', NULL, '2021-03-06 06:56:20', '2021-03-06 06:56:20'),
(96, 'App\\Models\\Account', 1, 'd', 'ad16d7e68c7c02ced7c58fb3f5035d4cd0e506e98e7c8b6165e62182c1034fc0', '[\"*\"]', '2021-03-06 06:58:34', '2021-03-06 06:58:28', '2021-03-06 06:58:34'),
(97, 'App\\Models\\Account', 1, 'd', 'd81aaca3a32db730d5266a2b62376c8bb78ba1502de70ffeac61551511390ea9', '[\"*\"]', '2021-03-06 06:59:40', '2021-03-06 06:59:21', '2021-03-06 06:59:40'),
(98, 'App\\Models\\Account', 1, 'd', '53b0b6700f63449a37f2bac71c3707207b4bf7afb4f0c88825563ef150a115a8', '[\"*\"]', '2021-03-06 07:03:07', '2021-03-06 07:03:02', '2021-03-06 07:03:07'),
(99, 'App\\Models\\Account', 1, 'd', 'cf8b6bf8b8d4ff0efcafd67120db93650c1d108ff1a707e1280e9fa492455d9d', '[\"*\"]', '2021-03-06 07:04:23', '2021-03-06 07:04:10', '2021-03-06 07:04:23'),
(100, 'App\\Models\\Account', 1, 'd', '92559a98fdae4e57f61392b6c85ddf1796e5283faa0e71e33b1e1bff82f2d942', '[\"*\"]', '2021-03-06 07:25:32', '2021-03-06 07:04:45', '2021-03-06 07:25:32'),
(101, 'App\\Models\\Account', 1, 'd', 'a63c764b92b069f1fc75b11539c739235095e76c1b84fe017ae3dcf9e7bdc108', '[\"*\"]', NULL, '2021-03-06 07:27:50', '2021-03-06 07:27:50'),
(102, 'App\\Models\\Account', 1, 'd', '946469e46eed2fcafefe00021465bd37e5e1e6849276f6a266fe946ab841f3ad', '[\"*\"]', NULL, '2021-03-06 07:29:10', '2021-03-06 07:29:10'),
(103, 'App\\Models\\Account', 1, 'd', 'd1def6530319e2b246a465c068a08f04004765d50838150ff6d5741316762e09', '[\"*\"]', '2021-03-06 07:30:27', '2021-03-06 07:30:23', '2021-03-06 07:30:27'),
(104, 'App\\Models\\Account', 1, 'd', 'fb3aec3cd3b1fdff19009c52fa855786cd5d38bb1ac98fc7398e764409bf743a', '[\"*\"]', '2021-03-06 07:30:52', '2021-03-06 07:30:48', '2021-03-06 07:30:52'),
(105, 'App\\Models\\Account', 1, 'admin_device', '323c508b40862fa4d5d260c9392c117d6c034639e2adde750392b29c572627d4', '[\"*\"]', '2021-03-06 09:45:20', '2021-03-06 09:16:27', '2021-03-06 09:45:20'),
(106, 'App\\Models\\Account', 1, 'd', 'bbcbccd363b1baeec1c74081e57c64320df17591e2eedcf928bc3ea40bcef22a', '[\"*\"]', '2021-03-06 09:26:46', '2021-03-06 09:26:42', '2021-03-06 09:26:46'),
(107, 'App\\Models\\Account', 1, 'd', 'babdc241d3d189838b6fa319afe7459038d58982c9200d80336c7b65f1a6419e', '[\"*\"]', NULL, '2021-03-06 09:35:03', '2021-03-06 09:35:03'),
(108, 'App\\Models\\Account', 1, 'd', '8f5f78034ad75e888a4fb41b3e8a5e4548949887e3ac1e65c11ee19d1a234e9a', '[\"*\"]', '2021-03-06 09:35:36', '2021-03-06 09:35:33', '2021-03-06 09:35:36'),
(109, 'App\\Models\\Account', 1, 'd', '2978162ff1eca2a2f68633a31fdc2f847df9d1e6bdb620673a22a1fc2d8b9f11', '[\"*\"]', '2021-03-06 09:42:28', '2021-03-06 09:42:26', '2021-03-06 09:42:28'),
(110, 'App\\Models\\Account', 1, 'd', '9f98b519911ffeaa35f7d1c0c008cf3a95bb7db5912fb1acf34e17174f462485', '[\"*\"]', '2021-03-06 09:46:07', '2021-03-06 09:46:03', '2021-03-06 09:46:07'),
(111, 'App\\Models\\Account', 1, 'Hosam', '6b1d5501820735de7f3caebeb54704a6cb5ffea028cbe9193a59d3cde826389c', '[\"*\"]', '2021-03-06 12:56:22', '2021-03-06 12:56:16', '2021-03-06 12:56:22'),
(112, 'App\\Models\\Account', 1, 'Hosam', '012111f6217875c2ae3dcc162bcec296faa79eb756c150d70560a080e1e41623', '[\"*\"]', '2021-03-06 13:03:39', '2021-03-06 13:03:33', '2021-03-06 13:03:39'),
(113, 'App\\Models\\Account', 1, 'Hosam', '531746536cbdcff7507d430e8df4b9b894f920e7ee10747f857b8445c187de26', '[\"*\"]', '2021-03-06 13:04:19', '2021-03-06 13:04:17', '2021-03-06 13:04:19'),
(114, 'App\\Models\\Account', 1, 'Hosam', 'a6150c53fdfa2d8de3dd379e2f75516ffa9360e8152dc7a37a2defc4f0b0cc9d', '[\"*\"]', '2021-03-06 13:05:57', '2021-03-06 13:05:54', '2021-03-06 13:05:57'),
(115, 'App\\Models\\Account', 1, 'Hosam', 'a74527a304aeb47685f5140ce4a3f404accbae02d9eff452cd6c47ed27b0c89f', '[\"*\"]', '2021-03-06 13:08:05', '2021-03-06 13:07:46', '2021-03-06 13:08:05'),
(116, 'App\\Models\\Account', 1, 'Hosam', 'f10cc0e04162e63c8c7789d1f49a0f21d61fb8ab9e89777d3d6736921914087e', '[\"*\"]', '2021-03-06 13:08:37', '2021-03-06 13:08:31', '2021-03-06 13:08:37'),
(117, 'App\\Models\\Account', 1, 'Hosam', 'ce8e88330d036a5ac963251ece6c7660b84f783e27aee1c41a1f5481c3a334a3', '[\"*\"]', '2021-03-06 13:09:26', '2021-03-06 13:09:25', '2021-03-06 13:09:26'),
(118, 'App\\Models\\Account', 1, 'Hosam', 'cafc3c43fb13165c0fb79fd5cfcb45c468eca238a6841822430a5187f6362b07', '[\"*\"]', '2021-03-06 13:09:49', '2021-03-06 13:09:46', '2021-03-06 13:09:49'),
(119, 'App\\Models\\Account', 1, 'Hosam', '2906b6638e13d94f42dd53ff7e2d9d6bbaf22ce70c0440647e1e30ff4a6288a7', '[\"*\"]', '2021-03-06 13:10:53', '2021-03-06 13:10:51', '2021-03-06 13:10:53'),
(120, 'App\\Models\\Account', 1, 'Hosam', '6be5dfbaf7687eb44f350a3ae357b31eda96846f8f97238b67d9fccb288b1b05', '[\"*\"]', '2021-03-06 13:12:23', '2021-03-06 13:12:21', '2021-03-06 13:12:23'),
(121, 'App\\Models\\Account', 1, 'Hosam', 'f59bc75b58b59fa233eb4210dcbff3232d2338ff8f14bb5b71833039e0443316', '[\"*\"]', '2021-03-06 13:12:55', '2021-03-06 13:12:53', '2021-03-06 13:12:55'),
(122, 'App\\Models\\Account', 1, 'Hosam', 'c3453fe1dd452a634364acdaaa0a9edd7480ced0142c3466176409c768bcb269', '[\"*\"]', '2021-03-06 13:13:49', '2021-03-06 13:13:48', '2021-03-06 13:13:49'),
(123, 'App\\Models\\Account', 1, 'Hosam', 'b4bdcf2ee8d2d989a35a493a1ab46c2baf00c438445e973f3badf4ffb645ece4', '[\"*\"]', '2021-03-06 13:14:20', '2021-03-06 13:14:18', '2021-03-06 13:14:20'),
(124, 'App\\Models\\Account', 1, 'Hosam', 'ac8423733535c152b1735d1beebf5dda762b1554c2572efa699e5d9dea2539fd', '[\"*\"]', '2021-03-06 13:15:36', '2021-03-06 13:15:33', '2021-03-06 13:15:36'),
(125, 'App\\Models\\Account', 1, 'Hosam', '99b78ba24384089075aaf3e3f04bd2de868f0c62b51ac8d21b2fcf88f78eb2a6', '[\"*\"]', '2021-03-06 13:17:37', '2021-03-06 13:17:31', '2021-03-06 13:17:37'),
(126, 'App\\Models\\Account', 1, 'Hosam', '8fe03e5f2e0af4430adfd20bf2c01683f971a0f8118ccd4fefb311d2dd20b161', '[\"*\"]', '2021-03-06 13:18:23', '2021-03-06 13:18:20', '2021-03-06 13:18:23'),
(127, 'App\\Models\\Account', 1, 'Hosam', 'ffb709368c95d76d71c68a70276a042da2abc4fa0c0f04c16d9b82acc9a2be72', '[\"*\"]', '2021-03-06 13:19:47', '2021-03-06 13:19:43', '2021-03-06 13:19:47'),
(128, 'App\\Models\\Account', 1, 'Hosam', 'b0eb133e5ede7e054d183a220f0bbe15329b6fdf21a3251cb777f196501e2235', '[\"*\"]', '2021-03-06 13:20:10', '2021-03-06 13:20:08', '2021-03-06 13:20:10'),
(129, 'App\\Models\\Account', 1, 'Hosam', 'a1fbddafd3177b65f9963d25ba8a8e58f29ea26ff9b24564397f4193c0e92b4b', '[\"*\"]', '2021-03-06 13:22:24', '2021-03-06 13:22:21', '2021-03-06 13:22:24'),
(130, 'App\\Models\\Account', 1, 'Hosam', '288d3e1d00ecff7a72796055a4e18252b372563034c711dc1fdb59fa278061ab', '[\"*\"]', '2021-03-06 13:23:29', '2021-03-06 13:23:27', '2021-03-06 13:23:29'),
(131, 'App\\Models\\Account', 1, 'Hosam', '5c2a2657e5c8343810a54d0630a75c0e596b1dcbe73934520411329928f8a8a6', '[\"*\"]', '2021-03-06 13:24:42', '2021-03-06 13:24:41', '2021-03-06 13:24:42'),
(132, 'App\\Models\\Account', 1, 'Hosam', '2468236e398c585f83998f172e396a2c3433e3c0c53d19bfc1f935f4a4b5ee51', '[\"*\"]', '2021-03-06 13:26:02', '2021-03-06 13:25:59', '2021-03-06 13:26:02'),
(133, 'App\\Models\\Account', 1, 'Hosam', '270146068e133991f68d1b7f639522e0266a9f27917954d6c6211f874655cad4', '[\"*\"]', '2021-03-06 13:32:00', '2021-03-06 13:31:57', '2021-03-06 13:32:00'),
(134, 'App\\Models\\Account', 1, 'Hosam', '7372d6bd2e219e74d1e86931dd64db666ccd7d5bdcfdea036f2dc1f861edb135', '[\"*\"]', '2021-03-06 13:35:21', '2021-03-06 13:35:17', '2021-03-06 13:35:21'),
(135, 'App\\Models\\Account', 1, 'Hosam', '49f128a09e744c8dfbdfb30af4e42de99ac99549c58ffbf084d7f1cc1bb7c37f', '[\"*\"]', '2021-03-06 13:47:00', '2021-03-06 13:46:57', '2021-03-06 13:47:00'),
(136, 'App\\Models\\Account', 1, 'Hosam', 'a257f68f9f1141d32b1f45d43c82bc89e6742983ffef463730511d1e4aaea40b', '[\"*\"]', '2021-03-06 13:49:27', '2021-03-06 13:49:20', '2021-03-06 13:49:27'),
(137, 'App\\Models\\Account', 1, 'Hosam', 'a2190f43dcce4cb4cad672b3f89ea617e6a00edef0ef0ea4ca112dfd12b47930', '[\"*\"]', '2021-03-06 13:53:50', '2021-03-06 13:53:43', '2021-03-06 13:53:50'),
(138, 'App\\Models\\Account', 1, 'Hosam', '1b38774371ccbaa017d8dac63040d3cbd291481dbb9e4ab92ebfd0d7e9ce24e4', '[\"*\"]', '2021-03-06 13:54:43', '2021-03-06 13:54:32', '2021-03-06 13:54:43'),
(139, 'App\\Models\\Account', 1, 'Hosam', '07813c6f9b1409ca85dc74ad19d43ffd73efa8764b453cca40c2d8780ad5b78e', '[\"*\"]', '2021-03-06 13:55:40', '2021-03-06 13:55:36', '2021-03-06 13:55:40'),
(140, 'App\\Models\\Account', 1, 'Hosam', '76985c440c1a45c8d69e361f1fbcc485fc8e45730bfa953fe31ca0f349afe0f4', '[\"*\"]', '2021-03-06 13:58:21', '2021-03-06 13:58:15', '2021-03-06 13:58:21'),
(141, 'App\\Models\\Account', 1, 'Hosam', '105c63ace112e3da072099edf7c3e18c90b293a6ce76d5aceaaa92dd011b607f', '[\"*\"]', '2021-03-06 13:59:25', '2021-03-06 13:59:20', '2021-03-06 13:59:25'),
(142, 'App\\Models\\Account', 1, 'Hosam', 'ee9f8b97cee484f56a8bff1a284d9eb299949410a7ffc0a5c8b0ee49422a8884', '[\"*\"]', '2021-03-06 13:59:58', '2021-03-06 13:59:51', '2021-03-06 13:59:58'),
(143, 'App\\Models\\Account', 1, 'Hosam', '4d8e611547114772c28f93fb316abeb7c64c8f2cc0bd1940ff3d3314e4bcf4e6', '[\"*\"]', '2021-03-06 14:00:34', '2021-03-06 14:00:28', '2021-03-06 14:00:34'),
(144, 'App\\Models\\Account', 1, 'Hosam', '9f994fa55f0ff09effb86934b1151660ece31cc004036e785ca83d8ea48a6b5d', '[\"*\"]', '2021-03-06 14:03:02', '2021-03-06 14:02:56', '2021-03-06 14:03:02'),
(145, 'App\\Models\\Account', 1, 'Hosam', 'd0086a1fab120985d74fde027b7f77157ff79876a6d7840205f3c0b82c43b0a7', '[\"*\"]', '2021-03-06 14:03:36', '2021-03-06 14:03:32', '2021-03-06 14:03:36'),
(146, 'App\\Models\\Account', 1, 'Hosam', 'b2183c55e504d94ccc3a870de6468754153dbea2b6ed35dadb2b796f754f909a', '[\"*\"]', '2021-03-06 14:04:03', '2021-03-06 14:03:55', '2021-03-06 14:04:03'),
(147, 'App\\Models\\Account', 1, 'Hosam', '261c733cce92130d88cf4bc9c44d854cea8c2e908d1d79b22a33e0eb97dfbafa', '[\"*\"]', '2021-03-06 14:04:39', '2021-03-06 14:04:32', '2021-03-06 14:04:39'),
(148, 'App\\Models\\Account', 1, 'Hosam', 'ebd2509bfe7469175392c3e26e1695bc50d2e861995df8942910e9b369859ef7', '[\"*\"]', '2021-03-06 14:05:01', '2021-03-06 14:04:57', '2021-03-06 14:05:01'),
(149, 'App\\Models\\Account', 1, 'Hosam', 'e668329dfe84e6bd4e7d0cb29a8434838638b70f102b426a71b7fa140538e7f0', '[\"*\"]', '2021-03-06 14:06:03', '2021-03-06 14:05:59', '2021-03-06 14:06:03'),
(150, 'App\\Models\\Account', 1, 'Hosam', 'bc782b5d1cb89e937db245a257af9dcdb9857fb3507b267b93a7e3ed55de3db6', '[\"*\"]', '2021-03-06 14:07:04', '2021-03-06 14:06:55', '2021-03-06 14:07:04'),
(151, 'App\\Models\\Account', 1, 'Hosam', '523231548f2022dd5862b1d0e9fd588a4372a1f1f6a10c4b8410845adf4fa329', '[\"*\"]', '2021-03-06 14:08:46', '2021-03-06 14:08:37', '2021-03-06 14:08:46'),
(152, 'App\\Models\\Account', 1, 'Hosam', '88baeed5aee3b86cd5e6d135900a2ed080db899244b3c30fb4e38885f5a3a17c', '[\"*\"]', '2021-03-06 14:09:48', '2021-03-06 14:09:40', '2021-03-06 14:09:48'),
(153, 'App\\Models\\Account', 1, 'Hosam', '444048b834636335f649674b8d2fd05ddc7b74c873e2ac628bf63efb82060964', '[\"*\"]', '2021-03-06 14:11:19', '2021-03-06 14:11:13', '2021-03-06 14:11:19'),
(154, 'App\\Models\\Account', 1, 'Hosam', '485ac0456f1b048aec1b85ad84967fd6e2ce104c2cdbf77aba0357d4ecc903ec', '[\"*\"]', '2021-03-06 14:12:15', '2021-03-06 14:12:10', '2021-03-06 14:12:15'),
(155, 'App\\Models\\Account', 1, 'Hosam', '4490d431edad958d17aab550b65a4161d8cb40f7c58e2f767c72757705100d77', '[\"*\"]', '2021-03-06 14:13:15', '2021-03-06 14:13:11', '2021-03-06 14:13:15'),
(156, 'App\\Models\\Account', 1, 'Hosam', 'a8cb7a5546fc6715a54d04f072d23daa6b29700eae8c0f293e602f6f2b46b238', '[\"*\"]', '2021-03-06 14:16:31', '2021-03-06 14:16:26', '2021-03-06 14:16:31'),
(157, 'App\\Models\\Account', 1, 'Hosam', 'e126c35fae64a8bdba7dbce12aabc7c7d3752e88469b84fc5fef8f370a488fa5', '[\"*\"]', '2021-03-06 14:17:35', '2021-03-06 14:17:26', '2021-03-06 14:17:35'),
(158, 'App\\Models\\Account', 1, 'Hosam', '29aef1dd8a1f1b6a04a50561d0fc1a6f5e565047f827c189140f331277aa003b', '[\"*\"]', '2021-03-06 14:19:04', '2021-03-06 14:18:59', '2021-03-06 14:19:04'),
(159, 'App\\Models\\Account', 1, 'Hosam', '474720c8b43003a8df7d7ba0491ec904b0431818b5135d0976894111562fc7be', '[\"*\"]', '2021-03-06 14:19:54', '2021-03-06 14:19:47', '2021-03-06 14:19:54'),
(160, 'App\\Models\\Account', 1, 'Hosam', 'e3000de426a79ad6c2af1b8b4192fecb8190e8e9465407a92614f02182a84764', '[\"*\"]', '2021-03-06 14:20:22', '2021-03-06 14:20:17', '2021-03-06 14:20:22'),
(161, 'App\\Models\\Account', 1, 'Hosam', '5b016a65b54aded9275b442c62c0f846de812c2513f349f575e06c0ae73d5406', '[\"*\"]', '2021-03-06 14:22:45', '2021-03-06 14:22:41', '2021-03-06 14:22:45'),
(162, 'App\\Models\\Account', 1, 'xas', 'e66fb8cf3e46d99aef447d61dff4021f83ce062e335e0f95fc443b3ae5b6900a', '[\"*\"]', NULL, '2021-03-11 09:33:53', '2021-03-11 09:33:53'),
(163, 'App\\Models\\Account', 1, 'xas', '2f8ad2b2a083e78467676bb57924c630f7804f0c18ccd60498805d537ea56bfe', '[\"*\"]', '2021-03-11 09:34:09', '2021-03-11 09:33:55', '2021-03-11 09:34:09'),
(164, 'App\\Models\\Account', 1, 'xas', 'e6e511364fec2bd7fe490070afe77cfe145609f877f65e38e2cc18e6262f35ec', '[\"*\"]', '2021-03-11 10:53:08', '2021-03-11 10:53:02', '2021-03-11 10:53:08'),
(165, 'App\\Models\\Account', 1, 'xas', '87d6dcceb1518cee2f76da1ae627a8eaf52d6ad5e30db87d34adb175f21420d6', '[\"*\"]', '2021-03-11 11:05:41', '2021-03-11 11:02:45', '2021-03-11 11:05:41'),
(166, 'App\\Models\\Account', 1, 'xas', '023b41aa9d0b6febe54caae3a49309b7da24adbdf295545d4ca35aee4eb0be52', '[\"*\"]', '2021-03-11 11:06:17', '2021-03-11 11:06:12', '2021-03-11 11:06:17'),
(167, 'App\\Models\\Account', 1, 'xas', 'a5571e4c99f401f23938f73aa027dc67ed055b4bb61d53e4e5e9eff7ef67590a', '[\"*\"]', '2021-03-11 11:09:13', '2021-03-11 11:07:56', '2021-03-11 11:09:13'),
(168, 'App\\Models\\Account', 1, 'xas', '847ac1961f67e7c6f7237a851cfac7da116e5cfbd0247cd4df8a8637bc10302b', '[\"*\"]', '2021-03-11 11:10:27', '2021-03-11 11:09:47', '2021-03-11 11:10:27'),
(169, 'App\\Models\\Account', 1, 'xas', 'dc6b95f7ac41bb0651d7dd344b3c54249b03c6c564325ec3d13cc0b65572727e', '[\"*\"]', '2021-03-11 11:10:46', '2021-03-11 11:10:42', '2021-03-11 11:10:46'),
(170, 'App\\Models\\Account', 1, 'xas', '5df2a643828e7683a002335201cc6a958adc9e21d50d951435d37acd0cb6d915', '[\"*\"]', NULL, '2021-03-11 12:45:31', '2021-03-11 12:45:31'),
(171, 'App\\Models\\Account', 1, 'xas', 'd2c031770eb0d6ecec98947c44e39bbade131addaea80507fd87f99e8ff144e4', '[\"*\"]', '2021-03-11 12:47:25', '2021-03-11 12:47:15', '2021-03-11 12:47:25'),
(172, 'App\\Models\\Account', 1, 'xas', '6f6ddbb81de3eea7cc36d83df4fdf3e5832447be785a865c630a26671ca84da7', '[\"*\"]', '2021-03-11 12:52:28', '2021-03-11 12:52:22', '2021-03-11 12:52:28'),
(173, 'App\\Models\\Account', 1, 'xas', 'cf36da72c01f34fe0fc142a4030c8dc18f21f442b906fb3c2ce45736284f478c', '[\"*\"]', NULL, '2021-03-11 13:19:23', '2021-03-11 13:19:23'),
(174, 'App\\Models\\Account', 1, 'xas', 'c64270d2644757874aeacd6d8723d3c27ab28cd1b4d30f251e728be1f69e2684', '[\"*\"]', '2021-03-11 13:19:32', '2021-03-11 13:19:23', '2021-03-11 13:19:32'),
(175, 'App\\Models\\Account', 1, 'xas', '23dfbf5d0674c1d8a36a28b4a51b03b8a2c31f6430f23ded4874284d3a36b2d6', '[\"*\"]', '2021-03-11 13:25:13', '2021-03-11 13:24:40', '2021-03-11 13:25:13'),
(176, 'App\\Models\\Account', 1, 'xas', '1c323d270c61c9112e9e8a215732697db9cc9595fc454d0e21fd5ca3f0a7ec9f', '[\"*\"]', '2021-03-11 13:30:13', '2021-03-11 13:30:08', '2021-03-11 13:30:13'),
(177, 'App\\Models\\Account', 1, 'xas', '1cb3dbf695549e1a90a046c94f03bf8b3cf05e956bc6ae71131f479153420070', '[\"*\"]', '2021-03-11 13:35:16', '2021-03-11 13:35:06', '2021-03-11 13:35:16'),
(178, 'App\\Models\\Account', 1, 'xas', '08617e6d43a6b7b2bf6f2ddc78b914c907ac594a7c546b010239fe57c4fadbb4', '[\"*\"]', '2021-03-11 14:22:07', '2021-03-11 14:21:58', '2021-03-11 14:22:07'),
(179, 'App\\Models\\Account', 1, 'xas', 'f9c76f245f6ef3cb08bce41bfe4338f0fb9e625d3824b810604effcb4380891a', '[\"*\"]', '2021-03-11 14:28:00', '2021-03-11 14:27:53', '2021-03-11 14:28:00'),
(180, 'App\\Models\\Account', 1, 'xas', '4d9550029d9a69c96b2cfd3fe11c8a0ad3c8234189adb5e779468327eab836b2', '[\"*\"]', '2021-03-11 14:38:49', '2021-03-11 14:38:41', '2021-03-11 14:38:49'),
(181, 'App\\Models\\Account', 1, 'xas', '8e4c4fe61538a6c7a07453482f8828a27965e63d56329f2587d90e67e9fa2cc3', '[\"*\"]', '2021-03-12 05:55:27', '2021-03-12 05:55:19', '2021-03-12 05:55:27'),
(182, 'App\\Models\\Account', 1, 'xas', '8c7931ece47814009d3f61562fe91ab504f91dcff873a675944a18f7c6d5faa3', '[\"*\"]', '2021-03-12 06:05:08', '2021-03-12 06:04:19', '2021-03-12 06:05:08'),
(183, 'App\\Models\\Account', 1, 'xas', 'd917dbed330570bdba4ca3efc8e6c3fc2c72c2b7a8c1d2886e77a0bc43ec3608', '[\"*\"]', NULL, '2021-03-12 06:05:26', '2021-03-12 06:05:26'),
(184, 'App\\Models\\Account', 1, 'xas', '1c1e9ce98ba3893e5a1c6395face4ac31a5b90ec5653f51e275ad779e9358bf5', '[\"*\"]', '2021-03-12 06:09:28', '2021-03-12 06:06:07', '2021-03-12 06:09:28'),
(185, 'App\\Models\\Account', 1, 'xas', '3ba87aff4f38b21f0d42c0c90699736fa97110717c2a89886c3c6ed1e042fa8f', '[\"*\"]', NULL, '2021-03-12 06:10:05', '2021-03-12 06:10:05'),
(186, 'App\\Models\\Account', 1, 'xas', 'fa78f54024107c82660346fc6841639a57caf444ce4e41f8587a0928516dfb5b', '[\"*\"]', '2021-03-12 06:12:10', '2021-03-12 06:12:01', '2021-03-12 06:12:10'),
(187, 'App\\Models\\Account', 1, 'xas', 'a4441b212622064ed75224ce6cad4540a1a80df158acc59298557485cb69f654', '[\"*\"]', '2021-03-12 06:12:46', '2021-03-12 06:12:40', '2021-03-12 06:12:46'),
(188, 'App\\Models\\Account', 1, 'xas', '3128dbf5cf2f4bb3f0b6276095f911a7f1646814551067a9cf59b2ba50c7b310', '[\"*\"]', '2021-03-12 06:28:03', '2021-03-12 06:27:53', '2021-03-12 06:28:03'),
(189, 'App\\Models\\Account', 1, 'xas', '43bbb4fabb33185e7d940468bc159f929fc2d977f73522d2f29785935ecdf706', '[\"*\"]', '2021-03-12 06:56:37', '2021-03-12 06:56:32', '2021-03-12 06:56:37'),
(190, 'App\\Models\\Account', 1, 'xas', '92107ee095d5f02c66d1f98039c73b9f49b7846be690084d9bd1c581150104e8', '[\"*\"]', '2021-03-12 07:02:28', '2021-03-12 07:02:19', '2021-03-12 07:02:28'),
(191, 'App\\Models\\Account', 1, 'admin_device', '95941f2ec7ada03e491bd2d8ebef3b1a32f379044e092b8b7f2bf666adc35d70', '[\"*\"]', '2021-03-18 10:23:23', '2021-03-18 10:14:08', '2021-03-18 10:23:23'),
(192, 'App\\Models\\Account', 1, 'xas', 'a62c2504f56660fb3a667b87b84a6ff8eba801404d764f34f20a8834dcfd1c36', '[\"*\"]', '2021-03-23 06:44:05', '2021-03-23 06:43:25', '2021-03-23 06:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `questionID` int(11) NOT NULL AUTO_INCREMENT,
  `surveyID` int(11) NOT NULL,
  `choices` varchar(100) NOT NULL,
  `question` varchar(100) NOT NULL,
  PRIMARY KEY (`questionID`),
  KEY `surveyID_idx` (`surveyID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionID`, `surveyID`, `choices`, `question`) VALUES
(1, 1, 'yes, no', 'pizza'),
(2, 1, 'yes, no, maybe', 'pepsi'),
(3, 1, 'se,se,se', 'example'),
(4, 1, 'se, se, se', 'example 2');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `reporterID` int(11) NOT NULL,
  `reportedID` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  `reportID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`reportID`),
  KEY `reportedID_idx` (`reportedID`),
  KEY `reporterID` (`reporterID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`reporterID`, `reportedID`, `date`, `reason`, `message`, `reportID`) VALUES
(1, 2, '2021-02-10 17:46:21', '0', 'hacker', 1),
(1, 2, '2021-02-11 12:34:45', 'Spam or Advertisement', '.', 2),
(1, 2, '2021-02-15 14:41:28', 'Spam or Advertisement', 'zsb', 3),
(1, 2, '2021-02-15 14:42:58', 'Spam or Advertisement', 'mn', 4);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `ID` int(11) NOT NULL,
  `tournamentID` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`,`tournamentID`),
  KEY `tournamentID_idx` (`tournamentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `solotournament`
--

DROP TABLE IF EXISTS `solotournament`;
CREATE TABLE IF NOT EXISTS `solotournament` (
  `accountID` int(11) NOT NULL,
  `tournamentID` int(11) NOT NULL,
  PRIMARY KEY (`accountID`,`tournamentID`),
  KEY `accountID_idx` (`accountID`),
  KEY `tournamentID_idx` (`tournamentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `solotournament`
--

INSERT INTO `solotournament` (`accountID`, `tournamentID`) VALUES
(1, 3),
(2, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

DROP TABLE IF EXISTS `survey`;
CREATE TABLE IF NOT EXISTS `survey` (
  `surveyID` int(11) NOT NULL AUTO_INCREMENT,
  `startdate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  PRIMARY KEY (`surveyID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`surveyID`, `startdate`, `endDate`) VALUES
(1, '2021-02-18', '2021-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `teamID` int(11) NOT NULL AUTO_INCREMENT,
  `accountID` int(11) NOT NULL,
  `teamName` varchar(45) NOT NULL,
  `isCompetitive` varchar(10) NOT NULL,
  `points` int(11) DEFAULT NULL,
  `category` varchar(45) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`teamID`),
  KEY `accountID_idx` (`accountID`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`teamID`, `accountID`, `teamName`, `isCompetitive`, `points`, `category`, `image`, `description`) VALUES
(2, 1, 'noname', 'true', NULL, 'programming', NULL, NULL),
(3, 1, 'noname', 'true', NULL, 'programming', NULL, NULL),
(4, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(5, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(6, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(7, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(8, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(9, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(10, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(11, 1, 'yes no name', 'false', NULL, 'programming', 'images/1613747248.jpg', 'abc'),
(12, 1, 'noname', 'false', NULL, 'programming', NULL, NULL),
(13, 1, 'noname', 'false', NULL, 'programming', NULL, NULL),
(14, 1, 'noname', 'false', NULL, 'programming', NULL, NULL),
(15, 1, 'noname', 'false', NULL, 'programming', NULL, NULL),
(16, 1, 'noname', 'false', NULL, 'programming', NULL, NULL),
(17, 1, 'noname', 'false', NULL, 'programming', NULL, NULL),
(18, 1, 'noname', 'false', NULL, 'programming', NULL, NULL),
(19, 1, 'noname', 'false', NULL, 'programming', NULL, NULL),
(20, 1, 'noname', 'false', NULL, 'programming', NULL, NULL),
(21, 1, 'noname', 'false', NULL, 'programming', NULL, NULL),
(22, 1, 'noname', 'false', NULL, 'programming', NULL, NULL),
(23, 1, 'noname', 'false', NULL, 'programming', NULL, NULL),
(24, 1, 'noname', 'false', NULL, 'programming', NULL, NULL),
(25, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(26, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(27, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(28, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(29, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(30, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(31, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(32, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(33, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(34, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(35, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(36, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(37, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(38, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(39, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(40, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(41, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(42, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(43, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(44, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(45, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(46, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(47, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(48, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(49, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(51, 1, 'noname', 'true', NULL, 'gaming', NULL, NULL),
(52, 1, 'noname', 'true', NULL, 'gaming', NULL, NULL),
(53, 1, 'noname', 'true', NULL, 'gaming', NULL, NULL),
(54, 1, 'noname', 'true', NULL, 'gaming', NULL, NULL),
(55, 1, 'noname', 'true', NULL, 'gaming', NULL, NULL),
(56, 1, 'noname', 'true', NULL, 'gaming', NULL, NULL),
(57, 1, 'noname', 'true', NULL, 'gaming', NULL, NULL),
(58, 1, 'noname', 'true', NULL, 'gaming', NULL, NULL),
(59, 1, 'noname', 'true', NULL, 'gaming', NULL, NULL),
(60, 1, 'noname', 'true', NULL, 'gaming', NULL, NULL),
(61, 1, 'noname', 'true', NULL, 'gaming', NULL, NULL),
(67, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(68, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(69, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(70, 1, 'noname', 'true', NULL, 'football', NULL, NULL),
(71, 1, 'hgufjhfhf', 'true', NULL, 'football', NULL, 'zxz'),
(72, 2, 'noname', 'true', NULL, 'gaming', NULL, NULL),
(73, 1, 'qubitskj.bzc', 'true', NULL, 'football', NULL, 's/jb'),
(74, 1, 'qubitskj.bzc', 'true', NULL, 'football', NULL, 's/jb'),
(75, 1, 'qubitskj.bzcm,', 'true', NULL, 'football', NULL, 's/jb'),
(76, 1, 'qubitsk', 'true', NULL, 'football', NULL, 's/jb'),
(77, 1, 'aaaaaaaaaaaaaaaaaa', 'true', NULL, 'football', NULL, 'kjb'),
(78, 3, 'qubits', 'true', NULL, 'programming', NULL, 'xxxxxxxxx'),
(79, 3, 'chating team', 'false', NULL, 'football', NULL, '..........'),
(80, 3, 'chatting', 'false', NULL, 'gaming', NULL, 'xxxxxxxxx'),
(82, 1, 'team', 'true', NULL, 'football', NULL, 'kjbkj');

-- --------------------------------------------------------

--
-- Table structure for table `teammembers`
--

DROP TABLE IF EXISTS `teammembers`;
CREATE TABLE IF NOT EXISTS `teammembers` (
  `teamID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  PRIMARY KEY (`teamID`,`accountID`),
  KEY `accountID_idx` (`accountID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teammembers`
--

INSERT INTO `teammembers` (`teamID`, `accountID`) VALUES
(11, 1),
(15, 1),
(17, 1),
(18, 1),
(19, 1),
(21, 1),
(22, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(32, 1),
(33, 1),
(34, 1),
(36, 1),
(37, 1),
(38, 1),
(40, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(47, 1),
(49, 1),
(51, 1),
(53, 1),
(54, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(67, 1),
(68, 1),
(71, 1),
(71, 2),
(71, 3),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(77, 2),
(78, 1),
(78, 3),
(79, 3),
(80, 1),
(80, 3),
(82, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teamrequest`
--

DROP TABLE IF EXISTS `teamrequest`;
CREATE TABLE IF NOT EXISTS `teamrequest` (
  `accountID` int(11) NOT NULL,
  `teamID` int(11) NOT NULL,
  PRIMARY KEY (`accountID`,`teamID`),
  KEY `teamID_idx` (`teamID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

DROP TABLE IF EXISTS `tournaments`;
CREATE TABLE IF NOT EXISTS `tournaments` (
  `tournamentID` int(11) NOT NULL AUTO_INCREMENT,
  `accountID` int(11) NOT NULL,
  `category` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  `place` varchar(45) NOT NULL,
  `duration` datetime DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `isdeleted` tinyint(4) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `tournamentscol` varchar(45) DEFAULT NULL,
  `issolo` varchar(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`tournamentID`),
  KEY `accountID_idx` (`accountID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`tournamentID`, `accountID`, `category`, `time`, `place`, `duration`, `description`, `isdeleted`, `location`, `tournamentscol`, `issolo`, `title`) VALUES
(3, 2, 'gaming', '2021-02-27 11:01:39', 'online', '2021-02-28 11:01:39', 'mn ', NULL, 'nm', 'b', 'true', 'pubg'),
(5, 2, 'gaming', '2021-02-27 11:01:39', 'online', '2021-02-28 17:59:54', 'v,', NULL, 'jb', ',m b', 'false', 'dota'),
(7, 1, 'a', '0001-01-01 01:01:00', 'a', '0001-01-01 11:01:00', 'a', 0, 'a', 'a', 'true', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', 'admin123', NULL, NULL, NULL),
(3, 'staff@admin.com', 'mohammadsonji360@gmail.com', '$2y$10$7/2z6Tsayoq3rb5KoL7B8ed0YqbpSbTonTHI7MfwLqhnDkuGs5zYm', NULL, NULL, NULL),
(11, 'xyz', 'abc@admin.com', '$2y$10$azf/Y6sTJa5ewWY31d3wr.SwA6Nu.ITbWl4ndcXz3HYvNuIHKVjQO', NULL, NULL, NULL),
(12, 'xyz', 'xyz@admin.com', '$2y$10$qhNMWZyKd/u6LaFkzdRkPeVS.N.u5.uXWKR69SB0VkpQSWtpzhay6', NULL, NULL, NULL),
(13, 'admin@admin.com', 'user@staff.com', '$2y$10$USDRQWakY/twWJWKRsfnzuMisLhRv.DjKEt3BQ03M/25rCxzM2uh6', NULL, NULL, NULL),
(14, 'ad', 'ad@test.com', '$2y$10$6audtGGAB01JqkhD327uveWY/Waxu3klCuEQquRDlr/iK4mSgW.Za', NULL, NULL, NULL),
(15, 'neq', 'new@new', '$2y$10$szPc5QLWxAT3MzXEIIGGtOSp/3oVDDgzC6tL1.aZiLm7u2eUBmFQe', NULL, NULL, NULL),
(16, 'new', 'new2@new', '$2y$10$HmfmhKmjK0oBVNdN9zsUzus/csRrmgd6IB2eqMlNgx5icXk7pmGgm', NULL, NULL, NULL),
(17, 'newfour', 'new4@new', '$2y$10$uUAn443ZMCA.6d1rUF6dDeaUA7CMY7jyyYwmOqplcKjr699nFww8C', NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`questionID`) REFERENCES `questions` (`questionID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `nonsolotournament`
--
ALTER TABLE `nonsolotournament`
  ADD CONSTRAINT `nonsolotournament_ibfk_1` FOREIGN KEY (`tournamentID`) REFERENCES `tournaments` (`tournamentID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `nonsolotournament_ibfk_2` FOREIGN KEY (`accountID`) REFERENCES `team` (`teamID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`) ON DELETE CASCADE;

--
-- Constraints for table `participateevent`
--
ALTER TABLE `participateevent`
  ADD CONSTRAINT `participateevent_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `participateevent_ibfk_2` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`surveyID`) REFERENCES `survey` (`surveyID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`reportedID`) REFERENCES `account` (`accountID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`reporterID`) REFERENCES `account` (`accountID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`tournamentID`) REFERENCES `tournaments` (`tournamentID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `account` (`accountID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `result_ibfk_3` FOREIGN KEY (`ID`) REFERENCES `team` (`teamID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `solotournament`
--
ALTER TABLE `solotournament`
  ADD CONSTRAINT `solotournament_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `solotournament_ibfk_2` FOREIGN KEY (`tournamentID`) REFERENCES `tournaments` (`tournamentID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `teammembers`
--
ALTER TABLE `teammembers`
  ADD CONSTRAINT `teammembers_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `teammembers_ibfk_2` FOREIGN KEY (`teamID`) REFERENCES `team` (`teamID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `teamrequest`
--
ALTER TABLE `teamrequest`
  ADD CONSTRAINT `teamrequest_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `teamrequest_ibfk_2` FOREIGN KEY (`teamID`) REFERENCES `team` (`teamID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD CONSTRAINT `tournaments_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
