INSERT INTO `qb_hack` (`keywords`, `name`, `isclose`, `author`, `config`, `htmlcode`, `hackfile`, `hacksqltable`, `adminurl`, `about`, `class1`, `class2`, `list`, `linkname`, `isbiz`) VALUES ('sell_telephone', '�绰������', 0, '', '', '', '', '', 'index.php?lfj=sell_telephone&job=list', '', 'other', '��������', 0, '', 0);


CREATE TABLE `qb_sell_telephone` (
  `id` mediumint(7) NOT NULL auto_increment,
  `uid` mediumint(7) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `posttime` int(10) NOT NULL default '0',
  `begintime` int(10) NOT NULL default '0',
  `endtime` int(10) NOT NULL default '0',
  `money` int(7) NOT NULL default '0',
  `city_id` int(7) NOT NULL default '0',
  `yz` tinyint(1) NOT NULL default '1',
  `telephone` varchar(20) NOT NULL default '',
  `title` varchar(50) NOT NULL default '',
  `about` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`),
  KEY `yz` (`yz`),
  KEY `city_id` (`city_id`,`endtime`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;
