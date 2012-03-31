<?php

require(dirname(__FILE__)."/global.php");
require(ROOT_PATH."data/friendlink.php");

//SEO
$titleDB[title]		= "$webdb[Info_webname] - $titleDB[title]";
$titleDB[keywords]	= $titleDB[description] = "$webdb[Info_webname] - $webdb[Info_metakeywords] - $titleDB[keywords]";
$titleDB['description'] = "{$city_DB[name][$city_id]}$webdb[Info_description]?$webdb[Info_description] : $webdb[description]";

//主页个性头部与尾部
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
*标签使用
**/
$ch_fid	= $ch_pagetype = 0;
$ch_module = $webdb[module_id];
require(ROOT_PATH."inc/label_module.php");


require(ROOT_PATH."inc/head.php");
require(getTpl("index"));
require(ROOT_PATH."inc/foot.php");


?>