-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 22, 2023 at 04:41 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `ID` int(11) UNSIGNED NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `AuthorID` varchar(255) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`ID`, `Title`, `Content`, `AuthorID`, `CreatedAt`, `UpdatedAt`, `Image`) VALUES
(3, 'The Evolution of Movie Soundtracks', 'Movie soundtracks are an integral part of the film industry. They can set the tone for a scene, evoke emotions, and even become iconic in their own right. Over the years, movie soundtracks have evolved and changed, adapting to new technologies and trends in the music industry.\r\n\r\nIn the early days of cinema, silent films relied on live music to accompany the action on screen. Pianists and small orchestras would play along to the film, providing sound effects and musical accompaniment. As technology advanced, so did the way that soundtracks were created.\r\n\r\nThe introduction of synchronized sound in the late 1920s allowed for more complex soundtracks to be created. Suddenly, films could feature dialogue, sound effects, and music all mixed together. The early soundtracks were often orchestral in nature, with classical music or original scores accompanying the action on screen.', '456', '2023-04-04 15:58:37', '2023-04-04 16:24:32', 'https://www.macmillandictionaryblog.com/wp-content/uploads/2018/04/soundtrack-1024x644.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Date` date DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Rating` decimal(3,1) DEFAULT NULL,
  `Cover` varchar(255) DEFAULT NULL,
  `Trailer` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Type` varchar(10) DEFAULT NULL,
  `Length` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`ID`, `Title`, `Date`, `Status`, `Rating`, `Cover`, `Trailer`, `Description`, `Type`, `Length`) VALUES
(1, 'Avatar', '2009-12-12', NULL, '7.9', 'https://m.media-amazon.com/images/M/MV5BZDA0OGQxNTItMDZkMC00N2UyLTg3MzMtYTJmNjg3Nzk5MzRiXkEyXkFqcGdeQXVyMjUzOTY1NTc@._V1_.jpg', 'https://www.youtube.com/watch?v=5PSNL1qE6VY', 'In 2154, the natural resources of the Earth have been depleted. The Resources Development Administration (RDA) mines the valuable mineral unobtanium on Pandora, a moon in the Alpha Centauri star system. Pandora, whose atmosphere is inhospitable to humans, is inhabited by the Navi, 10-foot-tall (3.0 m), blue-skinned, sapient humanoids that live in harmony with nature.', 'Movie', 162),
(2, 'The Batman', '2022-04-03', NULL, '7.8', 'https://m.media-amazon.com/images/M/MV5BMDdmMTBiNTYtMDIzNi00NGVlLWIzMDYtZTk3MTQ3NGQxZGEwXkEyXkFqcGdeQXVyMzMwOTU5MDk@._V1_.jpg', 'https://www.youtube.com/watch?v=mqqft2x_Aa4', 'A reclusive billionaire who obsessively protects Gotham City as a masked vigilante to cope with his traumatic past. Batman is around 30 years old and is not yet an experienced crime fighter, as director Matt Reeves wanted to explore the character before he becomes fully formed.', 'Movie', 176),
(3, 'Breaking Bad', '2008-02-01', 'Ended', '9.5', 'https://m.media-amazon.com/images/M/MV5BYmQ4YWMxYjUtNjZmYi00MDQ1LWFjMjMtNjA5ZDdiYjdiODU5XkEyXkFqcGdeQXVyMTMzNDExODE5._V1_.jpg', 'https://www.youtube.com/watch?v=HhesaQXLuRY&ab_channel=TrailerBlend', 'Created by Vince Gilligan, the series follows the exploits of Walter White, a modest high school chemistry teacher, who discovers a new purpose in life when he learns he has terminal cancer and turns to a life of crime to provide for his family.', 'TV Show', NULL),
(4, 'Game of Thrones', '2011-12-04', 'Canceled', '9.2', 'https://m.media-amazon.com/images/M/MV5BYTRiNDQwYzAtMzVlZS00NTI5LWJjYjUtMzkwNTUzMWMxZTllXkEyXkFqcGdeQXVyNDIzMzcwNjc@._V1_.jpg', 'https://www.youtube.com/watch?v=rlR4PJn8b8I', 'Game of Thrones is an American fantasy drama television series created by David Benioff and D. B. Weiss for HBO. It is an adaptation of A Song of Ice and Fire, a series of fantasy novels by George R. R.', 'TV Show', NULL),
(5, 'The Godfather', '1972-02-04', NULL, '9.2', 'https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg', 'https://www.youtube.com/watch?v=UaVTIH8mujA', 'The Godfather is set in the 1940s and takes place entirely within the world of the Corleones, a fictional New York Mafia family. It opens inside the dark office of the family patriarch, Don Vito Corleone (also known as the Godfather and played by Brando), on the wedding day of his daughter, Connie (Talia Shire).', 'Movie', 175),
(6, 'The Shawshank Redemption', '1995-02-09', NULL, '9.3', 'https://m.media-amazon.com/images/M/MV5BNDE3ODcxYzMtY2YzZC00NmNlLWJiNDMtZDViZWM2MzIxZDYwXkEyXkFqcGdeQXVyNjAwNDUxODI@._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=NmzuHjWmXOc', 'Synopsis. In 1947, Andy Dufresne (Tim Robbins), a banker in Maine, is convicted of murdering his wife and her lover, a golf pro. Since the state of Maine has no death penalty, he is given two consecutive life sentences and sent to the notoriously harsh Shawshank Prison.', 'Movie', 142),
(7, 'Balto', '1995-12-22', NULL, '7.1', 'https://m.media-amazon.com/images/M/MV5BMjBhNmFlZjMtMzhlYy00NDBlLWFiMjctMmE0ZjgwOGM2MTNmXkEyXkFqcGdeQXVyNjExODE1MDc@._V1_.jpg', 'https://www.youtube.com/watch?v=HJwvbmRXym4', 'Balto (Kevin Bacon) -- a half-wolf dog ignored by all except a goose, Boris (Bob Hoskins), and two polar bears -- is chosen to run but is disqualified by lead dog Steele (Jim Cummings). When the other dogs get lost in the snow, Balto risks his life to rescue them and deliver the medicine.', 'Movie', 78),
(8, 'Zack Snyder\'s Justice League', '2021-03-18', NULL, '8.0', 'https://static.wikia.nocookie.net/dccu/images/f/fd/ZSJL_poster_-_League_together.png/revision/latest?cb=20210302174150', 'https://www.youtube.com/watch?v=oTXrl8H6luI', 'The movie follows the story of the Justice League as they come together to stop Steppenwolf, an exiled lieutenant of Darkseid, from collecting three Mother Boxes on Earth that can be used to transform the planet into a copy of Apokolips. After Superman is killed, his dying scream reawakens the Mother Boxes, alerting Steppenwolf. Bruce Wayne and Diana Prince recruit other superheroes, including Barry Allen, Arthur Curry, and Victor Stone, to stop Steppenwolf. They also use the Mother Boxes to resurrect Superman, who initially attacks the team but regains his memories with Lois Lane\'s help. The team ultimately defeats Steppenwolf and throws his body back to Apokolips, but Darkseid vows to return and get the Anti-Life Equation. After the battle, the team members go their separate ways, but Bruce is visited by Martian Manhunter, who promises to help plan for Darkseid\'s return.', 'Movie', 242);

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `ID` int(11) NOT NULL,
  `Director` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`ID`, `Director`) VALUES
(1, 'James Cameron'),
(2, 'Matt Reeves'),
(3, 'Vince Gilligan'),
(4, 'Mark Mylod '),
(5, 'Francis Ford Coppola'),
(6, 'Frank Darabont'),
(7, 'Simon Wells'),
(8, 'Zack Snyder');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `ID` int(11) NOT NULL,
  `Genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`ID`, `Genre`) VALUES
