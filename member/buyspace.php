<?php
require("global.php");

if(!$lfjid){
	showerr("�㻹û��¼");
}

$lfjdb[money]=get_money($lfjuid);

$webdb[BuySpacesizeMoney]>0 || $webdb[BuySpacesizeMoney]=100;
if($action=='buy')
{
	if($spacesize<1){
		showerr("����Ŀռ���������С��1M");
	}
	if(!is_numeric($spacesize)){
		showerr("����Ŀռ�������������������M");
	}
	$spacesize=intval($spacesize);
	$totalmoney=$spacesize*$webdb[BuySpacesizeMoney];
	if( $lfjdb[money]<$totalmoney ){
		showerr("��Ļ��ֲ���$totalmoney");
	}
	$spacesize=$spacesize*1024*1024;
	$db->query("UPDATE {$pre}memberdata SET totalspace=totalspace+$spacesize WHERE uid='$lfjuid'");
	add_user($lfjuid,-$totalmoney,'����ռ佱��');
	refreshto("$FROMURL","��ϲ��,����ռ�ɹ�,���������� {$totalmoney} ������",10);
}

 
//��ʹ�ÿռ�
$lfjdb[usespace]=number_format($lfjdb[usespace]/(1024*1024),3);

//ϵͳ����ʹ�ÿռ�
$space_system=number_format($webdb[totalSpace],3);

//�û�������ʹ�ÿռ�
$space_group=number_format($groupdb[totalspace],3);

//�û�������еĿռ�
$space_user=number_format($lfjdb[totalspace]/(1024*1024),3);

//�û����¿ռ�
$lfjdb[totalspace]=number_format($webdb[totalSpace]+$groupdb[totalspace]+$lfjdb[totalspace]/(1024*1024)-$lfjdb[usespace],3);

require(dirname(__FILE__)."/"."head.php");
require(dirname(__FILE__)."/"."template/buyspace.htm");
require(dirname(__FILE__)."/"."foot.php");

?>