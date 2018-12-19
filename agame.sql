-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Дек 19 2018 г., 13:39
-- Версия сервера: 5.7.24-0ubuntu0.18.04.1
-- Версия PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `agame`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actions_history`
--

CREATE TABLE `actions_history` (
  `ID` int(5) NOT NULL,
  `UID` int(5) NOT NULL,
  `PRIZE_ID` int(5) NOT NULL,
  `pr_name` varchar(255) NOT NULL,
  `change_name` varchar(255) NOT NULL DEFAULT '0',
  `bonus_equivalent` varchar(255) NOT NULL DEFAULT '0',
  `moderate` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `actions_history`
--

INSERT INTO `actions_history` (`ID`, `UID`, `PRIZE_ID`, `pr_name`, `change_name`, `bonus_equivalent`, `moderate`) VALUES
(15, 1015, 3, 'pr_bonus', 'pr_money', '20000', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `UID` int(111) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `lastName` varchar(250) NOT NULL,
  `Pass` varchar(250) DEFAULT NULL,
  `Mail` varchar(250) DEFAULT NULL,
  `Tel` varchar(250) DEFAULT NULL,
  `Date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`UID`, `Name`, `lastName`, `Pass`, `Mail`, `Tel`, `Date`) VALUES
(1015, 'Levan', 'Jikidze', '123', 'admin', '1515151', '2018-10-19 22:31:17');

-- --------------------------------------------------------

--
-- Структура таблицы `pr_bonus`
--

CREATE TABLE `pr_bonus` (
  `ID` int(11) NOT NULL,
  `name` int(5) NOT NULL,
  `initial_quantity` int(5) NOT NULL DEFAULT '0',
  `played_quantity` int(5) NOT NULL,
  `frequency` int(5) NOT NULL,
  `last_change` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pr_bonus`
--

INSERT INTO `pr_bonus` (`ID`, `name`, `initial_quantity`, `played_quantity`, `frequency`, `last_change`) VALUES
(1, 5000, 0, 35000, 20, '2018-12-19 06:09:04'),
(2, 10000, 0, 30000, 10, '2018-12-19 00:00:00'),
(3, 20000, 0, 20000, 5, '2018-12-19 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `pr_money`
--

CREATE TABLE `pr_money` (
  `ID` int(11) NOT NULL,
  `name` int(5) NOT NULL,
  `bonus_equivalent` int(5) NOT NULL,
  `initial_quantity` int(5) NOT NULL,
  `played_quantity` int(5) NOT NULL,
  `frequency` int(5) NOT NULL,
  `last_change` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pr_money`
--

INSERT INTO `pr_money` (`ID`, `name`, `bonus_equivalent`, `initial_quantity`, `played_quantity`, `frequency`, `last_change`) VALUES
(1, 1000, 5000, 100000, 2000, 3, '2018-12-19 07:09:15'),
(2, 2000, 10000, 100000, 0, 2, '2018-12-19 00:00:00'),
(3, 5000, 20000, 100000, 0, 1, '2018-12-19 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `pr_things`
--

CREATE TABLE `pr_things` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bonus_equivalent` int(5) NOT NULL,
  `initial_quantity` int(5) NOT NULL,
  `played_quantity` int(5) NOT NULL,
  `frequency` int(5) NOT NULL,
  `last_change` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pr_things`
--

INSERT INTO `pr_things` (`ID`, `name`, `bonus_equivalent`, `initial_quantity`, `played_quantity`, `frequency`, `last_change`) VALUES
(1, 'tablet', 2000, 100, 100, 3, '2018-12-19 03:08:00'),
(2, 'mobile', 2000, 100, 100, 3, '2018-12-19 06:13:11'),
(3, 'player', 1000, 500, 500, 7, '2018-12-19 07:14:07'),
(4, 'laptop', 5000, 50, 50, 2, '2018-12-19 07:12:02'),
(5, 'headphones', 500, 1000, 999, 10, '2018-12-19 06:11:16');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `UID` int(111) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `lastName` varchar(250) NOT NULL,
  `Pass` varchar(250) DEFAULT NULL,
  `Mail` varchar(250) DEFAULT NULL,
  `Tel` varchar(250) DEFAULT NULL,
  `Date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`UID`, `Name`, `lastName`, `Pass`, `Mail`, `Tel`, `Date`) VALUES
(1015, 'John', 'Travolta', '123', 'temp', '3333333333', '2018-10-18 22:31:17'),
(1001, 'Levan', 'Jikidze', '12345', 'temp', '555555555', '2018-11-17 00:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actions_history`
--
ALTER TABLE `actions_history`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`UID`);

--
-- Индексы таблицы `pr_bonus`
--
ALTER TABLE `pr_bonus`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `pr_money`
--
ALTER TABLE `pr_money`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `pr_things`
--
ALTER TABLE `pr_things`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actions_history`
--
ALTER TABLE `actions_history`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `UID` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1033;
--
-- AUTO_INCREMENT для таблицы `pr_bonus`
--
ALTER TABLE `pr_bonus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `pr_money`
--
ALTER TABLE `pr_money`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `pr_things`
--
ALTER TABLE `pr_things`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `UID` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1033;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
