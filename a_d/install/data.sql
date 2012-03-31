INSERT INTO `qb_module` (`id`, `type`, `name`, `pre`, `dirname`, `domain`, `admindir`, `config`, `list`, `admingroup`, `adminmember`, `ifclose`) VALUES (24, 2, '���ϵͳ', 'ad_', 'a_d', '', '', '', 0, '', '', 0);


# --------------------------------------------------------

#
# ��Ľṹ `qb_ad_compete_place`
#

CREATE TABLE `qb_ad_compete_place` (
  `id` mediumint(7) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `isclose` tinyint(1) NOT NULL default '0',
  `list` int(10) NOT NULL default '0',
  `price` mediumint(5) NOT NULL default '0',
  `day` mediumint(4) NOT NULL default '0',
  `adnum` smallint(3) NOT NULL default '0',
  `wordnum` smallint(3) NOT NULL default '0',
  `autoyz` tinyint(1) NOT NULL default '1',
  `demourl` varchar(150) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=4 ;

#
# �������е����� `qb_ad_compete_place`
#

INSERT INTO `qb_ad_compete_place` VALUES (3, '����ҳ���۹��', 0, 0, 50, 5, 8, 36, 1, '/do/digg.php');

# --------------------------------------------------------

#
# ��Ľṹ `qb_ad_compete_user`
#

CREATE TABLE `qb_ad_compete_user` (
  `ad_id` mediumint(7) NOT NULL auto_increment,
  `uid` mediumint(7) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `begintime` int(10) NOT NULL default '0',
  `endtime` int(10) NOT NULL default '0',
  `money` mediumint(6) NOT NULL default '0',
  `id` mediumint(7) NOT NULL default '0',
  `yz` tinyint(1) NOT NULL default '1',
  `adlink` varchar(200) NOT NULL default '',
  `adword` varchar(255) NOT NULL default '',
  `hits` mediumint(7) NOT NULL default '0',
  `color` varchar(20) NOT NULL default '',
  `fonttype` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`ad_id`),
  KEY `id` (`id`,`endtime`,`money`,`yz`)
) TYPE=MyISAM AUTO_INCREMENT=13 ;

#
# �������е����� `qb_ad_compete_user`
#

INSERT INTO `qb_ad_compete_user` VALUES (11, 1, 'admin', 1239277578, 1239709578, 50, 3, 1, 'http://www.qibosoft.com/', '�벩�ٷ�վ', 0, '', 0);
INSERT INTO `qb_ad_compete_user` VALUES (12, 1, 'admin', 1239279810, 1239711810, 50, 3, 1, 'http://www.qibosoft.com/bbs', '�벩�ٷ���̳', 0, '', 0);

# --------------------------------------------------------

#
# ��Ľṹ `qb_ad_config`
#

CREATE TABLE `qb_ad_config` (
  `c_key` varchar(50) NOT NULL default '',
  `c_value` text NOT NULL,
  `c_descrip` text NOT NULL,
  PRIMARY KEY  (`c_key`)
) TYPE=MyISAM;

#
# �������е����� `qb_ad_config`
#

INSERT INTO `qb_ad_config` VALUES ('module_pre', 'ad_', '');
INSERT INTO `qb_ad_config` VALUES ('Info_webname', '���ϵͳ', '');
INSERT INTO `qb_ad_config` VALUES ('Info_webOpen', '1', '');
INSERT INTO `qb_ad_config` VALUES ('module_close', '0', '');
INSERT INTO `qb_ad_config` VALUES ('module_id', '24', '');

# --------------------------------------------------------

#
# ��Ľṹ `qb_ad_norm_place`
#

