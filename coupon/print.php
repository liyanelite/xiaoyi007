<?php
require(dirname(__FILE__)."/global.php");

$fidDB=$db->get_one("SELECT A.* FROM {$_pre}sort A WHERE A.fid='$fid'");

if(!$fidDB){
	showerr("FID有误!");
}
/**
*获取信息正文的内容
**/
$rsdb=$db->get_one("SELECT B.*,A.* FROM `{$_pre}content` A LEFT JOIN `{$_pre}content_$fidDB[mid]` B ON A.id=B.id WHERE A.id='$id'");

if(!$rsdb){
	showerr("内容不存在");
}
elseif($rsdb[fid]!=$fid){
	showerr("FID有误!!!");
}

$titleDB[title]			= filtrate(strip_tags("$rsdb[title] - {$city_DB[name][$city_id]}$fidDB[name] - $webdb[Info_webname]"));

if( is_file(ROOT_PATH."$webdb[updir]/".substr($rsdb[picurl],0,-4)) ){
	$rsdb[picurl] = substr($rsdb[picurl],0,-4);
}

$pic=tempdir($rsdb[picurl]);


print<<<EOT

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>$titleDB[title]</TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
</HEAD>

<BODY onload="window.print();">
<img src="$pic">
</BODY>
</HTML>



EOT;
?>