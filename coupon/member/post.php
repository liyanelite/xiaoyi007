<?php
require_once(dirname(__FILE__)."/global.php");

/**
*��ȡ��Ŀ�����ļ�
**/
$fidDB=$db->get_one("SELECT * FROM {$_pre}sort WHERE fid='$fid'");

if(!$fidDB){
	showerr('��Ŀ�����ڣ�');
}

$rs=$db->get_one("SELECT admin FROM {$pre}city WHERE fid='$city_id'");
$detail=explode(',',$rs[admin]);
if($lfjid && in_array($lfjid,$detail)){
	$web_admin=1;
}

/**
*ģ�Ͳ��������ļ�
**/
$field_db = $module_DB[$fidDB[mid]][field];

if(!$lfjuid){
	showerr('�㻹û�е�¼!');
}elseif($fidDB[type]){
	showerr("�����,������������");
}


if($action=="postnew"||$action=="edit"){
	$postdb['title']=filtrate($postdb['title']);
}

/**�����ύ���·�������**/
if($action=="postnew")
{
	/*��֤�봦��*/
	if(!$web_admin){
		if(!check_imgnum($yzimg)){		
			showerr("��֤�벻����,����ʧ��");
		}
	}

	if(!$web_admin){
		if($groupdb[post_coupon_num]<1){
			showerr('�������û��鲻������������Ϣ,�������û����');
		}
		$_rs=$db->get_one("SELECT COUNT(*) AS NUM FROM `{$_pre}content` WHERE uid='$lfjuid'");
		if($_rs[NUM]>$groupdb[post_coupon_num]){
			showerr("�������û��鷢���Ĵ�����Ϣ���ܳ���{$groupdb[post_coupon_num]}��,�������û����");
		}
	}

	if(!$postdb[title]){
		showerr("���ⲻ��Ϊ��");
	}elseif(strlen($postdb[title])>80){
		showerr("���ⲻ�ܴ���40������.");
	}
	if(eregi("[a-z0-9]{15,}",$postdb[title])){
		showerr("������д�ñ���!");
	}

	
	//�Զ����ֶν���У������Ƿ�Ϸ�
	$Module_db->checkpost($field_db,$postdb,'');

	if(is_file(ROOT_PATH."$webdb[updir]/$postdb[picurl]")){

		gdpic(ROOT_PATH."$webdb[updir]/$postdb[picurl]",ROOT_PATH."$webdb[updir]/{$postdb[picurl]}.jpg",300,225,array('fix'=>1));
		if(is_file(ROOT_PATH."$webdb[updir]/{$postdb[picurl]}.jpg")){
			$postdb[picurl].=".jpg";
		}
	}


	$postdb[ispic]=$postdb[picurl]?1:0;

	//�Ƿ��Զ�ͨ�����
	$web_admin && $groupdb[shop_postauto_yz]=1;
	$postdb[yz] = $groupdb[shop_postauto_yz];

	/*��������������*/
	$db->query("INSERT INTO `{$_pre}content` (`title` , `mid` , `fid` , `fname` , `posttime` , `list` , `uid` , `username` ,  `picurl` , `ispic` , `yz` ,  `keywords` , `ip` ,  `money` , `city_id`) VALUES  ('$postdb[title]','$fidDB[mid]','$fid','$fidDB[name]','$timestamp','$timestamp','$lfjdb[uid]','$lfjdb[username]','$postdb[picurl]','$postdb[ispic]','$postdb[yz]','$postdb[keywords]','$onlineip','$postdb[money]','$city_id')");

	$id = $db->insert_id();

	unset($sqldb);
	$sqldb[]="id='$id'";
	$sqldb[]="fid='$fid'";
	$sqldb[]="uid='$lfjuid'";

	/*����жϸ���Ϣ��Ҫ������Щ�ֶε�����*/
	foreach( $field_db AS $key=>$value){
		isset($postdb[$key]) && $sqldb[]="`{$key}`='{$postdb[$key]}'";
	}

	$sql=implode(",",$sqldb);

	/*������Ϣ���������*/
	$db->query("INSERT INTO `{$_pre}content_$fidDB[mid]` SET $sql");

	refreshto("list.php?job=list","<a href='list.php?job=list'>�����б�</a> <a target='_blank' href='../bencandy.php?city_id=$city_id&fid=$fid&id=$id'>�鿴Ч��</a>",600);

}