CREATE TABLE `qb_ad_norm_place` (
  `id` mediumint(7) NOT NULL auto_increment,
  `keywords` varchar(50) NOT NULL default '',
  `name` varchar(100) NOT NULL default '',
  `type` varchar(30) NOT NULL default '0',
  `isclose` tinyint(1) NOT NULL default '0',
  `begintime` int(10) NOT NULL default '0',
  `endtime` int(10) NOT NULL default '0',
  `adcode` text NOT NULL,
  `posttime` int(10) NOT NULL default '0',
  `list` int(10) NOT NULL default '0',
  `uid` mediumint(7) NOT NULL default '0',
  `hits` mediumint(7) NOT NULL default '0',
  `money` mediumint(6) NOT NULL default '0',
  `moneycard` mediumint(6) NOT NULL default '0',
  `ifsale` tinyint(1) NOT NULL default '0',
  `autoyz` tinyint(1) NOT NULL default '0',
  `demourl` varchar(150) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=22 ;

#
# �������е����� `qb_ad_norm_place`
#

INSERT INTO `qb_ad_norm_place` VALUES (1, 'article_list', '�����б�ҳ������', 'code', 0, 0, 0, 'a:5:{s:4:"word";s:0:"";s:6:"picurl";s:0:"";s:7:"linkurl";s:0:"";s:8:"flashurl";s:0:"";s:4:"code";s:0:"";}', 0, 0, 0, 0, 0, 5, 0, 1, '/do/job.php?job=jump&pagetype=list');
INSERT INTO `qb_ad_norm_place` VALUES (10, 'article_content', '����������ߵĹ��', 'pic', 1, 0, 0, 'a:8:{s:4:"word";s:0:"";s:6:"picurl";s:32:"other/1_20090326120324_mnfIi.jpg";s:7:"linkurl";s:22:"http://www.qibosoft.com/";s:8:"flashurl";s:0:"";s:4:"code";s:0:"";s:5:"width";s:3:"400";s:6:"height";s:3:"400";s:9:"pictarget";s:5:"blank";}', 0, 0, 0, 0, 0, 5, 1, 1, '/do/job.php?job=jump&pagetype=bencandy');
INSERT INTO `qb_ad_norm_place` VALUES (2, 'article_show', '��������ҳ����·����', 'code', 0, 0, 0, 'a:5:{s:4:"word";s:0:"";s:6:"picurl";s:0:"";s:7:"linkurl";s:0:"";s:8:"flashurl";s:0:"";s:4:"code";s:1782:"<div style="LINE-HEIGHT: 150%"><a href="http://www.zxx6.com/" target=_blank><font color=#ff0000><strong>վ��ѧϰ��</strong></font></a> ����<a href="http://www.angelyyl.cn/" target=_blank>��������</a><a href="http://www.czin.cn/" target=_blank><br />�������ߡ������˵����ϼ�԰</a> <br /><a href="http://www.sy50.com/" target=_blank>�������� �˽����� ��������</a> <br /><a href="http://www.771881.cn/" target=_blank>�����㱧����-����Ůͬ������-�ܼ�Ů��վ </a><br /><a href="http://www.aihut.com/" target=_blank>���С��ԭ����������� </a><br /><a href="http://www.popyule.com/" target=_blank>����������--�����ۺ�վqibosoft����</a> <br /><a href="http://www.china551.cn/" target=_blank><font color=#ff0000>����������</font></a> ����<a href="http://www.ym988.com/" target=_blank>Բ��ģ�幤���� </a><br /><a href="http://www.welights.com/" target=_blank>���ʵƾ���</a> ����<a href="http://www.hnmssy.cn/" target=_blank>����������Ӱ��</a> <br /><a href="http://www.nuoyue.net/" target=_blank><font color=#ff0000>ŵԾվ������ - վ��������ѧϰ�ĺõط�</font></a> <br /><a href="http://www.qzfl.com/" target=_blank>Ȫ�ݷ��� ����Ȫ����Ϣ�������������</a> <br /><a href="http://www.stmsn.com/" target=_blank>�й���������</a> ����<a href="http://www.downcc.cn/" target=_blank>�󵱼����վ </a><br /><a href="http://www.yt12333.cn/" target=_blank>�Ͷ��籣֮��-��ͤ�Ͷ�������</a> <br /><a href="http://www.gooyi.cn/" target=_blank>������ - ��������Ż��� </a><br /><a href="http://www.idercn.com/" target=_blank>I.D.����</a> ����<a href="http://www.tz0632.com/" target=_blank>���ݳ�����</a> ����<a href="http://www.doubar.com/" target=_blank>���� </a></div>\r\n<div style="LINE-HEIGHT: 150%"><a href="http://www.wfseo.org/" target=_blank><font color=#d2691e>������վ�Ż�</font><br /></a><br /></div>";}', 0, 0, 0, 0, 0, 5, 0, 1, '/do/job.php?job=jump&pagetype=bencandy');
INSERT INTO `qb_ad_norm_place` VALUES (11, 'digg_list', '�������а��߹��', 'code', 0, 0, 0, 'a:5:{s:4:"word";s:0:"";s:6:"picurl";s:0:"";s:7:"linkurl";s:0:"";s:8:"flashurl";s:0:"";s:4:"code";s:813:"<div style="LINE-HEIGHT: 200%"><a href="http://www.ibioo.com/" target=_blank><font color=#ff0000>�̹�������--������߻�������վ!</font> </a><br /><a href="http://www.51solo.net/" target=_blank>���������Ż�����������������ҿ�ʼ </a><br /><a href="http://1.com/45/admin/www.china-highway.com" target=_blank>�����·�߾����й����ٹ�·�� </a><br /><a href="http://www.nenbei.com/" target=_blank><font color=#ff0000>�۱��ۺ���������ӭ���ĵ��� </font></a><br /><a href="http://www.liuv.net/" target=_blank><font color=#ff0000>��ˮ���</font></a> <br /><a href="http://www.fming.net/" target=_blank>����ԭ�� ��ѧ����Ӱ�Ĵ���ƽ̨ </a><br /><a href="http://www.netchinatown.com/" target=_blank>ʱ���Ƴ�-���⻪�˾�Ӣ�������԰ </a><br /><a href="http://frp.ok586.cn/" target=_blank>�Ϻ���������ȴ��רҵ��������. </a></div>";}', 0, 0, 0, 0, 0, 5, 0, 1, '/do/digg.php');
INSERT INTO `qb_ad_norm_place` VALUES (19, 'list_page_topad', '�б�ҳ��߶������λ', 'pic', 0, 0, 0, 'a:8:{s:4:"word";s:0:"";s:6:"picurl";s:13:"ad/listad.jpg";s:7:"linkurl";s:22:"http://www.yeepay.com/";s:8:"flashurl";s:0:"";s:4:"code";s:0:"";s:5:"width";s:3:"290";s:6:"height";s:3:"130";s:9:"pictarget";s:5:"blank";}', 0, 0, 0, 2, 0, 10, 1, 1, '/do/job.php?job=jump&pagetype=list');
INSERT INTO `qb_ad_norm_place` VALUES (18, 'show_topad', '����ҳ����������', 'pic', 0, 0, 0, 'a:8:{s:4:"word";s:0:"";s:6:"picurl";s:18:"ad/ad_show_top.jpg";s:7:"linkurl";s:22:"http://www.yeepay.com/";s:8:"flashurl";s:0:"";s:4:"code";s:0:"";s:5:"width";s:3:"980";s:6:"height";s:2:"60";s:9:"pictarget";s:5:"blank";}', 0, 0, 0, 0, 0, 10, 1, 1, '../do/job.php?job=jump&pagetype=bencandy');
INSERT INTO `qb_ad_norm_place` VALUES (17, 'show_right_top_picad', '����ҳ��߶���ͼƬ���λ', 'pic', 0, 0, 0, 'a:8:{s:4:"word";s:0:"";s:6:"picurl";s:15:"ad/qyshowad.jpg";s:7:"linkurl";s:43:"http://www.qy.com.cn/idc/product_double.asp";s:8:"flashurl";s:0:"";s:4:"code";s:0:"";s:5:"width";s:3:"290";s:6:"height";s:3:"110";s:9:"pictarget";s:5:"blank";}', 0, 0, 0, 29, 0, 10, 1, 1, '/do/job.php?job=jump&pagetype=bencandy');
INSERT INTO `qb_ad_norm_place` VALUES (20, 'AD_list_topad', '�б�ҳ����������', 'pic', 0, 0, 0, 'a:8:{s:4:"word";s:0:"";s:6:"picurl";s:14:"ad/cnidca1.gif";s:7:"linkurl";s:21:"http://www.cnidc.com/";s:8:"flashurl";s:0:"";s:4:"code";s:0:"";s:5:"width";s:3:"980";s:6:"height";s:2:"60";s:9:"pictarget";s:5:"blank";}', 0, 0, 0, 4, 0, 10, 1, 1, '/do/list.php?fid=1');
INSERT INTO `qb_ad_norm_place` VALUES (21, 'sp_show_ad', 'ר��ҳ���λ', 'code', 0, 0, 0, 'a:5:{s:4:"word";s:0:"";s:6:"picurl";s:0:"";s:7:"linkurl";s:0:"";s:8:"flashurl";s:0:"";s:4:"code";s:943:"<div style="LINE-HEIGHT: 150%"><a href="http://3cq.org/" target=_blank>�����׶����� һ��Ϊ�����ǵĺ���</a> <br /><a href="http://www.liuv.net/" target=_blank>��ˮ���</a> <br /><a href="http://www.21yao.com/" target=_blank>����ҽҩ��</a><br /><a href="http://www.fming.net/" target=_blank>����ԭ��</a> <br /><a href="http://www.jnrx.net/" target=_blank>��������</a> <br /><a href="http://www.7mt.cn/" target=_blank>��Ħ��-�й���һĦ�г�����ý�� </a><br /><a href="http://www.hnpolice.net/" target=_blank>���Ϲ����ߵ�ר��ѧУУ�ѻ� </a><br /><a href="http://www.seo178.com/" target=_blank>SEO��ѵѡ��--����SEO��ѵ����</a> <br /><a href="http://www.51solo.net/" target=_blank>Ʒ���ƹ�,SEO��վ�Ż� </a><br /><a href="http://www.kljy.cn/" target=_blank>�����ڶ�ͯ���� </a><br /><a href="http://www.eia8.com/job/" target=_blank>�й���������Ƹ��ְ��</a> <br /><a href="http://www.wenzhang8.com/" target=_blank>���°� ������þ��������� </a>�� </div>";}', 0, 0, 0, 0, 0, 0, 0, 1, '/do/showsp.php?fid=1&id=23');

# --------------------------------------------------------

#
# ��Ľṹ `qb_ad_norm_user`
#

CREATE TABLE `qb_ad_norm_user` (
  `u_id` mediumint(7) NOT NULL auto_increment,
  `id` mediumint(7) NOT NULL default '0',
  `u_uid` mediumint(7) NOT NULL default '0',
  `u_username` varchar(30) NOT NULL default '',
  `u_day` smallint(4) NOT NULL default '0',
  `u_begintime` int(10) NOT NULL default '0',
  `u_endtime` int(10) NOT NULL default '0',
  `u_hits` mediumint(7) NOT NULL default '0',
  `u_yz` tinyint(1) NOT NULL default '0',
  `u_code` text NOT NULL,
  `u_money` mediumint(7) NOT NULL default '0',
  `u_moneycard` mediumint(7) NOT NULL default '0',
  `u_posttime` int(10) NOT NULL default '0',
  PRIMARY KEY  (`u_id`),
  KEY `u_endtime` (`u_endtime`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# �������е����� `qb_ad_norm_user`
#

