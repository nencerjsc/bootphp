-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.29 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5958
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table bootphp.blocks
CREATE TABLE IF NOT EXISTS `blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `require_login` int(11) NOT NULL DEFAULT '0',
  `position` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `widget` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table bootphp.blocks: ~0 rows (approximately)
/*!40000 ALTER TABLE `blocks` DISABLE KEYS */;
INSERT INTO `blocks` (`id`, `name`, `key`, `lang`, `require_login`, `position`, `widget`, `url`, `sort`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Khách phản hồi', 'cusfeedback', 'vi', 0, 'homecenter', 'Html', NULL, '0', '1', '2019-09-01 05:43:15', '2019-09-01 05:43:15');
/*!40000 ALTER TABLE `blocks` ENABLE KEYS */;

-- Dumping structure for table bootphp.block_content
CREATE TABLE IF NOT EXISTS `block_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `block` int(11) NOT NULL COMMENT 'Dùng để nhóm các block',
  `lang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Fa icon',
  `info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `sort` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table bootphp.block_content: ~2 rows (approximately)
/*!40000 ALTER TABLE `block_content` DISABLE KEYS */;
INSERT INTO `block_content` (`id`, `block`, `lang`, `title`, `image`, `icon`, `info`, `data`, `url`, `status`, `sort`, `created_at`, `updated_at`) VALUES
	(2, 1, 'vi', 'Nguyễn Thị Tâm', '/storage/userfiles/images/thecao/the-viettel.png', NULL, 'Lãnh đạo Trung Quốc, Nga, Triều Tiên, Cuba và các nước ASEAN gửi điện, thư mừng 74 năm Quốc khánh nước CHXHCN Việt Nam.', '["Trong \\u0111i\\u1ec7n m\\u1eebng Qu\\u1ed1c kh\\u00e1nh Vi\\u1ec7t Nam (2\\/9\\/1945 - 2\\/9\\/2019), Ch\\u1ee7 t\\u1ecbch Trung Qu\\u1ed1c T\\u1eadp C\\u1eadn B\\u00ecnh \\u0111\\u00e1nh gi\\u00e1 cao th\\u00e0nh t\\u1ef1u Vi\\u1ec7t Nam \\u0111\\u1ea1t \\u0111\\u01b0\\u1ee3c trong th\\u1eddi gian qua, kh\\u1eb3ng \\u0111\\u1ecbnh coi tr\\u1ecdng ph\\u00e1t tri\\u1ec3n quan h\\u1ec7 v\\u1edbi Vi\\u1ec7t Nam, theo th\\u00f4ng c\\u00e1o c\\u1ee7a B\\u1ed9 Ngo\\u1ea1i giao."]', NULL, 1, 1, '2019-09-01 12:40:25', '2019-09-01 12:40:25'),
	(3, 1, 'vi', 'Phạm Tuần Tài', '/storage/userfiles/images/thecao/the-scoin.jpg', NULL, 'Vai trò ngày càng tăng của lực lượng chống khủng bố Trung Quốc', '["Ch\\u1ee7 t\\u1ecbch Trung Qu\\u1ed1c s\\u1eb5n s\\u00e0ng th\\u00fac \\u0111\\u1ea9y quan h\\u1ec7 \\u0111\\u1ed1i t\\u00e1c h\\u1ee3p t\\u00e1c chi\\u1ebfn l\\u01b0\\u1ee3c to\\u00e0n di\\u1ec7n v\\u1edbi Vi\\u1ec7t Nam ph\\u00e1t tri\\u1ec3n \\u1ed5n \\u0111\\u1ecbnh, b\\u1ec1n v\\u1eefng, c\\u00f9ng h\\u01b0\\u1edbng t\\u1edbi k\\u1ef7 ni\\u1ec7m 70 n\\u0103m thi\\u1ebft l\\u1eadp quan h\\u1ec7 ngo\\u1ea1i giao hai n\\u01b0\\u1edbc trong n\\u0103m t\\u1edbi."]', NULL, 1, 2, '2019-09-01 12:41:28', '2019-09-01 12:41:28');
/*!40000 ALTER TABLE `block_content` ENABLE KEYS */;

