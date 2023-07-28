-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2023 at 09:12 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pulmerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(255) NOT NULL,
  `pack_id` int(255) NOT NULL,
  `activity_title` text NOT NULL,
  `activity_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `app_id` int(255) NOT NULL,
  `package_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `people` int(20) NOT NULL,
  `day_one` date NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`app_id`, `package_id`, `name`, `email`, `phone`, `people`, `day_one`, `comment`, `status`) VALUES
(41, 67, 'George Kimagut', 'geojimagut@gmail.com', 759200998, 1, '2023-01-03', 'Yes', 0),
(42, 67, 'George Kimagut', 'geojimagut@gmail.com', 759200998, 3, '2023-01-02', 'he', 0),
(43, 67, 'dgfd', 'xvxcv', 759200998, 2, '2023-01-03', '', 0),
(44, 67, 'George Kimagut', 'geojimagut@gmail.com', 759200998, 1, '2023-01-05', 'This', 0),
(45, 67, 'George Kimagutj', 'geojimagut@gmail.com', 759200998, 4, '2023-01-05', 'This', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(200) NOT NULL,
  `content` text NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog_pics`
--

CREATE TABLE `blog_pics` (
  `id` int(200) NOT NULL,
  `destination_id` int(200) NOT NULL,
  `pic_name` varchar(200) NOT NULL,
  `createtime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `destination_id` int(255) NOT NULL,
  `destination_name` varchar(150) NOT NULL,
  `destination_profile` text NOT NULL,
  `destination_attraction` text NOT NULL,
  `destination_activities` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`destination_id`, `destination_name`, `destination_profile`, `destination_attraction`, `destination_activities`) VALUES
