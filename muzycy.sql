-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2020 at 06:09 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muzycy`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(32) COLLATE utf8_bin NOT NULL,
  `time` int(10) NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `id_user`, `title`, `time`, `content`) VALUES
(1, 23, 'Szukam gitarzysty', 1583338696, 'Szukamy gitarzysty do zespołu\r\ngs\r\ngdsg\r\ngsd\r\nXD'),
(9, 24, 'asd', 1583341689, 'jcjcjcnbcjh'),
(10, 24, '', 1583342489, 'gdasg\r\ngadg\r\nhfd\r\nXDdD'),
(11, 24, 'gre', 1583342513, 'reter\r\nbf\r\nr\r\ngf\r\ndh\r\ne\r\nrh\r\nd'),
(12, 24, 'gd', 1583342589, 'gdxg\r\ng\r\n\r\n\r\ngggg'),
(13, 24, 'ff', 1583343132, 'fds\r\nfsd\r\nf\r\ns');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `message` text COLLATE utf8_bin NOT NULL,
  `subject` varchar(42) COLLATE utf8_bin NOT NULL,
  `time` int(10) NOT NULL,
  `read` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `user1`, `user2`, `message`, `subject`, `time`, `read`) VALUES
(13, 23, 25, 'Kup se klej!\r\nHehehehe :v', 'Hej!', 1582752643, 1),
(14, 25, 25, 'gdsg', 'gd', 1582753611, 1),
(15, 25, 23, 'gdzgzdgzd dg ', 'Hej!', 1582755263, 1),
(28, 23, 24, 'fsa', 'fa', 1583340732, 1),
(29, 23, 24, 'fsa', 'fa', 1583340740, 0),
(30, 23, 24, 'gsdg', 'fds', 1583340751, 0),
(31, 23, 24, 'fsafaf', 'safaf', 1583340762, 0),
(32, 23, 24, 'gdsgsd', 'dvvvvvvvvvv', 1583340799, 1),
(33, 23, 24, 'fgdf', 'gsd', 1583341266, 0),
(34, 24, 23, 'gd\r\ng\r\nd\r\ngds\r\ng\r\n\r\n\r\n\r\n\r\ngdgsdgds\r\nDDDD XD', 'gs', 1583344156, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(32) COLLATE utf8_bin NOT NULL,
  `password` varchar(32) COLLATE utf8_bin NOT NULL,
  `name` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `surname` varchar(32) COLLATE utf8_bin NOT NULL,
  `bdate` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` varchar(32) COLLATE utf8_bin NOT NULL,
  `phone` varchar(14) COLLATE utf8_bin NOT NULL,
  `city` varchar(32) CHARACTER SET utf8 NOT NULL,
  `postcode` varchar(7) COLLATE utf8_bin NOT NULL,
  `musicgenre` varchar(32) COLLATE utf8_bin NOT NULL,
  `avatar` int(11) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_bin NOT NULL,
  `language` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `surname`, `bdate`, `email`, `phone`, `city`, `postcode`, `musicgenre`, `avatar`, `description`, `language`) VALUES
(23, 'test1', 'haslo1', 'Jon', 'Smith', '1995-04-18', 'meh@o2.pl', '454456456', 'Łódź', '91-404', 'Pop', 0, 'fsf', ''),
(24, 'test2', 'haslo2', 'Emma', 'Tym', '1995-05-31', 'test2@o2.pl', '502456912', 'Łódź', '91-404', 'Pop\"', 0, 'trolololo <br/>\r\nąźżół', ''),
(25, 'test3', 'haslo3', 'Jon', 'Kowalski', '1989-06-15', 'test3@o2.pl', '', 'Warszawa', '91-404', 'Blues', 0, '', ''),
(27, 'test4', 'haslo4', NULL, '', '', 'test2@o2.pl', '', '', '', '', 0, '', ''),
(28, 'test5', 'haslo5', NULL, '', '', 'test2@o2.pl', '', '', '', '', 0, '', ''),
(29, 'test6', 'haslo6', NULL, '', '', 'fst@o2.pl', '', '', '', '', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user1` (`user1`),
  ADD KEY `user2` (`user2`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `user1` FOREIGN KEY (`user1`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user2` FOREIGN KEY (`user2`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
