<?php
function_exists('html') OR exit('ERR');

ck_power('company');
$linkdb=array(
			"ȫ������"=>"$admin_path&job=list",
			"����˵ĵ���"=>"$admin_path&job=list&type=yz",
			"δ��˵ĵ���"=>"$admin_path&job=list&type=unyz",
			"�Ƽ���Ϣ"=>"$admin_path&job=list&type=levels",
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
	elseif($type=="levels"){
		$SQL.=" AND levels=1 ";
	}
	elseif($type=="unlevels"){
		$SQL.=" AND levels=0 ";
	}
	elseif($type=="title"){
		$SQL.=" AND binary title LIKE '%$keyword%' ";
	}
	elseif($type=="uid"){
		$SQL.=" AND uid='$keyword' ";
	}
	elseif($type=="username"){
		@extract($db->get_one("SELECT uid FROM {$pre}memberdata WHERE username='$keyword' "));
		if(!$uid){
			showerr("�û�������!");
		}
		$SQL.=" AND uid=$uid ";
	}

	$rows=30;
	if($page<1){
		$page=1;
	}
	$min=($page-1)*$rows;
	$order="uid";
	$desc="DESC";
	$query=$db->query("SELECT SQL_CALC_FOUND_ROWS * FROM {$_pre}company $SQL ORDER BY $order $desc LIMIT $min,$rows");
	$RS=$db->get_one("SELECT FOUND_ROWS()");
	$showpage=getpage("","","$admin_path&job=list&fid=$fid&type=$type&keyword=".urlencode($keyword),$rows,$RS['FOUND_ROWS()']);
	while($rs=$db->fetch_array($query))
	{
		if(!$rs[yz]){
			$rs[ischeck]="<A HREF='$admin_path&action=work&uid=$rs[uid]&jobs=yz' style='color:black;'>δ���</A>";
		}elseif( $rs[yz]==1){
			$rs[ischeck]="<A HREF='$admin_path&action=work&uid=$rs[uid]&jobs=unyz' style='color:blue;'>�����</A>";
		}
		if(!$rs[levels]){
			$rs[iscom]="<A HREF='$admin_path&action=work&uid=$rs[uid]&jobs=com&levels=1' style=''>δ�Ƽ�</A>";
		}else{
			$rs[iscom]="<A HREF='$admin_path&action=work&uid=$rs[uid]&jobs=com&levels=0' style='color:red;'>���Ƽ�</A>";
		}
		$rs[title2]=urlencode($rs[title]);
		$rs[posttime]=date("m-d",$rs[posttime]);
		$rs[city]=$city_DB[name][$rs[city_id]];
		$listdb[$rs[uid]]=$rs;
	}
	get_admin_html('list');
}
elseif($action=='work')
{
	if($jobs=='com'){
		$SQL=$levels?",levelstime='$timestamp'":",levelstime=''";
		$db->query("UPDATE {$_pre}company SET levels='$levels'$SQL WHERE uid='$uid'");
	}elseif($jobs=='yz'){
		$db->query("UPDATE {$_pre}company SET yz='1' WHERE uid='$uid'");
	}elseif($jobs=='unyz'){
		$db->query("UPDATE {$_pre}company SET yz='0' WHERE uid='$uid'");
	}elseif($jobs=='del'){
		delete_home($uid);
	}
	refreshto("$FROMURL","",0);
}
?>