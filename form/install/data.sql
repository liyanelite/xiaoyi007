INSERT INTO `qb_module` (`id`, `type`, `name`, `pre`, `dirname`, `domain`, `admindir`, `config`, `list`, `admingroup`, `adminmember`, `ifclose`) VALUES (21, 2, '���ܱ�', 'form_', 'form', '', '', '', 0, '', '', 0);


DROP TABLE IF EXISTS `qb_form_config`;
CREATE TABLE `qb_form_config` (
  `c_key` varchar(50) NOT NULL default '',
  `c_value` text NOT NULL,
  `c_descrip` text NOT NULL,
  PRIMARY KEY  (`c_key`)
) TYPE=MyISAM;

#
# �������е����� `qb_form_config`
#

INSERT INTO `qb_form_config` VALUES ('module_id', '21', '');
INSERT INTO `qb_form_config` VALUES ('module_pre', 'form_', '');
INSERT INTO `qb_form_config` VALUES ('Info_webOpen', '1', '');
INSERT INTO `qb_form_config` VALUES ('Info_webname', '���ܱ�', '');

# --------------------------------------------------------

#
# ��Ľṹ `qb_form_content`
#

DROP TABLE IF EXISTS `qb_form_content`;
CREATE TABLE `qb_form_content` (
  `id` mediumint(7) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL default '',
  `mid` smallint(4) NOT NULL default '0',
  `hits` mediumint(7) NOT NULL default '0',
  `posttime` int(10) NOT NULL default '0',
  `list` varchar(10) NOT NULL default '',
  `uid` mediumint(7) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `titlecolor` varchar(15) NOT NULL default '',
  `yz` tinyint(1) NOT NULL default '0',
  `ip` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `hits` (`hits`,`yz`),
  KEY `list` (`list`,`yz`)
) TYPE=MyISAM AUTO_INCREMENT=32 ;

#
# �������е����� `qb_form_content`
#

INSERT INTO `qb_form_content` VALUES (22, '', 7, 0, 1237208241, '1237208241', 1, 'admin', '', 0, '192.168.0.99');
INSERT INTO `qb_form_content` VALUES (26, '', 6, 7, 1237250809, '1237250809', 1, 'admin', '', 0, '192.168.0.99');
INSERT INTO `qb_form_content` VALUES (27, '', 3, 1, 1237260673, '1237260673', 1, 'admin', '', 1, '192.168.0.99');
INSERT INTO `qb_form_content` VALUES (30, '', 2, 7, 1237269830, '1237269830', 1, 'admin', '', 0, '192.168.0.99');
INSERT INTO `qb_form_content` VALUES (29, '', 2, 2, 1237268864, '1237268864', 1, 'admin', '', 0, '192.168.0.99');
INSERT INTO `qb_form_content` VALUES (25, '', 3, 2, 1237214289, '1237214289', 1, 'admin', '', 1, '192.168.0.99');
INSERT INTO `qb_form_content` VALUES (24, '', 6, 3, 1237213169, '1237213169', 1, 'admin', '', 0, '192.168.0.99');
INSERT INTO `qb_form_content` VALUES (31, '', 2, 6, 1239780761, '1239780761', 1, 'admin', '', 0, '192.168.0.99');
INSERT INTO `qb_form_content` VALUES (18, '', 3, 0, 1236936110, '1236936110', 1, 'admin', '', 0, '192.168.0.99');
INSERT INTO `qb_form_content` VALUES (19, '', 5, 0, 1236939584, '1236939584', 1, 'admin', '', 0, '192.168.0.99');
INSERT INTO `qb_form_content` VALUES (20, '', 6, 0, 1237174883, '1237174883', 1, 'admin', '', 0, '192.168.0.99');
INSERT INTO `qb_form_content` VALUES (23, '', 7, 0, 1237208253, '1237208253', 1, 'admin', '', 0, '192.168.0.99');

# --------------------------------------------------------

#
# ��Ľṹ `qb_form_content_1`
#

DROP TABLE IF EXISTS `qb_form_content_1`;
CREATE TABLE `qb_form_content_1` (
  `id` mediumint(7) unsigned NOT NULL default '0',
  `uid` mediumint(7) NOT NULL default '0',
  `truename` varchar(20) NOT NULL default '',
  `sex` int(1) NOT NULL default '0',
  `oicq` varchar(10) NOT NULL default '',
  `mobphone` varchar(11) NOT NULL default '',
  `interest` mediumtext NOT NULL,
  `introduce` mediumtext NOT NULL,
  `sortname` varchar(40) NOT NULL default '',
  `webtime` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`)
) TYPE=MyISAM;

#
# �������е����� `qb_form_content_1`
#


# --------------------------------------------------------

#
# ��Ľṹ `qb_form_content_2`
#

DROP TABLE IF EXISTS `qb_form_content_2`;
CREATE TABLE `qb_form_content_2` (
  `id` mediumint(7) NOT NULL auto_increment,
  `uid` mediumint(7) NOT NULL default '0',
  `workplace` varchar(100) NOT NULL default '',
  `nums` varchar(10) NOT NULL default '',
  `jobrequire` mediumtext NOT NULL,
  `workwhere` varchar(50) NOT NULL default '',
  `wage` varchar(30) NOT NULL default '',
  `asksex` int(1) NOT NULL default '0',
  `schoo_age` varchar(20) NOT NULL default '',
  `wageyear` varchar(12) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`)
) TYPE=MyISAM AUTO_INCREMENT=32 ;

