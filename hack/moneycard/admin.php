<?php
!function_exists('html') && exit('ERR');
if($job=="make"&&$Apower[moneycard_make])
{

	hack_admin_tpl('make');
}
elseif($action=='make'&&$Apower[moneycard_make])
{
	if($atc_mcard<1){
		showmsg("ÿ�ų�ֵ����ߺ��е�{$webdb[MoneyName]}����С��1{$webdb[MoneyDW]}");
	}
	if($atc_leng<1){
		showmsg("��ֵ������λ������С��1λ");
	}
	if($atc_leng>32){
		showmsg("��ֵ������λ�����ܴ���32λ");
	}
	if($atc_num<1){
		showmsg("Ҫ�����ĳ�ֵ������С��1��");
	}
	$letter_str='1234567890qwertyuiopasdfghjklzxcvbnm';
	for($i=0;$i<$atc_num;$i++){
		$passwd='';
		for($j=0;$j<$atc_leng ;$j++ ){
			if($atc_type==1){
				$startnum=rand(0,9);
			}elseif($atc_type==2){
				$startnum=rand(10,25);
			}else{
				$startnum=rand(0,25);
			}
			$passwd.=substr($letter_str,$startnum,1);
		}
		$db->query("INSERT INTO `{$pre}moneycard` (`passwd`, `moneyrmb`, `moneycard`) VALUES ('$passwd', '$atc_rmb', '$atc_mcard')");
	}
	jump("�����ɹ�","?lfj=$lfj&job=list","1");
}
elseif($job=='list'&&$Apower[moneycard_make])
{
	if(!$page){
		$page=1;
	}
	$rows=50;
	$min=($page-1)*$rows;
	$query = $db->query("SELECT * FROM `{$pre}moneycard` ORDER BY id DESC LIMIT $min,$rows");
	$showpage=getpage("{$pre}moneycard","","?lfj=$lfj&job=$job",$rows);
	while($rs = $db->fetch_array($query)){
		if($rs[ifsell]){
			$rs[posttime]=date("Y-m-d H:i",$rs[posttime]);
			$rs[ifsell]='<font color=red>��ʹ��<font>';
		}else{
			$rs[posttime]='';
			$rs[ifsell]='δʹ��';
		}
		$listdb[]=$rs;
	}

	hack_admin_tpl('list');
}
elseif($action=="delete"&&$Apower[moneycard_make])
{
	if($id){
		$db->query("DELETE FROM `{$pre}moneycard` WHERE id='$id'");
	}else{
		foreach( $listdb AS $key=>$id){
			$db->query("DELETE FROM `{$pre}moneycard` WHERE id='$id'");
		}
	}
	jump("ɾ���ɹ�","$FROMURL","1");
}
elseif($action=="print"&&$Apower[moneycard_make])
{
	if(!$listdb){
		showmsg("��ѡ��һ��");
	}
	$ids=implode(",",$listdb);
	unset($listdb);
	$query = $db->query("SELECT * FROM `{$pre}moneycard` WHERE id IN ($ids) ORDER BY id DESC ");
	while($rs = $db->fetch_array($query)){
		$listdb[]=$rs;
	}
	//require("head.php");
	require(dirname(__FILE__)."/template/print.htm");
	//require("foot.php");
}
?>