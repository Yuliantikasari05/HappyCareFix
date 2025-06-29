-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2025 at 04:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectfix2`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `excerpt` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `views_count` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `content`, `excerpt`, `image`, `meta_title`, `meta_description`, `published`, `featured`, `views_count`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Benefits of Regular Health Checkups', 'benefits-of-regular-health-checkups', 'Regular health checkups are essential for maintaining good health and preventing diseases. During these checkups, healthcare professionals can detect potential health issues early, when they are most treatable. This proactive approach to healthcare can save lives and reduce healthcare costs in the long run. Regular checkups typically include vital sign measurements, blood tests, and screenings for common conditions like diabetes, high blood pressure, and cancer.', 'Learn about the importance of regular health checkups and how they can help prevent serious health issues.', NULL, NULL, NULL, 1, 1, 150, 1, NULL, '2025-06-29 04:01:03', '2025-06-29 04:01:03'),
(2, 'Mental Health Awareness', 'mental-health-awareness', 'Mental health is just as important as physical health, yet it often receives less attention. Mental health conditions affect millions of people worldwide and can significantly impact quality of life. It is important to recognize the signs of mental health issues and seek help when needed. Common mental health conditions include depression, anxiety, bipolar disorder, and PTSD. Treatment options include therapy, medication, and lifestyle changes.', 'Understanding the importance of mental health and recognizing when to seek professional help.', NULL, NULL, NULL, 1, 0, 89, 1, NULL, '2025-06-29 04:01:03', '2025-06-29 04:01:03'),
(3, 'Healthy Eating Habits', 'healthy-eating-habits', 'Developing healthy eating habits is crucial for overall wellness and disease prevention. A balanced diet should include a variety of fruits, vegetables, whole grains, lean proteins, and healthy fats. It is important to limit processed foods, sugary drinks, and excessive amounts of sodium and saturated fat. Meal planning and preparation can help you maintain healthy eating habits even with a busy schedule.', 'Tips for maintaining a healthy diet and developing sustainable eating habits.', NULL, NULL, NULL, 1, 0, 67, 1, NULL, '2025-06-29 04:01:03', '2025-06-29 04:01:03'),
(4, 'Exercise and Physical Fitness', 'exercise-and-physical-fitness', 'Regular physical activity is one of the most important things you can do for your health. Exercise helps control weight, reduces the risk of heart disease, strengthens bones and muscles, and improves mental health. The recommended amount of exercise for adults is at least 150 minutes of moderate-intensity aerobic activity per week, plus muscle-strengthening activities on two or more days per week.', 'Discover the benefits of regular exercise and how to incorporate physical activity into your daily routine.', NULL, NULL, NULL, 1, 1, 203, 1, NULL, '2025-06-29 04:01:03', '2025-06-29 04:01:03'),
(5, 'Sleep and Its Impact on Health', 'sleep-and-its-impact-on-health', 'Quality sleep is essential for good health and well-being. During sleep, your body repairs itself and your brain consolidates memories. Poor sleep can lead to a variety of health problems, including obesity, diabetes, cardiovascular disease, and weakened immune function. Most adults need 7-9 hours of sleep per night. Good sleep hygiene practices include maintaining a consistent sleep schedule, creating a comfortable sleep environment, and avoiding caffeine and electronics before bedtime.', 'Learn about the importance of quality sleep and tips for improving your sleep habits.', NULL, NULL, NULL, 0, 0, 45, 1, NULL, '2025-06-29 04:01:03', '2025-06-29 04:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `bot_conversations`
--

CREATE TABLE `bot_conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` text NOT NULL,
  `response` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bot_questions`
--

CREATE TABLE `bot_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bot_questions`
--

