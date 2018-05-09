-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 09, 2018 at 01:43 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stories_epics`
--

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
CREATE TABLE IF NOT EXISTS `contents` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `page_sub_title` varchar(255) DEFAULT NULL,
  `page_content` text,
  `status` enum('Publish','Draft','Trash') NOT NULL DEFAULT 'Publish',
  `page_added_date` datetime DEFAULT NULL,
  `page_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`page_id`, `page_title`, `page_slug`, `page_sub_title`, `page_content`, `status`, `page_added_date`, `page_modified_date`) VALUES
(19, 'Storiesepics', 'storiesepics', 'Try', '<p>Please mouse over and click on any of the above icons to access our healthcare information and services.You can also download our Patient Care application by clicking on the app icons.</p>\r\n\r\n<p>You will be able to use the mobile application to access our healthcare information, book a GP consultation or appointment and use any of our GP admin services to manage your prescriptions or request sick notes, vaccination or any letter from the GP.</p>\r\n', 'Publish', '2013-04-19 13:53:16', '2018-03-29 12:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int(5) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) NOT NULL,
  `country_code` varchar(50) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=267 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `country_code`) VALUES
(1, 'Andorra', 'AD'),
(2, 'United Arab Emirates', 'AE'),
(3, 'Afghanistan', 'AF'),
(4, 'Antigua and Barbuda', 'AG'),
(5, 'Anguilla', 'AI'),
(6, 'Albania', 'AL'),
(7, 'Armenia', 'AM'),
(8, 'Netherlands Antilles', 'AN'),
(9, 'Angola', 'AO'),
(10, 'Antarctica', 'AQ'),
(11, 'Argentina', 'AR'),
(12, 'American Samoa', 'AS'),
(13, 'Austria', 'AT'),
(14, 'Australia', 'AU'),
(15, 'Aruba', 'AW'),
(16, 'Aland Islands', 'AX'),
(17, 'Azerbaijan', 'AZ'),
(18, 'Bosnia and Herzegovina', 'BA'),
(19, 'Barbados', 'BB'),
(20, 'Bangladesh', 'BD'),
(21, 'Belgium', 'BE'),
(22, 'Burkina Faso', 'BF'),
(23, 'Bulgaria', 'BG'),
(24, 'Bahrain', 'BH'),
(25, 'Burundi', 'BI'),
(26, 'Benin', 'BJ'),
(27, 'Saint Barthelemy', 'BL'),
(28, 'Bermuda', 'BM'),
(29, 'Brunei', 'BN'),
(30, 'Bolivia', 'BO'),
(31, 'British Antarctic Territory', 'BQ'),
(32, 'Brazil', 'BR'),
(33, 'Bahamas', 'BS'),
(34, 'Bhutan', 'BT'),
(35, 'Bouvet Island', 'BV'),
(36, 'Botswana', 'BW'),
(37, 'Belarus', 'BY'),
(38, 'Belize', 'BZ'),
(39, 'Canada', 'CA'),
(40, 'Cocos [Keeling] Islands', 'CC'),
(41, 'Congo - Kinshasa', 'CD'),
(42, 'Central African Republic', 'CF'),
(43, 'Congo - Brazzaville', 'CG'),
(44, 'Switzerland', 'CH'),
(45, 'Cote dIvoire', 'CI'),
(46, 'Cook Islands', 'CK'),
(47, 'Chile', 'CL'),
(48, 'Cameroon', 'CM'),
(49, 'China', 'CN'),
(50, 'Colombia', 'CO'),
(51, 'Costa Rica', 'CR'),
(52, 'Serbia and Montenegro', 'CS'),
(53, 'Canton and Enderbury Islands', 'CT'),
(54, 'Cuba', 'CU'),
(55, 'Cape Verde', 'CV'),
(56, 'Christmas Island', 'CX'),
(57, 'Cyprus', 'CY'),
(58, 'Czech Republic', 'CZ'),
(59, 'East Germany', 'DD'),
(60, 'Germany', 'DE'),
(61, 'Djibouti', 'DJ'),
(62, 'Denmark', 'DK'),
(63, 'Dominica', 'DM'),
(64, 'Dominican Republic', 'DO'),
(65, 'Algeria', 'DZ'),
(66, 'Ecuador', 'EC'),
(67, 'Estonia', 'EE'),
(68, 'Egypt', 'EG'),
(69, 'Western Sahara', 'EH'),
(70, 'Eritrea', 'ER'),
(71, 'Spain', 'ES'),
(72, 'Ethiopia', 'ET'),
(73, 'Finland', 'FI'),
(74, 'Fiji', 'FJ'),
(75, 'Falkland Islands', 'FK'),
(76, 'Micronesia', 'FM'),
(77, 'Faroe Islands', 'FO'),
(78, 'French Southern and Antarctic Territories', 'FQ'),
(79, 'France', 'FR'),
(80, 'Metropolitan France', 'FX'),
(81, 'Gabon', 'GA'),
(82, 'United Kingdom', 'GB'),
(83, 'Grenada', 'GD'),
(84, 'Georgia', 'GE'),
(85, 'French Guiana', 'GF'),
(86, 'Guernsey', 'GG'),
(87, 'Ghana', 'GH'),
(88, 'Gibraltar', 'GI'),
(89, 'Greenland', 'GL'),
(90, 'Gambia', 'GM'),
(91, 'Guinea', 'GN'),
(92, 'Guadeloupe', 'GP'),
(93, 'Equatorial Guinea', 'GQ'),
(94, 'Greece', 'GR'),
(95, 'South Georgia and the South Sandwich Islands', 'GS'),
(96, 'Guatemala', 'GT'),
(97, 'Guam', 'GU'),
(98, 'Guinea-Bissau', 'GW'),
(99, 'Guyana', 'GY'),
(100, 'Hong Kong SAR China', 'HK'),
(101, 'Heard Island and McDonald Islands', 'HM'),
(102, 'Honduras', 'HN'),
(103, 'Croatia', 'HR'),
(104, 'Haiti', 'HT'),
(105, 'Hungary', 'HU'),
(106, 'Indonesia', 'ID'),
(107, 'Ireland', 'IE'),
(108, 'Israel', 'IL'),
(109, 'Isle of Man', 'IM'),
(110, 'India', 'IN'),
(111, 'British Indian Ocean Territory', 'IO'),
(112, 'Iraq', 'IQ'),
(113, 'Iran', 'IR'),
(114, 'Iceland', 'IS'),
(115, 'Italy', 'IT'),
(116, 'Jersey', 'JE'),
(117, 'Jamaica', 'JM'),
(118, 'Jordan', 'JO'),
(119, 'Japan', 'JP'),
(120, 'Johnston Island', 'JT'),
(121, 'Kenya', 'KE'),
(122, 'Kyrgyzstan', 'KG'),
(123, 'Cambodia', 'KH'),
(124, 'Kiribati', 'KI'),
(125, 'Comoros', 'KM'),
(126, 'Saint Kitts and Nevis', 'KN'),
(127, 'North Korea', 'KP'),
(128, 'South Korea', 'KR'),
(129, 'Kuwait', 'KW'),
(130, 'Cayman Islands', 'KY'),
(131, 'Kazakhstan', 'KZ'),
(132, 'Laos', 'LA'),
(133, 'Lebanon', 'LB'),
(134, 'Saint Lucia', 'LC'),
(135, 'Liechtenstein', 'LI'),
(136, 'Sri Lanka', 'LK'),
(137, 'Liberia', 'LR'),
(138, 'Lesotho', 'LS'),
(139, 'Lithuania', 'LT'),
(140, 'Luxembourg', 'LU'),
(141, 'Latvia', 'LV'),
(142, 'Libya', 'LY'),
(143, 'Morocco', 'MA'),
(144, 'Monaco', 'MC'),
(145, 'Moldova', 'MD'),
(146, 'Montenegro', 'ME'),
(147, 'Saint Martin', 'MF'),
(148, 'Madagascar', 'MG'),
(149, 'Marshall Islands', 'MH'),
(150, 'Midway Islands', 'MI'),
(151, 'Macedonia', 'MK'),
(152, 'Mali', 'ML'),
(153, 'Myanmar [Burma]', 'MM'),
(154, 'Mongolia', 'MN'),
(155, 'Macau SAR China', 'MO'),
(156, 'Northern Mariana Islands', 'MP'),
(157, 'Martinique', 'MQ'),
(158, 'Mauritania', 'MR'),
(159, 'Montserrat', 'MS'),
(160, 'Malta', 'MT'),
(161, 'Mauritius', 'MU'),
(162, 'Maldives', 'MV'),
(163, 'Malawi', 'MW'),
(164, 'Mexico', 'MX'),
(165, 'Malaysia', 'MY'),
(166, 'Mozambique', 'MZ'),
(167, 'Namibia', 'NA'),
(168, 'New Caledonia', 'NC'),
(169, 'Niger', 'NE'),
(170, 'Norfolk Island', 'NF'),
(171, 'Nigeria', 'NG'),
(172, 'Nicaragua', 'NI'),
(173, 'Netherlands', 'NL'),
(174, 'Norway', 'NO'),
(175, 'Nepal', 'NP'),
(176, 'Dronning Maud Land', 'NQ'),
(177, 'Nauru', 'NR'),
(178, 'Neutral Zone', 'NT'),
(179, 'Niue', 'NU'),
(180, 'New Zealand', 'NZ'),
(181, 'Oman', 'OM'),
(182, 'Panama', 'PA'),
(183, 'Pacific Islands Trust Territory', 'PC'),
(184, 'Peru', 'PE'),
(185, 'French Polynesia', 'PF'),
(186, 'Papua New Guinea', 'PG'),
(187, 'Philippines', 'PH'),
(188, 'Pakistan', 'PK'),
(189, 'Poland', 'PL'),
(190, 'Saint Pierre and Miquelon', 'PM'),
(191, 'Pitcairn Islands', 'PN'),
(192, 'Puerto Rico', 'PR'),
(193, 'Palestinian Territories', 'PS'),
(194, 'Portugal', 'PT'),
(195, 'U.S. Miscellaneous Pacific Islands', 'PU'),
(196, 'Palau', 'PW'),
(197, 'Paraguay', 'PY'),
(198, 'Panama Canal Zone', 'PZ'),
(199, 'Qatar', 'QA'),
(200, 'Reunion', 'RE'),
(201, 'Romania', 'RO'),
(202, 'Serbia', 'RS'),
(203, 'Russia', 'RU'),
(204, 'Rwanda', 'RW'),
(205, 'Saudi Arabia', 'SA'),
(206, 'Solomon Islands', 'SB'),
(207, 'Seychelles', 'SC'),
(208, 'Sudan', 'SD'),
(209, 'Sweden', 'SE'),
(210, 'Singapore', 'SG'),
(211, 'Saint Helena', 'SH'),
(212, 'Slovenia', 'SI'),
(213, 'Svalbard and Jan Mayen', 'SJ'),
(214, 'Slovakia', 'SK'),
(215, 'Sierra Leone', 'SL'),
(216, 'San Marino', 'SM'),
(217, 'Senegal', 'SN'),
(218, 'Somalia', 'SO'),
(219, 'Suriname', 'SR'),
(220, 'Sao Tome and Principe', 'ST'),
(221, 'Union of Soviet Socialist Republics', 'SU'),
(222, 'El Salvador', 'SV'),
(223, 'Syria', 'SY'),
(224, 'Swaziland', 'SZ'),
(225, 'Turks and Caicos Islands', 'TC'),
(226, 'Chad', 'TD'),
(227, 'French Southern Territories', 'TF'),
(228, 'Togo', 'TG'),
(229, 'Thailand', 'TH'),
(230, 'Tajikistan', 'TJ'),
(231, 'Tokelau', 'TK'),
(232, 'Timor-Leste', 'TL'),
(233, 'Turkmenistan', 'TM'),
(234, 'Tunisia', 'TN'),
(235, 'Tonga', 'TO'),
(236, 'Turkey', 'TR'),
(237, 'Trinidad and Tobago', 'TT'),
(238, 'Tuvalu', 'TV'),
(239, 'Taiwan', 'TW'),
(240, 'Tanzania', 'TZ'),
(241, 'Ukraine', 'UA'),
(242, 'Uganda', 'UG'),
(243, 'U.S. Minor Outlying Islands', 'UM'),
(244, 'United States', 'US'),
(245, 'Uruguay', 'UY'),
(246, 'Uzbekistan', 'UZ'),
(247, 'Vatican City', 'VA'),
(248, 'Saint Vincent and the Grenadines', 'VC'),
(249, 'North Vietnam', 'VD'),
(250, 'Venezuela', 'VE'),
(251, 'British Virgin Islands', 'VG'),
(252, 'U.S. Virgin Islands', 'VI'),
(253, 'Vietnam', 'VN'),
(254, 'Vanuatu', 'VU'),
(255, 'Wallis and Futuna', 'WF'),
(256, 'Wake Island', 'WK'),
(257, 'Samoa', 'WS'),
(258, 'People\'s Democratic Republic of Yemen', 'YD'),
(259, 'Yemen', 'YE'),
(260, 'Mayotte', 'YT'),
(261, 'South Africa', 'ZA'),
(262, 'Zambia', 'ZM'),
(263, 'Zimbabwe', 'ZW'),
(264, 'Unknown or Invalid Region', 'ZZ'),
(265, 'West Indies', 'AI'),
(266, 'England', 'UK');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

