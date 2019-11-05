-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2019 at 08:53 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `renthouse_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `main_features` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_communication` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `security` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_facilities` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `property_id`, `main_features`, `business_communication`, `security`, `other_facilities`, `created_at`, `updated_at`) VALUES
(1, 2, 'View: East, Balcony or Terrace, Flooring: Tiles, Freehold', NULL, NULL, 'Pet Policy: Not Allowed, Maintenance Staff', '2019-10-09 14:52:37', '2019-10-09 15:27:57'),
(2, 3, 'View: West, Balcony or Terrace, Flooring: Tile, Freehold', NULL, NULL, 'Pet Policy: Not Allowed, Maintenance Staff', '2019-10-09 14:55:01', '2019-10-09 15:27:54'),
(3, 4, 'View: North, Balcony or Terrace, Lobby in Building, Electricity Backup', NULL, 'CCTV Security', 'Pet Policy: Not Allowed, Maintenance Staff', '2019-10-09 15:03:00', '2019-10-09 15:27:45'),
(4, 8, 'View: South, Balcony or Terrace, Lobby in Building, Electricity Backup', 'Intercom', 'CCTV Security', 'Pet Policy: Not Allowed, Maintenance Staff', '2019-10-10 04:55:27', '2019-10-10 04:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `contact`, `description`, `p_id`, `created_at`, `updated_at`) VALUES
(1, 'SAN Ratul', '01521463853', 'gfdgdgfd', 3, '2019-11-01 10:52:19', '2019-11-01 10:52:19'),
(2, 'Ratul', '01303002409', 'I want to know more about this property and can the rent be nagotiable', 8, '2019-11-05 13:30:25', '2019-11-05 13:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_10_08_095644_add_admin_to_users_table', 3),
(7, '2019_10_09_165241_create_amenities_table', 4),
(8, '2019_10_02_140547_create_properties_table', 5),
(9, '2019_10_31_190317_create_messages_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `bed` int(11) NOT NULL,
  `bath` int(11) NOT NULL,
  `purpose` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `location`, `rent`, `area`, `bed`, `bath`, `purpose`, `type`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'An Apartment Is Ready For Rent At South Banasree Project, Near South Banasree Central Jame Masjid.', 'South Banasree Project, Banasree, Dhaka', 20000, 1450, 3, 3, 'For Rent', 'Apartment', 'The corresponding flat for rent have the facilities that come along with this splendid building. A large and airy living space is sited in that flat having ample space to place your enjoyable family times. The flat also assures the best quality washroom fittings for guaranteeing healthy hygiene. The flat for rent provides the exact comfortable living that you have been looking for.\r\n\r\n1 months advance\r\n\r\nFeel free to contact us to know more about this apartment.', '/property/Apartment/1570470834.jpg', '2019-10-07 05:53:54', '2019-10-07 05:53:54'),
(3, 'An Apartment Is Ready For Rent At South Banasree Project, Near South Banasree Central Jame Masjid.', 'South Banasree Project, Banasree, Dhaka', 8000, 600, 2, 1, 'For Rent', 'Apartment', 'This beautiful apartment is located in Banasree. Each fittings of this property has got the fixtures installed with the high durability guarantee. All-time security, ample parking space are some other benefits worth mentioning for this flat.\r\n\r\n1 month advance,\r\n\r\nIf you liked this flat, call us right away', '/property/Apartment/1570471649.jpg', '2019-10-07 06:07:31', '2019-10-07 06:07:31'),
(4, 'An Apartment Is Ready For Rent At South Banasree Project, Near South Banasree Central Jame Masjid.', 'South Banasree Project, Banasree, Dhaka', 13000, 1000, 3, 3, 'For Rent', 'Apartment', 'A wonderful locality to settle with family the locality here is that kind so the house seekers who are planning to shift to one of the friendliest neighborhood in the city, deserve a worthy update. South Banasree Project is offering a flat which covers a spacious area in the respective locality featuring airy space for pleasant living. An impressive entrance leads to the generous and airy rooms. For your cooking needs, you would find a convenient kitchen just right next to the dining area. You would also have balconies for unwinding in your morning and evening hours.\r\n\r\n1 month advance,', '/property/Apartment/1570526280.jpg', '2019-10-07 21:03:37', '2019-10-09 09:29:12'),
(5, 'VisitThis Apartment For Sale In Uttara Near 10 Number Sector Masjid.', 'Sector 5, Uttara, Dhaka', 14500000, 1710, 3, 4, 'For Sale', 'Apartment', 'Ready to move in somewhere with everything nearby? This apartment bears all the necessary facilities that you look for in a flat and more. There are many facilities in the flat that are required to live at ease. Utility supplies are always available and security services are present at all times for ensuring the safety of the inhabitants. The washroom and kitchen come with all the modern fixtures. A large parking space is there that comes with the offered flat. The flat is well secured with the availability of all types of utilities.\r\n\r\n1 parking available\r\n\r\nDon’t miss this remunerative offer and we are just a call away to close the deal for you!', '/property/Apartment/1570635386.jpg', '2019-10-09 03:36:26', '2019-10-09 03:50:27'),
(6, 'Visit This Apartment For Sale In West Rampura Near Mercantile Bank Limited.', 'West Rampura, Rampura, Dhaka', 5287500, 1175, 3, 2, 'For Sale', 'Apartment', 'This wonderful flat covers an area of is situated in this notable building that you can see in our enlisted image. It can be a perfect home for your family which comes within your affordability. All the rooms are well spacious and lets you have the whole feel of solace and calmness with closed ones. This nice apartment is surely a reasonable deal for you comparing to the area the home is situated. The locality has a wide variety of schools, colleges, Universities, hospitals and shops. An ample parking space comes with the offered flat for your vehicle accommodation.\r\n\r\nparking 400000\r\n\r\nCome and see this apartment Contact us at your earliest to know more about this apartment.', '/property/Apartment/1570636377.jpg', '2019-10-09 03:52:57', '2019-10-09 03:52:57'),
(7, 'Visit This Apartment For Sale In Mirpur Near Mirpur 10 No Market Masjid', 'Section 10, Mirpur, Dhaka', 7000000, 900, 2, 2, 'Sold Out', 'Apartment', 'Introducing you with one of the best properties vacant for your next living. The correspondent apartment completed with a very strong and wonderful floor plan. The flat for sale provides the exact comfortable lifestyle that you have been looking for. Covers area as a whole the flat also has facilities that come along with this edifice. One allotted parking space would come along with this beautiful flat.\r\n\r\n\r\nContact us at your earliest to know more about this apartment.', '/property/Apartment/1570636480.jpg', '2019-10-09 03:54:40', '2019-10-09 03:54:40'),
(8, 'An Apartment Is Ready For Rent At Khilgaon , Near Khilgaon Government High School.', 'Chowdhuripara, Khilgaon, Dhaka', 25000, 1100, 3, 3, 'For Rent', 'Apartment', 'This flat located in the amazing location of Khilgaon which is very convenient as many groceries and school, colleges are located in the nearby area. The flat provides spacious rooms with attached washrooms which are built-in with the most elite lavatory fittings. There are balconies that provide you with the need for revitalizing your mind with a salient view of the area. Accessible transportation sources like Rickshaw, CNG and bus stops are available in the nearby location.\r\n\r\nFeel free to contact us to know further about this property.', '/property/Apartment/1570704881.jpg', '2019-10-09 22:54:41', '2019-10-09 22:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact_no`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `admin`) VALUES
(1, 'SAN Ratul', 'san.ratul002@gmail.com', '01303002409', '2019-10-02 05:46:47', '$2y$10$RL49XwblZTLThnzjigbLV.mA5TjPdX3hK0dA5s8f9VsmwhTTHzOoG', NULL, '2019-10-02 05:23:12', '2019-10-02 05:46:47', 1),
(2, 'Sadia Tanzin Neela', 'san.ratul001@gmail.com', '01621482563', '2019-10-08 04:18:51', '$2y$10$Isa6e4qe3BicKNG./mqA7uWKQSMR5MkhpcqerQco5V4EaIIggz8/a', NULL, '2019-10-08 04:17:47', '2019-10-08 04:18:51', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `amenities_property_id_foreign` (`property_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_p_id_foreign` (`p_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_contact_no_unique` (`contact_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `amenities`
--
ALTER TABLE `amenities`
  ADD CONSTRAINT `amenities_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_p_id_foreign` FOREIGN KEY (`p_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
