-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 08:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `craveins_db`
--
CREATE DATABASE IF NOT EXISTS `craveins_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `craveins_db`;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `email_address` varchar(255) NOT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`email_address`, `restaurant_id`) VALUES
('lebron@gmail.com', 3),
('lebron@gmail.com', 4),
('mamodia78@gmail.com', 4),
('kmamodia@gmail.com', 11),
('kmamodia@gmail.com', 12),
('kmamodia@gmail.com', 2),
('kmamodia@gmail.com', 6),
('kmamodia@gmail.com', 8),
('itot@gmail.com', 4),
('lebron@gmail.com', 2),
('kmamodia@gmail.com', 10),
('kmamodia@gmail.com', 13),
('pitoy@gmail.com', 4),
('pitoy@gmail.com', 3),
('kurtamodia@gmail.com', 2),
('kurtamodia@gmail.com', 5),
('lebron@gmail.com', 15),
('lebron@gmail.com', 12),
('lebron@gmail.com', 8),
('lebron@gmail.com', 19),
('lebron@gmail.com', 9),
('itot@gmail.com', 2),
('admin@gmail.com', 4),
('admin@gmail.com', 2),
('admin@gmail.com', 10),
('admin@gmail.com', 5),
('admin@gmail.com', 8);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `restaurant_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`restaurant_id`, `menu_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 7),
(2, 8),
(2, 12),
(2, 17),
(2, 19),
(3, 3),
(3, 9),
(3, 10),
(3, 12),
(4, 3),
(4, 8),
(4, 9),
(4, 17),
(4, 18),
(5, 17),
(5, 18),
(5, 19),
(5, 21),
(6, 10),
(6, 13),
(6, 22),
(6, 10),
(7, 7),
(7, 9),
(7, 2),
(7, 12),
(7, 20),
(7, 22),
(8, 4),
(8, 5),
(8, 6),
(8, 11),
(9, 4),
(9, 5),
(9, 6),
(9, 17),
(9, 19),
(10, 15),
(10, 9),
(10, 10),
(11, 4),
(11, 5),
(11, 6),
(11, 11),
(12, 1),
(12, 2),
(12, 8),
(12, 9),
(12, 10),
(12, 12),
(12, 14),
(12, 12),
(12, 20),
(13, 9),
(13, 10),
(13, 15),
(14, 18),
(14, 17),
(14, 11),
(14, 4),
(14, 5),
(15, 10),
(15, 7),
(15, 23),
(16, 20),
(16, 2),
(16, 10),
(17, 24),
(17, 20),
(17, 10),
(17, 9),
(18, 3),
(18, 9),
(19, 24),
(19, 23),
(19, 15),
(19, 10),
(19, 9),
(3, 15),
(5, 5),
(6, 16),
(6, 14),
(10, 24),
(10, 22),
(11, 21),
(13, 20),
(13, 2),
(15, 22),
(15, 16),
(16, 19),
(16, 18),
(16, 17),
(17, 11),
(17, 12),
(17, 13),
(18, 11),
(18, 15),
(18, 24);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `menu_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`menu_id`, `image_path`, `name`, `price`, `description`) VALUES
(1, '../images/FOOD IMAGES\\GRILLED_POTATO.jfif', 'Grilled Marble Potato', '₱40/per serving', 'Grilled Marble Potatoes with their crispy, slightly charred outsides & soft, sweet insides, will be your most requested side this summer!'),
(2, '../images/FOOD IMAGES\\CHICKEN_CURRY.png', 'Chicken Curry', '₱50/per serving', 'Chicken Curry stewed in coconut milk and curry spices is a hearty and tasty dish the whole family'),
(3, '../images/FOOD IMAGES\\BUTTER_CHICKEN.jfif', 'Butter Chicken', '₱60/per serving', 'Aromatic golden chicken pieces in an incredible creamy curry sauce!'),
(4, '../images/FOOD IMAGES\\CARAMEL_MACCHIATO.jpg', 'Caramel Macchiato', '₱150', 'This iced caramel macchiato is made with cold brew coffee and milk, vanilla syrup, and a drizzle of caramel sauce for a sweet and creamy taste.'),
(5, '../images/FOOD IMAGES\\ICED_VANILLA_LATTE.jpg', 'Iced Vanilla Latte', '₱150', ' An iced vanilla latte is a cold espresso drink made up of espresso, vanilla syrup, and milk '),
(6, '../images/FOOD IMAGES\\CARAMEL_FRAPPE.png', 'Caramel Frappe', '₱150', 'Blends caramel flavor with a hint of coffee & is topped with whipped topping & caramel drizzle.'),
(7, '../images/FOOD IMAGES\\GINATAANG_GULAY.jfif', 'Ginataang Gulay', '₱30/per serving', 'Ginataang Gulay is a hearty vegetable stew with pork and shrimp cooked in coconut milk.'),
(8, '../images/FOOD IMAGES\\PORK_STEAK.jfif', 'Pork Steak', '₱50/per serving', 'A Filipino pork dish marinated and cooked in soy sauce and lemon with onions.'),
(9, '../images/FOOD IMAGES\\FRIED_CHICKEN.jfif', 'Fried Chicken', '₱40/per serving', 'A dish consisting of chicken pieces that have been coated with seasoned flour or batter that is pan-fried or deep fried.'),
(10, '../images/FOOD IMAGES\\LUMPIA.jfif', 'Lumpia', '₱20/5 pcs', 'Filipino fried spring rolls filled with ground pork and mixed vegetables. '),
(11, '../images/FOOD IMAGES\\ICED_COFFEE.jpg', 'Iced Coffee', '₱100', 'A coffee beverage served cold.'),
(12, '../images/FOOD IMAGES\\CHOPSUEY.jfif', 'Chopsuey', '₱40/per serving', 'Chop suey is a dish made using a variety of veggies including snow peas, young corn, cabbage, and bell peppers.'),
(13, '../images/FOOD IMAGES\\SIOPAO.jfif', 'Siopao', '₱45', 'a Filipino steamed bun that is filled with sweet chicken or pork asado fillings'),
(14, '../images/FOOD IMAGES\\HALO_HALO.jfif', 'Halo-Halo', '₱50', 'A Filipino-style shaved ice made with sweetened beans, fruits, and jellies and topped with milk, Leche flan,and purple yam jam'),
(15, '../images/FOOD IMAGES\\SISIG.jfif', 'Sisig', '₱90', 'A Filipino dish made from pork jowl and ears(maskara), pork belly, and chicken liver which is usually seasoned with calamansi, onions, and chili peppers.'),
(16, '../images/FOOD IMAGES\\BATCHOY.jfif', 'Batchoy', '₱60/per serving', 'A soup dish composed of sliced pork, and miki noodles.'),
(17, '../images/FOOD IMAGES\\FARFELLE_PASTA.png', 'Farfelle Pasta', '₱120', 'Farfelle Pasta mixed with olive oil and topped with roasted tomatoes and basil.'),
(18, '../images/FOOD IMAGES\\PEPPERONI_PIZZA.png', 'Pepperoni Pizza', '₱40/slice', 'Pizza topped with pepperoni, olives, bell pepper and mozarella cheese.'),
(19, '../images/FOOD IMAGES\\RED_VELVET_CAKE.jpg', 'Red Velvet Cake', '₱100/slice', 'Red, crimson, or scarlet-colored layer cake, layered with ermine icing.'),
(20, '../images/FOOD IMAGES\\ADOBO.jpg', 'Adobo', '₱60/per serving', 'Pork cooked in soy sauce, vinegar, and garlic'),
(21, '../images/FOOD IMAGES\\NACHOS.jpg', 'NACHOS', '₱100', 'A tortilla chip topped with melted cheese and often additional savory toppings'),
(22, '../images/FOOD IMAGES\\SIOMAI.jpg', 'SIOMAI', '₱35', 'Made of delicious steamed pork meatball wrapped in soft molo wrapper'),
(23, '../images/FOOD IMAGES\\EGG_OMELETTE.jpg', 'Egg Omelette', '₱30', 'A dish made from beaten eggs, fried with butter or oil in a frying pan'),
(24, '../images/FOOD IMAGES\\PANSIT.jpg', 'PANSIT', '25/per serving', 'Stir-fried rice noodle dish with a savory sauce, pork and vegetables');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `email_address`, `restaurant_id`, `rating`, `review`) VALUES
(1, 'kaamodia@up.edu.ph', 3, 5, 'First Review'),
(2, 'somebody@gmail.com', 2, 5, 'Nice one'),
(3, 'somebody@gmail.com', 2, 3, 'Nice one'),
(4, 'somebody@gmail.com', 2, 4, 'Nice one'),
(5, 'somebody@gmail.com', 3, 5, 'Nice one'),
(6, 'somebody@gmail.com', 3, 5, 'Nice one'),
(7, 'somebody@gmail.com', 4, 3, 'Nice one'),
(8, 'somebody@gmail.com', 5, 5, 'Nice one'),
(9, 'somebody@gmail.com', 5, 5, 'Nice one'),
(10, 'somebody@gmail.com', 5, 5, 'Nice one'),
(11, 'somebody@gmail.com', 5, 5, 'Nice one'),
(12, 'somebody@gmail.com', 5, 3, 'Nice one'),
(13, 'somebody@gmail.com', 6, 1, 'Nice one'),
(14, 'somebody@gmail.com', 6, 2, 'Nice one'),
(15, 'somebody@gmail.com', 7, 5, 'Nice one'),
(16, 'somebody@gmail.com', 8, 5, 'Nice one'),
(17, 'somebody@gmail.com', 8, 2, 'Nice one'),
(18, 'somebody@gmail.com', 9, 5, 'Nice one'),
(19, 'somebody@gmail.com', 9, 3, 'Nice one'),
(20, 'somebody@gmail.com', 9, 4, 'Nice one'),
(21, 'somebody@gmail.com', 9, 1, 'Nice one'),
(22, 'somebody@gmail.com', 10, 5, 'Nice one'),
(23, 'somebody@gmail.com', 10, 4, 'Nice one'),
(24, 'somebody@gmail.com', 11, 5, 'Nice one'),
(25, 'somebody@gmail.com', 11, 5, 'Nice one'),
(26, 'somebody@gmail.com', 11, 5, 'Nice one'),
(27, 'somebody@gmail.com', 12, 4, 'Nice one'),
(28, 'somebody@gmail.com', 13, 3, 'Nice one'),
(29, 'somebody@gmail.com', 13, 4, 'Nice one'),
(30, 'somebody@gmail.com', 13, 5, 'Nice one'),
(31, 'somebody@gmail.com', 13, 4, 'Nice one'),
(32, 'somebody@gmail.com', 13, 3, 'Nice one'),
(33, 'somebody@gmail.com', 14, 5, 'Nice one'),
(34, 'somebody@gmail.com', 15, 5, 'Nice one'),
(35, 'somebody@gmail.com', 15, 3, 'Nice one'),
(36, 'somebody@gmail.com', 16, 3, 'Nice one'),
(37, 'somebody@gmail.com', 16, 3, 'Nice one'),
(38, 'somebody@gmail.com', 16, 3, 'Nice one'),
(39, 'somebody@gmail.com', 17, 4, 'Nice one'),
(40, 'somebody@gmail.com', 18, 2, 'Nice one'),
(41, 'somebody@gmail.com', 18, 3, 'Nice one'),
(42, 'somebody@gmail.com', 19, 1, 'Nice one'),
(43, 'somebody@gmail.com', 19, 1, 'Nice one'),
(44, 'somebody@gmail.com', 19, 4, 'Nice one'),
(45, 'somebody@gmail.com', 18, 5, 'Nice one'),
(46, 'kaamodia@up.edu.ph', 3, 5, '26th review'),
(49, 'kaamodia@up.edu.ph', 2, 5, 'menu'),
(50, 'somebody@gmail.com', 3, 2, 'AKO SI BATUMBAKAL'),
(51, 'somebody@gmail.com', 4, 5, 'luis magtoto'),
(52, 'kmamodia@gmail.com', 14, 2, 'ako si kurt'),
(53, 'lebron@gmail.com', 4, 5, 'my name is lebron james'),
(54, 'lebron@gmail.com', 10, 1, 'this is the third review'),
(55, 'lebron@gmail.com', 7, 3, 'manang betch lebron james'),
(56, 'lebron@gmail.com', 6, 5, 'namit ang buko shake'),
(57, 'lebron@gmail.com', 5, 1, 'lebron james pizza'),
(58, 'lebron@gmail.com', 3, 2, '6th review for vnyard'),
(59, 'kmamodia@gmail.com', 11, 5, 'I love mocha frappe'),
(60, 'kmamodia@gmail.com', 2, 5, 'i am jeff'),
(61, 'lebron@gmail.com', 4, 1, 'i am lebron'),
(62, 'kurtamodia@gmail.com', 2, 5, 'I am a new reviewer'),
(63, 'kurtamodia@gmail.com', 4, 5, 'I have a new profile picture'),
(64, 'kurtamodia@gmail.com', 4, 1, 'I will bring down the rating'),
(65, 'lebron@gmail.com', 4, 5, 'new review'),
(66, 'lebron@gmail.com', 3, 4, 'new review by me'),
(67, 'lebron@gmail.com', 15, 5, 'deserves a 5 star rating'),
(68, 'lebron@gmail.com', 5, 5, 'i am grooot'),
(69, 'lebron@gmail.com', 19, 5, '5 stars'),
(70, 'admin@gmail.com', 4, 5, 'new customer here'),
(71, 'lebron@gmail.com', 4, 1, 'fake pizza'),
(72, 'lebron@gmail.com', 2, 1, '7th review');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurant_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `open_time` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `start_price` decimal(10,2) DEFAULT NULL,
  `last_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restaurant_id`, `name`, `address`, `open_time`, `description`, `banner`, `tags`, `landmark`, `category`, `start_price`, `last_price`) VALUES
