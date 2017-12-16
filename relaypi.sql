-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2017 pada 09.27
-- Versi Server: 5.6.11
-- Versi PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `relaypi`
--
CREATE DATABASE IF NOT EXISTS `relaypi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `relaypi`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aktif` int(1) NOT NULL DEFAULT '0',
  `profil` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `mode` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `aktif`, `profil`, `keterangan`, `mode`) VALUES
(1, 1, 'Mesin AB', 'Nyala 5 Menit', '1'),
(2, 0, 'Mesin BC', 'Nyala Sesuai Jadwal', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `relay`
--

CREATE TABLE IF NOT EXISTS `relay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_relay` varchar(50) DEFAULT NULL,
  `pin_relay` varchar(50) DEFAULT NULL,
  `status_relay` int(1) NOT NULL DEFAULT '0',
  `ket` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `relay`
--

INSERT INTO `relay` (`id`, `nama_relay`, `pin_relay`, `status_relay`, `ket`) VALUES
(1, 'Relay 1', '14', 0, NULL),
(2, 'Relay 2', '15', 0, NULL),
(3, 'Relay 3', '18', 0, NULL),
(4, 'Relay 4', '23', 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu`
--

CREATE TABLE IF NOT EXISTS `waktu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `awal` datetime DEFAULT NULL,
  `akhir` datetime DEFAULT NULL,
  `interval` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `profil_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_waktu_profil` (`profil_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `waktu`
--

INSERT INTO `waktu` (`id`, `awal`, `akhir`, `interval`, `status`, `profil_id`) VALUES
(1, '2017-11-22 02:03:45', '2017-11-22 02:35:52', NULL, 1, 1),
(2, '2017-11-22 01:48:22', '2017-11-22 22:48:32', NULL, 0, 1);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `waktu`
--
ALTER TABLE `waktu`
  ADD CONSTRAINT `FK_waktu_profil` FOREIGN KEY (`profil_id`) REFERENCES `profil` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
