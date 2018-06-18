-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 юни 2018 в 17:42
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
-- Структура на таблица `categoria_pizza`
--
-- Създаване: 13 юни 2018 в 15:06
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
(4, 'безместна');

-- --------------------------------------------------------

--
-- Структура на таблица `category_ingredients`
--
-- Създаване: 28 май 2018 в 14:00
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
-- Създаване: 28 май 2018 в 11:48
--

CREATE TABLE `deliverers` (
  `deliverers_id` int(11) NOT NULL,
  `deliverers_name` varchar(100) NOT NULL,
  `deliverers_area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `deliverers`:
--   `deliverers_area`
--       `zones` -> `zones_name`
--

-- --------------------------------------------------------

--
-- Структура на таблица `ingredients`
--
-- Създаване: 28 май 2018 в 11:33
--

CREATE TABLE `ingredients` (
  `ingredients_id` int(100) NOT NULL,
  `ingredients_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `ingredients_category` varchar(100) NOT NULL,
  `ingredients_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `ingredients`:
--   `ingredients_category`
--       `category_ingredients` -> `category_name`
--   `ingredients_category`
--       `category_ingredients` -> `category_name`
--

--
-- Схема на данните от таблица `ingredients`
--

INSERT INTO `ingredients` (`ingredients_id`, `ingredients_name`, `ingredients_category`, `ingredients_price`) VALUES
(1, 'BBQ', 'sosove', 0),
(3, 'доматен сос', 'sosove', 0),
(4, 'салам пеперони', 'meso', 2),
(5, 'krave sirene', 'sirena', 1),
(6, 'chushka', 'zelenchuci\r\n', 1),
(7, 'Пушена шунка', 'meso', 2),
(8, 'Пикантно телешко', 'meso', 2),
(9, 'Чоризо', 'meso', 2),
(10, 'Пушен бекон', 'meso', 2),
(11, 'риба тон', 'meso', 2),
(12, 'пиле', 'meso', 2);

-- --------------------------------------------------------

--
-- Структура на таблица `orders`
--
-- Създаване: 28 май 2018 в 11:55
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `pizza` int(100) NOT NULL,
  `user` int(100) NOT NULL,
  `more_stuff_id` int(100) NOT NULL,
  `deliverer` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `orders`:
--   `user`
--       `user` -> `user_id`
--   `deliverer`
--       `deliverers` -> `deliverers_id`
--   `pizza`
--       `pizza` -> `pizza_id`
--

-- --------------------------------------------------------

--
-- Структура на таблица `pizza`
--
-- Създаване: 13 юни 2018 в 15:05
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
(8, 'пеперони', 12, 420, 'piperoni.jpg', 3),
(9, 'маргарита', 8, 450, 'margarita.jpg', 4);

-- --------------------------------------------------------

--
-- Структура на таблица `recipe_ingredients`
--
-- Създаване:  2 юни 2018 в 11:57
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
(9, 6);

-- --------------------------------------------------------

--
-- Структура на таблица `user`
--
-- Създаване: 28 май 2018 в 11:31
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(256) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `user`:
--

--
-- Схема на данните от таблица `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_pass`, `user_phone`, `user_address`) VALUES
(2, 'gab', '123', '123', '123');

-- --------------------------------------------------------

--
-- Структура на таблица `zones`
--
-- Създаване: 28 май 2018 в 12:21
--

CREATE TABLE `zones` (
  `zones_name` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `zones`:
--

--
-- Схема на данните от таблица `zones`
--

INSERT INTO `zones` (`zones_name`) VALUES
('banishora');

--
-- Indexes for dumped tables
--

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
  ADD KEY `r12` (`pizza`),
  ADD KEY `user` (`user`),
  ADD KEY `deliverer` (`deliverer`);

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
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`zones_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria_pizza`
--
ALTER TABLE `categoria_pizza`
  MODIFY `id_categoria_pizza` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deliverers`
--
ALTER TABLE `deliverers`
  MODIFY `deliverers_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredients_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `pizza_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения за дъмпнати таблици
--

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
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`deliverer`) REFERENCES `deliverers` (`deliverers_id`),
  ADD CONSTRAINT `r12` FOREIGN KEY (`pizza`) REFERENCES `pizza` (`pizza_id`);

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
