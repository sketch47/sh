-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 15 2018 г., 12:56
-- Версия сервера: 5.7.20
-- Версия PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `math`
--

-- --------------------------------------------------------

--
-- Структура таблицы `picture`
--

CREATE TABLE `picture` (
  `ID` int(11) NOT NULL,
  `SRC` varchar(64) NOT NULL,
  `ALT` varchar(64) NOT NULL,
  `NAME` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `picture`
--

INSERT INTO `picture` (`ID`, `SRC`, `ALT`, `NAME`) VALUES
(1, '/multimedia/img/wkr_vf18cw-640x350.jpg', '', ''),
(21, '/multimedia/img/49c65f6dcdf561a8337dfb728634c025.png', 'alt', 'test'),
(25, '/multimedia/img/dae5226c527ae7777acc0b3876b4fd6a.jpeg', '', ''),
(27, '/multimedia/img/64ac4b0d208f5613c4c2a87eb771b01d.jpeg', '', ''),
(28, '/multimedia/img/9dee6b824b21ad761ec0bad621447512.jpeg', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `stati`
--

CREATE TABLE `stati` (
  `ID` int(255) NOT NULL,
  `NAME` varchar(64) NOT NULL,
  `CODE` varchar(64) NOT NULL,
  `PREVIEW_ID` int(11) NOT NULL,
  `CORE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stati`
--

INSERT INTO `stati` (`ID`, `NAME`, `CODE`, `PREVIEW_ID`, `CORE_ID`) VALUES
(1, 'Тестовая статья', 'testovij-statij', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `stati_core`
--

CREATE TABLE `stati_core` (
  `ID` int(255) NOT NULL,
  `CORE_PICTIURE` int(11) NOT NULL,
  `TITLE` varchar(64) NOT NULL,
  `TEXT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stati_core`
--

INSERT INTO `stati_core` (`ID`, `CORE_PICTIURE`, `TITLE`, `TEXT`) VALUES
(1, 1, 'test title core', '<a href=\"\">teg a</a>');

-- --------------------------------------------------------

--
-- Структура таблицы `stati_preview`
--

CREATE TABLE `stati_preview` (
  `ID` int(11) NOT NULL,
  `PREVIEW_PICTURE` int(11) NOT NULL,
  `NAME` varchar(64) NOT NULL,
  `TEXT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stati_preview`
--

INSERT INTO `stati_preview` (`ID`, `PREVIEW_PICTURE`, `NAME`, `TEXT`) VALUES
(1, 1, 'test preview name', '<p>test tag p </p>');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `stati`
--
ALTER TABLE `stati`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CODE` (`CODE`),
  ADD KEY `CORE_ID` (`CORE_ID`),
  ADD KEY `PREVIEW_ID` (`PREVIEW_ID`);

--
-- Индексы таблицы `stati_core`
--
ALTER TABLE `stati_core`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CORE_PICTIURE` (`CORE_PICTIURE`);

--
-- Индексы таблицы `stati_preview`
--
ALTER TABLE `stati_preview`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PREVIEW_PICTURE` (`PREVIEW_PICTURE`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `picture`
--
ALTER TABLE `picture`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `stati`
--
ALTER TABLE `stati`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `stati_core`
--
ALTER TABLE `stati_core`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `stati_preview`
--
ALTER TABLE `stati_preview`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `stati`
--
ALTER TABLE `stati`
  ADD CONSTRAINT `stati_ibfk_1` FOREIGN KEY (`CORE_ID`) REFERENCES `stati_core` (`ID`),
  ADD CONSTRAINT `stati_ibfk_2` FOREIGN KEY (`PREVIEW_ID`) REFERENCES `stati_preview` (`ID`);

--
-- Ограничения внешнего ключа таблицы `stati_core`
--
ALTER TABLE `stati_core`
  ADD CONSTRAINT `stati_core_ibfk_1` FOREIGN KEY (`CORE_PICTIURE`) REFERENCES `picture` (`ID`);

--
-- Ограничения внешнего ключа таблицы `stati_preview`
--
ALTER TABLE `stati_preview`
  ADD CONSTRAINT `stati_preview_ibfk_1` FOREIGN KEY (`PREVIEW_PICTURE`) REFERENCES `picture` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
