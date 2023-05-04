-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 04, 2023 at 02:12 PM
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
  `AuthorID` int(11) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`ID`, `Title`, `Content`, `AuthorID`, `CreatedAt`, `UpdatedAt`, `Image`) VALUES
(3, 'The Evolution of Movie Soundtracks', 'Movie soundtracks are an integral part of the film industry. They can set the tone for a scene, evoke emotions, and even become iconic in their own right. Over the years, movie soundtracks have evolved and changed, adapting to new technologies and trends in the music industry.\r\n\r\nIn the early days of cinema, silent films relied on live music to accompany the action on screen. Pianists and small orchestras would play along to the film, providing sound effects and musical accompaniment. As technology advanced, so did the way that soundtracks were created.\r\n\r\nThe introduction of synchronized sound in the late 1920s allowed for more complex soundtracks to be created. Suddenly, films could feature dialogue, sound effects, and music all mixed together. The early soundtracks were often orchestral in nature, with classical music or original scores accompanying the action on screen.', 2, '2023-04-04 15:58:37', '2023-04-22 22:18:59', 'https://www.macmillandictionaryblog.com/wp-content/uploads/2018/04/soundtrack-1024x644.jpg'),
(4, 'Top 10 Must-Watch Movies of All Time', ' Looking for something to watch? Check out our list of the top 10 must-watch movies of all time. From action-packed thrillers to heartwarming dramas, we\'ve got you covered. Grab some popcorn and get ready for a movie marathon you won\'t forget!', 2, '2023-04-22 20:25:38', '2023-04-22 22:19:02', 'https://variety.com/wp-content/uploads/2022/12/100-Greatest-Movies-Variety.jpg?w=1360&h=765&crop=1'),
(8, 'Avatar', 'Amazing.', 2, '2023-04-22 23:15:33', '2023-04-22 23:15:33', 'https://variety.com/wp-content/uploads/2022/12/100-Greatest-Movies-Variety.jpg?w=1360&h=765&crop=1');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `Content_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `Content_ID`, `User_ID`, `Comment`) VALUES
(1, 1, 1, 'This is the best movie ever.'),
(2, 1, 2, 'This is not as good as you think it is.'),
(3, 2, 1, 'This movie is the best movie of 2022.');

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
(3, 'Breaking Bad', '2008-02-01', 'Ended', '9.5', 'https://m.media-amazon.com/images/M/MV5BYmQ4YWMxYjUtNjZmYi00MDQ1LWFjMjMtNjA5ZDdiYjdiODU5XkEyXkFqcGdeQXVyMTMzNDExODE5._V1_.jpg type= type= type= type= type= type=', 'https://www.youtube.com/watch?v=HhesaQXLuRY', 'Created by Vince Gilligan, the series follows the exploits of Walter White, a modest high school chemistry teacher, who discovers a new purpose in life when he learns he has terminal cancer and turns to a life of crime to provide for his family.', 'TV Show', NULL),
(4, 'Game of Thrones', '2011-12-04', 'Canceled', '9.3', 'https://m.media-amazon.com/images/M/MV5BYTRiNDQwYzAtMzVlZS00NTI5LWJjYjUtMzkwNTUzMWMxZTllXkEyXkFqcGdeQXVyNDIzMzcwNjc@._V1_.jpg', 'https://www.youtube.com/watch?v=rlR4PJn8b8I', 'Game of Thrones is an American fantasy drama television series created by David Benioff and D. B. Weiss for HBO. It is an adaptation of A Song of Ice and Fire, a series of fantasy novels by George R. R.', 'TV Show', NULL),
(5, 'The Godfather', '1972-02-04', NULL, '9.2', 'https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg', 'https://www.youtube.com/watch?v=UaVTIH8mujA', 'The Godfather is set in the 1940s and takes place entirely within the world of the Corleones, a fictional New York Mafia family. It opens inside the dark office of the family patriarch, Don Vito Corleone (also known as the Godfather and played by Brando), on the wedding day of his daughter, Connie (Talia Shire).', 'Movie', 175),
(6, 'The Shawshank Redemption', '1995-02-09', NULL, '9.3', 'https://m.media-amazon.com/images/M/MV5BNDE3ODcxYzMtY2YzZC00NmNlLWJiNDMtZDViZWM2MzIxZDYwXkEyXkFqcGdeQXVyNjAwNDUxODI@._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=NmzuHjWmXOc', 'Synopsis. In 1947, Andy Dufresne (Tim Robbins), a banker in Maine, is convicted of murdering his wife and her lover, a golf pro. Since the state of Maine has no death penalty, he is given two consecutive life sentences and sent to the notoriously harsh Shawshank Prison.', 'Movie', 142),
(7, 'Balto', '1995-12-22', NULL, '7.1', 'https://m.media-amazon.com/images/M/MV5BMjBhNmFlZjMtMzhlYy00NDBlLWFiMjctMmE0ZjgwOGM2MTNmXkEyXkFqcGdeQXVyNjExODE1MDc@._V1_.jpg', 'https://www.youtube.com/watch?v=HJwvbmRXym4', 'Balto (Kevin Bacon) -- a half-wolf dog ignored by all except a goose, Boris (Bob Hoskins), and two polar bears -- is chosen to run but is disqualified by lead dog Steele (Jim Cummings). When the other dogs get lost in the snow, Balto risks his life to rescue them and deliver the medicine.', 'Movie', 78),
(8, 'Zack Snyder\'s Justice League', '2021-03-18', NULL, '8.0', 'https://m.media-amazon.com/images/M/MV5BYjI3NDg0ZTEtMDEwYS00YWMyLThjYjktMTNlM2NmYjc1OGRiXkEyXkFqcGdeQXVyMTEyMjM2NDc2._V1_FMjpg_UX1000_.jpg id=', 'https://www.youtube.com/watch?v=oTXrl8H6luI', 'The movie follows the story of the Justice League as they come together to stop Steppenwolf, an exiled lieutenant of Darkseid, from collecting three Mother Boxes on Earth that can be used to transform the planet into a copy of Apokolips. After Superman is killed, his dying scream reawakens the Mother Boxes, alerting Steppenwolf. Bruce Wayne and Diana Prince recruit other superheroes, including Barry Allen, Arthur Curry, and Victor Stone, to stop Steppenwolf. ', 'Movie', 242),
(9, 'Shazam! Fury of the Gods', '2023-03-17', NULL, '6.1', 'https://m.media-amazon.com/images/M/MV5BNzJlM2NmZTItOGQyYS00MmE2LTkwZGUtNDFkNmJmZjRjZjcxXkEyXkFqcGdeQXVyMTA3MDk2NDg2._V1_.jpg', 'https://www.youtube.com/watch?v=Zi88i4CpHe4', 'Fury of the Gods is a 2023 American superhero film based on the DC Comics character Shazam. Produced by New Line Cinema, DC Studios, and the Safran Company, and distributed by Warner Bros. Pictures, it is the sequel to Shazam! (2019) and the 12th installment in the DC Extended Universe (DCEU).', 'Movie', 130),
(10, 'Ant-Man and the Wasp: Quantumania', '2023-12-02', NULL, '6.3', 'https://m.media-amazon.com/images/M/MV5BODZhNzlmOGItMWUyYS00Y2Q5LWFlNzMtM2I2NDFkM2ZkYmE1XkEyXkFqcGdeQXVyMTU5OTA4NTIz._V1_FMjpg_UX1000_.jpg id=', 'https://www.youtube.com/watch?v=5WfTEZJnv_8&ab_channel=MarvelEntertainment', 'Super Hero partners Scott Lang and Hope Van Dyne, together with Hope’s parents Hank Pym and Janet Van Dyne, find themselves exploring the Quantum Realm, interacting with strange new creatures and embarking on an adventure that will push them beyond the limits of what they thought was possible.', 'Movie', 125),
(11, 'The Good Place', '2016-09-19', 'Ended', '7.4', 'https://m.media-amazon.com/images/M/MV5BYmMxNjM0NmItNGU1Mi00OGMwLTkzMzctZmE3YjU1ZDE4NmFjXkEyXkFqcGdeQXVyODUxOTU0OTg@._V1_FMjpg_UX1000_.jpg type= type=', 'https://www.youtube.com/watch?v=brZtP21eLrs&ab_channel=NBC', 'Eleanor Shellstrop is an ordinary woman who, through an extraordinary string of events, enters the afterlife where she comes to realize that she hasn\'t been a very good person. With the help of her wise afterlife mentor, she\'s determined to shed her old way of living and discover the awesome (or at least the pretty good) person within.', 'TV Show', NULL),
(12, 'The Mandalorian', '2019-11-12', 'Airing', '8.7', 'https://m.media-amazon.com/images/M/MV5BN2M5YWFjN2YtYzU2YS00NzBlLTgwZWUtYWQzNWFhNDkyYjg3XkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_.jpg', 'https://www.youtube.com/watch?v=Znsa4Deavgg', 'The travels of a lone bounty hunter in the outer reaches of the galaxy, far from the authority of the New Republic.', 'TV Show', NULL),
(13, 'Chicken Run', '2000-06-21', NULL, '9.9', 'https://m.media-amazon.com/images/M/MV5BNDgxNjZlZDYtZGJmZC00Mjg0LWEwYzctYWQ0MWFjNTM3ZmM4XkEyXkFqcGdeQXVyNTM5NzI0NDY@._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=AEOfT7hUcDs', 'When a cockerel apparently flies into a chicken farm, the chickens see him as an opportunity to escape their evil owners.', 'Movie', 84),
(14, 'Deck the Halls', '2006-11-22', NULL, '8.7', 'https://m.media-amazon.com/images/M/MV5BMTIzNjA4OTM0OV5BMl5BanBnXkFtZTcwMDgwODkzMQ@@._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=', 'Two neighbors have it out after one of them decorates his house for the holidays so brightly that it can be seen from space.', 'Movie', 93),
(15, 'Barbie as the Island Princess', '2007-09-18', NULL, '7.2', 'https://m.media-amazon.com/images/I/510Z90rEuHL._AC_.jpg', 'https://www.youtube.com/watch?v=0z_WwoRHHUc', 'After a violent storm, Sagi, a wise red panda and Azul, a flamboyant peacock discover that a six-year-old girl has been shipwrecked on their island. They and a baby elephant named Tika, decide to help her. Over time, she learns to talk to animals, but fails to remember anything about her past before the shipwreck, including her name after Ro. Her only clues are a battered trunk with a broken nameplate \"Ro\" and a shredded flag with a white rose.', 'Movie', 86),
(16, 'Dr. Dolittle', '1998-06-22', NULL, '7.5', 'https://m.media-amazon.com/images/M/MV5BNGVmYjI4ZjktMjVkNi00ZTRlLWJlYTMtNzMxYjQ0ZDIyZWNmXkEyXkFqcGdeQXVyNTUyMzE4Mzg@._V1_.jpg', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DLWbtxG-jXMY&psig=AOvVaw2m_O2uc7vN-_81JamMuvYj&ust=1682293302794000&source=images&cd=vfe&ved=0CBMQjhxqFwoTCNDl74fVvv4CFQAAAAAdAAAAABAE', 'In early Victorian period, Matthew Mugg (Anthony Newley) takes his young friend Tommy Stubbins (William Dix) to visit eccentric Doctor John Dolittle (Rex Harrison) for an injured duck that Matthew had acquired from a local fisherman. Dolittle, a former medical doctor, lives with an extended menagerie, including a Common chimpanzee named Chee-Chee, a dog named Jip, and a talking parrot named Polynesia (the uncredited voice of Ginny Tyler). Dolittle claims that he can talk to animals.', 'Movie', 85),
(17, 'Game Shakers', '2019-09-12', 'Ended', '7.7', 'https://m.media-amazon.com/images/M/MV5BMzY0Nzg5ODAtMDliNC00OTlhLWFlNDItODAxMmFkY2FiZmVhXkEyXkFqcGdeQXVyODk4Nzg5NjE@._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=rCVLzNCF534', 'A live-action sitcom about two 12-year-old girls who start a multi-million-dollar gaming company and take on rap superstar Double G as a business partner.', 'TV Show', NULL),
(18, ' Zig & Sharko', '2010-02-11', 'Ended', '8.2', 'https://m.media-amazon.com/images/M/MV5BYmRhN2I1YTItMTQ0Yi00ZmUzLThkZWItZGY1NzljMGNiZGY5XkEyXkFqcGdeQXVyMTMxODU3NzM@._V1_.jpg', 'https://www.youtube.com/watch?v=YizT9yU194s', 'Marina, a pretty little mermaid perched on a rock in the deep blue sea. Zig, a starving hyena on the island next door. With the help of his side-kick crab buddy, Bernie, they try to do anything to get his paws on Marina. But in the lagoon between them, lies Sharko: a shark who is in love with Marina, always ready to ruin the hyena’s crazy schemes to reach his prey.\r\n\r\n', 'TV Show', NULL);

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
(8, 'Zack Snyder'),
(9, 'David F. Sandberg'),
(10, 'Peyton Reed'),
(11, 'Michael Schur'),
(12, 'Jon Favreau'),
(13, 'Peter Lord'),
(14, 'John Whitesell'),
(15, 'Greg Richardson'),
(16, 'Craig Shapiro'),
(17, 'Daniel James \"Dan\" Schneider '),
(18, 'Olivier Jean-Marie');

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
(8, 'Fantasy'),
(9, 'Action'),
(9, 'Adventure'),
(9, 'Fantasy'),
(9, 'Science Fiction'),
(9, 'Thriller'),
(10, 'Action'),
(10, 'Adventure'),
(10, 'Comedy'),
(11, 'Comedy'),
(11, 'Drama'),
(11, 'Fantasy'),
(11, 'Romance'),
(12, 'Action'),
(12, 'Adventure'),
(12, 'Fantasy'),
(12, 'Science Fiction'),
(13, 'Comedy'),
(13, 'Drama'),
(14, 'Comedy'),
(14, 'Family'),
(15, 'Family'),
(16, 'Comedy'),
(16, 'Family'),
(16, 'Fantasy'),
(17, 'Comedy'),
(17, 'Family'),
(18, 'Adventure'),
(18, 'Comedy'),
(18, 'Family'),
(18, 'Fantasy'),
(18, 'Romance');

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
(8, 'Warner Bros. Pictures'),
(9, 'Warner Bros. Pictures'),
(10, 'Marvel Studios'),
(11, 'NBC'),
(12, 'Lucasfilm'),
(13, 'DreamWorks'),
(14, 'New Regency Pictures'),
(15, 'Mattel Entertainment'),
(16, '20th Century Fox'),
(17, 'Nickelodeon'),
(18, 'Canal+ Family ');

-- --------------------------------------------------------

--
-- Table structure for table `temporary users`
--

CREATE TABLE `temporary users` (
  `ID` int(16) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Birthdate` date DEFAULT NULL,
  `Username` varchar(15) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Photo` varchar(50) NOT NULL,
  `Admin` tinyint(4) NOT NULL DEFAULT 0,
  `ActToken` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temporary users`
