<?php
require("global.php");

if(!$lfjid){
	showerr("�㻹û��¼");
}

$lfjdb[money]=get_money($lfjuid);
$webdb[MoneyRatio]=intval($webdb[MoneyRatio]);


if($action=="del_record"){
	$db->query("DELETE FROM {$pre}olpay WHERE uid='$lfjuid' AND id='$id'");
}
if($job=="record")
{
	if($page<1){
		$page=1;
	}
	$rows=20;
	$min=($page-1)*$rows;
	unset($listdb);
	$showpage=getpage("{$pre}olpay","WHERE uid='$lfjuid'","?job=$job",$rows);
	$query = $db->query("SELECT * FROM {$pre}olpay WHERE uid='$lfjuid' ORDER BY id DESC LIMIT $min,$rows");
	while($rs = $db->fetch_array($query)){
		$rs[ifpay]=$rs[ifpay]?"<font color=red>֧���ɹ�</font>":"֧��ʧ��";
		$rs[posttime]=date("Y-m-d H:i:s",$rs[posttime]);
		if($rs[banktype]=='tenpay'){
			$rs[banktype]="�Ƹ�ͨ";
		}elseif($rs[banktype]=='alipay'){
			$rs[banktype]="֧����";
		}elseif($rs[banktype]=='99pay'){
			$rs[banktype]="��Ǯ";
		}elseif($rs[banktype]=='yeepay'){
			$rs[banktype]="�ױ�֧��";
		}else{
			$rs[banktype]="������ʽ";
		}
		$listdb[]=$rs;
	}
}

require(dirname(__FILE__)."/"."head.php");
require(dirname(__FILE__)."/"."template/money.htm");
require(dirname(__FILE__)."/"."foot.php");

?>