-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 08:56 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_gt`
--

-- --------------------------------------------------------

--
-- Table structure for table `hr_approved`
--

CREATE TABLE `hr_approved` (
  `id` int(11) NOT NULL,
  `id_approved` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `tanggal_approved` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `approved_name` varchar(255) NOT NULL,
  `id_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_approved`
--

INSERT INTO `hr_approved` (`id`, `id_approved`, `id_user`, `tanggal_approved`, `approved_name`, `id_status`) VALUES
(69, '181', '119', '2023-05-24 12:45:44', 'admin', '4'),
(82, '181', '119', '2023-05-24 13:17:53', 'admin', '5'),
(83, '181', '119', '2023-05-24 13:26:20', 'admin', '4'),
(84, '181', '119', '2023-05-24 13:33:07', 'admin', '2'),
(85, '181', '119', '2023-05-24 13:33:44', 'admin', '2'),
(86, '181', '119', '2023-05-24 13:34:51', 'admin', '2'),
(87, '181', '119', '2023-05-24 13:36:37', 'admin', '2'),
(88, '181', '119', '2023-05-24 13:37:01', 'admin', '5'),
(89, '181', '119', '2023-05-24 13:37:04', 'admin', '3'),
(90, '181', '119', '2023-05-24 13:38:56', 'admin', '3'),
(91, '181', '119', '2023-05-24 13:39:17', 'admin', '3'),
(92, '181', '119', '2023-05-24 13:41:57', 'admin', '5'),
(93, '181', '119', '2023-05-24 13:42:00', 'admin', '3');

-- --------------------------------------------------------

--
-- Table structure for table `hr_category`
--

CREATE TABLE `hr_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_category`
--

INSERT INTO `hr_category` (`id`, `category`) VALUES
(1, 'Talent Acquisition'),
(2, 'Talent Management'),
(3, 'Organizational Development'),
(4, 'Learning and Development'),
(5, 'Payroll'),
(6, 'Policy'),
(7, 'Human Resources Information System'),
(8, 'Human Resources Operations'),
(9, 'Human Resources Performance Management');

-- --------------------------------------------------------

--
-- Table structure for table `hr_collab`
--

CREATE TABLE `hr_collab` (
  `id` int(11) NOT NULL,
  `id_hr` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_collab`
--

INSERT INTO `hr_collab` (`id`, `id_hr`, `name`) VALUES
(1, '1,2', 'talent_group'),
(2, '3,6', 'organization_group'),
(3, '4,5', 'LnD_group'),
(4, '7,8,9', 'HRIT_group');

-- --------------------------------------------------------

--
-- Table structure for table `hr_countries`
--

