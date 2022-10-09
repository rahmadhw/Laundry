-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2022 at 03:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(124) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_pengguna` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_pengguna`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fix_order`
--

CREATE TABLE `tbl_fix_order` (
  `order_fix` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `tbl_service_upload_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_fix_order`
--

INSERT INTO `tbl_fix_order` (`order_fix`, `order_id`, `tbl_service_upload_id`, `users_id`, `order_date`, `status`) VALUES
(2, 1, 1, 1, '2022-10-05 20:30:31', 'Success'),
(3, 2, 1, 1, '2022-10-06 07:20:20', 'Success'),
(4, 1, 1, 1, '2022-10-06 08:38:55', 'Success'),
(16, 4, 3, 2, '2022-10-06 11:00:06', 'Success'),
(17, 4, 1, 2, '2022-10-06 11:01:08', 'Success'),
(18, 4, 2, 2, '2022-10-06 11:02:11', 'Success'),
(19, 4, 1, 2, '2022-10-06 11:04:07', 'Success'),
(20, 4, 3, 2, '2022-10-06 11:05:07', 'Success'),
(21, 4, 2, 1, '2022-10-06 11:06:00', 'Success'),
(22, 5, 3, 2, '2022-10-06 11:07:07', 'Success'),
(23, 5, 3, 2, '2022-10-06 11:08:59', 'Success'),
(24, 7, 10, 1, '2022-10-06 16:49:10', 'Success'),
(25, 7, 10, 1, '2022-10-06 16:50:33', 'Success'),
(26, 10, 2, 1, '2022-10-06 16:57:56', 'Success'),
(27, 11, 0, 2, '2022-10-06 17:11:36', 'Success'),
(28, 11, 0, 2, '2022-10-06 17:11:43', 'Success'),
(29, 11, 10, 1, '2022-10-06 17:12:06', 'Success'),
(30, 11, 3, 1, '2022-10-06 17:13:25', 'Success'),
(31, 11, 3, 1, '2022-10-06 17:13:41', 'Success'),
(32, 14, 1, 2, '2022-10-06 17:16:38', 'Pending'),
(33, 13, 2, 1, '2022-10-06 17:16:50', 'Pending'),
(34, 15, 11, 3, '2022-10-06 18:47:38', 'Success'),
(37, 18, 2, 6, '2022-10-07 11:46:18', 'Success'),
(40, 19, 5, 7, '2022-10-07 11:56:03', 'Success'),
(41, 20, 2, 7, '2022-10-07 11:57:11', 'Success'),
(42, 21, 13, 7, '2022-10-07 11:59:19', 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id_service` int(11) NOT NULL,
  `nama_service` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id_service`, `nama_service`) VALUES
(1, 'Pakaian/kg'),
(2, 'serbed/kg'),
(16, 'motor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_upload`
--

CREATE TABLE `tbl_service_upload` (
  `id` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `Nama_barang` varchar(255) NOT NULL,
  `dry_price` int(50) NOT NULL,
  `laundry_price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service_upload`
--

INSERT INTO `tbl_service_upload` (`id`, `id_service`, `Nama_barang`, `dry_price`, `laundry_price`) VALUES
(1, 1, 'baju kemeja', 4000, 5000),
(2, 2, 'Serbed cantik', 3000, 6000),
(3, 7, 'bantal dualima', 4000, 5000),
(4, 1, 'pakaian adat budaya', 2000, 2000),
(5, 1, 'pakaian adat budaya', 2000, 2000),
(6, 1, 'pakaian adat budaya', 2000, 2000),
(11, 15, 'sarung tinju hijau', 3000, 4000),
(13, 1, 'motor nmax', 1500, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `id_tbl_service` int(11) NOT NULL,
  `nama_order` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `order_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `id_tbl_service`, `nama_order`, `alamat`, `order_code`) VALUES
(1, 1, 'bambang', 'jl sekolah sepakat riau', 2123),
(2, 1, 'sugiono', 'jl tirta angkasa', 3213),
(3, 2, 'yayay', 'jl pembangunan', 124),
(4, 5, 'tirta', 'jl sukabumi', 256),
(5, 2, 'rere', 'jl kutilang sari', 1234),
(6, 1, 'wayan', 'jl pembina kasih', 0),
(7, 1, 'wayan', 'jl pembina kasih', 0),
(8, 1, 'sadsa', 'sadsa', 0),
(9, 1, 'sadsa', 'sadsad', 0),
(10, 2, 'sadsad', 'sadsad', 1643),
(11, 1, 'sadsa', 'qerqwrewfrewf', 1562),
(12, 1, 'asdsa', 'sadsa', 1413),
(13, 1, 'asdsa', 'sadsad', 1244),
(14, 1, 'sss', 'ssss', 498),
(15, 15, 'rita sugiarto', 'jl lembah sari kamung bukit', 648),
(16, 2, 'yuya', 'jl kekasih bunda', 1067),
(17, 1, 'tuti', 'sadsadsa', 1416),
(18, 1, 'pakaian kering', 'jl bambu kuning', 1386),
(19, 1, 'deplita', 'jl sukarno hatta', 358),
(20, 2, 'serbet madu', 'jl madu', 60),
(21, 1, 'bintang', 'jl bintang', 1551);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_pengguna`) VALUES
(4, 'dinda', '$2y$10$0SKD68OIJ/tZXPAkrmTaYeqWNUYeyXgqnDY.3mITjuZ.5xmHrXYda', 'dinda'),
(5, 'rudiansyah', '$2y$10$myTe5xn2N1gae4jZ/js.delzKhvN4KWc2jFlwfCafzBRiJ3M.KBHy', 'rudiansyah'),
(6, 'budiman', '$2y$10$JWY00Am7BqoJcm3rdT8P3OKxKqmZRoo7zGdDf8GAahwAxjZJAmEiG', 'budiman'),
(7, 'tuti', '$2y$10$nXmW.XSacYmjSrmMnREwreKyYLa0njDSO48XTxkNEVHJihfMBfwl.', 'tuti');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_fix_order`
--
ALTER TABLE `tbl_fix_order`
  ADD PRIMARY KEY (`order_fix`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `tbl_service_upload`
--
ALTER TABLE `tbl_service_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_fix_order`
--
ALTER TABLE `tbl_fix_order`
  MODIFY `order_fix` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_service_upload`
--
ALTER TABLE `tbl_service_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
