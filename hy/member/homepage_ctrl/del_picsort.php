<?php
//ɾ������

if(!$psid) showerr("����ʧ��");
	
$mypics=$db->get_one("SELECT count(*) AS num FROM {$_pre}pic WHERE psid='$psid'");
if($mypics[num]>0) showerr("�ǿ�ͼ��������ɾ��");
	
$db->query("DELETE FROM {$_pre}picsort WHERE psid='$psid' AND uid='$uid' LIMIT 1");
refreshto("?uid=$uid&atn=pic","ɾ���ɹ�");

?>