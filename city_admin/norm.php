<?php
require_once(dirname(__FILE__)."/global.php");
require_once (dirname(__FILE_)."../a_d/function.ad.php");

$jobdb=array('list');

if(!in_array($job, $jobdb)){
	showerr('�������ʹ���!');
}

/**
*ÿҳ��ʾ40��
**/
$rows=15;


if(!$page)
{
	$page=1;
}
$min=($page-1)*$rows;

$webdb[UpdatePostTime]>0 || $webdb[UpdatePostTime]=1;

unset($listdb,$i);
if ($action=='del'){
	$db->query("DELETE FROM {$pre}ad_norm_user WHERE u_id='$id' AND city_id='$city_id'");
	make_ad_cache();
	//refreshto($FROMURL,"ɾ���ɹ�",0);
}
if($action == "edit"){
	$array_adtype=array(
					"word"=>"���ֹ��",
					"pic"=>"ͼƬ���",
					"swf"=>"FLASH���",
					"code"=>"������",
					"duilian"=>"�������"
					);
	$rsdb=$db->get_one("SELECT A.*,B.* FROM {$pre}ad_norm_user B LEFT JOIN {$pre}ad_norm_place A ON A.id=B.id WHERE B.u_id='$id'");
	@extract(unserialize($rsdb[u_code]));
	if($rsdb[autoyz]){
		$rsdb[_ifyz]='�Զ�ͨ�����';
	}else{
		$rsdb[_ifyz]='�ֹ����';
	}
	if($rsdb[city_id] != $city_id){
		showerr('�Ǳ����й��!�������޸�');
	}
	require(dirname(__FILE__)."/head.php");
	require(dirname(__FILE__)."/template/norm_buy.htm");
	require(dirname(__FILE__)."/foot.php");
	exit;
}
if($action == "post"){
	$rsdb=$db->get_one("SELECT A.*,B.* FROM {$pre}ad_norm_user B LEFT JOIN {$pre}ad_norm_place A ON A.id=B.id WHERE B.u_id='$id' AND B.city_id='$city_id'");
	if(!$rsdb){
		showerr('�Ǳ����й��!�������޸�');
	}
	if($atc_day<1){
		showerr("����Ĺ�治��С��һ��");
	}
	if($rsdb[u_endtime]<$timestamp){
		showerr("���ڹ�治�����޸�");
	}
	elseif((($rsdb[u_endtime]-$timestamp)<24*3600)&&$atc_day<$rsdb[u_day]){
		showerr("�����ڽ�Ҫ���ڵĹ�治�ܰ����ڸ�С");
	}
	$totalmoneycard=$rsdb[moneycard]*$atc_day;
	$cdb=unserialize($rsdb[adcode]);
	if($rsdb[type]=='word'){
		$cdb[word]=filtrate($atc_word);
		$cdb[linkurl]=filtrate($atc_url);
	}elseif($rsdb[type]=='pic'){
		$cdb[picurl]=filtrate($atc_img);
		$cdb[linkurl]=filtrate($atc_url);
	}elseif($rsdb[type]=='swf'){
		$cdb[flashurl]=filtrate($atc_url);
	}elseif($rsdb[type]=='duilian'){
		$cdb[l_src]=filtrate($l_src);
		$cdb[l_link]=filtrate($l_link);
		$cdb[r_src]=filtrate($r_src);
		$cdb[r_link]=filtrate($r_link);
	}
	$cdb[code]=stripslashes($atc_code);
	$u_code=addslashes(serialize($cdb));
	$usermoney=get_money($rsdb[u_uid]);
	$u_yz=$rsdb[autoyz];
	if($rsdb[autoyz])
	{
		$u_begintime=$rsdb[u_begintime];
		$u_endtime=$rsdb[u_endtime]+($atc_day-$rsdb[u_day])*3600*24;

		if(!$rsdb[u_yz])
		{
			if($totalmoneycard>$usermoney){
				showerr("���û�{$webdb[MoneyName]}����$totalmoneycard,���û�����{$webdb[MoneyName]}:$usermoney");
			}
		}
		else
		{
			if( $totalmoneycard>($usermoney+$rsdb[u_moneycard]) ){
				showerr("���û�{$webdb[MoneyName]}����,���û�����{$webdb[MoneyName]}:$usermoney");
			}
			$money=abs($totalmoneycard-$rsdb[u_moneycard]);
			add_user($rsdb[u_uid],-$money,'������ͨ���λ');
		}			
	}
	else
	{
		if($totalmoneycard>$usermoney)
		{
			showerr("���û�{$webdb[MoneyName]}����$totalmoneycard,���û�����{$webdb[MoneyName]}:$usermoney");
		}
		$u_begintime=$u_endtime=0;
	}

	$u_hits=0;
	$db->query("UPDATE `{$pre}ad_norm_user` SET `u_day`='$atc_day',`u_begintime`='$u_begintime',`u_endtime`='$u_endtime',`u_yz`='$u_yz',`u_code`='$u_code',`u_moneycard`='$totalmoneycard' WHERE u_id='$id' AND u_uid='$rsdb[u_uid]'");
	
	make_ad_cache();
	refreshto("$FROMURL","�޸ĳɹ�",1);
}
$query = $db->query("SELECT SQL_CALC_FOUND_ROWS * FROM {$pre}ad_norm_user WHERE city_id='$city_id' ORDER BY id DESC LIMIT $min,$rows");
$RS=$db->get_one("SELECT FOUND_ROWS()");
$totalNum=$RS['FOUND_ROWS()'];
$showpage=getpage('','',"?job=list",$rows,$totalNum);
while($rs = $db->fetch_array($query))
{
	
	$s=$db->get_one("SELECT name FROM {$pre}city WHERE fid='$rs[city_id]'");
	$ad = $db->get_one("SELECT name FROM {$pre}ad_norm_place WHERE id='$rs[id]'");
	$rs[city] = $s[name];
	$rs[place_name] = $ad[name];
	$rs[begin]  = date("Y-m-d H:i",$rs[u_begintime]);
	$rs[end]	= date("Y-m-d H:i",$rs[u_endtime]);
	$rs[posttime]	= date("Y-m-d H:i",$rs[u_posttime]);
	$rs[hits] = $rs[u_hits];
	$listdb[]=$rs;
}
require(dirname(__FILE__)."/head.php");
require(dirname(__FILE__)."/template/ad_norm_list.htm");
require(dirname(__FILE__)."/foot.php");
?>