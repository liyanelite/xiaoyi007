<?php
if(!function_exists('html')){
die('F');
}
if(!$lfjuid){
	showerr('���ȵ�¼');
}

$rs=$db->get_one("SELECT admin FROM {$pre}city WHERE fid='$city_id'");
$detail=explode(',',$rs[admin]);
if(in_array($lfjid,$detail)){
	$web_admin=1;
}


$rs=$db->get_one("SELECT * FROM {$_pre}content WHERE id='$id'");
if($rs[uid]!=$lfjuid&&!$web_admin){
	showerr('��ûȨ��');
}
$list=$timestamp+3600*24*$webdb[Info_TopDay];
if(!$web_admin){
	$lfjdb[money]=intval(get_money($lfjuid));
	if($lfjdb[money]<$webdb[Info_TopMoney]){
		showerr("��Ļ��ֲ���:$webdb[Info_TopMoney],����ѡ���ö�");
	}
	add_user($lfjuid,-intval($webdb[Info_TopMoney]));
}
$db->query("UPDATE {$_pre}content SET list='$list' WHERE id='$id'");
refreshto("$FROMURL","�ö��ɹ�",1);
?>