#
# �������е����� `qb_form_content_2`
#

INSERT INTO `qb_form_content_2` VALUES (29, 1, 'JAVA����Ա', '5', '������������', '����', '800Ԫ/��', 2, '����', '��������');
INSERT INTO `qb_form_content_2` VALUES (30, 1, '�г��ܼ�', '2', '�����Ʒ������.', '����', '8000Ԫ/��', 0, '����', '��������');
INSERT INTO `qb_form_content_2` VALUES (31, 1, '���۾���', '8', '�����ҹ�˾�Ĳ�Ʒ����.', '������', '3000', 0, '��ר', 'һ������');

# --------------------------------------------------------

#
# ��Ľṹ `qb_form_content_3`
#

DROP TABLE IF EXISTS `qb_form_content_3`;
CREATE TABLE `qb_form_content_3` (
  `id` mediumint(7) NOT NULL auto_increment,
  `uid` mediumint(7) NOT NULL default '0',
  `advicetype` varchar(30) NOT NULL default '',
  `content` mediumtext NOT NULL,
  `truename` varchar(15) NOT NULL default '',
  `email` varchar(50) NOT NULL default '',
  `mobphone` varchar(25) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`)
) TYPE=MyISAM AUTO_INCREMENT=28 ;

#
# �������е����� `qb_form_content_3`
#

INSERT INTO `qb_form_content_3` VALUES (18, 1, '�ۺ�ͷ�', '', '222223', '65223@qq.com', '133444444443');
INSERT INTO `qb_form_content_3` VALUES (25, 1, '�ۺ�ͷ�', 'hhhhhhhhhhhhhhhhhh', '222223', '65223@qq.com', '13377777777');
INSERT INTO `qb_form_content_3` VALUES (27, 1, '�ۺ�ͷ�', '192.168.0.99/55 all righ\nts reserved \n��ICP��05047353�� \nPowered by PHP168', '222223', '65223@qq.com', '13377777777');

# --------------------------------------------------------

#
# ��Ľṹ `qb_form_content_4`
#

DROP TABLE IF EXISTS `qb_form_content_4`;
CREATE TABLE `qb_form_content_4` (
  `id` mediumint(7) NOT NULL auto_increment,
  `uid` mediumint(7) NOT NULL default '0',
  `truename` varchar(15) NOT NULL default '',
  `sex` int(1) NOT NULL default '0',
  `age` int(2) NOT NULL default '0',
  `mobphone` varchar(25) NOT NULL default '',
  `metier` varchar(30) NOT NULL default '',
  `my_song` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# �������е����� `qb_form_content_4`
#


# --------------------------------------------------------

#
# ��Ľṹ `qb_form_content_5`
#

DROP TABLE IF EXISTS `qb_form_content_5`;
CREATE TABLE `qb_form_content_5` (
  `id` mediumint(7) NOT NULL auto_increment,
  `uid` mediumint(7) NOT NULL default '0',
  `content` mediumtext NOT NULL,
  `bday` varchar(25) NOT NULL default '',
  `school_age` varchar(20) NOT NULL default '',
  `native` varchar(30) NOT NULL default '',
  `specialty` varchar(40) NOT NULL default '',
  `skill` varchar(50) NOT NULL default '',
  `sport` varchar(80) NOT NULL default '',
  `height` int(3) NOT NULL default '0',
  `truename` varchar(15) NOT NULL default '',
  `oicq` varchar(10) NOT NULL default '',
  `email` varchar(50) NOT NULL default '',
  `mobphone` varchar(11) NOT NULL default '',
  `address` varchar(150) NOT NULL default '',
  `telephone` varchar(15) NOT NULL default '',
  `idcard` varchar(18) NOT NULL default '',
  `cp_title` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`)
) TYPE=MyISAM AUTO_INCREMENT=20 ;

#
# �������е����� `qb_form_content_5`
#

INSERT INTO `qb_form_content_5` VALUES (19, 1, '555555555555555', '0000-00-00', '��ר', '����ʽ', '', '', '', 0, '222223', '444444', '65223@qq.com', '13355555555', '3', 'һֱ��fgsgfd3', '44444444444444443', '');

# --------------------------------------------------------

#
# ��Ľṹ `qb_form_content_6`
#

