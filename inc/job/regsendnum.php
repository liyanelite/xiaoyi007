<?php
!function_exists('html') && exit('ERR');
//��ǰ�ļ���ע��ʱͨ���ֻ��������ȡע����Ĺ���
if(!is_table("{$pre}regnum")){
	$db->query("CREATE TABLE `{$pre}regnum` (
	`sid` varchar( 8 ) NOT NULL default '',
	`num` varchar( 6 ) NOT NULL default '',
	`posttime` int( 10 ) NOT NULL default '0',
	UNIQUE KEY `sid` ( `sid` ) ,
	KEY `posttime` ( `num` , `posttime` ) 
	) TYPE = HEAP");
}
if(!$webdb[yzNumReg]){
	showerr('ϵͳû����������ܣ�');
}
$time=$timestamp-60;
if($db->get_one("SELECT * FROM {$pre}regnum WHERE sid='$usr_sid' AND posttime>$time")){
	showerr("������ע���뻹û���յ��Ļ�����һ���Ӻ����ط���");
}
$sms = rands(4);
$content = $webdb['webname']."�ṩ������ע������:(".$sms.")����λ��";
if($webdb[yzNumReg]==2){
	if(!ereg("^1([0-9]{10})$",$num)){
		showerr('�ֻ���������'.$num);
	}
	if(sms_send($num,$sms)){
		$db->query("REPLACE INTO `{$pre}regnum` ( `sid` , `num` , `posttime` ) VALUES ('$usr_sid', '$sms', '$timestamp')");
		showerr("��Ϣ�Ѿ��ɹ����͵���ָ�����ֻ�������,��ע����գ��п��ܻ��ӳټ����ӣ������ĵȴ���",1);
	}else{
		showerr("��Ϣ����ʧ�ܣ��������ֻ����Žӿ������⣡");
	}
}elseif($webdb[yzNumReg]==1){
	$email=$num;
	$title = $webdb['webname']."�ṩ�����ע������Ϣ";
	if(send_mail($email,$title,$content,$ifcheck=1)){
		$db->query("REPLACE INTO `{$pre}regnum` ( `sid` , `num` , `posttime` ) VALUES ('$usr_sid', '$sms', '$timestamp')");
		showerr("ע������Ϣ�Ѿ��ɹ����͵�����������,��ע�����",1);
	}else{
		showerr("��Ϣ����ʧ�ܣ��������ʼ����͹�����������");
	}
}
?>