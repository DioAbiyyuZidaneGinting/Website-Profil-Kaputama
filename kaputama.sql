-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2025 pada 04.50
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaputama`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin') NOT NULL,
  `nia` varchar(20) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `jenis_kelamin` varchar(10) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `full_name`, `email`, `role`, `nia`, `profile_picture`, `created_at`, `jenis_kelamin`, `nama_ayah`, `nama_ibu`, `no_telp`, `alamat`, `tempat_lahir`, `tanggal_lahir`) VALUES
(1, 'asdasd', '$2y$10$z.RjVP7/c0WbVWjyswvNFul78J/GIRhSIn6e8yn6sHIUPHkpiI1BS', 'asdadssa', 'asdasd@gmail.com', 'admin', NULL, 'uploads/profile_pictures/admin-logo-3.png', '2025-01-16 14:44:52', 'Laki-laki', 'asdasd', 'adfadfqe', '02358239', 'dasfsdf', 'sdfdsf', '2024-12-31'),
(2, 'Eunha', '$2y$10$EFzZQolVQGW8eXKcpWEI9OMEkGkJJj/aqSvs4FOlTrMcENEDQ5jS2', 'Eunha Kim', 'eunha@gmail.com', 'admin', NULL, 'uploads/profile_pictures/eunha.jpg', '2025-01-16 14:47:36', 'Perempuan', 'Taecyeon', 'Taeyeon', '08234612', 'Myeongdong', 'Seoul', '1994-06-08'),
(3, 'Sinb', '$2y$10$RRTaI2oa05swSz9laCLQQOk5No4REQp/HhLP9369m929ASwjbSsfu', 'Sinb', 'sinb@gmail.com', 'admin', 'A001', 'uploads/profile_pictures/sinb.jpg', '2025-01-16 14:51:07', 'Perempuan', 'Mingyu', 'Yeri', '0882349572', 'Jl Jambi', 'Seoul', '1999-01-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cards`
--

INSERT INTO `cards` (`id`, `title`, `description`, `link`) VALUES
(2, 'BIAYA PENDIDIKAN', 'Informasi biaya pendidikan di STMIK Kaputama', 'biayapendidikan.php'),
(3, 'Pendaftaran Kuliah', 'Informasi Pendaftaran Kuliah di STMIK Kaputama', 'pendaftarankuliah.php'),
(4, 'Syarat Pendaftaran', 'Informasi Syarat Pendaftaran di STMIK Kaputama', 'syaratpendaftaran.php'),
(5, 'Brosur PMB 2025-2026', 'Informasi biaya pendidikan di STMIK Kaputama', 'brosurpmb.php'),
(6, 'Brosur Kelas Karyawan &amp; RPL', 'Informasi Kelas Karyawan &amp; RPL', 'kelaskaryawan.php');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(1, 'Profile', 'Ini Profile Kaputama'),
(2, 'Layanan Digital', 'Ini adalah deskripsi category Layanan Digital'),
(3, 'Program Studi', 'Ini ada beberapa Program Studi yang ada di STMIK Kaputama'),
(4, 'Fasilitas', 'Terdapat beberapa fasilitas yang berguna di STMIK Kaputama'),
(5, 'UKM', 'terdapat beberapa UKM di kaputama'),
(6, 'Events', 'Ini Category Events Kaputama'),
(7, 'Pakaian', 'Ini adalah beberapa Pakaian Kaputama'),
(8, 'Location', 'lokasi kaputama'),
(11, 'dosen', 'ini dosen kaputama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('dosen') NOT NULL,
  `nidn` varchar(20) NOT NULL,
  `profile_dosen` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `jenis_kelamin` varchar(10) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `username`, `password`, `full_name`, `email`, `role`, `nidn`, `profile_dosen`, `created_at`, `jenis_kelamin`, `nama_ayah`, `nama_ibu`, `no_telp`, `alamat`, `tempat_lahir`, `tanggal_lahir`) VALUES
