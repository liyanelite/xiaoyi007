<?php
if(!function_exists('html')){
die('F');
}
if(!$lfjuid){
	showerr('���ȵ�¼');
}


$rs=$db->get_one("SELECT * FROM {$_pre}content WHERE id='$id'");
if($rs[uid]!=$lfjuid&&!$web_admin){
	showerr('����Ȩ��');
}
$webdb[UpdatePostTime]>0 || $webdb[UpdatePostTime]=1;
if($timestamp-$rs[posttime]<(3600*$webdb[UpdatePostTime])){
	showerr("�����ϴθ���ʱ��{$webdb[UpdatePostTime]}Сʱ��,�ſ��Բ���!");
}
if($rs['list']>$timestamp){
	$list=$rs['list'];
}else{
	$list=$timestamp;
}
$db->query("UPDATE {$_pre}content SET list='$list',posttime='$timestamp' WHERE id='$id'");
refreshto("$FROMURL","�����ɹ�,������Ϣ�������б�ҳ��ǰ����!",1);
?>