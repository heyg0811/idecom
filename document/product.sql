-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- ホスト: 127.0.0.1
-- 生成日時: 2015 年 1 月 20 日 02:57
-- サーバのバージョン: 5.5.40-0ubuntu0.14.04.1
-- PHP のバージョン: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `idecom_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `category` int(2) NOT NULL,
  `skill` text NOT NULL,
  `outline` text NOT NULL,
  `detail` text NOT NULL,
  `thumbnail` varchar(150) DEFAULT 'noimage.jpg',
  `nice` int(11) NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0',
  `source` varchar(150) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `zip` varchar(150) NOT NULL,
  `zip_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- テーブルのデータのダンプ `product`
--

INSERT INTO `product` (`id`, `user_id`, `title`, `category`, `skill`, `outline`, `detail`, `thumbnail`, `nice`, `count`, `status`, `source`, `created_at`, `zip`, `zip_name`) VALUES
(49, 2, 'あｓｄふぁｓｄｆ', 1, '["54","50","0","0","0","0","0","0","57","0","0","0","54","0","0","0","0","0","0","0","0","0","0","0","0","0"]', 'sdfg', '<p>gfhfdghdfg</p>\r\n', '2/product/49/IMG_0035.JPG', 0, 57, 1, NULL, 1421606930, '2/product/49/', 'e44d639997a6477b8f3e338128fb0492.zip');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
