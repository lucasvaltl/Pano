-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889

-- Generation Time: Mar 13, 2017 at 11:45 PM

-- Server version: 5.6.34
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pano`
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

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`CollectionID`, `GroupID`, `OwnerID`, `Caption`, `CreatedTime`, `SettingID`) VALUES
(8, NULL, 12400, 'jzhtwfed', '2017-03-10 23:06:36', 2),
(9, NULL, 12400, 'gtqsw', '2017-03-10 23:08:20', 3),
(10, NULL, 12400, 'juhzefws', '2017-03-10 23:10:14', 1),
(11, NULL, 12400, 'hzgtfqedws', '2017-03-10 23:16:56', 3),
(12, NULL, 12400, 'ikzjdthsgfdsa', '2017-03-10 23:19:17', 1),
(13, NULL, 12400, 'ö.li,kumjzhtgrf', '2017-03-10 23:19:37', 1),
(14, NULL, 12400, 'oljn', '2017-03-10 23:20:08', 3),
(15, NULL, 12399, 'Sick photos', '2017-03-12 02:15:05', 3),
(16, NULL, 12445, 'My trip to London', '2017-03-12 15:51:14', 1),
(17, 5, 12399, 'For the team', '2017-03-12 16:22:43', 4),
(18, NULL, 12399, 'My Trip to Iceland', '2017-03-12 22:47:15', 3);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(40) NOT NULL,
  `UserID` int(20) NOT NULL,
  `PostID` varchar(200) NOT NULL,
  `Comment` text NOT NULL,
  `CommentTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentID`, `UserID`, `PostID`, `Comment`, `CommentTime`) VALUES
(11347, 12401, '49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 'nudeeees!', '2017-03-10 17:27:40'),
(11348, 12401, '49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 'huh', '2017-03-10 17:32:38'),
(11349, 12401, '49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 'hkihkjhkj', '2017-03-10 17:40:01'),
(11350, 12401, '49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 'comment 23', '2017-03-10 17:42:28'),
(11351, 12401, '49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 'efdsay<', '2017-03-10 17:46:45'),
(11352, 12401, '49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 'fwedqsaa', '2017-03-10 17:47:51'),
(11353, 12401, '49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 'VEFDSF', '2017-03-10 17:50:16'),
(11354, 12401, '49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 'aökdasd', '2017-03-10 18:07:49'),
(11355, 12401, '49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 'as', '2017-03-10 18:07:53'),
(11356, 12401, '49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 'asd', '2017-03-10 18:09:06'),
(11357, 12400, '77f38c5a1ea518b67194f81e6c51b108b1cf45cab1c9cc03e7aeb641fe151c09', 'really nice tits!', '2017-03-10 23:58:36'),
(11358, 12399, '77f38c5a1ea518b67194f81e6c51b108b1cf45cab1c9cc03e7aeb641fe151c09', 'Yeah I agree!', '2017-03-12 19:23:53'),
(11359, 12399, '77f38c5a1ea518b67194f81e6c51b108b1cf45cab1c9cc03e7aeb641fe151c09', 'Please though, take it down! ', '2017-03-12 19:24:57'),
(11360, 12399, 'd64a9ffc441847c5360d1a4503cd2a5ea529b2d86dbb7966f35df90d30de79aa', 'Nice picture Lucas', '2017-03-12 19:25:39'),
(11361, 12399, '176f2271bc3e9b2e62641e5c24e4307121ad698e1193a6ea444d202bdbb4cd5e', 'Looks cold!', '2017-03-12 19:26:02');

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

--
-- Dumping data for table `friendrecommendations`
--

INSERT INTO `friendrecommendations` (`UserID`, `FriendID1`, `FriendID2`, `FriendID3`, `FriendID4`, `FriendID5`) VALUES
(12399, 12409, 12431, 12437, 12435, 12421),
(12400, 12429, 12424, 12430, 12412, 12408),
(12401, NULL, NULL, NULL, NULL, NULL),
(12402, 12414, 12417, 12406, 12403, 12428),
(12403, NULL, NULL, NULL, NULL, NULL),
(12404, NULL, NULL, NULL, NULL, NULL),
(12405, NULL, NULL, NULL, NULL, NULL),
(12406, NULL, NULL, NULL, NULL, NULL),
(12407, NULL, NULL, NULL, NULL, NULL),
(12408, NULL, NULL, NULL, NULL, NULL),
(12409, NULL, NULL, NULL, NULL, NULL),
(12410, NULL, NULL, NULL, NULL, NULL),
(12411, NULL, NULL, NULL, NULL, NULL),
(12412, NULL, NULL, NULL, NULL, NULL),
(12413, NULL, NULL, NULL, NULL, NULL),
(12414, NULL, NULL, NULL, NULL, NULL),
(12415, NULL, NULL, NULL, NULL, NULL),
(12416, NULL, NULL, NULL, NULL, NULL),
(12417, NULL, NULL, NULL, NULL, NULL),
(12418, NULL, NULL, NULL, NULL, NULL),
(12419, NULL, NULL, NULL, NULL, NULL),
(12420, NULL, NULL, NULL, NULL, NULL),
(12421, NULL, NULL, NULL, NULL, NULL),
(12422, NULL, NULL, NULL, NULL, NULL),
(12423, NULL, NULL, NULL, NULL, NULL),
(12424, NULL, NULL, NULL, NULL, NULL),
(12425, NULL, NULL, NULL, NULL, NULL),
(12426, 12431, 12402, 12399, 12407, 12421),
(12427, NULL, NULL, NULL, NULL, NULL),
(12428, NULL, NULL, NULL, NULL, NULL),
(12429, NULL, NULL, NULL, NULL, NULL),
(12430, NULL, NULL, NULL, NULL, NULL),
(12431, NULL, NULL, NULL, NULL, NULL),
(12432, NULL, NULL, NULL, NULL, NULL),
(12433, NULL, NULL, NULL, NULL, NULL),
(12434, NULL, NULL, NULL, NULL, NULL),
(12435, NULL, NULL, NULL, NULL, NULL),
(12436, NULL, NULL, NULL, NULL, NULL),
(12437, NULL, NULL, NULL, NULL, NULL),
(12438, NULL, NULL, NULL, NULL, NULL),
(12439, NULL, NULL, NULL, NULL, NULL),
(12440, NULL, NULL, NULL, NULL, NULL),
(12444, 12427, 12415, 12440, 12437, 12412),
(12445, 12427, 12415, 12440, 12437, 12412);

-- --------------------------------------------------------

--
-- Table structure for table `friendrequests`
--

CREATE TABLE `friendrequests` (
  `UserID` int(20) NOT NULL,
  `FriendID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friendrequests`
--

INSERT INTO `friendrequests` (`UserID`, `FriendID`) VALUES
(12399, 12409),
(12399, 12417),
(12399, 12431),
(12399, 12437),
(12399, 12445);

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
(12405, 12399),
(12406, 12399),
(12407, 12399),
(12410, 12399),
(12412, 12399),
(12414, 12399),
(12416, 12399),
(12419, 12399),
(12420, 12399),
(12422, 12399),
(12423, 12399),
(12424, 12399),
(12427, 12399),
(12428, 12399),
(12429, 12399),
(12430, 12399),
(12436, 12399),
(12438, 12399),
(12444, 12399),
(12399, 12400),
(12401, 12400),
(12402, 12400),
(12403, 12400),
(12405, 12400),
(12406, 12400),
(12407, 12400),
(12409, 12400),
(12413, 12400),
(12414, 12400),
(12416, 12400),
(12419, 12400),
(12420, 12400),
(12423, 12400),
(12426, 12400),
(12427, 12400),
(12428, 12400),
(12431, 12400),
(12433, 12400),
(12435, 12400),
(12436, 12400),
(12437, 12400),
(12440, 12400),
(12399, 12401),
(12400, 12401),
(12402, 12401),
(12403, 12401),
(12405, 12401),
(12407, 12401),
(12408, 12401),
(12409, 12401),
(12412, 12401),
(12417, 12401),
(12420, 12401),
(12424, 12401),
(12425, 12401),
(12426, 12401),
(12432, 12401),
(12434, 12401),
(12438, 12401),
(12439, 12401),
(12399, 12402),
(12400, 12402),
(12401, 12402),
(12404, 12402),
(12405, 12402),
(12407, 12402),
(12408, 12402),
(12409, 12402),
(12411, 12402),
(12412, 12402),
(12415, 12402),
(12416, 12402),
(12418, 12402),
(12421, 12402),
(12423, 12402),
(12424, 12402),
(12425, 12402),
(12427, 12402),
(12429, 12402),
(12430, 12402),
(12431, 12402),
(12432, 12402),
(12433, 12402),
(12434, 12402),
(12435, 12402),
(12439, 12402),
(12400, 12403),
(12401, 12403),
(12404, 12403),
(12405, 12403),
(12406, 12403),
(12407, 12403),
(12408, 12403),
(12412, 12403),
(12413, 12403),
(12416, 12403),
(12418, 12403),
(12419, 12403),
(12420, 12403),
(12424, 12403),
(12425, 12403),
(12428, 12403),
(12430, 12403),
(12432, 12403),
(12433, 12403),
(12399, 12404),
(12402, 12404),
(12403, 12404),
(12405, 12404),
(12406, 12404),
(12407, 12404),
(12408, 12404),
(12409, 12404),
(12410, 12404),
(12411, 12404),
(12412, 12404),
(12413, 12404),
(12414, 12404),
(12417, 12404),
(12418, 12404),
(12421, 12404),
(12423, 12404),
(12424, 12404),
(12425, 12404),
(12428, 12404),
(12430, 12404),
(12433, 12404),
(12434, 12404),
(12438, 12404),
(12399, 12405),
(12400, 12405),
(12401, 12405),
(12402, 12405),
(12403, 12405),
(12404, 12405),
(12406, 12405),
(12408, 12405),
(12410, 12405),
(12414, 12405),
(12416, 12405),
(12417, 12405),
(12419, 12405),
(12421, 12405),
(12422, 12405),
(12424, 12405),
(12430, 12405),
(12432, 12405),
(12435, 12405),
(12439, 12405),
(12399, 12406),
(12400, 12406),
(12403, 12406),
(12404, 12406),
(12405, 12406),
(12407, 12406),
(12409, 12406),
(12410, 12406),
(12411, 12406),
(12412, 12406),
(12413, 12406),
(12415, 12406),
(12416, 12406),
(12417, 12406),
(12420, 12406),
(12422, 12406),
(12424, 12406),
(12427, 12406),
(12428, 12406),
(12429, 12406),
(12430, 12406),
(12433, 12406),
(12437, 12406),
(12439, 12406),
(12440, 12406),
(12399, 12407),
(12400, 12407),
(12401, 12407),
(12402, 12407),
(12403, 12407),
(12404, 12407),
(12406, 12407),
(12409, 12407),
(12411, 12407),
(12414, 12407),
(12415, 12407),
(12416, 12407),
(12418, 12407),
(12420, 12407),
(12421, 12407),
(12424, 12407),
(12427, 12407),
(12428, 12407),
(12429, 12407),
(12431, 12407),
(12432, 12407),
(12434, 12407),
(12437, 12407),
(12438, 12407),
(12440, 12407),
(12401, 12408),
(12402, 12408),
(12403, 12408),
(12404, 12408),
(12405, 12408),
(12410, 12408),
(12411, 12408),
(12412, 12408),
(12413, 12408),
(12414, 12408),
(12415, 12408),
(12416, 12408),
(12420, 12408),
(12421, 12408),
(12422, 12408),
(12423, 12408),
(12424, 12408),
(12425, 12408),
(12426, 12408),
(12427, 12408),
(12430, 12408),
(12431, 12408),
(12433, 12408),
(12434, 12408),
(12400, 12409),
(12401, 12409),
(12402, 12409),
(12404, 12409),
(12406, 12409),
(12407, 12409),
(12410, 12409),
(12411, 12409),
(12412, 12409),
(12413, 12409),
(12414, 12409),
(12415, 12409),
(12417, 12409),
(12419, 12409),
(12420, 12409),
(12421, 12409),
(12422, 12409),
(12423, 12409),
(12424, 12409),
(12426, 12409),
(12428, 12409),
(12429, 12409),
(12431, 12409),
(12433, 12409),
(12434, 12409),
(12435, 12409),
(12437, 12409),
(12399, 12410),
(12404, 12410),
(12405, 12410),
(12406, 12410),
(12408, 12410),
(12409, 12410),
(12412, 12410),
(12417, 12410),
(12418, 12410),
(12419, 12410),
(12421, 12410),
(12428, 12410),
(12430, 12410),
(12432, 12410),
(12434, 12410),
(12435, 12410),
(12440, 12410),
(12402, 12411),
(12404, 12411),
(12406, 12411),
(12407, 12411),
(12408, 12411),
(12409, 12411),
(12413, 12411),
(12415, 12411),
(12417, 12411),
(12418, 12411),
(12419, 12411),
(12421, 12411),
(12424, 12411),
(12425, 12411),
(12430, 12411),
(12432, 12411),
(12433, 12411),
(12434, 12411),
(12435, 12411),
(12437, 12411),
(12440, 12411),
(12399, 12412),
(12401, 12412),
(12402, 12412),
(12403, 12412),
(12404, 12412),
(12406, 12412),
(12408, 12412),
(12409, 12412),
(12410, 12412),
(12414, 12412),
(12416, 12412),
(12417, 12412),
(12418, 12412),
(12419, 12412),
(12420, 12412),
(12421, 12412),
(12422, 12412),
(12425, 12412),
(12426, 12412),
(12427, 12412),
(12429, 12412),
(12437, 12412),
(12440, 12412),
(12400, 12413),
(12403, 12413),
(12404, 12413),
(12406, 12413),
(12408, 12413),
(12409, 12413),
(12411, 12413),
(12415, 12413),
(12417, 12413),
(12418, 12413),
(12420, 12413),
(12422, 12413),
(12423, 12413),
(12426, 12413),
(12428, 12413),
(12430, 12413),
(12431, 12413),
(12432, 12413),
(12434, 12413),
(12437, 12413),
(12439, 12413),
(12399, 12414),
(12400, 12414),
(12404, 12414),
(12405, 12414),
(12407, 12414),
(12408, 12414),
(12409, 12414),
(12412, 12414),
(12416, 12414),
(12418, 12414),
(12420, 12414),
(12424, 12414),
(12426, 12414),
(12429, 12414),
(12430, 12414),
(12431, 12414),
(12432, 12414),
(12433, 12414),
(12434, 12414),
(12435, 12414),
(12436, 12414),
(12402, 12415),
(12406, 12415),
(12407, 12415),
(12408, 12415),
(12409, 12415),
(12411, 12415),
(12413, 12415),
(12416, 12415),
(12418, 12415),
(12421, 12415),
(12424, 12415),
(12427, 12415),
(12429, 12415),
(12430, 12415),
(12431, 12415),
(12432, 12415),
(12433, 12415),
(12435, 12415),
(12437, 12415),
(12399, 12416),
(12400, 12416),
(12402, 12416),
(12403, 12416),
(12405, 12416),
(12406, 12416),
(12407, 12416),
(12408, 12416),
(12412, 12416),
(12414, 12416),
(12415, 12416),
(12417, 12416),
(12420, 12416),
(12421, 12416),
(12422, 12416),
(12423, 12416),
(12424, 12416),
(12425, 12416),
(12426, 12416),
(12427, 12416),
(12428, 12416),
(12429, 12416),
(12430, 12416),
(12431, 12416),
(12433, 12416),
(12434, 12416),
(12437, 12416),
(12401, 12417),
(12404, 12417),
(12405, 12417),
(12406, 12417),
(12409, 12417),
(12410, 12417),
(12411, 12417),
(12412, 12417),
(12413, 12417),
(12416, 12417),
(12420, 12417),
(12421, 12417),
(12422, 12417),
(12424, 12417),
(12427, 12417),
(12429, 12417),
(12430, 12417),
(12432, 12417),
(12433, 12417),
(12434, 12417),
(12435, 12417),
(12437, 12417),
(12439, 12417),
(12402, 12418),
(12403, 12418),
(12404, 12418),
(12407, 12418),
(12410, 12418),
(12411, 12418),
(12412, 12418),
(12413, 12418),
(12414, 12418),
(12415, 12418),
(12420, 12418),
(12421, 12418),
(12423, 12418),
(12424, 12418),
(12426, 12418),
(12427, 12418),
(12428, 12418),
(12429, 12418),
(12431, 12418),
(12434, 12418),
(12437, 12418),
(12399, 12419),
(12400, 12419),
(12403, 12419),
(12405, 12419),
(12409, 12419),
(12410, 12419),
(12411, 12419),
(12412, 12419),
(12420, 12419),
(12423, 12419),
(12424, 12419),
(12426, 12419),
(12428, 12419),
(12429, 12419),
(12431, 12419),
(12433, 12419),
(12434, 12419),
(12435, 12419),
(12436, 12419),
(12437, 12419),
(12399, 12420),
(12400, 12420),
(12401, 12420),
(12403, 12420),
(12406, 12420),
(12407, 12420),
(12408, 12420),
(12409, 12420),
(12412, 12420),
(12413, 12420),
(12414, 12420),
(12416, 12420),
(12417, 12420),
(12418, 12420),
(12419, 12420),
(12421, 12420),
(12422, 12420),
(12426, 12420),
(12429, 12420),
(12430, 12420),
(12431, 12420),
(12436, 12420),
(12437, 12420),
(12402, 12421),
(12404, 12421),
(12405, 12421),
(12407, 12421),
(12408, 12421),
(12409, 12421),
(12410, 12421),
(12411, 12421),
(12412, 12421),
(12415, 12421),
(12416, 12421),
(12417, 12421),
(12418, 12421),
(12420, 12421),
(12422, 12421),
(12423, 12421),
(12424, 12421),
(12425, 12421),
(12428, 12421),
(12430, 12421),
(12431, 12421),
(12432, 12421),
(12433, 12421),
(12434, 12421),
(12436, 12421),
(12437, 12421),
(12438, 12421),
(12399, 12422),
(12405, 12422),
(12406, 12422),
(12408, 12422),
(12409, 12422),
(12412, 12422),
(12413, 12422),
(12416, 12422),
(12417, 12422),
(12420, 12422),
(12421, 12422),
(12425, 12422),
(12428, 12422),
(12429, 12422),
(12430, 12422),
(12432, 12422),
(12433, 12422),
(12434, 12422),
(12437, 12422),
(12399, 12423),
(12400, 12423),
(12402, 12423),
(12404, 12423),
(12408, 12423),
(12409, 12423),
(12413, 12423),
(12416, 12423),
(12418, 12423),
(12419, 12423),
(12421, 12423),
(12425, 12423),
(12426, 12423),
(12429, 12423),
(12431, 12423),
(12432, 12423),
(12433, 12423),
(12435, 12423),
(12399, 12424),
(12401, 12424),
(12402, 12424),
(12403, 12424),
(12404, 12424),
(12405, 12424),
(12406, 12424),
(12407, 12424),
(12408, 12424),
(12409, 12424),
(12411, 12424),
(12414, 12424),
(12415, 12424),
(12416, 12424),
(12417, 12424),
(12418, 12424),
(12419, 12424),
(12421, 12424),
(12426, 12424),
(12427, 12424),
(12428, 12424),
(12429, 12424),
(12430, 12424),
(12432, 12424),
(12433, 12424),
(12438, 12424),
(12401, 12425),
(12402, 12425),
(12403, 12425),
(12404, 12425),
(12408, 12425),
(12411, 12425),
(12412, 12425),
(12416, 12425),
(12421, 12425),
(12422, 12425),
(12423, 12425),
(12430, 12425),
(12431, 12425),
(12432, 12425),
(12434, 12425),
(12438, 12425),
(12400, 12426),
(12401, 12426),
(12408, 12426),
(12409, 12426),
(12412, 12426),
(12413, 12426),
(12414, 12426),
(12416, 12426),
(12418, 12426),
(12419, 12426),
(12420, 12426),
(12423, 12426),
(12424, 12426),
(12427, 12426),
(12428, 12426),
(12429, 12426),
(12430, 12426),
(12434, 12426),
(12435, 12426),
(12436, 12426),
(12399, 12427),
(12400, 12427),
(12402, 12427),
(12406, 12427),
(12407, 12427),
(12408, 12427),
(12412, 12427),
(12415, 12427),
(12416, 12427),
(12417, 12427),
(12418, 12427),
(12424, 12427),
(12426, 12427),
(12428, 12427),
(12429, 12427),
(12431, 12427),
(12432, 12427),
(12436, 12427),
(12438, 12427),
(12439, 12427),
(12399, 12428),
(12400, 12428),
(12403, 12428),
(12404, 12428),
(12406, 12428),
(12407, 12428),
(12409, 12428),
(12410, 12428),
(12413, 12428),
(12416, 12428),
(12418, 12428),
(12419, 12428),
(12421, 12428),
(12422, 12428),
(12424, 12428),
(12426, 12428),
(12427, 12428),
(12430, 12428),
(12431, 12428),
(12432, 12428),
(12434, 12428),
(12436, 12428),
(12399, 12429),
(12402, 12429),
(12406, 12429),
(12407, 12429),
(12409, 12429),
(12412, 12429),
(12414, 12429),
(12415, 12429),
(12416, 12429),
(12417, 12429),
(12418, 12429),
(12419, 12429),
(12420, 12429),
(12422, 12429),
(12423, 12429),
(12424, 12429),
(12426, 12429),
(12427, 12429),
(12430, 12429),
(12432, 12429),
(12433, 12429),
(12435, 12429),
(12436, 12429),
(12437, 12429),
(12399, 12430),
(12402, 12430),
(12403, 12430),
(12404, 12430),
(12405, 12430),
(12406, 12430),
(12408, 12430),
(12410, 12430),
(12411, 12430),
(12413, 12430),
(12414, 12430),
(12415, 12430),
(12416, 12430),
(12417, 12430),
(12420, 12430),
(12421, 12430),
(12422, 12430),
(12424, 12430),
(12425, 12430),
(12426, 12430),
(12428, 12430),
(12429, 12430),
(12431, 12430),
(12432, 12430),
(12434, 12430),
(12436, 12430),
(12437, 12430),
(12439, 12430),
(12400, 12431),
(12402, 12431),
(12407, 12431),
(12408, 12431),
(12409, 12431),
(12413, 12431),
(12414, 12431),
(12415, 12431),
(12416, 12431),
(12418, 12431),
(12419, 12431),
(12420, 12431),
(12421, 12431),
(12423, 12431),
(12425, 12431),
(12427, 12431),
(12428, 12431),
(12430, 12431),
(12433, 12431),
(12435, 12431),
(12436, 12431),
(12437, 12431),
(12440, 12431),
(12401, 12432),
(12402, 12432),
(12403, 12432),
(12405, 12432),
(12407, 12432),
(12410, 12432),
(12411, 12432),
(12413, 12432),
(12414, 12432),
(12415, 12432),
(12417, 12432),
(12421, 12432),
(12422, 12432),
(12423, 12432),
(12424, 12432),
(12425, 12432),
(12427, 12432),
(12428, 12432),
(12429, 12432),
(12430, 12432),
(12433, 12432),
(12400, 12433),
(12402, 12433),
(12403, 12433),
(12404, 12433),
(12406, 12433),
(12408, 12433),
(12409, 12433),
(12411, 12433),
(12414, 12433),
(12415, 12433),
(12416, 12433),
(12417, 12433),
(12419, 12433),
(12421, 12433),
(12422, 12433),
(12423, 12433),
(12424, 12433),
(12429, 12433),
(12431, 12433),
(12432, 12433),
(12435, 12433),
(12436, 12433),
(12437, 12433),
(12401, 12434),
(12402, 12434),
(12404, 12434),
(12407, 12434),
(12408, 12434),
(12409, 12434),
(12410, 12434),
(12411, 12434),
(12413, 12434),
(12414, 12434),
(12416, 12434),
(12417, 12434),
(12418, 12434),
(12419, 12434),
(12421, 12434),
(12422, 12434),
(12425, 12434),
(12426, 12434),
(12428, 12434),
(12430, 12434),
(12435, 12434),
(12440, 12434),
(12400, 12435),
(12402, 12435),
(12405, 12435),
(12409, 12435),
(12410, 12435),
(12411, 12435),
(12414, 12435),
(12415, 12435),
(12417, 12435),
(12419, 12435),
(12423, 12435),
(12426, 12435),
(12429, 12435),
(12431, 12435),
(12433, 12435),
(12434, 12435),
(12399, 12436),
(12400, 12436),
(12414, 12436),
(12419, 12436),
(12420, 12436),
(12421, 12436),
(12426, 12436),
(12427, 12436),
(12428, 12436),
(12429, 12436),
(12430, 12436),
(12431, 12436),
(12433, 12436),
(12400, 12437),
(12406, 12437),
(12407, 12437),
(12409, 12437),
(12411, 12437),
(12412, 12437),
(12413, 12437),
(12415, 12437),
(12416, 12437),
(12417, 12437),
(12418, 12437),
(12419, 12437),
(12420, 12437),
(12421, 12437),
(12422, 12437),
(12429, 12437),
(12430, 12437),
(12431, 12437),
(12433, 12437),
(12399, 12438),
(12401, 12438),
(12404, 12438),
(12407, 12438),
(12421, 12438),
(12424, 12438),
(12425, 12438),
(12427, 12438),
(12401, 12439),
(12402, 12439),
(12405, 12439),
(12406, 12439),
(12413, 12439),
(12417, 12439),
(12427, 12439),
(12430, 12439),
(12400, 12440),
(12406, 12440),
(12407, 12440),
(12410, 12440),
(12411, 12440),
(12412, 12440),
(12431, 12440),
(12434, 12440),
(12399, 12444);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `GroupID` int(40) NOT NULL,
  `GroupName` varchar(50) NOT NULL,
  `CreatorID` int(20) NOT NULL COMMENT 'Needs to be changed before a user gets deleted!!',
  `PhotoID` varchar(200) NOT NULL,
  `ShortDescrip` varchar(150) NOT NULL,
  `CreatedTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`GroupID`, `GroupName`, `CreatorID`, `PhotoID`, `ShortDescrip`, `CreatedTime`) VALUES