-- Dumping structure for table bootphp.currencies
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã tiền tệ',
  `value` double NOT NULL DEFAULT '0' COMMENT '1 USD bằng bao nhiêu tiền này',
  `value_sell` double DEFAULT '0',
  `symbol_left` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol_right` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seperator` enum('space','comma','dot') COLLATE utf8mb4_unicode_ci NOT NULL,
  `decimal` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `fiat` tinyint(1) NOT NULL DEFAULT '1',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `sort` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `currencies_status_index` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bootphp.currencies: ~0 rows (approximately)
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` (`id`, `name`, `code`, `value`, `value_sell`, `symbol_left`, `symbol_right`, `seperator`, `decimal`, `status`, `fiat`, `default`, `sort`, `created_at`, `updated_at`) VALUES
	(2, 'US dollars', 'USD', 1, 0, '$', NULL, 'comma', 2, 1, 1, 1, 1, '2018-07-25 10:54:56', '2020-10-10 05:23:31');
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;

-- Dumping structure for table bootphp.currencies_code
CREATE TABLE IF NOT EXISTS `currencies_code` (
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Các mã code của tiền tệ trên thế giới';

-- Dumping data for table bootphp.currencies_code: ~154 rows (approximately)
/*!40000 ALTER TABLE `currencies_code` DISABLE KEYS */;
INSERT INTO `currencies_code` (`code`, `name`) VALUES
	('AED', 'United Arab Emirates Dirham'),
	('AFN', 'Afghanistan Afghani'),
	('ALL', 'Albania Lek'),
	('AMD', 'Armenia Dram'),
	('ANG', 'Netherlands Antilles Guilder'),
	('AOA', 'Angola Kwanza'),
	('ARS', 'Argentina Peso'),
	('AUD', 'Australia Dollar'),
	('AWG', 'Aruba Guilder'),
	('AZN', 'Azerbaijan New Manat'),
	('BBD', 'Barbados Dollar'),
	('BDT', 'Bangladesh Taka'),
	('BGN', 'Bulgaria Lev'),
	('BHD', 'Bahrain Dinar'),
	('BIF', 'Burundi Franc'),
	('BMD', 'Bermuda Dollar'),
	('BND', 'Brunei Darussalam Dollar'),
	('BOB', 'Bolivia Bolíviano'),
	('BRL', 'Brazil Real'),
	('BSD', 'Bahamas Dollar'),
	('BTC', 'Bitcoin'),
	('BTN', 'Bhutan Ngultrum'),
	('BWP', 'Botswana Pula'),
	('BYN', 'Belarus Ruble'),
	('BZD', 'Belize Dollar'),
	('CAD', 'Canada Dollar'),
	('CDF', 'Congo/Kinshasa Franc'),
	('CHF', 'Switzerland Franc'),
	('CLP', 'Chile Peso'),
	('CNY', 'China Yuan Renminbi'),
	('COP', 'Colombia Peso'),
	('CRC', 'Costa Rica Colon'),
	('CUC', 'Cuba Convertible Peso'),
	('CUP', 'Cuba Peso'),
	('CVE', 'Cape Verde Escudo'),
	('CZK', 'Czech Republic Koruna'),
	('DJF', 'Djibouti Franc'),
	('DKK', 'Denmark Krone'),
	('DOP', 'Dominican Republic Peso'),
	('DZD', 'Algeria Dinar'),
	('EGP', 'Egypt Pound'),
	('ERN', 'Eritrea Nakfa'),
	('ETB', 'Ethiopia Birr'),
	('ETH', 'Ethereum'),
	('EUR', 'Euro Member Countries'),
	('FJD', 'Fiji Dollar'),
	('GBP', 'United Kingdom Pound'),
	('GEL', 'Georgia Lari'),
	('GGP', 'Guernsey Pound'),
	('GHS', 'Ghana Cedi'),
	('GIP', 'Gibraltar Pound'),
	('GMD', 'Gambia Dalasi'),
	('GNF', 'Guinea Franc'),
	('GTQ', 'Guatemala Quetzal'),
	('GYD', 'Guyana Dollar'),
	('HKD', 'Hong Kong Dollar'),
	('HNL', 'Honduras Lempira'),
	('HRK', 'Croatia Kuna'),
	('HTG', 'Haiti Gourde'),
	('HUF', 'Hungary Forint'),
	('IDR', 'Indonesia Rupiah'),
	('ILS', 'Israel Shekel'),
	('IMP', 'Isle of Man Pound'),
	('INR', 'India Rupee'),
	('IQD', 'Iraq Dinar'),
	('IRR', 'Iran Rial'),
	('ISK', 'Iceland Krona'),
	('JEP', 'Jersey Pound'),
	('JMD', 'Jamaica Dollar'),
	('JOD', 'Jordan Dinar'),
	('JPY', 'Japan Yen'),
	('KES', 'Kenya Shilling'),
	('KGS', 'Kyrgyzstan Som'),
	('KHR', 'Cambodia Riel'),
	('KMF', 'Comoros Franc'),
	('KPW', 'Korea (North) Won'),
	('KRW', 'Korea (South) Won'),
	('KWD', 'Kuwait Dinar'),
	('KYD', 'Cayman Islands Dollar'),
	('KZT', 'Kazakhstan Tenge'),
	('LAK', 'Laos Kip'),
	('LBP', 'Lebanon Pound'),
	('LKR', 'Sri Lanka Rupee'),
	('LRD', 'Liberia Dollar'),
	('LSL', 'Lesotho Loti'),
	('LTC', 'Litecoin'),
	('LYD', 'Libya Dinar'),
	('MAD', 'Morocco Dirham'),
	('MDL', 'Moldova Leu'),
	('MGA', 'Madagascar Ariary'),
	('MKD', 'Macedonia Denar'),
	('MMK', 'Myanmar (Burma) Kyat'),
	('MNT', 'Mongolia Tughrik'),
	('MOP', 'Macau Pataca'),
	('MRO', 'Mauritania Ouguiya'),
	('MUR', 'Mauritius Rupee'),
	('MWK', 'Malawi Kwacha'),
	('MXN', 'Mexico Peso'),
	('MYR', 'Malaysia Ringgit'),
	('MZN', 'Mozambique Metical'),
	('NAD', 'Namibia Dollar'),
	('NGN', 'Nigeria Naira'),
	('NIO', 'Nicaragua Cordoba'),
	('NOK', 'Norway Krone'),
	('NPR', 'Nepal Rupee'),
	('NZD', 'New Zealand Dollar'),
	('OMR', 'Oman Rial'),
	('PAB', 'Panama Balboa'),
	('PEN', 'Peru Sol'),
	('PGK', 'Papua New Guinea Kina'),
	('PHP', 'Philippines Peso'),
	('PKR', 'Pakistan Rupee'),
	('PLN', 'Poland Zloty'),
	('PYG', 'Paraguay Guarani'),
	('QAR', 'Qatar Riyal'),
	('RON', 'Romania New Leu'),
	('RSD', 'Serbia Dinar'),
	('RUB', 'Russia Ruble'),
	('RWF', 'Rwanda Franc'),
	('SAR', 'Saudi Arabia Riyal'),
	('SCR', 'Seychelles Rupee'),
	('SDG', 'Sudan Pound'),
	('SEK', 'Sweden Krona'),
	('SGD', 'Singapore Dollar'),
	('SHP', 'Saint Helena Pound'),
	('SLL', 'Sierra Leone Leone'),
	('SOS', 'Somalia Shilling'),
	('SPL', 'Seborga Luigino'),
	('SRD', 'Suriname Dollar'),
	('SVC', 'El Salvador Colon'),
	('SYP', 'Syria Pound'),
	('SZL', 'Swaziland Lilangeni'),
	('THB', 'Thailand Baht'),
	('TJS', 'Tajikistan Somoni'),
	('TMT', 'Turkmenistan Manat'),
	('TND', 'Tunisia Dinar'),
	('TOP', 'Tonga Pa\'anga'),
	('TRY', 'Turkey Lira'),
	('TVD', 'Tuvalu Dollar'),
	('TWD', 'Taiwan New Dollar'),
	('TZS', 'Tanzania Shilling'),
	('UAH', 'Ukraine Hryvnia'),
	('UGX', 'Uganda Shilling'),
	('USD', 'United States Dollar'),
	('UYU', 'Uruguay Peso'),
	('UZS', 'Uzbekistan Som'),
	('VEF', 'Venezuela Bolivar'),
	('VND', 'Viet Nam Dong'),
	('VUV', 'Vanuatu Vatu'),
	('WST', 'Samoa Tala'),
	('YER', 'Yemen Rial'),
	('ZAR', 'South Africa Rand'),
	('ZMW', 'Zambia Kwacha'),
	('ZWD', 'Zimbabwe Dollar');
/*!40000 ALTER TABLE `currencies_code` ENABLE KEYS */;

-- Dumping structure for table bootphp.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bootphp.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table bootphp.languages
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `code` varchar(10) NOT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `hreflang` varchar(50) DEFAULT NULL,
  `charset` varchar(50) DEFAULT NULL,
  `default` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `installed` tinyint(4) NOT NULL DEFAULT '0',
  `sort` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table bootphp.languages: ~0 rows (approximately)
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` (`id`, `name`, `code`, `flag`, `hreflang`, `charset`, `default`, `status`, `installed`, `sort`, `created_at`, `updated_at`) VALUES
	(1, 'English', 'us', 'us.png', NULL, NULL, 0, 1, 1, 1, '2022-05-07 14:47:27', '2021-12-04 08:28:39');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;

