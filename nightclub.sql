-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 25 2023 г., 13:52
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `nightclub`
--

-- --------------------------------------------------------

--
-- Структура таблицы `body_parts`
--

CREATE TABLE `body_parts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `body_parts`
--

INSERT INTO `body_parts` (`id`, `name`) VALUES
(1, 'Тело'),
(2, 'Руки'),
(3, 'Ноги'),
(4, 'Голова');

-- --------------------------------------------------------

--
-- Структура таблицы `chars`
--

CREATE TABLE `chars` (
  `id` bigint UNSIGNED NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `move_set_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `chars`
--

INSERT INTO `chars` (`id`, `gender`, `move_set_id`) VALUES
(1, 1, 1),
(2, 0, 2),
(3, 0, 3),
(4, 1, 4),
(5, 1, 5),
(6, 0, 6),
(7, 1, 7),
(8, 1, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `char_move_sets`
--

CREATE TABLE `char_move_sets` (
  `id` bigint UNSIGNED NOT NULL,
  `head_id` bigint UNSIGNED DEFAULT NULL,
  `body_id` bigint UNSIGNED DEFAULT NULL,
  `arm_id` bigint UNSIGNED DEFAULT NULL,
  `leg_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `char_move_sets`
--

INSERT INTO `char_move_sets` (`id`, `head_id`, `body_id`, `arm_id`, `leg_id`) VALUES
(1, 10, 7, 9, 8),
(2, 10, NULL, 5, 6),
(3, 10, NULL, 5, 6),
(4, 4, 1, 2, 6),
(5, 10, 1, 5, 6),
(6, 4, 1, 2, 3),
(7, NULL, 1, 5, 6),
(8, 10, 7, 9, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `dances`
--

CREATE TABLE `dances` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `music_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dances`
--

INSERT INTO `dances` (`id`, `name`, `music_id`) VALUES
(1, 'Хип-хоп', 1),
(2, 'R&b', 1),
(3, 'Electrodance', 2),
(4, 'House', 2),
(5, 'Pop', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `dance_moves`
--

CREATE TABLE `dance_moves` (
  `id` bigint UNSIGNED NOT NULL,
  `dance_id` bigint UNSIGNED NOT NULL,
  `move_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dance_moves`
--

INSERT INTO `dance_moves` (`id`, `dance_id`, `move_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 3, 1),
(6, 3, 5),
(7, 3, 6),
(8, 5, 7),
(9, 5, 8),
(10, 5, 9),
(11, 5, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_07_21_121818_create_body_parts_table', 1),
(4, '2023_07_21_122037_create_moves_table', 1),
(5, '2023_07_21_122424_create_char_move_sets_table', 1),
(6, '2023_07_21_122525_create_chars_table', 1),
(7, '2023_07_21_122603_create_music_table', 1),
(8, '2023_07_21_122650_create_dances_table', 1),
(9, '2023_07_21_125745_create_dance_moves_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `moves`
--

CREATE TABLE `moves` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_part_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `moves`
--

INSERT INTO `moves` (`id`, `name`, `body_part_id`) VALUES
(1, 'Покачивание вперед-назад', 1),
(2, 'Согнуты в локтях', 2),
(3, 'В полуприседе', 3),
(4, 'Вперед-назад', 4),
(5, 'Круговые движения-вращения', 2),
(6, 'Двигаются в ритме', 3),
(7, 'Плавные движения', 1),
(8, 'Плавные движения', 3),
(9, 'Плавные движения', 2),
(10, 'Плавные движения', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `music`
--

CREATE TABLE `music` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `music`
--

INSERT INTO `music` (`id`, `name`) VALUES
(1, 'R&b'),
(2, 'Electrohouse'),
(3, 'Pop-music');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `body_parts`
--
ALTER TABLE `body_parts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `chars`
--
ALTER TABLE `chars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chars_move_set_id_foreign` (`move_set_id`);

--
-- Индексы таблицы `char_move_sets`
--
ALTER TABLE `char_move_sets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `char_move_sets_head_id_foreign` (`head_id`),
  ADD KEY `char_move_sets_body_id_foreign` (`body_id`),
  ADD KEY `char_move_sets_arm_id_foreign` (`arm_id`),
  ADD KEY `char_move_sets_leg_id_foreign` (`leg_id`);

--
-- Индексы таблицы `dances`
--
ALTER TABLE `dances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dances_music_id_foreign` (`music_id`);

--
-- Индексы таблицы `dance_moves`
--
ALTER TABLE `dance_moves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dance_moves_dance_id_foreign` (`dance_id`),
  ADD KEY `dance_moves_move_id_foreign` (`move_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `moves`
--
ALTER TABLE `moves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `moves_body_part_id_foreign` (`body_part_id`);

--
-- Индексы таблицы `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `body_parts`
--
ALTER TABLE `body_parts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `chars`
--
ALTER TABLE `chars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `char_move_sets`
--
ALTER TABLE `char_move_sets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `dances`
--
ALTER TABLE `dances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `dance_moves`
--
ALTER TABLE `dance_moves`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `moves`
--
ALTER TABLE `moves`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `music`
--
ALTER TABLE `music`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `chars`
--
ALTER TABLE `chars`
  ADD CONSTRAINT `chars_move_set_id_foreign` FOREIGN KEY (`move_set_id`) REFERENCES `char_move_sets` (`id`);

--
-- Ограничения внешнего ключа таблицы `char_move_sets`
--
ALTER TABLE `char_move_sets`
  ADD CONSTRAINT `char_move_sets_arm_id_foreign` FOREIGN KEY (`arm_id`) REFERENCES `moves` (`id`),
  ADD CONSTRAINT `char_move_sets_body_id_foreign` FOREIGN KEY (`body_id`) REFERENCES `moves` (`id`),
  ADD CONSTRAINT `char_move_sets_head_id_foreign` FOREIGN KEY (`head_id`) REFERENCES `moves` (`id`),
  ADD CONSTRAINT `char_move_sets_leg_id_foreign` FOREIGN KEY (`leg_id`) REFERENCES `moves` (`id`);

--
-- Ограничения внешнего ключа таблицы `dances`
--
ALTER TABLE `dances`
  ADD CONSTRAINT `dances_music_id_foreign` FOREIGN KEY (`music_id`) REFERENCES `music` (`id`);

--
-- Ограничения внешнего ключа таблицы `dance_moves`
--
ALTER TABLE `dance_moves`
  ADD CONSTRAINT `dance_moves_dance_id_foreign` FOREIGN KEY (`dance_id`) REFERENCES `dances` (`id`),
  ADD CONSTRAINT `dance_moves_move_id_foreign` FOREIGN KEY (`move_id`) REFERENCES `moves` (`id`);

--
-- Ограничения внешнего ключа таблицы `moves`
--
ALTER TABLE `moves`
  ADD CONSTRAINT `moves_body_part_id_foreign` FOREIGN KEY (`body_part_id`) REFERENCES `body_parts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
