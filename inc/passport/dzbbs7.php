<?php
$TB_pre = $webdb[passport_pre] ? $webdb[passport_pre] : "cdb_";
$TB_path = $webdb[passport_path];
$TB_url = $webdb[passport_url];

$_DCACHE[settings][attachurl]='attachments';	//论坛附件目录
$TB[table] = "{$TB_pre}members";
$TB[uid] = "uid";
$TB[username] = "username";
$TB[password] = "password";

@include(ROOT_PATH.'data/uc_config.php');
@include(ROOT_PATH.'do/uc_client/client.php');

if(UC_DBHOST!=$dbhost||UC_DBUSER!=$dbuser||UC_DBPW!=$dbpw){
	$db_uc = new MYSQL_DB;
	$db_uc->connect(UC_DBHOST, UC_DBUSER, UC_DBPW, UC_DBNAME, $pconnect = '',1);
}else{
	$db_uc =& $db;
}


/**
*取得用户数据
**/
function PassportUserdb(){
	global $userDB;
	$detail = $userDB->login_info();
	return $detail;
}
?>