INSERT INTO `bot_questions` (`id`, `question`, `answer`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Apa itu HappyCare?', 'HappyCare adalah platform digital yang menyediakan informasi lengkap tentang layanan kesehatan dan wisata yang ada di Daerah Istimewa Yogyakarta. HappyCare membantu masyarakat menemukan rumah sakit, klinik spesialis, layanan darurat 24 jam, ambulans, serta rekomendasi wisata kuliner, alam, dan keluarga.', 'umum', '2025-06-29 04:04:03', '2025-06-29 04:04:03'),
(2, 'Jenis layanan kesehatan apa saja yang tersedia di HappyCare?', 'HappyCare menyediakan informasi tentang berbagai layanan kesehatan, termasuk rumah sakit umum, klinik spesialis, layanan emergency 24 jam, dan layanan ambulans yang tersebar di Daerah Istimewa Yogyakarta.', 'layanan kesehatan', '2025-06-29 04:04:03', '2025-06-29 04:04:03'),
(3, 'Apakah HappyCare menyediakan informasi tentang rumah sakit di Yogyakarta?', 'Ya, HappyCare menyediakan data lengkap tentang rumah sakit umum dan klinik spesialis di seluruh wilayah Daerah Istimewa Yogyakarta, lengkap dengan alamat, jam operasional, dan layanan yang disediakan.', 'layanan kesehatan', '2025-06-29 04:04:03', '2025-06-29 04:04:03'),
(4, 'Layanan darurat apa saja yang dapat ditemukan melalui HappyCare?', 'HappyCare memberikan informasi tentang layanan emergency 24 jam dan ketersediaan layanan ambulans di Yogyakarta, sehingga pengguna dapat mengakses pertolongan medis dengan cepat saat keadaan darurat.', 'layanan kesehatan', '2025-06-29 04:04:03', '2025-06-29 04:04:03'),
(5, 'Apakah HappyCare juga menawarkan informasi wisata di Yogyakarta?', 'Ya, selain layanan kesehatan, HappyCare juga menyajikan informasi wisata di Yogyakarta, seperti wisata kuliner khas, wisata alam yang menenangkan, serta destinasi wisata keluarga yang aman dan menarik.', 'wisata', '2025-06-29 04:04:03', '2025-06-29 04:04:03'),
(6, 'Kategori wisata apa saja yang tersedia di HappyCare?', 'Kategori wisata di HappyCare meliputi wisata kuliner yang menawarkan makanan khas Yogyakarta, wisata alam seperti pegunungan dan pantai, serta wisata keluarga yang ramah anak dan cocok untuk liburan bersama keluarga.', 'wisata', '2025-06-29 04:04:03', '2025-06-29 04:04:03'),
(7, 'Apakah HappyCare cocok untuk wisatawan dan pasien sekaligus?', 'Ya, HappyCare menggabungkan informasi layanan kesehatan dan wisata dalam satu platform, sehingga cocok untuk wisatawan medis (health tourists) yang ingin menjalani perawatan sambil menikmati keindahan Yogyakarta.', 'umum', '2025-06-29 04:04:03', '2025-06-29 04:04:03'),
(8, 'Apa saja contoh rumah sakit umum yang tersedia di Yogyakarta melalui HappyCare?', 'Beberapa rumah sakit umum yang dapat ditemukan di HappyCare antara lain RSUP Dr. Sardjito, RSUD Kota Yogyakarta, dan RSUD Wates. Rumah sakit-rumah sakit ini menyediakan layanan medis umum dengan fasilitas lengkap.', 'layanan kesehatan', '2025-06-29 04:04:03', '2025-06-29 04:04:03'),
(9, 'Apa saja contoh klinik spesialis yang direkomendasikan di HappyCare?', 'Klinik spesialis yang tersedia di HappyCare mencakup Klinik Mata Dr. Yap, Klinik Gigi R+ Dental, dan Klinik Spesialis Siloam. Masing-masing memiliki layanan unggulan di bidang kesehatan tertentu.', 'layanan kesehatan', '2025-06-29 04:04:03', '2025-06-29 04:04:03'),
(10, 'Di mana saya bisa menemukan layanan emergency 24 jam di Yogyakarta?', 'HappyCare memberikan informasi tentang layanan gawat darurat 24 jam seperti IGD RS Bethesda, IGD RS Panti Rapih, dan IGD RSUD Sleman. Lokasi dan kontak darurat disediakan untuk memudahkan akses saat situasi mendesak.', 'layanan kesehatan', '2025-06-29 04:04:03', '2025-06-29 04:04:03'),
(11, 'Di mana saya bisa memesan layanan ambulans di Yogyakarta melalui HappyCare?', 'HappyCare menyajikan informasi pemesanan layanan ambulans dari instansi seperti PMI DIY, RSUD Kota Yogyakarta, dan layanan ambulans swasta seperti Yogyakarta Ambulance Service.', 'layanan kesehatan', '2025-06-29 04:04:03', '2025-06-29 04:04:03'),
(12, 'Apa saja tempat wisata kuliner yang direkomendasikan di HappyCare?', 'HappyCare merekomendasikan tempat kuliner populer seperti Gudeg Yu Djum, Sate Klathak Pak Pong, dan Bakmi Jawa Mbah Gito. Tempat-tempat ini menjadi favorit wisatawan dan warga lokal.', 'wisata', '2025-06-29 04:04:03', '2025-06-29 04:04:03'),
(13, 'Apa saja contoh wisata alam yang bisa ditemukan di HappyCare?', 'Wisata alam yang terdaftar di HappyCare meliputi Tebing Breksi, Kalibiru, dan Pantai Parangtritis. Destinasi ini cocok untuk relaksasi maupun aktivitas outdoor di Yogyakarta.', 'wisata', '2025-06-29 04:04:03', '2025-06-29 04:04:03'),
(14, 'Tempat wisata keluarga apa saja yang tersedia di HappyCare?', 'Wisata keluarga yang direkomendasikan di HappyCare antara lain Gembira Loka Zoo, Taman Pintar Yogyakarta, dan Sindu Kusuma Edupark. Tempat-tempat ini aman dan menyenangkan untuk liburan bersama anak-anak.', 'wisata', '2025-06-29 04:04:03', '2025-06-29 04:04:03'),
(15, 'Apa itu HappyCare?', 'HappyCare adalah platform digital yang menyediakan informasi lengkap tentang layanan kesehatan dan wisata yang ada di Daerah Istimewa Yogyakarta. HappyCare membantu masyarakat menemukan rumah sakit, klinik spesialis, layanan darurat 24 jam, ambulans, serta rekomendasi wisata kuliner, alam, dan keluarga.', 'umum', '2025-06-29 06:24:33', '2025-06-29 06:24:33'),
(16, 'Jenis layanan kesehatan apa saja yang tersedia di HappyCare?', 'HappyCare menyediakan informasi tentang berbagai layanan kesehatan, termasuk rumah sakit umum, klinik spesialis, layanan emergency 24 jam, dan layanan ambulans yang tersebar di Daerah Istimewa Yogyakarta.', 'layanan kesehatan', '2025-06-29 06:24:33', '2025-06-29 06:24:33'),
(17, 'Apakah HappyCare menyediakan informasi tentang rumah sakit di Yogyakarta?', 'Ya, HappyCare menyediakan data lengkap tentang rumah sakit umum dan klinik spesialis di seluruh wilayah Daerah Istimewa Yogyakarta, lengkap dengan alamat, jam operasional, dan layanan yang disediakan.', 'layanan kesehatan', '2025-06-29 06:24:33', '2025-06-29 06:24:33'),
(18, 'Layanan darurat apa saja yang dapat ditemukan melalui HappyCare?', 'HappyCare memberikan informasi tentang layanan emergency 24 jam dan ketersediaan layanan ambulans di Yogyakarta, sehingga pengguna dapat mengakses pertolongan medis dengan cepat saat keadaan darurat.', 'layanan kesehatan', '2025-06-29 06:24:33', '2025-06-29 06:24:33'),
(19, 'Apakah HappyCare juga menawarkan informasi wisata di Yogyakarta?', 'Ya, selain layanan kesehatan, HappyCare juga menyajikan informasi wisata di Yogyakarta, seperti wisata kuliner khas, wisata alam yang menenangkan, serta destinasi wisata keluarga yang aman dan menarik.', 'wisata', '2025-06-29 06:24:33', '2025-06-29 06:24:33'),
(20, 'Kategori wisata apa saja yang tersedia di HappyCare?', 'Kategori wisata di HappyCare meliputi wisata kuliner yang menawarkan makanan khas Yogyakarta, wisata alam seperti pegunungan dan pantai, serta wisata keluarga yang ramah anak dan cocok untuk liburan bersama keluarga.', 'wisata', '2025-06-29 06:24:33', '2025-06-29 06:24:33'),
(21, 'Apakah HappyCare cocok untuk wisatawan dan pasien sekaligus?', 'Ya, HappyCare menggabungkan informasi layanan kesehatan dan wisata dalam satu platform, sehingga cocok untuk wisatawan medis (health tourists) yang ingin menjalani perawatan sambil menikmati keindahan Yogyakarta.', 'umum', '2025-06-29 06:24:33', '2025-06-29 06:24:33'),
(22, 'Apa saja contoh rumah sakit umum yang tersedia di Yogyakarta melalui HappyCare?', 'Beberapa rumah sakit umum yang dapat ditemukan di HappyCare antara lain RSUP Dr. Sardjito, RSUD Kota Yogyakarta, dan RSUD Wates. Rumah sakit-rumah sakit ini menyediakan layanan medis umum dengan fasilitas lengkap.', 'layanan kesehatan', '2025-06-29 06:24:33', '2025-06-29 06:24:33'),
(23, 'Apa saja contoh klinik spesialis yang direkomendasikan di HappyCare?', 'Klinik spesialis yang tersedia di HappyCare mencakup Klinik Mata Dr. Yap, Klinik Gigi R+ Dental, dan Klinik Spesialis Siloam. Masing-masing memiliki layanan unggulan di bidang kesehatan tertentu.', 'layanan kesehatan', '2025-06-29 06:24:33', '2025-06-29 06:24:33'),
(24, 'Di mana saya bisa menemukan layanan emergency 24 jam di Yogyakarta?', 'HappyCare memberikan informasi tentang layanan gawat darurat 24 jam seperti IGD RS Bethesda, IGD RS Panti Rapih, dan IGD RSUD Sleman. Lokasi dan kontak darurat disediakan untuk memudahkan akses saat situasi mendesak.', 'layanan kesehatan', '2025-06-29 06:24:33', '2025-06-29 06:24:33'),
(25, 'Di mana saya bisa memesan layanan ambulans di Yogyakarta melalui HappyCare?', 'HappyCare menyajikan informasi pemesanan layanan ambulans dari instansi seperti PMI DIY, RSUD Kota Yogyakarta, dan layanan ambulans swasta seperti Yogyakarta Ambulance Service.', 'layanan kesehatan', '2025-06-29 06:24:33', '2025-06-29 06:24:33'),
(26, 'Apa saja tempat wisata kuliner yang direkomendasikan di HappyCare?', 'HappyCare merekomendasikan tempat kuliner populer seperti Gudeg Yu Djum, Sate Klathak Pak Pong, dan Bakmi Jawa Mbah Gito. Tempat-tempat ini menjadi favorit wisatawan dan warga lokal.', 'wisata', '2025-06-29 06:24:33', '2025-06-29 06:24:33'),
(27, 'Apa saja contoh wisata alam yang bisa ditemukan di HappyCare?', 'Wisata alam yang terdaftar di HappyCare meliputi Tebing Breksi, Kalibiru, dan Pantai Parangtritis. Destinasi ini cocok untuk relaksasi maupun aktivitas outdoor di Yogyakarta.', 'wisata', '2025-06-29 06:24:33', '2025-06-29 06:24:33'),
(28, 'Tempat wisata keluarga apa saja yang tersedia di HappyCare?', 'Wisata keluarga yang direkomendasikan di HappyCare antara lain Gembira Loka Zoo, Taman Pintar Yogyakarta, dan Sindu Kusuma Edupark. Tempat-tempat ini aman dan menyenangkan untuk liburan bersama anak-anak.', 'wisata', '2025-06-29 06:24:33', '2025-06-29 06:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Kesehatan Umum', 'kesehatan-umum', 'Artikel tentang kesehatan umum dan tips menjaga kesehatan', '2025-06-29 04:01:03', '2025-06-29 04:01:03'),
(2, 'Tips Kesehatan', 'tips-kesehatan', 'Tips dan trik untuk menjaga kesehatan sehari-hari', '2025-06-29 04:01:03', '2025-06-29 04:01:03'),
(3, 'Berita Medis', 'berita-medis', 'Berita terbaru seputar dunia medis dan kesehatan', '2025-06-29 04:01:03', '2025-06-29 04:01:03'),
(4, 'Gaya Hidup Sehat', 'gaya-hidup-sehat', 'Artikel tentang gaya hidup sehat dan pola hidup seimbang', '2025-06-29 04:01:03', '2025-06-29 04:01:03'),
(5, 'Nutrisi', 'nutrisi', 'Informasi tentang nutrisi, makanan sehat, dan diet', '2025-06-29 04:01:03', '2025-06-29 04:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` enum('page','post','service') NOT NULL DEFAULT 'page',
  `status` enum('published','draft','archived') NOT NULL DEFAULT 'published',
  `excerpt` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` enum('general_hospital','specialist_clinic','emergency_center') NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `services` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`services`)),
  `facilities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`facilities`)),
  `operating_hours` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`operating_hours`)),
  `emergency_contact` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doctors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`doctors`)),
  `established_year` int(11) DEFAULT NULL,
  `bed_capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `slug`, `type`, `address`, `phone`, `email`, `website`, `description`, `services`, `facilities`, `operating_hours`, `emergency_contact`, `latitude`, `longitude`, `image`, `featured`, `active`, `created_at`, `updated_at`, `doctors`, `established_year`, `bed_capacity`) VALUES
(1, 'RSUD Kota Yogyakarta', 'rsud-kota-yogyakarta', 'general_hospital', 'Jl. Wirosaban No. 1, Yogyakarta', '(0274) 371195', NULL, NULL, 'RSUD Kota Yogyakarta adalah rumah sakit umum daerah yang melayani berbagai kebutuhan kesehatan masyarakat Yogyakarta. Dengan fasilitas lengkap dan tenaga medis profesional, rumah sakit ini berkomitmen memberikan pelayanan kesehatan terbaik untuk semua pasien.', '[\"Poli Umum\",\"Poli Anak\",\"Poli Gigi\",\"Poli Kandungan\",\"Poli Penyakit Dalam\",\"IGD 24 Jam\",\"Laboratorium\",\"Radiologi\"]', '[\"Rawat Inap\",\"Rawat Jalan\",\"Farmasi\",\"Ambulans\",\"Kantin\",\"Mushola\",\"Parkir Luas\"]', '\"Senin-Jumat: 07.00-21.00, Sabtu: 07.00-15.00, Minggu: IGD 24 Jam\"', NULL, NULL, NULL, NULL, 1, 1, '2025-06-29 04:01:02', '2025-06-29 04:01:02', '[\"dr. Agus Setiawan, Sp.PD\",\"dr. Budi Santoso, Sp.A\",\"dr. Citra Dewi, Sp.OG\"]', 1965, 150),
(2, 'RS Dr. Sardjito', 'rs-dr-sardjito', 'general_hospital', 'Jl. Kesehatan No. 1, Sekip, Yogyakarta', '(0274) 587333', NULL, NULL, 'RS Dr. Sardjito adalah rumah sakit pendidikan yang terafiliasi dengan Fakultas Kedokteran UGM. Sebagai rumah sakit rujukan utama di Yogyakarta, RS Dr. Sardjito dilengkapi dengan teknologi medis terkini dan tenaga medis spesialis yang kompeten.', '[\"Poli Umum\",\"Poli Spesialis\",\"Poli Gigi\",\"Poli Jantung\",\"Poli Saraf\",\"IGD 24 Jam\",\"Laboratorium\",\"Radiologi\",\"CT Scan\",\"MRI\"]', '[\"Rawat Inap VIP\",\"Rawat Inap Kelas 1-3\",\"Rawat Jalan\",\"Farmasi\",\"Ambulans\",\"Kantin\",\"Mushola\",\"ATM Center\",\"Parkir Luas\"]', '\"Senin-Sabtu: 07.00-21.00, Minggu: IGD 24 Jam\"', NULL, NULL, NULL, NULL, 1, 1, '2025-06-29 04:01:02', '2025-06-29 04:01:02', '[\"Prof. dr. Darmawan, Sp.JP\",\"dr. Eka Putri, Sp.S\",\"dr. Fajar Ramadhan, Sp.OT\"]', 1982, 800),
(3, 'RS Bethesda Yogyakarta', 'rs-bethesda-yogyakarta', 'general_hospital', 'Jl. Jend. Sudirman No. 70, Yogyakarta', '(0274) 562246', NULL, NULL, 'RS Bethesda Yogyakarta adalah rumah sakit swasta tertua di Yogyakarta yang didirikan oleh misionaris Belanda. Rumah sakit ini menawarkan pelayanan kesehatan komprehensif dengan pendekatan holistik yang memperhatikan aspek fisik, mental, dan spiritual pasien.', '[\"Poli Umum\",\"Poli Spesialis\",\"Poli Gigi\",\"Poli Jantung\",\"Poli Mata\",\"IGD 24 Jam\",\"Laboratorium\",\"Radiologi\",\"Hemodialisa\"]', '[\"Rawat Inap Premium\",\"Rawat Inap Kelas 1-3\",\"Rawat Jalan\",\"Farmasi\",\"Ambulans\",\"Kantin\",\"Kapel\",\"ATM Center\",\"Parkir Luas\"]', '\"Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam\"', NULL, NULL, NULL, NULL, 1, 1, '2025-06-29 04:01:02', '2025-06-29 04:01:02', '[\"dr. Grace Natalia, Sp.M\",\"dr. Hendra Wijaya, Sp.JP\",\"dr. Irene Kusuma, Sp.KJ\"]', 1899, 324),
(4, 'RS Panti Rapih', 'rs-panti-rapih', 'general_hospital', 'Jl. Cik Ditiro No. 30, Yogyakarta', '(0274) 563333', NULL, NULL, 'RS Panti Rapih adalah rumah sakit yang dikelola oleh Yayasan Panti Rapih. Dengan moto \"Melayani dengan Kasih\", rumah sakit ini menyediakan pelayanan kesehatan berkualitas dengan pendekatan yang ramah dan penuh perhatian kepada setiap pasien.', '[\"Poli Umum\",\"Poli Spesialis\",\"Poli Gigi\",\"Poli Jantung\",\"Poli Anak\",\"IGD 24 Jam\",\"Laboratorium\",\"Radiologi\",\"Fisioterapi\"]', '[\"Rawat Inap VIP\",\"Rawat Inap Kelas 1-3\",\"Rawat Jalan\",\"Farmasi\",\"Ambulans\",\"Kantin\",\"Kapel\",\"ATM Center\",\"Parkir Luas\"]', '\"Senin-Sabtu: 07.00-21.00, Minggu: IGD 24 Jam\"', NULL, NULL, NULL, NULL, 1, 1, '2025-06-29 04:01:02', '2025-06-29 04:01:02', '[\"dr. Johannes, Sp.A\",\"dr. Kartika Sari, Sp.OG\",\"dr. Leo Wibisono, Sp.PD\"]', 1929, 300),
(5, 'RS PKU Muhammadiyah Yogyakarta', 'rs-pku-muhammadiyah-yogyakarta', 'general_hospital', 'Jl. KHA Dahlan No. 20, Yogyakarta', '(0274) 512653', NULL, NULL, 'RS PKU Muhammadiyah Yogyakarta adalah rumah sakit Islam yang mengedepankan pelayanan kesehatan berkualitas dengan nilai-nilai Islami. Rumah sakit ini memiliki fasilitas modern dan tenaga medis profesional untuk melayani berbagai kebutuhan kesehatan masyarakat.', '[\"Poli Umum\",\"Poli Spesialis\",\"Poli Gigi\",\"Poli Jantung\",\"Poli Anak\",\"IGD 24 Jam\",\"Laboratorium\",\"Radiologi\",\"Hemodialisa\"]', '[\"Rawat Inap VIP\",\"Rawat Inap Kelas 1-3\",\"Rawat Jalan\",\"Farmasi\",\"Ambulans\",\"Kantin\",\"Mushola\",\"ATM Center\",\"Parkir Luas\"]', '\"Senin-Sabtu: 07.00-21.00, Minggu: IGD 24 Jam\"', NULL, NULL, NULL, NULL, 1, 1, '2025-06-29 04:01:02', '2025-06-29 04:01:02', '[\"dr. Muhammad Arif, Sp.JP\",\"dr. Nurul Hidayah, Sp.A\",\"dr. Omar Faisal, Sp.OT\"]', 1923, 250),
(6, 'RS JIH Yogyakarta', 'rs-jih-yogyakarta', 'general_hospital', 'Jl. Ring Road Utara No. 160, Sleman', '(0274) 4463555', NULL, NULL, 'RS JIH Yogyakarta (Jogja International Hospital) adalah rumah sakit modern dengan standar internasional. Dilengkapi dengan teknologi medis terkini dan tenaga medis berpengalaman, RS JIH berkomitmen memberikan pelayanan kesehatan terbaik dengan kenyamanan setara hotel bintang lima.', '[\"Poli Umum\",\"Poli Spesialis\",\"Poli Gigi\",\"Poli Jantung\",\"Poli Kecantikan\",\"IGD 24 Jam\",\"Laboratorium\",\"Radiologi\",\"CT Scan\",\"MRI\"]', '[\"Rawat Inap Premium\",\"Rawat Inap VIP\",\"Rawat Inap Kelas 1-3\",\"Rawat Jalan\",\"Farmasi\",\"Ambulans\",\"Kafe\",\"Mushola\",\"ATM Center\",\"Parkir Luas\"]', '\"Senin-Minggu: 07.00-22.00, IGD 24 Jam\"', NULL, NULL, NULL, NULL, 1, 1, '2025-06-29 04:01:02', '2025-06-29 04:01:02', '[\"dr. Pramudya Wijaya, Sp.JP\",\"dr. Queen Raissa, Sp.KK\",\"dr. Raden Bagus, Sp.BS\"]', 2007, 200),
(7, 'RS Queen Latifa', 'rs-queen-latifa', 'general_hospital', 'Jl. Siliwangi No. 118, Gamping, Sleman', '(0274) 620555', NULL, NULL, 'RS Queen Latifa adalah rumah sakit yang fokus pada pelayanan kesehatan ibu dan anak, namun juga menyediakan layanan kesehatan umum. Dengan lingkungan yang nyaman dan tenaga medis yang ramah, rumah sakit ini menjadi pilihan utama untuk keluarga.', '[\"Poli Umum\",\"Poli Anak\",\"Poli Kandungan\",\"Poli Gigi\",\"IGD 24 Jam\",\"Laboratorium\",\"Radiologi\",\"Persalinan\"]', '[\"Rawat Inap VIP\",\"Rawat Inap Kelas 1-3\",\"Rawat Jalan\",\"Farmasi\",\"Ambulans\",\"Kantin\",\"Mushola\",\"Parkir\"]', '\"Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam\"', NULL, NULL, NULL, NULL, 0, 1, '2025-06-29 04:01:02', '2025-06-29 04:01:02', '[\"dr. Siti Aminah, Sp.OG\",\"dr. Taufik Rahman, Sp.A\",\"dr. Umi Kalsum, Sp.GK\"]', 2010, 120),
(8, 'RS Ludira Husada Tama', 'rs-ludira-husada-tama', 'general_hospital', 'Jl. Wiratama No. 4, Tegalrejo, Yogyakarta', '(0274) 620333', NULL, NULL, 'RS Ludira Husada Tama adalah rumah sakit yang menyediakan pelayanan kesehatan komprehensif dengan harga terjangkau. Rumah sakit ini berkomitmen untuk memberikan pelayanan kesehatan yang berkualitas untuk semua lapisan masyarakat.', '[\"Poli Umum\",\"Poli Spesialis\",\"Poli Gigi\",\"IGD 24 Jam\",\"Laboratorium\",\"Radiologi\"]', '[\"Rawat Inap Kelas 1-3\",\"Rawat Jalan\",\"Farmasi\",\"Ambulans\",\"Kantin\",\"Mushola\",\"Parkir\"]', '\"Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam\"', NULL, NULL, NULL, NULL, 0, 1, '2025-06-29 04:01:02', '2025-06-29 04:01:02', '[\"dr. Vina Muliani, Sp.PD\",\"dr. Wahyu Nugroho, Sp.B\",\"dr. Xavier Putra, Sp.THT\"]', 1995, 100),
(9, 'RS Panti Rini', 'rs-panti-rini', 'general_hospital', 'Jl. Solo Km 13.2, Kalasan, Sleman', '(0274) 497323', NULL, NULL, 'RS Panti Rini adalah rumah sakit yang terletak di kawasan Kalasan, Sleman. Dengan suasana yang tenang dan asri, rumah sakit ini menawarkan pelayanan kesehatan yang nyaman dengan pendekatan kekeluargaan.', '[\"Poli Umum\",\"Poli Anak\",\"Poli Gigi\",\"Poli Kandungan\",\"IGD 24 Jam\",\"Laboratorium\",\"Radiologi\"]', '[\"Rawat Inap Kelas 1-3\",\"Rawat Jalan\",\"Farmasi\",\"Ambulans\",\"Kantin\",\"Kapel\",\"Parkir\"]', '\"Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam\"', NULL, NULL, NULL, NULL, 0, 1, '2025-06-29 04:01:02', '2025-06-29 04:01:02', '[\"dr. Yohanes Surya, Sp.PD\",\"dr. Zainab Fatimah, Sp.A\",\"dr. Adi Nugroho, Sp.B\"]', 1987, 90),
(10, 'RS PKU Muhammadiyah Kotagede', 'rs-pku-muhammadiyah-kotagede', 'general_hospital', 'Jl. Ngeksigondo No. 56, Kotagede', '(0274) 375396', NULL, NULL, 'RS PKU Muhammadiyah Kotagede adalah cabang dari RS PKU Muhammadiyah yang melayani masyarakat di kawasan Kotagede dan sekitarnya. Rumah sakit ini menawarkan pelayanan kesehatan Islami dengan fasilitas yang memadai.', '[\"Poli Umum\",\"Poli Anak\",\"Poli Gigi\",\"Poli Kandungan\",\"IGD 24 Jam\",\"Laboratorium\",\"Radiologi\"]', '[\"Rawat Inap Kelas 1-3\",\"Rawat Jalan\",\"Farmasi\",\"Ambulans\",\"Kantin\",\"Mushola\",\"Parkir\"]', '\"Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam\"', NULL, NULL, NULL, NULL, 0, 1, '2025-06-29 04:01:02', '2025-06-29 04:01:02', '[\"dr. Bambang Sutrisno, Sp.PD\",\"dr. Citra Dewi, Sp.A\",\"dr. Dian Puspita, Sp.OG\"]', 1990, 80),
(11, 'RSU Rajawali Citra', 'rsu-rajawali-citra', 'general_hospital', 'Jl. Rajawali No. 1, Yogyakarta', '(0274) 4463535', NULL, NULL, 'RSU Rajawali Citra adalah rumah sakit umum yang menyediakan pelayanan kesehatan berkualitas dengan harga terjangkau. Dengan lokasi yang strategis di pusat kota, rumah sakit ini mudah diakses oleh masyarakat Yogyakarta.', '[\"Poli Umum\",\"Poli Anak\",\"Poli Gigi\",\"Poli Kandungan\",\"IGD 24 Jam\",\"Laboratorium\",\"Radiologi\"]', '[\"Rawat Inap Kelas 1-3\",\"Rawat Jalan\",\"Farmasi\",\"Ambulans\",\"Kantin\",\"Mushola\",\"Parkir\"]', '\"Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam\"', NULL, NULL, NULL, NULL, 0, 1, '2025-06-29 04:01:02', '2025-06-29 04:01:02', '[\"dr. Eko Prasetyo, Sp.PD\",\"dr. Fani Wijaya, Sp.A\",\"dr. Gunawan Santoso, Sp.B\"]', 2000, 110),
(12, 'RS Siloam Yogyakarta', 'rs-siloam-yogyakarta', 'general_hospital', 'Jl. Laksda Adisucipto No. 32-34', '(0274) 2809000', NULL, NULL, 'RS Siloam Yogyakarta adalah bagian dari jaringan Rumah Sakit Siloam yang tersebar di seluruh Indonesia. Dengan standar pelayanan internasional dan teknologi medis terkini, rumah sakit ini menawarkan pelayanan kesehatan premium di Yogyakarta.', '[\"Poli Umum\",\"Poli Spesialis\",\"Poli Gigi\",\"Poli Jantung\",\"Poli Kecantikan\",\"IGD 24 Jam\",\"Laboratorium\",\"Radiologi\",\"CT Scan\",\"MRI\"]', '[\"Rawat Inap Premium\",\"Rawat Inap VIP\",\"Rawat Inap Kelas 1-3\",\"Rawat Jalan\",\"Farmasi\",\"Ambulans\",\"Kafe\",\"Mushola\",\"ATM Center\",\"Parkir Luas\"]', '\"Senin-Minggu: 07.00-22.00, IGD 24 Jam\"', NULL, NULL, NULL, NULL, 1, 1, '2025-06-29 04:01:02', '2025-06-29 04:01:02', '[\"dr. Hendra Wijaya, Sp.JP\",\"dr. Indah Permata, Sp.KK\",\"dr. Joko Widodo, Sp.S\"]', 2015, 180),
(13, 'RS Happy Land', 'rs-happy-land', 'general_hospital', 'Jl. Ipda Tut Harsono No. 53', '(0274) 550060', NULL, NULL, 'RS Happy Land adalah rumah sakit yang fokus pada pelayanan kesehatan anak dan keluarga. Dengan desain interior yang ceria dan ramah anak, rumah sakit ini menciptakan suasana yang menyenangkan untuk pasien anak-anak.', '[\"Poli Umum\",\"Poli Anak\",\"Poli Gigi\",\"Poli Tumbuh Kembang\",\"IGD 24 Jam\",\"Laboratorium\",\"Radiologi\"]', '[\"Rawat Inap Kelas 1-3\",\"Rawat Jalan\",\"Farmasi\",\"Ambulans\",\"Kantin\",\"Taman Bermain\",\"Parkir\"]', '\"Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam\"', NULL, NULL, NULL, NULL, 0, 1, '2025-06-29 04:01:02', '2025-06-29 04:01:02', '[\"dr. Kartika Sari, Sp.A\",\"dr. Lukman Hakim, Sp.A\",\"dr. Mira Susanti, Sp.KJ\"]', 2012, 75),
(14, 'RS Pratama Sleman', 'rs-pratama-sleman', 'general_hospital', 'Jl. Magelang Km 10, Sleman', '(0274) 866751', NULL, NULL, 'RS Pratama Sleman adalah rumah sakit pemerintah yang melayani masyarakat di wilayah Sleman. Dengan fokus pada pelayanan kesehatan dasar, rumah sakit ini menjadi ujung tombak pelayanan kesehatan di tingkat kecamatan.', '[\"Poli Umum\",\"Poli Anak\",\"Poli Gigi\",\"Poli Kandungan\",\"IGD 24 Jam\",\"Laboratorium\",\"Radiologi\"]', '[\"Rawat Inap Kelas 2-3\",\"Rawat Jalan\",\"Farmasi\",\"Ambulans\",\"Kantin\",\"Mushola\",\"Parkir\"]', '\"Senin-Sabtu: 07.00-14.00, IGD 24 Jam\"', NULL, NULL, NULL, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', '[\"dr. Nugroho Santoso\",\"dr. Olivia Putri\",\"dr. Pramudya Wijaya\"]', 2005, 50),
(15, 'RS Nur Hidayah', 'rs-nur-hidayah', 'general_hospital', 'Jl. Imogiri Timur Km. 11, Bantul', '(0274) 2810380', NULL, NULL, 'RS Nur Hidayah adalah rumah sakit Islam yang melayani masyarakat di wilayah Bantul dan sekitarnya. Dengan pendekatan pelayanan yang Islami, rumah sakit ini menawarkan pelayanan kesehatan yang memperhatikan nilai-nilai spiritual.', '[\"Poli Umum\",\"Poli Anak\",\"Poli Gigi\",\"Poli Kandungan\",\"IGD 24 Jam\",\"Laboratorium\",\"Radiologi\"]', '[\"Rawat Inap Kelas 1-3\",\"Rawat Jalan\",\"Farmasi\",\"Ambulans\",\"Kantin\",\"Mushola\",\"Parkir\"]', '\"Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam\"', NULL, NULL, NULL, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', '[\"dr. Qomariah Zulfa, Sp.A\",\"dr. Rahmat Hidayat, Sp.PD\",\"dr. Siti Aminah, Sp.OG\"]', 2008, 85),
(16, 'RS Bhayangkara', 'rs-bhayangkara', 'general_hospital', 'Jl. Raya Solo - Yogyakarta, Sleman', '(0274) 868437', NULL, NULL, 'RS Bhayangkara adalah rumah sakit yang dikelola oleh Kepolisian Republik Indonesia. Selain melayani anggota kepolisian dan keluarganya, rumah sakit ini juga terbuka untuk masyarakat umum dengan pelayanan kesehatan yang berkualitas.', '[\"Poli Umum\",\"Poli Spesialis\",\"Poli Gigi\",\"Poli Bedah\",\"IGD 24 Jam\",\"Laboratorium\",\"Radiologi\"]', '[\"Rawat Inap VIP\",\"Rawat Inap Kelas 1-3\",\"Rawat Jalan\",\"Farmasi\",\"Ambulans\",\"Kantin\",\"Mushola\",\"Parkir Luas\"]', '\"Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam\"', NULL, NULL, NULL, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', '[\"dr. Taufik Rahman, Sp.B\",\"dr. Umi Kalsum, Sp.PD\",\"dr. Vina Muliani, Sp.A\"]', 1975, 120),
(17, 'RSUD Sleman', 'rsud-sleman', 'general_hospital', 'Jl. Bhayangkara No. 48, Sleman', '(0274) 868437', NULL, NULL, 'RSUD Sleman adalah rumah sakit umum daerah yang melayani masyarakat di Kabupaten Sleman. Sebagai rumah sakit pemerintah, RSUD Sleman berkomitmen memberikan pelayanan kesehatan yang berkualitas dan terjangkau untuk semua lapisan masyarakat.', '[\"Poli Umum\",\"Poli Spesialis\",\"Poli Gigi\",\"Poli Jantung\",\"Poli Anak\",\"IGD 24 Jam\",\"Laboratorium\",\"Radiologi\"]', '[\"Rawat Inap VIP\",\"Rawat Inap Kelas 1-3\",\"Rawat Jalan\",\"Farmasi\",\"Ambulans\",\"Kantin\",\"Mushola\",\"Parkir Luas\"]', '\"Senin-Jumat: 07.00-14.00, Sabtu: 07.00-12.00, IGD 24 Jam\"', NULL, NULL, NULL, NULL, 1, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', '[\"dr. Wahyu Nugroho, Sp.JP\",\"dr. Xavier Putra, Sp.PD\",\"dr. Yohanes Surya, Sp.A\"]', 1970, 200),
(18, 'RSU Griya Mahardhika', 'rsu-griya-mahardhika', 'general_hospital', 'Jl. Veteran No. 101, Umbulharjo, Yogyakarta', '(0274) 389110', NULL, NULL, 'RSU Griya Mahardhika adalah rumah sakit umum yang menawarkan pelayanan kesehatan komprehensif dengan harga terjangkau. Dengan lokasi yang strategis di kawasan Umbulharjo, rumah sakit ini mudah diakses oleh masyarakat Yogyakarta bagian selatan.', '[\"Poli Umum\",\"Poli Anak\",\"Poli Gigi\",\"Poli Kandungan\",\"IGD 24 Jam\",\"Laboratorium\",\"Radiologi\"]', '[\"Rawat Inap Kelas 1-3\",\"Rawat Jalan\",\"Farmasi\",\"Ambulans\",\"Kantin\",\"Mushola\",\"Parkir\"]', '\"Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam\"', NULL, NULL, NULL, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', '[\"dr. Zainab Fatimah, Sp.OG\",\"dr. Adi Nugroho, Sp.PD\",\"dr. Bambang Sutrisno, Sp.B\"]', 2003, 95),
(19, 'Klinik Spesialis Gigi dan Mulut UGM', 'klinik-spesialis-gigi-dan-mulut-ugm', 'specialist_clinic', 'Jl. Denta, Sekip, Yogyakarta', '(0274) 545673', 'dental@ugm.ac.id', 'https://dental.ugm.ac.id', 'Klinik spesialis gigi dan mulut terkemuka di bawah Universitas Gadjah Mada dengan teknologi dental terdepan dan tenaga medis berpengalaman.', '[\"Pemeriksaan Gigi\",\"Scaling\",\"Tambal Gigi\",\"Cabut Gigi\",\"Orthodonti\",\"Implant Gigi\",\"Bedah Mulut\",\"Prostodonti\"]', '[\"Ruang Perawatan Modern\",\"Dental X-Ray\",\"Sterilisasi Canggih\",\"Ruang Tunggu Nyaman\",\"Parkir Luas\"]', '{\"senin\":\"08:00-16:00\",\"selasa\":\"08:00-16:00\",\"rabu\":\"08:00-16:00\",\"kamis\":\"08:00-16:00\",\"jumat\":\"08:00-16:00\",\"sabtu\":\"08:00-12:00\",\"minggu\":\"Tutup\"}', '(0274) 545673', -7.76870000, 110.37390000, NULL, 1, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(20, 'Klinik Spesialis Mata Dr. YAP', 'klinik-spesialis-mata-dr-yap', 'specialist_clinic', 'Jl. Cik Ditiro No. 5, Yogyakarta', '(0274) 562054', 'info@klinikmata-yap.com', 'https://klinikmata-yap.com', 'Klinik spesialis mata terkemuka di Yogyakarta dengan teknologi terdepan untuk perawatan mata komprehensif.', '[\"Pemeriksaan Mata\",\"Operasi Katarak\",\"Operasi Refraktif\",\"Retina\",\"Glaukoma\",\"Kornea\",\"Pediatric Ophthalmology\"]', '[\"Ruang Operasi Steril\",\"Alat Diagnostik Modern\",\"OCT Scanner\",\"Laser Equipment\",\"Recovery Room\"]', '{\"senin\":\"08:00-17:00\",\"selasa\":\"08:00-17:00\",\"rabu\":\"08:00-17:00\",\"kamis\":\"08:00-17:00\",\"jumat\":\"08:00-17:00\",\"sabtu\":\"08:00-12:00\",\"minggu\":\"Tutup\"}', '(0274) 562054', -7.78450000, 110.37400000, NULL, 1, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(21, 'Klinik Spesialis THT RSUP Dr. Sardjito', 'klinik-spesialis-tht-rsup-dr-sardjito', 'specialist_clinic', 'Jl. Kesehatan No. 1, Sekip, Yogyakarta', '(0274) 587333', 'tht@sardjito.co.id', 'https://sardjito.co.id', 'Klinik spesialis THT (Telinga, Hidung, Tenggorokan) di RSUP Dr. Sardjito dengan pelayanan komprehensif dan teknologi modern.', '[\"Pemeriksaan THT\",\"Audiometri\",\"Endoskopi\",\"Operasi THT\",\"Terapi Wicara\",\"Hearing Aid\",\"Sleep Study\"]', '[\"Ruang Endoskopi\",\"Audiologi Lab\",\"Ruang Operasi\",\"Speech Therapy Room\",\"Hearing Test Room\"]', '{\"senin\":\"08:00-15:00\",\"selasa\":\"08:00-15:00\",\"rabu\":\"08:00-15:00\",\"kamis\":\"08:00-15:00\",\"jumat\":\"08:00-15:00\",\"sabtu\":\"08:00-12:00\",\"minggu\":\"Tutup\"}', '(0274) 587333', -7.76870000, 110.37390000, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(22, 'Klinik Spesialis Jantung RS Panti Rapih', 'klinik-spesialis-jantung-rs-panti-rapih', 'specialist_clinic', 'Jl. Cik Ditiro No. 30, Yogyakarta', '(0274) 563333', 'jantung@pantirapih.or.id', 'https://pantirapih.or.id', 'Klinik spesialis jantung dengan teknologi kardiovaskular terdepan dan tim dokter spesialis jantung berpengalaman.', '[\"Konsultasi Jantung\",\"Ekokardiografi\",\"Stress Test\",\"Holter Monitor\",\"Kateterisasi\",\"Angioplasti\",\"Pacemaker\"]', '[\"Cath Lab\",\"Echo Lab\",\"Stress Test Lab\",\"CCU\",\"Cardiac Rehabilitation\"]', '{\"senin\":\"08:00-16:00\",\"selasa\":\"08:00-16:00\",\"rabu\":\"08:00-16:00\",\"kamis\":\"08:00-16:00\",\"jumat\":\"08:00-16:00\",\"sabtu\":\"08:00-12:00\",\"minggu\":\"Tutup\"}', '(0274) 563333', -7.78510000, 110.37420000, NULL, 1, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(23, 'Klinik Spesialis Anak RS Bethesda', 'klinik-spesialis-anak-rs-bethesda', 'specialist_clinic', 'Jl. Jend. Sudirman No. 70, Yogyakarta', '(0274) 562246', 'anak@rsbethesda.com', 'https://rsbethesda.com', 'Klinik spesialis anak dengan fasilitas lengkap untuk perawatan kesehatan anak dari bayi hingga remaja.', '[\"Konsultasi Anak\",\"Imunisasi\",\"Tumbuh Kembang\",\"Gizi Anak\",\"Alergi Anak\",\"Neonatologi\",\"Pediatric Emergency\"]', '[\"Ruang Perawatan Anak\",\"Play Area\",\"NICU\",\"Ruang Laktasi\",\"Child-Friendly Environment\"]', '{\"senin\":\"08:00-16:00\",\"selasa\":\"08:00-16:00\",\"rabu\":\"08:00-16:00\",\"kamis\":\"08:00-16:00\",\"jumat\":\"08:00-16:00\",\"sabtu\":\"08:00-12:00\",\"minggu\":\"Tutup\"}', '(0274) 562246', -7.79560000, 110.36950000, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(24, 'Klinik Spesialis Kulit RSUD Kota Yogyakarta', 'klinik-spesialis-kulit-rsud-kota-yogyakarta', 'specialist_clinic', 'Jl. Wirosaban No. 1, Yogyakarta', '(0274) 371195', 'kulit@rsudkota.jogjakota.go.id', 'https://rsudkota.jogjakota.go.id', 'Klinik spesialis kulit dan kelamin dengan pelayanan dermatologi komprehensif dan teknologi terkini.', '[\"Konsultasi Kulit\",\"Dermatologi Estetik\",\"Laser Therapy\",\"Chemical Peeling\",\"Bedah Kulit\",\"Venereologi\",\"Dermatopathology\"]', '[\"Laser Room\",\"Dermatology Lab\",\"Phototherapy Unit\",\"Cosmetic Surgery Room\",\"Biopsy Room\"]', '{\"senin\":\"08:00-15:00\",\"selasa\":\"08:00-15:00\",\"rabu\":\"08:00-15:00\",\"kamis\":\"08:00-15:00\",\"jumat\":\"08:00-15:00\",\"sabtu\":\"08:00-12:00\",\"minggu\":\"Tutup\"}', '(0274) 371195', -7.80250000, 110.36560000, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(25, 'Klinik Spesialis Bedah RS PKU Muhammadiyah', 'klinik-spesialis-bedah-rs-pku-muhammadiyah', 'specialist_clinic', 'Jl. KHA Dahlan No. 20, Yogyakarta', '(0274) 512653', 'bedah@rspku.com', 'https://rspku.com', 'Klinik spesialis bedah dengan berbagai layanan bedah umum dan spesialis dengan teknologi minimal invasive.', '[\"Bedah Umum\",\"Bedah Digestif\",\"Bedah Onkologi\",\"Bedah Laparoskopi\",\"Bedah Trauma\",\"Bedah Plastik\",\"Bedah Vaskular\"]', '[\"Ruang Operasi Modern\",\"Laparoscopy Equipment\",\"Recovery Room\",\"Pre-Op Room\",\"Surgical ICU\"]', '{\"senin\":\"08:00-16:00\",\"selasa\":\"08:00-16:00\",\"rabu\":\"08:00-16:00\",\"kamis\":\"08:00-16:00\",\"jumat\":\"08:00-16:00\",\"sabtu\":\"08:00-12:00\",\"minggu\":\"Tutup\"}', '(0274) 512653', -7.80140000, 110.36440000, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(26, 'Klinik Spesialis Saraf RS DKT', 'klinik-spesialis-saraf-rs-dkt', 'specialist_clinic', 'Jl. Juadi No. 19, Yogyakarta', '(0274) 555402', 'saraf@rsdkt.co.id', 'https://rsdkt.co.id', 'Klinik spesialis saraf dengan pelayanan neurologi komprehensif dan teknologi diagnostik terdepan.', '[\"Konsultasi Neurologi\",\"EEG\",\"EMG\",\"Stroke Unit\",\"Epilepsi\",\"Parkinson\",\"Neurosurgery\"]', '[\"Neuro Lab\",\"EEG Room\",\"EMG Room\",\"Stroke Unit\",\"Neurosurgery OR\"]', '{\"senin\":\"08:00-16:00\",\"selasa\":\"08:00-16:00\",\"rabu\":\"08:00-16:00\",\"kamis\":\"08:00-16:00\",\"jumat\":\"08:00-16:00\",\"sabtu\":\"08:00-12:00\",\"minggu\":\"Tutup\"}', '(0274) 555402', -7.79230000, 110.37120000, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(27, 'Klinik Spesialis Paru RSUD Sleman', 'klinik-spesialis-paru-rsud-sleman', 'specialist_clinic', 'Jl. Bhayangkara No. 48, Sleman', '(0274) 868437', 'paru@rsud.slemankab.go.id', 'https://rsud.slemankab.go.id', 'Klinik spesialis paru dengan pelayanan pulmonologi lengkap dan fasilitas diagnostik respirasi modern.', '[\"Konsultasi Paru\",\"Spirometri\",\"Bronkoskopi\",\"TB Treatment\",\"Asma\",\"PPOK\",\"Sleep Apnea\"]', '[\"Pulmonary Function Lab\",\"Bronchoscopy Room\",\"Sleep Study Lab\",\"Respiratory ICU\",\"TB Isolation\"]', '{\"senin\":\"08:00-15:00\",\"selasa\":\"08:00-15:00\",\"rabu\":\"08:00-15:00\",\"kamis\":\"08:00-15:00\",\"jumat\":\"08:00-15:00\",\"sabtu\":\"08:00-12:00\",\"minggu\":\"Tutup\"}', '(0274) 868437', -7.74560000, 110.35420000, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(28, 'Klinik Spesialis Orthopedi RS Happy Land', 'klinik-spesialis-orthopedi-rs-happy-land', 'specialist_clinic', 'Jl. Ipda Tut Harsono No. 53, Yogyakarta', '(0274) 550060', 'ortho@rshappyland.com', 'https://rshappyland.com', 'Klinik spesialis orthopedi dengan layanan tulang dan sendi komprehensif serta teknologi bedah minimal invasive.', '[\"Konsultasi Orthopedi\",\"Arthroscopy\",\"Joint Replacement\",\"Spine Surgery\",\"Sports Medicine\",\"Trauma Orthopedi\",\"Pediatric Orthopedi\"]', '[\"Arthroscopy Suite\",\"Digital X-Ray\",\"MRI\",\"Physical Therapy\",\"Sports Medicine Center\"]', '{\"senin\":\"08:00-17:00\",\"selasa\":\"08:00-17:00\",\"rabu\":\"08:00-17:00\",\"kamis\":\"08:00-17:00\",\"jumat\":\"08:00-17:00\",\"sabtu\":\"08:00-12:00\",\"minggu\":\"Tutup\"}', '(0274) 550060', -7.81560000, 110.38890000, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(29, 'Klinik Spesialis Mata Siloam', 'klinik-spesialis-mata-siloam', 'specialist_clinic', 'Jl. Laksda Adisucipto No. 32, Yogyakarta', '(0274) 2809000', 'mata@siloamhospitals.com', 'https://siloamhospitals.com', 'Klinik spesialis mata dengan teknologi terdepan dan tim dokter mata berpengalaman internasional.', '[\"Pemeriksaan Mata\",\"LASIK\",\"Operasi Katarak\",\"Retina\",\"Glaukoma\",\"Kornea\",\"Oculoplasty\"]', '[\"LASIK Suite\",\"Retina Center\",\"OCT Scanner\",\"Phacoemulsification\",\"Vitrectomy Equipment\"]', '{\"senin\":\"08:00-18:00\",\"selasa\":\"08:00-18:00\",\"rabu\":\"08:00-18:00\",\"kamis\":\"08:00-18:00\",\"jumat\":\"08:00-18:00\",\"sabtu\":\"08:00-15:00\",\"minggu\":\"08:00-12:00\"}', '(0274) 2809000', -7.75200000, 110.38890000, NULL, 1, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(30, 'Klinik Spesialis Penyakit Dalam RS Queen Latifa', 'klinik-spesialis-penyakit-dalam-rs-queen-latifa', 'specialist_clinic', 'Jl. Siliwangi No. 118, Yogyakarta', '(0274) 620555', 'penyakitdalam@rsqueenlatifa.com', 'https://rsqueenlatifa.com', 'Klinik spesialis penyakit dalam dengan pelayanan internal medicine komprehensif dan teknologi diagnostik modern.', '[\"Konsultasi Penyakit Dalam\",\"Diabetes\",\"Hipertensi\",\"Gastroenterologi\",\"Hepatologi\",\"Nefrologi\",\"Endokrinologi\"]', '[\"Internal Medicine Ward\",\"Endoscopy Unit\",\"Dialysis Center\",\"Diabetes Center\",\"Cardiac Care\"]', '{\"senin\":\"08:00-17:00\",\"selasa\":\"08:00-17:00\",\"rabu\":\"08:00-17:00\",\"kamis\":\"08:00-17:00\",\"jumat\":\"08:00-17:00\",\"sabtu\":\"08:00-12:00\",\"minggu\":\"Tutup\"}', '(0274) 620555', -7.78340000, 110.35670000, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(31, 'Klinik Spesialis Kandungan RS Panti Rini', 'klinik-spesialis-kandungan-rs-panti-rini', 'specialist_clinic', 'Jl. Solo Km 13.2, Yogyakarta', '(0274) 497323', 'kandungan@pantirini.co.id', 'https://pantirini.co.id', 'Klinik spesialis kandungan dan kebidanan dengan fasilitas lengkap untuk kesehatan reproduksi wanita.', '[\"Konsultasi Kandungan\",\"USG 4D\",\"Persalinan\",\"KB\",\"Infertilitas\",\"Menopause\",\"Ginekologi Onkologi\"]', '[\"Delivery Room\",\"NICU\",\"USG 4D\",\"IVF Center\",\"Maternity Ward\"]', '{\"senin\":\"08:00-17:00\",\"selasa\":\"08:00-17:00\",\"rabu\":\"08:00-17:00\",\"kamis\":\"08:00-17:00\",\"jumat\":\"08:00-17:00\",\"sabtu\":\"08:00-12:00\",\"minggu\":\"Tutup\"}', '(0274) 497323', -7.76230000, 110.44560000, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(32, 'Klinik Spesialis Jantung RS JIH', 'klinik-spesialis-jantung-rs-jih', 'specialist_clinic', 'Jl. Ringroad Utara, Yogyakarta', '(0274) 4463555', 'jantung@jih.co.id', 'https://jih.co.id', 'Klinik spesialis jantung dengan teknologi kardiovaskular terdepan dan tim ahli jantung berpengalaman.', '[\"Konsultasi Jantung\",\"Kateterisasi\",\"Angioplasti\",\"Bypass Surgery\",\"Pacemaker\",\"Aritmia\",\"Heart Failure\"]', '[\"Cath Lab\",\"Cardiac Surgery OR\",\"CCU\",\"Echo Lab\",\"Cardiac Rehabilitation\"]', '{\"senin\":\"08:00-17:00\",\"selasa\":\"08:00-17:00\",\"rabu\":\"08:00-17:00\",\"kamis\":\"08:00-17:00\",\"jumat\":\"08:00-17:00\",\"sabtu\":\"08:00-12:00\",\"minggu\":\"Tutup\"}', '(0274) 4463555', -7.72340000, 110.37890000, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(33, 'Klinik Spesialis Gizi RSUD Wates', 'klinik-spesialis-gizi-rsud-wates', 'specialist_clinic', 'Jl. Tentara Pelajar No.1, Wates, Kulon Progo', '(0274) 773169', 'gizi@rsudwates.com', 'https://rsudwates.com', 'Klinik spesialis gizi dengan pelayanan nutrisi komprehensif untuk berbagai kondisi kesehatan.', '[\"Konsultasi Gizi\",\"Diet Therapy\",\"Gizi Anak\",\"Gizi Geriatri\",\"Gizi Olahraga\",\"Eating Disorder\",\"Metabolic Syndrome\"]', '[\"Nutrition Counseling Room\",\"Body Composition Analyzer\",\"Metabolic Kitchen\",\"Nutrition Lab\"]', '{\"senin\":\"08:00-15:00\",\"selasa\":\"08:00-15:00\",\"rabu\":\"08:00-15:00\",\"kamis\":\"08:00-15:00\",\"jumat\":\"08:00-15:00\",\"sabtu\":\"08:00-12:00\",\"minggu\":\"Tutup\"}', '(0274) 773169', -7.85670000, 110.15890000, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(34, 'RSUP Dr. Sardjito - IGD', 'rsup-dr-sardjito-igd', 'emergency_center', 'Jl. Kesehatan No. 1, Sekip, Yogyakarta', '(0274) 631190', 'igd@sardjito.co.id', 'https://sardjito.co.id', 'Unit Gawat Darurat RSUP Dr. Sardjito adalah IGD rujukan nasional dengan fasilitas trauma center lengkap dan tim medis 24 jam.', '[\"Trauma Center\",\"Resusitasi\",\"Emergency Surgery\",\"Stroke Unit\",\"STEMI Center\",\"Poison Center\",\"Emergency Pediatric\"]', '[\"Ruang Resusitasi\",\"Trauma Bay\",\"Emergency OR\",\"CT Scan 24 Jam\",\"Laboratorium 24 Jam\",\"Ambulans\",\"Helipad\"]', '{\"senin\":\"24 Jam\",\"selasa\":\"24 Jam\",\"rabu\":\"24 Jam\",\"kamis\":\"24 Jam\",\"jumat\":\"24 Jam\",\"sabtu\":\"24 Jam\",\"minggu\":\"24 Jam\"}', '(0274) 631190', -7.76870000, 110.37390000, NULL, 1, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(35, 'RS Panti Rapih - IGD', 'rs-panti-rapih-igd', 'emergency_center', 'Jl. Cik Ditiro No. 30, Yogyakarta', '(0274) 552118', 'igd@pantirapih.or.id', 'https://pantirapih.or.id', 'IGD RS Panti Rapih melayani kegawatdaruratan 24 jam dengan tim medis berpengalaman dan fasilitas modern.', '[\"Emergency Medicine\",\"Trauma Care\",\"Cardiac Emergency\",\"Stroke Care\",\"Emergency Pediatric\",\"Obstetric Emergency\"]', '[\"Emergency Room\",\"Trauma Room\",\"Observation Room\",\"Emergency Lab\",\"Emergency Radiology\",\"Ambulans\"]', '{\"senin\":\"24 Jam\",\"selasa\":\"24 Jam\",\"rabu\":\"24 Jam\",\"kamis\":\"24 Jam\",\"jumat\":\"24 Jam\",\"sabtu\":\"24 Jam\",\"minggu\":\"24 Jam\"}', '(0274) 552118', -7.78510000, 110.37420000, NULL, 1, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(36, 'RSU Queen Latifa - IGD', 'rsu-queen-latifa-igd', 'emergency_center', 'Jl. Siliwangi No. 118, Gamping, Sleman', '(0274) 620555', 'igd@rsqueenlatifa.com', 'https://rsqueenlatifa.com', 'IGD RSU Queen Latifa memberikan pelayanan gawat darurat 24 jam dengan standar pelayanan tinggi.', '[\"Emergency Care\",\"Trauma Treatment\",\"Emergency Surgery\",\"Critical Care\",\"Emergency Radiology\"]', '[\"Emergency Ward\",\"Trauma Center\",\"Emergency OR\",\"ICU\",\"Emergency Lab\"]', '{\"senin\":\"24 Jam\",\"selasa\":\"24 Jam\",\"rabu\":\"24 Jam\",\"kamis\":\"24 Jam\",\"jumat\":\"24 Jam\",\"sabtu\":\"24 Jam\",\"minggu\":\"24 Jam\"}', '(0274) 620555', -7.78340000, 110.35670000, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(37, 'RS PKU Muhammadiyah Kotagede - IGD', 'rs-pku-muhammadiyah-kotagede-igd', 'emergency_center', 'Jl. Ngeksigondo No. 56, Kotagede, Yogyakarta', '(0274) 375396', 'igd@pkukotagede.com', 'https://pkukotagede.com', 'IGD RS PKU Muhammadiyah Kotagede melayani kegawatdaruratan dengan tim medis profesional 24 jam.', '[\"Emergency Medicine\",\"Trauma Care\",\"Emergency Pediatric\",\"Emergency Internal Medicine\"]', '[\"Emergency Room\",\"Observation Room\",\"Emergency Lab\",\"Emergency Pharmacy\",\"Ambulans\"]', '{\"senin\":\"24 Jam\",\"selasa\":\"24 Jam\",\"rabu\":\"24 Jam\",\"kamis\":\"24 Jam\",\"jumat\":\"24 Jam\",\"sabtu\":\"24 Jam\",\"minggu\":\"24 Jam\"}', '(0274) 375396', -7.81560000, 110.38890000, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(38, 'RS Pratama Kota Yogyakarta - IGD', 'rs-pratama-kota-yogyakarta-igd', 'emergency_center', 'Jl. Gondosuli No. 6, Yogyakarta', '(0274) 420118', 'igd@rspratama.com', 'https://rspratama.com', 'IGD RS Pratama Kota Yogyakarta memberikan pelayanan gawat darurat dengan fasilitas lengkap.', '[\"Emergency Care\",\"First Aid\",\"Emergency Medicine\",\"Trauma Treatment\"]', '[\"Emergency Room\",\"Trauma Room\",\"Emergency Lab\",\"Emergency Radiology\"]', '{\"senin\":\"24 Jam\",\"selasa\":\"24 Jam\",\"rabu\":\"24 Jam\",\"kamis\":\"24 Jam\",\"jumat\":\"24 Jam\",\"sabtu\":\"24 Jam\",\"minggu\":\"24 Jam\"}', '(0274) 420118', -7.79230000, 110.37120000, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(39, 'RS Hermina Yogyakarta - IGD', 'rs-hermina-yogyakarta-igd', 'emergency_center', 'Jl. Magelang Km 6, Yogyakarta', '+62 811-2823-535', 'igd@herminayogyakarta.com', 'https://herminayogyakarta.com', 'IGD RS Hermina Yogyakarta dengan pelayanan emergency modern dan tim medis berpengalaman.', '[\"Emergency Medicine\",\"Trauma Care\",\"Emergency Pediatric\",\"Emergency Obstetric\",\"Critical Care\"]', '[\"Emergency Ward\",\"Trauma Center\",\"NICU\",\"Emergency OR\",\"Emergency Lab\"]', '{\"senin\":\"24 Jam\",\"selasa\":\"24 Jam\",\"rabu\":\"24 Jam\",\"kamis\":\"24 Jam\",\"jumat\":\"24 Jam\",\"sabtu\":\"24 Jam\",\"minggu\":\"24 Jam\"}', '+62 811-2823-535', -7.74560000, 110.32340000, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(40, 'RSU Rajawali Citra - IGD', 'rsu-rajawali-citra-igd', 'emergency_center', 'Jl. Rajawali No. 1, Yogyakarta', '(0274) 4463535', 'igd@rajawalicitra.com', 'https://rajawalicitra.com', 'IGD RSU Rajawali Citra melayani kegawatdaruratan dengan standar pelayanan tinggi dan fasilitas modern.', '[\"Emergency Medicine\",\"Trauma Care\",\"Emergency Surgery\",\"Critical Care\"]', '[\"Emergency Room\",\"Trauma Bay\",\"Emergency OR\",\"ICU\",\"Emergency Radiology\"]', '{\"senin\":\"24 Jam\",\"selasa\":\"24 Jam\",\"rabu\":\"24 Jam\",\"kamis\":\"24 Jam\",\"jumat\":\"24 Jam\",\"sabtu\":\"24 Jam\",\"minggu\":\"24 Jam\"}', '(0274) 4463535', -7.77890000, 110.36780000, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(41, 'RSU Islam Indonesia - IGD', 'rsu-islam-indonesia-igd', 'emergency_center', 'Jl. Kaliurang Km 14.5, Sleman', '(0274) 2812111', 'igd@rsuii.co.id', 'https://rsuii.co.id', 'IGD RSU Islam Indonesia dengan pelayanan gawat darurat komprehensif dan tim medis 24 jam.', '[\"Emergency Medicine\",\"Trauma Center\",\"Emergency Pediatric\",\"Emergency Internal Medicine\"]', '[\"Emergency Ward\",\"Trauma Room\",\"Emergency Lab\",\"Emergency Radiology\",\"Ambulans\"]', '{\"senin\":\"24 Jam\",\"selasa\":\"24 Jam\",\"rabu\":\"24 Jam\",\"kamis\":\"24 Jam\",\"jumat\":\"24 Jam\",\"sabtu\":\"24 Jam\",\"minggu\":\"24 Jam\"}', '(0274) 2812111', -7.67890000, 110.34560000, NULL, 0, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(42, 'RS PKU Muhammadiyah Yogyakarta - IGD', 'rs-pku-muhammadiyah-yogyakarta-igd', 'emergency_center', 'Jl. KHA Dahlan No. 20, Yogyakarta', '(0274) 512653', 'igd@rspku.com', 'https://rspku.com', 'IGD RS PKU Muhammadiyah Yogyakarta dengan pelayanan emergency terpadu dan fasilitas lengkap.', '[\"Emergency Medicine\",\"Trauma Care\",\"Emergency Surgery\",\"Cardiac Emergency\",\"Stroke Care\"]', '[\"Emergency Room\",\"Trauma Center\",\"Emergency OR\",\"CCU\",\"Emergency Lab\"]', '{\"senin\":\"24 Jam\",\"selasa\":\"24 Jam\",\"rabu\":\"24 Jam\",\"kamis\":\"24 Jam\",\"jumat\":\"24 Jam\",\"sabtu\":\"24 Jam\",\"minggu\":\"24 Jam\"}', '(0274) 512653', -7.80140000, 110.36440000, NULL, 1, 1, '2025-06-29 04:01:03', '2025-06-29 04:01:03', NULL, NULL, NULL),
(43, 'RSUD Wates - IGD', 'rsud-wates-igd', 'emergency_center', 'Jl. Tentara Pelajar No.1, Wates, Kulon Progo', '(0274) 773169', 'igd@rsudwates.com', 'https://rsudwates.com', 'IGD RSUD Wates melayani kegawatdaruratan untuk wilayah Kulon Progo dengan fasilitas emergency lengkap.', '[\"Emergency Medicine\",\"Trauma Care\",\"Emergency Pediatric\",\"Emergency Obstetric\"]', '[\"Emergency Room\",\"Trauma Room\",\"Emergency Lab\",\"Emergency Radiology\",\"Ambulans\"]', '{\"senin\":\"24 Jam\",\"selasa\":\"24 Jam\",\"rabu\":\"24 Jam\",\"kamis\":\"24 Jam\",\"jumat\":\"24 Jam\",\"sabtu\":\"24 Jam\",\"minggu\":\"24 Jam\"}', '(0274) 773169', -7.85670000, 110.15890000, NULL, 0, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04', NULL, NULL, NULL),
(44, 'RS Universitas Islam Indonesia (UII) - IGD', 'rs-universitas-islam-indonesia-uii-igd', 'emergency_center', 'Jl. Kaliurang KM 14.5, Sleman', '(0274) 895287', 'igd@rsuii.ac.id', 'https://rsuii.ac.id', 'IGD RS UII dengan pelayanan gawat darurat modern dan tim medis akademis berpengalaman.', '[\"Emergency Medicine\",\"Trauma Care\",\"Emergency Research\",\"Teaching Emergency\"]', '[\"Emergency Ward\",\"Teaching Hospital\",\"Emergency Lab\",\"Emergency Radiology\"]', '{\"senin\":\"24 Jam\",\"selasa\":\"24 Jam\",\"rabu\":\"24 Jam\",\"kamis\":\"24 Jam\",\"jumat\":\"24 Jam\",\"sabtu\":\"24 Jam\",\"minggu\":\"24 Jam\"}', '(0274) 895287', -7.67890000, 110.34560000, NULL, 0, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04', NULL, NULL, NULL),
(45, 'RSUD Panembahan Senopati - IGD', 'rsud-panembahan-senopati-igd', 'emergency_center', 'Jl. Dr. Wahidin Sudirohusodo No.4, Bantul', '(0274) 367708', 'igd@rsudpanembahan.com', 'https://rsudpanembahan.com', 'IGD RSUD Panembahan Senopati melayani kegawatdaruratan untuk wilayah Bantul dan sekitarnya.', '[\"Emergency Medicine\",\"Trauma Care\",\"Emergency Pediatric\",\"Emergency Surgery\"]', '[\"Emergency Room\",\"Trauma Center\",\"Emergency OR\",\"Emergency Lab\"]', '{\"senin\":\"24 Jam\",\"selasa\":\"24 Jam\",\"rabu\":\"24 Jam\",\"kamis\":\"24 Jam\",\"jumat\":\"24 Jam\",\"sabtu\":\"24 Jam\",\"minggu\":\"24 Jam\"}', '(0274) 367708', -7.87890000, 110.32340000, NULL, 0, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04', NULL, NULL, NULL),
(46, 'RS Nur Hidayah - IGD', 'rs-nur-hidayah-igd', 'emergency_center', 'Jl. Imogiri Timur KM 11, Bantul', '(0274) 2810380', 'igd@rsnurhidayah.com', 'https://rsnurhidayah.com', 'IGD RS Nur Hidayah memberikan pelayanan gawat darurat dengan pendekatan islami dan fasilitas modern.', '[\"Emergency Medicine\",\"Trauma Care\",\"Emergency Pediatric\",\"Islamic Emergency Care\"]', '[\"Emergency Room\",\"Trauma Room\",\"Emergency Lab\",\"Prayer Room\"]', '{\"senin\":\"24 Jam\",\"selasa\":\"24 Jam\",\"rabu\":\"24 Jam\",\"kamis\":\"24 Jam\",\"jumat\":\"24 Jam\",\"sabtu\":\"24 Jam\",\"minggu\":\"24 Jam\"}', '(0274) 2810380', -7.91230000, 110.35670000, NULL, 0, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04', NULL, NULL, NULL),
(47, 'RSUD Nyi Ageng Serang - IGD', 'rsud-nyi-ageng-serang-igd', 'emergency_center', 'Jl. Sentolo-Nanggulan Km 3, Sentolo, Kulon Progo', '(0274) 773150', 'igd@rsudnas.com', 'https://rsudnas.com', 'IGD RSUD Nyi Ageng Serang melayani kegawatdaruratan untuk wilayah Kulon Progo bagian selatan.', '[\"Emergency Medicine\",\"Trauma Care\",\"Emergency Pediatric\",\"Rural Emergency\"]', '[\"Emergency Room\",\"Trauma Room\",\"Emergency Lab\",\"Ambulans\"]', '{\"senin\":\"24 Jam\",\"selasa\":\"24 Jam\",\"rabu\":\"24 Jam\",\"kamis\":\"24 Jam\",\"jumat\":\"24 Jam\",\"sabtu\":\"24 Jam\",\"minggu\":\"24 Jam\"}', '(0274) 773150', -7.82340000, 110.12340000, NULL, 0, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04', NULL, NULL, NULL),
(48, 'RS Happy Land Medical Center - IGD', 'rs-happy-land-medical-center-igd', 'emergency_center', 'Jl. Ipda Tut Harsono No. 53, Yogyakarta', '(0274) 550060', 'igd@rshappyland.com', 'https://rshappyland.com', 'IGD RS Happy Land Medical Center dengan pelayanan emergency modern dan tim medis profesional.', '[\"Emergency Medicine\",\"Trauma Care\",\"Emergency Surgery\",\"Critical Care\"]', '[\"Emergency Room\",\"Trauma Center\",\"Emergency OR\",\"ICU\",\"Emergency Lab\"]', '{\"senin\":\"24 Jam\",\"selasa\":\"24 Jam\",\"rabu\":\"24 Jam\",\"kamis\":\"24 Jam\",\"jumat\":\"24 Jam\",\"sabtu\":\"24 Jam\",\"minggu\":\"24 Jam\"}', '(0274) 550060', -7.81560000, 110.38890000, NULL, 0, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('unread','read','replied') NOT NULL DEFAULT 'unread',
  `reply` text DEFAULT NULL,
  `replied_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0000_00_00_000000_create_websockets_statistics_entries_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2025_05_03_202843_create_departments_table', 1),
