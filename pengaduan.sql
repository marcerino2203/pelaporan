/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.19-MariaDB : Database - pengaduan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pengaduan` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `pengaduan`;

/*Table structure for table `aduan` */

DROP TABLE IF EXISTS `aduan`;

CREATE TABLE `aduan` (
  `id_aduan` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_aduan` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `id_masyarakat` int(11) DEFAULT NULL,
  `id_keterangan_status` int(11) DEFAULT NULL,
  `id_jenis_aduan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_aduan`),
  KEY `id_masyarakat` (`id_masyarakat`),
  KEY `keterangan_status` (`id_keterangan_status`),
  KEY `id_keterangan_aduan_aduan` (`id_jenis_aduan`),
  CONSTRAINT `id_keterangan_aduan_aduan` FOREIGN KEY (`id_jenis_aduan`) REFERENCES `jenis_aduan` (`id_jenis_aduan`),
  CONSTRAINT `id_masyarakat` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakat` (`id_masyarakat`),
  CONSTRAINT `keterangan_status` FOREIGN KEY (`id_keterangan_status`) REFERENCES `keterangan_status` (`id_keterangan_status`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

/*Data for the table `aduan` */

insert  into `aduan`(`id_aduan`,`nomor_aduan`,`tanggal`,`lokasi`,`isi`,`gambar`,`id_masyarakat`,`id_keterangan_status`,`id_jenis_aduan`) values 
(20,'AD/001','2022-06-28','fsdfsf','sdfsdf',NULL,2,4,1),
(21,'AD/002','2022-06-28','lakdown','lkwjfw\r\n',NULL,2,1,1),
(22,'AD/003','2022-06-28','test','test',NULL,2,3,1),
(23,'AD/004','2022-06-28','sfsdf','sdfsf',NULL,2,1,1);

/*Table structure for table `akses` */

DROP TABLE IF EXISTS `akses`;

CREATE TABLE `akses` (
  `id_akses` int(11) NOT NULL AUTO_INCREMENT,
  `akses` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `akses` */

insert  into `akses`(`id_akses`,`akses`) values 
(1,'admin'),
(2,'pegawai'),
(3,'warga');

/*Table structure for table `gambar` */

DROP TABLE IF EXISTS `gambar`;

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(30) DEFAULT NULL,
  `data_gbr` longblob DEFAULT NULL,
  `id_aduan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_gambar`),
  KEY `id_aduan` (`id_aduan`),
  CONSTRAINT `id_aduan` FOREIGN KEY (`id_aduan`) REFERENCES `aduan` (`id_aduan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `gambar` */

/*Table structure for table `instansi` */

DROP TABLE IF EXISTS `instansi`;

CREATE TABLE `instansi` (
  `id_instansi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `telp` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id_instansi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `instansi` */

insert  into `instansi`(`id_instansi`,`nama`,`alamat`,`telp`) values 
(1,'Dinas Lingkungan Hidup',NULL,'089988');

/*Table structure for table `jenis_aduan` */

DROP TABLE IF EXISTS `jenis_aduan`;

CREATE TABLE `jenis_aduan` (
  `id_jenis_aduan` int(11) NOT NULL AUTO_INCREMENT,
  `id_instansi` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_aduan`),
  KEY `keterangan_aduan_instansi` (`id_instansi`),
  CONSTRAINT `keterangan_aduan_instansi` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jenis_aduan` */

insert  into `jenis_aduan`(`id_jenis_aduan`,`id_instansi`,`keterangan`) values 
(1,1,'Pohon Tubang');

/*Table structure for table `keterangan_status` */

DROP TABLE IF EXISTS `keterangan_status`;

CREATE TABLE `keterangan_status` (
  `id_keterangan_status` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_keterangan_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `keterangan_status` */

insert  into `keterangan_status`(`id_keterangan_status`,`keterangan`) values 
(1,'terkirim'),
(2,'dilihat'),
(3,'diproses'),
(4,'selesai');

/*Table structure for table `masyarakat` */

DROP TABLE IF EXISTS `masyarakat`;

CREATE TABLE `masyarakat` (
  `id_masyarakat` int(10) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_akses` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_masyarakat`),
  KEY `akses_warga` (`id_akses`),
  CONSTRAINT `akses_warga` FOREIGN KEY (`id_akses`) REFERENCES `akses` (`id_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `masyarakat` */

insert  into `masyarakat`(`id_masyarakat`,`nik`,`nama`,`alamat`,`no_telp`,`username`,`password`,`id_akses`) values 
(2,'123','warga','warga','123','warga','warga',3);

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `no_pegawai` varchar(13) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_instansi` int(11) DEFAULT NULL,
  `id_akses` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`),
  KEY `id_instansi` (`id_instansi`),
  KEY `akses_pegawai` (`id_akses`),
  CONSTRAINT `akses_pegawai` FOREIGN KEY (`id_akses`) REFERENCES `akses` (`id_akses`),
  CONSTRAINT `id_instansi` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pegawai` */

insert  into `pegawai`(`id_pegawai`,`nama`,`alamat`,`no_pegawai`,`username`,`password`,`id_instansi`,`id_akses`) values 
(1,'pegawai',NULL,NULL,'pegawai','pegawai',1,2);

/*Table structure for table `status_aduan` */

DROP TABLE IF EXISTS `status_aduan`;

CREATE TABLE `status_aduan` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `id_keterangan_status` int(11) DEFAULT NULL,
  `id_aduan` int(11) DEFAULT NULL,
  `catatan` varchar(50) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_status`),
  KEY `id_aduan_status` (`id_aduan`),
  KEY `id_pegawai_status` (`id_pegawai`),
  KEY `id_keterangan_status` (`id_keterangan_status`),
  CONSTRAINT `id_aduan_status` FOREIGN KEY (`id_aduan`) REFERENCES `aduan` (`id_aduan`),
  CONSTRAINT `id_keterangan_status` FOREIGN KEY (`id_keterangan_status`) REFERENCES `keterangan_status` (`id_keterangan_status`),
  CONSTRAINT `id_pegawai_status` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

/*Data for the table `status_aduan` */

insert  into `status_aduan`(`id_status`,`tanggal`,`waktu`,`id_keterangan_status`,`id_aduan`,`catatan`,`id_pegawai`) values 
(24,'2022-06-28','14:11:00',1,20,NULL,NULL),
(25,'2022-06-28','14:14:00',1,21,NULL,NULL),
(26,'2022-06-28','14:26:00',3,20,NULL,NULL),
(27,'2022-06-28','15:00:00',1,22,NULL,NULL),
(28,'2022-06-28','16:12:00',4,20,NULL,NULL),
(29,'2022-06-28','16:27:00',3,22,NULL,NULL),
(30,'2022-06-28','17:46:00',1,23,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
