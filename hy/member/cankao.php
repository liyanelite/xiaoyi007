<?php
require(dirname(__FILE__)."/"."global.php");

if(!$uid){
	$uid=$lfjuid;
}
if(!$web_admin&&$uid!=$lfjuid){
	showerr('��ûȨ��!');
}

$companydb=$db->get_one("SELECT * FROM {$_pre}company WHERE uid='$uid' LIMIT 1");

if(!$companydb[if_homepage]){
	showerr("����û��������ҵ����,<a href='$Murl/member/post_company.php?action=apply'>�������������ҵ����</a>��ӵ���Լ�������");
}


//$webdb[vip_par_payfor]=$webdb[vip_par_payfor]?$webdb[vip_par_payfor]:50;
//$webdb[vip_min_long]=$webdb[vip_min_long]?$webdb[vip_min_long]:1;


if(!$action){
	$page=intval($page);
	$page=$page>1?$page:1;
	$rows=10;
	$min=($page-1)*$rows;
	$query=$db->query("SELECT * FROM {$_pre}friendlink WHERE uid='$uid' LIMIT $min,$rows");
	$showpage=getpage("{$_pre}friendlink","WHERE uid='$uid'","?",$rows);
	while($rs=$db->fetch_array($query)){

		$rs[yz]=(!$rs[yz])?"δ���":"<font color=red>�����</font>";
		$listdb[]=$rs;
	}

}elseif($action=='add'){
	if($ck_id){
		$rsdb=$db->get_one("SELECT * FROM {$_pre}friendlink WHERE ck_id='$ck_id' LIMIT 1");
	}

}elseif($action=='save_add'){	

	if(!$title || strlen($title)>40) showerr("���ⲻ��Ϊ�գ���ֻ����40���ַ�");
	if(!$url || strtolower(substr($url,0,4)!='http')) showerr("��ַ����Ϊ�գ��ұ�����http��ͷ");
	if(strlen($description)>400)showerr("�������400���ַ�");

	$title = filtrate($title);
	$url = filtrate($url);
	$description = filtrate($description);

	if($ck_id){
		$db->query("UPDATE `{$_pre}friendlink` SET
		title='$title',
		url='$url',
		description='$description',
		yz=1
		WHERE ck_id='$ck_id';");
	}else{
		$db->query("INSERT INTO `{$_pre}friendlink` ( `ck_id` , `uid` , `username` ,  `companyName` , `title` , `url` , `description` , `yz` ) VALUES ('', '$lfjuid', '$lfjid', '$companydb[title]', '$title', '$url', '$description', '1')");
	}
	refreshto("?","����ɹ�",1);

}elseif($action=='del'){	
	
	if($ck_id){
		$db->query("DELETE FROM {$_pre}friendlink WHERE ck_id='$ck_id' AND `uid`='$uid'");
	}
	refreshto("?","�����ɹ�",1);
}

require(ROOT_PATH."member/head.php");
require(dirname(__FILE__)."/"."template/cankao.htm");
require(ROOT_PATH."member/foot.php");

?>