<?php
require("global.php");

if(in_array($banktype,array('alipay','tenpay','99pay','yeepay'))){
	include(ROOT_PATH."inc/olpay/{$banktype}.php");
}elseif($banktype){
	showerr("֧����������!");	
}

require(ROOT_PATH."inc/head.php");
require(html("olpay"));
require(ROOT_PATH."inc/foot.php");

function olpay_send(){
	global $db,$pre,$webdb,$banktype,$atc_moeny,$timestamp,$lfjuid,$lfjid,$pay_code;
	
	if(!$pay_code){
		showerr("��������!");
	}
	list($type,$atc_moeny,$numcode,$mid)=explode("\t",mymd5($pay_code,'DE'));
	
	while(strlen($numcode)<10){
		$numcode="0$numcode";
	}

	$array[money]=$atc_moeny;
	$pay_code = str_replace('=','QIBO',$pay_code);	//������š�=�����׳�����
	$array[return_url]="$webdb[www_url]/do/olpay.php?banktype=$banktype&pay_code=$pay_code&";
	$array[title]="���߸���";
	$array[content]="Ϊ�ʺ�:$lfjid,���߸���";
	$array[numcode]=$numcode;
	
	//���ܱ�����
	if($type=='form'){
		$db->query("INSERT INTO {$pre}olpay (`numcode` , `money` , `posttime` , `uid` , `username`, `banktype`, `formid` ) VALUES ('$array[numcode]','$array[money]','$timestamp','$lfjuid','$lfjid','$banktype','$mid')");
	
	//�̳Ƕ���
	}elseif($type=='module'){
		$db->query("INSERT INTO {$pre}olpay (`numcode` , `money` , `posttime` , `uid` , `username`, `banktype`, `moduleid` ) VALUES ('$array[numcode]','$array[money]','$timestamp','$lfjuid','$lfjid','$banktype','$mid')");
	}

	return $array;
}

function olpay_end($numcode){
	global $db,$pre,$webdb,$banktype,$pay_code,$lfjuid;

	if(!$pay_code){
		showerr("��������!!");
	}
	list($type,$atc_moeny,$atc_numcode,$mid,$shopmoney)=explode("\t",mymd5($pay_code,'DE'));
	if($atc_numcode!=intval($numcode)){
		showerr("���ݱ��޸Ĺ�!!");
	}

	//��Ҫ�����֧�������ܵ���һλ���ֵ�����,inc/olpay/alipay.php,�ļ��������޸�
	$numcode=str_replace("code","",$numcode);

	//���ܱ�����
	if($type=='form'){
		$rt = $db->get_one("SELECT * FROM {$pre}olpay WHERE numcode='$numcode' AND `formid`='$mid'");

	//�̳Ƕ���
	}elseif($type=='module'){
		$rt = $db->get_one("SELECT * FROM {$pre}olpay WHERE numcode='$numcode' AND `moduleid`='$mid'");
		$db->query("UPDATE {$pre}shoporderuser SET ifpay='1' WHERE id='$atc_numcode'");
		//��������
		if($shopmoney){
			add_user($lfjuid,$shopmoney,'������Ʒ�÷�');
		}
	}	
	if(!$rt){
		showerr('ϵͳ��û�����Ķ������޷����֧����');
	}
	if($rt['ifpay'] == 1){
		showerr('�ö����Ѿ�֧���ɹ���');
	}
	$db->query("UPDATE {$pre}olpay SET ifpay='1' WHERE id='$rt[id]'");

	refreshto("$webdb[www_url]/","��ϲ��֧���ɹ�",60);
}

?>