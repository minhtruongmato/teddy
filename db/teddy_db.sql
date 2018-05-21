-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 21, 2018 lúc 01:03 PM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `teddy_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0tadt66nvpai0ed3i05vholq5skfre6o', '::1', 1526893336, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839333333363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('340ps1kvtcn52nb82rs7jva40jlra46r', '::1', 1526897349, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839373334393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('5k4jm0a594dtavj2e06g0fr6ob9b0u93', '::1', 1526889683, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363838393638333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('5oct0ir7g4nnpd0bq1dqlhar5gnjlg54', '::1', 1526889337, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363838393333373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('60ontjermn64ajgr7ccljr492jbtt2uu', '::1', 1526892668, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839323636383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('6bbimdlu60sbug6rottrlgsud4uk2uvv', '::1', 1526890844, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839303834343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('6gigdic73jsmjh3bfgf8pmac62p5k413', '::1', 1526890353, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839303335333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('9usbh4nqh9urkppqdj1i26d1nj3nf1n5', '::1', 1526896720, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839363732303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('ai1fkqareaca6atj2ukl1hd6eeqcns9k', '::1', 1526891537, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839313533373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('atd5djpdclov8hlek1lv0bak1cmfct5n', '::1', 1526898674, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839383637343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('cqnfmg71gq810jpdlnbqsrg0kguur242', '::1', 1526894466, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839343436363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('cud99lt7qjgpp7vkc6ivae6g23o0409g', '::1', 1526895169, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839353136393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('d97hjgs9l1s6jurgh1vstm9msdp050j8', '::1', 1526896413, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839363431333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('ekh5k382is6imhr4mitq8m8np2j1rpsd', '::1', 1526900583, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363930303433303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('euq1siviu0ke97lmg3tu833fl952knc4', '::1', 1526889010, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363838393031303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('fld7vm0lcsd2i046qchimu5g7l8524nn', '::1', 1526891891, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839313839313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('h42us2uv0cs1s9lc7sod6ki6et3sjoji', '::1', 1526895787, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839353738373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('i5bb86mu0jsuhe279e9urgh04j10khso', '::1', 1526893992, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839333939323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('iie5d5f9jsf4t96hp3a4gpjvl0mp7n4c', '::1', 1526888215, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363838383231353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('krrljr8vpi7b8n9e3k9s634b003hmevs', '::1', 1526889995, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363838393939353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('l083ae733r06ccg8fthg28q01scu2pvm', '::1', 1526893668, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839333636383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('mj5iv80q2eb5lvcj4c0kq44sngqafn47', '::1', 1526899787, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839393738373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('moafgpu994nbddfmhcicohhtpv9kmrgl', '::1', 1526892234, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839323233343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('ogcfqt3m3oh3195afl1eac2mm3t4b7kk', '::1', 1526897835, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839373833353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('p3jpghqvkci11a3amcaui469j708921o', '::1', 1526891221, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839313232313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('pgj2fis1kfn25b2fr657eubtm6bnjv77', '::1', 1526897028, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839373032383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('rba7i9f1i6tlji7qii8aboc8c2o78sbi', '::1', 1526899432, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839393433323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('s13pna0b4kq8nhfplp1mkgif3bnf1gmn', '::1', 1526898211, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839383231313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('si1ppb6j5as7135d90luj8aur8192elp', '::1', 1526894808, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363839343830383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('t1avm45o3ldujc9ci915k519tgp1e5dd', '::1', 1526900430, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363930303433303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b),
('t8r1378u9n5gv0fmspnbf2aisigeiu30', '::1', 1526888568, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532363838383536383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353236373138363235223b6c6173745f636865636b7c693a313532363836383830363b6c616e67416262726576696174696f6e7c733a323a22656e223b6d6573736167655f737563636573737c733a32353a225468c3aa6d206de1bb9b69207468c3a06e682063c3b46e6721223b5f5f63695f766172737c613a313a7b733a31353a226d6573736167655f73756363657373223b733a333a226f6c64223b7d);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_activated` tinyint(4) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `check_menu_children` int(11) NOT NULL DEFAULT '0' COMMENT '0 : nochildrenmenu; 1 : childrenmenue',
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_post` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `sort`, `parent_id`, `url`, `slug`, `is_activated`, `is_deleted`, `check_menu_children`, `created_at`, `created_by`, `updated_at`, `updated_by`, `slug_post`) VALUES
(1, 2, 0, 'http://localhost/teddy/gioi-thieu/ve-chung-toi', 'gioi-thieu', 0, 0, 0, '2018-05-14 04:39:09', 'administrator', '2018-05-14 04:39:09', 'administrator', 've-chung-toi'),
(4, 1, 0, 'http://localhost/teddy/trang-chu', 'trang-chu', 0, 0, 0, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', NULL),
(5, 4, 0, 'http://localhost/teddy/bai-viet', 'bai-viet', 0, 0, 1, '2018-05-21 13:08:27', 'administrator', '2018-05-21 13:08:27', 'administrator', ''),
(6, 0, 5, 'http://localhost/teddy/tin-tuc-1', 'tin-tuc-1', 0, 0, 0, '2018-05-21 15:48:09', 'administrator', '2018-05-21 15:48:09', 'administrator', ''),
(7, 0, 5, 'http://localhost/teddy/tuyen-dung', 'tuyen-dung', 0, 0, 1, '2018-05-21 10:00:13', 'administrator', '2018-05-21 10:00:13', 'administrator', ''),
(8, 3, 0, 'http://localhost/teddy/thuc-don/', 'thuc-don', 0, 0, 0, '2018-05-14 05:26:33', 'administrator', '2018-05-14 05:26:33', 'administrator', NULL),
(9, 5, 0, 'http://localhost/teddy/lien-he', 'lien-he', 0, 0, 0, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', NULL),
(10, 0, 7, 'http://localhost/teddy/tuyen-dung/', 'tuyen-dung', 0, 0, 1, '2018-05-21 15:25:08', 'administrator', '2018-05-21 15:25:08', 'administrator', ''),
(11, 0, 10, 'http://localhost/teddy/tuyen-dung/', 'tuyen-dung', 0, 0, 0, '2018-05-21 17:53:00', 'administrator', '2018-05-21 17:53:00', 'administrator', ''),
(17, 0, 0, 'http://localhost/teddy/bai-viet/tin-tuc-1', 'bai-viet', 0, 0, 0, '2018-05-21 17:47:53', 'administrator', '2018-05-21 17:47:53', 'administrator', 'tin-tuc-1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu_lang`
--

