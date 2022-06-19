-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2022 at 03:22 PM
-- Server version: 5.7.32
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si-klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_18_095650_create_obats_table', 1),
(6, '2022_06_18_095948_create_signas_table', 1),
(7, '2022_06_18_101117_create_tindakans_table', 1),
(8, '2022_06_18_101751_create_pasiens_table', 1),
(9, '2022_06_18_110040_create_pegawais_table', 1),
(10, '2022_06_18_110358_create_wilayahs_table', 1),
(11, '2022_06_18_110437_create_polis_table', 1),
(12, '2022_06_18_111722_create_pemeriksaans_table', 1),
(13, '2022_06_18_112444_create_pendaftarans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `obats`
--

CREATE TABLE `obats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obats`
--

INSERT INTO `obats` (`id`, `nama_obat`, `kategori`, `jenis_obat`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Panadol Sirup 2', 'Generik', 'Sirup', '8500', '2022-06-18 23:20:47', '2022-06-18 23:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `pasiens`
--

CREATE TABLE `pasiens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasiens`
--

INSERT INTO `pasiens` (`id`, `nomor`, `nama`, `agama`, `telp`, `usia`, `alamat`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, '001-101', 'Sumardi', 'Islam', '078696958969', '67', 'Jalan Jalan', 'Pasien Baru', '2022-06-19 00:13:47', '2022-06-19 00:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawais`
--

INSERT INTO `pegawais` (`id`, `nama`, `email`, `password`, `telp`, `alamat`, `tanggal_lahir`, `agama`, `poli`, `created_at`, `updated_at`) VALUES
(3, 'Sukni', 'sukni@sukni', '$2y$10$4nl0MyTmW2loeTXCBxHuM.HREeIt/2.dghHc1ZlSYrMzRpdEfZTku', '09109273970', 'gk tau', '2022-06-03', 'Protestan', '3', '2022-06-18 09:17:11', '2022-06-18 09:17:11'),
(4, 'romla', 'romla@romla', '$2y$10$Fighs13/CiEXX8SBuprmtOR9bjpo8xByfguzZ1y8bmqXIao1EeYBi', '08791862968', 'jalan jalan', '2022-06-01', 'Islam', '2', '2022-06-18 22:05:09', '2022-06-18 22:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` int(11) NOT NULL,
  `id_pemeriksaan` varchar(255) NOT NULL,
  `jasa_dokter` int(11) NOT NULL,
  `biaya_tindakan` int(11) NOT NULL,
  `biaya_obat` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `id_pemeriksaan`, `jasa_dokter`, `biaya_tindakan`, `biaya_obat`, `total`, `created_at`, `updated_at`) VALUES
(1, '1', 35000, 20000, 8500, 63500, '2022-06-19 07:31:25', '2022-06-19 07:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaans`
--

CREATE TABLE `pemeriksaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pendaftaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tindakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil_pemeriksaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_pemeriksaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemeriksaans`
--

INSERT INTO `pemeriksaans` (`id`, `id_pendaftaran`, `id_tindakan`, `id_obat`, `hasil_pemeriksaan`, `keterangan_pemeriksaan`, `created_at`, `updated_at`) VALUES
(1, '2', '3', '1', 'ok sip mantap', 'mantap lanjutkan', '2022-06-19 05:53:20', '2022-06-19 05:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftarans`
--

CREATE TABLE `pendaftarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_layanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_poli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_dokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftarans`
--

INSERT INTO `pendaftarans` (`id`, `id_pasien`, `keluhan`, `jenis_layanan`, `id_poli`, `tanggal`, `id_dokter`, `created_at`, `updated_at`) VALUES
(2, '2', 'Sariawan', 'BPJS', '3', '2022-06-12', '4', '2022-06-19 01:25:39', '2022-06-19 01:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polis`
--

CREATE TABLE `polis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `polis`
--

INSERT INTO `polis` (`id`, `poli`, `created_at`, `updated_at`) VALUES
(2, 'Poli Umum', '2022-06-18 09:00:51', '2022-06-18 09:00:51'),
(3, 'Poli Gigi', '2022-06-18 09:00:57', '2022-06-18 09:00:57'),
(4, 'Poli Anak', '2022-06-18 09:01:03', '2022-06-18 09:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `signas`
--

CREATE TABLE `signas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `signa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tindakans`
--

CREATE TABLE `tindakans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tindakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tindakans`
--

INSERT INTO `tindakans` (`id`, `tindakan`, `created_at`, `updated_at`) VALUES
(1, 'Rawat Jalan', '2022-06-18 10:25:44', '2022-06-18 10:25:53'),
(3, 'Rawat Inap', '2022-06-19 05:14:47', '2022-06-19 05:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_wilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_pegawai`, `role`, `id_wilayah`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '3', 'Petugas', '2', NULL, '2022-06-18 21:56:50', '2022-06-18 21:56:50'),
(3, '4', 'Dokter', '3', NULL, '2022-06-18 22:20:18', '2022-06-18 22:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `wilayahs`
--

CREATE TABLE `wilayahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_wilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wilayahs`
--

INSERT INTO `wilayahs` (`id`, `nama_wilayah`, `created_at`, `updated_at`) VALUES
(2, 'Cihompas', '2022-06-18 08:38:14', '2022-06-18 08:38:14'),
(3, 'Ciwedi', '2022-06-18 21:50:13', '2022-06-18 21:50:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obats`
--
ALTER TABLE `obats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasiens`
--
ALTER TABLE `pasiens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pasiens_nomor_unique` (`nomor`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawais_email_unique` (`email`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaans`
--
ALTER TABLE `pemeriksaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftarans`
--
ALTER TABLE `pendaftarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `polis`
--
ALTER TABLE `polis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signas`
--
ALTER TABLE `signas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tindakans`
--
ALTER TABLE `tindakans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wilayahs`
--
ALTER TABLE `wilayahs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `obats`
--
ALTER TABLE `obats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemeriksaans`
--
ALTER TABLE `pemeriksaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendaftarans`
--
ALTER TABLE `pendaftarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polis`
--
ALTER TABLE `polis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `signas`
--
ALTER TABLE `signas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tindakans`
--
ALTER TABLE `tindakans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wilayahs`
--
ALTER TABLE `wilayahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
