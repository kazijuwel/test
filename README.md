#


coloumn add in 
1. 'products' table = 'seller_shipping_id'
2. 'flash_deals' = 'stock_or_flash'  ->stock_or_flash => (1=flash , 2= stock)
3. 'order' table = 'delivery_price'
<--Sabbir-->
4. 'products' table = 'admin_approved'  DEFAULT '0'
Date: 05.04.2021
5. ALTER TABLE `products` ADD `payment_type` INT(1) NOT NULL DEFAULT '1' AFTER `shipping_type`;
6. ALTER TABLE `delivry_methods` ADD `delivery_payment_type` INT(1) NOT NULL DEFAULT '1' AFTER `type`; 5-May-2021
7. ALTER TABLE `products` ADD `quick_overview` LONGTEXT NULL AFTER `description`, ADD `special_feature` LONGTEXT NULL AFTER `quick_overview`, ADD `specification` LONGTEXT NULL AFTER `special_feature`; 31-May-2021
8. INSERT INTO `business_settings` (`id`, `type`, `value`, `created_at`, `updated_at`) VALUES ('116', 'aamarpay_payment', '0', '2018-10-28 13:45:16', '2021-06-28 09:04:42'); 29-jun-2021
9. INSERT INTO `business_settings` (`id`, `type`, `value`, `created_at`, `updated_at`) VALUES ('117', 'aamarpay_sandbox', '1', '2018-10-28 13:45:16', '2021-06-29 04:18:43'); 29-jun-2021
12. ALTER TABLE `order_details` ADD `purchase_price` DOUBLE(20,2) NULL DEFAULT NULL AFTER `price`; 30-Jun-2021
13. ALTER TABLE `order_details` ADD `unit_price` DOUBLE(20,2) NULL DEFAULT NULL AFTER `price`; 30-Jun-2021
10. ALTER TABLE `sellers` ADD `bkash` VARCHAR(255) NULL AFTER `admin_to_pay`, ADD `nagad` VARCHAR(255) NULL AFTER `bkash`; 3-July-2021
11. ALTER TABLE `sellers` ADD `bkash_status` INT(1) NOT NULL DEFAULT '0' AFTER `nagad`, ADD `nagad_status` INT(1) NOT NULL DEFAULT '0' AFTER `bkash_status`; 3-July-2021



table add

1. job_internship
2. job_join_us
3. shipping_sellers
4. delivry_methods
5. faqs - 2-Jun-2021
6. min_delivery_charges - 13-jun-2021

change on add product option

1. unit price = MRP price
2. Purchase price = Sales Price
3. 

#DelivryMethod
homeController -> show_product_upload_form (function)
   $gross_weight_info=DelivryMethod::where('id',9)->get()->first();
   $package_size_info=DelivryMethod::where('id',10)->get()->first();
   
#composer.json
1. "spatie/db-dumper": "dev-master", (remove)


//refund sql
INSERT INTO `business_settings` (`type`, `value`, `created_at`, `updated_at`) VALUES ('refund_request_time', '3', '2019-03-12 05:58:23', '2019-03-12 05:58:23');


-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2020 at 06:20 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `refund_requests`
--

CREATE TABLE `refund_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_detail_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `seller_approval` int(1) NOT NULL DEFAULT 0,
  `admin_approval` int(1) NOT NULL DEFAULT 0,
  `refund_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `refund_status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `refund_requests`
--
ALTER TABLE `refund_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

ALTER TABLE `refund_requests` ADD `reason` LONGTEXT NULL DEFAULT NULL AFTER `refund_amount`;
ALTER TABLE `refund_requests` ADD `admin_seen` INT NOT NULL AFTER `reason`;
--
-- AUTO_INCREMENT for table `refund_requests`
--
ALTER TABLE `refund_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


ALTER TABLE `products` ADD `refundable` INT(1) NOT NULL DEFAULT '0' AFTER `slug`;
ALTER TABLE `refund_requests` ADD `reject_reason` LONGTEXT NULL DEFAULT NULL AFTER `refund_status`;
ALTER TABLE `popups` ADD `popup_type` INT(1) NULL AFTER `status`;


//al 
ALTER TABLE `payments` ADD `pre_due_to_seller` VARCHAR(255) NOT NULL DEFAULT '0' AFTER `txn_code`, ADD `cur_due_to_seller` VARCHAR(255) NOT NULL DEFAULT '0' AFTER `pre_due_to_seller`;


ALTER TABLE `payments` ADD `user_id` INT(11) NULL DEFAULT NULL AFTER `id`;

ALTER TABLE `products` ADD `is_warranty` INT(11) NOT NULL DEFAULT '0' AFTER `delivery_price_type`, ADD `warranty_days` BIGINT NULL AFTER `is_warranty`; 17-July-2021  (0= no warranty, 1= product warranty)

ALTER TABLE `products` ADD `parts_warranty` INT(11) NOT NULL DEFAULT '0' AFTER `warranty_days`; 19-July-2021  (0= no parts warranty, 1= parts warranty)

product_parts_warranties - table added 19-July-2021

contact_us - table added 24-July-2021

ALTER TABLE `products` ADD `authenticity` VARCHAR(255) NULL AFTER `tags`, ADD `product_origin_country` VARCHAR(255) NULL AFTER `authenticity`, ADD `product_license` VARCHAR(255) NULL AFTER `product_origin_country`; 24-July-2021

ALTER TABLE `order_details` ADD `parts_warranty` JSON NULL AFTER `product_referral_code`, ADD `warranty` VARCHAR(255) NULL AFTER `parts_warranty`; 25-July-2021

ALTER TABLE `products` ADD `product_assemble_country` VARCHAR(255) NULL AFTER `product_origin_country`; 29-July-2021

INSERT INTO `otp_configurations` (`id`, `type`, `value`, `created_at`, `updated_at`) VALUES ('12', 'robi_sms_credential', '0', '2021-05-28 00:30:06', '2021-08-02 07:33:19'); 2-August-2021

ALTER TABLE `cities` CHANGE `cost` `cost` DOUBLE(20,2) NULL DEFAULT '0.00'; 4-August-2021

ALTER TABLE `order_details` ADD `received_status` VARCHAR(255) NULL DEFAULT NULL AFTER `delivery_status`;  22-August-2021

ALTER TABLE `users` ADD `profession` VARCHAR(255) NULL AFTER `postal_code`, ADD `birth_date` DATE NULL AFTER `profession`; 23-August-2021

ALTER TABLE `delivry_methods` ADD `delivery_date` BIGINT(20) NOT NULL DEFAULT '0' AFTER `delivery_charge`; 25-August-2021

ALTER TABLE `orders` ADD `delivery_date` DATE NULL AFTER `date`; 25-August-2021

