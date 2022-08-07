-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 07, 2022 at 10:03 AM
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

--
-- Dumping data for table `aspek`
--

INSERT INTO `aspek` (`id`, `aspek_penilaian`, `persentase`, `core`, `secondary`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'kecerdasan', 60, 20, 20, '2022-07-31', '2022-07-31', NULL),
(4, 'target kerja', 50, 30, 20, '2022-07-31', '2022-07-31', NULL),
(5, 'sikap kerja', 50, 30, 10, '2022-07-31', '2022-07-31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) UNSIGNED NOT NULL,
  `judul` char(255) NOT NULL,
  `slug` char(255) NOT NULL,
  `gambar` char(100) NOT NULL,
  `redaksi_foto` text DEFAULT NULL,
  `body` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `user_id` int(6) UNSIGNED NOT NULL,
  `skpd_id` int(6) UNSIGNED NOT NULL,
  `editor` int(3) DEFAULT NULL,
  `redaktur` int(3) DEFAULT NULL,
  `tag` char(160) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `slug`, `gambar`, `redaksi_foto`, `body`, `tanggal`, `user_id`, `skpd_id`, `editor`, `redaktur`, `tag`, `status`, `pesan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo', '', '1655092263_7d5a9cbaefd2489865da.png', 'redaksi foto', '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang meraih <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> pada ajang Sea Games ke-31 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/vietnam\">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>\r\n							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a>.</p>\r\n							<p>Bagaimana tidak, menurutnya dari 499 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> baik itu emas, perak, maupun perunggu.</p>\r\n							<p><br /><br />Artikel ini telah tayang di <a href=\"https://www.tribunnews.com/\">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href=\"https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam\">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>', '2022-07-30 08:59:40', 3, 3, NULL, NULL, 'tag1, tag2', 4, NULL, '2022-07-30', '2022-07-30', NULL),
(2, 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo', '', '1655092263_7d5a9cbaefd2489865da.png', 'redaksi foto', '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang meraih <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> pada ajang Sea Games ke-31 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/vietnam\">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>\r\n							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a>.</p>\r\n							<p>Bagaimana tidak, menurutnya dari 499 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> baik itu emas, perak, maupun perunggu.</p>\r\n							<p><br /><br />Artikel ini telah tayang di <a href=\"https://www.tribunnews.com/\">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href=\"https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam\">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>', '2022-07-30 08:59:40', 3, 5, NULL, NULL, 'tag1, tag2', 4, NULL, '2022-07-30', '2022-07-30', NULL),
(3, 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo', '', '1655092263_7d5a9cbaefd2489865da.png', 'redaksi foto', '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang meraih <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> pada ajang Sea Games ke-31 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/vietnam\">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>\r\n							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a>.</p>\r\n							<p>Bagaimana tidak, menurutnya dari 499 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> baik itu emas, perak, maupun perunggu.</p>\r\n							<p><br /><br />Artikel ini telah tayang di <a href=\"https://www.tribunnews.com/\">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href=\"https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam\">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>', '2022-07-30 08:59:40', 3, 5, NULL, NULL, 'tag1, tag2', 4, NULL, '2022-07-30', '2022-07-30', NULL),
(4, 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo', '', '1655092263_7d5a9cbaefd2489865da.png', 'redaksi foto', '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang meraih <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> pada ajang Sea Games ke-31 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/vietnam\">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>\r\n							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a>.</p>\r\n							<p>Bagaimana tidak, menurutnya dari 499 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> baik itu emas, perak, maupun perunggu.</p>\r\n							<p><br /><br />Artikel ini telah tayang di <a href=\"https://www.tribunnews.com/\">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href=\"https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam\">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>', '2022-07-30 08:59:40', 3, 2, NULL, NULL, 'tag1, tag2', 4, NULL, '2022-07-30', '2022-07-30', NULL),
(5, 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo', '', '1655092263_7d5a9cbaefd2489865da.png', 'redaksi foto', '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang meraih <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> pada ajang Sea Games ke-31 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/vietnam\">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>\r\n							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a>.</p>\r\n							<p>Bagaimana tidak, menurutnya dari 499 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> baik itu emas, perak, maupun perunggu.</p>\r\n							<p><br /><br />Artikel ini telah tayang di <a href=\"https://www.tribunnews.com/\">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href=\"https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam\">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>', '2022-07-30 08:59:40', 3, 5, NULL, NULL, 'tag1, tag2', 4, NULL, '2022-07-30', '2022-07-30', NULL),
(6, 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo', '', '1655092263_7d5a9cbaefd2489865da.png', 'redaksi foto', '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang meraih <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> pada ajang Sea Games ke-31 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/vietnam\">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>\r\n							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a>.</p>\r\n							<p>Bagaimana tidak, menurutnya dari 499 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> baik itu emas, perak, maupun perunggu.</p>\r\n							<p><br /><br />Artikel ini telah tayang di <a href=\"https://www.tribunnews.com/\">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href=\"https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam\">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>', '2022-07-30 08:59:40', 3, 2, NULL, NULL, 'tag1, tag2', 4, NULL, '2022-07-30', '2022-07-30', NULL),
(7, 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo', '', '1655092263_7d5a9cbaefd2489865da.png', 'redaksi foto', '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang meraih <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> pada ajang Sea Games ke-31 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/vietnam\">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>\r\n							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a>.</p>\r\n							<p>Bagaimana tidak, menurutnya dari 499 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> baik itu emas, perak, maupun perunggu.</p>\r\n							<p><br /><br />Artikel ini telah tayang di <a href=\"https://www.tribunnews.com/\">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href=\"https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam\">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>', '2022-07-30 08:59:40', 3, 3, NULL, NULL, 'tag1, tag2', 4, NULL, '2022-07-30', '2022-07-30', NULL),
(8, 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo', '', '1655092263_7d5a9cbaefd2489865da.png', 'redaksi foto', '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang meraih <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> pada ajang Sea Games ke-31 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/vietnam\">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>\r\n							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a>.</p>\r\n							<p>Bagaimana tidak, menurutnya dari 499 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> baik itu emas, perak, maupun perunggu.</p>\r\n							<p><br /><br />Artikel ini telah tayang di <a href=\"https://www.tribunnews.com/\">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href=\"https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam\">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>', '2022-07-30 08:59:40', 3, 2, NULL, NULL, 'tag1, tag2', 4, NULL, '2022-07-30', '2022-07-30', NULL),
(9, 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo', '', '1655092263_7d5a9cbaefd2489865da.png', 'redaksi foto', '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang meraih <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> pada ajang Sea Games ke-31 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/vietnam\">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>\r\n							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a>.</p>\r\n							<p>Bagaimana tidak, menurutnya dari 499 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> baik itu emas, perak, maupun perunggu.</p>\r\n							<p><br /><br />Artikel ini telah tayang di <a href=\"https://www.tribunnews.com/\">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href=\"https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam\">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>', '2022-07-30 08:59:40', 3, 3, NULL, NULL, 'tag1, tag2', 4, NULL, '2022-07-30', '2022-07-30', NULL),
(10, 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo', '', '1655092263_7d5a9cbaefd2489865da.png', 'redaksi foto', '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang meraih <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> pada ajang Sea Games ke-31 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/vietnam\">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>\r\n							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a>.</p>\r\n							<p>Bagaimana tidak, menurutnya dari 499 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> baik itu emas, perak, maupun perunggu.</p>\r\n							<p><br /><br />Artikel ini telah tayang di <a href=\"https://www.tribunnews.com/\">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href=\"https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam\">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>', '2022-07-30 08:59:40', 3, 3, NULL, NULL, 'tag1, tag2', 4, NULL, '2022-07-30', '2022-07-30', NULL),
(11, 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo', '', '1655092263_7d5a9cbaefd2489865da.png', 'redaksi foto', '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang meraih <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> pada ajang Sea Games ke-31 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/vietnam\">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>\r\n							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a>.</p>\r\n							<p>Bagaimana tidak, menurutnya dari 499 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> baik itu emas, perak, maupun perunggu.</p>\r\n							<p><br /><br />Artikel ini telah tayang di <a href=\"https://www.tribunnews.com/\">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href=\"https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam\">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>', '2022-07-30 08:59:40', 3, 2, NULL, NULL, 'tag1, tag2', 4, NULL, '2022-07-30', '2022-07-30', NULL),
(12, 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo', '', '1655092263_7d5a9cbaefd2489865da.png', 'redaksi foto', '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang meraih <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> pada ajang Sea Games ke-31 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/vietnam\">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>\r\n							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a>.</p>\r\n							<p>Bagaimana tidak, menurutnya dari 499 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> baik itu emas, perak, maupun perunggu.</p>\r\n							<p><br /><br />Artikel ini telah tayang di <a href=\"https://www.tribunnews.com/\">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href=\"https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam\">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>', '2022-07-30 08:59:40', 3, 4, NULL, NULL, 'tag1, tag2', 4, NULL, '2022-07-30', '2022-07-30', NULL),
(13, 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo', '', '1655092263_7d5a9cbaefd2489865da.png', 'redaksi foto', '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang meraih <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> pada ajang Sea Games ke-31 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/vietnam\">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>\r\n							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a>.</p>\r\n							<p>Bagaimana tidak, menurutnya dari 499 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> baik itu emas, perak, maupun perunggu.</p>\r\n							<p><br /><br />Artikel ini telah tayang di <a href=\"https://www.tribunnews.com/\">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href=\"https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam\">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>', '2022-07-30 08:59:40', 3, 4, NULL, NULL, 'tag1, tag2', 4, NULL, '2022-07-30', '2022-07-30', NULL),
(14, 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo', '', '1655092263_7d5a9cbaefd2489865da.png', 'redaksi foto', '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang meraih <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> pada ajang Sea Games ke-31 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/vietnam\">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>\r\n							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a>.</p>\r\n							<p>Bagaimana tidak, menurutnya dari 499 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> baik itu emas, perak, maupun perunggu.</p>\r\n							<p><br /><br />Artikel ini telah tayang di <a href=\"https://www.tribunnews.com/\">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href=\"https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam\">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>', '2022-07-30 08:59:40', 3, 3, NULL, NULL, 'tag1, tag2', 4, NULL, '2022-07-30', '2022-07-30', NULL),
(15, 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo', '', '1655092263_7d5a9cbaefd2489865da.png', 'redaksi foto', '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang meraih <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> pada ajang Sea Games ke-31 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/vietnam\">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>\r\n							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a>.</p>\r\n							<p>Bagaimana tidak, menurutnya dari 499 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> baik itu emas, perak, maupun perunggu.</p>\r\n							<p><br /><br />Artikel ini telah tayang di <a href=\"https://www.tribunnews.com/\">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href=\"https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam\">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>', '2022-07-30 08:59:40', 3, 5, NULL, NULL, 'tag1, tag2', 4, NULL, '2022-07-30', '2022-07-30', NULL),
(16, 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo', '', '1655092263_7d5a9cbaefd2489865da.png', 'redaksi foto', '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang meraih <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> pada ajang Sea Games ke-31 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/vietnam\">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>\r\n							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a>.</p>\r\n							<p>Bagaimana tidak, menurutnya dari 499 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> baik itu emas, perak, maupun perunggu.</p>\r\n							<p><br /><br />Artikel ini telah tayang di <a href=\"https://www.tribunnews.com/\">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href=\"https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam\">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>', '2022-07-30 08:59:40', 3, 2, NULL, NULL, 'tag1, tag2', 4, NULL, '2022-07-30', '2022-07-30', NULL),
(17, 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo', '', '1655092263_7d5a9cbaefd2489865da.png', 'redaksi foto', '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang meraih <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> pada ajang Sea Games ke-31 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/vietnam\">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>\r\n							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a>.</p>\r\n							<p>Bagaimana tidak, menurutnya dari 499 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> baik itu emas, perak, maupun perunggu.</p>\r\n							<p><br /><br />Artikel ini telah tayang di <a href=\"https://www.tribunnews.com/\">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href=\"https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam\">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>', '2022-07-30 08:59:40', 3, 3, NULL, NULL, 'tag1, tag2', 4, NULL, '2022-07-30', '2022-07-30', NULL),
(18, 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo', '', '1655092263_7d5a9cbaefd2489865da.png', 'redaksi foto', '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang meraih <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> pada ajang Sea Games ke-31 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/vietnam\">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>\r\n							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a>.</p>\r\n							<p>Bagaimana tidak, menurutnya dari 499 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> baik itu emas, perak, maupun perunggu.</p>\r\n							<p><br /><br />Artikel ini telah tayang di <a href=\"https://www.tribunnews.com/\">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href=\"https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam\">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>', '2022-07-30 08:59:40', 3, 2, NULL, NULL, 'tag1, tag2', 4, NULL, '2022-07-30', '2022-07-30', NULL),
(19, 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo', '', '1655092263_7d5a9cbaefd2489865da.png', 'redaksi foto', '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang meraih <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> pada ajang Sea Games ke-31 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/vietnam\">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>\r\n							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> para <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a>.</p>\r\n							<p>Bagaimana tidak, menurutnya dari 499 <a class=\"blue\" href=\"https://www.tribunnews.com/tag/atlet\">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class=\"blue\" href=\"https://www.tribunnews.com/tag/medali\">medali</a> baik itu emas, perak, maupun perunggu.</p>\r\n							<p><br /><br />Artikel ini telah tayang di <a href=\"https://www.tribunnews.com/\">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href=\"https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam\">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>', '2022-07-30 08:59:40', 3, 3, NULL, NULL, 'tag1, tag2', 4, NULL, '2022-07-30', '2022-07-30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) UNSIGNED NOT NULL,
  `judul` char(50) NOT NULL,
  `deskripsi` char(255) NOT NULL,
  `status` int(1) NOT NULL,
  `users_id` int(6) UNSIGNED NOT NULL,
  `gambar` char(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Dumping data for table `hitung_cf_sf_nt`
--

INSERT INTO `hitung_cf_sf_nt` (`id`, `id_pemain`, `aspek`, `core`, `second`, `total`) VALUES
(1, 2, '4', 2.5, 4.5, 1.65),
(2, 3, '4', 2, 4.5, 1.5),
(3, 4, '4', 3, 4.5, 1.8),
(4, 5, '4', 4, 2.5, 1.7),
(5, 6, '4', 3.5, 1.5, 1.35),
(6, 7, '4', 4.5, 4.5, 2.25),
(7, 8, '4', 4.5, 4.5, 2.25),
(8, 9, '4', 4.5, 4.5, 2.25),
(9, 10, '4', 4.5, 4.5, 2.25),
(10, 11, '4', 4.5, 4.5, 2.25),
(11, 12, '4', 4.5, 4.5, 2.25),
(12, 13, '4', 4.5, 4.5, 2.25);

-- --------------------------------------------------------

--
-- Table structure for table `inovasi`
--

CREATE TABLE `inovasi` (
  `id` int(6) UNSIGNED NOT NULL,
  `skpd_id` int(6) UNSIGNED NOT NULL,
  `judul` varchar(150) NOT NULL,
  `inovasi` varchar(350) NOT NULL,
  `pdf` char(150) NOT NULL,
  `publisher` tinyint(1) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `id_aspek`, `kriteria_penilaian`, `target`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 3, 'penguasaan product knowledge', '3', 'core', '2022-07-31', '2022-07-31', NULL),
(3, 3, 'penguasaan area', '2', 'core', '2022-07-31', '2022-07-31', NULL),
(4, 3, 'kreatif', '2', 'secondary', '2022-07-31', '2022-07-31', NULL),
(5, 3, 'logika', '2', 'core', '2022-07-31', '2022-07-31', NULL),
(6, 3, 'inovatif', '2', 'core', '2022-07-31', '2022-07-31', NULL),
(7, 4, 'komitmen', '3', 'core', '2022-07-31', '2022-07-31', NULL),
(8, 4, 'fokus', '4', 'core', '2022-07-31', '2022-07-31', NULL),
(9, 4, 'terukur', '2', 'secondary', '2022-07-31', '2022-07-31', NULL),
(10, 5, 'jujur', '2', 'core', '2022-07-31', '2022-07-31', NULL),
(11, 5, 'teliti dan bertanggung jawab', '2', 'core', '2022-07-31', '2022-07-31', NULL),
(12, 5, 'disiplin', '4', 'core', '2022-07-31', '2022-07-31', NULL),
(13, 5, 'pandai berkomunikasi', '4', 'secondary', '2022-07-31', '2022-07-31', NULL),
(14, 5, 'kerjasama', '1', 'secondary', '2022-07-31', '2022-07-31', NULL),
(15, 5, 'percaya diri', '2', 'secondary', '2022-07-31', '2022-07-31', NULL);

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

--
-- Dumping data for table `nilai_gap`
--

INSERT INTO `nilai_gap` (`id`, `id_aspek`, `id_kriteria`, `id_pemain`, `id_manager`, `nilai_kriteria`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 7, 2, 1, 2, '2022-08-06', '2022-08-06', NULL),
(2, 4, 8, 2, 1, 4, '2022-08-06', '2022-08-06', NULL),
(3, 4, 9, 2, 1, 1, '2022-08-06', '2022-08-06', NULL),
(4, 4, 7, 3, 1, 3, '2022-08-06', '2022-08-06', NULL),
(5, 4, 8, 3, 1, 4, '2022-08-06', '2022-08-06', NULL),
(6, 4, 9, 3, 1, 1, '2022-08-06', '2022-08-06', NULL),
(7, 4, 7, 4, 1, 1, '2022-08-06', '2022-08-06', NULL),
(8, 4, 8, 4, 1, 4, '2022-08-06', '2022-08-06', NULL),
(9, 4, 9, 4, 1, 1, '2022-08-06', '2022-08-06', NULL),
(10, 4, 7, 5, 1, 1, '2022-08-06', '2022-08-06', NULL),
(11, 4, 8, 5, 1, 2, '2022-08-06', '2022-08-06', NULL),
(12, 4, 9, 5, 1, 3, '2022-08-06', '2022-08-06', NULL),
(13, 4, 7, 6, 1, 3, '2022-08-06', '2022-08-06', NULL),
(14, 4, 8, 6, 1, 1, '2022-08-06', '2022-08-06', NULL),
(15, 4, 9, 6, 1, 4, '2022-08-06', '2022-08-06', NULL),
(16, 4, 7, 7, 1, 1, '2022-08-06', '2022-08-06', NULL),
(17, 4, 8, 7, 1, 1, '2022-08-06', '2022-08-06', NULL),
(18, 4, 9, 7, 1, 1, '2022-08-06', '2022-08-06', NULL),
(19, 4, 7, 8, 1, 1, '2022-08-06', '2022-08-06', NULL),
(20, 4, 8, 8, 1, 1, '2022-08-06', '2022-08-06', NULL),
(21, 4, 9, 8, 1, 1, '2022-08-06', '2022-08-06', NULL),
(22, 4, 7, 9, 1, 1, '2022-08-06', '2022-08-06', NULL),
(23, 4, 8, 9, 1, 1, '2022-08-06', '2022-08-06', NULL),
(24, 4, 9, 9, 1, 1, '2022-08-06', '2022-08-06', NULL),
(25, 4, 7, 10, 1, 1, '2022-08-06', '2022-08-06', NULL),
(26, 4, 8, 10, 1, 1, '2022-08-06', '2022-08-06', NULL),
(27, 4, 9, 10, 1, 1, '2022-08-06', '2022-08-06', NULL),
(28, 4, 7, 11, 1, 1, '2022-08-06', '2022-08-06', NULL),
(29, 4, 8, 11, 1, 1, '2022-08-06', '2022-08-06', NULL),
(30, 4, 9, 11, 1, 1, '2022-08-06', '2022-08-06', NULL),
(31, 4, 7, 12, 1, 1, '2022-08-06', '2022-08-06', NULL),
(32, 4, 8, 12, 1, 1, '2022-08-06', '2022-08-06', NULL),
(33, 4, 9, 12, 1, 1, '2022-08-06', '2022-08-06', NULL),
(34, 4, 7, 13, 1, 1, '2022-08-06', '2022-08-06', NULL),
(35, 4, 8, 13, 1, 1, '2022-08-06', '2022-08-06', NULL),
(36, 4, 9, 13, 1, 1, '2022-08-06', '2022-08-06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemain`
--

CREATE TABLE `pemain` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` char(150) NOT NULL,
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

INSERT INTO `pemain` (`id`, `nama`, `ttl`, `no_hp`, `alamat`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'carsa', '2001-03-28', '0812121212', '<p>bolaang mongondow utara</p>', '1659237554_997cd2341f8ee7abc1cc.jpg', '2022-07-30', '2022-07-31', NULL),
(3, 'irfan', '2000-02-02', '082345678', 'Jln Keakar No.120', '1659254896_305c028f573e541f1c27.jpg', '2022-07-31', '2022-07-31', NULL),
(4, 'ahmad', '2001-02-01', '082313212', 'Jln Keakar No.120', '1659255082_ad631303de7c1fb91780.jpg', '2022-07-31', '2022-07-31', NULL),
(5, 'syair', '2003-03-03', '082345678', 'Jln Keakar No.120', '1659255082_f8710e55e9554ed6fe8a.jpg', '2022-07-31', '2022-07-31', NULL),
(6, 'asep', '2000-01-01', '08234578', 'Jln Boroko Boroko Timur', '1659255145_ffc3b90397c9e3403e74.jpg', '2022-07-31', '2022-07-31', NULL),
(7, 'nanan', '2001-03-02', '089587841524', 'Bolaagn Mongondow Utara', '1659255145_6b09a2435cad3d159a17.jpg', '2022-07-31', '2022-07-31', NULL),
(8, 'ucok', '2001-02-01', '08321214', 'Jln Keakar No.120', '1659255262_910cd0771ebccced4243.jpg', '2022-07-31', '2022-07-31', NULL),
(9, 'encep', '2001-01-02', '0821254152', 'Bolaagn Mongondow Utara', '1659255262_d81c573c06536712ae98.jpg', '2022-07-31', '2022-07-31', NULL),
(10, 'sepri', '2003-02-05', '08234564', 'Jln Keakar No.120', '1659255262_03c3a35bf0526991cc85.jpg', '2022-07-31', '2022-07-31', NULL),
(11, 'kamtari', '2001-01-03', '08235245454', 'Jln Keakar No.120', '1659255262_48c601af54745733a0e6.jpg', '2022-07-31', '2022-07-31', NULL),
(12, 'uro', '2001-05-03', '0823456487', 'Gorontalo', '1659255262_09df1caef1724513e083.jpg', '2022-07-31', '2022-07-31', NULL),
(13, 'budi', '2022-07-04', '08222999', 'Jln Keakar No.120', '1659255262_0cf6e2efc60b9ac11ed9.jpg', '2022-07-31', '2022-07-31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) UNSIGNED NOT NULL,
  `judul` char(50) NOT NULL,
  `deskripsi` char(255) NOT NULL,
  `status` int(1) NOT NULL,
  `users_id` int(6) UNSIGNED NOT NULL,
  `sumber` char(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_posisi` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `skpd`
--

CREATE TABLE `skpd` (
  `id` int(6) UNSIGNED NOT NULL,
  `kode` int(3) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alias` char(150) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skpd`
--

INSERT INTO `skpd` (`id`, `kode`, `nama`, `alias`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 555, 'Dinas Komunikasi Informatika dan Persandian', 'diskominfo', NULL, NULL, NULL),
(2, 2, 'Dinas Kesehatan', 'dinkes', NULL, NULL, NULL),
(3, 3, 'Dinas Pertanian', 'distan', NULL, NULL, NULL),
(4, 4, 'Dinas Ketahanan Pangan', 'DKP', NULL, NULL, NULL),
(5, 5, 'Dinas Perdagangan', 'Disperindagkop', NULL, NULL, NULL),
(6, 6, 'Dinas Sosial', 'Dinsos', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE `statistik` (
  `id` int(11) UNSIGNED NOT NULL,
  `nik` char(18) NOT NULL,
  `desa` char(150) DEFAULT NULL,
  `jk` tinyint(1) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`id`, `nik`, `desa`, `jk`, `tahun`) VALUES
(1, '757105010301920002', 'kumo gakure', 1, 2020),
(2, '757105010301920002', 'hoshi gakure', 0, 2020),
(3, '757105010301920014', 'iwa gakure', 1, 2020),
(4, '757105010301920009', 'kumo gakure', 0, 2020),
(5, '757105010301920014', 'hoshi gakure', 0, 2020),
(6, '757105010301920016', 'suna gakure', 0, 2020),
(7, '757105010301920016', 'suna gakure', 1, 2020),
(8, '757105010301920017', 'iwa gakure', 0, 2020),
(9, '757105010301920008', 'kumo gakure', 1, 2020),
(10, '757105010301920014', 'kumo gakure', 0, 2020),
(11, '757105010301920003', 'konoha gakure', 1, 2020),
(12, '757105010301920003', 'hoshi gakure', 1, 2020),
(13, '757105010301920007', 'konoha gakure', 1, 2020),
(14, '757105010301920018', 'ame gakure', 1, 2020),
(15, '757105010301920013', 'iwa gakure', 1, 2020),
(16, '757105010301920020', 'kumo gakure', 1, 2020),
(17, '757105010301920017', 'oto gakure', 0, 2020),
(18, '757105010301920009', 'oto gakure', 0, 2020),
(19, '757105010301920014', 'iwa gakure', 1, 2020),
(20, '757105010301920018', 'kiri gakure', 1, 2020);

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
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`id`, `nama`, `thn_didirikan`, `no_telp`, `alamat`, `pelatih`, `manager`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'mania fc', 2016, '08223364', 'Bolaagn Mongondow Utara', 11, 12, '2022-07-31', '2022-07-31', NULL);

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
(1, '127.0.0.1', 'administrator', '$2y$12$OX4Ybrt4BSOOj5tH8ecq.OnNIJH/P6KoYC0MHhx7yIw/cKtuQlxmG', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1659829433, 1, 'Admin', NULL, '0'),
(11, '::1', 'zubair@gmail.com', '$2y$10$aJ5NSaAgbvWtlfz4E98Xd.mWNLBGroAA2fDJmK0Se.MyqFoBj4Wjq', 'zubair@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1659242806, NULL, 1, 'zubair pohontu', NULL, '08123'),
(12, '::1', 'hafit@gmail.com', '$2y$10$s4FOjTtFsYjPLF6YBVIL.eiEFuoZHon4HyZObMX3m35r8.liVU80K', 'hafit@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1659242867, NULL, 1, 'hafit polinggapo', NULL, '0822558899');

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
(13, 12, 3),
(14, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(6) UNSIGNED NOT NULL,
  `users_id` int(6) UNSIGNED DEFAULT NULL,
  `judul` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspek`
--
ALTER TABLE `aspek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gambar_users_id_foreign` (`users_id`);

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
-- Indexes for table `inovasi`
--
ALTER TABLE `inovasi`
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
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo_users_id_foreign` (`users_id`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skpd`
--
ALTER TABLE `skpd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistik`
--
ALTER TABLE `statistik`
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
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_users_id_foreign` (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspek`
--
ALTER TABLE `aspek`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hitung_cf_sf_nt`
--
ALTER TABLE `hitung_cf_sf_nt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inovasi`
--
ALTER TABLE `inovasi`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pemain`
--
ALTER TABLE `pemain`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skpd`
--
ALTER TABLE `skpd`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `statistik`
--
ALTER TABLE `statistik`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_gap`
--
ALTER TABLE `nilai_gap`
  ADD CONSTRAINT `nilai_gap_ibfk_1` FOREIGN KEY (`id_aspek`) REFERENCES `aspek` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_gap_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_gap_ibfk_3` FOREIGN KEY (`id_pemain`) REFERENCES `pemain` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_gap_ibfk_4` FOREIGN KEY (`id_manager`) REFERENCES `users` (`id`);

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `users_groups_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_groups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
