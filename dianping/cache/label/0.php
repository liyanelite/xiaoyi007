<?php

$TagDB['fashion_dianpingindexh1']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'在线客服',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindexh10']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'会员动态',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindexh2']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'最新点评',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindexh3']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'特色商家推荐',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindexh4']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'推荐店铺展示图片',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindexh5']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'点评分类',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindexh6']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'<div class=\"tag\">推荐点评</div><div class=\"more\"><a href=\"listall.php\">更多点评</a></div>',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindexh7']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'会员点评',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindexh8']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'热门点评排行榜',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindexh9']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'最新点评',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindext0']=array(
				'typesystem'=>'0',
				'type'=>'code',
				'code'=>'<dl class=\"cc1\">
    <dt>咨询电话:</dt>
    <dd>4000-2888-68</dd>
</dl>
<dl class=\"cc2\">
    <dt>在线客服:</dt>
    <dd>
    <div><a target=\"_blank\" href=\" http://wpa.qq.com/msgrd?v=3&uin=121727818&site=qq&menu=yes\"><img src=\" http://wpa.qq.com/pa?p=2:121727818:41\" /></a></div>
	<div><a target=\"_blank\" href=\" http://wpa.qq.com/msgrd?v=3&uin=27781017&site=qq&menu=yes\"><img src=\" http://wpa.qq.com/pa?p=2:27781017:41\" /></a></div>
    </dd>
</dl>
<dl class=\"cc3\">
    <dt>工作时间:</dt>
    <dd>周一至周六 8:00-17:30</dd>
</dl>',
				'divcode'=>'a:4:{s:9:\"html_edit\";N;s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindext1']=array(
				'typesystem'=>'0',
				'type'=>'rollpic',
				'code'=>'a:7:{s:13:\"tplpart_1code\";s:798:\"<script src=\"http://www_qibosoft_com/images/fashion/news/jquery.js\" type=\"text/javascript\"></script>
 <ul class=\"slidePic\">
<!--
EOT;
$i=0;
foreach($listdb AS $rs){extract($rs);
$i++;
if($i==1)$curword=\"class=cur\";
else $curword=\"\";
print <<<EOT
-->
    <li $curword><a href=\"$url\"  target=\"_blank\"><IMG alt=\"$title\" src=\"$picurl\" width=480 height=200 /></a></li>
<!--
EOT;
}
print <<<EOT
-->
  </ul>
  <ul class=\"slideTxt\">
<!--
EOT;
$i=0;
foreach($listdb AS $rs){extract($rs);
$i++;
if($i==1)$curword=\"class=cur\";
else $curword=\"\";
print <<<EOT
-->
    <li $curword><a href=\"$url\"  target=\"_blank\" title=\"$title\">$i</a></li>
<!--
EOT;
}
print <<<EOT
-->
  </ul>
<script type=\"text/javascript\" src=\"http://www_qibosoft_com/images/fashion/news/slide.js\"></script>\";s:8:\"rolltype\";s:1:\"2\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";s:6:\"picurl\";a:5:{i:1;s:32:\"../images/fashion/dianping/1.jpg\";i:2;s:32:\"../images/fashion/dianping/2.jpg\";i:3;s:32:\"../images/fashion/dianping/3.jpg\";i:4;s:32:\"../images/fashion/dianping/4.jpg\";i:5;s:32:\"../images/fashion/dianping/5.jpg\";}s:7:\"piclink\";a:5:{i:1;s:1:\"#\";i:2;s:1:\"#\";i:3;s:1:\"#\";i:4;s:1:\"#\";i:5;s:1:\"#\";}s:6:\"picalt\";a:5:{i:1;s:5:\"标题1\";i:2;s:5:\"标题b\";i:3;s:5:\"标题c\";i:4;s:5:\"标题d\";i:5;s:5:\"标题e\";}}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindext10']=array(
				'typesystem'=>'1',
				'type'=>'member',
				'code'=>'a:21:{s:9:\"tplpart_1\";s:570:\"<!--
EOT;
foreach($listdb AS $rs){extract($rs);
$regdate=date(\"Y-m-d H:i:s\",$regdate);
$picurl=$picurl?$picurl:\"$webdb[www_url]/images/default/noface.gif\";
$counum=$mart_price-$price;
print <<<EOT
-->
<div class=\"listm\"> 
<div class=\"img\"><a href=\"$webdb[www_url]/member/homepage.php?uid=$uid\" target=\"_blank\"><img height=\"45\" src=\"$picurl\" /></a></div>
<div class=\"t\"><A HREF=\"$webdb[www_url]/member/homepage.php?uid=$uid\" title=\'$full_title\' target=\"_blank\">$title</A></div>
<div class=\"d\">注册日期:{$regdate}</div>
</div>
<!--
EOT;
}
print <<<EOT
-->\";s:13:\"tplpart_1code\";s:570:\"<!--
EOT;
foreach($listdb AS $rs){extract($rs);
$regdate=date(\"Y-m-d H:i:s\",$regdate);
$picurl=$picurl?$picurl:\"$webdb[www_url]/images/default/noface.gif\";
$counum=$mart_price-$price;
print <<<EOT
-->
<div class=\"listm\"> 
<div class=\"img\"><a href=\"$webdb[www_url]/member/homepage.php?uid=$uid\" target=\"_blank\"><img height=\"45\" src=\"$picurl\" /></a></div>
<div class=\"t\"><A HREF=\"$webdb[www_url]/member/homepage.php?uid=$uid\" title=\'$full_title\' target=\"_blank\">$title</A></div>
<div class=\"d\">注册日期:{$regdate}</div>
</div>
<!--
EOT;
}
print <<<EOT
-->\";s:13:\"tplpart_2code\";s:0:\"\";s:7:\"group_1\";s:0:\"\";s:7:\"group_2\";s:0:\"\";s:13:\"RollStyleType\";s:0:\"\";s:7:\"tplpath\";s:15:\"/member/img.jpg\";s:6:\"DivTpl\";i:1;s:5:\"fiddb\";N;s:5:\"stype\";s:1:\"p\";s:2:\"yz\";s:3:\"all\";s:10:\"timeformat\";s:11:\"Y-m-d H:i:s\";s:5:\"order\";s:7:\"regdate\";s:3:\"asc\";s:4:\"DESC\";s:6:\"levels\";N;s:7:\"rowspan\";s:1:\"4\";s:3:\"sql\";s:137:\" SELECT D.*,D.username AS title,D.icon AS picurl,D.introduce AS content FROM qb_memberdata D  WHERE 1  ORDER BY D.regdate DESC LIMIT 0,4 \";s:7:\"colspan\";s:1:\"1\";s:8:\"titlenum\";s:2:\"20\";s:10:\"titleflood\";s:1:\"0\";s:9:\"start_num\";s:1:\"1\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:2:\"50\";s:5:\"div_h\";s:2:\"30\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindext2']=array(
				'typesystem'=>'1',
				'type'=>'Info_dianping_',
				'code'=>'a:30:{s:13:\"tplpart_1code\";s:98:\"<div class=\"list\"><a href=\"$url\" target=\"_blank\">$title</a><span>{$time_m}-{$time_d}</span></div> \";s:13:\"tplpart_2code\";s:0:\"\";s:3:\"SYS\";s:2:\"wn\";s:6:\"wninfo\";s:9:\"dianping_\";s:7:\"typefid\";N;s:6:\"cityId\";s:17:\"$GLOBALS[city_id]\";s:5:\"width\";s:3:\"250\";s:6:\"height\";s:3:\"187\";s:8:\"rolltype\";s:10:\"scrollLeft\";s:8:\"rolltime\";s:1:\"3\";s:11:\"roll_height\";s:2:\"50\";s:11:\"content_num\";s:2:\"80\";s:7:\"newhour\";s:2:\"24\";s:7:\"hothits\";s:2:\"30\";s:7:\"tplpath\";s:0:\"\";s:6:\"DivTpl\";i:1;s:5:\"fiddb\";N;s:8:\"moduleid\";s:0:\"\";s:5:\"stype\";s:1:\"4\";s:2:\"yz\";s:3:\"all\";s:10:\"timeformat\";s:11:\"Y-m-d H:i:s\";s:5:\"order\";s:4:\"list\";s:3:\"asc\";s:4:\"DESC\";s:6:\"levels\";s:3:\"all\";s:7:\"rowspan\";s:1:\"4\";s:3:\"sql\";s:134:\"(SELECT * FROM qb_dianping_content  WHERE city_id=\'$GLOBALS[city_id]\'  AND city_id=\'$GLOBALS[city_id]\' ) ORDER BY list DESC LIMIT 0,4 \";s:7:\"colspan\";s:1:\"1\";s:8:\"titlenum\";s:2:\"26\";s:10:\"titleflood\";s:1:\"0\";s:9:\"start_num\";s:1:\"1\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:2:\"50\";s:5:\"div_h\";s:2:\"30\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindext3']=array(
				'typesystem'=>'1',
				'type'=>'Info_dianping_',
				'code'=>'a:30:{s:13:\"tplpart_1code\";s:125:\"<div class=\"list\"><a href=\"$list_url\" target=\"_blank\" class=\"f\">[{$fname}]</a><a href=\"$url\" target=\"_blank\">$title</a></div>\";s:13:\"tplpart_2code\";s:0:\"\";s:3:\"SYS\";s:2:\"wn\";s:6:\"wninfo\";s:9:\"dianping_\";s:7:\"typefid\";N;s:6:\"cityId\";s:17:\"$GLOBALS[city_id]\";s:5:\"width\";s:3:\"250\";s:6:\"height\";s:3:\"187\";s:8:\"rolltype\";s:10:\"scrollLeft\";s:8:\"rolltime\";s:1:\"3\";s:11:\"roll_height\";s:2:\"50\";s:11:\"content_num\";s:2:\"80\";s:7:\"newhour\";s:2:\"24\";s:7:\"hothits\";s:2:\"30\";s:7:\"tplpath\";s:0:\"\";s:6:\"DivTpl\";i:1;s:5:\"fiddb\";N;s:8:\"moduleid\";s:0:\"\";s:5:\"stype\";s:1:\"4\";s:2:\"yz\";s:3:\"all\";s:10:\"timeformat\";s:11:\"Y-m-d H:i:s\";s:5:\"order\";s:4:\"list\";s:3:\"asc\";s:4:\"DESC\";s:6:\"levels\";s:3:\"all\";s:7:\"rowspan\";s:2:\"10\";s:3:\"sql\";s:135:\"(SELECT * FROM qb_dianping_content  WHERE city_id=\'$GLOBALS[city_id]\'  AND city_id=\'$GLOBALS[city_id]\' ) ORDER BY list DESC LIMIT 0,10 \";s:7:\"colspan\";s:1:\"1\";s:8:\"titlenum\";s:2:\"40\";s:10:\"titleflood\";s:1:\"0\";s:9:\"start_num\";s:1:\"1\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:2:\"50\";s:5:\"div_h\";s:2:\"30\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindext4']=array(
				'typesystem'=>'1',
				'type'=>'Info_dianping_',
				'code'=>'a:30:{s:13:\"tplpart_1code\";s:231:\"<li>
<div class=\"img\"><a href=\"$url\" target=\"_blank\"><img src=\"$picurl\" onerror=\"this.src=\'$webdb[www_url]/images/default/nopic.jpg\'\" height=\"100\"/></a> </div>
<div class=\"t\"><a href=\"$url\" target=\"_blank\">$title</a></div>
</li>\";s:13:\"tplpart_2code\";s:0:\"\";s:3:\"SYS\";s:2:\"wn\";s:6:\"wninfo\";s:9:\"dianping_\";s:7:\"typefid\";N;s:6:\"cityId\";s:17:\"$GLOBALS[city_id]\";s:5:\"width\";s:3:\"250\";s:6:\"height\";s:3:\"187\";s:8:\"rolltype\";s:10:\"scrollLeft\";s:8:\"rolltime\";s:1:\"3\";s:11:\"roll_height\";s:2:\"50\";s:11:\"content_num\";s:2:\"80\";s:7:\"newhour\";s:2:\"24\";s:7:\"hothits\";s:2:\"30\";s:7:\"tplpath\";s:0:\"\";s:6:\"DivTpl\";i:1;s:5:\"fiddb\";N;s:8:\"moduleid\";s:0:\"\";s:5:\"stype\";s:1:\"p\";s:2:\"yz\";s:3:\"all\";s:10:\"timeformat\";s:11:\"Y-m-d H:i:s\";s:5:\"order\";s:4:\"list\";s:3:\"asc\";s:4:\"DESC\";s:6:\"levels\";s:3:\"all\";s:7:\"rowspan\";s:1:\"9\";s:3:\"sql\";s:146:\"(SELECT * FROM qb_dianping_content  WHERE ispic=1 AND city_id=\'$GLOBALS[city_id]\'  AND city_id=\'$GLOBALS[city_id]\' ) ORDER BY list DESC LIMIT 0,9 \";s:7:\"colspan\";s:1:\"1\";s:8:\"titlenum\";s:2:\"20\";s:10:\"titleflood\";s:1:\"0\";s:9:\"start_num\";s:1:\"1\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:2:\"50\";s:5:\"div_h\";s:2:\"30\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindext5']=array(
				'typesystem'=>'0',
				'type'=>'pic',
				'code'=>'a:4:{s:6:\"imgurl\";s:34:\"../images/fashion/dianping/ad1.gif\";s:7:\"imglink\";s:1:\"#\";s:5:\"width\";s:3:\"980\";s:6:\"height\";s:2:\"70\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindext6']=array(
				'typesystem'=>'1',
				'type'=>'Info_dianping_',
				'code'=>'a:30:{s:13:\"tplpart_1code\";s:127:\"<div class=\"listd\"><span class=\"span$i\">$i</span><a href=\"$url\" target=\"_blank\">$title</a><em><font>{$hits}</font>次</em></div>\";s:13:\"tplpart_2code\";s:0:\"\";s:3:\"SYS\";s:2:\"wn\";s:6:\"wninfo\";s:9:\"dianping_\";s:7:\"typefid\";N;s:6:\"cityId\";s:17:\"$GLOBALS[city_id]\";s:5:\"width\";s:3:\"250\";s:6:\"height\";s:3:\"187\";s:8:\"rolltype\";s:10:\"scrollLeft\";s:8:\"rolltime\";s:1:\"3\";s:11:\"roll_height\";s:2:\"50\";s:11:\"content_num\";s:2:\"80\";s:7:\"newhour\";s:2:\"24\";s:7:\"hothits\";s:2:\"30\";s:7:\"tplpath\";s:0:\"\";s:6:\"DivTpl\";i:1;s:5:\"fiddb\";N;s:8:\"moduleid\";s:0:\"\";s:5:\"stype\";s:1:\"4\";s:2:\"yz\";s:3:\"all\";s:10:\"timeformat\";s:11:\"Y-m-d H:i:s\";s:5:\"order\";s:4:\"hits\";s:3:\"asc\";s:4:\"DESC\";s:6:\"levels\";s:3:\"all\";s:7:\"rowspan\";s:2:\"10\";s:3:\"sql\";s:135:\"(SELECT * FROM qb_dianping_content  WHERE city_id=\'$GLOBALS[city_id]\'  AND city_id=\'$GLOBALS[city_id]\' ) ORDER BY hits DESC LIMIT 0,10 \";s:7:\"colspan\";s:1:\"1\";s:8:\"titlenum\";s:2:\"26\";s:10:\"titleflood\";s:1:\"0\";s:9:\"start_num\";s:1:\"1\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:2:\"50\";s:5:\"div_h\";s:2:\"30\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindext7']=array(
				'typesystem'=>'1',
				'type'=>'Info_dianping_',
				'code'=>'a:30:{s:13:\"tplpart_1code\";s:458:\"<div class=\"listpic\">
<div class=\"img\"><div><a href=\"$url\" target=\"_blank\"><img src=\"$picurl\" onerror=\"this.src=\'$webdb[www_url]/images/default/nopic.jpg\'\" width=\"110\" /></a></div></div>
<div class=\"word\">
<div class=\"t\"><a href=\"$url\" target=\"_blank\" class=\"title\">$title</a></div>
<div class=\"m\">发布日期:{$time_Y}年{$time_m}月{$time_d}日</div>
<div class=\"m\">所属栏目:<a href=\"$list_url\" target=\"_blank\" class=\"f\">[{$fname}]</a></div>
</div>
</div>\";s:13:\"tplpart_2code\";s:0:\"\";s:3:\"SYS\";s:2:\"wn\";s:6:\"wninfo\";s:9:\"dianping_\";s:7:\"typefid\";N;s:6:\"cityId\";s:17:\"$GLOBALS[city_id]\";s:5:\"width\";s:3:\"250\";s:6:\"height\";s:3:\"187\";s:8:\"rolltype\";s:10:\"scrollLeft\";s:8:\"rolltime\";s:1:\"3\";s:11:\"roll_height\";s:2:\"50\";s:11:\"content_num\";s:2:\"80\";s:7:\"newhour\";s:2:\"24\";s:7:\"hothits\";s:2:\"30\";s:7:\"tplpath\";s:0:\"\";s:6:\"DivTpl\";i:1;s:5:\"fiddb\";N;s:8:\"moduleid\";s:0:\"\";s:5:\"stype\";s:1:\"p\";s:2:\"yz\";s:3:\"all\";s:10:\"timeformat\";s:11:\"Y-m-d H:i:s\";s:5:\"order\";s:10:\"levelstime\";s:3:\"asc\";s:4:\"DESC\";s:6:\"levels\";s:3:\"all\";s:7:\"rowspan\";s:1:\"8\";s:3:\"sql\";s:152:\"(SELECT * FROM qb_dianping_content  WHERE ispic=1 AND city_id=\'$GLOBALS[city_id]\'  AND city_id=\'$GLOBALS[city_id]\' ) ORDER BY levelstime DESC LIMIT 0,8 \";s:7:\"colspan\";s:1:\"1\";s:8:\"titlenum\";s:2:\"40\";s:10:\"titleflood\";s:1:\"0\";s:9:\"start_num\";s:1:\"1\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:2:\"50\";s:5:\"div_h\";s:2:\"30\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindext8']=array(
				'typesystem'=>'0',
				'type'=>'pic',
				'code'=>'a:4:{s:6:\"imgurl\";s:34:\"../images/fashion/dianping/ad2.gif\";s:7:\"imglink\";s:1:\"#\";s:5:\"width\";s:3:\"230\";s:6:\"height\";s:2:\"70\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:0:\"\";s:5:\"div_h\";s:0:\"\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
$TagDB['fashion_dianpingindext9']=array(
				'typesystem'=>'1',
				'type'=>'Info_dianping_',
				'code'=>'a:30:{s:13:\"tplpart_1code\";s:186:\"<div class=\"listn\">
<div class=\"t\"><a href=\"$url\" target=\"_blank\" class=\"title\">$title</a></div>
<div class=\"address\">{$address}</div>
<div class=\"d\">{$time_m}-{$time_d}</div>
</div>\";s:13:\"tplpart_2code\";s:0:\"\";s:3:\"SYS\";s:2:\"wn\";s:6:\"wninfo\";s:9:\"dianping_\";s:7:\"typefid\";N;s:6:\"cityId\";s:17:\"$GLOBALS[city_id]\";s:5:\"width\";s:3:\"250\";s:6:\"height\";s:3:\"187\";s:8:\"rolltype\";s:10:\"scrollLeft\";s:8:\"rolltime\";s:1:\"3\";s:11:\"roll_height\";s:2:\"50\";s:11:\"content_num\";s:2:\"80\";s:7:\"newhour\";s:2:\"24\";s:7:\"hothits\";s:2:\"30\";s:7:\"tplpath\";s:0:\"\";s:6:\"DivTpl\";i:1;s:5:\"fiddb\";N;s:8:\"moduleid\";s:0:\"\";s:5:\"stype\";s:1:\"4\";s:2:\"yz\";s:3:\"all\";s:10:\"timeformat\";s:11:\"Y-m-d H:i:s\";s:5:\"order\";s:4:\"list\";s:3:\"asc\";s:4:\"DESC\";s:6:\"levels\";s:3:\"all\";s:7:\"rowspan\";s:1:\"5\";s:3:\"sql\";s:134:\"(SELECT * FROM qb_dianping_content  WHERE city_id=\'$GLOBALS[city_id]\'  AND city_id=\'$GLOBALS[city_id]\' ) ORDER BY list DESC LIMIT 0,5 \";s:7:\"colspan\";s:1:\"1\";s:8:\"titlenum\";s:2:\"40\";s:10:\"titleflood\";s:1:\"0\";s:9:\"start_num\";s:1:\"1\";}',
				'divcode'=>'a:3:{s:5:\"div_w\";s:2:\"50\";s:5:\"div_h\";s:2:\"30\";s:11:\"div_bgcolor\";s:0:\"\";}'
				);
?>