-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 10 Haz 2022, 13:51:05
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `carsfactor`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) DEFAULT NULL,
  `admin_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`user_id`, `admin_level`) VALUES
(2, 10);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `model` varchar(20) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `performance` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `carimg` varchar(100) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `car`
--

INSERT INTO `car` (`car_id`, `model`, `brand`, `performance`, `color`, `carimg`, `cost`) VALUES
(1, 'Urus', 'Lamborghini', 780, 'Black', 'car1.png', 190000),
(2, 'Concept Two', 'Rimac', 830, 'Grey', 'car2.png', 350000),
(3, 'I.D.R', 'Volkswagen', 999, 'White', 'car3.png', 1000000),
(4, '512 S', 'Ferrari', 900, 'Red', 'car4.png', 500000),
(5, 'Skyline GT-R 34', 'Nissan', 970, 'Bayside Blue', 'car5.png', 750000),
(6, 'Diablo SV', 'Lamborghini', 940, 'Yellow', 'car6.png', 600000);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `manage`
--

CREATE TABLE `manage` (
  `admin_id` int(11) DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `map`
--

CREATE TABLE `map` (
  `map_name` varchar(50) NOT NULL,
  `mapimg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `map`
--

INSERT INTO `map` (`map_name`, `mapimg`) VALUES
('Intercity İstanbul Park', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/pistoncity-flag.svg'),
('Monaco GP', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/rubbertown-flag.svg'),
('Nurburging', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/ratchettown-flag.svg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `content` varchar(200) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mDate` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `messages`
--

INSERT INTO `messages` (`message_id`, `content`, `user_id`, `mDate`) VALUES
(1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distrib', 3, '09:18:13'),
(2, 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', 5, '10:07:20'),
(3, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form', 2, '14:03:25'),
(4, 'ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC', 4, '15:15:29'),
(37, 'Deneme 32', 2, '14:13:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `own`
--

CREATE TABLE `own` (
  `user_id` int(11) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `own`
--

INSERT INTO `own` (`user_id`, `car_id`) VALUES
(2, 2),
(3, 6),
(5, 4),
(4, 5),
(2, 5),
(2, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `player`
--

CREATE TABLE `player` (
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `player`
--

INSERT INTO `player` (`user_id`) VALUES
(2),
(3),
(4),
(5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `race`
--

CREATE TABLE `race` (
  `race_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `prize` int(11) NOT NULL,
  `user_ids` int(11) DEFAULT NULL,
  `map` varchar(50) DEFAULT NULL,
  `car_ids` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `race`
--

INSERT INTO `race` (`race_id`, `date`, `prize`, `user_ids`, `map`, `car_ids`) VALUES
(25, '2022-06-03', 50000, 2, 'Monaco GP', 4),
(26, '2022-06-03', 40000, 2, 'Intercity İstanbul Park', 2),
(27, '2022-06-03', 50000, 5, 'Nurburging', 4),
(28, '2022-06-03', 35000, 2, 'Monaco GP', 4),
(29, '2022-06-03', 60000, 4, 'Nurburging', 5),
(30, '2022-06-03', 30000, 3, 'Intercity İstanbul Park', 6),
(31, '2022-06-03', 60000, 2, 'Monaco GP', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `user_level` int(11) NOT NULL DEFAULT 1,
  `password` varchar(100) NOT NULL,
  `user_name` varchar(24) NOT NULL,
  `money` int(11) DEFAULT 10000,
  `user_avatar` varchar(100) NOT NULL DEFAULT 'https://www.ysm.ca/wp-content/uploads/2020/02/default-avatar.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`userid`, `user_level`, `password`, `user_name`, `money`, `user_avatar`) VALUES
(2, 1, '005cc06bbaf1d8675db8d08a54bf2858', 'Elcros', 3780000, 'profileavatar.png'),
(3, 1, '1a1dc91c907325c69271ddf0c944bc72', 'User1', 40000, 'https://www.ysm.ca/wp-content/uploads/2020/02/default-avatar.jpg'),
(4, 1, 'c1572d05424d0ecb2a65ec6a82aeacbf', 'User2', 70000, 'https://www.ysm.ca/wp-content/uploads/2020/02/default-avatar.jpg'),
(5, 1, '3afc79b597f88a72528e864cf81856d2', 'User3', 60000, 'https://www.ysm.ca/wp-content/uploads/2020/02/default-avatar.jpg'),
(6, 1, '005cc06bbaf1d8675db8d08a54bf2858', 'User4', 10000, 'https://www.ysm.ca/wp-content/uploads/2020/02/default-avatar.jpg'),
(7, 1, '005cc06bbaf1d8675db8d08a54bf2858', 'Elcros2', 10000, 'https://www.ysm.ca/wp-content/uploads/2020/02/default-avatar.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `_join`
--

CREATE TABLE `_join` (
  `user_id` int(11) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `race_id` int(11) DEFAULT NULL,
  `map_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `_join`
--

INSERT INTO `_join` (`user_id`, `car_id`, `race_id`, `map_name`) VALUES
(2, 4, 25, 'Monaco GP'),
(3, 6, 25, 'Monaco GP'),
(4, 5, 25, 'Monaco GP'),
(5, 4, 25, 'Monaco GP'),
(2, 2, 26, 'Intercity İstanbul Park'),
(3, 6, 26, 'Intercity İstanbul Park'),
(4, 5, 26, 'Intercity İstanbul Park'),
(5, 4, 26, 'Intercity İstanbul Park'),
(2, 1, 27, 'Nurburging'),
(3, 6, 27, 'Nurburging'),
(4, 5, 27, 'Nurburging'),
(5, 4, 27, 'Nurburging'),
(2, 4, 28, 'Monaco GP'),
(3, 6, 28, 'Monaco GP'),
(4, 5, 28, 'Monaco GP'),
(5, 4, 28, 'Monaco GP'),
(2, 2, 29, 'Nurburging'),
(3, 6, 29, 'Nurburging'),
(4, 5, 29, 'Nurburging'),
(5, 4, 29, 'Nurburging'),
(2, 2, 30, 'Intercity İstanbul Park'),
(3, 6, 30, 'Intercity İstanbul Park'),
(4, 5, 30, 'Intercity İstanbul Park'),
(5, 4, 30, 'Intercity İstanbul Park'),
(2, 2, 31, 'Monaco GP'),
(3, 6, 31, 'Monaco GP'),
(4, 5, 31, 'Monaco GP'),
(5, 4, 31, 'Monaco GP');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`);

--
-- Tablo için indeksler `manage`
--
ALTER TABLE `manage`
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `message_id` (`message_id`);

--
-- Tablo için indeksler `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`map_name`);

--
-- Tablo için indeksler `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `own`
--
ALTER TABLE `own`
  ADD KEY `car_id` (`car_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `player`
--
ALTER TABLE `player`
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`race_id`),
  ADD KEY `user_ids` (`user_ids`),
  ADD KEY `map` (`map`),
  ADD KEY `car_ids` (`car_ids`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Tablo için indeksler `_join`
--
ALTER TABLE `_join`
  ADD KEY `car_id` (`car_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `race_id` (`race_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Tablo için AUTO_INCREMENT değeri `race`
--
ALTER TABLE `race`
  MODIFY `race_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`);

--
-- Tablo kısıtlamaları `manage`
--
ALTER TABLE `manage`
  ADD CONSTRAINT `manage_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `manage_ibfk_2` FOREIGN KEY (`message_id`) REFERENCES `messages` (`message_id`);

--
-- Tablo kısıtlamaları `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`);

--
-- Tablo kısıtlamaları `own`
--
ALTER TABLE `own`
  ADD CONSTRAINT `own_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`),
  ADD CONSTRAINT `own_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`);

--
-- Tablo kısıtlamaları `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`);

--
-- Tablo kısıtlamaları `race`
--
ALTER TABLE `race`
  ADD CONSTRAINT `race_ibfk_1` FOREIGN KEY (`user_ids`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `race_ibfk_2` FOREIGN KEY (`map`) REFERENCES `map` (`map_name`),
  ADD CONSTRAINT `race_ibfk_3` FOREIGN KEY (`car_ids`) REFERENCES `car` (`car_id`);

--
-- Tablo kısıtlamaları `_join`
--
ALTER TABLE `_join`
  ADD CONSTRAINT `_join_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`),
  ADD CONSTRAINT `_join_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `_join_ibfk_3` FOREIGN KEY (`race_id`) REFERENCES `race` (`race_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
