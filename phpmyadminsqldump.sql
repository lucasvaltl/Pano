-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 13, 2017 at 08:16 PM
-- Server version: 5.6.34
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pano`
--

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
(12399, 'Li', 'Xie', 'Liko', 'liko@mail.com', '$2y$10$SW1DWeNQuLcFdbWs2PgXiO5VqCrUDdzJ173sEi/tLmL9oWsXWmI4G', 'London', '                                        Yolo', '2017-02-21 18:24:29', 2, '12399'),
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
(12445, 'Yolo', 'Wizard', 'YoloWizard', 'yolo@wizard.com', '$2y$10$HVyaVW7tXvjBDGmyz7ivu.3Tz5fh3QfRMItPH6OD5o8HqvisDqqFW', 'Hodor', 'I stack shields', '2017-03-12 14:45:26', 2, '0'),
(12448, 'Steve', 'O', 'steve-o', 'stevie@wonder.com', '$2y$10$yY2Lq8bhvtVp4kVl8Xwbhu4RDOCrYPQLyYu5MBZ7EelvCB9y9x742', 'Los Angeles, CA, United States', 'I like stunts and hurting my self', '2017-03-12 20:55:28', 3, '12448'),
(12449, 'Seb', 'VZ', 'sebestian', 'sebastian@hotmail.com', '$2y$10$XwYhdPZjfwD9WTyqLZfghuW8TZEMoUKLoHOiinLepbw.Oox8ztAZa', 'Dublin, Ireland', 'I love Oranje', '2017-03-12 21:07:15', 3, '12449'),
(12450, 'Seb', 'VZ', 'sebastian', 'asda@asd.com', '$2y$10$3BLhQTqNmQjoCjDkI6/ur.c3foPw1ZU1j5rsQtw/aqkOJcDNR/guC', 'Dublin, Ireland', 'gtafed', '2017-03-12 21:12:31', 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12452;
