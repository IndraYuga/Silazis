-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2024 at 09:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lazis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id_artikel` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text DEFAULT NULL,
  `kategori` enum('pendidikan','kesehatan','kemanusiaan','dakwah','ekonomi') DEFAULT NULL,
  `tanggal` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_artikel`
--

INSERT INTO `tb_artikel` (`id_artikel`, `gambar`, `judul`, `isi`, `kategori`, `tanggal`) VALUES
(59, '6569db8f21b56_kuitansi.png', 'Pelatihan Bersama Membangun Kominfo', '<div class=\"xdj266r x11i5rnm xat24cr x1mh8g0r x1vvkbs x126k92a\">\r\n<div dir=\"auto\">acc min</div>\r\n</div>\r\n<div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\">\r\n<div dir=\"auto\">Ok dipostingan kali ini, SAYA MELAKUKAN KLARIFIKASI DAN PERMINTAAN MAAF YG SEBESAR BESARNYA kepada admin dan member lainnya karna saya telah melanggar rules grub yaitu \"menggunakan kata kata kasar/sensitif\", sekaligus memposting ulang dan Merevisi postingan saya yang sebelumnya. Karna saya dimunted sementara tapi lama nunggunya jadi ganti akun ajalah. Dan menyimpulkan dari postingan saya sebelumnya semakin terbukti(banyak yg gak Terima bahkan diluar konteks pembahasan malah muncul komenan komenan yg mengacu pada LJ) secara tidak sengaja yg komen tersinggung mengenai karakter kesukaannya yaitu Jonggun maka mengalihkan pembahasan dgn membahas LJ, dan hal ini terbukti BAHWASANYA JONGGUN MERUPAKAN CHARACTER YANG OVERRATED.</div>\r\n</div>\r\n<div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\">\r\n<div dir=\"auto\">ALASAN PARK JONGGUN MENJADI KARAKTER YANG OVERRATED</div>\r\n<div dir=\"auto\">BESERTA DAMPAKNYA</div>\r\n</div>\r\n<div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\">\r\n<div dir=\"auto\">Alasan :</div>\r\n<div dir=\"auto\">1.Memang secara Feast nyata bener bener kuat dan cocok berada di God tier.</div>\r\n<div dir=\"auto\">2.Selalu tampil keren, cool and Badas.</div>\r\n<div dir=\"auto\">3.dicap sebagai karakter yang bakal ada sampai akhir cerita lookism (ga bakal mati / ga bakal di matiin ni char oleh PTJ) .</div>\r\n</div>\r\n<div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\">\r\n<div dir=\"auto\">Dampak Jonggun overrated :</div>\r\n<div dir=\"auto\">1.Selalu mencari alasan/bukti apapun ketika dibanding banding kan dengan chara lain supaya dia terlihat lebih superior daripada char god tier lainnya padahal hanya setara Junggo.</div>\r\n<div dir=\"auto\">2.Banyak Teori teori/asumsi yang muncul mengenai salah satu char yang bakal mati karna dekat dengan Jonggun(dekat bukan selalu tentang teman) terutama yg paling banyak teori Junggoat mati karna ada siluet Junggoat berdarah dibagian kepala/leher.</div>\r\n<div dir=\"auto\">3.MUNCOEL SIFAT ASELI JONGGOD</div>\r\n</div>\r\n<div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\">\r\n<div dir=\"auto\">Nb: intinya gini.. Jonggun itu memang hebat dan aku sebagai fans juga tidak melebihi lebih kan kehebatannya (tidak mendewakannya) namun bukan berarti juga saya Underrated terhadap Jonggun, hanya saja menurutku pribadi Jonggun merupakan salah satu character yg termasuk OVERRATED di PTJ univers.</div>\r\n</div>', 'pendidikan', '2023-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_donasi`
--

CREATE TABLE `tb_donasi` (
  `id_donasi` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` enum('Zakat Profesi/Penghasilan','Zakat Pedagang','Zakat Pertanian','Zakat Hewan Ternak','Zakat Emas','Zakat Investasi','Zakat Tabungan','Zakat Rikaz','Zakat Fitri','Infaq','') NOT NULL,
  `nominal` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_donasi`
--

INSERT INTO `tb_donasi` (`id_donasi`, `nama`, `kategori`, `nominal`, `keterangan`, `tanggal`, `gambar`) VALUES
(8, 'Sholahuddin Hasan', 'Zakat Pedagang', '10.000', '', '2023-11-27', '6564ab9de2acd_Screenshot (7).png'),
(9, 'admin', 'Zakat Pedagang', '200.000', '', '2023-11-29', '6566d19c62159_tutor3.jpeg'),
(10, 'Akan Sufara', 'Zakat Fitri', '500.000', 'bismillah berkah', '2023-11-29', '656704348ce95_tutor3.jpeg'),
(11, 'Sholahuddin Hasan', 'Zakat Pedagang', '35.000', 'reerer', '2023-11-29', '6567273f2d687_qr (1).jpeg'),
(12, 'hamba allah', 'Zakat Pedagang', '200.000', 'wewe', '2023-11-29', '65672c9a72b92_tutor3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_info`
--

CREATE TABLE `tb_info` (
  `id_info` int(15) NOT NULL,
  `NamaInfo` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `GambarPaths` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`GambarPaths`)),
  `deskripsi1` text NOT NULL,
  `deskripsi2` text NOT NULL,
  `program` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`program`)),
  `prog1` text NOT NULL,
  `prog2` text NOT NULL,
  `prog3` text NOT NULL,
  `prog4` text NOT NULL,
  `prog5` text NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_info`
--

INSERT INTO `tb_info` (`id_info`, `NamaInfo`, `gambar`, `GambarPaths`, `deskripsi1`, `deskripsi2`, `program`, `prog1`, `prog2`, `prog3`, `prog4`, `prog5`, `kategori`) VALUES
(20, 'Pendidikan', '656b092b8347e_Pilar Pendidikan.png', '[\"images/2.png\",\"images/Screenshot (2).png\",\"images/Screenshot (4).png\"]', 'Program pendidikan di Lazismu sebagai peningkatan mutu Sumber Daya Manusia dengan menjalankan berbagai program di bidang pendidikan baik pemenuhan sarana ataupun biaya pendidikan.', 'Selain dalam menjalankan amanat Undang-undang Dasar 1945 untuk berkontribusi dalam mencerdaskan kehidupan bangsa, program pendidikan lazismu untuk terus menghasilkan SDM yang memiliki inovasi dan keilmuan di dalam bidangnya dalam mendukung pembangunan negara.', '[\"School Kit\",\" Beasiswa mentari\",\" Beasiswa Sang Surya\",\" Pendidikan Disabilitas\",\" LPG\"]', 'Membantu pendanaan sekolah', 'Beasiswa bagi anak kurang mampu jrnjang TK sampai SMA se-derajat', 'Beasiswa bagi para mahasiswa yang layak mendapatkan bantuan', 'Bantuan untuk penyandang disabilitas untuk melakukan studi', 'Bantuan untuk Guru', 'pendidikan'),
(21, 'Ekonomi', '656b095755e34_Pilar Ekonomi.png', '[\"../images/download (1).jpg\",\"../images/Ryujin itzy (1).jpg\",\"../images/Royal-Tenenbaums-Colour-Palette_1.jpg\"]', 'Program Ekonomi  diarahkan untuk mendorong kemandirian dan meningkatkan pendapatan dan kesejahteraan serta semangat kewirausahaan melalui kegiatan ekonomi dan pembentukan usaha yang halal dan memberdayakan', '', '[\"Pemberdayaan UMKM\",\" Ketahanan Pangan\"]', 'Pemberdayaan UMKM mencakup ', '', '', '', '', ''),
(22, 'Dakwah', '656b09653615b_Pilar Sosial Dakwah.png', '[\"../images/Screenshot (11).png\",\"../images/Screenshot (12).png\",\"../images/Screenshot (14).png\"]', 'Program  Dakwah  diarahkan untuk gerakan dakwah kemasyarakatan yang berdampak langsung dalam menciptakan masyarakat Islami dan menjangkau partisipasi aktif kelompok masyarakat rentan baik di daerah miskin perkotaan maupun di daerah terpencil dengan semangat dakwah Islam.', '', '[\"DaI 3T\",\" Back to Masjid\"]', '(Terpencil, Terpelosok, Terluar)', 'Membangun kembali masjid yang dirasa kurang layak dipakai', '', '', '', ''),
(23, 'Kemanusiaan', '656b096dea8ed_Pilar Kemanusiaan.png', '[\"../images/Screenshot (6).png\",\"../images/Screenshot (14).png\",\"../images/Screenshot (29).png\"]', 'Program Sosial Kemanusian Lazismu Sidoarjo bertujuan  dalam membantu masalah sosial yang diakibatkan oleh faktor eksternal kehidupan mustahik.', 'Penyaluran zakat dan donasi ke pilar kemanusiaan merupakan konsistensi Lazismu untuk terus membantu masyarakat yang terkena bencana tanpa memandang latar belakang.', '[\"Lazismu Bermadu\",\" Lazismu TaBa\",\" Lazismu Peduli\"]', 'Membangun ulang bagi mereka yang memiliki rumah kuirang layak', 'Membantu berbagai bencana yang melanda masyarakat', 'Bantuan bagi para kaum yang dirasa layak mendapatkan bantuan', '', '', ''),
(24, 'Kesehatan', '656b0979dd953_Pilar Kesehatan.png', '[\"../images/WhatsApp-Image-2023-05-23-at-09.47.15.jpeg\",\"../images/WhatsApp-Image-2022-07-04-at-13.15.57.jpeg\",\"../images/WhatsApp-Image-2022-11-15-at-09.44.06.jpeg\"]', 'Program kesehatan Lazismu hadir untuk memenuhi hak mustahik dalam mendapatkan hidup yang berkualitas dengan terpenuhinya layanan kesehatan serta protokol kesehatan.', 'Program kesehatan memberikan layanan pencegahan, edukasi, pengobatan, pendampingan kepada mustahik yang membutuhkan. Terutama selama Pandemi Covid-19 menyerang. Lazismu terus melakukan kegiatan kesehatan di seluruh Indonesia.', '[\"Bantuan Alat Kesehatan\",\" Bantuan Pengobatan\",\" Layanan AmbulanMu\",\" Sayang IbuMu\",\" Cegah Stunting\"]', 'Bantuan untuk meningkatkan alat medis suatu rumah sakit', 'Bantuan biaya untuk pengobatan seorang pasien', 'Layanan untuk operasi ambulan', 'Bantuan bagi ibu', 'Membantu untuk menegah stunting', ''),
(29, 'Lingkungan', '656b1e19e5e66_Pilar Lingkungan.png', '[\"images/\",\"images/\",\"images/\"]', 'Pilar ini bertujuan untuk kehidupan masyarakat dan ekosistem yang lebih baik dalam menjaga keseimbangan alam.', '', '[\"Sayangi Daratmu\",\" Sayangi Lautmu\",\" Penanaman Pohon\"]', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rekening` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(10) NOT NULL,
  `kelas` enum('user','admin') NOT NULL,
  `tenggat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `hp`, `email`, `rekening`, `alamat`, `password`, `kelas`, `tenggat`) VALUES
(1, 'Sholahuddin Hasan', '082141911412', 'indraprayugah@gmail.com', '', '  Ngoro', '123456', '', 20),
(2, 'admin', 'admin', 'mohammad.indraprayogah@yahoo.com', '', 'Desa Ngoro Dusun Ngoro, Kecamatan Ngoro, Kabupaten Mojokerto', 'admin', 'admin', 0),
(3, 'Rizky Rahmahdian Sandy', '082141911412', '', '', '', '123', 'user', 12),
(4, 'Surya Admaria', '082141911413', '', '', '', '1234', 'user', 31),
(5, 'Karya Hudana', '081392754854', '', '', '  Ngoro', '1111', 'user', 0),
(6, 'Akan Sufara', '080808080', 'indraprayugah@gmail.com', '', 'Desa Ngoro Dusun Ngoro, Kecamatan Ngoro, Kabupaten Mojokerto', '147258', 'user', 0),
(7, 'Galuh Reqa Adji', '082131718720', '', '', 'Desa Ngoro Dusun Ngoro, Kecamatan Ngoro, Kabupaten Mojokerto', '123', 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tb_donasi`
--
ALTER TABLE `tb_donasi`
  ADD PRIMARY KEY (`id_donasi`);

--
-- Indexes for table `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tb_donasi`
--
ALTER TABLE `tb_donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `id_info` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
