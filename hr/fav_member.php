<?php
require(dirname(__FILE__)."/global.php");

if(!$lfjid){
	showerr('请先登录!');
}elseif($uid==$lfjuid){
	showerr('你不能收录自己!');
}
if($db->get_one("SELECT * FROM {$_pre}collection WHERE memberuid='$uid' AND companyuid='$lfjuid'")){
	showerr('你已经收录过了!');
}

$db->query("INSERT INTO {$_pre}collection SET memberuid='$uid',companyuid='$lfjuid',posttime='$timestamp'");

refreshto($FROMURL,'收录成功',3);
?>