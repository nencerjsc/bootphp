-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.39 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

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
INSERT INTO `blocks` (`id`, `name`, `key`, `lang`, `require_login`, `position`, `widget`, `url`, `sort`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Khách phản hồi', 'cusfeedback', 'vi', 0, 'homecenter', 'Html', NULL, '0', '1', '2019-09-01 02:43:15', '2019-09-01 02:43:15');

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
INSERT INTO `block_content` (`id`, `block`, `lang`, `title`, `image`, `icon`, `info`, `data`, `url`, `status`, `sort`, `created_at`, `updated_at`) VALUES
	(2, 1, 'vi', 'Nguyễn Thị Tâm', '/storage/userfiles/images/thecao/the-viettel.png', NULL, 'Lãnh đạo Trung Quốc, Nga, Triều Tiên, Cuba và các nước ASEAN gửi điện, thư mừng 74 năm Quốc khánh nước CHXHCN Việt Nam.', '["Trong \\u0111i\\u1ec7n m\\u1eebng Qu\\u1ed1c kh\\u00e1nh Vi\\u1ec7t Nam (2\\/9\\/1945 - 2\\/9\\/2019), Ch\\u1ee7 t\\u1ecbch Trung Qu\\u1ed1c T\\u1eadp C\\u1eadn B\\u00ecnh \\u0111\\u00e1nh gi\\u00e1 cao th\\u00e0nh t\\u1ef1u Vi\\u1ec7t Nam \\u0111\\u1ea1t \\u0111\\u01b0\\u1ee3c trong th\\u1eddi gian qua, kh\\u1eb3ng \\u0111\\u1ecbnh coi tr\\u1ecdng ph\\u00e1t tri\\u1ec3n quan h\\u1ec7 v\\u1edbi Vi\\u1ec7t Nam, theo th\\u00f4ng c\\u00e1o c\\u1ee7a B\\u1ed9 Ngo\\u1ea1i giao."]', NULL, 1, 1, '2019-09-01 09:40:25', '2019-09-01 09:40:25'),
	(3, 1, 'vi', 'Phạm Tuần Tài', '/storage/userfiles/images/thecao/the-scoin.jpg', NULL, 'Vai trò ngày càng tăng của lực lượng chống khủng bố Trung Quốc', '["Ch\\u1ee7 t\\u1ecbch Trung Qu\\u1ed1c s\\u1eb5n s\\u00e0ng th\\u00fac \\u0111\\u1ea9y quan h\\u1ec7 \\u0111\\u1ed1i t\\u00e1c h\\u1ee3p t\\u00e1c chi\\u1ebfn l\\u01b0\\u1ee3c to\\u00e0n di\\u1ec7n v\\u1edbi Vi\\u1ec7t Nam ph\\u00e1t tri\\u1ec3n \\u1ed5n \\u0111\\u1ecbnh, b\\u1ec1n v\\u1eefng, c\\u00f9ng h\\u01b0\\u1edbng t\\u1edbi k\\u1ef7 ni\\u1ec7m 70 n\\u0103m thi\\u1ebft l\\u1eadp quan h\\u1ec7 ngo\\u1ea1i giao hai n\\u01b0\\u1edbc trong n\\u0103m t\\u1edbi."]', NULL, 1, 2, '2019-09-01 09:41:28', '2019-09-01 09:41:28');

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
INSERT INTO `currencies` (`id`, `name`, `code`, `value`, `value_sell`, `symbol_left`, `symbol_right`, `seperator`, `decimal`, `status`, `fiat`, `default`, `sort`, `created_at`, `updated_at`) VALUES
	(2, 'US dollars', 'USD', 1, 0, '$', NULL, 'comma', 2, 1, 1, 1, 1, '2018-07-25 07:54:56', '2020-10-10 02:23:31');

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
INSERT INTO `languages` (`id`, `name`, `code`, `flag`, `hreflang`, `charset`, `default`, `status`, `installed`, `sort`, `created_at`, `updated_at`) VALUES
	(1, 'English', 'us', 'us.png', NULL, NULL, 0, 1, 1, 1, '2022-05-07 11:47:27', '2021-12-04 05:28:39');

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
INSERT INTO `menu` (`id`, `name`, `url`, `menu_type`, `parent_id`, `level`, `children_count`, `sort_order`, `status`, `language`, `created_at`, `updated_at`) VALUES
	(60, 'Mua mã thẻ', '/card', 'header', 0, 1, 0, 1, 1, 'vi', '2018-08-05 02:16:17', '2021-10-06 19:49:06'),
	(61, 'Đổi thẻ cào', '/doithecao', 'header', 0, 1, 1, 2, 1, 'vi', '2018-08-05 02:16:37', '2022-05-07 03:48:03'),
	(71, 'Tin tức', 'news', 'header', 0, 1, 0, 5, 1, 'vi', '2018-08-11 19:52:37', '2020-10-10 05:48:27'),
	(73, 'Dịch vụ', '#', 'footer', 0, 1, 4, 22, 1, 'vi', '2018-08-16 13:11:21', '2021-11-20 12:00:52'),
	(74, 'Thông tin', '#', 'footer', 0, 1, 4, 33, 1, 'vi', '2018-08-16 13:11:35', '2021-11-20 12:03:29'),
	(87, 'Nạp topup', '/recharge', 'header', 0, 1, 0, 3, 1, 'vi', '2019-01-09 17:48:45', '2021-09-23 14:25:19'),
	(88, 'Buy card', './card', 'header', 61, 1, 0, 1, 1, 'us', '2020-05-22 05:20:05', '2022-05-07 03:48:52'),
	(89, 'Card Charging', './doithecao', 'header', 0, 1, 0, 2, 1, 'us', '2020-05-22 05:20:47', '2020-05-22 05:20:47'),
	(90, 'Topup', './recharge', 'header', 0, 1, 0, 3, 1, 'us', '2020-05-22 05:21:19', '2021-10-06 20:24:07'),
	(91, 'News', './tin-tuc', 'header', 0, 1, 0, 3, 1, 'us', '2020-05-22 05:21:40', '2020-05-22 05:21:40'),
	(92, 'Mua mã thẻ', '/card', 'footer', 73, 2, 0, 1, 1, 'vi', '2021-11-20 11:59:32', '2021-11-20 11:59:32'),
	(93, 'Đổi thẻ cào', '/doithecao', 'footer', 73, 2, 0, 2, 1, 'vi', '2021-11-20 12:00:27', '2021-11-20 12:00:27'),
	(94, 'Nạp topup', '/recharge', 'footer', 73, 2, 0, 3, 1, 'vi', '2021-11-20 12:00:52', '2021-11-20 12:00:52'),
	(95, 'Tin tức', '/news', 'footer', 74, 2, 0, 1, 1, 'vi', '2021-11-20 12:02:05', '2021-11-20 12:02:05'),
	(96, 'Kết nối API', '/merchant/list', 'footer', 74, 2, 0, 2, 1, 'vi', '2021-11-20 12:02:50', '2021-11-20 12:02:50'),
	(97, 'Bảo mật', '/account/security', 'footer', 74, 2, 0, 2, 1, 'vi', '2021-11-20 12:03:29', '2021-11-20 12:03:29'),
	(98, 'Ngân hàng ACB', 'ngan-hang-acb', 'header', 0, 1, 0, 1, 1, 'us', '2022-05-07 01:25:49', '2022-05-07 01:25:49'),
	(99, 'Menu 123123123', 'menu-123123123', 'header', 0, 1, 0, 1, 1, 'us', '2022-05-07 01:26:38', '2022-05-07 01:26:38');

-- Dumping structure for table bootphp.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bootphp.migrations: ~6 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2020_03_01_035751_create_permission_tables', 2),
	(5, '2014_10_12_100000_create_products_table', 3),
	(6, '2014_10_12_100000_create_ztests_table', 4);

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
INSERT INTO `news` (`id`, `title`, `news_slug`, `meta`, `short_description`, `description`, `author`, `author_email`, `image`, `language`, `custom_layout`, `view_count`, `status`, `cats`, `publish_date`, `created_at`, `updated_at`) VALUES
	(1, 'Thông báo phân phối thẻ Carot trên hệ thống', 'thong-bao-phan-phoi-the-carot-tren-he-thong', '{"title":null,"description":null,"keyword":null}', 'Chúng tôi trân trọng thông báo, cung cấp thẻ carot của Teamobi với chiết khấu lên đến 19%.', '<p><strong>Thẻ Carot</strong>&nbsp;là loại&nbsp;<strong>thẻ</strong>&nbsp;được Teamobi phát hành, và được sử dụng để&nbsp;<strong>nạp</strong>&nbsp;vào các tựa&nbsp;<strong>game</strong>&nbsp;của NPH này bao gồm:&nbsp;<strong>Game</strong>&nbsp;Avatar,&nbsp;<strong>Game</strong>&nbsp;Gomobi,&nbsp;<strong>Game</strong>&nbsp;Army 2,&nbsp;<strong>Game</strong>&nbsp;Army 3,&nbsp;<strong>Game</strong>&nbsp;Khí Phách Anh Hùng,&nbsp;<strong>Game</strong>&nbsp;Ninja School online,&nbsp;<strong>Game</strong>&nbsp;Ngọc Rồng Online,&nbsp;<strong>Game</strong>&nbsp;Hiệp sĩ Online,&nbsp;<strong>Game</strong>&nbsp;Avatar Musik....</p>', 'God Admin', 'support@nencer.com', '/storage/userfiles/images/news/thecarot.jpg', 'vi', NULL, 4, 1, 2, NULL, '2022-03-14 12:04:14', '2022-04-22 13:36:34'),
	(2, 'Thông báo phân phối thẻ Gosu trên hệ thống', 'thong-bao-phan-phoi-the-gosu-tren-he-thong', '{"title":null,"description":null,"keyword":null}', 'Chúng tôi trân trọng thông báo, cung cấp thẻ Gosu với chiết khấu hấp dẫn', '<p>Nhà phát hành Gosu với loạt game nhập vai kiếm hiệp đình đám như MT Tam Quốc, Thần Long Tam Quốc, Thiên Long Vô Song, Cửu Âm Chân Kinh, Hàng Long Phục Hổ, Huyết Đao Tiền Truyện, Ngạo Kiếm Vô Song,...và còn nhiều tựa game khác được phát hành bởi nhà phát hành Gosu.</p>\r\n\r\n<p>Trân trọng kính báo!</p>', 'God Admin', 'support@nencer.com', '/storage/userfiles/images/news/thegosu.jpg', 'vi', NULL, 1, 1, 2, NULL, '2022-03-14 12:33:50', '2022-03-14 12:42:42');

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
INSERT INTO `news_cats` (`id`, `name`, `url_key`, `description`, `parent_id`, `sort`, `level`, `image`, `lang`, `_lft`, `_rgt`, `status`, `created_at`, `updated_at`) VALUES
	(2, 'Thông báo', 'thong-bao', NULL, NULL, 0, 1, NULL, 'vi', 1, 2, 1, '2020-11-03 22:32:54', '2022-03-14 12:34:39'),
	(9, 'Hướng dẫn', 'huong-dan', '<p>Chuyên trang dạy nấu ăn ngon</p>', NULL, 1, NULL, '/storage/userfiles/images/sliders/cityfoods_fav.png', 'vi', 3, 4, 1, '2021-07-12 05:44:02', '2021-08-09 14:32:45');

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
INSERT INTO `pages` (`id`, `title`, `slug`, `meta`, `image`, `status`, `description`, `html_description`, `language`, `created_at`, `updated_at`) VALUES
	(1, 'Điểu khoản sử dụng3', 'dieu-khoan-su-dung3', '{"title":"23423","description":"4234","keyword":"23423434"}', NULL, 1, '<p>&nbsp;rwerwe wer we rêr wwwwwwwwwwwwwwwwwwwww</p>', 'sấdasdasđfdf', 'us', '2019-08-30 08:36:22', '2022-05-11 04:49:09'),
	(2, 'Bán thẻ game, thẻ điện thoại, đổi thẻ cào, nạp cước', 'ban-the-game-the-dien-thoai-doi-the-cao-nap-cuoc', NULL, NULL, 1, '<p>23423423423423</p>', '32423 4234 23', 'vi', '2020-05-11 04:49:22', '2020-05-11 04:49:22');

-- Dumping structure for table bootphp.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bootphp.password_resets: ~0 rows (approximately)

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
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'list', 'web', NULL, '2020-03-01 10:13:09', '2020-03-01 10:13:15'),
	(2, 'create', 'web', NULL, NULL, NULL),
	(3, 'edit', 'web', NULL, NULL, NULL),
	(4, 'delete', 'web', NULL, NULL, NULL),
	(5, 'view', 'web', NULL, NULL, NULL);

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
INSERT INTO `seo` (`id`, `link`, `meta`, `image`, `lang`, `created_at`, `updated_at`) VALUES
	(1, '/', '{"title":"Mua b\\u00e1n th\\u1ebb \\u0111i\\u1ec7n tho\\u1ea1i, th\\u1ebb game, n\\u1ea1p ti\\u1ec1n topup","description":"\\u0110\\u1ea1i l\\u00fd th\\u1ebb \\u0111i\\u1ec7n tho\\u1ea1i Viettel, Vinaphone, Mobifone, th\\u1ebb game online Pubg, zing, Vcoin, Gate, Carot, Garena, V\\u00f5 l\\u00e2m, li\\u00ean qu\\u00e2n mobile.","keyword":"th\\u1ebb \\u0111i\\u1ec7n tho\\u1ea1i Viettel, Vinaphone, Mobifone, th\\u1ebb game online Pubg, zing, Vcoin, Gate, Carot, Garena, V\\u00f5 l\\u00e2m, li\\u00ean qu\\u00e2n"}', '/storage/userfiles/images/a.jpg', 'vi', '2020-05-15 13:03:24', '2020-05-15 14:19:28'),
	(15, '/mtopup', '{"title":"N\\u1ea1p ti\\u1ec1n \\u0111i\\u1ec7n tho\\u1ea1i, topup gi\\u00e1 r\\u1ebb","description":"N\\u1ea1p ti\\u1ec1n \\u0111i\\u1ec7n tho\\u1ea1i, topup gi\\u00e1 r\\u1ebb","keyword":"N\\u1ea1p ti\\u1ec1n \\u0111i\\u1ec7n tho\\u1ea1i, topup gi\\u00e1 r\\u1ebb"}', NULL, 'vi', '2020-05-15 14:25:25', '2020-05-15 14:25:25'),
	(16, '/admincp', '{"title":"THI\\u1ebeT K\\u1ebe WEBSITE TH\\u00d4NG MINH, \\u1ee8NG D\\u1ee4NG DI \\u0110\\u1ed8NG - NENCER","description":"THI\\u1ebeT K\\u1ebe WEBSITE TH\\u00d4NG MINH, \\u1ee8NG D\\u1ee4NG DI \\u0110\\u1ed8NG - NENCER","keyword":"THI\\u1ebeT K\\u1ebe WEBSITE TH\\u00d4NG MINH, \\u1ee8NG D\\u1ee4NG DI \\u0110\\u1ed8NG - NENCER"}', NULL, 'us', '2022-05-11 06:32:55', '2022-05-11 06:32:55');

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
INSERT INTO `settings` (`id`, `key`, `value`, `type`, `created_at`, `updated_at`) VALUES
	(1, 'favicon', '/storage/userfiles/images/nencer-fav.png', 'primary', NULL, '2020-05-15 12:50:21'),
	(2, 'backendlogo', '/storage/userfiles/images/nencer-logo-gray.png', 'primary', NULL, '2020-05-15 12:50:21'),
	(3, 'logo', '/storage/userfiles/images/nencer-logo.png', 'primary', NULL, '2020-05-15 12:50:21'),
	(4, 'company_shortname', 'NENCER JSC.,', 'primary', NULL, '2021-11-20 12:09:11'),
	(5, 'company_description', 'Đại lý thẻ điện thoại, thẻ game trực tuyến, nạp tiền điện thoại. Thanh toán tự động, nhanh chóng và uy tín.', 'primary', NULL, '2021-11-20 12:09:11'),
	(6, 'language', 'us', 'primary', NULL, '2022-05-07 04:58:41'),
	(7, 'phone', '09454545455', 'primary', NULL, '2020-05-15 07:46:35'),
	(8, 'twitter', 'fb.com/admin', 'primary', NULL, '2019-09-22 15:48:51'),
	(9, 'email', 'nguyennghia@nencer.net', 'primary', NULL, '2020-05-15 07:46:35'),
	(10, 'facebook', 'fb.com/admin', 'primary', NULL, '2019-09-22 15:48:51'),
	(11, 'company_name', 'CÔNG TY PHẦN MỀM NENCER JSC', 'primary', NULL, '2022-05-07 04:58:50'),
	(12, 'hotline', '1900 1565', 'primary', NULL, '2020-05-15 07:46:35'),
	(15, 'copyright', 'Software by Nencer Jsc.,', 'primary', NULL, '2020-05-15 07:48:17'),
	(16, 'timezone', 'Asia/Ho_Chi_Minh', 'primary', NULL, '2020-05-15 07:47:56'),
	(18, 'websitestatus', 'ONLINE', 'primary', NULL, '2020-05-15 07:46:35'),
	(19, 'company_address', '35/45 Tran Thai Tong, Cau Giay, Ha Noi', 'primary', '2018-08-19 13:53:44', '2020-04-28 00:48:39'),
	(21, 'default_user_group', '2', 'primary', '2018-08-19 14:06:25', '2020-04-06 14:16:28'),
	(24, 'fronttemplate', 'default', 'primary', NULL, '2020-04-27 14:17:43'),
	(25, 'offline_mes', 'N/A', 'primary', NULL, '2020-05-15 07:16:00'),
	(26, 'youtube', 'https://www.youtube.com/watch?v=neCmEbI2VWg', 'primary', NULL, '2019-09-22 15:48:51'),
	(27, 'globalpopup', '1', 'primary', NULL, '2022-03-20 11:41:21'),
	(28, 'globalpopup_mes', '<p>Để đảm bảo an toàn&nbsp;cho tài khoản web khuyến nghị nên cài đặt bảo mật bằng MK có chữ viết hoa và số .</p>\r\n\r\n<p>Hỗ trợ quên thông tin tài khoản&nbsp;<strong>Liên Hệ FACEBOOK</strong>&nbsp;<br />\r\nCú pháp lấy lại MK : "NC MK" gửi 8077<br />\r\nCú pháp lấy lại MKC2 : "NC MKC2" gửi 8077</p>\r\n\r\n<p><strong>Các tài khoản nạp tiền từ TSR, ATM, MOMO&nbsp;vào&nbsp;</strong><strong>để rửa tiền, lợi dụng nhận tiền, lừa đảo,&nbsp;cờ bạc sẽ bị khóa v.v</strong></p>\r\n\r\n<p>Bán các loại thẻ điện thoại, thẻ game, thẻ carot,v.v cam kết giá luôn ưu đãi nhất thị trường.<br />\r\n<br />\r\n<strong>Đăng Ký&nbsp;Đại Lý, Đối Tác Miễn Phí Nhanh Gọn&nbsp;hợp tác lâu dài .</strong></p>', 'primary', NULL, '2022-03-21 12:55:25'),
	(30, 'google_analytic_id', 'U321312323', 'primary', NULL, '2020-05-15 07:57:26'),
	(31, 'header_js', NULL, 'primary', NULL, '2020-05-15 07:57:51'),
	(32, 'footer_js', NULL, 'primary', NULL, '2020-05-15 07:57:51'),
	(55, 'telegram', '5454444', 'primary', '2020-05-15 06:21:55', '2020-05-15 08:03:41'),
	(67, 'facebook_id', '123456 32435445', 'custom', '2022-05-07 05:30:47', '2022-05-07 05:33:31');

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
INSERT INTO `sliders` (`id`, `slider_name`, `slider_image`, `slider_text`, `slider_url`, `slider_btn_text`, `slider_btn_url`, `sort_order`, `status`, `app`, `lang`, `created_at`, `updated_at`) VALUES
	(7, 'Giao diện BlueZim - Mùa đông xanh', '/storage/userfiles/images/slider/bannerb.jpg', 'Cho rằng VEC không phối hợp giải quyết vướng mắc sau thông xe cao tốc, Quảng Ngãi cảnh báo Bộ Giao thông khả năng người dân chặn đường.', NULL, 'Mua ngay', '#', 2, 0, 1, 'us', '2018-10-05 17:57:39', '2022-03-15 12:39:58'),
	(8, 'Đổi thẻ cào', '/storage/userfiles/images/slider/doithecao.png', 'Nạp ƯU ĐÃI trả trước, trả sau Vinaphone, Mobifone, Viettel chiết khấu từ 15-20% sau 10 phút sẽ thành công (không có khuyến mãi).', NULL, 'Nạp ngay', NULL, 2, 0, 1, 'vi', '2018-10-19 15:36:17', '2022-03-15 12:40:15');

