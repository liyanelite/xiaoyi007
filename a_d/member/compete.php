<?php
require_once("global.php");

$linkdb=array(
			"���λ�б�"=>"?job=list",
			"�ҹ���Ĺ��"=>"?job=mylist"
			);

if(!$lfjid)
{
	showerr("���ȵ�¼");
}

if($job=='buy')
{
	$rsdb = $db->get_one(" SELECT * FROM `{$pre}ad_compete_place` WHERE id='$id' ");
	$_s2=$db->get_one("SELECT COUNT(*) AS Num FROM `{$pre}ad_compete_user` WHERE id='$id' AND endtime>$timestamp AND city_id='$city_id'");
	if($_s2[Num]>=$rsdb[adnum]){
		showerr("�ܱ�Ǹ,�����λĿǰ��ûλ����");
	}
	$lfjdb[money]=intval(get_money($lfjdb[uid]));

	if(!$rsdb){
		showerr("���λ������");
	}
	if($step){
		if($postdb[price]<$rsdb[price]){
			showerr("����۲��ܵ���ϵͳ�涨����ͼ�:$rsdb[price]");
		}elseif($postdb[price]>$lfjdb[money]){
			showerr("����۲��ܴ���������Ļ���");
		}elseif($rsdb[wordnum]&&strlen($postdb[adword])>$rsdb[wordnum]){
			showerr("��Ĺ�����������������ܴ���{$rsdb[wordnum]}��");
		}elseif($postdb[adword]===''){
			showerr("����������ݲ���Ϊ��");
		}
		if(!strstr($postdb[adlink],'http://')){
			$postdb[adlink]="http://$postdb[adlink]";
		}
		$postdb[adlink]=filtrate($postdb[adlink]);
		$postdb[adword]=filtrate($postdb[adword]);
		$postdb[endtime]=$timestamp+$rsdb[day]*3600*24;
		$db->query("INSERT INTO `{$pre}ad_compete_user` ( `uid` , `username` , `begintime` , `endtime` , `money` , `id`, `adlink`, `adword` , `city_id`) VALUES ('$lfjdb[uid]','$lfjdb[username]','$timestamp','$postdb[endtime]','$postdb[price]','$id','$postdb[adlink]','$postdb[adword]','$city_id')");
		add_user($lfjuid,-$postdb[price],'���򾺼۹��۷�');	//�۳�����
		refreshto("?job=list","��ϲ��,����ύ�ɹ�",1);
	}
}
elseif($job=='list')
{
	$lfjdb[money]=get_money($lfjdb[uid]);
	$query = $db->query("SELECT AD.* FROM `{$pre}ad_compete_place` AD ORDER BY AD.id DESC");
	while($rs = $db->fetch_array($query)){
		$_s2=$db->get_one("SELECT COUNT(*) AS Num FROM `{$pre}ad_compete_user` WHERE id='$rs[id]' AND endtime>'$timestamp' AND city_id='$city_id'");
		$rs[AdNum]=$rs[adnum]-$_s2[Num];
		$rs[isclose]=$rs[isclose]?'�ر�':'����';
		$listdb[]=$rs;
	}
}
elseif($job=='sell_list')
{
	$rows=30;
	if(!$page){
		$page=1;
	}
	$min=($page-1)*$rows;
	$showpage=getpage("`{$pre}ad_compete_user`","WHERE id='$id' AND city_id='$city_id'","?job=$job&id=$id","$rows");
	$query = $db->query("SELECT * FROM `{$pre}ad_compete_user` WHERE id='$id' AND city_id='$city_id' ORDER BY ad_id DESC LIMIT $min,$rows");
	while($rs = $db->fetch_array($query)){
		if($rs[endtime]>$timestamp){
			$rs[state]='Ͷ����';
		}else{
			$rs[state]='�ѹ���';
		}
		$rs[begintime]=date("Y-m-d H:i",$rs[begintime]);
		$rs[endtime]=date("Y-m-d H:i",$rs[endtime]);
		$listdb[]=$rs;
	}
}
elseif($job=='mylist')
{
	$query = $db->query("SELECT AD.name,B.* FROM `{$pre}ad_compete_place` AD LEFT JOIN `{$pre}ad_compete_user` B ON AD.id=B.id WHERE B.uid='$lfjuid' ORDER BY B.ad_id DESC");
	while($rs = $db->fetch_array($query)){
		$rs[begintime]=date("Y-m-d H:i",$rs[begintime]);
		$rs[endtime]=date("Y-m-d H:i",$rs[endtime]);
		$listdb[]=$rs;
	}
}
elseif($action=='del')
{
	$db->query("DELETE FROM `{$pre}ad_compete_user` WHERE uid='$lfjuid' AND ad_id='$ad_id'");
	refreshto("$FROMURL","ɾ���ɹ�",1);
}
elseif($job=='edit')
{
	$rsdb = $db->get_one("SELECT AD.name,AD.wordnum,B.* FROM `{$pre}ad_compete_place` AD LEFT JOIN `{$pre}ad_compete_user` B ON AD.id=B.id WHERE B.uid='$lfjuid' AND ad_id='$ad_id'");

	if($step==2){
		if($rsdb[wordnum]&&strlen($postdb[adword])>$rsdb[wordnum]){
			showerr("��Ĺ�����������������ܴ���{$rsdb[wordnum]}��");
		}elseif($postdb[adword]===''){
			showerr("����������ݲ���Ϊ��");
		}
		if(!strstr($postdb[adlink],'http://')){
			$postdb[adlink]="http://$postdb[adlink]";
		}
		$postdb[adlink]=filtrate($postdb[adlink]);
		$postdb[adword]=filtrate($postdb[adword]);
		$db->query("UPDATE `{$pre}ad_compete_user` SET adword='$postdb[adword]',adlink='$postdb[adlink]' WHERE  uid='$lfjuid' AND ad_id='$ad_id'");
		refreshto("?job=mylist","�޸ĳɹ�",1);
	}

	$rsdb[begintime]=date("Y-m-d H:i",$rsdb[begintime]);
	$rsdb[endtime]=date("Y-m-d H:i",$rsdb[endtime]);
}

require(ROOT_PATH."member/head.php");
require(dirname(__FILE__)."/template/compete/list.htm");
require(ROOT_PATH."member/foot.php");
?>