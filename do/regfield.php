<?php
error_reporting(0);
if($_GET[job]=='reg'){
	require("global.php");
	header('Content-Type: text/html; charset=gb2312');
	$array=unserialize(StripSlashes($webdb[Reg_Field]));
	if($uid&&$lfjuid!=$uid){
		$rsdb=$db->get_one("SELECT * FROM {$pre}memberdata WHERE uid='$uid'");
	}elseif(!$lfjdb){
		foreach( $array[field_db] AS $key=>$rs)
		{
			if($rs[form_value])
			{
				$rsdb[$key]=$rs[form_value];
			}
		}
	}else{
		$rsdb=$lfjdb;
	}
	set_table_value($array[field_db]);
	require(html("regfield"));
}elseif($_GET[job]=='show'){
	require("global.php");
	header('Content-Type: text/html; charset=gb2312');
	$array=unserialize(StripSlashes($webdb[Reg_Field]));
	if($uid){
		$rsdb=$db->get_one("SELECT * FROM {$pre}memberdata WHERE uid='$uid'");
	}else{
		$rsdb=$lfjdb;
	}
	foreach( $array[field_db] AS $key=>$rs){
		if($rs[allowview]&&$lfjuid!=$rsdb[uid]&&!$web_admin&&!in_array($groupdb['gid'],explode(",",$rs[allowview]))){
			$rsdb[$rs[field_name]]='***';
		}
	}
	require(html("regfield_show"));
}

function ck_regpost($postdb){
	global $webdb;
	$array=unserialize(StripSlashes($webdb[Reg_Field]));
	foreach( $array[field_db] AS $key=>$rs )
	{
		if( $rs[mustfill]==1 && $postdb[$rs[field_name]]==='' )
		{
			showerr("{$rs[title]}����Ϊ��");
		}
		if($rs[field_type]=='int'&&$postdb[$rs[field_name]]&&!ereg("^[-0-9]+$",$postdb[$rs[field_name]]))
		{
			showerr("{$rs[title]}ֻ��Ϊ����");
		}
		if($rs[field_type]=='varchar')
		{
			$rs[field_leng]=$rs[field_leng]?$rs[field_leng]:255;
			if(strlen( $postdb[$rs[field_name]] )>$rs[field_leng])
			{
				showerr("{$rs[title]}���ܳ���{$rs[field_leng]}���ַ�,һ�����ֵ��������ַ�");
			}
		}
		if($rs[field_type]=='int')
		{
			$rs[field_leng]=$rs[field_leng]?$rs[field_leng]:10;
			if(strlen( $postdb[$rs[field_name]] )>$rs[field_leng])
			{
				showerr("{$rs[title]}���ܳ���{$rs[field_leng]}���ַ�");
			}
		}
	}
}

function set_table_value($field_db){
	global $rsdb;
	foreach( $field_db AS $key=>$rs){
		if($rs[form_type]=='select'){
			$detail=explode("\r\n",$rs[form_set]);
			foreach( $detail AS $_key=>$value){
				list($v1,$v2)=explode("|",$value);
				if($rsdb[$key]==$v1){
					unset($rsdb[$key]);
					$rsdb[$key]["$v1"]=' selected ';
				}
			}
		}elseif($rs[form_type]=='radio'){
			$detail=explode("\r\n",$rs[form_set]);
			foreach( $detail AS $_key=>$value){
				list($v1,$v2)=explode("|",$value);
				if($rsdb[$key]==$v1){
					unset($rsdb[$key]);
					$rsdb[$key]["$v1"]=' checked ';
				}
			}
		}elseif($rs[form_type]=='checkbox'){
			$_d=explode("/",$rsdb[$key]);
			unset($rsdb[$key]);
			$detail=explode("\r\n",$rs[form_set]);
			foreach( $detail AS $_key=>$value){
				list($v1,$v2)=explode("|",$value);
				if( @in_array($v1,$_d) ){
					$rsdb[$key]["$v1"]=' checked ';
				}
			}
		}
	}
}

//����PW DZ��̳��ʹ�õ�
function Reg_memberdata($rs){
	global $db,$timestamp,$onlineip,$pre,$webdb,$dbname,$grouptype;
	
	//��Ҫ�û���д���Ϻ�,���ܳ�Ϊ��ҵ�û�.�粻��д����Ҳ�ܳ�Ϊ��ҵ�û��Ļ�,��������//��ȡ������
	//$gtype=$grouptype==1?1:0;

	if($webdb[RegCompany] && $gtype){		//ע����ҵ�û�
		//$db->query("INSERT INTO `$dbname`.{$pre}memberdata_1 ( `uid` ) VALUES ('$rs[uid]')");
	}	

	$db->query("INSERT INTO `$dbname`.{$pre}memberdata ( `uid` , `username` , `groupid` ,`grouptype` ,`yz` , `money` , `totalspace` , `regdate` , `regip` , `sex` , `bday` , `icon` , `introduce` , `oicq` , `msn` , `email`  )VALUES (	'$rs[uid]','$rs[username]','8','$gtype','$webdb[RegYz]','$webdb[regmoney]','$rs[totalspace]','$timestamp','$onlineip','$rs[sex]','$rs[bday]','$rs[icon]','$rs[introduce]','$rs[oicq]','$rs[msn]','$rs[email]')");
}

function Reg_memberdata_field($uid,$postdb){
	global $db,$pre,$webdb,$dbname,$grouptype;
	$array=unserialize(StripSlashes($webdb[Reg_Field]));
	$SQL='';
	foreach( $array[field_db] AS $key=>$rs )
	{
		if(is_array($postdb[$rs[field_name]])){
			$postdb[$rs[field_name]]=implode("/",$postdb[$rs[field_name]]);
		}
		$postdb[$rs[field_name]]=addslashes($postdb[$rs[field_name]]);
		$SQL .=",`$rs[field_name]`='{$postdb[$rs[field_name]]}'";
	}
	if($SQL){
		$db->query("UPDATE `$dbname`.{$pre}memberdata SET uid='$uid'$SQL WHERE `uid`='$uid'");
	}
	
	//��ע���ʱ��,��ʾ�û����ҵ����,ע���Ϊ��ҵ��Ա
	if($grouptype==1){
		require_once(html("company_reg"));
		exit;
	}
}
?>