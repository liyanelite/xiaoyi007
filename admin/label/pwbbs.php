<?php
!function_exists('html') && exit('ERR');
if($action=='mod'){
	$sqlmin=intval($start_num)-1; $sqlmin<0 && $sqlmin=0;

	//��ͨ����ַ�����滻����ʵ��ַ
	$_url='$webdb[passport_url]/read.php?tid=$tid&page=1';
	$_listurl='$webdb[passport_url]/thread.php?fid=$fid';

	$url1=array('{$url}','$url','{$list_url}','$list_url');
	$url2=array($_url,$_url,$_listurl,$_listurl);
	
	$postdb[tplpart_1code]=str_replace($url1,$url2,StripSlashes($tplpart_1));
	$postdb[tplpart_2code]=str_replace($url1,$url2,StripSlashes($tplpart_2));

	//ʹ�����߱༭����,ȥ���������ַ
	$weburl=preg_replace("/(.*)\/([^\/]+)/is","\\1/",$WEBURL);
	$postdb[tplpart_1code]=str_replace($weburl,"",$postdb[tplpart_1code]);
	$postdb[tplpart_2code]=str_replace($weburl,"",$postdb[tplpart_2code]);

	if(strstr($postdb[tplpart_1code],'$picurl')&&strstr($postdb[tplpart_1code],'$content')){
		$stype="cp";
	}elseif(strstr($postdb[tplpart_1code],'$content')){
		$stype="c";
	}elseif(strstr($postdb[tplpart_1code],'$picurl')){
		$stype="p";
	}

	//ѡ����ʾ��������,����ѡ��Table,����һ������ʾЧ��,ѡ��tableָ����һ��TABLE,ѡ��divָ���׶���Ĵ���
	if($colspan>1){
		$DivTpl=0;
	}else{
		$DivTpl=1;
	}

	if($rowspan<1){
		$rowspan=1;
	}
	if($colspan<1){
		$colspan=1;
	}
	$rows=$rowspan*$colspan;

	//�и���ģ��ʱ,Ҫ�Ӷ�һ��,������ͬ�ļ�¼
	if($postdb[tplpart_2code]){
		$rows++;
	}	

	$SQL=" WHERE 1 ";

	//��������
	if(is_numeric($digest)){
		$SQL.=" AND T.digest!=0 ";
	}
	//ָ����Ŀ������
	if($fiddb[0]){
		foreach($fiddb AS $key=>$value){
			if(!is_numeric($value)){
				unset($fiddb[$key]);
			}
		}
		$fids=implode(",",$fiddb);
		$fids && $SQL.=" AND T.fid IN ($fids) ";
	}

	//��ģ�����ģ�����Ҫ��ȡ��Ŀ���ƵĻ�.Ҫ����һ����
	$_SQL1=$_SQL2='';
	if(strstr($postdb[tplpart_1code],'$fname')||strstr($postdb[tplpart_2code],'$fname')){
		$_SQL1=" ,F.name AS fname ";
		$_SQL2=" LEFT JOIN {$TB_pre}forums F ON F.fid=T.fid ";
	}

	//�и���ģ��Ļ�,Ҫ�ر���.������Ǹ���ģ����ͼƬ�Ļ�,��Ҫ����һ������,����Ļ�.���Ǵ���ģ���ȡ.
	if(strstr($postdb[tplpart_2code],'$picurl')&&!strstr($postdb[tplpart_1code],'$picurl')){
		if(strstr($postdb[tplpart_2code],'$content')){
			$SQL2=" SELECT T.*,T.tid AS id,T.author AS username,T.authorid AS uid,T.subject AS title,T.postdate AS posttime,C.content,A.attachurl$_SQL1 FROM {$TB_pre}attachs A LEFT JOIN {$TB_pre}threads T ON A.tid=T.tid LEFT JOIN {$TB_pre}tmsgs C ON T.tid=C.tid$_SQL2 $SQL AND A.type='img' GROUP BY A.tid ORDER BY T.$order $asc,T.tid DESC LIMIT $sqlmin,1 ";
		}else{
			$SQL2=" SELECT T.*,T.tid AS id,T.author AS username,T.authorid AS uid,T.subject AS title,T.postdate AS posttime,A.attachurl$_SQL1 FROM {$TB_pre}attachs A LEFT JOIN {$TB_pre}threads T ON A.tid=T.tid$_SQL2 $SQL AND A.type='img' GROUP BY A.tid ORDER BY T.$order $asc,T.tid DESC LIMIT $sqlmin,1 ";
		}
		$postdb[sql2]=$SQL2;
	}
	
	//�������ģ��Ҳ�����ݵĻ�.ͬ��Ҫ��ȡ��������
	if(strstr($postdb[tplpart_1code],'$picurl')&&(strstr($postdb[tplpart_1code],'$content')||strstr($postdb[tplpart_2code],'$content'))){
		$SQL=" SELECT T.*,T.tid AS id,T.author AS username,T.authorid AS uid,T.subject AS title,T.postdate AS posttime,C.content,A.attachurl$_SQL1 FROM {$TB_pre}attachs A LEFT JOIN {$TB_pre}threads T ON A.tid=T.tid LEFT JOIN {$TB_pre}tmsgs C ON T.tid=C.tid$_SQL2 $SQL AND A.type='img' GROUP BY tid ORDER BY T.$order $asc,T.tid DESC LIMIT $sqlmin,$rows ";
	}elseif(strstr($postdb[tplpart_1code],'$picurl')||$stype=='r'){
		$SQL=" SELECT T.*,T.tid AS id,T.author AS username,T.authorid AS uid,T.subject AS title,T.postdate AS posttime,A.attachurl$_SQL1 FROM {$TB_pre}attachs A LEFT JOIN {$TB_pre}threads T ON A.tid=T.tid$_SQL2 $SQL AND A.type='img' GROUP BY tid ORDER BY T.$order $asc,T.tid DESC LIMIT $sqlmin,$rows ";
	}elseif( strstr($postdb[tplpart_1code],'$content')||strstr($postdb[tplpart_2code],'$content') ){
		$SQL=" SELECT T.*,T.tid AS id,T.author AS username,T.authorid AS uid,T.subject AS title,T.postdate AS posttime,C.content$_SQL1 FROM {$TB_pre}threads T LEFT JOIN {$TB_pre}tmsgs C ON T.tid=C.tid$_SQL2 $SQL ORDER BY T.$order $asc,T.tid DESC LIMIT $sqlmin,$rows ";
	}else{
		$SQL=" SELECT T.*,T.tid AS id,T.author AS username,T.authorid AS uid,T.subject AS title,T.postdate AS posttime$_SQL1 FROM {$TB_pre}threads T$_SQL2 $SQL ORDER BY T.$order $asc,T.tid DESC LIMIT $sqlmin,$rows ";
	}
	

	//ͼƬ������Ҫ�ڱ�ǩ�����������ر���
	//$postdb['eval_code']='
	//$rs[content]=preg_replace("/\[([^\]]+)\]/is","",$rs[content]);
	//global $TB_url,$db_attachname;
	//$rs[picurl]="$TB_url/$db_attachname/thumb/$rs[attachurl]";
	//';

	//ָ����ʲôϵͳ,�����ǩ�����������ر���
	$postdb[SYS]='pwbbs';

	$postdb[RollStyleType]=$RollStyleType;

	$postdb[digest]=$digest;
	$postdb[newhour]=$newhour;
	$postdb[hothits]=$hothits;
	$postdb[tplpath]=$tplpath;
	$postdb[DivTpl]=$DivTpl;
	$postdb[fiddb]=$fids;
	$postdb[stype]=$stype;
	$postdb[yz]=$yz;
	$postdb[timeformat]=$timeformat;
	$postdb[order]=$order;
	$postdb[asc]=$asc;
	$postdb[levels]=$levels;
	$postdb[rowspan]=$rowspan;
	$postdb[sql]=$SQL;
	$postdb[colspan]=$colspan;
	$postdb[titlenum]=$titlenum;
	$postdb[titlenum2]=$titlenum2;
	$postdb[titleflood]=$titleflood; $postdb[start_num]=$start_num;
	$postdb[width]=$width;
	$postdb[height]=$height;
	$postdb[content_num]=$content_num;
	$postdb[content_num2]=$content_num2;

	$postdb[rolltype]=$rolltype;
	$postdb[rolltime]=$rolltime;
	$postdb[roll_height]=$roll_height;

	$code=addslashes(serialize($postdb));
	$div_db[div_w]=$div_w;
	$div_db[div_h]=$div_h;
	$div_db[div_bgcolor]=$div_bgcolor;
	$div=addslashes(serialize($div_db));
	$typesystem=1;

	//�������±�ǩ��
	do_post();

}else{

	$rsdb=get_label();
	$div=unserialize($rsdb[divcode]);
	@extract($div);
	$codedb=unserialize($rsdb[code]);
	@extract($codedb);
	if(!isset($yz)){
		$yz="all";
	}
	if(!isset($is_com)){
		$is_com="all";
	}
	if(!isset($order)){
		$order="posttime";
	}
	$titleflood=(int)$titleflood;
	$hide=(int)$rsdb[hide];
	if($rsdb[js_time]){
		$js_ck='checked';
	}

	/*Ĭ��ֵ*/
	$yz || $yz='all';
	$asc || $asc='DESC';
	$titleflood!=1		&& $titleflood=0;
	$timeformat			|| $timeformat="Y-m-d H:i:s";
	$rowspan			|| $rowspan=5;
	$colspan			|| $colspan=1;
	$titlenum			|| $titlenum=20;
	$div_w				|| $div_w=50;
	$div_h				|| $div_h=30;
	$hide!=1			&& $hide=0;
	$DivTpl!=1			&& $DivTpl=0;
	$stype				|| $stype=4;
	$newhour	|| $newhour=24;
	$hothits	|| $hothits=100;

	$width				|| $width=250;
	$height				|| $height=187;
	$roll_height		|| $roll_height=50;

	$content_num		|| $content_num=80;
	$titlenum2			|| $titlenum2=40;
	$content_num2		|| $content_num2=120;

	$rolltime			|| $rolltime=3;

	$_rolltype[$rolltype]=' selected ';
	
	$div_width && $div_w=$div_width;
	$div_height && $div_h=$div_height;

	$yzdb[$yz]="checked";
	$ascdb[$asc]="checked";
	$orderdb[$order]=" selected ";
	$levelsdb[$levels]=" selected ";
	$titleflooddb["$titleflood"]="checked"; 
	$start_num>0 || $start_num=1;
	$hidedb[$hide]="checked";
	$divtpldb[$DivTpl]="checked";
	$stypedb[$stype]=" checked ";
	$fiddb=explode(",",$codedb[fiddb]);
	$digest==1?$digestDB[1]='checked':$digestDB[all]='checked';
	$select_news=phpwind_fid($name='fiddb[]',$fiddb);

	$getLabelTpl=getLabelTpl($inc,array("common_title","common_pic","common_content","common_fname","common_zh_title","common_zh_pic","common_zh_content"));

	//�õ�Ƭ��ʽ
	$rollpicStyle="<select name='RollStyleType' id='RollStyleType' onChange='rollpictypes(this)'><option value=''>Ĭ��</option>";
	$dir=opendir(ROOT_PATH."template/default/rollpic/");
	while($file=readdir($dir)){
		if(eregi("\.htm$",$file)){
			$rollpicStyle.="<option value='$file'>".str_replace(".htm","",$file)."</option>";
		}
	}
	$rollpicStyle.="</select>";

	require("head.php");
	require("template/label/pwbbs.htm");
	require("foot.php");

}



