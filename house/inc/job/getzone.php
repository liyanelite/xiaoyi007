<?php
if(!function_exists('html')){
die('F');
}

if($webdb[cookieDomain]){
	echo "<SCRIPT LANGUAGE='JavaScript'>document.domain = '$webdb[cookieDomain]';</SCRIPT>";
}

if($fup){
	$show=select_where("{$pre}zone","'postdb[zone_id]'  onChange=\"choose_where('getstreet',this.options[this.selectedIndex].value,'','','$typeid')\"",$fid,$fup);
	$show=str_replace("\r","",$show);
	$show=str_replace("\n","",$show);
	$show=str_replace("'","\'",$show);
	echo "<SCRIPT LANGUAGE=\"JavaScript\">
	<!--
	parent.document.getElementById(\"{$typeid}showzone\").innerHTML='$show';
	//-->
	</SCRIPT>";
	
}
if($delstreet){
	echo "<SCRIPT LANGUAGE=\"JavaScript\">
	<!--
	parent.document.getElementById(\"{$typeid}showstreet\").innerHTML='';
	//-->
	</SCRIPT>";
	if(!$fup){
		echo "<SCRIPT LANGUAGE=\"JavaScript\">
		<!--
		parent.document.getElementById(\"{$typeid}showzone\").innerHTML='';
		//-->
		</SCRIPT>";
	}
}
?>