<?php
function_exists('html') OR exit('ERR');

ck_power('sort');
//$linkdb=array("��Ŀ����"=>"index.php?lfj=$lfj&dirname=$dirname&file=$file&job=listsort");
			

if($fid){
	//$linkdb["�޸���Ŀ"]="index.php?lfj=$lfj&dirname=$dirname&file=$file&job=editsort&fid=$fid";
}

if($job=="listsort")
{
	$fup_select=module_choose_sort(0,0,0);

	$listdb=array();
	module_list_all_sort(0,0);
	get_admin_html('sort');
}
elseif($action=="addsort")
{

	$Type=$fid?'0':'1';
	$detail=explode("\r\n",$name);
	foreach( $detail AS $key=>$name){		
		$name=filtrate(trim($name));
		if(!$name){
			continue;
		}
		$db->query("INSERT INTO {$_pre}sort (name,fup,type,allowcomment,mid) VALUES ('$name','$fid','$Type',1,'$mid') ");
	}
	//@extract($db->get_one("SELECT fid FROM {$_pre}sort ORDER BY fid DESC LIMIT 0,1"));
	module_fid_cache();
	//refreshto("?job=editsort&fid=$fid","�����ɹ�");
	refreshto("$FROMURL","�����ɹ�");
}

//�޸���Ŀ��Ϣ
elseif($job=="editsort")
{

	$rsdb=$db->get_one("SELECT S.* FROM {$_pre}sort S WHERE S.fid='$fid'");

	if($rsdb[type]){
		 $smallsort='none;';
	}else{
		$bigsort='none;';
	}

 


 	//$group_viewtitle=group_box("postdb[allowviewtitle]",explode(",",$rsdb[allowviewtitle]));
	//$group_viewcontent=group_box("postdb[allowviewcontent]",explode(",",$rsdb[allowviewcontent]));
	//$group_download=group_box("postdb[allowdownload]",explode(",",$rsdb[allowdownload]));
	$typedb[$rsdb[type]]=" checked ";
	$index_show[$rsdb[index_show]]=" checked ";

	$forbidshow[intval($rsdb[forbidshow])]=" checked ";
	$allowcomment[intval($rsdb[allowcomment])]=" checked ";
	$ifcolor[intval($rsdb[ifcolor])]=" checked ";

	$listorder[$rsdb[listorder]]=" selected ";

	$tpl=unserialize($rsdb[template]);

	//if($db->get_one(" SELECT * FROM {$_pre}content WHERE fid='$fid' limit 1 ")){
	//	$moresons="none;";
	//}
	//$photo_fid=$Guidedb->Select("{$pre}sort","postdb[photo_fid]",$rsdb[photo_fid]);
	//$article_fid=$Guidedb->Select("{$pre}sort","postdb[article_fid]",$rsdb[article_fid]);



	$fup_select=module_choose_sort(0,0,$rsdb[fup]);

	if(!$rsdb[dir_name]){
		require_once(ROOT_PATH."inc/pinyin.php");
		$rsdb[dir_name]=change2pinyin($rsdb[name],0);
	}
	$rsdb[dir_name]=preg_replace("/(\/|\\\|-)/","_",$rsdb[dir_name]);
	
	get_admin_html('editsort');
}
elseif($action=="editsort")
{
	$rs_fid=$db->get_one("SELECT * FROM {$_pre}sort WHERE fid='$postdb[fid]'");

	//��鸸��Ŀ�Ƿ�������
	module_check_fup("{$_pre}sort",$postdb[fid],$postdb[fup]);
	$postdb[allowpost]=@implode(",",$postdb[allowpost]);
	//$postdb[allowviewtitle]=@implode(",",$postdb[allowviewtitle]);
	//postdb[allowviewcontent]=@implode(",",$postdb[allowviewcontent]);
	//$postdb[allowdownload]=@implode(",",$postdb[allowdownload]);
	$postdb[template]=@serialize($postdb[tpl]);
	unset($SQL);

	$_sql='';
	foreach( $Together AS $key=>$value ){
		$_sql.="`$key`='{$postdb[$key]}',";
	}
	if($_sql){
		$_sql.="sons=sons";
		$db->query("UPDATE {$_pre}sort SET $_sql WHERE fup='$postdb[fid]'");
	}


	$postdb[name]=filtrate($postdb[name]);
	$db->query("UPDATE {$_pre}sort SET mid='$postdb[mid]',fup='$postdb[fup]',name='$postdb[name]',type='$postdb[type]',admin='$postdb[admin]',passwd='$postdb[passwd]',logo='$postdb[logo]',descrip='$postdb[descrip]',metatitle='$postdb[metatitle]',metakeywords='$postdb[metakeywords]',metadescription='$postdb[metadescription]',style='$postdb[style]',template='$postdb[template]',jumpurl='$postdb[jumpurl]',listorder='$postdb[listorder]',maxperpage='$postdb[maxperpage]',allowcomment='$postdb[allowcomment]',allowpost='$postdb[allowpost]',allowviewtitle='$postdb[allowviewtitle]',allowviewcontent='$postdb[allowviewcontent]',allowdownload='$postdb[allowdownload]',forbidshow='$postdb[forbidshow]',config='$postdb[config]',index_show='$postdb[index_show]',ifcolor='$postdb[ifcolor]',dir_name='$postdb[dir_name]'$SQL WHERE fid='$postdb[fid]' ");

	module_fid_cache();
	refreshto("$FROMURL","�޸ĳɹ�");
}
elseif($action=="delete")
{
	if($fid){
		$fiddb[$fid]=$fid;
	}else{
		foreach( $fiddb AS $key=>$value){
			$i++;
			$fiddb[$key]=$i;
		}
	}
	arsort($fiddb);
	foreach( $fiddb AS $fid=>$value){
		$_rs=$db->get_one("SELECT * FROM `{$_pre}sort` WHERE fup='$fid'");
		if($_rs){
			showerr("����������Ŀ�㲻��ɾ��,����ɾ������������Ŀ,��ɾ������");
		}
		$db->query(" DELETE FROM `{$_pre}sort` WHERE fid='$fid' ");
	}
	module_fid_cache();
	refreshto("$admin_path&job=listsort","ɾ���ɹ�");
}
elseif($action=="editlist")
{
	foreach( $order AS $key=>$value){
		$db->query("UPDATE {$_pre}sort SET list='$value' WHERE fid='$key' ");
	}
	module_fid_cache();
	refreshto("$FROMURL","�޸ĳɹ�",1);
}



