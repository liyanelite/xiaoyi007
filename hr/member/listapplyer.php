<?php
require_once("global.php");

if($action=="del"){

	$r=$db->get_one("SELECT * FROM `{$_pre}apply` WHERE id='$id'");
	$rs=$db->get_one("SELECT * FROM `{$_pre}content` WHERE id='$r[cid]'");
	if($rs[uid]!=$lfjuid){
		showerr("非法踢除!");
	}

	$db->query("DELETE FROM `{$_pre}apply` WHERE `id` = '$id'");

	refreshto($FROMURL,'踢除成功',1);
}

if($job=="list"){
	$rows=20;
	if($page<1){
		$page=1;
	}
	$min=($page-1)*$rows;
	$query = $db->query("SELECT C.*,A.id,A.uid,B.id AS job_id,B.title,B.fid FROM {$_pre}apply A LEFT JOIN {$_pre}content B ON A.cid=B.id LEFT JOIN {$_pre}content_2 C ON A.join_id=C.id WHERE B.uid='$lfjuid' ORDER BY A.id DESC LIMIT $min,$rows");
	while($rs = $db->fetch_array($query)){

		$Module_db->showfield($module_DB[2]['field'],$rs,'list');

		$listdb[] = $rs;
	}
	$showpage = getpage("{$_pre}apply A LEFT JOIN {$_pre}content B ON A.cid=B.id ","WHERE B.uid=$lfjuid","?job=list",$rows);
}

require(ROOT_PATH."member/head.php");
require(Memberpath."template/listapplyer.htm");
require(ROOT_PATH."member/foot.php");

?>