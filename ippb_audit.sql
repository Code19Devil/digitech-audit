CREATE DATABASE `ippb_audit`;

USE `ippb_audit`;

DROP TABLE IF EXISTS `ccs_activity_log`;

CREATE TABLE `ccs_activity_log` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `action` varchar(1000) NOT NULL,
  `actionBy` varchar(20) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `ccs_user_roles`;

CREATE TABLE `ccs_user_roles` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

LOCK TABLES `ccs_user_roles` WRITE;

INSERT INTO
  `ccs_user_roles`
VALUES
  (1, 'admin', 1, '2023-07-21 23:45:35'),
  (2, 'qagent', 1, '2023-07-21 23:45:35'),
  (5, 'all', 1, '2023-10-11 03:39:00'),
  (6, 'agent', 1, '2023-10-11 03:39:00');

UNLOCK TABLES;

DROP TABLE IF EXISTS `ccs_users`;

CREATE TABLE `ccs_users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `loginid` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL DEFAULT '',
  `role` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

LOCK TABLES `ccs_users` WRITE;

INSERT INTO
  `ccs_users`
VALUES
  (
    1,
    'admin',
    'admin',
    'Admin',
    '1',
    1,
    0,
    '2023-08-01 05:53:21'
  ),
  (
    2,
    'rohan',
    'rohan',
    'Rohan Singh Luckee',
    '2',
    1,
    0,
    '2023-09-29 02:25:41'
  ),
  (
    3,
    'gunjan',
    'gunjan',
    'Gunjan Mishra',
    '3',
    1,
    0,
    '2023-09-29 02:26:14'
  ),
  (
    4,
    'luckee',
    'luckee',
    'Luckee',
    '4',
    1,
    0,
    '2023-09-29 02:26:14'
  );

UNLOCK TABLES;

DROP TABLE IF EXISTS `email_call_monitoring`;

CREATE TABLE `email_call_monitoring` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `handlingUser` int NOT NULL,
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
  `contact` varchar(80) NOT NULL DEFAULT '',
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
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `email_question_set`;

CREATE TABLE `email_question_set` (
  `id` int NOT NULL AUTO_INCREMENT,
  `qTag` varchar(10) NOT NULL,
  `isFatal` varchar(10) NOT NULL DEFAULT '',
  `qGroup` varchar(150) NOT NULL,
  `qHeader` varchar (200) NOT NULL,
  `question` varchar(400) NOT NULL,
  `qDescription` varchar(800) DEFAULT NULL,
  `option` varchar(100) NOT NULL,
  `weightage` int NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

CREATE TABLE `agent_feedback` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `mType` varchar(10) NOT NULL,
  `agentId` varchar(100) NOT NULL,
  `mId` INT NOT NULL,
  `score` INT NOT NULL,
  `accepted` boolean NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY(`mType`, `mId`, `agentId`)
);

LOCK TABLES `email_question_set` WRITE;

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

UNLOCK TABLES;

DROP TABLE IF EXISTS `inbound_call_monitoring`;

CREATE TABLE `inbound_call_monitoring` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `handlingUser` int NOT NULL,
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
  `contact` varchar(80) NOT NULL DEFAULT '',
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
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `inbound_question_set`;

CREATE TABLE `inbound_question_set` (
  `id` int NOT NULL AUTO_INCREMENT,
  `qTag` varchar(10) NOT NULL,
  `isFatal` varchar(10) NOT NULL DEFAULT '',
  `qGroup` varchar(150) NOT NULL,
  `question` varchar(400) NOT NULL,
  `qDescription` varchar(800) DEFAULT NULL,
  `option` varchar(100) NOT NULL,
  `weightage` int NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

LOCK TABLES `inbound_question_set` WRITE;

INSERT INTO
  `inbound_question_set`
VALUES
  (
    1,
    'q1',
    '',
    'Greeting',
    'Call Opening',
    'Opening needs to be clear and in enthusiastic tone.<br>\n      -The call should be answered within 5 sec and in case it takes more than 5 sec the parameter would be marked as NI<br>\n      -Brand Name needs to be clear pronounce<br>\n      -Clear self introduction with proper opening script',
    'Yes/No/NA',
    5,
    '2023-08-04 05:26:28'
  ),
  (
    2,
    'q2',
    'No',
    'Customer Identification & Authentication',
    'Customer Identification & Verification/ Authentication',
    'Has the CCE identified whether the caller is an IPPB customer. <br>\n    -And Authenticating process before sharing any account level information<br>\n     - IVR Authentication status needs to be checked prior to share the information.',
    'Yes/No/NA',
    10,
    '2023-08-04 05:26:28'
  ),
  (
    3,
    'q3',
    '',
    'Probing',
    'Relevant Probing',
    'Relevant question asked or requiredinformation obtained from customer to provide the resolution',
    'Yes/No/NA',
    10,
    '2023-08-04 05:26:28'
  ),
  (
    4,
    'q4',
    'No',
    'Soft Skills',
    'Being Polite & Professional on Call',
    'Need to be very polite, maintain professionalism throughout the call',
    'Yes/No/NA',
    10,
    '2023-08-04 05:26:28'
  ),
  (
    5,
    'q5',
    '',
    'Soft Skills',
    'Language & Communication',
    'Associate should adherence to soft skills while interacting with the customers.<br>\n-Grammatically correct sentence formation<br>\n-Should not sound monotonous on call<br>\n-No switch <br>\n-Willingness to help should be displayed on call etc.<br>\n-Sounds confident on call<br>\n-No Fillers, fumbling on call<br>\n-Uses same language as that of the customers language',
    'Yes/No/NA',
    5,
    '2023-08-04 05:26:28'
  ),
  (
    6,
    'q6',
    '',
    'Soft Skills',
    'Active Listening',
    'Need to be very attentive / active listening , Interruptions on calls which affects the flow of the call/ negatively affects customer experience',
    'Yes/No/NA',
    8,
    '2023-08-04 05:26:28'
  ),
  (
    7,
    'q7',
    '',
    'Soft Skills',
    'Acknowledgement',
    '* Gave apology/reassurance/appropriate response  <br>\n      * Need to Acknowledge IVR authentication <br>\n      * Need to Acknowledge customer query<br>\n       use empathy when required/ wordings to build the friendly rapport with customer',
    'Yes/No/NA',
    7,
    '2023-08-04 05:26:28'
  ),
  (
    8,
    'q8',
    '',
    'Hold/ Transfer Protocol',
    'Hold/ Dead Air/ Transfer Courtesy',
    '*Hold, Transfer protocol to be followed on call<br>\n*And no extended dead to be used<br>\n*Refresh hold within 1 minute to ask customer to be patient<br>\n*If more time required- come back to customer stating its taking long<br>\n*Before transferring try to convince the customer, if still customer want to speak to supervisor/ senior do warm transfer<br>\n*If taking long inform and do cold transfer and if customer refuses for cold transfer, ask him to call back. If customer insists on staying on line then repeat warm transfer attempt without refreshing holds',
    'Yes/No/NA',
    10,
    '2023-08-04 05:26:28'
  ),
  (
    9,
    'q9',
    'No',
    'Resolution',
    'Correct & Complete',
    'Need to Provide accurate and correct information to the customer as per the process, avoid wrong commitments / wrong resolutions',
    'Yes/No/NA',
    15,
    '2023-08-04 05:26:28'
  ),
  (
    10,
    'q10',
    'No',
    'Documentation',
    'Tagging & Documentation of Details',
    'Need to tag the call as per the process tagging SOP ',
    'Yes/No/NA',
    15,
    '2023-08-04 05:26:28'
  ),
  (
    11,
    'q11',
    '',
    'Call Closing',
    'Call Closing & Additional Help',
    'Call closure need to be adhered and  additional help to be asked if required',
    'Yes/No/NA',
    5,
    '2023-08-04 05:26:28'
  ),
  (
    12,
    'q12',
    '',
    'Predictive Customer Satisfaction Index',
    '<b>Non Scorable Parameter</b><br>\n     Accordingly to QE \'s gauging of the interaction, would this be a customer delighter',
    'QE\' s will gauge the interaction and identify customer delighter if any',
    'Yes/No/NA',
    0,
    '2023-08-04 05:26:28'
  ),
  (
    13,
    'q13',
    '',
    'Compliance Check ',
    'Lead Generation Compliance Check',
    '<b>Non Scorable Parameter</b><br>\n        - This is the compliance check parameter, where QE will be check the lead generation compliance( Agent has followed the lead generation SOP/ guidelines or not )',
    'Yes/No/NA',
    0,
    '2023-08-04 05:26:28'
  ),
  (
    14,
    'q14',
    '',
    'Compliance Check ',
    'Authentication Flag',
    '<b>Non Scorable Parameter</b>\n      - This is the compliance check parameter, wherein QE will be check the  Authentication compliance( Agent has followed the correct authentication process or not',
    'Yes/No/NA',
    0,
    '2023-08-04 05:26:28'
  ),
  (
    15,
    'q15',
    '',
    'Repeat',
    '<b>Non Scorable Parameter</b><br>\n      Is this a Repeat Interaction ? <br>\n       Logic to be followed Day - 7 (D-7)',
    'Whether, Is this a Repeat Interaction observed if any',
    'Yes/No/NA',
    0,
    '2023-08-04 05:26:28'
  ),
  (
    16,
    'q16',
    '',
    'Repeat',
    '<b>Non Scorable Parameter</b><br>\n       Will this call lead to Probable Repeat?',
    'Whether this call lead to Probable Repeat in future if any',
    'Yes/No/NA',
    0,
    '2023-08-04 05:26:28'
  );

UNLOCK TABLES;

DROP TABLE IF EXISTS `outbound_call_monitoring`;

CREATE TABLE `outbound_call_monitoring` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `handlingUser` int NOT NULL,
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
  `contact` varchar(80) NOT NULL DEFAULT '',
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
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `outbound_question_set`;

CREATE TABLE `outbound_question_set` (
  `id` int NOT NULL AUTO_INCREMENT,
  `qTag` varchar(10) NOT NULL,
  `isFatal` varchar(10) NOT NULL DEFAULT '',
  `qGroup` varchar(150) NOT NULL,
  `qHeader` varchar (200) NOT NULL,
  `question` varchar(400) NOT NULL,
  `qDescription` varchar(800) DEFAULT NULL,
  `option` varchar(100) NOT NULL,
  `weightage` int NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO
  `outbound_question_set`
VALUES
  (
    1,
    'q1',
    '',
    'Greeting',
    'Opening of the call',
    'Call opened on time,Agent used the greeting verbiage (introduced self and company),Tone was pleasant/clear/with appropriate pace (3 sec)',
    'Yes/No/NA',
    5,
    '2023-08-04 10:56:28'
  ),
  (
    2,
    'q2',
    '',
    'Call Permission / Reason',
    'Seek Permission/ Reason of Call',
    'Sought Permission before proceeding with the call & mentioned the reason of call',
    'Yes/No/NA',
    4,
    '2023-08-04 10:56:28'
  ),
  (
    3,
    'q3',
    '',
    'Query',
    'Understood customers Query',
    'Agent asked appropriate probing questions to know the need of the caller',
    'Yes/No/NA',
    4,
    '2023-08-04 10:56:28'
  ),
  (
    4,
    'q4',
    'No',
    'Authentication',
    'Authentication',
    'In case of any scenario wherein any account level information is supposed to be share Associates need to authenticate the customer by asking verification questions on call',
    'Yes/No/NA',
    8,
    '2023-08-04 10:56:28'
  ),
  (
    5,
    'q5',
    '',
    'Hold/ Transfer',
    'Hold/ Transfer procedure followed',
    'Hold Procedure/ Transfer (Permission,Duration and Reason), Dead air (5 secs)',
    'Yes/No/NA',
    5,
    '2023-08-04 10:56:28'
  ),
  (
    6,
    'q6',
    '',
    'Call Control',
    'Call Control',
    'Agent sounded confident on the information given to the caller/ Agent was patient and did not interrupt the customer',
    'Yes/No/NA',
    4,
    '2023-08-04 10:56:28'
  ),
  (
    7,
    'q7',
    '',
    'Call Control',
    'Call Control',
    'Agent acknowledged wherever requiredwith appropriate verbal notes  & Was the agent attentive and did not make the customer repeat',
    'Yes/No/NA',
    3,
    '2023-08-04 10:56:28'
  ),
  (
    8,
    'q8',
    '',
    'Call Control',
    'Call Control',
    'Did the agent showed empathy whenever required/gave assurance by taking accountibility',
    'Yes/No/NA',
    3,
    '2023-08-04 10:56:28'
  ),
  (
    9,
    'q9',
    'No',
    'Objection Handling',
    'Objection Handling',
    'Effective objection handling',
    'Yes/No/NA',
    8,
    '2023-08-04 10:56:28'
  ),
  (
    10,
    'q10',
    'No',
    'Professionalism',
    'Professionalism',
    'Rude behaviour/sarcasm/personal conversation/abusive language/was avoided on call/ Disconnecting the call/deliberate use of hold/mute/ any other case of call avoidance was not observed',
    'Yes/No/NA',
    8,
    '2023-08-04 10:56:28'
  ),
  (
    11,
    'q11',
    '',
    'Language and Grammar',
    'Language and Grammar',
    'Agent spoke in customer preferred language or Agent switched to customers language when requiredand sought permission if language switched',
    'Yes/No/NA',
    5,
    '2023-08-04 10:56:28'
  ),
  (
    12,
    'q12',
    '',
    'Language and Grammar',
    'Language and Grammar',
    'Sentence formation & grammar, did not use Jargons',
    'Yes/No/NA',
    5,
    '2023-08-04 10:56:28'
  ),
  (
    13,
    'q13',
    '',
    'Language and Grammar',
    'Language and Grammar',
    'Rate of speech was proper and matched the callers pace',
    'Yes/No/NA',
    4,
    '2023-08-04 10:56:28'
  ),
  (
    14,
    'q14',
    'No',
    'Ownership',
    'Ownership',
    'Agent took accountability and gave assurance/ Tried to build a rapport with the caller/personalised the call/ Call back was made whenever it was promised/required',
    'Yes/No/NA',
    8,
    '2023-08-04 10:56:28'
  ),
  (
    15,
    'q15',
    'No',
    'Information',
    'Correct/ Complete information provided',
    'Given complete & correct information on the call(TAT, charges, to show the bill copy etc..)',
    'Yes/No/NA',
    8,
    '2023-08-04 10:56:28'
  ),
  (
    16,
    'q16',
    '',
    'Additional Information',
    'Additional Information',
    'Additional information given on the call basis the call scenario',
    'Yes/No/NA',
    3,
    '2023-08-04 10:56:28'
  ),
  (
    17,
    'q17',
    '',
    'Call Closing',
    'Call Closing',
    'Agent summarized (paraphrase)the call as and when required/ Agents closed the call with standard script',
    'Yes/No/NA',
    5,
    '2023-08-04 10:56:28'
  ),
  (
    18,
    'q18',
    'No',
    'Tagging',
    'Tagging',
    'System/CRM documentation was followed/ Duplication of records was avoided, captured all the requiredfields/ Booked under correct key accounts',
    'Yes/No/NA',
    10,
    '2023-08-04 10:56:28'
  );

alter table
  inbound_call_monitoring
add
  column q1sub1 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q1sub2 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q1sub3 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q1sub4 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q2sub1 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q2sub2 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q2sub3 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q3sub varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q4sub varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q5sub1 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q5sub2 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q5sub3 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q5sub4 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q5sub5 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q5sub6 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q5sub7 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q5sub8 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q6sub varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q7sub1 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q7sub2 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q7sub3 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q7sub4 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q8sub1 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q8sub2 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q8sub3 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q8sub4 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q8sub5 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q8sub6 varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q9sub varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q10sub varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q11sub varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q12sub varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q13sub varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q14sub varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q15sub varchar(100) not null default '';

alter table
  inbound_call_monitoring
add
  column q16sub varchar(100) not null default '';

alter table
  outbound_call_monitoring
add
  column q1sub1 varchar(100) not null default '';

alter table
  outbound_call_monitoring
add
  column q1sub2 varchar(100) not null default '';

alter table
  outbound_call_monitoring
add
  column q2sub varchar(100) not null default '';

alter table
  outbound_call_monitoring
add
  column q3sub varchar(100) not null default '';

alter table
  outbound_call_monitoring
add
  column q4sub varchar(100) not null default '';

alter table
  outbound_call_monitoring
add
  column q5sub varchar(100) not null default '';

alter table
  outbound_call_monitoring
add
  column q6sub varchar(100) not null default '';

alter table
  outbound_call_monitoring
add
  column q7sub varchar(100) not null default '';

alter table
  outbound_call_monitoring
add
  column q8sub varchar(100) not null default '';

alter table
  outbound_call_monitoring
add
  column q9sub varchar(100) not null default '';

alter table
  outbound_call_monitoring
add
  column q10sub varchar(100) not null default '';

alter table
  outbound_call_monitoring
add
  column q11sub varchar(100) not null default '';

alter table
  outbound_call_monitoring
add
  column q12sub varchar(100) not null default '';

alter table
  outbound_call_monitoring
add
  column q13sub varchar(100) not null default '';

alter table
  outbound_call_monitoring
add
  column q14sub varchar(100) not null default '';

alter table
  outbound_call_monitoring
add
  column q15sub varchar(100) not null default '';

alter table
  outbound_call_monitoring
add
  column q16sub varchar(100) not null default '';

alter table
  outbound_call_monitoring
add
  column q17sub varchar(100) not null default '';

alter table
  outbound_call_monitoring
add
  column q18sub varchar(100) not null default '';

alter table
  email_call_monitoring
add
  column q1sub1 varchar(100) not null default '';

alter table
  email_call_monitoring
add
  column q1sub2 varchar(100) not null default '';

alter table
  email_call_monitoring
add
  column q2sub varchar(100) not null default '';

alter table
  email_call_monitoring
add
  column q3sub varchar(100) not null default '';

alter table
  email_call_monitoring
add
  column q4sub varchar(100) not null default '';

alter table
  email_call_monitoring
add
  column q5sub varchar(100) not null default '';

alter table
  email_call_monitoring
add
  column q6sub varchar(100) not null default '';

alter table
  email_call_monitoring
add
  column q7sub varchar(100) not null default '';

alter table
  email_call_monitoring
add
  column q8sub varchar(100) not null default '';

alter table
  email_call_monitoring
add
  column q9sub varchar(100) not null default '';

alter table
  email_call_monitoring
add
  column q10sub varchar(100) not null default '';

alter table
  email_call_monitoring
add
  column q11sub varchar(100) not null default '';

alter table
  email_call_monitoring
add
  column q12sub varchar(100) not null default '';

alter table
  email_call_monitoring
add
  column q13sub varchar(100) not null default '';

alter table
  email_call_monitoring
add
  column q14sub varchar(100) not null default '';