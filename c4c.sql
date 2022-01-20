-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 08:05 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c4c`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `username`, `email`, `password`) VALUES
('admin', 'admin', 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `amount`
--

CREATE TABLE `amount` (
  `donation` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amount`
--

INSERT INTO `amount` (`donation`) VALUES
(0),
(0),
(0),
(0),
(0),
(0),
(50),
(0),
(0),
(0),
(50),
(50),
(50),
(50),
(50),
(50),
(50),
(50),
(50),
(50);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `subject`, `message`) VALUES
(3, 'Ahmed', 'adnansami4498@gmail.com', 'BrotherHood', 'aassf');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donation_id` int(100) NOT NULL,
  `donor_id` int(100) NOT NULL,
  `donation_type` varchar(200) NOT NULL,
  `donated_amount` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donation_by_mail`
--

CREATE TABLE `donation_by_mail` (
  `item_id` int(100) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `categorty` varchar(200) NOT NULL,
  `donor_id` int(100) NOT NULL,
  `donor_address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation_by_mail`
--

INSERT INTO `donation_by_mail` (`item_id`, `item_name`, `categorty`, `donor_id`, `donor_address`) VALUES
(3, '2 Suits', 'Clothes', 3, 'hamdf3fsf'),
(4, 'getUsers', 'Health Care', 3, 'hamdf3fsf');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donor_id` int(100) NOT NULL,
  `donor_name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telephone_no` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `donor_name`, `email`, `password`, `telephone_no`) VALUES
(3, 'sasfina', 'safina@gmai.com', '1321', 12321);

-- --------------------------------------------------------

--
-- Table structure for table `funds_raised`
--

CREATE TABLE `funds_raised` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `raise` int(200) NOT NULL,
  `total` int(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `funds_raised`
--

INSERT INTO `funds_raised` (`id`, `name`, `raise`, `total`, `description`, `image`) VALUES
(6, 'Sponsor a Child', 0, 1100, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Explicabo ullam corporis sapiente.', 'picture.jpg'),
(7, 'Help the ecosystems', 0, 12000, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Explicabo ullam corporis sapiente.', 'picture1.jpg'),
(9, 'Help the ecosystems', 0, 20000, 'lorem isrpum', 'picture2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `orgID` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`orgID`, `sender`, `message`) VALUES
('1', 'admin', 'sdasdad'),
('1', 'admin', 'afdfdsfsd'),
('1', 'admin', 'Apki request wo approve ho chuki hai. and site pe live ho jayegi. Dekh lijiyega.'),
('1', 'admin', 'Your request accepted.');

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE `organisation` (
  `id` int(10) NOT NULL,
  `org_name` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`id`, `org_name`, `email`, `password`, `status`) VALUES
(1, 'Al-Khidmat Foundation', 'al-khidmat@gmail.com', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `org_details`
--

CREATE TABLE `org_details` (
  `org_id` int(11) NOT NULL,
  `repsresentee_name` varchar(100) NOT NULL,
  `country` varchar(200) NOT NULL,
  `focus_area` text NOT NULL,
  `charity_description` varchar(500) NOT NULL,
  `website` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `telephone_no` int(100) NOT NULL,
  `postal_code` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `org_details`
--

INSERT INTO `org_details` (`org_id`, `repsresentee_name`, `country`, `focus_area`, `charity_description`, `website`, `address`, `telephone_no`, `postal_code`) VALUES
(1, 'Abdul Sheikh', 'Pakistan', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'al-khidmat.com', 'main st. 1234', 12345678, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `request_org`
--

CREATE TABLE `request_org` (
  `req_id` int(100) NOT NULL,
  `org_id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `amount` int(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `req_status` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_org`
--

INSERT INTO `request_org` (`req_id`, `org_id`, `name`, `category`, `amount`, `message`, `req_status`) VALUES
(2, 1, 'sdadasd', 'sadas', 12312, 'asdasda', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `FOREIGN KEY 3` (`donor_id`);

--
-- Indexes for table `donation_by_mail`
--
ALTER TABLE `donation_by_mail`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `FOREIGN KEY 4` (`donor_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `funds_raised`
--
ALTER TABLE `funds_raised`
  ADD PRIMARY KEY (`id`,`name`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_details`
--
ALTER TABLE `org_details`
  ADD KEY `FOREIGN KEY` (`org_id`);

--
-- Indexes for table `request_org`
--
ALTER TABLE `request_org`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `FOREIGN KEY 2` (`org_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donation_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donation_by_mail`
--
ALTER TABLE `donation_by_mail`
  MODIFY `item_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donor_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `funds_raised`
--
ALTER TABLE `funds_raised`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request_org`
--
ALTER TABLE `request_org`
  MODIFY `req_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `FOREIGN KEY 3` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`donor_id`);

--
-- Constraints for table `donation_by_mail`
--
ALTER TABLE `donation_by_mail`
  ADD CONSTRAINT `FOREIGN KEY 4` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`donor_id`);

--
-- Constraints for table `org_details`
--
ALTER TABLE `org_details`
  ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`org_id`) REFERENCES `organisation` (`id`);

--
-- Constraints for table `request_org`
--
ALTER TABLE `request_org`
  ADD CONSTRAINT `FOREIGN KEY 2` FOREIGN KEY (`org_id`) REFERENCES `organisation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
