<?php
!function_exists('html') && exit('ERR');

if($job=="showtplpart")
{
	//$show="<select name='tplpart'  onChange='M_jumpMenu2(this,$t)'><option>��ѡ��</option>";
	unset($show);
	$query=$db->query(" SELECT * FROM {$pre}template WHERE type='$ctype' ");
	while($rs=$db->fetch_array($query)){
		if(!$rs[name]){
			$rs[name]="ģ��$rs[id]";
		}
		$show.="<option value='$rs[filepath]' >$rs[name]</option>";
	}
	//$show.="</select>";
	echo "<meta http-equiv='Content-Type' content='text/html; charset=gb2312'><SCRIPT LANGUAGE='JavaScript'>
	<!--
	parent.showtype(\"<select name='tplpart'  onChange='M_jumpMenu2(this,1)'><option>��ѡ��</option><option style='color:red;' value='-1' >�½�һ��ģ��</option>$show</select>\",1);
	parent.showtype(\"<select name='tplpart'  onChange='M_jumpMenu2(this,2)'><option>��ѡ��</option><option style='color:red;' value='-1' >�½�һ��ģ��</option>$show</select>\",2);
	//-->
	</SCRIPT>";
	exit;
}
elseif($job=="gethtmlcode")
{	
	//��ȡģ��HTMLԴ����
	if(!ereg("\.htm$",$filepath)){
		echo "<SCRIPT LANGUAGE=\"JavaScript\">
		<!--
		alert('������.htmģ��');
		//-->
		</SCRIPT>";
		exit;
	}
	$code=read_file(ROOT_PATH.$filepath);
	$code=AddSlashes($code);
	$code=str_replace("\r",'\r',$code);
	$code=str_replace("\n",'\n',$code);
	echo "<SCRIPT LANGUAGE=\"JavaScript\">
	<!--
	//alert('$filepath');
	parent.puthtmlcode('$divid','$code');
	//-->
	</SCRIPT>";
}
elseif($action=='mod'){
	$sqlmin=intval($start_num)-1; $sqlmin<0 && $sqlmin=0;
	
	/*
	$array=explode("\r\n",$webdb[Info_module]);
	foreach( $array AS $key=>$value){
		$detail=explode("|",$value);
		if("$pre$detail[0]"==$_pre){
			$_url=$detail[3].'/bencandy.php?id=$id&fid=$fid';
			$_listurl=$detail[3].'/list.php?&fid=$fid';
		}
	}
	*/

	$infokey=str_replace("$pre","",$_pre);

	if($s_type=='bbs')
	{
		$bfile='/index.php?file=viewbbs&uid=$fid&id=$id';
	}
	elseif($s_type=='photo')
	{
		$bfile='/index.php?file=viewphoto&uid=$unite_id&id=$id';
	}
	elseif($s_type=='group')
	{
		$bfile='/index.php?uid=$uid';
	}

	if($ModuleDB[$infokey]['domain'])
	{
		$_url=$ModuleDB[$infokey][domain].$bfile;
	}
	else
	{
		$_url='$webdb[www_url]'.'/'.$ModuleDB[$infokey]['dirname'].$bfile;
	}

	if($tplpart_1)
	{
		$postdb[tplpart_1]=StripSlashes($tplpart_1);
		$postdb[tplpart_1code]=$postdb[tplpart_1];
		//$postdb[tplpart_1code]=read_file(ROOT_PATH.$tplpart_1);
		$postdb[tplpart_1code]=str_replace('{$url}',$_url,$postdb[tplpart_1code]);
		$postdb[tplpart_1code]=str_replace('$url',$_url,$postdb[tplpart_1code]);

		if(!$postdb[tplpart_1code]){
			showmsg("ģ��һ·�����Ի���������ԭ��,ģ�����ݶ�ȡʧ��,����֮");
		}
	}
	if($tplpart_2)
	{
		$postdb[tplpart_2]=StripSlashes($tplpart_2);
		$postdb[tplpart_2code]=$postdb[tplpart_2];
		//$postdb[tplpart_2code]=read_file(ROOT_PATH.$tplpart_2);
		$postdb[tplpart_2code]=str_replace('{$url}',$_url,$postdb[tplpart_2code]);
		$postdb[tplpart_2code]=str_replace('$url',$_url,$postdb[tplpart_2code]);

		if(!$postdb[tplpart_2code]){
			showmsg("ģ���·�����Ի���������ԭ��,ģ�����ݶ�ȡʧ��,����֮");
		}
	}

	$SQL=" WHERE 1 ";

	if($rowspan<1){
		$rowspan=1;
	}
	if($colspan<1){
		$colspan=1;
	}
	$rows=$rowspan*$colspan;
	if(is_numeric($yz)&&$s_type!='group'){
		$SQL.=" AND yz=$yz ";
	}
	if(is_numeric($levels)){
		if($s_type=='group'){
			$SQL.=" AND iscom=$levels ";
		}else{
			$SQL.=" AND levels=$levels ";
		}
	}
	
	if($s_type=='group'){
		$_order=$order;
		if($order=='id'){
			$_order='uid';
		}
		$SQL=" SELECT *,webname AS title,intro AS content,logo AS picurl FROM {$_pre}group $SQL ORDER BY $_order $asc LIMIT $sqlmin,$rows ";
	}elseif($s_type=='bbs'){
		$_order=$order;
		if($order=='id'){
			$_order='tid';
		}
		$SQL=" SELECT *,tid AS id FROM {$_pre}forum_topic $SQL ORDER BY $_order $asc LIMIT $sqlmin,$rows ";
	}else{
		$SQL=" SELECT * FROM {$_pre}photo_pic $SQL ORDER BY $order $asc LIMIT $sqlmin,$rows ";
	}
	


	$postdb[wninfo]=$infokey;
	$postdb[RollStyleType]=$RollStyleType;

	$postdb[url]=$_url;
	$postdb[width]=$width;
	$postdb[height]=$height;
	$postdb[content_num]=$content_num;

	$postdb[tplpath]=$tplpath;
	$postdb[s_type]=$s_type;
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
	$postdb[sql]=$SQL;
	$postdb[colspan]=$colspan;
	$postdb[titlenum]=$titlenum;
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
	$s_type				|| $s_type='bbs';
	$content_num		|| $content_num=80;

	$div_width && $div_w=$div_width;
	$div_height && $div_h=$div_height;

	$yzdb[$yz]="checked";
	$ascdb[$asc]="checked";
	$orderdb[$order]=" selected ";
	$levels && $_levels=" checked ";
	$titleflooddb["$titleflood"]="checked"; 
	$start_num>0 || $start_num=1;
	$hidedb[$hide]="checked";
	$divtpldb[$DivTpl]="checked";
	$s_typedb[$s_type]=" checked ";
	$fiddb=$codedb[fiddb];

	$tplpart_1=str_replace("&nbsp;","&amp;nbsp;",$tplpart_1);
	$tplpart_2=str_replace("&nbsp;","&amp;nbsp;",$tplpart_2);

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
	require("template/label/group.htm");
	require("foot.php");

}


/*������Ŀ��CLASS��ֵ*/
function update_class($fid,$Class){

}
?>