INSERT INTO `qb_module` (`id`, `type`, `name`, `pre`, `dirname`, `domain`, `admindir`, `config`, `list`, `admingroup`, `adminmember`, `ifclose`) VALUES (26, 2, '��Ʒ�һ�', 'gift_', 'gift', '', '', 'a:7:{s:12:"list_PhpName";s:18:"list.php?&fid=$fid";s:12:"show_PhpName";s:29:"bencandy.php?&fid=$fid&id=$id";s:8:"MakeHtml";N;s:14:"list_HtmlName1";N;s:14:"show_HtmlName1";N;s:14:"list_HtmlName2";N;s:14:"show_HtmlName2";N;}', 75, '', '', 0);


INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'gift_left1', 'Info_gift_', 1, 'a:27:{s:13:"tplpart_1code";s:455:"<div class="lista"> <a href="$url" class="img" target="_blank"><img src="$picurl" onError="this.src=\'$webdb[www_url]/images/default/nopic.jpg\'" width="75" height="75" border="0"></a> \r\n            <a href="$url" class="title" target="_blank">$title</a> \r\n            <span class="price">ԭ��{$mart_price}Ԫ</span> <span class="zf">��{$money}{$webdb[MoneyName]}</span> \r\n            <a href="$url" class="goto" target="_blank">ȥ����</a> \r\n          </div>";s:13:"tplpart_2code";s:0:"";s:3:"SYS";s:2:"wn";s:6:"wninfo";s:5:"gift_";s:5:"width";s:3:"250";s:6:"height";s:3:"187";s:8:"rolltype";s:10:"scrollLeft";s:8:"rolltime";s:1:"3";s:11:"roll_height";s:2:"50";s:11:"content_num";s:2:"80";s:7:"newhour";s:2:"24";s:7:"hothits";s:2:"30";s:7:"tplpath";s:0:"";s:6:"DivTpl";i:1;s:5:"fiddb";N;s:8:"moduleid";s:0:"";s:5:"stype";s:1:"p";s:2:"yz";s:3:"all";s:10:"timeformat";s:11:"Y-m-d H:i:s";s:5:"order";s:4:"list";s:3:"asc";s:4:"DESC";s:6:"levels";s:3:"all";s:7:"rowspan";s:1:"3";s:3:"sql";s:67:"SELECT * FROM qb_gift_content  WHERE 1  ORDER BY list DESC LIMIT 3 ";s:7:"colspan";s:1:"1";s:8:"titlenum";s:2:"20";s:10:"titleflood";s:1:"0";}', 'a:3:{s:5:"div_w";s:2:"50";s:5:"div_h";s:2:"30";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 0, 0, 26, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'gift_news', 'code', 0, ' <div class="l1"><a >���ע��һ���ʺ�</a></div>\r\n                <div class="l2"><a >Ŭ��ͨ�����ַ�ʽ׬����</a></div>\r\n                <div class="l3"><a >��ѡ��Ʒ,����һ�</a></div>\r\n                <div class="l4"><a >�ȴ����,������Ʒ</a></div>', 'a:4:{s:9:"html_edit";N;s:5:"div_w";s:3:"225";s:5:"div_h";s:3:"111";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1292047567, 0, 26, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'gift_pic1', 'Info_gift_', 1, 'a:27:{s:13:"tplpart_1code";s:507:"<div class="listpic">\r\n                	<a href="$url" target="_blank" class="img"><img src="$picurl" onerror="this.src=\'$webdb[www_url]/images/default/nopic.jpg\'" width="120" height="120"></a>\r\n                    <a href="$url" target="_blank" class="title">$title</a>\r\n                    <div><span>��{$mart_price}</span><em>$money</em>���ֶһ�</div>\r\n                    <a href="$url" target="_blank" class="butter"><img src="$webdb[www_url]/images/yellow/gift_butter.gif"></a>\r\n                </div>";s:13:"tplpart_2code";s:0:"";s:3:"SYS";s:2:"wn";s:6:"wninfo";s:5:"gift_";s:5:"width";s:3:"250";s:6:"height";s:3:"187";s:8:"rolltype";s:10:"scrollLeft";s:8:"rolltime";s:1:"3";s:11:"roll_height";s:2:"50";s:11:"content_num";s:2:"80";s:7:"newhour";s:2:"24";s:7:"hothits";s:2:"30";s:7:"tplpath";s:0:"";s:6:"DivTpl";i:1;s:5:"fiddb";N;s:8:"moduleid";N;s:5:"stype";s:1:"p";s:2:"yz";s:3:"all";s:10:"timeformat";s:11:"Y-m-d H:i:s";s:5:"order";s:4:"list";s:3:"asc";s:4:"DESC";s:6:"levels";s:3:"all";s:7:"rowspan";s:2:"15";s:3:"sql";s:68:"SELECT * FROM qb_gift_content  WHERE 1  ORDER BY list DESC LIMIT 15 ";s:7:"colspan";s:1:"1";s:8:"titlenum";s:2:"20";s:10:"titleflood";s:1:"0";}', 'a:3:{s:5:"div_w";s:2:"50";s:5:"div_h";s:2:"30";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 0, 0, 26, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'gift_rollpic', 'rollpic', 0, 'a:6:{s:8:"rolltype";s:1:"0";s:5:"width";s:3:"730";s:6:"height";s:3:"220";s:6:"picurl";a:2:{i:1;s:32:"label/1_20101025121017_53fhc.jpg";i:2;s:32:"label/1_20101025121026_yiimn.jpg";}s:7:"piclink";a:2:{i:1;s:1:"#";i:2;s:1:"#";}s:6:"picalt";a:2:{i:1;s:0:"";i:2;s:0:"";}}', 'a:3:{s:5:"div_w";s:0:"";s:5:"div_h";s:0:"";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 0, 0, 26, 0, 0, 'default');


# --------------------------------------------------------

#
# ��Ľṹ `qb_gift_config`
#

DROP TABLE IF EXISTS `qb_gift_config`;
CREATE TABLE `qb_gift_config` (
  `c_key` varchar(50) NOT NULL default '',
  `c_value` text NOT NULL,
  `c_descrip` text NOT NULL,
  PRIMARY KEY  (`c_key`)
) TYPE=MyISAM;

#
# �������е����� `qb_gift_config`
#

INSERT INTO `qb_gift_config` VALUES ('Info_webname', '��Ʒ�һ�', '');
INSERT INTO `qb_gift_config` VALUES ('Info_webOpen', '1', '');
INSERT INTO `qb_gift_config` VALUES ('module_close', '0', '');
INSERT INTO `qb_gift_config` VALUES ('module_pre', 'gift_', '');
INSERT INTO `qb_gift_config` VALUES ('module_id', '26', '');

# --------------------------------------------------------

#
# ��Ľṹ `qb_gift_content`
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
# �������е����� `qb_gift_content`
#

INSERT INTO `qb_gift_content` VALUES (21, 'ŵ���� N86 8MP', 1, 1, '�Ҿ���Ʒ', 17, 0, 1276250288, '1276250288', 1, 'admin', '', 'http://img01.taobaocdn.com/bao/uploaded/i5/T1CPXFXnFdXXX4x0bX_084541.jpg_310x310.jpg', 1, 1, 1, 1284360835, '', '127.0.0.1', 0, 4000, 0, 0, 1289961626, 0);
INSERT INTO `qb_gift_content` VALUES (22, '������������� DPF801D', 1, 1, '�Ҿ���Ʒ', 11, 0, 1276250366, '1276250366', 1, 'admin', '', 'http://img02.taobaocdn.com/bao/uploaded/i2/T1epVOXeRtXXck5mDa_092301.jpg_310x310.jpg', 1, 1, 1, 1284360835, '', '127.0.0.1', 0, 3000, 0, 0, 1292982025, 0);
INSERT INTO `qb_gift_content` VALUES (23, '��ʿ�D DataTraveler G2(4G)', 1, 1, '�Ҿ���Ʒ', 8, 0, 1276250386, '1276250386', 1, 'admin', '', 'http://img04.taobaocdn.com/bao/uploaded/i8/T1sQJyXd0wXXX6HXPX_113821.jpg_310x310.jpg', 1, 1, 1, 1277108878, '', '127.0.0.1', 0, 3000, 0, 0, 1288758851, 0);
INSERT INTO `qb_gift_content` VALUES (24, '�῵ D90(��18-105mm��ͷ)', 1, 1, '�Ҿ���Ʒ', 85, 0, 1276250401, '1276250401', 1, 'admin', '', 'http://img03.taobaocdn.com/bao/uploaded/i7/T1NaBpXm4aXXb1upjX.jpg_310x310.jpg', 1, 1, 1, 1277108877, '', '127.0.0.1', 0, 4000, 0, 0, 1288758755, 0);
INSERT INTO `qb_gift_content` VALUES (25, '���� VPCEA25EC', 1, 1, '�Ҿ���Ʒ', 18, 0, 1276250421, '1276250421', 1, 'admin', '', 'http://img01.taobaocdn.com/bao/uploaded/i5/T18f4IXjpKXXXXNp.U_013525.jpg_310x310.jpg', 1, 1, 1, 1277108877, '', '127.0.0.1', 0, 3000, 0, 0, 1288758659, 0);
INSERT INTO `qb_gift_content` VALUES (26, 'ƻ�� iPhone 4(16GB)', 1, 1, '�Ҿ���Ʒ', 43, 0, 1276420607, '1276420607', 1, 'admin', '', 'http://img03.taobaocdn.com/bao/uploaded/i3/T1ycVNXeNwXXbBkzgW_023847.jpg_310x310.jpg', 1, 1, 1, 1277108876, '', '127.0.0.1', 0, 20000, 0, 0, 1288758542, 0);
INSERT INTO `qb_gift_content` VALUES (32, '���NY,������,����ñ ��ñ����ȫ�ⴺ���', 1, 4, '��װ����', 1, 0, 1288759310, '1288759310', 1, 'admin', '', 'http://img02.taobaocdn.com/bao/uploaded/i6/T1xfpCXnXdXXbyndEV_020212.jpg_310x310.jpg', 1, 1, 0, 0, '', '127.0.0.1', 0, 600, 0, 0, 1288759312, 0);
INSERT INTO `qb_gift_content` VALUES (33, '�����ִ����۹���������Ů����ƤƤͨ�ڰ����ᵥ��� 0216��ɫ', 1, 1, '�Ҿ���Ʒ', 3, 0, 1288759492, '1288759492', 1, 'admin', '', 'http://img02.taobaocdn.com/bao/uploaded/i2/T13ihAXcpbXXbahV.Z_030956.jpg_310x310.jpg', 1, 1, 0, 0, '', '127.0.0.1', 0, 600, 0, 0, 1290485475, 0);
INSERT INTO `qb_gift_content` VALUES (34, '���Ǳ�����Ʒ �� 2010�� �а� ţƤ ����� ��ʿ�� ��Ƥ�� ����', 1, 1, '�Ҿ���Ʒ', 1, 0, 1288759658, '1288759658', 1, 'admin', '', 'http://img03.taobaocdn.com/bao/uploaded/i3/T1vyBPXcBkXXcS.5.4_053414.jpg_310x310.jpg', 1, 1, 0, 0, '', '127.0.0.1', 0, 400, 0, 0, 1288759660, 0);
INSERT INTO `qb_gift_content` VALUES (35, '���ü� ��e�㺣̦���� ���üǺ�̦���� ����9.5��', 1, 2, '��������', 2, 0, 1288759797, '1288759797', 1, 'admin', '', 'http://img04.taobaocdn.com/imgextra/i8/T1bQpFXhxyXXb.H8w._113255.jpg_310x310.jpg', 1, 1, 0, 0, '', '127.0.0.1', 0, 30, 0, 0, 1292920804, 0);
INSERT INTO `qb_gift_content` VALUES (36, '�����ﶬ�¿���ɫȫ�޳�����˿��������T��', 1, 3, '�Ļ�����', 1, 0, 1288759968, '1288759968', 1, 'admin', '', 'http://img02.taobaocdn.com/imgextra/i6/T1_eFFXoFxXXc.6lg3_051036.jpg_310x310.jpg', 1, 1, 0, 0, '', '127.0.0.1', 0, 600, 0, 0, 1288759970, 0);
INSERT INTO `qb_gift_content` VALUES (37, '��ɫ�����ǩCASIO����ŷ�ִ����ֱ�EF-316D-1A', 1, 3, '�Ļ�����', 1, 0, 1288760072, '1288760072', 1, 'admin', '', 'http://img02.taobaocdn.com/imgextra/i6/T1EAXFXnpfXXc8DakZ_031305.jpg_310x310.jpg', 1, 1, 0, 0, '', '127.0.0.1', 0, 800, 0, 0, 1288760074, 0);
INSERT INTO `qb_gift_content` VALUES (38, 'ԭװ�¹�LAMY safari���� ������ϵ�иֱ�10�¿��ɫ', 1, 3, '�Ļ�����', 7, 0, 1288760178, '1288760178', 1, 'admin', '', 'http://img01.taobaocdn.com/bao/uploaded/i1/T1PEXJXodhXXa7s9gT_012730.jpg_310x310.jpg', 1, 1, 0, 0, '', '127.0.0.1', 0, 900, 0, 0, 1293506209, 0);
INSERT INTO `qb_gift_content` VALUES (39, '����CX150E ��������� ����16G�ڴ�/25X/420������ ���걣', 1, 1, '�Ҿ���Ʒ', 1, 0, 1288760299, '1288760299', 1, 'admin', '', 'http://img04.taobaocdn.com/bao/uploaded/i4/T1ih8OXddCXXbIgFZY_025314.jpg_310x310.jpg', 1, 1, 0, 0, '', '127.0.0.1', 0, 9000, 0, 0, 1288760300, 0);
INSERT INTO `qb_gift_content` VALUES (40, 'ŵ���۵��Ӵʵ�ѧϰ��NP360+ȫ���ֻ������ȫ', 1, 3, '�Ļ�����', 1, 0, 1288760477, '1288760477', 1, 'admin', '', 'http://img03.taobaocdn.com/bao/uploaded/i3/T1dnlEXfJXXXcXEXA._081139.jpg_310x310.jpg', 1, 1, 0, 0, '', '127.0.0.1', 0, 600, 0, 0, 1288760478, 0);

# --------------------------------------------------------

#
# ��Ľṹ `qb_gift_content_1`
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
# �������е����� `qb_gift_content_1`
#

INSERT INTO `qb_gift_content_1` VALUES (5, 21, 1, 1, '<em>����ʱ�䣺</em><em>2009��</em> <li>�ֻ���ʽ��</li>GSM,WCDMA <li>�ֻ����Σ�</li>���� <li>�����ߴ磺</li>2.6Ӣ�� <li>����������</li>240��320����(QVGA) <li>ϵͳ��</li>Symbian 9.3,Series 60��3�� <li>GPS��λϵͳ��</li>֧��GPS,֧��A-GPS���縨����������,ŵ���ǵ�ͼ <li>����ͷ���أ�</li><p>800������</p>\r\n<p><font size="4"> </font></p>\r\n<div align="center"><font size="4"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img02.taobaocdn.com/imgextra/i2/272720344/T2VS0oXeJXXXXXXXXX_!!272720344.jpg" width="500" height="700" border="1" /></font></div>\r\n<p align="center"><font color="#339966" size="4"><strong></strong></font><p align="center"><font size="4"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img02.taobaocdn.com/imgextra/i2/272720344/T2_m0oXdBXXXXXXXXX_!!272720344.jpg" width="500" height="375" /></font></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img01.taobaocdn.com/imgextra/i1/272720344/T2P94oXaFXXXXXXXXX_!!272720344.jpg" width="545" height="375" /></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img04.taobaocdn.com/imgextra/i4/272720344/T2tC4oXb4XXXXXXXXX_!!272720344.jpg" width="500" height="375" /></p>\r\n<div align="center"><strong><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img04.taobaocdn.com/imgextra/i4/272720344/T2xCFoXjFaXXXXXXXX_!!272720344.jpg" width="500" height="375" /></strong></div>\r\n<div align="center">&nbsp;</div>\r\n<div align="center"><strong><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img01.taobaocdn.com/imgextra/i1/272720344/T24S4oXX0XXXXXXXXX_!!272720344.jpg" width="500" height="375" /></strong></div>\r\n<div align="center">&nbsp;</div>\r\n<div align="center"><strong><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img01.taobaocdn.com/imgextra/i1/272720344/T2CStoXgdbXXXXXXXX_!!272720344.jpg" width="500" height="375" /></strong></div>\r\n<div align="center">&nbsp;</div>\r\n<div align="center"><strong><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img02.taobaocdn.com/imgextra/i2/272720344/T2mmBoXoBaXXXXXXXX_!!272720344.jpg" width="500" height="375" /></strong></div>\r\n<div align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img03.taobaocdn.com/imgextra/i3/272720344/T2R9toXfXbXXXXXXXX_!!272720344.jpg" width="500" height="375" /></div>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img02.taobaocdn.com/imgextra/i2/272720344/T25StoXeXbXXXXXXXX_!!272720344.jpg" width="499" height="333" /></p>\r\n</p>\r\n', '4000', 56);
INSERT INTO `qb_gift_content_1` VALUES (6, 22, 1, 1, '<p><font size="2">1.8Ӣ��4:3����Һ�������ֱ���800*600<br />\r\n2.���֧��3000������������Ƭ<br />\r\n3.����ͼƬ�л�����Ч��<br />\r\n4.ͼƬ���лõ�Ƭ�Զ����Ź��ܣ����ɺ�̨ͬʱ��������<br />\r\n5.ͼƬ��������/ѡװ/��ʾ��������/�����ٶ��趨/��Ļ�����������/����<br />\r\n6.֧�ֶ������ܣ�֧�ֱ���MP3����<br />\r\n7.֧�ֳ����Ӱ��ʽ����֧��MJEG, MPEG2, AVI��ӰƬ����<br />\r\n8.֧��TXT������������ܣ��������Զ������ٶȣ�����ѡ��������ɫ����ʱ������������<br />\r\n9.ʱ�ӣ�����̨�������ӹ���<br />\r\n10.������ҵ���ƹ��ܣ����ɶ�����ҵսʿ��������ݣ��ر��ʺ�����������ѣ���ҵ����<br />\r\n11.�ҵ��ղع��ܣ���ʱ����Լ�ϲ����ͼƬ<br />\r\n12.��Ӣ�����Ի��򵥲����˵�<br />\r\n13.֧��SD/MMC/SDHC�������洢��<br />\r\n14.U��ֱ�幦��<br />\r\n15.���ø�����ר�����<br />\r\n16.֧��WIN2000��WINXP ϵͳ<br />\r\n17.����USB2.0<br />\r\n18.֧�ֹ̼�����<br />\r\n19.������Ʒ��ʱ���³�<br />\r\n�������ѣ���ҵ���񡣴�ʵ�ã�ʱ���³���������Ϊ���������ľ�����Ʒ��<br />\r\n20.��ҵչʾ����ӱ����<br />\r\nһ�Ĵ�ͳ��ҵչʾģʽ��ȫ�̶�̬��Ʒչʾ��MP3������Ƶ���ţ�MP4��Ƶ��ʾ��<br />\r\n������ӱ��ȫ�µ��Ӿ�����͸й����飬���������̻���<br />\r\n21.�Ҿ�װ�Σ�������<br />\r\n��ӱ���ص�չʾ��ʽ���ḻ��ʵ����ģʽ��ʱ�мҾӲ���ȱ�ٵĵ�����Ʒ<br />\r\n22.�칫�ռ䣬��������<br />\r\n����֮���������Զ�е�Σ������������������֣���Ч���⹤��ѹ����<br />\r\n23.������֣�չʾ�ɹ�<br />\r\n������������������ͷ����������ѹ�ͬ����������ֵ�ʱ�⡣<br />\r\n���걼������Ķ�Ů����ĸչʾ���⹤������������������ܰ�������顣</font></p>\r\n<div>&nbsp;</div>\r\n', '320', 32);
INSERT INTO `qb_gift_content_1` VALUES (7, 23, 1, 1, '<p>��Ʒ ��ʿ�� DataTraveler C10 4GB U��</p>\r\n<p>���Ƴ��� ��ʿ��&reg; DataTraveler c10 �������������ͷ׵�ɫ�ʿɹ�ѡ�񣬲�����ȫ�ߴ��ñ����ƣ��Ա��� USB ��ͷ��</p>\r\n<p>���۾Ӽҡ��칫����ѧУ�У�ȫ�µ����ݴ洢����������ߵ�����õ����������Ƴ��������̲����۸�ʵ�ݡ�����׿Խ���������߿ɴ�32GB�����������ɵش洢�����Ƭ�����֡��ĵ������ݡ���������С���ṩ���ֲ�ͬɫ�ʣ��������ɽ����ݴ����ߣ�</p>\r\n<p>DataTraveler c10ӵ�����걣���Լ���ʿ�ٿɿ���������֤��</p>\r\n<p>��ʿ�� DataTraveler c10�Ϻţ�<br />\r\n<br />\r\nDTC10/4GB, DTC10/8GB, DTC10/16GB, DTC10/32GB<br />\r\n<br />\r\n���ܣ���� </p>\r\n<ul><li>����*�� 4GB��8GB��16GB��32GB </li><li>�ߴ硪 58.38mm��21.9mm��13.4mm </li><li>�����¶ȡ� 0��C��60��C </li><li>�洢�¶ȡ� -20��C��85��C </li><li>�����ӡ� ���ɲ�����κ� USB �ӿ� </li><li>����Я���� ���õĽ�������ƣ���˨���ڵ�Կ��Ȧ�� </li><li>����ʹ�á� ������ɣ�����Я�� </li><li>������֤�� ���걣�� </li><li>ʱ�����͡� ����ɫ��ѡ�� </li></ul>\r\n', '100', 32);
INSERT INTO `qb_gift_content_1` VALUES (8, 24, 1, 1, '<p align="center"><u><font color="#000000"></font></u><p align="left">������<font color="#000000">�῵D3</font>��<font color="#000000">D300</font>����<font color="#000000">D70</font>0���ٵ����ڵ��῵D90���῵ÿ���Ƴ����и߶�<font color="#000000">���뵥��</font>�����˶�Ŀһ�µĸо�����Ȼ�῵D90����ά����D3��D300��D700����<font color="#000000">1200������</font>��ˮƽ������Ӳ�����ܱȽ����Ƽ򻯰��D300�������῵D90�ĸ�����Ƶ��Ƭ���㹦��ȴ�൱����ϲ�����⡣�������ǿ���<font color="#000000">����</font><font color="#000000">50D</font>�Ĳ����������ûʲô�����ʱ�򣬿����῵D90���Ķ�Ƭ��ȷʵ�����൱��ܣ�������῵D90���в���ϣ����</p>\r\n<p align="left">������ϣ����ϣ�����῵D90�ĸ����Ƭ���㹦�ܻ����в��ٱ׶ˡ�1280*720p/24fps�ֱ����µ������������5���ӣ���������в����Զ�������ƽ�⣬���ܽ����Զ��Խ���ֻ�е�����¼������Щ�����῵D90����Ƶ�����л���Ҫ�Ľ��ĵط������������Բ��ܽ����Զ��Խ���һ����Ϊ�鷳������һ��ʹ�ñ佹<font color="#000000">��ͷ</font>�����ʱ��һ�߱佹ͬʱһ�߶Խ�������Ƕ�ô����æ���ҡ���Ȼ���ȱ佹Ȼ���ٶԽ�Ҳ�ǿ��Եģ������ٶȾͳ�������һ�����⡣</p>\r\n<p align="left">�������ϣ���῵D90����D300�Ļ���ˮƽ���Ҿ����῵D90����ֵ��ȥ�ڴ��ġ������鿴ʵ��<font color="#000000">����</font>�Ļ��ʣ���ISO������ȷʵ��������ϸ�ڷ���Ҳ�ﵽһ���ĸ�ˮƽ�����ڻ�û�к��ʵ���������῵D90��RAW�ļ��������῵D90��������������ţ�ȫ�������῵D90�������õ�RAW������ת����JPG��ʽ�������ֱ����JPG�ļ���ȣ�����ϸ������һ�������ģ������ڵ�����ת��RAW�ļ����и��õı��֣������῵D90���������л�����о���</p>\r\n<p align="left"><span><span><span><span> <p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_450x337/849/ceEE66WB83ZHA.jpg" width="500" height="375" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><br />\r\n�῵D90</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/850/ce2fNT2xfnvE.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/851/ce6dOvB4nDSbw.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><br />\r\n�῵D90</p>\r\n<p align="center"><br />\r\n<img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/857/cehO9WlC1hc2Q.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/858/ceXYPW59dIGZQ.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><br />\r\n�῵D90 ����Ҽ�����</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/859/ceMxoXsfYJeHo.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/860/ceOEzKCwVjyIA.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><br />\r\n�῵D90 ģʽ����������ȵ��ڲ���</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/862/ceNFbUVc4z6pM.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/861/ceshF7WvtVE6.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><br />\r\n�῵D90 ������ѥ</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/863/ceVlkyYHwmlLA.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/864/ceCP4HhvhL4DM.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /></p>\r\n</span></span></span></span></p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_450x337/849/ceEE66WB83ZHA.jpg" width="500" height="375" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><br />\r\n�῵D90</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/850/ce2fNT2xfnvE.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/851/ce6dOvB4nDSbw.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><br />\r\n�῵D90</p>\r\n<p align="center"><br />\r\n<img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/857/cehO9WlC1hc2Q.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/858/ceXYPW59dIGZQ.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><br />\r\n�῵D90 ����Ҽ�����</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/859/ceMxoXsfYJeHo.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/860/ceOEzKCwVjyIA.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><br />\r\n�῵D90 ģʽ����������ȵ��ڲ���</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/862/ceNFbUVc4z6pM.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/861/ceshF7WvtVE6.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><br />\r\n�῵D90 ������ѥ</p>\r\n<p align="center"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/863/ceVlkyYHwmlLA.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/22_240x180/864/ceCP4HhvhL4DM.jpg" width="240" height="180" alt="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" title="֧�ָ�����Ƶ �ж�֮ѡ�῵D90ȫ���ײ⣨δ�꣩" /></p>\r\n</p>\r\n', '6700', 213);
INSERT INTO `qb_gift_content_1` VALUES (9, 25, 1, 1, '<em>����ʱ�䣺</em><a href="http://product.pconline.com.cn/notebook/c7707/" target="_blank"><em>2010�� 6��</em></a> <li>��������</li>Intel Pentium P6000(1.86GHz) <li>�ڴ�������</li><a href="http://product.pconline.com.cn/so/s26143/" target="_blank">2GB</a> <li>Ӳ��������</li><a href="http://product.pconline.com.cn/so/s34146/" target="_blank">320GB</a> <li>��Ļ�ߴ磺</li><a href="http://product.pconline.com.cn/notebook/c1116/" target="_blank">14Ӣ��</a> <li>�Կ�оƬ��</li><a href="http://product.pconline.com.cn/so/s47401/" target="_blank">ATI Mobility Radeon HD 5145</a> <li>������</li><p><a href="http://product.pconline.com.cn/notebook/c3336/" target="_blank">Լ2.35Kg</a></p>\r\n<p><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img.taobaocdn.com/imgextra/i7/196070357/T2AaXjXm0bXXXXXXXX_!!196070357.png" width="638" height="443" /></p>\r\n<p><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img.taobaocdn.com/imgextra/i8/196070357/T2zatjXdpaXXXXXXXX_!!196070357.png" width="630" height="437" /></p>\r\n<p><font color="#ff0000"><font size="4"><font color="#0000ff"><strong><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img.taobaocdn.com/imgextra/i4/196070357/T2np8jXcVcXXXXXXXX_!!196070357.png" width="636" height="450" /></strong></font></font></font></p>\r\n<p><font color="#ff0000"><font size="4"><font color="#0000ff"><strong><font color="#ff0000" style="background-color:#ffff00;"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img.taobaocdn.com/imgextra/i3/196070357/T22p0jXjRcXXXXXXXX_!!196070357.png" width="640" height="431" /></font></strong></font></font></font></p>\r\n', '7900', 123);
INSERT INTO `qb_gift_content_1` VALUES (10, 26, 1, 1, '<p align="center"><font size="3">iphone4��Ʒ��ƻ��ר��Ʒ����� ������İ���</font></p>\r\n<p align="center"><font size="3">������ŵ����ֻѡ���ʵĴ���װ����ƷƷ�������</font></p>\r\n<h2 style="font-size:22px;"><font size="3">iphone4��½�л�2�ְ汾16GB��32GB����ӭ��λ���� ��ӭ��λ��ѯ����</font></h2><p align="center" style="font-size:22px;"><font size="3">���ڹ���iPhone4�������°汾4.1���Ѿ���Խ���ģ�iPhone4�»���û��ʲô�����������ǹ�˾�ṩ����iPhone4ר��������ǻ���3000������ģ�����װ��Ҫ�շѵģ���ȡ200Ԫ������ã����԰�3�꣬Ҳ�����ṩ�ƽ⼼���������Ƿ��ڱ��깺������һ��iPhone4�ײͣ���������Ѱ�װ��ֵ1000����������������ƽ⣩<br />\r\n<br />\r\n�˿��ֻ�ʹ�õ�������SIM����SIM��Ҫʹ�ü�������С֮����ܲ����ֻ��������ṩ��������80Ԫ��,���ǹ����ײͼ����ͼ�����<img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img02.taobaocdn.com/imgextra/i2/T1kAlJXgVIXXbzmloT_012618.jpg_310x310.jpg" width="192" height="175" style="width:192px;height:175px;" /><br />\r\n<br />\r\n�ֻ����ۣ�Ԥ�����٣�<br />\r\n<br />\r\n<img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img04.taobaocdn.com/imgextra/i4/330770771/T2GXhqXetbXXXXXXXX_!!330770771.jpg" width="675" height="450" /><br />\r\n<br />\r\n<img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img03.taobaocdn.com/imgextra/i3/330770771/T2TppqXmtaXXXXXXXX_!!330770771.jpg" width="675" height="450" /><br />\r\n<br />\r\n�ٷ����䣺iphone4 32G + ������ + ����� + ���� +&nbsp;ʹ���ֲ� + ȡ���루ȫ��δ�����½�л���<br />\r\n</font></p>\r\n', '3900', 886);
INSERT INTO `qb_gift_content_1` VALUES (11, 27, 1, 1, '2222222222', '222', 122);
INSERT INTO `qb_gift_content_1` VALUES (17, 32, 4, 1, '<p>�߼�������ר�ò��ϣ��������׳���͸����ñ�Ӱ������ͣ�ñ�ӵĳ��룺56-59���ף�ñ��12���� ������һ��Ҫȷ�Ϻ�ͷΧ���й��򣡾���ñΧ�Ĳ���������ο���ͼ��</p>\r\n<p>ˮϴ�뵯����������</p>\r\n<p>ˮϴ����˼�ǿ���ֱ��ˮϴ�������Ǹ�ϴ��������ϴ�ӷ�������Ϊ�ָкã������������������Ҳ�Ǽ���ñ�ӵĺû���׼֮һ������һ���޲������ָ�Ӳ��ñ�ӣ�����״�ܰ����ģ��е��ǲ���ˮϴ�ģ���Ϊñ�ӵĲ��Ͽ��ܻ����ҽ���SN���ȶ��ͽ���һϴ�Ļ��ͻ����ر��Σ������𻵣����������ָ���Ӳ��ñ�������ͣ���Ϊ�ǵ������۲�������͸���Ը��ã���ò�Ҫˮϴ<br />\r\n</p>\r\n<p><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img03.taobaocdn.com/imgextra/i3/54917771/T2u1RhXcFdXXXXXXXX_!!54917771.jpg" width="700" height="525" /></p>\r\n', '20', 300);
INSERT INTO `qb_gift_content_1` VALUES (18, 33, 1, 1, '<p>&nbsp;</p>\r\n<p align="left">��Ʒ����&nbsp;&nbsp;~�n�L������ͨ�ڿ��ʸ�PU���и���ඵ���ÿ�Ů��</p>\r\n<div align="left">����ɫ�� ��ɫ����ɫ����ɫ����ɫ����ɫ</div>\r\n<div align="left">&nbsp;</div>\r\n<div align="left">����ʽ��&nbsp;&nbsp; ���� /&nbsp;����&nbsp;</div>\r\n<div align="left">&nbsp;</div>\r\n<div align="left">���ʵء�&nbsp; PU</div>\r\n<p align="left">��������&nbsp; 0.75����</p>\r\n<p align="left">���ṹ�� ����������۷�ڣ�������һ������������һС����������һ������������һ�ֻ�����һ��Ǯ����������һ����������������ǰ���������������۴��������������һ���ڴ���</p>\r\n<p align="left">����� �����������Ͽڿ�Ϊ34���ף������ҵײ���36���ף����ϵ��²��������28���ף����������19���ף����׺�11.5����.</p>\r\n<p><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img04.taobaocdn.com/imgextra/i4/268869723/T23w0mXXNaXXXXXXXX_!!268869723.jpg" width="567" height="377" /><br />\r\n<img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img04.taobaocdn.com/imgextra/i4/268869723/T2KM8mXh8XXXXXXXXX_!!268869723.jpg" width="702" height="381" /><br />\r\n<img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img04.taobaocdn.com/imgextra/i4/268869723/T2xNdmXaxXXXXXXXXX_!!268869723.jpg" width="463" height="588" /></p>\r\n', '200', 300);
INSERT INTO `qb_gift_content_1` VALUES (19, 34, 1, 1, '<li>Ʒ��: Videng Polo/���Ǳ���</li><li>����: lrbest001</li><li>�Ա�: ��</li><li>��ʽ: ���</li><li>������ʽ: ����б��</li><li>������λ: �粿</li><li>�ʵ�: ţƤ</li><li>Ƥ������: ����Ƥ</li><li>�������: ����</li><li>���ಿ��: ���</li><li>���������ʽ: �������</li><li>�ڲ��ṹ: �в�������&nbsp;֤����...</li><li>�������: ������</li><li>�������Ԫ��: ������</li><li>���: �պ��緶</li><li>�������: �����</li><li>���ͼ��: ��ɫ��ͼ��</li><li>��ɫ����: ��ɫ��ǿ�棺23*27*......</li><li>���޼в�: ��</li><li>Ӳ��: ��</li><li>��������: ��</li><li>�ɷ��۵�: ��</li><li>���������: ��</li><li>��ɫ: ȫ��</li><li>�۸�����: 101-500Ԫ<img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img04.taobaocdn.com/imgextra/i4/282272281/T2rhXrXexaXXXXXXXX_!!282272281.jpg" width="750" height="300" border="0" /></li>', '100', 200);
INSERT INTO `qb_gift_content_1` VALUES (20, 35, 2, 1, '<p>����������ԭ���Ľ���ֽ��װ������ȥ����Ҳ��̸����ȱ�������ˡ������������򿪺�������һ����װ�����ġ�</p>\r\n<p><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img02.taobaocdn.com/imgextra/i6/387793574/T2fIFcXatXXXXXXXXX_!!387793574.jpg_310x310.jpg" width="219" height="220" border="0" /></p>\r\n', '8', 30);
INSERT INTO `qb_gift_content_1` VALUES (21, 36, 3, 1, '<li>����: 6324<img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img01.taobaocdn.com/imgextra/i1/144668369/T2GmFnXhdaXXXXXXXX_!!144668369.jpg_310x310.jpg" width="310" height="207" border="0" /></li><li>�䳤: ����</li><li>����: ����</li><li>ͼ��: ��ɫ</li><li>���: ����</li><li>�ʵ�: ����</li><li>�ʺ���Ⱥ: ��Ů</li><li>��ɫ����: ��ɫ�ֻ�&nbsp;��ɫ�ֻ�...</li><li>����: ����</li><li>����: �ļ�&nbsp;����&nbsp;�＾...</li><li>ͼƬʵ��: ƽ��ʵ��...</li><li>ϸ��ͼ: ��ϸ��ͼ</li><li>�۸�: 0-30Ԫ </li><p>&nbsp;</p>\r\n', '60', 90);
INSERT INTO `qb_gift_content_1` VALUES (22, 37, 3, 1, '<p align="left">Ŀǰ����������Ʒ��������ɫ��α��ǩ�����û�еĻ����п����Ƿ�Ʒ�����λ���һ�����⣡����</p>\r\n<p align="left"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img03.taobaocdn.com/imgextra/i3/96601411/T2WfJnXjBXXXXXXXXX_!!96601411.jpg" width="750" height="415" border="0" /></p>\r\n', '600', 800);
INSERT INTO `qb_gift_content_1` VALUES (23, 38, 3, 1, '<p>��Ʒ������<br />\r\n�BLAMY safari 10�¿��ɫ �ֱ�<br />\r\n�Bǿ���ܽ����ʾ��@����<br />\r\n�B�ƺ�ͭȦ�ʼ�<br />\r\n�B���ص����幤ѧ�����ջ�����д˳��������<br />\r\n�B���أ��¹�<br />\r\n</p>\r\n<p>&nbsp;</p>\r\n<span style="font-family:����;"><span style="color:black;font-size:13.5pt;font-family:��Բ;"><span style="color:black;font-size:13.5pt;font-family:��Բ;">�� LAMY&nbsp; safari (����ϵ��)<br />\r\n�B����������Ϣ<br />\r\n�BABSǿ���ܽ��ʸˣ�����ǰ����ƶ��أ��䵯��ͭ�߱ʼУ�������д�����ޱȡ���ϵ�б���īˮ�ʡ�����ʡ�ԭ�ӱʼ�Ǧо��(��ͷ���в���)��������ɫ����ɫ��̿��ɫ����ɫ��ѡ��<br />\r\n�B1994�꣺ LAMY safari����ϵ�� �¹���ŵ��iF��ƴ�<br />\r\n�B2008�꣺ LAMY safari����ϵ�� - �Ї� IF �OӋ��</span><span style="color:black;font-size:13.5pt;font-family:��Բ;"><br />\r\n<p>&nbsp;</p>\r\n</span></span></span><p><span style="font-family:����;"><span style="color:black;font-size:13.5pt;font-family:��Բ;"></span></span><span style="font-family:����;"><span style="color:black;font-size:13.5pt;font-family:��Բ;"></span><p>&nbsp;</p>\r\n<p><span style="font-family:����;"><span style="color:black;font-size:13.5pt;font-family:��Բ;"></span></span><p><span style="font-family:����;"><span style="color:black;font-size:13.5pt;font-family:��Բ;">������ֻ��158Ԫ�����򵽺͹���ר���ۼ�380Ԫһ�������ã�</span></span></p>\r\n<p><span style="font-family:����;"><span style="color:black;font-size:13.5pt;font-family:��Բ;">(1֧�ֱ�+1֧T10ī��+1��LAMY����)+ Z24��ī�� �����ļ��׽���158Ԫ��</span></span></p>\r\n<p><span style="font-family:����;"><span style="color:black;font-size:13.5pt;font-family:��Բ;"></span></span><span style="font-family:����;"><span style="color:black;font-size:13.5pt;font-family:��Բ;"><p><span style="font-family:����;"><span style="color:black;font-size:13.5pt;font-family:��Բ;">��ϸ�뿴���������޹�ֽ������^_^�����Ŵ�Ҳ���Ϊ�˼�ԪǮ��֧��ֽ�ıʻ�ȥ�ɣ�������Ҫ������ѵ��������ʼ⣻</span></span></p>\r\n<p><span style="font-family:����;"><span style="color:black;font-size:13.5pt;font-family:��Բ;">���й��EF(��ϸ:0.4mm),F(ϸ:0.5mm),M(�У�0.7mm),B(�֣�0.9mm)��Ĭ�Ϸ�EF��</span></span></p>\r\n<p><span style="font-family:����;"><span style="color:black;font-size:13.5pt;font-family:��Բ;"></span></span></p>\r\n</span><span style="font-family:����;"><span><p><span style="font-family:����;"><span style="color:black;font-size:13.5pt;font-family:��Բ;"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img04.taobaocdn.com/imgextra/i4/50642456/T2vp4mXetaXXXXXXXX_!!50642456.jpg_620x10000.jpg" width="592" height="674" /></span></span></p>\r\n</span></span></span>', '600', 80);
INSERT INTO `qb_gift_content_1` VALUES (24, 39, 1, 1, 'ʱ�еĻ�����ϻ������ļ۸������ϡ����ᡱ�����ӣ����Ų��������߶����������������ջ�����CX150Eӵ�ж��ֻ�����ɫ��ƣ��������㲻ͬ�����ߵĹ�������������16GB�ڴ�������ͬʱ֧����Ӵ洢�����ڴ洢����Ҳ����������󲿷�һ�������ߵ�����������ӵ��420�������ء�Exmor R��CMOSӰ�񴫸�����ҹ��������ֳ���ͬ���Ʒ���֡�<p align="center" style="text-align:center;"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/44/250/ceyF5Qggg6ZY.jpg" width="500" height="375" border="0" /></p>\r\n<p><br />\r\n&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; �������������CX150E<br />\r\n��������ǿ���Ӱ���������⣬CX150E���߱�25����ѧ�佹��ͷ����Ȼ������ı佹�������Ʒ����һ�������Ѿ���ȫ���á����⣬Ϊ�˷������ż�������ʹ�ã�CX150E���߱������Զ�����ģʽ����֤�������Ǻܶ��е������߿������������Ļ��档</p>\r\n<p align="center" style="text-align:center;"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img2.zol.com.cn/product/44/251/ceUcLEPzS0as.jpg" width="500" height="375" border="0" /></p>\r\n', '900', 500);
INSERT INTO `qb_gift_content_1` VALUES (25, 40, 3, 1, '<p>�˴��¹��ܣ�<br />\r\n<br />\r\n<br />\r\n128M�����ڴ��ڴ�������128M��<br />\r\n<br />\r\nרҵMP3�������ʡ����ġ��μ�ʵ��ȫMP3���ʷ������������ö�����¼����������ѧ������Ȩ��������ʦ��ԭ��¼��������������������������һ�ڱ�׼������Ӣ�<br />\r\n<br />\r\nʵʱ����¼����ͬ��¼����ʦ���Σ������κ�ϰ����¼�Լ��������������ͱ�׼Ӣ�<br />\r\n<br />\r\n��ʱ�����Ա�ԭ����ʱ��¼�����ɼ�ʱ���ţ�����������������<br />\r\n<br />\r\nר��78���ʵ�ȫ����¼������˫����ôʵ䡷�����ִ����˫�������Ӣ���ʵ䡷����Ȩ���ʵ䣬����Сѧ�����С����С��ļ� �����������С��и�����˼��GRE��GMATʮ��ּ��ʵ䣬������󳣱��ʵ������ѡ�ʵ䣬��������55��רҵ�ʵ䣬������ʵ�ġ��ʵ��ȫ����<br />\r\n<br />\r\n��Ϸ��Ч�������ṩСѧ�����С����еĵ���ѧϰ���Խ����ʿ�ȹ��ܣ����������ߡ����� ���Ƴɶԡ�����̫�ձ��ݡ����������ս������һĿʮ�С�������»�������Ϸ���䳡�����Ǽǵ��ʵĺð��֡�<br />\r\n<br />\r\nRPG������Ϸ֧��ǿ��RPG��Ϸ��������˵����̹�˴�ս��������Ϸ���������֡�<br />\r\n<br />\r\n��Ĭ������Ƭ�����ز�����Ĭ��Ȥ�Ķ�����Ƭ����֧�ֶ����ʼ�Nmail�����ܶ���DIY��������Ȥ��</p>\r\n<p>&nbsp;</p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img04.taobaocdn.com/imgextra/i4/52843514/T26fBhXdFXXXXXXXXX_!!52843514.jpg" width="675" height="473" /></font></p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img07.taobaocdn.com/imgextra/i7/52843514/T2dLdhXfxbXXXXXXXX_!!52843514.jpg" width="677" height="801" style="width:677px;height:801px;" /></font></p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img03.taobaocdn.com/imgextra/i3/52843514/T2U14hXcNcXXXXXXXX_!!52843514.jpg" width="643" height="586" /></font></p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img08.taobaocdn.com/imgextra/i8/52843514/T2Je4hXd0cXXXXXXXX_!!52843514.jpg" width="609" height="589" /></font></p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img02.taobaocdn.com/imgextra/i2/52843514/T2Iu4hXd8cXXXXXXXX_!!52843514.jpg" width="751" height="549" /></font></p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img05.taobaocdn.com/imgextra/i5/52843514/T2hfFhXcXXXXXXXXXX_!!52843514.jpg" width="770" height="340" /></font></p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img07.taobaocdn.com/imgextra/i7/52843514/T26fBhXdBXXXXXXXXX_!!52843514.jpg" width="672" height="611" /></font></p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img06.taobaocdn.com/imgextra/i6/52843514/T2Ve0hXjFcXXXXXXXX_!!52843514.jpg" width="547" height="614" /></font></p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img08.taobaocdn.com/imgextra/i8/52843514/T2Ou0hXkxcXXXXXXXX_!!52843514.jpg" width="774" height="358" /></font></p>\r\n<p><font size="6"><img onload=\'if(this.width>600)makesmallpic(this,600,800);\' src="http://img01.taobaocdn.com/imgextra/i1/52843514/T2WeJhXc8eXXXXXXXX_!!52843514.jpg" width="807" height="300" /></font></p>\r\n', '100', 200);

# --------------------------------------------------------

#
# ��Ľṹ `qb_gift_content_2`
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
# �������е����� `qb_gift_content_2`
#

INSERT INTO `qb_gift_content_2` VALUES (4, 6, 1, 1, 'gfds', 'gfsd', 'gfds', 'gfsd');
INSERT INTO `qb_gift_content_2` VALUES (5, 7, 1, 9, 'ruytr', 'yutr', 'uytr', 'uyt');

# --------------------------------------------------------

#
# ��Ľṹ `qb_gift_field`
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
# �������е����� `qb_gift_field`
#

INSERT INTO `qb_gift_field` VALUES (86, 1, '��Ʒ����', 'content', 'mediumtext', 0, 1, 'ieedit', 650, 250, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_gift_field` VALUES (142, 1, '�����', 'giftnum', 'int', 5, 7, 'text', 5, 0, '', '', '��', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_gift_field` VALUES (78, 1, '�г��۸�', 'mart_price', 'varchar', 8, 9, 'text', 12, 0, '', '', 'Ԫ', '', 0, 1, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_gift_field` VALUES (145, 2, '��ע', 'content', 'mediumtext', 0, -1, 'textarea', 400, 50, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_gift_field` VALUES (147, 2, '��ϵ������', 'contact_name', 'varchar', 20, 10, 'text', 100, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_gift_field` VALUES (148, 2, '��ϵ�˵绰', 'contact_phone', 'varchar', 20, 9, 'text', 100, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');
INSERT INTO `qb_gift_field` VALUES (149, 2, '���ŵ�ַ', 'contact_address', 'varchar', 100, 8, 'text', 200, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', 31, '');

# --------------------------------------------------------

#
# ��Ľṹ `qb_gift_join`
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
# �������е����� `qb_gift_join`
#

INSERT INTO `qb_gift_join` VALUES (6, 2, 24, 1, 1276510964, 1, 'admin', 0, '127.0.0.1');
INSERT INTO `qb_gift_join` VALUES (7, 2, 24, 1, 1277376800, 9, '����', 1, '127.0.0.1');

# --------------------------------------------------------

#
# ��Ľṹ `qb_gift_module`
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
# �������е����� `qb_gift_module`
#

INSERT INTO `qb_gift_module` VALUES (1, 0, '��Ʒ��', 10, '', 'a:1:{s:9:"moduleSet";N;}', '', 1, 0, 'a:4:{s:4:"list";s:0:"";s:4:"show";s:0:"";s:4:"post";s:0:"";s:6:"search";s:0:"";}');
INSERT INTO `qb_gift_module` VALUES (2, 0, '����', 0, '', 'a:1:{s:9:"moduleSet";N;}', '', 0, 0, 'a:4:{s:4:"list";s:12:"joinlist.htm";s:4:"show";s:12:"joinshow.htm";s:4:"post";s:8:"join.htm";s:6:"search";s:0:"";}');

# --------------------------------------------------------

#
# ��Ľṹ `qb_gift_sort`
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
# �������е����� `qb_gift_sort`
#

INSERT INTO `qb_gift_sort` VALUES (1, 0, '�Ҿ���Ʒ', 1, 2, 0, 0, '', 1, 0, '', '', '', '', 'N;', '', 0, '', '', '', 0, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_gift_sort` VALUES (2, 0, '��������', 1, 2, 0, 0, '', 2, 0, '', '', '', '', 'a:4:{s:4:"head";s:0:"";s:4:"foot";s:0:"";s:4:"list";s:0:"";s:8:"bencandy";s:0:"";}', '', 0, '', '', '', 0, '', '', '', '', 0, 'a:1:{s:11:"field_value";N;}', 0, 0, '', 'canyinxiuxian', 0);
INSERT INTO `qb_gift_sort` VALUES (3, 0, '�Ļ�����', 1, 2, 0, 0, '', 0, 0, '', '', '', '', 'a:4:{s:4:"head";s:0:"";s:4:"foot";s:0:"";s:4:"list";s:0:"";s:8:"bencandy";s:0:"";}', '', 0, '', '', '', 0, '', '', '', '', 0, 'a:1:{s:11:"field_value";N;}', 0, 0, '', 'wenhuatiyu', 0);
INSERT INTO `qb_gift_sort` VALUES (4, 0, '��װ����', 1, 2, 0, 0, '', 0, 0, '', '', '', '', 'a:4:{s:4:"head";s:0:"";s:4:"foot";s:0:"";s:4:"list";s:0:"";s:8:"bencandy";s:0:"";}', '', 0, '', '', '', 0, '', '', '', '', 0, 'a:1:{s:11:"field_value";N;}', 0, 0, '', 'fuzhuangpeishi', 0);
INSERT INTO `qb_gift_sort` VALUES (5, 0, '����Ӱ��', 1, 2, 0, 0, '', 0, 0, '', '', '', '', 'N;', '', 20, '', '', '', 0, '2', '', '', '', 0, '', 0, 0, '', '', 0);
