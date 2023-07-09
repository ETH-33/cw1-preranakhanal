-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 09, 2023 at 09:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library management`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors_prerana`
--

CREATE TABLE `authors_prerana` (
  `authors_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors_prerana`
--

INSERT INTO `authors_prerana` (`authors_id`, `first_name`, `last_name`, `email`, `phone_number`, `address`) VALUES
(1, 'Chetan', 'Bhagat', 'chetanbhagat24@gmail.com', '9823439945', 'India'),
(2, 'Ravinder', 'Singh', 'ravindersingh11@gmailcom', '9841339876', 'Mumbai'),
(3, 'Robert', 'Kiyosaki', 'robert.kiyosaki@gmail.com', '9841034567', 'Melbourne'),
(4, 'Scott', 'Fitzgerald', 'scottitzgerald22@gmail.com', '9823567890', 'New York'),
(5, 'Subin', 'Bhattarai', 'subinbhattarai01@gmail.com', '9808234356', 'Kathmandu');

-- --------------------------------------------------------

--
-- Table structure for table `bookauthor_prerana`
--

CREATE TABLE `bookauthor_prerana` (
  `book_title` varchar(255) DEFAULT NULL,
  `book_author` varchar(255) DEFAULT NULL,
  `publication_year` date DEFAULT NULL,
  `books_id` int(11) DEFAULT NULL,
  `authors_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookauthor_prerana`
--

INSERT INTO `bookauthor_prerana` (`book_title`, `book_author`, `publication_year`, `books_id`, `authors_id`) VALUES
('Half Girlfriend', 'Chetan Bhagat', '2004-01-01', 1, 1),
('Can Love Happen Twice', 'Ravinder Singh', '2011-05-11', 2, 2),
('Rich DAD POOR DAD', 'Robert Kiyosaki', '1997-08-01', 3, 3),
('The Great Gatsby', 'Scott Fitzgerald', '1925-11-22', 4, 4),
('Summer Love', 'Subin Bhattarai', '2012-07-09', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `books_prerana`
--

CREATE TABLE `books_prerana` (
  `books_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `ISBN` varchar(255) DEFAULT NULL,
  `publication_year` date DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `availability` enum('available','unavailable') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books_prerana`
--

INSERT INTO `books_prerana` (`books_id`, `title`, `ISBN`, `publication_year`, `category`, `availability`) VALUES
(1, 'Half Girlfriend', 'ISBN123456789', '2004-01-01', 'Fiction', 'available'),
(2, 'Can Love Happen Twice', 'ISBN987654321', '2011-05-11', 'Fiction', 'available'),
(3, 'Rich Dad POOR DAD', 'ISBN222244444', '1997-08-01', 'self Motivation', 'available'),
(4, 'The Great Gatsby', 'ISBN111222333', '1925-11-22', 'Science Fiction', 'available'),
(5, 'Summer Love', 'ISBN999888777', '2012-07-09', 'Romance', 'unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `borrowedbooks_prerana`
--

CREATE TABLE `borrowedbooks_prerana` (
  `borrowed_id` int(11) NOT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `borrowed_book` varchar(255) DEFAULT NULL,
  `borrowed_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `borrowed_staff_name` varchar(255) DEFAULT NULL,
  `members_id` int(11) DEFAULT NULL,
  `books_id` int(11) DEFAULT NULL,
  `staffs_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowedbooks_prerana`
--

INSERT INTO `borrowedbooks_prerana` (`borrowed_id`, `member_name`, `borrowed_book`, `borrowed_date`, `return_date`, `borrowed_staff_name`, `members_id`, `books_id`, `staffs_id`) VALUES
(2, 'David Thapa', 'Rich Dad Poor Dad', '2022-03-15', '2022-03-20', 'Aaditya Bista', 2, 2, 2),
(3, 'Muskan Karki', 'Can Love Happen Twice', '2022-06-15', '0000-00-00', 'Sujal Chhetri', 3, 3, 3),
(5, 'Prinsa Shrestha', 'Half Girlfirend', '2022-06-25', '0000-00-00', 'Sweta Amatya', 5, 5, 5),
(7, 'David Thapa', 'Rich Dad Poor Dad', '2022-03-15', '2022-03-20', 'Aaditya Bista', 2, 2, 2),
(8, 'Muskan Karki', 'Can Love Happen Twice', '2022-06-15', '2022-06-18', 'Sujal Chhetri', 3, 3, 3),
(10, 'Prinsa Shrestha', 'Half Girlfirend', '2022-06-25', '2022-09-20', 'Sweta Amatya', 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `members_prerana`
--

CREATE TABLE `members_prerana` (
  `members_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `borrowed_status` enum('borrowed','returned') DEFAULT NULL,
  `join_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members_prerana`
--

INSERT INTO `members_prerana` (`members_id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `borrowed_status`, `join_date`) VALUES
(2, 'David', 'Karki', 'davidk11@gmail.com', '5556669999', 'Sitapaila', 'returned', '2022-02-01'),
(3, 'Muskan', 'Karki', 'muskankarki56@gmail.com', '9998887776', 'Balaju', 'borrowed', '2022-03-15'),
(5, 'Prinsa', 'Shrestha', 'prinsashrestha1@gmail.com', '7770019990', 'Kritipur', 'borrowed', '2022-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `shifts_prerana`
--

CREATE TABLE `shifts_prerana` (
  `shifts_id` int(11) NOT NULL,
  `shift_time` enum('morning','day','evening') DEFAULT NULL,
  `staff_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shifts_prerana`
--

INSERT INTO `shifts_prerana` (`shifts_id`, `shift_time`, `staff_name`) VALUES
(1, 'day', 'Rahul Jha'),
(2, 'day', 'Aaditya Bista'),
(3, 'evening', 'Sujal Chhetri'),
(4, 'morning', 'Priya Bhattarai'),
(5, 'day', 'Sweta Amatya');

-- --------------------------------------------------------

--
-- Table structure for table `staffs_prerana`
--

CREATE TABLE `staffs_prerana` (
  `staffs_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `hired_date` date DEFAULT NULL,
  `shifts_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffs_prerana`
--

INSERT INTO `staffs_prerana` (`staffs_id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `position`, `hired_date`, `shifts_id`) VALUES
(1, 'Rahul', 'Jha', 'rahuljha11@gmail.com', '1234567890', 'Kalimati', 'Manager', '2021-01-01', 1),
(2, 'Aaditya', 'Bista', 'aadityab123@gmail.com', '9876543210', 'Koteshowr', 'Supervisor', '2022-03-20', 2),
(3, 'Sujal', 'Chhetri', 'sujalchhetri2@gmail.com', '5555555555', 'Tokha', 'Clerk', '2021-05-01', 3),
(4, 'Priya', 'Bhattarai', 'priyabhattarai4@gmail.com', '1112223333', 'Basundhara', 'Assistant', '2021-02-20', 4),
(5, 'Sweta', 'Amatya', 'swetaamatya09@gmail.com', '9998881111', 'Swoyambhu', 'Associate', '2022-04-09', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors_prerana`
--
ALTER TABLE `authors_prerana`
  ADD PRIMARY KEY (`authors_id`);

--
-- Indexes for table `bookauthor_prerana`
--
ALTER TABLE `bookauthor_prerana`
  ADD KEY `books_id` (`books_id`),
  ADD KEY `authors_id` (`authors_id`);

--
-- Indexes for table `books_prerana`
--
ALTER TABLE `books_prerana`
  ADD PRIMARY KEY (`books_id`);

--
-- Indexes for table `borrowedbooks_prerana`
--
ALTER TABLE `borrowedbooks_prerana`
  ADD PRIMARY KEY (`borrowed_id`),
  ADD KEY `members_id` (`members_id`),
  ADD KEY `books_id` (`books_id`),
  ADD KEY `staffs_id` (`staffs_id`);

--
-- Indexes for table `members_prerana`
--
ALTER TABLE `members_prerana`
  ADD PRIMARY KEY (`members_id`);

--
-- Indexes for table `shifts_prerana`
--
ALTER TABLE `shifts_prerana`
  ADD PRIMARY KEY (`shifts_id`);

--
-- Indexes for table `staffs_prerana`
--
ALTER TABLE `staffs_prerana`
  ADD PRIMARY KEY (`staffs_id`),
  ADD KEY `shifts_id` (`shifts_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors_prerana`
--
ALTER TABLE `authors_prerana`
  MODIFY `authors_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books_prerana`
--
ALTER TABLE `books_prerana`
  MODIFY `books_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `borrowedbooks_prerana`
--
ALTER TABLE `borrowedbooks_prerana`
  MODIFY `borrowed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `members_prerana`
--
ALTER TABLE `members_prerana`
  MODIFY `members_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shifts_prerana`
--
ALTER TABLE `shifts_prerana`
  MODIFY `shifts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staffs_prerana`
--
ALTER TABLE `staffs_prerana`
  MODIFY `staffs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookauthor_prerana`
--
ALTER TABLE `bookauthor_prerana`
  ADD CONSTRAINT `bookauthor_prerana_ibfk_1` FOREIGN KEY (`books_id`) REFERENCES `books_prerana` (`books_id`),
  ADD CONSTRAINT `bookauthor_prerana_ibfk_2` FOREIGN KEY (`authors_id`) REFERENCES `authors_prerana` (`authors_id`);

--
-- Constraints for table `borrowedbooks_prerana`
--
ALTER TABLE `borrowedbooks_prerana`
  ADD CONSTRAINT `borrowedbooks_prerana_ibfk_1` FOREIGN KEY (`members_id`) REFERENCES `members_prerana` (`members_id`),
  ADD CONSTRAINT `borrowedbooks_prerana_ibfk_2` FOREIGN KEY (`books_id`) REFERENCES `books_prerana` (`books_id`),
  ADD CONSTRAINT `borrowedbooks_prerana_ibfk_3` FOREIGN KEY (`staffs_id`) REFERENCES `staffs_prerana` (`staffs_id`);

--
-- Constraints for table `staffs_prerana`
--
ALTER TABLE `staffs_prerana`
  ADD CONSTRAINT `staffs_prerana_ibfk_1` FOREIGN KEY (`shifts_id`) REFERENCES `shifts_prerana` (`shifts_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