DROP TABLE IF EXISTS `qb_form_content_6`;
CREATE TABLE `qb_form_content_6` (
  `id` mediumint(7) NOT NULL auto_increment,
  `uid` mediumint(7) NOT NULL default '0',
  `workposition` varchar(50) NOT NULL default '',
  `experience` mediumtext NOT NULL,
  `workyear` int(2) NOT NULL default '0',
  `truename` varchar(15) NOT NULL default '',
  `schoo_age` varchar(15) NOT NULL default '',
  `myage` int(2) NOT NULL default '0',
  `graduateschool` varchar(40) NOT NULL default '',
  `specialty` varchar(50) NOT NULL default '',
  `skill` varchar(50) NOT NULL default '',
  `sex` int(1) NOT NULL default '0',
  `telephone` varchar(25) NOT NULL default '',
  `wage` varchar(20) NOT NULL default '',
  `address` varchar(255) NOT NULL default '',
  `email` varchar(50) NOT NULL default '',
  `oicq` varchar(11) NOT NULL default '',
  `worktime` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`)
) TYPE=MyISAM AUTO_INCREMENT=27 ;

#
# �������е����� `qb_form_content_6`
#

INSERT INTO `qb_form_content_6` VALUES (20, 1, '����Ա', '55555555555\nkkkkkkkkkkkkkkkkkkkkkk', 5, '222223', '����', 56, '', '', '', 2, '6767', '����', '3', '65223@qq.com', '444444', '');
INSERT INTO `qb_form_content_6` VALUES (24, 1, 'C���Թ���ʦ', '4444444444444', 4, '222223', '��ר', 4, '', '', '', 2, '090-89766543', '����', '3', '65223@qq.com', '444444', '1����');
INSERT INTO `qb_form_content_6` VALUES (26, 1, 'C���Թ���ʦ', 'rrrrrrrrrrrrrrrrrrrrrrrrrrr', 4, '222223', '��ר', 4, '', '', '', 1, '090-89766543', '1000Ԫ-2000Ԫ', '3', '65223@qq.com', '444444', '1����');

# --------------------------------------------------------

#
# ��Ľṹ `qb_form_content_7`
#

DROP TABLE IF EXISTS `qb_form_content_7`;
CREATE TABLE `qb_form_content_7` (
  `id` mediumint(7) NOT NULL auto_increment,
  `uid` mediumint(7) NOT NULL default '0',
  `product` varchar(50) NOT NULL default '',
  `paymoney` varchar(15) NOT NULL default '',
  `paytime` varchar(15) NOT NULL default '',
  `paytype` varchar(25) NOT NULL default '',
  `sendbank` varchar(30) NOT NULL default '',
  `receivebank` varchar(30) NOT NULL default '',
  `truename` varchar(15) NOT NULL default '',
  `oicq` varchar(11) NOT NULL default '',
  `telephone` varchar(30) NOT NULL default '',
  `mobphone` varchar(11) NOT NULL default '',
  `address` varchar(150) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`)
) TYPE=MyISAM AUTO_INCREMENT=24 ;

#
# �������е����� `qb_form_content_7`
#

INSERT INTO `qb_form_content_7` VALUES (6, 1, '��վϵͳ(����+����)', '6655', '', '����ת��', '', '', '222223', '444444', '3333333', '13333333333', '3trewtre');
INSERT INTO `qb_form_content_7` VALUES (7, 1, '��վϵͳ(����+����)', '23', '2009-03-03', '����֧��', 'fff', 'eee', '222223', '444444', '333', '13344444444', '3');
INSERT INTO `qb_form_content_7` VALUES (8, 1, '��վϵͳ(����+����)', '5', '', '����֧��', '', '', '222223', '444444', 'һֱ��fgsgfd3', '13355555555', '3');
INSERT INTO `qb_form_content_7` VALUES (9, 1, '��վϵͳ(����+����)', '0.01', '2009-03-13', '����֧��', 'e', 's', '222223', '444444', 'һֱ��fgsgfd3', '13355555555', '3');
INSERT INTO `qb_form_content_7` VALUES (10, 1, '��վϵͳ(����+����)', '1', '2009-03-13', '����֧��', 'e', 's', '222223', '444444', 'һֱ��fgsgfd3', '13355555555', '3');
INSERT INTO `qb_form_content_7` VALUES (11, 1, '��վϵͳ(����+����)', '0.01', '2009-03-13', 'olpay', 'e', 's', '222223', '444444', 'һֱ��fgsgfd3', '13355555555', '3');
INSERT INTO `qb_form_content_7` VALUES (12, 1, '��վϵͳ(����+����)/������Ϣϵͳ/�̳�ϵͳ', '54', '2009-03-03', '����ת��', 't', 't', '222223', '444444', 'һֱ��fgsgfd3', '13355555555', '3');
INSERT INTO `qb_form_content_7` VALUES (13, 1, '1/2/�̳�ϵͳ', '4', '', 'olpay', '', '', '222223', '444444', 'һֱ��fgsgfd3', '13344444444', '3');
INSERT INTO `qb_form_content_7` VALUES (22, 1, '1', '78', '', 'olpay', '', '', '222223', '444444', 'һֱ��fgsgfd3', '13377777777', '3');
INSERT INTO `qb_form_content_7` VALUES (23, 1, '1', '78', '', '����ת��', '', '', '222223', '444444', 'һֱ��fgsgfd3', '13377777777', '3');

# --------------------------------------------------------

#
# ��Ľṹ `qb_form_content_8`
#