CREATE TABLE `hr_countries` (
  `name` varchar(100) NOT NULL,
  `abv` char(2) NOT NULL DEFAULT '' COMMENT 'ISO 3661-1 alpha-2',
  `abv3` char(3) DEFAULT NULL COMMENT 'ISO 3661-1 alpha-3',
  `abv3_alt` char(3) DEFAULT NULL,
  `code` char(3) DEFAULT NULL COMMENT 'ISO 3661-1 numeric',
  `slug` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_countries`
--

INSERT INTO `hr_countries` (`name`, `abv`, `abv3`, `abv3_alt`, `code`, `slug`) VALUES
('Afghanistan', 'AF', 'AFG', NULL, '4', 'afghanistan'),
('Aland Islands', 'AX', 'ALA', NULL, '248', 'aland-islands'),
('Albania', 'AL', 'ALB', NULL, '8', 'albania'),
('Algeria', 'DZ', 'DZA', NULL, '12', 'algeria'),
('American Samoa', 'AS', 'ASM', NULL, '16', 'american-samoa'),
('Andorra', 'AD', 'AND', NULL, '20', 'andorra'),
('Angola', 'AO', 'AGO', NULL, '24', 'angola'),
('Anguilla', 'AI', 'AIA', NULL, '660', 'anguilla'),
('Antigua and Barbuda', 'AG', 'ATG', NULL, '28', 'antigua-and-barbuda'),
('Argentina', 'AR', 'ARG', NULL, '32', 'argentina'),
('Armenia', 'AM', 'ARM', NULL, '51', 'armenia'),
('Aruba', 'AW', 'ABW', NULL, '533', 'aruba'),
('Australia', 'AU', 'AUS', NULL, '36', 'australia'),
('Austria', 'AT', 'AUT', NULL, '40', 'austria'),
('Azerbaijan', 'AZ', 'AZE', NULL, '31', 'azerbaijan'),
('Bahamas', 'BS', 'BHS', NULL, '44', 'bahamas'),
('Bahrain', 'BH', 'BHR', NULL, '48', 'bahrain'),
('Bangladesh', 'BD', 'BGD', NULL, '50', 'bangladesh'),
('Barbados', 'BB', 'BRB', NULL, '52', 'barbados'),
('Belarus', 'BY', 'BLR', NULL, '112', 'belarus'),
('Belgium', 'BE', 'BEL', NULL, '56', 'belgium'),
('Belize', 'BZ', 'BLZ', NULL, '84', 'belize'),
('Benin', 'BJ', 'BEN', NULL, '204', 'benin'),
('Bermuda', 'BM', 'BMU', NULL, '60', 'bermuda'),
('Bhutan', 'BT', 'BTN', NULL, '64', 'bhutan'),
('Bolivia', 'BO', 'BOL', NULL, '68', 'bolivia'),
('Bosnia and Herzegovina', 'BA', 'BIH', NULL, '70', 'bosnia-and-herzegovina'),
('Botswana', 'BW', 'BWA', NULL, '72', 'botswana'),
('Brazil', 'BR', 'BRA', NULL, '76', 'brazil'),
('British Virgin Islands', 'VG', 'VGB', NULL, '92', 'british-virgin-islands'),
('Brunei Darussalam', 'BN', 'BRN', NULL, '96', 'brunei-darussalam'),
('Bulgaria', 'BG', 'BGR', NULL, '100', 'bulgaria'),
('Burkina Faso', 'BF', 'BFA', NULL, '854', 'burkina-faso'),
('Burundi', 'BI', 'BDI', NULL, '108', 'burundi'),
('Cambodia', 'KH', 'KHM', NULL, '116', 'cambodia'),
('Cameroon', 'CM', 'CMR', NULL, '120', 'cameroon'),
('Canada', 'CA', 'CAN', NULL, '124', 'canada'),
('Cape Verde', 'CV', 'CPV', NULL, '132', 'cape-verde'),
('Cayman Islands', 'KY', 'CYM', NULL, '136', 'cayman-islands'),
('Central African Republic', 'CF', 'CAF', NULL, '140', 'central-african-republic'),
('Chad', 'TD', 'TCD', NULL, '148', 'chad'),
('Chile', 'CL', 'CHL', 'CHI', '152', 'chile'),
('China', 'CN', 'CHN', NULL, '156', 'china'),
('Colombia', 'CO', 'COL', NULL, '170', 'colombia'),
('Comoros', 'KM', 'COM', NULL, '174', 'comoros'),
('Congo', 'CG', 'COG', NULL, '178', 'congo'),
('Cook Islands', 'CK', 'COK', NULL, '184', 'cook-islands'),
('Costa Rica', 'CR', 'CRI', NULL, '188', 'costa-rica'),
('Cote d\'Ivoire', 'CI', 'CIV', NULL, '384', 'cote-divoire'),
('Croatia', 'HR', 'HRV', NULL, '191', 'croatia'),
('Cuba', 'CU', 'CUB', NULL, '192', 'cuba'),
('Cyprus', 'CY', 'CYP', NULL, '196', 'cyprus'),
('Czech Republic', 'CZ', 'CZE', NULL, '203', 'czech-republic'),
('Democratic Republic of the Congo', 'CD', 'COD', NULL, '180', 'democratic-republic-of-congo'),
('Denmark', 'DK', 'DNK', NULL, '208', 'denmark'),
('Djibouti', 'DJ', 'DJI', NULL, '262', 'djibouti'),
('Dominica', 'DM', 'DMA', NULL, '212', 'dominica'),
('Dominican Republic', 'DO', 'DOM', NULL, '214', 'dominican-republic'),
('Ecuador', 'EC', 'ECU', NULL, '218', 'ecuador'),
('Egypt', 'EG', 'EGY', NULL, '818', 'egypt'),
('El Salvador', 'SV', 'SLV', NULL, '222', 'el-salvador'),
('Equatorial Guinea', 'GQ', 'GNQ', NULL, '226', 'equatorial-guinea'),
('Eritrea', 'ER', 'ERI', NULL, '232', 'eritrea'),
('Estonia', 'EE', 'EST', NULL, '233', 'estonia'),
('Ethiopia', 'ET', 'ETH', NULL, '231', 'ethiopia'),
('Faeroe Islands', 'FO', 'FRO', NULL, '234', 'faeroe-islands'),
('Falkland Islands', 'FK', 'FLK', NULL, '238', 'falkland-islands'),
('Fiji', 'FJ', 'FJI', NULL, '242', 'fiji'),
('Finland', 'FI', 'FIN', NULL, '246', 'finland'),
('France', 'FR', 'FRA', NULL, '250', 'france'),
('French Guiana', 'GF', 'GUF', NULL, '254', 'french-guiana'),
('French Polynesia', 'PF', 'PYF', NULL, '258', 'french-polynesia'),
('Gabon', 'GA', 'GAB', NULL, '266', 'gabon'),
('Gambia', 'GM', 'GMB', NULL, '270', 'gambia'),
('Georgia', 'GE', 'GEO', NULL, '268', 'georgia'),
('Germany', 'DE', 'DEU', NULL, '276', 'germany'),
('Ghana', 'GH', 'GHA', NULL, '288', 'ghana'),
('Gibraltar', 'GI', 'GIB', NULL, '292', 'gibraltar'),
('Greece', 'GR', 'GRC', NULL, '300', 'greece'),
('Greenland', 'GL', 'GRL', NULL, '304', 'greenland'),
('Grenada', 'GD', 'GRD', NULL, '308', 'grenada'),
('Guadeloupe', 'GP', 'GLP', NULL, '312', 'guadeloupe'),
('Guam', 'GU', 'GUM', NULL, '316', 'guam'),
('Guatemala', 'GT', 'GTM', NULL, '320', 'guatemala'),
('Guernsey', 'GG', 'GGY', NULL, '831', 'guernsey'),
('Guinea', 'GN', 'GIN', NULL, '324', 'guinea'),
('Guinea-Bissau', 'GW', 'GNB', NULL, '624', 'guinea-bissau'),
('Guyana', 'GY', 'GUY', NULL, '328', 'guyana'),
('Haiti', 'HT', 'HTI', NULL, '332', 'haiti'),
('Holy See', 'VA', 'VAT', NULL, '336', 'holy-see'),
('Honduras', 'HN', 'HND', NULL, '340', 'honduras'),
('Hong Kong', 'HK', 'HKG', NULL, '344', 'hong-kong'),
('Hungary', 'HU', 'HUN', NULL, '348', 'hungary'),
('Iceland', 'IS', 'ISL', NULL, '352', 'iceland'),
('India', 'IN', 'IND', NULL, '356', 'india'),
('Indonesia', 'ID', 'IDN', NULL, '360', 'indonesia'),
('Iran', 'IR', 'IRN', NULL, '364', 'iran'),
('Iraq', 'IQ', 'IRQ', NULL, '368', 'iraq'),
('Ireland', 'IE', 'IRL', NULL, '372', 'ireland'),
('Isle of Man', 'IM', 'IMN', NULL, '833', 'isle-of-man'),
('Israel', 'IL', 'ISR', NULL, '376', 'israel'),
('Italy', 'IT', 'ITA', NULL, '380', 'italy'),
('Jamaica', 'JM', 'JAM', NULL, '388', 'jamaica'),
('Japan', 'JP', 'JPN', NULL, '392', 'japan'),
('Jersey', 'JE', 'JEY', NULL, '832', 'jersey'),
('Jordan', 'JO', 'JOR', NULL, '400', 'jordan'),
('Kazakhstan', 'KZ', 'KAZ', NULL, '398', 'kazakhstan'),
('Kenya', 'KE', 'KEN', NULL, '404', 'kenya'),
('Kiribati', 'KI', 'KIR', NULL, '296', 'kiribati'),
('Kuwait', 'KW', 'KWT', NULL, '414', 'kuwait'),
('Kyrgyzstan', 'KG', 'KGZ', NULL, '417', 'kyrgyzstan'),
('Laos', 'LA', 'LAO', NULL, '418', 'laos'),
('Latvia', 'LV', 'LVA', NULL, '428', 'latvia'),
('Lebanon', 'LB', 'LBN', NULL, '422', 'lebanon'),
('Lesotho', 'LS', 'LSO', NULL, '426', 'lesotho'),
('Liberia', 'LR', 'LBR', NULL, '430', 'liberia'),
('Libyan Arab Jamahiriya', 'LY', 'LBY', NULL, '434', 'libyan-arab-jamahiriya'),
('Liechtenstein', 'LI', 'LIE', NULL, '438', 'liechtenstein'),
('Lithuania', 'LT', 'LTU', NULL, '440', 'lithuania'),
('Luxembourg', 'LU', 'LUX', NULL, '442', 'luxembourg'),
('Macao', 'MO', 'MAC', NULL, '446', 'macao'),
('Macedonia', 'MK', 'MKD', NULL, '807', 'macedonia'),
('Madagascar', 'MG', 'MDG', NULL, '450', 'madagascar'),
('Malawi', 'MW', 'MWI', NULL, '454', 'malawi'),
('Malaysia', 'MY', 'MYS', NULL, '458', 'malaysia'),
('Maldives', 'MV', 'MDV', NULL, '462', 'maldives'),
('Mali', 'ML', 'MLI', NULL, '466', 'mali'),
('Malta', 'MT', 'MLT', NULL, '470', 'malta'),
('Marshall Islands', 'MH', 'MHL', NULL, '584', 'marshall-islands'),
('Martinique', 'MQ', 'MTQ', NULL, '474', 'martinique'),
('Mauritania', 'MR', 'MRT', NULL, '478', 'mauritania'),
('Mauritius', 'MU', 'MUS', NULL, '480', 'mauritius'),
('Mayotte', 'YT', 'MYT', NULL, '175', 'mayotte'),
('Mexico', 'MX', 'MEX', NULL, '484', 'mexico'),
('Micronesia', 'FM', 'FSM', NULL, '583', 'micronesia'),
('Moldova', 'MD', 'MDA', NULL, '498', 'moldova'),
('Monaco', 'MC', 'MCO', NULL, '492', 'monaco'),
('Mongolia', 'MN', 'MNG', NULL, '496', 'mongolia'),
('Montenegro', 'ME', 'MNE', NULL, '499', 'montenegro'),
('Montserrat', 'MS', 'MSR', NULL, '500', 'montserrat'),
('Morocco', 'MA', 'MAR', NULL, '504', 'morocco'),
('Mozambique', 'MZ', 'MOZ', NULL, '508', 'mozambique'),
('Myanmar', 'MM', 'MMR', 'BUR', '104', 'myanmar'),
('Namibia', 'NA', 'NAM', NULL, '516', 'namibia'),
('Nauru', 'NR', 'NRU', NULL, '520', 'nauru'),
('Nepal', 'NP', 'NPL', NULL, '524', 'nepal'),
('Netherlands', 'NL', 'NLD', NULL, '528', 'netherlands'),
('Netherlands Antilles', 'AN', 'ANT', NULL, '530', 'netherlands-antilles'),
('New Caledonia', 'NC', 'NCL', NULL, '540', 'new-caledonia'),
('New Zealand', 'NZ', 'NZL', NULL, '554', 'new-zealand'),
('Nicaragua', 'NI', 'NIC', NULL, '558', 'nicaragua'),
('Niger', 'NE', 'NER', NULL, '562', 'niger'),
('Nigeria', 'NG', 'NGA', NULL, '566', 'nigeria'),
('Niue', 'NU', 'NIU', NULL, '570', 'niue'),
('Norfolk Island', 'NF', 'NFK', NULL, '574', 'norfolk-island'),
('North Korea', 'KP', 'PRK', NULL, '408', 'north-korea'),
('Northern Mariana Islands', 'MP', 'MNP', NULL, '580', 'northern-mariana-islands'),
('Norway', 'NO', 'NOR', NULL, '578', 'norway'),
('Oman', 'OM', 'OMN', NULL, '512', 'oman'),
('Pakistan', 'PK', 'PAK', NULL, '586', 'pakistan'),
('Palau', 'PW', 'PLW', NULL, '585', 'palau'),
('Palestine', 'PS', 'PSE', NULL, '275', 'palestine'),
('Panama', 'PA', 'PAN', NULL, '591', 'panama'),
('Papua New Guinea', 'PG', 'PNG', NULL, '598', 'papua-new-guinea'),
('Paraguay', 'PY', 'PRY', NULL, '600', 'paraguay'),
('Peru', 'PE', 'PER', NULL, '604', 'peru'),
('Philippines', 'PH', 'PHL', NULL, '608', 'philippines'),
('Pitcairn', 'PN', 'PCN', NULL, '612', 'pitcairn'),
('Poland', 'PL', 'POL', NULL, '616', 'poland'),
('Portugal', 'PT', 'PRT', NULL, '620', 'portugal'),
('Puerto Rico', 'PR', 'PRI', NULL, '630', 'puerto-rico'),
('Qatar', 'QA', 'QAT', NULL, '634', 'qatar'),
('Reunion', 'RE', 'REU', NULL, '638', 'reunion'),
('Romania', 'RO', 'ROU', 'ROM', '642', 'romania'),
('Russian Federation', 'RU', 'RUS', NULL, '643', 'russian-federation'),
('Rwanda', 'RW', 'RWA', NULL, '646', 'rwanda'),
('Saint Helena', 'SH', 'SHN', NULL, '654', 'saint-helena'),
('Saint Kitts and Nevis', 'KN', 'KNA', NULL, '659', 'saint-kitts-and-nevis'),
('Saint Lucia', 'LC', 'LCA', NULL, '662', 'saint-lucia'),
('Saint Pierre and Miquelon', 'PM', 'SPM', NULL, '666', 'saint-pierre-and-miquelon'),
('Saint Vincent and the Grenadines', 'VC', 'VCT', NULL, '670', 'saint-vincent-and-grenadines'),
('Saint-Barthelemy', 'BL', 'BLM', NULL, '652', 'saint-barthelemy'),
('Saint-Martin', 'MF', 'MAF', NULL, '663', 'saint-martin'),
('Samoa', 'WS', 'WSM', NULL, '882', 'samoa'),
('San Marino', 'SM', 'SMR', NULL, '674', 'san-marino'),
('Sao Tome and Principe', 'ST', 'STP', NULL, '678', 'sao-tome-and-principe'),
('Saudi Arabia', 'SA', 'SAU', NULL, '682', 'saudi-arabia'),
('Senegal', 'SN', 'SEN', NULL, '686', 'senegal'),
('Serbia', 'RS', 'SRB', NULL, '688', 'serbia'),
('Seychelles', 'SC', 'SYC', NULL, '690', 'seychelles'),
('Sierra Leone', 'SL', 'SLE', NULL, '694', 'sierra-leone'),
('Singapore', 'SG', 'SGP', NULL, '702', 'singapore'),
('Slovakia', 'SK', 'SVK', NULL, '703', 'slovakia'),
('Slovenia', 'SI', 'SVN', NULL, '705', 'slovenia'),
('Solomon Islands', 'SB', 'SLB', NULL, '90', 'solomon-islands'),
('Somalia', 'SO', 'SOM', NULL, '706', 'somalia'),
('South Africa', 'ZA', 'ZAF', NULL, '710', 'south-africa'),
('South Korea', 'KR', 'KOR', NULL, '410', 'south-korea'),
('South Sudan', 'SS', 'SSD', NULL, '728', 'south-sudan'),
('Spain', 'ES', 'ESP', NULL, '724', 'spain'),
('Sri Lanka', 'LK', 'LKA', NULL, '144', 'sri-lanka'),
('Sudan', 'SD', 'SDN', NULL, '729', 'sudan'),
('Suriname', 'SR', 'SUR', NULL, '740', 'suriname'),
('Svalbard and Jan Mayen Islands', 'SJ', 'SJM', NULL, '744', 'svalbard-and-jan-mayen-islands'),
('Swaziland', 'SZ', 'SWZ', NULL, '748', 'swaziland'),
('Sweden', 'SE', 'SWE', NULL, '752', 'sweden'),
('Switzerland', 'CH', 'CHE', NULL, '756', 'switzerland'),
('Syrian Arab Republic', 'SY', 'SYR', NULL, '760', 'syrian-arab-republic'),
('Tajikistan', 'TJ', 'TJK', NULL, '762', 'tajikistan'),
('Tanzania', 'TZ', 'TZA', NULL, '834', 'tanzania'),
('Thailand', 'TH', 'THA', NULL, '764', 'thailand'),
('Timor-Leste', 'TP', 'TLS', NULL, '626', 'timor-leste'),
('Togo', 'TG', 'TGO', NULL, '768', 'togo'),
('Tokelau', 'TK', 'TKL', NULL, '772', 'tokelau'),
('Tonga', 'TO', 'TON', NULL, '776', 'tonga'),
('Trinidad and Tobago', 'TT', 'TTO', NULL, '780', 'trinidad-and-tobago'),
('Tunisia', 'TN', 'TUN', NULL, '788', 'tunisia'),
('Turkey', 'TR', 'TUR', NULL, '792', 'turkey'),
('Turkmenistan', 'TM', 'TKM', NULL, '795', 'turkmenistan'),
('Turks and Caicos Islands', 'TC', 'TCA', NULL, '796', 'turks-and-caicos-islands'),
('Tuvalu', 'TV', 'TUV', NULL, '798', 'tuvalu'),
('U.S. Virgin Islands', 'VI', 'VIR', NULL, '850', 'us-virgin-islands'),
('Uganda', 'UG', 'UGA', NULL, '800', 'uganda'),
('Ukraine', 'UA', 'UKR', NULL, '804', 'ukraine'),
('United Arab Emirates', 'AE', 'ARE', NULL, '784', 'united-arab-emirates'),
('United Kingdom', 'UK', 'GBR', NULL, '826', 'united-kingdom'),
('United States', 'US', 'USA', NULL, '840', 'united-states'),
('Uruguay', 'UY', 'URY', NULL, '858', 'uruguay'),
('Uzbekistan', 'UZ', 'UZB', NULL, '860', 'uzbekistan'),
('Vanuatu', 'VU', 'VUT', NULL, '548', 'vanuatu'),
('Venezuela', 'VE', 'VEN', NULL, '862', 'venezuela'),
('Viet Nam', 'VN', 'VNM', NULL, '704', 'viet-nam'),
('Wallis and Futuna Islands', 'WF', 'WLF', NULL, '876', 'wallis-and-futuna-islands'),
('Western Sahara', 'EH', 'ESH', NULL, '732', 'western-sahara'),
('Yemen', 'YE', 'YEM', NULL, '887', 'yemen'),
('Zambia', 'ZM', 'ZMB', NULL, '894', 'zambia'),
('Zimbabwe', 'ZW', 'ZWE', NULL, '716', 'zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee`
--

CREATE TABLE `hr_employee` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `regencies` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `grade_name` varchar(255) NOT NULL,
  `negara` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `kewarganegaraan` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hr_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_employee`
--

INSERT INTO `hr_employee` (`id`, `nik`, `first_name`, `middle_name`, `last_name`, `birth_place`, `regencies`, `birth_date`, `grade_name`, `negara`, `gender`, `kewarganegaraan`, `gambar`, `password`, `username`, `hr_name`, `email`, `level`) VALUES
(181, 'admin', 'admin', '', '', '', '', '2002-04-18', 'admin', '', '', '', NULL, '$2y$10$SHVe8DynZ3qTl7DY28MIhuxYx8BzesggFE/3Fop8O970UrFFlOmZm', 'admin', '', NULL, 1),
(308, 'MB-01', 'ASDSAD', '', '', '33', '9999', '1999-11-12', '2', 'ID', 'Laki-laki', 'WNI', '04-05-15-pm-2023-05-24-up 3mb.jpeg', '$2y$10$OmS4H2VkEyUe8Pv6NmoNYerMOzE4HO2TEdVjSlWoitIq0arWwGc4G', 'MB-01', 'HRIT_group', 'hanizza46@gmail.com', 0),
(309, 'MB-03', 'Eaton', 'Aubrey Cotton', 'Knox', '51', '9999', '2006-09-14', '3', 'ID', 'Perempuan', 'WNI', '10-01-59-am-2023-05-25-up 3mb.jpeg', '$2y$10$WGdkq.p5YwEcsfiW372aAOeOQXdeQhiUExI1SQQ3ygLsNpS8JBS1i', 'MB-03', 'LnD_group', 'jihupawasa@mailinator.com', 0),
(310, 'MB-02', 'Martha', 'Caldwell Medina', 'Pratt', '61', '6102', '1995-07-14', '2', 'ID', 'Perempuan', 'WNI', '04-06-04-pm-2023-05-24-up 3mb.jpeg', '$2y$10$TrdkDhXrNv/2hRDu2ah6DecUZOfULajwG2qRA4apgbZylxLxWx/mm', 'MB-02', 'talent_group', 'rywecoly@mailinator.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hr_insert_dokumen`
--

CREATE TABLE `hr_insert_dokumen` (
  `id` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_insert` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_insert_dokumen`
--

INSERT INTO `hr_insert_dokumen` (`id`, `id_employee`, `id_user`, `tanggal_insert`, `id_status`) VALUES
(72, 288, 115, '2023-05-24 12:05:17', '0'),
(73, 288, 116, '2023-05-24 12:07:28', '0'),
(74, 288, 117, '2023-05-24 12:09:54', '0'),
(75, 288, 118, '2023-05-24 12:11:17', '0'),
(76, 288, 119, '2023-05-24 12:14:44', '0');

-- --------------------------------------------------------

--
-- Table structure for table `hr_instansi`
--

CREATE TABLE `hr_instansi` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_instansi`
--

INSERT INTO `hr_instansi` (`id`, `nama_instansi`) VALUES
(1, 'PT. Gajah Tunggal Tbk.'),
(2, 'Kementerian Pendidikan dan Kebudayaan'),
(3, 'Badan Penjaminan Mutu Pendidikan'),
(4, 'Lembaga Pengembangan dan Pemberdayaan Bahasa'),
(5, 'PT. Telekomunikasi Tbk'),
(6, 'Universitas Bina Nusantara');

-- --------------------------------------------------------

--
-- Table structure for table `hr_log_server`
--

CREATE TABLE `hr_log_server` (
  `id` int(11) NOT NULL,
  `name_server` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `time_date` varchar(255) DEFAULT NULL,
  `qr_scan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_log_server`
--

INSERT INTO `hr_log_server` (`id`, `name_server`, `info`, `time_date`, `qr_scan`) VALUES
(1557, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 08:23:39', ''),
(1558, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 08:27:14', ''),
(1559, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 08:27:14', ''),
(1560, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 08:35:46', ''),
(1561, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 08:35:48', ''),
(1562, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 08:37:50', ''),
(1563, 'localhost', 'User melakukan open qr scan', '2023-05-17 : 08:39:09', 'qr_open_scanned'),
(1564, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 08:39:12', ''),
(1565, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 08:39:18', ''),
(1566, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 09:56:13', ''),
(1567, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:32:51', ''),
(1568, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:32:57', ''),
(1569, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:33:00', ''),
(1570, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:33:09', ''),
(1571, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:33:10', ''),
(1572, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:33:17', ''),
(1573, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:33:42', ''),
(1574, 'localhost', 'User masuk ke halaman register', '2023-05-17 : 10:33:43', ''),
(1575, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:33:57', ''),
(1576, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:34:07', ''),
(1577, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:35:06', ''),
(1578, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:43:27', ''),
(1579, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:43:29', ''),
(1580, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:43:31', ''),
(1581, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:43:35', ''),
(1582, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:43:38', ''),
(1583, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:45:39', ''),
(1584, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:46:04', ''),
(1585, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:46:09', ''),
(1586, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:53:26', ''),
(1587, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:53:29', ''),
(1588, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 10:53:31', ''),
(1589, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 12:03:56', ''),
(1590, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 12:18:28', ''),
(1591, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 12:19:15', ''),
(1592, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 12:23:09', ''),
(1593, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 12:23:16', ''),
(1594, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 12:23:17', ''),
(1595, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 12:23:25', ''),
(1596, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 12:23:26', ''),
(1597, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 12:23:34', ''),
(1598, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 12:29:47', ''),
(1599, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 12:30:23', ''),
(1600, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 12:31:23', ''),
(1601, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 12:32:28', ''),
(1602, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 12:35:45', ''),
(1603, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 12:35:47', ''),
(1604, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 12:45:04', ''),
(1605, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 12:45:06', ''),
(1606, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 13:01:45', ''),
(1607, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 13:02:40', ''),
(1608, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 13:02:42', ''),
(1609, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 13:17:21', ''),
(1610, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 13:17:46', ''),
(1611, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 13:17:51', ''),
(1612, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 15:00:20', ''),
(1613, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 15:01:41', ''),
(1614, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 15:08:06', ''),
(1615, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 15:08:12', ''),
(1616, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 15:38:29', ''),
(1617, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 15:38:31', ''),
(1618, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 15:38:37', ''),
(1619, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 15:38:39', ''),
(1620, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 15:51:03', ''),
(1621, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 15:51:16', ''),
(1622, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 15:51:26', ''),
(1623, 'localhost', 'User melakukan open qr scan', '2023-05-17 : 15:59:53', 'qr_open_scanned'),
(1624, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 16:02:12', ''),
(1625, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 16:36:56', ''),
(1626, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 16:38:44', ''),
(1627, 'localhost', 'User masuk ke halaman login', '2023-05-17 : 16:51:16', ''),
(1628, 'localhost', 'User masuk ke halaman login', '2023-05-19 : 09:27:43', '');

-- --------------------------------------------------------

--
-- Table structure for table `hr_materi`
--

CREATE TABLE `hr_materi` (
  `id` int(11) NOT NULL,
  `materi_konten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_materi`
--

INSERT INTO `hr_materi` (`id`, `materi_konten`) VALUES
(1, 'Keterampilan Teknis'),
(2, 'Keterampilan Soft Skills'),
(3, 'Literasi dan Numerasi'),
(4, 'Pemberdayaan Masyarakat'),
(5, 'Kewirausahaan'),
(6, 'Seni dan Kreativitas'),
(7, 'Pembelajaran Sepanjang Hayat'),
(8, 'Keterampilan Hidup');

-- --------------------------------------------------------

--
-- Table structure for table `hr_metode_pembelajaran`
--

CREATE TABLE `hr_metode_pembelajaran` (
  `id` int(11) NOT NULL,
  `metode_pembelajaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_metode_pembelajaran`
--

INSERT INTO `hr_metode_pembelajaran` (`id`, `metode_pembelajaran`) VALUES
(1, 'Pembelajaraan Berbasis Proyek'),
(2, 'Diskusi Kelompok'),
(3, 'Simulasi'),
(4, 'Mentorship'),
(5, 'Pembelajaran Jarak Jauh'),
(6, 'Kursus Singkat atau Pelatihan Intensif'),
(7, 'Pameran atau Workshop'),
(8, 'Praktek Lapangan'),
(9, 'Program Mentoring dan Pembinaan'),
(10, 'Pembelajaran Keterampilan Hidup');

-- --------------------------------------------------------

--
-- Table structure for table `hr_pesan`
--

CREATE TABLE `hr_pesan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `alasan_form` varchar(255) NOT NULL,
  `id_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_pesan`
--

INSERT INTO `hr_pesan` (`id`, `id_user`, `alasan_form`, `id_status`) VALUES
(36, 119, 'Test', '3'),
(37, 119, 'Test', '3'),
(38, 119, 'Test', '3');

-- --------------------------------------------------------

--
-- Table structure for table `hr_position`
--

CREATE TABLE `hr_position` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(255) NOT NULL,
  `position_level` varchar(255) NOT NULL,
  `parent_id` varchar(255) NOT NULL,
  `parent_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_position`
--

INSERT INTO `hr_position` (`position_id`, `position_name`, `position_level`, `parent_id`, `parent_path`) VALUES
(0, 'CEO', 'COM', '-', '-'),
(1, 'POS A', 'UNIT', '3', '0,5,2,4,3'),
(2, 'POS B', 'DIV', '5', '0,5'),
(3, 'POS C', 'SEC', '4', '0,5,2,4'),
(4, 'POS D', 'DEPT', '2', '0,5,2'),
(5, 'POS E', 'DIR', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `hr_provinces`
--

CREATE TABLE `hr_provinces` (
  `id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_provinces`
--

INSERT INTO `hr_provinces` (`id`, `name`) VALUES
('11', 'ACEH'),
('12', 'SUMATERA UTARA'),
('13', 'SUMATERA BARAT'),
('14', 'RIAU'),
('15', 'JAMBI'),
('16', 'SUMATERA SELATAN'),
('17', 'BENGKULU'),
('18', 'LAMPUNG'),
('19', 'KEPULAUAN BANGKA BELITUNG'),
('21', 'KEPULAUAN RIAU'),
('31', 'DKI JAKARTA'),
('32', 'JAWA BARAT'),
('33', 'JAWA TENGAH'),
('34', 'DI YOGYAKARTA'),
('35', 'JAWA TIMUR'),
('36', 'BANTEN'),
('51', 'BALI'),
('52', 'NUSA TENGGARA BARAT'),
('53', 'NUSA TENGGARA TIMUR'),
('61', 'KALIMANTAN BARAT'),
('62', 'KALIMANTAN TENGAH'),
('63', 'KALIMANTAN SELATAN'),
('64', 'KALIMANTAN TIMUR'),
('65', 'KALIMANTAN UTARA'),
('71', 'SULAWESI UTARA'),
('72', 'SULAWESI TENGAH'),
('73', 'SULAWESI SELATAN'),
('74', 'SULAWESI TENGGARA'),
('75', 'GORONTALO'),
('76', 'SULAWESI BARAT'),
('81', 'MALUKU'),
('82', 'MALUKU UTARA'),
('91', 'PAPUA BARAT'),
('94', 'PAPUA'),
('99', 'WNA');

-- --------------------------------------------------------

--
-- Table structure for table `hr_qr_code`
--

CREATE TABLE `hr_qr_code` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_qr_code`
--

INSERT INTO `hr_qr_code` (`id`, `token`, `status`) VALUES
(27, 'cfd42aabcd55544978038d841411c0d7', 'invalid_token'),
(28, 'daf9d6c3da4d80156e3dba018a2d49bd', 'invalid_token'),
(29, '57f82194ed13009da7c145d7ca41c9ae', 'invalid_token'),
(30, '60540279022138c7f5e479e0c502d0ea', 'valid_token');

-- --------------------------------------------------------

--
-- Table structure for table `hr_regencies`
--

CREATE TABLE `hr_regencies` (
  `id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_regencies`
--

INSERT INTO `hr_regencies` (`id`, `province_id`, `name`) VALUES
('1101', '11', 'KABUPATEN SIMEULUE'),
('1102', '11', 'KABUPATEN ACEH SINGKIL'),
('1103', '11', 'KABUPATEN ACEH SELATAN'),
('1104', '11', 'KABUPATEN ACEH TENGGARA'),
('1105', '11', 'KABUPATEN ACEH TIMUR'),
('1106', '11', 'KABUPATEN ACEH TENGAH'),
('1107', '11', 'KABUPATEN ACEH BARAT'),
('1108', '11', 'KABUPATEN ACEH BESAR'),
('1109', '11', 'KABUPATEN PIDIE'),
('1110', '11', 'KABUPATEN BIREUEN'),
('1111', '11', 'KABUPATEN ACEH UTARA'),
('1112', '11', 'KABUPATEN ACEH BARAT DAYA'),
('1113', '11', 'KABUPATEN GAYO LUES'),
('1114', '11', 'KABUPATEN ACEH TAMIANG'),
('1115', '11', 'KABUPATEN NAGAN RAYA'),
('1116', '11', 'KABUPATEN ACEH JAYA'),
('1117', '11', 'KABUPATEN BENER MERIAH'),
('1118', '11', 'KABUPATEN PIDIE JAYA'),
('1171', '11', 'KOTA BANDA ACEH'),
('1172', '11', 'KOTA SABANG'),
('1173', '11', 'KOTA LANGSA'),
('1174', '11', 'KOTA LHOKSEUMAWE'),
('1175', '11', 'KOTA SUBULUSSALAM'),
('1201', '12', 'KABUPATEN NIAS'),
('1202', '12', 'KABUPATEN MANDAILING NATAL'),
('1203', '12', 'KABUPATEN TAPANULI SELATAN'),
('1204', '12', 'KABUPATEN TAPANULI TENGAH'),
('1205', '12', 'KABUPATEN TAPANULI UTARA'),
('1206', '12', 'KABUPATEN TOBA SAMOSIR'),
('1207', '12', 'KABUPATEN LABUHAN BATU'),
('1208', '12', 'KABUPATEN ASAHAN'),
('1209', '12', 'KABUPATEN SIMALUNGUN'),
('1210', '12', 'KABUPATEN DAIRI'),
('1211', '12', 'KABUPATEN KARO'),
('1212', '12', 'KABUPATEN DELI SERDANG'),
('1213', '12', 'KABUPATEN LANGKAT'),
('1214', '12', 'KABUPATEN NIAS SELATAN'),
('1215', '12', 'KABUPATEN HUMBANG HASUNDUTAN'),
('1216', '12', 'KABUPATEN PAKPAK BHARAT'),
('1217', '12', 'KABUPATEN SAMOSIR'),
('1218', '12', 'KABUPATEN SERDANG BEDAGAI'),
('1219', '12', 'KABUPATEN BATU BARA'),
('1220', '12', 'KABUPATEN PADANG LAWAS UTARA'),
('1221', '12', 'KABUPATEN PADANG LAWAS'),
('1222', '12', 'KABUPATEN LABUHAN BATU SELATAN'),
('1223', '12', 'KABUPATEN LABUHAN BATU UTARA'),
('1224', '12', 'KABUPATEN NIAS UTARA'),
('1225', '12', 'KABUPATEN NIAS BARAT'),
('1271', '12', 'KOTA SIBOLGA'),
('1272', '12', 'KOTA TANJUNG BALAI'),
('1273', '12', 'KOTA PEMATANG SIANTAR'),
('1274', '12', 'KOTA TEBING TINGGI'),
('1275', '12', 'KOTA MEDAN'),
('1276', '12', 'KOTA BINJAI'),
('1277', '12', 'KOTA PADANGSIDIMPUAN'),
('1278', '12', 'KOTA GUNUNGSITOLI'),
('1301', '13', 'KABUPATEN KEPULAUAN MENTAWAI'),
('1302', '13', 'KABUPATEN PESISIR SELATAN'),
('1303', '13', 'KABUPATEN SOLOK'),
('1304', '13', 'KABUPATEN SIJUNJUNG'),
('1305', '13', 'KABUPATEN TANAH DATAR'),
('1306', '13', 'KABUPATEN PADANG PARIAMAN'),
('1307', '13', 'KABUPATEN AGAM'),
('1308', '13', 'KABUPATEN LIMA PULUH KOTA'),
('1309', '13', 'KABUPATEN PASAMAN'),
('1310', '13', 'KABUPATEN SOLOK SELATAN'),
('1311', '13', 'KABUPATEN DHARMASRAYA'),
('1312', '13', 'KABUPATEN PASAMAN BARAT'),
('1371', '13', 'KOTA PADANG'),
('1372', '13', 'KOTA SOLOK'),
('1373', '13', 'KOTA SAWAH LUNTO'),
('1374', '13', 'KOTA PADANG PANJANG'),
('1375', '13', 'KOTA BUKITTINGGI'),
('1376', '13', 'KOTA PAYAKUMBUH'),
('1377', '13', 'KOTA PARIAMAN'),
('1401', '14', 'KABUPATEN KUANTAN SINGINGI'),
('1402', '14', 'KABUPATEN INDRAGIRI HULU'),
('1403', '14', 'KABUPATEN INDRAGIRI HILIR'),
('1404', '14', 'KABUPATEN PELALAWAN'),
('1405', '14', 'KABUPATEN S I A K'),
('1406', '14', 'KABUPATEN KAMPAR'),
('1407', '14', 'KABUPATEN ROKAN HULU'),
('1408', '14', 'KABUPATEN BENGKALIS'),
('1409', '14', 'KABUPATEN ROKAN HILIR'),
('1410', '14', 'KABUPATEN KEPULAUAN MERANTI'),
('1471', '14', 'KOTA PEKANBARU'),
('1473', '14', 'KOTA D U M A I'),
('1501', '15', 'KABUPATEN KERINCI'),
('1502', '15', 'KABUPATEN MERANGIN'),
('1503', '15', 'KABUPATEN SAROLANGUN'),
('1504', '15', 'KABUPATEN BATANG HARI'),
('1505', '15', 'KABUPATEN MUARO JAMBI'),
('1506', '15', 'KABUPATEN TANJUNG JABUNG TIMUR'),
('1507', '15', 'KABUPATEN TANJUNG JABUNG BARAT'),
('1508', '15', 'KABUPATEN TEBO'),
('1509', '15', 'KABUPATEN BUNGO'),
('1571', '15', 'KOTA JAMBI'),
('1572', '15', 'KOTA SUNGAI PENUH'),
('1601', '16', 'KABUPATEN OGAN KOMERING ULU'),
('1602', '16', 'KABUPATEN OGAN KOMERING ILIR'),
('1603', '16', 'KABUPATEN MUARA ENIM'),
('1604', '16', 'KABUPATEN LAHAT'),
('1605', '16', 'KABUPATEN MUSI RAWAS'),
('1606', '16', 'KABUPATEN MUSI BANYUASIN'),
('1607', '16', 'KABUPATEN BANYU ASIN'),
('1608', '16', 'KABUPATEN OGAN KOMERING ULU SELATAN'),
('1609', '16', 'KABUPATEN OGAN KOMERING ULU TIMUR'),
('1610', '16', 'KABUPATEN OGAN ILIR'),
('1611', '16', 'KABUPATEN EMPAT LAWANG'),
('1612', '16', 'KABUPATEN PENUKAL ABAB LEMATANG ILIR'),
('1613', '16', 'KABUPATEN MUSI RAWAS UTARA'),
('1671', '16', 'KOTA PALEMBANG'),
('1672', '16', 'KOTA PRABUMULIH'),
('1673', '16', 'KOTA PAGAR ALAM'),
('1674', '16', 'KOTA LUBUKLINGGAU'),
('1701', '17', 'KABUPATEN BENGKULU SELATAN'),
('1702', '17', 'KABUPATEN REJANG LEBONG'),
('1703', '17', 'KABUPATEN BENGKULU UTARA'),
('1704', '17', 'KABUPATEN KAUR'),
('1705', '17', 'KABUPATEN SELUMA'),
('1706', '17', 'KABUPATEN MUKOMUKO'),
('1707', '17', 'KABUPATEN LEBONG'),
('1708', '17', 'KABUPATEN KEPAHIANG'),
('1709', '17', 'KABUPATEN BENGKULU TENGAH'),
('1771', '17', 'KOTA BENGKULU'),
('1801', '18', 'KABUPATEN LAMPUNG BARAT'),
('1802', '18', 'KABUPATEN TANGGAMUS'),
('1803', '18', 'KABUPATEN LAMPUNG SELATAN'),
('1804', '18', 'KABUPATEN LAMPUNG TIMUR'),
('1805', '18', 'KABUPATEN LAMPUNG TENGAH'),
('1806', '18', 'KABUPATEN LAMPUNG UTARA'),
('1807', '18', 'KABUPATEN WAY KANAN'),
('1808', '18', 'KABUPATEN TULANGBAWANG'),
('1809', '18', 'KABUPATEN PESAWARAN'),
('1810', '18', 'KABUPATEN PRINGSEWU'),
('1811', '18', 'KABUPATEN MESUJI'),
('1812', '18', 'KABUPATEN TULANG BAWANG BARAT'),
('1813', '18', 'KABUPATEN PESISIR BARAT'),
('1871', '18', 'KOTA BANDAR LAMPUNG'),
('1872', '18', 'KOTA METRO'),
('1901', '19', 'KABUPATEN BANGKA'),
('1902', '19', 'KABUPATEN BELITUNG'),
('1903', '19', 'KABUPATEN BANGKA BARAT'),
('1904', '19', 'KABUPATEN BANGKA TENGAH'),
('1905', '19', 'KABUPATEN BANGKA SELATAN'),
('1906', '19', 'KABUPATEN BELITUNG TIMUR'),
('1971', '19', 'KOTA PANGKAL PINANG'),
('2101', '21', 'KABUPATEN KARIMUN'),
('2102', '21', 'KABUPATEN BINTAN'),
('2103', '21', 'KABUPATEN NATUNA'),
('2104', '21', 'KABUPATEN LINGGA'),
('2105', '21', 'KABUPATEN KEPULAUAN ANAMBAS'),
('2171', '21', 'KOTA B A T A M'),
('2172', '21', 'KOTA TANJUNG PINANG'),
('3101', '31', 'KABUPATEN KEPULAUAN SERIBU'),
('3171', '31', 'KOTA JAKARTA SELATAN'),
('3172', '31', 'KOTA JAKARTA TIMUR'),
('3173', '31', 'KOTA JAKARTA PUSAT'),
('3174', '31', 'KOTA JAKARTA BARAT'),
('3175', '31', 'KOTA JAKARTA UTARA'),
('3201', '32', 'KABUPATEN BOGOR'),
('3202', '32', 'KABUPATEN SUKABUMI'),
('3203', '32', 'KABUPATEN CIANJUR'),
('3204', '32', 'KABUPATEN BANDUNG'),
('3205', '32', 'KABUPATEN GARUT'),
('3206', '32', 'KABUPATEN TASIKMALAYA'),
('3207', '32', 'KABUPATEN CIAMIS'),
('3208', '32', 'KABUPATEN KUNINGAN'),
('3209', '32', 'KABUPATEN CIREBON'),
('3210', '32', 'KABUPATEN MAJALENGKA'),
('3211', '32', 'KABUPATEN SUMEDANG'),
('3212', '32', 'KABUPATEN INDRAMAYU'),
('3213', '32', 'KABUPATEN SUBANG'),
('3214', '32', 'KABUPATEN PURWAKARTA'),
('3215', '32', 'KABUPATEN KARAWANG'),
('3216', '32', 'KABUPATEN BEKASI'),
('3217', '32', 'KABUPATEN BANDUNG BARAT'),
('3218', '32', 'KABUPATEN PANGANDARAN'),
('3271', '32', 'KOTA BOGOR'),
('3272', '32', 'KOTA SUKABUMI'),
('3273', '32', 'KOTA BANDUNG'),
('3274', '32', 'KOTA CIREBON'),
('3275', '32', 'KOTA BEKASI'),
('3276', '32', 'KOTA DEPOK'),
('3277', '32', 'KOTA CIMAHI'),
('3278', '32', 'KOTA TASIKMALAYA'),
('3279', '32', 'KOTA BANJAR'),
('3301', '33', 'KABUPATEN CILACAP'),
('3302', '33', 'KABUPATEN BANYUMAS'),
('3303', '33', 'KABUPATEN PURBALINGGA'),
('3304', '33', 'KABUPATEN BANJARNEGARA'),
('3305', '33', 'KABUPATEN KEBUMEN'),
('3306', '33', 'KABUPATEN PURWOREJO'),
('3307', '33', 'KABUPATEN WONOSOBO'),
('3308', '33', 'KABUPATEN MAGELANG'),
('3309', '33', 'KABUPATEN BOYOLALI'),
('3310', '33', 'KABUPATEN KLATEN'),
('3311', '33', 'KABUPATEN SUKOHARJO'),
('3312', '33', 'KABUPATEN WONOGIRI'),
('3313', '33', 'KABUPATEN KARANGANYAR'),
('3314', '33', 'KABUPATEN SRAGEN'),
('3315', '33', 'KABUPATEN GROBOGAN'),
('3316', '33', 'KABUPATEN BLORA'),
('3317', '33', 'KABUPATEN REMBANG'),
('3318', '33', 'KABUPATEN PATI'),
('3319', '33', 'KABUPATEN KUDUS'),
('3320', '33', 'KABUPATEN JEPARA'),
('3321', '33', 'KABUPATEN DEMAK'),
('3322', '33', 'KABUPATEN SEMARANG'),
('3323', '33', 'KABUPATEN TEMANGGUNG'),
('3324', '33', 'KABUPATEN KENDAL'),
('3325', '33', 'KABUPATEN BATANG'),
('3326', '33', 'KABUPATEN PEKALONGAN'),
('3327', '33', 'KABUPATEN PEMALANG'),
('3328', '33', 'KABUPATEN TEGAL'),
('3329', '33', 'KABUPATEN BREBES'),
('3371', '33', 'KOTA MAGELANG'),
('3372', '33', 'KOTA SURAKARTA'),
('3373', '33', 'KOTA SALATIGA'),
('3374', '33', 'KOTA SEMARANG'),
('3375', '33', 'KOTA PEKALONGAN'),
('3376', '33', 'KOTA TEGAL'),
('3401', '34', 'KABUPATEN KULON PROGO'),
('3402', '34', 'KABUPATEN BANTUL'),
('3403', '34', 'KABUPATEN GUNUNG KIDUL'),
('3404', '34', 'KABUPATEN SLEMAN'),
('3471', '34', 'KOTA YOGYAKARTA'),
('3501', '35', 'KABUPATEN PACITAN'),
('3502', '35', 'KABUPATEN PONOROGO'),
('3503', '35', 'KABUPATEN TRENGGALEK'),
('3504', '35', 'KABUPATEN TULUNGAGUNG'),
('3505', '35', 'KABUPATEN BLITAR'),
('3506', '35', 'KABUPATEN KEDIRI'),
('3507', '35', 'KABUPATEN MALANG'),
('3508', '35', 'KABUPATEN LUMAJANG'),
('3509', '35', 'KABUPATEN JEMBER'),
('3510', '35', 'KABUPATEN BANYUWANGI'),
('3511', '35', 'KABUPATEN BONDOWOSO'),
('3512', '35', 'KABUPATEN SITUBONDO'),
('3513', '35', 'KABUPATEN PROBOLINGGO'),
('3514', '35', 'KABUPATEN PASURUAN'),
('3515', '35', 'KABUPATEN SIDOARJO'),
('3516', '35', 'KABUPATEN MOJOKERTO'),
('3517', '35', 'KABUPATEN JOMBANG'),
('3518', '35', 'KABUPATEN NGANJUK'),
('3519', '35', 'KABUPATEN MADIUN'),
('3520', '35', 'KABUPATEN MAGETAN'),
('3521', '35', 'KABUPATEN NGAWI'),
('3522', '35', 'KABUPATEN BOJONEGORO'),
('3523', '35', 'KABUPATEN TUBAN'),
('3524', '35', 'KABUPATEN LAMONGAN'),
('3525', '35', 'KABUPATEN GRESIK'),
('3526', '35', 'KABUPATEN BANGKALAN'),
('3527', '35', 'KABUPATEN SAMPANG'),
('3528', '35', 'KABUPATEN PAMEKASAN'),
('3529', '35', 'KABUPATEN SUMENEP'),
('3571', '35', 'KOTA KEDIRI'),
('3572', '35', 'KOTA BLITAR'),
('3573', '35', 'KOTA MALANG'),
('3574', '35', 'KOTA PROBOLINGGO'),
('3575', '35', 'KOTA PASURUAN'),
('3576', '35', 'KOTA MOJOKERTO'),
('3577', '35', 'KOTA MADIUN'),
('3578', '35', 'KOTA SURABAYA'),
('3579', '35', 'KOTA BATU'),
('3601', '36', 'KABUPATEN PANDEGLANG'),
('3602', '36', 'KABUPATEN LEBAK'),
('3603', '36', 'KABUPATEN TANGERANG'),
('3604', '36', 'KABUPATEN SERANG'),
('3671', '36', 'KOTA TANGERANG'),
('3672', '36', 'KOTA CILEGON'),
('3673', '36', 'KOTA SERANG'),
('3674', '36', 'KOTA TANGERANG SELATAN'),
('5101', '51', 'KABUPATEN JEMBRANA'),
('5102', '51', 'KABUPATEN TABANAN'),
('5103', '51', 'KABUPATEN BADUNG'),
('5104', '51', 'KABUPATEN GIANYAR'),
('5105', '51', 'KABUPATEN KLUNGKUNG'),
('5106', '51', 'KABUPATEN BANGLI'),
('5107', '51', 'KABUPATEN KARANG ASEM'),
('5108', '51', 'KABUPATEN BULELENG'),
('5171', '51', 'KOTA DENPASAR'),
('5201', '52', 'KABUPATEN LOMBOK BARAT'),
('5202', '52', 'KABUPATEN LOMBOK TENGAH'),
('5203', '52', 'KABUPATEN LOMBOK TIMUR'),
('5204', '52', 'KABUPATEN SUMBAWA'),
('5205', '52', 'KABUPATEN DOMPU'),
('5206', '52', 'KABUPATEN BIMA'),
('5207', '52', 'KABUPATEN SUMBAWA BARAT'),
('5208', '52', 'KABUPATEN LOMBOK UTARA'),
('5271', '52', 'KOTA MATARAM'),
('5272', '52', 'KOTA BIMA'),
('5301', '53', 'KABUPATEN SUMBA BARAT'),
('5302', '53', 'KABUPATEN SUMBA TIMUR'),
('5303', '53', 'KABUPATEN KUPANG'),
('5304', '53', 'KABUPATEN TIMOR TENGAH SELATAN'),
('5305', '53', 'KABUPATEN TIMOR TENGAH UTARA'),
('5306', '53', 'KABUPATEN BELU'),
('5307', '53', 'KABUPATEN ALOR'),
('5308', '53', 'KABUPATEN LEMBATA'),
('5309', '53', 'KABUPATEN FLORES TIMUR'),
('5310', '53', 'KABUPATEN SIKKA'),
('5311', '53', 'KABUPATEN ENDE'),
('5312', '53', 'KABUPATEN NGADA'),
('5313', '53', 'KABUPATEN MANGGARAI'),
('5314', '53', 'KABUPATEN ROTE NDAO'),
('5315', '53', 'KABUPATEN MANGGARAI BARAT'),
('5316', '53', 'KABUPATEN SUMBA TENGAH'),
('5317', '53', 'KABUPATEN SUMBA BARAT DAYA'),
('5318', '53', 'KABUPATEN NAGEKEO'),
('5319', '53', 'KABUPATEN MANGGARAI TIMUR'),
('5320', '53', 'KABUPATEN SABU RAIJUA'),
('5321', '53', 'KABUPATEN MALAKA'),
('5371', '53', 'KOTA KUPANG'),
('6101', '61', 'KABUPATEN SAMBAS'),
('6102', '61', 'KABUPATEN BENGKAYANG'),
('6103', '61', 'KABUPATEN LANDAK'),
('6104', '61', 'KABUPATEN MEMPAWAH'),
('6105', '61', 'KABUPATEN SANGGAU'),
('6106', '61', 'KABUPATEN KETAPANG'),
('6107', '61', 'KABUPATEN SINTANG'),
('6108', '61', 'KABUPATEN KAPUAS HULU'),
('6109', '61', 'KABUPATEN SEKADAU'),
('6110', '61', 'KABUPATEN MELAWI'),
('6111', '61', 'KABUPATEN KAYONG UTARA'),
('6112', '61', 'KABUPATEN KUBU RAYA'),
('6171', '61', 'KOTA PONTIANAK'),
('6172', '61', 'KOTA SINGKAWANG'),
('6201', '62', 'KABUPATEN KOTAWARINGIN BARAT'),
('6202', '62', 'KABUPATEN KOTAWARINGIN TIMUR'),
('6203', '62', 'KABUPATEN KAPUAS'),
('6204', '62', 'KABUPATEN BARITO SELATAN'),
('6205', '62', 'KABUPATEN BARITO UTARA'),
('6206', '62', 'KABUPATEN SUKAMARA'),
('6207', '62', 'KABUPATEN LAMANDAU'),
('6208', '62', 'KABUPATEN SERUYAN'),
('6209', '62', 'KABUPATEN KATINGAN'),
('6210', '62', 'KABUPATEN PULANG PISAU'),
('6211', '62', 'KABUPATEN GUNUNG MAS'),
('6212', '62', 'KABUPATEN BARITO TIMUR'),
('6213', '62', 'KABUPATEN MURUNG RAYA'),
('6271', '62', 'KOTA PALANGKA RAYA'),
('6301', '63', 'KABUPATEN TANAH LAUT'),
('6302', '63', 'KABUPATEN KOTA BARU'),
('6303', '63', 'KABUPATEN BANJAR'),
('6304', '63', 'KABUPATEN BARITO KUALA'),
('6305', '63', 'KABUPATEN TAPIN'),
('6306', '63', 'KABUPATEN HULU SUNGAI SELATAN'),
('6307', '63', 'KABUPATEN HULU SUNGAI TENGAH'),
('6308', '63', 'KABUPATEN HULU SUNGAI UTARA'),
('6309', '63', 'KABUPATEN TABALONG'),
('6310', '63', 'KABUPATEN TANAH BUMBU'),
('6311', '63', 'KABUPATEN BALANGAN'),
('6371', '63', 'KOTA BANJARMASIN'),
('6372', '63', 'KOTA BANJAR BARU'),
('6401', '64', 'KABUPATEN PASER'),
('6402', '64', 'KABUPATEN KUTAI BARAT'),
('6403', '64', 'KABUPATEN KUTAI KARTANEGARA'),
('6404', '64', 'KABUPATEN KUTAI TIMUR'),
('6405', '64', 'KABUPATEN BERAU'),
('6409', '64', 'KABUPATEN PENAJAM PASER UTARA'),
('6411', '64', 'KABUPATEN MAHAKAM HULU'),
('6471', '64', 'KOTA BALIKPAPAN'),
('6472', '64', 'KOTA SAMARINDA'),
('6474', '64', 'KOTA BONTANG'),
('6501', '65', 'KABUPATEN MALINAU'),
('6502', '65', 'KABUPATEN BULUNGAN'),
('6503', '65', 'KABUPATEN TANA TIDUNG'),
('6504', '65', 'KABUPATEN NUNUKAN'),
('6571', '65', 'KOTA TARAKAN'),
('7101', '71', 'KABUPATEN BOLAANG MONGONDOW'),
('7102', '71', 'KABUPATEN MINAHASA'),
('7103', '71', 'KABUPATEN KEPULAUAN SANGIHE'),
('7104', '71', 'KABUPATEN KEPULAUAN TALAUD'),
('7105', '71', 'KABUPATEN MINAHASA SELATAN'),
('7106', '71', 'KABUPATEN MINAHASA UTARA'),
('7107', '71', 'KABUPATEN BOLAANG MONGONDOW UTARA'),
('7108', '71', 'KABUPATEN SIAU TAGULANDANG BIARO'),
('7109', '71', 'KABUPATEN MINAHASA TENGGARA'),
('7110', '71', 'KABUPATEN BOLAANG MONGONDOW SELATAN'),
('7111', '71', 'KABUPATEN BOLAANG MONGONDOW TIMUR'),
('7171', '71', 'KOTA MANADO'),
('7172', '71', 'KOTA BITUNG'),
('7173', '71', 'KOTA TOMOHON'),
('7174', '71', 'KOTA KOTAMOBAGU'),
('7201', '72', 'KABUPATEN BANGGAI KEPULAUAN'),
('7202', '72', 'KABUPATEN BANGGAI'),
('7203', '72', 'KABUPATEN MOROWALI'),
('7204', '72', 'KABUPATEN POSO'),
('7205', '72', 'KABUPATEN DONGGALA'),
('7206', '72', 'KABUPATEN TOLI-TOLI'),
('7207', '72', 'KABUPATEN BUOL'),
('7208', '72', 'KABUPATEN PARIGI MOUTONG'),
('7209', '72', 'KABUPATEN TOJO UNA-UNA'),
('7210', '72', 'KABUPATEN SIGI'),
('7211', '72', 'KABUPATEN BANGGAI LAUT'),
('7212', '72', 'KABUPATEN MOROWALI UTARA'),
('7271', '72', 'KOTA PALU'),
('7301', '73', 'KABUPATEN KEPULAUAN SELAYAR'),
('7302', '73', 'KABUPATEN BULUKUMBA'),
('7303', '73', 'KABUPATEN BANTAENG'),
('7304', '73', 'KABUPATEN JENEPONTO'),
('7305', '73', 'KABUPATEN TAKALAR'),
('7306', '73', 'KABUPATEN GOWA'),
('7307', '73', 'KABUPATEN SINJAI'),
('7308', '73', 'KABUPATEN MAROS'),
('7309', '73', 'KABUPATEN PANGKAJENE DAN KEPULAUAN'),
('7310', '73', 'KABUPATEN BARRU'),
('7311', '73', 'KABUPATEN BONE'),
('7312', '73', 'KABUPATEN SOPPENG'),
('7313', '73', 'KABUPATEN WAJO'),
('7314', '73', 'KABUPATEN SIDENRENG RAPPANG'),
('7315', '73', 'KABUPATEN PINRANG'),
('7316', '73', 'KABUPATEN ENREKANG'),
('7317', '73', 'KABUPATEN LUWU'),
('7318', '73', 'KABUPATEN TANA TORAJA'),
('7322', '73', 'KABUPATEN LUWU UTARA'),
('7325', '73', 'KABUPATEN LUWU TIMUR'),
('7326', '73', 'KABUPATEN TORAJA UTARA'),
('7371', '73', 'KOTA MAKASSAR'),
('7372', '73', 'KOTA PAREPARE'),
('7373', '73', 'KOTA PALOPO'),
('7401', '74', 'KABUPATEN BUTON'),
('7402', '74', 'KABUPATEN MUNA'),
('7403', '74', 'KABUPATEN KONAWE'),
('7404', '74', 'KABUPATEN KOLAKA'),
('7405', '74', 'KABUPATEN KONAWE SELATAN'),
('7406', '74', 'KABUPATEN BOMBANA'),
('7407', '74', 'KABUPATEN WAKATOBI'),
('7408', '74', 'KABUPATEN KOLAKA UTARA'),
('7409', '74', 'KABUPATEN BUTON UTARA'),
('7410', '74', 'KABUPATEN KONAWE UTARA'),
('7411', '74', 'KABUPATEN KOLAKA TIMUR'),
('7412', '74', 'KABUPATEN KONAWE KEPULAUAN'),
('7413', '74', 'KABUPATEN MUNA BARAT'),
('7414', '74', 'KABUPATEN BUTON TENGAH'),
('7415', '74', 'KABUPATEN BUTON SELATAN'),
('7471', '74', 'KOTA KENDARI'),
('7472', '74', 'KOTA BAUBAU'),
('7501', '75', 'KABUPATEN BOALEMO'),
('7502', '75', 'KABUPATEN GORONTALO'),
('7503', '75', 'KABUPATEN POHUWATO'),
('7504', '75', 'KABUPATEN BONE BOLANGO'),
('7505', '75', 'KABUPATEN GORONTALO UTARA'),
('7571', '75', 'KOTA GORONTALO'),
('7601', '76', 'KABUPATEN MAJENE'),
('7602', '76', 'KABUPATEN POLEWALI MANDAR'),
('7603', '76', 'KABUPATEN MAMASA'),
('7604', '76', 'KABUPATEN MAMUJU'),
('7605', '76', 'KABUPATEN MAMUJU UTARA'),
('7606', '76', 'KABUPATEN MAMUJU TENGAH'),
('8101', '81', 'KABUPATEN MALUKU TENGGARA BARAT'),
('8102', '81', 'KABUPATEN MALUKU TENGGARA'),
('8103', '81', 'KABUPATEN MALUKU TENGAH'),
('8104', '81', 'KABUPATEN BURU'),
('8105', '81', 'KABUPATEN KEPULAUAN ARU'),
('8106', '81', 'KABUPATEN SERAM BAGIAN BARAT'),
('8107', '81', 'KABUPATEN SERAM BAGIAN TIMUR'),
('8108', '81', 'KABUPATEN MALUKU BARAT DAYA'),
('8109', '81', 'KABUPATEN BURU SELATAN'),
('8171', '81', 'KOTA AMBON'),
('8172', '81', 'KOTA TUAL'),
('8201', '82', 'KABUPATEN HALMAHERA BARAT'),
('8202', '82', 'KABUPATEN HALMAHERA TENGAH'),
('8203', '82', 'KABUPATEN KEPULAUAN SULA'),
('8204', '82', 'KABUPATEN HALMAHERA SELATAN'),
('8205', '82', 'KABUPATEN HALMAHERA UTARA'),
('8206', '82', 'KABUPATEN HALMAHERA TIMUR'),
('8207', '82', 'KABUPATEN PULAU MOROTAI'),
('8208', '82', 'KABUPATEN PULAU TALIABU'),
('8271', '82', 'KOTA TERNATE'),
('8272', '82', 'KOTA TIDORE KEPULAUAN'),
('9101', '91', 'KABUPATEN FAKFAK'),
('9102', '91', 'KABUPATEN KAIMANA'),
('9103', '91', 'KABUPATEN TELUK WONDAMA'),
('9104', '91', 'KABUPATEN TELUK BINTUNI'),
('9105', '91', 'KABUPATEN MANOKWARI'),
('9106', '91', 'KABUPATEN SORONG SELATAN'),
('9107', '91', 'KABUPATEN SORONG'),
('9108', '91', 'KABUPATEN RAJA AMPAT'),
('9109', '91', 'KABUPATEN TAMBRAUW'),
('9110', '91', 'KABUPATEN MAYBRAT'),
('9111', '91', 'KABUPATEN MANOKWARI SELATAN'),
('9112', '91', 'KABUPATEN PEGUNUNGAN ARFAK'),
('9171', '91', 'KOTA SORONG'),
('9401', '94', 'KABUPATEN MERAUKE'),
('9402', '94', 'KABUPATEN JAYAWIJAYA'),
('9403', '94', 'KABUPATEN JAYAPURA'),
('9404', '94', 'KABUPATEN NABIRE'),
('9408', '94', 'KABUPATEN KEPULAUAN YAPEN'),
('9409', '94', 'KABUPATEN BIAK NUMFOR'),
('9410', '94', 'KABUPATEN PANIAI'),
('9411', '94', 'KABUPATEN PUNCAK JAYA'),
('9412', '94', 'KABUPATEN MIMIKA'),
('9413', '94', 'KABUPATEN BOVEN DIGOEL'),
('9414', '94', 'KABUPATEN MAPPI'),
('9415', '94', 'KABUPATEN ASMAT'),
('9416', '94', 'KABUPATEN YAHUKIMO'),
('9417', '94', 'KABUPATEN PEGUNUNGAN BINTANG'),
('9418', '94', 'KABUPATEN TOLIKARA'),
('9419', '94', 'KABUPATEN SARMI'),
('9420', '94', 'KABUPATEN KEEROM'),
('9426', '94', 'KABUPATEN WAROPEN'),
('9427', '94', 'KABUPATEN SUPIORI'),
('9428', '94', 'KABUPATEN MAMBERAMO RAYA'),
('9429', '94', 'KABUPATEN NDUGA'),
('9430', '94', 'KABUPATEN LANNY JAYA'),
('9431', '94', 'KABUPATEN MAMBERAMO TENGAH'),
('9432', '94', 'KABUPATEN YALIMO'),
('9433', '94', 'KABUPATEN PUNCAK'),
('9434', '94', 'KABUPATEN DOGIYAI'),
('9435', '94', 'KABUPATEN INTAN JAYA'),
('9436', '94', 'KABUPATEN DEIYAI'),
('9471', '94', 'KOTA JAYAPURA'),
('9999', '99', 'WNA');

-- --------------------------------------------------------

--
-- Table structure for table `hr_register`
--

CREATE TABLE `hr_register` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_register`
--

INSERT INTO `hr_register` (`id`, `username`, `password`, `email`, `level`) VALUES
(8, 'admin', '$2y$10$1L/tNJ3z0uYNBOxxMAhDnO2PLRFUg2LXHHjtepeM1vLgiJpz6ilVO', 'admin@gmail.com', '0'),
(10, 'hanizza', '$2y$10$nCF0RxU884QJYPFRt/jPpe.aZcQ1sItft3fmomUhCQgoP.tH2ZlfC', 'hanizza@gmail.com', '0'),
(12, 'han', '$2y$10$hiNsVGO38iTnrjGiDFOT4.7henGEX1/u72P86/uziLw84bb1p0roO', 'han@gmail.com', '0');

-- --------------------------------------------------------

--
-- Table structure for table `hr_reset_password`
--

CREATE TABLE `hr_reset_password` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status_change` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_reset_password`
--

INSERT INTO `hr_reset_password` (`id`, `token`, `email`, `status_change`) VALUES
(43, '39246c0736e68a50bda39134dac4361ec3b0c4f467d7856ca7b136a9c330026c', 'hanizza46@gmail.com', 'invalid_token'),
(44, 'db123111b50dc67fa968f1cee370de10866e9b2302a92e443043cb4c735b92fb', 'farhanizza46@gmail.com', 'invalid_token'),
(45, '0e98fbab134ca2c3347bac4e40a8599ca537c155ee860ed5910c5932d744ed17', 'farhanizza46@gmail.com', 'valid_token');

-- --------------------------------------------------------

--
-- Table structure for table `hr_sertifikat`
--

CREATE TABLE `hr_sertifikat` (
  `id` int(11) NOT NULL,
  `nomor_sertifikat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_sertifikat`
--

INSERT INTO `hr_sertifikat` (`id`, `nomor_sertifikat`) VALUES
(1, '123456789'),
(2, '11223344556677'),
(3, '1x20123SVII'),
(4, '2x20123SGVIX');

-- --------------------------------------------------------

--
-- Table structure for table `hr_status`
--

CREATE TABLE `hr_status` (
  `id` int(11) NOT NULL,
  `id_status` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_status`
--

INSERT INTO `hr_status` (`id`, `id_status`, `status`) VALUES
(1, '0', 'Pending Form'),
(2, '1', 'Half Approved Form'),
(3, '2', 'Approved Form'),
(4, '3', 'Rejected Form'),
(5, '4', 'Document Approved'),
(6, '5', 'Document Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `hr_tujuan_program`
--

CREATE TABLE `hr_tujuan_program` (
  `id` int(11) NOT NULL,
  `tujuan_program` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_tujuan_program`
--

INSERT INTO `hr_tujuan_program` (`id`, `tujuan_program`) VALUES
(1, 'Pelatihan Keterampilan Kerja'),
(2, 'Program Pemberdayaan Masyarakat'),
(3, 'Pelatihan Literasi'),
(4, 'Program Pengembangan Kreativitas'),
(5, 'Pelatihan Kewirausahaan'),
(6, 'Program Pembelajaran Sepanjang Hayat'),
(7, 'Pelatihan Kecakapan Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `hr_user_non_formal`
--

CREATE TABLE `hr_user_non_formal` (
  `id` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tujuan_program` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `materi_konten` varchar(255) NOT NULL,
  `judul_program` varchar(255) NOT NULL,
  `metode_pembelajaran` varchar(255) NOT NULL,
  `sertifikat` varchar(255) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `lokasi_provinsi` varchar(255) NOT NULL,
  `deksripsi` varchar(255) NOT NULL,
  `lokasi_kota` varchar(255) NOT NULL,
  `id_status` varchar(255) NOT NULL,
  `status_sertifikat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_user_non_formal`
--

INSERT INTO `hr_user_non_formal` (`id`, `id_employee`, `nama_lengkap`, `tujuan_program`, `start_date`, `end_date`, `materi_konten`, `judul_program`, `metode_pembelajaran`, `sertifikat`, `nama_instansi`, `lokasi_provinsi`, `deksripsi`, `lokasi_kota`, `id_status`, `status_sertifikat`) VALUES
(119, 288, 'Aliquid nemo debitis', 'Program Pengembangan Kreativitas', '1994-08-05', '2013-12-30', 'Pembelajaran Sepanjang Hayat', 'Amet et voluptates ', 'Pembelajaran Jarak Jauh', '12-14-44-pm-2023-05-24-certificate-DQLABBGINRVTCEKQ.pdf', 'PT. Telekomunikasi Tbk', '52', 'Sit ipsam dolores laboriosam deserunt ut ut excepteur quo fugiat dignissimos deleniti eligendi illum odio dolor quam eius nostrum aut', '5206', '3', 'Sistem membuktikan dokumen palsu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hr_approved`
--
ALTER TABLE `hr_approved`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_category`
--
ALTER TABLE `hr_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_collab`
--
ALTER TABLE `hr_collab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_countries`
--
ALTER TABLE `hr_countries`
  ADD PRIMARY KEY (`abv`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `hr_employee`
--
ALTER TABLE `hr_employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `hr_insert_dokumen`
--
ALTER TABLE `hr_insert_dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_instansi`
--
ALTER TABLE `hr_instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_log_server`
--
ALTER TABLE `hr_log_server`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_materi`
--
ALTER TABLE `hr_materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_metode_pembelajaran`
--
ALTER TABLE `hr_metode_pembelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_pesan`
--
ALTER TABLE `hr_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_position`
--
ALTER TABLE `hr_position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `hr_provinces`
--
ALTER TABLE `hr_provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_qr_code`
--
ALTER TABLE `hr_qr_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_regencies`
--
ALTER TABLE `hr_regencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regencies_province_id_index` (`province_id`);

--
-- Indexes for table `hr_register`
--
ALTER TABLE `hr_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_reset_password`
--
ALTER TABLE `hr_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_sertifikat`
--
ALTER TABLE `hr_sertifikat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_status`
--
ALTER TABLE `hr_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_tujuan_program`
--
ALTER TABLE `hr_tujuan_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_user_non_formal`
--
ALTER TABLE `hr_user_non_formal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hr_approved`
--
ALTER TABLE `hr_approved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `hr_collab`
--
ALTER TABLE `hr_collab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hr_employee`
--
ALTER TABLE `hr_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT for table `hr_insert_dokumen`
--
ALTER TABLE `hr_insert_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `hr_instansi`
--
ALTER TABLE `hr_instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hr_log_server`
--
ALTER TABLE `hr_log_server`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1629;

--
-- AUTO_INCREMENT for table `hr_materi`
--
ALTER TABLE `hr_materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hr_metode_pembelajaran`
--
ALTER TABLE `hr_metode_pembelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hr_pesan`
--
ALTER TABLE `hr_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `hr_qr_code`
--
ALTER TABLE `hr_qr_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `hr_register`
--
ALTER TABLE `hr_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hr_reset_password`
--
ALTER TABLE `hr_reset_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `hr_sertifikat`
--
ALTER TABLE `hr_sertifikat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hr_status`
--
ALTER TABLE `hr_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hr_tujuan_program`
--
ALTER TABLE `hr_tujuan_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hr_user_non_formal`
--
ALTER TABLE `hr_user_non_formal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hr_regencies`
--
ALTER TABLE `hr_regencies`
  ADD CONSTRAINT `regencies_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `hr_provinces` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
