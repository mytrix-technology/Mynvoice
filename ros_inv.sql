-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.45 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for ros_inv
CREATE DATABASE IF NOT EXISTS `ros_inv` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ros_inv`;


-- Dumping structure for table ros_inv.autoemail
CREATE TABLE IF NOT EXISTS `autoemail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kdform` varchar(20) DEFAULT NULL,
  `from` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `cc` varchar(255) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `attach` varchar(255) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.autoemail: ~6 rows (approximately)
DELETE FROM `autoemail`;
/*!40000 ALTER TABLE `autoemail` DISABLE KEYS */;
INSERT INTO `autoemail` (`id`, `kdform`, `from`, `to`, `cc`, `judul`, `subject`, `message`, `attach`, `status`) VALUES
	(1, NULL, 'formybisnis@gmail.com', '', '', 'Sentralnet - Quotation', '', '<h1>Dear 16020001,</h1>\r\n                      <h4>Thank you for contacting us.</h4> \r\n\r\n                      <p>\r\n                        Your Quotation Number 160310013\r\n can be viewed, printed or downloaded as PDF from the link below.\r\n                        Click to view Estimate\r\n                        Looking forward to doing business with you.\r\n                      </p> \r\n\r\n\r\n                      <p>Regards,</p> \r\n                      <p>yudhis_tiro</p>\r\n                      <p>Kampung Bolang</p>', '', 1),
	(2, NULL, 'formybisnis@gmail.com', '', '', 'Sentralnet - Quotation', '', '<h1>Dear 16020001,</h1>\r\n                      <h4>Thank you for contacting us.</h4> \r\n\r\n                      <p>\r\n                        Your Quotation Number 160310013\r\n can be viewed, printed or downloaded as PDF from the link below.\r\n                        Click to view Estimate\r\n                        Looking forward to doing business with you.\r\n                      </p> \r\n\r\n\r\n                      <p>Regards,</p> \r\n                      <p>yudhis_tiro</p>\r\n                      <p>Kampung Bolang</p>', '', 1),
	(3, '160310013\r\n', 'formybisnis@gmail.com', 'yudhis_tiro@yahoo.com', 'mahasiswateknologi@gmail.com', 'Sentralnet - Quotation', 'kirim quotation lagi', '<h1>Dear 16020001,</h1>\r\n                      <h4>Thank you for contacting us.</h4> \r\n\r\n                      <p>\r\n                        Your Quotation Number 160310013\r\n can be viewed, printed or downloaded as PDF from the link below.\r\n                        Click to view Estimate\r\n                        Looking forward to doing business with you.\r\n                      </p> \r\n\r\n\r\n                      <p>Regards,</p> \r\n                      <p>yudhis_tiro</p>\r\n                      <p>Kampung Bolang</p>', '', 1),
	(4, '160320004\r\n', 'formybisnis@gmail.com', 'yudhis_tiro@yahoo.com', 'profmiles@gmail.com', 'Sentralnet - Invoice', 'invoice baru', '<h1>Dear 16020003,</h1>\r\n                      <h4>Thank you for contacting us.</h4> \r\n\r\n                      <p>\r\n                        Your estimate 160320004\r\n can be viewed, printed or downloaded as PDF from the link below.\r\n                        Click to view Invoice\r\n                        Looking forward to doing business with you.\r\n                      </p> \r\n\r\n\r\n                      <p>Regards,</p> \r\n                      <p>yudhis_tiro</p>\r\n                      <p>Kampung Bolang</p>', '', 1),
	(5, '160350003\r\n', 'formybisnis@gmail.com', 'rozgani@gmail.com', 'yudhis_tiro@yahoo.com', 'Sentralnet - Payment Received', 'Kirim Bukti Pembayaran Diterima', '<h1>Dear 16020003,</h1>\r\n                      <h4>Thank you for contacting us.</h4> \r\n\r\n                      <p>\r\n                        Your Payment Received Number 160350003\r\n can be viewed, printed or downloaded as PDF from the link below.\r\n                        Click to view Payment Received\r\n                        Looking forward to doing business with you.\r\n                      </p> \r\n\r\n\r\n                      <p>Regards,</p> \r\n                      <p>yudhis_tiro</p>\r\n                      <p>Kampung Bolang</p>', '', 1),
	(6, '160410014\r\n', 'formybisnis@gmail.com', 'arik.apriyani@takaful.com', 'yudhis_tiro@yahoo.com', 'Sentralnet - Quotation', 'kirim quotation', '<h1>Dear 16020001,</h1>\r\n                      <h4>Thank you for contacting us.</h4> \r\n\r\n                      <p>\r\n                        Your Quotation Number 160410014\r\n can be viewed, printed or downloaded as PDF from the link below.\r\n                        Click to view Quotation\r\n                        Looking forward to doing business with you.\r\n                      </p> \r\n\r\n\r\n                      <p>Regards,</p> \r\n                      <p>yudhis_tiro</p>\r\n                      <p>Kampung Bolang</p>', '', 1);
/*!40000 ALTER TABLE `autoemail` ENABLE KEYS */;


-- Dumping structure for table ros_inv.category_invoice
CREATE TABLE IF NOT EXISTS `category_invoice` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.category_invoice: ~5 rows (approximately)
DELETE FROM `category_invoice`;
/*!40000 ALTER TABLE `category_invoice` DISABLE KEYS */;
INSERT INTO `category_invoice` (`id`, `name`, `tag`) VALUES
	(1, 'Quotation', 'quotation'),
	(2, 'Invoice', 'invoice'),
	(3, 'Nota', 'nota'),
	(4, 'Delivery Notice', 'delivery-notice'),
	(5, 'Payment Received', 'payment-received');
/*!40000 ALTER TABLE `category_invoice` ENABLE KEYS */;


-- Dumping structure for table ros_inv.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `kdcust` varchar(10) NOT NULL,
  `salutation` varchar(10) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `payment_terms` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kdcust`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.customer: ~4 rows (approximately)
