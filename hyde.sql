-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2025 at 04:20 AM
-- Server version: 8.0.33
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hyde`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountID` int NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `passcode` varchar(2000) NOT NULL,
  `phoneNumber` varchar(500) NOT NULL,
  `birthday` date NOT NULL,
  `roleID` int NOT NULL,
  `pin` varchar(6) DEFAULT NULL,
  `profile` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountID`, `name`, `email`, `passcode`, `phoneNumber`, `birthday`, `roleID`, `pin`, `profile`) VALUES
(1, 'Min Sitt', 'minsitt.p67@rsu.ac.th', 'Thanoswasright@1989', '0823059272', '2004-06-30', 2, '198989', NULL),
(2, 'Jennifer', 'nikkijen1411@gmail.com', 'Thanoswasright@1989', '09952090401', '2004-11-14', 1, '112233', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressID` int NOT NULL,
  `street` varchar(2000) NOT NULL,
  `township` varchar(2000) NOT NULL,
  `city` varchar(2000) NOT NULL,
  `state` varchar(2000) NOT NULL,
  `postalCode` varchar(2000) NOT NULL,
  `country` varchar(2000) NOT NULL,
  `completeAddress` varchar(2000) NOT NULL,
  `mapLink` varchar(2000) NOT NULL,
  `accountID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressID`, `street`, `township`, `city`, `state`, `postalCode`, `country`, `completeAddress`, `mapLink`, `accountID`) VALUES
