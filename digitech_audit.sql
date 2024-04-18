-- MySQL dump 10.14  Distrib 5.5.68-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: ippb_audit
-- ------------------------------------------------------
-- Server version	5.5.68-MariaDB
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8 */
;

/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */
;

/*!40103 SET TIME_ZONE='+00:00' */
;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */
;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;

/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */
;

--
-- Table structure for table `agent_feedback`
--
DROP TABLE IF EXISTS `agent_feedback`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `agent_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mType` varchar(10) NOT NULL,
  `agentId` varchar(100) NOT NULL,
  `mId` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `accepted` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agent_remarks` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mType` (`mType`, `mId`, `agentId`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = latin1;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `agent_feedback`
--
LOCK TABLES `agent_feedback` WRITE;

/*!40000 ALTER TABLE `agent_feedback` DISABLE KEYS */
;

INSERT INTO
  `agent_feedback`
VALUES
  (
    1,
    'outbound',
    'sandy',
    16,
    100,
    1,
    '2024-02-01 06:29:58',
    ''
  ),
  (
    2,
    'email',
    'sandy',
    17,
    100,
    0,
    '2024-02-01 06:30:00',
    'dgfdgf'
  );

/*!40000 ALTER TABLE `agent_feedback` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `audit_report`
--
DROP TABLE IF EXISTS `audit_report`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `audit_report` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `callDate` varchar(150) NOT NULL DEFAULT '',
  `agentCallid` varchar(150) NOT NULL DEFAULT '',
  `callType` varchar(200) NOT NULL DEFAULT '',
  `callDuration` varchar(100) NOT NULL DEFAULT '',
  `callerNo` varchar(200) NOT NULL DEFAULT '',
  `qaAlligned` varchar(150) NOT NULL DEFAULT '',
  `allignedTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `lob` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `audit_report`
--
LOCK TABLES `audit_report` WRITE;

/*!40000 ALTER TABLE `audit_report` DISABLE KEYS */
;

/*!40000 ALTER TABLE `audit_report` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `ccs_activity_log`
--
DROP TABLE IF EXISTS `ccs_activity_log`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `ccs_activity_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `action` varchar(1000) NOT NULL,
  `actionBy` varchar(20) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 189 DEFAULT CHARSET = latin1;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `ccs_activity_log`
--
LOCK TABLES `ccs_activity_log` WRITE;

/*!40000 ALTER TABLE `ccs_activity_log` DISABLE KEYS */
;

INSERT INTO
  `ccs_activity_log`
VALUES
  (
    1,
    'User negi Created with role 5',
    'admin',
    '2023-11-10 06:19:41'
  ),
  (
    2,
    'User sandy Created with role 6',
    'admin',
    '2023-11-10 06:20:03'
  ),
  (
    3,
    'inbound call monitoring data added',
    '3',
    '2023-12-30 10:39:55'
  ),
  (
    4,
    'inbound call monitoring data added',
    '3',
    '2023-12-30 10:48:27'
  ),
  (
    5,
    'inbound call monitoring data added',
    '3',
    '2023-12-30 10:51:03'
  ),
  (
    6,
    'inbound call monitoring data added',
    '1',
    '2023-12-30 11:14:35'
  ),
  (
    7,
    'inbound call monitoring data added',
    '1',
    '2023-12-30 11:19:37'
  ),
  (
    8,
    'inbound call monitoring data added',
    '1',
    '2023-12-30 11:22:02'
  ),
  (
    9,
    'inbound call monitoring data added',
    '1',
    '2023-12-30 11:30:04'
  ),
  (
    10,
    'inbound call monitoring data added',
    '1',
    '2023-12-30 11:35:02'
  ),
  (
    11,
    'inbound call monitoring data added',
    '1',
    '2023-12-30 11:49:30'
  ),
  (
    12,
    'inbound call monitoring data added',
    '',
    '2024-01-02 05:21:14'
  ),
  (
    13,
    'inbound call monitoring data added',
    '',
    '2024-01-02 05:25:27'
  ),
  (
    14,
    'inbound call monitoring data added',
    '',
    '2024-01-02 06:37:44'
  ),
  (
    15,
    'inbound call monitoring data added',
    '',
    '2024-01-02 06:43:35'
  ),
  (
    16,
    'inbound call monitoring data added',
    '2',
    '2024-01-02 07:00:10'
  ),
  (
    17,
    'inbound call monitoring data added',
    '2',
    '2024-01-02 07:04:54'
  ),
  (
    18,
    'inbound call monitoring data added',
    '2',
    '2024-01-02 09:46:39'
  ),
  (
    19,
    'inbound call monitoring data added',
    '2',
    '2024-01-02 09:53:33'
  ),
  (
    20,
    'inbound call monitoring data added',
    '2',
    '2024-01-02 09:57:07'
  ),
  (
    21,
    'inbound call monitoring data added',
    '2',
    '2024-01-02 09:59:35'
  ),
  (
    22,
    'inbound call monitoring data added',
    '2',
    '2024-01-02 10:04:52'
  ),
  (
    23,
    'inbound call monitoring data added',
    '2',
    '2024-01-02 10:07:48'
  ),
  (
    24,
    'inbound call monitoring data added',
    '2',
    '2024-01-02 10:12:24'
  ),
  (
    25,
    'inbound call monitoring data added',
    '2',
    '2024-01-02 10:14:26'
  ),
  (
    26,
    'inbound call monitoring data added',
    '2',
    '2024-01-02 10:17:37'
  ),
  (
    27,
    'inbound call monitoring data added',
    '3',
    '2024-01-02 10:27:43'
  ),
  (
    28,
    'inbound call monitoring data added',
    '4',
    '2024-01-02 10:46:06'
  ),
  (
    29,
    'inbound call monitoring data added',
    '4',
    '2024-01-02 10:50:15'
  ),
  (
    30,
    'email call monitoring data added',
    '4',
    '2024-01-02 10:55:38'
  ),
  (
    31,
    'email call monitoring data added',
    '4',
    '2024-01-02 10:59:44'
  ),
  (
    32,
    'email call monitoring data added',
    '4',
    '2024-01-02 11:00:50'
  ),
  (
    33,
    'email call monitoring data added',
    '4',
    '2024-01-02 11:07:39'
  ),
  (
    34,
    'email call monitoring data added',
    '4',
    '2024-01-02 11:18:03'
  ),
  (
    35,
    'inbound call monitoring data added',
    '2',
    '2024-01-02 11:21:54'
  ),
  (
    36,
    'inbound call monitoring data added',
    '2',
    '2024-01-02 11:46:29'
  ),
  (
    37,
    'inbound call monitoring data added',
    '2',
    '2024-01-02 11:50:29'
  ),
  (
    38,
    'inbound call monitoring data added',
    '2',
    '2024-01-02 11:51:54'
  ),
  (
    39,
    'inbound call monitoring data added',
    '2',
    '2024-01-02 11:57:12'
  ),
  (
    40,
    'inbound call monitoring data added',
    '2',
    '2024-01-02 11:58:19'
  ),
  (
    41,
    'inbound call monitoring data added',
    '2',
    '2024-01-02 12:00:17'
  ),
  (
    42,
    'inbound call monitoring data added',
    '2',
    '2024-01-02 12:02:29'
  ),
  (
    43,
    'email call monitoring data added',
    '4',
    '2024-01-02 12:09:22'
  ),
  (
    44,
    'email call monitoring data added',
    '5',
    '2024-01-02 12:23:15'
  ),
  (
    45,
    'email call monitoring data added',
    '4',
    '2024-01-06 07:54:53'
  ),
  (
    46,
    'email call monitoring data added',
    '4',
    '2024-01-06 07:57:09'
  ),
  (
    47,
    'inbound call monitoring data added',
    '',
    '2024-01-06 10:06:44'
  ),
  (
    48,
    'xls file added',
    'admin',
    '2024-01-06 10:08:36'
  ),
  (49, 'xls file added', '1', '2024-01-06 10:09:17'),
  (50, 'xls file added', '1', '2024-01-06 10:34:42'),
  (51, 'xls file added', '1', '2024-01-08 10:51:21'),
  (52, 'xls file added', '1', '2024-01-12 06:49:08'),
  (53, 'xls file added', '1', '2024-01-12 06:49:56'),
  (54, 'xls file added', '1', '2024-01-12 06:52:34'),
  (55, 'xls file added', '1', '2024-01-12 06:53:13'),
  (56, 'xls file added', '1', '2024-01-12 06:54:10'),
  (57, 'xls file added', '1', '2024-01-12 06:54:44'),
  (58, 'xls file added', '1', '2024-01-12 06:56:43'),
  (59, 'xls file added', '1', '2024-01-12 06:57:08'),
  (60, 'xls file added', '1', '2024-01-12 06:59:15'),
  (61, 'xls file added', '1', '2024-01-12 07:00:04'),
  (
    62,
    'inbound call monitoring data added',
    '2',
    '2024-01-12 07:03:36'
  ),
  (
    63,
    'inbound call monitoring data added',
    '3',
    '2024-01-12 07:10:57'
  ),
  (64, 'xls file added', '1', '2024-01-12 11:52:34'),
  (65, 'xls file added', '1', '2024-01-18 07:37:51'),
  (
    66,
    'inbound call monitoring data added',
    '3',
    '2024-01-18 07:39:49'
  ),
  (
    67,
    'inbound call monitoring data added',
    '2',
    '2024-01-18 07:46:37'
  ),
  (
    68,
    'email call monitoring data added',
    '4',
    '2024-01-18 07:48:47'
  ),
  (69, 'xls file added', '1', '2024-01-19 06:56:18'),
  (
    70,
    'inbound call monitoring data added',
    '3',
    '2024-01-19 06:57:44'
  ),
  (71, 'xls file added', '1', '2024-01-19 11:26:13'),
  (72, 'xls file added', '1', '2024-01-20 09:35:47'),
  (
    73,
    'User kuldeep Created with role 2',
    'admin',
    '2024-01-23 04:55:19'
  ),
  (
    74,
    'User gunjan Updated with name=Gunjan Mishra,password=gunjan ,role=2',
    'admin',
    '2024-01-23 05:09:46'
  ),
  (
    75,
    'User rohan Updated with name=Rohan Singh Luckee,password=rohan ,role=2',
    'admin',
    '2024-01-23 05:10:12'
  ),
  (
    76,
    'User luckee Updated with name=Luckee,password=luckee ,role=2',
    'admin',
    '2024-01-23 05:10:49'
  ),
  (
    77,
    'User gunjan Updated with name=Gunjan Mishra,password=gunjan  ,role=2',
    'admin',
    '2024-01-23 05:17:47'
  ),
  (
    78,
    'User rohan Updated with name=Rohan Singh Luckee,password=rohan  ,role=2',
    'admin',
    '2024-01-23 05:57:58'
  ),
  (
    79,
    'User luckee Updated with name=Luckee,password=luckee  ,role=2',
    'admin',
    '2024-01-23 05:58:13'
  ),
  (
    80,
    'User luckee Updated with name=Luckee,password=luckee   ,role=2',
    'admin',
    '2024-01-23 06:00:50'
  ),
  (
    81,
    'User luckee Updated with name=Luckee singh,password=luckee    ,role=2',
    'admin',
    '2024-01-23 06:01:24'
  ),
  (
    82,
    'User kuldeep Updated with name=kuldeep guhani,password=kuldeep ,role=2',
    'admin',
    '2024-01-23 06:01:34'
  ),
  (
    83,
    'User negi Updated with name=negi chutiya,password=negi ,role=3',
    'admin',
    '2024-01-23 06:01:43'
  ),
  (
    84,
    'User negi Updated with name=sethi bhai,password=negi  ,role=3',
    'admin',
    '2024-01-23 06:02:04'
  ),
  (
    85,
    'User negi Updated with name=sethi bhai,password=negi   ,role=3',
    'admin',
    '2024-01-23 06:04:12'
  ),
  (
    86,
    'User negi Updated with name=sethi bhai,password=negi    ,role=3',
    'admin',
    '2024-01-23 06:08:43'
  ),
  (
    87,
    'User sandy Updated with name=sandy,password=sandy ,role=4',
    'admin',
    '2024-01-23 06:11:16'
  ),
  (
    88,
    'User sandy Updated with name=sandy,password=sandy  ,role=4',
    'admin',
    '2024-01-23 06:12:00'
  ),
  (
    89,
    'User negi Updated with name=sethi bhai,password=negi     ,role=3',
    'admin',
    '2024-01-23 06:12:04'
  ),
  (
    90,
    'User negi Updated with name=sethi bhai,password=negi      ,role=3',
    'admin',
    '2024-01-23 06:12:27'
  ),
  (
    91,
    'User negi Updated with name=sethi bhai,password=negi       ,role=3',
    'admin',
    '2024-01-23 06:21:37'
  ),
  (
    92,
    'User negi Updated with name=sethi bhai,password=negi        ,role=3',
    'admin',
    '2024-01-23 06:22:03'
  ),
  (
    93,
    'User negi Updated with name=sethi bhai,password=negi         ,role=3',
    'admin',
    '2024-01-23 06:22:16'
  ),
  (
    94,
    'User negi Updated with name=sethi bhai,password=negi          ,role=3',
    'admin',
    '2024-01-23 06:22:27'
  ),
  (
    95,
    'User sandy Updated with name=sandy,password=sandy   ,role=4',
    'admin',
    '2024-01-23 06:23:34'
  ),
  (
    96,
    'User sandy Updated with name=sandy,password=sandy    ,role=4',
    'admin',
    '2024-01-23 06:23:37'
  ),
  (
    97,
    'User admin Updated with name=Admin,password=admin ,role=1',
    'admin',
    '2024-01-23 06:29:04'
  ),
  (
    98,
    'User admin Updated with name=Admin,password=admin  ,role=1',
    'admin',
    '2024-01-23 06:29:26'
  ),
  (
    99,
    'User kuldeep Updated with name=kuldeep guhani,password=kuldeep  ,role=2',
    'admin',
    '2024-01-23 06:31:34'
  ),
  (
    100,
    'inbound call monitoring data added',
    '',
    '2024-01-23 11:33:49'
  ),
  (
    101,
    'inbound call monitoring data added',
    '3',
    '2024-01-23 11:43:46'
  ),
  (
    102,
    'inbound call monitoring data added',
    '3',
    '2024-01-23 12:12:27'
  ),
  (
    103,
    'User gunjan Updated with name=Gunjan Mishra,password=gunjan   ,role=2',
    'admin',
    '2024-01-24 04:48:34'
  ),
  (
    104,
    'User sandy Updated with name=sethi bhai,password=sand,role=3',
    'admin',
    '2024-01-24 05:04:56'
  ),
  (
    105,
    'User rohan Updated with name=Rohan Singh Luckee,password=Rohan  ,role=2',
    'admin',
    '2024-01-24 05:13:38'
  ),
  (
    106,
    'inbound call monitoring data added',
    '2',
    '2024-01-24 06:00:52'
  ),
  (
    107,
    'email call monitoring data added',
    '4',
    '2024-01-24 06:25:08'
  ),
  (
    108,
    'email call monitoring data added',
    '4',
    '2024-01-24 06:26:25'
  ),
  (
    109,
    'User rohan Updated with name=Rohan Singh Luckee,password=Rohan   ,role=2',
    'admin',
    '2024-01-24 06:43:25'
  ),
  (
    110,
    'xls file added',
    '1',
    '2024-01-24 10:53:45'
  ),
  (
    111,
    'User digitech Created with role 4',
    'admin',
    '2024-01-24 11:08:17'
  ),
  (
    112,
    'inbound call monitoring data added',
    '2',
    '2024-01-24 11:58:49'
  ),
  (
    113,
    'inbound call monitoring data added',
    '4',
    '2024-01-25 06:31:59'
  ),
  (
    114,
    'email call monitoring data added',
    '4',
    '2024-01-25 06:34:45'
  ),
  (
    115,
    'email call monitoring data added',
    '4',
    '2024-01-25 06:38:07'
  ),
  (
    116,
    'inbound call monitoring data added',
    '4',
    '2024-01-25 06:41:54'
  ),
  (
    117,
    'xls file added',
    '1',
    '2024-01-25 07:31:30'
  ),
  (
    118,
    'xls file added',
    '1',
    '2024-01-25 07:32:33'
  ),
  (
    119,
    'xls file added',
    '1',
    '2024-01-25 07:34:00'
  ),
  (
    120,
    'xls file added',
    '1',
    '2024-01-25 07:36:01'
  ),
  (
    121,
    'xls file added',
    '1',
    '2024-01-25 07:36:44'
  ),
  (
    122,
    'xls file added',
    '1',
    '2024-01-25 07:37:25'
  ),
  (
    123,
    'xls file added',
    '1',
    '2024-01-25 07:47:36'
  ),
  (
    124,
    'xls file added',
    '1',
    '2024-01-25 10:14:00'
  ),
  (
    125,
    'inbound call monitoring data added',
    '3',
    '2024-01-27 06:28:19'
  ),
  (
    126,
    'xls file added',
    '1',
    '2024-01-27 07:29:41'
  ),
  (
    127,
    'xls file added',
    '1',
    '2024-01-27 11:44:57'
  ),
  (
    128,
    'xls file added',
    '1',
    '2024-01-27 11:47:48'
  ),
  (
    129,
    'inbound call monitoring data added',
    '3',
    '2024-01-27 12:13:04'
  ),
  (
    130,
    'User dinesh Created with role 3',
    'admin',
    '2024-01-27 12:40:14'
  ),
  (
    131,
    'xls file added',
    '1',
    '2024-01-29 04:48:59'
  ),
  (
    132,
    'xls file added',
    '1',
    '2024-01-29 04:50:06'
  ),
  (
    133,
    'xls file added',
    '1',
    '2024-01-29 04:52:29'
  ),
  (
    134,
    'xls file added',
    '1',
    '2024-01-29 06:52:43'
  ),
  (
    135,
    'xls file added',
    '1',
    '2024-01-29 06:53:31'
  ),
  (
    136,
    'xls file added',
    '1',
    '2024-01-29 06:56:18'
  ),
  (
    137,
    'xls file added',
    '1',
    '2024-01-29 06:58:07'
  ),
  (
    138,
    'xls file added',
    '1',
    '2024-01-29 07:24:23'
  ),
  (
    139,
    'xls file added',
    '1',
    '2024-01-29 07:25:38'
  ),
  (
    140,
    'xls file added',
    '1',
    '2024-01-29 07:26:38'
  ),
  (
    141,
    'xls file added',
    '1',
    '2024-01-29 07:28:12'
  ),
  (
    142,
    'xls file added',
    '1',
    '2024-01-29 07:29:03'
  ),
  (
    143,
    'xls file added',
    '1',
    '2024-01-29 07:31:34'
  ),
  (
    144,
    'xls file added',
    '1',
    '2024-01-29 07:33:40'
  ),
  (
    145,
    'inbound call monitoring data added',
    '3',
    '2024-01-29 08:24:15'
  ),
  (
    146,
    'xls file added',
    '1',
    '2024-01-29 08:53:37'
  ),
  (
    147,
    'xls file added',
    '1',
    '2024-01-29 08:53:59'
  ),
  (
    148,
    'xls file added',
    '1',
    '2024-01-29 08:54:27'
  ),
  (
    149,
    'xls file added',
    '1',
    '2024-01-29 09:09:48'
  ),
  (
    150,
    'xls file added',
    '1',
    '2024-01-29 09:28:25'
  ),
  (
    151,
    'xls file added',
    '1',
    '2024-01-29 09:39:12'
  ),
  (
    152,
    'xls file added',
    '1',
    '2024-01-29 09:40:30'
  ),
  (
    153,
    'xls file added',
    '1',
    '2024-01-29 09:42:05'
  ),
  (
    154,
    'xls file added',
    '1',
    '2024-01-29 09:52:38'
  ),
  (
    155,
    'xls file added',
    '1',
    '2024-01-29 09:53:07'
  ),
  (
    156,
    'xls file added',
    '1',
    '2024-01-29 10:00:49'
  ),
  (
    157,
    'xls file added',
    '1',
    '2024-01-29 10:02:47'
  ),
  (
    158,
    'xls file added',
    '1',
    '2024-01-29 10:03:27'
  ),
  (
    159,
    'xls file added',
    '1',
    '2024-01-29 10:05:06'
  ),
  (
    160,
    'xls file added',
    '1',
    '2024-01-29 10:08:57'
  ),
  (
    161,
    'xls file added',
    '1',
    '2024-01-29 10:18:37'
  ),
  (
    162,
    'xls file added',
    '1',
    '2024-01-29 10:19:06'
  ),
  (
    163,
    'xls file added',
    '1',
    '2024-01-29 10:19:27'
  ),
  (
    164,
    'email call monitoring data added',
    '3',
    '2024-01-29 10:58:50'
  ),
  (
    165,
    'xls file added',
    '1',
    '2024-01-29 12:13:02'
  ),
  (
    166,
    'xls file added',
    '1',
    '2024-01-29 12:13:30'
  ),
  (
    167,
    'inbound call monitoring data added',
    '3',
    '2024-01-30 09:05:38'
  ),
  (
    168,
    'inbound call monitoring data added',
    '3',
    '2024-01-30 09:09:23'
  ),
  (
    169,
    'User 1><button type= Status changed to 1',
    'sandy',
    '2024-01-30 09:59:45'
  ),
  (
    170,
    'User 1><button type= Status changed to 1',
    'sandy',
    '2024-01-30 10:00:05'
  ),
  (
    171,
    'inbound call monitoring data added',
    '2',
    '2024-01-31 06:28:54'
  ),
  (
    172,
    'email call monitoring data added',
    '2',
    '2024-01-31 06:29:16'
  ),
  (
    173,
    'xls file added',
    '1',
    '2024-01-31 07:15:33'
  ),
  (
    174,
    'xls file added',
    '1',
    '2024-01-31 07:15:38'
  ),
  (
    175,
    'xls file added',
    '1',
    '2024-01-31 07:16:46'
  ),
  (
    176,
    'xls file added',
    '1',
    '2024-01-31 07:18:20'
  ),
  (
    177,
    'xls file added',
    '1',
    '2024-01-31 07:59:14'
  ),
  (
    178,
    'xls file added',
    '1',
    '2024-01-31 08:00:45'
  ),
  (
    179,
    'xls file added',
    '1',
    '2024-01-31 08:21:52'
  ),
  (
    180,
    'xls file added',
    '1',
    '2024-01-31 08:31:16'
  ),
  (
    181,
    'inbound call monitoring data added',
    '2',
    '2024-01-31 10:07:12'
  ),
  (
    182,
    'inbound call monitoring data added',
    '3',
    '2024-01-31 10:55:42'
  ),
  (
    183,
    'email call monitoring data added',
    '3',
    '2024-01-31 11:20:26'
  ),
  (
    184,
    'xls file added',
    '1',
    '2024-02-01 08:18:21'
  ),
  (
    185,
    'xls file added',
    '1',
    '2024-02-01 08:18:28'
  ),
  (
    186,
    'xls file added',
    '1',
    '2024-02-01 08:19:31'
  ),
  (
    187,
    'xls file added',
    '1',
    '2024-02-01 08:19:52'
  ),
  (
    188,
    'xls file added',
    '1',
    '2024-02-01 08:20:18'
  );

/*!40000 ALTER TABLE `ccs_activity_log` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `ccs_user_roles`
--
DROP TABLE IF EXISTS `ccs_user_roles`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `ccs_user_roles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = latin1;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `ccs_user_roles`
--
LOCK TABLES `ccs_user_roles` WRITE;

/*!40000 ALTER TABLE `ccs_user_roles` DISABLE KEYS */
;

INSERT INTO
  `ccs_user_roles`
VALUES
  (1, 'admin', 1, '2023-07-21 18:15:35'),
  (2, 'qagent', 1, '2023-07-21 18:15:35'),
  (3, 'agent', 1, '2023-10-10 22:09:00'),
  (4, 'slientId', 1, '2024-01-24 11:07:34');

/*!40000 ALTER TABLE `ccs_user_roles` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `ccs_users`
--
DROP TABLE IF EXISTS `ccs_users`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `ccs_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `loginid` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL DEFAULT '',
  `role` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `permissions` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 10 DEFAULT CHARSET = latin1;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `ccs_users`
--
LOCK TABLES `ccs_users` WRITE;

/*!40000 ALTER TABLE `ccs_users` DISABLE KEYS */
;

INSERT INTO
  `ccs_users`
VALUES
  (
    1,
    'admin',
    'admin  ',
    'Admin',
    '1',
    1,
    0,
    '2023-08-01 00:23:21',
    ''
  ),
  (
    2,
    'rohan',
    'Rohan   ',
    'Rohan Singh Luckee',
    '2',
    1,
    0,
    '2023-09-28 20:55:41',
    '1,2,3'
  ),
  (
    3,
    'gunjan',
    'gunjan   ',
    'Gunjan Mishra',
    '2',
    1,
    0,
    '2023-09-28 20:56:14',
    '2,3'
  ),
  (
    4,
    'luckee',
    'luckee    ',
    'Luckee singh',
    '2',
    1,
    0,
    '2023-09-28 20:56:14',
    '1,2,3'
  ),
  (
    5,
    'sandy',
    'sand',
    'sethi bhai',
    '3',
    1,
    0,
    '2023-11-10 06:19:41',
    ''
  ),
  (
    7,
    'kuldeep',
    'kuldeep  ',
    'kuldeep guhani',
    '2',
    1,
    0,
    '2024-01-23 04:55:19',
    ''
  ),
  (
    8,
    'digitech',
    'digitech',
    'digitech',
    '4',
    1,
    0,
    '2024-01-24 11:08:17',
    ''
  ),
  (
    9,
    'dinesh',
    'dinesh',
    'dinesh',
    '3',
    1,
    0,
    '2024-01-27 12:40:14',
    '1,2,3'
  );

/*!40000 ALTER TABLE `ccs_users` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `email_call_monitoring`
--
DROP TABLE IF EXISTS `email_call_monitoring`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `email_call_monitoring` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `handlingUser` int(11) NOT NULL,
  `loginID` varchar(50) NOT NULL,
  `employeeName` varchar(120) NOT NULL,
  `tlName` varchar(120) NOT NULL DEFAULT '',
  `managerName` varchar(120) NOT NULL DEFAULT '',
  `portfolio` varchar(100) NOT NULL DEFAULT '',
  `auditorName` varchar(100) NOT NULL DEFAULT '',
  `auditDate` varchar(80) NOT NULL DEFAULT '',
  `week` varchar(100) NOT NULL DEFAULT '',
  `location` varchar(120) NOT NULL DEFAULT '',
  `callDate` varchar(80) NOT NULL DEFAULT '',
  `callType` varchar(80) NOT NULL DEFAULT '',
  `callerNo` varchar(80) NOT NULL DEFAULT '',
  `disposition` varchar(80) NOT NULL DEFAULT '',
  `callDuration` varchar(80) NOT NULL DEFAULT '',
  `language` varchar(80) NOT NULL DEFAULT '',
  `q1` varchar(100) NOT NULL DEFAULT '',
  `q2` varchar(100) NOT NULL DEFAULT '',
  `q3` varchar(100) NOT NULL DEFAULT '',
  `q4` varchar(100) NOT NULL DEFAULT '',
  `q5` varchar(100) NOT NULL DEFAULT '',
  `q6` varchar(100) NOT NULL DEFAULT '',
  `q7` varchar(100) NOT NULL DEFAULT '',
  `q8` varchar(100) NOT NULL DEFAULT '',
  `q9` varchar(100) NOT NULL DEFAULT '',
  `q10` varchar(100) NOT NULL DEFAULT '',
  `q11` varchar(100) NOT NULL DEFAULT '',
  `q12` varchar(100) NOT NULL DEFAULT '',
  `q13` varchar(100) NOT NULL DEFAULT '',
  `q14` varchar(100) NOT NULL DEFAULT '',
  `totalWeight` varchar(4) NOT NULL DEFAULT '100',
  `achievedScore` varchar(10) NOT NULL DEFAULT '',
  `scoreWithFatal` varchar(10) NOT NULL DEFAULT '',
  `scoreWithoutFatal` varchar(10) NOT NULL DEFAULT '',
  `auditedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agentCallid` varchar(100) NOT NULL DEFAULT '',
  `qaAlligned` varchar(100) NOT NULL DEFAULT '',
  `callDisconnectMethod` varchar(100) NOT NULL DEFAULT '',
  `aoi` varchar(100) NOT NULL DEFAULT '',
  `callSummary` varchar(100) NOT NULL DEFAULT '',
  `q1sub1` varchar(100) NOT NULL DEFAULT '',
  `q1sub2` varchar(100) NOT NULL DEFAULT '',
  `q2sub` varchar(100) NOT NULL DEFAULT '',
  `q3sub` varchar(100) NOT NULL DEFAULT '',
  `q4sub` varchar(100) NOT NULL DEFAULT '',
  `q5sub` varchar(100) NOT NULL DEFAULT '',
  `q6sub` varchar(100) NOT NULL DEFAULT '',
  `q7sub` varchar(100) NOT NULL DEFAULT '',
  `q8sub` varchar(100) NOT NULL DEFAULT '',
  `q9sub` varchar(100) NOT NULL DEFAULT '',
  `q10sub` varchar(100) NOT NULL DEFAULT '',
  `q11sub` varchar(100) NOT NULL DEFAULT '',
  `q12sub` varchar(100) NOT NULL DEFAULT '',
  `q13sub` varchar(100) NOT NULL DEFAULT '',
  `q14sub` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 18 DEFAULT CHARSET = latin1;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `email_call_monitoring`
--
LOCK TABLES `email_call_monitoring` WRITE;

/*!40000 ALTER TABLE `email_call_monitoring` DISABLE KEYS */
;

INSERT INTO
  `email_call_monitoring`
VALUES
  (
    17,
    3,
    'gunjan',
    'harshit',
    'harshit',
    'amit gupta',
    'gunjan',
    'Gunjan Mishra',
    '2024-01-31',
    '05 Week',
    'noida',
    '23/05/23',
    'Request',
    '6766676676',
    'gunjan',
    '316',
    'tamil',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    '100',
    '100',
    '100.00%',
    '100.00%',
    '2024-01-31 11:20:26',
    '4577',
    'gunjan',
    'customer',
    'gunjan',
    'gunjan',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes'
  );

/*!40000 ALTER TABLE `email_call_monitoring` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `email_question_set`
--
DROP TABLE IF EXISTS `email_question_set`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `email_question_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qTag` varchar(10) NOT NULL,
  `isFatal` varchar(10) NOT NULL DEFAULT '',
  `qGroup` varchar(150) NOT NULL,
  `qHeader` varchar(150) NOT NULL,
  `question` varchar(400) NOT NULL,
  `qDescription` varchar(800) DEFAULT NULL,
  `option` varchar(100) NOT NULL,
  `weightage` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 15 DEFAULT CHARSET = latin1;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `email_question_set`
--
LOCK TABLES `email_question_set` WRITE;

/*!40000 ALTER TABLE `email_question_set` DISABLE KEYS */
;

INSERT INTO
  `email_question_set`
VALUES
  (
    1,
    'q1',
    '',
    'Soft Skills',
    'Salutation',
    'Salutation',
    'Salutation to be followed as per the template \"Greetings for the Day! Thanks for contacting India Post Payments Bank. \"<br>\n           Dear Sir/ Madam to be included in the saluation',
    'Yes/No/NA',
    5,
    '2023-08-03 23:56:28'
  ),
  (
    2,
    'q2',
    '',
    'Soft Skills',
    'Apologise/Empathize basis with the situation',
    'Apologise/Empathize basis with the situation',
    'Apology/ Empathise statement to be used on e-mail whereever required',
    'Yes/No/NA',
    5,
    '2023-08-03 23:56:28'
  ),
  (
    3,
    'q3',
    '',
    'Soft Skills',
    'Usage of correct font, font size',
    'Usage of correct font, font size',
    'Font-Calibri, Font Size-11',
    'Yes/No/NA',
    5,
    '2023-08-03 23:56:28'
  ),
  (
    4,
    'q4',
    '',
    'Soft Skills',
    'Language Usage',
    'Language Usage',
    'Customer to be reverted in the language basis the mail shared',
    'Yes/No/NA',
    5,
    '2023-08-03 23:56:28'
  ),
  (
    5,
    'q5',
    'No',
    'Soft Skills',
    'Authentication',
    'Authentication',
    'In case of any scenario wherein any account level information is supposed to be share Associates need to authenticate the customer by asking verification questions on call',
    'Yes/No/NA',
    5,
    '2023-08-03 23:56:28'
  ),
  (
    6,
    'q6',
    '',
    'Soft Skills',
    'Email Closure with Additional Help',
    'Email Closure with Additional Help',
    'Closure statement as per template to be followed(Signature etc.)<br>Usage of additional help statement',
    'Yes/No/NA',
    5,
    '2023-08-03 23:56:28'
  ),
  (
    7,
    'q7',
    'No',
    'Resolution',
    'Usage of correct template',
    'Usage of correct template',
    'Identified the E-mail type and process to be followed',
    'Yes/No/NA',
    10,
    '2023-08-03 23:56:28'
  ),
  (
    8,
    'q8',
    '',
    'Resolution',
    'OutCall to customer ',
    'OutCall to customer ',
    'Did the associate out call the customer when required',
    'Yes/No/NA',
    5,
    '2023-08-03 23:56:28'
  ),
  (
    9,
    'q9',
    'No',
    'Resolution',
    'Right Party Contact',
    'Right Party Contact',
    'Was the email responded to correct email id, including the internal ID as defined',
    'Yes/No/NA',
    10,
    '2023-08-03 23:56:28'
  ),
  (
    10,
    'q10',
    'No',
    'Resolution',
    'Empowerment',
    'Empowerment',
    'Did the agent helped the customer with the best possible resolution available with us',
    'Yes/No/NA',
    5,
    '2023-08-03 23:56:28'
  ),
  (
    11,
    'q11',
    'No',
    'Resolution',
    'Complete/Correct information provided',
    'Complete/Correct information provided',
    'Did the agent provide complete Information Was the correct information shared Did the associate performed complete system checks and resolution provided No Wrong commitments to be provided to the customer',
    'Yes/No/NA',
    10,
    '2023-08-03 23:56:28'
  ),
  (
    12,
    'q12',
    'No',
    'Resolution',
    'Incorrect Routing',
    'Incorrect Routing',
    'Routing to be done wherein required',
    'Yes/No/NA',
    10,
    '2023-08-03 23:56:28'
  ),
  (
    13,
    'q13',
    'No',
    'Resolution',
    'Complaint Closure',
    'Complaint Closure',
    'Correct Complaint closure process followed',
    'Yes/No/NA',
    10,
    '2023-08-03 23:56:28'
  ),
  (
    14,
    'q14',
    'No',
    'Email Tagging & Documentation',
    'Documentation',
    'Documentation',
    'Did the associate Tag the query/ request/ complaint correctly/Correct and Complete remarks to be captured',
    'Yes/No/NA',
    10,
    '2023-08-03 23:56:28'
  );

/*!40000 ALTER TABLE `email_question_set` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `employee_audit_report`
--
DROP TABLE IF EXISTS `employee_audit_report`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `employee_audit_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agentCallid` varchar(100) NOT NULL DEFAULT '',
  `employeeId` varchar(100) NOT NULL DEFAULT '',
  `employeeName` varchar(100) NOT NULL DEFAULT '',
  `tlName` varchar(100) NOT NULL DEFAULT '',
  `managerName` varchar(100) NOT NULL DEFAULT '',
  `location` varchar(100) NOT NULL DEFAULT '',
  `auditCount` varchar(100) NOT NULL DEFAULT '',
  `qaAlligned` varchar(100) NOT NULL DEFAULT '',
  `category` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 41 DEFAULT CHARSET = latin1;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `employee_audit_report`
--
LOCK TABLES `employee_audit_report` WRITE;

/*!40000 ALTER TABLE `employee_audit_report` DISABLE KEYS */
;

INSERT INTO
  `employee_audit_report`
VALUES
  (
    1,
    '4561',
    'DT09187342',
    'gunjan',
    'gunjan',
    'amit gupta',
    'noida',
    '2',
    'luckee',
    'A '
  ),
  (
    2,
    '4562',
    'DT09187343',
    'rohan',
    'rohan',
    'amit gupta',
    'noida',
    '2',
    'gunjan',
    'B'
  ),
  (
    3,
    '4563',
    'DT09187344',
    'luckee',
    'luckee',
    'amit gupta',
    'noida',
    '2',
    'rohan',
    'C '
  ),
  (
    4,
    '4564',
    'DT09187345',
    'chandrashekhar',
    'chandrashekhar',
    'amit gupta',
    'noida',
    '3',
    'sandy',
    'A '
  ),
  (
    5,
    '4565',
    'DT09187346',
    'kaustubh',
    'kaustubh',
    'amit gupta',
    'noida',
    '4',
    'rohit',
    'B '
  ),
  (
    6,
    '4566',
    'DT09187347',
    'rajnish',
    'rajnish',
    'amit gupta',
    'noida',
    '5',
    'rawat',
    'C'
  ),
  (
    7,
    '4567',
    'DT09187348',
    'bittu',
    'bittu',
    'amit gupta',
    'noida',
    '6',
    'ghg',
    'A'
  ),
  (
    8,
    '4568',
    'DT09187349',
    'rohan',
    'rohan',
    'amit gupta',
    'noida',
    '7',
    'hcg',
    'B '
  ),
  (
    9,
    '4569',
    'DT09187350',
    'gunjan',
    'gunjan',
    'amit gupta',
    'noida',
    '8',
    'bfbg',
    'C '
  ),
  (
    10,
    '4570',
    'DT09187351',
    'sandy',
    'sandy',
    'amit gupta',
    'noida',
    '9',
    'gbdg',
    'A'
  ),
  (
    11,
    '4571',
    'DT09187352',
    'negi',
    'negi',
    'amit gupta',
    'noida',
    '10',
    'gxbfd',
    'B '
  ),
  (
    12,
    '4572',
    'DT09187353',
    'rawat',
    'rawat',
    'amit gupta',
    'noida',
    '11',
    'hgjvh',
    'C'
  ),
  (
    13,
    '4573',
    'DT09187354',
    'chandan',
    'chandan',
    'amit gupta',
    'noida',
    '12',
    'gxbfdghhg',
    'A '
  ),
  (
    14,
    '4574',
    'DT09187355',
    'gudiya',
    'gudiya',
    'amit gupta',
    'noida',
    '13',
    'gxbfdgfdbf',
    'B'
  ),
  (
    15,
    '4575',
    'DT09187356',
    'neha',
    'neha',
    'amit gupta',
    'noida',
    '14',
    'gxbfdjhhj',
    'C'
  ),
  (
    16,
    '4576',
    'DT09187357',
    'rajput',
    'rajput',
    'amit gupta',
    'noida',
    '15',
    'gxbfdbgbgf',
    'A'
  ),
  (
    17,
    '4577',
    'DT09187358',
    'harshit',
    'harshit',
    'amit gupta',
    'noida',
    '16',
    'gxbfdfbf',
    'B'
  ),
  (
    18,
    '4578',
    'DT09187359',
    'amit',
    'amit',
    'amit gupta',
    'noida',
    '17',
    'gxbfdtgth',
    'C '
  ),
  (
    19,
    '4579',
    'DT09187360',
    'shivam',
    'shivam',
    'amit gupta',
    'noida',
    '18',
    'gxbfdfgbfd',
    'A '
  ),
  (
    20,
    '4580',
    'DT09187361',
    'ansh',
    'ansh',
    'amit gupta',
    'noida',
    '19',
    'gxbfdghfb',
    'B '
  ),
  (
    21,
    '4561',
    'DT09187342',
    'gunjan',
    'gunjan',
    'amit gupta',
    'noida',
    '2',
    'luckee',
    'A '
  ),
  (
    22,
    '4562',
    'DT09187343',
    'rohan',
    'rohan',
    'amit gupta',
    'noida',
    '2',
    'gunjan',
    'B'
  ),
  (
    23,
    '4563',
    'DT09187344',
    'luckee',
    'luckee',
    'amit gupta',
    'noida',
    '2',
    'rohan',
    'C '
  ),
  (
    24,
    '4564',
    'DT09187345',
    'chandrashekhar',
    'chandrashekhar',
    'amit gupta',
    'noida',
    '3',
    'sandy',
    'A '
  ),
  (
    25,
    '4565',
    'DT09187346',
    'kaustubh',
    'kaustubh',
    'amit gupta',
    'noida',
    '4',
    'rohit',
    'B '
  ),
  (
    26,
    '4566',
    'DT09187347',
    'rajnish',
    'rajnish',
    'amit gupta',
    'noida',
    '5',
    'rawat',
    'C'
  ),
  (
    27,
    '4567',
    'DT09187348',
    'bittu',
    'bittu',
    'amit gupta',
    'noida',
    '6',
    'ghg',
    'A'
  ),
  (
    28,
    '4568',
    'DT09187349',
    'rohan',
    'rohan',
    'amit gupta',
    'noida',
    '7',
    'hcg',
    'B '
  ),
  (
    29,
    '4569',
    'DT09187350',
    'gunjan',
    'gunjan',
    'amit gupta',
    'noida',
    '8',
    'bfbg',
    'C '
  ),
  (
    30,
    '4570',
    'DT09187351',
    'sandy',
    'sandy',
    'amit gupta',
    'noida',
    '9',
    'gbdg',
    'A'
  ),
  (
    31,
    '4571',
    'DT09187352',
    'negi',
    'negi',
    'amit gupta',
    'noida',
    '10',
    'gxbfd',
    'B '
  ),
  (
    32,
    '4572',
    'DT09187353',
    'rawat',
    'rawat',
    'amit gupta',
    'noida',
    '11',
    'hgjvh',
    'C'
  ),
  (
    33,
    '4573',
    'DT09187354',
    'chandan',
    'chandan',
    'amit gupta',
    'noida',
    '12',
    'gxbfdghhg',
    'A '
  ),
  (
    34,
    '4574',
    'DT09187355',
    'gudiya',
    'gudiya',
    'amit gupta',
    'noida',
    '13',
    'gxbfdgfdbf',
    'B'
  ),
  (
    35,
    '4575',
    'DT09187356',
    'neha',
    'neha',
    'amit gupta',
    'noida',
    '14',
    'gxbfdjhhj',
    'C'
  ),
  (
    36,
    '4576',
    'DT09187357',
    'rajput',
    'rajput',
    'amit gupta',
    'noida',
    '15',
    'gxbfdbgbgf',
    'A'
  ),
  (
    37,
    '4577',
    'DT09187358',
    'harshit',
    'harshit',
    'amit gupta',
    'noida',
    '16',
    'gxbfdfbf',
    'B'
  ),
  (
    38,
    '4578',
    'DT09187359',
    'amit',
    'amit',
    'amit gupta',
    'noida',
    '17',
    'gxbfdtgth',
    'C '
  ),
  (
    39,
    '4579',
    'DT09187360',
    'shivam',
    'shivam',
    'amit gupta',
    'noida',
    '18',
    'gxbfdfgbfd',
    'A '
  ),
  (
    40,
    '4580',
    'DT09187361',
    'ansh',
    'ansh',
    'amit gupta',
    'noida',
    '19',
    'gxbfdghfb',
    'B '
  );

/*!40000 ALTER TABLE `employee_audit_report` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `inbound_call_monitoring`
--
DROP TABLE IF EXISTS `inbound_call_monitoring`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `inbound_call_monitoring` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `handlingUser` int(11) NOT NULL,
  `loginID` varchar(50) NOT NULL,
  `employeeName` varchar(120) NOT NULL,
  `tlName` varchar(120) NOT NULL DEFAULT '',
  `managerName` varchar(120) NOT NULL DEFAULT '',
  `portfolio` varchar(100) NOT NULL DEFAULT '',
  `auditorName` varchar(100) NOT NULL DEFAULT '',
  `auditDate` varchar(80) NOT NULL DEFAULT '',
  `week` varchar(100) NOT NULL DEFAULT '',
  `location` varchar(120) NOT NULL DEFAULT '',
  `callDate` varchar(80) NOT NULL DEFAULT '',
  `callType` varchar(80) NOT NULL DEFAULT '',
  `callerNo` varchar(80) NOT NULL DEFAULT '',
  `disposition` varchar(80) NOT NULL DEFAULT '',
  `callDuration` varchar(80) NOT NULL DEFAULT '',
  `language` varchar(80) NOT NULL DEFAULT '',
  `q1` varchar(100) NOT NULL DEFAULT '',
  `q2` varchar(100) NOT NULL DEFAULT '',
  `q3` varchar(100) NOT NULL DEFAULT '',
  `q4` varchar(100) NOT NULL DEFAULT '',
  `q5` varchar(100) NOT NULL DEFAULT '',
  `q6` varchar(100) NOT NULL DEFAULT '',
  `q7` varchar(100) NOT NULL DEFAULT '',
  `q8` varchar(100) NOT NULL DEFAULT '',
  `q9` varchar(100) NOT NULL DEFAULT '',
  `q10` varchar(100) NOT NULL DEFAULT '',
  `q11` varchar(100) NOT NULL DEFAULT '',
  `q12` varchar(100) NOT NULL DEFAULT '',
  `q13` varchar(100) NOT NULL DEFAULT '',
  `q14` varchar(100) NOT NULL DEFAULT '',
  `q15` varchar(100) NOT NULL DEFAULT '',
  `q16` varchar(100) NOT NULL DEFAULT '',
  `totalWeight` varchar(4) NOT NULL DEFAULT '100',
  `achievedScore` varchar(10) NOT NULL DEFAULT '',
  `scoreWithFatal` varchar(10) NOT NULL DEFAULT '',
  `scoreWithoutFatal` varchar(10) NOT NULL DEFAULT '',
  `auditedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agentCallid` varchar(100) NOT NULL DEFAULT '',
  `qaAlligned` varchar(100) NOT NULL DEFAULT '',
  `callDisconnectMethod` varchar(100) NOT NULL DEFAULT '',
  `aoi` varchar(100) NOT NULL DEFAULT '',
  `callSummary` varchar(100) NOT NULL DEFAULT '',
  `q1sub1` varchar(100) NOT NULL DEFAULT '',
  `q1sub2` varchar(100) NOT NULL DEFAULT '',
  `q1sub3` varchar(100) NOT NULL DEFAULT '',
  `q1sub4` varchar(100) NOT NULL DEFAULT '',
  `q2sub1` varchar(100) NOT NULL DEFAULT '',
  `q2sub2` varchar(100) NOT NULL DEFAULT '',
  `q2sub3` varchar(100) NOT NULL DEFAULT '',
  `q3sub` varchar(100) NOT NULL DEFAULT '',
  `q4sub` varchar(100) NOT NULL DEFAULT '',
  `q5sub1` varchar(100) NOT NULL DEFAULT '',
  `q5sub2` varchar(100) NOT NULL DEFAULT '',
  `q5sub3` varchar(100) NOT NULL DEFAULT '',
  `q5sub4` varchar(100) NOT NULL DEFAULT '',
  `q5sub5` varchar(100) NOT NULL DEFAULT '',
  `q5sub6` varchar(100) NOT NULL DEFAULT '',
  `q5sub7` varchar(100) NOT NULL DEFAULT '',
  `q5sub8` varchar(100) NOT NULL DEFAULT '',
  `q6sub` varchar(100) NOT NULL DEFAULT '',
  `q7sub1` varchar(100) NOT NULL DEFAULT '',
  `q7sub2` varchar(100) NOT NULL DEFAULT '',
  `q7sub3` varchar(100) NOT NULL DEFAULT '',
  `q7sub4` varchar(100) NOT NULL DEFAULT '',
  `q8sub1` varchar(100) NOT NULL DEFAULT '',
  `q8sub2` varchar(100) NOT NULL DEFAULT '',
  `q8sub3` varchar(100) NOT NULL DEFAULT '',
  `q8sub4` varchar(100) NOT NULL DEFAULT '',
  `q8sub5` varchar(100) NOT NULL DEFAULT '',
  `q8sub6` varchar(100) NOT NULL DEFAULT '',
  `q9sub` varchar(100) NOT NULL DEFAULT '',
  `q10sub` varchar(100) NOT NULL DEFAULT '',
  `q11sub` varchar(100) NOT NULL DEFAULT '',
  `q12sub` varchar(100) NOT NULL DEFAULT '',
  `q13sub` varchar(100) NOT NULL DEFAULT '',
  `q14sub` varchar(100) NOT NULL DEFAULT '',
  `q15sub` varchar(100) NOT NULL DEFAULT '',
  `q16sub` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `inbound_call_monitoring`
--
LOCK TABLES `inbound_call_monitoring` WRITE;

/*!40000 ALTER TABLE `inbound_call_monitoring` DISABLE KEYS */
;

/*!40000 ALTER TABLE `inbound_call_monitoring` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `inbound_question_set`
--
DROP TABLE IF EXISTS `inbound_question_set`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `inbound_question_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qTag` varchar(10) NOT NULL,
  `isFatal` varchar(10) NOT NULL DEFAULT '',
  `qGroup` varchar(150) NOT NULL,
  `question` varchar(400) NOT NULL,
  `option` varchar(100) NOT NULL,
  `weightage` varchar(25) NOT NULL DEFAULT '',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `qHeader` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 17 DEFAULT CHARSET = latin1;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `inbound_question_set`
--
LOCK TABLES `inbound_question_set` WRITE;

/*!40000 ALTER TABLE `inbound_question_set` DISABLE KEYS */
;

INSERT INTO
  `inbound_question_set`
VALUES
  (
    1,
    'q1',
    '',
    'Greeting',
    'Call Opening',
    'Yes/No/NA',
    '5',
    '2023-08-03 23:56:28',
    'Call Opening'
  ),
  (
    2,
    'q2',
    'No',
    'Customer Identification & Authentication',
    'Customer Identification & Verification/ Authentication',
    'Yes/No/NA',
    '10',
    '2023-08-03 23:56:28',
    'Customer Identification & Verification/ Authentication'
  ),
  (
    3,
    'q3',
    '',
    'Probing',
    'Relevant Probing',
    'Yes/No/NA',
    '10',
    '2023-08-03 23:56:28',
    'Relevant Probing'
  ),
  (
    4,
    'q4',
    'No',
    'Soft Skills',
    'Being Polite & Professional on Call',
    'Yes/No/NA',
    '10',
    '2023-08-03 23:56:28',
    'Being Polite & Professional on Call'
  ),
  (
    5,
    'q5',
    '',
    'Soft Skills',
    'Language & Communication',
    'Yes/No/NA',
    '5',
    '2023-08-03 23:56:28',
    'Language & Communication'
  ),
  (
    6,
    'q6',
    '',
    'Soft Skills',
    'Active Listening',
    'Yes/No/NA',
    '8',
    '2023-08-03 23:56:28',
    'Active Listening'
  ),
  (
    7,
    'q7',
    '',
    'Soft Skills',
    'Acknowledgement',
    'Yes/No/NA',
    '7',
    '2023-08-03 23:56:28',
    'Acknowledgement'
  ),
  (
    8,
    'q8',
    '',
    'Hold/ Transfer Protocol',
    'Hold/ Dead Air/ Transfer Courtesy',
    'Yes/No/NA',
    '10',
    '2023-08-03 23:56:28',
    'Hold/ Dead Air/ Transfer Courtesy'
  ),
  (
    9,
    'q9',
    'No',
    'Resolution',
    'Correct & Complete',
    'Yes/No/NA',
    '15',
    '2023-08-03 23:56:28',
    'Correct & Complete'
  ),
  (
    10,
    'q10',
    'No',
    'Documentation',
    'Tagging & Documentation of Details',
    'Yes/No/NA',
    '15',
    '2023-08-03 23:56:28',
    'Tagging & Documentation of Details'
  ),
  (
    11,
    'q11',
    '',
    'Call Closing',
    'Call Closing & Additional Help',
    'Yes/No/NA',
    '5',
    '2023-08-03 23:56:28',
    'Call Closing & Additional Help'
  ),
  (
    12,
    'q12',
    '',
    'Predictive Customer Satisfaction Index',
    '<b>Non Scorable Parameter</b><br>\n     Accordingly to QE \'s gauging of the interaction, would this be a customer delighter',
    'Yes/No/NA',
    '0',
    '2023-08-03 23:56:28',
    '<b>Non Scorable Parameter</b><br>\n     Accordingly to QE \'s gauging of the interaction, would this be a customer delighter'
  ),
  (
    13,
    'q13',
    '',
    'Compliance Check ',
    'Lead Generation Compliance Check',
    'Yes/No/NA',
    '0',
    '2023-08-03 23:56:28',
    'Lead Generation Compliance Check'
  ),
  (
    14,
    'q14',
    '',
    'Compliance Check ',
    'Authentication Flag',
    'Yes/No/NA',
    '0',
    '2023-08-03 23:56:28',
    'Authentication Flag'
  ),
  (
    15,
    'q15',
    '',
    'Repeat',
    '<b>Non Scorable Parameter</b><br>\n      Is this a Repeat Interaction ? <br>\n       Logic to be followed Day - 7 (D-7)',
    'Yes/No/NA',
    '0',
    '2023-08-03 23:56:28',
    '<b>Non Scorable Parameter</b><br>\n      Is this a Repeat Interaction ? <br>\n       Logic to be followed Day - 7 (D-7)'
  ),
  (
    16,
    'q16',
    '',
    'Repeat',
    '<b>Non Scorable Parameter</b><br>\n       Will this call lead to Probable Repeat?',
    'Yes/No/NA',
    '0',
    '2023-08-03 23:56:28',
    '<b>Non Scorable Parameter</b><br>\n       Will this call lead to Probable Repeat?'
  );

/*!40000 ALTER TABLE `inbound_question_set` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `outbound_call_monitoring`
--
DROP TABLE IF EXISTS `outbound_call_monitoring`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `outbound_call_monitoring` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `handlingUser` int(11) NOT NULL,
  `loginID` varchar(50) NOT NULL,
  `employeeName` varchar(120) NOT NULL,
  `tlName` varchar(120) NOT NULL DEFAULT '',
  `managerName` varchar(120) NOT NULL DEFAULT '',
  `portfolio` varchar(100) NOT NULL DEFAULT '',
  `auditorName` varchar(100) NOT NULL DEFAULT '',
  `auditDate` varchar(80) NOT NULL DEFAULT '',
  `week` varchar(100) NOT NULL DEFAULT '',
  `location` varchar(120) NOT NULL DEFAULT '',
  `callDate` varchar(80) NOT NULL DEFAULT '',
  `callType` varchar(80) NOT NULL DEFAULT '',
  `callerNo` varchar(80) NOT NULL DEFAULT '',
  `disposition` varchar(80) NOT NULL DEFAULT '',
  `callDuration` varchar(80) NOT NULL DEFAULT '',
  `language` varchar(80) NOT NULL DEFAULT '',
  `q1` varchar(100) NOT NULL DEFAULT '',
  `q2` varchar(100) NOT NULL DEFAULT '',
  `q3` varchar(100) NOT NULL DEFAULT '',
  `q4` varchar(100) NOT NULL DEFAULT '',
  `q5` varchar(100) NOT NULL DEFAULT '',
  `q6` varchar(100) NOT NULL DEFAULT '',
  `q7` varchar(100) NOT NULL DEFAULT '',
  `q8` varchar(100) NOT NULL DEFAULT '',
  `q9` varchar(100) NOT NULL DEFAULT '',
  `q10` varchar(100) NOT NULL DEFAULT '',
  `q11` varchar(100) NOT NULL DEFAULT '',
  `q12` varchar(100) NOT NULL DEFAULT '',
  `q13` varchar(100) NOT NULL DEFAULT '',
  `q14` varchar(100) NOT NULL DEFAULT '',
  `q15` varchar(100) NOT NULL DEFAULT '',
  `q16` varchar(100) NOT NULL DEFAULT '',
  `q17` varchar(100) NOT NULL DEFAULT '',
  `q18` varchar(100) NOT NULL DEFAULT '',
  `totalWeight` varchar(4) NOT NULL DEFAULT '100',
  `achievedScore` varchar(10) NOT NULL DEFAULT '',
  `scoreWithFatal` varchar(10) NOT NULL DEFAULT '',
  `scoreWithoutFatal` varchar(10) NOT NULL DEFAULT '',
  `auditedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agentCallid` varchar(100) NOT NULL DEFAULT '',
  `qaAlligned` varchar(100) NOT NULL DEFAULT '',
  `callDisconnectMethod` varchar(100) NOT NULL DEFAULT '',
  `aoi` varchar(100) NOT NULL DEFAULT '',
  `callSummary` varchar(100) NOT NULL DEFAULT '',
  `q1sub1` varchar(100) NOT NULL DEFAULT '',
  `q1sub2` varchar(100) NOT NULL DEFAULT '',
  `q2sub` varchar(100) NOT NULL DEFAULT '',
  `q3sub` varchar(100) NOT NULL DEFAULT '',
  `q4sub` varchar(100) NOT NULL DEFAULT '',
  `q5sub` varchar(100) NOT NULL DEFAULT '',
  `q6sub` varchar(100) NOT NULL DEFAULT '',
  `q7sub` varchar(100) NOT NULL DEFAULT '',
  `q8sub` varchar(100) NOT NULL DEFAULT '',
  `q9sub` varchar(100) NOT NULL DEFAULT '',
  `q10sub` varchar(100) NOT NULL DEFAULT '',
  `q11sub` varchar(100) NOT NULL DEFAULT '',
  `q12sub` varchar(100) NOT NULL DEFAULT '',
  `q13sub` varchar(100) NOT NULL DEFAULT '',
  `q14sub` varchar(100) NOT NULL DEFAULT '',
  `q15sub` varchar(100) NOT NULL DEFAULT '',
  `q16sub` varchar(100) NOT NULL DEFAULT '',
  `q17sub` varchar(100) NOT NULL DEFAULT '',
  `q18sub` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 17 DEFAULT CHARSET = latin1;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `outbound_call_monitoring`
--
LOCK TABLES `outbound_call_monitoring` WRITE;

/*!40000 ALTER TABLE `outbound_call_monitoring` DISABLE KEYS */
;

INSERT INTO
  `outbound_call_monitoring`
VALUES
  (
    16,
    3,
    'gunjan',
    'rajput',
    'rajput',
    'amit gupta',
    'amit gupta',
    'Gunjan Mishra',
    '2024-01-31',
    '05 Week',
    'noida',
    '23/05/16',
    'Request',
    '4888888888',
    'amit gupta',
    '315',
    '',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    '100',
    '100',
    '100.00%',
    '100.00%',
    '2024-01-31 10:55:42',
    '4576',
    'gunjan',
    'customer',
    'amit gupta',
    'amit gupta',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes',
    'Yes'
  );

/*!40000 ALTER TABLE `outbound_call_monitoring` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `outbound_question_set`
--
DROP TABLE IF EXISTS `outbound_question_set`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `outbound_question_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qTag` varchar(10) NOT NULL,
  `isFatal` varchar(10) NOT NULL DEFAULT '',
  `qGroup` varchar(150) NOT NULL,
  `question` varchar(400) NOT NULL,
  `option` varchar(100) NOT NULL,
  `weightage` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `qHeader` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 19 DEFAULT CHARSET = latin1;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `outbound_question_set`
--
LOCK TABLES `outbound_question_set` WRITE;

/*!40000 ALTER TABLE `outbound_question_set` DISABLE KEYS */
;

INSERT INTO
  `outbound_question_set`
VALUES
  (
    1,
    'q1',
    '',
    'Greeting',
    'Opening of the call',
    'Yes/No/NA',
    5,
    '2023-08-04 05:26:28',
    'Opening of the call'
  ),
  (
    2,
    'q2',
    '',
    'Call Permission / Reason',
    'Seek Permission/ Reason of Call',
    'Yes/No/NA',
    4,
    '2023-08-04 05:26:28',
    'Seek Permission/ Reason of Call'
  ),
  (
    3,
    'q3',
    '',
    'Query',
    'Understood customers Query',
    'Yes/No/NA',
    4,
    '2023-08-04 05:26:28',
    'Understood customers Query'
  ),
  (
    4,
    'q4',
    'No',
    'Authentication',
    'Authentication',
    'Yes/No/NA',
    8,
    '2023-08-04 05:26:28',
    'Authentication'
  ),
  (
    5,
    'q5',
    '',
    'Hold/ Transfer',
    'Hold/ Transfer procedure followed',
    'Yes/No/NA',
    5,
    '2023-08-04 05:26:28',
    'Hold/ Transfer procedure followed'
  ),
  (
    6,
    'q6',
    '',
    'Call Control',
    'Call Control',
    'Yes/No/NA',
    4,
    '2023-08-04 05:26:28',
    'Call Control'
  ),
  (
    7,
    'q7',
    '',
    'Call Control',
    'Call Control',
    'Yes/No/NA',
    3,
    '2023-08-04 05:26:28',
    'Call Control'
  ),
  (
    8,
    'q8',
    '',
    'Call Control',
    'Call Control',
    'Yes/No/NA',
    3,
    '2023-08-04 05:26:28',
    'Call Control'
  ),
  (
    9,
    'q9',
    'No',
    'Objection Handling',
    'Objection Handling',
    'Yes/No/NA',
    8,
    '2023-08-04 05:26:28',
    'Objection Handling'
  ),
  (
    10,
    'q10',
    'No',
    'Professionalism',
    'Professionalism',
    'Yes/No/NA',
    8,
    '2023-08-04 05:26:28',
    'Professionalism'
  ),
  (
    11,
    'q11',
    '',
    'Language and Grammar',
    'Language and Grammar',
    'Yes/No/NA',
    5,
    '2023-08-04 05:26:28',
    'Language and Grammar'
  ),
  (
    12,
    'q12',
    '',
    'Language and Grammar',
    'Language and Grammar',
    'Yes/No/NA',
    5,
    '2023-08-04 05:26:28',
    'Language and Grammar'
  ),
  (
    13,
    'q13',
    '',
    'Language and Grammar',
    'Language and Grammar',
    'Yes/No/NA',
    4,
    '2023-08-04 05:26:28',
    'Language and Grammar'
  ),
  (
    14,
    'q14',
    'No',
    'Ownership',
    'Ownership',
    'Yes/No/NA',
    8,
    '2023-08-04 05:26:28',
    'Ownership'
  ),
  (
    15,
    'q15',
    'No',
    'Information',
    'Correct/ Complete information provided',
    'Yes/No/NA',
    8,
    '2023-08-04 05:26:28',
    'Correct/ Complete information provided'
  ),
  (
    16,
    'q16',
    '',
    'Additional Information',
    'Additional Information',
    'Yes/No/NA',
    3,
    '2023-08-04 05:26:28',
    'Additional Information'
  ),
  (
    17,
    'q17',
    '',
    'Call Closing',
    'Call Closing',
    'Yes/No/NA',
    5,
    '2023-08-04 05:26:28',
    'Call Closing'
  ),
  (
    18,
    'q18',
    'No',
    'Tagging',
    'Tagging',
    'Yes/No/NA',
    10,
    '2023-08-04 05:26:28',
    'Tagging'
  );

/*!40000 ALTER TABLE `outbound_question_set` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `permissions`
--
DROP TABLE IF EXISTS `permissions`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `permissions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `permissions` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARSET = latin1;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `permissions`
--
LOCK TABLES `permissions` WRITE;

/*!40000 ALTER TABLE `permissions` DISABLE KEYS */
;

INSERT INTO
  `permissions`
VALUES
  (1, 'inbound', 1),
  (2, 'outbound', 1),
  (3, 'email', 1);

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `subParameter_email_question_set`
--
DROP TABLE IF EXISTS `subParameter_email_question_set`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `subParameter_email_question_set` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `qTag` varchar(20) NOT NULL,
  `qDescription` varchar(800) NOT NULL DEFAULT '',
  `option` varchar(100) NOT NULL,
  `subTag` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 16 DEFAULT CHARSET = latin1;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `subParameter_email_question_set`
--
LOCK TABLES `subParameter_email_question_set` WRITE;

/*!40000 ALTER TABLE `subParameter_email_question_set` DISABLE KEYS */
;

INSERT INTO
  `subParameter_email_question_set`
VALUES
  (
    1,
    'q1',
    'Salutation to be followed as per the template \"Greetings for the Day! Thanks for contacting India Post Payments Bank. \"',
    'Yes/No/NA',
    'q1sub1'
  ),
  (
    2,
    'q1',
    'Dear Sir/ Madam to be included in the saluation	',
    'Yes/No/NA',
    'q1sub2'
  ),
  (
    3,
    'q2',
    'Apology/ Empathise statement to be used on e-mail whereever required	',
    'Yes/No/NA',
    'q2sub'
  ),
  (
    4,
    'q3',
    'Font-Calibri, Font Size-11	',
    'Yes/No/NA',
    'q3sub'
  ),
  (
    5,
    'q4',
    'Customer to be reverted in the language basis the mail shared	',
    'Yes/No/NA',
    'q4sub'
  ),
  (
    6,
    'q5',
    'In case of any scenario wherein any account level information is supposed to be share Associates need to authenticate the customer by asking verification questions on call',
    'Yes/No/NA',
    'q5sub'
  ),
  (
    7,
    'q6',
    'Closure statement as per template to be followed(Signature etc.)\nUsage of additional help statement',
    'Yes/No/NA',
    'q6sub'
  ),
  (
    8,
    'q7',
    'Identified the E-mail type and process to be followed',
    'Yes/No/NA',
    'q7sub'
  ),
  (
    9,
    'q8',
    'Did the associate out call the customer when required	',
    'Yes/No/NA',
    'q8sub'
  ),
  (
    10,
    'q9',
    'Was the email responded to correct email id, including the internal ID as defined	',
    'Yes/No/NA',
    'q9sub'
  ),
  (
    11,
    'q10',
    'Did the agent helped the customer with the best possible resolution available with us',
    'Yes/No/NA',
    'q10sub'
  ),
  (
    12,
    'q11',
    'Did the agent provide complete Information Was the correct information shared Did the associate performed complete system checks and resolution provided No Wrong commitments to be provided to the customer',
    'Yes/No/NA',
    'q11sub'
  ),
  (
    13,
    'q12',
    'Routing to be done wherein required',
    'Yes/No/NA',
    'q12sub'
  ),
  (
    14,
    'q13',
    'Correct Complaint closure process followed',
    'Yes/No/NA',
    'q13sub'
  ),
  (
    15,
    'q14',
    'Did the associate Tag the query/ request/ complaint correctly/Correct and Complete remarks to be captured',
    'Yes/No/NA',
    'q14sub'
  );

/*!40000 ALTER TABLE `subParameter_email_question_set` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `subParameter_inbound_question_set`
--
DROP TABLE IF EXISTS `subParameter_inbound_question_set`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `subParameter_inbound_question_set` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `qTag` varchar(20) NOT NULL,
  `qDescription` varchar(800) NOT NULL DEFAULT '',
  `option` varchar(100) NOT NULL,
  `subTag` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 37 DEFAULT CHARSET = latin1;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `subParameter_inbound_question_set`
--
LOCK TABLES `subParameter_inbound_question_set` WRITE;

/*!40000 ALTER TABLE `subParameter_inbound_question_set` DISABLE KEYS */
;

INSERT INTO
  `subParameter_inbound_question_set`
VALUES
  (
    1,
    'q1',
    'Opening needs to be clear and in enthusiastic tone',
    'Yes/No/NA',
    'q1sub1'
  ),
  (
    2,
    'q1',
    'The call should be answered within 5 sec and in case it takes more than 5 sec the parameter would be marked as NI',
    'Yes/No/NA',
    'q1sub2'
  ),
  (
    3,
    'q1',
    'Brand Name needs to be clear pronounce',
    'Yes/No/NA',
    'q1sub3'
  ),
  (
    4,
    'q1',
    'Clear self introduction with proper opening script',
    'Yes/No/NA',
    'q1sub4'
  ),
  (
    5,
    'q2',
    'Has the CCE identified whether the caller is an IPPB customer.',
    'Yes/No/NA',
    'q2sub1'
  ),
  (
    6,
    'q2',
    ' And Authenticating process before sharing any account level information',
    'Yes/No/NA',
    'q2sub2'
  ),
  (
    7,
    'q2',
    'IVR Authentication status needs to be checked prior to share the information',
    'Yes/No/NA',
    'q2sub3'
  ),
  (
    8,
    'q3',
    'Relevant question asked or requiredinformation obtained from customer to provide the resolution',
    'Yes/No/NA',
    'q3sub'
  ),
  (
    9,
    'q4',
    'Need to be very polite, maintain professionalism throughout the call',
    'Yes/No/NA',
    'q4sub'
  ),
  (
    10,
    'q5',
    'Associate should adherence to soft skills while interacting with the customers.',
    'Yes/No/NA',
    'q5sub1'
  ),
  (
    11,
    'q5',
    'Grammatically correct sentence formation',
    'Yes/No/NA',
    'q5sub2'
  ),
  (
    12,
    'q5',
    'Should not sound monotonous on call',
    'Yes/No/NA',
    'q5sub3'
  ),
  (13, 'q5', 'No switch', 'Yes/No/NA', 'q5sub4'),
  (
    14,
    'q5',
    'Willingness to help should be displayed on call etc.',
    'Yes/No/NA',
    'q5sub5'
  ),
  (
    15,
    'q5',
    'Sounds confident on call',
    'Yes/No/NA',
    'q5sub6'
  ),
  (
    16,
    'q5',
    'No Fillers, fumbling on call',
    'Yes/No/NA',
    'q5sub7'
  ),
  (
    17,
    'q5',
    'Uses same language as that of the customers language',
    'Yes/No/NA',
    'q5sub8'
  ),
  (
    18,
    'q6',
    'Need to be very attentive / active listening , Interruptions on calls which affects the flow of the call/ negatively affects customer experience',
    'Yes/No/NA',
    'q6sub'
  ),
  (
    19,
    'q7',
    'Gave apology/reassurance/appropriate response',
    'Yes/No/NA',
    'q7sub1'
  ),
  (
    20,
    'q7',
    'Need to Acknowledge IVR authentication',
    'Yes/No/NA',
    'q7sub2'
  ),
  (
    21,
    'q7',
    ' Need to Acknowledge customer query',
    'Yes/No/NA',
    'q7sub3'
  ),
  (
    22,
    'q7',
    'use empathy when required/ wordings to build the friendly rapport with customer',
    'Yes/No/NA',
    'q7sub4'
  ),
  (
    23,
    'q8',
    'Hold, Transfer protocol to be followed on call',
    'Yes/No/NA',
    'q8sub1'
  ),
  (
    24,
    'q8',
    'And no extended dead to be used',
    'Yes/No/NA',
    'q8sub2'
  ),
  (
    25,
    'q8',
    'Refresh hold within 1 minute to ask customer to be patient\n',
    'Yes/No/NA',
    'q8sub3'
  ),
  (
    26,
    'q8',
    'If more time required- come back to customer stating its taking long\n',
    'Yes/No/NA',
    'q8sub4'
  ),
  (
    27,
    'q8',
    'Before transferring try to convince the customer, if still customer want to speak to supervisor/ senior do warm transfer',
    'Yes/No/NA',
    'q8sub5'
  ),
  (
    28,
    'q8',
    'If taking long inform and do cold transfer and if customer refuses for cold transfer, ask him to call back. If customer insists on staying on line then repeat warm transfer attempt without refreshing holds',
    'Yes/No/NA',
    'q8sub6'
  ),
  (
    29,
    'q9',
    'Need to Provide accurate and correct information to the customer as per the process, avoid wrong commitments / wrong resolutions',
    'Yes/No/NA',
    'q9sub'
  ),
  (
    30,
    'q10',
    'Need to tag the call as per the process tagging SOP	',
    'Yes/No/NA',
    'q10sub'
  ),
  (
    31,
    'q11',
    'Call closure need to be adhered and additional help to be asked if required	',
    'Yes/No/NA',
    'q11sub'
  ),
  (
    32,
    'q12',
    'QE\' s will gauge the interaction and identify customer delighter if any	',
    'Yes/No/NA',
    'q12sub'
  ),
  (
    33,
    'q13',
    'This is the compliance check parameter, where QE will be check the lead generation compliance( Agent has followed the lead generation SOP/ guidelines or not )',
    'Yes/No/NA',
    'q13sub'
  ),
  (
    34,
    'q14',
    'Non Scorable Parameter - This is the compliance check parameter, wherein QE will be check the Authentication compliance( Agent has followed the correct authentication process or not',
    'Yes/No/NA',
    'q14sub'
  ),
  (
    35,
    'q15',
    'Whether, Is this a Repeat Interaction observed if any',
    'Yes/No/NA',
    'q15sub'
  ),
  (
    36,
    'q16',
    'Whether this call lead to Probable Repeat in future if any	',
    'Yes/No/NA',
    'q16sub'
  );

/*!40000 ALTER TABLE `subParameter_inbound_question_set` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `subParameter_outbound_question_set`
--
DROP TABLE IF EXISTS `subParameter_outbound_question_set`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `subParameter_outbound_question_set` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `qTag` varchar(20) NOT NULL,
  `qDescription` varchar(800) NOT NULL DEFAULT '',
  `option` varchar(100) NOT NULL,
  `subTag` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 20 DEFAULT CHARSET = latin1;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `subParameter_outbound_question_set`
--
LOCK TABLES `subParameter_outbound_question_set` WRITE;

/*!40000 ALTER TABLE `subParameter_outbound_question_set` DISABLE KEYS */
;

INSERT INTO
  `subParameter_outbound_question_set`
VALUES
  (
    1,
    'q1',
    'Call opened on time,Agent used the greeting verbiage (introduced self and company)',
    'Yes/No/NA',
    'q1sub1'
  ),
  (
    2,
    'q1',
    'Tone was pleasant/clear/with appropriate pace (3 sec)',
    'Yes/No/NA',
    'q1sub2'
  ),
  (
    3,
    'q2',
    'Sought Permission before proceeding with the call & mentioned the reason of call',
    'Yes/No/NA',
    'q2sub'
  ),
  (
    4,
    'q3',
    'Agent asked appropriate probing questions to know the need of the caller',
    'Yes/No/NA',
    'q3sub'
  ),
  (
    5,
    'q4',
    'In case of any scenario wherein any account level information is supposed to be share Associates need to authenticate the customer by asking verification questions on call',
    'Yes/No/NA',
    'q4sub'
  ),
  (
    6,
    'q5',
    'Hold Procedure/ Transfer (Permission,Duration and Reason), Dead air (5 secs)',
    'Yes/No/NA',
    'q5sub'
  ),
  (
    7,
    'q6',
    'Agent sounded confident on the information given to the caller/ Agent was patient and did not interrupt the customer',
    'Yes/No/NA',
    'q6sub'
  ),
  (
    8,
    'q7',
    'Agent acknowledged wherever requiredwith appropriate verbal notes & Was the agent attentive and did not make the customer repeat',
    'Yes/No/NA',
    'q7sub'
  ),
  (
    9,
    'q8',
    'Did the agent showed empathy whenever required/gave assurance by taking accountibility',
    'Yes/No/NA',
    'q8sub'
  ),
  (
    10,
    'q9',
    'Effective objection handling',
    'Yes/No/NA',
    'q9sub'
  ),
  (
    11,
    'q10',
    'Rude behaviour/sarcasm/personal conversation/abusive language/was avoided on call/ Disconnecting the call/deliberate use of hold/mute/ any other case of call avoidance was not observed',
    'Yes/No/NA',
    'q10sub'
  ),
  (
    12,
    'q11',
    'Agent spoke in customer preferred language or Agent switched to customers language when requiredand sought permission if language switched',
    'Yes/No/NA',
    'q11sub'
  ),
  (
    13,
    'q12',
    'Sentence formation & grammar, did not use Jargons',
    'Yes/No/NA',
    'q12sub'
  ),
  (
    14,
    'q13',
    'Rate of speech was proper and matched the callers pace',
    'Yes/No/NA',
    'q13sub'
  ),
  (
    15,
    'q14',
    'Agent took accountability and gave assurance/ Tried to build a rapport with the caller/personalised the call/ Call back was made whenever it was promised/required',
    'Yes/No/NA',
    'q14sub'
  ),
  (
    16,
    'q15',
    'Given complete & correct information on the call(TAT, charges, to show the bill copy etc..)',
    'Yes/No/NA',
    'q15sub'
  ),
  (
    17,
    'q16',
    'Additional information given on the call basis the call scenario',
    'Yes/No/NA',
    'q16sub'
  ),
  (
    18,
    'q17',
    'Agent summarized (paraphrase)the call as and when required/ Agents closed the call with standard script',
    'Yes/No/NA',
    'q17sub'
  ),
  (
    19,
    'q18',
    'System/CRM documentation was followed/ Duplication of records was avoided, captured all the requiredfields/ Booked under correct key accounts',
    'Yes/No/NA',
    'q18sub'
  );

/*!40000 ALTER TABLE `subParameter_outbound_question_set` ENABLE KEYS */
;

UNLOCK TABLES;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */
;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */
;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */
;

/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */
;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */
;

-- Dump completed on 2024-02-02 11:37:44