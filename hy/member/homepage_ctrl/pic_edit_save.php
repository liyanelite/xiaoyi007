<?php
//�޸�ͼƬ POST

if(count($pids)<1) showerr("����ѡ��һ��");
foreach($pids as $pid){
	if($pid){
		//ִ��
		$db->query("update {$_pre}pic set title='".get_word(htmlspecialchars($title[$pid]),32)."',orderlist='".intval($orderlist[$pid])."' where pid='$pid' AND uid='$uid' limit 1");
	}
}
refreshto("?atn=piclist&psid=$psid&uid=$uid","����ɹ�");

?>