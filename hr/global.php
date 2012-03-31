<?php
define('Mpath',dirname(__FILE__).'/');
define( 'Mdirname' , preg_replace("/(.*)\/([^\/]+)/is","\\2",str_replace("\\","/",dirname(__FILE__))) );

require_once(Mpath."../inc/common.inc.php");
require_once(Mpath."data/config.php");			//系统全局变量
require_once(Mpath."data/all_fid.php");			//栏目的名称
require_once(Mpath."data/module_db.php");			//模块的名称
require_once(Mpath."inc/function.php");
@include_once(ROOT_PATH."data/ad_cache.php");	//全站广告变量缓存文件
@include_once(ROOT_PATH."data/label_hf.php");	//标签的头与底的变量值
require_once(Mpath."inc/module.class.php");


$_pre="{$pre}{$webdb[module_pre]}";					//数据表前缀

$Module_db=new Module_Field(Mpath);						//自定义模型相关

$Murl=$webdb[www_url].'/'.Mdirname;					//本模块的访问地址
$Mdomain=$ModuleDB[$webdb[module_pre]][domain]?$ModuleDB[$webdb[module_pre]][domain]:$Murl;


unset($foot_tpl,$head_tpl,$index_tpl,$list_tpl,$bencandy_tpl);
$ch=intval($ch);
$fid=intval($fid);
$id=intval($id);
$page=intval($page);
$city_id=intval($city_id);
$cid=intval($cid);

if($webdb[module_close])
{
	$webdb[Info_closeWhy]=str_replace("\r\n","<br>",$webdb[Info_closeWhy]);
	showerr("本系统暂时关闭:$webdb[Info_closeWhy]");
}


function list_hr_member($type='new',$rows=10){
	global $db,$pre,$_pre,$module_DB,$Module_db,$city_id;
	if($type=='new'){
		$SQL = " WHERE A.city_id='$city_id' ORDER BY A.id DESC LIMIT $rows";
	}elseif($type=='com'){
		$SQL = " WHERE A.city_id='$city_id' AND A.levels=1 ORDER BY A.levelstime DESC LIMIT $rows";
	}
	$query = $db->query("SELECT A.*,B.* FROM {$_pre}person A LEFT JOIN {$_pre}content_2 B ON B.id=A.id $SQL");
	while($rs = $db->fetch_array($query)){
		$Module_db->showfield($module_DB[2][field],$rs,'list');
		$listdb[]=$rs;
	}
	return $listdb;
}

function list_hr_job($type='new',$rows=10,$getcompany=false){
	global $db,$pre,$_pre,$module_DB,$Module_db,$city_id;

	if($type=='new'){
		$SQL = " WHERE A.city_id='$city_id' ORDER BY A.id DESC LIMIT $rows";
	}elseif($type=='hot'){
		$SQL = " WHERE A.city_id='$city_id' ORDER BY A.hits DESC LIMIT $rows";
	}elseif($type=='com'){
		$SQL = " WHERE A.city_id='$city_id' AND A.levels=1 ORDER BY A.levelstime DESC LIMIT $rows";
	}elseif(is_numeric($type)){
		$SQL = " WHERE A.city_id='$city_id' AND A.uid='$type' ORDER BY A.id DESC LIMIT $rows";
	}
	if($getcompany){
		$_ss=",C.title AS company ";
		$_sql=" LEFT JOIN {$pre}hy_company C ON A.uid=C.uid ";
	}
	$query = $db->query("SELECT A.*,B.*$_ss FROM {$_pre}content A LEFT JOIN {$_pre}content_1 B ON B.id=A.id $_sql $SQL");
	while($rs = $db->fetch_array($query)){
		$Module_db->showfield($module_DB[1][field],$rs,'list');
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