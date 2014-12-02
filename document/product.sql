-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: 2014 年 12 月 02 日 08:43
-- サーバのバージョン： 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `idecom_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `product`
--

CREATE TABLE `product` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `category` int(1) NOT NULL,
  `skill` varchar(100) NOT NULL,
  `outline` text NOT NULL,
  `detail` text NOT NULL,
  `thumbnail` varchar(150) DEFAULT 'noimage.jpg',
  `nice` int(11) NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `source` varchar(150) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `product`
--

INSERT INTO `product` (`id`, `user_id`, `title`, `category`, `skill`, `outline`, `detail`, `thumbnail`, `nice`, `count`, `status`, `source`, `created_at`) VALUES
(3, 2, 'むっふぃー', 1, 'php', 'asdfasdfqrefqer', 'erfgqerihg;jern:iowej:orfq:erqm:fm:q', 'noimage.jpg', 0, 1, 0, '', 0),
(4, 2, 'むっふぃー', 1, 'php', 'asdfasdfqrefqer', 'erfgqerihg;jern:iowej:orfq:erqm:fm:q', 'noimage.jpg', 0, 2, 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;