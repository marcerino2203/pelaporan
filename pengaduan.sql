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
  `tanggal` date DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `id_instansi` int(11) DEFAULT NULL,
  `id_masyarakat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_aduan`),
  KEY `id_instanse` (`id_instansi`),
  KEY `id_masyarakat` (`id_masyarakat`),
  CONSTRAINT `id_instanse` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`),
  CONSTRAINT `id_masyarakat` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakat` (`id_masyarakat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `aduan` */

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `instansi` */

/*Table structure for table `jenis_aduan` */

DROP TABLE IF EXISTS `jenis_aduan`;

CREATE TABLE `jenis_aduan` (
  `id_jenis` varchar(7) NOT NULL,
  `jenis_aduan` varchar(15) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `jenis_aduan` */

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
  PRIMARY KEY (`id_masyarakat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `masyarakat` */

insert  into `masyarakat`(`id_masyarakat`,`nik`,`nama`,`alamat`,`no_telp`,`username`,`password`) values 
(2,'123','admin','admin','123','admin','admin');

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
  PRIMARY KEY (`id_pegawai`),
  KEY `id_instansi` (`id_instansi`),
  CONSTRAINT `id_instansi` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pegawai` */

/*Table structure for table `status_aduan` */

DROP TABLE IF EXISTS `status_aduan`;

CREATE TABLE `status_aduan` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `id_keterangan_status` int(11) DEFAULT NULL,
  `id_aduan` int(11) DEFAULT NULL,
  `catatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_status`),
  KEY `id_aduan_status` (`id_aduan`),
  CONSTRAINT `id_aduan_status` FOREIGN KEY (`id_aduan`) REFERENCES `aduan` (`id_aduan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `status_aduan` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