(1, '$GroupName', 12400, '0', '$ShortDescrip', '2017-03-10 16:34:21'),
(2, 'asd', 12400, '0', 'asd', '2017-03-10 21:39:58'),
(3, 'Awesome Name', 12400, '0', 'hmmm', '2017-03-10 21:48:17'),
(4, 'FynnsFuckers', 12444, '0', 'i love it', '2017-03-11 00:00:03'),
(5, 'Pano Development Team', 12399, '534543', 'This is the Circle for the Pano Development Team', '2017-03-12 00:10:44'),
(6, 'Awesome Group', 12399, '5', 'Just testing, nothing to see here!', '2017-03-12 23:36:27'),
(7, 'TEsting', 12399, '12399', 'fdsfdsfsfdsfdsf', '2017-03-12 23:38:44'),
(8, 'fdsfdsf', 12399, '0', 'fdsfdsfdsffegrgr', '2017-03-12 23:41:48'),
(9, 'Awesome group!!!!!!', 12399, '234ab9ca9de807abe1cfc493a23297fd26d1e6a571a5a28c1a48a946280a0834', 'This is an awesome group!', '2017-03-12 23:49:46'),
(10, 'tstrintintgr', 12399, '22ea2246aff6ff15bdb27e1b82b1866cbde08024976934f2dc9ff24cd0ad6149', 'fdsfsdfdsfdsfdsf', '2017-03-12 23:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `PostID` varchar(200) NOT NULL,
  `UserID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`PostID`, `UserID`) VALUES
('0b6ae7ad32e6b39d0460bdde67ff88632d8e94727242c25240688ba167f29dc7', 12399),
('49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 12399),
('176f2271bc3e9b2e62641e5c24e4307121ad698e1193a6ea444d202bdbb4cd5e', 12400),
('77f38c5a1ea518b67194f81e6c51b108b1cf45cab1c9cc03e7aeb641fe151c09', 12400),
('49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 12401),
('5fbdf1f6278c9360039898fa24b8dde58c0dfc4d5015183352bd4e38a4ea6d1d', 12401),
('bc48278dfb82b7b7a88ed4f05774045892e40ac623c639df81aa4f2454dc2d97', 12401),
('bfc775003d11e1214d785b96f88d16d625f64810af0270b67955a4beffdff249', 12401),
('c95d295b630fe9da6d424b074fee4422a8a8de147e520ecf608d22862ec74013', 12404),
('49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 12405),
('c95d295b630fe9da6d424b074fee4422a8a8de147e520ecf608d22862ec74013', 12405),
('49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 12407),
('49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 12409),
('bc48278dfb82b7b7a88ed4f05774045892e40ac623c639df81aa4f2454dc2d97', 12412),
('5fbdf1f6278c9360039898fa24b8dde58c0dfc4d5015183352bd4e38a4ea6d1d', 12416),
('c95d295b630fe9da6d424b074fee4422a8a8de147e520ecf608d22862ec74013', 12417),
('bfc775003d11e1214d785b96f88d16d625f64810af0270b67955a4beffdff249', 12418),
('bc48278dfb82b7b7a88ed4f05774045892e40ac623c639df81aa4f2454dc2d97', 12422),
('49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 12424),
('bfc775003d11e1214d785b96f88d16d625f64810af0270b67955a4beffdff249', 12424),
('bfc775003d11e1214d785b96f88d16d625f64810af0270b67955a4beffdff249', 12427),
('49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 12431),
('49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 12435),
('49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 12437),
('5fbdf1f6278c9360039898fa24b8dde58c0dfc4d5015183352bd4e38a4ea6d1d', 12439),
('5fbdf1f6278c9360039898fa24b8dde58c0dfc4d5015183352bd4e38a4ea6d1d', 12440);

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

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`MessageID`, `GroupID`, `UserID`, `Content`, `MessageTime`) VALUES
(1, 4, 12444, 'Love Law life', '2017-03-11 00:00:10'),
(2, 5, 12399, 'This is coming along nicely!', '2017-03-12 19:59:07'),
(3, 9, 12399, 'OOOO', '2017-03-12 23:52:17'),
(4, 9, 12399, 'greg', '2017-03-13 00:15:52'),
(5, 9, 12399, 'gregregreg', '2017-03-13 00:15:56'),
(6, 9, 12399, 'grgregregregregreg', '2017-03-13 00:15:58'),
(7, 9, 12399, 'gregrgregregergregregerg', '2017-03-13 00:16:03'),
(8, 9, 12399, 'grgregregrgre', '2017-03-13 00:16:06'),
(9, 9, 12399, 'gregregreg', '2017-03-13 00:16:09'),
(10, 9, 12399, 'gregregregergre', '2017-03-13 00:16:12'),
(11, 9, 12399, 'grgregregreg', '2017-03-13 00:16:15'),
(12, 9, 12399, 'hhtrhtr', '2017-03-13 00:17:52'),
(13, 5, 12399, 'tegergregregre', '2017-03-13 00:18:01'),
(14, 5, 12399, 'lolololol', '2017-03-13 00:18:11'),
(15, 5, 12399, 'fefewfwe', '2017-03-13 00:18:39'),
(16, 10, 12399, 'thtrhtrh', '2017-03-13 00:20:16'),
(17, 10, 12399, 'yololol', '2017-03-13 00:38:28'),
(18, 9, 12399, 'fdfdsfdsf', '2017-03-13 00:39:31'),
(19, 9, 12399, 'fdsfdsfdsfds', '2017-03-13 00:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `photocollectionsmapping`
--

CREATE TABLE `photocollectionsmapping` (
  `CollectionID` int(40) NOT NULL,
  `PostID` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `photocollectionsmapping`
--

INSERT INTO `photocollectionsmapping` (`CollectionID`, `PostID`) VALUES
(15, '0b6ae7ad32e6b39d0460bdde67ff88632d8e94727242c25240688ba167f29dc7'),
(17, '0b6ae7ad32e6b39d0460bdde67ff88632d8e94727242c25240688ba167f29dc7'),
(8, '176f2271bc3e9b2e62641e5c24e4307121ad698e1193a6ea444d202bdbb4cd5e'),
(9, '176f2271bc3e9b2e62641e5c24e4307121ad698e1193a6ea444d202bdbb4cd5e'),
(10, '176f2271bc3e9b2e62641e5c24e4307121ad698e1193a6ea444d202bdbb4cd5e'),
(11, '176f2271bc3e9b2e62641e5c24e4307121ad698e1193a6ea444d202bdbb4cd5e'),
(13, '176f2271bc3e9b2e62641e5c24e4307121ad698e1193a6ea444d202bdbb4cd5e'),
(14, '176f2271bc3e9b2e62641e5c24e4307121ad698e1193a6ea444d202bdbb4cd5e'),
(17, '5397759102fa55e3a234ae1146b7ab350483caabeeec4809964aab53fac4ccd5'),
(16, 'b78d944edf11609ee30b3cfd6b942fb69012a29f0b310327d45040b6f6115b49'),
(15, 'b9c1dd335f17a1f092df68bb066fafff699c5136aa162efd8df05e30f21c37b5'),
(18, 'b9c1dd335f17a1f092df68bb066fafff699c5136aa162efd8df05e30f21c37b5'),
(11, 'd64a9ffc441847c5360d1a4503cd2a5ea529b2d86dbb7966f35df90d30de79aa'),
(12, 'd64a9ffc441847c5360d1a4503cd2a5ea529b2d86dbb7966f35df90d30de79aa'),
(14, 'd64a9ffc441847c5360d1a4503cd2a5ea529b2d86dbb7966f35df90d30de79aa'),
(18, 'd8bac6816eeae2d04ebd7619db8eae089507b1b32b93faafd99858fffa281dd3'),
(17, 'da11a03ed0c1109b391c17793c55b63f31f054ca6652f80fd3364d76079a1757');

-- --------------------------------------------------------

--

-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `PostID` varchar(200) NOT NULL,
  `UserID` int(20) NOT NULL,
  `PostText` text NOT NULL,
  `PostTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `PostLocation` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`PostID`, `UserID`, `PostText`, `PostTime`, `PostLocation`) VALUES
