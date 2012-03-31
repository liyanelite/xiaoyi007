<?php
require_once(dirname(__FILE__)."/global.php");

$typedb=array('tg'=>'tuangou_','shop'=>'shop_','news'=>'news_');

if(!$typedb[$type]){
	showerr('类型不存在!');
}
$_pre=$pre.$typedb[$type];


if($action=='del'){
	$rsdb=$db->get_one("SELECT C.*,A.city_id FROM {$_pre}content A LEFT JOIN {$_pre}comments C ON A.id=C.id WHERE A.city_id='$city_id' AND C.cid='$cid'");
	if(!$rsdb){
		showerr('ID有误!');
	}
	$db->query("DELETE FROM {$_pre}comments WHERE cid='$cid'");
	$db->query("UPDATE {$_pre}content SET comments=comments-1 WHERE id='$rsdb[id]'");
	refreshto($FROMURL,"删除成功",0);
}

/**
*每页显示40条
**/
$rows=15;

if(!$page)
{
	$page=1;
}
$min=($page-1)*$rows;

unset($listdb,$i);

$query = $db->query("SELECT SQL_CALC_FOUND_ROWS C.*,A.city_id FROM {$_pre}content A LEFT JOIN {$_pre}comments C ON A.id=C.id WHERE A.city_id='$city_id' AND C.cid>0 ORDER BY C.cid DESC LIMIT $min,$rows");
$RS=$db->get_one("SELECT FOUND_ROWS()");
$totalNum=$RS['FOUND_ROWS()'];
$showpage=getpage('','',"?type=$type",$rows,$totalNum);
while($rs = $db->fetch_array($query))
{
	$rs[C]=$db->get_one("SELECT * FROM {$_pre}content WHERE id='$rs[id]'");

	$rs[content]=get_word($rs[content],100);
	$rs[posttime]=date("Y-m-d H:i:s",$rs[posttime]);

	$i++;
	$rs[cl]=$i%2==0?'t2':'t1';
	$rs[url]="$webdb[www_url]/$type/bencandy.php?fid=$rs[fid]&id=$rs[id]";
	$rs[Lurl]="$webdb[www_url]/$type/list.php?fid=$rs[fid]";

	$listdb[]=$rs;
}

require(dirname(__FILE__)."/head.php");
require(dirname(__FILE__)."/template/comment.htm");
require(dirname(__FILE__)."/foot.php");
?>