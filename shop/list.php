<?php
require(dirname(__FILE__)."/global.php");

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
unset($TempSearch_2,$TempSearch_array);
foreach($field_db AS $key=>$value){
	if($value[listfilter]){
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


/**
*��Ŀģ�������ڳ���ģ��
**/
if($fidDB[template]){
	$FidTpl=unserialize($fidDB[template]);
	$FidTpl['head'] && $head_tpl=Mpath.$FidTpl['head'];
	$FidTpl['foot'] && $foot_tpl=Mpath.$FidTpl['foot'];
	$FidTpl['list'] && $FidTpl['list']=Mpath.$FidTpl['list'];
}

$rows = $fidDB[maxperpage]>0 ? $fidDB[maxperpage] : 15;

$listdb=array();

if($page<1){
	$page=1;
}

$min=($page-1)*$rows;

//����ʽ
switch($fidDB['listorder']){
	case 1:
		$sql_list="A.posttime";
		$sql_order="DESC";
		break;
	case 2:
		$sql_list="A.posttime";
		$sql_order="ASC";
		break;
	case 3:
		$sql_list="A.hits";
		$sql_order="DESC";
		break;
	case 4:
		$sql_list="A.hits";
		$sql_order="ASC";
		break;
	case 5:
		$sql_list="A.lastview";
		$sql_order="DESC";
		break;
	default:
		$sql_list="A.list";
		$sql_order="DESC";
		break;
}

$SQL = '';

if($city_id>0){
	$SQL = " AND A.city_id='$city_id' ";
}

//�û��Զ���ɸѡ�ֶ�,��������
foreach($field_db AS $key=>$value){
	if($value[listfilter]){
		if($_GET[$key]!=''){
			$SQL .= " AND B.`$key`='$_GET[$key]' ";
		}
	}
}

if(!$webdb[Info_ShowNoYz]){
	$SQL .= " AND A.yz='1' ";
}

if($Fid_db[$fid]){

	$SQL=" LEFT JOIN {$_pre}sort S ON A.fid=S.fid WHERE S.fup='$fid' $SQL ";
}else{

	$SQL = " WHERE A.fid='$fid' $SQL ";
}


$query=$db->query("SELECT SQL_CALC_FOUND_ROWS B.*,A.*,C.title AS companyname,C.renzheng  FROM {$_pre}content A LEFT JOIN {$_pre}content_{$fidDB[mid]} B ON A.id=B.id LEFT JOIN {$pre}hy_company C ON A.uid=C.uid $SQL ORDER BY $sql_list $sql_order LIMIT $min,$rows");

$RS=$db->get_one("SELECT FOUND_ROWS()");
$totalNum=$RS['FOUND_ROWS()'];
$showpage=getpage("","","list.php?fid=$fid",$rows,$totalNum);

while( $rs=$db->fetch_array($query) ){

	$rs[content]=@preg_replace('/<([^<]*)>/is',"",$rs[content]);	//��HTML������˵�
	$rs[content]=get_word($rs[full_content]=$rs[content],100);
	$rs[title]=get_word($rs[full_title]=$rs[title],50);
	if($rs['list']>$timestamp){
		$rs[title]=" <font color='$webdb[Info_TopColor]'>$rs[title]</font> <img src='$webdb[www_url]/images/default/icotop.gif' border=0>";
	}elseif($rs['list']>$rs[posttime]){
		//�ö����ڵ���Ϣ,��Ҫ�ָ�ԭ�����������Է�������,���ں���
		$db->query("UPDATE {$_pre}content SET list='$rs[posttime]' WHERE id='$rs[id]'");
	}

	$rs[posttime]=date("Y-m-d",$rs[full_time]=$rs[posttime]);
	if($rs[picurl]){
		$rs[picurl]=tempdir($rs[picurl]);
	}

	$Module_db->showfield($field_db,$rs,'list');

	$rs[url]=get_info_url($rs[id],$rs[fid],$rs[city_id]);

	$listdb[]=$rs;
}

/**
*Ϊ��ȡ��ǩ����
**/
$chdb[main_tpl] = getTpl("list_$fidDB[mid]",$FidTpl['list']);

/**
*��ǩ
**/
$ch_fid	= intval($fidDB[config][label_list]);		//�Ƿ�������Ŀר�ñ�ǩ
$ch_pagetype = 2;									//2,Ϊlistҳ,3,Ϊbencandyҳ
$ch_module = $webdb[module_id]?$webdb[module_id]:99;//ϵͳ�ض�ID����,ÿ��ϵͳ������ͬ
$ch = 0;											//�������κ�ר��
require(ROOT_PATH."inc/label_module.php");

require(ROOT_PATH."inc/head.php");
require(getTpl("list_$fidDB[mid]",$FidTpl['list']));
require(ROOT_PATH."inc/foot.php");

?>