<?php
if(!function_exists('html')){
	die('F');
}
$show='';
$listdb=Get_Info($type='level',$rows?$rows:10,$leng?$leng:30,$fid,$mid=0);
foreach($listdb AS $rs){
	$rs[url]=get_info_url($rs[id],$rs[fid],$rs[city_id]);
	$show.="��<a href='$rs[url]' target='_blank'>$rs[title]</a><br>";
}

if($webdb[RewriteUrl]==1){	//ȫ��α��̬
	rewrite_url($show);
}

$show=str_replace(array("\n","\r","'"),array("","","\'"),$show);
if($webdb[cookieDomain]){
	echo "<SCRIPT LANGUAGE=\"JavaScript\">document.domain = \"$webdb[cookieDomain]\";</SCRIPT>";
}
echo "<SCRIPT LANGUAGE=\"JavaScript\">
parent.document.getElementById('$iframeID').innerHTML='$show';
</SCRIPT>";
?>