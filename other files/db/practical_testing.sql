/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.1.47-MariaDB-0ubuntu0.18.04.1 : Database - admin_testing
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`admin_testing` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `admin_testing`;

/*Table structure for table `admin_password_resets` */

DROP TABLE IF EXISTS `admin_password_resets`;

CREATE TABLE `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `admin_password_resets_email_index` (`email`),
  KEY `admin_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admin_password_resets` */

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `api_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_id` bigint(20) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `staff_id` bigint(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_USER_DESG_ID` (`designation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`,`api_token`,`designation_id`,`username`,`staff_id`,`status`) values 
(1,'admin','admin@gmail.com','$2y$10$W2GQw.i/wHFLvNonh.mDAOLl.bjKankt65ydUDX8FMrvGcvOfnYny','BU1rNy8WuCUyoFR0t7oqRoEHy46rIFgpiHDD4BY3nL1AmYe3VQNnoPrrst8B','2018-06-27 15:52:03','2018-12-10 16:23:00','rpluQ0Jwrq7U0pbDvs7QtoS60GNVICjmA87LZfN0E0w2jEl3xHwqHxAbVgfc',1,'admin@gmail.com',NULL,1);

/*Table structure for table `member_password_resets` */

DROP TABLE IF EXISTS `member_password_resets`;

CREATE TABLE `member_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `member_password_resets_email_index` (`email`),
  KEY `member_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `member_password_resets` */

/*Table structure for table `members` */

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `provider` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `members_email_unique` (`email`),
  KEY `members_students_id_fk` (`reference_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `members` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1);

/*Table structure for table `specification` */

DROP TABLE IF EXISTS `specification`;

CREATE TABLE `specification` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `terminology_id` bigint(20) DEFAULT NULL,
  `car_name` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `milage` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `specification` */

insert  into `specification`(`id`,`terminology_id`,`car_name`,`model`,`price`,`color`,`milage`,`photo`,`created_at`,`updated_at`) values 
(1,3,'Alto','2010','50000','White','20','product-3-720x480.jpg','2021-02-10 11:52:56','2021-02-10 11:52:56'),
(3,1,'Amaze','2016','500000','Blue','25','product-6-720x480.jpg','2021-02-10 13:01:10','2021-02-10 13:01:10');

/*Table structure for table `terminologies` */

DROP TABLE IF EXISTS `terminologies`;

CREATE TABLE `terminologies` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `terminologies` */

insert  into `terminologies`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'Honda','2021-02-10 09:47:59','2021-02-10 09:47:59'),
(3,'Nexa','2021-02-10 09:54:03','2021-02-10 09:54:03');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
