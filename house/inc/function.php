<?php
function Info_keyword_ck($keyword){
	if($keyword){
		$keyword=str_replace("��"," ",$keyword);
		$keyword=str_replace(","," ",$keyword);
		$keyword=str_replace("��"," ",$keyword);
		$keyword=str_replace("��"," ",$keyword);
		$detail=explode(" ",$keyword);
		foreach( $detail AS $key=>$value){
			//����3���ֽڵ�,����Ϊ�ؼ���,һ�������൱�������ֽ�
			if(strlen($value)>3){
				 $array[$value]=$value;
			}
		}
		$keyword=implode(" ",$array);
		return $keyword;
	}
}

//�����ֶ�,������
function update_fen($id){
	global $db,$_pre;
	return;
	$query = $db->query("SELECT * FROM {$_pre}comments WHERE id='$id'");
	while($rs = $db->fetch_array($query)){
		for($i=1;$i<6 ;$i++ ){
			if($rs["fen{$i}"]){
				${"fen{$i}_num"}++;
				${"fen{$i}_vale"}+=$rs["fen{$i}"];
			}
		}
	}
	for($i=1;$i<6 ;$i++ ){
		if(${"fen{$i}_num"}){
			//�Ŵ�10�����ڸ�׼ȷ�����Ƚ�
			$value=ceil((${"fen{$i}_vale"}/${"fen{$i}_num"})*10);
			$array[]="`f{$i}`='$value'";
		}		
	}
	if($array){
		$SQL=implode(",",$array);
		$db->query("UPDATE {$_pre}content SET $SQL WHERE id='$id'");
	}
}

//����ҳ��̬ʱ�õ�����URL
function get_post_url($type,$fid,$id='',$cityid='',$zoneid='',$streetid=''){
	global $Mdomain,$webdb,$Fid_db,$zone_DB,$street_DB,$city_DB,$BIZ_MODULEDB;

	$_cityid=$cityid?$cityid:$GLOBALS['city_id'];
	$url=$Mdomain.'/';

	if($webdb[post_htmlType]==1){
		if($type=='del'){
			$url.="post-del";
		}elseif($type=='edit'){
			$url.="post-edit";
		}else{
			$url.="post";
		}
		$fid && $url.="-$fid";
		if($type!='del'&&$type!='edit'){	//�·���
			$cityid && $url.="-$cityid";
			$zoneid && $url.="-$zoneid";
			$streetid && $url.="-$streetid";
		}else{
			$url.="-$id";
		}
		$url.=".htm";
	}else{
		if($type=='del'){
			$url.="post.php?action=del&fid=$fid&id=$id";
		}elseif($type=='edit'){
			$url.="post.php?job=edit&fid=$fid&id=$id";
		}else{
			$url.="post.php";
			if($street_id){
				$url.="?fid=$fid&city_id=$cityid&zone_id=$zoneid&street_id=$streetid";
			}elseif($zoneid){
				$url.="?fid=$fid&city_id=$cityid&zone_id=$zoneid";
			}elseif($fid&&$cityid){
				$url.="?fid=$fid&city_id=$cityid";
			}elseif($fid){
				$url.="?fid=$fid";
			}
		}
	}
	return $url;
}

