INSERT INTO `qb_module` (`id`, `type`, `name`, `pre`, `dirname`, `domain`, `admindir`, `config`, `list`, `admingroup`, `adminmember`, `ifclose`) VALUES (37, 2, '官方团购', 'shoptg_', 'shoptg', '', '', '', 0, '', '', 0);


INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'shoptg_a4', 'article', 1, 'a:33:{s:13:"tplpart_1code";s:65:"<div class="list"><a href="$url" target="_blank">$title</a></div>";s:13:"tplpart_2code";s:0:"";s:3:"SYS";s:7:"artcile";s:13:"RollStyleType";s:0:"";s:7:"fidtype";s:1:"0";s:8:"rolltype";s:10:"scrollLeft";s:8:"rolltime";s:1:"3";s:11:"roll_height";s:2:"50";s:5:"width";s:3:"250";s:6:"height";s:3:"187";s:7:"newhour";s:2:"24";s:7:"hothits";s:3:"100";s:7:"amodule";s:3:"106";s:7:"tplpath";s:0:"";s:6:"DivTpl";i:1;s:5:"fiddb";N;s:5:"stype";s:1:"4";s:2:"yz";s:1:"1";s:7:"hidefid";N;s:10:"timeformat";s:11:"Y-m-d H:i:s";s:5:"order";s:6:"A.list";s:3:"asc";s:4:"DESC";s:6:"levels";s:3:"all";s:7:"rowspan";s:1:"8";s:3:"sql";s:138:" SELECT A.*,A.aid AS id FROM qb_article A  WHERE A.city_id=\'$GLOBALS[city_id]\' AND A.yz=1  AND A.mid=\'106\'   ORDER BY A.list DESC LIMIT 8 ";s:4:"sql2";N;s:7:"colspan";s:1:"1";s:11:"content_num";s:2:"80";s:12:"content_num2";s:3:"120";s:8:"titlenum";s:2:"30";s:9:"titlenum2";s:2:"40";s:10:"titleflood";s:1:"0";s:10:"c_rolltype";s:1:"0";}', 'a:3:{s:5:"div_w";s:3:"225";s:5:"div_h";s:3:"217";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1293512226, 0, 37, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'shoptg_ad1', 'pic', 0, 'a:4:{s:6:"imgurl";s:32:"label/1_20101228121201_roifx.gif";s:7:"imglink";s:1:"#";s:5:"width";s:3:"274";s:6:"height";s:3:"112";}', 'a:3:{s:5:"div_w";s:3:"274";s:5:"div_h";s:3:"109";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1293512165, 0, 37, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'shoptg_ad13', 'pic', 0, 'a:4:{s:6:"imgurl";s:32:"label/1_20101228121218_clmme.gif";s:7:"imglink";s:1:"#";s:5:"width";s:3:"311";s:6:"height";s:3:"112";}', 'a:3:{s:5:"div_w";s:3:"314";s:5:"div_h";s:3:"111";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1293512151, 0, 37, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'shoptg_ad2', 'pic', 0, 'a:4:{s:6:"imgurl";s:32:"label/1_20101228121236_ljffn.gif";s:7:"imglink";s:1:"#";s:5:"width";s:3:"375";s:6:"height";s:3:"112";}', 'a:3:{s:5:"div_w";s:3:"374";s:5:"div_h";s:3:"111";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1293512157, 0, 37, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'shoptg_m5', 'code', 0, '<a href="#" target="_blank">更多</a>', 'a:4:{s:9:"html_edit";N;s:5:"div_w";s:0:"";s:5:"div_h";s:0:"";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 0, 0, 37, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'shoptg_tt4', 'code', 0, '注意事项', 'a:4:{s:9:"html_edit";N;s:5:"div_w";s:0:"";s:5:"div_h";s:0:"";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 0, 0, 37, 0, 0, 'default');
    
    
  

DROP TABLE IF EXISTS `qb_shoptg_collection`;
CREATE TABLE `qb_shoptg_collection` (
  `cid` mediumint(7) NOT NULL auto_increment,
  `id` mediumint(7) NOT NULL default '0',
  `uid` mediumint(7) NOT NULL default '0',
  `posttime` int(10) NOT NULL default '0',
  PRIMARY KEY  (`cid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# 导出表中的数据 `qb_shoptg_collection`
#


# --------------------------------------------------------

#
# 表的结构 `qb_shoptg_comments`
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
# 导出表中的数据 `qb_shoptg_comments`
#


# --------------------------------------------------------

#
# 表的结构 `qb_shoptg_config`
#

DROP TABLE IF EXISTS `qb_shoptg_config`;
CREATE TABLE `qb_shoptg_config` (
  `c_key` varchar(50) NOT NULL default '',
  `c_value` text NOT NULL,
  `c_descrip` text NOT NULL,
  PRIMARY KEY  (`c_key`)
) TYPE=MyISAM;

#
# 导出表中的数据 `qb_shoptg_config`
#

INSERT INTO `qb_shoptg_config` VALUES ('sort_layout', '1,75#2,4#71,65#5,54#3#', '');
INSERT INTO `qb_shoptg_config` VALUES ('Info_ReportDB', '违法信息\r\n过期信息\r\n垃圾信息', '');
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
INSERT INTO `qb_shoptg_config` VALUES ('Info_metakeywords', '打折促销就来这里,天天有低价!', '');
INSERT INTO `qb_shoptg_config` VALUES ('module_id', '37', '');
INSERT INTO `qb_shoptg_config` VALUES ('Info_webname', '官方团购', '');

# --------------------------------------------------------

#
# 表的结构 `qb_shoptg_content`
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
# 导出表中的数据 `qb_shoptg_content`
#

INSERT INTO `qb_shoptg_content` VALUES (10, '仅售998元！原价1819元的悦来粤顺酒家“喜庆年餐”1份', 1, 1, '饮食类', 2, 0, 1293455884, '1293455884', 1, 'admin', '', 'qb_shoptg_/1/1_20101227211204_mwrvk.jpg.gif', 1, 1, 0, 0, '', '127.0.0.1', 0, 0, '', 0, 0, 1293511788, 1, 1, '1819', 0, 0);
INSERT INTO `qb_shoptg_content` VALUES (11, '仅售49元！原价135元的楹记酒楼“秋冬滋补超值鹧鸪双人套餐”1份', 1, 1, '饮食类', 1, 0, 1293456073, '1293456073', 1, 'admin', '', 'qb_shoptg_/1/1_20101227211213_likqz.jpg.gif', 1, 1, 0, 0, '', '127.0.0.1', 0, 0, '', 0, 0, 1293456075, 1, 1, '49', 0, 0);
INSERT INTO `qb_shoptg_content` VALUES (12, '仅售38元！原价79元赛百味“经典二人餐”套餐券1张', 1, 1, '饮食类', 14, 0, 1293456231, '1293456231', 1, 'admin', '', 'qb_shoptg_/1/1_20101227211251_qeki2.jpg.gif', 1, 1, 0, 0, '', '127.0.0.1', 0, 0, '', 0, 0, 1293512306, 1, 1, '39', 0, 0);

# --------------------------------------------------------

#
# 表的结构 `qb_shoptg_content_1`
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
# 导出表中的数据 `qb_shoptg_content_1`
#

INSERT INTO `qb_shoptg_content_1` VALUES (10, 10, 1, 1, '<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">悦来老火靓汤</p>\r\n<p><font color="#666666">大厨精心秘制，火候够，每喝的一口都是其精华所在！</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/005.jpg" width="430" height="576" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">鸿运烧味拼盘</p>\r\n<p><font color="#666666">烧味拼盘包含烧肉、叉烧、卤水猪肚、卤水掌亦等；烧肉皮脆肉香，叉烧甘香可口，卤水猪肚等更是经过大厨秘制的卤水汁腌制，软滑入味！</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/006.jpg" width="430" height="200" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">上汤/芝士焗美国波士顿龙虾</p>\r\n<p><font color="#666666">美国龙虾又称为缅因龙虾，出产于美国新泽西州到加拿大纽芬兰省，年出产量约7万吨，是世界著名的美味海产。其肉质鲜美、口感爽脆有弹性，龙虾味较浓，营养丰富。上汤能带出龙虾独特的鲜美嫩滑，芝士焗能跟龙虾相得益彰，完美相融。两种烹调方法都是能让人赞口不已的一绝。</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/007.jpg" width="430" height="286" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/008.jpg" width="430" height="200" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">姜葱/避风塘/咖喱焗加拿大珍宝蟹</p>\r\n<p><font color="#666666">珍宝蟹蟹味柔和，质地坚实，味质带甜，姜葱、避风塘、咖喱等惹味做法都能与珍宝蟹互相辉映，各有风味。</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/009.jpg" width="430" height="576" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">清蒸东升斑</p>\r\n<p><font color="#666666">东升斑又名东星斑，因产自东沙群岛，以及身上布满白色的幼细花点，形似天上的星星而得名；东升斑肉较多，而且颜色雪白，用以清蒸最能吃出其鲜甜的肉质味道，除了容易消化、滋补肝肾之外还能延年益寿。</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/010.jpg" width="430" height="286" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">红炆东山羊</p>\r\n<p><font color="#666666">东山羊其美味据说是因羊食东山岭的稀有草木所致，因此肥而不腻、食无膻味，且滋补养颜防湿热；经红炆后，肉质酥烂，惹味开胃，不膻不腻！</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/011.jpg" width="430" height="200" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">驰名白切鸡</p>\r\n<p><font color="#666666">白切鸡是粤菜里最为经典的翘首之一，以其不加配料浸熟且肉不烂为佳，皮爽肉滑无渣，吃时配上即磨的姜葱，简简单单的就能让你食指大动！ </font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/012.jpg" width="430" height="576" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">雀巢美果肉丁</p>\r\n<p><font color="#666666">用芋丝炸成雀巢，配上腰果跟肉丁，香脆可口，口感层次分明！</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/013.jpg" width="430" height="200" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">竹笙扒时蔬</p>\r\n<p><font color="#666666">竹笙是世界上著名的珍贵食用真菌，被誉为“山珍之王”，“菌中皇后”；竹笙菌体洁白细嫩，营养价值很高且鲜美，用以高汤烹调，蔬菜吸收了竹笙的鲜，味道更为甘甜，美味又有益！</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/014.jpg" width="430" height="286" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">幸福炒饭</p>\r\n<p><font color="#666666">饭粒软硬适中带甘香，金黄的色泽，真的是每尝一口都令人感到满足的幸福！</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/015.jpg" width="430" height="286" border="0" /></p>\r\n<br />\r\n<br />\r\n<div><p style="color:#f66666;background-color:#f7f7f7;font-size:16px;font-weight:bold;">悦来粤顺酒家</p>\r\n<p><font color="#666666">悦来粤顺酒楼以粤、川、湘菜为主，主要原料有特有农家绿色菜。为顾客提供独具特色的健康食物，近百种粤式小炒，生猛海鲜任君选择；悦来粤顺以丰富多样的美食选择，全方位的餐饮综合服务项目：如婚宴、生日宴和海鲜套餐等；其多元化的元素缔造了特有的时尚、品味餐饮文化。</font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/001.jpg" width="430" height="286" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/002.jpg" width="430" height="286" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/003.jpg" width="430" height="576" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yuelaiyueshun2/004.jpg" width="430" height="286" border="0" /></p>\r\n</div>\r\n', '998', '8.7', 5, '今日团购: 仅售998元！原价1819元的悦来粤顺酒家“喜庆年餐”1份：悦来老火靓汤+鸿运烧味拼盘+上汤/芝士焗美国波士顿龙虾（1.5斤）+姜葱/避风塘/咖喱焗加拿大珍宝蟹（1.5斤）+清蒸东升斑1条（1斤以上）+红炆东山羊+驰名白切鸡+雀巢美果肉丁+竹笙扒时蔬+幸福炒饭+米饭10份+茶位10位+赠送会员卡1张+免费停车2小时！迎新年限量供应！美食精华大汇集！邀请好友返利10元\r\n', '2011-02-31', '广州市金碧花园第三期工业大道南会所三楼');
INSERT INTO `qb_shoptg_content_1` VALUES (11, 11, 1, 1, '<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;"><span>虫草花淮杞炖鹧鸪</span></p>\r\n<p style="color:#666666;"><a href="http://baike.baidu.com/view/27948.htm" target="_blank">《本草纲目》中有“鹧鸪补五脏、益心力”，民间也有“飞禽莫如鸪”“一鸪顶九鸡”之说，足见鹧鸪营养滋补；鹧鸪不仅滋补，还低脂、低热量、低胆固醇；此外，虫草花性质平和，不寒不燥，能增强和调节人体免疫功能；淮山健脾益胃、助消化，枸杞子有补肝益肾之功，几种滋补上品与鹧鸪一同炖制，简直就是养生圣品！</a><p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingjijiulou/003.jpg" width="430" height="320" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;"><span>黑椒香辣焗鹧鸪</span></p>\r\n<p style="color:#666666;">鹧鸪体型小巧，骨细肉厚，肌肉味美，还含有人体所需的多种氨基酸及锌等多种微量无素，甚至被誉为脑黄金的牛黄酸，有着非常高的食用非常价值呢！</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingjijiulou/001.jpg" width="430" height="320" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;"><span>鹧鸪肾瓦撑焗饭</span></p>\r\n<p style="color:#666666;">焗饭因爽脆的鹧鸪肾而更为可口，同时，瓦撑紧紧锁住焗饭的鲜香和温热，让送进嘴里的每一口饭都变得有滋有味！</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingjijiulou/002.jpg" width="430" height="320" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;"><span>鲮鱼球炒菜心</span></p>\r\n<p style="color:#666666;">鲮鱼起肉切碎挞成肉球，只有这样才使鱼球爽口弹牙，一口鲜嫩清甜的菜心，一口弹牙的鲮鱼球，回味无穷！</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingjijiulou/004.jpg" width="430" height="320" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;"><span>肥叉炒菜心</span></p>\r\n<p style="color:#666666;">叉烧肥厚甘香，菜心青嫩可口，十分鲜甜，青菜含有大量维生素，记得多吃哟～</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingjijiulou/006.jpg" width="430" height="447" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;"><span>松子南瓜烙</span></p>\r\n<p style="color:#666666;">金黄香脆的松子南瓜烙让人嘴馋忍不住马上动筷，香味四溢，更是让人垂涎三尺！</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingjijiulou/005.jpg" width="430" height="260" border="0" /></p>\r\n<br />\r\n<br />\r\n<div><p style="color:#f66666;background-color:#f7f7f7;font-size:16px;font-weight:bold;">楹记酒楼</p>\r\n<p style="color:#666666;">楹记酒楼是一间传统粤菜酒楼，以粤式点心、广州风味小炒作为酒楼的经营风格，全天候服务于市民；酒楼设计为中等档次，设有多间贵宾房，酒楼大大小时有450个餐位。招牌菜有滋补珍味鸡、农家煀海鲩、炭烧琵琶鸭及多款广州风味小炒菜式。</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingji/006.jpg" width="430" height="320" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingji/005.jpg" width="430" height="320" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingji/003.jpg" width="430" height="320" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/yingji/002.jpg" width="430" height="320" border="0" /></p>\r\n<br />\r\n<br />\r\n<p style="color:#f66666;background-color:#f7f7f7;font-size:16px;font-weight:bold;">大家点评</p>\r\n<br />\r\n<div style="color:#666666;"><ul><li>琴晚妈妈生日带她来试食，挺好找的。三个人只吃了一只鸭，打包了一只。酒店很公道，没缩水和加茶钱。吃完就可以走。另外这里的点心也很实惠，每天两款特价，茶位都是两蚊/位。 <span>－－lyy813 来自大众点评网</span> </li><li>第一次用网上团购来的卷到这家餐厅用餐，第一感觉是这里的人服务态度好好，上来的食品也没有因为是团购，而感觉份量少，后来因为，觉得没有青菜，额外加，服务员还会细心提醒，这个需要额外收费，好贴心，感觉非常好，也看过酒店的餐牌，感觉价格比较大众化，不会太贵。特别走的时候，还笑着和我们打招呼，就算没团购卷，下次还会再来的~-~ <span>－－to630 来自大众点评网</span> </li></ul>\r\n</div>\r\n</div>\r\n</p>\r\n', '135', '4.3', 12, '团购: 仅售49元！原价135元的楹记酒楼“秋冬滋补超值鹧鸪双人套餐”1份:虫草花淮杞炖鹧鸪+黑椒香辣焗鹧鸪+鹧鸪肾瓦撑焗饭+肥叉炒菜心/鲮鱼球炒菜心（2选1）+松子南瓜烙+茶位2位！冬季可是进补好时节，楹记酒楼秋冬又一新奉献，千万别错过这场超值的鹧鸪宴！邀请好友返利10元', '2011-03-02', '广州市海珠区下渡路下渡大街5号');
INSERT INTO `qb_shoptg_content_1` VALUES (12, 12, 1, 1, '<p style="color:#f66666;font-size:16px;font-weight:bold;">香热奇士 （turkey ham &amp;bacon melt）</p>\r\n<p style="color:#666666;">食材包括：培根、火腿、火鸡胸、生菜、西红柿、洋葱、青椒、黄瓜</p>\r\n<p style="color:#666666;">万语千言道不尽香热奇士的美妙滋味。柔嫩的鸡胸肉，低脂的火腿，松脆的培根，热融融的奶酪，配以清脆的蔬菜和独特的酱料，一切都融合在松软的赛百味面包内！是不是想再来一个？</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/002.jpg" width="430" height="287" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">百味俱乐部（subway club）</p>\r\n<p style="color:#666666;">百味俱乐部——百味融合</p>\r\n<p style="color:#666666;">食材包括：牛肉、火腿、火鸡胸、生菜、西红柿、洋葱、青椒、黄瓜</p>\r\n<p style="color:#666666;">真正的百味融合，柔嫩的鸡胸肉，浓郁美味的香烤牛肉，低脂的火腿切片，现场烤制的面包，配以清脆的蔬菜和独特的酱料，独特的味觉挑逗，舍我其谁！</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/003.jpg" width="430" height="287" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">热朱古力</p>\r\n<p style="color:#666666;">杯子里承载香浓热朱古力的温热，轻轻品尝，口感顺滑如丝，让热巧克力为您的悠闲时光添上甜美色彩吧～</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/004.jpg" width="430" height="663" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">“旧街场”白咖啡</p>\r\n<p style="color:#666666;">白咖啡并不是白色的咖啡，它保留了咖啡原有的色泽和香味，却比普通咖啡更清淡柔和，甘醇芳香！在冬季的午后来一杯匀醇可口的旧街场白咖啡，好心情油然而生！</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/005.jpg" width="430" height="550" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">玉米杯</p>\r\n<p style="color:#666666;">粒粒金黄饱满的玉米，甜味中搀杂着奶香；品尝间，还能感受玉米的柔情蜜意在嘴里荡漾呢～</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/006.jpg" width="430" height="287" border="0" /></p>\r\n<br />\r\n<p style="color:#f66666;font-size:16px;font-weight:bold;">曲奇</p>\r\n<p style="color:#666666;">曲奇最吸引人的就是爽快的口感。香浓松脆的曲奇仿佛入口即化。有花生、提子、朱古力三种口味可供选择哟！</p>\r\n<br />\r\n<div><p style="color:#f66666;background-color:#f7f7f7;font-size:16px;font-weight:bold;">赛百味</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/007.jpg" width="430" height="286" border="0" /></p>\r\n<br />\r\n<p style="color:#666666;">赛百味1965年在美国康涅狄格州诞生，目前在全球91个国家拥有超过33000家连锁店（在中国已超过200家连锁店），是世界上最大的“潜水艇”三明治特许经营机构。连续17年在美国《企业家》杂志中被评为全球特许经营第一名，成为国际快餐业大军的一个领先者。</p>\r\n<p style="color:#666666;">赛百味以提供新鲜且美味的三明治著称在世界各地家喻户晓，根据每位顾客的需要和不同的口味，现场制作每一款三明治、沙拉或百味卷。所有面包、甜点都是当天烤制，蔬菜和配料更是新鲜、营养、美味、健康。</p>\r\n<p style="color:#666666;">赛百味是健康饮食的领导者。“7种SUBWAY三明治的脂肪含量低于6克！”的广告随处可见。尤其受到都市白领及追求高品质生活人士的青睐。</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/009.jpg" width="430" height="287" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/010.jpg" width="430" height="287" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/014.jpg" width="430" height="287" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/015.jpg" width="430" height="287" border="0" /></p>\r\n<br />\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://s.lashouimg.com/tuangou/guangzhou/saibaiwei/018.jpg" width="430" height="287" border="0" /></p>\r\n<br />\r\n<br />\r\n</div>\r\n', '79', '4', 8, '团购: 仅售38元！原价79元赛百味“经典二人餐”套餐券1张：香热奇士（6英寸）+百味俱乐部（6英寸）+热朱古力+“旧街场”白咖啡+玉米杯+曲奇！（16店通兑）赛百味风暴席卷而来！这艘满载新鲜且美味的“潜水艇”三明治诚邀您“登陆”！ 邀请好友返利10元 \r\n', '2011-02-01', '');

# --------------------------------------------------------

#
# 表的结构 `qb_shoptg_content_2`
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
# 导出表中的数据 `qb_shoptg_content_2`
#


# --------------------------------------------------------

#
# 表的结构 `qb_shoptg_field`
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
# 导出表中的数据 `qb_shoptg_field`
#

INSERT INTO `qb_shoptg_field` VALUES (86, 1, '详细介绍', 'content', 'mediumtext', 0, 1, 'ieedit', 600, 250, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (151, 2, '支付方式', 'order_paytype', 'int', 1, 2, 'radio', 0, 0, '1|货到付款 \r\n2|银行电汇或ATM转帐\r\n3|邮局汇款\r\n4|网上即时支付', '1', '', '', 0, 0, 0, 0, '', '', '', '', 0, '');
INSERT INTO `qb_shoptg_field` VALUES (152, 2, '联系地址', 'order_address', 'varchar', 100, 1, 'text', 200, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (80, 1, '折扣', 'shoptype', 'varchar', 10, 7, 'text', 10, 0, '', '', '折', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (142, 2, '附注留言', 'content', 'mediumtext', 0, -1, 'textarea', 400, 50, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (78, 1, '市场价格', 'market_price', 'varchar', 10, 9, 'text', 12, 0, '', '', '元', '', 0, 1, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (77, 1, '最低团购人数', 'min_num', 'int', 4, 10, 'text', 50, 0, '', '', '', '', 0, 1, 1, 1, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (145, 2, '联系电话', 'order_phone', 'varchar', 20, 8, 'text', 100, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (144, 2, '顾客姓名', 'order_username', 'varchar', 20, 9, 'text', 100, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (146, 2, '联系手机', 'order_mobphone', 'varchar', 15, 7, 'text', 100, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (147, 2, '联系邮箱', 'order_email', 'varchar', 50, 6, 'text', 100, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (148, 2, '联系QQ', 'order_qq', 'varchar', 11, 5, 'text', 100, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (149, 2, '邮政编码', 'order_postcode', 'varchar', 6, 4, 'text', 100, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (150, 2, '配送方式', 'order_sendtype', 'int', 1, 3, 'radio', 0, 0, '1|上门取货\r\n2|平邮\r\n3|普通快递\r\n4|EMS快递', '3', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (153, 1, '简介', 'about', 'mediumtext', 0, 11, 'textarea', 400, 90, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (154, 1, '结束日期', 'end_time', 'varchar', 20, 2, 'time', 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_shoptg_field` VALUES (155, 1, '商家地址', 'address', 'varchar', 150, 0, 'text', 500, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');

# --------------------------------------------------------

#
# 表的结构 `qb_shoptg_join`
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
# 导出表中的数据 `qb_shoptg_join`
#


# --------------------------------------------------------

#
# 表的结构 `qb_shoptg_module`
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
# 导出表中的数据 `qb_shoptg_module`
#

INSERT INTO `qb_shoptg_module` VALUES (2, 0, '订单模型', 1, '', '', '', 0, 0, 'a:4:{s:4:"list";s:12:"joinlist.htm";s:4:"show";s:12:"joinshow.htm";s:4:"post";s:8:"join.htm";s:6:"search";s:0:"";}');
INSERT INTO `qb_shoptg_module` VALUES (1, 0, '团购模型', 4, '', '', '', 1, 0, '');

# --------------------------------------------------------

#
# 表的结构 `qb_shoptg_pic`
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
# 导出表中的数据 `qb_shoptg_pic`
#

INSERT INTO `qb_shoptg_pic` VALUES (1, 10, 1, 0, 1, 0, 'qb_shoptg_/1/1_20101227211204_mwrvk.jpg', '');
INSERT INTO `qb_shoptg_pic` VALUES (2, 11, 1, 0, 1, 0, 'qb_shoptg_/1/1_20101227211213_likqz.jpg', '');
INSERT INTO `qb_shoptg_pic` VALUES (3, 12, 1, 0, 1, 0, 'qb_shoptg_/1/1_20101227211251_qeki2.jpg', '');

# --------------------------------------------------------

#
# 表的结构 `qb_shoptg_report`
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
# 导出表中的数据 `qb_shoptg_report`
#


# --------------------------------------------------------

#
# 表的结构 `qb_shoptg_sort`
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
# 导出表中的数据 `qb_shoptg_sort`
#

INSERT INTO `qb_shoptg_sort` VALUES (1, 0, '饮食类', 1, 1, 0, 0, '', 0, 0, '', '', '', '', 'a:4:{s:4:"head";s:0:"";s:4:"foot";s:0:"";s:4:"list";s:0:"";s:8:"bencandy";s:0:"";}', '', 0, '', '', '', 0, '', '', '', '', 0, 'a:2:{s:7:"is_html";N;s:11:"field_value";N;}', 0, 0, '', 'diannao', 0);
INSERT INTO `qb_shoptg_sort` VALUES (2, 0, '休闲类', 1, 1, 0, 0, '', 0, 0, '', '', '', '', 'a:4:{s:4:"head";s:0:"";s:4:"foot";s:0:"";s:4:"list";s:0:"";s:8:"bencandy";s:0:"";}', '', 0, '', '', '', 0, '', '', '', '', 0, 'a:2:{s:7:"is_html";N;s:11:"field_value";N;}', 0, 0, '', 'shouji', 0);
INSERT INTO `qb_shoptg_sort` VALUES (3, 0, '实物类', 1, 1, 0, 0, '', 0, 0, '', '', '', '', 'a:4:{s:4:"head";s:0:"";s:4:"foot";s:0:"";s:4:"list";s:0:"";s:8:"bencandy";s:0:"";}', '', 0, '', '', '', 0, '', '', '', '', 0, 'a:2:{s:7:"is_html";N;s:11:"field_value";N;}', 0, 0, '', 'xiangji', 0);

ALTER TABLE `qb_shoptg_content` ADD `gg_maps` VARCHAR( 50 ) NOT NULL AFTER `pay_num` ;
