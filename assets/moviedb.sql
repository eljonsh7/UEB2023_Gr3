-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 10, 2023 at 02:34 PM
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
  `Director` varchar(255) DEFAULT NULL,
  `Studio` varchar(255) DEFAULT NULL,
  `Cover` varchar(255) DEFAULT NULL,
  `Trailer` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Genre` varchar(255) DEFAULT NULL,
  `Type` varchar(10) DEFAULT NULL,
  `Length` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`ID`, `Title`, `Date`, `Status`, `Rating`, `Director`, `Studio`, `Cover`, `Trailer`, `Description`, `Genre`, `Type`, `Length`) VALUES
(1, 'Breaking Bad', '2008-01-20', 'Ended', '9.5', 'Vince Gilligan', 'Albuquerque Studios', 'https://m.media-amazon.com/images/M/MV5BMjEyMzcxNTM5NV5BMl5BanBnXkFtZTcwMDAxOTM4NQ@@._V1_.jpg', 'https://www.youtube.com/watch?v=HhesaQXLuRY', 'Mild-mannered high school chemistry teacher Walter White thinks his life can\'t get much worse. His salary barely makes ends meet, a situation not likely to improve once his pregnant wife gives birth, and their teenage son is battling cerebral palsy. But Walter is dumbstruck when he learns he has terminal cancer. Realizing that his illness probably will ruin his family financially, Walter makes a desperate bid to earn as much money as he can in the time he has left by turning an old RV into a meth lab on wheels.', 'Crime Drama Suspense Thriller', 'TV Show', 62),
(2, 'The Shawshank Redemption', '1994-09-23', 'Released', '9.3', 'Frank Darabont', 'Castle Rock Entertainment', 'https://m.media-amazon.com/images/M/MV5BNDE3ODcxYzMtY2YzZC00NmNlLWJiNDMtZDViZWM2MzIxZDYwXkEyXkFqcGdeQXVyNjAwNDUxODI@._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=6hB3S9bIaco', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 'Drama', 'Movie', 142),
(3, 'Game of Thrones', '2011-04-17', 'Ended', '9.2', 'David Benioff, D. B. Weiss', 'HBO', 'https://m.media-amazon.com/images/M/MV5BYTRiNDQwYzAtMzVlZS00NTI5LWJjYjUtMzkwNTUzMWMxZTllXkEyXkFqcGdeQXVyNDIzMzcwNjc@._V1_.jpg', 'https://www.youtube.com/watch?v=rlR4PJn8b8I', 'Nine noble families fight for control over the lands of Westeros, while an ancient enemy returns after being dormant for millennia.', 'Action, Adventure, Drama', 'TV Show', 73),
(4, 'Stranger Things', '2016-07-15', 'Ongoing', '8.7', 'The Duffer Brothers', 'Netflix', 'https://m.media-amazon.com/images/M/MV5BMDZkYmVhNjMtNWU4MC00MDQxLWE3MjYtZGMzZWI1ZjhlOWJmXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg', 'https://www.youtube.com/watch?v=XWxyRG_tckY', 'When a young boy disappears, his mother, a police chief and his friends must confront terrifying supernatural forces in order to get him back.', 'Drama, Fantasy, Horror', 'TV Show', 51),
(5, 'asd', '2023-12-01', NULL, '4.5', 'qazim', 'Marvel Studios', 'https://m.media-amazon.com/images/M/MV5BMTg1MTY2MjYzNV5BMl5BanBnXkFtZTgwMTc4NTMwNDI@._V1_.jpg', 'https://youtu.be/xjDjIWPwcPU', 'sadfasdf', ' Action Adventure Sci-Fi', 'Movie', 135),
(6, 'Avatar', '2009-12-16', 'Released', '7.9', 'James Cameroon', '20th Century Fox', 'https://m.media-amazon.com/images/M/MV5BZDA0OGQxNTItMDZkMC00N2UyLTg3MzMtYTJmNjg3Nzk5MzRiXkEyXkFqcGdeQXVyMjUzOTY1NTc@._V1_.jpg', 'https://www.youtube.com/watch?v=aVdO-cx-McA', 'James Cameron\'s Academy Award®-winning 2009 epic adventure \"Avatar\", returns to theaters September 23 in stunning 4K High Dynamic Range. On the lush alien world of Pandora live the Na\'vi, beings who appear primitive but are highly evolved. Because the planet\'s environment is poisonous, human/Na\'vi hybrids, called Avatars, must link to human minds to allow for free movement on Pandora. Jake Sully (Sam Worthington), a paralyzed former Marine, becomes mobile again through one such Avatar and falls in love with a Na\'vi woman (Zoe Saldana). As a bond with her grows, he is drawn into a battle for the survival of her world.', 'Action Adventure Fantasy Science Fiction', 'Movie', 162),
(7, 'The Godfather', '1972-03-24', 'Released', '9.2', 'Francis Ford Coppola', ' Paramount Pictures', 'https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg', 'https://www.youtube.com/watch?v=UaVTIH8mujA', 'Widely regarded as one of the greatest films of all time, this mob drama, based on Mario Puzo\'s novel of the same name, focuses on the powerful Italian-American crime family of Don Vito Corleone (Marlon Brando). When the don\'s youngest son, Michael (Al Pacino), reluctantly joins the Mafia, he becomes involved in the inevitable cycle of violence and betrayal. Although Michael tries to maintain a normal relationship with his wife, Kay (Diane Keaton), he is drawn deeper into the family business.', 'Crime Drama', 'Movie', 179),
(8, 'The Dark Knight', '2008-07-16', 'Released', '9.0', 'Christopher Nolan', 'Warner Bros. Pictures', 'https://m.media-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_.jpg', 'https://www.youtube.com/watch?v=LDG9bisJEaI', 'With the help of allies Lt. Jim Gordon (Gary Oldman) and DA Harvey Dent (Aaron Eckhart), Batman (Christian Bale) has been able to keep a tight lid on crime in Gotham City. But when a vile young criminal calling himself the Joker (Heath Ledger) suddenly throws the town into chaos, the caped Crusader begins to tread a fine line between heroism and vigilantism.', 'Action Crime Drama', 'Movie', 152),
(9, 'Avengers: Endgame', '2019-05-25', 'Released', '8.4', 'Anthony & Joe Russo', 'Walt Disney Studios Motion Pictures', 'https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_.jpg', 'https://www.youtube.com/watch?v=TcMBFSGVi1c', 'Adrift in space with no food or water, Tony Stark sends a message to Pepper Potts as his oxygen supply starts to dwindle. Meanwhile, the remaining Avengers -- Thor, Black Widow, Captain America and Bruce Banner -- must figure out a way to bring back their vanquished allies for an epic showdown with Thanos -- the evil demigod who decimated the planet and the universe.', 'Action Adventure Drama Science Fiction', 'Movie', 181),
(10, 'The Lord of the Rings: The Fellowship of the Ring', '2001-12-19', 'Released', '8.8', 'Peter Jackson', 'New Line Cinema', 'https://m.media-amazon.com/images/M/MV5BN2EyZjM3NzUtNWUzMi00MTgxLWI0NTctMzY4M2VlOTdjZWRiXkEyXkFqcGdeQXVyNDUzOTQ5MjY@._V1_.jpg', 'https://www.youtube.com/watch?v=_e8QGuG50ro', 'The future of civilization rests in the fate of the One Ring, which has been lost for centuries. Powerful forces are unrelenting in their search for it. But fate has placed it in the hands of a young Hobbit named Frodo Baggins (Elijah Wood), who inherits the Ring and steps into legend. A daunting task lies ahead for Frodo when he becomes the Ringbearer - to destroy the One Ring in the fires of Mount Doom where it was forged.', 'Action Adventure Drama Fantasy', 'Movie', 228),
(11, 'Avengers: Infinity War', '2018-04-27', 'Released', '8.4', 'Anthony & Joe Russo;', 'Walt Disney Studios Motion Pictures', 'https://m.media-amazon.com/images/M/MV5BMjMxNjY2MDU1OV5BMl5BanBnXkFtZTgwNzY1MTUwNTM@._V1_.jpg', 'https://www.youtube.com/watch?v=6ZfuNTqbHE8', 'In Avengers: Infinity War, the Marvel superheroes team up to stop the powerful villain Thanos from acquiring all six Infinity Stones, which would give him the power to destroy half the universe with a snap of his fingers. The Avengers travel to different parts of the galaxy to prevent Thanos from completing his mission, but they suffer heavy losses in the process. The movie ends on a cliffhanger as Thanos successfully acquires all the stones and snaps his fingers, causing many of the heroes to turn to dust.', 'Action\r\nAdventure\r\nFantasy\r\nScience Fiction', 'Movie', 149);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(15) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `Admin` tinyint(1) NOT NULL,
  `Active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Email`, `Password`, `Admin`, `Active`) VALUES
(1, 'eljohn7', 'eljon.sh@gmail.com', 'Milton77', 1, 1),
(2, 'bleronmorina', 'bleronmorina54@gmail.com', 'Milton77', 0, 0);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
