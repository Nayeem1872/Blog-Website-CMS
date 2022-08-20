-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 02:08 PM
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
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `admin_name` varchar(60) NOT NULL,
  `addedby` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `admin_name`, `addedby`) VALUES
(1, 'nayeem1872', 'abcd', 'Nayeem', 'Nayeem'),
(6, 'Potter', 'abcd', 'potter', 'Nayeem');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `author`, `datetime`) VALUES
(8, 'news3', 'Nayeem', '2022-02-28 14:52:48'),
(9, 'post', 'Nayeem', '2022-02-28 14:53:33'),
(10, 'geo', 'Nayeem', '2022-02-28 14:54:23'),
(11, 'sports', 'Nayeem', '2022-03-01 09:14:01'),
(12, 'si-fi', 'Nayeem', '2022-03-08 17:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `post_id` int(11) NOT NULL,
  `datetime` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `datetime`, `name`, `email`, `comment`) VALUES
(5, 5, '2022-04-19 12:10:26.996235', 'nayeem', 'chelsea.nayeem99@gmail.com', 'sacca'),
(6, 5, '2022-04-19 12:11:26.042167', 'nayeem', 'chelsea.nayeem99@gmail.com', 'sccdasd');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`) VALUES
(1, 'Nayeem Islam', 'chelsea.nayeem99@gmail.com', 'hello'),
(3, 'Nayeem Islam', 'chelsea.nayeem99@gmail.com', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Id` int(10) NOT NULL,
  `datetime` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `title` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `post` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Id`, `datetime`, `title`, `category`, `author`, `image`, `post`) VALUES
(19, '2022-05-08 16:24:51.350575', 'Dozens feared dead after Russian bomb', '', 'Nayeem', 'greg-rakozy-oMpAz-DN-9I-unsplash.jpg', '                                ZAPORIZHZHIA, Ukraine (AP) — Dozens of Ukrainians were feared dead Sunday after a Russian bomb destroyed a school sheltering about 90 people in the basement as Moscows invading forces kept up their barrage                    '),
(21, '2022-05-08 16:41:48.710423', 'Enhancing Existing Power Infrastructure', '9', 'Nayeem', 'marek-piwnicki-ohxGSbv-OJE-unsplash.jpg', 'All the remaining women, children and older civilians who had been sheltering with Ukrainian fighters in the Azovstal plant were evacuated Saturday. The troops still inside have refused to surrender; hundreds are believed to be wounded.'),
(22, '2022-05-08 18:14:58.348041', 'Queens home movies to be in new documentary for ', '8', 'Nayeem', 'pexels-pixabay-302304.jpg', 'The queen granted the broadcaster unprecedented access to hundreds of home movies shot by her, her parents and her late husband Prince Philip, as part of celebrations for her upcoming Platinum Jubilee, honoring her 70 years on the throne.\r\n\r\nThe videos record the queens life from when she was a baby in a pram to her coronation in 1953.\r\n\r\nOne clip captured the first extended visit of Philip to Balmoral Castle in Scotland in 1946, before his engagement to Elizabeth was made public. The footage depicts a beaming Princess Elizabeth showing off her engagement ring to the camera.'),
(23, '2022-05-08 18:15:41.456948', 'I’m Jealous of the Moms Who Can Keep Up With Thei', '9', 'Nayeem', 'pexels-harrison-candlin-2441459.jpg', 'Now, don’t get me wrong. I’m not lounging around all day allowing my four kids to fend for themselves. In fact, I work, homeschool my five-year-old, and do the normal errands and chores that come along with parenthood. However, I also have the full-time job of a chronic illness — which means, yes, I have a lot on my plate.'),
(24, '2022-05-08 18:18:32.952783', 'Everything to Know About the', '12', 'Nayeem', 'pexels-tobias-dziuba-927629.jpg', 'To get rid of the bump appearance, your doctor will inject the filler into the area around your nose, the tip to give a lifted effect, and (if requested) the bridge of your nose itself. For someone who wants to achieve a well-balanced profile look without waiting months to get into your doctors office or going through a lengthy healing process, the liquid nose job is a great option that takes around 10 to 15 minutes.'),
(25, '2022-05-08 18:19:22.224248', 'Last Ukrainian fighters in Mariupol vow to fight ', '9', 'Nayeem', 'pexels-leah-kelley-3935703.jpg', 'As the last civilians were evacuated from Mariupols embattled steel plant, leaders of the remaining Ukrainian fighters holing up there took to Zoom to issue a defiant message: That they will fight until the very end.'),
(26, '2022-05-08 18:20:07.044993', 'First lady Jill Biden visits Ukraine in rare trip', '8', 'Nayeem', 'pexels-pixabay-207636.jpg', 'Biden entered the country on Mothers Day from Slovakia after she visited a processing center at the Vysne Nemecke border crossing and met with refugees. Inside Ukraine, she met with Ukrainian first lady Olena Zelenska, who had not appeared in public since the Russian invasion on Feb. 24.'),
(27, '2022-05-08 18:22:18.633837', 'UN ambassador: Jill Biden visit to Ukraine sends ', '8', 'Nayeem', 'pexels-cottonbro-6334492.jpg', 'The first ladys visit has given so much support and encouragement to the Ukrainian women and children and for her to go there on Mothers Day to meet with the Ukrainian first lady, I think, sends a very strong, a very positive message, Thomas-Greenfield told Tapper. '),
(28, '2022-05-08 18:23:08.307299', 'Last Ukrainian fighters in Mariupol vow to fight ', '10', 'Nayeem', 'pexels-pixabay-532231.jpg', 'Kyivs defense of Mariupol appeared to be nearing an end this weekend as more than 300 civilian women, children and elderly were evacuated from Azovstal steel plant — the last holdout for the citys resistance — though the two fighters said they could not confirm that every single civilian had been evacuated from the plant.\r\n\r\nUkrainian President Volodymyr Zelensky a day earlier said diplomatic efforts were underway to try to free the fighters, medics and the wounded — though he acknowledged that this would be “extremely difficult.'),
(29, '2022-05-08 19:39:06.933751', 'Camilla, Duchess of Cornwall had', '11', 'Nayeem', 'pexels-samet-kasik-238364.jpg', 'Speaking to her son Tom for You magazine, she said: I do still cook for myself when at home. Simple things like fish en papillote with butter and herbs. And vegetables from the garden: kale, purple sprouting broccoli, carrots, courgettes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
