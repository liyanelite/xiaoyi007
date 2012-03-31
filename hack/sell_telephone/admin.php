<?php
!function_exists('html') && exit('ERR');

if($job=="list"&&$Apower[sell_telephone])
{
	$SQL=" 1 ";

	$rows=20;
	if($page<1){
		$page=1;
	}
	$min=($page-1)*$rows;

	$showpage=getpage("{$pre}sell_telephone"," WHERE $SQL","?job=$job","");

	$query=$db->query("SELECT * FROM {$pre}sell_telephone WHERE $SQL ORDER BY id DESC LIMIT $min,$rows");
	while($rs=$db->fetch_array($query))
	{
		$rs[posttime]=date("Y-m-d H:i:s",$rs[posttime]);
		$rs[endtime]=date("Y-m-d H:i:s",$rs[endtime]);
		$listdb[$rs[id]]=$rs;
	}

	hack_admin_tpl('list');
}
elseif($job=="edit"&&$Apower[sell_telephone]){
	$radb = $db->get_one("SELECT * FROM {$pre}sell_telephone WHERE id=$id");
	if(!$radb){
		showerr("操作有误!请确认后再操作");
	}
	$radb[endtime]=date("Y-m-d H:i:s",$radb[endtime]);
	hack_admin_tpl('edit');
}
elseif($action=="edit"&&$Apower[sell_telephone]){
	$radb = $db->get_one("SELECT * FROM {$pre}sell_telephone WHERE id=$id");
	if(!$radb){
		showerr("操作有误!请确认后再操作");
	}
	$endtime = strtotime($endtime);
	$db->query("UPDATE `{$pre}sell_telephone` SET title='$title', telephone='$telephone', endtime='$endtime' WHERE id=$id");
	jump("修改成功",$FROMURL);
	exit;
}
elseif($action=="del"&&$Apower[sell_telephone])
{
	$db->query("DELETE FROM `{$pre}sell_telephone` WHERE id='$id'");
	header("location:$FROMURL");
	exit;
}
elseif($job=='set'&&$Apower[sell_telephone])
{
	hack_admin_tpl('set');
}
elseif($action=="set"&&$Apower[sell_telephone])
{
	write_config_cache($webdbs);
	jump("修改成功",$FROMURL);
}

?>