-- Dumping structure for table bootphp.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_admin` int(11) DEFAULT NULL,
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
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `gender`, `avatar`, `group`, `tmp`, `tmp_token`, `parent_id`, `credits`, `credits_enc`, `currency_code`, `language`, `twofactor`, `twofactor_secret`, `ref`, `status`, `birthday`, `created_at`, `updated_at`) VALUES
	(1, 'Nguyen', 'Nghia', 'support@nencer.com', NULL, 1, NULL, '$2y$10$fhFgzGTdBpUlCu.iH8F/4.t4KkZlOsIMdGQCdbrgFbgDQfDSG6EiW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-02-29 14:07:49', '2020-02-29 14:07:49'),
	(2, '', '', 'hotronet@gmail.com', NULL, NULL, NULL, '$2y$10$7tonzQ.wyvrHuLDmuYRC/eE36.tgAB4Fy19m7iospMPSh7/0/FH0u', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-03-01 03:41:31', '2020-03-01 03:41:31'),
	(3, '', '', 'kythuat@gmail.com', NULL, NULL, NULL, '$2y$10$bQTnKqnE48oKWUsqv5GgAO5FFslbLm4yFiBL5er46b/IPYKnJZ0Ja', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-12-04 00:22:08', '2021-12-04 00:22:08');

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
INSERT INTO `user_groups` (`id`, `name`, `description`, `status`, `hideit`, `created_at`, `updated_at`) VALUES
	(1, 'Guest', 'Không phải thành viên', 1, 1, '2018-07-24 07:08:28', '2018-08-17 12:16:32'),
	(2, 'Thành viên', 'Thành viên', 1, 1, '2018-07-24 07:08:23', '2018-08-17 12:15:29'),
	(3, 'Đại lý', 'Đại lý', 1, 0, '2018-08-17 12:14:46', '2019-03-04 18:01:41');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
