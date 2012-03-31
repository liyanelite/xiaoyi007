<?php
require("global.php");


$infodb=$db->get_one("SELECT * FROM `{$_pre}content` WHERE id='$cid'");
if(!$web_admin&&$infodb[uid]!=$lfjuid){
	showerr("你无权查看");
}

if($action=='yz'){
	$rt = $db->get_one("SELECT * FROM `{$_pre}join` WHERE id='$id'");
	if($rt[cid]!=$cid){
		showerr('数据有误!');
	}
	$money=get_money($rt[uid]);
	if($money<abs($infodb[money])){
		showerr("当前用户的{$webdb[MoneyName]}不足,仅有$money{$webdb[MoneyDW]},所以不可以兑换此礼品!");
	}

	$db->query("UPDATE {$_pre}join SET yz='$yz' WHERE id='$id'");

	if($yz){
		add_user($rt[uid],-abs($infodb[money]),'兑换礼品扣分');
	}
	refreshto($FROMURL,'',0);
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
	$rs[posttime] = date("Y-m-d H:i",$rs[posttime]);
	$rs[send] = $rs[yz]?"<a href='?action=yz&yz=0&id=$rs[id]&cid=$rs[cid]' style='color:red;'>已审</a>":"<a href='?action=yz&yz=1&id=$rs[id]&cid=$rs[cid]' onclick=\"return confirm('你确定要通过审核,给他发放礼品吗?将要扣除他的{$webdb[MoneyName]}{$infodb[money]}{$webdb[MoneyDW]}')\">待审</a>";
	$listdb[]=$rs;
}



require(ROOT_PATH."member/head.php");
require(dirname(__FILE__)."/template/joinlist.htm");
require(ROOT_PATH."member/foot.php");

?>