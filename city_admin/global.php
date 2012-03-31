<?php
define('Memberpath',dirname(__FILE__).'/');
require(Memberpath."../inc/common.inc.php");



if(!$webdb[web_open])
{
	$webdb[close_why] = str_replace("\n","<br>",$webdb[close_why]);
	showerr("网站暂时关闭:$webdb[close_why]");
}


if(!$lfjid){
	showerr("你还没登录");
}elseif($_GET['admin_city']){
	if(!$city_DB[name][$_GET['admin_city']]){
		showerr('当前城市不存在');
	}
	setcookie('admin_cityid',$_GET['admin_city']);
	$_COOKIE['admin_cityid']=$_GET['admin_city'];
}
elseif(!$_COOKIE['admin_cityid']){
	if(count($city_DB[name])<2){
		showerr('单城市版没有城市管理功能!');
	}
	$show='';
	$query = $db->query("SELECT * FROM {$pre}city ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		$detail=explode(',',$rs[admin]);
		if($web_admin || in_array($lfjid,$detail)){
			$show.="<option value='$rs[fid]'>$rs[name]</option>";
		}
	}
	showerr("<select name='select' onChange=\"window.location.href='$webdb[_www_url]/city_admin/?admin_city='+this.options[this.selectedIndex].value\"><option value=''>请选择一个你要管理的城市</option>$show</select>");
}
if($city_id=$_COOKIE['admin_cityid']){
	$cityDB=$db->get_one("SELECT * FROM {$pre}city WHERE fid='$city_id'");
	$detail=explode(',',$cityDB[admin]);
	if(!$web_admin&&!in_array($lfjid,$detail)){
		setcookie('admin_cityid','');
		showerr("<A HREF='?'>你不是本城市的管理员,点击返回选择城市!</A>");
	}
}else{
	showerr('出错了!!');
}


$id=intval($id);
$aid=intval($aid);
$tid=intval($tid);

?>