-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2021 at 10:05 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `esemka`
--

-- --------------------------------------------------------

--
-- Table structure for table `angkatan`
--

CREATE TABLE IF NOT EXISTS `angkatan` (
  `id_angkatan` int(11) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angkatan`
--

INSERT INTO `angkatan` (`id_angkatan`, `tahun`) VALUES
(1, 2020),
(2, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `id`, `keterangan`) VALUES
(1, 0, 'Teknik Komputer dan Jaringan'),
(2, 0, 'Multimedia'),
(3, 0, 'Rekayasa Perangkat Lunak'),
(4, 29, 'Animasi'),
(5, 0, 'Teknik Kendaraan Ringan'),
(6, 0, 'Teknik Sepeda Motor'),
(7, 0, 'Teknik Otomasi Industri'),
(8, 0, 'Teknik Pendingin dan Tata Udara'),
(9, 0, 'Akutansi Perbankan'),
(10, 12, 'Perbankan Syariah');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `id_jurusan` int(11) NOT NULL,
  `id_tahun_ajar` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_jurusan`, `id_tahun_ajar`, `id`, `keterangan`) VALUES
(1, 1, 1, 0, 'X'),
(2, 1, 1, 0, 'XI'),
(3, 1, 1, 0, 'XII'),
(4, 2, 1, 0, 'X'),
(5, 2, 1, 0, 'XI'),
(6, 2, 1, 0, 'XII'),
(7, 3, 1, 0, 'X'),
(8, 3, 1, 0, 'XI'),
(9, 3, 1, 0, 'XII'),
(10, 4, 1, 29, 'X'),
(11, 4, 1, 0, 'XI'),
(12, 4, 1, 0, 'XII'),
(13, 5, 1, 0, 'X'),
(14, 5, 1, 0, 'XI'),
(15, 5, 1, 0, 'XII'),
(16, 6, 1, 0, 'X'),
(17, 6, 1, 0, 'XI'),
(18, 6, 1, 0, 'XII'),
(19, 7, 1, 0, 'X'),
(20, 7, 1, 0, 'XI'),
(21, 7, 1, 0, 'XII'),
(22, 8, 1, 0, 'X'),
(23, 8, 1, 0, 'XI'),
(24, 8, 1, 0, 'XII'),
(25, 9, 1, 0, 'X'),
(26, 9, 1, 0, 'XI'),
(27, 9, 1, 0, 'XII'),
(28, 10, 1, 0, 'X'),
(29, 10, 1, 12, 'XI'),
(30, 10, 1, 0, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `kd_level` int(11) NOT NULL,
  `keterangan` varchar(60) NOT NULL,
  PRIMARY KEY (`kd_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`kd_level`, `keterangan`) VALUES
(1, 'Administrator'),
(2, 'Staff Kurikulum'),
(3, 'Guru'),
(6, 'Kepala Sekolah'),
(7, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE IF NOT EXISTS `mata_pelajaran` (
  `id_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(50) NOT NULL,
  `jenis_mapel` varchar(50) NOT NULL,
  `kurikulum` varchar(5) NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mapel`, `nama_mapel`, `jenis_mapel`, `kurikulum`) VALUES
(1, 'Matematika', 'Umum', '2013'),
(2, 'Animasi 3 Dimensi', '4', '2013'),
(4, 'Animasi 2 Dimensi', '4', '2013'),
(6, 'Videgrafi', '4', '2013');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_magang`
--

CREATE TABLE IF NOT EXISTS `nilai_magang` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `alamat_magang` text NOT NULL,
  `lama_magang` int(11) NOT NULL,
  `nilai_magang` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mapel`
--

CREATE TABLE IF NOT EXISTS `nilai_mapel` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengajaran` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `penilaian` text NOT NULL,
  `nilai_pengetahuan` text NOT NULL,
  `nilai_keterampilan` text NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pengajaran`
--

CREATE TABLE IF NOT EXISTS `pengajaran` (
  `id_pengajaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kkm` int(11) NOT NULL,
  PRIMARY KEY (`id_pengajaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pengajaran`
--

INSERT INTO `pengajaran` (`id_pengajaran`, `id_mapel`, `id`, `id_kelas`, `kkm`) VALUES
(1, 4, 29, 10, 80),
(2, 2, 29, 11, 88),
(3, 1, 11, 25, 78);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nisn` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_angkatan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `wali` varchar(50) NOT NULL,
  `no_telp_wali` varchar(13) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `alamat_wali` text NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id_siswa`),
  UNIQUE KEY `nisn` (`nisn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama`, `id_angkatan`, `id_kelas`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `wali`, `no_telp_wali`, `alamat_siswa`, `alamat_wali`, `foto`) VALUES
(4, 'siswa1', 'nama siswa1', 1, 1, 'dimana', '1111-01-01', 'Laki-laki', 'wali siswa1', '05051505050', 'alamat siswa1', 'alamat wali1', 'default.png'),
(6, 'siswa2', 'siswa2', 2, 1, 'Pekanbaru', '2020-10-30', 'Laki-laki', '131313', '05051505050', 'alamat siswa1asdasd', 'alamat wali', 'siswa2Screenshot_26.png'),
(10, 'siswaanimasi1', 'siswaanimasi1', 1, 10, 'tempat siswa', '2019-11-27', 'Laki-laki', 'wali siswaanimasi', '4152158518', 'alamat siswaanimasi1', 'alamat wali siswaanimasi1', 'default.png'),
(11, 'siswaanimasi2', 'siswaanimasi2', 1, 10, 'tempat siswa', '2020-12-31', 'Laki-laki', 'wali siswaanimasi2', '956131895165', 'alamat siswaanimasi2', 'alamat wali siswaanimasi2', 'default.png'),
(14, 'asdasdasdqwe', 'eqwqweqwe', 1, 10, 'qweasdqwer', '2020-12-31', 'Laki-laki', 'asdasdsad', '02152151', 'asdasdwqeqw ', 'qwe qweasdqwe', 'default.png'),
(16, 'siswaanimasi3', 'siswaanimasi3', 1, 10, 'dimana', '2019-10-30', 'Laki-laki', 'wqeqweqwe', '58828', 'asdkaskdjk', '8asdgyugfsad', 'default.png'),
(17, 'siswaanimasi4', 'siswaanimasi4', 1, 10, 'Pekanbaru', '2020-12-31', 'Laki-laki', '28282eqe', '5555', 'adsewqeqesad', 'daseqwe', 'default.png'),
(18, 'siswaanimasi5', 'siswaanimasi5', 1, 10, 'Pekanbaru', '2020-12-31', 'Perempuan', 'eeqweqd', '05051505050', 'sdsdfdsfdsfwer', 'rwerwerwer', 'default.png'),
(19, 'siswaanimasi6', 'siswaanimasi6', 1, 10, 'Pekanbaru', '2020-12-31', 'Perempuan', '2828232', '22222', 'wqesad qweqwe', 'asdwqeqwe', 'default.png'),
(20, 'siswaanimasi7', 'siswaanimasi7', 2, 10, 'dimana', '2003-05-29', 'Laki-laki', 'asdwlwl', '04984984', 'asdwqlkelsakmd', 'asdweawsad', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajar`
--

CREATE TABLE IF NOT EXISTS `tahun_ajar` (
  `id_tahun_ajar` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_tahun_ajar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tahun_ajar`
--

INSERT INTO `tahun_ajar` (`id_tahun_ajar`, `keterangan`) VALUES
(1, '2018/2019'),
(2, '2019/2020\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pass` text NOT NULL,
  `pass_asli` varchar(25) NOT NULL,
  `kd_level` int(11) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `foto` text NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(25) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nip`, `nama`, `pass`, `pass_asli`, `kd_level`, `tgl_daftar`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
(1, 'admin', 'admin', 'b981aea50c05c75329768a8832e9e82a', 'admin', 1, '2019-12-04', 'adminfoto.jpg', 'dimana', '1999-02-11', 'Islam', 'Laki-laki', 'Jl. limbungan', '08888558'),
(2, 'admin2', 'admin2', 'b981aea50c05c75329768a8832e9e82a', 'admin', 1, '2019-12-04', 'default.png', '', '0000-00-00', '', 'Laki-laki', '', ''),
(10, 'kurikulum', 'kurikulum', '78593199a6892122782df3ae52aa04e8', 'kurikulum', 2, '2019-12-04', 'kurikulumScreenshot_15.png', 'dimana', '1992-11-17', 'Islam', 'Laki-laki', '', ''),
(11, 'guru1', 'guru1', '7dacb253d89dd4200e1525ca072ff1f1', 'guru1', 3, '2020-01-15', 'default.png', '', '0000-00-00', '', 'Laki-laki', '', ''),
(12, 'guru2', 'guru2', '6c318458b8b69045d25d6b2e8d74eda1', 'guru2', 3, '2020-01-15', 'default.png', '', '0000-00-00', '', 'Laki-laki', '', ''),
(13, 'guru3', 'guru3', '36cc0cdc7eef700eeab142655814ec36', 'guru3', 3, '2020-01-15', 'default.png', '', '0000-00-00', '', 'Laki-laki', '', ''),
(14, 'guru5', 'guru5', 'ad694dc5217148aa59ad3fbb8854375d', 'guru5', 3, '2020-01-15', 'default.png', '', '0000-00-00', '', 'Laki-laki', '', ''),
(20, 'siswa1', 'nama siswa1', '0c36a0deb2fd66f50e96f7b74263f3c5', 'siswa1', 7, '2020-03-08', 'default.png', 'dimana', '1111-01-01', '', 'Laki-laki', 'alamat siswa1', '05051505050'),
(28, 'siswa2', 'siswa2', '8d2999d96f59ba4b019d28c640b19b56', 'siswa2', 7, '2020-03-08', 'siswa2Screenshot_26.png', 'Pekanbaru', '2020-10-30', '', 'Laki-laki', 'alamat siswa1asdasd', '05051505050'),
(29, 'aryo', 'Aryo Isnan', '95a34f4ef58784eac1c69a1bee94c14b', 'aryo', 3, '2020-03-15', 'default.png', '', '0000-00-00', '', 'Laki-laki', '', ''),
(30, 'guru', 'guru', '7dca42e6908341c2b94f9fcf72480fd9', 'guru', 3, '2020-04-07', 'default.png', '', '0000-00-00', '', 'Laki-laki', '', ''),
(34, 'siswaanimasi1', 'siswaanimasi1', '8cd43084b5dedc833dbeaae298aeef92', 'siswaanimasi1', 7, '2020-04-09', 'default.png', 'tempat siswa', '2019-11-27', '', 'Laki-laki', 'alamat siswaanimasi1', '4152158518'),
(35, 'siswaanimasi2', 'siswaanimasi2', 'ac76f7849e9a8fcd4ae9f0f1180a2d8c', 'siswaanimasi2', 7, '2020-04-09', 'default.png', 'tempat siswa', '2020-12-31', '', 'Laki-laki', 'alamat siswaanimasi2', '956131895165'),
(38, 'asdasdasdqwe', 'eqwqweqwe', '148ce368f6997ff0231fc42fce6b6ef5', 'asdasdasdqwe', 7, '2020-04-09', 'default.png', 'qweasdqwer', '2020-12-31', '', 'Laki-laki', 'asdasdwqeqw ', '02152151'),
(40, 'siswaanimasi3', 'siswaanimasi3', '29bcf7ed9e4a78150637325ddb91c7f1', 'siswaanimasi3', 7, '2020-04-09', 'default.png', 'dimana', '2019-10-30', '', 'Laki-laki', 'asdkaskdjk', '58828'),
(41, 'siswaanimasi4', 'siswaanimasi4', '959345b59ada8920e53e159922292d71', 'siswaanimasi4', 7, '2020-04-11', 'default.png', 'Pekanbaru', '2020-12-31', '', 'Laki-laki', 'adsewqeqesad', '5555'),
(42, 'siswaanimasi5', 'siswaanimasi5', '6f63b721152b1e3e86fa974dafa1d968', 'siswaanimasi5', 7, '2020-04-11', 'default.png', 'Pekanbaru', '2020-12-31', '', 'Perempuan', 'sdsdfdsfdsfwer', '05051505050'),
(43, 'siswaanimasi6', 'siswaanimasi6', 'b3aeb3e0395c2abffd90c84ccf1e4d13', 'siswaanimasi6', 7, '2020-04-11', 'default.png', 'Pekanbaru', '2020-12-31', '', 'Perempuan', 'wqesad qweqwe', '22222'),
(44, 'kepsek', 'kepsek', 'aea587207fb8782d4bc5565793176198', 'kepsek', 6, '2020-05-10', 'default.png', '', '0000-00-00', '', 'Laki-laki', '', ''),
(45, 'siswaanimasi7', 'siswaanimasi7', '0050093d2bf0457e6d43e839c6f5fa99', 'siswaanimasi7', 7, '2020-06-28', 'default.png', 'dimana', '2003-05-29', '', 'Laki-laki', 'asdwqlkelsakmd', '04984984');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
