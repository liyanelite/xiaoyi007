<?php
require("global.php");

if(!$lfjid){
	showerr("�㻹û��¼");
}

$lfjdb[money]=get_money($lfjuid);

if($job=="buy"||$action=='buy'){
	$rsdb=$db->get_one("SELECT * FROM {$pre}group WHERE gid='$gid'");
	if(!$rsdb){
		showerr("��������");
	}	
}

if($action=='buy')
{
	if($rsdb[gptype]){
		showerr("ϵͳ����,�㲻�ܹ���!");
	}
	if($lfjdb[groupid]==3||$lfjdb[groupid]==4){
		showerr("���ǹ���Ա,�����Թ������͵ļ���");
	}
	if($lfjdb[money]<$rsdb[levelnum]){
		showerr("��Ļ��ֲ���$rsdb[levelnum]");
	}
	$lfjdb[C][endtime]=$timestamp+$webdb[groupTime]*3600*24;
	$config=addslashes(serialize($lfjdb[C]));
	$db->query("UPDATE {$pre}memberdata SET config='$config',groupid='$gid' WHERE uid='$lfjuid'");
	add_user($lfjuid,-$rsdb[levelnum],'�����Ա����۷�');
	refreshto("$FROMURL","��ϲ��,�����ɹ�",1);
}

 
$query = $db->query("SELECT * FROM {$pre}group WHERE gptype=0");
while($rs = $db->fetch_array($query)){
	$rs[g]=@include_once(ROOT_PATH."data/group/$rs[gid].php");
	$listdb[]=$rs;
}

if($lfjdb[C][endtime]&&$lfjdb[groupid]!=8){
	$lfjdb[C][endtime]=date("Y-m-d",$lfjdb[C][endtime]);
	$lfjdb[C][endtime]="��ֹ����Ϊ:{$lfjdb[C][endtime]}��";
}else{
	$lfjdb[C][endtime]='';
}

require(dirname(__FILE__)."/"."head.php");
require(dirname(__FILE__)."/"."template/buygroup.htm");
require(dirname(__FILE__)."/"."foot.php");

?>