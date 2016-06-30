-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2016 at 06:19 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `musico`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_control_list`
--

CREATE TABLE IF NOT EXISTS `access_control_list` (
`ID` int(11) NOT NULL,
  `module_ID` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
`ID` int(10) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(70) DEFAULT NULL,
  `account_type_ID` int(10) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 - active, 2 - draft, 3 - deactivated, 4 -delete'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ID`, `username`, `password`, `account_type_ID`, `status`) VALUES
(1, 'JuanCruz', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `account_information`
--

CREATE TABLE IF NOT EXISTS `account_information` (
`ID` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email_address` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `account_information`
--

INSERT INTO `account_information` (`ID`, `account_ID`, `first_name`, `middle_name`, `last_name`, `email_address`, `country`) VALUES
(1, 1, 'Juan', 'Dela', 'Cruz', 'plenosjohn@yahoo.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account_photo`
--

CREATE TABLE IF NOT EXISTS `account_photo` (
`ID` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL,
  `file_uploaded_ID` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1 - profile, 2 - cover',
  `status` int(11) NOT NULL COMMENT '1 - active, 2 - not active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE IF NOT EXISTS `account_type` (
`ID` int(10) NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`ID`, `description`) VALUES
(1, 'developer'),
(2, 'visitor'),
(3, 'user'),
(4, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `action_log`
--

CREATE TABLE IF NOT EXISTS `action_log` (
`ID` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL,
  `api_controller_ID` int(11) NOT NULL,
  `access_number_ID` int(11) NOT NULL,
  `detail` text NOT NULL,
  `datetime` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `action_log`
--

INSERT INTO `action_log` (`ID`, `account_ID`, `api_controller_ID`, `access_number_ID`, `detail`, `datetime`) VALUES
(4, 0, 9, 1, '8', 1467255511),
(5, 0, 9, 1, '10', 1467256541),
(6, 0, 9, 1, '11', 1467256546),
(7, 0, 9, 1, '12', 1467256547),
(8, 0, 9, 1, '13', 1467256548),
(9, 0, 9, 1, '1', 1467257580),
(10, 0, 9, 2, '[]', 1467258527),
(11, 0, 9, 2, '{"condition":{"first_name":"john"}}', 1467259650),
(12, 0, 9, 2, '{"condition":{"first_name":"john"}}', 1467259681),
(13, 0, 9, 2, '{"condition":{"first_name":"john"}}', 1467259719),
(14, 0, 9, 2, '{"condition":{"first_name":"john"}}', 1467259748),
(15, 0, 9, 2, '{"condition":{"first_name":"john"}}', 1467259887),
(16, 0, 9, 2, '{"condition":{"first_name":"john"}}', 1467259899),
(17, 0, 9, 2, '{"condition":{"first_name":"john"}}', 1467259910),
(18, 0, 9, 2, '{"condition":{"first_name":"john"}}', 1467259927),
(19, 0, 9, 2, '{"condition":{"first_name":"john"}}', 1467259935),
(20, 0, 9, 2, '{"condition":{"first_name":"john"}}', 1467259942),
(21, 0, 9, 2, '{"condition":{"first_name":"john"}}', 1467259950),
(22, 0, 9, 2, '{"condition":{"first_name":"john"}}', 1467259962),
(23, 0, 9, 2, '{"condition":{"first_name":"john"}}', 1467260030),
(24, 0, 9, 2, '{"condition":{"account_information__first_name":"juan"}}', 1467260106),
(25, 0, 9, 2, '{"condition":{"like__account_information__first_name":"jua"}}', 1467260117);

-- --------------------------------------------------------

--
-- Table structure for table `api_controller`
--

CREATE TABLE IF NOT EXISTS `api_controller` (
`ID` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `api_controller`
--

INSERT INTO `api_controller` (`ID`, `description`) VALUES
(1, 'C_account');

-- --------------------------------------------------------

--
-- Table structure for table `file_uploaded`
--

CREATE TABLE IF NOT EXISTS `file_uploaded` (
`ID` int(11) NOT NULL,
  `description` text NOT NULL,
  `file_type` varchar(20) NOT NULL,
  `path` text NOT NULL,
  `size` double NOT NULL,
  `datetime` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `group_access_control_list`
--

CREATE TABLE IF NOT EXISTS `group_access_control_list` (
`ID` int(11) NOT NULL,
  `module_ID` int(11) NOT NULL,
  `group_ID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `group_access_control_list`
--

INSERT INTO `group_access_control_list` (`ID`, `module_ID`, `group_ID`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
`ID` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `parent_ID` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`ID`, `description`, `parent_ID`, `link`) VALUES
(1, 'Home Page', 0, ''),
(2, 'Browsing Page', 0, ''),
(3, 'Profile', 0, ''),
(4, 'Admin', 0, ''),
(5, 'Registration', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `module_api_controller`
--

CREATE TABLE IF NOT EXISTS `module_api_controller` (
`ID` int(11) NOT NULL,
  `module_ID` int(11) NOT NULL,
  `api_controller_ID` int(11) NOT NULL,
  `privilege_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='foreign for module' AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_control_list`
--
ALTER TABLE `access_control_list`
 ADD PRIMARY KEY (`ID`), ADD KEY `access_control_list_account_ID` (`account_ID`), ADD KEY `access_control_list_module_ID` (`module_ID`);

--
-- Indexes for table `account`
--
ALTER TABLE `account`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `username` (`username`), ADD KEY `account_account_type_ID_idx` (`account_type_ID`);

--
-- Indexes for table `account_information`
--
ALTER TABLE `account_information`
 ADD PRIMARY KEY (`ID`,`account_ID`), ADD KEY `abiai` (`account_ID`);

--
-- Indexes for table `account_photo`
--
ALTER TABLE `account_photo`
 ADD PRIMARY KEY (`ID`), ADD KEY `account_photo_account_ID` (`account_ID`), ADD KEY `file_uploaded_ID` (`file_uploaded_ID`);

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `action_log`
--
ALTER TABLE `action_log`
 ADD PRIMARY KEY (`ID`), ADD KEY `api_controller_ID` (`api_controller_ID`,`access_number_ID`), ADD KEY `account_ID` (`account_ID`);

--
-- Indexes for table `api_controller`
--
ALTER TABLE `api_controller`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `file_uploaded`
--
ALTER TABLE `file_uploaded`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `group_access_control_list`
--
ALTER TABLE `group_access_control_list`
 ADD PRIMARY KEY (`ID`), ADD KEY `group_access_control_list_module_ID_idx` (`module_ID`), ADD KEY `group_access_control_list_group_ID_idx` (`group_ID`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `module_api_controller`
--
ALTER TABLE `module_api_controller`
 ADD PRIMARY KEY (`ID`), ADD KEY `module_api_controller_module_ID` (`module_ID`), ADD KEY `module_api_controller_api_controller_ID` (`api_controller_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_control_list`
--
ALTER TABLE `access_control_list`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `account_information`
--
ALTER TABLE `account_information`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `account_photo`
--
ALTER TABLE `account_photo`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `action_log`
--
ALTER TABLE `action_log`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `api_controller`
--
ALTER TABLE `api_controller`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `file_uploaded`
--
ALTER TABLE `file_uploaded`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `group_access_control_list`
--
ALTER TABLE `group_access_control_list`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `module_api_controller`
--
ALTER TABLE `module_api_controller`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_control_list`
--
ALTER TABLE `access_control_list`
ADD CONSTRAINT `access_control_list_account_ID` FOREIGN KEY (`account_ID`) REFERENCES `account` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `access_control_list_module_ID` FOREIGN KEY (`module_ID`) REFERENCES `module` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `account`
--
ALTER TABLE `account`
ADD CONSTRAINT `account_at_type_ID` FOREIGN KEY (`account_type_ID`) REFERENCES `account_type` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `account_information`
--
ALTER TABLE `account_information`
ADD CONSTRAINT `acco_basi_info` FOREIGN KEY (`account_ID`) REFERENCES `account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `account_photo`
--
ALTER TABLE `account_photo`
ADD CONSTRAINT `account_photo_ibfk_1` FOREIGN KEY (`account_ID`) REFERENCES `account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `account_photo_ibfk_2` FOREIGN KEY (`file_uploaded_ID`) REFERENCES `file_uploaded` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_access_control_list`
--
ALTER TABLE `group_access_control_list`
ADD CONSTRAINT `group_access_control_list_group_ID` FOREIGN KEY (`group_ID`) REFERENCES `account_type` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `group_access_control_list_module_ID` FOREIGN KEY (`module_ID`) REFERENCES `module` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `module_api_controller`
--
ALTER TABLE `module_api_controller`
ADD CONSTRAINT `module_api_controler_api_controller_ID` FOREIGN KEY (`api_controller_ID`) REFERENCES `api_controller` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `module_api_controller_module_ID` FOREIGN KEY (`module_ID`) REFERENCES `module` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
