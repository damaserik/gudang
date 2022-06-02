/*
SQLyog Ultimate v9.50 
MySQL - 5.7.10-log : Database - gudang
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`gudang` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `gudang`;

/*Table structure for table `dtl_nota` */

DROP TABLE IF EXISTS `dtl_nota`;

CREATE TABLE `dtl_nota` (
  `id_dtl` int(11) NOT NULL AUTO_INCREMENT,
  `id_nota` varchar(25) DEFAULT NULL,
  `nama_brg` varchar(100) DEFAULT NULL,
  `sat1` varchar(45) DEFAULT NULL,
  `sat2` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_dtl`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `dtl_nota` */

insert  into `dtl_nota`(`id_dtl`,`id_nota`,`nama_brg`,`sat1`,`sat2`) values (3,'NT20090002','Kain Prima Elar A','14 Box = 350 Pin','12.550,- Yds'),(4,'NT20090002','Kain Prima Elar A C.2','14 Box = 350 Pin','12.550,- Yds'),(5,'NT20090002','Kain Prima Elar P.13','15 Box = 375 Pin','13.875,- Yds'),(6,'NT20090003','Kain Kafan','10 Bgr','12.550,- Yds'),(7,'NT20090003','Kain Kafan Premium','10 Bgr','12.550,- Yds'),(8,'NT20090003','Kain Kafan Premium Polkadot','10 Bgr','12.550,- Yds'),(9,'NT20090003','Kain Kafan Motif Bunga','10 Bgr','12.550,- Yds');

/*Table structure for table `dtl_nota_hapus` */

DROP TABLE IF EXISTS `dtl_nota_hapus`;

CREATE TABLE `dtl_nota_hapus` (
  `id_dtl` int(11) NOT NULL AUTO_INCREMENT,
  `id_nota` varchar(25) DEFAULT NULL,
  `nama_brg` varchar(100) DEFAULT NULL,
  `sat1` varchar(45) DEFAULT NULL,
  `sat2` varchar(45) DEFAULT NULL,
  `tgl_perubahan` datetime DEFAULT NULL,
  PRIMARY KEY (`id_dtl`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `dtl_nota_hapus` */

insert  into `dtl_nota_hapus`(`id_dtl`,`id_nota`,`nama_brg`,`sat1`,`sat2`,`tgl_perubahan`) values (1,'NT20090001','Kain Kafan','45 BOX','125.000,- Yds','2020-09-11 08:12:23'),(2,'NT20090001','Kain Kafan Premium','22 Box','70.000,- Yds','2020-09-11 08:12:23');

/*Table structure for table `nota_barang_keluar` */

DROP TABLE IF EXISTS `nota_barang_keluar`;

CREATE TABLE `nota_barang_keluar` (
  `id_nota` varchar(10) NOT NULL,
  `nomor` varchar(25) DEFAULT NULL,
  `tujuan` text,
  `order_penj` varchar(100) DEFAULT NULL,
  `tgl_order` date DEFAULT NULL,
  `ket` text,
  `tgl_nota` date DEFAULT NULL,
  PRIMARY KEY (`id_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `nota_barang_keluar` */

insert  into `nota_barang_keluar`(`id_nota`,`nomor`,`tujuan`,`order_penj`,`tgl_order`,`ket`,`tgl_nota`) values ('NT20090002','452/CK/GD/VIII/2020','Bapak Loetfy Attuwy\r\nManyar Kertoarjo 1/12 RT.001 RW.006\r\nManyarsabrangan Mulyorejo Surabaya','452/CK/VIII/2020','2020-09-09','Penjualan Barang\r\nDaftar Perincian Terlampir\r\nBarang milik Bapak Loetfy Attuwy\r\nBarang dikirim ke : Bapak Fikri\r\nUD Warna Indah Jl. Panggang No.115 Surabaya','2020-09-09'),('NT20090003','453/CK/GD/VIII/2020','Ibu Katemi\r\nBojong Kenyot','453/CK/VIII/2020','2020-09-11','Barang dikirim ke\r\nIbu Katemi\r\nBojong Kenyot\r\nRincian Terlampir','2020-09-11');

/*Table structure for table `nota_barang_keluar_hapus` */

DROP TABLE IF EXISTS `nota_barang_keluar_hapus`;

CREATE TABLE `nota_barang_keluar_hapus` (
  `id_nota` varchar(10) NOT NULL,
  `nomor` varchar(25) DEFAULT NULL,
  `tujuan` text,
  `order_penj` varchar(100) DEFAULT NULL,
  `tgl_order` date DEFAULT NULL,
  `ket` text,
  `tgl_nota` date DEFAULT NULL,
  `tgl_perubahan` datetime DEFAULT NULL,
  PRIMARY KEY (`id_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `nota_barang_keluar_hapus` */

insert  into `nota_barang_keluar_hapus`(`id_nota`,`nomor`,`tujuan`,`order_penj`,`tgl_order`,`ket`,`tgl_nota`,`tgl_perubahan`) values ('NT20090001','5646/faf/55','Oslo ','5654/fsa/fs/565','2020-09-05','Hasoe Angel','2020-09-05','2020-09-11 08:12:23'),('NT20090003','453/CK/GD/VIII/2020','Ibu Katemi\r\nBojong Kenyot','453/CK/VIII/2020','2020-09-11','Barang dikirim ke\r\nIbu Katemi\r\nBojong Kenyot\r\nRincian Terlampir','2020-09-11','2020-09-11 11:27:56');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `hak_akses` enum('Admin','Adku','Niaga','Direksi','Super Admin','') DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id_user`,`username`,`password`,`hak_akses`) values (1,'Erik','12','Niaga'),(2,'Candra','can','Super Admin'),(3,'cak','1','Admin'),(4,'cuk','2','Direksi'),(5,'coy','3','Adku');

/* Trigger structure for table `dtl_nota` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `dtl_nota_hapus` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `dtl_nota_hapus` AFTER DELETE ON `dtl_nota` FOR EACH ROW BEGIN
 INSERT INTO dtl_nota_hapus
 (id_dtl,id_nota,nama_brg,sat1,sat2,tgl_perubahan)
 VALUES
 (OLD.id_dtl,OLD.id_nota,OLD.nama_brg,OLD.sat1,OLD.sat2,SYSDATE());
    END */$$


DELIMITER ;

/* Trigger structure for table `nota_barang_keluar` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `nota_hapus` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `nota_hapus` AFTER DELETE ON `nota_barang_keluar` FOR EACH ROW BEGIN
 INSERT INTO nota_barang_keluar_hapus
 (id_nota,nomor,tujuan,order_penj,tgl_order,ket,tgl_nota,tgl_perubahan)
 VALUES
 (OLD.id_nota,OLD.nomor,OLD.tujuan,OLD.order_penj,OLD.tgl_order,OLD.ket,OLD.tgl_nota,sysdate());
    END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