//�õ���Ϣ��URL
function get_info_url($id,$fid,$cityid='',$zoneid='',$streetid='',$array=array()){
	global $Mdomain,$webdb,$Fid_db,$zone_DB,$street_DB,$city_DB,$BIZ_MODULEDB;
	$webdb[Info_htmlname] || $webdb[Info_htmlname]='html';
//	if( count($city_DB[name])>2 ){
//		if(!function_exists('MODULE_CK')||!in_array('fenlei',$BIZ_MODULEDB)){
//			die("Free!");
//		}
//	}
	$url=$Mdomain.'/';
	if($webdb[Info_htmlType]==2){
		if($id){
			$url.="{$Fid_db[dir_name][$fid]}/f$id.$webdb[Info_htmlname]";			
		}else{			
			if(!$zoneid&&!$streetid){
				$url.="{$Fid_db[dir_name][$fid]}";
			}elseif($zoneid&&$streetid){
				@include_once(ROOT_PATH."data/zone/$cityid.php");
				$url.="{$zone_DB['dirname'][$zoneid]}-{$street_DB['dirname'][$streetid]}/{$Fid_db[dir_name][$fid]}";
			}elseif($zoneid){
				@include_once(ROOT_PATH."data/zone/$cityid.php");
				$url.="{$zone_DB['dirname'][$zoneid]}/{$Fid_db[dir_name][$fid]}";
			}
			foreach($array AS $key=>$value){
				if($value!=''){
					if($key=='page'&&$value<2){
						continue;
					}					
					$value=str_replace(array('-','/'),array('#@#','#!#'),$value);
					$value=urlencode($value);
					$url.="-$key-$value";
				}				
			}
			$url.="/";
		}
	}elseif($webdb[Info_htmlType]==1){
		if($id){
			$url.="bencandy-city_id-$cityid-fid-$fid-id-$id.$webdb[Info_htmlname]";
		}else{
			$url.="list-city_id-$cityid-fid-$fid";
			$array[zone_id]=$zoneid;
			$array[street_id]=$streetid;
			foreach($array AS $key=>$value){
				if($value!=''){					
					$value=str_replace(array('-','/'),array('#@#','#!#'),$value);
					$value=urlencode($value);
					$url.="-$key-$value";
				}
			}
			$url.=".$webdb[Info_htmlname]";
		}
	}else{		
		if($id){
			$url.="bencandy.php?city_id=$cityid&fid=$fid&id=$id";
		}else{
			$url.="list.php?fid=$fid&city_id=$cityid";
			if($zoneid){
				$url.="&zone_id=$zoneid";
			}
			if($streetid){
				$url.="&street_id=$streetid";
			}
			foreach($array AS $key=>$value){
				$value=urlencode($value);
				$url.="&$key=$value";
			}
		}
	}
	return $url;
}


//�ֱ�����
function get_id_info($IDstring){
	global $db,$_pre,$Fid_db,$webdb;
	if(!$IDstring){
		return ;
	}
	if(!$webdb[Info_ShowNoYz]){
		$SQL =" AND yz='1' ";
	}
	$query = $db->query("SELECT * FROM {$_pre}db WHERE id IN ($IDstring) ORDER BY id DESC");
	while($rs = $db->fetch_array($query)){
		$_erp=$Fid_db[tableid][$rs[fid]];
		$listdb[$rs[id]]=$db->get_one("SELECT * FROM {$_pre}content$_erp WHERE id=$rs[id] $SQL");
	}
	//krsort($listdb);
	return $listdb;
}

//�Զ�ɾ��������Ϣ
function del_EndTimeInfo($rs){
	global $db,$_pre,$Fid_db,$timestamp,$webdb;
	if($webdb[Info_DelEndtime]&&$rs[endtime]&&$rs[endtime]<$timestamp){
		$_erp=$Fid_db[tableid][$rs[fid]];
		del_info($rs[id],$_erp,$rs);
		return 1;
	}
}

//ɾ����Ϣ
function del_info($id,$_erp,$rs){
	global $db,$_pre;
	$db->query("DELETE FROM `{$_pre}db` WHERE id='$id' ");
	$db->query("DELETE FROM `{$_pre}content$_erp` WHERE id='$id' ");
	$db->query("DELETE FROM `{$_pre}content_$rs[mid]` WHERE id='$id' ");
	$db->query("DELETE FROM `{$_pre}buyad` WHERE id='$id' ");
	$db->query("DELETE FROM `{$_pre}report` WHERE id='$id' ");
	$db->query("DELETE FROM `{$_pre}collection` WHERE id='$id' ");
	$db->query("DELETE FROM `{$_pre}comments` WHERE id='$id' ");
	$db->query("DELETE FROM `{$_pre}dianping` WHERE id='$id' ");
	//ɾ������
	$rs[city_id] && del_file(Mpath."cache/index/$rs[city_id]");
	del_file(Mpath."cache/list/$rs[city_id]-$rs[fid]");

	
	$query = $db->query("SELECT * FROM `{$_pre}pic` WHERE id='$id'");
	while($rs = $db->fetch_array($query)){
		delete_attachment($rs[uid],tempdir($rs[imgurl]));
		delete_attachment($rs[uid],tempdir("$rs[imgurl].gif"));
	}
}


