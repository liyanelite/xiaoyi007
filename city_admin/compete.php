<?php
require_once(dirname(__FILE__)."/global.php");

$jobdb=array('list');

if(!in_array($job, $jobdb)){
	showerr('�������ʹ���!');
}
$_pre=$pre.'ad_'.basename(__FILE__,".php");

/**
*ÿҳ��ʾ40��
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
	$db->query("DELETE FROM {$_pre}_user WHERE ad_id='$id' AND city_id='$city_id'");
	//make_ad_cache();
	//refreshto($FROMURL,"ɾ���ɹ�",0);
}
if($action=="edit"){
	$rsdb = $db->get_one("SELECT AD.name,AD.wordnum,B.* FROM `{$pre}ad_compete_place` AD LEFT JOIN `{$pre}ad_compete_user` B ON AD.id=B.id WHERE ad_id='$id' AND B.city_id='$city_id'");
	if(!$rsdb){
		showerr('��������!��ȷ����������û��������۹��');
	}
	$rsdb[begintime]=date("Y-m-d H:i",$rsdb[begintime]);
	$rsdb[endtime]=date("Y-m-d H:i",$rsdb[endtime]);
	if($step==2){
		if($rsdb[wordnum]&&strlen($postdb[adword])>$rsdb[wordnum]){
			showerr("��Ĺ�����������������ܴ���{$rsdb[wordnum]}��");
		}elseif($postdb[adword]===''){
			showerr("����������ݲ���Ϊ��");
		}
		if(!strstr($postdb[adlink],'http://')){
			$postdb[adlink]="http://$postdb[adlink]";
		}
		$postdb[adlink]=filtrate($postdb[adlink]);
		$postdb[adword]=filtrate($postdb[adword]);
		$db->query("UPDATE `{$pre}ad_compete_user` SET adword='$postdb[adword]',adlink='$postdb[adlink]' WHERE  city_id='$city_id' AND ad_id='$id'");
		refreshto("$FROMURL","�޸ĳɹ�",1);
	}
	require(dirname(__FILE__)."/head.php");
	require(dirname(__FILE__)."/template/compete_buy.htm");
	require(dirname(__FILE__)."/foot.php");
	exit;
}
$query = $db->query("SELECT SQL_CALC_FOUND_ROWS * FROM {$_pre}_user WHERE city_id='$city_id' ORDER BY id DESC LIMIT $min,$rows");
$RS=$db->get_one("SELECT FOUND_ROWS()");
$totalNum=$RS['FOUND_ROWS()'];
$showpage=getpage('','',"?job=list",$rows,$totalNum);
while($rs = $db->fetch_array($query))
{
	
	$s=$db->get_one("SELECT name FROM {$pre}city WHERE fid='$rs[city_id]'");
	$ad = $db->get_one("SELECT name FROM {$_pre}_place WHERE id='$rs[id]'");
	$rs[city] = $s[name];
	$rs[place_name] = $ad[name];
	$rs[begin]  = date("Y-m-d H:i",$rs[begintime]);
	$rs[end]	= date("Y-m-d H:i",$rs[endtime]);
	$listdb[]=$rs;
}
require(dirname(__FILE__)."/head.php");
require(dirname(__FILE__)."/template/ad_compete_list.htm");
require(dirname(__FILE__)."/foot.php");
?>