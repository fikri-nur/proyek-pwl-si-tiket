-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Mar 2022 pada 07.47
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemesanan_tiket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bandaras`
--

CREATE TABLE `bandaras` (
  `id_bandara` int(10) UNSIGNED NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bandara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bandaras`
--

INSERT INTO `bandaras` (`id_bandara`, `kota`, `nama_bandara`, `created_at`, `updated_at`) VALUES
(1, 'Surabaya', 'Juanda International Airport', '2021-12-15 15:19:53', '2021-12-23 05:17:58'),
(2, 'Jakarta', 'Soekarno-Hatta', '2021-12-15 15:19:53', '2021-12-19 09:13:16'),
(3, 'Yogyakarta', 'Yogyakarta International Airport', '2021-12-17 15:05:10', '2021-12-17 15:05:15'),
(4, 'Bali', 'I Gusti Ngurah Rai International Airport', '2021-12-17 15:05:51', '2021-12-17 15:05:51'),
(5, 'Makassar', 'Bandar Udara Internasional Sultan Hasanuddin', '2021-12-19 09:30:03', '2021-12-19 09:30:03'),
(7, 'Medan', 'Bandar Udara Kualanamu', '2021-12-19 09:48:34', '2021-12-19 09:48:34'),
(11, 'Tes Kota', 'Tes Bandara', '2021-12-19 10:23:32', '2021-12-19 10:23:32'),
(12, 'Pasuruan', 'Bandara Pasuruan', '2021-12-23 05:21:54', '2021-12-23 05:21:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id_bookings` int(10) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_jadwal` int(10) UNSIGNED NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `waktu_pesan` datetime NOT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id_bookings`, `id_user`, `id_jadwal`, `jumlah_tiket`, `waktu_pesan`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 4, '2021-12-17 17:55:38', 'SUDAH DIBAYAR', '2021-12-17 10:55:38', '2021-12-17 10:55:38'),
(2, 1, 1, 2, '2021-12-18 14:47:45', 'SUDAH DIBAYAR', '2021-12-18 07:47:45', '2021-12-18 07:47:45'),
(3, 1, 2, 1, '2021-12-18 15:03:40', 'SUDAH DIBAYAR', '2021-12-18 08:03:40', '2021-12-18 08:03:40'),
(6, 1, 1, 2, '2021-12-19 11:57:44', 'SUDAH DIBAYAR', '2021-12-19 04:57:44', '2021-12-19 04:57:44'),
(7, 1, 1, 1, '2021-12-19 12:55:40', 'SUDAH DIBAYAR', '2021-12-19 05:55:40', '2021-12-19 05:55:40'),
(9, 5, 3, 2, '2021-12-19 17:12:24', 'BELUM DIBAYAR', '2021-12-19 10:12:24', '2021-12-19 10:12:24'),
(10, 6, 3, 3, '2021-12-19 17:19:52', 'SUDAH DIBAYAR', '2021-12-19 10:19:52', '2021-12-19 10:19:52'),
(12, 1, 4, 2, '2021-12-26 15:32:29', 'SUDAH DIBAYAR', '2021-12-26 08:32:29', '2021-12-26 08:32:29'),
(14, 10, 10, 3, '2021-12-27 02:42:15', 'SUDAH DIBAYAR', '2021-12-26 19:42:15', '2021-12-26 19:42:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwals`
--

CREATE TABLE `jadwals` (
  `id_jadwal` int(10) UNSIGNED NOT NULL,
  `id_pesawat` int(10) UNSIGNED NOT NULL,
  `id_bandara_asal` int(10) UNSIGNED NOT NULL,
  `id_bandara_tujuan` int(10) UNSIGNED NOT NULL,
  `tgl_pergi` date NOT NULL,
  `jam_pergi` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwals`
--

INSERT INTO `jadwals` (`id_jadwal`, `id_pesawat`, `id_bandara_asal`, `id_bandara_tujuan`, `tgl_pergi`, `jam_pergi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2021-12-19', '13:00:00', '2021-12-17 17:51:34', '2021-12-17 17:51:34'),
(2, 2, 2, 4, '2021-12-20', '20:00:00', '2021-12-17 17:51:34', '2021-12-17 17:51:34'),
(3, 3, 3, 5, '2021-12-21', '18:00:00', '2021-12-17 17:51:34', '2021-12-17 17:51:34'),
(4, 4, 3, 4, '2021-12-25', '11:00:00', '2021-12-23 07:26:01', '2021-12-23 07:26:01'),
(5, 6, 5, 2, '2021-12-26', '22:00:00', '2021-12-23 07:27:01', '2021-12-23 07:27:01'),
(8, 1, 1, 2, '2021-12-31', '08:25:00', '2021-12-26 18:25:13', '2021-12-26 18:25:13'),
(9, 3, 1, 2, '2021-12-31', '12:30:00', '2021-12-26 18:26:13', '2021-12-26 18:26:13'),
(10, 1, 1, 2, '2021-12-31', '18:00:00', '2021-12-26 18:26:42', '2021-12-26 18:26:42'),
(11, 9, 2, 3, '2021-12-31', '09:45:00', '2021-12-26 19:45:39', '2021-12-26 19:45:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_15_144218_create_bandaras_table', 1),
(12, '2021_12_16_141459_create_pesawats_table', 2),
(13, '2021_12_16_160605_create_bookings_table', 2),
(16, '2021_12_16_160605_create_jadwals_table', 3),
(17, '2021_12_17_161549_create_bookings_table', 4),
(18, '2021_12_18_145806_create_transaksis_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesawats`
--

CREATE TABLE `pesawats` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_pesawat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesawats`
--

INSERT INTO `pesawats` (`id`, `nama_pesawat`, `kelas`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Garuda Indonesia', 'First Class', 1250000, '2021-12-16 16:45:32', '2021-12-23 06:22:30'),
(2, 'Air Asia', 'Ekonomi', 450000, '2021-12-16 17:05:49', '2021-12-16 17:05:49'),
(3, 'Sriwijaya Air', 'Bussiness', 650000, '2021-12-19 13:05:49', '2021-12-19 13:00:49'),
(4, 'Lion Air', 'Ekonomi', 400000, '2021-12-23 06:09:43', '2021-12-23 06:09:43'),
(6, 'Citi Link', 'Bussiness', 700000, '2021-12-23 06:26:58', '2021-12-23 06:26:58'),
(9, 'Wakanda Air', 'Bussiness', 1250000, '2021-12-26 19:44:53', '2021-12-26 19:44:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_bookings` int(10) UNSIGNED NOT NULL,
  `metode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_bayar` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `waktu_bayar` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksis`
--

INSERT INTO `transaksis` (`id`, `id_bookings`, `metode`, `kode_bayar`, `total_bayar`, `waktu_bayar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Transfer Virtual Account', '808041146590', 1800000, '2021-12-18 16:32:33', '2021-12-18 09:32:33', '2021-12-18 09:32:33'),
(2, 2, 'Dana', '808021646245', 2500000, '2021-12-18 16:38:47', '2021-12-18 09:38:47', '2021-12-18 09:38:47'),
(3, 3, 'Link Aja', '808042579227', 450000, '2021-12-18 16:39:34', '2021-12-18 09:39:34', '2021-12-18 09:39:34'),
(4, 6, 'Dana', '808099209712', 2500000, '2021-12-19 11:58:17', '2021-12-19 04:58:17', '2021-12-19 04:58:17'),
(5, 7, 'Dana', '808087931088', 1250000, '2021-12-19 17:00:28', '2021-12-19 10:00:28', '2021-12-19 10:00:28'),
(6, 10, 'OVO', '808013431821', 1950000, '2021-12-19 17:20:44', '2021-12-19 10:20:44', '2021-12-19 10:20:44'),
(7, 12, 'Dana', '808020850499', 800000, '2021-12-26 15:32:52', '2021-12-26 08:32:52', '2021-12-26 08:32:52'),
(8, 14, 'Dana', '808035682589', 3750000, '2021-12-27 02:42:50', '2021-12-26 19:42:50', '2021-12-26 19:42:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) DEFAULT 2,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `nik`, `telp`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Amiruddin Fikri Nur', 'fikri@user.com', NULL, '3578260107020001', '085731296097', '$2y$10$wT2Mm4X05Ng7wL63MFnHOOzw79GUZLPSVZB5JsyqaYRDWN1EwmN/6', 2, NULL, '2021-12-16 11:47:55', '2021-12-16 11:47:55'),
(2, 'admin', 'admin@admin.com', NULL, '', '', '$2y$10$zYWiZnrKJ91ds8z03bHp5uxAUgsIgJvMxNZQ5q2sMSns8RYDeUXwm', 1, NULL, '2021-12-16 11:52:23', '2021-12-16 11:52:23'),
(3, 'Budi Setiadi', 'budi@user.com', NULL, '1234567890', '012345678901', '$2y$10$J/Ob.o6gtuzpE/LdZjxBoeRKPFai23uH484D2dHcixnQWhAYH/e4i', 2, NULL, '2021-12-18 10:25:22', '2021-12-18 10:25:22'),
(4, 'Antonio', 'anton@user.com', NULL, '1232137890', '120393011123', '$2y$10$M2bk503.KJYUjs0Wg2y7pOJdDwQ8npnBcV0Vu.6GfftPMF5WRJhAy', 2, NULL, '2021-12-19 03:16:17', '2021-12-26 08:59:31'),
(5, 'Ari', 'ari@user.com', NULL, '12345678', '0857132123', '$2y$10$jlnBw8wGVNeckt5C0vPcFurSFsFeKT65tkoKaE7rMxGQHtZv.yFl6', 2, NULL, '2021-12-19 10:11:32', '2021-12-26 08:59:38'),
(6, 'Fikri', 'tes@user.com', NULL, '123123', '1231312', '$2y$10$TzVNd3m.cahJKVmNaXM1IOpJFNbI0Fh1m5MM7UIP547lqkMTh37XW', 2, NULL, '2021-12-19 10:18:38', '2021-12-26 08:59:45'),
(7, 'Fikri Tes', 'tes1@user.com', NULL, '12345678q123123', '12345678', '$2y$10$3pIlsRhDheEZFEZcU1CdMONyXBHiO9eYAronGUTN4Rcjk6C6sLqbW', 2, NULL, '2021-12-26 08:48:21', '2021-12-26 08:48:21'),
(8, 'admin 2', 'admin2@admin.com', NULL, '123456789', '123456789', '$2y$10$KSLi98gierxa8ArqNxJ9uuzqkMgCVAKt32WglDMS.wnvlgJYLUMTO', 1, NULL, '2021-12-26 08:50:11', '2021-12-26 08:52:35'),
(9, 'Fikri Admin', 'fikri@admin.com', NULL, '123', '123', '$2y$10$QGZtTyglhVUVdtpYYr1CdOeQerJAMA2ButLBsImbBA09SVnwM70HW', 2, NULL, '2021-12-26 09:13:45', '2021-12-26 09:33:31'),
(10, 'Fikri', 'fikri2@user.com', NULL, '1234567891234567', '123456789012', '$2y$10$2mHGz.N3Rf0gbYW65CkCvOdGuO5ZgjXMiqbXsYApnSLEdVclKrwfq', 1, NULL, '2021-12-26 19:41:19', '2021-12-26 19:43:56');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bandaras`
--
ALTER TABLE `bandaras`
  ADD PRIMARY KEY (`id_bandara`);

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id_bookings`),
  ADD KEY `bookings_id_user_foreign` (`id_user`),
  ADD KEY `bookings_id_jadwal_foreign` (`id_jadwal`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `jadwals_id_pesawat_foreign` (`id_pesawat`),
  ADD KEY `jadwals_id_bandara_asal_foreign` (`id_bandara_asal`),
  ADD KEY `jadwals_id_bandara_tujuan_foreign` (`id_bandara_tujuan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesawats`
--
ALTER TABLE `pesawats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_id_bookings_foreign` (`id_bookings`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bandaras`
--
ALTER TABLE `bandaras`
  MODIFY `id_bandara` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id_bookings` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id_jadwal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesawats`
--
ALTER TABLE `pesawats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwals` (`id_jadwal`),
  ADD CONSTRAINT `bookings_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD CONSTRAINT `jadwals_id_bandara_asal_foreign` FOREIGN KEY (`id_bandara_asal`) REFERENCES `bandaras` (`id_bandara`),
  ADD CONSTRAINT `jadwals_id_bandara_tujuan_foreign` FOREIGN KEY (`id_bandara_tujuan`) REFERENCES `bandaras` (`id_bandara`),
  ADD CONSTRAINT `jadwals_id_pesawat_foreign` FOREIGN KEY (`id_pesawat`) REFERENCES `pesawats` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_id_bookings_foreign` FOREIGN KEY (`id_bookings`) REFERENCES `bookings` (`id_bookings`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
