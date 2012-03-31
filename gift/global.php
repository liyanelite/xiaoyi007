<?php
define('Mpath',dirname(__FILE__).'/');
define( 'Mdirname' , preg_replace("/(.*)\/([^\/]+)/is","\\2",str_replace("\\","/",dirname(__FILE__))) );

require_once(Mpath."../inc/common.inc.php");
require_once(Mpath."data/config.php");			//系统全局变量
require_once(Mpath."data/all_fid.php");			//栏目的名称
require_once(Mpath."data/module_db.php");			//模块的名称
require_once(Mpath."inc/function.php");
require_once(Mpath."inc/module.class.php");
@include_once(ROOT_PATH."data/ad_cache.php");	//全站广告变量缓存文件
@include_once(ROOT_PATH."data/label_hf.php");	//标签的头与底的变量值
@include_once(ROOT_PATH."data/module.php");		//模块系统的参数变量值




$_pre="{$pre}{$webdb[module_pre]}";					//数据表前缀

$Module_db=new Module_Field(Mpath);						//自定义模型相关

$Murl=$webdb[www_url].'/'.Mdirname;					//本模块的访问地址
$Mdomain=$ModuleDB[$webdb[module_pre]][domain]?$ModuleDB[$webdb[module_pre]][domain]:$Murl;



/**
*前台是否开放
**/
if($webdb[module_close])
{
	$webdb[Info_closeWhy]=str_replace("\r\n","<br>",$webdb[Info_closeWhy]);
	showerr("本系统暂时关闭:$webdb[Info_closeWhy]");
}



unset($foot_tpl,$head_tpl,$index_tpl,$list_tpl,$bencandy_tpl);
$ch=intval($ch);
$fid=intval($fid);
$id=intval($id);
$page=intval($page);
$city_id=intval($city_id);
$zone_id=intval($zone_id);
$street_id=intval($street_id);


function list_apply($rows=8){
	global $db,$_pre;
	$query = $db->query("SELECT B.*,A.username,A.posttime FROM {$_pre}join A LEFT JOIN {$_pre}content B ON A.cid=B.id ORDER BY A.id DESC LIMIT $rows");
	while($rs = $db->fetch_array($query)){
		$rs[posttime]=date("m-d H:i",$rs[posttime]);
		$listdb[]=$rs;
	}
	return $listdb;
}

function list_gift($rows=8,$type='new',$fid=0){
	global $db,$_pre;
	if($fid){
		$SQL=" WHERE A.fid='$fid' ";
	}
	if($type=='new'){
		$order="A.id";
	}elseif($type=='hot'){
		$order="A.hits";
	}
	$query = $db->query("SELECT B.*,A.* FROM {$_pre}content A LEFT JOIN {$_pre}content_1 B ON A.id=B.id $SQL ORDER BY $order DESC LIMIT $rows");
	while($rs = $db->fetch_array($query)){
		$rs[picurl] && $rs[picurl] = tempdir($rs[picurl]);
		$rs[posttime]=date("Y-m-d H:i",$rs[posttime]);
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