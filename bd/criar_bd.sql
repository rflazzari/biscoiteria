-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: versys
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.14-MariaDB

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
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `id_material` int(11) NOT NULL AUTO_INCREMENT,
  `nm_material` varchar(45) CHARACTER SET latin1 NOT NULL,
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id_material`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES (1,'Ouro','\0'),(2,'Zircônia',''),(3,'Diamante',''),(6,'?????',''),(7,'Pedra',''),(8,'Pedra 3','\0'),(9,'KADAJ','\0'),(10,'TORO BOI',''),(13,'TORO 2','\0'),(14,'eeee',''),(15,'666','');
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `new_table`
--

DROP TABLE IF EXISTS `new_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `new_table` (
  `idnew_table` int(11) NOT NULL AUTO_INCREMENT,
  `dt_tab` datetime NOT NULL,
  PRIMARY KEY (`idnew_table`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `new_table`
--

LOCK TABLES `new_table` WRITE;
/*!40000 ALTER TABLE `new_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `new_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_produto` int(11) DEFAULT NULL,
  `nm_produto` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ds_produto` varchar(2000) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `ds_referencia` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `nm_linha` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `nr_secreto` decimal(6,2) DEFAULT NULL,
  `nr_1` decimal(6,2) DEFAULT NULL,
  `nr_2` decimal(6,2) DEFAULT NULL,
  `nr_posicao` int(11) DEFAULT NULL,
  `dh_producao` datetime DEFAULT NULL,
  `dh_criacao` datetime NOT NULL DEFAULT current_timestamp(),
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id_produto`),
  KEY `fk_prod_tp_prod` (`id_tipo_produto`),
  CONSTRAINT `fk_prod_tp_prod` FOREIGN KEY (`id_tipo_produto`) REFERENCES `tipo_produto` (`id_tipo_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela de produtos.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (1,1,'Bracelete','Joia grande','RF001','S',3.30,10.00,20.00,NULL,NULL,'2020-08-17 02:33:13',''),(3,1,'Bracelete','Joia grande','RF001','S',3.30,10.00,20.00,NULL,NULL,'2020-08-18 02:33:13',''),(4,1,'Bracelete','Joia grande','RF001','S',3.30,10.00,20.00,NULL,NULL,'2021-01-01 02:33:13',''),(5,1,'Bracelete','Joia grande','RF001','S',3.30,10.00,20.00,NULL,NULL,'2021-01-13 02:33:13',''),(6,1,'Bracelete','Joia grande','RF001','S',3.30,10.00,20.00,NULL,NULL,'2021-01-14 02:33:13',''),(7,1,'Bracelete 2','Joia grande 2','RF001','S',3.30,10.00,20.00,NULL,NULL,'2020-08-18 02:33:13',''),(8,2,'Bracelete 3','Joia grande 3','RF001','S',3.30,10.00,20.00,NULL,NULL,'2020-08-18 02:33:13',''),(9,3,'Bracelete 4','Joia grande 4','RF001','S',3.30,10.00,20.00,NULL,NULL,'2021-02-01 02:33:13',''),(11,2,'Bracelete 5','Joia grande 4','RF001','S',3.30,10.00,20.00,NULL,NULL,'2021-02-01 02:33:13','');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tamanho`
--

DROP TABLE IF EXISTS `tamanho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tamanho` (
  `id_tamanho` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `nr_tamanho` decimal(6,2) NOT NULL,
  `nr_diametro` decimal(6,2) DEFAULT NULL,
  `nr_peso` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`id_tamanho`),
  KEY `FK_TAM_PRODUTO_idx` (`id_produto`),
  CONSTRAINT `FK_TAM_PRODUTO` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tamanho`
--

LOCK TABLES `tamanho` WRITE;
/*!40000 ALTER TABLE `tamanho` DISABLE KEYS */;
/*!40000 ALTER TABLE `tamanho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_produto`
--

DROP TABLE IF EXISTS `tipo_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_produto` (
  `id_tipo_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nm_tipo_produto` varchar(45) CHARACTER SET latin1 NOT NULL,
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id_tipo_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_produto`
--

LOCK TABLES `tipo_produto` WRITE;
/*!40000 ALTER TABLE `tipo_produto` DISABLE KEYS */;
INSERT INTO `tipo_produto` VALUES (1,'Bracelete de ouro com zircônia',''),(2,'Anjo de ouro',''),(3,'Robô','');
/*!40000 ALTER TABLE `tipo_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_produto_material`
--

DROP TABLE IF EXISTS `tipo_produto_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_produto_material` (
  `id_tipo_produto` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo_produto`,`id_material`),
  KEY `FK_TPM_MATERIAL_IDX` (`id_material`),
  CONSTRAINT `FK_TPM_MATERIAL` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_TPM_TIPO_PRODUTO` FOREIGN KEY (`id_tipo_produto`) REFERENCES `tipo_produto` (`id_tipo_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_produto_material`
--

LOCK TABLES `tipo_produto_material` WRITE;
/*!40000 ALTER TABLE `tipo_produto_material` DISABLE KEYS */;
INSERT INTO `tipo_produto_material` VALUES (1,1),(1,2),(2,1);
/*!40000 ALTER TABLE `tipo_produto_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'versys'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-21 14:58:35