CREATE TABLE `menu_lang` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu_lang`
--

INSERT INTO `menu_lang` (`id`, `menu_id`, `title`, `language`) VALUES
(1, 1, '   Giới thiệu', 'vi'),
(2, 1, 'About   ', 'en'),
(7, 4, 'Trang chủ', 'vi'),
(8, 4, 'Home', 'en'),
(9, 5, '      Bài viết', 'vi'),
(10, 5, 'Blog      ', 'en'),
(11, 6, '  Tin tức', 'vi'),
(12, 6, 'News  ', 'en'),
(13, 7, '         Tuyển dụng', 'vi'),
(14, 7, 'Recruitment         ', 'en'),
(15, 8, '   Thực đơn ', 'vi'),
(16, 8, 'Menu        ', 'en'),
(17, 9, 'Liên hệ', 'vi'),
(18, 9, 'Contact', 'en'),
(19, 10, ' COn con', 'vi'),
(20, 10, 'COn con ', 'en'),
(21, 11, '                              conconcon', 'vi'),
(22, 11, 'conconcon                              ', 'en'),
(33, 17, ' baibai', 'vi'),
(34, 17, 'baibai ', 'en');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `is_activated` tinyint(4) DEFAULT '0' COMMENT '0 : active; 1 : deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `post_category_id`, `slug`, `avatar`, `image`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`, `is_activated`) VALUES
(4, 10, 've-chung-toi', '', '124d8a86ffc95cfc5a56ae7cf2a7d6c6.jpg', '2018-05-14 04:38:54', 'administrator', '2018-05-14 04:38:54', 'administrator', 0, 0),
(5, 12, 'tin-tuc-1', '', '62bc21b49644e7052f12f8487b01a1cf.jpg', '2018-05-14 04:42:40', 'administrator', '2018-05-14 04:42:40', 'administrator', 0, 0),
(6, 13, '1', '', '7f73dc1276a26d41ee7a602f23fe41af.jpg', '2018-05-14 09:22:10', 'administrator', '2018-05-14 09:22:10', 'administrator', 0, 0),
(8, 13, 'aaaaaaaaa', '', '', '2018-05-19 15:59:23', 'administrator', '2018-05-19 15:59:23', 'administrator', 0, 0),
(9, 13, 'bbbbbbbbbbbbbbbbbb', '', '', '2018-05-19 16:02:34', 'administrator', '2018-05-19 16:02:34', 'administrator', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_category`
--

CREATE TABLE `post_category` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `project` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `sort` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT '0' COMMENT '0 : list; 1 : detail',
  `is_activated` tinyint(4) DEFAULT '0' COMMENT '0 : active; 1 : deactive',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_category`
--

INSERT INTO `post_category` (`id`, `slug`, `parent_id`, `project`, `image`, `sort`, `type`, `is_activated`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(10, 'gioi-thieu', 0, '', NULL, NULL, 1, 0, 0, '2018-05-14 04:33:33', 'administrator', '2018-05-14 04:33:33', 'administrator'),
(11, 'bai-viet', 0, '', NULL, NULL, 0, 0, 0, '2018-05-14 04:34:23', 'administrator', '2018-05-14 04:34:23', 'administrator'),
(12, 'tin-tuc-1', 11, '', NULL, NULL, 0, 0, 0, '2018-05-14 09:06:59', 'administrator', '2018-05-14 09:06:59', 'administrator'),
(13, 'tuyen-dung', 11, '', NULL, NULL, 0, 0, 0, '2018-05-14 04:42:00', 'administrator', '2018-05-14 04:42:00', 'administrator'),
(14, 'con-tuyen-dung', 13, '', NULL, NULL, 0, 0, 0, '2018-05-21 16:04:28', 'administrator', '2018-05-21 16:04:28', 'administrator');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_category_lang`
--

CREATE TABLE `post_category_lang` (
  `id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_category_lang`
--

INSERT INTO `post_category_lang` (`id`, `post_category_id`, `title`, `language`) VALUES
(19, 10, 'Giới thiệu', 'vi'),
(20, 10, 'About', 'en'),
(21, 11, 'Bài viết', 'vi'),
(22, 11, 'BLog', 'en'),
(23, 12, '  Tin tức 1', 'vi'),
(24, 12, 'News  ', 'en'),
(25, 13, 'Tuyển dụng', 'vi'),
(26, 13, 'Recruitment', 'en'),
(27, 14, 'COn tuyen dung', 'vi'),
(28, 14, 'COn tuyen dung', 'en');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_lang`
--

CREATE TABLE `post_lang` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_lang`
--

INSERT INTO `post_lang` (`id`, `post_id`, `title`, `description`, `content`, `language`) VALUES
(7, 4, 'Về chúng tôi', 'Về chúng tôi', '<p>Về ch&uacute;ng t&ocirc;i</p>', 'vi'),
(8, 4, 'About Us', 'About Us', '<p>About Us</p>', 'en'),
(9, 5, 'Tin tức 1', 'Tin tức 1', '<p>Tin tức 1</p>', 'vi'),
(10, 5, 'News 1', 'News 1', '<p>News 1</p>', 'en'),
(11, 6, '1', '', '', 'vi'),
(12, 6, '1', '', '', 'en'),
(13, 8, 'aaaaaaaaa', 'asdadasd', '<p>sdsfsdfsdf</p>', 'vi'),
(14, 8, 'aaaaaaaaa', 'aaaaaaaaa', '<p>aaaaaaaaa</p>', 'en'),
(15, 9, 'bbbbbbbbbbbbbbbbbb', 'bbbbbbbbbbbbbbbbbb', '<p>bbbbbbbbbbbbbbbbbb</p>', 'vi'),
(16, 9, 'bbbbbbbbbbbbbbbbbb', 'bbbbbbbbbbbbbbbbbb', '<p>bbbbbbbbbbbbbbbbbb</p>', 'en');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `is_activated` tinyint(4) DEFAULT '0' COMMENT '0: active; 1:deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `product_category_id`, `slug`, `avatar`, `image`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`, `is_activated`) VALUES
(20, 15, '1', '', '[\"697a80227c61aad750549cb18b510244.jpeg\"]', '2018-05-10 16:51:51', 'administrator', '2018-05-10 16:51:51', 'administrator', 0, 0),
(21, 15, 'adad', '', '[\"d753d83ffe6e675ee0a0e4a25c92b859.jpg\",\"e99c2227f588fec6ab0ca900ec01da9d.jpeg\"]', '2018-05-12 15:35:15', 'administrator', '2018-05-12 15:35:15', 'administrator', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `sort` tinyint(4) DEFAULT NULL,
  `is_activated` tinyint(4) DEFAULT '0' COMMENT '0: active; 1: deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_category`
--

INSERT INTO `product_category` (`id`, `slug`, `parent_id`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`, `project`, `image`, `sort`, `is_activated`) VALUES
(15, '1', 0, 0, '2018-05-10 16:51:20', 'administrator', '2018-05-10 16:51:20', 'administrator', '', '989609a5ee192e8020e47bd5c2e46442.jpg', NULL, 0),
(16, '2', 15, 0, '2018-05-14 10:47:45', 'administrator', '2018-05-14 10:47:45', 'administrator', '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category_lang`
--

CREATE TABLE `product_category_lang` (
  `id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_category_lang`
--

INSERT INTO `product_category_lang` (`id`, `product_category_id`, `title`, `language`) VALUES
(73, 15, '1', 'vi'),
(74, 15, '1', 'en'),
(75, 16, '2', 'vi'),
(76, 16, '2', 'en');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_lang`
--

CREATE TABLE `product_lang` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_lang`
--

INSERT INTO `product_lang` (`id`, `product_id`, `title`, `description`, `content`, `language`) VALUES
(37, 20, '1', '1', '<p>1</p>', 'vi'),
(38, 20, '1', '1', '<p>1</p>', 'en'),
(39, 21, 'ádad', 'ádasda', '<p>&aacute;dasda</p>', 'vi'),
(40, 21, 'ádasd', 'ádasd', '<p>&aacute;dasd</p>', 'en');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, '21DhVnjDpuZo3Bimi0gCBO', 1268889823, 1526868806, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu_lang`
--
ALTER TABLE `menu_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_category_id` (`post_category_id`);

--
-- Chỉ mục cho bảng `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post_category_lang`
--
ALTER TABLE `post_category_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_category_id` (`post_category_id`);

--
-- Chỉ mục cho bảng `post_lang`
--
ALTER TABLE `post_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_category_id` (`product_category_id`);

--
-- Chỉ mục cho bảng `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_category_lang`
--
ALTER TABLE `product_category_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_category_id` (`product_category_id`);

--
-- Chỉ mục cho bảng `product_lang`
--
ALTER TABLE `product_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `menu_lang`
--
ALTER TABLE `menu_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `post_category_lang`
--
ALTER TABLE `post_category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `post_lang`
--
ALTER TABLE `post_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `product_category_lang`
--
ALTER TABLE `product_category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `product_lang`
--
ALTER TABLE `product_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `menu_lang`
--
ALTER TABLE `menu_lang`
  ADD CONSTRAINT `menu_lang_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`post_category_id`) REFERENCES `post_category` (`id`);

--
-- Các ràng buộc cho bảng `post_category_lang`
--
ALTER TABLE `post_category_lang`
  ADD CONSTRAINT `post_category_lang_ibfk_1` FOREIGN KEY (`post_category_id`) REFERENCES `post_category` (`id`);

--
-- Các ràng buộc cho bảng `post_lang`
--
ALTER TABLE `post_lang`
  ADD CONSTRAINT `post_lang_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`id`);

--
-- Các ràng buộc cho bảng `product_category_lang`
--
ALTER TABLE `product_category_lang`
  ADD CONSTRAINT `product_category_lang_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`id`);

--
-- Các ràng buộc cho bảng `product_lang`
--
ALTER TABLE `product_lang`
  ADD CONSTRAINT `product_lang_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
