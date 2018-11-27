-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2018 at 12:24 PM
-- Server version: 5.6.40
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `acl`
--

CREATE TABLE IF NOT EXISTS `acl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aco_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `aco_id` (`aco_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=299 ;

--
-- Dumping data for table `acl`
--

INSERT INTO `acl` (`id`, `aco_id`, `role_id`) VALUES
(236, 15, 10),
(237, 16, 10),
(238, 25, 10),
(239, 40, 10),
(240, 41, 10),
(241, 42, 10),
(242, 10, 3),
(243, 11, 3),
(244, 13, 3),
(245, 22, 3),
(246, 26, 3),
(247, 27, 3),
(248, 31, 3),
(249, 32, 3),
(250, 33, 3),
(251, 37, 3),
(252, 38, 3),
(253, 39, 3),
(254, 41, 3),
(275, 7, 4),
(276, 9, 4),
(277, 19, 4),
(278, 20, 4),
(279, 21, 4),
(280, 23, 4),
(281, 28, 4),
(282, 29, 4),
(283, 30, 4),
(284, 34, 4),
(285, 35, 4),
(286, 36, 4),
(287, 43, 4),
(289, 15, 7),
(290, 16, 7),
(291, 24, 7),
(292, 40, 7),
(293, 41, 7),
(294, 44, 7),
(295, 46, 7),
(296, 1, 1),
(297, 4, 1),
(298, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `icons` varchar(250) NOT NULL,
  `displaystatus` int(11) NOT NULL,
  `parent_menu` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `class`, `method`, `display_name`, `icons`, `displaystatus`, `parent_menu`, `sort_order`) VALUES
(1, 'Roles', 'roles_all', 'Roles', '<i class="material-icons">gavel</i>', 1, 0, 0),
(4, 'Permissions', 'show_all_permissions', 'Permissions', '<i class="material-icons">dns</i>', 2, 0, 0),
(5, 'vehicles', 'show_vehicles', 'vehicle', '', 0, 0, 0),
(6, 'Users', 'show_users', 'Users', '<i class="material-icons">supervisor_account</i>', 1, 0, 0),
(7, 'Vehicles', 'seized_vehicles', 'Seized vehicles', '<i class="material-icons">directions_car</i>', 1, 0, 0),
(9, 'Vehicles', 'vehicle_sent_to_wh', 'Sent To WH', '', 1, 9, 0),
(10, 'Vehicles', 'send_vehicle_fsl', 'Send Vehicle To FSL', '<i class="material-icons">directions_car</i>', 1, 0, 0),
(11, 'Vehicles', 'fsl_report_dispatched', 'Dispatched vehicles', '', 1, 1, 0),
(13, 'Vehicles', 'fsl_report_received', 'Received vehicles', '', 1, 1, 0),
(15, 'Vehicles', 'warehouse_allot_vechicle', 'Allot Vehicle', '', 1, 2, 0),
(16, 'Vehicles', 'alloted_vehicles', 'Alloted vehicles', '', 1, 2, 0),
(19, 'Vehicles', 'confiscated_history', 'Confiscated Vehicles', '', 1, 9, 0),
(20, 'Vehicles', 'mra_doc_dispatched', 'Dispatched MRA Docs', '', 1, 4, 0),
(21, 'Vehicles', 'mra_doc_recieved', 'MRA Reports', '', 1, 4, 0),
(22, 'Auth', 'warehouse_dashboard', 'Dashboard', '<i class="material-icons">dashboard</i>', 1, 0, 1),
(23, 'Auth', 'Eto_dashboard', 'Dashboard', '<i class="material-icons">dashboard</i>', 1, 0, 1),
(24, 'Auth', 'Dg_dashboard', 'Dashboard', '<i class="material-icons">dashboard</i>', 1, 0, 1),
(25, 'Auth', 'secretary_dashboard', 'Dashboard', '<i class="material-icons">dashboard</i>', 1, 0, 1),
(26, 'Vehicles', 'vehicle_handover', 'Handover vehicle', '', 1, 2, 0),
(27, 'Vehicles', 'warehouse_receive_vehicle', 'Receive Vehicle', '', 1, 2, 0),
(28, 'Vehicles', 'dispatched_for_fsl', 'Dispatched Vehicles', '', 1, 8, 0),
(29, 'Vehicles', 'Eto_fsl_reports', 'FSL Reports', '', 1, 8, 0),
(30, 'Vehicles', 'mra_fsl_report', 'MRA+WH(FSL)', '<i class="material-icons">directions_car</i>', 1, 0, 0),
(31, 'Vehicles', 'warehouse_mra_parked', 'Parked Vehicles', ' <i> <img src="http://175.107.63.24/wms/assets/images/parked-06.svg" alt=""  width="24px"/></i>', 1, 0, 0),
(32, 'Vehicles', 'warehouse_vehicles', 'Warehouse Vehicles', '<i> <img src="http://175.107.63.24/wms/assets/images/whvehiclesicon-03.svg" alt=""  width="24px"/></i>', 0, 0, 0),
(33, 'Vehicles', 'release_vehicle_handover', 'Release Vehicle', '', 0, 2, 0),
(34, 'Vehicles', 'sent_to_mra_history', 'Vehicles sent to MRA', '', 0, 9, 0),
(35, 'Vehicles', 'sent_to_both_history', 'Sent to Both(MRA + FSL)', '', 0, 9, 0),
(36, 'Vehicles', 'released_vehicles_history', 'Release Vehicles', '', 0, 9, 0),
(37, 'Vehicles', 'fsl_vehicles_reports_histroy', 'FSL Vehicles & Reports', '', 0, 5, 0),
(38, 'Vehicles', 'warehouse_checkedin_vehicles_history', 'Warehouse Checked in', '', 0, 5, 0),
(39, 'Vehicles', 'handover_vehicles_history', 'Handover Vehicles', '', 0, 5, 0),
(40, 'Vehicles', 'dg_pending_handover', 'Pending Handover', '', 0, 10, 0),
(41, 'Vehicles', 'create_report', 'Create Reports', '<i class="material-icons">note_add</i>', 1, 0, 0),
(43, 'Vehicles', 'Eto_create_report', 'ETI Performance & Report', '<i class="material-icons">report</i>', 0, 0, 0),
(44, 'Vehicles', 'dg_eto_report', 'ETO performance & Report', '<i class="material-icons">assignment</i>', 0, 0, 0),
(46, 'Vehicles', 'pendency_report', 'Pendecy Report', '<i class="material-icons">assignment_late</i>', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'default'),
(2, 'Inspector'),
(3, 'warehouse'),
(4, 'ETO'),
(7, 'DG'),
(10, 'Secretary');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accesories`
--

CREATE TABLE IF NOT EXISTS `tbl_accesories` (
  `accessoryid` int(11) NOT NULL AUTO_INCREMENT,
  `accessoryname` varchar(255) NOT NULL,
  `accessoryicon` varchar(255) NOT NULL,
  PRIMARY KEY (`accessoryid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_accesories`
--

INSERT INTO `tbl_accesories` (`accessoryid`, `accessoryname`, `accessoryicon`) VALUES
(1, 'Alloy Rims', '<i class="icons alloy_rims"></i>'),
(2, 'Air Bags', '<i class="icons air_bags"></i>'),
(3, 'Air Conditioning', '<i class="icons air_conditioning"></i>'),
(4, 'AM/FM Radio', '<i class="icons am_fm_radio"></i>'),
(5, 'Dvd/Cd player', '<i class="icons cd_player"></i>'),
(6, 'Cassette Player', '<i class="icons cassette_player "></i>'),
(7, 'Cool Box', '<i class="icons coolbox"></i>'),
(8, 'Climate Control', '<i class="icons cruise_control"></i>'),
(9, 'Front Speaker', '<i class="icons front_speakers"></i>'),
(10, 'Front Camera', '<i class="icons front_camera"></i>'),
(11, 'Heated Seats', '<i class="icons heated_seats"></i>'),
(12, 'Immobilizer key', '<i class="icons immobilizer_key"></i>'),
(13, 'Keyless Entry', '<i class="icons keyless_entry"></i>'),
(14, 'Navigation System', '<i class="icons navigation_system"></i>'),
(15, 'Power Locks', '<i class="icons power_locks"></i>'),
(16, 'Power Mirrors', '<i class="icons power_mirrors"></i>'),
(17, 'Power Windows', '<i class="icons power_windows"></i>'),
(18, 'Power Steering', '<i class="icons power_steering"></i>'),
(19, 'Rear Seat Entertaiment', '<i class="icons rear_seat_entertainment"></i>'),
(20, 'Rear Speaker', '<i class="icons rear_speakers"></i>'),
(21, 'Sun Roof', '<i class="icons sun_roof"></i>'),
(22, 'Steering Switches', '<i class="icons steering_switches"></i>'),
(25, 'Usb & Auxilary Cables', '<i class="icons usb_and_auxillary_cable"></i>'),
(26, 'Cruise Control', '<i class="icons cruise_control"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bodybuild`
--