/**
*��ȡ��Ϣ����
**/
function Info_list_content($where_sql,$order_sql,$leng=40,$fid_array,$_erp=''){
	global $db,$_pre,$Fid_db,$module_DB,$Module_db;
	if(is_array($fid_array)){
		$SQL_db[""]="(SELECT * FROM {$_pre}content $where_sql)";
		foreach($fid_array AS $key=>$value){
			$_erp=$Fid_db[tableid][$value];
			$SQL_db["$_erp"]="(SELECT * FROM {$_pre}content$_erp $where_sql)";
		}
		$SQL=implode(" UNION ALL ",$SQL_db).$order_sql;
	}else{
		$SQL="SELECT * FROM {$_pre}content$_erp $where_sql $order_sql";
	}
	$query=$db->query($SQL);
	while( $rs=$db->fetch_array($query) ){
		if(del_EndTimeInfo($rs)){	//�Զ�ɾ��������Ϣ
			continue;
		}

		//������
		if($rs[mid]){
			$_r = $db->get_one("SELECT * FROM {$_pre}content_{$rs[mid]} WHERE id='$rs[id]'");
			$Module_db->showfield($module_DB[$rs[mid]][field],$_r,'list');
			$_r && $rs += $_r;
		}
		$leng && $rs[title]=get_word($rs[full_title]=$rs[title],$leng);
		$rs[posttime]=date("Y-m-d",$rs[full_time]=$rs[posttime]);
		if($rs[picurl]){
			$rs[picurl]=tempdir($rs[picurl]);
		}
		$rs[url] = get_info_url($rs[id],$rs[fid],$rs[city_id],$rs[zone_id],$rs[street_id]);
		$listdb[]=$rs;
	}
	return $listdb;
}



/**
*��ȡģ��ĺ���
**/
function getTpl($html,$tplpath=''){
	global $STYLE;
	if($tplpath&&file_exists($tplpath)){
		return $tplpath;
	}elseif($tplpath&&file_exists(Mpath.$tplpath)){
		return Mpath.$tplpath;
	}elseif(file_exists(Mpath."template/$STYLE/$html.htm")){
		return Mpath."template/$STYLE/$html.htm";
	}else{
		return Mpath."template/default/$html.htm";
	}
}

/**
*��ȡ��Ϣ����
**/
function Get_Info($type,$rows=5,$leng=20,$fid=0,$mid=0,$cityid='city',$zoneid='city',$streetid='city'){
	global $Fid_db,$city_id,$zone_id,$street_id,$webdb,$timestamp;

	if($fid){
		$fidstring=$fid;
		foreach( $Fid_db[$fid] AS $keyfid=>$value){
			$fidstring .=",$keyfid";
			$fid_array[]=$keyfid;
		}
		$fid_array && $fid_array[]=$fid;
		$SQL .=" AND fid IN ($fidstring) ";
	}elseif($mid>0){
		$SQL=" AND mid='$mid' ";
	}

	$cityid=='city'		&&	$cityid=$city_id;
	$zoneid=='city'		&&	$zoneid=$zone_id;
	$streetid=='city'	&&	$streetid=$street_id;

	if($streetid>0){
		$SQL .=" AND street_id='$streetid' ";
	}elseif($zoneid>0){
		$SQL .=" AND zone_id='$zoneid' ";
	}elseif($cityid>0){
		$SQL .=" AND city_id='$cityid' ";
	}

	if(!$webdb[Info_ShowNoYz]){
		$SQL .=" AND yz='1' ";
	}

	if($type=='hot'){
		$SQL=" WHERE 1 $SQL";
		$SQL_ORDER=" ORDER BY hits DESC LIMIT $rows ";
	}elseif($type=='lastview'){
		$SQL=" WHERE 1 $SQL ";
		$SQL_ORDER=" ORDER BY lastview DESC LIMIT $rows ";
	}elseif($type=='new'){
		$SQL=" WHERE 1 $SQL ";
		$SQL_ORDER=" ORDER BY list DESC LIMIT $rows ";
	}elseif($type=='level'){
		$SQL=" WHERE levels=1 $SQL ";
		$SQL_ORDER=" ORDER BY list DESC LIMIT $rows ";
	}elseif($type=='pic'){
		$SQL=" WHERE ispic=1 $SQL ";
		$SQL_ORDER=" ORDER BY list DESC LIMIT $rows ";
	}elseif($type>0){
		$SQL=" WHERE uid='$type' $SQL ";
		$SQL_ORDER=" ORDER BY list DESC LIMIT $rows ";
	}else{
		return ;
	}
	$_erp=$Fid_db[tableid][$fid];
	$listdb=Info_list_content(" $SQL ",$SQL_ORDER,$leng,$fid_array,$_erp);
	return $listdb;
}

/**
*��ȡ������Ϣ����
**/
function Get_AdInfo($sortid=0,$rows=10,$leng=40,$cityid='city'){
	global $db,$_pre,$timestamp,$city_id;

	$cityid=='city' && $cityid=$city_id;
	$cityid>0 && $SQL =" AND cityid = '$cityid' ";

	$query = $db->query("SELECT * FROM {$_pre}buyad WHERE sortid='$sortid' AND endtime>$timestamp $SQL ORDER BY money DESC,aid DESC LIMIT $rows");
	while($rs = $db->fetch_array($query)){
		$iddb[]=$rs[id];
	}
	$listdb=get_id_info(implode(",",$iddb));
	return $listdb;
}

 
function highlight_keyword($content){
	global $db,$pre,$keywordDB,$webdb,$Mdomain;
	return $content;
}

