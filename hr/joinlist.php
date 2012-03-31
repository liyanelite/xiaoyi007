<?php
require("global.php");

//导航条
@include(Mpath."data/guide_fid.php");

if(!$cid){
	showerr('ID不存在!');
}
$mid=2;
$field_db = $module_DB[$mid]['field'];

$Lrows=10;
$showpage=getpage("{$_pre}person A","WHERE A.cid=$cid","?cid=$cid",$Lrows);	
unset($listdb);

if($page<1){
	$page=1;
}
$min=($page-1)*$Lrows;

$query = $db->query("SELECT A.*,B.*,C.* FROM {$_pre}person A LEFT JOIN {$_pre}content_$mid C ON A.id=C.id LEFT JOIN {$pre}memberdata B ON A.uid=B.uid WHERE A.cid='$cid' ORDER BY A.posttime DESC LIMIT $min,$Lrows");
while($rs = $db->fetch_array($query)){
	$Module_db->showfield($field_db,$rs,'list');
	$rs[username] || $rs[username] = $rs[ip];
	$rs[picurl] = tempdir($rs[icon]);
	$rs[posttime] = date("Y-m-d H:i:s",$rs[posttime]);
	$listdb[]=$rs;
}

//列表页个性头部与尾部
$head_tpl=html('head');
$foot_tpl=html('foot');
if($webdb[IF_Private_tpl]==2||$webdb[IF_Private_tpl]==3){
	if(is_file(Mpath.$webdb[Private_tpl_head])){
		$head_tpl=Mpath.$webdb[Private_tpl_head];
	}
	if(is_file(Mpath.$webdb[Private_tpl_foot])){
		$foot_tpl=Mpath.$webdb[Private_tpl_foot];
	}
}



require(ROOT_PATH."inc/head.php");
require(getTpl("list_$mid"));
require(ROOT_PATH."inc/foot.php");
?>