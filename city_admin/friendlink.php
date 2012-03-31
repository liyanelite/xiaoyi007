<?php
require_once(dirname(__FILE__)."/global.php");
require_once(ROOT_PATH."inc/friendlink.inc.php");
require_once(ROOT_PATH."data/all_city.php");
$jobdb=array('list');

if(!in_array($job, $jobdb)){
	showerr('操作类型错误!');
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

$webdb[UpdatePostTime]>0 || $webdb[UpdatePostTime]=1;

unset($listdb,$i);
if ($action=='del'){
	$db->query("DELETE FROM {$pre}friendlink WHERE id='$id' AND city_id='$city_id'");
	write_friendlink();
}
if ($action=='sort'){
	foreach( $listdbsort AS $key=>$value){
		$db->query("UPDATE {$pre}friendlink SET `list`='$value' WHERE id='$key' AND city_id='$city_id'");
	}
	write_friendlink();
}
if ($action=='setyz'){
	$db->query("UPDATE {$pre}friendlink SET `yz`='$yz' WHERE id='$id' AND city_id='$city_id'");
	write_friendlink();
}
if($action == "edit"){
	$rsdb=$db->get_one("SELECT * FROM {$pre}friendlink WHERE id='$id' AND city_id='$city_id'");
	if(!$rsdb){
		showerr("你操作的内容有误,请再确认");
	}
	$rsdb[ifhide]=intval($rsdb[ifhide]);
	$ifhide[$rsdb[ifhide]]=" checked ";
	$yz[$rsdb[yz]]=" checked ";
	$iswordlink[$rsdb[iswordlink]]=" checked ";
	$rsdb[endtime]=$rsdb[endtime]?date("Y-m-d H:i:s",$rsdb[endtime]):'';
	if($step==2){
		$postdb[endtime]	&&	$postdb[endtime]=preg_replace("/([\d]+)-([\d]+)-([\d]+) ([\d]+):([\d]+):([\d]+)/eis","mk_time('\\4','\\5', '\\6', '\\2', '\\3', '\\1')",$postdb[endtime]);
		$db->query("UPDATE {$pre}friendlink SET name='$postdb[name]',url='$postdb[url]',logo='$postdb[logo]',descrip='$postdb[descrip]',`ifhide`='$postdb[ifhide]',`yz`='$postdb[yz]',`iswordlink`='$postdb[iswordlink]',endtime='$postdb[endtime]' WHERE id='$id'");
		write_friendlink();
		refreshto("$FROMURL","修改成功",1);
	}
	require(dirname(__FILE__)."/head.php");
	require(dirname(__FILE__)."/template/friendlink_edit.htm");
	require(dirname(__FILE__)."/foot.php");
	exit;
}
$query = $db->query("SELECT SQL_CALC_FOUND_ROWS * FROM {$pre}friendlink WHERE city_id='$city_id' ORDER BY list DESC,id DESC LIMIT $min,$rows");
$RS=$db->get_one("SELECT FOUND_ROWS()");
$totalNum=$RS['FOUND_ROWS()'];
$showpage=getpage('','',"?job=list",$rows,$totalNum);
while($rs = $db->fetch_array($query))
{
	
	$s=$db->get_one("SELECT name FROM {$pre}friendlink_sort WHERE fid='$rs[fid]'");
	$rs[fname] = $s[name];
	$rs[ifshow]=$rs[ifhide]?"<A HREF='#' style='color:red;'>首页隐藏</A>":"<A HREF='#' style='color:blue;'>首页显示</A>";
	$rs[yz]=$rs[yz]?"<a href='friendlink.php?job=list&action=setyz&yz=0&id=$rs[id]' style='color:red;'><img alt='已通过审核,点击取消审核' src='../member/images/check_yes.gif' border=0></a>":"<a href='friendlink.php?job=list&action=setyz&yz=1&id=$rs[id]' style='color:blue;'><img alt='还没通过审核,点击通过审核' src='../member/images/check_no.gif' border=0></a>";
	if(!$rs[endtime]){
		$rs[state]='长久有效';
	}elseif($rs[endtime]<$timestamp){
		$rs[state]='<font color=#FF0000>已过期</font>';
	}else{
		$rs[state]='<font color=#0000FF>'.date("Y-m-d H:i",$rs[endtime]).'</font>截止';
	}
	if($rs[logo]){
		$rs[logo]=tempdir($rs[logo]);
		$rs[logo]="<img src='$rs[logo]' width=88 height=31 border=0>";
	}
	$listdb[]=$rs;
}
require(dirname(__FILE__)."/head.php");
require(dirname(__FILE__)."/template/friendlink_list.htm");
require(dirname(__FILE__)."/foot.php");

?>