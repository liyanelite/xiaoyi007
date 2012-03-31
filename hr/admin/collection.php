<?php
!function_exists('html') && exit('ERR');

ck_power('collection');

if($job=="list"){
	$mid=2;
	$rows=20;
	if($page<1){
		$page=1;
	}
	$min=($page-1)*$rows;
	$query = $db->query("SELECT A.id AS meid,A.memberuid,A.companyuid,C.*,D.title AS companyname FROM {$_pre}collection A LEFT JOIN {$_pre}content_2 C ON A.memberuid=C.uid LEFT JOIN {$pre}hy_company D ON A.companyuid=D.uid ORDER BY A.id DESC LIMIT $min,$rows");
	while($rs = $db->fetch_array($query)){
		$Module_db->showfield($module_DB[2]['field'],$rs,'list');
		$rs[posttime] = date('m-d H:i',$rs[posttime]);
		$listdb[] = $rs;
	}
	$showpage=getpage("{$_pre}collection","","$admin_path&job=$job",$rows);

	get_admin_html('list');
}
if($action=="del"){
	foreach( $iddb AS $key=>$value){
		$db->query("DELETE FROM {$_pre}collection WHERE id='$value'");
	}
	jump("É¾³ý³É¹¦",$FROMURL,0);
}
?>