/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.7.2-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: travel_tour
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `airport_travel_booking`
--

DROP TABLE IF EXISTS `airport_travel_booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `airport_travel_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `booking_code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airport_travel_booking`
--

LOCK TABLES `airport_travel_booking` WRITE;
/*!40000 ALTER TABLE `airport_travel_booking` DISABLE KEYS */;
INSERT INTO `airport_travel_booking` VALUES
(13,'735','2017-02-18','Consequatur eu id ','Luke Short',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,'2025-08-03 09:09:11',NULL,'Alisa Day','Cupiditate vitae ips',NULL,1,NULL),
(14,'158','2016-08-04','Labore nesciunt ut ','Ignatius James',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,'2025-08-03 09:09:55',NULL,'Kelly Harper','Velit temporibus eaq',NULL,1,NULL),
(15,'276','2009-01-21','Nobis fuga Tenetur ','Ann Hoover',NULL,NULL,0,'Delectus placeat r','Consequatur et volup','723',NULL,NULL,'2025-08-03 09:10:00',NULL,'Alice Massey',NULL,'Hic laudantium aliq',1,NULL),
(16,'885','1973-06-04','Dicta omnis laborum','Alyssa Brooks',NULL,'Odio laborum Eiusmo',NULL,'Voluptatibus totam m','Ut illo quibusdam il','733',NULL,NULL,'2025-08-03 09:10:06',NULL,'885','Dolor eos quis quis',NULL,1,NULL),
(17,'911','1993-09-03','Iure repellendus Et','Inez Bean',NULL,'Quibusdam officia id',NULL,'Error quia sapiente ','Ab occaecat amet la','924',NULL,NULL,'2025-08-07 13:10:49',NULL,'911','Ut minima debitis do',NULL,1,NULL),
(18,'443','1981-09-09','Beatae reprehenderit','Amelia Sheppard',NULL,NULL,0,'Et eveniet proident','Qui quaerat omnis li','191',NULL,NULL,'2025-08-07 13:12:57',NULL,'Calista Bailey',NULL,'Sint distinctio Ea',1,NULL),
(19,'160','1976-01-31','Ea nobis sit velit','Kuame Hardin',NULL,'Unde culpa rerum et ',NULL,'Pariatur Voluptas m','Ad velit dicta eaque','534',NULL,NULL,'2025-08-07 13:21:16',NULL,'160','In esse dolor ad qu',NULL,1,NULL),
(20,'431','2015-09-22','Qui officia non alia','Ginger Cook',NULL,'Nisi fugiat eum repr',74,'Eum est sed occaecat','Corporis deleniti mo','759',NULL,NULL,'2025-08-07 08:35:05',NULL,'Ursula Mason','Omnis dolore volupta',NULL,1,'TB-20250807-4649'),
(21,'940','1989-02-01','Duis incididunt sit ','Cara Hayes',NULL,'Ipsa et consequuntu',32,'Facilis qui impedit','Dolorem debitis volu','953',NULL,NULL,'2025-08-07 08:36:07',NULL,'Ezra Gamble','Aute amet blanditii',NULL,1,'TB-20250807-8636'),
(22,'872','2005-11-22','Nihil ut quod dolor ','William Joyce',NULL,'Ex ut aut consequatu',51,'Est tempor blanditii','Quia est autem nihil','760',NULL,NULL,'2025-08-07 08:38:54',NULL,'Isabella Burris','Occaecat accusamus h',NULL,1,'TB-20250807-4904'),
(23,'486','1981-05-22','Corrupti deserunt q','Quin Mccormick',NULL,'Ipsum est quaerat o',72,'Nam aliquid qui maxi','Velit omnis aut temp','446',NULL,NULL,'2025-08-07 08:39:15',NULL,'Hayley Jenkins','Esse quos impedit u',NULL,1,'TB-20250807-4295'),
(24,'959','1971-10-20','Assumenda est volupt','Honorato Morris',NULL,'Laboris do sed ad co',65,'Cillum totam archite','Quas et proident ve','381',NULL,NULL,'2025-08-07 08:39:46',NULL,'Katell Rosa','Ullamco voluptate qu',NULL,1,'TB-20250807-8617'),
(25,'497','1972-01-25','Aut sed vero qui qui','Edward Kelly',NULL,'Iure voluptatum ad v',3,'Aut itaque voluptas ','Minus cumque unde et','753',NULL,NULL,'2025-08-07 08:59:33',NULL,'Mari Farley','Qui anim esse distin',NULL,1,'TB-20250807-4067'),
(26,'647','1997-02-24','Voluptas dolore labo','Peter Lloyd',NULL,NULL,20,'In veniam provident','In animi aliqua In','835',NULL,NULL,'2025-08-07 14:00:03',NULL,'Phelan Santana',NULL,'Molestias inventore ',1,NULL),
(27,'647','1997-02-24','Voluptas dolore labo','Peter Lloyd',NULL,NULL,0,'In veniam provident','In animi aliqua In','835',NULL,NULL,'2025-08-07 14:00:33',NULL,'Phelan Santana',NULL,'Molestias inventore ',1,NULL),
(28,'996','1987-10-18','Itaque qui voluptate','Uriah Carter',NULL,NULL,4,NULL,NULL,NULL,NULL,'pulang_pergi','2025-08-07 14:37:34',NULL,'Marah Boyle','Ipsa sint quis perf',NULL,1,'TB-PP-20250807-3010'),
(29,'348','2011-06-10','Ex molestiae magna p','Graiden Dillon',NULL,NULL,44,NULL,NULL,NULL,NULL,'pulang_pergi','2025-08-07 14:40:10',NULL,'Christopher Schmidt','Omnis quo nostrum te',NULL,1,'TB-PP-20250807-2806'),
(30,'150','1977-03-01','Proident sint prae','Jamal Castillo',NULL,NULL,48,'Debitis fuga Eos au','Et veniam do id acc','499',NULL,NULL,'2025-08-07 14:40:33',NULL,'Yeo Merritt',NULL,'Voluptatem ipsam pro',1,NULL),
(31,'103','2005-04-23','Pariatur Pariatur ','Harper Kim',NULL,NULL,76,'Atque elit tempora ','Consequatur natus d','670',NULL,NULL,'2025-08-07 14:48:59',NULL,'Xyla Weaver',NULL,'Proident nihil et e',1,NULL),
(32,'399','1986-10-19','Est iusto laborum ip','Jemima Erickson',NULL,NULL,96,'Hic qui odit harum e','Velit elit quia eni','313',NULL,NULL,'2025-08-07 14:53:14',NULL,'Blythe Mcintosh',NULL,'Doloremque incididun',1,NULL),
(33,'283','1977-04-30','Veniam neque volupt','TaShya Bush',NULL,'Facilis laborum eos ',32,'Consequatur eos del','Odio facere enim ips','967',NULL,NULL,'2025-08-08 02:35:51',NULL,'Alice Melton','Aliquid consequatur',NULL,1,'TB-20250808-3314'),
(34,'699','1975-11-28','Aut qui laborum Dol','Tamara Owens',NULL,'11:19',8,'Delectus excepturi ','65','725',NULL,NULL,'2025-08-08 05:29:37',NULL,'Hedwig Dickerson','15:36',NULL,1,'TB-20250808-7679'),
(35,'499','2023-03-25','Ipsum in dignissimos','Robert Gilliam',NULL,NULL,50,'Ekonomi','38','974',NULL,NULL,'2025-08-08 10:29:58',NULL,'Jolene George',NULL,'09:20',1,NULL),
(36,'990','1985-04-24','Dolor corporis sint ','Allegra Everett',NULL,NULL,48,NULL,NULL,NULL,NULL,'pulang_pergi','2025-08-08 10:30:12',NULL,'Xandra West','05:49',NULL,1,'TB-20250808-2332');
/*!40000 ALTER TABLE `airport_travel_booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city_tour_booking`
--

DROP TABLE IF EXISTS `city_tour_booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `city_tour_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city_tour_booking`
--

LOCK TABLES `city_tour_booking` WRITE;
/*!40000 ALTER TABLE `city_tour_booking` DISABLE KEYS */;
INSERT INTO `city_tour_booking` VALUES
(39,'452','2010-02-27 17:00:00','Nisi assumenda amet',53,'Dolores sunt sunt ra','Praesentium adipisci','Sit esse in laborum','WTR-20250805153044-3268',1,NULL),
(40,'542','2010-11-08 17:00:00','Sunt deserunt fuga ',16,'Tempor rerum sit vol','Qui delectus alias ','Explicabo In magni ','WTR-20250807145432-9959',1,'Erasmus Duran'),
(41,'372','1992-11-07 17:00:00','Cupiditate velit il',76,'Consectetur do enim','Irure laboriosam cu','Aut accusantium dele','WTR-20250807145516-9416',1,'Iris Howell'),
(42,'998','1992-11-28 17:00:00','Dolores aliquip eum ',30,'Et temporibus do vol','Quaerat et aut hic s','Adipisicing dolorum ','WTR-20250807145822-9801',1,'Ayanna Randall'),
(43,'545','2021-02-10 17:00:00','Tenetur officiis nis',79,'Aut et id maiores du','Omnis asperiores deb','A esse sapiente dist','WTR-20250807150310-5239',1,'Tashya Atkinson'),
(44,'195','1976-04-24 17:00:00','Reiciendis aut elit',33,'Velit minim et numq','Eum ut deserunt adip','Maiores anim anim ip','WTR-20250807150549-7795',1,'Oren Cleveland'),
(45,'296','2024-01-30 17:00:00','Autem at saepe sint',60,'Tempore tempore ve','Irure nulla ipsam pl','Amet eum quis volup','WTR-20250808093512-6504',1,'Harper Tanner'),
(46,'569','2004-07-17 17:00:00','Fuga Quis veritatis',96,'Velit in irure nisi ','Rem corrupti tempor','Sit consectetur eu','WTR-20250808093534-2247',1,'Nero Bass'),
(47,'+1 (387) 409-4491','2021-04-01 17:00:00','Dolores dicta pariat',63,'Amet eius eius iust','Aliqua Incidunt vo','Avanza','WTR-20250808122746-1782',1,'Ryan Travis');
/*!40000 ALTER TABLE `city_tour_booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `whatsapp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `ig` varchar(100) DEFAULT NULL,
  `tiktok` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES
(1,'6281234567891','firman.doe@example.com','Pasar Minggu, No. 12, Jakarta','http://facebook.com/firmandoe','http://instagram.com/firmandoe','http://tiktok.com/@firmandoe','http://twitter.com/firmandoe','2025-08-10 13:30:07','2025-08-10 13:31:35',NULL);
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_content`
--

DROP TABLE IF EXISTS `gallery_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_image` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_content`
--

LOCK TABLES `gallery_content` WRITE;
/*!40000 ALTER TABLE `gallery_content` DISABLE KEYS */;
INSERT INTO `gallery_content` VALUES
(1,'media_uploads/gallery-images/eadc5c250757bba9ae1e20d81479ee3d.png','2025-08-10 09:42:49','2025-08-10 14:42:54','2025-08-10 09:42:54'),
(2,'media_uploads/gallery-images/43d155eff7b575bd2b37fddb28b44776.png','2025-08-10 09:52:14','2025-08-10 14:52:17','2025-08-10 09:52:17'),
(3,'media_uploads/gallery-images/0fca666f6e6538dc929f27e1b81c28e0.png','2025-08-10 09:52:26','2025-08-10 14:55:28','2025-08-10 09:55:28'),
(4,'media_uploads/gallery-images/43c2b9d56f68a749776f5f0d46270c2b.png','2025-08-10 09:52:36','2025-08-10 09:52:36',NULL),
(5,'media_uploads/gallery-images/b3d65af2d5b1dd97e51f0d18b919f516.png','2025-08-10 09:52:42','2025-08-10 09:52:42',NULL),
(6,'media_uploads/gallery-images/48748867442a1e1905241afb895e1c24.png','2025-08-10 09:52:48','2025-08-10 09:52:48',NULL),
(7,'media_uploads/gallery-images/c2460ca3935565143ccf514b1abb6228.png','2025-08-10 09:53:00','2025-08-10 09:53:00',NULL),
(8,'media_uploads/gallery-images/f2ab4d692c2725b5c177f74d43e2ade9.png','2025-08-10 09:53:08','2025-08-10 09:53:08',NULL),
(9,'media_uploads/gallery-images/01ebc7a97c4ae7adbd9e7d7b3774ade8.png','2025-08-10 09:53:18','2025-08-10 09:53:18',NULL),
(10,'media_uploads/gallery-images/a4fe2aee80c32141d268f9f2a724adb0.png','2025-08-10 09:53:23','2025-08-10 09:53:23',NULL),
(11,'media_uploads/gallery-images/6230566737dc8e3ca31333b9b27ddd27.png','2025-08-10 09:53:28','2025-08-10 09:53:28',NULL),
(12,'media_uploads/gallery-images/78b8a67f9969687d2a8ff71ffac46640.png','2025-08-10 09:53:34','2025-08-10 09:53:34',NULL);
/*!40000 ALTER TABLE `gallery_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `header_content`
--

DROP TABLE IF EXISTS `header_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `header_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_rul` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `header_content`
--

LOCK TABLES `header_content` WRITE;
/*!40000 ALTER TABLE `header_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `header_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_logo`
--

DROP TABLE IF EXISTS `image_logo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `image_logo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_logo`
--

LOCK TABLES `image_logo` WRITE;
/*!40000 ALTER TABLE `image_logo` DISABLE KEYS */;
INSERT INTO `image_logo` VALUES
(4,'media_uploads/logo-image/3ecfb917ef015d8a62b49e446d4b1a45.png','2025-08-09 20:52:22','2025-08-10 01:09:45');
/*!40000 ALTER TABLE `image_logo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `mahasiswa` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `prodi_id` int(100) NOT NULL,
  `image_url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` VALUES
(1,'rover','Ducimus nobis delen','1995-07-07','P',2,'2025-07-27_02-56-57_97b318e4.png'),
(2,'ciaconna','Enim impedit magnam','2025-07-17','L',1,'2025-07-27_02-58-00_7288a4dd.png'),
(3,'zani','Mollit labore commod','2025-07-02','L',1,'2025-07-27_02-57-49_f1a99331.png'),
(5,'Eka Wulandari','3275012000082305','2000-08-23','P',1,'image1.png'),
(6,'Fajar Nugroho','3275011999110506','1999-11-05','L',2,'image1.png'),
(7,'Gita Rahmawati','3275012002022707','2002-02-27','P',3,'image1.png'),
(8,'Hendra Wijaya','3275011996031808','1996-03-18','L',4,'image1.png'),
(9,'Intan Permata','3275012001110909','2001-11-09','P',1,'image1.png'),
(10,'Joko Santoso','3275011998053000','1998-05-30','L',2,'image1.png'),
(11,'Firman','53109098981','2025-07-14','L',3,'image1.png'),
(12,'Firman 2','53109098982','2025-07-26','L',4,'image1.png'),
(18,'Alifia Intan','09801980','1997-06-06','P',4,'image1.png');
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_car`
--

DROP TABLE IF EXISTS `master_car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `master_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_car`
--

LOCK TABLES `master_car` WRITE;
/*!40000 ALTER TABLE `master_car` DISABLE KEYS */;
INSERT INTO `master_car` VALUES
(1,'Toyota Avanza','Mobil keluarga irit bahan bakar dan nyaman digunakan untuk perjalanan jauh.','media_uploads/cars-image/9324d0cd7cbeaeebb0a3a61781af10bc.png','2025-08-03 06:43:23','2025-08-13 15:23:30',NULL),
(2,'Honda Mobilio','Mobil MPV dengan desain elegan dan performa tangguh.','media_uploads/cars-image/3df19d3949f4e585116e27add850dc8f.png','2025-08-03 06:43:23','2025-08-13 15:23:45',NULL),
(3,'Suzuki Ertiga','Mobil serbaguna dengan fitur lengkap dan kabin luas.','media_uploads/cars-image/115e22b424d449d8dc8d6f528154da7c.png','2025-08-03 06:43:23','2025-08-13 15:23:17',NULL),
(4,'Daihatsu Xenia','Mobil dengan kapasitas besar cocok untuk rombongan.','media_uploads/cars-image/2e5a2a0868604966b15187e7c26cfec4.png','2025-08-03 06:43:23','2025-08-13 15:23:05',NULL),
(5,'Mitsubishi Xpander x','Mobil stylish dengan suspensi nyaman dan kabin lega.','media_uploads/cars-image/d4afd3b866426e56e52bc972e0f96aab.png','2025-08-03 06:43:23','2025-08-13 15:22:23',NULL),
(6,'test1','kdalksjdla','media_uploads/cars-image/2ea26b1bf95e9e60693e759ed3301b71.png','2025-08-13 07:53:42',NULL,'2025-08-13 08:31:29');
/*!40000 ALTER TABLE `master_car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_motorcycle`
--

DROP TABLE IF EXISTS `master_motorcycle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `master_motorcycle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_motorcycle`
--

LOCK TABLES `master_motorcycle` WRITE;
/*!40000 ALTER TABLE `master_motorcycle` DISABLE KEYS */;
INSERT INTO `master_motorcycle` VALUES
(7,'mikrosop','tahu bakar','media_uploads/motorcycle-image/351f8f51c6e20dcebe6f461745d76305.png','2025-08-13 09:18:08','2025-08-13 16:33:21',NULL),
(8,'jkjkKJHKJ','KLJLKJ','media_uploads/motorcycle-image/aa7fbc7fc2fe6f45d6069f87b0518a2d.png','2025-08-13 09:20:30','2025-08-13 16:20:30','2025-08-13 09:26:42'),
(9,'KJDUII','LKJLJLKJL','media_uploads/motorcycle-image/9c91a1e4056e5b33e1063900cdf8e494.png','2025-08-13 09:26:53','2025-08-13 16:26:53',NULL);
/*!40000 ALTER TABLE `master_motorcycle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `popup_image`
--

DROP TABLE IF EXISTS `popup_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `popup_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_image` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `popup_image`
--

LOCK TABLES `popup_image` WRITE;
/*!40000 ALTER TABLE `popup_image` DISABLE KEYS */;
INSERT INTO `popup_image` VALUES
(1,'media_uploads/popup-images/b408815841e65c815ffd24183a9d6fe4.png','2025-08-10 08:46:49','2025-08-10 13:52:13','2025-08-10 08:52:13'),
(2,'media_uploads/popup-images/d6d5db622751e84c5deb316c2053ae99.png','2025-08-10 08:52:04','2025-08-10 13:54:59','2025-08-10 08:54:59'),
(3,'media_uploads/popup-images/6bf806ff80a232af4a57ce35c39bd07c.png','2025-08-10 08:54:54','2025-08-10 13:55:50','2025-08-10 08:55:50'),
(4,'media_uploads/popup-images/8d58d89478b9b9b85476c4d37126f663.png','2025-08-10 08:55:23','2025-08-10 13:55:56','2025-08-10 08:55:56'),
(5,'media_uploads/popup-images/bd93d382070e0d8748935fffaccfb6bc.png','2025-08-10 08:56:04','2025-08-10 13:59:28','2025-08-10 08:59:28'),
(6,'media_uploads/popup-images/582c13dc3e3f11905f6348240a29a7ff.png','2025-08-10 08:59:23','2025-08-10 13:59:47','2025-08-10 08:59:47'),
(7,'media_uploads/popup-images/3fb703a0030eaab2972544c851dc7b3e.png','2025-08-10 09:00:18','2025-08-10 14:08:57','2025-08-10 09:08:57'),
(8,'media_uploads/popup-images/98cbe62e7040b86597087464b701ec89.png','2025-08-10 09:02:19','2025-08-13 21:38:49','2025-08-13 16:38:49'),
(9,'media_uploads/popup-images/48e45852a75c09e0d285334eeed61c87.png','2025-08-10 09:02:25','2025-08-10 09:02:25',NULL),
(10,'media_uploads/popup-images/415f9232d27091dc02fe1cb9d46dbff8.png','2025-08-10 09:02:30','2025-08-10 09:02:30',NULL),
(11,'media_uploads/popup-images/9a321ed5bb79dbafdd8460a6f60e3339.png','2025-08-10 09:03:03','2025-08-10 09:03:03',NULL),
(12,'media_uploads/popup-images/1ecf1a7e2359850523088a327746429c.png','2025-08-10 09:08:41','2025-08-10 14:09:00','2025-08-10 09:09:00'),
(13,'media_uploads/popup-images/d3b2ba341a4540cd3be4b352d21d7048.png','2025-08-10 09:09:38','2025-08-10 14:09:44','2025-08-10 09:09:44'),
(14,'media_uploads/popup-images/1630fc0cfd6a91d3ea12a22af574fcd2.png','2025-08-10 09:10:17','2025-08-10 09:10:17',NULL),
(15,'media_uploads/popup-images/74c7b8b4856fe28c86f74969b45f4180.png','2025-08-10 09:23:52','2025-08-10 14:23:56','2025-08-10 09:23:56');
/*!40000 ALTER TABLE `popup_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodi`
--

DROP TABLE IF EXISTS `prodi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `prodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prodi_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodi`
--

LOCK TABLES `prodi` WRITE;
/*!40000 ALTER TABLE `prodi` DISABLE KEYS */;
INSERT INTO `prodi` VALUES
(1,'Informatika'),
(2,'Kimia'),
(3,'Elektronika'),
(4,'Bidan');
/*!40000 ALTER TABLE `prodi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rent_bus_booking`
--

DROP TABLE IF EXISTS `rent_bus_booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `rent_bus_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wa_number` varchar(20) DEFAULT NULL,
  `booking_date_start` timestamp NULL DEFAULT NULL,
  `booking_date_end` timestamp NULL DEFAULT NULL,
  `pickup_address` text DEFAULT NULL,
  `total_passengers` int(11) DEFAULT NULL,
  `crated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `pickup_time` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT 1,
  `booking_code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rent_bus_booking`
--

LOCK TABLES `rent_bus_booking` WRITE;
/*!40000 ALTER TABLE `rent_bus_booking` DISABLE KEYS */;
INSERT INTO `rent_bus_booking` VALUES
(5,'786','2010-12-28 17:00:00','1975-04-23 17:00:00','Assumenda omnis simi',2,'2025-08-06 15:22:32',NULL,'Tanner Smith','09:38',1,'RB-20250806172232-5077'),
(6,'799','1988-05-15 17:00:00','2004-10-31 17:00:00','In aliquam est cupid',60,'2025-08-06 15:24:55',NULL,'Jermaine Nguyen','21:24',1,'RB-20250806172455-1700'),
(7,'846','1997-05-22 17:00:00','1984-02-13 17:00:00','Natus delectus repr',71,'2025-08-06 15:25:40',NULL,'Calista Brown','07:01',1,'RB-20250806172540-8508'),
(8,'591','2021-01-10 17:00:00','1999-11-24 17:00:00','Incididunt cumque re',10,'2025-08-07 12:56:45',NULL,'Angelica Dotson','15:22',1,'RB-20250807145645-5374'),
(9,'97','1988-04-28 17:00:00','2001-01-17 17:00:00','Tempore beatae omni',74,'2025-08-07 13:07:28',NULL,'Sophia Dillard','18:07',1,'RB-20250807150728-3312'),
(10,'2','2009-12-16 17:00:00','1998-07-06 17:00:00','Et et laboris dolore',22,'2025-08-08 08:38:02',NULL,'Jaime Dixon','10:23',1,'RB-20250808103802-6700');
/*!40000 ALTER TABLE `rent_bus_booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rent_car_booking`
--

DROP TABLE IF EXISTS `rent_car_booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `rent_car_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `booking_code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rent_car_booking`
--

LOCK TABLES `rent_car_booking` WRITE;
/*!40000 ALTER TABLE `rent_car_booking` DISABLE KEYS */;
INSERT INTO `rent_car_booking` VALUES
(32,336,'1991-09-02 17:00:00','2005-09-30 17:00:00','Mitsubishi Xpander','Distinctio Ullam qu','Pariatur Minima lab','2025-08-05 23:19:13',NULL,5,'William Kirby','Facilis ut cillum qu','Ipsum vero et ut ni',1,'RTL-20250806061913-9247'),
(33,178,'1999-05-02 17:00:00','1977-07-04 17:00:00','Mitsubishi Xpander','Ipsam maxime aut qui','Earum repudiandae pa','2025-08-05 23:31:15',NULL,5,'Orlando Schneider','Assumenda perferendi','Sed quos qui aperiam',1,'RTL-20250806063115-8942'),
(34,83,'2006-03-26 17:00:00','1984-06-30 17:00:00','Daihatsu Xenia','Illo consequuntur co','Sunt laboris sit a','2025-08-05 23:40:02',NULL,4,'Carissa Mcdaniel','Ut in ex deleniti la','Quisquam ad ipsa vo',1,'RTL-20250806064002-9107'),
(35,880,'2004-06-12 17:00:00','1987-12-11 17:00:00','Suzuki Ertiga','Exercitationem aut m','Et amet enim sint ','2025-08-06 09:34:07',NULL,3,'Cecilia Estes','Qui eum iure ut et s','Quo dolore deleniti ',1,'RTL-20250806163407-4538'),
(36,2,'2013-01-04 17:00:00','2024-10-08 17:00:00','Honda Mobilio','Est quae harum iure ','Minim reprehenderit ','2025-08-07 08:06:58',NULL,2,'Kasimir Mcpherson','Ipsum ex rerum eos ','Culpa aut commodi e',1,'RTL-20250807150658-2509');
/*!40000 ALTER TABLE `rent_car_booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider_content`
--

DROP TABLE IF EXISTS `slider_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `slider_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider_content`
--

LOCK TABLES `slider_content` WRITE;
/*!40000 ALTER TABLE `slider_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `slider_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimoni_content`
--

DROP TABLE IF EXISTS `testimoni_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimoni_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimoni_content`
--

LOCK TABLES `testimoni_content` WRITE;
/*!40000 ALTER TABLE `testimoni_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `testimoni_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `title_description_web`
--

DROP TABLE IF EXISTS `title_description_web`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `title_description_web` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `title_description_web`
--

LOCK TABLES `title_description_web` WRITE;
/*!40000 ALTER TABLE `title_description_web` DISABLE KEYS */;
INSERT INTO `title_description_web` VALUES
(1,'Wak Trans update 3','Hallo selamat datang di website wak trans','2025-08-10 12:44:40',NULL,'2025-08-10 08:32:05');
/*!40000 ALTER TABLE `title_description_web` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tour_package`
--

DROP TABLE IF EXISTS `tour_package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tour_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tour_package`
--

LOCK TABLES `tour_package` WRITE;
/*!40000 ALTER TABLE `tour_package` DISABLE KEYS */;
/*!40000 ALTER TABLE `tour_package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tour_reccomendation_content`
--

DROP TABLE IF EXISTS `tour_reccomendation_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tour_reccomendation_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tour_reccomendation_content`
--

LOCK TABLES `tour_reccomendation_content` WRITE;
/*!40000 ALTER TABLE `tour_reccomendation_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `tour_reccomendation_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_profile` (
  `id` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profile`
--

LOCK TABLES `user_profile` WRITE;
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` enum('CUSTOMER','ADMIN') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'guest@gmail.com','guest','CUSTOMER'),
(13,'firmanazharr@gmail.com','12345678','ADMIN');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_header`
--

DROP TABLE IF EXISTS `video_header`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `video_header` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_video` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_header`
--

LOCK TABLES `video_header` WRITE;
/*!40000 ALTER TABLE `video_header` DISABLE KEYS */;
INSERT INTO `video_header` VALUES
(1,'https://www.youtube.com/watch?v=Fve_lHIPa-I&list=RDFve_lHIPa-I&start_radio=1','2025-08-10 13:21:00','2025-08-10 08:21:12',NULL);
/*!40000 ALTER TABLE `video_header` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'travel_tour'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2025-08-14 14:35:35
