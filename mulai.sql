-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2025 at 05:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mulai`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `kodemk` varchar(20) NOT NULL,
  `matakuliah` varchar(100) NOT NULL,
  `pertemuanke` int(11) NOT NULL,
  `topik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `kodemk`, `matakuliah`, `pertemuanke`, `topik`) VALUES
(1, '101', 'Pemrograman web', 4, 'Tugas CRUD'),
(2, '101', 'Pemrograman web', 3, 'bikin CRUD');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nomor_anggota` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` enum('L','P') NOT NULL DEFAULT 'L',
  `prodi` enum('TIF','IND','PET') NOT NULL DEFAULT 'TIF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `kode_buku` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `judul`, `pengarang`) VALUES
(1, 'ITB001', 'Introduction to Algorithms', 'Thomas H. Cormen'),
(2, 'ITB002', 'Clean Code', 'Robert C. Martin'),
(3, 'ITB003', 'The Pragmatic Programmer', 'Andrew Hunt and David Thomas'),
(4, 'ITB004', 'Design Patterns: Elements of Reusable Object-Oriented Software Erich Gamma', ' et al.'),
(5, 'ITB005', 'Code Complete', 'Steve McConnell'),
(6, 'ITB006', 'Computer Networking: A Top-Down Approach', 'Kurose & Ross'),
(7, 'ITB007', 'Artificial Intelligence: A Modern Approach', 'Stuart Russell and Peter Norvig'),
(8, 'ITB008', 'Head First Java', 'Kathy Sierra and Bert Bates'),
(9, 'ITB009', 'Python Crash Course', 'Eric Matthes'),
(10, 'ITB010', 'Hands-On Machine Learning with Scikit-Learn- Keras- and TensorFlow', 'Aurélien Géron'),
(11, 'ITB011', 'The Art of Computer Programming', 'Donald Knuth'),
(12, 'ITB012', 'JavaScript: The Good Parts', 'Douglas Crockford'),
(13, 'ITB013', 'You Don’t Know JS: Scope & Closures', 'Kyle Simpson'),
(14, 'ITB014', 'Effective Java', 'Joshua Bloch'),
(15, 'ITB015', 'Introduction to Computer Security', 'Michael T. Goodrich and Roberto Tamassia'),
(16, 'ITB016', 'Operating System Concepts', 'Abraham Silberschatz'),
(17, 'ITB017', 'Data Structures and Algorithm Analysis in C++', 'Mark A. Weiss'),
(18, 'ITB018', 'Modern Software Engineering', 'David Farley'),
(19, 'ITB019', 'Compilers: Principles- Techniques- and Tools', 'Alfred V. Aho'),
(20, 'ITB020', 'Software Architecture in Practice', 'Len Bass');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `kode_film` varchar(50) NOT NULL,
  `judul_film` varchar(255) NOT NULL,
  `sutradara` varchar(255) NOT NULL,
  `harga` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `kode_film`, `judul_film`, `sutradara`, `harga`) VALUES
