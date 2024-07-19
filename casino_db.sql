-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2024 at 03:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casino_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Contact_ID` int(11) NOT NULL,
  `Full_name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Contact_ID`, `Full_name`, `Email`, `Message`) VALUES
(1, 'test', 'test@gmail.com', 'test'),
(2, 'test2', 'test2@gmail.com', 'testing2'),
(3, 'test', 'test@gmail.com', 'test'),
(4, 'user', 'user@gmail.com', 'user'),
(5, 'usertest', 'usertest@gmail.com', 'usertest');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Events_ID` int(11) NOT NULL,
  `Event_name` varchar(255) DEFAULT NULL,
  `duration` time DEFAULT NULL,
  `description` text DEFAULT NULL,
  `nbr_tables` int(11) DEFAULT NULL,
  `nbr_seat` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Events_ID`, `Event_name`, `duration`, `description`, `nbr_tables`, `nbr_seat`, `price`, `image`) VALUES
(1, 'Jazz Night', '00:00:03', 'An evening of live jazz music featuring local bands.', 10, 100, 50.00, './assets/img/event/event1.jpg'),
(2, 'Wine Tasting', '00:00:02', 'Sample a selection of fine wines with a sommelier.', 5, 50, 75.00, './assets/img/event/event2.png'),
(3, 'Comedy Show', '00:00:01', 'Stand-up comedy show with famous comedians.', 8, 80, 40.00, './assets/img/event/event3.png'),
(4, 'Art Exhibition', '00:00:04', 'Exhibit of contemporary art by local artists.', 15, 150, 30.00, './assets/img/event/event4.png'),
(5, 'Cooking Class', '00:00:03', 'Interactive cooking class with a professional chef.', 6, 30, 100.00, './assets/img/event/event5.png'),
(6, 'Tech Conference', '00:00:08', 'A full-day conference on the latest in technology.', 20, 200, 150.00, './assets/img/event/event6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `Games_ID` int(11) NOT NULL,
  `Game_name` varchar(255) DEFAULT NULL,
  `duration` time DEFAULT NULL,
  `description` text DEFAULT NULL,
  `rules` text DEFAULT NULL,
  `nbr_tables` int(11) DEFAULT NULL,
  `nbr_seat` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`Games_ID`, `Game_name`, `duration`, `description`, `rules`, `nbr_tables`, `nbr_seat`, `price`, `image`) VALUES
(1, 'Texas Holdem', '00:00:02', 'A popular variant of poker where each player is dealt two cards, and five community cards are dealt face-up.', '', 5, 50, 20.00, './assets/img/game/Texas Holdem.png'),
(2, 'Midi Punto Banco', '00:00:01', 'A variation of baccarat where players bet on either the Player, Banker, or Tie.', '', 3, 30, 25.00, './assets/img/game/Midi Punto Banco.png'),
(3, 'Heads Up Hold\'em', '00:00:02', 'A poker game where players compete head-to-head against the dealer.', '', 4, 40, 30.00, './assets/img/game/Heads Up Holdem.png');

-- --------------------------------------------------------

--
-- Table structure for table `hiring`
--

CREATE TABLE `hiring` (
  `Hiring_ID` int(11) NOT NULL,
  `Full_name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Details` text DEFAULT NULL,
  `CV` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hiring`
--

INSERT INTO `hiring` (`Hiring_ID`, `Full_name`, `Email`, `Details`, `CV`) VALUES
(4, 'test', 'test@gmail.com', 'etst', 'C:/xampp/htdocs/Website/uploads/Powerpoint presentation.pdf'),
(5, 'user', 'user@gmail.com', 'user', 'C:/xampp/htdocs/Website/uploads/Powerpoint presentation.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `resto`
--

CREATE TABLE `resto` (
  `Resto_ID` int(11) NOT NULL,
  `Resto_name` varchar(255) DEFAULT NULL,
  `Menu` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `nbr_tables` int(11) DEFAULT NULL,
  `nbr_seat` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resto`
--

INSERT INTO `resto` (`Resto_ID`, `Resto_name`, `Menu`, `description`, `nbr_tables`, `nbr_seat`, `price`, `image`) VALUES
(1, 'La Belle Époque', 'French Cuisine', 'A cozy French restaurant offering classic dishes and fine wines.', 15, 60, 45.00, './assets/img/resto/VIPresto.jpg'),
(2, 'Sunset Bar', 'Cocktails and Tapas', 'A vibrant bar with a wide selection of cocktails and light tapas.', 20, 80, 25.00, './assets/img/resto/bar1.png'),
(3, 'Terrace Delight', 'Mediterranean Menu', 'An open-air terrace serving fresh Mediterranean cuisine.', 10, 40, 35.00, './assets/img/resto/terrace.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` int(11) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Passwords` varchar(255) NOT NULL,
  `Birthday` date DEFAULT NULL,
  `Gender` char(7) DEFAULT NULL,
  `User_Token` text DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Payment_Info` text DEFAULT NULL,
  `Avatar_path` varchar(255) DEFAULT 'maleAvatar1.jpg',
  `Access_lvl` int(11) DEFAULT 0 CHECK (`Access_lvl` in (0,1))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `First_Name`, `Last_Name`, `Username`, `Email`, `Passwords`, `Birthday`, `Gender`, `User_Token`, `Phone`, `Payment_Info`, `Avatar_path`, `Access_lvl`) VALUES
(1, 'Admin', 'admin', 'Administrator', 'Admin.casino@gmail.com', '$2y$10$h.WYypvY6vXSZKjWPiFYo.IkJ5PTgK7Ea8QuEnVXMmkuylzsi4YHa', NULL, NULL, NULL, NULL, NULL, 'maleAvatar4.jpg', 1),
(2, 'testing', 'testing', 'testing', 'testing@gmail.com', '$2y$10$YoM9I.EdLtnqM8mv7GVxNe3cDvuD/nD8qajnj.oxV1SrAgK8UkgM6', '2001-02-02', 'M', '669a600662dc4', '105214520', ',,', 'maleAvatar3.jpg', 0),
(6, 'user', 'user', 'user user', 'user@gmail.com', '$2y$10$XC1MoZYZM5b.2jbMoCUJoeotv.D/IybWAo1P.ZATR/xmwBJLpjgoi', '1999-05-19', '', '669a43fe08e0a', '14521456', '32165545,2452145,255', 'maleAvatar2.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Contact_ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Events_ID`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`Games_ID`);

--
-- Indexes for table `hiring`
--
ALTER TABLE `hiring`
  ADD PRIMARY KEY (`Hiring_ID`);

--
-- Indexes for table `resto`
--
ALTER TABLE `resto`
  ADD PRIMARY KEY (`Resto_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Phone` (`Phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Contact_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `Events_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `Games_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hiring`
--
ALTER TABLE `hiring`
  MODIFY `Hiring_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resto`
--
ALTER TABLE `resto`
  MODIFY `Resto_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
