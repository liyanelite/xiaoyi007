<?php
require_once(dirname(__FILE__)."/global.php");

$typedb=array('tg'=>'tuangou_','shop'=>'shop_','coupon'=>'coupon_','hr'=>'hr_','article'=>'article','shoptg'=>'shoptg_','news'=>'news_');

if(!$typedb[$type]){
	showerr('类型不存在!');
}
$_pre=$pre.$typedb[$type];


/**
*每页显示40条
**/
$rows=20;

if(!$page)
{
	$page=1;
}
$min=($page-1)*$rows;

$webdb[UpdatePostTime]>0 || $webdb[UpdatePostTime]=1;

unset($listdb,$i);
if($typedb[$type]!='article'){
	$query = $db->query("SELECT SQL_CALC_FOUND_ROWS * FROM {$_pre}content WHERE city_id='$city_id' ORDER BY id DESC LIMIT $min,$rows");
	$RS=$db->get_one("SELECT FOUND_ROWS()");
	$totalNum=$RS['FOUND_ROWS()'];
	$showpage=getpage('','',"?type=$type",$rows,$totalNum);
	while($rs = $db->fetch_array($query))
	{
		$rs[posttime]=date("Y-m-d H:i:s",$rs[posttime]);
		$i++;
		$rs[cl]=$i%2==0?'t2':'t1';
		$rs[url]="$webdb[www_url]/$type/bencandy.php?fid=$rs[fid]&id=$rs[id]&city_id=$rs[city_id]";
		$rs[Lurl]="$webdb[www_url]/$type/list.php?fid=$rs[fid]&city_id=$rs[city_id]";
		$listdb[]=$rs;
	}
}else{
	$query = $db->query("SELECT SQL_CALC_FOUND_ROWS * FROM {$_pre} WHERE city_id='$city_id' AND `yz` < 2 ORDER BY aid DESC LIMIT $min,$rows");
	$RS=$db->get_one("SELECT FOUND_ROWS()");
	$totalNum=$RS['FOUND_ROWS()'];
	$showpage=getpage('','',"?type=$type",$rows,$totalNum);
	while($rs = $db->fetch_array($query))
	{
		$rs[posttime]=date("Y-m-d H:i:s",$rs[posttime]);
		$i++;
		$rs[cl]=$i%2==0?'t2':'t1';
		$rs[url]="$webdb[www_url]/do/bencandy.php?fid=$rs[fid]&aid=$rs[aid]&city_id=$rs[city_id]";
		$rs[Lurl]="$webdb[www_url]/do/list.php?fid=$rs[fid]&city_id=$rs[city_id]";
		$rs[yzTitle] = $rs[yz] ? "已审核" : "<span style='color:#666'>未审核</span>";
		$listdb[]=$rs;
	}
}
if($action == "del"){
	if($typedb[$type]!='article'){
		$readdb = $db->get_one("SELECT * FROM {$_pre}content WHERE city_id='$city_id' AND fid='$fid' AND id='$id'");
		$mid = $readdb[mid];
		if(!$readdb){
			showerr('删除的数据不存在,请确认!');
		}
		$db->query("DELETE FROM {$_pre}content WHERE id='$id'");
		$db->query("DELETE FROM {$_pre}content_{$mid} WHERE id='$id'");
	}else{
		$readdb = $db->get_one("SELECT * FROM {$_pre} WHERE city_id='$city_id' AND fid='$fid' AND aid='$aid'");
		//delete_article($readdb[aid]);
	}
	refreshto("$FROMURL","删除成功",1);
}
if($action == "yz"){
	$yz = $yz ? 0 : 1;
	$db->update("UPDATE {$_pre} SET `yz` = '$yz' WHERE `aid` = '$aid' AND `fid` = '$fid'");
	refreshto("$FROMURL","操作成功",1);
}
require(dirname(__FILE__)."/head.php");
if($typedb[$type]=='article'){
	require(dirname(__FILE__)."/template/list_article.htm");
}else{
	require(dirname(__FILE__)."/template/list2.htm");
}
require(dirname(__FILE__)."/foot.php");
?>