(2, 'Nabis Kitchen', 'Hollywood Street, Mat-Y, Miagao, Iloilo', '9:00 AM - 9:00 PM', 'Nabi’s Kitchen is a hybrid cafeteria that caters to the budget of students \nwhile ensuring affordable and delicious meals.', '../images/restaurant_banners/nabis.jpg', 'drinks, meal, coffee', 'Hollywood Street', 'Cafe', '30.00', '120.00'),
(3, 'VNYARD', 'Corner Mueda St. and Nonato St. Brgy. Baybay Sur, Miagao', '9:00 AM - 9:00 PM', 'VNYARD: Where delectable cuisine and intellectual ambiance intertwine, inviting guests to indulge in culinary delights while surrounded by a scholarly atmosphere.', '../images/restaurant_banners/vnyard.jpg', 'chicken, pork', 'Baybay Sur', 'Carinderia', '20.00', '90.00'),
(4, 'Red Table', 'Baybay Sur Miagao Iloilo (Beside Vince\'s Tapsi)', '10:00 AM - 9:00 PM', 'Welcome to Red Table, the authentic Italian pizza restaurant that will transport your taste buds straight to the streets of Naples. Nestled in the heart of Italy\'s culinary capital, our cozy pizzeria offers a warm and inviting ambiance where food and family come together.', '../images/restaurant_banners/redtable.jpg', 'pizza, pasta', 'Baybay Sur', 'Snack Haus, Pizzeria', '40.00', '120.00'),
(5, 'Scholars Lounge', '2nd floor, Firmeza-Adviento Bldg., Quezon St., Miagao', '10:00 AM - 3:00 AM', 'Scholars Lounge: Where delectable cuisine and intellectual ambiance intertwine, inviting guests to indulge in culinary delights while surrounded by a scholarly atmosphere.', '../images/restaurant_banners/lounge.jpg', 'pizza, drinks, meal', 'Miagao Church', 'Restaurant', '40.00', '150.00'),
(6, 'Sam and Corbiez', 'CDH, UPV', '10:00 AM - 9:00 PM', 'Sam and Corbiez is a delightful snacks place offering a tempting array of savory and sweet bites that will satisfy every craving.', '../images/restaurant_banners/sam.jpg', 'shake, drinks', 'UPV Covered Court', 'Snack Haus', '20.00', '60.00'),
(7, 'Manang Betch', 'College Union Building, UPV', '8:00 AM - 6:00 PM', 'Manang Betch - Carinderia: A beloved eatery serving authentic Filipino dishes with a home-cooked touch.', '../images/restaurant_banners/manang.jpg', 'meal, chicken', 'UPV New Admin, UPV CAS, UPV SOTECH', 'Carinderia', '30.00', '60.00'),
(8, 'KapeYan', 'College Union Building, UPV', '10:00 AM - 5:00 PM', 'A charming coffee haven that delights taste buds with its aromatic brews and cozy ambiance.', '../images/restaurant_banners/kape.jpg', 'coffee, donut, drinks', 'UPV New Admin, UPV CAS, UPV SOTECH', 'Cafe', '100.00', '150.00'),
(9, 'Beans and Bubbles', 'Barangay Mat-y , Miagao', '10:00 AM - 5:00 PM', 'A charming coffee shop that combines rich, aromatic brews with delightful sparkling beverages in a cozy and inviting atmosphere.', '../images/restaurant_banners/beans.jpg', 'coffee, cake, cookies', 'Miagao Church', 'Cafe, Bakery', '100.00', '150.00'),
(10, 'Sisig House', 'Box 1 UPV, Zulueta Avenue, Brgy. Sapa, Sapa-Miagao', '8:00 AM - 10:00 PM', 'Sisig House is a vibrant sisig restaurant offering a tantalizing fusion of flavors that celebrate the rich heritage of Filipino cuisine.', '../images/restaurant_banners/sisig.jpg', 'sisig, meal', 'UPV CFOS, UPV New Admin', 'Restaurant', '20.00', '90.00'),
(11, 'U Frappe', 'Box 1 UPV, Zulueta Avenue, Brgy. Sapa, Sapa-Miagao', '8:00 AM - 8:00 PM', 'A vibrant and inviting eatery serving a delightful blend of refreshing frappes and scrumptious snacks.', '../images/restaurant_banners/ufrappe.jpg', 'drinks', 'UPV CFOS, UPV New Admin', 'Snack Haus', '100.00', '150.00'),
(12, 'Spharks Grill', 'Hollywood Street, Mat-Y, Miagao', '6:00 AM - 9:00 PM', 'Spharks Grill - Carinderia is a vibrant eatery offering mouthwatering Filipino cuisine with a modern twist.', '../images/restaurant_banners/spharks.jpg', 'meal', 'UPV Covered Court', 'Carinderia', '20.00', '60.00'),
(13, 'Heavens Bliss', 'Hollywood Street, Mat-Y, Miagao', '6:00 AM - 9:00 PM', 'Heavens Bliss is a celestial culinary oasis offering divine flavors and a tranquil dining experience.', '../images/restaurant_banners/heaven.jpg', 'meal, drinks', 'Hollywood Street', 'Restaurant', '20.00', '60.00'),
(14, 'Into the Woods', 'Hollywood Street, Mat-Y, Miagao', '6:00 AM - 9:00 PM', 'Into the Woods Cafe: A charming woodland-inspired eatery serving delightful fare in a cozy and enchanting atmosphere.', '../images/restaurant_banners/woods.jpg', 'drinks', 'Hollywood Street', 'Cafe', '40.00', '150.00'),
(15, 'Meldens', 'Hollywood Street, Mat-Y, Miagao', '6:00 AM - 9:00 PM', 'A humble eatery serving delicious Filipino home-style dishes with a touch of warmth and authenticity.', '../images/restaurant_banners/meldens.jpg', 'meal', 'Hollywood Street', 'Carinderia', '20.00', '60.00'),
(16, 'Kandingan sa Tacas', 'Tajanlangit St. Miagao', '6:00 AM - 8:00 PM', 'A charming eatery in Tacas that offers delectable Filipino cuisine with a focus on succulent grilled meats.', '../images/restaurant_banners/kandingan.jpg', 'kanding, pecho, unli rice', 'Miagao Church', 'Restaurant', '20.00', '120.00'),
(17, 'Piging', 'Brgy. Sapa , Miagao', '10:00 AM - 9:00 PM', 'A delectable haven for pork enthusiasts, offering a diverse range of mouthwatering dishes showcasing the exceptional flavors of pig-inspired cuisine.', '../images/restaurant_banners/piging.jpg', 'meal', 'UPV CFOS, UPV New Admin', 'Restaurant', '20.00', '100.00'),
(18, 'Captain Wings', 'Brgy. Sapa , Miagao', '10:00 AM - 9:00 PM', 'Captain Wings - Restaurant: A culinary haven for wing enthusiasts, serving up mouthwatering flavors and crispy delights that take taste buds on a soaring adventure.', '../images/restaurant_banners/wings.jpg', 'chicken', 'UPV CFOS, UPV New Admin', 'Restaurant', '25.00', '100.00'),
(19, 'Vinz Tapsi', 'Baybay , Miagao', '10:00 AM - 9:00 PM', 'Vinz Tapsi - Restaurant: A delightful fusion of Filipino and Western flavors served with a touch of warmth and nostalgia.', '../images/restaurant_banners/vinz.jpg', 'meal', 'Baybay Sur', 'Restaurant', '20.00', '90.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `birthdate` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `profpic` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email_address`, `password`, `name`, `phone_number`, `birthdate`, `sex`, `profpic`, `lastname`) VALUES
('admin@gmail.com', '1234', 'admin', '1234', '2002-12-04', 'Male', '../images/profile/ainzz.webp', 'ainzz'),
('itot@gmail.com', 'hamir', 'John ', '23213', '2023-07-06', 'Male', '../images/profile/hamir.jpg', 'Hamir'),
('kaamodia@up.edu.ph', 'ako', 'chester', '231', '2023-06-09', 'Male', '../images/profile/santa.png', 'gallego'),
('kmamodia@gmail.com', 'kmamodia', 'Kurt', '09983444136', '2023-12-04', 'Male', '../images/profile/292472426_756563505468756_7665345635681143139_n.jpg', 'Amodia'),
('kurtamodia@gmail.com', 'km', 'Kurt', '09983444136', '2023-06-01', 'Male', '../images/profile/kurt.jpg', 'Amodia'),
('lebron@gmail.com', 'lebronjames', 'Lebron', '12312', '2023-06-06', 'Male', '../images/profile/lebron.png', 'James'),
('mamodia78@gmail.com', 'km', 'Luis', '12312', '2023-06-10', 'Female', '../images/profile/profile3.jpg', 'Magtoto'),
('pitoy@gmail.com', 'pitoy', 'Carl', '213213', '2023-06-05', 'Male', '../images/profile/profile5.jpg', 'Elipan'),
('somebody@gmail.com', 'kmamodia', 'some', '0123', '2023-06-07', 'Male', '../images/profile/kurt.jpg', 'body');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `email_address` (`email_address`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`email_address`) REFERENCES `users` (`email_address`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
