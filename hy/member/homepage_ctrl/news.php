<?php
//�����б�

$rows=10;
if($page<1){
	$page=1;
}
	
$min=($page-1)*$rows;
$rsdb=$db->get_one("SELECT * FROM {$_pre}company WHERE uid='$uid' LIMIT 1");
if(!$rsdb) showerr("�̼���Ϣδ�Ǽ�");
$where=" WHERE uid='$rsdb[uid]' ";
	
$query=$db->query("SELECT * FROM {$_pre}news $where ORDER BY posttime DESC LIMIT $min,$rows");
	
while($rs=$db->fetch_array($query)){
	$rs[posttime]=date("Y-m-d",$rs[posttime]);
	$rs[yz]=!$rs[yz]?"<font color=red>�����</font>":"��ͨ��";
	$listdb[]=$rs;
}	
	
$showpage=getpage("{$_pre}news",$where,"?uid=$uid&atn=$atn",$rows);

?>