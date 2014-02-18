/*
SQLyog v10.2 
MySQL - 5.0.51b-community-nt : Database - test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`test` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `test`;

/*Table structure for table `test` */

DROP TABLE IF EXISTS `test`;

CREATE TABLE `test` (
  `a` bigint(20) unsigned NOT NULL auto_increment,
  `b` varchar(63) collate utf8_unicode_ci NOT NULL,
  `c` varchar(63) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`a`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `test` */

insert  into `test`(`a`,`b`,`c`) values (1,'2','3');
insert  into `test`(`a`,`b`,`c`) values (2,'中文','撒的发生');
insert  into `test`(`a`,`b`,`c`) values (3,'中文','撒的发生');
insert  into `test`(`a`,`b`,`c`) values (4,'中文','撒的发生');
insert  into `test`(`a`,`b`,`c`) values (5,'中文','撒的发生');
insert  into `test`(`a`,`b`,`c`) values (6,'中文','撒的发生');
insert  into `test`(`a`,`b`,`c`) values (7,'中文','撒的发生');
insert  into `test`(`a`,`b`,`c`) values (8,'中文','撒的发生');

/*Table structure for table `test2` */

DROP TABLE IF EXISTS `test2`;

CREATE TABLE `test2` (
  `a` bigint(20) default NULL,
  `b` varchar(63) collate utf8_unicode_ci default NULL,
  `c` varchar(63) collate utf8_unicode_ci default NULL,
  UNIQUE KEY `idx_a` (`a`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `test2` */

insert  into `test2`(`a`,`b`,`c`) values (62,'64','128');
insert  into `test2`(`a`,`b`,`c`) values (84,'中文','撒的发生');
insert  into `test2`(`a`,`b`,`c`) values (85,'中文','撒的发生');
insert  into `test2`(`a`,`b`,`c`) values (86,'中文','撒的发生');
insert  into `test2`(`a`,`b`,`c`) values (87,'中文','撒的发生');
insert  into `test2`(`a`,`b`,`c`) values (88,'中文','撒的发生');
insert  into `test2`(`a`,`b`,`c`) values (89,'中文','撒的发生');
insert  into `test2`(`a`,`b`,`c`) values (90,'中文','撒的发生');
insert  into `test2`(`a`,`b`,`c`) values (91,'中文','撒的发生');
insert  into `test2`(`a`,`b`,`c`) values (92,'中文','撒的发生');
insert  into `test2`(`a`,`b`,`c`) values (93,'中文','撒的发生');
insert  into `test2`(`a`,`b`,`c`) values (94,'中文','撒的发生');
insert  into `test2`(`a`,`b`,`c`) values (95,'中文','撒的发生');
insert  into `test2`(`a`,`b`,`c`) values (96,'中文','撒的发生');
insert  into `test2`(`a`,`b`,`c`) values (97,'中文','撒的发生');
insert  into `test2`(`a`,`b`,`c`) values (98,'中文','撒的发生');
insert  into `test2`(`a`,`b`,`c`) values (99,'中文','还是中文');
insert  into `test2`(`a`,`b`,`c`) values (100,'中文','还是中文');
insert  into `test2`(`a`,`b`,`c`) values (101,'中文','还是中文');
insert  into `test2`(`a`,`b`,`c`) values (102,'中文','还是中文');
insert  into `test2`(`a`,`b`,`c`) values (103,'中文','还是中文');
insert  into `test2`(`a`,`b`,`c`) values (2,'中文','还是中文');
insert  into `test2`(`a`,`b`,`c`) values (3,'中文','还是中文');
insert  into `test2`(`a`,`b`,`c`) values (4,'中文','还是中文');
insert  into `test2`(`a`,`b`,`c`) values (5,'中文','还是中文');
insert  into `test2`(`a`,`b`,`c`) values (6,'中文','还是中文');
insert  into `test2`(`a`,`b`,`c`) values (7,'中文','还是中文');
insert  into `test2`(`a`,`b`,`c`) values (8,'中文','还是中文');

/*Table structure for table `test3` */

DROP TABLE IF EXISTS `test3`;

CREATE TABLE `test3` (
  `a` bigint(20) unsigned NOT NULL,
  `b` bigint(20) default NULL,
  `c` bigint(20) default NULL,
  PRIMARY KEY  (`a`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `test3` */

insert  into `test3`(`a`,`b`,`c`) values (1,8770,4);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
