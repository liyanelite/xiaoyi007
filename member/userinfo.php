<?php
require("global.php");
@include_once(ROOT_PATH."data/all_area.php");
if($lfjuid==$uid||!$uid){
	//$linkdb=array("�鿴������Ϣ"=>"?uid=$lfjuid","�޸ĸ�����Ϣ"=>"?job=edit");
}else{
	//$linkdb=array("�鿴������Ϣ"=>"?uid=$uid");
}


//�޸��û���Ϣ
if($job=="edit")
{
	if(!$lfjid)
	{
		showerr("�㻹û��¼");
	}
	if($step==2)
	{
		//�Զ����û��ֶ�
		require_once("../do/regfield.php");
		ck_regpost($postdb);

		if($email!=$lfjdb[email]||$password)
		{
			if( !is_array($userDB->check_password($lfjid,$old_password)) )
			{
				showerr("�޸�������޸�����,�������ȷ���������");
			}
			elseif($password&&$password!=$password2)
			{
				showerr("���������ظ����벻��ͬ");
			}
			elseif ($email&&!ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$email))
			{
				showerr("���䲻���Ϲ���");
			}
		}
		if($oicq&&!ereg("^[0-9]{5,11}$",$oicq))
		{
			showerr("OICQ��ʽ�����Ϲ���");
		}
		if($bday&&!ereg("^([0-9]{4})-([0-9]{2})-([0-9]{2})$",$bday))
		{
			showerr("���ո�ʽ�����Ϲ���");
		}
		if($postalcode&&!ereg("^[0-9]{6}$",$postalcode))
		{
			showerr("���������ʽ�����Ϲ���");
		}
		if($mobphone&&!ereg("^[0-9]{11,12}$",$mobphone))
		{
			showerr("�ֻ������ʽ�����Ϲ���");
		}
		if ($msn&&!ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$msn))
		{
			showerr("msn�����Ϲ���");
		}
		if ($homepage&&!ereg("^http:",$homepage))
		{
			showerr("������ҳ�����Ϲ���");
		}

		$truename=filtrate($truename);
		$idcard=filtrate($idcard);
		$telephone=filtrate($telephone);
		$address=filtrate($address);
		$introduce=filtrate($introduce);
		$homepage=filtrate($homepage);


		if($icon_type=='new'&&$postfile)
		{
			$array[name]=is_array($postfile)?$_FILES[postfile][name]:$postfile_name;
			$filetype=strtolower(strrchr($array[name],"."));
			if($filetype!='.gif'&&$filetype!='.jpg')
			{
				showerr("ͷ��ֻ����.gif��.jpg��ʽ");
			}
			$array[path]=$webdb[updir]."/icon";
			$array[size]=is_array($postfile)?$_FILES[postfile][size]:$postfile_size;
			if(($array[size]+$lfjdb[usespace])>($webdb[totalSpace]*1048576+$groupdb[totalspace]*1048576+$lfjdb[totalspace]))
			{
				showerr("��Ŀռ䲻��,�ϴ�ʧ��,<A HREF='?uid=$lfjuid'>����鿴��Ŀռ�������Ϣ</A>");
			}
			$array[updateTable]=1;	//ͳ���û��ϴ����ļ�ռ�ÿռ��С
			$filename=upfile(is_array($postfile)?$_FILES[postfile][tmp_name]:$postfile,$array);
			$icon="icon/{$lfjuid}".strtolower(strrchr($filename,"."));
			@unlink(ROOT_PATH."$webdb[updir]/$icon");
			rename(ROOT_PATH."$webdb[updir]/icon/$filename",ROOT_PATH."$webdb[updir]/$icon");			
			
			$icon_array=getimagesize(ROOT_PATH."$webdb[updir]/$icon");
			if($icon_array[0]>150||$icon_array[1]>150){
				$icon_url="$webdb[www_url]/$webdb[updir]/$icon";
			}
		}
		if($icon)
		{
			$filetype=strtolower(strrchr($icon,"."));
			$icon=filtrate($icon);
			if($filetype!='.gif'&&$filetype!='.jpg')
			{
				showerr("ͷ��ֻ����.gif��.jpg��ʽ");
			}
		}
		
		//���˲���������
		$truename=replace_bad_word($truename);
		$introduce=replace_bad_word($introduce);
		$address=replace_bad_word($address);

		if($cityid)
		{
			@extract($db->get_one("SELECT fup AS provinceid FROM {$pre}area WHERE fid='$cityid'"));
		}
		
		$array=array(
			"uid"=>$lfjuid,
			"username"=>$lfjid,
			"email"=>$email,
			"password"=>$password,
			"icon"=>$icon,
			"sex"=>$sex,
			"bday"=>$bday,
			"introduce"=>$introduce,
			"oicq"=>$oicq,
			"msn"=>$msn,
			"homepage"=>$homepage,
			"address"=>$address,
			"postalcode"=>$postalcode,
			"mobphone"=>$mobphone,
			"telephone"=>$telephone,
			"idcard"=>$idcard,
			"truename"=>$truename,
			"provinceid"=>$provinceid,
			"cityid"=>$cityid,
		);

		if($lfjdb[email_yz]&&$lfjdb[email]!=$email){
			if(!$webdb[EditYzEmail]){
				showerr("�㲻�������޸�����,��Ϊ�Ѿ���˹���.");
			}else{
				$array[email_yz]=0;
			}
		}
		if($lfjdb[mob_yz]&&$lfjdb[mobphone]!=$mobphone){
			if(!$webdb[EditYzMob]){
				showerr("�㲻�������޸��ֻ�����,��Ϊ�Ѿ���˹���.");
			}else{
				$array[mob_yz]=0;
			}			
		}
		if($lfjdb[idcard_yz]&&($lfjdb[idcard]!=$idcard||$lfjdb[truename]!=$truename)){
			if(!$webdb[EditYzIdcard]){
				showerr("�㲻�������޸����֤����,��Ϊ�Ѿ���˹���.");
			}else{
				$array[idcard_yz]=0;
			}			
		}	

		$userDB->edit_user($array);

		//�Զ����û��ֶ�
		Reg_memberdata_field($lfjuid,$postdb);
		
		//��ȡ�û�ͷ��
		if($icon_url){
			$reurl=base64_encode("$webdb[www_url]/member/userinfo.php?uid=$lfjuid");
			header("location:$webdb[www_url]/do/cutimg.php?job=cutimg&width=150&height=150&srcimg=$icon_url&reurl=$reurl");
			exit;
		}
		refreshto("$FROMURL","�޸ĳɹ�",1);
	}
	else
	{
		$sex_db[$lfjdb[sex]]=" checked ";

		if(!$webdb[EditYzEmail]&&$lfjdb[email_yz]){
			$ipunt_email=" readonly onclick=\"alert('���������,�������޸�')\" ";
		}elseif($lfjdb[email_yz]){
			$ipunt_email=" onclick=\"alert('���������,�޸ĵĻ�,�ᴦ��δ���״̬')\" ";
		}
		if(!$webdb[EditYzMob]&&$lfjdb[mob_yz]){
			$ipunt_mob=" readonly onclick=\"alert('�ֻ������,�������޸�')\"  ";
		}elseif($lfjdb[mob_yz]){
			$ipunt_mob=" onclick=\"alert('�ֻ������,�޸ĵĻ�,�ᴦ��δ���״̬')\"  ";
		}
		if(!$webdb[EditYzIdcard]&&$lfjdb[idcard_yz]){
			$ipunt_idcard=" readonly onclick=\"alert('���֤�����,�������޸�')\"  ";
		}elseif($lfjdb[idcard_yz]){
			$ipunt_idcard=" onclick=\"alert('���֤�����,�޸ĵĻ�,�ᴦ��δ���״̬')\"  ";
		}

		$lfjdb[postalcode]==0&&$lfjdb[postalcode]='';

		require(dirname(__FILE__)."/"."head.php");
		require(dirname(__FILE__)."/"."template/userinfo.htm");
		require(dirname(__FILE__)."/"."foot.php");
	}
}

//�鿴�û���Ϣ
else
{
	if(!$uid&&!$username)
	{
		$uid=$lfjuid;
	}
	header("location:homepage.php?uid=$uid");exit;
}
?>