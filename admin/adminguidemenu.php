<?php
!function_exists('html') && exit('ERR');

if($job=='list'&&$Apower[adminmenu_list])
{
	if(!$gid){
		$gid=3;
	}
	$colordb[$gid]='red';
	$query = $db->query("SELECT * FROM {$pre}group WHERE allowadmin=1");
	while($rs = $db->fetch_array($query)){
		$grouptitle_db[$rs[gid]]=$rs[grouptitle];
		$group_db[$rs[gid]]=$rs;
	}
	$query = $db->query("SELECT * FROM {$pre}admin_menu WHERE groupid='$gid' AND fid=0 ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		$listdb[]=$rs;
		$query2 = $db->query("SELECT * FROM {$pre}admin_menu WHERE fid='$rs[id]' ORDER BY list DESC");
		while($rs2 = $db->fetch_array($query2)){
			$rs2[icon]='&nbsp;&nbsp;&nbsp;&nbsp;|----';
			$listdb[]=$rs2;
		}
	}

	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/adminguidemenu/menu.htm");
	require(dirname(__FILE__)."/"."template/adminguidemenu/list.htm");
	require(dirname(__FILE__)."/"."foot.php");
}
elseif($job=='edit'&&$Apower[adminmenu_list])
{
	$atc="edit";
	$rsdb=$db->get_one("SELECT * FROM {$pre}admin_menu WHERE id='$id'");
	$gid=$rsdb[groupid];
	$target[$rsdb[target]]=' checked ';
	$iftier[$rsdb[iftier]]=' checked ';

	$selected=select_fupmenu('fid',$rsdb[fid]);
	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/adminguidemenu/menu.htm");
	require(dirname(__FILE__)."/"."template/adminguidemenu/edit.htm");
	require(dirname(__FILE__)."/"."foot.php");
}
elseif($action=='edit'&&$Apower[adminmenu_list])
{
	if(!$postdb[name])
	{
		showmsg("���Ʋ���Ϊ��");
	}
	if(!$postdb['linkurl'])
	{
		//showmsg("���ӵ�ַ����Ϊ��");
	}
	//$postdb[name]=filtrate($postdb[name]);
	//$postdb[linkurl]=filtrate($postdb[linkurl]);

	$db->query("UPDATE {$pre}admin_menu SET fid='$fid',name='$postdb[name]',linkurl='$postdb[linkurl]',color='$postdb[color]',target='$postdb[target]',list='$postdb[list]',iftier='$postdb[iftier]' WHERE id='$id'");
	
	jump("�޸ĳɹ�","?lfj=$lfj&job=list&gid=$gid",1);
}
elseif($job=='add'&&$Apower[adminmenu_list])
{
	if(!$gid){
		showmsg("û��ָ�����û���!");
	}
	$target[0]=' checked ';
	$iftier[0]=' checked ';
	$atc="add";
	$selected=select_fupmenu('fid',$rsdb[fid]);
	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/adminguidemenu/menu.htm");
	require(dirname(__FILE__)."/"."template/adminguidemenu/edit.htm");
	require(dirname(__FILE__)."/"."foot.php");
}
elseif($action=='add'&&$Apower[adminmenu_list])
{
	if(!$postdb[name]){
		showmsg("���Ʋ���Ϊ��");
	}
	if($fid&&!$postdb['linkurl']){
		showmsg("���ӵ�ַ����Ϊ��");
	}
	if(!$addsort&&!$fid){
		showmsg("��ѡ��һ������");
	}
	//$postdb[name]=filtrate($postdb[name]);
	$postdb[linkurl]=filtrate($postdb[linkurl]);

	$db->query("INSERT INTO `{$pre}admin_menu` (`fid`, `name`, `linkurl`, `color`, `target`, `groupid`, `list`) VALUES ('$fid', '$postdb[name]', '$postdb[linkurl]', '$postdb[color]', '$postdb[target]','$gid', '$postdb[list]')");
	
	jump("��ӳɹ�","?lfj=$lfj&job=list&gid=$gid",1);
}
elseif($action=='delete'&&$Apower[adminmenu_list])
{
	$rs = $db->get_one("SELECT * FROM {$pre}admin_menu WHERE fid='$id'");
	if($rs){
		showmsg("����ɾ���Ӳ˵����߰��Ӳ˵�����.����ɾ���˲˵�");
	}

	$db->query("DELETE FROM `{$pre}admin_menu` WHERE id='$id'");
	
	jump("ɾ���ɹ�","?lfj=$lfj&job=list&gid=$gid",1);
}
elseif($action=="editlist"&&$Apower[adminmenu_list])
{
	foreach( $order AS $key=>$value)
	{
		$db->query("UPDATE {$pre}admin_menu SET list='$value' WHERE id='$key'");
	}
	
	jump("�޸ĳɹ�","?lfj=$lfj&job=list&gid=$gid",1);
}
elseif($job=="sysmenu"&&$Apower[adminmenu_list])
{
	$Smenu=intval($Smenu);
	unset($menudb);
	if($Smenu){
		$_r=$db->get_one("SELECT * FROM {$pre}module WHERE id='$Smenu'");
		$_fname="$_r[name]-";
		$_r[admindir] || $_r[admindir]='admin';
		@include(ROOT_PATH."$_r[dirname]/$_r[admindir]/menu.php");
		foreach( $menudb AS $k1=>$v1){
			foreach($v1 AS $k2=>$v2){
				$v2["link"]="../$_r[dirname]/$_r[admindir]/".$v2["link"];
				$adminDB[$k1][$k2]=$v2;
			}
		}
	}else{
		require("menu.php");
		$adminDB=$menudb;
		$rsdb=$db->get_one("SELECT * FROM {$pre}group WHERE gid='$gid'");
		$grdb=unserialize($rsdb[allowadmindb]);
	}
	
	$colorDB[$Smenu]='red';
	$show="[<A HREF='index.php?lfj=$lfj&job=$job&Smenu=0' style='color:$colorDB[0];'>��վϵͳ</A>] ";
	$query = $db->query("SELECT * FROM {$pre}module WHERE ifclose=0 ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		$show.=" [<A HREF='index.php?lfj=$lfj&job=$job&Smenu=$rs[id]' style='color:{$colorDB[$rs[id]]};'>$rs[name]</A>]";
	}

	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/adminguidemenu/sysmenu.htm");
	require(dirname(__FILE__)."/"."foot.php");
}



function select_fupmenu($name='fid',$id=0){
	global $db,$pre,$gid;
	$select="<select name='$name'><option value='0'>��ѡ��</option>";
	$query = $db->query("SELECT * FROM {$pre}admin_menu WHERE groupid='$gid' AND fid=0 ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		$ckk=$id==$rs[id]?' selected ':'';
		$select.="<option value='$rs[id]' $ckk style='color:blue;'>$rs[name]</option>";
	}
	$select.="</select>";
	return $select;
}