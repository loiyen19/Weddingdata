-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 04:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbwedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `ID_admin` int(6) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Nama_lengkap` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `No_telp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`ID_admin`, `Username`, `Password`, `Nama_lengkap`, `Email`, `No_telp`) VALUES
(1, 'Admin', 'admin', 'Loiyen,S.kom', 'admin@gmail.com', 822505908);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bayar`
--

CREATE TABLE `tbl_bayar` (
  `ID_bayar` int(6) NOT NULL,
  `ID_order` int(6) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Nominal` int(15) NOT NULL,
  `Bank` varchar(100) NOT NULL,
  `Rekening` varchar(50) NOT NULL,
  `Gambar` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bayar`
--

INSERT INTO `tbl_bayar` (`ID_bayar`, `ID_order`, `Nama`, `Nominal`, `Bank`, `Rekening`, `Gambar`, `Status`, `Date_created`) VALUES
(10, 34, 'candara', 7326000, 'BRI', '1233141412414', '4-8-181x3009.jpg', 'Berhasil', '2023-12-13 08:14:23'),
(11, 33, 'loiyen', 5700000, 'BRI', '1231-12312-1231-122', '4-8-181x30010.jpg', 'Berhasil', '2023-12-13 08:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `ID_customer` int(6) NOT NULL,
  `Nama_lengkap` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Rekening` varchar(50) NOT NULL,
  `Telfon` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Gambar` varchar(50) NOT NULL,
  `Date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`ID_customer`, `Nama_lengkap`, `Password`, `Alamat`, `Rekening`, `Telfon`, `Email`, `Gambar`, `Date_created`) VALUES
