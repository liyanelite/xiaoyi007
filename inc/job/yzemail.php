<?php
!function_exists('html') && exit('ERR');
unset($name,$uid,$email);
list($name,$uid,$email)=explode("\t",mymd5($eid,'DE') );
if($name&&$uid&&$email){
	
	$rsdb=$userDB->get_info($uid);
	if($rsdb[email_yz]==1){
		showerr("�벻Ҫ�ظ���֤");
	}elseif($rsdb){
		$array=array(
			'username'=>$name,
			'uid'=>$uid,
			'email_yz'=>1,
			'email'=>$email
		);
		$userDB->edit_user($array);
		add_user($rsdb[uid],$webdb[YZ_EmailMoney],'������˽���');
		refreshto("$webdb[www_url]/","��ϲ��!������֤�ɹ�,ͬʱ���{$webdb[MoneyName]}������{$webdb[YZ_EmailMoney]}{$webdb[MoneyDW]}",3);
	}else{
		showerr("������֤ʧ��,���ܵ�ǰ�ʺ��ѱ�ɾ��!");
	}
}else{
	showerr("��֤ʧ��!");
}
?>