<?php
if(!function_exists('html')){
die('F');
}


if(!$lfjuid){
	showerr("�οͲ��ܾٱ�,���ȵ�¼");
}
if($step==2)
{
	if(!check_imgnum($yzimg)){
		showerr("��֤�벻����");
	}
	$rs=$db->get_one("SELECT * FROM {$_pre}report WHERE uid='$lfjuid' ORDER BY rid DESC LIMIT 1");
	if( ($timestamp-$rs[posttime])<60 ){
		showerr("1������,�벻Ҫ�ظ��ٱ�");
	}
	if(strlen($content)>300){
		showerr("��ע��Ϣ���ܴ���150������");
	}
	$content=filtrate($content);
	$db->query("INSERT INTO `{$_pre}report` (`id`, `fid`, `uid`, `username`, `posttime`, `onlineip`, `type`,`content`) VALUES ('$id','$fid','$lfjuid','$lfjid','$timestamp','$onlineip','$type','$content')");

	refreshto("bencandy.php?fid=$fid&id=$id","�ٱ��ɹ�",1);
}
@include(Mpath."data/guide_fid.php");

$typedb[1]=' checked ';

$report_type=explode("\r\n","\r\n".$webdb[Info_ReportDB]);
unset($report_type[0]);

require(ROOT_PATH."inc/head.php");
require(getTpl("report"));
require(ROOT_PATH."inc/foot.php");
?>