CREATE TABLE IF NOT EXISTS `tbl_bodybuild` (
  `bodybuild` int(11) NOT NULL AUTO_INCREMENT,
  `bodybuildname` varchar(250) NOT NULL,
  PRIMARY KEY (`bodybuild`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_bodybuild`
--

INSERT INTO `tbl_bodybuild` (`bodybuild`, `bodybuildname`) VALUES
(1, 'Hatchback'),
(2, 'Sedan'),
(3, 'MUV/SUV'),
(4, 'MPV'),
(5, 'Crossover '),
(6, 'Coupe'),
(7, 'Convertible'),
(8, 'Wagon'),
(9, 'Van'),
(10, 'Jeep');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE IF NOT EXISTS `tbl_color` (
  `colorid` int(11) NOT NULL AUTO_INCREMENT,
  `colorname` varchar(250) NOT NULL,
  PRIMARY KEY (`colorid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`colorid`, `colorname`) VALUES
(1, 'White'),
(2, 'Silver'),
(3, 'Black'),
(4, 'Grey'),
(5, 'Blue'),
(6, 'Green'),
(7, 'Red'),
(8, 'Gold'),
(9, 'Marron'),
(10, 'Beige'),
(11, 'Pink  '),
(12, 'Brown'),
(13, 'Burgendy'),
(14, 'Yellow'),
(15, 'Bronze'),
(16, 'Purple'),
(17, 'Turquoise'),
(18, 'Orange'),
(19, 'Indigo'),
(20, 'Magenta'),
(21, 'Navy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_confiscated`
--

CREATE TABLE IF NOT EXISTS `tbl_confiscated` (
  `sendbacketoid` int(11) NOT NULL AUTO_INCREMENT,
  `confiscationorderno` int(11) NOT NULL,
  `confiscationorderdate` varchar(255) NOT NULL,
  `confiscationordetime` varchar(255) NOT NULL,
  `confiscationdescription` varchar(255) NOT NULL,
  `vechicle_id` int(11) NOT NULL,
  `upload` varchar(255) NOT NULL,
  `systemdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sendbacketoid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_confiscated`
--

INSERT INTO `tbl_confiscated` (`sendbacketoid`, `confiscationorderno`, `confiscationorderdate`, `confiscationordetime`, `confiscationdescription`, `vechicle_id`, `upload`, `systemdate`) VALUES
(1, 3334, 'Tuesday 13 November 2018', '03:16 pm', 'zzz', 1, '1035055444.jpeg', '2018-11-13 15:19:04'),
(2, 8523, '2018-11-14', '01:07 pm', 'kdsalkd;asldklsa;', 8, '680724573.jpg', '2018-11-14 13:10:07'),
(3, 2323, '2018-11-14', '01:08 pm', 'id vehicle 7', 7, '1598879089.png', '2018-11-14 13:11:04'),
(4, 7893, 'Wednesday 14 November 2018', '01:18 pm', 'kdaslkd;ask;l', 6, '1154713993.jpg', '2018-11-14 13:20:53'),
(5, 7413, 'Wednesday 14 November 2018', '01:19 pm', 'jkjkjkljkl', 4, '260635849.png', '2018-11-14 13:22:17'),
(6, 7413, 'Wednesday 14 November 2018', '01:19 pm', 'jkjkjkljkl', 4, '1170015241.png', '2018-11-14 13:22:19'),
(7, 7878, '2018-11-14', '01:46 pm', 'condsd', 10, '1215290207.png', '2018-11-14 13:49:43'),
(8, 7676767, '2018-11-17', '01:17 pm', 'hghghghg', 9, '1450255263.png', '2018-11-17 13:25:06'),
(9, 9999, '2018-11-19', '10:32 am', 'confiscate', 16, '805261926.png', '2018-11-19 10:36:40'),
(10, 123, '2018-11-23', '12:17 pm', 'dksdj', 36, '65750375.png', '2018-11-23 12:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dashboard`
--

CREATE TABLE IF NOT EXISTS `tbl_dashboard` (
  `dashboard_id` int(11) NOT NULL AUTO_INCREMENT,
  `dasboard_controller` varchar(255) NOT NULL,
  `dashboard_function` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`dashboard_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_dashboard`
--

INSERT INTO `tbl_dashboard` (`dashboard_id`, `dasboard_controller`, `dashboard_function`, `role_id`) VALUES
(1, 'Auth', 'Eto_dashboard', 4),
(2, 'Auth', 'Dg_dashboard', 7),
(3, 'Auth', 'warehouse_dashboard', 3),
(4, 'Auth', 'secretary_dashboard', 10),
(5, 'Auth', 'super_admin_dashboard', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE IF NOT EXISTS `tbl_district` (
  `districtid` int(11) NOT NULL AUTO_INCREMENT,
  `districtname` varchar(200) NOT NULL,
  PRIMARY KEY (`districtid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`districtid`, `districtname`) VALUES
(1, 'Chitral'),
(2, 'Upper Dir'),
(3, 'Lower Dir'),
(4, 'Swat'),
(5, 'Shangla'),
(7, 'Malakand'),
(8, 'Kohistan'),
(9, 'Mansihra'),
(10, 'Torghar'),
(11, 'Batagram'),
(12, 'Abbotabad'),
(13, 'Haripur'),
(14, 'Mardan'),
(15, 'Swabi'),
(16, 'Charsadda'),
(17, 'Peshawar'),
(18, 'Nowshera'),
(19, 'Kohat'),
(20, 'Hangu'),
(21, 'Karak'),
(22, 'Bannu'),
(23, 'Lakki Marwat'),
(24, 'DI Khan'),
(25, 'Tank'),
(26, 'Buner');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district_registration`
--

CREATE TABLE IF NOT EXISTS `tbl_district_registration` (
  `registrationdistrictid` int(11) NOT NULL AUTO_INCREMENT,
  `registrationdistrictname` varchar(250) NOT NULL,
  PRIMARY KEY (`registrationdistrictid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=135 ;

--
-- Dumping data for table `tbl_district_registration`
--

INSERT INTO `tbl_district_registration` (`registrationdistrictid`, `registrationdistrictname`) VALUES
(1, 'CHITRAL'),
(2, 'UPPER DIR'),
(3, 'LOWER DIR'),
(4, 'SWAT'),
(5, 'SHANGLA'),
(7, 'MALAKAND'),
(8, 'KOHISTAN'),
(9, 'MANSEHRA'),
(10, 'TORGHAR'),
(11, 'BATAGRAM'),
(12, 'ABBOTTABAD'),
(13, 'HARIPUR'),
(14, 'MARDAN'),
(15, 'SWABI'),
(16, 'CHARSADDA'),
(17, 'PESHAWAR'),
(18, 'NOWSHERA'),
(19, 'KOHAT'),
(20, 'HANGU'),
(21, 'KARAK'),
(22, 'BANNU'),
(23, 'LAKKI MARWAT'),
(24, 'DERA ISMAIL KHAN'),
(25, 'TANK'),
(26, 'BUNER'),
(27, 'Attock'),
(28, 'Bahawalnagar'),
(29, 'Bahawalpur'),
(30, 'Bhakkar'),
(31, 'Chakwal'),
(32, 'Chiniot'),
(33, 'Dera Ghazi Khan'),
(34, 'Faisalabad'),
(35, 'Gujranwala'),
(36, 'Gujrat'),
(37, 'Hafizabad'),
(38, 'Jhang'),
(39, 'Jhelum'),
(40, 'Kasur'),
(41, 'Khanewal'),
(42, 'Khushab'),
(43, 'Lahore'),
(44, 'Layyah'),
(45, 'Lodhran'),
(46, 'Mandi Bahauddin'),
(47, 'Mianwali'),
(48, 'Multan'),
(49, 'Muzaffargarh'),
(50, 'Narowal'),
(51, 'Nankana Sahib'),
(52, 'Okara'),
(53, 'Pakpattan'),
(54, 'Rahim Yar Khan'),
(55, 'Rajanpur'),
(56, 'Rawalpindi'),
(57, 'Sahiwal'),
(58, 'Sargodha'),
(59, 'Sheikhupura'),
(60, 'Sialkot'),
(61, 'Toba Tek Singh'),
(62, 'Vehari'),
(63, 'Ghanche'),
(64, 'Skardu'),
(65, 'Shigar'),
(66, 'Kharmang'),
(67, 'Ghizer'),
(68, 'Gilgit'),
(69, 'Hunza'),
(70, 'Nagar'),
(71, 'Astore'),
(72, 'Diamer'),
(73, 'Badin'),
(74, 'Dadu'),
(75, 'Ghotki'),
(76, 'Hyderabad'),
(77, 'Jacobabad'),
(78, 'Jamshoro'),
(79, 'Karachi Central'),
(80, 'Kashmore'),
(81, 'Khairpur'),
(82, 'Larkana'),
(83, 'Matiari'),
(84, 'Mirpur Khas'),
(85, 'Naushahro Firoze'),
(86, 'Shaheed Benazirabad'),
(87, 'Qambar Shahdadkot'),
(88, 'Sanghar'),
(89, 'Shikarpur'),
(90, 'Sukkur'),
(91, 'Tando Allahyar'),
(92, 'Tando Muhammad Khan'),
(93, 'Tharparkar'),
(94, 'Thatta'),
(95, 'Umerkot'),
(96, 'Sujawal'),
(97, 'Karachi East'),
(98, 'Karachi South'),
(99, 'Karachi West'),
(100, 'Korangi'),
(101, 'Malir'),
(102, 'Awaran'),
(103, 'Barkhan'),
(104, 'Chagai'),
(105, 'Dera Bugti'),
(106, 'Gwadar'),
(107, 'Harnai'),
(108, 'Jafarabad'),
(109, 'Jhal Magsi'),
(110, 'Kachhi'),
(111, 'Kalat	'),
(112, 'Kech'),
(113, 'Kharan'),
(114, 'Khuzdar'),
(115, 'Killa Abdullah'),
(116, 'Killa Saifullah'),
(117, 'Kohlu'),
(118, 'Lasbela'),
(119, 'Lehri'),
(120, 'Loralai'),
(121, 'Mastung'),
(122, 'Musakhel'),
(123, 'Nasirabad'),
(124, 'Nushki'),
(125, 'Panjgur'),
(126, 'Pishin'),
(127, 'Quetta'),
(128, 'Sherani'),
(129, 'Sibi'),
(130, 'Sohbatpur'),
(131, 'Washuk'),
(132, 'Zhob'),
(133, 'Ziarat'),
(134, 'Islamabad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_engine_capacity`
--

CREATE TABLE IF NOT EXISTS `tbl_engine_capacity` (
  `enginetypeid` int(11) NOT NULL AUTO_INCREMENT,
  `enginecapacity` int(11) NOT NULL,
  PRIMARY KEY (`enginetypeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_engine_capacity`
--

INSERT INTO `tbl_engine_capacity` (`enginetypeid`, `enginecapacity`) VALUES
(1, 1300),
(2, 1000),
(3, 660),
(4, 1800);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eto_approved_date`
--

CREATE TABLE IF NOT EXISTS `tbl_eto_approved_date` (
  `approvedid` int(11) NOT NULL AUTO_INCREMENT,
  `vechicle_id` int(11) NOT NULL,
  `approved_date` varchar(255) NOT NULL,
  `approved_time` varchar(255) NOT NULL,
  PRIMARY KEY (`approvedid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_formb_accessories`
--

CREATE TABLE IF NOT EXISTS `tbl_formb_accessories` (
  `formbaccessory` int(11) NOT NULL AUTO_INCREMENT,
  `formb_accessoryid` int(11) NOT NULL,
  `vechicle_id` int(11) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`formbaccessory`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `tbl_formb_accessories`
--

INSERT INTO `tbl_formb_accessories` (`formbaccessory`, `formb_accessoryid`, `vechicle_id`, `createdat`) VALUES
(1, 22, 1, '2018-11-13 09:41:26'),
(2, 21, 1, '2018-11-13 09:41:26'),
(3, 26, 1, '2018-11-13 09:41:26'),
(4, 25, 1, '2018-11-13 09:41:26'),
(5, 22, 8, '2018-11-14 07:45:13'),
(6, 26, 8, '2018-11-14 07:45:13'),
(7, 25, 8, '2018-11-14 07:45:13'),
(8, 22, 7, '2018-11-14 07:46:22'),
(9, 21, 7, '2018-11-14 07:46:22'),
(10, 26, 7, '2018-11-14 07:46:22'),
(11, 25, 7, '2018-11-14 07:46:22'),
(12, 22, 4, '2018-11-14 07:49:33'),
(13, 26, 4, '2018-11-14 07:49:33'),
(14, 25, 4, '2018-11-14 07:49:33'),
(15, 7, 6, '2018-11-14 07:50:10'),
(16, 6, 6, '2018-11-14 07:50:10'),
(17, 21, 3, '2018-11-14 07:50:52'),
(18, 25, 3, '2018-11-14 07:50:52'),
(19, 22, 3, '2018-11-14 07:50:52'),
(20, 22, 10, '2018-11-14 08:39:38'),
(21, 26, 10, '2018-11-14 08:39:38'),
(22, 22, 11, '2018-11-15 06:34:34'),
(23, 26, 11, '2018-11-15 06:34:34'),
(24, 25, 11, '2018-11-15 06:34:34'),
(25, 22, 13, '2018-11-15 07:56:12'),
(26, 26, 13, '2018-11-15 07:56:12'),
(27, 25, 13, '2018-11-15 07:56:12'),
(28, 22, 12, '2018-11-15 07:56:52'),
(29, 26, 12, '2018-11-15 07:56:52'),
(30, 25, 12, '2018-11-15 07:56:52'),
(31, 26, 16, '2018-11-19 05:02:35'),
(32, 22, 35, '2018-11-20 05:37:32'),
(33, 26, 35, '2018-11-20 05:37:32'),
(34, 25, 35, '2018-11-20 05:37:32'),
(35, 7, 5, '2018-11-20 07:44:45'),
(36, 6, 5, '2018-11-20 07:44:45'),
(37, 25, 5, '2018-11-20 07:44:45'),
(38, 22, 5, '2018-11-20 07:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fsl_report`
--

CREATE TABLE IF NOT EXISTS `tbl_fsl_report` (
  `fslreportid` int(11) NOT NULL AUTO_INCREMENT,
  `fslcheckin` int(11) NOT NULL DEFAULT '0',
  `fslcheckout` int(11) NOT NULL DEFAULT '0',
  `upload` varchar(250) NOT NULL,
  `letterno` int(11) NOT NULL,
  `vechicle_id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `seized_category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `sytemdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL,
  `fslno` int(11) NOT NULL,
  PRIMARY KEY (`fslreportid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_fsl_report`
--

INSERT INTO `tbl_fsl_report` (`fslreportid`, `fslcheckin`, `fslcheckout`, `upload`, `letterno`, `vechicle_id`, `time`, `date`, `seized_category`, `description`, `sytemdate`, `status`, `fslno`) VALUES
(1, 1, 0, '574923051.png', 0, 1, '02:51 pm', '2018-11-13', '', 'yuu', '2018-11-13 14:55:13', '', 0),
(2, 0, 1, '143372980.jpg', 123, 1, '03:04 pm', '2018-11-13', '2,3', 'asjfkjafh', '2018-11-13 15:06:39', '', 0),
(3, 1, 0, '852700610.jpg', 2233, 8, '12:52 pm', '2018-11-14', '', 'jkjkj', '2018-11-14 12:56:45', '', 5656),
(4, 1, 0, '1344863463.png', 2336, 7, '12:54 pm', '2018-11-14', '', 'ljjkjkjkl', '2018-11-14 12:58:21', '', 5699),
(5, 1, 0, '1024549376.jpg', 2368, 6, '12:56 pm', '2018-11-14', '', 'jljljkl', '2018-11-14 12:58:53', '', 5695),
(6, 0, 1, '1144644756.png', 7896, 8, '12:57 pm', '2018-11-14', '1,2', 'jkkkl', '2018-11-14 13:04:09', '', 0),
(7, 0, 1, '1038354410.jpg', 1566, 7, '01:02 pm', '2018-11-14', '2,3,5', 'jkjklj', '2018-11-14 13:05:07', '', 0),
(8, 0, 1, '76300080.jpg', 8955, 6, '01:15 pm', '2018-11-14', '4,5', 'akslasklak', '2018-11-14 13:18:15', '', 0),
(9, 1, 0, '1540709641.png', 6333, 4, '01:27 pm', '2018-11-14', '', 'klklk', '2018-11-14 13:30:15', '', 2301),
(10, 0, 1, '560513102.png', 8996, 4, '01:28 pm', '2018-11-14', '1,2', 'ld;kas;dk', '2018-11-14 13:33:31', '', 0),
(11, 1, 0, '1278092941.png', 2366, 10, '01:38 pm', '2018-11-14', '', 'jkljkj', '2018-11-14 13:42:18', '', 4545),
(12, 0, 1, '265220146.png', 8585, 10, '01:40 pm', '2018-11-14', '1,2,3', 'jkjklj', '2018-11-14 13:43:47', '', 0),
(13, 0, 1, '1031714128.png', 8585, 10, '01:40 pm', '2018-11-14', '1,2,3', 'jkjklj', '2018-11-14 13:43:48', '', 0),
(14, 1, 0, '1901031481.jpg', 123, 11, '11:44 am', '2018-11-15', '', 'fhaskdf', '2018-11-15 11:46:14', '', 123),
(15, 0, 1, '471701930.jpg', 123, 11, '11:44 am', '2018-11-15', '2,3,4', 'fkasdfhkads', '2018-11-15 11:47:12', '', 0),
(16, 1, 0, '1038197701.png', 7467, 16, '10:07 am', '2018-11-19', '', 'chk', '2018-11-19 10:09:48', '', 4726),
(17, 1, 0, '1250658627.png', 767, 13, '10:08 am', '2018-11-19', '', 'chk car', '2018-11-19 10:10:35', '', 767),
(18, 0, 1, '1260010902.png', 888, 16, '10:16 am', '2018-11-19', '1,2', 'not clear', '2018-11-19 10:20:47', '', 0),
(19, 0, 1, '548627549.jpg', 123, 13, '01:13 pm', '2018-11-20', '2,3,4', 'this is dummy text', '2018-11-20 14:30:03', '', 0),
(20, 1, 0, '1373231149.jpg', 123, 5, '03:37 pm', '2018-11-20', '', 'jfashkfd', '2018-11-20 15:39:29', '', 123),
(21, 0, 1, '1175564785.jpg', 123, 5, '03:41 pm', '2018-11-20', '2,3,4', 'this is confiscated', '2018-11-20 15:43:44', '', 123);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_individual_allot`
--

CREATE TABLE IF NOT EXISTS `tbl_individual_allot` (
  `allotmentid` int(11) NOT NULL AUTO_INCREMENT,
  `receivercnic` varchar(255) NOT NULL,
  `receivername` varchar(255) NOT NULL,
  `mobilenumber` varchar(255) NOT NULL,
  `departmentname` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `authorizedby` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `upload` varchar(255) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vechicle_id` int(11) NOT NULL,
  PRIMARY KEY (`allotmentid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_individual_allot`
--

INSERT INTO `tbl_individual_allot` (`allotmentid`, `receivercnic`, `receivername`, `mobilenumber`, `departmentname`, `designation`, `authorizedby`, `description`, `upload`, `createdat`, `vechicle_id`) VALUES
(1, '12121-3121321-2', 'nazim', '0303-2322323', 'dkasl', 'k;lk', 'Secretary', 'dsldlsk', '1050777885.png', '2018-11-14 14:19:32', 1),
(2, '71627-1671263-7', 'bilal', '1827-3817381', 'excise', 'inspector', 'DG', 'assign', '1918093669.png', '2018-11-19 10:49:47', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mra_report`
--

CREATE TABLE IF NOT EXISTS `tbl_mra_report` (
  `mraid` int(11) NOT NULL AUTO_INCREMENT,
  `letterno` int(11) NOT NULL,
  `mradate` varchar(255) NOT NULL,
  `mratime` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `upload` varchar(255) NOT NULL,
  `mracheckin` int(11) NOT NULL,
  `mracheckout` int(11) NOT NULL,
  `createdat` datetime DEFAULT CURRENT_TIMESTAMP,
  `vehicle_id` int(11) NOT NULL,
  `seize_categories` varchar(255) NOT NULL,
  PRIMARY KEY (`mraid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_mra_report`
--

INSERT INTO `tbl_mra_report` (`mraid`, `letterno`, `mradate`, `mratime`, `Description`, `upload`, `mracheckin`, `mracheckout`, `createdat`, `vehicle_id`, `seize_categories`) VALUES
(1, 123, '2018-11-13', '02:30 pm', 'both', '543023607.jpg', 1, 0, '2018-11-13 14:34:18', 1, ''),
(2, 30000, '2018-11-13', '03:15 pm', 'ffgfg', '1641034761.png', 0, 1, '2018-11-13 15:17:48', 1, '3'),
(3, 1234, '2018-11-14', '12:33 pm', 'kdsa;d', '854414982.jpg', 1, 0, '2018-11-14 12:36:23', 6, ''),
(4, 1235, '2018-11-14', '12:34 pm', 'jkljkj', '721980010.jpg', 1, 0, '2018-11-14 12:37:53', 4, ''),
(5, 1236, '2018-11-14', '12:36 pm', 'd;laksdk', '385273959.jpg', 1, 0, '2018-11-14 12:39:30', 3, ''),
(6, 3223, '2018-11-14', '01:11 pm', 'kl;klk;kl', '1447265089.png', 0, 1, '2018-11-14 13:14:32', 6, '1,2,3'),
(7, 8996, '2018-11-14', '01:12 pm', 'jkljkjklj', '2134221888.jpg', 0, 1, '2018-11-14 13:15:17', 4, '1,2'),
(8, 123, '2018-11-15', '12:08 pm', 'jdsfdaks', '1764938066.jpg', 1, 0, '2018-11-15 12:10:16', 12, ''),
(9, 123, '2018-11-15', '12:44 pm', 'amfasjhf', '1111905286.jpg', 1, 0, '2018-11-15 12:47:45', 13, ''),
(10, 123, '2018-11-15', '12:51 pm', 'kjkj', '441752112.jpg', 0, 1, '2018-11-15 12:54:16', 13, '3,4'),
(11, 76767, '2018-11-17', '11:44 am', 'chk vehicle', '1116380064.png', 1, 0, '2018-11-17 11:48:24', 9, ''),
(12, 78678, '2018-11-17', '01:06 pm', 'ghghg', '1155908563.png', 0, 1, '2018-11-17 13:09:17', 9, '1,2'),
(13, 123, '2018-11-19', '09:56 am', 'its just for testing', '686544899.jpg', 1, 0, '2018-11-19 09:59:07', 17, ''),
(14, 0, '2018-11-20', '10:32 am', 'THIS A TEST', '920520067.jpg', 1, 0, '2018-11-20 10:35:36', 35, ''),
(15, 123, '2018-11-23', '12:12 pm', 'this is example', '610973269.png', 1, 0, '2018-11-23 12:14:50', 36, ''),
(16, 123, '2018-11-23', '12:14 pm', 'this is example data', '55158353.png', 1, 0, '2018-11-23 12:16:58', 34, ''),
(17, 123, '2018-11-23', '12:17 pm', 'this is example', '931803299.png', 0, 1, '2018-11-23 12:19:32', 36, '2,3,4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parent_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_parent_menu` (
  `menuid` int(11) NOT NULL AUTO_INCREMENT,
  `menuname` varchar(255) NOT NULL,
  `menuicon` varchar(255) NOT NULL,
  `role_id` varchar(255) NOT NULL,
  PRIMARY KEY (`menuid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_parent_menu`
--

INSERT INTO `tbl_parent_menu` (`menuid`, `menuname`, `menuicon`, `role_id`) VALUES
(1, 'FSL Report', ' <i> <img src="http://175.107.63.24/wms/assets/images/fslreporticon-02.svg" alt=""  width="24px"/></i>', '3'),
(2, 'Allotment Orders', ' <img src="http://175.107.63.24/wms/assets/images/allotment-01.svg" class="custom-icon-hw-v2"/>', '3,7,10'),
(4, 'MRA', '<i class="material-icons">assignment</i>', '4'),
(5, 'History', '<i class="material-icons">access_time</i>', '3'),
(8, 'Warehouse(FSL)', '<i class="material-icons">assignment</i>', '4'),
(9, 'History', '<i class="material-icons">access_time</i>', '4'),
(10, 'History', '<i class="material-icons">access_time</i>', '7,10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receive_vehicle`
--

CREATE TABLE IF NOT EXISTS `tbl_receive_vehicle` (
  `receiveid` int(11) NOT NULL AUTO_INCREMENT,
  `receivercnic` varchar(255) NOT NULL,
  `receivername` varchar(255) NOT NULL,
  `mobilenumber` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `authorizedby` varchar(255) NOT NULL,
  `letterno` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `upload` varchar(255) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dgreceive` int(11) NOT NULL DEFAULT '0',
  `warehousereceive` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`receiveid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_receive_vehicle`
--

INSERT INTO `tbl_receive_vehicle` (`receiveid`, `receivercnic`, `receivername`, `mobilenumber`, `designation`, `authorizedby`, `letterno`, `description`, `upload`, `vehicle_id`, `createdat`, `dgreceive`, `warehousereceive`) VALUES
(1, '55765-7657657-6', 'amjad', '8876-8767___', 'hghghhghgh', 'DG', 2147483647, 'hghg', '47684234.png', 1, '2018-11-19 06:00:35', 1, 0),
(2, '87878-7987878-7', '676hghg', '7878-9787878', 'jhjhjkhjhjh', 'DG', 87878, 'jhjhj', '1831530242.png', 16, '2018-11-19 06:12:42', 1, 0),
(3, '87878-7878789-7', 'jhjhj', '8878-7987879', 'hghgh', '0', 87878, 'jhjhj', '344841196.png', 16, '2018-11-19 06:16:04', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_released_vehicle`
--

CREATE TABLE IF NOT EXISTS `tbl_released_vehicle` (
  `vehicleid` int(11) NOT NULL AUTO_INCREMENT,
  `letterno` int(11) NOT NULL,
  `releasedate` varchar(255) NOT NULL,
  `releasetime` varchar(255) NOT NULL,
  `upload` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `createdby` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `receivername` varchar(255) NOT NULL,
  `receivercnic` varchar(255) NOT NULL,
  `receivermobileno` varchar(255) NOT NULL,
  `warehouserelease` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`vehicleid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_released_vehicle`
--

INSERT INTO `tbl_released_vehicle` (`vehicleid`, `letterno`, `releasedate`, `releasetime`, `upload`, `description`, `vehicle_id`, `createdby`, `receivername`, `receivercnic`, `receivermobileno`, `warehouserelease`) VALUES
(1, 1238, '12:37 pm', '2018-11-14', '166014792.jpg', '', 2, '2018-11-14 12:40:54', 'khan', '12345-6789122-3', '1234-5656565', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sendtoeto`
--

CREATE TABLE IF NOT EXISTS `tbl_sendtoeto` (
  `sendtoetoid` int(11) NOT NULL AUTO_INCREMENT,
  `sendtoetodate` varchar(255) NOT NULL,
  `sendtoetotime` varchar(255) NOT NULL,
  `sendtoetodescription` varchar(255) NOT NULL,
  `systemdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vechicle_id` int(11) NOT NULL,
  `upload` varchar(250) NOT NULL,
  PRIMARY KEY (`sendtoetoid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_sendtoeto`
--

INSERT INTO `tbl_sendtoeto` (`sendtoetoid`, `sendtoetodate`, `sendtoetotime`, `sendtoetodescription`, `systemdate`, `vechicle_id`, `upload`) VALUES
(1, '2018-11-13', '3:09 PM', '', '2018-11-13 15:11:48', 1, '782447170.jpg'),
(2, '2018-11-13', '3:09 PM', '', '2018-11-13 15:11:56', 1, '12608736.jpg'),
(3, '2018-11-14', '1:03 PM', 'kk;lk;', '2018-11-14 13:07:30', 8, '1727138543.jpg'),
(4, '2018-11-14', '1:05 PM', 'khan', '2018-11-14 13:08:16', 7, '1052172783.png'),
(5, '2018-11-14', '1:43 PM', 'check this vehicle', '2018-11-14 13:47:27', 10, '6163003.png'),
(6, '2018-11-15', '11:56 AM', 'aksf', '2018-11-15 11:58:59', 11, '319215430.jpg'),
(7, '2018-11-19', '10:27 AM', 'ok ', '2018-11-19 10:29:53', 16, '1192450674.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE IF NOT EXISTS `tbl_status` (
  `statusid` int(11) NOT NULL AUTO_INCREMENT,
  `statusdescription` varchar(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`statusid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`statusid`, `statusdescription`, `createdat`, `updatedat`) VALUES
(1, 'inspectorseizedvehicle', '2018-09-15 15:02:12', '0000-00-00 00:00:00'),
(2, 'etoreceivedvehicle', '2018-09-17 04:56:32', '0000-00-00 00:00:00'),
(3, 'send vehicle for fsl to warehouse', '2018-09-17 15:52:43', '0000-00-00 00:00:00'),
(4, 'sent doc to mra', '2018-09-18 05:31:11', '0000-00-00 00:00:00'),
(5, 'send doc to mra and vehicle to fsl', '2018-09-18 07:54:41', '0000-00-00 00:00:00'),
(6, 'Release Vehicle', '2018-09-18 09:17:34', '0000-00-00 00:00:00'),
(7, 'receive docs from mra', '2018-09-19 07:04:51', '0000-00-00 00:00:00'),
(8, 'Mra docs received and ready for confiscation', '2018-09-19 09:15:41', '0000-00-00 00:00:00'),
(9, 'Confiscated', '2018-09-23 04:06:31', '0000-00-00 00:00:00'),
(10, 'Vehicle Released waiting for handover', '2018-09-24 05:11:24', '0000-00-00 00:00:00'),
(11, 'check-din to warehouse for fsl', '2018-09-24 05:39:24', '0000-00-00 00:00:00'),
(12, 'send vehicle to fsl from warehouse', '2018-09-24 05:53:46', '0000-00-00 00:00:00'),
(13, 'vehicle rececived from fsl ', '2018-09-24 10:33:13', '0000-00-00 00:00:00'),
(14, 'send to eto for confiscation after fsl report', '2018-09-24 11:24:00', '0000-00-00 00:00:00'),
(15, 'Vehicle alloted and ready for handover', '2018-09-27 16:59:35', '0000-00-00 00:00:00'),
(16, 'sent For auction', '2018-09-27 16:59:35', '0000-00-00 00:00:00'),
(17, 'Vehicle Alloted', '2018-09-30 16:29:25', '0000-00-00 00:00:00'),
(18, 'Vehicle DG Received', '2018-10-01 06:04:30', '2018-10-01 11:31:29'),
(19, 'Vehicle warehosue Received', '2018-10-01 11:31:45', '0000-00-00 00:00:00'),
(20, 'Released and Handoverd to owner', '2018-10-01 14:14:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usercnic` bigint(13) NOT NULL,
  `usermobile` int(11) NOT NULL,
  `createddate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifydate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `isactive` tinyint(4) NOT NULL,
  `api_token` varchar(250) NOT NULL,
  `special_squad` int(11) NOT NULL DEFAULT '0' COMMENT 'if 1 all district will be open ',
  `is_citizen` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `username`, `password`, `usercnic`, `usermobile`, `createddate`, `modifydate`, `isactive`, `api_token`, `special_squad`, `is_citizen`) VALUES
(5, 'imdad', '822sYeYeLXqnQ', 123455, 124, '2018-08-01 07:43:11', '2018-11-16 10:54:48', 1, '', 0, 0),
(19, 'shahzeb', '822sYeYeLXqnQ', 1730186547029, 123456, '2018-08-15 00:45:17', '2018-11-16 10:47:18', 1, '5be81d-42423d-f15958-ab70d6-3662a7', 1, 0),
(21, 'warehouse', '822sYeYeLXqnQ', 1730141845498, 123455, '2018-08-15 00:53:14', '2018-10-06 13:02:04', 1, '5be81d-42423d-f15958-ab70d6-3662a7', 0, 0),
(22, 'ETO_mardan', '822sYeYeLXqnQ', 12345, 124, '2018-08-15 00:57:04', '2018-10-18 12:35:27', 1, '5be81d-42423d-f15958-ab70d6-3662a7', 0, 0),
(24, 'sheraz', '822sYeYeLXqnQ', 1350377902365, 123455, '2018-08-16 05:38:48', '2018-09-19 00:38:48', 1, '5be81d-42423d-f15958-ab70d6-3662a7', 0, 0),
(26, 'ETO_ABBOTTABAD', '822sYeYeLXqnQ', 123455, 123455, '2018-08-16 06:02:15', '2018-10-18 12:37:43', 0, '5be81d-42423d-f15958-ab70d6-3662a7', 0, 0),
(27, 'safdar kamal', '822sYeYeLXqnQ', 1110114457327, 123455, '2018-08-16 06:10:14', '2018-09-19 00:38:55', 1, '5be81d-42423d-f15958-ab70d6-3662a7', 0, 0),
(28, 'DG', '822sYeYeLXqnQ', 12345, 12345, '2018-08-29 00:47:59', '2018-09-19 00:38:58', 0, '5be81d-42423d-f15958-ab70d6-3662a7', 0, 0),
(29, 'secretary', '822sYeYeLXqnQ', 123455, 123455, '2018-08-29 00:48:25', '2018-09-19 00:39:02', 0, '5be81d-42423d-f15958-ab70d6-3662a7', 0, 0),
(30, 'imdad', '822sYeYeLXqnQ', 1530102213317, 2147483647, '2018-10-18 12:40:28', '2018-10-18 12:45:03', 1, '', 0, 0),
(32, 'ETO_PESHAWAR', '822sYeYeLXqnQ', 123455, 12345, '2018-10-18 12:43:01', '2018-11-16 10:59:28', 1, '', 0, 0),
(36, 'imdad', '822sYeYeLXqnQ', 1530102213318, 2147483647, '2018-11-07 13:09:24', '0000-00-00 00:00:00', 1, '8aeb59-e6b2f7-ffa158-3e9d9a-dd1fe6', 0, 1),
(37, 'shahzaib374', 'e12UqnFFiySYU', 12345678912, 2147483647, '2018-11-08 11:01:19', '0000-00-00 00:00:00', 1, 'b967a1-69e63a-f598d8-a3c330-ac03bf', 0, 1),
(38, 'anmol', 'e12UqnFFiySYU', 2323456232345, 2147483647, '2018-11-10 01:30:50', '0000-00-00 00:00:00', 1, '9720e0-b3fb7b-376403-5f0313-00195d', 0, 1),
(41, 'secretary', '822sYeYeLXqnQ', 1111111111111, 2147483647, '2018-11-15 10:05:32', '2018-11-15 10:07:04', 1, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_district`
--

CREATE TABLE IF NOT EXISTS `tbl_user_district` (
  `udid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `entrydate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`udid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_user_district`
--

INSERT INTO `tbl_user_district` (`udid`, `user_id`, `district_id`, `entrydate`) VALUES
(1, 19, 14, '2018-08-15 00:45:17'),
(3, 21, 3, '2018-08-15 00:53:14'),
(4, 22, 14, '2018-08-15 00:57:04'),
(5, 23, 2, '2018-08-15 12:51:08'),
(6, 24, 12, '2018-08-16 05:38:48'),
(8, 26, 12, '2018-08-16 06:02:15'),
(9, 27, 4, '2018-08-16 06:10:14'),
(10, 28, 0, '2018-08-29 00:47:59'),
(11, 29, 0, '2018-08-29 00:48:25'),
(12, 30, 17, '2018-10-18 12:40:28'),
(14, 32, 17, '2018-10-18 12:43:01'),
(15, 41, 17, '2018-11-15 10:05:32'),
(16, 42, 2, '2018-11-16 10:26:27'),
(17, 43, 3, '2018-11-16 10:27:21'),
(18, 44, 1, '2018-11-16 10:30:21'),
(19, 5, 0, '2018-11-16 10:33:16'),
(20, 19, 14, '2018-11-16 10:41:00'),
(21, 19, 14, '2018-11-16 10:47:08'),
(22, 19, 14, '2018-11-16 10:47:18'),
(23, 5, 0, '2018-11-16 10:53:39'),
(24, 5, 0, '2018-11-16 10:54:48'),
(25, 32, 14, '2018-11-16 10:59:28'),
(26, 32, 17, '2018-11-16 11:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vcr`
--

CREATE TABLE IF NOT EXISTS `tbl_vcr` (
  `vcrid` int(11) NOT NULL AUTO_INCREMENT,
  `regno` varchar(255) DEFAULT NULL,
  `engineno` varchar(255) DEFAULT NULL,
  `chasisno` varchar(255) DEFAULT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reprotedat` varchar(15) NOT NULL,
  `image1` varchar(250) DEFAULT NULL,
  `image2` varchar(250) DEFAULT NULL,
  `image3` varchar(250) DEFAULT NULL,
  `user_id` varchar(255) NOT NULL,
  `modelyear` varchar(255) NOT NULL,
  PRIMARY KEY (`vcrid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_vcr`
--

INSERT INTO `tbl_vcr` (`vcrid`, `regno`, `engineno`, `chasisno`, `make`, `model`, `details`, `createdat`, `reprotedat`, `image1`, `image2`, `image3`, `user_id`, `modelyear`) VALUES
(1, '0', '0', '0', '0', '0', '0', '2018-11-14 10:44:08', 'okhttp3.Request', NULL, NULL, NULL, '0', '0'),
(2, '0', '0', '0', '0', '0', '0', '2018-11-14 10:50:11', 'okhttp3.Request', NULL, NULL, NULL, '0', '0'),
(3, '23323', '0', '0', '1', '2', '0', '2018-11-14 10:50:52', '11-08-2018', NULL, NULL, NULL, '1', '0'),
(4, 'okhttp3.RequestBody$2@749d80d', 'okhttp3.RequestBody$2@15323c2', 'okhttp3.RequestBody$2@73c7510', 'okhttp3.RequestBody$2@d52d2a4', 'okhttp3.RequestBody$2@38aac2f', '', '2018-11-14 10:55:33', 'okhttp3.Request', NULL, NULL, NULL, 'okhttp3.RequestBody$2@e33ba0e', ''),
(5, '23323', 'as323', 'as2323', '1', '2', '', '2018-11-14 10:56:19', '11-08-2018', NULL, NULL, NULL, '1', ''),
(6, 'ndndj', 'nxndnd', 'jfjfj', '2', '106', '', '2018-11-14 11:04:11', '14-Nov-2018', NULL, NULL, NULL, '1', ''),
(7, 'ndndj', 'nxndnd', 'jfjfj', '2', '106', '', '2018-11-14 11:05:12', '14-Nov-2018', NULL, NULL, NULL, '1', ''),
(8, 'jjddjd', 'jdjdj', '81818', '3', '150', '', '2018-11-14 20:30:30', '14-Nov-2018', NULL, NULL, NULL, '1', ''),
(9, '23323', 'as323', 'as2323', '1', '2', 'khkhjkh', '2018-11-14 20:32:47', '11-08-2018', 'download.jpg', NULL, NULL, '1', '1'),
(10, '23323', 'as323', 'as2323', '1', '2', 'khkhjkh', '2018-11-14 20:32:47', '11-08-2018', NULL, NULL, NULL, '1', '1'),
(11, 'uuu', 'hhh', 'uuu', '2', '104', 'null', '2018-11-14 20:41:36', '14-Nov-2018', '1541655235200.jpg', NULL, NULL, '1', '4'),
(12, 'yyyyyy', 'yh7888', 'uy7777', '2', '104', 'null', '2018-11-14 20:45:47', '14-Nov-2018', 'Screenshot_20181114-195610.png', 'magazine-unlock-01-2.3.1159-_2E076DE20306E9583C7876ADB404203F.jpg', 'IMG_20181011_144708.jpg', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle` (
  `vechileid` int(11) NOT NULL AUTO_INCREMENT,
  `district_id` int(11) DEFAULT NULL,
  `vehicleseize_category` varchar(255) DEFAULT NULL,
  `vehicle_make` int(11) DEFAULT NULL,
  `vehicleengine_capcaity` int(11) NOT NULL,
  `vehicletype` varchar(255) NOT NULL,
  `vehicle_model` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `upated_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `chasisno` varchar(255) DEFAULT NULL,
  `engineno` varchar(255) DEFAULT NULL,
  `vechileregistrationno` varchar(255) NOT NULL DEFAULT 'N/A',
  `drivercnicno` bigint(20) DEFAULT NULL,
  `drivermobileno` bigint(20) DEFAULT NULL,
  `driveraddress` varchar(250) DEFAULT 'N/A',
  `vechileownername` varchar(250) DEFAULT 'N/A',
  `vechileownercnic` bigint(20) DEFAULT NULL,
  `vechileownermobileno` bigint(20) DEFAULT NULL,
  `mobilesquadno` bigint(20) DEFAULT NULL,
  `seizedlocationlat` varchar(250) NOT NULL,
  `seizedlocationlong` varchar(250) NOT NULL,
  `mileage` varchar(250) NOT NULL,
  `vechicledescription` varchar(250) DEFAULT 'N/A',
  `transmission` varchar(250) NOT NULL,
  `enginetype` varchar(255) NOT NULL,
  `assembely` enum('imported','Local') NOT NULL,
  `build_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `formserialno` bigint(20) DEFAULT NULL,
  `drivername` varchar(250) DEFAULT 'N/A',
  `siezeddate` varchar(250) NOT NULL,
  `siezedtime` varchar(250) NOT NULL,
  `vechilewheels` int(11) NOT NULL,
  `seizedat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vechiclemodelyear` varchar(255) NOT NULL,
  `parking` int(11) NOT NULL DEFAULT '0' COMMENT 'readyforparkinng=1 parked=2',
  `allotstatus` int(11) NOT NULL DEFAULT '0',
  `clearnotclearstatus` int(11) NOT NULL,
  `sendtowhforfsl` int(11) NOT NULL DEFAULT '0',
  `fslclearnotclear` int(11) NOT NULL DEFAULT '0',
  `fslparking` int(11) NOT NULL DEFAULT '0',
  `formbstatus` int(11) NOT NULL DEFAULT '0',
  `handoverstatus` int(11) NOT NULL DEFAULT '0',
  `receivestatus` int(11) NOT NULL DEFAULT '0',
  `releasedhandover` int(11) NOT NULL DEFAULT '0',
  `individualallot` int(11) NOT NULL DEFAULT '0',
  `departmentallot` int(11) NOT NULL DEFAULT '0',
  `registration_id` int(11) NOT NULL,
  `sendtoboth` int(11) NOT NULL DEFAULT '0',
  `seize_address` varchar(255) NOT NULL,
  PRIMARY KEY (`vechileid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tbl_vehicle`
--

INSERT INTO `tbl_vehicle` (`vechileid`, `district_id`, `vehicleseize_category`, `vehicle_make`, `vehicleengine_capcaity`, `vehicletype`, `vehicle_model`, `user_id`, `upated_on`, `chasisno`, `engineno`, `vechileregistrationno`, `drivercnicno`, `drivermobileno`, `driveraddress`, `vechileownername`, `vechileownercnic`, `vechileownermobileno`, `mobilesquadno`, `seizedlocationlat`, `seizedlocationlong`, `mileage`, `vechicledescription`, `transmission`, `enginetype`, `assembely`, `build_id`, `color_id`, `formserialno`, `drivername`, `siezeddate`, `siezedtime`, `vechilewheels`, `seizedat`, `vechiclemodelyear`, `parking`, `allotstatus`, `clearnotclearstatus`, `sendtowhforfsl`, `fslclearnotclear`, `fslparking`, `formbstatus`, `handoverstatus`, `receivestatus`, `releasedhandover`, `individualallot`, `departmentallot`, `registration_id`, `sendtoboth`, `seize_address`) VALUES
(1, 17, '2,1,3', 3, 52365, 'private', 150, 30, '2018-11-27 11:32:47', 'gad452', 'vac123', 'A432', 1530102213317, 3159036207, 'peshawar', 'N/A', 0, 3159036207, 6532, '34.0104194', '71.5583729', '52638', '', 'Mannual', 'CNG', 'imported', 4, 5, 5270, 'imdad', '13-Nov-2018', '2:27 PM', 2, '2018-11-13 14:31:12', '1', 0, 1, 2, 1, 2, 0, 1, 2, 1, 0, 1, 0, 2, 1, 'N/A'),
(2, 17, '2,1', 4, 5236, 'private', 207, 30, '2018-11-27 11:32:47', 'fy-762', 'gGs-663', 'vav-626', 1530102213317, 3159036207, '', 'N/A', 0, 5536, 8536, '33.9980355', '71.4685656', '5236', '', 'Mannual', 'CNG', 'imported', 4, 6, 5263, 'imdad', '14-Nov-2018', '9:25 AM', 2, '2018-11-14 09:28:58', '2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 'N/A'),
(3, 17, '2,1,3', 4, 52363, 'private', 206, 30, '2018-11-27 11:32:47', 'gaf-725', 'agg-652', 'agga-725', 1530236558484, 3159404654, '', 'N/A', 0, 0, 53628, '33.9980355', '71.4685656', '5236', '', 'Mannual', 'CNG', 'imported', 5, 6, 6325, 'imdad', '14-Nov-2018', '9:27 AM', 2, '2018-11-14 09:30:43', '2', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 4, 0, 'N/A'),
(4, 17, '4,3,5', 3, 6325, 'private', 150, 30, '2018-11-27 11:32:47', 'gaga-76', 'gfa-726', 'gaga-76', 1530236554216, 3465121349, '', 'N/A', 0, 0, 6325, '33.9980355', '71.4685656', '6325', '', 'Automatic', 'CNG', 'Local', 5, 6, 5362, 'imdad', '14-Nov-2018', '9:29 AM', 2, '2018-11-14 09:32:22', '2', 0, 0, 2, 1, 2, 0, 1, 0, 0, 0, 0, 0, 3, 1, 'N/A'),
(5, 14, '3,4', 1, 2300, 'private', 1, 19, '2018-11-27 11:32:47', 'ah648956486528', 'dhr535688', 'A2358', 1730145789562, 3307584695, '', 'muneeb', 1730145785492, 0, 5685, '33.9981568', '71.4689297', '84', 'check vehicle, secret cavities found', 'Automatic', 'CNG', 'Local', 1, 9, 2548, 'ali ahmed', '14-Nov-2018', '9:27 AM', 2, '2018-11-14 09:32:40', '3', 0, 0, 0, 1, 2, 0, 1, 0, 0, 0, 0, 0, 17, 0, 'N/A'),
(6, 17, '3,1', 4, 6325, 'private', 206, 30, '2018-11-27 11:32:47', 'gfd-764', 'fg-76', 'hg-765', 1530123666288, 3156836288, '', 'N/A', 0, 0, 6325, '33.9980358', '71.4685655', '6325', '', 'Mannual', 'CNG', 'imported', 5, 6, 5236, 'imdad', '14-Nov-2018', '9:35 AM', 2, '2018-11-14 09:38:46', '2', 0, 0, 2, 1, 2, 0, 1, 0, 0, 0, 0, 0, 3, 1, 'N/A'),
(7, 17, '3,2,4', 4, 63253, 'private', 206, 30, '2018-11-27 11:32:47', 'af-76', 'hgs-76', 'gga-765', 1530120846464, 3154848648, '', 'N/A', 0, 0, 6325, '34.0101849', '71.5584573', '6325', '', 'Mannual', 'CNG', 'imported', 3, 4, 6325, 'imdad', '14-Nov-2018', '11:51 AM', 2, '2018-11-14 11:58:28', '2', 0, 0, 0, 1, 2, 0, 1, 0, 0, 0, 0, 0, 4, 0, 'N/A'),
(8, 17, '3,2,5,4', 5, 6325, 'commercial', 239, 30, '2018-11-27 11:32:47', 'gff-755', 'agga-765', 'gags-76', 1530102213317, 3183624848, '', 'N/A', 0, 0, 6325, '34.010204', '71.5584523', '6325', '', 'Automatic', 'CNG', 'imported', 6, 7, 6325, 'imdad', '14-Nov-2018', '11:57 AM', 2, '2018-11-14 12:00:17', '2', 0, 0, 0, 1, 2, 0, 1, 0, 0, 0, 0, 0, 4, 0, 'N/A'),
(9, 14, '1,2', 4, 57673, 'commercial', 206, 19, '2018-11-27 11:32:47', 'jsjs', 'jjsjaj', 'kdkdk', 1730186547029, 3025571736, '', 'N/A', 0, 0, 2365, '34.0101831', '71.5584309', '856', 'Suspicious ', 'Automatic', 'petrol', 'Local', 6, 1, 1236, 'khan', '14-Nov-2018', '11:51 AM', 1, '2018-11-14 12:01:38', '4', 1, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 'N/A'),
(10, 14, '4,5', 5, 3336, 'commercial', 238, 19, '2018-11-27 11:32:47', 'mvkvkck', 'jfjfj', 'kkvkg', 1730186547059, 56889666666, '', 'N/A', 0, 0, 88676, '34.0100706', '71.5584308', '885', '', 'Automatic', 'CNG', 'Local', 7, 2, 3666, 'khan', '14-Nov-2018', '12:00 PM', 2, '2018-11-14 12:06:24', '4', 0, 0, 0, 1, 2, 0, 1, 0, 0, 0, 0, 0, 43, 0, 'N/A'),
(11, 17, '2,1,4,3', 5, 6325, 'commercial', 238, 41, '2018-11-27 11:32:47', 'hgfa-764', 'ggf-76', 'hgf-765', 1530102213317, 3159036207, '', 'N/A', 0, 0, 6325, '33.9980423', '71.4685467', '6325', '', 'Automatic', 'CNG', 'Local', 6, 7, 6325, 'imdad', '15-Nov-2018', '11:28 AM', 2, '2018-11-15 11:31:52', '2', 0, 0, 0, 1, 2, 0, 1, 0, 0, 0, 0, 0, 5, 0, 'N/A'),
(12, 17, '2,1,4,3,5', 5, 632536, 'commercial', 238, 41, '2018-11-27 11:32:47', 'hgg-76', 'haga-76', 'hah-76', 1530136434548, 85754643454, '', 'N/A', 0, 0, 6325, '33.9980485', '71.468536', '632', '', 'Mannual', 'CNG', 'imported', 8, 7, 6325, 'imdad', '15-Nov-2018', '12:00 PM', 2, '2018-11-15 12:03:27', '2', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 4, 0, 'N/A'),
(13, 17, '3,2,4', 4, 6325, 'commercial', 208, 41, '2018-11-27 11:32:47', 'hag-765', 'hgag-866', 'hggss-87', 5646454646464, 49646464646, '', 'N/A', 0, 0, 6325, '33.9980214', '71.4685113', '6325', '', 'Mannual', 'hybrid', 'Local', 5, 6, 6325, 'imdad', '15-Nov-2018', '12:09 PM', 2, '2018-11-15 12:12:36', '2', 0, 0, 2, 1, 2, 0, 1, 0, 0, 0, 0, 0, 4, 1, 'N/A'),
(14, 17, '2,1,4,3', 4, 63263, 'commercial', 207, 41, '2018-11-27 11:32:47', 'hh-86', 'ggf-76', 'gfd-86', 5362587887879, 49499494944, '', 'N/A', 0, 0, 6325, '33.9980491', '71.4685573', '6325', '', 'Mannual', 'CNG', 'Local', 5, 6, 6325, 'imdad', '15-Nov-2018', '12:47 PM', 2, '2018-11-15 12:50:17', '2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 'N/A'),
(15, 12, '1,3,2', 1, 23, 'private', 1, 19, '2018-11-27 11:32:47', 'dhhjggjvbhg', 'fhhvjhg', 'fgggg', 1243532562555, 12757528658, '', 'N/A', 0, 0, 2525, '33.9980516', '71.4685558', '23', 'chk vehicle', 'Mannual', 'petrol', 'imported', 1, 1, 1232, 'ali', '19-Nov-2018', '9:45 AM', 2, '2018-11-19 09:48:49', '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'N/A'),
(16, 14, '4', 1, 55, 'private', 1, 19, '2018-11-27 11:32:47', 'ghfgffhg', 'chfgg', 'fygg', 1252865585586, 12862552855, '', 'N/A', 0, 0, 6666, '33.9980528', '71.4685573', '52', 'chk', 'Mannual', 'hybrid', 'Local', 4, 5, 3333, 'ahmed', '19-Nov-2018', '9:46 AM', 2, '2018-11-19 09:50:21', '2', 0, 1, 0, 1, 2, 0, 1, 2, 0, 0, 0, 1, 3, 0, 'N/A'),
(17, 17, '3,2,4', 1, 6325, 'private', 3, 30, '2018-11-27 11:32:47', 'jgg-76', 'hgd-76', 'hgf-765', 1530102213317, 3159036207, '', 'N/A', 0, 0, 6325, '33.9980561', '71.4685645', '6325', '', 'Mannual', 'CNG', 'imported', 3, 5, 6325, 'imdad', '19-Nov-2018', '9:55 AM', 2, '2018-11-19 09:58:27', '1', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 'N/A'),
(18, 14, '2,4,3', 4, 23, 'private', 206, 19, '2018-11-27 11:32:47', 'dhxhhdfhg', 'fddgjxcc', 'fgcv', 1245245862458, 12356524588, 'kllk', 'N/A', 0, 0, 8569, '33.997835', '71.4683433', '52', 'chk', 'Automatic', 'hybrid', 'imported', 5, 5, 6666, 'anmol', '19-Nov-2018', '11:48 AM', 2, '2018-11-19 11:53:23', '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 'N/A'),
(19, 14, '1,2', 3, 63, 'commercial', 151, 19, '2018-11-27 11:32:47', 'kkzkz', 'kzkzk', 'jzjzj', 1236666666666, 99966666666, 'kllk', 'N/A', 0, 0, 9999, '33.9980777', '71.4683918', '666', 'Issi', 'Automatic', 'diesel', 'Local', 6, 7, 2365, 'khan', '19-Nov-2018', '4:54 PM', 4, '2018-11-19 16:58:59', '3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 'N/A'),
(20, 14, '1,2', 3, 63, 'commercial', 151, 19, '2018-11-27 11:32:47', 'kkzkz', 'kzkzk', 'jzjzj', 1236666666666, 99966666666, 'kllk', 'N/A', 0, 0, 9999, '33.9980777', '71.4683918', '666', 'Issi', 'Automatic', 'diesel', 'Local', 6, 7, 2365, 'khan', '19-Nov-2018', '4:54 PM', 4, '2018-11-19 16:59:04', '3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 'N/A'),
(21, 16, '1,2', 3, 4585, 'commercial', 150, 19, '2018-11-27 11:32:47', 'ggff', 'cgh', '455666', 1234567891234, 3126552336, 'kllk', 'dgh', 1234566789985, 55558555555, 55555, '33.998149', '71.4692582', '85544', 'Tdfhfufuc vfufufuf fufufuf cufurur fyfyfufuf7', 'Automatic', 'hybrid', 'Local', 6, 7, 5555, 'ydfuuf', '19-Nov-2018', '5:05 PM', 4, '2018-11-19 23:30:24', '2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 'N/A'),
(22, 14, '1,2', 3, 666, 'private', 149, 19, '2018-11-27 11:32:47', 'kkkkk', 'jkkk', 'jkk', 1730186547059, 3025571736, 'kllk', 'N/A', 0, 0, 5698, '34.0142515', '71.5996706', '55', 'Akaka', 'Automatic', 'diesel', 'Local', 6, 7, 2365, 'khan', '19-Nov-2018', '11:38 PM', 5, '2018-11-19 23:42:23', '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 'N/A'),
(23, 14, '1,2', 3, 233, 'commercial', 151, 19, '2018-11-27 11:32:47', 'kck', 'icci', '8c8f8f', 8555555755555, 88855555555, 'kllk', 'N/A', 0, 0, 6666, '34.0143747', '71.5996576', '55', 'Jkffkk', 'Mannual', 'CNG', 'Local', 6, 7, 2335, 'jcjcj', '19-Nov-2018', '11:47 PM', 2, '2018-11-19 23:51:49', '2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 'N/A'),
(24, 14, '1,2', 5, 522, 'commercial', 238, 19, '2018-11-27 11:32:47', 'n unu', 'bbu', 'nnnj<has ', 7171855050500, 5050505000, 'kllk', 'N/A', 0, 0, 450, '34.0147858', '71.5998793', '52', 'Hu', 'Automatic', 'hybrid', 'Local', 7, 7, 7727, 'ybyvy', '19-Nov-2018', '11:56 PM', 4, '2018-11-19 23:59:50', '3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 'N/A'),
(25, 14, '1,2', 5, 522, 'commercial', 238, 19, '2018-11-27 11:32:47', 'n unu', 'bbu', 'nnnj<has ', 7171855050500, 5050505000, 'kllk', 'N/A', 0, 0, 450, '34.0147858', '71.5998793', '52', 'Hu', 'Automatic', 'hybrid', 'Local', 7, 7, 7727, 'ybyvy', '19-Nov-2018', '11:56 PM', 4, '2018-11-20 00:00:00', '3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 'N/A'),
(26, 14, '1,2', 5, 522, 'commercial', 238, 19, '2018-11-27 11:32:47', 'n unu', 'bbu', 'nnnj<has ', 7171855050500, 5050505000, 'kllk', 'N/A', 0, 0, 450, '34.0147858', '71.5998793', '52', 'Hu', 'Automatic', 'hybrid', 'Local', 7, 7, 7727, 'ybyvy', '19-Nov-2018', '11:56 PM', 4, '2018-11-20 00:00:10', '3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 'N/A'),
(27, 14, '1,2', 5, 522, 'commercial', 238, 19, '2018-11-27 11:32:47', 'n unu', 'bbu', 'nnnj<has ', 7171855050500, 5050505000, 'kllk', 'N/A', 0, 0, 450, '34.0147858', '71.5998793', '52', 'Hu', 'Automatic', 'hybrid', 'Local', 7, 7, 7727, 'ybyvy', '19-Nov-2018', '11:56 PM', 4, '2018-11-20 00:00:42', '3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 'N/A'),
(28, 14, '1,2', 5, 522, 'commercial', 238, 19, '2018-11-27 11:32:47', 'n unu', 'bbu', 'nnnj<has ', 7171855050500, 5050505000, 'kllk', 'N/A', 0, 0, 450, '34.0147858', '71.5998793', '52', 'Hu', 'Automatic', 'hybrid', 'Local', 7, 7, 7727, 'ybyvy', '19-Nov-2018', '11:56 PM', 4, '2018-11-20 00:01:34', '3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 'N/A'),
(29, 14, '2,3', 4, 5555, 'commercial', 206, 19, '2018-11-27 11:32:47', 'bubub', 'hbi', 'h7gg7', 7272782838383, 5028383838, 'kllk', 'N/A', 0, 0, 550, '34.014349', '71.5996735', '22', 'Vuv', 'Mannual', 'hybrid', 'Local', 6, 8, 1775, 'bhbubub', '20-Nov-2018', '12:00 AM', 3, '2018-11-20 00:04:13', '2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 'N/A'),
(30, 14, '2,3', 4, 5555, 'commercial', 206, 19, '2018-11-27 11:32:47', 'bubub', 'hbi', 'h7gg7', 7272782838383, 5028383838, 'kllk', 'N/A', 0, 0, 550, '34.014349', '71.5996735', '22', 'Vuv', 'Mannual', 'hybrid', 'Local', 6, 8, 1775, 'bhbubub', '20-Nov-2018', '12:00 AM', 3, '2018-11-20 00:04:32', '2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 'N/A'),
(31, 14, '2,3', 4, 5555, 'commercial', 206, 19, '2018-11-27 11:32:47', 'bubub', 'hbi', 'h7gg7', 7272782838383, 5028383838, 'kllk', 'N/A', 0, 0, 550, '34.014349', '71.5996735', '22', 'Vuv', 'Mannual', 'hybrid', 'Local', 6, 8, 1775, 'bhbubub', '20-Nov-2018', '12:00 AM', 3, '2018-11-20 00:05:21', '2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 'N/A'),
(32, 14, '1,2', 1, 5555, 'private', 3, 19, '2018-11-27 11:32:47', 'bkbkboh', 'higih8', '7y8y', 4575757576767, 57575767676, 'kllk', 'N/A', 0, 0, 5776767, '34.0143473', '71.5996739', '73443', 'Bkbkob', 'Automatic', 'diesel', 'Local', 6, 7, 6666, 'jvjvjv', '20-Nov-2018', '12:21 AM', 4, '2018-11-20 00:25:46', '2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 'N/A'),
(33, 14, '1,2', 1, 5555, 'private', 3, 19, '2018-11-27 11:32:47', 'bkbkboh', 'higih8', '7y8y', 4575757576767, 57575767676, 'kllk', 'N/A', 0, 0, 5776767, '34.0143473', '71.5996739', '73443', 'Bkbkob', 'Automatic', 'diesel', 'Local', 6, 7, 6666, 'jvjvjv', '20-Nov-2018', '12:21 AM', 4, '2018-11-20 00:25:54', '2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 'N/A'),
(34, 14, '1', 4, 47117, 'commercial', 207, 19, '2018-11-27 11:32:47', 'h h ubub', 'ubub7b', 'yvuv7v', 5755555557575, 72727272722, 'kllk', 'N/A', 0, 0, 454, '34.0143615', '71.599667', '520', ' Hu ', 'Mannual', 'hybrid', 'Local', 6, 8, 2782, ' b ', '20-Nov-2018', '12:25 AM', 3, '2018-11-20 00:29:16', '3', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 'N/A'),
(35, 17, '2,1,3', 2, 2222, 'private', 104, 41, '2018-11-27 11:32:47', 'test222222222', 'test5555', 'testreg55', 1212121212121, 21212121212, 'Peshawar', 'a123', 5555555555555, 52222222222, 1, '33.9981188', '71.4679497', '666', 'test', 'Mannual', 'hybrid', 'imported', 4, 6, 5454, 'Gul khan', '20-Nov-2018', '10:26 AM', 4, '2018-11-20 10:31:20', '1', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 5, 0, 'N/A'),
(36, 14, '1,2,5,4,3', 5, 566, 'commercial', 240, 19, '2018-11-27 11:32:47', 'jvkkviv', 'vuiviv', 'jvivi', 1730186547029, 60603303030, 'kllk', 'N/A', 0, 0, 60606, '33.9977592', '71.4680445', '55', 'Khakzkzk', 'Automatic', 'hybrid', 'Local', 7, 7, 1336, 'khan', '20-Nov-2018', '11:19 AM', 3, '2018-11-20 11:26:23', '4', 1, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 'N/A'),
(37, 14, '1,2', 4, 667, 'commercial', 206, 19, '2018-11-27 11:42:39', 'oo888', 'kids', 'kidkd', 0, 0, '', 'N/A', 0, 0, 3669, '33.9983513', '71.46868', '9797', '', 'Automatic', 'hybrid', 'Local', 6, 6, 3334, '', '27-Nov-2018', '9:28 AM', 5, '2018-11-27 09:32:05', '5', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 'Gul bhar 3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_accessories`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_accessories` (
  `vehicleaccessoryid` int(11) NOT NULL AUTO_INCREMENT,
  `accessories_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  PRIMARY KEY (`vehicleaccessoryid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `tbl_vehicle_accessories`
--

INSERT INTO `tbl_vehicle_accessories` (`vehicleaccessoryid`, `accessories_id`, `vehicle_id`) VALUES
(1, 1, 2),
(2, 3, 2),
(3, 21, 2),
(4, 2, 2),
(5, 20, 2),
(6, 10, 2),
(7, 25, 2),
(8, 6, 1),
(9, 5, 1),
(10, 4, 1),
(11, 3, 1),
(12, 2, 1),
(13, 1, 1),
(14, 5, 2),
(15, 4, 2),
(16, 3, 2),
(17, 2, 2),
(18, 1, 2),
(19, 3, 3),
(20, 2, 3),
(21, 1, 3),
(22, 5, 4),
(23, 4, 4),
(24, 3, 4),
(25, 2, 4),
(26, 1, 4),
(27, 2, 5),
(28, 5, 5),
(29, 3, 5),
(30, 15, 5),
(31, 9, 5),
(32, 5, 6),
(33, 4, 6),
(34, 3, 6),
(35, 2, 6),
(36, 1, 6),
(37, 6, 7),
(38, 5, 7),
(39, 4, 7),
(40, 3, 7),
(41, 2, 7),
(42, 1, 7),
(43, 5, 8),
(44, 4, 8),
(45, 3, 8),
(46, 2, 8),
(47, 1, 8),
(48, 1, 9),
(49, 3, 9),
(50, 2, 9),
(51, 1, 10),
(52, 3, 10),
(53, 25, 10),
(54, 2, 10),
(55, 5, 10),
(56, 4, 10),
(57, 6, 11),
(58, 5, 11),
(59, 4, 11),
(60, 3, 11),
(61, 2, 11),
(62, 1, 11),
(63, 6, 12),
(64, 5, 12),
(65, 4, 12),
(66, 3, 12),
(67, 2, 12),
(68, 1, 12),
(69, 9, 13),
(70, 8, 13),
(71, 7, 13),
(72, 6, 13),
(73, 2, 13),
(74, 1, 13),
(75, 5, 14),
(76, 4, 14),
(77, 3, 14),
(78, 2, 14),
(79, 1, 14),
(80, 1, 15),
(81, 2, 15),
(82, 4, 16),
(83, 5, 16),
(84, 7, 17),
(85, 5, 17),
(86, 4, 17),
(87, 3, 17),
(88, 2, 17),
(89, 1, 17),
(90, 1, 18),
(91, 2, 18),
(92, 4, 19),
(93, 4, 20),
(94, 3, 21),
(95, 6, 21),
(96, 8, 21),
(97, 1, 21),
(98, 12, 21),
(99, 2, 21),
(100, 7, 21),
(101, 4, 21),
(102, 13, 21),
(103, 0, 22),
(104, 0, 23),
(105, 0, 24),
(106, 0, 25),
(107, 0, 26),
(108, 0, 27),
(109, 0, 28),
(110, 6, 29),
(111, 6, 30),
(112, 6, 31),
(113, 0, 32),
(114, 0, 33),
(115, 0, 34),
(116, 5, 35),
(117, 4, 35),
(118, 3, 35),
(119, 2, 35),
(120, 1, 35),
(121, 0, 36),
(122, 5, 37);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_allotment`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_allotment` (
  `allotmentid` int(11) NOT NULL AUTO_INCREMENT,
  `departmentname` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `authorisedby` varchar(255) NOT NULL,
  `upload` varchar(255) NOT NULL,
  `vechicle_id` int(11) NOT NULL,
  `systemdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`allotmentid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_vehicle_allotment`
--

INSERT INTO `tbl_vehicle_allotment` (`allotmentid`, `departmentname`, `description`, `designation`, `authorisedby`, `upload`, `vechicle_id`, `systemdate`) VALUES
(1, '123', 'fasdf', 'etst', 'DG', '1723608040.jpg', 16, '2018-11-20 14:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_auction`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_auction` (
  `allotmentid` int(11) NOT NULL AUTO_INCREMENT,
  `departmentname` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `authorisedby` varchar(255) NOT NULL,
  `upload` varchar(255) NOT NULL,
  `vechicle_id` int(11) NOT NULL,
  `systemdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`allotmentid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_formb`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_formb` (
  `formbid` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT 'N/A',
  `formbdate` varchar(255) DEFAULT NULL,
  `formbtime` varchar(255) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `long` float DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vechicle_id` int(11) DEFAULT NULL,
  `form_bno` int(11) DEFAULT NULL,
  `systemdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`formbid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_vehicle_formb`
--

INSERT INTO `tbl_vehicle_formb` (`formbid`, `description`, `formbdate`, `formbtime`, `lat`, `long`, `user_id`, `vechicle_id`, `form_bno`, `systemdate`) VALUES
(1, '', '13-Nov-2018', '2:37 PM', 34.0104, 71.5584, 21, 1, 6652, '2018-11-13 14:41:26'),
(2, '', '14-Nov-2018', '12:42 PM', 34.0104, 71.5584, 21, 8, 6398, '2018-11-14 12:45:13'),
(3, '', '14-Nov-2018', '12:43 PM', 34.0104, 71.5584, 21, 7, 6358, '2018-11-14 12:46:22'),
(4, '', '14-Nov-2018', '12:46 PM', 34.0104, 71.5584, 21, 4, 6325, '2018-11-14 12:49:33'),
(5, 'Iuyttgghjh ', '14-Nov-2018', '12:43 PM', 34.0104, 71.5584, 27, 6, 5556, '2018-11-14 12:50:10'),
(6, '', '14-Nov-2018', '12:48 PM', 34.0104, 71.5584, 21, 3, 6325, '2018-11-14 12:50:52'),
(7, 'chk', '14-Nov-2018', '1:36 PM', 34.0104, 71.5584, 21, 10, 2356, '2018-11-14 13:39:38'),
(8, '', '15-Nov-2018', '11:31 AM', 33.9981, 71.4686, 21, 11, 3625, '2018-11-15 11:34:34'),
(9, '', '15-Nov-2018', '12:53 PM', 33.9981, 71.4685, 21, 13, 6325, '2018-11-15 12:56:12'),
(10, '', '15-Nov-2018', '12:54 PM', 33.9981, 71.4686, 21, 12, 6325, '2018-11-15 12:56:52'),
(11, 'ok', '19-Nov-2018', '9:59 AM', 33.9986, 71.4688, 21, 16, 2222, '2018-11-19 10:02:35'),
(12, 'this is a test', '20-Nov-2018', '10:34 AM', 33.9979, 71.4682, 21, 35, 8485, '2018-11-20 10:37:32'),
(13, '', '20-Nov-2018', '12:42 PM', 33.9981, 71.4685, 21, 5, 6325, '2018-11-20 12:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_images`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_images` (
  `imageid` int(11) NOT NULL AUTO_INCREMENT,
  `imagepath` varchar(250) NOT NULL,
  `vechile_id` int(11) NOT NULL,
  PRIMARY KEY (`imageid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=279 ;

--
-- Dumping data for table `tbl_vehicle_images`
--

INSERT INTO `tbl_vehicle_images` (`imageid`, `imagepath`, `vechile_id`) VALUES
(1, '20181113_140129_622090336.jpg', 1),
(2, '20181113_140135_2063099827.jpg', 1),
(3, '20181113_140141_1767328200.jpg', 1),
(4, '20181113_140146_1861948010.jpg', 1),
(5, '20181113_140151_1135134979.jpg', 1),
(6, '20181113_140159_414465206.jpg', 1),
(7, '20181113_140203_1061109612.jpg', 1),
(8, '20181113_141839_61412639.jpg', 2),
(9, '20181113_141853_246609279.jpg', 2),
(10, '20181113_141859_656775151.jpg', 2),
(11, '20181113_141906_344912014.jpg', 2),
(12, '20181113_141916_-281580683.jpg', 2),
(13, '20181113_141922_935255560.jpg', 2),
(14, '20181113_141933_-879637448.jpg', 2),
(15, '20181113_142832_9190520375802241718.jpg', 1),
(16, '20181113_142838_3994205830347083292.jpg', 1),
(17, '20181113_142844_5571769425338925047.jpg', 1),
(18, '20181113_142848_3559119393074403211.jpg', 1),
(19, '20181113_142851_8724270449846431033.jpg', 1),
(20, '20181113_142855_3356004297531540894.jpg', 1),
(21, '20181113_142859_4179297567784941855.jpg', 1),
(22, '20181113_142906_1694631235981782102.jpg', 1),
(23, '20181114_092626_7719115177970571035.jpg', 2),
(24, '20181114_092630_5932451128597968557.jpg', 2),
(25, '20181114_092635_4258120312779320255.jpg', 2),
(26, '20181114_092639_5695239463241010373.jpg', 2),
(27, '20181114_092643_2011765063566806714.jpg', 2),
(28, '20181114_092650_2528655259857514606.jpg', 2),
(29, '20181114_092654_6593354162751328369.jpg', 2),
(30, '20181114_092807_134710347267669834.jpg', 3),
(31, '20181114_092812_637596548902355005.jpg', 3),
(32, '20181114_092816_5605930774124114185.jpg', 3),
(33, '20181114_092821_5289319866921657316.jpg', 3),
(34, '20181114_092827_303012070238726275.jpg', 3),
(35, '20181114_092835_1581740631434969927.jpg', 3),
(36, '20181114_092839_7770080476416004322.jpg', 3),
(37, '20181114_092955_8800038004849870248.jpg', 4),
(38, '20181114_092959_1355122472869079900.jpg', 4),
(39, '20181114_093003_5142485440751771393.jpg', 4),
(40, '20181114_093007_2592134417075039340.jpg', 4),
(41, '20181114_093010_1907267840213421303.jpg', 4),
(42, '20181114_093015_7106142921465802322.jpg', 4),
(43, '20181114_093019_5597890134040741248.jpg', 4),
(44, '20181114_092858_1892473558.jpg', 5),
(45, '20181114_092907_-529820764.jpg', 5),
(46, '20181114_092914_780009132.jpg', 5),
(47, '20181114_092922_1789516695.jpg', 5),
(48, '20181114_092929_846105630.jpg', 5),
(49, '20181114_092934_-1063106063.jpg', 5),
(50, '20181114_092939_-306093140.jpg', 5),
(51, '20181114_093618_6134276820871229568.jpg', 6),
(52, '20181114_093623_878697499055403581.jpg', 6),
(53, '20181114_093627_5047340640893627342.jpg', 6),
(54, '20181114_093631_5826875451166104677.jpg', 6),
(55, '20181114_093635_777452538243392305.jpg', 6),
(56, '20181114_093639_908733758477633593.jpg', 6),
(57, '20181114_093643_9059043570007969102.jpg', 6),
(58, '20181114_115537_3958794395113556354.jpg', 7),
(59, '20181114_115551_1666022086302818776.jpg', 7),
(60, '20181114_115556_7485766786995511531.jpg', 7),
(61, '20181114_115603_5084220074749766714.jpg', 7),
(62, '20181114_115608_6290002117945528467.jpg', 7),
(63, '20181114_115611_5025015760595313561.jpg', 7),
(64, '20181114_115616_5855807218879325814.jpg', 7),
(65, '20181114_115741_5142360213014789771.jpg', 8),
(66, '20181114_115747_3811024644546021209.jpg', 8),
(67, '20181114_115751_6329044882758280460.jpg', 8),
(68, '20181114_115755_6506196621905703825.jpg', 8),
(69, '20181114_115800_4831501395449190589.jpg', 8),
(70, '20181114_115804_8463462813777847547.jpg', 8),
(71, '20181114_115808_1652257589277382672.jpg', 8),
(72, '20181114_115644_2033127581.jpg', 9),
(73, '20181114_115654_2068869220.jpg', 9),
(74, '20181114_115706_1568763360.jpg', 9),
(75, '20181114_115718_1416253231.jpg', 9),
(76, '20181114_115724_1251945540.jpg', 9),
(77, '20181114_115732_363111575.jpg', 9),
(78, '20181114_115736_975600810.jpg', 9),
(79, '20181114_120154_1222954351.jpg', 10),
(80, '20181114_120206_684691804.jpg', 10),
(81, '20181114_120215_157015715.jpg', 10),
(82, '20181114_120220_1234184076.jpg', 10),
(83, '20181114_120225_1637133485.jpg', 10),
(84, '20181114_120231_1949981941.jpg', 10),
(85, '20181114_120242_900381408.jpg', 10),
(86, '20181114_120248_1197481369.jpg', 10),
(87, '20181115_112924_9048624784780388684.jpg', 11),
(88, '20181115_112929_8861786390976861042.jpg', 11),
(89, '20181115_112933_8239148311653432744.jpg', 11),
(90, '20181115_112937_6162335009736734630.jpg', 11),
(91, '20181115_112942_2502366822964156696.jpg', 11),
(92, '20181115_112946_3355605310162963862.jpg', 11),
(93, '20181115_112950_7470968994452833858.jpg', 11),
(94, '20181115_120056_6829609255114000569.jpg', 12),
(95, '20181115_120103_1048806989000123369.jpg', 12),
(96, '20181115_120108_1058838680654750675.jpg', 12),
(97, '20181115_120112_7981510283350986491.jpg', 12),
(98, '20181115_120116_6309465348324847442.jpg', 12),
(99, '20181115_120120_1933338803819686808.jpg', 12),
(100, '20181115_120124_5044083728350709309.jpg', 12),
(101, '20181115_121005_3765887908734992656.jpg', 13),
(102, '20181115_121009_4639211039433637931.jpg', 13),
(103, '20181115_121014_8405244654263272884.jpg', 13),
(104, '20181115_121019_5044840619511801999.jpg', 13),
(105, '20181115_121024_1009283695285571059.jpg', 13),
(106, '20181115_121029_4345109747798436222.jpg', 13),
(107, '20181115_121033_4005028433595764971.jpg', 13),
(108, '20181115_124748_4817142189658490102.jpg', 14),
(109, '20181115_124752_4572537348355931884.jpg', 14),
(110, '20181115_124756_1196590259459459895.jpg', 14),
(111, '20181115_124801_6086956519089897488.jpg', 14),
(112, '20181115_124806_434435110539668362.jpg', 14),
(113, '20181115_124810_5306238625267934451.jpg', 14),
(114, '20181115_124815_6280979462407534098.jpg', 14),
(115, '20181119_094543_473696468.jpg', 15),
(116, '20181119_094555_-298623416.jpg', 15),
(117, '20181119_094559_463338083.jpg', 15),
(118, '20181119_094603_1633699520.jpg', 15),
(119, '20181119_094608_453831694.jpg', 15),
(120, '20181119_094612_119092122.jpg', 15),
(121, '20181119_094616_-1064732370.jpg', 15),
(122, '20181119_094727_-1851237150.jpg', 16),
(123, '20181119_094732_810621602.jpg', 16),
(124, '20181119_094736_692252012.jpg', 16),
(125, '20181119_094741_435181250.jpg', 16),
(126, '20181119_094744_-2113367348.jpg', 16),
(127, '20181119_094748_-204783282.jpg', 16),
(128, '20181119_094752_1173111942.jpg', 16),
(129, '20181119_095556_6855185622913645413.jpg', 17),
(130, '20181119_095603_9161680323107895482.jpg', 17),
(131, '20181119_095608_8254574862901856518.jpg', 17),
(132, '20181119_095613_2583601485897737550.jpg', 17),
(133, '20181119_095618_6647585162978050684.jpg', 17),
(134, '20181119_095622_6867263580998663007.jpg', 17),
(135, '20181119_095627_381632230471013550.jpg', 17),
(136, '20181119_114907_473291672.jpg', 18),
(137, '20181119_114915_-214110947.jpg', 18),
(138, '20181119_114919_28013318.jpg', 18),
(139, '20181119_114924_171838222.jpg', 18),
(140, '20181119_114928_-473185189.jpg', 18),
(141, '20181119_114931_-1862024430.jpg', 18),
(142, '20181119_114937_1854846775.jpg', 18),
(143, '20181119_165540_714448641.jpg', 19),
(144, '20181119_165549_246816600.jpg', 19),
(145, '20181119_165557_1066875823.jpg', 19),
(146, '20181119_165604_622051698.jpg', 19),
(147, '20181119_165613_1800218829.jpg', 19),
(148, '20181119_165621_333055788.jpg', 19),
(149, '20181119_165630_825972098.jpg', 19),
(150, '20181119_165540_714448641.jpg', 20),
(151, '20181119_165549_246816600.jpg', 20),
(152, '20181119_165557_1066875823.jpg', 20),
(153, '20181119_165604_622051698.jpg', 20),
(154, '20181119_165613_1800218829.jpg', 20),
(155, '20181119_165621_333055788.jpg', 20),
(156, '20181119_165630_825972098.jpg', 20),
(157, '20181119_170608_127582165.jpg', 21),
(158, '20181119_170616_439358369.jpg', 21),
(159, '20181119_170622_1736646459.jpg', 21),
(160, '20181119_170629_1817083114.jpg', 21),
(161, '20181119_170636_751542177.jpg', 21),
(162, '20181119_170646_355609197.jpg', 21),
(163, '20181119_170654_585059568.jpg', 21),
(164, '20181119_170701_697856850.jpg', 21),
(165, '20181119_233904_258670679.jpg', 22),
(166, '20181119_233916_1078422624.jpg', 22),
(167, '20181119_233924_1142688206.jpg', 22),
(168, '20181119_233932_813813938.jpg', 22),
(169, '20181119_233941_131884676.jpg', 22),
(170, '20181119_233947_199268539.jpg', 22),
(171, '20181119_233953_716108148.jpg', 22),
(172, '20181119_234811_1182949512.jpg', 23),
(173, '20181119_234819_610716027.jpg', 23),
(174, '20181119_234824_1197779309.jpg', 23),
(175, '20181119_234829_1779128165.jpg', 23),
(176, '20181119_234840_1078108867.jpg', 23),
(177, '20181119_234845_1190753058.jpg', 23),
(178, '20181119_234852_1658349999.jpg', 23),
(179, '20181119_235643_1580158162.jpg', 24),
(180, '20181119_235652_1074294645.jpg', 24),
(181, '20181119_235658_1264053793.jpg', 24),
(182, '20181119_235707_1607507494.jpg', 24),
(183, '20181119_235712_704631596.jpg', 24),
(184, '20181119_235717_1581982674.jpg', 24),
(185, '20181119_235722_538292261.jpg', 24),
(186, '20181119_235643_1580158162.jpg', 25),
(187, '20181119_235652_1074294645.jpg', 25),
(188, '20181119_235658_1264053793.jpg', 25),
(189, '20181119_235707_1607507494.jpg', 25),
(190, '20181119_235712_704631596.jpg', 25),
(191, '20181119_235717_1581982674.jpg', 25),
(192, '20181119_235722_538292261.jpg', 25),
(193, '20181119_235643_1580158162.jpg', 26),
(194, '20181119_235652_1074294645.jpg', 26),
(195, '20181119_235658_1264053793.jpg', 26),
(196, '20181119_235707_1607507494.jpg', 26),
(197, '20181119_235712_704631596.jpg', 26),
(198, '20181119_235717_1581982674.jpg', 26),
(199, '20181119_235722_538292261.jpg', 26),
(200, '20181119_235643_1580158162.jpg', 27),
(201, '20181119_235652_1074294645.jpg', 27),
(202, '20181119_235658_1264053793.jpg', 27),
(203, '20181119_235707_1607507494.jpg', 27),
(204, '20181119_235712_704631596.jpg', 27),
(205, '20181119_235717_1581982674.jpg', 27),
(206, '20181119_235722_538292261.jpg', 27),
(207, '20181119_235643_1580158162.jpg', 28),
(208, '20181119_235652_1074294645.jpg', 28),
(209, '20181119_235658_1264053793.jpg', 28),
(210, '20181119_235707_1607507494.jpg', 28),
(211, '20181119_235712_704631596.jpg', 28),
(212, '20181119_235717_1581982674.jpg', 28),
(213, '20181119_235722_538292261.jpg', 28),
(214, '20181120_000104_1747360999.jpg', 29),
(215, '20181120_000112_554173116.jpg', 29),
(216, '20181120_000122_2048951423.jpg', 29),
(217, '20181120_000127_324271255.jpg', 29),
(218, '20181120_000132_158705221.jpg', 29),
(219, '20181120_000138_1689322038.jpg', 29),
(220, '20181120_000117_922172803.jpg', 29),
(221, '20181120_000104_1747360999.jpg', 30),
(222, '20181120_000112_554173116.jpg', 30),
(223, '20181120_000122_2048951423.jpg', 30),
(224, '20181120_000127_324271255.jpg', 30),
(225, '20181120_000132_158705221.jpg', 30),
(226, '20181120_000138_1689322038.jpg', 30),
(227, '20181120_000117_922172803.jpg', 30),
(228, '20181120_000104_1747360999.jpg', 31),
(229, '20181120_000112_554173116.jpg', 31),
(230, '20181120_000122_2048951423.jpg', 31),
(231, '20181120_000127_324271255.jpg', 31),
(232, '20181120_000132_158705221.jpg', 31),
(233, '20181120_000138_1689322038.jpg', 31),
(234, '20181120_000117_922172803.jpg', 31),
(235, '20181120_002225_1474338762.jpg', 32),
(236, '20181120_002239_543421781.jpg', 32),
(237, '20181120_002247_922220486.jpg', 32),
(238, '20181120_002256_430315999.jpg', 32),
(239, '20181120_002301_1370425558.jpg', 32),
(240, '20181120_002307_157812228.jpg', 32),
(241, '20181120_002313_65143751.jpg', 32),
(242, '20181120_002225_1474338762.jpg', 33),
(243, '20181120_002239_543421781.jpg', 33),
(244, '20181120_002247_922220486.jpg', 33),
(245, '20181120_002256_430315999.jpg', 33),
(246, '20181120_002301_1370425558.jpg', 33),
(247, '20181120_002307_157812228.jpg', 33),
(248, '20181120_002313_65143751.jpg', 33),
(249, '20181120_002614_1953630267.jpg', 34),
(250, '20181120_002626_131961317.jpg', 34),
(251, '20181120_002631_1685156254.jpg', 34),
(252, '20181120_002637_1431508400.jpg', 34),
(253, '20181120_002643_671419374.jpg', 34),
(254, '20181120_002647_800681918.jpg', 34),
(255, '20181120_002652_1995512647.jpg', 34),
(256, '20181120_102831_5291836128498501622.jpg', 35),
(257, '20181120_102847_8304204248336757257.jpg', 35),
(258, '20181120_102850_2805241601654590779.jpg', 35),
(259, '20181120_102854_3813177671425439377.jpg', 35),
(260, '20181120_102857_6255566248627007383.jpg', 35),
(261, '20181120_102903_7849413239494080858.jpg', 35),
(262, '20181120_102909_2204481568996375585.jpg', 35),
(263, '20181120_102913_5950035749837291456.jpg', 35),
(264, '20181120_112200_1504207308.jpg', 36),
(265, '20181120_112209_711011276.jpg', 36),
(266, '20181120_112214_1916847528.jpg', 36),
(267, '20181120_112218_2102521073.jpg', 36),
(268, '20181120_112222_225139490.jpg', 36),
(269, '20181120_112227_689496630.jpg', 36),
(270, '20181120_112233_770394770.jpg', 36),
(271, '20181127_092922_1570100295.jpg', 37),
(272, '20181127_092932_406873081.jpg', 37),
(273, '20181127_092938_264451937.jpg', 37),
(274, '20181127_092944_1023003568.jpg', 37),
(275, '20181127_092951_1065586449.jpg', 37),
(276, '20181127_092955_30519861.jpg', 37),
(277, '20181127_093001_802606697.jpg', 37),
(278, '20181127_093007_1379209413.jpg', 37);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_model`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_model` (
  `makeid` int(11) NOT NULL AUTO_INCREMENT,
  `makename` varchar(250) NOT NULL,
  PRIMARY KEY (`makeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `tbl_vehicle_model`
--

INSERT INTO `tbl_vehicle_model` (`makeid`, `makename`) VALUES
(1, 'Toyota'),
(2, 'Suzuki'),
(3, 'Honda'),
(4, 'Daihatsu'),
(5, 'Nissan'),
(6, 'Adam'),
(7, 'Alfa Romeo'),
(8, 'Audi'),
(9, 'Austin'),
(10, 'Bentley'),
(11, 'BMW'),
(12, 'Buick'),
(13, 'Cadillac'),
(14, 'Changan'),
(15, 'Chery'),
(16, 'Chevrolet'),
(17, 'Chrysler'),
(18, 'Citroen'),
(19, 'Classic Cars'),
(20, 'Daehan'),
(21, 'Daewoo'),
(22, 'Daimler'),
(23, 'Datsun'),
(24, 'DFSK'),
(25, 'Dodge'),
(26, 'Dongfeng'),
(27, 'FAW'),
(28, 'Ferrari'),
(29, 'Fiat'),
(30, 'Ford'),
(31, 'Geely'),
(32, 'GMC'),
(33, 'Golden Dragon'),
(34, 'Golf'),
(35, 'Hillman'),
(36, 'Hino'),
(37, 'Hummer'),
(38, 'Hyundai'),
(39, 'Isuzu'),
(40, 'JAC'),
(41, 'Jaguar'),
(42, 'Jeep'),
(43, 'JW Forland'),
(44, 'Kaiser Jeep'),
(45, 'KIA'),
(46, 'Lada'),
(47, 'Lamborghini'),
(48, 'Land Rover'),
(49, 'Lexus'),
(50, 'Lincoln'),
(51, 'Maserati'),
(52, 'Master'),
(53, 'Mazda'),
(54, 'Mercedes Benz'),
(55, 'MG'),
(56, 'MINI'),
(57, 'Mitsubishi'),
(58, 'Morris'),
(59, 'Moto Guzzi'),
(60, 'Oldsmobile'),
(61, 'Opel'),
(62, 'Others'),
(63, 'Peugeot'),
(64, 'Plymouth'),
(65, 'Pontiac'),
(66, 'Porsche'),
(67, 'Proton'),
(68, 'Range Rover'),
(69, 'Renault'),
(70, 'Rolls Royce'),
(71, 'Roma'),
(72, 'Rover'),
(73, 'Royal Enfield'),
(74, 'Saab'),
(75, 'Scion'),
(76, 'Skoda'),
(77, 'Smart'),
(78, 'Sogo'),
(79, 'Sokon'),
(80, 'SsangYong'),
(81, 'Subaru'),
(82, 'Tesla'),
(83, 'Triumph'),
(84, 'United'),
(85, 'Vauxhall'),
(86, 'Volkswagen'),
(87, 'Volvo'),
(88, 'Willys');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_modelyear`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_modelyear` (
  `modelid` int(11) NOT NULL AUTO_INCREMENT,
  `modelyear` int(11) NOT NULL,
  PRIMARY KEY (`modelid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `tbl_vehicle_modelyear`
--

INSERT INTO `tbl_vehicle_modelyear` (`modelid`, `modelyear`) VALUES
(1, 1947),
(2, 1948),
(3, 1949),
(4, 1950),
(5, 1951),
(6, 1952),
(7, 1953),
(8, 1954),
(9, 1955),
(10, 1956),
(11, 1957),
(12, 1958),
(13, 1959),
(14, 1960),
(15, 1961),
(16, 1962),
(17, 1963),
(18, 1964),
(19, 1965),
(20, 1966),
(21, 1967),
(22, 1968),
(23, 1969),
(24, 1970),
(25, 1971),
(26, 1972),
(27, 1973),
(28, 1974),
(29, 1975),
(30, 1976),
(31, 1977),
(32, 1978),
(33, 1979),
(34, 1980),
(35, 1981),
(36, 1982),
(37, 1983),
(38, 1984),
(39, 1985),
(40, 1986),
(41, 1987),
(42, 1988),
(43, 1989),
(44, 1990),
(45, 1991),
(46, 1992),
(47, 1993),
(48, 1994),
(49, 1995),
(50, 1996),
(51, 1997),
(52, 1998),
(53, 1999),
(54, 2000),
(55, 2001),
(56, 2002),
(57, 2003),
(58, 2004),
(59, 2005),
(60, 2006),
(61, 2007),
(62, 2008),
(63, 2009),
(64, 2010),
(65, 2011),
(66, 2012),
(67, 2013),
(68, 2014),
(69, 2015),
(70, 2016),
(71, 2017),
(72, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_model_sub`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_model_sub` (
  `submakeid` int(11) NOT NULL AUTO_INCREMENT,
  `make_parent_id` int(11) NOT NULL,
  `submakename` varchar(250) NOT NULL,
  PRIMARY KEY (`submakeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=295 ;

--
-- Dumping data for table `tbl_vehicle_model_sub`
--

INSERT INTO `tbl_vehicle_model_sub` (`submakeid`, `make_parent_id`, `submakename`) VALUES
(1, 1, 'Corolla'),
(2, 1, 'Vitz'),
(3, 1, 'Passo'),
(4, 1, 'Aqua'),
(5, 1, 'Prius'),
(6, 1, 'Allion'),
(7, 1, 'Alphard'),
(8, 1, 'Alphard G'),
(9, 1, 'Alphard Hybrid'),
(10, 1, 'Alphard V'),
(11, 1, 'Altezza'),
(12, 1, 'Aristo'),
(13, 1, 'Auris'),
(14, 1, 'Avalon'),
(15, 1, 'Avanza'),
(16, 1, 'Avensis'),
(17, 1, 'Aygo'),
(18, 1, 'B B'),
(19, 1, 'Belta'),
(20, 1, 'Biyana'),
(21, 1, 'C-HR'),
(22, 1, 'Caldina'),
(23, 1, 'Cami'),
(24, 1, 'Camry'),
(25, 1, 'Carina'),
(26, 1, 'Celica'),
(27, 1, 'Chaser'),
(28, 1, 'Coaster'),
(29, 1, 'Corolla Assista'),
(30, 1, 'Corolla Axio'),
(31, 1, 'Corolla Fielder'),
(32, 1, 'Corona'),
(33, 1, 'Cressida'),
(34, 1, 'Cresta'),
(35, 1, 'Crown'),
(36, 1, 'Duet'),
(37, 1, 'Echo'),
(38, 1, 'Ecotec'),
(39, 1, 'Esquire'),
(40, 1, 'Estima'),
(41, 1, 'Fj Cruiser'),
(42, 1, 'Fortuner'),
(43, 1, 'Gaia'),
(44, 1, 'Harrier'),
(45, 1, 'Hiace'),
(46, 1, 'Hilux'),
(47, 1, 'iQ'),
(48, 1, 'ISIS'),
(49, 1, 'IST'),
(50, 1, 'Kluger'),
(51, 1, 'Land Cruiser'),
(52, 1, 'Lite Ace'),
(53, 1, 'Lucida'),
(54, 1, 'Mark II'),
(55, 1, 'Mark X'),
(56, 1, 'Matrix'),
(57, 1, 'MR'),
(58, 1, 'Noah'),
(59, 1, 'Other'),
(60, 1, 'Pickup'),
(61, 1, 'Pixis Epoch'),
(62, 1, 'Platz'),
(63, 1, 'Porte'),
(64, 1, 'Prado'),
(65, 1, 'Premio'),
(66, 1, 'Previa'),
(67, 1, 'Prius Alpha'),
(68, 1, 'Probox'),
(69, 1, 'Ractis'),
(70, 1, 'Raum'),
(71, 1, 'Rav'),
(72, 1, 'Roomy'),
(73, 1, 'Runx'),
(74, 1, 'Rush'),
(75, 1, 'Sai'),
(76, 1, 'Sera'),
(77, 1, 'Sienta'),
(78, 1, 'Soarer'),
(79, 1, 'Spacio'),
(80, 1, 'Spade'),
(81, 1, 'Sprinter'),
(82, 1, 'Starlet'),
(83, 1, 'Succeed'),
(84, 1, 'Supra'),
(85, 1, 'Surf'),
(86, 1, 'Tacoma'),
(87, 1, 'Tank'),
(88, 1, 'Tercel'),
(89, 1, 'Town Ace'),
(90, 1, 'Toyo Ace'),
(91, 1, 'Tundra'),
(92, 1, 'Urban Cruiser'),
(93, 1, 'Van'),
(94, 1, 'Vanguard'),
(95, 1, 'Verossa'),
(96, 1, 'Vios'),
(97, 1, 'Voxy'),
(98, 1, 'Will'),
(99, 1, 'Wish'),
(100, 1, 'Yaris'),
(101, 2, 'Mehran'),
(102, 2, 'Cultus'),
(103, 2, 'Alto'),
(104, 2, 'Wagon R'),
(105, 2, 'Every'),
(106, 2, 'Aerio'),
(107, 2, 'Alto Lapin'),
(108, 2, 'APV'),
(109, 2, 'Baleno'),
(110, 2, 'Bolan'),
(111, 2, 'Cappuccino'),
(112, 2, 'Carry'),
(113, 2, 'Cervo'),
(114, 2, 'Ciaz'),
(115, 2, 'Escudo'),
(116, 2, 'Every Wagon'),
(117, 2, 'FX'),
(118, 2, 'Gn'),
(119, 2, 'Hustler'),
(120, 2, 'Ignis'),
(121, 2, 'Jimny'),
(122, 2, 'Jimny Sierra'),
(123, 2, 'Kei'),
(124, 2, 'Khyber'),
(125, 2, 'Kizashi'),
(126, 2, 'Landy'),
(127, 2, 'Liana'),
(128, 2, 'Lj'),
(129, 2, 'Margalla'),
(130, 2, 'Mega Carry Xtra'),
(131, 2, 'MR Wagon'),
(132, 2, 'Other'),
(133, 2, 'Palette'),
(134, 2, 'Palette Sw'),
(135, 2, 'Potohar'),
(136, 2, 'Ravi'),
(137, 2, 'Samuari'),
(138, 2, 'Sj'),
(139, 2, 'Solio'),
(140, 2, 'Solio Bandit'),
(141, 2, 'Spacia'),
(142, 2, 'Splash'),
(143, 2, 'Swift'),
(144, 2, 'Sx'),
(145, 2, 'Twin'),
(146, 2, 'Vitara'),
(147, 3, 'Civic'),
(148, 3, 'City'),
(149, 3, 'Vezel'),
(150, 3, 'N Wgn'),
(151, 3, 'Accord'),
(152, 3, 'Accord Tourer'),
(153, 3, 'Acty'),
(154, 3, 'Acura'),
(155, 3, 'Airwave'),
(156, 3, 'Beat'),
(157, 3, 'BR-V'),
(158, 3, 'Civic Hybrid'),
(159, 3, 'Concerto'),
(160, 3, 'Cr X'),
(161, 3, 'CR-V'),
(162, 3, 'CR-Z Sports Hybrid'),
(163, 3, 'Cross Road'),
(164, 3, 'Element'),
(165, 3, 'Ferio'),
(166, 3, 'Ferio'),
(167, 3, 'Fit'),
(168, 3, 'Fit Aria'),
(169, 3, 'Freed'),
(170, 3, 'Grace Hybrid'),
(171, 3, 'HR-V'),
(172, 3, 'Insight'),
(173, 3, 'Insight Exclusive'),
(174, 3, 'Inspire'),
(175, 3, 'Integra'),
(176, 3, 'Jade'),
(177, 3, 'Jazz'),
(178, 3, 'Life'),
(179, 3, 'Mobilio'),
(180, 3, 'N Box'),
(181, 3, 'N Box Custom'),
(182, 3, 'N Box Plus'),
(183, 3, 'N Box Plus Custom'),
(184, 3, 'N Box Slash'),
(185, 3, 'N One'),
(186, 3, 'Odyssey'),
(187, 3, 'Other'),
(188, 3, 'Partner'),
(189, 3, 'Passport'),
(190, 3, 'Prelude'),
(191, 3, 'S'),
(192, 3, 'S'),
(193, 3, 'Spike'),
(194, 3, 'Stepwagon'),
(195, 3, 'Stepwagon Spada'),
(196, 3, 'Stream'),
(197, 3, 'Thats'),
(198, 3, 'Today'),
(199, 3, 'Vamos'),
(200, 3, 'Vamos Hobio'),
(201, 3, 'Zest'),
(202, 3, 'Zest Spark'),
(203, 4, 'Mira'),
(204, 4, 'Cuore'),
(205, 4, 'Move'),
(206, 4, 'Hijet'),
(207, 4, 'Charade'),
(208, 4, 'Atrai Wagon'),
(209, 4, 'Bego'),
(210, 4, 'Boon'),
(211, 4, 'Cast'),
(212, 4, 'Charmant'),
(213, 4, 'Coo'),
(214, 4, 'Copen'),
(215, 4, 'Esse'),
(216, 4, 'Feroza'),
(217, 4, 'Gran Max'),
(218, 4, 'Mira Cocoa'),
(219, 4, 'Mira Gino'),
(220, 4, 'Move Conte'),
(221, 4, 'Move Latte'),
(222, 4, 'Naked'),
(223, 4, 'Opti'),
(224, 4, 'Other'),
(225, 4, 'Rocky'),
(226, 4, 'Sirion'),
(227, 4, 'Sonica'),
(228, 4, 'Storia'),
(229, 4, 'Tanto'),
(230, 4, 'Terios'),
(231, 4, 'Terios Kid'),
(232, 4, 'Wake'),
(233, 4, 'Xenia'),
(234, 5, 'Dayz'),
(235, 5, 'Dayz Highway Star'),
(236, 5, 'Clipper'),
(237, 5, 'Sunny'),
(238, 5, 'Juke'),
(239, 5, 'AD Van'),
(240, 5, 'Almera'),
(241, 5, 'Blue Bird'),
(242, 5, 'Bluebird Sylphy'),
(243, 5, 'Caravan'),
(244, 5, 'Cedric'),
(245, 5, 'Cefiro'),
(246, 5, 'Cima'),
(247, 5, 'Cube'),
(248, 5, 'Dualis'),
(249, 5, 'Elgrand'),
(250, 5, 'Figaro'),
(251, 5, 'Fuga'),
(252, 5, 'Gloria'),
(253, 5, 'GT-R'),
(254, 5, 'Infinity'),
(255, 5, 'Kix'),
(256, 5, 'Lafesta'),
(257, 5, 'Latio'),
(258, 5, 'Leaf'),
(259, 5, 'Liberty'),
(260, 5, 'March'),
(261, 5, 'Maxima'),
(262, 5, 'Micra'),
(263, 5, 'Moco'),
(264, 5, 'Murrano'),
(265, 5, 'Navara'),
(266, 5, 'Note'),
(267, 5, 'Nv Vanette Wagon'),
(268, 5, 'Nv Caravan Wagon'),
(269, 5, 'Other'),
(270, 5, 'Otti'),
(271, 5, 'Path Finder'),
(272, 5, 'Patrol'),
(273, 5, 'Pickup'),
(274, 5, 'Pino'),
(275, 5, 'Pixo'),
(276, 5, 'President'),
(277, 5, 'Primera'),
(278, 5, 'Pulsar'),
(279, 5, 'Qashqai'),
(280, 5, 'Qashqai +'),
(281, 5, 'Roox'),
(282, 5, 'Safari'),
(283, 5, 'Serena'),
(284, 5, 'Skyline'),
(285, 5, 'Skyline Crossover'),
(286, 5, 'Stagea'),
(287, 5, 'Sylphy'),
(288, 5, 'Terrano'),
(289, 5, 'Tiida'),
(290, 5, 'Titan'),
(291, 5, 'Vanette'),
(292, 5, 'Wingroad'),
(293, 5, 'X Trail'),
(294, 5, 'Z Series');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_seized_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_seized_categories` (
  `siezedid` int(11) NOT NULL AUTO_INCREMENT,
  `seizedtype` varchar(250) NOT NULL COMMENT 'this is seized category table',
  PRIMARY KEY (`siezedid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_vehicle_seized_categories`
--

INSERT INTO `tbl_vehicle_seized_categories` (`siezedid`, `seizedtype`) VALUES
(1, 'Suspicious Chasis No'),
(2, 'Suspicious Registration No'),
(3, 'Suspicious Documents'),
(4, 'Suspicious Cavaties'),
(5, 'Narcotics');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_status`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_status` (
  `vehiclestatusid` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `district_id` int(11) NOT NULL,
  PRIMARY KEY (`vehiclestatusid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=153 ;

--
-- Dumping data for table `tbl_vehicle_status`
--

INSERT INTO `tbl_vehicle_status` (`vehiclestatusid`, `vehicle_id`, `user_id`, `status_id`, `createdat`, `updatedat`, `district_id`) VALUES
(1, 1, 30, 1, '2018-11-13 09:31:12', '2018-11-13 09:31:12', 17),
(2, 1, 32, 2, '2018-11-13 09:32:27', '2018-11-13 09:32:27', 17),
(3, 1, 32, 4, '2018-11-13 09:34:18', '2018-11-13 09:34:18', 17),
(4, 1, 32, 3, '2018-11-13 09:34:18', '2018-11-13 09:34:18', 0),
(5, 1, 32, 5, '2018-11-13 09:34:18', '2018-11-13 09:34:18', 17),
(6, 1, 21, 11, '2018-11-13 09:41:26', '2018-11-13 09:41:26', 0),
(7, 1, 21, 12, '2018-11-13 09:55:13', '2018-11-13 09:55:13', 0),
(8, 1, 21, 13, '2018-11-13 10:06:39', '2018-11-13 10:06:39', 0),
(9, 1, 21, 14, '2018-11-13 10:11:48', '2018-11-13 10:11:48', 0),
(10, 1, 21, 14, '2018-11-13 10:11:56', '2018-11-13 10:11:56', 0),
(11, 1, 32, 7, '2018-11-13 10:17:48', '2018-11-13 10:17:48', 17),
(12, 1, 32, 9, '2018-11-13 10:19:04', '2018-11-13 10:19:04', 17),
(13, 2, 30, 1, '2018-11-14 04:28:58', '2018-11-14 04:28:58', 17),
(14, 3, 30, 1, '2018-11-14 04:30:43', '2018-11-14 04:30:43', 17),
(15, 4, 30, 1, '2018-11-14 04:32:22', '2018-11-14 04:32:22', 17),
(16, 5, 19, 1, '2018-11-14 04:32:40', '2018-11-14 04:32:40', 14),
(17, 6, 30, 1, '2018-11-14 04:38:47', '2018-11-14 04:38:47', 17),
(18, 7, 30, 1, '2018-11-14 06:58:28', '2018-11-14 06:58:28', 17),
(19, 8, 30, 1, '2018-11-14 07:00:17', '2018-11-14 07:00:17', 17),
(20, 9, 19, 1, '2018-11-14 07:01:38', '2018-11-14 07:01:38', 14),
(21, 10, 19, 1, '2018-11-14 07:06:24', '2018-11-14 07:06:24', 14),
(22, 8, 32, 2, '2018-11-14 07:31:36', '2018-11-14 07:31:36', 17),
(23, 8, 32, 3, '2018-11-14 07:32:53', '2018-11-14 07:32:53', 17),
(24, 7, 32, 2, '2018-11-14 07:33:18', '2018-11-14 07:33:18', 17),
(25, 7, 32, 3, '2018-11-14 07:34:04', '2018-11-14 07:34:04', 17),
(26, 6, 32, 2, '2018-11-14 07:34:26', '2018-11-14 07:34:26', 17),
(27, 6, 32, 2, '2018-11-14 07:34:40', '2018-11-14 07:34:40', 17),
(28, 4, 32, 2, '2018-11-14 07:35:03', '2018-11-14 07:35:03', 17),
(29, 3, 32, 2, '2018-11-14 07:35:14', '2018-11-14 07:35:14', 17),
(30, 2, 32, 2, '2018-11-14 07:35:20', '2018-11-14 07:35:20', 17),
(31, 6, 32, 4, '2018-11-14 07:36:23', '2018-11-14 07:36:23', 17),
(32, 6, 32, 3, '2018-11-14 07:36:23', '2018-11-14 07:36:23', 0),
(33, 6, 32, 5, '2018-11-14 07:36:23', '2018-11-14 07:36:23', 17),
(34, 4, 32, 4, '2018-11-14 07:37:53', '2018-11-14 07:37:53', 17),
(35, 4, 32, 3, '2018-11-14 07:37:53', '2018-11-14 07:37:53', 0),
(36, 4, 32, 5, '2018-11-14 07:37:53', '2018-11-14 07:37:53', 17),
(37, 3, 32, 4, '2018-11-14 07:39:30', '2018-11-14 07:39:30', 17),
(38, 2, 32, 6, '2018-11-14 07:40:54', '2018-11-14 07:40:54', 17),
(39, 8, 21, 11, '2018-11-14 07:45:13', '2018-11-14 07:45:13', 0),
(40, 7, 21, 11, '2018-11-14 07:46:22', '2018-11-14 07:46:22', 0),
(41, 4, 21, 11, '2018-11-14 07:49:33', '2018-11-14 07:49:33', 0),
(42, 6, 27, 11, '2018-11-14 07:50:10', '2018-11-14 07:50:10', 0),
(43, 3, 21, 11, '2018-11-14 07:50:52', '2018-11-14 07:50:52', 0),
(44, 8, 21, 12, '2018-11-14 07:56:45', '2018-11-14 07:56:45', 0),
(45, 7, 21, 12, '2018-11-14 07:58:21', '2018-11-14 07:58:21', 0),
(46, 6, 21, 12, '2018-11-14 07:58:53', '2018-11-14 07:58:53', 0),
(47, 8, 21, 13, '2018-11-14 08:04:09', '2018-11-14 08:04:09', 0),
(48, 7, 21, 13, '2018-11-14 08:05:07', '2018-11-14 08:05:07', 0),
(49, 8, 21, 14, '2018-11-14 08:07:30', '2018-11-14 08:07:30', 0),
(50, 7, 21, 14, '2018-11-14 08:08:16', '2018-11-14 08:08:16', 0),
(51, 8, 32, 9, '2018-11-14 08:10:07', '2018-11-14 08:10:07', 17),
(52, 7, 32, 9, '2018-11-14 08:11:04', '2018-11-14 08:11:04', 17),
(53, 6, 32, 7, '2018-11-14 08:14:32', '2018-11-14 08:14:32', 17),
(54, 4, 32, 7, '2018-11-14 08:15:17', '2018-11-14 08:15:17', 17),
(55, 6, 21, 13, '2018-11-14 08:18:15', '2018-11-14 08:18:15', 0),
(56, 6, 32, 9, '2018-11-14 08:20:53', '2018-11-14 08:20:53', 17),
(57, 4, 32, 9, '2018-11-14 08:22:17', '2018-11-14 08:22:17', 17),
(69, 1, 29, 15, '2018-11-14 09:19:32', '2018-11-14 09:19:32', 0),
(59, 10, 22, 2, '2018-11-14 08:24:04', '2018-11-14 08:24:04', 14),
(60, 10, 22, 3, '2018-11-14 08:24:15', '2018-11-14 08:24:15', 14),
(61, 4, 21, 12, '2018-11-14 08:30:15', '2018-11-14 08:30:15', 0),
(62, 4, 21, 13, '2018-11-14 08:33:31', '2018-11-14 08:33:31', 0),
(63, 10, 21, 11, '2018-11-14 08:39:38', '2018-11-14 08:39:38', 0),
(64, 10, 21, 12, '2018-11-14 08:42:18', '2018-11-14 08:42:18', 0),
(65, 10, 21, 13, '2018-11-14 08:43:47', '2018-11-14 08:43:47', 0),
(66, 10, 21, 13, '2018-11-14 08:43:48', '2018-11-14 08:43:48', 0),
(67, 10, 21, 14, '2018-11-14 08:47:27', '2018-11-14 08:47:27', 0),
(68, 10, 22, 9, '2018-11-14 08:49:43', '2018-11-14 08:49:43', 14),
(70, 1, 21, 17, '2018-11-14 09:21:53', '2018-11-14 09:21:53', 0),
(71, 11, 41, 1, '2018-11-15 06:31:52', '2018-11-15 06:31:52', 17),
(72, 11, 32, 2, '2018-11-15 06:32:36', '2018-11-15 06:32:36', 17),
(73, 11, 32, 3, '2018-11-15 06:32:40', '2018-11-15 06:32:40', 17),
(74, 11, 21, 11, '2018-11-15 06:34:34', '2018-11-15 06:34:34', 0),
(75, 11, 21, 12, '2018-11-15 06:46:14', '2018-11-15 06:46:14', 0),
(76, 11, 21, 13, '2018-11-15 06:47:12', '2018-11-15 06:47:12', 0),
(77, 11, 21, 14, '2018-11-15 06:58:59', '2018-11-15 06:58:59', 0),
(78, 12, 41, 1, '2018-11-15 07:03:27', '2018-11-15 07:03:27', 17),
(79, 12, 32, 2, '2018-11-15 07:08:10', '2018-11-15 07:08:10', 17),
(80, 12, 32, 4, '2018-11-15 07:10:16', '2018-11-15 07:10:16', 17),
(81, 13, 41, 1, '2018-11-15 07:12:36', '2018-11-15 07:12:36', 17),
(82, 13, 32, 2, '2018-11-15 07:12:57', '2018-11-15 07:12:57', 17),
(83, 13, 32, 4, '2018-11-15 07:47:45', '2018-11-15 07:47:45', 17),
(84, 13, 32, 3, '2018-11-15 07:47:45', '2018-11-15 07:47:45', 0),
(85, 13, 32, 5, '2018-11-15 07:47:45', '2018-11-15 07:47:45', 17),
(86, 14, 41, 1, '2018-11-15 07:50:17', '2018-11-15 07:50:17', 17),
(87, 14, 32, 2, '2018-11-15 07:50:32', '2018-11-15 07:50:32', 17),
(88, 13, 32, 7, '2018-11-15 07:54:16', '2018-11-15 07:54:16', 17),
(89, 13, 21, 11, '2018-11-15 07:56:12', '2018-11-15 07:56:12', 0),
(90, 12, 21, 11, '2018-11-15 07:56:52', '2018-11-15 07:56:52', 0),
(91, 9, 22, 2, '2018-11-17 06:46:26', '2018-11-17 06:46:26', 14),
(92, 9, 22, 4, '2018-11-17 06:48:24', '2018-11-17 06:48:24', 14),
(93, 9, 22, 7, '2018-11-17 08:09:17', '2018-11-17 08:09:17', 14),
(94, 9, 22, 9, '2018-11-17 08:25:06', '2018-11-17 08:25:06', 14),
(95, 5, 22, 2, '2018-11-17 09:17:31', '2018-11-17 09:17:31', 14),
(96, 5, 22, 3, '2018-11-17 09:17:39', '2018-11-17 09:17:39', 14),
(97, 15, 19, 1, '2018-11-19 04:48:49', '2018-11-19 04:48:49', 12),
(98, 16, 19, 1, '2018-11-19 04:50:21', '2018-11-19 04:50:21', 14),
(99, 16, 22, 2, '2018-11-19 04:57:49', '2018-11-19 04:57:49', 14),
(100, 17, 30, 1, '2018-11-19 04:58:28', '2018-11-19 04:58:28', 17),
(101, 17, 32, 2, '2018-11-19 04:58:46', '2018-11-19 04:58:46', 17),
(102, 16, 22, 3, '2018-11-19 04:58:55', '2018-11-19 04:58:55', 14),
(103, 17, 32, 4, '2018-11-19 04:59:07', '2018-11-19 04:59:07', 17),
(104, 16, 21, 11, '2018-11-19 05:02:35', '2018-11-19 05:02:35', 0),
(105, 16, 21, 12, '2018-11-19 05:09:48', '2018-11-19 05:09:48', 0),
(106, 13, 21, 12, '2018-11-19 05:10:35', '2018-11-19 05:10:35', 0),
(107, 16, 21, 13, '2018-11-19 05:20:47', '2018-11-19 05:20:47', 0),
(108, 16, 21, 14, '2018-11-19 05:29:53', '2018-11-19 05:29:53', 0),
(109, 16, 22, 9, '2018-11-19 05:36:40', '2018-11-19 05:36:40', 14),
(110, 16, 28, 15, '2018-11-19 05:49:47', '2018-11-19 05:49:47', 0),
(111, 1, 28, 18, '2018-11-19 06:00:35', '2018-11-19 06:00:35', 0),
(112, 16, 21, 17, '2018-11-19 06:11:18', '2018-11-19 06:11:18', 0),
(113, 16, 28, 18, '2018-11-19 06:12:42', '2018-11-19 06:12:42', 0),
(114, 16, 21, 19, '2018-11-19 06:16:04', '2018-11-19 06:16:04', 0),
(115, 18, 19, 1, '2018-11-19 06:53:23', '2018-11-19 06:53:23', 14),
(116, 19, 19, 1, '2018-11-19 11:58:59', '2018-11-19 11:58:59', 14),
(117, 20, 19, 1, '2018-11-19 11:59:04', '2018-11-19 11:59:04', 14),
(118, 21, 19, 1, '2018-11-19 18:30:24', '2018-11-19 18:30:24', 16),
(119, 22, 19, 1, '2018-11-19 18:42:23', '2018-11-19 18:42:23', 14),
(120, 23, 19, 1, '2018-11-19 18:51:49', '2018-11-19 18:51:49', 14),
(121, 24, 19, 1, '2018-11-19 18:59:50', '2018-11-19 18:59:50', 14),
(122, 25, 19, 1, '2018-11-19 19:00:00', '2018-11-19 19:00:00', 14),
(123, 26, 19, 1, '2018-11-19 19:00:10', '2018-11-19 19:00:10', 14),
(124, 27, 19, 1, '2018-11-19 19:00:42', '2018-11-19 19:00:42', 14),
(125, 28, 19, 1, '2018-11-19 19:01:35', '2018-11-19 19:01:35', 14),
(126, 29, 19, 1, '2018-11-19 19:04:13', '2018-11-19 19:04:13', 14),
(127, 30, 19, 1, '2018-11-19 19:04:32', '2018-11-19 19:04:32', 14),
(128, 31, 19, 1, '2018-11-19 19:05:21', '2018-11-19 19:05:21', 14),
(129, 32, 19, 1, '2018-11-19 19:25:46', '2018-11-19 19:25:46', 14),
(130, 33, 19, 1, '2018-11-19 19:25:54', '2018-11-19 19:25:54', 14),
(131, 34, 19, 1, '2018-11-19 19:29:16', '2018-11-19 19:29:16', 14),
(132, 35, 41, 1, '2018-11-20 05:31:20', '2018-11-20 05:31:20', 17),
(133, 35, 32, 2, '2018-11-20 05:34:12', '2018-11-20 05:34:12', 17),
(134, 35, 32, 4, '2018-11-20 05:35:36', '2018-11-20 05:35:36', 17),
(135, 35, 21, 11, '2018-11-20 05:37:32', '2018-11-20 05:37:32', 0),
(136, 36, 19, 1, '2018-11-20 06:26:23', '2018-11-20 06:26:23', 14),
(137, 5, 21, 11, '2018-11-20 07:44:45', '2018-11-20 07:44:45', 0),
(138, 13, 21, 13, '2018-11-20 09:30:03', '2018-11-20 09:30:03', 0),
(139, 16, 28, 15, '2018-11-20 09:49:34', '2018-11-20 09:49:34', 0),
(140, 16, 21, 17, '2018-11-20 10:14:37', '2018-11-20 10:14:37', 0),
(141, 5, 21, 12, '2018-11-20 10:39:29', '2018-11-20 10:39:29', 0),
(142, 5, 21, 13, '2018-11-20 10:43:44', '2018-11-20 10:43:44', 0),
(143, 36, 22, 2, '2018-11-23 07:14:10', '2018-11-23 07:14:10', 14),
(144, 36, 22, 4, '2018-11-23 07:14:50', '2018-11-23 07:14:50', 14),
(145, 33, 22, 2, '2018-11-23 07:14:58', '2018-11-23 07:14:58', 14),
(146, 32, 22, 2, '2018-11-23 07:16:34', '2018-11-23 07:16:34', 14),
(147, 34, 22, 4, '2018-11-23 07:16:58', '2018-11-23 07:16:58', 14),
(148, 36, 22, 7, '2018-11-23 07:19:32', '2018-11-23 07:19:32', 14),
(149, 36, 22, 9, '2018-11-23 07:19:48', '2018-11-23 07:19:48', 14),
(150, 37, 19, 1, '2018-11-27 04:32:05', '2018-11-27 04:32:05', 14),
(151, 37, 22, 2, '2018-11-27 06:36:07', '2018-11-27 06:36:07', 14),
(152, 37, 22, 3, '2018-11-27 06:42:39', '2018-11-27 06:42:39', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warehouse_handover`
--

CREATE TABLE IF NOT EXISTS `tbl_warehouse_handover` (
  `handoverid` int(11) NOT NULL AUTO_INCREMENT,
  `receivercnic` varchar(255) NOT NULL,
  `receivername` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `authorizedby` varchar(255) NOT NULL,
  `letterno` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `upload` varchar(255) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mobilenumber` int(11) NOT NULL,
  PRIMARY KEY (`handoverid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_warehouse_handover`
--

INSERT INTO `tbl_warehouse_handover` (`handoverid`, `receivercnic`, `receivername`, `designation`, `authorizedby`, `letterno`, `description`, `upload`, `vehicle_id`, `createdat`, `mobilenumber`) VALUES
(1, '23232-3232323-2', 'nazim', 'klklk', 'none', 0, 'klklk', '43793227.png', 1, '2018-11-14 09:21:53', 2223),
(2, '87879-87878__-_', 'hghjg', 'jhjkhjhj', 'none', 0, 'jhjhj', '1628258933.png', 16, '2018-11-19 06:11:18', 7878),
(3, '11111-1111111-1', 'test', 'fsadf', 'none', 0, 'afdf', '1077248465.jpg', 16, '2018-11-20 10:14:37', 1111);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warehouse_images`
--

CREATE TABLE IF NOT EXISTS `tbl_warehouse_images` (
  `imageid` int(11) NOT NULL AUTO_INCREMENT,
  `vechicle_id` int(11) NOT NULL,
  `imagepath` varchar(250) NOT NULL,
  PRIMARY KEY (`imageid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `tbl_warehouse_images`
--

INSERT INTO `tbl_warehouse_images` (`imageid`, `vechicle_id`, `imagepath`) VALUES
(1, 1, '20181113_143835_4844348375621460337.jpg'),
(2, 1, '20181113_143851_6921787599591472437.jpg'),
(3, 1, '20181113_143858_3373667824252313451.jpg'),
(4, 1, '20181113_143903_7223011688850865649.jpg'),
(5, 1, '20181113_143907_4419617759035785751.jpg'),
(6, 1, '20181113_143912_8266153265035061535.jpg'),
(7, 1, '20181113_143916_1669225754333450937.jpg'),
(8, 8, '20181114_124234_7753315080922648636.jpg'),
(9, 8, '20181114_124238_3566921957283657395.jpg'),
(10, 8, '20181114_124242_6591730263830323685.jpg'),
(11, 8, '20181114_124246_7967392465890277639.jpg'),
(12, 8, '20181114_124253_2580185348635754038.jpg'),
(13, 8, '20181114_124257_3330294496500387289.jpg'),
(14, 8, '20181114_124301_5404379790751842632.jpg'),
(15, 7, '20181114_124342_1691060713893664408.jpg'),
(16, 7, '20181114_124347_5634931692037564902.jpg'),
(17, 7, '20181114_124350_2612206765548205257.jpg'),
(18, 7, '20181114_124354_8142730954095243923.jpg'),
(19, 7, '20181114_124358_7623738289922907511.jpg'),
(20, 7, '20181114_124402_8648251158569518038.jpg'),
(21, 7, '20181114_124406_8986988017879587255.jpg'),
(22, 4, '20181114_124643_5093301900719608205.jpg'),
(23, 4, '20181114_124648_6018951780235015836.jpg'),
(24, 4, '20181114_124656_6403095448199169076.jpg'),
(25, 4, '20181114_124706_3821364681337694324.jpg'),
(26, 4, '20181114_124711_6935026458575010391.jpg'),
(27, 4, '20181114_124718_3348736338077388042.jpg'),
(28, 4, '20181114_124723_9209061559840297548.jpg'),
(29, 6, '20181114_124439_2538848574414834215.jpg'),
(30, 6, '20181114_124448_2507596319926545818.jpg'),
(31, 6, '20181114_124457_8507015884685549245.jpg'),
(32, 6, '20181114_124512_5101304362122591040.jpg'),
(33, 6, '20181114_124520_591303412428118910.jpg'),
(34, 6, '20181114_124532_1371625818742379883.jpg'),
(35, 6, '20181114_124541_6551170795118723976.jpg'),
(36, 6, '20181114_124551_1493991208667862574.jpg'),
(37, 3, '20181114_124812_1905402159679994542.jpg'),
(38, 3, '20181114_124816_3075890399718028803.jpg'),
(39, 3, '20181114_124820_5410270636862137012.jpg'),
(40, 3, '20181114_124824_5703586598203369026.jpg'),
(41, 3, '20181114_124828_2733169894023832002.jpg'),
(42, 3, '20181114_124835_5034626874246852683.jpg'),
(43, 3, '20181114_124839_2631449501861475295.jpg'),
(44, 10, '20181114_133629_1760619829.jpg'),
(45, 10, '20181114_133635_-434980154.jpg'),
(46, 10, '20181114_133640_204779327.jpg'),
(47, 10, '20181114_133645_-1891043676.jpg'),
(48, 10, '20181114_133650_-828193532.jpg'),
(49, 10, '20181114_133656_417559624.jpg'),
(50, 10, '20181114_133701_1585573743.jpg'),
(51, 11, '20181115_113210_192965886186133066.jpg'),
(52, 11, '20181115_113215_2812191737672233306.jpg'),
(53, 11, '20181115_113220_4102414882074557694.jpg'),
(54, 11, '20181115_113223_3396366908304781806.jpg'),
(55, 11, '20181115_113227_7485639843341499597.jpg'),
(56, 11, '20181115_113230_5776965871257186396.jpg'),
(57, 11, '20181115_113234_5419457063564641692.jpg'),
(58, 13, '20181115_125348_1969771126399203472.jpg'),
(59, 13, '20181115_125351_3683421860035528877.jpg'),
(60, 13, '20181115_125357_4032685589143217141.jpg'),
(61, 13, '20181115_125400_355850219941119015.jpg'),
(62, 13, '20181115_125404_5530287328171212891.jpg'),
(63, 13, '20181115_125409_4322968213769672909.jpg'),
(64, 13, '20181115_125412_299086615633160365.jpg'),
(65, 12, '20181115_125431_2137505032883277624.jpg'),
(66, 12, '20181115_125435_486086355710209622.jpg'),
(67, 12, '20181115_125438_2862203341093430115.jpg'),
(68, 12, '20181115_125442_4935664775823741895.jpg'),
(69, 12, '20181115_125445_8543407274919310813.jpg'),
(70, 12, '20181115_125449_8499709906591325173.jpg'),
(71, 12, '20181115_125452_6199275766076855433.jpg'),
(72, 16, '20181119_095949_1488305984.jpg'),
(73, 16, '20181119_095954_2045282627.jpg'),
(74, 16, '20181119_100000_2127881679.jpg'),
(75, 16, '20181119_100003_-1051503160.jpg'),
(76, 16, '20181119_100006_1620953308.jpg'),
(77, 16, '20181119_100009_-775157020.jpg'),
(78, 16, '20181119_100013_1309567996.jpg'),
(79, 35, '20181120_103508_3028568287770552934.jpg'),
(80, 35, '20181120_103512_4828260237786348953.jpg'),
(81, 35, '20181120_103515_425860010809898539.jpg'),
(82, 35, '20181120_103519_620519608938436786.jpg'),
(83, 35, '20181120_103522_8873205612529458988.jpg'),
(84, 35, '20181120_103525_2334710235003092131.jpg'),
(85, 35, '20181120_103528_5039055384837827746.jpg'),
(86, 35, '20181120_103531_2789042324334251040.jpg'),
(87, 5, '20181120_124221_4719811032510514932.jpg'),
(88, 5, '20181120_124228_4063156728522123838.jpg'),
(89, 5, '20181120_124232_2662688906791677313.jpg'),
(90, 5, '20181120_124236_7347428912208490235.jpg'),
(91, 5, '20181120_124240_5410810054342246368.jpg'),
(92, 5, '20181120_124243_2334457736561550591.jpg'),
(93, 5, '20181120_124247_5526435442382861267.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wheels`
--

CREATE TABLE IF NOT EXISTS `tbl_wheels` (
  `wheelid` int(11) NOT NULL AUTO_INCREMENT,
  `wheelnumber` int(11) NOT NULL,
  PRIMARY KEY (`wheelid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_wheels`
--

INSERT INTO `tbl_wheels` (`wheelid`, `wheelnumber`) VALUES
(1, 2),
(2, 4),
(3, 3),
(4, 8),
(5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 5, 1),
(2, 19, 2),
(4, 21, 3),
(5, 22, 4),
(6, 23, 2),
(7, 24, 2),
(9, 26, 4),
(10, 27, 3),
(11, 28, 7),
(12, 29, 10),
(13, 30, 2),
(14, 32, 4),
(15, 41, 2),
(16, 42, 2),
(17, 43, 2),
(18, 44, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