function module_choose_sort($fid,$class,$ck=0)
{
	global $db,$_pre;
	for($i=0;$i<$class;$i++){
		$icon.="&nbsp;&nbsp;&nbsp;&nbsp;";
	}
	$class++;
	$query = $db->query("SELECT * FROM {$_pre}sort WHERE fup='$fid' ORDER BY list DESC LIMIT 500");
	while($rs = $db->fetch_array($query)){
		$ckk=$ck==$rs[fid]?' selected ':'';
		$fup_select.="<option value='$rs[fid]' $ckk>$icon|-$rs[name]</option>";
		//$fup_select.=module_choose_sort($rs[fid],$class,$ck);
	}
	return $fup_select;
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


function module_fid_cache(){
	global $db,$_pre,$webdb;
	$query = $db->query("SELECT * FROM {$_pre}sort ORDER BY list DESC LIMIT 800");
	while($rs = $db->fetch_array($query)){

		if($rs[fup]){
			$Fid_db[fup][$rs[fid]]=$rs[fup];
		}

		if($rs[ifcolor]){
			$Fid_db[ifcolor][$rs[fid]]=$rs[ifcolor];
		}
		$Fid_db[$rs[fup]][$rs[fid]]=$rs[name];
		$Fid_db[name][$rs[fid]]=$rs[name];

		$GuideFid[$rs[fid]]=module_get_guide($rs[fid]);
	}

	write_file(Mpath."data/all_fid.php","<?php\r\nreturn ".var_export($Fid_db,true).';?>');
	write_file(Mpath."data/guide_fid.php","<?php\r\n\$GuideFid=".var_export($GuideFid,true).';?>');
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


/**
*����Ƿ������.��������ĿΪ�Լ��ĸ���Ŀ
**/
function module_check_fup($table,$fid,$fup){
	global $db;
	if(!$fup){
		return ;
	}elseif($fid==$fup){
		showerr("������������Ϊ����Ŀ");
	}
	$query = $db->query("SELECT * FROM $table WHERE fid='$fup'");
	while($rs = $db->fetch_array($query)){
		if($rs[fup]==$fid){
			showerr("�㲻�����ñ��������Ŀ��Ϊ����Ŀ,���ǲ������.�������������������Ŀ��Ϊ����Ŀ");
		}elseif($rs[fup]){
			module_check_fup($table,$fid,$rs[fup]);
		}
	}
}

?>