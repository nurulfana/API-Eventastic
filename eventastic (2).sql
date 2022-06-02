-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2022 at 01:59 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventastic`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads_user`
--

CREATE TABLE `ads_user` (
  `ads_id` int(11) NOT NULL,
  `event_id` int(50) NOT NULL,
  `username` varchar(300) NOT NULL,
  `name` text NOT NULL,
  `category` text NOT NULL,
  `notes` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ads_user`
--

INSERT INTO `ads_user` (`ads_id`, `event_id`, `username`, `name`, `category`, `notes`, `status`) VALUES
(1, 1, 'fanae', 'Design Poster', 'Poster', 'Siapkan before 12 January', 'Not Finished'),
(2, 1, 'fanae', 'nak tanya', 'Poster', 'ii', 'Not Finished');

-- --------------------------------------------------------

--
-- Table structure for table `booking_user`
--

CREATE TABLE `booking_user` (
  `booking_id` int(11) NOT NULL,
  `event_id` int(50) NOT NULL,
  `username` varchar(300) NOT NULL,
  `name` text NOT NULL,
  `category` text NOT NULL,
  `notes` text NOT NULL,
  `payment` decimal(10,0) NOT NULL,
  `payment_status` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_user`
--

INSERT INTO `booking_user` (`booking_id`, `event_id`, `username`, `name`, `category`, `notes`, `payment`, `payment_status`, `phone`, `email`) VALUES
(1, 1, 'fanae', 'Haqiem Ruslii', 'Entertainments/Performances', 'Boros naw 2 lagu', '7000', 'Paid', '2147483647', 'gjgjh@d.m'),
(3, 1, 'fanae', 'Dmark', 'Foods Catering', 'Makan untuk 500 orang', '5000', 'Not Paid Yet', '0', ''),
(4, 2, 'fanae', 'Shiha zikir', 'Crew Teams', 'Yao Yao', '5', 'Paid', '0', ''),
(5, 1, 'fanae', 'Naidu Corner', 'Foods Catering', '5000pax', '8', 'Paid', '0', ''),
(7, 1, 'fanae', 'Busker', 'Entertainments/Performances', 'Lama', '700', 'Not Paid Yet', '0', ''),
(8, 2, 'fanae', 'Catering', 'Foods Catering', 'buk', '500', 'Not Paid Yet', '0', ''),
(9, 1, 'fanae', 'SK Corner', 'Foods Catering', 'Makan', '500', 'Not Paid Yet', '', ''),
(10, 3, 'fanae', 'Grab Team Bulk', 'Transportation', 'kita order secara pukal', '70', 'Not Paid Yet', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `crew_user`
--

CREATE TABLE `crew_user` (
  `crew_id` int(11) NOT NULL,
  `event_id` int(50) NOT NULL,
  `username` varchar(300) NOT NULL,
  `name` text NOT NULL,
  `category` text NOT NULL,
  `quantity` text NOT NULL,
  `progress` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crew_user`
--

INSERT INTO `crew_user` (`crew_id`, `event_id`, `username`, `name`, `category`, `quantity`, `progress`, `phone`, `email`, `notes`) VALUES
(2, 1, 'fanae', 'Naidu Sdn Bhd', 'Security', '50', 'Not Confirm', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `guest_user`
--

CREATE TABLE `guest_user` (
  `guest_id` int(11) NOT NULL,
  `event_id` int(50) NOT NULL,
  `username` varchar(300) NOT NULL,
  `name` text NOT NULL,
  `gender` text NOT NULL,
  `category` text NOT NULL,
  `quantity` text NOT NULL,
  `progress` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest_user`
--

INSERT INTO `guest_user` (`guest_id`, `event_id`, `username`, `name`, `gender`, `category`, `quantity`, `progress`, `phone`, `email`, `notes`) VALUES
(2, 1, 'fanae', 'Dr Maza Family', 'Male', 'Adult', '5', 'Invitation Sent', '', '', ''),
(3, 1, 'fanae', 'Encik Hamid', 'Male', 'Adult', '2', 'Invitation Not Sent', '', '', ''),
(4, 1, 'fanae', 'SMKSH', 'Female', 'Teen', '20', 'Invitation Sent', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `loginregister_admin`
--

CREATE TABLE `loginregister_admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone_num` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginregister_admin`
--

INSERT INTO `loginregister_admin` (`admin_id`, `name`, `phone_num`, `email`, `password`) VALUES
(1, 'Luqman Hakim', '+6010-9858829', 'luqman@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `loginregister_user`
--

CREATE TABLE `loginregister_user` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginregister_user`
--

INSERT INTO `loginregister_user` (`id`, `fullname`, `username`, `password`, `email`) VALUES
(1, 'Farhanah', 'fanae', '$2y$10$/BP8np1S8WdTfE1UL9a.SOy.tF0Rdt6ujpErX5lRL1PGV1ikqOff6', 'fana@gmail.com'),
(2, 'luq', 'luq', '$2y$10$zoWZXdwbf32ZMyORr6R4Du3Y1BwXUXDETvB6P3Vv5/DQN3BZv3.Ei', 'luqman');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `fullname` text CHARACTER SET latin1 NOT NULL,
  `email` text CHARACTER SET latin1 NOT NULL,
  `place_area` text CHARACTER SET latin1 NOT NULL,
  `venue_name` text CHARACTER SET latin1 NOT NULL,
  `venue_book_status` text NOT NULL,
  `venue_ratings` text NOT NULL,
  `venue_latitude` text NOT NULL,
  `venue_longitude` text NOT NULL,
  `message` text CHARACTER SET latin1 NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `update_event`
--

CREATE TABLE `update_event` (
  `id` int(50) NOT NULL,
  `event_id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `event_name` text NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_budget` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `update_event`
--

INSERT INTO `update_event` (`id`, `event_id`, `username`, `event_name`, `event_date`, `event_time`, `event_budget`) VALUES
(1, 1, 'fanae', 'Biha Wedding', '2022-08-25', '16:00:00', 20000),
(2, 2, 'fanae', 'Arfan Sem\'s Birthdayyyyy', '2022-12-16', '19:00:00', 20000),
(3, 3, 'fanae', 'Arfan Anniversary', '2022-06-26', '13:00:00', 20000),
(11, 1, 'luq', 'Party', '2022-05-06', '14:00:00', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `venue_book`
--

CREATE TABLE `venue_book` (
  `venue_id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `place_area` text NOT NULL,
  `venue_name` text NOT NULL,
  `venue_book_status` text NOT NULL,
  `venue_ratings` text NOT NULL,
  `venue_image` varchar(300) NOT NULL,
  `venue_latitude` text NOT NULL,
  `venue_longitude` text NOT NULL,
  `venue_search` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue_book`
--

INSERT INTO `venue_book` (`venue_id`, `fullname`, `email`, `place_area`, `venue_name`, `venue_book_status`, `venue_ratings`, `venue_image`, `venue_latitude`, `venue_longitude`, `venue_search`) VALUES
(1, '', '', 'UKM', 'Dewan Canselor Tun Abdul Razak', 'Unbooked', '5.0', 'dectar.png', '2.93090038831', '101.778783295', 'Dewan Canselor Tun Abdul Razak'),
(2, '', '', 'UKM', 'Dewan Gemilang', 'Unbooked', '5.0', 'dewangemilang.png', '2.9309182', '101.78495', 'Dewan Gemilang'),
(3, '', '', 'UKM', 'Dewan Kolej Aminuddin Baki', 'Booked', '3.0', 'dewankab.png', '2.9254279', '101.7813617', 'Kolej Aminuddin Baki'),
(4, '', '', 'UKM', 'Dewan Kolej Burhanuddin Helmi', 'Unbooked', '3.0', 'dewankbh.png', '2.9274187', '101.7752203', 'Kolej Burhanuddin Helmi'),
(5, '', '', 'UKM', 'Dewan Kolej Dato Onn', 'Unbooked', '2.0', 'dewankdo.png', '2.9303899', '101.7783', 'Kolej Dato Onn'),
(6, '', '', 'UKM', 'Dewan Kolej Ibrahim Yaakob', 'Booked', '4.5', 'dewankiy.png', '2.9241427', '101.7764492', 'Kolej Ibrahim Yaakob'),
(7, '', '', 'UKM', 'Dewan Kolej Ibu Zain', 'Unbooked', '5.0', 'dewankiz.png', '2.9304779', '101.781584', 'Kolej Ibu Zain'),
(8, '', '', 'UKM', 'Dewan Kolej Rahim Kajai', 'Booked', '3.0', 'dewankrk.png', '2.9327697', '101.7825491', 'Kolej Rahim Kajai'),
(9, '', '', 'UKM', 'Dewan Kolej Ungku Omar', 'Unbooked', '2.5', 'dewankuo.png', '2.9240179', '101.7779948', 'Kolej Ungku Omar'),
(10, '', '', 'UKM', 'Dewan Kolej Pendeta Zaaba', 'Booked', '5.0', 'dewanzaba.png', '2.9195225', '101.7727756', 'Kolej Pendeta Zaaba');

-- --------------------------------------------------------

--
-- Table structure for table `venue_list`
--

CREATE TABLE `venue_list` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `place_area` text NOT NULL,
  `venue_name` text NOT NULL,
  `venue_book_status` text NOT NULL,
  `venue_ratings` text NOT NULL,
  `venue_latitude` text NOT NULL,
  `venue_longitude` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue_list`
--

INSERT INTO `venue_list` (`id`, `fullname`, `email`, `place_area`, `venue_name`, `venue_book_status`, `venue_ratings`, `venue_latitude`, `venue_longitude`) VALUES
(1, 'Encik Rizal bin Ahmad', 'rizal88@gmail.com', 'UKM', 'Dewan Canselor Tun Razak', 'Unbooked', '5.0', '2.93090038831', '101.778783295'),
(2, 'Encik Hakim bin Rusli', 'hakim@gmail.com', 'UKM', 'Dewan Gemilang', 'Unbooked', '5.0', '2.9309182', '101.78495'),
(3, 'Puan Nabihah binti Nur', 'bihashi@gmail.com', 'UKM', 'Dewan Kolej Aminuddin Baki', 'Booked', '3.0', '2.9254279', '101.7813617'),
(4, 'Puan Ain Suhaila binti Mansor', 'ain@gmail.com', 'UKM', 'Dewan Kolej Burhanuddin Helmi', 'Unbooked', '3.0', '2.9274187', '101.7752203'),
(5, 'Encik Amril bin Hafiz', 'amril@gmail.com', 'UKM', 'Dewan Kolej Dato Onn', 'Unbooked', '2.0', '2.9303899', '101.7783'),
(6, 'Tuan Hafiz bin Ramli', 'hafizr@gmail.com', 'UKM', 'Dewan Kolej Ibrahim Yaakob', 'Booked', '4.5', '2.9241427', '101.7764492'),
(7, 'Encik Kamal bin Adli', 'kamal@yahoo.com', 'UKM', 'Dewan Kolej Ibu Zain', 'Unbooked', '5.0', '2.9304779', '101.781584'),
(8, 'Tuan Syafiq bin Asri', 'syafiqas@yahoo.com', 'UKM', 'Dewan Kolej Rahim Kajai', 'Booked', '3.0', '2.9327697', '101.7825491'),
(9, 'Puan Zubaidah', 'zubad@gmail.com', 'UKM', 'Dewan Kolej Ungku Omar', 'Unbooked', '2.5', '2.9240179', '101.7779948'),
(10, 'Nurul Farhanah', 'nurulfarhanah2000@gmail.com', 'UKM', 'DECTAR', 'Booked', '3', '2.93090038831', '13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads_user`
--
ALTER TABLE `ads_user`
  ADD PRIMARY KEY (`ads_id`);

--
-- Indexes for table `booking_user`
--
ALTER TABLE `booking_user`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `crew_user`
--
ALTER TABLE `crew_user`
  ADD PRIMARY KEY (`crew_id`);

--
-- Indexes for table `guest_user`
--
ALTER TABLE `guest_user`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `loginregister_admin`
--
ALTER TABLE `loginregister_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `loginregister_user`
--
ALTER TABLE `loginregister_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update_event`
--
ALTER TABLE `update_event`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `event_id` (`event_id`,`username`);

--
-- Indexes for table `venue_book`
--
ALTER TABLE `venue_book`
  ADD PRIMARY KEY (`venue_id`);

--
-- Indexes for table `venue_list`
--
ALTER TABLE `venue_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads_user`
--
ALTER TABLE `ads_user`
  MODIFY `ads_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking_user`
--
ALTER TABLE `booking_user`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `crew_user`
--
ALTER TABLE `crew_user`
  MODIFY `crew_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guest_user`
--
ALTER TABLE `guest_user`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loginregister_admin`
--
ALTER TABLE `loginregister_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loginregister_user`
--
ALTER TABLE `loginregister_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `update_event`
--
ALTER TABLE `update_event`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `venue_book`
--
ALTER TABLE `venue_book`
  MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `venue_list`
--
ALTER TABLE `venue_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
