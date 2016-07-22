-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2016 at 05:45 PM
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
  `file_uploaded_ID` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL COMMENT '1 - profile, 2 - cover',
  `status` int(11) NOT NULL COMMENT '1 - active, 2 - not active'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `account_photo`
--

INSERT INTO `account_photo` (`ID`, `account_ID`, `file_uploaded_ID`, `type`, `status`) VALUES
(4, 1, NULL, 1, 1),
(5, 1, 2, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=377 ;

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
(25, 0, 9, 2, '{"condition":{"like__account_information__first_name":"jua"}}', 1467260117),
(26, 0, 1, 1, '5', 1467472180),
(27, 0, 1, 2, '{"account_ID":"1","type":"1"}', 1467473118),
(28, 0, 1, 1, '17', 1467791783),
(29, 0, 1, 1, '18', 1467792662),
(30, 0, 1, 1, '19', 1467792673),
(31, 0, 1, 1, '20', 1467792679),
(32, 0, 1, 1, '22', 1467792758),
(33, 0, 1, 1, '22', 1467792758),
(34, 0, 1, 1, '23', 1467792774),
(35, 0, 1, 1, '23', 1467792774),
(36, 0, 1, 1, '24', 1467792916),
(37, 0, 1, 1, '24', 1467792916),
(38, 0, 1, 1, '25', 1467792923),
(39, 0, 1, 1, '26', 1467792940),
(40, 0, 1, 1, '26', 1467792940),
(41, 0, 1, 1, '27', 1467792951),
(42, 0, 1, 1, '27', 1467792951),
(43, 0, 1, 2, '[]', 1468849125),
(44, 0, 1, 2, '[]', 1468849163),
(45, 0, 1, 2, '[]', 1468849187),
(46, 0, 1, 2, '[]', 1468849193),
(47, 0, 1, 2, '[]', 1468849222),
(48, 0, 1, 2, '[]', 1468849242),
(49, 0, 1, 2, '[]', 1468849253),
(50, 0, 1, 2, '[]', 1468849275),
(51, 0, 1, 2, '[]', 1468849281),
(52, 0, 1, 2, '[]', 1468849325),
(53, 0, 1, 2, '[]', 1468851306),
(54, 0, 1, 2, '[]', 1468851352),
(55, 0, 1, 2, '[]', 1468851377),
(56, 0, 1, 2, '[]', 1468851430),
(57, 0, 1, 2, '[]', 1468851489),
(58, 0, 1, 2, '[]', 1468851683),
(59, 0, 1, 2, '[]', 1468851699),
(60, 0, 1, 2, '[]', 1468851717),
(61, 0, 1, 2, '[]', 1468851767),
(62, 0, 1, 2, '[]', 1468852879),
(63, 0, 1, 2, '[]', 1468853142),
(64, 0, 1, 2, '[]', 1468853226),
(65, 0, 1, 2, '[]', 1468853228),
(66, 0, 1, 2, '[]', 1468853240),
(67, 0, 1, 2, '[]', 1468854211),
(68, 0, 1, 2, '[]', 1468854222),
(69, 0, 1, 2, '[]', 1468861490),
(70, 0, 1, 2, '[]', 1468861875),
(71, 0, 1, 2, '[]', 1468861960),
(72, 0, 1, 2, '[]', 1468861984),
(73, 0, 1, 2, '[]', 1468862267),
(74, 0, 1, 2, '[]', 1468862290),
(75, 0, 1, 2, '[]', 1468862372),
(76, 0, 1, 2, '[]', 1468862662),
(77, 0, 1, 2, '[]', 1468862676),
(78, 0, 1, 2, '[]', 1468862715),
(79, 0, 1, 2, '[]', 1468862729),
(80, 0, 1, 2, '[]', 1468862862),
(81, 0, 1, 2, '[]', 1468862877),
(82, 0, 1, 2, '[]', 1468862896),
(83, 0, 1, 2, '[]', 1468862907),
(84, 0, 1, 2, '[]', 1468862940),
(85, 0, 1, 2, '[]', 1468863456),
(86, 0, 1, 2, '[]', 1468863489),
(87, 0, 1, 2, '[]', 1468863510),
(88, 0, 1, 2, '[]', 1468863551),
(89, 0, 1, 2, '[]', 1468863649),
(90, 0, 1, 2, '[]', 1468863657),
(91, 0, 1, 2, '[]', 1468863663),
(92, 0, 1, 2, '[]', 1468863671),
(93, 0, 1, 2, '[]', 1468864152),
(94, 0, 1, 2, '[]', 1468864173),
(95, 0, 1, 2, '[]', 1468928630),
(96, 0, 1, 2, '[]', 1468930182),
(97, 0, 1, 2, '[]', 1468930870),
(98, 0, 1, 2, '[]', 1468931237),
(99, 0, 1, 2, '[]', 1468931275),
(100, 0, 1, 2, '[]', 1468931846),
(101, 0, 1, 2, '[]', 1468931966),
(102, 0, 1, 2, '[]', 1468931975),
(103, 0, 1, 2, '[]', 1468931993),
(104, 0, 1, 2, '[]', 1468932230),
(105, 0, 1, 2, '[]', 1468932250),
(106, 0, 1, 2, '[]', 1468932279),
(107, 0, 1, 2, '[]', 1468932336),
(108, 0, 1, 2, '{"password":""}', 1468932445),
(109, 0, 1, 2, '{"password":""}', 1468932810),
(110, 0, 1, 2, '{"password":""}', 1468932829),
(111, 0, 1, 2, '{"password":"","category__description":"[object Object]"}', 1468932830),
(112, 0, 1, 2, '{"password":"","category__description":"[object Object]"}', 1468932832),
(113, 0, 1, 2, '{"password":""}', 1468932833),
(114, 0, 1, 2, '{"password":"","category__description":"[object Object]"}', 1468932834),
(115, 0, 1, 2, '{"password":"","category__description":"[object Object]"}', 1468932834),
(116, 0, 1, 2, '{"password":""}', 1468932834),
(117, 0, 1, 2, '{"password":"","category__description":"[object Object]"}', 1468932834),
(118, 0, 1, 2, '{"password":"","category__description":"[object Object]"}', 1468932835),
(119, 0, 1, 2, '{"password":""}', 1468932835),
(120, 0, 1, 2, '{"password":"","category__description":"[object Object]"}', 1468932835),
(121, 0, 1, 2, '{"password":"","category__description":"[object Object]"}', 1468932835),
(122, 0, 1, 2, '{"password":"","category__description":"[object Object]","category__parent_ID":"[object Object]"}', 1468932836),
(123, 0, 1, 2, '{"password":"","category__description":"[object Object]","category__parent_ID":"[object Object]"}', 1468932837),
(124, 0, 1, 2, '{"password":"","category__description":"[object Object]"}', 1468932837),
(125, 0, 1, 2, '{"password":"","category__description":"[object Object]","category__parent_ID":"[object Object]"}', 1468932837),
(126, 0, 1, 2, '{"password":"","category__parent_ID":"[object Object]"}', 1468932838),
(127, 0, 1, 2, '{"password":"","category__parent_ID":"[object Object]","category__description":"[object Object]"}', 1468932839),
(128, 0, 1, 2, '{"password":""}', 1468932850),
(129, 0, 1, 2, '{"password":"","category__description":"[object Object]"}', 1468932851),
(130, 0, 1, 2, '{"password":"","category__description":"[object Object]"}', 1468932852),
(131, 0, 1, 2, '{"password":""}', 1468932919),
(132, 0, 1, 2, '{"password":""}', 1468932963),
(133, 0, 1, 2, '{"password":""}', 1468936102),
(134, 0, 1, 2, '{"password":""}', 1468936108),
(135, 0, 1, 2, '{"password":""}', 1468936166),
(136, 0, 1, 2, '{"password":"","sort":{"video_category__description":"asc"}}', 1468936167),
(137, 0, 1, 2, '{"password":"","sort":{"video_category__description":"desc"}}', 1468936168),
(138, 0, 1, 2, '{"password":""}', 1468936169),
(139, 0, 1, 2, '{"password":"","sort":{"video_category__description":"asc"}}', 1468936170),
(140, 0, 1, 2, '{"password":"","sort":{"video_category__description":"desc"}}', 1468936172),
(141, 0, 1, 2, '{"password":""}', 1468936173),
(142, 0, 1, 2, '{"password":"","sort":{"video_category__description":"asc"}}', 1468936313),
(143, 0, 1, 2, '{"password":"","sort":{"video_category__description":"desc"}}', 1468936313),
(144, 0, 1, 2, '{"password":""}', 1468937105),
(145, 0, 1, 2, '{"password":""}', 1468937141),
(146, 0, 1, 2, '{"password":""}', 1468937152),
(147, 0, 1, 2, '{"password":""}', 1468937180),
(148, 0, 1, 2, '{"password":""}', 1468937199),
(149, 0, 1, 2, '{"password":""}', 1468937207),
(150, 0, 1, 2, '{"password":""}', 1468937215),
(151, 0, 1, 2, '[]', 1468995341),
(152, 0, 1, 2, '[]', 1468995933),
(153, 0, 1, 2, '[]', 1468996052),
(154, 0, 1, 2, '[]', 1468996082),
(155, 0, 1, 2, '[]', 1468996099),
(156, 0, 1, 2, '[]', 1468996150),
(157, 0, 1, 2, '[]', 1468996198),
(158, 0, 1, 2, '[]', 1468996270),
(159, 0, 1, 2, '[]', 1468996271),
(160, 0, 1, 2, '[]', 1468996274),
(161, 0, 1, 2, '[]', 1469000264),
(162, 0, 1, 2, '{"result_limit":""}', 1469003713),
(163, 0, 1, 2, '{"result_limit":""}', 1469004173),
(164, 0, 1, 2, '{"result_limit":"5"}', 1469004209),
(165, 0, 1, 2, '{"result_limit":"5"}', 1469004348),
(166, 0, 1, 2, '{"result_limit":"5"}', 1469004372),
(167, 0, 1, 2, '{"result_limit":"5"}', 1469004395),
(168, 0, 1, 2, '{"result_limit":"5"}', 1469004445),
(169, 0, 1, 2, '{"result_limit":"5"}', 1469004685),
(170, 0, 1, 2, '{"result_limit":"5"}', 1469004688),
(171, 0, 1, 2, '{"result_limit":"5"}', 1469004692),
(172, 0, 1, 2, '{"result_limit":"5"}', 1469004695),
(173, 0, 1, 2, '{"result_limit":"5"}', 1469004901),
(174, 0, 1, 2, '{"result_limit":"5"}', 1469004918),
(175, 0, 1, 2, '{"result_limit":"5"}', 1469004944),
(176, 0, 1, 2, '{"result_limit":"5"}', 1469004956),
(177, 0, 1, 2, '{"result_limit":"5"}', 1469004972),
(178, 0, 1, 2, '{"result_limit":"5"}', 1469005050),
(179, 0, 1, 2, '{"result_limit":"5"}', 1469005068),
(180, 0, 1, 2, '{"result_limit":"5"}', 1469005113),
(181, 0, 1, 2, '{"result_limit":"5"}', 1469005120),
(182, 0, 1, 2, '{"result_limit":"5"}', 1469005130),
(183, 0, 1, 2, '{"result_limit":"5"}', 1469005138),
(184, 0, 1, 2, '{"result_limit":"5"}', 1469005156),
(185, 0, 1, 2, '{"result_limit":"5"}', 1469005159),
(186, 0, 1, 2, '{"result_limit":"5"}', 1469005171),
(187, 0, 1, 2, '{"result_limit":"5"}', 1469005182),
(188, 0, 1, 2, '{"result_limit":"5"}', 1469005197),
(189, 0, 1, 2, '{"result_limit":"5"}', 1469005262),
(190, 0, 1, 2, '{"result_limit":"5"}', 1469005492),
(191, 0, 1, 2, '{"result_limit":"5"}', 1469005553),
(192, 0, 1, 2, '{"result_limit":"5"}', 1469005559),
(193, 0, 1, 2, '{"result_limit":"5"}', 1469005727),
(194, 0, 1, 2, '{"result_limit":"5"}', 1469005735),
(195, 0, 1, 2, '{"result_limit":"5"}', 1469005740),
(196, 0, 1, 2, '{"result_limit":"5"}', 1469005753),
(197, 0, 1, 2, '{"result_limit":"5"}', 1469005766),
(198, 0, 1, 2, '{"result_limit":"5"}', 1469005780),
(199, 0, 1, 2, '{"result_limit":"5"}', 1469005782),
(200, 0, 1, 2, '{"result_limit":"5"}', 1469005891),
(201, 0, 1, 2, '{"result_limit":"5"}', 1469005920),
(202, 0, 1, 2, '{"result_limit":"5"}', 1469005969),
(203, 0, 1, 2, '{"result_limit":"5"}', 1469005976),
(204, 0, 1, 2, '{"result_limit":"5"}', 1469006015),
(205, 0, 1, 2, '{"result_limit":"5"}', 1469006128),
(206, 0, 1, 2, '{"result_limit":"5"}', 1469006159),
(207, 0, 1, 2, '{"result_limit":"5"}', 1469006227),
(208, 0, 1, 2, '{"result_limit":"5"}', 1469006233),
(209, 0, 1, 2, '{"result_limit":"5"}', 1469006238),
(210, 0, 1, 2, '{"result_limit":"5"}', 1469006497),
(211, 0, 1, 2, '{"result_limit":"5"}', 1469006502),
(212, 0, 1, 2, '{"result_limit":"5"}', 1469006515),
(213, 0, 1, 2, '{"result_limit":"5"}', 1469006960),
(214, 0, 1, 2, '{"result_limit":"5"}', 1469006987),
(215, 0, 1, 2, '{"result_limit":"5"}', 1469007010),
(216, 0, 1, 2, '{"result_limit":"5"}', 1469011209),
(217, 0, 1, 2, '{"result_limit":"5"}', 1469011237),
(218, 0, 1, 2, '{"result_limit":"5"}', 1469011245),
(219, 0, 1, 2, '{"result_limit":"5"}', 1469011287),
(220, 0, 1, 2, '{"result_limit":"5"}', 1469011309),
(221, 0, 1, 2, '{"result_limit":"5"}', 1469011368),
(222, 0, 1, 2, '{"result_limit":"5"}', 1469011375),
(223, 0, 1, 2, '{"result_limit":"5"}', 1469011733),
(224, 0, 1, 2, '{"result_limit":"5"}', 1469011765),
(225, 0, 1, 2, '{"result_limit":"5"}', 1469011794),
(226, 0, 1, 2, '{"result_limit":"5"}', 1469011801),
(227, 0, 1, 2, '{"result_limit":"5"}', 1469011804),
(228, 0, 1, 2, '{"result_limit":"5"}', 1469011808),
(229, 0, 1, 2, '{"result_limit":"5"}', 1469011811),
(230, 0, 1, 2, '{"result_limit":"5"}', 1469011819),
(231, 0, 1, 2, '{"result_limit":"5"}', 1469011827),
(232, 0, 1, 2, '{"result_limit":"5"}', 1469011836),
(233, 0, 1, 2, '{"result_limit":"5"}', 1469011840),
(234, 0, 1, 2, '{"result_limit":"5"}', 1469011845),
(235, 0, 1, 2, '{"result_limit":"5"}', 1469011930),
(236, 0, 1, 2, '{"result_limit":"5"}', 1469011942),
(237, 0, 1, 2, '{"result_limit":"5"}', 1469011949),
(238, 0, 1, 2, '{"result_limit":"5"}', 1469011956),
(239, 0, 1, 2, '{"result_limit":"5"}', 1469011964),
(240, 0, 1, 2, '{"result_limit":"5"}', 1469012104),
(241, 0, 1, 2, '{"result_limit":"5"}', 1469012311),
(242, 0, 1, 2, '{"result_limit":"5","video_category__description":"","sort":{"video_category__description":"asc"}}', 1469012364),
(243, 0, 1, 2, '{"result_limit":"5"}', 1469012420),
(244, 0, 1, 2, '{"result_limit":"5"}', 1469012439),
(245, 0, 1, 2, '{"result_limit":"5"}', 1469012453),
(246, 0, 1, 2, '{"result_limit":"5"}', 1469012672),
(247, 0, 1, 2, '{"result_limit":"5"}', 1469012835),
(248, 0, 1, 2, '{"result_limit":"5"}', 1469012863),
(249, 0, 1, 2, '{"result_limit":"5"}', 1469012871),
(250, 0, 1, 2, '{"result_limit":"5"}', 1469012877),
(251, 0, 1, 2, '{"result_limit":"5"}', 1469012943),
(252, 0, 1, 2, '{"result_limit":"5","condition":{"video_category__description":""}}', 1469012945),
(253, 0, 1, 2, '{"result_limit":"5","condition":{"video_category__description":""}}', 1469012946),
(254, 0, 1, 2, '{"result_limit":"5"}', 1469012978),
(255, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":"r"}}', 1469012980),
(256, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":"c"}}', 1469012984),
(257, 0, 1, 2, '{"result_limit":"5"}', 1469012987),
(258, 0, 1, 2, '{"result_limit":"5"}', 1469014407),
(259, 0, 1, 2, '{"result_limit":"5"}', 1469014431),
(260, 0, 1, 2, '{"result_limit":"5"}', 1469020415),
(261, 0, 1, 2, '{"result_limit":"5"}', 1469024006),
(262, 0, 1, 2, '{"result_limit":"5"}', 1469024036),
(263, 0, 1, 2, '{"result_limit":"5"}', 1469024042),
(264, 0, 1, 2, '{"result_limit":"5"}', 1469024051),
(265, 0, 1, 2, '{"result_limit":"5"}', 1469024454),
(266, 0, 1, 2, '{"result_limit":"5"}', 1469024541),
(267, 0, 1, 2, '{"result_limit":"5"}', 1469024611),
(268, 0, 1, 2, '{"result_limit":"5"}', 1469024631),
(269, 0, 1, 2, '{"result_limit":"5"}', 1469024651),
(270, 0, 1, 2, '{"result_limit":"5"}', 1469024657),
(271, 0, 1, 2, '{"result_limit":"5"}', 1469024686),
(272, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""}}', 1469024687),
(273, 0, 1, 2, '[]', 1469024697),
(274, 0, 1, 2, '[]', 1469024725),
(275, 0, 1, 2, '{"result_limit":"5"}', 1469024726),
(276, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"video_category__description":"asc"}}', 1469024727),
(277, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"video_category__description":"desc"}}', 1469024728),
(278, 0, 1, 2, '{"result_limit":"5"}', 1469024752),
(279, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"parent_video_category__description":"asc"}}', 1469024754),
(280, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"parent_video_category__description":"desc"}}', 1469024755),
(281, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""}}', 1469024757),
(282, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"parent_video_category__description":"asc"}}', 1469024758),
(283, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"parent_video_category__description":"asc","video_category__description":"asc"}}', 1469024759),
(284, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"parent_video_category__description":"asc","video_category__description":"desc"}}', 1469024759),
(285, 0, 1, 2, '{"result_limit":"5"}', 1469024769),
(286, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"parent_video_category__description":"asc"}}', 1469024770),
(287, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"parent_video_category__description":"desc"}}', 1469024771),
(288, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"parent_video_category__description":"desc","video_category__description":"asc"}}', 1469024772),
(289, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"parent_video_category__description":"desc","video_category__description":"desc"}}', 1469024772),
(290, 0, 1, 2, '{"result_limit":"5"}', 1469024818),
(291, 0, 1, 2, '{"result_limit":"5"}', 1469024851),
(292, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"parent_video_category__description":"asc"}}', 1469024895),
(293, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"parent_video_category__description":"desc"}}', 1469024895),
(294, 0, 1, 2, '{"result_limit":"5"}', 1469024954),
(295, 0, 1, 2, '{"result_limit":"5"}', 1469025229),
(296, 0, 1, 2, '{"result_limit":"5"}', 1469025236),
(297, 0, 1, 2, '{"result_limit":"5"}', 1469068003),
(298, 0, 1, 2, '{"result_limit":"5"}', 1469068064),
(299, 0, 1, 2, '{"result_limit":"5"}', 1469070176),
(300, 0, 1, 2, '{"result_limit":"5"}', 1469082668),
(301, 0, 1, 2, '{"result_limit":"5"}', 1469082680),
(302, 0, 1, 2, '{"result_limit":"5"}', 1469082709),
(303, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":"a"}}', 1469082768),
(304, 0, 1, 2, '{"result_limit":"5"}', 1469082902),
(305, 0, 1, 2, '{"result_limit":"5"}', 1469082950),
(306, 0, 1, 2, '{"result_limit":"5"}', 1469082970),
(307, 0, 1, 2, '{"result_limit":"5"}', 1469082987),
(308, 0, 1, 2, '{"result_limit":"5"}', 1469083037),
(309, 0, 1, 2, '{"result_limit":"5"}', 1469083051),
(310, 0, 1, 2, '{"result_limit":"5"}', 1469083064),
(311, 0, 1, 2, '{"result_limit":"5"}', 1469083072),
(312, 0, 1, 2, '{"result_limit":"5"}', 1469083082),
(313, 0, 1, 2, '{"result_limit":"5"}', 1469083135),
(314, 0, 1, 2, '{"result_limit":"5"}', 1469083141),
(315, 0, 1, 2, '{"result_limit":"5"}', 1469083155),
(316, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"video_category__description":"asc"}}', 1469083161),
(317, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"video_category__description":"desc"}}', 1469083162),
(318, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""}}', 1469083162),
(319, 0, 1, 2, '{"result_limit":"5"}', 1469083164),
(320, 0, 1, 2, '{"result_limit":"5"}', 1469083188),
(321, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":"c"}}', 1469083193),
(322, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":"ck"}}', 1469083199),
(323, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":"rock"}}', 1469083206),
(324, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":"cla"}}', 1469083212),
(325, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""}}', 1469083217),
(326, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"video_category__description":"asc"}}', 1469083219),
(327, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"video_category__description":"desc"}}', 1469083219),
(328, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""}}', 1469083219),
(329, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"video_category__description":"asc"}}', 1469083220),
(330, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"video_category__description":"desc"}}', 1469083223),
(331, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"video_category__description":"desc","parent_video_category__description":"asc"}}', 1469083224),
(332, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"sort":{"video_category__description":"desc","parent_video_category__description":"desc"}}', 1469083224),
(333, 0, 1, 2, '{"result_limit":"5"}', 1469083534),
(334, 0, 1, 2, '{"result_limit":"5"}', 1469085673),
(335, 0, 1, 2, '{"result_limit":"5"}', 1469086758),
(336, 0, 1, 2, '{"result_limit":"5"}', 1469087935),
(337, 0, 1, 2, '{"result_limit":"5"}', 1469088306),
(338, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""}}', 1469088312),
(339, 0, 1, 2, '{"result_limit":"5"}', 1469088342),
(340, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""}}', 1469088349),
(341, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""}}', 1469088350),
(342, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""}}', 1469088350),
(343, 0, 1, 2, '{"result_limit":"5"}', 1469088367),
(344, 0, 1, 2, '{"result_limit":"5"}', 1469088373),
(345, 0, 1, 2, '{"result_limit":"5"}', 1469088405),
(346, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""}}', 1469088410),
(347, 0, 1, 2, '{"result_limit":"5"}', 1469088556),
(348, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""}}', 1469088569),
(349, 0, 1, 2, '{"result_limit":"5"}', 1469088583),
(350, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":"a"}}', 1469088591),
(351, 0, 1, 2, '{"result_limit":"5"}', 1469088782),
(352, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""}}', 1469088784),
(353, 0, 1, 2, '{"result_limit":"5"}', 1469088832),
(354, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""}}', 1469088833),
(355, 0, 1, 2, '{"result_limit":"5"}', 1469088854),
(356, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""}}', 1469088855),
(357, 0, 1, 2, '{"result_limit":"5"}', 1469089153),
(358, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""}}', 1469089157),
(359, 0, 1, 2, '{"result_limit":"5"}', 1469089237),
(360, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""}}', 1469089240),
(361, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""}}', 1469089251),
(362, 0, 1, 2, '{"result_limit":"5"}', 1469089284),
(363, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""}}', 1469089287),
(364, 0, 1, 2, '{"result_limit":"5"}', 1469089302),
(365, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""}}', 1469089304),
(366, 0, 1, 2, '{"result_limit":"5","token":"tae"}', 1469089451),
(367, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"token":"tae"}', 1469089453),
(368, 0, 1, 2, '{"result_limit":"5","token":"tae"}', 1469089459),
(369, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"token":"tae"}', 1469089460),
(370, 0, 1, 2, '{"result_limit":"5","token":"tae"}', 1469089681),
(371, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"token":"tae"}', 1469089683),
(372, 0, 1, 2, '{"result_limit":"5","token":"tae"}', 1469089875),
(373, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"token":"tae"}', 1469089877),
(374, 0, 1, 2, '{"result_limit":"5","condition":{"like__video_category__description":""},"token":"tae"}', 1469089878),
(375, 0, 1, 1, '28', 1469094303),
(376, 0, 1, 1, '28', 1469094303);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `file_uploaded`
--

