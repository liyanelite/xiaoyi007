<?php
//��������

if(!$webdb[vipselfdomain]){
	//showerr("ϵͳ�ر��˶�����������");
}

if(!$step){

 


}else{
	if(!$web_admin&&!$groupdb['use2domain']){
		showerr('����Ȩʹ��');
	}
	$host=trim($host);
	//���
	if(!preg_match("/^[a-z\d]{2,12}$/",$host))  		showerr("��������ֻ��ʹ��ĸ�������֣�������2-12���ַ�֮��,��ȫ��Сд");
	$limitmain=explode("\r\n",$webdb[vipselfdomaincannot]);
	if(in_array($host,$limitmain)) showerr("�˶�������Ϊϵͳ��������������ʹ�ã��뻻һ������");

	$rt=$db->get_one("SELECT COUNT(*) AS num FROM  {$_pre}company WHERE host='$host' AND  uid!='$uid'");
	if($rt[num]>0) showerr("[ $host ]�Ѿ�������ʹ���ˣ��뻻һ������");
	//����
	$db->query("UPDATE {$_pre}company SET
		`host`='$host'
		WHERE uid='$uid' ");
	refreshto("?uid=$uid&atn=$atn","���óɹ�");
}


?>