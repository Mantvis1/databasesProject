-- MySQL dump 10.13  Distrib 5.5.59, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: manraz3
-- ------------------------------------------------------
-- Server version	5.5.5-10.0.32-MariaDB-0+deb8u1

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
-- Table structure for table `arena`
--

DROP TABLE IF EXISTS `arena`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arena` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) NOT NULL,
  `talpa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arena`
--

LOCK TABLES `arena` WRITE;
/*!40000 ALTER TABLE `arena` DISABLE KEYS */;
INSERT INTO `arena` VALUES (2541,'Pieno zvaigzdziu arena',5200),(87541,'Kauno sporto hale',5400),(254014,'Cido arena',3401),(520104,'Siemens Arena',7840),(520125,'Jonavos sporto arena',1000),(3451141,'Zalgirio arena',15500),(18752574,'Alytaus arena',1500),(23524114,'Kedainiu sporto hale',7540);
/*!40000 ALTER TABLE `arena` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `istorija`
--

DROP TABLE IF EXISTS `istorija`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `istorija` (
  `id` int(11) NOT NULL,
  `metai` int(11) NOT NULL,
  `uzimta_vieta` int(11) DEFAULT NULL,
  `varzybu_kiekis` int(11) DEFAULT NULL,
  `fk_Komandakodas` int(11) NOT NULL,
  PRIMARY KEY (`metai`),
  KEY `priklauso2` (`fk_Komandakodas`),
  CONSTRAINT `priklauso2` FOREIGN KEY (`fk_Komandakodas`) REFERENCES `komanda` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `istorija`
--

LOCK TABLES `istorija` WRITE;
/*!40000 ALTER TABLE `istorija` DISABLE KEYS */;
INSERT INTO `istorija` VALUES (52021,1988,5,11,5),(8541521,2001,2,32,10),(21252121,2003,1,30,5),(15447520,2005,2,11,2),(141202,2006,6,11,3),(2007021410,2007,3,25,2),(7959,2012,9,26,6),(8860,2013,9,69,2),(2557,2015,10,34,10);
/*!40000 ALTER TABLE `istorija` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `komanda`
--

DROP TABLE IF EXISTS `komanda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `komanda` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) NOT NULL,
  `biudzetas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `komanda`
--

LOCK TABLES `komanda` WRITE;
/*!40000 ALTER TABLE `komanda` DISABLE KEYS */;
INSERT INTO `komanda` VALUES (1,'zalgiris',8500100),(2,'lietuvos rytas',3500000),(3,'neptunas',1250000),(4,'lietkabelis',1130000),(5,'siauliai',952000),(6,'pieno zvaigzdes',650000),(7,'juventus',425000),(8,'dzukija',330000),(9,'nevezis',285000),(10,'vytautas',225000);
/*!40000 ALTER TABLE `komanda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `komandine_statistika`
--

