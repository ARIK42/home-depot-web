--Database: `inventory`

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `item` (
  `itemID` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `item` (`itemID`, `name`, `image`, `price`, `category`, `description`) VALUES
('SKU90231290', 'Universal AC Remote', 'images/elec4.jpg', '8.49', 'Electrical Appliances', 'Universal remote for Air conditioners '),
('SKU90643256', 'Scrubber Pad Sponge', 'images/hold5.jpg', '0.92', 'Household Items', 'JIAJUYOGPIN Multi-Colored pad sponge'),
('SKU90647854', 'Toilet Blocks (4pcs)', 'images/hold1.jpg', '1.79', 'Household Items', 'Ocean Fresh toilet bowl cleaners'),
('SKU90648167', 'White Magic Sponge', 'images/hold4.jpg', '3.50', 'Household Items', 'LINGYI white magic sponge (27cm)'),
('SKU90709160', 'Safety Glasses', 'images/hard6.jpg', '1.60', 'Hardware', 'Shock-proof safety glasses. Transparent, anti-dust, anti-wind, anti-sand protective eyewear.'),
('SKU90710190', 'Stainless Steel L-Bracket Set ', 'images/hard2.jpg', '1.70', 'Hardware', '1 set of 4 pieces of L-Brackets\r\nwith screws (50mmx50mm)'),
('SKU90717440', 'Stainless Steel Bidet Spray', 'images/hard3.jpg', '8.87', 'Hardware', 'The set of bidet attachment include sprayer, hoses, holder.\r\nMade of stainless steel, very smooth, durable and easy to clean.\r\nCan be used for washing, gardening, pet bathing, flushing toilet, washing fruits and etc.'),
('SKU90718402', 'Round Guard Sticker', 'images/hold6.jpg', '1.23', 'Household Items', 'MANDYHOME 1 pack of 12 pieces stickers (D2.8cm)'),
('SKU90718670', 'Gardening Tool Set (3 pcs)', 'images/hard4.jpg', '4.62', 'Hardware', 'Grown-up tools for the young gardener'),
('SKU90727950', 'Metal L-Shaped Brackets', 'images/hard7.jpg', '1.68', 'Hardware', '8 pieces of 25mm metal L-shaped (L25mm x H25mm)'),
('SKU90738300', 'Copper Coated Nail 3/4\"', 'images/hard1.jpg', '1.70', 'Hardware', 'Universal Screw Nail suitable for uses on natural woods, chipboard, plastic materials and plating (bracket, hinges, furniture, etc.)'),
('SKU90741300', 'Compartment Box', 'images/hard8.jpg', '13.06', 'Hardware', 'Multi-functional 10 compartments storage box made of plastic. Perfect for putting rings, beads, pills, fishing gear, cosmetics, debris, socks, medicine, etc.'),
('SKU90744250', 'STELAR Combination Lock', 'images/hard5.jpg', '4.39', 'Hardware', '3.5cm push button combination padlock (L35)'),
('SKU91406538', 'Cloth Hanger (6pcs)', 'images/hold8.jpg', '2.53', 'Household Items', 'XTRA slip-resistant hanger'),
('SKU92415623', 'SEKOPLAS Plastic Bags', 'images/hold3.jpg', '2.80', 'Household Items', '1 pack of 10 pieces SEKOPLAS ReMAX HDPE Garbage Bag Large Size (L75cm x H90cm x W0.02mm)'),
('SKU93004215', '5m Extension Socket', 'images/elec5.jpg', '30.88', 'Electrical Appliances', 'LWD 5-Gang eay extension trailing socket 5 meters'),
('SKU93214785', 'Philips LED Bulb', 'images/elec2.jpg', '8.90', 'Electrical Appliances', 'PHILIPS Essential 3U Shape LED bulb cool daylight 18W for replacement 100W bulb'),
('SKU93501678', 'Plastic Drain Cover', 'images/hold2.jpg', '7.80', 'Household Items', 'FELTON plastic drain cover (44.25cm x 27.2cm)'),
('SKU94102458', 'SP Socket Outlet', 'images/elec1.jpg', '1.98', 'Electrical Appliances', '1 piece of 13A 1-gang SP switched socket outlet \r\n(L8.5cm x W8.5cm)'),
('SKU94602156', 'Floor Cleaner', 'images/hold7.jpg', '7.46', 'Household Items', 'KLEENSO 99 floor cleaner wangi scent (900g)'),
('SKU95201475', 'EVEREADY Batteries ', 'images/elec3.jpg', '4.65', 'Electrical Appliances', '2 pieces super heavy duty type D batteries ');


DELIMITER $$
CREATE TRIGGER `create item id` BEFORE INSERT ON `item` FOR EACH ROW BEGIN
  INSERT INTO itemid_gen VALUES (NULL);
  SET NEW.itemID = CONCAT('SKU', LPAD(LAST_INSERT_ID(),8, '0'));
END
$$
DELIMITER ;


CREATE TABLE `itemid_gen` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `itemid_gen` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21);


CREATE TABLE `user` (
  `userID` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `user` (`userID`, `username`, `email`, `password`, `role`) VALUES
('ID00000009', 'Abdul Rehman Ishaq', 'abdulrahman7699@gmail.com', '202cb962ac59075b964b07152d234b70', 'USER');


DELIMITER $$
CREATE TRIGGER `id gen` BEFORE INSERT ON `user` FOR EACH ROW BEGIN
  INSERT INTO userid_gen VALUES (NULL);
  SET NEW.userID = CONCAT('ID', LPAD(LAST_INSERT_ID(), 8, '0'));
END
$$
DELIMITER ;


CREATE TABLE `userid_gen` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `userid_gen` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10);


ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`);


ALTER TABLE `itemid_gen`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);


ALTER TABLE `userid_gen`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `itemid_gen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;


ALTER TABLE `userid_gen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;
