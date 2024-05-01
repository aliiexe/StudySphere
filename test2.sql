-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: test2
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ch_favorites`
--

DROP TABLE IF EXISTS `ch_favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ch_favorites` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint NOT NULL,
  `favorite_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ch_favorites`
--

LOCK TABLES `ch_favorites` WRITE;
/*!40000 ALTER TABLE `ch_favorites` DISABLE KEYS */;
INSERT INTO `ch_favorites` VALUES ('5b84b413-f9d5-4bdc-b4b0-25197a1d5144',4,2,'2023-12-17 11:53:11','2023-12-17 11:53:11');
/*!40000 ALTER TABLE `ch_favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ch_messages`
--

DROP TABLE IF EXISTS `ch_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ch_messages` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint NOT NULL,
  `to_id` bigint NOT NULL,
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ch_messages`
--

LOCK TABLES `ch_messages` WRITE;
/*!40000 ALTER TABLE `ch_messages` DISABLE KEYS */;
INSERT INTO `ch_messages` VALUES ('06a6214b-5abd-4f22-af9b-7c0893ea213a',3,3,'hello',NULL,0,'2023-12-14 11:48:22','2023-12-14 11:48:22'),('4c6a80ce-2b7c-47bd-b291-da0e892b8737',2,4,'hi',NULL,1,'2023-12-19 08:21:22','2023-12-19 09:33:37'),('80f20671-a94c-473c-a2d6-d7458368e645',4,2,'hello',NULL,1,'2023-12-19 09:33:42','2023-12-23 14:32:45'),('cd47e6f7-04dd-4c2f-8842-b3f2fa448dbd',5,4,'hi',NULL,0,'2024-01-02 09:30:06','2024-01-02 09:30:06');
/*!40000 ALTER TABLE `ch_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_post_id_foreign` (`post_id`),
  CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (10,10,17,'impressionnant ?','2024-02-12 08:41:58','2024-02-12 08:41:58');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` text COLLATE utf8mb4_unicode_ci,
  `avg_rating` double(2,1) NOT NULL DEFAULT '0.0',
  `domaine_id` bigint unsigned DEFAULT NULL,
  `duree_du_cours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courses_domaine_id_foreign` (`domaine_id`),
  CONSTRAINT `courses_domaine_id_foreign` FOREIGN KEY (`domaine_id`) REFERENCES `domaine_etudes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'Introduction à Agile','images/r3nwhcjZam3WtMdjP6zI62aSR20uT6maHRxtW9jL.png','Introduction to the concepts of Agile (Scrum - Jira - Git - SonarQube - DevOps....)','L\'Agilité est une approche de gestion de projet qui favorise la flexibilité, la collaboration et l\'adaptabilité aux changements. Elle est particulièrement utilisée dans le développement logiciel mais peut être appliquée à d\'autres domaines. Quelques concepts clés liés à l\'Agilité incluent :\r\n\r\nScrum : Scrum est un framework Agile qui organise le travail en itérations appelées \"Sprints\". Il met l\'accent sur la collaboration d\'équipe, la communication fréquente et la livraison de produits fonctionnels à la fin de chaque Sprint.\r\n\r\nJira : Jira est un outil de gestion de projet qui prend en charge la méthodologie Agile, notamment Scrum et Kanban. Il facilite la planification, le suivi et la collaboration au sein des équipes de développement.','OFPPT','[\"4.5\",\"3.4\",\"4.6\",\"4.6\",\"4.4\"]',4.3,1,'4 mois','pdfs/9rarXvX4TNx2GpdeU82cfYsJ7SptekSOWHDAGw8V.pdf','2023-12-12 08:29:58','2023-12-18 20:11:18'),(2,'Introduction à Laravel','images/5xsCWXR1IytGRWwGpPeF3XwfdBFrpqQUjcc1PjB6.png','Introduction to Laravel Development (Routes - views - http requests ....)','\"L\'introduction à Laravel couvre les bases du développement web avec ce framework PHP moderne. Les thèmes clés incluent les routes, les vues, la gestion des requêtes HTTP, les contrôleurs, le middleware, et l\'intégration de base de données avec Eloquent. Ce cours offre une compréhension essentielle pour construire des applications web efficaces et élégantes.\"','OFPPT','[\"3.6\",\"4.6\",\"4.2\"]',4.1,5,'9 mois','pdfs/EKQCDpvQ4NTR8hqwsdHFzn7jBMGuQzF2W33XTcio.pdf','2023-12-12 09:40:33','2023-12-17 18:02:01'),(3,'101 Things to Learn in Art School','images/NShcpX56gzwdQNMTX5iAdx49nfNuNg98jShnK76J.png','101 Things to Learn in Art School course','Le cours \'101 choses à apprendre à l\'école d\'art\' offre une exploration diversifiée des concepts cruciaux en art. Parmi les sujets abordés : les éléments fondamentaux de la composition artistique, l\'utilisation expressive des médiums, la compréhension de l\'histoire de l\'art, la critique constructive, et bien plus encore. Ce cours vise à fournir aux étudiants une base solide pour développer leur compréhension artistique et leur pratique créative','Pratt Institute','[\"3.2\",\"5\",\"4.9\",\"4.9\",\"5\",\"5\",\"4.9\"]',4.7,6,'9 mois','pdfs/Nle6W5pdOKLIqrQg3Fy9R6iaVJk34U4jwVkFCfUa.pdf','2023-12-12 09:54:53','2023-12-17 19:43:35'),(4,'Introduction aux bases de données','images/LiKa3JAx7CqrW9gOtY6UbWsYWTtiEio2nUrhcZ3l.png','Data is one of the most critical assets of any business. Data needs a database to store and process data quickly.','Syllabus\r\nModule 1 -SQL and Relational Databases 101\r\nIntroduction to SQL and Relational Databases\r\nInformation and Data Models\r\nTypes of Relationships\r\nMapping Entities to Tables\r\nRelational Model Concepts\r\nModule 2 - Relational Model Constraints and Data Objects\r\nRelational Model Constraints Introduction\r\nRelational Model Constraints Advanced\r\nModule 3 - Data Definition Language (DDL) and Data Manipulation Language (DML)\r\nCREATE TABLE statement\r\nINSERT statement\r\nSELECT statement\r\nUPDATE and DELETE statements\r\nModule 4 - Advanced SQL\r\nString Patterns, Ranges, and Sets\r\nSorting Result Sets\r\nGrouping Result Sets\r\nModule 5 - Working with multiple tables\r\nJoin Overview\r\nInner Join\r\nOuter Join','OFPPT','[\"4.3\",\"4.1\"]',4.2,3,'9 mois','pdfs/roq3b7m971dgefBMQdIWNrYL9eKYPrkTLMXqZvW2.pdf','2023-12-16 23:52:45','2024-01-02 09:29:31'),(5,'Concevoir un réseau informatique','images/Xl3jZC55wXuxeVzvO3by5LY69fGNsxvSTP8cpADz.png','Formation sur la conception des réseaux informatiques, abordant les concepts clés, les protocoles et les aspects de sécurité','Plongez dans le monde passionnant de la conception des réseaux informatiques avec ce cours approfondi. Explorez les principes fondamentaux de la création d\'architectures réseau efficaces, de la gestion des protocoles de communication à l\'implémentation de technologies de pointe telles que la virtualisation. Acquérez une compréhension approfondie des stratégies de sécurité, des considérations de performance et des méthodes de gestion des réseaux. Enrichissez vos compétences en concevant des infrastructures réseau adaptées aux défis actuels et aux évolutions futures de l\'informatique moderne. Un voyage complet pour les passionnés de réseaux en quête de maîtrise et d\'innovation.','OFPPT','[\"2.5\"]',2.5,2,'7 mois','pdfs/gGQbip0HLhcymn4fN9Nht53MhS8OMMiDDiRpoUZt.pdf','2023-12-18 20:18:31','2023-12-19 09:23:20'),(6,'Introduction au marketing digital','images/OoBIZhcyseOFrOTjp8ow8aCR7BFHvdDzi4hvj4St.png','Soyez maître du marketing digital avec ce cours complet. Explorez SEO, médias sociaux','Découvrez l\'univers dynamique du marketing digital, une discipline incontournable dans l\'ère numérique. Ce cours exhaustif vous guidera à travers les différentes facettes du marketing en ligne, de la création de campagnes publicitaires efficaces à l\'utilisation intelligente des médias sociaux. Plongez dans l\'analyse de données pour comprendre les comportements en ligne, perfectionnez vos compétences en référencement pour être visible sur les moteurs de recherche, et explorez les dernières tendances technologiques qui façonnent le paysage du marketing digital. Que vous soyez novice ou professionnel chevronné, ce cours offre les clés pour exceller dans le monde passionnant et évolutif du marketing digital.','OFPPT',NULL,0.0,4,'60 heures','pdfs/Az0zbGx1SrcG2wdBsnWbxqzRoThD308ROw4bKvFu.pdf','2023-12-18 20:26:23','2023-12-18 20:26:23');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domaine_etudes`
--

DROP TABLE IF EXISTS `domaine_etudes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `domaine_etudes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domaine_etudes`
--

LOCK TABLES `domaine_etudes` WRITE;
/*!40000 ALTER TABLE `domaine_etudes` DISABLE KEYS */;
INSERT INTO `domaine_etudes` VALUES (1,'Développement web',NULL,NULL),(2,'Infrastructure digitale',NULL,NULL),(3,'Data science',NULL,NULL),(4,'Marketing digitale',NULL,NULL),(5,'Computer science',NULL,NULL),(6,'Art',NULL,NULL);
/*!40000 ALTER TABLE `domaine_etudes` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2023_12_10_122107_create_posts_table',1),(7,'2023_12_10_122147_create_comments_table',1),(8,'2023_12_10_122645_create_profiles_table',1),(9,'2023_12_10_210733_create_domaine_etudes_table',1),(10,'2023_12_10_210744_create_courses_table',1),(11,'2023_12_11_132911_create_post_likes_table',1),(12,'2023_12_11_999999_add_active_status_to_users',1),(13,'2023_12_11_999999_add_avatar_to_users',1),(14,'2023_12_11_999999_add_dark_mode_to_users',1),(15,'2023_12_11_999999_add_messenger_color_to_users',1),(16,'2023_12_11_999999_create_chatify_favorites_table',1),(17,'2023_12_11_999999_create_chatify_messages_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `post_likes`
--

DROP TABLE IF EXISTS `post_likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_likes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`post_id`),
  KEY `post_likes_post_id_foreign` (`post_id`),
  CONSTRAINT `post_likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `post_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_likes`
--

LOCK TABLES `post_likes` WRITE;
/*!40000 ALTER TABLE `post_likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `likes` int NOT NULL DEFAULT '0',
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (16,'Ces lunettes vous promettent les « superpouvoirs de l’intelligence artificielle »','uploads/pst1.png',1,4,'2024-02-12 08:34:54','2024-02-12 08:38:54'),(17,'Des étudiants s\'entraînent à la cyberguerre avec l\'Armée française','uploads/pst2.png',1,5,'2024-02-12 08:37:45','2024-02-12 08:38:56'),(18,'Les robots ou projets de robotique qui retiennent le plus l’attention de Bill Gates','uploads/pst3.png',0,10,'2024-02-12 08:38:49','2024-02-12 08:38:49');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profiles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utilisateur_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_utilisateur_id_foreign` (`utilisateur_id`),
  CONSTRAINT `profiles_utilisateur_id_foreign` FOREIGN KEY (`utilisateur_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (3,NULL,'photos/cXEyVn3gsES1bNj5IkEw24k4YdvGZj6665YhXAXF.png',3,'2023-12-14 11:47:50','2023-12-18 20:31:40'),(4,NULL,'photos/oQafOR9dnTBFgkoQ2enjbVqs0OgrjaUuUjCMJfd9.png',4,'2023-12-17 10:35:57','2023-12-18 20:31:08'),(5,NULL,'photos/VX6qP9WvN9CH90hZ8W2FBNK6LuUsfnipEP5YvH8X.png',5,'2023-12-18 19:39:21','2023-12-18 20:29:58'),(9,'?','photos/Obvc9QFNsnSnHMC6pHB1CyDOwIEzPKHpPXJxQo7e.png',10,'2024-02-12 06:53:34','2024-02-12 06:53:34');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `date_de_naissance` date DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` int DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '0',
  `messenger_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'Female','Feddaoui','Fatima Ezzahra',0,'2003-06-11','fatifleur','fatimaezzahra@gmail.com','$2y$10$hBsbpEOBiBcU1MbsX65uj.fkwDxtWBb5Qyo7cozTfMEI7dIR0Wzsy','Feddaoui Fatima Ezzahra',NULL,NULL,NULL,NULL,'2023-12-14 11:46:53','2023-12-18 20:31:40',1,'avatar.png',0,NULL),(4,'Male','Labrahmi','Adam',0,'2004-04-30','adamexe','adam@gmail.com','$2y$10$HPENxxFPsdg4nQw.y7PHYue7SlXL2ELOWGcgWP5bOzNlFRLxsDkYi','Labrahmi Adam',NULL,NULL,NULL,NULL,'2023-12-17 10:34:12','2023-12-18 20:31:08',0,'avatar.png',0,NULL),(5,'Male','Mirghany','Yahya',0,'2001-05-08','yahyaexe','yahya@gmail.com','$2y$10$P1yBYamwYlqZDwzlv7RFF.4xiDEPew2tbTjySr4/h1Ds0mfK8mPuW','Mirghany Yahya',NULL,NULL,NULL,NULL,'2023-12-18 19:31:13','2023-12-18 19:31:13',0,'avatar.png',0,NULL),(10,'Male','Bourak','Ali',0,'2005-06-10','aliiexe','ali@gmail.com','$2y$10$twgRgGh32Le7aDAM7mpcw.OZAYQ7R67oobZeTAjcd69F/NmnzZIo.','Bourak Ali',NULL,NULL,NULL,NULL,'2024-02-12 06:52:59','2024-02-12 06:52:59',0,'avatar.png',0,NULL),(12,'Male','Admin','Admin',1,'2004-05-20','admin','admin@isgi.ma','$2y$10$xSwMgo3fF7V6KUUBlAugKeELLlhkoYUITYb3r2fn.SpzK5delmbjK','Admin Admin',NULL,NULL,NULL,NULL,'2024-02-12 08:30:54','2024-02-12 08:30:54',0,'avatar.png',0,NULL);
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

-- Dump completed on 2024-02-12 10:45:44