(8, '2025_05_03_203043_create_services_table', 1),
(9, '2025_05_03_203157_create_contents_table', 1),
(10, '2025_05_03_203448_create_messages_table', 1),
(11, '2025_05_03_203715_create_settings_table', 1),
(12, '2025_05_04_213615_add_google_id_to_users_table', 1),
(13, '2025_05_09_070724_create_categories_table', 1),
(14, '2025_05_19_230557_create_bot_questions_table', 1),
(15, '2025_05_19_230614_create_bot_conversations_table', 1),
(16, '2025_05_28_175130_create_hospitals_table', 1),
(17, '2025_05_28_175224_create_tours_table', 1),
(18, '2025_05_28_175253_create_articles_table', 1),
(19, '2025_05_28_175320_create_testimonials_table', 1),
(20, '2025_05_28_175818_add_additional_fields_to_users_table', 1),
(21, '2025_05_30_172818_add_category_id_to_articles_table', 1),
(22, '2025_06_01_230745_add_missing_columns_to_hospitals_table', 1),
(23, '2025_06_01_230814_recreate_hospitals_table', 1),
(24, '2025_06_02_200344_add_doctors_to_hospitals_table', 1),
(25, '2025_06_02_200448_add_established_year_to_hospitals_table', 1),
(26, '2025_06_02_200529_add_bed_capacity_to_hospitals_table', 1),
(27, '2025_06_03_155942_add_maps_fields_to_tours_table', 1),
(28, '2025_06_03_193428_add_published_to_tours_table', 1),
(29, '2025_06_03_203623_add_slug_to_tours_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `service_type` varchar(255) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `email`, `title`, `message`, `rating`, `service_type`, `approved`, `featured`, `image`, `position`, `company`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john@example.com', 'Excellent Experience', 'HappyCare has been amazing for my health journey. The doctors are very professional and caring. I found the perfect specialist for my condition through their platform.', 5, NULL, 1, 1, NULL, 'Software Engineer', 'Tech Corp', NULL, '2025-06-29 04:01:03', '2025-06-29 04:01:03'),
(2, 'Jane Smith', 'jane@example.com', 'Outstanding Service', 'Excellent service and very convenient online consultations. The hospital recommendations were spot on. Highly recommended for anyone looking for quality healthcare!', 5, NULL, 1, 1, NULL, 'Marketing Manager', 'Digital Agency', NULL, '2025-06-29 04:01:03', '2025-06-29 04:01:03'),
(3, 'Mike Johnson', 'mike@example.com', 'Smooth and Helpful', 'The hospital recommendations were spot on. Found the perfect specialist for my condition. The booking process was smooth and hassle-free.', 4, NULL, 1, 0, NULL, 'Business Owner', 'Johnson & Co', NULL, '2025-06-29 04:01:03', '2025-06-29 04:01:03'),
(4, 'Sarah Wilson', 'sarah@example.com', 'Great Healthcare Platform', 'Great platform for health information and finding quality healthcare providers. The tour recommendations were also excellent for my family vacation.', 5, NULL, 1, 0, NULL, 'Teacher', 'Local School', NULL, '2025-06-29 04:01:03', '2025-06-29 04:01:03'),
(5, 'David Brown', 'david@example.com', 'Life-Saving Platform', 'Very helpful platform with comprehensive health resources. The emergency care center they recommended saved my life during a critical situation.', 5, NULL, 0, 0, NULL, 'Engineer', 'Construction Ltd', NULL, '2025-06-29 04:01:03', '2025-06-29 04:01:03'),
(6, 'Lisa Anderson', 'lisa@example.com', 'Perfect Family Vacation', 'Outstanding service! The family tour package was perfect for our vacation. Kids loved every moment and we created wonderful memories.', 5, NULL, 1, 1, NULL, 'Nurse', 'City Hospital', NULL, '2025-06-29 04:01:03', '2025-06-29 04:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` enum('nature','culinary','family') NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `google_maps_url` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gallery`)),
  `includes` text DEFAULT NULL,
  `excludes` text DEFAULT NULL,
  `itinerary` text DEFAULT NULL,
  `max_participants` int(11) DEFAULT NULL,
  `difficulty_level` enum('easy','moderate','hard') DEFAULT NULL,
  `available_dates` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`available_dates`)),
  `published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `name`, `slug`, `category`, `description`, `price`, `duration`, `location`, `latitude`, `longitude`, `address`, `google_maps_url`, `image`, `gallery`, `includes`, `excludes`, `itinerary`, `max_participants`, `difficulty_level`, `available_dates`, `published`, `created_at`, `updated_at`) VALUES
(1, 'Pantai Parangtritis', 'pantai-parangtritis', 'nature', 'Pantai legendaris dengan ombak besar dan pemandangan sunset yang menakjubkan. Terkenal dengan legenda Nyi Roro Kidul dan aktivitas paralayang.', 25000.00, '4-6 jam', 'Kec. Kretek, Kab. Bantul', -8.02490000, 110.32810000, 'Parangtritis, Kretek, Bantul Regency, Special Region of Yogyakarta', NULL, NULL, NULL, 'Tiket masuk, Parkir, Guide lokal', 'Transportasi, Makan, Aktivitas tambahan', 'Pagi: Perjalanan ke pantai. Siang: Eksplorasi pantai, foto-foto. Sore: Menikmati sunset. Malam: Kembali ke kota.', 50, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(2, 'Gunung Merapi', 'gunung-merapi', 'nature', 'Gunung berapi aktif yang menawarkan petualangan lava tour dan pemandangan spektakuler. Cocok untuk pecinta alam dan fotografi.', 150000.00, '1 hari penuh', 'Kec. Cangkringan, Kab. Sleman', -7.54070000, 110.44610000, 'Cangkringan, Sleman Regency, Special Region of Yogyakarta', NULL, NULL, NULL, 'Jeep 4WD, Guide berpengalaman, Helm safety, Masker debu', 'Makan siang, Asuransi perjalanan', 'Pagi: Briefing safety, perjalanan jeep. Siang: Eksplorasi area lava, Museum Sisa Hartaku. Sore: Kembali ke basecamp.', 20, 'moderate', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(3, 'Kalibiru', 'kalibiru', 'nature', 'Destinasi wisata alam dengan spot foto instagramable di atas pohon pinus. Menawarkan pemandangan Waduk Sermo yang memukau.', 35000.00, '3-4 jam', 'Kec. Kokap, Kab. Kulon Progo', -7.81670000, 110.11670000, 'Hargowilis, Kokap, Kulon Progo Regency, Special Region of Yogyakarta', NULL, NULL, NULL, 'Tiket masuk, Spot foto, Parkir', 'Transportasi, Makanan, Foto profesional', 'Pagi: Trekking ringan ke spot foto. Siang: Foto session di berbagai spot. Sore: Menikmati pemandangan waduk.', 30, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(4, 'Hutan Pinus Mangunan', 'hutan-pinus-mangunan', 'nature', 'Hutan pinus dengan udara sejuk dan spot foto yang instagramable. Cocok untuk camping dan piknik keluarga.', 15000.00, '2-3 jam', 'Kec. Dlingo, Kab. Bantul', -7.91670000, 110.41670000, 'Mangunan, Dlingo, Bantul Regency, Special Region of Yogyakarta', NULL, NULL, NULL, 'Tiket masuk, Area parkir, Toilet', 'Transportasi, Makanan, Peralatan camping', 'Pagi: Masuk area hutan pinus. Siang: Jelajah hutan, foto-foto. Sore: Piknik atau camping (opsional).', 40, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(5, 'Air Terjun Sri Gethuk', 'air-terjun-sri-gethuk', 'nature', 'Air terjun alami dengan kolam jernih untuk berenang. Akses dengan perahu tradisional menambah pengalaman unik.', 45000.00, '4-5 jam', 'Kec. Playen, Kab. Gunungkidul', -7.98330000, 110.71670000, 'Bleberan, Playen, Gunungkidul Regency, Special Region of Yogyakarta', NULL, NULL, NULL, 'Tiket masuk, Perahu tradisional, Life jacket, Guide lokal', 'Transportasi, Makanan, Peralatan renang', 'Pagi: Perjalanan dengan perahu. Siang: Berenang di kolam air terjun. Sore: Eksplorasi sekitar air terjun.', 25, 'moderate', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(6, 'Goa Jomblang', 'goa-jomblang', 'nature', 'Gua vertikal dengan cahaya surga yang terkenal. Petualangan caving yang menantang untuk pecinta adrenalin.', 200000.00, '6-7 jam', 'Kec. Semanu, Kab. Gunungkidul', -8.01670000, 110.68330000, 'Jetis Wetan, Pacarejo, Semanu, Gunungkidul Regency, Special Region of Yogyakarta', NULL, NULL, NULL, 'Peralatan caving lengkap, Guide profesional, Asuransi, Sertifikat', 'Transportasi, Makan siang, Dokumentasi foto', 'Pagi: Briefing safety, persiapan alat. Siang: Turun ke gua, eksplorasi. Sore: Naik kembali, debriefing.', 15, 'hard', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(7, 'Bukit Bintang', 'bukit-bintang', 'nature', 'Spot terbaik untuk melihat bintang dan sunrise di Gunungkidul. Cocok untuk camping dan astronomi.', 20000.00, '8-12 jam (camping)', 'Jalan Wonosari KM 15-17, Patuk, Kab. Gunungkidul', -7.88330000, 110.61670000, 'Patuk, Gunungkidul Regency, Special Region of Yogyakarta', NULL, NULL, NULL, 'Area camping, Toilet, Tempat parkir', 'Peralatan camping, Makanan, Transportasi', 'Sore: Setup camp. Malam: Stargazing. Dini hari: Sunrise viewing. Pagi: Breakdown camp.', 35, 'moderate', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(8, 'Pantai Indrayanti', 'pantai-indrayanti', 'nature', 'Pantai dengan pasir putih dan air laut jernih. Dilengkapi fasilitas lengkap untuk wisata keluarga.', 30000.00, '5-6 jam', 'Tepus, Kab. Gunungkidul', -8.15000000, 110.61670000, 'Tepus, Gunungkidul Regency, Special Region of Yogyakarta', NULL, NULL, NULL, 'Tiket masuk, Parkir, Toilet, Tempat bilas', 'Transportasi, Makanan, Penyewaan alat pantai', 'Pagi: Perjalanan ke pantai. Siang: Berenang, bermain pasir. Sore: Menikmati sunset, kuliner seafood.', 50, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(9, 'Tebing Breksi', 'tebing-breksi', 'nature', 'Bekas tambang batu kapur yang disulap menjadi destinasi wisata dengan relief dan spot foto unik.', 25000.00, '2-3 jam', 'Kec. Prambanan, Kab. Sleman', -7.75000000, 110.48330000, 'Sambirejo, Prambanan, Sleman Regency, Special Region of Yogyakarta', NULL, NULL, NULL, 'Tiket masuk, Parkir, Guide lokal', 'Transportasi, Makanan, Foto profesional', 'Pagi: Eksplorasi tebing dan relief. Siang: Foto session di berbagai spot. Sore: Menikmati pemandangan sekitar.', 40, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(10, 'Waduk Sermo', 'waduk-sermo', 'nature', 'Waduk buatan dengan pemandangan indah dan aktivitas air. Cocok untuk memancing dan berperahu.', 15000.00, '3-4 jam', 'Kec. Kokap, Kab. Kulon Progo', -7.81670000, 110.10000000, 'Kokap, Kulon Progo Regency, Special Region of Yogyakarta', NULL, NULL, NULL, 'Tiket masuk, Area parkir, Toilet', 'Sewa perahu, Peralatan memancing, Makanan', 'Pagi: Tiba di waduk. Siang: Aktivitas air atau memancing. Sore: Menikmati pemandangan waduk.', 30, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(11, 'Lava Tour Merapi', 'lava-tour-merapi', 'nature', 'Tur khusus melihat sisa-sisa letusan Merapi dengan jeep 4WD. Pengalaman edukatif tentang vulkanologi.', 120000.00, '4-5 jam', 'Kaliurang, Sleman', -7.58330000, 110.41670000, 'Kaliurang, Pakem, Sleman Regency, Special Region of Yogyakarta', NULL, NULL, NULL, 'Jeep 4WD, Driver berpengalaman, Helm safety, Guide', 'Makan siang, Dokumentasi foto, Asuransi', 'Pagi: Briefing, perjalanan jeep. Siang: Kunjungi Museum Sisa Hartaku, area lava. Sore: Kembali ke basecamp.', 20, 'moderate', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(12, 'Pantai Pok Tunggal', 'pantai-pok-tunggal', 'nature', 'Pantai tersembunyi dengan pohon duras ikonik. Suasana tenang dan pemandangan laut yang memukau.', 25000.00, '4-5 jam', 'Tepus, Gunungkidul', -8.16670000, 110.60000000, 'Tepus, Gunungkidul Regency, Special Region of Yogyakarta', NULL, NULL, NULL, 'Tiket masuk, Parkir, Toilet', 'Transportasi, Makanan, Penyewaan alat pantai', 'Pagi: Perjalanan ke pantai. Siang: Berenang, foto dengan pohon duras. Sore: Sunset viewing.', 35, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(13, 'Gunung Api Purba Nglanggeran', 'gunung-api-purba-nglanggeran', 'nature', 'Gunung api purba dengan formasi batuan unik. Trekking ringan dengan pemandangan spektakuler.', 40000.00, '4-5 jam', 'Patuk, Gunungkidul', -7.85000000, 110.60000000, 'Nglanggeran, Patuk, Gunungkidul Regency, Special Region of Yogyakarta', NULL, NULL, NULL, 'Tiket masuk, Guide lokal, Parkir', 'Transportasi, Makanan, Peralatan hiking', 'Pagi: Trekking ke puncak. Siang: Eksplorasi formasi batuan. Sore: Turun gunung, istirahat.', 25, 'moderate', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(14, 'Goa Pindul', 'goa-pindul', 'nature', 'Cave tubing dengan aliran sungai bawah tanah. Petualangan seru dengan pemandangan stalaktit dan stalagmit.', 75000.00, '3-4 jam', 'Bejiharjo, Karangmojo, Gunungkidul', -7.96670000, 110.68330000, 'Bejiharjo, Karangmojo, Gunungkidul Regency, Special Region of Yogyakarta', NULL, NULL, NULL, 'Ban pelampung, Life jacket, Helm, Guide berpengalaman', 'Transportasi, Makanan, Dokumentasi underwater', 'Pagi: Briefing safety, persiapan alat. Siang: Cave tubing menyusuri goa. Sore: Selesai tur, istirahat.', 20, 'moderate', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(15, 'Pantai Wediombo', 'pantai-wediombo', 'nature', 'Pantai dengan laguna alami dan kolam renang alam. Cocok untuk berenang dan snorkeling ringan.', 35000.00, '5-6 jam', 'Girisubo, Gunungkidul', -8.20000000, 110.71670000, 'Jepitu, Girisubo, Gunungkidul Regency, Special Region of Yogyakarta', NULL, NULL, NULL, 'Tiket masuk, Parkir, Toilet, Tempat bilas', 'Transportasi, Makanan, Peralatan snorkeling', 'Pagi: Perjalanan ke pantai. Siang: Berenang di laguna, eksplorasi pantai. Sore: Sunset viewing.', 40, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(16, 'Taman Pintar', 'taman-pintar', 'family', 'Wahana edukasi interaktif untuk anak-anak dengan berbagai zona pembelajaran sains dan teknologi.', 25000.00, '3-4 jam', 'Jl. Panembahan Senopati, Kota Yogyakarta', -7.80140000, 110.36750000, 'Jl. Panembahan Senopati No.1-3, Ngupasan, Gondomanan, Yogyakarta City', NULL, NULL, NULL, 'Tiket masuk semua zona, Parkir, Toilet', 'Makanan, Souvenir, Transportasi', 'Pagi: Zona sains dasar. Siang: Zona teknologi dan komputer. Sore: Zona kreativitas dan playground.', 50, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(17, 'Gembira Loka Zoo', 'gembira-loka-zoo', 'family', 'Kebun binatang dengan koleksi satwa lengkap dan wahana permainan untuk keluarga.', 35000.00, '4-5 jam', 'Jl. Kebun Raya, Kota Yogyakarta', -7.81670000, 110.38330000, 'Jl. Kebun Raya No.2, Rejowinangun, Kotagede, Yogyakarta City', NULL, NULL, NULL, 'Tiket masuk zoo, Parkir, Peta lokasi', 'Makanan hewan, Wahana berbayar, Transportasi', 'Pagi: Area mamalia besar. Siang: Area reptil dan burung. Sore: Wahana permainan dan feeding time.', 60, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(18, 'Sindu Kusuma Edupark (SKE)', 'sindu-kusuma-edupark-ske', 'family', 'Taman rekreasi dengan wahana permainan modern dan edukasi. Dilengkapi bianglala dan berbagai rides.', 50000.00, '5-6 jam', 'Jl. Jambon, Kec. Mlati, Kab. Sleman', -7.73330000, 110.36670000, 'Jl. Jambon, Sinduharjo, Ngaglik, Sleman Regency', NULL, NULL, NULL, 'Tiket masuk, Parkir, Beberapa wahana gratis', 'Wahana berbayar, Makanan, Transportasi', 'Pagi: Wahana anak-anak. Siang: Bianglala dan flying fox. Sore: Area edukasi dan playground.', 40, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(19, 'Museum Ullen Sentalu', 'museum-ullen-sentalu', 'family', 'Museum budaya Jawa dengan koleksi seni dan sejarah kerajaan. Tur guided yang edukatif untuk keluarga.', 40000.00, '2-3 jam', 'Kaliurang, Kec. Pakem, Kab. Sleman', -7.58330000, 110.41670000, 'Jl. Boyong, Kaliurang Barat, Hargobinangun, Pakem, Sleman Regency', NULL, NULL, NULL, 'Tur guided, Brosur museum, Parkir', 'Foto di dalam museum, Makanan, Transportasi', 'Pagi: Tur sejarah kerajaan. Siang: Koleksi seni dan budaya. Sore: Taman museum dan souvenir shop.', 25, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(20, 'De Mata Trick Eye Museum', 'de-mata-trick-eye-museum', 'family', 'Museum seni 3D interaktif dengan lukisan optical illusion yang sempurna untuk foto keluarga.', 30000.00, '2-3 jam', 'XT Square, Umbulharjo, Kota Yogyakarta', -7.81670000, 110.38330000, 'XT Square, Jl. Veteran No.150-151, Pandeyan, Umbulharjo, Yogyakarta City', NULL, NULL, NULL, 'Tiket masuk, Parkir, Tips foto', 'Cetak foto, Makanan, Transportasi', 'Pagi: Zona fantasi dan adventure. Siang: Zona horror dan misteri. Sore: Zona klasik dan masterpiece.', 35, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(21, 'Taman Pelangi Monjali', 'taman-pelangi-monjali', 'family', 'Taman hiburan dengan wahana permainan dan pertunjukan air mancur menari yang spektakuler.', 45000.00, '4-5 jam', 'Jl. Ring Road Utara, Monjali, Sleman', -7.75000000, 110.36670000, 'Jl. Ring Road Utara, Karangjati, Sinduharjo, Ngaglik, Sleman Regency', NULL, NULL, NULL, 'Tiket masuk, Parkir, Pertunjukan air mancur', 'Wahana berbayar, Makanan, Transportasi', 'Pagi: Wahana anak-anak. Siang: Area playground dan permainan. Malam: Pertunjukan air mancur menari.', 50, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(22, 'Agrowisata Bhumi Merapi', 'agrowisata-bhumi-merapi', 'family', 'Wisata edukasi pertanian dengan aktivitas memetik buah dan belajar bercocok tanam.', 35000.00, '3-4 jam', 'Kaliurang, Kec. Pakem, Kab. Sleman', -7.58330000, 110.40000000, 'Kaliurang, Hargobinangun, Pakem, Sleman Regency', NULL, NULL, NULL, 'Tur kebun, Aktivitas memetik, Guide', 'Buah yang dipetik, Makanan, Transportasi', 'Pagi: Tur kebun sayuran. Siang: Memetik buah dan belajar berkebun. Sore: Pengolahan hasil panen.', 30, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(23, 'The Lost World Castle', 'the-lost-world-castle', 'family', 'Kastil bergaya Eropa dengan berbagai spot foto dan wahana permainan untuk keluarga.', 40000.00, '3-4 jam', 'Dusun Petung, Kepuharjo, Sleman', -7.56670000, 110.43330000, 'Petung, Kepuharjo, Cangkringan, Sleman Regency', NULL, NULL, NULL, 'Tiket masuk, Parkir, Spot foto', 'Makanan, Souvenir, Transportasi', 'Pagi: Eksplorasi kastil. Siang: Foto session di berbagai spot. Sore: Wahana permainan anak.', 40, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(24, 'Kids Fun Parcs', 'kids-fun-parcs', 'family', 'Taman bermain indoor dan outdoor dengan wahana lengkap untuk anak-anak segala usia.', 55000.00, '4-5 jam', 'Jl. Wonosari KM 10, Piyungan, Kab. Bantul', -7.85000000, 110.43330000, 'Jl. Wonosari KM 10, Piyungan, Bantul Regency', NULL, NULL, NULL, 'Tiket masuk, Parkir, Beberapa wahana', 'Wahana premium, Makanan, Transportasi', 'Pagi: Area playground indoor. Siang: Wahana outdoor dan kolam renang. Sore: Games dan kompetisi.', 45, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(25, 'HeHa Sky View', 'heha-sky-view', 'family', 'Destinasi wisata dengan pemandangan alam dan spot foto instagramable di ketinggian.', 45000.00, '3-4 jam', 'Jl. Dlingo-Patuk, Bukit Patuk, Kab. Gunungkidul', -7.88330000, 110.60000000, 'Patuk, Gunungkidul Regency', NULL, NULL, NULL, 'Tiket masuk, Parkir, Spot foto', 'Makanan, Foto profesional, Transportasi', 'Pagi: Trekking ringan ke viewpoint. Siang: Foto session di sky bridge. Sore: Menikmati pemandangan.', 35, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(26, 'Jogja Bay Waterpark', 'jogja-bay-waterpark', 'family', 'Waterpark terbesar di Yogyakarta dengan berbagai wahana air untuk semua usia.', 75000.00, '6-8 jam', 'Maguwoharjo, Sleman', -7.75000000, 110.41670000, 'Jl. Utara Stadion, Maguwoharjo, Depok, Sleman Regency', NULL, NULL, NULL, 'Tiket masuk, Parkir, Locker, Life jacket', 'Makanan, Handuk, Transportasi', 'Pagi: Wahana anak-anak. Siang: Kolam ombak dan lazy river. Sore: Water slide dan area relaksasi.', 60, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(27, 'Museum De Arca (Patung 3D)', 'museum-de-arca-patung-3d', 'family', 'Museum patung 3D dengan koleksi seni patung yang dapat disentuh dan difoto.', 25000.00, '2-3 jam', 'XT Square, Kota Yogyakarta', -7.81670000, 110.38330000, 'XT Square, Jl. Veteran No.150-151, Pandeyan, Umbulharjo, Yogyakarta City', NULL, NULL, NULL, 'Tiket masuk, Parkir, Guide', 'Foto profesional, Makanan, Transportasi', 'Pagi: Zona sejarah dan budaya. Siang: Zona modern dan kontemporer. Sore: Workshop mini sculpting.', 30, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(28, 'Taman Lampion Kaliurang', 'taman-lampion-kaliurang', 'family', 'Taman dengan ribuan lampion warna-warni yang indah di malam hari. Cocok untuk wisata malam keluarga.', 30000.00, '2-3 jam (malam)', 'Kaliurang Barat, Sleman', -7.58330000, 110.40000000, 'Kaliurang Barat, Hargobinangun, Pakem, Sleman Regency', NULL, NULL, NULL, 'Tiket masuk, Parkir, Spot foto', 'Makanan, Souvenir, Transportasi', 'Sore: Persiapan dan makan malam. Malam: Menikmati lampion dan foto. Malam: Pertunjukan cahaya.', 40, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(29, 'Desa Wisata Gamplong', 'desa-wisata-gamplong', 'family', 'Wisata edukasi budaya dengan aktivitas membatik, belajar gamelan, dan kuliner tradisional.', 40000.00, '4-5 jam', 'Moyudan, Sleman', -7.75000000, 110.50000000, 'Gamplong, Sumberharjo, Prambanan, Sleman Regency', NULL, NULL, NULL, 'Workshop batik, Belajar gamelan, Makan siang tradisional', 'Hasil karya batik, Souvenir, Transportasi', 'Pagi: Workshop membatik. Siang: Belajar gamelan dan tari. Sore: Kuliner tradisional dan belanja.', 25, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(30, 'Obelix Hills', 'obelix-hills', 'family', 'Destinasi wisata dengan replika desa Asterix dan Obelix, cocok untuk foto keluarga yang unik.', 35000.00, '2-3 jam', 'Klumprit, Prambanan, Sleman', -7.73330000, 110.48330000, 'Klumprit, Bimomartani, Ngemplak, Sleman Regency', NULL, NULL, NULL, 'Tiket masuk, Parkir, Spot foto', 'Makanan, Souvenir, Transportasi', 'Pagi: Eksplorasi desa replika. Siang: Foto session dengan kostum. Sore: Area playground dan games.', 35, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(31, 'Gudeg Yu Djum Pusat', 'gudeg-yu-djum-pusat', 'culinary', 'Gudeg legendaris Yogyakarta dengan cita rasa autentik dan bumbu rahasia turun temurun.', 15000.00, '1-2 jam', 'Jl. Wijilan No.167, Kota Yogyakarta', -7.80560000, 110.36440000, 'Jl. Wijilan No.167, Panembahan, Kraton, Yogyakarta City', NULL, NULL, NULL, 'Gudeg komplit, Nasi, Teh manis', 'Minuman tambahan, Transportasi, Oleh-oleh', 'Datang: Menikmati gudeg hangat. Selesai: Beli oleh-oleh gudeg kaleng.', 20, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(32, 'Bakpia Pathok 25', 'bakpia-pathok-25', 'culinary', 'Bakpia original Yogyakarta dengan berbagai varian rasa dan kualitas terjamin sejak 1948.', 25000.00, '1 jam', 'Jl. AIP II KS Tubun, Pathok, Kota Yogyakarta', -7.79440000, 110.36560000, 'Jl. KS Tubun No.3, Sosromenduran, Gedongtengen, Yogyakarta City', NULL, NULL, NULL, 'Tasting bakpia, Teh/kopi, Penjelasan proses pembuatan', 'Pembelian bakpia, Transportasi, Makanan lain', 'Datang: Tasting berbagai rasa bakpia. Selesai: Belanja bakpia untuk oleh-oleh.', 15, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(33, 'Angkringan Lik Man', 'angkringan-lik-man', 'culinary', 'Angkringan legendaris dekat Stasiun Tugu dengan suasana khas Yogyakarta dan menu tradisional.', 20000.00, '2-3 jam', 'Dekat Stasiun Tugu, Jl. Wongsodirjan, Kota Yogyakarta', -7.78890000, 110.36390000, 'Jl. Wongsodirjan, Pringgokusuman, Gedongtengen, Yogyakarta City', NULL, NULL, NULL, 'Nasi kucing, Sate usus, Wedang jahe, Suasana angkringan', 'Makanan tambahan, Transportasi, Minuman lain', 'Malam: Datang ke angkringan. Malam: Menikmati makanan dan ngobrol. Selesai: Pulang kenyang.', 25, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(34, 'Sate Klathak Pak Pong', 'sate-klathak-pak-pong', 'culinary', 'Sate kambing khas Bantul yang dipanggang dengan arang dan bumbu kacang yang gurih.', 35000.00, '1-2 jam', 'Jl. Imogiri Timur KM 10, Jejeran, Bantul', -7.88330000, 110.38330000, 'Jl. Imogiri Timur KM 10, Jejeran, Wonokromo, Bantul Regency', NULL, NULL, NULL, 'Sate klathak, Nasi, Sambal, Teh manis', 'Minuman tambahan, Transportasi, Makanan lain', 'Datang: Pesan sate klathak. Tunggu: Melihat proses pembakaran. Makan: Menikmati sate hangat.', 30, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(35, 'Mie Ayam Tumini', 'mie-ayam-tumini', 'culinary', 'Mie ayam legendaris dengan kuah kaldu yang gurih dan topping ayam yang melimpah.', 18000.00, '1 jam', 'Jl. Imogiri Timur No.187, Umbulharjo, Kota Yogyakarta', -7.83330000, 110.38330000, 'Jl. Imogiri Timur No.187, Giwangan, Umbulharjo, Yogyakarta City', NULL, NULL, NULL, 'Mie ayam komplit, Pangsit, Teh manis', 'Minuman tambahan, Transportasi, Makanan lain', 'Datang: Pesan mie ayam. Tunggu: Melihat proses pembuatan. Makan: Menikmati mie ayam hangat.', 20, 'easy', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(36, 'Oseng Mercon Bu Narti', 'oseng-mercon-bu-narti', 'culinary', 'Oseng-oseng pedas level tinggi yang menantang lidah dengan cita rasa yang nagih.', 22000.00, '1-2 jam', 'Jl. KH Ahmad Dahlan, Kota Yogyakarta', -7.80000000, 110.36670000, 'Jl. KH Ahmad Dahlan, Ngampilan, Yogyakarta City', NULL, NULL, NULL, 'Oseng mercon, Nasi, Es teh manis, Susu untuk meredakan pedas', 'Makanan tambahan, Transportasi, Minuman lain', 'Datang: Pesan oseng mercon. Makan: Tantangan pedas dimulai. Selesai: Minum susu untuk meredakan.', 15, 'moderate', NULL, 1, '2025-06-29 04:01:04', '2025-06-29 04:01:04'),
(37, 'Gudeg Pawon', 'gudeg-pawon', 'culinary', 'Gudeg dengan cita rasa manis khas Yogyakarta yang dimasak dengan kayu bakar tradisional.', 20000.00, '1-2 jam', 'Jl. Janturan No.36, Umbulharjo, Kota Yogyakarta', -7.81670000, 110.38330000, 'Jl. Janturan No.36, Warungboto, Umbulharjo, Yogyakarta City', NULL, NULL, NULL, 'Gudeg komplit, Nasi, Sambal krecek, Teh manis', 'Minuman tambahan, Transportasi, Oleh-oleh', 'Datang: Pesan gudeg pawon. Makan: Menikmati gudeg hangat. Selesai: Beli gudeg untuk dibawa pulang.', 25, 'easy', NULL, 1, '2025-06-29 04:01:05', '2025-06-29 04:01:05'),
(38, 'Mangut Lele Mbah Marto', 'mangut-lele-mbah-marto', 'culinary', 'Mangut lele dengan kuah santan pedas yang khas dan lele segar dari kolam sendiri.', 28000.00, '1-2 jam', 'Ngireng-ireng, Sewon, Kab. Bantul', -7.85000000, 110.35000000, 'Ngireng-ireng, Panggungharjo, Sewon, Bantul Regency', NULL, NULL, NULL, 'Mangut lele, Nasi, Lalapan, Es teh', 'Ikan tambahan, Transportasi, Minuman lain', 'Datang: Pilih lele segar. Tunggu: Proses memasak mangut. Makan: Menikmati mangut lele hangat.', 20, 'easy', NULL, 1, '2025-06-29 04:01:05', '2025-06-29 04:01:05'),
(39, 'Jejamuran Resto', 'jejamuran-resto', 'culinary', 'Restoran khusus jamur dengan berbagai olahan jamur yang unik dan sehat.', 45000.00, '2-3 jam', 'Jl. Pendowoharjo, Niron, Sleman', -7.91670000, 110.28330000, 'Jl. Pendowoharjo, Niron, Srandakan, Bantul Regency', NULL, NULL, NULL, 'Menu jamur pilihan, Nasi, Minuman, Tur kebun jamur', 'Menu premium, Transportasi, Oleh-oleh jamur', 'Datang: Tur kebun jamur. Makan: Menikmati berbagai olahan jamur. Selesai: Belanja jamur segar.', 30, 'easy', NULL, 1, '2025-06-29 04:01:05', '2025-06-29 04:01:05'),
(40, 'Wedang Ronde Mbah Payem', 'wedang-ronde-mbah-payem', 'culinary', 'Wedang ronde legendaris di Alun-alun Kidul dengan ronde isi kacang yang hangat.', 12000.00, '1 jam', 'Alun-alun Kidul, Kota Yogyakarta', -7.81110000, 110.36390000, 'Alun-alun Kidul, Patehan, Kraton, Yogyakarta City', NULL, NULL, NULL, 'Wedang ronde, Kacang rebus, Suasana alun-alun', 'Makanan tambahan, Transportasi, Minuman lain', 'Malam: Datang ke alun-alun. Malam: Menikmati wedang ronde hangat. Selesai: Jalan-jalan di alun-alun.', 15, 'easy', NULL, 1, '2025-06-29 04:01:05', '2025-06-29 04:01:05'),
(41, 'Ayam Goreng Mbah Cemplung', 'ayam-goreng-mbah-cemplung', 'culinary', 'Ayam goreng dengan bumbu meresap dan sambal yang pedas, disajikan dengan lalapan segar.', 32000.00, '1-2 jam', 'Jalan Parangtritis KM 10, Bantul', -7.86670000, 110.35000000, 'Jl. Parangtritis KM 10, Sewon, Bantul Regency', NULL, NULL, NULL, 'Ayam goreng, Nasi, Lalapan, Sambal, Es teh', 'Ayam tambahan, Transportasi, Minuman lain', 'Datang: Pesan ayam goreng. Tunggu: Proses menggoreng ayam. Makan: Menikmati ayam goreng hangat.', 25, 'easy', NULL, 1, '2025-06-29 04:01:05', '2025-06-29 04:01:05'),
(42, 'Lumpia Samijaya', 'lumpia-samijaya', 'culinary', 'Lumpia basah dan goreng khas Yogyakarta di kawasan Malioboro dengan isian yang melimpah.', 18000.00, '1 jam', 'Malioboro, Kota Yogyakarta', -7.79440000, 110.36560000, 'Jl. Malioboro, Sosromenduran, Gedongtengen, Yogyakarta City', NULL, NULL, NULL, 'Lumpia basah dan goreng, Sambal, Teh manis', 'Lumpia tambahan, Transportasi, Minuman lain', 'Datang: Pesan lumpia. Makan: Menikmati lumpia hangat. Selesai: Jalan-jalan di Malioboro.', 20, 'easy', NULL, 1, '2025-06-29 04:01:05', '2025-06-29 04:01:05'),
(43, 'Soto Kadipiro', 'soto-kadipiro', 'culinary', 'Soto ayam dengan kuah bening yang segar dan daging ayam yang empuk.', 16000.00, '1 jam', 'Jl. Wates KM 4,5, Yogyakarta', -7.78330000, 110.31670000, 'Jl. Wates KM 4,5, Gamping, Sleman Regency', NULL, NULL, NULL, 'Soto ayam, Nasi, Kerupuk, Teh manis', 'Soto tambahan, Transportasi, Minuman lain', 'Datang: Pesan soto ayam. Makan: Menikmati soto hangat. Selesai: Minum teh manis.', 20, 'easy', NULL, 1, '2025-06-29 04:01:05', '2025-06-29 04:01:05'),
(44, 'Bakmi Jawa Mbah Mo', 'bakmi-jawa-mbah-mo', 'culinary', 'Bakmi Jawa dengan bumbu khas dan topping yang melimpah, disajikan dengan kerupuk.', 14000.00, '1 jam', 'Code, Bantul', -7.88330000, 110.33330000, 'Code, Bantul Regency', NULL, NULL, NULL, 'Bakmi Jawa, Kerupuk, Teh manis', 'Bakmi tambahan, Transportasi, Minuman lain', 'Datang: Pesan bakmi Jawa. Makan: Menikmati bakmi hangat. Selesai: Minum teh manis.', 15, 'easy', NULL, 1, '2025-06-29 04:01:05', '2025-06-29 04:01:05'),
(45, 'Es Buah PK', 'es-buah-pk', 'culinary', 'Es buah segar dengan berbagai macam buah tropis dan sirup yang manis.', 10000.00, '30 menit', 'Jl. Pakuningratan, Jetis', -7.78330000, 110.35000000, 'Jl. Pakuningratan, Cokrodiningratan, Jetis, Yogyakarta City', NULL, NULL, NULL, 'Es buah komplit, Sirup, Es serut', 'Buah tambahan, Transportasi, Minuman lain', 'Datang: Pesan es buah. Minum: Menikmati es buah segar. Selesai: Merasa segar kembali.', 10, 'easy', NULL, 1, '2025-06-29 04:01:05', '2025-06-29 04:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','staff','user') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `google_id`, `email_verified_at`, `password`, `role`, `status`, `phone`, `address`, `avatar`, `newsletter`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@happycare.com', NULL, '2025-06-29 04:01:00', '$2y$10$1scHBFTXYoegz3LwaljETOlE.9WlZXtFROOJ7Jrbh8GJ/cP6WfWJy', 'admin', 'active', '+62-21-1234567', 'Jakarta, Indonesia', NULL, 0, NULL, '2025-06-29 04:01:00', '2025-06-29 04:01:00'),
(2, 'John Doe', 'john@example.com', NULL, '2025-06-29 04:01:01', '$2y$10$0iO7b5TcTkb6h/d0ku3jhe3lMFBB1pSbyv2bcG5gv9UqzMvQpfqK2', 'user', 'active', '+1234567890', '123 Main St, New York, USA', NULL, 0, NULL, '2025-06-29 04:01:02', '2025-06-29 04:01:02'),
(3, 'Jane Smith', 'jane@example.com', NULL, '2025-06-29 04:01:01', '$2y$10$yCTYtlBB57VtmO2nDuNmjuYqg9.YefvDW01Yp9Vvne8pkxic1FAW.', 'user', 'active', '+1234567891', '456 Oak Ave, Los Angeles, USA', NULL, 0, NULL, '2025-06-29 04:01:02', '2025-06-29 04:01:02'),
(4, 'Mike Johnson', 'mike@example.com', NULL, '2025-06-29 04:01:02', '$2y$10$qXc4tTHvh76qo.XZDGPkpu1a7YWCi7Uh7TgCGvv4M7v4H29S8hUmu', 'user', 'active', '+1234567892', '789 Pine St, Chicago, USA', NULL, 0, NULL, '2025-06-29 04:01:02', '2025-06-29 04:01:02'),
(5, 'Sarah Wilson', 'sarah@example.com', NULL, '2025-06-29 04:01:02', '$2y$10$sPZPOkYigtn0fidzH6eXr.PX2qF3Ub6NM.6gFqDf3feNPQAETrlFe', 'user', 'active', '+1234567893', '321 Elm St, Houston, USA', NULL, 0, NULL, '2025-06-29 04:01:02', '2025-06-29 04:01:02'),
(6, 'David Brown', 'david@example.com', NULL, '2025-06-29 04:01:02', '$2y$10$MBtLnOwgcpfkmeYf7Noo1.iRx1icCre.AyONeBaYEjTNNiDOy4lwO', 'user', 'inactive', '+1234567894', '654 Maple Dr, Phoenix, USA', NULL, 0, NULL, '2025-06-29 04:01:02', '2025-06-29 04:01:02'),
(7, 'Yuli Antikasari', 'yuliantikasari0526@gmail.com', '101834783874487032736', NULL, '$2y$10$RqhFngPRm7Y/gmpUTXQGEOGXcI1CJz9e3sEirVBpF0S3LVNWg65x2', 'user', 'active', NULL, NULL, NULL, 0, NULL, '2025-06-29 04:13:16', '2025-06-29 04:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(255) NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`),
  ADD KEY `articles_user_id_foreign` (`user_id`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Indexes for table `bot_conversations`
--
ALTER TABLE `bot_conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bot_conversations_user_id_foreign` (`user_id`),
  ADD KEY `bot_conversations_question_id_foreign` (`question_id`);

--
-- Indexes for table `bot_questions`
--
ALTER TABLE `bot_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contents_slug_unique` (`slug`),
  ADD KEY `contents_user_id_foreign` (`user_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hospitals_slug_unique` (`slug`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_department_id_foreign` (`department_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_user_id_foreign` (`user_id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tours_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bot_conversations`
--
ALTER TABLE `bot_conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bot_questions`
--
ALTER TABLE `bot_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bot_conversations`
--
ALTER TABLE `bot_conversations`
  ADD CONSTRAINT `bot_conversations_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `bot_questions` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bot_conversations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
