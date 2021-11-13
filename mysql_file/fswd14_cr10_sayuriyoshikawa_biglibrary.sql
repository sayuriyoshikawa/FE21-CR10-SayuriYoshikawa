-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2021 at 06:27 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

 
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fswd14_cr10_sayuriyoshikawa_biglibrary`
--
CREATE DATABASE IF NOT EXISTS `fswd14_cr10_sayuriyoshikawa_biglibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fswd14_cr10_sayuriyoshikawa_biglibrary`;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `ISBNcode` varchar(30) NOT NULL,
  `short_description` varchar(300) NOT NULL,
  `type` varchar(5) NOT NULL,
  `author_first_name` varchar(50) NOT NULL,
  `author_last_name` varchar(50) NOT NULL,
  `publisher_name` varchar(50) NOT NULL,
  `publisher_address` varchar(150) NOT NULL,
  `publish_date` date NOT NULL,
  `status` enum('available','reserved') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `picture`, `ISBNcode`, `short_description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `status`) VALUES
(1, 'The midnight librarya', '618feac590084.jpg', '12345678910', 'Between life and death there is a library, and within that library, the shelves go on forever. Every book provides a chance to try another life you could have lived. ', 'Book', 'Matt', 'Haig', 'Guardian', '1010, Supengergasse28, Vienna, Austria', '2021-07-01', 'available'),
(2, 'Harry Potter and the Deathly Hallows', '618fef3c8b5ca.jpg', '12345678911', 'Between life and death there is a library, and within that library, the shelves go on forever. Every book provides a chance to try another life you could have lived. ', 'Book', 'Rowling', 'J.K', 'Bloomsbury', 'London SW1H 0BB, United Kingdom', '2015-11-04', 'available'),
(3, 'Harry Potter and the Philosopher\'s Stone', 'fairytale-ge7a9a7751_1280.jpg', '12345678912', 'Between life and death there is a library, and within that library, the shelves go on forever. Every book provides a chance to try another life you could have lived. ', 'Book', 'Rowling', 'J.K.', 'Bloomsbury', 'London SW1H 0BB, United Kingdom', '2021-11-04', 'available'),
(4, 'Harry Potter and the Order of the Phoenix', 'dreamland-gb13a95b66_1280.jpg', '12345657812', 'Between life and death there is a library, and within that library, the shelves go on forever. Every book provides a chance to try another life you could have lived. ', 'Book', 'Rowling', 'J.K.', 'Bloomsbury', 'London SW1H 0BB, United Kingdom', '2021-11-06', 'reserved'),
(5, 'Angels and Demons', 'reading-g2da4a106a_1280.jpg', '1234567813', 'Between life and death there is a library, and within that library, the shelves go on forever. Every book provides a chance to try another life you could have lived. ', 'Book', 'Transworld', 'Brown', 'Dan', 'London SW5H 0BB, United Kingdom', '2021-11-10', 'available'),
(6, 'Twilight', 'book3.jpg', '123345678915', 'Between life and death there is a library, and within that library, the shelves go on forever. Every book provides a chance to try another life you could have lived. ', 'Book', 'Meyer', 'Stephenie', 'Little, Brown Book', 'London SW5H 0BB, United Kingdom', '2021-11-01', 'available'),
(7, 'Twilight', 'book3.jpg', '123456789107', 'Between life and death there is a library, and within that library, the shelves go on forever. Every book provides a chance to try another life you could have lived. ', 'DVD', 'Meyer', 'Stephenie', 'Little, Brown Book', 'London SW5H 0BB, United Kingdom', '2021-11-10', 'reserved'),
(8, 'Gruffalo,The', 'man-g1bea4b429_1280.jpg', '123445677', 'Between life and death there is a library, and within that library, the shelves go on forever. Every book provides a chance to try another life you could have lived. ', 'CD', 'Donaldson', 'Julia', 'Pan Macmillan', 'London SW5H 0BB, United Kingdom', '2021-11-03', 'available'),
(9, 'Gruffalo,The', 'freddie-mercury-g0d5e59583_1280.jpg', '123333333333', 'Between life and death there is a library, and within that library, the shelves go on forever. Every book provides a chance to try another life you could have lived. ', 'DVD', 'Donaldson', 'Julia', 'Pan Macmillan', 'London SW5H 0BB, United Kingdom', '2021-11-03', 'available'),
(10, 'One Day', 'hedy-lamarr-g7e33984e1_1280.jpg', '11111111111', 'Between life and death there is a library, and within that library, the shelves go on forever. Every book provides a chance to try another life you could have lived. ', 'CD', 'Nicholls', 'David', 'Pan Macmillan', 'London SW5H 0BB, United Kingdom', '2021-11-04', 'reserved'),
(21, 'Atonement', '618ff3be3590c.jpg', '1539428', 'First album', 'CD', 'McEwan', 'Ian', 'Random House', 'aaagasse 1010, vienna, Austria', '2021-09-10', 'available'),
(22, 'The midnight library2', '618ff454ccd3f.jpg', '123456789109', 'The midnight library2', 'Book', 'Matt', 'Haig', 'Guardian', 'aaagasse 1010, vienna, Austria', '2021-11-06', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
