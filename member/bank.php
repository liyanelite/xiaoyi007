<?php
require_once("global.php");

$rs=$db->get_one("SELECT * FROM `{$pre}purse` WHERE uid='$lfjuid'");

if($action=='set'){
	foreach( $postdb AS $key=>$value){
		$postdb[$key] = filtrate($value);
	}
	$string = addslashes( serialize($postdb) );
	if($rs){
		$db->query("UPDATE `{$pre}purse` SET config='$string' WHERE uid='$lfjuid'");
	}else{
		$db->query("INSERT INTO `{$pre}purse` SET config='$string',uid='$lfjuid'");
	}
	refreshto('?','ÉèÖÃ³É¹¦',1);
}


$conf=unserialize($rs[config]);

$alipay_service[$conf[alipay_service]] = ' selected ';

require(ROOT_PATH."member/head.php");
require(dirname(__FILE__)."/"."template/bank.htm");
require(ROOT_PATH."member/foot.php");
?>