(1, 'Ek Charoean Alley 6', 'Lak Hok', 'Bangkok', 'Mueang Pathum Thani', '12000', 'Thailand', 'Ek Charoen 6 Alley, Lak Hok, Mueang Pathum Thani District, Pathum Thani 12000', 'https://maps.app.goo.gl/z3gLy4EaWnToyFDCA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int NOT NULL,
  `categoryName` varchar(500) NOT NULL,
  `parentID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `parentID`) VALUES
(1, 'Men', NULL),
(2, 'Women', NULL),
(3, 'Accessories', NULL),
(4, 'Footwear', NULL),
(5, 'New Arrival', NULL),
(6, 'Featured Collections', NULL),
(7, 'Shirts', 1),
(8, 'Shirts', 2),
(9, 'T-Shirts', 1),
(10, 'T-Shirts', 2),
(11, 'Pants', 1),
(12, 'Pants', 2),
(13, 'Jeans', 1),
(14, 'Jeans', 2),
(15, 'Jacket', 1),
(16, 'Jacket', 2),
(17, 'Dresses', 2),
(18, 'Skirts', 2),
(19, 'Outlet', NULL),
(20, 'Tops', 1),
(21, 'Tops', 2),
(22, 'Unisex', NULL),
(23, 'Activewear', NULL),
(24, 'Shirts', 22),
(25, 'TShirts', 22),
(26, 'Pants', 22),
(27, 'Jeans', 22),
(28, 'Jacket', 22),
(29, 'Tops', 22);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `colorID` int NOT NULL,
  `colorName` varchar(500) NOT NULL,
  `colorCode` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`colorID`, `colorName`, `colorCode`) VALUES
(1, 'Black', '#000000'),
(2, 'WASHED BLACK', '#1A1A1A'),
(3, 'WASHED NAVY BLUE', '#2D3A4A'),
(4, 'Onyx Black', '#0F0F0F'),
(5, 'Graphite', '#3C3F41');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discountID` int NOT NULL,
  `range1` int NOT NULL,
  `range2` int NOT NULL,
  `percentage` double NOT NULL,
  `productID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`discountID`, `range1`, `range2`, `percentage`, `productID`) VALUES
(1, 10, 19, 10, 1),
(2, 20, 29, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `orderItemID` int NOT NULL,
  `quantity` int NOT NULL,
  `productID` int NOT NULL,
  `totalCost` double NOT NULL,
  `orderID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `orderr`
--

CREATE TABLE `orderr` (
  `orderID` int NOT NULL,
  `paymentValid` tinyint NOT NULL,
  `totalCost` double NOT NULL,
  `orderDate` date DEFAULT NULL,
  `paymentStatus` varchar(500) DEFAULT NULL,
  `orderStatus` int DEFAULT NULL,
  `trackingStatus` varchar(500) DEFAULT NULL,
  `accountID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `orderStatusID` int NOT NULL,
  `orderStatus` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`orderStatusID`, `orderStatus`) VALUES
(1, 'Active Order'),
(2, 'Completed Order');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `photoID` int NOT NULL,
  `photoName` varchar(500) NOT NULL,
  `productID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`photoID`, `photoName`, `productID`) VALUES
(1, 'p1_i1.jpg', 1),
(2, 'p1_i2.jpg', 1),
(3, 'p1_i3.jpg', 1),
(4, 'p1_i4.jpg', 1),
(5, 'p1_i5.jpg', 1),
(6, 'p1_i6.jpg', 1),
(7, 'p2_i1.jpg', 2),
(8, 'p2_i2.jpg', 2),
(9, 'p2_i3.jpg', 2),
(10, 'p2_i4.jpg', 2),
(11, 'p2_i5.jpg', 2),
(12, 'p2_i6.jpg', 2),
(13, 'p2_i7.jpg', 2),
(14, 'p3_i1.jpg', 3),
(15, 'p3_i2.jpg', 3),
(16, 'p3_i3.jpg', 3),
(17, 'p3_i4.jpg', 3),
(18, 'p4_i1.jpg', 4),
(19, 'p4_i2.jpg', 4),
(20, 'p4_i3.jpg', 4),
(21, 'p4_i4.jpg', 4),
(22, 'p5_i1.jpg', 5),
(23, 'p5_i2.jpg', 5),
(24, 'p5_i3.jpg', 5),
(25, 'p5_i4.jpg', 5),
(26, 'p5_i5.jpg', 5),
(27, 'p5_i6.jpg', 5),
(28, 'p6_i1.jpg', 6),
(29, 'p6_i2.jpg', 6),
(30, 'p6_i3.jpg', 6),
(31, 'p6_i4.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int NOT NULL,
  `productName` varchar(500) NOT NULL,
  `price` double NOT NULL,
  `discountedPrice` double DEFAULT NULL,
  `postedDate` date DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `waitingWeek` int NOT NULL,
  `preorder` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `price`, `discountedPrice`, `postedDate`, `description`, `waitingWeek`, `preorder`) VALUES
(1, 'ORIGAMI FADED WASH JEANS', 165000, NULL, '2025-10-31', 'AVAILABLE At Mercury physical stores', 3, 0),
(2, 'VERVESV OG CLASSIC LOGO TEE', 77500, 67500, '2025-10-30', 'Crafted from 100% cotton 210gsm midweight single jersey fabric. 1x1 rib round neck. \r\nNew boxy cropped fit silhouette. \r\nOne of our signature rainbow reflective logo print on front. Cut, sewn and printed in Yangon. Designed by Vervesv in Bangkok.', 2, 1),
(3, 'VERVESV Cotton Leather 6 Panel Hat', 57500, 50000, '2025-10-15', '• 100% washed cotton + PU leather\r\n• Embroidery eyelets\r\n• Flat embroidery logo\r\n• Tri glide buckle \r\n• Single stitch detailing at back \r\n• PU leather button on top\r\n• 6 panel cut \r\n• Designed by vervesv in Bangkok\r\n• Cut & sewn in China \r\n• Embroidered in Yangon', 2, 1),
(4, 'Iconic V3 sweatshirt in black', 165000, 155000, '2025-10-01', '• 420gsm heavyweight loopback terry \r\n• 85% cotton 15% polyester mixed\r\n• 450gsm 1x1 ribbed cuff, hem & round neck\r\n• Iconic artwork printed on front & back\r\n• Loose fit cut & streetwear silhouette\r\n• Cut & sewn in China\r\n• Printed & finished in Myanmar', 2, 0),
(5, 'Druga UV protection jacket', 200000, 191000, '2025-10-01', '• UPF50+ protection\r\n• 50g flyweight material \r\n• Water resistance \r\n• Double zipper closure\r\n• Hidden extra large pocket \r\n• For outdoors & sports', 3, 0),
(6, 'HEMi BACKLESS DRESS in charcoal', 77500, NULL, '2025-10-02', 'Where minimalism meets bold elegance. \r\nCrafted from 95% polyester 5% elastane 4 way stretch fabric. Designed to hug every curve while showcasing an effortlessly chic open-back cut, this dress redefines sophistication.\r\nAvailable exclusively online, the Hemi Backless is the statement piece you didn’t know you needed – until now. Pair it with heels for a night out, or make it your go-to power outfit.', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productxcategory`
--

CREATE TABLE `productxcategory` (
  `productxcategoryID` int NOT NULL,
  `productID` int NOT NULL,
  `categoryID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `productxcategory`
--

INSERT INTO `productxcategory` (`productxcategoryID`, `productID`, `categoryID`) VALUES
(1, 1, 13),
(2, 1, 14),
(3, 2, 9),
(4, 2, 10),
(5, 3, 3),
(6, 4, 20),
(7, 4, 21),
(8, 4, 29),
(9, 1, 27),
(10, 2, 25),
(11, 5, 15),
(12, 5, 16),
(13, 5, 28),
(14, 6, 17);

-- --------------------------------------------------------

--
-- Table structure for table `relatedproduct`
--

CREATE TABLE `relatedproduct` (
  `relatedProductID` int NOT NULL,
  `productID1` int NOT NULL,
  `productID2` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `relatedproduct`
--

INSERT INTO `relatedproduct` (`relatedProductID`, `productID1`, `productID2`) VALUES
(1, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleID` int NOT NULL,
  `roleName` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleID`, `roleName`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `sizeID` int NOT NULL,
  `sizeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`sizeID`, `sizeName`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL'),
(6, 'XXXL'),
(7, '4XL');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stockID` int NOT NULL,
  `quantity` int NOT NULL,
  `productID` int NOT NULL,
  `sizeID` int NOT NULL,
  `colorID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stockID`, `quantity`, `productID`, `sizeID`, `colorID`) VALUES
(1, 10, 1, 1, 1),
(2, 10, 1, 2, 1),
(3, 10, 1, 3, 1),
(4, 10, 1, 4, 1),
(5, 10, 1, 5, 1),
(6, 10, 1, 6, 1),
(7, 10, 2, 4, 1),
(8, 10, 2, 5, 1),
(9, 10, 3, 4, 2),
(10, 10, 3, 4, 3),
(11, 10, 4, 4, 1),
(12, 15, 4, 5, 1),
(13, 10, 5, 3, 1),
(14, 10, 5, 4, 1),
(15, 10, 6, 2, 4),
(16, 10, 6, 2, 5),
(17, 10, 6, 3, 4),
(18, 10, 6, 3, 5),
(19, 10, 6, 4, 4),
(20, 10, 6, 4, 5),
(21, 10, 6, 5, 4),
(22, 10, 6, 5, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountID`),
  ADD KEY `roleID` (`roleID`),
  ADD KEY `profile` (`profile`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`),
  ADD KEY `accountID` (`accountID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`),
  ADD KEY `parentID` (`parentID`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`colorID`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discountID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`orderItemID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `orderr`
--
ALTER TABLE `orderr`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `accountID` (`accountID`),
  ADD KEY `orderStatus` (`orderStatus`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`orderStatusID`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photoID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `productxcategory`
--
ALTER TABLE `productxcategory`
  ADD PRIMARY KEY (`productxcategoryID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `relatedproduct`
--
ALTER TABLE `relatedproduct`
  ADD PRIMARY KEY (`relatedProductID`),
  ADD KEY `productID1` (`productID1`),
  ADD KEY `productID2` (`productID2`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`sizeID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stockID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `sizeID` (`sizeID`),
  ADD KEY `colorID` (`colorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accountID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `colorID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `discountID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `orderItemID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderr`
--
ALTER TABLE `orderr`
  MODIFY `orderID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `orderStatusID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `photoID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `productxcategory`
--
ALTER TABLE `productxcategory`
  MODIFY `productxcategoryID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `relatedproduct`
--
ALTER TABLE `relatedproduct`
  MODIFY `relatedProductID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `sizeID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stockID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `role` (`roleID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`profile`) REFERENCES `photo` (`photoID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parentID`) REFERENCES `category` (`categoryID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `discount_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orderr` (`orderID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orderr`
--
ALTER TABLE `orderr`
  ADD CONSTRAINT `orderr_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orderr_ibfk_2` FOREIGN KEY (`orderStatus`) REFERENCES `orderstatus` (`orderStatusID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `productxcategory`
--
ALTER TABLE `productxcategory`
  ADD CONSTRAINT `productxcategory_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `productxcategory_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `relatedproduct`
--
ALTER TABLE `relatedproduct`
  ADD CONSTRAINT `relatedproduct_ibfk_1` FOREIGN KEY (`productID1`) REFERENCES `product` (`productID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `relatedproduct_ibfk_2` FOREIGN KEY (`productID2`) REFERENCES `product` (`productID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`sizeID`) REFERENCES `size` (`sizeID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `stock_ibfk_3` FOREIGN KEY (`colorID`) REFERENCES `color` (`colorID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
