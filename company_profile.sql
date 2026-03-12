-- MySQL dump 10.13  Distrib 8.2.0, for macos13 (arm64)
--
-- Host: localhost    Database: company_profile
-- ------------------------------------------------------
-- Server version	8.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Coffee','2026-02-05 08:57:27','2026-02-05 08:57:27'),(2,'Non Coffee','2026-02-05 08:57:27','2026-02-05 08:57:27'),(3,'Food','2026-02-05 08:57:27','2026-02-05 08:57:27'),(4,'Snack','2026-02-05 08:57:27','2026-02-05 08:57:27'),(5,'Dessert','2026-02-05 08:57:27','2026-02-05 08:57:27');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entertainments`
--

DROP TABLE IF EXISTS `entertainments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entertainments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `path_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_weekend` int NOT NULL,
  `price_weekday` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entertainments`
--

LOCK TABLES `entertainments` WRITE;
/*!40000 ALTER TABLE `entertainments` DISABLE KEYS */;
INSERT INTO `entertainments` VALUES (1,'test wahana','test dreskrip wahana 1','entertainment/mPZV5euxiB0DFdMt8xbWT4foegd00FTSiSBG6JjQ.jpg','entertainment/MnSAmpbGtMkW3VrgMfj7gak5llCPmGpvjhRE74AL.jpg','entertainment/EpJ19tBTwmU3fr3BhhwgDlDFeLDJSKSCGkDRhrMT.jpg',1000000,100000,'2026-02-05 09:03:26','2026-02-05 09:03:26');
/*!40000 ALTER TABLE `entertainments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'2026-02-05','12:12:00',NULL,'test event','tes event','events/ov2WtDw4MBkITFwLuiIKjYzqTxEZHgEMcGGsk28F.jpg','2026-02-05 09:04:27','2026-02-05 09:04:27');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilities`
--

DROP TABLE IF EXISTS `facilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facilities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities`
--

LOCK TABLES `facilities` WRITE;
/*!40000 ALTER TABLE `facilities` DISABLE KEYS */;
/*!40000 ALTER TABLE `facilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES (1,'gallery/SaIxVtnCysyccZAeiDhjhlTJ5OFl422zO8NrJffC.jpg','test title','tesdeksripsi','2026-02-05 09:02:09','2026-02-05 09:02:09');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `masters`
--

DROP TABLE IF EXISTS `masters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `masters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `greating_home_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `greating_home_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `greating_home_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `misi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `foto_sejarah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sejarah` text COLLATE utf8mb4_unicode_ci,
  `desc_wahana` text COLLATE utf8mb4_unicode_ci,
  `desc_gallery` text COLLATE utf8mb4_unicode_ci,
  `desc_facilities` text COLLATE utf8mb4_unicode_ci,
  `desc_our_menu` text COLLATE utf8mb4_unicode_ci,
  `desc_our_menu_home` text COLLATE utf8mb4_unicode_ci,
  `desc_event` text COLLATE utf8mb4_unicode_ci,
  `desc_event_home` text COLLATE utf8mb4_unicode_ci,
  `kedai_senin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kedai_selasa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kedai_rabu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kedai_kamis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kedai_jumat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kedai_sabtu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kedai_minggu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wahana_senin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wahana_selasa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wahana_rabu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wahana_kamis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wahana_jumat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wahana_sabtu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wahana_minggu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_delay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_footer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `link_instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_tiktok` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_maps` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `masters`
--

LOCK TABLES `masters` WRITE;
/*!40000 ALTER TABLE `masters` DISABLE KEYS */;
INSERT INTO `masters` VALUES (1,'Selamat datang,','PT Berkah Maju Yuniar','Engineering Services & Asset Integrity Solutions','To provide accurate, reliable, and innovative engineering solutions that fitness and extend the lifecycle of equipment and facility assets and ensure operational safety','To become a leading national reference in the field of Asset Integrity Management and Reverse Engineering, recognized expert and responsive engineer focus for solution, camplete tools, equipment, and software for technical excellence','-','PT Berkah Maju Yuniar is a premier engineering consultancy based in Jakarta.\r\n\r\nWe bridge the gap between theoretical design, government regulation, code and standard, owner specification and practical operations maintenance. Our focus is on fitness and extending the lifecycle of critical equipment and facility assets.',NULL,'Suasana, momen, dan kegiatan terbaik dari kedai kami ☕🎶','Nikmati berbagai wahana menarik untuk melengkapi pengalaman terbaikmu di Botanika Coffee.','Pilih kategori favoritmu dan temukan rasa terbaik dari Botanika Coffee.','Nikmati berbagai menu menarik yang kami selenggarakan di BOTANIKA Coffee setiap minggunya!','Temukan beragam acara menarik yang siap memeriahkan hari-harimu! Dari live music, pameran seni, workshop seru, hingga event spesial lainnya, semuanya bisa kamu nikmati di sini.','Nikmati berbagai kegiatan menarik yang kami selenggarakan di BOTANIKA Coffee setiap minggunya!',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'3000','PT Berkah Maju Yuniar','Engineering Services & Asset Integrity Solutions','-','-','-','-','-','Alamat: Jl. Boenoet Lembur Kuring, Puncak, Kec. Cigugur, Kabupaten Kuningan, Jawa Barat 45552','081324926596','2026-02-05 08:57:27','2026-02-07 07:33:47');
/*!40000 ALTER TABLE `masters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_best` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'4','Comprehensive Engineering Solutions','Reverse Engineering Services\r\nResidual Life Assessment (RLA)\r\nPlant Design Review\r\nRisk Analysis Services\r\nCalculation Engineering\r\nMechanical & Electrical Material Supply','menus/wBzbxyKlFG9qpq8opqmc54T3wdmZUNr0gvHoedG5.jpg','100000',1,'2026-02-05 09:04:57','2026-02-07 07:30:53'),(2,'2','Reverse Engineering Services','- Re-creation of design, Manufacture data record, data sheet, calculation engineering data for clearly equipment and\r\nfacility\r\n- 3D Scanning, re-drawing, re-calculation and material analysis\r\n- Cost-effective alternative to complete equipment and facility fitness and readines to operate','menus/n6wVMAAcqZSwEstXrNCObSOMohcOzkvv1XZjM8tj.jpg','0',1,'2026-02-07 07:31:53','2026-02-07 07:32:36');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2025_12_05_070910_create_master_table',1),(6,'2025_12_05_074458_create_events_table',1),(7,'2025_12_05_074502_create_menus_table',1),(8,'2025_12_05_075113_create_category_table',1),(9,'2025_12_11_135233_create_facility_table',1),(10,'2025_12_16_113648_create_galleries_table',1),(11,'2025_12_16_113950_create_sliders_table',1),(12,'2025_12_21_021007_create_entertainments_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (2,'slider/6osBX605Z4rwKWqdRZr1Zisj2IZZjqLw3lZQvrRN.jpg','test2','2026-02-06 09:40:47','2026-02-08 21:00:05');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator','admin@gmail.com','$2y$10$wI75G3rZHEI0ip2JOGVxS.pNTD2UEMo90L/0cqMP5Ko8D.q0gfA8S','2026-02-05 08:57:27','2026-02-05 08:57:27');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-02-10 11:39:07
