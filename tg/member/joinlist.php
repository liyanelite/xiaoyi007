<?php
require("global.php");

$rs=$db->get_one("SELECT * FROM `{$_pre}content` WHERE id='$cid'");
if(!$lfjuid||$rs[uid]!=$lfjuid){
	showerr("你无权限");
}

if($action=='yz'){
	$db->query("UPDATE {$_pre}join SET yz='$yz' WHERE id='$id' AND cid='$cid'");
	refreshto($FROMURL,'操作成功',0);
}

$mid=2;
$field_db = $module_DB[$mid]['field'];

$Lrows=10;
$showpage=getpage("{$_pre}join A","WHERE A.cid=$cid","?cid=$cid",$Lrows);	
unset($listdb);

if($page<1){
	$page=1;
}
$min=($page-1)*$Lrows;

$query = $db->query("SELECT A.*,C.* FROM {$_pre}join A LEFT JOIN {$_pre}content_$mid C ON A.id=C.id WHERE A.cid='$cid' ORDER BY A.posttime DESC LIMIT $min,$Lrows");
while($rs = $db->fetch_array($query)){
	$Module_db->showfield($field_db,$rs,'list');
	$rs[username] || $rs[username] = $rs[ip];
	$rs[picurl] = tempdir($rs[icon]);
	$rs[posttime] = date("Y-m-d H:i:s",$rs[posttime]);

	$rs[ifyz] = $rs[yz]?"<a href='?action=yz&yz=0&cid=$rs[cid]&id=$rs[id]' style='color:red;'>已审核</a>":"<a href='?action=yz&yz=1&cid=$rs[cid]&id=$rs[id]'>待审核</a>";

	$listdb[]=$rs;
}



require(ROOT_PATH."member/head.php");
require(dirname(__FILE__)."/template/joinlist.htm");
require(ROOT_PATH."member/foot.php");

?>