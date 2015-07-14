-- MySQL dump 10.13  Distrib 5.6.20, for osx10.8 (x86_64)
--
-- Host: localhost    Database: digital
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `idaddress` bigint(20) NOT NULL AUTO_INCREMENT,
  `city` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `street` varchar(255) DEFAULT NULL,
  `number` varchar(45) DEFAULT NULL,
  `complement` varchar(255) DEFAULT NULL,
  `zipcode` varchar(45) DEFAULT NULL,
  `otherinformation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idaddress`),
  KEY `fk_address_contact1` (`contact`),
  KEY `fk_adress_city_idx` (`city`),
  CONSTRAINT `fk_address_contact1` FOREIGN KEY (`contact`) REFERENCES `contact` (`idcontact`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_adress_city` FOREIGN KEY (`city`) REFERENCES `city` (`idcity`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (1,3,1,'rua guarani ','485','ap 62','01123040','');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `idcity` int(11) NOT NULL AUTO_INCREMENT,
  `state` int(11) NOT NULL,
  `institution` int(11) DEFAULT NULL,
  `citypublic` bit(1) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `citycode` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcity`),
  KEY `fk_city_state1` (`state`),
  KEY `fk_city_institution1` (`institution`),
  CONSTRAINT `fk_city_institution1` FOREIGN KEY (`institution`) REFERENCES `institution` (`idinstitution`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_city_state1` FOREIGN KEY (`state`) REFERENCES `state` (`idstate`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (3,8,26,'\0','sao paulo','sp');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `idcontact` int(11) NOT NULL AUTO_INCREMENT,
  `institution` int(11) NOT NULL,
  `iditem` bigint(20) DEFAULT NULL,
  `idexposition` varchar(45) DEFAULT NULL,
  `idholder` varchar(45) DEFAULT NULL,
  `idcreator` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `contactname` varchar(255) DEFAULT NULL,
  `urla` varchar(255) DEFAULT NULL,
  `contactcall` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `identity` varchar(45) DEFAULT NULL,
  `federaltaxcode` varchar(45) DEFAULT NULL,
  `statetaxcode` varchar(45) DEFAULT NULL,
  `countytaxcode` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcontact`),
  KEY `fk_contact_institution1` (`institution`),
  KEY `fk_contact_creator1` (`idcreator`),
  KEY `idx_contact_user` (`user`),
  CONSTRAINT `fk_contact_creator1` FOREIGN KEY (`idcreator`) REFERENCES `creator` (`idcreator`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contact_institution1` FOREIGN KEY (`institution`) REFERENCES `institution` (`idinstitution`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contact_user` FOREIGN KEY (`user`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='email, internet address will  be written in xml on conatctca';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,26,1,'1','1',1,4,'ariane stolfi','','11 982728011','equipe','htpp://ariane.stolfi.org','','','','');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `idcountry` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(145) DEFAULT NULL,
  `countrycode` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcountry`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (2,'brasil','br');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creator`
--

DROP TABLE IF EXISTS `creator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creator` (
  `idcreator` int(11) NOT NULL AUTO_INCREMENT,
  `institution` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `notes` text,
  `birthdate` varchar(45) DEFAULT NULL,
  `deathdate` varchar(45) DEFAULT NULL,
  `nationality` varchar(45) DEFAULT NULL,
  `maincontact` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcreator`),
  KEY `fk_creator_institution1` (`institution`),
  CONSTRAINT `fk_creator_institution1` FOREIGN KEY (`institution`) REFERENCES `institution` (`idinstitution`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='describes creator, publisher, contributors, etc\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creator`
--

LOCK TABLES `creator` WRITE;
/*!40000 ALTER TABLE `creator` DISABLE KEYS */;
INSERT INTO `creator` VALUES (1,26,'admin','ariane stolfi','','','','','arianestolfi@gmail.com'),(2,28,'autor','augusto de campos','','','','',''),(3,28,'editor','erthos albino de souza','','','','','erthos sobrinho');
/*!40000 ALTER TABLE `creator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creator_award_honour`
--

DROP TABLE IF EXISTS `creator_award_honour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creator_award_honour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  `grantedby` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creator_award_honour`
--

LOCK TABLES `creator_award_honour` WRITE;
/*!40000 ALTER TABLE `creator_award_honour` DISABLE KEYS */;
INSERT INTO `creator_award_honour` VALUES (1,'premio pablo neruda','chile','poeta','premio');
/*!40000 ALTER TABLE `creator_award_honour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creator_contact`
--

DROP TABLE IF EXISTS `creator_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creator_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `contact` int(11) NOT NULL,
  `creator` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_creatorcontact_creator` (`creator`),
  KEY `fk_creatorcontact_contact_idx` (`contact`),
  CONSTRAINT `fk_creatorcontact_contact` FOREIGN KEY (`contact`) REFERENCES `contact` (`idcontact`),
  CONSTRAINT `fk_creatorcontact_creator` FOREIGN KEY (`creator`) REFERENCES `creator` (`idcreator`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creator_contact`
--

LOCK TABLES `creator_contact` WRITE;
/*!40000 ALTER TABLE `creator_contact` DISABLE KEYS */;
INSERT INTO `creator_contact` VALUES (1,'',1,1);
/*!40000 ALTER TABLE `creator_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creator_history`
--

DROP TABLE IF EXISTS `creator_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creator_history` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `history` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_kv28ykd90gnj9a3ika7vvbsib` (`creator`),
  KEY `fk_creatorhistory` (`history`),
  CONSTRAINT `FK_kv28ykd90gnj9a3ika7vvbsib` FOREIGN KEY (`creator`) REFERENCES `creator` (`idcreator`),
  CONSTRAINT `fk_creatorhistory` FOREIGN KEY (`history`) REFERENCES `nhistory` (`idhistory`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creator_history`
--

LOCK TABLES `creator_history` WRITE;
/*!40000 ALTER TABLE `creator_history` DISABLE KEYS */;
INSERT INTO `creator_history` VALUES (1,'',1,1);
/*!40000 ALTER TABLE `creator_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creator_reference`
--

DROP TABLE IF EXISTS `creator_reference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creator_reference` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `creator` int(11) NOT NULL,
  `reference` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ly7e216u77lqiatnysrm1um6` (`creator`),
  KEY `FK_r7ovmckudaqk0px6wtotfyy8c` (`reference`),
  CONSTRAINT `FK_ly7e216u77lqiatnysrm1um6` FOREIGN KEY (`creator`) REFERENCES `creator` (`idcreator`),
  CONSTRAINT `FK_r7ovmckudaqk0px6wtotfyy8c` FOREIGN KEY (`reference`) REFERENCES `nreference` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creator_reference`
--

LOCK TABLES `creator_reference` WRITE;
/*!40000 ALTER TABLE `creator_reference` DISABLE KEYS */;
INSERT INTO `creator_reference` VALUES (1,'site',2,1);
/*!40000 ALTER TABLE `creator_reference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creatorname`
--

DROP TABLE IF EXISTS `creatorname`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creatorname` (
  `idcreatorname` int(11) NOT NULL AUTO_INCREMENT,
  `creator` int(11) NOT NULL,
  `naname` varchar(60) DEFAULT NULL,
  `type` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idcreatorname`),
  KEY `fk_creatorname_creator_idx` (`creator`),
  CONSTRAINT `fk_creatorname_creator` FOREIGN KEY (`creator`) REFERENCES `creator` (`idcreator`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creatorname`
--

LOCK TABLES `creatorname` WRITE;
/*!40000 ALTER TABLE `creatorname` DISABLE KEYS */;
INSERT INTO `creatorname` VALUES (1,2,'augusto de campos','nome');
/*!40000 ALTER TABLE `creatorname` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dimension`
--

DROP TABLE IF EXISTS `dimension`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dimension` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(25) DEFAULT NULL,
  `value` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dimension`
--

LOCK TABLES `dimension` WRITE;
/*!40000 ALTER TABLE `dimension` DISABLE KEYS */;
INSERT INTO `dimension` VALUES (1,'pg','34'),(2,'revistas','12');
/*!40000 ALTER TABLE `dimension` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentation`
--

DROP TABLE IF EXISTS `documentation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentation` (
  `iddocumentation` bigint(20) NOT NULL AUTO_INCREMENT,
  `item` bigint(20) NOT NULL,
  `institution` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`iddocumentation`),
  KEY `fk_document_item1` (`item`),
  KEY `fk_documentation_institution1` (`institution`),
  CONSTRAINT `fk_document_item1` FOREIGN KEY (`item`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_documentation_institution1` FOREIGN KEY (`institution`) REFERENCES `institution` (`idinstitution`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='to include any kind of item''s related documents (certificate';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentation`
--

LOCK TABLES `documentation` WRITE;
/*!40000 ALTER TABLE `documentation` DISABLE KEYS */;
INSERT INTO `documentation` VALUES (1,1,28,'grafica','gráfica bureau','salvador bahia');
/*!40000 ALTER TABLE `documentation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentation_media`
--

DROP TABLE IF EXISTS `documentation_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentation_media` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `documentation_iddocumentation` bigint(20) NOT NULL,
  `medias_idmedia` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_documentationmedia_media_idx` (`medias_idmedia`),
  KEY `fk_documentationmedia_documentation` (`documentation_iddocumentation`),
  CONSTRAINT `FK_documentationmedia_documentation` FOREIGN KEY (`documentation_iddocumentation`) REFERENCES `documentation` (`iddocumentation`),
  CONSTRAINT `FK_documentationmedia_media` FOREIGN KEY (`medias_idmedia`) REFERENCES `media` (`idmedia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentation_media`
--

LOCK TABLES `documentation_media` WRITE;
/*!40000 ALTER TABLE `documentation_media` DISABLE KEYS */;
INSERT INTO `documentation_media` VALUES (1,1,1);
/*!40000 ALTER TABLE `documentation_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expoitem`
--

DROP TABLE IF EXISTS `expoitem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expoitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` bigint(20) NOT NULL,
  `exposition` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_expoitem_item` (`item`),
  KEY `fk_expoitem_exposition` (`exposition`),
  CONSTRAINT `fk_expoitem_exposition` FOREIGN KEY (`exposition`) REFERENCES `exposition` (`idexposition`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_expoitem_item` FOREIGN KEY (`item`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expoitem`
--

LOCK TABLES `expoitem` WRITE;
/*!40000 ALTER TABLE `expoitem` DISABLE KEYS */;
INSERT INTO `expoitem` VALUES (1,1,1,'revista'),(2,2,1,'revista'),(3,3,1,'expoitem');
/*!40000 ALTER TABLE `expoitem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exposition`
--

DROP TABLE IF EXISTS `exposition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exposition` (
  `idexposition` int(11) NOT NULL AUTO_INCREMENT,
  `institution` int(11) NOT NULL,
  `location` varchar(45) DEFAULT NULL,
  `curator` text,
  `initialdate` varchar(45) DEFAULT NULL,
  `enddate` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `notes` text,
  `name` varchar(250) DEFAULT NULL,
  `exposubtype` varchar(250) DEFAULT NULL,
  `expotype` varchar(250) DEFAULT NULL,
  `iscarriedbyotherinstitution` bit(1) DEFAULT NULL,
  `isinternational` bit(1) DEFAULT NULL,
  `otherinfo` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idexposition`),
  KEY `fk_exposition_institution1` (`institution`),
  CONSTRAINT `fk_exposition_institution1` FOREIGN KEY (`institution`) REFERENCES `institution` (`idinstitution`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='to describes the expositions any item was part of and any co';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exposition`
--

LOCK TABLES `exposition` WRITE;
/*!40000 ALTER TABLE `exposition` DISABLE KEYS */;
INSERT INTO `exposition` VALUES (1,26,'online','equipe','','','','','extra codigo','','','\0','\0','');
/*!40000 ALTER TABLE `exposition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exposition_creator`
--

DROP TABLE IF EXISTS `exposition_creator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exposition_creator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attributed` bit(1) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `creator` int(11) NOT NULL,
  `exposition` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_rqs393faxa7qvmarkbh38rhay` (`creator`),
  KEY `FK_kwh7ariugb0qjrwhpo3rai1uy` (`exposition`),
  CONSTRAINT `FK_kwh7ariugb0qjrwhpo3rai1uy` FOREIGN KEY (`exposition`) REFERENCES `exposition` (`idexposition`),
  CONSTRAINT `FK_rqs393faxa7qvmarkbh38rhay` FOREIGN KEY (`creator`) REFERENCES `creator` (`idcreator`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exposition_creator`
--

LOCK TABLES `exposition_creator` WRITE;
/*!40000 ALTER TABLE `exposition_creator` DISABLE KEYS */;
INSERT INTO `exposition_creator` VALUES (1,'\0','','1',1,1);
/*!40000 ALTER TABLE `exposition_creator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exposition_dimension`
--

DROP TABLE IF EXISTS `exposition_dimension`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exposition_dimension` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL,
  `dimension` int(11) DEFAULT NULL,
  `exposition` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_69we0kulo49s1sr97htshsxtw` (`dimension`),
  KEY `FK_ai09pidrxa780uxmakwlex92c` (`exposition`),
  CONSTRAINT `FK_69we0kulo49s1sr97htshsxtw` FOREIGN KEY (`dimension`) REFERENCES `dimension` (`id`),
  CONSTRAINT `FK_ai09pidrxa780uxmakwlex92c` FOREIGN KEY (`exposition`) REFERENCES `exposition` (`idexposition`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exposition_dimension`
--

LOCK TABLES `exposition_dimension` WRITE;
/*!40000 ALTER TABLE `exposition_dimension` DISABLE KEYS */;
INSERT INTO `exposition_dimension` VALUES (1,'numeros',2,1);
/*!40000 ALTER TABLE `exposition_dimension` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exposition_history`
--

DROP TABLE IF EXISTS `exposition_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exposition_history` (
  `idhistory` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `idexposition` int(11) DEFAULT NULL,
  `history` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`idhistory`),
  KEY `FK_g6g5n45iyajyahsp1dfaeff4b` (`idexposition`),
  KEY `FK_sfxtpv6nypctjcamcjgov1etg` (`history`),
  CONSTRAINT `FK_g6g5n45iyajyahsp1dfaeff4b` FOREIGN KEY (`idexposition`) REFERENCES `exposition` (`idexposition`),
  CONSTRAINT `FK_sfxtpv6nypctjcamcjgov1etg` FOREIGN KEY (`history`) REFERENCES `nhistory` (`idhistory`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exposition_history`
--

LOCK TABLES `exposition_history` WRITE;
/*!40000 ALTER TABLE `exposition_history` DISABLE KEYS */;
INSERT INTO `exposition_history` VALUES (1,'meta',1,1);
/*!40000 ALTER TABLE `exposition_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exposition_placelocation`
--

DROP TABLE IF EXISTS `exposition_placelocation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exposition_placelocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `placelocation` bigint(20) DEFAULT NULL,
  `exposition` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anby2ek1hm7l0n2v7s11ajdmj` (`contact`),
  KEY `FK_k75vo2tl0yd87up64gkti5kpf` (`placelocation`),
  KEY `FK_eidy94mayop8hv1jwy5rjt3p7` (`exposition`),
  CONSTRAINT `FK_anby2ek1hm7l0n2v7s11ajdmj` FOREIGN KEY (`contact`) REFERENCES `contact` (`idcontact`),
  CONSTRAINT `FK_eidy94mayop8hv1jwy5rjt3p7` FOREIGN KEY (`exposition`) REFERENCES `exposition` (`idexposition`),
  CONSTRAINT `FK_k75vo2tl0yd87up64gkti5kpf` FOREIGN KEY (`placelocation`) REFERENCES `place_location` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exposition_placelocation`
--

LOCK TABLES `exposition_placelocation` WRITE;
/*!40000 ALTER TABLE `exposition_placelocation` DISABLE KEYS */;
INSERT INTO `exposition_placelocation` VALUES (1,'',1,1,1);
/*!40000 ALTER TABLE `exposition_placelocation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exposition_reference`
--

DROP TABLE IF EXISTS `exposition_reference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exposition_reference` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `exposition` int(11) DEFAULT NULL,
  `reference` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_1v8ywvb944diagioy8oulgjfi` (`exposition`),
  KEY `FK_bn9yeqjkv398d64fdibt6jbys` (`reference`),
  CONSTRAINT `FK_1v8ywvb944diagioy8oulgjfi` FOREIGN KEY (`exposition`) REFERENCES `exposition` (`idexposition`),
  CONSTRAINT `FK_bn9yeqjkv398d64fdibt6jbys` FOREIGN KEY (`reference`) REFERENCES `nreference` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exposition_reference`
--

LOCK TABLES `exposition_reference` WRITE;
/*!40000 ALTER TABLE `exposition_reference` DISABLE KEYS */;
INSERT INTO `exposition_reference` VALUES (1,'',1,2);
/*!40000 ALTER TABLE `exposition_reference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fond`
--

DROP TABLE IF EXISTS `fond`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fond` (
  `idfond` int(11) NOT NULL AUTO_INCREMENT,
  `institution` int(11) NOT NULL,
  `fond` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `otherinformation` varchar(255) DEFAULT NULL,
  `countitem` int(11) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idfond`),
  KEY `fk_fond_institution1` (`institution`),
  CONSTRAINT `fk_fond_institution1` FOREIGN KEY (`institution`) REFERENCES `institution` (`idinstitution`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fond`
--

LOCK TABLES `fond` WRITE;
/*!40000 ALTER TABLE `fond` DISABLE KEYS */;
INSERT INTO `fond` VALUES (1,28,'revistas código','','',12,'serie'),(2,26,'extra codigo','','',12,'infos');
/*!40000 ALTER TABLE `fond` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fond_level`
--

DROP TABLE IF EXISTS `fond_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fond_level` (
  `idfondlevel` int(11) NOT NULL AUTO_INCREMENT,
  `fond_idfond` int(11) NOT NULL,
  `levels_idlevel` int(11) NOT NULL,
  PRIMARY KEY (`idfondlevel`),
  KEY `fk_fondlevel_level` (`levels_idlevel`),
  KEY `fk_fondlevel_fond` (`fond_idfond`),
  CONSTRAINT `fk_fondlevel_fond` FOREIGN KEY (`fond_idfond`) REFERENCES `fond` (`idfond`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_fondlevel_level` FOREIGN KEY (`levels_idlevel`) REFERENCES `level` (`idlevel`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fond_level`
--

LOCK TABLES `fond_level` WRITE;
/*!40000 ALTER TABLE `fond_level` DISABLE KEYS */;
INSERT INTO `fond_level` VALUES (1,1,1);
/*!40000 ALTER TABLE `fond_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `actor` varchar(45) DEFAULT NULL,
  `item` bigint(20) NOT NULL,
  `institution` int(11) NOT NULL,
  `idexposition` varchar(45) DEFAULT NULL,
  `cost` decimal(12,2) DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `isPublic` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_history_item1` (`item`),
  KEY `fk_history_institution1` (`institution`),
  KEY `idx_history_creator` (`creator`),
  CONSTRAINT `fk_history_creator` FOREIGN KEY (`creator`) REFERENCES `creator` (`idcreator`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_history_institution1` FOREIGN KEY (`institution`) REFERENCES `institution` (`idinstitution`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_history_item1` FOREIGN KEY (`item`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='this table is intend to be use as a repository for any kind ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (1,'data','lançamento','1974','erthos albino',1,28,'1',1000.00,3,'\0');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history_media`
--

DROP TABLE IF EXISTS `history_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history_media` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `history_idhistory` bigint(20) NOT NULL,
  `medias_idmedia` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_historymedia_media_idx` (`medias_idmedia`),
  KEY `fk_historymedia_history_idx` (`history_idhistory`),
  CONSTRAINT `fk_historymedia_history` FOREIGN KEY (`history_idhistory`) REFERENCES `history` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_historymedia_media` FOREIGN KEY (`medias_idmedia`) REFERENCES `media` (`idmedia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history_media`
--

LOCK TABLES `history_media` WRITE;
/*!40000 ALTER TABLE `history_media` DISABLE KEYS */;
INSERT INTO `history_media` VALUES (1,1,1);
/*!40000 ALTER TABLE `history_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `holder`
--

DROP TABLE IF EXISTS `holder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `holder` (
  `idholder` int(11) NOT NULL AUTO_INCREMENT,
  `institution` int(11) DEFAULT NULL,
  `holder` varchar(255) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`idholder`),
  KEY `fk_holder_institution1` (`institution`),
  CONSTRAINT `fk_holder_institution1` FOREIGN KEY (`institution`) REFERENCES `institution` (`idinstitution`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `holder`
--

LOCK TABLES `holder` WRITE;
/*!40000 ALTER TABLE `holder` DISABLE KEYS */;
INSERT INTO `holder` VALUES (4,26,'daniel scandurra','');
/*!40000 ALTER TABLE `holder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infobjectfond`
--

DROP TABLE IF EXISTS `infobjectfond`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infobjectfond` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fond` int(11) NOT NULL,
  `item` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_fironk10lq67q4j0a3oue8ldg` (`fond`),
  KEY `FK_k77kiqsk4fg0wh48h5adn2x67` (`item`),
  CONSTRAINT `FK_fironk10lq67q4j0a3oue8ldg` FOREIGN KEY (`fond`) REFERENCES `fond` (`idfond`),
  CONSTRAINT `FK_k77kiqsk4fg0wh48h5adn2x67` FOREIGN KEY (`item`) REFERENCES `item` (`iditem`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infobjectfond`
--

LOCK TABLES `infobjectfond` WRITE;
/*!40000 ALTER TABLE `infobjectfond` DISABLE KEYS */;
INSERT INTO `infobjectfond` VALUES (1,1,1),(2,1,2),(3,1,3);
/*!40000 ALTER TABLE `infobjectfond` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institution`
--

DROP TABLE IF EXISTS `institution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `institution` (
  `idinstitution` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `uri` varchar(45) DEFAULT NULL,
  `otherinformation` varchar(255) DEFAULT NULL,
  `code` varchar(8) DEFAULT NULL,
  `timezone` int(11) DEFAULT NULL,
  `thumbnail` blob,
  PRIMARY KEY (`idinstitution`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institution`
--

LOCK TABLES `institution` WRITE;
/*!40000 ALTER TABLE `institution` DISABLE KEYS */;
INSERT INTO `institution` VALUES (26,'equipe','equipe projeto rumos','','','',1,''),(27,'itaú cultural','','','','',1,''),(28,'revista codigo','','','','',1,'');
/*!40000 ALTER TABLE `institution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institution_media`
--

DROP TABLE IF EXISTS `institution_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `institution_media` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `institution_idinstitution` int(11) NOT NULL,
  `medias_idmedia` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_institutionmedia_media_idx` (`medias_idmedia`),
  KEY `fk_institutionmedia_institution_idx` (`institution_idinstitution`),
  CONSTRAINT `fk_institutionmedia_institution` FOREIGN KEY (`institution_idinstitution`) REFERENCES `institution` (`idinstitution`),
  CONSTRAINT `fk_institutionmedia_media` FOREIGN KEY (`medias_idmedia`) REFERENCES `media` (`idmedia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institution_media`
--

LOCK TABLES `institution_media` WRITE;
/*!40000 ALTER TABLE `institution_media` DISABLE KEYS */;
INSERT INTO `institution_media` VALUES (1,28,1);
/*!40000 ALTER TABLE `institution_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `iditem` bigint(20) NOT NULL AUTO_INCREMENT,
  `holder` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `institution` int(11) NOT NULL,
  `inventoryid` varchar(45) DEFAULT NULL,
  `uritype` varchar(45) DEFAULT NULL,
  `uri` varchar(45) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` text,
  `uidtype` varchar(45) DEFAULT NULL,
  `uid` varchar(45) DEFAULT NULL,
  `class` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `iseletronic` bit(1) DEFAULT NULL,
  `creationdate` varchar(45) DEFAULT NULL,
  `acquisitiondate` varchar(45) DEFAULT NULL,
  `scopecontent` text,
  `originalexistence` bit(1) DEFAULT NULL,
  `originallocation` varchar(255) DEFAULT NULL,
  `repositorycode` varchar(45) DEFAULT NULL,
  `copyexistence` bit(1) DEFAULT NULL,
  `copylocation` varchar(255) DEFAULT NULL,
  `legalaccess` varchar(45) DEFAULT NULL,
  `accesscondition` varchar(45) DEFAULT NULL,
  `reproductionrights` varchar(45) DEFAULT NULL,
  `reproductionrightsdescription` text,
  `itemdate` varchar(45) DEFAULT NULL,
  `publishdate` varchar(45) DEFAULT NULL,
  `publisher` varchar(250) DEFAULT NULL,
  `itematributes` text,
  `ispublic` bit(1) DEFAULT NULL,
  `preliminaryrule` text,
  `punctuation` varchar(45) DEFAULT NULL,
  `notes` text,
  `otherinformation` text,
  `idfather` bigint(20) DEFAULT NULL,
  `titledefault` varchar(250) DEFAULT NULL,
  `subitem` tinyint(4) DEFAULT NULL,
  `deletecomfirm` bit(1) DEFAULT NULL,
  `typeitem` tinyint(4) DEFAULT NULL,
  `edition` varchar(250) DEFAULT NULL,
  `isexposed` bit(1) DEFAULT NULL,
  `isoriginal` bit(1) DEFAULT NULL,
  `ispart` bit(1) DEFAULT NULL,
  `haspart` bit(1) DEFAULT NULL,
  `ispartof` varchar(45) DEFAULT NULL,
  `numberofcopies` int(11) DEFAULT NULL,
  `tobepublicin` date DEFAULT NULL,
  `creationdateattributed` bit(1) DEFAULT NULL,
  `itemdateattributed` bit(1) DEFAULT NULL,
  `publishdateattributed` bit(1) DEFAULT NULL,
  `serachdump` text,
  `itemmediadir` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`iditem`),
  KEY `fk_item_holder1` (`holder`),
  KEY `fk_item_institution1` (`institution`),
  KEY `fk_item_level` (`level`),
  CONSTRAINT `fk_item_holder1` FOREIGN KEY (`holder`) REFERENCES `holder` (`idholder`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_institution1` FOREIGN KEY (`institution`) REFERENCES `institution` (`idinstitution`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_level` FOREIGN KEY (`level`) REFERENCES `level` (`idlevel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='object properties will be written in xml on physicaldescript';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,4,1,28,'codigo01','','codigo01','revista código 1 poesia concreta vanguarda','revista código número 1','','','pequena','revista','\0','1974','','','\0','','','\0','','1','','1','','','','','','\0','','','','',0,'código 1',1,'\0',1,'1a','\0','\0','\0','\0','revistas código',1000,'2015-07-13','\0','\0','\0','','codigo01'),(2,4,1,28,'codigo02','','','revista codigo 2 poesia concreta','lombada quadrada, impressão p/b','','','padrao','revista','\0','','','','\0','','','\0','','','','','','','','','','\0','','','','',1,'',1,'\0',1,'','\0','\0','\0','\0','',1000,'2015-07-13','\0','\0','\0','',''),(3,4,1,28,'codigo03','','','','lombada canoa, impressão p/b','','','padrão','revista','\0','','','','\0','','','\0','','','','','','','','','','\0','','','','',1,'',1,'\0',1,'','\0','\0','\0','\0','',1000,'2015-07-13','\0','\0','\0','','codigo03'),(4,4,2,28,'codigo03_0001','','','capa livro com pregos','foto capa','','','impar','capa','\0','','','','\0','','','\0','','','','','','','','','','\0','','','','',1,'1',1,'\0',2,'1','\0','\0','\0','\0','',1000,'2015-07-13','\0','\0','\0','','codigo03');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_media`
--

DROP TABLE IF EXISTS `item_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item_iditem` bigint(20) NOT NULL,
  `medias_idmedia` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_itemmedia_item` (`item_iditem`),
  KEY `fk_itemmedia_media` (`medias_idmedia`),
  CONSTRAINT `fk_itemmedia_item` FOREIGN KEY (`item_iditem`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_itemmedia_media` FOREIGN KEY (`medias_idmedia`) REFERENCES `media` (`idmedia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_media`
--

LOCK TABLES `item_media` WRITE;
/*!40000 ALTER TABLE `item_media` DISABLE KEYS */;
INSERT INTO `item_media` VALUES (1,1,1);
/*!40000 ALTER TABLE `item_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemcreator`
--

DROP TABLE IF EXISTS `itemcreator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemcreator` (
  `iditemcreator` int(11) NOT NULL AUTO_INCREMENT,
  `item` bigint(20) NOT NULL,
  `creator` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `attributed` bit(1) DEFAULT NULL,
  PRIMARY KEY (`iditemcreator`),
  KEY `fk_document_has_creator_creator1` (`creator`),
  KEY `fk_itemcreator_item_idx` (`item`),
  CONSTRAINT `fk_document_has_creator_creator1` FOREIGN KEY (`creator`) REFERENCES `creator` (`idcreator`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_itemcreator_item` FOREIGN KEY (`item`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemcreator`
--

LOCK TABLES `itemcreator` WRITE;
/*!40000 ALTER TABLE `itemcreator` DISABLE KEYS */;
INSERT INTO `itemcreator` VALUES (1,1,3,'editor','','\0');
/*!40000 ALTER TABLE `itemcreator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemdescription`
--

DROP TABLE IF EXISTS `itemdescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemdescription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` bigint(20) NOT NULL,
  `abstracttext` varchar(100) DEFAULT NULL,
  `accrual` varchar(100) DEFAULT NULL,
  `appraisaldesstructionschedulling` varchar(100) DEFAULT NULL,
  `arrangement` varchar(100) DEFAULT NULL,
  `broadcastmethod` varchar(100) DEFAULT NULL,
  `era` varchar(100) DEFAULT NULL,
  `fromcorporate` varchar(100) DEFAULT NULL,
  `frompersonal` varchar(100) DEFAULT NULL,
  `geographiccoodnates` varchar(100) DEFAULT NULL,
  `geographicname` varchar(100) DEFAULT NULL,
  `label` varchar(100) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `mediapresentation` varchar(100) DEFAULT NULL,
  `movement` varchar(100) DEFAULT NULL,
  `other` varchar(100) DEFAULT NULL,
  `period` varchar(100) DEFAULT NULL,
  `periodicity` varchar(100) DEFAULT NULL,
  `preservationstatus` varchar(100) DEFAULT NULL,
  `scope` varchar(100) DEFAULT NULL,
  `style` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `tableofcontents` varchar(100) DEFAULT NULL,
  `targetaudience` varchar(100) DEFAULT NULL,
  `tocorporate` varchar(100) DEFAULT NULL,
  `topersonal` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_itemdescription_item` (`item`),
  CONSTRAINT `fk_itemdescription_item` FOREIGN KEY (`item`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemdescription`
--

LOCK TABLES `itemdescription` WRITE;
/*!40000 ALTER TABLE `itemdescription` DISABLE KEYS */;
INSERT INTO `itemdescription` VALUES (1,1,'primeiro número da revista código','','','lombada quadrada','','','','','','','','portugues','','poesia concreta','','1970','','com desgastes na capa','','','poesia concreta','poemas e textos','','','');
/*!40000 ALTER TABLE `itemdescription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemdimension`
--

DROP TABLE IF EXISTS `itemdimension`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemdimension` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` bigint(20) NOT NULL,
  `dimensiontype` varchar(100) DEFAULT NULL,
  `dimensionunit` varchar(100) DEFAULT NULL,
  `dimensionvalue` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_item_dimension` (`item`),
  CONSTRAINT `fk_item_dimension` FOREIGN KEY (`item`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemdimension`
--

LOCK TABLES `itemdimension` WRITE;
/*!40000 ALTER TABLE `itemdimension` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemdimension` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `iteminscription`
--

DROP TABLE IF EXISTS `iteminscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `iteminscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` bigint(20) NOT NULL,
  `inscriptiontype` varchar(100) DEFAULT NULL,
  `inscriptiondescription` varchar(100) DEFAULT NULL,
  `inscriptionlocation` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_item_inscription` (`item`),
  CONSTRAINT `fk_item_inscription` FOREIGN KEY (`item`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iteminscription`
--

LOCK TABLES `iteminscription` WRITE;
/*!40000 ALTER TABLE `iteminscription` DISABLE KEYS */;
INSERT INTO `iteminscription` VALUES (1,1,'autografo','augusto de campos','contra-capa');
/*!40000 ALTER TABLE `iteminscription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `level` (
  `idlevel` int(11) NOT NULL AUTO_INCREMENT,
  `fond` int(11) NOT NULL,
  `institution` int(11) NOT NULL,
  `type` varchar(32) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `countitem` int(11) DEFAULT NULL,
  `levelcol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idlevel`),
  KEY `fk_serie_fond1` (`fond`),
  KEY `fk_serie_institution1` (`institution`),
  CONSTRAINT `fk_serie_fond1` FOREIGN KEY (`fond`) REFERENCES `fond` (`idfond`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_serie_institution1` FOREIGN KEY (`institution`) REFERENCES `institution` (`idinstitution`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `level`
--

LOCK TABLES `level` WRITE;
/*!40000 ALTER TABLE `level` DISABLE KEYS */;
INSERT INTO `level` VALUES (1,1,28,'revista','revista',12,'1'),(2,1,28,'pagina','pagina',36,'3'),(3,1,28,'texto','2',500,'2');
/*!40000 ALTER TABLE `level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `idmedia` bigint(20) NOT NULL AUTO_INCREMENT,
  `idhistory` varchar(45) DEFAULT NULL,
  `storage` int(11) DEFAULT NULL,
  `iddocumentation` varchar(45) DEFAULT NULL,
  `institution` int(11) NOT NULL,
  `idreference` varchar(45) DEFAULT NULL,
  `mediatype` varchar(45) DEFAULT NULL,
  `mediaurl` varchar(255) DEFAULT NULL,
  `digitizationdate` date DEFAULT NULL,
  `digitizationresponsable` varchar(255) DEFAULT NULL,
  `polarity` varchar(45) DEFAULT NULL,
  `colorspace` varchar(45) DEFAULT NULL,
  `iccprofile` varchar(45) DEFAULT NULL,
  `xresolution` varchar(45) DEFAULT NULL,
  `yresolution` varchar(45) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `thumbnail` blob,
  `digitizationequipment` varchar(255) DEFAULT NULL,
  `format` varchar(45) DEFAULT NULL,
  `ispublic` varchar(1) DEFAULT NULL,
  `ordername` varchar(255) DEFAULT NULL,
  `sent` bit(1) DEFAULT NULL,
  `exif` text,
  `textual` longtext,
  `sizemedia` bigint(20) DEFAULT NULL,
  `nameoriginal` varchar(255) DEFAULT NULL,
  `mainmedia` varchar(1) DEFAULT NULL,
  `mediadir` varchar(255) DEFAULT NULL,
  `thumbnaildir` varchar(255) DEFAULT NULL,
  `thumbnailurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idmedia`),
  KEY `fk_media_institution1` (`institution`),
  CONSTRAINT `fk_media_institution1` FOREIGN KEY (`institution`) REFERENCES `institution` (`idinstitution`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (1,'1',1,'1',28,'1','foto','http://codigorevista.org/rgb_jpg/codigo01/codigo01_0001.jpg','2015-07-13','fernando','','rgb','','','','','','jpg','','','\0','','',1,'','','','','');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ncontact`
--

DROP TABLE IF EXISTS `ncontact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ncontact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `call_` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `county_taxcode` varchar(255) DEFAULT NULL,
  `federal_taxcode` varchar(255) DEFAULT NULL,
  `identity` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `state_taxcode` varchar(255) DEFAULT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `urla` varchar(255) DEFAULT NULL,
  `institution` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_q27ejta8y2arisfx6k2v8y01v` (`institution`),
  CONSTRAINT `FK_q27ejta8y2arisfx6k2v8y01v` FOREIGN KEY (`institution`) REFERENCES `institution` (`idinstitution`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ncontact`
--

LOCK TABLES `ncontact` WRITE;
/*!40000 ALTER TABLE `ncontact` DISABLE KEYS */;
INSERT INTO `ncontact` VALUES (1,'1','asa','55','','','ariane','','','',26);
/*!40000 ALTER TABLE `ncontact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhistory`
--

DROP TABLE IF EXISTS `nhistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nhistory` (
  `idhistory` bigint(20) NOT NULL AUTO_INCREMENT,
  `actor` varchar(45) DEFAULT NULL,
  `cost` decimal(12,0) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `isPublic` bit(1) DEFAULT NULL,
  `institution` int(11) NOT NULL,
  PRIMARY KEY (`idhistory`),
  KEY `FK_19r8lwpjqv2j4hcqpjkwb1nsc` (`institution`),
  CONSTRAINT `FK_19r8lwpjqv2j4hcqpjkwb1nsc` FOREIGN KEY (`institution`) REFERENCES `institution` (`idinstitution`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhistory`
--

LOCK TABLES `nhistory` WRITE;
/*!40000 ALTER TABLE `nhistory` DISABLE KEYS */;
INSERT INTO `nhistory` VALUES (1,'ariane',10,'1','programacao','\0',26);
/*!40000 ALTER TABLE `nhistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nreference`
--

DROP TABLE IF EXISTS `nreference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nreference` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `other_information` varchar(5000) DEFAULT NULL,
  `text` varchar(5000) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `institution` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_360fxrl1q9vf3b3yu70b0lxl1` (`institution`),
  CONSTRAINT `FK_360fxrl1q9vf3b3yu70b0lxl1` FOREIGN KEY (`institution`) REFERENCES `institution` (`idinstitution`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nreference`
--

LOCK TABLES `nreference` WRITE;
/*!40000 ALTER TABLE `nreference` DISABLE KEYS */;
INSERT INTO `nreference` VALUES (1,'augusto de campos','site','http://www2.uol.com.br/augustodecampos/home.htm','site no uol','site',28),(2,'oswald de andrade','referencia','','','revista de antopofagia',28);
/*!40000 ALTER TABLE `nreference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `physicaldescription`
--

DROP TABLE IF EXISTS `physicaldescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `physicaldescription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` bigint(20) NOT NULL,
  `apexiso` varchar(100) DEFAULT NULL,
  `arabicpagenumbering` varchar(100) DEFAULT NULL,
  `asaiso` varchar(100) DEFAULT NULL,
  `boundtype` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `colorsystem` varchar(100) DEFAULT NULL,
  `columnnumber` varchar(100) DEFAULT NULL,
  `compressionmethod` varchar(100) DEFAULT NULL,
  `contentcolor` varchar(100) DEFAULT NULL,
  `contentextent` varchar(100) DEFAULT NULL,
  `contentfinishing` varchar(100) DEFAULT NULL,
  `contentsubstract` varchar(100) DEFAULT NULL,
  `contenttype` varchar(100) DEFAULT NULL,
  `covercolor` varchar(100) DEFAULT NULL,
  `coverfinishing` varchar(100) DEFAULT NULL,
  `coversubstract` varchar(100) DEFAULT NULL,
  `defaultapplication` varchar(100) DEFAULT NULL,
  `dustjacketcolor` varchar(100) DEFAULT NULL,
  `dustjacketfinishing` varchar(100) DEFAULT NULL,
  `dustjacketsubstract` varchar(100) DEFAULT NULL,
  `endpaper` varchar(100) DEFAULT NULL,
  `exif` varchar(100) DEFAULT NULL,
  `format` varchar(100) DEFAULT NULL,
  `framerate` varchar(100) DEFAULT NULL,
  `hasdustjacket` varchar(100) DEFAULT NULL,
  `hassound` varchar(100) DEFAULT NULL,
  `hasspecialfold` varchar(100) DEFAULT NULL,
  `iscompressed` varchar(100) DEFAULT NULL,
  `lengthtxt` varchar(100) DEFAULT NULL,
  `master` varchar(100) DEFAULT NULL,
  `media` varchar(100) DEFAULT NULL,
  `mediasupport` varchar(100) DEFAULT NULL,
  `movements` varchar(100) DEFAULT NULL,
  `other` varchar(100) DEFAULT NULL,
  `projectionmode` varchar(100) DEFAULT NULL,
  `romanpage` varchar(100) DEFAULT NULL,
  `sizetxt` varchar(100) DEFAULT NULL,
  `soundsystem` varchar(100) DEFAULT NULL,
  `specialfold` varchar(100) DEFAULT NULL,
  `specialpagenumebring` varchar(100) DEFAULT NULL,
  `technique` varchar(100) DEFAULT NULL,
  `timecode` varchar(100) DEFAULT NULL,
  `tinting` varchar(100) DEFAULT NULL,
  `titlepage` varchar(100) DEFAULT NULL,
  `totaltime` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `writingformat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_item_physical` (`item`),
  CONSTRAINT `fk_item_physical` FOREIGN KEY (`item`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `physicaldescription`
--

LOCK TABLES `physicaldescription` WRITE;
/*!40000 ALTER TABLE `physicaldescription` DISABLE KEYS */;
INSERT INTO `physicaldescription` VALUES (1,1,'codigo 1','0','','lombada','sepia','custom','1','','sepia','','','','paginas','sepia','verniz','couché brilhante','','','','','','','14,9x 21,9cm','','','','','','','','impresso','','poesia concreta','','','','','','','','offset','','','','','imagem','');
/*!40000 ALTER TABLE `physicaldescription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `place_location`
--

DROP TABLE IF EXISTS `place_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `place_location` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `complement` varchar(255) DEFAULT NULL,
  `latituded` varchar(255) DEFAULT NULL,
  `local` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `number` varchar(45) DEFAULT NULL,
  `otherinformation` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `zipcode` varchar(45) DEFAULT NULL,
  `city` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `institution` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_placelocation_institution_idx` (`institution`),
  KEY `fk_placelocation_country_idx` (`country`),
  KEY `fk_placelocation_state_idx` (`state`),
  KEY `fk_placelocation_city_idx` (`city`),
  CONSTRAINT `fk_placelocation_city` FOREIGN KEY (`city`) REFERENCES `city` (`idcity`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_placelocation_country` FOREIGN KEY (`country`) REFERENCES `country` (`idcountry`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_placelocation_institution` FOREIGN KEY (`institution`) REFERENCES `institution` (`idinstitution`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_placelocation_state` FOREIGN KEY (`state`) REFERENCES `state` (`idstate`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place_location`
--

LOCK TABLES `place_location` WRITE;
/*!40000 ALTER TABLE `place_location` DISABLE KEYS */;
INSERT INTO `place_location` VALUES (1,'cidade','@-23.6824124','são paulo','-46.5952992,10z','','','','','',3,2,26,8);
/*!40000 ALTER TABLE `place_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference`
--

DROP TABLE IF EXISTS `reference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reference` (
  `idreference` bigint(20) NOT NULL AUTO_INCREMENT,
  `item` bigint(20) NOT NULL,
  `institution` int(11) NOT NULL,
  `creator` int(11) DEFAULT NULL,
  `referencetype` varchar(45) DEFAULT NULL,
  `referencetitle` varchar(255) DEFAULT NULL,
  `referencedescription` varchar(500) DEFAULT NULL,
  `referenceauthor` varchar(255) DEFAULT NULL,
  `referencetext` text,
  `otherinformations` text,
  PRIMARY KEY (`idreference`),
  KEY `fk_reference_item1` (`item`),
  KEY `fk_reference_creator` (`creator`),
  KEY `fk_reference_institution_idx` (`institution`),
  CONSTRAINT `fk_reference_creator` FOREIGN KEY (`creator`) REFERENCES `creator` (`idcreator`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reference_institution` FOREIGN KEY (`institution`) REFERENCES `institution` (`idinstitution`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reference_item1` FOREIGN KEY (`item`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='for texts referred to an item and bibliographic references';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference`
--

LOCK TABLES `reference` WRITE;
/*!40000 ALTER TABLE `reference` DISABLE KEYS */;
INSERT INTO `reference` VALUES (1,1,28,2,'nota','poema código','','augusto de campos','revista não revista não tinha nome o poema de augusto de campos, que foi impresso na capa acabou dando título à revista','');
/*!40000 ALTER TABLE `reference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference_media`
--

DROP TABLE IF EXISTS `reference_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reference_media` (
  `id_ref_media` int(11) NOT NULL AUTO_INCREMENT,
  `reference_idreference` bigint(20) NOT NULL,
  `medias_idmedia` bigint(20) NOT NULL,
  PRIMARY KEY (`id_ref_media`),
  KEY `fk_refmedia_ref_idx` (`reference_idreference`),
  KEY `fk_refmedia_media_idx` (`medias_idmedia`),
  CONSTRAINT `fk_refmedia_media` FOREIGN KEY (`medias_idmedia`) REFERENCES `media` (`idmedia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_refmedia_ref` FOREIGN KEY (`reference_idreference`) REFERENCES `reference` (`idreference`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_media`
--

LOCK TABLES `reference_media` WRITE;
/*!40000 ALTER TABLE `reference_media` DISABLE KEYS */;
INSERT INTO `reference_media` VALUES (1,1,1);
/*!40000 ALTER TABLE `reference_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `idrole` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `institution` int(11) NOT NULL,
  PRIMARY KEY (`idrole`),
  KEY `fk_role_institution1` (`institution`),
  CONSTRAINT `fk_role_institution1` FOREIGN KEY (`institution`) REFERENCES `institution` (`idinstitution`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'admin',26);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `search`
--

DROP TABLE IF EXISTS `search`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `search` (
  `idsearch` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `info` text,
  `type` int(11) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  PRIMARY KEY (`idsearch`),
  KEY `fk_search_user1` (`user`),
  CONSTRAINT `fk_search_user1` FOREIGN KEY (`user`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `search`
--

LOCK TABLES `search` WRITE;
/*!40000 ALTER TABLE `search` DISABLE KEYS */;
INSERT INTO `search` VALUES (1,4,'autor','',1,'2015-07-13 22:00:00');
/*!40000 ALTER TABLE `search` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `state` (
  `idstate` int(11) NOT NULL AUTO_INCREMENT,
  `country` int(11) NOT NULL,
  `state` varchar(45) DEFAULT NULL,
  `statecode` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idstate`),
  KEY `fk_state_country1` (`country`),
  CONSTRAINT `fk_state_country1` FOREIGN KEY (`country`) REFERENCES `country` (`idcountry`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES (8,2,'sao paulo','sp');
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `storage`
--

DROP TABLE IF EXISTS `storage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `storage` (
  `idstorage` int(11) NOT NULL AUTO_INCREMENT,
  `host` varchar(100) DEFAULT NULL,
  `local` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `folder` varchar(45) DEFAULT NULL,
  `urlftp` varchar(100) DEFAULT NULL,
  `urlhttp` varchar(100) DEFAULT NULL,
  `ipaddress` varchar(45) DEFAULT NULL,
  `full` bit(1) DEFAULT NULL,
  `usedspace` bigint(20) DEFAULT NULL,
  `diskcapacity` bigint(20) DEFAULT NULL,
  `institution` int(11) DEFAULT NULL,
  `defaultstorage` bit(1) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`idstorage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `storage`
--

LOCK TABLES `storage` WRITE;
/*!40000 ALTER TABLE `storage` DISABLE KEYS */;
/*!40000 ALTER TABLE `storage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `storage_media`
--

DROP TABLE IF EXISTS `storage_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `storage_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `storage_idstorage` int(11) NOT NULL,
  `medias_idmedia` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_hrmsbocvkwn14rnyh8qj55dfc` (`storage_idstorage`),
  KEY `FK_nmymba781jas5ih7fojmm9435` (`medias_idmedia`),
  CONSTRAINT `FK_hrmsbocvkwn14rnyh8qj55dfc` FOREIGN KEY (`storage_idstorage`) REFERENCES `storage` (`idstorage`),
  CONSTRAINT `FK_nmymba781jas5ih7fojmm9435` FOREIGN KEY (`medias_idmedia`) REFERENCES `media` (`idmedia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `storage_media`
--

LOCK TABLES `storage_media` WRITE;
/*!40000 ALTER TABLE `storage_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `storage_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timezones`
--

DROP TABLE IF EXISTS `timezones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timezones` (
  `idtimezone` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idtimezone`)
) ENGINE=InnoDB AUTO_INCREMENT=901 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timezones`
--

LOCK TABLES `timezones` WRITE;
/*!40000 ALTER TABLE `timezones` DISABLE KEYS */;
INSERT INTO `timezones` VALUES (900,'rio');
/*!40000 ALTER TABLE `timezones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `title`
--

DROP TABLE IF EXISTS `title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `title` (
  `idtitle` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(45) DEFAULT NULL,
  `item` bigint(20) DEFAULT NULL,
  `institution` int(11) DEFAULT NULL,
  `defaulttitle` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idtitle`),
  KEY `fk_title_item1` (`item`),
  KEY `fk_title_institution1` (`institution`),
  CONSTRAINT `fk_title_institution1` FOREIGN KEY (`institution`) REFERENCES `institution` (`idinstitution`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_title_item1` FOREIGN KEY (`item`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `title`
--

LOCK TABLES `title` WRITE;
/*!40000 ALTER TABLE `title` DISABLE KEYS */;
INSERT INTO `title` VALUES (1,'revista codigo','revista codigo',1,28,'\0');
/*!40000 ALTER TABLE `title` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transcription`
--

DROP TABLE IF EXISTS `transcription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transcription` (
  `idtranscription` int(11) NOT NULL AUTO_INCREMENT,
  `iditem` bigint(20) NOT NULL,
  `idmedia` bigint(20) NOT NULL,
  `transcription` text,
  `notes` varchar(45) DEFAULT NULL,
  `language` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtranscription`),
  KEY `fk_transcription_item1` (`iditem`),
  KEY `fk_transcription_media1` (`idmedia`),
  CONSTRAINT `fk_transcription_item1` FOREIGN KEY (`iditem`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_transcription_media1` FOREIGN KEY (`idmedia`) REFERENCES `media` (`idmedia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transcription`
--

LOCK TABLES `transcription` WRITE;
/*!40000 ALTER TABLE `transcription` DISABLE KEYS */;
INSERT INTO `transcription` VALUES (1,1,1,'CAPA/CONTRACAPA AUGUSTO DE CAMPOS\n','texto integral','pt-br');
/*!40000 ALTER TABLE `transcription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `institution` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `notes` varchar(45) DEFAULT NULL,
  `code` varchar(8) DEFAULT NULL,
  `timezone` int(11) NOT NULL,
  `lastlogin` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `admin` bit(1) DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  KEY `fk_user_institution1` (`institution`),
  KEY `fk_user_timezone` (`timezone`),
  CONSTRAINT `fk_user_institution1` FOREIGN KEY (`institution`) REFERENCES `institution` (`idinstitution`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_timezone` FOREIGN KEY (`timezone`) REFERENCES `timezones` (`idtimezone`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (4,26,'ariane stolfi','ariane','admin','','',900,'2015-07-13 23:18:00',1,'\0');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userrole`
--

DROP TABLE IF EXISTS `userrole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userrole` (
  `iduserrole` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`iduserrole`),
  KEY `fk_user_has_role_role1` (`role`),
  KEY `fk_user_has_role_user1` (`user`),
  CONSTRAINT `fk_user_has_role_role1` FOREIGN KEY (`role`) REFERENCES `role` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_role_user1` FOREIGN KEY (`user`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userrole`
--

LOCK TABLES `userrole` WRITE;
/*!40000 ALTER TABLE `userrole` DISABLE KEYS */;
INSERT INTO `userrole` VALUES (1,4,1);
/*!40000 ALTER TABLE `userrole` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-14 14:40:57
