<?php
function_exists('html') OR exit('ERR');

ck_power('center');

//$linkdb=array("��������"=>"center.php?job=config");

if($job)
{
	$query=$db->query(" SELECT * FROM {$_pre}config ");
	while( $rs=$db->fetch_array($query) ){
		$webdb[$rs[c_key]]=$rs[c_value];
	}
}
if($job=="label"){
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=../$dirname/index.php?jobs=show'>";
	exit;
}
elseif($job=="config")
{
	$showNoPassComment[intval($webdb[showNoPassComment])]=' checked ';

	$webdb[Info_webOpen]?$Info_webOpen1='checked':$Info_webOpen0='checked';
	$Info_webOpen[intval($webdb[Info_webOpen])]=' checked ';

	$yzImgGuestBook[intval($webdb[yzImgGuestBook])]=' checked ';

	$viewNoPassGuestBook[intval($webdb[viewNoPassGuestBook])]=' checked ';

	$ifOpenGuestBook[intval($webdb[ifOpenGuestBook])]=' checked ';

	$groupPassPassGuestBook=group_box("webdbs[groupPassPassGuestBook]",explode(",",$webdb[groupPassPassGuestBook]));

	$module_close[intval($webdb[module_close])]=" checked ";
	
	get_admin_html('config');
}


elseif($action=="config")
{
	if( isset($webdbs[Info_webadmin]) ){
		$webdbs[Info_webadmin]=filtrate($webdbs[Info_webadmin]);
		$db->query("UPDATE {$pre}module SET adminmember='$webdbs[Info_webadmin]' WHERE id='$webdb[module_id]'");
	}
	if( isset($webdbs[Info_weburl]) ){
		$webdbs[Info_weburl]=filtrate($webdbs[Info_weburl]);
		$db->query("UPDATE {$pre}module SET domain='$webdbs[Info_weburl]' WHERE id='$webdb[module_id]'");
	}

	module_write_config_cache($webdbs);
	refreshto($FROMURL,"�޸ĳɹ�");
}

?>