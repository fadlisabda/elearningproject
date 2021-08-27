-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 11:56 AM
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
  `nama_guru` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto_guru` varchar(100) NOT NULL,
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
(6, '1234455', 'willy', 'pekanbaru', '1996-03-11', '08232143553', 'pandau', 'karyawan.jpg', NULL, NULL, NULL),
(7, '12345667', 'maulida sari', 'padang sidempuan', NULL, '08127571706', 'Jl. KH Nasution No.990', '', NULL, NULL, NULL);

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
  `judul` varchar(255) NOT NULL,
  `keterangan` longtext NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `tugassiswa` varchar(255) DEFAULT NULL,
  `tenggat` datetime NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `el_detail_mapel`
--

INSERT INTO `el_detail_mapel` (`id_detailmapel`, `namamapel`, `namakelas`, `namaguru`, `judul`, `keterangan`, `file`, `link`, `tugassiswa`, `tenggat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Kimia', 'I A', 'willy', 'qwe', 'qwe', 'gambar.jpg.jpg', NULL, NULL, '0000-00-00 00:00:00', '2021-08-27 02:23:07', '2021-08-27 02:23:07', NULL),
(7, 'Kimia', 'I A', 'willy', 'qwe', 'qwe', 'images.jpg', NULL, NULL, '0000-00-00 00:00:00', '2021-08-27 02:23:08', '2021-08-27 02:23:08', NULL),
(8, 'Kimia', 'I A', 'willy', 'qwe', 'qwe', 'Komponen input.png', NULL, NULL, '0000-00-00 00:00:00', '2021-08-27 02:23:08', '2021-08-27 02:23:08', NULL),
(10, 'Kimia', 'I A', 'willy', 'qwe', 'qwe', '', '', '20190618_085053.jpg', '2021-08-27 15:23:00', '2021-08-27 02:47:40', '2021-08-27 02:47:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `el_user`
--

CREATE TABLE `el_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `el_user`
--

INSERT INTO `el_user` (`id`, `username`, `password`, `status`) VALUES
(12, '3115864953', '$2y$10$9fYsOKatgk9l78lamb/WU.aaYE7/FScZX92G8dKZnNlxJ0yzw2sDu', 'admin'),
(13, '123', '$2y$10$15vG.jQvlznLCTQs/sIBgunJKGaAiQSFoAj7HvMqAQld2fWilfHLe', 'guru'),
(14, '3129164448', '$2y$10$sn4qRDc.T8Y.aDgFy2UYhumVuzBwCX3yjBNEb2XHCaZCitDI3hxUG', 'siswa');

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
(1, 'I A', '12345346575', '2021-02-24 04:48:09', '2021-02-24 04:48:09', NULL),
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
  `jam` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_jam_pelajaran`
--

INSERT INTO `kelas_jam_pelajaran` (`id_jadwal`, `id_mapel`, `id_kelas`, `hari`, `jam`) VALUES
(12, 4, 2, 'senin', '07.00 wib'),
(13, 5, 2, 'senin', '09.00 wib'),
(14, 9, 2, 'senin', '11.00 wib'),
(16, 5, 1, 'senin', '07.00 wib'),
(17, 4, 1, 'senin', '08.00 wib'),
(18, 4, 1, 'senin', '10.00 wib'),
(19, 14, 1, 'Senin', '10.00 Wib'),
(20, 9, 1, 'senin', '12.00 wib'),
(21, 7, 1, 'senin', '13.00 wib'),
(22, 7, 1, 'senin', '13.00 wib'),
(23, 7, 1, 'senin', '13.00 wib'),
(24, 7, 1, 'senin', '13.00 wib'),
(25, 7, 1, 'senin', '13.00 wib'),
(26, 12, 1, 'senin', '14.00 wib'),
(27, 6, 1, 'senin', '15.00 wib'),
(28, 2, 7, 'Senin', '07.00 wib'),
(29, 4, 7, 'senin', '08.00 wib'),
(30, 4, 7, 'senin', '08.00 wib'),
(31, 10, 7, 'senin', '10.00 wib'),
(32, 9, 1, 'senin', '14.00 wib'),
(33, 10, 1, 'selasa', '07.00');

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
(12, 2, 2, '12345667', NULL, NULL, NULL),
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
  `nama_siswa` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telp` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `foto_siswa` varchar(100) DEFAULT NULL,
  `spp` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nisn`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `alamat`, `jenis_kelamin`, `foto_siswa`, `spp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '3115864953', '3115864953', 'ADZKIA QONITA', 'Pekanbaru', '2011-07-25', '081261238121', NULL, NULL, NULL, 3, '2021-02-24 05:03:59', '2021-02-24 05:04:55', NULL),
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
  `username` varchar(25) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `password_hash` varchar(191) NOT NULL,
  `level_user` int(11) NOT NULL,
  `status_user` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_user`, `password_hash`, `level_user`, `status_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'sdfghjk', '$2y$10$sAIJtZHkSLxSObgcstnHQO6laSNcQ.2XKVl91c8f3iOXYLUgbQMua', 1, 1, '2021-02-04 02:34:27', '2021-02-04 02:34:27', '0000-00-00 00:00:00'),
(2, 'verifikator', 'verifikator', '$2y$10$OuqOKkdsnWGVi62qTGw4GeXTeFA4jwq4wmh4njge3kXpd6/qgSxYi', 0, 1, '2021-02-04 21:41:01', '2021-02-04 21:41:01', '0000-00-00 00:00:00'),
(3, 'validator', 'validator', '$2y$10$8sPwk3O6Bvur4oKDGWlEne4lWEUi1F0NShBFii2.ERtS/XggmU7.m', 0, 1, '2021-02-04 21:52:07', '2021-02-04 21:52:07', '0000-00-00 00:00:00');

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
-- Indexes for table `el_user`
--
ALTER TABLE `el_user`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_guru` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `data_mata_pelajaran`
--
ALTER TABLE `data_mata_pelajaran`
  MODIFY `id_mapel` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `el_detail_mapel`
--
ALTER TABLE `el_detail_mapel`
  MODIFY `id_detailmapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `el_user`
--
ALTER TABLE `el_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kelas_jam_pelajaran`
--
ALTER TABLE `kelas_jam_pelajaran`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `kelas_mapel`
--
ALTER TABLE `kelas_mapel`
  MODIFY `id_kelas_mapel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id_kelas_siswa` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `id_siswa` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
