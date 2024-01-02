-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 31, 2023 at 11:20 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_profile`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_blog` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `tanggal`, `title`, `title_en`, `slug`, `body`, `body_en`, `category_id`, `user_id`, `image_blog`, `is_active`, `views`, `created_at`, `updated_at`) VALUES
(3, '2023-12-13', 'Proyek Tanggerang Selatan', 'South Tangerang Project', 'proyek-tanggerang-selatan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudanti...', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudanti...', 5, 1, 'blog/1omcPVRjFIwFiVsA35M8DZQrsI1yKDoYqs3hKfDV.jpg', 1, 0, '2023-12-25 09:37:24', '2023-12-30 23:21:38'),
(4, '2023-12-13', 'Proyek Rumah Susun', 'Flats Project', 'proyek-rumah-susun', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudanti...', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudanti...', 5, 1, 'blog/XELpNHyZjEBimUETqAvy3WjEgwu3V7HNtDPtXWOs.jpg', 1, 0, '2023-12-25 10:30:36', '2023-12-30 23:24:29'),
(7, '2023-12-07', 'Proyek Perumahan di Cilejit', 'Housing Project in Cilejit', 'proyek-perumahan-di-cilejit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudanti...', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudanti...', 5, 1, 'blog/rRYCC6sw6Jc6fnPbCLhcnj7WifPAoS8N47GNsrkv.jpg', 1, 0, '2023-12-25 20:37:30', '2023-12-30 23:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Manage Image Slider', 'manage-image-slider', NULL, '2023-12-25 00:56:25'),
(3, 'Manage Youtube Video', 'manage-youtube-video', NULL, '2023-12-25 00:57:24'),
(4, 'Manage Static text', 'manage-static-text', '2023-12-25 00:36:19', '2023-12-25 00:57:41'),
(5, 'Manage Blog / News', 'manage-blog-news', '2023-12-25 00:57:58', '2023-12-25 00:57:58'),
(6, 'Manage Partner Logo', 'manage-partner-logo', '2023-12-25 00:58:17', '2023-12-25 00:58:17'),
(7, 'Manage Contact Data', 'manage-contact-data', '2023-12-25 00:58:34', '2023-12-25 00:58:34'),
(8, 'Manage Organization Profile', 'manage-organization-profile', '2023-12-25 00:58:58', '2023-12-25 00:58:58'),
(9, 'Manage Photo Gallery', 'manage-photo-gallery', '2023-12-26 05:31:22', '2023-12-26 05:31:22'),
(10, 'Manage Visi Dan Misi', 'manage-visi-dan-misi', '2023-12-27 08:30:01', '2023-12-27 08:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_slider`
--

CREATE TABLE `image_slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_slider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_slider_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `images_slider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_slider`
--

INSERT INTO `image_slider` (`id`, `title_slider`, `title_slider_en`, `slug`, `body`, `body_en`, `category_id`, `user_id`, `images_slider`, `is_active`, `views`, `created_at`, `updated_at`) VALUES
(4, 'INSPIRASI RUMAH MINIMALIS', 'MINIMALIST HOME INSPIRATION', 'inspirasi-rumah-minimalis', 'Dengan konsep modern, sederhana, dan estetika.', 'With a modern, simple and aesthetic concept.', 1, 1, 'image_slider/mFXxXycQZ3BXRFzRhBOhEzoNhH80giLA1JG6oNsg.png', 1, 0, '2023-12-26 01:06:05', '2023-12-30 02:40:37'),
(5, 'INSPIRASI RUMAH 2 LANTAI', '2 STORY HOUSE INSPIRATION', 'inspirasi-rumah-2-lantai', 'Konsep rumah 2 lantai dengan tampilan estetik.', '2-story house concept with an aesthetic appearance.', 1, 1, 'image_slider/vqF8PwgbySfFIc7mZJNSG41JGICBnaVkiggXWQZ1.png', 1, 0, '2023-12-26 01:07:03', '2023-12-30 22:29:59'),
(6, 'INSPIRASI RUMAH KAYU', 'WOODEN HOUSE INSPIRATION', 'inspirasi-rumah-kayu', 'Rumah sederhana dengan konsep dekorasi kayu.', 'Simple house with wooden decoration concept.', 1, 1, 'image_slider/Omahr7DvlxuI3jQzhfUreDl6c8ke4y76KPTSLxDJ.png', 1, 0, '2023-12-26 01:07:34', '2023-12-30 22:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `jasas`
--

CREATE TABLE `jasas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_jasa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_jasa_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_jasa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_jasa_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jasas`
--

INSERT INTO `jasas` (`id`, `title_jasa`, `title_jasa_en`, `body_jasa`, `body_jasa_en`, `slug`, `category_id`, `user_id`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'Jasa Properti', 'Property Services', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore fragrant ex magni, dicta impedit.', 'jasa-properti', 4, 1, 1, '2023-12-27 06:57:29', '2023-12-30 22:40:06'),
(3, 'Jasa Renovasi', 'Renovation Services', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore fragrant ex magni, dicta impedit.', 'jasa-renovasi', 4, 1, 1, '2023-12-28 10:30:10', '2023-12-30 22:41:11'),
(4, 'Jual Beli Asset', 'Buying and Selling Assets', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.', 'jual-beli-asset', 4, 1, 1, '2023-12-28 10:30:32', '2023-12-30 22:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 'Ujang', 'ujang@gmail.com', '12345432343', 'sdasd sadasd', '2023-12-28 01:43:49', '2023-12-28 01:43:49'),
(2, 'budi', 'budi@gmail.com', '12345678912', 'ssdasd sadasd sadasd', '2023-12-28 01:47:40', '2023-12-28 01:47:40'),
(3, 'sdsd', 'ssfdf@gmail.com', '123453212343', 'bbbbbbbb', '2023-12-28 01:51:30', '2023-12-28 01:51:30'),
(4, 'dadasdd', 'adasdsad@gmail.com', '123422123432', 'bbbb bbbbb bbbbbbbbbb', '2023-12-28 01:53:02', '2023-12-28 01:53:02'),
(6, 'Tatang', 'tatang@gmail.com', '123454323223', 'pesan tatang', '2023-12-28 19:42:59', '2023-12-28 19:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_19_042001_create_posts_table', 1),
(6, '2023_12_20_154124_create_categories_table', 1),
(7, '2023_12_23_025023_create_image_sliders_table', 2),
(8, '2023_12_23_173853_create_galeris_table', 3),
(9, '2023_12_24_135515_create_imagesliders_table', 4),
(10, '2023_12_25_013514_create_imagesliders_table', 5),
(11, '2023_12_25_014646_create_image_sliders_table', 6),
(12, '2023_12_25_015643_create_image_sliders_table', 7),
(13, '2023_12_25_081402_create_static_text_table', 8),
(14, '2023_12_25_082140_create_blog_table', 8),
(15, '2023_12_25_145922_create_blogs_table', 9),
(16, '2023_12_25_154028_create_blog_table', 10),
(17, '2023_12_25_155118_create_blog_table', 11),
(18, '2023_12_25_155322_create_blog_table', 12),
(19, '2023_12_26_031818_add_tanggal_to_blog', 13),
(20, '2023_12_26_050124_create_image_slider_table', 14),
(21, '2023_12_26_082452_create_photo_gallery_table', 15),
(22, '2023_12_26_083040_create_photo_gallery_table', 16),
(23, '2023_12_26_083139_create_photo_gallery_table', 17),
(24, '2023_12_27_014527_create_youtubes_table', 18),
(25, '2023_12_27_062811_create_text_intros_table', 19),
(26, '2023_12_27_081747_create_jasas_table', 20),
(27, '2023_12_27_082618_create_jasas_table', 21),
(28, '2023_12_27_142235_create_visi__misis_table', 22),
(29, '2023_12_27_142627_create_visi__misis_table', 23),
(30, '2023_12_27_163305_create_partners_table', 24),
(31, '2023_12_28_071224_create_messages_table', 25),
(32, '2023_12_28_142234_create_profiles_table', 26),
(33, '2023_12_28_155405_create_sosmeds_table', 27),
(34, '2023_12_30_082336_add_title_intro_en_to_text_intros_table', 28);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_partner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name_partner`, `slug`, `category_id`, `user_id`, `logo`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Home Build', 'home-build', 6, 1, 'partners/HJ85wZiuMMobDzuGty7gjFLQ0gVb9opLyps9MmwH.png', 1, '2023-12-27 10:20:05', '2023-12-28 10:34:04'),
(3, 'Build High', 'build-high', 6, 1, 'partners/bkdIlNo3XArmSinfEkAOuLLgO4muxnM5W0uzRBuz.png', 1, '2023-12-28 10:34:32', '2023-12-28 10:34:32'),
(4, 'Arsy Property', 'arsy-property', 6, 1, 'partners/aeaA5oCElHdx4RIhNYU8hliKAiKhRc1xFgFCakhf.png', 1, '2023-12-28 10:35:04', '2023-12-28 10:35:04'),
(5, 'LTD Properties, LLC', 'ltd-properties-llc', 6, 1, 'partners/NmfSbP15x8OS6L8NiGqSrC15OWBMst0aI2DJGIKV.png', 1, '2023-12-28 10:35:45', '2023-12-28 10:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_gallery`
--

CREATE TABLE `photo_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_photo_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_gallery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo_gallery`
--

INSERT INTO `photo_gallery` (`id`, `title_photo`, `title_photo_en`, `slug`, `body`, `body_en`, `category_id`, `user_id`, `image_gallery`, `is_active`, `views`, `created_at`, `updated_at`) VALUES
(4, 'Contoh dekorasi ruang keluarga', 'Example of family room decoration', 'contoh-dekorasi-ruang-keluarga', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia e...', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia e...', 9, 1, 'photo_gallery/Jqh56R5jID2Xiw5gAp4HFnqqi4klaAjFppfGF6Qa.png', 1, 0, '2023-12-26 06:39:53', '2023-12-30 22:56:07'),
(5, 'Contoh dekorasi dinding', 'Example of wall decoration', 'contoh-dekorasi-dinding', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia e...', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia e...', 9, 1, 'photo_gallery/IRJqqmyPMPSCktwecShWXspjQkvNspEApJoiAVME.png', 1, 0, '2023-12-26 06:42:19', '2023-12-30 22:57:42'),
(9, 'Contoh dekorasi halaman depan rumah', 'Example of front yard decoration', 'contoh-dekorasi-halaman-depan-rumah', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia e...', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia e...', 1, 1, 'photo_gallery/hAmhqCM2ZDLWnscVYsE0ePW9w1ULC0lqgOzFKsui.png', 1, 0, '2023-12-26 08:47:23', '2023-12-30 22:58:00'),
(10, 'Contoh dekorasi halaman belakang rumah', 'Example of backyard decoration', 'contoh-dekorasi-halaman-belakang-rumah', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia e...', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia e...', 1, 1, 'photo_gallery/Zz7K8ktRz7ASyeUtH2M2Y05jYFIfqZ00eQZfiG4T.png', 1, 0, '2023-12-26 08:48:17', '2023-12-30 22:58:19'),
(11, 'Contoh dekorasi halaman', 'Example of page decoration', 'contoh-dekorasi-halaman', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia e...', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia e...', 9, 1, 'photo_gallery/aTbX7TDBCdY8ZIFBfh0OxNBfsH6oEY8yEefts3Ba.png', 1, 0, '2023-12-26 08:49:01', '2023-12-30 22:58:40'),
(12, 'Contoh dekorasi halamn depan rumah', 'Example of front yard decoration', 'contoh-dekorasi-halamn-depan-rumah', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia e...', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia e...', 9, 1, 'photo_gallery/09edLzJ1jvKeCfTKxhfKEUKZNZEpM8EwsxaxgelP.png', 1, 0, '2023-12-26 08:49:38', '2023-12-30 22:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `image`, `excerpt`, `body`, `published_at`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'INSPIRASI RUMAH KAYU', 'inspirasi-rumah-kayu', 'post-images/UUdniU4KjwJyHqArWW34vGr7r4ItGdjhSjtSQJK6.png', 'Rumah sederhana dengan konsep dekorasi kayu.', '<div>Rumah sederhana dengan konsep dekorasi kayu.</div>', NULL, '2023-12-23 09:58:12', '2023-12-23 09:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `phone`, `address`, `email`, `category_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '022-112233', 'jl.lorem ipsum si amet denim', 'rumahsolusi@gmail.com', 8, 1, '2023-12-28 08:25:40', '2023-12-28 10:37:02');

-- --------------------------------------------------------

--
-- Table structure for table `sosmeds`
--

CREATE TABLE `sosmeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_sosmed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sosmeds`
--

INSERT INTO `sosmeds` (`id`, `title_sosmed`, `slug`, `link`, `category_id`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Facebook edit', 'facebook-edit', 'www.facebook.com', 8, 'sosmeds/OTkNCrjm8VPIWdFSQD80V5DhskC2gQlgK9GQlvqH.png', '2023-12-28 09:22:00', '2023-12-28 10:40:19'),
(4, 'Twitter', 'twitter', 'www.twitter.com', 8, 'sosmed/mQspOfl7VyD4eU2hstou0QxxjDb0SgLXn2LPY7lA.png', '2023-12-28 10:43:48', '2023-12-28 10:43:48'),
(5, 'Instagram', 'instagram', 'www.instagram.com', 8, 'sosmed/7OVfp7HJKLf0mLSya1lPfRaF67q9hsLfZ8QpvRuC.png', '2023-12-28 10:45:04', '2023-12-28 10:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `text_intros`
--

CREATE TABLE `text_intros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_intro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_intro_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_intro_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `text_intros`
--

INSERT INTO `text_intros` (`id`, `title_intro`, `title_intro_en`, `body_intro`, `body_intro_en`, `slug`, `category_id`, `user_id`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'Selamat Datang di Solusi rumah!', 'Welcome to Home Solutions!', 'SENANG BERTEMU DENGAN MU', 'PLEASED TO MEET YOU', 'selamat-datang-di-solusi-rumah', 4, 1, 1, '2023-12-27 00:41:39', '2023-12-30 22:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin01', 'admin@gmail.com', NULL, '$2y$10$S8OlrpUr9UWQ44z0XWut3uw0U9LoYH7MOLShaj2dOWav2xlcdCt0q', NULL, '2023-12-21 09:29:02', '2023-12-21 09:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `visi_misis`
--

CREATE TABLE `visi_misis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visi_misis`
--

INSERT INTO `visi_misis` (`id`, `title`, `title_en`, `body`, `body_en`, `slug`, `category_id`, `user_id`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'VISI', 'VISION', 'Berperan serta membangun negeri dalam bidang properti dan atau yang terkait dengan properti yang akan memberi manfaat bagi masyarakat.Menjadi perusahaan pengembang properti yang dipercaya dan dihormat...', 'Play a role in developing the country in the field of property and/or related to property which will provide benefits to the community. Become a property development company that is trusted and respec...', 'visi', 10, 1, 1, '2023-12-27 09:11:14', '2023-12-30 23:30:09'),
(3, 'MISI', 'MISSION', 'Menjadi perusahaan yang terdepan, unggul, professional dan menguntungkan.Memberikan pelayanan yang berkualitas dan berdaya guna untuk menciptakan kepuasan konsumen.Mengembangkan perumahan dengan kuali...', 'To become a leading, superior, professional and profitable company. Providing quality and effective services to create consumer satisfaction. Developing high quality housing...', 'misi', 10, 1, 1, '2023-12-27 09:26:03', '2023-12-30 23:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `youtubes`
--

CREATE TABLE `youtubes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_video_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `cover` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `youtubes`
--

INSERT INTO `youtubes` (`id`, `title_video`, `title_video_en`, `slug`, `link`, `category_id`, `is_active`, `cover`, `created_at`, `updated_at`) VALUES
(2, 'Rumah Mewah Di Cluster Premium', 'Luxury House in Premium Cluster', 'rumah-mewah-di-cluster-premium', 'https://www.youtube.com/embed/eVLRYDl8StA?si=HRwbr5FNDaaM0xqx\" title=\"YouTube video player', 3, 1, 'youtube/Nwmk99qGAEwBsE0IrhkArSGs4CnfCMUJNx7lqSee.jpg', '2023-12-26 19:58:37', '2023-12-30 23:07:52'),
(3, 'Konsep Interior Bergaya Modern', 'Modern Style Interior Concept', 'konsep-interior-bergaya-modern', 'https://www.youtube.com/embed/p-Pd_o1Xmlo?si=xNHARHRTxAs7UwSe\" title=\"YouTube video player', 3, 1, 'youtube/IcJqneSm2hj9GKnuZnGaNxgLaf2fsInS1JoqFY9J.jpg', '2023-12-28 10:25:06', '2023-12-30 23:08:15'),
(4, 'Konsep Rumah Menggunakan Desain 3D', 'House Concept Using 3D Design', 'konsep-rumah-menggunakan-desain-3d', 'https://www.youtube.com/embed/kh2zop4osdM?si=vQZ-pYDIwpEi1u0Q\" title=\"YouTube video player', 3, 1, 'youtube/OsecDYC2EC00OOG23AC9rkuBFkZSj1O6MH2DN6ak.jpg', '2023-12-28 10:27:57', '2023-12-30 23:08:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `image_slider`
--
ALTER TABLE `image_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasas`
--
ALTER TABLE `jasas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `messages_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photo_gallery`
--
ALTER TABLE `photo_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profiles_email_unique` (`email`);

--
-- Indexes for table `sosmeds`
--
ALTER TABLE `sosmeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `text_intros`
--
ALTER TABLE `text_intros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visi_misis`
--
ALTER TABLE `visi_misis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youtubes`
--
ALTER TABLE `youtubes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_slider`
--
ALTER TABLE `image_slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jasas`
--
ALTER TABLE `jasas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_gallery`
--
ALTER TABLE `photo_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sosmeds`
--
ALTER TABLE `sosmeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `text_intros`
--
ALTER TABLE `text_intros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visi_misis`
--
ALTER TABLE `visi_misis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `youtubes`
--
ALTER TABLE `youtubes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
