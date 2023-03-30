-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 04:51 PM
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
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `ID` int(11) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Rating` double DEFAULT NULL,
  `Director` varchar(40) DEFAULT NULL,
  `Studio` varchar(40) DEFAULT NULL,
  `Trailer` varchar(300) DEFAULT NULL,
  `Description` varchar(1000) DEFAULT NULL,
  `Cover` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`ID`, `Title`, `Date`, `Rating`, `Director`, `Studio`, `Trailer`, `Description`, `Cover`) VALUES
(1, 'Avatar', '2009-12-16', 7.9, 'James Cameroon', '20th Century Fox', 'https://www.youtube.com/watch?v=5PSNL1qE6VY&pp=ygUOYXZhdGFyIHRyYWlsZXI%3D', 'James Cameron\'s Academy Award®-winning 2009 epic adventure \"Avatar\", returns to theaters September 23 in stunning 4K High Dynamic Range. On the lush alien world of Pandora live the Na\'vi, beings who appear primitive but are highly evolved. Because the planet\'s environment is poisonous, human/Na\'vi hybrids, called Avatars, must link to human minds to allow for free movement on Pandora. Jake Sully (Sam Worthington), a paralyzed former Marine, becomes mobile again through one such Avatar and falls in love with a Na\'vi woman (Zoe Saldana). As a bond with her grows, he is drawn into a battle for the survival of her world.', 'https://m.media-amazon.com/images/M/MV5BYjhiNjBlODctY2ZiOC00YjVlLWFlNzAtNTVhNzM1YjI1NzMxXkEyXkFqcGdeQXVyMjQxNTE1MDA@._V1_.jpg'),
(2, 'The Godfather', '1972-03-24', 9.2, 'Francis Ford Coppola', ' Paramount Pictures', 'https://www.youtube.com/watch?v=UaVTIH8mujA', 'Widely regarded as one of the greatest films of all time, this mob drama, based on Mario Puzo\'s novel of the same name, focuses on the powerful Italian-American crime family of Don Vito Corleone (Marlon Brando). When the don\'s youngest son, Michael (Al Pacino), reluctantly joins the Mafia, he becomes involved in the inevitable cycle of violence and betrayal. Although Michael tries to maintain a normal relationship with his wife, Kay (Diane Keaton), he is drawn deeper into the family business.', 'https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg'),
(3, 'The Dark Knight', '2008-07-16', 9, 'Christopher Nolan', 'Warner Bros. Pictures', 'https://www.youtube.com/watch?v=LDG9bisJEaI', 'With the help of allies Lt. Jim Gordon (Gary Oldman) and DA Harvey Dent (Aaron Eckhart), Batman (Christian Bale) has been able to keep a tight lid on crime in Gotham City. But when a vile young criminal calling himself the Joker (Heath Ledger) suddenly throws the town into chaos, the caped Crusader begins to tread a fine line between heroism and vigilantism.', 'https://m.media-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_.jpg'),
(4, 'Avengers: Endgame', '2019-05-25', 8.4, 'Anthony & Joe Russo', 'Walt Disney Studios Motion Pictures', 'https://www.youtube.com/watch?v=TcMBFSGVi1c', 'Adrift in space with no food or water, Tony Stark sends a message to Pepper Potts as his oxygen supply starts to dwindle. Meanwhile, the remaining Avengers -- Thor, Black Widow, Captain America and Bruce Banner -- must figure out a way to bring back their vanquished allies for an epic showdown with Thanos -- the evil demigod who decimated the planet and the universe.', 'https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_.jpg'),
(5, 'The Lord of the Rings: The Fellowship of the Ring', '2001-12-19', 8.8, 'Peter Jackson', 'New Line Cinema', 'https://www.youtube.com/watch?v=_e8QGuG50ro', 'The future of civilization rests in the fate of the One Ring, which has been lost for centuries. Powerful forces are unrelenting in their search for it. But fate has placed it in the hands of a young Hobbit named Frodo Baggins (Elijah Wood), who inherits the Ring and steps into legend. A daunting task lies ahead for Frodo when he becomes the Ringbearer - to destroy the One Ring in the fires of Mount Doom where it was forged.', 'https://m.media-amazon.com/images/M/MV5BN2EyZjM3NzUtNWUzMi00MTgxLWI0NTctMzY4M2VlOTdjZWRiXkEyXkFqcGdeQXVyNDUzOTQ5MjY@._V1_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tvshows`
--

CREATE TABLE `tvshows` (
  `ID` int(11) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `Status` varchar(15) DEFAULT NULL,
  `Rating` double DEFAULT NULL,
  `Director` varchar(40) DEFAULT NULL,
  `Studio` varchar(40) DEFAULT NULL,
  `Cover` varchar(300) DEFAULT NULL,
  `Trailer` varchar(300) DEFAULT NULL,
  `Description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tvshows`
--

INSERT INTO `tvshows` (`ID`, `Title`, `StartDate`, `Status`, `Rating`, `Director`, `Studio`, `Cover`, `Trailer`, `Description`) VALUES
(1, 'Breaking Bad', '2008-01-20', 'Ended', 9.5, 'Vince Gilligan', 'Albuquerque Studios', 'https://m.media-amazon.com/images/M/MV5BMjEyMzcxNTM5NV5BMl5BanBnXkFtZTcwMDAxOTM4NQ@@._V1_.jpg', 'https://www.youtube.com/watch?v=HhesaQXLuRY', 'Mild-mannered high school chemistry teacher Walter White thinks his life can\'t get much worse. His salary barely makes ends meet, a situation not likely to improve once his pregnant wife gives birth, and their teenage son is battling cerebral palsy. But Walter is dumbstruck when he learns he has terminal cancer. Realizing that his illness probably will ruin his family financially, Walter makes a desperate bid to earn as much money as he can in the time he has left by turning an old RV into a meth lab on wheels.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tvshows`
--
ALTER TABLE `tvshows`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tvshows`
--
ALTER TABLE `tvshows`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
