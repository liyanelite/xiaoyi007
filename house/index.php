<?php
require(dirname(__FILE__)."/global.php");



//SEO
$titleDB['title'] = "{$city_DB[name][$city_id]} $webdb[Info_webname]";
$titleDB['keywords']	= "{$city_DB[name][$city_id]} $webdb[Info_metakeywords]?$webdb[Info_metakeywords]:$webdb[metakeywords]";
$titleDB['description'] = "{$city_DB[name][$city_id]}$webdb[Info_description]?$webdb[Info_description] : $webdb[description]";


//��ҳ����ͷ����β��
$head_tpl=html('head');
$foot_tpl=html('foot');
if($webdb[IF_Private_tpl]){
	if(is_file(Mpath.$webdb[Private_tpl_head])){
		$head_tpl=Mpath.$webdb[Private_tpl_head];
	}
	if(is_file(Mpath.$webdb[Private_tpl_foot])){
		$foot_tpl=Mpath.$webdb[Private_tpl_foot];
	}
}

/**
*��ǩʹ��
**/
$chdb[main_tpl] = getTpl("index",$index_tpl);
$ch_fid	= $ch_pagetype = 0;
$ch_module = $webdb[module_id]?$webdb[module_id]:99;	//ϵͳ�ض�ID����,ÿ��ϵͳ������ͬ
require(ROOT_PATH."inc/label_module.php");


/**
*�Ƽ�����Ŀ����ҳ��ʾ
**/
$listdb_moresort=Info_ListMoreSort($webdb[InfoIndexCSRow],$webdb[InfoIndexCSLeng],$city_id);

//ÿ����Ŀ����Ϣ��
$InfoNum=get_infonum($city_id);
require(Mpath."inc/head.php");
require(getTpl("index",$index_tpl));
require(Mpath."inc/foot.php");



?>