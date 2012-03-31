<?php
require_once("global.php");

if($action=="del"){
	$db->query("DELETE FROM `{$_pre}apply` WHERE `id` = '$id' AND uid=$lfjuid");
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?action=list'>";
	exit;
}

if($job=="list"){
	$rows=20;
	if($page<1){
		$page=1;
	}
	$min=($page-1)*$rows;
	$query = $db->query("SELECT A.id,B.id AS bid,B.title,B.uid,B.fid,C.title AS company FROM {$_pre}apply A LEFT JOIN {$_pre}content B ON A.cid=B.id LEFT JOIN {$pre}hy_company C ON B.uid=C.uid WHERE A.uid='$lfjuid' ORDER BY A.id DESC LIMIT $min,$rows");
	while($rs = $db->fetch_array($query)){
		$listdb[] = $rs;
	}
	$showpage = getpage("{$_pre}apply A","WHERE A.uid=$lfjuid","?job=list",$rows);
}

require(ROOT_PATH."member/head.php");
require(Memberpath."template/applyjob.htm");
require(ROOT_PATH."member/foot.php");

?>