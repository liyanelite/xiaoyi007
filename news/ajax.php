<?php
require(dirname(__FILE__)."/"."global.php");
header('Content-Type: text/html; charset=gb2312');

if(!$lfjid)
{
	die("<A HREF='$webdb[www_url]/do/login.php' onclick=\"clickEdit.cancel('clickEdit_$TagId')\">���ȵ�¼</A>");
}

if( eregi("^([a-zA-Z0-0_]+)$",$inc) )
{
	require(dirname(__FILE__)."/"."inc/ajax/$inc.php");
}

?>