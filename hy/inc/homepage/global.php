<?php

//���ֶ���
if($action=="msg_post"){ //����

	//������ʱ���ڲ����ظ�����
	$Omsg=$db->get_one("SELECT max(posttime) AS posttime  FROM {$_pre}guestbook` WHERE cuid='$uid' AND uid='$lfjuid' ");

	if(!check_imgnum($yzimg)){
		showerr("��֤�벻����");
	}

	if($Omsg[posttime]){
		if( intval($Omsg[posttime]) + 60 > time() ){
			showerr("1�����ڲ����ٴ�����");
		}
	}



	//
	if(!$content){
		showerr("���ݲ���Ϊ��");
	}
	if(strlen($content)>1000){
		showerr("���ݲ��ܳ���500����");
	}
	$content=filtrate($content);
	$yz=1;
	$db->query("INSERT INTO `{$_pre}guestbook` (`cuid`,  `uid` , `username` , `ip` , `content` , `yz` , `posttime` , `list` ) 
	VALUES (
	'$uid','$lfjuid','$lfjid','$onlineip','$content','$yz','".time()."','".time()."')
	");
	refreshto("?m=msg&uid=$uid&page=$page","лл�������",1);

}elseif($action=="msg_delete"){ //ɾ������

	if($web_admin){
		$db->query("DELETE FROM `{$_pre}guestbook` WHERE id='$id'");
	}else{
		$db->query("DELETE FROM `{$_pre}guestbook` WHERE id='$id' AND (uid='$lfjuid' OR cuid='$lfjuid' )");
	}
	refreshto("?m=msg&uid=$uid&page=$page","ɾ���ɹ�",0);

}



//��ʼ������
$tpl_left=array(
'base'=>"�̼ҵ���",
'tongji'=>"ͳ����Ϣ",
'news'=>"���Ŷ�̬",
'ck'=>"��������",
);

$tpl_right=array(
'info'=>"�̼Ҽ��",
'contactus'=>"��ϵ����",
'msg'=>"�� �� ��",
'visitor'=>"�ÿ��㼣",
);



$webdb[company_upload_max]=5;	//�������ϴ�������ͼƬ

$webdb[homepage_banner_size]=$webdb[homepage_banner_size]?$webdb[homepage_banner_size]:80;
$webdb[homepage_ico_size]=$webdb[homepage_ico_size]?$webdb[homepage_ico_size]:50;
//$webdb[friendlinkmax]=$webdb[friendlinkmax]?$webdb[friendlinkmax]:20;

/***�����Ŀ¼ *****/
$tpl_dir=Mpath."/images/homepage_style/";






//�����̼���ҳ
function caretehomepage($rsdb,$jump=true){
	global $db,$webdb,$_pre,$pre,$tpl_left,$tpl_right,$ctrl,$atn,$timestamp;

	$rt=$db->get_one("SELECT * FROM `{$_pre}home` WHERE uid='$rsdb[uid]'");
	if($rt){
		showerr("�Ѿ��������!");
	}
	
	foreach($tpl_left as $key=>$val){
		$index_left[]=$key;
	}
	$index_left=implode(",",$index_left);
	
	foreach($tpl_right as $key=>$val){
		if(in_array($key,array('info'))){  //������Щģ����Գ�ʼ��
			$index_right[]=$key;
		}
	}
	$index_right=implode(",",$index_right);
	
	$listnum=array(
	'guestbook'=>4,'visitor'=>10,'newslist'=>10,
	'Mguestbook'=>10,'Mvisitor'=>40,'Mnewslist'=>10);
	$listnum=addslashes(serialize($listnum));

	$menu=require(Mpath."inc/homepage/menu.php");
	$menu=addslashes(serialize($menu));

	$db->query("INSERT INTO `{$_pre}home` (  `uid` , `username` , `style` , `index_left` , `index_right` ,`listnum`,`banner`, `bodytpl`, `head_menu` ) 
VALUES ( '$rsdb[uid]', '$rsdb[username]', 'default', '$index_left', '$index_right','$listnum','','left', '$menu');");
	

	//��ʼ��ͼ��
	$db->query("INSERT INTO `{$_pre}picsort` ( `psid` , `psup` , `name` , `remarks` , `uid` , `username` , `level` , `posttime` , `orderlist` ) VALUES 
	('', '0', '��Ʒͼ��', '��¼��Ʒ�෽��ͼƬ����', '$rsdb[uid]', '$rsdb[username]',  '0', '$timestamp', '2'),
	('', '0', '����˵��', '����֤�飬��֤�飬Ӫҵִ��', '$rsdb[uid]', '$rsdb[username]', '0', '$timestamp', '1');   
	");

	if(!$rsdb['if_homepage']){
		$db->query("UPDATE {$_pre}company SET if_homepage=1 WHERE uid='$rsdb[uid]' ");
		
	}

	$db->query("UPDATE {$pre}memberdata SET grouptype=1 WHERE uid='$rsdb[uid]' ");

	if($jump){
		//��ת
		$url="?uid=$rsdb[uid]";
		

		echo "�̼�ҳ�漤��ɹ�....<META HTTP-EQUIV=REFRESH CONTENT='0;URL=$url'>";
		exit;
	}
}




//��Ŀ¼�б�
function choose_sort($fid,$class,$ck=0,$ctype)
{
	global $db,$_pre;
	for($i=0;$i<$class;$i++){
		$icon.="&nbsp;&nbsp;&nbsp;&nbsp;";
	}
	$class++;          //AND type=1
	$query = $db->query("SELECT * FROM {$_pre}sort WHERE fup='$fid'   ORDER BY list DESC LIMIT 500");
	while($rs = $db->fetch_array($query)){
		$ckk=$ck==$rs[fid]?' selected ':'';
		$fup_select.="<option value='$rs[fid]' $ckk >$icon|-$rs[name]</option>";
		$fup_select.=choose_sort($rs[fid],$class,$ck,$ctype);
	}
	return $fup_select;
}


?>