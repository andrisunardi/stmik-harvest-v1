-- MySQL dump 10.13  Distrib 8.0.28, for macos12.2 (x86_64)
--
-- Host: localhost    Database: hits
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `access`
--

DROP TABLE IF EXISTS `access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `access` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `access_name_unique` (`name`),
  KEY `access_created_by_foreign` (`created_by`),
  KEY `access_updated_by_foreign` (`updated_by`),
  KEY `access_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `access_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `access_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `access_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access`
--

LOCK TABLES `access` WRITE;
/*!40000 ALTER TABLE `access` DISABLE KEYS */;
INSERT INTO `access` VALUES (1,'Super Admin',1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(2,'Admin',1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL);
/*!40000 ALTER TABLE `access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `access_menu`
--

DROP TABLE IF EXISTS `access_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `access_menu` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `access_id` bigint unsigned DEFAULT NULL,
  `menu_id` bigint unsigned DEFAULT NULL,
  `view` tinyint unsigned DEFAULT '0' COMMENT '1 = Yes, 0 = No',
  `add` tinyint unsigned DEFAULT '0' COMMENT '1 = Yes, 0 = No',
  `edit` tinyint unsigned DEFAULT '0' COMMENT '1 = Yes, 0 = No',
  `delete` tinyint unsigned DEFAULT '0' COMMENT '1 = Yes, 0 = No',
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `access_menu_access_id_foreign` (`access_id`),
  KEY `access_menu_menu_id_foreign` (`menu_id`),
  KEY `access_menu_created_by_foreign` (`created_by`),
  KEY `access_menu_updated_by_foreign` (`updated_by`),
  KEY `access_menu_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `access_menu_access_id_foreign` FOREIGN KEY (`access_id`) REFERENCES `access` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `access_menu_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `access_menu_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `access_menu_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `access_menu_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_menu`
--

LOCK TABLES `access_menu` WRITE;
/*!40000 ALTER TABLE `access_menu` DISABLE KEYS */;
INSERT INTO `access_menu` VALUES (1,2,1,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(2,2,2,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(3,2,3,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(4,2,4,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(5,2,5,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(6,2,6,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(7,2,7,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(8,2,8,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(9,2,9,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(10,2,10,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(11,2,11,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(12,2,12,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(13,2,13,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(14,2,14,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(15,2,15,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(16,2,16,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(17,2,17,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(18,2,18,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(19,2,19,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(20,2,20,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(21,2,21,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(22,2,22,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(23,2,23,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(24,2,24,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(25,2,25,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(26,2,26,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(27,2,27,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(28,2,28,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(29,2,29,1,1,1,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL);
/*!40000 ALTER TABLE `access_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `access_id` bigint unsigned DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_name_unique` (`name`),
  UNIQUE KEY `admin_email_unique` (`email`),
  UNIQUE KEY `admin_username_unique` (`username`),
  UNIQUE KEY `admin_image_unique` (`image`),
  KEY `admin_access_id_foreign` (`access_id`),
  KEY `admin_created_by_foreign` (`created_by`),
  KEY `admin_updated_by_foreign` (`updated_by`),
  KEY `admin_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `admin_access_id_foreign` FOREIGN KEY (`access_id`) REFERENCES `access` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `admin_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `admin_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `admin_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (0,1,'System','system@gmail.com','system','$2y$10$GAJ1kIRhuRAutbCOZW9rv.VjJqhym.u9abp1uezwyN0H.PhD6nEdu','system.png',1,0,0,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(1,1,'Super Admin','superadmin@gmail.com','superadmin','$2y$10$uXEfrJFva0xdc51UexWqZ.PBcy86j7s567eCI66SoG1y7Ss7FbbJ2','super-admin.png',1,0,0,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(2,2,'Admin','admin@gmail.com','admin','$2y$10$PFv7cCEuACUUItCaz8JDFOo3ph1hYXZkRkWu9sZW9NDPzTK84uVPe','admin.png',1,0,0,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(3,2,'Rosita Togatorop','rositatogatorop@gmail.com','rositatogatorop','$2y$10$yrvoTbSc63qK4Fo1q4lr6ebA9BdswnDzgqVMZSrno1g4vBPDapX/C','rosita-togatorop.png',1,0,0,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(4,2,'Shesy Hirawistya Satir','shesyhirawistyasatir@gmail.com','shesyhirawistyasatir','$2y$10$wNXT0QkTtkYzgUgIiWOT5Or1xz0JpR.KF4hYR5CuwF0QpAqYtJTSe','shesy-hirawistya-satir.png',1,0,0,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banner` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_id` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `banner_name_unique` (`name`),
  UNIQUE KEY `banner_name_id_unique` (`name_id`),
  KEY `banner_created_by_foreign` (`created_by`),
  KEY `banner_updated_by_foreign` (`updated_by`),
  KEY `banner_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `banner_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `banner_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `banner_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner`
--

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` VALUES (1,'About','Tentang',NULL,NULL,'about.png',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(2,'Lecturer','Dosen',NULL,NULL,'lecturer.png',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(3,'Gallery','Galeri',NULL,NULL,'gallery.png',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(4,'Faq','Tanya Jawab',NULL,NULL,'faq.png',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(5,'Study Program','Program Studi',NULL,NULL,'study-program.png',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(6,'News & Event','Berita & Kegiatan',NULL,NULL,'news-event.png',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(7,'Repository','Repository',NULL,NULL,'repository.png',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(8,'Magazine','Majalah',NULL,NULL,'magazine.png',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(9,'Contact Us','Kontak Kami',NULL,NULL,'contact-us.png',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL);
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contact_created_by_foreign` (`created_by`),
  KEY `contact_updated_by_foreign` (`updated_by`),
  KEY `contact_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `contact_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `contact_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `contact_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'Andri Sunardi','087871113361','info@andrisunarid.com','DIW.co.id','Test',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL);
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `study_program_id` bigint unsigned DEFAULT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sks` tinyint unsigned DEFAULT NULL,
  `semester` tinyint unsigned DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_study_program_id_foreign` (`study_program_id`),
  KEY `course_created_by_foreign` (`created_by`),
  KEY `course_updated_by_foreign` (`updated_by`),
  KEY `course_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `course_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `course_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `course_study_program_id_foreign` FOREIGN KEY (`study_program_id`) REFERENCES `study_program` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `course_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,1,'PK-G-1001','Kepemimpinan Kristen 1 (Dasar-dasar Kepemimpinan, Building Leadership Within You)',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(2,1,'PK-G-1002','Inggris I (Introduction to General English)',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(3,1,'PK-G-1003','Discipleship',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(4,1,'KK-TP-1001','Teologi Sistematika 1 (Prolegomen - Hamartologi)',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(5,1,'PK-TP-1001','Pengantar PL',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(6,1,'PK-TP-1002','Pengantar PB',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(7,1,'KK-TP-1003','Teologi PB (Christ, Church & Holy Spirit)',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(8,1,'PK-TP-1003','Psikologi Umum',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(9,1,'KK-G-1001','Introduction to Comp. & Information Technology',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(10,1,'PB-G-1001','Leadership Seminar I (IFGF Conf. + Come)',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(11,1,'PK-TP-1001','Sejarah Gereja Umum',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(12,1,'PK-G-2001','Pendidikan Kewarganegaraan',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(13,1,'KK-G-2001','Inggris II (Reading, Listening, Speaking, & Writing)',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(14,1,'PB-T-2001','Pengantar Musik Gereja',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(15,1,'KK-TP-2001','Teologi Sistematika 2 (Kristologi Eskatologi)',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(16,1,'KB-TP-2001','Eksposisi PL 1 (Kejadian - Ulangan)',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(17,1,'KB-TP-2002','Eksposisi PB 1 (Matius - Kisah Para Rasul)',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(18,1,'KK-TP-2002','Hermeneutika 1',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(19,1,'PK-TP-2001','Bahasa Yunani 1',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(20,1,'PB-T-2002','Teologi PL (Covenant Theology, Tabernacle)',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(21,1,'PK-T-2001','Islamologi',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(22,1,'PK-G-2003','Pengetahuan Multikultural',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(23,1,'PK-G-6002','Bahasa Indonesia',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(24,1,'KK-G-3001','Inggris III (English Preaching)',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(25,1,'PK-T-3001','Liturgika',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(26,1,'KB-TP-3002','Hermeneutika 2',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(27,1,'PB-G-3001','Homiletika',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(28,1,'KK-TP-3002','Eksposisi PL 2 (Yosua - 2 Tawarikh)',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(29,1,'KK-TP-3003','Eksposisi PB 2 (Roma - Filemon)',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(30,1,'KB-TP-3001','Bahasa Yunani 2',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(31,1,'PK-PP-3003','Psikologi Perkembangan',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(32,1,'PB-G-3002','Kempemimpinan Kristen 2 (Building Leadership Around You)',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(33,1,'PK-G-3001','Leadership Seminar II (IFGF Conf. + Grow)',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(34,1,'-','Children Ministry (MK Baru)',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(35,1,'KB-G-4001','Leadership Impact (Com. Development)',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(36,1,'BB-T-4001','Church Planting',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(37,1,'KB-T-4002','Manajemen Gereja',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(38,1,'PK-TP-2002','Sejarah Gereja Indonesia',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(39,1,'KB-TP-4002','Eksposisi PL 3 (Ezra - Maleakhi)',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(40,1,'KK-T-4001','Teologi Kontemporer',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(41,1,'KK-T-4002','Bahasa Ibrani I',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(42,1,'KB-TP-4004','Bimbingan Konseling',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(43,1,'BB-TP-4001','Etika Kristen',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(44,1,'PK-TP-4001','Sosiologi',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(45,1,'KB-TP-4001','Academic Writing',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(46,1,'-','Youth Ministry (MK Baru)',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(47,1,'KB-TP-5001','Dogmatika Teologi',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(48,1,'KB-T-5001','Bahasa Ibrani 2',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(49,1,'KB-G-5001','Leadership Seminar III (IFGF Conf. + Serve',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(50,1,'PB-T-5001','Kotbah Ekspositori',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(51,1,'KB-TP-5003','Metodologi penelitian',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(52,1,'KK-T-5001','Paduan Suara',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(53,1,'PB-TP-5001','Creative Teaching',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(54,1,'BB-TP-5001','Entrepreneurship (Pastorpreneurship) (MK Baru)',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(55,1,'BB-G-5001','Praktik Pengalaman Lapangan I (Mission Trip)',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(56,1,'-','Marriage & Family (MK Baru)',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(57,1,'-','Pastoral Ministry (MK Baru)',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(58,1,'KB-T-6001','Media Pembelajaran Berbasis IT',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(59,1,'KB-T-6002','Hermeneutika 3',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(60,1,'PB-TP-6001','Okultisme',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(61,1,'PK-T-6001','Pengantar Filsafat',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(62,1,'KK-TP-6001','Apologetika',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(63,1,'PK-TP-6002','Komunikasi',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(64,1,'KK-TP-6002','Pengantar Statistika',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(65,1,'PK-G-2003','Harvest Theology',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(66,1,'PB-T-7002','Pembinaan Warga Gereja',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(67,1,'KB-TP-5002','Eksposisi PB 3 (Ibrani - Wahyu)',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(68,1,'-','Adult Ministry (MK Baru)',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(69,1,'PB-G-7001','Proposal dan Skripsi',6,7,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(70,1,'BB-G-7001','Praktik Pengalaman Lapangan 2',2,7,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(71,1,'BB-TP-7001','Leadership Seminar IV (IFGF Conf. + Lead)',2,7,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(72,2,'PK-G-1001','Kepemimpinan Kristen 1 (Dasar-dasar Kepemimpinan, Building Leadership Within You)',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(73,2,'PK-G-1002','Inggris I (Indroduction to General English)',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(74,2,'PK-G-1003','Discipleship',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(75,2,'PB-G-1001','Leadership Seminar I (IFGF Conf. + Come)',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(76,2,'KK-TP-1001','Teologi Sistematika 1 (Prolegomena - Hamartologi)',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(77,2,'PK-TP-1001','Pengantar PL',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(78,2,'PK-TP-1002','Pengantar PB',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(79,2,'KK-TP-1003','Teologi PB (Christ, Church, & Holy Spirit)',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(80,2,'KK-G-1001','Introduction to Comp. & Information Technology',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(81,2,'PK-TP-1003','Psikologi Umum',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(82,2,'KB-P-1001','Pembimbing PAK 1',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(83,2,'PK-TP-1001','Sejarah Gereja Umum',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(84,2,'PK-G-2001','Pendidikan Kewarganegaraan',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(85,2,'KK-G-2001','Inggris II (Reading, Listening, Speaking, & Writing)',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(86,2,'PB-T-2001','Pengantar Musik Gereja (Seminar)',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(87,2,'KK-TP-2002','Hermeneutika I (Seminar)',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(88,2,'KB-TP-4001','Academic Writing',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(89,2,'PK-PM-2001','Psikologi Pendidikan',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(90,2,'KB-TP-2001','Eksposisi Kitab Kejadian - Ulangan',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(91,2,'KB-TP-2002','Eksposisi Matius - Kisah Para Rasul',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(92,2,'KK-TP-2001','Teologi Sistematika 2 (Kristologi - Eskatologi)',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(93,2,'PK-TP-2001','Bahasa Yunani 1',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(94,2,'PB-T-2002','Teologi PL (Covenant Theology, Tabernacle)',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(95,2,'PK-G-2003','Pengetahuan Multikultural',2,2,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(96,2,'PB-P-3001','Homiletika 2',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(97,2,'KK-G-3001','Inggris III (English Preaching)',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(98,2,'KB-TP-3002','Hermeneutika II',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(99,2,'KK-TP-3002','Eksposisi Yosua - 2 Tawarikh',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(100,2,'KK-TP-3003','Eksposisi Roma – Filemon',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(101,2,'PK-P-3001','Psikologi Perkembangan',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(102,2,'PB-G-3002','Kepemimpinan Kristen 2 (Building Leadership Around You)',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(103,2,'PK-P-3002','Bahasa Yunani 2',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(104,2,'PK-P-3003','Leadership Seminar II (IFGF Conf. + Grow)',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(105,2,'KB-P-3002','Teori-Teori Belajar',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(106,2,'KB-G-4001','Children Ministry',2,3,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(107,2,'PK-P-4001','Filsafat Pendidikan',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(108,2,'KK-P-4001','Leadership Impact (Com. Development)',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(109,2,'KB-P-4001','Strategi Pembelajaran PAK',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(110,2,'BB-TP-4001','Etika Kristen',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(111,2,'PK-G-4001','Manajemen Pendidikan',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(112,2,'KB-TP-4003','Youth Ministry',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(113,2,'KB-TP-4004','Bimbingan Konseling',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(114,2,'PK-TP-2002','Sejarah Pendidikan Kristen',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(115,2,'KB-TP-4002','Eksposisi Ezra – Maleakhi',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(116,2,'PK-TP-4001','Sosiologi',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(117,2,'KK-T-4002','Bahasa Ibrani 1',2,4,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(118,2,'KB-P-5001','Kurikulum PAK',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(119,2,'PB-G-3001','Bahasa Ibrani 2',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(120,2,'KB-TP-5003','Metodologi Penelitian',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(121,2,'PB-TP-5001','Creative Teaching',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(122,2,'KB-TP-5001','Paduan Suara',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(123,2,'KB-TP-5002','Leadership Seminar III (IFGF Conf. + Serve)',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(124,2,'BB-G-5001','Praktik Pengalaman Lapangan 1 (Mission Trip)',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(125,2,'PB-TP-5003','Digital Learning',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(126,2,'-','Marriage & Family (MK Baru)',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(127,2,'-','Edu-Preneurship (MK Baru)',2,5,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(128,2,'KK-TP-6001','Apologetika',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(129,2,'PB-P-6001','Adult Ministry',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(130,2,'KB-P-6001','Pengantar Statistika',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(131,2,'KK-TP-6002','Komunikasi',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(132,2,'PB-TP-6001','Evaluasi PAK',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(133,2,'PB-TP-6002','Media Pembelajaran Berbasis IT',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(134,2,'KB-P-6002','Harvest Theology',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(135,2,'KB-P-6003','Bahasa Indonesia',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(136,2,'KB-G-5001','Eksposisi Ibrani-Wahyu',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(137,2,'PB-TP-5002','Teknologi Pendidikan',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(138,2,'BB-G-7001','Micro Teaching',2,6,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(139,2,'PB-G-7001','Proposal dan Skripsi',6,7,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(140,2,'BB-TP-7001','Leadership Seminar IV (IFGF Conf. + Lead)',2,7,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(141,2,'PK-G-2002','Praktik Pengalaman Lapangan 2 (Praktek Mengajar)',2,7,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(142,3,'PK-M-1001','Teori Musik I',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(143,3,'KK-M-1001','Paduan Suara',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(144,3,'KK-M-1002','Solfegio I',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(145,3,'KB-M-1001','Praktek Individual Mayor I',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(146,3,'PB-G-1001','Leadership Seminar I (IFGF Conf. + Come)',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(147,3,'PK-G-1001','Kepemimpinan Kristen 1 (Dasar-dasar Kepemimpinan, Building Leadership Within You)',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(148,3,'PK-G-1002','Inggris I (Introduction to General English)',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(149,3,'KK-G-1001','Introduction to Comp. & Information Technology',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(150,3,'PK-G-1003','Pengembangan Karakter',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(151,3,'PK-M-1002','Pengantar PL',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(152,3,'PK-M-1003','Pengantar PB',2,1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(153,3,'KK-TP-1001','Teologi Sistematika 1 (Prolegomena - Hamartologi)',2,1,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(154,3,'PK-M-2005 ','Teori Musik II',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(155,3,'PK-M-2004','Pengantar Hymnologi',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(156,3,'KK-M-2002','Solfegio II',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(157,3,'KB-M-2001','Praktek Individual Mayor II',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(158,3,'BB-TP-4001','Etika Kristen',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(159,3,'PB-T-2001','Pengantar Musik Gereja',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(160,3,'PK-G-2001','Pendidikan Kewarganegaraan',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(161,3,'KK-G-2001','Inggris II (Reading & Listening, Speaking, & Writing)',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(162,3,'KK-M-2001','Teologi Sistematika 2 (Kristologi - Eskatologi)',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(163,3,'KB-TP-4001','Academic Writing',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(164,3,'KK-M-4001','Psikologi Musik',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(165,3,'KB-M-3001','Harmoni I',2,3,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(166,3,'PB-M-3001','Praktek Individual Mayor III',2,3,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(167,3,'KB-M-3002','Direksi I',2,3,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(168,3,'KB-M-3003 / KB-M-300','Piano Wajib I/ Minor Wajib 1',2,3,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(169,3,'PK-M-3001','Sejarah Musik I',2,3,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(170,3,'PB-G-3002','Kepemimpinan Kristen 2 (Building Leadership Around You)',2,3,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(171,3,'KB-M-3004','Ansamble I',2,3,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(172,3,'PB-M-1001','Ibadah dan Liturgika',2,3,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(173,3,'KK-M-3001','Hermeneutika',2,3,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(174,3,'KB-M-3005','Primavista Vocal 1',2,3,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(175,3,'PK-G-3001','Leadership Seminar II (IFGF Conf. + Grow)',2,3,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(176,3,'KB-M-4001/ KB-M-4006','Piano Wajib II / Minor Wajib 2',2,4,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(177,3,'KB-M-4002','Harmoni II',2,4,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(178,3,'PB-M-4001','Primavista Vocal 2',2,4,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(179,3,'PB-M-4002','Praktek Individual Mayor IV',2,4,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(180,3,'KB-M-4003','Aransemen Musik Anak',2,4,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(181,3,'PK-M-4001','Sejarah Musik II',2,4,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(182,3,'KB-M-4004','Direksi II',2,4,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(183,3,'KB-M-4005','Ansamble II',2,4,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(184,3,'KK-M-4002','Manajemen Seni Pertunjukan',2,4,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(185,3,'KB-M-5003','Kontrapung',2,5,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(186,3,'PB-M-5002','Harmoni Manual I',2,5,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(187,3,'KB-M-5001','Metode Musik Anak',2,5,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(188,3,'KB-M-5002','Aransemen I',2,5,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(189,3,'KK-M-5001','Ilmu Bentuk dan Analisa I',2,5,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(190,3,'PB-G-3001','Homiletika',2,5,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(191,3,'KK-M-5002','Metode Penelitian Musik',2,5,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(192,3,'KB-M-3006','Kritik Musik',2,5,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(193,3,'BB-G-5001','Praktik Pengalaman Lapangan 1',2,5,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(194,3,'KB-G-5001','Leadership Seminar III (IFGF Conf. + Serve)',2,5,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(195,3,'-','Marriage & Family (MK Baru)',2,5,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(196,3,'-','Praktik Pujian dan Penyembahan (MK Baru)',2,5,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(197,3,'KB-M-6001','Harmoni Manual II',2,6,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(198,3,'KB-M-6002','Ilmu Bentuk dan Analisa II',2,6,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(199,3,'KB-M-6003','Aransemen II',2,6,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(200,3,'KK-M-6001','Etnomusikologi',2,6,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(201,3,'PK-M-6001','Sosiologi Musik',2,6,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(202,3,'PB-M-6001','Praktek Instrumen Etnik Nusantara',2,6,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(203,3,'KB-M-6004','Komposisi Dasar',2,6,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(204,3,'PK-G-2002','Bahasa Indonesia',2,6,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(205,3,'PK-G-2003','Harvest Theology',2,6,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(206,3,'KK-K-1002','Digital Music Production 1',2,6,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(207,3,'PB-M-2001','Estetika Musik Gereja',2,6,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(208,3,'PB-M-7001','Komposisi Lanjutan',2,7,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(209,3,'PB-G-7001','Skripsi dan Resital',6,7,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(210,3,'BB-G-7001','Praktik Pengalaman Lapangan 2',2,7,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(211,3,'KK-K-1003','Digital Music Production 2',2,7,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(212,3,'BB-TP-7001','Leadership Seminar IV (IFGF Conf. + Lead)',2,7,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(213,3,'-','Music-Preneurship (MK Baru)',2,7,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(214,4,'MKK 5001','Teologi Kontemporer',2,1,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(215,4,'MKB 5003','Dinamika Perubahan',2,1,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(216,4,'MPK 5006','Teologi kepemimpinan Kristen',2,1,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(217,4,'MBB 6002','The Church to the Modern Era (Smart Church)',2,1,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(218,4,'MKK 6004','Teknik Penulisan Ilmiah Untuk Jurnal',2,1,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(219,4,'MKK 6005','Research Metodology and data Analysis',2,1,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(220,4,'MKK 5002','Sistematika Teologi',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(221,4,'MPB 5004','Harvest Theology',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(222,4,'MPB 5005','Spirit Entrepreneural Leadership',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(223,4,'MPK 5007','Post Modern Transformational Leadership',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(224,4,'MKB 5008','Analisis Masalah-masalah Manajemen & Adm Gereja Kontemporer',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(225,4,'MPB 6001','Pastoral Konseling',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(226,4,'MBB 6003','Leadership Multiplication in the Digital Era',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(227,4,'MBB 6006','Leading Community Transformational',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(228,4,'MKB 6007','Proposal Tesis (Bab I - III )',2,3,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(229,4,'MKB 6008','Sidang Tesis (Bab I - V )',6,3,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(230,4,'MKK 6523','Bahasa Ibrani',2,0,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(231,4,'MKK 6533','Bahasa Yunani',2,0,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(232,4,'MKB 6612','Pengantar Perjanjian Lama',2,0,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(233,4,'MPB 6753','Pengantar Perjanjian Baru',2,0,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(234,4,'MKB 6623','Eksegesis Alkitab',2,0,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(235,4,'MKK 4001','Homiletika',2,0,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(236,5,'MKK 7001','Colloquium Theologicum',2,1,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(237,5,'MBB 7002','The Church to the Modern Era (Smart Church)',2,1,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(238,5,'MKK 7003','Research Metodology and data Analysis',2,1,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(239,5,'MKB 7004','Public Policies and Law',2,1,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(240,5,'MBB 7005','Engaging Global Reality',2,1,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(241,5,'MKK 7006','Colloquium Didacticum',2,1,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(242,5,'MKK 7007','Academic Writing for Journal',2,1,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(243,5,'MPB 8001','Harvest Theology',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(244,5,'MKK 8002','Colloquium Biblicum',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(245,5,'MBB 8003','Developing NGO Globally',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(246,5,'MPK 8004','Post Modern Transformational Leadership',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(247,5,'MPB 8005','Spirit Entrepreneurial Leadership',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(248,5,'MPB 8006','Leadership Multiplication in the Digital Era',2,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(249,5,'MKB 8006','Dissertation Proposal (Chapt .I )',2,3,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(250,5,'MKB 8007','Dissertation Proposal Seminar (Chapt .I-III )',5,3,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(251,5,'MKB 8008','Final Dissertation Exam',9,3,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(252,5,'MKK 4001','Hebrew',2,0,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(253,5,'MKK 4002','Greek',2,0,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(254,5,'MPK 4003','Intro to OT',2,0,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(255,5,'MPK 4004','Intro to NT',2,0,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(256,5,'MKB 4005','Biblical Exegesis',2,0,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(257,5,'MPB 4006','Expository Preaching',2,0,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(258,5,'MKK 4007','Systematic Theology',2,0,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_lecturer`
--

DROP TABLE IF EXISTS `course_lecturer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_lecturer` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course_id` bigint unsigned DEFAULT NULL,
  `lecturer_id` bigint unsigned DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_lecturer_course_id_foreign` (`course_id`),
  KEY `course_lecturer_lecturer_id_foreign` (`lecturer_id`),
  KEY `course_lecturer_created_by_foreign` (`created_by`),
  KEY `course_lecturer_updated_by_foreign` (`updated_by`),
  KEY `course_lecturer_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `course_lecturer_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `course_lecturer_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `course_lecturer_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `course_lecturer_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `course_lecturer_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_lecturer`
--

LOCK TABLES `course_lecturer` WRITE;
/*!40000 ALTER TABLE `course_lecturer` DISABLE KEYS */;
INSERT INTO `course_lecturer` VALUES (1,247,1,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(2,245,1,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(3,217,1,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(4,237,1,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(5,65,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(6,134,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(7,205,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(8,221,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(9,243,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(10,239,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(11,226,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(12,248,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(13,257,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(14,236,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(15,244,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(16,256,2,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(17,253,9,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(18,252,9,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(19,219,11,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(20,238,11,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(21,242,14,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(22,241,8,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(23,223,12,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(24,246,12,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(25,240,12,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL);
/*!40000 ALTER TABLE `course_lecturer` ENABLE KEYS */;
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
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `faq_category_id` bigint unsigned DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_id` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `faq_name_unique` (`name`),
  UNIQUE KEY `faq_name_id_unique` (`name_id`),
  KEY `faq_faq_category_id_foreign` (`faq_category_id`),
  KEY `faq_created_by_foreign` (`created_by`),
  KEY `faq_updated_by_foreign` (`updated_by`),
  KEY `faq_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `faq_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `faq_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `faq_faq_category_id_foreign` FOREIGN KEY (`faq_category_id`) REFERENCES `faq_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `faq_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
INSERT INTO `faq` VALUES (1,1,'How do I register to study at HITS?','Bagaimana cara mendaftar kuliah di HITS?','- Purchase the Registration Form<br>- Collecting Documents such as :<br>- (Certificates, Transcripts, Ktp, Kk, Baptism Letters, Proof of Health, 3x4 and 4x6 sized passport photos.<br>- TOEFL Certificate (For S2 & S3 Registrants)<br>- Doing Written Test & Interview<br>- Announcement of Entrance Test Passing Results<br>- Make Tuition Payments.','- Membeli Formulir Pendaftaran<br>- Mengumpulkan Dokumen Kelengkapan Seperti :<br>- (Ijasah, Transkrip Nilai, Ktp, Kk, Surat Baptis, Surat Bukti Kesehatan, Pas Foto Ukuran 3x4 Dan 4x6.<br>- Sertifikat Toefl (Bagi Pendaftar S2 & S3)<br>- Melakukan Test Tertulis & Wawancara<br>- Pengumuman Hasil Kelulusan Ujian Test Masuk<br>- Melakukan Pembayaran Uang Kuliah.',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(2,2,'What are the majors at HITS?','Apa saja jurusan yang ada di HITS?','- Bachelor degree :<br>Theology (S.Th) , Christian Religion Teacher Education (S.Pd) , and Church Music (S.Sn)<br><br>- Bachelor of Theology in Christian Leadership<br><br>- Bachelor of Doctor of Theology in Leadership and Transformational<br><br>*Classes offered are Morning Class (Regular) & Evening Class (Executive/Employee)','- Sarjana S1 :<br>Teologi (S.Th) , Pendidikan Guru Agama Kristen (S.Pd) , dan Musik Gerejawi (S.Sn)<br><br>- Sarjana Master of Theology in Christian Leadership<br><br>- Sarjana S3 Doctor of Theology in Leadership and Transformational<br><br>*Kelas yang ditawarkan ada Kelas Pagi (Reguler) & Kelas Malam (Eksekutif/Karyawan)',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(3,3,'Why Should You Choose to Study at HITS?','Mengapa harus memilih kuliah di HITS?','1) International Curriculum<br>- Partnering with Christian Universities overseas to create the most advanced international curriculum.<br><br>2) Professional Lecturers<br>- Our lecturer are highly professional and top leaders in their ministry, churches, business, etc.<br><br>3) Living Witness<br>- Our Alumni has becoming top Christian Mucisians, Leaders, or Pastors in their Church.','1) International Curriculum<br>- Partnering with Christian Universities overseas to create the most advanced international curriculum.<br><br>2) Professional Lecturers<br>- Our lecturer are highly professional and top leaders in their ministry, churches, business, etc.<br><br>3) Living Witness<br>- Our Alumni has becoming top Christian Mucisians, Leaders, or Pastors in their Church.',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(4,4,'What are the Career Prospects for Bachelor of Theology (S.Th)?','Apa sih Prospek Karir Sarjana Teologi (S.Th)?','- Priest<br>\n        - Educators serving in various Denominations, Foundations at home and abroad.','- Pendeta<br>- Pendidik yang melayani di berbagai Denominasi, Yayasan dalam dan luar negeri.',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(5,4,'What are the Career Prospects of a Bachelor of Christian Religious Education (S.Pd)?','Apa sih Prospek Karir Sarjana Pendidikan Agama Kristen (S.Pd)?','- Christian Religious Education teacher at school<br>- Counselor/Teacher BP<br>- Priest<br>- Educator in church/community','- Guru Pendidikan Agama Kristen di sekolah<br>- Konselor/Guru BP<br>- Pendeta<br>- Pendidik di gereja/komunitas',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(6,4,'What are the Career Prospects of a Bachelor in Ecclesiastical Music (S.Sn)?','Apa sih Prospek Karir Sarjana Musik Gerejawi (S.Sn)?','- Professional Instrument<br>- Art Director<br>- Church Music Director<br>- Music Composer<br>- Music Arranger','- Instrumen Professional<br>- Art Director<br>- Church Music Director<br>- Music Composer<br>- Music Arranger',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL);
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_category`
--

DROP TABLE IF EXISTS `faq_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_id` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `faq_category_name_unique` (`name`),
  UNIQUE KEY `faq_category_name_id_unique` (`name_id`),
  KEY `faq_category_created_by_foreign` (`created_by`),
  KEY `faq_category_updated_by_foreign` (`updated_by`),
  KEY `faq_category_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `faq_category_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `faq_category_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `faq_category_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_category`
--

LOCK TABLES `faq_category` WRITE;
/*!40000 ALTER TABLE `faq_category` DISABLE KEYS */;
INSERT INTO `faq_category` VALUES (1,'Registration','Pendaftaran','Description Registration','Deskripsi Pendaftaran',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(2,'Study Program','Program Studi','Description Study Program','Deskripsi Program Studi',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(3,'About HITS','Tentang HITS','Description About HITS','Deskripsi Mata Tentang HITS',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(4,'Career','Karir','Description Career','Deskripsi Karir',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL);
/*!40000 ALTER TABLE `faq_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category` tinyint unsigned DEFAULT NULL COMMENT '1 = Image, 2 = Video',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_id` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gallery_name_unique` (`name`),
  UNIQUE KEY `gallery_name_id_unique` (`name_id`),
  KEY `gallery_created_by_foreign` (`created_by`),
  KEY `gallery_updated_by_foreign` (`updated_by`),
  KEY `gallery_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `gallery_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gallery_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gallery_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (1,1,'1D3A8104','1D3A8104','Description Image','Deskripsi Gambar','1D3A8104.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(2,1,'1D3A8100','1D3A8100','Description Image','Deskripsi Gambar','1D3A8100.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(3,1,'1D3A8101','1D3A8101','Description Image','Deskripsi Gambar','1D3A8101.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(4,1,'1D3A8102','1D3A8102','Description Image','Deskripsi Gambar','1D3A8102.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(5,1,'1D3A8103','1D3A8103','Description Image','Deskripsi Gambar','1D3A8103.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(6,1,'1D3A8105','1D3A8105','Description Image','Deskripsi Gambar','1D3A8105.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(7,1,'1D3A8106','1D3A8106','Description Image','Deskripsi Gambar','1D3A8106.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(8,1,'1D3A8107','1D3A8107','Description Image','Deskripsi Gambar','1D3A8107.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(9,1,'1D3A8166','1D3A8166','Description Image','Deskripsi Gambar','1D3A8166.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(10,1,'1D3A8167','1D3A8167','Description Image','Deskripsi Gambar','1D3A8167.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(11,1,'1D3A8168','1D3A8168','Description Image','Deskripsi Gambar','1D3A8168.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(12,1,'1D3A8169','1D3A8169','Description Image','Deskripsi Gambar','1D3A8169.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(13,1,'1D3A8170','1D3A8170','Description Image','Deskripsi Gambar','1D3A8170.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(14,1,'1D3A8171','1D3A8171','Description Image','Deskripsi Gambar','1D3A8171.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(15,1,'1D3A8172','1D3A8172','Description Image','Deskripsi Gambar','1D3A8172.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(16,1,'1D3A8173','1D3A8173','Description Image','Deskripsi Gambar','1D3A8173.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(17,1,'381e2502-4a37-4a4c-ad15-3e9b381f1b34','381e2502-4a37-4a4c-ad15-3e9b381f1b34','Description Image','Deskripsi Gambar','381e2502-4a37-4a4c-ad15-3e9b381f1b34.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(18,1,'20150515_093849','20150515_093849','Description Image','Deskripsi Gambar','20150515_093849.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(19,1,'20150515_094032','20150515_094032','Description Image','Deskripsi Gambar','20150515_094032.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(20,1,'20150515_095514','20150515_095514','Description Image','Deskripsi Gambar','20150515_095514.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(21,1,'20150515_095714','20150515_095714','Description Image','Deskripsi Gambar','20150515_095714.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(22,1,'20150515_095753','20150515_095753','Description Image','Deskripsi Gambar','20150515_095753.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(23,1,'20150515_095824','20150515_095824','Description Image','Deskripsi Gambar','20150515_095824.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(24,1,'20150515_095924','20150515_095924','Description Image','Deskripsi Gambar','20150515_095924.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(25,1,'20150515_100009','20150515_100009','Description Image','Deskripsi Gambar','20150515_100009.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(26,1,'Drop Point','Drop Point','Description Image','Deskripsi Gambar','Drop Point.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(27,1,'DSC_0368','DSC_0368','Description Image','Deskripsi Gambar','DSC_0368.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(28,1,'Globe','Globe','Description Image','Deskripsi Gambar','Globe.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(29,1,'hits photo','hits photo','Description Image','Deskripsi Gambar','hits photo.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(30,1,'IMG_4107','IMG_4107','Description Image','Deskripsi Gambar','IMG_4107.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(31,1,'IMG_4108','IMG_4108','Description Image','Deskripsi Gambar','IMG_4108.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(32,1,'IMG_4111','IMG_4111','Description Image','Deskripsi Gambar','IMG_4111.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(33,1,'IMG_4112','IMG_4112','Description Image','Deskripsi Gambar','IMG_4112.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(34,1,'IMG_4113','IMG_4113','Description Image','Deskripsi Gambar','IMG_4113.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(35,1,'IMG_4114','IMG_4114','Description Image','Deskripsi Gambar','IMG_4114.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(36,1,'IMG_4115','IMG_4115','Description Image','Deskripsi Gambar','IMG_4115.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(37,1,'IMG_4118','IMG_4118','Description Image','Deskripsi Gambar','IMG_4118.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(38,1,'IMG_4123','IMG_4123','Description Image','Deskripsi Gambar','IMG_4123.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(39,1,'IMG_4124','IMG_4124','Description Image','Deskripsi Gambar','IMG_4124.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(40,1,'IMG_4125','IMG_4125','Description Image','Deskripsi Gambar','IMG_4125.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(41,1,'IMG_4126','IMG_4126','Description Image','Deskripsi Gambar','IMG_4126.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(42,1,'IMG_20210420_214654','IMG_20210420_214654','Description Image','Deskripsi Gambar','IMG_20210420_214654.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(43,1,'IMG_20210420_214712','IMG_20210420_214712','Description Image','Deskripsi Gambar','IMG_20210420_214712.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(44,1,'IMG_20210420_214829','IMG_20210420_214829','Description Image','Deskripsi Gambar','IMG_20210420_214829.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(45,1,'IMG_20210420_214942','IMG_20210420_214942','Description Image','Deskripsi Gambar','IMG_20210420_214942.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(46,1,'IMG_20210420_214958','IMG_20210420_214958','Description Image','Deskripsi Gambar','IMG_20210420_214958.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(47,1,'IMG_20210420_215015','IMG_20210420_215015','Description Image','Deskripsi Gambar','IMG_20210420_215015.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(48,1,'IMG_20210420_215123','IMG_20210420_215123','Description Image','Deskripsi Gambar','IMG_20210420_215123.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(49,1,'IMG_20210420_215136','IMG_20210420_215136','Description Image','Deskripsi Gambar','IMG_20210420_215136.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(50,1,'IMG_20210420_215435','IMG_20210420_215435','Description Image','Deskripsi Gambar','IMG_20210420_215435.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(51,1,'IMG_20210420_215529','IMG_20210420_215529','Description Image','Deskripsi Gambar','IMG_20210420_215529.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(52,1,'IMG_20210420_215602','IMG_20210420_215602','Description Image','Deskripsi Gambar','IMG_20210420_215602.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(53,1,'IMG_20210420_215641','IMG_20210420_215641','Description Image','Deskripsi Gambar','IMG_20210420_215641.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(54,1,'IMG_20210420_215658','IMG_20210420_215658','Description Image','Deskripsi Gambar','IMG_20210420_215658.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(55,1,'IMG_20210420_215716','IMG_20210420_215716','Description Image','Deskripsi Gambar','IMG_20210420_215716.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(56,1,'IMG_20210420_215736','IMG_20210420_215736','Description Image','Deskripsi Gambar','IMG_20210420_215736.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(57,1,'IMG_20210420_215754','IMG_20210420_215754','Description Image','Deskripsi Gambar','IMG_20210420_215754.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(58,1,'IMG_20210420_215827','IMG_20210420_215827','Description Image','Deskripsi Gambar','IMG_20210420_215827.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(59,1,'IMG_20210420_215845','IMG_20210420_215845','Description Image','Deskripsi Gambar','IMG_20210420_215845.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(60,1,'IMG-8370','IMG-8370','Description Image','Deskripsi Gambar','IMG-8370.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(61,1,'IMG-8371','IMG-8371','Description Image','Deskripsi Gambar','IMG-8371.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(62,1,'IMG-8372','IMG-8372','Description Image','Deskripsi Gambar','IMG-8372.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(63,1,'IMG-8378','IMG-8378','Description Image','Deskripsi Gambar','IMG-8378.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(64,1,'IMG-8379','IMG-8379','Description Image','Deskripsi Gambar','IMG-8379.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(65,1,'IMG-8381','IMG-8381','Description Image','Deskripsi Gambar','IMG-8381.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(66,1,'IMG-8382','IMG-8382','Description Image','Deskripsi Gambar','IMG-8382.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(67,1,'IMG-8384','IMG-8384','Description Image','Deskripsi Gambar','IMG-8384.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(68,1,'Lobby','Lobby','Description Image','Deskripsi Gambar','Lobby.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(69,1,'lorong perpustakaan','lorong perpustakaan','Description Image','Deskripsi Gambar','lorong perpustakaan.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(70,1,'R85_9416a','R85_9416a','Description Image','Deskripsi Gambar','R85_9416a.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(71,1,'rio','rio','Description Image','Deskripsi Gambar','rio.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(72,1,'Ruang Baca (untuk our profile)','Ruang Baca (untuk our profile)','Description Image','Deskripsi Gambar','Ruang Baca (untuk our profile).png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(73,1,'students HITS','students HITS','Description Image','Deskripsi Gambar','students HITS.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(74,1,'vlcsnap-2014-11-19-16h46m57s124','vlcsnap-2014-11-19-16h46m57s124','Description Image','Deskripsi Gambar','vlcsnap-2014-11-19-16h46m57s124.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(75,1,'Waiting Room','Waiting Room','Description Image','Deskripsi Gambar','Waiting Room.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(76,1,'WhatsApp Image 2021-09-10 at 12.13.05 AM (1)','WhatsApp Image 2021-09-10 at 12.13.05 AM (1)','Description Image','Deskripsi Gambar','WhatsApp Image 2021-09-10 at 12.13.05 AM (1).png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(77,1,'WhatsApp Image 2021-09-10 at 12.13.05 AM (2)','WhatsApp Image 2021-09-10 at 12.13.05 AM (2)','Description Image','Deskripsi Gambar','WhatsApp Image 2021-09-10 at 12.13.05 AM (2).png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(78,1,'WhatsApp Image 2021-09-10 at 12.13.05 AM (3)','WhatsApp Image 2021-09-10 at 12.13.05 AM (3)','Description Image','Deskripsi Gambar','WhatsApp Image 2021-09-10 at 12.13.05 AM (3).png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(79,1,'WhatsApp Image 2021-09-10 at 12.13.05 AM','WhatsApp Image 2021-09-10 at 12.13.05 AM','Description Image','Deskripsi Gambar','WhatsApp Image 2021-09-10 at 12.13.05 AM.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(80,1,'WhatsApp Image 2021-11-02 at 10.22.20 AM','WhatsApp Image 2021-11-02 at 10.22.20 AM','Description Image','Deskripsi Gambar','WhatsApp Image 2021-11-02 at 10.22.20 AM.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(81,1,'WhatsApp Image 2021-11-09 at 2.58.36 PM','WhatsApp Image 2021-11-09 at 2.58.36 PM','Description Image','Deskripsi Gambar','WhatsApp Image 2021-11-09 at 2.58.36 PM.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(82,1,'WhatsApp Image 2021-11-09 at 2.58.37 PM (1)','WhatsApp Image 2021-11-09 at 2.58.37 PM (1)','Description Image','Deskripsi Gambar','WhatsApp Image 2021-11-09 at 2.58.37 PM (1).png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(83,1,'WhatsApp Image 2021-11-09 at 2.58.37 PM (2)','WhatsApp Image 2021-11-09 at 2.58.37 PM (2)','Description Image','Deskripsi Gambar','WhatsApp Image 2021-11-09 at 2.58.37 PM (2).png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(84,1,'WhatsApp Image 2021-11-11 at 4.08.37 PM (1)','WhatsApp Image 2021-11-11 at 4.08.37 PM (1)','Description Image','Deskripsi Gambar','WhatsApp Image 2021-11-11 at 4.08.37 PM (1).png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(85,1,'WhatsApp Image 2021-11-11 at 4.08.37 PM','WhatsApp Image 2021-11-11 at 4.08.37 PM','Description Image','Deskripsi Gambar','WhatsApp Image 2021-11-11 at 4.08.37 PM.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(86,1,'WhatsApp Image 2021-11-12 at 4.12.35 PM','WhatsApp Image 2021-11-12 at 4.12.35 PM','Description Image','Deskripsi Gambar','WhatsApp Image 2021-11-12 at 4.12.35 PM.png',NULL,NULL,1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL);
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecturer`
--

DROP TABLE IF EXISTS `lecturer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lecturer` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `job` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scholar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lecturer_code_unique` (`code`),
  UNIQUE KEY `lecturer_name_unique` (`name`),
  UNIQUE KEY `lecturer_slug_unique` (`slug`),
  KEY `lecturer_created_by_foreign` (`created_by`),
  KEY `lecturer_updated_by_foreign` (`updated_by`),
  KEY `lecturer_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `lecturer_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lecturer_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lecturer_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecturer`
--

LOCK TABLES `lecturer` WRITE;
/*!40000 ALTER TABLE `lecturer` DISABLE KEYS */;
INSERT INTO `lecturer` VALUES (1,NULL,'Dr. Jimmy Boaz Oentoro','Jimmy Boaz Oentoro is the Founder and the Senior Pastor of International Full Gospel Fellowship (IFGF), whom has been serving in more than 30 different countries in the world. He is also the Founder and Chairman of World Harvest, a non profit mission organization that reaches through community ministry, education, and media. Currently the Chairman of Harvest International Theological Seminary, he is a dynamic speaker, who preached in front of many leaders in Europe, America, Australia, Asia and many more cities in Indonesia. His heart longs to see many leaders maximize the potential inside them.','Chairman',NULL,NULL,NULL,NULL,'https://www.instagram.com/jimmyoentoro',NULL,NULL,'dr-jimmy-boaz-oentoro.png','dr-jimmy-boaz-oentoro',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(2,NULL,'Dr. Frans H.M Silalahi, M.H.',NULL,'Director of Post Graduate Program',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'dr-frans-hm-silalahi-mh.png','dr-frans-hm-silalahi-mh',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(3,NULL,'Dr. Daniel E. Runtuwene, M.SC.','- S1 : Bachelor Of Science, Oklahoma State University Stillwater. 1990 (Industrial Engineering & Management)<br>\n        - S2 : Magister Of Science, Oklahoma State University, Stillwater. 1992 (Industrial Engineering & Management)<br>\n        - S3 : Doctor Of Theology, Stt International Harvest Tangerang. 2018','Vice Chairman 1',NULL,NULL,NULL,NULL,'https://www.instagram.com/danielruntuwene',NULL,NULL,'dr-daniel-e-runtuwene-msc.png','dr-daniel-e-runtuwene-msc',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(4,NULL,'Valeria Sonata, S.Si., M.M., M.Th.',NULL,'Vice Chariman 2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'valeria-sonata-ssi-mm-mth.png','valeria-sonata-ssi-mm-mth',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(5,NULL,'Dr. Linda Arih Ersada','S1<br>DRA IN ENGLISH LITERATURE, UNIVERSITAS SUMATERA UTARA, 1988<br>S2<br>M.TH IN CHRISTIAN LEADERSHIP, HARVEST INTERNATIONAL THEOLOGICAL SEMINARY, 2007<br>S3<br>D.TH IN THEOLOGY, HARVEST INTERNATIONAL THEOLOGICAL SEMINARY, 2015','Head of Master Degree Program',NULL,NULL,NULL,NULL,'https://www.instagram.com/lindasitepu',NULL,NULL,'dr-linda-arih-ersada.png','dr-linda-arih-ersada',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(6,NULL,'Hengki Bonifacius Tompo, S.Sn, M.Si','Mengajar Ilmu Harmoni dan Solfegio serta Sosiologi Musik disamping juga mengajar praktek musik untuk Guitar dan Piano.S1<br>S.SN IN MUSIC, INSTITUT SENI INDONESIA, YOGYAKARTA, 1994<br>S2<br>M.SI IN SOCIOLOGY, UNIVERSITAS INDONESIA, 2008.','Head of Church Music Program',NULL,NULL,NULL,NULL,'https://www.instagram.com/hengkyto',NULL,NULL,'hengki-bonifacius-tompo-ssn-msi.png','hengki-bonifacius-tompo-ssn-msi',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(7,NULL,'Herman Poroe, M.Th','Ahli dalam Pendidikan Agama Kristen, Teologi Perjanjian Baru, sebagai fasilitator dan pembicara dalam seminar dan workshop Lead Like Jesus, pengkhotbah di berbagai denominnasi gereja, Trainer Church Planting di berbagai denominnasi gereja, Gembala Sidang GPdI Efata Moderen Land, Tangerang, dan pengajar di berbagai STT di Indonesia.<br><br>S1<br>S.TH IN THEOLOGY, SEKOLAH TINGGI TEOLOGI PARAKLETOS, 2001<br>S2<br>M.TH IN THEOLOGY, SEKOLAH TINGGI TEOLOGI INJILI INDONESIA, 2007.\n        ','Head of Christian Education Program',NULL,NULL,NULL,NULL,'https://www.instagram.com/hermanporoe01',NULL,NULL,'herman-poroe-mth.png','herman-poroe-mth',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(8,NULL,'Dr. Cicilia Gunawan',NULL,'Lecturer',NULL,NULL,NULL,NULL,'https://www.instagram.com/ciciliag',NULL,NULL,'dr-cicilia-gunawan.png','dr-cicilia-gunawan',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(9,NULL,'Dr. Arnold Tindas','Pakar bidang Teologi Sistematika; Penulis buku teologi sistematika best seller “Inerrancy: Ketaksalahan Alitab”. Pengalaman dalam Kepemimpinan, Pendidikan, Pelayanan dan Pembicara Nasional dan Internasional. Pengalaman Kepemimpinan sebagai Ketua Sinode Gereja 16 tahun; Pengurus Nasional Persekutuan Gereja-gereja dan Lembaga-lembaga Injili di Indonesia (PGLII); Pengrurus Nasional Persekutuan Sekolah Tinggi Teologi Injili di Indonesia (PASTI) ; Pengurus Badan Konsorsium Teologi dan Tim Penjaminan Mutu PTT/AK Kementerian Agama RI; Pimpinan STT dan Fakultas Agama di Manado, Yogyakarta dan Jakarta. Pengalaman Pelayanan sebagai Gembala Jemaat Lokal 20 tahun; pengkhotbah di berbagai Gereja seluruh daerah di Indonesia dan beberapa negara, seperti Australia dan Malaysia. Pembicara nasional Simposium Teologi di PGLII dan PASTI; bedah buku di Indonesia dan Korea; Presentasi penelitian di Konferensi ilmiah Malaysia dan Singapura. Pembicara Seminar Teologi Sistematika, Teologi Kontemporer dan Teologi Kepemimpinan Kristen.<br><br>S1<br>S.TH IN THEOLOGY, SEKOLAH TINGGI ALKITAB TIRANUS BANDUNG, 1986<br>S2<br>M.DIV IN THEOLOGY, SEKOLAH TINGGI TEOLOGI INJILI INDONESIA, 1988M.TH IN THEOLOGY, SEKOLAH TINGGI TEOLOGI INJILI INDONESIA, 2009<br>S3<br>D.MIN IN THEOLOGY, SEKOLAH TINGGI TEOLOGI INJILI INDONESIA, 2000D.TH IN THEOLOGY, SEKOLAH TEOLOGI BAPTIS INDONESIA, 2006<br>','Lecturer',NULL,NULL,NULL,NULL,'https://www.instagram.com/arnoldtindas',NULL,NULL,'dr-arnold-tindas.png','dr-arnold-tindas',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(10,NULL,'Dr. Esther Idayanti BSC, M.A.',NULL,'Lecturer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'dr-esther-idayanti-bsc-ma.png','dr-esther-idayanti-bsc-ma',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(11,NULL,'Prof.Ir. Vicky VJ Panelewen, M.Sc., Ph.D.','Education:<br>S1<br>S.H BACHELOR OF LAW, UNIVERSITAS INDONESIA, 1989<br>S2<br>M.M IN FINANCIAL MANAGEMENT, STT MANAJEMEN PPM, 2002<br>M.H IN BUSINESS LAW, UNIVERSITAS PADJAJARAN, 2009<br>S3<br>D.TH IN THEOLOGY, HARVEST INTERNATIONAL THEOLOGICAL SEMINARY, 2016.','Lecturer',NULL,NULL,NULL,NULL,'https://www.instagram.com/joniariesbangun',NULL,NULL,'profir-vicky-vj-panelewen-msc-phd.png','profir-vicky-vj-panelewen-msc-phd',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(12,NULL,'Dr. Joni Aries Bangun, M.H.',NULL,'Lecturer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'dr-joni-aries-bangun-mh.png','dr-joni-aries-bangun-mh',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(13,NULL,'Novika De Velas, S.Sos, M.Th.',NULL,'SPMI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'novika-de-velas-ssos-mth.png','novika-de-velas-ssos-mth',0,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(14,NULL,'Prof. Dr. Margaretha A Liwoso, Su.',NULL,'Lecturer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'prof-dr-margaretha-a-liwoso-su.png','prof-dr-margaretha-a-liwoso-su',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL);
/*!40000 ALTER TABLE `lecturer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecturer_education`
--

DROP TABLE IF EXISTS `lecturer_education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lecturer_education` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lecturer_id` bigint unsigned DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_id` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lecturer_education_lecturer_id_foreign` (`lecturer_id`),
  KEY `lecturer_education_created_by_foreign` (`created_by`),
  KEY `lecturer_education_updated_by_foreign` (`updated_by`),
  KEY `lecturer_education_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `lecturer_education_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lecturer_education_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lecturer_education_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lecturer_education_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecturer_education`
--

LOCK TABLES `lecturer_education` WRITE;
/*!40000 ALTER TABLE `lecturer_education` DISABLE KEYS */;
INSERT INTO `lecturer_education` VALUES (1,1,'August 1985 - Bachelor of Science','Agustus 1985 - Sarjana Sains','California State University - Fresno','California State University - Fresno',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(2,1,'August 2006 - Master of Theology','Agustus 2006 - Magister Teologi','STT Internasional Harvest Tangerang','STT Internasional Harvest Tangerang',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(3,1,'October 2006 - Doctor of Theology','Oktober 2006 - Dokter Teologi','Sekolah Tinggi Theologia Baptis Indonesia','Sekolah Tinggi Theologia Baptis Indonesia',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(4,2,'January 1994 - Agriculture Engineer','Januari 1994 - Insiyur Pertanian','Institut Pertanian Bogor','Institut Pertanian Bogor',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(5,2,'March 1996 - Master of Arts','Maret 1996 - Master Seni','Trinity Theological Seminary - Phillipine','Trinity Theological Seminary - Phillipine',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(6,2,'July 2006 - Master of Theology','Juli 2006 - Magister Teologi','STT Internasional Harvest Tangerang','STT Internasional Harvest Tangerang',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(7,2,'2018 - Master of Constitusional Law','2018 - Magister Hukum Tata Negara','Mpu Tantular University - Jakarta','Mpu Tantular University - Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(8,2,'2004 - Doctor of Ministry','2004 - Dokter Kementerian','STT Internasional Harvest Tangerang','STT Internasional Harvest Tangerang',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(9,2,'2006','2006','Sekolah Tinggi Teologi Baptis Indonesia','Sekolah Tinggi Teologi Baptis Indonesia',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(10,3,'December 1990 - Bachelor of Science','Desember 1990 - Sarjana Sains','Oklahoma State University - Stillwater','Oklahoma State University - Stillwater',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(11,3,'July 1992 - Master of Science','Juli 1992 - Magister Sains','Oklahoma State University -  Stillwater','Oklahoma State University -  Stillwater',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(12,3,'August 2018 - Doctor of Theology','Agustus 2018 - Dokter Teologi','STT Internasional Harvest Tangerang','STT Internasional Harvest Tangerang',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(13,4,'2000','2000','Universitas Gadjah Mada','Universitas Gadjah Mada',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(14,4,'2002','2002','Universitas Gadjah Mada','Universitas Gadjah Mada',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(15,4,'2015','2015','Sekolah Tinggi Teologi Injili Indonesia Jakarta','Sekolah Tinggi Teologi Injili Indonesia Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(16,5,'1998','1998','Universitas Sumatera Utara','Universitas Sumatera Utara',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(17,5,'2006','2006','STT Internasional Harvest Tangerang','STT Internasional Harvest Tangerang',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(18,5,'2015','2015','STT Internasional Harvest Tangerang','STT Internasional Harvest Tangerang',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(19,6,'1994','1994','Institut Seni Indonesia Yogyakarta','Institut Seni Indonesia Yogyakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(20,6,'2008','2008','Universitas Indonesia','Universitas Indonesia',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(21,6,'2020','2020','STT Internasional Harvest Tangerang','STT Internasional Harvest Tangerang',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(22,7,'2011','2011','STT Lighthouse Equipping Theological School (Lets)','STT Lighthouse Equipping Theological School (Lets)',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(23,7,'2016','2016','Sekolah Tinggi Teologi Injili Indonesia Yogyakarta','Sekolah Tinggi Teologi Injili Indonesia Yogyakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(24,7,'2020','2020','STT Internasional Harvest Tangerang','STT Internasional Harvest Tangerang',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(25,8,'1982','1982','Institut Alkitab Tiranus Bandung','Institut Alkitab Tiranus Bandung',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(26,8,'2005','2005','STT Internasional Harvest Tangerang','STT Internasional Harvest Tangerang',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL);
/*!40000 ALTER TABLE `lecturer_education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecturer_work_experience`
--

DROP TABLE IF EXISTS `lecturer_work_experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lecturer_work_experience` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lecturer_id` bigint unsigned DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_id` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lecturer_work_experience_lecturer_id_foreign` (`lecturer_id`),
  KEY `lecturer_work_experience_created_by_foreign` (`created_by`),
  KEY `lecturer_work_experience_updated_by_foreign` (`updated_by`),
  KEY `lecturer_work_experience_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `lecturer_work_experience_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lecturer_work_experience_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lecturer_work_experience_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lecturer_work_experience_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecturer_work_experience`
--

LOCK TABLES `lecturer_work_experience` WRITE;
/*!40000 ALTER TABLE `lecturer_work_experience` DISABLE KEYS */;
INSERT INTO `lecturer_work_experience` VALUES (1,1,'September 2009 - Lecturer','September 2009 - Dosen','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(2,1,'December 2012 - Head of Lecturer','December 2012 - Head of Lecturer','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(3,2,'September 2009 - Lecturer','September 2009 - Dosen','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(4,2,'December 2012 - Head of Lecturer','December 2012 - Head of Lecturer','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(5,3,'September 2009 - Lecturer','September 2009 - Dosen','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(6,3,'December 2012 - Head of Lecturer','December 2012 - Head of Lecturer','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(7,4,'September 2009 - Lecturer','September 2009 - Dosen','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(8,4,'December 2012 - Head of Lecturer','December 2012 - Head of Lecturer','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(9,5,'September 2009 - Lecturer','September 2009 - Dosen','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(10,5,'December 2012 - Head of Lecturer','December 2012 - Head of Lecturer','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(11,6,'September 2009 - Lecturer','September 2009 - Dosen','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(12,6,'December 2012 - Head of Lecturer','December 2012 - Head of Lecturer','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(13,7,'September 2009 - Lecturer','September 2009 - Dosen','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(14,7,'December 2012 - Head of Lecturer','December 2012 - Head of Lecturer','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(15,8,'September 2009 - Lecturer','September 2009 - Dosen','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(16,8,'December 2012 - Head of Lecturer','December 2012 - Head of Lecturer','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(17,9,'September 2009 - Lecturer','September 2009 - Dosen','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(18,9,'December 2012 - Head of Lecturer','December 2012 - Head of Lecturer','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(19,10,'September 2009 - Lecturer','September 2009 - Dosen','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(20,10,'December 2012 - Head of Lecturer','December 2012 - Head of Lecturer','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(21,11,'September 2009 - Lecturer','September 2009 - Dosen','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(22,11,'December 2012 - Head of Lecturer','December 2012 - Head of Lecturer','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(23,12,'September 2009 - Lecturer','September 2009 - Dosen','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(24,12,'December 2012 - Head of Lecturer','December 2012 - Head of Lecturer','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(25,13,'September 2009 - Lecturer','September 2009 - Dosen','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(26,13,'December 2012 - Head of Lecturer','December 2012 - Head of Lecturer','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(27,14,'September 2009 - Lecturer','September 2009 - Dosen','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(28,14,'December 2012 - Head of Lecturer','December 2012 - Head of Lecturer','HITS Jakarta','HITS Jakarta',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL);
/*!40000 ALTER TABLE `lecturer_work_experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` bigint unsigned DEFAULT NULL,
  `menu_id` bigint unsigned DEFAULT NULL,
  `row` bigint unsigned DEFAULT NULL,
  `activity` tinyint unsigned DEFAULT '1' COMMENT '1 = Created, 2 = Updated, 3 = Deleted, 4 = Restored, 5 = Deleted Permanent',
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_admin_id_foreign` (`admin_id`),
  KEY `log_menu_id_foreign` (`menu_id`),
  KEY `log_created_by_foreign` (`created_by`),
  KEY `log_updated_by_foreign` (`updated_by`),
  KEY `log_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `log_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `log_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `log_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `log_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `log_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=597 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(2,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(3,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(4,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(5,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(6,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(7,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(8,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(9,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(10,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(11,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(12,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(13,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(14,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(15,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(16,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(17,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(18,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(19,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(20,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(21,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(22,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(23,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(24,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(25,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(26,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(27,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(28,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(29,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(30,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(31,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(32,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(33,0,NULL,NULL,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(34,0,26,26,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(35,0,26,26,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(36,0,26,26,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(37,0,26,26,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(38,0,24,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(39,0,24,0,2,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(40,0,24,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(41,0,24,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(42,0,24,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(43,0,24,4,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(44,0,28,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(45,0,25,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(46,0,25,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(47,0,25,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(48,0,25,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(49,0,25,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(50,0,25,4,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(51,0,25,5,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(52,0,25,6,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(53,0,25,7,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(54,0,25,8,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(55,0,25,9,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(56,0,25,10,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(57,0,25,11,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(58,0,25,12,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(59,0,25,13,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(60,0,25,14,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(61,0,25,15,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(62,0,25,16,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(63,0,25,17,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(64,0,25,18,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(65,0,25,19,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(66,0,25,20,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(67,0,25,21,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(68,0,25,22,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(69,0,25,23,1,1,NULL,NULL,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(70,0,25,24,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(71,0,25,25,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(72,0,25,26,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(73,0,25,27,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(74,0,25,28,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(75,0,25,29,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(76,0,2,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(77,0,6,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(78,0,6,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(79,0,6,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(80,0,6,4,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(81,0,6,5,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(82,0,6,6,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(83,0,6,7,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(84,0,6,8,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(85,0,6,9,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(86,0,3,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(87,0,5,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(88,0,5,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(89,0,5,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(90,0,5,4,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(91,0,4,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(92,0,4,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(93,0,4,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(94,0,4,4,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(95,0,4,5,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(96,0,4,6,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(97,0,4,7,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(98,0,6,10,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(99,0,6,11,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(100,0,6,12,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(101,0,6,13,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(102,0,6,14,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(103,0,6,15,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(104,0,6,16,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(105,0,6,17,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(106,0,6,18,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(107,0,6,19,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(108,0,6,20,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(109,0,6,21,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(110,0,6,22,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(111,0,6,23,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(112,0,11,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(113,0,11,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(114,0,11,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(115,0,11,4,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(116,0,11,5,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(117,0,11,6,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(118,0,11,7,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(119,0,11,8,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(120,0,11,9,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(121,0,11,10,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(122,0,11,11,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(123,0,11,12,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(124,0,11,13,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(125,0,11,14,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(126,0,12,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(127,0,12,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(128,0,12,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(129,0,12,4,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(130,0,12,5,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(131,0,12,6,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(132,0,12,7,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(133,0,12,8,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(134,0,12,9,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(135,0,12,10,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(136,0,12,11,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(137,0,12,12,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(138,0,12,13,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(139,0,12,14,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(140,0,12,15,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(141,0,12,16,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(142,0,12,17,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(143,0,12,18,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(144,0,12,19,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(145,0,12,20,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(146,0,12,21,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(147,0,12,22,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(148,0,12,23,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(149,0,12,24,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(150,0,12,25,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(151,0,12,26,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(152,0,13,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(153,0,13,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(154,0,13,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(155,0,13,4,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(156,0,13,5,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(157,0,13,6,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(158,0,13,7,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(159,0,13,8,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(160,0,13,9,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(161,0,13,10,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(162,0,13,11,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(163,0,13,12,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(164,0,13,13,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(165,0,13,14,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(166,0,13,15,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(167,0,13,16,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(168,0,13,17,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(169,0,13,18,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(170,0,13,19,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(171,0,13,20,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(172,0,13,21,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(173,0,13,22,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(174,0,13,23,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(175,0,13,24,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(176,0,13,25,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(177,0,13,26,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(178,0,13,27,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(179,0,13,28,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(180,0,9,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(181,0,9,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(182,0,9,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(183,0,9,4,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(184,0,9,5,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(185,0,9,6,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(186,0,9,7,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(187,0,9,8,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(188,0,9,9,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(189,0,9,10,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(190,0,9,11,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(191,0,9,12,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(192,0,9,13,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(193,0,9,14,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(194,0,9,15,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(195,0,9,16,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(196,0,9,17,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(197,0,9,18,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(198,0,9,19,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(199,0,9,20,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(200,0,9,21,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(201,0,9,22,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(202,0,9,23,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(203,0,9,24,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(204,0,9,25,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(205,0,9,26,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(206,0,9,27,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(207,0,9,28,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(208,0,9,29,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(209,0,9,30,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(210,0,9,31,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(211,0,9,32,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(212,0,9,33,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(213,0,9,34,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(214,0,9,35,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(215,0,9,36,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(216,0,9,37,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(217,0,9,38,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(218,0,9,39,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(219,0,9,40,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(220,0,9,41,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(221,0,9,42,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(222,0,9,43,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(223,0,9,44,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(224,0,9,45,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(225,0,9,46,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(226,0,9,47,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(227,0,9,48,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(228,0,9,49,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(229,0,9,50,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(230,0,9,51,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(231,0,9,52,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(232,0,9,53,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(233,0,9,54,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(234,0,9,55,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(235,0,9,56,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(236,0,9,57,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(237,0,9,58,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(238,0,9,59,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(239,0,9,60,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(240,0,9,61,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(241,0,9,62,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(242,0,9,63,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(243,0,9,64,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(244,0,9,65,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(245,0,9,66,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(246,0,9,67,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(247,0,9,68,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(248,0,9,69,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(249,0,9,70,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(250,0,9,71,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(251,0,9,72,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(252,0,9,73,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(253,0,9,74,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(254,0,9,75,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(255,0,9,76,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(256,0,9,77,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(257,0,9,78,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(258,0,9,79,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(259,0,9,80,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(260,0,9,81,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(261,0,9,82,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(262,0,9,83,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(263,0,9,84,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(264,0,9,85,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(265,0,9,86,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(266,0,9,87,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(267,0,9,88,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(268,0,9,89,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(269,0,9,90,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(270,0,9,91,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(271,0,9,92,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(272,0,9,93,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(273,0,9,94,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(274,0,9,95,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(275,0,9,96,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(276,0,9,97,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(277,0,9,98,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(278,0,9,99,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(279,0,9,100,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(280,0,9,101,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(281,0,9,102,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(282,0,9,103,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(283,0,9,104,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(284,0,9,105,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(285,0,9,106,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(286,0,9,107,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(287,0,9,108,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(288,0,9,109,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(289,0,9,110,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(290,0,9,111,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(291,0,9,112,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(292,0,9,113,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(293,0,9,114,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(294,0,9,115,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(295,0,9,116,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(296,0,9,117,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(297,0,9,118,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(298,0,9,119,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(299,0,9,120,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(300,0,9,121,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(301,0,9,122,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(302,0,9,123,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(303,0,9,124,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(304,0,9,125,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(305,0,9,126,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(306,0,9,127,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(307,0,9,128,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(308,0,9,129,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(309,0,9,130,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(310,0,9,131,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(311,0,9,132,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(312,0,9,133,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(313,0,9,134,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(314,0,9,135,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(315,0,9,136,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(316,0,9,137,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(317,0,9,138,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(318,0,9,139,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(319,0,9,140,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(320,0,9,141,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(321,0,9,142,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(322,0,9,143,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(323,0,9,144,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(324,0,9,145,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(325,0,9,146,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(326,0,9,147,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(327,0,9,148,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(328,0,9,149,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(329,0,9,150,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(330,0,9,151,1,1,NULL,NULL,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(331,0,9,152,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(332,0,9,153,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(333,0,9,154,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(334,0,9,155,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(335,0,9,156,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(336,0,9,157,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(337,0,9,158,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(338,0,9,159,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(339,0,9,160,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(340,0,9,161,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(341,0,9,162,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(342,0,9,163,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(343,0,9,164,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(344,0,9,165,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(345,0,9,166,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(346,0,9,167,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(347,0,9,168,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(348,0,9,169,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(349,0,9,170,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(350,0,9,171,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(351,0,9,172,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(352,0,9,173,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(353,0,9,174,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(354,0,9,175,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(355,0,9,176,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(356,0,9,177,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(357,0,9,178,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(358,0,9,179,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(359,0,9,180,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(360,0,9,181,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(361,0,9,182,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(362,0,9,183,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(363,0,9,184,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(364,0,9,185,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(365,0,9,186,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(366,0,9,187,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(367,0,9,188,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(368,0,9,189,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(369,0,9,190,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(370,0,9,191,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(371,0,9,192,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(372,0,9,193,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(373,0,9,194,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(374,0,9,195,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(375,0,9,196,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(376,0,9,197,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(377,0,9,198,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(378,0,9,199,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(379,0,9,200,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(380,0,9,201,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(381,0,9,202,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(382,0,9,203,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(383,0,9,204,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(384,0,9,205,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(385,0,9,206,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(386,0,9,207,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(387,0,9,208,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(388,0,9,209,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(389,0,9,210,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(390,0,9,211,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(391,0,9,212,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(392,0,9,213,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(393,0,9,214,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(394,0,9,215,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(395,0,9,216,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(396,0,9,217,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(397,0,9,218,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(398,0,9,219,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(399,0,9,220,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(400,0,9,221,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(401,0,9,222,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(402,0,9,223,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(403,0,9,224,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(404,0,9,225,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(405,0,9,226,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(406,0,9,227,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(407,0,9,228,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(408,0,9,229,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(409,0,9,230,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(410,0,9,231,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(411,0,9,232,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(412,0,9,233,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(413,0,9,234,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(414,0,9,235,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(415,0,9,236,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(416,0,9,237,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(417,0,9,238,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(418,0,9,239,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(419,0,9,240,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(420,0,9,241,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(421,0,9,242,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(422,0,9,243,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(423,0,9,244,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(424,0,9,245,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(425,0,9,246,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(426,0,9,247,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(427,0,9,248,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(428,0,9,249,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(429,0,9,250,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(430,0,9,251,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(431,0,9,252,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(432,0,9,253,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(433,0,9,254,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(434,0,9,255,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(435,0,9,256,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(436,0,9,257,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(437,0,9,258,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(438,0,10,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(439,0,10,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(440,0,10,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(441,0,10,4,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(442,0,10,5,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(443,0,10,6,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(444,0,10,7,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(445,0,10,8,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(446,0,10,9,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(447,0,10,10,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(448,0,10,11,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(449,0,10,12,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(450,0,10,13,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(451,0,10,14,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(452,0,10,15,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(453,0,10,16,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(454,0,10,17,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(455,0,10,18,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(456,0,10,19,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(457,0,10,20,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(458,0,10,21,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(459,0,10,22,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(460,0,10,23,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(461,0,10,24,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(462,0,10,25,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(463,0,8,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(464,0,8,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(465,0,8,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(466,0,7,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(467,0,7,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(468,0,7,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(469,0,7,4,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(470,0,7,5,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(471,0,15,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(472,0,14,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(473,0,14,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(474,0,14,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(475,0,14,4,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(476,0,16,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(477,0,16,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(478,0,16,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(479,0,16,4,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(480,0,18,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(481,0,18,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(482,0,18,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(483,0,18,4,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(484,0,17,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(485,0,17,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(486,0,17,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(487,0,17,4,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(488,0,17,5,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(489,0,17,6,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(490,0,19,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(491,0,19,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(492,0,19,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(493,0,19,4,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(494,0,19,5,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(495,0,19,6,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(496,0,19,7,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(497,0,19,8,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(498,0,19,9,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(499,0,19,10,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(500,0,19,11,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(501,0,19,12,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(502,0,19,13,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(503,0,19,14,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(504,0,19,15,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(505,0,19,16,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(506,0,19,17,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(507,0,19,18,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(508,0,19,19,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(509,0,19,20,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(510,0,19,21,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(511,0,19,22,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(512,0,19,23,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(513,0,19,24,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(514,0,19,25,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(515,0,19,26,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(516,0,19,27,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(517,0,19,28,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(518,0,19,29,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(519,0,19,30,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(520,0,19,31,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(521,0,19,32,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(522,0,19,33,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(523,0,19,34,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(524,0,19,35,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(525,0,19,36,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(526,0,19,37,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(527,0,19,38,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(528,0,19,39,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(529,0,19,40,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(530,0,19,41,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(531,0,19,42,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(532,0,19,43,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(533,0,19,44,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(534,0,19,45,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(535,0,19,46,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(536,0,19,47,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(537,0,19,48,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(538,0,19,49,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(539,0,19,50,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(540,0,19,51,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(541,0,19,52,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(542,0,19,53,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(543,0,19,54,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(544,0,19,55,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(545,0,19,56,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(546,0,19,57,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(547,0,19,58,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(548,0,19,59,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(549,0,19,60,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(550,0,19,61,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(551,0,19,62,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(552,0,19,63,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(553,0,19,64,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(554,0,19,65,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(555,0,19,66,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(556,0,19,67,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(557,0,19,68,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(558,0,19,69,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(559,0,19,70,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(560,0,19,71,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(561,0,19,72,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(562,0,19,73,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(563,0,19,74,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(564,0,19,75,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(565,0,19,76,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(566,0,19,77,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(567,0,19,78,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(568,0,19,79,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(569,0,19,80,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(570,0,19,81,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(571,0,19,82,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(572,0,19,83,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(573,0,19,84,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(574,0,19,85,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(575,0,19,86,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(576,0,20,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(577,0,20,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(578,0,21,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(579,0,21,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(580,0,21,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(581,0,21,4,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(582,0,21,5,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(583,0,21,6,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(584,0,21,7,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(585,0,21,8,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(586,0,21,9,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(587,0,22,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(588,0,22,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(589,0,22,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(590,0,23,1,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(591,0,23,2,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(592,0,23,3,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(593,0,23,4,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(594,0,23,5,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(595,0,23,6,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(596,0,23,7,1,1,NULL,NULL,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL);
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `magazine`
--

DROP TABLE IF EXISTS `magazine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `magazine` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_id` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `magazine_name_unique` (`name`),
  UNIQUE KEY `magazine_name_id_unique` (`name_id`),
  KEY `magazine_created_by_foreign` (`created_by`),
  KEY `magazine_updated_by_foreign` (`updated_by`),
  KEY `magazine_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `magazine_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `magazine_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `magazine_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `magazine`
--

LOCK TABLES `magazine` WRITE;
/*!40000 ALTER TABLE `magazine` DISABLE KEYS */;
INSERT INTO `magazine` VALUES (1,'HITS Magazine Volume 01 - Valentine Edition - On Your Worst Day, I Love You','HITS Magazine Volume 01 - Valentine Edition - On Your Worst Day, I Love You','Description HITS Magazine Volume 01 - Valentine Edition - On Your Worst Day, I Love You','Deskripsi HITS Magazine Volume 01 - Valentine Edition - On Your Worst Day, I Love You','hits-magazine-volume-01-valentine-edition-on-your-worst-day-i-love-you.png','hits-magazine-volume-01-valentine-edition-on-your-worst-day-i-love-you.pdf',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(2,'GREATER DESTINY Wisuda HITS 2021 - Untuk Share Online','GREATER DESTINY Wisuda HITS 2021 - Untuk Share Online','Description GREATER DESTINY Wisuda HITS 2021 - Untuk Share Online','Deskripsi GREATER DESTINY Wisuda HITS 2021 - Untuk Share Online','greater-destiny-wisuda-hits-2021-untuk-share-online.png','greater-destiny-wisuda-hits-2021-untuk-share-online.pdf',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL);
/*!40000 ALTER TABLE `magazine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_category_id` bigint unsigned DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int unsigned DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu_name_unique` (`name`),
  UNIQUE KEY `menu_name_id_unique` (`name_id`),
  KEY `menu_menu_category_id_foreign` (`menu_category_id`),
  KEY `menu_created_by_foreign` (`created_by`),
  KEY `menu_updated_by_foreign` (`updated_by`),
  KEY `menu_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `menu_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `menu_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `menu_menu_category_id_foreign` FOREIGN KEY (`menu_category_id`) REFERENCES `menu_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `menu_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,NULL,'User','Pengguna','bi bi-person',1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(2,NULL,'Contact','Kontak','bi bi-telephone',2,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(3,1,'Repository','Repository','bi bi-journal-text',3,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(4,1,'Repository File','Dokumen Repository','bi bi-file-pdf',4,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(5,1,'Repository Contributor','Kontributor Repository','bi bi-people-fill',5,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(6,1,'Repository Subject','Subyek Repository','bi bi-tags',6,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(7,2,'Study Program','Program Studi','bi bi-book-half',7,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(8,2,'Study Program Category','Kategori Program Studi','bi bi-tags',8,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(9,3,'Course','Mata Kuliah','bi bi-book',9,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(10,3,'Course Lecturer','Mata Kuliah Dosen','bi bi-book-fill',10,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(11,4,'Lecturer','Dosen','bi bi-person-badge',11,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(12,4,'Lecturer Education','Edukasi Dosen','bi bi-mortarboard',12,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(13,4,'Lecturer Work Experience','Pengalaman Kerja Dosen','bi bi-briefcase',13,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(14,5,'News','Berita','bi bi-newspaper',14,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(15,5,'News Category','Kategori Berita','bi bi-tags',15,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(16,5,'News Comment','Komentar Berita','bi bi-chat-text',16,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(17,6,'Faq','Tanya Jawab','bi bi-question-circle',17,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(18,6,'Faq Category','Kategori Tanya Jawab','bi bi-tags',18,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(19,7,'Gallery','Galeri','bi bi-image',19,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(20,7,'Magazine','Majalah','bi bi-file',20,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(21,7,'Banner','Sampul','bi bi-window',21,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(22,7,'Slider','Slider','bi bi-sliders',22,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(23,7,'Testimony','Testimoni','bi bi-chat-text',23,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(24,8,'Admin','Admin','bi bi-people',24,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(25,8,'Access','Akses','bi bi-key',25,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(26,8,'Menu','Menu','bi bi-list',26,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(27,8,'Menu Category','Kategori Menu','bi bi-tags',27,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(28,8,'Setting','Pengaturan','bi bi-gear',28,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(29,8,'Log','Riwayat','bi bi-clock-history',29,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_category`
--

DROP TABLE IF EXISTS `menu_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int unsigned DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu_category_name_unique` (`name`),
  UNIQUE KEY `menu_category_name_id_unique` (`name_id`),
  KEY `menu_category_created_by_foreign` (`created_by`),
  KEY `menu_category_updated_by_foreign` (`updated_by`),
  KEY `menu_category_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `menu_category_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `menu_category_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `menu_category_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_category`
--

LOCK TABLES `menu_category` WRITE;
/*!40000 ALTER TABLE `menu_category` DISABLE KEYS */;
INSERT INTO `menu_category` VALUES (1,'Repository','Repository','bi bi-journal-text',1,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(2,'Study Program','Program Studi','bi bi-book-half',2,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(3,'Course','Mata Kuliah','bi bi-book',3,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(4,'Lecturer','Dosen','bi bi-person-badge',4,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(5,'News','Berita','bi bi-newspaper',5,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(6,'Faq','Tanya Jawab','bi bi-question-circle',6,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(7,'Website','Website','bi bi-globe',7,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL),(8,'Configuration','Konfigurasi','bi bi-gear',8,1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL);
/*!40000 ALTER TABLE `menu_category` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1),(3,'2019_12_14_000001_create_personal_access_tokens_table',1),(4,'2020_01_01_000001_create_permission_tables',1),(5,'2021_01_01_000001_create_access_menu_table',1),(6,'2021_01_01_000001_create_access_table',1),(7,'2021_01_01_000001_create_admin_table',1),(8,'2021_01_01_000001_create_log_table',1),(9,'2021_01_01_000001_create_menu_category_table',1),(10,'2021_01_01_000001_create_menu_table',1),(11,'2021_01_01_000001_create_setting_table',1),(12,'2021_01_01_000001_create_user_table',1),(13,'2021_01_01_000002_create_banner_table',1),(14,'2021_01_01_000002_create_contact_table',1),(15,'2021_01_01_000002_create_course_lecturer_table',1),(16,'2021_01_01_000002_create_course_table',1),(17,'2021_01_01_000002_create_faq_category_table',1),(18,'2021_01_01_000002_create_faq_table',1),(19,'2021_01_01_000002_create_gallery_table',1),(20,'2021_01_01_000002_create_lecturer_education_table',1),(21,'2021_01_01_000002_create_lecturer_table',1),(22,'2021_01_01_000002_create_lecturer_work_experience_table',1),(23,'2021_01_01_000002_create_magazine_table',1),(24,'2021_01_01_000002_create_news_category_table',1),(25,'2021_01_01_000002_create_news_comment_table',1),(26,'2021_01_01_000002_create_news_table',1),(27,'2021_01_01_000002_create_repository_contributor_table',1),(28,'2021_01_01_000002_create_repository_file_table',1),(29,'2021_01_01_000002_create_repository_subject_table',1),(30,'2021_01_01_000002_create_repository_table',1),(31,'2021_01_01_000002_create_slider_table',1),(32,'2021_01_01_000002_create_study_program_category_table',1),(33,'2021_01_01_000002_create_study_program_table',1),(34,'2021_01_01_000002_create_testimony_table',1),(35,'2021_01_01_000003_create_foreign_key_constraints_table',1);
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
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `news_category_id` bigint unsigned DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_id` text COLLATE utf8mb4_unicode_ci,
  `tag` text COLLATE utf8mb4_unicode_ci,
  `tag_id` text COLLATE utf8mb4_unicode_ci,
  `date` date DEFAULT NULL,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `news_name_unique` (`name`),
  UNIQUE KEY `news_name_id_unique` (`name_id`),
  UNIQUE KEY `news_slug_unique` (`slug`),
  KEY `news_news_category_id_foreign` (`news_category_id`),
  KEY `news_created_by_foreign` (`created_by`),
  KEY `news_updated_by_foreign` (`updated_by`),
  KEY `news_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `news_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `news_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `news_news_category_id_foreign` FOREIGN KEY (`news_category_id`) REFERENCES `news_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `news_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,1,'Welcome To Our Website 1','Selamat Datang Di Website Kami 1','Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?','Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?','news, event, hits, university','berita, kegiatan, hits, universitas','2022-04-23','welcome-to-our-website-1.png','welcome-to-our-website-1',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(2,1,'Welcome To Our Website 2','Selamat Datang Di Website Kami 2','Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?','Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?','news, event, hits, university','berita, kegiatan, hits, universitas','2022-04-23','welcome-to-our-website-2.png','welcome-to-our-website-2',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(3,1,'Welcome To Our Website 3','Selamat Datang Di Website Kami 3','Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?','Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?','news, event, hits, university','berita, kegiatan, hits, universitas','2022-04-23','welcome-to-our-website-3.png','welcome-to-our-website-3',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(4,1,'Welcome To Our Website 4','Selamat Datang Di Website Kami 4','Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?','Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?','news, event, hits, university','berita, kegiatan, hits, universitas','2022-04-23','welcome-to-our-website-4.png','welcome-to-our-website-4',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_category`
--

DROP TABLE IF EXISTS `news_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_id` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `news_category_name_unique` (`name`),
  UNIQUE KEY `news_category_name_id_unique` (`name_id`),
  UNIQUE KEY `news_category_slug_unique` (`slug`),
  KEY `news_category_created_by_foreign` (`created_by`),
  KEY `news_category_updated_by_foreign` (`updated_by`),
  KEY `news_category_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `news_category_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `news_category_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `news_category_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_category`
--

LOCK TABLES `news_category` WRITE;
/*!40000 ALTER TABLE `news_category` DISABLE KEYS */;
INSERT INTO `news_category` VALUES (1,'News Category','Kategori Berita','Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?','Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?','news-category',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL);
/*!40000 ALTER TABLE `news_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_comment`
--

DROP TABLE IF EXISTS `news_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news_comment` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `news_id` bigint unsigned DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_comment_news_id_foreign` (`news_id`),
  KEY `news_comment_created_by_foreign` (`created_by`),
  KEY `news_comment_updated_by_foreign` (`updated_by`),
  KEY `news_comment_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `news_comment_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `news_comment_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `news_comment_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `news_comment_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_comment`
--

LOCK TABLES `news_comment` WRITE;
/*!40000 ALTER TABLE `news_comment` DISABLE KEYS */;
INSERT INTO `news_comment` VALUES (1,1,'Name','Phone','Email',NULL,'Message',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(2,2,'Name','Phone','Email',NULL,'Message',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(3,3,'Name','Phone','Email',NULL,'Message',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(4,4,'Name','Phone','Email',NULL,'Message',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL);
/*!40000 ALTER TABLE `news_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
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
-- Table structure for table `repository`
--

DROP TABLE IF EXISTS `repository`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `repository` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `repository_subject_id` bigint unsigned DEFAULT NULL,
  `study_program_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `status` tinyint unsigned DEFAULT '0' COMMENT '0 = Pending, 1 = Approved, 2 = Rejected',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corporate_author` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publisher` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` year DEFAULT NULL,
  `abstract` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page` int unsigned DEFAULT NULL,
  `scholar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `repository_title_unique` (`title`),
  UNIQUE KEY `repository_slug_unique` (`slug`),
  KEY `repository_repository_subject_id_foreign` (`repository_subject_id`),
  KEY `repository_study_program_id_foreign` (`study_program_id`),
  KEY `repository_user_id_foreign` (`user_id`),
  KEY `repository_created_by_foreign` (`created_by`),
  KEY `repository_updated_by_foreign` (`updated_by`),
  KEY `repository_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `repository_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `repository_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `repository_repository_subject_id_foreign` FOREIGN KEY (`repository_subject_id`) REFERENCES `repository_subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `repository_study_program_id_foreign` FOREIGN KEY (`study_program_id`) REFERENCES `study_program` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `repository_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `repository_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repository`
--

LOCK TABLES `repository` WRITE;
/*!40000 ALTER TABLE `repository` DISABLE KEYS */;
INSERT INTO `repository` VALUES (1,9,5,NULL,0,'Keterlibatan Gereja Dalam Pemuridan Mahasiswa Di Indonesia','Avi','Christian',NULL,'Harvest International Theological Seminary',2019,'Disertasi yang berjudul “Keterlibatan Gereja dalam Pemuridan Mahasiswa di Indonesia diawali dengan kenyataan bahwa mahasiswa merupakan bagian penting dari perkembangan bangsa Indonesia. Pentingnya peran mahasiswa ini seharusnya menjadi fokus bagi pelayanan gereja yang ingin memenangkan dunia bagi Kristus. Gereja perlu menjadi yang terdepan dalam memuridkan mahasiswa di Indonesia.','https://www.hits.ac.id/repository/keterlibatan-gereja-dalam-pemuridan-mahasiswa-di-indonesia','kata kunci',238,NULL,'keterlibatan-gereja-dalam-pemuridan-mahasiswa-di-indonesia.png','keterlibatan-gereja-dalam-pemuridan-mahasiswa-di-indonesia',1,0,0,NULL,'2022-03-24 19:57:00','2022-03-24 19:57:00',NULL);
/*!40000 ALTER TABLE `repository` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repository_contributor`
--

DROP TABLE IF EXISTS `repository_contributor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `repository_contributor` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `repository_id` bigint unsigned DEFAULT NULL,
  `lecturer_id` bigint unsigned DEFAULT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `repository_contributor_repository_id_foreign` (`repository_id`),
  KEY `repository_contributor_lecturer_id_foreign` (`lecturer_id`),
  KEY `repository_contributor_created_by_foreign` (`created_by`),
  KEY `repository_contributor_updated_by_foreign` (`updated_by`),
  KEY `repository_contributor_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `repository_contributor_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `repository_contributor_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `repository_contributor_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `repository_contributor_repository_id_foreign` FOREIGN KEY (`repository_id`) REFERENCES `repository` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `repository_contributor_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repository_contributor`
--

LOCK TABLES `repository_contributor` WRITE;
/*!40000 ALTER TABLE `repository_contributor` DISABLE KEYS */;
INSERT INTO `repository_contributor` VALUES (1,1,3,'Unspecified','Consultant','Runtuwene, Daniel E.','Unspecified',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(2,1,1,'Unspecified','Consultant','Oentoro, Jimmy Boaz','Unspecified',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(3,1,5,'Unspecified','Thesis Advisor','Ersada, Linda Arih','Unspecified',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(4,1,9,'Unspecified','Thesis Advisor','Tindas, Arnold','Unspecified',1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL);
/*!40000 ALTER TABLE `repository_contributor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repository_file`
--

DROP TABLE IF EXISTS `repository_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `repository_file` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `repository_id` bigint unsigned DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `public` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `repository_file_repository_id_foreign` (`repository_id`),
  KEY `repository_file_created_by_foreign` (`created_by`),
  KEY `repository_file_updated_by_foreign` (`updated_by`),
  KEY `repository_file_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `repository_file_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `repository_file_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `repository_file_repository_id_foreign` FOREIGN KEY (`repository_id`) REFERENCES `repository` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `repository_file_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repository_file`
--

LOCK TABLES `repository_file` WRITE;
/*!40000 ALTER TABLE `repository_file` DISABLE KEYS */;
INSERT INTO `repository_file` VALUES (1,1,'Cover, Pengesahan, Abstrak, Daftar Isi, Daftar Pustaka','Available under License Creative Commons Attribution Non-commercial.','cover-pengesahan-abstrak-daftar-isi-daftar-pustaka.pdf',1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(2,1,'Bab I','Available under License Creative Commons Attribution Non-commercial.','bab-i.pdf',1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(3,1,'Bab II','Available under License Creative Commons Attribution Non-commercial.','bab-ii.pdf',1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(4,1,'Bab III','Available under License Creative Commons Attribution Non-commercial.','bab-iii.pdf',1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(5,1,'Bab IV','Available under License Creative Commons Attribution Non-commercial.','bab-iv.pdf',1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(6,1,'Bab V','Available under License Creative Commons Attribution Non-commercial.','bab-v.pdf',1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(7,1,'Lampiran','Available under License Creative Commons Attribution Non-commercial.','lampiran.pdf',1,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL);
/*!40000 ALTER TABLE `repository_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repository_subject`
--

DROP TABLE IF EXISTS `repository_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `repository_subject` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `repository_subject_id` bigint unsigned DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `repository_subject_name_unique` (`name`),
  KEY `repository_subject_repository_subject_id_foreign` (`repository_subject_id`),
  KEY `repository_subject_created_by_foreign` (`created_by`),
  KEY `repository_subject_updated_by_foreign` (`updated_by`),
  KEY `repository_subject_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `repository_subject_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `repository_subject_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `repository_subject_repository_subject_id_foreign` FOREIGN KEY (`repository_subject_id`) REFERENCES `repository_subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `repository_subject_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repository_subject`
--

LOCK TABLES `repository_subject` WRITE;
/*!40000 ALTER TABLE `repository_subject` DISABLE KEYS */;
INSERT INTO `repository_subject` VALUES (1,NULL,'Library of Congress Subject Areas',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(2,1,'B Philosophy. Psychology. Religion',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(3,2,'BF Psychology',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(4,2,'BJ Ethics',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(5,2,'BL Religion',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(6,2,'BR Christianity',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(7,2,'BS The Bible',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(8,2,'BV Practical Theology',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(9,8,'BV1460 Religious Education',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(10,7,'BX Christian Denominations',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(11,7,'K Kepemimpinan',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(12,11,'KK Kepemimpinan Kristen',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(13,7,'L Education',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(14,13,'L Education (General)',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(15,7,'M Music and Books on Music',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(16,15,'M Music',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(17,15,'MT Musical instruction and study',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(18,7,'Musik Gerejawi',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(19,7,'Pendidikan Agama Kristen',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(20,7,'Theology',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(21,7,'Z Bibliography. Library Science. Information Resources',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(22,21,'ZA Information resources',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL),(23,22,'ZA4050 Electronic information resources',NULL,1,0,0,NULL,'2022-04-23 07:45:45','2022-04-23 07:45:45',NULL);
/*!40000 ALTER TABLE `repository_subject` ENABLE KEYS */;
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
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `setting` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sms` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `call` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_maps` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_maps_iframe` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `setting_created_by_foreign` (`created_by`),
  KEY `setting_updated_by_foreign` (`updated_by`),
  KEY `setting_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `setting_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `setting_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `setting_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,'(021) 5890 5007','(021) 5890 5007','(021) 5890 5007','','contact@ptmdvindonesia.com','Jl. Batu Mulia, Rukan Taman Meruya Blok M 95-97, Jakarta Barat, 11620','https://goo.gl/maps/PoFdy5PLbE2Voa6e9','https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15866.147765443879!2d106.7390874!3d-6.1926542!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6b18e0ca86431724!2sPT%20MDV%20Indonesia!5e0!3m2!1sid!2sid!4v1631602696978!5m2!1sid!2sid',1,0,0,NULL,'2022-04-23 07:45:44','2022-04-23 07:45:44',NULL);
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slider` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_id` text COLLATE utf8mb4_unicode_ci,
  `button_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_name_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slider_name_unique` (`name`),
  UNIQUE KEY `slider_name_id_unique` (`name_id`),
  KEY `slider_created_by_foreign` (`created_by`),
  KEY `slider_updated_by_foreign` (`updated_by`),
  KEY `slider_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `slider_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `slider_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `slider_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider`
--

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` VALUES (1,'Welcome To','Selamat Datang Di','Creating Leaders For The Future','Menciptakan Pemimpin Untuk Masa Depan','About Us','Tentang Kami','https://www.hits.ac.id/about','welcome-to.png',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(2,'The Best Education','Pendidikan Terbaik','Get Equipped To Transform The World','Dapatkan Diperlengkapi Untuk Mengubah Dunia','Study Program','Program Study','https://www.hits.ac.id/study-program','the-best-education.png',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(3,'High Quality Lecturers','Dosen Berkualitas Tinggi','HITS Will Give You The Best Education Through The Most Competent Lecturers And Creative Way Of Learning','HITS Akan Memberikan Anda Pendidikan Terbaik Melalui Dosen Terkompeten Dan Cara Belajar Yang Kreatif','Our Lecturer','Dosen Kami','https://www.hits.ac.id/lecturer','high-quality-lecturers.png',0,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL);
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `study_program`
--

DROP TABLE IF EXISTS `study_program`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `study_program` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `study_program_category_id` bigint unsigned DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_id` text COLLATE utf8mb4_unicode_ci,
  `vision` text COLLATE utf8mb4_unicode_ci,
  `vision_id` text COLLATE utf8mb4_unicode_ci,
  `mission` text COLLATE utf8mb4_unicode_ci,
  `mission_id` text COLLATE utf8mb4_unicode_ci,
  `degree` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `study_program_name_unique` (`name`),
  UNIQUE KEY `study_program_name_id_unique` (`name_id`),
  UNIQUE KEY `study_program_degree_unique` (`degree`),
  UNIQUE KEY `study_program_slug_unique` (`slug`),
  KEY `study_program_study_program_category_id_foreign` (`study_program_category_id`),
  KEY `study_program_created_by_foreign` (`created_by`),
  KEY `study_program_updated_by_foreign` (`updated_by`),
  KEY `study_program_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `study_program_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `study_program_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `study_program_study_program_category_id_foreign` FOREIGN KEY (`study_program_category_id`) REFERENCES `study_program_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `study_program_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `study_program`
--

LOCK TABLES `study_program` WRITE;
/*!40000 ALTER TABLE `study_program` DISABLE KEYS */;
INSERT INTO `study_program` VALUES (1,1,'Bachelor of Theology','Sarjana Teologi','Dalam kamus Bahasa Indonesia W.J.S. Poerwardamita arti kata teologi pengetahuan tentang Tuhan, dasar-dasar kepercayaan kepada Tuhan dan agama berdasarkan pada kitab-kitab Suci. Selanjutnya dalam kamus filsafat di sebutkan teologi secara sederhana yaitu suatu studi engenai pertayaan tentang Tuhan dan hubungannya dengan dunia realitas. Dalam pengertian yang lebih luas, teologi merupkan salah satu cabang dari filsafat atau bidang khusus inquiri filosofi tentnag Tuhan.','Dalam kamus Bahasa Indonesia W.J.S. Poerwardamita arti kata teologi pengetahuan tentang Tuhan, dasar-dasar kepercayaan kepada Tuhan dan agama berdasarkan pada kitab-kitab Suci. Selanjutnya dalam kamus filsafat di sebutkan teologi secara sederhana yaitu suatu studi engenai pertayaan tentang Tuhan dan hubungannya dengan dunia realitas. Dalam pengertian yang lebih luas, teologi merupkan salah satu cabang dari filsafat atau bidang khusus inquiri filosofi tentnag Tuhan.','Terwujudnya program studi teologi kependetaan yang unggul dalam menghasilkan teolog, misionaris, pendeta dan pemimpin transformastif yang berwawasan Alkitabiah dan global di Indonesia tahun 2015 dan menjadi terbaik di Asia Tenggara tahun 2030.','Terwujudnya program studi teologi kependetaan yang unggul dalam menghasilkan teolog, misionaris, pendeta dan pemimpin transformastif yang berwawasan Alkitabiah dan global di Indonesia tahun 2015 dan menjadi terbaik di Asia Tenggara tahun 2030.','A. Mewujudkan pendidikan teologi kependetaan yang unggul dalam berteologi.<br>B. Meningkatkan kegiatan penelitian sehingga tercipta hasil penelitian yang berkualitas.<br>C. Membina Mahasiswa dalam melayani gereja dan masyarakat.','A.Mewujudkan pendidikan teologi kependetaan yang unggul dalam berteologi.<br>B.Meningkatkan kegiatan penelitian sehingga tercipta hasil penelitian yang berkualitas.<br>C. Membina Mahasiswa dalam melayani gereja dan masyarakat.','S.Th','8','Only Rp. 399.000/month*','bachelor-of-theology.png','bachelor-of-theology',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(2,1,'Bachelor of Christian Education','Sarjana Pendidikan Kristen',NULL,NULL,'Terwujudnya program studi PAK yang unggul dalam menghasilkan teolog, misionaris, pendeta dan pemimpin transformastif yang berwawasan Alkitabiah dan global di Indonesia tahun 2015 dan menjadi terbaik di Asia Tenggara tahun 2030.','Terwujudnya program studi PAK yang unggul dalam menghasilkan teolog, misionaris, pendeta dan pemimpin transformastif yang berwawasan Alkitabiah dan global di Indonesia tahun 2015 dan menjadi terbaik di Asia Tenggara tahun 2030.','Menyelenggarakan Pendidikan Agama Kristen yang transformative dalam perspektif Alkitabiah untuk menghasilkan tenaga pendidik agama Kristen yang berkarakter ilahi, berkompeten dan mampu merespon tantangan pendidikan masa depan.<br>Melakukan kegiatan penelitian sehingga tercipta hasil penelitian yang berkualitas dan bermanfaat bagi masyarakat global.<br>Melaksanakan kegiatan pengabdian yang membawa perubahan positif di gereja dan masyarakat.','Menyelenggarakan Pendidikan Agama Kristen yang transformative dalam perspektif Alkitabiah untuk menghasilkan tenaga pendidik agama Kristen yang berkarakter ilahi, berkompeten dan mampu merespon tantangan pendidikan masa depan.<br>Melakukan kegiatan penelitian sehingga tercipta hasil penelitian yang berkualitas dan bermanfaat bagi masyarakat global.<br>Melaksanakan kegiatan pengabdian yang membawa perubahan positif di gereja dan masyarakat.','S.Pd','8','Only Rp. 399.000/month*','bachelor-of-christian-education.png','bachelor-of-christian-education',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(3,1,'Bachelor of Church Music','Sarjana Musik Gereja',NULL,NULL,'Terwujudnya program studi music Gerejawi yang unggul dalam bidang musical dan ekstramusikal di Indonesia tahun 2015 dan Asia Tenggara tahun 2030.','Terwujudnya program studi music Gerejawi yang unggul dalam bidang musical dan ekstramusikal di Indonesia tahun 2015 dan Asia Tenggara tahun 2030.','Menyelenggarakan pendidikan dengan konsentrasi pada music gerejawi yang memadukan music tradisional dan modern.<br>Menyelenggarakan penelitian dan pengembangan music gerejawi dalam rangka berkontribusi terhadap pengembangan masyarakat.<br>Menyelenggarakan pengabdian di gereja dan masyarakat dalam lingkup nasional dan internasional melalui music gerejawi yang transformastif','Menyelenggarakan pendidikan dengan konsentrasi pada music gerejawi yang memadukan music tradisional dan modern.<br>Menyelenggarakan penelitian dan pengembangan music gerejawi dalam rangka berkontribusi terhadap pengembangan masyarakat.<br>Menyelenggarakan pengabdian di gereja dan masyarakat dalam lingkup nasional dan internasional melalui music gerejawi yang transformastif','S.Sn','8','Only Rp. 399.000/month*','bachelor-of-church-music.png','bachelor-of-church-music',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(4,2,'Master of Theology in Christian Leadership','Magister Teologi dalam Kepemimpinan Kristen','Mempersiapkan pemimpin yang memiliki semangat dan jiwa transformasi melalui pendidikan.<br>Master of Theology (M.Th) in Christian Leadership.','Mempersiapkan pemimpin yang memiliki semangat dan jiwa transformasi melalui pendidikan.<br>Master of Theology (M.Th) in Christian Leadership.','The achievement of the leading Christian Leadership Study Program, in producing transformative, Biblical and global Christian theologians and leaders in Indonesia in 2030 and becoming one of the best Christian Leadership Study Programs in Southeast Asia by 2050.','Tercapainya Program Studi Kepemimpinan Kristen yang terdepan, dalam menghasilkan teolog dan pemimpin Kristen yang transformative, berwawasan Alkitabiah dan global di Indonesia tahun 2030 dan menjadi salah satu Program Studi Kepemimpinan Kristen yang terbaik di Asia Tenggara tahun 2050.','1. Organizing a transformative learning process in the field of Christian Leadership with a Biblical perspective to produce Christian leaders with divine character, competent and able to respond to various challenges in society in the future.<br><br>2. Conduct research activities in the field of transformative leadership, so as to create quality research results that are beneficial to the Indonesian people and globally.<br><br>3. Carry out community service activities that bring positive changes in the midst of the church and Indonesian society.','1. Menyelenggarakan proses pembelajaran yang transformatif dalam bidang Kepemimpinan Kristen dengan perspektif Alkitabiah untuk menghasilkan pemimpin Kristen yang berkarakter Ilahi, berkompeten dan mampu merespon berbagai tantangan dalam masyarakat di masa depan.<br><br>2. Melakukan kegiatan penelitian dalam bidang kepemimpinan transformatif, sehingga tercipta hasil penelitian yang berkualitas dan bermanfaat bagi masyarakat Indonesia dan global.<br><br>3. Melaksanakan kegiatan pengabdian pada masyarakat yang membawa perubahan positif di tengah-tengah gereja dan masyarakat Indonesia.','M.Th','3','Only Rp. 1.299.000/month*','master-of-theology-in-christian-leadership.png','master-of-theology-in-christian-leadership',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(5,3,'Doctor of Theology in Transformation Leadership','Doktor Teologi dalam Kepemimpinan Transformasi','Gelar : Doctor of Theology (D.Th) in Leadership & Transformation','Gelar : Doctor of Theology (D.Th) in Leadership & Transformation','The achievement of the Theology Doctoral Study Program in the field of Christian Leadership which is at the forefront, in producing theologians and transformative leaders with Biblical and global perspectives in Indonesia in 2030 and becoming one of the best Theology Doctoral Study Programs in Leadership in Southeast Asia in 2050.','Tercapainya Program Studi Doktor Teologi dalam bidang Kepemimpinan Kristen yang terdepan, dalam menghasilkan teolog dan pemimpin transformatif yang berwawasan Alkitabiah dan global di Indonesia tahun 2030 dan menjadi salah satu Program Studi Doktor Teologi bidang Kepemimpinan yang terbaik di Asia Tenggara tahun 2050.','D.Th','1. Menyelenggarakan proses pembelajaran yang transformatif dalam bidang Kepemimpinan Kristen dengan perspektif Alkitabiah untuk menghasilkan pemimpin Kristen yang berkarakter Ilahi, berkompeten dan mampu merespon berbagai tantangan dalam masyarakat di masa depan.<br><br>2. Melakukan kegiatan penelitian dalam bidang kepemimpinan transformatif, sehingga tercipta hasil penelitian yang berkualitas dan bermanfaat bagi masyarakat Indonesia dan global.<br><br>3. Melaksanakan kegiatan pengabdian pada masyarakat yang membawa perubahan positif di tengah-tengah gereja dan masyarakat Indonesia.','1. Organiz','3','Only Rp. 2.599.000/month*','doctor-of-theology-in-transformation-leadership.png','doctor-of-theology-in-transformation-leadership',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL);
/*!40000 ALTER TABLE `study_program` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `study_program_category`
--

DROP TABLE IF EXISTS `study_program_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `study_program_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_id` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `study_program_category_code_unique` (`code`),
  UNIQUE KEY `study_program_category_name_unique` (`name`),
  UNIQUE KEY `study_program_category_name_id_unique` (`name_id`),
  UNIQUE KEY `study_program_category_slug_unique` (`slug`),
  KEY `study_program_category_created_by_foreign` (`created_by`),
  KEY `study_program_category_updated_by_foreign` (`updated_by`),
  KEY `study_program_category_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `study_program_category_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `study_program_category_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `study_program_category_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `study_program_category`
--

LOCK TABLES `study_program_category` WRITE;
/*!40000 ALTER TABLE `study_program_category` DISABLE KEYS */;
INSERT INTO `study_program_category` VALUES (1,'S1','Undergraduate Program','Program Sarjana','Description Undergraduate Program','Deskripsi Program Sarjana','undergraduate-program.png','undergraduate-program',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(2,'S2','Postgraduate Program','Program Pascasarjana','Description Postgraduate Program','Deskripsi Program Pascasarjana','postgraduate-program.png','postgraduate-program',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(3,'S3','Doctoral Program','Program Doktoral','Description Doctoral Program','Deskripsi Program Doktoral','doctoral-program.png','doctoral-program',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL);
/*!40000 ALTER TABLE `study_program_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimony`
--

DROP TABLE IF EXISTS `testimony`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimony` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `study_program_id` bigint unsigned DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `graduate` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `testimony_name_unique` (`name`),
  KEY `testimony_study_program_id_foreign` (`study_program_id`),
  KEY `testimony_created_by_foreign` (`created_by`),
  KEY `testimony_updated_by_foreign` (`updated_by`),
  KEY `testimony_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `testimony_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `testimony_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `testimony_study_program_id_foreign` FOREIGN KEY (`study_program_id`) REFERENCES `study_program` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `testimony_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimony`
--

LOCK TABLES `testimony` WRITE;
/*!40000 ALTER TABLE `testimony` DISABLE KEYS */;
INSERT INTO `testimony` VALUES (1,3,'Adri Prematura Wicaksono','Di Harvest, saya diperkenankan untuk belajar dengan dan dari berbagi sumber, tidak terbatas hanya dalam gedung institusi namun juga di dalam praktek kontribusi lapangan dan masyarakat.','Program Studi Musik Gerejawi - S1 HITS','adri-prematura-wicaksono.png',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(2,2,'Rosy Renita Bunga','Di kampus ini saya sangat di bantu dalam mengenali dan mengembangkan potensi diri saya dan kemantapan hati dalam meresponi panggilan Tuhan, serta kami diberikan pengetahuan dan praktek mengenai Kepemimpinan dan Misi oleh para dosen-dosen yang berkualitas, sehingga ketika lulus kami siap untuk menjangkau jiwa-jiwa dan menjadi pemimpin di Indonesia dan sampai ke bangsa-bangsa.','Program Studi Pendidikan Agama Kristen - S1 HITS','rosy-renita-bunga.png',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(3,1,'Lorenzo Samuel Tahulending','HITS adalah kampus yang tepat untuk membentuk pemahaman teologi yang benar, nilai kebersaman dalam sebuah keluarga serta menumbuhkan karakter kepemimpinan yang baik dalam sebuah organisasi baik diluar maupun di dalam sebuah gereja.','Program Studi Teologi - S1 HITS','lorenzo-samuel-tahulending.png',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(4,4,'Bontot Tanka','Di STTI Harvest saya belajar bagaimana untuk menjadi hamba Tuhan, Pemimpin dan kawan sekerja Allah, dimana kami dipersiapkan juga untuk mengahadapi tantangan-tantangan yang akan dihadapi gereja di masa yang akan datang.','Program S2 HITS','bontot-tanka.png',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(5,4,'Asima Rohana Nadeak','Para dosen di kampus HITS memperlengkapi kami bukan sekedar knowledge tetapi dengan spiritual juga dimana sebagi hamba Tuhan kami harus tetap memiliki relationship yang intim dengan Tuhan. Teman-teman di kampus dari berbagai interdenominasi menjadi berkat buat saya secara pribadi untuk belajar bersama dan saling support.','Program S2 HITS','asima-rohana-nadeak.png',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(6,5,'Joni Aries Bangun','Karakter, ciri dan cara mengajar atau beradaptasi dosen-dosen, teman-teman di kelas, para staf pendukung serta materi yang diajarkan atau didiskusikan dan hal yang dibicarakan sangat memperkaya pemahaman dan pengalaman saya atas makna hidup ini yang pada akhirnya akan menjadi lembaran baru pengetahuan, kenangan dan sejarah hidup saya.','Program Doktoral - S3 HITS','joni-aries-bangun.png',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL),(7,5,'Bangun Tobing','Di kampus ini sungguh menyenangkan dan memberkati pekerjan juga pelayanan saya dengan metode dan materi perkuliahan yang sesuai dengan kebutuhan saat ini, persaudaraan dan kepedulian antar mahasiswa terjalin dengan sangat baik serta didukung para dosen yang mau melayani dan mengajar dengan penuh kasih.','Program Doktoral - S3 HITS','bangun-tobing.png',1,0,0,NULL,'2022-04-23 07:45:46','2022-04-23 07:45:46',NULL);
/*!40000 ALTER TABLE `testimony` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint unsigned DEFAULT '1' COMMENT '1 = Yes, 0 = No',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name_unique` (`name`),
  UNIQUE KEY `user_email_unique` (`email`),
  KEY `user_created_by_foreign` (`created_by`),
  KEY `user_updated_by_foreign` (`updated_by`),
  KEY `user_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `user_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-23 14:59:47