DELETE FROM `customer`;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`kdcust`, `salutation`, `first_name`, `last_name`, `display_name`, `email`, `phone`, `website`, `company_name`, `currency`, `payment_terms`) VALUES
	('16020001', 'Tn', 'Yudhistiro', 'Tri Aronggo', 'Yudhis', 'yudhis_tiro@yahoo.com', '081332846041', 'www.mytrixtechnology.com', 'Mytrix', 'IDR', '3-N45'),
	('16020002\n', 'Tn', 'csacsca', 'csacsc', 'csacsc', 'cscaca', '215168181', 'cscacas', 'csacaca', 'USD', '0-DOR'),
	('16020003\n', 'Tn', 'csacac', 'csacsa', 'csaca', 'csaca', '4487877', 'csaca', 'csacsa', 'IDR', '0-DOR'),
	('16020004\n', 'Ny', 'csacece', 'cecea', 'ceacae', 'ceace', '18645135', 'cecea', 'ceae', 'USD', '2-N30');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;


-- Dumping structure for table ros_inv.customer_details
CREATE TABLE IF NOT EXISTS `customer_details` (
  `customer_kdcust` varchar(10) DEFAULT NULL,
  `bill_addr_street` varchar(255) DEFAULT NULL,
  `bill_addr_city` varchar(255) DEFAULT NULL,
  `bill_addr_state` varchar(255) DEFAULT NULL,
  `bill_addr_zip_code` int(10) DEFAULT NULL,
  `bill_addr_country` varchar(255) DEFAULT NULL,
  `bill_addr_phone` int(20) DEFAULT NULL,
  `bill_addr_fax` int(20) DEFAULT NULL,
  `ship_addr_street` varchar(255) DEFAULT NULL,
  `ship_addr_city` varchar(255) DEFAULT NULL,
  `ship_addr_state` varchar(255) DEFAULT NULL,
  `ship_addr_zip_code` int(10) DEFAULT NULL,
  `ship_addr_country` varchar(255) DEFAULT NULL,
  `ship_addr_phone` int(20) DEFAULT NULL,
  `ship_addr_fax` int(20) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.customer_details: ~4 rows (approximately)
DELETE FROM `customer_details`;
/*!40000 ALTER TABLE `customer_details` DISABLE KEYS */;
INSERT INTO `customer_details` (`customer_kdcust`, `bill_addr_street`, `bill_addr_city`, `bill_addr_state`, `bill_addr_zip_code`, `bill_addr_country`, `bill_addr_phone`, `bill_addr_fax`, `ship_addr_street`, `ship_addr_city`, `ship_addr_state`, `ship_addr_zip_code`, `ship_addr_country`, `ship_addr_phone`, `ship_addr_fax`, `notes`) VALUES
	('16020001', NULL, 'East Jakarta', 'Jakarta', 13820, 'Indonesia', 2147483647, 210005599, NULL, 'East Jakarta', 'Jakarta', 13820, 'Indonesia', 2147483647, 210005599, 'aku tanpamu butiran debu'),
	('16020002\n', '', 'csacsa', 'csacsa', 0, 'csacsa', 0, 0, '', 'csacsa', 'csacsa', 0, 'csacsa', 0, 0, NULL),
	('16020003\n', 'csacsa', 'csaca', 'csaca', 0, 'csaca', 0, 0, 'csacsa', 'csaca', 'csaca', 0, 'csaca', 0, 0, NULL),
	('16020004\n', 'csacacac', 'csacaacs', 'csacasacs', 25628, 'csacacsc', 5611561, 2147483647, 'csacacac', 'csacaacs', 'csacasacs', 25628, 'csacacsc', 5611561, 2147483647, 'ceceaceace');
/*!40000 ALTER TABLE `customer_details` ENABLE KEYS */;


-- Dumping structure for table ros_inv.delivery_notice
CREATE TABLE IF NOT EXISTS `delivery_notice` (
  `kddelnot` varchar(20) NOT NULL,
  `kdinv` varchar(20) DEFAULT NULL,
  `kdquo` varchar(20) DEFAULT NULL,
  `custkd` varchar(10) DEFAULT NULL,
  `payoptid` int(11) DEFAULT NULL,
  `delnotdate` date DEFAULT NULL,
  `dateofreceipt` date DEFAULT NULL,
  `custnotes` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `status` int(3) DEFAULT NULL,
  PRIMARY KEY (`kddelnot`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.delivery_notice: ~4 rows (approximately)
DELETE FROM `delivery_notice`;
/*!40000 ALTER TABLE `delivery_notice` DISABLE KEYS */;
INSERT INTO `delivery_notice` (`kddelnot`, `kdinv`, `kdquo`, `custkd`, `payoptid`, `delnotdate`, `dateofreceipt`, `custnotes`, `remark`, `status`) VALUES
	('160240001', '160220001\n', 'cacsac', 'cscaca', 1, '2016-02-05', '2016-04-08', 'cscacascw', 'PO3728/11/2015', 20),
	('160240002', '160220002', 'sccac', 'sccac', 3, '2016-02-05', '2016-04-08', 'cscacac', 'PO3728/11/2015', 20),
	('160340003\n', '160220001', NULL, '16020001', NULL, '2016-03-18', NULL, 'vvavadvda', 'brabarab', 17),
	('160440004\n', '160420004', NULL, '16020001', NULL, '2016-04-08', NULL, 'cdqcqddq', 'cdqcqddq', 18);
/*!40000 ALTER TABLE `delivery_notice` ENABLE KEYS */;


-- Dumping structure for table ros_inv.delivery_notice_details
CREATE TABLE IF NOT EXISTS `delivery_notice_details` (
  `kddelnot` varchar(20) DEFAULT NULL,
  `itemkd` varchar(50) DEFAULT NULL,
  `itemname` varchar(255) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `sentqty` int(5) DEFAULT NULL,
  `upload` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.delivery_notice_details: ~3 rows (approximately)
DELETE FROM `delivery_notice_details`;
/*!40000 ALTER TABLE `delivery_notice_details` DISABLE KEYS */;
INSERT INTO `delivery_notice_details` (`kddelnot`, `itemkd`, `itemname`, `qty`, `sentqty`, `upload`) VALUES
	('160340003\n', 'cecav', 'veava', 0, 0, NULL),
	('160440004\n', 'pisau - pisau lempar', 'pisau - pisau lempar', 1, 0, NULL),
	('160440004\n', 'tas keril - coba dulu', 'tas keril - coba dulu', 1, 1, NULL);
/*!40000 ALTER TABLE `delivery_notice_details` ENABLE KEYS */;


-- Dumping structure for table ros_inv.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `permission` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.groups: ~3 rows (approximately)
DELETE FROM `groups`;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `description`, `active`, `permission`) VALUES
	(1, 'Admin', 'Administrator', 1, '{"user-management":1,"user-profile":1,"user-profile-update":1,"menu-management":1,"group-management":1,"permission-management":1}'),
	(2, 'Finance', 'Finance and Accounting User', 1, '{"user-profile":1,"user-profile-update":1}'),
	(3, 'Employee', 'Employee Users', 1, '{"user-profile":1,"user-profile-update":1}');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Dumping structure for table ros_inv.groups_permissions
CREATE TABLE IF NOT EXISTS `groups_permissions` (
  `id` int(11) NOT NULL,
  `group_id` mediumint(8) DEFAULT NULL,
  `permission_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.groups_permissions: ~10 rows (approximately)
DELETE FROM `groups_permissions`;
/*!40000 ALTER TABLE `groups_permissions` DISABLE KEYS */;
INSERT INTO `groups_permissions` (`id`, `group_id`, `permission_id`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 1, 3),
	(4, 1, 4),
	(5, 1, 5),
	(6, 1, 6),
	(7, 2, 2),
	(8, 2, 3),
	(9, 3, 2),
	(10, 3, 3);
/*!40000 ALTER TABLE `groups_permissions` ENABLE KEYS */;


-- Dumping structure for table ros_inv.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `kdinv` varchar(20) NOT NULL,
  `kdquo` varchar(20) DEFAULT NULL,
  `custkd` varchar(10) DEFAULT NULL,
  `ordernumber` varchar(20) DEFAULT NULL,
  `invdate` date DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `subtotal` int(20) DEFAULT NULL,
  `discount` int(5) DEFAULT NULL,
  `shipprice` int(10) DEFAULT NULL,
  `tax` int(5) DEFAULT NULL,
  `grdtotal` int(20) DEFAULT NULL,
  `payopt` int(5) DEFAULT NULL,
  `custnotes` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `status` int(3) DEFAULT NULL,
  PRIMARY KEY (`kdinv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.invoice: ~4 rows (approximately)
DELETE FROM `invoice`;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` (`kdinv`, `kdquo`, `custkd`, `ordernumber`, `invdate`, `duedate`, `subtotal`, `discount`, `shipprice`, `tax`, `grdtotal`, `payopt`, `custnotes`, `remark`, `status`) VALUES
	('160220001\n', 'cacsac', 'cscaca', NULL, '2016-02-05', NULL, 165151, 50000, NULL, 15, 55441, 1, 'cscacascw', 'scacaweae', 0),
	('160220002\n', 'sccac', 'sccac', NULL, '2016-02-05', NULL, 15616516, 52000, NULL, 12, 1561116516, 2, 'cscacac', 'grgwgwgw', 1),
	('160320003\n', '160110001', '16020001', '6786785', '2016-03-16', '2016-03-16', 3414, 5315, NULL, 5315, 53151, 3, 'fqfdqfqf', 'geqgqgeq', NULL),
	('160420004\n', '160410013', '16020001', '123456', '2016-04-06', '2016-04-06', 1550000, 0, NULL, 31000, 1860000, 4, 'cdqcqcqd', 'cdqcqddq', NULL);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;


-- Dumping structure for table ros_inv.invoice_details
CREATE TABLE IF NOT EXISTS `invoice_details` (
  `kdinv` varchar(20) DEFAULT NULL,
  `itemkd` varchar(50) DEFAULT NULL,
  `itemname` varchar(255) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `priceperitem` int(10) DEFAULT NULL,
  `discount` int(10) DEFAULT NULL,
  `totalprice` int(10) DEFAULT NULL,
  `upload` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.invoice_details: ~3 rows (approximately)
DELETE FROM `invoice_details`;
/*!40000 ALTER TABLE `invoice_details` DISABLE KEYS */;
INSERT INTO `invoice_details` (`kdinv`, `itemkd`, `itemname`, `qty`, `priceperitem`, `discount`, `totalprice`, `upload`) VALUES
	('160320003\n', 'sleeping bag', 'murah meriah', 3414, 75000, NULL, 4314, NULL),
	('160420004\n', 'pisau - pisau lempar', 'pisau - pisau lempar', 1, 800000, 0, 800000, NULL),
	('160420004\n', 'tas keril - coba dulu', 'tas keril - coba dulu', 1, 750000, 0, 750000, NULL);
/*!40000 ALTER TABLE `invoice_details` ENABLE KEYS */;


-- Dumping structure for table ros_inv.items
CREATE TABLE IF NOT EXISTS `items` (
  `kditem` varchar(50) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `unit` int(5) DEFAULT NULL,
  `purchase_price` int(5) DEFAULT NULL,
  `sell_price` int(5) DEFAULT NULL,
  `tax` int(5) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kditem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.items: ~6 rows (approximately)
DELETE FROM `items`;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (`kditem`, `nama`, `unit`, `purchase_price`, `sell_price`, `tax`, `remark`) VALUES
	('16010001', 'sleeping bag', 24, 50000, 75000, 10, 'murah meriah'),
	('16010002', 'tas keril', 10, 500000, 750000, 10, 'coba dulu'),
	('16010003', 'matras', 50, 35000, 70000, 10, 'matras empuk'),
	('16010004', 'coba', 20, 60000, 120000, 10, 'lagi'),
	('16010005\n', 'lagi', 5, 950000, 1250000, 10, 'dong'),
	('16010006', 'pisau', 5, 600000, 800000, 10, 'pisau lempar');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;


-- Dumping structure for table ros_inv.jurusan
CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `jurusan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table ros_inv.jurusan: ~4 rows (approximately)
DELETE FROM `jurusan`;
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
	(1, 'teknik informatika'),
	(2, 'teknik mesin'),
	(3, 'teknik otomotif'),
	(4, 'teknik kimia');
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;


-- Dumping structure for table ros_inv.login_attempts
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.login_attempts: ~0 rows (approximately)
DELETE FROM `login_attempts`;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;


-- Dumping structure for table ros_inv.master_status
CREATE TABLE IF NOT EXISTS `master_status` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `group` varchar(30) DEFAULT NULL,
  `status_name` varchar(100) DEFAULT NULL,
  `status_desc` varchar(300) DEFAULT NULL,
  `is_active` int(5) DEFAULT NULL,
  `user_created` int(10) DEFAULT NULL,
  `user_updated` int(10) DEFAULT NULL,
  `create_on` datetime DEFAULT NULL,
  `update_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.master_status: ~18 rows (approximately)
DELETE FROM `master_status`;
/*!40000 ALTER TABLE `master_status` DISABLE KEYS */;
INSERT INTO `master_status` (`id`, `group`, `status_name`, `status_desc`, `is_active`, `user_created`, `user_updated`, `create_on`, `update_on`) VALUES
	(1, 'Quotation', 'Draft', 'Data Quotation disimpan sementara', 1, NULL, NULL, '2016-03-14 12:53:35', '2016-03-14 12:57:34'),
	(4, 'Quotation', 'Sent', 'Data Quotation sudah dikirim email ke customer', 1, NULL, NULL, '2016-03-14 12:59:44', NULL),
	(5, 'Quotation', 'Accepted', 'Data Quotation disetujui oleh customer', 1, NULL, NULL, '2016-03-14 01:00:35', '2016-03-14 01:01:57'),
	(6, 'Quotation', 'Declined', 'Data Quotation ditolak customer', 1, NULL, NULL, '2016-03-14 01:01:20', NULL),
	(7, 'Quotation', 'Invoiced', 'Data Quotation sudah ditagihkan invoice ke customer', 1, NULL, NULL, '2016-03-14 01:02:52', NULL),
	(8, 'Quotation', 'Expired', 'Data Quotation sudah melewati masa berlaku pemesanan', 1, NULL, NULL, '2016-03-14 01:03:41', NULL),
	(9, 'Invoice', 'Draft', 'Data Invoice disimpan sementara', 1, NULL, NULL, '2016-03-14 01:05:00', NULL),
	(10, 'Invoice', 'Sent', 'Data Invoice sudah dikirim email ke customer', 1, NULL, NULL, '2016-03-14 01:08:17', NULL),
	(11, 'Invoice', 'Overdue', 'Data Invoice sudah melewati masa berlaku', 1, NULL, NULL, '2016-03-14 01:09:16', NULL),
	(12, 'Invoice', 'Unpaid', 'Data Invoice belum dibayar oleh customer', 1, NULL, NULL, '2016-03-14 01:10:10', NULL),
	(13, 'Invoice', 'Partially Paid', 'Data Invoice sudah dibayar sebagian oleh customer', 1, NULL, NULL, '2016-03-14 01:10:55', NULL),
	(14, 'Invoice', 'Paid', 'Data Invoice sudah dibayar penuh oleh customer', 1, NULL, NULL, '2016-03-14 01:11:44', NULL),
	(15, 'Invoice', 'Void', 'Data Invoice dengan item yang sudah terkirim ke customer dan status sudah selesai', 1, NULL, NULL, '2016-03-14 01:13:01', NULL),
	(16, 'Delivery Notice', 'Draft', 'Data Delivery Notice disimpan sementara', 1, NULL, NULL, '2016-03-14 02:40:11', NULL),
	(17, 'Delivery Notice', 'Pending', 'Data Delivery Notice dengan pengiriman tertunda', 1, NULL, NULL, '2016-03-14 02:40:58', NULL),
	(18, 'Delivery Notice', 'On Going Process', 'Data Delivery Notice sedang dalam proses pengiriman', 1, NULL, NULL, '2016-03-14 02:41:51', NULL),
	(19, 'Delivery Notice', 'Partially Delivered', 'Data Delivery Notice dengan item telah dikirim sebagian', 1, NULL, NULL, '2016-03-14 02:43:30', '2016-03-14 02:44:50'),
	(20, 'Delivery Notice', 'Delivered', 'Data Delivery Notice dengan item telah dikirim semua', 1, NULL, NULL, '2016-03-14 02:44:16', NULL);
/*!40000 ALTER TABLE `master_status` ENABLE KEYS */;


-- Dumping structure for table ros_inv.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_parent` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- Dumping data for table ros_inv.menu: ~27 rows (approximately)
DELETE FROM `menu`;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `name`, `link`, `icon`, `is_active`, `is_parent`) VALUES
	(1, 'sales', '#', 'fa fa-list-alt', 1, 0),
	(2, 'report', '#', 'fa fa-list-alt', 1, 0),
	(3, 'Master', '#', 'fa fa-list-alt', 1, 0),
	(4, 'setting', '#', 'fa fa-list-alt', 1, 0),
	(15, 'menu', 'menu', 'fa fa-list-alt', 1, 4),
	(19, 'Category', 'category_invoice', 'fa fa-list-alt', 1, 3),
	(20, 'item', 'items', 'fa fa-list-alt', 1, 3),
	(21, 'customer', 'customer', 'fa fa-list-alt', 1, 3),
	(23, 'user', 'users', 'fa fa-list-alt', 1, 4),
	(24, 'group', 'groups', 'fa fa-list-alt', 1, 4),
	(25, 'permissions', 'permissions', 'fa fa-list-alt', 1, 4),
	(28, 'quotation', 'quotation', 'fa fa-list-alt', 1, 1),
	(29, 'invoices', 'invoice', 'fa fa-credit-card', 1, 1),
	(30, 'payment received', 'payment_received', 'fa fa-money', 1, 1),
	(31, 'nota', 'nota', 'fa fa-list-alt', 1, 1),
	(36, 'sales by customer report', 'report/index_sales_by_customer', 'fa fa-list-alt', 1, 2),
	(37, 'sales by item report', 'report/index_sales_by_item', 'fa fa-list-alt', 1, 2),
	(38, 'payment received report', 'report/index_payment_received', 'fa fa-list-alt', 1, 2),
	(39, 'time to get paid report', 'report/index_time_to_get_paid', 'fa fa-list-alt', 1, 2),
	(40, 'refund history report', 'report/index_refund_history', 'fa fa-list-alt', 1, 2),
	(42, 'Payment Option', 'payment_option', 'fa fa-list-alt', 1, 3),
	(43, 'Delivery Notice', 'delivery_notice', 'fa fa-truck', 1, 1),
	(44, 'Invoice Details Report', 'report/index_invoice_details', 'fa fa-money', 1, 2),
	(45, 'Quotation Details Report', 'report/index_quotation_details', 'fa fa-truck', 1, 2),
	(46, 'Delivery Notice report', 'report/index_delivery_notice', 'fa fa-truck', 1, 2),
	(47, 'nota details report', 'report/index_nota_details', 'fa fa-money', 1, 2),
	(48, 'status', 'master_status', 'fa fa-money', 1, 3);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- Dumping structure for table ros_inv.nota
CREATE TABLE IF NOT EXISTS `nota` (
  `kdnota` varchar(20) NOT NULL,
  `custkd` varchar(10) DEFAULT NULL,
  `notadate` date DEFAULT NULL,
  `subtotal` int(20) DEFAULT NULL,
  `discount` int(5) DEFAULT NULL,
  `tax` int(5) DEFAULT NULL,
  `grdtotal` int(20) DEFAULT NULL,
  `payopt` int(5) DEFAULT NULL,
  `custnotes` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kdnota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.nota: ~4 rows (approximately)
DELETE FROM `nota`;
/*!40000 ALTER TABLE `nota` DISABLE KEYS */;
INSERT INTO `nota` (`kdnota`, `custkd`, `notadate`, `subtotal`, `discount`, `tax`, `grdtotal`, `payopt`, `custnotes`, `remark`) VALUES
	('160230001\n', 'yudhis', '2016-02-05', 750000, 50000, 10, 765000, 1, 'ncjsacbjacbi', 'csnajcbwiubiqu'),
	('160330002\n', '16020001', '0000-00-00', 42141, 214, 10, 42414214, 3, 'fafeqfqf', 'hrwhwhwhwh'),
	('160330003\n', '16020002', '0000-00-00', 43141, 43141, 43141, 43141, 4, 'ffqfweqfeq', 'efqfqfq'),
	('160330004\n', '16020001', '2016-03-11', 32313213, 32131, 23, 2147483647, 5, 'swfqfeqfq', 'egegqgqgq');
/*!40000 ALTER TABLE `nota` ENABLE KEYS */;


-- Dumping structure for table ros_inv.nota_details
CREATE TABLE IF NOT EXISTS `nota_details` (
  `kdnota` varchar(20) DEFAULT NULL,
  `itemkd` varchar(50) DEFAULT NULL,
  `itemname` varchar(255) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `priceperitem` int(10) DEFAULT NULL,
  `totalprice` int(10) DEFAULT NULL,
  `upload` varchar(255) DEFAULT NULL,
  `discount` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.nota_details: ~4 rows (approximately)
DELETE FROM `nota_details`;
/*!40000 ALTER TABLE `nota_details` DISABLE KEYS */;
INSERT INTO `nota_details` (`kdnota`, `itemkd`, `itemname`, `qty`, `priceperitem`, `totalprice`, `upload`, `discount`) VALUES
	('160330002', 'sleeping bag', 'murah meriah', 12, 75000, 211414, NULL, NULL),
	('160330003\n', 'tas keril', 'coba dulu', 5, 750000, 43141, NULL, NULL),
	('160330003\n', 'sleeping bag', 'scacacq', 3, 4315151, 35151, NULL, NULL),
	('160330004\n', 'matras', 'matras empuk', 4, 70000, 321321313, NULL, NULL);
/*!40000 ALTER TABLE `nota_details` ENABLE KEYS */;


-- Dumping structure for table ros_inv.payment_option
CREATE TABLE IF NOT EXISTS `payment_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nmpay` varchar(255) DEFAULT NULL,
  `descpay` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.payment_option: ~5 rows (approximately)
DELETE FROM `payment_option`;
/*!40000 ALTER TABLE `payment_option` DISABLE KEYS */;
INSERT INTO `payment_option` (`id`, `nmpay`, `descpay`) VALUES
	(1, 'Cash', 'Pembayaran Tunai'),
	(2, 'Bank Remittance', 'Pembayaran via Bank'),
	(3, 'Bank Transfer', 'Transfer via Bank'),
	(4, 'Check', 'Pembayaran via Cek'),
	(5, 'Credit Card', 'Pembayaran via Kartu Kredit');
/*!40000 ALTER TABLE `payment_option` ENABLE KEYS */;


-- Dumping structure for table ros_inv.payment_received
CREATE TABLE IF NOT EXISTS `payment_received` (
  `kdpayrec` varchar(20) NOT NULL,
  `ctpay` int(5) DEFAULT NULL,
  `custkd` varchar(10) DEFAULT NULL,
  `bankcharge` int(20) DEFAULT NULL,
  `paydate` date DEFAULT NULL,
  `paymode` int(5) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `kdinv` varchar(20) DEFAULT NULL,
  `invdate` date DEFAULT NULL,
  `invamount` int(20) DEFAULT NULL,
  `dueamount` int(20) DEFAULT NULL,
  `amount` int(20) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `upload` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kdpayrec`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.payment_received: ~3 rows (approximately)
DELETE FROM `payment_received`;
/*!40000 ALTER TABLE `payment_received` DISABLE KEYS */;
INSERT INTO `payment_received` (`kdpayrec`, `ctpay`, `custkd`, `bankcharge`, `paydate`, `paymode`, `reference`, `kdinv`, `invdate`, `invamount`, `dueamount`, `amount`, `remark`, `upload`) VALUES
	('160250001\n', 1, 'doni', 0, '2016-02-02', 1, 'PO3978', '11651', NULL, NULL, NULL, 590000, 'scacaecaceace', NULL),
	('160350002\n', 0, '16020003', 0, '0000-00-00', 3, 'csacaca', 'cscsac', '0000-00-00', 0, 0, 0, 'cscaca', ''),
	('160450003\n', 0, '16020001', 123456, '2016-04-06', 5, '654321', '160420004', '2016-04-06', 1860000, 1860000, 1500000, 'berlari-lari di taman mimpiku, imajinasi telah menghanyutkanku', '');
/*!40000 ALTER TABLE `payment_received` ENABLE KEYS */;


-- Dumping structure for table ros_inv.payment_received_details
CREATE TABLE IF NOT EXISTS `payment_received_details` (
  `kdpayrec` varchar(20) DEFAULT NULL,
  `kdinv` varchar(20) DEFAULT NULL,
  `paydate` datetime DEFAULT NULL,
  `invamount` int(20) DEFAULT NULL,
  `payremain` int(255) DEFAULT NULL,
  `payamount` int(20) DEFAULT NULL,
  `upload` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.payment_received_details: ~0 rows (approximately)
DELETE FROM `payment_received_details`;
/*!40000 ALTER TABLE `payment_received_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_received_details` ENABLE KEYS */;


-- Dumping structure for table ros_inv.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.permissions: ~6 rows (approximately)
DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `tag`, `description`, `active`) VALUES
	(1, 'users management', 'users-management', 'Manage User', 1),
	(2, 'users profile', 'users-profile', 'View the profile user', 1),
	(3, 'user profile update', 'users-profile-update', 'Update the profile user', 1),
	(4, 'menu management', 'menu-management', 'Manage Menu', 1),
	(5, 'group management', 'group-management', 'Manage Group', 1),
	(6, 'permissions management', 'permission-management', 'Manage Permission', 1);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;


-- Dumping structure for table ros_inv.quotation
CREATE TABLE IF NOT EXISTS `quotation` (
  `kdquo` varchar(20) NOT NULL,
  `custkd` varchar(10) DEFAULT NULL,
  `reference` varchar(20) DEFAULT NULL,
  `quodate` date DEFAULT NULL,
  `expdate` date DEFAULT NULL,
  `subtotal` int(20) DEFAULT NULL,
  `discount` int(5) DEFAULT NULL,
  `shipprice` int(20) DEFAULT NULL,
  `tax` int(5) DEFAULT NULL,
  `grdtotal` int(20) DEFAULT NULL,
  `custnotes` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `status` int(3) DEFAULT NULL,
  PRIMARY KEY (`kdquo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.quotation: ~10 rows (approximately)
DELETE FROM `quotation`;
/*!40000 ALTER TABLE `quotation` DISABLE KEYS */;
INSERT INTO `quotation` (`kdquo`, `custkd`, `reference`, `quodate`, `expdate`, `subtotal`, `discount`, `shipprice`, `tax`, `grdtotal`, `custnotes`, `remark`, `status`) VALUES
	('160110001', 'acsac', NULL, '0000-00-00', '0000-00-00', 123, 12, NULL, 10, 1234, 'scaca', 'csacac', 0),
	('160210002\n', 'cscaca', NULL, '0000-00-00', '2016-02-03', 156651, 112, NULL, 1231, 153156, 'sccacs', 'scacac', 1),
	('160210003', 'scacaca', NULL, '2016-02-02', '2016-02-03', 590000, 25000, NULL, 5, 590000, 'sccacs', 'csacac', 0),
	('160310006\n', '16020003', 'dvavavav', '0000-00-00', '0000-00-00', 43141, 43141, NULL, 4314, 4314, 'cdacav', 'bwfbrwb', 0),
	('160310007\n', '16020004', 'ceqcq', '0000-00-00', '0000-00-00', 43141, 43141, NULL, 43141, 431431, 'afvdavavq', 'bwfbwbfw', 0),
	('160310009\n', '16020001', 'cdacac', '0000-00-00', '0000-00-00', 43141, 4314, NULL, 3515, 43141414, 'feqfq', 'grgwqgw', 0),
	('160310010\n', '16020001', 'csaca', '0000-00-00', '0000-00-00', 4314, 4314, NULL, 43141, 34141, 'csqqfeqg', 'rqgqgrqgqe', 0),
	('160310011\n', '16020001', 'feafa', '2016-03-24', '2016-03-24', 4314, 43, NULL, 341, 34141431, 'eqfqfq', 'feqfqf', 0),
	('160310012\n', '16020001', 'feafa', '2016-03-24', '2016-03-24', 4314, 43, NULL, 341, 34141431, 'eqfqfq', 'feqfqf', 0),
	('160410013\n', '16020001', 'cqeceqcq', '2016-04-04', '2016-04-08', 1550000, 0, 0, 31000, 1860000, 'cdqcqcqd', 'cdqcqddq', 0);
/*!40000 ALTER TABLE `quotation` ENABLE KEYS */;


-- Dumping structure for table ros_inv.quotation_details
CREATE TABLE IF NOT EXISTS `quotation_details` (
  `kdquo` varchar(20) DEFAULT NULL,
  `itemkd` varchar(50) DEFAULT NULL,
  `itemname` varchar(255) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `priceperitem` int(10) DEFAULT NULL,
  `discount` int(10) DEFAULT NULL,
  `totalprice` int(10) DEFAULT NULL,
  `upload` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.quotation_details: ~12 rows (approximately)
DELETE FROM `quotation_details`;
/*!40000 ALTER TABLE `quotation_details` DISABLE KEYS */;
INSERT INTO `quotation_details` (`kdquo`, `itemkd`, `itemname`, `qty`, `priceperitem`, `discount`, `totalprice`, `upload`) VALUES
	('160310006\n', 'sleeping bag', 'murah meriah', 124, 75000, NULL, 43141, NULL),
	('160310007\n', 'tas keril', 'coba dulu', 2321, 750000, NULL, 3213, NULL),
	('160310007\n', 'sleeping bag', 'csdacdacdas', 231, 4314141, NULL, 431431, NULL),
	('160310007\n', 'matras', 'scacsa', 231, 42414, NULL, 34141, NULL),
	('160310009\n', 'sleeping bag', 'murah meriah', 231, 75000, NULL, 3213, NULL),
	('160310009\n', 'sepatu hiking', 'ceqqc', 314, 43141, NULL, 43141, NULL),
	('160310010\n', 'matras', 'matras empuk', 4324, 70000, NULL, 43242, NULL),
	('160310010\n', 'sandal gunung', 'cqeqq', 3414, 43141, NULL, 4314, NULL),
	('160310011\n', 'tas keril', 'coba dulu', 3414, 750000, NULL, 43141, NULL),
	('160310012\n', 'tas keril', 'coba dulu', 3414, 750000, NULL, 43141, NULL),
	('160410013\n', NULL, 'pisau - pisau lempar', 1, 800000, 0, 800000, NULL),
	('160410013\n', NULL, 'tas keril - coba dulu', 1, 750000, 0, 750000, NULL);
/*!40000 ALTER TABLE `quotation_details` ENABLE KEYS */;


-- Dumping structure for table ros_inv.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table ros_inv.siswa: ~3 rows (approximately)
DELETE FROM `siswa`;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` (`id`, `nama`, `id_jurusan`) VALUES
	(2, 'desi hadayani', 1),
	(3, 'nuris akbar', 2),
	(4, 'muhammad hafidz muzakki', 1);
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;


-- Dumping structure for table ros_inv.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `permission` text,
  `ip_address` varchar(15) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `update_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.users: ~3 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `company`, `phone`, `email`, `active`, `permission`, `ip_address`, `last_login`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `salt`, `created_on`, `update_on`) VALUES
	(1, 'administrator', 'ac73525d9ec2be42619c9cde54d31d993fc3cfa3', 'Yudhistiro Tri', 'Aronggo', 'Mytrix Technology', '081332846041', 'yudhis_tiro@yahoo.com', 1, NULL, '127.0.0.1', '0000-00-00 00:00:00', '', NULL, NULL, NULL, '', NULL, NULL),
	(2, 'rosgani', '4c5f49bfda170860b5585513c2a250cf08b5e430', 'Rosgani', 'Cungkring', 'Sentralnet', '08123456789', 'rosgani@sentral.net', 1, '{"user-management":1}', '127.0.0.1', NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-22 10:31:44', NULL),
	(3, 'administrator', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Admin', 'admin', 'MytrixLab Technology', '081332846041', 'admin@admin.com', 1, NULL, '127.0.0.1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table ros_inv.users_groups
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.users_groups: ~3 rows (approximately)
DELETE FROM `users_groups`;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
	(1, 1, 1),
	(3, 2, 2),
	(2, 2, 3);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;


-- Dumping structure for table ros_inv.users_permissions
CREATE TABLE IF NOT EXISTS `users_permissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `permission_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ros_inv.users_permissions: ~0 rows (approximately)
DELETE FROM `users_permissions`;
/*!40000 ALTER TABLE `users_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_permissions` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
