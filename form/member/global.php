<?php
define('Memberpath',dirname(__FILE__).'/');
require(Memberpath."../global.php");

/**
*ǰ̨�Ƿ񿪷�
**/
if($webdb[module_close])
{
	$webdb[Info_closeWhy]=str_replace("\r\n","<br>",$webdb[Info_closeWhy]);
	showerr("��ϵͳ��ʱ�ر�:$webdb[Info_closeWhy]");
}

if(!$lfjid){
	showerr("�㻹û��¼");
}

?>