<?php
if(!function_exists('html')){
die('F');
}
if(!$lfjuid){
	showerr('请先登录');
}


$rs=$db->get_one("SELECT * FROM {$_pre}content WHERE id='$id'");
if($rs[uid]!=$lfjuid&&!$web_admin){
	showerr('你无权限');
}
$webdb[UpdatePostTime]>0 || $webdb[UpdatePostTime]=1;
if($timestamp-$rs[posttime]<(3600*$webdb[UpdatePostTime])){
	showerr("距离上次更新时间{$webdb[UpdatePostTime]}小时后,才可以操作!");
}
if($rs['list']>$timestamp){
	$list=$rs['list'];
}else{
	$list=$timestamp;
}
$db->query("UPDATE {$_pre}content SET list='$list',posttime='$timestamp' WHERE id='$id'");
refreshto("$FROMURL","操作成功,本条信息被顶在列表页的前面了!",1);
?>