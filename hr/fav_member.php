<?php
require(dirname(__FILE__)."/global.php");

if(!$lfjid){
	showerr('���ȵ�¼!');
}elseif($uid==$lfjuid){
	showerr('�㲻����¼�Լ�!');
}
if($db->get_one("SELECT * FROM {$_pre}collection WHERE memberuid='$uid' AND companyuid='$lfjuid'")){
	showerr('���Ѿ���¼����!');
}

$db->query("INSERT INTO {$_pre}collection SET memberuid='$uid',companyuid='$lfjuid',posttime='$timestamp'");

refreshto($FROMURL,'��¼�ɹ�',3);
?>