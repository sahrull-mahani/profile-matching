-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 15, 2022 at 06:58 PM
-- Server version: 10.5.15-MariaDB-0ubuntu0.21.10.1
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_profile_matching`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspek`
--

CREATE TABLE `aspek` (
  `id` int(10) UNSIGNED NOT NULL,
  `aspek_penilaian` char(150) NOT NULL,
  `persentase` tinyint(3) NOT NULL,
  `core` tinyint(5) NOT NULL,
  `secondary` tinyint(5) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'pelatih', 'Pelatih'),
(3, 'manager', 'Manager Tim');

-- --------------------------------------------------------

--
-- Table structure for table `hitung_cf_sf_nt`
--

CREATE TABLE `hitung_cf_sf_nt` (
  `id` int(11) NOT NULL,
  `id_pemain` int(11) NOT NULL,
  `aspek` char(150) NOT NULL,
  `core` double NOT NULL,
  `second` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_aspek` int(10) UNSIGNED NOT NULL,
  `kriteria_penilaian` char(150) NOT NULL,
  `target` enum('1','2','3','4') NOT NULL,
  `type` enum('core','secondary') NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(6) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-05-30-080850', 'App\\Database\\Migrations\\Skpd', 'default', 'App', 1659189571, 1),
(2, '2022-05-30-081424', 'App\\Database\\Migrations\\Groups', 'default', 'App', 1659189571, 1),
(3, '2022-05-30-081445', 'App\\Database\\Migrations\\Login_attempts', 'default', 'App', 1659189571, 1),
(4, '2022-05-30-081502', 'App\\Database\\Migrations\\Users', 'default', 'App', 1659189571, 1),
(5, '2022-05-30-081527', 'App\\Database\\Migrations\\Users_groups', 'default', 'App', 1659189571, 1),
(6, '2022-05-31-044435', 'App\\Database\\Migrations\\Berita', 'default', 'App', 1659189571, 1),
(7, '2022-06-06-054556', 'App\\Database\\Migrations\\Video', 'default', 'App', 1659189571, 1),
(8, '2022-06-07-040118', 'App\\Database\\Migrations\\Photo', 'default', 'App', 1659189571, 1),
(9, '2022-06-12-041104', 'App\\Database\\Migrations\\Statistik', 'default', 'App', 1659189571, 1),
(10, '2022-06-15-013844', 'App\\Database\\Migrations\\Gambar', 'default', 'App', 1659189571, 1),
(11, '2022-06-16-022525', 'App\\Database\\Migrations\\Inovasi', 'default', 'App', 1659189571, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_bobot`
--

CREATE TABLE `nilai_bobot` (
  `id` int(11) NOT NULL,
  `selisih` int(11) NOT NULL,
  `bobot_nilai` char(4) NOT NULL,
  `ket` char(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_bobot`
--

INSERT INTO `nilai_bobot` (`id`, `selisih`, `bobot_nilai`, `ket`) VALUES
(1, 0, '5', 'tidak ada selisih (kompetensi sesuai yang dibutuhkan)'),
(2, 1, '4.5', 'kompetensi individu kelebihan 1 tingkat/level'),
(3, -1, '4', 'kompetensi individu kekurangan 1 tingkat/level'),
(4, 2, '3.5', 'kompetensi individu kelebihan 2 tingkat/level'),
(5, -2, '3', 'kompetensi individu kekurangan 2 tingkat/level'),
(6, 3, '2.5', 'kompetensi individu kelebihan 3 tingkat/level'),
(7, -3, '2', 'kompetensi individu kekurangan 3 tingkat/level'),
(8, 4, '1.5', 'kompetensi individu kelebihan 4 tingkat/level'),
(9, -4, '1', 'kompetensi individu kekurangan 4 tingkat/level');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_gap`
--

CREATE TABLE `nilai_gap` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_aspek` int(10) UNSIGNED NOT NULL,
  `id_kriteria` int(10) UNSIGNED NOT NULL,
  `id_pemain` int(10) UNSIGNED NOT NULL,
  `id_manager` int(6) UNSIGNED NOT NULL,
  `nilai_kriteria` tinyint(3) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemain`
--

CREATE TABLE `pemain` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` char(150) NOT NULL,
  `id_posisi` int(10) UNSIGNED NOT NULL,
  `ttl` date NOT NULL,
  `no_hp` char(15) NOT NULL,
  `alamat` text NOT NULL,
  `foto` char(150) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemain`
--

INSERT INTO `pemain` (`id`, `nama`, `id_posisi`, `ttl`, `no_hp`, `alamat`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'pemain satu', 1, '1998-09-10', '082312340099', 'jln rajawali', '1660560623_a616dd0102b05ba73d65.jpg', '2022-08-15', '2022-08-15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_posisi` char(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id`, `nama_posisi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'penyerang', '2022-08-15', '2022-08-15', NULL),
(2, 'gelandang', '2022-08-15', '2022-08-15', NULL),
(3, 'bek', '2022-08-15', '2022-08-15', NULL),
(4, 'penjaga gawang', '2022-08-15', '2022-08-15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `id` int(11) NOT NULL,
  `nama` char(150) NOT NULL,
  `thn_didirikan` year(4) NOT NULL,
  `no_telp` char(15) NOT NULL,
  `alamat` text NOT NULL,
  `pelatih` int(11) UNSIGNED NOT NULL,
  `manager` int(11) UNSIGNED NOT NULL,
  `formasi` char(10) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`id`, `nama`, `thn_didirikan`, `no_telp`, `alamat`, `pelatih`, `manager`, `formasi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'mania fc', 2012, '043520091243', 'boroko', 4, 3, '4-4-3', '2022-08-15', '2022-08-15', NULL),
(2, 'ollot fc', 2010, '043520091243', 'ollot', 2, 5, '3-5-2', '2022-08-15', '2022-08-15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) NOT NULL,
  `last_login` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `nama_user`, `img`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$OX4Ybrt4BSOOj5tH8ecq.OnNIJH/P6KoYC0MHhx7yIw/cKtuQlxmG', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1660555866, 1, 'Admin', NULL, '0'),
(2, '127.0.0.1', 'andika@gmail.com', '$2y$10$OUdIQaX.6PzeANbPrOh2aeaIB1cStOKU/iRsaSEAtrTmHf2347OiS', 'andika@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1660556283, NULL, 1, 'andika pratama', NULL, '081233440989'),
(3, '127.0.0.1', 'wendi@gmail.com', '$2y$10$2v87vUoLmPi0wiwnzU472uFvUtK/UGKuXB6.b1kwFsV8cCgEqwZhe', 'wendi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1660556311, NULL, 1, 'wendi cagur', NULL, '081209908899'),
(4, '127.0.0.1', 'andre@gmail.com', '$2y$10$DComA/NuDHGk.BUjgesbcek.A911WQEI4iWFJ00vswuMi9HtUJksK', 'andre@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1660556333, NULL, 1, 'andre gemintang', NULL, '082288990099'),
(5, '127.0.0.1', 'surya@gmail.com', '$2y$10$9gk8V9Od24B5R2uBkSPeu.DykBW/D.Y1l8qOTh6Epdwggs/s.NIbG', 'surya@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1660556365, NULL, 1, 'surya wiradarma', NULL, '082344667788');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(16, 3, 3),
(18, 5, 3),
(19, 4, 2),
(20, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspek`
--
ALTER TABLE `aspek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hitung_cf_sf_nt`
--
ALTER TABLE `hitung_cf_sf_nt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_bobot`
--
ALTER TABLE `nilai_bobot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_gap`
--
ALTER TABLE `nilai_gap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aspek` (`id_aspek`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_pemain` (`id_pemain`),
  ADD KEY `id_manager` (`id_manager`);

--
-- Indexes for table `pemain`
--
ALTER TABLE `pemain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_groups_user_id_foreign` (`user_id`),
  ADD KEY `users_groups_group_id_foreign` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspek`
--
ALTER TABLE `aspek`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hitung_cf_sf_nt`
--
ALTER TABLE `hitung_cf_sf_nt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nilai_bobot`
--
ALTER TABLE `nilai_bobot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nilai_gap`
--
ALTER TABLE `nilai_gap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemain`
--
ALTER TABLE `pemain`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai_gap`
--
ALTER TABLE `nilai_gap`
  ADD CONSTRAINT `nilai_gap_ibfk_1` FOREIGN KEY (`id_aspek`) REFERENCES `aspek` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_gap_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_gap_ibfk_3` FOREIGN KEY (`id_pemain`) REFERENCES `pemain` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_gap_ibfk_4` FOREIGN KEY (`id_manager`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `users_groups_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_groups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
