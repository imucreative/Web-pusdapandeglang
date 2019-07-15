
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 27 Sep 2016 pada 06.56
-- Versi Server: 10.0.20-MariaDB
-- Versi PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `u385330441_pusda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `idBuku` varchar(20) NOT NULL,
  `tglInput` date NOT NULL,
  `idPegawai` varchar(20) NOT NULL,
  `judulBuku` varchar(50) NOT NULL,
  `deskripsiBuku` text NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `idKategori` varchar(20) NOT NULL,
  `jumlahBuku` int(3) NOT NULL,
  `rak` varchar(5) NOT NULL,
  `fotoCover` varchar(500) NOT NULL,
  `softBuku` varchar(500) NOT NULL,
  `statusDelete` int(1) NOT NULL,
  PRIMARY KEY (`idBuku`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`idBuku`, `tglInput`, `idPegawai`, `judulBuku`, `deskripsiBuku`, `pengarang`, `penerbit`, `idKategori`, `jumlahBuku`, `rak`, `fotoCover`, `softBuku`, `statusDelete`) VALUES
('BK16/03/000000000001', '2016-03-02', 'PEG16/03/00000000003', 'YII Framework Menguasai Framework php', 'YII Framework Menguasai Framework php untuk menjadi mastering framework yang sedang tenar di kalangan para programmer', 'Sharivee', 'Lokomedia', 'KAT16/02/00000000001', 6, '-', 'small-yii.jpg', 'Prakt Modul PHP 7.pdf', 0),
('BK16/03/000000000002', '2016-03-02', 'PEG16/02/00000000001', 'Matematika Konsep dan Aplikasinya', 'Matematika membuat pintar Berhitung', '-', '-', 'KAT16/02/00000000003', 11, '-', 'kelas-8.jpg', '', 0),
('BK16/03/000000000003', '2016-03-03', 'PEG16/03/00000000003', 'Pintar Bahasa Inggris', 'Buku Saku Belajar Bahasa Inggris SD', '-', '-', 'KAT16/02/00000000002', 0, '-', 'Buku Saku Pintar Bahasa Inggris SD Kelas 4, 5, & 6m.gif', 'anon-phpmysql.pdf', 0),
('BK16/03/000000000004', '2016-03-05', 'PEG16/02/00000000002', 'Reporting Service SQL Server 2005', 'Membuat Aplikasi Reporting Service dengan SQL Server 2005', '-', 'Winpec Solution', 'KAT16/02/00000000001', 9, '-', 'ID_EMK2013MTH07MARSDSS_B.jpg', 'Cisco[1].Press.Internetworking.Troubleshooting.Handbook.pdf', 0),
('BK16/03/000000000005', '2016-03-14', 'PEG16/02/00000000002', 'Jangan Biarkan Puasa Anda sia-sia', 'Jangan Biarkan Puasa Anda sia-sia', 'Abitama', '-', 'KAT16/02/00000000004', 2, '-', 'backup_of_jangan-biarkan-puasa-anda-siasia-fix.jpg', '', 0),
('BK16/03/000000000006', '2016-03-14', 'PEG16/02/00000000002', 'Belajar Photoshop CS5', 'Belajar Photoshop CS5', 'Haidi', '-', 'KAT16/02/00000000001', 4, '-', 'coverbuku.jpg', '', 0),
('BK16/03/000000000007', '2016-03-14', 'PEG16/02/00000000002', 'Bahasa Indonesia untuk SD Kelas1', 'Bahasa Indonesia untuk SD Kelas1', '-', '-', 'KAT16/02/00000000002', 0, '-', 'bahasaindonesiaUmri.jpg', '', 0),
('BK16/03/000000000008', '2016-03-14', 'PEG16/02/00000000002', 'Teori Ekonomi Mikro', 'Teori Ekonomi Mikro konsep dan Realita', '-', '-', 'KAT16/03/00000000008', 8, '-', 'cover-buku-te-mikro-01.jpg', '', 0),
('BK16/03/000000000009', '2016-03-14', 'PEG16/02/00000000002', 'MS Word 2010', 'MS Word 2010', 'Catur Hadi Purnomo', '-', 'KAT16/02/00000000001', 6, '-', 'buku-panduan-tutorial-belajar-microsoft-office-word-2010.jpg', '', 0),
('BK16/03/000000000010', '2016-03-14', 'PEG16/02/00000000002', 'Sistem Komputer', 'Sistem Komputer', 'Abd Samad Hanif', '-', 'KAT16/02/00000000001', 1, '-', 'Sistem Komputer.jpg', '', 0),
('BK16/03/000000000011', '2016-03-14', 'PEG16/02/00000000002', 'Artificial Intelegent', 'Artificial Intelegent', '-', '-', 'KAT16/02/00000000001', 6, '-', 'ai.jpg', '', 0),
('BK16/03/000000000012', '2016-03-14', 'PEG16/02/00000000002', 'Langkah Mudah Jaringan Komputer', 'Langkah Mudah Jaringan Komputer', 'Zaenal Arifin', '-', 'KAT16/02/00000000001', 8, '-', 'langkah-mudah-jarkom.jpg', '', 0),
('BK16/03/000000000013', '2016-03-14', 'PEG16/02/00000000002', 'Sistemm Operasi', 'Sistem Operasi Teknologi Informasi dan Komunikasi', '-', '-', 'KAT16/02/00000000001', 5, '-', 'Sistem_Operasi_X.jpg', '', 0),
('BK16/03/000000000014', '2016-03-14', 'PEG16/02/00000000002', 'Kreasi Efek Teks dengan Corel Draw dan Photoshop', 'Kreasi Efek Teks dengan Corel Draw dan Photoshop', 'Catur Hadi Purnomo', '-', 'KAT16/02/00000000001', 5, '-', 'kreasi Efek Teks dengan corel Draw dan Photoshop.jpg', '', 0),
('BK16/03/000000000015', '2016-03-14', 'PEG16/02/00000000002', 'Membuat Database dengan MS Access', 'Membuat Database dengan MS Access', '-', '-', 'KAT16/02/00000000001', 19, '-', 'Membuat Database dengan MS Access.jpg', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoribuku`
--