DROP TABLE IF EXISTS `email_templates`;
CREATE TABLE IF NOT EXISTS `email_templates` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(255) DEFAULT NULL,
  `template_key` varchar(255) NOT NULL,
  `from_name` varchar(255) DEFAULT NULL,
  `from_email` varchar(255) DEFAULT NULL,
  `email_subject` varchar(500) DEFAULT NULL,
  `email_body` text NOT NULL,
  `template_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `template_added_date` datetime DEFAULT NULL,
  `template_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`template_id`, `template_name`, `template_key`, `from_name`, `from_email`, `email_subject`, `email_body`, `template_status`, `template_added_date`, `template_modified_date`) VALUES
(1, 'forgot_password_email', 'forgot_password_email', 'Pksingh', 'pappu.singh@i-webservices.com', 'Forgot password', '<p>Dear {name}, Your password has been reset and new password is: {password}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks,</p>\r\n\r\n<p>Patient CareTeam</p>\r\n', 'Active', '2013-04-23 17:18:19', '2016-05-26 20:51:54'),
(2, 'Appointment Booking', 'appointment_booking', 'Pushpendra Rajput', 'rajput.pushpendra61@gmail.com', 'Appointment Confirmed', '<p>Dear {name}, Your booking has been confirmed.</p>\r\n\r\n<p>your details mentioned below :</p>\r\n\r\n<p>Name : {name},</p>\r\n\r\n<p>Date of birth : {dob},</p>\r\n\r\n<p>Personal Helth Number : {phn},</p>\r\n\r\n<p>Phone : {phone},</p>\r\n\r\n<p>Email : {email}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks,</p>\r\n\r\n<p>Patient CareTeam</p>\r\n', 'Active', '2017-02-23 22:17:31', NULL),
(3, 'Practitioner Booking Notification', 'practitioner_booking_notification', 'Pushpendra Rajput', 'rajput.pushpendra61@gmail.com', 'Practitioner Booking Notification', '<p>Hi {practitioner_name},</p>\r\n\r\n<p>You got a booking, details mentioned below :</p>\r\n\r\n<p>Name : {name},</p>\r\n\r\n<p>Date of birth : {dob},</p>\r\n\r\n<p>Personal Helth Number : {phn},</p>\r\n\r\n<p>Phone : {phone},</p>\r\n\r\n<p>Email : {email}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks,</p>\r\n\r\n<p>Patient CareTeam</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Active', '2017-03-26 17:22:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag_name`, `created_at`, `modified_at`, `status`) VALUES
(4, 'Test aa', '2018-04-12 22:47:51', '2018-04-12 22:47:51', 1),
(6, 'Test', '2018-04-21 18:39:33', '2018-04-21 18:39:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `profile_pic` text,
  `user_role_id` int(11) NOT NULL DEFAULT '4',
  `location` varchar(500) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `user_description` text,
  `user_added_date` datetime DEFAULT NULL,
  `user_modified_date` datetime DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `industries` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `term_and_condition` int(1) DEFAULT '1',
  `website` varchar(255) DEFAULT NULL,
  `user_note` text,
  `user_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `full_name`, `profile_pic`, `user_role_id`, `location`, `phone`, `user_description`, `user_added_date`, `user_modified_date`, `last_login_date`, `last_login_ip`, `company`, `industries`, `job_title`, `term_and_condition`, `website`, `user_note`, `user_status`) VALUES
(1, 'admin@admin.com', 'f5ed4d4f776c0dc3f4dd72dc8e6e88794c11248f', 'STORIES', '1523472143.png', 1, 'Noida', '8130606975', '<p>This is test user details.</p>\r\n', '2016-05-23 14:00:38', '2018-04-22 07:56:18', '2018-05-09 01:42:58', '::1', '7einfotech', 'Information Technologies', 'Software Developer', 1, 'http://7einfotech.com', '<p>Test NOTES</p>\r\n', 1),
(2, 'rajput.pushpendra61@gmail.com', 'f5ed4d4f776c0dc3f4dd72dc8e6e88794c11248f', 'STORIES', '1494929298.png', 1, 'c-41 sector 34 noida', '8130606975', '<p>Diagnose and treat acute, episodic, or chronic illness, independently or as part of a healthcare team. May focus on health promotion and disease prevention. May order, perform, or interpret diagnostic tests such as lab work and x rays. May prescribe medication. Must be registered nurses who have specialized graduate education.</p>\r\n', '2016-05-23 14:00:38', '2018-04-12 22:36:53', '2018-04-07 07:00:07', '::1', 'Test', 'Test Industrie', 'Software Developer', 1, 'http://7einfotech.com', NULL, 1),
(4, 'test@test.com', 'ad65b7b356657d5d02915d4f4b9fa51e3dbd9510', 'Test User', NULL, 3, 'new delhi', '8130606975', '<p>Test</p>\r\n', '2018-04-08 20:11:54', '2018-04-22 07:54:11', NULL, NULL, 'Test Company', 'Test Industrie', 'Test Title', 1, 'Test Website', '<p>Test Note</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_audit`
--

DROP TABLE IF EXISTS `user_audit`;
CREATE TABLE IF NOT EXISTS `user_audit` (
  `user_id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `profile_pic` text,
  `user_role_id` int(11) NOT NULL DEFAULT '4',
  `location` varchar(500) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `user_description` text,
  `user_added_date` datetime DEFAULT NULL,
  `user_modified_date` datetime DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `industries` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `term_and_condition` int(1) DEFAULT '1',
  `website` varchar(255) DEFAULT NULL,
  `user_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_friends`
--

DROP TABLE IF EXISTS `user_friends`;
CREATE TABLE IF NOT EXISTS `user_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend_user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_friends`
--

INSERT INTO `user_friends` (`id`, `user_id`, `friend_user_id`, `created_at`, `modified_at`) VALUES
(1, 4, 2, '2018-04-22 14:57:02', '2018-04-22 14:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `user_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role_name` varchar(255) NOT NULL,
  `user_role_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `user_role_description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`user_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_role_id`, `user_role_name`, `user_role_status`, `user_role_description`) VALUES
(1, 'Admin', 'Active', 'Super Admin'),
(2, 'Practitioner', 'Inactive', 'Sub Admin'),
(3, 'Customer', 'Active', 'users');

-- --------------------------------------------------------

--
-- Table structure for table `user_tags`
--

DROP TABLE IF EXISTS `user_tags`;
CREATE TABLE IF NOT EXISTS `user_tags` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tags`
--

INSERT INTO `user_tags` (`id`, `user_id`, `tag_name`, `status`) VALUES
(3, 4, 'Test', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
