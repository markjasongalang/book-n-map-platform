-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 06, 2024 at 06:54 AM
-- Server version: 10.11.9-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u304230172_booknmap`
--

-- --------------------------------------------------------

--
-- Table structure for table `libraries`
--

CREATE TABLE `libraries` (
  `id` char(36) NOT NULL,
  `location_address` varchar(255) NOT NULL,
  `short_address` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `amenities` text NOT NULL,
  `username` char(36) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`id`, `location_address`, `short_address`, `latitude`, `longitude`, `name`, `about`, `amenities`, `username`, `date_added`, `date_updated`) VALUES
('19dc7a81-4ec9-4cda-a9db-9d467addb74e', 'Jiang Nan Hotpot, 223, Nicanor T. Garcia Street, Salcedo, Bel-Air, District I, Makati, Southern Manila District, Metro Manila, 1227, Philippines', 'Makati, Metro Manila', '14.5643253', '121.0228615', 'Aurelio Montinola, Jr. Library (Alliance Française de Manille)', '8:30 AM - 5:30 PM (Tuesday to Friday)\r\n9:00 AM - 5:00 PM (Saturday)\r\n\r\nFounded in 1920, the Alliance Française de Manille (AFM) is one of the leading foreign cultural institutions in the Philippines. As a non-profit organization dedicated to promoting French language and culture, AFM fosters friendly relations between Filipinos and the French through art and educational initiatives.', 'Campus France (study goals in France), Around 7000 books covering all aspects of French culture and civilization, Over 1000 learning materials (French language learning), Video Game Area (with over 40 video games), Bistro (offers meals and snack combinations), Around 200 documents about Quebec, Storytelling in French and English, Ciné-Goûter (movie &amp; snacktime), Board Game Afternoon, Book Sale, A growing selection of DVDs, Regular issues of periodicals, Translation services from French to English &amp; vice-versa, Avail English/French Interpreters, Venue Rental', 'jason_dev', '2024-10-05 07:59:25', '2024-10-05 08:00:56'),
('687b236f-9ec2-4592-a247-e4199ab5ce3e', 'Miguel Hernandez Library, Ayala Avenue, Salcedo, Bel-Air, District I, Makati, Southern Manila District, Metro Manila, 1226, Philippines', 'Makati, Metro Manila', '14.5564629', '121.0225321', 'Instituto Cervantes Miguel Hernandez Library', '9:00 AM - 5:00 PM (Monday to Friday)\r\n\r\nThe Instituto Cervantes Library in Manila, established in 1993, initially housed books supplied by the Instituto Cervantes&#039; headquarters and collections from the former Cultural Center of the Spanish Embassy in Manila. It was envisioned as a hub offering a wide range of materials—documents, literature, and audiovisual content—centered around the language and culture of Spain and Spanish-speaking countries.\r\n\r\nCurrently, the library holds over 20,000 items. As a key resource for the academic community, its collections and services are tailored to support Filipino students, researchers, and the general public with materials related to the Hispanic world. Visitors can access the library’s resources in person, via email, or by phone.', 'Reading Room (open to the public and free of charge), Collection of Spanish and Latin American literature, Audiovisual Materials, Borrowing (only for members and students enrolled at the Instituto Cervantes), Offer information on scholarships and studies in Spain, Document reproduction (xerox-copying service), Film Screenings, Interlibrary Loan Service (needs library card), Library Card (Php 840.00 per year), Accepts any consultation related to Spain or Latin America, Guided tour for interested visitors (email to bibmni@cervantes.es), Book Club (free and open to everybody interested)', 'jason_dev', '2024-10-05 06:17:55', NULL),
('6f86922e-9fc6-401e-a716-aa95a790352c', 'Filipinas Heritage Library, Makati Avenue, San Lorenzo, District I, Makati, Southern Manila District, Metro Manila, 1228, Philippines', 'Makati, Metro Manila', '14.5536324', '121.0231474', 'Filipinas Heritage Library', 'Founded in 1996, the Filipinas Heritage Library (FHL) is one part of Ayala Foundation’s Arts and Culture Division. As a comprehensive digital research hub focused on the Philippines, its goal is to ignite and nurture interest in the country’s visual, auditory, and printed history.\r\n\r\nFHL works with individuals and organizations to preserve documentary heritage, particularly highlighting the crucial period of Philippine nation-building (1930-1950s). The library&#039;s Filipiniana collections are accessible to the public both onsite (at the sixth floor of the Ayala Museum) and online (via their public access catalog), as well as through various public programs such as exhibitions, lectures, and educational events.', 'Filipiniana (Main), The Roderick Hall Collection (World War II), Rare Materials, Retrato (Images), Himig (Music), Exhibitions (Online/Onsite), Philippine Covid-19 Archive, Webinars, Muni-Muni Stories (first-ever music podcast), Spotify Playlists', 'jason_dev', '2024-10-05 06:38:19', NULL),
('99cc5fa4-4309-4b55-bc25-833be92be909', 'Quezon City Public Library - Main, Mayaman Street, Central, Diliman, 4th District, Quezon City, Eastern Manila District, Metro Manila, 1100, Philippines', 'Quezon City, Metro Manila', '14.6476648', '121.0505937', 'Quezon City Public Library', '7:00 AM - 7:00 PM (Monday to Friday)\r\n8:00 AM - 4:00 PM (Saturday)', 'Library card application fee: Php 60, Conference Room, Cafe @Lib (coffee shop), Public Restrooms, Wireless Network, Computers, Printers, Scanners and photocopying machines, Projectors, Charging stations, Meeting Rooms, Free Digital Literacy, Free webinar Basic Japanese Class, Fun &amp; Games, Adopt-A-Library / Share-A-book, Bookmobile Caravan', 'jason_dev', '2024-10-05 05:12:44', NULL),
('e1022d83-b689-498c-aed8-3f60d7215458', 'Valenzuela Academic Center for Excellence, A. Pablo Street, Saint Louis Compound, Malinta, 1st District, Valenzuela, Northern Manila District, Metro Manila, 1440, Philippines', 'Valenzuela, Metro Manila', '14.69240825', '120.96558474767926', 'Valenzuela City Library', '1st Floor, 9:00 AM - 6:00 PM (Monday to Sunday)\r\n2nd Floor, 9:00 AM - 12:00 MN (Monday to Sunday)\r\n3rd Floor, 9:00 AM - 6:00 PM (Monday to Sunday)\r\n\r\nValACE houses the public library for three (3) storeys, featuring a senior’s corner, general reading area, children’s area, expansive study rooms, computer room, and so forth. The bookroom also offered a wide variety of reading resources; ranging from Filipiniana to foreign literature and a collection of references.', 'Free Wi-Fi vouchers, Study Desks (with overhead bins and cable wire holes), Reading Nooks, Local Section (either written by national artists or local authors from Valenzuela), Topnotchers’ Shelf (honors Valenzuela residents who excelled as Board Exam Topnotchers), Online Public Access Catalog (OPAC), Cubby holes for personal items (temporarily keep your personal items), Children&#039;s Area, Breastfeeding room for mothers', 'jason_dev', '2024-10-05 07:20:26', '2024-10-05 07:20:59'),
('e8847bde-e34b-4c9f-b4fc-8ca93e6ee9e0', 'National Library of the Philippines, Kalaw Avenue, Ermita, Fifth District, Manila, Capital District, Metro Manila, 1000, Philippines', 'Manila, Metro Manila', '14.581554350000001', '120.97916995057517', 'National Library of the Philippines', 'Offices:\r\n8:00 AM - 5:00 PM (Monday to Friday)\r\n\r\nReading Room Services:\r\n8:00 AM - 5:00 PM   (Monday to Friday)', 'Free for public use, Doesn&#039;t require library card to enter, Bring 1 valid ID (for registration), Guided Library Tour (they offer library tour to showcase the place), Arts  &amp; Crafts Session, Knowledge Hub, Puppetry Show, Storytelling Session, Has many events', 'jason_dev', '2024-10-05 04:31:03', '2024-10-05 04:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `library_images`
--

CREATE TABLE `library_images` (
  `id` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `library_id` char(36) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_images`
