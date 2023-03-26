-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2023 at 04:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_produksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Tersedia',
  `keterangan` text NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `deskripsi`, `gambar`, `status`, `keterangan`, `stok`) VALUES
('BRG01', 'Pisau Bag Making a', 'Satuan pcs, Harga 100000', 'Screen Shot 2022-08-05 at 13.14.09.png', 'Tersedia', 'pcs', 9),
('BRG011', 'Asah Pisau Bag Making P.650mm', 'Satuan pcs, Harga 100000', 'avatar.jpg', 'Tersedia', 'pcs', 3),
('BRG02', 'Double Nepel', 'Satuan pcs, Harga 180000', 'avatar.jpg', 'Tersedia', 'pcs', 2),
('BRG03', 'Coupling', 'Satuan pcs, Harga 90000', 'avatar.jpg', 'Tersedia', 'pcs', 0),
('BRG04', 'Sproket RS 60x2x40T Double', 'Satuan pcs, Harga 2475000', 'avatar.jpg', 'Tersedia', 'pcs', 0),
('BRG05', 'Rantai RS 60x2x40T Double', 'Satuan pcs, Harga 1039500', 'avatar.jpg', 'Tersedia', 'pcs', 0),
('BRG06', 'Selang Hydraulic 1x3350mm', 'Satuan pcs, Harga 783000', 'avatar.jpg', 'Tersedia', 'pcs', 0),
('BRG07', 'Gear ultrasonic', 'Satuan pcs, Harga 1404000', 'avatar.jpg', 'Tersedia', 'pcs', 1),
('BRG08', 'As Hydraulic + Chrome', 'Satuan pcs, Harga 480000', 'avatar.jpg', 'Tersedia', 'pcs', 0),
('BRG09', 'Mall stainless t1,mmx162mmx2000mm', 'Satuan pcs, Harga 600000', 'avatar.jpg', 'Tersedia', 'pcs', 0),
('BRG10', 'Mall stainless t15mmx162mmx530mm', 'Satuan pcs, Harga 150000', 'avatar.jpg', 'Tersedia', 'pcs', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_prediksi`
--

CREATE TABLE `tb_prediksi` (
  `id_prediksi` int(8) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_prediksi` varchar(100) NOT NULL,
  `jml_bulan` int(11) NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `rekap_poq` text NOT NULL,
  `hasil_poq` int(8) NOT NULL,
  `catatan_poq` text NOT NULL,
  `rekap_dma` text NOT NULL,
  `hasil_dma` int(8) NOT NULL,
  `catatan_dma` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_prediksi`
--

INSERT INTO `tb_prediksi` (`id_prediksi`, `tanggal`, `nama_prediksi`, `jml_bulan`, `waktu`, `id_user`, `id_barang`, `rekap_poq`, `hasil_poq`, `catatan_poq`, `rekap_dma`, `hasil_dma`, `catatan_dma`, `keterangan`) VALUES
(1, '2022-06-05', 'Prediksi Barang Siapn Export', 15, '', 'USR01', 'BRG001', '<ol><li>Mei 2022 : SQRT((2 x 26 x 100000)/1000)) =72.11102550928/6.5 | 72.11102550928/6.5 =12</li><li>Juni 2022 : SQRT((2 x 12 x 100000)/1000)) =48.989794855664/3 | 48.989794855664/3 =17</li><li>Juli 2022 : SQRT((2 x 17 x 100000)/1000)) =58.309518948453/4.25 | 58.309518948453/4.25 =14</li><li>Agustus 2022 : SQRT((2 x 14 x 100000)/1000)) =52.915026221292/3.5 | 52.915026221292/3.5 =16</li><li>September 2022 : SQRT((2 x 16 x 100000)/1000)) =56.568542494924/4 | 56.568542494924/4 =15</li><li>Oktober 2022 : SQRT((2 x 15 x 100000)/1000)) =54.772255750517/3.75 | 54.772255750517/3.75 =15</li><li>November 2022 : SQRT((2 x 15 x 100000)/1000)) =54.772255750517/3.75 | 54.772255750517/3.75 =15</li><li>Desember 2022 : SQRT((2 x 15 x 100000)/1000)) =54.772255750517/3.75 | 54.772255750517/3.75 =15</li><li>Januari 2023 : SQRT((2 x 15 x 100000)/1000)) =54.772255750517/3.75 | 54.772255750517/3.75 =15</li><li>Februari 2023 : SQRT((2 x 15 x 100000)/1000)) =54.772255750517/3.75 | 54.772255750517/3.75 =15</li><li>Maret 2023 : SQRT((2 x 15 x 100000)/1000)) =54.772255750517/3.75 | 54.772255750517/3.75 =15</li><li>April 2023 : SQRT((2 x 15 x 100000)/1000)) =54.772255750517/3.75 | 54.772255750517/3.75 =15</li><li>Mei 2023 : SQRT((2 x 15 x 100000)/1000)) =54.772255750517/3.75 | 54.772255750517/3.75 =15</li><li>Juni 2023 : SQRT((2 x 15 x 100000)/1000)) =54.772255750517/3.75 | 54.772255750517/3.75 =15</li><li>Juli 2023 : SQRT((2 x 15 x 100000)/1000)) =54.772255750517/3.75 | 54.772255750517/3.75 =15</li><ol>', 0, '[1,72.11102550928,12],[2,48.989794855664,17],[3,58.309518948453,14],[4,52.915026221292,16],[5,56.568542494924,15],[6,54.772255750517,15],[7,54.772255750517,15],[8,54.772255750517,15],[9,54.772255750517,15],[10,54.772255750517,15],[11,54.772255750517,15],[12,54.772255750517,15],[13,54.772255750517,15],[14,54.772255750517,15],[15,54.772255750517,15]', '<ol><li>Mei 2022 : (12+21)/2 =17 | (15.75+34.5)/2 =26</li><li>Juni 2022 : (21+17)/2 =19 | (34.5+26)/2 =31</li><li>Juli 2022 : (17+19)/2 =18 | (26+31)/2 =29</li><li>Agustus 2022 : (19+18)/2 =19 | (31+29)/2 =30</li><li>September 2022 : (18+19)/2 =19 | (29+30)/2 =30</li><li>Oktober 2022 : (19+19)/2 =19 | (30+30)/2 =30</li><li>November 2022 : (19+19)/2 =19 | (30+30)/2 =30</li><li>Desember 2022 : (19+19)/2 =19 | (30+30)/2 =30</li><li>Januari 2023 : (19+19)/2 =19 | (30+30)/2 =30</li><li>Februari 2023 : (19+19)/2 =19 | (30+30)/2 =30</li><li>Maret 2023 : (19+19)/2 =19 | (30+30)/2 =30</li><li>April 2023 : (19+19)/2 =19 | (30+30)/2 =30</li><li>Mei 2023 : (19+19)/2 =19 | (30+30)/2 =30</li><li>Juni 2023 : (19+19)/2 =19 | (30+30)/2 =30</li><li>Juli 2023 : (19+19)/2 =19 | (30+30)/2 =30</li></ol>', 0, '[1,17,26],[2,19,31],[3,18,29],[4,19,30],[5,19,30],[6,19,30],[7,19,30],[8,19,30],[9,19,30],[10,19,30],[11,19,30],[12,19,30],[13,19,30],[14,19,30],[15,19,30]', 'Req Bos'),
(2, '2022-06-05', 'Prediksi Siap pakai', 7, '', 'USR01', 'BRG003', '<ol><li>Mei 2022 : SQRT((2 x 0 x 100000)/1000)) =0/0 | 0/0 =0</li><li>Juni 2022 : SQRT((2 x 0 x 100000)/1000)) =0/0 | 0/0 =0</li><li>Juli 2022 : SQRT((2 x 0 x 100000)/1000)) =0/0 | 0/0 =0</li><li>Agustus 2022 : SQRT((2 x 0 x 100000)/1000)) =0/0 | 0/0 =0</li><li>September 2022 : SQRT((2 x 0 x 100000)/1000)) =0/0 | 0/0 =0</li><li>Oktober 2022 : SQRT((2 x 0 x 100000)/1000)) =0/0 | 0/0 =0</li><li>November 2022 : SQRT((2 x 0 x 100000)/1000)) =0/0 | 0/0 =0</li><ol>', 0, '[1,0,0],[2,0,0],[3,0,0],[4,0,0],[5,0,0],[6,0,0],[7,0,0]', '<ol><li>Mei 2022 : (0+0+0)/3 =0 | (0+0+0)/3 =0</li><li>Juni 2022 : (0+0+0)/3 =0 | (0+0+0)/3 =0</li><li>Juli 2022 : (0+0+0)/3 =0 | (0+0+0)/3 =0</li><li>Agustus 2022 : (0+0+0)/3 =0 | (0+0+0)/3 =0</li><li>September 2022 : (0+0+0)/3 =0 | (0+0+0)/3 =0</li><li>Oktober 2022 : (0+0+0)/3 =0 | (0+0+0)/3 =0</li><li>November 2022 : (0+0+0)/3 =0 | (0+0+0)/3 =0</li></ol>', 0, '[1,0,0],[2,0,0],[3,0,0],[4,0,0],[5,0,0],[6,0,0],[7,0,0]', 'req bos');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `pemakaian` int(8) NOT NULL DEFAULT 0,
  `persediaan` int(8) DEFAULT 0,
  `pembelian` int(8) NOT NULL DEFAULT 0,
  `sisa` int(8) NOT NULL DEFAULT 0,
  `keterangan` text NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `tipe_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `tanggal`, `id_barang`, `pemakaian`, `persediaan`, `pembelian`, `sisa`, `keterangan`, `item`, `tipe_transaksi`) VALUES
