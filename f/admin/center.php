<?php
function_exists('html') OR exit('ERR');

$linkdb=array("��������"=>"$admin_path&job=config","�����ƹ�����"=>"$admin_path&job=guide","������ϢȨ������"=>"$admin_path&job=post","�ö���Ϣ����"=>"$admin_path&job=top","��ϵ����Ϣ����"=>"$admin_path&job=contact");

if($job)
{
	$query=$db->query(" SELECT * FROM {$_pre}config ");
	while( $rs=$db->fetch_array($query) ){
		$webdb[$rs[c_key]]=$rs[c_value];
	}
}
if($job=="label"&&ck_power('center_label')){
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=$Murl/index.php?choose_cityID=$city_id&jobs=show'>";
	exit;
}
elseif($job=="config"&&ck_power('center_config'))
{
	$GroupPassYz=group_box("webdbs[GroupPassYz]",explode(",",$webdb[GroupPassYz]));
	$webdb[Info_webOpen]?$Info_webOpen1='checked':$Info_webOpen0='checked';
	$select_style=select_style('webdbs[Info_style]',$webdb[Info_style]);
	$Info_forbidOutPost[intval($webdb[Info_forbidOutPost])]=' checked ';
	$Info_DelEndtime[intval($webdb[Info_DelEndtime])]=' checked ';
	$Jump_fromarea[intval($webdb[Jump_fromarea])]=' checked ';
	$Jump_allcity[intval($webdb[Jump_allcity])]=' checked ';
	$Force_Choose_City[intval($webdb[Force_Choose_City])]=' checked ';
	$Info_allowGuesSearch[intval($webdb[Info_allowGuesSearch])]=' checked ';
	$Info_Searchkeyword[intval($webdb[Info_Searchkeyword])]=' checked ';

	$Info_ShowNoYz[intval($webdb[Info_ShowNoYz])]=' checked ';

	$Info_htmlType[intval($webdb[Info_htmlType])]=' checked ';

	$module_close[intval($webdb[module_close])]=' checked ';
	
	$Info_UseEndTime[intval($webdb[Info_UseEndTime])]=' checked ';
	$Info_MemberChooseCity[intval($webdb[Info_MemberChooseCity])]=' checked ';
	$Info_allcityType[intval($webdb[Info_allcityType])]=' checked ';

	$Info_index_cache[intval($webdb[Info_index_cache])]=' checked ';

	$if_GGmap[intval($webdb[if_GGmap])]=' checked ';
	

	$group_UpPhoto=group_box("webdbs[group_UpPhoto]",explode(",",$webdb[group_UpPhoto]),array(2));
	$Post_group_UpPhoto=group_box("webdbs[Post_group_UpPhoto]",explode(",",$webdb[Post_group_UpPhoto]));

	get_admin_html('config');
}
elseif($job=="html"){
	unset($linkdb);
	$Adminpath=Adminpath.'apache.txt';
	$Info_htmlType[intval($webdb[Info_htmlType])]=' checked ';
	$post_htmlType[intval($webdb[post_htmlType])]=' checked ';

	$linkdb=array(
			  "����Ŀ¼�������ɱ�׼Ŀ¼��"=>"sort.php?job=batch",
			  "������������Ŀ¼�ļ�"=>"spsort.php?job=batch"
			);
	if(!function_exists('MODULE_CK')||!in_array("fenlei",$BIZ_MODULEDB)){
		unset($linkdb["������������Ŀ¼�ļ�"]);
	}

	get_admin_html('html');
}

elseif($action=="config"&&ck_power('center_config'))
{
	if(isset($webdbs[Info_MakeIndexHtmlTime])&&!$webdbs[Info_MakeIndexHtmlTime]&&$webdb[Info_MakeIndexHtmlTime]){
		//@unlink("../index.htm.bak");
		//rename("../index.htm","../index.htm.bak");
	}
	if($GroupPassYz){
		$webdbs[GroupPassYz]=$webdbs[GroupPassYz];
	}
	if($GroupPostInfo){
		$webdbs[GroupPostInfo]=$webdbs[GroupPostInfo];
	}

	if($Info_GroupCommentYzImg){
		$webdbs[Info_GroupCommentYzImg]=$webdbs[Info_GroupCommentYzImg];
	}
	if($Info_GroupPostYzImg){
		$webdbs[Info_GroupPostYzImg]=$webdbs[Info_GroupPostYzImg];
	}

	if( isset($webdbs[Info_webadmin]) ){
		$webdbs[Info_webadmin]=filtrate($webdbs[Info_webadmin]);
		$db->query("UPDATE {$pre}module SET adminmember='$webdbs[Info_webadmin]' WHERE id='$webdb[module_id]'");
	}
	if( isset($webdbs[Info_weburl]) ){
		$webdbs[Info_weburl]=filtrate($webdbs[Info_weburl]);
		$db->query("UPDATE {$pre}module SET domain='$webdbs[Info_weburl]' WHERE id='$webdb[module_id]'");
	}
	if(isset($webdbs[Info_webadmin])||isset($webdbs[Info_weburl])){
		if(function_exists('make_module_cache')){
			make_module_cache();
		}		
	}
	module_write_config_cache($webdbs);
	refreshto($FROMURL,"�޸ĳɹ�");
}

