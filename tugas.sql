-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 04:12 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas`
--

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `nama_fakultas` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama_fakultas`) VALUES
(1, 'Ilmu Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `prodi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `prodi`) VALUES
(1, 'Manajemen Informatika'),
(2, 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file_balasan`
--

CREATE TABLE `tbl_file_balasan` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `filename` varchar(64) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_file_balasan`
--

INSERT INTO `tbl_file_balasan` (`id`, `name`, `filename`, `date_created`) VALUES
(2, 'Admin', 'SYARAT_BERTRANSAKSI.pdf', '2022-03-08 12:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file_bap`
--

CREATE TABLE `tbl_file_bap` (
  `id` int(11) NOT NULL,
  `n_id` varchar(32) NOT NULL,
  `prodi` varchar(32) NOT NULL,
  `matauji` varchar(32) NOT NULL,
  `thn` varchar(16) NOT NULL,
  `name` varchar(32) NOT NULL,
  `filename` varchar(64) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_file_bap`
--

INSERT INTO `tbl_file_bap` (`id`, `n_id`, `prodi`, `matauji`, `thn`, `name`, `filename`, `date_created`) VALUES
(20, '12345678', 'Manajemen Informatika', 'Tes1', '2021/2022 Genap', 'Dosen', 'BA_AOMALAM.pdf', '2022-03-24 19:54:01'),
(21, '12345678', 'Manajemen Informatika', 'Tes1', '2021/2022 Genap', 'Dosen', 'BA_AOMALAM1.pdf', '2022-03-25 07:24:11'),
(22, '12345678', 'Sistem Informasi', 'Tes1', '2021/2022 Genap', 'Dosen', '113.docx', '2022-03-28 10:03:56'),
(23, '12345678', 'Manajemen Informatika', 'Mata 1', '2021/2022 Genap', 'Dosen', 'Slipbayarterakhir.pdf', '2022-04-10 13:22:16'),
(24, '2147483647', 'Manajemen Informatika', 'Tes1', '2021/2022 Genap', 'Dosen 2', 'Slipbayarterakhir1.pdf', '2022-04-10 13:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file_laporan`
--

CREATE TABLE `tbl_file_laporan` (
  `id` int(11) NOT NULL,
  `n_id` varchar(16) NOT NULL,
  `name` varchar(32) NOT NULL,
  `thn` varchar(16) NOT NULL,
  `prodi` varchar(32) NOT NULL,
  `filename` varchar(64) NOT NULL,
  `matkul` varchar(32) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_file_laporan`
--

INSERT INTO `tbl_file_laporan` (`id`, `n_id`, `name`, `thn`, `prodi`, `filename`, `matkul`, `date_created`) VALUES
(6, '12345678', 'Dosen', '2021-2022 Ganjil', 'Manajemen Informatika', 'BA_AOMALAM.pdf', 'Pemrograman Web', '2022-03-25 07:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file_soal`
--

CREATE TABLE `tbl_file_soal` (
  `id` int(11) NOT NULL,
  `n_id` int(15) NOT NULL,
  `thn` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `fakultas` varchar(32) NOT NULL,
  `prodi` varchar(32) NOT NULL,
  `filename` varchar(32) NOT NULL,
  `matkul` varchar(32) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_file_soal`
--

INSERT INTO `tbl_file_soal` (`id`, `n_id`, `thn`, `name`, `fakultas`, `prodi`, `filename`, `matkul`, `date_created`) VALUES
(1, 12345678, '2021-2022 Ganjil', 'Dosen', 'Ilmu Komputer', 'Sistem Informasi', '69.pdf', 'Pemrograman Web', '2022-03-30 18:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file_surat`
--

CREATE TABLE `tbl_file_surat` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `filename` varchar(64) NOT NULL,
  `balasan` varchar(32) NOT NULL,
  `prodi` varchar(32) NOT NULL,
  `thn` varchar(32) NOT NULL,
  `n_id` varchar(16) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_file_surat`
--

INSERT INTO `tbl_file_surat` (`id`, `name`, `filename`, `balasan`, `prodi`, `thn`, `n_id`, `date_created`) VALUES
(20, 'Juni', 'Surat_Permohonan.pdf', 'Pengumuman_Jadwal_Sidang_Tugas_A', 'Manajemen Informatika', '2021/2022 Ganjil', '2019220030', '2022-04-11 06:49:01'),
(21, 'Juni', 'Slipbayarterakhir.pdf', 'empty', 'Sistem Informasi', '2021/2022 Ganjil', '2019220030', '2022-04-10 08:37:33'),
(22, 'M Rizky Juni Yanas', 'Surat_Permohonan1.pdf', 'empty', 'Sistem Informasi', '2021/2022 Ganjil', '2019220025', '2022-04-11 06:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jsidang_skripsi`
--

CREATE TABLE `tbl_jsidang_skripsi` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `npm` varchar(32) NOT NULL,
  `n_penguji1` varchar(32) NOT NULL,
  `n_penguji2` varchar(32) NOT NULL,
  `n_penguji3` varchar(32) NOT NULL,
  `n_pembimbing1` varchar(32) NOT NULL,
  `n_pembimbing2` varchar(32) NOT NULL,
  `ruangan` varchar(11) NOT NULL,
  `jam_awal` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jsidang_skripsi`
--

INSERT INTO `tbl_jsidang_skripsi` (`id`, `nama`, `npm`, `n_penguji1`, `n_penguji2`, `n_penguji3`, `n_pembimbing1`, `n_pembimbing2`, `ruangan`, `jam_awal`, `jam_akhir`, `tanggal`, `hari`) VALUES
(1, 'M Rizky Juni Yanas', '2019220025', 'Dhamayanti, S. Kom., M.T.I', 'Dhamayanti, S. Kom., M.T.I', 'Dhamayanti, S. Kom., M.T.I', 'Dhamayanti, S. Kom., M.T.I', 'Dhamayanti, S. Kom., M.T.I', 'B204', '16:44:00', '18:41:00', '2022-04-02', 'Minggu'),
(2, 'M Rizky Juni Yanas', '2019220025', 'Dona Marcellina, M.Kom', 'Dona Marcellina, M.Kom', 'Dona Marcellina, M.Kom', 'Dona Marcellina, M.Kom', 'Dona Marcellina, M.Kom', 'B205', '15:51:00', '14:52:00', '2022-04-30', 'Selasa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jsidang_ta`
--

CREATE TABLE `tbl_jsidang_ta` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `npm` varchar(32) NOT NULL,
  `n_penguji1` varchar(32) NOT NULL,
  `n_penguji2` varchar(32) NOT NULL,
  `n_penguji3` varchar(32) NOT NULL,
  `n_pembimbing1` varchar(32) NOT NULL,
  `n_pembimbing2` varchar(32) NOT NULL,
  `ruangan` varchar(11) NOT NULL,
  `jam_awal` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `tanggal` varchar(11) NOT NULL,
  `hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jsidang_ta`
--

INSERT INTO `tbl_jsidang_ta` (`id`, `nama`, `npm`, `n_penguji1`, `n_penguji2`, `n_penguji3`, `n_pembimbing1`, `n_pembimbing2`, `ruangan`, `jam_awal`, `jam_akhir`, `tanggal`, `hari`) VALUES
(5, 'M Rizky Juni Yanas', '2019220025', 'Dona Marcellina, M.Kom', 'Dr. Juhaini, SH., MM', '', 'Dr. Juhaini, SH., MM', 'Dona Marcellina, M.Kom', 'B204', '14:08:00', '16:08:00', '2022-03-08', 'Selasa'),
(6, 'Novri', '2019220013', 'Dr. Juhaini, SH., MM', 'John Roni Coyanda, S. Kom., MM', '', 'Hendra Di Kesuma, S. Kom., M. Cs', 'Dr. Juhaini, SH., MM', 'B205', '14:12:00', '17:09:00', '2022-03-24', 'Minggu'),
(7, 'M Rizky Juni Yanas', '2019220025', 'Imelda Saluza, S. Si., M. Sc', 'Imelda Saluza, S. Si., M. Sc', '', 'Hendra Di Kesuma, S. Kom., M. Cs', 'John Roni Coyanda, S. Kom., MM', 'B204', '14:11:00', '17:09:00', '2022-03-12', 'Selasa'),
(8, 'M Rizky Juni Yanas', '2019220025', 'Imelda Saluza, S. Si., M. Sc', 'Dr. Juhaini, SH., MM', '', 'Hendra Di Kesuma, S. Kom., M. Cs', 'Dr. Juhaini, SH., MM', 'B205', '14:11:00', '16:09:00', '2022-03-17', 'Minggu'),
(9, 'Tri Andika', '2019220023', 'Dhamayanti, S. Kom., M.T.I', 'Dona Marcellina, M.Kom', '', 'K. Ghazali, M. Kom', 'Imelda Saluza, S. Si., M. Sc', 'B205', '16:51:00', '16:52:00', '2022-03-08', 'Minggu'),
(10, 'Ajeng Armadi Rani', '20192200040', 'Dhamayanti, S. Kom., M.T.I', 'Dona Marcellina, M.Kom', '', 'Hendra Di Kesuma, S. Kom., M. Cs', 'Dr. Juhaini, SH., MM', 'B204', '16:51:00', '16:52:00', '2022-03-07', 'Kamis'),
(11, 'Debi Lestiana', '2019220000', 'K. Ghazali, M. Kom', 'John Roni Coyanda, S. Kom., MM', '', 'Hendra Di Kesuma, S. Kom., M. Cs', 'Hendra Di Kesuma, S. Kom., M. Cs', 'B204', '16:52:00', '16:53:00', '2022-03-08', 'Jum\'at'),
(12, 'M Rizky Juni Yanas', '2019220025', 'Dhamayanti, S. Kom., M.T.I', 'Dhamayanti, S. Kom., M.T.I', 'Dhamayanti, S. Kom., M.T.I', 'Dhamayanti, S. Kom., M.T.I', 'Dhamayanti, S. Kom., M.T.I', 'B204', '14:30:00', '14:50:00', '2022-04-10', 'Selasa'),
(13, 'M Rizky Juni Yanas', '2019220025', 'Dhamayanti, S. Kom., M.T.I', 'Dhamayanti, S. Kom., M.T.I', '', 'Dhamayanti, S. Kom., M.T.I', 'Dhamayanti, S. Kom., M.T.I', 'B204', '14:44:00', '14:45:00', '2022-04-10', 'Jum\'at'),
(14, 'M Rizky Juni Yanas', '2019220025', 'Dhamayanti, S. Kom., M.T.I', 'Dhamayanti, S. Kom., M.T.I', 'Dhamayanti, S. Kom., M.T.I', 'Dhamayanti, S. Kom., M.T.I', 'Dhamayanti, S. Kom., M.T.I', 'B204', '14:52:00', '14:53:00', '2022-04-10', 'Rabu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_namadosen`
--

CREATE TABLE `tbl_namadosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_namadosen`
--

INSERT INTO `tbl_namadosen` (`id`, `nama`) VALUES
(5, 'Dr. Juhaini, SH., MM'),
(6, 'Dona Marcellina, M.Kom'),
(7, 'Hendra Di Kesuma, S. Kom., M. Cs'),
(8, 'Dhamayanti, S. Kom., M.T.I'),
(9, 'John Roni Coyanda, S. Kom., MM'),
(10, 'K. Ghazali, M. Kom'),
(11, 'Imelda Saluza, S. Si., M. Sc'),
(12, 'Nining Ariati, M. Kom');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id` int(11) NOT NULL,
  `ruangan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`id`, `ruangan`) VALUES
(2, 'B204'),
(3, 'B205');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `n_id` int(15) NOT NULL,
  `email` varchar(64) NOT NULL,
  `image` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `editable` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `n_id`, `email`, `image`, `password`, `role_id`, `is_active`, `editable`, `date_created`) VALUES
(1, 'Admin Fakultas', 0, 'admin@gmail.com', 'pngegg.png', '$2y$10$X6zGq.kHuCoKSYZ8mP3y7uodmj7mG.gw8LIDJjMktz5jU..JZ.z1i', 1, 1, 0, 1645547440),
(2, 'Dosen', 1111111, 'dosen@gmail.com', 'prodile1.png', '$2y$10$IDw2vKALl6aEPEq.8zzHUutRAMT6KgAvy.UJYvRuq8uFpWUG.nZd6', 2, 1, 0, 1645547518),
(3, 'Mahasiswa', 2019220030, 'mahasiswa@gmail.com', 'mahasiswa.png', '$2y$10$e3Z/an5ZyvmQdDf2i4A4/.Bhu2kpbQRYV4HUfhcTdJxEA6OmxR6S.', 3, 1, 1, 1646667798),
(4, 'Dosen 2', 2222222, 'dosen2@gmail.com', 'default.jpg', '$2y$10$4ERxaPbaikOPWp//g.Ii/OIR6kgFsIduYODqDcvc4jeoDkh8djxpC', 2, 1, 0, 1646810154),
(22, 'M Rizky Juni Yanas', 2019220025, '2019220025@students.uigm.ac.id', 'default.jpg', '$2y$10$yvXcAbWM/ExNqNBu2f/DquLa/7YLnI9eY11cKCIedgb7sSHmXLdoa', 3, 1, 0, 1649356757);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) CHARACTER SET utf8 NOT NULL,
  `token` varchar(128) CHARACTER SET utf8 NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, '@student.uigm.ac.id', 'HOTdP3bCCLM6pb8WAxrTysr3NAV221bBwkEROYzo720=', 1649351208),
(2, 'student.uigm.ac.id', 'RgNIntONRCElmYT5zHmyE8jJ/s5DTWmljyAsu3107as=', 1649351409),
(3, '2019220025@student.uigm.ac.id', 'nUYxKtWYAgq4GgGmiLrrlFDGHWX4NpYL/HMUM5ap5l0=', 1649353085),
(6, 'admin@gmail.com', 'BbsILZAw9ozs2xo/D3r5KyqgqF72/0FnwncXuCcZVog=', 1649355186);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_file_balasan`
--
ALTER TABLE `tbl_file_balasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_file_bap`
--
ALTER TABLE `tbl_file_bap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_file_laporan`
--
ALTER TABLE `tbl_file_laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_file_soal`
--
ALTER TABLE `tbl_file_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_file_surat`
--
ALTER TABLE `tbl_file_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jsidang_skripsi`
--
ALTER TABLE `tbl_jsidang_skripsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jsidang_ta`
--
ALTER TABLE `tbl_jsidang_ta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_namadosen`
--
ALTER TABLE `tbl_namadosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_file_balasan`
--
ALTER TABLE `tbl_file_balasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_file_bap`
--
ALTER TABLE `tbl_file_bap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_file_laporan`
--
ALTER TABLE `tbl_file_laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_file_soal`
--
ALTER TABLE `tbl_file_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_file_surat`
--
ALTER TABLE `tbl_file_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_jsidang_skripsi`
--
ALTER TABLE `tbl_jsidang_skripsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_jsidang_ta`
--
ALTER TABLE `tbl_jsidang_ta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_namadosen`
--
ALTER TABLE `tbl_namadosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
