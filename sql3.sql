-- MySQL dump 10.13  Distrib 5.6.12, for Win32 (x86)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	5.6.12-log

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
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `idcontact` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `adressemail` varchar(200) DEFAULT NULL,
  `user_iduser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcontact`),
  UNIQUE KEY `adressemail` (`adressemail`),
  KEY `fk_contact_userIduser_user` (`user_iduser`),
  CONSTRAINT `fk_contact_userIduser_user` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'patrick','mendel','patrick.sanang@gmail.com',1),(2,'sanang','pattrick','patrick.sanang@yahoo.fr',1),(3,'sanang','patrick','patrick.sanang@jiii.com',1);
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_has_groupe`
--

DROP TABLE IF EXISTS `contact_has_groupe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_has_groupe` (
  `id_contact_has_groupe` int(11) NOT NULL AUTO_INCREMENT,
  `contact_idcontact` int(11) NOT NULL,
  `groupe_idgroupe` int(11) NOT NULL,
  PRIMARY KEY (`id_contact_has_groupe`),
  KEY `fk_contactHasGroupe_contactIdcontact_contact` (`contact_idcontact`),
  KEY `fk_contactHasGroupe_groupeIdgroupe_groupe` (`groupe_idgroupe`),
  CONSTRAINT `fk_contactHasGroupe_contactIdcontact_contact` FOREIGN KEY (`contact_idcontact`) REFERENCES `contact` (`idcontact`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_contactHasGroupe_groupeIdgroupe_groupe` FOREIGN KEY (`groupe_idgroupe`) REFERENCES `groupe` (`idgroupe`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_has_groupe`
--

LOCK TABLES `contact_has_groupe` WRITE;
/*!40000 ALTER TABLE `contact_has_groupe` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_has_groupe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groupe` (
  `idgroupe` int(11) NOT NULL AUTO_INCREMENT,
  `nomGroupe` varchar(45) NOT NULL,
  `user_iduser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idgroupe`),
  UNIQUE KEY `nomGroupe` (`nomGroupe`),
  KEY `fk_groupe_userIduser_user` (`user_iduser`),
  CONSTRAINT `fk_groupe_userIduser_user` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groupe`
--

LOCK TABLES `groupe` WRITE;
/*!40000 ALTER TABLE `groupe` DISABLE KEYS */;
INSERT INTO `groupe` VALUES (1,'dfsqfdsq',1),(3,'1',1),(4,'enspy',1),(5,'groupe2',1);
/*!40000 ALTER TABLE `groupe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `numero`
--

DROP TABLE IF EXISTS `numero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `numero` (
  `idnumero` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(100) NOT NULL,
  `contact_idcontact` int(11) DEFAULT NULL,
  PRIMARY KEY (`idnumero`),
  UNIQUE KEY `numero` (`numero`),
  KEY `fk_numero_contactIdcontact_contact` (`contact_idcontact`),
  CONSTRAINT `fk_numero_contactIdcontact_contact` FOREIGN KEY (`contact_idcontact`) REFERENCES `contact` (`idcontact`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `numero`
--

LOCK TABLES `numero` WRITE;
/*!40000 ALTER TABLE `numero` DISABLE KEYS */;
/*!40000 ALTER TABLE `numero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms`
--

DROP TABLE IF EXISTS `sms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms` (
  `idsms` int(11) NOT NULL AUTO_INCREMENT,
  `corps` varchar(1000) NOT NULL,
  `dateEnvoie` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateEnregistrement` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_iduser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsms`),
  KEY `fk_sms_userIduser_user` (`user_iduser`),
  CONSTRAINT `fk_sms_userIduser_user` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms`
--

LOCK TABLES `sms` WRITE;
/*!40000 ALTER TABLE `sms` DISABLE KEYS */;
/*!40000 ALTER TABLE `sms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms_has_contact`
--

DROP TABLE IF EXISTS `sms_has_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms_has_contact` (
  `id_sms_has_contact` int(11) NOT NULL AUTO_INCREMENT,
  `sms_idsms` int(11) NOT NULL,
  `contact_idcontact` int(11) NOT NULL,
  `etat` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_sms_has_contact`),
  KEY `fk_smsHasContact_smsIdsms_sms` (`sms_idsms`),
  KEY `fk_smsHasContact_contactIdcontact_contact` (`contact_idcontact`),
  CONSTRAINT `fk_smsHasContact_contactIdcontact_contact` FOREIGN KEY (`contact_idcontact`) REFERENCES `contact` (`idcontact`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_smsHasContact_smsIdsms_sms` FOREIGN KEY (`sms_idsms`) REFERENCES `sms` (`idsms`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_has_contact`
--

LOCK TABLES `sms_has_contact` WRITE;
/*!40000 ALTER TABLE `sms_has_contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `sms_has_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `adressemail` varchar(200) NOT NULL,
  `motdepasse` varchar(200) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'patrick','mendel','patrick.sanang@gmail.com','mendel');
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

-- Dump completed on 2016-03-18 12:17:33
