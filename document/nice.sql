-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: 2014 年 12 月 04 日 13:15
-- サーバのバージョン： 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `idecom_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `nice`
--

CREATE TABLE `nice` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
