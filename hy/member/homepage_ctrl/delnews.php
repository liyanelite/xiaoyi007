<?php
//ɾ������

$rsdb=$db->get_one("SELECT * FROM `{$_pre}news` WHERE id='$id' ");
if($rsdb[uid]!=$uid)
{
	showerr("����Ȩɾ�����˵�����");
}
//ɾ������
delete_attachment($rsdb[uid],$rsdb[content]);
//ɾ������
delete_attachment($rsdb[uid],tempdir($rsdb[picurl]) );
$db->query("DELETE FROM `{$_pre}news` WHERE id='$id' AND uid='$uid'");
refreshto("?uid=$uid&atn=news","ɾ���ɹ�");

?>