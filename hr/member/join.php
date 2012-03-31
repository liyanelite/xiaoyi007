<?php
require_once("global.php");

if(!$lfjid)
{
	showerr("你还没有登录");
}

if(!$action&&$lfjuid){
	if($rs=$db->get_one("SELECT * FROM {$_pre}person WHERE uid='$lfjuid'")){
		$job = 'edit';
		$id = $rs[id];
	}else{
		$job = 'postnew';
	}
}

$mid=2;

/**
*模块参数配置文件
**/
$field_db = $module_DB[$mid][field];


if($action=="yz"){
	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}person` A LEFT JOIN `{$_pre}content_$mid` B ON A.id=B.id WHERE A.id='$id'");

	if(!$web_admin)
	{
		showerr("你无权操作!!");
	}
	$yz=$rsdb[yz]?0:1;
	$db->query("UPDATE `{$_pre}person` SET yz='$yz' WHERE id='$id'");
	refreshto("$FROMURL","",0);

}elseif($action=="postnew"){

	$postdb[yz]=0;

	//自定义字段的合法检查与数据处理
	$Module_db->checkpost($field_db,$postdb,'');


	/*往主信息表插入内容*/
	$db->query("INSERT INTO `{$_pre}person` ( `mid` , `posttime` ,  `uid` , `username` , `yz` , `ip` , `city_id`) 
	VALUES (
	'$mid','$timestamp','$lfjdb[uid]','$lfjdb[username]','$postdb[yz]','$onlineip','$city_id')");

	$id = $db->insert_id();

	unset($sqldb);
	$sqldb[]="id='$id'";
	$sqldb[]="uid='$lfjuid'";

	
	/*检查判断辅信息表要插入哪些字段的内容*/
	foreach( $field_db AS $key=>$value){
		isset($postdb[$key]) && $sqldb[]="`{$key}`='{$postdb[$key]}'";
	}

	$sql=implode(",",$sqldb);

	$db->query("INSERT INTO `{$_pre}content_$mid` SET $sql");
	
	refreshto('?',"<A HREF=\"?\">修改一下</A> <A HREF=\"../joinshow.php?id=$id\" target='_blank'>查看效果</A>",300);
}

/*删除内容,直接删除,不保留*/
elseif($action=="del")
{
	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}person` A LEFT JOIN `{$_pre}content_$mid` B ON A.id=B.id WHERE A.id='$id'");

	if($rsdb[uid]!=$lfjuid&&!$web_admin)
	{
		showerr("你无权操作");
	}
	$db->query("DELETE FROM `{$_pre}content_$mid` WHERE id='$id' ");
	$db->query("DELETE FROM `{$_pre}person` WHERE id='$id' ");
	refreshto("bencandy.php?fid=$fid&id=$cid","删除成功");
}

/*编辑内容*/
elseif($job=="edit")
{
	$SQL = $id ? " A.id='$id' " : " A.uid='$lfjuid' ";
	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}person` A LEFT JOIN `{$_pre}content_$mid` B ON A.id=B.id WHERE $SQL");

	if($rsdb[uid]!=$lfjuid&&!$web_admin)
	{
		showerr("你无权修改");
	}

	/*表单默认变量作处理*/
	$Module_db->formGetVale($field_db,$rsdb);

	$atc="edit";	

	require(ROOT_PATH."member/head.php");
	require(getTpl("post_$mid"));
	require(ROOT_PATH."member/foot.php");
}

/*处理提交的内容做修改*/
elseif($action=="edit")
{
	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}person` A LEFT JOIN `{$_pre}content_$mid` B ON A.id=B.id WHERE A.id='$id' LIMIT 1");

	if($rsdb[uid]!=$lfjuid&&!$web_admin)
	{
		showerr("你无权修改");
	}

	//自定义字段的合法检查与数据处理
	$Module_db->checkpost($field_db,$postdb,$rsdb);


	/*检查判断辅信息表要插入哪些字段的内容*/
	unset($sqldb);
	foreach( $field_db AS $key=>$value){
		$sqldb[]="`$key`='{$postdb[$key]}'";
	}	
	$sql=implode(",",$sqldb);

	/*更新辅信息表*/
	
	$db->query("UPDATE `{$_pre}person` SET city_id='$city_id',posttime='$timestamp' WHERE id='$id'");
	$db->query("UPDATE `{$_pre}content_$mid` SET $sql WHERE id='$id'");
	
	refreshto($FROMURL,"<A HREF=\"$FROMURL\">继续修改</A> <A HREF=\"../joinshow.php?id=$id\" target='_blank'>查看效果</A>",300);
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
	require(getTpl("post_$mid"));
	require(ROOT_PATH."member/foot.php");
}

?>