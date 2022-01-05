-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 03:54 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse311.4 group 3 project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`) VALUES
('masud.hassan@gmail.com'),
('saad.alvee@gmail.com'),
('sanjana.rahman@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `authenticator`
--

CREATE TABLE `authenticator` (
  `Email` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authenticator`
--

INSERT INTO `authenticator` (`Email`, `Password`) VALUES
('bruce.wayne@gmail.com', 'bw2000'),
('clark.kent@gmail.com', 'ck1999'),
('masud.hassan@gmail.com', 'mojarpass'),
('saad.alvee@gmail.com', 'hashirpass'),
('sanjana.rahman@gmail.com', 'khushirpass');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Book_Id` int(255) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Author` varchar(200) NOT NULL,
  `Edition` int(255) NOT NULL,
  `Publisher` varchar(200) NOT NULL,
  `A_Email` varchar(100) NOT NULL,
  `Available` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_Id`, `Title`, `Author`, `Edition`, `Publisher`, `A_Email`, `Available`) VALUES
(101, 'Bohubrihi', 'Humayun Ahmed', 5, 'Rokomari', 'sanjana.rahman@gmail.com', 'Yes'),
(102, 'Debi', 'Humayun Ahmed', 12, 'Rokomari', 'sanjana.rahman@gmail.com', 'Yes'),
(104, 'Doomsday Conspiracy', 'Sidney Sheldon', 5, 'Tim & Brothers', 'sanjana.rahman@gmail.com', 'Yes'),
(106, 'Calculus: Early Trancedentals', 'Anton Bevis', 11, 'Squash Publishing', 'masud.hassan@gmail.com', 'Yes'),
(109, 'A Thousand Splendid Suns', 'Khaled Hosseini', 3, 'Johnson Publishers', 'masud.hassan@gmail.com', 'Yes'),
(110, 'Frankenstein', 'Mary Shelley', 14, 'Mavor & Jones', 'masud.hassan@gmail.com', 'Yes'),
(114, 'The Kite Runner', 'Khaled Hosseini', 3, 'Tim & Brothers', 'masud.hassan@gmail.com', 'Yes'),
(119, 'The Alchemist', 'Paulo Coelho', 4, 'Starlight Publishers', 'saad.alvee@gmail.com', 'Yes'),
(120, 'The Great Gatsby', 'F. Scott Fitzgerald', 13, 'Nick Carraway', 'saad.alvee@gmail.com', 'Yes'),
(124, 'To Kill a Mockingbird', 'Harper Lee', 3, 'J. B. Lippincott & Co.', 'saad.alvee@gmail.com', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `fine_history`
--

CREATE TABLE `fine_history` (
  `Return_Date` date NOT NULL,
  `Book_Id` int(255) NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `Fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `Book_Id` int(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Issue_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `issued_books`
--

CREATE TABLE `issued_books` (
  `Book_Id` int(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Issue_Date` date NOT NULL,
  `Est_Return_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `U_Email` varchar(100) NOT NULL,
  `A_Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Email` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `Phone_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `Name`, `DOB`, `Phone_no`) VALUES
('bruce.wayne@gmail.com', 'Bruce Wayne', '0000-00-00', '123456789'),
('clark.kent@gmail.com', 'Clark Kent', '0000-00-00', '987654321');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `U_Email` varchar(100) NOT NULL,
  `Book_Id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `authenticator`
--
ALTER TABLE `authenticator`
  ADD PRIMARY KEY (`Email`,`Password`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Book_Id`);

--
-- Indexes for table `fine_history`
--
ALTER TABLE `fine_history`
  ADD PRIMARY KEY (`Return_Date`,`Book_Id`,`Email`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`Book_Id`,`Email`);

--
-- Indexes for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD PRIMARY KEY (`Book_Id`,`Email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`U_Email`,`A_Email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`U_Email`,`Book_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