elseif($job=="settpl"&&ck_power('center_settpl'))
{
	$Info_NewsMakeHtml[$webdb[Info_NewsMakeHtml]]=' checked ';

	get_admin_html('settpl');
}
elseif($action=="settable")
{
	module_write_config_cache($webdbs);
	refreshto($FROMURL,"���óɹ�");
}
elseif($job=="settable")
{
	
	include_once(Mpath."data/all_fid.php");
	$layout=array();
	$detail=explode("#",$webdb[sort_layout]);
	foreach($detail AS $key=>$value){
		$detail2=explode(",",$value);
		foreach($detail2 AS $fup){
			if(!$Fid_db['0'][$fup]){
				continue;
			}
			$layout[$key][$fup]['name']=$Fid_db['name'][$fup];
			$layout[$key][$fup]['son']=$Fid_db[$fup];
			$ckfup[$fup]=1;
		}
	}
	foreach($Fid_db[0] AS $fup=>$name){
		if(!$ckfup[$fup]){
			$layout[0][$fup]['name']=$Fid_db['name'][$fup];
			$layout[0][$fup]['son']=$Fid_db[$fup];
		}
	}

	/*
	$query = $db->query("SELECT * FROM {$_pre}sort WHERE fup=0");
	while($rs = $db->fetch_array($query)){
		$query2 = $db->query("SELECT * FROM WHERE fup=$rs[fid]");
		while($rs2 = $db->fetch_array($query2)){
		}
	}*/

	get_admin_html('settable');
}
elseif($job=="top")
{
	$Info_NewsMakeHtml[$webdb[Info_NewsMakeHtml]]=' checked ';

	get_admin_html('top');
}

elseif($job=="post")
{
	$GroupPassYz=group_box("webdbs[GroupPassYz]",explode(",",$webdb[GroupPassYz]));
	$webdb[Info_webOpen]?$Info_webOpen1='checked':$Info_webOpen0='checked';
	$select_style=select_style('webdbs[Info_style]',$webdb[Info_style]);
	$Info_forbidOutPost[intval($webdb[Info_forbidOutPost])]=' checked ';

	$Jump_fromarea[intval($webdb[Jump_fromarea])]=' checked ';
	$Jump_allcity[intval($webdb[Jump_allcity])]=' checked ';
	$Force_Choose_City[intval($webdb[Force_Choose_City])]=' checked ';
	$Info_allowGuesSearch[intval($webdb[Info_allowGuesSearch])]=' checked ';
	$Info_Searchkeyword[intval($webdb[Info_Searchkeyword])]=' checked ';
	$Info_ClosePost[intval($webdb[Info_ClosePost])]=' checked ';
	$Info_GuestPostRepeat[intval($webdb[Info_GuestPostRepeat])]=' checked ';
	$Info_MemberPostRepeat[intval($webdb[Info_MemberPostRepeat])]=' checked ';

	$Info_GroupCommentYzImg=group_box("webdbs[Info_GroupCommentYzImg]",explode(",",$webdb[Info_GroupCommentYzImg]));
	$Info_GroupPostYzImg=group_box("webdbs[Info_GroupPostYzImg]",explode(",",$webdb[Info_GroupPostYzImg]));

	$Info_cityPost[intval($webdb[Info_cityPost])]=' checked ';

	$GroupPostInfo=group_box("webdbs[GroupPostInfo]",explode(",",$webdb[GroupPostInfo]));

	get_admin_html('post');
}

elseif($job=="guide")
{
	get_admin_html('guide');
}

elseif($job=="contact")
{
	$Info_ImgShopContact[intval($webdb[Info_ImgShopContact])]=' checked ';
	$Info_ForbidGuesViewContact[intval($webdb[Info_ForbidGuesViewContact])]=' checked ';
	$Info_ForbidMemberViewContact[intval($webdb[Info_ForbidMemberViewContact])]=' checked ';
	$Info_ShowSearchContact[intval($webdb[Info_ShowSearchContact])]=' checked ';

	$Info_Musttelephone[intval($webdb[Info_Musttelephone])]=' checked ';
	$Info_Mustmobphone[intval($webdb[Info_Mustmobphone])]=' checked ';
	$Info_MustQQ[intval($webdb[Info_MustQQ])]=' checked ';
	$Info_MustEmail[intval($webdb[Info_MustEmail])]=' checked ';

	get_admin_html('contact');
}
?>