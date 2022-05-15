-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2022 at 04:56 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atom_pocket`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `status_ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `nama`, `deskripsi`, `status_ID`, `created_at`, `updated_at`) VALUES
('22697d54-4a41-4a5c-9a5e-fd228bec6e8a', 'Pengeluaran', 'Kategori untuk pengeluaran', 'd8edcf2f-0f40-4fa8-a03f-b458a178f5be', '2022-05-15 08:36:20', '2022-05-15 08:36:20'),
('232e528c-19c9-48e7-b0c4-a31906ab379c', 'Pemasukan', 'Kategori Untuk Pemasukan', 'f136cddc-122e-4753-9c11-369c666d75cb', '2022-05-15 08:36:56', '2022-05-15 08:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `category_status`
--

CREATE TABLE `category_status` (
  `ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_category` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_status`
--

INSERT INTO `category_status` (`ID`, `status_category`, `created_at`, `updated_at`) VALUES
('67fb0995-5d45-472f-af96-44524bd9037b', 'Aktif', '2022-05-15 09:49:58', '2022-05-15 09:49:58'),
('d8edcf2f-0f40-4fa8-a03f-b458a178f5be', 'Aktif', '2022-05-15 08:36:20', '2022-05-15 08:36:20'),
('f136cddc-122e-4753-9c11-369c666d75cb', 'Aktif', '2022-05-15 08:36:56', '2022-05-15 08:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `dompet`
--

CREATE TABLE `dompet` (
  `ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `status_ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dompet`
--

INSERT INTO `dompet` (`ID`, `nama`, `referensi`, `deskripsi`, `status_ID`, `created_at`, `updated_at`) VALUES
('9283ace6-4e02-4155-ae1b-cc62c12f99d4', 'Dompet Utama', '202205', 'Bank BCA', '9445d679-19fb-4dcb-9c19-098626048fca', '2022-05-15 08:33:13', '2022-05-15 08:34:56'),
('ec71639f-c14d-46b5-ab01-b2758e94f461', 'Dompet Tagihan', '202205', 'Bank BCA', 'bbaa708f-4b41-4b7d-a575-8d3c25ed4c49', '2022-05-15 08:33:48', '2022-05-15 08:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `dompet_status`
--

CREATE TABLE `dompet_status` (
  `ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_dompet` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dompet_status`
--

INSERT INTO `dompet_status` (`ID`, `status_dompet`, `created_at`, `updated_at`) VALUES
('9445d679-19fb-4dcb-9c19-098626048fca', 'Aktif', '2022-05-15 08:33:13', '2022-05-15 08:33:13'),
('bbaa708f-4b41-4b7d-a575-8d3c25ed4c49', 'Aktif', '2022-05-15 08:33:48', '2022-05-15 08:33:48');

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
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(20, '2022_05_12_103049_create_dompet_status_table', 1),
(21, '2022_05_12_103217_create_dompet_table', 1),
(28, '2022_05_15_133930_create_category_status_table', 2),
(29, '2022_05_15_133942_create_category_table', 2),
(30, '2022_05_15_134045_create_transaksi_status_table', 2);

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
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `tanggal` date NOT NULL,
  `nilai` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dompet_ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`ID`, `kode`, `deskripsi`, `tanggal`, `nilai`, `dompet_ID`, `category_ID`, `status_ID`, `created_at`, `updated_at`) VALUES
('d89d46c9-f189-4ebb-85c5-b1c97333b312', 'WIN0496571', 'dagang', '2022-05-15', '3000000', '9283ace6-4e02-4155-ae1b-cc62c12f99d4', '22697d54-4a41-4a5c-9a5e-fd228bec6e8a', '0330b7fc-e830-4579-a8d9-10d746943fdd', '2022-05-15 08:40:20', '2022-05-15 08:40:20'),
('5b75f089-d00b-40e7-a78e-4ae0d370c03e', 'WIN8502641', 'Gaji', '2022-05-15', '10000000', '9283ace6-4e02-4155-ae1b-cc62c12f99d4', '232e528c-19c9-48e7-b0c4-a31906ab379c', '998262c6-c93e-4a9d-9f30-6fbe9d9e5ea1', '2022-05-15 08:40:58', '2022-05-15 08:40:58'),
('09408bf3-a517-4987-9cca-53c4da0d8db1', 'WOUT7894352', 'Setoran Rumah', '2022-05-15', '1000000', 'ec71639f-c14d-46b5-ab01-b2758e94f461', '22697d54-4a41-4a5c-9a5e-fd228bec6e8a', '87d38433-e2ad-4984-a3d6-355730f42cee', '2022-05-15 08:44:00', '2022-05-15 08:44:00'),
('136aeeb4-633b-4c6e-a9b4-838277746f63', 'WOUT0923872', 'Tagihan Rumah', '2022-05-15', '10000000', 'ec71639f-c14d-46b5-ab01-b2758e94f461', '22697d54-4a41-4a5c-9a5e-fd228bec6e8a', '18339b7a-9442-4457-8b25-6f324054d643', '2022-05-15 08:45:08', '2022-05-15 08:45:08'),
('cd321acc-172a-4784-9e61-4bed34d26dcc', 'WOUT5876312', 'Kebutahan pokok', '2022-05-15', '3000000', '9283ace6-4e02-4155-ae1b-cc62c12f99d4', '22697d54-4a41-4a5c-9a5e-fd228bec6e8a', 'b4e61911-cde7-434d-97a5-685156e11190', '2022-05-15 08:46:02', '2022-05-15 08:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_status`
--

CREATE TABLE `transaksi_status` (
  `ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_transaksi` enum('Masuk','Keluar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_status`
--

INSERT INTO `transaksi_status` (`ID`, `status_transaksi`, `created_at`, `updated_at`) VALUES
('0330b7fc-e830-4579-a8d9-10d746943fdd', 'Masuk', '2022-05-15 08:40:20', '2022-05-15 08:40:20'),
('18339b7a-9442-4457-8b25-6f324054d643', 'Masuk', '2022-05-15 08:45:08', '2022-05-15 08:45:08'),
('47da8135-931f-4ddd-a7d2-cae2abe2b21b', 'Masuk', '2022-05-15 08:39:53', '2022-05-15 08:39:53'),
('87d38433-e2ad-4984-a3d6-355730f42cee', 'Masuk', '2022-05-15 08:44:00', '2022-05-15 08:44:00'),
('998262c6-c93e-4a9d-9f30-6fbe9d9e5ea1', 'Masuk', '2022-05-15 08:40:58', '2022-05-15 08:40:58'),
('b4e61911-cde7-434d-97a5-685156e11190', 'Keluar', '2022-05-15 08:46:02', '2022-05-15 08:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `category_status_id_foreign` (`status_ID`);

--
-- Indexes for table `category_status`
--
ALTER TABLE `category_status`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dompet`
--
ALTER TABLE `dompet`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `dompet_status_id_foreign` (`status_ID`);

--
-- Indexes for table `dompet_status`
--
ALTER TABLE `dompet_status`
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD KEY `transaksi_dompet_id_foreign` (`dompet_ID`);

--
-- Indexes for table `transaksi_status`
--
ALTER TABLE `transaksi_status`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_status_id_foreign` FOREIGN KEY (`status_ID`) REFERENCES `category_status` (`ID`) ON UPDATE CASCADE;

--
-- Constraints for table `dompet`
--
ALTER TABLE `dompet`
  ADD CONSTRAINT `dompet_status_id_foreign` FOREIGN KEY (`status_ID`) REFERENCES `dompet_status` (`ID`) ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_dompet_id_foreign` FOREIGN KEY (`dompet_ID`) REFERENCES `dompet` (`ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