DROP TABLE IF EXISTS `komandine_statistika`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `komandine_statistika` (
  `pataikytos_baudos` int(11) DEFAULT NULL,
  `mestos_baudos` int(11) DEFAULT NULL,
  `baudu_taiklumas_procentais` int(11) DEFAULT NULL,
  `pataikyti_dvitaskiai` int(11) DEFAULT NULL,
  `mesti_dvitaskiai` int(11) DEFAULT NULL,
  `dvitaskiu_taiklumas_procentais` int(11) DEFAULT NULL,
  `mesti_triktaskiai` int(11) DEFAULT NULL,
  `pataikyti_tritaskiai` int(11) DEFAULT NULL,
  `tritaskiu_taiklumas_procentais` int(11) DEFAULT NULL,
  `rezultatyvus_perdavimai` int(11) DEFAULT NULL,
  `atkovoti_kamuoliai` int(11) DEFAULT NULL,
  `blokai` int(11) DEFAULT NULL,
  `klaidos` int(11) DEFAULT NULL,
  `perimti_kamuoliai` int(11) DEFAULT NULL,
  `isprovokuotos_prazangos` int(11) DEFAULT NULL,
  `id_Komandine_statistika` int(11) NOT NULL,
  `fk_Rungtyneskodas` int(11) NOT NULL,
  `fk_Komandakodas` int(11) NOT NULL,
  PRIMARY KEY (`id_Komandine_statistika`),
  KEY `turi3` (`fk_Rungtyneskodas`),
  KEY `turi1` (`fk_Komandakodas`),
  CONSTRAINT `turi1` FOREIGN KEY (`fk_Komandakodas`) REFERENCES `komanda` (`id`),
  CONSTRAINT `turi3` FOREIGN KEY (`fk_Rungtyneskodas`) REFERENCES `rungtynes` (`kodas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `komandine_statistika`
--

LOCK TABLES `komandine_statistika` WRITE;
/*!40000 ALTER TABLE `komandine_statistika` DISABLE KEYS */;
INSERT INTO `komandine_statistika` VALUES (25,27,93,25,27,93,25,27,93,22,11,11,11,11,11,2,1,1),(25,57,44,33,125,26,25,512,5,25,52,1,5,2,5,3,12,8),(44,103,43,211,215,98,36,21,171,444,26,5,6,1,21,4,13,3),(85,96,89,11,53,21,9,552,2,25,565,266,155,4,1,5,14,10),(77,81,95,25,55,45,5,12,42,2,5,5,0,5,5,6,5,9),(63,66,95,25,35,71,99,100,99,1,5,5,2,121,55,7,8,7),(95,103,92,36,55,65,62,96,65,63,54,11,11,11,11,8,2,4),(46,87,53,14,25,56,22,25,88,15,6,52,1,5,2,9,12,1),(164,173,95,25,27,93,112,155,72,2,147,1,24,41,15,10,10,10),(122,139,88,22,200,11,25,26,96,59,512,555,64,512,25,11,9,8),(100,121,83,103,122,84,26,201,13,2,312,24,6,221,218,12,6,5),(88,90,98,20,34,59,6,96,6,521,1,12,5,63,212,13,5,6),(45,96,47,15,36,42,9,25,36,58,2,22,446,361,21,14,4,1),(11,21,52,41,62,66,55,422,13,22,16,31,6,120,185,15,7,7),(160,172,93,25,36,69,21,533,4,1,17,1,4,210,22,16,8,5),(1,152,1,369,400,92,5,511,1,555,18,96,3,147,1,17,11,8),(4,5,80,220,321,69,45,155,29,24,19,22,1,512,555,18,13,2),(10,10,100,23,36,64,22,42,52,5,20,221,6,331,24,19,12,10),(55,75,73,3,5,60,32,251,13,321,3,2,65,210,5,20,10,3),(43,53,81,50,225,22,12,21,57,1,322,232,212,562,2,21,9,2),(66,102,65,2,31,6,112,321,35,44,52,135,21,144,5,22,8,1),(0,20,0,0,32,0,3,51,6,1,42,12,6,147,5,23,5,5),(7,33,21,562,599,94,22,51,43,4,1,22,55,200,95,24,3,9),(21,33,64,3,215,1,2,5,40,34,147,1,66,210,5,25,7,3),(35,74,47,2,210,1,12,22,55,22,512,555,6,65,66,26,3,1),(72,88,82,216,521,41,323,432,75,51,331,24,5,410,12,27,1,5),(21,32,66,321,350,92,212,212,100,5,2,2,32,600,22,28,2,1),(35,55,64,22,35,63,111,121,92,51,2,23,2,251,396,29,4,6),(15,312,5,212,225,94,2,2,100,5,32,132,3,255,65,30,6,3);
/*!40000 ALTER TABLE `komandine_statistika` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personalas`
--

DROP TABLE IF EXISTS `personalas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personalas` (
  `kodas` int(11) NOT NULL,
  `vardas` varchar(255) NOT NULL,
  `pavarde` varchar(255) NOT NULL,
  `paskirtis` int(11) NOT NULL,
  `fk_Komandakodas` int(11) NOT NULL,
  PRIMARY KEY (`kodas`),
  KEY `paskirtis` (`paskirtis`),
  KEY `priziuri` (`fk_Komandakodas`),
  CONSTRAINT `personalas_ibfk_1` FOREIGN KEY (`paskirtis`) REFERENCES `veikla` (`id_Veikla`),
  CONSTRAINT `priziuri` FOREIGN KEY (`fk_Komandakodas`) REFERENCES `komanda` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personalas`
--

LOCK TABLES `personalas` WRITE;
/*!40000 ALTER TABLE `personalas` DISABLE KEYS */;
INSERT INTO `personalas` VALUES (269,'Kamilis','Germanas',3,9),(1130,'Deivis','Butautas',1,5),(2495,'Elonas','Kiskis',3,2),(3263,'Darius','Butkus',3,1),(6390,'Matas','Bukelis',4,9),(8997,'Naglis','Adamkavicius',6,6),(11633,'Benas','Daujotas',6,4),(13249,'Adas','Fedaravicius',4,2),(15143,'Juozas','Kuncinas',5,10),(15884,'Haroldas','Kepezinskas',3,10),(19067,'Danielis','Cepulis',5,1),(19316,'Jonas','Kingstonas',5,8),(19656,'Arvydas','Domeika',3,1),(20254,'Julius','Jagminas',4,5),(20611,'Linas','Dembskis',4,5),(21436,'Arturas','Kasakaitis',4,4),(22941,'Danas','Civinskas',1,1),(24908,'Ernestas','Kasperavicius',4,1),(25996,'Albinas','Eigirdas',2,2),(29716,'Egidijus','Kazlas',1,5),(256412,'Paulius','Jacikas',3,3),(5241541,'Sarunas','Jasikevicius',1,1);
/*!40000 ALTER TABLE `personalas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remejai`
--

DROP TABLE IF EXISTS `remejai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `remejai` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) NOT NULL,
  `bendra_suma` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remejai`
--

LOCK TABLES `remejai` WRITE;
/*!40000 ALTER TABLE `remejai` DISABLE KEYS */;
INSERT INTO `remejai` VALUES (2520,'raktu imprija',85415),(254141,'biocentras',8515),(256521,'regqoup',2410),(410520,'iramita',41000),(521041,'verslo servisas',5411),(854145,'oberhouse',888011),(955200,'teodolitas',2520),(2516521,'neda',3020),(2520052,'sistela',54151),(4525212,'maldis',5610),(5512365,'steila',51100),(7755011,'spaineta',22010),(8401251,'mepco',250130),(14452012,'palsteda',20120),(54154252,'renvoja',5500);
/*!40000 ALTER TABLE `remejai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rungtynes`
--

DROP TABLE IF EXISTS `rungtynes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rungtynes` (
  `kodas` int(11) NOT NULL,
  `rezultatas1` int(11) NOT NULL,
  `rezultatas2` int(11) NOT NULL,
  `fk_Komandaid` int(11) NOT NULL,
  `fk_Komandaid1` int(11) NOT NULL,
  PRIMARY KEY (`kodas`),
  KEY `dalyvauja2` (`fk_Komandaid`),
  KEY `dalyvauja1` (`fk_Komandaid1`),
  CONSTRAINT `dalyvauja1` FOREIGN KEY (`fk_Komandaid1`) REFERENCES `komanda` (`id`),
  CONSTRAINT `dalyvauja2` FOREIGN KEY (`fk_Komandaid`) REFERENCES `komanda` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rungtynes`
--

LOCK TABLES `rungtynes` WRITE;
/*!40000 ALTER TABLE `rungtynes` DISABLE KEYS */;
INSERT INTO `rungtynes` VALUES (1,88,71,1,5),(2,120,75,2,4),(3,67,88,6,9),(4,88,101,3,8),(5,82,71,6,10),(6,89,99,4,10),(7,96,97,5,1),(8,56,71,2,5),(9,111,106,7,6),(10,70,66,5,6),(11,65,78,7,3),(12,77,96,2,5),(13,88,74,4,3),(14,77,83,1,3),(788,85,63,3,10),(3124,77,32,2,6),(22125,66,58,3,7),(123431,88,96,3,1),(132312,100,99,2,3),(312531,55,56,5,9),(315432,52,66,6,2),(514652,52,96,4,1),(521315,103,102,3,8),(1252211,103,66,6,3);
/*!40000 ALTER TABLE `rungtynes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sezono_statistika`
--

DROP TABLE IF EXISTS `sezono_statistika`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sezono_statistika` (
  `metai` int(11) NOT NULL,
  `pataikytos_baudos` int(11) DEFAULT NULL,
  `mestos_baudos` int(11) DEFAULT NULL,
  `baudu_taikumas_procentais` int(11) DEFAULT NULL,
  `pataikyti_dvitaskiai` int(11) DEFAULT NULL,
  `mest_dvitaskiai` int(11) DEFAULT NULL,
  `dvitaskiu_taiklumas_procentais` int(11) DEFAULT NULL,
  `mesti_tritaskiai` int(11) DEFAULT NULL,
  `pataikyti_tritaskiai` int(11) DEFAULT NULL,
  `tritaskiu_pataikymas_procentais` int(11) DEFAULT NULL,
  `rezultatyvus_perdavimai` int(11) DEFAULT NULL,
  `atkovoti_kamuoliai` int(11) DEFAULT NULL,
  `blokai` int(11) DEFAULT NULL,
  `klaidos` int(11) DEFAULT NULL,
  `perimti_kamuoliai` int(11) DEFAULT NULL,
  `isprovokuotos_prazangos` int(11) DEFAULT NULL,
  `effektyvumas` int(11) DEFAULT NULL,
  `fk_Zaidejaskodas` int(11) NOT NULL,
  PRIMARY KEY (`metai`),
  KEY `turi2` (`fk_Zaidejaskodas`),
  CONSTRAINT `turi2` FOREIGN KEY (`fk_Zaidejaskodas`) REFERENCES `zaidejas` (`kodas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sezono_statistika`
--

LOCK TABLES `sezono_statistika` WRITE;
/*!40000 ALTER TABLE `sezono_statistika` DISABLE KEYS */;
INSERT INTO `sezono_statistika` VALUES (1991,25,57,44,33,125,26,25,512,5,25,52,1,5,2,5,246,12),(1992,44,103,43,211,215,98,36,37,97,444,26,5,6,1,21,1065,13),(1993,85,96,89,11,53,21,9,552,2,25,565,266,155,4,1,840,14),(1994,77,81,95,25,55,45,5,12,42,2,5,5,0,5,5,164,5),(1995,63,66,95,25,35,71,99,100,99,1,5,5,2,121,55,595,8),(1996,95,103,92,36,55,65,62,96,65,63,54,11,11,11,11,492,2),(1997,46,87,53,14,25,56,22,25,88,15,6,52,1,5,2,219,12),(1998,164,173,95,25,27,93,112,155,72,2,147,1,24,41,15,732,10),(1999,122,139,88,22,200,11,25,26,96,59,512,555,64,512,25,1840,9),(2000,100,121,83,103,122,84,26,201,13,2,312,24,6,221,218,1155,6),(2001,88,90,98,20,34,59,6,96,6,521,1,12,5,63,212,950,5),(2002,45,96,47,15,36,42,9,25,36,58,2,22,446,361,21,120,4),(2003,11,21,52,41,62,66,55,422,13,22,16,31,6,120,185,626,7),(2004,160,172,93,25,36,69,21,533,4,1,17,1,4,210,22,520,8),(2005,1,152,1,369,400,92,5,511,1,555,18,96,3,147,1,1568,11),(2006,4,5,80,220,321,69,45,155,29,24,19,22,1,512,555,1710,13),(2007,10,10,100,23,36,64,22,42,52,5,20,221,6,331,24,717,12),(2008,55,75,73,3,5,60,32,251,13,321,3,2,65,210,5,633,10),(2009,43,53,81,50,225,22,12,21,57,1,322,232,212,562,2,1086,9),(2010,66,102,65,2,31,6,112,321,35,44,52,135,21,144,5,765,8),(2011,0,20,0,0,32,0,3,51,6,1,42,12,6,147,5,210,5),(2012,7,33,21,562,599,94,22,51,43,4,1,22,55,200,95,1464,3),(2013,21,33,64,3,215,1,2,5,40,34,147,1,66,210,5,364,7),(2014,35,74,47,2,210,1,12,22,55,22,512,555,6,65,66,1289,3),(2015,72,88,82,216,521,41,323,432,75,51,331,24,5,410,12,2296,1),(2016,21,32,66,321,350,92,212,212,100,5,2,2,32,600,22,1898,2),(2017,35,55,64,22,35,63,111,121,92,51,2,23,2,251,396,1133,4),(2018,15,312,5,212,225,94,2,2,100,5,32,132,3,255,65,931,6);
/*!40000 ALTER TABLE `sezono_statistika` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skiria_pinigu`
--

DROP TABLE IF EXISTS `skiria_pinigu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skiria_pinigu` (
  `fk_Komandaid` int(11) NOT NULL,
  `fk_Remejaiid` int(11) NOT NULL,
  PRIMARY KEY (`fk_Komandaid`,`fk_Remejaiid`),
  KEY `Skiria_pinigu2` (`fk_Remejaiid`),
  CONSTRAINT `Skiria_pinigu` FOREIGN KEY (`fk_Komandaid`) REFERENCES `komanda` (`id`),
  CONSTRAINT `Skiria_pinigu2` FOREIGN KEY (`fk_Remejaiid`) REFERENCES `remejai` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skiria_pinigu`
--

LOCK TABLES `skiria_pinigu` WRITE;
/*!40000 ALTER TABLE `skiria_pinigu` DISABLE KEYS */;
INSERT INTO `skiria_pinigu` VALUES (1,2520052),(1,8401251),(1,54154252),(2,256521),(2,854145),(2,955200),(2,8401251),(2,14452012),(3,955200),(3,7755011),(3,8401251),(3,14452012),(4,254141),(4,955200),(4,2516521),(4,8401251),(4,14452012),(5,2520),(5,854145),(5,955200),(5,4525212),(5,5512365),(5,7755011),(6,256521),(6,854145),(6,4525212),(6,7755011),(6,8401251),(6,14452012),(7,4525212),(7,7755011),(8,254141),(8,256521),(8,2516521),(8,8401251),(9,410520),(10,54154252);
/*!40000 ALTER TABLE `skiria_pinigu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `veikla`
--

DROP TABLE IF EXISTS `veikla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `veikla` (
  `id_Veikla` int(11) NOT NULL,
  `rusis` char(22) NOT NULL,
  PRIMARY KEY (`id_Veikla`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `veikla`
--

LOCK TABLES `veikla` WRITE;
/*!40000 ALTER TABLE `veikla` DISABLE KEYS */;
INSERT INTO `veikla` VALUES (1,'vyriausiasis_treneris'),(2,'treneris_asistentas'),(3,'fizinio_pasirengimo_tr'),(4,'gydytojas'),(5,'vadybininkas'),(6,'savininkas');
/*!40000 ALTER TABLE `veikla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zaidejas`
--

DROP TABLE IF EXISTS `zaidejas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zaidejas` (
  `kodas` int(11) NOT NULL,
  `vardas` varchar(255) NOT NULL,
  `pavarde` varchar(255) NOT NULL,
  `amzius` int(11) DEFAULT NULL,
  `numeris` int(11) DEFAULT NULL,
  `pozicija` int(11) DEFAULT NULL,
  `fk_Komandakodas` int(11) NOT NULL,
  `fk_Komandakodas1` int(11) NOT NULL,
  PRIMARY KEY (`kodas`),
  KEY `rungtyniauja` (`fk_Komandakodas`),
  KEY `priklauso3` (`fk_Komandakodas1`),
  CONSTRAINT `priklauso3` FOREIGN KEY (`fk_Komandakodas1`) REFERENCES `komanda` (`id`),
  CONSTRAINT `rungtyniauja` FOREIGN KEY (`fk_Komandakodas`) REFERENCES `komanda` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zaidejas`
--

LOCK TABLES `zaidejas` WRITE;
/*!40000 ALTER TABLE `zaidejas` DISABLE KEYS */;
INSERT INTO `zaidejas` VALUES (1,'laurynas','birutis',22,14,NULL,2,4),(2,'vyacheslav','bobrov',22,99,2,4,7),(3,'mindaugas','kupsas',0,65,2,4,1),(4,'Egor','Gontarev',39,59,4,3,5),(5,'edgaras','zelionis',38,22,3,4,1),(6,'arnas','butkevicius',33,11,2,7,10),(7,'julius','kazakauskas',29,21,5,7,3),(8,'jimmy','baron',35,77,3,1,6),(9,'juan','palacios',26,11,4,1,5),(10,'antony','ireland',31,44,3,3,3),(11,'rytis','pipiras',19,33,3,4,8),(12,'zanis','peineris',25,97,3,3,8),(13,'paulius','valicnkas',26,32,2,4,6),(14,'martynas','echodas',31,22,4,3,7),(15,'Chris','Crammer',33,52,1,4,7),(16,'Avydas','Siksnius',25,37,2,7,6),(17,'Tomas','Dimsa',18,68,4,6,7),(18,'Edvinas','Seskus',23,7,3,4,7),(19,'Donatas','Sabeckis',27,32,2,10,1),(20,'Gabrielius','Maldunas',28,24,5,3,7),(21,'Loukas','Mavrokefalidis',31,48,3,3,7),(22,'Paulius','Jamkunas',33,90,2,8,10),(23,'Nikita','Balashov',38,41,2,6,10),(24,'Kevin','Pangos',40,83,4,4,10),(25,'Gary','Talton',35,17,3,2,7),(26,'Nicholas','Zeisloft',27,66,4,7,7),(27,'Justas','Sinica',29,42,1,8,4),(28,'Lorenzo ','Wiliams',23,69,1,4,8),(29,'Dovis','Bickauskis',27,55,3,10,6),(30,'Antanas','Kavaliauskas',28,82,4,4,7),(31,'Robert','Carter',22,11,2,3,6),(32,'Simas','Galdikas',23,26,2,10,5),(33,'Vasilije ','Micic',21,98,2,2,9),(34,'Katin','Reinhardt',18,93,2,5,8),(35,'Jerry','Jonson',34,32,2,7,10);
/*!40000 ALTER TABLE `zaidejas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zaidzia`
--

DROP TABLE IF EXISTS `zaidzia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zaidzia` (
  `fk_Arenaid` int(11) NOT NULL,
  `fk_Komandaid` int(11) NOT NULL,
  PRIMARY KEY (`fk_Arenaid`,`fk_Komandaid`),
  KEY `zaidzia2` (`fk_Komandaid`),
  CONSTRAINT `zaidzia` FOREIGN KEY (`fk_Arenaid`) REFERENCES `arena` (`id`),
  CONSTRAINT `zaidzia2` FOREIGN KEY (`fk_Komandaid`) REFERENCES `komanda` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zaidzia`
--

LOCK TABLES `zaidzia` WRITE;
/*!40000 ALTER TABLE `zaidzia` DISABLE KEYS */;
INSERT INTO `zaidzia` VALUES (2541,5),(2541,8),(2541,10),(87541,5),(87541,7),(254014,3),(254014,4),(254014,6),(520104,2),(520104,6),(520104,8),(3451141,1),(3451141,8),(18752574,2),(18752574,3),(18752574,4),(18752574,7);
/*!40000 ALTER TABLE `zaidzia` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-25 14:00:04
