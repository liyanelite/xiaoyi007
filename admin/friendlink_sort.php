<?php
!function_exists('html') && exit('ERR');

if($job=="mod"&&$Apower[friendlink_mod])
{
	$rsdb=$db->get_one("SELECT * FROM {$pre}friendlink_sort WHERE fid='$fid' ");
	$rsdb[ifhide]=intval($rsdb[ifhide]);
	$ifhide[$rsdb[ifhide]]=" checked ";
	$yz[$rsdb[yz]]=" checked ";
	$iswordlink[$rsdb[iswordlink]]=" checked ";
	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/friendlink_sort/menu.htm");
	require(dirname(__FILE__)."/"."template/friendlink_sort/mod.htm");
	require(dirname(__FILE__)."/"."foot.php");
}
elseif($action=="mod"&&$Apower[friendlink_mod])
{
	$db->query("UPDATE {$pre}friendlink_sort SET name='$postdb[name]',`list`='$postdb[list]' WHERE fid='$fid'");
	
	jump("�޸ĳɹ�","$FROMURL",1);
}
elseif($job=="add"&&$Apower[friendlink_mod])
{
	$ifhide[0]=" checked ";
	$iswordlink[0]=" checked ";
	$yz[1]=" checked ";
	$rsdb['list']=0;
	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/friendlink_sort/menu.htm");
	require(dirname(__FILE__)."/"."template/friendlink_sort/mod.htm");
	require(dirname(__FILE__)."/"."foot.php");
}
elseif($action=="add"&&$Apower[friendlink_mod])
{

	if(!$IS_BIZPhp168){
		@extract($db->get_one("SELECT COUNT(*) AS NUM FROM {$pre}friendlink_sort"));
		if($NUM>9){
			//showerr("��Ѱ����ֻ�ܴ���10������");
		}
	}
	$db->query("INSERT INTO `{$pre}friendlink_sort` (`name` , `list`) VALUES ('$postdb[name]','$postdb[url]')");
	
	jump("��ӳɹ�","index.php?lfj=$lfj&job=list");
}
elseif($job=="list"&&$Apower[friendlink_mod])
{
	$query=$db->query("SELECT * FROM `{$pre}friendlink_sort` ORDER BY list DESC");
	while($rs=$db->fetch_array($query)){
		$listdb[]=$rs;
	}
	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/friendlink_sort/menu.htm");
	require(dirname(__FILE__)."/"."template/friendlink_sort/friendlink.htm");
	require(dirname(__FILE__)."/"."foot.php");
}
elseif($action=="delete"&&$Apower[friendlink_mod])
{
	$db->query("DELETE FROM `{$pre}friendlink_sort` WHERE fid='$fid' ");
	
	jump("ɾ���ɹ�",$FROMURL);
}
?>