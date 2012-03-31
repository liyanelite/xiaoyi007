<?php
define('Mpath',dirname(__FILE__).'/');
define( 'Mdirname' , preg_replace("/(.*)\/([^\/]+)/is","\\2",str_replace("\\","/",dirname(__FILE__))) );

require_once(Mpath."../inc/common.inc.php");
require_once(Mpath."data/config.php");			//ϵͳȫ�ֱ���
require_once(Mpath."data/all_fid.php");			//��Ŀ������
require_once(Mpath."data/module_db.php");			//ģ�������
require_once(Mpath."inc/function.php");
require_once(Mpath."inc/module.class.php");

@include_once(ROOT_PATH."data/ad_cache.php");	//ȫվ������������
@include_once(ROOT_PATH."data/label_hf.php");	//��ǩ��ͷ��׵ı���ֵ
@include_once(ROOT_PATH."data/module.php");		//ģ��ϵͳ�Ĳ�������ֵ



$_pre="{$pre}{$webdb[module_pre]}";					//���ݱ�ǰ׺

$Module_db=new Module_Field(Mpath);						//�Զ���ģ�����

$Murl=$webdb[www_url].'/'.Mdirname;					//��ģ��ķ��ʵ�ַ
$city_url=$Mdomain=$ModuleDB[$webdb[module_pre]][domain]?$ModuleDB[$webdb[module_pre]][domain]:$Murl;


unset($foot_tpl,$head_tpl,$index_tpl,$list_tpl,$bencandy_tpl);
$ch=intval($ch);
$fid=intval($fid);
$id=intval($id);
$page=intval($page);
$city_id=intval($city_id);
$cid=intval($cid);
/**
*ǰ̨�Ƿ񿪷�
**/
if($webdb[module_close])
{
	$webdb[Info_closeWhy]=str_replace("\r\n","<br>",$webdb[Info_closeWhy]);
	showerr("��ϵͳ��ʱ�ر�:$webdb[Info_closeWhy]");
}

function list_title($type='new',$rows=10){
	global $db,$pre,$_pre,$city_id;

	if($type=='new'){
		$SQL = " WHERE A.city_id='$city_id' ORDER BY A.id DESC LIMIT $rows";
	}elseif($type=='hot'){
		$SQL = " WHERE A.city_id='$city_id' ORDER BY A.hits DESC LIMIT $rows";
	}elseif($type=='com'){
		$SQL = " WHERE A.levels=1 AND A.city_id='$city_id' ORDER BY A.levelstime DESC LIMIT $rows";
	}
	$query = $db->query("SELECT A.*,B.* FROM {$_pre}content A LEFT JOIN {$_pre}content_1 B ON B.id=A.id $SQL");
	while($rs = $db->fetch_array($query)){
		$rs[picurl] && $rs[picurl] = tempdir($rs[picurl]);
		$listdb[]=$rs;
	}
	return $listdb;
}
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