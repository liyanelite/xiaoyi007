<?php
define('Memberpath',dirname(__FILE__).'/');
require(Memberpath."../global.php");

/**
*ǰ̨�Ƿ񿪷�
**/
if($webdb[module_close])
{
	$webdb[Info_closeWhy]=str_replace("\r\n","<br>",$webdb[Info_closeWhy]);
	showerr("��ϵͳ��ʱ�ر�:$webdb[Info_closeWhy]");
}

if(!$lfjid){
	showerr("�㻹û��¼");
}

/**
*��Ҫ�ṩ������,����,�ضε�ѡ��ʹ��
**/
function select_where2($table,$name='fup',$ck='',$fup=''){
	global $db;
	if($fup){
		$SQL=" WHERE fup='$fup' ";
	}
	$query = $db->query("SELECT * FROM $table $SQL ORDER BY list DESC");
	while($rs = $db->fetch_array($query)){
		$ckk=$ck==$rs[fid]?" selected ":" ";
		$show.="<option value='$rs[fid]' $ckk>$rs[name]</option>";
	}
	return "<select id='$table' name=$name><option value=''>��ѡ��</option>$show</select>";
}

?>