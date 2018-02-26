-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 26 2018 г., 05:35
-- Версия сервера: 5.6.37
-- Версия PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `GullDataBase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Content`
--

CREATE TABLE `Content` (
  `lining` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `Content`
--

INSERT INTO `Content` (`lining`) VALUES
(''),
('content'),
('Page1'),
('content'),
('<iframe width=\"640\" height=\"360\" src=\"https://www.youtube.com/embed/z5El-yYNUwU\" frameborder=\"0\" allowfullscreen></iframe>'),
('хуй'),
('хуй'),
('хуй'),
('хуй'),
('хуй'),
('хуй'),
('хуй'),
('хуй');

-- --------------------------------------------------------

--
-- Структура таблицы `FooterButons`
--

CREATE TABLE `FooterButons` (
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `FooterButons`
--

INSERT INTO `FooterButons` (`img`, `link`) VALUES
('image/socialImages/vk.png', 'https://vk.com'),
('image/socialImages/facebook.png', 'https://www.facebook.com'),
('image/socialImages/twiter.png', 'https://twitter.com');

-- --------------------------------------------------------

--
-- Структура таблицы `MenuButtons`
--

CREATE TABLE `MenuButtons` (
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `MenuButtons`
--

INSERT INTO `MenuButtons` (`name`, `link`) VALUES
('Home', '#'),
('Video', '#'),
('Lorem', '#');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
