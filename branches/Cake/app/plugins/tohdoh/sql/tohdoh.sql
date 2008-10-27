CREATE TABLE `tohdoh_nodes` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `type` enum('L','T') collate utf8_unicode_ci NOT NULL default 'L',
  `done` tinyint(4) NOT NULL default '0',
  `position` int(10) unsigned NOT NULL default '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
);
