-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Pi 29.Júl 2022, 16:23
-- Verzia serveru: 10.4.24-MariaDB
-- Verzia PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `cms`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Javascript1');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(3, 1, 'Michaela', 'michaela@gmail.com', 'hi', 'aproved', '2022-07-01'),
(4, 1, 'Michaela', 'michaela@gmail.com', 'hi', 'aproved', '2022-07-01');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_catagory_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL,
  `post_comment_count` int(3) NOT NULL,
  `post_views_count` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `posts`
--

INSERT INTO `posts` (`post_id`, `post_catagory_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_status`, `post_comment_count`, `post_views_count`) VALUES
(5, 1, 'test from admin', 'Michaela', '', '2022-07-02', '', 'some content', 'tag', 'published', 0, 18),
(6, 1, 'test', 'Michaela', '', '2022-07-02', 'Screenshot_1.jpg', 'test', 'tag', 'draft', 0, 2),
(7, 1, 'title test', 'Micahela', '', '2022-07-02', 'Screenshot_2.jpg', 'hello world', 'tag', 'published', 0, 0),
(8, 1, 'test from admin', 'Michaela', '', '2022-07-02', '', 'some content', 'tag', 'published', 0, 0),
(9, 1, 'test', 'Michaela', '', '2022-07-02', 'Screenshot_1.jpg', 'test', 'tag', 'draft', 0, 0),
(10, 1, 'title test', 'Micahela', '', '2022-07-02', 'Screenshot_2.jpg', 'hello world', 'tag', 'published', 0, 0),
(11, 1, 'test from admin', 'Michaela', '', '2022-07-02', '', 'some content', 'tag', 'published', 0, 0),
(12, 1, 'test', 'Michaela', '', '2022-07-02', 'Screenshot_1.jpg', 'test', 'tag', 'draft', 0, 0),
(13, 1, 'title test', 'Micahela', '', '2022-07-02', 'Screenshot_2.jpg', 'hello world', 'tag', 'published', 0, 0);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_role`, `user_email`, `user_image`, `randSalt`) VALUES
(1, 'Michaela', 'Miminka123', 'Michaela', 'Satarova', 'Admin', 'michaela.satarova.ml@gmail.com', '', '$2y$10$iusesomecrazystrings22'),
(2, 'root', 'MIMINKA123', 'root', 'rotovič', 'Admin', 'rotko@gmail.com', '', '$2y$10$iusesomecrazystrings22'),
(5, 'root', '$2y$10$iusesomecrazystrings2uce/9fSzNdh9dz6Yj6R27aKe/nvX4pL2', '', '', 'subscriber', 'root@gmail.com', '', '$2y$10$iusesomecrazystrings22'),
(6, 'rootnew', '$2y$10$iusesomecrazystrings2uce/9fSzNdh9dz6Yj6R27aKe/nvX4pL2', '', '', 'subscriber', 'password@gmail.com', '', '$2y$10$iusesomecrazystrings22'),
(7, 'ro', '$2y$10$iusesomecrazystrings2uce/9fSzNdh9dz6Yj6R27aKe/nvX4pL2', '', '', 'subscriber', 'mimi@gmail.com', '', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'msknvbcd5m798q3fn760lfotvt', 1656786960),
(2, 'ebkeau3kh4tfdur5sahdsdhn7g', 1656776805),
(3, 'e8d3b5qt8mb0rj91ifl8bfrsh2', 1656866113),
(4, 'fcr3r3henbohr7h6qk2qr42tri', 1657389153),
(5, '2oqgki3f527f04vj6etcr680af', 1658657999),
(6, 'pbaqa63g8tdoaqrg3si1cs9cov', 1658683595),
(7, 'h08f6vmnin4qqjdtrrqounoii5', 1659102017);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexy pre tabuľku `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexy pre tabuľku `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexy pre tabuľku `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pre tabuľku `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pre tabuľku `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
