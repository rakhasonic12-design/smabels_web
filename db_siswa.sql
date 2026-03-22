-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2026 at 05:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin11', 'eb1baea1dc444e48965c1fab3df84ee2'),
(4, 'guru', '242526');

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `judul`, `isi`, `tanggal`) VALUES
(14, 'Pengumuman SNBP', NULL, '2026-03-21 00:00:00'),
(15, 'UTBK-SNBT', NULL, '2026-04-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `aspirasi`
--

CREATE TABLE `aspirasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `isi` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aspirasi`
--

INSERT INTO `aspirasi` (`id`, `nama`, `role`, `isi`, `tanggal`) VALUES
(1, 'yuda', 'Siswa', 'ini contoh aja', '2025-10-17 04:01:29'),
(2, 'yuda', 'OrangTua', 'Sma keren\\r\\n', '2025-10-17 07:06:33'),
(3, 'yuda', 'Guru', 'sma keren', '2025-10-17 07:08:40'),
(4, 'yuda', 'Masyarakat', 'sma keren', '2025-10-17 07:09:13'),
(5, 'Rakha', 'Siswa', 'Oke', '2025-12-31 09:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `kategori`, `isi`, `gambar`, `tanggal`) VALUES
(13, 'SISWA BERPRESTASI!-Tim Basket SMAN 11 Kota Bekasi Berhasil Mendapat Juara 1 pada ELATE CUP.', 'Prestasi', 'Selamat kepada Tim Basket SMAN 11 Kota Bekasi berhasil meraih Juara 1 Basket Puteri ELATE CUP 2025 di SMK PENABUR Kota Wisata! Kerja keras, kekompakan, dan semangat juang membuahkan hasil terbaik. Terus berprestasi dan jadi inspirasi!', '1760694260.jpeg', '2025-10-17 14:21:20'),
(14, 'SISWA BERPRESTASI!-Siswa SMAN 11 Kota Bekasi Berhasil mendapat penghargaan di OSN   Bidang Geografi.', 'Prestasi', 'Dhava Sastrajendra Pandy berhasil meraih Honorable Mention Olimpiade Sains Nasional bidang Geografi yang diselenggarakan pada 6-11 Oktober 2025 di Universitas Muhammadiyah Malang!\\r\\nKerja keras, dedikasi, dan semangat belajar tinggi membuahkan hasil yang membanggakan. Terus melangkah dan menginspirasi!', '1760694197.jpeg', '2025-10-17 14:24:58'),
(15, 'SISWA BERPRESTASI!-Tim PMR SMAN 11 Kota Bekasi meraih Juara 2 Unggulan  di lomba Cepat Tepat PMR', 'Prestasi', 'ALTHAF WANDRA PRATAMA dan AHMAD MUBARAK AL AZIZ berhasil meraih Juara Unggulan 2 dalam Lomba Cepat Tepat PMR Terima kasih atas kerja keras, semangat, dan kekompakan seluruh tim!', '1760694305.jpeg', '2025-10-17 16:45:05'),
(16, 'SISWA BERPRESTASI!-Tim RAVEN SMAN 11 Kota Bekasi berhasil meraih Juara 2 Ratoeh Jaroeh', 'Prestasi', 'Tim RAVEN SMA Negeri 11 Bekasi atas prestasinya meraih Juara 2 Lomba Ratoh Jaroe dalam ajang Fussion 14 2025 di SMAN 5 Bekasi! 🏅🌟 Teruslah melestarikan budaya dan menari dengan sepenuh hati 💖 Kami bangga padamu!\\r\\n\\r\\n1. Aurellia Deswita \\r\\n2. Farand', '1760694377.jpeg', '2025-10-17 16:46:17'),
(17, 'BERITA TERKINI!-SMAN 11 Kota Bekasi mengikuti kegiatan Bimbingan Teknis Coding dan Kecerdasan Artifisial', 'Kegiatan', '<p>SMA Negeri 11 Bekasi terus berkomitmen untuk meningkatkan kompetensi guru dan siswa dalam menghadapi era digital. Pada Senin, 14 Juli 2025, sekolah mengikuti kegiatan Bimbingan Teknis Coding dan Kecerdasan Artifisial yang diselenggarakan oleh Disdik Jabar dan Kemendikbudristek. Kegiatan ini bertujuan untuk memperkenalkan dasar-dasar koding dan pemrograman kecerdasan artifisial yang telah menjadi bagian dari kurikulum nasional. Melalui pelatihan ini, diharapkan guru dan peserta didik dapat: 💻 Menguasai dasar pemrograman KA (Kecerdasan Artifisial) 🧠 Mengintegrasikan teknologi AI dalam pembelajaran 🚀 Mempersiapkan generasi muda menghadapi tantangan teknologi masa</p><p><br></p><ol><li data-list=\\\"ordered\\\"><span class=\\\"ql-ui\\\" contenteditable=\\\"false\\\"></span>Bu Eka</li><li data-list=\\\"ordered\\\"><span class=\\\"ql-ui\\\" contenteditable=\\\"false\\\"></span>Bu Ririn</li><li data-list=\\\"ordered\\\"><span class=\\\"ql-ui\\\" contenteditable=\\\"false\\\"></span>Bu Yohati</li><li data-list=\\\"ordered\\\"><span class=\\\"ql-ui\\\" contenteditable=\\\"false\\\"></span>Bu Selly</li><li data-list=\\\"ordered\\\"><span class=\\\"ql-ui\\\" contenteditable=\\\"false\\\"></span>Pak Kamal</li></ol>', '1760694441.jpeg', '2025-10-17 16:47:21'),
(18, 'BERITA TERKINI!-SMAN 11 Kota Bekasi melaksanakan Asesmen Sumatif Tengah Semester pada tanggal 29 September - 3 Oktober 2025.', 'Pengumuman', 'SMAN 11 Bekasi melaksanakan Asesmen Sumatif Tengah Semester Ganjil Tahun Pelajaran 2025/2026 pada hari Senin–Jumat, 29 September–03 Oktober 2025. Semoga seluruh murid dapat mengikuti asesmen dengan penuh semangat, jujur, dan percaya diri untuk meraih hasil terbaik', '1760694501.jpeg', '2025-10-17 16:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `data_sekolah`
--

CREATE TABLE `data_sekolah` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `angka` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_sekolah`
--

INSERT INTO `data_sekolah` (`id`, `icon`, `nama_lengkap`, `angka`) VALUES
(0, '🎓', 'Alumni', '1200'),
(0, '👨‍🏫', 'Tenaga Didik', '45'),
(0, '🏫', 'Ruang Kelas', '24'),
(0, '🏆', 'Prestasi', '200');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama`, `gambar`) VALUES
(4, 'Ruang Podcast', 'IMG-20251017-WA0021.jpg'),
(5, 'Perpustakaan', 'IMG-20251017-WA0025.jpg'),
(6, 'Lab. Komputer', 'IMG-20251017-WA0033.jpg'),
(7, 'Lab. Bahasa', 'lab bahasa(baru).jpg'),
(8, 'Lab. Kimia', 'lab kimia.jpg'),
(9, 'Lapangan', 'Lapangan Dalam.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kelulusan`
--

CREATE TABLE `kelulusan` (
  `id` int(11) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `tahun_masuk` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tanggal_kelulusan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelulusan`
--

INSERT INTO `kelulusan` (`id`, `nisn`, `nama`, `kelas`, `tahun_masuk`, `status`, `tanggal_kelulusan`) VALUES
(1, '2009000001', 'Lukas Prasetyo', 'XI IPS 1 / 2024', 2024, 'Belum Lulus', NULL),
(2, '2009000002', 'Mira Erawan', 'X IPA 3 / 2025', 2025, 'Belum Lulus', NULL),
(3, '2009000003', 'Rani Irawan', 'XI IPA 2 / 2023', 2023, 'Belum Lulus', NULL),
(4, '2009000004', 'Ilham Jalal', 'X IPA 2 / 2025', 2025, 'Belum Lulus', NULL),
(5, '2009000005', 'Rudi Pribadi', 'XI IPA 3 / 2024', 2024, 'Belum Lulus', NULL),
(6, '2009000006', 'Sukma Bayu', 'X IPS 1 / 2023', 2023, 'Belum Lulus', NULL),
(7, '2009000007', 'Maya Setiawan', 'X IPS 1 / 2025', 2025, 'Belum Lulus', NULL),
(8, '2008000001', 'Sigit Setiawan', 'XI IPA 1 / 2022', 2022, 'Lulus', '2022-05-10'),
(9, '2008000002', 'Nanda Purnama', 'X IPS 1 / 2022', 2022, 'Lulus', '2022-05-10'),
(10, '2009000008', 'Dina Sukma', 'X IPS 1 / 2025', 2025, 'Belum Lulus', NULL),
(11, '2009000009', 'Lukas Yuliani', 'XI IPA 1 / 2025', 2025, 'Belum Lulus', NULL),
(12, '2008000003', 'Adi Adri', 'XI IPA 3 / 2025', 2025, 'Belum Lulus', NULL),
(13, '2009000010', 'Joko Saputra', 'XII IPS 1 / 2023', 2023, 'Belum Lulus', NULL),
(14, '2007000001', 'Nadya Cahyadi', 'X IPA 2 / 2022', 2022, 'Lulus', '2022-05-10'),
(15, '2009000011', 'Sukma Kurniawan', 'X IPA 1 / 2023', 2023, 'Belum Lulus', NULL),
(16, '2008000004', 'Irfan Usman', 'XI IPA 3 / 2025', 2025, 'Belum Lulus', NULL),
(17, '2008000005', 'Zainal Lesmana', 'XI IPA 2 / 2025', 2025, 'Belum Lulus', NULL),
(18, '2008000006', 'Arief Sukma', 'XI IPA 3 / 2022', 2022, 'Tidak Lulus', '2022-05-10'),
(19, '2008000007', 'Maya Pratama', 'XI IPA 1 / 2022', 2022, 'Lulus', '2022-05-10'),
(20, '2008000008', 'Widya Nugroho', 'X IPA 3 / 2023', 2023, 'Belum Lulus', NULL),
(21, '2009000012', 'Rani Lestari', 'XI IPA 2 / 2025', 2025, 'Belum Lulus', NULL),
(22, '2008000009', 'Dewi Saputra', 'X IPA 3 / 2022', 2022, 'Tidak Lulus', '2022-05-10'),
(23, '2008000010', 'Niko Saputra', 'X IPS 1 / 2024', 2024, 'Belum Lulus', NULL),
(24, '2008000011', 'Dedi Zulkarnain', 'X IPA 2 / 2023', 2023, 'Belum Lulus', NULL),
(25, '2009000013', 'Yuda Zulkarnain', 'XI IPA 3 / 2022', 2022, 'Lulus', '2022-05-10'),
(26, '2009000014', 'Yuni Ardiansyah', 'X IPA 1 / 2024', 2024, 'Belum Lulus', NULL),
(27, '2008000012', 'Vina Mahendra', 'XI IPS 1 / 2024', 2024, 'Belum Lulus', NULL),
(28, '2009000015', 'Juli Firmansyah', 'XII IPS 1 / 2024', 2024, 'Belum Lulus', NULL),
(29, '2009000016', 'Yusuf Putra', 'XI IPA 3 / 2024', 2024, 'Belum Lulus', NULL),
(30, '2008000013', 'Tito Hidayat', 'XI IPS 1 / 2023', 2023, 'Belum Lulus', NULL),
(31, '2009000017', 'Kiki Gunawan', 'XI IPS 1 / 2022', 2022, 'Lulus', '2022-05-10'),
(32, '2008000014', 'Budi Siregar', 'XI IPA 2 / 2024', 2024, 'Belum Lulus', NULL),
(33, '2008000015', 'Nanda Oktavianto', 'XII IPS 1 / 2024', 2024, 'Belum Lulus', NULL),
(34, '2007000002', 'Mira Mahendra', 'X IPS 1 / 2023', 2023, 'Belum Lulus', NULL),
(35, '2009000018', 'Maya Erawan', 'XI IPS 1 / 2025', 2025, 'Belum Lulus', NULL),
(36, '2009000019', 'Juli Darmawan', 'X IPS 1 / 2023', 2023, 'Belum Lulus', NULL),
(37, '2009000020', 'Zulkifli Kurniawan', 'XI IPS 1 / 2024', 2024, 'Belum Lulus', NULL),
(38, '2009000021', 'Nadia Lestari', 'XI IPA 3 / 2024', 2024, 'Belum Lulus', NULL),
(39, '2009000022', 'Intan Kusuma', 'XI IPA 1 / 2024', 2024, 'Belum Lulus', NULL),
(40, '2008000016', 'Wahyudi Fauzi', 'XI IPA 1 / 2023', 2023, 'Belum Lulus', NULL),
(41, '2008000017', 'Dewi Utomo', 'X IPA 2 / 2024', 2024, 'Belum Lulus', NULL),
(42, '2008000018', 'Dina Purnama', 'XI IPA 2 / 2023', 2023, 'Belum Lulus', NULL),
(43, '2007000003', 'Ahmad Permata', 'X IPA 1 / 2022', 2022, 'Lulus', '2022-05-10'),
(44, '2009000023', 'Putu Wijaya', 'X IPA 2 / 2025', 2025, 'Belum Lulus', NULL),
(45, '2007000004', 'Widya Santoso', 'XI IPS 1 / 2025', 2025, 'Belum Lulus', NULL),
(46, '2008000019', 'Joko Zulkarnain', 'X IPA 2 / 2025', 2025, 'Belum Lulus', NULL),
(47, '2007000005', 'Rizki Darmawan', 'X IPA 3 / 2022', 2022, 'Lulus', '2022-05-10'),
(48, '2008000020', 'Nadia Cahyadi', 'X IPA 2 / 2023', 2023, 'Belum Lulus', NULL),
(49, '2009000024', 'Maya Ramadhan', 'XII IPS 1 / 2023', 2023, 'Belum Lulus', NULL),
(50, '2008000021', 'Niko Ardian', 'XI IPA 2 / 2025', 2025, 'Belum Lulus', NULL),
(51, '2009000025', 'Arief Permata', 'XI IPA 1 / 2022', 2022, 'Lulus', '2022-05-10'),
(52, '2009000026', 'Arga Pratama', 'X IPA 3 / 2022', 2022, 'Lulus', '2022-05-10'),
(53, '2008000022', 'Putu Ramadhan', 'X IPA 1 / 2023', 2023, 'Belum Lulus', NULL),
(54, '2008000023', 'Yudha Setiawan', 'X IPA 1 / 2024', 2024, 'Belum Lulus', NULL),
(55, '2008000024', 'Mega Purnama', 'X IPA 2 / 2025', 2025, 'Belum Lulus', NULL),
(56, '2009000027', 'Gina Adri', 'X IPS 1 / 2023', 2023, 'Belum Lulus', NULL),
(57, '2008000025', 'Siti Jalal', 'XI IPA 2 / 2023', 2023, 'Belum Lulus', NULL),
(58, '2008000026', 'Ilham Usman', 'XI IPA 2 / 2024', 2024, 'Belum Lulus', NULL),
(59, '2009000028', 'Dedi Adri', 'X IPS 1 / 2024', 2024, 'Belum Lulus', NULL),
(60, '2008000027', 'Slamet Oktavianto', 'X IPA 2 / 2025', 2025, 'Belum Lulus', NULL),
(61, '2009000029', 'Rudi Ramadhan', 'XI IPA 2 / 2024', 2024, 'Belum Lulus', NULL),
(62, '2007000006', 'Dwi Lesmana', 'XI IPA 2 / 2022', 2022, 'Lulus', '2022-05-10'),
(63, '2009000030', 'Niko Ramadhan', 'XI IPA 2 / 2025', 2025, 'Belum Lulus', NULL),
(64, '2008000028', 'Rizwan Wicaksono', 'X IPA 2 / 2025', 2025, 'Belum Lulus', NULL),
(65, '2009000031', 'Angga Oktavianto', 'X IPA 2 / 2024', 2024, 'Belum Lulus', NULL),
(66, '2008000029', 'Rizki Utomo', 'XI IPA 2 / 2025', 2025, 'Belum Lulus', NULL),
(67, '2009000032', 'Lutfia Kurniawan', 'X IPA 2 / 2025', 2025, 'Belum Lulus', NULL),
(68, '2008000030', 'Dina Yuliani', 'XII IPS 1 / 2025', 2025, 'Belum Lulus', NULL),
(69, '2007000007', 'Niko Zulkarnain', 'XI IPA 1 / 2022', 2022, 'Lulus', '2022-05-10'),
(70, '2009000033', 'Udin Nugroho', 'XI IPS 1 / 2025', 2025, 'Belum Lulus', NULL),
(71, '2007000008', 'Ilham Putra', 'XI IPA 2 / 2023', 2023, 'Belum Lulus', NULL),
(72, '2009000034', 'Mega Firmansyah', 'X IPA 3 / 2023', 2023, 'Belum Lulus', NULL),
(73, '2008000031', 'Zaki Lesmana', 'X IPA 2 / 2025', 2025, 'Belum Lulus', NULL),
(74, '2008000032', 'Zaki Yuliani', 'XI IPS 1 / 2023', 2023, 'Belum Lulus', NULL),
(75, '2008000033', 'Rudi Hakim', 'XI IPS 1 / 2025', 2025, 'Belum Lulus', NULL),
(76, '2008000034', 'Agus Sukma', 'XI IPA 1 / 2025', 2025, 'Belum Lulus', NULL),
(77, '2009000035', 'Lukas Yuliana', 'X IPS 1 / 2024', 2024, 'Belum Lulus', NULL),
(78, '2008000035', 'Rizwan Saputra', 'XI IPA 2 / 2024', 2024, 'Belum Lulus', NULL),
(79, '2009000036', 'Arif Harahap', 'XII IPS 1 / 2025', 2025, 'Belum Lulus', NULL),
(80, '2009000037', 'Slamet Kusuma', 'XI IPS 1 / 2025', 2025, 'Belum Lulus', NULL),
(81, '2008000036', 'Arga Nugroho', 'XI IPA 1 / 2025', 2025, 'Belum Lulus', NULL),
(82, '2008000037', 'Fina Sukma', 'X IPS 1 / 2025', 2025, 'Belum Lulus', NULL),
(83, '2008000038', 'Putri Firmansyah', 'XII IPS 1 / 2023', 2023, 'Belum Lulus', NULL),
(84, '2009000038', 'Fina Tanjung', 'XII IPS 1 / 2022', 2022, 'Lulus', '2022-05-10'),
(85, '2009000039', 'Dewi Saputra', 'X IPA 2 / 2023', 2023, 'Belum Lulus', NULL),
(86, '2009000040', 'Rudi Bayu', 'X IPA 2 / 2025', 2025, 'Belum Lulus', NULL),
(87, '2008000039', 'Hadi Harahap', 'XII IPS 1 / 2025', 2025, 'Belum Lulus', NULL),
(88, '2007000009', 'Sri Adri', 'XI IPA 1 / 2024', 2024, 'Belum Lulus', NULL),
(89, '2008000040', 'Nur Firmansyah', 'XI IPS 1 / 2022', 2022, 'Lulus', '2022-05-10'),
(90, '2008000041', 'Kiki Harahap', 'X IPA 1 / 2024', 2024, 'Belum Lulus', NULL),
(91, '2008000042', 'Intan Usman', 'XI IPA 1 / 2023', 2023, 'Belum Lulus', NULL),
(92, '2009000041', 'Kiki Pratama', 'X IPA 3 / 2023', 2023, 'Belum Lulus', NULL),
(93, '2008000043', 'Dwi Adri', 'XI IPS 1 / 2023', 2023, 'Belum Lulus', NULL),
(94, '2009000042', 'Yudha Saputra', 'XI IPS 1 / 2024', 2024, 'Belum Lulus', NULL),
(95, '2008000044', 'Eka Rahayu', 'X IPA 2 / 2023', 2023, 'Belum Lulus', NULL),
(96, '2009000043', 'Ayu Jalal', 'XI IPA 2 / 2025', 2025, 'Belum Lulus', NULL),
(97, '2009000044', 'Budi Hidayat', 'X IPA 2 / 2025', 2025, 'Belum Lulus', NULL),
(98, '2008000045', 'Nina Ginting', 'XI IPA 2 / 2024', 2024, 'Belum Lulus', NULL),
(99, '2007000010', 'Ilham Gunawan', 'XI IPS 1 / 2022', 2022, 'Lulus', '2022-05-10'),
(100, '2008000046', 'Arga Adri', 'XI IPA 1 / 2023', 2023, 'Belum Lulus', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `kategori` enum('Akademik','Non-akademik','Prestasi Sekolah') NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id`, `kategori`, `jumlah`) VALUES
(1, 'Akademik', 165),
(2, 'Non-akademik', 220),
(3, 'Prestasi Sekolah', 70);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nisn` varchar(20) NOT NULL,
  `alamat` text DEFAULT NULL,
  `tahun_masuk` int(11) DEFAULT NULL,
  `kelas_angkatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `nisn`, `alamat`, `tahun_masuk`, `kelas_angkatan`) VALUES
(1, 'Lukas Prasetyo', 'Bekasi', '2009-02-02', '2009000001', 'Jl. Mangga No. 153, Bekasi', 2024, 'XI IPS 1 / 2024'),
(2, 'Mira Erawan', 'Bekasi', '2009-07-04', '2009000002', 'Gg. Melati No. 141, Bekasi', 2025, 'X IPA 3 / 2025'),
(3, 'Rani Irawan', 'Tangerang', '2009-02-13', '2009000003', 'Komplek Harapan No. 193, Tangerang', 2023, 'XI IPA 2 / 2023'),
(4, 'Ilham Jalal', 'Tangerang', '2009-04-01', '2009000004', 'Jl. Raya No. 71, Tangerang', 2025, 'X IPA 2 / 2025'),
(5, 'Rudi Pribadi', 'Depok', '2009-10-15', '2009000005', 'Jl. Raya No. 70, Depok', 2024, 'XI IPA 3 / 2024'),
(6, 'Sukma Bayu', 'Jakarta', '2009-04-21', '2009000006', 'Jl. Kebon Jeruk No. 39, Jakarta', 2023, 'X IPS 1 / 2023'),
(7, 'Maya Setiawan', 'Bogor', '2009-09-25', '2009000007', 'Jl. Raya No. 17, Bogor', 2025, 'X IPS 1 / 2025'),
(8, 'Sigit Setiawan', 'Bekasi', '2008-09-18', '2008000001', 'Perum Bukit No. 107, Bekasi', 2022, 'XI IPA 1 / 2022'),
(9, 'Nanda Purnama', 'Tangerang', '2008-12-19', '2008000002', 'Jl. Cendana No. 179, Tangerang', 2022, 'X IPS 1 / 2022'),
(10, 'Dina Sukma', 'Jakarta', '2009-02-15', '2009000008', 'Perumahan Indah No. 77, Jakarta', 2025, 'X IPS 1 / 2025'),
(11, 'Lukas Yuliani', 'Bekasi', '2009-04-19', '2009000009', 'Jl. Cendana No. 57, Bekasi', 2025, 'XI IPA 1 / 2025'),
(12, 'Adi Adri', 'Tangerang', '2008-07-21', '2008000003', 'Perum Bukit No. 8, Tangerang', 2025, 'XI IPA 3 / 2025'),
(13, 'Joko Saputra', 'Tangerang', '2009-08-30', '2009000010', 'Jl. Kebon Jeruk No. 120, Tangerang', 2023, 'XII IPS 1 / 2023'),
(14, 'Nadya Cahyadi', 'Tangerang', '2007-11-12', '2007000001', 'Jl. Cendana No. 145, Tangerang', 2022, 'X IPA 2 / 2022'),
(15, 'Sukma Kurniawan', 'Tangerang', '2009-08-04', '2009000011', 'Jl. Kebon Jeruk No. 119, Tangerang', 2023, 'X IPA 1 / 2023'),
(16, 'Irfan Usman', 'Tangerang', '2008-07-08', '2008000004', 'Perumahan Indah No. 55, Tangerang', 2025, 'XI IPA 3 / 2025'),
(17, 'Zainal Lesmana', 'Tangerang', '2008-09-25', '2008000005', 'Komplek Harapan No. 193, Tangerang', 2025, 'XI IPA 2 / 2025'),
(18, 'Arief Sukma', 'Tangerang', '2008-01-07', '2008000006', 'Jl. Merdeka No. 192, Tangerang', 2022, 'XI IPA 3 / 2022'),
(19, 'Maya Pratama', 'Jakarta', '2008-06-01', '2008000007', 'Jl. Merdeka No. 194, Jakarta', 2022, 'XI IPA 1 / 2022'),
(20, 'Widya Nugroho', 'Jakarta', '2008-05-07', '2008000008', 'Jl. Cendana No. 40, Jakarta', 2023, 'X IPA 3 / 2023'),
(21, 'Rani Lestari', 'Jakarta', '2009-02-11', '2009000012', 'Jl. Cendana No. 56, Jakarta', 2025, 'XI IPA 2 / 2025'),
(22, 'Dewi Saputra', 'Bogor', '2008-10-27', '2008000009', 'Jl. Cendana No. 156, Bogor', 2022, 'X IPA 3 / 2022'),
(23, 'Niko Saputra', 'Jakarta', '2008-08-29', '2008000010', 'Jl. Cendana No. 7, Jakarta', 2024, 'X IPS 1 / 2024'),
(24, 'Dedi Zulkarnain', 'Bogor', '2008-11-25', '2008000011', 'Jl. Sudirman No. 152, Bogor', 2023, 'X IPA 2 / 2023'),
(25, 'Yuda Zulkarnain', 'Depok', '2009-09-28', '2009000013', 'Jl. Cendana No. 31, Depok', 2022, 'XI IPA 3 / 2022'),
(26, 'Yuni Ardiansyah', 'Tangerang', '2009-04-13', '2009000014', 'Perumahan Indah No. 18, Tangerang', 2024, 'X IPA 1 / 2024'),
(27, 'Vina Mahendra', 'Tangerang', '2008-12-19', '2008000012', 'Jl. Sudirman No. 111, Tangerang', 2024, 'XI IPS 1 / 2024'),
(28, 'Juli Firmansyah', 'Bogor', '2009-10-09', '2009000015', 'Gg. Melati No. 46, Bogor', 2024, 'XII IPS 1 / 2024'),
(29, 'Yusuf Putra', 'Tangerang', '2009-02-22', '2009000016', 'Gg. Melati No. 188, Tangerang', 2024, 'XI IPA 3 / 2024'),
(30, 'Tito Hidayat', 'Jakarta', '2008-06-23', '2008000013', 'Komplek Harapan No. 116, Jakarta', 2023, 'XI IPS 1 / 2023'),
(31, 'Kiki Gunawan', 'Bekasi', '2009-05-21', '2009000017', 'Gg. Melati No. 87, Bekasi', 2022, 'XI IPS 1 / 2022'),
(32, 'Budi Siregar', 'Bogor', '2008-09-12', '2008000014', 'Perum Bukit No. 55, Bogor', 2024, 'XI IPA 2 / 2024'),
(33, 'Nanda Oktavianto', 'Depok', '2008-09-28', '2008000015', 'Jl. Cendana No. 180, Depok', 2024, 'XII IPS 1 / 2024'),
(34, 'Mira Mahendra', 'Bekasi', '2007-10-26', '2007000002', 'Jl. Raya No. 22, Bekasi', 2023, 'X IPS 1 / 2023'),
(35, 'Maya Erawan', 'Bekasi', '2009-02-27', '2009000018', 'Jl. Raya No. 177, Bekasi', 2025, 'XI IPS 1 / 2025'),
(36, 'Juli Darmawan', 'Jakarta', '2009-01-16', '2009000019', 'Jl. Sudirman No. 76, Jakarta', 2023, 'X IPS 1 / 2023'),
(37, 'Zulkifli Kurniawan', 'Bogor', '2009-09-23', '2009000020', 'Komplek Harapan No. 170, Bogor', 2024, 'XI IPS 1 / 2024'),
(38, 'Nadia Lestari', 'Bekasi', '2009-05-04', '2009000021', 'Perumahan Indah No. 109, Bekasi', 2024, 'XI IPA 3 / 2024'),
(39, 'Intan Kusuma', 'Tangerang', '2009-10-04', '2009000022', 'Komplek Harapan No. 79, Tangerang', 2024, 'XI IPA 1 / 2024'),
(40, 'Wahyudi Fauzi', 'Bogor', '2008-02-16', '2008000016', 'Perumahan Indah No. 31, Bogor', 2023, 'XI IPA 1 / 2023'),
(41, 'Dewi Utomo', 'Tangerang', '2008-05-24', '2008000017', 'Komplek Harapan No. 186, Tangerang', 2024, 'X IPA 2 / 2024'),
(42, 'Dina Purnama', 'Depok', '2008-05-01', '2008000018', 'Jl. Raya No. 93, Depok', 2023, 'XI IPA 2 / 2023'),
(43, 'Ahmad Permata', 'Bekasi', '2007-10-30', '2007000003', 'Jl. Kebon Jeruk No. 71, Bekasi', 2022, 'X IPA 1 / 2022'),
(44, 'Putu Wijaya', 'Depok', '2009-05-04', '2009000023', 'Jl. Kebon Jeruk No. 164, Depok', 2025, 'X IPA 2 / 2025'),
(45, 'Widya Santoso', 'Bekasi', '2007-10-28', '2007000004', 'Komplek Harapan No. 121, Bekasi', 2025, 'XI IPS 1 / 2025'),
(46, 'Joko Zulkarnain', 'Bogor', '2008-09-28', '2008000019', 'Jl. Merdeka No. 65, Bogor', 2025, 'X IPA 2 / 2025'),
(47, 'Rizki Darmawan', 'Tangerang', '2007-12-21', '2007000005', 'Perum Bukit No. 19, Tangerang', 2022, 'X IPA 3 / 2022'),
(48, 'Nadia Cahyadi', 'Bekasi', '2008-03-16', '2008000020', 'Komplek Harapan No. 22, Bekasi', 2023, 'X IPA 2 / 2023'),
(49, 'Maya Ramadhan', 'Tangerang', '2009-05-09', '2009000024', 'Jl. Cendana No. 153, Tangerang', 2023, 'XII IPS 1 / 2023'),
(50, 'Niko Ardian', 'Tangerang', '2008-11-08', '2008000021', 'Perum Bukit No. 77, Tangerang', 2025, 'XI IPA 2 / 2025'),
(51, 'Arief Permata', 'Bekasi', '2009-05-20', '2009000025', 'Jl. Merdeka No. 157, Bekasi', 2022, 'XI IPA 1 / 2022'),
(52, 'Arga Pratama', 'Bogor', '2009-07-17', '2009000026', 'Komplek Harapan No. 170, Bogor', 2022, 'X IPA 3 / 2022'),
(53, 'Putu Ramadhan', 'Bogor', '2008-06-17', '2008000022', 'Jl. Mangga No. 20, Bogor', 2023, 'X IPA 1 / 2023'),
(54, 'Yudha Setiawan', 'Tangerang', '2008-12-07', '2008000023', 'Jl. Cendana No. 121, Tangerang', 2024, 'X IPA 1 / 2024'),
(55, 'Mega Purnama', 'Depok', '2008-06-09', '2008000024', 'Komplek Harapan No. 180, Depok', 2025, 'X IPA 2 / 2025'),
(56, 'Gina Adri', 'Bogor', '2009-09-18', '2009000027', 'Komplek Harapan No. 161, Bogor', 2023, 'X IPS 1 / 2023'),
(57, 'Siti Jalal', 'Bekasi', '2008-02-10', '2008000025', 'Jl. Raya No. 166, Bekasi', 2023, 'XI IPA 2 / 2023'),
(58, 'Ilham Usman', 'Jakarta', '2008-03-09', '2008000026', 'Jl. Merdeka No. 43, Jakarta', 2024, 'XI IPA 2 / 2024'),
(59, 'Dedi Adri', 'Jakarta', '2009-01-07', '2009000028', 'Perum Bukit No. 177, Jakarta', 2024, 'X IPS 1 / 2024'),
(60, 'Slamet Oktavianto', 'Bekasi', '2008-07-20', '2008000027', 'Jl. Mangga No. 127, Bekasi', 2025, 'X IPA 2 / 2025'),
(61, 'Rudi Ramadhan', 'Jakarta', '2009-06-19', '2009000029', 'Gg. Melati No. 189, Jakarta', 2024, 'XI IPA 2 / 2024'),
(62, 'Dwi Lesmana', 'Jakarta', '2007-11-11', '2007000006', 'Jl. Raya No. 173, Jakarta', 2022, 'XI IPA 2 / 2022'),
(63, 'Niko Ramadhan', 'Jakarta', '2009-05-28', '2009000030', 'Jl. Kebon Jeruk No. 121, Jakarta', 2025, 'XI IPA 2 / 2025'),
(64, 'Rizwan Wicaksono', 'Bekasi', '2008-04-18', '2008000028', 'Gg. Melati No. 163, Bekasi', 2025, 'X IPA 2 / 2025'),
(65, 'Angga Oktavianto', 'Depok', '2009-02-08', '2009000031', 'Gg. Melati No. 86, Depok', 2024, 'X IPA 2 / 2024'),
(66, 'Rizki Utomo', 'Depok', '2008-03-28', '2008000029', 'Gg. Melati No. 178, Depok', 2025, 'XI IPA 2 / 2025'),
(67, 'Lutfia Kurniawan', 'Tangerang', '2009-08-24', '2009000032', 'Jl. Mangga No. 10, Tangerang', 2025, 'X IPA 2 / 2025'),
(68, 'Dina Yuliani', 'Depok', '2008-09-02', '2008000030', 'Perumahan Indah No. 30, Depok', 2025, 'XII IPS 1 / 2025'),
(69, 'Niko Zulkarnain', 'Bekasi', '2007-10-17', '2007000007', 'Perum Bukit No. 106, Bekasi', 2022, 'XI IPA 1 / 2022'),
(70, 'Udin Nugroho', 'Depok', '2009-03-29', '2009000033', 'Jl. Cendana No. 194, Depok', 2025, 'XI IPS 1 / 2025'),
(71, 'Ilham Putra', 'Bogor', '2007-12-07', '2007000008', 'Komplek Harapan No. 141, Bogor', 2023, 'XI IPA 2 / 2023'),
(72, 'Mega Firmansyah', 'Tangerang', '2009-01-06', '2009000034', 'Jl. Sudirman No. 8, Tangerang', 2023, 'X IPA 3 / 2023'),
(73, 'Zaki Lesmana', 'Bekasi', '2008-08-29', '2008000031', 'Jl. Merdeka No. 142, Bekasi', 2025, 'X IPA 2 / 2025'),
(74, 'Zaki Yuliani', 'Jakarta', '2008-06-02', '2008000032', 'Perum Bukit No. 31, Jakarta', 2023, 'XI IPS 1 / 2023'),
(75, 'Rudi Hakim', 'Bekasi', '2008-08-09', '2008000033', 'Komplek Harapan No. 107, Bekasi', 2025, 'XI IPS 1 / 2025'),
(76, 'Agus Sukma', 'Tangerang', '2008-06-21', '2008000034', 'Jl. Mangga No. 38, Tangerang', 2025, 'XI IPA 1 / 2025'),
(77, 'Lukas Yuliana', 'Bekasi', '2009-06-20', '2009000035', 'Jl. Kebon Jeruk No. 18, Bekasi', 2024, 'X IPS 1 / 2024'),
(78, 'Rizwan Saputra', 'Bekasi', '2008-09-28', '2008000035', 'Komplek Harapan No. 1, Bekasi', 2024, 'XI IPA 2 / 2024'),
(79, 'Arif Harahap', 'Bekasi', '2009-06-08', '2009000036', 'Perum Bukit No. 39, Bekasi', 2025, 'XII IPS 1 / 2025'),
(80, 'Slamet Kusuma', 'Depok', '2009-02-22', '2009000037', 'Perumahan Indah No. 142, Depok', 2025, 'XI IPS 1 / 2025'),
(81, 'Arga Nugroho', 'Bogor', '2008-09-09', '2008000036', 'Jl. Raya No. 147, Bogor', 2025, 'XI IPA 1 / 2025'),
(82, 'Fina Sukma', 'Jakarta', '2008-12-09', '2008000037', 'Perumahan Indah No. 191, Jakarta', 2025, 'X IPS 1 / 2025'),
(83, 'Putri Firmansyah', 'Bogor', '2008-11-14', '2008000038', 'Perum Bukit No. 10, Bogor', 2023, 'XII IPS 1 / 2023'),
(84, 'Fina Tanjung', 'Depok', '2009-06-11', '2009000038', 'Jl. Sudirman No. 113, Depok', 2022, 'XII IPS 1 / 2022'),
(85, 'Dewi Saputra', 'Jakarta', '2009-01-25', '2009000039', 'Jl. Kebon Jeruk No. 105, Jakarta', 2023, 'X IPA 2 / 2023'),
(86, 'Rudi Bayu', 'Depok', '2009-02-07', '2009000040', 'Perumahan Indah No. 160, Depok', 2025, 'X IPA 2 / 2025'),
(87, 'Hadi Harahap', 'Bekasi', '2008-09-16', '2008000039', 'Gg. Melati No. 82, Bekasi', 2025, 'XII IPS 1 / 2025'),
(88, 'Sri Adri', 'Bekasi', '2007-11-21', '2007000009', 'Jl. Sudirman No. 61, Bekasi', 2024, 'XI IPA 1 / 2024'),
(89, 'Nur Firmansyah', 'Tangerang', '2008-01-16', '2008000040', 'Jl. Sudirman No. 195, Tangerang', 2022, 'XI IPS 1 / 2022'),
(90, 'Kiki Harahap', 'Depok', '2008-04-03', '2008000041', 'Jl. Merdeka No. 12, Depok', 2024, 'X IPA 1 / 2024'),
(91, 'Intan Usman', 'Depok', '2008-08-11', '2008000042', 'Perumahan Indah No. 111, Depok', 2023, 'XI IPA 1 / 2023'),
(92, 'Kiki Pratama', 'Tangerang', '2009-04-11', '2009000041', 'Jl. Cendana No. 175, Tangerang', 2023, 'X IPA 3 / 2023'),
(93, 'Dwi Adri', 'Jakarta', '2008-04-12', '2008000043', 'Jl. Cendana No. 98, Jakarta', 2023, 'XI IPS 1 / 2023'),
(94, 'Yudha Saputra', 'Bogor', '2009-06-04', '2009000042', 'Jl. Raya No. 119, Bogor', 2024, 'XI IPS 1 / 2024'),
(95, 'Eka Rahayu', 'Jakarta', '2008-07-03', '2008000044', 'Perum Bukit No. 74, Jakarta', 2023, 'X IPA 2 / 2023'),
(96, 'Ayu Jalal', 'Depok', '2009-01-10', '2009000043', 'Jl. Cendana No. 77, Depok', 2025, 'XI IPA 2 / 2025'),
(97, 'Budi Hidayat', 'Depok', '2009-01-25', '2009000044', 'Jl. Raya No. 99, Depok', 2025, 'X IPA 2 / 2025'),
(98, 'Nina Ginting', 'Tangerang', '2008-06-14', '2008000045', 'Jl. Cendana No. 92, Tangerang', 2024, 'XI IPA 2 / 2024'),
(99, 'Ilham Gunawan', 'Tangerang', '2007-11-07', '2007000010', 'Komplek Harapan No. 3, Tangerang', 2022, 'XI IPS 1 / 2022'),
(100, 'Arga Adri', 'Bogor', '2008-08-04', '2008000046', 'Jl. Cendana No. 91, Bogor', 2023, 'XI IPA 1 / 2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelulusan`
--
ALTER TABLE `kelulusan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `aspirasi`
--
ALTER TABLE `aspirasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kelulusan`
--
ALTER TABLE `kelulusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
