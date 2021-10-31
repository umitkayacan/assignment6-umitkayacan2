-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 31 Eki 2021, 21:41:58
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `newdbx`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `academician`
--

CREATE TABLE `academician` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `academician`
--

INSERT INTO `academician` (`id`, `name`, `surname`, `province`) VALUES
(1, 'İsmail ', 'Öztürk', 'Yazılım'),
(2, 'Serdar', 'Adar', 'Yazılım Mimarisi'),
(3, 'Rıza', 'Bilgili', 'İşletim Sistemleri'),
(4, 'Orhan', 'Bozok', 'Nesne Yönelimli Programlama'),
(5, 'Can', 'Taşkın', 'Veri Yapıları ve Algoritmalar'),
(6, 'Cengiz', 'Can', 'Web Design'),
(7, 'Deniz', 'Gülten', 'Web Yazılım'),
(8, 'Gizem', 'Başar', 'Veritabanı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20211031171016', '2021-10-31 20:58:04', 97),
('DoctrineMigrations\\Version20211031171852', '2021-10-31 20:58:04', 35),
('DoctrineMigrations\\Version20211031172144', '2021-10-31 20:58:04', 57);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
  `coursename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lessoncode` int(11) NOT NULL,
  `lessondesc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `academician_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `lesson`
--

INSERT INTO `lesson` (`id`, `coursename`, `lessoncode`, `lessondesc`, `academician_id`) VALUES
(1, 'Programlamaya Giriş ', 962147, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5),
(2, 'Programlama Dilleri', 96444, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 4),
(3, 'Veri Yapıları ve Algoritmalar ', 6655411, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 8),
(4, 'İşletim Sistemleri ', 96571, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5),
(5, 'Veritabanı Sistemleri', 63240, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 3),
(6, 'Nesne Yönelimli Programlama ', 63224, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 3),
(7, 'Yazılım Mühendisliği ', 9655, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 2),
(8, 'Yapay Sınır Ağları', 4156, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1),
(9, 'Gömülü Sistemler', 96532, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5),
(10, 'Veri Madenciliği ', 41547, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 2),
(11, 'Doğal Dil İşleme', 662211, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 7),
(12, 'Kriptografi ', 147441, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 7),
(13, 'Bulanık Mantık', 7784, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 8);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `student`
--

INSERT INTO `student` (`id`, `name`, `surname`, `number`) VALUES
(1, 'Ali ', 'Öztürk', 1256),
(2, 'Veli', 'Taşkın', 96523),
(3, 'Hasan', 'Berksoy', 41587),
(4, 'Hüseyin', 'Kılıç', 32669),
(5, 'Mahmut', 'Zafer', 74154);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `student_lesson`
--

CREATE TABLE `student_lesson` (
  `student_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `student_lesson`
--

INSERT INTO `student_lesson` (`student_id`, `lesson_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(2, 4),
(2, 7),
(2, 9),
(3, 6),
(3, 10),
(4, 8),
(5, 5),
(5, 7),
(5, 10);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `academician`
--
ALTER TABLE `academician`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Tablo için indeksler `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F87474F36E2BC87` (`academician_id`);

--
-- Tablo için indeksler `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `student_lesson`
--
ALTER TABLE `student_lesson`
  ADD PRIMARY KEY (`student_id`,`lesson_id`),
  ADD KEY `IDX_7642AC73CB944F1A` (`student_id`),
  ADD KEY `IDX_7642AC73CDF80196` (`lesson_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `academician`
--
ALTER TABLE `academician`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `FK_F87474F36E2BC87` FOREIGN KEY (`academician_id`) REFERENCES `academician` (`id`);

--
-- Tablo kısıtlamaları `student_lesson`
--
ALTER TABLE `student_lesson`
  ADD CONSTRAINT `FK_7642AC73CB944F1A` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7642AC73CDF80196` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
