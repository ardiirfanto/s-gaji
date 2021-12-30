-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Des 2021 pada 11.44
-- Versi server: 5.7.24
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s-rendra-gaji`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ajuan_lembur`
--

CREATE TABLE `ajuan_lembur` (
  `id` bigint(20) NOT NULL,
  `karyawan_id` bigint(20) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah_jam` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `unit_id` bigint(20) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `gaji` int(11) NOT NULL,
  `lembur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `user_id`, `unit_id`, `nama_karyawan`, `jekel`, `alamat`, `nohp`, `gaji`, `lembur`) VALUES
(3, 32, 1, 'Yumikora', 'L', 'Kudus', '089777666555', 2700000, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` bigint(20) NOT NULL,
  `karyawan_id` bigint(20) NOT NULL,
  `tgl` date NOT NULL,
  `masuk` datetime NOT NULL,
  `pulang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggajian`
--

CREATE TABLE `penggajian` (
  `id` bigint(20) NOT NULL,
  `karyawan_id` bigint(20) NOT NULL,
  `nominal_gaji` int(11) NOT NULL,
  `nominal_lembur` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tgl_cair` datetime NOT NULL,
  `status_terkirim` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` bigint(20) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` text,
  `role` enum('AP','P','K') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$nbkSNr0ZXTpH1FCgdWgeLubhajZCI3ru/mLqHuUowkLcBgogmssfC', 'AP'),
(2, 'dwiandra', '$2y$10$G82n2REnZ3rbZu5HpwZt/.faaKKbcKTV/StRs2qBooRE.uvQz9tom', 'AP'),
(32, 'yumi', '$2y$10$hWpTOn1dXfqYfCisyz3xuuAj5n8xfaS9W4/l8M7ZIaVRqJUmOWmt.', 'K');

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan`
--

CREATE TABLE `potongan` (
  `id` bigint(20) NOT NULL,
  `potongan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `potongan`
--

INSERT INTO `potongan` (`id`, `potongan`) VALUES
(1, 'BPJS Kesehatan'),
(2, 'BPJS Ketenagakerjaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan_karyawan`
--

CREATE TABLE `potongan_karyawan` (
  `id` bigint(20) NOT NULL,
  `karyawan_id` bigint(20) DEFAULT NULL,
  `potongan_id` bigint(20) DEFAULT NULL,
  `nominal` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `potongan_karyawan`
--

INSERT INTO `potongan_karyawan` (`id`, `karyawan_id`, `potongan_id`, `nominal`) VALUES
(1, 3, 1, 95600),
(2, 3, 2, 120000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id` bigint(20) NOT NULL,
  `nama_unit` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id`, `nama_unit`) VALUES
(1, 'HRD'),
(7, 'Keuangan'),
(8, 'IT'),
(9, 'R&D'),
(11, 'Produksi'),
(15, 'Office Boy'),
(16, 'Security');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ajuan_lembur`
--
ALTER TABLE `ajuan_lembur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawan_id` (`karyawan_id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indeks untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawan_id` (`karyawan_id`);

--
-- Indeks untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawan_id` (`karyawan_id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `potongan`
--
ALTER TABLE `potongan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `potongan_karyawan`
--
ALTER TABLE `potongan_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawan_id` (`karyawan_id`),
  ADD KEY `potongan_id` (`potongan_id`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ajuan_lembur`
--
ALTER TABLE `ajuan_lembur`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `potongan`
--
ALTER TABLE `potongan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `potongan_karyawan`
--
ALTER TABLE `potongan_karyawan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ajuan_lembur`
--
ALTER TABLE `ajuan_lembur`
  ADD CONSTRAINT `ajuan_lembur_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `karyawan_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  ADD CONSTRAINT `penggajian_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `potongan_karyawan`
--
ALTER TABLE `potongan_karyawan`
  ADD CONSTRAINT `potongan_karyawan_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `potongan_karyawan_ibfk_2` FOREIGN KEY (`potongan_id`) REFERENCES `potongan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
