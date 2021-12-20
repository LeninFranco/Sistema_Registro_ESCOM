-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: registroescom
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alumnoexamen`
--

DROP TABLE IF EXISTS `alumnoexamen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumnoexamen` (
  `boleta` varchar(10) NOT NULL,
  `codigo` int NOT NULL,
  PRIMARY KEY (`boleta`,`codigo`),
  KEY `codigo` (`codigo`),
  CONSTRAINT `alumnoexamen_ibfk_1` FOREIGN KEY (`boleta`) REFERENCES `alumnos` (`boleta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `alumnoexamen_ibfk_2` FOREIGN KEY (`codigo`) REFERENCES `examenes` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnoexamen`
--

LOCK TABLES `alumnoexamen` WRITE;
/*!40000 ALTER TABLE `alumnoexamen` DISABLE KEYS */;
INSERT INTO `alumnoexamen` VALUES ('2020630106',1),('2020630123',1),('2020630174',1),('2020630373',1),('2020630542',1),('2020630578',1),('PE11110000',1),('PE12345678',1),('PP12345678',1),('2020000000',2),('2020000001',2),('PE00001111',2),('PP00000000',2);
/*!40000 ALTER TABLE `alumnoexamen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumnos` (
  `boleta` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `aPaterno` varchar(50) NOT NULL,
  `aMaterno` varchar(50) NOT NULL,
  `nacimiento` date NOT NULL,
  `curp` varchar(20) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `no` varchar(10) NOT NULL,
  `colonia` varchar(30) NOT NULL,
  `cp` varchar(7) NOT NULL,
  `alcaldia` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `escuela` varchar(50) NOT NULL,
  `entidad` varchar(30) NOT NULL,
  `promedio` varchar(5) NOT NULL,
  `opcion` varchar(10) NOT NULL,
  PRIMARY KEY (`boleta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES ('2020000000','José','Guadalupe','Pérez','2021-12-21','TOHA530902HSPRRN07','Hombre','Benito Juarez ','45','Del Mar','07130','Cuauhtémoc','chinopotterr@hotmail.com','5511223344','CECyT 11 Wilfrido Massieu Pérez','Ciudad de México','9.65','Segunda'),('2020000001','Ángel','López','Galván','2021-12-07','PERC561125MSPRMT03','Hombre','Mariagrigel','45','Compositores Mexicano','56817','Álvaro Obregón','tec.web.escom@gmail.com','5530279353','CECyT 1 Gonzalo Vázquez Vela','Aguascalientes','5.00','Primera'),('2020630106','Lenin Eduardo','Franco','Aguilar','2001-08-30','FAAL010830HDFRGNA4','Hombre','Robelini 21','18','Las Palmas 3','56535','Cuauhtémoc','leninfranco3008@hotmail.com','5610977807','CECyT 5 Benito Juárez García','Ciudad de México','9.52','Primera'),('2020630123','Armando','Molina','Ramirez','2001-06-19','GUSN010720MDFRNDA8','Hombre','Miguel Hidalgo','12','Las Lomas','07130','Azcapotzalco','creeper.lfa@gmail.com','5511223344','CECyT 7 Cuauhtémoc','Ciudad de México','8.96','Primera'),('2020630174','Nadia Itzel','Guerrero','Sanchez','2001-07-20','GUSN010720MDFRNDA8','Mujer','Mariagrigel','45','Compositores Mexicano','07130','Gustavo A. Madero','itzelnady@gmail.com','5530279353','CECyT 1 Gonzalo Vázquez Vela','Ciudad de México','9.4','Primera'),('2020630373','Evelyn','Venancio','Ponce','2001-06-29','VEPE010629MDFNNVB2','Mujer','Benito Juarez ','65','Del Mar','07130','Iztacalco','evenanciop1600@alumno.ipn.mx','5530279353','CECyT 10 Carlos Vallejo Márquez','Ciudad de México','9.5','Primera'),('2020630542','Alan Gibran','Cervantes','Solis','2001-03-04','CESA010304HGRRLLA7','Hombre','Elba ','49','Dario Galiana','40894','Álvaro Obregón','acervantess1901@alumno.ipn.mx','5511223344','Prepa 5','Guerrero','8.49','Primera'),('2020630578','Isaac','Rivera','Barron','1999-07-07','RIBI990707HDFVRS05','Hombre','Jitana','331','Del Mar','13270','Tláhuac','iriverab1900@alumno.ipn.mx','5517707896','ENP 1','Ciudad de México','8.24','Primera'),('PE00001111','Armando','Perez','Lopez','2021-12-13','PERC561125MSPRMT03','Hombre','Armata 12','32','Las Lomas','56817','Cuajimalpa','tec.web.escom@gmail.com','5511223344','CECyT 17 León Guanajuato','Hidalgo','8.54','Primera'),('PE11110000','Miranda','Perez','Lopez','2021-12-14','CESA010304HGRRLLA7','Hombre','Mariagrigel','32','Compositores Mexicano','07130','Álvaro Obregón','leninfranco3008@hotmail.com','5530279353','CECyT 5 Benito Juárez García','Aguascalientes','6.76','Tercera'),('PE12345678','Martin Eduardo','Franco','Hernandez','2021-12-22','FAAL010830HDFRGNA4','Hombre','Robelini 21','18','Las Lomas','07130','Iztapalapa','chinopotterr@hotmail.com','5619003786','Prepa 1 UNAM','Ciudad de México','8.54','Tercera'),('PP00000000','Ángel','Sánchez','López','2021-12-16','GUSN010720MDFRNDA8','Hombre','Ñoños','45','Del Mar','56817','Cuauhtémoc','creeper.lfa@gmail.com','5610977807','CECyT 1 Gonzalo Vázquez Vela','Aguascalientes','5.00','Primera'),('PP12345678','Kevin David','Franco','Aguilar','2002-04-08','FAAK010830HDFRGNA4','Hombre','Robelini 21','18','Las Palmas 3','56535','Cuauhtémoc','leninfranco3008@gmail.com','5610977807','CCH Vallejo','Ciudad de México','9.1','Segunda');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examenes`
--

DROP TABLE IF EXISTS `examenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `examenes` (
  `codigo` int NOT NULL,
  `lab` varchar(25) NOT NULL,
  `horario` datetime DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examenes`
--

LOCK TABLES `examenes` WRITE;
/*!40000 ALTER TABLE `examenes` DISABLE KEYS */;
INSERT INTO `examenes` VALUES (1,'Laboratorio 1','2022-01-24 10:30:00'),(2,'Laboratorio 2','2022-01-24 10:30:00'),(3,'Laboratorio 3','2022-01-24 10:30:00'),(4,'Laboratorio 4','2022-01-24 10:30:00'),(5,'Laboratorio 5','2022-01-24 10:30:00'),(6,'Laboratorio 6','2022-01-24 10:30:00'),(7,'Laboratorio 1','2022-01-24 12:15:00'),(8,'Laboratorio 2','2022-01-24 12:15:00'),(9,'Laboratorio 3','2022-01-24 12:15:00'),(10,'Laboratorio 4','2022-01-24 12:15:00'),(11,'Laboratorio 5','2022-01-24 12:15:00'),(12,'Laboratorio 6','2022-01-24 12:15:00'),(13,'Laboratorio 1','2022-01-24 14:00:00'),(14,'Laboratorio 2','2022-01-24 14:00:00'),(15,'Laboratorio 3','2022-01-24 14:00:00'),(16,'Laboratorio 4','2022-01-24 14:00:00'),(17,'Laboratorio 5','2022-01-24 14:00:00'),(18,'Laboratorio 6','2022-01-24 14:00:00');
/*!40000 ALTER TABLE `examenes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-17 12:25:00
