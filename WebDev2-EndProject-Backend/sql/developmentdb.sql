-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Gegenereerd op: 16 jun 2024 om 12:11
-- Serverversie: 11.1.2-MariaDB-1:11.1.2+maria~ubu2204
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developmentdb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `comment_text` text NOT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `product_id`, `comment_text`, `timestamp`) VALUES
(1, 1, 1, 'mooi', '2024-01-12 15:44:32'),
(2, 1, 1, 'mooi', '2024-01-12 15:49:30'),
(3, 1, 1, 'mooi', '2024-01-12 15:52:09'),
(4, 1, 1, 'zit lekker', '2024-01-12 15:52:39'),
(5, 1, 2, 'nice', '2024-01-12 16:02:48'),
(6, 1, 2, 'is really comfy', '2024-01-12 16:06:06'),
(7, 1, 1, 'Lorem ipsum dolor sit amet. Aut necessitatibus quae aut dolorem soluta sit repudiandae voluptatibus. Sed consequatur quas in laudantium maxime qui voluptatem ipsum.\r\n\r\nQui quibusdam atque aut nobis fugit et sunt commodi qui molestiae tempore non iusto omnis. Est eius molestiae ut galisum dolorum vel quia nemo.', '2024-01-12 16:52:58'),
(8, 1, 1, 'Lorem ipsum dolor sit amet. Aut necessitatibus quae aut dolorem soluta sit repudiandae voluptatibus. Sed consequatur quas in laudantium maxime qui voluptatem ipsum.\r\n\r\nQui quibusdam atque aut nobis fugit et sunt commodi qui molestiae tempore non iusto omnis. Est eius molestiae ut galisum dolorum vel quia nemo.', '2024-01-12 17:03:28'),
(9, 1, 1, 'aaaaaa', '2024-06-15 13:43:58'),
(10, 1, 1, 'kan beter', '2024-06-15 13:44:52');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `status`) VALUES
(1, 1, '2024-01-14 15:42:41', 'confirmed'),
(2, 1, '2024-01-14 19:36:42', 'confirmed'),
(3, 1, '2024-01-14 19:49:55', 'pending'),
(4, 1, '2024-01-16 16:43:00', 'pending'),
(5, 1, '2024-01-16 16:44:27', 'confirmed'),
(6, 1, '2024-01-16 16:56:18', 'confirmed'),
(7, 1, '2024-01-16 17:00:08', 'confirmed'),
(8, 1, '2024-01-16 17:56:10', 'confirmed'),
(9, 1, '2024-01-17 17:04:41', 'pending'),
(10, 1, '2024-01-17 17:09:44', 'pending'),
(11, 1, '2024-01-17 18:33:01', 'confirmed'),
(12, 1, '2024-06-15 20:41:13', 'confirmed'),
(13, 1, '2024-06-15 20:55:48', 'confirmed'),
(14, 1, '2024-06-15 21:00:42', 'confirmed'),
(15, 1, '2024-06-15 21:06:08', 'confirmed'),
(16, 1, '2024-06-16 11:58:12', 'confirmed');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 2),
(6, 2, 5, 1),
(7, 2, 8, 3),
(10, 4, 2, 1),
(11, 5, 2, 1),
(12, 6, 1, 2),
(13, 6, 2, 1),
(14, 7, 1, 2),
(15, 7, 2, 1),
(16, 8, 5, 1),
(18, 9, 3, 1),
(19, 9, 3, 1),
(21, 10, 2, 2),
(22, 10, 1, 2),
(23, 11, 1, 1),
(24, 12, 1, 2),
(25, 12, 10, 1),
(26, 13, 2, 1),
(27, 13, 2, 1),
(28, 14, 1, 1),
(29, 15, 1, 2),
(30, 16, 1, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `stock`, `image`) VALUES
(1, 'Manfinity Homme Flap Pocket Oversized Jacket - M', 'trendy and comfortable mens jacket with an oversized fit. It features flap pockets, adding both style and functionality to the design. Crafted by Manfinity Homme, its a versatile piece suitable for various casual occasions.', 89.99, 92, '../assets/img/productimages/ProductFoto1.jpg'),
(2, 'Manfinity Homme Buffalo Print Jacket - L', 'men\'s one-piece shirt-jacket with a Buffalo checkered print, featuring a flap pocket with a zipper for a stylish and versatile look.', 20.00, 99, '../assets/img/productimages/ProductFoto2.jpg'),
(3, 'Frenchy High Neck Oversized Ribbed T-shirt - S', 'chic and comfortable wardrobe essential. With a high neck and an oversized fit, this T-shirt offers a trendy and relaxed style. The ribbed texture adds a subtle detail to the fabric, creating a versatile piece suitable for casual and fashionable looks.', 25.00, 150, '../assets/img/productimages/ProductFoto3.jpg'),
(5, 'Lune Elegant white Blouse with cutout neckline - M\r\n', 'a timeless and sophisticated wardrobe essential, versatile for both formal and casual occasions with its classic design and clean white color.', 40.00, 99, '../assets/img/productimages/ProductFoto4.jpg'),
(6, 'Heart Print Oversized Sweatshirts - S', 'stylish and comfy with an oversized fit and adorable heart prints, adding a playful touch to your casual wardrobe.', 20.00, 100, '../assets/img/productimages/ProductFoto5.jpg'),
(7, 'Cape Sleeve Double-Breasted Wool Coat - S', 'A chic and elegant choice, the Women\'s Cape Sleeve Double-Breasted Wool Coat features stylish cape sleeves and a double-breasted design. Crafted from warm wool, it offers both comfort and timeless sophistication for any occasion.', 80.00, 100, '../assets/img/productimages/ProductFoto6.jpg'),
(8, 'Checkered Double Row Button Trench Coats - L', 'Stylish and sophisticated, these Men\'s Checkered Trench Coats by Manfinity feature a double row of buttons and a waist belt, adding a classic touch to your look. Perfect for versatile and polished styling.', 60.00, 100, '../assets/img/productimages/ProductFoto7.jpg'),
(9, 'MEN PLUS Graphic Letter Print Oversized Shirt', 'stylish and bold choice. Featuring a graphic letter print, this oversized shirt adds a contemporary edge to your wardrobe. Perfect for a trendy and relaxed look, the shirt is designed with comfort and fashion in mind.', 20.00, 100, '../assets/img/productimages/ProductFoto8.jpg'),
(10, 'Checked Scarves, Soft and Warm for Autumn/Winter', 'Stay cozy and stylish in these soft Checkered Scarves, perfect for autumn and winter.', 15.00, 100, '../assets/img/productimages/ProductFoto9.jpg'),
(11, 'Summer Fisherman Hat for Men and Women', 'Elevate your summer style with this new Harajuku-inspired Bucket Hat, adorned with a distinctive five rings pin. Perfect for both men and women, it adds a trendy flair to your warm-weather wardrobe.', 15.00, 100, '../assets/img/productimages/ProductFoto10.jpg'),
(12, 'Autumn and Winter Campus Student Shoes size - 38', 'Step into style with these new lace-up slip-on shoes designed for campus life in the fall and winter. The fashionable black pair comes with thick soles, offering both comfort and trendiness.', 40.00, 100, '../assets/img/productimages/ProductFoto11.jpg'),
(13, 'Short-Sleeve Ribbed Polo Knit Top - S', 'Classic and timeless wardrobe essential. With short sleeves and a ribbed knit texture, it offers a classic look suitable for various occasions. The polo collar adds a touch of sophistication for a polished and casual style.', 30.00, 100, '../assets/img/productimages/ProductFoto12.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`) VALUES
(1, 'UmitCustomer', '$2y$10$ypiFmI0YfBwoIxTo0cqoUuDPKW92Oj680I3glWPLRd0zqOAJZ/Psy', 'UmitCustomer@gmail.com', 'customer'),
(4, 'hallootjes', '$2y$10$uHJDwm9gieYPlji/Bbe8O.WPEf5wmaL4gFxZ1XHyZcCc1.G/jZ6Dy', 'ds@sdc.com', 'customer'),
(5, 'mamaamam', '$2y$10$uePo2TrSx2vdeKT3G2SOnOhRrqz4utIus3/CLY/wz/dcvTQ0ArSVC', 'df@dcv.com', 'customer'),
(6, 'UmitAdmin', '$2y$10$KuWSAZ2vwTHc8nVgNFteFeALKL4NYr9rxmyRxrmVao3EMT3IzMVxC', 'UmitAdmin@gmail.com', 'admin'),
(7, 'sdsd', '$2y$10$nqmI.iocwjAxg.bBkeDMMO4HMzhcjOef9V31MEs9n3DIU.E3PyjEe', 'dw@sd.com', 'cutomer'),
(8, 'Mam', '$2y$10$fylRaXZ3iFMTHXqP2PqWr.fiPxnAUFsUtl1zj6Wd6C2G9Khpyh3.K', 'aa@bb.com', 'cutomer');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT voor een tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Beperkingen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Beperkingen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Beperkingen voor tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
