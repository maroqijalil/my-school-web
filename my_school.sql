-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Des 2021 pada 17.11
-- Versi server: 8.0.27-0ubuntu0.20.04.1
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
-- Database: `my_school`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `payment_id` int UNSIGNED NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `total` int NOT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE `students` (
  `student_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` text,
  `religion` varchar(10) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `class` int DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
);

--
-- Dumping data untuk tabel `students`
--

INSERT INTO `students` (`student_id`, `user_id`, `password`, `nis`, `name`, `address`, `gender`, `religion`, `school`, `class`, `photo`) VALUES
(1, NULL, NULL, '0989080gg', 'Muchamad Jalil', 'jalil', 'L', 'j', 'j', 10, '//localhost:8000/assets/img/siswa/1640316751_Screenshot from 2021-12-24 00-23-14.png'),
(2, NULL, NULL, '123445', 'Indriati', 'Surabaya', 'P', 'Islam', 'SMAN 1 Pasuruan', 12, '//localhost:8000/assets/img/siswa/1640320557_Penerimaan-Maba-1 (1).jpg'),
(3, NULL, NULL, '1344', 'wegf', 'wgqf', 'L', 'sffs', 'sfdaf', 10, ''),
(4, 2, 'SBvm5ntV', '99', 'k', 'k', 'L', 'k', 'kk', 11, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `gender` text,
  `degree` varchar(30) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `photo` varchar(255) DEFAULT NULL
);

--
-- Dumping data untuk tabel `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `user_id`, `name`, `gender`, `degree`, `nip`, `photo`) VALUES
(3, NULL, 'Sayang', 'P', 'S.Kom', '1322154', '//localhost:8000/assets/img/guru/1640323576_Screenshot_from_2021-12-24_00-23-20-removebg-preview.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int NOT NULL
);

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`) VALUES
(1, 'jalil', 'jalil@jalil.com', '$2y$10$5z2tUYCiQ6ERzGffJyHFye8EbTxPK24rb5v7ckR.kXxEyWp9a32Fm', 0),
(2, 'k', 'jalil@jalil.commm', '$2y$10$zEmaMNahScPD6mUt2dlLoOZBI0ePg1pQHH..p6wvMmSYqOC86t1jC', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indeks untuk tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indeks untuk tabel `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
