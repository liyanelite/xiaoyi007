<?php
!function_exists('html') && exit('ERR');

if(!$lfjid){
	showerr("你还没登录");
}


$linkdb=array(
			"我购买的广告"=>"?hack=$hack&job=list",
			"购买广告"=>"?hack=$hack&job=buy"
			);


if($webdb[MAX_sell_telephone]<1){
	$webdb[MAX_sell_telephone]=10;
}
if($webdb[money_sell_telephone]<1){
	$webdb[money_sell_telephone]=50;
}
if($webdb[sell_telephone_titleNUM]<1){
	$webdb[sell_telephone_titleNUM]=25;
}

if($webdb[sell_telephone_telNUM]<1){
	$webdb[sell_telephone_telNUM]=20;
}

if($job=='buy'){
	extract($db->get_one("SELECT COUNT(*) AS NUM FROM {$pre}sell_telephone WHERE endtime>$timestamp"));
	if($NUM>=$webdb[MAX_sell_telephone]){
		showerr("位置已满,你暂时不可以购买!");
	}
	$lfjdb[money]=get_money($lfjuid);

	if($step==2){
		
		if($day<1){
			showerr('购买天数不能小于一天!');
		}
		if(!$telephone){
			showerr('电话号码不能为空!');
		}elseif(strlen($telephone)>$webdb[sell_telephone_telNUM]){
			showerr('电话号码不能大于{$webdb[sell_telephone_telNUM]}个字!');
		}elseif(!$title){
			showerr('标题不能为空!');
		}elseif(strlen($title)>$webdb[sell_telephone_titleNUM]*2){
			showerr('标题不能大于{$webdb[sell_telephone_titleNUM]}个字!');
		}elseif(strlen($about)>255){
			showerr('介绍不能大于125个字!');
		}
		$telephone = filtrate($telephone);
		$title = filtrate($title);
		$about = filtrate($about);
		$day = intval($day);
		$money = $webdb[money_sell_telephone]*$day;
		if(!$web_admin){
			if($lfjdb[money]<$money){
				showerr("你的{$webdb[MoneyName]}不足!");
			}else{
				add_user($lfjuid,-$money);
			}
		}
		$endtime = $timestamp+$day*3600*24;
		$db->query("INSERT INTO `{$pre}sell_telephone` ( `uid` , `username` , `posttime` , `begintime` , `endtime` , `money` , `city_id` , `yz` , `telephone` , `title` , `about` ) VALUES ( '$lfjuid', '$lfjid', '$timestamp', '0', '$endtime', '$money', '$city_id', '1', '$telephone', '$title', '$about')");
		refreshto("?hack=$hack&",'购买成功',1);
	}

}elseif($action=='del'){

	$db->query("DELETE FROM `{$pre}sell_telephone` WHERE id='$id' AND uid='$lfjuid'");
	refreshto("?hack=$hack&",'删除成功',1);

}else{
	$rows=20;
	if(!$page){
		$page=1;
	}
	$min=($page-1)*$rows;
	$showpage=getpage("`{$pre}sell_telephone`","WHERE uid='$lfjuid'","?hack=$hack&");
	$query = $db->query("SELECT * FROM `{$pre}sell_telephone` WHERE uid='$lfjuid' ORDER BY id DESC LIMIT $min,$rows");
	while($rs = $db->fetch_array($query)){
		$rs[endtime]=date("Y-m-d H:i:s",$rs[endtime]);
		$rs[posttime]=date("Y-m-d H:i:s",$rs[posttime]);
		$listdb[]=$rs;
	}	
}



require(ROOT_PATH."member/head.php");
require(dirname(__FILE__)."/template/member/sell_telephone.htm");
require(ROOT_PATH."member/foot.php");

?>