INSERT INTO `file_uploaded` (`ID`, `description`, `file_type`, `path`, `size`, `datetime`) VALUES
(1, '9488c7e6aa9af1cb1c73c4f7b384444e.png', 'png', 'C:/xampp/htdocs/musico/assets/user_upload/4/', 8.59, 1467472151),
(2, 'ddc7a2763ee16d220c414bc8ff80a5f0.png', 'png', 'C:/xampp/htdocs/musico/assets/user_upload/5/', 8.59, 1467472179),
(3, '42b42e017ed1aa10946c68974df63f0f.mp4', '', 'C:/xampp/htdocs/musico/assets/user_upload/1/', 22024.24, 1467792687),
(4, '1abe6c189644cdb49380c0168a0f2981.mp4', '', 'C:/xampp/htdocs/musico/assets/user_upload/1/', 22024.24, 1467792758),
(5, '9c3641be792c59615302e55a00b4ba55.mp4', '', 'C:/xampp/htdocs/musico/assets/user_upload/1/', 22024.24, 1467792774),
(6, '34088b5be2a93e1d19b09c10780bd7a8.mp4', '', 'C:/xampp/htdocs/musico/assets/user_upload/1/', 22024.24, 1467792916),
(7, '092d747ee92d903ed684ea0dee4d6205.mp4', '', 'C:/xampp/htdocs/musico/assets/user_upload/1/', 77897.63, 1467792940),
(8, 'd21cc457c9895c564cbb12849a4e6dfc.mp4', '', 'C:/xampp/htdocs/musico/assets/user_upload/1/', 77897.63, 1467792951),
(9, '613f8ed0ad27f90d920c6616abe53333.mp4', '', 'C:/xampp/htdocs/musico/assets/user_upload/1/', 30143.83, 1469094303);

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

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
`ID` int(11) NOT NULL,
  `subscribed_account_ID` int(11) NOT NULL,
  `subscriber_account_ID` int(11) NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_video`
--

CREATE TABLE IF NOT EXISTS `user_video` (
`ID` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL,
  `file_uploaded_ID` int(11) NOT NULL,
  `video_category_ID` int(11) NOT NULL,
  `thumbnail_file_uploaded_ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 - active, 2 - inactive',
  `datetime` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `user_video`
