-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2022 at 12:51 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kemahasiswaantedc`
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
-- Table structure for table `form_pengajuan_beasiswa`
--

CREATE TABLE `form_pengajuan_beasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mhs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggungan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slip_gaji` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal_proses` datetime DEFAULT NULL,
  `status` enum('daftar','proses','diterima','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'daftar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_pengajuan_beasiswa`
--

INSERT INTO `form_pengajuan_beasiswa` (`id`, `nim`, `nama_mhs`, `jurusan_id`, `gaji_ortu`, `tanggungan`, `slip_gaji`, `created_at`, `updated_at`, `tanggal_proses`, `status`) VALUES
(1, 'D111821092', 'dika', '2', '2000000', '2', '06-08-2022_8154.jpg', '2022-08-06 05:44:28', '2022-08-06 05:44:28', '2022-08-06 18:27:23', 'diterima'),
(2, 'D111821093', 'isal', '10', '2000000', '2', '06-08-2022_1.jpg', '2022-08-06 07:48:23', '2022-08-06 07:48:23', '2022-08-06 18:27:27', 'ditolak'),
(3, 'D111821092', 'Faihsal', '12', '120000', '2', '06-08-2022_image.png', '2022-08-06 10:20:07', '2022-08-06 10:20:07', '2022-08-06 18:27:30', 'diterima'),
(4, 'D111821093', 'syeh', '10', '2000000', '5', '06-08-2022_3x4.png', '2022-08-06 10:32:18', '2022-08-06 10:32:18', '2022-08-06 18:27:34', 'ditolak'),
(5, 'D111821097', 'syeh', '6', '2000000', '2', '07-08-2022_image.png', '2022-08-07 03:58:43', '2022-08-07 03:58:43', '2022-08-07 11:01:49', 'ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `form_pengajuan_proposal`
--

CREATE TABLE `form_pengajuan_proposal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ormawa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_awalkegiatan` date NOT NULL,
  `tgl_akhirkegiatan` date NOT NULL,
  `anggaran_dana` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `jurusan`, `created_at`, `updated_at`, `kuota`) VALUES
(1, 'Teknik Informatika', NULL, NULL, 0),
(2, 'Teknik Komputer', NULL, NULL, 0),
(3, 'Teknik Kimia', NULL, NULL, 0),
(4, 'Akuntansi', NULL, NULL, 0),
(5, 'Komputerisasi Akuntansi', NULL, NULL, 0),
(6, 'Teknik Elektro', NULL, NULL, 0),
(7, 'Teknik Mesin', NULL, NULL, 0),
(8, 'Mekanik Industri Desain', NULL, NULL, 0),
(9, 'Rekam Medik Dan Kesehatan', NULL, NULL, 0),
(10, 'Alat Berat', NULL, NULL, 0),
(11, 'Kontruksi Bangunan', NULL, NULL, 0),
(12, 'Teknik Otomasi', NULL, NULL, 0);

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
(5, '2022_06_28_101518_create_form_pengajuan_beasiswa_table', 1),
(6, '2022_06_28_102134_create_form_pengajuan_proposal_table', 1),
(7, '2022_07_20_120919_create_jurusans_table', 1),
(9, '2022_08_06_163008_add_status_to_form_pengajuan_beasiswa', 2),
(10, '2022_08_07_121853_add_kuota_to_jurusan_table', 3);

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'Personal Access Token', '170547530cbd505443fd7e1128e89ddfec3386a7d4c56b55f26903084690a6ab', '[\"*\"]', NULL, '2022-07-20 06:36:21', '2022-07-20 06:36:21'),
(2, 'App\\Models\\User', 2, 'Personal Access Token', '3638a94d85a8b838cf539bc46fc98979c00e737987dbd771001db2e94cef80d1', '[\"*\"]', NULL, '2022-07-20 06:37:58', '2022-07-20 06:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mahasiswa',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `level`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', '$2y$10$4YKWTk/d5m0djIE4Bbm6be9AICrMJktgZKeWqwIuCEW6J//AbsXMu', NULL, '2022-07-20 06:36:21', '2022-07-20 06:36:21'),
(2, 'sika', 'mahasiswa', 'dika', '$2y$10$R4Kk41dCzHtFf4qZ6KVEB.02lqsT3B.Oj3JnElJqUVu37zsGTK/42', NULL, '2022-07-20 06:37:58', '2022-07-20 06:37:58'),
(3, 'kise', 'mahasiswa', 'kise12', '$2y$10$in2ZyIoGl2x7pe03A6qVPebeaFsMCIDskiAMjg4lhQT6NwiWT/rri', NULL, '2022-07-20 08:02:35', '2022-07-20 08:02:35'),
(5, 'Kemahasiswaan', 'admin', 'Adminkemahasiswaan', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2022-07-20 19:48:46', '2022-07-20 19:48:46'),
(6, 'Teknik Informatika', 'prodi', 'iftedc', '$2y$10$LZnFzTOqF3QeEL5ZUmqlFOkA0zu0PKUu7XzkHqvu2lM7qtYeEF.B2', NULL, '2022-07-20 19:49:08', '2022-07-20 19:49:08'),
(7, 'isal', 'mahasiswa', 'isal12', '$2y$10$wMfpNS8tqW0RzKcIjsUAl.PB/lvFed.ETF5A8s9Z3Ae9rgqo.uH0.', NULL, '2022-08-04 02:45:30', '2022-08-04 02:45:30');

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
-- Indexes for table `form_pengajuan_beasiswa`
--
ALTER TABLE `form_pengajuan_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_pengajuan_proposal`
--
ALTER TABLE `form_pengajuan_proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_pengajuan_beasiswa`
--
ALTER TABLE `form_pengajuan_beasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `form_pengajuan_proposal`
--
ALTER TABLE `form_pengajuan_proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
