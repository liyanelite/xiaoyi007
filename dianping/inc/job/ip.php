<?php
if(!function_exists('html')){
	die('F');
}
if($ip){
	if(!ereg("([0-9]+)\.([0-9]+)\.([0-9]+)\.([0-9]+)",$ip)){
		$ip=base64_decode($ip);
		$area=ipfrom($ip);
		if(!$web_admin){
			$ip="������";
		}
	}else{
		$area=ipfrom($ip);
	}
	if(!$area){
		showerr("�ܱ�Ǹ,û����Ҫ��ѯ������");
	}
	unset($string);
}


require(Mpath."inc/head.php");
require(getTpl("ip"));
require(Mpath."inc/foot.php");
?>