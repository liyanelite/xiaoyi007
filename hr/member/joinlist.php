<?php
require_once("global.php");

if(!$lfjid)
{
	showerr("你还没有登录");
}


	$mid=2;
	$field_db = $module_DB[$mid][field];

	//字段筛选
	unset($TempSearch_2,$TempSearch_array);
	foreach($field_db AS $key=>$value){
		if($value[listfilter]){
			$TempSearch_2.="$key=>'{$$key}',";		//分页链接使用
			$TempSearch_array[$key]=$$key;			//其它链接使用
			$search_fieldDB[$key][$$key!=''?$$key:0]=" selected class='ck' style='color:red;'";
		}
	}

	$rows=20;

	if($page<1){
		$page=1;
	}
	$min=($page-1)*$Lrows;

	if($cid){
		$SQL=" A.cid='$cid' ";
	}else{
		$SQL=" 1 ";
	}

	$query = $db->query("SELECT SQL_CALC_FOUND_ROWS A.*,B.*,C.* FROM {$_pre}person A LEFT JOIN {$_pre}content_$mid C ON A.id=C.id LEFT JOIN {$pre}memberdata B ON A.uid=B.uid WHERE $SQL ORDER BY A.posttime DESC LIMIT $min,$rows");

	$RS=$db->get_one("SELECT FOUND_ROWS()");
	$totalNum=$RS['FOUND_ROWS()'];

	while($rs = $db->fetch_array($query)){
		$Module_db->showfield($field_db,$rs,'list');
		$rs[username] || $rs[username] = $rs[ip];
		$rs[picurl] = tempdir($rs[icon]);
		$rs[posttime] = date("Y-m-d H:i:s",$rs[posttime]);
		$listdb[]=$rs;
	}

	$listfilter_file="?";

	if($totalNum){
		$showpage=getpage("","","list.php?",$rows,$totalNum);
		$showpage=preg_replace("/list\.php\?&page=([0-9]+)/eis","get_info_url('',$fid,array($TempSearch_2'page'=>'\\1'),'$listfilter_file')",$showpage);
	}

require(ROOT_PATH."member/head.php");
require(Memberpath."../template/member/list_2.htm");
require(ROOT_PATH."member/foot.php");

?>