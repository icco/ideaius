--CREATE DATABASE ideaius;

-- Drop it like it's hot.
DROP TABLE IF EXISTS `u2g`;
DROP TABLE IF EXISTS `t2p`;
DROP TABLE IF EXISTS `security`;
DROP TABLE IF EXISTS `posts`;
DROP TABLE IF EXISTS `tags`;
DROP TABLE IF EXISTS `wiki`;
DROP TABLE IF EXISTS `wikis`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `groups`;
DROP TABLE IF EXISTS `categories`;

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
	`cname` text NOT NULL,
	`cID` bigint(20) UNSIGNED NOT NULL auto_increment,
	PRIMARY KEY  (`cID`)
) ENGINE=InnoDB;

--
-- Table structure for table `groups`
--
CREATE TABLE `groups` (
	`gID` bigint(20) UNSIGNED NOT NULL auto_increment,
	`pID` bigint(20) UNSIGNED NOT NULL,
	`name` text NOT NULL,
	`usercount` int NOT NULL,
	PRIMARY KEY  (`gID`)
) ENGINE=InnoDB;

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
	`uID` bigint(20) unsigned NOT NULL auto_increment,
	`RealName` text,
	`uname` text NOT NULL,
	`email` text NOT NULL,
	`passwd` text NOT NULL,
	`bday` date default NULL,
	`location` text,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY  (`uID`)
) ENGINE=InnoDB;


--
-- Table structure for table `wiki`
--
CREATE TABLE `wikis` (
	`wID` bigint(20) UNSIGNED NOT NULL auto_increment,
	`content` mediumtext NOT NULL,
	`edate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`uID` bigint(20) NOT NULL,
	PRIMARY KEY  (`wID`),
	Foreign Key(`uID`) references users(`uID`)
) ENGINE=InnoDB;

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
	`tID` bigint(20) UNSIGNED NOT NULL auto_increment,
	`name` text NOT NULL,
	PRIMARY KEY  (`tID`)
) ENGINE=InnoDB;

--
-- Table structure for table `posts`
--
CREATE TABLE `posts` (
	`pID` bigint(20) UNSIGNED NOT NULL auto_increment,
	`content` text NOT NULL,
	`ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`uID` bigint(20) UNSIGNED NOT NULL,
	`wikiptr` bigint(20) UNSIGNED default NULL,
	`cID` bigint(20) UNSIGNED NOT NULL,
	PRIMARY KEY  (`pID`),
	Foreign Key(`cID`) references categories(`cID`),
	Foreign Key(`uID`) references users(`uID`),
	Foreign Key(`wikiptr`) references wikis(`wID`)
) ENGINE=InnoDB;

--
-- Table structure for table `security`
--
CREATE TABLE `security` (
	`uID` bigint(20) UNSIGNED NOT NULL,
	`gID` bigint(20) UNSIGNED NOT NULL,
	`pID` bigint(20) UNSIGNED NOT NULL,
	`permissions` int NOT NULL,
	PRIMARY KEY (`pID`),
	Foreign Key(`pID`) references posts(`pID`),
	Foreign Key(`uID`) references users(`uID`), 
	Foreign Key(`gID`) references groups(`gID`) 
) ENGINE=InnoDB;

--
-- Table structure for table `t2p`
--
CREATE TABLE `t2p` (
	`pID` bigint(20) UNSIGNED NOT NULL,
	`tID` bigint(20) UNSIGNED NOT NULL,
	PRIMARY KEY  (`tID`),
	Foreign Key(`pID`) references posts(`pID`),
	Foreign Key(`tID`) references tags(`tID`) 
) ENGINE=InnoDB;

--
-- Table structure for table `u2g`
--
CREATE TABLE `u2g` (
	`uID` bigint(20) unsigned NOT NULL,
	`gID` bigint(20) UNSIGNED NOT NULL,
	PRIMARY KEY  (`gID`),
	Foreign Key(`uID`) references users(`uID`),
	Foreign Key(`gID`) references groups(`gID`) 
) ENGINE=InnoDB;

