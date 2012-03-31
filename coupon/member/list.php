<?php
require_once("global.php");

$rows=15;

if(!$page){
	$page=1;
}

$min=($page-1)*$rows;


$query = $db->query("SELECT SQL_CALC_FOUND_ROWS * FROM {$_pre}content WHERE uid=$lfjuid ORDER BY id DESC LIMIT $min,$rows");

$RS=$db->get_one("SELECT FOUND_ROWS()");
$totalNum=$RS['FOUND_ROWS()'];

while($rs = $db->fetch_array($query))
{
	$rs[posttime]=date("Y-m-d H:i:s",$rs[posttime]);

	$rs[num] = $rs[totaluser] ? "<a href='joinlist.php?cid=$rs[id]'>共({$rs[totaluser]})人,查看</a>" : '0' ;

	$rs[ifyz] = $rs[yz]?'<font color="red">已审</font>':'未审';

	$listdb[]=$rs;
}


$showpage=getpage('','',"?job=$job",$rows,$totalNum);


require(ROOT_PATH."member/head.php");
require(dirname(__FILE__)."/template/list.htm");
require(ROOT_PATH."member/foot.php");
?>