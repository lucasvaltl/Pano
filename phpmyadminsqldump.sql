-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 13, 2017 at 08:33 PM
-- Server version: 5.6.34
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pano`
--

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
('b9c1dd335f17a1f092df68bb066fafff699c5136aa162efd8df05e30f21c37b5', 12399, 'Iceland is awesome #glacier', '2017-03-10 20:24:07', 'Iceland'),
('bc48278dfb82b7b7a88ed4f05774045892e40ac623c639df81aa4f2454dc2d97', 12401, 'Hello world?', '2017-03-10 17:17:24', 'Sierra Nevada'),
('bfc775003d11e1214d785b96f88d16d625f64810af0270b67955a4beffdff249', 12401, 'best day of my life!!!!', '2017-03-10 18:09:57', 'hehe'),
('c95d295b630fe9da6d424b074fee4422a8a8de147e520ecf608d22862ec74013', 12401, 'profile', '2017-03-10 17:01:03', 'bitte'),
('c982020a0701adccb5e95a84ee626a5286639ad3b8a6113024afe3774c8b2be7', 12450, 'besties', '2017-03-12 21:14:54', 'Brazil'),
('d1290e3f37399c7738e4703fcc4c6a3bccd17d06dc451bb657990a7509c13fcb', 12445, '#phoenix #sunset', '2017-03-12 15:47:22', 'Phoenix, AZ, United States'),
('d64a9ffc441847c5360d1a4503cd2a5ea529b2d86dbb7966f35df90d30de79aa', 12400, 'wuhu', '2017-03-10 22:21:57', 'London'),
('da11a03ed0c1109b391c17793c55b63f31f054ca6652f80fd3364d76079a1757', 12399, '#weclimbedamountain', '2017-03-12 11:03:26', 'Nara, Japan'),
('ed9351ef3520b703ff02f353ac925094b81aef7219c1199d4c688384fbdaf540', 12426, 'Sydney at Night #sydneyharbourbridge', '2017-03-12 11:26:15', 'Sydney, Australia');

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
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `PostsUserConstraint` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);
