<?php
require(dirname(__FILE__)."/global.php");
require(dirname(__FILE__)."/../inc/homepage/global.php");
require_once(dirname(__FILE__)."/../bd_pics.php");

$atn=$atn?$atn:"info";

if(!$lfjuid){
	showerr("���ȵ�¼");
}elseif(!$uid){
	$uid=$lfjuid;
}

$linkdb=array("����Ԥ��"=>"$webdb[www_url]/home/?uid=$uid");
$link_blank=array("����Ԥ��"=>"_blank");




$companydb=$db->get_one("SELECT * FROM {$_pre}company WHERE uid='$uid' LIMIT 1");

$rs=$db->get_one("SELECT admin FROM {$pre}city WHERE fid='$companydb[city_id]'");
$detail=explode(',',$rs[admin]);
if($lfjid && in_array($lfjid,$detail)){
	$web_admin=1;
}

if(!$companydb[if_homepage]){
	showerr("����û��������ҵ����,<a href='$Murl/member/post_company.php?action=apply'>�������������ҵ����</a>��ӵ���Լ�������");
}elseif($companydb[uid]!=$lfjuid&&!$web_admin){
	showerr("��ûȨ��!");
}
$companydb[logo]=tempdir($companydb[picurl]);

//��ҳ�����ļ�
$homepage=$db->get_one("SELECT * FROM {$_pre}home WHERE uid='$uid' LIMIT 1");

if(!$homepage){
	caretehomepage($companydb,false);
}

if($atn&&eregi("^([_a-z0-9]+)$",$atn)&&is_file(dirname(__FILE__)."/homepage_ctrl/$atn.php")){
	require_once(dirname(__FILE__)."/homepage_ctrl/$atn.php");
}

require(dirname(__FILE__)."/"."head.php");
require(dirname(__FILE__)."/"."template/homepage_ctrl.htm");
require(dirname(__FILE__)."/"."foot.php");



?>