-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 07, 2023 at 07:58 PM
-- Server version: 8.0.30
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `text` text,
  `categorie_id` int DEFAULT NULL,
  `pubdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `image`, `text`, `categorie_id`, `pubdate`, `views`) VALUES
(1, 'Tasty soup', 'volk.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sollicitudin ullamcorper facilisis. Nulla eros libero, euismod ut aliquet quis, tempus non eros. Maecenas egestas erat ex, a consectetur metus varius sit amet. Ut consequat leo et mi ornare eleifend. Phasellus iaculis lacus eu eleifend gravida. Sed porta, leo ac pretium cursus, tortor nulla fermentum urna, in aliquet ipsum urna nec tellus. Suspendisse aliquam orci magna, ut commodo elit porta mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce urna dui, ultrices ac vulputate nec, lobortis at tortor. Mauris fermentum bibendum ultricies. Vestibulum mollis, urna sed volutpat efficitur, nisl erat ullamcorper tellus, non vehicula nisl erat ut ante. Integer sit amet quam quis felis mollis dignissim id sed metus. Nunc ac tortor sed ligula pharetra pretium. Suspendisse potenti. Nunc tristique nec sem a interdum. Sed vitae est eu lorem pretium consectetur.', 2, '2021-08-02 12:44:11', 162),
(2, 'Exercises for weight losing ', 'cat.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sollicitudin ullamcorper facilisis. Nulla eros libero, euismod ut aliquet quis, tempus non eros. Maecenas egestas erat ex, a consectetur metus varius sit amet. Ut consequat leo et mi ornare eleifend. Phasellus iaculis lacus eu eleifend gravida. Sed porta, leo ac pretium cursus, tortor nulla fermentum urna, in aliquet ipsum urna nec tellus. Suspendisse aliquam orci magna, ut commodo elit porta mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce urna dui, ultrices ac vulputate nec, lobortis at tortor. Mauris fermentum bibendum ultricies. Vestibulum mollis, urna sed volutpat efficitur, nisl erat ullamcorper tellus, non vehicula nisl erat ut ante. Integer sit amet quam quis felis mollis dignissim id sed metus. Nunc ac tortor sed ligula pharetra pretium. Suspendisse potenti. Nunc tristique nec sem a interdum. Sed vitae est eu lorem pretium consectetur.', 1, '2021-08-01 14:47:49', 94),
(3, 'Lorem is ispum', 'girl.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sollicitudin ullamcorper facilisis. Nulla eros libero, euismod ut aliquet quis, tempus non eros. Maecenas egestas erat ex, a consectetur metus varius sit amet. Ut consequat leo et mi ornare eleifend. Phasellus iaculis lacus eu eleifend gravida. Sed porta, leo ac pretium cursus, tortor nulla fermentum urna, in aliquet ipsum urna nec tellus. Suspendisse aliquam orci magna, ut commodo elit porta mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce urna dui, ultrices ac vulputate nec, lobortis at tortor. Mauris fermentum bibendum ultricies. Vestibulum mollis, urna sed volutpat efficitur, nisl erat ullamcorper tellus, non vehicula nisl erat ut ante. Integer sit amet quam quis felis mollis dignissim id sed metus. Nunc ac tortor sed ligula pharetra pretium. Suspendisse potenti. Nunc tristique nec sem a interdum. Sed vitae est eu lorem pretium consectetur.', 4, '2021-08-01 14:58:36', 628),
(4, 'Leopard hunting', 'zaex.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...', 5, '2021-08-02 12:44:11', 1283),
(5, 'Iron', 'ytyg.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 3, '2021-08-05 11:55:19', 9640),
(6, 'Panda', 'panda.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 6, '2021-08-05 11:56:14', 98),
(7, 'teapot', 'chainik.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 3, '2021-08-05 12:27:14', 439),
(8, 'Hacker', 'hacker.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2021-08-05 12:33:49', 282),
(9, 'Best gamepads', 'gamepad.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five ce', 5, '2021-08-06 18:04:13', 635);

-- --------------------------------------------------------

--
-- Table structure for table `articles_categories`
--

CREATE TABLE `articles_categories` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `articles_categories`
--

INSERT INTO `articles_categories` (`id`, `title`) VALUES
(1, 'Hacking'),
(2, 'Lifestyle'),
(3, 'Programming'),
(4, 'Security'),
(5, 'Games'),
(6, 'Different');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `text` text NOT NULL,
  `pubdate` datetime NOT NULL,
  `articles_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `pubdate`, `articles_id`) VALUES
(1, 'Wery good topic', '2021-08-05 13:26:57', 7),
(2, 'Give me one iron, please', '2021-08-05 13:31:19', 5),
(3, 'Very tasty soup', '2021-08-05 13:32:48', 1),
(32, 'security', '2021-08-06 19:29:34', 3),
(33, 'asd', '2021-11-08 18:04:36', 3),
(34, '125435', '2022-11-09 22:50:49', 5),
(35, 'fdsfsd', '2022-11-30 00:31:04', 1),
(36, 'Nice gamepads', '2023-01-05 19:15:53', 9),
(37, 'Putin loh', '2023-01-06 22:01:13', 7),
(38, 'nnn', '2023-01-06 22:02:26', 7),
(39, 'Best buy', '2023-01-07 18:54:17', 9),
(40, 'dddd', '2023-01-07 19:10:17', 7),
(41, 'ccc', '2023-01-07 19:10:21', 7),
(42, '1111', '2023-01-07 19:36:43', 3),
(43, '333', '2023-01-07 19:36:46', 3),
(44, '12324', '2023-01-07 19:39:03', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(23, 'Oleksandr', 'sashap.03q@gmail.com', '2f311f2a6098d8642bd656a8dfb2c7d2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles_categories`
--
ALTER TABLE `articles_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `articles_categories`
--
ALTER TABLE `articles_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
