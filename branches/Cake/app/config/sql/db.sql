--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
	`cname` text NOT NULL,
	`cID` int(11) NOT NULL auto_increment,
	PRIMARY KEY  (`cID`)
) ENGINE=InnoDB;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
	`pID` bigint(20) NOT NULL auto_increment,
	`content` text NOT NULL,
	`time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`uID` bigint(20) NOT NULL,
	`wikiptr` bigint(20) default NULL,
	`cID` bigint(20) NOT NULL,
	PRIMARY KEY  (`pID`),
	Foreign Key(`cID`) references categories,
	Foreign Key(`uID`) references users
) ENGINE=InnoDB;

--
-- Table structure for table `t2p`
--

DROP TABLE IF EXISTS `t2p`;
CREATE TABLE `t2p` (
	`pID` int(11) NOT NULL,
	`tID` int(11) NOT NULL,
	PRIMARY KEY  (`tID`)
	Foreign Key(`pID`) references posts 
	Foreign Key(`tID`) references tags 
) ENGINE=InnoDB;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
	`tID` int(11) NOT NULL auto_increment,
	`name` text NOT NULL,
	PRIMARY KEY  (`tID`)
) ENGINE=InnoDB;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
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

DROP TABLE IF EXISTS `wiki`;
DROP TABLE IF EXISTS `wikis`;
CREATE TABLE `wikis` (
	`wID` bigint(20) NOT NULL auto_increment,
	`pID` bigint(20) NOT NULL,
	`content` mediumtext NOT NULL,
	`date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`uID` bigint(20) NOT NULL,
	PRIMARY KEY  (`wID`),
	Foreign Key(`pID`) references posts 
) ENGINE=InnoDB;

--
-- Table structure for table `groups`
--
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
	`gID` bigint(20) NOT NULL auto_increment,
	`pID` bigint(20) NOT NULL,
	`name` text NOT NULL,
	`usercount` int NOT NULL,
	PRIMARY KEY  (`gID`)
) ENGINE=InnoDB;

--
-- Table structure for table `security`
--
DROP TABLE IF EXISTS `security`;
CREATE TABLE `security` (
	`uID` bigint(20) NOT NULL,
	`gID` bigint(20) NOT NULL,
	`pID` bigint(20) NOT NULL,
	`permissions` int NOT NULL,
	PRIMARY KEY (`PID`),
	Foreign Key(`pID`) references posts,
	Foreign Key(`uID`) references users, 
	Foreign Key(`gID`) references groups, 
) ENGINE=InnoDB;

--
-- Table structure for table `u2g`
--

DROP TABLE IF EXISTS `u2g`;
CREATE TABLE `u2g` (
	`uID` int(11) NOT NULL,
	`gID` int(11) NOT NULL,
	PRIMARY KEY  (`gID`),
	Foreign Key(`uID`) references users,
	Foreign Key(`gID`) references groups, 
) ENGINE=InnoDB;

