<?php

$TagDB['hy_1']=array(
				'typesystem'=>'0',
				'type'=>'rollpic',
				'code'=>'a:6:{s:8:\"rolltype\";s:1:\"0\";s:5:\"width\";s:3:\"250\";s:6:\"height\";s:3:\"170\";s:6:\"picurl\";a:2:{i:1;s:32:\"label/1_20101123121104_vcrd7.jpg\";i:2;s:32:\"label/1_20101123121109_ud6ep.jpg\";}s:7:\"piclink\";a:2:{i:1;s:1:\"#\";i:2;s:1:\"#\";}s:6:\"picalt\";a:2:{i:1;s:0:\"\";i:2;s:0:\"\";}}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:3:\"248\";s:5:\"div_h\";s:3:\"168\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_10']=array(
				'typesystem'=>'1',
				'type'=>'Info_hy_',
				'code'=>'a:28:{s:13:\"tplpart_1code\";s:737:\"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"listtable table1\">
                  <tr>
                    
                <td class=\"img\"><span>$i</span><a href=\"$webdb[www_url]/home/?uid=$uid\" target=\"_blank\"><img src=\"$picurl\" onerror=\"this.src=\'$webdb[www_url]/images/default/nopic.jpg\'\" width=\"60\" height=\"45\" border=\"0\"/></a></td>
                    <td class=\"word\">
                    	<div class=\"t\"><a href=\"$webdb[www_url]/home/?uid=$uid\" target=\"_blank\">$title</a></div>
                        <div class=\"c\">关注度 <span>$hits</span> 次</div>
                        <div class=\"c\">点评数 {$dianping}  条</div>
                    </td>
                  </tr>
                </table>\";s:13:\"tplpart_2code\";s:0:\"\";s:3:\"SYS\";s:7:\"company\";s:7:\"typefid\";N;s:5:\"width\";s:3:\"250\";s:6:\"height\";s:3:\"187\";s:8:\"rolltype\";s:10:\"scrollLeft\";s:8:\"rolltime\";s:1:\"3\";s:11:\"roll_height\";s:2:\"50\";s:11:\"content_num\";s:2:\"80\";s:7:\"newhour\";s:2:\"24\";s:7:\"hothits\";s:2:\"30\";s:7:\"tplpath\";s:0:\"\";s:6:\"DivTpl\";i:1;s:5:\"fiddb\";N;s:8:\"moduleid\";N;s:5:\"stype\";s:1:\"p\";s:2:\"yz\";s:3:\"all\";s:8:\"renzheng\";s:3:\"all\";s:10:\"timeformat\";s:11:\"Y-m-d H:i:s\";s:5:\"order\";s:3:\"rid\";s:3:\"asc\";s:4:\"DESC\";s:6:\"levels\";s:3:\"all\";s:7:\"rowspan\";s:1:\"4\";s:3:\"sql\";s:90:\"SELECT * FROM qb_hy_company  WHERE city_id=\'$GLOBALS[city_id]\'  ORDER BY rid DESC LIMIT 4 \";s:7:\"colspan\";s:1:\"1\";s:8:\"titlenum\";s:2:\"20\";s:10:\"titleflood\";s:1:\"0\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:3:\"180\";s:5:\"div_h\";s:3:\"262\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_11']=array(
				'typesystem'=>'1',
				'type'=>'Info_news_',
				'code'=>'a:35:{s:13:\"tplpart_1code\";s:106:\"   <div class=\"listb l$i\"><a href=\"$url\" target=\"_blank\">$title</a><span>{$time_m} -{$time_d}</span></div>\";s:13:\"tplpart_2code\";s:212:\"<div class=\"lista l0\">
                        <div class=\"t\"><a href=\"$url\" target=\"_blank\">$title</a></div>
                        <div class=\"c\">$content</div>
                    </div>
                 \";s:3:\"SYS\";s:2:\"wn\";s:6:\"wninfo\";s:5:\"news_\";s:9:\"noReadMid\";s:0:\"\";s:13:\"RollStyleType\";s:0:\"\";s:7:\"fidtype\";s:1:\"0\";s:8:\"rolltype\";s:10:\"scrollLeft\";s:8:\"rolltime\";s:1:\"3\";s:11:\"roll_height\";s:2:\"50\";s:5:\"width\";s:3:\"250\";s:6:\"height\";s:3:\"187\";s:7:\"newhour\";s:2:\"24\";s:7:\"hothits\";s:3:\"100\";s:7:\"amodule\";N;s:7:\"tplpath\";s:24:\"/common_zh_pic/zh_pc.jpg\";s:6:\"DivTpl\";i:1;s:5:\"fiddb\";N;s:5:\"stype\";s:1:\"t\";s:2:\"yz\";s:1:\"1\";s:7:\"hidefid\";N;s:10:\"timeformat\";s:11:\"Y-m-d H:i:s\";s:5:\"order\";s:6:\"A.list\";s:3:\"asc\";s:4:\"DESC\";s:6:\"levels\";s:3:\"all\";s:7:\"rowspan\";s:1:\"6\";s:3:\"sql\";s:167:\" SELECT A.*,R.content FROM qb_news_content A LEFT JOIN qb_news_content_1 R ON A.id=R.id  WHERE A.city_id=\'$GLOBALS[city_id]\' AND A.yz=1   ORDER BY A.list DESC LIMIT 7 \";s:4:\"sql2\";N;s:7:\"colspan\";s:1:\"1\";s:11:\"content_num\";s:2:\"80\";s:12:\"content_num2\";s:3:\"100\";s:8:\"titlenum\";s:2:\"40\";s:9:\"titlenum2\";s:2:\"36\";s:10:\"titleflood\";s:1:\"0\";s:10:\"c_rolltype\";s:1:\"0\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:3:\"303\";s:5:\"div_h\";s:3:\"249\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_15']=array(
				'typesystem'=>'1',
				'type'=>'Info_news_',
				'code'=>'a:35:{s:13:\"tplpart_1code\";s:66:\"<div class=\"list\"><a href=\"$url\" target=\"_blank\">$title</a></div> \";s:13:\"tplpart_2code\";s:0:\"\";s:3:\"SYS\";s:2:\"wn\";s:6:\"wninfo\";s:5:\"news_\";s:9:\"noReadMid\";s:0:\"\";s:13:\"RollStyleType\";s:0:\"\";s:7:\"fidtype\";s:1:\"0\";s:8:\"rolltype\";s:10:\"scrollLeft\";s:8:\"rolltime\";s:1:\"3\";s:11:\"roll_height\";s:2:\"50\";s:5:\"width\";s:3:\"250\";s:6:\"height\";s:3:\"187\";s:7:\"newhour\";s:2:\"24\";s:7:\"hothits\";s:3:\"100\";s:7:\"amodule\";N;s:7:\"tplpath\";s:0:\"\";s:6:\"DivTpl\";i:1;s:5:\"fiddb\";N;s:5:\"stype\";s:1:\"4\";s:2:\"yz\";s:1:\"1\";s:7:\"hidefid\";N;s:10:\"timeformat\";s:11:\"Y-m-d H:i:s\";s:5:\"order\";s:6:\"A.list\";s:3:\"asc\";s:4:\"DESC\";s:6:\"levels\";s:3:\"all\";s:7:\"rowspan\";s:1:\"2\";s:3:\"sql\";s:114:\" SELECT A.* FROM qb_news_content A  WHERE A.city_id=\'$GLOBALS[city_id]\' AND A.yz=1   ORDER BY A.list DESC LIMIT 2 \";s:4:\"sql2\";N;s:7:\"colspan\";s:1:\"1\";s:11:\"content_num\";s:2:\"80\";s:12:\"content_num2\";s:3:\"120\";s:8:\"titlenum\";s:2:\"34\";s:9:\"titlenum2\";s:2:\"40\";s:10:\"titleflood\";s:1:\"0\";s:10:\"c_rolltype\";s:1:\"0\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:3:\"178\";s:5:\"div_h\";s:2:\"44\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_16']=array(
				'typesystem'=>'1',
				'type'=>'Info_news_',
				'code'=>'a:35:{s:13:\"tplpart_1code\";s:66:\"<div class=\"list\"><a href=\"$url\" target=\"_blank\">$title</a></div> \";s:13:\"tplpart_2code\";s:0:\"\";s:3:\"SYS\";s:2:\"wn\";s:6:\"wninfo\";s:5:\"news_\";s:9:\"noReadMid\";s:0:\"\";s:13:\"RollStyleType\";s:0:\"\";s:7:\"fidtype\";s:1:\"0\";s:8:\"rolltype\";s:10:\"scrollLeft\";s:8:\"rolltime\";s:1:\"3\";s:11:\"roll_height\";s:2:\"50\";s:5:\"width\";s:3:\"250\";s:6:\"height\";s:3:\"187\";s:7:\"newhour\";s:2:\"24\";s:7:\"hothits\";s:3:\"100\";s:7:\"amodule\";N;s:7:\"tplpath\";s:0:\"\";s:6:\"DivTpl\";i:1;s:5:\"fiddb\";N;s:5:\"stype\";s:1:\"4\";s:2:\"yz\";s:1:\"1\";s:7:\"hidefid\";N;s:10:\"timeformat\";s:11:\"Y-m-d H:i:s\";s:5:\"order\";s:6:\"A.list\";s:3:\"asc\";s:4:\"DESC\";s:6:\"levels\";s:3:\"all\";s:7:\"rowspan\";s:1:\"3\";s:3:\"sql\";s:114:\" SELECT A.* FROM qb_news_content A  WHERE A.city_id=\'$GLOBALS[city_id]\' AND A.yz=1   ORDER BY A.list DESC LIMIT 3 \";s:4:\"sql2\";N;s:7:\"colspan\";s:1:\"1\";s:11:\"content_num\";s:2:\"80\";s:12:\"content_num2\";s:3:\"120\";s:8:\"titlenum\";s:2:\"36\";s:9:\"titlenum2\";s:2:\"40\";s:10:\"titleflood\";s:1:\"0\";s:10:\"c_rolltype\";s:1:\"0\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:3:\"180\";s:5:\"div_h\";s:2:\"60\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_17']=array(
				'typesystem'=>'1',
				'type'=>'Info_news_',
				'code'=>'a:35:{s:13:\"tplpart_1code\";s:66:\"<div class=\"list\"><a href=\"$url\" target=\"_blank\">$title</a></div> \";s:13:\"tplpart_2code\";s:0:\"\";s:3:\"SYS\";s:2:\"wn\";s:6:\"wninfo\";s:5:\"news_\";s:9:\"noReadMid\";s:0:\"\";s:13:\"RollStyleType\";s:0:\"\";s:7:\"fidtype\";s:1:\"0\";s:8:\"rolltype\";s:10:\"scrollLeft\";s:8:\"rolltime\";s:1:\"3\";s:11:\"roll_height\";s:2:\"50\";s:5:\"width\";s:3:\"250\";s:6:\"height\";s:3:\"187\";s:7:\"newhour\";s:2:\"24\";s:7:\"hothits\";s:3:\"100\";s:7:\"amodule\";N;s:7:\"tplpath\";s:0:\"\";s:6:\"DivTpl\";i:1;s:5:\"fiddb\";N;s:5:\"stype\";s:1:\"4\";s:2:\"yz\";s:1:\"1\";s:7:\"hidefid\";N;s:10:\"timeformat\";s:11:\"Y-m-d H:i:s\";s:5:\"order\";s:6:\"A.list\";s:3:\"asc\";s:3:\"ASC\";s:6:\"levels\";s:3:\"all\";s:7:\"rowspan\";s:1:\"3\";s:3:\"sql\";s:113:\" SELECT A.* FROM qb_news_content A  WHERE A.city_id=\'$GLOBALS[city_id]\' AND A.yz=1   ORDER BY A.list ASC LIMIT 3 \";s:4:\"sql2\";N;s:7:\"colspan\";s:1:\"1\";s:11:\"content_num\";s:2:\"80\";s:12:\"content_num2\";s:3:\"120\";s:8:\"titlenum\";s:2:\"36\";s:9:\"titlenum2\";s:2:\"40\";s:10:\"titleflood\";s:1:\"0\";s:10:\"c_rolltype\";s:1:\"0\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:3:\"179\";s:5:\"div_h\";s:2:\"60\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_18']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'	<div><a href=\"#\" target=\"_blank\">客户服务中心</a></div>
            <div><a href=\"#\" target=\"_blank\">在线提问</a></div>',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:2:\"87\";s:5:\"div_h\";s:2:\"40\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_19']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'商家资讯',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_2']=array(
				'typesystem'=>'0',
				'type'=>'pic',
				'code'=>'a:4:{s:6:\"imgurl\";s:32:\"label/1_20101123121155_ihnbv.jpg\";s:7:\"imglink\";s:1:\"#\";s:5:\"width\";s:3:\"115\";s:6:\"height\";s:2:\"60\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:3:\"113\";s:5:\"div_h\";s:2:\"58\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_20']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'最新商家',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_21']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'今日公告',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_22']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'商情快报',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_23']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'商家新闻',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_25']=array(
				'typesystem'=>'1',
				'type'=>'member',
				'code'=>'a:20:{s:9:\"tplpart_1\";s:637:\"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"listtable table1\">
                  <tr>
                    <td class=\"img\"><a href=\"$webdb[www_url]/member/homepage.php?uid=$uid\" target=\"_blank\"><img src=\"$picurl\" onerror=\"this.src=\'$webdb[www_url]/images/default/noface.gif\'\" width=\"45\" height=\"45\"/></a></td>
                    <td class=\"word\">
                    	<div class=\"t\"><a href=\"$webdb[blog_url]/index.php?uid=$uid\" target=\"_blank\">$username</a></div>
                        <div class=\"c\">注册日期:$posttime</div>
                    </td>
                  </tr>
                </table>\";s:13:\"tplpart_1code\";s:637:\"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"listtable table1\">
                  <tr>
                    <td class=\"img\"><a href=\"$webdb[www_url]/member/homepage.php?uid=$uid\" target=\"_blank\"><img src=\"$picurl\" onerror=\"this.src=\'$webdb[www_url]/images/default/noface.gif\'\" width=\"45\" height=\"45\"/></a></td>
                    <td class=\"word\">
                    	<div class=\"t\"><a href=\"$webdb[blog_url]/index.php?uid=$uid\" target=\"_blank\">$username</a></div>
                        <div class=\"c\">注册日期:$posttime</div>
                    </td>
                  </tr>
                </table>\";s:13:\"tplpart_2code\";s:0:\"\";s:7:\"group_1\";s:0:\"\";s:7:\"group_2\";s:0:\"\";s:13:\"RollStyleType\";s:0:\"\";s:7:\"tplpath\";s:0:\"\";s:6:\"DivTpl\";i:1;s:5:\"fiddb\";N;s:5:\"stype\";s:1:\"4\";s:2:\"yz\";s:3:\"all\";s:10:\"timeformat\";s:11:\"Y-m-d H:i:s\";s:5:\"order\";s:7:\"regdate\";s:3:\"asc\";s:4:\"DESC\";s:6:\"levels\";N;s:7:\"rowspan\";s:1:\"4\";s:3:\"sql\";s:157:\" SELECT D.*,D.username AS title,D.icon AS picurl,D.introduce AS content,D.regdate AS posttime FROM qb_memberdata D  WHERE 1  ORDER BY D.regdate DESC LIMIT 4 \";s:7:\"colspan\";s:1:\"1\";s:8:\"titlenum\";s:2:\"20\";s:10:\"titleflood\";s:1:\"0\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:3:\"180\";s:5:\"div_h\";s:3:\"238\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_26']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'会员动态',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_3']=array(
				'typesystem'=>'0',
				'type'=>'pic',
				'code'=>'a:4:{s:6:\"imgurl\";s:32:\"label/1_20101123121111_d03vt.jpg\";s:7:\"imglink\";s:1:\"#\";s:5:\"width\";s:3:\"115\";s:6:\"height\";s:2:\"60\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:3:\"113\";s:5:\"div_h\";s:2:\"60\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_30']=array(
				'typesystem'=>'1',
				'type'=>'mysql',
				'code'=>'a:22:{s:13:\"tplpart_1code\";s:116:\"<div class=\"list l$i\"><span><a href=\"/f/list.php?&fid=$fid\" target=\"_blank\">$title</a></span><em>{$NUM}条</em></div>\";s:13:\"tplpart_2code\";s:0:\"\";s:3:\"SYS\";s:5:\"mysql\";s:13:\"RollStyleType\";s:0:\"\";s:7:\"newhour\";N;s:7:\"hothits\";N;s:7:\"tplpath\";s:0:\"\";s:6:\"DivTpl\";i:1;s:5:\"stype\";s:1:\"4\";s:7:\"rowspan\";s:2:\"10\";s:3:\"sql\";s:144:\"SELECT COUNT( * ) AS NUM, fname AS title, fid FROM `qb_fenlei_content` WHERE city_id=\'$GLOBALS[city_id]\' GROUP BY fid ORDER BY NUM DESC LIMIT 10\";s:7:\"colspan\";s:1:\"1\";s:8:\"titlenum\";s:2:\"20\";s:9:\"titlenum2\";s:2:\"40\";s:10:\"titleflood\";s:1:\"0\";s:5:\"width\";s:3:\"250\";s:6:\"height\";s:3:\"187\";s:11:\"content_num\";s:2:\"80\";s:12:\"content_num2\";s:3:\"120\";s:8:\"rolltype\";s:10:\"scrollLeft\";s:8:\"rolltime\";s:1:\"3\";s:11:\"roll_height\";s:2:\"50\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:3:\"176\";s:5:\"div_h\";s:3:\"220\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_31']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'分类热门栏目',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_4']=array(
				'typesystem'=>'0',
				'type'=>'pic',
				'code'=>'a:4:{s:6:\"imgurl\";s:32:\"label/1_20101123131120_6g6lw.gif\";s:7:\"imglink\";s:1:\"#\";s:5:\"width\";s:3:\"176\";s:6:\"height\";s:2:\"60\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:2:\"89\";s:5:\"div_h\";s:2:\"59\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_5']=array(
				'typesystem'=>'0',
				'type'=>'pic',
				'code'=>'a:4:{s:6:\"imgurl\";s:32:\"label/1_20101123131113_owuft.gif\";s:7:\"imglink\";s:1:\"#\";s:5:\"width\";s:3:\"176\";s:6:\"height\";s:2:\"60\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:3:\"177\";s:5:\"div_h\";s:2:\"60\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_6']=array(
				'typesystem'=>'0',
				'type'=>'pic',
				'code'=>'a:4:{s:6:\"imgurl\";s:32:\"label/1_20101123131157_sdv3g.png\";s:7:\"imglink\";s:1:\"#\";s:5:\"width\";s:3:\"176\";s:6:\"height\";s:2:\"60\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:3:\"176\";s:5:\"div_h\";s:2:\"58\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_7']=array(
				'typesystem'=>'1',
				'type'=>'Info_hy_',
				'code'=>'a:28:{s:13:\"tplpart_1code\";s:327:\"<div class=\"listcompany\">
			<a href=\"$webdb[www_url]/home/?uid=$uid\" target=\"_blank\" class=\"img\"><img src=\"$picurl\" onerror=\"this.src=\'$webdb[www_url]/images/default/nopic.jpg\'\" width=\"120\" height=\"90\" border=\"0\"/></a> 
              <a href=\"$webdb[www_url]/home/?uid=$uid\" target=\"_blank\" class=\"t\">$title</a>
			  </div>\";s:13:\"tplpart_2code\";s:0:\"\";s:3:\"SYS\";s:7:\"company\";s:7:\"typefid\";N;s:5:\"width\";s:3:\"250\";s:6:\"height\";s:3:\"187\";s:8:\"rolltype\";s:10:\"scrollLeft\";s:8:\"rolltime\";s:1:\"3\";s:11:\"roll_height\";s:2:\"50\";s:11:\"content_num\";s:2:\"80\";s:7:\"newhour\";s:2:\"24\";s:7:\"hothits\";s:2:\"30\";s:7:\"tplpath\";s:0:\"\";s:6:\"DivTpl\";i:1;s:5:\"fiddb\";N;s:8:\"moduleid\";N;s:5:\"stype\";s:1:\"p\";s:2:\"yz\";s:3:\"all\";s:8:\"renzheng\";s:3:\"all\";s:10:\"timeformat\";s:11:\"Y-m-d H:i:s\";s:5:\"order\";s:3:\"rid\";s:3:\"asc\";s:4:\"DESC\";s:6:\"levels\";s:3:\"all\";s:7:\"rowspan\";s:2:\"10\";s:3:\"sql\";s:91:\"SELECT * FROM qb_hy_company  WHERE city_id=\'$GLOBALS[city_id]\'  ORDER BY rid DESC LIMIT 10 \";s:7:\"colspan\";s:1:\"1\";s:8:\"titlenum\";s:2:\"24\";s:10:\"titleflood\";s:1:\"0\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:3:\"762\";s:5:\"div_h\";s:3:\"256\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['hy_8']=array(
				'typesystem'=>'1',
				'type'=>'Info_news_',
				'code'=>'a:35:{s:13:\"tplpart_1code\";s:65:\"<div class=\"list\"><a href=\"$url\" target=\"_blank\">$title</a></div>\";s:13:\"tplpart_2code\";s:543:\"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                  <tr>
                    
                <td class=\"img\"><a href=\"$url\" target=\"_blank\"><img src=\"$picurl\" onerror=\"this.src=\'$webdb[www_url]/images/default/nopic.jpg\'\" width=\"60\" height=\"45\" border=\"0\"/></a></td>
                    <td>
                    	<div class=\"t\"><a href=\"$url\" target=\"_blank\">$title</a></div>
                        <div class=\"c\">$content</div>
                    </td>
                  </tr>
                </table>\";s:3:\"SYS\";s:2:\"wn\";s:6:\"wninfo\";s:5:\"news_\";s:9:\"noReadMid\";s:0:\"\";s:13:\"RollStyleType\";s:0:\"\";s:7:\"fidtype\";s:1:\"0\";s:8:\"rolltype\";s:10:\"scrollLeft\";s:8:\"rolltime\";s:1:\"3\";s:11:\"roll_height\";s:2:\"50\";s:5:\"width\";s:3:\"250\";s:6:\"height\";s:3:\"187\";s:7:\"newhour\";s:2:\"24\";s:7:\"hothits\";s:3:\"100\";s:7:\"amodule\";N;s:7:\"tplpath\";s:24:\"/common_zh_pic/zh_pc.jpg\";s:6:\"DivTpl\";i:1;s:5:\"fiddb\";N;s:5:\"stype\";s:1:\"t\";s:2:\"yz\";s:1:\"1\";s:7:\"hidefid\";N;s:10:\"timeformat\";s:11:\"Y-m-d H:i:s\";s:5:\"order\";s:6:\"A.list\";s:3:\"asc\";s:4:\"DESC\";s:6:\"levels\";s:3:\"all\";s:7:\"rowspan\";s:1:\"6\";s:3:\"sql\";s:167:\" SELECT A.*,R.content FROM qb_news_content A LEFT JOIN qb_news_content_1 R ON A.id=R.id  WHERE A.city_id=\'$GLOBALS[city_id]\' AND A.yz=1   ORDER BY A.list DESC LIMIT 7 \";s:4:\"sql2\";s:180:\" SELECT A.*,R.content FROM qb_news_content A LEFT JOIN qb_news_content_1 R ON A.id=R.id  WHERE A.city_id=\'$GLOBALS[city_id]\' AND A.yz=1  AND A.ispic=1 ORDER BY A.list DESC LIMIT 1 \";s:7:\"colspan\";s:1:\"1\";s:11:\"content_num\";s:2:\"80\";s:12:\"content_num2\";s:2:\"30\";s:8:\"titlenum\";s:2:\"28\";s:9:\"titlenum2\";s:2:\"26\";s:10:\"titleflood\";s:1:\"0\";s:10:\"c_rolltype\";s:1:\"0\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:3:\"173\";s:5:\"div_h\";s:3:\"207\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['red_hyrightad']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'<a href=\"http://www_qibosoft_com/images/red/hy/rad.gif\" target=\"_blank\"><img src=\"http://www_qibosoft_com/images/red/hy/rad.gif\"></a>',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
?>