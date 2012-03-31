<?php
require(dirname(__FILE__)."/global.php");

if(!$lfjid){
	showerr('请先登录!');
}

if($job=='post'){
	$rsdb = $db->get_one("SELECT * FROM {$_pre}content WHERE id='$id'");
	if(!$rsdb){
		showerr('职位不存在!');
	}
	if($db->get_one("SELECT * FROM {$_pre}apply WHERE cid='$id' AND uid='$lfjuid'")){
		showerr('你已经申请过该职位了!');
	}
	@extract($db->get_one("SELECT id AS join_id FROM {$_pre}person WHERE uid='$lfjuid'"));
	$db->query("INSERT INTO {$_pre}apply SET cid='$id',uid='$lfjuid',join_id='$join_id',posttime='$timestamp'");
	refreshto("./",'申请成功',1);
}

?>