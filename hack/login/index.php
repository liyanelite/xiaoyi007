<?php
!function_exists('html') && exit('ERR');
if($lfjid){
	@include(ROOT_PATH."data/level.php");
	if( ereg("^pwbbs",$webdb[passport_type]) &&!is_array($db_modes) ){
		@extract($db->get_one("SELECT COUNT(*) AS pmNUM FROM {$TB_pre}msg WHERE `touid`='$lfjuid' AND type='rebox' AND ifnew=1"));
	}elseif( ereg("^dzbbs",$webdb[passport_type]) ){
		if($webdb[passport_type]=='dzbbs7'){
			$pmNUM=uc_pm_checknew($lfjuid);
		}else{
			@extract($db->get_one("SELECT COUNT(*) AS pmNUM FROM {$TB_pre}pms WHERE `msgtoid`='$lfjuid' AND folder='inbox' AND new=1"));
		}			
	}else{
		@extract($db->get_one("SELECT COUNT(*) AS pmNUM FROM `{$pre}pm` WHERE `touid`='$lfjuid' AND type='rebox' AND ifnew='1'"));
	}
	if(!$pmNUM){
		$MSG="<A target=\"_blank\" HREF=\"$webdb[www_url]/member/index.php?main=pm.php?job=list\">վ����Ϣ</A>";
	}else{
		$MSG="<A target=\"_blank\" HREF=\"$webdb[www_url]/member/index.php?main=pm.php?job=list\" style=\"color:blue;\">��������Ϣ({$pmNUM})</a>";
	}
	$lfjdb[_lastvist]=date("Y-m-d H:i",$lfjdb[lastvist]);
	$lfjdb[_regdate]=date("Y-m-d H:i",$lfjdb[regdate]);
}
if($styletype&&!eregi("^[-_0-9a-z]+$",$styletype)){
	showerr("�����ʽ����",1);
}elseif(!$styletype){
	$styletype=0;
}
require_once(html("login_tpl/$styletype"));
$show=ob_get_contents();
ob_end_clean();
$show=str_replace(array("\n","\r","<!---->","'"),array("","","","\'"),$show);
if($webdb[www_url]=='/.'){
	$show=str_replace('/./','/',$show);
}

if($iframeID){	//��ܷ�ʽ����������ҳ����ٶ�,�Ƽ�
	//�����������
	if($webdb[cookieDomain]){
		echo "<SCRIPT LANGUAGE=\"JavaScript\">document.domain = \"$webdb[cookieDomain]\";</SCRIPT>";
	}
	echo "<SCRIPT LANGUAGE=\"JavaScript\">
	parent.document.getElementById('$iframeID').innerHTML='$show';
	</SCRIPT>";
}else{			//JSʽ��������ҳ����ٶ�,���Ƽ�
	echo "document.write('$show');";
}

?>