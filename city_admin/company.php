<?php
require_once(dirname(__FILE__)."/global.php");


if($action=="del"){
	$rs = $db->get_one("SELECT * FROM {$pre}hy_company WHERE uid='$uid'");
	if($rs[city_id]!=$city_id){
		showerr("非本城市商家,你不能删除!");
	}
	delete_home($uid);
	refreshto("$FROMURL","删除成功",1);
}

$rows=15;

if(!$page){
	$page=1;
}
$min=($page-1)*$rows;

unset($listdb,$i);

$query = $db->query("SELECT SQL_CALC_FOUND_ROWS * FROM {$pre}hy_company WHERE city_id='$city_id' ORDER BY rid DESC LIMIT $min,$rows");
$RS=$db->get_one("SELECT FOUND_ROWS()");
$totalNum=$RS['FOUND_ROWS()'];
$showpage=getpage('','',"?type=$type",$rows,$totalNum);
while($rs = $db->fetch_array($query))
{
	$rs[posttime]=date("Y-m-d H:i:s",$rs[posttime]);
	$i++;
	$rs[cl]=$i%2==0?'t2':'t1';
	$listdb[]=$rs;
}

require(dirname(__FILE__)."/head.php");
require(dirname(__FILE__)."/template/company.htm");
require(dirname(__FILE__)."/foot.php");
?>