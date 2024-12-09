-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 07:12 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bukawarung`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL,
  `is_admin` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`, `is_admin`) VALUES
(1, 'Ditto Saepoel Rachman', 'admin', '21232f297a57a5a743894a0e4a801fc3', '08998186613', 'dittorahmann@gmail.com', 'Kp. grogol jl arsad rt03/02 no 5 kelurahan grogol kecamatan limo kota depok', 'Y'),
(11, 'Ditto Saepoel Rachman', 'test', '098f6bcd4621d373cade4e832627b4f6', '', 'test123@gmail.com', '', 'N'),
(12, 'peda', 'peda', '098f6bcd4621d373cade4e832627b4f6', '', 'peda123@xample.com', '', 'N'),
(13, 'toro', 'toro123', '098f6bcd4621d373cade4e832627b4f6', '', 'toro123@gmail.com', '', 'N'),
(14, 'adam', 'adam', '$2y$10$aVHTCGd89diXiCQSJQA/6utGAvfVpTtw0hHWseQnFm/hIbRB.NCae', '', 'adam123@gmil.com', '', 'N'),
(15, 'dd', 'dd', '1aabac6d068eef6a7bad3fdf50a05cc8', '', 'dittorahmann@gmail.com', '', ''),
(16, 'rian', 'rian123', '202cb962ac59075b964b07152d234b70', '', 'rian123@koclok.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(6, 'Handphone'),
(7, 'Sepatu'),
(8, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `no_invoice` varchar(100) DEFAULT NULL,
  `tgl_trx` timestamp NULL DEFAULT NULL,
  `status_trx` int(11) DEFAULT NULL,
  `bukti_byr` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id`, `user_id`, `product_id`, `qty`, `alamat`, `no_telp`, `no_invoice`, `tgl_trx`, `status_trx`, `bukti_byr`) VALUES
(1, 11, 18, 1, 'asd', '123', 'INV/11/20240622180011', '2024-06-22 11:00:11', 1, NULL),
(2, 12, 13, 3, 'reni', '088828282', 'INV/12/20240622182909', '2024-06-22 11:29:09', 1, NULL),
(3, 13, 16, 2, 'Kp. grogol jl arsad rt03/02 no 5 kelurahan grogol kecamatan limo kota depok.', '02189620880', 'INV/13/20240622185540', '2024-06-22 11:55:40', 1, NULL),
(4, 16, 13, 40, 'kuvlukq', '123432', 'INV/16/20240628215416', '2024-06-28 14:54:16', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`, `date_created`) VALUES
(13, 7, 'Nike Dunk', 1549000, '<p>Nike Dunk Low</p>\r\n\r\n<p>Color : Green</p>\r\n', 'produk1718804780.jpg', 1, '2024-06-19 13:46:20'),
(14, 7, 'Nike Jordan', 1459000, '<p>Nike Jordan Low</p>\r\n\r\n<p>Color : Greey</p>\r\n', 'produk1718905371.jpg', 1, '2024-06-19 13:47:25'),
(15, 8, 'Laptop Asus High End', 5399000, '<p>Speksifikasi</p>\r\n\r\n<p>1. Lancar Buat Game</p>\r\n\r\n<p>2. Lancar Buat Editing</p>\r\n\r\n<p>3. Lancar Buat Ngoding</p>\r\n', 'produk1718905215.jpg', 1, '2024-06-19 13:48:45'),
(16, 8, 'Laptop HP Omen X 2S', 12999000, '<p>Speksifikasi</p>\r\n\r\n<p>HP Omen X 2S</p>\r\n\r\n<p>Prosesor Intel Core i9 9880H generasi 9</p>\r\n\r\n<p>GPU NVIDIA GeForce 2070 Max-Q Design</p>\r\n\r\n<p>SSD yang bisa diisi hingga 2 TB&nbsp;</p>\r\n\r\n<p>RAM 32GB DDR4.</p>\r\n', 'produk1718805092.jpg', 1, '2024-06-19 13:51:32'),
(17, 6, 'Iphone 15 Pro max 256GB', 19990000, '<p><strong>Titanium Hitam, Titanium Putih, Titanium Biru, Titanium Alami</strong></p>\r\n\r\n<p>Desain titanium<br />\r\nBagian depan Ceramic&nbsp;Shield<br />\r\nBagian belakang kaca matte bertekstur</p>\r\n', 'produk1718905015.jpg', 1, '2024-06-19 13:55:57'),
(18, 6, 'Iphone SE 2020 128GB', 3999000, '<ul>\r\n	<li><strong>Layar:</strong> 4,7 inci Retina HD (1334 x 750 piksel)</li>\r\n	<li><strong>Prosesor:</strong> Apple A13 Bionic</li>\r\n	<li><strong>RAM:</strong> 3 GB</li>\r\n	<li><strong>Penyimpanan:</strong> 64 GB, 128 GB, atau 256 GB</li>\r\n	<li><strong>Kamera Belakang:</strong> 12 MP (f/1.8) dengan fitur Portrait mode, Smart HDR, dan perekaman video 4K</li>\r\n	<li><strong>Kamera Depan:</strong> 7 MP (f/2.2) dengan fitur Portrait mode dan perekaman video HD 1080p</li>\r\n	<li><strong>Baterai:</strong> Hingga 13 jam waktu bicara, mendukung pengisian daya nirkabel Qi dan pengisian cepat (50% dalam 30 menit dengan adaptor 18W atau lebih tinggi)</li>\r\n	<li><strong>Sistem Operasi:</strong> iOS 13 (dapat diupgrade ke versi terbaru)</li>\r\n	<li><strong>Fitur Tambahan:</strong> Touch ID, tahan air dan debu (rating IP67), dukungan dual SIM (nano-SIM dan eSIM)</li>\r\n	<li><strong>Konektivitas:</strong> Wi-Fi 6, Bluetooth 5.0, NFC, LTE Advanced</li>\r\n	<li><strong>Dimensi dan Berat:</strong> 138.4 x 67.3 x 7.3 mm, 148 gram</li>\r\n</ul>\r\n', 'produk1718905000.jpg', 1, '2024-06-19 14:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`) VALUES
(7, 'test', 'user123', 'user123@gmail.com', '$2y$10$yaDbXnu5giZTQ39vxLhVjeXAdDCy1V/Gam0RGpO3PORNg06CBIegK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
