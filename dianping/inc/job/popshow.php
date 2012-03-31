<?php
if(!function_exists('html')){
die('F');
}
if(!$lfjuid){
	showerr('请先登录');
}

$rs=$db->get_one("SELECT admin FROM {$pre}city WHERE fid='$city_id'");
$detail=explode(',',$rs[admin]);
if(in_array($lfjid,$detail)){
	$web_admin=1;
}

$_erp=$Fid_db[tableid][$fid];
$rs=$db->get_one("SELECT * FROM {$_pre}content$_erp WHERE id='$id'");
$fidDB=$db->get_one("SELECT * FROM {$_pre}sort WHERE fid='$rs[fid]'");
if($rs[uid]!=$lfjuid&&!$web_admin){
	showerr('你没权限');
}
$lfjdb[money]=intval(get_money($lfjuid));

if($type==1){
	$money=$webdb[AdInfoIndexShow];
}elseif($type==2){
	$money=$webdb[AdInfoBigsortShow];
}elseif($type==3){
	$money=$webdb[AdInfoSortShow];
}else{
	$money=0;
}

if(!$web_admin){
	if($lfjdb[money]<$money){
		showerr("你的积分不足:$money,不能选择焦点显示");
	}
	add_user($lfjuid,-intval($money));
}


$endtime=$timestamp+$webdb[AdInfoShowTime]*24*3600;
if($type==1){
	$db->query("INSERT INTO `{$_pre}buyad` (`sortid`, `cityid`, `id`, `mid`, `uid`, `begintime`, `endtime`, `money`, `hits`) VALUES ('-1','$rs[city_id]','$id','$rs[mid]','$rs[uid]','$timestamp','$endtime','$money','')");
}elseif($type==2){
	$db->query("INSERT INTO `{$_pre}buyad` (`sortid`, `cityid`, `id`, `mid`, `uid`, `begintime`, `endtime`, `money`, `hits`) VALUES ('$fidDB[fup]','$rs[city_id]','$id','$rs[mid]','$rs[uid]','$timestamp','$endtime','$money','')");
}elseif($type==3){
	$db->query("INSERT INTO `{$_pre}buyad` (`sortid`, `cityid`, `id`, `mid`, `uid`, `begintime`, `endtime`, `money`, `hits`) VALUES ('$rs[fid]','$rs[city_id]','$id','$rs[mid]','$rs[uid]','$timestamp','$endtime','$money','')");
}
refreshto("$FROMURL","焦点显示设置成功",1);
?>