-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 08:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kinza`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `des` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `des`) VALUES
(1, 'mobiles', 'mobile.jpg', 'abc'),
(2, 'bags', 'bg1.webp', 'hello'),
(3, 'watches', 'watch.webp', 'abc'),
(4, 'dffs', 'OIP (1).jpg', 'fdfsdfds');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `h_pay` int(11) NOT NULL,
  `y_pay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `salary`, `h_pay`, `y_pay`) VALUES
(1, 'sir mujahid', 100000, 200, 416000),
(2, 'sir alvi', 100000, 500, 1040000),
(3, 'sir hamza', 50000, 350, 728000),
(4, 'miss hafsa', 85000, 0, 0);

--
-- Triggers `faculties`
--
DELIMITER $$
CREATE TRIGGER `changeSalary` BEFORE UPDATE ON `faculties` FOR EACH ROW BEGIN 
SET NEW.y_pay = NEW.h_pay*2080;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `total_products` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(200) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `u_id`, `u_name`, `u_email`, `total_products`, `total_amount`, `date_time`, `status`) VALUES
(1, 6, 'ali', 'ali@gmail.com', 5, 44000, '2024-02-28 05:08:28', 'pending'),
(2, 2, 'aqsa khan', 'aqsa@gmail.com', 6, 206000, '2024-03-06 05:54:00', 'approve'),
(3, 7, 'hasaan ', 'mhasaansuriya@gmail.com', 3, 107000, '2024-03-06 04:35:16', 'approve');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `p_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `p_code`) VALUES
(1, 'mobile', 'ord-a350e113-a607-11ee-a945-c81f6609b14f'),
(2, 'bags', 'ord-c673e243-a607-11ee-a945-c81f6609b14f');

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `prCode` BEFORE INSERT ON `orders` FOR EACH ROW BEGIN 
    SET NEW.p_code = CONCAT('ord-', UUID());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pendingorders`
--

CREATE TABLE `pendingorders` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_price` int(11) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendingorders`
--

INSERT INTO `pendingorders` (`id`, `u_id`, `u_name`, `u_email`, `p_id`, `p_name`, `p_qty`, `p_price`, `dateTime`, `status`) VALUES
(1, 6, 'ali', 'ali@gmail.com', 5, 'Royal Galaxy A78G', 2, 15000, '2024-02-26 04:40:58', 'pending'),
(2, 6, 'ali', 'ali@gmail.com', 6, 'Royal Galaxy A9078y', 3, 8500, '2024-02-26 04:40:58', 'pending'),
(3, 2, 'aqsa khan', 'aqsa@gmail.com', 2, 'abc', 9000, 9000, '2024-02-26 05:41:56', 'pending'),
(4, 2, 'aqsa khan', 'aqsa@gmail.com', 2, 'abc', 18000, 9000, '2024-02-26 05:47:18', 'pending'),
(12, 6, 'ali', 'ali@gmail.com', 6, 'Royal Galaxy A9078y', 2, 17000, '2024-02-28 05:08:28', 'pending'),
(13, 6, 'ali', 'ali@gmail.com', 2, 'abc', 3, 27000, '2024-02-28 05:08:28', 'pending'),
(14, 2, 'aqsa khan', 'aqsa@gmail.com', 2, 'abc', 4, 36000, '2024-02-28 05:32:50', 'pending'),
(15, 2, 'aqsa khan', 'aqsa@gmail.com', 3, 'Oppo Reno', 2, 170000, '2024-02-28 05:32:51', 'pending'),
(16, 7, 'hasaan ', 'mhasaansuriya@gmail.com', 6, 'Royal Galaxy A9078y', 2, 17000, '2024-03-01 04:59:27', 'pending'),
(17, 7, 'hasaan ', 'mhasaansuriya@gmail.com', 4, 'Redmi Note 12', 1, 90000, '2024-03-01 04:59:27', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `des` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `des`, `qty`, `image`, `c_id`) VALUES
(1, 'Royal', 800000, 'hello', 10, 'OIP.jpg', 1),
(2, 'abc', 9000, 'dfsd', 89, 'neom-gKfSdzieIJc-unsplash (1).jpg', 2),
(3, 'Oppo Reno', 85000, 'hello', 56, 'OppoA78-b.jpg', 1),
(4, 'Redmi Note 12', 90000, 'hello', 90, 'XiaomiPocoC65-b.jpg', 1),
(5, 'Royal Galaxy A78G', 15000, 'hello', 75, 'w2.webp', 3),
(6, 'Royal Galaxy A9078y', 8500, 'hello', 50, 'w1.webp', 3);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stdId` int(11) NOT NULL,
  `stdName` varchar(100) DEFAULT NULL,
  `stdEmail` varchar(200) DEFAULT NULL,
  `stdCity` varchar(200) DEFAULT 'karachi',
  `stdGender` enum('male','female') DEFAULT NULL,
  `stdAge` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `dept` varchar(200) DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stdId`, `stdName`, `stdEmail`, `stdCity`, `stdGender`, `stdAge`, `salary`, `dept`, `f_id`) VALUES
(1, 'ali', 'ali@gmail.com', 'lahore', 'male', 23, 67000, 'management', 1),
(3, 'ali hassan', 'alihassan@gmail.com', 'lahore', 'male', 23, 30000, 'cafe', NULL),
(4, 'hassan khan', 'hassan@gmail.com', 'lahore', 'male', 25, 45000, 'admin', 1),
(5, 'hamza', 'hamzakhan12@gmail.com', 'karachi', 'male', 27, 67000, 'management', NULL),
(6, 'hamza', 'hamza123@gmail.com', 'islamabad', 'male', 32, 67000, 'management', NULL),
(7, 'hussain', 'hussain@gmail.com', 'islamabad', 'male', 32, 45000, 'admin', NULL),
(8, 'musfirah', 'musfirah@gmail.com', 'karachi', 'female', 24, 55000, 'student affairs', NULL),
(9, 'meerab', 'meerab@gmail.com', 'karachi', 'female', 24, 55000, 'student affairs', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`) VALUES
(2, 'aqsa khan', 'aqsa@gmail.com', '123Aqsa', 2),
(5, 'admin', 'admin@gmail.com', '123', 1),
(6, 'ali', 'ali@gmail.com', '123', 2),
(7, 'hasaan ', 'mhasaansuriya@gmail.com', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendingorders`
--
ALTER TABLE `pendingorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stdId`),
  ADD UNIQUE KEY `stdEmail` (`stdEmail`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pendingorders`
--
ALTER TABLE `pendingorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stdId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `faculties` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
