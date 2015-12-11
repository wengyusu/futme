-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: meeting
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `star_config`
--

DROP TABLE IF EXISTS `star_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `star_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL DEFAULT '',
  `content` char(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `star_config`
--

LOCK TABLES `star_config` WRITE;
/*!40000 ALTER TABLE `star_config` DISABLE KEYS */;
INSERT INTO `star_config` VALUES (1,'switch','on'),(2,'start_time','1462928400');
/*!40000 ALTER TABLE `star_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `star_joiner`
--

DROP TABLE IF EXISTS `star_joiner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `star_joiner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '',
  `school_id` int(10) unsigned NOT NULL DEFAULT '0',
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `login_time` varchar(30) NOT NULL DEFAULT '',
  `lock` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `other` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `star_joiner`
--

LOCK TABLES `star_joiner` WRITE;
/*!40000 ALTER TABLE `star_joiner` DISABLE KEYS */;
INSERT INTO `star_joiner` VALUES (1,'何佳',1,0,'',0,1),(3,'徐岩',3,0,'',0,1),(4,'张媛媛',4,0,'',0,1),(5,'杨茂',5,1,'1449410258000',0,1),(6,'李琳',6,0,'',0,1),(7,'王纲',7,0,'',0,1),(8,'雷颖',8,0,'',0,1),(9,'李花',9,0,'',0,1),(10,'张琼',10,0,'',0,1),(11,'张泽宝',11,0,'',0,1),(12,'张均强',12,0,'',0,1),(13,'谢继华',13,0,'',0,1),(14,'文学',14,0,'',0,1),(15,'吴满意',15,0,'',0,1),(16,'万丽娟',16,0,'',0,1),(17,'杜辉',28,0,'',0,1),(18,'李孟',18,0,'',0,1),(19,'何琪蕾',19,0,'',0,1),(20,'吴祖峰',20,0,'',0,1),(21,'石忠国',21,0,'',0,1),(22,'黄海',22,0,'',0,1),(23,'张智',23,0,'',0,1),(24,'尹彤',23,0,'',0,1),(25,'李晔',24,0,'',0,1),(26,'王军',25,1,'1448000635',0,1),(27,'李文远',26,0,'',0,1),(28,'夏阳',27,1,'1448001860',0,1),(29,'申小蓉',32,1,'1462926600',1,1),(30,'于乐',28,1,'1462926600',1,1),(31,'吴绪红',28,1,'1449409685000',0,1),(32,'刘惠',28,1,'1449401886000',0,1),(33,'李媛',28,0,'',0,1),(34,'张军',29,1,'1447986338',0,1),(35,'武佳',30,1,'1447994744',0,1),(36,'李阳',31,0,'',0,1),(37,'郭志勇',2,0,'',0,1),(39,'蔡明均',24,0,'',0,1),(40,'于梅子',27,0,'',0,1),(41,'汪利辉',31,0,'',0,1),(38,'杨直凡',17,0,'',0,1),(42,'娄春伟',33,0,'',0,1);
/*!40000 ALTER TABLE `star_joiner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `star_school`
--

DROP TABLE IF EXISTS `star_school`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `star_school` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school` char(20) NOT NULL DEFAULT '',
  `order_num` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `star_school`
--

LOCK TABLES `star_school` WRITE;
/*!40000 ALTER TABLE `star_school` DISABLE KEYS */;
INSERT INTO `star_school` VALUES (1,'英才实验学院',6),(2,'通信与信息工程学院',7),(3,'电子工程学院',8),(4,'微电子与固体电子学院',9),(5,'物理电子学院',10),(6,'光电信息学院',11),(7,'计算机科学与工程学院',12),(8,'自动化工程学院',13),(9,'机械电子工程学院',14),(10,'生命科学与技术学院',15),(11,'数学科学学院',16),(12,'经济与管理学院',17),(13,'政治与公共管理学院',18),(14,'外国语学院',19),(15,'马克思主义教育学院',25),(16,'能源科学与工程学院',20),(17,'资源与环境学院',21),(18,'航空航天学院',22),(19,'格拉斯哥学院',23),(20,'信息与软件工程学院',24),(21,'电子科学技术研究院',26),(22,'通信抗干扰技术国家级重点实验室',27),(23,'成都学院',29),(24,'国际教育学院',28),(25,'继续教育学院（沙河校区）',32),(26,'继续教育学院（九里堤校区）',31),(27,'医学院',30),(28,'党委学生工作部',2),(29,'校团委',4),(30,'学生宿舍管理中心',5),(31,'党委研究生工作部',3),(32,'学校党委',1),(33,'创新创业学院',0);
/*!40000 ALTER TABLE `star_school` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `star_user`
--

DROP TABLE IF EXISTS `star_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `star_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `login_time` int(10) unsigned NOT NULL,
  `login_ip` varchar(30) NOT NULL,
  `lock` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `star_user`
--

LOCK TABLES `star_user` WRITE;
/*!40000 ALTER TABLE `star_user` DISABLE KEYS */;
INSERT INTO `star_user` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3',1449247452,'127.0.0.1',0),(2,'watcher','e10adc3949ba59abbe56e057f20f883e',1427696224,'202.115.22.5',2);
/*!40000 ALTER TABLE `star_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-06 22:10:05
