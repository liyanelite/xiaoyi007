<?php
!function_exists('html') && exit('ERR');

ck_power('joinlist');

$fid=intval($fid);

if($job=="list")
{
	$rows=20;

	if($page<1){
		$page=1;
	}

	$min=($page-1)*$rows;
	
	$SQL="";
	

	//搜索的时候
	if($search_type&&$keyword){
		$SQL=" AND C.$search_type='$keyword' ";
	}

	$query = $db->query("SELECT SQL_CALC_FOUND_ROWS A.*,C.* FROM {$_pre}person A LEFT JOIN {$_pre}content_2 C ON A.id=C.id WHERE 1 $SQL ORDER BY A.posttime DESC LIMIT $min,$rows");

	$RS=$db->get_one("SELECT FOUND_ROWS()");
	$totalNum=$RS['FOUND_ROWS()'];

	while($rs = $db->fetch_array($query)){
		$Module_db->showfield($module_DB[2][field],$rs,'list');
		$rs[picurl] = tempdir($rs[icon]);
		$rs[posttime] = date("y-m-d H:i:s",$rs[posttime]);
		$rs[ifcom] = $rs[levels]?"<A HREF='$admin_path&action=work&jobs=uncom&id=$rs[id]' style='color:red;'>已推荐</A>":"<A HREF='$admin_path&action=work&jobs=com&id=$rs[id]'>未推荐</A>";
		$listdb[]=$rs;
	}

	$showpage=getpage("","","$admin_path&search_type=$search_type&keyword=$keyword",$rows,$totalNum);
	
	get_admin_html('list');
}
elseif($action=="del")
{	
	foreach ($listdb as $key => $id){
		$rs = $db->get_one("SELECT * FROM {$_pre}person WHERE id='$id'");
		$db->query("DELETE FROM {$_pre}person WHERE id='$id'");
		$db->query("DELETE FROM {$_pre}content_2 WHERE id='$id'");
		$db->query("DELETE FROM {$_pre}memberdb WHERE memberuid='$rs[uid]'");
		$db->query("DELETE FROM {$_pre}apply WHERE join_id='$id'");
	}
	refreshto($FROMURL,"操作成功",0);
}
elseif($action=="work"){
	if($jobs=='com'){
		$db->query("UPDATE {$_pre}person SET levels=1,levelstime='$timestamp' WHERE id='$id'");
	}elseif($jobs=='uncom'){
		$db->query("UPDATE {$_pre}person SET levels=0,levelstime='0' WHERE id='$id'");
	}
	refreshto($FROMURL,"操作成功",0);
}

?>