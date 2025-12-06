-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table kamagra.admins
DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.admin_password_resets
DROP TABLE IF EXISTS `admin_password_resets`;
CREATE TABLE IF NOT EXISTS `admin_password_resets` (
  `email` varchar(100) NOT NULL,
  `token` varchar(190) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `admin_password_resets_email_index` (`email`),
  KEY `admin_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.applicant_messages
DROP TABLE IF EXISTS `applicant_messages`;
CREATE TABLE IF NOT EXISTS `applicant_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(150) DEFAULT NULL,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `to_email` varchar(100) DEFAULT NULL,
  `to_name` varchar(100) DEFAULT NULL,
  `from_name` varchar(100) DEFAULT NULL,
  `from_email` varchar(100) DEFAULT NULL,
  `from_phone` varchar(20) DEFAULT NULL,
  `message_txt` mediumtext DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.blogs
DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cate_id` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `featured` enum('1','0') DEFAULT '0',
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `lang` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `meta_keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `meta_descriptions` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.blog_categories
DROP TABLE IF EXISTS `blog_categories`;
CREATE TABLE IF NOT EXISTS `blog_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.career_levels
DROP TABLE IF EXISTS `career_levels`;
CREATE TABLE IF NOT EXISTS `career_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `career_level_id` int(11) DEFAULT 0,
  `career_level` varchar(200) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(5) DEFAULT 99999,
  `lang` varchar(10) DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.cities
DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) DEFAULT 0,
  `city` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL,
  `is_default` int(1) DEFAULT 0,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 9999,
  `lang` varchar(10) NOT NULL DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48666 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.cms
DROP TABLE IF EXISTS `cms`;
CREATE TABLE IF NOT EXISTS `cms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_slug` varchar(250) DEFAULT NULL,
  `show_in_top_menu` tinyint(1) DEFAULT 0,
  `show_in_footer_menu` tinyint(1) DEFAULT 0,
  `seo_title` text DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` text DEFAULT NULL,
  `seo_other` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.cms_content
DROP TABLE IF EXISTS `cms_content`;
CREATE TABLE IF NOT EXISTS `cms_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT NULL,
  `page_title` text DEFAULT NULL,
  `page_content` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `lang` varchar(10) DEFAULT 'en',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.columns_priv
