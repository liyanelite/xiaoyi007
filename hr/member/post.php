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
	$postdb['keywords']=filtrate($postdb['keywords']);
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

	if(!$postdb[title]){
		showerr("ְλ���Ʋ���Ϊ��");
	}elseif(strlen($postdb[title])>80){
		showerr("ְλ���Ʋ��ܴ���40������.");
	}
	if(eregi("[a-z0-9]{15,}",$postdb[title])){
		showerr("������д��ְλ����!");
	}
	if(!$postdb[nums]){
		showerr("��Ƹ��������Ϊ��");
	}

	
	//�Զ����ֶν���У������Ƿ�Ϸ�
	$Module_db->checkpost($field_db,$postdb,'');


	$postdb[ispic]=$postdb[picurl]?1:0;

	if(!$web_admin){
		if($groupdb[post_hr_num]<1){
			showerr('�������û��鲻��������Ƹ��Ϣ,�������û����');
		}
		$_rs=$db->get_one("SELECT COUNT(*) AS NUM FROM `{$_pre}content` WHERE uid='$lfjuid'");
		if($_rs[NUM]>$groupdb[post_hr_num]){
			showerr('�������û���ÿ�췢������Ƹ��Ϣ���ܳ���{$groupdb[post_hr_num]}��,�������û����');
		}
	}

	$postdb[yz]=1;

	/*��������������*/
	$db->query("INSERT INTO `{$_pre}content` (`title` , `mid` , `fid` , `fname` , `posttime` , `list` , `uid` , `username` ,  `city_id` , `yz` ,  `keywords` , `ip`  ) VALUES  ('$postdb[title]','$fidDB[mid]','$fid','$fidDB[name]','$timestamp','$timestamp','$lfjdb[uid]','$lfjdb[username]','$city_id','$postdb[yz]','$postdb[keywords]','$onlineip')");

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

	refreshto($FROMURL,"<a href='$FROMURL'>��������</a> <a href='../bencandy.php?fid=$fid&id=$id' target='_blank'>�鿴Ч��</a>",600);

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
	require(getTpl("post_$fidDB[mid]",$FidTpl['post']));
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


	/*��������Ϣ������*/
	$db->query("UPDATE `{$_pre}content` SET title='$postdb[title]',keywords='$postdb[keywords]',city_id='$city_id' WHERE id='$id'");



	/*����жϸ���Ϣ��Ҫ������Щ�ֶε�����*/
	unset($sqldb);
	foreach( $field_db AS $key=>$value){
		$sqldb[]="`$key`='{$postdb[$key]}'";
	}	
	$sql=implode(",",$sqldb);

	/*���¸���Ϣ��*/
	$db->query("UPDATE `{$_pre}content_$fidDB[mid]` SET $sql WHERE id='$id'");


	refreshto($FROMURL,"<a href='$FROMURL'>�����޸�</a> <a href='../bencandy.php?fid=$fid&id=$id' target='_blank'>�鿴Ч��</a>",600);
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
	require(getTpl("post_$fidDB[mid]",$FidTpl['post']));
	require(ROOT_PATH."member/foot.php");
}




?>