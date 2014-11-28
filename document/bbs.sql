-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: 2014 年 11 月 28 日 06:15
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
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `bbs_comment`
--

INSERT INTO `bbs_comment` (`id`, `thread_id`, `user_id`, `comment`, `date`) VALUES
(40, 13, 1, 'first', '20140707'),
(41, 14, 1, 'second', ''),
(42, 13, 1, 'third', ''),
(43, 0, 0, 'ファーストコメント', ''),
(44, 0, 0, 'fdsafdsafdsafdsa', ''),
(45, 32, 0, 'asdasdasdas', ''),
(46, 33, 0, 'dasdasasdas', ''),
(47, 34, 0, 'asdasdasdasd', ''),
(48, 36, 0, 'komoditi', ''),
(49, 0, 2, 'koaf@aseiofjapsiofadis', '2014-11-19 23:04:16'),
(50, 0, 2, 'fafafaafafafaaa', '2014-11-19 23:19:04'),
(51, 0, 2, 'dfasrwrnwrtbwrbwrbw', '2014-11-19 23:19:14'),
(52, 0, 2, 'dgqethqetbaver', '2014-11-19 23:23:16'),
(53, 0, 2, 'regqerfqwef', '2014-11-19 23:23:19'),
(54, 0, 2, 'hohohfqfqfhoqfqhoqfqf', '2014-11-19 23:23:28'),
(55, 32, 2, 'xxxxxxxxxxxxxxxxxxxxx', '2014-11-20 00:06:45'),
(56, 32, 2, 'jijojoijoi', '2014-11-20 00:44:31'),
(57, 32, 2, 'lpkoihi', '2014-11-20 00:44:37'),
(58, 32, 2, 'jiojoijoijoijoijoihuhuuh\r\n', '2014-11-20 00:45:07'),
(59, 32, 2, 'johfdrestrexgfdxgfc', '2014-11-20 00:45:16'),
(60, 32, 2, 'jaoisjfpaifaf', '2014-11-20 00:48:55'),
(61, 32, 2, 'afafafaffafafafa', '2014-11-20 00:49:58'),
(62, 37, 0, ';ijpi@uhpiar@fq8efpaisudjf@qhfqeirfasdnqowurhvasnvpasujvopi;iqerifgqervaknv@afkmv@aifaoijfkdfjasfqifa;fhfkasifa@rgq:rfnljfhalkjfkja;klsdjfirfeghnjfinadj@asijp;i;ijpiw;ernfaijaidfjqensndfigjs:dfijg;jkl;jj', ''),
(63, 32, 2, 'hihihihi\r\nlgku\r\nkjbuktsjxgfj', '2014-11-20 01:34:43'),
(64, 32, 2, 'hgc,hj っbｂ\r\n；うｈｋｂｋｂ\r\nｖっｃｊ', '2014-11-20 01:37:49'),
(65, 38, 0, 'ninininini', ''),
(66, 38, 2, 'bbububububububu', '2014-11-20 01:54:50'),
(67, 38, 2, 'じょじょじょおじょ', '2014-11-20 02:01:36'),
(68, 38, 2, 'じょいｄｆｊｇｐうぃｇじゃｄ', '2014-11-20 02:01:53'),
(69, 38, 2, 'sdfasdf\r\nasdfasdf\r\n', '2014-11-20 02:03:18'),
(70, 36, 2, 'がｇｓｇ', '2014-11-20 02:05:45'),
(71, 39, 0, 'hihihihihh\r\njoijpij;i\r\nnlibuihbnliuhnui', ''),
(72, 39, 2, 'fsdfsdfsdf', '2014-11-21 13:11:34'),
(73, 40, 0, '1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890', ''),
(74, 41, 0, 'sdfgggfgfdsdfg', ''),
(75, 42, 0, 'ｓｄｆｇｓｄｗｒｔｈｗｒｔｈｗｔｒｂｗｒｂｒｔｂｗｒｗｒｔｊｗｒてぃｗｊｂん；そいｇｊ：いｇｍｓｋｔんｖ＠いｔｈ：ｋｔｇｍ；いおｍｂｒ；ｂこいｊｂ：ｋｍ；ｓｌｋｄｆｇｊｓｄｆｇｋｊｓｄｆ；ｇｊｓｄｆｇｋｐｓｄふぃｇｊｗ；ｖ；いｔｈじおｔｇｈｗ；んｇｔｗ；ｈｄふぉｂ；そいｊｓｄ；いｇち', ''),
(76, 43, 0, 'ああああああああああああああああああああああああああああああああああああああああ', ''),
(77, 44, 0, 'あいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえお', ''),
(78, 45, 0, 'asdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfg', ''),
(79, 46, 0, 'frfrfrfrf', ''),
(80, 46, 2, 'ggtgggtggggtggggg', '2014-11-25 15:08:17');

-- --------------------------------------------------------

--
-- テーブルの構造 `bbs_thread`
--

CREATE TABLE `bbs_thread` (
`id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `title` text NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `bbs_thread`
--

INSERT INTO `bbs_thread` (`id`, `user_id`, `title`, `date`) VALUES
(12, 0, 'asdfasdfasdadadf', '2014'),
(13, 0, 'fadfadfasdf', '2014'),
(14, 0, 'asdfasdfasdfr', '2014'),
(32, 2, 'asdasdasd', '2014-11-18 19:20:17'),
(33, 2, 'asdasda', '2014-11-18 19:21:15'),
(34, 2, 'asdasdasdasd', '2014-11-18 19:21:22'),
(35, 2, 'Fuel PHPでのweb開発が捗る件について', '2014-11-19 22:43:12'),
(36, 2, 'komobiu', '2014-11-19 22:50:17'),
(37, 2, 'jpjpjpjpjpj', '2014-11-20 01:15:54'),
(38, 2, 'hohohohoho', '2014-11-20 01:54:41'),
(39, 2, 'fafafafafafaf', '2014-11-21 12:57:34'),
(40, 2, '', '2014-11-21 13:19:07'),
(41, 2, 'sdfgsdfg', '2014-11-21 13:20:51'),
(42, 2, 'sfsdfsfsdfｇにっｊｓぴｆｊｇぴｄｊｇｐうぃえｒんぐぇｒっっｓｄｆｇｓｄｇ', '2014-11-21 13:35:01'),
(43, 2, '', '2014-11-21 13:36:44'),
(44, 2, 'あいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえお', '2014-11-21 13:39:51'),
(45, 2, 'asdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfgasdfg', '2014-11-21 13:43:19'),
(46, 2, 'aazazaza', '2014-11-25 15:08:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bbs_comment`
--
ALTER TABLE `bbs_comment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bbs_thread`
--
ALTER TABLE `bbs_thread`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bbs_comment`
--
ALTER TABLE `bbs_comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `bbs_thread`
--
ALTER TABLE `bbs_thread`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;