<?php
!function_exists('html') && exit('ERR');

if($action=='mod'){
	$sqlmin=intval($start_num)-1; $sqlmin<0 && $sqlmin=0;

	//ѡ����ʾ��������,����ѡ��Table,����һ������ʾЧ��,ѡ��tableָ����һ��TABLE,ѡ��divָ���׶���Ĵ���
	if($colspan>1){
		$DivTpl=0;
	}else{
		$DivTpl=1;
	}

	$infokey=str_replace("$pre","",$_pre);
	
	$postdb[tplpart_1code]=str_replace($url1,$url2,StripSlashes($tplpart_1));
	$postdb[tplpart_2code]=str_replace($url1,$url2,StripSlashes($tplpart_2));


	//ʹ�����߱༭����,ȥ���������ַ
	$weburl=preg_replace("/(.*)\/([^\/]+)/is","\\1/",$WEBURL);
	$postdb[tplpart_1code]=str_replace($weburl,"",$postdb[tplpart_1code]);
	$postdb[tplpart_2code]=str_replace($weburl,"",$postdb[tplpart_2code]);

	/*�ж��Ƿ�����ʾͼƬ����*/
	if(strstr($postdb[tplpart_1code],'$picurl')){
		$SQL=" WHERE A.ispic=1 ";
	}else{
		$SQL=" WHERE 1 ";
	}

	if($rowspan<1){
		$rowspan=1;
	}
	if($colspan<1){
		$colspan=1;
	}
	$rows=$rowspan*$colspan;

	if(is_numeric($yz)){
		$SQL.=" AND A.yz=$yz ";
	}
	if(is_numeric($levels)){
		$SQL.=" AND A.levels=$levels ";
	}
	$_sqlsp="";
	if($fiddb){
		if(!is_array($fiddb)){
			$array=explode(",",$fiddb);
		}else{
			$array=$fiddb;
		}
		
		foreach($array AS $key=>$value){
			if(!is_numeric($value)){
				unset($array[$key]);
			}
		}
		$fiddb=implode(",",$array);
		
		//���������и���Ŀ����,Ҫ�ر���
		if($_typefid=='spfid'){
			$fiddb && $SQL.=" AND B.fid IN ($fiddb) AND A.id=B.id ";
			$_sqlsp=" LEFT JOIN {$_pre}special B ON A.id=B.id ";
		}else{
			$fiddb && $SQL.=" AND A.fid IN ($fiddb) ";
		}
	}
	if($moduleid){
		$SQL.=" AND A.mid='$moduleid' ";
		$_sqlsp || $_sqlsp=" LEFT JOIN {$_pre}content_$moduleid B ON A.id=B.id ";
		$wsql="B.*,";
	}

	//�и���ģ��Ļ�,Ҫ�ر���.������Ǹ���ģ����ͼƬ�Ļ�,��Ҫ����һ������,����Ļ�.���Ǵ���ģ���ȡ.
	if(strstr($postdb[tplpart_2code],'$picurl')&&!strstr($postdb[tplpart_1code],'$picurl'))
	{
		$SQL2="SELECT {$wsql}A.* FROM {$_pre}content A $_sqlsp $SQL AND A.ispic=1 ORDER BY $order $asc LIMIT $sqlmin,1 ";
	}

	$SQL="SELECT {$wsql}A.* FROM {$_pre}content A $_sqlsp $SQL ORDER BY $order $asc LIMIT $sqlmin,$rows ";
	
	if(strstr($postdb[tplpart_1code],'$picurl')&&strstr($postdb[tplpart_1code],'$content')){
		$stype="cp";
	}elseif(strstr($postdb[tplpart_1code],'$content')){
		$stype="c";
	}elseif(strstr($postdb[tplpart_1code],'$picurl')){
		$stype="p";
	}



	$postdb[SYS]='wn';

	$postdb[RollStyleType]=$RollStyleType;
	$postdb[wninfo]=$infokey;
	$postdb[typefid]=$_typefid;

	$postdb[width]=$width;
	$postdb[height]=$height;
	$postdb[rolltype]=$rolltype;
	$postdb[rolltime]=$rolltime;
	$postdb[roll_height]=$roll_height;

	$postdb[content_num]=$content_num;
	$postdb[content_num2]=$content_num2;
	
	$postdb[newhour]=$newhour;
	$postdb[hothits]=$hothits;

	$postdb[tplpath]=$tplpath;
	$postdb[DivTpl]=$DivTpl;
	$postdb[fiddb]=$fiddb;
	$postdb[moduleid]=$moduleid;
	$postdb[stype]=$stype;
	$postdb[yz]=$yz;
	$postdb[timeformat]=$timeformat;
	$postdb[order]=$order;
	$postdb[asc]=$asc;
	$postdb[levels]=$levels;
	$postdb[rowspan]=$rowspan;
	$postdb[sql]=$SQL;			//��ģ��
	$postdb[sql2]=$SQL2;		//����ģ��
	$postdb[colspan]=$colspan;
	$postdb[titlenum]=$titlenum;
	$postdb[titlenum2]=$titlenum2;

	$postdb[titleflood]=$titleflood; $postdb[start_num]=$start_num;
	
	$code=addslashes(serialize($postdb));
	$div_db[div_w]=$div_w;
	$div_db[div_h]=$div_h;
	$div_db[div_bgcolor]=$div_bgcolor;
	$div=addslashes(serialize($div_db));
	$typesystem=1;
	
	//�������±�ǩ��
	do_post();

}else{
	$modulename=$ModuleDB[str_replace("Info_","",$inc)][name];
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
	$content_num		|| $content_num=80;
	$width				|| $width=250;
	$height				|| $height=187;
	$roll_height		|| $roll_height=50;
	$newhour	|| $newhour=24;
	$hothits	|| $hothits=30;


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
	$fiddb=$codedb[fiddb];
 	//$select_news=$Guidedb->Checkbox("{$cDB[sort]}",'fiddb[]',$fiddb);
	
	if( is_table("{$_pre}module") ){
		$select_module="<select name='moduleid'>";
		$query = $db->query("SELECT * FROM {$_pre}module ORDER BY id DESC");
		while($rs = $db->fetch_array($query)){
			$ck=$rs[id]==$codedb[moduleid]?' selected ':' ';
			$select_module.="<option value='$rs[id]' $ck>$rs[name]</option>";
		}
		$select_module.="</select>";
	}
	
	@extract($db->get_one("SELECT COUNT(*) AS SORTNUM FROM {$_pre}sort"));
	if($SORTNUM<2000)
	{
		update_class(0,0);
		$select_sort=$Guidedb->Checkbox("{$_pre}sort",'fiddb[]',explode(",",$fiddb));
	}
	
	//���������и���Ŀ,Ҫ�ر���
	if(($_typefid=='spfid'||($_typefid!='fid'&&$typefid=='spfid'))&&is_table("{$_pre}special")){
		$select_sort=$Guidedb->Checkbox("{$_pre}spsort",'fiddb[]',explode(",",$fiddb));
		$ck_typefid[spfid]=' checked ';
	}else{
		$ck_typefid[fid]=' checked ';
	}
	
	$tplpart_1=str_replace("&nbsp;","&amp;nbsp;",$tplpart_1);
	$tplpart_2=str_replace("&nbsp;","&amp;nbsp;",$tplpart_2);

	//$getLabelTpl=getLabelTpl('info',array("common_title","common_pic","common_content","common_fname"));
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
	require("template/label/info.htm");
	require("foot.php");

}


/*������Ŀ��CLASS��ֵ*/
function update_class($fid,$Class){
	global $db,$_pre,$IS_BIZ;
	//$IS_BIZ || die();
	$Class++;
	$db->query("UPDATE {$_pre}sort SET class=$Class WHERE fid='$fid'");
	$query=$db->query("SELECT fid FROM {$_pre}sort WHERE fup='$fid'");
	while( $rs=$db->fetch_array($query) ){
		update_class($rs[fid],$Class);
	}
}
?>