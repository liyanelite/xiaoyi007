<?php
require_once("global.php");

if(!$lfjuid){
	showerr('你还没有登录!!');
}

$fidDB=$db->get_one("SELECT A.* FROM {$_pre}sort A WHERE A.fid='$fid'");

if(!$fidDB){
	showerr("FID有误!");
}


$infodb=$db->get_one("SELECT B.*,A.*,D.email FROM `{$_pre}content` A LEFT JOIN `{$_pre}content_$fidDB[mid]` B ON A.id=B.id LEFT JOIN `{$pre}memberdata` D ON A.uid=D.uid WHERE A.id='$cid'");


if(!$infodb){
	showerr("内容不存在");
}elseif($infodb[fid]!=$fid){
	showerr("FID有误!!!");
}


$totalmoney = number_format($shopnum*$infodb[price],2);


$mid=2;

/**
*模块参数配置文件
**/
$field_db = $module_DB[$mid][field];


/**处理提交的新发表内容**/
if($action=="postnew")
{
	if($shopnum<1){
		showerr("订购的产品不能小于一件!");
	}

	//自定义字段的合法检查与数据处理
	$Module_db->checkpost($field_db,$postdb,'');

	$rs=$db->get_one("SELECT * FROM `{$pre}purse` WHERE uid='$infodb[uid]'");
	$array=unserialize($rs[config]);
	if($postdb[order_sendtype]==2){			//平邮
		$totalmoney+=$array[slow_send];
	}elseif($postdb[order_sendtype]==3){	//快递
		$totalmoney+=$array[norm_send];
	}elseif($postdb[order_sendtype]==4){	//EMS
		$totalmoney+=$array[ems_send];
	}

	/*往主信息表插入内容*/
	$db->query("INSERT INTO `{$_pre}join` ( `mid` , `cid` , `cuid` , `fid` ,  `posttime` ,  `uid` , `username` , `yz` , `ip` , `shopnum` , `totalmoney`) 
	VALUES (
	'$mid','$cid','$infodb[uid]', '$fid','$timestamp','$lfjdb[uid]','$lfjdb[username]','0','$onlineip','$shopnum','$totalmoney')");

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

	$db->query("INSERT INTO `{$_pre}content_$mid` SET $sql");

	//$db->query("UPDATE {$_pre}content SET totaluser=totaluser+1 WHERE id='$cid'");
	


	if($webdb[order_send_mail]){
		send_mail($infodb[email],"你有客户下订单了","请尽快查看<A HREF='$Murl/member/joinshow.php?fid=$fid&id=$id' target='_blank'>$Murl/member/joinshow.php?fid=$fid&id=$id</A>",0);
	}
	if($webdb[order_send_msg]){
		send_msg($infodb[uid],"你有客户下订单了","请尽快查看<A HREF='$Murl/member/joinshow.php?fid=$fid&id=$id' target='_blank'>$Murl/member/joinshow.php?fid=$fid&id=$id</A>");
	}

	if($webdb[order_send_sms]){
		$rs=$db->get_one("SELECT mobphone FROM {$pre}memberdata WHERE uid='$infodb[uid]'");
		if($rs[mobphone]){
			$content=get_word("你有客户下订单了:$infodb[title]",68);
			sms_send($rs[mobphone],$content);
		}
	}

	//在线支付
	if($postdb['order_paytype']==4){
		header("location:olpay.php?id=$id&fid=$fid");
		exit;
	}else{
		refreshto("bencandy.php?city_id=$infodb[city_id]&fid=$fid&id=$cid","订购成功,请等待发货!");
	}	
}

/*删除内容,直接删除,不保留*/
elseif($action=="del")
{
	del_order($id);
	refreshto($FROMURL,"删除成功");
}

/*编辑内容*/
elseif($job=="edit")
{
	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}join` A LEFT JOIN `{$_pre}content_$mid` B ON A.id=B.id WHERE A.id='$id'");

	if($rsdb[uid]!=$lfjuid&&!$web_admin)
	{
		showerr("你无权修改");
	}

	$hownum=$rsdb[shopnum];

	/*表单默认变量作处理*/
	$Module_db->formGetVale($field_db,$rsdb);

	$atc="edit";	

	require(ROOT_PATH."inc/head.php");
	require(getTpl("post_$mid",$FidTpl['post']));
	require(ROOT_PATH."inc/foot.php");
}

/*处理提交的内容做修改*/
elseif($action=="edit")
{
	if($shopnum<1){
		showerr("订购的产品不能小于一件!");
	}
	$rsdb=$db->get_one("SELECT A.*,B.* FROM `{$_pre}join` A LEFT JOIN `{$_pre}content_$mid` B ON A.id=B.id WHERE A.id='$id' LIMIT 1");

	if($rsdb[uid]!=$lfjuid&&!$web_admin)
	{
		showerr("你无权修改");
	}

	//自定义字段的合法检查与数据处理
	$Module_db->checkpost($field_db,$postdb,$rsdb);


	/*更新主信息表内容*/
	//$db->query("UPDATE `{$_pre}join` SET title='$postdb[title]' WHERE id='$id'");


	/*检查判断辅信息表要插入哪些字段的内容*/
	unset($sqldb);
	foreach( $field_db AS $key=>$value){
		$sqldb[]="`$key`='{$postdb[$key]}'";
	}	
	$sql=implode(",",$sqldb);

	/*更新辅信息表*/
	$db->query("UPDATE `{$_pre}content_$mid` SET $sql WHERE id='$id'");
	$db->query("UPDATE `{$_pre}join` SET shopnum='$shopnum' WHERE id='$id'");
	
	refreshto("bencandy.php?city_id=$infodb[city_id]&fid=$fid&id=$cid","修改成功");
}
else
{
	if(!$web_admin && $infodb[uid]==$lfjuid){
		showerr("你不能订购自己发布的产品!");
	}
	/*模块设置时,有些字段有默认值*/
	foreach( $field_db AS $key=>$rs){	
		if($rs[form_value]){		
			$rsdb[$key]=$rs[form_value];
		}
	}

	$rs=$db->get_one("SELECT * FROM `{$pre}purse` WHERE uid='$infodb[uid]'");
	$conf=unserialize($rs[config]);

	$conf[norm_send] = intval($conf[norm_send]);
	$conf[ems_send] = intval($conf[ems_send]);

	/*表单默认变量作处理*/
	$Module_db->formGetVale($field_db,$rsdb);

	$atc="postnew";

	require(ROOT_PATH."inc/head.php");
	require(getTpl("post_$mid"));
	require(ROOT_PATH."inc/foot.php");
}

?>