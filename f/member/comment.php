<?php
require(dirname(__FILE__)."/"."global.php");
if(!$lfjuid){
	showerr("���ȵ�¼");
}
if($job=='list'){
	if(!$page){
		$page=1;
	}
	$rows=20;
	$showpage=getpage("{$_pre}comments","WHERE cuid='$lfjuid'","?job=$job",$rows);
	$min=($page-1)*$rows;
	$query = $db->query("SELECT * FROM {$_pre}comments WHERE cuid='$lfjuid' ORDER BY cid DESC LIMIT $min,$rows");
	while($rs = $db->fetch_array($query)){
		$rs[content]=preg_replace("/<([^<]+)>/is","",$rs[content]);
		$rs[title]=get_word($rs[content],70);
		if(!$rs[username]){
			$detail=explode(".",$rs[ip]);
			$rs[username]="$detail[0].$detail[1].$detail[2].*";
		}
		$rss=$db->get_one("SELECT city_id FROM {$_pre}db WHERE id='$rs[id]'");
		$rs[url]=get_info_url($rs[id],$rs[fid],$rss[city_id]);
		$rs[posttime]=date("Y-m-d H:i",$rs[posttime]);
		
		$listdb[]=$rs;
	}
	require(ROOT_PATH."member/head.php");
	require(dirname(__FILE__)."/"."template/comment/list.htm");
	require(ROOT_PATH."member/foot.php");
}
elseif($job=='mylist'){
	if(!$page){
		$page=1;
	}
	$rows=20;
	$showpage=getpage("{$_pre}comments","WHERE uid='$lfjuid'","?job=$job",$rows);
	$min=($page-1)*$rows;
	$query = $db->query("SELECT * FROM {$_pre}comments WHERE uid='$lfjuid' ORDER BY cid DESC LIMIT $min,$rows");
	while($rs = $db->fetch_array($query)){
		$rs[content]=preg_replace("/<([^<]+)>/is","",$rs[content]);
		$rs[title]=get_word($rs[content],70);
		if(!$rs[username]){
			$detail=explode(".",$rs[ip]);
			$rs[username]="$detail[0].$detail[1].$detail[2].*";
		}
		$rss=$db->get_one("SELECT city_id FROM {$_pre}db WHERE id='$rs[id]'");
		$rs[url]=get_info_url($rs[id],$rs[fid],$rss[city_id]);
		$rs[posttime]=date("Y-m-d H:i",$rs[posttime]);
		$listdb[]=$rs;
	}
	require(ROOT_PATH."member/head.php");
	require(dirname(__FILE__)."/"."template/comment/mylist.htm");
	require(ROOT_PATH."member/foot.php");
}
elseif($action=="del")
{
	if(!$ciddb){
		showerr("��ѡ��һ��");
	}
	foreach( $ciddb AS $key=>$value){
		$rs=$db->get_one("SELECT * FROM {$_pre}comments WHERE cid='$value'");
		if($rs[uid]=$lfjuid||$rs[cuid]=$lfjuid){
			$db->query("DELETE FROM {$_pre}comments WHERE cid='$value'");
			$_erp=$Fid_db[tableid][$rs[fid]];
			$db->query("UPDATE {$_pre}content$_erp SET comments=comments-1 WHERE id='$rs[id]'");
		}		
	}
	refreshto("$FROMURL","ɾ���ɹ�",1);
}
?>