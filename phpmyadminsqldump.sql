-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 16, 2017 at 04:08 PM
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
  `PostID` int(40) NOT NULL,
  `LinkToFile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `privacy settings`
--

CREATE TABLE `privacy settings` (
  `SettingID` int(5) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `Location` varchar(150) NOT NULL,
  `ShortDescrip` varchar(150) NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FirstName`, `LastName`, `UserName`, `EmailAddress`, `Location`, `ShortDescrip`, `DateCreated`) VALUES
(12345, 'Li', 'Xie', 'Liko', '', 'London', 'This is a short description', '2017-02-16 13:10:57');

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
  MODIFY `CommentID` int(40) NOT NULL AUTO_INCREMENT;
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
  MODIFY `PhotoID` int(40) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `PostID` int(40) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;
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
