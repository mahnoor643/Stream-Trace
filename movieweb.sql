-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 04:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movieweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(100) DEFAULT NULL,
  `adminEmail` varchar(100) DEFAULT NULL,
  `adminPwd` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminID`, `adminName`, `adminEmail`, `adminPwd`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contactID` int(11) NOT NULL,
  `Msg` text DEFAULT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(11) NOT NULL,
  `feedbackMsg` text DEFAULT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `moviefavlist`
--

CREATE TABLE `moviefavlist` (
  `movieFavID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `MovieID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `MovieID` int(11) NOT NULL,
  `MovieName` varchar(100) DEFAULT NULL,
  `MovieCategory` int(11) DEFAULT NULL,
  `MovieBy` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `MovieTitleImg` varchar(150) DEFAULT NULL,
  `MovieTitleImgType` varchar(100) DEFAULT NULL,
  `movieType` varchar(100) DEFAULT NULL,
  `moviePath` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`MovieID`, `MovieName`, `MovieCategory`, `MovieBy`, `status`, `MovieTitleImg`, `MovieTitleImgType`, `movieType`, `moviePath`) VALUES
(4, '6 Underground', 1, 4, 1, 'shared/MoviesTitleImages/MV5BNzE2ZjQxNjEtNmI2ZS00ZmU0LTg4M2YtYzVhYmRiYWU0YzI1XkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg', 'image/jpeg', 'video/mp4', 'shared/Movies/videoplayback.mp4'),
(5, 'Barbie', 1, 4, 1, 'shared/MoviesTitleImages/iuFNMS8U5cb6xfzi51Dbkovj7vM.jpg', 'image/jpeg', 'video/mp4', 'shared/Movies/videoplayback.mp4'),
(6, 'Stranger Things', 1, 4, 1, 'shared/MoviesTitleImages/stranger-things-one-sheet-season-2-i67844.jpg', 'image/jpeg', 'video/mp4', 'shared/Movies/videoplayback.mp4'),
(7, 'Money Heist', 1, 4, 1, 'shared/MoviesTitleImages/reEMJA1uzscCbkpeRJeTT2bjqUp.jpg', 'image/jpeg', 'video/mp4', 'shared/Movies/videoplayback.mp4'),
(8, 'Oppenheimer', 1, 4, 1, 'shared/MoviesTitleImages/william-j-harris-oppenheimer-movie-poster-2023.jpg', 'image/jpeg', 'video/mp4', 'shared/Movies/videoplayback.mp4'),
(9, 'Peaky Blinders', 1, 3, 1, 'shared/MoviesTitleImages/e60d59103015959.5f43f7d599ad9.jpg', 'image/jpeg', 'video/mp4', 'shared/Movies/videoplayback.mp4'),
(10, 'Frozen', 1, 3, 1, 'shared/MoviesTitleImages/p_frozen2_19644_4c4b423d.jpeg', 'image/jpeg', 'video/mp4', 'shared/Movies/videoplayback.mp4'),
(11, 'Ice Age 4', 1, 3, 1, 'shared/MoviesTitleImages/MV5BMTM3NDM5MzY5Ml5BMl5BanBnXkFtZTcwNjExMDUwOA@@._V1_.jpg', 'image/jpeg', 'video/mp4', 'shared/Movies/videoplayback.mp4'),
(12, 'Mission Impossible', 1, 3, 1, 'shared/MoviesTitleImages/MV5BMTY4MTUxMjQ5OV5BMl5BanBnXkFtZTcwNTUyMzg5Ng@@._V1_FMjpg_UX1000_.jpg', 'image/jpeg', 'video/mp4', 'shared/Movies/videoplayback.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `moviescategories`
--

CREATE TABLE `moviescategories` (
  `MovieCatID` int(11) NOT NULL,
  `MovieCat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moviescategories`
--

INSERT INTO `moviescategories` (`MovieCatID`, `MovieCat`) VALUES
(1, 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `movieswatched`
--

CREATE TABLE `movieswatched` (
  `watchedListID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `MovieID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `moviewatchlists`
--

CREATE TABLE `moviewatchlists` (
  `watchListID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `MovieID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `musicalbum`
--

CREATE TABLE `musicalbum` (
  `MusicID` int(11) NOT NULL,
  `MusicTitle` varchar(100) DEFAULT NULL,
  `Singer` varchar(100) DEFAULT NULL,
  `MusicBy` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `MusicTitleImg` varchar(150) DEFAULT NULL,
  `MusicTitleImgType` varchar(100) DEFAULT NULL,
  `musicPath` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `musicalbum`
--

INSERT INTO `musicalbum` (`MusicID`, `MusicTitle`, `Singer`, `MusicBy`, `status`, `MusicTitleImg`, `MusicTitleImgType`, `musicPath`) VALUES
(5, 'Rockstar', 'Post Malone', 4, 1, 'shared/MusicAlbum/6d430e100164235.5f03337e370dc.png', 'image/png', 'shared/Musics/y2mate.is - Alec Benjamin Let Me Down Slowly Lyrics -jLNrvmXboj8-128k-1691844909.mp3'),
(6, 'Rockstar', 'Post Malone', 4, 1, 'shared/MusicAlbum/6d430e100164235.5f03337e370dc.png', 'image/png', 'shared/Musics/y2mate.is - Alec Benjamin Let Me Down Slowly Lyrics -jLNrvmXboj8-128k-1691844909.mp3'),
(7, 'Pray For Me', 'Weeknd', 4, 1, 'shared/MusicAlbum/1bc0093f28353b9cd5c5df963316615d.jpg', 'image/jpeg', 'shared/Musics/y2mate.is - Alec Benjamin Let Me Down Slowly Lyrics -jLNrvmXboj8-128k-1691844909.mp3'),
(8, 'Shape Of You', 'Ed Sheeran', 4, 1, 'shared/MusicAlbum/Ed-Sheeran-Divide.jpg', 'image/jpeg', 'shared/Musics/y2mate.is - Alec Benjamin Let Me Down Slowly Lyrics -jLNrvmXboj8-128k-1691844909.mp3'),
(9, 'Hit Em Up', 'Travis Scott', 3, 1, 'shared/MusicAlbum/travis-scott-astroworld-cover-art-full.jpg', 'image/jpeg', 'shared/Musics/y2mate.is - Alec Benjamin Let Me Down Slowly Lyrics -jLNrvmXboj8-128k-1691844909.mp3'),
(10, 'Hope', 'XXX Tentacion', 3, 1, 'shared/MusicAlbum/__XXXTENTACION_Cover.png', 'image/png', 'shared/Musics/y2mate.is - Alec Benjamin Let Me Down Slowly Lyrics -jLNrvmXboj8-128k-1691844909.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `musicfav`
--

CREATE TABLE `musicfav` (
  `musicFavID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `MusicID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `musiclistenedhistory`
--

CREATE TABLE `musiclistenedhistory` (
  `musicListenedID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `MusicID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `planID` int(11) NOT NULL,
  `planPrice` int(11) DEFAULT NULL,
  `planQuality` varchar(100) DEFAULT NULL,
  `planScreenSharing` varchar(100) DEFAULT NULL,
  `planForDays` int(11) DEFAULT NULL,
  `plan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`planID`, `planPrice`, `planQuality`, `planScreenSharing`, `planForDays`, `plan`) VALUES
(3, 750, '30', '2', 720, 'Standard'),
(4, 1000, '30', '4', 1080, 'Premium'),
(5, 500, '30', '1', 360, 'Basic');

-- --------------------------------------------------------

--
-- Table structure for table `serviceproviders`
--

CREATE TABLE `serviceproviders` (
  `serviceProvidersID` int(11) NOT NULL,
  `ProvidersName` varchar(100) DEFAULT NULL,
  `ProvidersEmail` varchar(100) DEFAULT NULL,
  `ProvidersPwd` varchar(100) DEFAULT NULL,
  `ProvidersLogo` varchar(150) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `LogoType` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `serviceproviders`
--

INSERT INTO `serviceproviders` (`serviceProvidersID`, `ProvidersName`, `ProvidersEmail`, `ProvidersPwd`, `ProvidersLogo`, `status`, `LogoType`) VALUES
(3, 'Amazon ', 'amazon@prime.com', 'amazon123', 'shared/serviceProvidersLogo/Amazon-Prime-Video-Icon.png', 0, 'image/png'),
(4, 'Netflix', 'netflix@stream.com', 'netflix123', 'shared/serviceProvidersLogo/Netflix-Symbol.png', 0, 'image/png');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceID` int(11) NOT NULL,
  `serviceName` varchar(100) DEFAULT NULL,
  `servicePrice` int(11) DEFAULT NULL,
  `serviceDescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `subcriptionID` int(11) NOT NULL,
  `subscriptionFor` int(11) DEFAULT NULL,
  `subscriptionBy` int(11) DEFAULT NULL,
  `availedDate` datetime DEFAULT current_timestamp(),
  `payedAmount` int(11) DEFAULT NULL,
  `renewalDate` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`subcriptionID`, `subscriptionFor`, `subscriptionBy`, `availedDate`, `payedAmount`, `renewalDate`, `status`) VALUES
(5, 5, 61, '2023-08-12 18:50:05', 500, '2023-09-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `userPwd` varchar(100) DEFAULT NULL,
  `userPhoneNo` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userPwd`, `userPhoneNo`) VALUES
(61, 'Anonymous', 'anonymous123@gmail.com', 'anonymous123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contactID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `moviefavlist`
--
ALTER TABLE `moviefavlist`
  ADD PRIMARY KEY (`movieFavID`),
  ADD KEY `MovieID` (`MovieID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`MovieID`),
  ADD KEY `MovieCategory` (`MovieCategory`),
  ADD KEY `MovieBy` (`MovieBy`);

--
-- Indexes for table `moviescategories`
--
ALTER TABLE `moviescategories`
  ADD PRIMARY KEY (`MovieCatID`);

--
-- Indexes for table `movieswatched`
--
ALTER TABLE `movieswatched`
  ADD PRIMARY KEY (`watchedListID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `MovieID` (`MovieID`);

--
-- Indexes for table `moviewatchlists`
--
ALTER TABLE `moviewatchlists`
  ADD PRIMARY KEY (`watchListID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `MovieID` (`MovieID`);

--
-- Indexes for table `musicalbum`
--
ALTER TABLE `musicalbum`
  ADD PRIMARY KEY (`MusicID`),
  ADD KEY `MusicBy` (`MusicBy`);

--
-- Indexes for table `musicfav`
--
ALTER TABLE `musicfav`
  ADD PRIMARY KEY (`musicFavID`),
  ADD KEY `MusicID` (`MusicID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `musiclistenedhistory`
--
ALTER TABLE `musiclistenedhistory`
  ADD PRIMARY KEY (`musicListenedID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `MusicID` (`MusicID`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`planID`);

--
-- Indexes for table `serviceproviders`
--
ALTER TABLE `serviceproviders`
  ADD PRIMARY KEY (`serviceProvidersID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`subcriptionID`),
  ADD KEY `subscriptionFor` (`subscriptionFor`),
  ADD KEY `subscriptionBy` (`subscriptionBy`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `moviefavlist`
--
ALTER TABLE `moviefavlist`
  MODIFY `movieFavID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `MovieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `moviescategories`
--
ALTER TABLE `moviescategories`
  MODIFY `MovieCatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `movieswatched`
--
ALTER TABLE `movieswatched`
  MODIFY `watchedListID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `moviewatchlists`
--
ALTER TABLE `moviewatchlists`
  MODIFY `watchListID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `musicalbum`
--
ALTER TABLE `musicalbum`
  MODIFY `MusicID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `musicfav`
--
ALTER TABLE `musicfav`
  MODIFY `musicFavID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `musiclistenedhistory`
--
ALTER TABLE `musiclistenedhistory`
  MODIFY `musicListenedID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `planID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `serviceproviders`
--
ALTER TABLE `serviceproviders`
  MODIFY `serviceProvidersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `subcriptionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contactus`
--
ALTER TABLE `contactus`
  ADD CONSTRAINT `contactus_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `moviefavlist`
--
ALTER TABLE `moviefavlist`
  ADD CONSTRAINT `moviefavlist_ibfk_1` FOREIGN KEY (`MovieID`) REFERENCES `movies` (`MovieID`),
  ADD CONSTRAINT `moviefavlist_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