/*ɾ������,ֱ��ɾ��,������*/
elseif($action=="del")
{

	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}content` A LEFT JOIN `{$_pre}content_$fidDB[mid]` B ON A.id=B.id WHERE A.id='$id'");

	if($rsdb[fid]!=$fidDB[fid])
	{
		showerr("��Ŀ������");
	}
	if($rsdb[uid]!=$lfjuid&&!$web_admin)
	{
		showerr("��ûȨ��!");
	}

	del_info($id,$rsdb);

	refreshto($FROMURL,"ɾ���ɹ�");
}

/*�༭����*/
elseif($job=="edit")
{

	$rsdb=$db->get_one("SELECT B.*,A.* FROM `{$_pre}content` A LEFT JOIN `{$_pre}content_$fidDB[mid]` B ON A.id=B.id WHERE A.id='$id'");

	if($rsdb[uid]!=$lfjuid&&!$web_admin){	
		showerr('��ûȨ��!');
	}
	
	/*��Ĭ�ϱ���������*/
	$Module_db->formGetVale($field_db,$rsdb);

	$atc="edit";


	require(ROOT_PATH."member/head.php");
	require(getTpl("post_$fidDB[mid]"));
	require(ROOT_PATH."member/foot.php");
}

/*�����ύ���������޸�*/
elseif($action=="edit")
{
	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}content` A LEFT JOIN `{$_pre}content_$fidDB[mid]` B ON A.id=B.id WHERE A.id='$id'");

	if($rsdb[uid]!=$lfjuid&&!$web_admin){
		showerr("����Ȩ�޸�");
	}

	if(!$postdb[title]){	
		showerr("���ⲻ��Ϊ��");
	}

	
	//�Զ����ֶν���У������Ƿ�Ϸ�
	$Module_db->checkpost($field_db,$postdb,$rsdb);

	if(is_file(ROOT_PATH."$webdb[updir]/$postdb[picurl]")&&substr($postdb[picurl],-8,1)!='.'){

		gdpic(ROOT_PATH."$webdb[updir]/$postdb[picurl]",ROOT_PATH."$webdb[updir]/{$postdb[picurl]}.jpg",300,225,array('fix'=>1));
		if(is_file(ROOT_PATH."$webdb[updir]/{$postdb[picurl]}.jpg")){
			$postdb[picurl].=".jpg";
		}
	}

	/*�ж��Ƿ�ΪͼƬ����*/
	$postdb[ispic]=$postdb[picurl]?1:0;


	/*��������Ϣ������*/
	$db->query("UPDATE `{$_pre}content` SET title='$postdb[title]',keywords='$postdb[keywords]',picurl='$postdb[picurl]',ispic='$postdb[ispic]',money='$postdb[money]' WHERE id='$id'");



	/*����жϸ���Ϣ��Ҫ������Щ�ֶε�����*/
	unset($sqldb);
	foreach( $field_db AS $key=>$value){
		$sqldb[]="`$key`='{$postdb[$key]}'";
	}	
	$sql=implode(",",$sqldb);

	/*���¸���Ϣ��*/
	$db->query("UPDATE `{$_pre}content_$fidDB[mid]` SET $sql WHERE id='$id'");


	refreshto("list.php?job=list","<a href='list.php?job=list'>�����б�</a> <a target='_blank' href='../bencandy.php?city_id=$rsdb[city_id]&fid=$fid&id=$id'>�鿴Ч��</a>",600);

}
else
{
	/*ģ������ʱ,��Щ�ֶ���Ĭ��ֵ*/
	foreach( $field_db AS $key=>$rs){	
		if($rs[form_value]){		
			$rsdb[$key]=$rs[form_value];
		}
	}

	/*��Ĭ�ϱ���������*/
	$Module_db->formGetVale($field_db,$rsdb);

	$atc="postnew";

	require(ROOT_PATH."member/head.php");
	require(getTpl("post_$fidDB[mid]"));
	require(ROOT_PATH."member/foot.php");

}

?>