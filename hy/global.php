<?php
define('Mpath',dirname(__FILE__).'/');
define( 'Mdirname' , preg_replace("/(.*)\/([^\/]+)/is","\\2",str_replace("\\","/",dirname(__FILE__))) );

require_once(Mpath."../inc/common.inc.php");
require_once(Mpath."data/config.php");			//ϵͳȫ�ֱ���
@include_once(ROOT_PATH."data/ad_cache.php");	//ȫվ�����������ļ�
@include_once(ROOT_PATH."data/label_hf.php");	//��ǩ��ͷ��׵ı���ֵ
$Fid_db = include(Mpath."data/all_fid.php");		//��Ŀ������

$_pre="{$pre}{$webdb[module_pre]}";					//���ݱ�ǰ׺

$Murl=$webdb[www_url].'/'.Mdirname;					//��ģ��ķ��ʵ�ַ
$Mdomain=$ModuleDB[$webdb[module_pre]][domain]?$ModuleDB[$webdb[module_pre]][domain]:$Murl;



/**
*ǰ̨�Ƿ񿪷�
**/
if($webdb[module_close])
{
	$webdb[Info_closeWhy]=str_replace("\r\n","<br>",$webdb[Info_closeWhy]);
	showerr("��ϵͳ��ʱ�ر�:$webdb[Info_closeWhy]");
}



unset($foot_tpl,$head_tpl,$index_tpl,$list_tpl,$bencandy_tpl);
$ch=intval($ch);
$fid=intval($fid);
$id=intval($id);
$page=intval($page);


$fendb=array();

$fendb[fen1][name]="����";
$fendb[fen2][name]="����";
$fendb[fen3][name]="����";
$fendb[fen4][name]="��λ";
$fendb[fen5][name]="ϲ���̶�";

$fendb[fen1][set]="1=��\r\n2=һ��\r\n3=��\r\n4=�ܺ�\r\n5=�ǳ���";
$fendb[fen2][set]="1=��\r\n2=һ��\r\n3=��\r\n4=�ܺ�\r\n5=�ǳ���";
$fendb[fen3][set]="1=��\r\n2=һ��\r\n3=��\r\n4=�ܺ�\r\n5=�ǳ���";
$fendb[fen4][set]="1=����\r\n2=����\r\n3=��\r\n4=�ܹ�";
$fendb[fen5][set]="1=��ϲ��\r\n2=����ν\r\n3=ϲ��\r\n4=��ϲ��";


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
		if(strstr($name,'zone')&&is_file(Mpath."php168/zone/$fup.php")){
			include(Mpath."php168/zone/$fup.php");
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







function fen_value($title,$set,$v){
	global $webdb;
	$shows="";
	$detail=explode("\r\n",$set);
	foreach( $detail AS $key=>$value){
		$d=explode("=",$value);
		if($d[0]==$v){
			$va ="$d[1]";
		}
	}
	$shows.=" <span class='title'>$title:</span>";
	for($i=0;$i<$v;$i++){
		$shows.="<img alt='$va' src='$webdb[www_url]/images/default/icon_star_2.gif'>";
	}
	for($j=(count($detail)-$i);$j>0 ;$j-- ){
		$shows.="<img alt='$va' src='$webdb[www_url]/images/default/icon_star_1.gif'>";
	}
	return $shows;
}
function fen6_value($title,$set,$v){
	$array=explode(",",$v);
	$detail=explode("\r\n",$set);
	foreach( $detail AS $key=>$value){
		if(in_array($value,$array)){
			$va[] ="$value";
		}
	}
	if(!$va){
		return ;
	}
	$shows =" <span class='title'>{$title}��</span>";
	$shows.=implode(" ",$va);
	if($title){
		return $shows;
	}	
}

function get_dianping($rows=5,$leng=80){
	global $_pre,$pre,$db,$fendb,$city_id;
	$query=$db->query("SELECT A.*,C.title,D.icon FROM `{$_pre}dianping` A LEFT JOIN `{$_pre}company` C ON A.id=C.uid LEFT JOIN {$pre}memberdata D ON A.uid=D.uid WHERE C.city_id='$city_id' ORDER BY cid DESC LIMIT  $rows");
	while( $rs=$db->fetch_array($query) ){	
		$rs[fen]='';
		$rs[fen].=fen_value($fendb[fen1][name],$fendb[fen1][set],$rs[fen1]);
		$rs[fen].=fen_value($fendb[fen2][name],$fendb[fen2][set],$rs[fen2]);
		$rs[fen].=fen_value($fendb[fen3][name],$fendb[fen3][set],$rs[fen3]);
		$rs[fen].=fen_value($fendb[fen4][name],$fendb[fen4][set],$rs[fen4]);
		//$rs[fen].=fen_value($fendb[fen5][name],$fendb[fen5][set],$rs[fen5]);
		$rs[fen6]=fen6_value($fendb[fen6][name],$fendb[fen6][set],$rs[fen6]);
	
		$rs[icon] && $rs[icon]=tempdir($rs[icon]);
		if(!$rs[username]){		
			$detail=explode(".",$rs[ip]);
			$rs[username]="$detail[0].$detail[1].$detail[2].*";
		}

		$rs[posttime]=date("Y-m-d H:i:s",$rs[posttime]);

		$rs[full_content]=$rs[content];

		$rs[content]=get_word($rs[content],$leng); 

		$rs[content]=str_replace("<br>","",$rs[content]);

		$listdb[]=$rs;
	}
	return $listdb;
}


function get_company_list($type='new',$rows=10){
	global $db,$_pre,$pre;
	if($type=='new'){
		$order='rid';
	}elseif($type=='hot'){
		$order='hits';
	}elseif($type=='com'){
		$order='levelstime';
		$SQL = " WHERE levels='1' ";
	}
	$query = $db->query("SELECT * FROM {$_pre}company $SQL ORDER BY $order DESC LIMIT $rows");
	while($rs = $db->fetch_array($query)){
		$listdb[]=$rs;
	}
	return $listdb;
}

?>