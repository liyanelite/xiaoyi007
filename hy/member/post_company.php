<?php
require_once(dirname(__FILE__)."/global.php");
require_once(dirname(__FILE__)."/../inc/homepage/global.php");
require_once(dirname(__FILE__)."/../bd_pics.php");

$post_company=1;//ʹ����Ŀѡ��ʱ���Զ�ѡ
$lfjdb[money]=get_money($lfjuid);
//$groupdb['allow_get_homepage']=1;	//���Կ�����Щ�û��������������
if(!$uid){
	$uid=$lfjuid;
}

if($action=='apply'){

	$rt=$db->get_one("SELECT * FROM `{$_pre}company` WHERE uid='$lfjuid'");
	if(!$rt){
		showerr("<A HREF='$Murl/member/post_company.php'>���ȵǼ���ҵ��Ϣ</A>");
	}elseif($rt[if_homepage]){
		showerr("�벻Ҫ�ظ�����");
	}
	if(!$web_admin){
		if(!$groupdb['allow_get_homepage']){
			showerr("�ܱ�Ǹ,�������û��鲻��������ҵ����,��Ҫ������ҵ����,������������û���,<A HREF='$webdb[www_url]/member/buygroup.php?job=list'>��������û���</A>");
		}elseif($lfjdb[money]<$webdb[creat_home_money]){
			showerr("�ܱ�Ǹ,�㲻��������ҵ����,��Ϊ������ҵ������Ҫ{$webdb[MoneyName]}{$webdb[creat_home_money]}{$webdb[MoneyDW]},�����{$webdb[MoneyName]}����{$lfjdb[money]}{$webdb[MoneyDW]}<br>�����ѡ�����߳�ֵ���������{$webdb[MoneyName]},<A HREF='/member/money.php?job=list'>������ֵ</A>");
		}
	}
	if(!$web_admin&&$webdb[creat_home_money]){
		add_user($lfjuid,-abs($webdb[creat_home_money]),'�������̿۷�');
	}

	$company=$db->get_one("SELECT * FROM {$_pre}company WHERE uid='$lfjuid' LIMIT 1");
	caretehomepage($company,false);
	refreshto("?action=ok","",0);

}elseif($action=='add'||$action=='edit'){

	if($action=='add')$uid=$lfjuid;
	
	if($postdb[if_homepage]&&!$web_admin){

		if(!$groupdb['allow_get_homepage']){
			showerr_post("�ܱ�Ǹ,�������û��鲻�������̼���ҳ,��Ҫ�����̼���ҳ,������������û���");
		}elseif($lfjdb[money]<$webdb[creat_home_money]){
			showerr_post("�ܱ�Ǹ,�㲻�������̼���ҳ,��Ϊ�����̼���ҳ��Ҫ{$webdb[MoneyName]}{$webdb[creat_home_money]}{$webdb[MoneyDW]},�����{$webdb[MoneyName]}����{$lfjdb[money]}{$webdb[MoneyDW]}<br>�����ѡ�����߳�ֵ���������{$webdb[MoneyName]}");
		}		
	}
	$rt=$db->get_one("SELECT * FROM `{$_pre}company` WHERE uid='$uid'");
	if($action=='edit'&&$rt[uid]!=$lfjuid&&!$web_admin){
		showerr('��ûȨ��');
	}
	if($rt[if_homepage]){
		showerr_post("������,���Ѿ��Ǽǹ���!!");
	}
	elseif($rt){
		$action='edit';
	}
	if(count($fids)<1)showerr_post("����ѡ��һ������");
	
	//��������
	$ifids = $fnamedb = array();
	foreach($fids as $key){
		$key = intval($key);
		if($key){
			$ifids[] = $key;
			$fnamedb[]=$Fid_db['name'][$key];
		}
	}
	$fname=implode(',',$fnamedb);

	//if(!$postdb[city_id]) showerr_post("��ѡ����"); 		
		
	if(!$postdb[title]) showerr_post("�����빫˾ȫ��");
	if(strlen($postdb[title])<10){
		showerr_post("��˾ȫ��С��5���ֲ��淶!");
	}
	if(eregi("^([a-z0-9]+)$",$postdb[title])){
		showerr_post("��˾���Ʋ��淶!");
	}
	if(!$postdb[qy_regmoney]) showerr_post("�����빫˾ע���ʱ�");
	if(!$postdb[content]) showerr_post("��ϸ�̼ҽ��ܲ���Ϊ��");
	$postdb[content]=nl2br($postdb[content]);
	if(!$postdb[qy_contact_tel]) showerr_post("ָ����ϵ�˵绰����Ϊ��");
	if(!$postdb[qy_contact]) showerr_post("ָ����ϵ�˲���Ϊ��");
	if(!$postdb[qy_contact_email]) showerr_post("ָ����ϵ�������ַ����Ϊ��");
	foreach($postdb as $key=>$val){//ȫ�����ݴ���
			$postdb[$key]=ReplaceHtmlAndJs($val);
	}

	if(!ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$postdb[qy_contact_email])){
		showerr_post('���䲻���Ϲ���');
	}

	if($postdb[qy_regmoney]<3){
		showerr_post('ע���ʱ�����С��3��');
	}

	if($postdb[qy_website]&&!ereg("^http:",$postdb[qy_website])){
		showerr_post('��ַ����');
	}

	//ͼƬ����
	if(is_uploaded_file($_FILES[postfile][tmp_name])){
		if($action=='edit'){
			delete_attachment($uid,tempdir($rt[picurl]));
		}
		$array[name]=is_array($postfile)?$_FILES[postfile][name]:$postfile_name;
		$dirid=ceil($uid/1000);
		$array[path]=$webdb[updir]."/homepage/logo/$dirid/";
				
		$array[size]=is_array($postfile)?$_FILES[postfile][size]:$postfile_size;
		$pic_name=upfile(is_array($postfile)?$_FILES[postfile][tmp_name]:$postfile,$array);
		
		$picurl="homepage/logo/$dirid/{$pic_name}";

		$sizedb=getimagesize(ROOT_PATH."$array[path]/$pic_name");

		if($sizedb[0]>300||$sizedb[1]>300){
			$Newpicpath=ROOT_PATH."$array[path]/logo_{$pic_name}";
			gdpic(ROOT_PATH."$array[path]/{$pic_name}",$Newpicpath,300,225);
			gdpic(ROOT_PATH."$array[path]/{$pic_name}",$Newpicpath.".jpg",225,300);
			gdpic(ROOT_PATH."$array[path]/{$pic_name}",$Newpicpath.".jpg.jpg",300,300);
			gdpic(ROOT_PATH."$array[path]/{$pic_name}",$Newpicpath.".jpg.jpg.jpg",300,100);
			if(file_exists($Newpicpath)){
				delete_attachment($uid,tempdir("homepage/logo/$dirid/{$pic_name}"));
				$picurl="homepage/logo/$dirid/logo_{$pic_name}";
			}
		}else{
			$Newpicpath=ROOT_PATH."$array[path]/{$pic_name}";
			copy(ROOT_PATH."$array[path]/{$pic_name}",$Newpicpath.".jpg");
			copy(ROOT_PATH."$array[path]/{$pic_name}",$Newpicpath.".jpg.jpg");
			copy(ROOT_PATH."$array[path]/{$pic_name}",$Newpicpath.".jpg.jpg.jpg");
		}
		
	}else{
		$picurl=$rt[picurl];
	}

	
	if($action=='edit'){
		$db->query("DELETE FROM {$_pre}company WHERE uid='$rt[uid]'");
		$db->query("DELETE FROM {$_pre}company_fid WHERE uid='$rt[uid]'");
	}
	
	$username=$action=='edit'?$rt[username]:$lfjid;
	$yz=1;
	$db->query("INSERT INTO `{$_pre}company` ( `title` , `fname` , `uid` , `username` , `posttime` , `listorder` , `picurl` , `yz` , `yzer` , `yztime` , `content` , `province_id` , `city_id` ,`zone_id` ,`street_id` , `qy_cate` , `qy_saletype` , `qy_regmoney` , `qy_createtime` , `qy_regplace` , `qy_address` , `qy_postnum` , `qy_pro_ser` , `my_buy` , `my_trade` , `qy_contact`,`qy_contact_zhiwei` , `qy_contact_sex` , `qy_contact_tel` , `qy_contact_mobile` , `qy_contact_fax` , `qy_contact_email` , `qy_website` , `qq` , `msn` , `skype`, `if_homepage` ) 
	VALUES (
	 '$postdb[title]', '$fname', '$uid', '$username', '".$timestamp."', '0', '$picurl', '$yz', '', '".$timestamp."', '$postdb[content]', '$postdb[province_id]', '$city_id','$postdb[zone_id]','$postdb[street_id]', '$postdb[qy_cate]', '$postdb[qy_saletype]', '$postdb[qy_regmoney]', '$postdb[qy_createtime]', '$postdb[qy_regplace]', '$postdb[qy_address]', '$postdb[qy_postnum]', '$postdb[qy_pro_ser]', '$postdb[my_buy]', '$postdb[my_trade]', '$postdb[qy_contact]', '$postdb[qy_contact_zhiwei]', '$postdb[qy_contact_sex]', '$postdb[qy_contact_tel]', '$postdb[qy_contact_mobile]', '$postdb[qy_contact_fax]', '$postdb[qy_contact_email]', '$postdb[qy_website]', '$postdb[qq]', '$postdb[msn]', '$postdb[skype]', '$postdb[if_homepage]');");
	
	$id = $db->insert_id();
	
	foreach($ifids as $v){
		$db->query("INSERT INTO {$_pre}company_fid (uid, fid) VALUES ($uid, $v)");
	}

	//if($action=='add'){
		//$SQL="";
		//if($lfjdb[groupid]==8){
			//$SQL=",groupid=9";
		//}
		//$db->query("UPDATE {$pre}memberdata SET grouptype=1$SQL WHERE uid='$uid'");
	//}

	//������ҳ
	if(!$rt[if_homepage]&&$postdb[if_homepage]){
		if(!$web_admin&&$webdb[creat_home_money]){
			add_user($lfjuid,-abs($webdb[creat_home_money]),'�������̿۷�');
		}

		//��ʼ����ҳ
		$company=$db->get_one("SELECT * FROM {$_pre}company WHERE uid='$uid' LIMIT 1");
		caretehomepage($company,false);
		parent_goto("?action=ok","");
	}else{
		parent_goto("?job=view&uid=$uid","");
	}
}elseif($action=='ok'){
		
		$msg="��ϲ�����̼���ҳ����ɹ���!";
		$do[0]['text']="����鿴��������";$do[0]['target']=" target=_blank";
		$do[0]['link']="$webdb[www_url]/home/?uid=$uid";
		//$do[1]['text']="��˽������̹������";
		//$do[1]['link']="homepage_ctrl.php";
		//�Զ������̼�ҳ��
		//@sockOpenUrl('$Mdomain/homepage.php?uid=$lfjuid');
		//file_get_contents('$Mdomain/homepage.php?uid=$lfjuid');

}elseif($job=='view'){
	$rsdb=$db->get_one("SELECT * FROM `{$_pre}company` WHERE uid='$uid'");
	if(!$rsdb){
		showerr("��ҵ��Ϣ������!");
	}elseif($rsdb[if_homepage]){
		parent_goto("$webdb[www_url]/home/?uid=$uid","");
	}
	$rsdb[picurl]=tempdir($rsdb[picurl]);
	@include(ROOT_PATH."data/zone/$rsdb[city_id].php");
}else{
	
	$rsdb=$db->get_one("SELECT * FROM `{$_pre}company` WHERE uid='$uid'");
	if($rsdb[if_homepage]){
		header("location:homepage_ctrl.php?atn=info&uid=$uid");
		exit;
	}
	elseif($rsdb){
		$do_type='edit';
		$rsdb[_my_trade][$rsdb[my_trade]]=' selected ';
		$rsdb[_qy_cate][$rsdb[qy_cate]]=' selected ';
		$rsdb[_qy_saletype][$rsdb[qy_saletype]]=' selected ';
		$query = $db->query("SELECT fid FROM `{$_pre}company_fid` WHERE uid = {$rsdb['uid']}");
		$fids = array(); while($arr = $db->fetch_array($query)) $fids[] = $arr['fid'];

	}else{
		$do_type='add';
	}
	$webdb[maxCompanyFidNum]=$webdb[maxCompanyFidNum]?$webdb[maxCompanyFidNum]:10;
	//�õ�����
	//$city_fid=select_where("{$_pre}city","'postdb[city_id]'  onChange=\"choose_where('getzone',this.options[this.selectedIndex].value,'','1','')\"",$rsdb[city_id]);
}





$member_style=$webdb[sys_member_style]?$webdb[sys_member_style]:"images2";

$if_homepage=(!$web_admin&&($lfjdb[money]<$webdb[creat_home_money]||!$groupdb['allow_get_homepage']))?'':' checked ';

require(dirname(__FILE__)."/"."head.php");
require(dirname(__FILE__)."/"."template/post_company.htm");
require(dirname(__FILE__)."/"."foot.php");


function showerr_post($msg,$html_id=''){
		echo "<SCRIPT LANGUAGE=\"JavaScript\">
			<!--
			alert(\"$msg\");
			parent.document.getElementById('post_showmsg').innerHTML=\"<strong>$msg</strong>\";	
			parent.document.getElementById('postSubmit').disabled=false;	
			//-->
			</SCRIPT>";exit;
}


function parent_goto($url,$msg=''){

	echo "<SCRIPT LANGUAGE=\"JavaScript\">
			<!--
			";
	if($msg!=''){
		echo "alert('$msg');";
	}
	echo    "
			
			parent.location='$url';	
			parent.location.href='$url';	
		
			//-->
			</SCRIPT>";exit;
}

?>