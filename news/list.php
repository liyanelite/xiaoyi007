<?php
require(dirname(__FILE__)."/global.php");
@include(dirname(__FILE__)."/data/guide_fid.php");

/**
*��ȡ��Ŀ��ģ��������ļ�
**/
$fidDB=$db->get_one("SELECT A.* FROM {$_pre}sort A WHERE A.fid='$fid'");

/**
*��ת���ⲿ��ַ
**/
if($fidDB[jumpurl])
{
	header("location:$fidDB[jumpurl]");
	exit;
}

$fidDB[descrip]=En_TruePath($fidDB[descrip],0);


//SEO
$titleDB[title]		= filtrate("$fidDB[name] - $webdb[Info_webname] - $titleDB[title]");
$titleDB[keywords]	= $titleDB[description] = filtrate("$webdb[Info_webname] - $webdb[Info_metakeywords] - $titleDB[title] - $titleDB[keywords]");


//��Ŀ���
$fidDB[style] && $STYLE=$fidDB[style];


/**
*ģ��
**/
$FidTpl=unserialize($fidDB[template]);
$head_tpl=$FidTpl['head'];
$foot_tpl=$FidTpl['foot'];

$_url="list.php?fid=$fid";

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
if($fidDB[type]){
	$chdb[main_tpl]=getTpl("bigsort",$FidTpl['list']);
}else{
	$chdb[main_tpl]=getTpl("list",$FidTpl['list']);
}
/**
*��ǩ
**/
$ch_fid	= intval($fidDB[config][label_list]);		//�Ƿ�������Ŀר�ñ�ǩ
$ch_pagetype = 2;									//2,Ϊlistҳ,3,Ϊbencandyҳ
$ch_module = $webdb[module_id];						//ϵͳ�ض�ID����,ÿ��ϵͳ������ͬ
$ch = 0;											//�������κ�ר��
require(ROOT_PATH."inc/label_module.php");

if($spid)
{
	$SQL=" AND A.spid='$spid' ";
}
else
{
	$SQL=" ";
}

if($cityID)
{
	$SQL=" AND A.cityid='$cityID' ";
}
elseif($provinceID)
{
	$SQL=" AND A.provinceid='$provinceID' ";
}

$Lrows=$fidDB[maxperpage]>0?$fidDB[maxperpage]:($webdb[Infolist_row]>0?$webdb[Infolist_row]:15);
if($fidDB[type]==0)
{
	@extract($db->get_one("SELECT COUNT(*) AS NUM FROM {$_pre}content A WHERE A.fid=$fid AND A.yz=1 $SQL"));
}

/*�����*/
if($fidDB[type]==1)
{
	$sort_db=$listdb_moresort=ListOnlySort(100);
}

/*С����*/
if($fidDB[type]==0)
{	
	$listdb=ListThisSort($Lrows,$webdb[InfoListLeng]>0?$webdb[InfoListLeng]:70);
	$showpage=getpage("{$_pre}content A","WHERE A.fid=$fid AND A.yz=1 $SQL",$_url,$Lrows,$NUM);	
}


require(ROOT_PATH."inc/head.php");
if($fidDB[type]){
	require(getTpl("bigsort",$FidTpl['list']));
}else{
	require(getTpl("list",$FidTpl['list']));
}
require(ROOT_PATH."inc/foot.php");

?>