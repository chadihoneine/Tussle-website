-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 11:18 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `account` (
  `accountID` int(11) NOT NULL,
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
  `about` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountID`, `type`, `email`, `password`, `country`, `creationDate`, `bOD`, `gender`, `ban`, `username`, `image`, `f_name`, `l_name`, `city`, `about`) VALUES
(1, 1, 'admin@admin.com', 'admin', 'Lebanon', NULL, '1998-01-01', 'male', NULL, 'admin', 0x696d616765732f313631323933373433332e706e67, 'Mohammad', 'Sonji', 'beirut', NULL),
(2, 1, 'ms@admin.com', 'admin', 'Lebanon', NULL, '1998-01-01', 'male', NULL, 'MS', 0x696d616765732f313631333431313031312e6a7067, 'Mohammad', 'Sonji', 'beirut', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `accountID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `answerValue` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `time` datetime DEFAULT NULL,
  `place` varchar(45) DEFAULT NULL,
  `duration` datetime DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `title` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(72, 1, '2022-02-02 04:05:00', 'x', NULL, 'x', 'x', 'x');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `accountID` int(11) NOT NULL,
  `category` varchar(45) NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nonsolotournament`
--

CREATE TABLE `nonsolotournament` (
  `tournamentID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nonsolotournament`
--

INSERT INTO `nonsolotournament` (`tournamentID`, `accountID`) VALUES
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `participateevent`
--

CREATE TABLE `participateevent` (
  `accountID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL
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
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(2, 63),
(2, 65),
(2, 66),
(2, 68);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionID` int(11) NOT NULL,
  `surveyID` int(11) NOT NULL,
  `choices` varchar(100) NOT NULL,
  `question` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `reporterID` int(11) NOT NULL,
  `reportedID` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  `reportID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `result` (
  `ID` int(11) NOT NULL,
  `tournamentID` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `solotournament`
--

CREATE TABLE `solotournament` (
  `accountID` int(11) NOT NULL,
  `tournamentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `solotournament`
--

INSERT INTO `solotournament` (`accountID`, `tournamentID`) VALUES
(1, 3),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `surveyID` int(11) NOT NULL,
  `startdate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `teamID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `teamName` varchar(45) NOT NULL,
  `isCompetitive` varchar(10) NOT NULL,
  `points` int(11) DEFAULT NULL,
  `category` varchar(45) NOT NULL,
  `image` longblob DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(11, 1, 'no name', 'false', NULL, 'programming', NULL, 'xxx'),
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
(71, 1, 'noname', 'true', NULL, 'football', NULL, 'zxz'),
(72, 2, 'noname', 'true', NULL, 'gaming', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teammembers`
--

CREATE TABLE `teammembers` (
  `teamID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL
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
(72, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teamrequest`
--

CREATE TABLE `teamrequest` (
  `accountID` int(11) NOT NULL,
  `teamID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `tournamentID` int(11) NOT NULL,
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
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`tournamentID`, `accountID`, `category`, `time`, `place`, `duration`, `description`, `isdeleted`, `location`, `tournamentscol`, `issolo`, `title`) VALUES
(3, 2, 'gaming', '2021-02-27 11:01:39', 'online', '2021-02-28 11:01:39', 'mn ', NULL, 'nm', 'b', 'true', 'pubg'),
(4, 2, 'gaming', '2021-02-27 11:01:39', 'online', '2021-02-28 11:01:39', 'dota', NULL, NULL, NULL, 'false', 'dota');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountID`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`accountID`,`questionID`),
  ADD KEY `questionID_idx` (`questionID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `accoutID_idx` (`accountID`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`accountID`,`category`);

--
-- Indexes for table `nonsolotournament`
--
ALTER TABLE `nonsolotournament`
  ADD PRIMARY KEY (`tournamentID`,`accountID`),
  ADD KEY `accountID_idx` (`accountID`);

--
-- Indexes for table `participateevent`
--
ALTER TABLE `participateevent`
  ADD PRIMARY KEY (`accountID`,`eventID`),
  ADD KEY `eventID_idx` (`eventID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionID`),
  ADD KEY `surveyID_idx` (`surveyID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `reportedID_idx` (`reportedID`),
  ADD KEY `reporterID` (`reporterID`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`ID`,`tournamentID`),
  ADD KEY `tournamentID_idx` (`tournamentID`);

--
-- Indexes for table `solotournament`
--
ALTER TABLE `solotournament`
  ADD PRIMARY KEY (`accountID`,`tournamentID`),
  ADD KEY `accountID_idx` (`accountID`),
  ADD KEY `tournamentID_idx` (`tournamentID`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`surveyID`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`teamID`),
  ADD KEY `accountID_idx` (`accountID`);

--
-- Indexes for table `teammembers`
--
ALTER TABLE `teammembers`
  ADD PRIMARY KEY (`teamID`,`accountID`),
  ADD KEY `accountID_idx` (`accountID`);

--
-- Indexes for table `teamrequest`
--
ALTER TABLE `teamrequest`
  ADD PRIMARY KEY (`accountID`,`teamID`),
  ADD KEY `teamID_idx` (`teamID`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`tournamentID`),
  ADD KEY `accountID_idx` (`accountID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `surveyID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `teamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `tournamentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `level`
--
ALTER TABLE `level`
  ADD CONSTRAINT `level_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `nonsolotournament`
--
ALTER TABLE `nonsolotournament`
  ADD CONSTRAINT `nonsolotournament_ibfk_1` FOREIGN KEY (`tournamentID`) REFERENCES `tournaments` (`tournamentID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `nonsolotournament_ibfk_2` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`) ON DELETE CASCADE ON UPDATE NO ACTION;

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
