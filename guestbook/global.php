<?php
define('Mpath',dirname(__FILE__).'/');
define( 'Mdirname' , preg_replace("/(.*)\/([^\/]+)/is","\\2",str_replace("\\","/",dirname(__FILE__))) );

require_once(Mpath."../inc/common.inc.php");
require_once(Mpath."data/all_fid.php");
require_once(Mpath."data/config.php");			//ϵͳȫ�ֱ���
@include_once(ROOT_PATH."data/ad_cache.php");	//ȫվ�����������ļ�
@include_once(ROOT_PATH."data/label_hf.php");	//��ǩ��ͷ��׵ı���ֵ

$_pre="{$pre}{$webdb[module_pre]}";					//���ݱ�ǰ׺

$Murl=$webdb[www_url].'/'.Mdirname;					//��ģ��ķ��ʵ�ַ
$Mdomain=$ModuleDB[$webdb[module_pre]][domain]?$ModuleDB[$webdb[module_pre]][domain]:$Murl;



/**
*ǰ̨�Ƿ񿪷�
**/
if($webdb[module_close])
{
	$webdb[Info_closeWhy]=str_replace("\r\n","<br>",$webdb[Info_closeWhy]);
	showerr("��ϵͳ��ʱ�ر�:$webdb[Info_closeWhy]");
}


unset($foot_tpl,$head_tpl,$index_tpl,$list_tpl,$bencandy_tpl);
$ch=intval($ch);
$fid=intval($fid);
$id=intval($id);
$page=intval($page);



/**
*��ȡģ��ĺ���
**/
function getTpl($html,$tplpath=''){
	global $STYLE;
	if($tplpath&&file_exists($tplpath)){
		return $tplpath;
	}elseif($tplpath&&file_exists(Mpath.$tplpath)){
		return Mpath.$tplpath;
	}elseif(file_exists(Mpath."template/$STYLE/$html.htm")){
		return Mpath."template/$STYLE/$html.htm";
	}else{
		return Mpath."template/default/$html.htm";
	}
}
?>