--

INSERT INTO `user_video` (`ID`, `account_ID`, `file_uploaded_ID`, `video_category_ID`, `thumbnail_file_uploaded_ID`, `title`, `details`, `status`, `datetime`) VALUES
(16, 1, 0, 2, 0, 'TTest', 'geee', 2, 1467791707),
(17, 1, 0, 2, 0, 'TTest', 'geee', 2, 1467791783),
(18, 1, 0, 2, 0, 'TTest', 'geee', 2, 1467792662),
(19, 1, 0, 2, 0, 'TTest', 'geee', 2, 1467792673),
(20, 1, 0, 2, 0, 'TTest', 'geee', 2, 1467792679),
(21, 1, 0, 2, 0, 'TTest', 'geee', 2, 1467792687),
(22, 1, 4, 2, 0, 'TTest', 'geee', 1, 1467792758),
(23, 1, 5, 2, 0, 'TTest', 'geee', 1, 1467792774),
(24, 1, 6, 2, 0, 'TTest', 'geee', 1, 1467792916),
(25, 1, 0, 2, 0, 'TTest', 'geee', 2, 1467792923),
(26, 1, 7, 2, 0, 'TTest', 'geee', 1, 1467792940),
(27, 1, 8, 2, 0, 'TTest', 'geee', 1, 1467792951),
(28, 1, 9, 2, 0, 'TTest', 'geee', 1, 1469094302);

