<?php
require("global.php");

$mid=2;

/**
*��ȡ��Ϣ���ĵ�����
**/
$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}join` A LEFT JOIN `{$_pre}content_$mid` B ON A.id=B.id WHERE A.id='$id'");


if(!$rsdb){
	showerr("���ݲ�����");
}elseif(!$web_admin&&$rsdb[uid]!=$lfjuid&&$rsdb[cuid]!=$lfjuid){
	showerr("����Ȩ�鿴");
}



$rsdb[shop]=$db->get_one("SELECT * FROM {$_pre}content WHERE id='$rsdb[cid]'");


$field_db = $module_DB[$mid]['field'];

/**
*����Ϣ�����ֶεĴ���
**/
$Module_db->hidefield=true;
$Module_db->classidShowAll=true;
$Module_db->showfield($field_db,$rsdb,'show');


$rsdb[posttime]=date("Y-m-d H:i:s",$rsdb[posttime]);

$rsdb[ifpay]=$rsdb[ifpay]?'��֧��':'δ֧��';
$rsdb[ifsend]=$rsdb[ifsend]?'�ѷ���':'δ����';

if($rsdb[banktype]=='alipay'){
	$rsdb[banktype]='֧����';
}elseif($rsdb[banktype]=='tenpay'){
	$rsdb[banktype]='�Ƹ�ͨ';
}elseif($rsdb[banktype]=='99pay'){
	$rsdb[banktype]='��Ǯ';
}elseif($rsdb[banktype]=='yeepay'){
	$rsdb[banktype]='�ױ�֧��';
}

require(ROOT_PATH."member/head.php");
require(getTpl("bencandy_$mid"));
require(ROOT_PATH."member/foot.php");

?>