<?php
require("global.php");

if(!$lfjuid){
	showerr("������ǰ̨��¼");
}

if($action=='get')
{
	if(!$atc_passwd){
		showerr("�������ֵ������");
	}
	$rsdb=$db->get_one("SELECT * FROM {$pre}moneycard WHERE passwd='$atc_passwd'");
	if(!$rsdb){
		showerr("��ֵ�����벻��");
	}elseif($rsdb[ifsell]){
		showerr("����ֵ����ʹ�ù�,�벻Ҫ�ظ���ֵ");
	}
	$db->query("UPDATE {$pre}moneycard SET ifsell='1',uid='$lfjuid',username='$lfjid',posttime='$timestamp' WHERE id='$rsdb[id]'");

	add_user($lfjuid,$rsdb[moneycard],'��ֵ��(�㿨)��ֵ');

	refreshto("$webdb[www_url]/","��ϲ��,��ֵ�ɹ�",2);
}

$lfjdb[money]=get_money($lfjdb[uid]);

require(ROOT_PATH."inc/head.php");
require(html("moneycard"));
require(ROOT_PATH."inc/foot.php");

?>