CREATE TABLE IF NOT EXISTS `kategoribuku` (
  `idKategori` varchar(20) NOT NULL,
  `namaKategori` varchar(50) NOT NULL,
  `statusDelete` int(1) NOT NULL,
  PRIMARY KEY (`idKategori`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategoribuku`
--

INSERT INTO `kategoribuku` (`idKategori`, `namaKategori`, `statusDelete`) VALUES
('KAT16/02/00000000001', 'Komputer', 0),
('KAT16/02/00000000002', 'Sastra', 0),
('KAT16/02/00000000003', 'Matematika', 0),
('KAT16/02/00000000004', 'Agama', 0),
('KAT16/02/00000000005', 'Sosial', 0),
('KAT16/02/00000000006', 'Fisika', 0),
('KAT16/02/00000000007', 'Geologi', 0),
('KAT16/03/00000000008', 'Ekonomi', 0),
('KAT16/03/00000000009', 'Seni dan Budaya', 0),
('KAT16/03/00000000010', 'Musik', 0),
('KAT16/03/00000000011', 'PKN', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `idMember` varchar(20) NOT NULL,
  `tglRegister` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `namaMember` varchar(50) NOT NULL,
  `alamatMember` text NOT NULL,
  `tlpMember` varchar(50) NOT NULL,
  `pinBbm` varchar(10) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `noKtpMember` varchar(20) NOT NULL,
  `fotoMember` varchar(500) NOT NULL,
  `statusDelete` int(1) NOT NULL,
  PRIMARY KEY (`idMember`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`idMember`, `tglRegister`, `username`, `password`, `namaMember`, `alamatMember`, `tlpMember`, `pinBbm`, `facebook`, `twitter`, `noKtpMember`, `fotoMember`, `statusDelete`) VALUES
('MEM16/03/00000000001', '2016-03-02', 'jack', 'WVcxR2FtRjNQVDA9', 'Jack Ma', 'JL. KH. Tb. Abdul Halim, No. 1, Pandeglang', '-', '-', '-', '-', '-', '001320d123a10be1e31e3b.jpg', 0),
('MEM16/03/00000000002', '2016-03-02', 'torfald', 'WkVjNWVWcHRSbk5hUVQwOQ==', 'Linus Torfald', 'Jakarta', '-', '-', '-', '-', '-', 'Linus_Torvalds_(cropped).jpg', 0),
('MEM16/03/00000000003', '2016-03-03', 'gate', 'V2pKR01GcFJQVDA9', 'Bill Gate', 'Jakarta', '-', '-', '-', '-', '-', 'billG.jpg', 0),
('MEM16/03/00000000004', '2016-03-24', 'faisal', 'V20xR2NHTXlSbk09', 'Faisal Y', '', '', '', '', '', '', '', 0),
('MEM16/07/00000000005', '2016-07-21', 'ojan', 'WWpKd2FHSm5QVDA9', 'Ojan Saputra', '', '', '', '', '', '', '', 0),
('MEM16/07/00000000006', '2016-07-21', '123', 'VFZSSmVnPT0=', '123', '', '', '', '', '', '', '', 1),
('MEM16/07/00000000007', '2016-07-21', 'user', 'WkZoT2JHTm5QVDA9', 'Super User', '', '', '', '', '', '', '', 0),
('MEM16/08/00000000008', '2016-08-29', 'aku', 'V1ZkME1RPT0=', 'Aku', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `idPegawai` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `namaPegawai` varchar(50) NOT NULL,
  `alamatPegawai` text NOT NULL,
  `telpPegawai` varchar(20) NOT NULL,
  `level` varchar(50) NOT NULL,
  `statusDelete` int(1) NOT NULL,
  PRIMARY KEY (`idPegawai`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `username`, `password`, `namaPegawai`, `alamatPegawai`, `telpPegawai`, `level`, `statusDelete`) VALUES
('PEG16/02/00000000001', 'operator2', 'WWpOQ2JHTnRSakJpTTBsNQ==', 'Operator Dua', 'Serang Kabupaten', '-', 'Operator', 0),
('PEG16/02/00000000002', 'admin', 'V1ZkU2RHRlhOWEJqTTFKNVdWaFNkbU5uUFQwPQ==', 'Administrator System', 'Serang aja', '07771019854', 'Administrator', 0),
('PEG16/03/00000000003', 'operator1', 'WWpOQ2JHTnRSakJpTTBsNA==', 'Operator Satu', 'Serang Kota', '-', 'Operator', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE IF NOT EXISTS `pinjam` (
  `idPinjam` varchar(20) NOT NULL,
  `tglPinjam` date NOT NULL,
  `idMember` varchar(20) NOT NULL,
  `jaminan` varchar(50) NOT NULL,
  `tglPengembalian` date NOT NULL,
  `tglDikembalikan` date NOT NULL,
  `tglCancel` date NOT NULL,
  `denda` int(11) NOT NULL,
  `statusPengembalian` int(1) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`idPinjam`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`idPinjam`, `tglPinjam`, `idMember`, `jaminan`, `tglPengembalian`, `tglDikembalikan`, `tglCancel`, `denda`, `statusPengembalian`, `keterangan`) VALUES
('PIN16/03/00000000001', '2016-03-24', 'MEM16/03/00000000003', 'KTP', '2016-03-27', '2016-03-31', '0000-00-00', 20000, 2, ''),
('PIN16/03/00000000002', '2016-03-24', 'MEM16/03/00000000004', 'Kartu Siswa', '2016-03-26', '2016-03-24', '0000-00-00', 0, 2, ''),
('PIN16/03/00000000003', '2016-03-24', 'MEM16/03/00000000001', 'Kartu Osis', '2016-03-26', '0000-00-00', '0000-00-00', 0, 1, ''),
('PIN16/03/00000000004', '2016-03-24', 'MEM16/03/00000000004', 'Kartu  Keluarga', '2016-03-28', '0000-00-00', '2016-03-24', 0, 2, 'Cancel Pinjam'),
('PIN16/03/00000000005', '2016-03-24', 'MEM16/03/00000000002', 'KTP dan Uang 50000', '2016-03-29', '0000-00-00', '0000-00-00', 0, 1, ''),
('PIN16/03/00000000006', '2016-03-31', 'MEM16/03/00000000003', 'KTP', '2016-04-01', '0000-00-00', '0000-00-00', 0, 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjambanyakbuku`
--

CREATE TABLE IF NOT EXISTS `pinjambanyakbuku` (
  `idPinjamBanyakBuku` varchar(20) NOT NULL,
  `idPinjam` varchar(20) NOT NULL,
  `idBuku` varchar(20) NOT NULL,
  `statusDelete` int(1) NOT NULL,
  PRIMARY KEY (`idPinjamBanyakBuku`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjambanyakbuku`
--

INSERT INTO `pinjambanyakbuku` (`idPinjamBanyakBuku`, `idPinjam`, `idBuku`, `statusDelete`) VALUES
('PINBNY16/03/00000001', 'PIN16/03/00000000001', 'BK16/03/000000000008', 0),
('PINBNY16/03/00000002', 'PIN16/03/00000000001', 'BK16/03/000000000002', 0),
('PINBNY16/03/00000003', 'PIN16/03/00000000002', 'BK16/03/000000000001', 0),
('PINBNY16/03/00000004', 'PIN16/03/00000000002', 'BK16/03/000000000012', 0),
('PINBNY16/03/00000005', 'PIN16/03/00000000002', 'BK16/03/000000000001', 0),
('PINBNY16/03/00000006', 'PIN16/03/00000000003', 'BK16/03/000000000005', 0),
('PINBNY16/03/00000007', 'PIN16/03/00000000003', 'BK16/03/000000000001', 0),
('PINBNY16/03/00000008', 'PIN16/03/00000000004', 'BK16/03/000000000014', 1),
('PINBNY16/03/00000009', 'PIN16/03/00000000005', 'BK16/03/000000000009', 0),
('PINBNY16/03/00000010', 'PIN16/03/00000000005', 'BK16/03/000000000006', 0),
('PINBNY16/03/00000011', 'PIN16/03/00000000006', 'BK16/03/000000000014', 0),
('PINBNY16/03/00000012', 'PIN16/03/00000000006', 'BK16/03/000000000010', 0),
('PINBNY16/03/00000013', 'PIN16/03/00000000006', 'BK16/03/000000000015', 0),
('PINBNY16/03/00000014', 'PIN16/03/00000000006', 'BK16/03/000000000004', 0),
('PINBNY16/03/00000015', 'PIN16/03/00000000006', 'BK16/03/000000000006', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjamtemp`
--

CREATE TABLE IF NOT EXISTS `pinjamtemp` (
  `idPinjamTemp` int(11) NOT NULL AUTO_INCREMENT,
  `idBuku` varchar(20) NOT NULL,
  `idMember` varchar(20) NOT NULL,
  PRIMARY KEY (`idPinjamTemp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `pinjamtemp`
--

INSERT INTO `pinjamtemp` (`idPinjamTemp`, `idBuku`, `idMember`) VALUES
(15, 'BK16/03/000000000008', 'MEM16/03/00000000003'),
(14, 'BK16/03/000000000015', 'MEM16/03/00000000003');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