(127, 'DA001', 'The Great Escape', 'Sebuah cerita tentang sekelompok tahanan perang yang berusaha melarikan diri dari kamp tahanan Nazi.', '50000'),
(128, 'DA002', 'Inception', 'Seorang pencuri profesional menggunakan mimpi untuk mencuri informasi berharga.', '60000'),
(129, 'DA003', 'The Shawshank Redemption', 'Seorang pria yang dijatuhi hukuman penjara hidup menemukan cara untuk bertahan dan melarikan diri.', '55000'),
(130, 'DA004', 'The Godfather', 'Kisah keluarga mafia yang berusaha mempertahankan kekuasaan mereka.', '70000'),
(131, 'DA005', 'Gladiator', 'Seorang jenderal yang dikhianati berusaha membalas dendam dengan menjadi gladiator.', '65000'),
(132, 'DA006', 'The Dark Knight', 'Batman berusaha menghentikan kekacauan yang diciptakan oleh Joker di Gotham City.', '75000'),
(133, 'DA007', 'Forrest Gump', 'Seorang pria dengan keterbatasan intelektual menjalani kehidupan yang luar biasa.', '45000'),
(134, 'DA008', 'Interstellar', 'Seorang pilot dan tim ilmuwan menjelajah ke luar angkasa untuk mencari planet baru bagi umat manusia.', '80000'),
(135, 'DA009', 'Fight Club', 'Seorang pria yang frustrasi mendirikan klub pertarungan ilegal untuk mengatasi masalah hidupnya.', '60000'),
(136, 'DA010', 'Jurassic Park', 'Tim ilmuwan dan pengunjung berada di sebuah taman hiburan yang dihuni oleh dinosaurus yang hidup kembali.', '70000'),
(137, 'DA011', 'Schindler\'s List', 'Kisah nyata tentang seorang pria yang menyelamatkan lebih dari seribu orang Yahudi selama Holocaust.', '90000'),
(138, 'DA012', 'The Matrix', 'Seorang pria biasa menemukan kenyataan bahwa dunia tempat ia tinggal adalah simulasi komputer.', '50000'),
(139, 'DA013', 'The Lion King', 'Kisah petualangan seekor singa muda yang berusaha mengklaim takhta kerajaan setelah ayahnya meninggal.', '40000'),
(140, 'DA014', 'The Pursuit of Happyness', 'Seorang pria berjuang untuk bertahan hidup dan membangun kehidupan yang lebih baik bagi anaknya.', '55000'),
(141, 'DA015', 'Avatar', 'Seorang mantan marinir terjebak di planet asing dan harus memilih antara dua dunia yang bertentangan.', '85000'),
(142, 'DA016', 'A Beautiful Mind', 'Kisah nyata seorang matematikawan jenius yang berjuang melawan gangguan mental.', '50000'),
(143, 'DA017', '12 Angry Men', 'Sebuah cerita tentang 12 juri yang harus memutuskan nasib seorang pemuda yang dituduh melakukan pembunuhan.', '30000'),
(144, 'DA018', 'The Silence of the Lambs', 'Seorang agen FBI bekerja sama dengan seorang pembunuh berantai untuk menangkap pembunuh lain.', '65000'),
(145, 'DA019', 'Casablanca', 'Dua kekasih bertemu kembali di Casablanca saat Perang Dunia II, dan harus menghadapi kenyataan yang sulit.', '45000'),
(146, 'DA020', 'The Wolf of Wall Street', 'Kisah nyata seorang broker yang terlibat dalam penipuan finansial besar.', '70000'),
(147, 'DA021', 'Spirited Away', 'Seorang gadis muda terjebak di dunia roh dan harus bekerja untuk mencari cara keluar.', '60000'),
(148, 'DA022', 'Back to the Future', 'Seorang remaja yang bepergian ke masa lalu dengan mesin waktu harus memastikan orangtuanya bertemu.', '50000'),
(149, 'DA023', 'The Terminator', 'Seorang robot dari masa depan dikirim untuk membunuh wanita yang akan melahirkan seorang pemimpin revolusi.', '75000'),
(150, 'DA024', 'Saving Private Ryan', 'Sebuah tim tentara Amerika berusaha menyelamatkan seorang prajurit di tengah Perang Dunia II.', '80000'),
(151, 'DA025', 'The Breakfast Club', 'Lima remaja dari latar belakang berbeda terjebak bersama selama hukuman Sabtu dan belajar tentang diri mereka.', '40000'),
(152, 'DA026', 'The Departed', 'Seorang polisi yang menyamar di dunia mafia dan seorang mafia yang menyamar sebagai polisi terjebak dalam permainan kucing dan tikus.', '65000'),
(153, 'DA027', 'The Social Network', 'Cerita tentang pendirian Facebook dan perjuangan hukum yang dihadapi Mark Zuckerberg.', '55000'),
(154, 'DA028', 'The Revenant', 'Seorang pemburu yang dikhianati berjuang untuk bertahan hidup setelah terluka parah di alam liar.', '90000'),
(155, 'DA029', 'The Great Gatsby', 'Seorang pria yang terobsesi dengan cinta masa lalunya terperangkap dalam dunia kemewahan dan kebohongan.', '60000'),
(156, 'DA030', 'The Godfather Part II', 'Melanjutkan kisah keluarga mafia Corleone, dengan masa lalu dan masa depan mereka yang penuh kekerasan.', '70000'),
(157, 'DA031', 'Parasite', 'Sebuah keluarga miskin memasuki kehidupan keluarga kaya dengan cara yang tidak terduga.', '80000'),
(158, 'DA032', 'The Princess Bride', 'Sebuah kisah petualangan fantasi yang penuh dengan cinta, keajaiban, dan karakter unik.', '50000'),
(159, 'DA033', 'The Big Lebowski', 'Seorang pria santai yang terseret dalam konspirasi kejahatan setelah identitasnya disalahgunakan.', '45000'),
(160, 'DA034', 'Goodfellas', 'Kisah nyata tentang kehidupan gangster dan hubungan kompleks di dalam mafia.', '65000'),
(161, 'DA035', 'The Shining', 'Seorang pria yang bekerja sebagai penjaga hotel terisolasi mengalami gangguan psikologis yang berbahaya.', '75000'),
(162, 'DA036', 'Pulp Fiction', 'Cerita terjalin tentang kehidupan para kriminal yang terhubung dalam beberapa kejadian tak terduga.', '70000'),
(163, 'DA037', 'Lord of the Rings: The Fellowship of the Ring', 'Seorang hobbit dan teman-temannya berusaha menghancurkan cincin ajaib untuk menyelamatkan dunia.', '80000'),
(164, 'DA038', 'The Hobbit: An Unexpected Journey', 'Seorang hobbit memulai perjalanan epik untuk membantu sekelompok kurcaci merebut kembali kerajaan mereka.', '70000'),
(165, 'DA039', 'Avatar: The Way of Water', 'Sequel dari Avatar, yang melanjutkan kisah petualangan Jake Sully dan Neytiri di planet Pandora.', '90000'),
(166, 'DA040', 'La La Land', 'Dua orang yang mengejar impian di Los Angeles harus memilih antara cinta dan karier mereka.', '65000'),
(167, 'DA041', 'Mad Max: Fury Road', 'Di dunia pasca-apokaliptik, Max bergabung dengan wanita pemberontak dalam perlawanan melawan tirani.', '75000'),
(168, 'DA042', 'The Incredibles', 'Sebuah keluarga superhero mencoba menyembunyikan identitas mereka sambil melawan penjahat.', '50000'),
(169, 'DA043', 'The Incredibles 2', 'Keluarga superhero kembali beraksi, kali ini dengan Elastigirl memimpin, sementara Mr. Incredible merawat anak-anak.', '55000'),
(170, 'DA044', 'Coco', 'Seorang anak muda yang berkelana ke dunia orang mati untuk mencari keluarga dan mengungkap misteri warisan musiknya.', '50000'),
(171, 'DA045', 'Toy Story', 'Mainan-mainan hidup ketika tidak ada orang di sekitar, dan seorang cowboy mainan berusaha menjadi pemimpin di antara mereka.', '40000'),
(172, 'DA046', 'Zootopia', 'Seekor kelinci polisi bekerja sama dengan seorang penipu untuk mengungkap konspirasi di kota hewan.', '50000'),
(173, 'DA047', 'Finding Nemo', 'Seekor ikan mencari anaknya yang hilang di seluruh samudra.', '45000'),
(174, 'DA048', 'Moana', 'Seorang gadis muda melakukan perjalanan epik untuk menyelamatkan pulau dan orang-orangnya.', '60000'),
(175, 'DA049', 'Frozen', 'Dua saudari berjuang untuk mengatasi kekuatan sihir yang tak terkendali dan menyelamatkan kerajaan mereka.', '50000'),
(176, 'DA050', 'Shrek', 'Seekor ogre hijau berusaha menyelamatkan putri yang dikurung dan menjalani petualangan lucu.', '45000');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `kodemk` varchar(10) DEFAULT NULL,
  `matakuliah` varchar(255) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `ruangan` varchar(50) DEFAULT NULL,
  `dosen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `kodemk`, `matakuliah`, `kelas`, `hari`, `waktu`, `ruangan`, `dosen`) VALUES
(4, '1010', 'Pemrograman Web', 'A', 'Rabu', '08:00:00', 'Lab', 'Pak Freddy'),
(5, '1010', 'Pemrograman Web', 'A', 'Rabu', '23:43:00', 'Lab', 'Pak Freddy');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(11) NOT NULL,
  `kodemk` varchar(20) NOT NULL,
  `namamk` varchar(255) NOT NULL,
  `sks` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kodemk`, `namamk`, `sks`, `prodi`) VALUES
