-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: db_smartgames
-- ------------------------------------------------------
-- Server version	8.0.17

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
-- Table structure for table `tbl_endereco`
--

DROP TABLE IF EXISTS `tbl_endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `rua` varchar(100) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` char(2) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  PRIMARY KEY (`id_endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_endereco`
--

LOCK TABLES `tbl_endereco` WRITE;
/*!40000 ALTER TABLE `tbl_endereco` DISABLE KEYS */;
INSERT INTO `tbl_endereco` VALUES (1,'Av. Pres. Juscelino Kubitschek','2041','Vila Olímpia','São Paulo','SP','04543-011','-235884052','-466951784'),(2,'Av. das Nações Unidas','4777','Alto de Pinheiros','São Paulo','SP','04795-100','-235510895','-467240074'),(3,'Av. Roque Petroni Júnior','1089','Jardim das Acacias','São Paulo','SP','04707-900','-236235889','-467003111'),(4,'Av. Piracema','669','Tamboré','Barueri','SP','06460-030','-235042455','-468333515'),(5,'Av. dos Autonomistas','1828','Industrial Autonomistas','Osasco','SP','06020-010','-235431266','-467762779');
/*!40000 ALTER TABLE `tbl_endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_jogos`
--

DROP TABLE IF EXISTS `tbl_jogos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_jogos` (
  `id_jogo` int(11) NOT NULL AUTO_INCREMENT,
  `nome_jogo` varchar(100) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `plataforma` varchar(20) NOT NULL,
  `garantia` varchar(20) NOT NULL,
  `classificacao_indicativa` varchar(50) NOT NULL,
  `desenvolvedora` varchar(50) NOT NULL,
  `publicadora` varchar(50) NOT NULL,
  `data_lancamento` date NOT NULL,
  `url_imagem` varchar(70) NOT NULL,
  PRIMARY KEY (`id_jogo`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_jogos`
--

LOCK TABLES `tbl_jogos` WRITE;
/*!40000 ALTER TABLE `tbl_jogos` DISABLE KEYS */;
INSERT INTO `tbl_jogos` VALUES (1,'For Honor',89.99,'Ação','xbox','6 meses','Maiores de 16 anos','Ubisoft Montreal','Ubisoft Entertainment','2017-02-01','/img/jogos/acao/forhonor.jpg'),(2,'Dark Souls III',159.90,'Ação','pc','6 meses','Maiores de 16 anos','From Software','Bandai Namco','2016-04-12','/img/jogos/acao/darksouls.jpg'),(3,'God of War',125.90,'Ação','ps4','6 meses','Maiores de 18 anos','SIE Santa Monica Studio','Sony Computer Entertainment','2018-04-20','/img/jogos/acao/godofwar.jpg'),(4,'The Last of Us ',79.00,'Ação','ps4','6 meses','Maiores de 18 anos','Naughty Dog','Sony Computer Entertainment','2014-06-29','/img/jogos/acao/lastus.jpg'),(5,'Middle-earth: Shadow of War',119.90,'Aventura','pc','6 meses','Maiores de 16 anos','Monolith Productions','Warner Bros. Games','2017-10-10','/img/jogos/aventura/shadow.jpg'),(6,'Far Cry Primal',89.99,'Aventura','ps4','6 meses','Maiores de 18 anos','Ubisoft','Ubisoft','2016-02-23','/img/jogos/aventura/farcry.jpg'),(7,'Batman: Arkham Knight',49.99,'Aventura','xbox','6 meses','Maiores de 16 anos','Rocksteady Studios','Warner Bros','2015-06-23','/img/jogos/aventura/batman.jpg'),(8,'Uncharted 4: A Thief\'s End',69.99,'Aventura','ps4','6 meses','Maiores de 18 anos','Naughty Dog','Sony Computer Entertainment','2016-05-10','/img/jogos/aventura/uncharted.jpg'),(9,'Madden NFL 19',159.00,'Esporte','pc','6 meses','Livre para todas as idades','Electronic Arts','EA Tiburon','2018-08-10','/img/jogos/esporte/madden.jpg'),(10,'EFootball Pro Evolution Soccer 2020',119.90,'Esporte','pc','6 meses','Livre para todas as idades','PES Productions','Konami','2019-09-10','/img/jogos/esporte/pes20.jpg'),(11,'EFootball Pro Evolution Soccer 2020',151.90,'Esporte','xbox','6 meses','Livre para todas as idades','PES Productions','Konami','2019-09-10','/img/jogos/esporte/pes20xbox.jpg'),(12,'Fifa 20',249.90,'Esporte','ps4','6 meses','Livre para todas as idades','Electronic Arts','EA Sports','2019-09-27','/img/jogos/esporte/fifa20.jpg'),(13,'Forza Motorsport 6',139.99,'Corrida','xbox','6 meses','Livre para todas as idades','Turn 10 Studios','Microsoft Studios','2015-09-15','/img/jogos/corrida/forza6.jpg'),(14,'DiRT 4',123.49,'Corrida','ps4','6 meses','Livre para todas as idades','Codemasters','Feral Interactive','2017-06-06','/img/jogos/corrida/dirt.jpg'),(15,'F1 2018',179.99,'Corrida','xbox','6 meses','Livre para todas as idades','Codemasters','Codemasters','2018-08-24','/img/jogos/corrida/f12018.jpg'),(16,'Forza Horizon 4',194.95,'Corrida','pc','6 meses','Livre para todas as idades','Turn 10 Studios','Microsoft Game Studios','2011-10-11','/img/jogos/corrida/forza4.jpg'),(17,'Call of Duty: Black Ops III',229.90,'RPG','ps4','6 meses','Maiores de 18 anos','Treyarch','Activision','2015-11-06','/img/jogos/rpg/callofduty.jpg'),(18,'Fallout 4',70.00,'RPG','xbox','6 meses','Maiores de 18 anos','Bethesda Game Studios','Bethesda Softworks','2015-11-10','/img/jogos/rpg/fallout.jpg'),(19,'Tom Clancy\'s: Rainbow Six Siege',59.99,'RPG','pc','6 meses','Maiores de 18 anos','Ubisoft Montreal','Ubisoft Entertainment','2015-12-01','/img/jogos/rpg/rainbowpc.jpg'),(20,'Tom Clancy\'s: Rainbow Six Siege',149.00,'RPG','xbox','6 meses','Maiores de 16 anos','Ubisoft Montreal','Ubisoft Entertainment','2015-12-01','/img/jogos/rpg/rainbowxbox.jpg'),(21,'Tom Clancy\'s The Division 2',199.90,'RPG','ps4','6 meses','Maiores de 16 anos','Massive Entertainment','Ubisoft','2019-03-15','/img/jogos/rpg/division.jpg');
/*!40000 ALTER TABLE `tbl_jogos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_jogos_lojas`
--

DROP TABLE IF EXISTS `tbl_jogos_lojas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_jogos_lojas` (
  `id_jogo_loja` int(11) NOT NULL AUTO_INCREMENT,
  `id_jogo` int(11) NOT NULL,
  `id_loja` int(11) NOT NULL,
  `estoque` int(11) NOT NULL,
  PRIMARY KEY (`id_jogo_loja`),
  KEY `fk_jogos_lojas_id_jogo` (`id_jogo`),
  KEY `fk_lojas_jogos_id_loja` (`id_loja`),
  CONSTRAINT `fk_jogos_lojas_id_jogo` FOREIGN KEY (`id_jogo`) REFERENCES `tbl_jogos` (`id_jogo`),
  CONSTRAINT `fk_lojas_jogos_id_loja` FOREIGN KEY (`id_loja`) REFERENCES `tbl_lojas` (`id_loja`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_jogos_lojas`
--

LOCK TABLES `tbl_jogos_lojas` WRITE;
/*!40000 ALTER TABLE `tbl_jogos_lojas` DISABLE KEYS */;
INSERT INTO `tbl_jogos_lojas` VALUES (1,1,1,59),(2,1,3,43),(3,1,5,43),(4,2,4,51),(5,2,2,41),(6,2,1,59),(7,3,3,47),(8,3,5,38),(9,3,2,44),(10,4,1,43),(11,4,5,48),(12,4,4,39),(13,5,1,40),(14,5,2,42),(15,5,3,41),(16,6,4,51),(17,6,5,50),(18,6,1,55),(19,7,3,43),(20,7,5,60),(21,7,1,60),(22,8,2,59),(23,8,4,58),(24,8,3,38),(25,9,2,36),(26,9,5,58),(27,9,1,49),(28,10,3,50),(29,10,4,45),(30,10,5,43),(31,11,1,48),(32,11,2,59),(33,11,3,60),(34,12,4,45),(35,12,2,51),(36,12,3,57),(37,13,5,51),(38,13,4,38),(39,13,2,53),(40,14,2,43),(41,14,1,36),(42,14,5,35),(43,15,4,60),(44,15,3,42),(45,15,2,54),(46,16,1,54),(47,16,5,46),(48,16,3,39),(49,17,4,39),(50,17,2,53),(51,17,5,47),(52,18,1,38),(53,18,5,35),(54,18,3,56),(55,19,5,35),(56,19,2,53),(57,19,4,50),(58,20,2,44),(59,20,1,37),(60,20,3,51),(61,21,5,52),(62,21,4,46),(63,21,3,55);
/*!40000 ALTER TABLE `tbl_jogos_lojas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lojas`
--

DROP TABLE IF EXISTS `tbl_lojas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_lojas` (
  `id_loja` int(11) NOT NULL AUTO_INCREMENT,
  `nome_loja` varchar(100) NOT NULL,
  `andar` varchar(20) NOT NULL,
  `numero_loja` varchar(15) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  PRIMARY KEY (`id_loja`),
  KEY `fk_lojas_endereco_id_endereco` (`id_endereco`),
  CONSTRAINT `fk_lojas_endereco_id_endereco` FOREIGN KEY (`id_endereco`) REFERENCES `tbl_endereco` (`id_endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lojas`
--

LOCK TABLES `tbl_lojas` WRITE;
/*!40000 ALTER TABLE `tbl_lojas` DISABLE KEYS */;
INSERT INTO `tbl_lojas` VALUES (1,'JK Iguatemi','Piso Superior','235','1151587754',1),(2,'Shopping VillaLobos','Piso Superior','07A','1151898332',2),(3,'Morumbi Shopping','Piso Térreo','157','1154896615',3),(4,'Shopping Tamboré','Piso Térreo','22','1141911813',4),(5,'SuperShopping Osasco','1° piso','551','1150947817',5);
/*!40000 ALTER TABLE `tbl_lojas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-14 14:34:41
