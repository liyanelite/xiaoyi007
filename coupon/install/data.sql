INSERT INTO `qb_module` (`id`, `type`, `name`, `pre`, `dirname`, `domain`, `admindir`, `config`, `list`, `admingroup`, `adminmember`, `ifclose`) VALUES (27, 2, '�Żݴ���', 'coupon_', 'coupon', '', '', 'a:7:{s:12:"list_PhpName";s:18:"list.php?&fid=$fid";s:12:"show_PhpName";s:29:"bencandy.php?&fid=$fid&id=$id";s:8:"MakeHtml";N;s:14:"list_HtmlName1";N;s:14:"show_HtmlName1";N;s:14:"list_HtmlName2";N;s:14:"show_HtmlName2";N;}', 77, '', '', 0);


INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'coupon_new1', 'Info_coupon_', 1, 'a:29:{s:13:"tplpart_1code";s:419:"<div class="listpic">\r\n                	<div class="t"><a href="$url" target="_blank" class="title">$title</a></div>\r\n                    <div class="m">ԭ��:<strike>{$mart_price}Ԫ</strike> �Żݼ�:{$price}Ԫ</div>\r\n                	<div class="p"><a href="$url" target="_blank"><img src="$picurl" onerror="this.src=\'$webdb[www_url]/images/default/nopic.jpg\'" width="170" height="125"></a></div>\r\n                </div>";s:13:"tplpart_2code";s:0:"";s:3:"SYS";s:2:"wn";s:6:"wninfo";s:7:"coupon_";s:7:"typefid";N;s:6:"cityId";N;s:5:"width";s:3:"250";s:6:"height";s:3:"187";s:8:"rolltype";s:10:"scrollLeft";s:8:"rolltime";s:1:"3";s:11:"roll_height";s:2:"50";s:11:"content_num";s:2:"80";s:7:"newhour";s:2:"24";s:7:"hothits";s:2:"30";s:7:"tplpath";s:0:"";s:6:"DivTpl";i:1;s:5:"fiddb";N;s:8:"moduleid";N;s:5:"stype";s:1:"p";s:2:"yz";s:3:"all";s:10:"timeformat";s:11:"Y-m-d H:i:s";s:5:"order";s:4:"list";s:3:"asc";s:4:"DESC";s:6:"levels";s:3:"all";s:7:"rowspan";s:1:"9";s:3:"sql";s:106:"SELECT * FROM qb_coupon_content  WHERE city_id=\'$GLOBALS[city_id]\' AND ispic=1  ORDER BY list DESC LIMIT 9";s:7:"colspan";s:1:"1";s:8:"titlenum";s:2:"20";s:10:"titleflood";s:1:"0";}', 'a:3:{s:5:"div_w";s:3:"650";s:5:"div_h";s:3:"580";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1288839908, 0, 27, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'coupon_new23', 'Info_coupon_', 1, 'a:29:{s:13:"tplpart_1code";s:123:"<div class="list"><span>$username</span>��<em>{$time_m}-{$time_d}</em>������<a href="$url" target="_blank">$title</a></div>";s:13:"tplpart_2code";s:0:"";s:3:"SYS";s:2:"wn";s:6:"wninfo";s:7:"coupon_";s:7:"typefid";N;s:6:"cityId";N;s:5:"width";s:3:"250";s:6:"height";s:3:"187";s:8:"rolltype";s:10:"scrollLeft";s:8:"rolltime";s:1:"3";s:11:"roll_height";s:2:"50";s:11:"content_num";s:2:"80";s:7:"newhour";s:2:"24";s:7:"hothits";s:2:"30";s:7:"tplpath";s:0:"";s:6:"DivTpl";i:1;s:5:"fiddb";N;s:8:"moduleid";N;s:5:"stype";s:1:"4";s:2:"yz";s:3:"all";s:10:"timeformat";s:11:"Y-m-d H:i:s";s:5:"order";s:4:"list";s:3:"asc";s:4:"DESC";s:6:"levels";s:3:"all";s:7:"rowspan";s:1:"5";s:3:"sql";s:68:"SELECT * FROM qb_coupon_content  WHERE 1  ORDER BY list DESC LIMIT 5";s:7:"colspan";s:1:"1";s:8:"titlenum";s:2:"30";s:10:"titleflood";s:1:"0";}', 'a:3:{s:5:"div_w";s:2:"50";s:5:"div_h";s:2:"30";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 0, 0, 27, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'coupon_rollpic', 'rollpic', 0, 'a:6:{s:8:"rolltype";s:1:"0";s:5:"width";s:3:"650";s:6:"height";s:3:"190";s:6:"picurl";a:2:{i:1;s:32:"label/1_20101025161019_tkw1v.jpg";i:2;s:32:"label/1_20101025161026_bvtim.jpg";}s:7:"piclink";a:2:{i:1;s:1:"#";i:2;s:1:"#";}s:6:"picalt";a:2:{i:1;s:0:"";i:2;s:0:"";}}', 'a:3:{s:5:"div_w";s:2:"50";s:5:"div_h";s:2:"21";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1287998816, 0, 27, 0, 0, 'default');
   

# --------------------------------------------------------

#
# ��Ľṹ `qb_coupon_config`
#

DROP TABLE IF EXISTS `qb_coupon_config`;
CREATE TABLE `qb_coupon_config` (
  `c_key` varchar(50) NOT NULL default '',
  `c_value` text NOT NULL,
  `c_descrip` text NOT NULL,
  PRIMARY KEY  (`c_key`)
) TYPE=MyISAM;

#
# �������е����� `qb_coupon_config`
#

INSERT INTO `qb_coupon_config` VALUES ('module_pre', 'coupon_', '');
INSERT INTO `qb_coupon_config` VALUES ('Info_allowpost', '3,4,8,9', '');
INSERT INTO `qb_coupon_config` VALUES ('module_id', '27', '');
INSERT INTO `qb_coupon_config` VALUES ('Info_webOpen', '1', '');
INSERT INTO `qb_coupon_config` VALUES ('Info_webname', '�Ż�ȯ', '');
INSERT INTO `qb_coupon_config` VALUES ('module_close', '0', '');

# --------------------------------------------------------

#
# ��Ľṹ `qb_coupon_content`
#

DROP TABLE IF EXISTS `qb_coupon_content`;
CREATE TABLE `qb_coupon_content` (
  `id` int(10) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL default '',
  `mid` smallint(4) NOT NULL default '0',
  `fid` mediumint(7) NOT NULL default '0',
  `fname` varchar(50) NOT NULL default '',
  `hits` mediumint(7) NOT NULL default '0',
  `comments` mediumint(7) NOT NULL default '0',
  `posttime` int(10) NOT NULL default '0',
  `list` varchar(10) NOT NULL default '',
  `uid` mediumint(7) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `titlecolor` varchar(15) NOT NULL default '',
  `picurl` varchar(150) NOT NULL default '',
  `ispic` tinyint(1) NOT NULL default '0',
  `yz` tinyint(1) NOT NULL default '0',
  `levels` tinyint(2) NOT NULL default '0',
  `levelstime` int(10) NOT NULL default '0',
  `keywords` varchar(100) NOT NULL default '',
  `ip` varchar(15) NOT NULL default '',
  `lastfid` mediumint(7) NOT NULL default '0',
  `money` mediumint(7) NOT NULL default '0',
  `begintime` int(10) NOT NULL default '0',
  `endtime` int(10) NOT NULL default '0',
  `lastview` int(10) NOT NULL default '0',
  `city_id` mediumint(7) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `fid` (`fid`),
  KEY `ispic` (`ispic`),
  KEY `city_id` (`city_id`),
  KEY `list` (`list`,`fid`,`city_id`,`yz`),
  KEY `hits` (`hits`)
) TYPE=MyISAM AUTO_INCREMENT=36 ;

#
# �������е����� `qb_coupon_content`
#

INSERT INTO `qb_coupon_content` VALUES (32, 'ȫ�۵¿�Ѽ����������', 1, 25, '�ʻ���Ʒ', 5, 0, 1276392077, '1276392077', 1, 'admin', '', 'qb_coupon_/25/1_20101103121120_y4z3d.jpg', 1, 1, 1, 1277108891, '', '127.0.0.1', 0, 0, 0, 0, 1288757276, 1);
INSERT INTO `qb_coupon_content` VALUES (31, '��������ţ�Ž��������̳��԰��', 1, 25, '�ʻ���Ʒ', 5, 0, 1276392059, '1276392059', 1, 'admin', '', 'qb_coupon_/25/1_20101103121142_drwq8.jpg', 1, 1, 1, 1277108892, '', '127.0.0.1', 0, 0, 0, 0, 1288757346, 1);
INSERT INTO `qb_coupon_content` VALUES (30, '����С��', 1, 25, '�ʻ���Ʒ', 6, 0, 1276392046, '1276392046', 1, 'admin', '', 'qb_coupon_/25/1_20101103121109_j7ntk.jpg', 1, 1, 1, 1277108892, '', '127.0.0.1', 0, 0, 0, 0, 1288757407, 1);
INSERT INTO `qb_coupon_content` VALUES (29, '������ͷׯ', 1, 25, '�ʻ���Ʒ', 9, 0, 1276392033, '1276392033', 1, 'admin', '', 'qb_coupon_/25/1_20101103121127_z4rb1.jpg', 1, 1, 1, 1277108893, '', '127.0.0.1', 0, 0, 0, 0, 1288758091, 1);
INSERT INTO `qb_coupon_content` VALUES (28, '���żҹ����д��õ�', 1, 25, '�ʻ���Ʒ', 8, 0, 1276392020, '1276392020', 1, 'admin', '', 'qb_coupon_/25/1_20101103121107_uekzb.jpg', 1, 1, 1, 1277108894, '', '127.0.0.1', 0, 0, 0, 0, 1288757650, 1);
INSERT INTO `qb_coupon_content` VALUES (27, '���Ŷ������˴��', 1, 25, '�ʻ���Ʒ', 10, 0, 1276392005, '1276392005', 1, 'admin', '', 'qb_coupon_/25/1_20101103121149_rywyu.gif', 1, 1, 1, 1290142086, '', '127.0.0.1', 0, 0, 0, 0, 1288758171, 1);
INSERT INTO `qb_coupon_content` VALUES (33, '��ϵ˽������', 1, 25, '�ʻ���Ʒ', 31, 0, 1276401055, '1276401055', 1, 'admin', '', 'qb_coupon_/25/1_20101103121158_os7ny.jpg', 1, 1, 1, 1277108887, '', '127.0.0.1', 0, 0, 0, 1276660255, 1293506829, 1);
INSERT INTO `qb_coupon_content` VALUES (34, '�����ձ�����', 1, 25, '�ʻ���Ʒ', 34, 0, 1276401068, '1276401068', 1, 'admin', '', 'qb_coupon_/25/1_20101103121128_dtzeg.jpg', 1, 1, 1, 1277108886, '', '127.0.0.1', 0, 0, 0, 0, 1288757791, 1);
INSERT INTO `qb_coupon_content` VALUES (35, '������������ֵ�-����������ؼ�3.8�ۣ�', 1, 25, '�ʻ���Ʒ', 36, 0, 1276401082, '1276401082', 1, 'admin', '', 'qb_coupon_/25/1_20101103121104_xth6f.jpg', 1, 1, 1, 1277108886, '', '127.0.0.1', 0, 0, 0, 0, 1292982927, 1);

# --------------------------------------------------------

#
# ��Ľṹ `qb_coupon_content_1`
#

DROP TABLE IF EXISTS `qb_coupon_content_1`;
CREATE TABLE `qb_coupon_content_1` (
  `rid` mediumint(7) NOT NULL auto_increment,
  `id` mediumint(7) NOT NULL default '0',
  `fid` mediumint(7) NOT NULL default '0',
  `uid` mediumint(7) NOT NULL default '0',
  `content` mediumtext NOT NULL,
  `price` varchar(8) NOT NULL default '',
  `mart_price` varchar(8) NOT NULL default '',
  `end_time` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`rid`),
  KEY `fid` (`fid`),
  KEY `id` (`id`),
  KEY `uid` (`uid`),
  KEY `my_rooms` (`price`)
) TYPE=MyISAM AUTO_INCREMENT=21 ;

