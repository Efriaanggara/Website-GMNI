-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2025 pada 17.32
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gmnioku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `tanggal_terbit` datetime DEFAULT current_timestamp(),
  `gambar_utama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`, `id_kategori`, `tanggal_terbit`, `gambar_utama`) VALUES
(16, 'Kaderisasi Tingkat Dasar', 'Dalam rangka untuk meningkatkan ilmuwan, mengasah Intelektual, kematangan, kreativitas, dan inovatif kader Gerakan Mahasiswa Nasional Indonesia (GMNI) dalam melakukan pendampingan terhadap kaum marhaen maka dibutuhkan sumber daya kader yang pantang menyerah.\r\n\r\nKaderisasi Tingkat Dasar (KTD) SESUMSEL yang dilakukan pada sekertariat GMNI OKU diikuti oleh peserta yang berasal dari Oku Timur, Oku Selatan, Palembang, dan OKU pada tanggal 25-27 Oktober 2024 dengan tema “Harmonisasi Gerakan Bersama Rakyat” yang dihadiri PJ Bupati OKU dan KODIM OKU.\r\n\r\nTujuannya, menyiapkan anggota GMNI menjadi kader yang memahami, meyakini dan mampu memanifestasikan marhaenisme dalam kehidupan pribadi dan kehidupan sosialnya. Oleh karena itu, KTD akan berfungsi sebagai proses indoktrinasi kader untuk merubah sikap, mental, kepribadian dan cara berpikir para calon kader agar menjadi kader yang ideologis, progresif, revolusioner dan berkepribadian.', 16, '2025-05-06 16:41:03', 'IMG-20250511-WA0005.jpg'),
(19, 'Sosialisasi BAWASLU RI', 'GMNI OKU menghadiri sosialisasi yang di adakan oleh BAWASLU RI dalam rangka memberikan pemahaman tentang kelembagaan berupa peran, tugas, dan fungsi Bawaslu RI mengenai Pemilu/Pilkada 2024 kepada mahasiswa/ organisasi kemahasiswaan di Kabupaten OKU Sumatera Selatan.\r\n\r\nSosialisasi ini dilakukan di Hotel BILL Baturaja OKU dengan mengundang organisasi kemahasiswaan dan berbagai elemen masyarakat supaya memahami peran dan fungsi Bawaslu RI untuk terciptanya Pilkada yang aman, damai dan bermartabat.', 18, '2025-05-11 08:14:10', 'IMG-20250511-WA0030.jpg'),
(20, 'Dies Natalis GMNI ke-71 Tahun', 'Menyemarakkan Dies natalis GmnI ke 71 Tahun Dewan Pimpinan Cabang Gerakan Mahasiswa Nasional Indonesia Kabupaten Ogan Komering Ulu (DPC GMNI OKU) Menyelenggarakan kegiatan Dialog Kebangsaan &amp; buka puasa bersama keluarga besar GmnI se OKU Raya(23/03/2025)\r\n\r\nKegiatan berlangsung di cafe Corner untuk menyemarakkan Dies natalis GMNI ke 71 yang bertepatan jatuh pada tanggal 23 Maret 2023, dimana hal tersebut bertepatan dengan bulan suci Ramadhan, DPC GMNI OKU menggelar acara Buka bersama antara kader dengan Persatuan Alumni (PA) GMNI OKU RAYA (OKU Induk, OKU Timur dan OKU Selatan).\r\nRangkaian acara tersebut di isi dengan kegiatan Dialog Kebangsaan.\r\n', 19, '2025-05-11 08:19:00', 'IMG-20250511-WA0044.jpg'),
(21, 'Audiensi Bersama PJ Bupati OKU', 'Audiensi dewan pimpinan cabang gerakan mahasiswa nasional indonesia (GMNI) ogan komering ulu bersema PJ Bupati OKU di Kantor bupati. \r\n\r\nSebagai kaum akademis, mahasiswa seharusnya mengambil peran penting dalam berbagai aspek bidang kehidupan termasuk dalam bidang politik.  Pesta demokrasi atau pemilihan umum kepala daerah (pemilukada) sudah di depan mata. Mahasiswa dituntut untuk menjalankan peran tersebut sebagai bukti bahwa mahasiswa masih mampu menunjukkan eksistensinya dengan aktif.  Mahasiswa adalah kaum intelektual yang memiliki tempat istimewa di mata masyarakat. Mereka dianggap memiliki peranan penting dalam sejarah berdirinya Pemerintahan Indonesia, terutama dalam menyambung suara rakyat yang dipercaya masih begitu jujur, idealis dan bebas dari tunggangan kelompok manapun dan bersifat indenpenden.  \r\n\r\nDalam kesempatan kali ini Dewan pimpinan cabang GmnI OKU melaksanakan audiensi bersama PJ Bupati OKU untuk bertukar pikiran dan membahas terkait Pemilukada agar Pemilukada di kabupaten OKU berjalan dengan aman,damai,dan bermatabat.  Didalam hal ini ketua DPC GMNI Oku mengajak seluruh mahasiswa beserta elemen masyarakat kabupaten Oku untuk berperan aktif didalam Pemilukada kab Oku,dimana pesta demokrasi ini akan menentukan arah pembangunan serta kemajuan kab OKU selama 5 tahun kedepannya,dalam kesempatan audiensi kali ini dpc GMNI Oku menyampaikan beberapa point yaitu :  1. Mendukung PJ bupati OKU untuk menjalankan roda pemerintahan di Kab. OKU dengan baik dan benar 2. Mendukung Pemilukada yang aman,damai,dan bermartabat 3. Mendukung polres OKU dan kodim 0403 dalam menjaga keamanan di kabupaten OKU 4. Dpc GMNI Oku siap mengawal kebijakan pemerintah kab Oku guna untuk kemajuan Kab. OKU  Pungkas bung Ryan selalu ketua DPC GMNI Oku,dan juga dalam kesempatan itu kami mengajak seluruh pihak untuk tidak Ter provokasi informasi yang bisa menyebabkan perpecahan masyarakat di kab Oku,terlebih mendekati masa pemilihan kepala daerah serentak khususnya di kab OKU.', 17, '2025-05-11 08:20:51', 'IMG-20250511-WA0032.jpg'),
(22, 'zvzx', 'czvz', 19, '2025-05-11 09:02:24', 'IMG-20250511-WA0012.jpg'),
(23, 'fsdfsgsdg', 'sdgsg', 18, '2025-05-11 09:02:37', 'IMG-20250511-WA0011.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_foto`
--

CREATE TABLE `galeri_foto` (
  `id` int(11) NOT NULL,
  `judul_foto` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri_foto`
--

INSERT INTO `galeri_foto` (`id`, `judul_foto`, `gambar`, `tanggal_upload`) VALUES
(27, 'Kaderisasi Tingkat Dasar', '20250511082152_IMG-20250511-WA0004.jpg', '2025-05-11 06:21:52'),
(28, 'Kaderisasi Tingkat Dasar', '20250511082206_IMG-20250511-WA0006.jpg', '2025-05-11 06:22:06'),
(29, 'Kaderisasi Tingkat Dasar', '20250511082224_IMG-20250511-WA0007.jpg', '2025-05-11 06:22:24'),
(30, 'Kaderisasi Tingkat Dasar di Palembang', '20250511082249_IMG-20250511-WA0008.jpg', '2025-05-11 06:22:49'),
(31, 'Dies Natalis GMNI ke-71 tahun', '20250511082326_IMG-20250511-WA0009.jpg', '2025-05-11 06:23:26'),
(32, 'Dies Natalis GMNI ke-71 tahun', '20250511082335_IMG-20250511-WA0010.jpg', '2025-05-11 06:23:35'),
(33, 'Dies Natalis GMNI ke-71 tahun', '20250511082344_IMG-20250511-WA0011.jpg', '2025-05-11 06:23:44'),
(34, 'Dies Natalis GMNI ke-71 tahun', '20250511082354_IMG-20250511-WA0012.jpg', '2025-05-11 06:23:54'),
(35, 'Dies Natalis GMNI ke-71 tahun', '20250511082401_IMG-20250511-WA0013.jpg', '2025-05-11 06:24:01'),
(36, 'Dies Natalis GMNI ke-71 tahun', '20250511082417_IMG-20250511-WA0014.jpg', '2025-05-11 06:24:17'),
(37, 'Kaderisasi Tingkat Dasar', '20250511082451_IMG-20250511-WA0019.jpg', '2025-05-11 06:24:51'),
(38, 'Kaderisasi Tingkat Dasar', '20250511082508_IMG-20250511-WA0021.jpg', '2025-05-11 06:25:08'),
(39, 'Sosialisasi Bawaslu RI', '20250511082533_IMG-20250511-WA0030.jpg', '2025-05-11 06:25:33'),
(40, 'Audiensi Bersama PJ Bupati', '20250511082611_IMG-20250511-WA0034.jpg', '2025-05-11 06:26:11'),
(41, 'Kaderisasi Tingkat Dasar', '20250511082713_IMG-20250511-WA0039.jpg', '2025-05-11 06:27:13'),
(42, 'Buka Bersama dan Diskusi Cabang', '20250511082741_IMG-20250511-WA0033.jpg', '2025-05-11 06:27:41'),
(43, 'Dies Natalis GMNI ke-71 tahun', '20250511082801_VID-20250511-WA0003.mp4', '2025-05-11 06:28:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(16, 'Kaderisasi'),
(17, 'Audiensi'),
(18, 'Sosialisasi'),
(19, 'Diskusi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Admin', 'admin'),
(10, 'Efria Anggara', '$2y$10$uIGZ2ssIbHxpbPJm8RvE0OSpbufoDVA0iq91qaqxqHouQnD7C6vXm'),
(11, 'NGGAAA', '$2y$10$rVgKlJQbR5ue1IRZBRdzYumfRITAxx.QfOUDuRUpVhgafpnvXvwey');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `galeri_foto`
--
ALTER TABLE `galeri_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `galeri_foto`
--
ALTER TABLE `galeri_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
