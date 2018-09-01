-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 06 月 21 日 18:08
-- 伺服器版本: 10.1.32-MariaDB
-- PHP 版本： 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `order_system`
--

-- --------------------------------------------------------

--
-- 資料表結構 `latest_news`
--

CREATE TABLE `latest_news` (
  `No` int(11) NOT NULL,
  `Name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Content` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `latest_news`
--

INSERT INTO `latest_news` (`No`, `Name`, `Time`, `Title`, `Content`) VALUES
(2, '系統管理員', '2018-06-15 23:18:51', '星巴克買一送一二三', '      具與UTF8中文亂碼的終極研究這篇不是探討SEO， 出現在AdSenseor或許有些奇怪，不過因為最近筆者勤於備份資料，而且試著把建立起資料a  ');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `Id` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Phone_number` int(11) NOT NULL,
  `Grade` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`Id`, `Username`, `Password`, `Phone_number`, `Grade`) VALUES
(1, 'root', '0000', 1, 0),
(3, 'a', '1234', 2, 1),
(4, 'b', '1234', 5645, 1),
(7, 'test', '456', 1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `menu`
--

CREATE TABLE `menu` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Kind` varchar(30) NOT NULL,
  `Price` int(11) NOT NULL,
  `Pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `menu`
--

INSERT INTO `menu` (`Id`, `Name`, `Kind`, `Price`, `Pic`) VALUES
(1, '中式燉肉末佐青蔥青菜細麵', '中式主餐', 80, ''),
(2, '油香煎餅佐嫩綠青蔥', '中式附餐', 60, ''),
(3, '法是焗香奶油煎餅佐相思豆泥', '法式甜點', 60, ''),
(4, '中式燉飯佐甘署', '中式主餐', 60, '');

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--

CREATE TABLE `message` (
  `Id` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Content` text NOT NULL,
  `Name` tinyint(1) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Name_re` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `message`
--

INSERT INTO `message` (`Id`, `Title`, `Content`, `Name`, `Date`, `Name_re`) VALUES
(1, '伯朗買一送一', '故事圍繞著三個仿生人', 0, '2018-06-11 14:46:39', ''),
(2, '西雅圖買一送一', '西雅圖，是美國華盛頓州的一座港口城市', 1, '2018-06-11 14:46:42', ''),
(11, '便當1個30', '排骨飯60元', 0, '2018-06-13 15:38:17', '');

-- --------------------------------------------------------

--
-- 資料表結構 `message_member`
--

CREATE TABLE `message_member` (
  `Id` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Content` text NOT NULL,
  `Name` tinyint(1) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Message_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `message_member`
--

INSERT INTO `message_member` (`Id`, `Title`, `Content`, `Name`, `Date`, `Message_name`) VALUES
(1, '伯朗買一送一', '三個仿生人1', 1, '2018-06-13 22:23:22', ''),
(2, '西雅圖買一送一', '回復西雅圖1', 1, '2018-06-13 22:54:56', 'b人'),
(8, '伯朗買一送一', 'aaaa', 0, '2018-06-17 15:09:03', '');

-- --------------------------------------------------------

--
-- 資料表結構 `message_re`
--

CREATE TABLE `message_re` (
  `Id` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Content` text NOT NULL,
  `Name` tinyint(1) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Message_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `message_re`
--

INSERT INTO `message_re` (`Id`, `Title`, `Content`, `Name`, `Date`, `Message_name`) VALUES
(2, '伯朗買一送一', 'qqq', 0, '2018-06-17 13:42:57', '系統管理員');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `latest_news`
--
ALTER TABLE `latest_news`
  ADD PRIMARY KEY (`No`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Id`);

--
-- 資料表索引 `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Id`);

--
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Id`);

--
-- 資料表索引 `message_member`
--
ALTER TABLE `message_member`
  ADD PRIMARY KEY (`Id`);

--
-- 資料表索引 `message_re`
--
ALTER TABLE `message_re`
  ADD PRIMARY KEY (`Id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `latest_news`
--
ALTER TABLE `latest_news`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表 AUTO_INCREMENT `menu`
--
ALTER TABLE `menu`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表 AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表 AUTO_INCREMENT `message_member`
--
ALTER TABLE `message_member`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表 AUTO_INCREMENT `message_re`
--
ALTER TABLE `message_re`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
