INSERT INTO `qb_hack` (`keywords`, `name`, `isclose`, `author`, `config`, `htmlcode`, `hackfile`, `hacksqltable`, `adminurl`, `about`, `class1`, `class2`, `list`, `linkname`, `isbiz`) VALUES ('jfadmin_mod', '���ֽ��ܹ���', 0, '', '', '', '', '', 'index.php?lfj=jfadmin&job=listjf', '', 'other', '��������', 7, '', 0);


CREATE TABLE `qb_jfabout` (
  `id` mediumint(7) NOT NULL auto_increment,
  `fid` mediumint(5) NOT NULL default '0',
  `title` varchar(150) NOT NULL default '',
  `content` text NOT NULL,
  `list` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=10 ;

#
# �������е����� `qb_jfabout`
#

INSERT INTO `qb_jfabout` VALUES (6, 2, '�������¿ɵ�{$webdb[postArticleMoney]}������', 'ֻ����˺�����²ſɵû���,û��˵����²��û���.', 0);
INSERT INTO `qb_jfabout` VALUES (7, 2, 'ɾ�����¿۳�{$webdb[deleteArticleMoney]}������', '', 0);
INSERT INTO `qb_jfabout` VALUES (5, 1, '�û�ע��ɵ�{$webdb[regmoney]}������', '', 0);
INSERT INTO `qb_jfabout` VALUES (8, 2, '���±�����Ϊ�����ɵ�{$webdb[comArticleMoney]}������', '', 0);
INSERT INTO `qb_jfabout` VALUES (9, 1, 'ÿ���㿨�ɶһ�{$webdb[MoneyRatio]}������,�㿨����ͨ�����߳�ֵ���.', '', 0);



CREATE TABLE `qb_jfsort` (
  `fid` mediumint(5) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `list` int(10) NOT NULL default '0',
  PRIMARY KEY  (`fid`)
) TYPE=MyISAM AUTO_INCREMENT=3 ;

#
# �������е����� `qb_jfsort`
#

INSERT INTO `qb_jfsort` VALUES (1, '��Ա����', 0);
INSERT INTO `qb_jfsort` VALUES (2, '��������', 0);



