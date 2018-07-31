-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 юли 2018 в 17:24
-- Версия на сървъра: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzashop`
--

-- --------------------------------------------------------

--
-- Структура на таблица `admin_user`
--
-- Създаване:  1 юли 2018 в 14:59
--

CREATE TABLE `admin_user` (
  `admin_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `admin_user`:
--   `admin_email`
--       `user` -> `user_email`
--

--
-- Схема на данните от таблица `admin_user`
--

INSERT INTO `admin_user` (`admin_email`) VALUES
('admin@admin.ad'),
('asd@asd.asd');

-- --------------------------------------------------------

--
-- Структура на таблица `categoria_pizza`
--
-- Създаване: 26 юни 2018 в 14:06
--

CREATE TABLE `categoria_pizza` (
  `id_categoria_pizza` int(255) NOT NULL,
  `categoria_pizza` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `categoria_pizza`:
--

--
-- Схема на данните от таблица `categoria_pizza`
--

INSERT INTO `categoria_pizza` (`id_categoria_pizza`, `categoria_pizza`) VALUES
(3, 'местна'),
(4, 'безместна'),
(5, 'люта'),
(6, 'Нова');

-- --------------------------------------------------------

--
-- Структура на таблица `category_ingredients`
--
-- Създаване: 26 юни 2018 в 14:06
--

CREATE TABLE `category_ingredients` (
  `category_name` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `category_ingredients`:
--

--
-- Схема на данните от таблица `category_ingredients`
--

INSERT INTO `category_ingredients` (`category_name`) VALUES
('meso'),
('sirena'),
('sosove'),
('zelenchuci\r\n');

-- --------------------------------------------------------

--
-- Структура на таблица `deliverers`
--
-- Създаване: 10 юли 2018 в 15:17
--

CREATE TABLE `deliverers` (
  `deliverers_id` int(11) NOT NULL,
  `deliverers_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `deliverers_area` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `deliverers`:
--   `deliverers_area`
--       `zones` -> `zones_name`
--

--
-- Схема на данните от таблица `deliverers`
--

INSERT INTO `deliverers` (`deliverers_id`, `deliverers_name`, `deliverers_area`) VALUES
(11, 'петър петров', 'бояна'),
(12, 'Иван манчев', 'княжево');

-- --------------------------------------------------------

--
-- Структура на таблица `ingredients`
--
-- Създаване:  1 юли 2018 в 14:59
--

CREATE TABLE `ingredients` (
  `ingredients_id` int(100) NOT NULL,
  `ingredients_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ingredients_category` varchar(100) NOT NULL,
  `ingredients_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `ingredients`:
--   `ingredients_category`
--       `category_ingredients` -> `category_name`
--

--
-- Схема на данните от таблица `ingredients`
--

INSERT INTO `ingredients` (`ingredients_id`, `ingredients_name`, `ingredients_category`, `ingredients_price`) VALUES
(1, 'BBQ сос', 'sosove', 0),
(3, 'доматен сос', 'sosove', 0),
(4, 'салам пеперони', 'meso', 2),
(5, 'краве сирене', 'sirena', 1),
(6, 'chushka', 'zelenchuci\r\n', 1),
(7, 'Пушена шунка', 'meso', 2),
(8, 'Пикантно телешко', 'meso', 2),
(9, 'Чоризо', 'meso', 2),
(10, 'Пушен бекон', 'meso', 2),
(11, 'риба тон', 'meso', 2),
(12, 'пиле', 'meso', 2),
(13, 'люти чушки', 'zelenchuci\r\n', 1),
(35, 'лук', 'meso', 1),
(38, 'пармезан', 'sirena', 2),
(39, 'маслини', 'zelenchuci\r\n', 1);

-- --------------------------------------------------------

--
-- Структура на таблица `orders`
--
-- Създаване:  1 юли 2018 в 14:59
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_address` varchar(150) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `deliverer` int(100) DEFAULT NULL,
  `status` enum('pending','acknowledged','delievered','') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `orders`:
--   `deliverer`
--       `deliverers` -> `deliverers_id`
--

--
-- Схема на данните от таблица `orders`
--

INSERT INTO `orders` (`order_id`, `user_email`, `user_name`, `user_address`, `user_phone`, `deliverer`, `status`) VALUES
(1, 'admin@admin.ad', 'admin adminski testov', 'kv knqjevo ul elsha 44', '0845214785', NULL, 'pending'),
(2, 'admin@admin.ad', 'admin adminski testov', 'kv knqjevo ul elsha 44', '0845214785', NULL, 'acknowledged');

-- --------------------------------------------------------

--
-- Структура на таблица `order_details`
--
-- Създаване:  1 юли 2018 в 14:59
--

CREATE TABLE `order_details` (
  `order_id` int(100) NOT NULL,
  `pizza_id` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` float NOT NULL,
  `more_stuff_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `order_details`:
--   `pizza_id`
--       `pizza` -> `pizza_id`
--   `order_id`
--       `orders` -> `order_id`
--

--
-- Схема на данните от таблица `order_details`
--

INSERT INTO `order_details` (`order_id`, `pizza_id`, `quantity`, `price`, `more_stuff_id`, `note`) VALUES
(1, 8, 1, 12, '', NULL),
(2, 8, 1, 33, 'Чоризо, Пушен бекон, пиле, Пикантно телешко, Пушена шунка, лук, салам пеперони, риба тон, краве сирене, пармезан, BBQ сос, люти чушки, chushka, маслини', NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `pizza`
--
-- Създаване:  1 юли 2018 в 14:59
--

CREATE TABLE `pizza` (
  `pizza_id` int(100) NOT NULL,
  `pizza_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pizza_price` int(100) NOT NULL,
  `pizza_weight` int(100) NOT NULL,
  `pizza_photo` text,
  `categoria_pizza` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `pizza`:
--   `categoria_pizza`
--       `categoria_pizza` -> `id_categoria_pizza`
--

--
-- Схема на данните от таблица `pizza`
--

INSERT INTO `pizza` (`pizza_id`, `pizza_name`, `pizza_price`, `pizza_weight`, `pizza_photo`, `categoria_pizza`) VALUES
(0, 'направена ', 5, 420, 'nova.JPG', 6),
(8, 'пеперони', 12, 420, 'piperoni.jpg', 3),
(9, 'маргарита', 8, 450, 'margarita.jpg', 4),
(10, 'люта', 9, 400, 'pivantna.jpg', 5);

-- --------------------------------------------------------

--
-- Структура на таблица `recipe_ingredients`
--
-- Създаване:  1 юли 2018 в 14:59
--

CREATE TABLE `recipe_ingredients` (
  `rec_id` int(100) NOT NULL,
  `ing_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `recipe_ingredients`:
--   `ing_id`
--       `ingredients` -> `ingredients_id`
--   `rec_id`
--       `pizza` -> `pizza_id`
--

--
-- Схема на данните от таблица `recipe_ingredients`
--

INSERT INTO `recipe_ingredients` (`rec_id`, `ing_id`) VALUES
(8, 1),
(8, 4),
(9, 3),
(9, 6),
(10, 1),
(10, 9),
(10, 13);

-- --------------------------------------------------------

--
-- Структура на таблица `user`
--
-- Създаване:  1 юли 2018 в 14:59
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_pass` varchar(256) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_address` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `user`:
--

--
-- Схема на данните от таблица `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_name`, `user_pass`, `user_phone`, `user_address`) VALUES
(0, 'admin@admin.ad', 'admin adminski testov', '$2y$10$hqFNlK5Q3tQDGPvzjGHadervY1RX/HAJAu1jFsg7.2mp.IzpCzj4C', '0845214785', 'kv knqjevo ul elsha 44'),
(5, 'gabriel.pal.96@gmail.com', 'габи', '$2y$10$JfvHYAF5DrtHA2wF.U6Ztu4nCs6rQsnmM5nygbhwtKEK/msBM/kYe', '08811', 'елша 21'),
(6, 'asd@asd.asd', 'vsgv', '$2y$10$3MN8NgxW9NpEF34woofSl.AJYD1wKbH3kV73EUQ0j3sydqzI.gSGK', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Структура на таблица `zones`
--
-- Създаване: 10 юли 2018 в 14:03
--

CREATE TABLE `zones` (
  `zones_name` varchar(110) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_zones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `zones`:
--

--
-- Схема на данните от таблица `zones`
--

INSERT INTO `zones` (`zones_name`, `id_zones`) VALUES
('княжево', 3),
('бояна', 4),
('люлин', 5),
('овча купел', 6),
('зона Б-5', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`admin_email`);

--
-- Indexes for table `categoria_pizza`
--
ALTER TABLE `categoria_pizza`
  ADD PRIMARY KEY (`id_categoria_pizza`);

--
-- Indexes for table `category_ingredients`
--
ALTER TABLE `category_ingredients`
  ADD PRIMARY KEY (`category_name`);

--
-- Indexes for table `deliverers`
--
ALTER TABLE `deliverers`
  ADD PRIMARY KEY (`deliverers_id`),
  ADD UNIQUE KEY `deliverers_name` (`deliverers_name`),
  ADD KEY `deliverers_area` (`deliverers_area`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredients_id`),
  ADD KEY `ingredients_category` (`ingredients_category`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `deliverer` (`deliverer`),
  ADD KEY `user` (`user_email`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`pizza_id`,`more_stuff_id`),
  ADD KEY `pizza` (`pizza_id`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`pizza_id`),
  ADD KEY `categoria_pizza` (`categoria_pizza`);

--
-- Indexes for table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD PRIMARY KEY (`rec_id`,`ing_id`),
  ADD KEY `ing_id` (`ing_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`zones_name`),
  ADD KEY `id_zones` (`id_zones`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria_pizza`
--
ALTER TABLE `categoria_pizza`
  MODIFY `id_categoria_pizza` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `deliverers`
--
ALTER TABLE `deliverers`
  MODIFY `deliverers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredients_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `pizza_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id_zones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `admin_user`
--
ALTER TABLE `admin_user`
  ADD CONSTRAINT `admin_user_ibfk_1` FOREIGN KEY (`admin_email`) REFERENCES `user` (`user_email`);

--
-- Ограничения за таблица `deliverers`
--
ALTER TABLE `deliverers`
  ADD CONSTRAINT `deliverers_ibfk_1` FOREIGN KEY (`deliverers_area`) REFERENCES `zones` (`zones_name`);

--
-- Ограничения за таблица `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`ingredients_category`) REFERENCES `category_ingredients` (`category_name`);

--
-- Ограничения за таблица `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`deliverer`) REFERENCES `deliverers` (`deliverers_id`);

--
-- Ограничения за таблица `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order` FOREIGN KEY (`pizza_id`) REFERENCES `pizza` (`pizza_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Ограничения за таблица `pizza`
--
ALTER TABLE `pizza`
  ADD CONSTRAINT `pizza_ibfk_1` FOREIGN KEY (`categoria_pizza`) REFERENCES `categoria_pizza` (`id_categoria_pizza`);

--
-- Ограничения за таблица `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD CONSTRAINT `recipe_ingredients_ibfk_2` FOREIGN KEY (`ing_id`) REFERENCES `ingredients` (`ingredients_id`),
  ADD CONSTRAINT `recipe_ingredients_ibfk_3` FOREIGN KEY (`rec_id`) REFERENCES `pizza` (`pizza_id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
