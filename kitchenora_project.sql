-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2025 at 10:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kitchenora_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands_tb`
--

CREATE TABLE `brands_tb` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands_tb`
--

INSERT INTO `brands_tb` (`brand_id`, `brand_name`) VALUES
(2, 'Whirlpool'),
(3, 'Bosch'),
(4, 'Panasonic'),
(5, 'BLACK+DECKER'),
(6, 'Singer'),
(7, 'Swan');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details_tb`
--

CREATE TABLE `cart_details_tb` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories_tb`
--

CREATE TABLE `categories_tb` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories_tb`
--

INSERT INTO `categories_tb` (`category_id`, `category_name`) VALUES
(8, 'Cooking Appliances'),
(9, 'Food Preparation'),
(10, 'Cleaning Appliances'),
(11, 'Refrigeration'),
(12, 'Beverage Appliances');

-- --------------------------------------------------------

--
-- Table structure for table `products_tb`
--

CREATE TABLE `products_tb` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_keyword` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_price` int(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_tb`
--

INSERT INTO `products_tb` (`product_id`, `product_name`, `product_description`, `product_keyword`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_price`, `date`, `status`) VALUES
(1, ' Whirlpool MagiCook Solo Microwave Oven 20BS - 20L', 'Type: Microwave Oven. Capacity:20L.  Main Functions: Microwave. Cooking Timer: Yes. Power Levels:10 Power Levels. Output Power (Microwave): 700W. Power Consumption (Microwave): 1200W. Defrost By Weight Or Time: Defrost Function.', 'oven, microvave', 8, 2, 'WP-MW20-BS-01.webp', 'WP-MW20-BS-04.webp', 29990, '2025-07-06 09:18:12', 'true'),
(2, ' Bosch Built-In Electric Oven BC-HBF031BR0I ................', 'Type: Built-In Oven. Oven Capacity: 66L. Grill	: Yes. Convention Cooking: Yes. Bottom Heating: No. Combination Cooking: No. Microwave Cooking: No. Temperature Range:50 °C - 275 °C. Fan Assisted Cooking: Yes.', 'electric oven, oven, bosch', 8, 3, 'BC-HBF031BR0I-01.webp', 'BC-HBF031BR0I-02.webp', 299999, '2025-07-06 10:00:19', 'true'),
(3, ' Panasonic Value Series 3 Jar Mixer Grinder MX-GE3750 - 750W', '*Type:  Mixer Grinders. *Motor Capacity / Power / Wattage:  750 W Powerful Motor for Efficient Grinding. *Number Of Jars:  Rust Resistant , Stainless-Steel, Strong Jars & Blades 03 Jars. *Jar Capacity:  Blender Jar 1.5L / Mill Jar 1.0L / Chutney Jar 0.4L. *Speed:  20,000 RPM. *Speed Control: NEW ROTARY SWITCH Move from Pulse, 1,2 &3 with Ease. *Blade Types	Strong Hardened Samurai Blade. *Design:  All New Vertical Symmetry Body Shape. *Buttons:  New rotary swtich. *Safety / Protection:  Easy to Clean Gasket Free Lid for Better usage. *Ideal/Suitable For:  Domestic Use. *Attachments:  Rust Resistant , Stainless-Steel, Strong Jars & Blades 03 Jars. *Color:  Black. Other Information:  High Power Air Flow Motor for Enhanced Durability.', 'blender, electric blender, mixer', 9, 4, 'PN-MX-GE3750-01.webp', 'PN-MX-GE3750-02.webp', 24999, '2025-07-06 10:53:23', 'true'),
(4, ' BLACK+DECKER Conceled Coil Kettle Promo JC70-B5 - 1.7L', '*Type:  Kettles. *Power / Wattage: 2200W. *Capacity:  1.7L. *Special Features:  ‎Remov, Automatic Shut Off, Cordless. *Dimensions: 18.8 x 26.2 x 19.6 cm. *Weight:  ‎960 g', 'kettle, electric kettle', 9, 5, 'BD-JC70-B5-01.webp', 'BD-JC70-B5-02.webp', 11900, '2025-07-06 11:52:05', 'true'),
(5, ' BOSCH IOT Enabled Free-Standing Dishwasher SMS6HVI00I - 9.5L', '*Type:  Free Standing Dishwasher. *Motor / Power / Wattage:  0.92 kWh. *Water Consumption: 9.5L. *Noise Level:  48 Db. *Number of Programs:  6 Programs: Intensive Kadhai 70 °C, Express Sparkle 65 °C, Auto 45-65 °C, Eco 50 °C, Prerinse, Custom programme.  *Automatic Wash:  Yes. *Cutlery Drawer:  Yes. *Basket Layers:  Rackmatic 3-Stage Basket: Adjustable Upper Rack, 2 Cup Shelves In Top Basket, 4x Flip Tines In Lower Basket, 2x Flip Tines In Upper Basket. *Body / Surface Material: Brushed Steel. *Place Setting Capacity:  14 Place-Setting Capacity. *Safety / Protection: Child Lock Available For Control Panel, Door Latch. *Eco Settings / Energy Efficiency Class. *Eco Wash, A+++. *Ideal/Suitable For: Home', 'dishwasher, washer, dish', 10, 3, 'BC-SMS6HVI00I-01.webp', 'BC-SMS6HVI00I-03.webp', 449999, '2025-07-06 12:01:24', 'true'),
(6, ' Singer Digital Inverter Refrigerator SN-SMI-295G - Tempered Glass Door, 277L', '*Capacity:  277L. * Compressor/Inverter/Non Inverter:  Inverter. *Refrigerant:  R600A Gas. *Technology:  No Frost - Digital Inverter. *Colour / Finish:  Black. *Door Type / Finish:  Mirror Finish - Tempered Glass Door. *Digital Display:  No. *Controls:  Electronic Thermostat. *Dispenser:  No. *Interior - Number Of Shelves:  3. *Interior - Number Of Door Compartments: Two. *Interior - Interior Light:  LED Lighting - Ultra Bright And Long Lasting. *Door Open Alarm:  No. *Energy Efficiency: Smart Energy Saver. *Climate Class: Tropical. *Inner Body Type: ABS. *Outer Body Type: *PCM Sheet. *Condenser Type (Out/Inside):  Inside Copper Condenser. *Remote Control:  No. *Power Source / Voltage:  220V/50Hz. *Capacity (Gross/Net):  277L/260L. *Dimensions(Gross/Net):  1530 x 580 x 620 mm. *Weight (Gross/Net):  60kg (Gross) / 56kg (Net). *Other Information:  Ambient Temperature Detector, Load Detection, Humidity Controller', 'fridge, refrigerator, freezer', 11, 6, 'SN-SMI-295G-02.webp', 'SN-SMI-295G-03.webp', 189999, '2025-07-06 12:14:10', 'true'),
(7, ' Singer Chest Freezer Inverter, 576L ...............................', '*Capacity:  576L (Net). *Compressor/Inverter/Non Inverter:  Inverter. *Refrigerant:  R290. *Technology:  Direct Cooling. *Colour / Finish:  Gray. *Number Of Doors:  Two. *Door Type / Finish:  Hard top doors. *Interior - Number Of Door Compartments:  One. *Door Lock:  Yes. *Temperature:  -18Â°C. *Climate Class:  T. *Inner Body Type:  Pre-painted steel. *Outer Body Type:  Powder coated finish. *Condenser Type (Out/Inside):  Inside. *Compressor Warranty:  3 years. *Comprehensive Warranty:  1 year. *Power Consumption:  4.8Kw/24h. *Power Source / Voltage:  220~240V/50Hz. *Dimensions(Gross/Net):  1930*710*825mm (Net)', 'freezer, fridge', 11, 6, 'SDF-650I-01_zoom.webp', 'SDF-650I-01_zoom.webp', 199999, '2025-07-06 12:27:45', 'true'),
(8, ' Swan Grind Coffee Maker - SK65010N ..............................', '*Type:  Grinder Coffee Maker. *Power / Wattage:  1100W. *Coffee Jug Material:  Stainless Steel, Metal. *Capacity:  450 ml. *Indicators:  Water Level Indicator. *Design:  Retro Design. *Safety / Protection: Automatic Shut Off. *Ideal/Suitable For:  Coffee Lovers. *Dishwasher Safe:  Yes. *Color:  Black. *imensions:  18.5D x 29.2W x 39.2H centimetres. *Weight:  2.37 kg. *Other Information:  Both Coffee Beans and Pre-ground Coffee / Hold upto 28g of Coffee Beans', 'coffee, maker, coffee maker, cofi', 12, 7, 'SW-SK65010N-01.webp', 'SW-SK65010N-03.webp', 29449, '2025-07-06 19:05:57', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands_tb`
--
ALTER TABLE `brands_tb`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details_tb`
--
ALTER TABLE `cart_details_tb`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories_tb`
--
ALTER TABLE `categories_tb`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products_tb`
--
ALTER TABLE `products_tb`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands_tb`
--
ALTER TABLE `brands_tb`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart_details_tb`
--
ALTER TABLE `cart_details_tb`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories_tb`
--
ALTER TABLE `categories_tb`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products_tb`
--
ALTER TABLE `products_tb`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_details_tb`
--
ALTER TABLE `cart_details_tb`
  ADD CONSTRAINT `cart_details_tb_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products_tb` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `products_tb`
--
ALTER TABLE `products_tb`
  ADD CONSTRAINT `products_tb_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories_tb` (`category_id`),
  ADD CONSTRAINT `products_tb_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands_tb` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
