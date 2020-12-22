-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Des 2020 pada 07.57
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kmbarang2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbapprove`
--

CREATE TABLE `tbapprove` (
  `idapprove` int(5) NOT NULL,
  `tglapprove` datetime DEFAULT NULL,
  `jenisapprove` enum('Barang','Simip','Tamu') DEFAULT NULL,
  `idtamu` int(6) DEFAULT NULL COMMENT 'jika tamu yang masuk',
  `idpengiriman` int(6) DEFAULT NULL COMMENT 'jika pengiriman barang',
  `idsimip` int(6) DEFAULT NULL COMMENT 'jika tamu simip',
  `idkeluar` int(6) DEFAULT NULL COMMENT 'jika keluar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbapprove`
--

INSERT INTO `tbapprove` (`idapprove`, `tglapprove`, `jenisapprove`, `idtamu`, `idpengiriman`, `idsimip`, `idkeluar`) VALUES
(1, '2020-12-10 14:16:15', 'Barang', NULL, 1, NULL, NULL),
(2, '2020-12-10 14:18:11', 'Simip', NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbdetailapprove`
--

CREATE TABLE `tbdetailapprove` (
  `iddetailapprove` int(11) NOT NULL,
  `idapprove` int(11) DEFAULT NULL,
  `idkaryawan` int(11) DEFAULT NULL,
  `idjabatan` int(11) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbdetailapprove`
--

INSERT INTO `tbdetailapprove` (`iddetailapprove`, `idapprove`, `idkaryawan`, `idjabatan`, `urutan`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbdetailpengaturan`
--

CREATE TABLE `tbdetailpengaturan` (
  `iddetailatur` int(5) NOT NULL,
  `idatur` tinyint(2) NOT NULL DEFAULT 0,
  `urutan` tinyint(2) NOT NULL DEFAULT 0,
  `kodejabatan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbdetailpengaturan`
--

INSERT INTO `tbdetailpengaturan` (`iddetailatur`, `idatur`, `urutan`, `kodejabatan`) VALUES
(5, 3, 1, 1),
(6, 3, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbdetailpengiriman`
--

CREATE TABLE `tbdetailpengiriman` (
  `iddetailkirim` int(11) NOT NULL,
  `kodebarang` int(11) NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `idkirim` int(11) NOT NULL,
  `idpengaturan` int(11) NOT NULL,
  `statusbarang` enum('Baru','Dikirim','Diterima','Ditolak') NOT NULL,
  `alasantolak` varchar(50) NOT NULL,
  `fotobarang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbdetailpengiriman`
--

INSERT INTO `tbdetailpengiriman` (`iddetailkirim`, `kodebarang`, `namabarang`, `idkirim`, `idpengaturan`, `statusbarang`, `alasantolak`, `fotobarang`) VALUES
(1, 2, 'Sabun', 1, 1, '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbdetailtamu`
--

CREATE TABLE `tbdetailtamu` (
  `iddetailtamu` int(11) NOT NULL,
  `idtamu` int(11) DEFAULT NULL COMMENT 'Tergantung jenis tamu',
  `jenis` enum('Biasa','Simip','Pengiriman') DEFAULT NULL,
  `namatamu` varchar(50) DEFAULT NULL,
  `notlptamu` varchar(15) DEFAULT NULL,
  `alamattamu` varchar(100) DEFAULT NULL,
  `fototamu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbhak`
--

CREATE TABLE `tbhak` (
  `idhak` int(6) NOT NULL,
  `idjabatan` int(5) DEFAULT NULL,
  `admin` enum('Y','N') DEFAULT NULL,
  `approver` enum('Y','N') DEFAULT NULL,
  `pos` enum('Y','N') DEFAULT NULL,
  `gudang` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbhistorivendor`
--

CREATE TABLE `tbhistorivendor` (
  `idhistoriv` int(5) NOT NULL,
  `kdvendor` int(4) NOT NULL,
  `kdkaryawan` int(3) NOT NULL,
  `tgltt` datetime NOT NULL,
  `alasan` text DEFAULT NULL,
  `status` enum('Terima','Tolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='berisi data histori penerimaan vendor';

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbjabatan`
--

CREATE TABLE `tbjabatan` (
  `idJabatan` tinyint(2) NOT NULL,
  `jabatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbjabatan`
--

INSERT INTO `tbjabatan` (`idJabatan`, `jabatan`) VALUES
(1, 'GENERAL MANAGER UBJOM PLTU PAITON'),
(2, 'MANAJER OPERASI'),
(3, 'SPV SENIOR RENDAL OPERASI'),
(4, 'SPV SENIOR NIAGA & BAHAN BAKAR'),
(5, 'SPV SENIOR KIMIA & LABORATORIUM'),
(6, 'SPV SENIOR PRODUKSI DINAS'),
(10, 'SPV COAL & ASH HANDLING A'),
(11, 'SPV COAL & ASH HANDLING B'),
(12, 'SPV COAL & ASH HANDLING C'),
(13, 'SPV COAL & ASH HANDLING D'),
(14, 'MANAJER PEMELIHARAAN'),
(15, 'SPV SENIOR RENDAL PEMELIHARAAN'),
(16, 'STAFF RENDALHAR'),
(17, 'SPV SENIOR OUTAGE MANAGEMENT'),
(18, 'STAFF OUTAGE'),
(19, 'SPV SENIOR HAR LISTRIK'),
(20, 'SPV SENIOR HAR KONIN'),
(21, 'SPV SENIOR HAR MESIN 1 (B,T & AAB)'),
(22, 'SPV SENIOR HAR MESIN 2 (SIST.BB & ABU)'),
(23, 'SPV SENIOR SARANA'),
(24, 'SPV SENIOR K3'),
(25, 'SPV SENIOR LINGKUNGAN'),
(26, 'MANAJER ENJINERING'),
(27, 'SPV SENIOR SO TURBINE & AUX'),
(28, 'SPV SENIOR SO BOILER & AUX'),
(29, 'SPV SENIOR SO COMMON AUX'),
(30, 'SPV SENIOR CONDITION BASED MAINTENANCE'),
(31, 'SPV SENIOR MANAJEMEN MUTU & RISIKO'),
(32, 'STAF MMR'),
(33, 'MANAJER ADMINISTRASI'),
(34, 'SPV SENIOR KEUANGAN'),
(35, 'SPV SENIOR SDM'),
(36, 'SPV SENIOR UMUM & CSR'),
(37, 'STAFF UMUM & CSR'),
(38, 'MANAJER LOGISTIK'),
(39, 'SPV SENIOR PENGADAAN'),
(40, 'SPV SENIOR ADMIN. GUDANG'),
(41, 'STAFF GUDANG'),
(42, 'SPV SENIOR INVENTORI KTRL & KATALOGER'),
(43, 'DANRU'),
(47, 'PKD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbkaryawan`
--

CREATE TABLE `tbkaryawan` (
  `idKaryawan` int(11) NOT NULL,
  `namaKaryawan` varchar(50) DEFAULT NULL,
  `tlpKaryawan` char(14) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamatKaryawan` tinytext DEFAULT NULL,
  `idJabatan` tinyint(2) DEFAULT NULL,
  `status` enum('Y','N') DEFAULT NULL,
  `android` enum('Y','T') DEFAULT NULL,
  `web` enum('Y','T') DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `ttd` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbkaryawan`
--

INSERT INTO `tbkaryawan` (`idKaryawan`, `namaKaryawan`, `tlpKaryawan`, `email`, `alamatKaryawan`, `idJabatan`, `status`, `android`, `web`, `password`, `ttd`) VALUES
(1, 'JUNAIDI ABDI 1', '08567886641', '7603019JA', 'Paiton', 1, 'Y', 'Y', 'Y', '74553ac5820f21af17fbce4108611d77', NULL),
(2, 'DWI WIDODO', '08123456789', '7093025JA', 'Paiton', 2, 'Y', 'Y', 'Y', '22f13b6ea0330176041137f3be76fbd8', 'TTD20190627101745.png'),
(3, 'INDAR JANUHARTOKO', '08', '7393234JA', 'Paiton', 3, 'Y', 'Y', 'Y', '9a01794bb1e70a55e04d175d1c6a4fd8', NULL),
(4, 'AKHSANUL KHOLIQIN', '08', '7293013JA', 'Paiton', 4, 'Y', 'T', 'Y', '714057d71c8604c44c68e2eb9e52fc4e', NULL),
(5, 'ALI MUSTOFA', '08', '8008041JA', 'Paiton', 5, 'Y', 'T', 'Y', '0b41c6f23a482f687c9c1fb8aea0e833', NULL),
(6, 'YULIAWAN AGUNG WIDIATMOKO', '08', '7494042JA', 'Paiton', 6, 'Y', 'T', 'Y', 'aa05feabbccf8643458cb4be4eae0177', NULL),
(10, 'TITO KURNIAWAN ', '08', '8309051PT', 'Paiton', 10, 'Y', 'T', 'Y', '37ac136c819bb20ba0285c38bd97a1ae', NULL),
(11, 'DEDY PRASETYO', '08', '8110223PT', 'Paiton', 11, 'Y', 'T', 'Y', 'f9304f897e48b7cbcc39d07b3105c983', NULL),
(12, 'SIH NOVAN IRAWAN', '08', '8110329PT', 'Paiton', 12, 'Y', 'T', 'Y', '5bf58ddee96cad684d23d3fc9cdb5332', NULL),
(13, 'ISA CATUR PUTRA', '08', '8410323PT', 'Paiton', 13, 'Y', 'T', 'Y', '1684c63ed415dcbb2e73a56106fec710', NULL),
(14, 'SUYANTO', '08123456789', '6993092JA', 'Paiton', 14, 'Y', 'Y', 'Y', '882167c8940e203d1437c0f8b04aa95c', 'TTD20190627101847.png'),
(15, 'SETYO IRNANTO', '085212345678', '7194040JA', 'Paiton', 15, 'Y', 'Y', 'Y', '9a152f54ccb3c1d248e6e907045e4dfa', NULL),
(16, 'JOKO DWI PRASETYA', '08', '8513013PT', 'Paiton', 16, 'Y', 'T', 'Y', 'c4b435fa02285d1fa4d6517ca04e7031', NULL),
(17, 'HARIYADI BUDIWAN', '085212345678', '8813018PT', 'Paiton', 16, 'Y', 'Y', 'Y', 'd8578edf8458ce06fbc5bb76a58c5ca4', NULL),
(18, 'ARNOLD', '08', '9216108PT', 'Paiton', 16, 'Y', 'T', 'Y', '7ffcf240e83783f120125c3b8680d272', NULL),
(19, 'ENDY FRIYANDI PUTRA', '08', '9216109PT', 'Paiton', 16, 'Y', 'T', 'Y', 'b498c919d5e92a2d6f72ebf7fd75ffcd', NULL),
(20, 'ANDRI PURWASITO', '08', '8310219PT', 'Paiton', 16, 'Y', 'T', 'Y', '1a99be2359a345b3690356cf738c6b7e', NULL),
(21, 'SEPTAFIAN ADHE PERMANA', '08', '8915049PT', 'Paiton', 16, 'Y', 'T', 'Y', 'e42b43a07e6adb301e0ccf4c52db16f2', NULL),
(22, 'SINAR PRASETYASRINI', '08', '8915098PT', 'Paiton', 16, 'Y', 'T', 'Y', '49c5dfe8f8df9f9c67a22a2e55f01a8c', NULL),
(23, 'CHANDRA SAGITA UTAMA', '08', '841510PT', 'Paiton', 16, 'Y', 'T', 'Y', 'dfaa54212bd7d9af2d805d8681f43bd2', NULL),
(24, 'HENDRA GUNAWAN', '08', '8415047PT', 'Paiton', 16, 'Y', 'T', 'Y', '2ab0d72c457fcead39eb15cbceb62892', NULL),
(25, 'BAKIR SANTOSO', '08', '7493003JA', 'Paiton', 17, 'Y', 'T', 'Y', '57c58e7cc39873cf122a8c3f77ce1006', NULL),
(26, 'AGUS ROHMANSYAH', '08', '8510217PT', 'Paiton', 18, 'Y', 'T', 'Y', 'aff60e117b8d746be6779faf3e3b8638', NULL),
(27, 'RADEN SALI FALIANTO', '08', '8716107PT', 'Paiton', 18, 'Y', 'T', 'Y', '134860297b35861ac38023cdde13be2d', NULL),
(28, 'MOCHAMMAD BAMBANG IRAWAN', '08', '9216117PT', 'Paiton', 18, 'Y', 'T', 'Y', '8f9a08e9681ede0a698055fd14c22df7', NULL),
(29, 'EKA ANGGA NOVIANTO', '08', '8513010PT', 'Paiton', 18, 'Y', 'T', 'Y', '84b84e9a9d70449429282b259946ade0', NULL),
(30, 'YOGANTHA ANGGORANDA', '08', '9016115PT', 'Paiton', 18, 'Y', 'T', 'Y', '25b0a2087f30ca9fd39d40ee1060ad6d', NULL),
(31, 'ARIEF SETIABUDI', '08', '8509018JA', 'Paiton', 19, 'Y', 'T', 'Y', '589da8f68636003dbe62fd812787a340', NULL),
(32, 'JOKO PURWANTO', '08', '7494049JA', 'Paiton', 20, 'Y', 'T', 'Y', '0d30f2bfaee50cbd2d89b0e68577a891', NULL),
(33, 'WAWANTO', '08', '7394125JA', 'Paiton', 21, 'Y', 'T', 'Y', 'b7709332d53369a50a70a0c54ed92c91', NULL),
(34, 'BUDI  HARTONO', '08', '7394108JA', 'Paiton', 22, 'Y', 'T', 'Y', 'd65a94d8763145cf3eeb23cb81c81b9b', NULL),
(35, 'HARI SISWANTO', '08', '7293200JA', 'Paiton', 23, 'Y', 'T', 'Y', 'd17556747faf853cb6855f641cb09fb2', NULL),
(36, 'MUHAMMAD RAIZA', '08999970097', '8815079AM', 'Paiton', 24, 'Y', 'Y', 'Y', 'f0a44400958d8161cafe3c6b5e8d3796', NULL),
(37, 'MAYA MAHARANI', '085212345678', '8610055JA', 'Paiton', 25, 'Y', 'Y', 'Y', '0e8b8fad865569d85d79ab2b69e91ba3', NULL),
(38, 'EKO WIJANARTO', '08123456789', '8106126JA', 'Paiton', 26, 'Y', 'Y', 'Y', 'c17b9c741055bbcc4ed4bf5c0b717ba1', 'TTD20190627101821.png'),
(39, 'TRI LEKSONO', '08', '7594121JA', 'Paiton', 27, 'Y', 'T', 'Y', '1ee1c4ac36a7e33baba05618996d49f8', NULL),
(40, 'QOMARI', '08', '7093044JA', 'Paiton', 28, 'Y', 'T', 'Y', '4e7b9cc4925061d14cf8d8fba03bf13a', NULL),
(41, 'HARYANTO', '08', '7394107JA', 'Paiton', 29, 'Y', 'T', 'Y', 'f81eecfb672b921bd0fbc0830c7f7693', NULL),
(42, 'DIDIK SUSANTO', '08', '6893093JA', 'Paiton', 30, 'Y', 'T', 'Y', '811ade3d0450e461d7aa0ef29e70c15f', NULL),
(43, 'FAISAL RIZA', '08', '8108082JA', 'Paiton', 31, 'Y', 'T', 'Y', '175c5c7d789d8e8598f498184c3904cf', NULL),
(44, 'HERI PURNOMO', '08', '8312771PT', 'Paiton', 32, 'Y', 'T', 'Y', '202cb962ac59075b964b07152d234b70', NULL),
(45, 'AKHMAD SYAKIR', '08', '9214080TA', 'Paiton', 32, 'Y', 'T', 'Y', 'af0b22c7724a5a468fc8d52a41ca860e', NULL),
(46, 'SAMSUL EFENDI', '089876557886', '6787013JA', 'Paiton', 33, 'Y', 'Y', 'Y', 'd96254236c7212ef8ef453d5e9ce0e92', 'TTD20190624124339.jpeg'),
(47, 'CITRA MASHITA', '08', '8511082JA', 'Paiton', 34, 'Y', 'T', 'Y', '63a244ca117aafcd14efad263e11ead0', NULL),
(48, 'SARIFUDIN', '08', '7293024JA', 'Paiton', 35, 'Y', 'T', 'Y', '0acbea128e90999d344af78fb27244d2', NULL),
(49, 'SUKRISNO', '089876557886', '6993230JA', 'Paiton', 36, 'Y', 'Y', 'Y', 'd5a6f9db283aab0c3a93bae40aaa86a7', 'TTD20190624124445.jpeg'),
(50, 'ANITA RAHMAWATI', '08', '9413032PT', 'Paiton', 37, 'Y', 'T', 'Y', '3008b8719fd288d12a2e142737a950b7', NULL),
(51, 'ADE VICKTOR CINDY', '085257372419', '9116106PT', 'Paiton', 37, 'Y', 'Y', 'Y', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
(52, 'ARMAN EFFENDI', '08987635698', '7906010JA', 'Paiton', 38, 'Y', 'Y', 'Y', '364365a4701d3d1511bcda54076600c0', 'TTD20190624124410.jpeg'),
(53, 'MUSLIM', '08', '7394132JA', 'Paiton', 39, 'Y', 'T', 'Y', '06ec990713e372ad34cf00c32b185fdd', NULL),
(54, 'HARTO', '088888888888', '7294124JA', 'Paiton', 40, 'Y', 'Y', 'Y', 'ff03db415e9242be0d7b6dae84645c16', NULL),
(55, 'IRWAN PRASETYOBUDI', '08', '8814040PT', 'Paiton', 41, 'Y', 'T', 'Y', '52d3d9fcdff22269495774ddd7f46750', NULL),
(56, 'MIFTACHUL SAIFUL ANAM', '08', '9014034PT', 'Paiton', 41, 'Y', 'T', 'Y', '5f1b8ee7b8e55f5f6270c015d5ad52bc', NULL),
(57, 'AMINUDIN', '08', '9113840PT', 'Paiton', 41, 'Y', 'T', 'Y', '4794d162ef6f7f1bee614d10d0d0456e', NULL),
(58, 'MOH. HIDAYATUL ULUM', '08', '9215207TA', 'Paiton', 41, 'Y', 'T', 'Y', 'f1a26b0fae19e7ef27b449f3082b46d3', NULL),
(59, 'MOCH. SAMSUL ARIEF', '08', '6888019JA', 'Paiton', 42, 'Y', 'T', 'Y', 'be89afe67527158008fd41b345f75d6d', NULL),
(60, 'MOH. AMIN', '08512345678', '19890702', 'Paiton', 43, 'Y', 'Y', 'Y', '827ccb0eea8a706c4c34a16891f84e7b', 'TTD20190626110507.png'),
(61, 'HARIYANTO', '0851234567', '19790803', 'Paiton', 43, 'Y', 'Y', 'Y', '64a307c9ed3c1ebfd5767ad1851bc4ad', NULL),
(62, 'ADI SUPRIONO', '0851234567', '19821204', 'Paiton', 43, 'Y', 'Y', 'Y', '420ec7430630b38d9a25d74ab4b5aea4', NULL),
(63, 'NANANG HARIYANTO', '0851234567', '19821005', 'Paiton', 43, 'Y', 'Y', 'Y', 'b98d68a798b428991f9a0f6616cfbcb4', NULL),
(64, 'BAHRUL ULUM', '0851234567', '19901106', 'Paiton', 47, 'Y', 'Y', 'Y', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
(65, 'SUFYAN HADI', '0851234567', '19811107', 'Paiton', 47, 'Y', 'Y', 'Y', 'b6e9359915b41b7537ebf917079d128e', NULL),
(66, 'EKO WAHYUDI', '0851234567', '19891108', 'Paiton', 47, 'Y', 'Y', 'Y', '5f59c33c2d47c93fcf6665573ed89bce', NULL),
(67, 'LUTFIL AMIN', '0851234567', '19881209', 'Paiton', 47, 'Y', 'Y', 'Y', 'e42b08805c82650fdea0837f5b87ed9d', NULL),
(68, 'AGUS RIYANTO', '08520000', '7493023JA', 'JALAN abcd', 6, 'Y', 'Y', 'Y', '3a481ff1ed0cd13b6beca6706ac91638', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbkeluar`
--

CREATE TABLE `tbkeluar` (
  `idkeluar` int(11) NOT NULL,
  `tgl` int(11) DEFAULT NULL,
  `tujuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpengaturan`
--

CREATE TABLE `tbpengaturan` (
  `kodeatur` tinyint(2) NOT NULL,
  `tglbuat` datetime NOT NULL,
  `tglakhir` datetime DEFAULT NULL,
  `jenis` enum('Masuk','Simip','Keluar') NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbpengaturan`
--

INSERT INTO `tbpengaturan` (`kodeatur`, `tglbuat`, `tglakhir`, `jenis`, `status`) VALUES
(3, '2020-12-13 15:18:12', NULL, 'Masuk', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpengiriman`
--

CREATE TABLE `tbpengiriman` (
  `kodekirim` int(7) NOT NULL,
  `kodevendor` smallint(5) DEFAULT NULL,
  `keperluan` varchar(50) DEFAULT NULL,
  `tglkirim` date DEFAULT NULL,
  `tglmasuk` datetime DEFAULT NULL,
  `tglkeluar` datetime DEFAULT NULL,
  `nopo` varchar(10) DEFAULT NULL,
  `statuspos` enum('Baru','Diterima') DEFAULT NULL,
  `statusgudang` enum('Baru','Diterima','Ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbpengiriman`
--

INSERT INTO `tbpengiriman` (`kodekirim`, `kodevendor`, `keperluan`, `tglkirim`, `tglmasuk`, `tglkeluar`, `nopo`, `statuspos`, `statusgudang`) VALUES
(1, 1, 'Kirim Barang', '2020-12-10', '2020-12-10 14:06:13', '2020-12-10 14:06:15', 'PO0098', 'Diterima', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbsimip`
--

CREATE TABLE `tbsimip` (
  `idtamu` int(11) NOT NULL,
  `tglsimip` datetime DEFAULT NULL,
  `pendamping` varchar(50) DEFAULT NULL,
  `kendaraan` varchar(50) DEFAULT NULL,
  `statuspossimip` enum('Diterima') DEFAULT NULL,
  `k3` int(11) DEFAULT NULL,
  `manager` int(11) DEFAULT NULL,
  `smanager` tinyint(1) DEFAULT NULL,
  `sk3` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbsimip`
--

INSERT INTO `tbsimip` (`idtamu`, `tglsimip`, `pendamping`, `kendaraan`, `statuspossimip`, `k3`, `manager`, `smanager`, `sk3`) VALUES
(1, '2020-12-10 14:20:00', 'Buhori', 'Mobil', 'Diterima', 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbtamu`
--

CREATE TABLE `tbtamu` (
  `kodetamu` int(5) NOT NULL,
  `keperluan` varchar(50) DEFAULT NULL,
  `namatamu` varchar(50) DEFAULT NULL,
  `tglmasuk` datetime DEFAULT NULL,
  `tglkeluar` datetime DEFAULT NULL,
  `janji` enum('Y','N') DEFAULT NULL,
  `bertemu` varchar(50) DEFAULT NULL,
  `kodepos` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbvendor`
--

CREATE TABLE `tbvendor` (
  `kdvendor` smallint(5) NOT NULL,
  `namavendor` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status` enum('Aktif','Meminta','Blokir') DEFAULT 'Meminta'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbvendor`
--

INSERT INTO `tbvendor` (`kdvendor`, `namavendor`, `email`, `telepon`, `password`, `alamat`, `status`) VALUES
(1, 'CV Poter', 'poter@mail.com', '083465257562', '202cb962ac59075b964b07152d234b70', 'Alamat 1', 'Aktif'),
(2, 'Nama vendor', 'nama@email.com', '0988747646', NULL, 'Alastengah paiton', 'Meminta'),
(3, 'Nama vendor a', 'email@email.com', '08548464133', NULL, 'Alamat vendor', 'Meminta');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbapprove`
--
ALTER TABLE `tbapprove`
  ADD PRIMARY KEY (`idapprove`);

--
-- Indeks untuk tabel `tbdetailapprove`
--
ALTER TABLE `tbdetailapprove`
  ADD PRIMARY KEY (`iddetailapprove`);

--
-- Indeks untuk tabel `tbdetailpengaturan`
--
ALTER TABLE `tbdetailpengaturan`
  ADD PRIMARY KEY (`iddetailatur`);

--
-- Indeks untuk tabel `tbdetailpengiriman`
--
ALTER TABLE `tbdetailpengiriman`
  ADD PRIMARY KEY (`iddetailkirim`);

--
-- Indeks untuk tabel `tbdetailtamu`
--
ALTER TABLE `tbdetailtamu`
  ADD PRIMARY KEY (`iddetailtamu`);

--
-- Indeks untuk tabel `tbhak`
--
ALTER TABLE `tbhak`
  ADD PRIMARY KEY (`idhak`);

--
-- Indeks untuk tabel `tbhistorivendor`
--
ALTER TABLE `tbhistorivendor`
  ADD PRIMARY KEY (`idhistoriv`);

--
-- Indeks untuk tabel `tbjabatan`
--
ALTER TABLE `tbjabatan`
  ADD PRIMARY KEY (`idJabatan`);

--
-- Indeks untuk tabel `tbkaryawan`
--
ALTER TABLE `tbkaryawan`
  ADD PRIMARY KEY (`idKaryawan`),
  ADD KEY `jabatan` (`idJabatan`);

--
-- Indeks untuk tabel `tbkeluar`
--
ALTER TABLE `tbkeluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indeks untuk tabel `tbpengaturan`
--
ALTER TABLE `tbpengaturan`
  ADD PRIMARY KEY (`kodeatur`);

--
-- Indeks untuk tabel `tbpengiriman`
--
ALTER TABLE `tbpengiriman`
  ADD PRIMARY KEY (`kodekirim`);

--
-- Indeks untuk tabel `tbsimip`
--
ALTER TABLE `tbsimip`
  ADD PRIMARY KEY (`idtamu`);

--
-- Indeks untuk tabel `tbtamu`
--
ALTER TABLE `tbtamu`
  ADD PRIMARY KEY (`kodetamu`);

--
-- Indeks untuk tabel `tbvendor`
--
ALTER TABLE `tbvendor`
  ADD PRIMARY KEY (`kdvendor`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbapprove`
--
ALTER TABLE `tbapprove`
  MODIFY `idapprove` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbdetailapprove`
--
ALTER TABLE `tbdetailapprove`
  MODIFY `iddetailapprove` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbdetailpengaturan`
--
ALTER TABLE `tbdetailpengaturan`
  MODIFY `iddetailatur` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbdetailpengiriman`
--
ALTER TABLE `tbdetailpengiriman`
  MODIFY `iddetailkirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbdetailtamu`
--
ALTER TABLE `tbdetailtamu`
  MODIFY `iddetailtamu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbhak`
--
ALTER TABLE `tbhak`
  MODIFY `idhak` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbhistorivendor`
--
ALTER TABLE `tbhistorivendor`
  MODIFY `idhistoriv` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbjabatan`
--
ALTER TABLE `tbjabatan`
  MODIFY `idJabatan` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tbkaryawan`
--
ALTER TABLE `tbkaryawan`
  MODIFY `idKaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `tbpengaturan`
--
ALTER TABLE `tbpengaturan`
  MODIFY `kodeatur` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbpengiriman`
--
ALTER TABLE `tbpengiriman`
  MODIFY `kodekirim` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbvendor`
--
ALTER TABLE `tbvendor`
  MODIFY `kdvendor` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;