-- --------------------------------------------------------

--
-- Table structure for table `user_video_like`
--

CREATE TABLE IF NOT EXISTS `user_video_like` (
`ID` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL,
  `user_video_ID` int(11) NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_video_view`
--

CREATE TABLE IF NOT EXISTS `user_video_view` (
`ID` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL,
  `user_video_ID` int(11) NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `video_category`
--

CREATE TABLE IF NOT EXISTS `video_category` (
`ID` int(11) NOT NULL,
  `description` text NOT NULL,
  `parent_ID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `video_category`
--

INSERT INTO `video_category` (`ID`, `description`, `parent_ID`) VALUES
(1, 'Classic', 0),
(2, 'Rock', 0);

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
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
 ADD PRIMARY KEY (`ID`), ADD KEY `subscribed_account_ID` (`subscribed_account_ID`), ADD KEY `subscriber_account_ID` (`subscriber_account_ID`);

--
-- Indexes for table `user_video`
--
ALTER TABLE `user_video`
 ADD PRIMARY KEY (`ID`), ADD KEY `account_ID` (`account_ID`,`file_uploaded_ID`,`video_category_ID`), ADD KEY `file_uploaded_ID` (`file_uploaded_ID`), ADD KEY `video_category_ID` (`video_category_ID`);

--
-- Indexes for table `user_video_like`
--
ALTER TABLE `user_video_like`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_video_view`
--
ALTER TABLE `user_video_view`
 ADD PRIMARY KEY (`ID`), ADD KEY `account_ID` (`account_ID`), ADD KEY `user_video_ID` (`user_video_ID`);

--
-- Indexes for table `video_category`
--
ALTER TABLE `video_category`
 ADD PRIMARY KEY (`ID`), ADD KEY `parent_ID` (`parent_ID`);

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
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `action_log`
--
ALTER TABLE `action_log`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=377;
--
-- AUTO_INCREMENT for table `api_controller`
--
ALTER TABLE `api_controller`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `file_uploaded`
--
ALTER TABLE `file_uploaded`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
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
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_video`
--
ALTER TABLE `user_video`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user_video_like`
--
ALTER TABLE `user_video_like`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_video_view`
--
ALTER TABLE `user_video_view`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `video_category`
--
ALTER TABLE `video_category`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`subscribed_account_ID`) REFERENCES `account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `subscription_ibfk_2` FOREIGN KEY (`subscriber_account_ID`) REFERENCES `account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_video`
--
ALTER TABLE `user_video`
ADD CONSTRAINT `user_video_ibfk_1` FOREIGN KEY (`account_ID`) REFERENCES `account` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `user_video_ibfk_3` FOREIGN KEY (`video_category_ID`) REFERENCES `video_category` (`ID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
