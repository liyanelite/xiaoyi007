<?php
!function_exists('html') && exit('ERR');
if($hack&&ereg("^([a-z_0-9]+)$",$hack))
{
	if(is_file(ROOT_PATH."hack/$hack/admin.php")){
		include(ROOT_PATH."hack/$hack/admin.php");
	}else{
		showmsg("�ļ�������");
	}
	
}
elseif($job=='list'&&$Apower[hack_list])
{
	require("menu.php");
	$SQL='';
	if($class2){
		$SQL=" WHERE class2='$class2' ";
	}elseif($class1){
		$SQL=" WHERE class1='$class1' ";
	}
	$query = $db->query("SELECT * FROM {$pre}hack $SQL ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		if($rs[isbiz]&&!$IS_BIZPhp168){
			continue;
		}
		$listdb[]=$rs;
	}
	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/hack/list.htm");
	require(dirname(__FILE__)."/"."foot.php");
}
elseif($action=='list'&&$Apower[hack_list]){
	foreach( $orderdb AS $key=>$value){
		$db->query("UPDATE {$pre}hack SET list='$value' WHERE keywords='$key'");
	}
	write_hackmenu_cache();
	jump("�޸ĳɹ�","$FROMURL",1);
}
elseif($job=='autoadd'&&$Apower[hack_list])
{
	$query = $db->query("SELECT * FROM {$pre}hack");
	while($rs = $db->fetch_array($query)){
		$hackdb[]=$rs[keywords];
	}
	$dir=opendir(ROOT_PATH."hack/");
	while($file=readdir($dir)){
		if($file!='.'&&$file!='..'&&is_file(ROOT_PATH."hack/$file/data.sql")){			
			$sql=read_file(ROOT_PATH."hack/$file/data.sql");
			preg_match_all("/INSERT INTO `qb_hack`([^']+)\('([^']+)', '([^']+)'/is",$sql,$array);

			if((!$keywords=$array[2][0])||in_array($keywords,$hackdb)){
				continue;
			}
			$listdb[]=array('keywords'=>$keywords,'name'=>implode(' �� ',$array[3]),'hackdir'=>$file);
			$ii++;
		}
	}
	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/hack/autoadd.htm");
	require(dirname(__FILE__)."/"."foot.php");
}
elseif($action=='autoadd'&&$Apower[hack_list])
{
	$code=read_file(ROOT_PATH."hack/$hackdir/data.sql");

	preg_match_all("/INSERT INTO `qb_hack`([^']+)\('([^']+)', '([^']+)'/is",$code,$array);

	if(($keywords=$array[2][0])&&$db->get_one("SELECT * FROM `{$pre}hack` WHERE keywords='{$keywords}'")){
		showmsg("��ǰ�ؼ���{$keywords}�Ĳ���Ѿ�������,��װʧ��");
	}

	if($pre!='qb_'){
		$code=str_replace('qb_',$pre,$code);
	}
	$db->insert_file('',$code);

	@include(ROOT_PATH."hack/$hackdir/install.php");	//ִ��һ����Ҫ���еĲ������

	write_hackmenu_cache();
	
	jump("��װ�ɹ�,�㻹��Ҫ��Ӻ�̨����Ȩ��,������Ȩ����","index.php?lfj=group&job=admin_gr&gid=3",10);

}
elseif($job=='add'&&$Apower[hack_list])
{
	require("menu.php");
	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/hack/edit.htm");
	require(dirname(__FILE__)."/"."foot.php");
}
elseif($action=='add'&&$Apower[hack_list])
{
	if(!$postdb[name]){
		showmsg('���Ʋ���Ϊ��!');
	}
	if(!$postdb[keywords]){
		showmsg('�ؼ��ֲ���Ϊ��!');
	}
	if(!$postdb[adminurl]){
		showmsg('�����ַ����Ϊ��!');
	}
	$rs=$db->get_one("SELECT * FROM {$pre}hack WHERE keywords='$postdb[keywords]' ");
	if($rs){
		showmsg("$postdb[keywords],�ؼ����Ѿ�������.�����ظ�");
	}
	$rs=$db->get_one("SELECT * FROM {$pre}hack WHERE `name`='$postdb[name]' ");
	if($rs){
		showmsg("�����Ѿ�������.�����ظ�");
	}
	
	if(!ereg("([0-9_a-z]+)",$postdb[keywords])){
		showmsg("�ؼ��ֱ�����0-9a-z_��Щ�ַ�");
	}
	if(!$postdb[adminurl]||!$postdb[class2]){
		$postdb[class1]=$postdb[class2]='';
	}
	$db->query("INSERT INTO `{$pre}hack` ( `keywords` , `name` , `isclose` , `author` , `config` , `htmlcode` , `hackfile` , `hacksqltable` , `about`,`adminurl`,`class1`,`class2`,`list`,`linkname` ) VALUES ('$postdb[keywords]','$postdb[name]','$postdb[isclose]','$postdb[author]','$postdb[config]','$postdb[htmlcode]','$postdb[hackfile]','$postdb[hacksqltable]','$postdb[about]','$postdb[adminurl]','$postdb[class1]','$postdb[class2]','$postdb[list]','$postdb[linkname]')");
	write_hackmenu_cache();
	jump("��װ�ɹ�,�㻹��Ҫ��Ӻ�̨����Ȩ��,������Ȩ����","index.php?lfj=group&job=admin_gr&gid=3",10);
}
elseif($job=='edit'&&$Apower[hack_list])
{
	require("menu.php");
	$rsdb=$db->get_one("SELECT * FROM {$pre}hack WHERE keywords='$keywords' ");
	require(dirname(__FILE__)."/"."head.php");
	require(dirname(__FILE__)."/"."template/hack/edit.htm");
	require(dirname(__FILE__)."/"."foot.php");
}
elseif($action=='edit'&&$Apower[hack_list])
{
	$rs=$db->get_one("SELECT * FROM {$pre}hack WHERE `name`='$postdb[name]' AND keywords!='$keywords'");
	if($rs){
		showmsg("�����Ѿ�������.�����ظ�");
	}
	if(!$postdb[adminurl]||!$postdb[class2]){
		$postdb[class1]=$postdb[class2]='';
	}
	$db->query("UPDATE `{$pre}hack` SET name='$postdb[name]',hackfile='$postdb[hackfile]',hacksqltable='$postdb[hacksqltable]',about='$postdb[about]',adminurl='$postdb[adminurl]',class1='$postdb[class1]',class2='$postdb[class2]',list='$postdb[list]',linkname='$postdb[linkname]' WHERE keywords='$keywords'");
	write_hackmenu_cache();
	jump("�޸ĳɹ�",$FROMURL,1);
}
elseif($action=='delete'&&$Apower[hack_list])
{
	$rsdb=$db->get_one("SELECT * FROM {$pre}hack WHERE keywords='$keywords' ");
	$db->query("DELETE FROM {$pre}hack WHERE keywords='$keywords'");
	$detail=explode("\r\n",$rsdb[hackfile]);
	foreach($detail AS $key=>$value){
		if($value){
			del_file(ROOT_PATH.$value);
		}
	}

	$detail=explode("\r\n",$rsdb[hacksqltable]);
	foreach($detail AS $key=>$value){
		if($value){
			if( $pre!='qb_' ){
				$value=str_replace("qb_",$pre,$value);
			}
			$db->query("DROP TABLE IF EXISTS `$value`");
		}
	}

	write_hackmenu_cache();
	jump("���ɾ���ɹ�",$FROMURL,600);
}


?>