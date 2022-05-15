-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2022 at 04:53 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insta`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(6) UNSIGNED NOT NULL,
  `First_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Last_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Pass` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ava_Img` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `First_name`, `Last_name`, `Pass`, `Ava_Img`, `Email`, `reg_time`) VALUES
(1, 'Tom', 'Ford', '123Th', 'public/img/ava/3.jpg', 'tdc@gmail.com', '2022-05-15 10:52:14'),
(2, 'Harry', 'Anderson', 'Ccc220', 'public/img/ava/4.jpg', '174687@kumpulanmedia.com', '2022-05-15 10:52:21'),
(3, 'Richard', 'Armstrong', 'Trinhtruc1831', 'public/img/ava/5.jpg', 'sbona22@ndmlpife.com', '2022-05-15 11:25:52'),
(4, 'George', 'Edison', '964clemOn', 'public/img/ava/2.jpg', '45tc@gmail.com', '2022-05-15 10:52:03'),
(5, 'Matt', 'Jenkins', '7302Egg', 'public/img/ava/1.jpg', '2t@gmail.com', '2022-05-15 10:51:52'),
(14, 'Trịnh', 'Trúc', 'thanhtruc123T', 'public/img/ava/6.jpg', 'thanhtruc@gmai.com', '2022-05-15 11:32:10'),
(15, 'Trịnh', 'Trúc', 'thaTnhtruc123', 'public/img/ava/7.jpg', 'abchi@gmail.com', '2022-05-15 13:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Pid` int(6) UNSIGNED NOT NULL,
  `Descript` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `Show_Level` int(1) DEFAULT NULL,
  `Post_Img` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Post_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Acc_post` int(6) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Pid`, `Descript`, `Show_Level`, `Post_Img`, `Post_time`, `Acc_post`) VALUES
(1, 'MY AIM IN LIFE\r\nAn aim is a goal or objective to achieve in life. In order to succeed in life, one must have a goal. My aim in life is to be a teacher. Teaching is a noble and responsible profession. I have come to know that the ever-increasing misery and distress, are due to the ignorance and illiteracy of the people of our country. So I have decided to spread education among the masses as much as possible within my humble power. As a teacher, I shall try my best to impart man-making education. Some say that money is the honey of life. But I do not agree with them. Rather, I think that morality is the real honey of life. I want to be a lovable and respectable person as a teacher in the future.', 0, 'public/img/post/1.jpg', '2022-05-13 14:46:54', 2),
(2, 'A MEMORABLE DAY OR AN UNFORGETTABLE EXPERIENCE\r\nHuman life is a mixture of weal and woe, smiles and tears. However, once what had seemed to be a memorable day turned to be the saddest day of my life. We had planned for a picnic with all our classmates after the examination on the bank of the river Ganga. We started early in the morning and reached at 10 am. After the cooking was completed, we wished to take a bath in the Ganga. Our class teacher warned that only those who knew swimming would be allowed to bathe in the river. Rajesh, our youngest classmate, did not know how to swim. But he came unnoticed and tried to imitate us in the river. And what was feared happened? Rajesh was drowned. After a long search, we recovered the body. The sight made us dumb and tears trickled down our cheeks. The horrible sight still haunts me whenever I am alone.', 1, 'public/img/post/4.jpg', '2022-05-15 09:33:27', 5),
(3, 'A FORGETFUL PERSON\r\nSometimes we come across some forgetful persons in our surroundings. And some geniuses are also forgetful to some extent. We know that Newton boiled his pocket watch instead of an egg. Once Einstein was traveling without a ticket in a train. When the checker demanded the ticket, he was frantically searching for the missing ticket. However, when the checker could recognize him, he assured that the scientist would not have to search for it. Einstein still went on searching and remarked that he was searching to find out where he was going for he totally forgot about his destination. But the most striking incident centered around my father on my sister’s birthday. The dinner was ready but the guests were absent. Finally, father discovered that all the invitation letters were lying in his drawer. The incident has become a family legend.', 1, 'public/img/post/2.jpg', '2022-05-15 09:33:15', 1),
(5, 'PHYSICAL EXERCISE\r\nWe all know that health is wealth. With its intricate network of bones, muscles, and organs, a well-functioning human body is much like an orchestrated symphony. To keep this orchestra playing well, we need physical exercise. It may take the form of sports, yoga, or even regular walking. It is well-known that people who engage in physical exercise stay happier and live longer. Our society is turning towards more and more technical sophistication and automation. The machine has replaced our physical labor. To compensate for this change in lifestyle we need physical exercise. Exercise also sharpens our intellect. It keeps a balance between our body and mind. With the help of regular physical training, we will stay healthier, happier, and more alert. However, over-exercise or exercising in an improper way may tell upon our health and growth. We must therefore do it in a balanced form.', 2, 'public/img/post/3.jpg', '2022-05-15 09:33:21', 1),
(12, 'Hi!!!!', 0, 'public/img/post/5.jpg', '2022-05-15 14:36:16', 1),
(13, '2222222222222222', 1, 'public/img/post/6.jpg', '2022-05-15 14:43:29', 1),
(14, 'Wowww', 1, 'public/img/post/7.jpg', '2022-05-15 14:45:03', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Pid`),
  ADD KEY `accpost` (`Acc_post`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Pid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`Acc_post`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
