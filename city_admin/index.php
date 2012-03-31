<?php
require_once(dirname(__FILE__)."/"."global.php");


$selectcity='';
$query = $db->query("SELECT * FROM {$pre}city ORDER BY list DESC");
while($rs = $db->fetch_array($query)){
	$detail=explode(',',$rs[admin]);
	if($web_admin || in_array($lfjid,$detail)){
		$check=$rs[fid]==$city_id?' selected ':'';
		$selectcity.="<option value='$rs[fid]' $check>$rs[name]</option>";
	}
}
$selectcity="<select name='select' onChange=\"window.location.href='$webdb[_www_url]/city_admin/?admin_city='+this.options[this.selectedIndex].value\">$selectcity</select>";


if($web_admin){
	$power=3;
}else{
	$power=1;
}

require_once(dirname(__FILE__)."/"."menu.php");
preg_match("/(.*)\/(index\.php|)\?main=(.+)/is",$WEBURL,$UrlArray);
$MainUrl=$UrlArray[3]?$UrlArray[3]:"map.php?uid=$lfjuid";

require_once(dirname(__FILE__)."/"."template/index.htm");

$content=ob_get_contents();
ob_end_clean();
ob_start();
if($webdb[www_url]=='/.'){
	$content=str_replace('/./','/',$content);
}
echo $content;
?>