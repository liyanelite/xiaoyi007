<?php
require(dirname(__FILE__)."/global.php");
if($lfjid){
	showerr("���Ѿ���¼��,�벻Ҫ�ظ���¼,Ҫ���µ�¼����<br><br><A HREF='$webdb[www_url]/do/login.php?action=quit'>��ȫ�˳�</A>");
}elseif(!$webdb[QQ_login]){
	showerr('�ù����ѹر�!');
}

if($step==2){		
	$login = $userDB->login($username,$password,intval($webdb[QQ_logintime]*3600));
	if($login==0){
		showerr("��ǰ�û�������,����������");
	}elseif($login==-1){
		showerr("���벻��ȷ,�����������");
	}

	list($token,$secret,$openid)=explode("\t",mymd5(get_cookie('token_secret'),'DE'));
	
	$MSG='�ʺ�����ʧ��!!';

	if($openid){
		$rs1 = $db->get_one("SELECT * FROM {$pre}memberdata WHERE `qq_api`='$openid'");
		$rs2 = $db->get_one("SELECT * FROM {$pre}memberdata WHERE username='$username'");
		if(!$rs1&&!$rs2[qq_api]){
			$db->query("UPDATE {$pre}memberdata SET `qq_api`='$openid' WHERE username='$username'");
			$MSG='�ʺ�����ɹ�!!';
		}else{
			$MSG="�ʺ�����ʧ��,��Ϊ�ʺ�{$username}�Ѿ���������QQ����!!";
		}
	}	

	refreshto("$webdb[www_url]/","$MSG{$uc_login_code}",3);
}
	
require(ROOT_PATH."inc/head.php");
require(html("qq_bind"));
require(ROOT_PATH."inc/foot.php");

?>