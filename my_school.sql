-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Des 2021 pada 23.01
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
-- Struktur dari tabel `parents`
--

CREATE TABLE `parents` (
  `parent_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `parents`
--

INSERT INTO `parents` (`parent_id`, `user_id`, `name`, `email`) VALUES
(1, NULL, 'Fiqey', 'ortu@ortu.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `payment_id` int UNSIGNED NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `total` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`payment_id`, `student_id`, `payment_date`, `photo`, `total`) VALUES
(1, '5', '2021-12-18', '//localhost:8000/assets/img/pembayaran/1640342728_Penerimaan-Maba-1.jpg', 1000000);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `students`
--

INSERT INTO `students` (`student_id`, `user_id`, `password`, `nis`, `name`, `address`, `gender`, `religion`, `school`, `class`, `photo`) VALUES
(6, 4, 'BAErtuPc', '123132', 'siswaaaaa', 'jln', 'L', 'islam', 'smp', 10, '//localhost:8000/assets/img/siswa/1640343977_Penerimaan-Maba-1.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `user_id`, `name`, `gender`, `degree`, `nip`, `photo`) VALUES
(4, NULL, 'Fitrah', 'L', 'S.Kom', '123456', '//localhost:8000/assets/img/guru/1640342628_Penerimaan-Maba-1 (1).jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$8MsfQU/jJc3SoIfSMj7VFurb/VAKG1EDYUmLxlEgShUQU3wNjd4am', 0),
(2, 'siswaaa', 'siswa@siswa.com', '$2y$10$YgsaXh/7OsePGggjYsBS8OHaGMzKqF6mCgcQzUKi8eqJkjTZLn6TW', 2),
(3, 'admin1', 'admin1@admin1.com', '$2y$10$RvRqV01206Q/ZE3mc0ytpeAWXwctjzXLj96AUl3JPXJE7kGgt.fYC', 0),
(4, 'siswa', 'siswa1@siswa1.com', '$2y$10$PTTfbkym0XFrNc.TUpxLieHKVcIRyBAThB26onNfsQPQCRfakhMdi', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parent_id`),
  ADD UNIQUE KEY `parent_id` (`parent_id`);

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
-- AUTO_INCREMENT untuk tabel `parents`
--
ALTER TABLE `parents`
  MODIFY `parent_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
