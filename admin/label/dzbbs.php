<?php
!function_exists('html') && exit('ERR');
if($action=='mod'){

	if(strstr($tplpart_1,'$picurl')){
		showmsg('��ʱ���ܵ���ͼƬ��ʽ,�����Ϊ��������ʽ!');
	}
	$sqlmin=intval($start_num)-1; $sqlmin<0 && $sqlmin=0;

	$_url=$webdb[dzbbs_showurl];
	$_listurl=$webdb[dzbbs_listurl];

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
		$SQL.=" AND A.digest='$digest' ";
	}
	if($fiddb[0]){
		foreach($fiddb AS $key=>$value){
			if(!is_numeric($value)){
				unset($fiddb[$key]);
			}
		}
		$fids=implode(",",$fiddb);
		$fids && $SQL.=" AND A.fid IN ($fids) ";
	}

	//��ģ�����ģ�����Ҫ��ȡ��Ŀ���ƵĻ�.Ҫ����һ����
	$_SQL1=$_SQL2='';
	if(strstr($postdb[tplpart_1code],'$fname')||strstr($postdb[tplpart_2code],'$fname')){
		$_SQL1=" ,F.name AS fname ";
		$_SQL2=" LEFT JOIN {$webdb[dzbbs_pre]}forum_forum F ON F.fid=A.fid ";
	}
	
	//�и���ģ��Ļ�,Ҫ�ر���.������Ǹ���ģ����ͼƬ�Ļ�,��Ҫ����һ������,����Ļ�.���Ǵ���ģ���ȡ.
	/*
	if(strstr($postdb[tplpart_2code],'$picurl')&&!strstr($postdb[tplpart_1code],'$picurl')){
		if(strstr($postdb[tplpart_2code],'$content')){
			$SQL2=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.dateline AS posttime,C.message AS content,Att.attachment$_SQL1 FROM {$webdb[dzbbs_pre]}forum_attachment_0 Att LEFT JOIN {$webdb[dzbbs_pre]}forum_thread A ON Att.tid=A.tid LEFT JOIN {$webdb[dzbbs_pre]}forum_post C ON A.tid=C.tid$_SQL2 $SQL AND Att.isimage='1' GROUP BY tid ORDER BY A.$order $asc LIMIT $sqlmin,1 ";
		}else{
			$SQL2=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.dateline AS posttime,Att.attachment$_SQL1 FROM {$TB_pre}attachments Att LEFT JOIN {$webdb[dzbbs_pre]}forum_thread A ON Att.tid=A.tid$_SQL2 $SQL AND Att.isimage='1' GROUP BY tid ORDER BY A.$order $asc LIMIT $sqlmin,1 ";
		}
		$postdb[sql2]=$SQL2;
	}
	*/

	//�������ģ��Ҳ�����ݵĻ�.ͬ��Ҫ��ȡ��������
	/*
	if(strstr($postdb[tplpart_1code],'$picurl')&&(strstr($postdb[tplpart_1code],'$content')||strstr($postdb[tplpart_2code],'$content'))){
		$SQL=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.dateline AS posttime,C.message AS content,At.attachment$_SQL1 FROM {$TB_pre}attachments At LEFT JOIN {$webdb[dzbbs_pre]}forum_thread A ON At.tid=A.tid LEFT JOIN {$webdb[dzbbs_pre]}forum_post C ON A.tid=C.tid$_SQL2 $SQL AND At.isimage='1' GROUP BY At.tid ORDER BY A.$order $asc LIMIT $sqlmin,$rows ";
	}elseif(strstr($postdb[tplpart_1code],'$picurl')||$stype=='r'){
		$SQL=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.dateline AS posttime,At.attachment$_SQL1 FROM {$TB_pre}attachments At LEFT JOIN {$webdb[dzbbs_pre]}forum_thread A ON At.tid=A.tid$_SQL2 $SQL AND At.isimage='1' GROUP BY At.tid ORDER BY A.$order $asc LIMIT $sqlmin,$rows ";
	}else
	*/
	if( strstr($postdb[tplpart_1code],'$content')||strstr($postdb[tplpart_2code],'$content') ){
		$SQL=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.dateline AS posttime,C.message AS content$_SQL1 FROM {$webdb[dzbbs_pre]}forum_thread A LEFT JOIN {$webdb[dzbbs_pre]}forum_post C ON A.tid=C.tid$_SQL2 $SQL ORDER BY A.$order $asc LIMIT $sqlmin,$rows ";
	}else{
		$SQL=" SELECT A.*,A.tid AS id,A.author AS username,A.authorid AS uid,A.subject AS title,A.dateline AS posttime$_SQL1 FROM {$webdb[dzbbs_pre]}forum_thread A$_SQL2 $SQL ORDER BY A.$order $asc LIMIT $sqlmin,$rows ";
	}

	$postdb[SYS]='dzbbs';
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
	$postdb[sql2]=$SQL2;
	$postdb[colspan]=$colspan;
	$postdb[titlenum]=$titlenum;
	$postdb[titlenum2]=$titlenum2;
	$postdb[titleflood]=$titleflood; $postdb[start_num]=$start_num;

	$postdb[width]=$width;
	$postdb[height]=$height;

	$postdb[rolltype]=$rolltype;
	$postdb[rolltime]=$rolltime;
	$postdb[roll_height]=$roll_height;
	
	$postdb[content_num]=$content_num;
	$postdb[content_num2]=$content_num2;

	$code=addslashes(serialize($postdb));
	$div_db[div_w]=$div_w;
	$div_db[div_h]=$div_h;
	$div_db[div_bgcolor]=$div_bgcolor;
	$div=addslashes(serialize($div_db));
	$typesystem=1;
	
	//�������±�ǩ��
	do_post();

}else{
	if(!$db->query("SELECT * FROM {$webdb[dzbbs_pre]}forum_forum LIMIT 1",'',0)){
		showmsg("��̳�����ݱ�ǰ׺���ԡ�{$webdb[dzbbs_pre]}������鿴��̳�ļ�/config/config_global.php����tablepre��һ��");
	}
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
	$width				|| $width=250;
	$height				|| $height=187;
	$newhour	|| $newhour=24;
	$hothits	|| $hothits=100;

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
	is_numeric($digest)?$digestDB[$digest]='checked':$digestDB[all]='checked';
	$fiddb=explode(",",$codedb[fiddb]);
	$select_news=discuz_fid($name='fiddb[]',$fiddb);

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
	require("template/label/dzbbs.htm");
	require("foot.php");

}



