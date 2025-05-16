-- MySQL dump 10.13  Distrib 8.0.42, for Linux (x86_64)
--
-- Host: localhost    Database: pruebaTube
-- ------------------------------------------------------
-- Server version	8.0.42

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
-- Table structure for table `favoritos`
--

DROP TABLE IF EXISTS `favoritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `favoritos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `img` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `url` varchar(255) DEFAULT NULL,
  `nombre_Usuario` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nombre_Usuario` (`nombre_Usuario`),
  CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`nombre_Usuario`) REFERENCES `usuarios` (`nombre_Usuario`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favoritos`
--

LOCK TABLES `favoritos` WRITE;
/*!40000 ALTER TABLE `favoritos` DISABLE KEYS */;
INSERT INTO `favoritos` VALUES (1,'https://i.ytimg.com/vi/Er58LNrupOE/hqdefault.jpg','Mon Laferte - El Diablo (Audio Oficial)','Stream or Download El Diablo: https://MonLaferte.lnk.to/ElDiabloYD Mon Laferte (Vol. 1/ Edicion Especial) Out Now: ...','Er58LNrupOE','JUANTY'),(2,'https://i.ytimg.com/vi/SvRizHvF5hs/hqdefault.jpg','Mon Laferte - El Diablo (En Vivo)','Stream/Download Mon Laferta\'s latest single Amarrame: https://MonLaferte.lnk.to/AmarrameYD Listen to Mon Laferte (Vol.','SvRizHvF5hs','JUANTY'),(3,'https://i.ytimg.com/vi/0BzbvxDJVY8/hqdefault.jpg','Mon Laferte - El diablo (letra)','Monlaferte #el diablo #lyrics #letra Hola a todos! Espero que lo disfruten, suscríbete y también me puedes sugerir alguna canción ...','0BzbvxDJVY8','JUANTY'),(4,'https://i.ytimg.com/vi/3TMf1sVvO54/hqdefault.jpg','Compramos BUNKER y comienza NUEVO NEGOCIO (Grand Theft Auto V Enhanced) #6','Juegos -70% DTO: https://ene.ba/Vegetta ¡Recargas de juegos más baratos!: https://ene.ba/Vegetta-top-up ⭐️ MI ...','3TMf1sVvO54','JUANTY'),(5,'https://i.ytimg.com/vi/3TMf1sVvO54/hqdefault.jpg','Compramos BUNKER y comienza NUEVO NEGOCIO (Grand Theft Auto V Enhanced) #6','Juegos -70% DTO: https://ene.ba/Vegetta ¡Recargas de juegos más baratos!: https://ene.ba/Vegetta-top-up ⭐️ MI ...','3TMf1sVvO54','JUANTY'),(6,'https://i.ytimg.com/vi/OiIg34jrV9w/hqdefault.jpg','Wither vs GIGANTE ¿Quién ganara? Minecraft DAWNCRAFT','Juegos -70% DTO: https://ene.ba/Vegetta ¡Recargas de juegos más baratos!: https://ene.ba/Vegetta-top-up ⭐️ MI ...','OiIg34jrV9w','JUANTY'),(7,'https://i.ytimg.com/vi/0BzbvxDJVY8/hqdefault.jpg','Mon Laferte - El diablo (letra)','Monlaferte #el diablo #lyrics #letra Hola a todos! Espero que lo disfruten, suscríbete y también me puedes sugerir alguna canción ...','0BzbvxDJVY8','JUANTY'),(8,'https://i.ytimg.com/vi/IEGtTifUxzI/hqdefault.jpg','Mon Laferte - El Diablo (Acústico)','Stream or Download El Diablo: https://MonLaferte.lnk.to/ElDiabloYD Mon Laferte (Vol. 1/ Edicion Especial) Out Now: ...','IEGtTifUxzI','JUANTY'),(9,'https://i.ytimg.com/vi/BSVVCq-5qWQ/hqdefault.jpg','Rayos Laser - Se Borró','TOUR MUNDIAL - TICKETS AQUÍ: https://rayoslasermusica.com/tour/ Suscribete ▷▷▷ http://bit.ly/RayosYT MIRA LA OTRA ...','BSVVCq-5qWQ','JUANTY'),(10,'https://i.ytimg.com/vi/BSVVCq-5qWQ/hqdefault.jpg','Rayos Laser - Se Borró','TOUR MUNDIAL - TICKETS AQUÍ: https://rayoslasermusica.com/tour/ Suscribete ▷▷▷ http://bit.ly/RayosYT MIRA LA OTRA ...','BSVVCq-5qWQ','JUANTY'),(11,'https://i.ytimg.com/vi/hQsbS3SMGsg/hqdefault.jpg','Esperón - Tristella','Sígueme en redes: Instagram: https://www.instagram.com/esperon.mx/ Facebook: https://www.facebook.com/EsperonOficial ...','hQsbS3SMGsg','JUANTY');
/*!40000 ALTER TABLE `favoritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) NOT NULL,
  `apellido_P` varchar(50) NOT NULL,
  `apellido_M` varchar(50) NOT NULL,
  `nombre_Usuario` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `registro` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_nombre_usuario` (`nombre_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'JUAN FRANCISCO','OJEDA','becerra','JUANTY','JUAN@GMAIL.COM','123456','2025-05-15'),(2,'Saulo ','Mondragon','Rodriguez','warlord','saulo@gmail.com','123123','2025-05-15'),(3,'Saulo ','Mondragon','Rodriguez','qwewqe','wern@gmail.com','123','2025-05-15'),(4,'Montse ','Ojeda ','Becerra','mont','mont@gmail.com','1234','2025-05-15'),(5,'Mari','Belle','Gaz','mari','mari@ada.com','1234','2025-05-15'),(6,'Francisco','Ojeda','Becerra','gerco','manitas@gmail.com','1234','2025-05-15'),(7,'Ricardo','Rivas','Lopez','NAMASTE','mememe@gmail.com','1234567890','2025-05-16');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-16 19:04:34
