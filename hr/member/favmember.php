<?php
require_once("global.php");


if($action=="del"){
	$rsdb=$db->get_one("SELECT * FROM `{$_pre}collection` WHERE id='$id'");
	if(!$web_admin&&$rsdb[companyuid]!=$lfjuid){
		showerr("你无权删除");
	}
	$db->query("DELETE FROM `{$_pre}collection` WHERE `id` = '$id'");
	refreshto($FROMURL,'删除成功',1);
}

if($job=="list"){
	$rows=20;
	if($page<1){
		$page=1;
	}
	$min=($page-1)*$rows;
	$query = $db->query("SELECT A.id AS meid,A.memberuid,A.companyuid,B.*,C.* FROM {$_pre}collection A LEFT JOIN {$_pre}person B ON A.memberuid=B.uid LEFT JOIN {$_pre}content_2 C ON A.memberuid=C.uid WHERE A.companyuid='$lfjuid' ORDER BY A.id DESC LIMIT $min,$rows");
	while($rs = $db->fetch_array($query)){

		$Module_db->showfield($module_DB[2]['field'],$rs,'list');

		$listdb[] = $rs;
	}
	$showpage = getpage("{$_pre}collection","WHERE memberuid=$lfjuid","?action=list",$rows);
}

require(ROOT_PATH."member/head.php");
require(Memberpath."template/favmember.htm");
require(ROOT_PATH."member/foot.php");