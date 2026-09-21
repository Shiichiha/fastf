/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.20-12.3.3-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: fastf
-- ------------------------------------------------------
-- Server version	12.3.3-MariaDB

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2026_09_15_010048_create_categories_table',1),
(5,'2026_09_15_010105_create_products_table',1),
(6,'2026_09_15_010116_create_product_variants_table',1),
(7,'2026_09_15_010130_create_product_addons_table',1),
(8,'2026_09_15_011448_create_orders_table',1),
(9,'2026_09_15_011455_create_order_items_table',1),
(10,'2026_09_18_101014_make_category_id_nullable_in_products_table',1),
(11,'2026_09_18_101805_add_confirmed_at_to_orders_table',1),
(12,'2026_09_19_054700_add_payment_proof_to_orders_table',1),
(13,'2026_09_19_060519_create_queue_settings_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `variant_id` bigint(20) unsigned DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `variant_label` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  KEY `order_items_variant_id_foreign` (`variant_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue_code` varchar(3) NOT NULL,
  `receipt_code` varchar(6) NOT NULL,
  `payment_method` enum('cod','qris') NOT NULL,
  `payment_status` enum('pending','paid','expired') NOT NULL DEFAULT 'pending',
  `total` decimal(10,2) NOT NULL,
  `expires_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `confirmed_at` timestamp NULL DEFAULT NULL,
  `payment_proof` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_receipt_code_unique` (`receipt_code`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES
(1,'A01','QDE8NB','cod','paid',30000.00,'2026-09-18 23:51:11','2026-09-18 23:36:11','2026-09-18 23:36:20','2026-09-18 23:36:20',NULL),
(2,'A02','ZO130M','cod','paid',40000.00,'2026-09-19 00:08:03','2026-09-18 23:53:03','2026-09-18 23:53:27','2026-09-18 23:53:27',NULL),
(3,'A03','FNZU4X','cod','paid',35000.00,'2026-09-19 01:52:50','2026-09-19 01:37:50','2026-09-19 01:38:03','2026-09-19 01:38:03',NULL),
(4,'A04','GFYSM3','cod','paid',15000.00,'2026-09-19 02:27:42','2026-09-19 02:12:42','2026-09-19 02:14:50','2026-09-19 02:14:50',NULL),
(5,'A05','8AZXUM','cod','paid',10000.00,'2026-09-19 05:35:45','2026-09-19 05:20:45','2026-09-19 05:21:50','2026-09-19 05:21:50',NULL),
(6,'A06','FA3JBF','cod','paid',0.00,'2026-09-19 06:05:54','2026-09-19 05:50:54','2026-09-19 05:51:05','2026-09-19 05:51:05',NULL),
(7,'A07','4W7KST','cod','paid',10000.00,'2026-09-19 06:06:35','2026-09-19 05:51:35','2026-09-19 05:51:42','2026-09-19 05:51:42',NULL),
(8,'A08','9F22BJ','cod','paid',30000.00,'2026-09-19 06:15:28','2026-09-19 06:00:28','2026-09-19 06:00:49','2026-09-19 06:00:49',NULL),
(9,'A01','E1GQ8O','cod','paid',30000.00,'2026-09-19 22:38:05','2026-09-19 22:23:05','2026-09-19 22:23:17','2026-09-19 22:23:17',NULL),
(10,'A02','XFUVTE','cod','paid',45000.00,'2026-09-20 12:51:20','2026-09-20 12:36:20','2026-09-20 12:36:28','2026-09-20 12:36:28',NULL),
(11,'A03','ACMPD7','cod','paid',25000.00,'2026-09-20 12:51:56','2026-09-20 12:36:56','2026-09-20 13:18:40','2026-09-20 13:18:40',NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `product_addons`
--

DROP TABLE IF EXISTS `product_addons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_addons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `label` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_addons_product_id_foreign` (`product_id`),
  CONSTRAINT `product_addons_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_addons`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `product_addons` WRITE;
/*!40000 ALTER TABLE `product_addons` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_addons` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `product_variants`
--

DROP TABLE IF EXISTS `product_variants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_variants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `label` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_variants_product_id_foreign` (`product_id`),
  CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_variants`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `product_variants` WRITE;
/*!40000 ALTER TABLE `product_variants` DISABLE KEYS */;
INSERT INTO `product_variants` VALUES
(19,10,'Small',10000.00,'2026-09-20 13:49:12','2026-09-20 13:49:12'),
(20,10,'Medium',15000.00,'2026-09-20 13:49:12','2026-09-20 13:49:12'),
(21,10,'Large',25000.00,'2026-09-20 13:49:12','2026-09-20 13:49:12'),
(22,12,'Dada',11500.00,'2026-09-20 14:04:30','2026-09-20 14:04:30'),
(23,12,'Sayap',9000.00,'2026-09-20 14:04:30','2026-09-20 14:04:30'),
(24,12,'Paha Atas',10000.00,'2026-09-20 14:04:30','2026-09-20 14:04:30'),
(25,12,'Paha Bawah',9500.00,'2026-09-20 14:04:30','2026-09-20 14:04:30'),
(26,15,'Dada',13500.00,'2026-09-20 14:09:31','2026-09-20 14:09:31'),
(27,15,'Sayap',10000.00,'2026-09-20 14:09:31','2026-09-20 14:09:31'),
(28,15,'Paha Atas',12000.00,'2026-09-20 14:09:31','2026-09-20 14:09:31'),
(29,15,'Paha Bawah',11500.00,'2026-09-20 14:09:31','2026-09-20 14:09:31'),
(30,17,'Small',10000.00,'2026-09-20 14:11:59','2026-09-20 14:11:59'),
(31,17,'Medium',15000.00,'2026-09-20 14:11:59','2026-09-20 14:11:59'),
(32,17,'Large',20000.00,'2026-09-20 14:11:59','2026-09-20 14:11:59'),
(33,18,'Medium Hot',16000.00,'2026-09-20 14:14:11','2026-09-20 14:14:11'),
(34,18,'Extra Hot',20000.00,'2026-09-20 14:14:11','2026-09-20 14:14:11'),
(35,19,'Pure Vanilla',15000.00,'2026-09-20 14:16:26','2026-09-20 14:16:26'),
(36,19,'Chocolate Syrup',15000.00,'2026-09-20 14:16:26','2026-09-20 14:16:26'),
(37,19,'Chocolate Syrup + Cookies',15000.00,'2026-09-20 14:16:26','2026-09-20 14:16:26'),
(38,20,'Small',11000.00,'2026-09-20 14:18:12','2026-09-20 14:18:12'),
(39,20,'Medium',13000.00,'2026-09-20 14:18:12','2026-09-20 14:18:12'),
(40,20,'Large',15000.00,'2026-09-20 14:18:12','2026-09-20 14:18:12'),
(41,23,'Small',15000.00,'2026-09-20 14:22:56','2026-09-20 14:22:56'),
(42,23,'Medium',25000.00,'2026-09-20 14:22:56','2026-09-20 14:22:56'),
(43,23,'Large',35000.00,'2026-09-20 14:22:56','2026-09-20 14:22:56');
/*!40000 ALTER TABLE `product_variants` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES
(10,NULL,'French Fries','Kentang goreng renyah yang bisa menjadi cemilan menemani kamu di saat butuh cemilan',0.00,'products/D6SagMVRX1eeVyvo3UzzalvE27Pqvozl2iTJCNrM.jpg',1,'2026-09-20 13:49:12','2026-09-20 13:49:12'),
(11,NULL,'Chiken Nugget','Nugget ayam lezat, dapatkan dengan murah harga satuan yang terjangkau',6000.00,'products/kxYIEadTbIOq9HbgCYGBpMXs7FvMaR8cjGChzOLT.jpg',1,'2026-09-20 14:02:07','2026-09-20 14:02:07'),
(12,NULL,'Fried Chicken','Ayam goreng terbaik, ala ala Amerika bisa pilih sesuai bagian yang kalian mau',0.00,'products/UP8rnlJAG3DRqkAQVcoK0ran5fxDksQbHsA8ZzW5.jpg',1,'2026-09-20 14:04:30','2026-09-20 14:04:30'),
(13,NULL,'Hot Dog','Classic American Style hot dog yang bisa kau dapatkan dengan harga terjangakau',15000.00,'products/NruYJbl7CVKEC547vYS6OnOR9gbQUG86pmLI1VPQ.jpg',1,'2026-09-20 14:05:49','2026-09-20 14:05:49'),
(14,NULL,'Honey Glazed Chicken','Ayam dengan saus madu yang lezat memantapkan cita rasa ayam lewat sentuhan',25000.00,'products/KIKoueLMzKDzTgJwP2gqlIuXmc8unMgwDxBHcYdu.jpg',1,'2026-09-20 14:07:07','2026-09-20 14:07:07'),
(15,NULL,'Nasi Ayam Combo','dapatkan nasi dan ayam kesukaan mu dengan harga ter jangkau',0.00,'products/M40PKzVDawNWAAQRXTlEqgMCpORU7ImmhMRg6vnN.jpg',1,'2026-09-20 14:09:31','2026-09-20 14:09:31'),
(16,NULL,'Crisp Chips','Cemilan keripik kentang dengan harga yang terjangkau, lezat dan cukup menyenangkan',10000.00,'products/Qpr5TZgPCqu0LFSlmolAb4dF8zZ1SWPtW44ngEif.jpg',1,'2026-09-20 14:10:39','2026-09-20 14:10:39'),
(17,NULL,'Kebab','Kebab ala ala Turki, lezat dan cukup mengenyangkan datang dengan banyak varian',0.00,'products/iXDDsoyQCGwGbIeoX4hdEknLBWRig5f8rBeoBVs9.jpg',1,'2026-09-20 14:11:59','2026-09-20 14:11:59'),
(18,NULL,'Tacos','Tacos kini hadir, sebagai makanan khas Mexico dengan harga yang dapat di jangkau oleh pembeli dan hadir dengan variant',0.00,'products/kvzqjYe8rLk89W1V2iRWxXePeDMYLb3WkK5SkcVH.jpg',1,'2026-09-20 14:14:11','2026-09-20 14:14:11'),
(19,NULL,'Ice Cream Sundae','Sundae yang cocok untuk menjadi penutup hidangan anda, hadir dengan berbagai variant',0.00,'products/ewt6tM6HgmEQyJpOKcr9aEfsOFBzmzJpFJf2ukdv.jpg',1,'2026-09-20 14:16:26','2026-09-20 14:16:26'),
(20,NULL,'Coke','Classic Coca Cola dengan ice yang dingin menambah suasana makan menjadi lebih enak dan terasa',0.00,'products/6YbfguKmsSJEJNVr957QeUdWcRkoyMD12XedakGZ.jpg',1,'2026-09-20 14:18:12','2026-09-20 14:18:12'),
(21,NULL,'Iced Coffee Latte','Kopi Latte dengan harga yang terjangkau dan enak bikin hari mu semangat terus',16000.00,'products/ShxtUuen11fvSmoHNZLrqD0Bs2iVd3tJAk1YOJoa.jpg',1,'2026-09-20 14:19:15','2026-09-20 14:19:15'),
(22,NULL,'Iced Tea','Teh Jasmine dengan rasa yang nikmat dan harus yang segar di barengi dengan es yang memecahkan suasana',6000.00,'products/yn14SVt8pScyAetAZXbHB0Av6S6ZPghgN1HMLhi0.jpg',1,'2026-09-20 14:20:20','2026-09-20 14:20:20'),
(23,NULL,'Burger Keju','Burger Keju, Classic American Style yang pastinya cukup mengenyangkan dengan daging yang empuk',0.00,'products/eTxuFGIAzPe3RBjKp81pNtqVbdIRbPXW2eOGxK5p.jpg',1,'2026-09-20 14:22:56','2026-09-20 14:22:56');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `queue_settings`
--

DROP TABLE IF EXISTS `queue_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `queue_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `current_letter` varchar(255) NOT NULL DEFAULT 'A',
  `current_number` int(11) NOT NULL DEFAULT 1,
  `last_reset_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `queue_settings`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `queue_settings` WRITE;
/*!40000 ALTER TABLE `queue_settings` DISABLE KEYS */;
INSERT INTO `queue_settings` VALUES
(1,'A',4,'2026-09-20','2026-09-18 23:36:11','2026-09-20 12:36:56');
/*!40000 ALTER TABLE `queue_settings` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES
('3gX3CwEuBjGHmNpknEPATJ4jtInjPADB7bL2x5Mz',NULL,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:155.0) Gecko/20100101 Firefox/155.0','eyJfdG9rZW4iOiJySnJvOG5nSDNKNjFsZ3lVbU5kd21zd09rbzVNRlRBSTFaZzRxZGpVIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJsYW5kaW5nIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1789932104),
('h6coUyJZSFwjN77RAWakFw7hPyY75g6vs9JhUuHW',NULL,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:155.0) Gecko/20100101 Firefox/155.0','eyJfdG9rZW4iOiJSOXB1blV6S2hTMXc2TnR3R045WE91VEFlRG5kb1lkY0c3WFNPcVpLIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9wcm9kdWN0cyIsInJvdXRlIjoicHJvZHVjdHMuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1789942944);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-09-21 21:56:07
