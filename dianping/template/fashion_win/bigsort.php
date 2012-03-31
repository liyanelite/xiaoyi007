<?php
unset($listdb);
//$rows=$fidDB[maxperpage]>0?$fidDB[maxperpage]:20;	//每页读取几条数据
$rows=5;
if(!$page){
	$page=1;
}
$min=($page-1)*$rows;

//分表后要特别处理
if($Fid_db[tableid]){
	$query = $db->query("SELECT SQL_CALC_FOUND_ROWS C.* FROM {$_pre}db C LEFT JOIN {$_pre}sort S ON C.fid=S.fid WHERE S.fup='$fidDB[fid]' AND C.city_id='$city_id' ORDER BY C.id DESC LIMIT $min,$rows");
	$RS=$db->get_one("SELECT FOUND_ROWS()");
	while($rs = $db->fetch_array($query)){
		$_erp=$Fid_db[tableid][$rs[fid]];
		$rs=$db->get_one("SELECT * FROM {$_pre}content$_erp WHERE id=$rs[id]");
		if(del_EndTimeInfo($rs)){	//自动删除过期信息
			continue;
		}
		$rs[picurl] && $rs[picurl]=tempdir($rs[picurl]);
		$rs[posttime]=date("y-m-d H:i",$rs[posttime]);
		$rs[url]=get_info_url($rs[id],$rs[fid],$rs[city_id]);
		$listdb[]=$rs;
	}
}else{
	$SQL='';
	$zone_id && $SQL .= " AND C.zone_id='$zone_id' ";
	$street_id && $SQL .= " AND C.street_id='$street_id' ";
	$query = $db->query("SELECT SQL_CALC_FOUND_ROWS C.* FROM {$_pre}content C LEFT JOIN {$_pre}sort S ON C.fid=S.fid WHERE S.fup='$fidDB[fid]' AND C.city_id='$city_id' $SQL ORDER BY C.id DESC LIMIT $min,$rows");
	$RS=$db->get_one("SELECT FOUND_ROWS()");
	while($rs = $db->fetch_array($query)){
		if(del_EndTimeInfo($rs)){	//自动删除过期信息
			continue;
		}
		$rs[picurl] && $rs[picurl]=tempdir($rs[picurl]);
		$rs[posttime]=date("y-m-d H:i",$rs[posttime]);
		$rs[url]=get_info_url($rs[id],$rs[fid],$rs[city_id]);
		$listdb[]=$rs;
	}
}

if($RS['FOUND_ROWS()']){
	$showpage=getpage("","","list.php?",$rows,$RS['FOUND_ROWS()']);
	$showpage=preg_replace("/list\.php\?&page=([0-9]+)/eis","get_info_url('',$fid,$city_id,$zone_id,$street_id,array($TempSearch_2'page'=>'\\1'))",$showpage);
}
?>