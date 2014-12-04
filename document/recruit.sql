-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: 2014 年 12 月 04 日 13:12
-- サーバのバージョン： 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `idecom_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `recruit`
--

CREATE TABLE `recruit` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `skill` text NOT NULL,
  `description` text NOT NULL,
  `detail` text,
  `subscriber` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT 'noimage.jpg',
  `category` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recruit`
--
ALTER TABLE `recruit`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recruit`
--
ALTER TABLE `recruit`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;