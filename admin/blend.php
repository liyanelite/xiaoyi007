<?php
!function_exists('html') && exit('ERR');

if($action=="set"&&$Apower[blend_set])
{
	if($webdbs[passport_type]){
		if(strstr($webdbs[passport_pre],'.')&&eregi("^[0-9]+",$webdbs[passport_pre])){
			$d=explode(".",$webdbs[passport_pre]);
			$webdbs[passport_pre]="`{$d[0]}`.$d[1]";
		}

		if(eregi("^pwbbs",$webdbs[passport_type])||eregi("^dzbbs",$webdbs[passport_type])){
			if(!$db->get_one("SELECT * FROM $webdbs[passport_pre]members LIMIT 1")){
				showmsg("���ݱ�ǰ׺����,����֮");
			}
		}

		if(eregi("^dzbbs",$webdbs[passport_type])){
			if(!is_file(ROOT_PATH."$webdbs[passport_path]/config.inc.php")){
				//showmsg("�ⲿϵͳ���������վ����Ŀ¼λ�ò���,����֮");
			}
		}elseif(eregi("^pwbbs",$webdbs[passport_type])){
			if(!is_file(ROOT_PATH."$webdbs[passport_path]/data/bbscache/config.php")){
				showmsg("�ⲿϵͳ���������վ����Ŀ¼λ�ò���,����֮");
			}
		}
	}
	if(eregi("^dzbbs",$webdbs[passport_type])||eregi("^ucenter",$webdbs[passport_type])){
		if(!is_writable(ROOT_PATH."data/uc_config.php")){
			showmsg(ROOT_PATH."data/uc_config.php�ļ�����д");
		}
		preg_match_all("/define\([ ]*'[^']+'[ ]*,[ ]*'[^']*'[ ]*\)/is",stripslashes($UCenter_config),$array);
		$UCenter_config=implode(";\r\n",$array[0]).';';
		write_file(ROOT_PATH."data/uc_config.php","<?php\r\n$UCenter_config \r\n?>");
	}
	write_config_cache($webdbs);
	jump("�޸ĳɹ�",$FROMURL);
}
elseif($job=="set"&&$Apower[blend_set])
{
	$content=read_file(ROOT_PATH."data/uc_config.php");
	preg_match_all("/define([^;]+)/is",$content,$array);
	
	$UCenter_config=implode(";\r\n",$array[0]).';';

	$webdb[passport_type] || $webdb[passport_type]=0;
	$passport_type='';
	$passport_type["$webdb[passport_type]"]=' checked ';
	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/blend/set.htm");
	require(dirname(__FILE__)."/"."foot.php");
}

?>