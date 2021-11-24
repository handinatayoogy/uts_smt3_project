-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2021 pada 03.44
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_smt3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(11) NOT NULL,
  `id_matakuliah` int(11) NOT NULL,
  `pertemuan` varchar(255) DEFAULT NULL,
  `materi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`id_detail`, `id_matakuliah`, `pertemuan`, `materi`) VALUES
(1, 1, 'Pertemuan 1', 'HTML'),
(4, 2, 'Pertemuan 1', 'Variable'),
(26, 1, 'Pertemuan 2', 'CSS'),
(28, 1, 'Pertemuan 3', 'JavaScript'),
(29, 3, 'Pertemuan 1', 'Photoshop');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode`, `nama`, `deskripsi`) VALUES
(1, 'DT001', 'PERANCANGAN WEB DASAR', 'Mempelajari tentang dasar-dasar dalam membuat website'),
(2, 'DT002', 'PERANCANGAN WEB 2', 'Mempelajari pembuatan website menggunakan framework'),
(3, 'DT003', 'MULTIMEDIA', 'Membahas tentang olah data multimedia (foto, animasi, videografi)'),
(4, 'DT004', 'PENGOLAHAN BASISDATA', NULL),
(5, 'DT005', 'E-COMMERCE', NULL),
(6, 'DT006', 'BAHASA INGGRIS II', NULL),
(9, 'DT007', 'BAHASA INDONESIA', NULL),
(12, 'DT008', 'SUCCESS SKIL', 'Membahas tentang potensi diri sendiri, agar dapat memanfaatkan semaksimal mungkin'),
(18, 'DT679', 'STRUKTUR DATA', ''),
(20, 'DT322', 'FISIKA', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_matakuliah` (`id_matakuliah`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`id_matakuliah`) REFERENCES `matakuliah` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
