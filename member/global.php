<?php
define('Memberpath',dirname(__FILE__).'/');
require(Memberpath."../inc/common.inc.php");
@include(ROOT_PATH."data/level.php");
@include_once(ROOT_PATH."data/all_fid.php");		//ȫ����Ŀ�����ļ�
@include(ROOT_PATH."data/article_module.php");

if(!$webdb[web_open])
{
	$webdb[close_why] = str_replace("\n","<br>",$webdb[close_why]);
	showerr("��վ��ʱ�ر�:$webdb[close_why]");
}

if($id||$aid){
	if(strlen($aid?$aid:$id)>8&&!in_array($erp=get_id_table($aid?$aid:$id),$Fid_db[iftable])){
		unset($erp);
	}
}
$id=intval($id);
$aid=intval($aid);
$tid=intval($tid);
/**
*������ЩIP����
**/
$IS_BIZ && Limt_IP('AllowVisitIp');


?>