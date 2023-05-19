# Login and Registration Form

    Open source php system to create user accounts, login and access to a dashboard


## 💻 Programming Languages

   PHP, HTML, JAVASCRIPT, CSS

   Using Bootstrap 5
   Using Fontawesome 5.15.3

# How to use:

   1) Download the source code
   2) Install the .php files inside your web server directory (you can use XAMPP or MAMP to emulate an Apache service)
   3) Create an SQL database (you can set up the db informations inside the php pages)
   4) Launch this query inside your database table:

```sql
-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.4.21-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database dblogin
CREATE DATABASE IF NOT EXISTS `dblogin` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `dblogin`;

-- Dump della struttura di tabella dblogin.dblogin
CREATE TABLE IF NOT EXISTS `dblogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella dblogin.dblogin: ~0 rows (circa)
/*!40000 ALTER TABLE `dblogin` DISABLE KEYS */;
INSERT INTO `dblogin` (`id`, `username`, `password`) VALUES
	(1, 'Admin', 'admin');
/*!40000 ALTER TABLE `dblogin` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

```

    You can ignore this part if you want to create your own table.

## 👥 Authors

- [@ZioMark](https://github.com/ZioMark13)
