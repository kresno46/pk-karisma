-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: pk-karisma
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting_at` date NOT NULL,
  `budget` bigint unsigned NOT NULL,
  `brief` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appointments_product_id_foreign` (`product_id`),
  CONSTRAINT `appointments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendances`
--

DROP TABLE IF EXISTS `attendances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attendances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `work_date` date NOT NULL,
  `check_in_at` datetime DEFAULT NULL,
  `check_out_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `attendances_user_id_work_date_unique` (`user_id`,`work_date`),
  CONSTRAINT `attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendances`
--

LOCK TABLES `attendances` WRITE;
/*!40000 ALTER TABLE `attendances` DISABLE KEYS */;
INSERT INTO `attendances` VALUES (3,5,'2026-01-23','2026-01-23 20:55:19','2026-01-23 20:55:53','2026-01-23 13:55:19','2026-01-23 13:55:53');
/*!40000 ALTER TABLE `attendances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,'2026-01-23 10:39:18','2026-01-23 10:48:11','Jasa Pembuatan Rumah Kayu Di Depok','Rumah kayu telah menjadi pilihan yang populer dalam konstruksi rumah di berbagai belahan dunia. Kembali ke akar-akarnya, rumah kayu memiliki riwayat yang panjang sebagai jenis hunian yang berkelanjutan, berkesinambungan, dan memiliki keindahan alami yang tak tertandingi. Dalam ulasan ini, kita akan melihat-lihat mengapa PT. Karisma Gazebo Rakyat merupakan  Jasa Pembuatan Rumah Kayu Di Depok Kehangatan','blogs/0tJtgRI8ha9o8sY4qsuxy5PFmt3O0LIpIuiFpjCI.jpg','jasa-pembuatan-rumah-kayu-di-depok',1,'2026-01-23 10:39:18'),(2,'2026-01-23 10:40:24','2026-01-23 10:48:04','Jasa Pembuatan Rumah Kayu Di Subang','Rumah kayu telah menjadi pilihan yang populer dalam pengerjaan rumah di bermacam-macam belahan dunia. Kembali ke asal-usulnya, rumah kayu memiliki rekam jejak yang panjang sebagai model hunian yang peduli lingkungan, berkelanjutan, dan memiliki kecantikan alami yang tak tertandingi. Dalam artikel ini, kita akan menjelajahi mengapa PT. Karisma Gazebo Rakyat merupakan  Jasa Pembuatan Rumah Kayu Di Subang\r\n\r\nKehangatan dan Ketenangan Alamiah\r\nGedung kayu yang disusun oleh PT. Karisma Gazebo Rakyat menyediakan suasana aman dan nyaman yang tidak mudah disamai oleh bahan bangunan lainnya.\r\n\r\nBaca Juga: Jasa Pembuatan Website Profesional\r\n\r\nHalaman Ini: Jasa Pembuatan Rumah Kayu Di Subang\r\n\r\nKayu memiliki kemampuan alami untuk menjaga suhu di dalam gedung tetap stabil, menciptakan atmosfer yang nyaman sepanjang tahun. Selain itu, kerangka kayu yang dipilih dengan teliti menawarkan peredam suara yang baik, mengizinkan penghuni untuk menikmati ketenangan di dalam rumah mereka.\r\n\r\nKecantikan Alami dan Keunikan\r\nKeindahan alam yang asli dari kayu yang Kami kerjakan menyuguhkan estetika yang tidak tertandingi. Tiap potongan kayu punya pola dan warna yang spesial, menimbulkan impressi kecantikan yang asli dan hangat. Rumah kayu yang merek kerjakan juga disesuaikan dengan sejumlah gaya arsitektur, mulai dari rumah pedesaan yang mana kuno hingga rumah modern dengan aksesori minimalis sesuai pesanan Anda.\r\n\r\nRamah Lingkungan dan Berkelanjutan\r\nJika dibandingkan dengan bahan bangunan lainnya seperti beton atau baja, pembangunan rumah kayu lebih ekonomis dan menyebabkan emisi karbon yang lebih rendah. Kayu adalah bahan alam yang dapat diperbaharui, sehingga pembuatan rumah menggunakan kayu merupakan dukungan untuk prinsip-prinsip keberlanjutan dan lingkungan yang bersahabat.\r\n\r\nBaca Juga :Asal Joglo Kayu Jati\r\n\r\nSelain itu, penggunaan bahan daur ulang juga menjadi perhatian kami, meminimalkan dampak negatif terhadap lingkungan.\r\n\r\nKeserasian dan Kecepatan Konstruksi\r\nKonstruksi gedung kayu sering kali lebih gesit dan lebih efisien daripada menggunakan komponen pembangunan tradisional. Kerangka kayu dapat dipersiapkan di manufaktur dan terpasang dengan gesit di tempat pembangunan. Keluwesan dalam gagasan dan perakitan gedung kayu oleh PT. Karisma Gazebo Rakyat juga membolehkan untuk pengubahan dan modifikasi lebih gampang dibandingkan dengan komponen pembangunan sisa.\r\n\r\nKekuatan dan Kekokohan\r\nMeskipun sering dianggap ringan, bangunan kayu yang Kami bangun memiliki ketangguhan yang hebat. Bila dikombinasikan dengan cara konstruksi yang tepat, rumah kayu bisa memiliki ketahanan yang serupa atau bahkan lebih baik ketimbang rumah yang dibangun dengan bahan lainnya. Kayu juga mampu tahan gempa bumi dengan baik, menjadikannya alternatif yang amanah dalam area yang mudah terkena dari gempa.\r\n\r\nMengapa Memutuskan PT. Karisma Gazebo Rakyat pilih Pembuatan Rumah Kayu\r\nKetika memilih memilih pengerjaan bangunan kayu, vital untuk melibatkan perusahaan layanan yang berkualitas seperti PT. Karisma Gazebo Rakyat. Mereka memiliki pengetahuan dan riwayat sekitar 20 tahun lamanya ini juga dapat memastikan bahwa bangunan kayu Anda dibangun dengan bagus, selamat, dan patut dengan kebutuhan Anda. Dengan menggunakan jasa Kami Anda dapat menjamin bahwa rumah kayu Anda tidak hanya menawan secara estetika, tetapi juga tahan lama, eco-friendly, dan nyaman untuk ditinggali.\r\n\r\nBaca Juga: Joglo Minimalis Modern Model Terbaru\r\n\r\nBaca Juga: Rumah Kayu Sederhana\r\n\r\nDalam memilih Jasa Pembuatan Rumah Kayu Di Subang , Pastikanlah untuk memperhitungkan nama baik usaha, pengalaman praktis, dan daftar pekerjaan sebelumnya. Jasa Pembuatan Rumah Kayu Di SubangPerbincangkan secara terperinci tentang keperluan Anda dan harapan Anda terhadap bangunan kayu yang akan diciptakan. Dengan melakukan itu, Anda dapat menjamin bahwa Anda bekerja dengan spesialis yang akan membimbing merealisasikan tempat tinggal idaman berbahan kayu Anda dengan lengkap. Jika Anda memilih PT. Karisma Gazebo Rakyat, Anda memilih untuk bekerja dengan orang yang ahli yang memiliki komitmen pada mutu, kesinambungan, dan satisfaksi pembeli. Sudah baca Semua Halaman Jasa Pembuatan Rumah Kayu Di Subang ?. jangan Lupa Berkomentar','blogs/o5xZeQPXbX98ppIbslMRfbvqr5C0U9GAJnJq12bi.webp','rumah-kayu',1,'2026-01-23 10:40:24'),(3,'2026-01-25 08:07:07','2026-01-25 08:07:28','TES','TESTING','blogs/XHnRfcz9l0I1KN8GovT92ThnXtA8M1XbbycaS1DW.png','kayu-ulin',1,'2026-01-25 08:07:28');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('spatie.permission.cache','a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:21:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:17:\"Manage Statistics\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:15:\"Manage Products\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:17:\"Manage Principles\";s:1:\"c\";s:3:\"web\";}i:3;a:3:{s:1:\"a\";i:4;s:1:\"b\";s:19:\"Manage Testimonials\";s:1:\"c\";s:3:\"web\";}i:4;a:3:{s:1:\"a\";i:5;s:1:\"b\";s:14:\"Manage Clients\";s:1:\"c\";s:3:\"web\";}i:5;a:3:{s:1:\"a\";i:6;s:1:\"b\";s:12:\"Manage Teams\";s:1:\"c\";s:3:\"web\";}i:6;a:3:{s:1:\"a\";i:7;s:1:\"b\";s:13:\"Manage Abouts\";s:1:\"c\";s:3:\"web\";}i:7;a:3:{s:1:\"a\";i:8;s:1:\"b\";s:18:\"Manage Appointment\";s:1:\"c\";s:3:\"web\";}i:8;a:3:{s:1:\"a\";i:9;s:1:\"b\";s:20:\"Manage Hero Sections\";s:1:\"c\";s:3:\"web\";}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:16:\"Kelola Statistik\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:13:\"Kelola Produk\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:14:\"Kelola Prinsip\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:16:\"Kelola Testimoni\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:12:\"Kelola Klien\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:10:\"Kelola Tim\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:14:\"Kelola Tentang\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:17:\"Kelola Janji Temu\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:18:\"Kelola Bagian Hero\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:15:\"Kelola Pengguna\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:14:\"Kelola Absensi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:11:\"Kelola Blog\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"super_admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:14:\"design_manager\";s:1:\"c\";s:3:\"web\";}}}',1769694152);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_abouts`
--

DROP TABLE IF EXISTS `company_abouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_abouts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_abouts`
--

LOCK TABLES `company_abouts` WRITE;
/*!40000 ALTER TABLE `company_abouts` DISABLE KEYS */;
INSERT INTO `company_abouts` VALUES (1,'PK-Karisma','thumbnails/HiGRUT4aKEhHvEzxNl40wIXDTdpRBVf6rOumkeYu.png','Visi',NULL,'2026-01-22 08:09:56','2026-01-23 10:23:15'),(2,'PK-Karisma','thumbnails/V9BvNTofy5l2qNQ96MVASdiKng1yWMIlEY0GEzzN.png','Misi',NULL,'2026-01-23 10:23:00','2026-01-23 10:23:00');
/*!40000 ALTER TABLE `company_abouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_keypoints`
--

DROP TABLE IF EXISTS `company_keypoints`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_keypoints` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `keypoint` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_about_id` bigint unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_keypoints_company_about_id_foreign` (`company_about_id`),
  CONSTRAINT `company_keypoints_company_about_id_foreign` FOREIGN KEY (`company_about_id`) REFERENCES `company_abouts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_keypoints`
--

LOCK TABLES `company_keypoints` WRITE;
/*!40000 ALTER TABLE `company_keypoints` DISABLE KEYS */;
INSERT INTO `company_keypoints` VALUES (7,'Sudah 20 tahun sejak pertama kali kami membangun sebuah gazebo untuk client kami di daerah jakarta, sejak itu pula kami berkomitmen untuk terus meningkatkan kualitas kami baik dari segi jasa maupun kualitas produk kami.',2,NULL,'2026-01-23 10:23:00','2026-01-23 10:23:00'),(8,'Kini kami telah berdiri dengan banyak hal yang tentunya lebih baik dari hari sebelumnya, kami telah di percaya untuk mengerjakan puluhan proyek di seluruh wilayah di indonesia.',2,NULL,'2026-01-23 10:23:00','2026-01-23 10:23:00'),(9,'Kami siap membantu anda yang sedang membutuhkan tenaga ahli dalam pembuatan gazebo maupun rumah kayu, anda dapat langsung datang ke workshop kami untuk berinteraksi lebih jelas.',2,NULL,'2026-01-23 10:23:00','2026-01-23 10:23:00'),(10,'Kami bekerja keras untuk membangun gazebo dan rumah kayu terbaik untuk anda',1,NULL,'2026-01-23 10:23:15','2026-01-23 10:23:15'),(11,'Kami bekerja keras untuk membangun gazebo dan rumah kayu terbaik untuk anda',1,NULL,'2026-01-23 10:23:15','2026-01-23 10:23:15'),(12,'Kami bekerja keras untuk membangun gazebo dan rumah kayu terbaik untuk anda',1,NULL,'2026-01-23 10:23:15','2026-01-23 10:23:15');
/*!40000 ALTER TABLE `company_keypoints` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_statistics`
--

DROP TABLE IF EXISTS `company_statistics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_statistics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `goal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_statistics`
--

LOCK TABLES `company_statistics` WRITE;
/*!40000 ALTER TABLE `company_statistics` DISABLE KEYS */;
INSERT INTO `company_statistics` VALUES (1,'KRESNO NUGROHO PAMUNGKAS','sukses','icons/Kdn1urFooOsWtHp2oPU16XCQF8vcCkCUtYlXQFw9.jpg','2026-01-23 06:40:34','2026-01-22 08:30:17','2026-01-23 06:40:34'),(2,'Proyek Kayu Terselesaikan','350+','icons/z5G2Vip4tX34SxYHEcVbYEFjBjpG3IUTN0pE9ZjF.png',NULL,'2026-01-23 06:43:01','2026-01-28 14:18:03'),(3,'Mitra Industri Aktif','120+','icons/kyllUZAG4irGx2SZV3rBZKOONlz62sVx7jOYwriA.png',NULL,'2026-01-23 06:43:01','2026-01-28 14:17:55'),(4,'Pengiriman Tepat Waktu','98%','icons/nCeyuu5yvBVpFoMzSrzWjN16T5QnC0hckda8B9np.png',NULL,'2026-01-23 06:43:01','2026-01-28 14:17:46'),(5,'Kapasitas Produksi / Bulan','2.500 m³','icons/dAyJit7VveJqESvyYPyHWhMHtdTCqziiJTVmstiJ.png',NULL,'2026-01-23 06:43:01','2026-01-28 14:17:18');
/*!40000 ALTER TABLE `company_statistics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `hero_sections`
--

DROP TABLE IF EXISTS `hero_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hero_sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subheading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `achievement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hero_sections`
--

LOCK TABLES `hero_sections` WRITE;
/*!40000 ALTER TABLE `hero_sections` DISABLE KEYS */;
INSERT INTO `hero_sections` VALUES (1,'jasa Pembuatan Rumah Kayu','Kami menyediakan jasa pembuatan rumah kayu dengan berbagai macam material, mulai dari kayu ulin hingga kayu meranti.','Rumah Kayu','banners/CNTu0TDjDKOdCivJpz0ovIW6SuwhfRmwGZ1qWlMi.webp','https://youtu.be/fKbP7bdDUIg?si=ibnTxNMMzRvfXlKQ',NULL,'2026-01-22 07:58:48','2026-01-23 09:20:00'),(2,'Jasa Pembuatan Gazebo Kayu ULIN','Kami memproduksi gazebo dengan material kayu kelapa, kami juga siap melayani pesanan gazebo sesuai dengan desain yang anda inginkan.','Gazebo Kayu ulin','banners/0b8QsvEZ0q75XZzYYPk5mPocEIKj0PXD1U7PpUM4.jpg','https://youtu.be/L60jp0TMLXM?si=UFc2jsBuUJ-4Jx-n',NULL,'2026-01-23 09:50:33','2026-01-25 10:08:34');
/*!40000 ALTER TABLE `hero_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_06_24_165000_create_permission_tables',1),(5,'2025_06_26_171322_create_project_clients_table',1),(6,'2025_06_26_171326_create_products_table',1),(7,'2025_06_26_171331_create_company_statistics_table',1),(8,'2025_06_26_171335_create_testimonials_table',1),(9,'2025_06_26_171339_create_appointments_table',1),(10,'2025_06_26_171343_create_our_principles_table',1),(11,'2025_06_26_171348_create_hero_sections_table',1),(12,'2025_06_26_171352_create_our_teams_table',1),(13,'2025_06_26_171356_create_company_abouts_table',1),(14,'2025_06_26_171400_create_company_keypoints_table',1),(15,'2025_12_17_030515_create_blogs_table',1),(16,'2025_12_17_034549_add_columns_to_blogs_table',1),(17,'2025_07_01_000000_create_attendances_table',2),(18,'2025_07_01_000001_add_profile_photo_to_users_table',3),(19,'2026_01_23_160827_update_products_about_column',4),(20,'2026_01_23_174310_add_image_to_blogs_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',2),(3,'App\\Models\\User',5);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `our_principles`
--

DROP TABLE IF EXISTS `our_principles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `our_principles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `our_principles`
--

LOCK TABLES `our_principles` WRITE;
/*!40000 ALTER TABLE `our_principles` DISABLE KEYS */;
INSERT INTO `our_principles` VALUES (1,'Seleksi Kayu Ketat','Pemilihan grade dan kadar air sesuai standar agar produk stabil dan tahan lama.','thumbnails/pYutypQ11wS7v9aRoycTQk9DnEL2SNc0MttVPD6Z.webp','icons/nqBRokMiU20x28EM3ewmKtzrdpqc1XGJCyCsiqi8.png',NULL,'2026-01-22 08:12:51','2026-01-23 10:17:05'),(2,'Produksi Presisi','Potong, finishing, dan kontrol kualitas yang konsisten untuk hasil rapi.','thumbnails/KpRUuys8ApjihiyBL5JYoQytfhid4cR0tJacP4fk.webp','icons/sqHSHKn731qKSMKgXScIGt8YK1Yjg16UfmQPZaf0.png',NULL,'2026-01-23 06:39:02','2026-01-23 10:16:54'),(3,'Pengiriman Terjaga','Packing aman dan jadwal kirim jelas supaya material tiba tepat waktu.','thumbnails/GJkmLBKThhAIq6O6xuhBBlfB3ADxyPr0SEEEjPYJ.webp','icons/odb2SVirqqyHfZX9u47OmFCstZJoCxqfplTHBJPX.png',NULL,'2026-01-23 06:39:02','2026-01-23 10:16:36');
/*!40000 ALTER TABLE `our_principles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `our_teams`
--

DROP TABLE IF EXISTS `our_teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `our_teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `our_teams`
--

LOCK TABLES `our_teams` WRITE;
/*!40000 ALTER TABLE `our_teams` DISABLE KEYS */;
INSERT INTO `our_teams` VALUES (1,'kresno','team lead','avatars/uBvXVuysTcWaE8neFOw25D7IGlksS2eVOLANCBP1.png','jakarta','2026-01-25 09:27:54','2026-01-23 06:33:36','2026-01-25 09:27:54');
/*!40000 ALTER TABLE `our_teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Manage Statistics','web','2026-01-22 07:57:12','2026-01-22 07:57:12'),(2,'Manage Products','web','2026-01-22 07:57:12','2026-01-22 07:57:12'),(3,'Manage Principles','web','2026-01-22 07:57:12','2026-01-22 07:57:12'),(4,'Manage Testimonials','web','2026-01-22 07:57:12','2026-01-22 07:57:12'),(5,'Manage Clients','web','2026-01-22 07:57:12','2026-01-22 07:57:12'),(6,'Manage Teams','web','2026-01-22 07:57:12','2026-01-22 07:57:12'),(7,'Manage Abouts','web','2026-01-22 07:57:12','2026-01-22 07:57:12'),(8,'Manage Appointment','web','2026-01-22 07:57:12','2026-01-22 07:57:12'),(9,'Manage Hero Sections','web','2026-01-22 07:57:12','2026-01-22 07:57:12'),(10,'Kelola Statistik','web','2026-01-22 08:53:50','2026-01-22 08:53:50'),(11,'Kelola Produk','web','2026-01-22 08:53:50','2026-01-22 08:53:50'),(12,'Kelola Prinsip','web','2026-01-22 08:53:50','2026-01-22 08:53:50'),(13,'Kelola Testimoni','web','2026-01-22 08:53:50','2026-01-22 08:53:50'),(14,'Kelola Klien','web','2026-01-22 08:53:50','2026-01-22 08:53:50'),(15,'Kelola Tim','web','2026-01-22 08:53:50','2026-01-22 08:53:50'),(16,'Kelola Tentang','web','2026-01-22 08:53:50','2026-01-22 08:53:50'),(17,'Kelola Janji Temu','web','2026-01-22 08:53:50','2026-01-22 08:53:50'),(18,'Kelola Bagian Hero','web','2026-01-22 08:53:50','2026-01-22 08:53:50'),(19,'Kelola Pengguna','web','2026-01-22 17:57:41','2026-01-22 17:57:41'),(20,'Kelola Absensi','web','2026-01-22 17:57:41','2026-01-22 17:57:41'),(21,'Kelola Blog','web','2026-01-23 10:38:21','2026-01-23 10:38:21');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Jasa Pembuatan Gazebo Kayu Kelapa','Gazebo kayu kelapa adalah pilihan sempurna untuk menciptakan nuansa alami dan eksotis di taman atau halaman rumah Anda. Terbuat dari kayu kelapa yang kuat dan tahan lama, gazebo ini tidak hanya menawarkan keteduhan, tetapi juga keindahan yang unik dengan tekstur dan warna alami kayu kelapa. Ideal untuk bersantai, gazebo kayu kelapa menambahkan sentuhan tropis yang menawan ke lingkungan sekitar','Gazebo','thumbnails/EdfDSslY2Xdi63JYTSD3TRlTYejDhaqbTOL8CYSr.jpg',NULL,'2026-01-22 08:08:26','2026-01-23 09:09:43'),(2,'Jasa Pembuatan Gazebo Kayu Jati','Gazebo kayu jati menghadirkan keindahan dan ketahanan luar biasa di taman atau halaman Anda. Dengan serat kayu yang indah dan kekuatan alami, gazebo ini menawarkan tempat yang nyaman dan elegan untuk bersantai. Kayu jati juga dikenal tahan terhadap cuaca, menjadikannya pilihan ideal untuk konstruksi luar ruangan.','Gazebo','thumbnails/o2CJQ7MONA4lF7dFh0cUcZFfX1FwEOpEQdlPnYhh.jpg',NULL,'2026-01-23 09:10:29','2026-01-23 09:10:29'),(3,'Jasa Pembuatan Saung Bambu','Gazebo bambu menawarkan kesan alami dan sederhana yang menenangkan, cocok untuk taman atau halaman rumah. Dengan struktur ringan namun kuat, gazebo bambu menciptakan suasana tropis yang nyaman. Material bambu yang ramah lingkungan juga menambah nilai estetika dan fungsionalitas, menjadikannya pilihan populer untuk ruang bersantai di luar ruangan.','Saung','thumbnails/OU3uZCYryI1PcrIlyvQgnXdMGr0LGsLWYhIAdZig.jpg',NULL,'2026-01-23 09:11:05','2026-01-23 09:11:05'),(4,'Jasa Pembuatan Kusen Pintu','Jasa pembuatan kusen pintu menawarkan solusi custom untuk mempercantik dan memperkuat pintu rumah Anda. Dengan bahan berkualitas dan pengerjaan detail, kusen pintu yang dibuat akan sesuai dengan desain dan kebutuhan Anda. Layanan ini memastikan hasil yang tahan lama dan estetis, menambah nilai dan keamanan pada properti Anda.','Kusen','thumbnails/hCn303DquCXqPuSjexG36EWWpOKNPcHud2E39F1O.jpg',NULL,'2026-01-23 09:11:43','2026-01-23 09:11:43'),(5,'Pemasangan Atap Ijuk','Kami memproduksi atap berbahan dasar ijuk untuk keperluan gazebo saung bambu yang juga bisa anda pesan secara terpisah','Atap','thumbnails/Yke2DEEAiNpJZmN7RJDhztgQuwzphLouRrMM0aqB.webp',NULL,'2026-01-23 09:14:33','2026-01-23 09:14:33'),(6,'Pemasangan Atap Rumbia','Kami memproduksi atap berbahan dasar Rumbia untuk keperluan gazebo saung bambu yang juga bisa anda pesan secara terpisah','Atap','thumbnails/GfCg9C6W5eQEEN5CidaD07rRtpaw1sJxB82l5h4j.webp',NULL,'2026-01-23 09:15:18','2026-01-23 09:15:18'),(7,'Jasa Pembuatan Bilik Bambu','Kami memproduksi Bilik berbahan dasar anyaman bambu untuk keperluan gazebo saung bambu yang juga bisa anda pesan secara terpisah','Bambu','thumbnails/jnVwQaoC3qgwDS9nz1vDz6tDe3J4hHfnFVXq6yvh.webp',NULL,'2026-01-23 09:15:44','2026-01-23 09:15:44');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_clients`
--

DROP TABLE IF EXISTS `project_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_clients`
--

LOCK TABLES `project_clients` WRITE;
/*!40000 ALTER TABLE `project_clients` DISABLE KEYS */;
INSERT INTO `project_clients` VALUES (1,'KRESNO NUGROHO PAMUNGKAS','Karyawan Swasta','avatars/nUrTqd12OjQuEbAywZVVLwOEvAYuT2TEhRNHlVDX.png','logos/zsEb6w1iIOLtkMNLcQvCvQOuxrx3LkAUmy6vsL5t.png',NULL,'2026-01-23 09:45:35','2026-01-23 09:45:35');
/*!40000 ALTER TABLE `project_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(11,2),(12,2),(13,2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'super_admin','web','2026-01-22 07:57:12','2026-01-22 07:57:12'),(2,'design_manager','web','2026-01-22 07:57:13','2026-01-22 07:57:13'),(3,'user','web','2026-01-22 17:57:41','2026-01-22 17:57:41');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('VfYvoDgxufzDMQBSwerlKDgae9xYtLLn20DWdDsl',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUHhmY3Bmc0dSRUZPNElFekRZSkhzRWlNMkFSRVpta01hdkNDNWl5SiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9hdHRlbmRhbmNlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==',1769614600);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_client_id` bigint unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `testimonials_project_client_id_foreign` (`project_client_id`),
  CONSTRAINT `testimonials_project_client_id_foreign` FOREIGN KEY (`project_client_id`) REFERENCES `project_clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'thumbnails/0osRm8aKxowlxOovtG1CkeJGLHdyz9rke62LXzSb.jpg','Sangatt Menmuaskan dan pemasangannya baik',1,NULL,'2026-01-23 09:47:49','2026-01-23 09:48:23');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Test User','test@example.com',NULL,'2026-01-22 07:49:34','$2y$12$IF/IHqt6NwUpkz/h58JNFuBN0mYqtmW3BRyVAMCcqzK1Mt2Tes2Ui','zkoTDQc12F','2026-01-22 07:49:34','2026-01-22 07:49:34'),(2,'PK-Karisma','admin@pk-karisma.co.id','profile-photos/QvFWfmAJwKzCVFzm1fI4xZcF461ncqVWImDD5KgD.png',NULL,'$2y$12$te1VJN.iTED/98OOLXwzpO5Qbr4QUlF0k/ECW0/4dlpkeMEG34KXK',NULL,'2026-01-22 07:53:48','2026-01-23 02:33:38'),(5,'kang acong','jenkins@gmail.com',NULL,NULL,'$2y$12$QJ7qATROQSfABoiOrnRANeM/rzRBn6a2JMg6gcCfXQhLqPXmyAHKy',NULL,'2026-01-23 13:54:48','2026-01-23 13:54:48');
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

-- Dump completed on 2026-01-31 23:10:51