#
# �������е����� `qb_coupon_content_1`
#

INSERT INTO `qb_coupon_content_1` VALUES (18, 33, 25, 1, '<span>��ַ��</span><span>������ũչ����·1��(��������԰����) </span><p><span>�绰��</span><span><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://count.koubei.com/showphone/showphone.php?f=jpg&w=96&h=10&bc=255,255,255&fc=0,0,0&fs=10&fn=arial&phone=LTE2NTUzMjIxMzU%3D%23n483rlAaILSEXvUL" width="96" height="12" alt="��ϵ˽�����ӵ绰" /></span></p>\r\n<p><span>��ɫ��</span><span>����ˢ�� ��ͣ��</span></p>\r\n', '35', '54', '2010-06-03');
INSERT INTO `qb_coupon_content_1` VALUES (17, 32, 25, 1, '<span>��ַ��</span><span>���������(˧��԰��ͬ9��)</span><p><span>�绰��</span><span><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://count.koubei.com/showphone/showphone.php?f=jpg&w=96&h=10&bc=255,255,255&fc=0,0,0&fs=10&fn=arial&phone=MTQ4NDUxODk1Ng%3D%3D%235joPVM%2FQGFsptZQi" width="96" height="12" alt="ȫ�۵¿�Ѽ����������绰" /></span></p>\r\n<p><span>�˾���</span><span><font color="#ff4400">85Ԫ</font></span></p>\r\n<p><span>��ɫ��</span><span>������ �а��� ����ˢ�� �շ�ͣ��</span></p>\r\n', '400', '800', '2010-06-04');
INSERT INTO `qb_coupon_content_1` VALUES (16, 31, 25, 1, '<span>��ַ��</span><span>��̳��·����·��39��(��̳��԰����)</span><p><span>�绰��</span><span><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://count.koubei.com/showphone/showphone.php?f=jpg&w=96&h=10&bc=255,255,255&fc=0,0,0&fs=10&fn=arial&phone=MTY1MjE5Njk5Mg%3D%3D%23K0o68qh%2FiXbrW3yU" width="96" height="12" alt="��������ţ�Ž��������̳��԰��绰" /></span></p>\r\n<p><span>�˾���</span><span><font color="#ff4400">42Ԫ</font></span></p>\r\n<p><span>��ɫ��</span><span>�ް��� ��ˢ�� ���ͣ��</span></p>\r\n', '400', '500', '2010-06-05');
INSERT INTO `qb_coupon_content_1` VALUES (15, 30, 25, 1, '<span>��ַ��</span><span>��������·11��(��������̨��ַ��50���ʾֺ�ͬ...</span><p><span>�绰��</span><span><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://count.koubei.com/showphone/showphone.php?f=jpg&w=96&h=10&bc=255,255,255&fc=0,0,0&fs=10&fn=arial&phone=MTg1Nzk3NTA2%23Q2sLPpQSEZvelo6d" width="96" height="12" alt="����С�ݵ绰" /></span></p>\r\n<p><span>�˾���</span><span><font color="#ff4400">40Ԫ</font></span></p>\r\n<p><span>��ɫ��</span><span>����ˢ�� </span></p>\r\n', '500', '700', '2010-06-26');
INSERT INTO `qb_coupon_content_1` VALUES (14, 29, 25, 1, '<span>��ַ��</span><span>κ����С��29��</span><p><span>�绰��</span><span><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://count.koubei.com/showphone/showphone.php?f=jpg&w=96&h=10&bc=255,255,255&fc=0,0,0&fs=10&fn=arial&phone=LTg2MDQxMjE4NA%3D%3D%23RUUDo8OMhcacY0u%2F" width="96" height="12" alt="������ͷׯ�绰" /></span></p>\r\n<p><span>�˾���</span><span><font color="#ff4400">52Ԫ</font></span></p>\r\n<p><span>ʱ�䣺</span><span>�ճ�Ӫҵ</span></p>\r\n<p><span>��ɫ��</span><span>������ �ް��� ����ˢ�� ���ͣ��</span></p>\r\n', '440', '550', '2010-06-05');
INSERT INTO `qb_coupon_content_1` VALUES (13, 28, 25, 1, '<span>��ַ��</span><span>�йش��ϴ�ּ�18�Ź��ʴ���B1¥</span><p><span>�绰��</span><span><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://count.koubei.com/showphone/showphone.php?f=jpg&w=96&h=10&bc=255,255,255&fc=0,0,0&fs=10&fn=arial&phone=MTkxNzk2NTk3MQ%3D%3D%23dOtjfT859mSJgYTE" width="96" height="12" alt="���żҹ����д��õ�绰" /></span></p>\r\n<p><span>�˾���</span><span><font color="#ff4400">71Ԫ</font></span></p>\r\n<p><span>��ɫ��</span><span>�а��� ����ˢ�� ���ͣ��</span></p>\r\n', '550', '670', '2010-06-25');
INSERT INTO `qb_coupon_content_1` VALUES (12, 27, 25, 1, '<span>��ַ��</span><span>��Է170��(ŷ½���䱱�������ǵ���)</span><p><span>�绰��</span><span><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://count.koubei.com/showphone/showphone.php?f=jpg&w=96&h=10&bc=255,255,255&fc=0,0,0&fs=10&fn=arial&phone=MTYwMjg2NDg0NQ%3D%3D%23WFy1UFXCPYfyB7I%2B" width="96" height="12" alt="���Ŷ������˴��绰" /></span></p>\r\n<p><span>�˾���</span><span><font color="#ff4400">59Ԫ</font></span></p>\r\n<p><span>��ɫ��</span><span>��ͣ��</span></p>\r\n', '235', '469', '2010-06-05');
INSERT INTO `qb_coupon_content_1` VALUES (19, 34, 25, 1, 'ַ��<span>�����������7��</span><p><span>�绰��</span><span><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://count.koubei.com/showphone/showphone.php?f=jpg&w=96&h=10&bc=255,255,255&fc=0,0,0&fs=10&fn=arial&phone=LTE2NDM0NzMwMA%3D%3D%23VE9RGkHlse4wgH8f" width="96" height="12" alt="�����ձ�����绰" /></span></p>\r\n<p><span>�˾���</span><span><font color="#ff4400">79Ԫ</font></span></p>\r\n<p><span>ʱ�䣺</span><span>�ճ�Ӫҵ</span></p>\r\n<p><span>��ɫ��</span><span>����ˢ�� ���ͣ��</span></p>\r\n', '40', '90', '2010-06-03');
INSERT INTO `qb_coupon_content_1` VALUES (20, 35, 25, 1, '<div>��Ʒ3.8������ἴ�Ͳ�Ʒ+1Ԫ/������������������������һ��Ѿ�ˮ�������޳���ꡢ�����ݵꡣ</div>\r\n<p>��ַ��������12����̩�̳���¥(���Ի���)</p>\r\n', '30', '100', '2010-06-24');

