<?php
//�޸�ͼƬ

if(count($pids)<1) showerr("����ѡ��һ��");

$pids=implode(",",$pids);
$query=$db->query("SELECT * FROM {$_pre}pic WHERE pid IN($pids) ORDER BY orderlist DESC");
while($rs=$db->fetch_array($query)){
	$rs[posttime]=date("Y-m-d H:i:s",$rs[posttime]);
	$rs[url]=$webdb[www_url]."/".$user_picdir.$rs[url];
	$listdb[]=$rs;
}

?>