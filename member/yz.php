<?php
require(dirname(__FILE__)."/"."global.php");

$linkdb=array("������֤"=>"?job=email","�����֤"=>"?job=idcard","�ֻ���֤"=>"?job=mob");

if(!$lfjid){
	showerr("�㻹û��¼");
}

if($action=='email')
{
	if (!ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$email)) {
		showerr("���䲻���Ϲ���"); 
	}
	$Title="����<$webdb[webname]>��������֤��Ϣ!";
	$eid=str_replace('+','%2B',mymd5("$lfjid\t$lfjuid\t$email"));
	$Content="����������ַ,������������֤:<br><A HREF='$webdb[www_url]/do/job.php?job=yzemail&eid=$eid'>$webdb[www_url]/do/job.php?job=yzemail&eid=$eid</A>";
	if($webdb[MailType]=='smtp')
	{
		if(!$webdb[MailServer]||!$webdb[MailPort]||!$webdb[MailId]||!$webdb[MailPw])
		{
			showmsg("�����Ա�����ʼ�������");
		}
		require_once(ROOT_PATH."inc/class.mail.php");
		$smtp = new smtp($webdb[MailServer],$webdb[MailPort],true,$webdb[MailId],$webdb[MailPw]);
		$smtp->debug = false;
		if($smtp->sendmail($email,$webdb[MailId], $Title, $Content, "HTML")){
			$succeed=1;
		}
	}
	elseif(mail($email, $Title, $Content))
	{
		$succeed=1;
	}

	if($succeed){
		refreshto("$FROMURL","ϵͳ�ոշ���һ����֤��Ϣ��������,�뾡�����,������ʼ���֤",10);
	}else{
		showerr("�ʼ�����ʧ��.�����Ա����������������");
	}

}
elseif($action=='idcard')
{
	if(!$truename){
		showerr("��ʵ��������Ϊ��!");
	}
	if(!$idcard){
		showerr("���֤���벻��Ϊ��!");
	}
	if(!ereg("^[0-9]{15}",$idcard)){
		showerr("���֤��������!");
	}
	if($idcardpic){
		if(!is_file(ROOT_PATH."$webdb[updir]/$idcardpic")){
			showerr("���ϴ����֤��ӡ��,��������������ַ!");
		}
		if(!eregi("^{$lfjuid}_",basename($idcardpic))&&$idcardpic!="idcard/$lfjuid.jpg"){
			showerr("���ϴ����֤��ӡ��,������������ͼƬ!");
		}
		if($idcardpic!="idcard/$lfjuid.jpg"){
			unlink(ROOT_PATH."$webdb[updir]/idcard/$lfjuid.jpg");
			rename(ROOT_PATH."$webdb[updir]/$idcardpic",ROOT_PATH."$webdb[updir]/idcard/$lfjuid.jpg");
		}		
	}
	$db->query("UPDATE {$pre}memberdata SET idcard='$idcard',truename='$truename',idcard_yz='-1' WHERE uid='$lfjuid'");
	refreshto("$FROMURL","��ȴ�����Ա���",10);
}
elseif($action=='mobphone')
{
	$code=rand(1000,9999);
	if( !eregi("^1(3|5|8)([0-9]{9})$",$mobphone) ){
		showerr("�ֻ���������!");
	}
	$msg=sms_send($mobphone,"�����֤����:$code");

	if($msg!==1){
		showerr("ϵͳ���Ͷ���ʧ��,�п���������ֻ���������,Ҳ�п�����ϵͳ�Ķ��Žӿ�ƽ̨���ֹ���,����ϵ����Ա�ں�̨������ƽ̨�ӿ�!");
	}
	$md5code=str_replace('+','%2B',mymd5("$code\t$mobphone\t$lfjuid","EN"));
	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/yz.htm");
	require(dirname(__FILE__)."/"."foot.php");
}
elseif($action=='mobphone2')
{
	if($lfjdb[mob_yz]){
		showerr("�벻Ҫ�ظ���֤�ֻ�����!");
	}
	if(!$yznum){
		showerr("��������֤��");
	}elseif(!$md5code){
		showerr("��������");
	}else{
		unset($code,$mobphone,$uid);
		list($code,$mobphone,$uid)=explode("\t",mymd5($md5code,"DE") );
		if($code!=$yznum||$uid!=$lfjuid){
			showerr("��֤�벻��");
		}
	}
	add_user($lfjuid,$webdb[YZ_MobMoney],'�ֻ�������˽���');
	$db->query("UPDATE {$pre}memberdata SET mobphone='$mobphone',mob_yz='1' WHERE uid='$lfjuid'");
	refreshto("yz.php?job=mob","��ϲ��,����ֻ�����ɹ�ͨ�����,��ͬʱ�õ� {$webdb[YZ_MobMoney]} �����ֽ���!",10);
}
else
{	
	unset($idcardpic);
	if($job=='idcard'){
		if(is_file(ROOT_PATH."$webdb[updir]/idcard/$lfjuid.jpg")){
			$idcardpic="idcard/$lfjuid.jpg";
		}
	}
	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/yz.htm");
	require(dirname(__FILE__)."/"."foot.php");
}
?>