DROP TABLE IF EXISTS `qb_form_content_8`;
CREATE TABLE `qb_form_content_8` (
  `id` mediumint(7) NOT NULL auto_increment,
  `uid` mediumint(7) NOT NULL default '0',
  `roomtype` varchar(30) NOT NULL default '',
  `roomnum` int(3) NOT NULL default '0',
  `numday` int(3) NOT NULL default '0',
  `intotime` varchar(30) NOT NULL default '',
  `truename` varchar(30) NOT NULL default '',
  `telephone` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# �������е����� `qb_form_content_8`
#


# --------------------------------------------------------

#
# ��Ľṹ `qb_form_module`
#

DROP TABLE IF EXISTS `qb_form_module`;
CREATE TABLE `qb_form_module` (
  `id` smallint(4) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `list` smallint(4) NOT NULL default '0',
  `style` varchar(50) NOT NULL default '',
  `config` mediumtext NOT NULL,
  `allowpost` varchar(255) NOT NULL default '',
  `endtime` int(10) NOT NULL default '0',
  `about` text NOT NULL,
  `usetitle` tinyint(1) NOT NULL default '0',
  `repeatpost` tinyint(1) NOT NULL default '0',
  `statename` varchar(30) NOT NULL default '',
  `allowview` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=9 ;

#
# �������е����� `qb_form_module`
#

INSERT INTO `qb_form_module` VALUES (1, '��������', 0, '', 'a:3:{s:8:"field_db";a:8:{s:8:"sortname";a:14:{s:5:"title";s:18:"�����ĸ���Ŀ�İ���";s:10:"field_name";s:8:"sortname";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:40;s:9:"form_type";s:8:"checkbox";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:38:"����Ƶ��\r\n����Ƶ��\r\nͼƬƵ��\r\n��ƵƵ��";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"0";s:9:"orderlist";s:2:"11";s:9:"allowview";N;}s:7:"webtime";a:15:{s:5:"title";s:16:"ÿ����������Сʱ";s:10:"field_name";s:7:"webtime";s:10:"field_type";s:3:"int";s:10:"field_leng";i:10;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:1:"4";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:4:"Сʱ";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";s:2:"10";s:9:"allowview";N;}s:8:"truename";a:15:{s:5:"title";s:8:"��ʵ����";s:10:"field_name";s:8:"truename";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:20;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:1:"7";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";s:1:"9";s:9:"allowview";N;}s:3:"sex";a:15:{s:5:"title";s:4:"�Ա�";s:10:"field_name";s:3:"sex";s:10:"field_type";s:3:"int";s:10:"field_leng";i:1;s:9:"form_type";s:5:"radio";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:18:"1|��\r\n2|Ů\r\n0|����";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";s:1:"8";s:9:"allowview";N;}s:4:"oicq";a:15:{s:5:"title";s:6:"��ϵQQ";s:10:"field_name";s:4:"oicq";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:10;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"10";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:7;s:9:"allowview";N;}s:8:"mobphone";a:14:{s:5:"title";s:8:"�ֻ�����";s:10:"field_name";s:8:"mobphone";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:11;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"11";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:6;s:9:"allowview";N;}s:8:"interest";a:14:{s:5:"title";s:8:"��Ȥ����";s:10:"field_name";s:8:"interest";s:10:"field_type";s:10:"mediumtext";s:10:"field_leng";i:0;s:9:"form_type";s:8:"textarea";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:5;s:9:"allowview";N;}s:9:"introduce";a:14:{s:5:"title";s:8:"���ҽ���";s:10:"field_name";s:9:"introduce";s:10:"field_type";s:10:"mediumtext";s:10:"field_leng";i:0;s:9:"form_type";s:8:"textarea";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:4;s:9:"allowview";N;}}s:7:"is_html";a:1:{s:7:"content";s:4:"����";}s:11:"listshow_db";a:2:{s:8:"truename";s:8:"��ʵ����";s:3:"sex";s:4:"�Ա�";}}', '3,4,8,9', 0, '<p><strong>������м���,������,�������������ǵİ�����!</strong></p>', 0, 0, '����', '');
INSERT INTO `qb_form_module` VALUES (2, '��Ƹ��', 0, '', 'a:3:{s:8:"field_db";a:8:{s:9:"workplace";a:15:{s:5:"title";s:8:"ְλ����";s:10:"field_name";s:9:"workplace";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:100;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"30";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";s:2:"10";s:9:"allowview";N;}s:4:"nums";a:15:{s:5:"title";s:8:"��Ƹ����";s:10:"field_name";s:4:"nums";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:10;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:1:"4";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:2:"��";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";s:1:"9";s:9:"allowview";N;}s:10:"jobrequire";a:15:{s:5:"title";s:14:"ְλ������Ҫ��";s:10:"field_name";s:10:"jobrequire";s:10:"field_type";s:10:"mediumtext";s:10:"field_leng";i:0;s:9:"form_type";s:8:"textarea";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:8;s:9:"allowview";N;}s:8:"wageyear";a:15:{s:5:"title";s:12:"��������Ҫ��";s:10:"field_name";s:8:"wageyear";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:12;s:9:"form_type";s:5:"radio";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:40:"Ӧ���ҵ��\r\nһ������\r\n��������\r\n��������";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";i:7;s:9:"allowview";N;}s:9:"workwhere";a:15:{s:5:"title";s:8:"�����ص�";s:10:"field_name";s:9:"workwhere";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:50;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:6;s:9:"allowview";N;}s:4:"wage";a:15:{s:5:"title";s:8:"нˮ����";s:10:"field_name";s:4:"wage";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:30;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:5;s:9:"allowview";N;}s:6:"asksex";a:15:{s:5:"title";s:8:"�Ա�Ҫ��";s:10:"field_name";s:6:"asksex";s:10:"field_type";s:3:"int";s:10:"field_leng";i:1;s:9:"form_type";s:5:"radio";s:15:"field_inputleng";s:1:"1";s:8:"form_set";s:18:"1|��\r\n2|Ů\r\n0|����";s:10:"form_value";s:1:"0";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";s:1:"4";s:9:"allowview";N;}s:9:"schoo_age";a:15:{s:5:"title";s:8:"ѧ��Ҫ��";s:10:"field_name";s:9:"schoo_age";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:20;s:9:"form_type";s:6:"select";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:46:"Сѧ\r\n��ѧ\r\n��ר\r\n����\r\n��ר\r\n����\r\n˶ʿ\r\n��ʿ";s:10:"form_value";s:0:"";s:10:"form_units";s:4:"����";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";s:1:"3";s:9:"allowview";N;}}s:7:"is_html";a:1:{s:7:"content";s:4:"����";}s:11:"listshow_db";a:5:{s:8:"wageyear";s:12:"��������Ҫ��";s:9:"workplace";s:8:"ְλ����";s:4:"nums";s:8:"��Ƹ����";s:6:"asksex";s:8:"�Ա�Ҫ��";s:9:"schoo_age";s:8:"ѧ��Ҫ��";}}', '', 0, '', 0, 1, '���', '');
INSERT INTO `qb_form_module` VALUES (3, 'Ͷ�߽���', 0, '', 'a:3:{s:8:"field_db";a:5:{s:10:"advicetype";a:15:{s:5:"title";s:8:"Ͷ������";s:10:"field_name";s:10:"advicetype";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:30;s:9:"form_type";s:5:"radio";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:34:"��ǰ�ͷ�\r\n�ۺ�ͷ�\r\n��Ʒ����\r\n����";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";s:2:"10";s:9:"allowview";N;}s:8:"mobphone";a:15:{s:5:"title";s:8:"��ĵ绰";s:10:"field_name";s:8:"mobphone";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:25;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"15";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";s:1:"8";s:9:"allowview";N;}s:5:"email";a:14:{s:5:"title";s:8:"�������";s:10:"field_name";s:5:"email";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:50;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"15";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:7;s:9:"allowview";N;}s:7:"content";a:15:{s:5:"title";s:8:"Ͷ������";s:10:"field_name";s:7:"content";s:10:"field_type";s:10:"mediumtext";s:10:"field_leng";i:0;s:9:"form_type";s:8:"textarea";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";s:1:"6";s:9:"allowview";N;}s:8:"truename";a:15:{s:5:"title";s:8:"��ĳƺ�";s:10:"field_name";s:8:"truename";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:15;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"10";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";s:1:"8";s:9:"allowview";N;}}s:7:"is_html";a:0:{}s:11:"listshow_db";a:2:{s:10:"advicetype";s:8:"Ͷ������";s:8:"truename";s:8:"��ĳƺ�";}}', '', 0, '', 0, 1, '����', '3,4');
INSERT INTO `qb_form_module` VALUES (4, '�������', 0, '', 'a:3:{s:8:"field_db";a:6:{s:8:"truename";a:15:{s:5:"title";s:4:"����";s:10:"field_name";s:8:"truename";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:15;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"10";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";i:10;s:9:"allowview";N;}s:3:"sex";a:14:{s:5:"title";s:4:"�Ա�";s:10:"field_name";s:3:"sex";s:10:"field_type";s:3:"int";s:10:"field_leng";i:1;s:9:"form_type";s:5:"radio";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:18:"1|��\r\n2|Ů\r\n0|����";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:9;s:9:"allowview";N;}s:3:"age";a:15:{s:5:"title";s:4:"����";s:10:"field_name";s:3:"age";s:10:"field_type";s:3:"int";s:10:"field_leng";i:2;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:1:"2";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:2:"��";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";i:8;s:9:"allowview";N;}s:8:"mobphone";a:14:{s:5:"title";s:8:"��ϵ�绰";s:10:"field_name";s:8:"mobphone";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:25;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"12";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:7;s:9:"allowview";N;}s:7:"my_song";a:15:{s:5:"title";s:8:"��������";s:10:"field_name";s:7:"my_song";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:50;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"30";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";i:6;s:9:"allowview";N;}s:6:"metier";a:15:{s:5:"title";s:4:"ְҵ";s:10:"field_name";s:6:"metier";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:30;s:9:"form_type";s:6:"select";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:32:"����Ա\r\n����\r\n��Ա\r\n����ʦ\r\n����";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";i:5;s:9:"allowview";N;}}s:7:"is_html";a:2:{s:7:"content";s:4:"����";s:5:"my_88";s:13:"�ҵ��ֶ�my_88";}s:11:"listshow_db";a:4:{s:8:"truename";s:4:"����";s:3:"age";s:4:"����";s:6:"metier";s:4:"ְҵ";s:7:"my_song";s:8:"��������";}}', '', 0, '<p>&nbsp;&nbsp; Ϊ��л����Ա�Ա���վ��֧�֣��صؾ��е�һ��質��������ӭ���ӻԾ�����μӡ������������£�</p>\r\n<p><strong>����ʱ�䣺</strong>�Ӽ����𡪡�9��4������8��00��ֹ</p>\r\n<p><strong>��Ŀʱ�䣺</strong>9��5�ţ�����һ������8��30����11��00</p>\r\n<p><strong>����Ҫ��</strong>����ע���Ա���������豸����������˵�����ڱ�������������̳ע�����ֵ�½������.</p>\r\n<p><strong>������Ŀ��</strong>��ѡ�����峪 �ɴ������ݳ�</p>\r\n<p><strong>��ί��</strong>�˳Ƽ�˳���ټ���ί���������е��� ������ ���� ���� ���߻����ϼ����Ա��</p>\r\n<p><strong>��ѡ��ʽ��</strong>�ڱ��������������л�Ա�ڴ�����ͶƱ��ÿ����Ͷ2Ʊ��ͶƱʱ����6�죬�ȴ�9��5��11��01����9��11����8��00ֹ���������ίͳ��Ʊ������ѡ��Ʊ������ǰ������</p>\r\n<p><strong>������</strong>���ڻ��ǰ�����ĸ��֣������費ͬ�̶ȵ������ͻ��ֽ�����</p>\r\n<p>���ڱ�������������ʱ����Ҫ�󣬽����ݴ�ұ���˳�򣬺�������ʱ�䣬Ϊ������ݳ�˳�򣬽���9��4������10��00��ǰ�ڸ��������ͷ�����֪ͨ����ʽ�μӴ˴α�����ѡ�����������ݳ�˳��</p>\r\n<p><strong>���֣�</strong>���� �α�</p>', 0, 1, '���', '');
INSERT INTO `qb_form_module` VALUES (5, 'Ա�����ϵǼǱ�', 0, '', 'a:3:{s:8:"field_db";a:16:{s:8:"cp_title";a:15:{s:5:"title";s:8:"��˾ְλ";s:10:"field_name";s:8:"cp_title";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:50;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"15";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:20;s:9:"allowview";N;}s:8:"truename";a:15:{s:5:"title";s:4:"����";s:10:"field_name";s:8:"truename";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:15;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"10";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";i:19;s:9:"allowview";N;}s:4:"bday";a:14:{s:5:"title";s:8:"��������";s:10:"field_name";s:4:"bday";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:25;s:9:"form_type";s:4:"time";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:18;s:9:"allowview";N;}s:6:"height";a:15:{s:5:"title";s:4:"���";s:10:"field_name";s:6:"height";s:10:"field_type";s:3:"int";s:10:"field_leng";i:3;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:1:"3";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:2:"CM";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:17;s:9:"allowview";N;}s:6:"native";a:15:{s:5:"title";s:4:"����";s:10:"field_name";s:6:"native";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:30;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";i:16;s:9:"allowview";N;}s:10:"school_age";a:14:{s:5:"title";s:4:"ѧ��";s:10:"field_name";s:10:"school_age";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:20;s:9:"form_type";s:6:"select";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:45:"����\r\n��ר\r\n����\r\n��ר\r\n����\r\n˶ʿ\r\n��ʿ\r\nMBA";s:10:"form_value";s:4:"��ר";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:15;s:9:"allowview";N;}s:9:"specialty";a:15:{s:5:"title";s:4:"רҵ";s:10:"field_name";s:9:"specialty";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:40;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"20";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:14;s:9:"allowview";N;}s:4:"oicq";a:15:{s:5:"title";s:6:"QQ����";s:10:"field_name";s:4:"oicq";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:10;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"10";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:13;s:9:"allowview";N;}s:5:"email";a:15:{s:5:"title";s:4:"����";s:10:"field_name";s:5:"email";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:50;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"15";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:12;s:9:"allowview";N;}s:8:"mobphone";a:15:{s:5:"title";s:8:"�ֻ�����";s:10:"field_name";s:8:"mobphone";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:11;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"11";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:11;s:9:"allowview";N;}s:5:"skill";a:15:{s:5:"title";s:4:"�س�";s:10:"field_name";s:5:"skill";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:50;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"20";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:10;s:9:"allowview";N;}s:6:"idcard";a:15:{s:5:"title";s:10:"���֤����";s:10:"field_name";s:6:"idcard";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:18;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"18";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:9;s:9:"allowview";N;}s:5:"sport";a:15:{s:5:"title";s:8:"��������";s:10:"field_name";s:5:"sport";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:80;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"20";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:8;s:9:"allowview";N;}s:9:"telephone";a:15:{s:5:"title";s:8:"��ͥ�绰";s:10:"field_name";s:9:"telephone";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:15;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"12";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:7;s:9:"allowview";N;}s:7:"address";a:15:{s:5:"title";s:8:"��ͥ��ַ";s:10:"field_name";s:7:"address";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:150;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"30";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:6;s:9:"allowview";N;}s:7:"content";a:15:{s:5:"title";s:8:"��������";s:10:"field_name";s:7:"content";s:10:"field_type";s:10:"mediumtext";s:10:"field_leng";i:0;s:9:"form_type";s:8:"textarea";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:5;s:9:"allowview";N;}}s:7:"is_html";a:0:{}s:11:"listshow_db";a:2:{s:6:"native";s:4:"����";s:8:"truename";s:4:"����";}}', '', 0, '', 0, 0, '���', '');
INSERT INTO `qb_form_module` VALUES (6, '��ְ��', 0, '', 'a:3:{s:8:"field_db";a:16:{s:12:"workposition";a:15:{s:5:"title";s:8:"��ְ��λ";s:10:"field_name";s:12:"workposition";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:50;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"30";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";s:2:"21";s:9:"allowview";N;}s:8:"truename";a:15:{s:5:"title";s:4:"����";s:10:"field_name";s:8:"truename";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:15;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"10";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";i:20;s:9:"allowview";N;}s:3:"sex";a:15:{s:5:"title";s:4:"�Ա�";s:10:"field_name";s:3:"sex";s:10:"field_type";s:3:"int";s:10:"field_leng";i:1;s:9:"form_type";s:5:"radio";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:18:"1|��\r\n2|Ů\r\n0|����";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";i:19;s:9:"allowview";N;}s:5:"myage";a:15:{s:5:"title";s:4:"����";s:10:"field_name";s:5:"myage";s:10:"field_type";s:3:"int";s:10:"field_leng";i:2;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:1:"2";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:2:"��";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";i:18;s:9:"allowview";N;}s:9:"schoo_age";a:15:{s:5:"title";s:4:"ѧ��";s:10:"field_name";s:9:"schoo_age";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:15;s:9:"form_type";s:6:"select";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:45:"����\r\n��ר\r\n����\r\n��ר\r\n����\r\n˶ʿ\r\n��ʿ\r\nMBA";s:10:"form_value";s:4:"��ר";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:17;s:9:"allowview";N;}s:14:"graduateschool";a:15:{s:5:"title";s:8:"��ҵѧУ";s:10:"field_name";s:14:"graduateschool";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:40;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"15";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:16;s:9:"allowview";N;}s:9:"specialty";a:15:{s:5:"title";s:4:"רҵ";s:10:"field_name";s:9:"specialty";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:50;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"20";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:15;s:9:"allowview";N;}s:5:"skill";a:15:{s:5:"title";s:4:"�س�";s:10:"field_name";s:5:"skill";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:50;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"20";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:14;s:9:"allowview";N;}s:8:"workyear";a:15:{s:5:"title";s:8:"��������";s:10:"field_name";s:8:"workyear";s:10:"field_type";s:3:"int";s:10:"field_leng";i:2;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:1:"2";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:2:"��";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";i:13;s:9:"allowview";N;}s:10:"experience";a:15:{s:5:"title";s:8:"��������";s:10:"field_name";s:10:"experience";s:10:"field_type";s:10:"mediumtext";s:10:"field_leng";i:2;s:9:"form_type";s:8:"textarea";s:15:"field_inputleng";s:1:"2";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:12;s:9:"allowview";N;}s:4:"wage";a:15:{s:5:"title";s:8:"������н";s:10:"field_name";s:4:"wage";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:20;s:9:"form_type";s:6:"select";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:73:"����\r\n1000Ԫ����\r\n1000Ԫ-2000Ԫ\r\n2000Ԫ-3000Ԫ\r\n3000Ԫ-4000Ԫ\r\n4000Ԫ����";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:11;s:9:"allowview";N;}s:7:"address";a:15:{s:5:"title";s:10:"��ǰ��ס��";s:10:"field_name";s:7:"address";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:255;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"70";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:10;s:9:"allowview";N;}s:9:"telephone";a:15:{s:5:"title";s:8:"��ϵ�绰";s:10:"field_name";s:9:"telephone";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:25;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:9;s:9:"allowview";N;}s:5:"email";a:15:{s:5:"title";s:8:"��ϵ����";s:10:"field_name";s:5:"email";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:50;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"20";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:8;s:9:"allowview";N;}s:4:"oicq";a:15:{s:5:"title";s:6:"QQ����";s:10:"field_name";s:4:"oicq";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:11;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:1:"9";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:7;s:9:"allowview";N;}s:8:"worktime";a:15:{s:5:"title";s:8:"��������";s:10:"field_name";s:8:"worktime";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:15;s:9:"form_type";s:5:"radio";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:34:"��ʱ\r\n1����\r\n2����\r\n3����\r\n1������";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:6;s:9:"allowview";N;}}s:7:"is_html";a:1:{s:7:"content";s:4:"����";}s:11:"listshow_db";a:7:{s:6:"my_537";s:8:"��������";s:6:"my_425";s:8:"��������";s:8:"truename";s:4:"����";s:5:"myage";s:4:"����";s:8:"workyear";s:8:"��������";s:3:"sex";s:4:"�Ա�";s:12:"workposition";s:8:"��ְ��λ";}}', '', 0, '', 0, 1, '¼��', '');
INSERT INTO `qb_form_module` VALUES (7, '��Ʒ����', 0, '', 'a:3:{s:8:"field_db";a:11:{s:7:"product";a:15:{s:5:"title";s:8:"��Ʒ����";s:10:"field_name";s:7:"product";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:50;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"40";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";s:2:"30";s:9:"allowview";N;}s:7:"paytype";a:15:{s:5:"title";s:8:"���ʽ";s:10:"field_name";s:7:"paytype";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:25;s:9:"form_type";s:5:"radio";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:70:"olpay|����֧��\r\n����ת��\r\nATM��/���й�̨ת�ʻ��\r\n��������\r\n������ʽ\r\n";s:10:"form_value";s:5:"olpay";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";s:2:"29";s:9:"allowview";N;}s:7:"paytime";a:14:{s:5:"title";s:8:"��������";s:10:"field_name";s:7:"paytime";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:15;s:9:"form_type";s:4:"time";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:28;s:9:"allowview";N;}s:11:"receivebank";a:14:{s:5:"title";s:12:"����ת������";s:10:"field_name";s:11:"receivebank";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:30;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"20";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:27;s:9:"allowview";N;}s:8:"sendbank";a:14:{s:5:"title";s:12:"����ת������";s:10:"field_name";s:8:"sendbank";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:30;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"20";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:26;s:9:"allowview";N;}s:8:"paymoney";a:15:{s:5:"title";s:8:"֧�����";s:10:"field_name";s:8:"paymoney";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:15;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"10";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:2:"Ԫ";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";s:2:"25";s:9:"allowview";N;}s:8:"truename";a:15:{s:5:"title";s:10:"��ϵ������";s:10:"field_name";s:8:"truename";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:15;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"10";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";s:2:"24";s:9:"allowview";N;}s:4:"oicq";a:14:{s:5:"title";s:8:"��ϵ��QQ";s:10:"field_name";s:4:"oicq";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:11;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"11";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";s:2:"23";s:9:"allowview";N;}s:9:"telephone";a:14:{s:5:"title";s:10:"��ϵ�˵绰";s:10:"field_name";s:9:"telephone";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:30;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"15";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";s:2:"22";s:9:"allowview";N;}s:8:"mobphone";a:14:{s:5:"title";s:10:"��ϵ���ֻ�";s:10:"field_name";s:8:"mobphone";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:11;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"11";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:21;s:9:"allowview";N;}s:7:"address";a:14:{s:5:"title";s:10:"��ϵ�˵�ַ";s:10:"field_name";s:7:"address";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:150;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"60";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";s:2:"20";s:9:"allowview";N;}}s:7:"is_html";a:1:{s:7:"content";s:4:"����";}s:11:"listshow_db";a:3:{s:7:"paytype";s:8:"���ʽ";s:8:"truename";s:10:"��ϵ������";s:8:"paymoney";s:8:"֧�����";}}', '', 0, '', 0, 1, '����', '');
INSERT INTO `qb_form_module` VALUES (8, '�Ƶ귿��Ԥ��', 0, '', 'a:3:{s:8:"field_db";a:6:{s:8:"roomtype";a:15:{s:5:"title";s:12:"Ԥ����������";s:10:"field_name";s:8:"roomtype";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:30;s:9:"form_type";s:5:"radio";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:44:"��׼˫�˷�\r\n��׼���˷�\r\n�������˷�\r\n��ͳ�׷�";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";i:10;s:9:"allowview";N;}s:7:"roomnum";a:15:{s:5:"title";s:8:"Ԥ������";s:10:"field_name";s:7:"roomnum";s:10:"field_type";s:3:"int";s:10:"field_leng";i:3;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:1:"2";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:2:"��";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";i:9;s:9:"allowview";N;}s:6:"numday";a:15:{s:5:"title";s:8:"��ס����";s:10:"field_name";s:6:"numday";s:10:"field_type";s:3:"int";s:10:"field_leng";i:3;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:1:"2";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:2:"��";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"0";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:8;s:9:"allowview";N;}s:8:"intotime";a:15:{s:5:"title";s:8:"��סʱ��";s:10:"field_name";s:8:"intotime";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:30;s:9:"form_type";s:4:"time";s:15:"field_inputleng";s:0:"";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:7;s:9:"allowview";N;}s:8:"truename";a:15:{s:5:"title";s:8:"�˿�����";s:10:"field_name";s:8:"truename";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:30;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"12";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"1";s:6:"search";s:1:"0";s:9:"orderlist";i:6;s:9:"allowview";N;}s:9:"telephone";a:15:{s:5:"title";s:8:"��ϵ�绰";s:10:"field_name";s:9:"telephone";s:10:"field_type";s:7:"varchar";s:10:"field_leng";i:20;s:9:"form_type";s:4:"text";s:15:"field_inputleng";s:2:"12";s:8:"form_set";s:0:"";s:10:"form_value";s:0:"";s:10:"form_units";s:0:"";s:10:"form_title";s:0:"";s:8:"mustfill";s:1:"1";s:8:"listshow";s:1:"0";s:6:"search";s:1:"0";s:9:"orderlist";i:5;s:9:"allowview";N;}}s:7:"is_html";a:1:{s:7:"content";s:4:"����";}s:11:"listshow_db";a:3:{s:8:"roomtype";s:12:"Ԥ����������";s:7:"roomnum";s:8:"Ԥ������";s:8:"truename";s:8:"�˿�����";}}', '', 0, '', 0, 1, '���', '');

# --------------------------------------------------------

#
# ��Ľṹ `qb_form_reply`
#

DROP TABLE IF EXISTS `qb_form_reply`;
CREATE TABLE `qb_form_reply` (
  `rid` mediumint(7) NOT NULL auto_increment,
  `id` mediumint(7) NOT NULL default '0',
  `mid` mediumint(7) NOT NULL default '0',
  `posttime` int(10) NOT NULL default '0',
  `uid` mediumint(7) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `content` text NOT NULL,
  `ip` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`rid`)
) TYPE=MyISAM AUTO_INCREMENT=11 ;

#
# �������е����� `qb_form_reply`
#

INSERT INTO `qb_form_reply` VALUES (6, 25, 3, 1237255555, 1, 'admin', '<p><u>yyyyyy</u></p>\r\n<p><u>yyyyyyyy</u></p><strong>\r\n<hr width="100%" color=#98fb98 SIZE=1 />\r\n</strong>', '192.168.0.99');
INSERT INTO `qb_form_reply` VALUES (10, 27, 3, 1239591974, 1, 'admin', 'ffffffffffff ', '192.168.0.99');
