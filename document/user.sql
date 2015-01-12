-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- ホスト: 127.0.0.1
-- 生成日時: 2015 年 1 月 12 日 06:35
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
-- テーブルの構造 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `group` int(11) NOT NULL DEFAULT '1',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(100) DEFAULT NULL,
  `nickname` varchar(50) NOT NULL,
  `grade` int(1) DEFAULT NULL,
  `major` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `genre` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `skill` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` int(1) NOT NULL DEFAULT '1',
  `password_change` int(1) NOT NULL DEFAULT '0',
  `last_login` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `login_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) unsigned NOT NULL,
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `group`, `email`, `thumbnail`, `nickname`, `grade`, `major`, `genre`, `skill`, `status`, `password_change`, `last_login`, `login_hash`, `created_at`, `updated_at`) VALUES
(1, 'b1101', '1bHk3E5Z6JUGBdYwB0LOcv2TPrnw9Qz7W12UYDelh5U=', 1, 'b1101@oic.jp', NULL, 'ｻｶﾓﾄﾉﾘﾌﾐ坂本　憲史', NULL, NULL, NULL, NULL, 1, 0, '1417493441', '8c1fc2e50b8aab6ee24ed087c655b74a6b381482', 1417449592, 1417450306),
(2, 'b1225', 'NMN0aoArG7MS9tvoVPVdUWSvVGaCEeP8D21R+MPhxEU=', 1, 'b1225@oic.jp', '/assets/img/user/user_thumbnail/15010912044278528e1c65c76fd5a92800724393f29c.JPG', 'b1225', 1, 's', 'System', '["35","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0"]', 0, 1, '1420955374', '38c76c5872127a6d1c8ef1fa9261b8124c16023d', 1417500879, 1420807377),
(3, 'b1226', 'NMN0aoArG7MS9tvoVPVdUWSvVGaCEeP8D21R+MPhxEU=', 1, 'b1225@oic.jp', '/assets/img/user/user_thumbnail/15010912044278528e1c65c76fd5a92800724393f29c.JPG', 'asdfasdfasdf', NULL, NULL, NULL, NULL, 1, 0, '1418710019', '58f469d257fdfb669f2a2dc8a259ad845510e052', 1417500879, 1417500911),
(4, 'b1227', 'NMN0aoArG7MS9tvoVPVdUWSvVGaCEeP8D21R+MPhxEU=', 1, 'b1225@oic.jp', '/assets/img/user/user_thumbnail/15010912044278528e1c65c76fd5a92800724393f29c.JPG', 'dfjhdfjhgfjk', NULL, NULL, NULL, NULL, 1, 0, '1418710019', '58f469d257fdfb669f2a2dc8a259ad845510e052', 1417500879, 1417500911),
(5, 'b1228', 'NMN0aoArG7MS9tvoVPVdUWSvVGaCEeP8D21R+MPhxEU=', 1, 'b1225@oic.jp', '/assets/img/user/user_thumbnail/15010912044278528e1c65c76fd5a92800724393f29c.JPG', 'tyuisrgnf', NULL, NULL, NULL, NULL, 1, 0, '1418710019', '58f469d257fdfb669f2a2dc8a259ad845510e052', 1417500879, 1417500911),
(6, 'b1229', 'NMN0aoArG7MS9tvoVPVdUWSvVGaCEeP8D21R+MPhxEU=', 1, 'b1225@oic.jp', '/assets/img/user/user_thumbnail/15010912044278528e1c65c76fd5a92800724393f29c.JPG', 'rtewrggfnsfth]', NULL, NULL, NULL, NULL, 1, 0, '1418710019', '58f469d257fdfb669f2a2dc8a259ad845510e052', 1417500879, 1417500911);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