-- Dumping structure for table bootphp.languages_trans
CREATE TABLE IF NOT EXISTS `languages_trans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_code` varchar(50) NOT NULL,
  `lang_key` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `key` varchar(100) NOT NULL COMMENT 'en_auth ==> gồm lang_code + filename',
  `content` text NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'string',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=2099 DEFAULT CHARSET=utf8;

-- Dumping data for table bootphp.languages_trans: ~67 rows (approximately)
/*!40000 ALTER TABLE `languages_trans` DISABLE KEYS */;
INSERT INTO `languages_trans` (`id`, `lang_code`, `lang_key`, `filename`, `key`, `content`, `type`, `created_at`, `updated_at`) VALUES
	(2032, 'us', 'auth.failed', 'auth', 'us_auth_failed', 'These credentials do not match our records.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2033, 'us', 'auth.throttle', 'auth', 'us_auth_throttle', 'Too many login attempts. Please try again in :seconds seconds.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2034, 'us', 'backend.dashboard', 'backend', 'us_backend_dashboard', 'Dashboard', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2035, 'us', 'backend.welcome', 'backend', 'us_backend_welcome', 'Welcome', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2036, 'us', 'pagination.previous', 'pagination', 'us_pagination_previous', '&laquo; Previous', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2037, 'us', 'pagination.next', 'pagination', 'us_pagination_next', 'Next &raquo;', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2038, 'us', 'passwords.reset', 'passwords', 'us_passwords_reset', 'Your password has been reset!', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2039, 'us', 'passwords.sent', 'passwords', 'us_passwords_sent', 'We have e-mailed your password reset link!', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2040, 'us', 'passwords.throttled', 'passwords', 'us_passwords_throttled', 'Please wait before retrying.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2041, 'us', 'passwords.token', 'passwords', 'us_passwords_token', 'This password reset token is invalid.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2042, 'us', 'passwords.user', 'passwords', 'us_passwords_user', 'We can\'t find a user with that e-mail address.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2043, 'us', 'validation.accepted', 'validation', 'us_validation_accepted', 'The :attribute must be accepted.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2044, 'us', 'validation.active_url', 'validation', 'us_validation_active_url', 'The :attribute is not a valid URL.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2045, 'us', 'validation.after', 'validation', 'us_validation_after', 'The :attribute must be a date after :date.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2046, 'us', 'validation.after_or_equal', 'validation', 'us_validation_after_or_equal', 'The :attribute must be a date after or equal to :date.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2047, 'us', 'validation.alpha', 'validation', 'us_validation_alpha', 'The :attribute may only contain letters.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2048, 'us', 'validation.alpha_dash', 'validation', 'us_validation_alpha_dash', 'The :attribute may only contain letters, numbers, dashes and underscores.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2049, 'us', 'validation.alpha_num', 'validation', 'us_validation_alpha_num', 'The :attribute may only contain letters and numbers.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2050, 'us', 'validation.array', 'validation', 'us_validation_array', 'The :attribute must be an array.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2051, 'us', 'validation.before', 'validation', 'us_validation_before', 'The :attribute must be a date before :date.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2052, 'us', 'validation.before_or_equal', 'validation', 'us_validation_before_or_equal', 'The :attribute must be a date before or equal to :date.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2053, 'us', 'validation.boolean', 'validation', 'us_validation_boolean', 'The :attribute field must be true or false.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2054, 'us', 'validation.confirmed', 'validation', 'us_validation_confirmed', 'The :attribute confirmation does not match.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2055, 'us', 'validation.date', 'validation', 'us_validation_date', 'The :attribute is not a valid date.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2056, 'us', 'validation.date_equals', 'validation', 'us_validation_date_equals', 'The :attribute must be a date equal to :date.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2057, 'us', 'validation.date_format', 'validation', 'us_validation_date_format', 'The :attribute does not match the format :format.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2058, 'us', 'validation.different', 'validation', 'us_validation_different', 'The :attribute and :other must be different.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2059, 'us', 'validation.digits', 'validation', 'us_validation_digits', 'The :attribute must be :digits digits.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2060, 'us', 'validation.digits_between', 'validation', 'us_validation_digits_between', 'The :attribute must be between :min and :max digits.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2061, 'us', 'validation.dimensions', 'validation', 'us_validation_dimensions', 'The :attribute has invalid image dimensions.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2062, 'us', 'validation.distinct', 'validation', 'us_validation_distinct', 'The :attribute field has a duplicate value.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2063, 'us', 'validation.email', 'validation', 'us_validation_email', 'The :attribute must be a valid email address.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2064, 'us', 'validation.ends_with', 'validation', 'us_validation_ends_with', 'The :attribute must end with one of the following: :values.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2065, 'us', 'validation.exists', 'validation', 'us_validation_exists', 'The selected :attribute is invalid.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2066, 'us', 'validation.file', 'validation', 'us_validation_file', 'The :attribute must be a file.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2067, 'us', 'validation.filled', 'validation', 'us_validation_filled', 'The :attribute field must have a value.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2068, 'us', 'validation.image', 'validation', 'us_validation_image', 'The :attribute must be an image.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2069, 'us', 'validation.in', 'validation', 'us_validation_in', 'The selected :attribute is invalid.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2070, 'us', 'validation.in_array', 'validation', 'us_validation_in_array', 'The :attribute field does not exist in :other.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2071, 'us', 'validation.integer', 'validation', 'us_validation_integer', 'The :attribute must be an integer.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2072, 'us', 'validation.ip', 'validation', 'us_validation_ip', 'The :attribute must be a valid IP address.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2073, 'us', 'validation.ipv4', 'validation', 'us_validation_ipv4', 'The :attribute must be a valid IPv4 address.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2074, 'us', 'validation.ipv6', 'validation', 'us_validation_ipv6', 'The :attribute must be a valid IPv6 address.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2075, 'us', 'validation.json', 'validation', 'us_validation_json', 'The :attribute must be a valid JSON string.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2076, 'us', 'validation.mimes', 'validation', 'us_validation_mimes', 'The :attribute must be a file of type: :values.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2077, 'us', 'validation.mimetypes', 'validation', 'us_validation_mimetypes', 'The :attribute must be a file of type: :values.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2078, 'us', 'validation.not_in', 'validation', 'us_validation_not_in', 'The selected :attribute is invalid.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2079, 'us', 'validation.not_regex', 'validation', 'us_validation_not_regex', 'The :attribute format is invalid.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2080, 'us', 'validation.numeric', 'validation', 'us_validation_numeric', 'The :attribute must be a number.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2081, 'us', 'validation.password', 'validation', 'us_validation_password', 'The password is incorrect.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2082, 'us', 'validation.present', 'validation', 'us_validation_present', 'The :attribute field must be present.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2083, 'us', 'validation.regex', 'validation', 'us_validation_regex', 'The :attribute format is invalid.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2084, 'us', 'validation.required', 'validation', 'us_validation_required', 'The :attribute field is required.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2085, 'us', 'validation.required_if', 'validation', 'us_validation_required_if', 'The :attribute field is required when :other is :value.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2086, 'us', 'validation.required_unless', 'validation', 'us_validation_required_unless', 'The :attribute field is required unless :other is in :values.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2087, 'us', 'validation.required_with', 'validation', 'us_validation_required_with', 'The :attribute field is required when :values is present.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2088, 'us', 'validation.required_with_all', 'validation', 'us_validation_required_with_all', 'The :attribute field is required when :values are present.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2089, 'us', 'validation.required_without', 'validation', 'us_validation_required_without', 'The :attribute field is required when :values is not present.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2090, 'us', 'validation.required_without_all', 'validation', 'us_validation_required_without_all', 'The :attribute field is required when none of :values are present.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2091, 'us', 'validation.same', 'validation', 'us_validation_same', 'The :attribute and :other must match.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2092, 'us', 'validation.starts_with', 'validation', 'us_validation_starts_with', 'The :attribute must start with one of the following: :values.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2093, 'us', 'validation.string', 'validation', 'us_validation_string', 'The :attribute must be a string.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2094, 'us', 'validation.timezone', 'validation', 'us_validation_timezone', 'The :attribute must be a valid zone.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2095, 'us', 'validation.unique', 'validation', 'us_validation_unique', 'The :attribute has already been taken.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2096, 'us', 'validation.uploaded', 'validation', 'us_validation_uploaded', 'The :attribute failed to upload.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2097, 'us', 'validation.url', 'validation', 'us_validation_url', 'The :attribute format is invalid.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28'),
	(2098, 'us', 'validation.uuid', 'validation', 'us_validation_uuid', 'The :attribute must be a valid UUID.', 'string', '2022-04-24 07:38:28', '2022-04-24 07:38:28');
/*!40000 ALTER TABLE `languages_trans` ENABLE KEYS */;

-- Dumping structure for table bootphp.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `menu_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `level` int(11) DEFAULT '1',
  `children_count` int(11) DEFAULT '0',
  `sort_order` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1',
  `language` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table bootphp.menu: ~18 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `name`, `url`, `menu_type`, `parent_id`, `level`, `children_count`, `sort_order`, `status`, `language`, `created_at`, `updated_at`) VALUES
	(60, 'Mua mã thẻ', '/card', 'header', 0, 1, 0, 1, 1, 'vi', '2018-08-05 05:16:17', '2021-10-06 22:49:06'),
	(61, 'Đổi thẻ cào', '/doithecao', 'header', 0, 1, 1, 2, 1, 'vi', '2018-08-05 05:16:37', '2022-05-07 06:48:03'),
	(71, 'Tin tức', 'news', 'header', 0, 1, 0, 5, 1, 'vi', '2018-08-11 22:52:37', '2020-10-10 08:48:27'),
	(73, 'Dịch vụ', '#', 'footer', 0, 1, 4, 22, 1, 'vi', '2018-08-16 16:11:21', '2021-11-20 15:00:52'),
	(74, 'Thông tin', '#', 'footer', 0, 1, 4, 33, 1, 'vi', '2018-08-16 16:11:35', '2021-11-20 15:03:29'),
	(87, 'Nạp topup', '/recharge', 'header', 0, 1, 0, 3, 1, 'vi', '2019-01-09 20:48:45', '2021-09-23 17:25:19'),
	(88, 'Buy card', './card', 'header', 61, 1, 0, 1, 1, 'us', '2020-05-22 08:20:05', '2022-05-07 06:48:52'),
	(89, 'Card Charging', './doithecao', 'header', 0, 1, 0, 2, 1, 'us', '2020-05-22 08:20:47', '2020-05-22 08:20:47'),
	(90, 'Topup', './recharge', 'header', 0, 1, 0, 3, 1, 'us', '2020-05-22 08:21:19', '2021-10-06 23:24:07'),
	(91, 'News', './tin-tuc', 'header', 0, 1, 0, 3, 1, 'us', '2020-05-22 08:21:40', '2020-05-22 08:21:40'),
	(92, 'Mua mã thẻ', '/card', 'footer', 73, 2, 0, 1, 1, 'vi', '2021-11-20 14:59:32', '2021-11-20 14:59:32'),
	(93, 'Đổi thẻ cào', '/doithecao', 'footer', 73, 2, 0, 2, 1, 'vi', '2021-11-20 15:00:27', '2021-11-20 15:00:27'),
	(94, 'Nạp topup', '/recharge', 'footer', 73, 2, 0, 3, 1, 'vi', '2021-11-20 15:00:52', '2021-11-20 15:00:52'),
	(95, 'Tin tức', '/news', 'footer', 74, 2, 0, 1, 1, 'vi', '2021-11-20 15:02:05', '2021-11-20 15:02:05'),
	(96, 'Kết nối API', '/merchant/list', 'footer', 74, 2, 0, 2, 1, 'vi', '2021-11-20 15:02:50', '2021-11-20 15:02:50'),
	(97, 'Bảo mật', '/account/security', 'footer', 74, 2, 0, 2, 1, 'vi', '2021-11-20 15:03:29', '2021-11-20 15:03:29'),
	(98, 'Ngân hàng ACB', 'ngan-hang-acb', 'header', 0, 1, 0, 1, 1, 'us', '2022-05-07 04:25:49', '2022-05-07 04:25:49'),
	(99, 'Menu 123123123', 'menu-123123123', 'header', 0, 1, 0, 1, 1, 'us', '2022-05-07 04:26:38', '2022-05-07 04:26:38');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table bootphp.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bootphp.migrations: ~6 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2020_03_01_035751_create_permission_tables', 2),
	(5, '2014_10_12_100000_create_products_table', 3),
	(6, '2014_10_12_100000_create_ztests_table', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table bootphp.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bootphp.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table bootphp.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bootphp.model_has_roles: ~4 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\User', 1),
	(2, 'App\\User', 1),
	(1, 'App\\User', 3),
	(2, 'App\\User', 3);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table bootphp.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `news_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta` text COLLATE utf8_unicode_ci,
  `short_description` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `author_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_layout` tinyint(2) DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `cats` int(11) DEFAULT NULL,
  `publish_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_slug` (`news_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table bootphp.news: ~2 rows (approximately)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `title`, `news_slug`, `meta`, `short_description`, `description`, `author`, `author_email`, `image`, `language`, `custom_layout`, `view_count`, `status`, `cats`, `publish_date`, `created_at`, `updated_at`) VALUES
	(1, 'Thông báo phân phối thẻ Carot trên hệ thống', 'thong-bao-phan-phoi-the-carot-tren-he-thong', '{"title":null,"description":null,"keyword":null}', 'Chúng tôi trân trọng thông báo, cung cấp thẻ carot của Teamobi với chiết khấu lên đến 19%.', '<p><strong>Thẻ Carot</strong>&nbsp;là loại&nbsp;<strong>thẻ</strong>&nbsp;được Teamobi phát hành, và được sử dụng để&nbsp;<strong>nạp</strong>&nbsp;vào các tựa&nbsp;<strong>game</strong>&nbsp;của NPH này bao gồm:&nbsp;<strong>Game</strong>&nbsp;Avatar,&nbsp;<strong>Game</strong>&nbsp;Gomobi,&nbsp;<strong>Game</strong>&nbsp;Army 2,&nbsp;<strong>Game</strong>&nbsp;Army 3,&nbsp;<strong>Game</strong>&nbsp;Khí Phách Anh Hùng,&nbsp;<strong>Game</strong>&nbsp;Ninja School online,&nbsp;<strong>Game</strong>&nbsp;Ngọc Rồng Online,&nbsp;<strong>Game</strong>&nbsp;Hiệp sĩ Online,&nbsp;<strong>Game</strong>&nbsp;Avatar Musik....</p>', 'God Admin', 'support@nencer.com', '/storage/userfiles/images/news/thecarot.jpg', 'vi', NULL, 4, 1, 2, NULL, '2022-03-14 15:04:14', '2022-04-22 16:36:34'),
	(2, 'Thông báo phân phối thẻ Gosu trên hệ thống', 'thong-bao-phan-phoi-the-gosu-tren-he-thong', '{"title":null,"description":null,"keyword":null}', 'Chúng tôi trân trọng thông báo, cung cấp thẻ Gosu với chiết khấu hấp dẫn', '<p>Nhà phát hành Gosu với loạt game nhập vai kiếm hiệp đình đám như MT Tam Quốc, Thần Long Tam Quốc, Thiên Long Vô Song, Cửu Âm Chân Kinh, Hàng Long Phục Hổ, Huyết Đao Tiền Truyện, Ngạo Kiếm Vô Song,...và còn nhiều tựa game khác được phát hành bởi nhà phát hành Gosu.</p>\r\n\r\n<p>Trân trọng kính báo!</p>', 'God Admin', 'support@nencer.com', '/storage/userfiles/images/news/thegosu.jpg', 'vi', NULL, 1, 1, 2, NULL, '2022-03-14 15:33:50', '2022-03-14 15:42:42');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- Dumping structure for table bootphp.news_cats