(1, 'Action'),
(1, 'Adventure'),
(1, 'Fantasy'),
(1, 'Science Fiction'),
(2, 'Action'),
(2, 'Crime'),
(2, 'Mystery'),
(3, 'Crime'),
(3, 'Drama'),
(3, 'Thriller'),
(4, 'Action'),
(4, 'Adventure'),
(4, 'Drama'),
(4, 'Fantasy'),
(5, 'Crime'),
(5, 'Drama'),
(6, 'Crime'),
(6, 'Drama'),
(7, 'Adventure'),
(7, 'Animation'),
(7, 'Family'),
(8, 'Action'),
(8, 'Adventure'),
(8, 'Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `studio`
--

CREATE TABLE `studio` (
  `ID` int(11) NOT NULL,
  `Studio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studio`
--

INSERT INTO `studio` (`ID`, `Studio`) VALUES
(1, '20th Century Fox'),
(2, 'Warner Bros. Pictures'),
(3, 'AMC'),
(4, 'Linen Mills Studios'),
(5, 'Paramount Pictures'),
(6, 'Warner Bros.'),
(7, 'Universal Pictures'),
(8, 'Warner Bros. Pictures');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Firstname` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `Birthdate` date DEFAULT NULL,
  `Username` varchar(15) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `Photo` varchar(50) NOT NULL,
  `Admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Firstname`, `Lastname`, `Birthdate`, `Username`, `Email`, `Password`, `Photo`, `Admin`) VALUES
(1, 'Eljon', 'Shala', '2003-06-08', 'eljohn7', 'eljon.sh@gmail.com', 'Milton77', 'assets/img/user_pic/eljohn7', 1),
(2, 'Bleron', 'Morina', '2004-02-12', 'bleronmorina', 'bleronmorina54@gmail.com', 'Milton77', 'assets/img/user_pic/bleronmorina.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`ID`,`Genre`);

--
-- Indexes for table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `director`
--
ALTER TABLE `director`
  ADD CONSTRAINT `director_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `content` (`ID`);

--
-- Constraints for table `genre`
--
ALTER TABLE `genre`
  ADD CONSTRAINT `genre_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `content` (`ID`);

--
-- Constraints for table `studio`
--
ALTER TABLE `studio`
  ADD CONSTRAINT `studio_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `content` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
