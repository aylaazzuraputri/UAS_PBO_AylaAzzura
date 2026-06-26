-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2026 at 02:42 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_trpl1a_aylaazzura`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `semester` int DEFAULT NULL,
  `tarif_ukt_nominal` decimal(15,2) DEFAULT NULL,
  `jenis_pembiayaan` enum('mandiri','bidikmisi','prestasi') NOT NULL,
  `golongan_ukt` varchar(10) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `nomor_kip_kuliah` varchar(50) DEFAULT NULL,
  `dana_saku_subsidi` decimal(15,2) DEFAULT '0.00',
  `nama_instansi_beasiswa` varchar(100) DEFAULT NULL,
  `minimal_ipk_bersyarat` decimal(3,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama_mahasiswa`, `semester`, `tarif_ukt_nominal`, `jenis_pembiayaan`, `golongan_ukt`, `nama_wali`, `nomor_kip_kuliah`, `dana_saku_subsidi`, `nama_instansi_beasiswa`, `minimal_ipk_bersyarat`) VALUES
(1, '2026001', 'Budi Santoso', 2, 5000000.00, 'mandiri', 'UKT-4', 'Sutrisno', NULL, 0.00, NULL, 0.00),
(2, '2026002', 'Siti Aminah', 4, 7500000.00, 'mandiri', 'UKT-6', 'Ahmad Yani', NULL, 0.00, NULL, 0.00),
(3, '2026003', 'Andi Wijaya', 6, 4000000.00, 'mandiri', 'UKT-3', 'Bambang', NULL, 0.00, NULL, 0.00),
(4, '2026004', 'Dewi Lestari', 2, 8000000.00, 'mandiri', 'UKT-7', 'Ratna Sari', NULL, 0.00, NULL, 0.00),
(5, '2026005', 'Fajar Ramadhan', 1, 5000000.00, 'mandiri', 'UKT-4', 'Hidayat', NULL, 0.00, NULL, 0.00),
(6, '2026006', 'Maya Putri', 3, 6500000.00, 'mandiri', 'UKT-5', 'Susanti', NULL, 0.00, NULL, 0.00),
(7, '2026007', 'Rizky Pratama', 5, 4000000.00, 'mandiri', 'UKT-3', 'Joko', NULL, 0.00, NULL, 0.00),
(8, '2026008', 'Eko Prasetyo', 2, 0.00, 'bidikmisi', 'UKT-1', 'Parto', 'KIP2026001', 1200000.00, 'Kemendikbud', 2.75),
(9, '2026009', 'Nisa Fitri', 4, 0.00, 'bidikmisi', 'UKT-1', 'Yani', 'KIP2026002', 1200000.00, 'Kemendikbud', 2.75),
(10, '2026010', 'Hendra Kusuma', 6, 0.00, 'bidikmisi', 'UKT-1', 'Tono', 'KIP2026003', 1200000.00, 'Kemendikbud', 2.75),
(11, '2026011', 'Lina Marlina', 3, 0.00, 'bidikmisi', 'UKT-1', 'Dedi', 'KIP2026004', 1200000.00, 'Kemendikbud', 2.75),
(12, '2026012', 'Arif Rahman', 5, 0.00, 'bidikmisi', 'UKT-1', 'Wawan', 'KIP2026005', 1200000.00, 'Kemendikbud', 2.75),
(13, '2026013', 'Sari Indah', 1, 0.00, 'bidikmisi', 'UKT-1', 'Budi', 'KIP2026006', 1200000.00, 'Kemendikbud', 2.75),
(14, '2026014', 'Kevin Sanjaya', 4, 0.00, 'prestasi', 'UKT-0', 'Hendro', NULL, 500000.00, 'Djarum Foundation', 3.50),
(15, '2026015', 'Jessica Mila', 2, 0.00, 'prestasi', 'UKT-0', 'Susi', NULL, 750000.00, 'Tanoto Foundation', 3.25),
(16, '2026016', 'Taufik Hidayat', 6, 0.00, 'prestasi', 'UKT-0', 'Gatot', NULL, 1000000.00, 'Yayasan Supersemar', 3.00),
(17, '2026017', 'Melati Sukma', 3, 0.00, 'prestasi', 'UKT-0', 'Agung', NULL, 500000.00, 'Djarum Foundation', 3.50),
(18, '2026018', 'Bagas Kaffa', 5, 0.00, 'prestasi', 'UKT-0', 'Warno', NULL, 600000.00, 'Tanoto Foundation', 3.25),
(19, '2026019', 'Citra Kirana', 1, 0.00, 'prestasi', 'UKT-0', 'Hadi', NULL, 500000.00, 'Djarum Foundation', 3.50),
(20, '2026020', 'Dimas Seto', 2, 0.00, 'prestasi', 'UKT-0', 'Roni', NULL, 800000.00, 'Tanoto Foundation', 3.25);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
