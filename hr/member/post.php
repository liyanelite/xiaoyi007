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
	$postdb['keywords']=filtrate($postdb['keywords']);
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

	if(!$postdb[title]){
		showerr("职位名称不能为空");
	}elseif(strlen($postdb[title])>80){
		showerr("职位名称不能大于40个汉字.");
	}
	if(eregi("[a-z0-9]{15,}",$postdb[title])){
		showerr("请认真写好职位名称!");
	}
	if(!$postdb[nums]){
		showerr("招聘人数不能为空");
	}

	
	//自定义字段进行校正检查是否合法
	$Module_db->checkpost($field_db,$postdb,'');


	$postdb[ispic]=$postdb[picurl]?1:0;

	if(!$web_admin){
		if($groupdb[post_hr_num]<1){
			showerr('你所在用户组不允许发布招聘信息,请升级用户组吧');
		}
		$_rs=$db->get_one("SELECT COUNT(*) AS NUM FROM `{$_pre}content` WHERE uid='$lfjuid'");
		if($_rs[NUM]>$groupdb[post_hr_num]){
			showerr('你所在用户组每天发布的招聘信息不能超过{$groupdb[post_hr_num]}条,请升级用户组吧');
		}
	}

	$postdb[yz]=1;

	/*往标题表插入内容*/
	$db->query("INSERT INTO `{$_pre}content` (`title` , `mid` , `fid` , `fname` , `posttime` , `list` , `uid` , `username` ,  `city_id` , `yz` ,  `keywords` , `ip`  ) VALUES  ('$postdb[title]','$fidDB[mid]','$fid','$fidDB[name]','$timestamp','$timestamp','$lfjdb[uid]','$lfjdb[username]','$city_id','$postdb[yz]','$postdb[keywords]','$onlineip')");

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

	refreshto($FROMURL,"<a href='$FROMURL'>继续发布</a> <a href='../bencandy.php?fid=$fid&id=$id' target='_blank'>查看效果</a>",600);

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
	require(getTpl("post_$fidDB[mid]",$FidTpl['post']));
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


	/*更新主信息表内容*/
	$db->query("UPDATE `{$_pre}content` SET title='$postdb[title]',keywords='$postdb[keywords]',city_id='$city_id' WHERE id='$id'");



	/*检查判断辅信息表要插入哪些字段的内容*/
	unset($sqldb);
	foreach( $field_db AS $key=>$value){
		$sqldb[]="`$key`='{$postdb[$key]}'";
	}	
	$sql=implode(",",$sqldb);

	/*更新辅信息表*/
	$db->query("UPDATE `{$_pre}content_$fidDB[mid]` SET $sql WHERE id='$id'");


	refreshto($FROMURL,"<a href='$FROMURL'>继续修改</a> <a href='../bencandy.php?fid=$fid&id=$id' target='_blank'>查看效果</a>",600);
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
	require(getTpl("post_$fidDB[mid]",$FidTpl['post']));
	require(ROOT_PATH."member/foot.php");
}




?>