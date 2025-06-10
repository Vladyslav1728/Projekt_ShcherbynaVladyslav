-- Установка режима и часового пояса
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Таблица: users
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

-- Вставка данных в users
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(5, 'Admin_David', 'admin@example.com', '$2y$10$D70SoY/KX7O0w2w/CJi97.JbqCJ1dwTP6F.w24sMBVFlrxSF8gSCC', 0, '2025-06-28 21:36:33');

-- Создаем новую таблицу с текстовым полем для названия курса
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `course` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Вставляем примеры данных
INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `course`) VALUES
(1, 'Livia', 'lkelebercova@ukf.sk', '0900123456', 'Media Technology'),
(2, 'a', 'kelebercova24@gmail.com', '0911222333', 'Communications');

-- Таблица: review (идентична contact)
CREATE TABLE `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` TEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Пример данных в contact
INSERT INTO `review` (`id`, `name`, `email`, `message`) VALUES
(1, 'Julia', 'cova@ukf.sk', 'Good!'),
(2, 'Vlad', 'vladicka24@gmail.com', 'Good! Oh no? so baddd');

COMMIT;