-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 21, 2023 at 01:41 PM
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
(1, 'The Evolution of Movie Soundtracks', 'Movie soundtracks are an integral part of the film industry. They can set the tone for a scene, evoke emotions, and even become iconic in their own right. Over the years, movie soundtracks have evolved and changed, adapting to new technologies and trends in the music industry.\r\n\r\nIn the early days of cinema, silent films relied on live music to accompany the action on screen. Pianists and small orchestras would play along to the film, providing sound effects and musical accompaniment. As technology advanced, so did the way that soundtracks were created.\r\n\r\nThe introduction of synchronized sound in the late 1920s allowed for more complex soundtracks to be created. Suddenly, films could feature dialogue, sound effects, and music all mixed together. The early soundtracks were often orchestral in nature, with classical music or original scores accompanying the action on screen.', 2, '2023-04-04 15:58:37', '2023-04-22 22:18:59', 'https://www.macmillandictionaryblog.com/wp-content/uploads/2018/04/soundtrack-1024x644.jpg'),
(2, 'Top 10 Must-Watch Movies of All Time', ' Looking for something to watch? Check out our list of the top 10 must-watch movies of all time. From action-packed thrillers to heartwarming dramas, we\'ve got you covered. Grab some popcorn and get ready for a movie marathon you won\'t forget!', 2, '2023-04-22 20:25:38', '2023-04-22 22:19:02', 'https://variety.com/wp-content/uploads/2022/12/100-Greatest-Movies-Variety.jpg?w=1360&h=765&crop=1'),
(3, 'Avatar', 'Amazing.', 2, '2023-04-22 23:15:33', '2023-04-22 23:15:33', 'https://variety.com/wp-content/uploads/2022/12/100-Greatest-Movies-Variety.jpg?w=1360&h=765&crop=1');

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
(10, 'Ant-Man and the Wasp: Quantumania', '2023-12-02', NULL, '6.3', 'https://m.media-amazon.com/images/M/MV5BODZhNzlmOGItMWUyYS00Y2Q5LWFlNzMtM2I2NDFkM2ZkYmE1XkEyXkFqcGdeQXVyMTU5OTA4NTIz._V1_FMjpg_UX1000_.jpg id=', 'https://www.youtube.com/watch?v=ZlNFpri-Y40', 'Super Hero partners Scott Lang and Hope Van Dyne, together with Hope’s parents Hank Pym and Janet Van Dyne, find themselves exploring the Quantum Realm, interacting with strange new creatures and embarking on an adventure that will push them beyond the limits of what they thought was possible.', 'Movie', 125),
(11, 'The Good Place', '2016-09-19', 'Ended', '7.4', 'https://m.media-amazon.com/images/M/MV5BYmMxNjM0NmItNGU1Mi00OGMwLTkzMzctZmE3YjU1ZDE4NmFjXkEyXkFqcGdeQXVyODUxOTU0OTg@._V1_FMjpg_UX1000_.jpg type= type=', 'https://www.youtube.com/watch?v=jDi3fki9IRM', 'Eleanor Shellstrop is an ordinary woman who, through an extraordinary string of events, enters the afterlife where she comes to realize that she hasn\'t been a very good person. With the help of her wise afterlife mentor, she\'s determined to shed her old way of living and discover the awesome (or at least the pretty good) person within.', 'TV Show', NULL),
(12, 'The Mandalorian', '2019-11-12', 'Airing', '8.7', 'https://m.media-amazon.com/images/M/MV5BN2M5YWFjN2YtYzU2YS00NzBlLTgwZWUtYWQzNWFhNDkyYjg3XkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_.jpg', 'https://www.youtube.com/watch?v=Znsa4Deavgg', 'The travels of a lone bounty hunter in the outer reaches of the galaxy, far from the authority of the New Republic.', 'TV Show', NULL),
(13, 'Chicken Run', '2000-06-21', NULL, '9.9', 'https://m.media-amazon.com/images/M/MV5BNDgxNjZlZDYtZGJmZC00Mjg0LWEwYzctYWQ0MWFjNTM3ZmM4XkEyXkFqcGdeQXVyNTM5NzI0NDY@._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=AEOfT7hUcDs', 'When a cockerel apparently flies into a chicken farm, the chickens see him as an opportunity to escape their evil owners.', 'Movie', 84),
(14, 'Deck the Halls', '2006-11-22', NULL, '8.7', 'https://m.media-amazon.com/images/M/MV5BMTIzNjA4OTM0OV5BMl5BanBnXkFtZTcwMDgwODkzMQ@@._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=g1A2uWWF1ZU', 'Two neighbors have it out after one of them decorates his house for the holidays so brightly that it can be seen from space.', 'Movie', 93),
(15, 'Barbie as the Island Princess', '2007-09-18', NULL, '7.2', 'https://m.media-amazon.com/images/I/510Z90rEuHL._AC_.jpg', 'https://www.youtube.com/watch?v=0z_WwoRHHUc', 'After a violent storm, Sagi, a wise red panda and Azul, a flamboyant peacock discover that a six-year-old girl has been shipwrecked on their island. They and a baby elephant named Tika, decide to help her. Over time, she learns to talk to animals, but fails to remember anything about her past before the shipwreck, including her name after Ro. Her only clues are a battered trunk with a broken nameplate \"Ro\" and a shredded flag with a white rose.', 'Movie', 86),
(16, 'Dr. Dolittle', '1998-06-22', NULL, '7.5', 'https://m.media-amazon.com/images/M/MV5BNGVmYjI4ZjktMjVkNi00ZTRlLWJlYTMtNzMxYjQ0ZDIyZWNmXkEyXkFqcGdeQXVyNTUyMzE4Mzg@._V1_.jpg', 'https://www.youtube.com/watch?v=LWbtxG-jXMY', 'In early Victorian period, Matthew Mugg (Anthony Newley) takes his young friend Tommy Stubbins (William Dix) to visit eccentric Doctor John Dolittle (Rex Harrison) for an injured duck that Matthew had acquired from a local fisherman. Dolittle, a former medical doctor, lives with an extended menagerie, including a Common chimpanzee named Chee-Chee, a dog named Jip, and a talking parrot named Polynesia (the uncredited voice of Ginny Tyler). Dolittle claims that he can talk to animals.', 'Movie', 85),
(17, 'Game Shakers', '2019-09-12', 'Ended', '7.7', 'https://m.media-amazon.com/images/M/MV5BMzY0Nzg5ODAtMDliNC00OTlhLWFlNDItODAxMmFkY2FiZmVhXkEyXkFqcGdeQXVyODk4Nzg5NjE@._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=rCVLzNCF534', 'A live-action sitcom about two 12-year-old girls who start a multi-million-dollar gaming company and take on rap superstar Double G as a business partner.', 'TV Show', NULL),
(18, 'Zig & Sharko', '2010-02-11', 'Ended', '8.2', 'https://m.media-amazon.com/images/M/MV5BYmRhN2I1YTItMTQ0Yi00ZmUzLThkZWItZGY1NzljMGNiZGY5XkEyXkFqcGdeQXVyMTMxODU3NzM@._V1_.jpg', 'https://www.youtube.com/watch?v=YizT9yU194s', 'Marina, a pretty little mermaid perched on a rock in the deep blue sea. Zig, a starving hyena on the island next door. With the help of his side-kick crab buddy, Bernie, they try to do anything to get his paws on Marina. But in the lagoon between them, lies Sharko: a shark who is in love with Marina, always ready to ruin the hyena’s crazy schemes to reach his prey.\r\n\r\n', 'TV Show', NULL),
(19, 'Avengers: Infinity War', '2018-04-27', NULL, '8.4', 'https://m.media-amazon.com/images/M/MV5BMjMxNjY2MDU1OV5BMl5BanBnXkFtZTgwNzY1MTUwNTM@._V1_.jpg', 'https://www.youtube.com/watch?v=6ZfuNTqbHE8', 'The Avengers and their allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe.', 'Movie', 149),
(20, 'Avengers: Endgame', '2019-04-26', NULL, '8.4', 'https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_.jpg', 'https://www.youtube.com/watch?v=TcMBFSGVi1c', 'The remaining Avengers must gather once more to reverse the damage caused by Thanos and restore order to the universe.', 'Movie', 181),
(21, 'The Dark Knight', '2008-07-18', NULL, '9.0', 'https://m.media-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=EXeTwQWrcwY', 'Batman, along with the help of Lieutenant Jim Gordon and District Attorney Harvey Dent, sets out to dismantle the remaining criminal organizations that plague the city of Gotham.', 'Movie', 152),
(22, 'Money Heist', '2017-05-02', 'Ended', '8.2', 'https://m.media-amazon.com/images/M/MV5BMDQ2YjVmYTktMWM2ZS00MzM5LWE4MDgtNWE0ZTJjNmU5NjJlXkEyXkFqcGdeQXVyMTA3MzQ4MTc0._V1_.jpg', 'https://www.youtube.com/watch?v=_InqQJRqGW4', 'A criminal mastermind known as \"The Professor\" recruits a group of eight criminals to carry out an ambitious plan to rob the Royal Mint of Spain, resulting in a tense hostage situation.', 'TV Show', NULL),
(23, 'Prison Break', '2005-08-29', 'Ended', '8.3', 'https://m.media-amazon.com/images/M/MV5BMjE0ODQxNjI2MV5BMl5BanBnXkFtZTYwNTgzMzg3._V1_.jpg', 'https://www.youtube.com/watch?v=AL9zLctDJaU', 'A structural engineer, Michael Scofield, devises an elaborate plan to help his brother, Lincoln Burrows, escape death row and prove his innocence.', 'TV Show', NULL),
(24, 'Lucifer', '2016-01-25', 'Ongoing', '8.1', 'https://m.media-amazon.com/images/M/MV5BNDJjMzc4NGYtZmFmNS00YWY3LThjMzQtYzJlNGFkZGRiOWI1XkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=X4bF_quwNtw', 'Lucifer Morningstar, a former angel is bored and unhappy as the Lord of Hell. He abdicates his throne and becomes a consultant for the Los Angeles Police Department, using his supernatural abilities to help solve crimes.', 'TV Show', NULL),
(25, 'Arrow', '2012-10-10', 'Ended', '7.5', 'https://m.media-amazon.com/images/M/MV5BMTI0NTMwMDgtYTMzZC00YmJhLTg4NzMtMTc1NjI4MWY4NmQ4XkEyXkFqcGdeQXVyNTY3MTYzOTA@._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=_a3dNB2riKE', 'Billionaire playboy Oliver Queen, becomes the vigilante archer known as Green Arrow to fight crime and corruption in Starling City.', 'TV Show', NULL),
(26, 'Young Justice', '2010-11-26', 'Ended', '8.6', 'https://m.media-amazon.com/images/M/MV5BMTAwYzE4NzItY2Q3Zi00NjRmLWE5ZTAtMDM5OWIyMmQ3MTFlXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=5lqHdKV8lBc', 'The lives of teenage superheroes as they deal with personal and professional relationships and face off against various villains and threats.', 'TV Show', NULL),
(27, 'Cruella', '2021-05-28', NULL, '7.3', 'https://m.media-amazon.com/images/M/MV5BZWQ1YjNiMTItZjkwZS00NDMyLThiOWEtNzBkMzAzMWU2ZDUwXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg', 'https://www.youtube.com/watch?v=gmRKv7n2If8', 'The film serves as a prequel to the 1961 animated film \"One Hundred and One Dalmatians\" and focuses on the young Cruella de Vil and her transformation into the iconic Disney villain.', 'Movie', 134),
(28, 'Batman Ninja', '2018-04-24', NULL, '5.6', 'https://m.media-amazon.com/images/M/MV5BMjJlMmI5YzAtNzY4YS00YzMzLTk0ZDAtMjUwMWU0OTdhYTkzXkEyXkFqcGdeQXVyMDEyMDU1Mw@@._V1_.jpg', 'https://www.youtube.com/watch?v=CwPFxcefpdU', 'The film follows Batman as he is transported to feudal Japan and must rely on his intelligence and martial arts skills to stop the Joker and other villains who have taken over the country.', 'Movie', 85),
(29, 'Batman: Hush', '2019-07-19', NULL, '6.9', 'https://m.media-amazon.com/images/M/MV5BNmNmMWM4MGItZmFjMy00YTMxLTg1MzMtODM1OWZiNTYzMDRkXkEyXkFqcGdeQXVyMTEyNzgwMDUw._V1_.jpg', 'https://www.youtube.com/watch?v=cQFFnUg0u70', 'Batman must uncover the identity of a mysterious villain known as Hush, who is determined to destroy both Batman and Bruce Wayne.', 'Movie', 82),
(30, 'Vikings', '2013-03-03', 'Ended', '8.5', 'https://m.media-amazon.com/images/M/MV5BODk4ZjU0NDUtYjdlOS00OTljLTgwZTUtYjkyZjk1NzExZGIzXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=9GgxinPwAGc', 'Vikings follows the adventures of Ragnar Lothbrok, the greatest hero of his age. The series tells the tales of Ragnar\'s band of Viking brothers and his family, as he rises to become King of the Viking tribes.', 'TV Show', NULL),
(31, 'The Boys', '2019-07-26', 'Ongoing', '8.7', 'https://m.media-amazon.com/images/M/MV5BOTEyNDJhMDAtY2U5ZS00OTMzLTkwODktMjU3MjFkZWVlMGYyXkEyXkFqcGdeQXVyMjkwOTAyMDU@._V1_.jpg', 'https://www.youtube.com/watch?v=M1bhOaLV4FU', 'A group of vigilantes are determined to expose the corrupt superheroes who abuse their superpowers.', 'TV Show', NULL),
(32, 'The Flash', '2014-10-07', 'Ended', '7.6', 'https://m.media-amazon.com/images/M/MV5BZjlkM2RjODgtNjRlYS00MDNjLTkxMzYtOWM4NjAwZTY2MjZiXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=IgVyroQjZbE', 'A forensic scientist gains superhuman speed after being struck by lightning. He uses his newfound abilities to protect Central City from various threats.', 'TV Show', NULL),
(33, 'Titans', '2018-10-12', 'Ended', '7.7', 'https://m.media-amazon.com/images/M/MV5BNjY4MTE3MWYtYzU3YS00Y2UxLTk2NDMtMjJlODk2MzBmOTdiXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=iH44Z0QwrWQ', 'A group of young superheroes led by Dick Grayson (Robin), join forces to combat evil and protect their city. The series features characters from the DC Comics universe.', 'TV Show', NULL),
(34, 'Fantastic Four: World\'s Greatest Heroes', '2006-09-02', 'Ended', '6.5', 'https://m.media-amazon.com/images/M/MV5BNTAwZjI1ZWUtZjEyOS00ZTAwLWEzYmItMjQ3OWYyYmI2ZTI4XkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_.jpg', 'https://www.youtube.com/watch?v=OUzeXnZ78VY', 'The adventures of Marvel\'s superhero team, The Fantastic Four, who use their powers to protect Earth from various threats.', 'TV Show', NULL),
(35, 'The Walking Dead', '2010-10-31', 'Ended', '8.2', 'https://m.media-amazon.com/images/M/MV5BOTUwODI0ODE3OF5BMl5BanBnXkFtZTcwNjQ3NTM0OA@@._V1_.jpg', 'https://www.youtube.com/watch?v=sfAc2U20uyg', 'A group of survivors must navigate a world overrun by zombies, known as \"walkers,\" and the challenges they face in their quest for safety.', 'TV Show', NULL),
(36, 'Dune', '2021-10-22', NULL, '8.4', 'https://m.media-amazon.com/images/M/MV5BZjgxNWNiMGItMDQzYi00MGU4LTgyN2YtNzU3ODMwNWNlMmRjXkEyXkFqcGdeQXVyNzU3Nzk4MDQ@._V1_.jpg', 'https://www.youtube.com/watch?v=n9xhJrPXop4', 'The story of Paul Atreides, a young nobleman, as he navigates political intrigue and battles for control of a desert planet called Arrakis.', 'Movie', 155),
(37, 'Joker', '2019-10-04', NULL, '8.4', 'https://m.media-amazon.com/images/M/MV5BNGVjNWI4ZGUtNzE0MS00YTJmLWE0ZDctN2ZiYTk2YmI3NTYyXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=zAGVQLHvwOY', 'Joker is a psychological thriller film that delves into the origins of the iconic Batman villain, the Joker. It explores the transformation of Arthur Fleck, a failed stand-up comedian, into the criminal mastermind known as the Joker.', 'Movie', 122),
(38, 'It', '2017-09-08', NULL, '7.3', 'https://m.media-amazon.com/images/M/MV5BZDVkZmI0YzAtNzdjYi00ZjhhLWE1ODEtMWMzMWMzNDA0NmQ4XkEyXkFqcGdeQXVyNzYzODM3Mzg@._V1_.jpg', 'https://www.youtube.com/watch?v=7no56Zw1e20', 'A group of children in a small town must confront an ancient evil entity that takes the form of a clown called Pennywise.', 'Movie', 135),
(39, 'It Chapter Two', '2019-09-06', NULL, '6.5', 'https://m.media-amazon.com/images/M/MV5BYTJlNjlkZTktNjEwOS00NzI5LTlkNDAtZmEwZDFmYmM2MjU2XkEyXkFqcGdeQXVyNjg2NjQwMDQ@._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=zqUopiAYdRg', 'It Chapter Two is the sequel to the film It. Set 27 years after the events of the first film, it follows the adult versions of the characters as they return to their hometown to confront Pennywise once again.', 'Movie', 169),
(40, 'Puss in Boots: The Last Wish', '2022-12-21', NULL, '7.2', 'https://m.media-amazon.com/images/M/MV5BNjMyMDBjMGUtNDUzZi00N2MwLTg1MjItZTk2MDE1OTZmNTYxXkEyXkFqcGdeQXVyMTQ5NjA0NDM0._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=RqrXhwS33yc', 'Puss in Boots: The Last Wish is an animated adventure film featuring the popular character from the Shrek franchise. Puss in Boots embarks on a perilous journey to find the Last Wish and save his hometown from disaster.', 'Movie', 99),
(41, 'Top Gun: Maverick', '2022-05-27', NULL, '8.3', 'https://m.media-amazon.com/images/M/MV5BZWYzOGEwNTgtNWU3NS00ZTQ0LWJkODUtMmVhMjIwMjA1ZmQwXkEyXkFqcGdeQXVyMjkwOTAyMDU@._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=qSqVVswa420', 'The story of Pete \\\"Maverick\\\" Mitchell, a daring fighter pilot, as he navigates the challenges of a rapidly evolving world of aerial combat.', 'Movie', 130),
(42, 'Friends', '1994-09-22', 'Ended', '8.9', 'https://flxt.tmsimg.com/assets/p7892602_b_v7_aq.jpg', 'https://www.youtube.com/watch?v=LTpmw0Ac6Zs', 'Rachel Green, Ross Geller, Monica Geller, Joey Tribbiani, Chandler Bing and Phoebe Buffay are six 20 something year-olds, living off one another in the heart of New York City. Over the course of ten years, this average group of buddies goes through massive mayhem, family trouble, past and future romances, fights, laughs, tears and surprises as they learn what it really means to be a friend.', 'TV Show', NULL),
(43, 'How I Met Your Mother', '2005-02-19', 'Ended', '8.3', 'https://w0.peakpx.com/wallpaper/232/450/HD-wallpaper-himym-how-i-met-your-mother-show.jpg', 'https://www.youtube.com/watch?v=cjJLEYMzpjc', 'A father tells his children, through a series of flashbacks, the journey that he and his four best friends undertook, which would lead him to meet their mother.', 'TV Show', NULL),
(44, 'The Office', '2005-03-24', 'Ended', '9.0', 'https://www.dmarge.com/wp-content/uploads/streaming/393318780dg9e5fPRRId8PoBE0F6jl5y85Eu.jpg', 'https://www.youtube.com/watch?v=tNcDHWpselE', 'A mockumentary on a group of typical office workers, where the workday consists of ego clashes, inappropriate behavior, and tedium.', 'TV Show', NULL),
(45, 'The Big Bang Theory', '2007-09-24', 'Ended', '8.2', 'https://m.media-amazon.com/images/M/MV5BY2FmZTY5YTktOWRlYy00NmIyLWE0ZmQtZDg2YjlmMzczZDZiXkEyXkFqcGdeQXVyNjg4NzAyOTA@._V1_.jpg', 'https://www.youtube.com/watch?v=rCj-Fb1OmXg', 'A woman who moves into an apartment across the hall from two brilliant but socially awkward physicists shows them how little they know about life outside of the laboratory.', 'TV Show', NULL),
(46, 'Wandavision', '2021-01-15', 'Ended', '7.9', 'https://m.media-amazon.com/images/M/MV5BZGEwYmMwZmMtMTQ3MS00YWNhLWEwMmQtZTU5YTIwZmJjZGQ0XkEyXkFqcGdeQXVyMTI5MzA5MjA1._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=sj9J2ecsSpo', 'Wanda Maximoff and Vision—two super-powered beings living idealized suburban lives—begin to suspect that everything is not as it seems.', 'TV Show', NULL),
(47, 'Loki', '2021-09-06', 'Airing', '8.2', 'https://m.media-amazon.com/images/M/MV5BNTkwOTE1ZDYtODQ3Yy00YTYwLTg0YWQtYmVkNmFjNGZlYmRiXkEyXkFqcGdeQXVyNTc4MjczMTM@._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=nW948Va-l10', 'The mercurial villain Loki resumes his role as the God of Mischief.', 'TV Show', NULL),
(48, 'Stranger Things', '2017-07-15', 'Airing', '8.7', 'https://m.media-amazon.com/images/M/MV5BN2EyZWIwYjItZWM2Mi00YzM1LWFhYzQtZGZmYzlhNWZkYWQyXkEyXkFqcGdeQXVyNDI0MTA5NTE@._V1_.jpg', 'https://www.youtube.com/watch?v=b9EkMc79ZSU', 'In 1980s Indiana, a group of young friends witness supernatural forces and secret government exploits. As they search for answers, the children unravel a series of extraordinary mysteries.', 'TV Show', NULL);

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
(18, 'Olivier Jean-Marie'),
(19, 'Joe Russo, Anthony Russo'),
(20, 'Joe Russo, Anthony Russo'),
(21, 'Christopher Nolan'),
(22, 'Álex Pina'),
(23, 'Paul Scheuring'),
(24, 'Tom Kapinos'),
(25, 'Greg Berlanti, Marc Guggenheim'),
(26, 'Greg Weisman, Brandon Vietti'),
(27, 'Craig Gillespie'),
(28, 'Junpei Mizusaki'),
(29, 'Justin Copeland'),
(30, 'Michael Hirst'),
(31, 'Eric Kripke'),
(32, 'Eric Wallace'),
(33, 'Carol Banker'),
(34, 'Franck Michel'),
(35, 'Greg Nicotero'),
(36, 'Denis Villeneuve'),
(37, 'Todd Phillips'),
(38, 'Andy Muschietti'),
(39, 'Andy Muschietti'),
(40, 'Joel Crawford'),
(41, 'Joseph Kosinski'),
(42, 'Kevin S. Bright'),
(43, 'Pamela Fryman'),
(44, 'Paul Lieberstein'),
(45, 'Mark Cendrowski'),
(46, 'Matt Shakman'),
(47, 'Kate Herron'),
(48, 'Matt and Ross Duffer');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `ID` int(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`ID`, `email`, `title`, `question`) VALUES
(4, 'blendizeqiri@hotmail.com', 'COOL', 'how cool is it');

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
(18, 'Romance'),
(19, 'Action'),
(19, 'Adventure'),
(19, 'Fantasy'),
(19, 'Science Fiction'),
(20, 'Action'),
(20, 'Adventure'),
(20, 'Drama'),
(20, 'Science Fiction'),
(21, 'Action'),
(21, 'Crime'),
(21, 'Drama'),
(22, 'Action'),
(22, 'Crime'),
(22, 'Drama'),
(22, 'Mystery'),
(22, 'Thriller'),
(23, 'Action'),
(23, 'Crime'),
(23, 'Drama'),
(23, 'Mystery'),
(23, 'Suspense'),
(23, 'Thriller'),
(24, 'Comedy'),
(24, 'Crime'),
(24, 'Drama'),
(24, 'Fantasy'),
(25, 'Action'),
(25, 'Adventure'),
(25, 'Crime'),
(25, 'Drama'),
(25, 'Mystery'),
(25, 'Science Fiction'),
(26, 'Action'),
(26, 'Adventure'),
(26, 'Animation'),
(26, 'Children'),
(26, 'Crime'),
(26, 'Drama'),
(26, 'Romance'),
(26, 'Science Fiction'),
(27, 'Comedy'),
(27, 'Crime'),
(28, 'Action'),
(28, 'Animation'),
(29, 'Animation'),
(29, 'Crime'),
(30, 'Action'),
(30, 'Adventure'),
(30, 'Drama'),
(30, 'History'),
(30, 'Romance'),
(30, 'War'),
(31, 'Action'),
(31, 'Comedy'),
(31, 'Crime'),
(31, 'Drama'),
(31, 'Science Fiction'),
(32, 'Action'),
(32, 'Adventure'),
(32, 'Drama'),
(32, 'Science Fiction'),
(33, 'Action'),
(33, 'Adventure'),
(33, 'Drama'),
(33, 'Fantasy'),
(33, 'Science Fiction'),
(34, 'Action'),
(34, 'Adventure'),
(34, 'Animation'),
(34, 'Family'),
(34, 'Science Fiction'),
(35, 'Adventure'),
(35, 'Drama'),
(35, 'Horror'),
(35, 'Thriller'),
(36, 'Action'),
(36, 'Drama'),
(36, 'Science Fiction'),
(37, 'Crime'),
(37, 'Drama'),
(37, 'Thriller'),
(38, 'Horror'),
(39, 'Drama'),
(39, 'Fantasy'),
(39, 'Horror'),
(40, 'Adventure'),
(40, 'Animation'),
(40, 'Comedy'),
(40, 'Family'),
(41, 'Action'),
(41, 'Drama'),
(42, 'Comedy'),
(43, 'Comedy'),
(43, 'Romance'),
(44, 'Comedy'),
(45, 'Comedy'),
(45, 'Romance'),
(46, 'Action'),
(46, 'Adventure'),
(46, 'Comedy'),
(46, 'Drama'),
(46, 'Fantasy'),
(46, 'Science Fiction'),
(47, 'Action'),
(47, 'Adventure'),
(47, 'Drama'),
(47, 'Fantasy'),
(47, 'Mystery'),
(47, 'Science Fiction'),
(48, 'Adventure'),
(48, 'Drama'),
(48, 'Fantasy'),
(48, 'Horror'),
(48, 'Science Fiction'),
(48, 'Thriller');

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
(18, 'Canal+ Family '),
(19, 'Marvel Studios'),
(20, 'Marvel Studios'),
(21, 'Warner Bros. Pictures'),
(22, 'Netflix'),
(23, 'Fox'),
(24, 'Warner Bros. Television'),
(25, 'Warner Bros. Television'),
(26, 'DC Comics'),
(27, 'Walt Disney Pictures'),
(28, 'Warner Bros. Animation'),
(29, 'Warner Bros. Animation'),
(30, 'MGM Television'),
(31, 'Amazon Studios'),
(32, 'The CW'),
(33, 'Warner Bros. Television'),
(34, 'Marvel Studios'),
(35, 'AMC Studios'),
(36, 'Legendary Pictures'),
(37, 'Warner Bros. Pictures'),
(38, 'New Line Cinema'),
(39, 'New Line Cinema'),
(40, 'DreamWorks Animation'),
(41, 'Paramount Pictures'),
(42, 'Warner Bros. Studios'),
(43, 'Soundstage Studio 22'),
(44, 'Universal Television'),
(45, 'Warner Bros. Studios'),
(46, 'Marvel Studios'),
(47, 'Marvel Studios'),
(48, 'Netflix');

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
  `ActToken` varchar(255) NOT NULL,
  `Created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Eljon', 'Shala', '2003-06-08', 'eljohn7', 'eljon.sh@gmail.com', '50d53937402ef9f8730d53f1089ad8bea2f5ffdebb20b8ca672689dbdaee0acc', 'assets/img/user_pic/eljohn7.png', 1),
(2, 'Bleron', 'Morina', '2004-02-12', 'bleronmorina', 'bleronmorina54@gmail.com', '50d53937402ef9f8730d53f1089ad8bea2f5ffdebb20b8ca672689dbdaee0acc', 'assets/img/user_pic/bleronmorina', 1),
(3, 'Blendi', 'Zeqiri', '2003-11-07', '999BZ', 'blendizeqiri@hotmail.com', '50d53937402ef9f8730d53f1089ad8bea2f5ffdebb20b8ca672689dbdaee0acc', 'assets/img/user_pic/default.png', 1),
(4, 'Blendi', 'Zeqiri', '2003-07-11', 'BZ', 'zeqiriblendi@gmail.com', '50d53937402ef9f8730d53f1089ad8bea2f5ffdebb20b8ca672689dbdaee0acc', 'assets/img/user_pic/default.png', 0);

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
(1, 8),
(1, 2),
(1, 3),
(1, 4),
(1, 10),
(1, 12),
(1, 19),
(1, 20),
(1, 21),
(1, 27),
(1, 28),
(1, 29),
(3, 10);

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
-- Indexes for table `faq`
--
ALTER TABLE `faq`
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
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `delete_expired_temp_users` ON SCHEDULE EVERY 7 MINUTE STARTS '2023-05-04 21:22:18' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM temporary_users WHERE TIMESTAMPDIFF(MINUTE, created_at, NOW()) > 10$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
