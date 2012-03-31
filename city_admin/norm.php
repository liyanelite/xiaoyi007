<?php
require_once(dirname(__FILE__)."/global.php");
require_once (dirname(__FILE_)."../a_d/function.ad.php");

$jobdb=array('list');

if(!in_array($job, $jobdb)){
	showerr('操作类型错误!');
}

/**
*每页显示40条
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
	//refreshto($FROMURL,"删除成功",0);
}
if($action == "edit"){
	$array_adtype=array(
					"word"=>"文字广告",
					"pic"=>"图片广告",
					"swf"=>"FLASH广告",
					"code"=>"代码广告",
					"duilian"=>"对联广告"
					);
	$rsdb=$db->get_one("SELECT A.*,B.* FROM {$pre}ad_norm_user B LEFT JOIN {$pre}ad_norm_place A ON A.id=B.id WHERE B.u_id='$id'");
	@extract(unserialize($rsdb[u_code]));
	if($rsdb[autoyz]){
		$rsdb[_ifyz]='自动通过审核';
	}else{
		$rsdb[_ifyz]='手工审核';
	}
	if($rsdb[city_id] != $city_id){
		showerr('非本城市广告!不可以修改');
	}
	require(dirname(__FILE__)."/head.php");
	require(dirname(__FILE__)."/template/norm_buy.htm");
	require(dirname(__FILE__)."/foot.php");
	exit;
}
if($action == "post"){
	$rsdb=$db->get_one("SELECT A.*,B.* FROM {$pre}ad_norm_user B LEFT JOIN {$pre}ad_norm_place A ON A.id=B.id WHERE B.u_id='$id' AND B.city_id='$city_id'");
	if(!$rsdb){
		showerr('非本城市广告!不可以修改');
	}
	if($atc_day<1){
		showerr("购买的广告不能小于一天");
	}
	if($rsdb[u_endtime]<$timestamp){
		showerr("过期广告不能再修改");
	}
	elseif((($rsdb[u_endtime]-$timestamp)<24*3600)&&$atc_day<$rsdb[u_day]){
		showerr("今天内将要过期的广告不能把日期改小");
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
				showerr("该用户{$webdb[MoneyName]}不足$totalmoneycard,该用户仅有{$webdb[MoneyName]}:$usermoney");
			}
		}
		else
		{
			if( $totalmoneycard>($usermoney+$rsdb[u_moneycard]) ){
				showerr("该用户{$webdb[MoneyName]}不足,该用户仅有{$webdb[MoneyName]}:$usermoney");
			}
			$money=abs($totalmoneycard-$rsdb[u_moneycard]);
			add_user($rsdb[u_uid],-$money,'购买普通广告位');
		}			
	}
	else
	{
		if($totalmoneycard>$usermoney)
		{
			showerr("该用户{$webdb[MoneyName]}不足$totalmoneycard,该用户仅有{$webdb[MoneyName]}:$usermoney");
		}
		$u_begintime=$u_endtime=0;
	}

	$u_hits=0;
	$db->query("UPDATE `{$pre}ad_norm_user` SET `u_day`='$atc_day',`u_begintime`='$u_begintime',`u_endtime`='$u_endtime',`u_yz`='$u_yz',`u_code`='$u_code',`u_moneycard`='$totalmoneycard' WHERE u_id='$id' AND u_uid='$rsdb[u_uid]'");
	
	make_ad_cache();
	refreshto("$FROMURL","修改成功",1);
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