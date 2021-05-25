-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2021 pada 16.03
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

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `user` (`username` VARCHAR(8), `password` VARCHAR(12), `tipe_user` ENUM('Anggota','Admin'))  BEGIN 
    INSERT INTO `pengguna`(`username`, `password`, `tipe_user`)  VALUES(username,password,tipe_user);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `admin_approve`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `admin_approve` (
`username` varchar(8)
,`tanggalpinjam` date
,`tanggalbayar` date
,`status` enum('Lunas','Belum Lunas')
,`status_approve` enum('Waiting','Approved','Deny')
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `approval`
--

CREATE TABLE `approval` (
  `id` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `status_approve` enum('Waiting','Approved','Deny') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `approval`
--

INSERT INTO `approval` (`id`, `username`, `status_approve`) VALUES
(32, 'finaltes', 'Approved');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_form`
--

CREATE TABLE `data_form` (
  `Username` varchar(8) NOT NULL,
  `JumlahPinjaman` int(10) NOT NULL,
  `TanggaPinjam` date NOT NULL,
  `TanggalKembali` date NOT NULL,
  `Bunga` int(3) NOT NULL,
  `DeskripsiPinjam` text NOT NULL,
  `Jaminan` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_form`
--

INSERT INTO `data_form` (`Username`, `JumlahPinjaman`, `TanggaPinjam`, `TanggalKembali`, `Bunga`, `DeskripsiPinjam`, `Jaminan`) VALUES
('finaltes', 100000, '2021-04-29', '2021-04-29', 100, 'sasa', 'KTP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengguna`
--

CREATE TABLE `data_pengguna` (
  `username` varchar(8) NOT NULL,
  `password` varchar(12) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `umur` int(2) NOT NULL,
  `email` varchar(25) NOT NULL,
  `notlpn` varchar(15) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pengguna`
--

INSERT INTO `data_pengguna` (`username`, `password`, `firstname`, `lastname`, `umur`, `email`, `notlpn`, `pekerjaan`) VALUES
('finaltes', 'finaltes', 'Final', 'Tes', 21, 'finaltes@gmail.com', '081212121', 'Tes'),
('imadeeko', '12345678', 'I Made Eko', 'Satria Wiguna', 21, 'niketutsekarinismp1@gmail', '93990023', 'Mahasiswa '),
('nada', '112233', 'gus', 'nada', 24, 'gusnada@gmail.com', '082341006497', 'mahasiswaimortal'),
('nara', 'februari', 'leonal', 'messi', 23, 'leonalmessi@gmail.com', '082333111444', 'nolep'),
('usertes1', '1234', 'I Made Eko', 'Satria Wiguna', 12, 'imade_eko_ays@outlook.co.', '201923124412', 'Mahasiswa '),
('usertes2', 'Sayang123@', '1808561054_I Made Ek', 'Wiguna', 21, 'imadeekosatriawiguna@gmai', '081803634659', 'Mahasiswa'),
('usertes3', 'Usertes3@', 'I Made Eko', 'Satria Wiguna', 12, 'admin@stis.ac.id', '93990023', 'sssss');

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

--
-- Dumping data untuk tabel `data_pinjam`
--

INSERT INTO `data_pinjam` (`username`, `Nama`, `jumlah`, `tanggalpinjam`, `tanggalbayar`, `status`) VALUES
('finaltes', 'Final Tes', 100000, '2021-04-29', '2021-04-29', 'Belum Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(12) NOT NULL,
  `tipe_user` enum('Anggota','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `tipe_user`) VALUES
(30, 'finaltes', 'finaltes', 'Anggota'),
(1, 'nada', '112233', 'Anggota'),
(2, 'nara', 'februari', 'Admin'),
(3, 'usertes1', '1234', 'Anggota'),
(28, 'usertes2', 'Sayang123@', 'Anggota'),
(27, 'usertes3', 'Usertes3@', 'Anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_pinjam`
--

CREATE TABLE `rincian_pinjam` (
  `username` varchar(8) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tanggalpinjam` date NOT NULL,
  `tanggalbayar` date NOT NULL,
  `jumlah` int(10) NOT NULL,
  `bunga` float NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rincian_pinjam`
--

INSERT INTO `rincian_pinjam` (`username`, `nama`, `tanggalpinjam`, `tanggalbayar`, `jumlah`, `bunga`, `total`) VALUES
('finaltes', 'finaltes', '2021-04-29', '2021-04-29', 100000, 100, 100000);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `user`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `user` (
`id` int(11)
,`username` varchar(8)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `admin_approve`
--
DROP TABLE IF EXISTS `admin_approve`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_approve`  AS SELECT `data_pinjam`.`username` AS `username`, `data_pinjam`.`tanggalpinjam` AS `tanggalpinjam`, `data_pinjam`.`tanggalbayar` AS `tanggalbayar`, `data_pinjam`.`status` AS `status`, `approval`.`status_approve` AS `status_approve` FROM (`data_pinjam` join `approval` on(`data_pinjam`.`username` = `approval`.`username`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `user`
--
DROP TABLE IF EXISTS `user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user`  AS SELECT `pengguna`.`id` AS `id`, `pengguna`.`username` AS `username` FROM `pengguna` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_form`
--
ALTER TABLE `data_form`
  ADD PRIMARY KEY (`Username`);

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
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `rincian_pinjam`
--
ALTER TABLE `rincian_pinjam`
  ADD PRIMARY KEY (`nama`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `approval`
--
ALTER TABLE `approval`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_form`
--
ALTER TABLE `data_form`
  ADD CONSTRAINT `data_form_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `rincian_pinjam` (`nama`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_pinjam`
--
ALTER TABLE `data_pinjam`
  ADD CONSTRAINT `data_pinjam_ibfk_1` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`username`) REFERENCES `data_pengguna` (`username`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rincian_pinjam`
--
ALTER TABLE `rincian_pinjam`
  ADD CONSTRAINT `rincian_pinjam_ibfk_1` FOREIGN KEY (`nama`) REFERENCES `data_pinjam` (`username`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
