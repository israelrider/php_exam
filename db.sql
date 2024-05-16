/*
SQLyog Trial v13.1.9 (64 bit)
MySQL - 8.0.23 : Database - exam
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`exam` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `exam`;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`email`,`phone_number`,`url`,`birthdate`) values 
(13,'2','a','a@a','1','http://xyu.com','2024-05-17'),
(14,'3','a','a@a','1','http://xyu.com','2024-05-17'),
(15,'4','a','a@a','1','http://xyu.com','2024-05-17'),
(16,'5','a','a@a','1','http://xyu.com','2024-05-17'),
(17,'6','a','a@a','1','http://xyu.com','2024-05-17'),
(18,'a','a','a@a','1','http://xyu.com','2024-05-17'),
(19,'a','a','a@a','1','http://xyu.com','2024-05-17'),
(20,'a','a','a@a','1','http://xyu.com','2024-05-17'),
(21,'a','a','a@a','1','http://xyu.com','2024-05-17'),
(22,'a','a','a@a','1','http://xyu.com','2024-05-17'),
(23,'a','a','a@a','1','http://xyu.com','2024-05-17'),
(24,'a','a','a@a','1','http://xyu.com','2024-05-17'),
(25,'a','a','a@a','1','http://xyu.com','2024-05-17'),
(27,'a','a','a@a','1','http://xyu.com','2024-05-17'),
(28,'bbb','Aa&aaaaa','a@a.a','1111111111','http://xyu.com','2024-05-17'),
(29,'cccccccccccccccccc','Aa&aaaaa','a@a.a','1111111111','http://xyu.com','2024-05-17'),
(30,'cccccccccccccccccc','Aa&aaaaa','cccccccccccccccccc@a.a','1111111111','http://xyu.com','2024-05-17');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
