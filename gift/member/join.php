<?php
require_once("global.php");

if(!$lfjuid){
	showerr('�㻹û�е�¼!!');
}

$fidDB=$db->get_one("SELECT A.* FROM {$_pre}sort A WHERE A.fid='$fid'");

if(!$fidDB){
	showerr("FID����!");
}


$infodb=$db->get_one("SELECT B.*,A.* FROM `{$_pre}content` A LEFT JOIN `{$_pre}content_$fidDB[mid]` B ON A.id=B.id WHERE A.id='$cid'");


if(!$infodb){
	showerr("���ݲ�����");
}elseif($infodb[fid]!=$fid){
	showerr("FID����!!!");
}

if(!$job&&!$action&&$rs=$db->get_one("SELECT * FROM {$_pre}join WHERE cid='$cid' AND uid='$lfjuid'") ){
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?cid=$cid&fid=$fid&id=$rs[id]&job=edit'>";
	exit;
}

$mid=2;

/**
*ģ����������ļ�
**/
$field_db = $module_DB[$mid][field];


/**�����ύ��������**/
if($action=="postnew")
{
	$lfjdb[money]=get_money($lfjdb[uid]);
	if(!$web_admin&&$lfjdb[money]<$infodb[money]){
		showerr("���{$webdb[MoneyName]}����$infodb[money]");
	}

	$postdb[yz]=0;

	//�Զ����ֶεĺϷ���������ݴ���
	$Module_db->checkpost($field_db,$postdb,'');


	/*������Ϣ���������*/
	$db->query("INSERT INTO `{$_pre}join` ( `mid` , `cid` ,  `fid` ,  `posttime` ,  `uid` , `username` , `yz` , `ip` ) 
	VALUES (
	'$mid','$cid', '$fid','$timestamp','$lfjdb[uid]','$lfjdb[username]','$postdb[yz]','$onlineip')");

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

	$db->query("INSERT INTO `{$_pre}content_$mid` SET $sql");
	
	$db->query("UPDATE {$_pre}content SET totaluser=totaluser+1 WHERE id='$cid'");
	$db->query("UPDATE `{$_pre}content_1` SET `giftnum`=`giftnum`-1 WHERE id='$cid'");

	refreshto("apply.php","�ύ�ɹ�,��ȴ����!",8);
}

/*ɾ������,ֱ��ɾ��,������*/
elseif($action=="del")
{
	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}join` A LEFT JOIN `{$_pre}content_$mid` B ON A.id=B.id WHERE A.id='$id'");

	if($rsdb[uid]!=$lfjuid&&$infodb[uid]!=$lfjuid&&!$web_admin)
	{
		showerr("����Ȩ����");
	}
	$db->query("DELETE FROM `{$_pre}content_$mid` WHERE id='$id' ");
	$db->query("DELETE FROM `{$_pre}join` WHERE id='$id' ");
	$db->query("UPDATE {$_pre}content SET totaluser=totaluser-1 WHERE id='$cid'");
	refreshto($FROMURL,"ɾ���ɹ�");
}

/*�༭����*/
elseif($job=="edit")
{
	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}join` A LEFT JOIN `{$_pre}content_$mid` B ON A.id=B.id WHERE A.id='$id'");

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
	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}join` A LEFT JOIN `{$_pre}content_$mid` B ON A.id=B.id WHERE A.id='$id' LIMIT 1");

	if($rsdb[uid]!=$lfjuid&&!$web_admin)
	{
		showerr("����Ȩ�޸�");
	}

	//�Զ����ֶεĺϷ���������ݴ���
	$Module_db->checkpost($field_db,$postdb,$rsdb);


	/*��������Ϣ������*/
	//$db->query("UPDATE `{$_pre}join` SET title='$postdb[title]' WHERE id='$id'");


	/*����жϸ���Ϣ��Ҫ������Щ�ֶε�����*/
	unset($sqldb);
	foreach( $field_db AS $key=>$value){
		$sqldb[]="`$key`='{$postdb[$key]}'";
	}	
	$sql=implode(",",$sqldb);

	/*���¸���Ϣ��*/
	$db->query("UPDATE `{$_pre}content_$mid` SET $sql WHERE id='$id'");
	
	refreshto("apply.php","�޸ĳɹ�");
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