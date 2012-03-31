<?php
require_once(dirname(__FILE__)."/global.php");
error_reporting(7);
$webdb[Info_adminfen]>0 || $webdb[Info_adminfen]=5;

$typedb=array("color"=>"�������","top"=>"�ö�","untop"=>"ȡ���ö�","del"=>"ɾ��","undel"=>"�ӻ���վ��ԭ","fen"=>"����","com"=>"�Ƽ�","uncom"=>"ȡ���Ƽ�","move"=>"ת����Ŀ","movetop"=>"��ǰ","movebottom"=>"�ú�","unyz"=>"ȡ����֤","yz"=>"ͨ����֤");

$titleDB[title]	= " $webdb[Info_webname] ";

if(!$lfjid)
{
	showerr("�㻹û�е�¼");
}

if($job=='sort')
{
	unset($listdb,$linkdb);
	$listdb=array();
	list_admin_allsort($fid,0);
	require("inc/head.php");
	require(getTpl("admin"));
	require("inc/foot.php");
	exit;
}
elseif($job=="list")
{
	$_erp=$Fid_db[tableid][$fid];
	$SQL=" WHERE fid='$fid' ";
	$rows=40;
	if(!$page){
		$page=1;
	}
	$min=($page-1)*$rows;
	$showpage=getpage("{$_pre}content$_erp","$SQL","?job=$job&fid=$fid","$rows");

	$query = $db->query("SELECT * FROM {$_pre}content$_erp $SQL ORDER BY list DESC LIMIT $min,$rows");
	while($rs = $db->fetch_array($query))
	{
		$rs[posttime]=date("Y-m-d H:i",$rs[posttime]);
		if($rs[yz]==1){
			$rs[ifyz]="<font color=blue>����</font>";
		}elseif($rs[yz]==0){
			$rs[ifyz]="δ��";
		}elseif($rs[yz]==2){
			$rs[ifyz]="����";
		}
		if($rs[levels]){
			$rs[_levels]="(<font color=red>��</font>)";
		}else{
			$rs[_levels]="";
		}
		if($rs['list']>$timestamp){
			$rs[_list]="(<font color=red>��</font>)";
		}else{
			$rs[_list]="";
		}
		$rs[pages]<1 && $rs[pages]=1;
		$rs[url]=get_info_url($rs[id],$rs[fid],$rs[city_id]);
		$rs[listurl]=get_info_url('',$rs[fid],$rs[city_id]);
		$listdb[]=$rs;
	}
	require(ROOT_PATH."inc/class.inc.php");
	$Guidedb=new Guide_DB;
	$select_fid=$Guidedb->Select("{$_pre}sort","fid");

	require("inc/head.php");
	require(getTpl("admin"));
	require("inc/foot.php");
}
elseif($action=="work")
{
	if(!$postdb)
	{
		showerr("������ѡ��һƪ����");
	}
	if( !$typedb[$ctype] )
	{
		showerr("���������Ͳ�����");
	}
	foreach( $postdb AS $key=>$id){
		do_admin_work($ctype,$id);
	}
	refreshto("$FROMURL","�����ɹ�","1");
}
elseif($job=="listcomment")
{
	$SQL=" WHERE 1 ";
	if($fid)
	{
		$SQL.=" AND fid='$fid' ";
	}
	$rows=40;
	if(!$page)
	{
		$page=1;
	}
	$min=($page-1)*$rows;
	$showpage=getpage("{$_pre}comments","$SQL","?job=$job&fid=$fid","$rows");

	$query = $db->query("SELECT * FROM {$_pre}comments $SQL ORDER BY cid DESC LIMIT $min,$rows");
	while($rs = $db->fetch_array($query))
	{
		$rs[posttime]=date("Y-m-d H:i",$rs[posttime]);
		if($rs[yz]==1){
			$rs[ifyz]="<font color=blue>����</font>";
		}elseif($rs[yz]==0){
			$rs[ifyz]="δ��";
		}
		if(!$rs[username])
		{
			$detail=explode(".",$rs[ip]);
			$rs[username]="$detail[0].$detail[1].$detail[2].*";
		}
		$rs[content]=preg_replace("/<([^<]+)>/is","",$rs[content]);
		$rs[title]=get_word($rs[content],80);
		$listdb[]=$rs;
	}
	require("inc/head.php");
	require(getTpl("admin"));
	require("inc/foot.php");
}
elseif($action=="workcomment")
{
	if(!$postdb)
	{
		showerr("������ѡ��һ������");
	}
	if( !in_array($ctype,array('del','yz','unyz')) )
	{
		showerr("���������Ͳ�����");
	}
	
	foreach( $postdb AS $key=>$id){
		do_comment_work($ctype,$id);
	}
	refreshto("$FROMURL","�����ɹ�","1");
}

