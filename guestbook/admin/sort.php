<?php
!function_exists('html') && exit('ERR');

ck_power('sort');


if($job=="listsort")
{
	$fid=intval($fid);

	$listdb=array();
	module_list_all_sort(0,0);
	
	$sortdb=$listdb;

	$sort_fup=$Guidedb->Select("{$_pre}sort","fup",$fid);

	get_admin_html('sort');
}
elseif($action=="addsort")
{
	if($fup){
		$rs=$db->get_one("SELECT name,class,type FROM {$_pre}sort WHERE fid='$fup' ");
		if(!$rs[type]){
			showmsg('�ս���Ŀ���治�ܴ�������');
		}
		$class=$rs['class'];
		$db->query("UPDATE {$_pre}sort SET sons=sons+1 WHERE fid='$fup'");
	}else{
		
		$class=0;
	}
	$class++;
	$db->query("INSERT INTO {$_pre}sort (name,fup,class,type,allowcomment) VALUES ('$name','$fup','$class','$type',1) ");
	@extract($db->get_one("SELECT fid FROM {$_pre}sort ORDER BY fid DESC LIMIT 0,1"));
	
	mod_sort_class("{$_pre}sort",0,0);		//����class
	mod_sort_sons("{$_pre}sort",0);			//����sons
	module_fid_cache();

	jump("�����ɹ�",$FROMURL);
}

//�޸���Ŀ��Ϣ
elseif($job=="editsort")
{
	$rsdb=$db->get_one("SELECT * FROM {$_pre}sort WHERE fid='$fid'");
	$rsdb[config]=unserialize($rsdb[config]);
	$sort_fup=$Guidedb->Select("{$_pre}sort","postdb[fup]",$rsdb[fup]);
	$style_select=select_style('postdb[style]',$rsdb[style]);
	//$group_post=group_box("postdb[allowpost]",explode(",",$rsdb[allowpost]));
	//$group_viewcontent=group_box("postdb[allowviewcontent]",explode(",",$rsdb[allowviewcontent]));
	$typedb[$rsdb[type]]=" checked ";

	get_admin_html('editsort');
}
elseif($action=="editsort")
{
	//��鸸��Ŀ�Ƿ�������
	check_fup("{$_pre}sort",$postdb[fid],$postdb[fup]);
	//$postdb[allowpost]=@implode(",",$postdb[allowpost]);
	//$postdb[allowviewcontent]=@implode(",",$postdb[allowviewcontent]);
	unset($SQL);

	$rs_fid=$db->get_one("SELECT * FROM {$_pre}sort WHERE fid='$postdb[fid]'");
	//���������������ط�Ҳ�޸Ĺ����ֵ.�����ǩ��
	$rs_fid[config]=unserialize($rs_fid[config]);
	$postdb[config]=addslashes( serialize($rs_fid[config]) );

	if($rs_fid[fup]!=$postdb[fup])
	{
		$rs_fup=$db->get_one("SELECT class FROM {$_pre}sort WHERE fup='$postdb[fup]' ");
		$newclass=$rs_fup['class']+1;
		$db->query("UPDATE {$_pre}sort SET sons=sons+1 WHERE fup='$postdb[fup]' ");
		$db->query("UPDATE {$_pre}sort SET sons=sons-1 WHERE fup='$rs_fid[fup]' ");
		$SQL=",class=$newclass";
	}

	$db->query("UPDATE {$_pre}sort SET fup='$postdb[fup]',name='$postdb[name]',type='$postdb[type]',admin='$postdb[admin]',passwd='$postdb[passwd]',logo='$postdb[logo]',descrip='$postdb[descrip]',style='$postdb[style]',template='$postdb[template]',jumpurl='$postdb[jumpurl]',listorder='$postdb[listorder]',maxperpage='$postdb[maxperpage]',allowcomment='$postdb[allowcomment]',allowpost='$postdb[allowpost]',allowviewtitle='$postdb[allowviewtitle]',allowviewcontent='$postdb[allowviewcontent]',allowdownload='$postdb[allowdownload]',forbidshow='$postdb[forbidshow]',metakeywords='$postdb[metakeywords]',config='$postdb[config]'$SQL WHERE fid='$postdb[fid]' ");

	mod_sort_class("{$_pre}sort",0,0);		//����class
	mod_sort_sons("{$_pre}sort",0);			//����sons
	module_fid_cache();
	jump("�޸ĳɹ�","$FROMURL");
}