# --------------------------------------------------------

#
# ��Ľṹ `qb_coupon_field`
#

DROP TABLE IF EXISTS `qb_coupon_field`;
CREATE TABLE `qb_coupon_field` (
  `id` mediumint(7) NOT NULL auto_increment,
  `mid` mediumint(5) NOT NULL default '0',
  `title` varchar(50) NOT NULL default '',
  `field_name` varchar(30) NOT NULL default '',
  `field_type` varchar(15) NOT NULL default '',
  `field_leng` smallint(3) NOT NULL default '0',
  `orderlist` int(10) NOT NULL default '0',
  `form_type` varchar(15) NOT NULL default '',
  `field_inputwidth` smallint(3) default NULL,
  `field_inputheight` smallint(3) NOT NULL default '0',
  `form_set` text NOT NULL,
  `form_value` text NOT NULL,
  `form_units` varchar(30) NOT NULL default '',
  `form_title` text NOT NULL,
  `mustfill` tinyint(1) NOT NULL default '0',
  `listshow` tinyint(1) NOT NULL default '0',
  `listfilter` tinyint(1) default NULL,
  `search` tinyint(1) NOT NULL default '0',
  `allowview` varchar(255) NOT NULL default '',
  `allowpost` varchar(255) NOT NULL default '',
  `js_check` text NOT NULL,
  `js_checkmsg` varchar(255) NOT NULL default '',
  `classid` mediumint(7) NOT NULL default '0',
  `form_js` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=143 ;

#
# �������е����� `qb_coupon_field`
#

INSERT INTO `qb_coupon_field` VALUES (86, 1, '��ϸ��Ϣ', 'content', 'mediumtext', 0, 1, 'ieedit', 650, 250, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_coupon_field` VALUES (79, 1, '������', 'price', 'varchar', 8, 8, 'text', 8, 0, '', '', 'Ԫ', '', 0, 1, 1, 0, '', '', '', '', 31, '');
INSERT INTO `qb_coupon_field` VALUES (78, 1, '�г���', 'mart_price', 'varchar', 8, 9, 'text', 12, 0, '', '', 'Ԫ', '', 0, 1, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_coupon_field` VALUES (142, 1, '��ֹ����', 'end_time', 'varchar', 15, 7, 'time', 15, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');

# --------------------------------------------------------

#
# ��Ľṹ `qb_coupon_module`
#

DROP TABLE IF EXISTS `qb_coupon_module`;
CREATE TABLE `qb_coupon_module` (
  `id` smallint(4) NOT NULL auto_increment,
  `sort_id` mediumint(5) NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  `list` smallint(4) NOT NULL default '0',
  `style` varchar(50) NOT NULL default '',
  `config` text NOT NULL,
  `config2` text NOT NULL,
  `comment_type` tinyint(1) NOT NULL default '0',
  `ifdp` tinyint(1) NOT NULL default '0',
  `template` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

#
# �������е����� `qb_coupon_module`
#

INSERT INTO `qb_coupon_module` VALUES (1, 0, '������', 10, '', 'a:1:{s:9:"moduleSet";a:1:{s:6:"useMap";s:1:"1";}}', '', 1, 0, '');

# --------------------------------------------------------

#
# ��Ľṹ `qb_coupon_sort`
#

DROP TABLE IF EXISTS `qb_coupon_sort`;
CREATE TABLE `qb_coupon_sort` (
  `fid` mediumint(7) unsigned NOT NULL auto_increment,
  `fup` mediumint(7) unsigned NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  `mid` smallint(4) NOT NULL default '0',
  `class` smallint(4) NOT NULL default '0',
  `sons` smallint(4) NOT NULL default '0',
  `type` tinyint(1) NOT NULL default '0',
  `admin` varchar(100) NOT NULL default '',
  `list` int(10) NOT NULL default '0',
  `listorder` tinyint(2) NOT NULL default '0',
  `passwd` varchar(32) NOT NULL default '',
  `logo` varchar(150) NOT NULL default '',
  `descrip` text NOT NULL,
  `style` varchar(50) NOT NULL default '',
  `template` text NOT NULL,
  `jumpurl` varchar(150) NOT NULL default '',
  `maxperpage` tinyint(3) NOT NULL default '0',
  `metatitle` varchar(250) NOT NULL default '',
  `metakeywords` varchar(255) NOT NULL default '',
  `metadescription` varchar(255) NOT NULL default '',
  `allowcomment` tinyint(1) NOT NULL default '0',
  `allowpost` varchar(150) NOT NULL default '',
  `allowviewtitle` varchar(150) NOT NULL default '',
  `allowviewcontent` varchar(150) NOT NULL default '',
  `allowdownload` varchar(150) NOT NULL default '',
  `forbidshow` tinyint(1) NOT NULL default '0',
  `config` mediumtext NOT NULL,
  `index_show` tinyint(1) NOT NULL default '0',
  `contents` mediumint(4) NOT NULL default '0',
  `tableid` varchar(30) NOT NULL default '',
  `dir_name` varchar(50) NOT NULL default '',
  `ifcolor` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`fid`)
) TYPE=MyISAM AUTO_INCREMENT=53 ;

#
# �������е����� `qb_coupon_sort`
#

INSERT INTO `qb_coupon_sort` VALUES (1, 0, 'ʱ�й���', 1, 2, 0, 1, '', 0, 0, '', '', '', '', 'a:4:{s:4:"head";s:0:"";s:4:"foot";s:0:"";s:4:"list";s:0:"";s:8:"bencandy";s:0:"";}', '', 0, '', '', '', 0, '', '', '', '', 0, 'a:1:{s:11:"field_value";N;}', 0, 0, '', 'jiajuyongpin', 0);
INSERT INTO `qb_coupon_sort` VALUES (2, 0, '������ʳ', 1, 2, 0, 1, '', 0, 0, '', '', '', '', 'a:4:{s:4:"head";s:0:"";s:4:"foot";s:0:"";s:4:"list";s:0:"";s:8:"bencandy";s:0:"";}', '', 0, '', '', '', 0, '', '', '', '', 0, 'a:1:{s:11:"field_value";N;}', 0, 0, '', 'canyinxiuxian', 0);
INSERT INTO `qb_coupon_sort` VALUES (3, 0, '��������', 1, 2, 0, 1, '', 0, 0, '', '', '', '', 'a:4:{s:4:"head";s:0:"";s:4:"foot";s:0:"";s:4:"list";s:0:"";s:8:"bencandy";s:0:"";}', '', 0, '', '', '', 0, '', '', '', '', 0, 'a:1:{s:11:"field_value";N;}', 0, 0, '', 'wenhuatiyu', 0);
INSERT INTO `qb_coupon_sort` VALUES (5, 0, '����Ӱ��', 1, 2, 0, 1, '', 0, 0, '', '', '', '', 'a:4:{s:4:"head";s:0:"";s:4:"foot";s:0:"";s:4:"list";s:0:"";s:8:"bencandy";s:0:"";}', '', 0, '', '', '', 0, '', '', '', '', 0, 'a:1:{s:11:"field_value";N;}', 0, 0, '', 'shumayingyin', 0);
INSERT INTO `qb_coupon_sort` VALUES (25, 1, '�ʻ���Ʒ', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (26, 1, '�������', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (27, 1, '�̳�����', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (28, 1, '������Ʒ', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (29, 1, '��������', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (30, 1, '��������', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (31, 1, '��ױƷ', 1, 3, 0, 0, '', 0, 0, '', '', '', '', 'N;', '', 0, '', '', '', 0, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (32, 1, '��װ����', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (33, 2, '���ȹݲ�¥', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (34, 2, '��������', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (35, 2, 'ʳƷ����', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (36, 2, '������Ӫ', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (37, 2, '�պ�����', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (38, 2, '�����ζ', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (39, 2, '��ʽ����', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (40, 3, '��Ħϴԡ', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (41, 3, '��Ӱ����', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (42, 3, '��������', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (43, 3, '�����ư�', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (44, 3, '��Ӱ�ݳ�', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (45, 3, 'KTV������', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (46, 5, '�����Ϸ', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (47, 5, '�칫��Ʒ', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (48, 5, '�ҵ�', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (49, 5, 'mp3mp4', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (50, 5, '����', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (51, 5, 'DC/DV', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_coupon_sort` VALUES (52, 5, '�ֻ�', 1, 3, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
