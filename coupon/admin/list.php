<?php
!function_exists('html') && exit('ERR');

ck_power('list');

$linkdb=array(
			"全部信息"=>"$admin_path&job=list",
			"已审核的信息"=>"$admin_path&job=list&type=yz&fid=$fid",
			"未审核的信息"=>"$admin_path&job=list&type=unyz&fid=$fid",
			"回收站的信息"=>"$admin_path&job=list&type=del&fid=$fid",
			"推荐信息"=>"$admin_path&job=list&type=levels&fid=$fid",
			);

$fid=intval($fid);

if($job=="list")
{
	$SQL=" WHERE 1 ";
	if($fid>0){
		$SQL.=" AND fid=$fid ";
	}
	
	if($type=="yz"){
		$SQL.=" AND yz=1 ";
	}
	elseif($type=="unyz"){
		$SQL.=" AND yz=0 ";
	}
	elseif($type=="del"){
		$SQL.=" AND yz=2 ";
	}
	elseif($type=="levels"){
		$SQL.=" AND levels=1 ";
	}
	elseif($type=="unlevels"){
		$SQL.=" AND levels=0 ";
	}
	elseif($type=="pic"){
		$SQL.=" AND ispic=1 ";
	}
	elseif($type=="my"){
		$SQL.=" AND uid='$userdb[uid]' ";
	}
	elseif($type=="title"){
		$SQL.=" AND binary title LIKE '%$keyword%' ";
	}
	elseif($type=="id"){
		$SQL.=" AND id='$keyword' ";
	}
	elseif($type=="username"){
		@extract($db->get_one("SELECT uid FROM {$pre}memberdata WHERE username='$keyword' "));
		if(!$uid){
			showerr("用户不存在!");
		}
		$SQL.=" AND uid=$uid ";
	}

	$rows=30;
	if($page<1){
		$page=1;
	}
	$min=($page-1)*$rows;

	$query=$db->query("SELECT SQL_CALC_FOUND_ROWS * FROM {$_pre}content $SQL ORDER BY id DESC LIMIT $min,$rows");
	$RS=$db->get_one("SELECT FOUND_ROWS()");
	$showpage=getpage('','',"$admin_path&job=list&fid=$fid&type=$type&keyword=".urlencode($keyword),$rows,$RS['FOUND_ROWS()']);
	while($rs=$db->fetch_array($query))
	{
		if(!$rs[yz]){
			$rs[ischeck]="<A HREF='$admin_path&action=work&id=$rs[id]&jobs=yz' style='color:black;'>未审核</A>";
		}elseif( $rs[yz]==1){
			$rs[ischeck]="<A HREF='$admin_path&action=work&id=$rs[id]&jobs=unyz' style='color:blue;'>已审核</A>";
		}elseif( $rs[yz]==2 ){
			$rs[ischeck]="<A HREF='$admin_path&action=work&id=$rs[id]&jobs=undel' style='color:blue;'>作废</A>";
		}
		if(!$rs[levels]){
			$rs[iscom]="<A HREF='$admin_path&action=work&id=$rs[id]&jobs=com&levels=1' style=''>未推荐</A>";
		}else{
			$rs[iscom]="<A HREF='$admin_path&action=work&id=$rs[id]&jobs=uncom&levels=0' style='color:red;'>已推荐</A>";
		}
		$rs[title2]=urlencode($rs[title]);
		$rs[posttime]=date("m-d",$rs[posttime]);

		$listdb[$rs[id]]=$rs;
	}

	get_admin_html('list');
}
elseif($job=="work")
{
	if(!$listdb){
		showerr("请选择一条信息");
	}
	if($jobs=="move"){
		$sort_fid=$Guidedb->Select("{$_pre}sort","fid");
	}

	get_admin_html('work');
}
elseif($action=="work")
{
	if(!$listdb&&!$id){
		showerr("请选择一条信息");
	}
	elseif(is_array($listdb))
	{
		foreach($listdb AS $key=>$value){
			M_dowork($key,$jobs);
		}
	}
	elseif($id){
		M_dowork($id,$jobs);
	}
	$url=$fromurl?$fromurl:$FROMURL;
	refreshto($url,"操作成功",0);
}


function M_dowork($id,$job){
	global $db,$_pre,$timestamp,$userdb,$webdb,$Fid_db;
	$RS=$db->get_one("SELECT fid FROM {$_pre}db WHERE id='$id'");

	$rsdb=$db->get_one("SELECT * FROM {$_pre}content WHERE id='$id' ");
	if($job=="delete")
	{
		del_info($id,$rsdb);

		//$db->query(" UPDATE `{$_pre}sort` SET contents=contents-1 WHERE fid='$rsdb[fid]' ");
		//$db->query(" UPDATE `{$_pre}sort` SET contents=contents-1 WHERE fid='$fidDB[fup]' ");
	}
	elseif($job=="move")
	{
		global $fid;
		if($fid){
			$rs=$db->get_one("SELECT name,mid FROM {$_pre}sort WHERE fid='$fid'");
			if($rs[mid]==$rsdb[mid]){
				$db->query("UPDATE {$_pre}content SET fid='$fid',fname='$rs[name]',lastfid='$rsdb[fid]' WHERE id='$id' ");
				$db->query("UPDATE {$_pre}content_$rsdb[mid] SET fid='$fid' WHERE id='$id' ");
			}
		}
	}
	elseif($job=="color")
	{
		global $color;
		$db->query("UPDATE {$_pre}content SET titlecolor='$color' WHERE id='$id' ");
	}
	elseif($job=="yz")
	{
		$db->query("UPDATE {$_pre}content SET yz='1' WHERE id='$id' ");
	}
	elseif($job=="unyz")
	{
		$db->query("UPDATE {$_pre}content SET yz='0' WHERE id='$id' ");
	}
	elseif($job=="undel")
	{
		$db->query("UPDATE {$_pre}content SET yz='1' WHERE id='$id' ");
	}
	elseif($job=="com")
	{
		$db->query("UPDATE {$_pre}content SET levels='1',levelstime='$timestamp' WHERE id='$id' ");
	}
	elseif($job=="uncom")
	{
		$db->query("UPDATE {$_pre}content SET levels='0',levelstime='0' WHERE id='$id' ");
	}
	elseif($job=="unyz")
	{
		$db->query("UPDATE {$_pre}content SET levels='0',levelstime='0' WHERE id='$id' ");
	}
	elseif($job=="top")
	{
		global $toptime;
		$db->query("UPDATE {$_pre}content SET list=list+'$toptime' WHERE id='$id' ");
	}
	elseif($job=="untop")
	{
		$db->query("UPDATE {$_pre}content SET list='$timestamp' WHERE id='$id' ");
	}
}
?>