CREATE TABLE IF NOT EXISTS `news_cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url_key` varchar(255) DEFAULT NULL,
  `description` text,
  `parent_id` int(11) DEFAULT '0',
  `sort` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `lang` varchar(50) DEFAULT NULL,
  `_lft` int(11) DEFAULT NULL,
  `_rgt` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `url_key` (`url_key`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table bootphp.news_cats: ~2 rows (approximately)
/*!40000 ALTER TABLE `news_cats` DISABLE KEYS */;
INSERT INTO `news_cats` (`id`, `name`, `url_key`, `description`, `parent_id`, `sort`, `level`, `image`, `lang`, `_lft`, `_rgt`, `status`, `created_at`, `updated_at`) VALUES
	(2, 'Thông báo', 'thong-bao', NULL, NULL, 0, 1, NULL, 'vi', 1, 2, 1, '2020-11-04 01:32:54', '2022-03-14 15:34:39'),
	(9, 'Hướng dẫn', 'huong-dan', '<p>Chuyên trang dạy nấu ăn ngon</p>', NULL, 1, NULL, '/storage/userfiles/images/sliders/cityfoods_fav.png', 'vi', 3, 4, 1, '2021-07-12 08:44:02', '2021-08-09 17:32:45');
/*!40000 ALTER TABLE `news_cats` ENABLE KEYS */;

-- Dumping structure for table bootphp.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Purchase',
  `module` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `net_amount` decimal(10,0) NOT NULL DEFAULT '0',
  `fees` decimal(10,0) NOT NULL DEFAULT '0' COMMENT 'Order fees',
  `pay_amount` decimal(10,0) NOT NULL,
  `tax` decimal(10,0) NOT NULL DEFAULT '0',
  `discount` decimal(10,0) DEFAULT NULL,
  `paygate_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_info` text COLLATE utf8_unicode_ci COMMENT 'Receive information',
  `affiliate_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `shipment_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `admin_note` text COLLATE utf8_unicode_ci,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved` int(11) DEFAULT '1',
  `expired_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_code` (`order_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table bootphp.orders: ~0 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table bootphp.order_logs
CREATE TABLE IF NOT EXISTS `order_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `staff_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bootphp.order_logs: ~0 rows (approximately)
/*!40000 ALTER TABLE `order_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_logs` ENABLE KEYS */;

-- Dumping structure for table bootphp.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci,
  `html_description` mediumtext COLLATE utf8_unicode_ci,
  `language` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table bootphp.pages: ~2 rows (approximately)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`id`, `title`, `slug`, `meta`, `image`, `status`, `description`, `html_description`, `language`, `created_at`, `updated_at`) VALUES
	(1, 'Điểu khoản sử dụng3', 'dieu-khoan-su-dung3', '{"title":"23423","description":"4234","keyword":"23423434"}', NULL, 1, '<p>&nbsp;rwerwe wer we rêr wwwwwwwwwwwwwwwwwwwww</p>', 'sấdasdasđfdf', 'us', '2019-08-30 11:36:22', '2022-05-11 07:49:09'),
	(2, 'Bán thẻ game, thẻ điện thoại, đổi thẻ cào, nạp cước', 'ban-the-game-the-dien-thoai-doi-the-cao-nap-cuoc', NULL, NULL, 1, '<p>23423423423423</p>', '32423 4234 23', 'vi', '2020-05-11 07:49:22', '2020-05-11 07:49:22');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;