(4, 'Loiyen,S.kom', '12345', 'yogyakarta', '21474821233647', '082250590837', 'loiyenten@gmail.com', '', '2023-11-15'),
(6, 'admin', 'admin', 'Baciro, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55225', '123141', '123412', 'blatukgg@gmail.com', 'alam3.jpg', '2023-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hubungi`
--

CREATE TABLE `tbl_hubungi` (
  `ID_hubungi` int(6) NOT NULL,
  `ID_customer` int(6) NOT NULL,
  `Subjek` varchar(100) NOT NULL,
  `Pesan` text NOT NULL,
  `Tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hubungi`
--

INSERT INTO `tbl_hubungi` (`ID_hubungi`, `ID_customer`, `Subjek`, `Pesan`, `Tanggal`, `Email`) VALUES
(1, 4, 'kesalahan pesanan ', 'hai kak', '2023-12-13 09:11:07', 'loiyenten@gmail.com'),
(2, 4, 'kanaln', 'daffafdafda', '2023-12-13 09:11:44', 'blatukgg@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE `tbl_image` (
  `ID_image` int(6) NOT NULL,
  `ID_produk` int(6) NOT NULL,
  `Image` varchar(150) NOT NULL,
  `Date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`ID_image`, `ID_produk`, `Image`, `Date_created`) VALUES
(3, 17, '4b7a7d0cb0b6b6b2b3f91d41f7eab3051.jpg', 2023),
(4, 17, 'a01a72260d38610d44bddbf835e3d1e71.jpg', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `ID_kategori` int(6) NOT NULL,
  `Kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`ID_kategori`, `Kategori`) VALUES
(7, 'Dekorasi Pernikahan'),
(8, 'Mc'),
(9, 'Catering'),
(10, 'Fotografi dan Videografi'),
(11, 'Gedung'),
(12, 'Hiburan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `ID_order` int(6) NOT NULL,
  `ID_customer` int(6) NOT NULL,
  `Total` int(15) NOT NULL,
  `Date_created` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`ID_order`, `ID_customer`, `Total`, `Date_created`, `Status`) VALUES
(33, 4, 5700000, '2023-12-13 14:19:18.293473', 'Sudah Dibayar'),
(34, 4, 7326000, '2023-12-13 08:10:33.688283', 'Sudah Dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item`
--

CREATE TABLE `tbl_order_item` (
  `ID_order_item` int(6) NOT NULL,
  `ID_orders` int(6) NOT NULL,
  `ID_produk` int(6) NOT NULL,
  `Quantity` int(15) NOT NULL,
  `Price` int(15) NOT NULL,
  `Tgl_order` date NOT NULL,
  `Jam_order` time NOT NULL,
  `Alamat` text NOT NULL,
  `Catatan` text NOT NULL,
  `Chek_box` tinyint(4) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_item`
--

INSERT INTO `tbl_order_item` (`ID_order_item`, `ID_orders`, `ID_produk`, `Quantity`, `Price`, `Tgl_order`, `Jam_order`, `Alamat`, `Catatan`, `Chek_box`, `Status`) VALUES
(42, 33, 18, 3, 1900000, '2023-12-14', '08:22:00', 'yogyakarta', '', 0, 'selesai'),
(43, 34, 23, 1, 7326000, '2023-12-13', '13:13:00', 'Jl. Ring Road Utara, Ngringin, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', 'Mohon diperikasa kemabli dengan teliti', 0, 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `ID_produk` int(6) NOT NULL,
  `ID_kategori` int(6) NOT NULL,
  `Nama_produk` varchar(50) NOT NULL,
  `Deskripsi` text NOT NULL,
  `Harga` int(20) NOT NULL,
  `Tgl_masuk` date NOT NULL,
  `Stok` int(5) NOT NULL,
  `Diskon` int(5) NOT NULL,
  `Gambar` varchar(250) NOT NULL,
  `Ulasan` text NOT NULL,
  `Date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`ID_produk`, `ID_kategori`, `Nama_produk`, `Deskripsi`, `Harga`, `Tgl_masuk`, `Stok`, `Diskon`, `Gambar`, `Ulasan`, `Date_created`) VALUES
(17, 7, 'Dekorasi Pelaminan Dan Panggung Ukuran 4 Meter', 'Dengan Paket Dekorasi Pernikahan yang kami tawarkan sudah termasuk Desain Pelaminan berukuran 4 meter, banyak konsep dan tema yang kami miliki, bahkan bila anda menginginkan desain tertentu kami juga dapat memenuhinya. Soal harga jelas masih utuh, namun apabila menginginkan bahan atau perlengkapan khusus yang tergolong high end pasti dikenakan sedikit tambahan biaya sesuai dengan kualitasnya.\r\nApabila Anda menginginkan ukuran yang lebih lebar beserta Dekorasi khususnya, kami tawarkan dengan harga Rp. 1.000.000,- per meter. Dengan ukuran yang lebih lebar akan menambah nilai Estetika pada Pelaminan anda dan tentunya akan terlihat lebih wah. Apalagi bila diberi Background putih polos full pada bagian belakangnya, tampilan Dekorasi Pernikahan Pelaminan tersebut akan terkesan lebih menawan. Soal Background kami menyediakan dari yang putih polos, minimal pemasangan 4 meter Background dengan harga Rp. 150.000,- .', 1000000, '2023-12-06', 5, 99, 'DSC_0275.JPG', '', 2023),
(18, 7, 'Dekorasi Pintu Masuk', 'Yang tak kalah penting pada Paket Pernikahan kami adalah Dekorasi Pintu Masuk. Ya, dalam satu harga sudah termasuk Pintu Masuk yang indah, soal desain bisa dipesan sesuai selera, bahkan bila tidak ingin menggunakan Dekorasi Pintu Masuk kami juga memberikan potongan harga. Lalu apa jadinya bila tanpa Pintu Masuk ? Mungkin suasana Pesta kurang timbul dan terkesan ala kadarnya.', 2000000, '2023-11-02', 5, 95, 'DSC_0482.JPG', '', 2023),
(20, 7, 'Dekorasi Pelaminan All Konsep Full Bunga Fresh 7 -', 'Untuk Panggung dan Gebyok Pelaminan pastinya langsung kami hadirkan dengan Dekorasi yang terbaik, sebelum kami aplikasikan tentunya anda dapat memilih Dekorasi sesuai selera. Dari Daniico Wedding Planner sendiri menghadirkan hingga puluhan Dekorasi Gebyok dan Panggung Pelaminan, sehingga anda juga harus lebih teliti dalam memilihnya agar pada hari-H nanti semua sesuai yang diharapkan.Ya, dengan Harga Dekorasi Pernikahan yang hanya 4 jutaan ini sudah mendapatkan Dekorasi Gebyok berukuran 4 Meter beserta Panggungnya. Selebihnya Kursi Pelaminan eksklusif sesuai tema gebyok yang anda pilih, bahkan selaras dengan setiap busana pengantin yang akan anda pilih nantinya. ', 4500000, '2023-12-03', 2, 94, 'IMG_20210725_2013001.jpg', '', 2023),
(21, 7, 'Dekorasi Pernikahan Jepang', 'Bunga Sakura merupakan bunga khas Jepang yang hanya mekar setahun sekali. Bayangkan jika bunga dari pohon Sakura yang cantik ini dijadikan sebagai inspirasi dalam membuat dekorasi pelaminan di hari pernikahanmu. Dekorasi pelaminan yang disebut dengan tema cherry blossom ini didominasi oleh warna merah muda, sesuai dengan warna bunga ini.\r\n\r\nCherry blossom identik dengan dekorasi yang penuh dengan bunga berwarna pink cerah. Tatalah bunga tersebut di berbagai sudut ruang agar terlihat lebih ceria dan romantis. Menambahkan tanaman hias gantung juga bisa dijadikan pilihan. Kombinasikan dengan perpaduan warna terang seperti putih yang membawa kesan sederhana namun romantis.', 12000000, '2023-11-01', 2, 97, 'decoration_jepang.jpg', '', 2023),
(22, 7, 'Dekorasi Pernikahan taman dalam ruangan', 'Pesta pernikahan di luar ruangan dengan tema dekorasi pernikahan taman atau kebun memang sangat menarik, terkesan beda dan santai dibandingkan dengan pesta pernikahan pada umumnya. Nggak harus di luar ruangan, kamu tetap bisa mengadakan pesta pernikahan di dalam ruangan loh.\r\n\r\nKehadiran dedaunan dan bunga-bunga palsu yang mengisi dekorasi pelaminan akan memperkuat tema garden party yang kamu impikan. Gantungkan lampu yang juga dikelilingi dedaunan dan warna-warni bunga sebagai penerangan sekaligus pelengkap dekorasi pelaminan.', 10000000, '2023-11-14', 2, 80, 'dekorasi_pernikahan_taman_dalam_ruangan.jpg', '', 2023),
(23, 7, ' Dekorasi Pernikahan Tema Shabby Chic', 'Tema shabby chic mungkin tidak asing lagi bagi sebagian besar orang. Bila kamu termasuk tipe orang yang feminin sekaligus penyuka benda antik, tema shabby chic bisa menjadi pilihan tema dekorasi pelaminan yang paling pas.\r\n\r\nDiambil dari kata “shabby” yang dalam Bahasa Indonesia berarti usang. Maka, tema ini mengusung segala sesuatu yang kuno dan antik. Dengan sedikit sentuhan dan kreativitas, benda-benda kuno tersebut pun disulap dan tampil chic. Maka disebutlah sebagai shabby chic. Hampir mirip dengan tema desain vintage, shabby chic merupakan gabungan antara gaya klasik, desain retro vintage itu sendiri.', 7400000, '2023-10-11', 2, 99, 'dekorasi_pernikahan_tema_shabby_chic.jpg', '', 2023),
(24, 7, 'Dekorasi Pernikahan ala Kerajaan Eropa', 'Siapa yang tak suka dengan dekorasi pelaminan luar biasa megah dan mewah bak pernikahan di negeri dongeng? Sang mempelai seperti pangeran dan putri raja dalam sehari. Untuk mewujudkannya, tidak sesulit yang kamu bayangkan kok. Kamu cukup mencari backdrop 3 dimensi yang tampak megah.\r\n\r\nTapi, dekorasi pelaminan tidak cukup dengan backdrop saja. Penggunaan furnitur yang sesuai pun patut dipertimbangkan, seperti sofa yang terlihat mewah dan elegan atau kursi-kursi minimalis dengan warna yang senada dengan warna latar pelaminan.', 23000000, '2023-12-09', 3, 98, 'Dekorasi-Pernikahan-eropa.jpg', '', 2023),
(25, 11, 'Taciro Grand Ballroom', 'Tentang Gedung Ini : \r\nPemakaian venue 5 Jam\r\nDekorasi pelaminan standard’\r\nPelaminan utama termasuk gazebo, standing flower, mini garden, panggung kata, decor meja registrasi dan Angpao\r\nRuang tunggu pengantin\r\nLayar screen dan projector\r\nKursi Tiffany\r\n2 Buku tamu\r\n5 Meja roundtable\r\nSound system and lighting\r\n', 124000000, '2023-12-06', 1, 99, 'taciro-grand-ballroom-e1660115266193.jpeg', '', 2023),
(26, 11, 'Sri Melayu Ar Rahmah', 'Pelaminan Full dekorasi gedung Sri Melayu Ar-Rahmah, Prasaman untuk 1000 pax,Pemakaian ruangan selama 7 jam\r\n,Ruangan VIP, Balkon, Ruangan make up & Ruangan tunggu keluarga,Private room keluarga kapasitas 100 orang,Pemakaian listrik hingga 10.000 watt,Pemakaian kotak angpao + 4 buah buku tamu,Proyektor + giant screen,Sound system + operator\r\nStandard lighting,Moving head light 2 titik,Gratis pemakaian 15 tenda eksklusif,Petugas keamanan dan parkir', 155000000, '2023-12-04', 1, 95, 'sri-melayu-ar-rahmah-e1660115086326.jpeg', '', 2023),
(27, 11, 'Rajawali Grand Ballroom', 'Pendampingan konsep acara,Konsultasi jumlah dan list tamu reguler, VIP, dan prediksi jumlah catering,Konsultasi dan pembuatan moodboard,Konsultasi pembuatan dan design undangan,Pembuatan list tamu regular & VIP\r\nPembuatan undangan digital,Pembuatan timeline persiapan acara,Fitting max 3 vendor baju,Final fitting H-1 minggu,Family fitting,Technical meeting & Rehearsal', 239000000, '2023-12-06', 1, 100, 'Rajawali-Grand-Ballroom-e1660115509576.jpeg', '', 2023),
(28, 11, 'Gedung Graha KM 7 Palembang', 'Pemakaian gedung selama 5 jam,1000 Kursi eksklusif lengkap\r\nDekorasi standard termasuk pelaminan, photobooth, gazebo dan standing flowers,VIP Room dengan kapasitas 70 orang,Sound system berkualitas,Kapasitas gedung  utama 1000 orang,Full AC,Complimentary 1 keyboardist dan 1 singer', 99000000, '2023-12-06', 1, 95, 'graha-km-7-e1660114366729.jpeg', '', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `ID_rating` int(6) NOT NULL,
  `ID_customer` int(6) NOT NULL,
  `ID_produk` int(6) NOT NULL,
  `Rating` float NOT NULL,
  `Ulasan` text NOT NULL,
  `Date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`ID_rating`, `ID_customer`, `ID_produk`, `Rating`, `Ulasan`, `Date_created`) VALUES
(6, 4, 18, 5, 'sangat rekomen untuk kamu yang memiliki bajet minim.btw trimakasih ', '2023-12-13 04:09:52'),
(7, 4, 18, 5, 'dfadgagagag', '2023-12-13 04:11:12'),
(8, 4, 18, 5, 'sangat rekomendet', '2023-12-13 04:11:53'),
(9, 4, 17, 5, 'dekorasi nya matapp', '2023-12-13 04:12:20'),
(10, 4, 17, 4, 'sangat memuaskan hasilnya.trimakasih ', '2023-12-13 04:13:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `ID_rekening` int(6) NOT NULL,
  `Nama_rekening` varchar(100) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `No_rekening` varchar(100) NOT NULL,
  `Date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`ID_rekening`, `Nama_rekening`, `Nama`, `No_rekening`, `Date_created`) VALUES
(1, 'Bank BRI ', 'Loiyen', '1111111111122345', '2023-11-28 17:14:08'),
(2, 'Bank BNI', 'Loiyen', '2112-1231-1231-1', '2023-11-28 19:22:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`ID_admin`);

--
-- Indexes for table `tbl_bayar`
--
ALTER TABLE `tbl_bayar`
  ADD PRIMARY KEY (`ID_bayar`),
  ADD KEY `ID_order` (`ID_order`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`ID_customer`);

--
-- Indexes for table `tbl_hubungi`
--
ALTER TABLE `tbl_hubungi`
  ADD PRIMARY KEY (`ID_hubungi`),
  ADD KEY `ID_customer` (`ID_customer`);

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`ID_image`),
  ADD KEY `ID_produk` (`ID_produk`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`ID_kategori`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`ID_order`),
  ADD KEY `ID_customer` (`ID_customer`);

--
-- Indexes for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD PRIMARY KEY (`ID_order_item`),
  ADD KEY `ID_orders` (`ID_orders`),
  ADD KEY `ID_produk` (`ID_produk`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`ID_produk`),
  ADD KEY `ID_kategori` (`ID_kategori`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`ID_rating`),
  ADD KEY `ID_customer` (`ID_customer`),
  ADD KEY `ID_produk` (`ID_produk`);

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`ID_rekening`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `ID_admin` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bayar`
--
ALTER TABLE `tbl_bayar`
  MODIFY `ID_bayar` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `ID_customer` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_hubungi`
--
ALTER TABLE `tbl_hubungi`
  MODIFY `ID_hubungi` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `ID_image` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `ID_kategori` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `ID_order` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  MODIFY `ID_order_item` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `ID_produk` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `ID_rating` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `ID_rekening` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bayar`
--
ALTER TABLE `tbl_bayar`
  ADD CONSTRAINT `tbl_bayar_ibfk_1` FOREIGN KEY (`ID_order`) REFERENCES `tbl_order` (`ID_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_hubungi`
--
ALTER TABLE `tbl_hubungi`
  ADD CONSTRAINT `tbl_hubungi_ibfk_1` FOREIGN KEY (`ID_customer`) REFERENCES `tbl_customer` (`ID_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD CONSTRAINT `tbl_image_ibfk_1` FOREIGN KEY (`ID_produk`) REFERENCES `tbl_produk` (`ID_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`ID_customer`) REFERENCES `tbl_customer` (`ID_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD CONSTRAINT `tbl_order_item_ibfk_1` FOREIGN KEY (`ID_orders`) REFERENCES `tbl_order` (`ID_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_item_ibfk_2` FOREIGN KEY (`ID_produk`) REFERENCES `tbl_produk` (`ID_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `tbl_produk_ibfk_1` FOREIGN KEY (`ID_kategori`) REFERENCES `tbl_kategori` (`ID_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD CONSTRAINT `tbl_rating_ibfk_1` FOREIGN KEY (`ID_produk`) REFERENCES `tbl_produk` (`ID_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_rating_ibfk_2` FOREIGN KEY (`ID_customer`) REFERENCES `tbl_customer` (`ID_customer`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
