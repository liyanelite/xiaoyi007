<?php
require(dirname(__FILE__)."/"."global.php");

if(!$uid){
	$uid=$lfjuid;
}
if(!$web_admin&&$uid!=$lfjuid){
	showerr('��ûȨ��!');
}

$rsdb=$db->get_one("SELECT * FROM {$_pre}company WHERE uid='$uid'");
if(!$rsdb[if_homepage]){
	showerr("����û��������ҵ����,<a href='$Murl/member/post_company.php?action=apply'>�������������ҵ����</a>��ӵ���Լ�������");
}



if($action=='save'){
	
	if(!$web_admin&&$rsdb[renzheng]){
		showerr('��֤֮��,���������޸�');

	}
	foreach($postdb AS $key=>$value){
		$postdb[$key] = filtrate($value);
	}
	
	$db->query("UPDATE {$_pre}company SET permit_pic='$postdb[permit_pic]',guo_tax_pic='$postdb[guo_tax_pic]',di_tax_pic='$postdb[di_tax_pic]',organization_pic='$postdb[organization_pic]',idcard_pic='$postdb[idcard_pic]' WHERE uid='$uid'");
	refreshto($FROMURL,"�ύ�ɹ�,��ȴ�����Ա���,��δ���ǰ�����ٽ����޸�!");
}


require(ROOT_PATH."member/head.php");
require(dirname(__FILE__)."/"."template/renzheng.htm");
require(ROOT_PATH."member/foot.php");

?>