function discuz_fid($name='fid',$fiddb){
	global $db,$webdb;
	$query = $db->query("SELECT * FROM {$webdb[dzbbs_pre]}forum_forum WHERE fup=0 AND status=1");
	while($rs = $db->fetch_array($query)){
		$ck=in_array($rs[fid],$fiddb)?' selected ':'';
		$show.="<option value='$rs[fid]' $ck>$rs[name]</option>";
		$query2 = $db->query("SELECT * FROM {$webdb[dzbbs_pre]}forum_forum WHERE fup=$rs[fid]");
		while($rs2 = $db->fetch_array($query2)){
			$ck=in_array($rs2[fid],$fiddb)?' selected ':'';
			$show.="<option value='$rs2[fid]' $ck>&nbsp;&nbsp;|--$rs2[name]</option>";
			$query3 = $db->query("SELECT * FROM {$webdb[dzbbs_pre]}forum_forum WHERE fup=$rs2[fid]");
			while($rs3 = $db->fetch_array($query3)){
				$ck=in_array($rs3[fid],$fiddb)?' selected ':'';
				$show.="<option value='$rs3[fid]' $ck>&nbsp;&nbsp;&nbsp;&nbsp;|--$rs3[name]</option>";
				$query4 = $db->query("SELECT * FROM {$webdb[dzbbs_pre]}forum_forum WHERE fup=$rs3[fid]");
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