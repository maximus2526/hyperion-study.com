-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 05 2023 г., 12:37
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
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `first_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `payment_method` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_method` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `first_name`, `last_name`, `email`, `address`, `notes`, `payment_method`, `delivery_method`, `total_price`) VALUES
(48, '2023-07-05 07:26:06', '21213232', '12321322', 'maxim.kliakhin@gmail.com', '21312323', '21312323', 'direct', 'nova', 23765),
(49, '2023-07-05 07:26:06', '21213232', '12321322', 'maxim.kliakhin@gmail.com', '21312323', '21312323', 'direct', 'nova', 23765),
(50, '2023-07-05 07:26:06', '123', '123', 'maxim.kliakhin@gmail.com', '123', '123', 'direct', 'nova', 23765);

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count_of_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `count_of_product`) VALUES
(1, 49, 20, 4),
(2, 49, 20, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_cost` int(11) NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number` int(11) NOT NULL DEFAULT '0',
  `recommended` int(1) DEFAULT '0',
  `hot` int(1) DEFAULT '0',
  `product_img` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_cost`, `short_description`, `order_number`, `recommended`, `hot`, `product_img`) VALUES
(15, 'text2', 235, 'dasdssadasdasadsdsd', 12, 0, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(16, 'text', 233, 'sadffadsssdfsdafadsf', 21, 0, 0, '/views/img/products/hyperion-product-img-1.jpg'),
(17, 'text2', 235, 'dasdssadasdasadsdsd', 12, 0, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(18, 'text', 233, 'sadffadsssdfsdafadsf', 21, 1, 0, '/views/img/products/hyperion-product-img-1.jpg'),
(19, 'text2', 235, 'dasdssadasdasadsdsd', 12, 0, 0, '/views/img/products/hyperion-product-img-1.jpg'),
(20, 'text', 233, 'sadffadsssdfsdafadsf', 21, 1, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(21, 'text2', 235, 'dasdssadasdasadsdsd', 12, 0, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(22, 'text', 233, 'sadffadsssdfsdafadsf', 21, 1, 0, '/views/img/products/hyperion-product-img-1.jpg'),
(23, 'text2', 235, 'dasdssadasdasadsdsd', 12, 0, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(24, 'text', 233, 'sadffadsssdfsdafadsf', 21, 1, 0, '/views/img/products/hyperion-product-img-1.jpg'),
(25, 'text2', 235, 'dasdssadasdasadsdsd', 12, 0, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(26, 'text', 233, 'sadffadsssdfsdafadsf', 21, 1, 0, '/views/img/products/hyperion-product-img-1.jpg'),
(27, 'text2', 235, 'dasdssadasdasadsdsd', 12, 0, 0, '/views/img/products/hyperion-product-img-1.jpg'),
(28, 'text', 233, 'sadffadsssdfsdafadsf', 21, 1, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(29, 'text2', 235, 'dasdssadasdasadsdsd', 12, 0, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(30, 'text', 233, 'sadffadsssdfsdafadsf', 21, 1, 0, '/views/img/products/hyperion-product-img-1.jpg'),
(31, 'text2', 235, 'dasdssadasdasadsdsd', 12, 0, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(32, 'text', 233, 'sadffadsssdfsdafadsf', 21, 1, 0, '/views/img/products/hyperion-product-img-1.jpg'),
(59, '2121', 2121, '21211', 0, 1, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(60, '2121', 2121, '21211', 0, 1, 1, '/views/img/products/hyperion-product-img-1.jpg'),
(61, '2121', 2121, '21211', 0, 1, 1, '/views/img/products/hyperion-product-img-1.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'admin', '$2y$10$nhgnaYUYz3nabCeuYDYgSe8gxJ8lhRGm2IUpAPycwf6K7LN61wi3u');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_items_ibfk_1` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
