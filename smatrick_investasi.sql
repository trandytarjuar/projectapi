-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 11, 2021 at 01:22 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smatrick_investasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `nama_bank`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'BA', NULL, NULL, '2021-10-11 12:17:56', NULL, '2021-10-11 12:17:56', NULL),
(2, 'BCA', NULL, NULL, '2021-10-11 12:20:09', NULL, '2021-10-11 12:20:09', NULL),
(3, 'BRI', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'BNI', '2021-10-11 12:16:19', NULL, '2021-10-11 12:16:19', NULL, NULL, NULL),
(5, 'BNIpp', '2021-10-11 12:36:25', NULL, '2021-10-11 12:36:25', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

DROP TABLE IF EXISTS `mitra`;
CREATE TABLE IF NOT EXISTS `mitra` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) DEFAULT NULL,
  `tempat_lahir` varchar(250) DEFAULT NULL,
  `tanggal_lahir` datetime DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `kota` varchar(250) DEFAULT NULL,
  `rt` varchar(250) DEFAULT NULL,
  `rw` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kode_pos` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_hp` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_wa` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status_investor` enum('false','true') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status_profesional` enum('false','true','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status_pengusaha` enum('false','true','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nama_instansi` varchar(250) DEFAULT NULL,
  `jabatan` varchar(250) DEFAULT NULL,
  `kota_instansi` varchar(250) DEFAULT NULL,
  `kode_pos_instansi` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kemitraan_investasi` enum('true','false','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kemitraan_arisan_rumah` enum('false','true','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kemitraan_perencanaan_rumah` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kota`, `rt`, `rw`, `kode_pos`, `no_hp`, `no_wa`, `status_investor`, `status_profesional`, `status_pengusaha`, `nama_instansi`, `jabatan`, `kota_instansi`, `kode_pos_instansi`, `kemitraan_investasi`, `kemitraan_arisan_rumah`, `kemitraan_perencanaan_rumah`, `email`, `password`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-11 13:00:29', NULL, '2021-10-11 13:00:29', NULL, NULL, NULL),
(2, 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$dPEpwF6N9nIebphm821anuneqhwkw./g6EhkXkTwB01itJPrT4tjS', '2021-10-11 13:05:07', NULL, '2021-10-11 13:05:07', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

DROP TABLE IF EXISTS `proyek`;
CREATE TABLE IF NOT EXISTS `proyek` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `alamat` text,
  `luas_lahan` varchar(255) DEFAULT NULL,
  `jumlah_unit` int DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id`, `nama`, `alamat`, `luas_lahan`, `jumlah_unit`, `deskripsi`, `gambar`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(2, 'proyekb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'tes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'update 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'tes1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'tes1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'tes1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'update baru aja', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'update baru aja2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'proyek c', 'jalan proyek c', 'lt 170', 2, 'proyek c', '', '2021-10-11 10:35:29', NULL, '2021-10-11 10:35:29', NULL, NULL, NULL),
(13, 'proyek D', 'jalan proyek c', 'lt 170', 2, 'proyek c', '', '2021-10-11 10:36:35', NULL, '2021-10-11 10:36:35', NULL, NULL, NULL),
(14, 'proyek as', 'jalan proyek c', 'lt 170', 2, 'proyek c', NULL, '2021-10-11 10:37:47', NULL, '2021-10-11 10:37:47', NULL, NULL, NULL),
(15, 'proyek as', 'jalan proyek c', 'lt 170', 2, 'proyek c', 'C:\\wamp64\\tmp\\php1EEB.tmp', '2021-10-11 10:43:56', NULL, '2021-10-11 10:43:56', NULL, NULL, NULL),
(16, 'proyek as', 'jalan proyek c', 'lt 170', 2, 'proyek c', 'public/files/1cSaToQjD87KKRri9qksBjZJejU3D9VrdUnZQNlJ.png', '2021-10-11 10:48:02', NULL, '2021-10-11 10:48:02', NULL, NULL, NULL),
(17, 'proyek as', 'jalan proyek c', 'lt 170', 2, 'proyek c', 'public/files/n37tHhZi1cooK7AGfY7bxTBTxL8LqLSVHJ6SYUUM.png', '2021-10-11 10:49:05', 11, '2021-10-11 10:49:05', NULL, NULL, NULL),
(18, 'proyek asu', 'jalan proyek c', 'lt 170', 2, 'proyek c', 'public/files/XjMoPWVcL5e79nRXCcbL95NCWZFDO5rRMsctaOfD.png', '2021-10-11 10:53:31', 11, '2021-10-11 10:53:31', NULL, NULL, NULL),
(19, 'update baru aja2', 'jl ujan', 'LT 189', 10, 'maling', 'KTP.PNG', '2021-10-11 11:01:18', 11, '2021-10-11 11:44:41', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

DROP TABLE IF EXISTS `rekening`;
CREATE TABLE IF NOT EXISTS `rekening` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bank_id` int DEFAULT NULL,
  `no_rekening` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pemilik_rekening` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status_tampil` enum('false','true') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id`, `bank_id`, `no_rekening`, `pemilik_rekening`, `status_tampil`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, '77777', 'asu', '', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 3, NULL, NULL, NULL, '2021-10-11 12:38:32', NULL, '2021-10-11 12:38:32', NULL, NULL, NULL),
(3, 34, '123456789', NULL, NULL, '2021-10-11 12:39:23', NULL, '2021-10-11 12:39:23', NULL, NULL, NULL),
(4, 34, '123456789', 'wisnu', NULL, '2021-10-11 12:39:43', NULL, '2021-10-11 12:39:43', NULL, NULL, NULL),
(5, 341, '1234567891', 'wisnu', '', '2021-10-11 12:40:09', NULL, '2021-10-11 12:40:09', NULL, NULL, NULL),
(6, 341, '1234567891', 'wisnu', '', '2021-10-11 12:40:29', NULL, '2021-10-11 12:40:29', NULL, NULL, NULL),
(7, 341, '1234567891', 'ayu', 'true', '2021-10-11 12:43:46', NULL, '2021-10-11 12:43:46', NULL, NULL, NULL),
(8, 3412, '1234567891', 'ayu', 'true', '2021-10-11 12:46:20', NULL, '2021-10-11 12:46:20', NULL, NULL, NULL),
(9, 3412, '1234567891', 'ayu', 'true', '2021-10-11 12:46:29', NULL, '2021-10-11 12:46:29', NULL, NULL, NULL),
(10, 3412, '1234567891', 'ayu', 'true', '2021-10-11 12:46:32', NULL, '2021-10-11 12:46:32', NULL, NULL, NULL),
(11, 3412, '1234567891', 'ayu', 'true', '2021-10-11 12:46:47', NULL, '2021-10-11 12:46:47', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
