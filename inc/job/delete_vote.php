<?php
!function_exists('html') && exit('ERR');
if(!$lfjuid){
	showerr("���ȵ�¼!");
}
if(!$web_admin){
	$rs=$db->get_one("SELECT C.uid FROM `{$pre}vote_element` V LEFT JOIN `{$pre}vote_topic` C ON V.cid=C.cid WHERE V.id='$id'");
	if($rs[uid]!=$lfjuid||!$lfjuid){
		showerr("��ûȨ��!");
	}
}
$db->query("DELETE FROM `{$pre}vote_element` WHERE id='$id'");	
refreshto($FROMURL,"ɾ���ɹ�",1);
?>