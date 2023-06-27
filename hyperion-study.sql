-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 27 2023 г., 10:34
-- Версия сервера: 5.7.33
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hyperion-study`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients_info`
--

CREATE TABLE `clients_info` (
  `client_info_id` int(11) NOT NULL,
  `first_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clients_info`
--

INSERT INTO `clients_info` (`client_info_id`, `first_name`, `last_name`, `email`, `address`, `notes`) VALUES
(21, 'Максим', '1', 'maxim.kliakhin@gmail.com', '213231', NULL),
(22, '21312', '231', '2132', '123231321', NULL),
(23, '1', '1', 'maxim.kliakhin@gmail.com', '213', NULL),
(24, '213', '123', 'maxim.kliakhin@gmail.com', '321', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `client_info_id` int(11) NOT NULL,
  `count_of_products` int(11) NOT NULL DEFAULT '1',
  `payment_method` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_method` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_ids` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `client_info_id`, `count_of_products`, `payment_method`, `delivery_method`, `products_ids`, `total_price`) VALUES
(14, 21, 1, 'direct', 'nova', '5,4', 468),
(15, 22, 1, 'direct', 'nova', '5,4', 468),
(16, 23, 1, 'direct', 'nova', '4', 233),
(17, 24, 1, 'direct', 'nova', '4', 233);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_cost` int(11) NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number` int(11) NOT NULL,
  `recommended` int(1) DEFAULT NULL,
  `hot` int(1) DEFAULT NULL,
  `product_img` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_cost`, `short_description`, `order_number`, `recommended`, `hot`, `product_img`) VALUES
(2, 'text1', 233, 'sadffadsssdfsdafadsf', 21, 1, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(3, 'text2', 235, 'dasdssadasdasadsdsd', 12, NULL, NULL, '/views/img/products/hyperion-product-img-1.jpg'),
(4, 'text2', 233, 'sadffadsssdfsdafadsf', 21, 0, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(5, 'text2', 235, 'dasdssadasdasadsdsd', 12, NULL, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(6, 'text3', 233, 'sadffadsssdfsdafadsf', 21, 1, NULL, '/views/img/products/hyperion-product-img-1.jpg'),
(7, 'text2', 235, 'dasdssadasdasadsdsd', 12, NULL, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(8, 'text4', 233, 'sadffadsssdfsdafadsf', 21, 1, NULL, '/views/img/products/hyperion-product-img-1.jpg'),
(9, 'text2', 235, 'dasdssadasdasadsdsd', 12, NULL, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(10, 'text5', 233, 'sadffadsssdfsdafadsf', 21, 1, NULL, '/views/img/products/hyperion-product-img-1.jpg'),
(11, 'text2', 235, 'dasdssadasdasadsdsd', 12, NULL, NULL, '/views/img/products/hyperion-product-img-1.jpg'),
(12, 'text6', 233, 'sadffadsssdfsdafadsf', 21, 0, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(13, 'text2', 235, 'dasdssadasdasadsdsd', 12, NULL, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(14, 'text', 233, 'sadffadsssdfsdafadsf', 21, 1, NULL, '/views/img/products/hyperion-product-img-1.jpg'),
(15, 'text2', 235, 'dasdssadasdasadsdsd', 12, NULL, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(16, 'text', 233, 'sadffadsssdfsdafadsf', 21, 0, NULL, '/views/img/products/hyperion-product-img-1.jpg'),
(17, 'text2', 235, 'dasdssadasdasadsdsd', 12, NULL, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(18, 'text', 233, 'sadffadsssdfsdafadsf', 21, 1, NULL, '/views/img/products/hyperion-product-img-1.jpg'),
(19, 'text2', 235, 'dasdssadasdasadsdsd', 12, NULL, NULL, '/views/img/products/hyperion-product-img-1.jpg'),
(20, 'text', 233, 'sadffadsssdfsdafadsf', 21, 1, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(21, 'text2', 235, 'dasdssadasdasadsdsd', 12, NULL, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(22, 'text', 233, 'sadffadsssdfsdafadsf', 21, 1, NULL, '/views/img/products/hyperion-product-img-1.jpg'),
(23, 'text2', 235, 'dasdssadasdasadsdsd', 12, NULL, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(24, 'text', 233, 'sadffadsssdfsdafadsf', 21, 1, NULL, '/views/img/products/hyperion-product-img-1.jpg'),
(25, 'text2', 235, 'dasdssadasdasadsdsd', 12, NULL, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(26, 'text', 233, 'sadffadsssdfsdafadsf', 21, 1, NULL, '/views/img/products/hyperion-product-img-1.jpg'),
(27, 'text2', 235, 'dasdssadasdasadsdsd', 12, NULL, NULL, '/views/img/products/hyperion-product-img-1.jpg'),
(28, 'text', 233, 'sadffadsssdfsdafadsf', 21, 1, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(29, 'text2', 235, 'dasdssadasdasadsdsd', 12, NULL, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(30, 'text', 233, 'sadffadsssdfsdafadsf', 21, 1, NULL, '/views/img/products/hyperion-product-img-1.jpg'),
(31, 'text2', 235, 'dasdssadasdasadsdsd', 12, NULL, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(32, 'text', 233, 'sadffadsssdfsdafadsf', 21, 1, NULL, '/views/img/products/hyperion-product-img-1.jpg'),
(33, 'end', 235, 'dasdssadasdasadsdsd', 12, NULL, 1, '/views/img/products/hyperion-product-img-1.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clients_info`
--
ALTER TABLE `clients_info`
  ADD PRIMARY KEY (`client_info_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `client_info_id` (`client_info_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clients_info`
--
ALTER TABLE `clients_info`
  MODIFY `client_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client_info_id`) REFERENCES `clients_info` (`client_info_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
