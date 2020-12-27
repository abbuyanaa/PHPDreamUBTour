-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2020 at 06:17 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `lang_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `first_name`, `last_name`, `email`, `profile`, `phone`, `lang_id`, `created_at`, `updated_at`) VALUES
(1, 'Fname', 'Lname', 'fname@gmail.com', '20200210_0c6be474e9.jpg', 12345678, 2, '2020-02-10 21:14:34', '2020-02-10 21:14:34'),
(2, 'test1', 'test2', 'test@gmail.com', '20200210_75b517eb44.jpg', 123456, 3, '2020-02-10 21:15:23', '2020-02-10 21:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `bairshil`
--

CREATE TABLE `bairshil` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bairshil`
--

INSERT INTO `bairshil` (`id`, `name`, `created_at`) VALUES
(1, 'Улаанбаатар', '2020-02-10 13:52:09'),
(2, 'Архангай', '2020-02-10 14:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`) VALUES
(1, 'Явган аялал', '2020-02-10 13:54:18'),
(2, 'Үүргэвчтэй аялал', '2020-02-10 13:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`) VALUES
(1, '20200210_5391af6205.jpg'),
(2, '20200210_4b1e88bdd2.jpg'),
(3, '20200210_ee9d343a00.jpg'),
(4, '20200210_f6381afd9c.jpg'),
(5, '20200210_f6689eada4.jpg'),
(6, '20200210_7644c4ca69.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`) VALUES
(1, 'Англи'),
(2, 'Солонгос'),
(3, 'Монгол');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `lang_id` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `body`, `lang_id`, `views`, `created_at`, `updated_at`) VALUES
(1, 'Хэзээ ч өөрийнхөө унтдаг орон дээр гадуур хувцастайгаа сууж болохгүй! Гадны хувцастай хүмүүсийг ч бас бүү суулга!', '<p style=\"text-align: justify;\"><span style=\"color:rgb(34, 34, 34); font-family:lato,sans-serif\">Хэрэв таны найз охин орон дээр битгий суугаарай гэвэл &ndash; хүндээр хүлээж авах хэрэггүй! Түүний хэлснийг биелүүлсэн нь дээр. Хэрэв та өөрийнхөө өмссөн хувцсыг өдрийн турш юу нааж, хуримтлуулсан болохыг мэдэхгүй байгаа бол, цөөн хэдэн бохир нууцуудаас дуулгая. Бид үргэлж уншигчдынхаа эрүүл мэндэд анхаарахыг зорьдог билээ. Тэр ч үүднээсээ яагаад орон дээр хэзээ ч гадуур хувцастайгаа сууж болохгүй вэ гэдгийн шалтгааныг хүргэж байна &ndash; та үүнийг мэдэж авсныхаа дараа бидэнд талархах болно.</span></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/travel/images/20200210_5391af6205.jpg\" style=\"height:328px; width:1000px\" /></p>\r\n', 3, 0, '2020-02-10 18:32:10', '2020-02-10 18:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `price` int(11) NOT NULL,
  `bairshil_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `price`, `bairshil_id`, `cat_id`, `lang_id`, `views`, `created_at`, `updated_at`) VALUES
(1, 'Нүхжилтийг илүү томроход хүргэдэг арьс арчилгааны 8 алдаа. Эдгээрийг мэдэж авснаар та торгомсог, зөөлөн арьстай болж чадна!', '<p><span style=\"color:rgb(34, 34, 34); font-family:lato,sans-serif\">Их хэмжээний тос, үхэжсэн арьсны эс, бохирдол болон бактери арьсны нүхийг бөглөж, нүхжилтийг илүү томруулдаг. Нүүрээ арчлах нь нэн чухал боловч, заримдаа төвөгтэй байдаг. Зарим талаараа хэтэрхий их арчилгаа тийм ч сайн нөлөөтэй биш бөгөөд бидний өдөр тутам гоо сайхандаа анхаардаг зуршил болон арчилгаа арьсны нүхжилтэнд гадаад хүчин зүйлсээс илүү сөргөөр нөлөөлөх нь бий. Бид уншигчиддаа зориулан шинэ гоо сайхны зөвлөгөөнүүд хүргэж байна. Эдгээрийг мэдэж авах нь таны арьс арчилгаанд чухал нөлөө үзүүлэх юм. Хадгалж аваад, дараах зөвлөгөөнүүдийг хэрэгжүүлээрэй!</span><br />\r\n&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/travel/images/20200210_ee9d343a00.jpg\" style=\"height:382px; width:600px\" /></p>\r\n\r\n<p><span style=\"color:rgb(34, 34, 34); font-family:lato,sans-serif\">1. Тогтмол тос шингээж авах үйлчилгээтэй цаас хэрэглэх Тос шингээж авах цаас халуун өдрүүдэд арьсыг хамгаалах буюу арьс хэтэрхий их тослогтох болон хөлрөх үед хэрэглэхэд тохиромжтой байдаг. Хэдий тийм ч байнга хэрэглэсээр байх юм бол, арьсанд сайнаасаа илүү муугаар нөлөөлнө. Бодит байдал дээр нимгэн тосны давхарга арьсанд зайлшгүй байх шаардлагатай. Үүнийг байнга авах нь арьсыг илүү их тос ялгаруулахад хүргэдэг. Үр дүнд нь нүхжилт үүсэж, хэмжээг нь илүү томруулдаг байна.</span></p>\r\n', 150000, 2, 1, 2, 0, '2020-02-10 15:09:40', '2020-02-10 15:09:40'),
(2, 'Эмч нар хүртэл төдийлөн мэдээд байдаггүй хүний бие махбодийн талаарх 16 сонирхолтой баримт', '<p><span style=\"color:rgb(34, 34, 34); font-family:lato,sans-serif\">Хүний тархи сарнай цэцэгт маш дуртай. Энэ цэцгийн анхилуун үнэр хүнийг мэдээлэл тогтоож авахад тусалдаг болохыг германы эрдэмтэд олж&nbsp;илрүүлжээ. Дашрамд&nbsp;хэлэхэд, таатай зөөлөн үнэр унтаж байхад хүртэл ой санамжийг сайжруулж байдаг байна. Бидний бие махбодид сонирхолтой зүйл маш их бий, заримдаа өөрийн боловч хөндлөнгийн өөр амьдралаар амьдраад байна уу гэмээр сэтгэгдэл төрүүлдэг. Танд л гэж хэлэхэд, энэхүү&nbsp;мэдээллийг&nbsp;уншихаасаа өмнө сарнайн үнэртэй лаа асаахыг бодоорой.</span><br />\r\n&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/travel/images/20200210_5391af6205.jpg\" style=\"height:328px; text-align:center; width:600px\" /></p>\r\n', 250000, 1, 1, 2, 0, '2020-02-10 17:15:44', '2020-02-10 17:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `fb_url` varchar(255) NOT NULL,
  `twitter_url` varchar(255) NOT NULL,
  `instagram_url` varchar(255) NOT NULL,
  `youtube_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `fb_url`, `twitter_url`, `instagram_url`, `youtube_url`) VALUES
(1, 'facebook', 'twitter', 'instagram', 'youtube');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 99887766, 'BGD', '2020-02-10 12:09:20', '2020-02-10 12:09:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bairshil`
--
ALTER TABLE `bairshil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bairshil_id` (`bairshil_id`,`cat_id`,`lang_id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bairshil`
--
ALTER TABLE `bairshil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