/**
*��ȡ�û�����Դ����
**/
function get_area($ip){
	global $city_DB;
	$area=ipfrom($ip);
	foreach( $city_DB[name] AS $key2=>$value2)
	{
		$value2=str_replace(array("��","��"," "),array("","",""),$value2);
		if(strstr($area,$value2)){
			return $key2;
		}
	}
}

/**
*��Ҫ�ṩ������,����,�ضε�ѡ��ʹ��
**/
function select_where($table,$name='fup',$ck='',$fup=''){
	global $db,$city_DB;
	/*
	if($fup){
		$SQL=" WHERE fup='$fup' ";
	}
	$query = $db->query("SELECT * FROM $table $SQL ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		$ckk=$ck==$rs[fid]?" selected ":" ";
		$show.="<option value='$rs[fid]' $ckk>$rs[name]</option>";
	}
	*/
	if(!$fup){
		foreach( $city_DB[name] AS $key=>$value){
			$ckk=$ck==$key?" selected ":" ";
			$show.="<option value='$key' $ckk>$value</option>";
		}
	}elseif($fup){
		if(strstr($name,'zone')&&is_file(ROOT_PATH."data/zone/$fup.php")){
			include(ROOT_PATH."data/zone/$fup.php");
			foreach( $zone_DB[name] AS $key=>$value){
				$ckk=$ck==$key?" selected ":" ";
				$show.="<option value='$key' $ckk>$value</option>";
			}
		}else{
			$query = $db->query("SELECT * FROM $table WHERE fup='$fup' ORDER BY list DESC");
			while($rs = $db->fetch_array($query)){
				$ckk=$ck==$rs[fid]?" selected ":" ";
				$show.="<option value='$rs[fid]' $ckk>$rs[name]</option>";
			}
		}
	}
	return "<select id='$table' name=$name><option value=''>��ѡ��</option>$show</select>";
}


/**
*�ֻ������ѯ
**/
function get_mob_area($mob){
	$mob=substr($mob,0,7);
	$string=read_file(Mpath."inc/mobilebook.dat");
	$string=strstr($string,$mob);
	$num=strpos($string,"\n");
	$end=substr($string,0,$num);
	list($a,$area)=explode(",",$end);
	return $area;
}

/**
*ѡ���Զ���������������Ŀ¼
**/
function choose_domain(){
	global $city_id,$city_DB,$WEBURL,$Mdomain,$jobs;
	if($jobs=='show'){
		return ;	//���±�ǩ��ʱ��,����Ҫ�ж�����
	}
	$_dirname=$city_DB['dirname'][$city_id];
	if($_dirname&&is_dir(Mpath."$_dirname"))
	{
		$_domain=$city_DB[domain][$city_id];
		if($_domain){
			if(!strstr($WEBURL,$_domain)){
				if(eregi("index\.php$",$WEBURL)){
					$url=preg_replace("/(.*)\/([^\/]*)/is","$_domain/",$WEBURL);
					echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=$url'>";
					exit;
				}
				$url=preg_replace("/(.*)\/([^\/]*)/is","$_domain/\\2",$WEBURL);
				echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=$url'>";
				exit;
			}
		}else{/*
			$__dirname=preg_replace("/(.*)\/([^\/]*)\/([^\/]*)/is","\\2",$WEBURL);
			if(!strstr($__dirname,'.')&&$__dirname!=$_dirname){
				$___name=preg_replace("/(.*)\/([^\/]*)\/([^\/]*)/is","\\3",$WEBURL);
				echo "META HTTP-EQUIV=REFRESH CONTENT='0;URL=$Mdomain/$_dirname/$___name'>";
				exit;
			}*/
		}
	}
}


