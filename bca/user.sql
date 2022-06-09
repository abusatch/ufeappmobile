-- phpMymember SQL Dump
-- version 4.8.5
-- https://www.phpmymember.net/
--
-- Host: localhost
-- Waktu pembuatan: 09 Okt 2019 pada 05.03
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ufeapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `idUser` int(10) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` enum('member','freeuser') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`, `level`) VALUES
(1, 'masnoer@gmail.com', '202cb962ac59075b964b07152d234b70', 'member'),
(3, 'mas', '202cb962ac59075b964b07152d234b70', 'member'),
(4, 'teguh.m', 'd10906c3dac1172d4f60bd41f224ae75', 'member'),
(5, 'andi', 'e10adc3949ba59abbe56e057f20f883e', 'member'),
(6, 'jambi', 'e10adc3949ba59abbe56e057f20f883e', 'member'),
(7, 'putra@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', ''),
(8, 'kamu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'member'),
(11, 'tanjungsandi26@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'freeuser'),
(12, 'iswandi@imastudio.co.id', '992e63080ee1e47b99f42b8d64ede953', 'member'),
(13, 'iswandi@imastudio.co.id', 'f5f37eb1c7216885ab21a0660599945e', 'member'),
(14, 'iswandi.saputra11@gmail.com', '32bf0e6fcff51e53bd74e70ba1d622b2', 'member'),
(15, 'iswandi@imastudio.co.id', 'c30605727670ae438789430c18e562c6', 'member'),
(16, 'tanjungsandi26@gmail.com', '5b1b68a9abf4d2cd155c81a9225fd158', 'member'),
(17, 'iswandi@imastudio.co.id', '97e8527feaf77a97fc38f34216141515', 'member'),
(18, 'iswandi@imastudio.co.id', '1679091c5a880faf6fb5e6087eb1b2dc', 'member'),
(19, 'iswandi.saputra11@gmail.com', '15de21c670ae7c3f6f3f1f37029303c9', 'member'),
(20, 'iswandi.saputra11@gmail.com', '15de21c670ae7c3f6f3f1f37029303c9', 'member'),
(21, 'iswandi@imastudio.co.id', 'fae0b27c451c728867a567e8c1bb4e53', 'member'),
(22, 'iswandi@imastudio.co.id', 'fae0b27c451c728867a567e8c1bb4e53', 'member'),
(23, 'iswandi.saputra11@gmail.com', '09151af292bc2da3ba627e986ef9a85d', 'member'),
(24, 'iswaaka', 'c1eeabd6df9a56cd96b999227ab16385', 'member'),
(25, 'yy', '2fb1c5cf58867b5bbc9a1b145a86f3a0', 'member'),
(26, 'iswandi@imastudio.co.id', 'fae0b27c451c728867a567e8c1bb4e53', 'member'),
(27, 'iswandi@imastudio.co.id', '71ca9079d08bfa85e1e803427d25205a', 'member'),
(28, 'iswandi@imastudio.co.id', '94e7d712742adbbb7a73a1d52a7cc1a9', 'member'),
(29, 'iswandi.saputra11@gmail.com', '9318794c5a3112dad9be4900d695d0af', 'member'),
(30, 'iswandi.saputra11@gmail.com', '9318794c5a3112dad9be4900d695d0af', 'member'),
(31, 'iswandi@imastudio.co.id', 'cff11e4a26b06ffb5a6e0db4b821a33e', 'member'),
(32, 'iswandi@imastudio.co.id', 'c70fd4260c9eb90bc0ba9d047c068eb8', 'member'),
(33, 'iswandi@imastudio.co.id', 'a3aca2964e72000eea4c56cb341002a4', 'member'),
(34, 'iswandi@imastudio.co.id', 'a3aca2964e72000eea4c56cb341002a4', 'member'),
(35, 'iswandi@imastudio.co.id', '2d25e267e01f645aab4d16eb8d0ad3c3', 'member'),
(36, 'iswandi@imastudio.co.id', '3dc7538325f96824b464dba173c56f2b', 'member'),
(37, 'iswandi@imastudio.co.id', '3dc7538325f96824b464dba173c56f2b', 'member'),
(38, 'putra@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'member'),
(39, 'tanjung', 'fcea920f7412b5da7be0cf42b8c93759', 'member'),
(40, 'stmik@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'member');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
