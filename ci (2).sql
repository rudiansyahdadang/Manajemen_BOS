-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2018 at 08:43 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `1_tahun_anggaran`
--

CREATE TABLE `1_tahun_anggaran` (
  `id_tahun` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `1_tahun_anggaran`
--

INSERT INTO `1_tahun_anggaran` (`id_tahun`, `tahun`, `status`) VALUES
(1, '2017-2018', '1'),
(2, '2018-2019', '0'),
(3, '2019-2020', '0');

-- --------------------------------------------------------

--
-- Table structure for table `2_uraian`
--

CREATE TABLE `2_uraian` (
  `id_uraian` int(11) NOT NULL,
  `kode_uraian` varchar(10) NOT NULL,
  `uraian` varchar(500) NOT NULL,
  `id_tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2_uraian`
--

INSERT INTO `2_uraian` (`id_uraian`, `kode_uraian`, `uraian`, `id_tahun`) VALUES
(3, '1', 'Saldo awal', 1),
(4, '2', 'Pendapatan rutin', 1),
(5, '3', 'Bantuan Operasional Sekolah', 1),
(6, '4', 'BOS Provinsi', 1),
(7, '5', 'BOS Kabupaten / Kota', 1),
(8, '6', 'Bantuan Lain', 1),
(9, '7', 'Sumber pendapatan lainnya', 1),
(10, '1.1', 'Penyusunan Kompetensi Ketuntasan Minimal', 1),
(11, '1.2', 'Penyusunan Kriteria Kenaikan Kelas', 1),
(12, '1.3', 'Penyelenggaraan Kegiatan Uji Kompetensi dan Sertifikasi Kejuruan ', 1),
(13, '1.3.1', 'a. biaya pendaftaran uji kompetensi, ', 1),
(14, '1.3.2', 'b. pembelian bahan ujian kompetensi, ', 1),
(15, '1.3.3', 'c. fotokopi, ', 1),
(16, '1.3.4', 'd. konsumsi, ', 1),
(17, '1.3.5', 'e. pengadaan sertifikat, ', 1),
(18, '1.3.6', 'f. transportasi, ', 1),
(19, '1.3.7', 'g. akomodasi, dan/atau ', 1),
(20, '1.3.8', 'h. assesor dari luar ', 1),
(21, '2.1', '1.. Penyusunan Jadwal dan Tugas Guru', 1),
(22, '2.2', '2. Penyusunan Program Tahunan		', 1),
(23, '2.3', '3. Penyusunan Program Semester', 1),
(24, '2.4', '4. Penyusunan Program Ekstrakurikuler', 1),
(25, '2.5', '5. Penyusunan RPP / Bahan Ajar', 1),
(26, '3.1', '1. Kegiatan Pembelajaran dan Ekstrakurikuler', 1),
(27, '3.1.1', 'a. Pengadaan Alat Habis Pakai Praktikum Pembelajaran', 1),
(28, '3.1.1.1', '1. Alat Praktikum Kejuruan Teknik Komputer Jaringan', 1),
(29, '3.1.1.2', '2. Alat Praktikum Kejuruan Teknik  & Bisnis Sepeda Motor', 1),
(30, '3.1.1.3', '3. Alat Praktikum Kejuruan Perbankan Syariah', 1),
(31, '3.1.1.4', '4. Alat Praktikum Kejuruan Asisten Keperawatan', 1),
(32, '3.1.1.5', '5. Peralatan ringan/handtools,', 1),
(33, '3.1.1.6', '6. Peralatan praktikum IPA', 1),
(34, '3.1.1.7', '7. Peralatan praktikum bahasa', 1),
(35, '3.1.1.8', '8. Alat praktek olahraga', 1),
(36, '3.1.1.9', '9. Alat praktek kesenian', 1),
(37, '3.1.1.10', '10. Transportasi dan atau konsumsi pembelian alat', 1),
(38, '3.1.2', 'b. Pengadaan Bahan Habis Pakai Praktikum Pembelajaran', 1),
(39, '3.1.2.1', '1. bahan praktikum kejuruan Teknik Komputer dan Jaringan', 1),
(40, '3.1.2.2', '2. bahan praktikum kejuruan Teknik & Bisnis Sepeda Motor', 1),
(41, '3.1.2.3', '3. bahan praktikum kejuruan Perbankan Syariah', 1),
(42, '3.1.2.4', '4. bahan praktikum kejuruan Asisten Keperawatan', 1),
(43, '3.1.2.5', '5. bahan praktikum IPA', 1),
(44, '3.1.2.6', '6. Pembelian bahan praktikum bahasa, ', 1),
(45, '3.1.2.7', '7. Pembelian bahan praktikum komputer ( Tinta, CD, dll )', 1),
(46, '3.1.2.8', '8. Pembelian bahan praktik olah raga', 1),
(47, '3.1.2.9', '9. Pembelian bahan praktik kesenian', 1),
(48, '3.1.2.10', '10. Transportasi dan atau konsumsi pembelian alat', 1),
(49, '3.1.3', 'c. Pembiayaan', 1),
(50, '3.1.3.1', '1) remedial ', 1),
(51, '3.1.3.2', '2) pemantapan persiapan ujian/ Pengayaan', 1),
(52, '3.1.3.3', '3) pelaksanaan ujia coba UASBN ( try out )', 1),
(53, '3.1.4', 'd. Pembiayaan kegiatan ekstrkurikuler:', 1),
(54, '3.1.4.1', '1) Ekstrakurikuler kesiswaan:', 1),
(55, '3.1.4.1.1', 'a)  OSIS', 1),
(56, '3.1.4.1.2', 'b)  Pramuka, ', 1),
(57, '3.1.4.1.3', 'c)  PMR/ PASKIBRA\n', 1),
(58, '3.1.4.1.4', 'd)  UKS, ', 1),
(59, '3.1.4.1.5', 'e)  Pembinaan Olimpiade Sains, ', 1),
(60, '3.1.4.1.6', 'f)  Seni, ', 1),
(61, '3.1.4.1.7', 'g)  Olahraga, ', 1),
(62, '3.1.4.1.8', 'h)  Lomba Kompetensi Siswa/ LCT', 1),
(63, '3.1.4.1.9', 'i)  kegiatan kepemimpinan dan bela negara, ', 1),
(64, '3.1.4.2', '2) ekstrakurikuler olahraga dan kesenian', 1),
(65, '3.1.4.3', '3) pengembangan pendidikan karakter dan/atau penumbuhan budi pekerti.', 1),
(66, '3.1.4.4', '4) pengembangan sekolah sehat, aman, ramah anak, dan/atau menyenangkan.', 1),
(67, '3.1.4.5', '5) program pelibatan keluarga di sekolah', 1),
(68, '3.2.1', 'a. Biaya untuk penyelenggaraan BKK ', 1),
(69, '3.2.1.1', '1) penggandaan bahan, ', 1),
(70, '3.2.1.2', '2) ATK', 1),
(71, '3.2.1.3', '3) Transportasi', 1),
(72, '3.2', '2. Penyelenggaraan Bursa Kerja Khusus (BKK) SMK dan/atau Praktek Kerja Industri (Prakerin)/Praktek Kerja Lapangan (PKL) dan Pemagangan.			\r\n', 1),
(73, '3.2.2', 'b. Biaya Praktek Kerja Industri', 1),
(74, '3.2.3', 'c. perjalanan dinas pemantauan kebekerjaan lulusan SMK (tracer study), ', 1),
(75, '3.2.4', 'd. Biaya untuk magang guru di industri ', 1),
(76, '4.1', '1. Pengembangan Profesi Guru dan Tenaga Kependidikan, serta Pengembangan Manajemen Sekolah	', 1),
(77, '4.1.1', 'a. Kegiatan IHT, MGMP dan MKKS ', 1),
(78, '4.1.2', 'b. Kegiatan MGMP dan MKKS , Work shop', 1),
(79, '4.1.3', 'c. pembelian bahan/komponen praktek perakitan e-book.', 1),
(80, '4.1.4', 'd. menambah dan meningkatkan praktek kejuruan berulang kali', 1),
(81, '4.1.5', 'e. diklat assesor kompetensi ', 1),
(82, '4.1.6', 'f. Pembinaan tenaga ketatausahaan', 1),
(83, '4.1.7', 'g. Pembinaan tenaga keperpustakaan', 1),
(84, '4.1.8', 'h. Pembinaan Teknisi bengkel praktik', 1),
(85, '5.1', '1. Pengembangan Perpustakaan', 1),
(86, '5.1.1', 'a.Buku teks pelajaran untuk peserta didik dan buku panduan guru ', 1),
(87, '5.1.1.1', '1) Penyelenggara Kurikulum K-13', 1),
(88, '5.1.1.1.1', 'a)  Buku teks pelajaran kelas 11 dan kelas 12 Kurikulum K-13', 1),
(89, '5.1.1.1.2', 'b)  Buku panduan guru kelas 11 dan kelas 12 Kurikulum K-13', 1),
(90, '5.1.1.1.3', 'c)  Buku teks pelajaran pelajaran kelas 10 Kurikulum K-13', 1),
(91, '5.1.1.2', '2) Buku teks pelajaran Penyelenggara Kurikulum 2006', 1),
(92, '5.1.2', 'b. Pengembangan perpustakaan ', 1),
(93, '5.1.2.1', '1) pemeliharaan buku/koleksi perpustakaan, ', 1),
(94, '5.1.2.2', '2) peningkatan kompetensi tenaga perpustakaan, ', 1),
(95, '5.1.2.3', '3) pemeliharaan dan pembelian perabot perpustakaan, ', 1),
(96, '5.2', '2. Pemeliharaan dan Perawatan Sarana dan Prasarana ', 1),
(97, '5.2.1', 'a. pengecatan,perawatan, dan/atau perbaikan :', 1),
(98, '5.2.1.1', '1. Atap, pintu, jendela, bangunan, lantai,plafond, lampu', 1),
(99, '5.2.2', 'b. perbaikan mebeler, ', 1),
(100, '5.2.3', 'c. perawatan dan/atau perbaikan sanitasi / WC', 1),
(101, '5.2.4', 'd. perawatan dan/atau perbaikan instalasi listrik ', 1),
(102, '5.2.5', 'e. perawatan dan/atau perbaikan alat transportasi', 1),
(103, '5.2.6', 'f. perawatan dan/atau perbaikan komputer, printer, laptop, LCD, AC', 1),
(104, '5.2.7', 'g. perawatan dan/atau perbaikan peralatan praktek;', 1),
(105, '5.2.8', 'h. pemeliharaan taman dan/atau fasilitas sekolah lainnya. Seluruh pembiayaan di atas dapat dikeluarkan pembayaran upah tukang, transportasi, dan/atau konsumsi.', 1),
(106, '5.3', '3. Pembelian Alat Multi Media Pembelajaran', 1),
(107, '5.3.1', 'a. komputer desktop/ work station ', 1),
(108, '5.3.2', 'b. printer atau printer plus scanner', 1),
(109, '5.3.3', 'c. laptop ', 1),
(110, '5.3.4', 'd. proyektor ', 1),
(111, '6.1', '1. Penerimaan Peserta Didik Baru', 1),
(112, '6.1.1', 'a. penggandaan formulir pendaftaran;', 1),
(113, '6.1.2', 'b. administrasi pendaftaran;', 1),
(114, '6.1.3', 'c. penentuan peminatan/psikotest;', 1),
(115, '6.1.4', 'd. publikasi;', 1),
(116, '6.1.5', 'e. pengenalan lingkungan sekolah; ', 1),
(117, '6.1.6', 'f. konsumsi / transportasi', 1),
(118, '6.2', '2. Pengelolaan Sekolah', 1),
(119, '6.2.1', 'a. Pembelian alat tulis kantor', 1),
(120, '6.2.2', 'b. Pembelian peralatan kebersihan ', 1),
(121, '6.2.3', 'c. Pembelian peralatan kesehatan dan keselamatan ', 1),
(122, '6.2.4', 'd. Pembiayaan Pengelolaan BOS SMK, terdiri dari:', 1),
(123, '6.2.4.1', '1) pembelian alat dan/atau bahan habis pakai', 1),
(124, '6.2.4.2', '2) transportasi pengambilan BOS;', 1),
(125, '6.2.4.3', '3) transportasi koordinasi dan pelaporan;', 1),
(126, '6.2.4.4', '4) Pelaporan BOS, ATK, Potokopi, Penjilidan, materai, konsumsi, transportasi', 1),
(127, '6.2.5', 'e. surat-menyurat', 1),
(128, '6.2.6', 'f. membangun dan/atau mengembangkan website ', 1),
(129, '6.2.6.1', '1) pembelian domain, ', 1),
(130, '6.2.6.2', '2) konsumsi, ', 1),
(131, '6.2.6.3', '3) transportasi, ', 1),
(132, '6.2.6.4', '4) jasa profesi pengembang website.', 1),
(133, '6.2.7', 'g. pembelian server ', 1),
(134, '6.2.8', 'h. Pendataan SMK melalui aplikasi Dapodik:', 1),
(135, '6.2.8.1', '1) penggandaan formulir Dapodik;', 1),
(136, '6.2.8.2', '2) konsumsi dan transportasi;', 1),
(137, '6.2.8.3', '3) honor petugas pendataan Dapodik', 1),
(138, '6.2.9', 'i. menyewa/membeli genset atau panel surya ', 1),
(139, '6.2.10', 'j. penanggulangan dampak darurat bencana ', 1),
(140, '7.1', '1. Langganan Daya dan Jasa', 1),
(141, '7.1.1', 'a. langganan daya dan jasa ', 1),
(142, '7.1.1.1', '1) listrik, ', 1),
(143, '7.1.1.2', '2) telepon, ', 1),
(144, '7.1.1.3', '3) air, ', 1),
(145, '7.1.1.4', '4) langganan koran, ', 1),
(146, '7.1.1.5', '5) majalah/publikasi berkala ', 1),
(147, '7.1.1.6', '6) kebersihan/sampah.', 1),
(148, '7.1.2', 'b. pemasangan instalasi atau penambahan daya listrik.', 1),
(149, '7.1.3', 'c. langganan internet ', 1),
(150, '7.2', '2. Kegiatan Rumah Tangga Sekolah', 1),
(151, '7.2.1', 'a. Kegiatan Rapat Guru/ Pegawai', 1),
(152, '7.2.2', 'b. Konsumsi Tamu', 1),
(153, '7.2.3', 'c. Kegiatan Rapat Orang Tua/ Komite', 1),
(154, '7.2.4', 'd. Belanja Dapur', 1),
(155, '7.3', '3. Pembayaran Honor', 1),
(156, '7.3.1', 'a. honor guru ', 1),
(157, '7.3.2', 'b. Honor Jabatan', 1),
(158, '7.3.3', 'c. Honor tenaga kependidikan', 1),
(159, '7.3.4', 'd. honor pembimbing ekstakurikuler', 1),
(160, '7.3.5', 'e. Transport kehadiran, piket, upacara, dll', 1),
(161, '8.1', '1. Kegiatan Evaluasi Pembelajaran', 1),
(162, '8.1.1', 'a. ulangan harian, ', 1),
(163, '8.1.2', 'b. ulangan tengah semester, ', 1),
(164, '8.1.3', 'c. ulangan akhir semester/ulangan kenaikan kelas, ', 1),
(165, '8.1.4', 'd. ujian sekolah ', 1),
(166, '8.1.5', 'e. ujian nasional, ', 1),
(167, '5.2.8', 'h. pemeliharaan taman dan/atau fasilitas sekolah <br>lainnya. Seluruh pembiayaan di atas dapat dikeluarkan pembayaran upah tukang,<br> transportasi, dan/atau konsumsi.', 1),
(169, '6', 'Bantuan Lain', 1),
(170, '7', 'Sumber pendapatan lainnya', 1),
(171, '6', 'Bantuan Lain', 1),
(172, '3', 'Pendapatan rutin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `3_sumber_dana`
--

CREATE TABLE `3_sumber_dana` (
  `id_sumber_dana` int(11) NOT NULL,
  `id_uraian` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `rutin` float NOT NULL,
  `pusat` float NOT NULL,
  `prov` float NOT NULL,
  `kota` float NOT NULL,
  `bl` float NOT NULL,
  `pl` float NOT NULL,
  `jumlah` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `3_sumber_dana`
--

INSERT INTO `3_sumber_dana` (`id_sumber_dana`, `id_uraian`, `id_tahun`, `rutin`, `pusat`, `prov`, `kota`, `bl`, `pl`, `jumlah`) VALUES
(4, 3, 1, 1000000, 0, 0, 0, 0, 1000000, 2000000),
(5, 4, 1, 1000000, 0, 0, 0, 0, 0, 1000000),
(6, 5, 1, 0, 1000000, 0, 0, 0, 0, 1000000),
(7, 6, 1, 0, 0, 1000000, 0, 0, 0, 1000000),
(8, 8, 1, 0, 0, 0, 0, 1000000, 0, 1000000),
(9, 9, 1, 0, 0, 0, 0, 0, 1000000, 1000000),
(10, 10, 1, 0, 0, 2000000, 0, 0, 0, 2000000),
(11, 26, 1, 0, 0, 0, 0, 0, 0, 0),
(12, 11, 1, 0, 0, 0, 0, 2000, 0, 2000),
(13, 12, 1, 0, 0, 0, 0, 0, 0, 0),
(14, 13, 1, 0, 0, 0, 0, 3000, 0, 3000),
(15, 14, 1, 0, 0, 0, 0, 4000, 0, 4000),
(16, 15, 1, 0, 0, 0, 0, 5000, 0, 5000),
(17, 16, 1, 0, 0, 0, 0, 6000, 0, 6000),
(18, 17, 1, 0, 0, 0, 0, 7000, 0, 7000),
(19, 18, 1, 0, 0, 0, 0, 1000, 0, 1000),
(20, 19, 1, 0, 0, 0, 0, 2000, 0, 2000),
(21, 20, 1, 0, 0, 0, 0, 3000, 0, 3000),
(22, 21, 1, 0, 0, 0, 0, 200, 0, 200),
(24, 22, 1, 0, 0, 0, 0, 300, 0, 300),
(25, 23, 1, 0, 0, 0, 0, 300, 0, 300),
(26, 24, 1, 0, 0, 0, 0, 400, 0, 400),
(27, 25, 1, 0, 0, 0, 0, 500, 0, 500),
(28, 27, 1, 0, 0, 0, 0, 60, 0, 60),
(29, 28, 1, 0, 0, 0, 0, 70, 0, 70),
(30, 29, 1, 0, 0, 0, 0, 40, 0, 40),
(31, 30, 1, 0, 0, 0, 0, 30, 0, 30),
(32, 31, 1, 0, 0, 0, 0, 40, 0, 40),
(33, 32, 1, 0, 0, 0, 0, 50, 0, 50),
(34, 33, 1, 0, 0, 0, 0, 50, 0, 50),
(35, 34, 1, 0, 0, 0, 0, 20, 0, 20),
(36, 35, 1, 0, 0, 0, 0, 50, 0, 50),
(37, 36, 1, 0, 0, 0, 0, 30, 0, 30),
(38, 37, 1, 0, 0, 0, 0, 10, 0, 10),
(39, 38, 1, 0, 0, 0, 0, 0, 0, 0),
(40, 39, 1, 0, 0, 0, 0, 80, 0, 80),
(41, 40, 1, 0, 0, 0, 0, 90, 0, 90),
(42, 41, 1, 0, 0, 0, 0, 60, 0, 60),
(43, 42, 1, 0, 0, 0, 0, 20, 0, 20),
(44, 43, 1, 0, 0, 0, 0, 60, 0, 60),
(45, 44, 1, 0, 0, 0, 0, 70, 0, 70),
(46, 45, 1, 0, 0, 0, 0, 80, 0, 80),
(47, 46, 1, 0, 0, 0, 0, 50, 0, 50),
(48, 47, 1, 0, 0, 0, 0, 40, 0, 40),
(49, 48, 1, 0, 0, 0, 0, 90, 0, 90),
(50, 49, 1, 0, 0, 0, 0, 0, 0, 0),
(51, 50, 1, 0, 0, 0, 0, 60, 0, 60),
(52, 51, 1, 0, 0, 0, 0, 30, 0, 30),
(53, 52, 1, 0, 0, 0, 0, 10, 0, 10),
(54, 53, 1, 0, 0, 0, 0, 0, 0, 0),
(55, 54, 1, 0, 0, 0, 0, 50, 0, 50),
(56, 55, 1, 0, 0, 0, 0, 70, 0, 70),
(57, 56, 1, 0, 0, 0, 0, 80, 0, 80),
(58, 57, 1, 0, 0, 0, 0, 70, 0, 70),
(59, 58, 1, 0, 0, 0, 0, 50, 0, 50),
(60, 59, 1, 0, 0, 0, 0, 70, 0, 70),
(61, 60, 1, 0, 0, 0, 0, 40, 0, 40),
(62, 61, 1, 0, 0, 0, 0, 10, 0, 10),
(63, 62, 1, 0, 0, 0, 0, 40, 0, 40),
(64, 63, 1, 0, 0, 0, 0, 600, 0, 600),
(65, 64, 1, 0, 0, 0, 0, 500, 0, 500),
(66, 65, 1, 0, 0, 0, 0, 300, 0, 300),
(67, 66, 1, 0, 0, 0, 0, 400, 0, 400),
(68, 67, 1, 0, 0, 0, 0, 300, 0, 300),
(69, 68, 1, 0, 0, 0, 0, 0, 0, 0),
(70, 69, 1, 0, 0, 0, 0, 700, 0, 700),
(71, 70, 1, 0, 0, 0, 0, 400, 0, 400),
(72, 71, 1, 0, 0, 0, 0, 500, 0, 500),
(73, 72, 1, 0, 0, 0, 0, 0, 0, 0),
(74, 73, 1, 0, 0, 0, 0, 600, 0, 600),
(75, 82, 1, 0, 0, 0, 0, 200, 0, 200),
(76, 81, 1, 0, 0, 0, 0, 500, 0, 500),
(80, 80, 1, 0, 0, 0, 0, 890, 0, 890),
(81, 79, 1, 0, 0, 0, 0, 700, 0, 700),
(82, 78, 1, 0, 0, 0, 0, 600, 0, 600),
(83, 77, 1, 0, 0, 0, 0, 700, 0, 700),
(84, 76, 1, 0, 0, 0, 0, 0, 0, 0),
(85, 74, 1, 0, 0, 0, 0, 700, 0, 700),
(86, 75, 1, 0, 0, 0, 0, 700, 0, 700),
(87, 89, 1, 0, 0, 0, 0, 50, 0, 50),
(88, 88, 1, 0, 0, 0, 0, 70, 0, 70),
(89, 87, 1, 0, 0, 0, 0, 80, 0, 80),
(90, 86, 1, 0, 0, 0, 0, 0, 0, 0),
(91, 85, 1, 0, 0, 0, 0, 0, 0, 0),
(92, 84, 1, 0, 0, 0, 0, 90, 0, 90),
(93, 83, 1, 0, 0, 0, 0, 80, 0, 80),
(94, 90, 1, 0, 0, 0, 0, 70, 0, 70),
(95, 99, 1, 0, 0, 0, 0, 50, 0, 50),
(96, 98, 1, 0, 0, 0, 0, 80, 0, 80),
(97, 97, 1, 0, 0, 0, 0, 90, 0, 90),
(98, 96, 1, 0, 0, 0, 0, 0, 0, 0),
(99, 95, 1, 0, 0, 0, 0, 90, 0, 90),
(100, 94, 1, 0, 0, 0, 0, 90, 0, 90),
(101, 93, 1, 0, 0, 0, 0, 90, 0, 90),
(102, 92, 1, 0, 0, 0, 0, 0, 0, 0),
(103, 91, 1, 0, 0, 0, 0, 90, 0, 90),
(104, 109, 1, 0, 0, 0, 0, 80, 0, 80),
(105, 108, 1, 0, 0, 0, 0, 80, 0, 80),
(106, 107, 1, 0, 0, 0, 0, 90, 0, 90),
(107, 106, 1, 0, 0, 0, 0, 0, 0, 0),
(108, 105, 1, 0, 0, 0, 0, 80, 0, 80),
(109, 104, 1, 0, 0, 0, 0, 90, 0, 90),
(110, 103, 1, 0, 0, 0, 0, 80, 0, 80),
(111, 102, 1, 0, 0, 0, 0, 90, 0, 90),
(112, 101, 1, 0, 0, 0, 0, 80, 0, 80),
(113, 100, 1, 0, 0, 0, 0, 90, 0, 90),
(114, 119, 1, 0, 0, 0, 0, 90, 0, 90),
(115, 118, 1, 0, 0, 0, 0, 0, 0, 0),
(116, 117, 1, 0, 0, 0, 0, 80, 0, 80),
(117, 116, 1, 0, 0, 0, 0, 80, 0, 80),
(118, 115, 1, 0, 0, 0, 0, 90, 0, 90),
(119, 114, 1, 0, 0, 0, 0, 80, 0, 80),
(120, 113, 1, 0, 0, 0, 0, 90, 0, 90),
(121, 112, 1, 0, 0, 0, 0, 90, 0, 90),
(122, 111, 1, 0, 0, 0, 0, 0, 0, 0),
(123, 110, 1, 0, 0, 0, 0, 90, 0, 90),
(124, 129, 1, 0, 0, 0, 0, 80, 0, 80),
(125, 128, 1, 0, 0, 0, 0, 0, 0, 0),
(126, 127, 1, 0, 0, 0, 0, 90, 0, 90),
(127, 126, 1, 0, 0, 0, 0, 90, 0, 90),
(128, 125, 1, 0, 0, 0, 0, 90, 0, 90),
(129, 124, 1, 0, 0, 0, 0, 90, 0, 90),
(130, 123, 1, 0, 0, 0, 0, 90, 0, 90),
(131, 122, 1, 0, 0, 0, 0, 0, 0, 0),
(132, 121, 1, 0, 0, 0, 0, 80, 0, 80),
(133, 120, 1, 0, 0, 0, 0, 90, 0, 90),
(134, 139, 1, 0, 0, 0, 0, 89, 0, 89),
(135, 138, 1, 0, 0, 0, 0, 90, 0, 90),
(136, 137, 1, 0, 0, 0, 0, 90, 0, 90),
(137, 136, 1, 0, 0, 0, 0, 90, 0, 90),
(138, 135, 1, 0, 0, 0, 0, 90, 0, 90),
(139, 130, 1, 0, 0, 0, 0, 90, 0, 90),
(140, 134, 1, 0, 0, 0, 0, 0, 0, 0),
(141, 133, 1, 0, 0, 0, 0, 70, 0, 0),
(142, 132, 1, 0, 0, 0, 0, 90, 0, 90),
(143, 131, 1, 0, 0, 0, 0, 90, 0, 90),
(144, 149, 1, 0, 0, 0, 0, 70, 0, 70),
(145, 148, 1, 0, 0, 0, 0, 90, 0, 90),
(146, 147, 1, 0, 0, 0, 0, 90, 0, 90),
(147, 146, 1, 0, 0, 0, 0, 90, 0, 90),
(148, 140, 1, 0, 0, 0, 0, 0, 0, 0),
(149, 145, 1, 0, 0, 0, 0, 90, 0, 90),
(150, 144, 1, 0, 0, 0, 0, 90, 0, 90),
(151, 141, 1, 0, 0, 0, 0, 0, 0, 0),
(152, 142, 1, 0, 0, 0, 0, 90, 0, 90),
(153, 143, 1, 0, 0, 0, 0, 90, 0, 90),
(154, 159, 1, 0, 0, 0, 0, 90, 0, 90),
(155, 158, 1, 0, 0, 0, 0, 90, 0, 90),
(156, 157, 1, 0, 0, 0, 0, 90, 0, 90),
(157, 156, 1, 0, 0, 0, 0, 90, 0, 90),
(158, 150, 1, 0, 0, 0, 0, 0, 0, 0),
(159, 155, 1, 0, 0, 0, 0, 0, 0, 0),
(160, 151, 1, 0, 0, 0, 0, 90, 0, 90),
(161, 152, 1, 0, 0, 0, 0, 90, 0, 90),
(162, 154, 1, 0, 0, 0, 0, 900, 0, 900),
(163, 153, 1, 0, 0, 0, 0, 80, 0, 80),
(164, 166, 1, 0, 0, 0, 0, 90, 0, 90),
(165, 165, 1, 0, 0, 0, 0, 90, 0, 90),
(166, 164, 1, 0, 0, 0, 0, 90, 0, 90),
(167, 163, 1, 0, 0, 0, 0, 80, 0, 80),
(168, 162, 1, 0, 0, 0, 0, 80, 0, 80),
(169, 160, 1, 0, 0, 0, 0, 90, 0, 90),
(170, 161, 1, 0, 0, 0, 0, 0, 0, 0),
(172, 7, 1, 0, 0, 0, 2000000, 0, 0, 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `4_buku_kas`
--

CREATE TABLE `4_buku_kas` (
  `id_buku_kas` int(11) NOT NULL,
  `id_uraian` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `no_kode` int(11) NOT NULL,
  `no_bukti` varchar(100) NOT NULL,
  `uraian` varchar(200) NOT NULL,
  `pemasukan_dana` float NOT NULL,
  `pengeluaran_dana` float NOT NULL,
  `sumber_tujuan` varchar(200) NOT NULL,
  `keterangan_sumber_dana` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `4_buku_kas`
--

INSERT INTO `4_buku_kas` (`id_buku_kas`, `id_uraian`, `id_tahun`, `tgl`, `no_kode`, `no_bukti`, `uraian`, `pemasukan_dana`, `pengeluaran_dana`, `sumber_tujuan`, `keterangan_sumber_dana`) VALUES
(1, 17, 1, '2018-03-01', 17, 'abc/a-2', 'pembuatan sertifikat idn', 0, 500000, 'IDN', ''),
(4, 156, 1, '2018-03-02', 156, '23434ddf/s', 'honor guru', 0, 10000000, 'honor guru tunai', ''),
(8, 33, 1, '2018-03-08', 33, 'assll/pajak', 'pajak alat praktikum', 0, 750000, 'pajak alat praktikum', ''),
(9, 33, 1, '2018-03-07', 33, 'aasddd/asd//asd', 'Alat IPa', 0, 7500000, 'alat praktik', ''),
(13, 6, 1, '2018-03-08', 6, 'asfasffs/aas', 'BOS Provinsi', 12000000, 0, 'Bank BJB', 'prov'),
(14, 6, 1, '2018-03-01', 6, 'asfasffs/aas', 'BOS Provinsi', 20000000, 0, 'Bank BJB', 'prov'),
(15, 8, 1, '2018-03-08', 8, '1122/as', 'CSR Net Mediatama', 10000000, 0, 'Bank BNI', 'bl'),
(16, 15, 1, '2018-04-20', 15, 'sad/asd/33', 'Fotokopi Soal UAS', 0, 1500000, 'Fotokopi', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_sekolah`
--

CREATE TABLE `data_sekolah` (
  `id` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat_lengkap` varchar(200) NOT NULL,
  `kel_des` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kab_kota` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `nama_ketua_yayasan` varchar(30) NOT NULL,
  `nama_komite_sekolah` varchar(30) NOT NULL,
  `nama_kepala_sekolah` varchar(100) NOT NULL,
  `nama_kepala_tu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_sekolah`
--

INSERT INTO `data_sekolah` (`id`, `nama_sekolah`, `alamat_lengkap`, `kel_des`, `kecamatan`, `kab_kota`, `provinsi`, `nama_ketua_yayasan`, `nama_komite_sekolah`, `nama_kepala_sekolah`, `nama_kepala_tu`) VALUES
(1, 'SMK TERPADU AL-IKHWAN', 'JL. KHOER AFANDI NO.13', 'SETIANEGARA', 'CIBEUREUM', 'KOTA TASIKMALAYA', 'JAWA BARAT', 'DR. KH. MUHSIN AN SYADILIE', 'H. IIS ISWARA', 'DR. HJ. ETI TISMAYATI, Dra,M.Ag', 'HJ. LASMANAH AIDAH');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `kata_sandi` varchar(100) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama_pengguna`, `kata_sandi`, `nama_lengkap`, `email`, `alamat`, `keterangan`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Dadang Rudiansyah', 'dadang@mail.com', 'Kawalu', 'blblaala'),
(6, 'ali', '0192023a7bbd73250516f069df18b500', 'alia', 'ali@mail.com', 'fasfasf', 'asdfafsf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1_tahun_anggaran`
--
ALTER TABLE `1_tahun_anggaran`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `2_uraian`
--
ALTER TABLE `2_uraian`
  ADD PRIMARY KEY (`id_uraian`);

--
-- Indexes for table `3_sumber_dana`
--
ALTER TABLE `3_sumber_dana`
  ADD PRIMARY KEY (`id_sumber_dana`);

--
-- Indexes for table `4_buku_kas`
--
ALTER TABLE `4_buku_kas`
  ADD PRIMARY KEY (`id_buku_kas`);

--
-- Indexes for table `data_sekolah`
--
ALTER TABLE `data_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `1_tahun_anggaran`
--
ALTER TABLE `1_tahun_anggaran`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `2_uraian`
--
ALTER TABLE `2_uraian`
  MODIFY `id_uraian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `3_sumber_dana`
--
ALTER TABLE `3_sumber_dana`
  MODIFY `id_sumber_dana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `4_buku_kas`
--
ALTER TABLE `4_buku_kas`
  MODIFY `id_buku_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `data_sekolah`
--
ALTER TABLE `data_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
