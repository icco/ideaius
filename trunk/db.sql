--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
	`name` text NOT NULL,
	`ID` int(11) NOT NULL auto_increment,
	PRIMARY KEY  (`ID`)
) ENGINE=MyISAM;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
	`ID` bigint(20) NOT NULL auto_increment,
	`content` text NOT NULL,
	`time` datetime NOT NULL,
	`user` bigint(20) NOT NULL,
	`wikiptr` bigint(20) default NULL,
	`cID` bigint(20) NOT NULL,
	PRIMARY KEY  (`ID`)
) ENGINE=MyISAM;

--
-- Table structure for table `t2p`
--

DROP TABLE IF EXISTS `t2p`;
CREATE TABLE `t2p` (
	`pID` int(11) NOT NULL,
	`tID` int(11) NOT NULL,
	PRIMARY KEY  (`tID`)
) ENGINE=MyISAM;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
	`ID` int(11) NOT NULL auto_increment,
	`name` text NOT NULL,
	PRIMARY KEY  (`ID`)
) ENGINE=MyISAM;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
	`ID` bigint(20) unsigned NOT NULL auto_increment,
	`RealName` text,
	`uname` text NOT NULL,
	`email` text NOT NULL,
	`passwd` text NOT NULL,
	`bday` date default NULL,
	`location` text,
	`created` datetime NOT NULL,
	PRIMARY KEY  (`ID`)
) ENGINE=MyISAM;

--
-- Table structure for table `wiki`
--

DROP TABLE IF EXISTS `wiki`;
CREATE TABLE `wiki` (
	`ID` bigint(20) NOT NULL auto_increment,
	`pID` bigint(20) NOT NULL,
	`content` mediumtext NOT NULL,
	`date` datetime NOT NULL,
	`uID` bigint(20) NOT NULL,
	PRIMARY KEY  (`ID`)
) ENGINE=MyISAM;

--
-- Table structure for table `groups`
--
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
	`ID` bigint(20) NOT NULL auto_increment,
	`pID` bigint(20) NOT NULL,
	`name` text NOT NULL,
	`usercount` int NOT NULL,
	PRIMARY KEY  (`ID`)
) ENGINE=MyISAM;

--
-- Table structure for table `security`
--
DROP TABLE IF EXISTS `security`;
CREATE TABLE `security` (
	`uID` bigint(20) NOT NULL,
	`gID` bigint(20) NOT NULL,
	`pID` bigint(20) NOT NULL,
	`permissions` int NOT NULL,
	PRIMARY KEY (`PID`)
) ENGINE=MyISAM;

