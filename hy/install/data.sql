INSERT INTO `qb_module` (`id`, `type`, `name`, `pre`, `dirname`, `domain`, `admindir`, `config`, `list`, `admingroup`, `adminmember`, `ifclose`) VALUES (16, 2, '��ҳ����', 'hy_', 'hy', '', '', 'a:7:{s:12:"list_PhpName";s:18:"list.php?&fid=$fid";s:12:"show_PhpName";s:29:"bencandy.php?&fid=$fid&id=$id";s:8:"MakeHtml";N;s:14:"list_HtmlName1";N;s:14:"show_HtmlName1";N;s:14:"list_HtmlName2";N;s:14:"show_HtmlName2";N;}', 101, '', '', 0);


INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_1', 'rollpic', 0, 'a:6:{s:8:"rolltype";s:1:"0";s:5:"width";s:3:"250";s:6:"height";s:3:"170";s:6:"picurl";a:2:{i:1;s:32:"label/1_20101123121104_vcrd7.jpg";i:2;s:32:"label/1_20101123121109_ud6ep.jpg";}s:7:"piclink";a:2:{i:1;s:1:"#";i:2;s:1:"#";}s:6:"picalt";a:2:{i:1;s:0:"";i:2;s:0:"";}}', 'a:3:{s:5:"div_w";s:3:"248";s:5:"div_h";s:3:"168";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1290488506, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_10', 'Info_hy_', 1, 'a:28:{s:13:"tplpart_1code";s:737:"<table width="100%" border="0" cellspacing="0" cellpadding="0" class="listtable table1">\r\n                  <tr>\r\n                    \r\n                <td class="img"><span>$i</span><a href="$webdb[www_url]/home/?uid=$uid" target="_blank"><img src="$picurl" onerror="this.src=\'$webdb[www_url]/images/default/nopic.jpg\'" width="60" height="45" border="0"/></a></td>\r\n                    <td class="word">\r\n                    	<div class="t"><a href="$webdb[www_url]/home/?uid=$uid" target="_blank">$title</a></div>\r\n                        <div class="c">��ע�� <span>$hits</span> ��</div>\r\n                        <div class="c">������ {$dianping}  ��</div>\r\n                    </td>\r\n                  </tr>\r\n                </table>";s:13:"tplpart_2code";s:0:"";s:3:"SYS";s:7:"company";s:7:"typefid";N;s:5:"width";s:3:"250";s:6:"height";s:3:"187";s:8:"rolltype";s:10:"scrollLeft";s:8:"rolltime";s:1:"3";s:11:"roll_height";s:2:"50";s:11:"content_num";s:2:"80";s:7:"newhour";s:2:"24";s:7:"hothits";s:2:"30";s:7:"tplpath";s:0:"";s:6:"DivTpl";i:1;s:5:"fiddb";N;s:8:"moduleid";N;s:5:"stype";s:1:"p";s:2:"yz";s:3:"all";s:8:"renzheng";s:3:"all";s:10:"timeformat";s:11:"Y-m-d H:i:s";s:5:"order";s:3:"rid";s:3:"asc";s:4:"DESC";s:6:"levels";s:3:"all";s:7:"rowspan";s:1:"4";s:3:"sql";s:90:"SELECT * FROM qb_hy_company  WHERE city_id=\'$GLOBALS[city_id]\'  ORDER BY rid DESC LIMIT 4 ";s:7:"colspan";s:1:"1";s:8:"titlenum";s:2:"20";s:10:"titleflood";s:1:"0";}', 'a:3:{s:5:"div_w";s:3:"180";s:5:"div_h";s:3:"262";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1292061088, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_11', 'article', 1, 'a:32:{s:13:"tplpart_1code";s:106:"   <div class="listb l$i"><a href="$url" target="_blank">$title</a><span>{$time_m} -{$time_d}</span></div>";s:13:"tplpart_2code";s:212:"<div class="lista l0">\r\n                        <div class="t"><a href="$url" target="_blank">$title</a></div>\r\n                        <div class="c">$content</div>\r\n                    </div>\r\n                 ";s:3:"SYS";s:7:"artcile";s:13:"RollStyleType";s:0:"";s:8:"rolltype";s:10:"scrollLeft";s:8:"rolltime";s:1:"3";s:11:"roll_height";s:2:"50";s:5:"width";s:3:"250";s:6:"height";s:3:"187";s:7:"newhour";s:2:"24";s:7:"hothits";s:3:"100";s:7:"amodule";s:1:"0";s:7:"tplpath";s:24:"/common_zh_pic/zh_pc.jpg";s:6:"DivTpl";i:1;s:5:"fiddb";N;s:5:"stype";s:1:"t";s:2:"yz";s:1:"1";s:7:"hidefid";N;s:10:"timeformat";s:11:"Y-m-d H:i:s";s:5:"order";s:6:"A.list";s:3:"asc";s:4:"DESC";s:6:"levels";s:3:"all";s:7:"rowspan";s:1:"6";s:3:"sql";s:197:" SELECT A.*,A.aid AS id,R.content FROM qb_article A LEFT JOIN qb_reply R ON A.aid=R.aid   WHERE A.yz=1 AND A.city_id=\'$GLOBALS[city_id]\'  AND A.mid=\'0\'   AND R.topic=1 ORDER BY A.list DESC LIMIT 7 ";s:4:"sql2";N;s:7:"colspan";s:1:"1";s:11:"content_num";s:2:"80";s:12:"content_num2";s:3:"100";s:8:"titlenum";s:2:"40";s:9:"titlenum2";s:2:"36";s:10:"titleflood";s:1:"0";s:10:"c_rolltype";s:1:"0";}', 'a:3:{s:5:"div_w";s:3:"303";s:5:"div_h";s:3:"249";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1292061078, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_15', 'article', 1, 'a:32:{s:13:"tplpart_1code";s:66:"<div class="list"><a href="$url" target="_blank">$title</a></div> ";s:13:"tplpart_2code";s:0:"";s:3:"SYS";s:7:"artcile";s:13:"RollStyleType";s:0:"";s:8:"rolltype";s:10:"scrollLeft";s:8:"rolltime";s:1:"3";s:11:"roll_height";s:2:"50";s:5:"width";s:3:"250";s:6:"height";s:3:"187";s:7:"newhour";s:2:"24";s:7:"hothits";s:3:"100";s:7:"amodule";s:1:"0";s:7:"tplpath";s:0:"";s:6:"DivTpl";i:1;s:5:"fiddb";N;s:5:"stype";s:1:"4";s:2:"yz";s:1:"1";s:7:"hidefid";N;s:10:"timeformat";s:11:"Y-m-d H:i:s";s:5:"order";s:6:"A.list";s:3:"asc";s:4:"DESC";s:6:"levels";s:3:"all";s:7:"rowspan";s:1:"2";s:3:"sql";s:136:" SELECT A.*,A.aid AS id FROM qb_article A  WHERE A.yz=1 AND A.city_id=\'$GLOBALS[city_id]\'  AND A.mid=\'0\'   ORDER BY A.list DESC LIMIT 2 ";s:4:"sql2";N;s:7:"colspan";s:1:"1";s:11:"content_num";s:2:"80";s:12:"content_num2";s:3:"120";s:8:"titlenum";s:2:"34";s:9:"titlenum2";s:2:"40";s:10:"titleflood";s:1:"0";s:10:"c_rolltype";s:1:"0";}', 'a:3:{s:5:"div_w";s:3:"178";s:5:"div_h";s:2:"44";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1292061098, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_16', 'article', 1, 'a:32:{s:13:"tplpart_1code";s:66:"<div class="list"><a href="$url" target="_blank">$title</a></div> ";s:13:"tplpart_2code";s:0:"";s:3:"SYS";s:7:"artcile";s:13:"RollStyleType";s:0:"";s:8:"rolltype";s:10:"scrollLeft";s:8:"rolltime";s:1:"3";s:11:"roll_height";s:2:"50";s:5:"width";s:3:"250";s:6:"height";s:3:"187";s:7:"newhour";s:2:"24";s:7:"hothits";s:3:"100";s:7:"amodule";s:1:"0";s:7:"tplpath";s:0:"";s:6:"DivTpl";i:1;s:5:"fiddb";N;s:5:"stype";s:1:"4";s:2:"yz";s:1:"1";s:7:"hidefid";N;s:10:"timeformat";s:11:"Y-m-d H:i:s";s:5:"order";s:6:"A.list";s:3:"asc";s:4:"DESC";s:6:"levels";s:3:"all";s:7:"rowspan";s:1:"3";s:3:"sql";s:102:" SELECT A.*,A.aid AS id FROM qb_article A  WHERE A.yz=1  AND A.mid=\'0\'   ORDER BY A.list DESC LIMIT 3 ";s:4:"sql2";N;s:7:"colspan";s:1:"1";s:11:"content_num";s:2:"80";s:12:"content_num2";s:3:"120";s:8:"titlenum";s:2:"36";s:9:"titlenum2";s:2:"40";s:10:"titleflood";s:1:"0";s:10:"c_rolltype";s:1:"0";}', 'a:3:{s:5:"div_w";s:3:"180";s:5:"div_h";s:2:"60";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1290491634, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_17', 'article', 1, 'a:32:{s:13:"tplpart_1code";s:66:"<div class="list"><a href="$url" target="_blank">$title</a></div> ";s:13:"tplpart_2code";s:0:"";s:3:"SYS";s:7:"artcile";s:13:"RollStyleType";s:0:"";s:8:"rolltype";s:10:"scrollLeft";s:8:"rolltime";s:1:"3";s:11:"roll_height";s:2:"50";s:5:"width";s:3:"250";s:6:"height";s:3:"187";s:7:"newhour";s:2:"24";s:7:"hothits";s:3:"100";s:7:"amodule";s:1:"0";s:7:"tplpath";s:0:"";s:6:"DivTpl";i:1;s:5:"fiddb";N;s:5:"stype";s:1:"4";s:2:"yz";s:1:"1";s:7:"hidefid";N;s:10:"timeformat";s:11:"Y-m-d H:i:s";s:5:"order";s:6:"A.list";s:3:"asc";s:3:"ASC";s:6:"levels";s:3:"all";s:7:"rowspan";s:1:"3";s:3:"sql";s:101:" SELECT A.*,A.aid AS id FROM qb_article A  WHERE A.yz=1  AND A.mid=\'0\'   ORDER BY A.list ASC LIMIT 3 ";s:4:"sql2";N;s:7:"colspan";s:1:"1";s:11:"content_num";s:2:"80";s:12:"content_num2";s:3:"120";s:8:"titlenum";s:2:"36";s:9:"titlenum2";s:2:"40";s:10:"titleflood";s:1:"0";s:10:"c_rolltype";s:1:"0";}', 'a:3:{s:5:"div_w";s:3:"179";s:5:"div_h";s:2:"60";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1290491643, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_18', 'code', 0, '	<div><a href="#" target="_blank">�ͻ���������</a></div>\r\n            <div><a href="#" target="_blank">��������</a></div>', 'a:4:{s:9:"html_edit";N;s:5:"div_w";s:2:"87";s:5:"div_h";s:2:"40";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1290491723, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_19', 'code', 0, '�̼���Ѷ', 'a:4:{s:9:"html_edit";N;s:5:"div_w";s:0:"";s:5:"div_h";s:0:"";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 0, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_2', 'pic', 0, 'a:4:{s:6:"imgurl";s:32:"label/1_20101123121155_ihnbv.jpg";s:7:"imglink";s:1:"#";s:5:"width";s:3:"115";s:6:"height";s:2:"60";}', 'a:3:{s:5:"div_w";s:3:"113";s:5:"div_h";s:2:"58";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1290488513, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_20', 'code', 0, '�����̼�', 'a:4:{s:9:"html_edit";N;s:5:"div_w";s:0:"";s:5:"div_h";s:0:"";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 0, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_21', 'code', 0, '���չ���', 'a:4:{s:9:"html_edit";N;s:5:"div_w";s:0:"";s:5:"div_h";s:0:"";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 0, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_22', 'code', 0, '����챨', 'a:4:{s:9:"html_edit";N;s:5:"div_w";s:0:"";s:5:"div_h";s:0:"";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 0, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_23', 'code', 0, '�̼�����', 'a:4:{s:9:"html_edit";N;s:5:"div_w";s:0:"";s:5:"div_h";s:0:"";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 0, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_25', 'member', 1, 'a:20:{s:9:"tplpart_1";s:637:"<table width="100%" border="0" cellspacing="0" cellpadding="0" class="listtable table1">\r\n                  <tr>\r\n                    <td class="img"><a href="$webdb[www_url]/member/homepage.php?uid=$uid" target="_blank"><img src="$picurl" onerror="this.src=\'$webdb[www_url]/images/default/noface.gif\'" width="45" height="45"/></a></td>\r\n                    <td class="word">\r\n                    	<div class="t"><a href="$webdb[blog_url]/index.php?uid=$uid" target="_blank">$username</a></div>\r\n                        <div class="c">ע������:$posttime</div>\r\n                    </td>\r\n                  </tr>\r\n                </table>";s:13:"tplpart_1code";s:637:"<table width="100%" border="0" cellspacing="0" cellpadding="0" class="listtable table1">\r\n                  <tr>\r\n                    <td class="img"><a href="$webdb[www_url]/member/homepage.php?uid=$uid" target="_blank"><img src="$picurl" onerror="this.src=\'$webdb[www_url]/images/default/noface.gif\'" width="45" height="45"/></a></td>\r\n                    <td class="word">\r\n                    	<div class="t"><a href="$webdb[blog_url]/index.php?uid=$uid" target="_blank">$username</a></div>\r\n                        <div class="c">ע������:$posttime</div>\r\n                    </td>\r\n                  </tr>\r\n                </table>";s:13:"tplpart_2code";s:0:"";s:7:"group_1";s:0:"";s:7:"group_2";s:0:"";s:13:"RollStyleType";s:0:"";s:7:"tplpath";s:0:"";s:6:"DivTpl";i:1;s:5:"fiddb";N;s:5:"stype";s:1:"4";s:2:"yz";s:3:"all";s:10:"timeformat";s:11:"Y-m-d H:i:s";s:5:"order";s:7:"regdate";s:3:"asc";s:4:"DESC";s:6:"levels";N;s:7:"rowspan";s:1:"4";s:3:"sql";s:157:" SELECT D.*,D.username AS title,D.icon AS picurl,D.introduce AS content,D.regdate AS posttime FROM qb_memberdata D  WHERE 1  ORDER BY D.regdate DESC LIMIT 4 ";s:7:"colspan";s:1:"1";s:8:"titlenum";s:2:"20";s:10:"titleflood";s:1:"0";}', 'a:3:{s:5:"div_w";s:3:"180";s:5:"div_h";s:3:"238";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1290494104, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_26', 'code', 0, '��Ա��̬', 'a:4:{s:9:"html_edit";N;s:5:"div_w";s:0:"";s:5:"div_h";s:0:"";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 0, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_3', 'pic', 0, 'a:4:{s:6:"imgurl";s:32:"label/1_20101123121111_d03vt.jpg";s:7:"imglink";s:1:"#";s:5:"width";s:3:"115";s:6:"height";s:2:"60";}', 'a:3:{s:5:"div_w";s:3:"113";s:5:"div_h";s:2:"60";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1290488521, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_30', 'mysql', 1, 'a:22:{s:13:"tplpart_1code";s:115:"<div class="list l$i"><span><a href="/f/list.php?fid=$fid" target="_blank">$title</a></span><em>{$NUM}��</em></div>";s:13:"tplpart_2code";s:0:"";s:3:"SYS";s:5:"mysql";s:13:"RollStyleType";s:0:"";s:7:"newhour";N;s:7:"hothits";N;s:7:"tplpath";s:0:"";s:6:"DivTpl";i:1;s:5:"stype";s:1:"4";s:7:"rowspan";s:2:"10";s:3:"sql";s:144:"SELECT COUNT( * ) AS NUM, fname AS title, fid FROM `qb_fenlei_content` WHERE city_id=\'$GLOBALS[city_id]\' GROUP BY fid ORDER BY NUM DESC LIMIT 10";s:7:"colspan";s:1:"1";s:8:"titlenum";s:2:"20";s:9:"titlenum2";s:2:"40";s:10:"titleflood";s:1:"0";s:5:"width";s:3:"250";s:6:"height";s:3:"187";s:11:"content_num";s:2:"80";s:12:"content_num2";s:3:"120";s:8:"rolltype";s:10:"scrollLeft";s:8:"rolltime";s:1:"3";s:11:"roll_height";s:2:"50";}', 'a:3:{s:5:"div_w";s:3:"176";s:5:"div_h";s:3:"220";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1292994548, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_31', 'code', 0, '����������Ŀ', 'a:4:{s:9:"html_edit";N;s:5:"div_w";s:0:"";s:5:"div_h";s:0:"";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 0, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_4', 'pic', 0, 'a:4:{s:6:"imgurl";s:32:"label/1_20101123131120_6g6lw.gif";s:7:"imglink";s:1:"#";s:5:"width";s:3:"176";s:6:"height";s:2:"60";}', 'a:3:{s:5:"div_w";s:2:"89";s:5:"div_h";s:2:"59";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1290488536, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_5', 'pic', 0, 'a:4:{s:6:"imgurl";s:32:"label/1_20101123131113_owuft.gif";s:7:"imglink";s:1:"#";s:5:"width";s:3:"176";s:6:"height";s:2:"60";}', 'a:3:{s:5:"div_w";s:3:"177";s:5:"div_h";s:2:"60";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1290491294, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_6', 'pic', 0, 'a:4:{s:6:"imgurl";s:32:"label/1_20101123131157_sdv3g.png";s:7:"imglink";s:1:"#";s:5:"width";s:3:"176";s:6:"height";s:2:"60";}', 'a:3:{s:5:"div_w";s:3:"176";s:5:"div_h";s:2:"58";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1290491303, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_7', 'Info_hy_', 1, 'a:28:{s:13:"tplpart_1code";s:327:"<div class="listcompany">\r\n			<a href="$webdb[www_url]/home/?uid=$uid" target="_blank" class="img"><img src="$picurl" onerror="this.src=\'$webdb[www_url]/images/default/nopic.jpg\'" width="120" height="90" border="0"/></a> \r\n              <a href="$webdb[www_url]/home/?uid=$uid" target="_blank" class="t">$title</a>\r\n			  </div>";s:13:"tplpart_2code";s:0:"";s:3:"SYS";s:7:"company";s:7:"typefid";N;s:5:"width";s:3:"250";s:6:"height";s:3:"187";s:8:"rolltype";s:10:"scrollLeft";s:8:"rolltime";s:1:"3";s:11:"roll_height";s:2:"50";s:11:"content_num";s:2:"80";s:7:"newhour";s:2:"24";s:7:"hothits";s:2:"30";s:7:"tplpath";s:0:"";s:6:"DivTpl";i:1;s:5:"fiddb";N;s:8:"moduleid";N;s:5:"stype";s:1:"p";s:2:"yz";s:3:"all";s:8:"renzheng";s:3:"all";s:10:"timeformat";s:11:"Y-m-d H:i:s";s:5:"order";s:3:"rid";s:3:"asc";s:4:"DESC";s:6:"levels";s:3:"all";s:7:"rowspan";s:2:"10";s:3:"sql";s:91:"SELECT * FROM qb_hy_company  WHERE city_id=\'$GLOBALS[city_id]\'  ORDER BY rid DESC LIMIT 10 ";s:7:"colspan";s:1:"1";s:8:"titlenum";s:2:"24";s:10:"titleflood";s:1:"0";}', 'a:3:{s:5:"div_w";s:3:"762";s:5:"div_h";s:3:"256";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1292061082, 0, 16, 0, 0, 'default');
INSERT INTO `qb_label` (`lid`, `name`, `ch`, `chtype`, `tag`, `type`, `typesystem`, `code`, `divcode`, `hide`, `js_time`, `uid`, `username`, `posttime`, `pagetype`, `module`, `fid`, `if_js`, `style`) VALUES ('', '', 0, 0, 'hy_8', 'article', 1, 'a:32:{s:13:"tplpart_1code";s:65:"<div class="list"><a href="$url" target="_blank">$title</a></div>";s:13:"tplpart_2code";s:543:"<table width="100%" border="0" cellspacing="0" cellpadding="0">\r\n                  <tr>\r\n                    \r\n                <td class="img"><a href="$url" target="_blank"><img src="$picurl" onerror="this.src=\'$webdb[www_url]/images/default/nopic.jpg\'" width="60" height="45" border="0"/></a></td>\r\n                    <td>\r\n                    	<div class="t"><a href="$url" target="_blank">$title</a></div>\r\n                        <div class="c">$content</div>\r\n                    </td>\r\n                  </tr>\r\n                </table>";s:3:"SYS";s:7:"artcile";s:13:"RollStyleType";s:0:"";s:8:"rolltype";s:10:"scrollLeft";s:8:"rolltime";s:1:"3";s:11:"roll_height";s:2:"50";s:5:"width";s:3:"250";s:6:"height";s:3:"187";s:7:"newhour";s:2:"24";s:7:"hothits";s:3:"100";s:7:"amodule";s:1:"0";s:7:"tplpath";s:24:"/common_zh_pic/zh_pc.jpg";s:6:"DivTpl";i:1;s:5:"fiddb";N;s:5:"stype";s:1:"t";s:2:"yz";s:1:"1";s:7:"hidefid";N;s:10:"timeformat";s:11:"Y-m-d H:i:s";s:5:"order";s:6:"A.list";s:3:"asc";s:4:"DESC";s:6:"levels";s:3:"all";s:7:"rowspan";s:1:"6";s:3:"sql";s:163:" SELECT A.*,A.aid AS id,R.content FROM qb_article A LEFT JOIN qb_reply R ON A.aid=R.aid   WHERE A.yz=1  AND A.mid=\'0\'   AND R.topic=1 ORDER BY A.list DESC LIMIT 7 ";s:4:"sql2";s:175:" SELECT A.*,A.aid AS id,R.content FROM qb_article A LEFT JOIN qb_reply R ON A.aid=R.aid  WHERE A.yz=1  AND A.mid=\'0\'  AND A.ispic=1 AND R.topic=1 ORDER BY A.list DESC LIMIT 1 ";s:7:"colspan";s:1:"1";s:11:"content_num";s:2:"80";s:12:"content_num2";s:2:"30";s:8:"titlenum";s:2:"28";s:9:"titlenum2";s:2:"26";s:10:"titleflood";s:1:"0";s:10:"c_rolltype";s:1:"0";}', 'a:3:{s:5:"div_w";s:3:"173";s:5:"div_h";s:3:"207";s:11:"div_bgcolor";s:0:"";}', 0, 0, 1, 'admin', 1290490669, 0, 16, 0, 0, 'default');
  

DROP TABLE IF EXISTS `qb_hy_company`;
CREATE TABLE `qb_hy_company` (
  `rid` mediumint(7) NOT NULL auto_increment,
  `title` varchar(200) NOT NULL default '',
  `host` varchar(32) NOT NULL default '',
  `fname` varchar(100) NOT NULL default '',
  `uid` mediumint(7) NOT NULL default '0',
  `username` varchar(32) NOT NULL default '',
  `renzheng` tinyint(1) NOT NULL default '0',
  `is_agent` tinyint(1) NOT NULL default '0',
  `is_vip` tinyint(1) NOT NULL default '0',
  `posttime` int(10) NOT NULL default '0',
  `list` int(10) NOT NULL default '0',
  `listorder` int(10) NOT NULL default '0',
  `picurl` varchar(255) NOT NULL default '',
  `gz` varchar(248) NOT NULL default '',
  `yz` tinyint(1) NOT NULL default '0',
  `yzer` varchar(32) NOT NULL default '',
  `yztime` int(10) NOT NULL default '0',
  `hits` int(10) NOT NULL default '0',
  `levels` tinyint(2) NOT NULL default '0',
  `levelstime` int(10) NOT NULL default '0',
  `lastview` int(10) NOT NULL default '0',
  `content` text NOT NULL,
  `province_id` mediumint(7) NOT NULL default '0',
  `city_id` mediumint(7) NOT NULL default '0',
  `zone_id` mediumint(7) NOT NULL default '0',
  `street_id` mediumint(7) NOT NULL default '0',
  `qy_cate` varchar(32) NOT NULL default '',
  `qy_saletype` varchar(48) NOT NULL default '',
  `qy_regmoney` int(10) NOT NULL default '0',
  `qy_createtime` varchar(64) NOT NULL default '',
  `qy_regplace` varchar(128) NOT NULL default '',
  `qy_address` varchar(248) NOT NULL default '',
  `qy_postnum` varchar(8) NOT NULL default '',
  `qy_pro_ser` varchar(248) NOT NULL default '',
  `my_buy` varchar(248) NOT NULL default '',
  `my_trade` varchar(32) NOT NULL default '',
  `qy_contact` varchar(16) NOT NULL default '',
  `qy_contact_zhiwei` varchar(16) NOT NULL default '',
  `qy_contact_sex` int(1) NOT NULL default '1',
  `qy_contact_tel` varchar(248) NOT NULL default '',
  `qy_contact_mobile` varchar(248) NOT NULL default '',
  `qy_contact_fax` varchar(248) NOT NULL default '',
  `qy_contact_email` varchar(248) NOT NULL default '',
  `qy_website` varchar(248) NOT NULL default '',
  `qq` varchar(248) NOT NULL default '',
  `msn` varchar(248) NOT NULL default '',
  `skype` varchar(248) NOT NULL default '',
  `ww` varchar(248) NOT NULL default '',
  `bd_pics` varchar(248) NOT NULL default '',
  `toptime` int(10) NOT NULL default '0',
  `if_homepage` tinyint(4) NOT NULL default '0',
  `permit_pic` varchar(100) NOT NULL default '',
  `guo_tax_pic` varchar(100) NOT NULL default '',
  `di_tax_pic` varchar(100) NOT NULL default '',
  `organization_pic` varchar(100) NOT NULL default '',
  `idcard_pic` varchar(100) NOT NULL default '',
  `gg_maps` varchar(50) NOT NULL default '',
  `dianping` mediumint(7) NOT NULL default '0',
  `dianpingtime` int(10) NOT NULL default '0',
  PRIMARY KEY  (`rid`),
  KEY `uid` (`uid`),
  KEY `levels` (`levels`,`posttime`),
  KEY `yz` (`yz`,`posttime`),
  KEY `toptime` (`toptime`),
  KEY `city_id` (`city_id`,`levels`,`levelstime`),
  KEY `renzheng` (`renzheng`),
  KEY `host` (`host`)
) TYPE=MyISAM AUTO_INCREMENT=33 ;

#
# �������е����� `qb_hy_company`
#

INSERT INTO `qb_hy_company` VALUES (17, '����Э������Ƽ����޹�˾', '', '���Ƹ�,����,����,�Ȱ��,������,����,�޷��,H�͸�,����,������', 1, 'admin', 3, 0, 0, 1282284007, 0, 0, 'homepage/logo/1/1_20101102091111_ybuoq.gif', '', 1, '', 1282284007, 584, 1, 1282719160, 0, '&nbsp;&nbsp;&nbsp;&nbsp;�벩CMS���й����ȵĿ�ԴCMSƽ̨������ṩ�̣�����רע�ڻ�����������ƽ̨����������������з�����˾��Ա70%����Ϊ������Ա��ӵ���й�רҵ��WebӦ��ƽ̨�����з��Ŷӣ��벩CMSӵ�й㷺�����Ӱ������Ϊ����Ӧ����㷺��ϵͳ֮һ��Ҳ���й��Ϸ�PHP�������Ŀ�Դϵͳ�ṩ����<br /><br /><a style="FONT-WEIGHT: bold; FONT-SIZE: 14px; COLOR: #990000">��չ����</a><br />&nbsp;&nbsp;&nbsp;&nbsp;��2003��10���벩CMS V1.0�����������γ�������վ����Vϵ�к�����ý�屨���Ż����������������Sharpϵ�У����Sϵ�У���Sϵ����ǧ�򼶺�������Ӧ��ý�屨��������վȺӦ�����γ����õ�Ʒ�ƿڱ����ԡ�����+ϵͳ+ģ��+������ܹ���ϵ����Ϊ���ڸ����ܡ�ģ�黯�Ŀ�ԴPHPϵͳ���漰������������ý�������Ż���������ҵ��Ϣ����վȺϵͳ����������B2B����ҵ�ڲ�OA�Ⱥ������ݸ߶˻�����Ӧ�ã���Ϊ��ʮ�����û��ṩ��Ӧ��ƽ̨�� ', 0, 1, 0, 0, '���˶�����ҵ', '������', 100, '2007-10-02', '�㶫ʡ�����������', '1111', '000222', 'CMS��վ���� ����������� �ط��Ż����� ������Ϣϵͳ', 'PHP�˲�', '���롢���Լ��������', '����', '�ܲ�', 0, '020', '15920222222', '0106665555', '0342@fdsg.cn', 'http://112', '65284322', '125@erw.cn', '', '1451', '', 0, 1, 'company/renzheng/1_20101016111001_krbfo.jpg', 'company/renzheng/1_20101016111026_ienzi.jpg', 'company/renzheng/1_20101016111030_dbedh.jpg', 'company/renzheng/1_20101016111032_g2s7m.jpg', 'company/renzheng/1_20101016111035_nlvue.jpg', '39.95231950026053,116.51824951171875', 4, 1290495942);
INSERT INTO `qb_hy_company` VALUES (22, '���ж���ʵҵ��˾', '', '���Ƹ�,����,������,ģ�߰�,�޷��,H�͸�,����,������', 27, 'test1', 0, 0, 0, 1288661741, 0, 0, 'homepage/logo/1/27_20101102091141_e1uuj.jpg', '', 1, '', 1288661741, 5, 1, 1288663982, 0, '    ��˾������1992�꣬ռ��5000ƽ���ף��������8900ƽ���ף��Ը��ӻ�е����ľ���ģ�ͼ���������Ϊ��,�����жͼ��Ļ�е�ӹ���Ӳ�ʺϽ𹤾ߵ�ǥ����   ��Ӧ��е�������Ħ�䣩�ͼ������ص�������𹤾ߡ�ǥ��Ӳ�ʺϽ𹤾ߡ����泵���ߡ�G�ּС�����Ħ�г����ּ��������ͼ���', 0, 1, 0, 0, '���徭Ӫ', '������', 999, '2010-11-03', '�㶫ʡ', '', '', '�ֲ�', '��', '��е����ҵ�豸', '����', '', 0, '020555444', '', '', 'gfds@afds.cn', '', '', '', '', '', '', 0, 1, '', '', '', '', '', '', 0, 0);
INSERT INTO `qb_hy_company` VALUES (23, '������۴����Ϫ������𹤾߳�', '', '���Ƹ�,����,������,����,�޷��,H�͸�,����,������,��ʯ,����', 28, 'test2', 0, 0, 0, 1288662180, 0, 0, 'homepage/logo/1/logo_28_20101102091100_6jeu7.jpg', '', 1, '', 1288662180, 1, 1, 1288663984, 0, '    ������һ��ӵ��ʮ������ʷ��רҵ����԰�ֹ��ߵ�Ƭ��ϵ����֦����Ƭ���ĳ��� ��  ���������Ƽ�������ͨ������������Ա�Ŀ̿๥�أ��ֿ������������Ƚ�ˮƽ�ĸ�Ӳ�ȣ������Ե�ϵ�в�Ʒ����������˹��ڵ�Ƭ����������ûӲ�ȣ���Ӳ��û���Եļ������֣��������˵�Ƭ��ʹ�������� �õ��ܶ��������̵��׿ϣ�ֱ�ӳ���ŷ�޺�������  ������Ʒ�ɽ��ϵ���Ʒ��������ȫ�߲�Ʒһ���������������������ӹ������������ܵõ��������󻯡��ֽ߳����������磬���������ǽ������������ڴ����Ĺ��١�', 0, 1, 0, 0, '���徭Ӫ', '������', 900, '2010-11-13', '����', '', '', '����', '��', '��е����ҵ�豸', 'ţ��', '', 0, '0205544447', '', '', 'fds@ds.cn', '', '', '', '', '', '', 0, 1, '', '', '', '', '', '', 0, 0);
INSERT INTO `qb_hy_company` VALUES (24, '�Ͼ�����ֽ��ģ�����޹�˾', '', '���Ƹ�,����,������,����,�޷��,H�͸�,����,������,��ʯ,����', 29, 'test3', 0, 0, 0, 1288662327, 0, 0, 'homepage/logo/1/29_20101102091127_bcl6e.jpg', '', 1, '', 1288662327, 2, 1, 1288663984, 0, '   �Ͼ�����ֽ��ģ�����޹�˾�����й���װ�¼�������������˾�����齨���ɣ��������°�����˾��ֽ��ģ�ܼ����о����豸���졢��Ʒ�ƹ��רҵ��˾�����ж��������ʸ񡢿ơ�����óһ�廯�������͹ɷ�����ҵ��   ��˾Χ��ֽ��ģ�ܼ����������м�����������ģ�����ġ���е�ӹ�������Ʒʾ���������̰�װ���Ȳ��ţ�����ֽ�ܼ���������רҵ���̼�����Առ35%���߼�����ʦ3��(����һ������ֽ��ģ�ܷ��������⹱�ס����ܹ���Ժ����������䷢֤��)������ʦ8�ˣ����������ۺ���ʩ��ȫ�����ж��������Ŀ����о�������ʾ�����������۵ľ���ʵ�塣���ѹ�˾�����˰�����˾��������˲ţ�ȫ��̳С������о���ȫ�濪����ֽ��ģ�ܼ�������ˣ���ֽ��ģ�����򱣳��˼�����ȫ�桢�豸���Ƚ���Ʒ������ȫ�����ƣ�', 0, 1, 0, 0, '���徭Ӫ', '������', 600, '2010-11-06', '�Ϻ�', '', '', '����Ļǽ', '����', '��е����ҵ�豸', '����', '', 0, '0204448554', '', '', 'fdsg@sda.cn', '', '', '', '', '', '', 0, 1, '', '', '', '', '', '', 0, 0);
INSERT INTO `qb_hy_company` VALUES (25, '�Ϻ���������������޹�˾', '', '���Ƹ�,����,����,�Ȱ��,������,����,�޷��,H�͸�,����,������', 30, 'test4', 0, 0, 0, 1288662567, 0, 0, 'homepage/logo/1/30_20101102091127_ibn2r.jpg', '', 1, '', 1288662567, 1, 1, 1288663985, 0, '    �㽭˫������������޹�˾�����й�רҵ�����������ϵ�в�Ʒ����ͷ��ҵ���㽭ʡ��AAA�����غ�ͬ����������ҵ���㽭ʡ���¼�����ҵ��ISO9001��QS9000������ϵ��֤��λ�� ��˾��һ֧ǿ�����²�Ʒ�з���������Ƶ�������ʩ������Ϊ�㽭ʡ�������ġ���Ʒ50%���ϳ��ڵ¹�����������ձ����¼��¡����������ô�̨���20������Һ͵����� �Ѿ����������õĹ���������   ��˾Ŀǰ��Ҫ��Ʒ�У�SFϵ����������С�JF˫������С�FB��ͭ��С�JDB��Ƕ��������е�12��ϵ��16000���Ʒ�֣���Ӧ�����¡����ٵȸ��ֳ��ϵ�ʹ�á���˾�����Ƶļ���豸����֤100%�ĺϸ��Ʒ�ṩ���˿ͣ���ÿλ��ZOB��', 0, 1, 0, 0, '���徭Ӫ', '������', 600, '2010-11-04', '�Ϻ�', '', '', '����', '��', '��е����ҵ�豸', '����', '', 0, '02054477877', '', '', 'fds@sda.cn', '', '', '', '', '', '', 0, 1, '', '', '', '', '', '', 0, 0);
INSERT INTO `qb_hy_company` VALUES (26, '��������������޹�˾', '', '���Ƹ�,����,����,������,����,H�͸�,����,������,��ʯ', 31, 'test5', 0, 0, 0, 1288662786, 0, 0, 'homepage/logo/1/31_20101102091106_ijzou.jpg', '', 1, '', 1288662786, 0, 1, 1288663985, 0, '    ��˾��רҵ����������𡢻���������ܽ���Ʒ�����̼��Ȳ�Ʒ�ĳ�����������ҵ�����й����翪��DIY����������ϵ�в�Ʒ��֪����ҵ����ҵ��������ʼ�ռ��������Ч����֮·��ǿ��ȫ��������Ч��Ӫ��ע����ҵ����Ͳ�Ʒ���󣬲�ƷԶ��������أ���ù�����ͻ��������������ڷ׷����ӵ��г������У�ʼ�ռ��س��š����ڴ��¡�  ��˾��������չ������г���չ���ƣ������졢������������𡢱�׼�����Ǳ�׼�������̼����ܽ���Ʒ����������Ȳ�Ʒ����Ϊ�����г���飬����DIY���������װ���γ�30��ϵ�н�1000��Ʒ�֣�ƾ���ϸ���������ͳ��ڵ���������Ʒ�ڹ����г���������ŷ�����������г����γ����õ�������ͷ���г�ռ��', 0, 1, 0, 0, '���徭Ӫ', '������', 300, '2010-11-06', '����', '', '', '��', '�Ҳ�', '��е����ҵ�豸', '����', '', 0, '0204544744', '', '', 'fds@fsa.cn', '', '', '', '', '', '', 0, 1, '', '', '', '', '', '', 0, 0);
INSERT INTO `qb_hy_company` VALUES (27, '��������������綯���߳�', '', '���Ƹ�,����,������,����,�޷��,H�͸�,����,������,��ʯ,����', 32, 'test6', 0, 0, 0, 1288662947, 0, 0, 'homepage/logo/1/32_20101102091147_9pqhn.jpg', '', 1, '', 1288662947, 1, 1, 1288663986, 0, '  �㽭˫������������޹�˾�����й�רҵ�����������ϵ�в�Ʒ����ͷ��ҵ���㽭ʡ��AAA�����غ�ͬ����������ҵ���㽭ʡ���¼�����ҵ��ISO9001��QS9000������ϵ��֤��λ�� ��˾��һ֧ǿ�����²�Ʒ�з���������Ƶ�������ʩ������Ϊ�㽭ʡ�������ġ���Ʒ50%���ϳ��ڵ¹�����������ձ����¼��¡����������ô�̨���20������Һ͵����� �Ѿ����������õĹ���������   ��˾Ŀǰ��Ҫ��Ʒ�У�SFϵ����������С�JF˫������С�FB��ͭ��С�JDB��Ƕ��������е�12��ϵ��16000���Ʒ�֣���Ӧ�����¡����ٵȸ��ֳ��ϵ�ʹ�á���˾�����Ƶļ���豸����֤100%�ĺϸ��Ʒ�ṩ���˿ͣ���ÿλ��ZOB���Ĺ˿����⡣   �����ϸ��� ISO-TS16949 ��������ϵ����ԭ����Ͷ�롢ģ�����졢���Ρ��սᡭ��ֱ������ȫ���̼��Կ��ơ����������Ƚ����Լ죬רְ������Ա����Ѳ�ؼ죬ÿ�����򶼽����ϸ�ѹأ�ÿ�����������оݿɲ顣ͬʱ���Ƚ��ļ���豸��֤�˲�Ʒ100%�ĳ����ϸ��ʣ�', 0, 1, 0, 0, '���徭Ӫ', '������', 300, '2010-11-04', '', '', '', '', '', '��е����ҵ�豸', '����', '', 0, '020544777', '', '', 'fda@dsa.cn', '', '', '', '', '', '', 0, 1, '', '', '', '', '', '', 0, 0);
INSERT INTO `qb_hy_company` VALUES (28, '��ͼ����Ƽ������ڣ����޹�˾', '', '���Ƹ�,����,������,����,�޷��,H�͸�,����,������,��ʯ,����', 33, 'test7', 0, 0, 0, 1288663129, 0, 0, 'homepage/logo/1/33_20101102091149_ofqqf.jpg', '', 1, '', 1288663129, 1, 1, 1288663987, 0, '   רҵ����һ�廯��ӡ��ӡˢ�Ĳ���ƿ�������������̶�����ҵ����˾���ж����Ľ�����Ȩ���ṩ�˺�����ֱ�����ɵ�ó��ƽ̨����˾ӵ��5000ƽ���׵��ִ������������ȫ��յ��޳������¡���ʪ���������䡣�����豸ȫ�����õ��Ի��Զ����ơ��Ƚ��������������̣���֤�˲�Ʒ׿Խ��Ʒ�ʣ���������2003��ͨ����ISO9001-2000����������ϵ��֤����˾ʼ����ѭ���Կͻ�Ϊ������Ʒ��ȡʤ���Է������ȡ��ķ�չ�����ֲ�Ʒ��רҵ����ϸ�»��ľ�Ӫģ�⡣ͨ������Ŭ������и׷�󣬳������ͻ��ĸ��Ի�Ҫ��Ӯ���˿ͻ��ĳ���Ͽ���϶���ʹ��˾��Ϊ����ͬ�������֪���ȵĹ�Ӧ�̡�', 0, 1, 0, 0, '���徭Ӫ', '������', 600, '2010-11-13', '����', '', '', '', '', '��е����ҵ�豸', '����', '', 0, '02087744454', '', '', 'dfsafs@dsa.cn', '', '', '', '', '', '', 0, 1, '', '', '', '', '', '', 0, 0);
INSERT INTO `qb_hy_company` VALUES (29, '�����д���ʵҵ��չ���޹�˾', '', '���Ƹ�,����,������,����,�޷��,H�͸�,����,������,��ʯ,����', 34, 'test8', 0, 0, 0, 1288663299, 0, 0, 'homepage/logo/1/34_20101102101139_apfdl.jpg', '', 1, '', 1288663299, 5, 1, 1288663987, 0, '    һ�Ҽ���Ʒ��������ơ�������������һ�壬���������𡢵��ɡ����ѵ������з������������ۣ�ӵ�н����ھ�ӪȨ�ĸ߿Ƽ���Ӫ��ҵ����˾ʵ���ۺ��з��������죬���ù����Ƚ��Ĺ���ģʽ����Ʒ������Ӳ�������������ƣ��ۺ�������ʡ� ��������˾��ӵ�г������600ƽ���ף��̶��ʲ�500����Ԫ��Ա��60���ˣ����й��̼�����Ա��10�ˣ������۶�500����Ԫ����˾��ͨ��ISO9001-2000������ϵ��֤������Ŀǰ���ƹ�ISO/TS16949-2002��ϵ�����С���һ���걸�Ĳ�Ʒ��������豸�ͼ���Ա���飬ȷ����Ʒ�������ȶ��ɿ������û����нϸߵ����������� ', 0, 1, 0, 0, '���徭Ӫ', '������', 100, '', '������', '', '', '���', '����', '��е����ҵ�豸', '����', '', 0, '02054787741', '', '', 'fsgfd@dsa.cn', '', '', '', '', '', '', 0, 1, '', '', '', '', '', '', 0, 0);
INSERT INTO `qb_hy_company` VALUES (30, '�������������������ι�˾', '', '���Ƹ�,����,������,����,�޷��,H�͸�,����,������,��ʯ,����', 35, 'test9', 0, 0, 0, 1288663462, 0, 0, 'homepage/logo/1/35_20101102101122_jvufs.jpg', '', 1, '', 1288663462, 1, 1, 1288663988, 0, '    �������������������ι�˾�ش��㽭ʡ�����أ������Ϻ�80������ຼ��65������ڷ羰�������ϱ����羰�������������������뻦�����ٹ�·������ڴ�7���ˮ½��ͨʮ�ֱ�������˾��ȫ��Ա��ʮ��������ĬĬ�����£�������ӵ���ʲ�300����Ԫ��ռ�����30000ƽ���ף����г���20000��ƽ���ף����������豸120��̨�ף�����ȫ��������豸���Ƚ�������������ϵ����Ҫ�豸��250KG��Ƶ��¯3�׼���ģ����������ˮ��������10�ּ����ּ��ȴ���¯������������ӹ��豸80��̨��Ŀǰ��ҵԱ��130�������и��๤�̼�����Ա38��', 0, 1, 0, 0, '���徭Ӫ', '������', 300, '2010-11-06', '�㽭ʡ������', '', '', '��', '����', '��е����ҵ�豸', '����', '', 0, '02045789654', '', '', 'safsa@dfsa.cn', '', '', '', '', '', '', 0, 1, '', '', '', '', '', '', 0, 0);
INSERT INTO `qb_hy_company` VALUES (31, '��ݸ�л����������������޹�˾', '', '���Ƹ�,����,������,����,�޷��,H�͸�,����,������,��ʯ,����', 36, 'test10', 0, 0, 0, 1288663617, 0, 0, 'homepage/logo/1/36_20101102101157_jugc3.jpg', '', 1, '', 1288663617, 1, 1, 1288663988, 0, '     ��һ�Ҽ��������з������ۺͷ�����һ����ۺ��͵���������ҵ����˾λ�ڹ㶫ʡ��ݸ�лƽ��򣬾�ݸ����ٹ�·3�����ݸ��վ10�������ң���ͨʮ�ֱ�ݡ���˾ռ��2000ƽ���ף�ӵ��ȫ��һ��������������豸����Ŀǰ������ѡ����ʮ�������µ�CNC�����Զ����ɻ��������������߾���С0.08MM-10MM���Ƕ�ݸ���׼�ӵ�п�������10mm�����߾���CNC���ɻ�е�����ɴ�������ʽ�����ػ�¯����ϴ�������ɼ���豸������ȫ���磺����ԪͶӰ�ǡ�Ť�����Ի���ѹ�������Ի���������Ի��ȣ�ȫ����Ч�ؿ����˵��ɵ�������������������Ʒ�и��ྫ�ܵ��ɣ�������í������˿������ѹ������Ʒ�㷺���ڵ��ӡ���������ߡ����ߡ��ľߡ�ͯ�������г�����Ʒ������Ʒ�������ߡ����������ӡ�����칫�豸�������豸�����ཻͨ���ߵȡ�����˾�������ĵ��ɲ�Ʒ�磺��������ɡ����ϵ��ɡ��������ɡ���λ���ɡ����浯�ɵ� ������������ҵ��', 0, 1, 0, 0, '���徭Ӫ', '������', 350, '2010-11-04', '��ݸ��', '', '', '�ֲ�', '��', '��е����ҵ�豸', '����', '', 0, '02054484444', '', '', 'fsdafd@sa.cn', '', '', '', '', '', '', 0, 1, '', '', '', '', '', '', 0, 0);
INSERT INTO `qb_hy_company` VALUES (32, '���ݽ��Ҷ������Ʒ���޹�˾', '', '���Ƹ�,����,������,����,�޷��,H�͸�,����,������,��ʯ,����', 37, 'test11', 0, 0, 0, 1288663816, 0, 0, 'homepage/logo/1/37_20101102101116_xmwaa.jpg', '', 1, '', 1288663816, 32, 1, 1288663989, 0, '    ǰ�����ݺ�������棩���ɳ�������רҵ�������桢���浯�����ĳ��ҡ�����ʮ���꣬һ��һ��ӡ����չ�����죬ӵ�г�����ǧ��ƽ���ף������Ƚ��ĵ��ɡ����������߼�ѹ���豸�� �������ճ�Ⱥ�������������ˣ���Ʒ�����о���Ա ���ϸ��������ϵ���ϸ���ISO9001��2000������ϵ��ISO14000������ϵ��׼���У���Ʒͨ���й�����������֤������CFR1633��׼��Ӣ��BS5852��׼��Ϊ�������缶Ʒ�Ʋ�Ʒ�м�ʵ��֤��Ŀǰ�����Ҷ��˾�����Ĵ��桢����о��Ʒ�ɾ�ѹ����װ��������������ؿ��̵����估�ִ���ƾ������������浯�ɳ���������صľ��飬��ȫ�������ƴ���֮�������������о���Ա�����о���ƣ���������й�����ĸ߶�Ʒ�ƴ��桪�������Ҷ��ϵ�в�Ʒ��', 0, 1, 0, 0, '���徭Ӫ', '������', 200, '2010-11-04', '����', '', '', '����', '������', '��е����ҵ�豸', '����', '', 0, '0205447777', '', '', 'dfsaf@dsa.cn', '', '', '', '', '', '', 0, 1, '', '', '', '', '', '', 0, 0);

# --------------------------------------------------------

#
# ��Ľṹ `qb_hy_company_fid`
#

DROP TABLE IF EXISTS `qb_hy_company_fid`;
CREATE TABLE `qb_hy_company_fid` (
  `uid` mediumint(7) unsigned NOT NULL default '0',
  `fid` mediumint(7) unsigned NOT NULL default '0',
  PRIMARY KEY  (`uid`,`fid`)
) TYPE=MyISAM;

#
# �������е����� `qb_hy_company_fid`
#

INSERT INTO `qb_hy_company_fid` VALUES (1, 11);
INSERT INTO `qb_hy_company_fid` VALUES (1, 12);
INSERT INTO `qb_hy_company_fid` VALUES (1, 21);
INSERT INTO `qb_hy_company_fid` VALUES (1, 22);
INSERT INTO `qb_hy_company_fid` VALUES (1, 33);
INSERT INTO `qb_hy_company_fid` VALUES (1, 46);
INSERT INTO `qb_hy_company_fid` VALUES (1, 59);
INSERT INTO `qb_hy_company_fid` VALUES (1, 73);
INSERT INTO `qb_hy_company_fid` VALUES (1, 87);
INSERT INTO `qb_hy_company_fid` VALUES (1, 105);
INSERT INTO `qb_hy_company_fid` VALUES (27, 11);
INSERT INTO `qb_hy_company_fid` VALUES (27, 21);
INSERT INTO `qb_hy_company_fid` VALUES (27, 33);
INSERT INTO `qb_hy_company_fid` VALUES (27, 48);
INSERT INTO `qb_hy_company_fid` VALUES (27, 59);
INSERT INTO `qb_hy_company_fid` VALUES (27, 73);
INSERT INTO `qb_hy_company_fid` VALUES (27, 87);
INSERT INTO `qb_hy_company_fid` VALUES (27, 105);
INSERT INTO `qb_hy_company_fid` VALUES (28, 11);
INSERT INTO `qb_hy_company_fid` VALUES (28, 21);
INSERT INTO `qb_hy_company_fid` VALUES (28, 33);
INSERT INTO `qb_hy_company_fid` VALUES (28, 46);
INSERT INTO `qb_hy_company_fid` VALUES (28, 59);
INSERT INTO `qb_hy_company_fid` VALUES (28, 73);
INSERT INTO `qb_hy_company_fid` VALUES (28, 87);
INSERT INTO `qb_hy_company_fid` VALUES (28, 105);
INSERT INTO `qb_hy_company_fid` VALUES (28, 119);
INSERT INTO `qb_hy_company_fid` VALUES (28, 136);
INSERT INTO `qb_hy_company_fid` VALUES (29, 11);
INSERT INTO `qb_hy_company_fid` VALUES (29, 21);
INSERT INTO `qb_hy_company_fid` VALUES (29, 33);
INSERT INTO `qb_hy_company_fid` VALUES (29, 46);
INSERT INTO `qb_hy_company_fid` VALUES (29, 59);
INSERT INTO `qb_hy_company_fid` VALUES (29, 73);
INSERT INTO `qb_hy_company_fid` VALUES (29, 87);
INSERT INTO `qb_hy_company_fid` VALUES (29, 105);
INSERT INTO `qb_hy_company_fid` VALUES (29, 119);
INSERT INTO `qb_hy_company_fid` VALUES (29, 136);
INSERT INTO `qb_hy_company_fid` VALUES (30, 11);
INSERT INTO `qb_hy_company_fid` VALUES (30, 12);
INSERT INTO `qb_hy_company_fid` VALUES (30, 21);
INSERT INTO `qb_hy_company_fid` VALUES (30, 22);
INSERT INTO `qb_hy_company_fid` VALUES (30, 33);
INSERT INTO `qb_hy_company_fid` VALUES (30, 46);
INSERT INTO `qb_hy_company_fid` VALUES (30, 59);
INSERT INTO `qb_hy_company_fid` VALUES (30, 73);
INSERT INTO `qb_hy_company_fid` VALUES (30, 87);
INSERT INTO `qb_hy_company_fid` VALUES (30, 105);
INSERT INTO `qb_hy_company_fid` VALUES (31, 11);
INSERT INTO `qb_hy_company_fid` VALUES (31, 12);
INSERT INTO `qb_hy_company_fid` VALUES (31, 21);
INSERT INTO `qb_hy_company_fid` VALUES (31, 33);
INSERT INTO `qb_hy_company_fid` VALUES (31, 46);
INSERT INTO `qb_hy_company_fid` VALUES (31, 73);
INSERT INTO `qb_hy_company_fid` VALUES (31, 87);
INSERT INTO `qb_hy_company_fid` VALUES (31, 105);
INSERT INTO `qb_hy_company_fid` VALUES (31, 119);
INSERT INTO `qb_hy_company_fid` VALUES (32, 11);
INSERT INTO `qb_hy_company_fid` VALUES (32, 21);
INSERT INTO `qb_hy_company_fid` VALUES (32, 33);
INSERT INTO `qb_hy_company_fid` VALUES (32, 46);
INSERT INTO `qb_hy_company_fid` VALUES (32, 59);
INSERT INTO `qb_hy_company_fid` VALUES (32, 73);
INSERT INTO `qb_hy_company_fid` VALUES (32, 87);
INSERT INTO `qb_hy_company_fid` VALUES (32, 105);
INSERT INTO `qb_hy_company_fid` VALUES (32, 119);
INSERT INTO `qb_hy_company_fid` VALUES (32, 136);
INSERT INTO `qb_hy_company_fid` VALUES (33, 11);
INSERT INTO `qb_hy_company_fid` VALUES (33, 21);
INSERT INTO `qb_hy_company_fid` VALUES (33, 33);
INSERT INTO `qb_hy_company_fid` VALUES (33, 46);
INSERT INTO `qb_hy_company_fid` VALUES (33, 59);
INSERT INTO `qb_hy_company_fid` VALUES (33, 73);
INSERT INTO `qb_hy_company_fid` VALUES (33, 87);
INSERT INTO `qb_hy_company_fid` VALUES (33, 105);
INSERT INTO `qb_hy_company_fid` VALUES (33, 119);
INSERT INTO `qb_hy_company_fid` VALUES (33, 136);
INSERT INTO `qb_hy_company_fid` VALUES (34, 11);
INSERT INTO `qb_hy_company_fid` VALUES (34, 21);
INSERT INTO `qb_hy_company_fid` VALUES (34, 33);
INSERT INTO `qb_hy_company_fid` VALUES (34, 46);
INSERT INTO `qb_hy_company_fid` VALUES (34, 59);
INSERT INTO `qb_hy_company_fid` VALUES (34, 73);
INSERT INTO `qb_hy_company_fid` VALUES (34, 87);
INSERT INTO `qb_hy_company_fid` VALUES (34, 105);
INSERT INTO `qb_hy_company_fid` VALUES (34, 119);
INSERT INTO `qb_hy_company_fid` VALUES (34, 136);
INSERT INTO `qb_hy_company_fid` VALUES (35, 11);
INSERT INTO `qb_hy_company_fid` VALUES (35, 21);
INSERT INTO `qb_hy_company_fid` VALUES (35, 33);
INSERT INTO `qb_hy_company_fid` VALUES (35, 46);
INSERT INTO `qb_hy_company_fid` VALUES (35, 59);
INSERT INTO `qb_hy_company_fid` VALUES (35, 73);
INSERT INTO `qb_hy_company_fid` VALUES (35, 87);
INSERT INTO `qb_hy_company_fid` VALUES (35, 105);
INSERT INTO `qb_hy_company_fid` VALUES (35, 119);
INSERT INTO `qb_hy_company_fid` VALUES (35, 136);
INSERT INTO `qb_hy_company_fid` VALUES (36, 11);
INSERT INTO `qb_hy_company_fid` VALUES (36, 21);
INSERT INTO `qb_hy_company_fid` VALUES (36, 33);
INSERT INTO `qb_hy_company_fid` VALUES (36, 46);
INSERT INTO `qb_hy_company_fid` VALUES (36, 59);
INSERT INTO `qb_hy_company_fid` VALUES (36, 73);
INSERT INTO `qb_hy_company_fid` VALUES (36, 87);
INSERT INTO `qb_hy_company_fid` VALUES (36, 105);
INSERT INTO `qb_hy_company_fid` VALUES (36, 119);
INSERT INTO `qb_hy_company_fid` VALUES (36, 136);
INSERT INTO `qb_hy_company_fid` VALUES (37, 11);
INSERT INTO `qb_hy_company_fid` VALUES (37, 21);
INSERT INTO `qb_hy_company_fid` VALUES (37, 33);
INSERT INTO `qb_hy_company_fid` VALUES (37, 46);
INSERT INTO `qb_hy_company_fid` VALUES (37, 59);
INSERT INTO `qb_hy_company_fid` VALUES (37, 73);
INSERT INTO `qb_hy_company_fid` VALUES (37, 87);
INSERT INTO `qb_hy_company_fid` VALUES (37, 105);
INSERT INTO `qb_hy_company_fid` VALUES (37, 119);
INSERT INTO `qb_hy_company_fid` VALUES (37, 136);

# --------------------------------------------------------

#
# ��Ľṹ `qb_hy_config`
#

DROP TABLE IF EXISTS `qb_hy_config`;
CREATE TABLE `qb_hy_config` (
  `c_key` varchar(50) NOT NULL default '',
  `c_value` text NOT NULL,
  `c_descrip` text NOT NULL,
  PRIMARY KEY  (`c_key`)
) TYPE=MyISAM;

#
# �������е����� `qb_hy_config`
#

INSERT INTO `qb_hy_config` VALUES ('Info_webOpen', '1', '');
INSERT INTO `qb_hy_config` VALUES ('sort_layout', '1,5#3,8,7#2,4,6#', '');
INSERT INTO `qb_hy_config` VALUES ('module_id', '16', '');
INSERT INTO `qb_hy_config` VALUES ('gg_map_api', 'ABQIAAAAlNgPp05cAGeYiuhUaYZaQxT2hWcVQgqOjltVi_oi0-IXnv8sfRRB0xK-_hJ6X9fvCiWkheAw1gnL8Q', '');
INSERT INTO `qb_hy_config` VALUES ('vipselfdomain', '', '');
INSERT INTO `qb_hy_config` VALUES ('vipselfdomaincannot', '', '');
INSERT INTO `qb_hy_config` VALUES ('creat_home_money', '0', '');
INSERT INTO `qb_hy_config` VALUES ('module_pre', 'hy_', '');
INSERT INTO `qb_hy_config` VALUES ('Index_listsortnum', '3', '');
INSERT INTO `qb_hy_config` VALUES ('module_close', '0', '');
INSERT INTO `qb_hy_config` VALUES ('Info_webname', '��ҳģ��', '');

# --------------------------------------------------------

#
# ��Ľṹ `qb_hy_dianping`
#

DROP TABLE IF EXISTS `qb_hy_dianping`;
CREATE TABLE `qb_hy_dianping` (
  `cid` mediumint(7) unsigned NOT NULL auto_increment,
  `cuid` int(7) NOT NULL default '0',
  `type` tinyint(2) NOT NULL default '0',
  `id` mediumint(7) unsigned NOT NULL default '0',
  `fid` mediumint(7) unsigned NOT NULL default '0',
  `uid` mediumint(7) unsigned NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `posttime` int(10) NOT NULL default '0',
  `content` text NOT NULL,
  `ip` varchar(15) NOT NULL default '',
  `icon` tinyint(3) NOT NULL default '0',
  `yz` tinyint(1) NOT NULL default '0',
  `fen1` smallint(4) NOT NULL default '0',
  `fen2` smallint(4) NOT NULL default '0',
  `fen3` smallint(4) NOT NULL default '0',
  `fen4` smallint(4) NOT NULL default '0',
  `fen5` smallint(4) NOT NULL default '0',
  `flowers` smallint(4) NOT NULL default '0',
  `egg` smallint(4) NOT NULL default '0',
  `price` mediumint(5) NOT NULL default '0',
  `keywords` varchar(100) NOT NULL default '',
  `keywords2` varchar(100) NOT NULL default '',
  `fen6` varchar(150) NOT NULL default '',
  PRIMARY KEY  (`cid`),
  KEY `type` (`type`)
) TYPE=MyISAM AUTO_INCREMENT=7 ;

#
# �������е����� `qb_hy_dianping`
#

INSERT INTO `qb_hy_dianping` VALUES (3, 1, 0, 1, 0, 1, 'admin', 1290066331, '̫����!!', '127.0.0.1', 0, 1, 1, 3, 5, 4, 0, 0, 0, 52, '', '', '');
INSERT INTO `qb_hy_dianping` VALUES (4, 1, 0, 1, 0, 1, 'admin', 1290495895, '���̼�,�ܽ�����!', '127.0.0.1', 0, 1, 1, 1, 2, 4, 2, 0, 0, 23, '', '', '');
INSERT INTO `qb_hy_dianping` VALUES (5, 1, 0, 1, 0, 1, 'admin', 1290495930, '�´λ���������.̫����!!̫����!!̫����!!̫����!!̫����!!̫����!!̫����!!̫����!!̫����!!̫����!!̫����!!̫����!!̫����!!̫����!!̫����!!̫����!!̫����!!̫����!!̫����!!̫����!!̫����!!<br>', '127.0.0.1', 0, 1, 4, 4, 3, 3, 2, 0, 0, 23, '', '', '');
INSERT INTO `qb_hy_dianping` VALUES (6, 1, 0, 1, 0, 1, 'admin', 1290495942, '���̼�,�ܽ�����!<br>���̼�,�ܽ�����!<br>���̼�,�ܽ�����!<br>���̼�,�ܽ�����!<br>���̼�,�ܽ�����!<br>���̼�,�ܽ�����!<br>���̼�,�ܽ�����!<br>���̼�,�ܽ�����!<br>���̼�,�ܽ�����!<br>���̼�,�ܽ�����!<br>', '127.0.0.1', 0, 1, 4, 4, 3, 3, 2, 0, 0, 23, '', '', '');

# --------------------------------------------------------

#
# ��Ľṹ `qb_hy_friendlink`
#

DROP TABLE IF EXISTS `qb_hy_friendlink`;
CREATE TABLE `qb_hy_friendlink` (
  `ck_id` int(10) unsigned NOT NULL auto_increment,
  `uid` mediumint(7) unsigned NOT NULL default '0',
  `username` varchar(16) NOT NULL default '',
  `companyName` varchar(64) NOT NULL default '',
  `title` varchar(128) NOT NULL default '',
  `url` varchar(248) NOT NULL default '',
  `description` text NOT NULL,
  `yz` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`ck_id`),
  KEY `uid` (`uid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# �������е����� `qb_hy_friendlink`
#


# --------------------------------------------------------

#
# ��Ľṹ `qb_hy_guestbook`
#

DROP TABLE IF EXISTS `qb_hy_guestbook`;
CREATE TABLE `qb_hy_guestbook` (
  `id` int(7) NOT NULL auto_increment,
  `cuid` mediumint(7) NOT NULL default '0',
  `uid` int(7) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `ip` varchar(15) NOT NULL default '',
  `content` text NOT NULL,
  `yz` tinyint(1) NOT NULL default '0',
  `posttime` int(16) NOT NULL default '0',
  `list` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `cuid` (`cuid`),
  KEY `uid` (`uid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# �������е����� `qb_hy_guestbook`
#


# --------------------------------------------------------

#
# ��Ľṹ `qb_hy_home`
#

DROP TABLE IF EXISTS `qb_hy_home`;
CREATE TABLE `qb_hy_home` (
  `uid` mediumint(7) unsigned NOT NULL default '0',
  `username` varchar(32) NOT NULL default '',
  `style` varchar(32) NOT NULL default '',
  `index_left` varchar(248) NOT NULL default '',
  `index_right` varchar(248) NOT NULL default '',
  `listnum` text NOT NULL,
  `banner` varchar(248) NOT NULL default '',
  `bodytpl` varchar(8) NOT NULL default 'left',
  `renzheng_show` tinyint(1) NOT NULL default '0',
  `visitor` text NOT NULL,
  `hits` mediumint(7) NOT NULL default '0',
  `head_menu` text NOT NULL,
  UNIQUE KEY `uid` (`uid`)
) TYPE=MyISAM;

#
# �������е����� `qb_hy_home`
#

INSERT INTO `qb_hy_home` VALUES (1, 'admin', 'vip_1', 'base,tongji,news,ck', 'info', 'a:7:{s:9:"guestbook";s:1:"4";s:7:"visitor";s:2:"10";s:8:"newslist";s:2:"10";s:10:"friendlink";s:2:"10";s:10:"Mguestbook";s:2:"10";s:9:"Mnewslist";s:2:"10";s:8:"Mvisitor";s:2:"40";}', '', '', 0, '0	127.0.0.1	1289819988\r\n9	fdsafsdw	1282633598', 584, 'a:9:{i:0;a:4:{s:5:"title";s:8:"�̼���ҳ";s:3:"url";s:1:"?";s:5:"order";s:2:"10";s:6:"ifshow";i:1;}i:1;a:4:{s:5:"title";s:8:"�̼ҽ���";s:3:"url";s:7:"?m=info";s:5:"order";s:1:"9";s:6:"ifshow";i:1;}i:2;a:4:{s:5:"title";s:8:"�̼�����";s:3:"url";s:7:"?m=news";s:5:"order";s:1:"8";s:6:"ifshow";i:1;}i:11;a:4:{s:5:"title";s:8:"�̼Ҳ�Ʒ";s:3:"url";s:7:"?m=shop";s:5:"order";s:1:"7";s:6:"ifshow";i:1;}i:12;a:4:{s:5:"title";s:8:"������Ϣ";s:3:"url";s:9:"?m=coupon";s:5:"order";s:1:"5";s:6:"ifshow";i:1;}i:13;a:4:{s:5:"title";s:8:"��Ƹ��Ϣ";s:3:"url";s:6:"?m=job";s:5:"order";s:1:"4";s:6:"ifshow";i:1;}i:14;a:4:{s:5:"title";s:8:"�˿͵���";s:3:"url";s:11:"?m=dianping";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:4;a:4:{s:5:"title";s:8:"ͼƬչʾ";s:3:"url";s:7:"?m=pics";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:8;a:4:{s:5:"title";s:8:"��ϵ��ʽ";s:3:"url";s:12:"?m=contactus";s:5:"order";s:1:"1";s:6:"ifshow";i:1;}}');
INSERT INTO `qb_hy_home` VALUES (30, 'test4', 'default', 'base,tongji,news,ck', 'info', 'a:7:{s:9:"guestbook";i:4;s:7:"visitor";i:10;s:8:"newslist";i:10;s:10:"friendlink";i:10;s:10:"Mguestbook";i:10;s:8:"Mvisitor";i:40;s:9:"Mnewslist";i:10;}', '', 'left', 0, '', 1, 'a:9:{i:0;a:4:{s:5:"title";s:8:"�̼���ҳ";s:3:"url";s:1:"?";s:5:"order";s:2:"10";s:6:"ifshow";i:1;}i:1;a:4:{s:5:"title";s:8:"�̼ҽ���";s:3:"url";s:7:"?m=info";s:5:"order";s:1:"9";s:6:"ifshow";i:1;}i:2;a:4:{s:5:"title";s:8:"�̼�����";s:3:"url";s:7:"?m=news";s:5:"order";s:1:"8";s:6:"ifshow";i:1;}i:11;a:4:{s:5:"title";s:8:"�̼Ҳ�Ʒ";s:3:"url";s:7:"?m=shop";s:5:"order";s:1:"7";s:6:"ifshow";i:1;}i:12;a:4:{s:5:"title";s:8:"������Ϣ";s:3:"url";s:9:"?m=coupon";s:5:"order";s:1:"5";s:6:"ifshow";i:1;}i:13;a:4:{s:5:"title";s:8:"��Ƹ��Ϣ";s:3:"url";s:6:"?m=job";s:5:"order";s:1:"4";s:6:"ifshow";i:1;}i:4;a:4:{s:5:"title";s:8:"ͼƬչʾ";s:3:"url";s:7:"?m=pics";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:14;a:4:{s:5:"title";s:8:"�˿͵���";s:3:"url";s:11:"?m=dianping";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:8;a:4:{s:5:"title";s:8:"��ϵ��ʽ";s:3:"url";s:12:"?m=contactus";s:5:"order";s:1:"1";s:6:"ifshow";i:1;}}');
INSERT INTO `qb_hy_home` VALUES (29, 'test3', 'default', 'base,tongji,news,ck', 'info', 'a:7:{s:9:"guestbook";i:4;s:7:"visitor";i:10;s:8:"newslist";i:10;s:10:"friendlink";i:10;s:10:"Mguestbook";i:10;s:8:"Mvisitor";i:40;s:9:"Mnewslist";i:10;}', '', 'left', 0, '1	admin	1288845790', 2, 'a:9:{i:0;a:4:{s:5:"title";s:8:"�̼���ҳ";s:3:"url";s:1:"?";s:5:"order";s:2:"10";s:6:"ifshow";i:1;}i:1;a:4:{s:5:"title";s:8:"�̼ҽ���";s:3:"url";s:7:"?m=info";s:5:"order";s:1:"9";s:6:"ifshow";i:1;}i:2;a:4:{s:5:"title";s:8:"�̼�����";s:3:"url";s:7:"?m=news";s:5:"order";s:1:"8";s:6:"ifshow";i:1;}i:11;a:4:{s:5:"title";s:8:"�̼Ҳ�Ʒ";s:3:"url";s:7:"?m=shop";s:5:"order";s:1:"7";s:6:"ifshow";i:1;}i:12;a:4:{s:5:"title";s:8:"������Ϣ";s:3:"url";s:9:"?m=coupon";s:5:"order";s:1:"5";s:6:"ifshow";i:1;}i:13;a:4:{s:5:"title";s:8:"��Ƹ��Ϣ";s:3:"url";s:6:"?m=job";s:5:"order";s:1:"4";s:6:"ifshow";i:1;}i:4;a:4:{s:5:"title";s:8:"ͼƬչʾ";s:3:"url";s:7:"?m=pics";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:14;a:4:{s:5:"title";s:8:"�˿͵���";s:3:"url";s:11:"?m=dianping";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:8;a:4:{s:5:"title";s:8:"��ϵ��ʽ";s:3:"url";s:12:"?m=contactus";s:5:"order";s:1:"1";s:6:"ifshow";i:1;}}');
INSERT INTO `qb_hy_home` VALUES (28, 'test2', 'default', 'base,tongji,news,ck', 'info', 'a:7:{s:9:"guestbook";i:4;s:7:"visitor";i:10;s:8:"newslist";i:10;s:10:"friendlink";i:10;s:10:"Mguestbook";i:10;s:8:"Mvisitor";i:40;s:9:"Mnewslist";i:10;}', '', 'left', 0, '', 1, 'a:9:{i:0;a:4:{s:5:"title";s:8:"�̼���ҳ";s:3:"url";s:1:"?";s:5:"order";s:2:"10";s:6:"ifshow";i:1;}i:1;a:4:{s:5:"title";s:8:"�̼ҽ���";s:3:"url";s:7:"?m=info";s:5:"order";s:1:"9";s:6:"ifshow";i:1;}i:2;a:4:{s:5:"title";s:8:"�̼�����";s:3:"url";s:7:"?m=news";s:5:"order";s:1:"8";s:6:"ifshow";i:1;}i:11;a:4:{s:5:"title";s:8:"�̼Ҳ�Ʒ";s:3:"url";s:7:"?m=shop";s:5:"order";s:1:"7";s:6:"ifshow";i:1;}i:12;a:4:{s:5:"title";s:8:"������Ϣ";s:3:"url";s:9:"?m=coupon";s:5:"order";s:1:"5";s:6:"ifshow";i:1;}i:13;a:4:{s:5:"title";s:8:"��Ƹ��Ϣ";s:3:"url";s:6:"?m=job";s:5:"order";s:1:"4";s:6:"ifshow";i:1;}i:4;a:4:{s:5:"title";s:8:"ͼƬչʾ";s:3:"url";s:7:"?m=pics";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:14;a:4:{s:5:"title";s:8:"�˿͵���";s:3:"url";s:11:"?m=dianping";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:8;a:4:{s:5:"title";s:8:"��ϵ��ʽ";s:3:"url";s:12:"?m=contactus";s:5:"order";s:1:"1";s:6:"ifshow";i:1;}}');
INSERT INTO `qb_hy_home` VALUES (27, 'test1', 'red', 'base,tongji,news,ck', 'info', 'a:7:{s:9:"guestbook";s:1:"4";s:7:"visitor";s:2:"10";s:8:"newslist";s:2:"10";s:10:"friendlink";s:2:"10";s:10:"Mguestbook";s:2:"10";s:9:"Mnewslist";s:2:"10";s:8:"Mvisitor";s:2:"40";}', '', '', 0, '', 5, 'a:9:{i:0;a:4:{s:5:"title";s:8:"�̼���ҳ";s:3:"url";s:1:"?";s:5:"order";s:2:"10";s:6:"ifshow";i:1;}i:1;a:4:{s:5:"title";s:8:"�̼ҽ���";s:3:"url";s:7:"?m=info";s:5:"order";s:1:"9";s:6:"ifshow";i:1;}i:2;a:4:{s:5:"title";s:8:"�̼�����";s:3:"url";s:7:"?m=news";s:5:"order";s:1:"8";s:6:"ifshow";i:1;}i:11;a:4:{s:5:"title";s:8:"�̼Ҳ�Ʒ";s:3:"url";s:7:"?m=shop";s:5:"order";s:1:"7";s:6:"ifshow";i:1;}i:12;a:4:{s:5:"title";s:8:"������Ϣ";s:3:"url";s:9:"?m=coupon";s:5:"order";s:1:"5";s:6:"ifshow";i:1;}i:13;a:4:{s:5:"title";s:8:"��Ƹ��Ϣ";s:3:"url";s:6:"?m=job";s:5:"order";s:1:"4";s:6:"ifshow";i:1;}i:4;a:4:{s:5:"title";s:8:"ͼƬչʾ";s:3:"url";s:7:"?m=pics";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:14;a:4:{s:5:"title";s:8:"�˿͵���";s:3:"url";s:11:"?m=dianping";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:8;a:4:{s:5:"title";s:8:"��ϵ��ʽ";s:3:"url";s:12:"?m=contactus";s:5:"order";s:1:"1";s:6:"ifshow";i:1;}}');
INSERT INTO `qb_hy_home` VALUES (31, 'test5', 'default', 'base,tongji,news,ck', 'info', 'a:7:{s:9:"guestbook";i:4;s:7:"visitor";i:10;s:8:"newslist";i:10;s:10:"friendlink";i:10;s:10:"Mguestbook";i:10;s:8:"Mvisitor";i:40;s:9:"Mnewslist";i:10;}', '', 'left', 0, '', 0, 'a:9:{i:0;a:4:{s:5:"title";s:8:"�̼���ҳ";s:3:"url";s:1:"?";s:5:"order";s:2:"10";s:6:"ifshow";i:1;}i:1;a:4:{s:5:"title";s:8:"�̼ҽ���";s:3:"url";s:7:"?m=info";s:5:"order";s:1:"9";s:6:"ifshow";i:1;}i:2;a:4:{s:5:"title";s:8:"�̼�����";s:3:"url";s:7:"?m=news";s:5:"order";s:1:"8";s:6:"ifshow";i:1;}i:11;a:4:{s:5:"title";s:8:"�̼Ҳ�Ʒ";s:3:"url";s:7:"?m=shop";s:5:"order";s:1:"7";s:6:"ifshow";i:1;}i:12;a:4:{s:5:"title";s:8:"������Ϣ";s:3:"url";s:9:"?m=coupon";s:5:"order";s:1:"5";s:6:"ifshow";i:1;}i:13;a:4:{s:5:"title";s:8:"��Ƹ��Ϣ";s:3:"url";s:6:"?m=job";s:5:"order";s:1:"4";s:6:"ifshow";i:1;}i:4;a:4:{s:5:"title";s:8:"ͼƬչʾ";s:3:"url";s:7:"?m=pics";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:14;a:4:{s:5:"title";s:8:"�˿͵���";s:3:"url";s:11:"?m=dianping";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:8;a:4:{s:5:"title";s:8:"��ϵ��ʽ";s:3:"url";s:12:"?m=contactus";s:5:"order";s:1:"1";s:6:"ifshow";i:1;}}');
INSERT INTO `qb_hy_home` VALUES (32, 'test6', 'default', 'base,tongji,news,ck', 'info', 'a:7:{s:9:"guestbook";i:4;s:7:"visitor";i:10;s:8:"newslist";i:10;s:10:"friendlink";i:10;s:10:"Mguestbook";i:10;s:8:"Mvisitor";i:40;s:9:"Mnewslist";i:10;}', '', 'left', 0, '', 1, 'a:9:{i:0;a:4:{s:5:"title";s:8:"�̼���ҳ";s:3:"url";s:1:"?";s:5:"order";s:2:"10";s:6:"ifshow";i:1;}i:1;a:4:{s:5:"title";s:8:"�̼ҽ���";s:3:"url";s:7:"?m=info";s:5:"order";s:1:"9";s:6:"ifshow";i:1;}i:2;a:4:{s:5:"title";s:8:"�̼�����";s:3:"url";s:7:"?m=news";s:5:"order";s:1:"8";s:6:"ifshow";i:1;}i:11;a:4:{s:5:"title";s:8:"�̼Ҳ�Ʒ";s:3:"url";s:7:"?m=shop";s:5:"order";s:1:"7";s:6:"ifshow";i:1;}i:12;a:4:{s:5:"title";s:8:"������Ϣ";s:3:"url";s:9:"?m=coupon";s:5:"order";s:1:"5";s:6:"ifshow";i:1;}i:13;a:4:{s:5:"title";s:8:"��Ƹ��Ϣ";s:3:"url";s:6:"?m=job";s:5:"order";s:1:"4";s:6:"ifshow";i:1;}i:4;a:4:{s:5:"title";s:8:"ͼƬչʾ";s:3:"url";s:7:"?m=pics";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:14;a:4:{s:5:"title";s:8:"�˿͵���";s:3:"url";s:11:"?m=dianping";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:8;a:4:{s:5:"title";s:8:"��ϵ��ʽ";s:3:"url";s:12:"?m=contactus";s:5:"order";s:1:"1";s:6:"ifshow";i:1;}}');
INSERT INTO `qb_hy_home` VALUES (33, 'test7', 'default', 'base,tongji,news,ck', 'info', 'a:7:{s:9:"guestbook";i:4;s:7:"visitor";i:10;s:8:"newslist";i:10;s:10:"friendlink";i:10;s:10:"Mguestbook";i:10;s:8:"Mvisitor";i:40;s:9:"Mnewslist";i:10;}', '', 'left', 0, '', 1, 'a:9:{i:0;a:4:{s:5:"title";s:8:"�̼���ҳ";s:3:"url";s:1:"?";s:5:"order";s:2:"10";s:6:"ifshow";i:1;}i:1;a:4:{s:5:"title";s:8:"�̼ҽ���";s:3:"url";s:7:"?m=info";s:5:"order";s:1:"9";s:6:"ifshow";i:1;}i:2;a:4:{s:5:"title";s:8:"�̼�����";s:3:"url";s:7:"?m=news";s:5:"order";s:1:"8";s:6:"ifshow";i:1;}i:11;a:4:{s:5:"title";s:8:"�̼Ҳ�Ʒ";s:3:"url";s:7:"?m=shop";s:5:"order";s:1:"7";s:6:"ifshow";i:1;}i:12;a:4:{s:5:"title";s:8:"������Ϣ";s:3:"url";s:9:"?m=coupon";s:5:"order";s:1:"5";s:6:"ifshow";i:1;}i:13;a:4:{s:5:"title";s:8:"��Ƹ��Ϣ";s:3:"url";s:6:"?m=job";s:5:"order";s:1:"4";s:6:"ifshow";i:1;}i:4;a:4:{s:5:"title";s:8:"ͼƬչʾ";s:3:"url";s:7:"?m=pics";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:14;a:4:{s:5:"title";s:8:"�˿͵���";s:3:"url";s:11:"?m=dianping";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:8;a:4:{s:5:"title";s:8:"��ϵ��ʽ";s:3:"url";s:12:"?m=contactus";s:5:"order";s:1:"1";s:6:"ifshow";i:1;}}');
INSERT INTO `qb_hy_home` VALUES (34, 'test8', 'default', 'base,tongji,news,ck', 'info', 'a:7:{s:9:"guestbook";i:4;s:7:"visitor";i:10;s:8:"newslist";i:10;s:10:"friendlink";i:10;s:10:"Mguestbook";i:10;s:8:"Mvisitor";i:40;s:9:"Mnewslist";i:10;}', '', 'left', 0, '1	admin	1288761162', 5, 'a:9:{i:0;a:4:{s:5:"title";s:8:"�̼���ҳ";s:3:"url";s:1:"?";s:5:"order";s:2:"10";s:6:"ifshow";i:1;}i:1;a:4:{s:5:"title";s:8:"�̼ҽ���";s:3:"url";s:7:"?m=info";s:5:"order";s:1:"9";s:6:"ifshow";i:1;}i:2;a:4:{s:5:"title";s:8:"�̼�����";s:3:"url";s:7:"?m=news";s:5:"order";s:1:"8";s:6:"ifshow";i:1;}i:11;a:4:{s:5:"title";s:8:"�̼Ҳ�Ʒ";s:3:"url";s:7:"?m=shop";s:5:"order";s:1:"7";s:6:"ifshow";i:1;}i:12;a:4:{s:5:"title";s:8:"������Ϣ";s:3:"url";s:9:"?m=coupon";s:5:"order";s:1:"5";s:6:"ifshow";i:1;}i:13;a:4:{s:5:"title";s:8:"��Ƹ��Ϣ";s:3:"url";s:6:"?m=job";s:5:"order";s:1:"4";s:6:"ifshow";i:1;}i:4;a:4:{s:5:"title";s:8:"ͼƬչʾ";s:3:"url";s:7:"?m=pics";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:14;a:4:{s:5:"title";s:8:"�˿͵���";s:3:"url";s:11:"?m=dianping";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:8;a:4:{s:5:"title";s:8:"��ϵ��ʽ";s:3:"url";s:12:"?m=contactus";s:5:"order";s:1:"1";s:6:"ifshow";i:1;}}');
INSERT INTO `qb_hy_home` VALUES (35, 'test9', 'default', 'base,tongji,news,ck', 'info', 'a:7:{s:9:"guestbook";i:4;s:7:"visitor";i:10;s:8:"newslist";i:10;s:10:"friendlink";i:10;s:10:"Mguestbook";i:10;s:8:"Mvisitor";i:40;s:9:"Mnewslist";i:10;}', '', 'left', 0, '', 1, 'a:9:{i:0;a:4:{s:5:"title";s:8:"�̼���ҳ";s:3:"url";s:1:"?";s:5:"order";s:2:"10";s:6:"ifshow";i:1;}i:1;a:4:{s:5:"title";s:8:"�̼ҽ���";s:3:"url";s:7:"?m=info";s:5:"order";s:1:"9";s:6:"ifshow";i:1;}i:2;a:4:{s:5:"title";s:8:"�̼�����";s:3:"url";s:7:"?m=news";s:5:"order";s:1:"8";s:6:"ifshow";i:1;}i:11;a:4:{s:5:"title";s:8:"�̼Ҳ�Ʒ";s:3:"url";s:7:"?m=shop";s:5:"order";s:1:"7";s:6:"ifshow";i:1;}i:12;a:4:{s:5:"title";s:8:"������Ϣ";s:3:"url";s:9:"?m=coupon";s:5:"order";s:1:"5";s:6:"ifshow";i:1;}i:13;a:4:{s:5:"title";s:8:"��Ƹ��Ϣ";s:3:"url";s:6:"?m=job";s:5:"order";s:1:"4";s:6:"ifshow";i:1;}i:4;a:4:{s:5:"title";s:8:"ͼƬչʾ";s:3:"url";s:7:"?m=pics";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:14;a:4:{s:5:"title";s:8:"�˿͵���";s:3:"url";s:11:"?m=dianping";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:8;a:4:{s:5:"title";s:8:"��ϵ��ʽ";s:3:"url";s:12:"?m=contactus";s:5:"order";s:1:"1";s:6:"ifshow";i:1;}}');
INSERT INTO `qb_hy_home` VALUES (36, 'test10', 'default', 'base,tongji,news,ck', 'info', 'a:7:{s:9:"guestbook";i:4;s:7:"visitor";i:10;s:8:"newslist";i:10;s:10:"friendlink";i:10;s:10:"Mguestbook";i:10;s:8:"Mvisitor";i:40;s:9:"Mnewslist";i:10;}', '', 'left', 0, '', 1, 'a:9:{i:0;a:4:{s:5:"title";s:8:"�̼���ҳ";s:3:"url";s:1:"?";s:5:"order";s:2:"10";s:6:"ifshow";i:1;}i:1;a:4:{s:5:"title";s:8:"�̼ҽ���";s:3:"url";s:7:"?m=info";s:5:"order";s:1:"9";s:6:"ifshow";i:1;}i:2;a:4:{s:5:"title";s:8:"�̼�����";s:3:"url";s:7:"?m=news";s:5:"order";s:1:"8";s:6:"ifshow";i:1;}i:11;a:4:{s:5:"title";s:8:"�̼Ҳ�Ʒ";s:3:"url";s:7:"?m=shop";s:5:"order";s:1:"7";s:6:"ifshow";i:1;}i:12;a:4:{s:5:"title";s:8:"������Ϣ";s:3:"url";s:9:"?m=coupon";s:5:"order";s:1:"5";s:6:"ifshow";i:1;}i:13;a:4:{s:5:"title";s:8:"��Ƹ��Ϣ";s:3:"url";s:6:"?m=job";s:5:"order";s:1:"4";s:6:"ifshow";i:1;}i:4;a:4:{s:5:"title";s:8:"ͼƬչʾ";s:3:"url";s:7:"?m=pics";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:14;a:4:{s:5:"title";s:8:"�˿͵���";s:3:"url";s:11:"?m=dianping";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:8;a:4:{s:5:"title";s:8:"��ϵ��ʽ";s:3:"url";s:12:"?m=contactus";s:5:"order";s:1:"1";s:6:"ifshow";i:1;}}');
INSERT INTO `qb_hy_home` VALUES (37, 'test11', 'default', 'base,tongji,news,ck', 'info', 'a:7:{s:9:"guestbook";i:4;s:7:"visitor";i:10;s:8:"newslist";i:10;s:10:"friendlink";i:10;s:10:"Mguestbook";i:10;s:8:"Mvisitor";i:40;s:9:"Mnewslist";i:10;}', '', 'left', 0, '1	admin	1291712588', 32, 'a:9:{i:0;a:4:{s:5:"title";s:8:"�̼���ҳ";s:3:"url";s:1:"?";s:5:"order";s:2:"10";s:6:"ifshow";i:1;}i:1;a:4:{s:5:"title";s:8:"�̼ҽ���";s:3:"url";s:7:"?m=info";s:5:"order";s:1:"9";s:6:"ifshow";i:1;}i:2;a:4:{s:5:"title";s:8:"�̼�����";s:3:"url";s:7:"?m=news";s:5:"order";s:1:"8";s:6:"ifshow";i:1;}i:11;a:4:{s:5:"title";s:8:"�̼Ҳ�Ʒ";s:3:"url";s:7:"?m=shop";s:5:"order";s:1:"7";s:6:"ifshow";i:1;}i:12;a:4:{s:5:"title";s:8:"������Ϣ";s:3:"url";s:9:"?m=coupon";s:5:"order";s:1:"5";s:6:"ifshow";i:1;}i:13;a:4:{s:5:"title";s:8:"��Ƹ��Ϣ";s:3:"url";s:6:"?m=job";s:5:"order";s:1:"4";s:6:"ifshow";i:1;}i:4;a:4:{s:5:"title";s:8:"ͼƬչʾ";s:3:"url";s:7:"?m=pics";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:14;a:4:{s:5:"title";s:8:"�˿͵���";s:3:"url";s:11:"?m=dianping";s:5:"order";s:1:"2";s:6:"ifshow";i:1;}i:8;a:4:{s:5:"title";s:8:"��ϵ��ʽ";s:3:"url";s:12:"?m=contactus";s:5:"order";s:1:"1";s:6:"ifshow";i:1;}}');

# --------------------------------------------------------

#
# ��Ľṹ `qb_hy_mysort`
#

DROP TABLE IF EXISTS `qb_hy_mysort`;
CREATE TABLE `qb_hy_mysort` (
  `ms_id` int(10) unsigned NOT NULL auto_increment,
  `uid` mediumint(7) unsigned NOT NULL default '0',
  `sortname` char(32) NOT NULL default '',
  `fup` int(10) unsigned NOT NULL default '0',
  `listorder` int(8) unsigned NOT NULL default '0',
  `ctype` tinyint(1) NOT NULL default '1',
  `hits` int(8) unsigned NOT NULL default '0',
  `best` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`ms_id`),
  KEY `uid` (`uid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# �������е����� `qb_hy_mysort`
#


# --------------------------------------------------------

#
# ��Ľṹ `qb_hy_news`
#

DROP TABLE IF EXISTS `qb_hy_news`;
CREATE TABLE `qb_hy_news` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `uid` mediumint(7) unsigned NOT NULL default '0',
  `title` varchar(150) NOT NULL default '',
  `content` text NOT NULL,
  `hits` mediumint(7) NOT NULL default '0',
  `posttime` int(10) unsigned NOT NULL default '0',
  `list` int(10) unsigned NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `titlecolor` varchar(15) NOT NULL default '',
  `fonttype` tinyint(1) NOT NULL default '0',
  `picurl` varchar(150) NOT NULL default '',
  `ispic` tinyint(1) NOT NULL default '0',
  `yz` tinyint(1) NOT NULL default '0',
  `levels` tinyint(1) NOT NULL default '0',
  `keywords` varchar(100) NOT NULL default '',
  `bd_pics` varchar(248) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`),
  KEY `posttime` (`posttime`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# �������е����� `qb_hy_news`
#


# --------------------------------------------------------

#
# ��Ľṹ `qb_hy_pic`
#

DROP TABLE IF EXISTS `qb_hy_pic`;
CREATE TABLE `qb_hy_pic` (
  `pid` int(10) unsigned NOT NULL auto_increment,
  `psid` int(10) unsigned NOT NULL default '0',
  `uid` mediumint(7) unsigned NOT NULL default '0',
  `username` varchar(32) NOT NULL default '',
  `title` varchar(128) NOT NULL default '',
  `url` varchar(248) NOT NULL default '',
  `level` tinyint(1) NOT NULL default '0',
  `yz` tinyint(1) NOT NULL default '0',
  `posttime` int(10) unsigned NOT NULL default '0',
  `isfm` tinyint(1) NOT NULL default '0',
  `orderlist` mediumint(5) NOT NULL default '0',
  `type` varchar(8) NOT NULL default '',
  PRIMARY KEY  (`pid`),
  KEY `uid` (`uid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# �������е����� `qb_hy_pic`
#


# --------------------------------------------------------

#
# ��Ľṹ `qb_hy_picsort`
#

DROP TABLE IF EXISTS `qb_hy_picsort`;
CREATE TABLE `qb_hy_picsort` (
  `psid` int(10) unsigned NOT NULL auto_increment,
  `psup` int(10) unsigned NOT NULL default '0',
  `name` varchar(16) NOT NULL default '',
  `remarks` varchar(248) NOT NULL default '',
  `uid` mediumint(7) unsigned NOT NULL default '0',
  `username` varchar(16) NOT NULL default '',
  `level` tinyint(1) NOT NULL default '0',
  `posttime` int(10) unsigned NOT NULL default '0',
  `orderlist` mediumint(4) unsigned NOT NULL default '0',
  `faceurl` varchar(248) NOT NULL default '',
  PRIMARY KEY  (`psid`),
  KEY `uid` (`uid`,`orderlist`)
) TYPE=MyISAM AUTO_INCREMENT=23 ;

#
# �������е����� `qb_hy_picsort`
#

INSERT INTO `qb_hy_picsort` VALUES (1, 0, '��Ʒͼ��', '��¼��Ʒ�෽��ͼƬ����', 27, 'test1', 0, 1288661741, 2, '');
INSERT INTO `qb_hy_picsort` VALUES (2, 0, '����˵��', '����֤�飬��֤�飬Ӫҵִ��', 27, 'test1', 0, 1288661741, 1, '');
INSERT INTO `qb_hy_picsort` VALUES (3, 0, '��Ʒͼ��', '��¼��Ʒ�෽��ͼƬ����', 28, 'test2', 0, 1288662180, 2, '');
INSERT INTO `qb_hy_picsort` VALUES (4, 0, '����˵��', '����֤�飬��֤�飬Ӫҵִ��', 28, 'test2', 0, 1288662180, 1, '');
INSERT INTO `qb_hy_picsort` VALUES (5, 0, '��Ʒͼ��', '��¼��Ʒ�෽��ͼƬ����', 29, 'test3', 0, 1288662327, 2, '');
INSERT INTO `qb_hy_picsort` VALUES (6, 0, '����˵��', '����֤�飬��֤�飬Ӫҵִ��', 29, 'test3', 0, 1288662327, 1, '');
INSERT INTO `qb_hy_picsort` VALUES (7, 0, '��Ʒͼ��', '��¼��Ʒ�෽��ͼƬ����', 30, 'test4', 0, 1288662567, 2, '');
INSERT INTO `qb_hy_picsort` VALUES (8, 0, '����˵��', '����֤�飬��֤�飬Ӫҵִ��', 30, 'test4', 0, 1288662567, 1, '');
INSERT INTO `qb_hy_picsort` VALUES (9, 0, '��Ʒͼ��', '��¼��Ʒ�෽��ͼƬ����', 31, 'test5', 0, 1288662786, 2, '');
INSERT INTO `qb_hy_picsort` VALUES (10, 0, '����˵��', '����֤�飬��֤�飬Ӫҵִ��', 31, 'test5', 0, 1288662786, 1, '');
INSERT INTO `qb_hy_picsort` VALUES (11, 0, '��Ʒͼ��', '��¼��Ʒ�෽��ͼƬ����', 32, 'test6', 0, 1288662947, 2, '');
INSERT INTO `qb_hy_picsort` VALUES (12, 0, '����˵��', '����֤�飬��֤�飬Ӫҵִ��', 32, 'test6', 0, 1288662947, 1, '');
INSERT INTO `qb_hy_picsort` VALUES (13, 0, '��Ʒͼ��', '��¼��Ʒ�෽��ͼƬ����', 33, 'test7', 0, 1288663129, 2, '');
INSERT INTO `qb_hy_picsort` VALUES (14, 0, '����˵��', '����֤�飬��֤�飬Ӫҵִ��', 33, 'test7', 0, 1288663129, 1, '');
INSERT INTO `qb_hy_picsort` VALUES (15, 0, '��Ʒͼ��', '��¼��Ʒ�෽��ͼƬ����', 34, 'test8', 0, 1288663299, 2, '');
INSERT INTO `qb_hy_picsort` VALUES (16, 0, '����˵��', '����֤�飬��֤�飬Ӫҵִ��', 34, 'test8', 0, 1288663299, 1, '');
INSERT INTO `qb_hy_picsort` VALUES (17, 0, '��Ʒͼ��', '��¼��Ʒ�෽��ͼƬ����', 35, 'test9', 0, 1288663462, 2, '');
INSERT INTO `qb_hy_picsort` VALUES (18, 0, '����˵��', '����֤�飬��֤�飬Ӫҵִ��', 35, 'test9', 0, 1288663462, 1, '');
INSERT INTO `qb_hy_picsort` VALUES (19, 0, '��Ʒͼ��', '��¼��Ʒ�෽��ͼƬ����', 36, 'test10', 0, 1288663617, 2, '');
INSERT INTO `qb_hy_picsort` VALUES (20, 0, '����˵��', '����֤�飬��֤�飬Ӫҵִ��', 36, 'test10', 0, 1288663617, 1, '');
INSERT INTO `qb_hy_picsort` VALUES (21, 0, '��Ʒͼ��', '��¼��Ʒ�෽��ͼƬ����', 37, 'test11', 0, 1288663816, 2, '');
INSERT INTO `qb_hy_picsort` VALUES (22, 0, '����˵��', '����֤�飬��֤�飬Ӫҵִ��', 37, 'test11', 0, 1288663816, 1, '');

# --------------------------------------------------------

#
# ��Ľṹ `qb_hy_sort`
#

DROP TABLE IF EXISTS `qb_hy_sort`;
CREATE TABLE `qb_hy_sort` (
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
  `ifcolor` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`fid`)
) TYPE=MyISAM AUTO_INCREMENT=73 ;

#
# �������е����� `qb_hy_sort`
#

INSERT INTO `qb_hy_sort` VALUES (1, 0, '������ʳ', 0, 1, 0, 0, '', 0, 0, '', '', '', '', 'N;', '', 0, '', '', '', 0, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (2, 0, '��������', 0, 1, 0, 0, '', 0, 0, '', '', '', '', 'N;', '', 0, '', '', '', 0, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (3, 0, '���ξƵ�', 0, 1, 0, 0, '', 0, 0, '', '', '', '', 'N;', '', 0, '', '', '', 0, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (4, 0, '�������', 0, 1, 0, 0, '', 0, 0, '', '', '', '', 'N;', '', 0, '', '', '', 0, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (5, 0, '���ݱ���', 0, 1, 0, 0, '', 0, 0, '', '', '', '', 'N;', '', 0, '', '', '', 0, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (6, 0, '�����Ҿ�', 0, 1, 0, 0, '', 0, 0, '', '', '', '', 'N;', '', 0, '', '', '', 0, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (7, 0, '����', 0, 1, 0, 0, '', 0, 0, '', '', '', '', 'N;', '', 0, '', '', '', 0, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (8, 0, 'ҽ�ƽ���', 0, 1, 0, 0, '', 0, 0, '', '', '', '', 'N;', '', 0, '', '', '', 0, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (9, 0, '��ѯ�н�', 0, 1, 0, 0, '', 0, 0, '', '', '', '', 'N;', '', 0, '', '', '', 0, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (10, 0, '������ѵ', 0, 1, 0, 0, '', 0, 0, '', '', '', '', 'N;', '', 0, '', '', '', 0, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (11, 1, '������', 0, 2, 0, 0, '', 0, 0, '', '', '', '', 'N;', '', 0, '', '', '', 0, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (12, 1, 'ţ�Ź�', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (13, 1, '��������', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (14, 1, '���/ɰ��', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (15, 1, '�ձ�����', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (16, 1, '��������', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (17, 1, '����', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (18, 1, '����/ũ�Ҳ�', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (19, 1, '���/С��', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (20, 1, '����/�������', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (21, 2, '������', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (22, 2, 'KTV', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (23, 2, '��������', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (24, 2, '������', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (25, 2, '�������ֳ���', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (26, 3, '�ù�/����/����', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (27, 3, 'ǩ֤����', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (28, 3, '���㾰��', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (29, 3, 'ס��Ԥ��', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (30, 3, '�����ͱ��ݾƵ�', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (31, 4, '����/����ά��ά��', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (32, 4, '����/����', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (33, 4, '�������', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (34, 4, '��Ӱ/����/��ϴ', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (35, 4, 'Ӫҵ��', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (36, 4, '�������/��Ӱ����', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (37, 4, '���/����', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (38, 5, '������Ʒ', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (39, 5, '����Ʒ', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (40, 5, '����', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (41, 5, '����', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (42, 6, '��������', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (43, 6, 'װ��װ諷���', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (44, 6, '�Ҿӵ�', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (45, 6, '����', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (46, 6, '���񷿲�', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (47, 7, 'Ьñ/���/Ƥ��', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (48, 7, '�ۺ��г�', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (49, 7, '����������', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (50, 7, 'Ӥ�׶���Ʒ', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (51, 7, '��װ�г�', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (52, 7, '���б���', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (53, 7, '��Ʒ/����Ʒ', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (54, 8, '����ҽԺ', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (55, 8, '������ѯ', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (56, 8, 'Ů�Խ���', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (57, 8, '��������', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (58, 10, '������ѵѧУ', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (59, 10, '������ѵ', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (60, 10, '��У/����', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (61, 10, '������', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (62, 10, 'ѧ��/����', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (63, 10, '���˽���', 0, 2, 0, 0, '', 0, 0, '', '', '', '', 'N;', '', 0, '', '', '', 0, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (64, 9, '�н������ѯ����', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (65, 9, '��������/����', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (66, 9, '����/����', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (67, 9, '��ѧ', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (68, 9, '��Ƹ����', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (69, 9, '���/����', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (70, 9, '���̴���', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (71, 9, '���ʦ������', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
INSERT INTO `qb_hy_sort` VALUES (72, 9, '������ѯ/����', 0, 2, 0, 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', '', 1, '', '', '', '', 0, '', 0, 0, '', '', 0);
