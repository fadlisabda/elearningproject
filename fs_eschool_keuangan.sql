-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 02:43 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fs_eschool_keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `akreditas_jawaban`
--

CREATE TABLE `akreditas_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akreditas_jawaban`
--

INSERT INTO `akreditas_jawaban` (`id_jawaban`, `id_soal`, `jawaban`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '91%-100% guru mengembangkan perangkat pembelajaran\r\nsesuai tingkat kompetensi sikap spiritual ', NULL, NULL, NULL),
(2, 1, '91%-100% guru mengembangkan perangkat pembelajaran\r\nsesuai tingkat kompetensi sikap spiritual ', NULL, NULL, NULL),
(3, 1, '71%-80% guru mengembangkan perangkat pembelajaran\r\nsesuai tingkat kompetensi sikap spiritual', NULL, NULL, NULL),
(4, 1, '61%-70% guru mengembangkan perangksesuai tingkat kompetensi sikap spiritual ', NULL, NULL, NULL),
(5, 1, 'Kurang dari 61% guru mengembangkan perangkat\r\npembelajaran sesuai tingkat kompetensi sikap spiritual', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `akreditas_soal`
--

CREATE TABLE `akreditas_soal` (
  `id_soal` int(11) NOT NULL,
  `id_standar` int(11) NOT NULL,
  `soal` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akreditas_soal`
--

INSERT INTO `akreditas_soal` (`id_soal`, `id_standar`, `soal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Guru mengembangkan perangkat pembelajaran pada kompetensi\r\nsikap spiritual siswa sesuai dengan tingkat kompetensi', NULL, NULL, NULL),
(2, 1, 'Guru mengembangkan perangkat pembelajaran pada kompetensi sikap \r\nsosial siswa sesuai dengan tingkat kompetensi. ', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `akreditas_standar`
--

CREATE TABLE `akreditas_standar` (
  `id_standar` int(11) NOT NULL,
  `nama_standar` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akreditas_standar`
--

INSERT INTO `akreditas_standar` (`id_standar`, `nama_standar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Standar Isi', NULL, NULL, NULL),
(2, 'Standar Proses', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_guru`
--

CREATE TABLE `data_guru` (
  `id_guru` int(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama_guru` longtext NOT NULL,
  `tempat_lahir` longtext NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` longtext NOT NULL,
  `foto_guru` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_guru`
--

INSERT INTO `data_guru` (`id_guru`, `nip`, `nama_guru`, `tempat_lahir`, `tgl_lahir`, `no_telp`, `alamat`, `foto_guru`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '882947749', 'ali budimansyah', 'jakarta', '1968-02-11', '086338393947', 'jl sudirman', 'GVT_1619 edit biru.jpg', NULL, NULL, NULL),
(2, '5793989802', 'Thomas Alfa Edison', 'pekanbaru', '1978-09-27', '0876488398', 'perawang barat', 'GVT_5247.jpg', NULL, NULL, NULL),
(3, '2234555', 'Arini Fitria', 'pekanbaru', NULL, '08848466589', 'jl umban sari', '', NULL, NULL, NULL),
(4, '12345346575', 'yuni hastuti', 'padang', NULL, '0823456786', 'pandau permai', 'GVT_5303.jpg', NULL, NULL, NULL),
(5, '8840402728', 'ahmad dahlan', 'padang ', '1967-10-10', '882734778990', 'jl siak', 'GVT_5292.jpg', NULL, NULL, NULL),
(132, '1234455', 'willy', 'pekanbaru', '1996-03-11', '08232143553', 'pandau', 'karyawan.jpg', NULL, NULL, NULL),
(184, '5464654654', 'rterterteyeyey', 'tyrytrytrytrytry', '2021-11-03', '7657657576', 'uytiutiutyityiuty', '1635932319_8457d02fa6d0f3ec0ef2.jpg', '2021-11-03 04:38:39', '2021-11-03 05:27:09', '2021-11-03 05:27:09'),
(185, '17236127', 'uweiyruqewoyroqweuryqweqweqweqweqweqweuweiyruqewoyroqweuryqweqweqweqweqweqweuweiyruqewoyroqweuryqwequweiyruqewoyroqweuryqweqweqweqweqweqweuweiyruqewoyroqweuryqweqweqweqweqweqweuweiyruqewoyroqweuryqweq', 'uweiyruqewoyroqweuryqweqweqweqweqweqweuweiyruqewoyroqweuryqweqweqweqweqweqweuweiyruqewoyroqweuryqwequweiyruqewoyroqweuryqweqweqweqweqweqweuweiyruqewoyroqweuryqweqweqweqweqweqweuweiyruqewoyroqweuryqweq', '2021-11-07', '789124017304', 'uweiyruqewoyroqweuryqweqweqweqweqweqweuweiyruqewoyroqweuryqweqweqweqweqweqweuweiyruqewoyroqweuryqwequweiyruqewoyroqweuryqweqweqweqweqweqweuweiyruqewoyroqweuryqweqweqweqweqweqweuweiyruqewoyroqweuryqweq', 'default.jpg', '2021-11-07 01:50:22', '2021-11-07 02:00:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_mata_pelajaran`
--

CREATE TABLE `data_mata_pelajaran` (
  `id_mapel` int(100) NOT NULL,
  `nama_mapel` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_mata_pelajaran`
--

INSERT INTO `data_mata_pelajaran` (`id_mapel`, `nama_mapel`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'matematika', NULL, NULL, NULL),
(2, 'Biologi', NULL, NULL, NULL),
(3, 'Fisika', NULL, NULL, NULL),
(4, 'Kimia', NULL, NULL, NULL),
(5, 'Bahasa Indonesia', NULL, NULL, NULL),
(6, 'Bahasa Inggris', NULL, NULL, NULL),
(7, 'Bahasa Mandarin', NULL, NULL, NULL),
(8, 'Sejarah', NULL, NULL, NULL),
(9, 'Geografi', NULL, NULL, NULL),
(10, 'Pendidikan Olahraga', NULL, NULL, NULL),
(11, 'Kewarganegaraan', NULL, NULL, NULL),
(12, 'sosiologi', NULL, NULL, NULL),
(13, 'Akuntansi', NULL, NULL, NULL),
(14, 'Ilmu Komputer dan TI', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `el_detail_mapel`
--

CREATE TABLE `el_detail_mapel` (
  `id_detailmapel` int(11) NOT NULL,
  `namamapel` varchar(255) NOT NULL,
  `namakelas` varchar(255) NOT NULL,
  `namaguru` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` longtext DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `tenggat` datetime DEFAULT NULL,
  `tipe` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `el_detail_mapel`
--

INSERT INTO `el_detail_mapel` (`id_detailmapel`, `namamapel`, `namakelas`, `namaguru`, `username`, `judul`, `keterangan`, `file`, `link`, `tenggat`, `tipe`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kimia', 'I A', 'Arini Fitria', '2234555', 'tes', '', NULL, NULL, '0000-00-00 00:00:00', 'materi', 'guru', '2021-10-25 06:03:53', '2021-10-25 06:04:21', '2021-10-25 06:04:21'),
(2, 'Kimia', 'I A', 'Arini Fitria', '2234555', 'tes', '', NULL, NULL, '0000-00-00 00:00:00', 'materi', 'guru', '2021-10-25 07:20:51', '2021-10-25 07:24:59', '2021-10-25 07:24:59'),
(3, 'Kimia', 'I A', 'Arini Fitria', '2234555', 'tes', '', NULL, NULL, '0000-00-00 00:00:00', 'materi', 'guru', '2021-10-25 07:25:25', '2021-10-25 07:35:58', '2021-10-25 07:35:58'),
(4, 'Kimia', 'I A', 'willy', '1234455', 'qweqwe', '<p>qwe</p>\r\n', '20190618_085053.jpg', '', '0000-00-00 00:00:00', 'materi', 'guru', '2021-11-06 00:37:40', '2021-11-06 01:06:52', '2021-11-06 01:06:52'),
(5, 'Kimia', 'I A', 'willy', '1234455', 'qwe', NULL, '', NULL, '2021-11-18 16:36:00', 'tugas', 'guru', '2021-11-18 03:34:34', '2021-11-18 03:37:28', '2021-11-18 03:37:28'),
(6, 'Kimia', 'I A', 'willy', '1234455', 'tes', NULL, '', NULL, '2021-11-29 20:35:00', 'materi', 'guru', '2021-11-29 03:40:50', '2021-11-29 07:34:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `el_komentar`
--

CREATE TABLE `el_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_detailmapel` varchar(255) NOT NULL,
  `namamapel` varchar(255) NOT NULL,
  `namakelas` varchar(255) NOT NULL,
  `namaguru` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `komentar` longtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `el_tugas_siswa`
--

CREATE TABLE `el_tugas_siswa` (
  `id_tugassiswa` int(11) NOT NULL,
  `id_detailmapel` varchar(255) NOT NULL,
  `namamapel` varchar(255) NOT NULL,
  `namakelas` varchar(255) NOT NULL,
  `namaguru` varchar(255) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `filetugas` varchar(255) DEFAULT NULL,
  `linktugas` varchar(255) DEFAULT NULL,
  `dikirim` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `el_tugas_siswa`
--

INSERT INTO `el_tugas_siswa` (`id_tugassiswa`, `id_detailmapel`, `namamapel`, `namakelas`, `namaguru`, `nis`, `filetugas`, `linktugas`, `dikirim`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '5', 'Kimia', 'I A', 'willy', '3129164448', NULL, 'tes', NULL, '2021-11-18 03:35:16', '2021-11-18 03:36:57', '2021-11-18 03:36:57'),
(2, '6', 'Kimia', 'I A', 'willy', '3115864953', NULL, 'tes', '2021-11-29 20:24:05pm', '2021-11-29 07:24:11', '2021-11-29 07:34:31', '2021-11-29 07:34:31'),
(3, '6', 'Kimia', 'I A', 'willy', '3115864953', NULL, 'tes', '2021-11-29 20:34:35pm', '2021-11-29 07:34:43', '2021-11-29 07:34:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `el_user`
--

CREATE TABLE `el_user` (
  `id_eluser` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `el_user`
--

INSERT INTO `el_user` (`id_eluser`, `username`, `password`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, '123', '$2y$10$Zd2Gnpg4kYo7ZnIIAKESAeu/q/Zzld4xoVe/KRtxxvIhxBlwBCgdi', 'admin', NULL, '2021-10-17 06:33:32', NULL),
(13, '1234455', '$2y$10$SprYigxHnvqBGMQY.wTCXuQXjMD2D/GqEoKbXEh0xdgVo4NJ9A7u.', 'guru', NULL, NULL, NULL),
(14, '3129164448', '$2y$10$RdopDwB28Q7.kXU9eqTNVOzjQ7ojzFfRFJF/XdhmwgT9EQ5v6FUiC', 'siswa', NULL, NULL, NULL),
(23, '2234555', '$2y$10$keShSBxpFw7hrkWK.U6nbenci6A/TOenrG9v3cFSqU52a98ZtO0Su', 'guru', NULL, NULL, NULL),
(26, '3115864953', '$2y$10$7iZhscBuws4VGOAiJJ7SnejMRfm0ACkXx6gYN1PQl0cbHpr.2bE5C', 'siswa', '2021-10-04 09:20:39', '2021-10-04 09:20:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `jenis_kategori` enum('Masuk','Keluar') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `jenis_kategori`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Uang Pangkal', 'Masuk', '2021-02-17 02:59:23', '2021-02-17 03:16:28', '0000-00-00 00:00:00'),
(2, 'Seragam', 'Masuk', '2021-02-17 03:00:00', '2021-02-17 03:00:00', '0000-00-00 00:00:00'),
(3, 'SPP Grade 1', 'Masuk', '2021-02-17 03:06:27', '2021-02-24 04:38:59', '0000-00-00 00:00:00'),
(4, 'KGT NAMA KEGIATAN', 'Masuk', '2021-02-17 03:15:34', '2021-02-17 03:16:05', '2021-02-17 03:16:05'),
(5, 'Uang Pembangunan', 'Masuk', '2021-02-24 04:36:59', '2021-02-24 04:36:59', '0000-00-00 00:00:00'),
(6, 'SPP Grade 2', 'Masuk', '2021-02-24 04:39:15', '2021-02-24 04:39:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(100) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `nip`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'I A', '12345346575', '2021-02-24 04:48:09', '2021-10-11 07:36:58', NULL),
(2, 'I B', '8840402728', '2021-03-02 00:33:39', '2021-03-02 00:33:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_jam_pelajaran`
--

CREATE TABLE `kelas_jam_pelajaran` (
  `id_jadwal` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_jam_pelajaran`
--

INSERT INTO `kelas_jam_pelajaran` (`id_jadwal`, `id_mapel`, `id_kelas`, `hari`, `jam`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 4, 2, 'senin', '07.00 wib', NULL, NULL, NULL),
(13, 5, 2, 'senin', '09.00 wib', NULL, NULL, NULL),
(14, 9, 2, 'senin', '11.00 wib', NULL, NULL, NULL),
(16, 5, 1, 'senin', '07.00 wib', NULL, NULL, NULL),
(17, 4, 1, 'senin', '08.00 wib', NULL, NULL, NULL),
(18, 4, 1, 'senin', '10.00 wib', NULL, NULL, NULL),
(19, 14, 1, 'Senin', '10.00 Wib', NULL, NULL, NULL),
(20, 9, 1, 'senin', '12.00 wib', NULL, NULL, NULL),
(21, 7, 1, 'senin', '13.00 wib', NULL, NULL, NULL),
(22, 7, 1, 'senin', '13.00 wib', NULL, NULL, NULL),
(23, 7, 1, 'senin', '13.00 wib', NULL, NULL, NULL),
(24, 7, 1, 'senin', '13.00 wib', NULL, NULL, NULL),
(25, 7, 1, 'senin', '13.00 wib', NULL, NULL, NULL),
(26, 12, 1, 'senin', '14.00 wib', NULL, NULL, NULL),
(27, 6, 1, 'senin', '15.00 wib', NULL, NULL, NULL),
(28, 2, 7, 'Senin', '07.00 wib', NULL, NULL, NULL),
(29, 4, 7, 'senin', '08.00 wib', NULL, NULL, NULL),
(30, 4, 7, 'senin', '08.00 wib', NULL, NULL, NULL),
(31, 10, 7, 'senin', '10.00 wib', NULL, NULL, NULL),
(32, 9, 1, 'senin', '14.00 wib', NULL, NULL, NULL),
(33, 10, 2, 'selasa', '07.00', NULL, '2021-10-11 07:54:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_mapel`
--

CREATE TABLE `kelas_mapel` (
  `id_kelas_mapel` int(10) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_mapel`
--

INSERT INTO `kelas_mapel` (`id_kelas_mapel`, `id_mapel`, `id_kelas`, `nip`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 0, '2234555', NULL, NULL, NULL),
(4, 1, 0, '2234555', NULL, NULL, NULL),
(6, 3, 0, '12345667', NULL, NULL, NULL),
(8, 7, 0, '1234455', NULL, NULL, NULL),
(9, 7, 0, '1234455', NULL, NULL, NULL),
(11, 4, 1, '1234455', NULL, NULL, NULL),
(12, 2, 2, '1234455', NULL, NULL, NULL),
(15, 10, 4, '1234455', NULL, NULL, NULL),
(16, 4, 1, '2234555', NULL, NULL, NULL),
(17, 8, 4, '5793989802', NULL, NULL, NULL),
(18, 13, 3, '8840402728', NULL, NULL, NULL),
(19, 8, 1, '882947749', NULL, NULL, NULL),
(23, 10, 2, '2234555', NULL, NULL, NULL),
(24, 1, 1, '882947749', NULL, NULL, NULL),
(25, 9, 1, '8840402728', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_kelas_siswa` int(100) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `id_kelas` int(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id_kelas_siswa`, `nis`, `id_kelas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '3115864953', 1, '2021-02-24 05:14:20', '2021-02-24 05:14:20', NULL),
(2, '3129164448', 1, '2021-02-24 05:14:35', '2021-02-24 05:14:35', NULL),
(3, '123', 2, '2021-03-02 00:35:46', '2021-03-02 00:35:46', NULL),
(4, '3129164449', 2, '2021-03-03 04:07:22', '2021-03-03 04:07:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kontrak_kerja`
--

CREATE TABLE `kontrak_kerja` (
  `id_kontrak` int(11) NOT NULL,
  `id_penilai_kontrak` varchar(50) NOT NULL,
  `id_pegawai_kontrak` varchar(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontrak_kerja`
--

INSERT INTO `kontrak_kerja` (`id_kontrak`, `id_penilai_kontrak`, `id_pegawai_kontrak`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'Pegawai 10', 'Pegawai 20', '2021-02-05 01:22:28', '2021-02-05 01:39:27', '0000-00-00 00:00:00'),
(9, 'Pegawai 1', 'Pegawai 20', '2021-02-06 00:33:42', '2021-02-06 00:34:18', '2021-02-06 00:34:18'),
(10, '', '', '2021-02-17 02:58:33', '2021-02-17 02:58:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lhk`
--

CREATE TABLE `lhk` (
  `id_lhk` int(11) NOT NULL,
  `id_siswa` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lhk`
--

INSERT INTO `lhk` (`id_lhk`, `id_siswa`, `id_kategori`, `keterangan`, `jumlah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '12345', 1, 'Februari', 250000, '2021-02-18 03:33:13', '2021-02-18 03:35:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2021-03-08-083646', 'App\\Database\\Migrations\\Presensi', 'default', 'App', 1615193339, 1),
(3, '2021-03-23-045853', 'App\\Database\\Migrations\\StandarSoal', 'default', 'App', 1616476167, 2),
(4, '2021-03-23-053006', 'App\\Database\\Migrations\\StandarSoal', 'default', 'App', 1616477425, 3);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_smt` int(100) NOT NULL,
  `nama_smt` varchar(10) NOT NULL,
  `id_tahun_ajaran` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_smt`, `nama_smt`, `id_tahun_ajaran`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '20202', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(100) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `nama_siswa` longtext NOT NULL,
  `tempat_lahir` longtext DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telp` varchar(100) DEFAULT NULL,
  `alamat` longtext DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `foto_siswa` longtext DEFAULT NULL,
  `spp` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nisn`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `alamat`, `jenis_kelamin`, `foto_siswa`, `spp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '3115864953', '3115864953', 'ADZKIA QONITA', 'Pekanbaru', '2011-07-25', '081261238121', NULL, NULL, '', 3, '2021-02-24 05:03:59', '2021-10-07 00:12:05', NULL),
(2, '3129164448', '3129164448', 'AISYAH AFIQAH', 'Pekanbaru', '2012-07-16', '081261238121', NULL, NULL, NULL, 1, '2021-02-24 05:07:49', '2021-02-24 05:07:49', NULL),
(3, '123', '12345', 'Budi', 'Pekanbaru', '2000-01-01', '081261238121', NULL, NULL, NULL, 1, '2021-03-02 00:34:46', '2021-03-02 00:34:46', NULL),
(4, '3129164449', '3129164449', 'Ali', 'Pekanbaru', '2000-01-01', '081261238121', NULL, NULL, NULL, 6, '2021-03-03 04:04:30', '2021-03-03 04:05:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_invoice`
--

CREATE TABLE `siswa_invoice` (
  `id_siswa_invoice` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `ket` varchar(50) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa_invoice`
--

INSERT INTO `siswa_invoice` (`id_siswa_invoice`, `nis`, `id_kategori`, `nominal`, `ket`, `bayar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, '3115864953', 5, 10000000, 'Rp.10,000,000', 7950000, NULL, '2021-02-25 01:23:46', '2021-03-24 01:48:26', NULL),
(20, '3129164448', 5, 10000000, 'Rp.10,000,000', 0, NULL, '2021-02-25 01:23:46', '2021-02-25 01:23:46', NULL),
(21, '3115864953', 6, 250000, 'Juli', 250000, 'Lunas', '2021-02-25 02:19:38', '2021-02-25 04:55:47', NULL),
(22, '3129164448', 3, 150000, 'Juli', 0, NULL, '2021-02-25 02:19:38', '2021-02-25 02:19:38', NULL),
(23, '3115864953', 6, 250000, 'Agustus', 250000, 'Lunas', '2021-02-25 02:20:07', '2021-02-25 04:53:41', NULL),
(24, '3129164448', 3, 150000, 'Agustus', 0, NULL, '2021-02-25 02:20:07', '2021-02-25 02:20:07', NULL),
(25, '3115864953', 2, 5000000, 'Rp.5,000,000', 1000000, NULL, '2021-02-25 02:33:18', '2021-03-17 04:27:15', NULL),
(26, '3129164448', 2, 5000000, 'Rp.5,000,000', 0, NULL, '2021-02-25 02:33:18', '2021-02-25 02:33:18', NULL),
(27, '123', 3, 150000, 'Juli', 150000, 'Lunas', '2021-03-02 00:36:20', '2021-03-03 04:06:07', NULL),
(28, '123', 5, 10000000, 'Rp.10,000,000', 5000000, NULL, '2021-03-02 00:42:20', '2021-03-02 00:44:14', NULL),
(29, '123', 2, 5000000, 'Rp.5,000,000', 5000000, NULL, '2021-03-02 00:42:30', '2021-03-02 00:44:37', NULL),
(30, '123', 3, 150000, 'Agustus', 150000, NULL, '2021-03-02 00:43:38', '2021-03-03 04:06:44', NULL),
(31, '123', 3, 150000, 'Juli', 0, NULL, '2021-03-03 04:08:04', '2021-03-03 04:08:04', NULL),
(32, '3129164449', 6, 175000, 'Juli', 175000, NULL, '2021-03-03 04:08:04', '2021-03-03 04:17:05', NULL),
(33, '123', 5, 10000000, 'Rp.10,000,000', 0, NULL, '2021-03-03 04:09:35', '2021-03-03 04:09:35', NULL),
(34, '3129164449', 5, 10000000, 'Rp.10,000,000', 5500000, NULL, '2021-03-03 04:09:35', '2021-03-03 06:04:39', NULL),
(35, '123', 2, 5000000, 'Rp.5,000,000', 0, NULL, '2021-03-03 04:10:08', '2021-03-03 04:10:08', NULL),
(36, '3129164449', 2, 5000000, 'Rp.5,000,000', 1000000, NULL, '2021-03-03 04:10:08', '2021-03-03 04:32:57', NULL),
(37, '123', 3, 150000, 'Agustus', 0, NULL, '2021-03-03 04:15:13', '2021-03-03 04:15:13', NULL),
(38, '3129164449', 6, 175000, 'Agustus', 0, NULL, '2021-03-03 04:15:13', '2021-03-03 04:15:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_invoice_detail`
--

CREATE TABLE `siswa_invoice_detail` (
  `id_siswa_invoice_detail` int(11) NOT NULL,
  `id_siswa_invoice` int(11) NOT NULL,
  `id_siswa_invoice_transaksi` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa_invoice_detail`
--

INSERT INTO `siswa_invoice_detail` (`id_siswa_invoice_detail`, `id_siswa_invoice`, `id_siswa_invoice_transaksi`, `nominal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 19, 1, 1000000, '2021-03-17 04:15:59', '2021-03-17 04:15:59', NULL),
(2, 19, 1, 1000000, '2021-03-17 04:16:23', '2021-03-17 04:16:23', NULL),
(3, 19, 1, 1000000, '2021-03-17 04:16:33', '2021-03-17 04:16:33', NULL),
(4, 19, 1, 1000000, '2021-03-17 04:17:18', '2021-03-17 04:17:18', NULL),
(5, 19, 1, 1000000, '2021-03-17 04:17:46', '2021-03-17 04:17:46', NULL),
(6, 19, 1, 1000000, '2021-03-17 04:18:06', '2021-03-17 04:18:06', NULL),
(7, 19, 1, 500000, '2021-03-17 04:21:36', '2021-03-17 04:21:36', NULL),
(8, 19, 3, 500000, '2021-03-17 04:23:10', '2021-03-17 04:23:10', NULL),
(9, 19, 4, 450000, '2021-03-17 04:26:57', '2021-03-17 04:26:57', NULL),
(10, 25, 4, 1000000, '2021-03-17 04:27:15', '2021-03-17 04:27:15', NULL),
(11, 19, 5, 500000, '2021-03-24 01:48:26', '2021-03-24 01:48:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_invoice_transaksi`
--

CREATE TABLE `siswa_invoice_transaksi` (
  `id_siswa_invoice_transaksi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa_invoice_transaksi`
--

INSERT INTO `siswa_invoice_transaksi` (`id_siswa_invoice_transaksi`, `id_siswa`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2021-03-17 03:59:56', '2021-03-17 03:59:56', NULL),
(2, 1, '2021-03-17 04:00:29', '2021-03-17 04:00:29', NULL),
(3, 1, '2021-03-17 04:06:55', '2021-03-17 04:06:55', NULL),
(4, 1, '2021-03-17 04:26:45', '2021-03-17 04:26:45', NULL),
(5, 1, '2021-03-24 01:47:50', '2021-03-24 01:47:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL,
  `nama_tahun_ajaran` varchar(20) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `nama_tahun_ajaran`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '', NULL, '2021-02-24 04:00:02', '2021-02-24 04:00:38', '2021-02-24 04:00:38'),
(2, '2019/2020', NULL, '2021-02-24 04:00:48', '2021-02-24 04:00:48', NULL),
(3, '2020/2021', NULL, '2021-02-24 04:01:00', '2021-02-24 04:01:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uang_sekolah`
--

CREATE TABLE `uang_sekolah` (
  `id_uang_sekolah` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uang_sekolah`
--

INSERT INTO `uang_sekolah` (`id_uang_sekolah`, `id_kategori`, `id_tahun_ajaran`, `nominal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 2, 150000, '2021-02-24 04:10:38', '2021-02-24 04:41:46', '0000-00-00 00:00:00'),
(2, 5, 2, 10000000, '2021-02-24 04:37:37', '2021-02-24 04:37:37', '0000-00-00 00:00:00'),
(3, 6, 2, 250000, '2021-02-24 04:42:49', '2021-02-24 04:42:49', '0000-00-00 00:00:00'),
(4, 5, 3, 10000000, '2021-02-24 04:43:09', '2021-02-24 04:43:09', '0000-00-00 00:00:00'),
(5, 3, 3, 150000, '2021-02-24 04:43:28', '2021-02-24 04:43:28', '0000-00-00 00:00:00'),
(6, 6, 3, 175000, '2021-02-24 04:43:44', '2021-02-24 04:43:44', '0000-00-00 00:00:00'),
(7, 2, 2, 5000000, '2021-02-25 02:23:20', '2021-02-25 02:23:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password_hash` varchar(191) NOT NULL,
  `level_user` int(11) NOT NULL,
  `status_user` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_user`, `password_hash`, `level_user`, `status_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'qweqwe', 'qweqew', '$2y$10$TkQaryrRH3qkjLWf3SWB2eAVutfS7OYOhQXkhyhncR79L3U6GmQUi', 23123, 1, '2021-11-04 23:43:25', '2021-11-04 23:43:25', NULL),
(2, 'asdsadas', 'asdasdasd', '$2y$10$7ZSiFxtekoQSk2X2fFWs3uJLNJ2BgFiALsNqCYl0Bwo//.60SGkYe', 1, 1, '2021-11-28 22:42:39', '2021-11-28 22:42:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akreditas_jawaban`
--
ALTER TABLE `akreditas_jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `akreditas_soal`
--
ALTER TABLE `akreditas_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `akreditas_standar`
--
ALTER TABLE `akreditas_standar`
  ADD PRIMARY KEY (`id_standar`);

--
-- Indexes for table `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `data_mata_pelajaran`
--
ALTER TABLE `data_mata_pelajaran`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `el_detail_mapel`
--
ALTER TABLE `el_detail_mapel`
  ADD PRIMARY KEY (`id_detailmapel`);

--
-- Indexes for table `el_komentar`
--
ALTER TABLE `el_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `el_tugas_siswa`
--
ALTER TABLE `el_tugas_siswa`
  ADD PRIMARY KEY (`id_tugassiswa`);

--
-- Indexes for table `el_user`
--
ALTER TABLE `el_user`
  ADD PRIMARY KEY (`id_eluser`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_jam_pelajaran`
--
ALTER TABLE `kelas_jam_pelajaran`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kelas_mapel`
--
ALTER TABLE `kelas_mapel`
  ADD PRIMARY KEY (`id_kelas_mapel`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_kelas_siswa`);

--
-- Indexes for table `kontrak_kerja`
--
ALTER TABLE `kontrak_kerja`
  ADD PRIMARY KEY (`id_kontrak`);

--
-- Indexes for table `lhk`
--
ALTER TABLE `lhk`
  ADD PRIMARY KEY (`id_lhk`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_smt`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `siswa_invoice`
--
ALTER TABLE `siswa_invoice`
  ADD PRIMARY KEY (`id_siswa_invoice`);

--
-- Indexes for table `siswa_invoice_detail`
--
ALTER TABLE `siswa_invoice_detail`
  ADD PRIMARY KEY (`id_siswa_invoice_detail`);

--
-- Indexes for table `siswa_invoice_transaksi`
--
ALTER TABLE `siswa_invoice_transaksi`
  ADD PRIMARY KEY (`id_siswa_invoice_transaksi`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indexes for table `uang_sekolah`
--
ALTER TABLE `uang_sekolah`
  ADD PRIMARY KEY (`id_uang_sekolah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akreditas_jawaban`
--
ALTER TABLE `akreditas_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `akreditas_soal`
--
ALTER TABLE `akreditas_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `akreditas_standar`
--
ALTER TABLE `akreditas_standar`
  MODIFY `id_standar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_guru`
--
ALTER TABLE `data_guru`
  MODIFY `id_guru` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `data_mata_pelajaran`
--
ALTER TABLE `data_mata_pelajaran`
  MODIFY `id_mapel` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `el_detail_mapel`
--
ALTER TABLE `el_detail_mapel`
  MODIFY `id_detailmapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `el_komentar`
--
ALTER TABLE `el_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `el_tugas_siswa`
--
ALTER TABLE `el_tugas_siswa`
  MODIFY `id_tugassiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `el_user`
--
ALTER TABLE `el_user`
  MODIFY `id_eluser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kelas_jam_pelajaran`
--
ALTER TABLE `kelas_jam_pelajaran`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `kelas_mapel`
--
ALTER TABLE `kelas_mapel`
  MODIFY `id_kelas_mapel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id_kelas_siswa` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `kontrak_kerja`
--
ALTER TABLE `kontrak_kerja`
  MODIFY `id_kontrak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lhk`
--
ALTER TABLE `lhk`
  MODIFY `id_lhk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_smt` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `siswa_invoice`
--
ALTER TABLE `siswa_invoice`
  MODIFY `id_siswa_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `siswa_invoice_detail`
--
ALTER TABLE `siswa_invoice_detail`
  MODIFY `id_siswa_invoice_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `siswa_invoice_transaksi`
--
ALTER TABLE `siswa_invoice_transaksi`
  MODIFY `id_siswa_invoice_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uang_sekolah`
--
ALTER TABLE `uang_sekolah`
  MODIFY `id_uang_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
