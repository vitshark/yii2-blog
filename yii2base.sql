-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 26 2017 г., 12:52
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_auth_assignment`
--

CREATE TABLE `tbl_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `tbl_auth_assignment`
--

INSERT INTO `tbl_auth_assignment` (`item_name`, `user_id`, `created_at`, `updated_at`) VALUES
('administrator', 1, 1493194216, 1493194216),
('moderator', 2, 1493194216, 1493194216);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_auth_item`
--

CREATE TABLE `tbl_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `tbl_auth_item`
--

INSERT INTO `tbl_auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('administrator', 1, 'Administrator', NULL, NULL, 1493194216, 1493194216),
('moderator', 1, 'Moderator', NULL, NULL, 1493194216, 1493194216),
('rbacManage', 2, 'Management RBAC structure', NULL, NULL, 1493194216, 1493194216),
('userCreate', 2, 'Creating users', NULL, NULL, 1493194216, 1493194216),
('userDelete', 2, 'Deleting users', NULL, NULL, 1493194216, 1493194216),
('userManage', 2, 'Browse list of users', NULL, NULL, 1493194216, 1493194216),
('userPermissions', 2, 'User rights management', NULL, NULL, 1493194216, 1493194216),
('userUpdate', 2, 'Editing users', NULL, NULL, 1493194216, 1493194216),
('userUpdateNoElderRank', 2, 'Editing users with equal or lower rank', 'noElderRank', NULL, 1493194216, 1493194216),
('userView', 2, 'Viewing user information', NULL, NULL, 1493194216, 1493194216);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_auth_item_child`
--

CREATE TABLE `tbl_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `tbl_auth_item_child`
--

INSERT INTO `tbl_auth_item_child` (`parent`, `child`) VALUES
('administrator', 'moderator'),
('administrator', 'rbacManage'),
('administrator', 'userCreate'),
('administrator', 'userDelete'),
('moderator', 'userManage'),
('administrator', 'userPermissions'),
('administrator', 'userUpdate'),
('userUpdateNoElderRank', 'userUpdate'),
('moderator', 'userUpdateNoElderRank'),
('moderator', 'userView');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_auth_rule`
--

CREATE TABLE `tbl_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `tbl_auth_rule`
--

INSERT INTO `tbl_auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('noElderRank', 'O:34:\"budyaga\\users\\rbac\\NoElderRankRule\":3:{s:4:\"name\";s:11:\"noElderRank\";s:9:\"createdAt\";N;s:9:\"updatedAt\";i:1431880756;}', 1493194216, 1493194216);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_migration`
--

CREATE TABLE `tbl_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1493194183),
('m130524_201442_init', 1493194216);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` smallint(6) NOT NULL DEFAULT '1',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `auth_key`, `password_hash`, `email`, `photo`, `sex`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'fWk6tTNcwmgw0eWeFpuz3Vau1T39YkQh', '$2y$13$uI1St9.ITJSjyh3BJP7RWe1Qu00CvoPH7SaEqgEiCdhJJDXo/DJpC', 'administrator@example.com', NULL, 1, 2, 1493194215, 1493194215),
(2, 'Moderator', 'da237ATjZhjRzl0Drf1kK9Ur7mGOyYrd', '$2y$13$uI1St9.ITJSjyh3BJP7RWe1Qu00CvoPH7SaEqgEiCdhJJDXo/DJpC', 'moderator@example.com', NULL, 1, 2, 1493194216, 1493194216),
(3, 'vitus', 'nbiHhlW3TWtRvHenVAmty-u0LopYzhKJ', '$2y$13$uI1St9.ITJSjyh3BJP7RWe1Qu00CvoPH7SaEqgEiCdhJJDXo/DJpC', 'vitshark@mail.ru', '', 1, 2, 1493196520, 1493196520),
(4, 'demo', 'BA6bZc-1RTPMzQQNF10B-FP9tr-aAF8-', '$2y$13$P0Hmks7pA8oGUu01R9iquO7rUKGnzNm0.wFWcKf6.z.UcraTCdGN.', 'krysha16@mail.ru', 'http://yii2-blog:82/uploads/user/photo/59006d74b6a84.jpg', 1, 2, 1493200270, 1493200270);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user_email_confirm_token`
--

