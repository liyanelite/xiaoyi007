<?php
//���÷��� 

if(count($pids)<1) showerr("��ѡ��һ��ͼƬ");
if(!$psid) showerr("��ָ��һ��ͼ��");

foreach($pids as $pid){
	if($pid){
		$rt=$db->get_one("SELECT url FROM {$_pre}pic WHERE pid='$pid'");
		$db->query("UPDATE {$_pre}picsort SET faceurl='$rt[url]' WHERE psid='$psid' AND uid='$uid'");
		break;
	}
}
refreshto("?atn=piclist&psid=$psid&uid=$uid","���óɹ�");

?>