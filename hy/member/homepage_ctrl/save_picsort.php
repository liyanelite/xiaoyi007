<?php
//����ͼ��

$name=filtrate($name);
$remarks=filtrate($remarks);
$orderlist=intval($orderlist);
if(strlen($name)<2 || strlen($name)>16)showerr("ͼ��ֻ������ֻ����1-8������");
if(strlen($remarks)>100)showerr("�������50����");

if($psid){ //����
	$db->query("update `{$_pre}picsort` set 
	`name`='$name',
	`remarks`='$remarks',
	`orderlist`='$orderlist'
	where psid='$psid' AND uid='$uid'");

}else{ //���

	$webdb[company_picsort_Max]=$webdb[company_picsort_Max]?$webdb[company_picsort_Max]:10;
	$mypicsortnum=$db->get_one("SELECT COUNT(*) AS num FROM {$_pre}picsort WHERE uid='$uid' ");
	if($mypicsortnum[num]>=$webdb[company_picsort_Max])	showerr("����ͼ�������Ѿ��������Ŀ{$webdb[company_picsort_Max]}");	

	$db->query("INSERT INTO `{$_pre}picsort` ( `psid` , `psup` , `name` , `remarks` , `uid` , `username` ,  `level` , `posttime` , `orderlist` ) 
	VALUES ('', '0', '$name', '$remarks', '$uid', '$lfjid',  '0', '$timestamp', '$orderlist');");
}

refreshto("?uid=$uid&atn=pic","����ɹ�");


?>