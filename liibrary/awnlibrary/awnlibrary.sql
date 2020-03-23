-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 مارس 2020 الساعة 04:06
-- إصدار الخادم: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awnlibrary`
--

-- --------------------------------------------------------

--
-- بنية الجدول `book`
--

CREATE TABLE `book` (
  `bookId` int(11) NOT NULL,
  `bookName` varchar(65) NOT NULL,
  `bookAuther` varchar(65) NOT NULL,
  `img` varchar(100) NOT NULL,
  `depart` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `book`
--

INSERT INTO `book` (`bookId`, `bookName`, `bookAuther`, `img`, `depart`, `level`) VALUES
(1, 'هندسة برمجيات', 'احمد الرائد', '1.jpg', 'الحاسب', 'المستوى الاول'),
(2, 'معمارية حاسوب', 'مؤيد اسماعيل', 'منيرiiiههه.jpg', 'الحاسب', 'المستوى الثاني'),
(3, 'الطب العربي', 'سعيد احمد علي', 'mi-redmi-note-4-na-original-imaeqdxhgnerzpeg.jpeg', 'العلوم الطبية التطبقية', 'المستوى الثاني'),
(4, 'كتاب الرازي الطبي', 'احمد', 'منيره.jpg', 'العلوم الطبية التطبقية', 'المستوى الثاني');

-- --------------------------------------------------------

--
-- بنية الجدول `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `fName` varchar(65) NOT NULL,
  `lName` varchar(65) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `user`
--

INSERT INTO `user` (`userId`, `fName`, `lName`, `email`, `password`) VALUES
(4, 'monira', 'queen', 'monira@gmail.com', '123'),
(5, 'محمد ', 'علي ', 'mm@gmail.com', '123'),
(6, 'sara', 'queen', 's@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
