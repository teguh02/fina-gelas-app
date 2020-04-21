-- MySQL dump 10.13  Distrib 5.7.20, for Win64 (x86_64)
--
-- Host: localhost    Database: customer
-- ------------------------------------------------------
-- Server version	5.7.22-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `BankStatements`
--

DROP TABLE IF EXISTS `BankStatements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BankStatements` (
  `id` int(11) NOT NULL,
  `account_name` varchar(45) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BankStatements`
--

LOCK TABLES `BankStatements` WRITE;
/*!40000 ALTER TABLE `BankStatements` DISABLE KEYS */;
/*!40000 ALTER TABLE `BankStatements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Customers`
--

DROP TABLE IF EXISTS `Customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `receivables` double DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Customers`
--

LOCK TABLES `Customers` WRITE;
/*!40000 ALTER TABLE `Customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `Customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `InvoiceItems`
--

DROP TABLE IF EXISTS `InvoiceItems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `InvoiceItems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `standard_unit_price` double DEFAULT NULL,
  `sent` tinyint(4) NOT NULL DEFAULT '0',
  `orderFulfilment_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `InvoiceItem_to_invoice_fk_idx` (`invoice_id`),
  KEY `InvoiceItem_to_item_fk_idx` (`item_id`),
  KEY `InvoiceItem_to_OrderFulfilment_fk_idx` (`orderFulfilment_id`),
  CONSTRAINT `InvoiceItem_to_OrderFulfilment_fk` FOREIGN KEY (`orderFulfilment_id`) REFERENCES `OrderFulfilments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `InvoiceItem_to_invoice_fk` FOREIGN KEY (`invoice_id`) REFERENCES `Invoices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `InvoiceItem_to_item_fk` FOREIGN KEY (`item_id`) REFERENCES `Items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `InvoiceItems`
--

LOCK TABLES `InvoiceItems` WRITE;
/*!40000 ALTER TABLE `InvoiceItems` DISABLE KEYS */;
/*!40000 ALTER TABLE `InvoiceItems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Invoices`
--

DROP TABLE IF EXISTS `Invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Invoices` (
  `id` int(11) NOT NULL,
  `invoice_code` varchar(45) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `amount` double NOT NULL,
  `sent` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Invoices`
--

LOCK TABLES `Invoices` WRITE;
/*!40000 ALTER TABLE `Invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `Invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Items`
--

DROP TABLE IF EXISTS `Items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Items` (
  `id` int(11) NOT NULL,
  `item_code` varchar(45) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `type` enum('box','set') NOT NULL DEFAULT 'box',
  `unit` enum('gross','set') NOT NULL DEFAULT 'gross',
  `standard_sell_price` double DEFAULT NULL,
  `standard_supplier_price` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Items`
--

LOCK TABLES `Items` WRITE;
/*!40000 ALTER TABLE `Items` DISABLE KEYS */;
/*!40000 ALTER TABLE `Items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OrderFulfilments`
--

DROP TABLE IF EXISTS `OrderFulfilments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OrderFulfilments` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `pending_quantity` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fullfilment_customer_fk_idx` (`customer_id`),
  KEY `fulfilment_item_fk_idx` (`item_id`),
  CONSTRAINT `fulfilment_item_fk` FOREIGN KEY (`item_id`) REFERENCES `Items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fullfilment_customer_fk` FOREIGN KEY (`customer_id`) REFERENCES `Customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OrderFulfilments`
--

LOCK TABLES `OrderFulfilments` WRITE;
/*!40000 ALTER TABLE `OrderFulfilments` DISABLE KEYS */;
/*!40000 ALTER TABLE `OrderFulfilments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PackingSlips`
--

DROP TABLE IF EXISTS `PackingSlips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PackingSlips` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `packing_date` datetime NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `packing_vehicle_fk_idx` (`vehicle_id`),
  KEY `packing_customer_fk_idx` (`customer_id`),
  CONSTRAINT `packing_customer_fk` FOREIGN KEY (`customer_id`) REFERENCES `Customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `packing_vehicle_fk` FOREIGN KEY (`vehicle_id`) REFERENCES `Vehicles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PackingSlips`
--

LOCK TABLES `PackingSlips` WRITE;
/*!40000 ALTER TABLE `PackingSlips` DISABLE KEYS */;
/*!40000 ALTER TABLE `PackingSlips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Payments`
--

DROP TABLE IF EXISTS `Payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Payments` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_amount` double NOT NULL,
  `payment_method` enum('tunai','tagihan tunai','cek/giro','transfer-pajak','transfer-non-panak') NOT NULL DEFAULT 'tunai',
  `transaction_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_to_transaction_payment_idx` (`transaction_id`),
  KEY `ref_to_customer_fk_idx` (`customer_id`),
  CONSTRAINT `ref_to_customer_fk` FOREIGN KEY (`customer_id`) REFERENCES `Customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_to_transaction_payment` FOREIGN KEY (`transaction_id`) REFERENCES `Transactions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Payments`
--

LOCK TABLES `Payments` WRITE;
/*!40000 ALTER TABLE `Payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `Payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Transactions`
--

DROP TABLE IF EXISTS `Transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Transactions` (
  `id` int(11) NOT NULL,
  `bankstatement_id` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `transaction_note` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `transaction_category` enum('pembayaran dari customer','private mama','private papa','kas','pembayaran ke supplier','lain-lain') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bankstatementdetails_fk_idx` (`bankstatement_id`),
  CONSTRAINT `bankstatementdetails_fk` FOREIGN KEY (`bankstatement_id`) REFERENCES `BankStatements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Transactions`
--

LOCK TABLES `Transactions` WRITE;
/*!40000 ALTER TABLE `Transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `Transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','staff') NOT NULL DEFAULT 'staff',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Vehicles`
--

DROP TABLE IF EXISTS `Vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rego` varchar(10) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Vehicles`
--

LOCK TABLES `Vehicles` WRITE;
/*!40000 ALTER TABLE `Vehicles` DISABLE KEYS */;
/*!40000 ALTER TABLE `Vehicles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packingSlipItems`
--

DROP TABLE IF EXISTS `packingSlipItems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `packingSlipItems` (
  `id` int(11) NOT NULL,
  `packingSlip_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(10) unsigned DEFAULT NULL,
  `orderFulfilment_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `packingSlipdetails_fk_idx` (`packingSlip_id`),
  KEY `packingslipitems_fk_idx` (`item_id`),
  KEY `pakcingSlip_to_orderFulfilment_fk_idx` (`orderFulfilment_id`),
  CONSTRAINT `packingSlipdetails_fk` FOREIGN KEY (`packingSlip_id`) REFERENCES `PackingSlips` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `packingslipitems_fk` FOREIGN KEY (`item_id`) REFERENCES `Items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pakcingSlip_to_orderFulfilment_fk` FOREIGN KEY (`orderFulfilment_id`) REFERENCES `OrderFulfilments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packingSlipItems`
--

LOCK TABLES `packingSlipItems` WRITE;
/*!40000 ALTER TABLE `packingSlipItems` DISABLE KEYS */;
/*!40000 ALTER TABLE `packingSlipItems` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-25 15:30:34