('0b6ae7ad32e6b39d0460bdde67ff88632d8e94727242c25240688ba167f29dc7', 12399, '#OldTrafford #ManchesterUnited #BestTeamInTheWorld', '2017-03-12 02:18:31', 'Manchester, England'),
('176f2271bc3e9b2e62641e5c24e4307121ad698e1193a6ea444d202bdbb4cd5e', 12400, 'Best view ever!', '2017-03-10 20:42:45', 'Austria'),
('22640e7e92f84b2e4840c036172ab1e8c4ec2b5086663461ee8c3c8f5241668c', 12399, '#Bali #Indonesia #Volcano #Lake', '2017-03-12 20:05:26', 'Bali, Indonesia'),
('49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 12401, 'Does this work? In my free time i like to go nude :) #fkk', '2017-03-10 17:23:33', 'Eastern Germany'),
('49ed69f7acd55f24b134db4176beeeb42ab566019d0230eb1953d28da664e2a3', 12399, '#montreal #canada #socold', '2017-03-12 18:41:31', 'Montreal, QC, Canada'),
('5397759102fa55e3a234ae1146b7ab350483caabeeec4809964aab53fac4ccd5', 12399, '#hollywood #fromtheback', '2017-03-12 15:44:00', 'Los Angeles, USA'),
('5b3113b514f25ee329d7068bd791b5a0c2b4915e206e6e1e5d64e7c73635e822', 12399, '#NiagaraFalls ', '2017-03-12 11:13:23', 'Niagara Falls, Canada/USA'),
('5fbdf1f6278c9360039898fa24b8dde58c0dfc4d5015183352bd4e38a4ea6d1d', 12401, 'Hello World', '2017-03-10 17:15:17', 'Sierra Nevada'),
('b78d944edf11609ee30b3cfd6b942fb69012a29f0b310327d45040b6f6115b49', 12445, '#trafalgarsquare #london', '2017-03-12 15:46:36', 'London, United Kingdom'),
('b8c42179f5738e5f91c3642b49ba0b4b71ba4a432401551fd0773a3ba0b0abd3', 12399, '#snowymountains #switzerland #cool', '2017-03-13 23:38:42', 'Swiss Alps, Airolo, Switzerland'),
('b9c1dd335f17a1f092df68bb066fafff699c5136aa162efd8df05e30f21c37b5', 12399, 'Iceland is awesome #glacier', '2017-03-10 20:24:07', 'Iceland'),
('bc48278dfb82b7b7a88ed4f05774045892e40ac623c639df81aa4f2454dc2d97', 12401, 'Hello world?', '2017-03-10 17:17:24', 'Sierra Nevada'),
('bfc775003d11e1214d785b96f88d16d625f64810af0270b67955a4beffdff249', 12401, 'best day of my life!!!!', '2017-03-10 18:09:57', 'hehe'),
('c89fb764661ef45e83c821e38a0a7d09aa1f4ab035e938bde2fa6b9723b95d29', 12399, 'North Korea is great', '2017-03-13 10:59:06', 'Pyongyang, North Korea'),
('c95d295b630fe9da6d424b074fee4422a8a8de147e520ecf608d22862ec74013', 12401, 'profile', '2017-03-10 17:01:03', 'bitte'),
('c982020a0701adccb5e95a84ee626a5286639ad3b8a6113024afe3774c8b2be7', 12450, 'besties', '2017-03-12 21:14:54', 'Brazil'),
('d1290e3f37399c7738e4703fcc4c6a3bccd17d06dc451bb657990a7509c13fcb', 12445, '#phoenix #sunset', '2017-03-12 15:47:22', 'Phoenix, AZ, United States'),
('d64a9ffc441847c5360d1a4503cd2a5ea529b2d86dbb7966f35df90d30de79aa', 12400, 'wuhu', '2017-03-10 22:21:57', 'London'),
('d8bac6816eeae2d04ebd7619db8eae089507b1b32b93faafd99858fffa281dd3', 12399, 'Iceland Mountains #mountains #cool #icelandisgreat', '2017-03-12 22:45:03', 'Iceland'),
('da11a03ed0c1109b391c17793c55b63f31f054ca6652f80fd3364d76079a1757', 12399, '#weclimbedamountain', '2017-03-12 11:03:26', 'Nara, Japan'),
('ed9351ef3520b703ff02f353ac925094b81aef7219c1199d4c688384fbdaf540', 12426, 'Sydney at Night #sydneyharbourbridge', '2017-03-12 11:26:15', 'Sydney, Australia');

