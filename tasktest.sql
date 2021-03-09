-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 09 2021 г., 03:13
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tasktest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` enum('отправлена на проверку','выполнено') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'отправлена на проверку',
  `admin_modified` enum('отредактировано администратором') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `user_name`, `user_email`, `content`, `status`, `admin_modified`) VALUES
(3, 'Buter', 'boot@mail.com', 'задача 2                                     ', 'выполнено', 'отредактировано администратором'),
(4, 'Алексей', 'alexv@mail.com', 'задача Алексея                                    ', 'выполнено', 'отредактировано администратором'),
(5, 'Оксана', 'dvre89@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(6, 'Master', 'lomaster@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(7, 'Anton', 'tosha@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(8, 'Виктор', 'ura88@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(9, 'Den', 'denya@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(10, 'Cindy', 'dsdvv8@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(11, 'Светлана', 'lan@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(12, 'Alex', 'lex@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(13, 'Диана', 'ledidi@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(14, 'Kate', '12kat@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(15, 'Anastaysha', 'nast45@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(16, 'Кирилл', 'kirya@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(17, 'Angella', 'angel99@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(18, 'Diana', 'dia08@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(19, 'Владимир', 'vova56@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(20, 'Lana', 'lana@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(21, 'Georg', 'georg98@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(22, 'Neo', 'fcwef5@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(23, 'Руслан', 'rus55@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(24, 'Kventin', 'tarantino@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(25, 'Ostin', 'os44@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(26, 'Николай', 'niknik@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(27, 'Mio', 'miomio@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(28, 'Денис', 'balan@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(29, 'Ann', 'anni68@mail.com', 'задача 2                                     ', 'отправлена на проверку', NULL),
(30, 'Иван', 'ivan78@ya.ru', 'задача 2                                     ', 'отправлена на проверку', NULL),
(31, 'Iren', 'ira478@ya.ru', 'задача 2                                     ', 'отправлена на проверку', NULL),
(34, 'scas', 's1tes-maker@ya.ru', 'задача 2                                     ', 'отправлена на проверку', NULL),
(35, 'Васька', 'jopyhc@ya.ru', 'задача 2                                     ', 'отправлена на проверку', NULL),
(36, 'Анастасия', 'nastya@ya.ru', 'задача 2                                     ', 'отправлена на проверку', NULL),
(37, '', '', 'задача 2                                     ', 'отправлена на проверку', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `role` enum('user','admin') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password_hash`, `role`) VALUES
(1, 'admin', '$2y$10$GGOYDOQpe57fvmw08caUsuvm5qg.LQGnnPl.HsrKyVpW0crs3aBiS', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
