-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2020 at 07:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `url`
--

-- --------------------------------------------------------

--
-- Table structure for table `shorturl`
--

CREATE TABLE `shorturl` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `txt` varchar(50) NOT NULL,
  `short_link` varchar(50) NOT NULL,
  `hit_count` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shorturl`
--

INSERT INTO `shorturl` (`id`, `link`, `txt`, `short_link`, `hit_count`, `status`) VALUES
(6, 'https://github.com/sharmasw/DjangoDashboardCorona/blob/master/coronaDash/firstPage/views.py', 'django', 'django', 10, 1),
(7, 'https://timesofindia.indiatimes.com/home/education/news/upsc-engineering-services-prelims-result-2020-declared-heres-list-of-candidates-selected-for-mains/articleshow/74228740.cms', 'UPSC Prelims Result', 'upsc', 2, 1),
(8, 'https://www.google.com/search?q=logo&sxsrf=ALeKk00XldttQAyJJp8XSWZbgop2_YI1NQ:1582221814200&ei=9slOXtzzC82f4-EPg6KaqAE&start=10&sa=N&ved=2ahUKEwjcxsPJ2-DnAhXNzzgGHQORBhUQ8NMDegQIDRBB&biw=1366&bih=625', 'Logo Maker', 'logo', 2, 1),
(9, 'https://www.edureka.co/blog/interview-questions/php-interview-questions/', 'PHP - Interview', 'php', 2, 1),
(10, 'https://www.kaggle.com/mjbhobe/fruits-360-keras-99-test-accuracy', 'Kaggle -Fruit', 'kaggle', 1, 1),
(11, 'https://internshala.com/internship/detail/python-development-internship-in-mohali-chandigarh-at-techneith1586165997?referral=similar_internships&aid=37682690&iid=891447', 'Internshala Python Development Internship', 'internshala', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shorturl`
--
ALTER TABLE `shorturl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shorturl`
--
ALTER TABLE `shorturl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
