<?php
!function_exists('html') && exit('ERR');

ck_power('list');

$fid=intval($fid);

if($job=="list")
{
	if($page<1){
		$page=1;
	}

	$rows=20;

	$min=($page-1)*$rows;

	$query = $db->query("SELECT A.*,B.title AS company FROM {$_pre}content A LEFT JOIN {$pre}hy_company B ON A.uid=B.uid ORDER BY A.id DESC LIMIT $min,$rows");
	while($rs = $db->fetch_array($query)){
		@extract($db->get_one("SELECT COUNT(*) AS NUM FROM {$_pre}apply WHERE cid='$rs[id]'"));
		$NUM=intval($NUM);
		if($NUM){
			$rs[joinnum] = "<A HREF='$admin_path&job=listmember&cid=$rs[id]'>{$NUM}人(查看)</A>";
		}else{
			$rs[joinnum] = 0;
		}
		$rs[posttime] = date('Y-m-d H:i:s',$rs[posttime]);
		$rs[ifcom] = $rs[levels]?"<A HREF='$admin_path&action=work&jobs=uncom&id=$rs[id]' style='color:red;'>已推荐</A>":"<A HREF='$admin_path&action=work&jobs=com&id=$rs[id]'>未推荐</A>";
		$listdb[]=$rs;
	}

	$showpage=getpage("","","$admin_path&",$rows,$totalNum);
	
	get_admin_html('list');
}

//列出某职位的所有应聘者
elseif($job=='listmember')
{
	$rows=20;

	if($page<1){
		$page=1;
	}
	$min=($page-1)*$Lrows;

	if($cid){
		$SQL=" WHERE B.cid='$cid' ";
		$ORDER=" B.id ";
	}else{
		$SQL=" ";
		$ORDER=" A.id ";
	}
	$query = $db->query("SELECT SQL_CALC_FOUND_ROWS C.*,C.id AS person_id,B.posttime,B.id AS apply_id,A.title,A.id,A.fid FROM {$_pre}apply B LEFT JOIN {$_pre}content_2 C ON B.join_id=C.id LEFT JOIN {$_pre}content A ON A.id=B.cid $SQL ORDER BY $ORDER DESC LIMIT $min,$rows");

	$RS=$db->get_one("SELECT FOUND_ROWS()");
	$totalNum=$RS['FOUND_ROWS()'];

	while($rs = $db->fetch_array($query)){

		$Module_db->showfield($module_DB[2]['field'],$rs,'list');
		$rs[username] || $rs[username] = $rs[ip];
		$rs[posttime] = date("m-d H:i",$rs[posttime]);
		$rs[del] = " <A HREF='$admin_path&job=delete_apply&id=$rs[apply_id]'>踢除</A>";
		$listdb[]=$rs;

	}

	get_admin_html('listmember');
}
//删除某职位的某位应聘者
elseif($job=='delete_apply')
{
	$db->query("DELETE FROM {$_pre}apply WHERE id='$id'");
	refreshto($FROMURL,'删除成功',0);
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
			dowork($key,$jobs);
		}
	}
	elseif($id){
		dowork($id,$jobs);
	}
	$url=$fromurl?$fromurl:$FROMURL;
	refreshto($url,"操作成功",0);
}


function dowork($id,$job){
	global $db,$_pre,$timestamp,$userdb,$webdb,$Fid_db;
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
		$db->query("UPDATE {$_pre}content SET yz='1',yzer='$userdb[username]',yztime='$timestamp' WHERE id='$id' ");
	}
	elseif($job=="unyz")
	{
		$db->query("UPDATE {$_pre}content SET yz='0',yzer='$userdb[username]',yztime='$timestamp' WHERE id='$id' ");
	}
	elseif($job=="undel")
	{
		$db->query("UPDATE {$_pre}content SET yz='1' WHERE id='$id' ");
	}
	elseif($job=="com")
	{
		$db->query("UPDATE {$_pre}content SET levels='1',levelstime='$timestamp'$SQL WHERE id='$id' ");
	}
	elseif($job=="uncom")
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
	elseif($job=="front")
	{
		global $topid;
		if($topid)
		{
			$rs=$db->get_one("SELECT list FROM {$_pre}content WHERE id='$topid' ");
			$list=$rs["list"]+1;
			$db->query("UPDATE {$_pre}content SET list='$list' WHERE id='$id' ");
		}
		else
		{
			$db->query("UPDATE {$_pre}content SET list='$timestamp' WHERE id='$id' ");
		}
	}
	elseif($job=="bottom")
	{
		global $bottomid;
		if($bottomid)
		{
			$rs=$db->get_one("SELECT list FROM {$_pre}content WHERE id='$bottomid' ");
			$list=$rs["list"]-1;
			$db->query("UPDATE {$_pre}content SET list='$list' WHERE id='$id' ");
		}
		else
		{
			$db->query("UPDATE {$_pre}content SET list='0' WHERE id='$id' ");
		}
	}
	elseif($job=="punish")
	{
		global $Type;
		if($Type==1){
			add_user($rsdb[uid],-abs($webdb[ErrSortMoney]),'奖励');
		}elseif($Type==2){
			add_user($rsdb[uid],-abs($webdb[illInfoMoney]),'扣分');
		}
	}
}
?>