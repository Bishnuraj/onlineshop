--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
);

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_code`, `quantity`, `sale_id`) VALUES
(13, 'PD1003', 1, 1),
(14, 'PD1002', 1, 1),
(15, 'PD1001', 1, 2),
(16, 'PD1003', 2, 2),
(17, 'PD1002', 1, 3),
(18, 'PD1003', 1, 3),
(19, 'PD1002', 1, 4),
(20, 'PD1003', 1, 4),
(21, 'PD1001', 1, 5),
(22, 'PD1003', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`product_code`)
);

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `price`) VALUES
(1, 'PD1001', 'Android Phone FX1', 'Di sertakan secara rambang yang lansung tidak munasabah. Jika anda ingin menggunakan Lorem Ipsum, anda perlu memastikan bahwa tiada apa yang', 'android-phone.jpg', '200.50'),
(2, 'PD1002', 'Television DXT', 'Ia menggunakan kamus yang mengandungi lebih 200 ayat Latin, bersama model dan struktur ayat Latin, untuk menghasilkan Lorem Ipsum yang munasabah.', 'lcd-tv.jpg', '500.85'),
(3, 'PD1003', 'External Hard Disk', 'Ada banyak versi dari mukasurat-mukasurat Lorem Ipsum yang sedia ada, tetapi kebanyakkannya telah diubahsuai, lawak jenaka diselitkan, atau ayat ayat yang', 'external-hard-disk.jpg', '100.00'),
(4, 'PD1004', 'Wrist Watch GE2', 'Memalukan akan terselit didalam di tengah tengah kandungan text. Semua injin Lorem Ipsum didalam Internet hanya mengulangi text.', 'wrist-watch.jpg', '400.30');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_price` float NOT NULL,
  `order_date` date NOT NULL,
  `order_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `total_price`, `order_date`, `order_by`, `status`) VALUES
(1, 600.85, '2015-02-28', 2, 1),
(2, 400.5, '2015-02-28', 1, 0),
(3, 600.85, '2015-02-28', 2, 0),
(4, 600.85, '2015-02-28', 1, 0),
(5, 300.5, '2015-03-01', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`user_id`)
);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `phone`, `address`, `password`, `created`) VALUES
(1, 'vishnu', 'vishnu@gmail.com', '9004385456', 'Bangalore, India', '1963fd70e789022f6f5b11498f992404', '2015-03-01'),
(2, 'krishna', 'bishnu@mail.ok', '9392467483', 'Housing Board, Chennai, India', '7d00149ea591e129b82d151c6d9062fb', '2015-03-01');