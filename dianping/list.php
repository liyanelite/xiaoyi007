<?php
require(dirname(__FILE__)."/global.php");
choose_domain();			//�����ж�

 

if($page<1){
	$page=1;
}

 

//������
@include(Mpath."data/guide_fid.php");

$fidDB=$db->get_one("SELECT A.* FROM {$_pre}sort A WHERE A.fid='$fid'");
if(!$fidDB){
	showerr("��Ŀ������");
}elseif($fidDB[jumpurl]){
	header("location:$fidDB[jumpurl]");
	exit;
}

/**
*ģ�������ļ�
**/
$field_db = $module_DB[$fidDB[mid]][field];

//�ֶ�ɸѡ
unset($TempSearch_2,$TempSearch_array,$seo_tile);
foreach($field_db AS $key=>$value){
	if($value[listfilter]){
		if($$key){	//SEO,title
			$detail=explode("\r\n",$value[form_set]);
			foreach($detail AS $_value){
				$detail2=explode("|",$_value);
				$detail2[1] || $detail2[1]=$detail2[0];
				if($detail2[0]==$$key){
					$seo_tile.=" {$value[title]} {$detail2[1]} ";
					break;
				}
			}
		}
		$TempSearch_2.="$key=>'{$$key}',";		//��ҳ����ʹ��
		$TempSearch_array[$key]=$$key;			//��������ʹ��
		$search_fieldDB[$key][$$key!=''?$$key:0]=" selected class='ck' style='color:red;'";
	}
}

/**
*��Ŀ���ò�������Ŀ�û��Զ���ı���
*����Ŀ�û��Զ���ı�������·��������
*�����õıȽ���,����ɾ������
**/
$fidDB[config]=unserialize($fidDB[config]);
$CV=$fidDB[config][field_value];
$_array=array_flip($fidDB[config][is_html]);
foreach( $fidDB[config][field_db] AS $key=>$rs){
	if(in_array($key,$_array)){
		$CV[$key]=En_TruePath($CV[$key],0);
	}elseif($rs[form_type]=='upfile'){
		$CV[$key]=tempdir($CV[$key]);
	}
}


//SEO
$titleDB[title]	= $fidDB[metatitle]?seo_eval($fidDB[metatitle]):strip_tags("{$city_DB[name][$city_id]} {$zone_DB[name][$zone_id]} {$street_DB[name][$street_id]} $fidDB[name] $seo_tile");
$titleDB[keywords] = seo_eval($fidDB[metakeywords]);
$titleDB[description] = seo_eval($fidDB[metadescription]);

//��Ŀ���
//$fidDB[style] && $STYLE=$fidDB[style];


unset($head_tpl,$foot_tpl);
//����ģ��
if($city_DB[tpl][$city_id]){
	list($head_tpl,$foot_tpl)=explode("|",$city_DB[tpl][$city_id]);
	$head_tpl && $head_tpl=Mpath.$head_tpl;
	$foot_tpl && $foot_tpl=Mpath.$foot_tpl;
}

//�б�ҳ����ͷ����β��
$head_tpl=html('head');
$foot_tpl=html('foot');
if($webdb[IF_Private_tpl]==2||$webdb[IF_Private_tpl]==3){
	if(is_file(Mpath.$webdb[Private_tpl_head])){
		$head_tpl=Mpath.$webdb[Private_tpl_head];
	}
	if(is_file(Mpath.$webdb[Private_tpl_foot])){
		$foot_tpl=Mpath.$webdb[Private_tpl_foot];
	}
}

/**
*��Ŀģ�������ڳ���ģ��
**/
if($fidDB[template]){
	$FidTpl=unserialize($fidDB[template]);
	$FidTpl['head'] && $head_tpl=Mpath.$FidTpl['head'];
	$FidTpl['foot'] && $foot_tpl=Mpath.$FidTpl['foot'];
	$FidTpl['list'] && $FidTpl['list']=Mpath.$FidTpl['list'];
}

//�������С��Ŀ���ж�
if($fidDB[type]){
	$sortDB=ListOnlySort();
}else{
	$_erp=$Fid_db[tableid][$fid];
	if($fidDB[maxperpage]){
		$rows=$fidDB[maxperpage];
	}elseif($webdb[Info_ListNum]){
		$rows=$webdb[Info_ListNum];
	}else{
		$rows=20;
	}
	$listdb=ListThisSort($rows,70);

	if($totalNum){
		$showpage=getpage("","","list.php?",$rows,$totalNum);
		$showpage=preg_replace("/list\.php\?&page=([0-9]+)/eis","get_info_url('',$fid,$city_id,$zone_id,$street_id,array($TempSearch_2'page'=>'\\1'))",$showpage);
	}
}

/**
*Ϊ��ȡ��ǩ����
**/
$chdb[main_tpl]=$fidDB[type]?getTpl("bigsort",$FidTpl['list']):getTpl("list_$fidDB[mid]",$FidTpl['list']);

/**
*��ǩ
**/
$ch_fid	= intval($fidDB[config][label_list]);		//�Ƿ�������Ŀר�ñ�ǩ
$ch_pagetype = 2;									//2,Ϊlistҳ,3,Ϊbencandyҳ
$ch_module = $webdb[module_id]?$webdb[module_id]:99;//ϵͳ�ض�ID����,ÿ��ϵͳ������ͬ
$ch = 0;											//�������κ�ר��
require(ROOT_PATH."inc/label_module.php");