function do_comment_work($job,$id){
	global $db,$_pre,$pre,$webdb,$timestamp,$atc_pm,$atc_fen,$lfjdb,$atc_reason,$Mdomain,$web_admin,$typedb,$Fid_db;
	$rsdb=$db->get_one("SELECT A.*,S.admin FROM {$_pre}comments A LEFT JOIN {$_pre}sort S ON A.fid=S.fid WHERE A.id='$id'");
	if(!$web_admin)
	{
		if( !in_array($lfjdb[username],explode(",",$rsdb[admin])) )
		{
			showerr("����Ȩ����������");
		}
	}
	if($job=='del')
	{
		$db->query("DELETE FROM {$_pre}comments WHERE cid='$id'");
		$_erp=$Fid_db[tableid][$rsdb[fid]];
		$db->query("UPDATE {$_pre}content$_erp SET comments=comments-1 WHERE id='$rsdb[id]'");
	}
	elseif($job=='unyz')
	{
		$db->query("UPDATE {$_pre}comments SET yz='0' WHERE cid='$id'");
	}
	elseif($job=='yz')
	{
		$db->query("UPDATE {$_pre}comments SET yz='1' WHERE cid='$id'");
	}
}

function do_admin_work($job,$id){
	global $db,$_pre,$pre,$webdb,$timestamp,$atc_pm,$atc_fen,$lfjdb,$atc_reason,$Mdomain,$web_admin,$typedb,$Fid_db;
	$RS=$db->get_one("SELECT fid FROM {$_pre}db WHERE id='$id'");
	$_erp=$Fid_db[tableid][$RS[fid]];
	$rsdb=$db->get_one("SELECT A.*,S.admin FROM {$_pre}content$_erp A LEFT JOIN {$_pre}sort S ON A.fid=S.fid WHERE A.id='$id'");	
	if(!$web_admin)
	{
		if( !in_array($lfjdb[username],explode(",",$rsdb[admin])) )
		{
			showerr("����Ȩ��������:$rsdb[title]");
		}
	}
	if(abs($atc_fen)>$webdb[Info_adminfen])
	{
		showerr("���ֽ��޲��ܳ���:$webdb[Info_adminfen]");
	}

	if($db->get_one("SELECT * FROM {$_pre}adminwork WHERE id='$id' AND uid='$lfjdb[uid]' AND type='$job'"))
	{
		showerr("�㲻���ظ��Ա��Ľ���{$typedb[$job]},���±�����:$rsdb[title]");
	}

	if($job=='color')
	{
		global $color;
		$db->query("UPDATE {$_pre}content$_erp SET titlecolor='$color' WHERE id='$id'");
	}
	elseif($job=='top')
	{
		global $toptime;
		$list=$timestamp+$toptime;
		$db->query("UPDATE {$_pre}content$_erp SET list='$list' WHERE id='$id'");
	}
	elseif($job=='untop')
	{
		$db->query("UPDATE {$_pre}content$_erp SET list=posttime WHERE id='$id'");
	}
	elseif($job=='del')
	{
		$db->query("UPDATE {$_pre}content$_erp SET yz=2 WHERE id='$id'");
	}
	elseif($job=='undel')
	{
		$db->query("UPDATE {$_pre}content$_erp SET yz=0 WHERE id='$id'");
	}
	elseif($job=='com')
	{
		$db->query("UPDATE {$_pre}content$_erp SET levels=1,levelstime='$timestamp' WHERE id='$id'");
	}
	elseif($job=='uncom')
	{
		$db->query("UPDATE {$_pre}content$_erp SET levels=0,levelstime='0' WHERE id='$id'");
	}
	elseif($job=='move')
	{
		global $fid;
		$rs=$db->get_one("SELECT * FROM {$_pre}sort WHERE fid='$fid'");
		if($rs[mid]==$rsdb[mid])
		{
			$db->query("UPDATE {$_pre}content$_erp SET lastfid=fid,fid='$fid',fname='$rs[name]' WHERE id='$id'");
		}
		else
		{
			showerr("��Ϣ:��{$rsdb[title]}��,��Ŀ����Ŀ��ģ�鲻һ��.����ת����Ŀ");
		}
	}
	elseif($job=='movetop')
	{
		global $atc_id1;
		if(!$atc_id1){
			showerr("id������");
		}
		$rs=$db->get_one("SELECT * FROM {$_pre}content$_erp WHERE id='$atc_id1'");
		$rs['list']++;
		$db->query("UPDATE {$_pre}content$_erp SET list='$rs[list]' WHERE id='$id'");
	}
	elseif($job=='movebottom')
	{
		global $atc_id2;
		if(!$atc_id2){
			showerr("id������");
		}
		$rs=$db->get_one("SELECT * FROM {$_pre}content$_erp WHERE id='$atc_id2'");
		$rs['list']--;
		$db->query("UPDATE {$_pre}content$_erp SET list='$rs[list]' WHERE id='$id'");
	}
	elseif($job=='unyz'&&$rsdb[yz]==1)
	{
		add_user($lfjdb[uid],-$webdb[PostInfoMoney]);
		$db->query("UPDATE {$_pre}content$_erp SET yz='0' WHERE id='$id'");
	}
	elseif($job=='yz'&&$rsdb[yz]==0)
	{
		add_user($lfjdb[uid],$webdb[PostInfoMoney]);
		$db->query("UPDATE {$_pre}content$_erp SET yz='1' WHERE id='$id'");
	}
	
	$atc_reason=filtrate($atc_reason);
	$array[touid]=$rsdb[uid];
	$array[fromuid]=$lfjdb[uid];
	$array[fromer]=$lfjdb[username];
	$title=get_word($rsdb[title],30);
	$array[title]=addslashes("������±�{$typedb[$job]}��,���±�����:$title");
	$url=get_info_url($rsdb[id],$rsdb[fid],$rsdb[city_id]);
	$array[content]=addslashes("����������:$atc_reason<br><br>����Ӱ����:{$atc_fen}��<br><br><A HREF='$url' target=_blank>����鿴</A>");

	$atc_pm && $array[touid] && pm_msgbox($array);

	$atc_fen && plus_money($rsdb[uid],$atc_fen);

	$db->query("INSERT INTO `{$_pre}adminwork` (`type`, `id`, `uid`, `username`, `ifpm`, `fen`, `reason`, `posttime`) VALUES ( '$job', '$id', '$lfjdb[uid]', '$lfjdb[username]', '$atc_pm', '$atc_fen', '$atc_reason', '$timestamp')");
}



