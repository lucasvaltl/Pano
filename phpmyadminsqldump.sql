-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 10, 2017 at 07:13 PM
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
(11356, 12401, '49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 'asd', '2017-03-10 18:09:06');

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
(12405, 12399),
(12406, 12399),
(12407, 12399),
(12410, 12399),
(12412, 12399),
(12414, 12399),
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
(12431, 12415),
(12432, 12415),
(12433, 12415),
(12435, 12415),
(12437, 12415),
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
(12435, 12417),
(12437, 12417),
(12439, 12417),
(12402, 12418),
(12403, 12418),
(12404, 12418),
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
(12418, 12434),
(12419, 12434),
(12421, 12434),
(12422, 12434),
(12425, 12434),
(12426, 12434),
(12428, 12434),
(12430, 12434),
(12435, 12434),
(12400, 12435),
(12402, 12435),
(12405, 12435),
(12410, 12435),
(12411, 12435),
(12414, 12435),
(12415, 12435),
(12417, 12435),
(12419, 12435),
(12423, 12435),
(12426, 12435),
(12431, 12435),
(12433, 12435),
(12434, 12435),
(12399, 12436),
(12400, 12436),
(12414, 12436),
(12419, 12436),
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
(12431, 12440);

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

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`GroupID`, `GroupName`, `CreatorID`, `PhotoID`, `ShortDescrip`, `CreatedTime`) VALUES
(1, '$GroupName', 12400, 0, '$ShortDescrip', '2017-03-10 16:34:21');

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
('49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 12401),
('5fbdf1f6278c9360039898fa24b8dde58c0dfc4d5015183352bd4e38a4ea6d1d', 12401),
('bc48278dfb82b7b7a88ed4f05774045892e40ac623c639df81aa4f2454dc2d97', 12401),
('bfc775003d11e1214d785b96f88d16d625f64810af0270b67955a4beffdff249', 12401),
('49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 12409);

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
-- Table structure for table `photocollectionsmapping`
--

CREATE TABLE `photocollectionsmapping` (
  `CollectionID` int(40) NOT NULL,
  `PostID` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

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
('49c4d2163dd13be90485c2e85b7f6eddbf128f8af2511748e0126de699185335', 12401, 'Does this work? In my free time i like to go nude :) #fkk', '2017-03-10 17:23:33', 'Eastern Germany'),
('5fbdf1f6278c9360039898fa24b8dde58c0dfc4d5015183352bd4e38a4ea6d1d', 12401, 'Hello World', '2017-03-10 17:15:17', 'Sierra Nevada'),
('bc48278dfb82b7b7a88ed4f05774045892e40ac623c639df81aa4f2454dc2d97', 12401, 'Hello world?', '2017-03-10 17:17:24', 'Sierra Nevada'),
('bfc775003d11e1214d785b96f88d16d625f64810af0270b67955a4beffdff249', 12401, 'best day of my life!!!!', '2017-03-10 18:09:57', 'hehe'),
('c95d295b630fe9da6d424b074fee4422a8a8de147e520ecf608d22862ec74013', 12401, 'profile', '2017-03-10 17:01:03', 'bitte');

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
(12414, 'Michelle', 'Gunaydin', 'SleepyTuna', 'SleepyTuna@ok.com', '$2y$10$ynszWRXh4wjeEnqFxJ.0w.7.IqG37l.e3muy01JEWLMkhjI2XBcLm', 'Berlin', 'Hi Im Michelle Gunaydin, and I love photography. Pano is great!', '2017-03-04 15:49:01', 3),
(12415, 'Andrew', 'Lee', 'SpecialDinosaur246', 'SpecialDinosaur246@lol.com', '$2y$10$Z.tMlyWSrOXXSPqC5zHCKumDyGf1oEq8bdtP.J2Vi4obWk2Ab0fZK', 'Berlin', 'Hi Im Andrew Lee, and I love photography. Pano is great!', '2017-03-04 17:41:05', 3),
(12416, 'Jess', 'Nguyen', 'SneakyBowl666', 'SneakyBowl666@ucl.ac.uk', '$2y$10$ZNL1ghJVZNazi5UzgQpksOJQ8xl9/gKawez0D4evHEOLIqwwwTxaO', 'Montreal', 'Hi Im Jess Nguyen, and I love photography. Pano is great!', '2017-03-04 17:41:05', 3),
(12417, 'Peter', 'Nguyen', 'FaultedDinosaur', 'FaultedDinosaur@lol.com', '$2y$10$.yrKEyyor5V566fZQJ3LiuKYx1663ssKtjX0/S2ozyTmQAtnvIAxi', 'Dublin', 'Hi Im Peter Nguyen, and I love photography. Pano is great!', '2017-03-04 17:41:06', 3),
(12418, 'Sarah', 'Kuznetzov', 'Sneakymonster', 'Sneakymonster@ucl.ac.uk', '$2y$10$cF8bJRyWrSbqQxiDFQ0MJuEyP6GM3Gi/Ij9wtSMf1qZf3KpQn.vAG', 'Belfast', 'Hi Im Sarah Kuznetzov, and I love photography. Pano is great!', '2017-03-04 17:41:06', 3),
(12419, 'Claire', 'Johnson', 'A_Snake', 'A_Snake@panoapp.com', '$2y$10$CA7tYdn05nhzH.NcOihWYeq3BTI1wlU3n3D4RrY6zLZd5IZS1HYla', 'Paris', 'Hi Im Claire Johnson, and I love photography. Pano is great!', '2017-03-04 17:41:06', 3),
(12420, 'Peter', 'Muller', 'DragonTuna246', 'DragonTuna246@lol.com', '$2y$10$q6jhAS4yjspxMeS6kexptOAY5hkjBOZpHF8RpwTzQf/QVuybxpEDq', 'Birmingham', 'Hi Im Peter Muller, and I love photography. Pano is great!', '2017-03-04 17:41:07', 3),
(12421, 'Daniel', 'Kuznetzov', 'AngryBookLass', 'AngryBookLass@panoapp.com', '$2y$10$YvVCoTLquPP4f/eGUAt2LOfFHfPLLJvcwJoDSaFm1yJExr2Rw0RrO', 'Toronto', 'Hi Im Daniel Kuznetzov, and I love photography. Pano is great!', '2017-03-04 17:41:07', 3),
(12422, 'Sally', 'Thompson', 'TheOneAndOnlyBook', 'TheOneAndOnlyBook@panoapp.com', '$2y$10$tWwQRZGyhvN3W0YFKRZ/cO2nmRDJax5XJaQ386H64ArHweOJuWKt6', 'Montpellier', 'Hi Im Sally Thompson, and I love photography. Pano is great!', '2017-03-04 17:41:07', 3),
(12423, 'Michelle', 'Nguyen', 'ThePotato246', 'ThePotato246@mail.com', '$2y$10$puNV95xYewpXqnjpjJs3e..ZR5w34WM49olMz4r987PMSn5DfMGVO', 'Montreal', 'Hi Im Michelle Nguyen, and I love photography. Pano is great!', '2017-03-04 17:41:08', 3),
(12424, 'Sarah', 'Walker', 'AwesomeElephant', 'AwesomeElephant@supermail.com', '$2y$10$MzVHC1FqYqfCE6qIHjOHpuPKAjvF71HYIBYc0gtwYw.7uAFfuxT8S', 'New York', 'Hi Im Sarah Walker, and I love photography. Pano is great!', '2017-03-04 17:41:08', 3),
(12425, 'Sally', 'Zhao', 'SpecialSpeaker', 'SpecialSpeaker@mail.com', '$2y$10$ePFiP9oFHIUB.sA9OOqcUOnLbJxvxjzRmpdUVP8Uk37varieSeUX2', 'Dublin', 'Hi Im Sally Zhao, and I love photography. Pano is great!', '2017-03-04 17:41:08', 3),
(12426, 'Andrew', 'Ling', 'AwesomePlayer', 'AwesomePlayer@ok.com', '$2y$10$OagxNAnEnYb3Tt6sWISvZ.WRaFOMwA1BD1dFgh8lbAEyQUDeBxJU2', 'Paris', 'Hi Im Andrew Ling, and I love photography. Pano is great!', '2017-03-04 17:41:08', 3),
(12427, 'Maisie', 'Nguyen', 'amazingAntKing', 'amazingAntKing@lol.com', '$2y$10$486TAGeixbzIawI.Te4Oo.zQWkAvgS5Pw7EC5nR3JvVy0mH0CxFw2', 'Edinburgh', 'Hi Im Maisie Nguyen, and I love photography. Pano is great!', '2017-03-04 17:41:09', 3),
(12428, 'Drew', 'Thompson', 'TheRealPro_gal', 'TheRealPro_gal@lol.com', '$2y$10$JnMDeXlvqje.tLJD3ot9xOvqlk4gizfx/OsddKMrEKdFLohTDikR6', 'Dublin', 'Hi Im Drew Thompson, and I love photography. Pano is great!', '2017-03-04 17:41:09', 3),
(12429, 'Sarah', 'Kuznetzov', 'GreatTunaGirl', 'GreatTunaGirl@panoapp.com', '$2y$10$L251KOwaRdmX5VvfYLhgweFArOjVXZsn8GCEzUxMWaRqTHrh1YA26', 'San Francisco', 'Hi Im Sarah Kuznetzov, and I love photography. Pano is great!', '2017-03-04 17:41:09', 3),
(12430, 'John', 'Garcia', 'LazyOrangutan_fan', 'LazyOrangutan_fan@master.com', '$2y$10$KB18toUgrXrTfUyTE4lyXeqqGwGHR/HpVEDrDxBZDW3zmJxwjXDn6', 'New York', 'Hi Im John Garcia, and I love photography. Pano is great!', '2017-03-04 17:41:10', 3),
(12431, 'Peter', 'Johnson', 'TheUndisputedZebraGirl', 'TheUndisputedZebraGirl@mail.com', '$2y$10$SWpIgYIkBAQvff9w3Xvnb.cjhP89Jacdbm.HdUvVMa5gx3evR/Dxe', 'New York', 'Hi Im Peter Johnson, and I love photography. Pano is great!', '2017-03-04 17:41:10', 3),
(12432, 'Harry', 'Gonzalez', 'TheMonsterGirl', 'TheMonsterGirl@master.com', '$2y$10$CUuxgJPVv66St84h73TSpOViGE2um7iiHmSf64WTJzKukEKfG1LTS', 'London', 'Hi Im Harry Gonzalez, and I love photography. Pano is great!', '2017-03-04 17:41:10', 3),
(12433, 'Peter', 'Martina', 'AngryBowl', 'AngryBowl@panoapp.com', '$2y$10$HfVaYunUE1IDslmpt4MKru0MFKcK9c0bKMUXjjFeU83HQbZyLE822', 'Berlin', 'Hi Im Peter Martina, and I love photography. Pano is great!', '2017-03-04 17:41:11', 3),
(12434, 'Harry', 'Nguyen', 'SuperMonsterKing', 'SuperMonsterKing@lol.com', '$2y$10$LR/g.H/0zvPYGMEN1fVRWugMhi3a08EMc4peWaRLMNfUbdNKhTEqm', 'Montpellier', 'Hi Im Harry Nguyen, and I love photography. Pano is great!', '2017-03-04 17:41:11', 3),
(12435, 'Peter', 'Wu', 'TheUndisputedElephantmaster', 'TheUndisputedElephantmaster@panoapp.com', '$2y$10$l3myL66wU3Hre93YdnfPvujLuiOWyQKP/FHybh8vp7KtIfFfEHZim', 'Washington DC', 'Hi Im Peter Wu, and I love photography. Pano is great!', '2017-03-04 17:43:20', 3),
(12436, 'Drew', 'Wu', 'CrazyAntEaterLass', 'CrazyAntEaterLass@panoapp.com', '$2y$10$uBChQ4n4VbtIqFTYOuvQUuKFdMg6ZQXGM5Wl3gj/JFOLK6of1E61m', 'Montpellier', 'Hi Im Drew Wu, and I love photography. Pano is great!', '2017-03-04 17:43:21', 3),
(12437, 'Claire', 'Ivanov', 'SillyOrangutanMaster', 'SillyOrangutanMaster@panoapp.com', '$2y$10$wzFw7t1iYEfUrRmEx3FCjeYbvHSjqrK894LYGRvrx.MJgyuYsYnW6', 'New York', 'Hi Im Claire Ivanov, and I love photography. Pano is great!', '2017-03-04 17:43:21', 3),
(12438, 'Michelle', 'Park', 'SuperProGirl', 'SuperProGirl@supermail.com', '$2y$10$Z3FAB4AlszXqhqy.b5xf8eoeqiEKZK9NsAX19WnzFHD1soAZ9K.Vu', 'Montreal', 'Hi Im Michelle Park, and I love photography. Pano is great!', '2017-03-04 17:45:35', 3),
(12439, 'Sally', 'Martina', 'CrazyAntEaterKid', 'CrazyAntEaterKid@master.com', '$2y$10$e0iOOAQbjN/SvqZmmzCZJe.AqOG.Nveci2sSU6zSLV4r2XPRafhUC', 'Chicago', 'Hi Im Sally Martina, and I love photography. Pano is great!', '2017-03-04 17:45:35', 3),
(12440, 'Sarah', 'Johnson', 'SillyElephant_kid', 'SillyElephant_kid@supermail.com', '$2y$10$/ngHYtHUGYfb.oiBJg1i8eXr6c84psrqk4Uj6oKxDaESCIP1uMiyu', 'Toronto', 'Hi Im Sarah Johnson, and I love photography. Pano is great!', '2017-03-04 17:45:36', 3);

-- --------------------------------------------------------

--
-- Table structure for table `usergroupmapping`
--

CREATE TABLE `usergroupmapping` (
  `GroupID` int(40) NOT NULL,
  `UserID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

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
  ADD KEY `CommentsPostConstraint` (`PostID`);

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
  ADD PRIMARY KEY (`PostID`,`UserID`),
  ADD KEY `LikesUserConstraint` (`UserID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageID`),
  ADD KEY `MessagesGroupConstraint` (`GroupID`),
  ADD KEY `MessagesUserConstraint` (`UserID`);

--
-- Indexes for table `photocollectionsmapping`
--
ALTER TABLE `photocollectionsmapping`
  ADD PRIMARY KEY (`CollectionID`),
  ADD KEY `PhotoCollectionsPostConstraint` (`PostID`);

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
  MODIFY `CollectionID` int(40) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11357;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `GroupID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageID` int(40) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12441;
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
  ADD CONSTRAINT `CommentsPostConstraint` FOREIGN KEY (`PostID`) REFERENCES `posts` (`PostID`),
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
  ADD CONSTRAINT `LikesPostConstraint` FOREIGN KEY (`PostID`) REFERENCES `posts` (`PostID`),
  ADD CONSTRAINT `LikesUserConstraint` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `MessagesGroupConstraint` FOREIGN KEY (`GroupID`) REFERENCES `groups` (`GroupID`),
  ADD CONSTRAINT `MessagesUserConstraint` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `photocollectionsmapping`
--
ALTER TABLE `photocollectionsmapping`
  ADD CONSTRAINT `PhotoCollectionsCollectionConstraint` FOREIGN KEY (`CollectionID`) REFERENCES `collections` (`CollectionID`),
  ADD CONSTRAINT `PhotoCollectionsPostConstraint` FOREIGN KEY (`PostID`) REFERENCES `posts` (`PostID`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `PostsUserConstraint` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `usergroupmapping`
--
ALTER TABLE `usergroupmapping`
  ADD CONSTRAINT `UserGroupGroupConstraint` FOREIGN KEY (`GroupID`) REFERENCES `groups` (`GroupID`),
  ADD CONSTRAINT `UserGroupUserConstraint` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);
