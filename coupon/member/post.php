<?php
require_once(dirname(__FILE__)."/global.php");

/**
*获取栏目配置文件
**/
$fidDB=$db->get_one("SELECT * FROM {$_pre}sort WHERE fid='$fid'");

if(!$fidDB){
	showerr('栏目不存在！');
}

$rs=$db->get_one("SELECT admin FROM {$pre}city WHERE fid='$city_id'");
$detail=explode(',',$rs[admin]);
if($lfjid && in_array($lfjid,$detail)){
	$web_admin=1;
}

/**
*模型参数配置文件
**/
$field_db = $module_DB[$fidDB[mid]][field];

if(!$lfjuid){
	showerr('你还没有登录!');
}elseif($fidDB[type]){
	showerr("大分类,不允许发表内容");
}


if($action=="postnew"||$action=="edit"){
	$postdb['title']=filtrate($postdb['title']);
}

/**处理提交的新发表内容**/
if($action=="postnew")
{
	/*验证码处理*/
	if(!$web_admin){
		if(!check_imgnum($yzimg)){		
			showerr("验证码不符合,发布失败");
		}
	}

	if(!$web_admin){
		if($groupdb[post_coupon_num]<1){
			showerr('你所在用户组不允许发布促销信息,请升级用户组吧');
		}
		$_rs=$db->get_one("SELECT COUNT(*) AS NUM FROM `{$_pre}content` WHERE uid='$lfjuid'");
		if($_rs[NUM]>$groupdb[post_coupon_num]){
			showerr("你所在用户组发布的促销信息不能超过{$groupdb[post_coupon_num]}个,请升级用户组吧");
		}
	}

	if(!$postdb[title]){
		showerr("标题不能为空");
	}elseif(strlen($postdb[title])>80){
		showerr("标题不能大于40个汉字.");
	}
	if(eregi("[a-z0-9]{15,}",$postdb[title])){
		showerr("请认真写好标题!");
	}

	
	//自定义字段进行校正检查是否合法
	$Module_db->checkpost($field_db,$postdb,'');

	if(is_file(ROOT_PATH."$webdb[updir]/$postdb[picurl]")){

		gdpic(ROOT_PATH."$webdb[updir]/$postdb[picurl]",ROOT_PATH."$webdb[updir]/{$postdb[picurl]}.jpg",300,225,array('fix'=>1));
		if(is_file(ROOT_PATH."$webdb[updir]/{$postdb[picurl]}.jpg")){
			$postdb[picurl].=".jpg";
		}
	}


	$postdb[ispic]=$postdb[picurl]?1:0;

	//是否自动通过审核
	$web_admin && $groupdb[shop_postauto_yz]=1;
	$postdb[yz] = $groupdb[shop_postauto_yz];

	/*往标题表插入内容*/
	$db->query("INSERT INTO `{$_pre}content` (`title` , `mid` , `fid` , `fname` , `posttime` , `list` , `uid` , `username` ,  `picurl` , `ispic` , `yz` ,  `keywords` , `ip` ,  `money` , `city_id`) VALUES  ('$postdb[title]','$fidDB[mid]','$fid','$fidDB[name]','$timestamp','$timestamp','$lfjdb[uid]','$lfjdb[username]','$postdb[picurl]','$postdb[ispic]','$postdb[yz]','$postdb[keywords]','$onlineip','$postdb[money]','$city_id')");

	$id = $db->insert_id();

	unset($sqldb);
	$sqldb[]="id='$id'";
	$sqldb[]="fid='$fid'";
	$sqldb[]="uid='$lfjuid'";

	/*检查判断辅信息表要插入哪些字段的内容*/
	foreach( $field_db AS $key=>$value){
		isset($postdb[$key]) && $sqldb[]="`{$key}`='{$postdb[$key]}'";
	}

	$sql=implode(",",$sqldb);

	/*往辅信息表插入内容*/
	$db->query("INSERT INTO `{$_pre}content_$fidDB[mid]` SET $sql");

	refreshto("list.php?job=list","<a href='list.php?job=list'>返回列表</a> <a target='_blank' href='../bencandy.php?city_id=$city_id&fid=$fid&id=$id'>查看效果</a>",600);

}

