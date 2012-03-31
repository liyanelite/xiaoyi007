<?php
require(dirname(__FILE__)."/global.php");



/**
*为获取标签参数
**/
$chdb[main_tpl] = getTpl("city");

/**
*标签
**/
$ch_fid	= 0;		//是否定义了栏目专用标签
$ch_pagetype = 4;									//2,为list页,3,为bencandy页
$ch_module = $webdb[module_id]?$webdb[module_id]:99;//系统特定ID参数,每个系统不能雷同
$ch = 0;											//不属于任何专题
require(ROOT_PATH."inc/label_module.php");

require(ROOT_PATH."inc/head.php");
require(getTpl("city"));
require(ROOT_PATH."inc/foot.php");

?>