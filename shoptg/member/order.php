<?php
require_once("global.php");


if($action=='del'){
	del_order($id);
	refreshto($FROMURL,'',0);
	
}elseif($job=='pay'||$job=='send'||$job=='del'){
	$rsdb=$db->get_one("SELECT * FROM {$_pre}join WHERE id='$id'");
	if($rsdb[cuid]!=$lfjuid&&!$web_admin){
		showerr("��ûȨ��!");
	}
	if($job=='pay'){
		$db->query("UPDATE {$_pre}join SET ifpay='$ifpay' WHERE id='$id'");
	}elseif($job=='send'){
		$db->query("UPDATE {$_pre}join SET ifsend='$ifsend' WHERE id='$id'");
	}
	count_join($rsdb[cid]);	//ͳ�Ʊ�������
}elseif($job=='edit'){
	$rsdb=$db->get_one("SELECT * FROM {$_pre}join WHERE id='$id'");
	if($rsdb[cuid]!=$lfjuid){
		showerr("��ûȨ��!");
	}
	if($step==2){
		$totalmoney = filtrate($totalmoney);
		$emscode = filtrate($emscode);
		$db->query("UPDATE {$_pre}join SET totalmoney='$totalmoney',emscode='$emscode' WHERE id='$id'");
		refreshto('?job=list','�޸ĳɹ�',1);
	}
	require(ROOT_PATH."member/head.php");
	require(dirname(__FILE__)."/"."template/order_edit.htm");
	require(ROOT_PATH."member/foot.php");
	exit;
}

$rows=15;

if(!$page){
	$page=1;
}
$min=($page-1)*$rows;


unset($listdb,$i);

if($job=='mylist'){
	$SQL=" A.uid='$lfjuid' ";
}else{
	$SQL=" A.cuid='$lfjuid' ";
}

$query = $db->query("SELECT SQL_CALC_FOUND_ROWS A.*,B.* FROM {$_pre}join A LEFT JOIN {$_pre}content_2 B ON A.id=B.id WHERE $SQL ORDER BY A.id DESC LIMIT $min,$rows");

$RS=$db->get_one("SELECT FOUND_ROWS()");
$totalNum=$RS['FOUND_ROWS()'];
$showpage=getpage("","","?job=$job",$rows,$totalNum);

while($rs = $db->fetch_array($query))
{
	
	$rs[shop]=$db->get_one("SELECT * FROM {$_pre}content WHERE id='$rs[cid]'");
	$rs[posttime]=date("m-d H:i",$rs[posttime]);
	if($job=='mylist'){	//�ҵĶ���
		$rs[editurl]="../join.php?job=edit&id=$rs[id]&fid=$rs[fid]&cid=$rs[cid]' target='_blank";
		if($rs[ifpay]){
			$rs[pay]="<A style='color:red;'>�Ѹ�</A>";
		}elseif($rs[totalmoney]){
			$rs[pay]="<A HREF='../olpay.php?id=$rs[id]&fid=$rs[fid]' target='_blank'><u>����</u></A>";
		}else{
			$rs[pay]='';
		}
		$rs[send]=$rs[ifsend]?"<A style='color:red;'>�ѷ�</A>":"δ��";
	}else{	//�ͻ�����
		$rs[pay]=$rs[ifpay]?"<A HREF='?job=pay&id=$rs[id]&ifpay=0' style='color:red;'>�Ѹ�</A>":"<A HREF='?job=pay&id=$rs[id]&ifpay=1' style='color:blue;'>δ��</A>";
		$rs[send]=$rs[ifsend]?"<A HREF='?job=send&id=$rs[id]&ifsend=0' style='color:red;'>�ѷ�</A>":"<A HREF='?job=send&id=$rs[id]&ifsend=1' style='color:blue;'>δ��</A>";
		$rs[editurl]="?job=edit&id=$rs[id]";
	}

	$listdb[]=$rs;
}

require(ROOT_PATH."member/head.php");
require(dirname(__FILE__)."/"."template/order.htm");
require(ROOT_PATH."member/foot.php");
?>