--

INSERT INTO `temporary users` (`ID`, `FirstName`, `LastName`, `Birthdate`, `Username`, `Email`, `Password`, `Photo`, `Admin`, `ActToken`) VALUES
(2147483647, '', '', '2003-11-07', '999BZ', 'blendizeqiri@hotmail.com', 'Milton77', '', 0, '333ea3993d79b824df44f0b3f652bc74353b132298f6bfc8c2b85fab4fc5a36a');

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
  `Password` varchar(255) DEFAULT NULL,
  `Photo` varchar(50) NOT NULL,
  `Admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Firstname`, `Lastname`, `Birthdate`, `Username`, `Email`, `Password`, `Photo`, `Admin`) VALUES
(1, 'Eljon', 'Shala', '2003-06-08', 'eljohn7', 'eljon.sh@gmail.com', '50d53937402ef9f8730d53f1089ad8bea2f5ffdebb20b8ca672689dbdaee0acc', 'assets/img/user_pic/eljohn7', 1),
(2, 'Bleron', 'Morina', '2004-02-12', 'bleronmorina', 'bleronmorina54@gmail.com', '50d53937402ef9f8730d53f1089ad8bea2f5ffdebb20b8ca672689dbdaee0acc', 'assets/img/user_pic/bleronmorina', 1),
(30, 'Blendi', 'Zeqiri', '2003-11-07', '999BZ', 'blendizeqiri@hotmail.com', '50d53937402ef9f8730d53f1089ad8bea2f5ffdebb20b8ca672689dbdaee0acc', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `User_ID` int(11) NOT NULL,
  `Content_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`User_ID`, `Content_ID`) VALUES
(1, 9),
(1, 10),
(1, 8),
(1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AuthorID` (`AuthorID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
-- Indexes for table `temporary users`
--
ALTER TABLE `temporary users`
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
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`AuthorID`) REFERENCES `users` (`ID`);

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
