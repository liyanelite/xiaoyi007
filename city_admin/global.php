<?php
define('Memberpath',dirname(__FILE__).'/');
require(Memberpath."../inc/common.inc.php");



if(!$webdb[web_open])
{
	$webdb[close_why] = str_replace("\n","<br>",$webdb[close_why]);
	showerr("��վ��ʱ�ر�:$webdb[close_why]");
}


if(!$lfjid){
	showerr("�㻹û��¼");
}elseif($_GET['admin_city']){
	if(!$city_DB[name][$_GET['admin_city']]){
		showerr('��ǰ���в�����');
	}
	setcookie('admin_cityid',$_GET['admin_city']);
	$_COOKIE['admin_cityid']=$_GET['admin_city'];
}
elseif(!$_COOKIE['admin_cityid']){
	if(count($city_DB[name])<2){
		showerr('�����а�û�г��й�����!');
	}
	$show='';
	$query = $db->query("SELECT * FROM {$pre}city ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		$detail=explode(',',$rs[admin]);
		if($web_admin || in_array($lfjid,$detail)){
			$show.="<option value='$rs[fid]'>$rs[name]</option>";
		}
	}
	showerr("<select name='select' onChange=\"window.location.href='$webdb[_www_url]/city_admin/?admin_city='+this.options[this.selectedIndex].value\"><option value=''>��ѡ��һ����Ҫ����ĳ���</option>$show</select>");
}
if($city_id=$_COOKIE['admin_cityid']){
	$cityDB=$db->get_one("SELECT * FROM {$pre}city WHERE fid='$city_id'");
	$detail=explode(',',$cityDB[admin]);
	if(!$web_admin&&!in_array($lfjid,$detail)){
		setcookie('admin_cityid','');
		showerr("<A HREF='?'>�㲻�Ǳ����еĹ���Ա,�������ѡ�����!</A>");
	}
}else{
	showerr('������!!');
}


$id=intval($id);
$aid=intval($aid);
$tid=intval($tid);

?>