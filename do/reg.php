<?php
require(dirname(__FILE__)."/"."global.php");
require(ROOT_PATH."data/level.php");

$_GET['_fromurl'] && $_fromurl=$_GET['_fromurl'];
if($lfjid){
	showerr("���Ѿ�ע����,�벻Ҫ�ظ�ע��,Ҫע��,�����˳�");
}
if($webdb[forbidReg]){
	showerr("�ܱ�Ǹ,��վ�ر���ע��");
}


if($step==2){

	//�û��Զ����ֶ�
	require_once(ROOT_PATH."/do/regfield.php");
	ck_regpost($postdb);

	if($webdb[forbidRegIp]){
		$detail=explode("\r\n",$webdb[forbidRegIp]);
		foreach( $detail AS $key=>$value){
			//if(strstr($onlineip,$value)&&ereg("^$value",$onlineip)){
			if(strstr($onlineip,$value)){
				showerr("������IP��ֹע��");
			}
		}
	}
	if($webdb[limitRegTime]&&get_cookie("limitRegTime")){
		showerr("{$webdb[limitRegTime]} ������,�벻Ҫ�ظ�ע��");
	}
	if( $webdb[yzImgReg] ){
		if(!check_imgnum($yzimg)){
			showerr("��֤�벻����");
		}
	}

	//ע����˶�
	if($webdb[yzNumReg]){
		$time=$timestamp-3600;	//1Сʱǰ��ע����ʧЧ.
		if($db->get_one("SELECT * FROM {$pre}regnum WHERE num='$yznum' AND sid='$usr_sid'")){
			$db->query("DELETE FROM {$pre}regnum WHERE (num='$yznum' AND sid='$usr_sid') OR posttime<$time");
		}else{
			showerr("ע���벻��!");
		}
	}

	if($mobphone && !ereg("^1([0-9]{10})$",$mobphone)){
		showerr('�ֻ���������');
	}

	if($password!=$password2){
		showerr("�����������벻һ��");
	}elseif ($msn&&!ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$msn)) {
		showerr("MSN�����Ϲ���"); 
	}
	if($webdb[forbidRegName]){
		$detail=explode("\r\n",$webdb[forbidRegName]);
		if(in_array($username,$detail)){
			showerr("�ܱ������ʺ�,������ʹ��,�����һ����");
		}
	}
	$msn = filtrate($msn);
	$homepage = filtrate($homepage);
	
	
	$gtype=0;
	//��Ҫ�û���д���Ϻ�,���ܳ�Ϊ��ҵ�û�.�粻��д����Ҳ�ܳ�Ϊ��ҵ�û��Ļ�,��������//��ȡ������
	//$gtype=$grouptype==1?1:0;
	
	if($groupid==3||$groupid==4||$memberlevel[$groupid]||!in_array($groupid,explode(",",$webdb[reg_group]))){
		$groupid=8;
	}

	$groupid || $groupid=8;
	

	$array=array(
		'username'=>$username,
		'password'=>$password,
		'groupid'=>intval($groupid),
		'grouptype'=>$gtype,
		'yz'=>$webdb[RegYz],
		'lastvist'=>$timestamp,
		'lastip'=>$onlineip,
		'regdate'=>$timestamp,
		'regip'=>$onlineip,
		'sex'=>$sex,
		'bday'=>"$bday_y-$bday_m-$bday_d",
		'oicq'=>$oicq,
		'msn'=>$msn,
		'homepage'=>$homepage,
		'email'=>$email,
		'mobphone'=>$mobphone
	);

	//�û�ע��
	$uid = $userDB->register_user($array);
	if(!is_numeric($uid)){
		showerr($uid);
	}

	if($webdb[RegCompany] && $gtype==1){
		//ע����ҵ�û�
		//$db->query("INSERT INTO `{$pre}memberdata_1` ( `uid`) VALUES ('$uid')");
	}
	
	//�û���¼
	$cookietime = 3600;
	$userDB->login($username,$password,$cookietime);

	//ע��ʱ��������
	if($webdb[limitRegTime]){
		set_cookie("limitRegTime",1,$webdb[limitRegTime]*60);
	}
	
	//ע���û��Զ����ֶ�
	Reg_memberdata_field($uid,$postdb);

	//ͨ��֤����
	if($_COOKIE[passport_url]||$_POST[passport_url]){
		$passport_url=urldecode($_COOKIE[passport_url]?$_COOKIE[passport_url]:$_POST[passport_url]);
		setcookie('passport_url','');
		$userDB->passport_server($username,$passport_url);
	}

	$jumpto&&$jumpto=urldecode($jumpto);

	add_user($uid,$webdb[regmoney],'ע��÷�');

	
	//����QQ�ʺ�
	list($token,$secret,$openid)=explode("\t",mymd5(get_cookie('token_secret'),'DE'));	
	if($openid){
		$rs1 = $db->get_one("SELECT * FROM {$pre}memberdata WHERE `qq_api`='$openid'");
		if(!$rs1){
			$db->query("UPDATE {$pre}memberdata SET `qq_api`='$openid' WHERE username='$username'");
			refreshto("$webdb[www_url]","�ʺ�����ɹ�!!",1);
		}
	}

	if(strstr($jumpto,$webdb[www_url])){
		refreshto("$jumpto","��ϲ�㣬ע��ɹ�",1);
	}else{
		refreshto("$webdb[www_url]","��ϲ�㣬ע��ɹ�",1);
	}
}else{

	//ͨ��֤����
	if($_GET[passport_url]){
		setcookie('passport_url',$_GET[passport_url]);
	}

	$_fromurl || $_fromurl=$FROMURL;
	require(ROOT_PATH."inc/head.php");
	require(html("reg"));
	require(ROOT_PATH."inc/foot.php");
}


?>