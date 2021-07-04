-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2021 at 04:38 PM
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
  `image` varchar(100) DEFAULT NULL,
  `f_name` varchar(45) DEFAULT NULL,
  `l_name` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `about` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountID`, `type`, `email`, `password`, `country`, `creationDate`, `bOD`, `gender`, `ban`, `username`, `image`, `f_name`, `l_name`, `city`, `about`) VALUES
(1, 1, 'admin@admin.com', 'admin', 'Lebanon', NULL, '1998-01-01', 'male', NULL, 'admin', NULL, 'Mohammad', 'Sonji', 'beirut', NULL),
(2, 1, 'ms@admin.com', 'admin', 'Lebanon', NULL, '1998-01-01', 'male', NULL, 'MS', 'images/1612703183.jpg', 'Mohammad', 'Sonji', 'beirut', NULL);

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
(3, 1, '2022-12-12 15:30:00', 'online', NULL, 'dota tournament', NULL, 'dota'),
(4, 1, '2022-12-12 15:30:00', 'online', NULL, 'dota tournament', NULL, 'dota'),
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
(57, 2, '2021-04-12 15:15:00', 'online', NULL, '.', NULL, 'mobile legends');

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
-- Table structure for table `participateevent`
--

CREATE TABLE `participateevent` (
  `accountID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `participatetournament`
--

CREATE TABLE `participatetournament` (
  `groupID` int(11) NOT NULL,
  `teamID` int(11) NOT NULL,
  `issolo` tinyint(4) NOT NULL,
  `accountID` int(11) NOT NULL,
  `tournamentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionID` int(11) NOT NULL,
  `surveyID` int(11) NOT NULL,
  `choice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `groupID` int(11) NOT NULL,
  `tournamentID` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `isCompetitive` tinyint(4) NOT NULL,
  `points` int(11) DEFAULT NULL,
  `category` varchar(45) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teammembers`
--

CREATE TABLE `teammembers` (
  `teamID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `title` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `participateevent`
--
ALTER TABLE `participateevent`
  ADD PRIMARY KEY (`accountID`,`eventID`),
  ADD KEY `eventID_idx` (`eventID`);

--
-- Indexes for table `participatetournament`
--
ALTER TABLE `participatetournament`
  ADD PRIMARY KEY (`groupID`,`teamID`),
  ADD KEY `teamID_idx` (`teamID`),
  ADD KEY `accountID_idx` (`accountID`),
  ADD KEY `tournamentID_idx` (`tournamentID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionID`),
  ADD KEY `surveyID_idx` (`surveyID`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`groupID`,`tournamentID`),
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
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `surveyID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `teamID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `tournamentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`questionID`) REFERENCES `questions` (`questionID`),
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`);

--
-- Constraints for table `level`
--
ALTER TABLE `level`
  ADD CONSTRAINT `level_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`);

--
-- Constraints for table `participateevent`
--
ALTER TABLE `participateevent`
  ADD CONSTRAINT `participateevent_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`) ON DELETE CASCADE,
  ADD CONSTRAINT `participateevent_ibfk_2` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`) ON DELETE CASCADE;

--
-- Constraints for table `participatetournament`
--
ALTER TABLE `participatetournament`
  ADD CONSTRAINT `participatetournament_ibfk_1` FOREIGN KEY (`teamID`) REFERENCES `team` (`teamID`),
  ADD CONSTRAINT `participatetournament_ibfk_2` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`),
  ADD CONSTRAINT `participatetournament_ibfk_3` FOREIGN KEY (`tournamentID`) REFERENCES `tournaments` (`tournamentID`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`surveyID`) REFERENCES `survey` (`surveyID`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`tournamentID`) REFERENCES `tournaments` (`tournamentID`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`);

--
-- Constraints for table `teammembers`
--
ALTER TABLE `teammembers`
  ADD CONSTRAINT `teammembers_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`),
  ADD CONSTRAINT `teammembers_ibfk_2` FOREIGN KEY (`teamID`) REFERENCES `team` (`teamID`);

--
-- Constraints for table `teamrequest`
--
ALTER TABLE `teamrequest`
  ADD CONSTRAINT `teamrequest_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`),
  ADD CONSTRAINT `teamrequest_ibfk_2` FOREIGN KEY (`teamID`) REFERENCES `team` (`teamID`);

--
-- Constraints for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD CONSTRAINT `tournaments_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
