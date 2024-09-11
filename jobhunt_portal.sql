-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 09:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobhunt_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `photo`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Richard Mickypary', 'mikipary@gmail.com', '$2y$12$xH9fowWGhnvRRor1G8176OuccpUQStObkftxtcUbuBjUcdjEbqmT6', 'admin.png', '', NULL, '2024-08-27 17:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `blog_page_items`
--

CREATE TABLE IF NOT EXISTS `blog_page_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `heading` text NOT NULL,
  `title` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_page_items`
--

INSERT INTO `blog_page_items` (`id`, `heading`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Blog', 'Blog', 'Blog', NULL, '2024-08-13 22:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `biography` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `designation`, `username`, `email`, `password`, `token`, `photo`, `biography`, `phone`, `address`, `country`, `state`, `city`, `zip_code`, `gender`, `marital_status`, `dob`, `website`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Peter Smith', NULL, 'peter', 'peter@gmail.com', '$2y$12$wBEtlXEqUP33tO2Oapk9S.ZWUpqM5JNEc9kTF7qA1TGEsXWmNq7ZS', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-08-22 12:44:45', '2024-08-24 19:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `company_location_id` int(11) DEFAULT NULL,
  `company_industry_id` int(11) DEFAULT NULL,
  `company_size_id` int(11) DEFAULT NULL,
  `founded_on` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `opening_hour_mon` varchar(255) DEFAULT NULL,
  `opening_hour_tue` varchar(255) DEFAULT NULL,
  `opening_hour_wed` varchar(255) DEFAULT NULL,
  `opening_hour_thu` varchar(255) DEFAULT NULL,
  `opening_hour_fri` varchar(255) DEFAULT NULL,
  `opening_hour_sat` varchar(255) DEFAULT NULL,
  `opening_hour_sun` varchar(255) DEFAULT NULL,
  `map_code` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `contact_person`, `username`, `email`, `password`, `token`, `logo`, `phone`, `address`, `company_location_id`, `company_industry_id`, `company_size_id`, `founded_on`, `website`, `description`, `opening_hour_mon`, `opening_hour_tue`, `opening_hour_wed`, `opening_hour_thu`, `opening_hour_fri`, `opening_hour_sat`, `opening_hour_sun`, `map_code`, `facebook`, `twitter`, `linkedin`, `instagram`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Grenville Schools', 'Damilola Babalola', 'grenville', 'info@grenvilleschool.com', '$2y$12$MaJhEzS9dcqFy2ZwxLcwTu.eqzcBYnuTVOpKjd/9teylMnqZfcgSi', '', 'company_logo_1725303542.png', '09062684833', '18 Ladoke Akintola Street GRA Ikeja Lagos', 6, 1, 6, '2012', 'https://www.grenvilleschool.com', '<p><span style=\"color: #808080; font-family: Poppins, sans-serif; font-size: 15px; background-color: #ffffff;\">A premier educational institution dedicated to providing a transformative and enjoyable learning experience. As a distinguished choice for students aged 6 months to 18 years, Grenville School is committed to excellence.</span></p>', '9:00 AM to 5:00 PM', '9:00 AM to 5:00 PM', '9:00 AM to 5:00 PM', '9:00 AM to 5:00 PM', '9:00 AM to 5:00 PM', 'Off day', 'Off day', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.5108194467566!2d3.3511325744808373!3d6.5832415224673015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b9216e51ceb85%3A0x22242cc8658e2b19!2sGRENVILLE%20SCHOOLS!5e0!3m2!1sen!2sng!4v1725304224091!5m2!1sen!2sng\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://www.facebook.com/grenville_sch', NULL, NULL, NULL, 1, '2024-08-19 12:49:17', '2024-09-03 20:21:28'),
(2, 'ABC Media Ltd.', 'James O\'neil', 'james', 'james@gmail.com', '$2y$12$/7XMREMDbidZz.XA/SzcGeFyNTHIRAMtYu4hIExPrPybtoiAOUEjG', '', NULL, '123456', '12, KBC Street, NYC, USA', 3, 1, 1, '1900', 'https://www.mrichtech.com', '<p>His cu nobis populo, eum laoreet evertitur te. In tollit audire adolescens vix. Ad veri admodum quo. Ea pri cetero timeam probatus, dicunt principes vel ut.</p>', '9:00 AM to 5:00 PM', '9:00 AM to 5:00 PM', '9:00 AM to 5:00 PM', '9:00 AM to 5:00 PM', '9:00 AM to 5:00 PM', '9:00 AM to 5:00 PM', '9:00 AM to 5:00 PM', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.2799198932!2d-74.25987701513004!3d40.69767006272707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1645362221879!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border: 0\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', 1, '2024-09-02 19:58:49', '2024-09-02 20:12:39'),
(3, 'Test', 'test', 'test', 'test@gmail.com', '$2y$12$6LisQLvj2tj9o9MJZsswTeIj/EYLNVQT1/ysXhQSUrth9xl5.CzG.', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-09-02 21:04:05', '2024-09-02 21:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `company_industries`
--

CREATE TABLE IF NOT EXISTS `company_industries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_industries`
--

INSERT INTO `company_industries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Accounting Firm', '2024-08-28 00:03:01', '2024-08-28 00:03:01'),
(2, 'Software Company', '2024-08-28 00:03:28', '2024-08-28 00:03:28'),
(3, 'IT Firm', '2024-08-28 00:03:53', '2024-08-28 00:03:53'),
(4, 'Law Firm', '2024-08-28 00:04:16', '2024-08-28 00:04:16'),
(5, 'Real Estate Company', '2024-08-28 00:04:26', '2024-08-28 00:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `company_locations`
--

CREATE TABLE IF NOT EXISTS `company_locations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_locations`
--

INSERT INTO `company_locations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'USA', '2024-08-27 23:40:26', '2024-08-27 23:40:26'),
(2, 'Canada', '2024-08-27 23:40:34', '2024-08-27 23:40:34'),
(3, 'Australia', '2024-08-27 23:40:57', '2024-08-27 23:40:57'),
(4, 'China', '2024-08-27 23:41:15', '2024-08-27 23:41:15'),
(5, 'Japan', '2024-08-27 23:41:31', '2024-08-27 23:41:31'),
(6, 'Italy', '2024-08-27 23:41:55', '2024-08-27 23:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `company_photos`
--

CREATE TABLE IF NOT EXISTS `company_photos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_photos`
--

INSERT INTO `company_photos` (`id`, `company_id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, 'company_photo_1725306957.jpg', '2024-09-02 19:55:57', '2024-09-02 19:55:57'),
(5, 2, 'company_photo_1725307730.png', '2024-09-02 20:08:50', '2024-09-02 20:08:50'),
(7, 1, 'company_photo_1725309372.png', '2024-09-02 20:36:12', '2024-09-02 20:36:12'),
(8, 1, 'company_photo_1725312036.jpg', '2024-09-02 21:20:36', '2024-09-02 21:20:36'),
(9, 1, 'company_photo_1725312097.png', '2024-09-02 21:21:37', '2024-09-02 21:21:37'),
(10, 1, 'company_photo_1725312115.jpg', '2024-09-02 21:21:55', '2024-09-02 21:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `company_sizes`
--

CREATE TABLE IF NOT EXISTS `company_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_sizes`
--

INSERT INTO `company_sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2-5 Persons', '2024-08-28 00:33:15', '2024-08-28 00:33:15'),
(2, '5-10 Persons', '2024-08-28 00:33:37', '2024-08-28 00:33:37'),
(3, '10-20 Persons', '2024-08-28 00:33:58', '2024-08-28 00:33:58'),
(4, '20-50 Persons', '2024-08-28 00:34:13', '2024-08-28 00:34:13'),
(5, '50-100 Persons', '2024-08-28 00:34:29', '2024-08-28 00:34:29'),
(6, '100+ Persons', '2024-08-28 00:34:46', '2024-08-28 00:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `company_videos`
--

CREATE TABLE IF NOT EXISTS `company_videos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_videos`
--

INSERT INTO `company_videos` (`id`, `company_id`, `video_url`, `created_at`, `updated_at`) VALUES
(2, 1, 'LmF75-QFxLE', '2024-09-03 15:27:10', '2024-09-03 15:27:10'),
(3, 1, 'VS6aQoH3Xow', '2024-09-03 19:59:38', '2024-09-03 19:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `contact_page_items`
--

CREATE TABLE IF NOT EXISTS `contact_page_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `heading` text NOT NULL,
  `map_code` text NOT NULL,
  `title` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_page_items`
--

INSERT INTO `contact_page_items` (`id`, `heading`, `map_code`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Contact', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.510819582189!2d3.348836575632509!3d6.583241505501981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b9216e51ceb85%3A0x22242cc8658e2b19!2sGRENVILLE%20SCHOOLS!5e0!3m2!1sen!2sng!4v1723907215915!5m2!1sen!2sng\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Contact SEO', 'Contact', NULL, '2024-08-17 17:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet alia ornatus delicatissimi cu has?', '<p>Lorem ipsum dolor sit amet, alia ornatus delicatissimi cu has, sale facete est ea, convenire urbanitas at sea. No suavitate assueverit vix, cum nonumy convenire eu. Per eu stet ullum, agam dicat deleniti nec te. Vis amet dolore laboramus ut, autem delectus incorrupte pri ut, odio vero choro et ius. Ne per option deleniti, cum ea prima detracto.</p>', '2024-08-13 18:00:09', '2024-08-13 18:00:09'),
(2, 'Et his probo impedit vivendum has at consetetur conclusionemque?', '<p>Et his probo impedit vivendum, has at consetetur conclusionemque. Ut eos doming legimus, nec diam dicat facete ea, autem graeci salutandi in usu. Cu nec magna doctus necessitatibus. Sea ei similique tincidunt, et alterum partiendo aliquando quo. Usu ut illum deserunt, qui ponderum inimicus signiferumque eu, soluta quaeque ad usu. At dolores accusata eum, eu nec meliore appellantur. Quo oblique facilisi an, cum ex numquam delenit deseruisse, id novum qualisque gloriatur sea.</p>', '2024-08-13 18:02:42', '2024-08-13 18:02:42'),
(3, 'How do I obtain an application form?', '<p style=\"box-sizing: border-box; margin: 0px; font-size: 15px; line-height: var(--line-height-b1); color: #808080; font-family: Poppins, sans-serif; background-color: #ffffff;\">To obtain an application form, you have two convenient options:</p>\r\n<ol style=\"box-sizing: border-box; padding: 0px 0px 0px 18px; margin: 0px 0px 30px; color: #808080; font-family: Poppins, sans-serif; font-size: 15px; background-color: #ffffff;\" type=\"1\">\r\n<li style=\"box-sizing: border-box; font-size: var(--font-size-b1); line-height: var(--line-height-b1); color: var(--color-body); margin-top: 10px; margin-bottom: 10px;\">Physically from the School: Visit the school in person to collect a hard copy of the application form.</li>\r\n<li style=\"box-sizing: border-box; font-size: var(--font-size-b1); line-height: var(--line-height-b1); color: var(--color-body); margin-top: 10px; margin-bottom: 10px;\">Online via Email or Whatsapp: Request the application form to be sent to you electronically via email or Whatsapp. Once received, you can download, complete, and return the form through the same channel.Choose the method that is most convenient for you, and follow the provided instructions for a smooth application process.</li>\r\n</ol>', '2024-08-13 18:04:39', '2024-08-13 18:04:39'),
(4, 'Does the school give discounts?', '<p><span style=\"color: #808080; font-family: Poppins, sans-serif; font-size: 15px; background-color: #ffffff;\">Yes, Grenville School provides a 5% tuition discount for each additional sibling enrolled at the school. We also offer an annual 5% tuition discount. This discount is applied to the tuition fees for the upcoming academic year. The annual discount only applied when tuition fees are paid in full before the academic year starts.</span></p>', '2024-08-13 18:05:12', '2024-08-13 18:13:27'),
(5, 'What other academic scheme do you run beyond secondary school?', '<p style=\"box-sizing: border-box; margin: 0px; font-size: 15px; line-height: var(--line-height-b1); color: #808080; font-family: Poppins, sans-serif; background-color: #ffffff;\">Grenville offers both the Ontario Secondary School Diploma (OSSD) and West African Examination Council (WAEC) to secondary graduates. Our students undergo a comprehensive year-long preparation program, leading to excellent performance in both qualifying exams.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-size: 15px; line-height: var(--line-height-b1); color: #808080; font-family: Poppins, sans-serif; background-color: #ffffff;\"><br style=\"box-sizing: border-box;\" />Additionally, Grenville Schools provides preparatory courses such as SATs, TOEFL, DELF, and IELTS upon request. These preparatory courses are designed to enhance our students\' readiness and success in various international examinations, ensuring a well-rounded and globally competitive education.</p>', '2024-08-13 18:06:13', '2024-08-13 18:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `faq_page_items`
--

CREATE TABLE IF NOT EXISTS `faq_page_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `heading` text NOT NULL,
  `title` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_page_items`
--

INSERT INTO `faq_page_items` (`id`, `heading`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Frequently Asked Questions (FAQ)', 'FAQ', 'FAQ', NULL, '2024-08-13 21:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_items`
--

CREATE TABLE IF NOT EXISTS `home_page_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `heading` text NOT NULL,
  `text` text DEFAULT NULL,
  `job_title` text NOT NULL,
  `job_category` text NOT NULL,
  `job_location` text NOT NULL,
  `search` text NOT NULL,
  `background_image` text NOT NULL,
  `job_category_heading` text NOT NULL,
  `job_category_subheading` text DEFAULT NULL,
  `job_category_status` text NOT NULL,
  `why_choose_us_heading` text NOT NULL,
  `why_choose_us_subheading` text DEFAULT NULL,
  `why_choose_us_background` text NOT NULL,
  `why_choose_us_status` text NOT NULL,
  `featured_jobs_heading` text NOT NULL,
  `featured_jobs_subheading` text DEFAULT NULL,
  `featured_jobs_status` text NOT NULL,
  `testimonial_heading` text NOT NULL,
  `testimonial_background` text NOT NULL,
  `testimonial_status` text NOT NULL,
  `blog_heading` text NOT NULL,
  `blog_subheading` text DEFAULT NULL,
  `blog_status` text NOT NULL,
  `title` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_page_items`
--

INSERT INTO `home_page_items` (`id`, `heading`, `text`, `job_title`, `job_category`, `job_location`, `search`, `background_image`, `job_category_heading`, `job_category_subheading`, `job_category_status`, `why_choose_us_heading`, `why_choose_us_subheading`, `why_choose_us_background`, `why_choose_us_status`, `featured_jobs_heading`, `featured_jobs_subheading`, `featured_jobs_status`, `testimonial_heading`, `testimonial_background`, `testimonial_status`, `blog_heading`, `blog_subheading`, `blog_status`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Find Your Desired Job', 'Search the best, perfect and suitable jobs that matches your skills in your expertise area.', 'Job Title', 'Job Category', 'Job Location', 'Search', 'banner_home.jpg', 'Job Categories', 'Get the list of all the popular job categories here', 'Show', 'Why Choose Us', 'Our Methods to help you build your career in future', 'why_choose_home_background.jpg', 'Show', 'Featured Jobs', 'Find the awesome jobs that matches your skill', 'Show', 'Our Happy Clients', 'testimonial_home_background.jpg', 'Show', 'Latest News', 'Check our latest news from the following section', 'Show', 'Job Hunt | A Complete Job Directory Portal', 'Job Hunt | A Complete Job Directory Portal', NULL, '2024-08-18 11:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `responsibility` text DEFAULT NULL,
  `skill` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `benefit` text DEFAULT NULL,
  `deadline` text NOT NULL,
  `vacancy` int(11) NOT NULL,
  `job_category_id` int(11) NOT NULL,
  `job_location_id` int(11) NOT NULL,
  `job_type_id` int(11) NOT NULL,
  `job_experience_id` int(11) NOT NULL,
  `job_gender_id` int(11) NOT NULL,
  `job_salary_range_id` int(11) NOT NULL,
  `map_code` text DEFAULT NULL,
  `is_featured` tinyint(4) NOT NULL,
  `is_urgent` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company_id`, `title`, `description`, `responsibility`, `skill`, `education`, `benefit`, `deadline`, `vacancy`, `job_category_id`, `job_location_id`, `job_type_id`, `job_experience_id`, `job_gender_id`, `job_salary_range_id`, `map_code`, `is_featured`, `is_urgent`, `created_at`, `updated_at`) VALUES
(1, 1, 'Software Engineer', '<p>We are looking for a motivated PHP / Laravel developer to come join our agile team of professionals. If you are passionate about technology, constantly seeking to learn and improve your skillset, then you are the type of person we are looking for! We are offering superb career growth opportunities, great compensation, and benefits.</p>', '<ul>\r\n<li>Develop, record and maintain cutting edge web-based PHP applications on portal plus premium service platforms</li>\r\n<li>Build innovative, state-of-the-art applications and collaborate with the User Experience (UX) team</li>\r\n<li>Ensure HTML, CSS, and shared JavaScript is valid and consistent across applications</li>\r\n<li>Prepare and maintain all applications utilizing standard development tools</li>\r\n<li>Utilize backend data services and contribute to increase existing data services API</li>\r\n<li>Lead the entire web application development life cycle right from concept stage to delivery and post launch support</li>\r\n</ul>', '<ul>\r\n<li>Previous working experience as a PHP / Laravel developer for 4 year(s)</li>\r\n<li>BS/MS degree in Computer Science, Engineering, MIS or similar relevant field</li>\r\n<li>In depth knowledge of object-oriented PHP and Laravel PHP Framework</li>\r\n<li>Hands on experience with SQL schema design, SOLID principles, REST API design</li>\r\n<li>Software testing (PHPUnit, PHPSpec, Behat)</li>\r\n<li>MySQL profiling and query optimization</li>\r\n<li>Creative and efficient problem solver</li>\r\n</ul>', '<ul>\r\n<li>B.Sc. in CSE from any reputed University</li>\r\n<li>CGPA minimum 3.50</li>\r\n</ul>', '<ul>\r\n<li>Early finish on Fridays for our end of week catch up (4:30 finish, and drink of your choice from the bar)</li>\r\n<li>28 days holiday(including bank holidays) rising by 1 day per year PLUS an additional day off on your birthday</li>\r\n<li>Generous annual bonus.</li>\r\n<li>Healthcare package</li>\r\n<li>Free Breakfast on Mondays and free snacks in the office</li>\r\n<li>Cycle 2 Work Scheme</li>\r\n<li>Brand new MacBook Pro</li>\r\n</ul>', '2024-09-30', 2, 1, 1, 1, 3, 3, 3, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d184551.90977207685!2d-79.54286797110717!3d43.71837095825704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4cb90d7c63ba5%3A0x323555502ab4c477!2sToronto%2C%20ON%2C%20Canada!5e0!3m2!1sen!2sng!4v1725404838410!5m2!1sen!2sng\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, 1, '2024-09-03 23:08:06', '2024-09-11 18:51:30'),
(2, 1, 'Web Designer 098765', '<p>We are looking for a motivated PHP / Laravel developer to come join our agile team of professionals. If you are passionate about technology, constantly seeking to learn and improve your skillset, then you are the type of person we are looking for! We are offering superb career growth opportunities, great compensation, and benefits.</p>', '<ul>\r\n<li>Develop, record and maintain cutting edge web-based PHP applications on portal plus premium service platforms</li>\r\n<li>Build innovative, state-of-the-art applications and collaborate with the User Experience (UX) team</li>\r\n<li>Ensure HTML, CSS, and shared JavaScript is valid and consistent across applications</li>\r\n<li>Prepare and maintain all applications utilizing standard development tools</li>\r\n<li>Utilize backend data services and contribute to increase existing data services API</li>\r\n<li>Lead the entire web application development life cycle right from concept stage to delivery and post launch support</li>\r\n</ul>', '<ul>\r\n<li>Previous working experience as a PHP / Laravel developer for 4 year(s)</li>\r\n<li>BS/MS degree in Computer Science, Engineering, MIS or similar relevant field</li>\r\n<li>In depth knowledge of object-oriented PHP and Laravel PHP Framework</li>\r\n<li>Hands on experience with SQL schema design, SOLID principles, REST API design</li>\r\n<li>Software testing (PHPUnit, PHPSpec, Behat)</li>\r\n<li>MySQL profiling and query optimization</li>\r\n<li>Creative and efficient problem solver</li>\r\n</ul>', '<ul>\r\n<li>B.Sc. in CSE from any reputed University</li>\r\n<li>CGPA minimum 3.50</li>\r\n</ul>', '<ul>\r\n<li>Early finish on Fridays for our end of week catch up (4:30 finish, and drink of your choice from the bar)</li>\r\n<li>28 days holiday(including bank holidays) rising by 1 day per year PLUS an additional day off on your birthday</li>\r\n<li>Generous annual bonus.</li>\r\n<li>Healthcare package</li>\r\n<li>Free Breakfast on Mondays and free snacks in the office</li>\r\n<li>Cycle 2 Work Scheme</li>\r\n<li>Brand new MacBook Pro</li>\r\n</ul>', '2024-09-04', 1, 1, 3, 2, 2, 1, 2, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52891323.64355656!2d-161.7572472789203!3d35.990241455780485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sng!4v1725485743759!5m2!1sen!2sng\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, 0, '2024-09-04 21:36:48', '2024-09-10 14:24:22'),
(3, 1, 'PHP Developer', '<p>We are looking for a motivated PHP / Laravel developer to come join our agile team of professionals. If you are passionate about technology, constantly seeking to learn and improve your skillset, then you are the type of person we are looking for! We are offering superb career growth opportunities, great compensation, and benefits.</p>', '<ul>\r\n<li>Develop, record and maintain cutting edge web-based PHP applications on portal plus premium service platforms</li>\r\n<li>Build innovative, state-of-the-art applications and collaborate with the User Experience (UX) team</li>\r\n<li>Ensure HTML, CSS, and shared JavaScript is valid and consistent across applications</li>\r\n<li>Prepare and maintain all applications utilizing standard development tools</li>\r\n<li>Utilize backend data services and contribute to increase existing data services API</li>\r\n<li>Lead the entire web application development life cycle right from concept stage to delivery and post launch support</li>\r\n</ul>', '<ul>\r\n<li>Previous working experience as a PHP / Laravel developer for 4 year(s)</li>\r\n<li>BS/MS degree in Computer Science, Engineering, MIS or similar relevant field</li>\r\n<li>In depth knowledge of object-oriented PHP and Laravel PHP Framework</li>\r\n<li>Hands on experience with SQL schema design, SOLID principles, REST API design</li>\r\n<li>Software testing (PHPUnit, PHPSpec, Behat)</li>\r\n<li>MySQL profiling and query optimization</li>\r\n<li>Creative and efficient problem solver</li>\r\n</ul>', '<ul>\r\n<li>B.Sc. in CSE from any reputed University</li>\r\n<li>CGPA minimum 3.50</li>\r\n</ul>', '<ul>\r\n<li>Early finish on Fridays for our end of week catch up (4:30 finish, and drink of your choice from the bar)</li>\r\n<li>28 days holiday(including bank holidays) rising by 1 day per year PLUS an additional day off on your birthday</li>\r\n<li>Generous annual bonus.</li>\r\n<li>Healthcare package</li>\r\n<li>Free Breakfast on Mondays and free snacks in the office</li>\r\n<li>Cycle 2 Work Scheme</li>\r\n<li>Brand new MacBook Pro</li>\r\n</ul>', '2024-10-09', 3, 8, 5, 1, 1, 1, 1, NULL, 0, 0, '2024-09-04 21:50:55', '2024-09-04 21:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE IF NOT EXISTS `job_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `icon` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Engineering', 'fas fa-magic', '2024-08-11 16:09:58', '2024-08-11 16:09:58'),
(2, 'Medical', 'fas fa-stethoscope', '2024-08-11 16:12:00', '2024-08-11 19:15:06'),
(3, 'Accounting', 'fas fa-landmark', '2024-08-11 16:13:35', '2024-08-11 16:13:35'),
(4, 'Data Entry', 'fas fa-share-alt', '2024-08-11 16:14:56', '2024-08-11 17:06:12'),
(5, 'Marketing', 'fas fa-bullhorn', '2024-08-11 16:16:05', '2024-08-11 16:16:05'),
(6, 'Production', 'fas fa-sitemap', '2024-08-11 16:19:51', '2024-08-11 16:19:51'),
(7, 'Garments', 'fas fa-users', '2024-08-11 16:21:36', '2024-08-11 16:21:36'),
(8, 'Education', 'fas fa-user-graduate', '2024-08-11 16:22:54', '2024-08-11 16:22:54'),
(9, 'Technician', 'fas fa-street-view', '2024-08-11 16:24:21', '2024-08-11 16:24:21'),
(11, 'Security', 'fas fa-lock', '2024-08-11 19:21:07', '2024-08-11 19:21:07'),
(12, 'Telecommunication', 'fas fa-vector-square', '2024-08-11 19:24:08', '2024-08-11 19:24:08'),
(13, 'Commercial', 'fas fa-suitcase', '2024-08-11 19:25:38', '2024-08-11 19:25:38'),
(14, 'Web Development', 'fas fa-solid fa-terminal', '2024-08-11 20:37:23', '2024-08-11 20:43:22'),
(15, 'Web Design', 'fas fa-solid fa-code', '2024-08-11 20:37:52', '2024-08-11 20:44:38'),
(16, 'Customer Support', 'fab fa-brands fa-intercom', '2024-08-11 20:45:36', '2024-08-11 20:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `job_experiences`
--

CREATE TABLE IF NOT EXISTS `job_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_experiences`
--

INSERT INTO `job_experiences` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fresher', '2024-08-27 20:10:25', '2024-08-27 20:10:25'),
(2, '1 Year', '2024-08-27 20:10:55', '2024-08-27 20:10:55'),
(3, '2 Years', '2024-08-27 20:11:13', '2024-08-27 20:11:13'),
(4, '3 Years', '2024-08-27 20:12:09', '2024-08-27 20:12:09'),
(5, '4 Years', '2024-08-27 20:12:15', '2024-08-27 20:12:15'),
(6, '5 Years', '2024-08-27 20:12:25', '2024-08-27 20:17:21'),
(7, '5+ Years', '2024-08-27 20:17:30', '2024-08-27 20:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `job_genders`
--

CREATE TABLE IF NOT EXISTS `job_genders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_genders`
--

INSERT INTO `job_genders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Male', '2024-08-27 20:59:19', '2024-08-27 20:59:19'),
(2, 'Female', '2024-08-27 20:59:25', '2024-08-27 20:59:25'),
(3, 'Not Specified', '2024-08-27 20:59:59', '2024-08-27 21:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `job_locations`
--

CREATE TABLE IF NOT EXISTS `job_locations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_locations`
--

INSERT INTO `job_locations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Canada', '2024-08-27 17:38:45', '2024-08-27 17:38:45'),
(2, 'Australia', '2024-08-27 17:39:35', '2024-08-27 17:39:35'),
(3, 'USA', '2024-08-27 17:40:07', '2024-08-27 17:40:07'),
(4, 'Finland', '2024-08-27 17:40:29', '2024-08-27 17:40:29'),
(5, 'Germany', '2024-08-27 17:40:50', '2024-08-27 17:41:36'),
(7, 'Nigeria', '2024-08-27 20:53:01', '2024-08-27 20:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `job_page_category_items`
--

CREATE TABLE IF NOT EXISTS `job_page_category_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `heading` text NOT NULL,
  `title` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_page_category_items`
--

INSERT INTO `job_page_category_items` (`id`, `heading`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Job Categories', 'Job Categories SEO', 'Job Categories', NULL, '2024-08-17 19:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `job_salary_ranges`
--

CREATE TABLE IF NOT EXISTS `job_salary_ranges` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_salary_ranges`
--

INSERT INTO `job_salary_ranges` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '$100-$500', '2024-08-27 22:03:40', '2024-08-27 22:03:40'),
(2, '$500-$1000', '2024-08-27 22:04:24', '2024-08-27 22:04:24'),
(3, '$1000-$1500', '2024-08-27 22:04:58', '2024-08-27 22:04:58'),
(4, '$1500-$2000', '2024-08-27 22:05:31', '2024-08-27 22:05:31'),
(5, '$2000-$2500', '2024-08-27 22:06:04', '2024-08-27 22:06:04'),
(6, '$2500-$3000', '2024-08-27 22:14:55', '2024-08-27 22:14:55'),
(7, '$3000-$3500', '2024-08-27 22:15:27', '2024-08-27 22:15:27'),
(8, '$3500-$4000', '2024-08-27 22:16:07', '2024-08-27 22:16:07'),
(9, '$4000+', '2024-08-27 22:16:42', '2024-08-27 22:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE IF NOT EXISTS `job_types` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Full Time', '2024-08-27 19:15:23', '2024-08-27 19:15:23'),
(2, 'Part Time', '2024-08-27 19:15:41', '2024-08-27 19:15:41'),
(3, 'Contractual', '2024-08-27 19:16:13', '2024-08-27 19:16:13'),
(4, 'Internship', '2024-08-27 19:16:44', '2024-08-27 19:16:44'),
(5, 'Freelance', '2024-08-27 19:17:00', '2024-08-27 19:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_09_132027_create_admins_table', 2),
(6, '2024_08_11_095357_create_home_page_items_table', 3),
(7, '2024_08_11_142139_create_job_categories_table', 4),
(8, '2024_08_11_221000_create_why_choose_items_table', 5),
(9, '2024_08_12_113910_create_testimonials_table', 6),
(10, '2024_08_12_172217_create_posts_table', 7),
(11, '2024_08_13_183720_create_faqs_table', 8),
(12, '2024_08_13_195608_create_page_faq_items_table', 9),
(13, '2024_08_13_224206_create_faq_page_items_table', 10),
(14, '2024_08_13_224515_create_blog_page_items_table', 11),
(15, '2024_08_14_215728_create_term_page_items_table', 12),
(16, '2024_08_17_141416_create_privacy_page_items_table', 13),
(17, '2024_08_17_152745_create_contact_page_items_table', 14),
(18, '2024_08_17_194954_create_job_page_category_items_table', 15),
(19, '2024_08_17_222245_create_packages_table', 16),
(20, '2024_08_17_233025_create_packages_table', 17),
(21, '2024_08_18_105522_create_pricing_page_items_table', 18),
(22, '2024_08_18_123108_create_other_page_items_table', 19),
(23, '2024_08_18_205948_create_companies_table', 20),
(24, '2024_08_22_105115_create_candidates_table', 21),
(25, '2024_08_25_160533_create_orders_table', 22),
(26, '2024_08_27_180159_create_job_locations_table', 23),
(27, '2024_08_27_190729_create_job_types_table', 24),
(28, '2024_08_27_202353_create_job_experiences_table', 25),
(29, '2024_08_27_213424_create_job_genders_table', 26),
(30, '2024_08_27_220448_create_job_salary_ranges_table', 27),
(31, '2024_08_27_233355_create_company_locations_table', 28),
(32, '2024_08_28_005056_create_company_industries_table', 29),
(33, '2024_08_28_010752_create_company_sizes_table', 30),
(34, '2024_09_02_202901_create_company_photos_table', 31),
(35, '2024_09_03_153654_create_company_videos_table', 32),
(36, '2024_09_03_212925_create_jobs_table', 33);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `paid_amount` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `expire_date` varchar(255) NOT NULL,
  `currently_active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `company_id`, `package_id`, `order_no`, `paid_amount`, `payment_method`, `start_date`, `expire_date`, `currently_active`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '1724612974', '49', 'PayPal', '2024-08-25', '2024-10-24', 0, '2024-08-25 19:09:34', '2024-08-25 19:13:31'),
(2, 1, 2, '1724613211', '29', 'PayPal', '2024-08-25', '2024-09-24', 0, '2024-08-25 19:13:31', '2024-08-25 19:15:13'),
(3, 1, 1, '1724613313', '19', 'PayPal', '2024-08-25', '2024-09-01', 0, '2024-08-25 19:15:13', '2024-08-27 15:11:56'),
(4, 1, 2, '1724771516', '29', 'Stripe', '2024-08-27', '2024-09-26', 0, '2024-08-27 15:11:56', '2024-08-27 15:47:17'),
(5, 1, 1, '1724773637', '19', 'Stripe', '2024-08-27', '2024-09-03', 0, '2024-08-27 15:47:17', '2024-09-02 21:13:53'),
(6, 2, 2, '1725310823', '29', 'PayPal', '2024-09-02', '2024-10-02', 1, '2024-09-02 21:00:23', '2024-09-02 21:00:23'),
(7, 1, 2, '1725311633', '29', 'PayPal', '2024-09-02', '2024-10-02', 1, '2024-09-02 21:13:53', '2024-09-02 21:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `other_page_items`
--

CREATE TABLE IF NOT EXISTS `other_page_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login_page_heading` text NOT NULL,
  `login_page_title` text DEFAULT NULL,
  `login_page_meta_description` text DEFAULT NULL,
  `signup_page_heading` text NOT NULL,
  `signup_page_title` text DEFAULT NULL,
  `signup_page_meta_description` text DEFAULT NULL,
  `forget_password_page_heading` text NOT NULL,
  `forget_password_page_title` text DEFAULT NULL,
  `forget_password_page_meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_page_items`
--

INSERT INTO `other_page_items` (`id`, `login_page_heading`, `login_page_title`, `login_page_meta_description`, `signup_page_heading`, `signup_page_title`, `signup_page_meta_description`, `forget_password_page_heading`, `forget_password_page_title`, `forget_password_page_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Login 1111', 'Login', 'Login', 'Create Account', 'Signup', 'Signup', 'Forget Password', 'Forget Password', 'Forget Password', NULL, '2024-08-18 13:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `package_name` varchar(200) NOT NULL,
  `package_price` smallint(4) NOT NULL,
  `package_days` smallint(4) NOT NULL,
  `package_display_time` varchar(100) NOT NULL,
  `total_allowed_jobs` tinyint(4) NOT NULL,
  `total_allowed_featured_jobs` tinyint(4) NOT NULL,
  `total_allowed_photos` tinyint(4) NOT NULL,
  `total_allowed_videos` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `package_price`, `package_days`, `package_display_time`, `total_allowed_jobs`, `total_allowed_featured_jobs`, `total_allowed_photos`, `total_allowed_videos`, `created_at`, `updated_at`) VALUES
(1, 'Basic', 19, 7, '1 Week', 2, 0, 0, 0, '2024-08-17 22:32:38', '2024-09-04 19:57:57'),
(2, 'Standard', 29, 30, '1 Month', 4, 2, 5, 2, '2024-08-17 22:34:12', '2024-09-04 21:37:59'),
(3, 'Gold', 49, 60, '2 Month', -1, 15, 15, 10, '2024-08-17 22:37:21', '2024-08-17 22:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `heading` text NOT NULL,
  `slug` text NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `total_view` text NOT NULL,
  `photo` text NOT NULL,
  `title` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `heading`, `slug`, `short_description`, `description`, `total_view`, `photo`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, et pro iusto malorum nostrud, eu graeco verear assueverit sit', 'lorem-ipsum-dolor-sit-amet', 'Lorem ipsum dolor sit amet, et pro iusto malorum nostrud, eu graeco verear assueverit sit, magna constituam eum an. Et mutat doming eum, assum percipit at pro. Alterum constituam ad ius. Cu quo atqui utinam, malorum abhorreant vim ex.', '<p>At vide appetere neglegentur nec, cu porro nulla signiferumque ius, vix numquam complectitur eu. In congue habemus nam. Eu congue mucius admodum quo, labore civibus propriae has no. Cum cu minim diceret phaedrum. Perpetua pertinacia intellegam mei an, eu eos fugit animal, an sit fierent salutandi.</p>\r\n<p>&nbsp;</p>\r\n<p>Est natum graece volumus at, mei omnesque prodesset constituam ut. Ex ullum alienum indoctum per, usu reque partem oporteat ne, qui affert noluisse copiosae ea. Usu quas accusamus an. Ius laboramus scribentur in. An mel hinc adversarium.</p>\r\n<p>&nbsp;</p>\r\n<p>Pri no fugit iusto. Ex placerat consequuntur sed, ponderum imperdiet id vis. Eu odio mollis habemus per, probatus vituperatoribus sed cu, id dicunt vocent sit. Id mei veniam quidam atomorum.</p>\r\n<p>&nbsp;</p>\r\n<p>Aeque nullam conclusionemque ex eam. Pri veniam bonorum antiopam cu. Vim numquam perfecto consetetur ne, brute justo no pri. Sale bonorum torquatos vim an. Scripta persius mel ei, viris offendit dissentiet no vix, malorum vivendo inimicus eam eu. Est libris aeterno virtute ei.</p>', '0', 'post_1723483219.jpg', 'Lorem ipsum dolor sit amet, et pro', 'Lorem ipsum dolor sit amet, et pro iusto', '2024-08-12 17:20:19', '2024-08-13 22:41:51'),
(2, 'Nec in rebum primis causae. Affert iisque ex pri, vis utinam vivendo definitionem ad, nostrum omnes que per et.', 'nec-in-rebum-primis-causa-effert-iisque-ex-pri', 'At vide appetere neglegentur nec, cu porro nulla signiferumque ius, vix numquam complectitur eu. In congue habemus nam. Eu congue mucius admodum quo, labore civibus propriae has no. Cum cu minim diceret phaedrum.', '<p>At vide appetere neglegentur nec, cu porro nulla signiferumque ius, vix numquam complectitur eu. In congue habemus nam. Eu congue mucius admodum quo, labore civibus propriae has no. Cum cu minim diceret phaedrum. Perpetua pertinacia intellegam mei an, eu eos fugit animal, an sit fierent salutandi.</p>\r\n<p>Est natum graece volumus at, mei omnesque prodesset constituam ut. Ex ullum alienum indoctum per, usu reque partem oporteat ne, qui affert noluisse copiosae ea. Usu quas accusamus an. Ius laboramus scribentur in. An mel hinc adversarium.</p>\r\n<p>Pri no fugit iusto. Ex placerat consequuntur sed, ponderum imperdiet id vis. Eu odio mollis habemus per, probatus vituperatoribus sed cu, id dicunt vocent sit. Id mei veniam quidam atomorum.</p>\r\n<p>Aeque nullam conclusionemque ex eam. Pri veniam bonorum antiopam cu. Vim numquam perfecto consetetur ne, brute justo no pri. Sale bonorum torquatos vim an. Scripta persius mel ei, viris offendit dissentiet no vix,</p>', '2', 'post_1723483426.jpg', 'Nec in rebum primis causae.', 'Nec in rebum primis causae.', '2024-08-12 17:23:46', '2024-08-14 20:37:54'),
(3, 'Sit tation tantas urbanitas eu. Munere verear elaboraret eu mel, modo aperiri integre vix an.', 'ad-nisl-verear-equidem-vel', 'Graecis maiorum volutpat ei qui. Duo accusam senserit id, ea mel fabulas percipit, discere definitionem an mea.', '<p>Graecis maiorum volutpat ei qui. Duo accusam senserit id, ea mel fabulas percipit, discere definitionem an mea. Mei iisque salutatus assueverit ut, nam aliquam ocurreret id. Eam sale homero alienum et, qui unum prima vivendo ea. Unum oportere est ea.</p>\r\n<p>Brute habemus vim ex. Eros meis argumentum in sit, his dolor reprimique id. Ut pro iriure fastidii, ex nam enim aliquip consetetur. Eos probo fabulas petentium ea.</p>\r\n<p>Has ponderum postulant at, viris qualisque philosophia qui ea, causae percipit iudicabit pri ut. Justo blandit albucius pro ut, populo nominati quo no. Qui id alterum dolorem interesset, nam ne quod essent. Doming option recteque mei ne, admodum voluptaria ex eos.</p>\r\n<p>Tale augue mei et. Postea timeam delenit quo te, aliquip percipit abhorreant pri in. Te usu vidit qualisque disputationi, primis laboramus necessitatibus qui id. Ne voluptatibus comprehensam vel. Ut mea tota impedit, at scripta placerat suscipiantur nam, ea per dolore euismod expetendis. Eu agam ridens vis, no per alia mucius, an oporteat accusamus deterruisset vel.</p>\r\n<p>An ius verear voluptatibus, melius molestiae eum ea. Ridens labores eu vix, ad ignota probatus reprehendunt vis, et malorum disputando pri. Ea iudico petentium mel, prima maiestatis eum te. Fuisset suavitate no eam, et minim eripuit pro, alii adolescens conclusionemque in est. Eu usu adhuc quaeque scaevola.</p>\r\n<p>Eu assum zril ius, mel eu falli primis dolores. Sonet consulatu ei usu. Ad lorem fabulas nonumes pro, modo convenire liberavisse mel ad. Quo dicit omnes no. Audiam senserit cum cu, veri facete pro ad.</p>\r\n<p>Everti argumentum vel ea, ad melius bonorum recusabo mei. Per te vocent laboramus expetendis. No meliore convenire eos. No est facete tibique conclusionemque, qui viris phaedrum senserit ei.</p>\r\n<p>Mollis platonem convenire ut quo. Eam accumsan postulant cu, ut vel unum utinam scripserit, suas purto consetetur his id. Corpora sapientem ne nam. Id maiorum efficiantur per. Quo ne mundi ancillae vituperatoribus, ne eam integre inciderint. Ex probo assum duo.</p>\r\n<p>Ut mea aperiri constituam, dicunt quaestio usu te, eum te quod animal posidonium. In has phaedrum consequat, euripidis quaerendum id pro, etiam dicta integre vix eu. An quo offendit placerat dissentiunt. Quo veniam cotidieque philosophia in, ad eam tantas corpora disputando. Ex quas zril patrioque mea, no albucius mandamus sed.</p>', '2', 'post_1723483689.jpg', 'Sit tation tantas urbanitas eu.', 'Sit tation tantas urbanitas eu.', '2024-08-12 17:28:09', '2024-08-13 22:42:34'),
(4, 'Eos cu impetus expetenda, has no equidem saperet.', 'eos-cu-impetus-expetenda', 'Tritani dolorum salutandi cum in. Ea ius nostro vidisse hendrerit. Fabulas scaevola explicari et eam, per vide utinam contentiones id. At corrumpit mnesarchum duo, ad nisl verear equidem vel.', '<p>Tritani dolorum salutandi cum in. Ea ius nostro vidisse hendrerit. Fabulas scaevola explicari et eam, per vide utinam contentiones id. At corrumpit mnesarchum duo, ad nisl verear equidem vel. Mediocrem sadipscing vis id, no singulis interpretaris mel, mea no vocent detraxit. Labitur civibus vim id, sensibus salutandi his ei.</p>\r\n<p>Eam ut erant tibique suscipiantur. Nec stet sonet an, vim natum senserit deterruisset ut, nihil labitur adolescens ut per. Nam quem quod sadipscing ex. Doctus imperdiet duo ea, zril argumentum persequeris his ut.</p>\r\n<p>Ea reformidans consequuntur his, ad sed laudem diceret iudicabit. Te mel liber luptatum, unum natum impedit vis ad. Et erant utinam argumentum vim, audire percipitur ex sit. Numquam similique ea est.</p>\r\n<p>Mei veniam instructior ei. Vix ut imperdiet omittantur, no pro legere dissentias. Dicunt dissentiunt mediocritatem has at, sea at esse accommodare. Doctus mentitum ocurreret eu pri, qui at dictas epicurei concludaturque. Usu ea hinc noster singulis, usu hinc doctus corpora ad, dicta aeterno id vix.</p>\r\n<p>Id vide regione nostrum has, nec dicam labitur praesent ne. Rebum insolens no vix, cu nec verear discere. Graeco apeirian eos ex. Id elitr vocibus assueverit est. Est voluptua invidunt suscipiantur te. Usu delenit minimum ne.</p>', '3', 'post_1723483824.jpg', 'Eos cu impetus expetenda', 'Eos cu impetus expetenda', '2024-08-12 17:30:24', '2024-08-14 20:38:44'),
(5, 'An ius verear volupmolesti', 'an-ius-verear-voluptatibus', 'Tale augue mei et. Postea timeam delenit quo te, aliquip percipit abhorreant pri in. Te usu vidit qualisque disputationi, primis laboramus necessitatibus qui id. Ne voluptatibus comprehensam vel.', '<p>Tale augue mei et. Postea timeam delenit quo te, aliquip percipit abhorreant pri in. Te usu vidit qualisque disputationi, primis laboramus necessitatibus qui id. Ne voluptatibus comprehensam vel. Ut mea tota impedit, at scripta placerat suscipiantur nam, ea per dolore euismod expetendis. Eu agam ridens vis, no per alia mucius, an oporteat accusamus deterruisset vel.</p>\r\n<p>An ius verear voluptatibus, melius molestiae eum ea. Ridens labores eu vix, ad ignota probatus reprehendunt vis, et malorum disputando pri. Ea iudico petentium mel, prima maiestatis eum te. Fuisset suavitate no eam, et minim eripuit pro, alii adolescens conclusionemque in est. Eu usu adhuc quaeque scaevola.</p>\r\n<p>Eu assum zril ius, mel eu falli primis dolores. Sonet consulatu ei usu. Ad lorem fabulas nonumes pro, modo convenire liberavisse mel ad. Quo dicit omnes no. Audiam senserit cum cu, veri facete pro ad.</p>\r\n<p>Everti argumentum vel ea, ad melius bonorum recusabo mei. Per te vocent laboramus expetendis. No meliore convenire eos. No est facete tibique conclusionemque, qui viris phaedrum senserit ei.</p>\r\n<p>Mollis platonem convenire ut quo. Eam accumsan postulant cu, ut vel unum utinam scripserit, suas purto consetetur his id. Corpora sapientem ne nam. Id maiorum efficiantur per. Quo ne mundi ancillae vituperatoribus, ne eam integre inciderint. Ex probo assum duo.</p>\r\n<p>&nbsp;</p>', '4', 'post_1723483939.jpg', 'An ius verear volupmolesti', 'An ius verear volupmolesti', '2024-08-12 17:32:19', '2024-08-14 20:37:00'),
(6, 'Eam ut erant tibique suscipiantur. Nec stet sonet an, vim natum senserit deterruisset ut', 'eam-ut-erant-tibique-suscipiantur', 'Has ponderum postulant at, viris qualisque philosophia qui ea, causae percipit iudicabit pri ut.', '<p>Has ponderum postulant at, viris qualisque philosophia qui ea, causae percipit iudicabit pri ut. Justo blandit albucius pro ut, populo nominati quo no. Qui id alterum dolorem interesset, nam ne quod essent. Doming option recteque mei ne, admodum voluptaria ex eos.</p>\r\n<p>Tale augue mei et. Postea timeam delenit quo te, aliquip percipit abhorreant pri in. Te usu vidit qualisque disputationi, primis laboramus necessitatibus qui id. Ne voluptatibus comprehensam vel. Ut mea tota impedit, at scripta placerat suscipiantur nam, ea per dolore euismod expetendis. Eu agam ridens vis, no per alia mucius, an oporteat accusamus deterruisset vel.</p>\r\n<p>An ius verear voluptatibus, melius molestiae eum ea. Ridens labores eu vix, ad ignota probatus reprehendunt vis, et malorum disputando pri. Ea iudico petentium mel, prima maiestatis eum te. Fuisset suavitate no eam, et minim eripuit pro, alii adolescens conclusionemque in est. Eu usu adhuc quaeque scaevola.</p>\r\n<p>Eu assum zril ius, mel eu falli primis dolores. Sonet consulatu ei usu. Ad lorem fabulas nonumes pro, modo convenire liberavisse mel ad. Quo dicit omnes no. Audiam senserit cum cu, veri facete pro ad.</p>', '22', 'post_1723484079.jpg', 'Eam ut erant tibique suscipiantur.', 'Eam ut erant tibique suscipiantur.', '2024-08-12 17:34:39', '2024-08-17 19:22:55'),
(7, 'An ius verear voluptatibus.', 'modo-aperirii-ntegre-vix-an', 'Sit tation tantas urbanitas eu. Munere verear elaboraret eu mel, modo aperiri integre vix an.', '<p>Sit tation tantas urbanitas eu. Munere verear elaboraret eu mel, modo aperiri integre vix an. Ut utamur gloriatur scriptorem sea, sit consulatu constituam no, reque albucius at vim. Nam noster placerat eleifend te. Aliquam omittam eam an, agam nostrum pertinacia et sit.</p>\r\n<p>Pro ut vivendo principes, quot exerci tractatos at qui, inani minimum ex vix. Vitae epicurei vulputate usu no, usu ex modus ceteros recteque. Qui id amet nisl ullum, ei voluptaria incorrupte pri. Ad diceret accusamus duo.</p>\r\n<p>&nbsp;</p>\r\n<p>Graecis maiorum volutpat ei qui. Duo accusam senserit id, ea mel fabulas percipit, discere definitionem an mea. Mei iisque salutatus assueverit ut, nam aliquam ocurreret id. Eam sale homero alienum et, qui unum prima vivendo ea. Unum oportere est ea.</p>\r\n<p>Brute habemus vim ex. Eros meis argumentum in sit, his dolor reprimique id. Ut pro iriure fastidii, ex nam enim aliquip consetetur. Eos probo fabulas petentium ea.</p>\r\n<p>Has ponderum postulant at, viris qualisque philosophia qui ea, causae percipit iudicabit pri ut. Justo blandit albucius pro ut, populo nominati quo no. Qui id alterum dolorem interesset, nam ne quod essent. Doming option recteque mei ne, admodum voluptaria ex eos.</p>', '3', 'post_1723484443.jpg', 'An ius verear voluptatibus.', 'An ius verear voluptatibus.', '2024-08-12 17:40:43', '2024-09-02 13:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `pricing_page_items`
--

CREATE TABLE IF NOT EXISTS `pricing_page_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `heading` text NOT NULL,
  `title` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricing_page_items`
--

INSERT INTO `pricing_page_items` (`id`, `heading`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Pricing', 'Pricing SEO', 'Pricing DESC', NULL, '2024-08-18 10:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_page_items`
--

CREATE TABLE IF NOT EXISTS `privacy_page_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `heading` text NOT NULL,
  `content` text NOT NULL,
  `title` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_page_items`
--

INSERT INTO `privacy_page_items` (`id`, `heading`, `content`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p>', 'Privacy  title SEO', 'Privacy description SEO', NULL, '2024-08-17 14:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5ziXknxc2Fh6c5APiHZedaWEdtZuYrKTSSUEzqv7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOXZua2wxMHY1MUVQTHI2QnpvWHZ3SlFYUm5QQjJwcDJLckFiTmRvNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb21wYW55L2pvYnMiO31zOjU0OiJsb2dpbl9jb21wYW55XzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1725980594),
('KoDjDBcU1acQtwJpxMZHfRlfDAoZIIwe3GfFEDf9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:130.0) Gecko/20100101 Firefox/130.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiampJREdBcVBYY2FxdWl0R0tzbjc5MFp5Y1JlNXdCOUtuNjN3aWk1MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb21wYW55L2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTQ6ImxvZ2luX2NvbXBhbnlfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1725980871),
('ODy7QoVhSWmQ9w9vzaacMY8Tyz8aeuzX9QNz8REj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibkpTRkFIdXJuNGtDNjI2Q1UzeDJpblYzSERDd3B3M0V0cDNyMkVNQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYW5kaWRhdGUvZGFzaGJvYXJkIjt9czo1NjoibG9naW5fY2FuZGlkYXRlXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1726081937);

-- --------------------------------------------------------

--
-- Table structure for table `term_page_items`
--

CREATE TABLE IF NOT EXISTS `term_page_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `heading` text NOT NULL,
  `content` text NOT NULL,
  `title` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `term_page_items`
--

INSERT INTO `term_page_items` (`id`, `heading`, `content`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Terms of use', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p>', 'Terms of use seo', 'Terms of use', NULL, '2024-08-17 13:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `designation` text NOT NULL,
  `comment` text NOT NULL,
  `photo` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `comment`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Robert Krol', 'CEO, ABC Company', 'Lorem ipsum dolor sit amet. Qui quisquam fuga eum beatae illum ea omnis esse et sapiente quis qui dolor quis non odio dolores ut quasi officiis. Est sint inventore aut quisquam veniam qui consequatur accusantium sit error nihil.', 'testimonial_1723472928.jpg', '2024-08-12 11:40:23', '2024-08-12 14:29:34'),
(2, 'Sal Harvey', 'Director, DEF Company', 'Ut minima veritatis ut aspernatur voluptatem et voluptatem distinctio qui sequi molestiae non consequatur illum et expedita molestias et delectus galisum. In tenetur voluptas aut minus quia et autem magnam.', 'testimonial_1723462967.jpg', '2024-08-12 11:42:47', '2024-08-12 11:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_items`
--

CREATE TABLE IF NOT EXISTS `why_choose_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `icon` text NOT NULL,
  `heading` text NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_choose_items`
--

INSERT INTO `why_choose_items` (`id`, `icon`, `heading`, `text`, `created_at`, `updated_at`) VALUES
(1, 'fas fa-briefcase', 'Quick Apply', 'You can just create your account in our website and apply for desired job very quickly.', '2024-08-11 21:54:56', '2024-08-12 09:13:54'),
(2, 'fas fa-search', 'Search Tool', 'We provide a perfect and advanced search tool for job seekers, employers or companies.', '2024-08-11 21:55:50', '2024-08-11 21:55:50'),
(3, 'fas fa-share-alt', 'Best Companies', 'The best and reputed worldwide companies registered here and so you will get the quality jobs.', '2024-08-11 21:57:21', '2024-08-11 21:57:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
