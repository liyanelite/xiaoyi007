<?php
require_once("global.php");


if($job=="list"){	//管理职位

	$rows=20;
	if($page<1){
		$page=1;
	}
	$min=($page-1)*$rows;
	$query = $db->query("SELECT * FROM {$_pre}content WHERE uid='$lfjuid' ORDER BY id DESC LIMIT $min,$rows");
	while($rs = $db->fetch_array($query)){
		@extract($db->get_one("SELECT COUNT(*) AS NUM FROM {$_pre}apply WHERE cid='$rs[id]'"));
		$NUM=intval($NUM);
		if($NUM){
			$rs[joinnum] = "<A HREF='?job=listmember&cid=$rs[id]'><u>{$NUM}人(查看)</u></A>";
		}else{
			$rs[joinnum] = "0";
		}
		$listdb[] = $rs;
	}
	$showpage = getpage("{$_pre}content","WHERE uid=$lfjuid","?job=list",$rows);

	require(ROOT_PATH."member/head.php");
	require(Memberpath."template/listjob.htm");
	require(ROOT_PATH."member/foot.php");

}elseif($job == "listmember"){	//查看某职位下的所有应聘者

	$rows=20;
	if($page<1){
		$page=1;
	}
	$min=($page-1)*$rows;

	$query = $db->query("SELECT SQL_CALC_FOUND_ROWS A.*,C.*,B.posttime,B.id AS apply_id FROM {$_pre}apply B LEFT JOIN {$_pre}person A ON B.join_id=A.id LEFT JOIN {$_pre}content_2 C ON A.id=C.id WHERE B.cid='$cid' ORDER BY B.id DESC LIMIT $min,$rows");
	$RS=$db->get_one("SELECT FOUND_ROWS()");
	$totalNum=$RS['FOUND_ROWS()'];
	while($rs = $db->fetch_array($query)){

		$Module_db->showfield($module_DB[2]['field'],$rs,'list');

		$rs[username] || $rs[username] = $rs[ip];
		$rs[posttime] = date("Y-m-d H:i:s",$rs[posttime]);
		$rs[del] = " <A HREF='?action=delete_apply&id=$rs[apply_id]'>踢除</A>";
		$listdb[]=$rs;
	}
	$showpage = getpage('','',"?job=$job",$rows,$totalNum);

	require(ROOT_PATH."member/head.php");
	require(Memberpath."template/list_job_member.htm");
	require(ROOT_PATH."member/foot.php");

}elseif($action=='delete_apply'){	//踢除某职位下的其中一个应聘者

	$r=$db->get_one("SELECT * FROM `{$_pre}apply` WHERE id='$id'");
	$rs=$db->get_one("SELECT * FROM `{$_pre}content` WHERE cid='$r[cid]'");
	if($rs[uid]!=$lfjuid){
		showerr("非法踢除!");
	}

	$db->query("DELETE FROM {$_pre}apply WHERE id='$id'");
	refreshto($FROMURL,'踢除成功',1);

}elseif($action=="del"){	//删除某职位

	$rs = $db->get_one("SELECT * FROM `{$_pre}content` WHERE id='$id' AND uid=$lfjuid");
	if(!$rs){
		showerr("非法删除!");
	}

	$db->query("DELETE FROM `{$_pre}content` WHERE `id` = '$id'");
	$db->query("DELETE FROM `{$_pre}content_1` WHERE `id` = '$id'");
	$db->query("DELETE FROM `{$_pre}apply` WHERE `cid` = '$id'");

	refreshto($FROMURL,'删除成功',1);
}

?>