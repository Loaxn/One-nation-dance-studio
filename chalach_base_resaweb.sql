-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2023 at 08:27 PM
-- Server version: 10.3.39-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chalach_base_resaweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `email`) VALUES
(0, 'chaalch', 'laoana', 'chalachloana@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `id_cours` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` varchar(50) NOT NULL,
  `tarif` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `ext_professeur` int(11) NOT NULL,
  `duree` time NOT NULL,
  `ext_dance` int(11) NOT NULL,
  `description` varchar(10000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`id_cours`, `date`, `heure`, `tarif`, `type`, `ext_professeur`, `duree`, `ext_dance`, `description`) VALUES
(1, '2023-06-10', '16h30', '25', 'Freestyle', 1, '02:00:00', 6, '\r\nJoeline\'s freestyle dance classes offer an exciting and expressive form of movement, where students can unleash their creativity and individuality. With Joeline\'s guidance, dancers explore spontaneous movement, combining various styles and techniques to create mesmerizing performances. It\'s a supportive environment for developing improvisational skills and letting your passion for dance shine.'),
(2, '2023-06-10', '18h30', '20', 'Breakdance', 2, '01:30:00', 7, 'Learn breakdancing from the enthusiastic instructor, Marc Jones. His classes are a thrilling and energetic exploration of power moves, freezes, and intricate footwork. Develop strength, agility, and rhythmic coordination while mastering impressive acrobatics and gravity-defying flips. With Marc\'s guidance, you\'ll thrive in a supportive environment that encourages pushing boundaries and embracing the dynamic challenges of breakdancing.'),
(3, '2023-06-25', '12h30', '25', 'Streetjazz', 3, '02:00:00', 8, 'Join Bella Penelopy\'s street jazz course and dive into the vibrant world of urban dance. Experience the fusion of hip-hop, funk, and jazz with her expert guidance. Develop fluidity, precision, and musicality while expressing your unique style. Bella\'s energetic and inclusive classes create a supportive environment for dancers to explore their creativity and embrace the dynamic rhythms of street jazz.'),
(4, '2023-06-26', '15h', '30', 'Hiphop old style', 4, '02:30:00', 9, 'Discover the essence of old-school hip-hop in William Smith\'s captivating courses. Journey back to the roots of the genre and learn the iconic moves and grooves that defined its unique style. With William\'s guidance, develop your rhythm, body control, and stage presence while immersing yourself in the timeless charm of old-school hip-hop. In a supportive and dynamic environment, embrace the classic elements and unleash your inner hip-hop spirit under William\'s expert instruction.'),
(5, '2023-06-24', '16h30', '20', 'commercial', 5, '01:00:00', 10, 'Join Sophie Carson, a master of the art of commercial dance, in her captivating courses. With her extensive knowledge and experience, Sophie guides students through various styles and techniques that dominate the commercial dance industry. Develop your stage presence, confidence, and versatility as you discover your unique artistic expression. Sophie\'s expertise and supportive approach create an environment where you can unleash your creativity and thrive in the exciting world of commercial dance.'),
(6, '2023-07-01', '15h', '25', 'popping', 6, '02:00:00', 11, '\r\nJoin Anca Abbey, a popping dance expert, and unlock the vibrant world of this iconic street dance style. In Anca\'s courses, you\'ll delve into the fundamentals of popping, mastering isolations, waves, and robotic movements. With Anca\'s guidance, you\'ll develop precise control, rhythmic precision, and musicality as you explore the distinct groove of popping. Embrace a supportive and energetic environment where you can unleash your creativity and fully immerse yourself in the unique style of popping under Anca\'s expert instruction.'),
(7, '2023-06-28', '19h45', '30', 'Locking', 7, '02:30:00', 12, 'Unleash your inner funk and captivate the dance floor with Joshua\'s locking courses. Explore the energetic footwork and unique groove of this legendary street dance style. Under Joshua\'s expert guidance, master the foundations and principles of locking, developing your own captivating style. Let the rich history and soulful rhythms of locking inspire you as you mesmerize audiences with your moves. Get ready to own the dance floor with Joshua\'s extraordinary courses.');

-- --------------------------------------------------------

--
-- Table structure for table `dance`
--

CREATE TABLE `dance` (
  `id_dance` int(11) NOT NULL,
  `styles` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dance`
--

INSERT INTO `dance` (`id_dance`, `styles`) VALUES
(6, 'freestyle'),
(7, 'Breakdance'),
(8, 'streetjazz'),
(9, 'HipHop old style'),
(10, 'commercial'),
(11, 'popping'),
(12, 'locking');

-- --------------------------------------------------------

--
-- Table structure for table `professeur`
--

CREATE TABLE `professeur` (
  `id_professeur` int(11) NOT NULL,
  `nom_professeur` varchar(50) NOT NULL,
  `ext_dance` varchar(50) DEFAULT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professeur`
--

INSERT INTO `professeur` (`id_professeur`, `nom_professeur`, `ext_dance`, `photo`) VALUES
(1, 'Joeline freeman', '6', 'sliderphoto/joeline.jpg\r\n'),
(2, 'marc jones', '7', 'sliderphoto/marc.jpg\r\n'),
(3, 'bella penelopy', '8', 'sliderphoto/bella.jpg'),
(4, 'william smith', '9', 'sliderphoto/william.jpg'),
(5, 'Sophie carson', '10', 'sliderphoto/sophie.jpg'),
(6, 'Anca Abbey', '11', 'sliderphoto/anca.png'),
(7, 'Joshua Pestka', '12', 'sliderphoto/joshua.png');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `ext_client` int(11) NOT NULL,
  `ext_cours` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`),
  ADD UNIQUE KEY `ext_professeur` (`ext_professeur`),
  ADD UNIQUE KEY `ext_dance` (`ext_dance`);

--
-- Indexes for table `dance`
--
ALTER TABLE `dance`
  ADD PRIMARY KEY (`id_dance`);

--
-- Indexes for table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`id_professeur`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD UNIQUE KEY `ext_client` (`ext_client`),
  ADD UNIQUE KEY `ext_cours` (`ext_cours`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dance`
--
ALTER TABLE `dance`
  MODIFY `id_dance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
