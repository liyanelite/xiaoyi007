<?php
!function_exists('html') && exit('ERR');


ck_power('sort');

if($job=="listsort")
{
	$labelUrl="$Murl/list.php?jobs=show";

	$fup_select=choose_sort(0,0,0);

	$listdb=array();
	Module_list_all_sort(0,0);

	get_admin_html('sort');
}
elseif($action=="addsort")
{
	if(!$Type&&!$mid){
		showerr("创建栏目,必须要选择一个模型");
	}

	$detail=explode("\r\n",$name);
	foreach( $detail AS $key=>$name){
		if(!$name){
			continue;
		}
		$name=filtrate($name);
		$db->query("INSERT INTO {$_pre}sort (name,fup,type,allowcomment,mid) VALUES ('$name','$fid','$Type',1,'$mid') ");
	}
	//@extract($db->get_one("SELECT fid FROM {$_pre}sort ORDER BY fid DESC LIMIT 0,1"));
	fid_cache();
	refreshto("$admin_path&job=listsort","创建成功");
	//refreshto($FROMURL,"创建成功");
}

//修改栏目信息
elseif($job=="editsort")
{

	$rsdb=$db->get_one("SELECT S.*,M.name AS m_name FROM {$_pre}sort S LEFT JOIN {$_pre}module M ON S.mid=M.id WHERE S.fid='$fid'");

	if($rsdb[type]){
		 $smallsort='none;';
	}else{
		$bigsort='none;';
	}

	$_module="<select name='postdb[mid]'><option value=''>请选择所属模型</option>";
	$query = $db->query("SELECT * FROM {$_pre}module ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		$ckk=$rs[id]==$rsdb[mid]?' selected ':'';
		$_module.="<option value='$rs[id]' $ckk>$rs[name]</option>";
	}
	$_module.="</select>";


	//$group_post=group_box("postdb[allowpost]",explode(",",$rsdb[allowpost]));
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




	$fup_select=choose_sort(0,0,$rsdb[fup]);

	get_admin_html('editsort');
}
elseif($action=="editsort")
{
	if($postdb[dir_name]&&!eregi("^([_a-z0-9]+)$",$postdb[dir_name])){
		showerr("目录名只能是英文或数字或下画线");
	}

	if($postdb[type]&&$db->get_one(" SELECT * FROM {$_pre}content WHERE fid='$postdb[fid]' limit 1 ")){
		 showerr("当前栏目已经有内容了,你要修改成分类的话,请先删除本栏目里的内容或把内容移走");
	}


	//检查父栏目是否有问题
	check_fup("{$_pre}sort",$postdb[fid],$postdb[fup]);
	$postdb[allowpost]=@implode(",",$postdb[allowpost]);


	$postdb[template]=@serialize($postdb[tpl]);
	unset($SQL);

	$postdb[name]=filtrate($postdb[name]);
	$db->query("UPDATE {$_pre}sort SET fup='$postdb[fup]',name='$postdb[name]',type='$postdb[type]',admin='$postdb[admin]',passwd='$postdb[passwd]',logo='$postdb[logo]',descrip='$postdb[descrip]',metatitle='$postdb[metatitle]',metakeywords='$postdb[metakeywords]',metadescription='$postdb[metadescription]',style='$postdb[style]',template='$postdb[template]',jumpurl='$postdb[jumpurl]',listorder='$postdb[listorder]',maxperpage='$postdb[maxperpage]',allowcomment='$postdb[allowcomment]',allowpost='$postdb[allowpost]',allowviewtitle='$postdb[allowviewtitle]',allowviewcontent='$postdb[allowviewcontent]',allowdownload='$postdb[allowdownload]',forbidshow='$postdb[forbidshow]',config='$postdb[config]',index_show='$postdb[index_show]',ifcolor='$postdb[ifcolor]',dir_name='$postdb[dir_name]' WHERE fid='$postdb[fid]' ");

	//修改栏目名称之后,内容的也要跟着修改
	if($rs_fid[name]!=$postdb[name])
	{

		$db->query(" UPDATE {$_pre}content SET fname='$postdb[name]' WHERE fid='$postdb[fid]' ");
	}
	fid_cache();
	refreshto("$FROMURL","修改成功");
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
			showerr("分类有子栏目你不能删除,请先删除或移走子栏目,再删除分类");
		}
		$rs=$db->get_one("SELECT * FROM `{$_pre}sort` WHERE fid='$fid'");
		$db->query(" DELETE FROM `{$_pre}sort` WHERE fid='$fid' ");
		$db->query(" DELETE FROM `{$_pre}content{$rs[tableid]}` WHERE fid='$fid' ");
		$db->query(" DELETE FROM `{$_pre}content_{$rs[mid]}` WHERE fid='$fid' ");
	}
	fid_cache();
	refreshto("$admin_path&job=listsort","操作成功");
}
elseif($action=="editlist")
{
	foreach( $order AS $key=>$value){
		$db->query("UPDATE {$_pre}sort SET list='$value' WHERE fid='$key' ");
	}
	fid_cache();
	refreshto("$admin_path&job=listsort","操作成功");
}



function Module_list_all_sort($fid,$Class){
	global $db,$_pre,$listdb;
	$Class++;
	$query=$db->query("SELECT S.*,M.name AS m_name FROM {$_pre}sort S LEFT JOIN {$_pre}module M ON S.mid=M.id where S.fup='$fid' ORDER BY S.list DESC");
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
			$rs[_type]="分类";
			$rs[_alert]="";
			$rs[color]="red";
			$rs[_ifcontent]="onclick=\"alert('分类下不能有内容,也不能发表内容,但栏目下可以有内容');return false;\" style='color:#ccc;'";
		}else{
			$rs[_type]="栏目";
			$rs[_alert]="onclick=\"alert('栏目下不能有栏目,但分类下可以有栏目');return false;\" style='color:#ccc;'";
			$rs[_ifcontent]="";
			$rs[color]="";
		}

		$listdb[]=$rs;
		Module_list_all_sort($rs[fid],$Class);
	}
}


/*栏目列表

*/
function choose_sort($fid,$class,$ck=0)
{
	global $db,$_pre;
	for($i=0;$i<$class;$i++){
		$icon.="&nbsp;&nbsp;&nbsp;&nbsp;";
	}
	$class++;
	$query = $db->query("SELECT * FROM {$_pre}sort WHERE fup='$fid' AND type=1 ORDER BY list DESC LIMIT 500");
	while($rs = $db->fetch_array($query)){
		$ckk=$ck==$rs[fid]?' selected ':'';
		$fup_select.="<option value='$rs[fid]' $ckk>$icon|-$rs[name]</option>";
		$fup_select.=choose_sort($rs[fid],$class,$ck);
	}
	return $fup_select;
}
?>