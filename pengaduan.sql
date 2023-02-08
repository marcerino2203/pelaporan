-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2023 at 02:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `aduan`
--

CREATE TABLE `aduan` (
  `id_aduan` int(11) NOT NULL,
  `nomor_aduan` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `id_masyarakat` int(11) DEFAULT NULL,
  `id_keterangan_status` int(11) DEFAULT NULL,
  `id_jenis_aduan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aduan`
--

INSERT INTO `aduan` (`id_aduan`, `nomor_aduan`, `tanggal`, `lokasi`, `keterangan`, `gambar`, `id_masyarakat`, `id_keterangan_status`, `id_jenis_aduan`) VALUES
(24, 'AD/005', '2022-07-14', 'Desa Gabru', 'Pohon mahoni tumbang menutupi akses jalan dan merusak kabel', NULL, 2, 4, 1),
(26, 'AD/006', '2022-07-14', 'Ponggok', 'Jalan berlubang membahayakan pengendara', NULL, 3, 5, 2),
(27, 'AD/007', '2022-07-14', 'Bence, Garum', 'Beberapa lampu penerangan jalan mati ', NULL, 3, 1, 4),
(28, 'AD/008', '2022-07-18', 'Kademangan', 'Kerusakan bangku ruang tunggu di terminal kademangan', NULL, 2, 1, 5),
(29, 'AD/009', '2022-08-03', 'Ngadirejo', 'Lampu penerangan lepas', NULL, 3, 5, 4),
(58, 'AD/010', '2023-02-07', 'dfasdasd', 'asdasdasd', NULL, 2, 1, 3),
(60, 'AD/011', '2023-02-07', 'Kademangan', 'Jalan berlubang', 'a90a0f082e9f158d3a1229131bff05b4.jpg', 2, 4, 2),
(61, 'AD/012', '2023-02-07', 'Jeding', 'Jalan berlubang', 'e40a4599cd5a686378ad61769384f1ac.jpg', 2, 4, 2),
(62, 'AD/013', '2023-02-07', 'Srengat', 'Pohon depan rumah sakit srengat baru tumbang menutupi jalan', 'pohon-tumbang.jpeg', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id_akses` int(11) NOT NULL,
  `akses` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `akses`) VALUES
(1, 'admin'),
(2, 'pegawai'),
(3, 'warga');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telp` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama`, `alamat`, `telp`) VALUES
(1, 'Dinas Komunikasi dan Informatika', 'Jl. S. Supriadi No.17, Bendogerit, Kec. Sananwetan, Kota Blitar', '555955'),
(2, 'Dinas Perhubungan Kabupaten Blitar', 'Jl. Raya Dandong No.53, Dandong, Kec. Srengat, Kabupaten Blitar', '555330'),
(3, 'Dinas Pekerjaan Umum dan Penataan Ruang', 'Jl. Sudanco Supriyadi No.86, Kec. Sananwetan, Kota Blitar', '808897'),
(4, 'Dinas Lingkungan Hidup', 'Jl. Manukwari No.25, Glondong, Satreyan, Kec. Kanigoro, Kabupaten Blitar', '801590');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_aduan`
--

CREATE TABLE `jenis_aduan` (
  `id_jenis_aduan` int(11) NOT NULL,
  `id_instansi` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_aduan`
--

INSERT INTO `jenis_aduan` (`id_jenis_aduan`, `id_instansi`, `keterangan`) VALUES
(1, 4, 'Pohon Tumbang'),
(2, 3, 'Kerusakan Jalan'),
(3, 3, 'Kerusakan Jembatan'),
(4, 3, 'Kerusakan Lampu Penerangan Jalan'),
(5, 2, 'Kerusakan Fasilitas Transportasi Umum');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_status`
--

CREATE TABLE `keterangan_status` (
  `id_keterangan_status` int(11) NOT NULL,
  `keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keterangan_status`
--

INSERT INTO `keterangan_status` (`id_keterangan_status`, `keterangan`) VALUES
(1, 'Terkirim'),
(2, 'Dilihat'),
(3, 'Diproses'),
(4, 'Selesai'),
(5, 'Ditangguhkan/Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_masyarakat` int(10) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_akses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id_masyarakat`, `nik`, `nama`, `alamat`, `no_telp`, `username`, `password`, `id_akses`) VALUES
(2, '123', 'warga', 'warga', '123', 'warga', 'warga', 3),
(3, '5678908765', 'Riski Teguh', 'Desa Sumberingin', '082345678', 'risguh', 'risguh', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nonlog_aduan`
--

CREATE TABLE `nonlog_aduan` (
  `id_nl_aduan` int(11) NOT NULL,
  `tgl_lapor` date DEFAULT NULL,
  `nama_pelapor` varchar(30) DEFAULT NULL,
  `no_pelapor` varchar(13) DEFAULT NULL,
  `lokasi_kerusakan` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `gbr_lokasi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nonlog_aduan`
--

INSERT INTO `nonlog_aduan` (`id_nl_aduan`, `tgl_lapor`, `nama_pelapor`, `no_pelapor`, `lokasi_kerusakan`, `keterangan`, `gbr_lokasi`) VALUES
(8, '2022-12-27', 'Ajeng', '089765463', 'Binangun', 'Jalan berlubang parah, belum ada peninjauan', NULL),
(9, '2022-12-27', 'Bahru', '082234675112', 'Sumber', 'Jembatan rusak', NULL),
(10, '2022-12-28', 'Satria', '089679890', 'Kademangan', 'Jalan berlubang dekat belokan jembatan kademangan sisi utara', NULL),
(14, '2022-12-28', 'Gandhi', '087756551805', 'Sutojayan', 'Jemabtan ambrol diterjang banjir', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `no_pegawai` varchar(13) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_instansi` int(11) DEFAULT NULL,
  `id_akses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `alamat`, `no_pegawai`, `username`, `password`, `id_instansi`, `id_akses`) VALUES
(1, 'admin', NULL, NULL, 'admin', 'admin', 1, 1),
(2, 'Suryadi', 'Jl. Manukwari No. 25', NULL, 'suryadi', 'suryadi', 3, 2),
(3, 'Wiryo Sudrajat', 'Bence, Garum', '999001223', 'wiryo123', 'wiryo123', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `status_aduan`
--

CREATE TABLE `status_aduan` (
  `id_status` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `id_keterangan_status` int(11) DEFAULT NULL,
  `id_aduan` int(11) DEFAULT NULL,
  `catatan` varchar(50) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_aduan`
--

INSERT INTO `status_aduan` (`id_status`, `tanggal`, `waktu`, `id_keterangan_status`, `id_aduan`, `catatan`, `id_pegawai`) VALUES
(37, '2022-07-18', '10:31:00', 1, 28, NULL, NULL),
(38, '2022-08-03', '16:57:00', 1, 29, NULL, NULL),
(39, '2022-08-03', '17:05:00', 3, 29, NULL, NULL),
(66, '2023-02-07', '14:16:00', 1, 58, NULL, NULL),
(68, '2023-02-07', '14:37:00', 1, 60, NULL, NULL),
(69, '2023-02-07', '15:07:00', 1, 61, NULL, NULL),
(70, '2023-02-07', '15:09:00', 3, 60, NULL, NULL),
(71, '2023-02-07', '15:10:00', 3, 61, NULL, NULL),
(72, '2023-02-07', '15:37:00', 4, 61, NULL, NULL),
(73, '2023-02-07', '16:48:00', 4, 60, NULL, NULL),
(74, '2023-02-07', '18:06:00', 1, 62, NULL, NULL),
(75, '2023-02-08', '17:09:00', 5, 26, NULL, NULL),
(76, '2023-02-08', '17:14:00', 5, 29, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aduan`
--
ALTER TABLE `aduan`
  ADD PRIMARY KEY (`id_aduan`),
  ADD KEY `id_masyarakat` (`id_masyarakat`),
  ADD KEY `keterangan_status` (`id_keterangan_status`),
  ADD KEY `id_keterangan_aduan_aduan` (`id_jenis_aduan`),
  ADD KEY `id_jenis_aduan` (`id_jenis_aduan`);

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `jenis_aduan`
--
ALTER TABLE `jenis_aduan`
  ADD PRIMARY KEY (`id_jenis_aduan`),
  ADD KEY `keterangan_aduan_instansi` (`id_instansi`);

--
-- Indexes for table `keterangan_status`
--
ALTER TABLE `keterangan_status`
  ADD PRIMARY KEY (`id_keterangan_status`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`),
  ADD KEY `akses_warga` (`id_akses`);

--
-- Indexes for table `nonlog_aduan`
--
ALTER TABLE `nonlog_aduan`
  ADD PRIMARY KEY (`id_nl_aduan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_instansi` (`id_instansi`),
  ADD KEY `akses_pegawai` (`id_akses`);

--
-- Indexes for table `status_aduan`
--
ALTER TABLE `status_aduan`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `id_aduan_status` (`id_aduan`),
  ADD KEY `id_pegawai_status` (`id_pegawai`),
  ADD KEY `id_keterangan_status` (`id_keterangan_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aduan`
--
ALTER TABLE `aduan`
  MODIFY `id_aduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_aduan`
--
ALTER TABLE `jenis_aduan`
  MODIFY `id_jenis_aduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keterangan_status`
--
ALTER TABLE `keterangan_status`
  MODIFY `id_keterangan_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_masyarakat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nonlog_aduan`
--
ALTER TABLE `nonlog_aduan`
  MODIFY `id_nl_aduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_aduan`
--
ALTER TABLE `status_aduan`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aduan`
--
ALTER TABLE `aduan`
  ADD CONSTRAINT `id_keterangan_aduan_aduan` FOREIGN KEY (`id_jenis_aduan`) REFERENCES `jenis_aduan` (`id_jenis_aduan`),
  ADD CONSTRAINT `id_masyarakat` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakat` (`id_masyarakat`),
  ADD CONSTRAINT `keterangan_status` FOREIGN KEY (`id_keterangan_status`) REFERENCES `keterangan_status` (`id_keterangan_status`);

--
-- Constraints for table `jenis_aduan`
--
ALTER TABLE `jenis_aduan`
  ADD CONSTRAINT `keterangan_aduan_instansi` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`);

--
-- Constraints for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD CONSTRAINT `akses_warga` FOREIGN KEY (`id_akses`) REFERENCES `akses` (`id_akses`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `akses_pegawai` FOREIGN KEY (`id_akses`) REFERENCES `akses` (`id_akses`),
  ADD CONSTRAINT `id_instansi` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`);

--
-- Constraints for table `status_aduan`
--
ALTER TABLE `status_aduan`
  ADD CONSTRAINT `id_aduan_status` FOREIGN KEY (`id_aduan`) REFERENCES `aduan` (`id_aduan`),
  ADD CONSTRAINT `id_keterangan_status` FOREIGN KEY (`id_keterangan_status`) REFERENCES `keterangan_status` (`id_keterangan_status`),
  ADD CONSTRAINT `id_pegawai_status` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
