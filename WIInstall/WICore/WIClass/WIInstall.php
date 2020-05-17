<?php


class Install
{


	private $WIdb;

	public function Installer($install)
	{

    $installer = $install['InstallData'];
    $db_username = $installer['db_username'];
    $db_pass     = $installer['db_password'];
    $db_name     = $installer['db_name'];
    $db_host     = $installer['db_host'];

    $bootstrap_version     = $installer['bootstrap_version'];
    $name                  = $installer['site_name'];
    $dom                   = $installer['Domain'];
    $script                = $installer['script'];
    $session_secure        = $installer['session_secure'];
    $http                  = $installer['http'];
    $session_regenerate    = $installer['session_regenerate'];
    $cookieonly            = $installer['cookieonly'];
    $login_fingerprint     = $installer['login_fingerprint'];
    $max_login_attempts    = $installer['max_login_attempts'];
    $redirect_after_login  = $installer['redirect_after_login'];
    $encryption            = $installer['encryption'];
    $cost                  = $installer['cost'];
    $salt                  = $installer['salt'];
    $mail_confirm_required = $installer['email_req'];
    $mailer                = $installer['mailer'];
    $smtp_host             = $installer['smtp_host'];
    $smtp_port             = $installer['smtp_port'];
    $smtp_username         = $installer['smtp_username'];
    $smtp_password         = $installer['smtp_password'];
    $smtp_enc              = $installer['smtp_enc'];
    $default_lang          = strtolower($installer['default_lang']);
    $mlang                 = $installer['mlang'];
    $email_req             = $installer['email_req'];
    $tw_id                 = $installer['tw_id'];
    $tw_secret             = $installer['tw_secret'];
    $fb_id                 = $installer['fb_id'];
    $fb_secret             = $installer['fb_secret'];
    $gp_id                 = $installer['gp_id'];
    $gp_secret             = $installer['gp_secret'];
    $gp_map_api            = $installer['gp_map_api'];
    $gp_chart_api          = $installer['gp_chart_api'];
    $tw_log                = $installer['tw_log'];
    $fb_log                = $installer['fb_log'];
    $gp_log                = $installer['gp_log'];
    $admin_pass            = $installer['admin_pass'];
    $admin_user            = $installer['admin_user'];
    $user_email            = $installer['user_email'];




    $Version               = "1.2";

    $social_callback_url   = "socialauth";

    $reg_pass_reset        = "passwordreset";

    $register_confirm      = "confirm";

    $reset_key_life        = "24";

    $dat                   = date("Y-m-d");

    $ip                    = getenv('REMOTE_ADDR');

    $role                  = "7";

   

    try{
      //$pdo = new PDO('mysql:host=' . $db_host . ';dbname=' .$db_name, $db_pass,$db_username );
      $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e) {
            die ( 'Connection failed: ' . $e->getMessage() );
        }

		$dbname = "`" . str_replace("`", "``", $db_name) . "`";
		$pdo->query("CREATE DATABASE IF NOT EXISTS $dbname");
		$pdo->query("use $dbname");
		$q = "
CREATE TABLE IF NOT EXISTS `wi_admin_info_box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `wi_admin_info_box`
--

INSERT INTO `wi_admin_info_box` (`id`, `name`, `info`) VALUES
(1, 'Bounce Rate', 'bounce'),
(2, 'Unique Visitors', 'visitors'),
(3, 'User Registrations', 'regUser');

-- --------------------------------------------------------

--
-- Table structure for table `wi_admin_menu`
--

CREATE TABLE IF NOT EXISTS `wi_admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#',
  `parent` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wi_admin_menu`
--

INSERT INTO `wi_admin_menu` (`id`, `label`, `link`, `parent`, `sort`, `lang`) VALUES
(1, 'Administrators', 'WIAdmin.php', 0, 0, 'admins'),
(2, 'Logs', 'WILogs.php', 0, 1, 'logs');

-- --------------------------------------------------------

--
-- Table structure for table `wi_admin_msg`
--

CREATE TABLE IF NOT EXISTS `wi_admin_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wtime` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `attachments` enum('y','n') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n',
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wi_admin_todo_list`
--

CREATE TABLE IF NOT EXISTS `wi_admin_todo_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `completed` enum('y','n') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wi_blockedusers`
--

CREATE TABLE IF NOT EXISTS `wi_blockedusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blocker` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `blockee` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `blockdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wi_contact_message`
--

CREATE TABLE IF NOT EXISTS `wi_contact_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_sent` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wi_contracts`
--

CREATE TABLE IF NOT EXISTS `wi_contracts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `start_point` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `task_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wi_countries`
--

CREATE TABLE IF NOT EXISTS `wi_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=246 ;

--
-- Dumping data for table `wi_countries`
--

INSERT INTO `wi_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People''s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People''s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'ZR', 'Zaire'),
(244, 'ZM', 'Zambia'),
(245, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `wi_css`
--

CREATE TABLE IF NOT EXISTS `wi_css` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `href` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=54 ;

--
-- Dumping data for table `wi_css`
--

INSERT INTO `wi_css` (`id`, `href`, `rel`, `page`) VALUES
(1, 'site/css/frameworks/bootstrap.css', 'stylesheet', 'index'),
(2, 'site/css/login_panel/css/slide.css', 'stylesheet', 'index'),
(3, 'site/css/frameworks/menus.css', 'stylesheet', 'index'),
(4, 'site/css/style.css', 'stylesheet', 'index'),
(5, 'site/css/font-awesome.css', 'stylesheet', 'index'),
(6, 'site/css/vendor/bootstrap.min.css', 'stylesheet', 'index'),
(7, 'site/css/frameworks/bootstrap.css', 'stylesheet', 'alogin'),
(8, 'site/css/login_panel/css/slide.css', 'stylesheet', 'alogin'),
(9, 'site/css/frameworks/menus.css', 'stylesheet', 'alogin'),
(10, 'site/css/style.css', 'stylesheet', 'alogin'),
(11, 'site/css/font-awesome.css', 'stylesheet', 'alogin'),
(12, 'site/css/vendor/bootstrap.min.css', 'stylesheet', 'alogin'),
(13, 'site/css/frameworks/bootstrap.css', 'stylesheet', 'contfirm'),
(14, 'site/css/login_panel/css/slide.css', 'stylesheet', 'contfirm'),
(15, 'site/css/frameworks/menus.css', 'stylesheet', 'contfirm'),
(16, 'site/css/style.css', 'stylesheet', 'contfirm'),
(17, 'site/css/font-awesome.css', 'stylesheet', 'contfirm'),
(18, 'site/css/vendor/bootstrap.min.css', 'stylesheet', 'contfirm'),
(19, 'site/css/frameworks/bootstrap.css', 'stylesheet', 'contact_us'),
(20, 'site/css/login_panel/css/slide.css', 'stylesheet', 'confirm'),
(21, 'site/css/frameworks/menus.css', 'stylesheet', 'contact_us'),
(22, 'site/css/style.css', 'stylesheet', 'contact_us'),
(23, 'site/css/font-awesome.css', 'stylesheet', 'contact_us'),
(24, 'site/css/vendor/bootstrap.min.css', 'stylesheet', 'contact_us'),
(25, 'site/css/frameworks/bootstrap.css', 'stylesheet', 'profile'),
(26, 'site/css/login_panel/css/slide.css', 'stylesheet', 'profile'),
(27, 'site/css/frameworks/menus.css', 'stylesheet', 'profile'),
(28, 'site/css/style.css', 'stylesheet', 'profile'),
(29, 'site/css/font-awesome.css', 'stylesheet', 'profile'),
(30, 'site/css/vendor/bootstrap.min.css', 'stylesheet', 'profile'),
(31, 'user/css/profile.css', 'stylesheet', 'profile'),
(32, 'site/css/frameworks/bootstrap.css', 'stylesheet', 'testing'),
(33, 'site/css/login_panel/css/slide.css', 'stylesheet', 'testing'),
(34, 'site/css/frameworks/menus.css', 'stylesheet', 'testing'),
(35, 'site/css/style.css', 'stylesheet', 'testing'),
(36, 'site/css/font-awesome.css', 'stylesheet', 'testing'),
(37, 'site/css/vendor/bootstrap.min.css', 'stylesheet', 'testing'),
(53, 'site/css/test.css', 'stylesheet', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `wi_elements`
--

CREATE TABLE IF NOT EXISTS `wi_elements` (
  `element_id` int(11) NOT NULL AUTO_INCREMENT,
  `element_status` enum('enabled','disabled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'disabled',
  `element_powered` enum('power_on','power_off') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'power_off',
  `element_type` enum('Common Fields','HTML Elements','Layout','Grid','Base','Components','Javascript','Forms') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Common Fields',
  `element` text COLLATE utf8_unicode_ci,
  `element_author` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `element_name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `element_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `element_font` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`element_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=80 ;



-- --------------------------------------------------------

--
-- Table structure for table `wi_footer`
--

CREATE TABLE IF NOT EXISTS `wi_footer` (
  `footer_id` int(11) NOT NULL AUTO_INCREMENT,
  `footer_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `footer_linking` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`footer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wi_footer`
--

INSERT INTO `wi_footer` (`footer_id`, `footer_content`, `footer_linking`, `website_name`) VALUES
(1, '', '', 'IVO');

-- --------------------------------------------------------

--
-- Table structure for table `wi_friends_requests`
--

CREATE TABLE IF NOT EXISTS `wi_friends_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timedate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wi_header`
--

CREATE TABLE IF NOT EXISTS `wi_header` (
  `header_id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bk_header_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `header_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `header_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `header_slogan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`header_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wi_header`
--

INSERT INTO `wi_header` (`header_id`, `logo`, `bk_header_image`, `header_image`, `header_content`, `header_slogan`) VALUES
(1, 'wi_cms_logo.jpg', '', 'bk_header', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wi_lang`
--

CREATE TABLE IF NOT EXISTS `wi_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang_flag` text COLLATE utf8_unicode_ci NOT NULL,
  `href` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lang` (`lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `wi_lang`
--

INSERT INTO `wi_lang` (`id`, `lang`, `name`, `lang_flag`, `href`) VALUES
(1, 'en', 'English', 'en.png', '?lang=en'),
(2, 'rs', 'Serbian', 'rs.png', '?lang=rs'),
(3, 'ru', 'Russian', 'ru.png', '?lang=ru'),
(4, 'es', 'Spanish', 'es.png', '?lang=es'),
(5, 'fr', 'French', 'fr.png', '?lang=fr'),
(9, 'cn', 'China', 'cn.png', '?lang=cn');

-- --------------------------------------------------------

--
-- Table structure for table `wi_login_attempts`
--

CREATE TABLE IF NOT EXISTS `wi_login_attempts` (
  `id_login_attempts` int(11) NOT NULL AUTO_INCREMENT,
  `ip_addr` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `attempt_number` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  PRIMARY KEY (`id_login_attempts`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wi_logs`
--

CREATE TABLE IF NOT EXISTS `wi_logs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `user` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `opperation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wi_members`
--

CREATE TABLE IF NOT EXISTS `wi_members` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_key` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `password_reset_key` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password_reset_confirmed` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `password_reset_timestamp` datetime NOT NULL,
  `register_date` date NOT NULL,
  `user_role` int(4) NOT NULL DEFAULT '1',
  `last_login` datetime NOT NULL,
  `ip_addr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banned` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wi_members`
--


-- --------------------------------------------------------

--
-- Table structure for table `wi_menu`
--

CREATE TABLE IF NOT EXISTS `wi_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#',
  `parent` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wi_menu`
--

INSERT INTO `wi_menu` (`id`, `label`, `link`, `parent`, `sort`, `lang`) VALUES
(1, 'Home', 'index.php', 0, 0, 'home');

-- --------------------------------------------------------

--
-- Table structure for table `wi_meta`
--

CREATE TABLE IF NOT EXISTS `wi_meta` (
  `meta_id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`meta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `wi_meta`
--

INSERT INTO `wi_meta` (`meta_id`, `page`, `name`, `content`, `author`) VALUES
(1, 'index', 'viewport', 'width=device-width, initial-scale=1', 'Jules Warner'),
(2, 'index', 'description', 'Warner-Infinity Content Management System with simplified back end', 'Jules Warner'),
(3, 'index', 'keywords', 'WI, WICMS, System, UI', 'Jules Warner'),
(4, 'index', 'author', 'warner-infinity', 'Jules Warner'),
(5, 'alogin', 'viewport', 'width=device-width, initial-scale=1', 'Jules Warner'),
(6, 'alogin', 'description', 'Warner-Infinity Content Management System', 'Jules Warner'),
(7, 'alogin', 'keywords', 'WI, WICMS, System', 'Jules Warner'),
(8, 'alogin', 'author', 'warner-infinity', 'Jules Warner'),
(9, 'confirm', 'viewport', 'width=device-width, initial-scale=1', 'Jules Warner'),
(10, 'confirm', 'description', 'Warner-Infinity Content Management System', 'Jules Warner'),
(11, 'confirm', 'keywords', 'WI, WICMS, System', 'Jules Warner'),
(12, 'confirm', 'author', 'warner-infinity', 'Jules Warner'),
(13, 'contact_us', 'viewport', 'width=device-width, initial-scale=1', 'Jules Warner'),
(14, 'contact_us', 'description', 'Warner-Infinity Content Management System', 'Jules Warner'),
(15, 'contact_us', 'keywords', 'WI, WICMS, System', 'Jules Warner'),
(16, 'contact_us', 'author', 'warner-infinity', 'Jules Warner'),
(17, 'profile', 'viewport', 'width=device-width, initial-scale=1', 'Jules Warner'),
(18, 'profile', 'description', 'Warner-Infinity Content Management System with simplified back end', 'Jules Warner'),
(19, 'profile', 'keywords', 'WI, WICMS, System, UI', 'Jules Warner'),
(20, 'profile', 'author', 'warner-infinity', 'Jules Warner');



-- --------------------------------------------------------

--
-- Table structure for table `wi_mod`
--

CREATE TABLE IF NOT EXISTS `wi_mod` (
  `mod_id` int(11) NOT NULL AUTO_INCREMENT,
  `mod_status` enum('enabled','disabled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'disabled',
  `mod_powered` enum('power_on','power_off') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'power_off',
  `mod_type` enum('element','custom') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'element',
  `mod_author` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `module_name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `Mod_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_font` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`mod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `wi_mod`
--

INSERT INTO `wi_mod` (`mod_id`, `mod_status`, `mod_powered`, `mod_type`, `mod_author`, `module_name`, `Mod_description`, `mod_font`) VALUES
(1, 'enabled', 'power_off', 'element', 'Jules Warner', 'accordion', NULL, 'wi_accordion'),
(2, 'enabled', 'power_off', 'element', 'Jules Warner', 'appearing_button', NULL, 'wi_appearing_button'),
(3, 'enabled', 'power_off', 'element', 'Jules Warner', 'button', NULL, 'wi_button'),
(4, 'enabled', 'power_off', 'element', 'Jules Warner', 'carousel', NULL, 'wi_carousel'),
(5, 'enabled', 'power_off', 'element', 'Jules Warner', 'columns', NULL, ''),
(6, 'enabled', 'power_off', 'element', 'Jules Warner', 'content_box', NULL, 'wi_content_box'),
(7, 'disabled', 'power_off', 'element', 'Jules Warner', 'folded_corner', NULL, 'wi_folded_corner'),
(8, 'enabled', 'power_off', 'element', 'Jules Warner', 'google_map', NULL, 'wi_google_map'),
(9, 'disabled', 'power_off', 'element', 'Jules Warner', 'fonts', NULL, 'wi_fonts'),
(10, 'disabled', 'power_off', 'element', 'Jules Warner', 'font', NULL, 'wi_font'),
(11, 'disabled', 'power_off', 'element', 'Jules Warner', 'heading', NULL, ''),
(12, 'disabled', 'power_off', 'element', 'Jules Warner', 'image', NULL, ''),
(13, 'disabled', 'power_off', 'element', 'Jules Warner', 'image_hover', NULL, ''),
(14, 'disabled', 'power_off', 'element', 'Jules Warner', 'image_mosaic', NULL, ''),
(15, 'disabled', 'power_off', 'element', 'Jules Warner', 'latest_fbfeeds', NULL, ''),
(16, 'disabled', 'power_off', 'element', 'Jules Warner', 'list', NULL, ''),
(17, 'enabled', 'power_on', 'custom', 'Jules Warner', 'Panel', NULL, 'wi_panel'),
(18, 'enabled', 'power_off', 'custom', 'Jules Warner', 'welcome_box', NULL, 'wi_welcome_box'),
(19, 'enabled', 'power_off', 'element', 'Jules Warner', 'left_sidebar', NULL, ''),
(20, 'disabled', 'power_off', 'element', 'Jules Warner', 'loop', NULL, ''),
(21, 'disabled', 'power_off', 'element', 'Jules Warner', 'menu_button', NULL, ''),
(22, 'enabled', 'power_off', 'element', 'Jules Warner', 'panel', NULL, ''),
(23, 'enabled', 'power_off', 'element', 'Jules Warner', 'post_carousel', NULL, ''),
(24, 'enabled', 'power_off', 'element', 'Jules Warner', 'progress_bar', NULL, 'wi_progress'),
(25, 'enabled', 'power_off', 'element', 'Jules Warner', 'search_engine', NULL, ''),
(26, 'enabled', 'power_off', 'element', 'Jules Warner', 'right_sidebar', NULL, ''),
(27, 'enabled', 'power_off', 'element', 'Jules Warner', 'slider', NULL, ''),
(28, 'enabled', 'power_off', 'element', 'Jules Warner', 'subscribe', NULL, ''),
(29, 'enabled', 'power_off', 'custom', 'Jules Warner', 'top_head', NULL, 'wi_top_head'),
(30, 'enabled', 'power_off', 'element', 'Jules Warner', 'csstabs', NULL, 'wi_tabs'),
(31, 'disabled', 'power_off', 'element', 'Jules Warner', 'flags', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `wi_modules`
--

CREATE TABLE IF NOT EXISTS `wi_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mod_id` int(11) DEFAULT NULL,
  `modulecode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mod_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `element` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `trans` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trans1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trans2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trans3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trans4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trans5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text6` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trans6` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

--
-- Dumping data for table `wi_modules`
--

-- --------------------------------------------------------

--
-- Table structure for table `wi_msg`
--

CREATE TABLE IF NOT EXISTS `wi_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` text COLLATE utf8_unicode_ci NOT NULL,
  `wtime` datetime NOT NULL,
  `chat_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `chat_id_id` (`chat_id`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

-- --------------------------------------------------------

--
-- Table structure for table `wi_notifications`
--

CREATE TABLE IF NOT EXISTS `wi_notifications` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `user` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `opperation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

--
-- Dumping data for table `wi_notifications`
--

-- --------------------------------------------------------

--
-- Table structure for table `wi_page`
--

CREATE TABLE IF NOT EXISTS `wi_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `panel` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  `top_head` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  `header` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  `menu` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '1',
  `left_sidebar` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `right_sidebar` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `contents` text COLLATE utf8_unicode_ci,
  `footer` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `wi_page`
--

INSERT INTO `wi_page` (`id`, `name`, `panel`, `top_head`, `header`, `menu`, `left_sidebar`, `right_sidebar`, `contents`, `footer`) VALUES
(1, 'alogin', '1', '1', '0', '1', '0', '0', 'alogin', '1'),
(2, 'confirm', '1', '1', '0', '1', '0', '0', 'confirm', '1'),
(3, 'index', '1', '1', '1', '1', '0', '0', 'welcome_box', '1'),
(4, 'passwordreset', '1', '1', '0', '1', '0', '0', 'passwordreset', '1'),
(5, 'profile', '1', '1', '0', '1', '0', '0', 'profile', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wi_permissions`
--

CREATE TABLE IF NOT EXISTS `wi_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_name` varchar(255) NOT NULL,
  `mod_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wi_permissions`
--

INSERT INTO `wi_permissions` (`id`, `permission_name`, `mod_id`, `group_id`, `active`) VALUES
(1, 'Site', 1, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `wi_plugin`
--

CREATE TABLE IF NOT EXISTS `wi_plugin` (
  `plugin_id` int(11) NOT NULL AUTO_INCREMENT,
  `plugin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activated` enum('true','false') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`plugin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wi_private_messages`
--

CREATE TABLE IF NOT EXISTS `wi_private_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `sender_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rec_id` int(11) NOT NULL,
  `rec_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opened` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `recipientDelete` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `senderDelete` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `time_sent` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

-- --------------------------------------------------------

--
-- Table structure for table `wi_scripts`
--

CREATE TABLE IF NOT EXISTS `wi_scripts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `wi_scripts`
--

INSERT INTO `wi_scripts` (`id`, `src`, `page`) VALUES
(1, 'site/js/frameworks/JQuery.js', 'index'),
(2, 'site/js/frameworks/bootstrap.js', 'index'),
(3, 'site/js/login_panel/js/slide.js', 'index'),
(4, 'site/js/frameworks/JQuery.js', 'alogin'),
(5, 'site/js/frameworks/bootstrap.js', 'alogin'),
(6, 'site/js/login_panel/js/slide.js', 'alogin'),
(7, 'site/js/frameworks/JQuery.js', 'confirm'),
(8, 'site/js/frameworks/bootstrap.js', 'confirm'),
(9, 'site/js/login_panel/js/slide.js', 'confirm'),
(10, 'site/js/frameworks/JQuery.js', 'contact_us'),
(11, 'site/js/frameworks/bootstrap.js', 'contact_us'),
(12, 'site/js/login_panel/js/slide.js', 'contact_us'),
(13, 'site/js/frameworks/JQuery.js', 'profile'),
(14, 'site/js/frameworks/bootstrap.js', 'profile'),
(15, 'site/js/login_panel/js/slide.js', 'profile');


-- --------------------------------------------------------

--
-- Table structure for table `wi_sidebar`
--

CREATE TABLE IF NOT EXISTS `wi_sidebar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#',
  `parent` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `wi_sidebar`
--

INSERT INTO `wi_sidebar` (`id`, `label`, `link`, `parent`, `sort`, `lang`, `img`) VALUES
(1, 'Settings', '', 0, 0, 'settings', 'settings'),
(2, 'Site', 'WISite.php', 1, 0, 'Site', 'site'),
(3, 'Users', '', 0, 1, 'Users', 'users'),
(4, 'Manage User', 'WIUser.php', 3, 0, 'Manage_users', 'manage users'),
(5, 'Roles', 'WIRoles.php', 3, 1, 'roles', 'roles'),
(6, 'Menus', 'WIMenu.php', 1, 1, 'Menu', 'menu'),
(7, 'Header', 'WIHeader.php', 1, 2, 'Header', 'header'),
(8, 'Modules', '', 0, 2, 'Modules', 'modules'),
(9, 'Modules', 'WIModules.php', 8, 0, 'Modules', 'modules'),
(10, 'Pages', '', 0, 3, 'Pages', 'pages'),
(11, 'Pages', 'WIPages.php', 10, 0, 'Pages', 'pages'),
(12, 'Plugins', '', 0, 4, 'Plugins', 'plugin'),
(13, 'plugin', 'WIPlugin.php', 12, 0, 'Plugin', 'plugin'),
(14, 'Styling', 'WIStyling.php', 1, 3, 'Styling', 'styling'),
(15, 'Media', '', 0, 5, 'media', 'media'),
(16, 'Media', 'WIMedia.php', 15, 0, 'media', 'media'),
(17, 'Multi Lang', 'WIMlang.php', 1, 4, 'Multi Lang', 'multi_lang'),
(18, 'Permissions', 'WIPermissions.php', 3, 3, 'Permissions', 'permissions'),
(19, 'PageOptions', 'WIPageOptions.php', 10, 0, 'PageOptions', 'pages'),
(20, 'SEO', 'WISeo.php', 1, 5, 'Seo', 'seo.png');

-- --------------------------------------------------------

--
-- Table structure for table `wi_site`
--

CREATE TABLE IF NOT EXISTS `wi_site` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_url` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `favicon` text COLLATE utf8_unicode_ci NOT NULL,
  `db_host` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `db_username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `db_pass` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `db_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `db_port` int(11) NOT NULL DEFAULT '25',
  `db_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'mysql',
  `secure_session` enum('false','true') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `http_only` enum('false','true') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'true',
  `regenerate_id` enum('false','true') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'true',
  `use_only_cookie` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `login_fingerprint` enum('true','false') COLLATE utf8_unicode_ci NOT NULL,
  `max_login_attempts` int(11) NOT NULL DEFAULT '5',
  `redirect_after_login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_encryption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `encryption_cost` int(11) NOT NULL,
  `sha512_iterations` int(11) NOT NULL,
  `password_salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reset_key_life` int(11) NOT NULL,
  `mail_confirm_required` enum('true','false') COLLATE utf8_unicode_ci NOT NULL,
  `register_confirm` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_pass_reset` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mailer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smpt_host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smpt_port` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smpt_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smpt_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smpt_encryption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `social_callback_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google_enabled` enum('true','false') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `google_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_secret` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_map_api` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google_charts_api_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_enabled` enum('true','false') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `facebook_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_secret` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_enabled` enum('true','false') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `twitter_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_secret` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `default_lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `multi_lang` enum('on','off') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'off',
  `lang_choice` enum('google','wilang') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'google',
  `bootstrap_version` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `wicms_version` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `left_sidebar` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `right_sidebar` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

--
-- Dumping data for table `wi_site`
--

INSERT INTO `wi_site` (`id`, `site_name`, `site_domain`, `site_url`, `favicon`, `db_host`, `db_username`, `db_pass`, `db_name`, `db_port`, `db_type`, `secure_session`, `http_only`, `regenerate_id`, `use_only_cookie`, `login_fingerprint`, `max_login_attempts`, `redirect_after_login`, `password_encryption`, `encryption_cost`, `sha512_iterations`, `password_salt`, `reset_key_life`, `mail_confirm_required`, `register_confirm`, `reg_pass_reset`, `mailer`, `smpt_host`, `smpt_port`, `smpt_username`, `smpt_password`, `smpt_encryption`, `social_callback_url`, `google_enabled`, `google_id`, `google_secret`, `google_map_api`, `google_charts_api_key`, `facebook_enabled`, `facebook_id`, `facebook_secret`, `twitter_enabled`, `twitter_key`, `twitter_secret`, `default_lang`, `multi_lang`, `lang_choice`, `bootstrap_version`, `wicms_version`, `left_sidebar`, `right_sidebar`) VALUES
( 1,'$name', '$dom', '$script', 'wi_cms_logo.PNG', '$db_host', '$db_username', '$db_pass', '$db_name', '25', 'mysql', '$session_secure', '$http', '$session_regenerate' , '$cookieonly', '$login_fingerprint', '$max_login_attempts', '$redirect_after_login', '$encryption', '$cost', '35000', '$salt', '$reset_key_life', '$mail_confirm_required', '$register_confirm','$reg_pass_reset', '$mailer', 'smpt_host', 'smpt_port', 'smpt_username', 'smpt_password', 'smpt_encryption', '$social_callback_url',  '$gp_log' , '$gp_id', '$gp_secret', '$gp_map_api','$gp_chart_api', '$fb_log', '$fb_id', '$fb_secret',  '$tw_log', 'tw_id', 'tw_secret', '$default_lang', '$mlang', 'google', '$bootstrap_version', '$Version', '0','0');

-- --------------------------------------------------------

--
-- Table structure for table `wi_social_logins`
--

CREATE TABLE IF NOT EXISTS `wi_social_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `provider` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'email',
  `provider_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

-- --------------------------------------------------------

--
-- Table structure for table `wi_tasks`
--

CREATE TABLE IF NOT EXISTS `wi_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percent` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

--
-- Dumping data for table `wi_tasks`
--
-- --------------------------------------------------------

--
-- Table structure for table `wi_theme`
--

CREATE TABLE IF NOT EXISTS `wi_theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `in_use` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wi_theme`
--

INSERT INTO `wi_theme` ( `theme`, `destination`, `in_use`) VALUES
( 'WICMS', 'WITheme/WICMS/', 1),
( 'IVO', 'WITheme/IVO/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wi_track`
--

CREATE TABLE IF NOT EXISTS `wi_track` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `ref` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `agent` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tracking_page_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tracking_page_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_count` int(11) NOT NULL,
  `dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `wi_track`
--

-- --------------------------------------------------------

--
-- Table structure for table `wi_trans`
--

CREATE TABLE IF NOT EXISTS `wi_trans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `translation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=401 ;

--
-- Dumping data for table `wi_trans`
--

INSERT INTO `wi_trans` (`id`, `lang`, `keyword`, `translation`) VALUES
(1, 'en', 'site_name', 'IVO'),
(2, 'en', 'home', 'Home'),
(3, 'en', 'users', 'Users'),
(4, 'en', 'blog', 'Blog'),
(5, 'en', 'shop', 'Shop'),
(6, 'en', 'email', 'Email'),
(7, 'en', 'login', 'Login'),
(8, 'en', 'username', 'Username'),
(9, 'en', 'password', 'Password'),
(10, 'en', 'your_email', 'Your Email'),
(11, 'en', 'login_with', 'Login with'),
(12, 'en', 'email_confirmed', 'Email confirmed'),
(13, 'en', 'create_account', 'Create Account'),
(14, 'en', 'logging_in', 'Logging In'),
(15, 'en', 'working', 'Working...'),
(16, 'en', 'info', 'Info'),
(17, 'en', 'admin', 'Admin'),
(18, 'en', 'add_user', 'Add User'),
(19, 'en', 'action', 'Action'),
(20, 'en', 'register_date', 'Register Date'),
(21, 'en', 'male', 'Male'),
(22, 'en', 'female', 'Female'),
(23, 'en', 'forgot_password', 'Forget pasword'),
(24, 'en', 'repeat_password', 'Repeat password'),
(25, 'en', 'reset_password', 'Reset password'),
(26, 'en', 'email_confirmation', 'Email Confirmation'),
(27, 'en', 'you_can_login_now', 'You can <a href=''{link}''>log in</a> now.'),
(28, 'en', 'user_with_key_doesnt_exist', 'User with this key doesn''t exist in our database.'),
(29, 'en', 'gender', 'Gender'),
(30, 'en', 'dob', 'DOB'),
(31, 'en', 'welcoem', 'Welcome'),
(32, 'en', 'panel_mini_admin', 'Admin Mini Panel'),
(33, 'en', 'view_profile_page', 'View profile page'),
(34, 'en', 'log_off', 'Log Off'),
(35, 'en', 'admin_panel', 'Admin Panel'),
(36, 'en', 'member_panel', 'Member''s Panel'),
(37, 'en', 'hello', 'Hello'),
(38, 'en', 'my_profile', 'My Profile'),
(39, 'en', 'user_roles', 'User Roles'),
(40, 'en', 'index', 'Index'),
(41, 'en', 'contact_us', 'Contact Us'),
(42, 'en', 'services', 'Services'),
(43, 'en', 'support_us', 'Support Us'),
(44, 'en', 'forum', 'Forum'),
(45, 'en', 'cafe', 'Cafe'),
(46, 'en', 'submit', 'Submit'),
(47, 'en', 'about_us', 'About Us'),
(48, 'en', 'faq', 'FAQ'),
(49, 'en', 'friending', 'Suggest to a Friend'),
(50, 'en', 'welcome_', 'Welcome to '),
(51, 'en', 'password_reset', 'Password reset'),
(52, 'en', 'reset_password', 'Reset Password'),
(53, 'en', 'phone', 'Phone'),
(54, 'en', 'note', 'Note'),
(55, 'en', 'update', 'Update'),
(56, 'en', 'address', 'Address'),
(57, 'en', 'first_name', 'First Name'),
(58, 'en', 'last_name', 'Last Name'),
(59, 'en', 'old_password', 'Old Password'),
(60, 'en', 'new_password', 'New Password'),
(61, 'en', 'your_details', 'Tour Details'),
(62, 'en', 'change_password', 'Change Password'),
(63, 'en', 'confirm_new_password', 'Confirm New Password'),
(64, 'en', 'to_change_email_username', 'If you want to change your username, email or you have registred via social network and you want to change your password now, please contact administrator.'),
(65, 'en', 'add', 'Add'),
(66, 'en', 'ban', 'Ban'),
(67, 'en', 'yes', 'Yes'),
(68, 'en', 'no', 'No'),
(69, 'en', 'edit', 'Edit'),
(70, 'en', 'next', 'Next'),
(71, 'en', 'previous', 'Previous'),
(72, 'en', 'unban', 'Unban'),
(73, 'en', 'cancel', 'Cancel'),
(74, 'en', 'delete', 'Delete'),
(75, 'en', 'details', 'Details'),
(76, 'en', 'loading', 'loading...'),
(77, 'en', 'role_name', 'Role Name'),
(78, 'en', 'user_with_role', '# of users with this role.'),
(79, 'en', 'user_banned', 'This user account is banned by administrator!'),
(80, 'en', 'field_required', 'Field cannot be empty!'),
(81, 'en', 'role_taken', 'Role already exist.'),
(82, 'en', 'email_required', 'Email is required'),
(83, 'en', 'email_wring_format', 'Please enter valid email.'),
(84, 'en', 'email_not_exist', 'This email does not exist in our database'),
(85, 'en', 'email_taken', 'User with this email is already registred.'),
(86, 'en', 'username_taken', 'This username is in use by another member.'),
(87, 'en', 'user_not_confirmed', 'Please confirm your email first.'),
(88, 'en', 'password_required', 'Password is required'),
(89, 'en', 'wrong_username_password', 'Wrong username/password combination.'),
(90, 'en', 'passwords_dont_match', 'Passwords do not match'),
(91, 'en', 'wrong_old_password', 'Wrong Old password'),
(92, 'en', 'wrong_sum', 'Wrong sum. Please check it again.'),
(93, 'en', 'brute_force', 'You exceeded maximum attempts limit for today. Try again tomorrow.'),
(94, 'en', 'success_registration_with_confirm', 'Registration successful. Please check your email.'),
(95, 'en', 'success_registration_no_confirm', 'Registration successful. You can log in now.'),
(96, 'en', 'user_added_successfully', 'User added successfully.'),
(97, 'en', 'user_updated_successfully', 'User updated successfully.'),
(98, 'en', 'user_dont_exist', 'This user doesn''t exist.'),
(99, 'en', 'leave_blank', 'Leave blank if you don''t want to change it.'),
(100, 'en', 'invalid_password_reset_key', 'Password reset key is invalid or expired'),
(101, 'en', 'password_length', 'Password must be at least 6 characters long.'),
(102, 'en', 'error_writing_to_db', 'Error writing to database. Please try again.'),
(103, 'en', 'posting', 'Posting...'),
(104, 'en', 'resetting', 'Resetting...'),
(105, 'en', 'password_updated_successfully', 'Password successfully updated.'),
(106, 'en', 'password_updated_successfully_login', 'Password successfully updated. You can <a href=''login.php''>login now</a>.'),
(107, 'en', 'password_reset_email_sent', 'Password reset email sent. Check your inbox (and spam) folder.'),
(108, 'en', 'message_couldn_be_sent', 'Message could not be sent! Please try again.'),
(109, 'en', 'updating', 'Updating...'),
(110, 'en', 'details_updated', 'Details updated successfully.'),
(111, 'en', 'are_you_sure', 'Are you sure'),
(112, 'en', 'creating_account', 'Creating Account...'),
(113, 'en', 'usergroup', 'User Group'),
(114, 'en', 'at', 'at'),
(115, 'en', 'logout', 'Log Out'),
(116, 'en', 'copyright_by', 'Copyright by'),
(117, 'en', 'search', 'Search'),
(118, 'en', 'total_records', 'total records'),
(119, 'en', 'filtered_from', 'Filtered from'),
(120, 'en', 'records', 'Records'),
(121, 'en', 'of', 'of'),
(122, 'en', 'to', 'to'),
(123, 'en', 'main_title', 'This is meant as a FREE CMS System, just because i love to create things, a simplified UI backend, built for high end security, database driven, everything you need in a nice bundle to build your own website.'),
(124, 'en', 'community', 'Community'),
(125, 'en', 'learn', 'WI Community for anyone who loves to build websites.'),
(126, 'en', 'software', 'Software Packages'),
(127, 'en', 'package', 'Themes, plugins, apps, custom packages, and so much more.'),
(128, 'en', 'it_title', 'Custom software for the commercial world.'),
(129, 'en', 'it', 'I.T'),
(130, 'es', 'email', 'Е-маил'),
(131, 'es', 'login', 'Пријава'),
(132, 'es', 'username', 'Корисничко име'),
(133, 'es', 'password', 'Ð›Ð¾Ð·Ð¸Ð½ÐºÐ°'),
(134, 'es', 'male', 'ÐœÑƒÑˆÐºÐ°Ñ€Ð°Ñ†'),
(135, 'es', 'female', 'Ð¶ÐµÐ½ÑÐºÐ¸'),
(136, 'es', 'your_email', 'Ð’Ð°ÑˆÐ° ÐµÐ¼Ð°Ð¸Ð»'),
(137, 'es', 'login_with', 'Ð›Ð¾Ð³Ð¸Ð½ Ð’Ð¸Ñ‚Ñ…'),
(138, 'es', 'email_confirmed', 'Ð•-Ð¼Ð°Ð¸Ð» Ð¿Ð¾Ñ‚Ð²Ñ€Ð´Ð¸Ð¾'),
(139, 'es', 'create_Account', 'Registruj se'),
(140, 'es', 'forgot_password', 'Zaboravili ste lozinku?'),
(141, 'es', 'repeat_password', 'Ponovite lozinku'),
(142, 'es', 'reset_password', 'Ñ€ÐµÑÐµÑ‚ Ð¿Ð°ÑÑÐ²Ð¾Ñ€Ð´'),
(143, 'es', 'email_confirmation', 'Ð•-Ð¼Ð°Ð¸Ð» ÐŸÐ¾Ñ‚Ð²Ñ€Ð´Ð°'),
(144, 'es', 'you_can_log_now', 'ÐœÐ¾Ð¶ÐµÑ‚Ðµ <Ð° Ñ…Ñ€ÐµÑ„=''{Ð»Ð¸Ð½Ðº}''> ÑÐµ Ð¿Ñ€Ð¸Ñ˜Ð°Ð²Ð¸Ñ‚Ðµ </Ð°> ÑÐ°Ð´Ð° .'),
(145, 'es', 'user_with_key_doesnt_exist', 'ÐšÐ¾Ñ€Ð¸ÑÐ½Ð¸Ðº ÑÐ° Ð¾Ð²Ð¸Ð¼ ÐºÑ™ÑƒÑ‡ÐµÐ¼ Ð½Ðµ Ð¿Ð¾ÑÑ‚Ð¾Ñ˜Ð¸ Ñƒ Ð½Ð°ÑˆÐ¾Ñ˜ Ð±Ð°Ð·Ð¸ .'),
(146, 'es', 'gender', 'ÐŸÐ¾Ð»'),
(147, 'es', 'dob', 'Ð”ÐžÐ‘'),
(148, 'es', 'country', 'Ð·ÐµÐ¼Ñ™Ð°'),
(149, 'es', 'welcome', 'DobrodoÅ¡ao'),
(151, 'es', 'TO', 'Ñƒ'),
(152, 'es', 'Thank_you', 'Ð’ÐµÐ»Ð¸ÐºÐ¾ Ñ…Ð²Ð°Ð»Ð°'),
(153, 'es', 'panel_mini_admin', 'ÐÐ´Ð¼Ð¸Ð½Ð¸ÑÑ‚Ñ€Ð°Ñ‚Ð¾Ñ€ Ð¼Ð¸Ð½Ð¸ Ð¿Ð°Ð½ÐµÐ»'),
(154, 'es', 'view_profile_page', 'ÐŸÐ¾Ð³Ð»ÐµÐ´Ð°Ñ˜ Ð¿Ñ€Ð¾Ñ„Ð¸Ð» ÑÑ‚Ñ€Ð°Ð½Ð°'),
(155, 'es', 'log_off', 'Odjavi se'),
(156, 'es', 'admin_panel', 'ÐÐ´Ð¼Ð¸Ð½ Ð¿Ð°Ð½ÐµÐ»'),
(157, 'es', 'member_panel', 'ÐŸÐ°Ð½ÐµÐ» Ð§Ð»Ð°Ð½Ð°'),
(158, 'es', 'home', 'Casa'),
(159, 'es', 'users', 'usuarios'),
(160, 'es', 'my_profile', 'Mi perfil'),
(161, 'es', 'user_roles', 'Roles del usuario'),
(162, 'es', 'index', 'Ãndice'),
(163, 'es', 'contact_us', 'ContÃ¡ctenos'),
(164, 'es', 'support_us', 'Apoyanos'),
(165, 'es', 'forum', 'Foro'),
(166, 'es', 'shop', 'tienda'),
(167, 'es', 'cafe', 'CafeterÃ­a'),
(168, 'es', 'submit', 'Enviar'),
(169, 'es', 'about_us', 'Sobre nosotros'),
(170, 'es', 'info', 'informaciÃ³n'),
(171, 'en', 'current_topics', 'view Current Topics'),
(172, 'en', 'ok', 'Ok'),
(173, 'en', 'change_pic', 'Change Photo'),
(174, 'en', 'bio', 'Bio'),
(175, 'en', 'save', 'Save'),
(176, 'en', 'user_location', 'user Location'),
(177, 'en', 'social_info', 'Social Info'),
(178, 'en', 'friend', 'Friends'),
(179, 'en', 'profile_wall', 'Profile Wall'),
(180, 'en', 'mess', 'Messages'),
(181, 'en', 'admins', 'Administrators'),
(182, 'en', 'logs', 'Logs'),
(183, 'es', 'email', 'Ð•-Ð¼Ð°Ð¸Ð»'),
(184, 'en', 'showing', 'Showing...'),
(185, 'en', 'nothing_found', 'Nothing found - sorry'),
(186, 'en', 'never_logged_in', 'Never Logged In'),
(187, 'en', 'select_role', 'Select Role'),
(188, 'en', 'confirmed', 'Confirmed'),
(189, 'en', 'last_login', 'Last Login'),
(190, 'en', 'skills', 'Our Skills'),
(191, 'en', 'whatwedo', 'What We Do'),
(192, 'ru', 'email', 'Ð­Ð». Ð°Ð´Ñ€ÐµÑ'),
(193, 'ru', 'login', 'Ð›Ð¾Ð³Ð¸Ð½'),
(194, 'ru', 'username', 'ÐŸÐ¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÑŒ'),
(195, 'ru', 'password', 'ÐŸÐ°Ñ€Ð¾Ð»ÑŒ'),
(196, 'ru', 'your_email', 'Ð’Ð°Ñˆ Ð­Ð». Ð°Ð´Ñ€ÐµÑ'),
(197, 'ru', 'login_with', 'Ð’Ð¾Ð¹Ð´Ð¸Ñ‚Ðµ Ñ'),
(198, 'ru', 'email_confirmed', 'ÐŸÐ¾Ð´Ñ‚Ð²ÐµÑ€Ð¶Ð´ÐµÐ½Ð¸Ðµ Ð­Ð». Ð°Ð´Ñ€ÐµÑ'),
(199, 'ru', 'create_account', 'Ð¡Ð¾Ð·Ð´Ð°Ñ‚ÑŒ ÑƒÑ‡ÐµÑ‚Ð½ÑƒÑŽ Ð·Ð°Ð¿Ð¸ÑÑŒ'),
(200, 'ru', 'forgot_password', 'Ð—Ð°Ð±Ñ‹Ð»Ð¸ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ ?'),
(201, 'ru', 'repeat_password', 'ÐŸÐ¾Ð´Ñ‚Ð²ÐµÑ€Ð¶Ð´ÐµÐ½Ð¸Ðµ Ð¿Ð°Ñ€Ð¾Ð»Ñ'),
(202, 'ru', 'reset_password', 'Ð¡Ð±Ñ€Ð¾ÑÐ¸Ñ‚ÑŒ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ'),
(203, 'ru', 'email_confirmation', 'ÐŸÐ¾Ð´Ñ‚Ð²ÐµÑ€Ð´Ð¸Ñ‚Ðµ Ð­Ð». Ð°Ð´Ñ€ÐµÑ'),
(204, 'ru', 'you_can_loging_now', 'Ð’Ñ‹ Ð¼Ð¾Ð¶ÐµÑ‚Ðµ <a href=''{link}''> Ð·Ð°Ð»Ð¾Ð³Ð¸Ð½Ð¸Ñ‚ÑŒÑÑ</a>.'),
(205, 'ru', 'user_with_key_doesnt_exist', 'ÐŸÐ¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÑŒ Ñ Ð´Ð°Ð½Ð½Ñ‹Ð¼ ÐºÐ»ÑŽÑ‡Ð¾Ð¼ Ð½Ðµ ÑÑƒÑ‰ÐµÑÑ‚Ð²ÑƒÐµÑ‚.'),
(206, 'ru', 'gender', 'ÐŸÐ¾Ð»'),
(207, 'ru', 'welcome', 'Ð´Ð¾Ð±Ñ€Ð¾ Ð¿Ð¾Ð¶Ð°Ð»Ð¾Ð²Ð°Ñ‚ÑŒ'),
(208, 'ru', 'site_name', 'Debate'),
(209, 'ru', 'panel_mini_admin', 'ÐÐ´Ð¼Ð¸Ð½Ð¸ÑÑ‚Ñ€Ð°Ñ‚Ð¾Ñ€ ÐœÐ¸Ð½Ð¸-Ð¿Ð°Ð½ÐµÐ»ÑŒ'),
(210, 'ru', 'view_profile_page', 'ÐŸÐ¾ÑÐ¼Ð¾Ñ‚Ñ€ÐµÑ‚ÑŒ Ð¿Ñ€Ð¾Ñ„Ð¸Ð»ÑŒ ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ†Ñ‹'),
(211, 'ru', 'log_off', 'Ð’Ñ‹Ð¹Ñ‚Ð¸'),
(212, 'ru', 'admin_panel', 'ÐŸÐ°Ð½ÐµÐ»ÑŒ Ð°Ð´Ð¼Ð¸Ð½Ð¸ÑÑ‚Ñ€Ð°Ñ‚Ð¾Ñ€Ð°'),
(213, 'ru', 'member_panel', 'ÐŸÐ°Ð½ÐµÐ»ÑŒ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ñ'),
(214, 'ru', 'home', 'Ð“Ð»Ð°Ð²Ð½Ð°Ñ'),
(215, 'ru', 'users', 'Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÐµÐ¹'),
(216, 'ru', 'index', 'Ð˜Ð½Ð´ÐµÐºÑ'),
(217, 'ru', 'contact_us', 'Ð¡Ð²ÑÐ¶Ð¸Ñ‚ÐµÑÑŒ Ñ Ð½Ð°Ð¼Ð¸'),
(218, 'ru', 'forum', 'Ð¤Ð¾Ñ€ÑƒÐ¼'),
(219, 'ru', 'shop', 'ÐœÐ°Ð³Ð°Ð·Ð¸Ð½'),
(220, 'ru', 'cafe', 'ÐšÐ°Ñ„Ðµ'),
(221, 'ru', 'submit', 'Ð½Ð°Ð¶Ð¼Ð¸Ñ‚Ðµ ÐºÐ½Ð¾Ð¿ÐºÑƒ'),
(222, 'ru', 'about_us', 'Ðž Ð½Ð°Ñ'),
(223, 'ru', 'info', 'Ð˜Ð½Ñ„Ð¾Ñ€Ð¼Ð°Ñ†Ð¸Ñ'),
(224, 'ru', 'welcome_', 'Ð”Ð¾Ð±Ñ€Ð¾ Ð¿Ð¾Ð¶Ð°Ð»Ð¾Ð²Ð°Ñ‚ÑŒ Ð²'),
(225, 'ru', 'main_title', 'Ð­Ñ‚Ð¾ Ð¾Ð·Ð½Ð°Ñ‡Ð°ÐµÑ‚, Ð² ÐºÐ°Ñ‡ÐµÑÑ‚Ð²Ðµ ÑÐ²Ð¾Ð±Ð¾Ð´Ð½Ð¾Ð³Ð¾ CMS ÑÐ¸ÑÑ‚ÐµÐ¼Ñ‹, Ñ‚Ð¾Ð»ÑŒÐºÐ¾ Ð¿Ð¾Ñ‚Ð¾Ð¼Ñƒ, Ñ‡Ñ‚Ð¾ Ñ Ð»ÑŽÐ±Ð»ÑŽ ÑÐ¾Ð·Ð´Ð°Ð²Ð°Ñ‚ÑŒ Ð²ÐµÑ‰Ð¸, ÑƒÐ¿Ñ€Ð¾Ñ‰ÐµÐ½Ð½ÑƒÑŽ Ð±ÑÐºÐµÐ½Ð´ UI, Ð¿Ð¾ÑÑ‚Ñ€Ð¾ÐµÐ½Ð½Ñ‹Ð¹ Ð´Ð»Ñ Ð²Ñ‹ÑÐ¾ÐºÐ¾Ð³Ð¾ ÐºÐ»Ð°Ñ'),
(226, 'ru', 'community', 'ÑÐ¾Ð¾Ð±Ñ‰ÐµÑÑ‚Ð²Ð¾'),
(227, 'ru', 'footer', 'Ð¡Ð´ÐµÐ»Ð°Ð½Ð¾ Ð¸ Ð Ð°Ð·Ñ€Ð°Ð±Ð¾Ñ‚Ð°Ð½Ð½Ñ‹Ð¹ WI: Warner-Ð‘ÐµÑÐºÐ¾Ð½ÐµÑ‡Ð½Ð¾ÑÑ‚ÑŒ'),
(228, 'ru', 'copyright', 'Ð°Ð²Ñ‚Ð¾Ñ€ÑÐºÐ¾Ðµ Ð¿Ñ€Ð°Ð²Ð¾'),
(229, 'ru', 'phone', 'Ð¢ÐµÐ»ÐµÑ„Ð¾Ð½'),
(230, 'ru', 'note', 'Ð—Ð°Ð¼ÐµÑ‚ÐºÐ°'),
(231, 'ru', 'uodate', 'ÐžÐ±Ð½Ð¾Ð²Ð»ÐµÐ½Ð¸Ðµ'),
(232, 'ru', 'address', 'ÐÐ´Ñ€ÐµÑ'),
(233, 'ru', 'first_name', 'Ð˜Ð¼Ñ'),
(234, 'ru', 'last_name', 'Ð¤Ð°Ð¼Ð¸Ð»Ð¸Ñ'),
(235, 'ru', 'old_password', 'Ð¡Ñ‚Ð°Ñ€Ñ‹Ð¹ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ'),
(236, 'ru', 'new_password', 'ÐÐ¾Ð²Ñ‹Ð¹ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ'),
(237, 'ru', 'your_details', 'Ð’Ð°ÑˆÐ¸ Ð´Ð°Ð½Ð½Ñ‹Ðµ'),
(238, 'ru', 'change_password', 'Ð˜Ð·Ð¼ÐµÐ½Ð¸Ñ‚ÑŒ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ'),
(239, 'ru', 'confirm_new_password', 'ÐŸÐ¾Ð´Ñ‚Ð²ÐµÑ€Ð´Ð¸Ñ‚ÑŒ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ'),
(240, 'ru', 'to_change_email_username', 'Ð•ÑÐ»Ð¸ Ð’Ñ‹ Ð¶ÐµÐ»Ð°ÐµÑ‚Ðµ Ð¸Ð·Ð¼ÐµÐ½Ð¸Ñ‚ÑŒ Ð’Ð°Ñˆ e-mail, Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ñ Ð¸Ð»Ð¸ Ð² ÑÐ»ÑƒÑ‡Ð°Ðµ Ñ€ÐµÐ³Ð¸ÑÑ‚Ñ€Ð°Ñ†Ð¸Ð¸ Ñ‡ÐµÑ€ÐµÐ· ÑÐ¾Ñ†Ð¸Ð°Ð»ÑŒÐ½Ñ‹Ðµ ÑÐµÑ‚Ð¸ Ð¶ÐµÐ»Ð°ÐµÑ‚Ðµ ÑÐ¼ÐµÐ½Ð¸Ñ‚ÑŒ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ, Ð¾Ð±Ñ€Ð°Ñ‚Ð¸Ñ‚ÐµÑÑŒ Ðº Ð°Ð´Ð¼Ð¸Ð½Ð¸Ñ'),
(241, 'ru', 'password_reset', 'Ð¡Ð±Ñ€Ð¾Ñ Ð¿Ð°Ñ€Ð¾Ð»Ñ'),
(242, 'ru', 'add', 'Ð”Ð¾Ð±Ð°Ð²Ð¸Ñ‚ÑŒ'),
(243, 'ru', 'action', 'Ð”ÐµÐ¹ÑÑ‚Ð²Ð¸Ðµ'),
(244, 'ru', 'role_name', 'ÐÐ°Ð·Ð²Ð°Ð½Ð¸Ðµ Ñ€Ð¾Ð»Ð¸'),
(245, 'ru', 'users_with_role', 'ÐŸÐ¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ð¸ Ñ ÑÑ‚Ð¾Ð¹ Ñ€Ð¾Ð»ÑŒÑŽ'),
(246, 'ru', 'ban', 'Ð‘Ð»Ð¾ÐºÐ¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ'),
(247, 'ru', 'yes', 'Ð”Ð°'),
(248, 'ru', 'no', 'ÐÐµÑ‚'),
(249, 'ru', 'edit', 'Ð˜Ð·Ð¼ÐµÐ½Ð¸Ñ‚ÑŒ'),
(250, 'ru', 'next', 'Ð¡Ð»ÐµÐ´ÑƒÑŽÑ‰Ð¸Ð¹'),
(251, 'ru', 'previous', 'ÐŸÑ€ÐµÐ´Ñ‹Ð´ÑƒÑ‰Ð¸Ð¹'),
(252, 'ru', 'unban', 'Ð Ð°Ð·Ð±Ð»Ð¾ÐºÐ¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ'),
(253, 'ru', 'cancel', 'ÐžÑ‚Ð¼ÐµÐ½Ð¸Ñ‚ÑŒ'),
(254, 'ru', 'delete', 'Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ'),
(255, 'ru', 'details', 'Ð”ÐµÑ‚Ð°Ð»Ð¸'),
(256, 'ru', 'loading', 'Ð—Ð°Ð³Ñ€ÑƒÐ·ÐºÐ°..'),
(257, 'ru', 'register_date', 'Ð”Ð°Ñ‚Ð° Ñ€ÐµÐ³Ð¸ÑÑ‚Ñ€Ð°Ñ†Ð¸Ð¸'),
(258, 'ru', 'last_login', 'Ð”Ð°Ñ‚Ð° Ð¿Ð¾ÑÐ»ÐµÐ´Ð½ÐµÐ¹ Ð°Ð²Ñ‚Ð¾Ñ€Ð¸Ð·Ð°Ñ†Ð¸Ð¸'),
(259, 'ru', 'confirmed', 'ÐŸÐ¾Ð´Ñ‚Ð²ÐµÑ€Ð¶Ð´ÐµÐ½Ð¾'),
(260, 'ru', 'select_role', 'Ð’Ñ‹Ð±Ñ€Ð°Ñ‚ÑŒ Ñ€Ð¾Ð»ÑŒ'),
(261, 'ru', 'change_role', 'Ð˜Ð·Ð¼ÐµÐ½Ð¸Ñ‚ÑŒ Ñ€Ð¾Ð»ÑŒ'),
(262, 'ru', 'pick_user_role', 'ÐŸÐ¾Ð´Ñ‚Ð²ÐµÑ€Ð´Ð¸Ñ‚Ðµ Ñ€Ð¾Ð»ÑŒ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ñ'),
(263, 'ru', 'add_user', 'Ð”Ð¾Ð±Ð°Ð²Ð¸Ñ‚ÑŒ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ñ'),
(264, 'ru', 'never_logged_in', 'ÐÐ¸ÐºÐ¾Ð³Ð´Ð° Ð½Ðµ Ð°Ð²Ñ‚Ð¾Ñ€Ð¸Ð·Ð¾Ð²Ñ‹Ð²Ð°Ð»ÑÑ'),
(265, 'ru', 'records_per_page', 'Ð·Ð°Ð¿Ð¸ÑÐµÐ¹ Ð½Ð° ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ†Ðµ'),
(266, 'ru', 'nothing_found', 'ÐÐ¸Ñ‡ÐµÐ³Ð¾ Ð½Ðµ Ð½Ð°Ð¹Ð´ÐµÐ½Ð¾.'),
(267, 'ru', 'no_data_in_table', 'ÐÐµÑ‚Ñƒ Ð´Ð°Ð½Ð½Ñ‹Ñ… Ð² Ñ‚Ð°Ð±Ð»Ð¸Ñ†Ðµ'),
(268, 'ru', 'showing', 'ÐŸÐ¾ÐºÐ°Ð·Ñ‹Ð²Ð°ÐµÐ¼...'),
(269, 'ru', 'of', 'Ð¸Ð·'),
(270, 'ru', 'records', 'Ð·Ð°Ð¿Ð¸ÑÐ¸'),
(271, 'ru', 'filtered_from', 'Ð¾Ñ‚Ð¾Ð±Ñ€Ð°Ð½Ð¾ Ð¾Ñ‚'),
(272, 'ru', 'total_records', 'Ð²ÑÐµÐ³Ð¾ Ð·Ð°Ð¿Ð¸ÑÐµÐ¹'),
(273, 'ru', 'search', 'ÐŸÐ¾Ð¸ÑÐº'),
(274, 'ru', 'logout', 'Ð’Ñ‹Ð¹Ñ‚Ð¸'),
(275, 'ru', 'copyright_by', 'Ð’ÑÐµ Ð¿Ñ€Ð°Ð²Ð° Ð·Ð°Ñ‰Ð¸Ñ‰ÐµÐ½Ñ‹'),
(276, 'ru', 'user_baned', 'Ð”Ð°Ð½Ð½Ñ‹Ð¹ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÑŒ Ð·Ð°Ð±Ð»Ð¾ÐºÐ¸Ñ€Ð¾Ð²Ð°Ð½.'),
(277, 'ru', 'field_required', 'ÐŸÐ¾Ð»Ðµ Ð½Ðµ Ð¼Ð¾Ð¶ÐµÑ‚ Ð±Ñ‹Ñ‚ÑŒ Ð¿ÑƒÑÑ‚Ñ‹Ð¼!'),
(278, 'ru', 'role_taken', 'Ð”Ð°Ð½Ð½Ð°Ñ Ñ€Ð¾Ð»ÑŒ Ð¿Ñ€Ð¸Ð¼ÐµÐ½ÐµÐ½Ð°.'),
(279, 'ru', 'email_required', 'Ð¢Ñ€ÐµÐ±ÑƒÐµÑ‚ÑÑ e-mail.'),
(280, 'ru', 'email_wrong_format', 'ÐÐµÐ¿Ñ€Ð°Ð²Ð¸Ð»ÑŒÐ½Ñ‹Ð¹ Ñ„Ð¾Ñ€Ð¼Ð°Ñ‚ Ð­Ð». Ð°Ð´Ñ€ÐµÑ'),
(281, 'ru', 'email_not_exist', 'Ð­Ð». Ð°Ð´Ñ€ÐµÑ  Ð² Ð±Ð°Ð·Ðµ Ð´Ð°Ð½Ð½Ñ‹Ñ… Ð½Ðµ Ð·Ð°Ñ€ÐµÐ³Ð¸ÑÑ‚Ñ€Ð¸Ñ€Ð¾Ð²Ð°Ð½.'),
(282, 'ru', 'email_taken', 'ÐŸÐ¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÑŒ Ñ Ð´Ð°Ð½Ð½Ñ‹Ð¼ e-mail ÑƒÐ¶Ðµ Ð·Ð°Ñ€ÐµÐ³Ð¸ÑÑ‚Ñ€Ð¸Ñ€Ð¾Ð²Ð°Ð½.'),
(283, 'ru', 'username_required', 'Ð¢Ñ€ÐµÐ±ÑƒÐµÑ‚ÑÑ Ð²Ð²ÐµÑÑ‚Ð¸ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ñ.'),
(284, 'ru', 'username_taken', 'ÐŸÐ¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÑŒ Ñ Ñ‚Ð°ÐºÐ¸Ð¼ Ð¸Ð¼ÐµÐ½ÐµÐ¼ ÑƒÐ¶Ðµ ÑÑƒÑ‰ÐµÑÑ‚Ð²ÑƒÐµÑ‚.'),
(285, 'ru', 'user_not_confirmed', 'ÐÐµÐ¾Ð±Ñ…Ð¾Ð´Ð¸Ð¼Ð¾ Ð¿Ð¾Ð´Ñ‚Ð²ÐµÑ€Ð´Ð¸Ñ‚ÑŒ Ð’Ð°Ñˆ Ð­Ð». Ð°Ð´Ñ€ÐµÑ'),
(286, 'ru', 'posting', 'ÐŸÐ¾ÑÑ‚Ð°Ð²Ñ™Ð°ÑšÐµ...'),
(287, 'ru', 'logging_in', 'Ð’Ñ…Ð¾Ð´Ð¸Ð¼...'),
(288, 'ru', 'resetting', 'ÐŸÐµÑ€ÐµÐ·Ð°Ð³Ñ€ÑƒÐ·ÐºÐ°...'),
(289, 'ru', 'password_updated_successfully', 'ÐŸÐ°Ñ€Ð¾Ð»ÑŒ ÑƒÑÐ¿ÐµÑˆÐ½Ð¾ Ð¾Ð±Ð½Ð¾Ð²Ð»ÐµÐ½.'),
(290, 'ru', 'password_updated_successfully_login', 'ÐŸÐ°Ñ€Ð¾Ð»ÑŒ ÑƒÑÐ¿ÐµÑˆÐ½Ð¾ Ð¾Ð±Ð½Ð¾Ð²Ð»ÐµÐ½. ÐœÐ¾Ð¶Ð½Ð¾ <a href=''login.php''> Ð°Ð²Ñ‚Ð¾Ñ€Ð¸Ð·Ð¾Ð²Ð°Ñ‚ÑŒÑÑ</a>.'),
(291, 'ru', 'working', 'Ð Ð°Ð±Ð¾Ñ‚Ð°ÐµÐ¼...'),
(292, 'ru', 'password_required', 'ÐÐµÐ¾Ð±Ñ…Ð¾Ð´Ð¸Ð¼Ð¾ Ð²Ð²ÐµÑÑ‚Ð¸ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ.'),
(293, 'ru', 'wrong_password_format', 'ÐÐµÐ¿Ñ€Ð°Ð²Ð¸Ð»ÑŒÐ½Ñ‹Ðµ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÑŒ Ð¸Ð»Ð¸ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ.'),
(294, 'ru', 'passwords_dont_match', 'ÐŸÐ°Ñ€Ð¾Ð»Ð¸ Ð½Ðµ ÑÐ¾Ð²Ð¿Ð°Ð´Ð°ÑŽÑ‚.'),
(295, 'ru', 'wrong_old_password', 'Ð¡Ñ‚Ð°Ñ€Ñ‹Ð¹ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ Ð²Ð²ÐµÐ´ÐµÐ½ Ð½ÐµÐ²ÐµÑ€Ð½Ð¾!'),
(296, 'ru', 'wrong_sum', 'ÐÐµÐ¿Ñ€Ð°Ð²Ð¸Ð»ÑŒÐ½Ð¾ ÑƒÐºÐ°Ð·Ð°Ð½Ð° ÑÑƒÐ¼Ð¼Ð°. Ð’Ð²ÐµÐ´Ð¸Ñ‚Ðµ ÐµÑ‰Ðµ Ñ€Ð°Ð·.'),
(297, 'ru', 'brute_force', 'Ð’Ñ‹ Ð¿Ñ€ÐµÐ²Ñ‹ÑÐ¸Ð»Ð¸ ÐºÐ¾Ð»Ð¸Ñ‡ÐµÑÑ‚Ð²Ð¾ Ð²Ð¾Ð·Ð¼Ð¾Ð¶Ð½Ñ‹Ñ… Ð¿Ð¾Ð¿Ñ‹Ñ‚Ð¾Ðº Ð°Ð²Ñ‚Ð¾Ñ€Ð¸Ð·Ð°Ñ†Ð¸Ð¸. ÐŸÐ¾Ð¿Ñ€Ð¾Ð±ÑƒÐ¹Ñ‚Ðµ Ð°Ð²Ñ‚Ð¾Ñ€Ð¸Ð·Ð¾Ð²Ð°Ñ‚ÑŒÑÑ Ð·Ð°Ð²Ñ‚Ñ€Ð°.'),
(298, 'ru', 'success_registration_no_confirm', 'Ð ÐµÐ³Ð¸ÑÑ‚Ñ€Ð°Ñ†Ð¸Ñ Ð¿Ñ€Ð¾ÑˆÐ»Ð° ÑƒÑÐ¿ÐµÑˆÐ½Ð¾. ÐŸÑ€Ð¾Ð²ÐµÑ€ÑŒÑ‚Ðµ Ð’Ð°Ñˆ Ð­Ð». Ð°Ð´Ñ€ÐµÑ'),
(299, 'ru', 'user_added_successfully', 'ÐŸÐ¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÑŒ ÑƒÑÐ¿ÐµÑˆÐ½Ð¾ Ð´Ð¾Ð±Ð°Ð²Ð»ÐµÐ½.'),
(300, 'ru', 'user_updated_successfully', 'ÐŸÐ¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÑŒ ÑƒÑÐ¿ÐµÑˆÐ½Ð¾ Ð¾Ð±Ð½Ð¾Ð²Ð»ÐµÐ½.'),
(301, 'ru', 'user_dont_exist', 'Ð”Ð°Ð½Ð½Ñ‹Ð¹ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÑŒ Ð½Ðµ ÑÑƒÑ‰ÐµÑÑ‚Ð²ÑƒÐµÑ‚.'),
(302, 'ru', 'leave_blank', 'ÐžÑÑ‚Ð°Ð²ÑŒÑ‚Ðµ ÑÑ‚Ð¾ Ð¿Ð¾Ð»Ðµ Ð¿ÑƒÑÑ‚Ñ‹Ð¼, ÐµÑÐ»Ð¸ Ð½Ðµ Ñ…Ð¾Ñ‚Ð¸Ñ‚Ðµ Ð¸Ð·Ð¼ÐµÐ½ÑÑ‚ÑŒ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ.'),
(303, 'ru', 'invalid_password_reset_key', 'ÐÐµÐ¿Ñ€Ð°Ð²Ð¸Ð»ÑŒÐ½Ñ‹Ð¹ ÐºÐ»ÑŽÑ‡ Ð´Ð»Ñ ÑÐ±Ñ€Ð¾ÑÐ° Ð¿Ð°Ñ€Ð¾Ð»Ñ'),
(304, 'ru', 'password_length', 'ÐŸÐ°Ñ€Ð¾Ð»ÑŒ Ð´Ð¾Ð»Ð¶ÐµÐ½ Ð±Ñ‹Ñ‚ÑŒ Ð½Ðµ Ð¼ÐµÐ½ÐµÐµ 6 ÑÐ¸Ð¼Ð²Ð¾Ð»Ð¾Ð².'),
(305, 'ru', 'error_writing_to_db', 'ÐžÑˆÐ¸Ð±ÐºÐ° Ð·Ð°Ð¿Ð¸ÑÐ¸ Ð² Ð±Ð°Ð·Ñƒ Ð´Ð°Ð½Ð½Ñ‹Ñ…. ÐŸÐ¾Ð¿Ñ€Ð¾Ð±ÑƒÐ¹Ñ‚Ðµ ÐµÑ‰Ðµ Ñ€Ð°Ð·.'),
(306, 'ru', 'password_reset_email_sent', 'ÐžÑ‚Ð¿Ñ€Ð°Ð²Ð»ÐµÐ½Ð¾ Ð¿Ð¸ÑÑŒÐ¼Ð¾ Ð´Ð»Ñ ÑÐ¼ÐµÐ½Ñ‹ Ð¿Ð°Ñ€Ð¾Ð»Ñ. ÐŸÑ€Ð¾Ð²ÐµÑ€ÑŒÑ‚Ðµ Ð’Ð°Ñˆ Ð­Ð». Ð°Ð´Ñ€ÐµÑ.'),
(307, 'ru', 'message_couldn_be_sent', 'Ð¡Ð¾Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ðµ Ð½Ðµ Ð¼Ð¾Ð¶ÐµÑ‚ Ð±Ñ‹Ñ‚ÑŒ Ð¾Ñ‚Ð¿Ñ€Ð°Ð²Ð»ÐµÐ½Ð¾. ÐŸÐ¾Ð¿Ñ€Ð¾Ð±ÑƒÐ¹Ñ‚Ðµ ÐµÑ‰Ðµ Ñ€Ð°Ð·.'),
(308, 'ru', 'updating', 'ÐžÐ±Ð½Ð¾Ð²Ð»ÐµÐ½Ð¸Ðµ...'),
(309, 'ru', 'details_updated', 'Ð”Ð°Ð½Ð½Ñ‹Ðµ ÑƒÑÐ¿ÐµÑˆÐ½Ð¾ Ð¾Ð±Ð½Ð¾Ð²Ð»ÐµÐ½Ñ‹.'),
(310, 'ru', 'are_you_sure', 'Ð’Ñ‹ ÑƒÐ²ÐµÑ€ÐµÐ½Ñ‹ ?'),
(311, 'ru', 'creating_account', 'Ð¡Ð¾Ð·Ð´Ð°Ð½Ð¸Ðµ Ð°ÐºÐºÐ°ÑƒÐ½Ñ‚Ð°...'),
(312, 'rs', 'email', 'Ð­Ð». Ð°Ð´Ñ€ÐµÑ'),
(313, 'rs', 'login', 'ÐÐ²Ñ‚Ð¾Ñ€Ð¸Ð·Ð¾Ð²Ð°Ñ‚ÑŒÑÑ'),
(314, 'rs', 'username', 'Ð˜Ð¼Ñ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ñ'),
(315, 'rs', 'password', 'Ð¿Ð°Ñ€Ð¾Ð»ÑŒ'),
(316, 'rs', 'male', 'Ð¼ÑƒÐ¶Ñ‡Ð¸Ð½Ð°'),
(317, 'rs', 'female', 'Ð¶ÐµÐ½ÑÐºÐ¸Ð¹'),
(318, 'rs', 'your_email', 'vaÅ¡a ÐµÐ¼Ð°Ð¸Ð»'),
(319, 'rs', 'login_with', 'ÐŸÑ€Ð¸Ñ˜Ð°Ð²Ð¸Ñ‚Ðµ ÑÐµ'),
(320, 'rs', 'email_confirmed', 'ÐµÐ¼Ð°Ð¸Ð» Ð¿Ð¾Ñ‚Ð²Ñ€Ð´Ð¸Ð¾'),
(321, 'rs', 'create_account', 'Ð ÐµÐ³Ð¸ÑÑ‚Ñ€ÑƒÑ˜ ÑÐµ'),
(322, 'rs', 'forgot_password', 'Ð—Ð°Ð±Ð¾Ñ€Ð°Ð²Ð¸Ð»Ð¸ ÑÑ‚Ðµ Ð»Ð¾Ð·Ð¸Ð½ÐºÑƒ ?'),
(323, 'rs', 'repeat_password', 'ÐŸÐ¾Ð½Ð¾Ð²Ð¸Ñ‚Ðµ Ð»Ð¾Ð·Ð¸Ð½ÐºÑƒ'),
(324, 'rs', 'reset_password', 'Ð ÐµÑÐµÑ‚ÑƒÑ˜ ÑˆÐ¸Ñ„Ñ€Ñƒ'),
(325, 'rs', 'email_confirmation', 'Ð˜Ð¼ÐµÑ˜Ð» Ð¿Ð¾Ñ‚Ð²Ñ€Ð´Ð°'),
(326, 'rs', 'you_can_login_now', 'ÐœÐ¾Ð¶ÐµÑ‚Ðµ<a href=''{link}''> Ð»Ð¾Ð³ Ð¸Ð½</a> ÑÐ°Ð´Ð°.'),
(327, 'rs', 'user_with_key_doesnt_exist', 'ÐšÐ¾Ñ€Ð¸ÑÐ½Ð¸Ðº ÑÐ° Ð¾Ð²Ð¸Ð¼ ÐºÑ™ÑƒÑ‡ÐµÐ¼ Ð½Ðµ Ð¿Ð¾ÑÑ‚Ð¾Ñ˜Ð¸ Ñƒ Ð½Ð°ÑˆÐ¾Ñ˜ Ð±Ð°Ð·Ð¸.'),
(328, 'rs', 'gender', 'Ð¿Ð¾Ð»'),
(329, 'rs', 'dob', 'Ð”ÐžÐ‘'),
(330, 'rs', 'country', 'Ð·ÐµÐ¼Ñ™Ð°'),
(331, 'rs', 'welcome', 'Ð”Ð¾Ð±Ñ€Ð¾Ð´Ð¾ÑˆÐ»Ð¸'),
(332, 'rs', 'panel_mini_admin', 'ÐÐ´Ð¼Ð¸Ð½ Ð¼Ð¸Ð½Ð¸ Ð¿Ð°Ð½ÐµÐ»'),
(333, 'rs', 'view_profile_page', 'ÐŸÐ¾Ð³Ð»ÐµÐ´Ð°Ñ˜ Ð¿Ñ€Ð¾Ñ„Ð¸Ð» ÑÑ‚Ñ€Ð°Ð½Ð°'),
(334, 'rs', 'log_off', 'ÐžÐ´Ñ˜Ð°Ð²Ð¸ ÑÐµ'),
(335, 'rs', 'admin_panel', 'Ñ‚Ð°Ð±Ð»Ð° Ñ€ÑƒÐºÐ¾Ð²Ð¾Ð´Ð¸Ð¾Ñ†Ð°'),
(336, 'rs', 'member_panel', 'ÐšÐ¾Ñ€Ð¸ÑÐ½Ð¸Ñ‡ÐºÐ¾ Ð¿Ð°Ð½ÐµÐ»'),
(337, 'rs', 'HELLO', 'Ð—Ð´Ñ€Ð°Ð²Ð¾'),
(338, 'rs', 'home', 'Ð”Ð¾Ð¼'),
(339, 'rs', 'users', 'ÑƒÑÐµÑ€Ñ'),
(340, 'rs', 'my_profile', 'ÐœÐ¾Ñ˜ Ð¿Ñ€Ð¾Ñ„Ð¸Ð»'),
(341, 'rs', 'user_roles', 'ÑƒÑÐµÑ€ Ð£Ð»Ð¾Ð³Ðµ'),
(342, 'rs', 'index', 'Ð¸Ð½Ð´ÐµÐºÑ'),
(343, 'rs', 'contact_us', 'ÐšÐ¾Ð½Ñ‚Ð°ÐºÑ‚Ð¸Ñ€Ð°Ñ˜Ñ‚Ðµ Ð½Ð°Ñ'),
(344, 'rs', 'forum', 'Ñ„Ð¾Ñ€ÑƒÐ¼'),
(345, 'rs', 'shop', 'Ð¿Ñ€Ð¾Ð´Ð°Ð²Ð½Ð¸Ñ†Ð°'),
(346, 'rs', 'cafe', 'ÐºÐ°Ñ„Ðµ'),
(347, 'rs', 'submit', 'Ð¿Ð¾Ð´Ð½ÐµÑ‚Ð¸'),
(348, 'rs', 'about_us', 'Ðž Ð½Ð°Ð¼Ð°'),
(349, 'rs', 'info', 'Ð¸Ð½Ñ„Ð¾'),
(350, 'rs', 'welcome_', 'Ð”Ð¾Ð±Ñ€Ð¾Ð´Ð¾ÑˆÐ»Ð¸ Ñƒ'),
(351, 'rs', 'main_title', 'ÐžÐ²Ð¾ Ñ˜Ðµ Ð·Ð°Ð¼Ð¸ÑˆÑ™ÐµÐ½Ð° ÐºÐ°Ð¾ Ð‘Ð•Ð¡ÐŸÐ›ÐÐ¢ÐÐž Ð¦ÐœÐ¡ ÑÐ¸ÑÑ‚ÐµÐ¼Ð°, ÑÐ°Ð¼Ð¾ Ð·Ð°Ñ‚Ð¾ ÑˆÑ‚Ð¾ Ð²Ð¾Ð»Ð¸Ð¼ Ð´Ð° ÑÑ‚Ð²Ð¾Ñ€Ð¸ ÑÑ‚Ð²Ð°Ñ€Ð¸, Ð¿Ð¾Ñ˜ÐµÐ´Ð½Ð¾ÑÑ‚Ð°Ð²Ñ™ÐµÐ½Ð¾ Ð¸Ð½Ñ‚ÐµÑ€Ñ„ÐµÑ˜Ñ Ð¿Ð¾Ð·Ð°Ð´Ð¸Ð½ÑÐºÐ¸, Ð¸Ð·Ð³Ñ€Ð°Ñ’ÐµÐ½Ð° Ð·Ð° Ñ…Ð¸Ð³Ñ… Ðµ'),
(352, 'rs', 'view_details', 'ÐŸÑ€Ð¸ÐºÐ°Ð· Ð´ÐµÑ‚Ð°Ñ™Ð°'),
(353, 'rs', 'footer', 'ÐÐ°Ð¿Ñ€Ð°Ð²Ñ™ÐµÐ½ Ð¸ Ð Ð°Ð·Ð²Ð¸Ñ˜ÐµÐ½ Ð¾Ð´ ÑÑ‚Ñ€Ð°Ð½Ðµ Ð’Ð˜: Ð’Ð°Ñ€Ð½ÐµÑ€-Ð˜Ð½Ñ„Ð¸Ð½Ð¸Ñ‚Ð¸'),
(354, 'rs', 'copyright', 'ÐÑƒÑ‚Ð¾Ñ€ÑÐºÐ¾ Ð¿Ñ€Ð°Ð²Ð¾'),
(355, 'rs', 'phone', 'phone'),
(356, 'en', 'trans_lang', 'Lang'),
(357, 'en', 'lang_keyword', 'Keyword'),
(358, 'en', 'lang_trans', 'Translation'),
(359, 'en', 'successfully_updated_site_settings', 'successfully Updated Site Settings'),
(360, 'en', 'Pick_Category', 'Pick Category'),
(361, 'en', 'Pick_Brand', 'Pick Brand'),
(362, 'en', 'Change_cat', 'Change category'),
(363, 'en', 'brand', 'Brand'),
(364, 'en', 'Category', 'Category'),
(365, 'en', 'product_name', 'Produce Name'),
(366, 'en', 'product_desc', 'Product Description'),
(367, 'en', 'product_price', 'Product Price'),
(368, 'en', 'product_image', 'Product Image'),
(369, 'en', 'edit_css', 'Edit CSS'),
(370, 'en', 'edit_meta', 'Edit Meta'),
(371, 'en', 'edit_css_href', 'Href'),
(372, 'en', 'meta_name', 'Meta Name'),
(373, 'en', 'meta_content', 'Meta Content'),
(374, 'en', 'meta_author', 'Meta Author'),
(375, 'en', 'add_meta', 'Add Meta'),
(376, 'en', 'add_trans', 'Add Translation'),
(377, 'en', 'add_lang', 'Add Language'),
(378, 'en', 'css_name', 'Add CSS'),
(379, 'en', 'admins', 'Administrators'),
(380, 'en', 'logs', 'Logs'),
(381, 'en', 'add_todo', 'Add to do Item'),
(382, 'en', 'ToDoItem', 'to do Item'),
(383, 'en', 'choose', 'Please Choose an option'),
(384, 'en', 'Media_Lib', 'WIMedia Library'),
(385, 'en', 'upload_logo', 'Upload logo'),
(386, 'en', 'add_lang', 'Add Language'),
(387, 'en', 'country', 'country name'),
(388, 'en', 'country_code', 'country code'),
(389, 'en', 'change_lang', 'Change Lang'),
(390, 'en', 'save', 'Save'),
(391, 'en', 'updating', 'updating'),
(392, 'en', 'href', 'Href'),
(393, 'en', 'edit_meta', 'Edit Meta'),
(394, 'en', 'meta_content', 'Meta Content'),
(395, 'en', 'meta_name', 'Meta_Name'),
(396, 'en', 'meta_author', 'Meta Author'),
(397, 'en', 'edit_css', 'Edit CSS'),
(398, 'en', 'edit_js', 'Edit JS');

-- --------------------------------------------------------

--
-- Table structure for table `wi_user_details`
--

CREATE TABLE IF NOT EXISTS `wi_user_details` (
  `id_user_details` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio_body` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `friend_array` text COLLATE utf8_unicode_ci,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Available','in_chat') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Available',
  PRIMARY KEY (`id_user_details`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wi_user_details`
--

INSERT INTO `wi_user_details` (`id_user_details`, `user_id`, `first_name`, `last_name`, `phone`, `address`, `country`, `region`, `city`, `bio_body`, `website`, `youtube`, `facebook`, `twitter`, `friend_array`, `avatar`, `status`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `wi_user_group`
--

CREATE TABLE IF NOT EXISTS `wi_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wi_user_group`
--

INSERT INTO `wi_user_group` (`id`, `group`) VALUES
(1, 'Site');

-- --------------------------------------------------------

--
-- Table structure for table `wi_user_page_group`
--

CREATE TABLE IF NOT EXISTS `wi_user_page_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mod_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wi_user_page_group`
--

INSERT INTO `wi_user_page_group` (`id`, `mod_type`) VALUES
(1, 'Site');

-- --------------------------------------------------------

--
-- Table structure for table `wi_user_permissions`
--

CREATE TABLE IF NOT EXISTS `wi_user_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  `perm_name` varchar(255) NOT NULL,
  `edit` enum('0','1') NOT NULL DEFAULT '0',
  `create` enum('0','1') NOT NULL DEFAULT '0',
  `delete` enum('0','1') NOT NULL DEFAULT '0',
  `view` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `wi_user_permissions`
--

INSERT INTO `wi_user_permissions` (`id`, `role_id`, `group`, `perm_name`, `edit`, `create`, `delete`, `view`) VALUES
(1, 7, 1, 'Site', '1', '1', '1', '1'),
(2, 1, 1, 'Site', '0', '0', '0', '0'),
(3, 3, 1, 'Site', '1', '1', '1', '1'),
(4, 4, 1, 'Site', '1', '1', '1', '1'),
(5, 5, 1, 'Site', '1', '1', '1', '1'),
(6, 6, 1, 'Site', '1', '1', '1', '1'),
(7, 2, 1, 'Site', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wi_user_roles`
--

CREATE TABLE IF NOT EXISTS `wi_user_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `wi_user_roles`
--

INSERT INTO `wi_user_roles` (`role_id`, `role`) VALUES
(1, 'User'),
(2, 'VIP'),
(3, 'Moderator'),
(4, 'Developer'),
(5, 'Administrator'),
(6, 'Head Administrator'),
(7, 'Owner');

-- --------------------------------------------------------

--
-- Table structure for table `wi_visitors_log`
--

CREATE TABLE IF NOT EXISTS `wi_visitors_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ip` text COLLATE utf8_unicode_ci NOT NULL,
  `country` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wi_visitors_log`
--

";
$pdo->exec($q);
		//$pdo = null;

		$this->createConfig($db_host, $db_name, $db_username, $db_pass);

    $admin_pass = $this->hashingPassword($admin_pass);
    //echo "ad" . $admin_pass;
    //generate email confirmation key
            $key = $this->_generateKey();

    $admin = "INSERT INTO `wi_members` (`user_id`, `email`, `username`, `password`, `confirmation_key`, `confirmed`, `password_reset_key`, `password_reset_confirmed`,`password_reset_timestamp`,`register_date`,`user_role`,`last_login`,`ip_addr`,`banned`) VALUES
      (1, '$user_email', '$admin_user', '$admin_pass', '$key', 'N','','N','','$dat','$role', '', '$ip','N');
      INSERT INTO `wi_user_details` (`id_user_details`, `user_id`) VALUES
      (1, 1);";

$pdo->exec($admin);


    $pdo = null;

    $results = array(
      "status" => "install_completed"
    );
    echo json_encode($results);



	}	

	private function createConfig($db_host, $db_name, $db_username, $db_pass)
	{
    $path_to_file = fopen(dirname(dirname(dirname(dirname(__FILE__)))) .'/WICore/WIClass/WIConfig.php', "w");
		

		$txt = '<?php
include_once dirname(dirname(dirname(__FILE__))) . "/WIAdmin/WICore/WILib.php";

date_default_timezone_set("UTC");

//Bootstrap

define("BOOTSTRAP_VERSION", $bootstrap_version);

//WEBSITE

define("WEBSITE_NAME", $webName);

define("WEBSITE_DOMAIN", $domain);

//it can be the same as domain (if script is placed on website\'s root folder) 
//or it can cotain path that include subfolders, if script is located in some subfolder and not in root folder
define("SCRIPT_URL", $script);

//DATABASE CONFIGURATION
define("DB_HOST", $dbhost); 

define("DB_TYPE", $dbtype); 

define("DB_USER", $dbusername); 

define("DB_PASS", $dbpass); 

define("DB_NAME", $dbname); 

//SESSION CONFIGURATION

define("SESSION_SECURE", $session);   

define("SESSION_HTTP_ONLY", $http);

define("SESSION_REGENERATE_ID", $regenerate);   

define("SESSION_USE_ONLY_COOKIES", $cookie);

//LOGIN CONFIGURATION

define("LOGIN_MAX_LOGIN_ATTEMPTS", $loginAttemp); 

define("LOGIN_FINGERPRINT", $loginFinger); 

define("SUCCESS_LOGIN_REDIRECT", serialize(array( "default" => $redirect ))); 

//PASSWORD CONFIGURATION

define("PASSWORD_ENCRYPTION", $encryption); 
//available values: "sha512", "bcrypt"

define("PASSWORD_BCRYPT_COST", $bcrypt); 

define("PASSWORD_SHA512_ITERATIONS", $sha512); 

define("PASSWORD_SALT", $salt); //22 characters to be appended on first 7 characters that will be generated using PASSWORD_ info above

define("PASSWORD_RESET_KEY_LIFE", $keylife); 

//REGISTRATION CONFIGURATION

define("MAIL_CONFIRMATION_REQUIRED", $mailConfirm); 

define("REGISTER_CONFIRM", $regConfirm); 

define("REGISTER_PASSWORD_RESET", $passReset); 

//EMAIL SENDING CONFIGURATION

define("MAILER", $mail); // available options are "mail" for php mail() and "smtp" for using SMTP server for sending emails

define("SMTP_HOST", $smpt_host); 

define("SMTP_PORT", $smpt_port); 

define("SMTP_USERNAME", $smpt_username); 

define("SMTP_PASSWORD", $smpt_password); 

define("SMTP_ENCRYPTION", $smpt_encryption); 

//SOCIAL LOGIN CONFIGURATION

define("SOCIAL_CALLBACK_URI", $social); 

// GOOGLE

define("GOOGLE_ENABLED", $google); 

define("GOOGLE_ID", $google_id); 

define("GOOGLE_SECRET", $google_secret); 

define("GOOGLE_MAP_API ", $google_map_api ); 

define("GOOGLE_CHARTS_API_KEY", $google_charts_api_key); 

// FACEBOOK

define("FACEBOOK_ENABLED", $fb); 

define("FACEBOOK_ID", $fb_id); 

define("FACEBOOK_SECRET", $fb_secret); 

// TWITTER

// NOTE: Twitter api for authentication doesn\'t provide users email address!
// So, if you email address is strictly required for all users, consider disabling twitter login option.

define("TWITTER_ENABLED", $tw_enabled); 

define("TWITTER_KEY", $tw_key); 

define("TWITTER_SECRET", $tw_secret); 


// TRANSLATION

define("DEFAULT_LANGUAGE", $default_lang); 

// VERSION 
define("WICMS_VERSION", $version);';

      $newPage = fwrite($path_to_file, $txt);
      fclose($newPage);


  $path_to_db = fopen(dirname(dirname(dirname(dirname(__FILE__)))) .'/WIAdmin/WICore/db.php', "w");

  $db_txt = '<?php 

define("HOST", "' . $db_host. '"); 

define("TYPE", "mysql"); 

define("USER", "' . $db_username. '"); 

define("PASS", "' . $db_pass. '"); 

define("NAME", "' . $db_name. '"); 

?>';

  $dbPage = fwrite($path_to_db, $db_txt);
      fclose($dbPage);

  $path_to_Lib = fopen(dirname(dirname(dirname(dirname(__FILE__)))) .'/WIAdmin/WICore/WILib.php', "w");

    
    $lib_txt = '<?php
require_once "WIClass/WILib.php";
require_once "WIClass/WISettings.php";
require_once "db.php";

$WIC = WILib::getInstance();
$config =  new WISettings();

$dbhost          = $config->Website_Info("db_host");
$dbusername      = $config->Website_Info("db_username");
$dbpass          = $config->Website_Info("db_pass");
$dbname          = $config->Website_Info("db_name");
$dbport          = $config->Website_Info("db_port");
$dbtype          = $config->Website_Info("db_type");

$webName               = $config->Website_Info("site_name");
$domain                = $config->Website_Info("site_domain");
$script                = $config->Website_Info("site_url");

$session               = $config->Website_Info("secure_session");
$http                  = $config->Website_Info("http_only");
$regenerate            = $config->Website_Info("regenerate_id");
$cookie                = $config->Website_Info("use_only_cookie");

$loginAttemp           = $config->Website_Info("max_login_attempts");
$loginFinger           = $config->Website_Info("login_fingerprint");
$redirect              = $config->Website_Info("redirect_after_login");
$encryption            = $config->Website_Info("password_encryption");

$bcrypt                = $config->Website_Info("encryption_cost");
$sha512                = $config->Website_Info("sha512_iterations");
$salt                  = $config->Website_Info("password_salt");
$keylife               = $config->Website_Info("reset_key_life");
$mailConfirm           = $config->Website_Info("mail_confirm_required");
$regConfirm            = $config->Website_Info("register_confirm");
$passReset             = $config->Website_Info("reg_pass_reset");
$mail                  = $config->Website_Info("mailer");
$smpt_host             = $config->Website_Info("smpt_host");
$smpt_port             = $config->Website_Info("smpt_port");
$smpt_username         = $config->Website_Info("smpt_username");
$smpt_password         = $config->Website_Info("smpt_password");

$smpt_encryption       = $config->Website_Info("smpt_encryption");
$social                = $config->Website_Info("social_callback_url");
$google                = $config->Website_Info("google_enabled");
$google_id             = $config->Website_Info("google_id");
$google_secret         = $config->Website_Info("google_secret");
$google_map_api        = $config->Website_Info("google_map_api");
$fb                    = $config->Website_Info("facebook_enabled");
$fb_id                 = $config->Website_Info("facebook_id");
$fb_secret             = $config->Website_Info("facebook_secret");
$tw_enabled            = $config->Website_Info("twitter_enabled");
$tw_key                = $config->Website_Info("twitter_key");
$tw_secret             = $config->Website_Info("twitter_secret");
$default_lang          = $config->Website_Info("default_lang");
$multi_lang            = $config->Website_Info("multi_lang");
$version               = $config->Website_Info("wicms_version");
$bootstrap_version     = $config->Website_Info("bootstrap_version");
$favicon               = $config->Website_Info("favicon");
';

$newLibPage = fwrite($path_to_Lib, $lib_txt);
      fclose($newLibPage);

	}


    public function hashingPassword($password)
     {
        include_once dirname(dirname(dirname(dirname(__FILE__)))) .'/WICore/WIClass/WIConfig.php';
        include_once dirname(dirname(dirname(dirname(__FILE__)))) .'/WICore/WIClass/WIRegister.php';
        include_once dirname(dirname(dirname(dirname(__FILE__)))) .'/WICore/WIClass/WIEmail.php';
        include_once dirname(dirname(dirname(dirname(__FILE__)))) .'/WICore/WIClass/WIMaintenace.php';

        $register = new WIRegister();
        $NewPass = $register->hashPassword($password);
        //echo $NewPass;
        return $NewPass;
     }

     private function _generateKey()
    {
      include_once dirname(dirname(dirname(dirname(__FILE__)))) .'/WICore/WIClass/WIConfig.php';
        return md5(time() . PASSWORD_SALT . time());
    }


}