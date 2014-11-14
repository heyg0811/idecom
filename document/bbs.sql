-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: 2014 年 11 月 14 日 06:32
-- サーバのバージョン： 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `idecom_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `bbs_comment`
--

CREATE TABLE `bbs_comment` (
`id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `comment` text NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `bbs_comment`
--

INSERT INTO `bbs_comment` (`id`, `thread_id`, `user_id`, `comment`, `date`) VALUES
(1, 1, '0', 'テストデーターテストデーターテストデーターテストデーターテストデーターテストデーターテストデーターテストデーターテストデーターテストデーターテストデーター', '2014/11/06 23:48:09'),
(2, 1, 'B1123547', 'gaggdgqergqggrgg', '2014/11/06 23:51:09'),
(3, 11, 'B1123547', 'ワロスワロスワロスワロスワロスワロスワロス\r\n', '2014/11/07 00:06:51'),
(4, 11, 'B1123547', 'はｓぢｆｈぺいうｒｈｇｑぷｈｇ＠あいｆ「＠いあぷｆｈ', '2014/11/07 00:07:29'),
(5, 11, 'B1123547', 'ｋじゃｊｓｐふぉんｖ＠あいｇｈ「あいｆｓｊがｆ', '2014/11/07 00:07:38'),
(6, 11, 'B1123547', 'きぴあのお＠ｋｓｋｄｆくぉかｒふぃ；ｇｑりくぇ＠９ｑｒんがｋｄｆヴぃが：：：あｊｋんｇ', '2014/11/07 00:07:48'),
(7, 11, 'B1123547', 'っｋ；おい＠ｆｈｗぴうふｐびあｓｄSnnk;mnciijbef', '2014/11/07 00:08:23'),
(8, 11, 'B1123547', '求むエンジニア！！', '2014/11/07 00:08:47'),
(9, 11, 'B1123547', 'いい；おけんｒｖくぇりじｓｄｆけ；ｒふｇｒｆるｊｆじじぇ；あｋｓ；いぢあｆ', '2014/11/07 00:09:04'),
(10, 11, 'B1123547', 'じょじょじょじょじょうじじょうじょじょうじ', '2014/11/07 00:09:43'),
(11, 1, 'B1123547', 'web系エンジニア募集します詳しくはhttp://idecom/recluit/detail/b1111より一緒に面白いものを作りましょう！！', '2014/11/07 00:13:51'),
(12, 1, 'B1123547', 'sdfasdfasfsdfasdf', '2014/11/07 00:17:25'),
(13, 1, 'B1123547', 'asdfasdfasdfasdfasdfasdf', '2014/11/07 15:58:29'),
(14, 1, 'B1123547', 'aafafafafafafaf', '2014/11/07 15:58:36'),
(15, 1, 'B1123547', 'ssdsdsdsdsdsdsdsd', '2014/11/07 15:58:40'),
(16, 1, 'B1123547', 'sdssdssdsdsdssdsdsdsdsd', '2014/11/07 15:58:46'),
(17, 1, 'B1123547', 'ijijfiweujw-irjgpirjpirjgpeirfjpajpirjgweirg\r\n\r\n\r\n\r\naigjwerg\r\nergijw4\r\n', '2014/11/07 15:59:00'),
(18, 1, 'B1123547', 'asfaerg\r\ndsfgerg', '2014/11/07 15:59:07'),
(19, 1, 'B1123547', 'sdfgsdfgsg\r\nsdfgsdfg', '2014/11/07 15:59:14'),
(20, 1, 'B1123547', 'sssgsgsg sgsgsg', '2014/11/07 15:59:19'),
(21, 1, 'B1123547', 'dgrgwergwerg     wergwerg', '2014/11/07 15:59:25'),
(22, 1, 'B1123547', 'zsfvdvefvafv   fvadfvadfvadfv', '2014/11/07 16:00:25'),
(23, 1, 'B1123547', 'vzvvzvssvsvsvssss', '2014/11/07 16:00:32'),
(24, 1, 'B1123547', 'dvsdfvfv', '2014/11/07 16:01:54'),
(25, 11, 'B1123547', 'wvwvwvvssdfvsdfvs', '2014/11/07 16:02:40'),
(26, 11, 'B1123547', 'fafafafafafaf', '2014/11/07 16:02:47'),
(27, 11, 'B1123547', 'aa', '2014/11/07 16:02:52'),
(28, 11, 'B1123547', 'afafafafa', '2014/11/07 16:03:06'),
(29, 11, 'B1123547', 'afafaffafafasdfasfqwefqerfer', '2014/11/07 16:03:17'),
(30, 11, 'B1123547', 'あｓｄふぁｓｄふぁｓｄｆ', '2014/11/11 19:23:16'),
(31, 11, 'B1123547', 'asdasdasdas', '2014/11/11 19:42:17'),
(32, 11, 'B1123547', 'adasdsadasd', '2014/11/11 19:42:24'),
(33, 11, 'B1123547', 'asdasdasdasdas', '2014/11/11 19:42:26'),
(34, 11, 'B1123547', 'asdasdasd', '2014/11/11 19:42:29'),
(35, 11, 'B1123547', 'asdasdads', '2014/11/11 19:45:10'),
(36, 11, 'B1123547', 'テストとと', '2014/11/11 19:47:42'),
(37, 11, 'B1123547', 'asdfasdfasdfasdfasdfasdf', '2014/11/12 18:36:08'),
(38, 11, 'B1123547', 'ファーストコメントだ～よ\r\n', '2014/11/12 18:44:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bbs_comment`
--
ALTER TABLE `bbs_comment`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bbs_comment`
--
ALTER TABLE `bbs_comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- テーブルの構造 `bbs_thread`
--

CREATE TABLE `bbs_thread` (
`id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `title` text NOT NULL,
  `date` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `bbs_thread`
--

INSERT INTO `bbs_thread` (`id`, `user_id`, `title`, `date`) VALUES
(1, 1, 'asdadasdasd', 0),
(2, 2, 'asdasd', 0),
(3, 2, 'asdasd', 0),
(4, 1717, 'fghwgesfwrysfvsgbwfgsfverqerhqethwtsrafgwrgwergarg', 0),
(5, 1345, 'gdfhngdfhngdfhngdfhngdfhngdfhngdfhngdfhngdfhngdfhngdfhngdfhn', 2147483647),
(6, 1345, 'gdfhngdfhngdfhngdfhngdfhngdfhngdfhngdfhngdfhngdfhngdfhngdfhn', 2147483647),
(7, 0, 'asdasd', 2014),
(8, 0, 'asdasd', 2014),
(9, 0, 'asdasd', 2014),
(10, 0, 'テスト', 2014),
(11, 0, 'asdfasdfasf', 2014);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bbs_thread`
--
ALTER TABLE `bbs_thread`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bbs_thread`
--
ALTER TABLE `bbs_thread`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;