-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 03 Jul 2020 pada 05.32
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandidat`
--

CREATE TABLE `kandidat` (
  `no_kandidat` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL,
  `suara` smallint(5) NOT NULL,
  `periode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kandidat`
--

INSERT INTO `kandidat` (`no_kandidat`, `nis`, `foto`, `visi`, `misi`, `suara`, `periode`) VALUES
(53, '0000000001', 'default.png', 'Meningkatkan keimanan dan ketaqwaan siswa SMA PGRI 1 Kota Serang terhadap Tuhan Yang Maha Esa, kepedulian siswa terhadap OSIS dan juga SMA PGRI 1 Kota Serang serta menciptakan generasi muda yang berkualitas, berakhlaq mulia dan amanah.', 'Mengoptimalkan kreativitas siswa SMA PGRI 1 Kota Serang melalui ekstrakurikuler dan meningkatkan kegiatan-kegiatan kegamaan bagi seluruh siswa SMA PGRI 1 Kota Serang.', 1, '2020'),
(55, '0000000002', '5ef881a736318.jpg', 'Menciptakan lingkungan sekolah yang menginspirasi dengan memiliki kebebasan berekspresi melalui karya seni dan membuahkan prestasi.', 'Mengajak para siswa untuk mengekspresikan diri melalui karya seni seperti seni musik dan seni rupa. Mempersiapkan para siswa yang memiliki minat berprofesi di bidang seni.', 2, '2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(5) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'X MIPA'),
(2, 'XI MIPA'),
(3, 'XII IPS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `probabilitas`
--

CREATE TABLE `probabilitas` (
  `id_probabilitas` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `no_kandidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `probabilitas`
--

INSERT INTO `probabilitas` (`id_probabilitas`, `nis`, `id_kelas`, `no_kandidat`) VALUES
(3, '0000000003', 1, 55),
(4, '0000000001', 1, 53),
(5, '0000000002', 1, 55);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_login`
--

CREATE TABLE `t_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_login`
--

INSERT INTO `t_login` (`id`, `username`, `password`, `level`) VALUES
(4, 'admin', '$2y$10$rm6xPX/Jls5VVlFhFRPFVu1uCQ4WHSbpGWAw6UnbcBF2oSz59K1yS', 'admin'),
(5, 'operator', '$2y$10$hRAwsdHL7PKDKYxvkJcvYuDH6vj.i7KtzLev33YHFoJIoLmeJHIby', 'operator'),
(6, '0000000001', '$2y$10$hyLl8JzXYxCxVlzzzbH0E.otoCRHiYbair55x45VBam6zhcmHUut.', 'user'),
(7, '0000000002', '$2y$10$KRMdaSk9yPfYrt.Irjy1yuWdElML2b/wLNLSnldqoOO4qA5/fyg4W', 'user'),
(8, '0000000003', '$2y$10$0t36wuMRp.ir8kgDA7KtgeJ85frmdSISUbSkakpH9bLzezRCiZOna', 'user'),
(9, '0000000004', '$2y$10$tHosmUx6tHsYMGpm1dA4iOh9z.rotd6hCS9snlrkAwoiEsN0c0dkS', 'user'),
(10, '0000000005', '$2y$10$z9w8sojqmpBsKXQhmrM1seJJbcgfQtiF5xu0somx3cdiTWwrB69um', 'user'),
(11, '0000000006', '$2y$10$hCu7NHsYjfqVyR96FDZbzeMELVgSMObIf7fK6bGO28vYF9z7mAzlm', 'user'),
(12, '0000000007', '$2y$10$K8WcXCKIrVG/0LN937nO9uQxBwlbU2R.Q3AJULPFVdEy34qRBDYuy', 'user'),
(13, '0000000007', '$2y$10$wi8fYGQbmH5aNC9LJxpvNe5Pia/M6x5EBG1BonFg7bqJCggmEHuzS', 'user'),
(14, '0000000008', '$2y$10$HTlU/pMp3qHlLpNYeKJESOg3A8OU5AyeFKAruis3d3muuin72Ls5K', 'user'),
(15, '0000000009', '$2y$10$KDsjwq2WcJOof/uMR7Yp9uk.Zu.Z.F7aRYFN8ptLUsA0VgZd3M/Me', 'user'),
(16, '0000000009', '$2y$10$UDVznh2Qez9YQgFfewHVye.ArfxJ0CJj/4P9Ou1WKpPNtpVDHC6hG', 'user'),
(17, '0000000010', '$2y$10$LWy5Pw3Vvd9wXZDMBKw8vOaIjFE1ogVQzEPh7EofRTHnU/uMRZaxG', 'user'),
(18, '2155', '$2y$10$XbP277csU9IxAjy0CNBMgOib4lSnZiku5XzGuv1Qo3dPkBWp8h0Lu', 'user'),
(19, '0000000011', '$2y$10$P8bc1ex7imJq/sLLs2/DkuR42ZyaxVXgw91wvcSxXA6EDPsahC0pq', 'user'),
(21, '4444', '$2y$10$4uEh/f8ggBUxVtROQii1/ewcCoeS4bWkUW91KgRkK0CyBg/.n75A.', 'user'),
(22, '333', '$2y$10$JZons2lXYatIiI2dp/s/Ver1oB5d/OsXWyM/44I3DAcha68xSElAe', 'user'),
(23, '5566', '$2y$10$XPue0s5Nj1Eeb7h3VylcqOZBBu6hMGx1Wo8C8gw4ImTR4/1dy/V2q', 'user'),
(24, '5555', '$2y$10$WJDdNWq21dqpoW8Mi2Wt6.8iNfZmU151Zlvrj6M6et.jFflHu0FfG', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `nis` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `pemilih` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`nis`, `password`, `nama`, `tanggal_lahir`, `jk`, `id_kelas`, `pemilih`) VALUES
('0000000001', 'mumu', 'Murnati', '1998-06-26', 'Perempuan', 1, 'y'),
('0000000002', 'pfDcPO2H', 'Ibrohim', '1995-06-28', 'Laki-laki', 1, 'y'),
('0000000003', 'rahasia.', 'Budiono', '2020-06-17', 'Laki-laki', 1, 'y'),
('0000000004', 'OsuLytDE', 'Ma\'mun', '1987-11-28', 'Laki-laki', 1, 'n'),
('0000000005', '2OUI3wWH', 'Miftahusurur', '2020-06-02', 'Laki-laki', 2, 'n'),
('0000000009', 'd6Z8YMmB', 'Rina', '2020-06-17', 'Perempuan', 3, 'n'),
('0000000010', '6pWb4h8l', 'Rima', '2020-06-04', 'Perempuan', 2, 'n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voter`
--

CREATE TABLE `voter` (
  `id_voter` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `no_kandidat` int(11) NOT NULL,
  `periode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`no_kandidat`),
  ADD KEY `kandidat_ibfk_1` (`nis`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `probabilitas`
--
ALTER TABLE `probabilitas`
  ADD PRIMARY KEY (`id_probabilitas`);

--
-- Indeks untuk tabel `t_login`
--
ALTER TABLE `t_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`id_voter`),
  ADD KEY `no_kandidat` (`no_kandidat`),
  ADD KEY `voter_ibfk_1` (`nis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `no_kandidat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `probabilitas`
--
ALTER TABLE `probabilitas`
  MODIFY `id_probabilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_login`
--
ALTER TABLE `t_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `voter`
--
ALTER TABLE `voter`
  MODIFY `id_voter` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  ADD CONSTRAINT `kandidat_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `users` (`nis`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `voter`
--
ALTER TABLE `voter`
  ADD CONSTRAINT `voter_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `users` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
