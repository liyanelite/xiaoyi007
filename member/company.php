<?php
require(dirname(__FILE__)."/"."global.php");

//��װ�е��̵����
if(is_table("{$pre}hy_company")){
	if(!$db->get_one("SELECT * FROM `{$pre}hy_company` WHERE uid='$lfjuid'")){
		echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=$webdb[www_url]/hy/member/post_company.php'>";
		exit;
	}
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=$webdb[www_url]/hy/member/homepage_ctrl.php?atn=info'>";
	exit;
}else{
	showerr('��û�а�װ��ҳģ��');
}

?>