(32, 'Maasai Mara', '<p>Maasai Mara is one of the largest game reserves in Africa.&nbsp; It is located in Kenya.&nbsp;The Maasai Mara National Reserve was established as a wildlife sanctuary in 1961. Massai Mara is also home to the <strong><span style=\"color:#c0392b\">Massai people</span></strong>, which is of course among the most famous tribes of Africa.</p>\r\n', '<p><span style=\"color:#2980b9\"><span style=\"font-size:14px\"><u><strong>1. THE MAASAI PEOPLE</strong></u></span></span></p>\r\n\r\n<p>First and fore most, what really comes into mind when one hears of this place; Maasai Mara is the Massai culture. The culture of this tribe (the Maasai) who live in this area is amazing. Right from their dress code, to the food, and to soo much more. Make sure to visit this place at least once in your life time, you will be amazed! This includes dances, and traditional rituals</p>\r\n\r\n<p><u><span style=\"font-size:14px\"><span style=\"color:#2980b9\"><strong>2. WILD BEASTS MIGRATION</strong></span></span> </u></p>\r\n\r\n<p>Secondly, the wild beasts migration. This is actually among the seven wonders of the world. Millions of wild beasts crossing over to Tanzania and back to Kenya in different times of the year. It is a spectacular scene.</p>\r\n\r\n<p><strong><span style=\"font-size:14px\"><span style=\"color:#2980b9\"><u>3. GAME DRIVES</u></span></span></strong></p>\r\n\r\n<p>This are excusions made by vehicles thoughout the National Park. The game drives are scheduled for mornings and evenings in order to enjoy the sunrise and the sunsets of the Mara. There are however also night drives which are done under strict guidance and escort by game rangers</p>\r\n', ''),
(33, 'Mombasa', '<p>Mombasa is an island located at the coast of Kenya. It is known as the white and blue city. The city is known for it&#39;s coastal beaches and iconic monuments like the fort Jesus and the elephant tusks.</p>\r\n', '<p><strong><span style=\"color:#2ecc71\"><span style=\"font-size:14pt\">Fort Jesus</span></span></strong></p>\r\n\r\n<p><span style=\"font-size:16px\">It is Fort, it was built by the Portuguese in&nbsp;1593-1596. It is found at the sourthern part of Mombasa town. The Fort was officially recognized as a Nation Park in 1958. Later, excursions were made and the Fort became a&nbsp;Museum in 1962.&nbsp;The exhibits of the museum consist of findings from archaeological excavations at Fort Jesus, Gede, Manda, Ungwana and other sites. Fort Jesus is also used to showcase artistic work by up coming artists, giving them an opportunity to meet potential clients. There are also light and sound shows which are organized on a weekly basis.</span></p>\r\n\r\n<p><span style=\"color:#2ecc71\"><span style=\"font-size:14pt\"><strong>The Haller Park</strong></span></span></p>\r\n\r\n<p><span style=\"font-size:16px\">A nature park in Bamburi. From being a quary wasteland, Haller Park now is home to&nbsp;a variety of plant and animal species which serve as a recreation spot for tourists and locals. It started as an experiment by Bamburi Portland cement company to reclaim the land which had left an ugly terrain in that space.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">Some of the animals present in the nature park include, the tortoise. The Haller park crocodiles which were brought as eggs from Turkana and Baringo lakes. There is so much to explore in this park.</span></p>\r\n\r\n<p><span style=\"color:#2ecc71\"><span style=\"font-size:18.6667px\"><strong>Mombasa Marine Park</strong></span></span></p>\r\n\r\n<p><span style=\"font-size:16px\">One of the busiest of Kenya&#39;s offshore reserves, Mombasa Marine National Park protects mangroves, seagrass beds, sandy beaches, and coral reef. Among the marine creatures in the marine park are seahorses, stingrays, and eels</span></p>\r\n\r\n<p><span style=\"color:#2ecc71\"><span style=\"font-size:18.6667px\"><strong>Coastal Beaches</strong></span></span></p>\r\n\r\n<p><span style=\"font-size:16px\">These are the most famouse attraction sites in Mombasa certainly. It&nbsp; is where everyone who visits Mombasa wouldn&#39;t miss going. The beaches in Mombasa include <span style=\"color:#2980b9\"><strong>Bamburi Beach</strong></span>, <span style=\"color:#2980b9\"><strong>Nyali Beach</strong></span>, <span style=\"color:#2980b9\"><strong>Shanzu Beach</strong></span>, <span style=\"color:#2980b9\"><strong>Diani Beach</strong></span> and <span style=\"color:#2980b9\"><strong>Tiwi Beach.&nbsp;</strong></span>About the activities which one can on the oceans, they are endless, right from swimming, sand bathing, surfing or even just enjoying the breeze from the ocean. </span></p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#16a085\"><strong>Diani beach</strong></span> is among the most developed areas in Mombasa city. International tourists who visit the place have packages that include water games. Snorkeling, kitesurfing, and diving to water-skiing and parasailing</span></p>\r\n\r\n<p><span style=\"font-size:16px\">Other amazing sites to visit during your stay in Mombasa are the Mamba Village, The Tusks, The Old Town</span></p>\r\n', NULL),
(34, 'Hells Gate', '<p>Hells Gate is named after&nbsp;the intense geothermal activity within its boundaries.&nbsp;Spectacular scenery including the towering cliffs, water-gouged gorges, stark rock towers, scrub clad volcanoes and belching plumes of geothermal steam make it one of the most atmospheric Parks in Africa. Is is a day&#39;s trip from Nairobi.&nbsp;It was established in 1984. A small national park, it is known for its wide variety of wildlife and for its scenery. It covers an area of approximately 68 square kilometers. The small park is&nbsp; home to over 100 bird species</p>\r\n', '<p><span style=\"font-size:16px\">The climate in Hells Gate is warm dry and dusty.&nbsp;Hell&rsquo;s Gate is open for wildlife viewing throughout the year however the rainy season could impede your touring during the wet season months of March through May.&nbsp;</span></p>\r\n\r\n<p><strong><span style=\"font-size:16px\">What do at Hells Gate</span></strong></p>\r\n\r\n<p><strong><span style=\"font-size:16px\">Hiking</span></strong></p>\r\n\r\n<p><span style=\"font-size:16px\">With a ranger you can explore the park&rsquo;s exotic gorges, cut into the rock over eons by the steady passing of water.&nbsp;</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>Hell&rsquo;s Gate Gorge&nbsp;</strong>is what would truely not wanna miss.&nbsp;</span></p>\r\n\r\n<p><strong><span style=\"font-size:16px\">Rock Climbing</span></strong></p>\r\n\r\n<p><span style=\"font-size:16px\">Fischer&rsquo;s Tower in Hell&rsquo;s Gate national park is a volcanic plug situated near the northeastern border of the park within a walking distance from Elsa gate, the rock has a height of approximately 25 meters.&nbsp;According to the Masai folklore, the tower is a Masai girl who turned to a stone after looking back on her home, while on the way to her future husband which is contrary to tradition. Climbing Fischer&#39;s tower gives on a beautiful view of the sorrounding gorges.&nbsp;</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>Cycling at Hell&rsquo;s Gate National Park</strong></span></p>\r\n\r\n<p><span style=\"font-size:16px\">Cycling at Hell&rsquo;s Gate national park is an amazing experience like no other, cycling past grazing zebras and a giraffe among other animals is a great experience. The park has no wild cats making it one of the best places in Kenya to enjoy a biking tour in the wild. It is among the few parks where riding is permitted.</span></p>\r\n', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `destination_images`
--

CREATE TABLE `destination_images` (
  `img_id` int(255) NOT NULL,
  `desti_id` int(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destination_images`
--

INSERT INTO `destination_images` (`img_id`, `desti_id`, `image_name`, `image_createtime`) VALUES
(81, 32, 'masai-marabanner.jpg', '2022-12-13 16:51:04'),
(82, 32, 'masai-mara-reserve-banner.jpg', '2022-12-13 16:51:04'),
(83, 33, 'mombasa-2-1152x499-1.jpg', '2022-12-13 18:09:09'),
(84, 33, 'mombasa-2-11.jpg', '2022-12-13 18:09:09'),
(85, 34, 'hells2.jpg', '2022-12-13 22:56:20'),
(86, 34, 'hellsgate.jpg', '2022-12-13 22:56:20'),
(87, 34, 'hells-gate-kenya-3_0.jpg', '2022-12-13 22:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `home_slide`
--

CREATE TABLE `home_slide` (
  `image_id` int(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_slide`
--

INSERT INTO `home_slide` (`image_id`, `image_name`, `image_time`) VALUES
(34, 'msaone.webp', '2022-08-25 21:31:43'),
(42, 'main_back.jpg', '2022-12-05 14:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `inclusives`
--

CREATE TABLE `inclusives` (
  `inclusive_id` int(255) NOT NULL,
  `inclusive_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inclusives`
--

INSERT INTO `inclusives` (`inclusive_id`, `inclusive_name`) VALUES
(2, ' Breakfast');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `email` varchar(255) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`email`, `username`, `password`) VALUES
('info@pulmmertours.co.ke', 'Pulmmer', 'e64b78fc3bc91bcbc7dc232ba8ec59e0');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(255) NOT NULL,
  `dest_id` int(255) NOT NULL,
  `type_id` int(200) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_duration` int(255) NOT NULL,
  `package_price` int(255) DEFAULT NULL,
  `destination` varchar(255) NOT NULL,
  `activities` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `dest_id`, `type_id`, `package_name`, `package_duration`, `package_price`, `destination`, `activities`) VALUES
(60, 33, 8, 'Let\'s take a ride to the coast.', 5, 26000, 'Mombasa', '<p><span style=\"font-size:16px\">This is a 5 days&#39; tour to Mombasa. There are so many things to do in Mombasa including visiting the Haller Park, the Beaches. <span style=\"color:#e74c3c\">Note&nbsp;</span>that the price does not include the transportation back to homes, and does not cater also for flights, if anyone wants to fly to Mombasa. Flight will lead to an increase in the package price.</span></p>\r\n\r\n<p><strong><span style=\"font-size:16px\">Day One</span></strong></p>\r\n\r\n<p><span style=\"font-size:16px\">Arrival of the guests at their specific hotels. Interacting with other tourists and meeting the tour guides for directions concerning day two</span></p>\r\n\r\n<p><strong><span style=\"font-size:16px\">Day Two</span></strong></p>\r\n\r\n<p><span style=\"font-size:16px\">Visiting the Haller Park. The tour begins at 0900h and will end at 1700h</span></p>\r\n'),
(62, 34, 9, 'Hells Gate', 5, 21000, 'Hells Gate', '<p><strong>Overview</strong></p>\r\n\r\n<p>Combine a visit to Hell&rsquo;s Gate National Park with a trip to Lake Naivasha during this full-day, small-group tour. Choose between a game drive and a bike ride through the park, topped off by a walking safari. Enjoy a lakeside lunch or scenic boat ride at your own expense. Tours include an educational visit to a local Maasai community and comfortable, round-trip transfers from your Nairobi hotel.<br />\r\n<br />\r\nRead more about Hell&#39;s Gate &amp; Lake Naivasha Small Group Day Tour - Guaranteed Daily Departure - https://www.viator.com/tours/Nairobi/Hells-Gate-and-Lake-Naivasha-Small-Group-Day</p>\r\n\r\n<p><u><strong>Included</strong></u></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Hell&#39;s Gate park Entrance fee</p>\r\n	</li>\r\n	<li>\r\n	<p>Bike&#39;s Hire</p>\r\n	</li>\r\n	<li>\r\n	<p>Bikes or vehicle park entrance fee</p>\r\n	</li>\r\n	<li>\r\n	<p>Lunch own expense (available for purchase)</p>\r\n	</li>\r\n	<li>\r\n	<p>Option boat ride at Lake Naivasha USD20</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><u><strong>Excluded</strong></u></p>\r\n\r\n<ul>\r\n	<li>Transport back to destination</li>\r\n	<li>Boat rides</li>\r\n</ul>\r\n\r\n<p><u><strong>Day One</strong></u></p>\r\n\r\n<p>Being picked from the specifice picking point. Moving to the hotel to get a room and get ready for the big day</p>\r\n\r\n<p><u><strong>Day Two</strong></u></p>\r\n\r\n<p>This is the first day of trip. We begin at the entrance of the Hells Gate gate. It is a riding day. The activities are to begin at 0800 hrs and end at 1700 hrs. Bikes shall be provided at the entrance. Lunch and breakfast also will be included.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `package_images`
--

CREATE TABLE `package_images` (
  `package_id` int(255) NOT NULL,
  `pack_image` varchar(255) NOT NULL,
  `image_createtime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_images`
--

INSERT INTO `package_images` (`package_id`, `pack_image`, `image_createtime`) VALUES
(60, 'mombasa-2-11.jpg', '2022-12-14 09:51:01'),
(60, 'mombasa-2-1152x499-1.jpg', '2022-12-14 09:51:01'),
(60, 'masai-mara-reserve-banner.jpg', '2022-12-14 09:51:01'),
(62, 'WhatsApp Image 2022-09-29 at 11.30.50 AM.jpeg', '2022-12-19 13:00:42'),
(62, 'WhatsApp Image 2022-09-29 at 11.30.49 AM.jpeg', '2022-12-19 13:00:42'),
(62, 'WhatsApp Image 2022-09-29 at 11.30.48 AM.jpeg', '2022-12-19 13:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(200) NOT NULL,
  `email` text NOT NULL,
  `review` text NOT NULL,
  `time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `email`, `review`, `time`) VALUES
(5, 'George Kimagut', 'This is my review', '2022-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type`) VALUES
(8, 'Group Tour'),
(9, 'Honey Moon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blog_pics`
--
ALTER TABLE `blog_pics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`destination_id`);

--
-- Indexes for table `destination_images`
--
ALTER TABLE `destination_images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `home_slide`
--
ALTER TABLE `home_slide`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `inclusives`
--
ALTER TABLE `inclusives`
  ADD PRIMARY KEY (`inclusive_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `app_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `blog_pics`
--
ALTER TABLE `blog_pics`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `destination_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `destination_images`
--
ALTER TABLE `destination_images`
  MODIFY `img_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `home_slide`
--
ALTER TABLE `home_slide`
  MODIFY `image_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `inclusives`
--
ALTER TABLE `inclusives`
  MODIFY `inclusive_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
