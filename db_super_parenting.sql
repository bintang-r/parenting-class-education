-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_bintang29.peserta
CREATE TABLE IF NOT EXISTS `peserta` (
  `id_peserta` int NOT NULL AUTO_INCREMENT,
  `nomor_ponsel` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `jenis_paket` varchar(50) DEFAULT NULL,
  `status_verifikasi` enum('belum','sudah') DEFAULT 'belum',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_peserta`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_bintang29.peserta: ~4 rows (approximately)
INSERT INTO `peserta` (`id_peserta`, `nomor_ponsel`, `email`, `nama`, `bukti_pembayaran`, `jenis_paket`, `status_verifikasi`, `created_at`, `updated_at`) VALUES
	(15, '0826347298432', 'bintang22@gmail.com', 'Bintang', 'public/storage/peserta/6070cf7ebc8005f8b3296b7a393af8462111fd16fd944135322f5d9cb678a081.jpg', 'Bronze', 'belum', '2025-05-18 12:47:46', '2025-05-18 12:47:46'),
	(16, '08573294892374', 'feryfadulrahman@gmail.com', 'Fery Fadul Rahman', 'public/storage/peserta/6070cf7ebc8005f8b3296b7a393af8462111fd16fd944135322f5d9cb678a081.jpg', 'Bronze', 'belum', '2025-05-18 14:00:31', '2025-05-18 14:00:31'),
	(17, '0862374', 'supriadi123@gmail.com', 'supriadi', 'public/storage/peserta/6070cf7ebc8005f8b3296b7a393af8462111fd16fd944135322f5d9cb678a081.jpg', 'Bronze', 'belum', '2025-05-18 14:01:50', '2025-05-18 14:01:50'),
	(18, '0826348723', 'farid@gmail.com', 'Farid', 'public/storage/peserta/6070cf7ebc8005f8b3296b7a393af8462111fd16fd944135322f5d9cb678a081.jpg', 'Platinum', 'belum', '2025-05-18 14:03:33', '2025-05-18 14:03:33');

-- Dumping structure for table db_bintang29.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_bintang29.users: ~2 rows (approximately)
INSERT INTO `users` (`id_user`, `email`, `password`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'muhbintang650@gmail.com', '$2y$10$8NYVu6zO1d53K3rpZt8tle6icwmGFaS0CYH/YyWzpCTCcnkFKeeAW', 'Muh Bintang Ramli', '2025-05-17 11:18:41', '2025-05-18 11:31:48'),
	(4, 'supriadi@gmail.com', '$2y$10$fr6f8zQYYNY1V4FUk7QpIu5qrm2JdzinwJBzUOdB4rinm/H7pvpVK', 'supriadi', '2025-05-18 11:35:46', '2025-05-18 11:35:46');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
