INSERT INTO `qb_module` (`id`, `type`, `name`, `pre`, `dirname`, `domain`, `admindir`, `config`, `list`, `admingroup`, `adminmember`, `ifclose`) VALUES (26, 2, '礼品兑换', 'gift_', 'gift', '', '', 'a:7:{s:12:"list_PhpName";s:18:"list.php?&fid=$fid";s:12:"show_PhpName";s:29:"bencandy.php?&fid=$fid&id=$id";s:8:"MakeHtml";N;s:14:"list_HtmlName1";N;s:14:"show_HtmlName1";N;s:14:"list_HtmlName2";N;s:14:"show_HtmlName2";N;}', 75, '', '', 0);


INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'gift_left1', 'Info_gift_', 1, 'a:27:{s:13:"tplpart_1code";s:455:"<div class="lista"> <a href="$url" class="img" target="_blank"><img src="$picurl" onError="this.src=\'$webdb[www_url]/images/default/nopic.jpg\'" width="75" height="75" border="0"></a> \r\n            <a href="$url" class="title" target="_blank">$title</a> \r\n            <span class="price">原价{$mart_price}元</span> <span class="zf">需{$money}{$webdb[MoneyName]}</span> \r\n            <a href="$url" class="goto" target="_blank">去看看</a> \r\n          </div>";s:13:"tplpart_2code";s:0:"";s:3:"SYS";s:2:"wn";s:6:"wninfo";s:5:"gift_";s:5:"width";s:3:"250";s:6:"height";s:3:"187";s:8:"rolltype";s:10:"scrollLeft";s:8:"rolltime";s:1:"3";s:11:"roll_height";s:2:"50";s:11:"content_num";s:2:"80";s:7:"newhour";s:2:"24";s:7:"hothits";s:2:"30";s:7:"tplpath";s:0:"";s:6:"DivTpl";i:1;s:5:"fiddb";N;s:8:"moduleid";s:0:"";s:5:"stype";s:1:"p";s:2:"yz";s:3:"all";s:10:"timeformat";s:11:"Y-m-d H:i:s";s:5:"order";s:4:"list";s:3:"asc";s:4:"DESC";s:6:"levels";s:3:"all";s:7:"rowspan";s:1:"3";s:3:"sql";s:67:"SELECT * FROM qb_gift_content  WHERE 1  ORDER BY list DESC LIMIT 3 ";s:7:"colspan";s:1:"1";s:8:"titlenum";s:2:"20";s:10:"titleflood";s:1:"0";}', 'a:3:{s:5:"div_w";s:2:"50";s:5:"div_h";s:2:"30";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 0, 0, 26, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'gift_news', 'code', 0, ' <div class="l1"><a >免费注册一个帐号</a></div>\r\n                <div class="l2"><a >努力通过各种方式赚积分</a></div>\r\n                <div class="l3"><a >挑选礼品,申请兑换</a></div>\r\n                <div class="l4"><a >等待审核,发放礼品</a></div>', 'a:4:{s:9:"html_edit";N;s:5:"div_w";s:3:"225";s:5:"div_h";s:3:"111";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1292047567, 0, 26, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'gift_pic1', 'Info_gift_', 1, 'a:27:{s:13:"tplpart_1code";s:507:"<div class="listpic">\r\n                	<a href="$url" target="_blank" class="img"><img src="$picurl" onerror="this.src=\'$webdb[www_url]/images/default/nopic.jpg\'" width="120" height="120"></a>\r\n                    <a href="$url" target="_blank" class="title">$title</a>\r\n                    <div><span>￥{$mart_price}</span><em>$money</em>积分兑换</div>\r\n                    <a href="$url" target="_blank" class="butter"><img src="$webdb[www_url]/images/yellow/gift_butter.gif"></a>\r\n                </div>";s:13:"tplpart_2code";s:0:"";s:3:"SYS";s:2:"wn";s:6:"wninfo";s:5:"gift_";s:5:"width";s:3:"250";s:6:"height";s:3:"187";s:8:"rolltype";s:10:"scrollLeft";s:8:"rolltime";s:1:"3";s:11:"roll_height";s:2:"50";s:11:"content_num";s:2:"80";s:7:"newhour";s:2:"24";s:7:"hothits";s:2:"30";s:7:"tplpath";s:0:"";s:6:"DivTpl";i:1;s:5:"fiddb";N;s:8:"moduleid";N;s:5:"stype";s:1:"p";s:2:"yz";s:3:"all";s:10:"timeformat";s:11:"Y-m-d H:i:s";s:5:"order";s:4:"list";s:3:"asc";s:4:"DESC";s:6:"levels";s:3:"all";s:7:"rowspan";s:2:"15";s:3:"sql";s:68:"SELECT * FROM qb_gift_content  WHERE 1  ORDER BY list DESC LIMIT 15 ";s:7:"colspan";s:1:"1";s:8:"titlenum";s:2:"20";s:10:"titleflood";s:1:"0";}', 'a:3:{s:5:"div_w";s:2:"50";s:5:"div_h";s:2:"30";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 0, 0, 26, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'gift_rollpic', 'rollpic', 0, 'a:6:{s:8:"rolltype";s:1:"0";s:5:"width";s:3:"730";s:6:"height";s:3:"220";s:6:"picurl";a:2:{i:1;s:32:"label/1_20101025121017_53fhc.jpg";i:2;s:32:"label/1_20101025121026_yiimn.jpg";}s:7:"piclink";a:2:{i:1;s:1:"#";i:2;s:1:"#";}s:6:"picalt";a:2:{i:1;s:0:"";i:2;s:0:"";}}', 'a:3:{s:5:"div_w";s:0:"";s:5:"div_h";s:0:"";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 0, 0, 26, 0, 0, 'default');


# --------------------------------------------------------

#
# 表的结构 `qb_gift_config`
#

DROP TABLE IF EXISTS `qb_gift_config`;
CREATE TABLE `qb_gift_config` (
  `c_key` varchar(50) NOT NULL default '',
  `c_value` text NOT NULL,
  `c_descrip` text NOT NULL,
  PRIMARY KEY  (`c_key`)
) TYPE=MyISAM;

#
# 导出表中的数据 `qb_gift_config`
#

INSERT INTO `qb_gift_config` VALUES ('Info_webname', '礼品兑换', '');
INSERT INTO `qb_gift_config` VALUES ('Info_webOpen', '1', '');
INSERT INTO `qb_gift_config` VALUES ('module_close', '0', '');
INSERT INTO `qb_gift_config` VALUES ('module_pre', 'gift_', '');
INSERT INTO `qb_gift_config` VALUES ('module_id', '26', '');

# --------------------------------------------------------

#
# 表的结构 `qb_gift_content`
#

DROP TABLE IF EXISTS `qb_gift_content`;
CREATE TABLE `qb_gift_content` (
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
  `totaluser` mediumint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `fid` (`fid`),
  KEY `ispic` (`ispic`),
  KEY `list` (`list`,`fid`,`yz`),
  KEY `hits` (`hits`)
) TYPE=MyISAM AUTO_INCREMENT=41 ;

#
# 导出表中的数据 `qb_gift_content`
#

INSERT INTO `qb_gift_content` VALUES (21, '诺基亚 N86 8MP', 1, 1, '家居用品', 17, 0, 1276250288, '1276250288', 1, 'admin', '', 'http://img01.taobaocdn.com/bao/uploaded/i5/T1CPXFXnFdXXX4x0bX_084541.jpg_310x310.jpg', 1, 1, 1, 1284360835, '', '127.0.0.1', 0, 4000, 0, 0, 1289961626, 0);
INSERT INTO `qb_gift_content` VALUES (22, '爱国者数码相框 DPF801D', 1, 1, '家居用品', 11, 0, 1276250366, '1276250366', 1, 'admin', '', 'http://img02.taobaocdn.com/bao/uploaded/i2/T1epVOXeRtXXck5mDa_092301.jpg_310x310.jpg', 1, 1, 1, 1284360835, '', '127.0.0.1', 0, 3000, 0, 0, 1292982025, 0);
INSERT INTO `qb_gift_content` VALUES (23, '金士頓 DataTraveler G2(4G)', 1, 1, '家居用品', 8, 0, 1276250386, '1276250386', 1, 'admin', '', 'http://img04.taobaocdn.com/bao/uploaded/i8/T1sQJyXd0wXXX6HXPX_113821.jpg_310x310.jpg', 1, 1, 1, 1277108878, '', '127.0.0.1', 0, 3000, 0, 0, 1288758851, 0);
INSERT INTO `qb_gift_content` VALUES (24, '尼康 D90(配18-105mm镜头)', 1, 1, '家居用品', 85, 0, 1276250401, '1276250401', 1, 'admin', '', 'http://img03.taobaocdn.com/bao/uploaded/i7/T1NaBpXm4aXXb1upjX.jpg_310x310.jpg', 1, 1, 1, 1277108877, '', '127.0.0.1', 0, 4000, 0, 0, 1288758755, 0);
INSERT INTO `qb_gift_content` VALUES (25, '索尼 VPCEA25EC', 1, 1, '家居用品', 18, 0, 1276250421, '1276250421', 1, 'admin', '', 'http://img01.taobaocdn.com/bao/uploaded/i5/T18f4IXjpKXXXXNp.U_013525.jpg_310x310.jpg', 1, 1, 1, 1277108877, '', '127.0.0.1', 0, 3000, 0, 0, 1288758659, 0);
INSERT INTO `qb_gift_content` VALUES (26, '苹果 iPhone 4(16GB)', 1, 1, '家居用品', 43, 0, 1276420607, '1276420607', 1, 'admin', '', 'http://img03.taobaocdn.com/bao/uploaded/i3/T1ycVNXeNwXXbBkzgW_023847.jpg_310x310.jpg', 1, 1, 1, 1277108876, '', '127.0.0.1', 0, 20000, 0, 0, 1288758542, 0);
INSERT INTO `qb_gift_content` VALUES (32, '洋基NY,弹力网,棒球帽 网帽面料全封春秋款', 1, 4, '服装配饰', 1, 0, 1288759310, '1288759310', 1, 'admin', '', 'http://img02.taobaocdn.com/bao/uploaded/i6/T1xfpCXnXdXXbyndEV_020212.jpg_310x310.jpg', 1, 1, 0, 0, '', '127.0.0.1', 0, 600, 0, 0, 1288759312, 0);
INSERT INTO `qb_gift_content` VALUES (33, '韩版手袋粉嫩公主名媛淑女仿羊皮皮通勤包手提单肩包 0216粉色', 1, 1, '家居用品', 3, 0, 1288759492, '1288759492', 1, 'admin', '', 'http://img02.taobaocdn.com/bao/uploaded/i2/T13ihAXcpbXXbahV.Z_030956.jpg_310x310.jpg', 1, 1, 0, 0, '', '127.0.0.1', 0, 600, 0, 0, 1290485475, 0);
INSERT INTO `qb_gift_content` VALUES (34, '威登保罗正品 男 2010新 男包 牛皮 单肩包 男士包 真皮包 包包', 1, 1, '家居用品', 1, 0, 1288759658, '1288759658', 1, 'admin', '', 'http://img03.taobaocdn.com/bao/uploaded/i3/T1vyBPXcBkXXcS.5.4_053414.jpg_310x310.jpg', 1, 1, 0, 0, '', '127.0.0.1', 0, 400, 0, 0, 1288759660, 0);
INSERT INTO `qb_gift_content` VALUES (35, '名好记 嗨e点海苔饼干 名好记海苔饼干 整箱9.5斤', 1, 2, '餐饮休闲', 2, 0, 1288759797, '1288759797', 1, 'admin', '', 'http://img04.taobaocdn.com/imgextra/i8/T1bQpFXhxyXXb.H8w._113255.jpg_310x310.jpg', 1, 1, 0, 0, '', '127.0.0.1', 0, 30, 0, 0, 1292920804, 0);
INSERT INTO `qb_gift_content` VALUES (36, '韩版秋冬新款三色全棉长袖蕾丝高领打底衫T恤', 1, 3, '文化体育', 1, 0, 1288759968, '1288759968', 1, 'admin', '', 'http://img02.taobaocdn.com/imgextra/i6/T1_eFFXoFxXXc.6lg3_051036.jpg_310x310.jpg', 1, 1, 0, 0, '', '127.0.0.1', 0, 600, 0, 0, 1288759970, 0);
INSERT INTO `qb_gift_content` VALUES (37, '蓝色激光标签CASIO卡西欧钢带男手表EF-316D-1A', 1, 3, '文化体育', 1, 0, 1288760072, '1288760072', 1, 'admin', '', 'http://img02.taobaocdn.com/imgextra/i6/T1EAXFXnpfXXc8DakZ_031305.jpg_310x310.jpg', 1, 1, 0, 0, '', '127.0.0.1', 0, 800, 0, 0, 1288760074, 0);
INSERT INTO `qb_gift_content` VALUES (38, '原装德国LAMY safari凌美 狩猎者系列钢笔10新款白色', 1, 3, '文化体育', 7, 0, 1288760178, '1288760178', 1, 'admin', '', 'http://img01.taobaocdn.com/bao/uploaded/i1/T1PEXJXodhXXa7s9gT_012730.jpg_310x310.jpg', 1, 1, 0, 0, '', '127.0.0.1', 0, 900, 0, 0, 1293506209, 0);
INSERT INTO `qb_gift_content` VALUES (39, '索尼CX150E 高清摄像机 内置16G内存/25X/420万像素 三年保', 1, 1, '家居用品', 1, 0, 1288760299, '1288760299', 1, 'admin', '', 'http://img04.taobaocdn.com/bao/uploaded/i4/T1ih8OXddCXXbIgFZY_025314.jpg_310x310.jpg', 1, 1, 0, 0, '', '127.0.0.1', 0, 9000, 0, 0, 1288760300, 0);
INSERT INTO `qb_gift_content` VALUES (40, '诺亚舟电子词典学习机NP360+全新现货配件齐全', 1, 3, '文化体育', 1, 0, 1288760477, '1288760477', 1, 'admin', '', 'http://img03.taobaocdn.com/bao/uploaded/i3/T1dnlEXfJXXXcXEXA._081139.jpg_310x310.jpg', 1, 1, 0, 0, '', '127.0.0.1', 0, 600, 0, 0, 1288760478, 0);

# --------------------------------------------------------

#
# 表的结构 `qb_gift_content_1`
#

DROP TABLE IF EXISTS `qb_gift_content_1`;
CREATE TABLE `qb_gift_content_1` (
  `rid` mediumint(7) NOT NULL auto_increment,
  `id` mediumint(7) NOT NULL default '0',
  `fid` mediumint(7) NOT NULL default '0',
  `uid` mediumint(7) NOT NULL default '0',
  `content` mediumtext NOT NULL,
  `mart_price` varchar(8) NOT NULL default '',
  `giftnum` int(5) NOT NULL default '0',
  PRIMARY KEY  (`rid`),
  KEY `fid` (`fid`),
  KEY `id` (`id`),
  KEY `uid` (`uid`)
) TYPE=MyISAM AUTO_INCREMENT=26 ;

#
# 导出表中的数据 `qb_gift_content_1`
#

INSERT INTO `qb_gift_content_1` VALUES (5, 21, 1, 1, '<em>上市时间：</em><em>2009年</em> <li>手机制式：</li>GSM,WCDMA <li>手机外形：</li>滑盖 <li>主屏尺寸：</li>2.6英寸 <li>主屏参数：</li>240×320像素(QVGA) <li>系统：</li>Symbian 9.3,Series 60第3版 <li>GPS定位系统：</li>支持GPS,支持A-GPS网络辅助导航功能,诺基亚地图 <li>摄像头像素：</li><p>800万像素</p>\r\n<p><font size="4"> </font></p>\r\n<div align="center"><font size="4"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img02.taobaocdn.com/imgextra/i2/272720344/T2VS0oXeJXXXXXXXXX_!!272720344.jpg" width="500" height="700" border="1" /></font></div>\r\n<p align="center"><font color="#339966" size="4"><strong></strong></font><p align="center"><font size="4"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img02.taobaocdn.com/imgextra/i2/272720344/T2_m0oXdBXXXXXXXXX_!!272720344.jpg" width="500" height="375" /></font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img01.taobaocdn.com/imgextra/i1/272720344/T2P94oXaFXXXXXXXXX_!!272720344.jpg" width="545" height="375" /></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img04.taobaocdn.com/imgextra/i4/272720344/T2tC4oXb4XXXXXXXXX_!!272720344.jpg" width="500" height="375" /></p>\r\n<div align="center"><strong><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img04.taobaocdn.com/imgextra/i4/272720344/T2xCFoXjFaXXXXXXXX_!!272720344.jpg" width="500" height="375" /></strong></div>\r\n<div align="center">&nbsp;</div>\r\n<div align="center"><strong><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img01.taobaocdn.com/imgextra/i1/272720344/T24S4oXX0XXXXXXXXX_!!272720344.jpg" width="500" height="375" /></strong></div>\r\n<div align="center">&nbsp;</div>\r\n<div align="center"><strong><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img01.taobaocdn.com/imgextra/i1/272720344/T2CStoXgdbXXXXXXXX_!!272720344.jpg" width="500" height="375" /></strong></div>\r\n<div align="center">&nbsp;</div>\r\n<div align="center"><strong><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img02.taobaocdn.com/imgextra/i2/272720344/T2mmBoXoBaXXXXXXXX_!!272720344.jpg" width="500" height="375" /></strong></div>\r\n<div align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img03.taobaocdn.com/imgextra/i3/272720344/T2R9toXfXbXXXXXXXX_!!272720344.jpg" width="500" height="375" /></div>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img02.taobaocdn.com/imgextra/i2/272720344/T25StoXeXbXXXXXXXX_!!272720344.jpg" width="499" height="333" /></p>\r\n</p>\r\n', '4000', 56);
INSERT INTO `qb_gift_content_1` VALUES (6, 22, 1, 1, '<p><font size="2">1.8英寸4:3数字液晶屏，分辨率800*600<br />\r\n2.最大支持3000万像素数码照片<br />\r\n3.多种图片切换播放效果<br />\r\n4.图片具有幻灯片自动播放功能，并可后台同时播放音乐<br />\r\n5.图片具有缩放/选装/显示比例设置/播放速度设定/屏幕亮度随意调节/功能<br />\r\n6.支持多任务功能，支持背景MP3播放<br />\r\n7.支持常规电影格式播放支持MJEG, MPEG2, AVI等影片播放<br />\r\n8.支持TXT电子书浏览功能，可设置自动滚屏速度，随意选择文字颜色，随时更换背景音乐<br />\r\n9.时钟，电子台历，闹钟功能<br />\r\n10.内置企业定制功能，轻松定制企业战士及广告内容，特别适合赠送亲朋好友，企业赠送<br />\r\n11.我的收藏功能，随时存放自己喜爱的图片<br />\r\n12.中英文人性化简单操作菜单<br />\r\n13.支持SD/MMC/SDHC等主流存储卡<br />\r\n14.U盘直插功能<br />\r\n15.内置高音质专用外放<br />\r\n16.支持WIN2000、WINXP 系统<br />\r\n17.高速USB2.0<br />\r\n18.支持固件升级<br />\r\n19.馈赠佳品，时尚新潮<br />\r\n馈赠亲友，企业送礼。大方实用，时尚新潮，不愧是为你量身定做的绝佳礼品。<br />\r\n20.商业展示，新颖独特<br />\r\n一改传统商业展示模式，全程动态商品展示，MP3背景音频播放，MP4视频演示。<br />\r\n生动新颖，全新的视觉冲击和感官体验，带来无限商机。<br />\r\n21.家居装饰，尊贵典雅<br />\r\n新颖独特的展示方式，丰富多彩的浏览模式，时尚家居不可缺少的典雅饰品<br />\r\n22.办公空间，休闲中心<br />\r\n工作之余浏览昔日远行点滴，欣赏优美动听的音乐，有效缓解工作压力。<br />\r\n23.分享快乐，展示成功<br />\r\n将数码相框放在书桌案头，与亲朋好友共同分享过往欢乐的时光。<br />\r\n长年奔波在外的儿女，向父母展示在外工作生活的情况，浪漫温馨亲情体验。</font></p>\r\n<div>&nbsp;</div>\r\n', '320', 32);
INSERT INTO `qb_gift_content_1` VALUES (7, 23, 1, 1, '<p>正品 金士顿 DataTraveler C10 4GB U盘</p>\r\n<p>新推出的 金士顿&reg; DataTraveler c10 闪存盘有四种缤纷的色彩可供选择，并采用全尺寸的帽盖设计，以保护 USB 插头。</p>\r\n<p>不论居家、办公或在学校中，全新的数据存储伙伴能让您走到哪里，用到哪里。这款新推出的闪存盘不仅价格实惠、性能卓越，容量更高可达32GB，让您可轻松地存储最爱的相片、音乐、文档等数据。依容量大小共提供四种不同色彩，让您轻松将数据带着走！</p>\r\n<p>DataTraveler c10拥有五年保固以及金士顿可靠的质量保证。</p>\r\n<p>金士顿 DataTraveler c10料号：<br />\r\n<br />\r\nDTC10/4GB, DTC10/8GB, DTC10/16GB, DTC10/32GB<br />\r\n<br />\r\n功能／规格： </p>\r\n<ul><li>容量*— 4GB、8GB、16GB、32GB </li><li>尺寸— 58.38mm×21.9mm×13.4mm </li><li>工作温度— 0°C～60°C </li><li>存储温度— -20°C～85°C </li><li>简单连接— 轻松插接至任何 USB 接口 </li><li>易于携带— 耐用的金属环设计，可栓挂在的钥匙圈上 </li><li>方便使用— 体积轻巧，容易携带 </li><li>质量保证— 五年保固 </li><li>时尚外型— 多种色彩选择： </li></ul>\r\n', '100', 32);
INSERT INTO `qb_gift_content_1` VALUES (8, 24, 1, 1, '<p align="center"><u><font color="#000000"></font></u><p align="left">　　从<font color="#000000">尼康D3</font>、<font color="#000000">D300</font>，到<font color="#000000">D70</font>0，再到现在的尼康D90，尼康每次推出的中高端<font color="#000000">数码单反</font>都给人耳目一新的感觉。虽然尼康D90还是维持与D3、D300、D700差不多的<font color="#000000">1200万像素</font>的水平，整体硬件性能比较类似简化版的D300，但是尼康D90的高清视频短片拍摄功能却相当让人喜出望外。正当我们看着<font color="#000000">佳能</font><font color="#000000">50D</font>的参数表而觉得没什么新意的时候，看到尼康D90能拍短片，确实觉得相当振奋，不免对尼康D90抱有不少希望。</p>\r\n<p align="left">　　但希望归希望，尼康D90的高清短片拍摄功能还是有不少弊端。1280*720p/24fps分辨率下单次拍摄最长限制5分钟，拍摄过程中不能自动调整白平衡，不能进行自动对焦，只有单声道录音，这些都是尼康D90在视频拍摄中还需要改进的地方。其中尤其以不能进行自动对焦这一点最为麻烦。试想一下使用变焦<font color="#000000">镜头</font>拍摄的时候，一边变焦同时一边对焦的情况是多么的手忙脚乱。当然，先变焦然后再对焦也是可以的，但是速度就成了另外一个问题。</p>\r\n<p align="left">　　如果希望尼康D90能有D300的画质水平，我觉得尼康D90还是值得去期待的。初步查看实拍<font color="#000000">样张</font>的画质，高ISO的质量确实不错，画面细节方面也达到一定的高水平。由于还没有合适的软件处理尼康D90的RAW文件，本次尼康D90评测所拍摄的样张，全部采用尼康D90机身内置的RAW处理功能转换成JPG格式。与机身直出的JPG文件相比，画面细节是有一定提升的，相信在电脑上转换RAW文件会有更好的表现，这在尼康D90深入评测中会继续研究。</p>\r\n<p align="left"><span><span><span><span> <p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_450x337/849/ceEE66WB83ZHA.jpg" width="500" height="375" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><br />\r\n尼康D90</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/850/ce2fNT2xfnvE.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/851/ce6dOvB4nDSbw.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><br />\r\n尼康D90</p>\r\n<p align="center"><br />\r\n<img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/857/cehO9WlC1hc2Q.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/858/ceXYPW59dIGZQ.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><br />\r\n尼康D90 相机右肩区域</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/859/ceMxoXsfYJeHo.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/860/ceOEzKCwVjyIA.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><br />\r\n尼康D90 模式拨轮与屈光度调节拨轮</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/862/ceNFbUVc4z6pM.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/861/ceshF7WvtVE6.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><br />\r\n尼康D90 机顶热靴</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/863/ceVlkyYHwmlLA.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/864/ceCP4HhvhL4DM.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /></p>\r\n</span></span></span></span></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_450x337/849/ceEE66WB83ZHA.jpg" width="500" height="375" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><br />\r\n尼康D90</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/850/ce2fNT2xfnvE.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/851/ce6dOvB4nDSbw.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><br />\r\n尼康D90</p>\r\n<p align="center"><br />\r\n<img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/857/cehO9WlC1hc2Q.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/858/ceXYPW59dIGZQ.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><br />\r\n尼康D90 相机右肩区域</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/859/ceMxoXsfYJeHo.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/860/ceOEzKCwVjyIA.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><br />\r\n尼康D90 模式拨轮与屈光度调节拨轮</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/862/ceNFbUVc4z6pM.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/861/ceshF7WvtVE6.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><br />\r\n尼康D90 机顶热靴</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/863/ceVlkyYHwmlLA.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/864/ceCP4HhvhL4DM.jpg" width="240" height="180" alt="支持高清视频 中端之选尼康D90全国首测（未完）" title="支持高清视频 中端之选尼康D90全国首测（未完）" /></p>\r\n</p>\r\n', '6700', 213);
INSERT INTO `qb_gift_content_1` VALUES (9, 25, 1, 1, '<em>上市时间：</em><a href="http://product.pconline.com.cn/notebook/c7707/" target="_blank"><em>2010年 6月</em></a> <li>处理器：</li>Intel Pentium P6000(1.86GHz) <li>内存容量：</li><a href="http://product.pconline.com.cn/so/s26143/" target="_blank">2GB</a> <li>硬盘容量：</li><a href="http://product.pconline.com.cn/so/s34146/" target="_blank">320GB</a> <li>屏幕尺寸：</li><a href="http://product.pconline.com.cn/notebook/c1116/" target="_blank">14英寸</a> <li>显卡芯片：</li><a href="http://product.pconline.com.cn/so/s47401/" target="_blank">ATI Mobility Radeon HD 5145</a> <li>重量：</li><p><a href="http://product.pconline.com.cn/notebook/c3336/" target="_blank">约2.35Kg</a></p>\r\n<p><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img.taobaocdn.com/imgextra/i7/196070357/T2AaXjXm0bXXXXXXXX_!!196070357.png" width="638" height="443" /></p>\r\n<p><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img.taobaocdn.com/imgextra/i8/196070357/T2zatjXdpaXXXXXXXX_!!196070357.png" width="630" height="437" /></p>\r\n<p><font color="#ff0000"><font size="4"><font color="#0000ff"><strong><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img.taobaocdn.com/imgextra/i4/196070357/T2np8jXcVcXXXXXXXX_!!196070357.png" width="636" height="450" /></strong></font></font></font></p>\r\n<p><font color="#ff0000"><font size="4"><font color="#0000ff"><strong><font color="#ff0000" style="background-color:#ffff00;"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img.taobaocdn.com/imgextra/i3/196070357/T22p0jXjRcXXXXXXXX_!!196070357.png" width="640" height="431" /></font></strong></font></font></font></p>\r\n', '7900', 123);
INSERT INTO `qb_gift_content_1` VALUES (10, 26, 1, 1, '<p align="center"><font size="3">iphone4高品质苹果专用品牌配件 保护你的爱机</font></p>\r\n<p align="center"><font size="3">（恒丰承诺我们只选优质的带盒装的正品品牌配件）</font></p>\r\n<h2 style="font-size:22px;"><font size="3">iphone4大陆行货2种版本16GB，32GB。欢迎各位订购 欢迎各位咨询购买。</font></h2><p align="center" style="font-size:22px;"><font size="3">现在购买iPhone4都是最新版本4.1，已经能越狱的，iPhone4新机是没有什么玩的软件，我们公司提供正版iPhone4专用软件，是花了3000美金购买的，给安装是要收费的，收取200元软件费用，可以包3年，也可以提供破解技术。（但是凡在本店购买任意一款iPhone4套餐，都可以免费安装价值1000美金的软件或者免费破解）<br />\r\n<br />\r\n此款手机使用的是迷你SIM卡，SIM需要使用剪卡器剪小之后才能插入手机。本店提供剪卡器（80元）,凡是购买套餐即赠送剪卡器<img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img02.taobaocdn.com/imgextra/i2/T1kAlJXgVIXXbzmloT_012618.jpg_310x310.jpg" width="192" height="175" style="width:192px;height:175px;" /><br />\r\n<br />\r\n现货出售，预购从速！<br />\r\n<br />\r\n<img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img04.taobaocdn.com/imgextra/i4/330770771/T2GXhqXetbXXXXXXXX_!!330770771.jpg" width="675" height="450" /><br />\r\n<br />\r\n<img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img03.taobaocdn.com/imgextra/i3/330770771/T2TppqXmtaXXXXXXXX_!!330770771.jpg" width="675" height="450" /><br />\r\n<br />\r\n官方标配：iphone4 32G + 数据线 + 充电器 + 耳机 +&nbsp;使用手册 + 取卡针（全新未开封大陆行货）<br />\r\n</font></p>\r\n', '3900', 886);
INSERT INTO `qb_gift_content_1` VALUES (11, 27, 1, 1, '2222222222', '222', 122);
INSERT INTO `qb_gift_content_1` VALUES (17, 32, 4, 1, '<p>高级弹力网专用布料，弹力网孔超级透气，帽子板正有型，帽子的尺码：56-59厘米，帽深12厘米 ，请您一定要确认好头围再行购买！具体帽围的测量方法请参考下图。</p>\r\n<p>水洗与弹力网的区别：</p>\r\n<p>水洗的意思是可以直接水洗，而不是干洗或其它的洗涤方法，因为手感好，戴着又舒服，所以这也是检验帽子的好坏标准之一，对于一般棉布布料手感硬的帽子，或型状很板正的，有的是不能水洗的，因为帽子的材料可能会有桃胶、SN胶等定型胶，一洗的话就会严重变形，甚至损坏！弹力网的手感略硬，帽样更有型，因为是弹力网眼布，所以透气性更好，最好不要水洗<br />\r\n</p>\r\n<p><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img03.taobaocdn.com/imgextra/i3/54917771/T2u1RhXcFdXXXXXXXX_!!54917771.jpg" width="700" height="525" /></p>\r\n', '20', 300);
INSERT INTO `qb_gift_content_1` VALUES (18, 33, 1, 1, '<p>&nbsp;</p>\r\n<p align="left">【品名】&nbsp;&nbsp;~韓風名媛優雅通勤款质感PU内有隔层多兜两用款女包</p>\r\n<div align="left">【颜色】 黑色、粉色、棕色、黄色、黄色</div>\r\n<div align="left">&nbsp;</div>\r\n<div align="left">【款式】&nbsp;&nbsp; 手提 /&nbsp;单肩&nbsp;</div>\r\n<div align="left">&nbsp;</div>\r\n<div align="left">【质地】&nbsp; PU</div>\r\n<p align="left">【重量】&nbsp; 0.75公斤</p>\r\n<p align="left">【结构】 包包主袋搭扣封口，包内有一隔层拉链袋，一小隔层拉链袋一贴壁拉链袋，一手机袋及一零钱袋，包后有一贴壁拉链袋，包包前部有两个兜盖吸扣袋，包包两侧各有一贴壁袋。</p>\r\n<p align="left">【规格】 包包从左到右上口宽为34厘米，从左到右底部宽36厘米，从上到下不含手提高28厘米，包包手提高19厘米，包底厚11.5厘米.</p>\r\n<p><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img04.taobaocdn.com/imgextra/i4/268869723/T23w0mXXNaXXXXXXXX_!!268869723.jpg" width="567" height="377" /><br />\r\n<img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img04.taobaocdn.com/imgextra/i4/268869723/T2KM8mXh8XXXXXXXXX_!!268869723.jpg" width="702" height="381" /><br />\r\n<img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img04.taobaocdn.com/imgextra/i4/268869723/T2xNdmXaxXXXXXXXXX_!!268869723.jpg" width="463" height="588" /></p>\r\n', '200', 300);
INSERT INTO `qb_gift_content_1` VALUES (19, 34, 1, 1, '<li>品牌: Videng Polo/威登保罗</li><li>货号: lrbest001</li><li>性别: 男</li><li>款式: 肩包</li><li>背包方式: 单肩斜挎</li><li>背包部位: 肩部</li><li>质地: 牛皮</li><li>皮质特征: 软面皮</li><li>肩带根数: 单根</li><li>提拎部件: 软把</li><li>箱包开袋方式: 拉链搭扣</li><li>内部结构: 夹层拉链袋&nbsp;证件袋...</li><li>外袋种类: 内贴袋</li><li>箱包流行元素: 车缝线</li><li>风格: 日韩风范</li><li>箱包外形: 竖款方形</li><li>箱包图案: 纯色无图案</li><li>颜色分类: 黑色加强版：23*27*......</li><li>有无夹层: 有</li><li>硬度: 软</li><li>有无拉杆: 无</li><li>可否折叠: 否</li><li>有无手腕带: 无</li><li>成色: 全新</li><li>价格区间: 101-500元<img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img04.taobaocdn.com/imgextra/i4/282272281/T2rhXrXexaXXXXXXXX_!!282272281.jpg" width="750" height="300" border="0" /></li>', '100', 200);
INSERT INTO `qb_gift_content_1` VALUES (20, 35, 2, 1, '<p>箱子上面有原厂的胶带纸封装。不会去拆箱也就谈不上缺斤少两了。这个饼干整箱打开后，最上面一层是装不满的。</p>\r\n<p><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img02.taobaocdn.com/imgextra/i6/387793574/T2fIFcXatXXXXXXXXX_!!387793574.jpg_310x310.jpg" width="219" height="220" border="0" /></p>\r\n', '8', 30);
INSERT INTO `qb_gift_content_1` VALUES (21, 36, 3, 1, '<li>货号: 6324<img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img01.taobaocdn.com/imgextra/i1/144668369/T2GmFnXhdaXXXXXXXX_!!144668369.jpg_310x310.jpg" width="310" height="207" border="0" /></li><li>袖长: 长袖</li><li>领子: 立领</li><li>图案: 纯色</li><li>风格: 韩版</li><li>质地: 纯棉</li><li>适合人群: 少女</li><li>颜色分类: 白色现货&nbsp;黑色现货...</li><li>尺码: 均码</li><li>季节: 夏季&nbsp;冬季&nbsp;秋季...</li><li>图片实拍: 平铺实拍...</li><li>细节图: 有细节图</li><li>价格: 0-30元 </li><p>&nbsp;</p>\r\n', '60', 90);
INSERT INTO `qb_gift_content_1` VALUES (22, 37, 3, 1, '<p align="left">目前本款所有正品均具有蓝色防伪标签，如果没有的话极有可能是仿品！请各位买家一定留意！！！</p>\r\n<p align="left"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img03.taobaocdn.com/imgextra/i3/96601411/T2WfJnXjBXXXXXXXXX_!!96601411.jpg" width="750" height="415" border="0" /></p>\r\n', '600', 800);
INSERT INTO `qb_gift_content_1` VALUES (23, 38, 3, 1, '<p>产品描述：<br />\r\n˙LAMY safari 10新款白色 钢笔<br />\r\n˙强化塑胶材质精緻笔身<br />\r\n˙镀黑铜圈笔夹<br />\r\n˙独特的人体工学叁角握环，书写顺畅流利。<br />\r\n˙产地：德国<br />\r\n</p>\r\n<p>&nbsp;</p>\r\n<span style="font-family:宋体;"><span style="color:black;font-size:13.5pt;font-family:幼圆;"><span style="color:black;font-size:13.5pt;font-family:幼圆;">◆ LAMY&nbsp; safari (狩猎系列)<br />\r\n˙充满年轻气息<br />\r\n˙ABS强化塑胶笔杆，笔身前端设计独特，配弹性铜线笔夹，让您书写流畅无比。此系列备有墨水笔、钢珠笔、原子笔及铅芯笔(笔头配有擦胶)。另备有蓝色、黄色、炭黑色及红色供选择。<br />\r\n˙1994年： LAMY safari狩猎系列 德国汉诺威iF设计大奖<br />\r\n˙2008年： LAMY safari狩猎系列 - 中國 IF 設計大獎</span><span style="color:black;font-size:13.5pt;font-family:幼圆;"><br />\r\n<p>&nbsp;</p>\r\n</span></span></span><p><span style="font-family:宋体;"><span style="color:black;font-size:13.5pt;font-family:幼圆;"></span></span><span style="font-family:宋体;"><span style="color:black;font-size:13.5pt;font-family:幼圆;"></span><p>&nbsp;</p>\r\n<p><span style="font-family:宋体;"><span style="color:black;font-size:13.5pt;font-family:幼圆;"></span></span><p><span style="font-family:宋体;"><span style="color:black;font-size:13.5pt;font-family:幼圆;">现在您只需158元就能买到和国内专柜售价380元一样的配置：</span></span></p>\r\n<p><span style="font-family:宋体;"><span style="color:black;font-size:13.5pt;font-family:幼圆;">(1支钢笔+1支T10墨胆+1个LAMY盒子)+ Z24上墨器 现在四件套仅需158元！</span></span></p>\r\n<p><span style="font-family:宋体;"><span style="color:black;font-size:13.5pt;font-family:幼圆;"></span></span><span style="font-family:宋体;"><span style="color:black;font-size:13.5pt;font-family:幼圆;"><p><span style="font-family:宋体;"><span style="color:black;font-size:13.5pt;font-family:幼圆;">详细请看评价中有无刮纸等评语^_^，相信大家不会为了几元钱买支刮纸的笔回去吧，如有需要，可免费调整各规格笔尖；</span></span></p>\r\n<p><span style="font-family:宋体;"><span style="color:black;font-size:13.5pt;font-family:幼圆;">现有规格：EF(特细:0.4mm),F(细:0.5mm),M(中：0.7mm),B(粗：0.9mm)，默认发EF；</span></span></p>\r\n<p><span style="font-family:宋体;"><span style="color:black;font-size:13.5pt;font-family:幼圆;"></span></span></p>\r\n</span><span style="font-family:宋体;"><span><p><span style="font-family:宋体;"><span style="color:black;font-size:13.5pt;font-family:幼圆;"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img04.taobaocdn.com/imgextra/i4/50642456/T2vp4mXetaXXXXXXXX_!!50642456.jpg_620x10000.jpg" width="592" height="674" /></span></span></p>\r\n</span></span></span>', '600', 80);
INSERT INTO `qb_gift_content_1` VALUES (24, 39, 1, 1, '时尚的机身加上还算合理的价格，再配上“索尼”的牌子，相信不少消费者都抵御不了这样的诱惑力，CX150E拥有多种机身颜色设计，可以满足不同消费者的购买需求，它内置16GB内存容量，同时支持外接存储卡。在存储方面也可以满足绝大部分一般消费者的拍摄需求。它拥有420万总像素“Exmor R”CMOS影像传感器，夜景方面表现超出同类产品表现。<p align="center" style="text-align:center;"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/44/250/ceyF5Qggg6ZY.jpg" width="500" height="375" border="0" /></p>\r\n<p><br />\r\n&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 索尼数码摄像机CX150E<br />\r\n　　除了强大的影像处理器以外，CX150E还具备25倍光学变焦镜头，虽然不是最长的变焦摄像机产品，但一般拍摄已经完全够用。此外，为了方便入门级消费者使用，CX150E还具备智能自动拍摄模式，保证对摄像不是很懂行的消费者可以拍摄出满意的画面。</p>\r\n<p align="center" style="text-align:center;"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/44/251/ceUcLEPzS0as.jpg" width="500" height="375" border="0" /></p>\r\n', '900', 500);
INSERT INTO `qb_gift_content_1` VALUES (25, 40, 3, 1, '<p>八大创新功能：<br />\r\n<br />\r\n<br />\r\n128M海量内存内存升级至128M。<br />\r\n<br />\r\n专业MP3发音单词、课文、课件实现全MP3音质发音，清晰、悦耳。收录北京外国语大学语音界权威屠蓓老师的原声录音，发音纯正，让你轻松练就一口标准流利的英语。<br />\r\n<br />\r\n实时课堂录音可同步录制老师讲课，有助课后复习；可录自己发音，有助练就标准英语。<br />\r\n<br />\r\n及时跟读对比原音即时收录，并可即时播放，矫正语音方便轻松<br />\r\n<br />\r\n专享78部词典全版收录《朗文双解活用词典》、《现代汉语·双语》、《新英汉词典》三大权威词典，内置小学、初中、高中、四级 、六级、考研、托福、雅思、GRE、GMAT十大分级词典，并有五大常备词典和三大精选词典，还可下载55本专业词典，名符其实的“词典大全”。<br />\r\n<br />\r\n游戏高效背单词提供小学、初中、高中的单词学习和自建生词库等功能，“单词连线”、“ 翻牌成对”、“太空堡垒”、“星球大战”、“一目十行”等五大创新互动的游戏记忆场景，是记单词的好帮手。<br />\r\n<br />\r\nRPG智能游戏支持强大RPG游戏《天龙传说》、坦克大战，动感游戏，益智娱乐。<br />\r\n<br />\r\n幽默动漫短片可下载播放幽默有趣的动漫短片，并支持动漫邮件Nmail，享受动漫DIY的无限乐趣。</p>\r\n<p>&nbsp;</p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img04.taobaocdn.com/imgextra/i4/52843514/T26fBhXdFXXXXXXXXX_!!52843514.jpg" width="675" height="473" /></font></p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img07.taobaocdn.com/imgextra/i7/52843514/T2dLdhXfxbXXXXXXXX_!!52843514.jpg" width="677" height="801" style="width:677px;height:801px;" /></font></p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img03.taobaocdn.com/imgextra/i3/52843514/T2U14hXcNcXXXXXXXX_!!52843514.jpg" width="643" height="586" /></font></p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img08.taobaocdn.com/imgextra/i8/52843514/T2Je4hXd0cXXXXXXXX_!!52843514.jpg" width="609" height="589" /></font></p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img02.taobaocdn.com/imgextra/i2/52843514/T2Iu4hXd8cXXXXXXXX_!!52843514.jpg" width="751" height="549" /></font></p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img05.taobaocdn.com/imgextra/i5/52843514/T2hfFhXcXXXXXXXXXX_!!52843514.jpg" width="770" height="340" /></font></p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img07.taobaocdn.com/imgextra/i7/52843514/T26fBhXdBXXXXXXXXX_!!52843514.jpg" width="672" height="611" /></font></p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img06.taobaocdn.com/imgextra/i6/52843514/T2Ve0hXjFcXXXXXXXX_!!52843514.jpg" width="547" height="614" /></font></p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img08.taobaocdn.com/imgextra/i8/52843514/T2Ou0hXkxcXXXXXXXX_!!52843514.jpg" width="774" height="358" /></font></p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img01.taobaocdn.com/imgextra/i1/52843514/T2WeJhXc8eXXXXXXXX_!!52843514.jpg" width="807" height="300" /></font></p>\r\n', '100', 200);

# --------------------------------------------------------

#
# 表的结构 `qb_gift_content_2`
#

DROP TABLE IF EXISTS `qb_gift_content_2`;
CREATE TABLE `qb_gift_content_2` (
  `rid` mediumint(7) NOT NULL auto_increment,
  `id` int(10) NOT NULL default '0',
  `fid` mediumint(7) NOT NULL default '0',
  `uid` mediumint(7) NOT NULL default '0',
  `content` mediumtext NOT NULL,
  `contact_name` varchar(20) NOT NULL default '',
  `contact_phone` varchar(20) NOT NULL default '',
  `contact_address` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`rid`),
  KEY `fid` (`fid`),
  KEY `id` (`id`),
  KEY `uid` (`uid`)
) TYPE=MyISAM AUTO_INCREMENT=6 ;