(5, '23', 'Pemrograman web', 20, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `matakuliah` varchar(100) NOT NULL,
  `nilai_kehadiran` float NOT NULL,
  `nilai_tugas` float NOT NULL,
  `nilai_uts` float NOT NULL,
  `nilai_uas` float NOT NULL,
  `nilai_akhir` float GENERATED ALWAYS AS (0.1 * `nilai_kehadiran` + 0.2 * `nilai_tugas` + 0.3 * `nilai_uts` + 0.4 * `nilai_uas`) STORED,
  `mutu` char(2) GENERATED ALWAYS AS (case when `nilai_akhir` >= 85 then 'A' when `nilai_akhir` >= 75 then 'B' when `nilai_akhir` >= 65 then 'C' when `nilai_akhir` >= 55 then 'D' else 'E' end) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `nim`, `nama`, `matakuliah`, `nilai_kehadiran`, `nilai_tugas`, `nilai_uts`, `nilai_uas`) VALUES
(2, '123123', 'musrid', 'agama', 90, 90, 90, 90),
(3, '220511056', 'Dandy Royyan Firdaus', '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id` int(11) NOT NULL,
  `nomor_bukti` varchar(10) NOT NULL,
  `nomor_anggota` varchar(10) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `dipinjam` tinyint(1) NOT NULL DEFAULT 0,
  `dikembalikan` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pinjamdetail`
--

CREATE TABLE `pinjamdetail` (
  `id` int(11) NOT NULL,
  `pinjam_id` int(11) NOT NULL,
  `kode_buku` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `sandi` varchar(255) NOT NULL,
  `level` enum('admin','mahasiswa','dosen') NOT NULL DEFAULT 'mahasiswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `nohp`, `sandi`, `level`) VALUES
(14, 'dandy@gmail.com', 'Dandy', '081382534360', '$2y$10$9o1ircjwNKJWrW5kYyFCxO9Bkt9lycjUJFnn7iFszTiFGGWTKu6Zu', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_anggota` (`nomor_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_buku` (`kode_buku`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kodemk` (`kodemk`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomor_bukti` (`nomor_bukti`);

--
-- Indexes for table `pinjamdetail`
--
ALTER TABLE `pinjamdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pinjamdetail`
--
ALTER TABLE `pinjamdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
