-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2024 at 08:16 PM
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
(1, 'Richard Mickypary', 'mikipary@gmail.com', '$2y$12$NY5IRcNll/um/OWeDE.US.lR39jSYyYejmG6cYWxnqGLyn5dMgmWy', 'admin.png', '', NULL, '2024-08-10 11:15:09');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_page_items`
--

INSERT INTO `home_page_items` (`id`, `heading`, `text`, `job_title`, `job_category`, `job_location`, `search`, `background_image`, `job_category_heading`, `job_category_subheading`, `job_category_status`, `why_choose_us_heading`, `why_choose_us_subheading`, `why_choose_us_background`, `why_choose_us_status`, `featured_jobs_heading`, `featured_jobs_subheading`, `featured_jobs_status`, `testimonial_heading`, `testimonial_background`, `testimonial_status`, `blog_heading`, `blog_subheading`, `blog_status`, `created_at`, `updated_at`) VALUES
(1, 'Find Your Desired Job', 'Search the best, perfect and suitable jobs that matches your skills in your expertise area.', 'Job Title', 'Job Category', 'Job Location', 'Search', 'banner_home.jpg', 'Job Categories', 'Get the list of all the popular job categories here', 'Show', 'Why Choose Us', 'Our Methods to help you build your career in future', 'why_choose_home_background.jpg', 'Show', 'Featured Jobs', 'Find the awesome jobs that matches your skill', 'Show', 'Our Happy Clients', 'testimonial_home_background.jpg', 'Show', 'Latest News', 'Check our latest news from the following section', 'Show', NULL, '2024-08-13 17:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(11, '2024_08_13_183720_create_faqs_table', 8);

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
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `total_view` text NOT NULL,
  `photo` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `short_description`, `description`, `total_view`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, et pro iusto malorum nostrud, eu graeco verear assueverit sit', 'lorem-ipsum-dolor-sit-amet', 'Lorem ipsum dolor sit amet, et pro iusto malorum nostrud, eu graeco verear assueverit sit, magna constituam eum an. Et mutat doming eum, assum percipit at pro. Alterum constituam ad ius. Cu quo atqui utinam, malorum abhorreant vim ex.', '<p>At vide appetere neglegentur nec, cu porro nulla signiferumque ius, vix numquam complectitur eu. In congue habemus nam. Eu congue mucius admodum quo, labore civibus propriae has no. Cum cu minim diceret phaedrum. Perpetua pertinacia intellegam mei an, eu eos fugit animal, an sit fierent salutandi.</p>\r\n<p>&nbsp;</p>\r\n<p>Est natum graece volumus at, mei omnesque prodesset constituam ut. Ex ullum alienum indoctum per, usu reque partem oporteat ne, qui affert noluisse copiosae ea. Usu quas accusamus an. Ius laboramus scribentur in. An mel hinc adversarium.</p>\r\n<p>&nbsp;</p>\r\n<p>Pri no fugit iusto. Ex placerat consequuntur sed, ponderum imperdiet id vis. Eu odio mollis habemus per, probatus vituperatoribus sed cu, id dicunt vocent sit. Id mei veniam quidam atomorum.</p>\r\n<p>&nbsp;</p>\r\n<p>Aeque nullam conclusionemque ex eam. Pri veniam bonorum antiopam cu. Vim numquam perfecto consetetur ne, brute justo no pri. Sale bonorum torquatos vim an. Scripta persius mel ei, viris offendit dissentiet no vix, malorum vivendo inimicus eam eu. Est libris aeterno virtute ei.</p>', '0', 'post_1723483219.jpg', '2024-08-12 17:20:19', '2024-08-12 17:20:19'),
(2, 'Nec in rebum primis causae. Affert iisque ex pri, vis utinam vivendo definitionem ad, nostrum omnes que per et.', 'nec-in-rebum-primis-causa-effert-iisque-ex-pri', 'At vide appetere neglegentur nec, cu porro nulla signiferumque ius, vix numquam complectitur eu. In congue habemus nam. Eu congue mucius admodum quo, labore civibus propriae has no. Cum cu minim diceret phaedrum.', '<p>At vide appetere neglegentur nec, cu porro nulla signiferumque ius, vix numquam complectitur eu. In congue habemus nam. Eu congue mucius admodum quo, labore civibus propriae has no. Cum cu minim diceret phaedrum. Perpetua pertinacia intellegam mei an, eu eos fugit animal, an sit fierent salutandi.</p>\r\n<p>&nbsp;</p>\r\n<p>Est natum graece volumus at, mei omnesque prodesset constituam ut. Ex ullum alienum indoctum per, usu reque partem oporteat ne, qui affert noluisse copiosae ea. Usu quas accusamus an. Ius laboramus scribentur in. An mel hinc adversarium.</p>\r\n<p>&nbsp;</p>\r\n<p>Pri no fugit iusto. Ex placerat consequuntur sed, ponderum imperdiet id vis. Eu odio mollis habemus per, probatus vituperatoribus sed cu, id dicunt vocent sit. Id mei veniam quidam atomorum.</p>\r\n<p>&nbsp;</p>\r\n<p>Aeque nullam conclusionemque ex eam. Pri veniam bonorum antiopam cu. Vim numquam perfecto consetetur ne, brute justo no pri. Sale bonorum torquatos vim an. Scripta persius mel ei, viris offendit dissentiet no vix,</p>', '0', 'post_1723483426.jpg', '2024-08-12 17:23:46', '2024-08-12 17:23:46'),
(3, 'Sit tation tantas urbanitas eu. Munere verear elaboraret eu mel, modo aperiri integre vix an.', 'ad-nisl-verear-equidem-vel', 'Graecis maiorum volutpat ei qui. Duo accusam senserit id, ea mel fabulas percipit, discere definitionem an mea.', '<p>Graecis maiorum volutpat ei qui. Duo accusam senserit id, ea mel fabulas percipit, discere definitionem an mea. Mei iisque salutatus assueverit ut, nam aliquam ocurreret id. Eam sale homero alienum et, qui unum prima vivendo ea. Unum oportere est ea.</p>\r\n<p>Brute habemus vim ex. Eros meis argumentum in sit, his dolor reprimique id. Ut pro iriure fastidii, ex nam enim aliquip consetetur. Eos probo fabulas petentium ea.</p>\r\n<p>Has ponderum postulant at, viris qualisque philosophia qui ea, causae percipit iudicabit pri ut. Justo blandit albucius pro ut, populo nominati quo no. Qui id alterum dolorem interesset, nam ne quod essent. Doming option recteque mei ne, admodum voluptaria ex eos.</p>\r\n<p>Tale augue mei et. Postea timeam delenit quo te, aliquip percipit abhorreant pri in. Te usu vidit qualisque disputationi, primis laboramus necessitatibus qui id. Ne voluptatibus comprehensam vel. Ut mea tota impedit, at scripta placerat suscipiantur nam, ea per dolore euismod expetendis. Eu agam ridens vis, no per alia mucius, an oporteat accusamus deterruisset vel.</p>\r\n<p>An ius verear voluptatibus, melius molestiae eum ea. Ridens labores eu vix, ad ignota probatus reprehendunt vis, et malorum disputando pri. Ea iudico petentium mel, prima maiestatis eum te. Fuisset suavitate no eam, et minim eripuit pro, alii adolescens conclusionemque in est. Eu usu adhuc quaeque scaevola.</p>\r\n<p>Eu assum zril ius, mel eu falli primis dolores. Sonet consulatu ei usu. Ad lorem fabulas nonumes pro, modo convenire liberavisse mel ad. Quo dicit omnes no. Audiam senserit cum cu, veri facete pro ad.</p>\r\n<p>Everti argumentum vel ea, ad melius bonorum recusabo mei. Per te vocent laboramus expetendis. No meliore convenire eos. No est facete tibique conclusionemque, qui viris phaedrum senserit ei.</p>\r\n<p>Mollis platonem convenire ut quo. Eam accumsan postulant cu, ut vel unum utinam scripserit, suas purto consetetur his id. Corpora sapientem ne nam. Id maiorum efficiantur per. Quo ne mundi ancillae vituperatoribus, ne eam integre inciderint. Ex probo assum duo.</p>\r\n<p>Ut mea aperiri constituam, dicunt quaestio usu te, eum te quod animal posidonium. In has phaedrum consequat, euripidis quaerendum id pro, etiam dicta integre vix eu. An quo offendit placerat dissentiunt. Quo veniam cotidieque philosophia in, ad eam tantas corpora disputando. Ex quas zril patrioque mea, no albucius mandamus sed.</p>', '2', 'post_1723483689.jpg', '2024-08-12 17:28:09', '2024-08-13 15:26:28'),
(4, 'Eos cu impetus expetenda, has no equidem saperet.', 'eos-cu-impetus-expetenda', 'Tritani dolorum salutandi cum in. Ea ius nostro vidisse hendrerit. Fabulas scaevola explicari et eam, per vide utinam contentiones id. At corrumpit mnesarchum duo, ad nisl verear equidem vel.', '<p>Tritani dolorum salutandi cum in. Ea ius nostro vidisse hendrerit. Fabulas scaevola explicari et eam, per vide utinam contentiones id. At corrumpit mnesarchum duo, ad nisl verear equidem vel. Mediocrem sadipscing vis id, no singulis interpretaris mel, mea no vocent detraxit. Labitur civibus vim id, sensibus salutandi his ei.</p>\r\n<p>&nbsp;</p>\r\n<p>Eam ut erant tibique suscipiantur. Nec stet sonet an, vim natum senserit deterruisset ut, nihil labitur adolescens ut per. Nam quem quod sadipscing ex. Doctus imperdiet duo ea, zril argumentum persequeris his ut.</p>\r\n<p>&nbsp;</p>\r\n<p>Ea reformidans consequuntur his, ad sed laudem diceret iudicabit. Te mel liber luptatum, unum natum impedit vis ad. Et erant utinam argumentum vim, audire percipitur ex sit. Numquam similique ea est.</p>\r\n<p>&nbsp;</p>\r\n<p>Mei veniam instructior ei. Vix ut imperdiet omittantur, no pro legere dissentias. Dicunt dissentiunt mediocritatem has at, sea at esse accommodare. Doctus mentitum ocurreret eu pri, qui at dictas epicurei concludaturque. Usu ea hinc noster singulis, usu hinc doctus corpora ad, dicta aeterno id vix.</p>\r\n<p>&nbsp;</p>\r\n<p>Id vide regione nostrum has, nec dicam labitur praesent ne. Rebum insolens no vix, cu nec verear discere. Graeco apeirian eos ex. Id elitr vocibus assueverit est. Est voluptua invidunt suscipiantur te. Usu delenit minimum ne.</p>', '1', 'post_1723483824.jpg', '2024-08-12 17:30:24', '2024-08-13 15:27:26'),
(5, 'An ius verear volupmolesti', 'an-ius-verear-voluptatibus', 'Tale augue mei et. Postea timeam delenit quo te, aliquip percipit abhorreant pri in. Te usu vidit qualisque disputationi, primis laboramus necessitatibus qui id. Ne voluptatibus comprehensam vel.', '<p>Tale augue mei et. Postea timeam delenit quo te, aliquip percipit abhorreant pri in. Te usu vidit qualisque disputationi, primis laboramus necessitatibus qui id. Ne voluptatibus comprehensam vel. Ut mea tota impedit, at scripta placerat suscipiantur nam, ea per dolore euismod expetendis. Eu agam ridens vis, no per alia mucius, an oporteat accusamus deterruisset vel.</p>\r\n<p>&nbsp;</p>\r\n<p>An ius verear voluptatibus, melius molestiae eum ea. Ridens labores eu vix, ad ignota probatus reprehendunt vis, et malorum disputando pri. Ea iudico petentium mel, prima maiestatis eum te. Fuisset suavitate no eam, et minim eripuit pro, alii adolescens conclusionemque in est. Eu usu adhuc quaeque scaevola.</p>\r\n<p>&nbsp;</p>\r\n<p>Eu assum zril ius, mel eu falli primis dolores. Sonet consulatu ei usu. Ad lorem fabulas nonumes pro, modo convenire liberavisse mel ad. Quo dicit omnes no. Audiam senserit cum cu, veri facete pro ad.</p>\r\n<p>&nbsp;</p>\r\n<p>Everti argumentum vel ea, ad melius bonorum recusabo mei. Per te vocent laboramus expetendis. No meliore convenire eos. No est facete tibique conclusionemque, qui viris phaedrum senserit ei.</p>\r\n<p>&nbsp;</p>\r\n<p>Mollis platonem convenire ut quo. Eam accumsan postulant cu, ut vel unum utinam scripserit, suas purto consetetur his id. Corpora sapientem ne nam. Id maiorum efficiantur per. Quo ne mundi ancillae vituperatoribus, ne eam integre inciderint. Ex probo assum duo.</p>\r\n<p>&nbsp;</p>', '1', 'post_1723483939.jpg', '2024-08-12 17:32:19', '2024-08-13 17:21:28'),
(6, 'Eam ut erant tibique suscipiantur. Nec stet sonet an, vim natum senserit deterruisset ut', 'eam-ut-erant-tibique-suscipiantur', 'Has ponderum postulant at, viris qualisque philosophia qui ea, causae percipit iudicabit pri ut.', '<p>Has ponderum postulant at, viris qualisque philosophia qui ea, causae percipit iudicabit pri ut. Justo blandit albucius pro ut, populo nominati quo no. Qui id alterum dolorem interesset, nam ne quod essent. Doming option recteque mei ne, admodum voluptaria ex eos.</p>\r\n<p>&nbsp;</p>\r\n<p>Tale augue mei et. Postea timeam delenit quo te, aliquip percipit abhorreant pri in. Te usu vidit qualisque disputationi, primis laboramus necessitatibus qui id. Ne voluptatibus comprehensam vel. Ut mea tota impedit, at scripta placerat suscipiantur nam, ea per dolore euismod expetendis. Eu agam ridens vis, no per alia mucius, an oporteat accusamus deterruisset vel.</p>\r\n<p>&nbsp;</p>\r\n<p>An ius verear voluptatibus, melius molestiae eum ea. Ridens labores eu vix, ad ignota probatus reprehendunt vis, et malorum disputando pri. Ea iudico petentium mel, prima maiestatis eum te. Fuisset suavitate no eam, et minim eripuit pro, alii adolescens conclusionemque in est. Eu usu adhuc quaeque scaevola.</p>\r\n<p>&nbsp;</p>\r\n<p>Eu assum zril ius, mel eu falli primis dolores. Sonet consulatu ei usu. Ad lorem fabulas nonumes pro, modo convenire liberavisse mel ad. Quo dicit omnes no. Audiam senserit cum cu, veri facete pro ad.</p>', '1', 'post_1723484079.jpg', '2024-08-12 17:34:39', '2024-08-13 17:21:23'),
(7, 'An ius verear voluptatibus.', 'modo-aperirii-ntegre-vix-an', 'Sit tation tantas urbanitas eu. Munere verear elaboraret eu mel, modo aperiri integre vix an.', '<p>Sit tation tantas urbanitas eu. Munere verear elaboraret eu mel, modo aperiri integre vix an. Ut utamur gloriatur scriptorem sea, sit consulatu constituam no, reque albucius at vim. Nam noster placerat eleifend te. Aliquam omittam eam an, agam nostrum pertinacia et sit.</p>\r\n<p>Pro ut vivendo principes, quot exerci tractatos at qui, inani minimum ex vix. Vitae epicurei vulputate usu no, usu ex modus ceteros recteque. Qui id amet nisl ullum, ei voluptaria incorrupte pri. Ad diceret accusamus duo.</p>\r\n<p>&nbsp;</p>\r\n<p>Graecis maiorum volutpat ei qui. Duo accusam senserit id, ea mel fabulas percipit, discere definitionem an mea. Mei iisque salutatus assueverit ut, nam aliquam ocurreret id. Eam sale homero alienum et, qui unum prima vivendo ea. Unum oportere est ea.</p>\r\n<p>Brute habemus vim ex. Eros meis argumentum in sit, his dolor reprimique id. Ut pro iriure fastidii, ex nam enim aliquip consetetur. Eos probo fabulas petentium ea.</p>\r\n<p>Has ponderum postulant at, viris qualisque philosophia qui ea, causae percipit iudicabit pri ut. Justo blandit albucius pro ut, populo nominati quo no. Qui id alterum dolorem interesset, nam ne quod essent. Doming option recteque mei ne, admodum voluptaria ex eos.</p>', '0', 'post_1723484443.jpg', '2024-08-12 17:40:43', '2024-08-12 17:40:43');

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
('rgPO6Ge1ocg0LzmH32sLPXSvmbyY7R31tsWTFIuQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN0prNFU2cXdiSGVHM090T3RVZkFvMjhibTNjczNWR2R5bFRiVnRqdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9mYXEvdmlldyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1723572837);

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
