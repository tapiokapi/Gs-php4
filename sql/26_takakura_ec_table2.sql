-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2021 at 08:47 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gs_php1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ec_table2`
--

CREATE TABLE `ec_table2` (
  `id` int(12) NOT NULL,
  `item` varchar(64) NOT NULL,
  `value` int(6) NOT NULL,
  `description` text NOT NULL,
  `fname` varchar(128) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ec_table2`
--

INSERT INTO `ec_table2` (`id`, `item`, `value`, `description`, `fname`, `indate`) VALUES
(1, 'くま', 1000, 'kuma', 'bear.png', '2021-02-04 21:14:59'),
(2, 'ねこ', 10000, 'ねこだよ', 'cat.png', '2021-02-14 14:23:34'),
(3, 'いぬ', 20000, 'いぬだよ', 'dog.png', '2021-02-14 14:25:34'),
(4, 'うさぎ', 38999, 'うさぎだよ', 'rabbit.png', '2021-02-14 14:25:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ec_table2`
--
ALTER TABLE `ec_table2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ec_table2`
--
ALTER TABLE `ec_table2`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
