<?php
require("global.php");

if(in_array($banktype,array('alipay','tenpay','99pay','yeepay'))){
	include(ROOT_PATH."inc/olpay/{$banktype}.php");
}elseif($banktype){
	showerr("֧����������!");	
}

$lfjdb[money]=get_money($lfjuid);

require(ROOT_PATH."inc/head.php");
require(html("buymoneycard"));
require(ROOT_PATH."inc/foot.php");


function olpay_send(){
	global $db,$pre,$webdb,$banktype,$atc_moeny,$timestamp,$lfjuid,$lfjid,$webdb;
	
	$atc_moeny = intval($atc_moeny);
	if($atc_moeny<1){
		showerr("������ĳ�ֵ����С��1");
	}

	$array[money]=$atc_moeny;
	$array[return_url]="$webdb[www]/do/buymoneycard.php?banktype=$banktype&";
	$array[title]="����{$webdb[MoneyName]},Ϊ{$lfjid}���߳�ֵ";
	$array[content]="Ϊ�ʺ�:$lfjid,���߸����{$webdb[MoneyName]}";
	$array[numcode]=strtolower(rands(10));

	$db->query("INSERT INTO {$pre}olpay (`numcode` , `money` , `posttime` , `uid` , `username`, `banktype`, `paytype` ) VALUES ('$array[numcode]','$array[money]','$timestamp','$lfjuid','$lfjid','$banktype','1')");

	return $array;
}

function olpay_end($numcode){
	global $db,$pre,$webdb,$banktype;

	$rt = $db->get_one("SELECT * FROM {$pre}olpay WHERE numcode='$numcode' AND `paytype`=1");
	if(!$rt){
		showerr('ϵͳ��û�����ĳ�ֵ�������޷���ɳ�ֵ��');
	}
	if($rt['ifpay'] == 1){
		showerr('�ö����Ѿ���ֵ�ɹ���');
	}
	$db->query("UPDATE {$pre}olpay SET ifpay='1' WHERE id='$rt[id]'");

	$num=$rt[money]*$webdb[alipay_scale];
	
	add_user($rt[uid],$num,'���߳�ֵ');

	refreshto("$webdb[www_url]/","��ϲ���ֵ�ɹ�",10);
}

?>