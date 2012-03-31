<?php
require("global.php");
@include_once(ROOT_PATH."data/all_area.php");
if(!$uid&&!$username)
{
	$uid=$lfjuid;
}
if($uid)
{
	$rsdb = $userDB->get_info($uid);
}
elseif($username)
{
	$rsdb = $userDB->get_info($username,'name');
}

if(!$rsdb)
{
	showerr("�û�������");
}

$db->query("UPDATE {$pre}memberdata SET hits=hits+1,lastview='$timestamp' WHERE uid='$uid'");

$rsdb[money]=get_money($rsdb[uid]);


$group_db=$db->get_one("SELECT totalspace,grouptitle FROM {$pre}group WHERE gid='$rsdb[groupid]' ");

//��ʹ�ÿռ�
$rsdb[usespace]=number_format($rsdb[usespace]/(1024*1024),3);

//ϵͳ����ʹ�ÿռ�
$space_system=number_format($webdb[totalSpace],3);

//�û�������ʹ�ÿռ�
$space_group=number_format($group_db[totalspace],3);

//�û�������еĿռ�
$space_user=number_format($rsdb[totalspace]/(1024*1024),3);

//�û����¿ռ�
$rsdb[totalspace]=number_format($webdb[totalSpace]+$group_db[totalspace]+$rsdb[totalspace]/(1024*1024)-$rsdb[usespace],3);

if($rsdb[sex]==1)
{
	$rsdb[sex]='��';
}
elseif($rsdb[sex]==2)
{
	$rsdb[sex]='Ů';
}
else
{
	$rsdb[sex]='����';
}

$rsdb[lastvist]=date("Y-m-d H:i:s",$rsdb[lastvist]);
$rsdb[regdate]=date("Y-m-d H:i:s",$rsdb[regdate]);
$rsdb[introduce]=str_replace("\n","<br>",$rsdb[introduce]);

if($lfjuid!=$rsdb[uid]&&!$web_admin)
{
	$rsdb[regip]=$rsdb[address]=$rsdb[postalcode]=$rsdb[telephone]=$rsdb[mobphone]=$rsdb[idcard]=$rsdb[truename]="����";
}
$rsdb[icon]=tempdir($rsdb[icon]);

$rsdb[lastip]=ipfrom($rsdb[lastip]);

$rsdb[postalcode]==0&&$rsdb[postalcode]='';

$rsdb[lastview]=$rsdb[lastview]?date("Y-m-d H:i",$rsdb[lastview]):'δ֪';
$rsdb[hits] || $rsdb[hits]='δ֪';

//�ҵ���������
$myarticleDB='';
$query = $db->query("SELECT * FROM {$pre}news_content WHERE uid='$uid' ORDER BY id DESC LIMIT 10");
while($rs = $db->fetch_array($query)){
	$myarticleDB[]=$rs;
}

//ϵͳ�Ƽ�����
$myotherDB=$comDB='';
$query = $db->query("SELECT * FROM {$pre}news_content ORDER BY levels DESC,levelstime DESC,id DESC LIMIT 11");
while($rs = $db->fetch_array($query)){
	if(!$comDB){	//���յ���
		$comDB=$rs;
	}else{
		$myotherDB[]=$rs;
	}	
}

//�ҵ�ͼƬ����
$myphotoDB='';
$query = $db->query("SELECT * FROM {$pre}news_content WHERE ispic=1 AND uid='$uid' ORDER BY id DESC LIMIT 5");
while($rs = $db->fetch_array($query)){
	$rs[picurl]=tempdir($rs[picurl]);
	$myphotoDB[]=$rs;
}

//��̳����
$mybbsDB='';
if( ereg("^pwbbs",$webdb[passport_type]) ){
	$query = $db->query("SELECT * FROM {$TB_pre}threads WHERE authorid='$uid' ORDER BY tid DESC LIMIT 10");
	while($rs = $db->fetch_array($query)){
		$mybbsDB[]=$rs;
	}
}

//���˲���������
$rsdb[truename]=replace_bad_word($rsdb[truename]);
$rsdb[introduce]=replace_bad_word($rsdb[introduce]);
$rsdb[address]=replace_bad_word($rsdb[address]);

require(get_member_tpl('homepage'));

$content=ob_get_contents();
ob_end_clean();
ob_start();
if($webdb[www_url]=='/.'){
	$content=str_replace('/./','/',$content);
}
echo $content;
?>