-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 05:38 AM
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
-- Database: `cedcab`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `ID` int(10) NOT NULL,
  `cab_type` varchar(10) NOT NULL,
  `driver_name` varchar(10) NOT NULL,
  `is_available` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`ID`, `cab_type`, `driver_name`, `is_available`) VALUES
(6, '3', 'wkdghks', 1),
(7, '1', 'tmdghks', 3),
(8, '1', 'tmdghks', 2),
(10, '2', 'alwjd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `distance` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `is_available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`ID`, `name`, `distance`, `is_available`) VALUES
(1, 'Highland Heights', '30', 1),
(2, 'Newport', '50', 1),
(3, 'Covington', '100', 1),
(4, 'Alexandria', '210', 1),
(5, 'Atwood', '220', 1),
(6, 'kenton', '300', 1),
(7, 'Norwood', '300', 1),
(11, 'Burlington', '320', 1),
(13, 'Hebron', '300', 0),
(14, 'Union', '300', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ride`
--

CREATE TABLE `ride` (
  `ride_id` int(11) NOT NULL,
  `ride_date` varchar(20) NOT NULL,
  `from_distance` varchar(50) NOT NULL,
  `to_distance` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `cab_type` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `total_distance` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `luggage` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `total_fare` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `customer_user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ride`
--

INSERT INTO `ride` (`ride_id`, `ride_date`, `from_distance`, `to_distance`, `cab_type`, `total_distance`, `luggage`, `total_fare`, `customer_user_id`) VALUES
(113, '2022-12-10 09:27', 'Highland Heights', 'Highland Heights', 'Basic', '0', '0', '10', 7),
(114, '2022-12-10 09:27', 'Covington', 'kenton', 'Pro', '200', '10', '455', 7),
(115, '2022-12-10 09:28', 'kenton', 'Norwood', 'Basic', '0', '0', '10', 8),
(123, '2022-12-10 10:24', 'Highland Heights', 'Covington', 'Pro', '70', '0', '162', 10),
(124, '2022-12-10 10:24', 'Alexandria', 'kenton', 'Basic', '90', '0', '346', 10),
(125, '2022-12-10 10:25', 'Alexandria', 'Burlington', 'Basic', '110', '20', '560', 9),
(126, '2022-12-11 11:26', 'Newport', 'Covington', 'Basic', '50', '12', '510', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) UNSIGNED NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `name` varchar(72) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `role` int(1) UNSIGNED NOT NULL,
  `car_type` int(10) NOT NULL DEFAULT 0,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `email`, `password`, `name`, `mobile`, `role`, `car_type`, `is_admin`) VALUES
(6, 'admin@admin.com', '$2y$10$jE7gepAf4bfaErbDviHUzO3pv9PRVKs8S87Jafq14kwNGOgzjSgzS', 'admin', '0106889999', 0, 0, 1),
(7, 'dpfls0922@naver.com', '$2y$10$a763mnERXZNah6Xsjf.9cu.pAPj.y9e2DutsBgzf26pyKFWLm9F6q', 'dpfls', '5144844618', 0, 0, 0),
(8, 'gofls0922@naver.com', '$2y$10$XYZPb7u2mBanZJPhhnPnze1rYUs3N9q4TSU6ovyoIzY08UkMjgiPq', 'gofls', '8594628952', 0, 0, 0),
(9, 'rkdud@gmail.com', '$2y$10$bu83SmJZu065Wx6bZvGad.061rApbBVfaMxzedZkqdYc1C0igjakS', 'rkdud', '8595621384', 0, 0, 0),
(10, 'dbdms@gmail.com', '$2y$10$MPQl1Mmkgsq.iM6Xt/42M.JvmfP1jga95LF/iCVJD5hYgqA8Byh2u', 'dbdms', '5135468494', 0, 0, 0),
(11, 'wlgp@gmail.com', '$2y$10$9h25HAp2BEvErfJg6feaJuu8xh/zrGFqaCWXYp9nvd8b2CYAsMuse', 'wlgp', '8465132456', 0, 0, 0),
(18, 'ckdtjs@gmail.com', '$2y$10$JqcM3cbyAEquSLu/fqoiNe0cVd0EtbhrwWneb0SkZ30X2CvHlrqpO', 'ckdtjs', '8452148962', 0, 0, 0),
(28, 'guswn@naver.com', '$2y$10$NlR0Ss0BNM63x21M6FZZi.6Llnty5QRGFI3ze9rDWi266ox8Dp/DG', 'guswn', '5612156222', 0, 0, 0),
(31, 'wkdghks@gmail.com', '$2y$10$mUt40sToPtnlcJ107wOUAeFk3Avs2RHi3lYB9P7WxujFrixhaevhK', 'wkdghks', '8954485489', 1, 3, 0),
(33, 'tmdghks@gmail.com', '$2y$10$.7SuxpfRd/b6ayO/cMGGVuKtao3UnTnpCWV9LPHYmKpb6IwXQGL8K', 'tmdghks', '7854786214', 1, 1, 0),
(34, 'asdf@naver.com', '$2y$10$56/2hjV8GYyGjV.lJR616uxo2F4o51sf/4Y8tnyuADpjNMKJjvMYO', 'asdf', '8545214521', 0, 0, 0),
(35, 'alwjd@gmail.com', '$2y$10$kNFztRlQCNom9TMEkbkhJeRcSMBaRgMt0pW3YTCYiWdfHBbIUuQk2', 'alwjd', '7851145544', 1, 2, 0),
(38, 'rhah@gmail.com', '$2y$10$a21um8lixOPZeOWL/2dsEeBjs6upoUvh54QDa4iUDJCMc4mFoKsAi', 'rhah', '8547811366', 1, 1, 0),
(39, 'apdlf@gmail.com', '$2y$10$W6dPrIK.9lSBNEWCb2U0q.AJdCmLPHzGFW0RCxxDg.KOj63.BgvU6', 'apdlf', '8514741854', 1, 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`ride_id`),
  ADD KEY `id` (`customer_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `car_type` (`car_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ride`
--
ALTER TABLE `ride`
  MODIFY `ride_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ride`
--
ALTER TABLE `ride`
  ADD CONSTRAINT `id` FOREIGN KEY (`customer_user_id`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `car_id` FOREIGN KEY (`car_id`) REFERENCES `cars` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `car_type` FOREIGN KEY (`car_type`) REFERENCES `cars` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