-- Dumping structure for table bootphp.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bootphp.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table bootphp.paygates
CREATE TABLE IF NOT EXISTS `paygates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_id` int(11) NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `balance` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `configs` text CHARACTER SET utf8,
  `input_fee_percent` double DEFAULT NULL,
  `input_fee_fixed` double DEFAULT NULL,
  `output_fee_percent` double DEFAULT NULL,
  `output_fee_fixed` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `allow_input` int(11) DEFAULT '1',
  `allow_output` int(11) DEFAULT '1',
  `canceltime` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table bootphp.paygates: ~0 rows (approximately)
/*!40000 ALTER TABLE `paygates` DISABLE KEYS */;
/*!40000 ALTER TABLE `paygates` ENABLE KEYS */;

-- Dumping structure for table bootphp.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bootphp.permissions: ~5 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'list', 'web', NULL, '2020-03-01 13:13:09', '2020-03-01 13:13:15'),
	(2, 'create', 'web', NULL, NULL, NULL),
	(3, 'edit', 'web', NULL, NULL, NULL),
	(4, 'delete', 'web', NULL, NULL, NULL),
	(5, 'view', 'web', NULL, NULL, NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table bootphp.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bootphp.roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'ADMINISTRATOR', 'web', 'Admin tổng', NULL, NULL),
	(2, 'BACKEND', 'web', 'Admin phụ', NULL, NULL),
	(3, 'USER', 'web', 'Quyền thành viên', NULL, NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table bootphp.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bootphp.role_has_permissions: ~10 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(1, 2),
	(2, 2),
	(3, 2),
	(4, 2),
	(5, 2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table bootphp.seo
CREATE TABLE IF NOT EXISTS `seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'vi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `link` (`link`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table bootphp.seo: ~3 rows (approximately)
/*!40000 ALTER TABLE `seo` DISABLE KEYS */;
INSERT INTO `seo` (`id`, `link`, `meta`, `image`, `lang`, `created_at`, `updated_at`) VALUES
	(1, '/', '{"title":"Mua b\\u00e1n th\\u1ebb \\u0111i\\u1ec7n tho\\u1ea1i, th\\u1ebb game, n\\u1ea1p ti\\u1ec1n topup","description":"\\u0110\\u1ea1i l\\u00fd th\\u1ebb \\u0111i\\u1ec7n tho\\u1ea1i Viettel, Vinaphone, Mobifone, th\\u1ebb game online Pubg, zing, Vcoin, Gate, Carot, Garena, V\\u00f5 l\\u00e2m, li\\u00ean qu\\u00e2n mobile.","keyword":"th\\u1ebb \\u0111i\\u1ec7n tho\\u1ea1i Viettel, Vinaphone, Mobifone, th\\u1ebb game online Pubg, zing, Vcoin, Gate, Carot, Garena, V\\u00f5 l\\u00e2m, li\\u00ean qu\\u00e2n"}', '/storage/userfiles/images/a.jpg', 'vi', '2020-05-15 16:03:24', '2020-05-15 17:19:28'),
	(15, '/mtopup', '{"title":"N\\u1ea1p ti\\u1ec1n \\u0111i\\u1ec7n tho\\u1ea1i, topup gi\\u00e1 r\\u1ebb","description":"N\\u1ea1p ti\\u1ec1n \\u0111i\\u1ec7n tho\\u1ea1i, topup gi\\u00e1 r\\u1ebb","keyword":"N\\u1ea1p ti\\u1ec1n \\u0111i\\u1ec7n tho\\u1ea1i, topup gi\\u00e1 r\\u1ebb"}', NULL, 'vi', '2020-05-15 17:25:25', '2020-05-15 17:25:25'),
	(16, '/admincp', '{"title":"THI\\u1ebeT K\\u1ebe WEBSITE TH\\u00d4NG MINH, \\u1ee8NG D\\u1ee4NG DI \\u0110\\u1ed8NG - NENCER","description":"THI\\u1ebeT K\\u1ebe WEBSITE TH\\u00d4NG MINH, \\u1ee8NG D\\u1ee4NG DI \\u0110\\u1ed8NG - NENCER","keyword":"THI\\u1ebeT K\\u1ebe WEBSITE TH\\u00d4NG MINH, \\u1ee8NG D\\u1ee4NG DI \\u0110\\u1ed8NG - NENCER"}', NULL, 'us', '2022-05-11 09:32:55', '2022-05-11 09:32:55');
/*!40000 ALTER TABLE `seo` ENABLE KEYS */;

-- Dumping structure for table bootphp.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(250) DEFAULT NULL,
  `value` text,
  `type` varchar(50) DEFAULT 'primary',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- Dumping data for table bootphp.settings: ~27 rows (approximately)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `key`, `value`, `type`, `created_at`, `updated_at`) VALUES
	(1, 'favicon', '/storage/userfiles/images/nencer-fav.png', 'primary', NULL, '2020-05-15 15:50:21'),
	(2, 'backendlogo', '/storage/userfiles/images/nencer-logo-gray.png', 'primary', NULL, '2020-05-15 15:50:21'),
	(3, 'logo', '/storage/userfiles/images/nencer-logo.png', 'primary', NULL, '2020-05-15 15:50:21'),
	(4, 'company_shortname', 'NENCER JSC.,', 'primary', NULL, '2021-11-20 15:09:11'),
	(5, 'company_description', 'Đại lý thẻ điện thoại, thẻ game trực tuyến, nạp tiền điện thoại. Thanh toán tự động, nhanh chóng và uy tín.', 'primary', NULL, '2021-11-20 15:09:11'),
	(6, 'language', 'us', 'primary', NULL, '2022-05-07 07:58:41'),
	(7, 'phone', '09454545455', 'primary', NULL, '2020-05-15 10:46:35'),
	(8, 'twitter', 'fb.com/admin', 'primary', NULL, '2019-09-22 18:48:51'),
	(9, 'email', 'nguyennghia@nencer.net', 'primary', NULL, '2020-05-15 10:46:35'),
	(10, 'facebook', 'fb.com/admin', 'primary', NULL, '2019-09-22 18:48:51'),
	(11, 'company_name', 'CÔNG TY PHẦN MỀM NENCER JSC', 'primary', NULL, '2022-05-07 07:58:50'),
	(12, 'hotline', '1900 1565', 'primary', NULL, '2020-05-15 10:46:35'),
	(15, 'copyright', 'Software by Nencer Jsc.,', 'primary', NULL, '2020-05-15 10:48:17'),
	(16, 'timezone', 'Asia/Ho_Chi_Minh', 'primary', NULL, '2020-05-15 10:47:56'),
	(18, 'websitestatus', 'ONLINE', 'primary', NULL, '2020-05-15 10:46:35'),
	(19, 'company_address', '35/45 Tran Thai Tong, Cau Giay, Ha Noi', 'primary', '2018-08-19 16:53:44', '2020-04-28 03:48:39'),
	(21, 'default_user_group', '2', 'primary', '2018-08-19 17:06:25', '2020-04-06 17:16:28'),
	(24, 'fronttemplate', 'default', 'primary', NULL, '2020-04-27 17:17:43'),
	(25, 'offline_mes', 'N/A', 'primary', NULL, '2020-05-15 10:16:00'),
	(26, 'youtube', 'https://www.youtube.com/watch?v=neCmEbI2VWg', 'primary', NULL, '2019-09-22 18:48:51'),
	(27, 'globalpopup', '1', 'primary', NULL, '2022-03-20 14:41:21'),
	(28, 'globalpopup_mes', '<p>Để đảm bảo an toàn&nbsp;cho tài khoản web khuyến nghị nên cài đặt bảo mật bằng MK có chữ viết hoa và số .</p>\r\n\r\n<p>Hỗ trợ quên thông tin tài khoản&nbsp;<strong>Liên Hệ FACEBOOK</strong>&nbsp;<br />\r\nCú pháp lấy lại MK : "NC MK" gửi 8077<br />\r\nCú pháp lấy lại MKC2 : "NC MKC2" gửi 8077</p>\r\n\r\n<p><strong>Các tài khoản nạp tiền từ TSR, ATM, MOMO&nbsp;vào&nbsp;</strong><strong>để rửa tiền, lợi dụng nhận tiền, lừa đảo,&nbsp;cờ bạc sẽ bị khóa v.v</strong></p>\r\n\r\n<p>Bán các loại thẻ điện thoại, thẻ game, thẻ carot,v.v cam kết giá luôn ưu đãi nhất thị trường.<br />\r\n<br />\r\n<strong>Đăng Ký&nbsp;Đại Lý, Đối Tác Miễn Phí Nhanh Gọn&nbsp;hợp tác lâu dài .</strong></p>', 'primary', NULL, '2022-03-21 15:55:25'),
	(30, 'google_analytic_id', 'U321312323', 'primary', NULL, '2020-05-15 10:57:26'),
	(31, 'header_js', NULL, 'primary', NULL, '2020-05-15 10:57:51'),
	(32, 'footer_js', NULL, 'primary', NULL, '2020-05-15 10:57:51'),
	(55, 'telegram', '5454444', 'primary', '2020-05-15 09:21:55', '2020-05-15 11:03:41'),
	(67, 'facebook_id', '123456 32435445', 'custom', '2022-05-07 08:30:47', '2022-05-07 08:33:31');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for table bootphp.shipments
CREATE TABLE IF NOT EXISTS `shipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of ship',
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `configs` text COLLATE utf8mb4_unicode_ci,
  `fees` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT '1',
  `sort` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bootphp.shipments: ~0 rows (approximately)
/*!40000 ALTER TABLE `shipments` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipments` ENABLE KEYS */;

-- Dumping structure for table bootphp.sliders
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_text` text COLLATE utf8_unicode_ci,
  `slider_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slider_btn_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slider_btn_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT '0',
  `status` tinyint(2) DEFAULT '1',
  `app` tinyint(2) DEFAULT '1',
  `lang` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'vi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table bootphp.sliders: ~2 rows (approximately)
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` (`id`, `slider_name`, `slider_image`, `slider_text`, `slider_url`, `slider_btn_text`, `slider_btn_url`, `sort_order`, `status`, `app`, `lang`, `created_at`, `updated_at`) VALUES
	(7, 'Giao diện BlueZim - Mùa đông xanh', '/storage/userfiles/images/slider/bannerb.jpg', 'Cho rằng VEC không phối hợp giải quyết vướng mắc sau thông xe cao tốc, Quảng Ngãi cảnh báo Bộ Giao thông khả năng người dân chặn đường.', NULL, 'Mua ngay', '#', 2, 0, 1, 'us', '2018-10-05 20:57:39', '2022-03-15 15:39:58'),
	(8, 'Đổi thẻ cào', '/storage/userfiles/images/slider/doithecao.png', 'Nạp ƯU ĐÃI trả trước, trả sau Vinaphone, Mobifone, Viettel chiết khấu từ 15-20% sau 10 phút sẽ thành công (không có khuyến mãi).', NULL, 'Nạp ngay', NULL, 2, 0, 1, 'vi', '2018-10-19 18:36:17', '2022-03-15 15:40:15');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;

-- Dumping structure for table bootphp.taxes
CREATE TABLE IF NOT EXISTS `taxes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_percent` float NOT NULL DEFAULT '10',
  `country_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bootphp.taxes: ~0 rows (approximately)
/*!40000 ALTER TABLE `taxes` DISABLE KEYS */;
/*!40000 ALTER TABLE `taxes` ENABLE KEYS */;

-- Dumping structure for table bootphp.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `tmp` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tmp_token` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `credits` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `credits_enc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twofactor` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twofactor_secret` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ref` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `birthday` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table bootphp.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `gender`, `avatar`, `group`, `tmp`, `tmp_token`, `parent_id`, `credits`, `credits_enc`, `currency_code`, `language`, `twofactor`, `twofactor_secret`, `ref`, `status`, `birthday`, `created_at`, `updated_at`) VALUES
	(1, '', '', 'support@nencer.com', NULL, NULL, '$2y$10$fhFgzGTdBpUlCu.iH8F/4.t4KkZlOsIMdGQCdbrgFbgDQfDSG6EiW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-02-29 17:07:49', '2020-02-29 17:07:49'),
	(2, '', '', 'hotronet@gmail.com', NULL, NULL, '$2y$10$7tonzQ.wyvrHuLDmuYRC/eE36.tgAB4Fy19m7iospMPSh7/0/FH0u', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-03-01 06:41:31', '2020-03-01 06:41:31'),
	(3, '', '', 'kythuat@gmail.com', NULL, NULL, '$2y$10$bQTnKqnE48oKWUsqv5GgAO5FFslbLm4yFiBL5er46b/IPYKnJZ0Ja', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-12-04 03:22:08', '2021-12-04 03:22:08');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table bootphp.user_address
CREATE TABLE IF NOT EXISTS `user_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `country_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `primary` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table bootphp.user_address: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_address` ENABLE KEYS */;

-- Dumping structure for table bootphp.user_credit_logs
CREATE TABLE IF NOT EXISTS `user_credit_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payer_id` int(11) NOT NULL,
  `payee_id` int(11) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `before_credit` varchar(50) DEFAULT NULL,
  `after_credit` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `order_code` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table bootphp.user_credit_logs: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_credit_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_credit_logs` ENABLE KEYS */;

-- Dumping structure for table bootphp.user_groups
CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `hideit` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bootphp.user_groups: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_groups` DISABLE KEYS */;
INSERT INTO `user_groups` (`id`, `name`, `description`, `status`, `hideit`, `created_at`, `updated_at`) VALUES
	(1, 'Guest', 'Không phải thành viên', 1, 1, '2018-07-24 10:08:28', '2018-08-17 15:16:32'),
	(2, 'Thành viên', 'Thành viên', 1, 1, '2018-07-24 10:08:23', '2018-08-17 15:15:29'),
	(3, 'Đại lý', 'Đại lý', 1, 0, '2018-08-17 15:14:46', '2019-03-04 21:01:41');
/*!40000 ALTER TABLE `user_groups` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
