<?php
require(dirname(__FILE__)."/global.php");



/**
*Ϊ��ȡ��ǩ����
**/
$chdb[main_tpl] = getTpl("city");

/**
*��ǩ
**/
$ch_fid	= 0;		//�Ƿ�������Ŀר�ñ�ǩ
$ch_pagetype = 4;									//2,Ϊlistҳ,3,Ϊbencandyҳ
$ch_module = $webdb[module_id]?$webdb[module_id]:99;//ϵͳ�ض�ID����,ÿ��ϵͳ������ͬ
$ch = 0;											//�������κ�ר��
require(ROOT_PATH."inc/label_module.php");

require(ROOT_PATH."inc/head.php");
require(getTpl("city"));
require(ROOT_PATH."inc/foot.php");

?>