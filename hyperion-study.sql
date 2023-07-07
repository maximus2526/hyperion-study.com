-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 07 2023 г., 10:10
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
(1, '2023-07-06 07:18:46', '23', '213', 'maxim.kliakhin@gmail.com', '212', '213', 'direct', 'nova', 235),
(2, '2023-07-06 08:12:49', 'Test', 'Test', 'maxim.kliakhin@gmail.com', 'sdadsa', 'asdsad', 'direct', 'nova', 938),
(3, '2023-07-06 10:58:23', 'Test', 'Test', 'maxim.kliakhin@gmail.com', 'sdadsa', 'asdsad', 'direct', 'nova', 938),
(4, '2023-07-06 11:00:38', 'Test', 'Test', 'maxim.kliakhin@gmail.com', 'sdadsa', 'asdsad', 'direct', 'nova', 938),
(5, '2023-07-06 11:02:30', 'Test', 'Test', 'maxim.kliakhin@gmail.com', 'sdadsa', 'asdsad', 'direct', 'nova', 938),
(6, '2023-07-06 11:03:57', 'Test', 'Test', 'maxim.kliakhin@gmail.com', 'sdadsa', 'asdsad', 'direct', 'nova', 938),
(7, '2023-07-06 11:04:13', 'Test', 'Test', 'maxim.kliakhin@gmail.com', 'sdadsa', 'asdsad', 'direct', 'nova', 938),
(8, '2023-07-06 11:04:16', 'Test', 'Test', 'maxim.kliakhin@gmail.com', 'sdadsa', 'asdsad', 'direct', 'nova', 938),
(9, '2023-07-06 11:06:44', 'Test', 'Test', 'maxim.kliakhin@gmail.com', 'sdadsa', 'asdsad', 'direct', 'nova', 938),
(10, '2023-07-06 11:06:46', 'Test', 'Test', 'maxim.kliakhin@gmail.com', 'sdadsa', 'asdsad', 'direct', 'nova', 938),
(11, '2023-07-06 11:07:21', 'Test', 'Test', 'maxim.kliakhin@gmail.com', 'sdadsa', 'asdsad', 'direct', 'nova', 938),
(12, '2023-07-06 11:08:44', 'Test', 'Test', 'maxim.kliakhin@gmail.com', 'sdadsa', 'asdsad', 'direct', 'nova', 938),
(13, '2023-07-06 11:08:45', 'Test', 'Test', 'maxim.kliakhin@gmail.com', 'sdadsa', 'asdsad', 'direct', 'nova', 938),
(14, '2023-07-06 11:12:16', 'Test', 'Test', 'maxim.kliakhin@gmail.com', 'sdadsa', 'asdsad', 'direct', 'nova', 938),
(15, '2023-07-06 11:13:21', 'Test', 'Test', 'maxim.kliakhin@gmail.com', 'sdadsa', 'asdsad', 'direct', 'nova', 938),
(16, '2023-07-06 11:58:32', '231', '132213', 'maxim.kliakhin@gmail.com', '21123123', '213312', 'direct', 'nova', 938),
(17, '2023-07-06 11:59:35', '231', '132213', 'maxim.kliakhin@gmail.com', '21123123', '213312', 'direct', 'nova', 938),
(18, '2023-07-06 12:02:29', '231', '132213', 'maxim.kliakhin@gmail.com', '21123123', '213312', 'direct', 'nova', 938),
(19, '2023-07-06 12:14:37', '231', '132213', 'maxim.kliakhin@gmail.com', '21123123', '213312', 'direct', 'nova', 938),
(20, '2023-07-06 12:16:11', '123', '123', 'maxim.kliakhin@gmail.com', '1223', '123', 'direct', 'nova', 938),
(21, '2023-07-06 12:25:51', '123', '123', 'maxim.kliakhin@gmail.com', '1223', '123', 'direct', 'nova', 938),
(22, '2023-07-06 12:26:36', '123', '123', 'maxim.kliakhin@gmail.com', '1223', '123', 'direct', 'nova', 938),
(23, '2023-07-06 12:27:03', '123', '123', 'maxim.kliakhin@gmail.com', '1223', '123', 'direct', 'nova', 938),
(24, '2023-07-06 12:27:08', '123', '123', 'maxim.kliakhin@gmail.com', '1223', '123', 'direct', 'nova', 938),
(25, '2023-07-06 12:27:16', '123', '123', 'maxim.kliakhin@gmail.com', '1223', '123', 'direct', 'nova', 938),
(26, '2023-07-06 12:28:21', '123', '123', 'maxim.kliakhin@gmail.com', '1223', '123', 'direct', 'nova', 938),
(27, '2023-07-06 12:30:36', '123', '123', 'maxim.kliakhin@gmail.com', '1223', '123', 'direct', 'nova', 938),
(28, '2023-07-06 12:31:07', '123', '123', 'maxim.kliakhin@gmail.com', '1223', '123', 'direct', 'nova', 938),
(29, '2023-07-06 12:34:18', '123', '123', 'maxim.kliakhin@gmail.com', '1223', '123', 'direct', 'nova', 938),
(30, '2023-07-06 12:34:48', '123', '123', 'maxim.kliakhin@gmail.com', '1223', '123', 'direct', 'nova', 938),
(31, '2023-07-06 12:52:23', '123', '123', 'maxim.kliakhin@gmail.com', '1223', '123', 'direct', 'nova', 938),
(32, '2023-07-06 12:52:51', '123', '123', 'maxim.kliakhin@gmail.com', '1223', '123', 'direct', 'nova', 938),
(33, '2023-07-06 13:03:56', '123', '123', 'maxim.kliakhin@gmail.com', '1223', '123', 'direct', 'nova', 938),
(34, '2023-07-06 13:04:23', '123', '123', 'maxim.kliakhin@gmail.com', '1223', '123', 'direct', 'nova', 938),
(35, '2023-07-06 13:05:11', '123', '123', 'maxim.kliakhin@gmail.com', '1223', '123', 'direct', 'nova', 938),
(36, '2023-07-06 13:15:04', '321132', '231', 'maxim.kliakhin@gmail.com', '213321', '213231', 'direct', 'nova', 938),
(37, '2023-07-06 13:15:24', '321132', '231', 'maxim.kliakhin@gmail.com', '213321', '213231', 'direct', 'nova', 938),
(38, '2023-07-06 13:16:03', '321132', '231', 'maxim.kliakhin@gmail.com', '213321', '213231', 'direct', 'nova', 938),
(39, '2023-07-06 13:26:56', '321132', '231', 'maxim.kliakhin@gmail.com', '213321', '213231', 'direct', 'nova', 938),
(40, '2023-07-06 13:29:35', '321132', '231', 'maxim.kliakhin@gmail.com', '213321', '213231', 'direct', 'nova', 938),
(41, '2023-07-06 13:30:26', '321132', '231', 'maxim.kliakhin@gmail.com', '213321', '213231', 'direct', 'nova', 938),
(42, '2023-07-06 13:31:47', '321132', '231', 'maxim.kliakhin@gmail.com', '213321', '213231', 'direct', 'nova', 938),
(43, '2023-07-06 13:35:23', '321132', '231', 'maxim.kliakhin@gmail.com', '213321', '213231', 'direct', 'nova', 938),
(44, '2023-07-06 13:41:12', '213', '21321', 'm.kliakhin@gmail.com', '213123', '1233213', 'direct', 'nova', 1171),
(45, '2023-07-06 14:14:32', '213', '21321', 'm.kliakhin@gmail.com', '213123', '1233213', 'direct', 'nova', 1171),
(46, '2023-07-06 14:23:56', '123', '231', 'maxim.kliakhin@gmail.com', '1', 'hkghj', 'direct', 'nova', 1171);

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
(1, 1, 15, 12),
(2, 2, 15, 1),
(3, 2, 21, 1),
(4, 2, 23, 1),
(5, 2, 26, 1),
(6, 3, 15, 1),
(7, 3, 21, 1),
(8, 3, 23, 1),
(9, 3, 26, 1),
(10, 4, 15, 1),
(11, 4, 21, 1),
(12, 4, 23, 1),
(13, 4, 26, 1),
(14, 5, 15, 1),
(15, 5, 21, 1),
(16, 5, 23, 1),
(17, 5, 26, 1),
(18, 6, 15, 1),
(19, 6, 21, 1),
(20, 6, 23, 1),
(21, 6, 26, 1),
(22, 7, 15, 1),
(23, 7, 21, 1),
(24, 7, 23, 1),
(25, 7, 26, 1),
(26, 8, 15, 1),
(27, 8, 21, 1),
(28, 8, 23, 1),
(29, 8, 26, 1),
(30, 9, 15, 1),
(31, 9, 21, 1),
(32, 9, 23, 1),
(33, 9, 26, 1),
(34, 10, 15, 1),
(35, 10, 21, 1),
(36, 10, 23, 1),
(37, 10, 26, 1),
(38, 11, 15, 1),
(39, 11, 21, 1),
(40, 11, 23, 1),
(41, 11, 26, 1),
(42, 12, 15, 1),
(43, 12, 21, 1),
(44, 12, 23, 1),
(45, 12, 26, 1),
(46, 13, 15, 1),
(47, 13, 21, 1),
(48, 13, 23, 1),
(49, 13, 26, 1),
(50, 14, 15, 1),
(51, 14, 21, 1),
(52, 14, 23, 1),
(53, 14, 26, 1),
(54, 15, 15, 1),
(55, 15, 21, 1),
(56, 15, 23, 1),
(57, 15, 26, 1),
(58, 16, 15, 1),
(59, 16, 21, 1),
(60, 16, 23, 1),
(61, 16, 26, 1),
(62, 17, 15, 1),
(63, 17, 21, 1),
(64, 17, 23, 1),
(65, 17, 26, 1),
(66, 18, 15, 1),
(67, 18, 21, 1),
(68, 18, 23, 1),
(69, 18, 26, 1),
(70, 19, 15, 1),
(71, 19, 21, 1),
(72, 19, 23, 1),
(73, 19, 26, 1),
(74, 20, 15, 1),
(75, 20, 21, 1),
(76, 20, 23, 1),
(77, 20, 26, 1),
(78, 21, 15, 1),
(79, 21, 21, 1),
(80, 21, 23, 1),
(81, 21, 26, 1),
(82, 22, 15, 1),
(83, 22, 21, 1),
(84, 22, 23, 1),
(85, 22, 26, 1),
(86, 23, 15, 1),
(87, 23, 21, 1),
(88, 23, 23, 1),
(89, 23, 26, 1),
(90, 24, 15, 1),
(91, 24, 21, 1),
(92, 24, 23, 1),
(93, 24, 26, 1),
(94, 25, 15, 1),
(95, 25, 21, 1),
(96, 25, 23, 1),
(97, 25, 26, 1),
(98, 26, 15, 1),
(99, 26, 21, 1),
(100, 26, 23, 1),
(101, 26, 26, 1),
(102, 27, 15, 1),
(103, 27, 21, 1),
(104, 27, 23, 1),
(105, 27, 26, 1),
(106, 28, 15, 1),
(107, 28, 21, 1),
(108, 28, 23, 1),
(109, 28, 26, 1),
(110, 29, 15, 1),
(111, 29, 21, 1),
(112, 29, 23, 1),
(113, 29, 26, 1),
(114, 30, 15, 1),
(115, 30, 21, 1),
(116, 30, 23, 1),
(117, 30, 26, 1),
(118, 31, 15, 1),
(119, 31, 21, 1),
(120, 31, 23, 1),
(121, 31, 26, 1),
(122, 32, 15, 1),
(123, 32, 21, 1),
(124, 32, 23, 1),
(125, 32, 26, 1),
(126, 33, 15, 1),
(127, 33, 21, 1),
(128, 33, 23, 1),
(129, 33, 26, 1),
(130, 34, 15, 1),
(131, 34, 21, 1),
(132, 34, 23, 1),
(133, 34, 26, 1),
(134, 35, 15, 1),
(135, 35, 21, 1),
(136, 35, 23, 1),
(137, 35, 26, 1),
(138, 36, 15, 1),
(139, 36, 21, 1),
(140, 36, 23, 1),
(141, 36, 26, 1),
(142, 37, 15, 1),
(143, 37, 21, 1),
(144, 37, 23, 1),
(145, 37, 26, 1),
(146, 38, 15, 1),
(147, 38, 21, 1),
(148, 38, 23, 1),
(149, 38, 26, 1),
(150, 39, 15, 1),
(151, 39, 21, 1),
(152, 39, 23, 1),
(153, 39, 26, 1),
(154, 40, 15, 1),
(155, 40, 21, 1),
(156, 40, 23, 1),
(157, 40, 26, 1),
(158, 41, 15, 1),
(159, 41, 21, 1),
(160, 41, 23, 1),
(161, 41, 26, 1),
(162, 42, 15, 1),
(163, 42, 21, 1),
(164, 42, 23, 1),
(165, 42, 26, 1),
(166, 43, 15, 1),
(167, 43, 21, 1),
(168, 43, 23, 1),
(169, 43, 26, 1),
(170, 44, 15, 1),
(171, 44, 21, 1),
(172, 44, 23, 1),
(173, 44, 26, 1),
(174, 44, 16, 1),
(175, 45, 15, 1),
(176, 45, 21, 1),
(177, 45, 23, 1),
(178, 45, 26, 1),
(179, 45, 16, 1),
(180, 46, 15, 1),
(181, 46, 21, 1),
(182, 46, 23, 1),
(183, 46, 26, 1),
(184, 46, 16, 1);

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
(60, '2121', 2121, '21211', 0, 1, 1, '/views/img/products/hyperion-product-img-1.jpg');

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
(1, 'admin', '$2y$10$nhgnaYUYz3nabCeuYDYgSe8gxJ8lhRGm2IUpAPycwf6K7LN61wi3u'),
(2, 'admin2', '$2y$10$CYpwArhGtF/oWvlq2SzCheW1QQK9oMZkigY23xSeRG2bpOhcCTYdy');

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
  ADD KEY `order_items_ibfk_2` (`product_id`);

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
