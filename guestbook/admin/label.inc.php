<?php
!function_exists('html') && exit('ERR');
if($action=='mod'){
	$sqlmin=intval($start_num)-1; $sqlmin<0 && $sqlmin=0;
	if($tplpart_2==''){
	//	$stype='t';
	}
	
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

	//$_url='$webdb[www_url]/bencandy.php?fid=$fid&aid=$aid';

	//$_listurl='$webdb[www_url]/list.php?fid=$fid';

	if($tplpart_1)
	{
		$postdb[tplpart_1]=StripSlashes($tplpart_1);
		$postdb[tplpart_1code]=$postdb[tplpart_1];
		//$postdb[tplpart_1code]=read_file(ROOT_PATH.$tplpart_1);
		/*
		$postdb[tplpart_1code]=str_replace('{$url}',$_url,$postdb[tplpart_1code]);
		$postdb[tplpart_1code]=str_replace('$url',$_url,$postdb[tplpart_1code]);

		$postdb[tplpart_1code]=str_replace('{$list_url}',$_listurl,$postdb[tplpart_1code]);
		$postdb[tplpart_1code]=str_replace('$list_url',$_listurl,$postdb[tplpart_1code]);

		*/
		if(!$postdb[tplpart_1code]){
			//showmsg("ģ��һ·�����Ի���������ԭ��,ģ�����ݶ�ȡʧ��,����֮");
		}
		//$rs1=$db->get_one("SELECT type FROM {$pre}template WHERE filepath='$tplpart_1' ");
	}
	if($tplpart_2)
	{
		$postdb[tplpart_2]=StripSlashes($tplpart_2);
		$postdb[tplpart_2code]=$postdb[tplpart_2];
		//$postdb[tplpart_2code]=read_file(ROOT_PATH.$tplpart_2);
		/*
		$postdb[tplpart_2code]=str_replace('{$url}',$_url,$postdb[tplpart_2code]);
		$postdb[tplpart_2code]=str_replace('$url',$_url,$postdb[tplpart_2code]);

		$postdb[tplpart_2code]=str_replace('{$list_url}',$_listurl,$postdb[tplpart_2code]);
		$postdb[tplpart_2code]=str_replace('$list_url',$_listurl,$postdb[tplpart_2code]);

		*/
		if(!$postdb[tplpart_2code]){
			//showmsg("ģ���·�����Ի���������ԭ��,ģ�����ݶ�ȡʧ��,����֮");
		}
		//$rs2=$db->get_one("SELECT type FROM {$pre}template WHERE filepath='$tplpart_2' ");
	}
	
	//ʹ�����߱༭����,ȥ���������ַ
	$weburl=preg_replace("/(.*)\/([^\/]+)/is","\\1/",$WEBURL);
	$postdb[tplpart_1code]=str_replace($weburl,"",$postdb[tplpart_1code]);
	$postdb[tplpart_2code]=str_replace($weburl,"",$postdb[tplpart_2code]);
	$postdb[tplpart_1code]=str_replace('$url','$webdb[www_url]/guestbook/?fid=$fid&id=$id#$id',$postdb[tplpart_1code]);
	$postdb[tplpart_2code]=str_replace('$url','$webdb[www_url]/guestbook/?fid=$fid&id=$id#$id',$postdb[tplpart_2code]);

	if($yz==1){
		$SQL=" WHERE A.yz=1 ";
	}else{
		$SQL=" WHERE 1 ";
	}
	//if($levels==1){
	//	$SQL.=" AND A.ifcom=1 ";
	//}

	if($rowspan<1){
		$rowspan=1;
	}
	if($colspan<1){
		$colspan=1;
	}
	$rows=$rowspan*$colspan;
	
	$SQL=" SELECT A.*,content AS title FROM {$_pre}content A $SQL ORDER BY A.id DESC LIMIT $sqlmin,$rows ";
	
	$postdb[SYS]='guestbook';
	$postdb[roll_height]=$roll_height;
	$postdb[url]=$_url;
	$postdb[width]=$width;
	$postdb[height]=$height;
	
	$postdb[tplpath]=$tplpath;
	$postdb[DivTpl]=$DivTpl;
	$postdb[fiddb]=$fids;
	$postdb[stype]=$stype;
	$postdb[yz]=$yz;
	$postdb[hidefid]=$hidefid;
	$postdb[timeformat]=$timeformat;
	$postdb[order]=$order;
	$postdb[asc]=$asc;
	$postdb[levels]=$levels;
	$postdb[rowspan]=$rowspan;
	$postdb[sql]=$SQL;
	$postdb[colspan]=$colspan;
	$postdb[content_num]=$content_num;
	$postdb[titlenum]=$titlenum;
	$postdb[titleflood]=$titleflood; $postdb[start_num]=$start_num;

	$postdb[c_rolltype]=$c_rolltype;
	
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
	
	if(!isset($levels)){
		$levels="all";
	}
	if(!isset($order)){
		$order="list";
	}
	$titleflood=(int)$titleflood;
	$hide=(int)$rsdb[hide];
	if($rsdb[js_time]){
		$js_ck='checked';
	}

	/*Ĭ��ֵ*/
	$yz==1 || $yz='all';
	$asc || $asc='DESC';
	$titleflood!=1		&& $titleflood=0;
	$timeformat			|| $timeformat="Y-m-d H:i:s";
	$rowspan			|| $rowspan=5;
	$colspan			|| $colspan=1;
	$titlenum			|| $titlenum=20;
	$content_num		|| $content_num=80;
	$div_w				|| $div_w=50;
	$div_h				|| $div_h=30;
	$hide!=1			&& $hide=0;
	$DivTpl!=1			&& $DivTpl=0;
	$stype				|| $stype=4;

	$width				|| $width=200;
	$height				|| $height=200;
	$roll_height		|| $roll_height=50;
	
	$div_width && $div_w=$div_width;
	$div_height && $div_h=$div_height;
	$yzdb[$yz]="checked";
	$ascdb[$asc]="checked";
	$orderdb[$order]=" selected ";
	$levelsdb[$levels]=" checked ";
	$titleflooddb["$titleflood"]="checked"; 
	$start_num>0 || $start_num=1;
	$hidedb[$hide]="checked";
	$divtpldb[$DivTpl]="checked";
	$stypedb[$stype]=" checked ";
	$_hidefid[intval($hidefid)]=" checked ";
	$fiddb=explode(",",$codedb[fiddb]);
	
	$c_rolltype || $c_rolltype=0;

	$c_rolltypedb[$c_rolltype]=" checked ";

	$tplpart_1=str_replace("&nbsp;","&amp;nbsp;",$tplpart_1);
	$tplpart_2=str_replace("&nbsp;","&amp;nbsp;",$tplpart_2);
	
	$getLabelTpl=getLabelTpl($inc,array("common_title"));

	require("head.php");
	require(dirname(__FILE__)."/template/label/guestbook.htm");
	require("foot.php");

}
?>