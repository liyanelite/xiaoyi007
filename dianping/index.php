<?php
require(dirname(__FILE__)."/global.php");

$fendb=array();

$fendb[fen1][name]="总评";
$fendb[fen2][name]="环境";
$fendb[fen3][name]="服务";
$fendb[fen4][name]="价位";
$fendb[fen5][name]="喜欢程度";

$fendb[fen1][set]="1=差\r\n2=一般\r\n3=好\r\n4=很好\r\n5=非常好";
$fendb[fen2][set]="1=差\r\n2=一般\r\n3=好\r\n4=很好\r\n5=非常好";
$fendb[fen3][set]="1=差\r\n2=一般\r\n3=好\r\n4=很好\r\n5=非常好";
$fendb[fen4][set]="1=便宜\r\n2=适中\r\n3=贵\r\n4=很贵";
$fendb[fen5][set]="1=不喜欢\r\n2=无所谓\r\n3=喜欢\r\n4=很喜欢";
 

//SEO
$titleDB['title'] = "{$city_DB[name][$city_id]} $webdb[Info_webname]";
$titleDB['keywords']	= "{$city_DB[name][$city_id]} $webdb[Info_metakeywords]";
$titleDB['description'] = $city_DB[name][$city_id].$webdb[Info_description]?$webdb[Info_description] : $webdb[description];

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
$chdb[main_tpl] = getTpl("index",$index_tpl);
$ch_fid	= $ch_pagetype = 0;
$ch_module = $webdb[module_id]?$webdb[module_id]:99;	//系统特定ID参数,每个系统不能雷同
require(ROOT_PATH."inc/label_module.php");


/**
*推荐的栏目在首页显示
**/
$listdb_moresort=Info_ListMoreSort($webdb[InfoIndexCSRow],$webdb[InfoIndexCSLeng],$city_id);

//每个栏目的信息数
$InfoNum=get_infonum($city_id);
require(Mpath."inc/head.php");
require(getTpl("index",$index_tpl));
require(Mpath."inc/foot.php");

function get_dianping($rows=5,$leng=80){
	global $_pre,$pre,$db,$fendb,$city_id;
	$query=$db->query("SELECT A.*,C.title,D.icon FROM `{$_pre}dianping` A LEFT JOIN `{$_pre}content` C ON A.id=C.id LEFT JOIN {$pre}memberdata D ON A.uid=D.uid WHERE C.city_id='$city_id' ORDER BY A.cid DESC LIMIT  $rows");
	while( $rs=$db->fetch_array($query) ){	
		$rs[fen]='';
		$rs[fen].=fen_value($fendb[fen1][name],$fendb[fen1][set],$rs[fen1]);
		$rs[fen].=fen_value($fendb[fen2][name],$fendb[fen2][set],$rs[fen2]);
		$rs[fen].=fen_value($fendb[fen3][name],$fendb[fen3][set],$rs[fen3]);
		$rs[fen].=fen_value($fendb[fen4][name],$fendb[fen4][set],$rs[fen4]);
		$rs[fen6]=fen6_value($fendb[fen6][name],$fendb[fen6][set],$rs[fen6]);
		$rs[icon] && $rs[icon]=tempdir($rs[icon]);
		
		if(!$rs[username]){		
			$detail=explode(".",$rs[ip]);
			$rs[username]="$detail[0].$detail[1].$detail[2].*";
		}
		$rs[posttime]=date("Y-m-d H:i:s",$rs[posttime]);
		$rs[full_content]=$rs[content];
		$rs[content]=get_word($rs[content],$leng);
		$rs[content]=str_replace("<br>","",$rs[content]);
		$listdb[]=$rs;
	}
	return $listdb;
}

function fen_value($title,$set,$v){
	global $webdb;
	$shows="";
	$detail=explode("\r\n",$set);
	foreach( $detail AS $key=>$value){
		$d=explode("=",$value);
		if($d[0]==$v){
			$va ="$d[1]";
		}
	}
	$shows.=" <span class='title'>$title:</span>";
	for($i=0;$i<$v;$i++){
		$shows.="<img alt='$va' src='$webdb[www_url]/images/default/icon_star_2.gif'>";
	}
	for($j=(count($detail)-$i);$j>0 ;$j-- ){
		$shows.="<img alt='$va' src='$webdb[www_url]/images/default/icon_star_1.gif'>";
	}
	return $shows;
}
function fen6_value($title,$set,$v){
	$array=explode(",",$v);
	$detail=explode("\r\n",$set);
	foreach( $detail AS $key=>$value){
		if(in_array($value,$array)){
			$va[] ="$value";
		}
	}
	if(!$va){
		return ;
	}
	$shows =" <span class='title'>{$title}：</span>";
	$shows.=implode(" ",$va);
	if($title){
		return $shows;
	}	
}
?>