<?php
if(!function_exists('html')){
	die('F');
}

if(!$uid){
	showerr("请选择一个用户");
}
include_once(ROOT_PATH."data/level.php");

$rows=20;
if(!$page){
	$page=1;
}
$min=($page-1)*$rows;
$showpage=getpage("{$_pre}content","WHERE uid='$uid'","?job=$job&uid=$uid",$rows);

$query = $db->query("SELECT * FROM {$_pre}db WHERE uid='$uid' ORDER BY id DESC LIMIT $min,$rows");
while($rs = $db->fetch_array($query)){
	$_erp=$Fid_db[tableid][$rs[fid]];
	$rs=$db->get_one("SELECT * FROM {$_pre}content$_erp WHERE id='$rs[id]'");
	$rs[posttime]=date("y-m-d H:i:s",$rs[posttime]);
	$listdb[]=$rs;
}

$rsdb=$db->get_one("SELECT M.$TB[username] AS username,D.* FROM $TB[table] M LEFT JOIN {$pre}memberdata D ON M.$TB[uid]=D.uid WHERE M.$TB[uid]='$uid' ");

if($rsdb[sex]==1)
{
	$rsdb[sex]="男";
}
elseif($rsdb[sex]==2)
{
	$rsdb[sex]="女";
}
else
{
	$rsdb[sex]="保密";
}
$rsdb[regdate]=date("Y-m-d H:i:s",$rsdb[regdate]);
$rsdb[lastvist]=date("Y-m-d H:i:s",$rsdb[lastvist]);
$rsdb[money]=get_money($uid);

require(Mpath."inc/head.php");
require(getTpl("userinfo"));
require(Mpath."inc/foot.php");

?>