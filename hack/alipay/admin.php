<?php
!function_exists('html') && exit('ERR');
if($job=='list'&&$Apower[alipay_set])
{
	if(!$page){
		$page=1;
	}
	$rows=50;
	$min=($page-1)*$rows;
	$showpage=getpage("`{$pre}olpay`"," ","?lfj=$lfj&job=$job","$rows");
	$query = $db->query("SELECT * FROM `{$pre}olpay` ORDER BY id DESC LIMIT $min,$rows");
	while($rs = $db->fetch_array($query)){
		$rs[posttime]=date("Y-m-d H:i:s",$rs[posttime]);

		if($rs[ifpay]){
			$rs[ifpay]='<font color=red>��֧��<font>';
			$rs[setpay]='';
		}else{
			
			$rs[ifpay]='δ֧��';
			$rs[setpay]="<A HREF='?lfj=$lfj&action=setpay&id=$rs[id]'>��ֵ</A>";
		}
		$listdb[]=$rs;
	}

	hack_admin_tpl('list');
}
elseif($action=="delete"&&$Apower[alipay_set])
{
	if($id){
		$db->query("DELETE FROM `{$pre}olpay` WHERE id='$id'");
	}else{
		foreach( $listdb AS $key=>$id){
			$db->query("DELETE FROM `{$pre}olpay` WHERE id='$id'");
		}
	}
	jump("ɾ���ɹ�","$FROMURL","1");
}

elseif($action=='setpay'&&$Apower[alipay_set])
{
	$rt = $db->get_one("SELECT * FROM {$pre}olpay WHERE id='$id'");
	if(!$rt){
		showmsg('ϵͳ��û�����ĳ�ֵ�������޷���ɳ�ֵ��');
	}
	if($rt['ifpay'] == 1){
		showmsg('�ö����Ѿ���ֵ�ɹ���');
	}
	$db->query("UPDATE {$pre}olpay SET ifpay='1' WHERE id='$rt[id]'");

	$num=$rt[money]*$webdb[alipay_scale];

	add_user($rt[uid],$num,'���߳�ֵ');

	jump("��ֵ�ɹ�","$FROMURL","1");
}

?>