<?php
!function_exists('html') && exit('ERR');

unset($menudb,$base_menudb);
//$base_menudb['�޸ĸ�������']['link']='userinfo.php?job=edit';

//$base_menudb['<font color=red>��������.���</font>']['link']='list.php';
//$base_menudb['<font color=red>��������.���</font>']['power']='2';

//$base_menudb['<font color=red>��������.����</font>']['link']='comment.php?job=work';
//$base_menudb['<font color=red>��������.����</font>']['power']='2';

$menudb['��������']['�޸ĸ�������']['link']='userinfo.php?job=edit';
$menudb['��������']['վ�ڶ���Ϣ']['link']='pm.php?job=list';
$menudb['��������']['���ֳ�ֵ']['link']='money.php?job=list';
$menudb['��������']['�����Ա�ȼ�']['link']='buygroup.php?job=list';
$menudb['��������']['��ҵ��Ϣ']['link']='company.php?job=edit';
$menudb['��������']['�����֤']['link']='yz.php?job=email';
$menudb['��������']['�������Ѽ�¼']['link']='moneylog.php?job=list';
$menudb['��������']['����ռ�']['link']='buyspace.php';
$menudb['��������']['�տ��ʺ�����']['link']='bank.php?job=set';



//����˵�
$query = $db->query("SELECT * FROM {$pre}hack ORDER BY list DESC");
while($rs = $db->fetch_array($query)){
	if(is_file(ROOT_PATH."hack/$rs[keywords]/member_menu.php")){
		$array = include(ROOT_PATH."hack/$rs[keywords]/member_menu.php");
		$menudb['�������']["$array[name]"]['link']=$array['url'];
	}
}

@include(dirname(__FILE__)."/cms_menu.php");

?>