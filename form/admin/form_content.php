<?php
!function_exists('html') && exit('ERR');

ck_power('form_content');

if($job=="list")
{

	if(!$mid){
		$query = $db->query("SELECT * FROM {$_pre}module ORDER BY list DESC,id ASC");
		while($rs = $db->fetch_array($query)){
			@extract($db->get_one("SELECT COUNT(*) AS NUM FROM {$_pre}content WHERE mid='$rs[id]'"));
			$rs[NUM]=$NUM;
			$Mdb[$rs[id]]=$rs;
		}
		get_admin_html('list');
		exit;
	}

	$mid=intval($mid);
	$fidDB = $db->get_one("SELECT * FROM {$_pre}module WHERE id='$mid'");

	$array=unserialize($fidDB[config]);
  
	$rows=20;
	if($page<1){
		$page=1;
	}
	$min=($page-1)*$rows;

	$showpage=getpage("{$_pre}content","WHERE  mid='$mid'","$admin_path&job=list&mid=$mid",$rows);
	$query = $db->query("SELECT C.*,D.* FROM {$_pre}content C LEFT JOIN {$_pre}content_$mid D ON C.id=D.id WHERE C.mid='$mid' ORDER BY C.id DESC LIMIT $min,$rows");
	while($rs = $db->fetch_array($query)){

		foreach( $array[listshow_db] AS $key=>$rs2){
			$rs[$key]=SRC_true_value($array[field_db][$key],$rs[$key]);
		}

		$rs[posttime]=date("Y-m-d",$rs[posttime]);
		$listdb[]=$rs;
	}
	require("head.php");
	require(ROOT_PATH."$dirname/data/form_tpl/admin_list_$mid.htm");
	require("foot.php");
}
elseif($action=="delete")
{
	if($id){
		$rs = $db->get_one("SELECT * FROM {$_pre}content WHERE id='$id'");

		$db->query("DELETE FROM {$_pre}content WHERE id='$id'");
		$db->query("DELETE FROM {$_pre}content_$rs[mid] WHERE id='$id'");
		$db->query("DELETE FROM `{$pre}form_reply` WHERE id='$id'");
	}else{
		foreach( $iddb AS $key=>$value){
			$rs = $db->get_one("SELECT * FROM {$_pre}content WHERE id='$value'");
			$db->query("DELETE FROM {$_pre}content WHERE id='$value'");
			$db->query("DELETE FROM {$_pre}content_$rs[mid] WHERE id='$value'");
			$db->query("DELETE FROM `{$pre}form_reply` WHERE id='$value'");
		}
	}
	jump("ɾ���ɹ�","$FROMURL",1);
}
elseif($action=="export"){
	if(!$iddb){
		showerr("��ѡ��Ҫ����������!");
	}
	$outstr="<table width=\"500\" border=\"1\" align=\"center\" cellpadding=\"5\"><tr>";
	$outstr.="<th bgcolor=\"#A5A0DE\">���</th>";
	$rsdb=$db->get_one("SELECT * FROM {$_pre}module WHERE id='$mid'");
	$array=unserialize($rsdb[config]);
	$listdb=$array[field_db];
	foreach($listdb AS $key=>$rs2){
		$outstr.="<th bgcolor=\"#A5A0DE\">$rs2[title]</th>";
	}
	$outstr.="</tr>";
	foreach($iddb  AS $key=>$value){
		$show = $db->get_one("SELECT * FROM {$_pre}content_$mid WHERE id='$key'");
		$outstr.="<tr><td align=\"center\">$show[id]</td>";
		foreach($listdb AS $keys=>$rs2){
			$show[$keys]=SRC_true_value($array[field_db][$keys],$show[$keys]);
			if($rs2[form_type]=="upfile"){
				$show[$keys]=$show[$keys]?tempdir($show[$keys]):"";
			}
			$outstr.="<td align=\"center\">$show[$keys]</td>";
		}
		$outstr.="</tr>";
	}
	$outstr.="</table>";	
	ob_end_clean();
	header('Last-Modified: '.gmdate('D, d M Y H:i:s',time()).' GMT');
	header('Pragma: no-cache');
	header('Content-Encoding: none');
	header('Content-Disposition: attachment; filename='.$rsdb[name].'.xls');
	header('Content-type: text/csv');
	echo $outstr;/**/
}
elseif($job=="view")
{
	$query = $db->query("SELECT * FROM {$_pre}module ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		$Mdb[$rs[id]]=$rs[name];
	}
	$mid=intval($mid);
	$colordb[$mid]='red;';

	$fidDB=$db->get_one("SELECT * FROM {$_pre}module WHERE id='$mid'");

	$m_config=unserialize($fidDB[config]);

	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}content` A LEFT JOIN `{$_pre}content_$fidDB[id]` B ON A.id=B.id WHERE A.id='$id'");

	require_once(ROOT_PATH."inc/encode.php");

	foreach( $m_config[field_db] AS $key=>$rs )
	{
		if($key=='content'){
			continue;
		}
		if($rs[form_type]=='textarea')
		{
			$rsdb[$key]=format_text($rsdb[$key]);
		}
		elseif($rs[form_type]=='ieedit')
		{
			$rsdb[$key]=En_TruePath($rsdb[$key],0);
		}
		elseif($rs[form_type]=='upfile')
		{
			$rsdb[$key]=tempdir($rsdb[$key]);
		}
		elseif($rs[form_type]=='upmorefile')
		{
			$detail=explode("\n",$rsdb[$key]);
			unset($rsdb[$key]);
			foreach( $detail AS $_key=>$value){
				list($_url,$_name)=explode("@@@",$value);
				$_rsdb[$key][name][]=$_name=$_name?$_name:"DownLoad$_key";
				$_rsdb[$key][url][]=$_url=tempdir($_url);
				$rsdb[$key][show][]="<A HREF='$_url' target=_blank>$_name</A>";
			}
			$rsdb[$key]=implode("<br>",$rsdb[$key][show]);
		}
		elseif($rs[form_type]=='radio'||$rs[form_type]=='select'||$rs[form_type]=='checkbox')
		{
			$rsdb[$key]=SRC_true_value($rs,$rsdb[$key]);
		}
	}

	$rsdb[posttime]=date("Y-m-d H:i:s",$rsdb[posttime]);
	require("head.php");
	require(ROOT_PATH."$dirname/data/form_tpl/admin_bencandy_$mid.htm");
	require("foot.php");
}
elseif($job=="yz")
{
	$db->query("UPDATE `{$_pre}content` SET yz='$yz' WHERE id='$id'");
	jump("�޸ĳɹ�","$FROMURL",'0');
}
elseif($job=="reply")
{
	$rsdb=$db->get_one("SELECT * FROM `{$pre}form_reply` WHERE id='$id'");
	$rsdb[content]=En_TruePath($rsdb[content],0);
	$rsdb[content]=editor_replace($rsdb[content]);

	get_admin_html('reply');
}
elseif($action=="reply")
{
	$rsdb=$db->get_one("SELECT A.*,U.mobphone FROM `{$_pre}content` A LEFT JOIN `{$pre}memberdata` U ON A.uid=U.uid WHERE A.id='$id'");
	$db->query("DELETE FROM `{$pre}form_reply` WHERE id='$id'");

	$postdb[content]=En_TruePath($postdb[content]);

	$db->query("UPDATE `{$_pre}content` SET yz=1 WHERE id='$id'");

	$db->query("INSERT INTO `{$pre}form_reply` ( `id` , `mid` , `posttime` , `uid` , `username` , `content` , `ip` ) VALUES ('$id', '$mid', '$timestamp', '$userdb[uid]', '$userdb[username]', '$postdb[content]', '$onlineip')");

	//�ֻ�����֪ͨ�ͻ�
	if($send_sms){
		if(!$rsdb[mobphone]){
			$MSG='�ͻ�û�������ֻ�����,���ŷ���ʧ��.';
		}else{
			$mdb=$db->get_one("SELECT * FROM {$_pre}module WHERE id='$mid' ");

			$Title="���,����<$webdb[webname]-$mdb[name]>�������,����Ա�������,�뾡����������!";
			if( sms_send($rsdb[mobphone], $Title )===1 ){
				$MSG='���ŷ��ͳɹ�';
			}else{
				$MSG='���ŷ���ʧ��,������Žӿ�,�Ƿ��ʺ�����,����������!';
			}
		}
	}else{
		$MSG='�ظ��ɹ�';
	}

	jump($MSG,"$admin_path&job=view&mid=$mid&id=$id",'3');
}
?>