(1, '2021-11-01', 'BRG01', 9, 0, 0, 0, 'PT Century  (9 x Rp. 100000 =RP. 900000)', '', 1),
(2, '2021-11-02', 'BRG01', 2, 0, 0, 0, 'PT Century  (2 x Rp. 100000 =RP. 200000)', '', 1),
(3, '2021-11-04', 'BRG01', 2, 0, 0, 0, 'PT Prima Makmur  (2 x Rp. 180000 =RP. 360000)', '', 1),
(4, '2021-11-04', 'BRG01', 2, 0, 0, 0, 'PT Prima Makmur  (20 x Rp. 90000 =RP. 1800000)', '', 1),
(5, '2021-11-06', 'BRG01', 7, 0, 0, 0, 'PT Century  (7 x Rp. 100000 =RP. 700000)', '', 1),
(6, '2021-11-08', 'BRG01', 4, 0, 0, 0, 'PT Century  (4 x Rp. 100000 =RP. 400000)', '', 1),
(7, '2021-11-09', 'BRG01', 6, 0, 0, 0, 'PT Century  (6 x Rp. 100000 =RP. 600000)', '', 1),
(8, '2021-11-10', 'BRG01', 2, 0, 0, 0, 'PT Century  (2 x Rp. 100000 =RP. 200000)', '', 1),
(9, '2021-11-12', 'BRG01', 2, 0, 0, 0, 'PT Prima Makmur  (2 x Rp. 2475000 =RP. 4950000)', '', 1),
(10, '2021-11-12', 'BRG01', 2, 0, 0, 0, 'PT Prima Makmur  (2 x Rp. 1039500 =RP. 2079000)', '', 1),
(11, '2021-11-12', 'BRG01', 3, 0, 0, 0, 'PT Prima Makmur  (3 x Rp. 783000 =RP. 2349000)', '', 1),
(12, '2021-11-17', 'BRG01', 9, 0, 0, 0, 'PT Century  (9 x Rp. 100000 =RP. 900000)', '', 1),
(13, '2021-11-22', 'BRG01', 5, 0, 0, 0, 'PT Prima Makmur  (5 x Rp. 1404000 =RP. 7020000)', '', 1),
(14, '2021-11-22', 'BRG01', 1, 0, 0, 0, 'PT Prima Makmur  (1 x Rp. 202500 =RP. 202500)', '', 1),
(15, '2021-02-26', 'BRG01', 8, 0, 0, 0, 'PT Century  (8 x Rp. 100000 =RP. 800000)', '', 1),
(16, '2021-05-29', 'BRG01', 2, 0, 0, 0, 'PT Century  (2 x Rp. 100000 =RP. 200000)', '', 1),
(17, '2021-06-30', 'BRG01', 6, 0, 0, 0, 'PT Century  (6 x Rp. 100000 =RP. 600000)', '', 1),
(18, '2021-06-10', 'BRG01', 2, 0, 0, 0, 'Golden swan  (2 x Rp. 480000 =RP. 960000)', '', 1),
(19, '2021-11-20', 'BRG01', 3, 0, 0, 0, 'PT. Dynamic Poly Industry  (3 x Rp. 600000 =RP. 1800000)', '', 1),
(20, '2021-11-20', 'BRG01', 3, 0, 0, 0, 'PT. Dynamic Poly Industry  (3 x Rp. 150000 =RP. 450000)', '', 1),
(21, '2021-12-01', 'BRG01', 3, 0, 0, 0, 'Satuan pcs, Harga 100000 #PT. century  (3 x Rp. 100000 =RP. 300000)', 'Asah Pisau Bag Making P.650mm', 1),
(26, '2022-11-05', 'BRG01', 1, 0, 2, 0, 'dsadas', NULL, 1),
(27, '2022-07-05', 'BRG01', 2, 0, 3, 0, 'dsadsa', NULL, 1),
(28, '2022-11-05', 'BRG01', 3, 0, 1, 0, 'dsa', NULL, 1),
(29, '2022-08-05', 'BRG01', 4, 0, 1, 5, 'dsadsa', NULL, 1),
(30, '2022-08-05', 'BRG01', 5, 0, 2, 7, 'dsada', NULL, 1),
(31, '2022-09-05', 'BRG01', 2, 0, 1, 3, 'dsadsa', NULL, 1),
(32, '2022-08-05', 'BRG01', 1, 0, 1, 8, 'dsad', NULL, 1),
(33, '2022-09-09', 'BRG01', 2, 0, 1, 9, 'dsadsa', NULL, 1),
(34, '2022-08-05', 'BRG01', 1, 0, 1, 8, '1', NULL, 1),
(35, '2022-01-05', 'BRG01', 1, 0, 1, 7, 'ddsadsa', NULL, 1),
(36, '2022-09-05', 'BRG01', 2, 0, 2, 5, 'ddsadas', NULL, 1),
(37, '2022-01-06', 'BRG01', 3, 0, 3, 2, 'dsadsa', NULL, 1),
(38, '2022-10-06', 'BRG01', 5, 0, 5, -5, 'dsadsa', NULL, 1),
(39, '2022-08-06', 'BRG01', 2, 0, 2, -2, 'dsadsa', NULL, 1),
(40, '2022-08-06', 'BRG01', 4, 0, 4, -6, 'dsadsa', NULL, 1),
(41, '2022-08-07', 'BRG01', 0, 0, 2, 9, 'da', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(15) NOT NULL,
  `nama_user` varchar(40) NOT NULL,
  `level` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Aktif',
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `level`, `email`, `telepon`, `username`, `password`, `status`, `keterangan`) VALUES
('USR01', 'admin utama', 'Administrator', 'b@gmail.com', '08987676565', 'a ', 'a', 'Aktif', '-'),
('USR02', 'Joko Sampurna,Skom', 'Staff Gudang', 'joko@gmail.com', '0813884455664', 's', 's', 'Aktif', ''),
('USR03', 'Song Hye Kyo', 'Staff Gudang', 'riadimrt@yahoo.com', '081294744369', 'c', 'c', 'Tidak Aktif', 'Cuti Shooting');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_prediksi`
--
ALTER TABLE `tb_prediksi`
  ADD PRIMARY KEY (`id_prediksi`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_prediksi`
--
ALTER TABLE `tb_prediksi`
  MODIFY `id_prediksi` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
