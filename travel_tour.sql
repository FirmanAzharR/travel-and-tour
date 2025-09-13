-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2025 at 06:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_tour`
--

-- --------------------------------------------------------

--
-- Table structure for table `airport_travel_booking`
--

CREATE TABLE `airport_travel_booking` (
  `id` int(11) NOT NULL,
  `wa_number` varchar(20) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `pickup_address` text DEFAULT NULL,
  `airport_name` varchar(100) DEFAULT NULL,
  `destination_address` text DEFAULT NULL,
  `flight_time` varchar(100) DEFAULT NULL,
  `total_passengers` int(11) DEFAULT NULL,
  `services` varchar(255) DEFAULT NULL,
  `luggage_items` text DEFAULT NULL,
  `flight_number` varchar(255) DEFAULT NULL,
  `vip_pickup` tinyint(1) DEFAULT NULL,
  `booking_type` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `pickup_time` varchar(100) DEFAULT NULL,
  `arrival_time` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT 1,
  `booking_code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airport_travel_booking`
--

INSERT INTO `airport_travel_booking` (`id`, `wa_number`, `booking_date`, `pickup_address`, `airport_name`, `destination_address`, `flight_time`, `total_passengers`, `services`, `luggage_items`, `flight_number`, `vip_pickup`, `booking_type`, `created_at`, `deleted_at`, `customer_name`, `pickup_time`, `arrival_time`, `user_id`, `booking_code`) VALUES
(13, '735', '2017-02-18', 'Consequatur eu id ', 'Luke Short', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2025-08-03 09:09:11', NULL, 'Alisa Day', 'Cupiditate vitae ips', NULL, 1, NULL),
(14, '158', '2016-08-04', 'Labore nesciunt ut ', 'Ignatius James', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2025-08-03 09:09:55', NULL, 'Kelly Harper', 'Velit temporibus eaq', NULL, 1, NULL),
(15, '276', '2009-01-21', 'Nobis fuga Tenetur ', 'Ann Hoover', NULL, NULL, 0, 'Delectus placeat r', 'Consequatur et volup', '723', NULL, NULL, '2025-08-03 09:10:00', NULL, 'Alice Massey', NULL, 'Hic laudantium aliq', 1, NULL),
(16, '885', '1973-06-04', 'Dicta omnis laborum', 'Alyssa Brooks', NULL, 'Odio laborum Eiusmo', NULL, 'Voluptatibus totam m', 'Ut illo quibusdam il', '733', NULL, NULL, '2025-08-03 09:10:06', NULL, '885', 'Dolor eos quis quis', NULL, 1, NULL),
(17, '911', '1993-09-03', 'Iure repellendus Et', 'Inez Bean', NULL, 'Quibusdam officia id', NULL, 'Error quia sapiente ', 'Ab occaecat amet la', '924', NULL, NULL, '2025-08-07 13:10:49', NULL, '911', 'Ut minima debitis do', NULL, 1, NULL),
(18, '443', '1981-09-09', 'Beatae reprehenderit', 'Amelia Sheppard', NULL, NULL, 0, 'Et eveniet proident', 'Qui quaerat omnis li', '191', NULL, NULL, '2025-08-07 13:12:57', NULL, 'Calista Bailey', NULL, 'Sint distinctio Ea', 1, NULL),
(19, '160', '1976-01-31', 'Ea nobis sit velit', 'Kuame Hardin', NULL, 'Unde culpa rerum et ', NULL, 'Pariatur Voluptas m', 'Ad velit dicta eaque', '534', NULL, NULL, '2025-08-07 13:21:16', NULL, '160', 'In esse dolor ad qu', NULL, 1, NULL),
(20, '431', '2015-09-22', 'Qui officia non alia', 'Ginger Cook', NULL, 'Nisi fugiat eum repr', 74, 'Eum est sed occaecat', 'Corporis deleniti mo', '759', NULL, NULL, '2025-08-07 08:35:05', NULL, 'Ursula Mason', 'Omnis dolore volupta', NULL, 1, 'TB-20250807-4649'),
(21, '940', '1989-02-01', 'Duis incididunt sit ', 'Cara Hayes', NULL, 'Ipsa et consequuntu', 32, 'Facilis qui impedit', 'Dolorem debitis volu', '953', NULL, NULL, '2025-08-07 08:36:07', NULL, 'Ezra Gamble', 'Aute amet blanditii', NULL, 1, 'TB-20250807-8636'),
(22, '872', '2005-11-22', 'Nihil ut quod dolor ', 'William Joyce', NULL, 'Ex ut aut consequatu', 51, 'Est tempor blanditii', 'Quia est autem nihil', '760', NULL, NULL, '2025-08-07 08:38:54', NULL, 'Isabella Burris', 'Occaecat accusamus h', NULL, 1, 'TB-20250807-4904'),
(23, '486', '1981-05-22', 'Corrupti deserunt q', 'Quin Mccormick', NULL, 'Ipsum est quaerat o', 72, 'Nam aliquid qui maxi', 'Velit omnis aut temp', '446', NULL, NULL, '2025-08-07 08:39:15', NULL, 'Hayley Jenkins', 'Esse quos impedit u', NULL, 1, 'TB-20250807-4295'),
(24, '959', '1971-10-20', 'Assumenda est volupt', 'Honorato Morris', NULL, 'Laboris do sed ad co', 65, 'Cillum totam archite', 'Quas et proident ve', '381', NULL, NULL, '2025-08-07 08:39:46', NULL, 'Katell Rosa', 'Ullamco voluptate qu', NULL, 1, 'TB-20250807-8617'),
(25, '497', '1972-01-25', 'Aut sed vero qui qui', 'Edward Kelly', NULL, 'Iure voluptatum ad v', 3, 'Aut itaque voluptas ', 'Minus cumque unde et', '753', NULL, NULL, '2025-08-07 08:59:33', NULL, 'Mari Farley', 'Qui anim esse distin', NULL, 1, 'TB-20250807-4067'),
(26, '647', '1997-02-24', 'Voluptas dolore labo', 'Peter Lloyd', NULL, NULL, 20, 'In veniam provident', 'In animi aliqua In', '835', NULL, NULL, '2025-08-07 14:00:03', NULL, 'Phelan Santana', NULL, 'Molestias inventore ', 1, NULL),
(27, '647', '1997-02-24', 'Voluptas dolore labo', 'Peter Lloyd', NULL, NULL, 0, 'In veniam provident', 'In animi aliqua In', '835', NULL, NULL, '2025-08-07 14:00:33', NULL, 'Phelan Santana', NULL, 'Molestias inventore ', 1, NULL),
(28, '996', '1987-10-18', 'Itaque qui voluptate', 'Uriah Carter', NULL, NULL, 4, NULL, NULL, NULL, NULL, 'pulang_pergi', '2025-08-07 14:37:34', NULL, 'Marah Boyle', 'Ipsa sint quis perf', NULL, 1, 'TB-PP-20250807-3010'),
(29, '348', '2011-06-10', 'Ex molestiae magna p', 'Graiden Dillon', NULL, NULL, 44, NULL, NULL, NULL, NULL, 'pulang_pergi', '2025-08-07 14:40:10', NULL, 'Christopher Schmidt', 'Omnis quo nostrum te', NULL, 1, 'TB-PP-20250807-2806'),
(30, '150', '1977-03-01', 'Proident sint prae', 'Jamal Castillo', NULL, NULL, 48, 'Debitis fuga Eos au', 'Et veniam do id acc', '499', NULL, NULL, '2025-08-07 14:40:33', NULL, 'Yeo Merritt', NULL, 'Voluptatem ipsam pro', 1, NULL),
(31, '103', '2005-04-23', 'Pariatur Pariatur ', 'Harper Kim', NULL, NULL, 76, 'Atque elit tempora ', 'Consequatur natus d', '670', NULL, NULL, '2025-08-07 14:48:59', NULL, 'Xyla Weaver', NULL, 'Proident nihil et e', 1, NULL),
(32, '399', '1986-10-19', 'Est iusto laborum ip', 'Jemima Erickson', NULL, NULL, 96, 'Hic qui odit harum e', 'Velit elit quia eni', '313', NULL, NULL, '2025-08-07 14:53:14', NULL, 'Blythe Mcintosh', NULL, 'Doloremque incididun', 1, NULL),
(33, '283', '1977-04-30', 'Veniam neque volupt', 'TaShya Bush', NULL, 'Facilis laborum eos ', 32, 'Consequatur eos del', 'Odio facere enim ips', '967', NULL, NULL, '2025-08-08 02:35:51', NULL, 'Alice Melton', 'Aliquid consequatur', NULL, 1, 'TB-20250808-3314'),
(34, '699', '1975-11-28', 'Aut qui laborum Dol', 'Tamara Owens', NULL, '11:19', 8, 'Delectus excepturi ', '65', '725', NULL, NULL, '2025-08-08 05:29:37', NULL, 'Hedwig Dickerson', '15:36', NULL, 1, 'TB-20250808-7679'),
(35, '499', '2023-03-25', 'Ipsum in dignissimos', 'Robert Gilliam', NULL, NULL, 50, 'Ekonomi', '38', '974', NULL, NULL, '2025-08-08 10:29:58', NULL, 'Jolene George', NULL, '09:20', 1, NULL),
(36, '990', '1985-04-24', 'Dolor corporis sint ', 'Allegra Everett', NULL, NULL, 48, NULL, NULL, NULL, NULL, 'pulang_pergi', '2025-08-08 10:30:12', NULL, 'Xandra West', '05:49', NULL, 1, 'TB-20250808-2332'),
(37, '477', '2015-11-17', 'Eius suscipit quas q', 'Carlos Miller', NULL, NULL, 35, NULL, NULL, NULL, NULL, 'pulang_pergi', '2025-09-13 16:17:55', NULL, 'Slade Rocha', '03:09', NULL, 13, 'TB-20250913-8924');

-- --------------------------------------------------------

--
-- Table structure for table `city_tour_booking`
--

CREATE TABLE `city_tour_booking` (
  `id` int(11) NOT NULL,
  `wa_number` varchar(20) DEFAULT NULL,
  `booking_date` timestamp NULL DEFAULT NULL,
  `pickup_address` text DEFAULT NULL,
  `total_passengers` int(11) DEFAULT NULL,
  `tour_destination` varchar(255) DEFAULT NULL,
  `duration` varchar(20) DEFAULT NULL,
  `car_name` varchar(100) DEFAULT NULL,
  `booking_code` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT 1,
  `customer_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city_tour_booking`
--

INSERT INTO `city_tour_booking` (`id`, `wa_number`, `booking_date`, `pickup_address`, `total_passengers`, `tour_destination`, `duration`, `car_name`, `booking_code`, `user_id`, `customer_name`, `created_at`, `deleted_at`) VALUES
(39, '452', '2010-02-27 17:00:00', 'Nisi assumenda amet', 53, 'Dolores sunt sunt ra', 'Praesentium adipisci', 'Sit esse in laborum', 'WTR-20250805153044-3268', 1, NULL, '2025-08-18 06:46:06', NULL),
(40, '542', '2010-11-08 17:00:00', 'Sunt deserunt fuga ', 16, 'Tempor rerum sit vol', 'Qui delectus alias ', 'Explicabo In magni ', 'WTR-20250807145432-9959', 1, 'Erasmus Duran', '2025-08-18 06:46:06', NULL),
(41, '372', '1992-11-07 17:00:00', 'Cupiditate velit il', 76, 'Consectetur do enim', 'Irure laboriosam cu', 'Aut accusantium dele', 'WTR-20250807145516-9416', 1, 'Iris Howell', '2025-08-18 06:46:06', NULL),
(42, '998', '1992-11-28 17:00:00', 'Dolores aliquip eum ', 30, 'Et temporibus do vol', 'Quaerat et aut hic s', 'Adipisicing dolorum ', 'WTR-20250807145822-9801', 1, 'Ayanna Randall', '2025-08-18 06:46:06', NULL),
(43, '545', '2021-02-10 17:00:00', 'Tenetur officiis nis', 79, 'Aut et id maiores du', 'Omnis asperiores deb', 'A esse sapiente dist', 'WTR-20250807150310-5239', 1, 'Tashya Atkinson', '2025-08-18 06:46:06', NULL),
(44, '195', '1976-04-24 17:00:00', 'Reiciendis aut elit', 33, 'Velit minim et numq', 'Eum ut deserunt adip', 'Maiores anim anim ip', 'WTR-20250807150549-7795', 1, 'Oren Cleveland', '2025-08-18 06:46:06', NULL),
(45, '296', '2024-01-30 17:00:00', 'Autem at saepe sint', 60, 'Tempore tempore ve', 'Irure nulla ipsam pl', 'Amet eum quis volup', 'WTR-20250808093512-6504', 1, 'Harper Tanner', '2025-08-18 06:46:06', NULL),
(46, '569', '2004-07-17 17:00:00', 'Fuga Quis veritatis', 96, 'Velit in irure nisi ', 'Rem corrupti tempor', 'Sit consectetur eu', 'WTR-20250808093534-2247', 1, 'Nero Bass', '2025-08-18 06:46:06', NULL),
(47, '+1 (387) 409-4491', '2021-04-01 17:00:00', 'Dolores dicta pariat', 63, 'Amet eius eius iust', 'Aliqua Incidunt vo', 'Avanza', 'WTR-20250808122746-1782', 1, 'Ryan Travis', '2025-08-18 06:46:06', NULL),
(48, '+1 (736) 787-7377', '2017-11-25 17:00:00', 'Culpa illum volupta', 62, 'Aliqua Dolore numqu', 'Ad fugiat tempor ex', 'Bus', 'WTR-20250913181714-3201', 13, 'Hashim Hancock', '2025-09-13 16:17:14', NULL),
(49, '+1 (736) 787-7377', '2017-11-25 17:00:00', 'Culpa illum volupta', 62, 'Aliqua Dolore numqu', 'Ad fugiat tempor ex', 'Bus', 'WTR-20250913181722-9599', 13, 'Hashim Hancock', '2025-09-13 16:17:22', NULL),
(50, '+1 (271) 623-4093', '2006-08-25 17:00:00', 'Quia aliqua Ut quia', 69, 'Minima quia ex omnis', 'Rerum ducimus dicta', 'Bus', 'WTR-20250913181740-4623', 13, 'Austin Mcconnell', '2025-09-13 16:17:40', NULL),
(51, '+1 (271) 623-4093', '2006-08-25 17:00:00', 'Quia aliqua Ut quia', 69, 'Minima quia ex omnis', 'Rerum ducimus dicta', 'Bus', 'WTR-20250913181846-8230', 13, 'Austin Mcconnell', '2025-09-13 16:18:46', NULL),
(52, '+1 (399) 772-6437', '2024-02-08 17:00:00', 'Similique aut eos vo', 54, 'Aliquip ex velit in ', 'Harum accusamus aut ', 'Avanza', 'WTR-20250913181929-8233', 13, 'Macy Webster', '2025-09-13 16:19:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `ig` varchar(100) DEFAULT NULL,
  `tiktok` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `whatsapp`, `email`, `alamat`, `fb`, `ig`, `tiktok`, `twitter`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '083122494952', 'firman.doe@example.com', 'Pasar Minggu, No. 12, Jakarta', 'http://facebook.com/firmandoe', 'http://instagram.com/firmandoe', 'http://tiktok.com/@firmandoe', 'http://twitter.com/firmandoe', '2025-08-10 13:30:07', '2025-09-13 22:36:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_content`