--

INSERT INTO `library_images` (`id`, `file_path`, `library_id`, `date_added`) VALUES
(1, '../uploads/libraries/e8847bde-e34b-4c9f-b4fc-8ca93e6ee9e0/6700c1073bff26.01396131_20220819_152118.jpg', 'e8847bde-e34b-4c9f-b4fc-8ca93e6ee9e0', '2024-10-05 04:31:03'),
(2, '../uploads/libraries/e8847bde-e34b-4c9f-b4fc-8ca93e6ee9e0/6700c1073c2131.19853374_received_504685668236295.jpeg', 'e8847bde-e34b-4c9f-b4fc-8ca93e6ee9e0', '2024-10-05 04:31:03'),
(3, '../uploads/libraries/e8847bde-e34b-4c9f-b4fc-8ca93e6ee9e0/6700c1073c3886.25633808_20220819_152032.jpg', 'e8847bde-e34b-4c9f-b4fc-8ca93e6ee9e0', '2024-10-05 04:31:03'),
(4, '../uploads/libraries/e8847bde-e34b-4c9f-b4fc-8ca93e6ee9e0/6700c1073c5505.64063301_20220928_154016.jpg', 'e8847bde-e34b-4c9f-b4fc-8ca93e6ee9e0', '2024-10-05 04:31:03'),
(5, '../uploads/libraries/e8847bde-e34b-4c9f-b4fc-8ca93e6ee9e0/6700c1073c6aa0.05320920_2024-08-02.jpg', 'e8847bde-e34b-4c9f-b4fc-8ca93e6ee9e0', '2024-10-05 04:31:03'),
(6, '../uploads/libraries/99cc5fa4-4309-4b55-bc25-833be92be909/6700caccc15076.49205174_2024-09-26.jpg', '99cc5fa4-4309-4b55-bc25-833be92be909', '2024-10-05 05:12:44'),
(7, '../uploads/libraries/99cc5fa4-4309-4b55-bc25-833be92be909/6700caccc17b70.02881767_2022-07-29.jpg', '99cc5fa4-4309-4b55-bc25-833be92be909', '2024-10-05 05:12:44'),
(8, '../uploads/libraries/99cc5fa4-4309-4b55-bc25-833be92be909/6700caccc195e7.72890754_2023-02-23.jpg', '99cc5fa4-4309-4b55-bc25-833be92be909', '2024-10-05 05:12:44'),
(9, '../uploads/libraries/687b236f-9ec2-4592-a247-e4199ab5ce3e/6700da13892a21.29239964_435054480_825935409574152_7661307941078225373_n.jpg', '687b236f-9ec2-4592-a247-e4199ab5ce3e', '2024-10-05 06:17:55'),
(10, '../uploads/libraries/687b236f-9ec2-4592-a247-e4199ab5ce3e/6700da13895003.13693483_418557710_774207448080282_3869383221900488824_n.jpg', '687b236f-9ec2-4592-a247-e4199ab5ce3e', '2024-10-05 06:17:55'),
(11, '../uploads/libraries/687b236f-9ec2-4592-a247-e4199ab5ce3e/6700da13898b93.34586294_427863027_825935562907470_3898415881483865367_n.jpg', '687b236f-9ec2-4592-a247-e4199ab5ce3e', '2024-10-05 06:17:55'),
(12, '../uploads/libraries/687b236f-9ec2-4592-a247-e4199ab5ce3e/6700da1389a6a8.81481834_438301842_844316661069360_2916613900416639731_n.jpg', '687b236f-9ec2-4592-a247-e4199ab5ce3e', '2024-10-05 06:17:55'),
(13, '../uploads/libraries/687b236f-9ec2-4592-a247-e4199ab5ce3e/6700da1389d526.85184902_2023-06-09.jpg', '687b236f-9ec2-4592-a247-e4199ab5ce3e', '2024-10-05 06:17:55'),
(14, '../uploads/libraries/6f86922e-9fc6-401e-a716-aa95a790352c/6700dedb039fc5.40425541_2023-02-01 (1).jpg', '6f86922e-9fc6-401e-a716-aa95a790352c', '2024-10-05 06:38:19'),
(15, '../uploads/libraries/6f86922e-9fc6-401e-a716-aa95a790352c/6700dedb03c412.57785364_2023-02-01 (2).jpg', '6f86922e-9fc6-401e-a716-aa95a790352c', '2024-10-05 06:38:19'),
(16, '../uploads/libraries/6f86922e-9fc6-401e-a716-aa95a790352c/6700dedb03dc32.06636334_2023-02-01.jpg', '6f86922e-9fc6-401e-a716-aa95a790352c', '2024-10-05 06:38:19'),
(17, '../uploads/libraries/6f86922e-9fc6-401e-a716-aa95a790352c/6700dedb03f234.09210298_2024-02-22.jpg', '6f86922e-9fc6-401e-a716-aa95a790352c', '2024-10-05 06:38:19'),
(18, '../uploads/libraries/6f86922e-9fc6-401e-a716-aa95a790352c/6700dedb040cb5.86820989_IMG_8297-Pano.jpg', '6f86922e-9fc6-401e-a716-aa95a790352c', '2024-10-05 06:38:19'),
(20, '../uploads/libraries/e1022d83-b689-498c-aed8-3f60d7215458/6700e8baf03331.82536673_461029510_521880607264600_4497441914278946350_n.jpg', 'e1022d83-b689-498c-aed8-3f60d7215458', '2024-10-05 07:20:26'),
(21, '../uploads/libraries/e1022d83-b689-498c-aed8-3f60d7215458/6700e8baf074d5.80644374_460940689_521880513931276_1858995390074591658_n.jpg', 'e1022d83-b689-498c-aed8-3f60d7215458', '2024-10-05 07:20:26'),
(22, '../uploads/libraries/e1022d83-b689-498c-aed8-3f60d7215458/6700e8baf0b049.99383614_460953282_521880567264604_4108277032613120434_n.jpg', 'e1022d83-b689-498c-aed8-3f60d7215458', '2024-10-05 07:20:26'),
(23, '../uploads/libraries/e1022d83-b689-498c-aed8-3f60d7215458/6700e8baf0e3f5.74848438_461086654_523391243780203_3612043655235858587_n.jpg', 'e1022d83-b689-498c-aed8-3f60d7215458', '2024-10-05 07:20:26'),
(24, '../uploads/libraries/e1022d83-b689-498c-aed8-3f60d7215458/6700e8baf10245.54768830_461376987_525686926883968_1050471135169781048_n.jpg', 'e1022d83-b689-498c-aed8-3f60d7215458', '2024-10-05 07:20:26'),
(25, '../uploads/libraries/e1022d83-b689-498c-aed8-3f60d7215458/6700e8baf144f0.89441821_461481577_527206323398695_7954674465379737757_n.jpg', 'e1022d83-b689-498c-aed8-3f60d7215458', '2024-10-05 07:20:26'),
(26, '../uploads/libraries/e1022d83-b689-498c-aed8-3f60d7215458/6700e8dbeaf169.21715020_460999662_521880547264606_8999709810005917140_n.jpg', 'e1022d83-b689-498c-aed8-3f60d7215458', '2024-10-05 07:20:59'),
(28, '../uploads/libraries/19dc7a81-4ec9-4cda-a9db-9d467addb74e/6700f1ddd8bbc5.08609116_406851699_652870210388118_2719001297984789841_n.jpg', '19dc7a81-4ec9-4cda-a9db-9d467addb74e', '2024-10-05 07:59:25'),
(29, '../uploads/libraries/19dc7a81-4ec9-4cda-a9db-9d467addb74e/6700f1ddd8ed94.56455216_407627674_652870287054777_3727611839283294687_n.jpg', '19dc7a81-4ec9-4cda-a9db-9d467addb74e', '2024-10-05 07:59:25'),
(30, '../uploads/libraries/19dc7a81-4ec9-4cda-a9db-9d467addb74e/6700f1ddd91a05.73624641_427721023_695710076104131_3311777758105358533_n.jpg', '19dc7a81-4ec9-4cda-a9db-9d467addb74e', '2024-10-05 07:59:25'),
(31, '../uploads/libraries/19dc7a81-4ec9-4cda-a9db-9d467addb74e/6700f1ddd96473.37177332_429673211_704934128515059_5492149922399242009_n.jpg', '19dc7a81-4ec9-4cda-a9db-9d467addb74e', '2024-10-05 07:59:25'),
(32, '../uploads/libraries/19dc7a81-4ec9-4cda-a9db-9d467addb74e/6700f1ddd98a82.23841572_438833135_739817238360081_3207335727223207445_n.jpg', '19dc7a81-4ec9-4cda-a9db-9d467addb74e', '2024-10-05 07:59:25'),
(33, '../uploads/libraries/19dc7a81-4ec9-4cda-a9db-9d467addb74e/6700f2035221e7.50380648_406513876_652870120388127_5910859682184004273_n.jpg', '19dc7a81-4ec9-4cda-a9db-9d467addb74e', '2024-10-05 08:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subs`
--

CREATE TABLE `newsletter_subs` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_subscribed` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL COMMENT 'hashed password',
  `terms_privacy_accepted` tinyint(1) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `terms_privacy_accepted`, `reg_date`) VALUES
('aff31e8a-f283-4957-b01e-d826f0f3e1d4', 'Jason', 'Dev', 'markjasongalang.work@gmail.com', 'jason_dev', '$2y$10$5dGgCtnWg0DNT4IwRN1pg.WW1vvWnxab59g4qhC8I0ujwC7qpXAl6', 1, '2024-10-05 03:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `verification_codes`
--

CREATE TABLE `verification_codes` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(6) NOT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verification_codes`
--

INSERT INTO `verification_codes` (`id`, `email`, `code`, `expires_at`, `is_verified`) VALUES
(1, 'markjasongalang.work@gmail.com', '327955', '2024-10-05 03:59:11', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `library_images`
--
ALTER TABLE `library_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `library_id` (`library_id`);

--
-- Indexes for table `newsletter_subs`
--
ALTER TABLE `newsletter_subs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `verification_codes`
--
ALTER TABLE `verification_codes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `library_images`
--
ALTER TABLE `library_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `newsletter_subs`
--
ALTER TABLE `newsletter_subs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verification_codes`
--
ALTER TABLE `verification_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `libraries`
--
ALTER TABLE `libraries`
  ADD CONSTRAINT `libraries_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `library_images`
--
ALTER TABLE `library_images`
  ADD CONSTRAINT `library_images_ibfk_1` FOREIGN KEY (`library_id`) REFERENCES `libraries` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
