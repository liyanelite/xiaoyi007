<?php
require(dirname(__FILE__)."/global.php");

$mid = 1;

$field_db = $module_DB[$mid][field];

if($action=="search")
{
	if(!$webdb[Info_allowGuesSearch]&&!$lfjid)
	{
		showerr("请先登录");
	}

	$type || $type='title';

	$keyword=trim($keyword);
	$keyword=str_replace("%",'\%',$keyword);
	$keyword=str_replace("_",'\_',$keyword);

	if(!$keyword){	
		showerr("关键字不能为空!");
	}

	/*每页显示50条*/
	$rows=50;
	if(!$page){	
		$page=1;
	}
	$min=($page-1)*$rows;


	if($keyword){
		if( $type && table_field("{$_pre}content_$mid",$type) ){			
			$field="B.$type";
		}elseif($type=='username'){
			$field="A.username";
		}else{
			$field="A.title";
		}
		$_SQL=" $field LIKE '%$keyword%' ";
	}else{
		$_SQL=" 1 ";
	}

	if($fid>0){
		$_SQL.=" AND A.fid='$fid' ";
	}
	
	$search_url='';
	foreach( $postdb AS $key=>$value)
	{
		if( $value && table_field("{$_pre}content_$mid",$key) )
		{
			$_SQL.=" AND B.`$key`='$value' ";
			$rsdb[$key][$value]=" selected ";
			$value=urlencode($value);
		}
		$search_url.="&postdb[{$key}]=$value";
	}
	$query = $db->query("SELECT SQL_CALC_FOUND_ROWS A.*,B.* FROM {$_pre}content A LEFT JOIN {$_pre}content_$mid B ON A.id=B.id WHERE A.mid='$mid' AND $_SQL ORDER BY A.posttime DESC LIMIT $min,$rows");

	$RS=$db->get_one("SELECT FOUND_ROWS()");
	$totalNum=$RS['FOUND_ROWS()'];

	while($rs = $db->fetch_array($query))
	{
		$rs[posttime]=date("Y-m-d H:i",$rs[posttime]);
		$rs[content]=@preg_replace('/<([^>]*)>/is',"",$rs[content]);
		$rs[content]=get_word($rs[content],150);
		$field_db && $Module_db->showfield($field_db,$rs,'list');
		$listdb[]=$rs;
	}

	//分页功能
	$showpage=getpage('','',"?mid=$mid&fid=$fid&keyword=$keyword&action=search&type=$type$search_url",$rows,$totalNum);

	$typedb[$type]=" checked ";
}

else
{
	$typedb[title]=" checked ";
}


$fid_select="<select name='fid' onChange=\"if(this.options[this.selectedIndex].value=='-1'){alert('你不能选择大分类');}\"><option value='0' style='color:#aaa;'>所有栏目</option>";
foreach( $Fid_db[0] AS $key=>$value){
	$fid_select.="<option value='-1' style='color:red;'>$value</option>";
	foreach( $Fid_db[$key] AS $key2=>$value2){
		$ckk=$fid==$key2?' selected ':' ';
		$fid_select.="<option value='$key2' $ckk>&nbsp;&nbsp;|--$value2</option>";
	}
}
$fid_select.="</select>";



require(ROOT_PATH."inc/head.php");
require(getTpl("search_$mid"));
require(ROOT_PATH."inc/foot.php");

?>