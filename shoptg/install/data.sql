INSERT INTO `qb_module` (`id`, `type`, `name`, `pre`, `dirname`, `domain`, `admindir`, `config`, `list`, `admingroup`, `adminmember`, `ifclose`) VALUES (37, 2, '�ٷ��Ź�', 'shoptg_', 'shoptg', '', '', '', 0, '', '', 0);


INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'shoptg_a4', 'article', 1, 'a:33:{s:13:"tplpart_1code";s:65:"<div class="list"><a href="$url" target="_blank">$title</a></div>";s:13:"tplpart_2code";s:0:"";s:3:"SYS";s:7:"artcile";s:13:"RollStyleType";s:0:"";s:7:"fidtype";s:1:"0";s:8:"rolltype";s:10:"scrollLeft";s:8:"rolltime";s:1:"3";s:11:"roll_height";s:2:"50";s:5:"width";s:3:"250";s:6:"height";s:3:"187";s:7:"newhour";s:2:"24";s:7:"hothits";s:3:"100";s:7:"amodule";s:3:"106";s:7:"tplpath";s:0:"";s:6:"DivTpl";i:1;s:5:"fiddb";N;s:5:"stype";s:1:"4";s:2:"yz";s:1:"1";s:7:"hidefid";N;s:10:"timeformat";s:11:"Y-m-d H:i:s";s:5:"order";s:6:"A.list";s:3:"asc";s:4:"DESC";s:6:"levels";s:3:"all";s:7:"rowspan";s:1:"8";s:3:"sql";s:138:" SELECT A.*,A.aid AS id FROM qb_article A  WHERE A.city_id=\'$GLOBALS[city_id]\' AND A.yz=1  AND A.mid=\'106\'   ORDER BY A.list DESC LIMIT 8 ";s:4:"sql2";N;s:7:"colspan";s:1:"1";s:11:"content_num";s:2:"80";s:12:"content_num2";s:3:"120";s:8:"titlenum";s:2:"30";s:9:"titlenum2";s:2:"40";s:10:"titleflood";s:1:"0";s:10:"c_rolltype";s:1:"0";}', 'a:3:{s:5:"div_w";s:3:"225";s:5:"div_h";s:3:"217";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1293512226, 0, 37, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'shoptg_ad1', 'pic', 0, 'a:4:{s:6:"imgurl";s:32:"label/1_20101228121201_roifx.gif";s:7:"imglink";s:1:"#";s:5:"width";s:3:"274";s:6:"height";s:3:"112";}', 'a:3:{s:5:"div_w";s:3:"274";s:5:"div_h";s:3:"109";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1293512165, 0, 37, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'shoptg_ad13', 'pic', 0, 'a:4:{s:6:"imgurl";s:32:"label/1_20101228121218_clmme.gif";s:7:"imglink";s:1:"#";s:5:"width";s:3:"311";s:6:"height";s:3:"112";}', 'a:3:{s:5:"div_w";s:3:"314";s:5:"div_h";s:3:"111";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1293512151, 0, 37, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'shoptg_ad2', 'pic', 0, 'a:4:{s:6:"imgurl";s:32:"label/1_20101228121236_ljffn.gif";s:7:"imglink";s:1:"#";s:5:"width";s:3:"375";s:6:"height";s:3:"112";}', 'a:3:{s:5:"div_w";s:3:"374";s:5:"div_h";s:3:"111";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1293512157, 0, 37, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'shoptg_m5', 'code', 0, '<a href="#" target="_blank">����</a>', 'a:4:{s:9:"html_edit";N;s:5:"div_w";s:0:"";s:5:"div_h";s:0:"";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 0, 0, 37, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'shoptg_tt4', 'code', 0, 'ע������', 'a:4:{s:9:"html_edit";N;s:5:"div_w";s:0:"";s:5:"div_h";s:0:"";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 0, 0, 37, 0, 0, 'default');
    
    
  

DROP TABLE IF EXISTS `qb_shoptg_collection`;
CREATE TABLE `qb_shoptg_collection` (
  `cid` mediumint(7) NOT NULL auto_increment,
  `id` mediumint(7) NOT NULL default '0',
  `uid` mediumint(7) NOT NULL default '0',
  `posttime` int(10) NOT NULL default '0',
  PRIMARY KEY  (`cid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# �������е����� `qb_shoptg_collection`
#


# --------------------------------------------------------

#
# ��Ľṹ `qb_shoptg_comments`
#

DROP TABLE IF EXISTS `qb_shoptg_comments`;
CREATE TABLE `qb_shoptg_comments` (
  `cid` mediumint(7) unsigned NOT NULL auto_increment,
  `cuid` int(7) NOT NULL default '0',
  `type` tinyint(2) NOT NULL default '0',
  `id` int(10) unsigned NOT NULL default '0',
  `fid` mediumint(7) unsigned NOT NULL default '0',
  `uid` mediumint(7) unsigned NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `posttime` int(10) NOT NULL default '0',
  `content` text NOT NULL,
  `ip` varchar(15) NOT NULL default '',
  `icon` tinyint(3) NOT NULL default '0',
  `yz` tinyint(1) NOT NULL default '0',
  `flowers` smallint(4) NOT NULL default '0',
  `egg` smallint(4) NOT NULL default '0',
  PRIMARY KEY  (`cid`),
  KEY `type` (`type`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# �������е����� `qb_shoptg_comments`
#


# --------------------------------------------------------

#
# ��Ľṹ `qb_shoptg_config`
#

DROP TABLE IF EXISTS `qb_shoptg_config`;
CREATE TABLE `qb_shoptg_config` (
  `c_key` varchar(50) NOT NULL default '',
  `c_value` text NOT NULL,
  `c_descrip` text NOT NULL,
  PRIMARY KEY  (`c_key`)
) TYPE=MyISAM;

#
# �������е����� `qb_shoptg_config`
#

INSERT INTO `qb_shoptg_config` VALUES ('sort_layout', '1,75#2,4#71,65#5,54#3#', '');
INSERT INTO `qb_shoptg_config` VALUES ('Info_ReportDB', 'Υ����Ϣ\r\n������Ϣ\r\n������Ϣ', '');
INSERT INTO `qb_shoptg_config` VALUES ('Info_index_cache', '', '');
INSERT INTO `qb_shoptg_config` VALUES ('Info_list_cache', '', '');
INSERT INTO `qb_shoptg_config` VALUES ('order_send_mail', '1', '');
INSERT INTO `qb_shoptg_config` VALUES ('Info_TopNum', '10', '');
INSERT INTO `qb_shoptg_config` VALUES ('Info_TopDay', '10', '');
INSERT INTO `qb_shoptg_config` VALUES ('Info_TopMoney', '10', '');
INSERT INTO `qb_shoptg_config` VALUES ('Info_TopColor', '#FF0000', '');
INSERT INTO `qb_shoptg_config` VALUES ('order_send_msg', '1', '');
INSERT INTO `qb_shoptg_config` VALUES ('Info_webOpen', '1', '');
INSERT INTO `qb_shoptg_config` VALUES ('UpdatePostTime', '1', '');
INSERT INTO `qb_shoptg_config` VALUES ('showNoPassComment', '0', '');
INSERT INTO `qb_shoptg_config` VALUES ('Info_ShowNoYz', '1', '');
INSERT INTO `qb_shoptg_config` VALUES ('PostInfoMoney', '10', '');
INSERT INTO `qb_shoptg_config` VALUES ('Info_allowGuesSearch', '1', '');
INSERT INTO `qb_shoptg_config` VALUES ('module_pre', 'shoptg_', '');
INSERT INTO `qb_shoptg_config` VALUES ('module_close', '0', '');
INSERT INTO `qb_shoptg_config` VALUES ('Info_metakeywords', '���۴�����������,�����еͼ�!', '');
INSERT INTO `qb_shoptg_config` VALUES ('module_id', '37', '');
INSERT INTO `qb_shoptg_config` VALUES ('Info_webname', '�ٷ��Ź�', '');

# --------------------------------------------------------

#
# ��Ľṹ `qb_shoptg_content`
#

DROP TABLE IF EXISTS `qb_shoptg_content`;
CREATE TABLE `qb_shoptg_content` (
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
  `passwd` varchar(32) NOT NULL default '',
  `begintime` int(10) NOT NULL default '0',
  `endtime` int(10) NOT NULL default '0',
  `lastview` int(10) NOT NULL default '0',
  `city_id` mediumint(7) NOT NULL default '0',
  `picnum` smallint(4) NOT NULL default '0',
  `price` varchar(20) NOT NULL default '',
  `join_num` mediumint(5) NOT NULL default '0',
  `pay_num` mediumint(5) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `fid` (`fid`),
  KEY `ispic` (`ispic`),
  KEY `city_id` (`city_id`),
  KEY `list` (`list`,`fid`,`city_id`,`yz`),
  KEY `hits` (`hits`)
) TYPE=MyISAM AUTO_INCREMENT=13 ;

#
# �������е����� `qb_shoptg_content`
#

INSERT INTO `qb_shoptg_content` VALUES (10, '����998Ԫ��ԭ��1819Ԫ��������˳�Ƽҡ�ϲ����͡�1��', 1, 1, '��ʳ��', 2, 0, 1293455884, '1293455884', 1, 'admin', '', 'qb_shoptg_/1/1_20101227211204_mwrvk.jpg.gif', 1, 1, 0, 0, '', '127.0.0.1', 0, 0, '', 0, 0, 1293511788, 1, 1, '1819', 0, 0);
INSERT INTO `qb_shoptg_content` VALUES (11, '����49Ԫ��ԭ��135Ԫ��麼Ǿ�¥���ﶬ�̲���ֵ���˫���ײ͡�1��', 1, 1, '��ʳ��', 1, 0, 1293456073, '1293456073', 1, 'admin', '', 'qb_shoptg_/1/1_20101227211213_likqz.jpg.gif', 1, 1, 0, 0, '', '127.0.0.1', 0, 0, '', 0, 0, 1293456075, 1, 1, '49', 0, 0);
INSERT INTO `qb_shoptg_content` VALUES (12, '����38Ԫ��ԭ��79Ԫ����ζ��������˲͡��ײ�ȯ1��', 1, 1, '��ʳ��', 14, 0, 1293456231, '1293456231', 1, 'admin', '', 'qb_shoptg_/1/1_20101227211251_qeki2.jpg.gif', 1, 1, 0, 0, '', '127.0.0.1', 0, 0, '', 0, 0, 1293512306, 1, 1, '39', 0, 0);

# --------------------------------------------------------

#
# ��Ľṹ `qb_shoptg_content_1`
#

DROP TABLE IF EXISTS `qb_shoptg_content_1`;
CREATE TABLE `qb_shoptg_content_1` (
  `rid` mediumint(7) NOT NULL auto_increment,
  `id` mediumint(7) NOT NULL default '0',
  `fid` mediumint(7) NOT NULL default '0',
  `uid` mediumint(7) NOT NULL default '0',
  `content` mediumtext NOT NULL,
  `market_price` varchar(10) NOT NULL default '',
  `shoptype` varchar(10) NOT NULL default '',
  `min_num` int(4) NOT NULL default '0',
  `about` mediumtext NOT NULL,
  `end_time` varchar(20) NOT NULL default '',
  `address` varchar(150) NOT NULL default '',
  PRIMARY KEY  (`rid`),
  KEY `fid` (`fid`),
  KEY `id` (`id`),
  KEY `uid` (`uid`),
  KEY `sortid` (`min_num`)
) TYPE=MyISAM AUTO_INCREMENT=13 ;

#
# �������е����� `qb_shoptg_content_1`
#

INSERT INTO `qb_shoptg_content_1` VALUES (10, 10, 1, 1, '<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">�����ϻ�����</p>\r\n<p><font color="#666666">����������ƣ���򹻣�ÿ�ȵ�һ�ڶ����侫�����ڣ�</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/005.jpg" width="430" height="576" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">������ζƴ��</p>\r\n<p><font color="#666666">��ζƴ�̰������⡢���ա�±ˮ��ǡ�±ˮ����ȣ�����Ƥ�����㣬���ո���ɿڣ�±ˮ��ǵȸ��Ǿ���������Ƶ�±ˮ֭���ƣ�����ζ��</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/006.jpg" width="430" height="200" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">����/֥ʿ�h������ʿ����Ϻ</p>\r\n<p><font color="#666666">������Ϻ�ֳ�Ϊ������Ϻ�������������������ݵ����ô�Ŧ����ʡ���������Լ7��֣���������������ζ�������������������ڸ�ˬ���е��ԣ���Ϻζ��Ũ��Ӫ���ḻ�������ܴ�����Ϻ���ص������ۻ���֥ʿ�h�ܸ���Ϻ������ã��������ڡ�����������������������޿ڲ��ѵ�һ����</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/007.jpg" width="430" height="286" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/008.jpg" width="430" height="200" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">����/�ܷ���/��ଟh���ô��䱦з</p>\r\n<p><font color="#666666">�䱦ззζ��ͣ��ʵؼ�ʵ��ζ�ʴ��𣬽��С��ܷ�������ଵ���ζ�����������䱦з�����ӳ�����з�ζ��</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/009.jpg" width="430" height="576" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">����������</p>\r\n<p><font color="#666666">�������������ǰߣ�����Զ�ɳȺ�����Լ����ϲ�����ɫ����ϸ���㣬�������ϵ����Ƕ���������������϶࣬������ɫѩ�ף������������ܳԳ������������ζ�������������������̲�����֮�⻹���������١�</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/010.jpg" width="430" height="286" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">��ɶ�ɽ��</p>\r\n<p><font color="#666666">��ɽ������ζ��˵������ʳ��ɽ���ϡ�в�ľ���£���˷ʶ����塢ʳ����ζ�����̲����շ�ʪ�ȣ�����ɺ��������ã���ζ��θ���������壡</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/011.jpg" width="430" height="200" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">�������м�</p>\r\n<p><font color="#666666">���м�����������Ϊ���������֮һ�����䲻�����Ͻ������ⲻ��Ϊ�ѣ�Ƥˬ�⻬��������ʱ���ϼ�ĥ�Ľ��У���򵥵��ľ�������ʳָ�󶯣� </font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/012.jpg" width="430" height="576" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">ȸ�������ⶡ</p>\r\n<p><font color="#666666">����˿ը��ȸ���������������ⶡ�����ɿڣ��ڸв�η�����</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/013.jpg" width="430" height="200" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">���ϰ�ʱ��</p>\r\n<p><font color="#666666">���������������������ʳ�����������Ϊ��ɽ��֮�����������лʺ󡱣����Ͼ�����ϸ�ۣ�Ӫ����ֵ�ܸ������������Ը���������߲����������ϵ��ʣ�ζ����Ϊ������ζ�����棡</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/014.jpg" width="430" height="286" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">�Ҹ�����</p>\r\n<p><font color="#666666">������Ӳ���д����㣬��Ƶ�ɫ�������ÿ��һ�ڶ����˸е�������Ҹ���</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/015.jpg" width="430" height="286" border="0" /></p>\r\n<br />\r\n<br />\r\n<div><p style="color:#f66666;background-color:#f7f7f7;font-size:16px;font-weight:bold;">������˳�Ƽ�</p>\r\n<p><font color="#666666">������˳��¥�������������Ϊ������Ҫԭ��������ũ����ɫ�ˡ�Ϊ�˿��ṩ������ɫ�Ľ���ʳ���������ʽС�������ͺ����ξ�ѡ��������˳�Էḻ��������ʳѡ��ȫ��λ�Ĳ����ۺϷ�����Ŀ������硢������ͺ����ײ͵ȣ����Ԫ����Ԫ�ص��������е�ʱ�С�Ʒζ�����Ļ���</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/001.jpg" width="430" height="286" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/002.jpg" width="430" height="286" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/003.jpg" width="430" height="576" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/004.jpg" width="430" height="286" border="0" /></p>\r\n</div>\r\n', '998', '8.7', 5, '�����Ź�: ����998Ԫ��ԭ��1819Ԫ��������˳�Ƽҡ�ϲ����͡�1�ݣ������ϻ�����+������ζƴ��+����/֥ʿ�h������ʿ����Ϻ��1.5�+����/�ܷ���/��ଟh���ô��䱦з��1.5�+����������1����1�����ϣ�+��ɶ�ɽ��+�������м�+ȸ�������ⶡ+���ϰ�ʱ��+�Ҹ�����+�׷�10��+��λ10λ+���ͻ�Ա��1��+���ͣ��2Сʱ��ӭ����������Ӧ����ʳ������㼯��������ѷ���10Ԫ\r\n', '2011-02-31', '�����н�̻�԰�����ڹ�ҵ����ϻ�����¥');
INSERT INTO `qb_shoptg_content_1` VALUES (11, 11, 1, 1, '<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;"><span>��ݻ���������</span></p>\r\n<p style="color:#666666;"><a href="http://baike.baidu.com/view/27948.htm" target="_blank">�����ݸ�Ŀ�����С���𳲹���ࡢ�������������Ҳ�С�����Ī��𳡱��һ𳶥�ż���֮˵��������Ӫ���̲�����𳲻���̲�������֬�����������͵��̴������⣬��ݻ�����ƽ�ͣ������������ǿ�͵����������߹��ܣ���ɽ��Ƣ��θ����������������в�������֮���������̲���Ʒ�����һͬ���ƣ���ֱ��������ʥƷ��</a><p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingjijiulou/003.jpg" width="430" height="320" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;"><span>�ڽ������h���</span></p>\r\n<p style="color:#666666;">�������С�ɣ���ϸ��񣬼���ζ������������������Ķ��ְ����ἰп�ȶ���΢�����أ���������Ϊ�Իƽ��ţ���ᣬ���ŷǳ��ߵ�ʳ�÷ǳ���ֵ�أ�</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingjijiulou/001.jpg" width="430" height="320" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;"><span>������߳şh��</span></p>\r\n<p style="color:#666666;">�h����ˬ������������Ϊ�ɿڣ�ͬʱ���߳Ž�����ס�h������������ȣ����ͽ������ÿһ�ڷ������������ζ��</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingjijiulou/002.jpg" width="430" height="320" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;"><span>�����򳴲���</span></p>\r\n<p style="color:#666666;">������������̢������ֻ��������ʹ����ˬ�ڵ�����һ����������Ĳ��ģ�һ�ڵ����������򣬻�ζ���</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingjijiulou/004.jpg" width="430" height="320" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;"><span>�ʲ泴����</span></p>\r\n<p style="color:#666666;">���շʺ���㣬�������ۿɿڣ�ʮ��������˺��д���ά���أ��ǵö��Ӵ��</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingjijiulou/006.jpg" width="430" height="447" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;"><span>�����Ϲ���</span></p>\r\n<p style="color:#666666;">������������Ϲ�����������̲�ס���϶��꣬��ζ���磬�������˴������ߣ�</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingjijiulou/005.jpg" width="430" height="260" border="0" /></p>\r\n<br />\r\n<br />\r\n<div><p style="color:#f66666;background-color:#f7f7f7;font-size:16px;font-weight:bold;">麼Ǿ�¥</p>\r\n<p style="color:#666666;">麼Ǿ�¥��һ�䴫ͳ���˾�¥������ʽ���ġ����ݷ�ζС����Ϊ��¥�ľ�Ӫ���ȫ�����������񣻾�¥���Ϊ�еȵ��Σ����ж����������¥���Сʱ��450����λ�����Ʋ����̲���ζ����ũ�ҟ����顢̿������Ѽ�������ݷ�ζС����ʽ��</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingji/006.jpg" width="430" height="320" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingji/005.jpg" width="430" height="320" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingji/003.jpg" width="430" height="320" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingji/002.jpg" width="430" height="320" border="0" /></p>\r\n<br />\r\n<br />\r\n<p style="color:#f66666;background-color:#f7f7f7;font-size:16px;font-weight:bold;">��ҵ���</p>\r\n<br />\r\n<div style="color:#666666;"><ul><li>�����������մ�������ʳ��ͦ���ҵġ�������ֻ����һֻѼ�������һֻ���Ƶ�ܹ�����û��ˮ�ͼӲ�Ǯ������Ϳ����ߡ���������ĵ���Ҳ��ʵ�ݣ�ÿ�������ؼۣ���λ��������/λ�� <span>����lyy813 ���Դ��ڵ�����</span> </li><li>��һ���������Ź����ľ���Ҳ����òͣ���һ�о���������˷���̬�Ⱥúã�������ʳƷҲû����Ϊ���Ź������о������٣�������Ϊ������û����ˣ�����ӣ�����Ա����ϸ�����ѣ������Ҫ�����շѣ������ģ��о��ǳ��ã�Ҳ�����Ƶ�Ĳ��ƣ��о��۸�Ƚϴ��ڻ�������̫���ر��ߵ�ʱ�򣬻�Ц�ź����Ǵ��к�������û�Ź����´λ���������~-~ <span>����to630 ���Դ��ڵ�����</span> </li></ul>\r\n</div>\r\n</div>\r\n</p>\r\n', '135', '4.3', 12, '�Ź�: ����49Ԫ��ԭ��135Ԫ��麼Ǿ�¥���ﶬ�̲���ֵ���˫���ײ͡�1��:��ݻ���������+�ڽ������h���+������߳şh��+�ʲ泴����/�����򳴲��ģ�2ѡ1��+�����Ϲ���+��λ2λ���������ǽ�����ʱ�ڣ�麼Ǿ�¥�ﶬ��һ�·��ף�ǧ������ⳡ��ֵ������磡������ѷ���10Ԫ', '2011-03-02', '�����к������¶�·�¶ɴ��5��');
INSERT INTO `qb_shoptg_content_1` VALUES (12, 12, 1, 1, '<p style="color:#f66666;font-size:16px;font-weight:bold;">������ʿ ��turkey ham &amp;bacon melt��</p>\r\n<p style="color:#666666;">ʳ�İ�������������ȡ����ء����ˡ�����������С��ཷ���ƹ�</p>\r\n<p style="color:#666666;">����ǧ�Ե�����������ʿ��������ζ�����۵ļ����⣬��֬�Ļ��ȣ��ɴ������������ڵ����ң����������߲˺Ͷ��صĽ��ϣ�һ�ж��ں������������ζ����ڣ��ǲ���������һ����</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/002.jpg" width="430" height="287" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">��ζ���ֲ���subway club��</p>\r\n<p style="color:#666666;">��ζ���ֲ�������ζ�ں�</p>\r\n<p style="color:#666666;">ʳ�İ�����ţ�⡢���ȡ����ء����ˡ�����������С��ཷ���ƹ�</p>\r\n<p style="color:#666666;">�����İ�ζ�ںϣ����۵ļ����⣬Ũ����ζ���㿾ţ�⣬��֬�Ļ�����Ƭ���ֳ����Ƶ���������������߲˺Ͷ��صĽ��ϣ����ص�ζ��������������˭��</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/003.jpg" width="430" height="287" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">�������</p>\r\n<p style="color:#666666;">�����������Ũ������������ȣ�����Ʒ�����ڸ�˳����˿�������ɿ���Ϊ��������ʱ����������ɫ�ʰɡ�</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/004.jpg" width="430" height="663" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">���ɽֳ����׿���</p>\r\n<p style="color:#666666;">�׿��Ȳ����ǰ�ɫ�Ŀ��ȣ��������˿���ԭ�е�ɫ�����ζ��ȴ����ͨ���ȸ��嵭��ͣ��ʴ����㣡�ڶ����������һ���ȴ��ɿڵľɽֳ��׿��ȣ���������Ȼ������</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/005.jpg" width="430" height="550" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">���ױ�</p>\r\n<p style="color:#666666;">������Ʊ��������ף���ζ�в��������㣻Ʒ���䣬���ܸ������׵��������������ﵴ���ء�</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/006.jpg" width="430" height="287" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">����</p>\r\n<p style="color:#666666;">�����������˵ľ���ˬ��ĿڸС���Ũ�ɴ������·���ڼ������л��������ӡ���������ֿ�ζ�ɹ�ѡ��Ӵ��</p>\r\n<br />\r\n<div><p style="color:#f66666;background-color:#f7f7f7;font-size:16px;font-weight:bold;">����ζ</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/007.jpg" width="430" height="286" border="0" /></p>\r\n<br />\r\n<p style="color:#666666;">����ζ1965�������������Ҹ��ݵ�����Ŀǰ��ȫ��91������ӵ�г���33000�������꣨���й��ѳ���200�������꣩�������������ġ�Ǳˮͧ������������Ӫ����������17������������ҵ�ҡ���־�б���Ϊȫ������Ӫ��һ������Ϊ���ʿ��ҵ�����һ�������ߡ�</p>\r\n<p style="color:#666666;">����ζ���ṩ��������ζ��������������������ؼ�������������ÿλ�˿͵���Ҫ�Ͳ�ͬ�Ŀ�ζ���ֳ�����ÿһ�������Ρ�ɳ�����ζ�������������㶼�ǵ��쿾�ƣ��߲˺����ϸ������ʡ�Ӫ������ζ��������</p>\r\n<p style="color:#666666;">����ζ�ǽ�����ʳ���쵼�ߡ���7��SUBWAY�����ε�֬����������6�ˣ����Ĺ���洦�ɼ��������ܵ����а��켰׷���Ʒ��������ʿ��������</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/009.jpg" width="430" height="287" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/010.jpg" width="430" height="287" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/014.jpg" width="430" height="287" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/015.jpg" width="430" height="287" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/018.jpg" width="430" height="287" border="0" /></p>\r\n<br />\r\n<br />\r\n</div>\r\n', '79', '4', 8, '�Ź�: ����38Ԫ��ԭ��79Ԫ����ζ��������˲͡��ײ�ȯ1�ţ�������ʿ��6Ӣ�磩+��ζ���ֲ���6Ӣ�磩+�������+���ɽֳ����׿���+���ױ�+���棡��16��ͨ�ң�����ζ�籩ϯ�����������������������ζ�ġ�Ǳˮͧ�������γ���������½���� ������ѷ���10Ԫ \r\n', '2011-02-01', '');

# --------------------------------------------------------

#
# ��Ľṹ `qb_shoptg_content_2`
#

DROP TABLE IF EXISTS `qb_shoptg_content_2`;
CREATE TABLE `qb_shoptg_content_2` (
  `rid` mediumint(7) NOT NULL auto_increment,
  `id` int(10) NOT NULL default '0',
  `fid` mediumint(7) NOT NULL default '0',
  `uid` mediumint(7) NOT NULL default '0',
  `content` mediumtext NOT NULL,
  `order_username` varchar(20) NOT NULL default '',
  `order_phone` varchar(20) NOT NULL default '',
  `order_mobphone` varchar(15) NOT NULL default '',
  `order_email` varchar(50) NOT NULL default '',
  `order_qq` varchar(11) NOT NULL default '',
  `order_postcode` varchar(6) NOT NULL default '',
  `order_sendtype` tinyint(1) NOT NULL default '0',
  `order_paytype` tinyint(1) NOT NULL default '0',
  `order_address` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`rid`),
  KEY `fid` (`fid`),
  KEY `id` (`id`),
  KEY `uid` (`uid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# �������е����� `qb_shoptg_content_2`
#


# --------------------------------------------------------

#
# ��Ľṹ `qb_shoptg_field`
#

DROP TABLE IF EXISTS `qb_shoptg_field`;
CREATE TABLE `qb_shoptg_field` (
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
) TYPE=MyISAM AUTO_INCREMENT=156 ;

#
# �������е����� `qb_shoptg_field`
#

INSERT INTO `qb_shoptg_field` VALUES (86, 1, '��ϸ����', 'content', 'mediumtext', 0, 1, 'ieedit', 600, 250, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (151, 2, '֧����ʽ', 'order_paytype', 'int', 1, 2, 'radio', 0, 0, '1|�������� \r\n2|���е���ATMת��\r\n3|�ʾֻ��\r\n4|���ϼ�ʱ֧��', '1', '', '', 0, 0, 0, 0, '', '', '', '', 0, '');
INSERT INTO `qb_shoptg_field` VALUES (152, 2, '��ϵ��ַ', 'order_address', 'varchar', 100, 1, 'text', 200, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (80, 1, '�ۿ�', 'shoptype', 'varchar', 10, 7, 'text', 10, 0, '', '', '��', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (142, 2, '��ע����', 'content', 'mediumtext', 0, -1, 'textarea', 400, 50, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (78, 1, '�г��۸�', 'market_price', 'varchar', 10, 9, 'text', 12, 0, '', '', 'Ԫ', '', 0, 1, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (77, 1, '����Ź�����', 'min_num', 'int', 4, 10, 'text', 50, 0, '', '', '', '', 0, 1, 1, 1, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (145, 2, '��ϵ�绰', 'order_phone', 'varchar', 20, 8, 'text', 100, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (144, 2, '�˿�����', 'order_username', 'varchar', 20, 9, 'text', 100, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (146, 2, '��ϵ�ֻ�', 'order_mobphone', 'varchar', 15, 7, 'text', 100, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (147, 2, '��ϵ����', 'order_email', 'varchar', 50, 6, 'text', 100, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (148, 2, '��ϵQQ', 'order_qq', 'varchar', 11, 5, 'text', 100, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (149, 2, '��������', 'order_postcode', 'varchar', 6, 4, 'text', 100, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (150, 2, '���ͷ�ʽ', 'order_sendtype', 'int', 1, 3, 'radio', 0, 0, '1|����ȡ��\r\n2|ƽ��\r\n3|��ͨ���\r\n4|EMS���', '3', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (153, 1, '���', 'about', 'mediumtext', 0, 11, 'textarea', 400, 90, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (154, 1, '��������', 'end_time', 'varchar', 20, 2, 'time', 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (155, 1, '�̼ҵ�ַ', 'address', 'varchar', 150, 0, 'text', 500, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');

# --------------------------------------------------------

#
# ��Ľṹ `qb_shoptg_join`
#

DROP TABLE IF EXISTS `qb_shoptg_join`;
CREATE TABLE `qb_shoptg_join` (
  `id` mediumint(7) NOT NULL auto_increment,
  `mid` smallint(4) NOT NULL default '0',
  `cid` mediumint(7) NOT NULL default '0',
  `cuid` mediumint(7) NOT NULL default '0',
  `fid` mediumint(7) NOT NULL default '0',
  `posttime` int(10) NOT NULL default '0',
  `uid` mediumint(7) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `yz` tinyint(1) NOT NULL default '0',
  `ip` varchar(15) NOT NULL default '',
  `shopnum` mediumint(7) NOT NULL default '0',
  `ifpay` tinyint(1) NOT NULL default '0',
  `ifsend` tinyint(1) NOT NULL default '0',
  `totalmoney` varchar(10) NOT NULL default '',
  `banktype` varchar(15) NOT NULL default '',
  `emscode` varchar(32) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `mid` (`mid`),
  KEY `fid` (`fid`,`cid`),
  KEY `yz` (`yz`,`fid`,`mid`,`cid`),
  KEY `cuid` (`cuid`)
) TYPE=MyISAM AUTO_INCREMENT=3 ;

#
# �������е����� `qb_shoptg_join`
#


# --------------------------------------------------------

#
# ��Ľṹ `qb_shoptg_module`
#

DROP TABLE IF EXISTS `qb_shoptg_module`;
CREATE TABLE `qb_shoptg_module` (
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
) TYPE=MyISAM AUTO_INCREMENT=3 ;

#
# �������е����� `qb_shoptg_module`
#

INSERT INTO `qb_shoptg_module` VALUES (2, 0, '����ģ��', 1, '', '', '', 0, 0, 'a:4:{s:4:"list";s:12:"joinlist.htm";s:4:"show";s:12:"joinshow.htm";s:4:"post";s:8:"join.htm";s:6:"search";s:0:"";}');
INSERT INTO `qb_shoptg_module` VALUES (1, 0, '�Ź�ģ��', 4, '', '', '', 1, 0, '');

# --------------------------------------------------------

#
# ��Ľṹ `qb_shoptg_pic`
#

DROP TABLE IF EXISTS `qb_shoptg_pic`;
CREATE TABLE `qb_shoptg_pic` (
  `pid` mediumint(7) NOT NULL auto_increment,
  `id` mediumint(10) NOT NULL default '0',
  `fid` mediumint(7) NOT NULL default '0',
  `mid` smallint(4) NOT NULL default '0',
  `uid` mediumint(7) NOT NULL default '0',
  `type` tinyint(1) NOT NULL default '0',
  `imgurl` varchar(150) NOT NULL default '',
  `name` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`pid`),
  KEY `id` (`id`),
  KEY `fid` (`fid`)
) TYPE=MyISAM AUTO_INCREMENT=4 ;

#
# �������е����� `qb_shoptg_pic`
#

INSERT INTO `qb_shoptg_pic` VALUES (1, 10, 1, 0, 1, 0, 'qb_shoptg_/1/1_20101227211204_mwrvk.jpg', '');
INSERT INTO `qb_shoptg_pic` VALUES (2, 11, 1, 0, 1, 0, 'qb_shoptg_/1/1_20101227211213_likqz.jpg', '');
INSERT INTO `qb_shoptg_pic` VALUES (3, 12, 1, 0, 1, 0, 'qb_shoptg_/1/1_20101227211251_qeki2.jpg', '');

# --------------------------------------------------------

#
# ��Ľṹ `qb_shoptg_report`
#

DROP TABLE IF EXISTS `qb_shoptg_report`;
CREATE TABLE `qb_shoptg_report` (
  `rid` mediumint(7) NOT NULL auto_increment,
  `id` mediumint(7) NOT NULL default '0',
  `fid` mediumint(7) NOT NULL default '0',
  `uid` mediumint(7) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `posttime` int(10) NOT NULL default '0',
  `onlineip` varchar(15) NOT NULL default '',
  `type` tinyint(2) NOT NULL default '0',
  `content` text NOT NULL,
  `iftrue` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`rid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# �������е����� `qb_shoptg_report`
#


# --------------------------------------------------------

#
# ��Ľṹ `qb_shoptg_sort`
#

DROP TABLE IF EXISTS `qb_shoptg_sort`;
CREATE TABLE `qb_shoptg_sort` (
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
) TYPE=MyISAM AUTO_INCREMENT=4 ;

#
# �������е����� `qb_shoptg_sort`
#

INSERT INTO `qb_shoptg_sort` VALUES (1, 0, '��ʳ��', 1, 1, 0, 0, '', 0, 0, '', '', '', '', 'a:4:{s:4:"head";s:0:"";s:4:"foot";s:0:"";s:4:"list";s:0:"";s:8:"bencandy";s:0:"";}', '', 0, '', '', '', 0, '', '', '', '', 0, 'a:2:{s:7:"is_html";N;s:11:"field_value";N;}', 0, 0, '', 'diannao', 0);
INSERT INTO `qb_shoptg_sort` VALUES (2, 0, '������', 1, 1, 0, 0, '', 0, 0, '', '', '', '', 'a:4:{s:4:"head";s:0:"";s:4:"foot";s:0:"";s:4:"list";s:0:"";s:8:"bencandy";s:0:"";}', '', 0, '', '', '', 0, '', '', '', '', 0, 'a:2:{s:7:"is_html";N;s:11:"field_value";N;}', 0, 0, '', 'shouji', 0);
INSERT INTO `qb_shoptg_sort` VALUES (3, 0, 'ʵ����', 1, 1, 0, 0, '', 0, 0, '', '', '', '', 'a:4:{s:4:"head";s:0:"";s:4:"foot";s:0:"";s:4:"list";s:0:"";s:8:"bencandy";s:0:"";}', '', 0, '', '', '', 0, '', '', '', '', 0, 'a:2:{s:7:"is_html";N;s:11:"field_value";N;}', 0, 0, '', 'xiangji', 0);

ALTER TABLE `qb_shoptg_content` ADD `gg_maps` VARCHAR( 50 ) NOT NULL AFTER `pay_num` ;