require(Mpath."inc/head.php");
require($fidDB[type]?getTpl("bigsort",$FidTpl['list']):getTpl("list_$fidDB[mid]",$FidTpl['list']));
require(Mpath."inc/foot.php");

 


/**
*�����Ŀ��ȡ������Ϣ�б�
**/
function ListThisSort($rows,$leng){
	global $db,$_pre,$page,$fid,$fidDB,$SQL,$city_id,$zone_id,$street_id,$field_db,$timestamp,$webdb,$timestamp,$Murl,$Fid_db,$_erp,$totalNum,$otherSelect,$Module_db;
	$SQL='';
	if($street_id>0){
		$SQL =" AND A.street_id='$street_id' ";
	}elseif($zone_id>0){
		$SQL =" AND A.zone_id='$zone_id' ";
	}elseif($city_id>0){
		$SQL =" AND A.city_id='$city_id' ";
	}

	//�û��Զ���ɸѡ�ֶ�,��������
	foreach($field_db AS $key=>$value){
		if($value[listfilter]){
			if($_GET[$key]!=''){
				$otherSelect++;
				$SQL .=" AND B.`$key`='$_GET[$key]' ";
			}
		}
	}

	if(!$webdb[Info_ShowNoYz]){
		$SQL .=" AND A.yz='1' ";
	}
	if($page<1){
		$page=1;
	}
	if($fidDB[listorder]==1){
		$sql_list="A.posttime";
		$sql_order="DESC";
	}elseif($fidDB[listorder]==2){
		$sql_list="A.posttime";
		$sql_order="ASC";
	}elseif($fidDB[listorder]==3){
		$sql_list="A.hits";
		$sql_order="DESC";
	}elseif($fidDB[listorder]==4){
		$sql_list="A.hits";
		$sql_order="ASC";
	}elseif($fidDB[listorder]==5){
		$sql_list="A.lastview";
		$sql_order="DESC";
	}else{
		$sql_list="A.list";
		$sql_order="DESC";
	}

	$min=($page-1)*$rows;

	$query=$db->query("SELECT SQL_CALC_FOUND_ROWS B.*,A.* FROM {$_pre}content$_erp A LEFT JOIN {$_pre}content_{$fidDB[mid]} B ON A.id=B.id WHERE A.fid=$fid $SQL ORDER BY $sql_list $sql_order LIMIT $min,$rows");
	$RS=$db->get_one("SELECT FOUND_ROWS()");
	$totalNum=$RS['FOUND_ROWS()'];
	while( $rs=$db->fetch_array($query) ){
		if(del_EndTimeInfo($rs)){	//�Զ�ɾ��������Ϣ
			continue;
		}
		$rs[content]=@preg_replace('/<([^>]*)>/is',"",$rs[content]);	//��HTML������˵�
		$rs[content]=get_word($rs[full_content]=$rs[content],100);
		$rs[title]=get_word($rs[full_title]=$rs[title],$leng);
		if($rs['list']>$timestamp){
			$rs[title]=" <font color='$webdb[Info_TopColor]'>$rs[title]</font> <img src='$webdb[www_url]/images/default/icotop.gif' border=0>";
		}elseif($rs['list']>$rs[posttime]){
			//�ö����ڵ���Ϣ,��Ҫ�ָ�ԭ�����������Է�������,���ں���
			$db->query("UPDATE {$_pre}content$_erp SET list='$rs[posttime]' WHERE id='$rs[id]'");
		}
		$times=$timestamp-$rs[posttime];
		if(!$webdb[Info_list_cache]&&$times<3600){
			$rs[times]=ceil($times/60).'����ǰ';
		}elseif(!$webdb[Info_list_cache]&&$times<3600*24){
			$rs[times]=ceil($times/3600).'Сʱǰ';
		}else{
			$rs[times]=date("m-d",$rs[posttime]);
		}
	
		$rs[posttime]=date("Y-m-d",$rs[full_time]=$rs[posttime]);
		if($rs[picurl]){
			$rs[picurl]=tempdir($rs[picurl]);
		}
	
		$Module_db->showfield($field_db,$rs,'list');
	
		$rs[url]=get_info_url($rs[id],$rs[fid],$rs[city_id]);
		$listdb[]=$rs;
	}
	return $listdb;
}


/**
*�����
**/
function ListOnlySort(){
	global $Fid_db,$module_DB,$fid,$city_id;
	foreach($Fid_db[$fid] AS $key=>$value){
		unset($rs);
		$rs[name]=$value;
		$rs[fid]=$key;
		$rs[url]=get_info_url('',$rs[fid],$city_id);
		$msconfig=$module_DB[$Fid_db[mid][$key]][field][sortid];
		$detail=explode("\r\n",$msconfig[form_set]);
		foreach( $detail AS $key2=>$value2){
			$detail2=explode("|",$value2);
			$url=get_info_url('',$rs[fid],$city_id,$zoneid,$streetid,array('sortid'=>"$detail2[0]"));
			$rs[sortdb][]="<A HREF='$url'>$detail2[1]</A>";
		}
		$listdb[]=$rs;
	}
	return $listdb;
}

?>