elseif($action=="delete")
{
	$db->query(" DELETE FROM `{$_pre}sort` WHERE fid='$fid' ");
	mod_sort_class("{$_pre}sort",0,0);		//����class
	mod_sort_sons("{$_pre}sort",0);			//����sons
	module_fid_cache();
	jump("ɾ���ɹ�",$FROMURL);
}
elseif($action=="editlist")
{
	foreach( $order AS $key=>$value){
		$db->query("UPDATE {$_pre}sort SET list='$value' WHERE fid='$key' ");
	}
	mod_sort_class("{$_pre}sort",0,0);		//����class
	mod_sort_sons("{$_pre}sort",0);			//����sons
	module_fid_cache();
	jump("�޸ĳɹ�","$FROMURL",1);
}


//��̨��Ŀ������
function module_list_all_sort($fid,$Class){
	global $db,$_pre,$listdb;
	$Class++;
	$query=$db->query("SELECT S.* FROM {$_pre}sort S WHERE S.fup='$fid' ORDER BY S.list DESC");
	while( $rs=$db->fetch_array($query) ){
		$icon="";
		for($i=1;$i<$Class;$i++){
			$icon.="&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		if($rs['class']!=$Class){
			$db->query("UPDATE {$_pre}sort SET class='$Class' WHERE fid='$rs[fid]'");
		}
		if($icon){
			$icon=substr($icon,0,-24);
			$icon.="--";
		}
		//$rs[config]=unserialize($rs[config]);
		$rs[icon]=$icon;
		if($rs[type]){
			$rs[_type]="����";
			$rs[_alert]="";
			//$rs[color]="red";
			$rs[_ifcontent]="onclick=\"alert('�����²���������,Ҳ���ܷ�������,����Ŀ�¿���������');return false;\" style='color:#ccc;'";
		}else{
			$rs[_type]="��Ŀ";
			$rs[_alert]="onclick=\"alert('��Ŀ�²�������Ŀ,�������¿�������Ŀ');return false;\" style='color:#ccc;'";
			$rs[_ifcontent]="";
			//$rs[color]="";
		}
		$listdb[]=$rs;
		module_list_all_sort($rs[fid],$Class);
	}
}


function module_get_guide($fid,$url){
	global $db,$_pre;
	$query = $db->query("SELECT * FROM {$_pre}sort WHERE fid='$fid' ");
	while($rs = $db->fetch_array($query)){
		$show=" -&gt; <A href='list.php?fid=$rs[fid]'>$rs[name]</A>".$show;
		if($rs[fup]){
			$show=module_get_guide($rs[fup],$url).$show;
		}
	}
	return $show;
}
function module_fid_cache(){
	global $db,$_pre,$webdb;
	$query = $db->query("SELECT * FROM {$_pre}sort ORDER BY list DESC LIMIT 800");
	while($rs = $db->fetch_array($query)){
		if($rs[index_show]){
			$Fid_db[index_show][$rs[fid]]=$rs[name];
		}
		if($rs[tableid]){
			$Fid_db[tableid][$rs[fid]]=$rs[tableid];
		}
		if($rs[dir_name]){
			$Fid_db[dir_name][$rs[fid]]=$rs[dir_name];
		}
		if($rs[ifcolor]){
			$Fid_db[ifcolor][$rs[fid]]=$rs[ifcolor];
		}
		$Fid_db[$rs[fup]][$rs[fid]]=$rs[name];
		$Fid_db[name][$rs[fid]]=$rs[name];

		$GuideFid[$rs[fid]]=module_get_guide($rs[fid]);
	}

	write_file(Mpath."data/all_fid.php","<?php\r\n\$Fid_db=".var_export($Fid_db,true).';?>');
	
}
?>