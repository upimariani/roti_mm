-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Apr 2022 pada 03.26
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roti_mm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(2, 'rizki', 'rizkimuhammad', 'rizkikiki'),
(3, 'tikamari', 'upmar', 'mariani'),
(4, 'tika', 'tikadea', 'amelia12345'),
(5, 'Tika', 'tikadea', 'deaamelia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chatting`
--

CREATE TABLE `chatting` (
  `id_chatting` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `pelanggan_send` varchar(255) DEFAULT NULL,
  `admin_send` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chatting`
--

INSERT INTO `chatting` (`id_chatting`, `id_pelanggan`, `pelanggan_send`, `admin_send`, `time`) VALUES
(1, 6, 'hai', '0', '2021-09-22 14:32:01'),
(2, 6, '0', 'juga', '2021-09-22 14:41:36'),
(3, 6, 'izin bertanya', '0', '2021-09-22 14:42:11'),
(4, 6, '0', 'iya ada apa', '2021-09-22 15:16:49'),
(5, 6, '0', 'iya ada apa', '2021-09-22 15:17:10'),
(6, 6, '0', 'iya ada apa', '2021-09-22 15:17:40'),
(7, 6, 'masih ada diskon?', '0', '2021-09-22 15:19:55'),
(8, 7, 'hai', '0', '2021-09-23 08:20:02'),
(9, 7, '0', 'hai juga', '2021-09-23 08:22:30'),
(10, 7, '0', 'ada yang bisa dibantu?', '2021-09-23 08:23:32'),
(11, 6, '0', 'ada', '2021-09-30 04:11:37'),
(12, 1, 'hai', '0', '2021-10-02 00:06:55'),
(13, 5, 'hai admin', '0', '2021-10-26 04:56:07'),
(14, 1, 'izin bertanya', '0', '2021-11-11 07:04:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL,
  `id_produk` varchar(30) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_detail`, `id_transaksi`, `id_produk`, `qty`) VALUES
(1, '20211006UAJCM6GQ', '24', 50),
(2, '2021100648WZSJG9', '23', 50),
(3, '2021100648WZSJG9', '25', 50),
(5, '202110269764IIQE', '23', 50),
(6, '202110269764IIQE', '33', 50),
(7, '20211111KR0OOJDZ', '20', 50),
(8, '20211111KR0OOJDZ', '22', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(11) NOT NULL,
  `nama_kurir` varchar(50) NOT NULL,
  `area` varchar(255) NOT NULL,
  `status_kurir` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nama_kurir`, `area`, `status_kurir`) VALUES
(2, 'Ahmad Sanusi', 'Kuningan Barat', 1),
(3, 'Bambang', 'Kuningan Timur', 0),
(4, 'Jajang', 'Luar Kota', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `no_telp`, `point`, `username`, `password`) VALUES
(1, 'tika', 'ciniru', '85156727368', 1640, 'tika', 'berkahjaya'),
(2, 'Upi Mariani', 'ramajaksa', '85156727368', 2080, 'upmar', 'upi'),
(3, 'Rowina', 'ramajaksa', '258959874523', 0, 'rowina', 'sarisara'),
(4, 'Ahmad Jaya', 'Lengkong', '85156727368', 0, 'ahmad', 'jayarasa'),
(5, 'Tika Dea Amalia', 'Ciniru', '085156727236', 0, 'tikadea', 'tikadea'),
(6, 'Tiara Andini', 'Kuningan', '085156727368', 0, 'tiara', 'tiaraandini'),
(7, 'Dani Hamdani', 'Kuningan', '085156727368', 4980, 'dani', 'hamdani'),
(8, 'Rowin', 'Langseb', '087765786812', 0, 'rowina', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(125) DEFAULT NULL,
  `rasa_produk` varchar(50) DEFAULT NULL,
  `harga_produk` int(50) DEFAULT NULL,
  `qty_produk` int(25) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `diskon` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `rasa_produk`, `harga_produk`, `qty_produk`, `deskripsi`, `gambar`, `diskon`) VALUES
(20, 'Pia Goreng', 'Coklat', 1000, 895, 'ddf', 'IMG20210910184506.jpg', 6),
(21, 'Roti Oles', 'Manisan Buah-Buahan', 1500, 5, 'vfdfd', 'IMG20210910184722.jpg', 0),
(22, 'Pisang Keju', 'Keju', 700, 304, 'fdfd', 'IMG20210910184804.jpg', 0),
(23, 'Kue Jadul', 'Susu', 5000, 21, NULL, 'IMG20210910184959.jpg', 3),
(24, 'Malkis Wijen', 'Wijen', 5000, 20, NULL, 'IMG20210910185051.jpg', 0),
(25, 'Roti Coklat', 'Coklat', 2000, 50, NULL, 'IMG20210910185140.jpg', 0),
(26, 'Roti Sandwich', 'Keju', 2000, 150, NULL, 'IMG20210910185229.jpg', 0),
(27, 'Roti Oles', 'Coklat', 2000, 50, NULL, 'IMG20210910185316.jpg', 0),
(28, 'Pia Basah', 'Kacang Hijau', 1000, 5, '                    ', 'IMG202109101842553.jpg', 0),
(33, 'Roti Kering', 'Paket', 20000, 400, '<ol><li>Kue Jadul</li><li>Malkis</li><li>Pisang Keju</li></ol>', 'paket_kering.png', 0),
(34, 'Roti', 'Paket', 5000, 450, '<ol><li>Roti Coklat</li><li>Roti Manisan</li><li>Roti Keju</li></ol>', 'paket_pagi.png', 0),
(35, 'Pia Basah', 'Paket', 2500, 5000, '<ol><li>Pia Basah Kacang Hijau</li><li>Pia Basah Coklat</li><li>Pia Basah Kopyor</li></ol>', 'paket_pia.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur_barang`
--

CREATE TABLE `retur_barang` (
  `id_retur_barang` int(11) NOT NULL,
  `id_transaksi` varchar(20) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `retur_barang`
--

INSERT INTO `retur_barang` (`id_retur_barang`, `id_transaksi`, `id_produk`, `qty`, `jumlah`) VALUES
(1, '20211111KR0OOJDZ', 20, 5, 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pengiriman`
--

CREATE TABLE `status_pengiriman` (
  `id_status_pengiriman` int(11) NOT NULL,
  `id_transaksi` varchar(20) DEFAULT NULL,
  `status_pengiriman` varchar(125) DEFAULT NULL,
  `time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_pengiriman`
--

INSERT INTO `status_pengiriman` (`id_status_pengiriman`, `id_transaksi`, `status_pengiriman`, `time`) VALUES
(1, '20211006UAJCM6GQ', 'selesai', '2021-10-06 06:14:18'),
(2, '2021100648WZSJG9', 'dikemas', '2021-10-06 02:34:48'),
(4, '202110269764IIQE', 'menunggu', '2021-10-26 04:55:37'),
(5, '20211111KR0OOJDZ', 'selesai', '2021-11-11 07:06:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(15) NOT NULL,
  `kurir` varchar(30) DEFAULT '0',
  `total_bayar` int(15) NOT NULL,
  `tgl_order` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `nama_penerima`, `alamat`, `no_telp`, `kurir`, `total_bayar`, `tgl_order`) VALUES
('2021100648WZSJG9', 6, 'Ari', 'Ciawigebang', '085156727368', '0', 342500, '2021-10-06 09:33:36'),
('20211006UAJCM6GQ', 7, 'Tika Dea', 'Ciniru Kuningan', '085156727368', '3', 249011, '2021-10-06 09:05:34'),
('202110269764IIQE', 5, 'Upi Mariani', 'zdsdsds', '085156727368', '0', 1242500, '2021-10-26 11:55:37'),
('20211111KR0OOJDZ', 1, 'Upi Mariani', 'asasasasa', '085156727368', '3', 82000, '2021-11-11 14:04:06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`id_chatting`);

--
-- Indeks untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `retur_barang`
--
ALTER TABLE `retur_barang`
  ADD PRIMARY KEY (`id_retur_barang`);

--
-- Indeks untuk tabel `status_pengiriman`
--
ALTER TABLE `status_pengiriman`
  ADD PRIMARY KEY (`id_status_pengiriman`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id_chatting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `retur_barang`
--
ALTER TABLE `retur_barang`
  MODIFY `id_retur_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `status_pengiriman`
--
ALTER TABLE `status_pengiriman`
  MODIFY `id_status_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
