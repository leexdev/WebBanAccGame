SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btshxuct_testweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `cash` int(11) DEFAULT 0,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `diamon_ff` int(11) NOT NULL DEFAULT 0,
  `fb` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `time_block` int(11) DEFAULT NULL,
  `days_block` int(11) DEFAULT NULL,
  `block` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `name`, `password`, `cash`, `email`, `phone`, `diamon_ff`, `fb`, `time`, `datetime`, `time_block`, `days_block`, `block`, `note`) VALUES
(1, 'admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 0, '', '', 0, 0, 0, '2022-07-21 13:23:07', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `acc_random`
--

CREATE TABLE `acc_random` (
  `id` int(11) NOT NULL,
  `iduser` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `type` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `acc_random`
--

INSERT INTO `acc_random` (`id`, `iduser`, `id_name`, `username`, `password`, `price`, `status`, `type`, `time`, `date`) VALUES
(10, '', '', 'cungnangly27@gmail.com', 'oaihungdo1883\r\n', 0, 0, '7', NULL, NULL),
(4, '', '', 'greenmile62@gmail.com', 'yeumilamnme2', 0, 0, '6', NULL, NULL),
(5, '', '', 'hhuy072006@gmail.com', 'nhathuy123', 0, 0, '6', NULL, NULL),
(6, '', '', 'hoaphung90@gmail.com', 'gianghai90', 0, 0, '6', NULL, NULL),
(7, 'chubedo', 'đỗ nhật', 'ngocsy365@gmail.com', '20554910905011991hongocsy', 20000, 1, '6', '2022-05-22 13:47:00', '2022-05-22'),
(8, 'chubedo', 'đỗ nhật', 'ntn0968431112@gmail.com', '0968431112duy', 20000, 1, '6', '2022-05-23 22:11:16', '2022-05-23'),
(9, '', '', 'ProboyG@gmail.com', 'Pro12345', 0, 0, '6', NULL, NULL),
(25, '', '', 'nhunglucppnbay2y@gmail.com', 'tronkiepnay7183\r\n', 0, 0, '8', NULL, NULL),
(12, '', '', 'nhunglucppnbay2y@gmail.com', 'tronkiepnay7183\r\n', 0, 0, '7', NULL, NULL),
(23, '', '', 'cungnangly27@gmail.com', 'oaihungdo1883\r\n', 0, 0, '8', NULL, NULL),
(14, '', '', 'tinhnghianhat28@gmail.com', 'phaimau9218\r\n', 0, 0, '7', NULL, NULL),
(16, '', '', 'cuoctinhhay727@gmail.com', 'honaimanow883\r\n', 0, 0, '7', NULL, NULL),
(18, '', '', 'aimataiconr938@gmail.com', 'tinham38384\r\n', 0, 0, '7', NULL, NULL),
(20, '', '', 'dutranmaj2u87@gmail.com', 'anoanquarou2983\r\n', 0, 0, '7', NULL, NULL),
(22, '', '', 'naoaanhem2o8@gmail.com', 'nagngytlu7yw', 0, 0, '7', NULL, NULL),
(27, '', '', 'tinhnghianhat28@gmail.com', 'phaimau9218\r\n', 0, 0, '8', NULL, NULL),
(29, '', '', 'cuoctinhhay727@gmail.com', 'honaimanow883\r\n', 0, 0, '8', NULL, NULL),
(31, '', '', 'aimataiconr938@gmail.com', 'tinham38384\r\n', 0, 0, '8', NULL, NULL),
(33, '', '', 'dutranmaj2u87@gmail.com', 'anoanquarou2983\r\n', 0, 0, '8', NULL, NULL),
(35, '', '', 'naoaanhem2o8@gmail.com', 'nagngytlu7yw', 0, 0, '8', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `auto_card`
--

CREATE TABLE `auto_card` (
  `id` int(11) NOT NULL,
  `1` text NOT NULL,
  `2` text NOT NULL,
  `3` text NOT NULL,
  `4` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `auto_card`
--

INSERT INTO `auto_card` (`id`, `1`, `2`, `3`, `4`) VALUES
(1, 'on', 'on', 'on', ''),
(2, 'on', 'on', 'on', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ck_card`
--

CREATE TABLE `ck_card` (
  `id` int(11) NOT NULL,
  `1` int(11) NOT NULL,
  `2` int(11) NOT NULL,
  `3` int(11) NOT NULL,
  `4` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `ck_card`
--

INSERT INTO `ck_card` (`id`, `1`, `2`, `3`, `4`) VALUES
(1, 100, 100, 110, 100),
(2, 300, 300, 300, 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_buy`
--

CREATE TABLE `history_buy` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `id_products` int(11) NOT NULL,
  `id_random` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `time` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `history_buy`
--

INSERT INTO `history_buy` (`id`, `username`, `name`, `id_products`, `id_random`, `price`, `type`, `time`, `date`) VALUES
(3, 'chubedo', 'đỗ nhật', 0, 7, 20000, 1, 1653202020, '2022-05-22'),
(4, 'chubedo', 'đỗ nhật', 0, 8, 20000, 1, 1653318676, '2022-05-23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_card`
--

CREATE TABLE `history_card` (
  `id` int(11) NOT NULL,
  `trans_id` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type_card` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `seri` text COLLATE utf8_unicode_ci NOT NULL,
  `pin` text COLLATE utf8_unicode_ci NOT NULL,
  `count_card` int(11) NOT NULL,
  `cash_nhan` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `notice` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` datetime NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_dff`
--

CREATE TABLE `history_dff` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_ingame` text NOT NULL,
  `soluong` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_wheel`
--

CREATE TABLE `history_wheel` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `nohu` int(11) NOT NULL DEFAULT 0,
  `prize` text COLLATE utf8_unicode_ci NOT NULL,
  `id_wheel` int(11) NOT NULL DEFAULT 0,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `hide` int(11) NOT NULL DEFAULT 0,
  `date` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lq_champion`
--

CREATE TABLE `lq_champion` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `vip` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `img_name` text COLLATE utf8_unicode_ci NOT NULL,
  `add_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lq_champion`
--

INSERT INTO `lq_champion` (`id`, `name`, `vip`, `img_name`, `add_time`) VALUES
(2, 'Vahein', 'no', '8625308f1624185a1ecc5e041e929d49583feed3a78cf.png', 1515853288),
(3, 'Thane', 'no', '7db02b3b8412f2ca1b1aa94c0235b2db58a1809854c76.jpg', 1515853297),
(6, 'Veera', 'no', '59dd4047e244607d78f76fb22e7ffced583ff0f89860d.png', 1515855142),
(7, 'Lữ Bố', 'yes', '21436d414c086275c3c956dcd97cc200583ff139b8f73.png', 1515855158),
(8, 'Mina', 'no', '63671026c0e03766c31176d07b56c364583ff15c728d2.png', 1515855174),
(9, 'Krixi', 'no', '3fa6fb1c1695570e79df259229e7a6c9583ff18becc9f.png', 1515855189),
(10, 'Mganga', 'no', 'b10fa7d489fc711e580999728c26c2e9583ff2252da26.png', 1515855201),
(11, 'Triệu Vân', 'no', 'a4f18d5371cdfde200170538794fc49e583ff24b4fd7a.png', 1515855213),
(12, 'Omega', 'no', 'ae349d2c12bb6b34a31311ee4e230970583ff272c5c61.png', 1515855271),
(13, 'Kahlii', 'no', '2.png', 1515858548),
(14, 'Zephys', 'no', '3.png', 1515858557),
(15, 'Điêu Thuyền', 'no', '4.png', 1515858567),
(16, 'Chaugnar', 'no', '5.png', 1515858576),
(17, 'Violet', 'no', '6.png', 1515858586),
(18, 'Butterfly', 'no', '7.png', 1515858596),
(19, 'Ormarr', 'no', '8.png', 1515858605),
(20, 'Azzen\'Ka', 'no', '9.png', 1515858615),
(21, 'Alice', 'no', '10.png', 1515858633),
(22, 'Gildur', 'no', '11.png', 1515858660),
(23, 'Yorn', 'no', '12.png', 1515858669),
(24, 'Toro', 'no', '13.png', 1515858678),
(25, 'Taara', 'no', '14.png', 1515858692),
(26, 'Nakroth', 'no', '15.jpg', 1515858710),
(27, 'Grakk', 'no', '16.png', 1515858719),
(28, 'Aleister', 'no', '17.png', 1515858728),
(29, 'Fennik', 'no', '18.jpg', 1515858737),
(30, 'Lumburr', 'no', '19.jpg', 1515858747),
(31, 'Natalya', 'no', '20.jpg', 1515858756),
(32, 'Cresht', 'no', 'bec21cbc276808ac22ccc228a1fabb8c5886bd5a1c3c8.jpg', 1515858766),
(33, 'Jinna', 'no', '21.jpg', 1515858776),
(34, 'Payna', 'no', '22.png', 1515858790),
(35, 'Maloch', 'no', '23.png', 1515858804),
(36, 'Ngộ Không', 'yes', '24.jpg', 1515858814),
(37, 'Kriknak', 'no', '25.png', 1515858826),
(38, 'Arthur', 'no', '26.jpg', 1515858839),
(39, 'Slimz', 'no', '27.jpg', 1515858852),
(40, 'Ilumia', 'no', '28.jpg', 1515858862),
(41, 'Preyta', 'no', '29.jpg', 1515858872),
(42, 'Skud', 'no', '30.jpg', 1515858880),
(43, 'Raz', 'no', '31.jpg', 1515858890),
(44, 'Lauriel', 'no', '32.jpg', 1515858899),
(45, 'Batman', 'yes', '33.jpg', 1515858910),
(46, 'Airi', 'no', '34.jpg', 1515858921),
(47, 'Zuka', 'no', '35.jpg', 1515858930),
(48, 'Ignis', 'no', '36.jpg', 1515858940),
(49, 'Murad', 'no', '37.jpg', 1515858949),
(50, 'Zill', 'no', '38.jpg', 1515858959),
(51, 'Arduin', 'no', '39.jpg', 1515858973),
(52, 'Joker', 'yes', '40.jpg', 1515858984),
(53, 'Ryoma', 'yes', '41.jpg', 1515858993),
(54, 'Astrid', 'no', '42.jpg', 1515859005),
(55, 'Tel\'Annas', 'no', '43.jpg', 1515859015),
(56, 'Superman', 'yes', '44.jpg', 1515859033),
(58, 'Xeniel', 'no', '46.jpg', 1515859062),
(59, 'Kil\'Groth', 'no', '47.gif', 1515859076),
(60, 'Moren', 'no', '48.jpg', 1515859091),
(61, 'TeeMee', 'no', '49.jpg', 1515859101),
(65, 'Tulen', 'no', '07210c9e529faa7766ba324bd86b75165a81722f3eab8.jpg', 1537428160),
(68, 'Rourke', 'yes', '749d47479eb9744d656b5e7c59f213555b1914bf90d29.jpg', 1537429243),
(69, 'Omen', 'no', '00a78d4f7222a428cd06b45252f88a565a73df2c56ad8.jpg', 1537429329),
(70, 'Max', 'no', '9b5e17b2059b1e710663e1ec542f254b5acdd5b022003.jpg', 1537429816),
(71, 'The Flash', 'yes', '65.jpg', 1539495771);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lq_skin`
--

CREATE TABLE `lq_skin` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `vip` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `img_name` text COLLATE utf8_unicode_ci NOT NULL,
  `add_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lq_skin`
--

INSERT INTO `lq_skin` (`id`, `name`, `vip`, `img_name`, `add_time`) VALUES
(1, 'Vahein Hoàng Tử Quạ', 'no', '09b5b170ec736ac88925a138e8ae1e7e583ff0391e63f.png', 1515855375),
(2, 'Vahein Đại Công Tước', 'yes', '0a45ad90483db97aca43d58f916f48335a20d7ddec759.jpg', 1515855396),
(3, 'Vahein Vũ Khí Tối Thượng', 'yes', '74c07022219dce077da6a570e4a79a8558770e408a379.jpg', 1515855411),
(4, 'BatMan Đôi Cánh Đại Dương', 'no', '7a9f7dce9c922c7ce20496e98c643333599aa6a73de06.jpg', 1515898752),
(5, 'Murad Thợ săn tiền thưởng', 'no', '836770165ef5132ef5a3a8e00decbf1a5983e6e014e80.jpg', 1515898814),
(6, 'Superman Chúa Tể Công Lý', 'no', '674b771ab988b9990cefd5ddebd375995a02b81954294.jpg', 1515898847),
(7, 'Ryoma Thợ Săn Tiền Thưởng', 'no', '393fbab80d0999d82b90b0137cc05f5059d9bf076868d.jpg', 1515898883),
(8, 'Thane Quang Vinh', 'no', '7db02b3b8412f2ca1b1aa94c0235b2db58a1809854c76.jpg', 1515904479),
(9, 'Veera Cô giáo Hắc ám', 'no', '872c3a024de2dacdb3cd4d76d0af6f525847d5fcccbf2.jpg', 1515904660),
(10, 'Veera Nàng Dơi Tuyết', 'no', '3aafdb1e5fd9d829244664f52a16d1b1589a8ee463823.jpg', 1515904708),
(12, 'Lữ Bố Long Kỵ Sĩ', 'yes', 'd1d534bd196982ccd15345d3c8a159c558f47835118b6.jpg', 1515904826),
(13, 'Lữ Bố Kỵ Sĩ Âm Phủ', 'yes', '9bcf4ea793622a27451a371bbc8de6125949ec3b9609e.jpg', 1515904859),
(14, 'Lữ Bố Đặc Nhiệm SWAT', 'yes', 'ec8a790aabb7620e51f852115199bfc559d1ad758bbc0.jpg', 1515904894),
(15, 'Lữ Bố Tiệc Bãi Biển', 'yes', '89edf66b7c36aa5659dd54f19c273c595a15037de22dc.jpg', 1515904920),
(16, 'Lữ Bố Nam Vương', 'yes', '0e3fa00396a90ee03c16db04bf3b80c85a4da7e225387.jpg', 1515904944),
(17, 'Mina Nữ Hoàng Kẹo Ngọt', 'no', '4d45a450e664e8c3dfb8aee1c67f7a225983e74939305.jpg', 1515904975),
(18, 'Mina Tiểu Thư Đoạt Hồn', 'no', '2010b7e41dd78615e8b3a2f35b09ff7f589a8bd7ac141.jpg', 1515905008),
(19, 'Krixi Công Chúa Bướm', 'no', 'ecbf4af52d7e8dea8fd35e7cca7cd1f6583ff206709f5.png', 1515905063),
(20, 'Krixi Xứ Sở Thần Tiên', 'yes', 'eeee1e5428969d0bdc7649dd95bcf39859225ea21af4f.jpg', 1515905092),
(21, 'Krixi Tiệc Bãi Biển', 'yes', 'bf70da385602cfc9d019fa1f7651a4fb5a0a94c564d27.jpg', 1515905136),
(22, 'Mganga Hề Cung Đình', 'no', 'd042bfff5dcbe4a23bb6f71e89e8c537589a931a4d4df.jpg', 1515905174),
(23, 'Mganga Tiệc Bánh Kẹo', 'no', '21fa954fe61c4fd13766848f8dcb8acd597b5f695e84b.jpg', 1515905202),
(24, 'Veera Y Tá Bạo Loạn', 'no', '7c13a1c0b946ce53c46d47a8010c1320599fa67ce6734.jpg', 1515905494),
(25, 'Triệu Vân Quang Vinh', 'no', 'd7342b00ec05faf09f815c74ce8306eb59d1ad95b5505.jpg', 1515921442),
(26, 'Triệu Vân Dũng sĩ đồ long', 'yes', '0c3845aa6836b92ca1e3ac2c793526205a1544dcd070b.jpg', 1515921463),
(29, 'Omega Người máy xanh', 'no', '29a399dc6ea27378a232dd4b34bf7f6858b92058572ad.png', 1515921526),
(30, 'Kahlii Cô dâu hắc ám', 'no', '5e81871f14d071c0f9bf01cd7ac0ef0058a170124a390.png', 1515921573),
(31, 'Zephys Hiệp Sĩ Bí Ngô', 'yes', '84de1c274b7b4d1f6c73341e7ce9f26759f83096648b7.jpg', 1515921628),
(32, 'Zephys Oán Linh', 'no', 'd77019c238b7f93c7ed0c3f37db9bdb158a17150bcb6d.jpg', 1515921637),
(33, 'Điêu Thuyền Nữ Vương Anh Đào', 'no', 'c6bdc7259484c5a75a04019b81b798945847d6daaad2f.jpg', 1515921670),
(34, 'Điêu Thuyền Hoa Hậu', 'yes', 'cb125521bf055b3d0117689a652ef4d85a4da80cc1a9c.jpg', 1515921684),
(35, 'Chaugnar Ác Mông Sinh Hóa', 'no', '25fb7638a4b2cd9306e99cc1fc67e8f658cf626892af5.jpg', 1515921725),
(36, 'Violet Nữ đặc cảnh', 'no', 'ea8e80b2aceeb0045f6ba21c7f139fc858462ef3570d3.png', 1515921755),
(37, 'Violet Nữ Hoàng Pháo Hoa', 'yes', 'd8b09710ebceb2d01dd1f79a79ae0a92590c02a0362fd.jpg', 1515921772),
(38, 'Violet Mèo Siêu Quậy', 'yes', '1e1035bc47f3d80054dd554d5dc9b2735a1be3e1c862e.jpg', 1515921790),
(39, 'Butterfly Thủy Thủ', 'no', 'ac8137f34f98d5fa6989b05e8b91ce6a583ff89eeb0f9.png', 1515921829),
(40, 'Butterfly Teen nữ công nghệ', 'no', 'f8f91308600416c688cb8c8f5c5ca814593248e7abb42.jpg', 1515921861),
(41, 'Butterfly Xuân nữ ngổ ngáo', 'yes', 'cbfdca52f37f668169031f9b72d90444589a8b76a140e.jpg', 1515921894),
(42, 'Butterfly Nữ Quái Nổi Loạn', 'yes', '2d9ca037a21225003e44e2e40879c034598d7ed026687.jpg', 1515921910),
(43, 'Ormarr Thông thỏa thích', 'yes', '71965e9f57f08c167ac32a4dc50181a65a30e5f77611a.jpg', 1515921954),
(44, 'Ormarr cựu chiến binh', 'no', '4168fdfc6e4bcf4f0392a89fefb66d12583ff8b891d97.png', 1515921966),
(45, 'Azzen\'Ka Linh hồn lữ khách', 'no', '0ffd9626a663ebad9045e6cdcfdee438597b602420d5b.jpg', 1515921994),
(46, 'Alice Nhà chiêm tinh', 'no', '4994ed2f082a8bc5a271789f5629e0e058462f5b49ff3.png', 1515922142),
(47, 'Gildur Phượt Thủ', 'no', '5bd246adef798cea7e93b0dd0643ea175910307d6456b.jpg', 1515922162),
(48, 'Gildur Tiệc Bãi Biển', 'yes', '6ace6488468bc629f27d748ce2cde2ab5a027b76c3bd1.jpg', 1515922185),
(49, 'Yorn Cung thủ bóng đêm', 'no', 'eb9a70763e08ff3f12365a7f40d803ad583ffac536794.png', 1515922240),
(50, 'Yorn Đặc Nhiệm SWAT', 'yes', '60315c4d2109aef556ad2b3f425c977859c622a9c93d2.jpg', 1515922257),
(51, 'Yorn Thế tử nguyệt tộc', 'yes', '31c9c51abdc9e81332054eba6cf207745a5837bd0932c.jpg', 1515922272),
(52, 'Toro Đặc cảnh NYPD', 'no', 'af54d8a843bef7631fc44b7e13b62eb6583ffb2427a06.png', 1515922308),
(53, 'Taara Đại Tù Trưởng', 'no', '454657ba0b11387f88d0b58132180d3358bd14757b83a.jpg', 1515922331),
(54, 'Nakroth Chiến binh hỏa ngục', 'no', '3c6d838b3f3cce60daa0b9b00226efd55a276e9f22fc1.jpg', 1515922364),
(55, 'Nakroth Quân đoàn địa ngục', 'no', 'e5835a60db6ebe9a238e4782808b7024584a46fd13c3d.jpg', 1515922380),
(56, 'Nakroth Bboy công nghệ', 'no', '9ca27ec280c4befd2e299ff144b0058459b29278de58d.jpg', 1515922401),
(57, 'Grakk chàng gấu tuyết', 'no', '806bbbb3afea652e74bf851bc909d079589a8f4b1d113.jpg', 1515922430),
(58, 'Grakk Khô lâu đại tướng', 'no', '53e81c3e4cde13d6ff480b0ae98789cf598a8866b8f60.jpg', 1515922466),
(59, 'Aleister Thiếu Niên Hắc Ám', 'yes', 'fce1d984d1d72596a44ce17027b7976b59d1ad0da7848.jpg', 1515922500),
(60, 'Fennik Tuần lộc láu lỉnh', 'yes', '36f61762ca45def9be5ebacb6982ffea5a31070d6cf24.jpg', 1515923899),
(61, 'Fennik Tiệc bánh kẹo', 'yes', 'de82761cc17f0a5d724c5707b50655135a06943d46ec4.jpg', 1515923949),
(62, 'Fennik Nhà Thám Hiểm', 'yes', '25175f5edb65931ec15fca3b631850735860e4bd97ebd.jpg', 1515923963),
(63, 'Lumburr dung nham', 'no', 'b10699500629002b70b13a47687f503f587858f7c97be.jpg', 1515923986),
(64, 'Natalya Quà quái quỷ', 'no', 'f1247464ad506c3fef7c6240a4303a355a31049546157.jpg', 1515924028),
(65, 'Natalya Quý cô thủy tề', 'no', '0778faf4426f76588f813ab7b7737a2159351e6327360.jpg', 1515924039),
(66, 'Natalya Nghệ Nhân Lân', 'no', 'b3e06b2967ffd043882f883cb19bfc2058e1ba5cce51b.jpg', 1515924054),
(67, 'Cresht Thợ sửa đứt cáp', 'no', '1e69b5b59bf63865b011ec3fe292870e589978710997f.jpg', 1515924072),
(68, 'Jinna Đại tư tế', 'no', '017c5c5b76b2ce2c8bcd0c2a7941ef41591a7a4edaab6.jpg', 1515924105),
(69, 'Payna Cảnh vệ rừng', 'no', '107515ee327ec4e57be28abfd5b4ef8d590c0367c6227.jpg', 1515924127),
(70, 'Maloch Samurai tử sĩ', 'yes', '0c808c311e0aeedfc4e39e25a53de72259f830b4a3783.jpg', 1515924170),
(71, 'Maloch Ác ma địa ngục', 'no', 'f1cb5b3e3c0003c231afdbba9d31b00e595f5f72f32d7.jpg', 1515924184),
(72, 'Maloch Tiệc Hóa Trang', 'no', '5f9961c48b8e706d66c6f2b0db56881458cb97a14ebd9.jpg', 1515924201),
(73, 'Ngộ Không Đạo Tặc', 'no', '9750f204bf00281fe2e51ca142768cce59b293b79faeb.jpg', 1515924217),
(74, 'Kriknak bọ cánh bạc', 'no', '4d0710b07e77ecb6eec89769f76be9a058e7140a02122.png', 1515924248),
(75, 'Arthur Hoàng Kim Cốt', 'no', '83494858109b6461b5ca1e7c020f0a6c59b291d4589a7.jpg', 1515924289),
(76, 'Arthur Lãnh chúa xương', 'yes', '5ef7c0a31ffd7d33b5d796204e1db83059df131e7f053.jpg', 1515924303),
(77, 'Slimz Thỏ thợ mỏ', 'no', '965f014f79fd278f7a4c40fc3f089b3e58f97f7641f80.jpg', 1515924331),
(78, 'Slimz chú thỏ ngọc', 'no', '208bd1fd4cb7c51a982e1325d50406265a027b9ab25cc.jpg', 1515924345),
(79, 'Ilumia Nữ chúa tuyết', 'no', 'd7851de6d120997cc96c8d00325b28ce5902bf7e2d0b2.jpg', 1515924370),
(80, 'Ilumia Hồng hoa hậu', 'no', '8598bde77c508d55b2f4b769f9a2e6215a0694150191a.jpg', 1515924382),
(81, 'Preyta Không Tặc', 'no', '53d33d16407ad9990d8306b10f618bf8590bf53bdd701.jpg', 1515924731),
(82, 'Skud Sơn Tặc', 'no', '51de75e4c9fe36ba49bdd1d49bed3453591533c1c5b67.jpg', 1515924761),
(83, 'Raz đại tù trưởng', 'no', '030f0f59184dc9591ab3a5a29c88d27e591e6a2fe3ac7.jpg', 1515924853),
(84, 'Lauriel Đọa lạc thiên sứ', 'no', '6219e053befd53c837031f749e12bbdb59439b0d5d764.jpg', 1515924881),
(85, 'Lauriel Hỏa phượng hoàng', 'no', '8ba2de85e1704808e11ae0fec1b80ac75a531d237e852.jpg', 1515924898),
(86, 'Lauriel Phù thủy bí ngô', 'no', '4ce799b7f6cefbc36e1fd54741a9778a59f830732345e.jpg', 1515924917),
(87, 'Airi Thích Khách', 'no', 'ab3664fa2804c2fb0d3788615369507b59f04b5275536.jpg', 1515924962),
(88, 'Airi Ninja xanh lá', 'no', 'ed61d00fb8c65dc7784322d012b2f3f25965e9f49b412.jpg', 1515924975),
(89, 'Zuka Đại Phú Ông', 'no', '8a8bf57271482598002478914874fc65596c774871d32.jpg', 1515925017),
(90, 'Zuka Giáo Sư Sừng Sỏ', 'no', '2225114632e2b46f7cf7b9fe6386f7db5a55d226bbefa.jpg', 1515925031),
(91, 'Ignis Hỏa thuật sư', 'no', '813d13b400642dcc6d907693007539eb5970de81101b3.jpg', 1515925062),
(92, 'Zill Lốc Địa Ngục', 'no', '8006a0f36b59be7ef020ee1d43ccf94a59966eec3e9b8.jpg', 1515925098),
(93, 'Arduin Cận vệ hoàng gia', 'no', 'cae93a1b59ff9cf28c81a1c420b00a5559bb7ef7c91e8.jpg', 1515925123),
(94, 'Joker trò đùa tử vong', 'no', '7875ea4bbc4de3a54e3308a3364dc22159d1ac32a0429.jpg', 1515925146),
(95, 'Astrid bạch kiếm tiểu thư', 'no', 'e9ba2dd34a3052af56b8d833c7152b1359e0234e1fc61.jpg', 1515925183),
(96, 'Tel\'Annas cảnh vệ rừng', 'no', '8707e09b758532f8e7f78230743337be59e9660d26297.jpg', 1515925274),
(97, 'Xeniel thiên sứ hủy diệt', 'no', '9c5d076425687051a3eb523ebb1aefb05a17a09d469b3.jpg', 1515925308),
(98, 'Kil\'Groth cảnh vệ biển', 'no', '72a9d5d7335fbb427d067ccbcedb31005a29fc99330d8.gif', 1515925329),
(99, 'Moren chú thợ điện', 'no', 'f288c74b4d9178892f61d21abc1b4c7a5a3a36d22409a.jpg', 1515925349),
(100, 'TeeMee Xiếc Cung Đình', 'no', 'e69c320e8c1202ad886d17ecc04b1b485a4df9c83816c.jpg', 1515925375),
(105, 'Chaugnar Quang Vinh', 'no', '2d377cfea4bfbf93a2269d1ac8cee1915ab9fa12cbf1a.jpg', 1537427690),
(106, 'TULEN NHÀ THÁM HIỂM', 'yes', '9891d55e2156b484cf5d49b5cbf70d925a81729f72ced.jpg', 1537428598),
(108, 'Aleister Quang Vinh', 'no', 'dde4315d3872f16c23df92117c9d5cca5aa0e736b237b.jpg', 1537428764),
(109, 'Điêu Thuyền Tiệc Bãi Biển', 'yes', '08aa6db0addad6487aba42a9aefa662e5b3d8aa68a14e.jpg', 1537430644),
(110, 'Taara Hoả Ngọc Nữ Để', 'yes', '57bd995d4de5a2b87a5162a74f750c685aa8f5025b23c.jpg', 1537431521),
(111, 'Omen sĩ quan viễn chinh', 'yes', '00a78d4f7222a428cd06b45252f88a565a73df2c56ad8.jpg', 1537432043),
(113, 'Murad M-TP Thần Tượng Học Đường', 'yes', '5e775f1787d59bc3ee6adc4316c05ecf5a698f792b392.jpg', 1537432413),
(114, 'Violet Phi Công Trẻ', 'yes', 'c4f043968a2d8ca50c6815e75d172c715a66f08a3e408.jpg', 1537432481);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `gem_count` int(11) NOT NULL,
  `skins_count` int(11) NOT NULL,
  `skins` longtext COLLATE utf8_unicode_ci NOT NULL,
  `champs_count` int(11) NOT NULL,
  `champs` longtext COLLATE utf8_unicode_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type_post` int(11) NOT NULL,
  `type_account` text COLLATE utf8_unicode_ci NOT NULL,
  `date_posted` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `sdt` text COLLATE utf8_unicode_ci NOT NULL,
  `cmnd` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `username`, `password`, `price`, `gem_count`, `skins_count`, `skins`, `champs_count`, `champs`, `rank`, `note`, `type_post`, `type_account`, `date_posted`, `status`, `sdt`, `cmnd`, `email`) VALUES
(1, '545', '45435', 454354, 5435, 543, '', 4354, '', 16, 'hihi', 0, 'Free Fire', '2022-05-17 09:08:48', 1, '', '', ''),
(2, 'chubedo', '234234', 234234, 4234, 23423, '', 234, '', 19, 'hihi', 0, 'Liên Quân Mobile', '2022-05-17 09:14:39', 0, '', '', ''),
(5, '100079677394939', '916728fadb', 50000, 3, 100, '', 50, '', 6, 'Đăng nhập bằng Fb,Nên đăng nhập bằng 4g để tránh checkpoint!Bảo hành 100%', 0, 'Free Fire', '2022-05-20 21:45:05', 0, '', '', ''),
(8, 'ádasd', 'ádasd', 10000000, 0, 0, '', 0, '', 0, '', 0, 'Free Fire', '2022-05-23 18:45:11', 0, '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `descr` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `video_home` text COLLATE utf8_unicode_ci NOT NULL,
  `fanpage` text COLLATE utf8_unicode_ci NOT NULL,
  `fb_admin` text COLLATE utf8_unicode_ci NOT NULL,
  `name_admin` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_admin` text COLLATE utf8_unicode_ci NOT NULL,
  `email_admin` text COLLATE utf8_unicode_ci NOT NULL,
  `notify` longtext COLLATE utf8_unicode_ci NOT NULL,
  `domain` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `status_random` int(11) NOT NULL,
  `rd_1` int(11) NOT NULL,
  `rd_2` int(11) NOT NULL,
  `rd_3` int(11) NOT NULL,
  `rd_4` int(11) NOT NULL,
  `rd_5` int(11) NOT NULL DEFAULT 0,
  `rd_6` int(11) NOT NULL DEFAULT 0,
  `rd_7` int(11) NOT NULL DEFAULT 0,
  `rd_8` int(11) NOT NULL DEFAULT 0,
  `rd_9` int(11) NOT NULL DEFAULT 0,
  `rd_10` int(11) NOT NULL DEFAULT 0,
  `rd_11` int(11) NOT NULL DEFAULT 0,
  `rd_12` int(11) NOT NULL DEFAULT 0,
  `rd_13` int(11) NOT NULL DEFAULT 0,
  `rd_14` int(11) NOT NULL DEFAULT 0,
  `rd_15` int(11) NOT NULL DEFAULT 0,
  `banner` text COLLATE utf8_unicode_ci NOT NULL,
  `id` text COLLATE utf8_unicode_ci NOT NULL,
  `parner` text COLLATE utf8_unicode_ci NOT NULL,
  `apinhanthecao` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`title`, `descr`, `keywords`, `video_home`, `fanpage`, `fb_admin`, `name_admin`, `phone_admin`, `email_admin`, `notify`, `domain`, `status`, `status_random`, `rd_1`, `rd_2`, `rd_3`, `rd_4`, `rd_5`, `rd_6`, `rd_7`, `rd_8`, `rd_9`, `rd_10`, `rd_11`, `rd_12`, `rd_13`, `rd_14`, `rd_15`, `banner`, `id`, `parner`, `apinhanthecao`) VALUES
('Shop Acc Free Fire Uy Tín Số 1 VN', 'Bán nick lfree fire shop thử vận may random free fire ,vòng quay kc 100% trúng 3k kim cương,tỉ lệ nạp x3', 'mua nick free fire, nick free fire gia re, nick free fire re, acc free fire, thu may free fire, thu may free fire, nick free fire, nick free fire 15k, thu may, thu may free fire 9k, thu may free fire', 'https://shopdat09.com/baner1111.gif', 'https://www.facebook.com/cskhtruongcyberff', 'https://www.facebook.com/cskhtruongcyberff', 'Trường Cyber', '09052335xxx', '', 'WEBSITE ĐƯỢC TẠO BỞI DỊCH VỤ TUANORI.VN', '', 1, 1, 0, 0, 0, 0, 0, 20000, 50000, 100000, 200000, 0, 0, 0, 0, 0, 0, 'https://shopdat09.com/baner1111.gif', '', '', 'API LẤY BÊN NHANTHECAO.VN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting_wheel`
--

CREATE TABLE `setting_wheel` (
  `1` int(11) NOT NULL DEFAULT 0,
  `2` int(11) NOT NULL DEFAULT 0,
  `3` int(11) NOT NULL DEFAULT 0,
  `4` int(11) NOT NULL DEFAULT 0,
  `5` int(11) NOT NULL DEFAULT 0,
  `6` int(11) NOT NULL DEFAULT 0,
  `7` int(11) NOT NULL DEFAULT 0,
  `8` int(11) NOT NULL DEFAULT 0,
  `huvang` int(11) NOT NULL DEFAULT 0,
  `wheel_price` int(11) NOT NULL DEFAULT 0,
  `id_nohu` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `setting_wheel`
--

INSERT INTO `setting_wheel` (`1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `huvang`, `wheel_price`, `id_nohu`, `status`) VALUES
(0, 0, 100, 0, 0, 0, 0, 0, 2230000, 20000, 'chubedo', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `top_recharge`
--

CREATE TABLE `top_recharge` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `cash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wheel`
--

CREATE TABLE `wheel` (
  `id` int(11) NOT NULL,
  `iduser` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `acc_random`
--
ALTER TABLE `acc_random`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_buy`
--
ALTER TABLE `history_buy`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_card`
--
ALTER TABLE `history_card`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_dff`
--
ALTER TABLE `history_dff`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_wheel`
--
ALTER TABLE `history_wheel`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lq_champion`
--
ALTER TABLE `lq_champion`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lq_skin`
--
ALTER TABLE `lq_skin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`status`);
ALTER TABLE `settings` ADD FULLTEXT KEY `banner` (`title`);

--
-- Chỉ mục cho bảng `setting_wheel`
--
ALTER TABLE `setting_wheel`
  ADD PRIMARY KEY (`1`);

--
-- Chỉ mục cho bảng `top_recharge`
--
ALTER TABLE `top_recharge`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wheel`
--
ALTER TABLE `wheel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `acc_random`
--
ALTER TABLE `acc_random`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `history_buy`
--
ALTER TABLE `history_buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `history_card`
--
ALTER TABLE `history_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_dff`
--
ALTER TABLE `history_dff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_wheel`
--
ALTER TABLE `history_wheel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lq_champion`
--
ALTER TABLE `lq_champion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `lq_skin`
--
ALTER TABLE `lq_skin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `top_recharge`
--
ALTER TABLE `top_recharge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wheel`
--
ALTER TABLE `wheel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
