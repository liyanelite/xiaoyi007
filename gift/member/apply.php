<?php
require_once("global.php");


$rows=15;

if(!$page)
{
	$page=1;
}
$min=($page-1)*$rows;


unset($listdb,$i);

$SQL=" A.uid='$lfjuid' ";

$query = $db->query("SELECT SQL_CALC_FOUND_ROWS B.*,A.* FROM {$_pre}join A LEFT JOIN {$_pre}content_2 B ON A.id=B.id WHERE $SQL ORDER BY A.id DESC LIMIT $min,$rows");

$RS=$db->get_one("SELECT FOUND_ROWS()");
$totalNum=$RS['FOUND_ROWS()'];
$showpage=getpage("","","?job=$job",$rows,$totalNum);

while($rs = $db->fetch_array($query))
{

	$rs[C]=$db->get_one("SELECT * FROM {$_pre}content WHERE id='$rs[cid]'");
	$rs[posttime]=date("m-d H:i",$rs[posttime]);
	$rs[send]=$rs[yz]?"<A style='color:red;'>“—…Û∫À</A>":"<A style='color:blue;'>Œ¥…Û∫À</A>";

	$listdb[]=$rs;
}


require(ROOT_PATH."member/head.php");
require(dirname(__FILE__)."/"."template/apply.htm");
require(ROOT_PATH."member/foot.php");

?>