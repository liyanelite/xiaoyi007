<?php
!function_exists('html') && exit('ERR');
if($job=="list"&&$Apower[member_list])
{
	if($T=="noyz"){
		$SQL=" WHERE D.yz=0 AND D.uid!=0 ";
	}elseif($T=="yz"){
		$SQL=" WHERE D.yz!=0 AND D.uid!=0 ";
	}elseif($T=="email"){
		$SQL=" WHERE D.email_yz=1 AND D.uid!=0 ";
	}elseif($T=="mob"){
		$SQL=" WHERE D.mob_yz=1 AND D.uid!=0 ";
	}elseif($T=="idcard"){
		$SQL=" WHERE D.idcard_yz=1 AND D.uid!=0 ";
	}elseif($T=="unidcard"){
		$SQL=" WHERE D.idcard_yz=-1 AND D.uid!=0 ";
	}else{
		$SQL=" WHERE 1 ";
	}

	if($groupid){
		$SQL.=" AND D.groupid=$groupid ";
	}
	
	if($keywords&&$type){
		if($type=='username'){
			$SQL.=" AND BINARY D.username LIKE '%$keywords%' ";
		}elseif($type=='uid'){
			$SQL.=" AND D.uid='$keywords' ";
		}
	}
	$select_group=select_group("groupid",$groupid,"index.php?lfj=member&job=list&T=$T");

	if(!$page){
		$page=1;
	}
	$rows=20;
	$min=($page-1)*$rows;
	$showpage=getpage("{$pre}memberdata D","$SQL","index.php?lfj=$lfj&job=$job&type=$type&T=$T&keywords=$keywords&groupid=$groupid",$rows);
	$query=$db->query("SELECT D.* FROM {$pre}memberdata D $SQL ORDER BY D.uid DESC LIMIT $min,$rows ");
	while($rs=$db->fetch_array($query)){
		$rs[lastvist]=$rs[lastvist]?date("Y-m-d H:i:s",$rs[lastvist]):'';
		$rs[regdate]=$rs[regdate]?date("Y-m-d H:i:s",$rs[regdate]):'';
		if(is_file(ROOT_PATH.'inc/ip.dat')){
			$rs[lastip_area] = ipfrom($rs[lastip]);
			$rs[regip_area] = ipfrom($rs[regip]);
		}
		if(!$rs[groupid]){
			$rs[alert]="alert('���û�������,��û������վ����,�㲻�ܽ����κβ���!');return false;";
		}else{
			$rs[alert]="";
		}

		if($rs[yz]){
			$rs[yz]="<A HREF='index.php?lfj=$lfj&action=yz&uid_db[0]=$rs[uid]&T=noyz' style='color:red;' onclick=\"$rs[alert]\" title='�Ѿ�ͨ�����,�������ȡ�����'><img src='../member/images/check_yes.gif' border='0'></A>";
		}elseif($rs[groupid]){
			$rs[yz]="<A HREF='index.php?lfj=$lfj&action=yz&uid_db[0]=$rs[uid]&T=yz' style='color:blue;' onclick=\"$rs[alert]\" title='��û��ͨ�����,�������ͨ�����'><img src='../member/images/check_no.gif' border='0'></A>";
		}else{
			$rs[yz]="δ����";
		}
		
		$listdb[]=$rs;
	}
	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/member/menu.htm");
	require(dirname(__FILE__)."/"."template/member/list.htm");
	require(dirname(__FILE__)."/"."foot.php");
}
elseif($job=="addmember"&&$Apower[member_addmember])
{
	$select_group=select_group("postdb[groupid]");
	

	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/member/menu.htm");
	require(dirname(__FILE__)."/"."template/member/addmember.htm");
	require(dirname(__FILE__)."/"."foot.php");
}
elseif($action=="addmember"&&$Apower[member_addmember])
{
	if($postdb[passwd]!=$postdb[passwd2]){
		showmsg("�����������벻��ȷ");
	}

	if(!$postdb[groupid]){
		showmsg("��ѡ��һ���û���");
	}elseif($postdb[groupid]=='2'){
		showmsg("�㲻��ѡ���ο���");
	}elseif($postdb[groupid]=='3'&&$userdb[groupid]!=3&&!$founder){
		showmsg("����Ȩ��ѡ�񳬼�����Ա�û���,������������û���");
	}elseif($postdb[groupid]=='4'&&$userdb[groupid]!=3&&$userdb[groupid]!=4&&!$founder){
		showmsg("����Ȩ��ѡ����û���,������������û���");
	}

	$array=array(
		'password' => $postdb[passwd],
		'username' => $postdb[username],
		'groupid' => $postdb[groupid],
		'email' => $postdb[email]
	);
	$uid=$userDB->register_user($array);
	if(!is_numeric($uid)){
		showmsg($uid);
	}	
	
	jump("�����ɹ�","index.php?lfj=member&job=list",3);
}
elseif($job=="editmember"&&$Apower[member_list])
{
	$rsdb=$userDB->get_allInfo($uid);
	
	$rsdb[money]=get_money($rsdb[uid]);
	$select_group=select_group("postdb[groupid]",$rsdb[groupid]);
	$select_group2=group_box("postdb[groups]",explode(",",$rsdb[groups]),1);

	$sexdb[intval($rsdb[sex])]=' checked ';

	$yzdb[intval($rsdb[yz])]=' checked ';

	$ConfigDB=unserialize($rsdb[config]);

	$rsdb[totalspace]=floor($rsdb[totalspace]/(1024*1024));

	$ConfigDB[begintime] && $ConfigDB[begintime]=date("Y-m-d H:i:s",$ConfigDB[begintime]);
	$ConfigDB[endtime]   && $ConfigDB[endtime]=date("Y-m-d H:i:s",$ConfigDB[endtime]);

	$email_yz[$rsdb[email_yz]]=' checked ';
	$mob_yz[$rsdb[mob_yz]]=' checked ';
	$idcard_yz[$rsdb[idcard_yz]]=' checked ';

	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/member/menu.htm");
	require(dirname(__FILE__)."/"."template/member/editmember.htm");
	require(dirname(__FILE__)."/"."foot.php");
}
elseif($action=="editmember"&&$Apower[member_list])
{
	
	$rsdb=$userDB->get_info($uid);
	if(!$rsdb[username]){
		showmsg("���û����ϲ�����,�����ʺŻ�û����");
	}

	require_once(ROOT_PATH."data/level.php");
	if($memberlevel[$postdb[groupid]]){
		if(!$webdb[groupUpType]&&$postdb[money]<$memberlevel[$postdb[groupid]]){
			showmsg("{$ltitle[$postdb[groupid]]}�ǻ�Ա��,����ǰ�û��Ļ��ֲ���{$memberlevel[$postdb[groupid]]},�����㲻������Ϊ����");
		}elseif($webdb[groupUpType]&&!$ConfigDB[endtime]){
			showmsg("{$ltitle[$postdb[groupid]]}�ǻ�Ա��,�����Ϊ��ָ����Ч����!");
		}
	}
	
	if($rsdb[groupid]=='3'&&$userdb[groupid]!=3&&!$founder&&!$ForceEnter){
		showmsg("����Ȩ���޸ĳ�������Ա�û���");
	}elseif($rsdb[groupid]=='4'&&$userdb[groupid]!=3&&$userdb[groupid]!=4&&!$founder&&!$ForceEnter){
		showmsg("����Ȩ���޸Ĵ��û���");
	}elseif(!$postdb[groupid]){
		showmsg("��ѡ��һ���û���");
	}elseif($postdb[groupid]=='2'){
		showmsg("�㲻��ѡ���ο���");
	}elseif($postdb[groupid]=='3'&&$userdb[groupid]!=3&&!$founder&&!$ForceEnter){
		showmsg("����Ȩ��ѡ�񳬼�����Ա�û���,������������û���");
	}elseif($postdb[groupid]=='4'&&$userdb[groupid]!=3&&$userdb[groupid]!=4&&!$founder&&!$ForceEnter){
		showmsg("����Ȩ��ѡ����û���,������������û���");
	}

	//�Զ����û��ֶ�
	require_once("../do/regfield.php");
	ck_regpost($postdb);

	$ConfigDB[begintime]&&$ConfigDB[begintime]=preg_replace("/([\d]+)-([\d]+)-([\d]+) ([\d]+):([\d]+):([\d]+)/eis","mk_time('\\4','\\5', '\\6', '\\2', '\\3', '\\1')",$ConfigDB[begintime]);

	$ConfigDB[endtime]&&$ConfigDB[endtime]=preg_replace("/([\d]+)-([\d]+)-([\d]+) ([\d]+):([\d]+):([\d]+)/eis","mk_time('\\4','\\5', '\\6', '\\2', '\\3', '\\1')",$ConfigDB[endtime]);

	$array=unserialize($rsdb[config]);
	foreach( $ConfigDB AS $key=>$value){
		$array[$key]=$value;
	}
	$postdb[config]=addslashes(serialize($array));

	if($postdb[newpassword]){
		$postdb[password] = $postdb[newpassword];
	}else{
		unset($postdb[password]);
	}

	$postdb[totalspace]=$postdb[totalspace]*1024*1024;

	$postdb[groups]=implode(",",$postdb[groups]);
	if($postdb[groups]){
		$postdb[groups]=",$postdb[groups],";
	}
	
	$array=$postdb;
	unset($array[money]);
	$array[username]=$rsdb[username];
	$array[email_yz] = $email_yz;
	$array[mob_yz] = $mob_yz;
	$array[idcard_yz] = $idcard_yz;
	$userDB -> edit_user($array);

	$rsdb[money]=get_money($uid);

	add_user( $uid , ($postdb[money]-$rsdb[money]) ,'����Ա����');

	//�Զ����û��ֶ�
	Reg_memberdata_field($uid,$postdb);

	jump("�޸ĳɹ�","index.php?lfj=member&job=editmember&uid=$uid");
	
}
elseif($action=="delete"&&$Apower[member_list])
{
	if(!$uid_db&&$uid){
		$uid_db[]=$uid;
	}
	foreach($uid_db AS $uid){
		$rsdb=$userDB->get_info($uid);
		if($rsdb[groupid]==3&&$userdb[groupid]!=3){
			showmsg("����Ȩɾ����������Ա");
		}
		if($uid==$lfjdb[uid]){
			showmsg("�㲻��ɾ���Լ�");
		}
		$userDB->delete_user($uid);
	}
	jump("ɾ���ɹ�","index.php?lfj=member&job=list");
}
elseif($job=="pwd"&&$Apower[member_list])
{
	require(dirname(__FILE__)."/"."head.php");
	//require("template/member/menu.htm");
	require(dirname(__FILE__)."/"."template/member/pwd.htm");
	require(dirname(__FILE__)."/"."foot.php");
}
elseif($action=="yz"&&$Apower[member_list])
{
	if($T=='yz'){
		$yz=1;
	}else{
		$yz=0;
	}
	foreach( $uid_db AS $key=>$uid){
		$rs=$userDB->get_info($uid);
		if($yz==0){			
			if($rs[groupid]==3||$rs[groupid]==4){
				showmsg("�㲻�������ù���ԱΪδ���");
			}
		}
		$array=array('username'=>$rs[username],'yz'=>$yz);		
		$userDB->edit_user($array);;
	}
	jump('�������',$FROMURL,0);
}
elseif($action=="unbind"&&$Apower[member_list])
{
	$db->query("UPDATE {$pre}memberdata SET qq_api='' WHERE uid='$uid'");
	jump('���ɹ�!',$FROMURL,0);
}
?>