(1, 'Dita', '$2y$10$bUH6EXHWM4rhxpdJhL7/5OAwLrGxE1GKxZLH2JO7bvj9MgLVRjNUe', 'Dita Karang', 'dita@gmail.com', 'dosen', 'D15904', 'uploads/profile_pictures/dita.jpg', '2025-01-16 10:54:58', 'P', 'Chandra Karang', 'Mega Karang', '08232137412', ' Gedong Tengen', 'Yogyakarta', '1996-12-26'),
(2, 'Xioura', '$2y$10$phsSv36XRmwcyKaQIBFh.erlIYon8yMfrDo.znJNCidj/1Qpoenca', 'Park Xioura', 'xioura@gmail.com', 'dosen', 'D18618', 'uploads/profile_pictures/mark.jpg', '2025-01-16 14:29:30', 'Laki-laki', 'Mark', 'Emma', '0823485124', 'Rambung', 'Binjai', '1986-05-05'),
(3, 'Juliana', '$2y$10$Xcc9zWQOXQxq//YvuOqoG.zDAaOfFzxtv4OxADM83JSRb69D1Apdq', 'Juliana', 'juliana1@gmail.com', 'dosen', 'D74043', 'uploads/profile_pictures/sooyoung.jpg', '2025-01-25 04:57:06', 'Perempuan', 'Charless', 'Violet', '08912378123', 'Stabat', 'Medan', '1977-11-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_mengajar`
--

CREATE TABLE `jadwal_mengajar` (
  `id` int(11) NOT NULL,
  `nidn` varchar(20) DEFAULT NULL,
  `hari` varchar(50) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `nama_mata_kuliah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal_mengajar`
--

INSERT INTO `jadwal_mengajar` (`id`, `nidn`, `hari`, `semester`, `jam_masuk`, `jam_keluar`, `kode`, `nama_mata_kuliah`) VALUES
(2, 'D15904', 'Senin', 'I', '08:00:00', '10:00:00', '45', 'Pemrograman Bergerak'),
(3, 'D15904', 'Selasa', 'II', '08:00:00', '10:00:00', '45', 'Jaringan Komputer'),
(4, 'D15904', 'Selasa', 'II', '12:00:00', '14:00:00', '44', 'Kalkulus'),
(5, 'D15904', 'Rabu', 'I', '08:00:00', '10:00:00', '45', 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `npm` varchar(20) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `jenis_kelamin` varchar(10) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `program_studi_nama` varchar(255) DEFAULT NULL,
  `nidn_pa` varchar(20) DEFAULT NULL,
  `nama_pa` varchar(255) DEFAULT NULL,
  `no_hp_pa` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `username`, `password`, `full_name`, `email`, `role`, `npm`, `profile_picture`, `created_at`, `jenis_kelamin`, `nama_ayah`, `nama_ibu`, `no_telp`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `semester_id`, `program_studi_nama`, `nidn_pa`, `nama_pa`, `no_hp_pa`) VALUES
(1, 'Rose', '$2y$10$r9EpGkxQEaGlVDVGVwSxje8AklrJJfXeS3LaTQLsCQdOb1MATehVm', 'Rose Kim', 'rose@gmail.com', 'user', '2025001', 'uploads/profile_pictures/lisa.jpg', '2025-01-16 10:49:30', 'L', 'Charles', 'Yuju', '08123423412', 'Myeongdong', 'Seoul', '2004-06-16', NULL, NULL, NULL, NULL, NULL),
(2, 'Dio', '$2y$10$YQZJGlpmWoup1u1O29aBReaV2.jLk7UIQfCOCK2xHJD8naBjJceRG', 'Dio Abiyyu Zidane Ginting', 'dio13abiyyu@gmail.com', 'user', '2025002', 'uploads/profile_pictures/dio2.jpg', '2025-01-16 14:23:10', 'Laki-laki', 'Abdullah', 'Evi', '089522177567', 'Gunung Bendahara', 'Tebing Tinggi', '2005-05-13', 3, 'Teknik Informatika', 'D74043', 'Juliana', '08912378123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(1, 'KAPUTAMA', 'Kaputama adalah perguruan tinggi swasta yang terletak di Binjai, Sumatera Utara, dengan akreditasi B. Kampus ini menawarkan berbagai program pendidikan yang mencakup lima jurusan, yang terdiri dari program studi pada jenjang S1 dan D3. Kaputama bertujuan untuk mencetak lulusan yang tidak hanya memiliki kemampuan akademik yang mumpuni, tetapi juga siap menghadapi tantangan dunia kerja dengan keterampilan praktis yang relevan.\r\n\r\nSebagai sebuah institusi pendidikan, Kaputama selalu berupaya menjaga kualitas pengajaran dan fasilitas yang mendukung proses belajar mengajar. Dengan berbagai fasilitas modern dan tenaga pengajar yang berkompeten, Kaputama siap memberikan pengalaman akademik yang lengkap bagi para mahasiswanya. Kampus ini juga mendorong pengembangan karakter dan kemampuan kepemimpinan melalui berbagai kegiatan organisasi dan ekstrakurikuler, menjadikannya pilihan yang tepat bagi calon mahasiswa yang ingin berkembang secara holistik.\r\n\r\nSelain itu, Kaputama menjalin kerjasama dengan berbagai perusahaan dan lembaga untuk mempermudah mahasiswa dalam mengakses peluang magang dan pekerjaan setelah lulus. Dengan fokus pada pengembangan ilmu pengetahuan dan teknologi, Kaputama berkomitmen untuk melahirkan generasi yang inovatif, kompetitif, dan siap berkontribusi positif di masyarakat.', '1734158945Kaputama.jpg', '2025-01-07 08:17:26', 1, 1, 1),
(2, 'Sejarah SIngkat', 'Awal berdirinya STMIK Kaputama melalui pendirian Pusat Pendidikan Pelatihan Informatika Komputer dan Kewirausahaan (P3IK) Kaputama, yang merupakan sebuah lembaga pendidikan dan pelatihan yang dibawah naungan Yayasan Pendidikan Teknologi Informasi Mutiara (YPTIM) oleh Bapak Dr. Parlindungan Purba, SH., MM., (alm) dr. Maria Betty Sitanggang,SpK-K., Drs. Irwanto Tampubolon, M.Pd. dan Dra. Veronika Sitanggang, M.Psi. Kaputama merupakan singkatan dari Karya Putra Utama.\r\n\r\n\r\n\r\nSTMIK Kaputama mendapat izin operasional dari Menteri Pendidikan Nasional RI dengan No. 09/D/O/2003 tanggal 31 Januari 2003 untuk mengelola program pendidikan Diploma 3 (D3) dan Strata 1 (S1) dengan jumlah program studi sebanyak 5 (lima) yaitu; Diploma 3: Manajemen Informatika, Komputerisasi Akuntansi dan Teknik Informatika, Strata 1 : Sistem Informasi dan Teknik Informatika.\r\n\r\n\r\n\r\nDalam perjalanannya terus membenahi diri untuk menjadi institusi yang unggul khususnya dalam bidang informatika dan komputer, dengan melaksanakan penerapan kurikulum pendidikan yang up to date yang sesuai dengan kebutuhan dunia kerja, melaksanakan proses belajar mengajar yang bermutu, mengadakan kerjasama dengan perguruan tinggi dan dunia industri, memberikan beasiswa kepada dosen untuk mengikuti program pendidikan S2 dan S3.\r\n\r\n\r\n\r\nSTMIK Kaputama telah terakreditasi AIPT dengan nilai B oleh BAN-PT No:206/SK/BAN-PT/Akred/PT/2019, dan program studi Sistem Informasi telah Terakreditasi B oleh BAN-PT No:190/SK/BAN-PT/Akred/S/I/2018, Teknik Informatika telah Terakreditasi B oleh BAN-PT No:0908/SK/BAN-PT/Akred/S/VI/2016, Komputerisasi Akuntansi telah Terakreditasi B oleh BAN-PT No:2389/SK/BAN-PT/Ak-PPJ/Dipl-III/IV/2020, Manajemen Informatika telah Terakreditasi B oleh BAN-PT No:3534/SK/BAN-PT/Ak-PPJ/Dpl-III/VI/2020.\r\n\r\n\r\nPada tahun akademik 2018/2019 telah melaksanakan kurikulum yang mengacu kepada KKNI untuk mahasiswa baru dan Kurikulum Berbasis Kompetensi (Kurikulum 2013) untuk mahasiswa lama.', '1734158763Sejarah Singkat.png', '2025-01-07 09:15:18', 1, 1, 0),
(3, 'Visi Misi dan Tujuan', 'Visi\r\nMenjadi perguruan tinggi bidang teknologi informasi yang unggul, profesional, berkarakter, dan berjiwa entrepreneur di Sumatera Utara (Tahun 2027), serta Indonesia (Tahun 2037)\r\n\r\n\r\nMisi\r\n1) Menyelenggarakan manajemen pendidikan yang bermutu tinggi\r\n\r\n2) Menyelenggarakan pendidikan yang unggul, profesional, berkarakter, dan berjiwa entrepreneur di bidang teknologi informasi\r\n\r\n3) Menyelenggarakan pendidikan di bidang teknologi informasi berstandar nasional\r\n\r\n4) Menyelenggarakan penelitian yang berkualitas di bidang teknologi informasi\r\n\r\n5) Menyelenggarakan layanan pengabdian kepada masyarakat yang profesional di bidang teknologi informasi\r\n\r\n\r\nTujuan\r\n1) Menghasilkan mutu pelayanan yang prima bagi kepuasan stakeholder berdasarkan standar manajemen mutu perguruan tinggi\r\n\r\n2) Menghasilkan lulusan yang unggul, profesional, berkarakter, dan berjiwa entrepreneur di bidang teknologi informasi\r\n\r\n3) Menghasilkan mutu pendidikan yang berkualitas melalui hubungan kemitraan Regional, Nasional, dan Internasional\r\n\r\n4) Menghasilkan produk dan inovasi yang berkualitas, untuk meningkatkan daya saing di bidang teknologi informasi\r\n\r\n5)Menghasilkan solusi yang tepat dan nyata, untuk memecahkan permasalahan di masyarakat dalam bidang teknologi informasi', '1734158429JOURNAL.png', '2024-12-14 06:40:29', 1, 1, 0),
(4, 'Sistem Informasi Akademik', 'SIA Kaputama adalah sistem informasi akademik yang dirancang untuk mempermudah pengelolaan dan akses data akademik di Kaputama. Sistem ini menyediakan berbagai fitur yang mendukung mahasiswa, dosen, dan pihak administrasi dalam mengelola informasi terkait kegiatan akademik. Dengan antarmuka yang mudah digunakan dan akses yang cepat, SIA Kaputama memungkinkan mahasiswa untuk memantau perkembangan studi mereka, mulai dari jadwal kuliah, nilai, hingga status absensi.\r\n\r\nDosen dapat mengakses data terkait dengan pengajaran mereka, seperti pengisian nilai dan absensi mahasiswa, sementara pihak administrasi dapat mengelola data akademik dengan efisien, termasuk jadwal ujian dan pengumuman penting lainnya. Sistem ini juga memberikan kemudahan dalam pengolahan data statistik dan laporan akademik yang diperlukan untuk keperluan evaluasi dan perencanaan akademik di Kaputama.\r\n\r\nDengan SIA Kaputama, kampus berkomitmen untuk meningkatkan transparansi, efisiensi, dan kualitas layanan akademik, memberikan pengalaman belajar yang lebih baik bagi seluruh civitas akademika.', '1734161335sia kaputama.png', '2025-01-07 09:13:37', 2, 1, 0),
(5, 'Nilai dan Etika', '1) Bertanggung Jawab\r\n\r\nDengan terbiasa menjalankan perjanjian sesuai kontrak kuliah dan aturan akademik yang berlaku, maka mahasiswa dan lulusan memiliki karakter terbiasa bertanggung Jawab.\r\n\r\n\r\n2) Jujur\r\n\r\nDengan terbiasa melatih diri lurus hati, tidak berbohong dan curang, mengikuti aturan, tulus, ikhlas selama kuliah, maka mahasiswa dan lulusan memiliki karakter Jujur.\r\n\r\n\r\n3) Sopan santun dalam tutur bahasa\r\n\r\nDengan terbiasa melatih diri selalu baik hati, manarik budi bahasanya, manis tutur kata dan sikapnya, suka bergaul dan menyenangkan selama kuliah, maka mahasiswa dan lulusan memiliki karakter sopan santun.\r\n\r\n\r\n4) Berfikir positif\r\n\r\nDengan terbiasa melatih daya cipta dan memiliki kemampuan berfikir positif selama kuliah, maka mahasiswa dan lulusan memiliki karakter Berfikir Positif.\r\n\r\n\r\n5) Mampu bekerja dalam tim\r\n\r\nDengan membiasakan mahasiswa untuk mengerjakan tugas kelompok, maka mahasiswa dan lulusan memiliki karakter mampu bekerja dalam tim.\r\n\r\n\r\n6) Berani\r\n\r\nDengan terbiasa melatih diri memiliki pendirian yang kuat, andal, tabah, kukuh, bisa menyusun skripsi dan tugas dalam waktu terbatas selama kuliah,berani menyampaiakan pendapat maka mahasiswa dan lulusan memiliki karakter berani menyampaikan pendapat.\r\n\r\n\r\n7) Menghargai Sesama\r\n\r\nDengan membiasakan mahasiswa untuk saling menghargai sesama mahasiswa dan dosen memberikan rasa simpatik kepada mahasiswa, maka mahasiswa dan lulusan memiliki karakter menghargai sesama.\r\n\r\n\r\n8) Berpikir Inovatif\r\n\r\nDengan terbiasa melatih diri untuk selalu menjadi pemrakarsa atau memprakarsai kegiatan positif selama kuliah, mengemuka ide-ide baru, maka mahasiswa dan lulusan memiliki karakter berfikir inovatif.\r\n\r\n\r\n9) Jiwa Wirausaha\r\n\r\nDengan terbiasa memberikan tugas yang berhubungan dengan wirausaha untuk beberapa matakuliah yang terkait, maka mahasiswa dan lulusan memiliki karakter jiwa wirausaha.\r\n\r\n\r\n10) Berjiwa Kepemimpinan\r\n\r\nDengan terbiasa melatih diri dalam berorganisasi dan membentuk struktur organisasi dalam kelas, mahasiswa dan lulusan memiliki karakter berjiwa kepemimpinan.', '1734175155nilai.png', '2025-01-07 09:15:34', 1, 1, 0),
(6, 'Lambang atau Logo', 'TOPI TOGA WARNA HITAM\r\nTopi toga hitam melambangkan misi utama dalam menghasilkan alumni yang mencintai, menguasai, mengembangkan dan mengabdikan ilmu pengetahuannya.\r\n\r\n\r\nANAK TANGGA BERWARNA MERAH DAN KUNING KEEMASAN BERJUMLAH SEMBILAN BUAH\r\nAnak tangga semakin ke atas semakin besar melambangkan penguasaan teknologi informasi secara berprogram dan meluas. Warna merah dan kuning keemasan melambangkan unsur keberanian dan kesuksesan/kejayaan. Sembilan buah anak tangga melambangkan jumlah pendiri awal STMIK Kaputama sebanyak 9 orang.\r\n\r\n\r\nPOTONGAN BIDANG BERBENTUK HURUF &rdquo;K&rdquo;\r\nMelambangkan nama almamater, yakni KAPUTAMA yang merupakan kesatuan dari beberapa unsur pendukung pelaksanaan pendidikan.\r\n\r\n\r\nBENTUK ELLIPS BERWARNA BIRU LANGIT\r\nMelambangkan kebulatan tekad yang kuat untuk menguasai teknologi informasi tanpa batas ruang dan waktu.\r\n', '1734175440logo.png', '2025-01-07 09:15:47', 1, 1, 0),
(7, 'Hymne STMIK Kaputama', 'Lembaga pendidikan bermutu tinggi\r\nTempat menimba ilmu dan penelitian\r\nBidang teknologi informasi\r\nBerkualitas dan berkarakter serta berakhlak mulia\r\nPengabdianmu, pelayananmu\r\nMendidik putra putri Indonesia\r\n\r\n\r\nJadi berkualitas dan berkarakter\r\nPendidiknya intelek profesional\r\nSabar dan tangguh serta bijaksana\r\nTri Dharma Perguruan Tinggi\r\nPedoman melaksanakan tugasnya\r\n\r\n\r\nSTMIK KAPUTAMA\r\nUnggul berjiwa usaha digital\r\nProfesional dan bermartabat\r\nSemoga Tuhan melindunginya', '1734175735Hymne.png', '2024-12-14 11:28:55', 1, 1, 0),
(8, 'Mars STMIK Kaputama', 'STMIK Kaputama\r\nBerdiri tegak di Kota Binjai\r\nDengan misi manajemen bermutu\r\nDibidang teknologi dan sistem informasi Indonesia\r\n\r\nSTMIK Kaputama\r\nTugasmu sungguh amat mulia\r\nMendidik putra putri Indonesia\r\n\r\n\r\nMenjadi berkompeten, intelek dan kreatif berkualitas\r\nBerdasarkan Pancasila dan UUD &lsquo;45\r\nTridarma perguruan tinggi pedoman melaksanakan tugasnya\r\n\r\nSTMIK Kaputama\r\nBe Smart and Successful\r\n\r\n\r\nSTMIK Kaputama\r\nBerkaryalah selama-lamanya\r\n\r\n\r\n(kembali ke awal)', '1734175989mars.png', '2025-01-07 09:16:00', 1, 1, 0),
(9, 'Teknik Informatika', 'Visi\r\n\r\n&ldquo;Menjadi program studi teknik informatika yang unggul dan berkompeten,berkarakter dan berjiwa entrepreneur dalam bidang ICT dan riset secara global serta penerapannya dalam jaringan, robotic, multimedia, mobile, dan aplikasi cerdas terutama bidang kontrol cerdas di Sumatera Utara (tahun 2022), serta Indonesia (tahun 2032).&rdquo;\r\n\r\n\r\nMisi\r\n\r\nMenyelenggarakan pendidikan yang berkualitas dalam bidang jaringan, robotic, multimedia, mobile, khususnya bidang kontrol cerdas.\r\n\r\nMelaksanakan dan meningkatkan kualitas dan kwantitas penelitian dosen.\r\n\r\nMelaksanakan pengabdian masyarakat dengan melibatkan mahasiswa.\r\n\r\nMembina kerjasama dengan pemerintah daerah dan masyarakat dalam hal penerapan ICT, penelitian dan pengabdian masyarakat.\r\n\r\n\r\nTujuan\r\n\r\nMenghasilkan lulusan yang kompeten dalam bidang informatika terutama kontrol cerdas dan penerapannya, berkarakter, berwawasan global dan wirausaha.\r\n\r\nMenghasilkan riset dan karya inovatif sesuai kebutuhan masyarakat.\r\n\r\nTerjalinnya kerja sama dengan pemerintah daerah, industri dan masyarakat dalam hal penerapan ICT, penelitian dan pengabdian masyarakat.\r\n\r\n\r\n\r\nProfil Lulusan\r\n\r\nLulusan mampu mengaplikasikan pengetahuan di area fungsi Programming and Software Development pada profesinya. (SKKNI)\r\n\r\nLulusan memiliki kemampuan menganalisis persoalan computing serta menerapkan prinsip-prinsip computing dan disiplin ilmu relevan lainnya untuk mengidentifikasi solusi bagi organisasi. (Sumber : (IABEE))\r\n\r\nLulusan memiliki kepatuhan terhadap aspek legal, aspek sosial budaya dan etika profesi. (SNDIKTI)\r\n\r\nLulusan mampu memberikan petunjuk dalam memilih berbagai alternatif solusi secara mandiri dan kelompok.(SNDIKTI)\r\n\r\nLulusan memiliki kemampuan mendesain, mengimplementasi dan mengevaluasi solusi berbasis computing yang memenuhi kebutuhan pengguna dengan pendekatan yang sesuai. (Sumber : (IABEE))\r\n\r\n\r\nProfesi\r\n\r\nProgramming And Software Development\r\n\r\nIT Mobility and Internet of Things\r\n\r\nArtificial Intelligence (AI Engineer)\r\n\r\nNetwork And Infrastructure (NetworkAdministrator, System Administrator)', '1736243163Screenshot 2025-01-07 164532.png', '2025-01-07 09:46:03', 3, 1, 0),
(10, 'E-Learning', 'E-Learning Kaputama adalah platform pembelajaran daring di Universitas Kaputama yang memfasilitasi akses materi perkuliahan, ujian online, diskusi interaktif, dan pengumpulan tugas. Platform ini meningkatkan fleksibilitas belajar dengan fitur-fitur seperti notifikasi, integrasi kalender akademik, dan penilaian otomatis. Tujuannya adalah mendukung pendidikan berkualitas melalui teknologi digital, membuat proses belajar lebih efisien dan interaktif.', '1736053177Screenshot 2025-01-05 115859.png', '2025-01-07 09:13:12', 2, 1, 0),
(11, 'E-Library', 'E-Library Kaputama adalah perpustakaan digital Universitas Kaputama yang menyediakan akses mudah ke berbagai koleksi buku, jurnal, dan bahan akademik lainnya secara online. Mahasiswa dan dosen dapat mencari, membaca, dan mengunduh materi kapan saja dan di mana saja, mendukung proses belajar yang fleksibel dan efisien. Dengan fitur pencarian yang canggih dan koleksi yang terus diperbarui, E-Library Kaputama bertujuan untuk memperkaya pengalaman belajar dan penelitian di kampus.', '1736053371Screenshot 2025-01-05 120240.png', '2025-01-07 09:12:57', 2, 1, 0),
(12, 'Penelitian', '\r\nPenelitian Kaputama adalah portal digital yang menampilkan berbagai hasil penelitian yang dipublikasikan oleh dosen dan pegawai Universitas Kaputama. Menggunakan Open Journal System (OJS) secara online, portal ini menyediakan akses ke jurnal, artikel, dan publikasi akademik yang diterbitkan oleh STMIK Kaputama. Dengan beragam bidang ilmu yang tercakup, Penelitian Kaputama mendukung upaya peningkatan kualitas penelitian dan kontribusi keilmuan. Portal ini bertujuan mempromosikan karya ilmiah civitas akademika Kaputama serta memperluas jangkauan dan dampak penelitian mereka di tingkat nasional maupun internasional.', '1736053740jurnal.kaputama.ac.id_.png', '2025-01-05 05:09:00', 2, 1, 0),
(13, 'T-Shirt (Biru)', 'Ini adalah kaos', '1736237741baju2.gif', '2025-01-07 09:14:40', 7, 1, 0),
(14, 'T-Shirt (Merah)', 'Ini adalah Kaos', '1736241001BAJU4.gif', '2025-01-07 09:14:58', 7, 1, 0),
(15, 'Perpustakaan', 'Perpustakaan kampus menyediakan koleksi buku, jurnal, dan sumber daya digital yang mendukung proses belajar mahasiswa. Dengan ruang baca yang nyaman dan koneksi internet, mahasiswa dapat melakukan penelitian dan mengerjakan tugas dengan lebih mudah.', '1736242074Screenshot 2025-01-07 162652.png', '2025-01-07 09:27:54', 4, 1, 0),
(16, 'Ruangan Belajar', 'Ruang kelas kampus dirancang untuk menciptakan lingkungan belajar yang kondusif, dilengkapi dengan proyektor, whiteboard, dan pendingin ruangan, serta pengaturan tempat duduk yang fleksibel untuk berbagai jenis pembelajaran.', '1736242279Screenshot 2025-01-07 163040.png', '2025-01-07 09:31:19', 4, 1, 0),
(17, 'Lab Komputer', 'Lab komputer kampus dilengkapi dengan komputer berteknologi tinggi dan perangkat lunak terbaru yang mendukung kebutuhan akademik mahasiswa, seperti pemrograman, desain grafis, dan analisis data. Lab ini menyediakan lingkungan yang kondusif untuk praktikum, tugas kelompok, dan penelitian, dengan akses internet cepat dan pengaturan yang nyaman untuk mendukung produktivitas belajar.', '1736242416Screenshot 2025-01-07 163246.png', '2025-01-07 09:33:36', 4, 1, 0),
(18, 'Kantin', 'Kantin kampus menyediakan berbagai pilihan makanan dan minuman dengan harga terjangkau, menjadi tempat favorit bagi mahasiswa untuk makan dan bersosialisasi antara jam kuliah.', '1736242801Screenshot 2025-01-07 163926.png', '2025-01-07 09:40:01', 4, 1, 0),
(19, 'Sistem Informasi', 'Program studi Sistem Informasi menggabungkan ilmu komputer dengan manajemen bisnis untuk merancang dan mengelola sistem informasi yang efektif. Mahasiswa akan mempelajari bagaimana mengembangkan solusi teknologi yang membantu organisasi dalam pengolahan data dan pengambilan keputusan.', '1736243314Screenshot 2025-01-07 164648.png', '2025-01-07 09:48:34', 3, 1, 0),
(20, 'Manajemen Informatika', 'Program studi Manajemen Informasi berfokus pada pengelolaan data dan informasi dalam organisasi. Mahasiswa akan diajarkan bagaimana mengorganisasi, menyimpan, dan memanfaatkan informasi secara efektif untuk mendukung operasi bisnis dan strategi perusahaan.', '1736243467Screenshot 2025-01-07 165027.png', '2025-01-07 09:51:07', 3, 1, 0),
(21, 'Komputerisasi Akuntansi', 'Program studi Komputerisasi Akuntansi mengintegrasikan teknologi informasi dengan prinsip-prinsip akuntansi. Mahasiswa akan belajar menggunakan perangkat lunak akuntansi untuk mengotomatisasi proses keuangan dan akuntansi, serta menganalisis data keuangan untuk pengambilan keputusan.', '1736243567Screenshot 2025-01-07 165212.png', '2025-01-07 09:52:47', 3, 1, 0),
(22, 'Bisnis Digital', 'Program studi Bisnis Digital membekali mahasiswa dengan keterampilan dalam mengelola dan mengembangkan bisnis berbasis teknologi. Mahasiswa akan mempelajari pemasaran digital, e-commerce, analitik data, dan inovasi digital untuk menghadapi tantangan di era transformasi digital.', '1736243638Screenshot 2025-01-07 165347.png', '2025-01-07 09:53:58', 3, 1, 0),
(23, 'Mobile Legends', 'Turnamen Mobile Legends di STMIK Kaputama merupakan ajang kompetisi yang diadakan di kampus untuk menumbuhkan semangat esports dan meningkatkan keterampilan para mahasiswa dalam permainan Mobile Legends. Turnamen ini dapat menjadi platform yang menarik bagi mahasiswa untuk berkompetisi dan menunjukkan kemampuan mereka dalam bermain Mobile Legends.\r\n\r\nDeskripsi Turnamen Mobile Legends di STMIK Kaputama:\r\nTujuan:\r\nTurnamen ini diadakan untuk mempererat hubungan antar mahasiswa, mengembangkan bakat di bidang esports, serta memberikan pengalaman kompetitif yang menyenangkan. Selain itu, turnamen ini bertujuan untuk memperkenalkan dan mempromosikan aktivitas esports yang positif di lingkungan kampus.\r\n\r\nPeserta:\r\nPeserta turnamen ini biasanya berasal dari mahasiswa STMIK Kaputama, baik dari program studi Teknik Informatika, Sistem Informasi, maupun program studi lainnya. Setiap tim terdiri dari beberapa pemain, yang dapat berupa mahasiswa dari satu jurusan atau gabungan dari berbagai jurusan.\r\n\r\nFormat Turnamen:\r\n\r\nPendaftaran: Mahasiswa yang tertarik untuk mengikuti turnamen dapat mendaftar secara individu atau dalam tim. Setiap tim biasanya terdiri dari 5 pemain utama.\r\nBabak Kualifikasi: Diadakan untuk memilih tim-tim terbaik yang akan melanjutkan ke babak berikutnya.\r\nPlayoff dan Final: Tim yang lolos dari babak kualifikasi akan bertanding di babak playoff dengan sistem eliminasi hingga hanya ada satu tim yang menjadi juara.\r\nWaktu Pertandingan: Setiap pertandingan biasanya berlangsung dalam waktu tertentu, dengan format best-of-3 atau best-of-5 tergantung pada jumlah tim yang berpartisipasi.\r\nHadiah:\r\nSebagai motivasi bagi para peserta, biasanya turnamen ini menyediakan hadiah berupa uang tunai, sertifikat, atau hadiah menarik lainnya. Hadiah juga bisa berupa merchandise Mobile Legends, voucher game, atau tiket untuk mengikuti event esports yang lebih besar.', '1736331917Mobile Legends.png', '2025-01-08 10:25:17', 6, 1, 0),
(29, 'go green', 'go green adalah ukm yang ada dikampus stmik kaputama', '1737084403background.jpg', '2025-01-17 03:26:43', 5, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_studi`
--

CREATE TABLE `program_studi` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `program_studi`
--

INSERT INTO `program_studi` (`id`, `kode`, `nama`, `created_at`) VALUES
(1, '31', 'Manajemen Informatika', '2025-01-16 16:49:50'),
(2, '32', 'Komputerisasi Akuntansi', '2025-01-16 16:50:56'),
(3, '44', 'Sistem Informasi', '2025-01-16 16:51:07'),
(4, '45', 'Teknik Informatika', '2025-01-16 16:51:22'),
(5, '46', 'Bisnis Digital', '2025-01-16 16:52:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int(11) NOT NULL,
  `kode_ruangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id`, `kode_ruangan`) VALUES
(1, '201'),
(2, '202'),
(3, '203'),
(4, '204'),
(5, '205'),
(6, '206'),
(7, '207'),
(8, '208'),
(9, '209'),
(10, '210'),
(11, '211'),
(12, '301'),
(13, '302'),
(14, '303'),
(15, '304'),
(16, 'LAB I'),
(17, 'LAB II'),
(18, 'LAB III');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `nama_semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id`, `nama_semester`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sia`
--

CREATE TABLE `sia` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `npm` varchar(20) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sia`
--

INSERT INTO `sia` (`id`, `username`, `password`, `full_name`, `email`, `role`, `npm`, `profile_picture`, `created_at`) VALUES
(1, 'Dio', '$2y$10$GgOCTwXs/p06bQf0V3E26uC5OIGzaihIDMcnaV0E/Il5MRRCIzb7i', 'Dio Abiyyu Zidane Ginting', 'dio13abiyyu@gmail.com', 'user', '20250001', 'uploads/profile_pictures/6782655644109_dio2.jpg', '2025-01-11 12:34:30'),
(2, 'San', '$2y$10$xE0Xd5299zGlnSBP6Q3.xeb1WSAsof4hI.mJtQE/pYTS8yaI1ENkO', 'San Lee', 'san@gmail.com', 'user', '20250002', 'uploads/profile_pictures/6782664bead2d_san.jpg', '2025-01-11 12:38:35'),
(3, 'Jeno', '$2y$10$V0z8.HfsXwDTI5iovS1MOOPfWmVa4HEJupXViLO6QlyPxPSBLb.ju', 'Jeno Lee', 'jeno@gmail.com', 'user', '20250003', 'uploads/profile_pictures/67826773cf71f_jeno.jpg', '2025-01-11 12:43:31'),
(4, 'Yeri', '$2y$10$fvU/rLnx.7VvtYS5xycfVeD7mMJx8H8FYIS8JacQK8tmTFJyyE2qC', 'Kim Yeri', 'yeri@gmail.com', 'admin', NULL, 'uploads/profile_pictures/admin-logo-3.png', '2025-01-11 12:47:45'),
(5, 'ferdy', '$2y$10$esb6SHyMzxH0AurhUmBGQOBCEmuGPXip1g9qCEkz2nE/.2kUGDizm', 'ferdyansyah putra', 'ferdy@gmail.com', 'user', NULL, 'uploads/profile_pictures/admin-logo-3.png', '2025-01-16 05:30:59'),
(6, 'Hyungwon', '$2y$10$Sq/RwqGaKq2XbEyuX45nU.HmMgiA3JDsjk5o1gU6EjkjzLUcNOltG', 'Hyungwon', 'hyungwon@gmail.com', 'user', NULL, 'uploads/profile_pictures/jeno.jpg', '2025-01-16 05:34:06'),
(10, 'Mark', '$2y$10$j8eeWXUbw3cPFVnNf2Ndie5OC727/ELKh6HoQADAGiUmdUFEWu9vW', 'Mark', 'mark@gmail.com', 'user', '20250004', 'uploads/profile_pictures/mark.jpg', '2025-01-16 06:05:47'),
(11, 'Gopal', '$2y$10$zqOm/IN1fB.BmdS6cL/CYe0fLqFAcaGFsm4Z9O6poXv4MfgtJC4NC', 'Gopal', 'gopal@gmail.com', 'user', '20250005', 'uploads/profile_pictures/gopal.jpg', '2025-01-16 06:08:04'),
(12, 'Lisa', '$2y$10$r1CX.kldpLpPy5ylwisRnOmOwU3Nq.mQRJDswcagFp2UARLz/IR.O', 'Lalisa', 'lisa@gmail.com', 'user', '20250006', 'uploads/profile_pictures/lisa.jpg', '2025-01-16 09:44:28'),
(14, 'Jaehyun', '$2y$10$Oh6hSnwbYocLtSWL3B6TvewDudZYmu9sR1PlW.WAMYSHNjF2sg76y', 'Jung Jaehyun', 'jaehyunaii21@gmail.com', 'admin', NULL, 'uploads/profile_pictures/jaehyun.jpg', '2025-01-16 09:56:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(1, 'Dio', 'Ginting', 'Dio', 'dio13abiyyu@gmail.com', '$2y$10$nqMinJy5HySWYZX1BEZAo.dADDLi6Q9nlVZ.6CoSi6KAuRWdqud76', '1733833203dio2.jpg', 1),
(11, 'Hwang', 'Renjun', 'Renjun', 'renjun@gmail.com', '$2y$10$d8bxUWnxGPGjHZSDOHVboOueVqAo3iycoAfz6zunyzdeLfPK2n7aq', '1734096173renjun.jpg', 0),
(13, 'Mark', 'Lee', 'Mark', 'mark@gmail.com', '$2y$10$VmsqoLpemscEaQxC1hlbsOl9nHFcwX9JxMDFt/q.BseJ.OvCT9izu', '1734432450mark.jpg', 0),
(14, 'Dian', 'Situmorang', 'Dian', 'dian@gmail.com', '$2y$10$OXRWkEXn1AZVnQVsDYiEyeYCN5Lf7uOSawe0E2hL0oPn4JDECzSzS', '1734433121dian.jpg', 0),
(15, 'Ferdy', 'Putra', 'Ferdy', 'ferdy@gmail.com', '$2y$10$Yff703OOfy5QFB2GONxrKu5zY0Kk0awOb68T.FFfLbz9iJAGkwT2i', '1734437796ferdy.jpg', 1),
(16, 'Eriston', 'Marbun', 'eriston', 'eriston@gmail.com', '$2y$10$3bFOdCcDgesxMk4zRZnXJuf8cD4pGP0Jp4UqKBth9K/SnK3HTVnBy', '1736480256admin-logo-3.png', 0),
(17, 'Lee', 'Jeno', 'jeno', 'jeno@gmail.com', '$2y$10$R5zhYUNGbbbVsnNt29Zz2.z6p.y7spdPnBFjLMagZ/nhot0F8FIN6', '1736508254diop.jpg', 0),
(18, 'San', 'Lee', 'San', 'san@gmail.com', '$2y$10$wvA6sV4yp/MNW2VH2J1sbeHXlNpoyFtRkb8jeD2AixLlS9rbhWSkG', '1736510440san.jpg', 0),
(19, 'Yuju', 'gfriend', 'yuju', 'yuju@gmail.com', '$2y$10$Jq4bzUTug5k3L6ec5oRXCO/KmMgXe/Ltec.QuVQuuYngAVpg2h86W', '1736563683yuju.jpg', 0),
(20, 'Lee', 'Mujin', 'mujin', 'mujin@gmail.com', '$2y$10$RX08C6yZ.LbHXVHIJNVDgeBjJEEDVlDB6ox4UFg97BYcOELsPXue6', '1736937258dc1c3f3326929db90fab658ea8541d48.jpg', 0),
(21, 'Deo', 'Vani', 'Deo', 'deo@gmail.com', '$2y$10$6PAW3cns4xyAiWxFLPhQouXmF/koo620T4/onTcY/.V6oFOB83.7O', '1737005157_admin-logo-3.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nia` (`nia`);

--
-- Indeks untuk tabel `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nidn` (`nidn`);

--
-- Indeks untuk tabel `jadwal_mengajar`
--
ALTER TABLE `jadwal_mengajar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nidn` (`nidn`),
  ADD KEY `kode` (`kode`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `npm` (`npm`),
  ADD KEY `FK_semester` (`semester_id`),
  ADD KEY `fk_program_studi_nama` (`program_studi_nama`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_kaputama_category` (`category_id`),
  ADD KEY `FK_kaputama_author` (`author_id`);

--
-- Indeks untuk tabel `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD UNIQUE KEY `unique_nama` (`nama`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_ruangan` (`kode_ruangan`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_semester` (`nama_semester`);

--
-- Indeks untuk tabel `sia`
--
ALTER TABLE `sia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jadwal_mengajar`
--
ALTER TABLE `jadwal_mengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `sia`
--
ALTER TABLE `sia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_mengajar`
--
ALTER TABLE `jadwal_mengajar`
  ADD CONSTRAINT `jadwal_mengajar_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`),
  ADD CONSTRAINT `jadwal_mengajar_ibfk_2` FOREIGN KEY (`kode`) REFERENCES `program_studi` (`kode`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `FK_semester` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_program_studi_nama` FOREIGN KEY (`program_studi_nama`) REFERENCES `program_studi` (`nama`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`);

--
-- Ketidakleluasaan untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_kaputama_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_kaputama_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