DROP TABLE IF EXISTS `columns_priv`;
CREATE TABLE IF NOT EXISTS `columns_priv` (
  `Host` char(60) NOT NULL DEFAULT '',
  `Db` char(64) NOT NULL DEFAULT '',
  `User` char(80) NOT NULL DEFAULT '',
  `Table_name` char(64) NOT NULL DEFAULT '',
  `Column_name` char(64) NOT NULL DEFAULT '',
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Column_priv` set('Select','Insert','Update','References') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`Host`,`Db`,`User`,`Table_name`,`Column_name`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='Column privileges';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.column_stats
DROP TABLE IF EXISTS `column_stats`;
CREATE TABLE IF NOT EXISTS `column_stats` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `column_name` varchar(64) NOT NULL,
  `min_value` varbinary(255) DEFAULT NULL,
  `max_value` varbinary(255) DEFAULT NULL,
  `nulls_ratio` decimal(12,4) DEFAULT NULL,
  `avg_length` decimal(12,4) DEFAULT NULL,
  `avg_frequency` decimal(12,4) DEFAULT NULL,
  `hist_size` tinyint(3) unsigned DEFAULT NULL,
  `hist_type` enum('SINGLE_PREC_HB','DOUBLE_PREC_HB') DEFAULT NULL,
  `histogram` varbinary(255) DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`,`column_name`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=0 COMMENT='Statistics on Columns';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.companies
DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(155) DEFAULT NULL,
  `company_type` varchar(255) NOT NULL DEFAULT 'company',
  `gst` varchar(255) DEFAULT NULL,
  `cin` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ceo` varchar(60) DEFAULT NULL,
  `industry_id` int(11) DEFAULT 0,
  `ownership_type_id` int(11) DEFAULT 0,
  `description` mediumtext DEFAULT NULL,
  `location` varchar(155) DEFAULT NULL,
  `no_of_offices` int(11) DEFAULT NULL,
  `website` varchar(155) DEFAULT NULL,
  `no_of_employees` varchar(15) DEFAULT NULL,
  `established_in` varchar(12) DEFAULT NULL,
  `turnover` varchar(255) DEFAULT '0',
  `fax` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `logo` varchar(155) DEFAULT NULL,
  `country_id` int(11) DEFAULT 0,
  `state_id` int(11) DEFAULT 0,
  `city_id` int(11) DEFAULT 0,
  `slug` varchar(155) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `is_featured` tinyint(1) DEFAULT 0,
  `verified` tinyint(1) DEFAULT 0,
  `verification_token` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `map` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `facebook` varchar(250) DEFAULT NULL,
  `twitter` varchar(250) DEFAULT NULL,
  `linkedin` varchar(250) DEFAULT NULL,
  `google_plus` varchar(250) DEFAULT NULL,
  `pinterest` varchar(250) DEFAULT NULL,
  `package_id` int(11) DEFAULT 0,
  `package_start_date` timestamp NULL DEFAULT NULL,
  `package_end_date` timestamp NULL DEFAULT NULL,
  `jobs_quota` int(5) DEFAULT 0,
  `availed_jobs_quota` int(5) DEFAULT 0,
  `is_subscribed` tinyint(1) DEFAULT 1,
  `cvs_package_id` int(11) DEFAULT NULL,
  `cvs_package_start_date` timestamp NULL DEFAULT NULL,
  `cvs_package_end_date` timestamp NULL DEFAULT NULL,
  `cvs_quota` int(11) DEFAULT NULL,
  `availed_cvs_quota` int(11) DEFAULT NULL,
  `availed_cvs_ids` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=280 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.company_feedbacks
DROP TABLE IF EXISTS `company_feedbacks`;
CREATE TABLE IF NOT EXISTS `company_feedbacks` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `company_id` int(50) DEFAULT NULL,
  `job_id` int(11) NOT NULL,
  `seeker_id` int(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `feedback_value` text NOT NULL,
  `status` int(50) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.company_messages
DROP TABLE IF EXISTS `company_messages`;
CREATE TABLE IF NOT EXISTS `company_messages` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `company_id` int(50) DEFAULT NULL,
  `seeker_id` int(50) DEFAULT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` enum('viewed','unviewed') NOT NULL DEFAULT 'unviewed',
  `type` enum('message','reply') DEFAULT 'message',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.company_password_resets
DROP TABLE IF EXISTS `company_password_resets`;
CREATE TABLE IF NOT EXISTS `company_password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.company_recommendations
DROP TABLE IF EXISTS `company_recommendations`;
CREATE TABLE IF NOT EXISTS `company_recommendations` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `company_id` int(50) DEFAULT NULL,
  `seeker_id` int(50) DEFAULT NULL,
  `recommendation_message` text DEFAULT NULL,
  `status` int(50) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.contact_messages
DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message_txt` mediumtext DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.countries
DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT 0,
  `country` varchar(150) DEFAULT NULL,
  `nationality` varchar(150) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 0,
  `sort_order` int(11) DEFAULT 9999,
  `lang` varchar(10) DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=985 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.countries_details
DROP TABLE IF EXISTS `countries_details`;
CREATE TABLE IF NOT EXISTS `countries_details` (
  `id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT 0,
  `sort_name` varchar(5) NOT NULL,
  `phone_code` int(7) NOT NULL,
  `currency` varchar(60) DEFAULT NULL,
  `code` varchar(7) DEFAULT NULL,
  `symbol` varchar(7) DEFAULT NULL,
  `thousand_separator` varchar(2) DEFAULT NULL,
  `decimal_separator` varchar(2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.db
DROP TABLE IF EXISTS `db`;
CREATE TABLE IF NOT EXISTS `db` (
  `Host` char(60) NOT NULL DEFAULT '',
  `Db` char(64) NOT NULL DEFAULT '',
  `User` char(80) NOT NULL DEFAULT '',
  `Select_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Insert_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Update_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Delete_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Create_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Drop_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Grant_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `References_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Index_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Alter_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Create_tmp_table_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Lock_tables_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Create_view_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Show_view_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Create_routine_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Alter_routine_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Execute_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Event_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Trigger_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Delete_history_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`Host`,`Db`,`User`),
  KEY `User` (`User`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='Database privileges';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.degree_levels
DROP TABLE IF EXISTS `degree_levels`;
CREATE TABLE IF NOT EXISTS `degree_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `degree_level_id` int(11) DEFAULT 0,
  `degree_level` varchar(200) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(5) DEFAULT 99999,
  `lang` varchar(10) DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.degree_types
DROP TABLE IF EXISTS `degree_types`;
CREATE TABLE IF NOT EXISTS `degree_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `degree_level_id` int(11) DEFAULT 0,
  `degree_type_id` int(11) DEFAULT 0,
  `degree_type` varchar(200) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(5) DEFAULT 99999,
  `lang` varchar(10) DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=734 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.event
DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `db` char(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `name` char(64) NOT NULL DEFAULT '',
  `body` longblob NOT NULL,
  `definer` char(141) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `execute_at` datetime DEFAULT NULL,
  `interval_value` int(11) DEFAULT NULL,
  `interval_field` enum('YEAR','QUARTER','MONTH','DAY','HOUR','MINUTE','WEEK','SECOND','MICROSECOND','YEAR_MONTH','DAY_HOUR','DAY_MINUTE','DAY_SECOND','HOUR_MINUTE','HOUR_SECOND','MINUTE_SECOND','DAY_MICROSECOND','HOUR_MICROSECOND','MINUTE_MICROSECOND','SECOND_MICROSECOND') DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_executed` datetime DEFAULT NULL,
  `starts` datetime DEFAULT NULL,
  `ends` datetime DEFAULT NULL,
  `status` enum('ENABLED','DISABLED','SLAVESIDE_DISABLED') NOT NULL DEFAULT 'ENABLED',
  `on_completion` enum('DROP','PRESERVE') NOT NULL DEFAULT 'DROP',
  `sql_mode` set('REAL_AS_FLOAT','PIPES_AS_CONCAT','ANSI_QUOTES','IGNORE_SPACE','IGNORE_BAD_TABLE_OPTIONS','ONLY_FULL_GROUP_BY','NO_UNSIGNED_SUBTRACTION','NO_DIR_IN_CREATE','POSTGRESQL','ORACLE','MSSQL','DB2','MAXDB','NO_KEY_OPTIONS','NO_TABLE_OPTIONS','NO_FIELD_OPTIONS','MYSQL323','MYSQL40','ANSI','NO_AUTO_VALUE_ON_ZERO','NO_BACKSLASH_ESCAPES','STRICT_TRANS_TABLES','STRICT_ALL_TABLES','NO_ZERO_IN_DATE','NO_ZERO_DATE','INVALID_DATES','ERROR_FOR_DIVISION_BY_ZERO','TRADITIONAL','NO_AUTO_CREATE_USER','HIGH_NOT_PRECEDENCE','NO_ENGINE_SUBSTITUTION','PAD_CHAR_TO_FULL_LENGTH','EMPTY_STRING_IS_NULL','SIMULTANEOUS_ASSIGNMENT','TIME_ROUND_FRACTIONAL') NOT NULL DEFAULT '',
  `comment` char(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `originator` int(10) unsigned NOT NULL,
  `time_zone` char(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'SYSTEM',
  `character_set_client` char(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `collation_connection` char(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `db_collation` char(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `body_utf8` longblob DEFAULT NULL,
  PRIMARY KEY (`db`,`name`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='Events';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.faqs
DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_question` mediumtext DEFAULT NULL,
  `faq_answer` mediumtext DEFAULT NULL,
  `sort_order` int(5) DEFAULT 99999,
  `lang` varchar(10) DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.favourites_company
DROP TABLE IF EXISTS `favourites_company`;
CREATE TABLE IF NOT EXISTS `favourites_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `company_slug` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.favourites_job
DROP TABLE IF EXISTS `favourites_job`;
CREATE TABLE IF NOT EXISTS `favourites_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `job_slug` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.favourite_applicants
DROP TABLE IF EXISTS `favourite_applicants`;
CREATE TABLE IF NOT EXISTS `favourite_applicants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.func
DROP TABLE IF EXISTS `func`;
CREATE TABLE IF NOT EXISTS `func` (
  `name` char(64) NOT NULL DEFAULT '',
  `ret` tinyint(1) NOT NULL DEFAULT 0,
  `dl` char(128) NOT NULL DEFAULT '',
  `type` enum('function','aggregate') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='User defined functions';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.functional_areas
DROP TABLE IF EXISTS `functional_areas`;
CREATE TABLE IF NOT EXISTS `functional_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `functional_area_id` int(11) DEFAULT 0,
  `functional_area` varchar(200) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(5) DEFAULT 99999,
  `lang` varchar(10) DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=597 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.genders
DROP TABLE IF EXISTS `genders`;
CREATE TABLE IF NOT EXISTS `genders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gender_id` int(11) DEFAULT 0,
  `gender` varchar(30) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(5) DEFAULT 99999,
  `lang` varchar(10) DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.general_log
DROP TABLE IF EXISTS `general_log`;
CREATE TABLE IF NOT EXISTS `general_log` (
  `event_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `user_host` mediumtext NOT NULL,
  `thread_id` bigint(21) unsigned NOT NULL,
  `server_id` int(10) unsigned NOT NULL,
  `command_type` varchar(64) NOT NULL,
  `argument` mediumtext NOT NULL
) ENGINE=CSV DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='General log';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.global_priv
DROP TABLE IF EXISTS `global_priv`;
CREATE TABLE IF NOT EXISTS `global_priv` (
  `Host` char(60) NOT NULL DEFAULT '',
  `User` char(80) NOT NULL DEFAULT '',
  `Priv` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '{}' CHECK (json_valid(`Priv`)),
  PRIMARY KEY (`Host`,`User`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='Users and global privileges';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.gtid_slave_pos
DROP TABLE IF EXISTS `gtid_slave_pos`;
CREATE TABLE IF NOT EXISTS `gtid_slave_pos` (
  `domain_id` int(10) unsigned NOT NULL,
  `sub_id` bigint(20) unsigned NOT NULL,
  `server_id` int(10) unsigned NOT NULL,
  `seq_no` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`domain_id`,`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Replication slave GTID position';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.help_category
DROP TABLE IF EXISTS `help_category`;
CREATE TABLE IF NOT EXISTS `help_category` (
  `help_category_id` smallint(5) unsigned NOT NULL,
  `name` char(64) NOT NULL,
  `parent_category_id` smallint(5) unsigned DEFAULT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`help_category_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci PAGE_CHECKSUM=1 TRANSACTIONAL=0 COMMENT='help categories';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.help_keyword
DROP TABLE IF EXISTS `help_keyword`;
CREATE TABLE IF NOT EXISTS `help_keyword` (
  `help_keyword_id` int(10) unsigned NOT NULL,
  `name` char(64) NOT NULL,
  PRIMARY KEY (`help_keyword_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci PAGE_CHECKSUM=1 TRANSACTIONAL=0 COMMENT='help keywords';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.help_relation
DROP TABLE IF EXISTS `help_relation`;
CREATE TABLE IF NOT EXISTS `help_relation` (
  `help_topic_id` int(10) unsigned NOT NULL,
  `help_keyword_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`help_keyword_id`,`help_topic_id`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci PAGE_CHECKSUM=1 TRANSACTIONAL=0 COMMENT='keyword-topic relation';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.help_topic
DROP TABLE IF EXISTS `help_topic`;
CREATE TABLE IF NOT EXISTS `help_topic` (
  `help_topic_id` int(10) unsigned NOT NULL,
  `name` char(64) NOT NULL,
  `help_category_id` smallint(5) unsigned NOT NULL,
  `description` text NOT NULL,
  `example` text NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`help_topic_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci PAGE_CHECKSUM=1 TRANSACTIONAL=0 COMMENT='help topics';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.hobbys
DROP TABLE IF EXISTS `hobbys`;
CREATE TABLE IF NOT EXISTS `hobbys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hobbies` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.index_stats
DROP TABLE IF EXISTS `index_stats`;
CREATE TABLE IF NOT EXISTS `index_stats` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `index_name` varchar(64) NOT NULL,
  `prefix_arity` int(11) unsigned NOT NULL,
  `avg_frequency` decimal(12,4) DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`,`index_name`,`prefix_arity`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=0 COMMENT='Statistics on Indexes';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.industries
DROP TABLE IF EXISTS `industries`;
CREATE TABLE IF NOT EXISTS `industries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `industry_id` int(11) DEFAULT 0,
  `industry` varchar(150) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `sort_order` int(5) DEFAULT 99999,
  `lang` varchar(10) DEFAULT 'en',
  `is_default` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=237 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.innodb_index_stats
DROP TABLE IF EXISTS `innodb_index_stats`;
CREATE TABLE IF NOT EXISTS `innodb_index_stats` (
  `database_name` varchar(64) NOT NULL,
  `table_name` varchar(199) NOT NULL,
  `index_name` varchar(64) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stat_name` varchar(64) NOT NULL,
  `stat_value` bigint(20) unsigned NOT NULL,
  `sample_size` bigint(20) unsigned DEFAULT NULL,
  `stat_description` varchar(1024) NOT NULL,
  PRIMARY KEY (`database_name`,`table_name`,`index_name`,`stat_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin STATS_PERSISTENT=0;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.innodb_table_stats
DROP TABLE IF EXISTS `innodb_table_stats`;
CREATE TABLE IF NOT EXISTS `innodb_table_stats` (
  `database_name` varchar(64) NOT NULL,
  `table_name` varchar(199) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `n_rows` bigint(20) unsigned NOT NULL,
  `clustered_index_size` bigint(20) unsigned NOT NULL,
  `sum_of_other_index_sizes` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`database_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin STATS_PERSISTENT=0;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.jobs
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `benefits` text DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `is_freelance` tinyint(1) DEFAULT 0,
  `career_level_id` int(11) DEFAULT NULL,
  `salary_from` varchar(255) DEFAULT NULL,
  `salary_to` varchar(255) DEFAULT NULL,
  `hide_salary` tinyint(1) DEFAULT 0,
  `salary_currency` varchar(5) DEFAULT NULL,
  `salary_period_id` int(11) DEFAULT NULL,
  `functional_area_id` int(11) DEFAULT NULL,
  `job_type_id` int(11) DEFAULT NULL,
  `job_shift_id` int(11) DEFAULT NULL,
  `num_of_positions` int(3) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `expiry_date` timestamp NULL DEFAULT NULL,
  `degree_level_id` int(11) DEFAULT NULL,
  `job_experience_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `is_featured` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `search` text DEFAULT NULL,
  `slug` varchar(210) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `full_search` (`search`)
) ENGINE=InnoDB AUTO_INCREMENT=693 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.job_alerts
DROP TABLE IF EXISTS `job_alerts`;
CREATE TABLE IF NOT EXISTS `job_alerts` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `search_title` text DEFAULT NULL,
  `country_id` varchar(500) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `functional_area_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.job_apply
DROP TABLE IF EXISTS `job_apply`;
CREATE TABLE IF NOT EXISTS `job_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `cv_id` int(11) DEFAULT NULL,
  `current_salary` int(11) DEFAULT NULL,
  `expected_salary` int(11) DEFAULT NULL,
  `salary_currency` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.job_experiences
DROP TABLE IF EXISTS `job_experiences`;
CREATE TABLE IF NOT EXISTS `job_experiences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_experience_id` int(11) DEFAULT 0,
  `job_experience` varchar(200) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(5) DEFAULT 99999,
  `lang` varchar(10) DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.job_shifts
DROP TABLE IF EXISTS `job_shifts`;
CREATE TABLE IF NOT EXISTS `job_shifts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_shift_id` int(11) DEFAULT 0,
  `job_shift` varchar(200) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(5) DEFAULT 99999,
  `lang` varchar(10) DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.job_skills
DROP TABLE IF EXISTS `job_skills`;
CREATE TABLE IF NOT EXISTS `job_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_skill_id` int(11) DEFAULT 0,
  `job_skill` varchar(200) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(5) DEFAULT 99999,
  `lang` varchar(10) DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2402 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.job_titles
DROP TABLE IF EXISTS `job_titles`;
CREATE TABLE IF NOT EXISTS `job_titles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title_id` int(11) DEFAULT 0,
  `job_title` varchar(200) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(5) DEFAULT 99999,
  `lang` varchar(10) DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.job_types
DROP TABLE IF EXISTS `job_types`;
CREATE TABLE IF NOT EXISTS `job_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_type_id` int(11) DEFAULT 0,
  `job_type` varchar(200) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(5) DEFAULT 99999,
  `lang` varchar(10) DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.languages
DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` varchar(250) DEFAULT NULL,
  `native` varchar(250) DEFAULT NULL,
  `iso_code` varchar(10) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 0,
  `is_rtl` tinyint(1) NOT NULL DEFAULT 0,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.language_levels
DROP TABLE IF EXISTS `language_levels`;
CREATE TABLE IF NOT EXISTS `language_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_level_id` int(11) DEFAULT 0,
  `language_level` varchar(40) NOT NULL,
  `is_default` int(1) DEFAULT 0,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 9999,
  `lang` varchar(10) NOT NULL DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.major_subjects
DROP TABLE IF EXISTS `major_subjects`;
CREATE TABLE IF NOT EXISTS `major_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `major_subject_id` int(11) DEFAULT 0,
  `major_subject` varchar(200) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(5) DEFAULT 99999,
  `lang` varchar(10) DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1737 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.manage_job_skills
DROP TABLE IF EXISTS `manage_job_skills`;
CREATE TABLE IF NOT EXISTS `manage_job_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) DEFAULT 0,
  `job_skill_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5074 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.marital_statuses
DROP TABLE IF EXISTS `marital_statuses`;
CREATE TABLE IF NOT EXISTS `marital_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marital_status_id` int(11) DEFAULT 0,
  `marital_status` varchar(40) NOT NULL,
  `is_default` int(1) DEFAULT 0,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 9999,
  `lang` varchar(10) NOT NULL DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.ownership_types
DROP TABLE IF EXISTS `ownership_types`;
CREATE TABLE IF NOT EXISTS `ownership_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ownership_type_id` int(11) DEFAULT 0,
  `ownership_type` varchar(200) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(5) DEFAULT 99999,
  `lang` varchar(10) DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.packages
DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_title` varchar(150) DEFAULT NULL,
  `package_price` float(7,2) DEFAULT 0.00,
  `package_num_days` int(11) DEFAULT 0,
  `package_num_listings` int(11) DEFAULT 0,
  `package_for` enum('job_seeker','employer','cv_search') DEFAULT 'job_seeker',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.payu_transactions
DROP TABLE IF EXISTS `payu_transactions`;
CREATE TABLE IF NOT EXISTS `payu_transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `paid_for_id` bigint(20) unsigned DEFAULT NULL,
  `paid_for_type` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `gateway` text NOT NULL,
  `body` text NOT NULL,
  `destination` varchar(255) NOT NULL,
  `hash` text NOT NULL,
  `response` text DEFAULT NULL,
  `status` enum('pending','failed','successful','invalid') NOT NULL DEFAULT 'pending',
  `verified_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.plugin
DROP TABLE IF EXISTS `plugin`;
CREATE TABLE IF NOT EXISTS `plugin` (
  `name` varchar(64) NOT NULL DEFAULT '',
  `dl` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`name`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='MySQL plugins';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.proc
DROP TABLE IF EXISTS `proc`;
CREATE TABLE IF NOT EXISTS `proc` (
  `db` char(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `name` char(64) NOT NULL DEFAULT '',
  `type` enum('FUNCTION','PROCEDURE','PACKAGE','PACKAGE BODY') NOT NULL,
  `specific_name` char(64) NOT NULL DEFAULT '',
  `language` enum('SQL') NOT NULL DEFAULT 'SQL',
  `sql_data_access` enum('CONTAINS_SQL','NO_SQL','READS_SQL_DATA','MODIFIES_SQL_DATA') NOT NULL DEFAULT 'CONTAINS_SQL',
  `is_deterministic` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `security_type` enum('INVOKER','DEFINER') NOT NULL DEFAULT 'DEFINER',
  `param_list` blob NOT NULL,
  `returns` longblob NOT NULL,
  `body` longblob NOT NULL,
  `definer` char(141) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sql_mode` set('REAL_AS_FLOAT','PIPES_AS_CONCAT','ANSI_QUOTES','IGNORE_SPACE','IGNORE_BAD_TABLE_OPTIONS','ONLY_FULL_GROUP_BY','NO_UNSIGNED_SUBTRACTION','NO_DIR_IN_CREATE','POSTGRESQL','ORACLE','MSSQL','DB2','MAXDB','NO_KEY_OPTIONS','NO_TABLE_OPTIONS','NO_FIELD_OPTIONS','MYSQL323','MYSQL40','ANSI','NO_AUTO_VALUE_ON_ZERO','NO_BACKSLASH_ESCAPES','STRICT_TRANS_TABLES','STRICT_ALL_TABLES','NO_ZERO_IN_DATE','NO_ZERO_DATE','INVALID_DATES','ERROR_FOR_DIVISION_BY_ZERO','TRADITIONAL','NO_AUTO_CREATE_USER','HIGH_NOT_PRECEDENCE','NO_ENGINE_SUBSTITUTION','PAD_CHAR_TO_FULL_LENGTH','EMPTY_STRING_IS_NULL','SIMULTANEOUS_ASSIGNMENT','TIME_ROUND_FRACTIONAL') NOT NULL DEFAULT '',
  `comment` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `character_set_client` char(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `collation_connection` char(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `db_collation` char(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `body_utf8` longblob DEFAULT NULL,
  `aggregate` enum('NONE','GROUP') NOT NULL DEFAULT 'NONE',
  PRIMARY KEY (`db`,`name`,`type`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='Stored Procedures';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.procs_priv
DROP TABLE IF EXISTS `procs_priv`;
CREATE TABLE IF NOT EXISTS `procs_priv` (
  `Host` char(60) NOT NULL DEFAULT '',
  `Db` char(64) NOT NULL DEFAULT '',
  `User` char(80) NOT NULL DEFAULT '',
  `Routine_name` char(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `Routine_type` enum('FUNCTION','PROCEDURE','PACKAGE','PACKAGE BODY') NOT NULL,
  `Grantor` char(141) NOT NULL DEFAULT '',
  `Proc_priv` set('Execute','Alter Routine','Grant') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Host`,`Db`,`User`,`Routine_name`,`Routine_type`),
  KEY `Grantor` (`Grantor`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='Procedure privileges';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.profile_aboutme
DROP TABLE IF EXISTS `profile_aboutme`;
CREATE TABLE IF NOT EXISTS `profile_aboutme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `aboutme` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.profile_cvs
DROP TABLE IF EXISTS `profile_cvs`;
CREATE TABLE IF NOT EXISTS `profile_cvs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `cv_file` varchar(120) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.profile_educations
DROP TABLE IF EXISTS `profile_educations`;
CREATE TABLE IF NOT EXISTS `profile_educations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `degree_level_id` int(11) DEFAULT NULL,
  `degree_type_id` int(11) DEFAULT NULL,
  `degree_title` varchar(150) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `date_completion` varchar(15) DEFAULT NULL,
  `institution` varchar(150) DEFAULT NULL,
  `degree_result` varchar(20) DEFAULT NULL,
  `result_type_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.profile_education_major_subjects
DROP TABLE IF EXISTS `profile_education_major_subjects`;
CREATE TABLE IF NOT EXISTS `profile_education_major_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_education_id` int(11) DEFAULT NULL,
  `major_subject_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.profile_experiences
DROP TABLE IF EXISTS `profile_experiences`;
CREATE TABLE IF NOT EXISTS `profile_experiences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `company` varchar(120) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `date_start` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `date_end` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_currently_working` tinyint(1) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.profile_languages
DROP TABLE IF EXISTS `profile_languages`;
CREATE TABLE IF NOT EXISTS `profile_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `language_level_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.profile_projects
DROP TABLE IF EXISTS `profile_projects`;
CREATE TABLE IF NOT EXISTS `profile_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` varchar(120) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url` tinytext DEFAULT NULL,
  `date_start` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `date_end` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_on_going` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.profile_skills
DROP TABLE IF EXISTS `profile_skills`;
CREATE TABLE IF NOT EXISTS `profile_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `job_skill_id` int(11) DEFAULT NULL,
  `job_experience_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.profile_summaries
DROP TABLE IF EXISTS `profile_summaries`;
CREATE TABLE IF NOT EXISTS `profile_summaries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `summary` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.profile_views_count
DROP TABLE IF EXISTS `profile_views_count`;
CREATE TABLE IF NOT EXISTS `profile_views_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.proxies_priv
DROP TABLE IF EXISTS `proxies_priv`;
CREATE TABLE IF NOT EXISTS `proxies_priv` (
  `Host` char(60) NOT NULL DEFAULT '',
  `User` char(80) NOT NULL DEFAULT '',
  `Proxied_host` char(60) NOT NULL DEFAULT '',
  `Proxied_user` char(80) NOT NULL DEFAULT '',
  `With_grant` tinyint(1) NOT NULL DEFAULT 0,
  `Grantor` char(141) NOT NULL DEFAULT '',
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Host`,`User`,`Proxied_host`,`Proxied_user`),
  KEY `Grantor` (`Grantor`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='User proxy privileges';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.queue_jobs
DROP TABLE IF EXISTS `queue_jobs`;
CREATE TABLE IF NOT EXISTS `queue_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.report_abuse_company_messages
DROP TABLE IF EXISTS `report_abuse_company_messages`;
CREATE TABLE IF NOT EXISTS `report_abuse_company_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `your_name` varchar(100) DEFAULT NULL,
  `your_email` varchar(100) DEFAULT NULL,
  `company_url` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.report_abuse_messages
DROP TABLE IF EXISTS `report_abuse_messages`;
CREATE TABLE IF NOT EXISTS `report_abuse_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `your_name` varchar(100) DEFAULT NULL,
  `your_email` varchar(100) DEFAULT NULL,
  `job_url` tinytext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.result_types
DROP TABLE IF EXISTS `result_types`;
CREATE TABLE IF NOT EXISTS `result_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `result_type_id` int(11) DEFAULT 0,
  `result_type` varchar(40) NOT NULL,
  `is_default` int(1) DEFAULT 0,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 9999,
  `lang` varchar(10) NOT NULL DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `role_abbreviation` varchar(30) NOT NULL,
  `role_description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.roles_mapping
DROP TABLE IF EXISTS `roles_mapping`;
CREATE TABLE IF NOT EXISTS `roles_mapping` (
  `Host` char(60) NOT NULL DEFAULT '',
  `User` char(80) NOT NULL DEFAULT '',
  `Role` char(80) NOT NULL DEFAULT '',
  `Admin_option` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  UNIQUE KEY `Host` (`Host`,`User`,`Role`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='Granted roles';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.salary_periods
DROP TABLE IF EXISTS `salary_periods`;
CREATE TABLE IF NOT EXISTS `salary_periods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salary_period_id` int(11) DEFAULT 0,
  `salary_period` varchar(200) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(5) DEFAULT 99999,
  `lang` varchar(10) DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.scheduled_appointments
DROP TABLE IF EXISTS `scheduled_appointments`;
CREATE TABLE IF NOT EXISTS `scheduled_appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `scheduled_time` text DEFAULT NULL,
  `scheduled_date` timestamp NULL DEFAULT NULL,
  `is_active` int(11) DEFAULT 0,
  `is_decline` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.send_to_friend_messages
DROP TABLE IF EXISTS `send_to_friend_messages`;
CREATE TABLE IF NOT EXISTS `send_to_friend_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `your_name` varchar(100) DEFAULT NULL,
  `your_email` varchar(100) DEFAULT NULL,
  `job_url` mediumtext DEFAULT NULL,
  `friend_name` varchar(100) DEFAULT NULL,
  `friend_email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.seo
DROP TABLE IF EXISTS `seo`;
CREATE TABLE IF NOT EXISTS `seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` text DEFAULT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` text DEFAULT NULL,
  `seo_other` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.servers
DROP TABLE IF EXISTS `servers`;
CREATE TABLE IF NOT EXISTS `servers` (
  `Server_name` char(64) NOT NULL DEFAULT '',
  `Host` char(64) NOT NULL DEFAULT '',
  `Db` char(64) NOT NULL DEFAULT '',
  `Username` char(80) NOT NULL DEFAULT '',
  `Password` char(64) NOT NULL DEFAULT '',
  `Port` int(4) NOT NULL DEFAULT 0,
  `Socket` char(64) NOT NULL DEFAULT '',
  `Wrapper` char(64) NOT NULL DEFAULT '',
  `Owner` char(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`Server_name`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='MySQL Foreign Servers table';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.site_ads
DROP TABLE IF EXISTS `site_ads`;
CREATE TABLE IF NOT EXISTS `site_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adds_dropdown` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `image_url` varchar(250) DEFAULT NULL,
  `sitads_heading` varchar(255) NOT NULL,
  `siteads_description` varchar(255) DEFAULT NULL,
  `expiry_date` date NOT NULL DEFAULT current_timestamp(),
  `is_active` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.site_settings
DROP TABLE IF EXISTS `site_settings`;
CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(100) DEFAULT NULL,
  `site_slogan` varchar(150) DEFAULT NULL,
  `site_logo` varchar(100) DEFAULT NULL,
  `site_phone_primary` varchar(20) DEFAULT NULL,
  `site_phone_secondary` varchar(20) DEFAULT NULL,
  `default_country_id` int(11) DEFAULT NULL,
  `default_currency_code` varchar(4) DEFAULT NULL,
  `site_street_address` varchar(250) DEFAULT NULL,
  `site_google_map` mediumtext DEFAULT NULL,
  `mail_driver` enum('array','log','sparkpost','ses','mandrill','mailgun','sendmail','smtp','mail') DEFAULT 'smtp',
  `mail_host` varchar(100) DEFAULT NULL,
  `mail_port` int(5) DEFAULT NULL,
  `mail_from_address` varchar(100) DEFAULT NULL,
  `mail_from_name` varchar(100) DEFAULT NULL,
  `mail_to_address` varchar(100) DEFAULT NULL,
  `mail_to_name` varchar(100) DEFAULT NULL,
  `mail_encryption` varchar(10) DEFAULT NULL,
  `mail_username` varchar(100) DEFAULT NULL,
  `mail_password` varchar(100) DEFAULT NULL,
  `mail_sendmail` varchar(50) DEFAULT NULL,
  `mail_pretend` varchar(50) DEFAULT NULL,
  `mailgun_domain` varchar(100) DEFAULT NULL,
  `mailgun_secret` varchar(100) DEFAULT NULL,
  `mandrill_secret` varchar(100) DEFAULT NULL,
  `sparkpost_secret` varchar(100) DEFAULT NULL,
  `ses_key` varchar(100) DEFAULT NULL,
  `ses_secret` varchar(100) DEFAULT NULL,
  `ses_region` varchar(100) DEFAULT NULL,
  `facebook_address` text DEFAULT NULL,
  `twitter_address` text DEFAULT NULL,
  `google_plus_address` text DEFAULT NULL,
  `youtube_address` text DEFAULT NULL,
  `instagram_address` text DEFAULT NULL,
  `pinterest_address` text DEFAULT NULL,
  `linkedin_address` text DEFAULT NULL,
  `tumblr_address` text DEFAULT NULL,
  `flickr_address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `index_page_below_top_employes_ad` mediumtext DEFAULT NULL,
  `above_footer_ad` mediumtext DEFAULT NULL,
  `dashboard_page_ad` mediumtext DEFAULT NULL,
  `cms_page_ad` mediumtext DEFAULT NULL,
  `listing_page_vertical_ad` mediumtext DEFAULT NULL,
  `listing_page_horizontal_ad` mediumtext DEFAULT NULL,
  `nocaptcha_sitekey` varchar(150) DEFAULT NULL,
  `nocaptcha_secret` varchar(150) DEFAULT NULL,
  `facebook_app_id` varchar(150) DEFAULT NULL,
  `facebeek_app_secret` varchar(150) DEFAULT NULL,
  `google_app_id` varchar(150) DEFAULT NULL,
  `google_app_secret` varchar(150) DEFAULT NULL,
  `twitter_app_id` varchar(150) DEFAULT NULL,
  `twitter_app_secret` varchar(150) DEFAULT NULL,
  `paypal_account` varchar(250) DEFAULT NULL,
  `paypal_client_id` varchar(250) DEFAULT NULL,
  `paypal_secret` varchar(250) DEFAULT NULL,
  `paypal_live_sandbox` enum('live','sandbox') DEFAULT 'sandbox',
  `stripe_key` varchar(250) DEFAULT NULL,
  `stripe_secret` varchar(250) DEFAULT NULL,
  `bank_details` mediumtext DEFAULT NULL,
  `listing_age` int(3) NOT NULL DEFAULT 15,
  `country_specific_site` tinyint(1) DEFAULT 0,
  `is_paypal_active` tinyint(1) DEFAULT 1,
  `is_bank_transfer_active` tinyint(1) DEFAULT 1,
  `is_jobseeker_package_active` tinyint(1) NOT NULL DEFAULT 0,
  `is_stripe_active` tinyint(1) DEFAULT 1,
  `is_slider_active` tinyint(1) DEFAULT 0,
  `mailchimp_api_key` tinytext DEFAULT NULL,
  `mailchimp_list_name` tinytext DEFAULT NULL,
  `mailchimp_list_id` tinytext DEFAULT NULL,
  `is_company_package_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_payu_active` tinyint(1) DEFAULT 1,
  `payu_money_mode` varchar(255) DEFAULT NULL,
  `payu_money_key` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1273 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.sliders
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_id` int(11) DEFAULT 0,
  `slider_image` varchar(150) DEFAULT NULL,
  `slider_heading` varchar(250) DEFAULT NULL,
  `slider_description` tinytext DEFAULT NULL,
  `slider_link` tinytext DEFAULT NULL,
  `slider_link_text` varchar(100) DEFAULT NULL,
  `lang` varchar(10) DEFAULT 'en',
  `is_default` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `sort_order` int(5) DEFAULT 99999,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.slow_log
DROP TABLE IF EXISTS `slow_log`;
CREATE TABLE IF NOT EXISTS `slow_log` (
  `start_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `user_host` mediumtext NOT NULL,
  `query_time` time(6) NOT NULL,
  `lock_time` time(6) NOT NULL,
  `rows_sent` int(11) NOT NULL,
  `rows_examined` int(11) NOT NULL,
  `db` varchar(512) NOT NULL,
  `last_insert_id` int(11) NOT NULL,
  `insert_id` int(11) NOT NULL,
  `server_id` int(10) unsigned NOT NULL,
  `sql_text` mediumtext NOT NULL,
  `thread_id` bigint(21) unsigned NOT NULL,
  `rows_affected` int(11) NOT NULL
) ENGINE=CSV DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Slow log';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.states
DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) DEFAULT 0,
  `state` varchar(40) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT 1,
  `is_default` int(1) DEFAULT 0,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 9999,
  `lang` varchar(10) NOT NULL DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4122 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.subscriptions
DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=425 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.tables_priv
DROP TABLE IF EXISTS `tables_priv`;
CREATE TABLE IF NOT EXISTS `tables_priv` (
  `Host` char(60) NOT NULL DEFAULT '',
  `Db` char(64) NOT NULL DEFAULT '',
  `User` char(80) NOT NULL DEFAULT '',
  `Table_name` char(64) NOT NULL DEFAULT '',
  `Grantor` char(141) NOT NULL DEFAULT '',
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Table_priv` set('Select','Insert','Update','Delete','Create','Drop','Grant','References','Index','Alter','Create View','Show view','Trigger','Delete versioning rows') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `Column_priv` set('Select','Insert','Update','References') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`Host`,`Db`,`User`,`Table_name`),
  KEY `Grantor` (`Grantor`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='Table privileges';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.table_stats
DROP TABLE IF EXISTS `table_stats`;
CREATE TABLE IF NOT EXISTS `table_stats` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `cardinality` bigint(21) unsigned DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=0 COMMENT='Statistics on Tables';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.testimonials
DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `testimonial_id` int(11) DEFAULT 0,
  `testimonial_by` varchar(100) DEFAULT NULL,
  `testimonial` varchar(600) DEFAULT NULL,
  `company` varchar(150) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(5) DEFAULT 99999,
  `lang` varchar(10) DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.time_zone
DROP TABLE IF EXISTS `time_zone`;
CREATE TABLE IF NOT EXISTS `time_zone` (
  `Time_zone_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Use_leap_seconds` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`Time_zone_id`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='Time zones';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.time_zone_leap_second
DROP TABLE IF EXISTS `time_zone_leap_second`;
CREATE TABLE IF NOT EXISTS `time_zone_leap_second` (
  `Transition_time` bigint(20) NOT NULL,
  `Correction` int(11) NOT NULL,
  PRIMARY KEY (`Transition_time`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='Leap seconds information for time zones';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.time_zone_name
DROP TABLE IF EXISTS `time_zone_name`;
CREATE TABLE IF NOT EXISTS `time_zone_name` (
  `Name` char(64) NOT NULL,
  `Time_zone_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='Time zone names';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.time_zone_transition
DROP TABLE IF EXISTS `time_zone_transition`;
CREATE TABLE IF NOT EXISTS `time_zone_transition` (
  `Time_zone_id` int(10) unsigned NOT NULL,
  `Transition_time` bigint(20) NOT NULL,
  `Transition_type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Time_zone_id`,`Transition_time`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='Time zone transitions';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.time_zone_transition_type
DROP TABLE IF EXISTS `time_zone_transition_type`;
CREATE TABLE IF NOT EXISTS `time_zone_transition_type` (
  `Time_zone_id` int(10) unsigned NOT NULL,
  `Transition_type_id` int(10) unsigned NOT NULL,
  `Offset` int(11) NOT NULL DEFAULT 0,
  `Is_DST` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `Abbreviation` char(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`Time_zone_id`,`Transition_type_id`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='Time zone transition types';

-- Data exporting was unselected.

-- Dumping structure for table kamagra.transaction_registry
DROP TABLE IF EXISTS `transaction_registry`;
CREATE TABLE IF NOT EXISTS `transaction_registry` (
  `transaction_id` bigint(20) unsigned NOT NULL,
  `commit_id` bigint(20) unsigned NOT NULL,
  `begin_timestamp` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `commit_timestamp` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `isolation_level` enum('READ-UNCOMMITTED','READ-COMMITTED','REPEATABLE-READ','SERIALIZABLE') NOT NULL,
  PRIMARY KEY (`transaction_id`),
  UNIQUE KEY `commit_id` (`commit_id`),
  KEY `begin_timestamp` (`begin_timestamp`),
  KEY `commit_timestamp` (`commit_timestamp`,`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin STATS_PERSISTENT=0;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.unlocked_users
DROP TABLE IF EXISTS `unlocked_users`;
CREATE TABLE IF NOT EXISTS `unlocked_users` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `company_id` int(50) DEFAULT NULL,
  `unlocked_users_ids` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporting was unselected.

-- Dumping structure for view kamagra.user
DROP VIEW IF EXISTS `user`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `user` (
	`Host` CHAR(60) NOT NULL COLLATE 'utf8_bin',
	`User` CHAR(80) NOT NULL COLLATE 'utf8_bin',
	`Password` LONGTEXT NULL COLLATE 'utf8mb4_bin',
	`Select_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Insert_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Update_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Delete_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Create_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Drop_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Reload_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Shutdown_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Process_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`File_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Grant_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`References_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Index_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Alter_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Show_db_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Super_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Create_tmp_table_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Lock_tables_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Execute_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Repl_slave_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Repl_client_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Create_view_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Show_view_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Create_routine_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Alter_routine_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Create_user_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Event_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Trigger_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Create_tablespace_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`Delete_history_priv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`ssl_type` VARCHAR(9) NULL COLLATE 'utf8mb4_general_ci',
	`ssl_cipher` LONGTEXT NOT NULL COLLATE 'utf8mb4_bin',
	`x509_issuer` LONGTEXT NOT NULL COLLATE 'utf8mb4_bin',
	`x509_subject` LONGTEXT NOT NULL COLLATE 'utf8mb4_bin',
	`max_questions` BIGINT(20) UNSIGNED NOT NULL,
	`max_updates` BIGINT(20) UNSIGNED NOT NULL,
	`max_connections` BIGINT(20) UNSIGNED NOT NULL,
	`max_user_connections` BIGINT(21) NOT NULL,
	`plugin` LONGTEXT NOT NULL COLLATE 'utf8mb4_bin',
	`authentication_string` LONGTEXT NOT NULL COLLATE 'utf8mb4_bin',
	`password_expired` VARCHAR(1) NOT NULL COLLATE 'utf8mb4_general_ci',
	`is_role` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`default_role` LONGTEXT NOT NULL COLLATE 'utf8mb4_bin',
	`max_statement_time` DECIMAL(12,6) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for table kamagra.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender_id` int(2) DEFAULT NULL,
  `marital_status_id` int(2) DEFAULT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `national_id_card_number` varchar(100) DEFAULT NULL,
  `country_id` varchar(50) DEFAULT NULL,
  `state_id` varchar(50) DEFAULT NULL,
  `city_id` varchar(50) DEFAULT NULL,
  `pin_code` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile_num` varchar(25) DEFAULT NULL,
  `job_experience_id` int(2) DEFAULT NULL,
  `career_level_id` int(2) DEFAULT NULL,
  `industry_id` int(2) DEFAULT NULL,
  `functional_area_id` int(2) DEFAULT NULL,
  `current_salary` varchar(100) DEFAULT NULL,
  `expected_salary` varchar(100) DEFAULT NULL,
  `salary_currency` varchar(10) DEFAULT NULL,
  `street_address` tinytext DEFAULT NULL,
  `is_active` int(1) DEFAULT 0,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `verification_token` varchar(255) DEFAULT NULL,
  `provider` varchar(35) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `cover_image` varchar(100) DEFAULT NULL,
  `lang` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_immediate_available` tinyint(1) DEFAULT 1,
  `num_profile_views` int(11) DEFAULT 0,
  `package_id` int(11) DEFAULT 0,
  `package_start_date` timestamp NULL DEFAULT NULL,
  `package_end_date` timestamp NULL DEFAULT NULL,
  `jobs_quota` int(5) DEFAULT 0,
  `availed_jobs_quota` int(5) DEFAULT 0,
  `search` text DEFAULT NULL,
  `is_subscribed` tinyint(1) DEFAULT 1,
  `video_link` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  FULLTEXT KEY `full_search` (`search`)
) ENGINE=InnoDB AUTO_INCREMENT=352 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.user_messages
DROP TABLE IF EXISTS `user_messages`;
CREATE TABLE IF NOT EXISTS `user_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) DEFAULT NULL,
  `listing_title` varchar(150) DEFAULT NULL,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `to_email` varchar(100) DEFAULT NULL,
  `to_name` varchar(100) DEFAULT NULL,
  `from_name` varchar(100) DEFAULT NULL,
  `from_email` varchar(100) DEFAULT NULL,
  `from_phone` varchar(20) DEFAULT NULL,
  `message_txt` mediumtext DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.videos
DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) DEFAULT 0,
  `video_title` tinytext DEFAULT NULL,
  `video_text` text DEFAULT NULL,
  `video_link` text DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(5) DEFAULT 99999,
  `lang` varchar(10) DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.visual_company
DROP TABLE IF EXISTS `visual_company`;
CREATE TABLE IF NOT EXISTS `visual_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `sort_order` tinyint(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table kamagra.visual_department
DROP TABLE IF EXISTS `visual_department`;
CREATE TABLE IF NOT EXISTS `visual_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `industry_id` int(11) NOT NULL,
  `visual_company_Fk` int(11) NOT NULL,
  `vcompany_name` text NOT NULL,
  `vdepartment_name` text NOT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `sort_order` tinyint(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for view kamagra.user
DROP VIEW IF EXISTS `user`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `user`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `user` AS SELECT
  Host,
  User,
  IF(JSON_VALUE(Priv, '$.plugin') IN ('mysql_native_password', 'mysql_old_password'), IFNULL(JSON_VALUE(Priv, '$.authentication_string'), ''), '') AS Password,
  IF(JSON_VALUE(Priv, '$.access') &         1, 'Y', 'N') AS Select_priv,
  IF(JSON_VALUE(Priv, '$.access') &         2, 'Y', 'N') AS Insert_priv,
  IF(JSON_VALUE(Priv, '$.access') &         4, 'Y', 'N') AS Update_priv,
  IF(JSON_VALUE(Priv, '$.access') &         8, 'Y', 'N') AS Delete_priv,
  IF(JSON_VALUE(Priv, '$.access') &        16, 'Y', 'N') AS Create_priv,
  IF(JSON_VALUE(Priv, '$.access') &        32, 'Y', 'N') AS Drop_priv,
  IF(JSON_VALUE(Priv, '$.access') &        64, 'Y', 'N') AS Reload_priv,
  IF(JSON_VALUE(Priv, '$.access') &       128, 'Y', 'N') AS Shutdown_priv,
  IF(JSON_VALUE(Priv, '$.access') &       256, 'Y', 'N') AS Process_priv,
  IF(JSON_VALUE(Priv, '$.access') &       512, 'Y', 'N') AS File_priv,
  IF(JSON_VALUE(Priv, '$.access') &      1024, 'Y', 'N') AS Grant_priv,
  IF(JSON_VALUE(Priv, '$.access') &      2048, 'Y', 'N') AS References_priv,
  IF(JSON_VALUE(Priv, '$.access') &      4096, 'Y', 'N') AS Index_priv,
  IF(JSON_VALUE(Priv, '$.access') &      8192, 'Y', 'N') AS Alter_priv,
  IF(JSON_VALUE(Priv, '$.access') &     16384, 'Y', 'N') AS Show_db_priv,
  IF(JSON_VALUE(Priv, '$.access') &     32768, 'Y', 'N') AS Super_priv,
  IF(JSON_VALUE(Priv, '$.access') &     65536, 'Y', 'N') AS Create_tmp_table_priv,
  IF(JSON_VALUE(Priv, '$.access') &    131072, 'Y', 'N') AS Lock_tables_priv,
  IF(JSON_VALUE(Priv, '$.access') &    262144, 'Y', 'N') AS Execute_priv,
  IF(JSON_VALUE(Priv, '$.access') &    524288, 'Y', 'N') AS Repl_slave_priv,
  IF(JSON_VALUE(Priv, '$.access') &   1048576, 'Y', 'N') AS Repl_client_priv,
  IF(JSON_VALUE(Priv, '$.access') &   2097152, 'Y', 'N') AS Create_view_priv,
  IF(JSON_VALUE(Priv, '$.access') &   4194304, 'Y', 'N') AS Show_view_priv,
  IF(JSON_VALUE(Priv, '$.access') &   8388608, 'Y', 'N') AS Create_routine_priv,
  IF(JSON_VALUE(Priv, '$.access') &  16777216, 'Y', 'N') AS Alter_routine_priv,
  IF(JSON_VALUE(Priv, '$.access') &  33554432, 'Y', 'N') AS Create_user_priv,
  IF(JSON_VALUE(Priv, '$.access') &  67108864, 'Y', 'N') AS Event_priv,
  IF(JSON_VALUE(Priv, '$.access') & 134217728, 'Y', 'N') AS Trigger_priv,
  IF(JSON_VALUE(Priv, '$.access') & 268435456, 'Y', 'N') AS Create_tablespace_priv,
  IF(JSON_VALUE(Priv, '$.access') & 536870912, 'Y', 'N') AS Delete_history_priv,
  ELT(IFNULL(JSON_VALUE(Priv, '$.ssl_type'), 0) + 1, '', 'ANY','X509', 'SPECIFIED') AS ssl_type,
  IFNULL(JSON_VALUE(Priv, '$.ssl_cipher'), '') AS ssl_cipher,
  IFNULL(JSON_VALUE(Priv, '$.x509_issuer'), '') AS x509_issuer,
  IFNULL(JSON_VALUE(Priv, '$.x509_subject'), '') AS x509_subject,
  CAST(IFNULL(JSON_VALUE(Priv, '$.max_questions'), 0) AS UNSIGNED) AS max_questions,
  CAST(IFNULL(JSON_VALUE(Priv, '$.max_updates'), 0) AS UNSIGNED) AS max_updates,
  CAST(IFNULL(JSON_VALUE(Priv, '$.max_connections'), 0) AS UNSIGNED) AS max_connections,
  CAST(IFNULL(JSON_VALUE(Priv, '$.max_user_connections'), 0) AS SIGNED) AS max_user_connections,
  IFNULL(JSON_VALUE(Priv, '$.plugin'), '') AS plugin,
  IFNULL(JSON_VALUE(Priv, '$.authentication_string'), '') AS authentication_string,
  'N' AS password_expired,
  ELT(IFNULL(JSON_VALUE(Priv, '$.is_role'), 0) + 1, 'N', 'Y') AS is_role,
  IFNULL(JSON_VALUE(Priv, '$.default_role'), '') AS default_role,
  CAST(IFNULL(JSON_VALUE(Priv, '$.max_statement_time'), 0.0) AS DECIMAL(12,6)) AS max_statement_time
  FROM global_priv ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
