<?php
!function_exists('html') && exit('ERR');

ck_power('comment_list');

if($job=="list"){
	!$page&&$page=1;
	$rows=20;
	$min=($page-1)*$rows;
	$SQL=" WHERE 1 ";
	$showpage=getpage("{$pre}vote_comment","$SQL","$admin_path&job=$job","$rows");
	$query=$db->query(" SELECT * FROM {$pre}vote_comment $SQL ORDER BY cid DESC LIMIT $min,$rows ");
	while($rs=$db->fetch_array($query)){
		$rs[posttime]=date("Y-m-d",$rs[posttime]);
		$rs[username]=$rs[username]?$rs[username]:$rs[ip];
		$rs[yz] = $rs[yz]==1 ? "<A HREF='$admin_path&jobs=unyz&id=$rs[id]' style='color:blue;' title='已通过审核,点击取消审核'>已审核</A>" : "<A HREF='$admin_path&jobs=yz&id=$rs[id]' style='color:red;' title='还没通过审核,点击通过审核'>未审核</A>" ;
		$listdb[]=$rs;
	}
	get_admin_html('list');
}
if($jobs == "yz"){
	$db->query("UPDATE `{$pre}vote_comment` SET yz=1 WHERE id='$id'");
	jump("审核成功",$FROMURL);
}
if($jobs == "unyz"){
	$db->query("UPDATE `{$pre}vote_comment` SET yz=0 WHERE id='$id'");
	jump("取消审核",$FROMURL);
}
if($action == "delete"){
	$checks = $db->get_one(" SELECT * FROM {$pre}vote_comment WHERE cid=$cid AND id=$id ");
	if(!$checks){
		die("操作有误,请确认!");
	}
	$db->query("DELETE FROM {$pre}vote_comment WHERE cid=$cid AND id=$id");
	jump("删除成功",$FROMURL);
}
?>