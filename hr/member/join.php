<?php
require_once("global.php");

if(!$lfjid)
{
	showerr("�㻹û�е�¼");
}

if(!$action&&$lfjuid){
	if($rs=$db->get_one("SELECT * FROM {$_pre}person WHERE uid='$lfjuid'")){
		$job = 'edit';
		$id = $rs[id];
	}else{
		$job = 'postnew';
	}
}

$mid=2;

/**
*ģ����������ļ�
**/
$field_db = $module_DB[$mid][field];


if($action=="yz"){
	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}person` A LEFT JOIN `{$_pre}content_$mid` B ON A.id=B.id WHERE A.id='$id'");

	if(!$web_admin)
	{
		showerr("����Ȩ����!!");
	}
	$yz=$rsdb[yz]?0:1;
	$db->query("UPDATE `{$_pre}person` SET yz='$yz' WHERE id='$id'");
	refreshto("$FROMURL","",0);

}elseif($action=="postnew"){

	$postdb[yz]=0;

	//�Զ����ֶεĺϷ���������ݴ���
	$Module_db->checkpost($field_db,$postdb,'');


	/*������Ϣ���������*/
	$db->query("INSERT INTO `{$_pre}person` ( `mid` , `posttime` ,  `uid` , `username` , `yz` , `ip` , `city_id`) 
	VALUES (
	'$mid','$timestamp','$lfjdb[uid]','$lfjdb[username]','$postdb[yz]','$onlineip','$city_id')");

	$id = $db->insert_id();

	unset($sqldb);
	$sqldb[]="id='$id'";
	$sqldb[]="uid='$lfjuid'";

	
	/*����жϸ���Ϣ��Ҫ������Щ�ֶε�����*/
	foreach( $field_db AS $key=>$value){
		isset($postdb[$key]) && $sqldb[]="`{$key}`='{$postdb[$key]}'";
	}

	$sql=implode(",",$sqldb);

	$db->query("INSERT INTO `{$_pre}content_$mid` SET $sql");
	
	refreshto('?',"<A HREF=\"?\">�޸�һ��</A> <A HREF=\"../joinshow.php?id=$id\" target='_blank'>�鿴Ч��</A>",300);
}

/*ɾ������,ֱ��ɾ��,������*/
elseif($action=="del")
{
	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}person` A LEFT JOIN `{$_pre}content_$mid` B ON A.id=B.id WHERE A.id='$id'");

	if($rsdb[uid]!=$lfjuid&&!$web_admin)
	{
		showerr("����Ȩ����");
	}
	$db->query("DELETE FROM `{$_pre}content_$mid` WHERE id='$id' ");
	$db->query("DELETE FROM `{$_pre}person` WHERE id='$id' ");
	refreshto("bencandy.php?fid=$fid&id=$cid","ɾ���ɹ�");
}

/*�༭����*/
elseif($job=="edit")
{
	$SQL = $id ? " A.id='$id' " : " A.uid='$lfjuid' ";
	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}person` A LEFT JOIN `{$_pre}content_$mid` B ON A.id=B.id WHERE $SQL");

	if($rsdb[uid]!=$lfjuid&&!$web_admin)
	{
		showerr("����Ȩ�޸�");
	}

	/*��Ĭ�ϱ���������*/
	$Module_db->formGetVale($field_db,$rsdb);

	$atc="edit";	

	require(ROOT_PATH."member/head.php");
	require(getTpl("post_$mid"));
	require(ROOT_PATH."member/foot.php");
}

/*�����ύ���������޸�*/
elseif($action=="edit")
{
	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}person` A LEFT JOIN `{$_pre}content_$mid` B ON A.id=B.id WHERE A.id='$id' LIMIT 1");

	if($rsdb[uid]!=$lfjuid&&!$web_admin)
	{
		showerr("����Ȩ�޸�");
	}

	//�Զ����ֶεĺϷ���������ݴ���
	$Module_db->checkpost($field_db,$postdb,$rsdb);


	/*����жϸ���Ϣ��Ҫ������Щ�ֶε�����*/
	unset($sqldb);
	foreach( $field_db AS $key=>$value){
		$sqldb[]="`$key`='{$postdb[$key]}'";
	}	
	$sql=implode(",",$sqldb);

	/*���¸���Ϣ��*/
	
	$db->query("UPDATE `{$_pre}person` SET city_id='$city_id',posttime='$timestamp' WHERE id='$id'");
	$db->query("UPDATE `{$_pre}content_$mid` SET $sql WHERE id='$id'");
	
	refreshto($FROMURL,"<A HREF=\"$FROMURL\">�����޸�</A> <A HREF=\"../joinshow.php?id=$id\" target='_blank'>�鿴Ч��</A>",300);
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
	require(getTpl("post_$mid"));
	require(ROOT_PATH."member/foot.php");
}

?>