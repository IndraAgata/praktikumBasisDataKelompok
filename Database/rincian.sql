-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2021 pada 16.12
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_praksql`
--

-- --------------------------------------------------------

--
-- Struktur untuk view `rincian`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rincian`  AS SELECT `rincian_pinjam`.`username` AS `username`, `rincian_pinjam`.`tanggalpinjam` AS `tanggalpinjam`, `rincian_pinjam`.`tanggalbayar` AS `tanggalbayar`, `rincian_pinjam`.`jumlah` AS `jumlah`, `rincian_pinjam`.`bunga` AS `bunga`, `rincian_pinjam`.`total` AS `total`, `approval`.`status_approve` AS `status_approve`, `data_pinjam`.`status` AS `status` FROM ((`rincian_pinjam` join `data_pinjam` on(`data_pinjam`.`username` = `rincian_pinjam`.`username`)) join `approval` on(`approval`.`username` = `rincian_pinjam`.`username`)) ;

--
-- VIEW `rincian`
-- Data: Tidak ada
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
