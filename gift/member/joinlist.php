<?php
require("global.php");


$infodb=$db->get_one("SELECT * FROM `{$_pre}content` WHERE id='$cid'");
if(!$web_admin&&$infodb[uid]!=$lfjuid){
	showerr("����Ȩ�鿴");
}

if($action=='yz'){
	$rt = $db->get_one("SELECT * FROM `{$_pre}join` WHERE id='$id'");
	if($rt[cid]!=$cid){
		showerr('��������!');
	}
	$money=get_money($rt[uid]);
	if($money<abs($infodb[money])){
		showerr("��ǰ�û���{$webdb[MoneyName]}����,����$money{$webdb[MoneyDW]},���Բ����Զһ�����Ʒ!");
	}

	$db->query("UPDATE {$_pre}join SET yz='$yz' WHERE id='$id'");

	if($yz){
		add_user($rt[uid],-abs($infodb[money]),'�һ���Ʒ�۷�');
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
	$rs[send] = $rs[yz]?"<a href='?action=yz&yz=0&id=$rs[id]&cid=$rs[cid]' style='color:red;'>����</a>":"<a href='?action=yz&yz=1&id=$rs[id]&cid=$rs[cid]' onclick=\"return confirm('��ȷ��Ҫͨ�����,����������Ʒ��?��Ҫ�۳�����{$webdb[MoneyName]}{$infodb[money]}{$webdb[MoneyDW]}')\">����</a>";
	$listdb[]=$rs;
}



require(ROOT_PATH."member/head.php");
require(dirname(__FILE__)."/template/joinlist.htm");
require(ROOT_PATH."member/foot.php");

?>