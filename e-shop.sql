-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Сен 13 2011 г., 15:49
-- Версия сервера: 5.1.54
-- Версия PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `e-shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE IF NOT EXISTS `basket` (
  `id_bs` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(32) NOT NULL,
  `goodsid` int(11) NOT NULL,
  `quantity` int(4) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bs`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=239 ;

--
-- Дамп данных таблицы `basket`
--


-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cat` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cat` (`id_cat`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `id_cat`, `name`, `price`) VALUES
(6, 1, 'Лучик солнца', 3),
(9, 2, 'Подарок другу', 5),
(7, 1, 'Счастье', 6),
(8, 1, 'Неизвестно что!', 7),
(10, 2, 'Радостное утро', 2),
(11, 2, 'Настроенье Ого-го', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_cat`, `name`) VALUES
(1, 'first'),
(2, 'second');

-- --------------------------------------------------------

--
-- Структура таблицы `custom`
--

CREATE TABLE IF NOT EXISTS `custom` (
  `id_custom` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(54) COLLATE utf8_unicode_ci NOT NULL,
  `secondname` varchar(54) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(54) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(21) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_custom`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `custom`
--

INSERT INTO `custom` (`id_custom`, `name`, `secondname`, `email`, `tel`, `status`, `date`) VALUES
(10, 'Рафаэль', 'Кирдан', 'rafaelkyrdan@gmail.com', '097-88-604-22', 'email', '2011-09-18');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `customer` varchar(32) NOT NULL DEFAULT '',
  `quantity` int(4) NOT NULL DEFAULT '0',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `name`, `price`, `customer`, `quantity`, `datetime`) VALUES
(27, 'Неизвестно что!', 7, 'ijtepkvqu219lur42dubo2ib31', 2, '2011-09-13 15:39:51'),
(28, 'Лучик солнца', 3, 'ijtepkvqu219lur42dubo2ib31', 2, '2011-09-13 15:39:51');

-- --------------------------------------------------------

--
-- Структура таблицы `ordettocustom`
--

CREATE TABLE IF NOT EXISTS `ordettocustom` (
  `id_order` int(11) NOT NULL,
  `id_custom` int(11) NOT NULL,
  `type` int(2) NOT NULL,
  PRIMARY KEY (`id_custom`,`id_order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ordettocustom`
--

INSERT INTO `ordettocustom` (`id_order`, `id_custom`, `type`) VALUES
(28, 10, 0),
(27, 10, 0);