CREATE TABLE `tbl_user_email_confirm_token` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `old_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `old_email_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `old_email_confirm` smallint(6) DEFAULT '0',
  `new_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `new_email_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `new_email_confirm` smallint(6) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `tbl_user_email_confirm_token`
--

INSERT INTO `tbl_user_email_confirm_token` (`id`, `user_id`, `old_email`, `old_email_token`, `old_email_confirm`, `new_email`, `new_email_token`, `new_email_confirm`) VALUES
(1, 3, '', '', 1, 'vitshark@mail.ru', 'hRMXUEKCWmCwaU_PFp4A1iAn9C9i4hgo', 0),
(2, 4, '', '', 1, 'krysha16@mail.ru', '36wWkJjd3d18n1oZcjcR1icU9Nvv-23H', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user_oauth_key`
--

CREATE TABLE `tbl_user_oauth_key` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `provider_user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user_password_reset_token`
--

CREATE TABLE `tbl_user_password_reset_token` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tbl_auth_assignment`
--
ALTER TABLE `tbl_auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_fk` (`user_id`);

--
-- Индексы таблицы `tbl_auth_item`
--
ALTER TABLE `tbl_auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `auth_item_rule_name_fk` (`rule_name`),
  ADD KEY `auth_item_type_index` (`type`);

--
-- Индексы таблицы `tbl_auth_item_child`
--
ALTER TABLE `tbl_auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `auth_item_child_child_fk` (`child`);

--
-- Индексы таблицы `tbl_auth_rule`
--
ALTER TABLE `tbl_auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `tbl_migration`
--
ALTER TABLE `tbl_migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tbl_user_email_confirm_token`
--
ALTER TABLE `tbl_user_email_confirm_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_email_confirm_token_user_id_fk` (`user_id`);

--
-- Индексы таблицы `tbl_user_oauth_key`
--
ALTER TABLE `tbl_user_oauth_key`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_oauth_key_user_id_fk` (`user_id`);

--
-- Индексы таблицы `tbl_user_password_reset_token`
--
ALTER TABLE `tbl_user_password_reset_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_password_reset_token_user_id_fk` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `tbl_user_email_confirm_token`
--
ALTER TABLE `tbl_user_email_confirm_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `tbl_user_oauth_key`
--
ALTER TABLE `tbl_user_oauth_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tbl_user_password_reset_token`
--
ALTER TABLE `tbl_user_password_reset_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tbl_auth_assignment`
--
ALTER TABLE `tbl_auth_assignment`
  ADD CONSTRAINT `auth_assignment_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_assignment_item_name_fk` FOREIGN KEY (`item_name`) REFERENCES `tbl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tbl_auth_item`
--
ALTER TABLE `tbl_auth_item`
  ADD CONSTRAINT `auth_item_rule_name_fk` FOREIGN KEY (`rule_name`) REFERENCES `tbl_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tbl_auth_item_child`
--
ALTER TABLE `tbl_auth_item_child`
  ADD CONSTRAINT `auth_item_child_child_fk` FOREIGN KEY (`child`) REFERENCES `tbl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_parent_fk` FOREIGN KEY (`parent`) REFERENCES `tbl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tbl_user_email_confirm_token`
--
ALTER TABLE `tbl_user_email_confirm_token`
  ADD CONSTRAINT `user_email_confirm_token_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tbl_user_oauth_key`
--
ALTER TABLE `tbl_user_oauth_key`
  ADD CONSTRAINT `user_oauth_key_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tbl_user_password_reset_token`
--
ALTER TABLE `tbl_user_password_reset_token`
  ADD CONSTRAINT `user_password_reset_token_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
