-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 17, 2022 at 09:17 PM
-- Server version: 8.0.28
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doa_99_40`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactrequest`
--

DROP TABLE IF EXISTS `contactrequest`;
CREATE TABLE IF NOT EXISTS `contactrequest` (
  `requestId` int NOT NULL AUTO_INCREMENT,
  `userId` int DEFAULT NULL,
  `concern` varchar(1000) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `reqDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`requestId`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contactrequest`
--

INSERT INTO `contactrequest` (`requestId`, `userId`, `concern`, `firstName`, `lastName`, `nic`, `phone`, `reqDate`) VALUES
(16, 34, 'I complain about our adviser, and i suggest you change him.', 'shasheesha', 'dissanayake', '200028702523', '0763133646', '2022-10-17 16:10:51'),
(17, 0, 'testing', 'test first name', 'test last name', '11111111', '1111111111', '2022-10-17 16:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `filename`) VALUES
(15, 'meeting06_29_6-720x436.jpg'),
(14, '2-720x436.jpg'),
(13, '2-1-720x436.jpg'),
(12, 'SL3_2944-1-scaled.jpg'),
(11, 'DG_20221010_2-720x436.jpg'),
(16, 'AwardCeremony-1-min-720x436.jpg'),
(17, 'sl3_6126-720x436.jpg'),
(18, 'meeting06_29_6-720x436.jpg'),
(19, '1i.jpg'),
(20, '1 (4).jpg'),
(21, '3i.jpg'),
(22, '2i.jpg'),
(23, 'stack-blue-containers-box-cargo-freight-ship-import-export-3d_35761-330.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `newsId` int NOT NULL AUTO_INCREMENT,
  `newsTitle` varchar(500) NOT NULL,
  `newsDis` varchar(5000) NOT NULL,
  `imgId` varchar(10) NOT NULL,
  `uploadDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`newsId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsId`, `newsTitle`, `newsDis`, `imgId`, `uploadDate`) VALUES
(5, 'The New Director General of the Department of Agriculture assumed duties.', 'Mrs. H.M.J. Ilankoon Menike assumed duties as the new Director General of Agriculture on 10.10.2022 after religious activities at the Department of Agriculture.', '4', '2022-10-17 15:52:11'),
(6, '24th Annual Symposium of the Department of Agriculture – ASDA 2022', 'The 24th Annual symposium of the Department of Agriculture was held on 23.09.2022 at the Gannoruwa National Plant Genetic Resource Center and the National Agriculture Information and Communication Centre under the patronage of the Hon. Minister of Agriculture Mahinda Amaraweera.\r\n\r\nPresentations of new research findings of various research sectors of the Department of Agriculture  was among the main events. Awards presented to Best Agriculturist, Best Scientist, Promising Agriculturist, Promising Scientist, Best Research Paper. The Lifetime Achievements Award of 2022 – Eminent Agriculturist of the country was presented by the Minister.', '5', '2022-10-17 15:53:31'),
(7, 'Technology Releasing Committee Meeting 2022 (2020/2021)', 'New Technology Releasing Committee Meeting was held on 18 th of 2022 at the auditorium of NAICC with the participation of Director General of Agriculture.\r\n\r\nIn this programme, new technologies related to agriculture that invented and improved by researches of Department of Agriculture during year 2020/2021 were subjected to evaluate to ensure suitability of release as new technology.', '6', '2022-10-17 15:55:11'),
(8, 'Variety Releasing Committee Meeting - 2022', 'Variety releasing committee meeting of Department of Agriculture was held at Auditorium of National Agriculture information & Communication Centre with the participation of Director General of Agriculture on 08.08.2022\r\n\r\nSeveral new varieties of crops that reveal by experiments of department of Agriculture during past period of time were recommended and introduced to cultivate in the Sri Lanka by the variety release committee.', '7', '2022-10-17 15:56:06'),
(9, 'A Proposal prepared by the Department of Agriculture for Agriculture Revival from the present crisis situation was handed over to the Minister of Agriculture', 'With the current crisis situation in Sri Lanka and the decision to ban the import and use of fertilizers and agrochemicals pose a serious threat to the country’s food security.\r\n\r\nTo overcome this situation a proposal containing short-term, medium-term and long-term remedies based on long-term research data on measures to be taken in relation to main food crop production was handed over to the Minister of Agriculture at the Ministry of Agriculture on 28.06.2022 with the participation of the Secretary to the Ministry of Agriculture, Director General of Agriculture, Additional Director Generals and all the Directors of Department of Agriculture.\r\n\r\nIt was emphasized that these proposals can be effectively implemented with the participation and commitment of the government and officials and staff of relevant government institutions as well as all the stakeholders in the Agriculture sector.', '8', '2022-10-17 15:56:55'),
(10, 'Diploma Awarding Ceremonies', 'Diploma awarding ceremony of the National Diploma in Agricultural Production Technology (NVQ 05) conducted by the Schools of Agriculture, Anuradhapura, Bibile, Labuduwa, Palamunai, Paranthan, Wariyapola, and\r\nHigher National Diploma in Agricultural Production Technology (NVQ 06) conducted by the Schools of Agriculture, Angunakolapellessa, Karapincha, Kundasale,Pelwehera, Labuuwa and Vavuniya were held recently.', '11', '2022-10-17 16:00:02'),
(11, 'A field day of observation and crop cut survey for potato newly cultivated lands – Dambulla- 2022-03-08', 'A field day of observation and crop cut survey for potato newly cultivated lands under the programme of enhancing potato production of the Sawbagya Agriculture Development programme 2021-2023 was conducted at Dambulla Agriculture Instructor division of Dambulla Zone on 08.03.2022 under the patronage of  Additional Director General (development), Mrs Jayantha Illankoon and participation of Provincial Director (Central Province) Mr Ranathunga Bandra , Potato Crop Leader  Mr M.C.Jayasinghe and officers of relevant institutes.', '12', '2022-10-17 16:00:53'),
(12, 'Testing News', 'Testing News explanation.', '13', '2022-10-17 16:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `newsimg`
--

DROP TABLE IF EXISTS `newsimg`;
CREATE TABLE IF NOT EXISTS `newsimg` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsimg`
--

INSERT INTO `newsimg` (`id`, `filename`) VALUES
(4, 'DG_20221010_2-720x436.jpg'),
(5, 'SL3_2944-1-scaled.jpg'),
(6, '2-1-720x436.jpg'),
(7, '2-720x436.jpg'),
(8, 'meeting06_29_6-720x436.jpg'),
(9, 'SL3_8914-720x436.jpg'),
(10, 'SL3_8914-720x436.jpg'),
(11, 'AwardCeremony-1-min-720x436.jpg'),
(12, 'sl3_6126-720x436.jpg'),
(13, 'Export 1@2x.png');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

DROP TABLE IF EXISTS `problems`;
CREATE TABLE IF NOT EXISTS `problems` (
  `problemId` int NOT NULL AUTO_INCREMENT,
  `userId` int DEFAULT NULL,
  `problem` varchar(5000) NOT NULL,
  `contactType` varchar(10) NOT NULL,
  `contactDetail` varchar(100) NOT NULL,
  `submitDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`problemId`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`problemId`, `userId`, `problem`, `contactType`, `contactDetail`, `submitDate`) VALUES
(25, 34, 'hi... my concern is about ecological farming.', 'profile', '0763133646', '2022-10-17 16:08:31'),
(27, 0, 'testing problem report.', 'phone', '0123456789', '2022-10-17 16:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `problemsreply`
--

DROP TABLE IF EXISTS `problemsreply`;
CREATE TABLE IF NOT EXISTS `problemsreply` (
  `replyId` int NOT NULL AUTO_INCREMENT,
  `problemId` int NOT NULL,
  `reply` varchar(5000) NOT NULL,
  `sentDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`replyId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `problemsreply`
--

INSERT INTO `problemsreply` (`replyId`, `problemId`, `reply`, `sentDate`) VALUES
(5, 25, 'we really appreciate your grownup.', '2022-10-17 16:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `promoId` int NOT NULL AUTO_INCREMENT,
  `promoNote` varchar(5000) NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `validFor` varchar(20) NOT NULL,
  PRIMARY KEY (`promoId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`promoId`, `promoNote`, `addDate`, `validFor`) VALUES
(11, 'we are offering special coupons for wining new machines.', '2022-10-17 16:18:05', '2022-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `userNic` varchar(20) NOT NULL,
  `userBirthday` date NOT NULL,
  `userAddress` varchar(500) NOT NULL,
  `userPhone` varchar(20) DEFAULT NULL,
  `userEmail` varchar(100) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `profilePic` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `firstName`, `lastName`, `userNic`, `userBirthday`, `userAddress`, `userPhone`, `userEmail`, `regDate`, `profilePic`) VALUES
(1, 'Admin', 'Admin', 'Admin', '2022-01-01', 'Admin', 'Admin', 'Admin', '2022-10-17 21:17:13', NULL),
(34, 'shasheesha', 'dissanayake', '200028702523', '2000-10-13', '42b, kadaana.', '0763133646', 'janith@gmail.com', '2022-10-17 16:06:28', NULL),
(35, 'janith', 'maanage', '1234567890', '2013-01-29', '42B3, colombo', '0771234567', 'jaga@gmail.com', '2022-10-17 16:20:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_credentials`
--

DROP TABLE IF EXISTS `user_credentials`;
CREATE TABLE IF NOT EXISTS `user_credentials` (
  `credentialId` int NOT NULL AUTO_INCREMENT,
  `userId` varchar(10) NOT NULL,
  `userUsername` varchar(100) NOT NULL,
  `userPassword` varchar(100) NOT NULL,
  `userCategory` varchar(20) NOT NULL,
  PRIMARY KEY (`credentialId`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_credentials`
--

INSERT INTO `user_credentials` (`credentialId`, `userId`, `userUsername`, `userPassword`, `userCategory`) VALUES
(1, '1', 'Admin', 'Admin', 'doa'),
(16, '34', 'shasheesha', 'shasheesha123', 'farmer'),
(17, '35', 'janith', 'janith123', 'officer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
