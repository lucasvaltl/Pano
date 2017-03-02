-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 02, 2017 at 09:48 PM
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
(11344, 12401, 11120, 'I could say it easily ;)', '2017-03-02 21:48:06');

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
(12399, 12400),
(12402, 12400),
(12400, 12401),
(12399, 12402);

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
(11123, 12402);

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
(11123, '');

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
(11111, 12400, 11111, '#bestintheworld', '2017-02-24 18:28:54', 'Bergen, Austria'),
(11112, 12402, 11112, 'Awesome experience!', '2017-02-24 20:04:56', 'Montreal, Canada'),
(11113, 12399, 11113, '#OldTrafford #ManUtd', '2017-03-01 19:26:23', 'Manchester, England'),
(11114, 12399, 11114, 'Beautiful #Bali #Volcano #Lake', '2017-03-01 19:33:27', 'Bali, Indonesia'),
(11115, 12399, 11115, 'Niagara Falls!', '2017-03-01 19:36:06', 'Niagara Falls, USA/Canada'),
(11116, 12399, 11116, 'Really cold in #Montreal!', '2017-03-01 19:36:06', 'Montreal, Canada'),
(11117, 12399, 11117, 'Sydney Harbour!', '2017-03-01 19:37:03', 'Sydney, Australia'),
(11118, 12399, 11118, 'So natural! #Glacier #Iceland', '2017-03-01 19:38:23', 'Iceland'),
(11119, 12399, 11119, 'Toronto in Winter #sunset', '2017-03-02 21:29:08', 'Toronto, Canada'),
(11120, 12399, 11120, 'Eyjafjallajokull #Iceland #tryandsayit', '2017-03-02 21:40:07', 'Eyjafjallajokull, Iceland'),
(11121, 12399, 11121, 'Malaysian sunset', '2017-03-02 21:41:30', 'Malaysia'),
(11122, 12399, 11122, '#nara #weclimbedamountain', '2017-03-02 21:41:30', 'Nara, Japan'),
(11123, 12399, 11123, 'Singaporean thunderstorm approaching #needtofindshelter', '2017-03-02 21:42:25', 'Pulau Ubin, Singapore');

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
(12403, 'Noob', 'Master', 'Noob123', 'noob@mail.com', '$2y$10$bfqBPR5mPB0nuuY4SAEOo.M090R/7Q3x/b/N10T5Hpkku7U3kcLfG', 'London', 'I am a noob', '2017-02-22 22:57:13', 3);

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
  ADD PRIMARY KEY (`UserID`);

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
  MODIFY `CommentID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11345;
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
  MODIFY `PhotoID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11124;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `PostID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11124;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12404;
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
