<?php
if(file_exists(dirname(__FILE__)."/../".'install.php')){
	header("location:install.php");exit;
}

require(dirname(__FILE__)."/global.php");


if($city_DB[domain]&&!$webdb[cookieDomain]){
	showerr('�������˳��ж�������,�����̨����һ��COOKIE��Ч����,�����û���¼ǰ̨�᲻����!');
}

//����ж��������Ļ�,����ת����������
if($jobs!='show'&&$_domain=$city_DB[domain][$city_id]){
	if(!strstr($WEBURL,$_domain)){
		if(strstr($WEBURL,$webdb[www_url])){
			$url=str_replace($webdb[www_url],$_domain,$WEBURL);
		}else{
			$url=preg_replace("/^http:\/\/([^\/]+)(\/.*|)$/is","$_domain\\2",$WEBURL);
		}
		header("location:$url");exit;								
	}
}

$Cache_FileName=ROOT_PATH."cache/list_cache/index.php";
if(count($city_DB[name])<2&&!$jobs&&!$MakeIndex&&$ch<2&&$webdb[index_cache_time]&&(time()-filemtime($Cache_FileName))<($webdb[index_cache_time]*60)){
	echo read_file($Cache_FileName);
	exit;
}

require(ROOT_PATH."data/friendlink.php");


//SEO
$titleDB['title'] = $city_DB['metaT'][$city_id]?seo_eval($city_DB['metaT'][$city_id]):$webdb['webname'];
$titleDB['keywords']	= $city_DB['metaK'][$city_id]?seo_eval($city_DB['metaK'][$city_id]):$webdb['metakeywords'];
$titleDB['description'] = $city_DB['metaD'][$city_id]?seo_eval($city_DB['metaD'][$city_id]):$webdb['description'];



$head_tpl = $foot_tpl = $index_tpl = '';

//����ģ��
if($city_DB[tpl][$city_id]){
	list($head_tpl,$foot_tpl,$index_tpl)=explode("|",$city_DB[tpl][$city_id]);
	$head_tpl && $head_tpl=ROOT_PATH.$head_tpl;
	$foot_tpl && $foot_tpl=ROOT_PATH.$foot_tpl;
	$index_tpl && $index_tpl=ROOT_PATH.$index_tpl;
}

/**
*fid��ĿFID��Ϊ0,pagetypeҳ�����Ͷ���0(��ʵΪ1��,ʡ�Է���Щ),module����Ϊ0
**/
$chdb[main_tpl] = html('main',$index_tpl);
$ch_fid	= $ch_module = 0;
$ch_pagetype = 8;
$ch = 0;
require(ROOT_PATH."inc/label_module.php");



require(ROOT_PATH."inc/head.php");
require(html('main',$index_tpl));
require(ROOT_PATH."inc/foot.php");


if(count($city_DB[name])<2&&!$jobs&&!$MakeIndex&&$ch<2&&$webdb[index_cache_time]&&(time()-filemtime($Cache_FileName))>($webdb[index_cache_time]*60)){
	if(!is_dir(dirname($Cache_FileName))){
		makepath(dirname($Cache_FileName));
	}
	write_file($Cache_FileName,$content);
}elseif($jobs=='show'){
	@unlink($Cache_FileName);
}

/*��ҳ����̬*/
if(count($city_DB[name])<2 && ($jobs!='show'&&$webdb[MakeIndexHtmlTime]>0) || $MakeIndex )
{
	if( $MakeIndex || (time()-@filemtime('index.htm')-$webdb[MakeIndexHtmlTime]*60)>0 ){	
		write_file(ROOT_PATH.'index.htm',$content);
		if($MakeIndex){		
			ob_end_clean();
			echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=$webdb[www_url]/index.htm'>";
			exit;
		}
	}
}

?>