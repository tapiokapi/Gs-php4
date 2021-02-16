-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2021 at 08:49 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gs_php1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ec_user_table`
--

CREATE TABLE `ec_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(64) NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ec_user_table`
--

INSERT INTO `ec_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'テスト1管理者', 'test1', 'test1', 1, 0),
(2, 'テスト2一般', 'test2', 'test2', 0, 0),
(3, 'テスト3一般', 'test3', 'test3', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ec_user_table`
--
ALTER TABLE `ec_user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ec_user_table`
--
ALTER TABLE `ec_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