/**
*��ʾ��ҳ�Ƽ���Ŀ�Ĺ��ܺ���
**/
function Info_ListMoreSort($rows,$leng,$cityid='city'){
	global $db,$_pre,$fid,$city_id,$zone_id,$street_id,$timestamp,$webdb,$Fid_db;
	$rows>0 || $rows=7;
	$leng>0 || $leng=30;
	$cityid=='city' && $cityid=$city_id;
	if($cityid>0){
		$_SQL .=" AND city_id='$cityid' ";
	}
	if(!$webdb[Info_ShowNoYz]){
		$_SQL .=" AND yz='1' ";
	}
	foreach( $Fid_db[index_show] AS $key=>$value){
		$_erp=$Fid_db[tableid][$key];
		$rs[name]=$value;
		$rs[fid]=$key;
		$rs[article]=Info_list_content(" WHERE fid=$key $_SQL "," ORDER BY list DESC LIMIT $rows ",$leng,'',$_erp);
		$listdb[]=$rs;
	}
	return $listdb;
}

/**
*��ȡÿ����Ŀ�м�����Ϣ
**/
function get_infonum($cityid){
	global $db,$_pre;
	if($cityid>0){
		$SQL=" AND city_id = '$cityid' ";
	}
	$query = $db->query("SELECT count(id) AS NUM, `fid` FROM `{$_pre}db` WHERE 1 $SQL GROUP BY `fid`");
	while($rs = $db->fetch_array($query)){
		$InfoNum[$rs[fid]]=$rs[NUM];
	}
	return $InfoNum;
}




//һ���Ǻ�̨ʹ�õĵõ���Ŀ�ĵ���
function get_guide($fid,$url){
	global $db,$_pre;
	$query = $db->query("SELECT * FROM {$_pre}sort WHERE fid='$fid' ");
	while($rs = $db->fetch_array($query)){
		$show=" -&gt; <A href='list.php?fid=$rs[fid]'>$rs[name]</A>".$show;
		if($rs[fup]){
			$show=get_guide($rs[fup],$url).$show;
		}
	}
	return $show;
}

//һ���Ǻ�̨ʹ�õ�������Ŀ��ػ���
function fid_cache(){
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
		$Fid_db[mid][$rs[fid]]=intval($rs[mid]);

		$GuideFid[$rs[fid]]=get_guide($rs[fid]);
	}

	write_file(Mpath."data/all_fid.php","<?php\r\n\$Fid_db=".var_export($Fid_db,true).';?>');
	write_file(Mpath."data/guide_fid.php","<?php\r\n\$GuideFid=".var_export($GuideFid,true).';?>');
}

//һ���Ǻ�̨ʹ�õ��г�ģ�͹�ѡ��ʹ��
function select_module($name,$ck=0){
	global $db,$_pre;
	$show="<select name='$name' $reto>";
	$query = $db->query("SELECT * FROM {$_pre}module ORDER BY LIST DESC");
	while($rs = $db->fetch_array($query)){
		$ck==$rs[id]?$ckk='selected':$ckk='';
		$show.="<option value='$rs[id]' $ckk>$rs[name]</option>";
	}
	return $show." </select>";   
}


//����ҳ���������������ֹ������
function check_rand_num($rand_num){
	global $webdb,$timestamp,$db,$_pre;
	if($webdb['rand_num_mktime']<1){
		return true;
	}
	if($webdb['rand_num'] && $rand_num!=$webdb['rand_num']){
		return false;
		//die('ϵͳ�����ʧЧ,�뷵��,ˢ��һ��ҳ��,��������������,�����ύ!');
	}
	if(($timestamp-$webdb['rand_num'])>$webdb['rand_num_mktime']*3600){
		
		$source = 'qwertyuioplkjhgfdsazxcvbnm';
		for($i=0;$i<rand(1,5);$i++)
		$ck .= $source{mt_rand(0, strlen($source) -1)};
		$webdb['rand_num_inputname']=$ck;
		$webdb['rand_num']=$timestamp;
		$db->query("REPLACE INTO `{$_pre}config` (`c_key` ,`c_value` )VALUES ('rand_num', '{$webdb[rand_num]}')");
		$db->query("REPLACE INTO `{$_pre}config` (`c_key` ,`c_value` )VALUES ('rand_num_inputname', '{$webdb[rand_num_inputname]}')");
		$writefile="<?php\r\n";
		$query = $db->query("SELECT * FROM {$_pre}config");
		while($rs = $db->fetch_array($query)){
			$rs[c_value]=addslashes($rs[c_value]);
			$writefile.="\$webdb['$rs[c_key]']='$rs[c_value]';\r\n";
		}

		write_file(Mpath."data/config.php",$writefile.'?>');
	}
	return true;
}

function get_zhongjie_info($uid){
	global $db,$pre;
	$rs=$db->get_one("SELECT * FROM {$pre}memberdata WHERE uid='$uid'");
	$rs[regdate] = date('Y-m-d H:i',$rs[regdate]);
	return $rs;
}

?>