--

CREATE TABLE `gallery_content` (
  `id` int(11) NOT NULL,
  `url_image` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery_content`
--

INSERT INTO `gallery_content` (`id`, `url_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'media_uploads/gallery-images/eadc5c250757bba9ae1e20d81479ee3d.png', '2025-08-10 09:42:49', '2025-08-10 14:42:54', '2025-08-10 09:42:54'),
(2, 'media_uploads/gallery-images/43d155eff7b575bd2b37fddb28b44776.png', '2025-08-10 09:52:14', '2025-08-10 14:52:17', '2025-08-10 09:52:17'),
(3, 'media_uploads/gallery-images/0fca666f6e6538dc929f27e1b81c28e0.png', '2025-08-10 09:52:26', '2025-08-10 14:55:28', '2025-08-10 09:55:28'),
(4, 'media_uploads/gallery-images/43c2b9d56f68a749776f5f0d46270c2b.png', '2025-08-10 09:52:36', '2025-08-10 09:52:36', NULL),
(5, 'media_uploads/gallery-images/b3d65af2d5b1dd97e51f0d18b919f516.png', '2025-08-10 09:52:42', '2025-08-10 09:52:42', NULL),
(6, 'media_uploads/gallery-images/48748867442a1e1905241afb895e1c24.png', '2025-08-10 09:52:48', '2025-08-10 09:52:48', NULL),
(7, 'media_uploads/gallery-images/c2460ca3935565143ccf514b1abb6228.png', '2025-08-10 09:53:00', '2025-08-10 09:53:00', NULL),
(8, 'media_uploads/gallery-images/f2ab4d692c2725b5c177f74d43e2ade9.png', '2025-08-10 09:53:08', '2025-08-10 09:53:08', NULL),
(9, 'media_uploads/gallery-images/01ebc7a97c4ae7adbd9e7d7b3774ade8.png', '2025-08-10 09:53:18', '2025-08-10 09:53:18', NULL),
(10, 'media_uploads/gallery-images/a4fe2aee80c32141d268f9f2a724adb0.png', '2025-08-10 09:53:23', '2025-08-10 09:53:23', NULL),
(11, 'media_uploads/gallery-images/6230566737dc8e3ca31333b9b27ddd27.png', '2025-08-10 09:53:28', '2025-08-10 09:53:28', NULL),
(12, 'media_uploads/gallery-images/78b8a67f9969687d2a8ff71ffac46640.png', '2025-08-10 09:53:34', '2025-08-10 09:53:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `header_content`
--

CREATE TABLE `header_content` (
  `id` int(11) NOT NULL,
  `image_rul` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `image_logo`
--

CREATE TABLE `image_logo` (
  `id` int(11) NOT NULL,
  `url_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_logo`
--

INSERT INTO `image_logo` (`id`, `url_image`, `created_at`, `updated_at`) VALUES
(4, 'media_uploads/logo-image/647acdecac613307908b69a3d5fab18f.jpg', '2025-08-09 20:52:22', '2025-09-13 08:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `prodi_id` int(100) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nik`, `tgl_lahir`, `jenis_kelamin`, `prodi_id`, `image_url`) VALUES
(1, 'rover', 'Ducimus nobis delen', '1995-07-07', 'P', 2, '2025-07-27_02-56-57_97b318e4.png'),
(2, 'ciaconna', 'Enim impedit magnam', '2025-07-17', 'L', 1, '2025-07-27_02-58-00_7288a4dd.png'),
(3, 'zani', 'Mollit labore commod', '2025-07-02', 'L', 1, '2025-07-27_02-57-49_f1a99331.png'),
(5, 'Eka Wulandari', '3275012000082305', '2000-08-23', 'P', 1, 'image1.png'),
(6, 'Fajar Nugroho', '3275011999110506', '1999-11-05', 'L', 2, 'image1.png'),
(7, 'Gita Rahmawati', '3275012002022707', '2002-02-27', 'P', 3, 'image1.png'),
(8, 'Hendra Wijaya', '3275011996031808', '1996-03-18', 'L', 4, 'image1.png'),
(9, 'Intan Permata', '3275012001110909', '2001-11-09', 'P', 1, 'image1.png'),
(10, 'Joko Santoso', '3275011998053000', '1998-05-30', 'L', 2, 'image1.png'),
(11, 'Firman', '53109098981', '2025-07-14', 'L', 3, 'image1.png'),
(12, 'Firman 2', '53109098982', '2025-07-26', 'L', 4, 'image1.png'),
(18, 'Alifia Intan', '09801980', '1997-06-06', 'P', 4, 'image1.png');

-- --------------------------------------------------------

--
-- Table structure for table `master_artikel`
--

CREATE TABLE `master_artikel` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `subtitle` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_artikel`
--

INSERT INTO `master_artikel` (`id`, `title`, `subtitle`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'test1', 'test1', 'test1', 'media_uploads/artikel-image/60f651ddf14d5f47bd086cac7f0ee134.png', '2025-08-17 12:27:21', '2025-08-17 19:27:21', '2025-09-13 06:52:02'),
(11, 'title', 'subtitle', 'description', 'media_uploads/artikel-image/d108828bed0cf87786fc77a8f6633c5a.png', '2025-08-17 12:42:08', '2025-08-17 19:42:39', '2025-09-13 06:51:59'),
(12, 'test artikel', 'test sub judul', 'test deskripsi', 'media_uploads/artikel-image/a48fd6707ed2da532f4bb44fe0e51a71.jpeg', '2025-09-13 06:52:28', '2025-09-13 13:52:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_bus`
--

CREATE TABLE `master_bus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_bus`
--

INSERT INTO `master_bus` (`id`, `name`, `type`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'testupdate', 'bus', 'asjkdjaskhupdate1', 'media_uploads/bus-image/2c0a26ce655c648e9e6ed46a74d68a7d.png', '2025-08-17 10:53:04', '2025-08-17 18:21:47', NULL),
(11, 'test2', NULL, 'iisashdkjk', 'media_uploads/bus-image/f2acfdccae22d00a6d974a2e9fb970d1.png', '2025-08-17 11:12:19', '2025-08-17 18:12:19', '2025-08-17 11:12:23'),
(12, 'lkjlkj', 'mini bus', 'dmdm.a,md.,am.', 'media_uploads/bus-image/bfad8842e3cf525a17d84b0e5e94048a.png', '2025-08-17 11:22:20', '2025-08-17 18:22:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_car`
--

CREATE TABLE `master_car` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_car`
--

INSERT INTO `master_car` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Toyota Avanza', 'Mobil keluarga irit bahan bakar dan nyaman digunakan untuk perjalanan jauh.', 'media_uploads/cars-image/9324d0cd7cbeaeebb0a3a61781af10bc.png', '2025-08-03 06:43:23', '2025-08-13 15:23:30', '2025-09-06 19:16:52'),
(2, 'Honda Mobilio', 'Mobil MPV dengan desain elegan dan performa tangguh.', 'media_uploads/cars-image/3df19d3949f4e585116e27add850dc8f.png', '2025-08-03 06:43:23', '2025-08-13 15:23:45', '2025-09-06 19:16:56'),
(3, 'Suzuki Ertiga', 'Mobil serbaguna dengan fitur lengkap dan kabin luas.', 'media_uploads/cars-image/115e22b424d449d8dc8d6f528154da7c.png', '2025-08-03 06:43:23', '2025-08-13 15:23:17', NULL),
(4, 'Daihatsu Xenia', 'Mobil dengan kapasitas besar cocok untuk rombongan.', 'media_uploads/cars-image/2e5a2a0868604966b15187e7c26cfec4.png', '2025-08-03 06:43:23', '2025-08-13 15:23:05', '2025-09-06 19:17:05'),
(5, 'Mitsubishi Xpander x', 'Mobil stylish dengan suspensi nyaman dan kabin lega.', 'media_uploads/cars-image/d4afd3b866426e56e52bc972e0f96aab.png', '2025-08-03 06:43:23', '2025-08-13 15:22:23', '2025-09-06 19:17:01'),
(6, 'test1', 'kdalksjdla', 'media_uploads/cars-image/2ea26b1bf95e9e60693e759ed3301b71.png', '2025-08-13 07:53:42', NULL, '2025-08-13 08:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `master_motorcycle`
--

CREATE TABLE `master_motorcycle` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_motorcycle`
--

INSERT INTO `master_motorcycle` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'mikrosop', 'tahu bakar', 'media_uploads/motorcycle-image/351f8f51c6e20dcebe6f461745d76305.png', '2025-08-13 09:18:08', '2025-08-17 18:14:51', NULL),
(8, 'jkjkKJHKJ', 'KLJLKJ', 'media_uploads/motorcycle-image/aa7fbc7fc2fe6f45d6069f87b0518a2d.png', '2025-08-13 09:20:30', '2025-08-13 16:20:30', '2025-08-13 09:26:42'),
(9, 'KJDUII', 'LKJLJLKJL', 'media_uploads/motorcycle-image/9c91a1e4056e5b33e1063900cdf8e494.png', '2025-08-13 09:26:53', '2025-08-13 16:26:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_tour_package`
--

CREATE TABLE `master_tour_package` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_tour_package`
--

INSERT INTO `master_tour_package` (`id`, `name`, `type`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`, `duration`, `price`) VALUES
(10, 'kjlkjlk', 'wisata', 'kjlkjl', 'media_uploads/tour-package-image/5fbc33ab7c46e64d3ab22119c3568287.png', '2025-08-17 11:42:58', '2025-09-07 02:18:01', NULL, '1 Hari', '200000'),
(11, 'test1', 'wisata', 'klklklkjppp', 'media_uploads/tour-package-image/f969117301f2aa27dfe132beea3ba92f.png', '2025-08-17 11:53:37', '2025-08-17 19:03:35', NULL, '1 Hari', '300000'),
(12, 'paket 3', 'city_tour', 'lsdk;alskd;al', 'media_uploads/tour-package-image/66fd7611998b8dd15f20369fefe6d07d.png', '2025-08-17 11:59:02', '2025-08-17 19:03:19', NULL, '2 Hari', '900000'),
(13, 'Paket 10', 'wisata', 'test', 'media_uploads/tour-package-image/037174b9178c8f56e92effbccb9df25b.png', '2025-08-17 12:02:53', '2025-08-17 19:02:53', NULL, '2 Hari', '750000');

-- --------------------------------------------------------

--
-- Table structure for table `package_booking`
--

CREATE TABLE `package_booking` (
  `id` int(11) NOT NULL,
  `tour_package_id` int(11) DEFAULT NULL,
  `nama_pemesan` varchar(100) DEFAULT NULL,
  `nomor_telepon` varchar(100) DEFAULT NULL,
  `booking_code` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_booking`
--

INSERT INTO `package_booking` (`id`, `tour_package_id`, `nama_pemesan`, `nomor_telepon`, `booking_code`, `created_at`) VALUES
(1, 1, 'firman', '082236778929', 'PKB20250913165246787', '2025-09-13 09:52:46'),
(2, 4, 'firman', '082236778929', 'PKB20250913170701621', '2025-09-13 10:07:01'),
(3, 4, 'firman', '082236778929', 'PKB20250913171155777', '2025-09-13 10:11:55'),
(4, 2, 'firman', '08312244972', 'PKB20250913171443105', '2025-09-13 10:14:43'),
(5, 4, 'firman', '0887636717819', 'PKB20250913172435186', '2025-09-13 10:24:35'),
(6, 1, 'uiuyiu', '092-3091092', 'PKB20250913172533822', '2025-09-13 10:25:33'),
(7, 2, 'ytuyt', 'uytu', 'PKB20250913173305352', '2025-09-13 10:33:05'),
(8, 1, 'kjkjhkjh', '03492039', 'PKB20250913173647506', '2025-09-13 10:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `popup_image`
--

CREATE TABLE `popup_image` (
  `id` int(11) NOT NULL,
  `url_image` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `popup_image`
--

INSERT INTO `popup_image` (`id`, `url_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'media_uploads/popup-images/b408815841e65c815ffd24183a9d6fe4.png', '2025-08-10 08:46:49', '2025-08-10 13:52:13', '2025-08-10 08:52:13'),
(2, 'media_uploads/popup-images/d6d5db622751e84c5deb316c2053ae99.png', '2025-08-10 08:52:04', '2025-08-10 13:54:59', '2025-08-10 08:54:59'),
(3, 'media_uploads/popup-images/6bf806ff80a232af4a57ce35c39bd07c.png', '2025-08-10 08:54:54', '2025-08-10 13:55:50', '2025-08-10 08:55:50'),
(4, 'media_uploads/popup-images/8d58d89478b9b9b85476c4d37126f663.png', '2025-08-10 08:55:23', '2025-08-10 13:55:56', '2025-08-10 08:55:56'),
(5, 'media_uploads/popup-images/bd93d382070e0d8748935fffaccfb6bc.png', '2025-08-10 08:56:04', '2025-08-10 13:59:28', '2025-08-10 08:59:28'),
(6, 'media_uploads/popup-images/582c13dc3e3f11905f6348240a29a7ff.png', '2025-08-10 08:59:23', '2025-08-10 13:59:47', '2025-08-10 08:59:47'),
(7, 'media_uploads/popup-images/3fb703a0030eaab2972544c851dc7b3e.png', '2025-08-10 09:00:18', '2025-08-10 14:08:57', '2025-08-10 09:08:57'),
(8, 'media_uploads/popup-images/98cbe62e7040b86597087464b701ec89.png', '2025-08-10 09:02:19', '2025-08-13 21:38:49', '2025-08-13 16:38:49'),
(9, 'media_uploads/popup-images/48e45852a75c09e0d285334eeed61c87.png', '2025-08-10 09:02:25', '2025-09-13 23:38:16', '2025-09-13 18:38:16'),
(10, 'media_uploads/popup-images/415f9232d27091dc02fe1cb9d46dbff8.png', '2025-08-10 09:02:30', '2025-09-13 23:38:13', '2025-09-13 18:38:13'),
(11, 'media_uploads/popup-images/9a321ed5bb79dbafdd8460a6f60e3339.png', '2025-08-10 09:03:03', '2025-08-10 09:03:03', NULL),
(12, 'media_uploads/popup-images/1ecf1a7e2359850523088a327746429c.png', '2025-08-10 09:08:41', '2025-08-10 14:09:00', '2025-08-10 09:09:00'),
(13, 'media_uploads/popup-images/d3b2ba341a4540cd3be4b352d21d7048.png', '2025-08-10 09:09:38', '2025-08-10 14:09:44', '2025-08-10 09:09:44'),
(14, 'media_uploads/popup-images/1630fc0cfd6a91d3ea12a22af574fcd2.png', '2025-08-10 09:10:17', '2025-09-13 23:38:10', '2025-09-13 18:38:10'),
(15, 'media_uploads/popup-images/74c7b8b4856fe28c86f74969b45f4180.png', '2025-08-10 09:23:52', '2025-08-10 14:23:56', '2025-08-10 09:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `prodi_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `prodi_name`) VALUES
(1, 'Informatika'),
(2, 'Kimia'),
(3, 'Elektronika'),
(4, 'Bidan');

-- --------------------------------------------------------

--
-- Table structure for table `rent_bus_booking`
--

CREATE TABLE `rent_bus_booking` (
  `id` int(11) NOT NULL,
  `wa_number` varchar(20) DEFAULT NULL,
  `booking_date_start` timestamp NULL DEFAULT NULL,
  `booking_date_end` timestamp NULL DEFAULT NULL,
  `pickup_address` text DEFAULT NULL,
  `total_passengers` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `pickup_time` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT 1,
  `booking_code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent_bus_booking`
--

INSERT INTO `rent_bus_booking` (`id`, `wa_number`, `booking_date_start`, `booking_date_end`, `pickup_address`, `total_passengers`, `created_at`, `deleted_at`, `customer_name`, `pickup_time`, `user_id`, `booking_code`) VALUES
(5, '786', '2010-12-28 17:00:00', '1975-04-23 17:00:00', 'Assumenda omnis simi', 2, '2025-08-06 15:22:32', NULL, 'Tanner Smith', '09:38', 1, 'RB-20250806172232-5077'),
(6, '799', '1988-05-15 17:00:00', '2004-10-31 17:00:00', 'In aliquam est cupid', 60, '2025-08-06 15:24:55', NULL, 'Jermaine Nguyen', '21:24', 1, 'RB-20250806172455-1700'),
(7, '846', '1997-05-22 17:00:00', '1984-02-13 17:00:00', 'Natus delectus repr', 71, '2025-08-06 15:25:40', NULL, 'Calista Brown', '07:01', 1, 'RB-20250806172540-8508'),
(8, '591', '2021-01-10 17:00:00', '1999-11-24 17:00:00', 'Incididunt cumque re', 10, '2025-08-07 12:56:45', NULL, 'Angelica Dotson', '15:22', 1, 'RB-20250807145645-5374'),
(9, '97', '1988-04-28 17:00:00', '2001-01-17 17:00:00', 'Tempore beatae omni', 74, '2025-08-07 13:07:28', NULL, 'Sophia Dillard', '18:07', 1, 'RB-20250807150728-3312'),
(10, '2', '2009-12-16 17:00:00', '1998-07-06 17:00:00', 'Et et laboris dolore', 22, '2025-08-08 08:38:02', NULL, 'Jaime Dixon', '10:23', 1, 'RB-20250808103802-6700');

-- --------------------------------------------------------

--
-- Table structure for table `rent_car_booking`
--

CREATE TABLE `rent_car_booking` (
  `id` int(11) NOT NULL,
  `wa_number` double DEFAULT NULL,
  `booking_date_start` timestamp NULL DEFAULT NULL,
  `booking_date_end` timestamp NULL DEFAULT NULL,
  `car_name` varchar(100) DEFAULT NULL,
  `booking_type` varchar(100) DEFAULT NULL,
  `route` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `pickup_address` text DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT 1,
  `booking_code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent_car_booking`
--

INSERT INTO `rent_car_booking` (`id`, `wa_number`, `booking_date_start`, `booking_date_end`, `car_name`, `booking_type`, `route`, `created_at`, `deleted_at`, `car_id`, `customer_name`, `pickup_address`, `duration`, `user_id`, `booking_code`) VALUES
(32, 336, '1991-09-02 17:00:00', '2005-09-30 17:00:00', 'Mitsubishi Xpander', 'Distinctio Ullam qu', 'Pariatur Minima lab', '2025-08-05 23:19:13', NULL, 5, 'William Kirby', 'Facilis ut cillum qu', 'Ipsum vero et ut ni', 1, 'RTL-20250806061913-9247'),
(33, 178, '1999-05-02 17:00:00', '1977-07-04 17:00:00', 'Mitsubishi Xpander', 'Ipsam maxime aut qui', 'Earum repudiandae pa', '2025-08-05 23:31:15', NULL, 5, 'Orlando Schneider', 'Assumenda perferendi', 'Sed quos qui aperiam', 1, 'RTL-20250806063115-8942'),
(34, 83, '2006-03-26 17:00:00', '1984-06-30 17:00:00', 'Daihatsu Xenia', 'Illo consequuntur co', 'Sunt laboris sit a', '2025-08-05 23:40:02', NULL, 4, 'Carissa Mcdaniel', 'Ut in ex deleniti la', 'Quisquam ad ipsa vo', 1, 'RTL-20250806064002-9107'),
(35, 880, '2004-06-12 17:00:00', '1987-12-11 17:00:00', 'Suzuki Ertiga', 'Exercitationem aut m', 'Et amet enim sint ', '2025-08-06 09:34:07', NULL, 3, 'Cecilia Estes', 'Qui eum iure ut et s', 'Quo dolore deleniti ', 1, 'RTL-20250806163407-4538'),
(36, 2, '2013-01-04 17:00:00', '2024-10-08 17:00:00', 'Honda Mobilio', 'Est quae harum iure ', 'Minim reprehenderit ', '2025-08-07 08:06:58', NULL, 2, 'Kasimir Mcpherson', 'Ipsum ex rerum eos ', 'Culpa aut commodi e', 1, 'RTL-20250807150658-2509');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni_content`
--

CREATE TABLE `testimoni_content` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `title_description_web`
--

CREATE TABLE `title_description_web` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `title_description_web`
--

INSERT INTO `title_description_web` (`id`, `title`, `description`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'Wak Trans update 3', 'Hallo selamat datang di website wak trans', '2025-08-10 12:44:40', NULL, '2025-08-10 08:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` enum('CUSTOMER','ADMIN') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(1, 'guest@gmail.com', 'guest', 'CUSTOMER'),
(13, 'firmanazharr@gmail.com', '12345678', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `video_header`
--

CREATE TABLE `video_header` (
  `id` int(11) NOT NULL,
  `link_video` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video_header`
--

INSERT INTO `video_header` (`id`, `link_video`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'https://www.youtube.com/watch?v=4ZKgq7Aw34s&list=RDeyb1h5LVHhg&index=2', '2025-08-10 13:21:00', '2025-09-13 15:14:19', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airport_travel_booking`
--
ALTER TABLE `airport_travel_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_tour_booking`
--
ALTER TABLE `city_tour_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_content`
--
ALTER TABLE `gallery_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_content`
--
ALTER TABLE `header_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_logo`
--
ALTER TABLE `image_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_artikel`
--
ALTER TABLE `master_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_bus`
--
ALTER TABLE `master_bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_car`
--
ALTER TABLE `master_car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_motorcycle`
--
ALTER TABLE `master_motorcycle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_tour_package`
--
ALTER TABLE `master_tour_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_booking`
--
ALTER TABLE `package_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popup_image`
--
ALTER TABLE `popup_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_bus_booking`
--
ALTER TABLE `rent_bus_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_car_booking`
--
ALTER TABLE `rent_car_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni_content`
--
ALTER TABLE `testimoni_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_description_web`
--
ALTER TABLE `title_description_web`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_header`
--
ALTER TABLE `video_header`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airport_travel_booking`
--
ALTER TABLE `airport_travel_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `city_tour_booking`
--
ALTER TABLE `city_tour_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery_content`
--
ALTER TABLE `gallery_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `header_content`
--
ALTER TABLE `header_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_logo`
--
ALTER TABLE `image_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `master_artikel`
--
ALTER TABLE `master_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `master_bus`
--
ALTER TABLE `master_bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `master_car`
--
ALTER TABLE `master_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `master_motorcycle`
--
ALTER TABLE `master_motorcycle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `master_tour_package`
--
ALTER TABLE `master_tour_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `package_booking`
--
ALTER TABLE `package_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `popup_image`
--
ALTER TABLE `popup_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rent_bus_booking`
--
ALTER TABLE `rent_bus_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rent_car_booking`
--
ALTER TABLE `rent_car_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `testimoni_content`
--
ALTER TABLE `testimoni_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `title_description_web`
--
ALTER TABLE `title_description_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `video_header`
--
ALTER TABLE `video_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
