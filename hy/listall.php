<?php
require(dirname(__FILE__)."/global.php");

if($page<1){
	$page=1;
}
$rows=10;
$min=($page-1)*$rows;
if(!in_array($ordertype,array('hits','rid','levelstime'))){
	$ordertype='rid';
}
if($ordertype=='levelstime'){
	$SQL=" AND levels=1 ";
}else{
	$SQL=" ";
}
$query = $db->query("SELECT SQL_CALC_FOUND_ROWS * FROM {$_pre}company WHERE city_id='$city_id' $SQL ORDER BY $ordertype DESC LIMIT $min,$rows");
$RS=$db->get_one("SELECT FOUND_ROWS()");
$totalNum=$RS['FOUND_ROWS()'];
while($rs = $db->fetch_array($query)){
	$rs[posttime]=date("Y-m-d H:i",$rs[posttime]);
	$rs[picurl]=tempdir($rs[picurl]);
	$listdb[]=$rs;
}
$showpage=getpage("","","?ordertype=$ordertype",$rows,$totalNum);

//�б�ҳ����ͷ����β��
$head_tpl=html('head');
$foot_tpl=html('foot');
if($webdb[IF_Private_tpl]==2||$webdb[IF_Private_tpl]==3){
	if(is_file(Mpath.$webdb[Private_tpl_head])){
		$head_tpl=Mpath.$webdb[Private_tpl_head];
	}
	if(is_file(Mpath.$webdb[Private_tpl_foot])){
		$foot_tpl=Mpath.$webdb[Private_tpl_foot];
	}
}

/**
*Ϊ��ȡ��ǩ����
**/
$chdb[main_tpl]=getTpl("listall");

/**
*��ǩ
**/
$ch_fid	= 0;										//�Ƿ�������Ŀר�ñ�ǩ
$ch_pagetype = 4;									//2,Ϊlistҳ,3,Ϊbencandyҳ
$ch_module = $webdb[module_id]?$webdb[module_id]:99;//ϵͳ�ض�ID����,ÿ��ϵͳ������ͬ
$ch = 0;											//�������κ�ר��
require(ROOT_PATH."inc/label_module.php");

require(ROOT_PATH."inc/head.php");
require(getTpl("listall"));
require(ROOT_PATH."inc/foot.php");

?>