-- --------------------------------------------------------

--
-- Table structure for table `privacysettings`
--

CREATE TABLE `privacysettings` (
  `SettingID` int(5) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `privacysettings`
--

INSERT INTO `privacysettings` (`SettingID`, `Description`) VALUES
(1, 'Friends Only'),
(2, 'Friends of Friends'),
(3, 'Public'),
(4, 'With a Group Only');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `TagID` int(20) NOT NULL,
  `TagName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`TagID`, `TagName`) VALUES
(4, '#bali'),
(3, '#bestteamintheworld'),
(10, '#canada'),
(21, '#cool'),
(8, '#fkk'),
(13, '#fromtheback'),
(17, '#glacier'),
(12, '#hollywood'),
(22, '#icelandisgreat'),
(5, '#indonesia'),
(7, '#lake'),
(16, '#london'),
(2, '#manchesterunited'),
(9, '#montreal'),
(20, '#mountains'),
(14, '#niagarafalls'),
(1, '#oldtrafford'),
(18, '#phoenix'),
(49, '#snowymountains'),
(11, '#socold'),
(19, '#sunset'),
(50, '#switzerland'),
(24, '#sydneyharbourbridge'),
(15, '#trafalgarsquare'),
(6, '#volcano'),
(23, '#weclimbedamountain');

-- --------------------------------------------------------

--
-- Table structure for table `tagspostsmapping`
--

CREATE TABLE `tagspostsmapping` (
  `TagID` int(20) NOT NULL,
  `PostID` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tagspostsmapping`
--

INSERT INTO `tagspostsmapping` (`TagID`, `PostID`) VALUES
(1, '0b6ae7ad32e6b39d0460bdde67ff88632d8e94727242c25240688ba167f29dc7'),
(2, '0b6ae7ad32e6b39d0460bdde67ff88632d8e94727242c25240688ba167f29dc7'),
(3, '0b6ae7ad32e6b39d0460bdde67ff88632d8e94727242c25240688ba167f29dc7'),
(4, '22640e7e92f84b2e4840c036172ab1e8c4ec2b5086663461ee8c3c8f5241668c'),
(5, '22640e7e92f84b2e4840c036172ab1e8c4ec2b5086663461ee8c3c8f5241668c'),
(6, '22640e7e92f84b2e4840c036172ab1e8c4ec2b5086663461ee8c3c8f5241668c'),
(7, '22640e7e92f84b2e4840c036172ab1e8c4ec2b5086663461ee8c3c8f5241668c'),
(8, '49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335'),
(9, '49ed69f7acd55f24b134db4176beeeb42ab566019d0230eb1953d28da664e2a3'),
(10, '49ed69f7acd55f24b134db4176beeeb42ab566019d0230eb1953d28da664e2a3'),
(11, '49ed69f7acd55f24b134db4176beeeb42ab566019d0230eb1953d28da664e2a3'),
(12, '5397759102fa55e3a234ae1146b7ab350483caabeeec4809964aab53fac4ccd5'),
(13, '5397759102fa55e3a234ae1146b7ab350483caabeeec4809964aab53fac4ccd5'),
(14, '5b3113b514f25ee329d7068bd791b5a0c2b4915e206e6e1e5d64e7c73635e822'),
(15, 'b78d944edf11609ee30b3cfd6b942fb69012a29f0b310327d45040b6f6115b49'),
(16, 'b78d944edf11609ee30b3cfd6b942fb69012a29f0b310327d45040b6f6115b49'),
(21, 'b8c42179f5738e5f91c3642b49ba0b4b71ba4a432401551fd0773a3ba0b0abd3'),
(49, 'b8c42179f5738e5f91c3642b49ba0b4b71ba4a432401551fd0773a3ba0b0abd3'),
(50, 'b8c42179f5738e5f91c3642b49ba0b4b71ba4a432401551fd0773a3ba0b0abd3'),
(17, 'b9c1dd335f17a1f092df68bb066fafff699c5136aa162efd8df05e30f21c37b5'),
(18, 'd1290e3f37399c7738e4703fcc4c6a3bccd17d06dc451bb657990a7509c13fcb'),
(19, 'd1290e3f37399c7738e4703fcc4c6a3bccd17d06dc451bb657990a7509c13fcb'),
(20, 'd8bac6816eeae2d04ebd7619db8eae089507b1b32b93faafd99858fffa281dd3'),
(21, 'd8bac6816eeae2d04ebd7619db8eae089507b1b32b93faafd99858fffa281dd3'),
(22, 'd8bac6816eeae2d04ebd7619db8eae089507b1b32b93faafd99858fffa281dd3'),
(23, 'da11a03ed0c1109b391c17793c55b63f31f054ca6652f80fd3364d76079a1757'),
(24, 'ed9351ef3520b703ff02f353ac925094b81aef7219c1199d4c688384fbdaf540');

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
  `SettingID` int(5) NOT NULL DEFAULT '3',
  `ProfilePictureID` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FirstName`, `LastName`, `UserName`, `EmailAddress`, `Password`, `Location`, `ShortDescrip`, `DateCreated`, `SettingID`, `ProfilePictureID`) VALUES
(12399, 'Li', 'Xie', 'Liko', 'liko@mail.com', '$2y$10$SW1DWeNQuLcFdbWs2PgXiO5VqCrUDdzJ173sEi/tLmL9oWsXWmI4G', 'London, United Kingdom', ' Pano is a great app - one of the best!', '2017-02-21 18:24:29', 2, '12399'),
(12400, 'Lucas', 'Valtl', 'Lucas', 'lucas@pano.com', '$2y$10$KZHC1VBrAWtUZJPrcwyb9uL1TWIwJqP9FIYT7O2k4BNvK5PX8ZYay', 'London', '   I like Pano', '2017-02-21 18:25:19', 3, '12400'),
(12401, 'Florian', 'Obst', 'Florian', 'florian@pano.com', '$2y$10$JCCx7lZflspi.B55V7j8bOEuJG.gM1MlpeQbrZDeYiT8oh0MLRm2m', 'London', 'Go Pano Go', '2017-02-21 18:25:47', 3, '0'),
(12402, 'Johannes', 'Landgraf', 'Johannes', 'johannes@pano.com', '$2y$10$6Bq0sco8ddlwFUy47oNAA.Nm.QvD7wmMtYaA.z6iuRsjLOOLyHWHm', 'London', 'Pano is great', '2017-02-21 18:26:32', 3, '0'),
(12403, 'Noob', 'Master', 'Noob123', 'noob@mail.com', '$2y$10$bfqBPR5mPB0nuuY4SAEOo.M090R/7Q3x/b/N10T5Hpkku7U3kcLfG', 'London', 'I am a noob', '2017-02-22 22:57:13', 3, '0'),
(12404, 'Secret', 'Guy', 'PanoMaster', 'pano@mail.com', '$2y$10$ty.2qdk5XT4G0JKIPep5VeLmYeeOF4qA.0CzerybEIauymnIGIzHa', 'Manchester', 'I am just a test account. Nothing special here really.', '2017-03-03 19:22:06', 3, '0'),
(12405, 'John', 'Smith', 'braveAsian', 'brave@brave.com', '$2y$10$uIqDRSHJcUTOKoClHm4pH.R46lAjMea.bJTbLqHbGkFnP8Wk/jWIm', 'Hawaii', 'I killed a lion once', '2017-03-03 19:28:37', 3, '0'),
(12406, 'Samuel', 'Yoloman', 'yolo_merchant', 'yolo@yolo.com', '$2y$10$24/4oboKR4gqDakyRHr1MejMpXjAmdGhWIziY2fV0bxtXq4HtTeCq', 'Edinburgh', 'I buy and sell yolo', '2017-03-03 19:50:23', 3, '0'),
(12407, 'Max', 'Power', 'power_ranger246', 'power@power.com', '$2y$10$82YF6Km3trd/N3Q./ZKHt.cZduYyiFu2yXj2EAICXzhCzLNu./jk2', 'Reading', 'I like power rangers', '2017-03-03 19:52:31', 3, '0'),
(12408, 'Crash', 'Bandicoot', 'CrashBandicoot', 'crash@crash.com', '$2y$10$hTY.hC9Zr.wzkVRfCMVhMeHbtjtqhufX/AU.YP5JdZypyAKwy/sGO', 'CrashLand', 'I have a remake coming out soon!', '2017-03-03 19:54:34', 3, '0'),
(12409, 'Ghost', 'Sniper', 'ghostsniper64', 'ghosty@snipes.com', '$2y$10$JK3i/3aFD2GzQdOU5QUi6u44NPvau6jBwfF4UpT/ZCed/8cVPf96a', 'London', 'I hide in the grass and wait for people to come out of cover.', '2017-03-03 20:02:49', 3, '0'),
(12410, 'Daniel', 'Hernandez', 'SuperSuperMario', 'supermario@supermail.com', '$2y$10$/BwLMoyPhfcEpfIshpJux.V0QBLj6tio5lWok.kF6gLlovP6ecpAi', 'Paris', 'Hi Im Daniel Hernandez, and I love photography. Pano is great!', '2017-03-04 15:49:00', 3, '0'),
(12411, 'Harry', 'Johnson', 'GreatElephant_gal', 'GreatElephant_gal@master.com', '$2y$10$oAXkitKKp8J8xMOXYj/34uzHMc1vL4ljNY8uMsYP7vh.Yx8VDp3gy', 'Manchester', 'Hi Im Harry Johnson, and I love photography. Pano is great!', '2017-03-04 15:49:00', 3, '0'),
(12412, 'Michelle', 'Andersen', 'SleepySpeaker123', 'SleepySpeaker123@panoapp.com', '$2y$10$Yb.GLoF0j/DSu4GHKTx.EuCaAcCuJoAJHNyITWjr3hWvbRjs9.H5S', 'Manchester', 'Hi Im Michelle Andersen, and I love photography. Pano is great!', '2017-03-04 15:49:01', 3, '0'),
(12413, 'Harry', 'Zhao', 'SneakyBowl', 'SneakyBowl@ok.com', '$2y$10$KdoT.k5gUvSDr2EYhrS5fO3uNH.wq7QRMJ.B0KctJrlAWeHogptvm', 'Milan', 'Hi Im Harry Zhao, and I love photography. Pano is great!', '2017-03-04 15:49:01', 3, '0'),
(12414, 'Michelle', 'Gunaydin', 'SleepyTuna', 'SleepyTuna@ok.com', '$2y$10$ynszWRXh4wjeEnqFxJ.0w.7.IqG37l.e3muy01JEWLMkhjI2XBcLm', 'Berlin', 'Hi Im Michelle Gunaydin, and I love photography. Pano is great!', '2017-03-04 15:49:01', 3, '0'),
(12415, 'Andrew', 'Lee', 'SpecialDinosaur246', 'SpecialDinosaur246@lol.com', '$2y$10$Z.tMlyWSrOXXSPqC5zHCKumDyGf1oEq8bdtP.J2Vi4obWk2Ab0fZK', 'Berlin', 'Hi Im Andrew Lee, and I love photography. Pano is great!', '2017-03-04 17:41:05', 3, '0'),
(12416, 'Jess', 'Nguyen', 'SneakyBowl666', 'SneakyBowl666@ucl.ac.uk', '$2y$10$ZNL1ghJVZNazi5UzgQpksOJQ8xl9/gKawez0D4evHEOLIqwwwTxaO', 'Montreal', 'Hi Im Jess Nguyen, and I love photography. Pano is great!', '2017-03-04 17:41:05', 3, '0'),
(12417, 'Peter', 'Nguyen', 'FaultedDinosaur', 'FaultedDinosaur@lol.com', '$2y$10$.yrKEyyor5V566fZQJ3LiuKYx1663ssKtjX0/S2ozyTmQAtnvIAxi', 'Dublin', 'Hi Im Peter Nguyen, and I love photography. Pano is great!', '2017-03-04 17:41:06', 3, '0'),
(12418, 'Sarah', 'Kuznetzov', 'Sneakymonster', 'Sneakymonster@ucl.ac.uk', '$2y$10$cF8bJRyWrSbqQxiDFQ0MJuEyP6GM3Gi/Ij9wtSMf1qZf3KpQn.vAG', 'Belfast', 'Hi Im Sarah Kuznetzov, and I love photography. Pano is great!', '2017-03-04 17:41:06', 3, '0'),
(12419, 'Claire', 'Johnson', 'A_Snake', 'A_Snake@panoapp.com', '$2y$10$CA7tYdn05nhzH.NcOihWYeq3BTI1wlU3n3D4RrY6zLZd5IZS1HYla', 'Paris', 'Hi Im Claire Johnson, and I love photography. Pano is great!', '2017-03-04 17:41:06', 3, '0'),
(12420, 'Peter', 'Muller', 'DragonTuna246', 'DragonTuna246@lol.com', '$2y$10$q6jhAS4yjspxMeS6kexptOAY5hkjBOZpHF8RpwTzQf/QVuybxpEDq', 'Birmingham', 'Hi Im Peter Muller, and I love photography. Pano is great!', '2017-03-04 17:41:07', 3, '0'),
(12421, 'Daniel', 'Kuznetzov', 'AngryBookLass', 'AngryBookLass@panoapp.com', '$2y$10$YvVCoTLquPP4f/eGUAt2LOfFHfPLLJvcwJoDSaFm1yJExr2Rw0RrO', 'Toronto', 'Hi Im Daniel Kuznetzov, and I love photography. Pano is great!', '2017-03-04 17:41:07', 3, '0'),
(12422, 'Sally', 'Thompson', 'TheOneAndOnlyBook', 'TheOneAndOnlyBook@panoapp.com', '$2y$10$tWwQRZGyhvN3W0YFKRZ/cO2nmRDJax5XJaQ386H64ArHweOJuWKt6', 'Montpellier', 'Hi Im Sally Thompson, and I love photography. Pano is great!', '2017-03-04 17:41:07', 3, '0'),
(12423, 'Michelle', 'Nguyen', 'ThePotato246', 'ThePotato246@mail.com', '$2y$10$puNV95xYewpXqnjpjJs3e..ZR5w34WM49olMz4r987PMSn5DfMGVO', 'Montreal', 'Hi Im Michelle Nguyen, and I love photography. Pano is great!', '2017-03-04 17:41:08', 3, '0'),
(12424, 'Sarah', 'Walker', 'AwesomeElephant', 'AwesomeElephant@supermail.com', '$2y$10$MzVHC1FqYqfCE6qIHjOHpuPKAjvF71HYIBYc0gtwYw.7uAFfuxT8S', 'New York', 'Hi Im Sarah Walker, and I love photography. Pano is great!', '2017-03-04 17:41:08', 3, '0'),
(12425, 'Sally', 'Zhao', 'SpecialSpeaker', 'SpecialSpeaker@mail.com', '$2y$10$ePFiP9oFHIUB.sA9OOqcUOnLbJxvxjzRmpdUVP8Uk37varieSeUX2', 'Dublin', 'Hi Im Sally Zhao, and I love photography. Pano is great!', '2017-03-04 17:41:08', 3, '0'),
(12426, 'Andrew', 'Ling', 'AwesomePlayer', 'AwesomePlayer@ok.com', '$2y$10$OagxNAnEnYb3Tt6sWISvZ.WRaFOMwA1BD1dFgh8lbAEyQUDeBxJU2', 'Paris', 'Hi Im Andrew Ling, and I love photography. Pano is great!', '2017-03-04 17:41:08', 1, '0'),
(12427, 'Maisie', 'Nguyen', 'amazingAntKing', 'amazingAntKing@lol.com', '$2y$10$486TAGeixbzIawI.Te4Oo.zQWkAvgS5Pw7EC5nR3JvVy0mH0CxFw2', 'Edinburgh', 'Hi Im Maisie Nguyen, and I love photography. Pano is great!', '2017-03-04 17:41:09', 3, '0'),
(12428, 'Drew', 'Thompson', 'TheRealPro_gal', 'TheRealPro_gal@lol.com', '$2y$10$JnMDeXlvqje.tLJD3ot9xOvqlk4gizfx/OsddKMrEKdFLohTDikR6', 'Dublin', 'Hi Im Drew Thompson, and I love photography. Pano is great!', '2017-03-04 17:41:09', 3, '0'),
(12429, 'Sarah', 'Kuznetzov', 'GreatTunaGirl', 'GreatTunaGirl@panoapp.com', '$2y$10$L251KOwaRdmX5VvfYLhgweFArOjVXZsn8GCEzUxMWaRqTHrh1YA26', 'San Francisco', 'Hi Im Sarah Kuznetzov, and I love photography. Pano is great!', '2017-03-04 17:41:09', 3, '0'),
(12430, 'John', 'Garcia', 'LazyOrangutan_fan', 'LazyOrangutan_fan@master.com', '$2y$10$KB18toUgrXrTfUyTE4lyXeqqGwGHR/HpVEDrDxBZDW3zmJxwjXDn6', 'New York', 'Hi Im John Garcia, and I love photography. Pano is great!', '2017-03-04 17:41:10', 3, '0'),
(12431, 'Peter', 'Johnson', 'TheUndisputedZebraGirl', 'TheUndisputedZebraGirl@mail.com', '$2y$10$SWpIgYIkBAQvff9w3Xvnb.cjhP89Jacdbm.HdUvVMa5gx3evR/Dxe', 'New York', 'Hi Im Peter Johnson, and I love photography. Pano is great!', '2017-03-04 17:41:10', 3, '0'),
(12432, 'Harry', 'Gonzalez', 'TheMonsterGirl', 'TheMonsterGirl@master.com', '$2y$10$CUuxgJPVv66St84h73TSpOViGE2um7iiHmSf64WTJzKukEKfG1LTS', 'London', 'Hi Im Harry Gonzalez, and I love photography. Pano is great!', '2017-03-04 17:41:10', 3, '0'),
(12433, 'Peter', 'Martina', 'AngryBowl', 'AngryBowl@panoapp.com', '$2y$10$HfVaYunUE1IDslmpt4MKru0MFKcK9c0bKMUXjjFeU83HQbZyLE822', 'Berlin', 'Hi Im Peter Martina, and I love photography. Pano is great!', '2017-03-04 17:41:11', 3, '0'),
(12434, 'Harry', 'Nguyen', 'SuperMonsterKing', 'SuperMonsterKing@lol.com', '$2y$10$LR/g.H/0zvPYGMEN1fVRWugMhi3a08EMc4peWaRLMNfUbdNKhTEqm', 'Montpellier', 'Hi Im Harry Nguyen, and I love photography. Pano is great!', '2017-03-04 17:41:11', 3, '0'),
(12435, 'Peter', 'Wu', 'TheUndisputedElephantmaster', 'TheUndisputedElephantmaster@panoapp.com', '$2y$10$l3myL66wU3Hre93YdnfPvujLuiOWyQKP/FHybh8vp7KtIfFfEHZim', 'Washington DC', 'Hi Im Peter Wu, and I love photography. Pano is great!', '2017-03-04 17:43:20', 3, '0'),
(12436, 'Drew', 'Wu', 'CrazyAntEaterLass', 'CrazyAntEaterLass@panoapp.com', '$2y$10$uBChQ4n4VbtIqFTYOuvQUuKFdMg6ZQXGM5Wl3gj/JFOLK6of1E61m', 'Montpellier', 'Hi Im Drew Wu, and I love photography. Pano is great!', '2017-03-04 17:43:21', 3, '0'),
(12437, 'Claire', 'Ivanov', 'SillyOrangutanMaster', 'SillyOrangutanMaster@panoapp.com', '$2y$10$wzFw7t1iYEfUrRmEx3FCjeYbvHSjqrK894LYGRvrx.MJgyuYsYnW6', 'New York', 'Hi Im Claire Ivanov, and I love photography. Pano is great!', '2017-03-04 17:43:21', 3, '0'),
(12438, 'Michelle', 'Park', 'SuperProGirl', 'SuperProGirl@supermail.com', '$2y$10$Z3FAB4AlszXqhqy.b5xf8eoeqiEKZK9NsAX19WnzFHD1soAZ9K.Vu', 'Montreal', 'Hi Im Michelle Park, and I love photography. Pano is great!', '2017-03-04 17:45:35', 3, '0'),
(12439, 'Sally', 'Martina', 'CrazyAntEaterKid', 'CrazyAntEaterKid@master.com', '$2y$10$e0iOOAQbjN/SvqZmmzCZJe.AqOG.Nveci2sSU6zSLV4r2XPRafhUC', 'Chicago', 'Hi Im Sally Martina, and I love photography. Pano is great!', '2017-03-04 17:45:35', 3, '0'),
(12440, 'Sarah', 'Johnson', 'SillyElephant_kid', 'SillyElephant_kid@supermail.com', '$2y$10$/ngHYtHUGYfb.oiBJg1i8eXr6c84psrqk4Uj6oKxDaESCIP1uMiyu', 'Toronto', 'Hi Im Sarah Johnson, and I love photography. Pano is great!', '2017-03-04 17:45:36', 3, '0'),
(12441, 'Jonathan', 'Gunaydin', 'SneakyBook1', 'SneakyBook1@panoapp.com', '$2y$10$n9xQ5aPLWrBgc.epM73MEuJhETRHjS8FjllXcFuKxkM4O1hC6mpSe', 'London', 'Hi Im Jonathan Gunaydin, and I love photography. Pano is great!', '2017-03-10 20:16:53', 3, '0'),
(12442, 'Jess', 'Nguyen', 'AwesomeBottle', 'AwesomeBottle@ucl.ac.uk', '$2y$10$uEiGBhZFZSaiopI0HaDWne0Rhmi/me42yZbb8H9ZYtVCkCi8jiZtS', 'San Francisco', 'Hi Im Jess Nguyen, and I love photography. Pano is great!', '2017-03-10 20:16:53', 3, '0'),
(12443, 'Michelle', 'Nguyen', 'amazingBottleLass', 'amazingBottleLass@master.com', '$2y$10$Zk1hKuMQU15mhjEJYqviH.I5/JU25XyVhi6ceDKXEosysyywLlXlm', 'Chicago', 'Hi Im Michelle Nguyen, and I love photography. Pano is great!', '2017-03-10 20:16:53', 3, '0'),
(12444, 'Fynn', 'Dewald', 'fynn', 'fynn@gmail.com', '$2y$10$GnDQaLqudLFIIPX9208zRO62AnjG8T42IsknR3wn0Fcjv42VNOOZ.', 'London', 'I love Law', '2017-03-10 23:59:17', 3, '0'),
(12445, 'Yolo', 'Wizard', 'YoloWizard', 'yolo@wizard.com', '$2y$10$HVyaVW7tXvjBDGmyz7ivu.3Tz5fh3QfRMItPH6OD5o8HqvisDqqFW', 'Hodor', 'I stack shields', '2017-03-12 14:45:26', 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `usergroupmapping`
--

CREATE TABLE `usergroupmapping` (
  `GroupID` int(40) NOT NULL,
  `UserID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `usergroupmapping`
--

INSERT INTO `usergroupmapping` (`GroupID`, `UserID`) VALUES
(5, 12399),
(6, 12399),
(7, 12399),
(8, 12399),
(9, 12399),
(10, 12399),
(2, 12400),
(3, 12400),
(5, 12400),
(6, 12400),
(7, 12400),
(9, 12400),
(10, 12400),
(5, 12401),
(6, 12401),
(9, 12401),
(5, 12402),
(8, 12405),
(9, 12405),
(9, 12406),
(3, 12419),
(3, 12426),
(2, 12427),
(3, 12427),
(3, 12433),
(4, 12444);


--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `PostsUserConstraint` (`UserID`);

--

-- Indexes for table `privacysettings`
--
ALTER TABLE `privacysettings`
  ADD PRIMARY KEY (`SettingID`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`TagID`),
  ADD UNIQUE KEY `TagName` (`TagName`);

--
-- Indexes for table `tagspostsmapping`
--
ALTER TABLE `tagspostsmapping`
  ADD PRIMARY KEY (`TagID`,`PostID`),
  ADD KEY `TagPostPostConstraint` (`PostID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `usergroupmapping`
--
ALTER TABLE `usergroupmapping`
  ADD PRIMARY KEY (`GroupID`,`UserID`),
  ADD KEY `UserGroupUserConstraint` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `CollectionID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11362;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `GroupID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `TagID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12448;
--

-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `PostsUserConstraint` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);


--
-- Constraints for table `tagspostsmapping`
--
ALTER TABLE `tagspostsmapping`
  ADD CONSTRAINT `TagPostPostConstraint` FOREIGN KEY (`PostID`) REFERENCES `posts` (`PostID`),
  ADD CONSTRAINT `TagPostTagConstraint` FOREIGN KEY (`TagID`) REFERENCES `tags` (`TagID`);

--
-- Constraints for table `usergroupmapping`
--
ALTER TABLE `usergroupmapping`
  ADD CONSTRAINT `UserGroupGroupConstraint` FOREIGN KEY (`GroupID`) REFERENCES `groups` (`GroupID`),
  ADD CONSTRAINT `UserGroupUserConstraint` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

