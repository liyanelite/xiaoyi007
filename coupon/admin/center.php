<?php
!function_exists('html') && exit('ERR');


if($job)
{
	$query=$db->query(" SELECT * FROM {$_pre}config ");
	while( $rs=$db->fetch_array($query) ){
		$webdb[$rs[c_key]]=$rs[c_value];
	}
}
if($job=="label"&&ck_power('center_label')){
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=$Murl/index.php?jobs=show'>";
	exit;
}
elseif($job=="config"&&ck_power('center_config'))
{
	$Info_allowpost=group_box("webdbs[Info_allowpost]",explode(",",$webdb[Info_allowpost]));
	$Info_webOpen[intval($webdb[Info_webOpen])]=' checked ';
	$module_close[intval($webdb[module_close])]=" checked ";
	get_admin_html('config');
}

elseif($action=="config"&&ck_power('center_config'))
{
	module_write_config_cache($webdbs);
	refreshto($FROMURL,"ÐÞ¸Ä³É¹¦");
}

?>