#
# 导出表中的数据 `qb_gift_content_2`
#

INSERT INTO `qb_gift_content_2` VALUES (4, 6, 1, 1, 'gfds', 'gfsd', 'gfds', 'gfsd');
INSERT INTO `qb_gift_content_2` VALUES (5, 7, 1, 9, 'ruytr', 'yutr', 'uytr', 'uyt');

# --------------------------------------------------------

#
# 表的结构 `qb_gift_field`
#

DROP TABLE IF EXISTS `qb_gift_field`;
CREATE TABLE `qb_gift_field` (
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
) TYPE=MyISAM AUTO_INCREMENT=150 ;

#
# 导出表中的数据 `qb_gift_field`
#

INSERT INTO `qb_gift_field` VALUES (86, 1, '礼品介绍', 'content', 'mediumtext', 0, 1, 'ieedit', 650, 250, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_gift_field` VALUES (142, 1, '库存量', 'giftnum', 'int', 5, 7, 'text', 5, 0, '', '', '个', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_gift_field` VALUES (78, 1, '市场价格', 'mart_price', 'varchar', 8, 9, 'text', 12, 0, '', '', '元', '', 0, 1, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_gift_field` VALUES (145, 2, '附注', 'content', 'mediumtext', 0, -1, 'textarea', 400, 50, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_gift_field` VALUES (147, 2, '联系人姓名', 'contact_name', 'varchar', 20, 10, 'text', 100, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_gift_field` VALUES (148, 2, '联系人电话', 'contact_phone', 'varchar', 20, 9, 'text', 100, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_gift_field` VALUES (149, 2, '收信地址', 'contact_address', 'varchar', 100, 8, 'text', 200, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');

# --------------------------------------------------------

#
# 表的结构 `qb_gift_join`
#

DROP TABLE IF EXISTS `qb_gift_join`;
CREATE TABLE `qb_gift_join` (
  `id` mediumint(7) NOT NULL auto_increment,
  `mid` smallint(4) NOT NULL default '0',
  `cid` mediumint(7) NOT NULL default '0',
  `fid` mediumint(7) NOT NULL default '0',
  `posttime` int(10) NOT NULL default '0',
  `uid` mediumint(7) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `yz` tinyint(1) NOT NULL default '0',
  `ip` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `mid` (`mid`),
  KEY `fid` (`fid`,`cid`),
  KEY `yz` (`yz`,`fid`,`mid`,`cid`)
) TYPE=MyISAM AUTO_INCREMENT=8 ;

#
# 导出表中的数据 `qb_gift_join`
#

INSERT INTO `qb_gift_join` VALUES (6, 2, 24, 1, 1276510964, 1, 'admin', 0, '127.0.0.1');
INSERT INTO `qb_gift_join` VALUES (7, 2, 24, 1, 1277376800, 9, '康佳', 1, '127.0.0.1');

# --------------------------------------------------------

#
# 表的结构 `qb_gift_module`
#

DROP TABLE IF EXISTS `qb_gift_module`;
CREATE TABLE `qb_gift_module` (
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
# 导出表中的数据 `qb_gift_module`
#

INSERT INTO `qb_gift_module` VALUES (1, 0, '礼品类', 10, '', 'a:1:{s:9:"moduleSet";N;}', '', 1, 0, 'a:4:{s:4:"list";s:0:"";s:4:"show";s:0:"";s:4:"post";s:0:"";s:6:"search";s:0:"";}');
INSERT INTO `qb_gift_module` VALUES (2, 0, '表单类', 0, '', 'a:1:{s:9:"moduleSet";N;}', '', 0, 0, 'a:4:{s:4:"list";s:12:"joinlist.htm";s:4:"show";s:12:"joinshow.htm";s:4:"post";s:8:"join.htm";s:6:"search";s:0:"";}');

# --------------------------------------------------------

#
# 表的结构 `qb_gift_sort`
#

DROP TABLE IF EXISTS `qb_gift_sort`;
CREATE TABLE `qb_gift_sort` (
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
) TYPE=MyISAM AUTO_INCREMENT=6 ;

#
# 导出表中的数据 `qb_gift_sort`
#

INSERT INTO `qb_gift_sort` VALUES (1, 0, '家居用品', 1, 2, 0, 0, '', 1, 0, '', '', '', '', 'N;', '', 0, '', '', '', 0, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_gift_sort` VALUES (2, 0, '餐饮休闲', 1, 2, 0, 0, '', 2, 0, '', '', '', '', 'a:4:{s:4:"head";s:0:"";s:4:"foot";s:0:"";s:4:"list";s:0:"";s:8:"bencandy";s:0:"";}', '', 0, '', '', '', 0, '', '', '', '', 0, 'a:1:{s:11:"field_value";N;}', 0, 0, '', 'canyinxiuxian', 0);
INSERT INTO `qb_gift_sort` VALUES (3, 0, '文化体育', 1, 2, 0, 0, '', 0, 0, '', '', '', '', 'a:4:{s:4:"head";s:0:"";s:4:"foot";s:0:"";s:4:"list";s:0:"";s:8:"bencandy";s:0:"";}', '', 0, '', '', '', 0, '', '', '', '', 0, 'a:1:{s:11:"field_value";N;}', 0, 0, '', 'wenhuatiyu', 0);
INSERT INTO `qb_gift_sort` VALUES (4, 0, '服装配饰', 1, 2, 0, 0, '', 0, 0, '', '', '', '', 'a:4:{s:4:"head";s:0:"";s:4:"foot";s:0:"";s:4:"list";s:0:"";s:8:"bencandy";s:0:"";}', '', 0, '', '', '', 0, '', '', '', '', 0, 'a:1:{s:11:"field_value";N;}', 0, 0, '', 'fuzhuangpeishi', 0);
INSERT INTO `qb_gift_sort` VALUES (5, 0, '数码影音', 1, 2, 0, 0, '', 0, 0, '', '', '', '', 'N;', '', 20, '', '', '', 0, '2', '', '', '', 0, '', 0, 0, '', '', 0);