/*删除内容,直接删除,不保留*/
elseif($action=="del")
{

	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}content` A LEFT JOIN `{$_pre}content_$fidDB[mid]` B ON A.id=B.id WHERE A.id='$id'");

	if($rsdb[fid]!=$fidDB[fid])
	{
		showerr("栏目有问题");
	}
	if($rsdb[uid]!=$lfjuid&&!$web_admin)
	{
		showerr("你没权限!");
	}

	del_info($id,$rsdb);

	refreshto($FROMURL,"删除成功");
}

/*编辑内容*/
elseif($job=="edit")
{

	$rsdb=$db->get_one("SELECT B.*,A.* FROM `{$_pre}content` A LEFT JOIN `{$_pre}content_$fidDB[mid]` B ON A.id=B.id WHERE A.id='$id'");

	if($rsdb[uid]!=$lfjuid&&!$web_admin){	
		showerr('你没权限!');
	}
	
	/*表单默认变量作处理*/
	$Module_db->formGetVale($field_db,$rsdb);

	$atc="edit";


	require(ROOT_PATH."member/head.php");
	require(getTpl("post_$fidDB[mid]"));
	require(ROOT_PATH."member/foot.php");
}

/*处理提交的内容做修改*/
elseif($action=="edit")
{
	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}content` A LEFT JOIN `{$_pre}content_$fidDB[mid]` B ON A.id=B.id WHERE A.id='$id'");

	if($rsdb[uid]!=$lfjuid&&!$web_admin){
		showerr("你无权修改");
	}

	if(!$postdb[title]){	
		showerr("标题不能为空");
	}

	
	//自定义字段进行校正检查是否合法
	$Module_db->checkpost($field_db,$postdb,$rsdb);

	if(is_file(ROOT_PATH."$webdb[updir]/$postdb[picurl]")&&substr($postdb[picurl],-8,1)!='.'){

		gdpic(ROOT_PATH."$webdb[updir]/$postdb[picurl]",ROOT_PATH."$webdb[updir]/{$postdb[picurl]}.jpg",300,225,array('fix'=>1));
		if(is_file(ROOT_PATH."$webdb[updir]/{$postdb[picurl]}.jpg")){
			$postdb[picurl].=".jpg";
		}
	}

	/*判断是否为图片主题*/
	$postdb[ispic]=$postdb[picurl]?1:0;


	/*更新主信息表内容*/
	$db->query("UPDATE `{$_pre}content` SET title='$postdb[title]',keywords='$postdb[keywords]',picurl='$postdb[picurl]',ispic='$postdb[ispic]',money='$postdb[money]' WHERE id='$id'");



	/*检查判断辅信息表要插入哪些字段的内容*/
	unset($sqldb);
	foreach( $field_db AS $key=>$value){
		$sqldb[]="`$key`='{$postdb[$key]}'";
	}	
	$sql=implode(",",$sqldb);

	/*更新辅信息表*/
	$db->query("UPDATE `{$_pre}content_$fidDB[mid]` SET $sql WHERE id='$id'");


	refreshto("list.php?job=list","<a href='list.php?job=list'>返回列表</a> <a target='_blank' href='../bencandy.php?city_id=$rsdb[city_id]&fid=$fid&id=$id'>查看效果</a>",600);

}
else
{
	/*模块设置时,有些字段有默认值*/
	foreach( $field_db AS $key=>$rs){	
		if($rs[form_value]){		
			$rsdb[$key]=$rs[form_value];
		}
	}

	/*表单默认变量作处理*/
	$Module_db->formGetVale($field_db,$rsdb);

	$atc="postnew";

	require(ROOT_PATH."member/head.php");
	require(getTpl("post_$fidDB[mid]"));
	require(ROOT_PATH."member/foot.php");

}

?>