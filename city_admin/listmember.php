<?php
require_once(dirname(__FILE__)."/global.php");

if($action=="del"){
	$rs = $db->get_one("SELECT * FROM {$pre}memberdata WHERE uid='$uid'");
	if(!$rs){
		showerr("��Ĳ�����������,��ȷ��");
	}
	if($rs[cityid]!=$city_id){
		showerr("�Ǳ����л�Ա,�㲻��ɾ��!");
	}
	$db->query("DELETE FROM `{$pre}memberdata` WHERE `uid` = '$uid'");
	delete_home($uid);
	refreshto("$FROMURL","ɾ���ɹ�",1);
}
elseif($action=="edit"){
	
	$rs = $userDB->get_allInfo($uid);

	if(!$rs){
		showerr("��Ĳ�����������,��ȷ��");
	}
	if($rs[cityid]!=$city_id){
		showerr("�Ǳ����л�Ա,�㲻���޸�!");
	}
	
	$rs[money]=get_money($rs[uid]);
	$sexdb[intval($rs[sex])]=' checked ';
	$yzdb[intval($rs[yz])]=' checked ';
	$rs[totalspace]=floor($rs[totalspace]/(1024*1024));
	$email_yz[$rs[email_yz]]=' checked ';
	$mob_yz[$rs[mob_yz]]=' checked ';
	$idcard_yz[$rs[idcard_yz]]=' checked ';

	require(dirname(__FILE__)."/head.php");
	require(dirname(__FILE__)."/template/editmember.htm");
	require(dirname(__FILE__)."/foot.php");
}
elseif($action=="post"){
	$rs = $userDB->get_allInfo($uid);
	if(!$rs){
		showerr("��Ĳ�����������,��ȷ��");
	}
	if($rs[cityid]!=$city_id){
		showerr("�Ǳ����л�Ա,�㲻���޸�!");
	}
	if($postdb[username] != $rs[username]){
		showerr("�û��������޸�,����ϵͳ���ܳ�����");
	}
	if($postdb[newpassword]){
		$postdb[password] = $postdb[newpassword];
	}else{
		unset($postdb[password]);
	}
	$postdb[totalspace]=$postdb[totalspace]*1024*1024;
	$array=$postdb;
	unset($array[money]);
	$array[username]=$rs[username];
	$array[email_yz] = $email_yz;
	$array[mob_yz] = $mob_yz;
	$array[idcard_yz] = $idcard_yz;
	$userDB -> edit_user($array);
	$rsdb[money]=get_money($uid);
	add_user( $uid , ($postdb[money]-$rs[money]) ,'����Ա����');

	refreshto("$FROMURL","�޸ĳɹ�",1);
}
else{
	$rows=20;
	if(!$page){
		$page=1;
	}
	$min=($page-1)*$rows;
	unset($listdb,$i);
	$query = $db->query("SELECT SQL_CALC_FOUND_ROWS * FROM {$pre}memberdata WHERE cityid='$city_id' ORDER BY uid DESC LIMIT $min,$rows");
	$RS=$db->get_one("SELECT FOUND_ROWS()");
	$totalNum=$RS['FOUND_ROWS()'];
	$showpage=getpage('','',"?type=$type",$rows,$totalNum);
	while($rs = $db->fetch_array($query)){
		$rs[regdate]=date("Y-m-d H:i:s",$rs[regdate]);
		$i++;
		$rs[cl]=$i%2==0?'t2':'t1';
		$listdb[]=$rs;
	}
	require(dirname(__FILE__)."/head.php");
	require(dirname(__FILE__)."/template/member.htm");
	require(dirname(__FILE__)."/foot.php");
}
?>