function list_admin_allsort($fid,$Class){
	global $db,$_pre,$listdb,$web_admin,$lfjdb,$lfjid,$webdb,$groupdb,$Fid_db;
	$Class++;
	$query=$db->query("SELECT S.* FROM {$_pre}sort S WHERE S.fup='$fid' ORDER BY S.list DESC");
	while( $rs=$db->fetch_array($query) ){
		$icon="";
		for($i=1;$i<$Class;$i++){
			$icon.="&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		if($icon){
			$icon=substr($icon,0,-24);
			$icon.="--";
		}
		$rs[icon]=$icon;
		$_erp=$Fid_db[tableid][$rs[fid]];
		@extract($db->get_one("SELECT COUNT(*) AS NUM FROM {$_pre}content$_erp WHERE fid='$rs[fid]' AND yz=1"));
		$rs[yznum]=$NUM;
		@extract($db->get_one("SELECT COUNT(*) AS NUM FROM {$_pre}content$_erp WHERE fid='$rs[fid]' AND yz=0"));
		$rs[unyznum]=$NUM;

		@extract($db->get_one("SELECT COUNT(*) AS NUM FROM {$_pre}comments WHERE fid='$rs[fid]' AND yz=1"));
		$rs[Cyznum]=$NUM;
		@extract($db->get_one("SELECT COUNT(*) AS NUM FROM {$_pre}comments WHERE fid='$rs[fid]' AND yz=0"));
		$rs[Cunyznum]=$NUM;

		if($web_admin||in_array($lfjid,explode(",",$rs[admin]))){
			$rs[_admin]='';
		}else{
			$rs[_admin]="onclick=\"alert('����Ȩ����');return false;\" style='color:#ccc;'";
		}

		$listdb[]=$rs;
		list_admin_allsort($rs[fid],$Class);
	}
}


?>