function phpwind_fid($name='fid',$fiddb){
	global $db,$TB_pre;
	$query = $db->query("SELECT * FROM {$TB_pre}forums WHERE fup=0");
	while($rs = $db->fetch_array($query)){
		$ck=in_array($rs[fid],$fiddb)?' selected ':'';
		$show.="<option value='$rs[fid]' $ck>$rs[name]</option>";
		$query2 = $db->query("SELECT * FROM {$TB_pre}forums WHERE fup=$rs[fid]");
		while($rs2 = $db->fetch_array($query2)){
			$ck=in_array($rs2[fid],$fiddb)?' selected ':'';
			$show.="<option value='$rs2[fid]' $ck>&nbsp;&nbsp;|--$rs2[name]</option>";
			$query3 = $db->query("SELECT * FROM {$TB_pre}forums WHERE fup=$rs2[fid]");
			while($rs3 = $db->fetch_array($query3)){
				$ck=in_array($rs3[fid],$fiddb)?' selected ':'';
				$show.="<option value='$rs3[fid]' $ck>&nbsp;&nbsp;&nbsp;&nbsp;|--$rs3[name]</option>";
				$query4 = $db->query("SELECT * FROM {$TB_pre}forums WHERE fup=$rs3[fid]");
				while($rs4 = $db->fetch_array($query4)){
					$ck=in_array($rs4[fid],$fiddb)?' selected ':'';
					$show.="<option value='$rs4[fid]' $ck>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--$rs4[name]</option>";
				}
			}
		}
	}
	return "<select name='$name' size=20 multiple=multiple>$show</select>";
}
?>