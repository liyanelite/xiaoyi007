<?php
require_once("global.php");

if(!$lfjid)
{
	showerr("你还没有登录");
}

/**
*被选中的模块以红色字体显示
**/
$colordb[$mid]="red;";

$SQL=" WHERE uid='$lfjuid' ";


/**
*每页显示40条
**/
$rows=15;

if(!$page)
{
	$page=1;
}
$min=($page-1)*$rows;

/*分页功能*/
$showpage=getpage("{$_pre}db","$SQL","?","$rows");

$webdb[UpdatePostTime]>0 || $webdb[UpdatePostTime]=1;

unset($listdb,$i);

$query = $db->query("SELECT * FROM {$_pre}db $SQL ORDER BY id DESC LIMIT $min,$rows");
while($rs = $db->fetch_array($query))
{
	$_erp=$Fid_db[tableid][$rs[fid]];
	$rs=$db->get_one("SELECT * FROM {$_pre}content$_erp WHERE id='$rs[id]'");

	if($timestamp-$rs[posttime]<(3600*$webdb[UpdatePostTime])){
		$rs[update]='<A HREF="#" style="color:#ccc;" onclick="alert(\'距离上次更新时间'.$webdb[UpdatePostTime].'小时后,才可以进行刷新!\')">刷新</A>';
	}else{
		$rs[update]="<A HREF=\"../job.php?job=update&fid=$rs[fid]&id=$rs[id]\">刷新</A>";
	}
	if($rs['list']>$timestamp){
		$rs[dotop]='<A HREF="#" style="color:#ccc;" onclick="alert(\'已经置顶了\')">置顶</A>';
	}else{
		$rs[dotop]="<A HREF=\"../job.php?job=dotop&fid=$rs[fid]&id=$rs[id]\">置顶</A>";
	}
	$rs[pop1]="<A HREF=\"../job.php?job=popshow&type=1&fid=$rs[fid]&id=$rs[id]\">首页焦点</A>";	
	$rs[pop2]="<A HREF=\"../job.php?job=popshow&type=2&fid=$rs[fid]&id=$rs[id]\">栏目焦点</A>";
	$rs[pop3]="<A HREF=\"../job.php?job=popshow&type=3&fid=$rs[fid]&id=$rs[id]\">分类焦点</A>";
	$query2 = $db->query("SELECT * FROM `{$_pre}buyad` WHERE `id`='$rs[id]' AND `endtime`>'$timestamp'");
	while($rs2 = $db->fetch_array($query2)){
		if($rs2[sortid]==-1){
			$rs[pop1]='<A HREF="#" style="color:#ccc;" onclick="alert(\'已经首页焦点显示了\')">首页焦点</A>';
		}elseif($rs2[sortid]==$rs[fid]){
			$rs[pop3]='<A HREF="#" style="color:#ccc;" onclick="alert(\'已经栏目焦点显示了\')">分类焦点</A>';
		}elseif($rs2[sortid]){
			$rs[pop2]='<A HREF="#" style="color:#ccc;" onclick="alert(\'已经分类焦点显示了\')">栏目焦点</A>';
		}
	}
	$rs[posttime]=date("Y-m-d H:i:s",$rs[posttime]);

	$i++;
	$rs[cl]=$i%2==0?'t2':'t1';
	$rs[url]=get_info_url($rs[id],$rs[fid],$rs[city_id]);

	$listdb[]=$rs;
}
$lfjdb[money]=intval(get_money($lfjuid));

require(ROOT_PATH."member/head.php");
require(dirname(__FILE__)."/"."template/list.htm");
require(ROOT_PATH."member/foot.php");
?>