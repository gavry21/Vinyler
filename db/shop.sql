-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 26 2019 г., 22:22
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comm`
--

CREATE TABLE `comm` (
  `comm` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comm`
--

INSERT INTO `comm` (`comm`) VALUES
('sfdghjkl');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `categori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `price`, `image`, `status`, `categori_id`) VALUES
(1, 'BLACKPINK - DUDDUDU', 'BP01', 30.00, 'product-images/bl1.jpg', 3, 11),
(2, 'BLACKPINK - AS IF IT\'S YOUR LAST', 'BP02', 30.00, 'product-images/bl2.jpg', 1, 11),
(3, 'EXO - TEMPO', 'E01', 30.00, 'product-images/e1.jpg', 3, 11),
(4, 'EXO - LOVE SHOT', 'E02', 30.00, 'product-images/e2.jpg', 5, 11),
(5, 'TAEMIN - MOVE', 'T01', 35.00, 'product-images/t1.jpg', 2, 11),
(6, 'TAEMIN - PRESS IT', 'T02', 20.00, 'product-images/t2.jpg', 4, 11),
(7, 'PANIC!AT THE DISCO - TOO WEIRD TO LIVE, TOO RARE TO DIE', 'P01', 25.00, 'product-images/p1.jpg', 3, 12),
(8, 'PANIC!AT THE DISCO - PRAY FOR THE WICKED', 'P02', 30.00, 'product-images/p2.jpg', 2, 12),
(9, 'RAMMSTEIN - MUTTER', 'R01', 20.00, 'product-images/r1.jpg', 5, 12),
(10, 'RAMMSTEIN - SEHNSUCHT', 'R02', 25.00, 'product-images/r2.jpg', 2, 12),
(11, 'TAYLOR SWIFT - REPUTATION', 'TS01', 25.00, 'product-images/TS1.jpg', 2, 13),
(12, 'TAYLOR SWIFT - RED', 'TS02', 25.00, 'product-images/TS2.jpg', 1, 13),
(13, 'ARIANA GRANDE - SWEETNER', 'AO1', 25.00, 'product-images/A1.jpg', 3, 13),
(14, 'IMAGINE DRAGONS - ORIGINS', 'DO1', 30.00, 'product-images/D1.jpg', 1, 14),
(15, 'LANA DEL REY - LUST OF LIFE', 'LO1', 25.00, 'product-images/L1.jpg', 3, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `product_order`
--

CREATE TABLE `product_order` (
  `user_name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `price` double(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `product_order`
--

INSERT INTO `product_order` (`user_name`, `country`, `city`, `address`, `price`) VALUES
('????? ?????????', '??????', '?????????', '?? ????????? ? 160 ?? 179', 0.00),
('Sofia Gavrilova', '??????', 'Krasnodar', 'URALSKAYA ST. 160, APP 179', 0.00);

-- --------------------------------------------------------

--
-- Структура таблицы `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL,
  `full_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `usertbl`
--

INSERT INTO `usertbl` (`id`, `full_name`, `email`, `username`, `password`) VALUES
(10, 'admin', 'admin@mail.com', 'admin', ''),
(8, 'София', 'lady.sonia@bk.ru', 'milady', ''),
(9, 'София', 'milady.sonia@gmail.com', 'mylady', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Индексы таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`user_name`);

--
-- Индексы таблицы `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
