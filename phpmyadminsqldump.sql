-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 04, 2017 at 05:37 PM
-- Server version: 5.6.34
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Pano`
--

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `CollectionID` int(40) NOT NULL,
  `GroupID` int(20) DEFAULT NULL,
  `OwnerID` int(20) NOT NULL,
  `Caption` varchar(100) NOT NULL,
  `CreatedTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SettingID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(40) NOT NULL,
  `UserID` int(20) NOT NULL,
  `PhotoID` int(40) NOT NULL,
  `Comment` text NOT NULL,
  `CommentTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentID`, `UserID`, `PhotoID`, `Comment`, `CommentTime`) VALUES
(11257, 12400, 11111, 'Sick photo bro', '2017-02-27 00:22:06'),
(11258, 12400, 11112, 'Lol at the ladys head', '2017-02-27 00:23:05'),
(11267, 12399, 11112, 'This looks like London to me, not Montreal!', '2017-02-27 11:27:09'),
(11278, 12399, 11112, 'You can tell because the walky-talky and cheese-grater buildings are on the right hand side!', '2017-02-27 11:44:26'),
(11281, 12402, 11112, 'Oh yeah it was actually in London', '2017-02-27 17:28:30'),
(11337, 12399, 11116, 'good old days', '2017-03-02 20:22:47'),
(11339, 12400, 11118, 'Awesome!', '2017-03-02 20:42:41'),
(11340, 12399, 11111, 'Nice sunset!', '2017-03-02 21:23:45'),
(11341, 12402, 11116, 'looks cold bro', '2017-03-02 21:46:03'),
(11342, 12402, 11113, 'Ive been here before!', '2017-03-02 21:46:29'),
(11343, 12401, 11123, 'Better run!', '2017-03-02 21:47:27'),
(11344, 12401, 11120, 'I could say it easily ;)', '2017-03-02 21:48:06'),
(11345, 12409, 11123, 'i could hide easily up in this vantage point...', '2017-03-03 20:03:10'),
(11346, 12409, 11120, 'i could hide in that mountain, and youd never know...', '2017-03-03 20:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `friendrecommendations`
--

CREATE TABLE `friendrecommendations` (
  `UserID` int(20) NOT NULL,
  `FriendID1` int(20) DEFAULT NULL,
  `FriendID2` int(20) DEFAULT NULL,
  `FriendID3` int(20) DEFAULT NULL,
  `FriendID4` int(20) DEFAULT NULL,
  `FriendID5` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `friendrequests`
--

CREATE TABLE `friendrequests` (
  `UserID` int(20) NOT NULL,
  `FriendID` int(20) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `UserID` int(20) NOT NULL,
  `FriendID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`UserID`, `FriendID`) VALUES
(12400, 12399),
(12401, 12399),
(12402, 12399),
(12404, 12399),
(12407, 12399),
(12399, 12400),
(12401, 12400),
(12399, 12401),
(12400, 12401),
(12402, 12401),
(12409, 12401),
(12399, 12402),
(12401, 12402),
(12404, 12402),
(12405, 12403),
(12406, 12403),
(12407, 12403),
(12408, 12403),
(12399, 12404),
(12402, 12404),
(12408, 12404),
(12403, 12405),
(12406, 12405),
(12408, 12405),
(12403, 12406),
(12405, 12406),
(12407, 12406),
(12410, 12406),
(12399, 12407),
(12403, 12407),
(12406, 12407),
(12403, 12408),
(12404, 12408),
(12405, 12408),
(12401, 12409),
(12413, 12409),
(12406, 12410),
(12409, 12413);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `GroupID` int(40) NOT NULL,
  `GroupName` varchar(50) NOT NULL,
  `CreatorID` int(20) NOT NULL COMMENT 'Needs to be changed before a user gets deleted!!',
  `PhotoID` int(40) NOT NULL,
  `ShortDescrip` varchar(150) NOT NULL,
  `CreatedTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `PhotoID` int(40) NOT NULL,
  `UserID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`PhotoID`, `UserID`) VALUES
(11111, 12399),
(11112, 12399),
(11113, 12399),
(11118, 12399),
(11111, 12400),
(11112, 12400),
(11111, 12401),
(11112, 12401),
(11113, 12401),
(11115, 12401),
(11116, 12401),
(11118, 12401),
(11123, 12401),
(11111, 12402),
(11120, 12402),
(11122, 12402),
(11123, 12402),
(11118, 12403),
(11112, 12404),
(11113, 12404),
(11114, 12404),
(11115, 12404),
(11116, 12404),
(11117, 12404),
(11118, 12404),
(11119, 12404),
(11120, 12404),
(11121, 12404),
(11122, 12404),
(11123, 12404),
(11111, 12405),
(11112, 12405),
(11114, 12405),
(11121, 12405),
(11123, 12405),
(11112, 12406),
(11113, 12406),
(11119, 12406),
(11123, 12406),
(11114, 12407),
(11115, 12407),
(11116, 12407),
(11117, 12407),
(11118, 12407),
(11119, 12407),
(11121, 12407),
(11122, 12407),
(11112, 12408),
(11113, 12408),
(11114, 12408),
(11115, 12408),
(11116, 12408),
(11117, 12408),
(11118, 12408),
(11119, 12408),
(11120, 12408),
(11121, 12408),
(11122, 12408),
(11123, 12408),
(11118, 12409),
(11119, 12409),
(11120, 12409),
(11121, 12409),
(11122, 12409),
(11123, 12409),
(11118, 12410);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MessageID` int(40) NOT NULL,
  `GroupID` int(40) NOT NULL,
  `UserID` int(20) NOT NULL,
  `Content` longtext NOT NULL,
  `MessageTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `photocollections mapping`
--

CREATE TABLE `photocollections mapping` (
  `CollectionID` int(40) NOT NULL,
  `PhotoID` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `PhotoID` int(40) NOT NULL,
  `LinkToFile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`PhotoID`, `LinkToFile`) VALUES
(11111, 'IMG_8937'),
(11112, ''),
(11113, '11113'),
(11114, '11114'),
(11115, '11115'),
(11116, '11116'),
(11117, '11117'),
(11118, '11118'),
(11119, ''),
(11120, ''),
(11121, ''),
(11122, ''),
(11123, ''),
(11124, ''),
(11125, ''),
(11126, ''),
(11127, ''),
(11128, ''),
(11129, ''),
(11130, ''),
(11131, ''),
(11132, ''),
(11133, ''),
(11134, ''),
(11135, ''),
(11136, ''),
(11137, ''),
(11138, ''),
(11139, ''),
(11140, ''),
(11141, '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `PostID` int(40) NOT NULL,
  `UserID` int(20) NOT NULL,
  `PhotoID` int(40) NOT NULL,
  `PostText` text NOT NULL,
  `PostTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `PostLocation` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`PostID`, `UserID`, `PhotoID`, `PostText`, `PostTime`, `PostLocation`) VALUES
(11111, 12400, 11111, '#bestintheworld', '2017-03-04 18:28:54', 'Bergen, Austria'),
(11112, 12402, 11112, 'Awesome experience!', '2017-03-04 12:04:56', 'Montreal, Canada'),
(11113, 12399, 11113, '#OldTrafford #ManUtd', '2017-03-04 12:26:23', 'Manchester, England'),
(11114, 12399, 11114, 'Beautiful #Bali #Volcano #Lake', '2017-03-01 19:33:27', 'Bali, Indonesia'),
(11115, 12399, 11115, 'Niagara Falls!', '2017-03-01 19:36:06', 'Niagara Falls, USA/Canada'),
(11116, 12399, 11116, 'Really cold in #Montreal!', '2017-03-01 19:36:06', 'Montreal, Canada'),
(11117, 12399, 11117, 'Sydney Harbour!', '2017-03-01 19:37:03', 'Sydney, Australia'),
(11118, 12399, 11118, 'So natural! #Glacier #Iceland', '2017-03-04 17:38:23', 'Iceland'),
(11119, 12399, 11119, 'Toronto in Winter #sunset', '2017-03-02 21:29:08', 'Toronto, Canada'),
(11120, 12399, 11120, 'Eyjafjallajokull #Iceland #tryandsayit', '2017-03-02 21:40:07', 'Eyjafjallajokull, Iceland'),
(11121, 12399, 11121, 'Malaysian sunset', '2017-03-02 21:41:30', 'Malaysia'),
(11122, 12399, 11122, '#nara #weclimbedamountain', '2017-03-02 21:41:30', 'Nara, Japan'),
(11123, 12399, 11123, 'Singaporean thunderstorm approaching #needtofindshelter', '2017-03-02 21:42:25', 'Pulau Ubin, Singapore'),
(11124, 12403, 11124, 'Sydney at Night', '2017-03-04 16:57:28', 'Sydney, Australia'),
(11125, 12404, 11125, 'Swiss Beauty', '2017-03-04 16:58:32', 'Bern, Switzerland'),
(11126, 12408, 11126, 'Dirt track or snow mountain?', '2017-03-03 16:59:46', 'Snowy Mountains, Australia'),
(11127, 12409, 11127, '#averageday', '2017-03-04 17:01:01', 'Moscow, Russia'),
(11128, 12406, 11128, 'Icelandic waterfall', '2017-03-04 17:08:55', 'Iceland'),
(11130, 12410, 11129, 'North Korea is beautiful... #pyongyang', '2017-03-04 17:10:45', 'Pyongyang, North Korea'),
(11131, 12412, 11130, 'Biarritz', '2017-03-01 17:12:11', 'Biarritz, France'),
(11132, 12413, 11131, '#TrafalgarSquare #London #pigeonseverywhere', '2017-03-04 17:15:36', 'London, England'),
(11133, 12408, 11132, '#NYC #skyline #beautiful', '2017-03-01 17:17:24', 'New York City, USA'),
(11134, 12402, 11133, '#SonyCentre #Berlin', '2017-03-04 17:20:23', 'Berlin, Germany'),
(11135, 12407, 11134, '#phoenix #arizona #sunset', '2017-03-02 17:22:19', 'Phoenix, Arizona, USA'),
(11136, 12414, 11135, 'Montreal at Night #montreal', '2017-03-04 17:23:38', 'Montreal, Canada'),
(11137, 12410, 11136, 'Hollywood, Los Angeles #coolsign', '2017-03-04 17:28:24', 'Los Angeles, USA');

-- --------------------------------------------------------

--
-- Table structure for table `privacy settings`
--

CREATE TABLE `privacy settings` (
  `SettingID` int(5) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privacy settings`
--

INSERT INTO `privacy settings` (`SettingID`, `Description`) VALUES
(1, 'Friends Only'),
(2, 'Friends of Friends'),
(3, 'Public');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(20) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `EmailAddress` varchar(80) NOT NULL,
  `Password` char(64) NOT NULL,
  `Location` varchar(150) NOT NULL,
  `ShortDescrip` varchar(150) NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SettingID` int(5) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FirstName`, `LastName`, `UserName`, `EmailAddress`, `Password`, `Location`, `ShortDescrip`, `DateCreated`, `SettingID`) VALUES
(12399, 'Li', 'Xie', 'Liko', 'liko@mail.com', '$2y$10$SW1DWeNQuLcFdbWs2PgXiO5VqCrUDdzJ173sEi/tLmL9oWsXWmI4G', 'London, England', 'Pano is one of the best social media sites ever made!', '2017-02-21 18:24:29', 2),
(12400, 'Lucas', 'Valtl', 'Lucas', 'lucas@pano.com', '$2y$10$KZHC1VBrAWtUZJPrcwyb9uL1TWIwJqP9FIYT7O2k4BNvK5PX8ZYay', 'London', 'I like Pano', '2017-02-21 18:25:19', 3),
(12401, 'Florian', 'Obst', 'Florian', 'florian@pano.com', '$2y$10$JCCx7lZflspi.B55V7j8bOEuJG.gM1MlpeQbrZDeYiT8oh0MLRm2m', 'London', 'Go Pano Go', '2017-02-21 18:25:47', 3),
(12402, 'Johannes', 'Landgraf', 'Johannes', 'johannes@pano.com', '$2y$10$6Bq0sco8ddlwFUy47oNAA.Nm.QvD7wmMtYaA.z6iuRsjLOOLyHWHm', 'London', 'Pano is great', '2017-02-21 18:26:32', 3),
(12403, 'Noob', 'Master', 'Noob123', 'noob@mail.com', '$2y$10$bfqBPR5mPB0nuuY4SAEOo.M090R/7Q3x/b/N10T5Hpkku7U3kcLfG', 'London', 'I am a noob', '2017-02-22 22:57:13', 3),
(12404, 'Secret', 'Guy', 'PanoMaster', 'pano@mail.com', '$2y$10$ty.2qdk5XT4G0JKIPep5VeLmYeeOF4qA.0CzerybEIauymnIGIzHa', 'Manchester', 'I am just a test account. Nothing special here really.', '2017-03-03 19:22:06', 3),
(12405, 'John', 'Smith', 'braveAsian', 'brave@brave.com', '$2y$10$uIqDRSHJcUTOKoClHm4pH.R46lAjMea.bJTbLqHbGkFnP8Wk/jWIm', 'Hawaii', 'I killed a lion once', '2017-03-03 19:28:37', 3),
(12406, 'Samuel', 'Yoloman', 'yolo_merchant', 'yolo@yolo.com', '$2y$10$24/4oboKR4gqDakyRHr1MejMpXjAmdGhWIziY2fV0bxtXq4HtTeCq', 'Edinburgh', 'I buy and sell yolo', '2017-03-03 19:50:23', 3),
(12407, 'Max', 'Power', 'power_ranger246', 'power@power.com', '$2y$10$82YF6Km3trd/N3Q./ZKHt.cZduYyiFu2yXj2EAICXzhCzLNu./jk2', 'Reading', 'I like power rangers', '2017-03-03 19:52:31', 3),
(12408, 'Crash', 'Bandicoot', 'CrashBandicoot', 'crash@crash.com', '$2y$10$hTY.hC9Zr.wzkVRfCMVhMeHbtjtqhufX/AU.YP5JdZypyAKwy/sGO', 'CrashLand', 'I have a remake coming out soon!', '2017-03-03 19:54:34', 3),
(12409, 'Ghost', 'Sniper', 'ghostsniper64', 'ghosty@snipes.com', '$2y$10$JK3i/3aFD2GzQdOU5QUi6u44NPvau6jBwfF4UpT/ZCed/8cVPf96a', 'London', 'I hide in the grass and wait for people to come out of cover.', '2017-03-03 20:02:49', 3),
(12410, 'Daniel', 'Hernandez', 'SuperSuperMario', 'supermario@supermail.com', '$2y$10$/BwLMoyPhfcEpfIshpJux.V0QBLj6tio5lWok.kF6gLlovP6ecpAi', 'Paris', 'Hi Im Daniel Hernandez, and I love photography. Pano is great!', '2017-03-04 15:49:00', 3),
(12411, 'Harry', 'Johnson', 'GreatElephant_gal', 'GreatElephant_gal@master.com', '$2y$10$oAXkitKKp8J8xMOXYj/34uzHMc1vL4ljNY8uMsYP7vh.Yx8VDp3gy', 'Manchester', 'Hi Im Harry Johnson, and I love photography. Pano is great!', '2017-03-04 15:49:00', 3),
(12412, 'Michelle', 'Andersen', 'SleepySpeaker123', 'SleepySpeaker123@panoapp.com', '$2y$10$Yb.GLoF0j/DSu4GHKTx.EuCaAcCuJoAJHNyITWjr3hWvbRjs9.H5S', 'Manchester', 'Hi Im Michelle Andersen, and I love photography. Pano is great!', '2017-03-04 15:49:01', 3),
(12413, 'Harry', 'Zhao', 'SneakyBowl', 'SneakyBowl@ok.com', '$2y$10$KdoT.k5gUvSDr2EYhrS5fO3uNH.wq7QRMJ.B0KctJrlAWeHogptvm', 'Milan', 'Hi Im Harry Zhao, and I love photography. Pano is great!', '2017-03-04 15:49:01', 3),
(12414, 'Michelle', 'Gunaydin', 'SleepyTuna', 'SleepyTuna@ok.com', '$2y$10$ynszWRXh4wjeEnqFxJ.0w.7.IqG37l.e3muy01JEWLMkhjI2XBcLm', 'Berlin', 'Hi Im Michelle Gunaydin, and I love photography. Pano is great!', '2017-03-04 15:49:01', 3);

-- --------------------------------------------------------

--
-- Table structure for table `usergroup mapping`
--

CREATE TABLE `usergroup mapping` (
  `GroupID` int(40) NOT NULL,
  `UserID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`CollectionID`),
  ADD KEY `CollectionsOwnerConstraint` (`OwnerID`),
  ADD KEY `CollectionsGroupConstraint` (`GroupID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`,`UserID`),
  ADD KEY `CommentsUserConstraint` (`UserID`),
  ADD KEY `CommentsPostConstraint` (`PhotoID`);

--
-- Indexes for table `friendrecommendations`
--
ALTER TABLE `friendrecommendations`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `Friend1Constraint` (`FriendID1`),
  ADD KEY `Friend2Constraint` (`FriendID2`),
  ADD KEY `Friend3Constraint` (`FriendID3`),
  ADD KEY `Friend4Constraint` (`FriendID4`),
  ADD KEY `Friend5Constraint` (`FriendID5`);

--
-- Indexes for table `friendrequests`
--
ALTER TABLE `friendrequests`
  ADD PRIMARY KEY (`UserID`,`FriendID`),
  ADD KEY `FriendConstraint` (`FriendID`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`UserID`,`FriendID`),
  ADD KEY `FriendsFriendConstraint` (`FriendID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`GroupID`),
  ADD KEY `GroupsCreatorConstraint` (`CreatorID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`PhotoID`,`UserID`),
  ADD KEY `LikesUserConstraint` (`UserID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageID`),
  ADD KEY `MessagesGroupConstraint` (`GroupID`),
  ADD KEY `MessagesUserConstraint` (`UserID`);

--
-- Indexes for table `photocollections mapping`
--
ALTER TABLE `photocollections mapping`
  ADD PRIMARY KEY (`CollectionID`,`PhotoID`),
  ADD KEY `PhotoCollectionsPhotosConstraint` (`PhotoID`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`PhotoID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `PostsUserConstraint` (`UserID`),
  ADD KEY `PostsPhotosConstraint` (`PhotoID`);

--
-- Indexes for table `privacy settings`
--
ALTER TABLE `privacy settings`
  ADD PRIMARY KEY (`SettingID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `usergroup mapping`
--
ALTER TABLE `usergroup mapping`
  ADD PRIMARY KEY (`GroupID`,`UserID`),
  ADD KEY `UserGroupUserConstraint` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `CollectionID` int(40) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11347;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `GroupID` int(40) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageID` int(40) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `PhotoID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11142;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `PostID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11138;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12415;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `CollectionsGroupConstraint` FOREIGN KEY (`GroupID`) REFERENCES `groups` (`GroupID`),
  ADD CONSTRAINT `CollectionsOwnerConstraint` FOREIGN KEY (`OwnerID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `CommentsPostConstraint` FOREIGN KEY (`PhotoID`) REFERENCES `photos` (`PhotoID`),
  ADD CONSTRAINT `CommentsUserConstraint` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `friendrecommendations`
--
ALTER TABLE `friendrecommendations`
  ADD CONSTRAINT `ForeignKeyConstraint` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `Friend1Constraint` FOREIGN KEY (`FriendID1`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `Friend2Constraint` FOREIGN KEY (`FriendID2`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `Friend3Constraint` FOREIGN KEY (`FriendID3`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `Friend4Constraint` FOREIGN KEY (`FriendID4`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `Friend5Constraint` FOREIGN KEY (`FriendID5`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `friendrequests`
--
ALTER TABLE `friendrequests`
  ADD CONSTRAINT `FriendConstraint` FOREIGN KEY (`FriendID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `UserConstraint` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `FriendsFriendConstraint` FOREIGN KEY (`FriendID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `FriendsUserConstraint` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `GroupsCreatorConstraint` FOREIGN KEY (`CreatorID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `LikesPostConstraint` FOREIGN KEY (`PhotoID`) REFERENCES `photos` (`PhotoID`),
  ADD CONSTRAINT `LikesUserConstraint` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `MessagesGroupConstraint` FOREIGN KEY (`GroupID`) REFERENCES `groups` (`GroupID`),
  ADD CONSTRAINT `MessagesUserConstraint` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `photocollections mapping`
--
ALTER TABLE `photocollections mapping`
  ADD CONSTRAINT `PhotoCollectionsCollectionConstraint` FOREIGN KEY (`CollectionID`) REFERENCES `collections` (`CollectionID`),
  ADD CONSTRAINT `PhotoCollectionsPhotosConstraint` FOREIGN KEY (`PhotoID`) REFERENCES `photos` (`PhotoID`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `PostsPhotosConstraint` FOREIGN KEY (`PhotoID`) REFERENCES `photos` (`PhotoID`),
  ADD CONSTRAINT `PostsUserConstraint` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `usergroup mapping`
--
ALTER TABLE `usergroup mapping`
  ADD CONSTRAINT `UserGroupGroupConstraint` FOREIGN KEY (`GroupID`) REFERENCES `groups` (`GroupID`),
  ADD CONSTRAINT `UserGroupUserConstraint` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);
