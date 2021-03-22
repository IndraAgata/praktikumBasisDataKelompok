-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Mar 2021 pada 15.13
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_basisdata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengguna`
--

CREATE TABLE `data_pengguna` (
  `username` varchar(8) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `umur` int(2) NOT NULL,
  `email` varchar(25) NOT NULL,
  `notlpn` int(15) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pinjam`
--

CREATE TABLE `data_pinjam` (
  `username` varchar(8) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tanggalpinjam` date NOT NULL,
  `tanggalbayar` date NOT NULL,
  `status` enum('Lunas','Belum Lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pinjamform`
--

CREATE TABLE `data_pinjamform` (
  `Username` varchar(8) NOT NULL,
  `JumlahPinjaman` int(10) NOT NULL,
  `TanggaPinjam` date NOT NULL,
  `TanggalKembali` date NOT NULL,
  `Bunga` int(3) NOT NULL,
  `DeskripsiPinjam` text NOT NULL,
  `Jaminan` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(8) NOT NULL,
  `password` varchar(12) NOT NULL,
  `tipe_user` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_pinjam`
--

CREATE TABLE `rincian_pinjam` (
  `username` varchar(8) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tanggalpinjam` date NOT NULL,
  `tanggalbayar` int(11) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `bunga` float NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pengguna`
--
ALTER TABLE `data_pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `data_pinjam`
--
ALTER TABLE `data_pinjam`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `data_pinjamform`
--
ALTER TABLE `data_pinjamform`
  ADD PRIMARY KEY (`Username`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `rincian_pinjam`
--
ALTER TABLE `rincian_pinjam`
  ADD PRIMARY KEY (`nama`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_pengguna`
--
ALTER TABLE `data_pengguna`
  ADD CONSTRAINT `data_pengguna_ibfk_1` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_pinjam`
--
ALTER TABLE `data_pinjam`
  ADD CONSTRAINT `data_pinjam_ibfk_1` FOREIGN KEY (`username`) REFERENCES `data_pengguna` (`username`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_pinjamform`
--
ALTER TABLE `data_pinjamform`
  ADD CONSTRAINT `data_pinjamform_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `rincian_pinjam` (`nama`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`username`) REFERENCES `rincian_pinjam` (`nama`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rincian_pinjam`
--
ALTER TABLE `rincian_pinjam`
  ADD CONSTRAINT `rincian_pinjam_ibfk_1` FOREIGN KEY (`nama`) REFERENCES `data_pinjam` (`username`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
